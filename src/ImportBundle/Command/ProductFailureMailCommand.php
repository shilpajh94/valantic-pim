<?php

namespace ImportBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Console\AbstractCommand;
use ImportBundle\Model\Import\FailedRecords;
use Pimcore\Model\Asset;

class ProductFailureMailCommand   extends AbstractCommand {

    protected function configure()
    {
        $this->setName('conti:product-failure-mail')
            ->setDescription('Product Failure Record');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {   
        $year = date('Y');
        $monthName = date('F');

        $folderId = Asset::getByPath("/IFS PTG Private Folder/Import Failure Logs/$year/$monthName")->getId();
        $list = new \Pimcore\Model\Asset\Listing();
        $list->setCondition("parentId = $folderId");
        $list->setOrder("DESC"); 
        $list->load();
      
        $currentDate = date ('Y-m-d');
        $todaysFile = [];
        $yesterdayDate = date("Y-m-d",strtotime($currentDate." -1 day"));
        $yesterDaysFile = [];
        
        $todaysFileId = [];
        $yesterdaysFileId = [];

        $countchilds = count($list);
        if($countchilds > 0){
            foreach ($list as $fileChilds) {
                $fileName = $fileChilds->getKey();
                $fileDate = $this->getDateFromFileName($fileName);

                if ($currentDate == $fileDate) {
                $todaysFile[] = $fileName;
                $todaysFileId[] = $fileChilds->getId();
                }               
                if ($yesterdayDate == $fileDate) {
                $yesterDaysFile[] = $fileName;
                $yesterdaysFileId[] = $fileChilds->getId();
                }
            }
        } 
        if ($todaysFile ) {
            $sendMail = new FailedRecords;
            $sendMail->sendNotificationsEmail($todaysFileId);
        } else if ($yesterDaysFile) {
            $sendMail = new FailedRecords;
            $sendMail->sendNotificationsEmail($yesterdaysFileId);
        }     
    }

    private function getDateFromFileName($fileName)
    {
        $arr        = explode("_",$fileName);
        $finalDate  = '';
        if(is_array($arr) && $arr)
        {
            $end  = $arr[2];

            $date = explode(".",$end);
            if(is_array($date) && $date)
            {   
                $datestr = reset($date);
                $month = substr($datestr,0,2);
                $date = substr($datestr,2,2);
                $year = substr($datestr,4,4);
                $finalDate = "$year-$month-$date";
            }
        }
        return $finalDate;
    }


}

