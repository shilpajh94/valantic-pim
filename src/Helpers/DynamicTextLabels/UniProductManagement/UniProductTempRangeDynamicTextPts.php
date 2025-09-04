<?php

declare(strict_types=1);

namespace App\Helpers\DynamicTextLabels\UniProductManagement;

use App\Service\VersionService;
use Pimcore\Model\DataObject\ClassDefinition\Layout\DynamicTextLabelInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Data\QuantityValueRange;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrPts;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\DataObject\UniProductCategoryInternal\LevelSpecificData;

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

        if (!$object instanceof UniProductCategoryInternal) {
            return $output;
        }

        if (!$object->getLevelSpecificData() instanceof LevelSpecificData) {
            return $output;
        }

        $parentBrickData = $object->getLevelSpecificData()->getUniPrBrPts();

        if (!$parentBrickData instanceof UniPrBrPts) {
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
        $temperatureData = $parentBrickData->get($temperatureDataField);

        // Validate and process temperature data
        if ($temperatureData instanceof QuantityValueRange && $temperatureData->getMinimum() !== '' && $temperatureData->getMinimum() !== null && $temperatureData->getMaximum() !== '' && $temperatureData->getMaximum() !== null) {
            return $this->renderText($data, sprintf('%s to %s', $temperatureData->getMinimum(), $temperatureData->getMaximum()));
        }

        return $output;
    }
}
