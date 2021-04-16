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
        Utils::log(MOVE_SAP_FILE_TO_S3, 'Script Execution Started', LogLevel::DEBUG());

        try{
            // Change here for before number of days records need to be moved
            $date7daybefore = strtotime("-7 day"); 
            $date7daybefore = date('Y-m-d', $date7daybefore);
            $date7daybefore = new \DateTime($date7daybefore);
            
            Utils::log(MOVE_SAP_FILE_TO_S3, 'Checking Connection', LogLevel::INFO());
            $SFTPConObj = new SFTPConnection(BW_SAP_IMPORT_SFTP_HOST, BW_SAP_IMPORT_SFTP_PORT);
            Utils::log(MOVE_SAP_FILE_TO_S3, 'Connection Created', LogLevel::INFO());

            Utils::log(MOVE_SAP_FILE_TO_S3, 'Checking User Authentication', LogLevel::INFO());
            $SFTPConObj->login(BW_SAP_IMPORT_SFTP_USERNAME, BW_SAP_IMPORT_SFTP_PASSWORD);
            Utils::log(MOVE_SAP_FILE_TO_S3, 'User Authentication Done', LogLevel::INFO());

            Utils::log(MOVE_SAP_FILE_TO_S3, 'Checking Files in '. BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH. 'folder', LogLevel::INFO());
            $filesInDir = $SFTPConObj->getFilesList(BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH);
            Utils::log(MOVE_SAP_FILE_TO_S3, count($filesInDir) . ' Files found in '. BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH. 'folder', LogLevel::INFO());

            if($filesInDir)
            {
                Utils::log(MOVE_SAP_FILE_TO_S3, 'Getting the S3 Archive Client Object', LogLevel::INFO());
                $s3Client = $this->getS3ArchiveClient();

                $movedfileCount = 0;

                foreach ($filesInDir as $key => $file) {

                    Utils::log(MOVE_SAP_FILE_TO_S3, "Process file ".($key+1)." - ". $file, LogLevel::INFO());

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

                        Utils::log(MOVE_SAP_FILE_TO_S3, "7 Days before validation checking", LogLevel::INFO());
                        if ($date7daybefore > $modify_date)
                        {
                            Utils::log(MOVE_SAP_FILE_TO_S3, "7 Days before validation Success. File - {$file} is being processed", LogLevel::INFO());
                            $tmpFilePath = BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR.$file;

                            Utils::log(MOVE_SAP_FILE_TO_S3, "{$file} is being download from SFTP to tmp folder", LogLevel::INFO());
                            $SFTPConObj->downloadFile($tmpFilePath, BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH."/".$file);
                            Utils::log(MOVE_SAP_FILE_TO_S3, "{$file} downloaded from SFTP to tmp folder", LogLevel::INFO());

                            try {

                                Utils::log(MOVE_SAP_FILE_TO_S3, "{$file} is moving now to S3", LogLevel::INFO());

                                $result = $s3Client->putObject(array(
                                    // 'ACL' => 'private',
                                    'Owner' => array(
                                        'DisplayName' => S3_BUCKET_BW_SAP_ARCHIVE,
                                    ),
                                    'Bucket' => S3_BUCKET_BW_SAP_ARCHIVE,
                                    'Key' => S3_BW_SAP_ARCHIVE_DIRECTORY.$file,
                                    'SourceFile' => $tmpFilePath,
                                ));

                                if ($result["@metadata"]["statusCode"] == '200') {
                                    $movedfileCount++;
                                    Utils::log(MOVE_SAP_FILE_TO_S3, "{$file} - File moved in ".S3_BUCKET_BW_SAP_ARCHIVE. " Bucket", LogLevel::INFO());


                                    Utils::log(MOVE_SAP_FILE_TO_S3, "{$file} - File is deleting now from tmp folder", LogLevel::INFO());
                                    // Now remove from temp 
                                    \unlink($tmpFilePath);

                                    Utils::log(MOVE_SAP_FILE_TO_S3, "{$file} - File is deleting now from ".BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH.$file." folder", LogLevel::INFO());
                                    // Now remove from SFTP
                                    $SFTPConObj->deleteRemoteFile(BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH.$file);
                                }
                                else{
                                    // echo "{$file} - File not uploaded in S3 \n";
                                    Utils::log(MOVE_SAP_FILE_TO_S3, "{$file} File not moved in S3", LogLevel::CRITICAL());
                                }
                            } catch (\S3Exception $e) {
                                    // echo $e->getState();
                                    Utils::log(MOVE_SAP_FILE_TO_S3, $e->getState(), LogLevel::CRITICAL());
                            }
                        }
                        else{
                            Utils::log(MOVE_SAP_FILE_TO_S3, "7 Days before validation Failed. File - {$file} has not been processed", LogLevel::INFO());
                        }
                    }
                    else{
                        Utils::log(MOVE_SAP_FILE_TO_S3, "File - ". $file . " is not processed due to date format issue", LogLevel::INFO());
                    }
                }

                if($movedfileCount)
                    Utils::log(MOVE_SAP_FILE_TO_S3, "Number of files - ".$movedfileCount." Moved from SFTP to S3", LogLevel::INFO());
                else
                    Utils::log(MOVE_SAP_FILE_TO_S3, "No files found before seven days", LogLevel::INFO());
            }
            else{
                Utils::log(MOVE_SAP_FILE_TO_S3, "Empty Folder", LogLevel::NOTICE());
            }
            
        } catch(\Throwable $e) {
            $message = $e->getMessage();
            Utils::log(MOVE_SAP_FILE_TO_S3, $message, LogLevel::CRITICAL());
            die; 
        } catch(\Exception $e) {
            $message = $e->getMessage();
            Utils::log(MOVE_SAP_FILE_TO_S3, $message, LogLevel::CRITICAL());
            die; 
        }
        
        Utils::log(MOVE_SAP_FILE_TO_S3, 'Script Execution Stopped!', LogLevel::DEBUG());
    }

    public function getS3ArchiveClient()
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
}
