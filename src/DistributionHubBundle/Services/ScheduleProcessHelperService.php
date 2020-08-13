<?php
namespace DistributionHubBundle\Services;

use Pimcore\Model\Asset;

use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Lib\DHubLogger;
use DistributionHubBundle\Model\Schedule;

/**
 * Class ScheduleProcessHelperService
 * @package DistributionHubBundle\Services
 */
class ScheduleProcessHelperService
{
    /**
     * @var BundleService
     */
    private $bundleService;

    /**
     * @var MailNotificationService
     */
    private $mailNotificationService;

    /**
     * ScheduleProcessHelperService constructor.
     * @param BundleService $bundleService
     * @param MailNotificationService $mailNotificationService
     */
    public function __construct(BundleService $bundleService, MailNotificationService $mailNotificationService)
    {
        $this->bundleService = $bundleService;
        $this->mailNotificationService = $mailNotificationService;
    }

    /**
     * check for schedule's existence
     *
     * @param Schedule $schedule
     * @return bool
     */
    public function isScheduleDeleted(Schedule $schedule): bool
    {
        $sch = Schedule::getById($schedule->getId());
        if($sch instanceof Schedule){
            return false;
        }
        return true;
    }

    /**
     * @param Schedule $schedule
     */
    public function updateScheduleStatusToInProgress(Schedule $schedule)
    {
        $schedule->setExportProcessStartTime(new \DateTime());
        $schedule->setStatus(Constants::SCHEDULE_STATUS_INPROGRESS);
        $schedule->save();
    }

    /**
     * @param Schedule $schedule
     */
    public function updateScheduleStatusToFailure(Schedule $schedule)
    {
        $schedule->setExportProcessEndTime(new \DateTime());
        $schedule->setStatus(Constants::SCHEDULE_STATUS_FAILED);
        $schedule->save();
    }
    
    /**
     * @param Schedule $schedule
     */
    public function updateScheduleStatusToComplete(Schedule $schedule) {
        $schedule->setStatus(Constants::SCHEDULE_STATUS_COMPLETED);
        $schedule->save();
    }

    /**
     * set schedule status to complete
     *
     * @param Schedule $schedule
     * @param array $updateParams
     */
    public function updateScheduleParams(Schedule $schedule)
    {
        $currentTime = new \DateTime();

        $schedule->setExportProcessEndTime($currentTime);
        $schedule->setExpiryTime($this->getExpiryDate($currentTime));
        $exportLocation = $schedule->getExportLocation();
 
        if (strtolower($exportLocation) == 'ftp'){
            // ToDo : status mismatch in case of both assets and dataFile 
            $schedule->setStatus(Constants::SCHEDULE_STATUS_COMPLETED);
            $schedule->save();
        }

    }

    /**
     * find the dead processes (which are in IN-PROCESS status longer then the expected time) and update
     * their status to KILLED
     *
     * then calculate the new value of count of IN-PROGRESS status processes
     *
     * @return array
     */
    public function getInProgressProcessesStatusAfterUpdatingDeadProcesses(): array
    {
        $inProgressProcesses = $this->getInProgressProcesses();
        $inProgressProcessCount = $this->updateStatusForDeadProcesses($inProgressProcesses);

        $maxActiveParallelProcessCount = $this->bundleService->getMaxActiveParallelProcessCount();
        if($inProgressProcessCount < $maxActiveParallelProcessCount ){
            return array('canNewProcessStart' => true,'inProgressProcessCount' => $inProgressProcessCount);
        }
        return array('canNewProcessStart' => false,'inProgressProcessCount' => $inProgressProcessCount);
    }

    /**
     * find the dead processes (which are in IN-PROCESS status longer then the expected time) and update
     * their status to KILLED
     *
     * @param array $inProgressProcesses
     * @return int
     * @throws \Exception
     */
    public function updateStatusForDeadProcesses(array $inProgressProcesses): int
    {
        $inProgressProcessCount = count($inProgressProcesses);
        foreach ($inProgressProcesses as $schedule) {
            if ($this->isProcessRunningTimeThresholdExceeded($schedule)) {
                $this->updateScheduleStatusToKilled($schedule);

                $inProgressProcessCount--;

                $channel = $schedule->getChannel();
                $msg = "Killed process for schedule ".$schedule->getName()." of channel ".$channel->getName().".";
                $msg .= " The process took longer than expected time (".$this->bundleService->getInProgressProcessLife()." minutes).";
                $this->log($msg, DHubLogger::ALERT);

                try{
                    $this->mailNotificationService->sendNotification($schedule, $channel, Constants::SCHEDULE_STATUS_KILLED);
                }catch (\Exception $exception){
                    $this->log($exception->getMessage(), DHubLogger::CRITICAL);
                }
            }
        }
        return $inProgressProcessCount;
    }

    /**
     * @param Schedule $schedule
     */
    public function updateScheduleStatusToKilled(Schedule $schedule)
    {
        $schedule->setExportProcessEndTime(new \DateTime());
        $schedule->setStatus(Constants::SCHEDULE_STATUS_KILLED);
        $schedule->save();
    }

    /**
     * @param \DateTime $exportProcessEndTime
     * @return \DateTime
     * @throws \Exception
     */
    public function getExpiryDate(\DateTime $exportProcessEndTime): \DateTime
    {
        $expiryDays = $this->bundleService->getConfig('schedule_expiry_days');
        return $exportProcessEndTime->add(new \DateInterval('P'.$expiryDays.'D'));
    }

    /**
     * @param Schedule $schedule
     * @return bool
     * @throws \Exception
     */
    private function isProcessRunningTimeThresholdExceeded(Schedule $schedule): bool
    {
        $startTime = $schedule->getExportProcessStartTime();

        if($startTime){
            $thresholdMinutes = $this->bundleService->getInProgressProcessLife();
            $intervalString = "PT".$thresholdMinutes."M";
            $thresholdInterval = new \DateInterval($intervalString);

            $thresholdTime = clone($startTime);
            $thresholdTime->add($thresholdInterval);
            $currentTime = new \DateTime('NOW');
            if($currentTime > $thresholdTime){
                return true;
            }
        }
        return false;
    }

    /**
     * @return array
     */
    public function getInProgressProcesses(): array
    {
        $schList = new Schedule\Listing();
        $condition = "status = ".$schList->quote(Constants::SCHEDULE_STATUS_INPROGRESS);
        $schList->setCondition($condition);
        $schList->load();
        return $schList->getItems();
    }

    /**
     * find the COMPLETED schedules which have passed their expiry date and update their status to EXPIRED
     *
     * @throws \Exception
     */
    public function updateStatusForExpiredProcesses()
    {
        $currentTime = new \DateTime();

        $listing = new Schedule\Listing();
        $condition = "status = ".$listing->quote(Constants::SCHEDULE_STATUS_COMPLETED)." AND  expiryTime < ".$currentTime->getTimestamp();
        $listing->setCondition($condition);
        $listing->load();

        foreach($listing->getItems()  as $schedule){
            $exportedAssetId = $schedule->getExportFilePimcoreAssetId();
            if($exportedAssetId && ($asset = Asset::getById($exportedAssetId)) ){
                $asset->delete();
            }
            $schedule->setExportFilePimcoreAssetId(null);
            $schedule->setStatus(Constants::SCHEDULE_STATUS_EXPIRED);
            $schedule->save();

            $channel = $schedule->getChannel();

            $msg = "Schedule ".$schedule->getName()." of channel ".$channel->getName()." EXPIRED.";
            $this->log($msg,DHubLogger::ALERT);

            try{
                $this->mailNotificationService->sendNotification($schedule, $channel, Constants::SCHEDULE_STATUS_EXPIRED);
            }catch (\Exception $exception){
                $this->log($exception->getMessage(), DHubLogger::CRITICAL);
            }

        }
    }

    /**
     * @param string $message
     * @param $level
     */
    private function log(string $message, $level)
    {
        DHubLogger::log($message,$level);
    }

}
