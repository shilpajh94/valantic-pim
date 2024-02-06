<?php


namespace AppBundle\Command;


use Aws\S3\S3Client;
use S3CustomizationBundle\Lib\Utils;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RestoreDeletedS3ObjectsCommand extends Command
{
    const FILE_EXTENSIONS = [".jpg", ".png", ".jpeg", ".svg", ".gif", ".tiff", ".webp"];

    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this->setName('contitech:s3_restore_deleted_objects')
            ->setDescription('Restore deleted S3 objects with the given input keys')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . "restored_s3_paths_" . time() . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w");
        $this->csvLog($csvLogFileHandle, array("id", "pim_path", "s3_path", "Was DeleteMarker","DeleteMarker Version", "Result"));

        $filePath = $input->getArgument('filePath');
        $s3Client = $this->getS3Client();
        $dataToRestore = $this->getS3DataForRestore($filePath);

        echo "[" . count($dataToRestore) . "] keys found for restore.". PHP_EOL;

        foreach ($dataToRestore as $data) {
            $pimcoreId = $data[0];
            $pimcorePath = $data[1];
            $s3Path = $data[2];

            $wasDeleteMarker = "given s3 path is empty or not a valid file.";
            $result = "given s3 path is empty or not a valid file.";
            $deleteMarkerVersionId = "";

            if($s3Path !== null && trim($s3Path) !== "" && $this->isFile($s3Path)){

                $s3FilePath = "assets" . $s3Path ;
                $lookup = array(
                    'Bucket' => S3_BUCKET,
                    'Prefix' => $s3FilePath,
                );
                $bucketContent = $s3Client->ListObjectVersions($lookup);

//                $versions = $bucketContent->get('Versions');
                $deleteMarkers = $bucketContent->get('DeleteMarkers');

                if (!is_null($deleteMarkers) && is_array($deleteMarkers) && count($deleteMarkers) > 0) {
                    $latestDeleteMarker = $deleteMarkers[0];

                    $key = $latestDeleteMarker["Key"];
                    $deleteMarkerVersionId = $latestDeleteMarker["VersionId"];

                    $result = $s3Client->deleteObject(array(
                        'Bucket' => S3_BUCKET,
                        'Key' => $key,
                        'VersionId' => $deleteMarkerVersionId
                    ));
                    echo "DeleteMarker deleted for: [" . $key . "] " . PHP_EOL;

                    $wasDeleteMarker = $result->get("DeleteMarker");
                    $result = strval($result);
                }
            }


            $this->csvLog($csvLogFileHandle, array($pimcoreId, $pimcorePath, $s3Path, $wasDeleteMarker,$deleteMarkerVersionId, $result));

        }

        fclose($csvLogFileHandle);
    }

    private function isFile(string $path)
    {
//        return is_file($path);

        foreach (self::FILE_EXTENSIONS as $exts) {
            if ($this->endsWith($path, $exts)) {
                return true;
            }
        }
        return false;
    }

    private function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if (!$length) {
            return true;
        }
        return strtolower(substr($haystack, -$length)) === strtolower($needle);
    }

    private function getS3DataForRestore(string $filePath)
    {
        if(!file_exists($filePath)){
            echo "Given source file does not exist";
            die();
        }

        $returnValue = [[99, "/100/200/300/test_image.png", "/100/200/300/test_image.png", "0"]];

        /*
        $row = 1;
        $returnValue = [];
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if($data[3] === "0" && $this->isFile($data[2] )){
                    $returnValue[] = $data;
                }
            }
            fclose($handle);
        }
        */
        return $returnValue;
    }

    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }

    public function getS3Client()
    {
        if (CUSTOM_ENV == "stage" || CUSTOM_ENV == "prod" || CUSTOM_ENV == "stage_new"){

            $s3ConfigSettings = [
                'version' => 'latest',
                'region' => S3_REGION,
            ];

            $s3ConfigSettings['http'] = [
                'proxy' => [
                    'http' => 'cias.geoaws.com:8080',
                    'https' => 'cias.geoaws.com:8080'
                ]
            ];

        }elseif (CUSTOM_ENV == "dev" || CUSTOM_ENV == "qc"){

            $s3ConfigSettings = [
                'version' => 'latest',
                'region' => S3_REGION,
                'credentials' => [
                    'key' => S3_KEY,
                    'secret' => S3_SECRET
                ],
            ];
        }


        return new S3Client($s3ConfigSettings);
    }

}
