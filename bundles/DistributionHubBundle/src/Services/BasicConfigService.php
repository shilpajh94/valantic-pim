<?php

namespace DistributionHubBundle\Services;

use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\FTPDetail;
use Pimcore\Model\Asset;
use Pimcore\Model\Element;
use DistributionHubBundle\Lib\DHubLogger;

/**
 * Class BasicConfigService
 * @package DistributionHubBundle\Services
 */
class BasicConfigService
{
    /**
     * @var BundleService
     */
    private $bundleService;

    /**
     * BasicConfigService constructor.
     * @param BundleService $bundleService
     */
    public function __construct(BundleService $bundleService)
    {
        $this->bundleService = $bundleService;
    }

    /**
     * get the name of the sheets in excel file
     *
     * @param $file
     * @return array|string[]
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function getSheetNamesInExcelFile($file): array
    {
        $returnValue = array();
        if (file_exists($file)) {
            $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file);
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
            $spreadsheet = $reader->load($file);
            $returnValue = $spreadsheet->getSheetNames();
        }

        return $returnValue;
    }

    public function getExtraConfigForBasicTab(Channel $channel)
    {
        $headerMappingFileType = $channel->getHeaderMappingFileType();
        $fileAssetId = $channel->getHeaderMappingFileAssetId();
        $headerMappingFileName = null;
        $headerMappingFileExists = false;
        $headerMappingFileSheetNames = array();

        // dd($channel);
        if($fileAssetId == null){
        }else{
            $asset = Asset::getById($fileAssetId);
            if ($asset) {
                $headerMappingFileExists = true;
                if ($headerMappingFileType == Constants::FILE_TYPE_EXCEL) {
                    $file = $asset->getFileSystemPath();
                    try {
                        $headerMappingFileSheetNames = $this->getSheetNamesInExcelFile($file);
                    } catch (\Exception $exception) {
                        DHubLogger::log("Error reading template file in BasicConfigController getSheetsInExcelAsset:".$exception->getMessage(), DHubLogger::CRITICAL);
                        throw new \Exception('dHub_could_not_read_template_file');
                    }
                }
                $headerMappingFileName = $asset->getFilename();
            }
        }

        $defaultAssetFolderPathForExportedFiles = $this->bundleService->getDefaultAssetFolderPathForExportedFiles();

        $savedExportFilePath = $channel->getExportFilePath();
        if ($savedExportFilePath == $defaultAssetFolderPathForExportedFiles) {
            $savedExportFilePath = null;
        }
        $exportFilePathFolderId = null;
        if ($savedExportFilePath) {
            $exportFilePathFolderObject  = Asset::getByPath($savedExportFilePath);
            if ($exportFilePathFolderObject) {
                $exportFilePathFolderId = $exportFilePathFolderObject->getId();
            }
        }

        return array([
                    'headerMappingFileExists' => $headerMappingFileExists,
                    'headerMappingFileSheetNames' => $headerMappingFileSheetNames,
                    'headerMappingFileName' => $headerMappingFileName,
                    'exportFilePathFolderId' => $exportFilePathFolderId,
                    'ftpDetails' => $this->getFTPDetails($channel)
                ]);
    }

    private function getFTPDetails(Channel $channel): array
    {
        $ftp = $this->bundleService->getFtpForChannel($channel);
        if (!$ftp) {
            $ftp = new FTPDetail();
        }

        return [
            'success' => true,
            'ftpName' => $ftp->getName(),
            'ftpServerAddress' => $ftp->getServerAddress(),
            'ftpPort' => $ftp->getServerPort(),
            'ftpUserName' => $ftp->getUserName(),
            'ftpPassword' => $ftp->getPassword()
        ];
    }

    /**
     * add the given file to assets
     *
     * @param $file
     * @param string $channelName
     * @return Asset|null
     * @throws \Exception
     */
    public function addFileInAsset($file, string $channelName): ?Asset
    {
        $asset = null;
        $fileName = basename($file);

        $hyphenPos = strpos($fileName, '-');
        // remove the custom random value added in file name
        if ($hyphenPos !== false) {
            $fileName = substr($fileName, ($hyphenPos + 1));
        }
        $pathinfo = pathinfo($fileName);
        $parentAsset = $this->bundleService->getAssetFolderForUploadedTemplates();

        // add timestamp to the filename while uploading in assets
        $fileName = $channelName.'-'.$pathinfo['filename'] .'.'. $pathinfo['extension'];
        $fileName = Element\Service::getValidKey($fileName, 'asset');
        if (empty($fileName)) {
            throw new \Exception('The filename of the asset is empty');
        }

        $assetPath = $parentAsset->getFullPath().'/'.$fileName;
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
     * validate the uploaded file
     *
     * @param $requestBinaryFile
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function validateUploadedFile($requestBinaryFile)
    {
        $fileType = null;
        $sheetNames = array();

        // file extension checks
        $info = pathinfo($requestBinaryFile['name']);
        $fileExtension = ucfirst(strtolower($info['extension']));

        if (in_array($fileExtension, [Constants::FILE_TYPE_CSV])) {
            $fileType = Constants::FILE_TYPE_CSV;
        } elseif (in_array($fileExtension, [Constants::FILE_TYPE_XLS, Constants::FILE_TYPE_XLSX])) {
            $fileType = Constants::FILE_TYPE_EXCEL;
        }
        if ($fileType) {
            $validTypes = [Constants::FILE_TYPE_XLS, Constants::FILE_TYPE_XLSX, Constants::FILE_TYPE_CSV];
            $tmpUploadPathfolder = PIMCORE_PROJECT_ROOT . '/' . $this->bundleService->getConfig('tmp_template_upload_pimcore_dir');

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
                throw new \Exception('dHub_file_not_valid');
            }

            if ($inputFileType == Constants::FILE_TYPE_XLS || $inputFileType == Constants::FILE_TYPE_XLSX) {
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $spreadsheet = $reader->load($tmpUploadPath);
                $sheetNames = $spreadsheet->getSheetNames();
            }
            return ["fileType" => $fileType, 'sheetNames' => $sheetNames, 'fileName' => $fileName];
        } else {
            DHubLogger::log("Uploaded file extension (".$info['extension'].") type not valid.", DHubLogger::INFO);
            throw new \Exception('dHub_file_not_valid');
        }
    }
}
