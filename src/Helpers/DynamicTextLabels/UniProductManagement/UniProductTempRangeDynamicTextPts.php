<?php

declare(strict_types=1);

namespace App\Helpers\DynamicTextLabels\UniProductManagement;

use App\Service\UniProductManagement\UniProductGetInheritedDataForObjectService;
use App\Service\VersionService;
use Pimcore\Model\DataObject\ClassDefinition\Layout\DynamicTextLabelInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrPts;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductBase\BrandProductGroupSpecific;

/**
 * Render a product temperature range, based on a combination of finished good values.
 *
 * Refer to the Pimcore documentation for more information:
 * https://docs.pimcore.com/platform/Pimcore/Objects/Object_Classes/Layout_Elements/Dynamic_Text_Labels/
 */
class UniProductTempRangeDynamicTextPts extends UniProductDynamicText implements DynamicTextLabelInterface
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

        if (!$object->getBrandProductGroupSpecific() instanceof BrandProductGroupSpecific) {
            return $output;
        }

        $brandBrickData = $object->getBrandProductGroupSpecific()->getUniPrBrPts();

        if (!$brandBrickData instanceof UniPrBrPts) {
            return $output;
        }

        // Determine the relevant field based on the context
        $temperatureFieldMap = [
            'rangeTemperatureC' => UniPrBrPts::FIELD_TEMPERATURE_C,
            'rangeTemperatureF' => UniPrBrPts::FIELD_TEMPERATURE_F,
        ];

        // Check if the current field name is in the mapping
        if (!isset($temperatureFieldMap[$params['fieldname']])) {
            return $output;
        }

        $temperatureDataField = $temperatureFieldMap[$params['fieldname']];
        $getInheritedDataForObjectService = new UniProductGetInheritedDataForObjectService();
        $inheritedObjectData = $getInheritedDataForObjectService->callGetDataForObject($object);

        if (!empty($inheritedObjectData['brandProductGroupSpecific'])) {
            foreach ($inheritedObjectData['brandProductGroupSpecific'] as $array) {
                if (!empty($array) && !empty($array['data']) && !empty($array['data'][$temperatureDataField])) {
                    $temperatureData = $array['data'][$temperatureDataField];

                    if ($temperatureData['minimum'] !== '' && $temperatureData['minimum'] !== null && $temperatureData['maximum'] !== '' && $temperatureData['maximum'] !== null) {
                        return $this->renderText($data, sprintf('%s to %s', $temperatureData['minimum'], $temperatureData['maximum']));
                    }
                }
            }
        }

        return $output;
    }
}
