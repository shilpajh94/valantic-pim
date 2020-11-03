<?php
namespace DistributionHubBundle\Lib\Export\Writers;

use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Lib\DHubLogger;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\Schedule;
use Pimcore\Model\Asset;

class ZipWriter implements Writer
{
    private $downloadFileName;

    private $tmpFilePath;
    private $filePointer;
    private $tmpDir;
    private $zipFolderForColumns = [];
    private $rootZipFolderPath;
    private $zipFilePath;

    public function __construct(Channel $channel,Schedule $schedule,string $tmpFilePathFolder)
    {
        $this->tmpDir = $tmpFilePathFolder;
        $currTime = time();
        $this->rootZipFolderPath = $this->tmpDir.$channel->getName()."_".$schedule->getName()."_".$currTime;
        $this->zipFilePath = $this->rootZipFolderPath.".zip";
    }

    /**
     * fetch image file for the config and add the file to the folder
     *
     * @param array $data
     */
    public function addToZipFolder(array $data)
    {
        /**
         * create the folders in the root folder using the very first element in the
         * $data array
         */
        if(count($this->zipFolderForColumns) == 0){
            $this->createZipFolders($data);
        }
        /**
         * get the source file for the config and add the file to the
         * respective folder for the zip
         */
        foreach($data as $objectId => $objectConfig){
            foreach($objectConfig as $templateColumnName => $columnConfig){
                $path = null;
                if(array_key_exists('assetId',$columnConfig)){
                    $sourcePath = $this->getSourceFilePath($columnConfig);
                    if($sourcePath){
                        $this->addFileToFolder($sourcePath, $columnConfig);
                    }
                }
            }
        }
    }

    /**
     * create all the folders for all the mapped columns
     *
     * @param array $data
     */
    private function createZipFolders(array $data)
    {
        mkdir($this->rootZipFolderPath);
        $keys = array_keys($data);
        $firstRecord = $data[$keys[0]];
        foreach($firstRecord as $templateColumnName => $config){
            $this->zipFolderForColumns[$templateColumnName] = $this->createTemplateColumnFolder($templateColumnName);
        }
    }

    /**
     * create folder for mapped column
     *
     * @param $folderName
     * @return string
     */
    private function createTemplateColumnFolder($folderName)
    {
        $completeDirPath = $this->rootZipFolderPath."/".$folderName;
        mkdir($completeDirPath);
        return $completeDirPath;
    }

    /**
     * return the path of the source image file
     *
     * @param $columnConfig
     * @return string|null
     */
    private function getSourceFilePath($columnConfig): ?string
    {
        $asset = Asset::getById($columnConfig['assetId']);
        $sourcePath = null;
        if($asset){
            $sourcePath = $asset->getRealFullPath();
            if(array_key_exists('thumbnail',$columnConfig)){
                $thumbName = $columnConfig['thumbnail'];
                $thumbnailConfig = \Pimcore\Model\Asset\Image\Thumbnail\Config::getByName($thumbName);
                if($thumbnailConfig){
                    $sourcePath = urldecode(strval($asset->getThumbnail($thumbName)));
                }
            }
        } 
        return$sourcePath;
    }

    /**
     * @return mixed|string
     */
    private function getHostUrl(): string
    {
        $hostUrl = null;
        if(php_sapi_name() === 'cli'){
            $hostUrl = $_SESSION[Constants::HOST_NAME_KEY_IN_SESSION];
        }else{
            $hostUrl = \Pimcore\Tool::getHostUrl();
        }
        return $hostUrl;
    }

    /**
     * add file to respective folder
     *
     * @param string $sourcePath
     * @param array $columnConfig
     * @return bool
     */
    private function addFileToFolder(string $sourcePath, array $columnConfig): bool
    {
        $success = false;
        $templateColumnName = $columnConfig['templateColumn'];
        $folderPathForDestFile = $this->zipFolderForColumns[$templateColumnName];
        $completeDestFilePath = $folderPathForDestFile."/".basename($sourcePath);
        if($folderPathForDestFile){
            $completeSourceFilePath = $this->getHostUrl().rawurlencode($sourcePath);
            $success = $this->copyFile($completeSourceFilePath,$completeDestFilePath);
        }
        
        return $success;
    }

    /**
     * download source image file
     *
     * @param $source
     * @param $destination
     * @return bool
     */
    private function copyFile($source, $destination): bool
    {
        $source = str_replace("%2F","/",$source);
        $success = boolval(file_put_contents($destination, file_get_contents($source)));

        return $success;

    }

    public function write(array $data): ?bool
    {
        return true;
    }

    /**
     * create zip of the root folder
     * @return bool
     */
    public function postWrite(): ?bool
    {
        return $this->createZip($this->rootZipFolderPath, $this->zipFilePath);
    }

    /**
     * create zip recursively for the directory
     *
     * @param $source
     * @param $destination
     * @return bool
     */
    private function createZip($source, $destination): ?bool
    {
        if (!extension_loaded('zip') || !file_exists($source)) {
            return false;
        }
        $zip = new \ZipArchive();
        if (!$zip->open($destination, \ZIPARCHIVE::CREATE)) {
            return false;
        }
        $source = str_replace('\\', '/', realpath($source));

        if (is_dir($source) === true)
        {
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($source), \RecursiveIteratorIterator::SELF_FIRST);
            foreach ($files as $file)
            {
                $file = str_replace('\\', '/', $file);

                // Ignore "." and ".." folders
                if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                    continue;
                $file = realpath($file);

                if (is_dir($file) === true)
                {
                    $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                }
                else if (is_file($file) === true)
                {
                    $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                }
            }
        }
        else if (is_file($source) === true)
        {
            $zip->addFromString(basename($source), file_get_contents($source));
        }
        return $zip->close();
    }

    /**
     * @return string
     */
    public function getTmpFilePath(): ?string
    {
        return $this->zipFilePath;
    }

}
