<?php


namespace AppBundle\Command;


use Aws\S3\S3Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Lib\SFTPConnection;
// use S3CustomizationBundle\Lib\Utils;
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
                $s3Client = $this->getS3ArchiveClient();

                $movedfileCount = 0;

                foreach ($filesInDir as $key => $file) {

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

                        if ($date7daybefore > $modify_date)
                        {
                            $tmpFilePath = BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR.$file;
                            $SFTPConObj->downloadFile($tmpFilePath, BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH."/".$file);

                            if($s3Client->putObject(array(
                                'ACL' => 'public-read',
                                // 'Grants' => array(
                                //     array(
                                //         'Grantee' => array(
                                //             'DisplayName' => 'public-read-write',
                                //             'EmailAddress' => 'pradeep.singh@pimcore.services',
                                //             'Type' => 'CanonicalUser1'),
                                //         'Permission' => 'READ',
                                //     ),
                                // ),
                                'Owner' => array(
                                    'DisplayName' => S3_BUCKET_ARCHIVE,
                                ),
                                'Bucket' => S3_BUCKET_ARCHIVE,
                                'Key' => S3_ARCHIVE_DIRECTORY.$file,
                                'SourceFile' => $tmpFilePath,
                                // 'RequestPayer' => S3_BUCKET,
                            ))
                            ){
                                $movedfileCount++;
                                echo "{$file} - File uploaded in ".S3_BUCKET_ARCHIVE. " Bucket \n";

                                // Now remove from temp 
                                \unlink($tmpFilePath);

                                // Now remove from SFTP
                                $SFTPConObj->deleteRemoteFile(BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH.$file);
                            }
                            else{
                                echo "{$file} - File not uploaded in S3 \n";
                            }
                        }
                    }
                }

                if($movedfileCount)
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

    public function getS3ArchiveClient()
    {
        $s3ArchiveConfigSettings = [
            'version' => 'latest',
            'region' => S3_REGION_ARCHIVE,
            'credentials' => [
                'key' => S3_KEY_ARCHIVE,
                'secret' => S3_SECRET_ARCHIVE
            ],
        ];

        return new S3Client($s3ArchiveConfigSettings);
    }
}
