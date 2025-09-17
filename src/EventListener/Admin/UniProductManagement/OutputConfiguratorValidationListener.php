<?php

declare(strict_types=1);

namespace App\EventListener\Admin\UniProductManagement;

use App\Enum\UniOutputConfigurationExportType;
use App\Enum\UniOutputConfigurationFrequencyType;
use App\Enum\UniOutputConfigurationWeekday;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\UniProductDataOutputConfiguration;
use Pimcore\Model\Element\ValidationException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OutputConfiguratorValidationListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            DataObjectEvents::PRE_ADD => 'validateAndCleanConfiguration',
            DataObjectEvents::PRE_UPDATE => 'validateAndCleanConfiguration',
        ];
    }

    /**
     * Validates the configuration fields and cleans up irrelevant values.
     */
    public function validateAndCleanConfiguration(DataObjectEvent $event): void
    {
        $object = $event->getObject();

        if (!$object instanceof UniProductDataOutputConfiguration) {
            return;
        }

        $this->validateFields($object);
        $this->cleanUpFields($object);
    }

    /**
     * Validates the fields based on frequency and export type.
     *
     * @throws ValidationException If validation fails.
     */
    private function validateFields(UniProductDataOutputConfiguration $object): void
    {
        $frequency = $object->getFrequency();
        $exportType = $object->getExportType();

        if ($exportType === UniOutputConfigurationExportType::SCHEDULED->value) {
            $this->validateExportDirectory($object);

            switch ($frequency) {
                case UniOutputConfigurationFrequencyType::DAILY->value:
                    break;

                case UniOutputConfigurationFrequencyType::WEEKLY->value:
                    $this->validateWeekday($object);

                    break;

                case UniOutputConfigurationFrequencyType::MONTHLY->value:
                    $this->validateDayOfMonth($object);

                    break;

                default:
                    throw new ValidationException(sprintf('Invalid frequency type: %s', $frequency));
            }
            $this->validateTimeOfDay($object->getTimeOfDay());
        }
    }

    /**
     * Validates the export directory for scheduled exports.
     *
     * @throws ValidationException
     */
    private function validateExportDirectory(UniProductDataOutputConfiguration $object): void
    {
        if (!$object->getExportDirectory() instanceof \Pimcore\Model\Element\AbstractElement) {
            throw new ValidationException('Scheduled export configuration requires a valid export directory.');
        }
    }

    /**
     * Validates the weekday for weekly exports.
     *
     * @throws ValidationException
     */
    private function validateWeekday(UniProductDataOutputConfiguration $object): void
    {
        $weekday = $object->getWeekday();

        if (UniOutputConfigurationWeekday::tryFrom($weekday) === null) {
            throw new ValidationException('Weekly configuration requires a valid weekday.');
        }
    }

    /**
     * Validates the day of the month for monthly exports.
     *
     * @throws ValidationException
     */
    private function validateDayOfMonth(UniProductDataOutputConfiguration $object): void
    {
        $dayOfMonth = (int) $object->getDayOfMonth();

        if ($dayOfMonth < 1 || $dayOfMonth > 31) {
            throw new ValidationException('Monthly configuration requires a valid day of the month (1-31).');
        }
    }

    /**
     * Validates the time of day format.
     *
     * @throws ValidationException
     */
    private function validateTimeOfDay(?string $timeOfDay): void
    {
        if ($timeOfDay === null || preg_match('/^([01][0-9]|2[0-3]):([0-5][0-9])$/', $timeOfDay) !== 1) {
            throw new ValidationException('Invalid time of day format. Expected format: HH:mm.');
        }
    }

    /**
     * Cleans up irrelevant fields based on the configuration.
     */
    private function cleanUpFields(UniProductDataOutputConfiguration $object): void
    {
        $frequency = $object->getFrequency();

        switch ($frequency) {
            case UniOutputConfigurationFrequencyType::DAILY->value:
            default:
                $object->setWeekday(null);
                $object->setDayOfMonth(null);

                break;

            case UniOutputConfigurationFrequencyType::WEEKLY->value:
                $object->setDayOfMonth(null);

                break;

            case UniOutputConfigurationFrequencyType::MONTHLY->value:
                $object->setWeekday(null);

                break;
        }

        if ($object->getExportType() !== UniOutputConfigurationExportType::SCHEDULED->value) {
            $object->setExportDirectory(null);
            $object->setTimeOfDay(null);
        }
    }
}
