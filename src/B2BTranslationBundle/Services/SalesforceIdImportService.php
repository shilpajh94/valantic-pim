<?php
namespace B2BTranslationBundle\Services;

use Pimcore\Db;
use B2BTranslationBundle\Services\ImportService;
use \Pimcore\Model\DataObject;

class SalesforceIdImportService
{
    private $db;
    private $classID;
    private $filePath;

    public function __construct()
    {
        $this->db = Db::get();
        
    }

    public function import($classID)
    {
        try {
            $sapFileFeeder      = \Pimcore::getContainer()->get('b2b_translation.sap_file_feeder_service');
            $this->filePath     = $sapFileFeeder->execFileFeeder('plantMaterial');
            $this->classID      = $classID;

            $csvInfo            = ImportService::getCSVData($this->filePath);
            $header = $csvInfo['header'];
            $data  = $csvInfo['data'];

            echo 'Importing File: ' . $this->filePath.PHP_EOL;
            
            foreach($data as $row){   
                $record = array_combine($header, $row);
                $externalID = $record['External ID'];
                $salesforceID = $record['Salesforce ID'];

                echo 'Processing external ID: ' . $externalID.PHP_EOL;

                $this->updateSalesForceIdByExternalId($salesforceID, $externalID);
                
                
                // # update salesforce ID using object
                // $myObject = DataObject\Product::getByExternalID($record['External ID'], ['limit' => 1]);
                // if(isset($myObject)){
                //     $myObject->setSalesforceID($record['Salesforce ID']); 
                //     $myObject->save();
                //     p_r($myObject->getId()); 
                // }
                
            } 
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }
        
            
    }    

    public function updateSalesForceIdByExternalId($salesforceID, $externalID)
    {
        $query = "UPDATE object_query_{$this->classID} SET salesforceID = '{$salesforceID}' WHERE externalID ='{$externalID}'";
        $this->db->query($query);
        $query = "UPDATE object_store_{$this->classID} SET salesforceID = '{$salesforceID}' WHERE externalID ='{$externalID}'";
        $this->db->query($query);
    }
}