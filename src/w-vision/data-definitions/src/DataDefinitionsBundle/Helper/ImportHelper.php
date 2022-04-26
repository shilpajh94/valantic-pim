<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Wvision\Bundle\DataDefinitionsBundle\Helper;
use Wvision\Bundle\DataDefinitionsBundle\Service\BundleService;
use Wvision\Bundle\DataDefinitionsBundle\Model\DataDefinitionImport;
use Wvision\Bundle\DataDefinitionsBundle\Lib\Constants;

/**
 * Description of CommonHelper
 *
 * @author jitendra verma
 */
class ImportHelper
{

    private $bundleService;

    public function __construct()
    {
        $this->bundleService = new BundleService();
    }

    public function getDateFormat(): string
    {
        return $this->bundleService->getConfig('schedule_date_format');
    }

    public function buildScheduleForGrid(DataDefinitionImport $dataImport): array
    {
        $dateFormat = $this->getDateFormat();

        $processStartTime = $dataImport->getImportProcessStartTime();
        
        // get the difference of current time and start time
        $timeDiff = time() - $processStartTime->getTimeStamp();
        
        if ($processStartTime instanceof \DateTime) {
            $processStartTime = $processStartTime->format($dateFormat);
        }
        $processEndTime = $dataImport->getImportProcessEndTime();
        if ($processEndTime) {
            $processEndTime = $processEndTime->format($dateFormat);
        }

        if($dataImport->getStatus()=='COMPLETED')
        {
            $importStatus   = $dataImport->getStatus();
        }
        elseif($dataImport->getStatus()=='FAILED')
        {
            $importStatus   = $dataImport->getStatus()." (some error occurred)";
        }
        else
        {
            $processedRecords   = $dataImport->getProcessedRecords();
            $totalRecords       = $dataImport->getTotalRecords();
            $processedPercentage= $totalRecords > 0 ? ($processedRecords * 100) / $totalRecords : 0;
            $importStatus       = round($processedPercentage). '%';

            // kill the process if progress is 0% after 120 seconds
            if($timeDiff > 120 && $processedPercentage==0)
            {
                $processId      = $dataImport->getProcessId();
                $processKilled  = shell_exec(sprintf("kill -9 %d", $processId));

                // update process id of respective data definition import 
                $importDataId   = $dataImport->getId();
                $dataImportExec = DataDefinitionImport::getById($importDataId);
                $dataImportExec->setStatus(Constants::SCHEDULE_STATUS_FAILED);
                $dataImportExec->setImportProcessEndTime(new \DateTime());
                $dataImportExec->save();

                $importStatus     = $dataImportExec->getStatus()." (some error occurred)";
            }
        }
        return [
            'id' => $dataImport->getId(),
            'name' => $dataImport->getName(),
            'import_status' => $importStatus,
            'creation_date' => $dataImport->getCreationDate()->format($dateFormat),
            'logFilePimcoreAssetId' => $dataImport->getLogFilePimcoreAssetId(),
            'process_start_time' => $processStartTime,
            'process_end_time' => $processEndTime
        ];
    }
}
