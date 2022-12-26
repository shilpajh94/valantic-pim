<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImportBundle\Model\Import;


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
      $record = $this->db->fetchAll($sql);
        if($record) {
          $columns[] = "Log Id";
          $columns[] = "Id";
          $columns[] = "Status Code";
          $columns[] = "Failed Reason";
          $columns[] = "Created At";
          $columns[] = "Material";
          $columns[] = "Sales Organization";
          $columns[] = "Distribution Channel";
          $fileName = "PIM_MaterialSales_".date('mdY')."_Logs".'.csv';

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
      $record = $this->db->fetchAll($sql);

        if($record) {
          // $columns = array_keys(current($record));
          $columns[] = "Log Id";
          $columns[] = "Id";
          $columns[] = "Status Code";
          $columns[] = "Failed Reason";
          $columns[] = "Created At";

          $fileName = "PIM_Material_".date('mdY')."_Logs".'.csv';

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
      $sql = "SELECT * FROM `material_plant_import_log` WHERE statusCode = 'FAILED' AND createdAt >= '$scriptStartTime'";
      $record = $this->db->fetchAll($sql); 
        if($record) {
          $columns[] = "Log Id";
          $columns[] = "Id";
          $columns[] = "Status Code";
          $columns[] = "Failed Reason";
          $columns[] = "Created At";
          $columns[] = "Material";
          $columns[] = "Plant";
          $columns[] = "Sales Organization";
          $columns[] = "Distribution Channel";
          $fileName = "PIM_MaterialPlant_".date('mdY')."_Logs".'.csv';

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
        $newFilename = Element\Service::getSaveCopyName('asset', $fileName,\Pimcore\Model\Asset::getByPath("$parentFolder"));

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
          $li = '';
            foreach ($fileId as $id)
            {
            $objAsset = \Pimcore\Model\Asset::getById($id);
            // $link = $this->getFaliureFilesDeeplink($objAsset);
            }
            // $templateParam['file_url'] = $link;
            $mail = new \Pimcore\Mail();
            foreach ($email_Id as $eachBccEmailID) {
              $mail->addBcc($eachBccEmailID);
          }
            $mail->setSubject("SAP BW - Failure SKU(s) list");
            $mail->setDocument($document);
            // $mail->setParams($templateParam);
            $mail->createAttachment($objAsset->getData(),'',$objAsset->getFilename());

            
            $mailSent = $mail->send();
              if ($mailSent) {
                return TRUE;
              } else {
                return FALSE;
              }
            } catch (\Exception $ex) {
        }
      }

    private function getFaliureFilesDeeplink($asset) 
    {
      $host = APPLICATION_HOST;
      $link = $host. "/admin/login/deeplink?";
      $link .= 'asset_' . $asset->getId() . '_text';
      return $link;
    }

    public function usersForEmail () 
    {
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
          if (Mail::isValidEmailAddress($users->getEmail())) {
            $email_Id[] = $users->getEmail();
          }
        }
        return $email_Id;
    }  
}
