<?php

namespace DistributionHubBundle\Services;

use Pimcore\Cache;
use Pimcore\Model\Asset;
use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\FTPDetail;
use DistributionHubBundle\Lib\Utils;

class BundleService
{
    /**
     * get bundle configs
     *
     * @param null|string $param
     * @return mixed
     */
    public function getConfig(?string $param = null)
    {
        $configFile = Constants::CONFIG_FILE;
        $config = $this->getConfigFromYmlFile($configFile);

        if($param){
            return $config[$param];
        }

        return $config;
    }

    /**
     * get yml config for the given file
     * caching the file data if environment is not dev
     *
     * @param $filePath
     * @return mixed
     */
    public function getConfigFromYmlFile($filePath)
    {
        $env = \Pimcore\Config::getEnvironment();
        $cacheKey = Utils::getCacheKeyForFilePath($filePath);

        if ($env != "dev") {
            if ($config = Cache::load($cacheKey)) {
            } else {
                $config = Utils::getYmlConfig($filePath);
                Cache::save($config, $cacheKey);
            }
        } else {
            $config = Utils::getYmlConfig($filePath);
            Cache::save($config, $cacheKey);
        }
        $returnConfig = $config;
        return $returnConfig;
    }

    /**
     * get the asset folder to keep uploaded templates
     *
     * @return Asset
     * @throws \Exception
     */
    public function getAssetFolderForUploadedTemplates(): Asset
    {
        $folderPath = '/'.$this->getConfig('asset_folder').'/'.$this->getConfig('folder_for_uploaded_template_in_asset_folder');
        $folder = $this->getAssetFolderForPath($folderPath);

        return $folder;
    }

    /**
     * get asset folder for exported files
     *
     * @return Asset
     * @throws \Exception
     */
    public function getDefaultAssetFolderForExportedFiles(): Asset
    {
        $folderPath = $this->getDefaultAssetFolderPathForExportedFiles();
        $folder = $this->getAssetFolderForPath($folderPath);

        return $folder;
    }

    /**
     * @return string
     */
    public function getDefaultAssetFolderPathForExportedFiles(): string
    {
        return '/'.$this->getConfig('asset_folder').'/'.$this->getConfig('folder_for_exported_files_in_asset_folder');
    }

    /**
     * recursive function to create assets for path
     *
     * @param $path
     * @return null|Asset
     * @throws \Exception
     */
    public function getAssetFolderForPath($path): Asset
    {
        $asset = Asset::getByPath($path);

        if(!$asset){
            $assetParentPath = dirname($path);
            $assetName = basename($path);

            $assetParent = $this->getAssetFolderForPath($assetParentPath);
            $asset = new Asset();
            $asset->setParent($assetParent);
            $asset->setFilename($assetName);
            $asset->setType('folder');
            $asset->save();
        }
        return $asset;
    }

    /**
     * get the ftp for the channel
     * this function is only returning one FTP as of now
     *
     * @param Channel $channel
     * @return null
     */
    public function getFtpForChannel(Channel $channel): ?FTPDetail
    {
        $ftp = null;
        $ftpDetails = $channel->getFTPDetails();

        if(count($ftpDetails) > 0){
            $ftp = $ftpDetails[0];
        }
        return $ftp;
    }

    /**
     * return the life in minutes for a process in IN-PROGRESS state
     * after this much minutes the process will be killed
     *
     * @return mixed
     */
    public function getInProgressProcessLife()
    {
        return $this->getConfig('in_progress_process_life');
    }

    /**
     * return the count of max process that can be run in parallel
     *
     * @return mixed
     */
    public function getMaxActiveParallelProcessCount()
    {
        return $this->getConfig('max_parallel_active_process_count');
    }

    /**
     * return the interval of writing data batches to file at which the system
     * should check for the existence of the schedule.
     *
     * @return mixed
     */
    public function getIsScheduleDeletedCheckBatchInterval()
    {
        return $this->getConfig('is_schedule_deleted_check_batch_interval');
    }

}
