<?php

namespace PimDataPostBundle\Lib\TempTablePopulator;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Model\UpdateWindow;

class TempTablePopulatorDao
{
    private $db;
    private $updateWindow;

    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
        $this->updateWindow = UpdateWindow::getInstance();
    }

    public function getDBInstance()
    {
        return $this->db;
    }

    public function truncate(string $tableName)
    {
        if(trim($tableName))
        {
            $sql = "TRUNCATE TABLE {$tableName}";
            $this->db->executeQuery($sql);
        }
    }

    public function getPimModifiedRecordIds($tableName)
    {
        if(trim($tableName))
        {
            $startTime = $this->updateWindow->getStartTimestamp();
            $endTime = $this->updateWindow->getEndTimestamp();

            $query = "SELECT `id` FROM {$tableName} WHERE (`modificationDate` >= {$startTime} AND `modificationDate` <= {$endTime})";
            $resultSet = $this->db->fetchFirstColumn($query);
        }

        return ($resultSet) ? $resultSet : [];
    }

    public function getPimModifiedRecordIdsWhichAreAlsoPresentInMaster(string $objectTableName, string $masterTableName): array
    {

        $startTime = $this->updateWindow->getStartTimestamp();
        $endTime = $this->updateWindow->getEndTimestamp();

        $query = "SELECT {$objectTableName}.`id` FROM {$objectTableName}" ;
        $query .= " JOIN {$masterTableName} ON {$objectTableName}.`id` = {$masterTableName}.`o_id`";
        $query .= " WHERE (`modificationDate` >= {$startTime} AND `modificationDate` <= {$endTime})";
        return $this->db->fetchFirstColumn($query);
    }

    public function getTempTableDataForIds(Array $attribute, Array $pimIDs, String $tableName): Array
    {
        $resultSet = [];
        if($pimIDs && $attribute && $tableName)
        {
            array_walk($pimIDs, function(&$val){$val = trim($val,",");});

            $productIds = implode(",",$pimIDs);
            $selectArray = [];
            $selectString = "";
            $secondJoinOnArray = [];
            $joinOnArray = [];
            $joinOnString = "";

            foreach ($attribute as $tableKey => $value) {
                if(isset($value['hashField']))
                {
                    continue;
                }

                if($tableKey == 'epixFlag' && $value['pim_attribute_name'] == 'epixFlag')
                {
                    continue;
                }

                if(isset($value['conditionalFieldName']))
                {
                    $selectArray[] = $value['conditionalFieldName'];
                }
                else{
                    $selectArray[] = $value['pim_table_name'].".".$value['pim_attribute_name']. " AS {$tableKey}";
                }

                if(isset($value['joinOn']) && !in_array($value['joinOn'], $joinOnArray))
                {
                    $joinOnArray[] = $value['joinOn'];
                }

                if(isset($value['addOnJoin']) && !in_array($value['addOnJoin'], $secondJoinOnArray))
                {
                    $secondJoinOnArray[] = $value['addOnJoin'];
                }
            }

            $joinOnArray = array_merge($joinOnArray, $secondJoinOnArray);

            $selectString = implode(', ', $selectArray);
            $joinOnString = implode(' ', $joinOnArray);

            $query = "SELECT {$selectString} FROM {$tableName} {$joinOnString} WHERE {$tableName}.id IN (".$productIds.")";
            $resultSet = $this->db->fetchAllAssociative($query);

            if (isset($resultSet) && $tableName == Constants::B2B_CATEGORY_OBJECT_TABLE_NAME) {
                $resultArr = [];
                foreach ($resultSet as $result) {
                    $level = $result["Level"];
                    $printedCatalogDescription = $result["PrintedCatalogDescription"];
                    $pimId = $result["o_id"];

                    if (
                        ($level == 1 || $level == "1.0") && $printedCatalogDescription != 'Products' &&
                        \Pimcore\Model\DataObject\ProductCategory::getById($pimId)->getParent()->getType() == 'folder'
                    ) {
                        $parentObj = \Pimcore\Model\DataObject\ProductCategory::getByPath(
                            '/Master List/SIOP Master List/SIOP Engineered Products'
                        );
                        $result['o_parentId'] = $parentObj->getId();
                    }
                    $resultArr[] = $result;
                }
                return $resultArr;
            }
        }
        return ($resultSet) ? $resultSet : [];
    }

    public function addHashesToTempTableData(Array $resultSet, Array $relationalFields): Array
    {
        $basicData = [];
        $relationalData = [];

        $dataInsert = [];

        if($resultSet)
        {
            foreach ($resultSet as $productArray)
            {
                foreach ($productArray as $key => $value) {
                    if(array_key_exists($key,$relationalFields))
                    {
                        $relationalData[$key] = $value;
                    }
                    else
                    {
                        $basicData[$key] = $value;
                    }
                }

                $basicHash = md5(json_encode($basicData, true));
                $relationalHash = md5(json_encode($relationalData, true));

                $data = array_merge($basicData,$relationalData);
                $data['basicHash'] = $basicHash;
                $data['relationalHash'] = $relationalHash;

                $dataInsert[] = $data;
            }
        }
        return $dataInsert;
    }

    public function quoteString(?string $str)
    {
        return $str === null ? 'NULL' : $this->db->quote($str);
    }

    public function insertDataInTempTable($arrData, $tempTable)
    {
        if($arrData && trim($tempTable))
        {
            $insertArray = [];

            $keys = $arrData[0];

            foreach ($keys as $key => $value) {
                $insertArray[] = "`".$key."`";
            }

            $insertArrayString = implode(',',$insertArray);

            $rowCount = 1;
            $sql      = "REPLACE INTO `{$tempTable}` ({$insertArrayString}) VALUES";
            $values   = '';

            foreach ($arrData as $data) {
                $data = array_map([$this,"quoteString"],$data);

                $strData = implode(",",$data);

                $values .= "({$strData}),";

                // inserting records in batch
                if ($rowCount % Constants::INSERT_BATCH_SIZE == 0) {
                    $query = $sql.rtrim($values, ',');
                    try{
                        $this->db->executeQuery($query);
                    } catch(\Exception $e) {
                        p_r($e->getMessage());
                    }
                    $values = '';
                }
                $rowCount++;
                unset($newData);
            }
            if ($values) {
                $query = $sql.rtrim($values, ',');
                $query;
                try{
                    $this->db->executeQuery($query);
                } catch(\Exception $e) {
                    p_r($e->getMessage());
                }
            }
        }
    }

    public function filterIFSPTGProducts(array $productIds): array
    {
        if($productIds)
        {
            $ifsCategoriesFullSIOPCode = array_values(Constants::IFS_CATEGORIES);
            $ptgCategoriesFullSIOPCode = array_values(Constants::PTG_CATEGORIES);
            $allCategoriesFullSIOPCode = array_merge($ifsCategoriesFullSIOPCode, $ptgCategoriesFullSIOPCode);
            $allCategoriesFullSIOPCodeString = implode(',', $allCategoriesFullSIOPCode);

            // Get all the categories id on the basis of SIOP full code
            $query = "SELECT id FROM object_2 WHERE fullCode IN ($allCategoriesFullSIOPCodeString)";
            $categoryIds = $this->db->fetchFirstColumn($query);

            $categoryIdsString = implode(',', $categoryIds);
            $productIdsString = implode(',', $productIds);

            // Get all the product ids that are belongs to SIOPLevel2
            $query = "SELECT id FROM object_1 WHERE TRIM(BOTH ',' FROM SIOPLevel2) IN ($categoryIdsString) and id IN ($productIdsString)";
            $resultSet = $this->db->fetchFirstColumn($query);
        }

        return ($resultSet) ? $resultSet : [];
    }

    public function getChildrenObjectIds(int $parentId): array
    {
        $query = "SELECT id FROM objects";
        $query .= " WHERE parentId = :parentId and type = 'object' ";

        return $this->db->fetchFirstColumn($query,["parentId" => $parentId]);
    }

    public function getPimModifiedProductIdsWithProductType(string $productTableName): array
    {
        $startTime = $this->updateWindow->getStartTimestamp();
        $endTime = $this->updateWindow->getEndTimestamp();

        $query = "SELECT `id`,`productType` FROM {$productTableName} WHERE (`modificationDate` >= {$startTime} AND `modificationDate` <= {$endTime})";
        $resultSet = $this->db->fetchAllAssociative($query);

        return ($resultSet) ? $resultSet : [];
    }

    public function getAllImmediateChildrenData(array $parentIds)
    {
        if(empty($parentIds)){
            return [];
        }
        $query = "SELECT id, type, className FROM objects";
        $query .= " WHERE parentId IN (" . implode(",", $parentIds) . ")";

        return $this->db->fetchAllAssociative($query);
    }

}
