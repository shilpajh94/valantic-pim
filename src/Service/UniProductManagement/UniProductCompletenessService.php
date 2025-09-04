<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrBrand;
use App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrSkeleton;
use Pimcore\Model\AbstractModel;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields;
use Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Objectbrick\Data\AbstractData;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Tool;

class UniProductCompletenessService
{
    private const NON_LOCALIZED_ATTR_HEADING = '[ NON LOCALIZED ATTRIBUTES ]';
    private const LOCALIZED_ATTR_HEADING = '[ LOCALIZED ATTRIBUTES ]';

    private const IGNORED_FIELDS = [
        UniProductBase::FIELD_COMPLETENESS_PERCENTAGE,
        UniProductBase::FIELD_EMPTY_FIELDS_BRAND,
        UniProductBase::FIELD_EMPTY_FIELDS_SKELETON,
        UniProductBase::FIELD_EMPTY_FIELDS_FINISHED_GOOD,
    ];

    private int $totalFieldCount = 0;
    private int $nonEmptyFieldCount = 0;
    private string $locale;

    /** @var array<string, array<string>> */
    private array $emptyFields;

    public function updateCompleteness(UniProductBase $finishedGood): void
    {
        foreach (Tool::getValidLanguages() as $locale) {
            $this->updateCompletenessImpl($finishedGood, $locale);
        }
    }

    private function updateCompletenessImpl(UniProductBase $finishedGood, string $locale): void
    {
        $this->totalFieldCount = 0;
        $this->nonEmptyFieldCount = 0;
        $this->locale = $locale;

        $this->resetEmptyFields();
        $this->processObject($finishedGood, $finishedGood->getClass()->getFieldDefinitions());
        $finishedGood->setEmptyFieldsFinishedGood($this->formatEmptyFields(), $locale);

        $this->resetEmptyFields();
        $this->processCategory($finishedGood, AbstractUniPrSkeleton::class);
        $finishedGood->setEmptyFieldsSkeleton($this->formatEmptyFields(), $locale);

        $this->resetEmptyFields();
        $this->processCategory($finishedGood, AbstractUniPrBrand::class);
        $finishedGood->setEmptyFieldsBrand($this->formatEmptyFields(), $locale);

        $finishedGood->setCompletenessPercentage((string) $this->calculateCompleteness(), $locale);
    }

    /**
     * @template TObjectbrickClassname
     * *
     * @param class-string<TObjectbrickClassname> $objectbrickClass
     */
    private function processCategory(UniProductBase $object, string $objectbrickClass): void
    {
        foreach ($object->resolveObjectbricksInHierarchy($objectbrickClass) as $brick) {
            $this->processObject($brick, $brick->getDefinition()?->getFieldDefinitions() ?? []);
        }
    }

    /** @param array<Data> $definitions */
    private function processObject(AbstractModel|AbstractData $object, array $definitions, string $key = self::NON_LOCALIZED_ATTR_HEADING, string $prefix = ''): void
    {
        foreach ($definitions as $definition) {
            if ($definition instanceof Localizedfields) {
                $this->processObject($object, $definition->getFieldDefinitions(), self::LOCALIZED_ATTR_HEADING, $prefix);

                continue;
            }

            if ($definition instanceof Objectbricks && $object instanceof AbstractData) {
                /** @var AbstractData $brick */
                foreach ($object->get($definition->getName())->getItems() as $brick) {
                    $this->processObject(
                        $brick,
                        $brick->getDefinition()->getFieldDefinitions(),
                        self::NON_LOCALIZED_ATTR_HEADING,
                        sprintf('%s%s → ', $prefix, $brick->getDefinition()->getTitle() ?? $brick->getType()),
                    );
                }

                continue;
            }

            if (in_array($definition->getName(), self::IGNORED_FIELDS, true)) {
                continue;
            }

            if (!$object instanceof AbstractData && !$object instanceof Concrete) {
                throw new \RuntimeException(sprintf('Unsupported object type: %s^', $object::class));
            }

            $this->totalFieldCount++;

            if ($object->get($definition->getName(), $this->locale)) {
                $this->nonEmptyFieldCount++;
            } else {
                $this->emptyFields[$key][] = sprintf('%s%s', $prefix, $definition->getTitle());
            }
        }
    }

    private function calculateCompleteness(): float
    {
        if ($this->totalFieldCount === 0) {
            return 100;
        }

        return round(100 / $this->totalFieldCount * $this->nonEmptyFieldCount, 2);
    }

    private function resetEmptyFields(): void
    {
        $this->emptyFields = [
            self::LOCALIZED_ATTR_HEADING => [],
            self::NON_LOCALIZED_ATTR_HEADING => [],
        ];
    }

    private function formatEmptyFields(): string
    {
        $result = [];

        foreach ($this->emptyFields as $heading => $fields) {
            if ($fields === []) {
                continue;
            }

            $result[] = $result === [] ? $heading : "\n" . $heading;
            $i = 0;

            foreach ($fields as $field) {
                $result[] = sprintf('%s%s) %s', "\t", ++$i, $field);
            }
        }

        return implode("\n", $result);
    }
}
