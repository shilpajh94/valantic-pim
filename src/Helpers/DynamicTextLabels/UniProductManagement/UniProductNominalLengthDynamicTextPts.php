<?php

declare(strict_types=1);

namespace App\Helpers\DynamicTextLabels\UniProductManagement;

use App\Service\UniProductManagement\UniProductGetInheritedDataForObjectService;
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

        $skeletonBrickData = $object->getSkeletonProductGroupSpecific()->getUniPrSkPts();

        if (!$skeletonBrickData instanceof UniPrSkPts) {
            return $output;
        }

        $childBrickData = $object->getFinishedGoodProductGroupSpecific()->getUniPrFgPts();

        if (!$childBrickData instanceof UniPrFgPts) {
            return $output;
        }

        // Define a mapping of nominalLength values to their corresponding methods for both metric and imperial fields
        $lengthMapping = [
            'Ld' => ['metric' => UniPrFgPts::FIELD_DATUM_LENGTH_METRIC, 'imperial' => UniPrFgPts::FIELD_DATUM_LENGTH_IMPERIAL],
            'Li' => ['metric' => UniPrFgPts::FIELD_INSIDE_LENGTH_METRIC, 'imperial' => UniPrFgPts::FIELD_INSIDE_LENGTH_IMPERIAL],
            'Le' => ['metric' => UniPrFgPts::FIELD_EFFECTIVE_LENGTH_METRIC, 'imperial' => UniPrFgPts::FIELD_EFFECTIVE_LENGTH_IMPERIAL],
            'LP / LW' => ['metric' => UniPrFgPts::FIELD_PITCH_LENGTH_METRIC, 'imperial' => UniPrFgPts::FIELD_PITCH_LENGTH_IMPERIAL],
            'Lr' => ['metric' => UniPrFgPts::FIELD_REF_LENGTH_LR_METRIC, 'imperial' => UniPrFgPts::FIELD_REF_LENGTH_LR_IMPERIAL],
        ];
        // Determine whether the field is metric or imperial
        $fieldType = $params['fieldname'] === 'nominalLengthMetric' ? 'metric' : 'imperial';
        $nominalLength = '';

        $getInheritedDataForObjectService = new UniProductGetInheritedDataForObjectService();
        $inheritedObjectData = $getInheritedDataForObjectService->callGetDataForObject($object);

        if (!empty($inheritedObjectData['skeletonProductGroupSpecific'])) {
            foreach ($inheritedObjectData['skeletonProductGroupSpecific'] as $skeletonData) {
                if (!empty($skeletonData['data'][UniPrSkPts::FIELD_NOMINAL_LENGTH])) {
                    $nominalLength = $skeletonData['data'][UniPrSkPts::FIELD_NOMINAL_LENGTH];
                }
            }
        }

        if ($nominalLength !== '' && isset($lengthMapping[$nominalLength])) {
            if (!empty($inheritedObjectData['finishedGoodProductGroupSpecific'])) {
                foreach ($inheritedObjectData['finishedGoodProductGroupSpecific'] as $finishedGoodData) {
                    if (!empty($finishedGoodData['data'][$lengthMapping[$nominalLength][$fieldType]])) {
                        $fieldValue = $finishedGoodData['data'][$lengthMapping[$nominalLength][$fieldType]];

                        return $this->renderText($data, sprintf('%s', $fieldValue));
                    }
                }
            }
        }

        return $output;
    }
}
