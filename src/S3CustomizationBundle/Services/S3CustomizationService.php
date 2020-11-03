<?php


namespace S3CustomizationBundle\Services;

use S3CustomizationBundle\Model\AssetsDao;
use S3CustomizationBundle\Model\PimcoreS3FolderMappingDao;

/**
 * Class S3CustomizationService
 *
 *
 * @package S3CustomizationBundle\Services
 */
class S3CustomizationService
{
    private $dao;
    private $assetsDao;

    private $customizeS3 = true;

    public function __construct(PimcoreS3FolderMappingDao $pimcoreS3FolderMappingDao,AssetsDao $assetsDao)
    {
        $this->dao = $pimcoreS3FolderMappingDao;
        $this->assetsDao = $assetsDao;
    }

    public function isCustomizeS3()
    {
        return $this->customizeS3;
    }

    /**
     * get the mapped S3 path for the pimcore path
     *
     * @param $pimcorePath
     * @return string
     */
    public function getS3PathForPimcorePath($pimcorePath,$isPathStartsFromAsset = false)
    {
        $pathPrefix = PIMCORE_ASSET_DIRECTORY;
        if($isPathStartsFromAsset){
            $pathPrefix = "assets";
        }

        //        $pathFromPimcoreAssetRoot = str_replace($pathPrefix, '', $pimcorePath);
        if(strpos($pimcorePath, $pathPrefix) === 0) {
            $pathFromPimcoreAssetRoot = substr_replace($pimcorePath, '', 0, strlen($pathPrefix));
        }else{
            $pathFromPimcoreAssetRoot = $pimcorePath;
        }

        $s3Path = $this->dao->getS3PathForPimcorePath($pathFromPimcoreAssetRoot);
        if ($s3Path) {
            $completeS3Path = $pathPrefix . $s3Path;
            return $completeS3Path;
        }

        // @TODO: this needs a thought, whether to return the pimcore path here or not
        return $pimcorePath;
    }

    /**
     * called for the pimcore assets which do not have entry in pimcore database yet
     * path is created using the S3 mapping found for the parent
     *
     * assuming here that the parent folder always has an entry in the table
     *
     * @param $pimcorePath
     * @return string
     */
    public function getS3PathForNotMappedPimcorePath($pimcorePath,$fileKey)
    {
//        $pathFromPimcoreAssetRoot = str_replace(PIMCORE_ASSET_DIRECTORY, '', $pimcorePath);

        if(strpos($pimcorePath, PIMCORE_ASSET_DIRECTORY) === 0){
            $pathFromPimcoreAssetRoot  = substr_replace($pimcorePath, '', 0, strlen(PIMCORE_ASSET_DIRECTORY));
        }else{
            $pathFromPimcoreAssetRoot = $pimcorePath;
        }
        // this is the path of parent folder

        $parentPath = dirname($pathFromPimcoreAssetRoot);
//        $fileName = basename($pathFromPimcoreAssetRoot);
        $fileName = $fileKey;

        $parentS3Path = $this->dao->getS3PathForPimcorePath($parentPath);

        $relativePath = $parentS3Path . "/" . $fileName;

        if (strpos($pimcorePath, PIMCORE_ASSET_DIRECTORY) !== false) {
            return PIMCORE_ASSET_DIRECTORY . $relativePath;
        }
        return str_replace("//","/",$relativePath);
    }


    public function addMappingInCustomTable($pimcorePath, $s3Path, $pimcoreFolderId = null)
    {
        return $this->dao->insertEntry($pimcorePath, $s3Path, $pimcoreFolderId);
    }

    /**
     * update path of the folder and its children
     * using the folder id to get the old path of folder from the custom table
     *
     * @param $folderId
     * @param $newFolderPath
     * @return int
     */
    public function updatePathsForFolder($folderId, $newFolderPath)
    {
        $oldFolderPath = $this->dao->getPimcorePathForPimcoreFolderId($folderId);
        return $this->dao->updatePathsForFolderAndChilds($oldFolderPath, $newFolderPath);
    }

    /**
     * update the id in the custom table for the pimcore path
     *
     * @param $pimcoreFolderPath
     * @param $folderId
     * @return int
     */
    public function addPimcoreIdForPimcorePath($pimcoreFolderPath, $folderId)
    {
        return $this->dao->addPimcoreIdForPimcorePath($pimcoreFolderPath, $folderId);
    }


    public function doesS3PathExist($s3Path)
    {
        return $this->dao->doesS3PathExist($s3Path);
    }

    /**
     * generate a new name for the folder which already exists at S3
     *
     * @param $existingPath
     * @return string
     */
    public function getNewPathForExistingPath($existingPath)
    {
        return $existingPath . "_" . time();
    }

    /**
     * delete entries for the object id which do not have this new path with them
     * this is being used to remove the redundant entries
     *
     * @param $pimcoreObjectId
     * @param $newPath
     * @return int
     */
    public function deleteOldEntriesForGivenPimcoreObjectIdAndNewPath($pimcoreObjectId, $newPath)
    {
        return $this->dao->deleteOldEntriesForGivenPimcoreObjectIdAndNewPath($pimcoreObjectId, $newPath);
    }

    /**
     * delete all entries for the object id
     *
     * @param $pimcoreObjectId
     * @return int
     */
    public function deleteEntriesForPimcoreObjectId($pimcoreObjectId)
    {
        return $this->dao->deleteEntriesForPimcoreObjectId($pimcoreObjectId);
    }

    public function deleteEntryForPimcorePath($pimcorePath)
    {
        return $this->dao->deleteEntryForPimcorePath($pimcorePath);
    }

    /**
     * @param $pimcoreId
     * @return mixed
     */
    public function getCurrentParentIdForObjectById($pimcoreId)
    {
        return $this->assetsDao->getCurrentParentIdForObjectById($pimcoreId);
    }

    public function getPimcorePathByPimcoreId($pimcoreId){
        return $this->assetsDao->getPimcorePathByPimcoreId($pimcoreId);
    }
    
    public function getPimPathForS3Path($s3Path)
    {
        $s3Path = implode('/', array_map('rawurldecode', explode('/', $s3Path)));
        $pimPath = $this->dao->getPimcorePathForS3Path($s3Path);
        if ($pimPath) {
            return $pimPath;
        }
        return $s3Path;
    }

    public function getS3PathForFileSystemPathInFFMPEG($fileSystemPath)
    {
        if(strpos($fileSystemPath, "s3://") !== false) {
            $fileSystemPath = str_replace("s3://","", $fileSystemPath);
            $fileSystemPathParts = explode("/",$fileSystemPath,2);
            $bucket = $fileSystemPathParts[0];
            $assetPath = $fileSystemPathParts[1];
            $assetS3Path = $this->getS3PathForPimcorePath($assetPath, true);
            return "s3://" . $bucket ."/". $assetS3Path;
        }
        return $fileSystemPath;
    }

}