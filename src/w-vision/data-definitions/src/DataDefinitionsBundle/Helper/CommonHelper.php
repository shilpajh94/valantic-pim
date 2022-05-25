<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Wvision\Bundle\DataDefinitionsBundle\Helper;

use Wvision\Bundle\DataDefinitionsBundle\Lib\Constants;
use Wvision\Bundle\DataDefinitionsBundle\Lib\Utils;
use Wvision\Bundle\DataDefinitionsBundle\Lib\DataImportLogger;
use Pimcore\Cache;
use Pimcore\Model\Asset;
use Pimcore\Model\Element;

/**
 * Description of CommonHelper
 *
 * @author rajeshkumar
 */
class CommonHelper
{

    public $assetId;
    /**
     * validate the uploaded file
     *
     * @param $requestBinaryFile
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function validateUploadedFile($requestBinaryFile)
    {
        $fileType = null;

        // file extension checks
        $info = pathinfo($requestBinaryFile['name']);
        $fileExtension = ucfirst(strtolower($info['extension']));

        if (in_array($fileExtension, [Constants::FILE_TYPE_CSV])) {
            $fileType = Constants::FILE_TYPE_CSV;
        }
        if ($fileType) {
            $validTypes = [Constants::FILE_TYPE_CSV];
            $tmpUploadPathfolder = PIMCORE_PROJECT_ROOT . '/' . self::getConfig('tmp_template_upload_pimcore_dir');

            $fileName = basename($requestBinaryFile['name']);
            $tmpUploadPath = $tmpUploadPathfolder . $fileName;

            move_uploaded_file($requestBinaryFile['tmp_name'], $tmpUploadPath);

            try {
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($tmpUploadPath);
            } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $exception) {
                throw $exception;
            }

            if (!in_array($inputFileType, $validTypes)) {
                throw new \Exception('data_file_not_valid');
            }
            return ["fileType" => $fileType, 'fileName' => $fileName];
        } else {
            DataImportLogger::log("Uploaded file extension (" . $info['extension'] . ") type not valid.", DataImportLogger::INFO);
            throw new \Exception('dHub_file_not_valid');
        }
    }


    /**
     * add the given file to assets
     *
     * @param $file
     * @param string $definitionName
     * @return Asset|null
     * @throws \Exception
     */
    public function addFileInAsset($file, string $definitionName): ?Asset
    {
        $asset = null;
        $fileName = basename($file);
/* 
        $hyphenPos = strpos($fileName, '-');
        // remove the custom random value added in file name
        if ($hyphenPos !== false) {
            $fileName = substr($fileName, ($hyphenPos + 1));
        } */
        $pathinfo = pathinfo($fileName);
        $parentAsset = self::getDefaultAssetFolderForUploadedFiles();

        // add timestamp to the filename while uploading in assets
        $fileName = $definitionName . '-' . $pathinfo['filename'] . '.' . $pathinfo['extension'];
        $fileName = Element\Service::getValidKey($fileName, 'asset');
        if (empty($fileName)) {
            throw new \Exception('The filename of the asset is empty');
        }

        $assetPath = $parentAsset . '/' . $fileName;
        $asset = Asset::getByPath($assetPath);

        if (!$asset) {
            $asset = new Asset();
            $asset->setParent($parentAsset);
            $asset->setFilename($fileName);
        }

        $asset->setData(file_get_contents($file));
        $asset->save();

        return $asset;
    }

    /**
     * set asset id for uploaded file
     *
     */
    // public function setAssetId($assetId)
    // {
    //     $this->assetId = $assetId;
    // }

    /**
     * get asset id for uploaded file
     *
     */
    // public function getAssetId()
    // {
    //     return isset($this->assetId) ? $this->assetId : "22222";
    // }

    /**
     * get asset folder for exported files
     *
     * @return Asset
     * @throws \Exception
     */
    public function getDefaultAssetFolderForUploadedFiles(): Asset
    {
        $folderPath = $this->getDefaultAssetFolderPathForImportedFiles();
        return $this->getAssetFolderForPath($folderPath);
    }

    /**
     * @return string
     */
    public function getDefaultAssetFolderPathForImportedFiles(): string
    {
        return '/' . self::getConfig('asset_folder_product_data_import_module') . '/' . self::getConfig('folder_for_uploaded_template_in_asset_folder');
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

        if (!$asset) {
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
     * get bundle configs
     *
     * @param null|string $param
     * @return mixed
     */
    public function getConfig(?string $param = null)
    {
        $configFile = Constants::CONFIG_FILE;
        $config = self::getConfigFromYmlFile($configFile);

        if ($param) {
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


    public function getCSVData($fileName)
    {
        try {

            $csvFilePath = $fileName;
            $firstRowData = array();
            if (empty($csvFilePath)) {
                return $firstRowData;
            }

            $csvFilePath = str_replace("%20", " ", $csvFilePath);

            $dialect = \Pimcore\Tool\Admin::determineCsvDialect($csvFilePath);
            $count = 0;

            if (($handle = fopen($csvFilePath, 'r')) !== false) {
                while (($rowData = fgetcsv($handle, 0, $dialect->delimiter, $dialect->quotechar, $dialect->escapechar)) !== false) {
                    if ($count == 0) {
                        foreach ($rowData as $key => $value) {
                            unset($rowData[$key]);
                            $rowData[utf8_decode(trim($key))] = utf8_decode(trim($value));
                        }
                        $firstRowData = $rowData;
                    }
                }
                fclose($handle);
            }
            return array(
                'header'    =>  $firstRowData
            );
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
}
