<?php
namespace B2BTranslationBundle\Services;

use Pimcore\Db;
use B2BTranslationBundle\Services\ImportService;

class SalesforceIdImportService
{
    private $db;
    private $bu;
    private $filePath;
    private $bUProductClassTableID = [
        'IFS_PTG_US' => '1',
        'CS_US' => 'CSProducts',
        'PTG_EU' => 'PTGEUProduct',
        'IFS_EU' => 'IFSEUProduct',
    ];

    public function __construct()
    {
        $this->db = Db::get();
        
    }

    public function import($bu)
    {
        try {
            $sapFileFeeder      = \Pimcore::getContainer()->get('b2b_translation.sap_file_feeder_service');
            $this->filePath     = $sapFileFeeder->execFileFeeder('plantMaterial');
            $this->bu                 = $bu;

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
            } 
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }
        
            
    }    

    public function updateSalesForceIdByExternalId($salesforceID, $externalID)
    {
        $classID = $this->bUProductClassTableID[$this->bu];

        $query = "UPDATE object_query_{$classID} SET SalesForce_ID = '{$salesforceID}' WHERE externalID ='{$externalID}'";
        $this->db->query($query);
        $query = "UPDATE object_store_{$classID} SET SalesForce_ID = '{$salesforceID}' WHERE externalID ='{$externalID}'";
        $this->db->query($query);
    }
}