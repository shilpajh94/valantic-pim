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
use ContitechCS\ImportBundle\Services\ImportConstants;

use Pimcore\Db;

class B2CProductCommand extends AbstractCommand
{
    private $commonHelper;
    private $masterTable;
    private $tempTable;
    private $db;

    protected function configure()
    {
        $this->setName('b2c:product')
            ->setDescription('B2C Product Data Store to Temp Table');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        echo "\n Script started!!!";
        $this->db = Db::get();

        $this->commonHelper = \Pimcore::getContainer()->get('app.common_helper');
        
        // create B2C Temp and Master Table
        $B2CProductAttributesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getB2CProductAtrributeConfig();
        $B2CProductAttributes = $this->commonHelper->getParameter($B2CProductAttributesConfig, 'Product');
        $this->masterTable = $this->commonHelper->getParameter($B2CProductAttributesConfig, 'Master Table');
        $this->tempTable = $this->commonHelper->getParameter($B2CProductAttributesConfig, 'Temp Table');
        $this->createTempMasterTable($B2CProductAttributes);

        // create B2B Temp and Master Table
        $B2BProductAttributesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getB2BProductAtrributeConfig();
        $B2BProductAttributes = $this->commonHelper->getParameter($B2BProductAttributesConfig, 'Product');
        $this->masterTable = $this->commonHelper->getParameter($B2BProductAttributesConfig, 'Master Table');
        $this->tempTable = $this->commonHelper->getParameter($B2BProductAttributesConfig, 'Temp Table');
        $this->createTempMasterTable($B2BProductAttributes);
        
        $B2CB2BAttributeArray[]= $B2CProductAttributes;
        $B2CB2BAttributeArray[]= $B2BProductAttributes;

        try {

            // get all today's modified product
            $resultSet = $this->getTodaysModifiedRecords();

            // loop b2b and b2c array

            foreach ($B2CB2BAttributeArray as $attribute) {

                // prepare sql query and fetch the data from the object table
                $resultSetProductsDetail = $this->prepareQueryAndFetchDbData($attribute, $resultSet);

                // insert data in the temp tables
                $this->insertDataInTemp($resultSetProductsDetail);

            }
            
            // p_r($resultSetProductsDetail);
            // die;

            // Get all today's modified product
            // $query = "SELECT * FROM object_1 WHERE `o_id` IN (".$productIds.")";
            // $resultSetProductsDetail = $this->db->fetchAll($query);

            // $dataInsert = array();
            // foreach ($resultSetProductsDetail as $productArray) {
            //     $basicData = [];
            //     $relationalData = []; 
            //     $basicHash = '';
            //     $relationalHash = '';
            //     // foreach ($B2CAttributes['Product']['attr'] as $attrKey => $value) {
            //     //     $basicData[$attrKey] = $productArray[$attrKey];
            //     // }

            //     // foreach ($B2CAttributes['Product']['relationalAttr'] as $attrKey => $value) {
            //     //     $relationalData[$attrKey] = $productArray[$attrKey];
            //     // }

            //     // if($basicData || $relationalData)
            //     // {
            //     //     $basicHash = md5(json_encode($basicData, true));
            //     //     // $relationalHash = md5(json_encode($relationalData, true));

            //     //     $data = array_merge($basicData,$relationalData);
            //     //     $data['basicHash'] = $basicHash;
            //     //     $data['relationalHash'] = $relationalHash;

            //     //     $dataInsert[] = $productArray;
            //     // }

            //     $dataInsert[] = $productArray;
            // }

            // if($dataInsert)
            // {
            //     $this->insertDataInTemp($dataInsert);
            // }

            
            
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
        echo "\n Script finished!!!";
        die;
    }

    public function getTodaysModifiedRecords()
    {
        echo "\n Fetching modified record !!!";
        // $query = "SELECT `o_id` FROM object_1 WHERE  DATE(from_unixtime(`o_modificationDate`)) = CURDATE();";
        $query = "SELECT `o_id` FROM object_1 WHERE  DATE(from_unixtime(`o_modificationDate`)) = '2022-02-08';";
        return $this->db->fetchCol($query);
    }

    public function prepareQueryAndFetchDbData($attribute, $resultSet)
    {
        echo "\n Preparing SQL query !!!";
        $productIds = implode(",",$resultSet);
        $selectArray = []; 
        $selectString = "";           
        $secondJoinOnArray = [];
        $joinOnArray = [];
        $joinOnString = "";

        foreach ($attribute as $value) {
            $selectArray[] = $value['tableName'].".".$value['fieldName'];
            
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

        echo "\n Fetch data !!!";

        $query = "SELECT {$selectString} FROM object_1 {$joinOnString} WHERE object_1.o_id IN (".$productIds.")";
        return $this->db->fetchAll($query);
    }

    public function createTempMasterTable($arrData)
    {
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

        echo "\n create temp table !!!";

        // Create B2C/B2C temp table
        $sql = "CREATE TABLE IF NOT EXISTS {$this->tempTable} (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            {$fieldsString}
            )";
        $this->db->query($sql);

        echo "\n create master table !!!";

        // Create B2C/B2C temp table
        $sql = "CREATE TABLE IF NOT EXISTS {$this->masterTable} (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            {$fieldsString}
            )";
        $this->db->query($sql);
    }

    public function insertDataInTemp($arrData)
    {
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
        $sql      = "INSERT INTO `{$this->tempTable}` ({$insertArrayString}) VALUES";
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
