<?php

namespace PTGEU\ImportBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Console\AbstractCommand;
use PTGEU\ImportBundle\Services\FailedRecords;
use Pimcore\Model\Asset;

class ProductFailureMailCommand extends AbstractCommand
{

    protected function configure()
    {
        $this->setName('conti:ptgeu-product-failure-mail')
            ->setDescription('Ptgeu Product Failure Record');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $year = date('Y');
        $monthName = date('F');

        $folderId = Asset::getByPath("/PTGEU Private Folder/Import Failure Logs/$year/$monthName")->getId();
        $list = new \Pimcore\Model\Asset\Listing();
        $list->setCondition("parentId = $folderId");
        $list->setOrder("DESC");
        $list->load();
        $currentDate = date('Y-m-d');
        $todaysFile = [];
        $yesterdayDate = date("Y-m-d", strtotime($currentDate." -1 day"));
        $yesterDaysFile = [];
        
        $todaysFileId = [];
        $yesterdaysFileId = [];

        $countchilds = count($list);
        if ($countchilds > 0) {
            foreach ($list as $fileChilds) {
                $fileName = $fileChilds->getKey();
              
                if (preg_match('/PIM_61_Material_/', $fileName) || preg_match('/PIM_61_MaterialPlant_/', $fileName) ||
                preg_match('/PIM_61_MaterialSales_/', $fileName)) {
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
        }
        if ($todaysFile) {
            $sendMail = new FailedRecords;
            $sendMail->sendNotificationsEmail($todaysFileId);
        } elseif ($yesterDaysFile) {
            $sendMail = new FailedRecords;
            $sendMail->sendNotificationsEmail($yesterdaysFileId);
        }
        return 1;
    }

    private function getDateFromFileName($fileName)
    {
        $arr = explode("_", $fileName);
        // Initialize finalDate to empty
        $finalDate = '';
        if (is_array($arr) && count($arr) > 3) {
            $end = $arr[3];
    
            if (strlen($end) == 8) {
                // Extract the month, day, and year parts
                $month = substr($end, 0, 2);
                $day = substr($end, 2, 2);
                $year = substr($end, 4, 4);
                $finalDate = "$year-$month-$day";
            }
        }
        return $finalDate;
    }
    
}

