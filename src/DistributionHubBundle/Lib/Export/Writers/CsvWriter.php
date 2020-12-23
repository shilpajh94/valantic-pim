<?php
namespace DistributionHubBundle\Lib\Export\Writers;

use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\Schedule;
use DistributionHubBundle\Lib\DHubLogger;

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
        try {
            foreach ($data as $row) {
                $this->writeArrayToFile($row);
            }
        } catch (\Exception $ex) {
            DHubLogger::log($ex->getMessage(), DHubLogger::CRITICAL);
        }
    }

    private function initializeFilePointer()
    {
        try {
            $fp = fopen($this->tmpFilePath, 'a');
            $this->filePointer = $fp;
        } catch (\Exception $ex) {
            DHubLogger::log($ex->getMessage(), DHubLogger::CRITICAL);
        }
    }

    private function writeHeaders(array $headers)
    {
        try {
            $this->writeArrayToFile($headers);
        } catch (\Exception $ex) {
            DHubLogger::log($ex->getMessage(), DHubLogger::CRITICAL);
        }
    }


    private function writeArrayToFile(array $data)
    {
        try {
            fputcsv($this->filePointer, $data, $this->delimiter);
        } catch (\Exception $ex) {
            DHubLogger::log($ex->getMessage(), DHubLogger::CRITICAL);
        }
    }

    public function postWrite()
    {
        try {
            fclose($this->filePointer);
        } catch (\Exception $ex) {
            DHubLogger::log($ex->getMessage(), DHubLogger::CRITICAL);
        }
    }

    public function getTmpFilePath()
    {
        try {
            return $this->tmpFilePath;
        } catch (\Exception $ex) {
            DHubLogger::log($ex->getMessage(), DHubLogger::CRITICAL);
        }
    }
}
