<?php

declare(strict_types=1);

namespace App\Command\UniProductManagement;

use App\Enum\UniOutputConfigurationExportType;
use App\Enum\UniOutputConfigurationFrequencyType;
use App\Service\UniProductManagement\OutputConfiguratorService;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject\UniProductDataOutputConfiguration;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:export:process-recurring',
    description: 'Processes all recurring exports (daily, weekly, monthly) based on their schedules.',
)]
class OutputConfiguratorExportCommand extends AbstractCommand
{
    public function __construct(private readonly OutputConfiguratorService $outputConfiguratorService)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Starting export process for recurring configurations...</info>');

        try {
            $configurations = $this->fetchScheduledConfigurations();

            $now = CarbonImmutable::now();
            $processedCount = 0;

            foreach ($configurations as $config) {
                if (!$this->processConfiguration($config, $now, $output)) {
                    continue;
                }

                $processedCount++;
            }

            $output->writeln(sprintf('<info>Export process completed. %d configurations processed.</info>', $processedCount));

            return self::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln(sprintf('<error>Error during export process: %s</error>', $e->getMessage()));

            return self::FAILURE;
        }
    }

    /**
     * Fetch all scheduled configurations.
     *
     * @return UniProductDataOutputConfiguration[]
     */
    private function fetchScheduledConfigurations(): array
    {
        $query = UniProductDataOutputConfiguration::getList([
            'condition' => sprintf("exportType = '%s'", UniOutputConfigurationExportType::SCHEDULED->value),
        ]);

        return $query->getData();
    }

    /**
     * Process a single configuration.
     *
     * @return bool Whether the configuration was successfully processed
     */
    private function processConfiguration(UniProductDataOutputConfiguration $config, CarbonImmutable $now, OutputInterface $output): bool
    {
        $frequency = $config->getFrequency();
        $lastRun = $config->getLastRun();
        $weekday = $config->getWeekday();
        $dayOfMonth = $config->getDayOfMonth();
        $timeOfDay = $config->getTimeOfDay();

        try {
            if (!$this->shouldRun($frequency, $lastRun, $now, $weekday, $dayOfMonth, $timeOfDay)) {
                $output->writeln(sprintf('<comment>Skipping configuration ID: %d (not due yet)</comment>', $config->getId()));

                return false;
            }

            $output->writeln(sprintf('<info>Processing export configuration ID: %d</info>', $config->getId()));

            $filePath = $this->outputConfiguratorService->generateExportToAsset($config);
            $output->writeln(sprintf('<info>Export complete. File saved at: %s</info>', $filePath));

            $config->setLastRun(Carbon::instance($now));
            $config->save();

            return true;
        } catch (\RuntimeException $e) {
            $output->writeln(sprintf('<error>Configuration ID: %d failed: %s</error>', $config->getId(), $e->getMessage()));

            return false;
        }
    }

    /**
     * Determines whether a configuration should be run based on its frequency and schedule.
     */
    private function shouldRun(
        string $frequency,
        ?\DateTimeInterface $lastRun,
        \DateTimeImmutable $now,
        ?string $weekday = null,
        ?int $dayOfMonth = null,
        ?string $timeOfDay = null,
    ): bool {
        $now = CarbonImmutable::instance($now);
        $currentTime = $now->format('H:i');
        $currentWeekday = $now->format('D');
        $currentDay = $now->day;
        $lastDayOfMonth = $now->lastOfMonth();

        switch ($frequency) {
            case UniOutputConfigurationFrequencyType::DAILY->value:
                return $this->shouldRunDaily($lastRun, $timeOfDay, $currentTime, $now);

            case UniOutputConfigurationFrequencyType::WEEKLY->value:
                return $this->shouldRunWeekly($lastRun, $weekday, $timeOfDay, $currentTime, $currentWeekday, $now);

            case UniOutputConfigurationFrequencyType::MONTHLY->value:
                return $this->shouldRunMonthly($lastRun, $timeOfDay, $currentDay, $dayOfMonth, $lastDayOfMonth, $now);

            default:
                throw new \InvalidArgumentException(sprintf('Unsupported frequency type: %s', $frequency));
        }
    }

    private function shouldRunDaily(?\DateTimeInterface $lastRun, ?string $timeOfDay, string $currentTime, CarbonImmutable $now): bool
    {
        $ranToday = $lastRun !== null && $lastRun->format('Y-m-d') === $now->format('Y-m-d');

        return !$ranToday && ($currentTime >= $timeOfDay);
    }

    private function shouldRunWeekly(
        ?\DateTimeInterface $lastRun,
        ?string $weekday,
        ?string $timeOfDay,
        string $currentTime,
        string $currentWeekday,
        CarbonImmutable $now,
    ): bool {
        if ($weekday && $weekday !== $currentWeekday) {
            return false;
        }

        if ($timeOfDay && $currentTime < $timeOfDay) {
            return false;
        }

        if ($lastRun && $lastRun->format('Y-m-d') === $now->format('Y-m-d')) {
            return false;
        }

        return true;
    }

    private function shouldRunMonthly(
        ?\DateTimeInterface $lastRun,
        ?string $timeOfDay,
        int $currentDay,
        int $dayOfMonth,
        CarbonImmutable $lastDayOfMonth,
        CarbonImmutable $now,
    ): bool {
        $effectiveDay = min($dayOfMonth, $lastDayOfMonth->day);

        if ($currentDay < $effectiveDay) {
            return false;
        }

        if ($timeOfDay && $now->format('H:i') < $timeOfDay) {
            return false;
        }

        if ($lastRun && $lastRun->format('Y-m-d') === $now->format('Y-m-d')) {
            return false;
        }

        return true;
    }
}
