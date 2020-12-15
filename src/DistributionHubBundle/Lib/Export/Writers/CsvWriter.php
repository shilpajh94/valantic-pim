<?php
namespace DistributionHubBundle\Lib\Export\Writers;

use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\Schedule;

class CsvWriter implements Writer
{
    private $downloadFileName;

    private $tmpFilePath;
    private $delimiter;
    private $filePointer;

    public function __construct(Channel $channel, Schedule $schedule, string $tmpFilePathFolder)
    {
        $downloadFileName = $schedule->getDownloadFileName();
        if (!$downloadFileName) {
            $downloadFileName = $channel->getName().'-'.$schedule->getName();
        }
        $this->downloadFileName = $downloadFileName.'-'.time();
        $this->tmpFilePath = $tmpFilePathFolder.$this->downloadFileName.'.csv';

        $headerMappingFileType = $channel->getHeaderMappingFileType();

        $this->delimiter = $channel->getExportFileCSVDelimiter();
        $this->initializeFilePointer();
        $columnAttrMapping = json_decode($channel->getColumnAttributeMapping(), true);
        $this->writeHeaders($columnAttrMapping['templateAttribute']);
    }

    public function write(array $data)
    {
        foreach ($data as $row) {
            $this->writeArrayToFile($row);
        }
    }

    private function initializeFilePointer()
    {
        $fp = fopen($this->tmpFilePath, 'a');
        $this->filePointer = $fp;
    }

    private function writeHeaders(array $headers)
    {
        $this->writeArrayToFile($headers);
    }


    private function writeArrayToFile(array $data)
    {
        fputcsv($this->filePointer, $data, $this->delimiter);
    }

    public function postWrite()
    {
        fclose($this->filePointer);
    }

    public function getTmpFilePath()
    {
        return $this->tmpFilePath;
    }
}
