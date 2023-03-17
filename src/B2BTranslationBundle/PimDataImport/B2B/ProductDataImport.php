<?php

namespace B2BTranslationBundle\PimDataImport\B2B;

use Pimcore\Db;
use B2BTranslationBundle\Services\ImportService;
use B2BTranslationBundle\PimDataImport\IDataImport;
use B2BTranslationBundle\PimDataImport\PimDataImportHelper;

class ProductDataImport implements IDataImport
{
    private $db;
    private $bu;
    private $helper;
    private $filePath;
    private $bUProductClassTableID = [
        'IFS_PTG_US' => '1',
        'CS' => 'CSProducts',
        'PTG_EU' => '38',
        'IFS_EMEA' => 'IFSEUProduct',
    ];

    public function __construct($bu)
    {
        $this->bu = $bu;
        $this->db = Db::get();
        $this->helper = new PimDataImportHelper;
    }

    public function downloadFile()
    {
        $customFileName = $this->bu."_Product_".date('M').".csv";
        $this->filePath = $this->helper->downloadFile($customFileName);
    }

    public function importData()
    {
        try {

            $classID = $this->bUProductClassTableID[$this->bu];
            $validationTrue = $this->helper->checkFieldValidation($classID);
            
            if($validationTrue)
            {
                if(file_exists($this->filePath))
                {
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
                else{
                    echo PHP_EOL;
                    echo "ERROR: File not found";
                    echo PHP_EOL;
                }
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