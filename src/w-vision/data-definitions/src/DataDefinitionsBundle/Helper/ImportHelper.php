<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Wvision\Bundle\DataDefinitionsBundle\Helper;
use Wvision\Bundle\DataDefinitionsBundle\Service\BundleService;
use Wvision\Bundle\DataDefinitionsBundle\Model\DataDefinitionImport;

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
        if ($processStartTime instanceof \DateTime) {
            $processStartTime = $processStartTime->format($dateFormat);
        }
        $processEndTime = $dataImport->getImportProcessEndTime();
        if ($processEndTime) {
            $processEndTime = $processEndTime->format($dateFormat);
        }

        return [
            'id' => $dataImport->getId(),
            'name' => $dataImport->getName(),
            'download_file_name' => $dataImport->getDownloadFileName(),
            'import_status' => $dataImport->getStatus(),
            'creation_date' => $dataImport->getCreationDate()->format($dateFormat),
            'importFilePimcoreAssetId' => $dataImport->getImportFilePimcoreAssetId(),
            'process_start_time' => $processStartTime,
            'process_end_time' => $processEndTime
        ];
    }
}
