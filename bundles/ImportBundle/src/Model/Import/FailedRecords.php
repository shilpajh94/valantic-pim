<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImportBundle\Model\Import;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Pimcore\Mail;
use Pimcore\Model\Asset;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;
use Pimcore\Model\Element;

/**
 * Description of failed Imported Records
 *
 * @author
 */
class FailedRecords {

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

    public function managedFailedRecords($commandType, $scriptStartTime) {

      if($commandType == 'salesMaterial'){

        $this->manageSalesMaterialImportLog($scriptStartTime);

      }

      if($commandType == 'product'){

        $this->manageProductMaterialLog($scriptStartTime);
        
      }

      if($commandType == 'plantMaterial'){

        $this->managePlantImportLog($scriptStartTime);

      }

    }

    private function manageSalesMaterialImportLog($scriptStartTime)
    {
      $sql = "SELECT * FROM material_sales_import_log WHERE statusCode = 'FAILED' AND createdAt >= '$scriptStartTime'";
      $record = $this->db->fetchAllAssociative($sql);
        if($record) {
          $columns[] = self::LOG_ID;
          $columns[] = "Id";
          $columns[] = self::STATUS_CODE;
          $columns[] = self::FAILED_REASON;
          $columns[] = self::CREATED_AT;
          $columns[] = "Material";
          $columns[] = "Sales Organization";
          $columns[] = "Distribution Channel";
          $fileName = "PIM_MaterialSales_".date('mdY').self::LOGS.'.csv';

          $fileResource = fopen(PIMCORE_SYSTEM_TEMP_DIRECTORY.'/'.$fileName, 'w');
          fputcsv($fileResource, $columns, ',');
            foreach($record as $arr)
            {
              $row    = [];
              $row[]  = $arr['logId'];
              $row[]  = $arr['id'];
              $row[]  = $arr['statusCode'];
              $row[]  = $arr['failedReason'];
              $row[]  = $arr['createdAt'];
              list($material,$salesorganization,$distributionchannel) = explode('$',$arr['id']);
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
      $sql = "SELECT * FROM material_import_log WHERE statusCode = 'FAILED' AND createdAt >= '$scriptStartTime'";
      $record = $this->db->fetchAllAssociative($sql);

        if($record) {
          $columns[] = self::LOG_ID;
          $columns[] = "Id";
          $columns[] = self::STATUS_CODE;
          $columns[] = self::FAILED_REASON;
          $columns[] = self::CREATED_AT;

          $fileName = "PIM_Material_".date('mdY').self::LOGS.'.csv';

          $fileResource = fopen(PIMCORE_SYSTEM_TEMP_DIRECTORY.'/'.$fileName, 'w');
          fputcsv($fileResource, $columns, ',');
            foreach($record as $arr)
            {
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

    private function managePlantImportLog($scriptStartTime)
    {
      $sql = "SELECT * FROM `material_plant_import_log` WHERE statusCode = 'FAILED'
       AND createdAt >= '$scriptStartTime'";
      $record = $this->db->fetchAllAssociative($sql);
        if($record) {
          $columns[] = self::LOG_ID;
          $columns[] = "Id";
          $columns[] = self::STATUS_CODE;
          $columns[] = self::FAILED_REASON;
          $columns[] = self::CREATED_AT;
          $columns[] = "Material";
          $columns[] = "Plant";
          $columns[] = "Sales Organization";
          $columns[] = "Distribution Channel";
          $fileName = "PIM_MaterialPlant_".date('mdY').self::LOGS.'.csv';

          $fileResource = fopen(PIMCORE_SYSTEM_TEMP_DIRECTORY.'/'.$fileName, 'w');
          fputcsv($fileResource, $columns, ',');
            foreach($record as $arr)
            {
              $row    = [];
              $row[]  = $arr['logId'];
              $row[]  = $arr['id'];
              $row[]  = $arr['statusCode'];
              $row[]  = $arr['failedReason'];
              $row[]  = $arr['createdAt'];
              list($material,$plant,$salesorganization,$distributionchannel) = explode('$',$arr['id']);
              $row[]  = $material;
              $row[]  = $plant;
              $row[]  = $salesorganization;
              $row[]  = $distributionchannel;
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
      $parentPath = FAILURE_RECORDS_FOLDER."/".$subFolder;
     
    
      $obj   = \Pimcore\Model\Asset\Service::createFolderByPath("$parentPath");
     
      $parentFolder = $obj->getPath().$obj->getFileName();
        
        $newAsset = new \Pimcore\Model\Asset();
        $newFilename = Element\Service::getSafeCopyName($fileName,\Pimcore\Model\Asset::getByPath("$parentFolder"));

        $newAsset->setFilename($newFilename);
        $newAsset->setData(file_get_contents(PIMCORE_SYSTEM_TEMP_DIRECTORY.'/'.$fileName));

        $newAsset->setParent(\Pimcore\Model\Asset::getByPath("$parentFolder"));
        $newAsset->save();
      }

      public function sendNotificationsEmail($fileId)
      {
        $email_Id = $this->usersForEmail ();
        try {
          $document = Document\Email::getByPath(FAILURE_RECORDS_EMAIL_TEMPLATE);
          foreach ($fileId as $id)
          {
            $objAsset = \Pimcore\Model\Asset::getById($id);
          }
            $mail = new \Pimcore\Mail();
            foreach ($email_Id as $eachBccEmailID) {
              $mail->addBcc($eachBccEmailID);
          }
          $mail->Subject("SAP BW - Failure SKU(s) list");
          $mail->setDocument($document);
          $mail->attach($objAsset->getData(),$objAsset->getFilename(),$objAsset->getMimeType());
          $mail->setIgnoreDebugMode(true);
          $mailSent = $mail->send();
          return $mailSent !== null;

          } catch (\Exception $ex) {
            p_r($ex);
          }
      }

    public function usersForEmail ()
    {
      $emailValidator = new EmailValidator();
      $roleClass = new \Pimcore\Model\User\Role\Listing();
      $roleClass->setCondition("name IN ('ProductManager','ApplicationAdmin')");
      $userRoles = $roleClass->getRoles();
      $role_id = [];

        foreach($userRoles as $obj) {
          $role_id[] = $obj->getId();
        }

      $role_id = implode(',',$role_id);
      $list = new \Pimcore\Model\User\Listing();
      $list->setCondition("roles IN ($role_id)");
      $list->load();
      $userList = $list->getUsers();
      $email_Id = [];
    
        foreach ($userList as $users) {
          if ($emailValidator->isValid($users->getEmail(), new RFCValidation())) {
            $email_Id[] = $users->getEmail();
          }
        }
        return $email_Id;
    }
}
