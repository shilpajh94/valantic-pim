<?php

namespace B2BSalesforcePTGEMEABundle\PimDataExport\B2B\PTGEMEA;


use Pimcore\Db;
use B2BSalesforcePTGEMEABundle\Tool\Utils;
use B2BSalesforcePTGEMEABundle\Logger\LogLevel;
use B2BSalesforcePTGEMEABundle\PimDataExport\IDataExport;
use B2BSalesforcePTGEMEABundle\PimDataExport\PimDataExportHelper;
use Pimcore\Model\DataObject;

class ProductCategoryProductSalesForceIdForDeletionExport implements IDataExport
{
    private $helper;
    private $db;

    public function __construct()
    {
        $this->db = Db::get();
        $this->helper = new PimDataExportHelper;
    }

    public function exportData()
    {
        $filePath = PTGEU_B2B_SFTP_DOWNLOAD_TEMP_DIR . "PTGEMEA_SF_ID_FOR_DELETION.csv";
        $file = fopen($filePath, "w+");
        $displayKeys = array('B2B_SF_Id_For_Deletion');
        fputcsv($file, $displayKeys);

        $salesForceIds = $this->getAllSFId();
        // $result = [];
        foreach($salesForceIds as $eachSalesForceId){
            $result = [];
            $result[] = $eachSalesForceId;
            fputcsv($file, $result);
        }
        
    }

    public function getAllSFId(){
        $db = Db::get();
        $table = 'object_38';

        $sfIds = [];
        if($table)
        {
            $sql = "SELECT sfIdForDeletion FROM $table WHERE productType='fert' AND published=1 AND (sfIdForDeletion != '' OR sfIdForDeletion is NOT NULL)";
            $sfIds = $db->fetchFirstColumn($sql);
        }

        return $sfIds;
    }

    public function uploadFile()
    {
        $customFileName2 = "PTGEMEA_SF_ID_FOR_DELETION.csv";
        $this->helper->uploadFile($customFileName2);
    }

}
