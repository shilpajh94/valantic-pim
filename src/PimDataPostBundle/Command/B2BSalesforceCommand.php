<?php

/**
 * File Path: Your File path on system
 * Command: b2c:product <filePath>
 * Des: Region data import script.
 */

namespace PimDataPostBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Db;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;

class B2BSalesforceCommand extends AbstractCommand
{
    private $commonHelper;
    private $db;

    protected function configure()
    {
        $this->setName('conti:datapost:b2b-salesforce')
            ->setDescription('B2C Product Data Store to Temp Table');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        echo " Script started!";
        $this->db = Db::get();

        $this->commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $B2BProductAttributeConfigProvider = new B2BProductAttributeConfigProvider();
        $B2BProductAttributeConfig = $B2BProductAttributeConfigProvider->getCompleteConfig();
        
        // create B2C Temp and Master Table
        // $B2CProductAttributesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getB2CProductAtrributeConfig();
        // $this->createTempMasterTable($B2CProductAttributesConfig);

        // create B2B Temp and Master Table
        // $B2BProductAttributeConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getB2BProductAtrributeConfig();
        $this->createTempMasterTable($B2BProductAttributeConfig);
        
        // $B2CB2BAttributeArray[]= $B2CProductAttributesConfig;
        $B2CB2BAttributeArray[]= $B2BProductAttributeConfig;

        try {

            // get product records using sales master updated records
            $salesMaterialProductIDs = $this->getTodaysSaleMasterModifiedRecords();

            // get all today's modified product
            $materialProductIDs = $this->getTodaysProductModifiedRecords();

            if($salesMaterialProductIDs || $materialProductIDs)
            {
                $resultSet = \array_unique(array_merge($salesMaterialProductIDs, $materialProductIDs));
            }
            
            if($resultSet)
            {
                // loop b2b and b2c array

                foreach ($B2CB2BAttributeArray as $B2CB2BattributeConfig) {

                    $attribute = $this->commonHelper->getParameter($B2CB2BattributeConfig, 'Attribute');
                    $tempTable = $this->commonHelper->getParameter($B2CB2BattributeConfig, 'Temp Table');

                    // prepare sql query and fetch the data from the object table
                    $resultSetProductsDetail = $this->prepareQueryAndFetchDbData($attribute, $resultSet);

                    //create hashes for the records
                    $resultSetProductsDetailWithHashData = $this->createHashData($attribute, $resultSetProductsDetail);

                    // insert data in the temp tables
                    $this->insertDataInTemp($resultSetProductsDetailWithHashData, $tempTable);

                }
            }
            else{
                echo "\n Modified records not found today.";
            }
            
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
        echo "\n Script finished!!!\n";
        die;
    }

    // public function getBasicFields($attribute): Array
    // {
    //     $array = [];
    //     foreach ($attribute as $attrKey => $value) {

    //         if(!isset($value['relationalAttr']) || !$value['relationalAttr'])
    //         {
    //             $array[] = $attrKey;
    //         }
    //     }
    //     return $array;
    // }

    public function getRelationalFields($attribute): Array
    {
        $array = [];
        foreach ($attribute as $attrKey => $value) {

            if(isset($value['relationalAttr']) && $value['relationalAttr'])
            {
                $array[] = $attrKey;
            }
        }
        return $array;
    }

    public function createHashData($attribute, $resultSetProductsDetail)
    {
        echo "\n create hash data for the record.";

        $basicData = [];
        $relationalData = [];

        $dataInsert = [];
        $relationalFields = [];

        // $basicFields = $this->getBasicFields($attribute);
        $relationalFields = $this->getRelationalFields($attribute);

        foreach ($resultSetProductsDetail as $productArray) 
        {
            foreach ($productArray as $key => $value) {
                if(in_array($key,$relationalFields))
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

        return $dataInsert;
    }

    public function getTodaysProductModifiedRecords()
    {
        echo "\n Fetching product modified record.";
        // $query = "SELECT `o_id` FROM object_1 WHERE  DATE(from_unixtime(`o_modificationDate`)) = CURDATE();";
        $query = "SELECT `o_id` FROM object_1 WHERE  DATE(from_unixtime(`o_modificationDate`)) = '2022-03-02';";
        return $this->db->fetchCol($query);
    }

    public function getTodaysSaleMasterModifiedRecords()
    {
        echo "\n Fetching sales modified record.";
        // $query = "SELECT TRIM(BOTH ',' FROM  object_10.Material) AS o_id FROM object_10 WHERE  DATE(from_unixtime(`o_modificationDate`)) = CURDATE();";
        $query = "SELECT TRIM(BOTH ',' FROM  object_10.Material) AS o_id FROM object_10 WHERE  DATE(from_unixtime(`o_modificationDate`)) = '2022-03-02';";
        return $this->db->fetchCol($query);
    }

    public function prepareQueryAndFetchDbData($attribute, $resultSet)
    {
        echo "\n Preparing SQL query.";
        $productIds = implode(",",$resultSet);
        $selectArray = []; 
        $selectString = "";           
        $secondJoinOnArray = [];
        $joinOnArray = [];
        $joinOnString = "";

        foreach ($attribute as $value) {
            if($value['hashField'])
            {
                continue;
            }

            if($value['conditionalFieldName'])
            {
                $selectArray[] = $value['conditionalFieldName'];
            }
            else{
                $selectArray[] = $value['tableName'].".".$value['fieldName'];
            }
            
            
            if($value['joinOn'] && !in_array($value['joinOn'], $joinOnArray))
            {
                $joinOnArray[] = $value['joinOn'];
            }

            if($value['addOnJoin'] && !in_array($value['addOnJoin'], $secondJoinOnArray))
            {
                $secondJoinOnArray[] = $value['addOnJoin'];
            }
        }

        $joinOnArray = array_merge($joinOnArray, $secondJoinOnArray);

        $selectString = implode(', ', $selectArray);
        $joinOnString = implode(' ', $joinOnArray);

        echo "\n Fetch data.";

        $query = "SELECT {$selectString} FROM object_1 {$joinOnString} WHERE object_1.o_id IN (".$productIds.")";
        return $this->db->fetchAll($query);
    }

    public function truncateTempTable($AttributesConfig){
        $tempTable = $this->commonHelper->getParameter($AttributesConfig, 'Temp Table');

        // truncating temp table
        echo "\n Truncating table - {$tempTable}";
        $sql = "TRUNCATE TABLE {$tempTable}";
        $this->db->query($sql);

    }

    public function createTempMasterTable($AttributesConfig)
    {
        $arrData = $this->commonHelper->getParameter($AttributesConfig, 'Attribute');
        $tempTable = $this->commonHelper->getParameter($AttributesConfig, 'Temp Table');
        $masterTable = $this->commonHelper->getParameter($AttributesConfig, 'Master Table');
        $fieldsArray = [];
        $fieldsString = '';
        foreach ($arrData as $key => $value) {
            if(isset($value['tableAttr']) && $value['tableAttr'])
            {
                $attrType = $value['attrType'];
                $fieldsArray[] = "{$key} {$attrType}";
            }
        }

        $fieldsString = implode(', ', $fieldsArray);

        echo "\n create temp table.";

        // Create B2C/B2C temp table
        $sql = "CREATE TABLE IF NOT EXISTS {$tempTable} (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            {$fieldsString}
            )";
        $this->db->query($sql);

        echo "\n create master table.";

        // Create B2C/B2C temp table
        $sql = "CREATE TABLE IF NOT EXISTS {$masterTable} (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            {$fieldsString}
            )";
        $this->db->query($sql);
    }

    public function insertDataInTemp($arrData, $tempTable)
    {
        echo "\n data insertion started into table - {$tempTable}.";
        $insertArray = [];
        $updateArray = [];

        $keys = $arrData[0];

        foreach ($keys as $key => $value) {
            $insertArray[] = "`".$key."`";
            $updateArray[]= "`".$key."` = `".$key."`";
        }

        $insertArrayString = implode(',',$insertArray);
        $updateArrayString = implode(',',$updateArray);

        $rowCount = 1;
        $sql      = "INSERT INTO `{$tempTable}` ({$insertArrayString}) VALUES";
        $values   = '';
        // $update = " ON DUPLICATE KEY UPDATE {$updateArrayString} ";
        foreach ($arrData as $data) {
            $strData = implode("','",$data);
            // $newData = $data;
            // $id = $data[0];
            // $siopfullcode = $data['4'];
            // if (empty($siopfullcode)) {
            //     if (!empty($data[17])) {
            //         $siopfullcode = $data[17];
            //     } elseif (!empty($data[13])) {
            //         $siopfullcode = $data[13];
            //     }
            // }
            // $newData[4] = $siopfullcode;
            // $record = addslashes(json_encode($newData, true));
            // $hash   = md5($record);
            $values .= "('{$strData}'),";
            // inserting records in batch
            if ($rowCount % 50 == 0) {
                // echo "FIERT \n\n";
                $query = $sql.rtrim($values, ',').$update;
                $this->db->query($query);
                $values = '';
            }
            $rowCount++;
            unset($newData);
        }
        if ($values) {
            $query = $sql.rtrim($values, ',').$update ;
            $this->db->query($query);
        }
    }

}
