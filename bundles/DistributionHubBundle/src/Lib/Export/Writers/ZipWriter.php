<?php
namespace DistributionHubBundle\Lib\Export\Writers;

use AppBundle\Services\AppService;
use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Lib\DHubLogger;
use DistributionHubBundle\Lib\Utils;
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

    public function __construct(Channel $channel, Schedule $schedule, string $tmpFilePathFolder)
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
         *
         * create folder for each of the mapped columns
         */
        if (count($this->zipFolderForColumns) == 0) {
            $this->createZipFolders($data);
        }
        /**
         * get the source file for the config and add the file to the
         * respective folder for the zip
         */
        foreach ($data as $objectId => $objectConfig) {
            foreach ($objectConfig as $templateColumnName => $columnConfig) {
                $path = null;
                if (array_key_exists('assetId', $columnConfig)) {
                    $sourcePath = $this->getSourceFilePath($columnConfig);
                    if ($sourcePath) {
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
        foreach ($firstRecord as $templateColumnName => $config) {
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
	// for contitech
        if($asset && $asset instanceof Asset\Image){
//            $sourcePath = \DistributionHubBundle\Lib\Utils::getImageOrThumbnailPublicPath($asset, $columnConfig['thumbnail']);
            $sourcePath = Utils::getImageOrThumbnailPathForDownload($asset, $columnConfig['thumbnail']);

        }
        return $sourcePath;
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
		// for contitech
//            $completeSourceFilePath = $this->getHostUrl().rawurlencode($sourcePath);
//            $completeSourceFilePath = rawurlencode($sourcePath);
            $completeSourceFilePath = $sourcePath;
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
        $source = str_replace("%2F", "/", $source);
        $destinationDir = dirname($destination);
        if (!is_dir($destinationDir) && !mkdir($destinationDir, 0755, true)) {
            DHubLogger::log('Error: Failed to create the directory: ' . $destinationDir);die;
        }

        if (!is_writable($destinationDir)) {
            DHubLogger::log('Error: The directory is not writable: ' . $destinationDir);die;
        }

        $ch = curl_init($source);
        if ($ch === false) {
            DHubLogger::log('Error: Unable to initialize cURL.');die;
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'); // Set User-Agent

        $fileContent = curl_exec($ch);

        if ($fileContent === false) {
            DHubLogger::log('Error: Unable to download the file. ' . curl_error($ch));die;
        }

        curl_close($ch);

        $result = @file_put_contents($destination, $fileContent);
        if ($result === false) {
            $error = error_get_last();
            DHubLogger::log('Error: Unable to save the file. ' . $error['message']);die;
        }
        return $result;
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

        if (is_dir($source) === true) {
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($source), \RecursiveIteratorIterator::SELF_FIRST);
            foreach ($files as $file) {
                $file = str_replace('\\', '/', $file);

                // Ignore "." and ".." folders
                if (in_array(substr($file, strrpos($file, '/')+1), array('.', '..'))) {
                    continue;
                }
                $file = realpath($file);

                if (is_dir($file) === true) {
                    $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                } elseif (is_file($file) === true) {
                    $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                }
            }
        } elseif (is_file($source) === true) {
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
