<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 namespace PTGEU\ImportBundle\Services;


use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Pimcore\Model\Document;
use Pimcore\Model\Element;

/**
 * Description of failed Imported Records
 *
 * @author
 */
class FailedRecords
{

    /**
     * Function is constructor and set the db connection
     */
    private $db;

    const LOG_ID = "Log Id";
    const STATUS_CODE = "Status Code";
    const FAILED_REASON = "Failed Reason";
    const CREATED_AT = "Created At";
    const LOGS = "_Logs";

    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }

    public function managedFailedRecords($commandType, $scriptStartTime)
    {

      if ($commandType == 'salesMaterial') {

        $this->manageSalesMaterialImportLog($scriptStartTime);

      }

      if ($commandType == 'product') {
        $this->manageProductMaterialLog($scriptStartTime);
        
      }

      if ($commandType == 'plantMaterial') {

        $this->managePlantImportLog($scriptStartTime);
       

      }

    }

    private function manageSalesMaterialImportLog($scriptStartTime)
    {
      $sql = "SELECT * FROM ptgeu_material_sales_import_log
      WHERE statusCode = 'FAILED' AND createdAt >= '$scriptStartTime'";
      $record = $this->db->fetchAllAssociative($sql);
     
        if ($record) {
          $columns[] = self::LOG_ID;
          $columns[] = "Id";
          $columns[] = self::STATUS_CODE;
          $columns[] = self::FAILED_REASON;
          $columns[] = self::CREATED_AT;
          $columns[] = "Material";
          $columns[] = "Sales Organization";
          $columns[] = "Distribution Channel";
          $fileName = "PIM_61_MaterialSales_".date('mdY').self::LOGS.'.csv';

          $fileResource = fopen(PIMCORE_SYSTEM_TEMP_DIRECTORY.'/'.$fileName, 'w');
          fputcsv($fileResource, $columns, ',');
            foreach ($record as $arr) {
              $row    = [];
              $row[]  = $arr['logId'];
              $row[]  = $arr['id'];
              $row[]  = $arr['statusCode'];
              $row[]  = $arr['failedReason'];
              $row[]  = $arr['createdAt'];
              list($material,$salesorganization,$distributionchannel) = explode('$', $arr['id']);
              $row[]  = $material;
              $row[]  = $salesorganization;
              $row[]  = $distributionchannel;

              fputcsv($fileResource, $row, ',');
            }
              $this->productFailureRecordsCSV($fileName);
            }
    }

    private function manageProductMaterialLog($scriptStartTime)
    {
      $sql = "SELECT * FROM ptgeu_material_import_log
      WHERE statusCode = 'FAILED' AND createdAt >= '$scriptStartTime' order by siopfullcode";
      
      $record = $this->db->fetchAllAssociative($sql);
        if ($record) {
          $columns[] = self::LOG_ID;
          $columns[] = "Id";
          $columns[] = "Material Description";
          $columns[] = "Old Material";
          $columns[] = self::STATUS_CODE;
          $columns[] = self::FAILED_REASON;
          $columns[] = self::CREATED_AT;

          $fileName = "PIM_61_Material_".date('mdY').self::LOGS.'.csv';

          $fileResource = fopen(PIMCORE_SYSTEM_TEMP_DIRECTORY.'/'.$fileName, 'w');
          fputcsv($fileResource, $columns, ',');
            foreach ($record as $arr) {
              $record = explode(",", $arr['record']);
              // if column number changes in the sap file for
              //Material Description then we need to update it here as well.
              $sapDescription = str_replace('"', "", $record[2]);
              // if column number changes in the sap file for
              // Old Material then we need to update it here as well.
              $oldMaterialCode = str_replace('"', "", $record[6]);
              $row    = [];
              $row[]  = $arr['logId'];
              $row[]  = $arr['id'];
              $row[]  = $sapDescription;
              $row[]  = $oldMaterialCode;
              $row[]  = $arr['statusCode'];
              $row[]  = $arr['failedReason'];
              $row[]  = $arr['createdAt'];

              fputcsv($fileResource, $row, ',');
            }
              $this->productFailureRecordsCSV($fileName);
            }
            
    }

    private function managePlantImportLog($scriptStartTime)
    {
      $sql = "SELECT * FROM `ptgeu_material_plant_import_log` WHERE statusCode = 'FAILED'
       AND createdAt >= '$scriptStartTime'";
      $record = $this->db->fetchAllAssociative($sql);
    
     
        if ($record) {
          $columns[] = self::LOG_ID;
          $columns[] = "Id";
          $columns[] = self::STATUS_CODE;
          $columns[] = self::FAILED_REASON;
          $columns[] = self::CREATED_AT;
          $fileName = "PIM_61_MaterialPlant_".date('mdY')."_Logs".'.csv';

          $columns[] = self::LOG_ID;



          $fileResource = fopen(PIMCORE_SYSTEM_TEMP_DIRECTORY.'/'.$fileName, 'w');
          fputcsv($fileResource, $columns, ',');
            foreach ($record as $arr) {
              /* if column number changes in the sap file for these fields then
                  we need to update it here as well.
              */
              $record = explode(",", $arr['record']);
              $row    = [];
              $row[]  = $arr['logId'];
              $row[]  = $arr['id'];
              $row[]  = $arr['statusCode'];
              $row[]  = $arr['failedReason'];
              $row[]  = $arr['createdAt'];
              fputcsv($fileResource, $row, ',');
            }
              $this->productFailureRecordsCSV($fileName);
        }
    }

    /**
	 * productFailureRecordsCSV Function
	 * This method will generate csv file using Core PHP File methods
	 *
	 * @param String $fileName
	 * @return void
	 *
	 */
  protected function productFailureRecordsCSV($fileName)
  {
      $subFolder = date('Y')."/".date('F');
      $parentPath = FAILURE_RECORDS_FOLDER_PTGEU."/".$subFolder;
      $obj = \Pimcore\Model\Asset\Service::createFolderByPath("$parentPath");
      try {
          $parentFolder = $obj->getPath().$obj->getFileName();
          $newAsset = new \Pimcore\Model\Asset();
          $newFilename = Element\Service::getSafeCopyName($fileName, \Pimcore\Model\Asset::getByPath("$parentFolder"));
          $newAsset->setFilename($newFilename);
          $newAsset->setData(file_get_contents(PIMCORE_SYSTEM_TEMP_DIRECTORY.'/'.$fileName));
          $newAsset->setParent(\Pimcore\Model\Asset::getByPath("$parentFolder"));
          $newAsset->save();
      } catch (\Exception $th) {
          p_r($th);
      }
  }
  

      public function sendNotificationsEmail($fileId)
      {
        
        $emailId = $this->usersForEmail();
        $mail = new \Pimcore\Mail();
        try {
          $document = Document\Email::getByPath(FAILURE_RECORDS_EMAIL_TEMPLATE);
          foreach ($fileId as $id) {
            $objAsset = \Pimcore\Model\Asset::getById($id);
            
            $mail->attach($objAsset->getData(), $objAsset->getFilename(), $objAsset->getMimeType());

          }
            foreach ($emailId as $eachBccEmailID) {
              $mail->addBcc($eachBccEmailID);
          }
          $document = Document\Email::getByPath(PTGEU_FAILURE_RECORDS_EMAIL_TEMPLATE);
          $mail->Subject("SAP BW - Failure SKU(s) list");
          $mail->setDocument($document);
          $mail->setIgnoreDebugMode(true);
          $mailSent = $mail->send();
          return $mailSent !== null;

          } catch (\Exception $ex) {
            p_r($ex);
          }
      }

    public function usersForEmail()
    {
      $emailValidator = new EmailValidator();
      $roleClass = new \Pimcore\Model\User\Role\Listing();
      $roleClass->setCondition("name IN ('ProductManager','ApplicationAdmin')");
      $userRoles = $roleClass->getRoles();
      $roleId = [];

        foreach ($userRoles as $obj) {
          $roleid[] = $obj->getId();
        }

      $roleId = implode(',', $roleid);
      $list = new \Pimcore\Model\User\Listing();
      $list->setCondition("roles IN ($roleId)");
      $list->load();
      $userList = $list->getUsers();
      $emailId = [];
    
        foreach ($userList as $users) {
          if ($emailValidator->isValid($users->getEmail(), new RFCValidation())) {
            $emailId[] = $users->getEmail();
          }
        }
        return $emailId;
    }
}
