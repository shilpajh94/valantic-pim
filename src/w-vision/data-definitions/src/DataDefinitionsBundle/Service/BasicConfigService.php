<?php

namespace Wvision\Bundle\DataDefinitionsBundle\Service;

//use DistributionHubBundle\Model\Channel;
use Wvision\Bundle\DataDefinitionsBundle\Lib\Constants;
use Pimcore\Model\Asset;
use Pimcore\Model\Element;
use Wvision\Bundle\DataDefinitionsBundle\Lib\DHubLogger;

/**
 * Class BasicConfigService
 * @package Wvision\Bundle\DataDefinitionsBundle\Service
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
        }
        if ($fileType) {
            $validTypes = [Constants::FILE_TYPE_CSV];
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
                throw new \Exception('data_file_not_valid');
            }

            // if ($inputFileType == Constants::FILE_TYPE_XLS || $inputFileType == Constants::FILE_TYPE_XLSX) {
            //     $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
            //     $spreadsheet = $reader->load($tmpUploadPath);
            //     $sheetNames = $spreadsheet->getSheetNames();
            // }
            // return ["fileType" => $fileType, 'sheetNames' => $sheetNames, 'fileName' => $fileName];
        } else {
            DHubLogger::log("Uploaded file extension (" . $info['extension'] . ") type not valid.", DHubLogger::INFO);
            throw new \Exception('dHub_file_not_valid');
        }
    }
}
