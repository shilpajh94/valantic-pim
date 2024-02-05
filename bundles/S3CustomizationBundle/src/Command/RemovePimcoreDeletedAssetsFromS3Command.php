<?php

namespace S3CustomizationBundle\Command;

use S3CustomizationBundle\Lib\Constants;
use S3CustomizationBundle\Lib\LogLevel;
use S3CustomizationBundle\Lib\Utils;
use S3CustomizationBundle\Services\PimcoreDeletedAssetsService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Delete S3 objects which have been deleted from pimcore
 * source of this delete operation on S3 is a custom
 * table S3CustomizationBundle\Model\PimcoreDeletedAssetsDao::TABLE_NAME
 *
 * Class RemovePimcoreDeletedAssetsFromS3Command
 * @package AppBundle\Command
 */
class RemovePimcoreDeletedAssetsFromS3Command extends Command
{
    private $pimcoreDeletedAssetsService;

    public function __construct(PimcoreDeletedAssetsService $pimcoreDeletedAssetsService)
    {
        $this->pimcoreDeletedAssetsService = $pimcoreDeletedAssetsService;
        parent::__construct();
    }
    /**
     * Function to set the command configurations
     */
    protected function configure()
    {
        $this->setName('contitech:remove_pimcore_deleted_assets_from_s3')
            ->setDescription('Delete S3 objects which have been deleted from pimcore, source of this delete
                    operation on S3 is a custom table.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $allEntriesToBeDeleted = $this->pimcoreDeletedAssetsService->getAllEntriesFromTable();

        foreach($allEntriesToBeDeleted as $entry){
            $pimcoreId = $entry["pimcore_object_id"];
            $pimcorePath = $entry["pimcore_path"];
            $s3Path = $entry["s3_path"];
            $type = $entry["type"];

                try{
                    if(!($this->pimcoreDeletedAssetsService->checkIfAssetExistsIn_pimcore_s3_path_mapping_table($pimcorePath))){

                        $this->pimcoreDeletedAssetsService->deleteS3ObjectForPath($s3Path, $type);
        
                        $msg = "DELETED S3 object. S3 Path ->[". $s3Path ."]";
                        $msg .= " Pimcore Path [". $pimcorePath ."]";
                        $msg .= " Pimcore id [".$pimcoreId."]";
                        $msg .= " Type [".$type."]";
                        Utils::log(Constants::S3_OBJECTS_REMOVAL_LOG_FILE, $msg, LogLevel::INFO());
                    }
                    $this->pimcoreDeletedAssetsService->deleteEntryFromTable($pimcoreId);
                }catch (\Exception $exception){
                    $msg = "||".__CLASS__."||";
                    $msg .= "Error while trying to delete S3 object [" . $s3Path . "].";
                    $msg .= "Exception: " . $exception->getMessage();
                    Utils::log(Constants::S3_OBJECTS_REMOVAL_LOG_FILE, $msg, LogLevel::ERROR());
                }
        }
    }
}
