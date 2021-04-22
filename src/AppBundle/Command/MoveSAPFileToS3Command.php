<?php
namespace AppBundle\Command;

use Aws\S3\S3Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Lib\SFTPConnection;
use Aws\S3\Exception\S3Exception;
use AppBundle\Tool\Utils;
use AppBundle\Logger\LogLevel;

/**
 * Command to get the S3 paths which exist in pimcore_s3_path_mapping table
 * but are not present or deleted marked on S3
 *
 * Class MoveSAPFileToS3Command
 * @package AppBundle\Command
 */
class MoveSAPFileToS3Command extends Command
{

    private $s3Client;
    private $movedfileCount = 0;
    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this->setName('contitech:move_sap_file_to_s3')
            ->setDescription('Move SAP files to s3');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logMessage('Script Execution Started', LogLevel::DEBUG());

        // Change here for before number of days records need to be moved
        $fileValidationDate = strtotime("-".BW_SAP_ARCHIVE_VALIDATE_FILE_OLDER_THAN_DAYS." day"); 
        $fileValidationDate = date('Y-m-d', $fileValidationDate);
        $fileValidationDate = new \DateTime($fileValidationDate);

        try{
            
            $this->logMessage('Checking Connection', LogLevel::INFO());
            $SFTPConObj = new SFTPConnection(BW_SAP_IMPORT_SFTP_HOST, BW_SAP_IMPORT_SFTP_PORT);
            $this->logMessage('Connection Created', LogLevel::INFO());

            $this->logMessage('Checking User Authentication', LogLevel::INFO());
            $SFTPConObj->login(BW_SAP_IMPORT_SFTP_USERNAME, BW_SAP_IMPORT_SFTP_PASSWORD);
            $this->logMessage('User Authentication Done', LogLevel::INFO());

            $this->logMessage('Checking Files in '. BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH. 'folder', LogLevel::INFO());
            $filesInDir = $SFTPConObj->getFilesList(BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH);
            $this->logMessage(count($filesInDir) . ' Files found in '. BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH. 'folder', LogLevel::INFO());

            if($filesInDir)
            {
                $this->logMessage('Getting the S3 Archive Client Object', LogLevel::INFO());
                
                foreach ($filesInDir as $key => $file) {

                    $this->logMessage("Starting to process file $file", LogLevel::INFO());

                    $fileInfoArr = explode('.',$file);
                    $fileInfo = $fileInfoArr[0];

                    $fileNameArr = explode('_',$fileInfo);

                    $modify_date = array_pop($fileNameArr);

                    if(is_numeric($modify_date) && (strlen($modify_date) == 8))
                    {
                        $month =  substr($modify_date, 0, 2);
                        $date =  substr($modify_date, 2, 2);
                        $year =  substr($modify_date, 4, 4);

                        $modify_date = "{$year}-{$month}-{$date}";
                        $modify_date = new \DateTime($modify_date);

                        $this->logMessage("Validating if the file is older than ".BW_SAP_ARCHIVE_VALIDATE_FILE_OLDER_THAN_DAYS." days", LogLevel::INFO());
                        if ($fileValidationDate > $modify_date)
                        {
                            // if file is older than the specified days it will move to S3
                            $this->moveSFTPFileToS3($file, $SFTPConObj);
                        }
                        else{
                            $this->logMessage(BW_SAP_ARCHIVE_VALIDATE_FILE_OLDER_THAN_DAYS." Days older file validation Failed. File - {$file} has not been processed", LogLevel::INFO());
                        }
                    }
                    else{
                        $this->logMessage("File - ". $file . " is not processed due to date format issue", LogLevel::INFO());
                    }
                }

                if($this->movedfileCount)
                    $this->logMessage("Number of files - ".$this->movedfileCount." Moved from SFTP to S3", LogLevel::INFO());
                else
                    $this->logMessage("No file found which is older than ".BW_SAP_ARCHIVE_VALIDATE_FILE_OLDER_THAN_DAYS." days", LogLevel::INFO());
            }
            else{
                $this->logMessage("Empty Folder - ".BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH, LogLevel::NOTICE());
            }
            
        } catch(\Throwable $e) {
            $message = $e->getMessage();
            $this->logMessage($message, LogLevel::CRITICAL());
        }
        
        $this->logMessage('Script Execution Stopped!', LogLevel::INFO());
    }

    public function moveSFTPFileToS3(String $file, SFTPConnection $SFTPConObj)
    {
        if(!isset($this->s3Client))
            $this->s3Client = $this->getS3ArchiveClient();

        $tmpFilePath = BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR.$file;

        $this->logMessage("Going to start the file download", LogLevel::INFO());
        $SFTPConObj->downloadFile($tmpFilePath, BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH."/".$file);
        $this->logMessage("{$file} downloaded from SFTP to tmp folder", LogLevel::INFO());

        $this->logMessage("{$file} is moving now to S3", LogLevel::INFO());
        
        $result = array();

        try {
            $result = $this->s3Client->putObject(array(
                // 'ACL' => 'private',
                'Owner' => array(
                    'DisplayName' => S3_BUCKET_BW_SAP_ARCHIVE,
                ),
                'Bucket' => S3_BUCKET_BW_SAP_ARCHIVE,
                'Key' => S3_BW_SAP_ARCHIVE_DIRECTORY.$file,
                'SourceFile' => $tmpFilePath,
            ));
        } catch (\S3Exception $e) {
                $this->logMessage($e->getMessage(), LogLevel::CRITICAL());
        }
        if (isset($result["@metadata"]["statusCode"]) && ($result["@metadata"]["statusCode"] == '200')) {
            $this->movedfileCount++;
            $this->logMessage("{$file} - File moved in ".S3_BUCKET_BW_SAP_ARCHIVE. " Bucket", LogLevel::INFO());

            $this->logMessage("{$file} - File is deleting now from tmp folder", LogLevel::INFO());
            // Now remove from temp 
            \unlink($tmpFilePath);

            $this->logMessage("{$file} - File is deleting now from ".BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH.$file." folder", LogLevel::INFO());
            // Now remove from SFTP
            $SFTPConObj->deleteRemoteFile(BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH.$file);
        }
        else{
            // echo "{$file} - File not uploaded in S3 \n";
            $this->logMessage("{$file} File not moved in S3", LogLevel::CRITICAL());
            $this->logMessage("@metadata -> statusCode -".$result["@metadata"]["statusCode"] , LogLevel::CRITICAL());
        }
    }

    public function getS3ArchiveClient(): S3Client
    {
        if (CUSTOM_ENV == "stage" || CUSTOM_ENV == "prod"){

            $s3ArchiveConfigSettings = [
                'version' => 'latest',
                'region' => S3_REGION_BW_SAP_ARCHIVE
            ];
        
        }elseif (CUSTOM_ENV == "dev" || CUSTOM_ENV == "qc"){
        
            $s3ArchiveConfigSettings = [
                'version' => 'latest',
                'region' => S3_REGION_BW_SAP_ARCHIVE,
                'credentials' => [
                    'key' => S3_KEY_BW_SAP_ARCHIVE,
                    'secret' => S3_SECRET_BW_SAP_ARCHIVE
                ],
            ];
        }

        return new S3Client($s3ArchiveConfigSettings);
    }

    public function logMessage(String $msg, LogLevel $logLevel)
    {
        Utils::log(SAP_ARCHIVE_FILE_TO_S3_MOVEMENT_LOG_FILE, $msg, $logLevel);
    }
}
