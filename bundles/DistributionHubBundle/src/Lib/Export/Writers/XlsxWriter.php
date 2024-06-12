<?php

namespace DistributionHubBundle\Lib\Export\Writers;

use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\Schedule;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class XlsxWriter implements Writer
{

    private $downloadFileName;
    private $tmpFilePath;
    private $spreadSheet;
    private $headerRowNumber;
    private $sheetNumberInMappingFile;
    private $rowNumberToWriteFrom;

    public function __construct(Channel $channel, Schedule $schedule, string $tmpFilePathFolder)
    {
        $downloadFileName = $schedule->getDownloadFileName();
        if (!$downloadFileName) {
            $downloadFileName = $channel->getName().'-'.$schedule->getName();
        }
        $this->downloadFileName = $downloadFileName.'-'.time();
        $this->tmpFilePath = $tmpFilePathFolder.$this->downloadFileName.'.xlsx';

        $originalHeaderMappingFileId = $channel->getHeaderMappingFileAssetId();
        if ($fileAsset = \Pimcore\Model\Asset::getById($originalHeaderMappingFileId)) {
            $assetFilePath = $fileAsset->getFileSystemPath();
            $copy = copy($assetFilePath, $this->tmpFilePath);
        } else {
            throw new \Exception("Header mapping template asset ($originalHeaderMappingFileId) not found.");
        }

        $headerMappingFileType = $channel->getHeaderMappingFileType();
        if ($headerMappingFileType == Constants::FILE_TYPE_EXCEL) {
            $this->headerRowNumber = $channel->getHeaderRowNumberInMappingFile();
            $this->sheetNumberInMappingFile = $channel->getSheetNumberInMappingFile();
            $this->rowNumberToWriteFrom = $this->headerRowNumber + 1;
            $this->spreadSheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($this->tmpFilePath);
        } else {
            $this->headerRowNumber = 1;
            $this->sheetNumberInMappingFile = 0;
            $this->rowNumberToWriteFrom = $this->headerRowNumber + 1;
            $this->spreadSheet = new Spreadsheet();

            // $columnAttrMapping = json_decode($channel->getColumnAttributeMapping(), true);
            // $this->writeHeaders($columnAttrMapping['templateAttribute']);
        }
    }

    private function writeHeaders($headers)
    {
        for ($i = 0; $i < count($headers); $i++) {
            $this->getWorkSheet()->setCellValueByColumnAndRow(($i + 1), 1, $headers[$i]);
        }
    }

    private function getWorkSheet()
    {
        return $this->spreadSheet->getSheet($this->sheetNumberInMappingFile);
    }

    public function write(array $data)
    {
        for ($i = 0; $i < count($data); $i++) {
            $row = $data[$i];
            $j = 1;
            foreach ($row as $key => $value) {
                $this->getWorkSheet()->setCellValueByColumnAndRow($j, $this->rowNumberToWriteFrom, $value);
                $j++;
            }
            $this->rowNumberToWriteFrom++;
        }
    }

    public function postWrite()
    {
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($this->spreadSheet, 'Xlsx');
        $writer->save($this->tmpFilePath);
    }


    public function getTmpFilePath()
    {
        return $this->tmpFilePath;
    }
}
