<?php

namespace DistributionHubBundle\Services;

use DistributionHubBundle\Model;
use DistributionHubBundle\Model\Channel;
use phpDocumentor\Reflection\Types\Self_;
use Pimcore\File;
use Pimcore\Model\Asset;
use Pimcore\Model\Element\ValidationException;
use Pimcore\Tool\Admin;

/**
 * Class ChannelService
 * @package DistributionHubBundle\Services
 */
class ChannelService
{

    /**
     * Returns a unique key for the element in the $target-Path (recursive)
     * @static
     * @param string $type
     * @param string $sourceKey
     * @param $target
     * @return string
     *
     */
    public static function getUniqueCopyName($target, $sourceKey, $type)
    {
        if (self::nameExists($sourceKey, $target, $type)) {
            // only for assets: add the prefix _copy before the file extension (if exist) not after to that source.jpg will be source_copy.jpg and not source.jpg_copy
            if ($type == 'asset' && $fileExtension = File::getFileExtension($sourceKey)) {
                $sourceKey = preg_replace('/\.' . $fileExtension . '$/i', '_copy.' . $fileExtension, $sourceKey);
            } elseif (preg_match("/_copy(|_\d*)$/", $sourceKey) === 1) {
                // If key already ends with _copy or copy_N, append a digit to avoid _copy_copy_copy naming
                $keyParts = explode('_', $sourceKey);
                $counterKey = array_key_last($keyParts);
                if (intval($keyParts[$counterKey]) > 0) {
                    $keyParts[$counterKey] = intval($keyParts[$counterKey]) + 1;
                } else {
                    $keyParts[] = 1;
                }
                $sourceKey = implode('_', $keyParts);
            } else {
                $sourceKey .= '_copy';
            }

            return self::getUniqueCopyName($target, $sourceKey, $type);
        }

        return $sourceKey;
    }


    /**
     * Check object name exists or not
     * @static
     *
     * @param string $path
     * @param null $className
     * @param string|null $type
     *
     * @return bool
     */
    public static function nameExists($path, $className = null, $type = null)
    {
        $classname = '\\DistributionHubBundle\\Model\\' . ucfirst($className);
        if ($type == 'asset') {
            return false;
        } elseif ($type == 'object' && !is_null($className)) {
            return (is_null($classname::getByName($path))) ? false : true;
        }
        return false;
    }

    /**
     * Prepare mapping info
     * @param $data
     * @param int $classId
     * @return array
     */
    public static function getMappingInfo($data, $classId = 0)
    {
        $dataField = [];
        $previewData = [];
        $showInGrid = [];
        if (count($data)) {
            foreach ($data[0] as $k => $v) {
                $dataField[] = "field_$k";
                $previewData["field_$k"] = $v;
                $showInGrid["show_in_grid_$k"] = 0;
            }
        }
        return [
            'importConfigId' => '',
            'dataPreview' => count($previewData) ? [$previewData] : [],
            'showInGrid' => count($showInGrid) ? [$showInGrid] : [],
            'dataFields' => $dataField,
            'targetFields' => [],
            'templateAttribute' => $data[0] ?? [],
            'selectedGridColumns' => [],
            'resolverSettings' => [],
            'shareSettings' => [],
            'csvSettings' => [],
            'rows' => 1,
            'cols' => count($previewData),
            'classId' => $classId,
            'isShared' => false,
        ];
    }

    /**
     * @param $sheets
     * @param $name
     * @return bool|false|int|string
     */
    public static function getSheetIndex($sheets, $name)
    {
        if (count($sheets)) {
            $sheets =array_column($sheets, 'key');
            return array_search($name, $sheets);
        }
        return false;
    }

    /**
     * @param $objectId
     * @return array[]
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public static function getSheetColumns($objectId)
    {
        $object = Channel::getById($objectId);
        $assetId = (int)$object->getHeaderMappingFileAssetId();
        $classId = $object->getPimcoreClassId();
        $fileType = $object->getHeaderMappingFileType();
        $separator = $object->getMappingFileCSVDelimiter();
        $sheetNumber = $object->getSheetNumberInMappingFile();
        $rowNumber = (int)$object->getHeaderRowNumberInMappingFile();

        $columns = ['col' => [], 'config' => []];
        //$sheets = $object->getExcelSheets()!="" ? json_decode($object->getExcelSheets(),true) : [];
        $sheets = [];
        $sheetIndex = self::getSheetIndex($sheets, $sheetNumber);
        $assetObject = \Pimcore\Model\Asset::getById($assetId);
        if (!$assetObject instanceof Asset) {
            throw new \Exception('dHub_template_required');
        }
	// for contitech
        // $fullPath = PIMCORE_ASSET_DIRECTORY . $assetObject->getPath() . $assetObject->getFilename();
        // path with s3 protocol
        $fullPath = PIMCORE_ASSET_DIRECTORY . $assetObject->getRealFullPath();
        if (strtolower($fileType) === 'csv') {
            $fp = fopen($fullPath, 'r');
            $header = fgetcsv($fp, 4096, $separator, '"');
            $headerRow = explode(',', $header[0]);
            foreach ($headerRow as $column) {
                if (!is_null($column) && $column != "") {
                    $columns['col'][] = $column;
                }
            }
            fclose($fp);
        } else {
            if ($sheetNumber !== false && $rowNumber > 0) {
                $fileDetails = (pathinfo($assetObject->getFilename()));
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader(ucfirst($fileDetails['extension']));
                $spreadSheet = $reader->load($fullPath);
                $worksheet = $spreadSheet->getSheet($sheetNumber);
                $highestColumn = $worksheet->getHighestColumn();
                $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
                for ($col = 1; $col <= $highestColumnIndex; $col++) {
                    $value = $worksheet->getCellByColumnAndRow($col, $rowNumber)->getValue();
                    if (!is_object($value) && !is_null($value) && $value != "") {
                        $columns['col'][] = $value;
                    }
                }
            }
        }
        if (count($columns['col']) > 0) {
            $columns['config'] = self::getMappingInfo([$columns['col']], $classId);
        }
        return $columns;
    }
    public static function gridConfigToPimConfig($config)
    {
        $mapped = isset($config['mappingJson']) ? json_decode($config['mappingJson'], true) : [];
        $templateAttribute = $mapped['templateAttribute'] ?? [];
        $selectedGridColumns = $mapped['selectedGridColumns'] ?? [];
        $data = [];
        $formulaStack = [];
        $formulaStackAttribute = [];
        if (count($templateAttribute)) {
            foreach ($templateAttribute as $tKey => $tAttributeValue) {
                $tAttribute = str_replace("\n", " ", $tAttributeValue);
                if (isset($selectedGridColumns[$tKey])) {
                    $pimMapped = [];
                    $mappedObject = $selectedGridColumns[$tKey] ?? [];
                    if (is_array($mappedObject) && count($mappedObject)) {
                        $pimMapped = self::childWithInner($mappedObject, $pimMapped);
                    }
                    $pimMapped['definition']['isLocalizedfield'] = array_key_exists('isLocalizedfield', $mappedObject) ? ($mappedObject['isLocalizedfield'] != "" ? $mappedObject['isLocalizedfield'] : false) : false;
                    $pimMapped['targetAttributeKey'] = $mappedObject['targetAttributeKey'] ?? '';
                    $pimMapped['sourceDataType'] =  isset($mappedObject['sourceDataType'])? $mappedObject['sourceDataType']: '';
                    $pimMapped['targetAttributeId'] = $mappedObject['targetAttributeId'] ?? '';
                    $data[] = ["templateAttribute" => $tAttributeValue, "targetAttributes" => $pimMapped];

                    if (isset($pimMapped['definition']['class']) && $pimMapped['definition']['class']=='PimFormula') {
                        $formulaStackAttribute["d.{$tAttribute}"] = $tAttributeValue;
                        $formulaStack["d.{$tAttribute}"] = self::getTemplateAttributes($pimMapped['definition']['dependentAttribute']);
                    }
                } else {
                    break;
                }
            }
        }

        $stack = self::validateFormulaStack($formulaStack);

        foreach ($stack as $sKey => $value) {
            $stack[$sKey] = $formulaStackAttribute[$value];
        }

        return ['formulaStack'=>$stack,'attributeMapping'=>$data];
    }

    private static function getTemplateAttributes($attributes)
    {
        return count($attributes) ? array_filter(array_map(function ($attribute) {
            return ($attribute['type'] == "template") ? $attribute['name']:false;
        }, $attributes)) : [];
    }
    public static function childWithInner($object, $pimMapped)
    {
        $object = $object['attributes'] ?? $object;
        $pimMapped['isOperator'] = (isset($object['type']) && $object['type'] == 'operator');
        $pimMapped['targetAttributeKey'] = $object['targetAttributeKey'] ?? '';
        $pimMapped['sourceDataType'] = isset($object['sourceDataType']) ? $object['sourceDataType'] : '';
        $pimMapped['targetAttributeId'] = $object['targetAttributeId'] ?? '';
        $pimMapped['definition'] = self::filterMappedData($object);
        $pimMapped['childs'] = [];
        if (isset($object['childs']) && count($object['childs'])) {
            foreach ($object['childs'] as $k => $childObject) {
                $pimMapped['childs'][$k] = self::childWithInner($childObject, $pimMapped);
            }
        }
        return $pimMapped;
    }

    public static function filterMappedData($object)
    {
        $data = [];
        $data['dataType'] = $object['dataType'] ?? '';
        $data['isLocalizedfield'] = array_key_exists('isLocalizedfield', $object) ? ($object['isLocalizedfield'] != "" ? $object['isLocalizedfield'] : false) : false;
        $data['label'] = $object['label'] ?? '';
        $data['brickType'] = $object['brickType'] ?? '';
        $data['operator'] = $object['operator'] ?? '';
        $data['class'] = $object['class'] ?? '';
        $data['skipNull'] = $object['skipNull'] ?? '';
        $data['additionalData'] = $object['additionalData'] ?? '';

        $data['glue'] = $object['glue'] ?? '';
        $data['trim'] = $object['trim'] ?? '';
        $data['decimalPlaces'] = $object['decimalPlaces'] ?? '';
        $data['padLength'] = $object['padLength'] ?? '';
        $data['padString'] = $object['padString'] ?? '';
        $data['search'] = $object['search'] ?? '';
        $data['replace'] = $object['replace'] ?? '';
        $data['insensitive'] = $object['insensitive'] ?? '';
        $data['start'] = $object['start'] ?? '';
        $data['length'] = $object['length'] ?? '';
        $data['ellipses'] = $object['ellipses'] ?? '';
        $data['format'] = $object['format'] ?? '';
        $data['timezone'] = $object['timezone'] ?? '';
        $data['index'] = $object['index'] ?? '';
        $data['value'] = $object['value'] ?? '';
        $data['outputType'] = $object['outputType'] ?? '';
        $data['dependentAttribute'] = $object['attributeJson'] ?? '';
        return $data;
    }
    public static function filterAttributeMappingConfig($data)
    {
        $mapped = !empty($data) ? json_decode($data, true) : [];

        $templateAttribute = $mapped['templateAttribute'] ?? [];
        $selectedGridColumns = $mapped['selectedGridColumns'] ?? [];
        //$showInGrid = $mapped['showInGrid'] ?? [];

        if (count($templateAttribute)) {
            $selectedGridColumnsFilter = [];
            foreach ($templateAttribute as $tKey => $tAttribute) {
                if (isset($selectedGridColumns[$tKey])) {
                    $selectedGridColumnsFilter[] = $selectedGridColumns[$tKey];
                } else {
                    break;
                }
            }
            $mapped['selectedGridColumns'] = $selectedGridColumnsFilter;
        }

        return $mapped;
    }
    public static function updateChannelMapping($data, $objectId)
    {
        $mappingObject = Channel::getById($objectId);
        if (!is_null($mappingObject) && $mappingObject instanceof Channel) {
            //$mappingObject->setMapping($data['mapping']);
            $mappingObject->setLanguage($data['lang']);
            $mappingObject->setColumnAttributeMapping($data['mappingJson']);
            $mappingObject->setShowInGridMapping($data['showInGrid']);
            $mappingObject->save();
            return $mappingObject;
        }
        throw new ValidationException("Object $objectId not found.");
    }

    private static function checkCycle($match, $value, $array)
    {
        $getArray = $array[$value];
        unset($array[$value]);
        foreach ($getArray as $attribute) {
            if (isset($array[$attribute]) && in_array($match, $array[$attribute])) {
                return true;
            } elseif (isset($array[$attribute])) {
                return self::checkCycle($match, $attribute, $array);
            }
        }
        return false;
    }

    private static function validateFormulaStack($array)
    {
        $getKeys = [];
        if (count($array)) {
            $getKeys = array_keys($array);
            foreach ($getKeys as $value) {
                if (isset($array[$value]) && in_array($value, $array[$value])) {
                    throw new \Exception("You cannot use same template attribute with same destination.");
                } elseif (self::checkCycle($value, $value, $array)) {
                    throw new \Exception("You are using cycle dependencies with $value.");
                }
            }
            $k = null;
            foreach ($array as $aKey => $attributes) {
                foreach ($attributes as $attribute) {
                    if (isset($array[$attribute])) {
                        $index_1 = array_search($attribute, $getKeys);
                        $index_2 = array_search($aKey, $getKeys);

                        if ($index_2<$index_1) {
                            $getKeys[$index_1] = $k;
                            $getKeys[$index_2] = $attribute;
                        }
                    }
                }
            }
        }

        return $getKeys;
    }
}
