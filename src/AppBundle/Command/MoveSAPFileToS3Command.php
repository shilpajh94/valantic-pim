<?php


namespace AppBundle\Command;


use Aws\S3\S3Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Lib\SFTPConnection;
use S3CustomizationBundle\Lib\Utils;
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
        try{

            // Change here for before number of days records need to be moved
            $date7daybefore = strtotime("-7 day"); 
            $date7daybefore = date('Y-m-d', $date7daybefore);
            $date7daybefore = new \DateTime($date7daybefore);

            $SFTPConObj = new SFTPConnection(BW_SAP_IMPORT_SFTP_HOST, BW_SAP_IMPORT_SFTP_PORT);
            $SFTPConObj->login(BW_SAP_IMPORT_SFTP_USERNAME, BW_SAP_IMPORT_SFTP_PASSWORD);

            $filesInDir = $SFTPConObj->getFilesList(BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH);

            if($filesInDir)
            {
                $this->s3Client =  Utils::getS3Client();
                $movedfileCount = 0;

                foreach ($filesInDir as $key => $file) {
                    
                    $modify_date = $SFTPConObj->getFileModifiedData(BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH, $file);
                    $modify_date = date('Y-m-d', $modify_date);
                    $modify_date = new \DateTime($modify_date);

                    if ($date7daybefore > $modify_date)
                    {
                        
                        $tmpFilePath = BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR.$file;
                        $SFTPConObj->downloadFile($tmpFilePath, BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH."/".$file);

                        if($this->s3Client->putObject(array(
                            // 'ACL' => 'public-read-write',
                            // 'Grants' => array(
                            //     array(
                            //         'Grantee' => array(
                            //             'DisplayName' => 'public-read-write',
                            //             'EmailAddress' => 'pradeep.singh@pimcore.services',
                            //             'Type' => 'CanonicalUser1'),
                            //         'Permission' => 'READ',
                            //     ),
                            // ),
                            // 'Owner' => array(
                            //     'DisplayName' => S3_BUCKET,
                            // ),
                            'Bucket' => S3_BUCKET,
                            'Key' => $file,
                            'SourceFile' => $tmpFilePath,
                            // 'RequestPayer' => S3_BUCKET,
                        ))
                        ){
                            $movedfileCount++;
                            echo "{$file} - File uploaded in ".S3_BUCKET. " Bucket \n";

                            // Now remove from temp 
                            \unlink($tmpFilePath);

                            // Now remove from SFTP
                            $SFTPConObj->deleteRemoteFile(BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH, $file);
                        }
                        else{
                            echo "{$file} - File not uploaded in S3 \n";
                        }
                    }
                }

                if($$movedfileCount)
                    echo "Number of files - ".$movedfileCount." Moved from SFTP to S3 \n";
                else
                    echo "No files before seven days \n";

            }
            else{
                echo "Empty Folder!! \n";
            }
            

        } catch (Throwable $th) {
            echo $message = $th->getMessage();
            die; 
        
        }
    }
}
