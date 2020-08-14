<?php

namespace DistributionHubBundle\Services;


use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\FTPDetail;
use DistributionHubBundle\Model\Schedule;

class ScheduleService
{
    private $bundleService;

    public function __construct(BundleService $bundleService)
    {
        $this->bundleService = $bundleService;
    }

    public function getFTPNameForChannel(Channel $channel): ?string
    {
        $ftpName = null;
        $ftp = $this->bundleService->getFtpForChannel($channel);
        if ($ftp) {
            $ftpName = $ftp->getName();
        }

        return $ftpName;
    }

    public function getAvailableExportFormats(): array
    {
        return $this->bundleService->getConfig('export_formats_for_schedule');
    }

    public function getAvailableExportLocations(): array
    {
        return $this->bundleService->getConfig('export_locations_for_schedule');
    }

    public function getDateFormat(): string
    {
        return $this->bundleService->getConfig('schedule_date_format');
    }

    public function buildScheduleForGrid(Schedule $schedule): array
    {
        $dateFormat = $this->getDateFormat();

        $processStartTime = $schedule->getExportProcessStartTime();
        if($processStartTime instanceof \DateTime){
            $processStartTime = $processStartTime->format($dateFormat);
        }
        $processEndTime = $schedule->getExportProcessEndTime();
        if($processEndTime){
            $processEndTime = $processEndTime->format($dateFormat);
        }
        $expiryTime = $schedule->getExpiryTime();
        if($expiryTime){
            $expiryTime = $expiryTime->format($dateFormat);
        }

        return [
            'id' => $schedule->getId(),
            'name' => $schedule->getName(),
            'download_file_name' => $schedule->getDownloadFileName(),
            'export_date' => $schedule->getTime()->format($dateFormat),
            'export_format' => $schedule->getExportFormat(),
            'export_location' => $schedule->getExportLocation(),
            'expiry' => $expiryTime,
            'export_ftp' => '',
            'export_status' => $schedule->getStatus(),
            'creation_date' => $schedule->getCreationDate()->format($dateFormat),
            'exportFilePimcoreAssetId' => $schedule->getExportFilePimcoreAssetId(),
            'exportAssetFilePimcoreAssetId' => $schedule->getExportAssetFilePimcoreAssetId(),
            'process_start_time' => $processStartTime,
            'process_end_time' => $processEndTime
        ];

    }



}
