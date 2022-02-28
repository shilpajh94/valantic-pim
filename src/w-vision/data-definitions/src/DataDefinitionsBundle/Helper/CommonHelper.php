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

/**
 * Description of CommonHelper
 *
 * @author rajeshkumar
 */
class CommonHelper
{

    /**
     * validate the uploaded file
     *
     * @param $requestBinaryFile
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public static function validateUploadedFile($requestBinaryFile)
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

            // adding rand, to handle that is multiples users upload the file with same name before a save is hit
            $fileName = rand(0, 1000) . '-' . basename($requestBinaryFile['name']);
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
        } else {
            DataImportLogger::log("Uploaded file extension (" . $info['extension'] . ") type not valid.", DataImportLogger::INFO);
            throw new \Exception('dHub_file_not_valid');
        }
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
}
