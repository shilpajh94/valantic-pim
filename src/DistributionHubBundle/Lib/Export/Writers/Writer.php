<?php


namespace DistributionHubBundle\Lib\Export\Writers;


use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\Schedule;

interface Writer
{
    public function __construct(Channel $channel,Schedule $schedule,string $tmpFilePathFolder);

    public function postWrite();

    public function write(array $data);

    public function getTmpFilePath();

}
