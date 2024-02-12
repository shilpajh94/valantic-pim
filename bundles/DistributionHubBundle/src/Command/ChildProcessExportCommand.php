<?php


namespace DistributionHubBundle\Command;


use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Lib\DHubLogger;
use DistributionHubBundle\Lib\Export\Writers\Factory;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\Schedule;
use DistributionHubBundle\Services\BundleService;
use DistributionHubBundle\Services\ExportService;
use DistributionHubBundle\Services\FilterService;
use DistributionHubBundle\Services\MailNotificationService;
use DistributionHubBundle\Services\ScheduleProcessHelperService;
use Pimcore\Model\DataObject\ClassDefinition;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ChildProcessExportCommand extends Command
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


    private $schedule;
    private $channel;

    protected static $defaultName = 'distributionhub:child_process_export';

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
        $this->setDescription('To start an export job for the available schedules.')
            ->addArgument('offset', InputArgument::REQUIRED, 'offset for product listing')
            ->addArgument('limit', InputArgument::REQUIRED, 'limit for product listing')
            ->addArgument('pimcoreClassId', InputArgument::REQUIRED, 'class id of the selected export class')
            ->addArgument('scheduleId', InputArgument::REQUIRED, 'id of the schedule to be exported')
            ->addArgument('tmpFilePath', InputArgument::REQUIRED, 'tmp export file path');
    }

    protected function execute(InputInterface $input, OutputInterface $output):int
    {
        // $scheduleId = $input->getArgument('scheduleId');
        $scheduleId = 461;
        $pimcoreClassId = $input->getArgument('pimcoreClassId');
        $limit = $input->getArgument('limit');
        $offset = $input->getArgument('offset');
        $tmpFilePath = $input->getArgument('tmpFilePath');

        $this->schedule = Schedule::getById($scheduleId);
        // $scheduleId = 460;
        // p_r()
        $scheduleData = $this->exportService->getScheduleDataForProcess($this->schedule);
        // p_r($scheduleData);
        $this->channel = $scheduleData['channel'];
        $filterConfig = $scheduleData['filterConfig'];
        $columnAttributeMapping = json_decode($this->channel->getColumnAttributeMapping(), true);

        p_r('kjds123');
        try {
            $this->doExport($columnAttributeMapping,$tmpFilePath,$pimcoreClassId,$filterConfig,$offset,$limit);
        }catch (\Exception $exception){
            p_r($exception->getMessage().' : '.$exception->getFile().' : '.$exception->getLine());
            $this->handleProcessFailure($exception->getMessage());
        }
        return 1;
    }

    
    private function doExport($columnAttributeMapping,$tmpFilePath,$pimcoreClassId,$filterConfig,$offset,$limit)
    {
        // p_r('kjds');
        /**
         * preparing fields array (name of all the fields in column configuration) and
         * helperDefinition array (definition of operators in the column configuration)
         * which would be used to fetch the data
         */

         p_r($columnAttributeMapping);
        $this->exportService->prepareFieldsAndHelperDefinition($columnAttributeMapping);
        $fields = $this->exportService->getFieldsForExport();
        p_r($fields); die;
        try {
            $writer = Factory::getWriter($this->channel, $this->schedule, $tmpFilePath);
            // p_r('y');
        } catch (\Exception $exception) {
            // p_r('n');
            p_r($exception->getMessage().' : '.$exception->getFile().' : '.$exception->getLine());
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
        // p_r($listObj);
        // $listObj->setUnpublished(false);
        // Assuming $filterConfig['conditions'] is an array of conditions
        foreach ($filterConfig['conditions']['filters'] as $condition) {
        if ($condition['fieldname'] === 'published') {
        $operator = $condition['filterEntryData'] ?? null;
        if($operator == 'true'){
            $listObj->setUnpublished(false);
        }else{
            $listObj->setUnpublished(true);
        }
        //Now $operator contains the operator value, e.g., "true" or "false"
        break; // You can break out of the loop since you found the relevant condition
        }
        }
        // Use $operator as needed in your code

        $dataForFilterService = array();
        $dataForFilterService['classId'] = $pimcoreClassId;
        $dataForFilterService['conditions'] = $filterConfig['conditions'];
        $dataForFilterService['type'] = $filterConfig['type'];
        $dataForFilterService['filterByList'] = $filterConfig['filterByListAttributes']['filterByList'];
        $dataForFilterService['listFileAssetId'] = $filterConfig['filterByListAttributes']['listFileAssetId'];
        $dataForFilterService['filterByAttribute'] = $filterConfig['filterByListAttributes']['filterByAttribute'];

        try {
            $resultListObj = $this->filterService->getFilteredList($dataForFilterService, $listObj);
            //  p_r($resultListObj);
        } catch (\Exception $exception) {
            p_r($exception->getMessage().' : '.$exception->getFile().' : '.$exception->getLine());
            $this->handleProcessFailure($exception->getMessage());
            return;
        }
        $resultListObj->setOffset($offset);
        $resultListObj->setLimit($limit);
        try {
            $resultListObj->load();
            // p_r($resultListObj);
            $exportData = $this->exportService->getCsvDataForExport($resultListObj, $fields, $this->channel->getLanguage(), false);
            // p_r($exportData);
            if (empty($exportData)) {
                $msg = "Prepared export data is empty";
                // p_r('1111');
                // p_r($msg);
                $this->handleProcessFailure($msg);
                return;
            }

            $writer->write($exportData);
        } catch (\Exception $exception) {
            // p_r('2222');
            // p_r($exception->getMessage().' : '.$exception->getFile().' : '.$exception->getLine());
            $this->handleProcessFailure($exception->getMessage());
            return;
        }

        try {
            $writer->postWrite();
        } catch (\Exception $exception) {
            p_r('3333');
            p_r($exception->getMessage().' : '.$exception->getFile().' : '.$exception->getLine());
            $msg = "Error while writing to export file. msg: ".$exception->getMessage();
            $this->handleProcessFailure($msg);
        }
    }


    private function handleProcessFailure(string $msg)
    {
        p_r("in process failure function3: ".$msg);
        $this->helperService->updateScheduleStatusToFailure($this->schedule);
        $this->log($msg, DHubLogger::CRITICAL, true);
        try {
            // $this->mailNotificationService->sendNotification($this->schedule, $this->channel, Constants::SCHEDULE_STATUS_FAILED);
        } catch (\Exception $exception) {
            p_r($exception->getMessage().' : '.$exception->getFile().' : '.$exception->getLine());
            $this->log($exception->getMessage(), DHubLogger::CRITICAL);
        }
    }

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
}
