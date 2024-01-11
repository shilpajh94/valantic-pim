<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 20/2/20
 * Time: 12:56 PM
 */

namespace S3CustomizationBundle\EventListeners;


use Pimcore\Event\Model\AssetEvent;
use Pimcore\Event\Model\ElementEventInterface;
use S3CustomizationBundle\Lib\Constants;
use S3CustomizationBundle\Lib\LogLevel;
use S3CustomizationBundle\Lib\Utils;
use S3CustomizationBundle\Services\PimcoreDeletedAssetsService;
use  S3CustomizationBundle\Services\S3CustomizationService;

/**
 * Class AssetEventsListener
 *
 * Handle asset events
 *
 * @package S3CustomizationBundle\EventListeners
 */
class AssetEventsListener
{
    private $s3CustomizationService;

    private $pimcoreDeletedAssetsService;

    public function __construct(S3CustomizationService $service,PimcoreDeletedAssetsService $pimcoreDeletedAssetsService)
    {
        $this->s3CustomizationService = $service;
        $this->pimcoreDeletedAssetsService = $pimcoreDeletedAssetsService;
    }

    /**
     * Insert the id of the current asset in the table against its path
     *
     * @param ElementEventInterface $e
     */
    public function onPostAdd(ElementEventInterface $e)
    {
        if($e instanceof AssetEvent) {
            $asset = $e->getAsset();

            try{
                $this->s3CustomizationService->addPimcoreIdForPimcorePath($asset->getRealFullPath(),$asset->getId());
            }catch (\Exception $exception){
                $msg = "||" . __METHOD__ . "||" . $exception->getMessage();
                Utils::log(Constants::S3_CUSTOMIZATION_LOG_FILE,$msg,LogLevel::ERROR());
                throw new \Exception("An exception occurred while performing the operation.");
            }

        }
    }

    /**
     * @param ElementEventInterface $e
     * @return bool
     */
    public function onPostUpdate(ElementEventInterface $e)
    {
        if($e instanceof AssetEvent) {
            $asset = $e->getAsset();
            try{
                if($asset->getType() == "folder") {
                    /**
                     * updating the entry in table to update all the paths
                     * corresponding to this folder, this needs to be done only in case if the folder is renamed,
                     * but it is not possible here to identify this condition. So doing this in all cases when a folder is updated
                     * assuming that this is a very rare case to update the folder in any other way except rename
                     */

                    $this->s3CustomizationService->updatePathsForFolder($asset->getId(),$asset->getRealFullPath());
                }else{

                    $olderEntries = $this->s3CustomizationService->getEntriesWithOlderPimcorePathsByObjectId($asset->getId(),$asset->getRealFullPath());
                    if(is_array($olderEntries)){
                        foreach($olderEntries as $olderEntry){
                            $id = $olderEntry["pimcore_object_id"];
                            $pimcorePath = $olderEntry["pimcore_path"];
                            $s3Path = $olderEntry["s3_path"];
                            $this->pimcoreDeletedAssetsService->addEntryInTable($id,$pimcorePath,$s3Path,$asset->getType());
                        }
                    }

                    /**
                     * delete the entry for this file with old path
                     *
                     * we just need one entry for each file and that too with the new path
                     * we are not doing this for folders because an entry with new path is added in
                     * preUpdate for files only, so at this moment there should be two entries for same
                     * pimcore id of file, one with old path and one with new path
                     * we can not check here if the renamed operation took place, so we are doing this in all cases,
                     * but entry with old path exists only in two cases: 1. file renamed, 2.file moved
                     */
                    $this->s3CustomizationService->deleteOldEntriesForGivenPimcoreObjectIdAndNewPath($asset->getId(),$asset->getRealFullPath());

                }
            }catch (\Exception $exception){
                $msg = "||" . __METHOD__ . "||" . $exception->getMessage();
                Utils::log(Constants::S3_CUSTOMIZATION_LOG_FILE,$msg,LogLevel::ERROR());
                throw new \Exception("An exception occurred while performing the operation.");
            }

        }
    }

    /**
     * add entry in the table for newly added folder or file
     *
     * @param ElementEventInterface $e
     */
    public function onPreAdd(ElementEventInterface $e)
    {

        if($e instanceof AssetEvent) {
            $asset = $e->getAsset();
            $assetParent = $asset->getParent();
            $parentFullPath = $assetParent->getPath().$assetParent->getFilename();
            $assetFullPath = $parentFullPath."/".$asset->getFilename();
            $assetFullPath = str_replace("//","/",$assetFullPath);
            try{
                $s3Path = $this->s3CustomizationService->getS3PathForNotMappedPimcorePath($assetFullPath,$asset->getFilename());

                /**
                 * if a folder is going to be added than we need to check whether the created follder S3 path
                 * already exist at S3, if so than add the timestamp to the current folder S3 name
                 *
                 * this needs not to be checked for file because file with same path can not exist at S3 ( only folder renaming
                 *  is skipped at S3 )
                 */
                if($asset->getType() == 'folder'){
                    if($this->s3CustomizationService->doesS3PathExist($s3Path) || $this->pimcoreDeletedAssetsService->doesS3PathExist($s3Path)){
                        $s3Path = $s3Path."_".time();
                    }
                }

                $this->s3CustomizationService->addMappingInCustomTable($assetFullPath,$s3Path);
            }catch (\Exception $exception){
                $msg = "||" . __METHOD__ . "||" . $exception->getMessage();
                Utils::log(Constants::S3_CUSTOMIZATION_LOG_FILE,$msg,LogLevel::ERROR());
                throw new \Exception("Unable to perform operation, an exception occurred in system.");
            }

        }
    }

    /**
     * if file is renamed or moved then add an entry in table with new path
     *
     * @param ElementEventInterface $e
     */
    public function onPreUpdate(ElementEventInterface $e)
    {
        if($e instanceof AssetEvent) {
            $asset = $e->getAsset();
            $assetKey = $asset->getFilename();
            $assetFullPath = $asset->getRealFullPath();

            if($asset->getType() != 'folder'){
                $oldPath = $asset->getDao()->getCurrentFullPath();
                $newParentId = $asset->getParentId();
                // get the parent id from database

                try{
                    $oldParentId = $this->s3CustomizationService->getCurrentParentIdForObjectById($asset->getId());

                    if($oldPath != $assetFullPath){
                        // if file is renamed
                        $newS3Path = $this->s3CustomizationService->getS3PathForNotMappedPimcorePath($assetFullPath,$assetKey);
                        $this->s3CustomizationService->addMappingInCustomTable($assetFullPath,$newS3Path,$asset->getId());
                    }elseif ($newParentId != $oldParentId){
                        // if file is moved
                        // in this case only parent id changes in object before save
                        $assetKey = $asset->getKey();
                        $newParentPath = $this->s3CustomizationService->getPimcorePathByPimcoreId($newParentId);

                        $newAssetPath = ( $newParentPath === "/" ? "/".$assetKey : $newParentPath."/".$assetKey );

                        $newS3Path = $this->s3CustomizationService->getS3PathForNotMappedPimcorePath($newAssetPath,$assetKey);
                        $this->s3CustomizationService->addMappingInCustomTable($newAssetPath,$newS3Path,$asset->getId());
                    }
                }catch (\Exception $exception){
                    $msg = "||" . __METHOD__ . "||" . $exception->getMessage();
                    Utils::log(Constants::S3_CUSTOMIZATION_LOG_FILE,$msg,LogLevel::ERROR());
                    throw new \Exception("Unable to perform operation, an exception occured in system.");
                }


            }
        }
    }

    /**
     * delete entries in the table for deleted asset
     *
     * @param ElementEventInterface $e
     */
    public function onPostDelete(ElementEventInterface $e){
        if($e instanceof AssetEvent) {
            $asset = $e->getAsset();
            $entryInCustomTable = $this->s3CustomizationService->getCustomTableEntryById($asset->getId());
            $this->pimcoreDeletedAssetsService->addEntryInTable(
                                                                $entryInCustomTable["pimcore_object_id"],
                                                                $entryInCustomTable["pimcore_path"],
                                                                $entryInCustomTable["s3_path"],
                                                                $asset->getType()
                                                                );
            $this->s3CustomizationService->deleteEntriesForPimcoreObjectId($asset->getId());
        }
    }

    /**
     * delete entry which was added at the time of preAdd
     *
     * can not depend on id for this operations because it might not have been assigned
     *
     * @param ElementEventInterface $e
     */
    public function onPostAddFailure(ElementEventInterface $e){
        if($e instanceof AssetEvent) {
            $asset = $e->getAsset();
            $assetPath = $asset->getRealFullPath();
            $this->s3CustomizationService->deleteEntryForPimcorePath($assetPath);
        }
    }

    /**
     * delete entry for file which was added the time of preUpdate
     *
     * @param ElementEventInterface $e
     */
    public function onPostUpdateFailure(ElementEventInterface $e){
        if($e instanceof AssetEvent) {
            $asset = $e->getAsset();
            if($asset->getType() != 'folder'){
                $assetPath = $asset->getRealFullPath();
                $this->s3CustomizationService->deleteEntryForPimcorePath($assetPath);
            }
        }
    }

}
