<?php

/**
 * File Path: Your File path on system
 * Command: cs:one-time-import:region <filePath>
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
    private $db;

    protected function configure()
    {
        $this->setName('b2c:product')
            ->setDescription('B2C Product Data Store to Temp Table');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get();
        $this->commonHelper = \Pimcore::getContainer()->get('app.common_helper');
        $this->B2CProductAttribute = \Pimcore::getContainer()->get('app.config_provider_service')->getB2CAtrributeConfig();
        $B2CProductAttributes = $this->commonHelper->getParameter($this->B2CProductAttribute, 'Product');

        $this->B2BProductAttribute = \Pimcore::getContainer()->get('app.config_provider_service')->getB2BAtrributeConfig();
        $B2BProductAttributes = $this->commonHelper->getParameter($this->B2BProductAttribute, 'Product');

        $this->createB2CProductTempMasterTable($B2CProductAttributes);
        $this->createB2BProductTempMasterTable($B2BProductAttributes);
        
        try {

            // Get all today's modified product
            // $query = "SELECT `o_id` FROM object_1 WHERE  DATE(from_unixtime(`o_modificationDate`)) = CURDATE();";
            $query = "SELECT `o_id` FROM object_1 WHERE  DATE(from_unixtime(`o_modificationDate`)) = '2022-02-08';";
            $resultSet = $this->db->fetchCol($query);

            $productIds = implode(",",$resultSet);

            $selectArray = []; 
            $selectString = "";           
            $secondJoinOnArray = [];
            $joinOnArray = [];
            $joinOnString = "";

            foreach ($B2BProductAttributes as $attrKey => $value) {
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

            $query = "SELECT {$selectString} FROM object_1 {$joinOnString} WHERE object_1.o_id IN (".$productIds.")";
            $resultSetProductsDetail = $this->db->fetchAll($query);

            // p_r($resultSetProductsDetail);
            // die;

            // Get all today's modified product
            // $query = "SELECT * FROM object_1 WHERE `o_id` IN (".$productIds.")";
            // $resultSetProductsDetail = $this->db->fetchAll($query);

            $dataInsert = array();
            foreach ($resultSetProductsDetail as $productArray) {
                $basicData = [];
                $relationalData = []; 
                $basicHash = '';
                $relationalHash = '';
                // foreach ($B2CAttributes['Product']['attr'] as $attrKey => $value) {
                //     $basicData[$attrKey] = $productArray[$attrKey];
                // }

                // foreach ($B2CAttributes['Product']['relationalAttr'] as $attrKey => $value) {
                //     $relationalData[$attrKey] = $productArray[$attrKey];
                // }

                // if($basicData || $relationalData)
                // {
                //     $basicHash = md5(json_encode($basicData, true));
                //     // $relationalHash = md5(json_encode($relationalData, true));

                //     $data = array_merge($basicData,$relationalData);
                //     $data['basicHash'] = $basicHash;
                //     $data['relationalHash'] = $relationalHash;

                //     $dataInsert[] = $productArray;
                // }

                $dataInsert[] = $productArray;
            }

            if($dataInsert)
            {
                $this->insertDataInTemp($dataInsert);
            }

            echo " \n Insert Finished";
            
            die;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
        echo "Here";
        die;
        
    }

    public function createB2CProductTempMasterTable($arrData)
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
        // Create B2C Product's temp and master table
        $sql = "CREATE TABLE IF NOT EXISTS b2c_product_temp (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            {$fieldsString}
            )";
        $success = $this->db->query($sql);
    }

    public function createB2BProductTempMasterTable($arrData)
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
        // Create B2C Product's temp and master table
        $sql = "CREATE TABLE IF NOT EXISTS b2b_product_temp (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            {$fieldsString}
            )";
        $success = $this->db->query($sql);
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
        $sql      = "INSERT INTO `b2b_product_temp` ({$insertArrayString}) VALUES";
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
