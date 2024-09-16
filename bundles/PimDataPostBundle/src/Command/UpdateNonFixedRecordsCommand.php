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
            $this->sendEmail();
        }

        $updateQuery = "UPDATE salesforce_integration_b2b_pimcore_failed_record set status = 'Fixed'";
        $this->db->executeQuery($updateQuery);

        return 1;
    }

    public function sendEmail(){
        $mail = new \Pimcore\Mail();

        $mail->setIgnoreDebugMode(true);
        $emailIds = array(
            'rajesh.kumar4@happiestminds.com',
            // 'gaurav.tyagi@happiestminds.com',
            // 'aman.sharma2@happiestminds.com',
            'susmita.mallick@happiestminds.com'
        );

        foreach ($emailIds as $email) {
            $mail->addTo($email);
        }
        $mail->Subject('B2B Salesforce - Non-Fixed Records Found In Failed Table');
        $mail->setDocument('/FailureRecordEmail/B2BNonFixedRecordsEmailTemplate');
        $mail->send();
    }
}