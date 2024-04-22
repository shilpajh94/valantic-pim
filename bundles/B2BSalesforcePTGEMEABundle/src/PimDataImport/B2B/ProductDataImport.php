<?php

namespace B2BSalesforcePTGEMEABundle\PimDataImport\B2B;

use Pimcore\Db;
use B2BSalesforcePTGEMEABundle\Services\ImportService;
use B2BSalesforcePTGEMEABundle\PimDataImport\IDataImport;
use B2BSalesforcePTGEMEABundle\PimDataImport\PimDataImportHelper;
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

     public function downloadFile() {
        $customFileName = "/var/www/html/contiTech_CBS/var/tmp/B2B_SALESFORCE_PTGEU_SFID_UPDATE.csv";
        $this->filePath = $this->helper->downloadExtSfidFile($customFileName);
    }    

    public function importData()
    {
        try {
            $classID = $this->bUProductClassTableID[$this->bu];
            $validationTrue = $this->helper->checkFieldExtSfidValidation($classID);

            if($validationTrue) {

                if(file_exists($this->filePath)) {

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
                    
                        $externalId = $record['B2B_ExternalId__c'];
                        $salesforceId = $record['B2B_SfIdForDeletion__c'];

                        echo "Processing ". ($key + 1) .": B2B_ExternalId__c- ". $externalId. PHP_EOL;

                        if($externalId) {
                            $product = $this->helper->getProductByExternalId($classID, $this->bu, $externalId);
                            if($product) {
                                $this->helper->setSfIdByExternalId($classID, $this->bu, $externalId, $salesforceId); 
                            }
                        }
                    }

                    p_r('--------------Total Execution Time---------------');
                    p_r('Processing completed after: ' . (abs(time() - $t1) / 60) . ' mnt');

                    \Pimcore\Model\Version::enable(); 
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