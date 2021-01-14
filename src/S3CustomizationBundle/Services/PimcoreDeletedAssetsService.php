<?php


namespace S3CustomizationBundle\Services;


use Aws\S3\Exception\S3Exception;
use S3CustomizationBundle\Lib\Constants;
use S3CustomizationBundle\Lib\LogLevel;
use S3CustomizationBundle\Lib\Utils;
use S3CustomizationBundle\Model\PimcoreDeletedAssetsDao;

class PimcoreDeletedAssetsService
{
    private $pimcoreDeletedAssetsDao;

    public function __construct(PimcoreDeletedAssetsDao $pimcoreDeletedAssetsDao)
    {
        $this->pimcoreDeletedAssetsDao = $pimcoreDeletedAssetsDao;
    }

    public function addEntryInTable(int $pimcoreObjectId,string $pimcorePath,string $s3Path,string $type): bool
    {
        try{
            $this->pimcoreDeletedAssetsDao->insert($pimcoreObjectId, $pimcorePath, $s3Path, $type);
            return true;
        }catch (\Exception $exception){
            $msg = "||".__METHOD__."||";
            $msg .= "Error inserting pimcore id [". $pimcoreObjectId ."]";
            $msg .= " pimcore path [".$pimcorePath."]";
            $msg .= " s3 path [".$s3Path."] to the table.";
            $msg .= "Exception: " . $exception->getMessage();
            Utils::log(Constants::S3_OBJECTS_REMOVAL_LOG_FILE, $msg, LogLevel::ERROR());
            return false;
        }

    }

    public function deleteEntryFromTable(int $id): bool
    {
        try{
            $this->pimcoreDeletedAssetsDao->delete($id);
            return true;
        }catch (\Exception $exception){
            $msg = "||".__METHOD__."||";
            $msg .= "Error deleting pimcore id [". $id ."] from table.";
            $msg .= "Exception: " . $exception->getMessage();
            Utils::log(Constants::S3_OBJECTS_REMOVAL_LOG_FILE, $msg, LogLevel::ERROR());
            return false;
        }
    }

    /**
     * @return array
     */
    public function getAllEntriesFromTable(): array
    {
        try{
            return $this->pimcoreDeletedAssetsDao->getAllEntries();
        }catch (\Exception $exception){
            $msg = "||".__METHOD__."||";
            $msg .= "Error fetching records from table.";
            $msg .= "Exception: " . $exception->getMessage();
            Utils::log(Constants::S3_OBJECTS_REMOVAL_LOG_FILE, $msg, LogLevel::ERROR());
            return [];
        }
    }

    /**
     * @param string $s3Path
     * @throws S3Exception
     */
    public function deleteS3ObjectForPath(string $s3Path, string $type)
    {
        $s3Path = "assets" . $s3Path;

        if($type === 'folder'){
            $s3Path = rtrim($s3Path, '/') . '/';
        }

        $s3Client = Utils::getS3Client();
        $deleteRequest = [
            'Bucket' => S3_BUCKET,
            'Key'    => $s3Path
        ];

        $s3Client->deleteObject($deleteRequest);
    }

    public function doesS3PathExist(string $s3Path)
    {
        return $this->pimcoreDeletedAssetsDao->doesS3PathExist($s3Path);
    }

}
