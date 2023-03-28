<?php

namespace B2BTranslationBundle\PimDataImport\B2B;

use Pimcore\Db;
use B2BTranslationBundle\Services\ImportService;
use B2BTranslationBundle\PimDataImport\IDataImport;
use B2BTranslationBundle\PimDataImport\PimDataImportHelper;
use \Pimcore\Model\DataObject;

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
        // $customFileName = $this->bu."_Product_".date('M').".csv";
        $customFileName = "SF_PRODUCT_EXTRACT.csv";
        $this->filePath = $this->helper->downloadFile($customFileName);
        // $this->filePath = "/var/www/html/cttfse01/var/tmp/SF_PRODUCT_EXTRACT.csv";
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
                    \Pimcore\Model\Version::disable(); 

                    $csvInfo            = ImportService::getCSVData($this->filePath);
                    $header = $csvInfo['header'];
                    $data  = $csvInfo['data'];

                    echo 'Importing File: ' . $this->filePath.PHP_EOL;
                    echo "No of Records: ". count($data). PHP_EOL;

                    $t1 = time();
                    p_r('Processing started at: ' . date('h:i:s', $t1));
                    p_r('------------------------------------------------');
                    foreach($data as $key => $row){   
                        $record = array_combine($header, $row);
                        
                        $externalID = $record['B2B_EXTERNAL_ID__C'];
                        $salesforceID = $record['ID'];

                        echo "Processing ". ($key + 1) .": B2B_EXTERNAL_ID__C- ". $externalID. PHP_EOL;
                        if($externalID)
                        {
                            $product = DataObject\Product::getByExternalID($externalID, 1);
                            if($product)
                            {
                                $product->setSalesForce_ID($salesforceID);
                                $product->save();
                            }
                        }
                    }

                    p_r('--------------Total Execution Time---------------');
                    p_r('Processing completed after: ' . (abs(time() - $t1) / 60) . ' mnt');

                    \Pimcore\Model\Version::disable(); 
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
}