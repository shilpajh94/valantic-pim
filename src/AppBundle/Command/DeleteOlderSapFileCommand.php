<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Lib\SFTPConnection;
use AppBundle\Tool\Utils;
use AppBundle\Logger\LogLevel;

/**
 * Class DeleteOlderSapFileCommand
 * @package AppBundle\Command
 */
class DeleteOlderSapFileCommand extends Command
{

    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this->setName('contitech:delete_older_sap_files')
            ->setDescription('Delete Older SAP files');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logMessage('Script Execution Started', LogLevel::DEBUG());

        // Change here for before number of days records need to be deleted
        $fileValidationDate = strtotime("-".BW_SAP_DELETED_FILE_OLDER_THAN_DAYS." day"); 
        $fileValidationDate = date('Y-m-d', $fileValidationDate);
        $fileValidationDate = new \DateTime($fileValidationDate);
       
            $this->logMessage('Checking Connection', LogLevel::INFO());

            try{
                $SFTPConObj = new SFTPConnection(BW_SAP_IMPORT_SFTP_HOST, BW_SAP_IMPORT_SFTP_PORT);
            } catch(\Throwable $e) {
                $message = $e->getMessage();
            $this->logMessage($message, LogLevel::CRITICAL());
            return;
            }

            $this->logMessage('Connection Created', LogLevel::INFO());
       
        
            $this->logMessage('Checking User Authentication', LogLevel::INFO());

            try{
                $SFTPConObj->login(BW_SAP_IMPORT_SFTP_USERNAME, BW_SAP_IMPORT_SFTP_PASSWORD); 
            } catch(\Throwable $e) {
                $message = $e->getMessage();
                $message = "Login was not successful with" . BW_SAP_IMPORT_SFTP_USERNAME ." ".$message;
            $this->logMessage($message, LogLevel::CRITICAL());
            return;
            }

            $this->logMessage('User Authentication Done', LogLevel::INFO());

            
            $this->logMessage('Checking Files in '. BW_SAP_IMPORT_SFTP_PATH. 'folder', LogLevel::INFO());

            try{
            $fileNamesInDir = $SFTPConObj->getFilesList(BW_SAP_IMPORT_SFTP_PATH);
            } catch(\Throwable $e) {
            $message = $e->getMessage();
            $message = "Exception while trying to fetch list of files"." ".$message;
            $this->logMessage($message, LogLevel::CRITICAL());
            return;
            }

            $this->logMessage(count($fileNamesInDir) . ' Files found in '. BW_SAP_IMPORT_SFTP_PATH. 'folder', LogLevel::INFO());

          
        // Process Directory Files
        if($fileNamesInDir)
        {
           $this->deletedSapFile($fileNamesInDir, $fileValidationDate, $SFTPConObj); 
        }
        else{
            $this->logMessage("Empty Folder - ".BW_SAP_IMPORT_SFTP_PATH, LogLevel::NOTICE());
        }              
    }

    public function  deletedSapFile($fileNamesInDir, $fileValidationDate, $SFTPConObj ) 
    {
        foreach ($fileNamesInDir as $fileName) {

            $this->logMessage("Starting to process file - $fileName", LogLevel::INFO());
            $fileInfoArr = explode('.',$fileName);
            $fileInfo = $fileInfoArr[0];
            $fileNameArr = explode('_',$fileInfo);
            $modify_date = array_pop($fileNameArr);
            $modify_date = trim($modify_date);

            if(is_numeric($modify_date) && (strlen($modify_date) == 8))
            {
                $month =  substr($modify_date, 0, 2);
                $date =  substr($modify_date, 2, 2);
                $year =  substr($modify_date, 4, 4);

                $modify_date = "{$year}-{$month}-{$date}";
                $modify_date = new \DateTime($modify_date);

                $this->logMessage("Validating if the file is older than ".BW_SAP_DELETED_FILE_OLDER_THAN_DAYS." days", LogLevel::INFO());
                
                if ($fileValidationDate > $modify_date) 
                {
                    try{
                        $filepath = BW_SAP_IMPORT_SFTP_PATH."/".$fileName;
                        $SFTPConObj->deleteRemoteFile($filepath); 
                    } catch(\Throwable $e) {
                        $message = $e->getMessage();
                        $message = "Files could not be deleted"." ".$message;
                        $this->logMessage($message, LogLevel::CRITICAL());
                    }                        
                }
            }
        }

    } 

    public function logMessage(String $msg, LogLevel $logLevel)
    {
        Utils::log(DELETION_OF_OLDER_SAP_FILE_LOG_FILE, $msg, $logLevel);
    }
}