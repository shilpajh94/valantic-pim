<?php

declare(strict_types=1);

namespace App\Helpers\DynamicTextLabels\UniProductManagement;

use App\Service\VersionService;
use Pimcore\Model\DataObject\ClassDefinition\Layout\DynamicTextLabelInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgPts;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkPts;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductBase\FinishedGoodProductGroupSpecific;
use Pimcore\Model\DataObject\UniProductBase\SkeletonProductGroupSpecific;

/**
 * Render a calculated nomial length, based on a combination of skeleton and finished good values.
 *
 * Refer to the Pimcore documentation for more information:
 * https://docs.pimcore.com/platform/Pimcore/Objects/Object_Classes/Layout_Elements/Dynamic_Text_Labels/
 */
class UniProductNominalLengthDynamicTextPts extends UniProductDynamicText implements DynamicTextLabelInterface
{
    private const METRIC = 'metric';
    private const IMPERIAL = 'imperial';

    public function renderLayoutText(string $data, ?Concrete $object, array $params): string
    {
        $output = $this->renderText($data);

        if ($object === null) {
            return $output;
        }

        VersionService::useLatestVersion(true);
        $object = VersionService::getPublishedOrLatestVersion($object);

        if (!$object instanceof UniProductBase) {
            return $output;
        }

        if (!$object->getSkeletonProductGroupSpecific() instanceof SkeletonProductGroupSpecific) {
            return $output;
        }

        if (!$object->getFinishedGoodProductGroupSpecific() instanceof FinishedGoodProductGroupSpecific) {
            return $output;
        }

        $childBrickData = $object->getFinishedGoodProductGroupSpecific()->getUniPrFgPts();

        if (!$childBrickData instanceof UniPrFgPts) {
            return $output;
        }

        // Define a mapping of nominalLength values to their corresponding methods for both metric and imperial fields
        $lengthMapping = [
            'Ld' => [self::METRIC => UniPrFgPts::FIELD_DATUM_LENGTH_METRIC, self::IMPERIAL => UniPrFgPts::FIELD_DATUM_LENGTH_IMPERIAL],
            'Li' => [self::METRIC => UniPrFgPts::FIELD_INSIDE_LENGTH_METRIC, self::IMPERIAL => UniPrFgPts::FIELD_INSIDE_LENGTH_IMPERIAL],
            'Le' => [self::METRIC => UniPrFgPts::FIELD_EFFECTIVE_LENGTH_METRIC, self::IMPERIAL => UniPrFgPts::FIELD_EFFECTIVE_LENGTH_IMPERIAL],
            'LP / LW' => [self::METRIC => UniPrFgPts::FIELD_PITCH_LENGTH_METRIC, self::IMPERIAL => UniPrFgPts::FIELD_PITCH_LENGTH_IMPERIAL],
            'Lr' => [self::METRIC => UniPrFgPts::FIELD_REF_LENGTH_LR_METRIC, self::IMPERIAL => UniPrFgPts::FIELD_REF_LENGTH_LR_IMPERIAL],
        ];

        // Determine whether the field is metric or imperial
        $fieldType = $params['fieldname'] === 'nominalLengthMetric' ? self::METRIC : self::IMPERIAL;
        $nominalLength = $this->resolveNominalLength($object);

        $field = $lengthMapping[$nominalLength][$fieldType] ?? null;
        $value = $field !== null ? $this->resolveChildValue($object, $field) : null;

        return $this->renderText($data, $value);
    }

    private function resolveNominalLength(UniProductBase $object): string
    {
        $skeletonBrickData = $object->getSkeletonProductGroupSpecific()?->getUniPrSkPts();

        if (!$skeletonBrickData instanceof UniPrSkPts) {
            return '';
        }

        $result = $skeletonBrickData->getNominalLength();

        if ($result !== '') {
            return $result;
        }

        $parent = $object->getParent();

        return $parent instanceof UniProductBase ? $this->resolveNominalLength($parent) : $result;
    }

    private function resolveChildValue(UniProductBase $object, string $field): ?string
    {
        $skeletonBrickData = $object->getFinishedGoodProductGroupSpecific()?->getUniPrFgPts();

        if (!$skeletonBrickData instanceof UniPrFgPts) {
            return '';
        }

        $result = $skeletonBrickData->get($field);

        if ($result !== null) {
            return $result;
        }

        $parent = $object->getParent();

        return $parent instanceof UniProductBase ? $this->resolveChildValue($parent, $field) : $result;
    }
}
