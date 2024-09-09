<?php

namespace AppBundle\Helper;

use Pimcore\Model\DataObject;
use ImportBundle\Services\ImportConstants;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Pimcore\Db;

class Common
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getParameter($data, $key)
    {
        if (!empty($data) && isset($data['parameters'])) {
            return isset($data['parameters'][$key]) ? $data['parameters'][$key] : false;
        }
    }

    public function getInstance($service)
    {
        return $this->container->get($service);
    }

    public function getParameterItem($data, $key, $item)
    {
        if (!empty($data) && isset($data['parameters'])) {
            return isset($data['parameters'][$key]) && isset($data['parameters'][$key][$item]) ?
                $data['parameters'][$key][$item] : false;
        }
    }

/**
 * Clear and disable pimcore cache
 * @author sandeep bhardwaj <sandeep@happiestminds.com>
 * @return void
 */
    public static function clearAndDisablePimCache():void{
                // clear the whole cache
                \Pimcore\Cache::clearAll();
                // disable the cache globally
                \Pimcore\Cache::disable();
    }
    
    /**
     * Enable pimcore cache
     * @author sandeep bhardwaj <sandeep@happiestminds.com>
     * @return void
     */
    public static function endablePimCache():void{
               // enable the cache globally
               \Pimcore\Cache::enable();
    }

    public function moveFile($param)
    {
        /*
            @$status: success or failed
            if success then move file to archive else move to failed folder
        */
        $filePath = $param['filePath'];
        $failedPath = $param['failedPath'];
        $archivePath = $param['archivePath'];
        $status = strtolower($param['status']);
        $fileObj = \Pimcore\Model\Asset::getByPath($filePath);
        $fileName = $fileObj->getFilename();
        $ext = $this->getExt($fileObj->getFilename());
        $newAsset = new \Pimcore\Model\Asset();
        if ($ext) {
            $fileName = $fileObj->getFilename();
            $fileName = substr($fileName, 0, strrpos($fileName, "."));
            $fileName = $fileName . '-' . $param['fileName'] . '.' . $ext;
        }
        $newAsset->setFilename($fileName);

        switch ($status) {
            case true:
                $parentInfo = \Pimcore\Model\Asset::getByPath($archivePath);
                $newAsset->setParentId($parentInfo->getId());
                $newAsset->setData(file_get_contents($fileObj->getFileSystemPath()));
                break;
            case false:
                $parentInfo = \Pimcore\Model\Asset::getByPath($failedPath);
                $newAsset->setParentId($parentInfo->getId());
                $newAsset->setData(file_get_contents($fileObj->getFileSystemPath()));
                break;
            default:
                throw new \UnexpectedValueException('Issue in file moving after import ');
        }
        $newAsset->save(
            ["versionNote" => "Import completed and status is $status, file path is: " . $fileObj->getFullPath()]
        );
        $fileObj->delete();
        return $newAsset;
    }

    public function getExt($fileName)
    {
        if (!empty($fileName)) {
            $arr = explode(".", $fileName);
            return strtolower(end($arr));
        }
        return false;
    }

    /**
     *  return quantity value unit id by quantity name
     */
    public function getQuantityValueUnitId($qtyName)
    {
        $unit = DataObject\QuantityValue\Unit::getByAbbreviation($qtyName);
        return (!is_null($unit)) ? $unit->getId() : '';
    }

    /**
     *  return quantity value with quantity unit
     */
    public function getDataQuantityValue($columnStdPackQty, $quantityValueUnitId)
    {
        return new DataObject\Data\QuantityValue($columnStdPackQty, $quantityValueUnitId);
    }

    /**
     *  return corresponding value of a key from an array
     */
    public function getFieldValue($fileColumns, $rowvalue, $string)
    {
        if (!empty($string) && in_array($string, $fileColumns)) {
            $index = array_search($string, $fileColumns);
            $value = $rowvalue[$index];
        }
        return $value;
    }

    public function createKeyForObject($fileColumns, $data, $keyColumns, $mappingCsvColumn)
    {
        $keyColumnValues = array();
        foreach ($keyColumns as $key => $keyColumn) {
            $column = $mappingCsvColumn[$keyColumn];
            $columnValue = $this->getFieldValue($fileColumns, $data, $column);
            $keyColumnValues[] = $columnValue;
        }

        return implode(ImportConstants::OBJECT_KEY_SEPARATOR, $keyColumnValues);
    }

    public function getCatalogLanguage($object)
    {
        if ($object instanceof \Pimcore\Model\DataObject\CatalogTables) {
            $lang = $object->getParent()->getParent()->getCatalogLanguage();
        }
        if ($object instanceof \Pimcore\Model\DataObject\CatalogCategory) {
            $lang = $object->getParent()->getCatalogLanguage();
        }
        if ($object instanceof \Pimcore\Model\DataObject\Catalog) {
            $lang = $object->getCatalogLanguage();
        }
        if (empty($lang)) {
            $lang = \Pimcore\Tool::getDefaultLanguage();
        }
        return $lang;
    }

    public function fractionToDecimal($fraction)
    {
        // Split fraction into whole number and fraction components
        preg_match('/^(?P<whole>\d+)?\s?((?P<numerator>\d+)\/(?P<denominator>\d+))?$/', $fraction, $components);
        // Extract whole number, numerator, and denominator components
        $whole = $components['whole'] ?: 0;
        $numerator = $components['numerator'] ?: 0;
        $denominator = $components['denominator'] ?: 0;

        // Create decimal value
        $decimal = $whole;
        $numerator && $denominator && $decimal += ($numerator / $denominator);

        return $decimal;
    }
    
    /**
 * Check Decimal Precision Exist or not
 *
 * @param Request   $request  Current request
 * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
 * @return string
 */
    public static function updateDataIfDecimalPrecisionExist(Request $request){
        $newData = '';
        try {
            $objectClassName = $request->request->get('class');
            $data = json_decode($request->request->get('data'));
            if (!empty($data)) {
                $newData = [];
                foreach ($data as $key => $val) {
                    if ($key == 'id') {
                        $newData[$key] = $val;
                    } else {
                        if (str_contains($key, '~')) {
                            [$objectBricName, $attributeKey] = explode('~', $key);
                            $brickDef = DataObject\Objectbrick\Definition::getByKey($objectBricName);
                            $brickFields = $brickDef->getFieldDefinitions();
                            if (method_exists($brickFields[$attributeKey], 'getDecimalPrecision') && !empty($brickFields[$attributeKey]->getDecimalPrecision())) {
                                $newData[$key] = (string) $val;
                            } else {
                                if (gettype($val) == 'string') {
                                    $newData[$key] = (string) $val;
                                } else {

                                    $newData[$key] = (float) $val;
                                }
                            }
                        } else {
                            $newData[$key] =  $val;
                        }
                    }
                }
            }
            return json_encode($newData);

        }catch(Exception $e){
            return $newData;
        }
    }

    /**
     * Get failed records from Log table
     * @param string   $logTable  name of log table
     * @param string   $masterTable  name of master table
     * @param string   $statusColumn  status column name in log table
     * @param int|null   $logCreatedAt  timestamp when log of current script created
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     * @return array
     */
    public static function getFailedRecordFromLogTable(string $logTable,string $masterTable, string $statusColumn , int|null $logCreatedAt=null): array
    {

        $failedIds = [];
        try {
            $db = Db::get();
            $failedLogRecordQuery = "SELECT DISTINCT log.id FROM {$logTable} AS log INNER JOIN {$masterTable} AS m ON  log.id = m.id
                                        WHERE log.{$statusColumn} = ?";
                                       
            $prms =['failed'];
            if(!empty($logCreatedAt)){
                $failedLogRecordQuery.= " AND  log.createdAt = ? ";
                $prms= [...$prms,$logCreatedAt];
            }
            $failedLogRecordResult = $db->fetchAllAssociative($failedLogRecordQuery, $prms);
          
            if (count($failedLogRecordResult) > 0) {
                $failedIds = array_column($failedLogRecordResult, 'id');
            }
            return $failedIds;
        } catch (Exception $e) {

            echo $e->getMessage();
            return $failedIds;
        }
    }
}
