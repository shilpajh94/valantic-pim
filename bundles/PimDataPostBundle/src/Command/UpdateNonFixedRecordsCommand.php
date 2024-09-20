<?php

/**
 * File Path: Your File path on system
 * Command: b2c:product <filePath>
 * Des: Region data import script.
 */

namespace PimDataPostBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;
use Pimcore\Mail;
use Pimcore\Model\Asset;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject;
use Pimcore\Model\Element;

class UpdateNonFixedRecordsCommand extends AbstractCommand
{
    private $db;

    protected function configure()
    {
        $this->setName('conti:datapost:send-email-and-update-nonfixed-records')
            ->setDescription('Send email and update nonfixed records');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        
        $this->db = Db::get();

        $sql = "SELECT * from salesforce_integration_b2b_pimcore_failed_record where status = 'NON-FIXED'";
        $nonFixedRecords = $this->db->fetchAllAssociative($sql);
        
        if(count($nonFixedRecords) > 0){
            $fileId = $this->createCSVFile($nonFixedRecords);
            $this->sendNotificationsEmail($fileId);
        }

        $updateQuery = "UPDATE salesforce_integration_b2b_pimcore_failed_record set status = 'Fixed'";
        $this->db->executeQuery($updateQuery);

        return 1;
    }


    public function sendNotificationsEmail($fileId)
    {
      
        $email_Id = array(
            'rajesh.kumar4@happiestminds.com',
            'gaurav.tyagi@happiestminds.com',
            'aman.sharma2@happiestminds.com',
            'susmita.mallick@happiestminds.com'
        );
      $mail = new \Pimcore\Mail();
      try {
          $objAsset = \Pimcore\Model\Asset::getById($fileId);
          $mail->attach($objAsset->getData(),$objAsset->getFilename(),$objAsset->getMimeType());

          foreach ($email_Id as $eachBccEmailID) {
            $mail->addBcc($eachBccEmailID);
        }
        $mail->Subject('B2B Salesforce - Non-Fixed Records Found In Failed Table');
        $mail->setDocument('/FailureRecordEmail/B2BNonFixedRecordsEmailTemplate');
        $mail->setIgnoreDebugMode(true);
        $mailSent = $mail->send();
        return $mailSent !== null;

        } catch (\Exception $ex) {
          p_r($ex);
        }
    }

    public function createCSVFile($record){
        if($record) {
          $columns[] = "Pim Id";
          $columns[] = 'SFObjectType';
          $columns[] = 'Failure Message';
          $columns[] = 'TimeStamp';
          $fileName = "B2B_SalesForce_NonFixed_Records_".date('mdY').'.csv';

          $fileResource = fopen(PIMCORE_PROJECT_ROOT.'/var'.'/'.'B2B/'.$fileName, 'w');
          fputcsv($fileResource, $columns, ',');
            foreach($record as $arr)
            {
              $row    = [];
              $row[]  = $arr['pimId'];
              $row[]  = $arr['SFObjectType'];
              $row[]  = $arr['failureMessage'];
              $row[]  = $arr['timestamp'];
              fputcsv($fileResource, $row, ',');
            }
        }

        $subFolder = date('Y')."/".date('F');
        $parentPath = 'B2B_NonFixed_Records'."/".$subFolder;
        
        
        $obj   = \Pimcore\Model\Asset\Service::createFolderByPath("$parentPath");
        
        $parentFolder = $obj->getPath().$obj->getFileName();
        $newAsset = new \Pimcore\Model\Asset();
        $newFilename = Element\Service::getSafeCopyName($fileName,\Pimcore\Model\Asset::getByPath("$parentFolder"));
        $newAsset->setFilename($newFilename);
        $newAsset->setData(file_get_contents(PIMCORE_PROJECT_ROOT.'/var/B2B/'.$fileName));
        $newAsset->setParent(\Pimcore\Model\Asset::getByPath("$parentFolder"));
        $newAsset->save();
        return $newAsset->getId();
    }
}