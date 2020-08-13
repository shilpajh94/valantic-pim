<?php


namespace DistributionHubBundle\Lib\Export\Writers;


use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\Schedule;

class Factory
{
    public static function getWriter(Channel $channel,Schedule $schedule,string $tmpFilePathFolder): ?Writer
    {
        $writer = null;

        $exportFormat = $schedule->getExportFormat();
        if($exportFormat == Constants::FILE_TYPE_XLSX){
            $writer = new XlsxWriter($channel, $schedule, $tmpFilePathFolder);
        }elseif ($exportFormat == Constants::FILE_TYPE_CSV){
            $writer = new CsvWriter($channel, $schedule, $tmpFilePathFolder);
        }

        return $writer;
    }

}
