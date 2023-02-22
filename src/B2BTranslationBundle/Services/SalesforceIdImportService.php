<?php
namespace B2BTranslationBundle\Services;

use Pimcore\Db;
use B2BTranslationBundle\Services\ImportService;
use \Pimcore\Model\DataObject;

class SalesforceIdImportService
{
    private $db;
    private $filePath;

    public function __construct()
    {
        $this->db = Db::get();
        
    }

    public function import()
    {
        echo "Mahesh lakher"; 

        try {
            $sapFileFeeder      = \Pimcore::getContainer()->get('b2b_translation.sap_file_feeder_service');
            $this->filePath     = $sapFileFeeder->execFileFeeder('plantMaterial');

            $csvInfo            = ImportService::getCSVData($this->filePath);
            $header = $csvInfo['header'];
            $data  = $csvInfo['data'];

            // remove once testing done
            // $data = (array_slice($data, 1, 5));

            echo 'Importing File: ' . $this->filePath.PHP_EOL;
            $time = new \DateTime();
            
            foreach($data as $row){   
                $record = array_combine($header, $row);
                $myObject = DataObject\Product::getByExternalID($record['External ID'], ['limit' => 1]);
                if(isset($myObject)){
                    $myObject->setSalesforceID($record['Salesforce ID']); 
                    $myObject->save();
                }
                
            } 
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }
        
            
    }    
}