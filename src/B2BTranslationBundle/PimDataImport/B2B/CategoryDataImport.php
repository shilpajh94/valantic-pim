<?php

namespace B2BTranslationBundle\PimDataImport\B2B;

use Pimcore\Db;
use B2BTranslationBundle\Services\ImportService;
use B2BTranslationBundle\PimDataImport\IDataImport;
use B2BTranslationBundle\PimDataImport\PimDataImportHelper;

class CategoryDataImport implements IDataImport
{
    private $db;
    private $bu;
    private $helper;
    private $filePath;
    private $bUProductClassTableID = [
        'IFS_PTG_US' => '2',
        'CS' => 'CSHierarchy',
        'PTG_EU' => '39',
        'IFS_EMEA' => 'IFSEUProductCategory',
    ];

    public function __construct($bu)
    {
        $this->bu = $bu;
        $this->db = Db::get();
        $this->helper = new PimDataImportHelper;
    }

    public function downloadFile()
    {
        $customFileName = $this->bu."_Category_".date('M').".csv";
        // $this->filePath = $this->helper->downloadFile($customFileName);
        $this->filePath = "/var/www/html/cttfse01/var/tmp/salesforceid-externalid.csv";
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
                        $externalIDStr = $record['External ID'];
                        $salesforceID = $record['Salesforce ID'];

                        echo 'Processing external ID: ' . $externalIDStr.PHP_EOL;

                        $externalIDList = explode('_', $externalIDStr);
                        if($externalIDList[0])
                        {
                            $o_id = $externalIDList[0];
                            $this->updateSalesForceIdByExternalId($salesforceID, $externalIDStr, $o_id);
                        }
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

    public function updateSalesForceIdByExternalId($salesforceID, $externalID, $o_id)
    {
        $classID = $this->bUProductClassTableID[$this->bu];

        $query = "UPDATE object_query_{$classID} SET SalesForce_ID = '{$salesforceID}', externalID ='{$externalID}' WHERE oo_id ='{$o_id}'";
        $this->db->query($query);
        $query = "UPDATE object_store_{$classID} SET SalesForce_ID = '{$salesforceID}', externalID ='{$externalID}' WHERE oo_id ='{$o_id}'";
        $this->db->query($query);
    }
}