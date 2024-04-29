<?php

namespace B2BSalesforcePTGEMEABundle\PimDataImport\B2B;

use Pimcore\Db;
use B2BSalesforcePTGEMEABundle\Services\ImportService;
use B2BSalesforcePTGEMEABundle\PimDataImport\IDataImport;
use B2BSalesforcePTGEMEABundle\PimDataImport\PimDataImportHelper;

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
        // $customFileName = $this->bu."_Category_".date('M').".csv";
        $customFileName = "SF_PRODUCT_CATEGORY_EXTRACT.csv";
        $this->filePath = $this->helper->downloadFile($customFileName);
        // $this->filePath = "/var/www/html/cttfse01/var/tmp/SF_PRODUCT_CATEGORY_EXTRACT.csv";
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
                        $externalIDStr = $record['B2B_EXTERNAL_ID__C'];
                        $salesforceID = $record['ID'];

                        echo 'Processing external ID: ' . $externalIDStr.PHP_EOL;

                        $externalIDList = explode('_', $externalIDStr);
                        if($externalIDList[0])
                        {
                            $id = $externalIDList[0];
                            $this->updateSalesForceIdByExternalId($salesforceID, $externalIDStr, $id);
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

    public function updateSalesForceIdByExternalId($salesforceID, $externalID, $id)
    {
        $classID = $this->bUProductClassTableID[$this->bu];

        $query = "UPDATE object_query_{$classID} SET SalesForce_ID = '{$salesforceID}', externalID ='{$externalID}' WHERE oo_id ='{$id}'";
        $this->db->query($query);
        $query = "UPDATE object_store_{$classID} SET SalesForce_ID = '{$salesforceID}', externalID ='{$externalID}' WHERE oo_id ='{$id}'";
        $this->db->query($query);
    }
}