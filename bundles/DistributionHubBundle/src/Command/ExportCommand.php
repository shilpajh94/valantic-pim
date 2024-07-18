<?php

namespace DistributionHubBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Pimcore\Model\DataObject\ClassDefinition;
use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Lib\DHubLogger;
use DistributionHubBundle\Lib\Export\Writers\Factory;
use DistributionHubBundle\Model\Schedule;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Services\BundleService;
use DistributionHubBundle\Services\ExportService;
use DistributionHubBundle\Services\FilterService;
use DistributionHubBundle\Services\ScheduleProcessHelperService;
use DistributionHubBundle\Services\MailNotificationService;
use DistributionHubBundle\Lib\Export\Writers\ZipWriter;
use Pimcore\Tool;
use Symfony\Component\Process\Process;

/**
 * Class ExportCommand
 * @package DistributionHubBundle\Command
 */
class ExportCommand extends Command
{
    /**
     * @var ExportService
     */
    private $exportService;

    /**
     * @var FilterService
     */
    private $filterService;

    /**
     * @var BundleService
     */
    private $bundleService;

    /**
     * @var ScheduleProcessHelperService
     */
    private $helperService;

    /**
     * @var MailNotificationService
     */
    private $mailNotificationService;

    /**
     * the batch size to fetch the records from the database
     * @var int
     */
    private $batchSize;

    /**
     * @var Schedule
     */
    private $schedule;

    /**
     * @var Channel
     */
    private $channel;

    /**
     * @var Channel
     */
    private $hostUrl;

    /**
     * @var string
     */
    protected static $defaultName = 'distributionhub:export';

    /**
     * ExportCommand constructor.
     * @param ExportService $exportService
     * @param BundleService $bundleService
     * @param ScheduleProcessHelperService $helperService
     * @param MailNotificationService $mailNotificationService
     */
    public function __construct(ExportService $exportService, FilterService $filterService, BundleService $bundleService, ScheduleProcessHelperService $helperService, MailNotificationService $mailNotificationService)
    {
        $this->exportService = $exportService;
        $this->filterService = $filterService;
        $this->bundleService = $bundleService;
        $this->helperService = $helperService;
        $this->mailNotificationService = $mailNotificationService;
        $this->batchSize = $this->bundleService->getConfig('batch_size_of_records_for_export_file_generation');
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('To start an export job for the available schedules.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $inProgressProcessesStatus = $this->helperService->getInProgressProcessesStatusAfterUpdatingDeadProcesses();
        if (!$inProgressProcessesStatus['canNewProcessStart']) {
            $msg = "Not starting new process.";
            $msg .= $inProgressProcessesStatus['inProgressProcessCount']." process/es is/are already running. ";
            $this->log($msg, DHubLogger::INFO);
        } else {
            $this->hostUrl = $this->bundleService->getConfig('host_name');
            if (empty($this->hostUrl)) {
                $msg ="hostName empty in configuration";
                $this->handleProcessFailure($msg);
                return 1;
            }

            $this->exportService->setHostURLInSession($this->hostUrl);

            $sch = $this->exportService->getScheduleForProcess();
            if ($sch instanceof Schedule) {
                $this->processSchedule($sch);
            }
        }

        $this->helperService->updateStatusForExpiredProcesses();

        return 1;
    }

    /**
     * @param Schedule $schedule
     * @throws \Exception
     */
    public function processSchedule(Schedule $schedule)
    {
        /**
         * getting required information for the export job
         */
        $scheduleData = $this->exportService->getScheduleDataForProcess($schedule);

        $this->schedule = $schedule;
        $this->channel = $scheduleData['channel'];
        $resourceType = $schedule->getExportResource();

        /**
         * check if the FTP connection is possible if export location if FTP
         */
        $exportLocation = $this->schedule->getExportLocation();
        if (strtolower($exportLocation) === 'ftp') {
            $ftpDetail = $this->channel->getFTPDetails();

            $ftpDetail = $ftpDetail[0];
            if (! ($ftpDetail)) {
                $msg = "FTP not configured for channel and selected export location is FTP.";
                $this->handleProcessFailure($msg);
                return;
            }
            try {
                $this->exportService->validateFTPConnection($ftpDetail);
            } catch (\Exception $exception) {
                $this->handleProcessFailure($exception->getMessage());
                return;
            }
        }

        $filterConfig = $scheduleData['filterConfig'];
        $pimcoreClassId = $this->channel->getPimcoreClassId();
        $columnAttributeMapping = json_decode($this->channel->getColumnAttributeMapping(), true);


        switch ($resourceType) {
            case $resourceType === Constants::EXPORT_ONLY_DATA:
                $this->helperService->updateScheduleStatusToInProgress($this->schedule);
                $this->processOnlyDataFile($filterConfig, $columnAttributeMapping, $pimcoreClassId);

                $this->refreshSchedule();
                if($this->schedule->getStatus() === Constants::SCHEDULE_STATUS_INPROGRESS){
                    $this->helperService->updateScheduleStatusToComplete($this->schedule);
                    $this->sendNotification();
                }
                break;
            case $resourceType === Constants::EXPORT_ONLY_ASSETS:
                $this->helperService->updateScheduleStatusToInProgress($this->schedule);
                $this->processOnlyAssets($filterConfig, $columnAttributeMapping, $pimcoreClassId);

                $this->refreshSchedule();
                if($this->schedule->getStatus() === Constants::SCHEDULE_STATUS_INPROGRESS){
                    $this->helperService->updateScheduleStatusToComplete($this->schedule);
                    $this->sendNotification();
                }

                break;
            case $resourceType === Constants::EXPORT_DATA_ASSETS_BOTH:
                $this->helperService->updateScheduleStatusToInProgress($this->schedule);
                $this->processOnlyDataFile($filterConfig, $columnAttributeMapping, $pimcoreClassId);

                $this->refreshSchedule();
                if($this->schedule->getStatus() === Constants::SCHEDULE_STATUS_INPROGRESS){
                    $this->processOnlyAssets($filterConfig, $columnAttributeMapping, $pimcoreClassId);
                    $this->refreshSchedule();
                    if($this->schedule->getStatus() === Constants::SCHEDULE_STATUS_INPROGRESS){
                        $this->helperService->updateScheduleStatusToComplete($this->schedule);
                        $this->sendNotification();
                    }

                }
                break;
        }
    }

    private function processOnlyDataFile($filterConfig, $columnAttributeMapping, $pimcoreClassId)
    {
        $msg = "STARTED DataFile Export Process.";
        $this->log($msg, DHubLogger::INFO);

        /**
         * creating the file writer according to the export format selected by user in schedule
         */
        $tmpFilePathFolder = PIMCORE_PROJECT_ROOT . '/'.$this->bundleService->getConfig('tmp_template_upload_pimcore_dir');
        $downloadFileName = $this->schedule->getDownloadFileName();
        if (!$downloadFileName) {
            $downloadFileName = $this->channel->getName().'-'.$this->schedule->getName();
        }
        $downloadFileName = $downloadFileName.'-'.time();
        $tmpFilePath = $tmpFilePathFolder.$downloadFileName.'.csv';

        /**
         * creating the list object and filtering the records using filterService
         */
        $pimcoreClass = ClassDefinition::getById($pimcoreClassId);
        $pimcoreClassName = $pimcoreClass->getName();

        $listClass = "\\Pimcore\\Model\\DataObject\\" . ucfirst($pimcoreClassName) . "\\Listing";
        $listObj = new $listClass();
        $listObj->setUnpublished(true);

        $dataForFilterService = array();
        $dataForFilterService['classId'] = $pimcoreClassId;
        $dataForFilterService['conditions'] = $filterConfig['conditions'];
        $dataForFilterService['type'] = $filterConfig['type'];
        $dataForFilterService['filterByList'] = $filterConfig['filterByListAttributes']['filterByList'];
        $dataForFilterService['listFileAssetId'] = $filterConfig['filterByListAttributes']['listFileAssetId'];
        $dataForFilterService['filterByAttribute'] = $filterConfig['filterByListAttributes']['filterByAttribute'];

        try {
            $resultListObj = $this->filterService->getFilteredList($dataForFilterService, $listObj);
        } catch (\Exception $exception) {
            $this->handleProcessFailure($exception->getMessage());
            return;
        }

        try {
            $writer = Factory::getWriter($this->channel, $this->schedule, $tmpFilePath);
            $columnAttrMapping = json_decode($this->channel->getColumnAttributeMapping(), true);
            $writer->writeHeaders($columnAttrMapping['templateAttribute']);
            $writer->postWrite();
        } catch (\Exception $exception) {
            $this->handleProcessFailure($exception->getMessage());
            return;
        }

        /**
         * fetching records in the batches of size $this->batchSize
         * writing the fetched batch to the export file
         */
        $isScheduleDeletedCheckBatchInterval = $this->bundleService->getIsScheduleDeletedCheckBatchInterval();
        $totalCount = $resultListObj->getTotalCount();
        $offset = 0;
        $batchIndex = 1;
        while ($offset <= ( $totalCount - 1)) {
            $this->refreshSchedule();
            if (($batchIndex === 1) || ( ($batchIndex % $isScheduleDeletedCheckBatchInterval ) === 0 )) {
                if ($this->helperService->isScheduleDeleted($this->schedule)) {
                    $msg = "Schedule has been deleted while running export process.";
                    $this->log($msg, DHubLogger::INFO, true);
                    return;
                }
            }

            if($this->schedule->getStatus() === Constants::SCHEDULE_STATUS_INPROGRESS){
                $command = explode(" ", implode(' ', [
                    PIMCORE_PROJECT_ROOT . "/bin/console distributionhub:child_process_export",
                    $offset,
                    $this->batchSize,
                    $pimcoreClassId,
                    $this->schedule->getId(),
                    $tmpFilePath,
                 ]));
                $process = new Process($command);
                $process->setTimeout(3600);
                $process->run();
                $output = $process->getOutput();
                $errorOutput = $process->getErrorOutput();

                if($errorOutput !== null && trim($errorOutput) != ""){
                    $msg = "[Child Script Error Output] " . $errorOutput;
                    $this->log($msg,DHubLogger::CRITICAL);
                }

            }else{
                // schedule was failed in the child process
                break;
            }

            $offset = $offset + $this->batchSize;
            $batchIndex++;
        }

        /**
         * committing the export file to the location selected by user in export location in schedule
         */
        $this->refreshSchedule();
        if($this->schedule->getStatus() === Constants::SCHEDULE_STATUS_INPROGRESS){
            if (file_exists($tmpFilePath)) {
                try {
                    $isZip = false;
                    $this->exportService->sendExportFileToDesiredLocation($this->channel, $this->schedule, $tmpFilePath, $isZip);
                } catch (\Exception $exception) {
                    $this->handleProcessFailure($exception->getMessage());
                    return;
                }
                $this->helperService->updateScheduleParams($this->schedule);
            } else {
                $msg = "Export file could not be created due to some unexpected error.";
                $this->handleProcessFailure($msg);
                return;
            }
        }

    }

    private function refreshSchedule()
    {
        $this->schedule = Schedule::getById($this->schedule->getId());
    }


    private function processOnlyAssets($filterConfig, $columnAttributeMapping, $pimcoreClassId)
    {

        $msg = "STARTED Assets Export Process.";
        $this->log($msg, DHubLogger::INFO);
        /**
         * preparing fields array (name of all the fields in column configuration) and
         * helperDefinition array (definition of operators in the column configuration)
         * which would be used to fetch the data
         */
        $this->exportService->prepareFieldsForAssets($columnAttributeMapping);
        $fields = $this->exportService->getAssetsFieldsForExport();

        /**
         * creating the file writer according to the export format selected by user in schedule
         */
        $tmpFilePathFolder = PIMCORE_PROJECT_ROOT . '/'.$this->bundleService->getConfig('tmp_template_upload_pimcore_dir');
        try {
            $writer = new ZipWriter($this->channel, $this->schedule, $tmpFilePathFolder);
        } catch (\Exception $exception) {
            $this->handleProcessFailure($exception->getMessage());
            return;
        }

        /**
         * creating the list object and filtering the records using filterService
         */
        $pimcoreClass = ClassDefinition::getById($pimcoreClassId);
        $pimcoreClassName = $pimcoreClass->getName();

        $listClass = "\\Pimcore\\Model\\DataObject\\" . ucfirst($pimcoreClassName) . "\\Listing";
        $listObj = new $listClass();
        $listObj->setUnpublished(true);

        $dataForFilterService = array();
        $dataForFilterService['classId'] = $pimcoreClassId;
        $dataForFilterService['conditions'] = $filterConfig['conditions'];
        $dataForFilterService['type'] = $filterConfig['type'];
        $dataForFilterService['filterByList'] = $filterConfig['filterByListAttributes']['filterByList'];
        $dataForFilterService['listFileAssetId'] = $filterConfig['filterByListAttributes']['listFileAssetId'];
        $dataForFilterService['filterByAttribute'] = $filterConfig['filterByListAttributes']['filterByAttribute'];

        try {
            $resultListObj = $this->filterService->getFilteredList($dataForFilterService, $listObj);
        } catch (\Exception $exception) {
            $this->handleProcessFailure($exception->getMessage());
            return;
        }

        /**
         * fetching records in the batches of size $this->batchSize
         * writing the fetched batch to the export file
         */
        $isScheduleDeletedCheckBatchInterval = $this->bundleService->getIsScheduleDeletedCheckBatchInterval();
        $totalCount = $resultListObj->getTotalCount();

        $offset = 0;
        $batchIndex = 1;
        while ($offset <= ( $totalCount - 1)) {
            if (($batchIndex === 1) || ( ($batchIndex % $isScheduleDeletedCheckBatchInterval ) === 0 )) {
                if ($this->helperService->isScheduleDeleted($this->schedule)) {
                    $msg = "Schedule has been deleted while running export process.";
                    $this->log($msg, DHubLogger::INFO, true);
                    return;
                }
            }
            $resultListObj->setOffset($offset);
            $resultListObj->setLimit($this->batchSize);
            try {
                $resultListObj->load();
                $exportData = $this->exportService->getAssetDataForExport($resultListObj, $fields, $this->channel->getLanguage(), false);

                if (empty($exportData)) {
                    $msg = "Prepared export data in empty";
                    $this->handleProcessFailure($msg);
                    return;
                }

                $writer->addToZipFolder($exportData);
            } catch (\Exception $exception) {
                $this->handleProcessFailure($exception->getMessage());
                return;
            }

            $offset = $offset + $this->batchSize;
            $batchIndex++;
        }
        try {
            $writer->postWrite();
        } catch (\Exception $exception) {
            $msg = "Error while writing to export file. msg: ".$exception->getMessage();
            $this->handleProcessFailure($msg);
        }

        /**
         * committing the export file to the location selected by user in export location in schedule
         */
        if (file_exists($writer->getTmpFilePath())) {
            try {
                $isZip = true;
                $this->exportService->sendExportFileToDesiredLocation($this->channel, $this->schedule, $writer->getTmpFilePath(), $isZip);
            } catch (\Exception $exception) {
                $this->handleProcessFailure($exception->getMessage());
                return;
            }
            $this->helperService->updateScheduleParams($this->schedule);
        } else {
            $msg = "Export file could not be created due to some unexpected error.";
            $this->handleProcessFailure($msg);
            return;
        }
    }


    /**
     * @param string $msg
     */
    private function handleProcessFailure(string $msg)
    {
        $this->helperService->updateScheduleStatusToFailure($this->schedule);
        $this->log($msg, DHubLogger::CRITICAL, true);
        try {
            $this->mailNotificationService->sendNotification($this->schedule, $this->channel, Constants::SCHEDULE_STATUS_FAILED);
        } catch (\Exception $exception) {
            $this->log($exception->getMessage(), DHubLogger::CRITICAL);
        }
    }

    /**
     * @param string $message
     * @param $level
     * @param bool $terminatingJob
     */
    private function log(string $message, $level, $terminatingJob = false)
    {
        if ($this->channel && $this->schedule) {
            $message .= "\n [ Channel '".$this->channel->getName()."', Schedule '".$this->schedule->getName()."' ]";
        }
        if ($terminatingJob) {
            $message .= "\n TERMINATING THE EXPORT JOB";
        }
        DHubLogger::log(" [EXPORT JOB] ".$message, $level);
    }

    private function sendNotification()
    {
        try {
            $this->mailNotificationService->sendNotification($this->schedule, $this->channel, Constants::SCHEDULE_STATUS_COMPLETED);
        } catch (\Exception $exception) {
            $this->log($exception->getMessage(), DHubLogger::CRITICAL);
        }

        $msg = "COMPLETED export process for the schedule - ".$this->schedule->getName();
        $this->log($msg, DHubLogger::INFO);
    }
}
