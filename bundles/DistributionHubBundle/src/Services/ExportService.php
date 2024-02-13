<?php

namespace DistributionHubBundle\Services;

use Symfony\Component\HttpFoundation\Request;

use Pimcore\Localization\LocaleServiceInterface;
use Pimcore\Model\Asset;
use Pimcore\Db;
use Doctrine\DBAL\Connection;

use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\FTPDetail;
use DistributionHubBundle\Model\Schedule;
use DistributionHubBundle\Lib\Export\DataFetcher;

/**
 * Class ExportService
 * @package DistributionHubBundle\Services
 */
class ExportService
{
    /**
     * operator definition
     * @var array
     */
    private $helperDefinition = [];

    /**
     * @var LocaleServiceInterface
     */
    private $localeService;

    /**
     * @var BundleService
     */
    private $bundleService;

    /**
     * the field names to be exported
     * @var array
     */
    private $fields = [];

    /**
     * ExportService constructor.
     * @param LocaleServiceInterface $localeService
     * @param BundleService $bundleService
     */
    public function __construct(LocaleServiceInterface $localeService, BundleService $bundleService)
    {
        $this->localeService = $localeService;
        $this->bundleService = $bundleService;
    }

    /**
     * @return Schedule|null
     */
    public function getScheduleForProcess(): ?Schedule
    {
        $sch = null;
        $currentTime = time();
        $schList = new Schedule\Listing();
        $condition = "status = ".$schList->quote(Constants::SCHEDULE_STATUS_CREATED);
        $condition .= " AND time < ".$currentTime;

        $schList->setCondition($condition);
        $schList->setOrderKey("time");
        $schList->setOrder("ASC");
        $schList->setLimit(1);
        $schList->load();
        $db = \Pimcore\Db::get();
        // Assuming $tableName is the name of your table and $id is the ID of the record
        $tableName = 'distribution_hub_schedule';
        $status = 'CREATED'; // Your specific ID
        // Fetch all columns for the record with the specified ID
        $query = "SELECT `id` FROM `$tableName` WHERE status = ? ORDER BY time ASC LIMIT 1";
        $record = $db->fetchAllAssociative($query, [$status]);
        // $record will contain an associative array with column values for the specified ID
        if($record){
         $returnValue = Schedule::getById($record[0]['id']);
        }else{
         $returnValue = null;    
        }
        return $returnValue;
    }

    /**
     * return the data needed for the export process
     *
     * @param Schedule $schedule
     * @return array
     * @throws \Exception
     */
    public function getScheduleDataForProcess(Schedule $schedule): array
    {
        $channel  = $schedule->getChannel();
        $filter = $channel->getFilter();
        $filterConfig = null;
        if ($filter) {
            $filterConfig = $filter->getFilterConfig();
            $filterConfig = json_decode($filterConfig, true);
           if(!is_array($filterConfig)){
               $filterConfig = [];
           }

            $filterByList = $filter->getFilterByList();
            $listFileAssetId = $filter->getListFileAssetId();
            $filterByAttribute = $filter->getFilterByAttribute();

            $filterConfig["filterByListAttributes"]  = array(
                "filterByList" => $filterByList,
                "listFileAssetId" => $listFileAssetId,
                "filterByAttribute" => $filterByAttribute
            );

        }

        return array(
            "filterConfig" => $filterConfig,
            "channel" => $channel,
        );
    }

    /**
     * preparing fields array (name of all the fields in column configuration) and
     * helperDefinition array (definition of operators in the column configuration)
     * which would be used to fetch the data for export
     *
     * @param array $columnAttributeMapping
     */
    public function prepareFieldsAndHelperDefinition(array $columnAttributeMapping)
    {
        $selectedGridColumnAssoc = $columnAttributeMapping['selectedGridColumns'];
        $templateColumns = $columnAttributeMapping['templateAttribute'];
        $fields = [];
        $helperDefinition = [];
        try {
            foreach ($selectedGridColumnAssoc as $key => $selectedGridColumn) {
                foreach ($templateColumns as $index => $templateColumn) {
                    if (array_key_exists('key', $selectedGridColumn) && $key === $index) {
                        $fields[trim($templateColumn)] =
                        $selectedGridColumn['key'];
                    }
                }
                if (array_key_exists('key', $selectedGridColumn) && array_key_exists('isOperator', $selectedGridColumn) && $selectedGridColumn['isOperator']) {
                    $helperDefinition[$selectedGridColumn['key']] = json_decode(json_encode($selectedGridColumn));
                }
            }
        } catch (\Exception $e) {
            p_r($e->getMessage() . " " . $e->getFile() . " " . $e->getLine());
        }

        $this->fields = $fields;
        $this->helperDefinition = $helperDefinition;
    }

    /**
     * preparing asset fields array (name of all the asset fields in column configuration) and
     * helperDefinition array (definition of operators in the column configuration)
     * which would be used to fetch the data for export
     *
     * @param array $columnAttributeMapping
     */
    public function prepareFieldsForAssets(array $columnAttributeMapping)
    {
        $selectedGridColumnAssoc = $columnAttributeMapping['selectedGridColumns'];
        $assetColumnsForExport = $columnAttributeMapping['exportImageCols'];

        $fields = array();
        $fieldsCombined =  array();
        $helperDefinition = [];
        foreach ($assetColumnsForExport as $assetCol) {
            $index = substr($assetCol['definitionKey'], strpos($assetCol['definitionKey'], "_") + 1);

            foreach ($selectedGridColumnAssoc as $key => $selectedGridColumn) {
                if ($key == $index) {
                    $fields['templateColumn'] = $assetCol['templateHeader'];
                    if ($selectedGridColumn['isOperator']) {
                        $fields['thumbnail'] = $selectedGridColumn['attributes']['thumbnail'];
                        if ($selectedGridColumn['attributes']['children']) {
                            $fields['attributeName'] =  $selectedGridColumn['attributes']['children']['0']['attribute'];
                            if($selectedGridColumn['attributes']['children']['0']['children']){
                                $fields['className'] = $selectedGridColumn['attributes']['children']['0']['children']['0']['attribute'];
                            }
                        } else {
                            //handle field collection operator
                            $fields['attributeName'] =  $selectedGridColumn['attributes']['fcAttribute'];
                            $fields['fcFieldInBaseClass'] =  $selectedGridColumn['attributes']['fcFieldInBaseClass'];
                            $fields['fcIndex'] =  $selectedGridColumn['attributes']['fcIndex'];
                        }
                    } else {
                        $fields['attributeName'] =  $selectedGridColumn['attributes']['attribute'];
                    }
                }
            }
            $fieldsCombined[] = $fields;
        }
        $this->assetFields = $fieldsCombined;
    }

    /**
     * trying to mimic DataObject\Service::getHelperDefinitions();
     *
     * @return array
     */
    public function getHelperDefinitions(): array
    {
        return $this->helperDefinition;
    }

    /**
     * trying to mimic the fields which are passed to the pimcore grid proxy or csv generator
     *
     * @return array
     */
    public function getFieldsForExport(): array
    {
        return $this->fields;
    }

    /**
     * trying to mimic the fields which are passed to the pimcore grid proxy or csv generator
     *
     * @return array
     */
    public function getAssetsFieldsForExport(): array
    {
        return $this->assetFields;
    }

    /**
     * @param $list
     * @param $fields
     * @param bool $addTitles
     * @return array
     */
    public function getCsvDataForExport($list, $fields, $language, $addTitles = true)
    {
        $request = new Request(['language' => $language]);
        $dataFetcher = new DataFetcher();
        return $dataFetcher->getCsvData($request, $this->localeService, $list, $fields, $addTitles, $this->getHelperDefinitions());
    }

    /**
     * @param $list
     * @param $fields
     * @param bool $addTitles
     * @return array
     */
    public function getAssetDataForExport($list, $fields, $language, $addTitles = true)
    {
        $request = new Request(['language' => $language]);
        $dataFetcher = new DataFetcher();
        return $dataFetcher->getAssetData($request, $this->localeService, $list, $fields, $addTitles);
    }

    /**
     * commit the export file to the location selected by user in export location in
     * schedule configuration
     *
     * @param Channel $channel
     * @param Schedule $schedule
     * @param string $exportFilePath
     * @return array
     * @throws \Exception
     */
    public function sendExportFileToDesiredLocation(Channel $channel, Schedule $schedule, string $exportFilePath, bool $isZip)
    {
        $exportLocation = $schedule->getExportLocation();
        if (strtolower($exportLocation) == 'pimcore') {
            $asset = $this->addExportFileInAsset($channel, $exportFilePath);

            if ($isZip === true) {
                $schedule->setExportAssetFilePimcoreAssetId($asset->getId());
            } elseif ($isZip === false) {
                $schedule->setExportFilePimcoreAssetId($asset->getId());
            }
            $schedule->save();
        } elseif (strtolower($exportLocation) == 'ftp') {
            $ftpDetail = $channel->getFTPDetails();
            $ftpDetail = $ftpDetail[0];
            if (!$ftpDetail) {
                $msg = "FTP not configured for channel";
                $msg .= "So file can not be pushed to FTP.";
                throw new \Exception($msg);
            }
            try {
                $this->sendExportFileToFTP($ftpDetail, $exportFilePath);
            } catch (\Exception $exception) {
                $msg = $exception->getMessage();
                throw new \Exception($msg);
            }
        }
    }

    /**
     * @param Channel $channel
     * @param string $exportFilePath
     * @return Asset
     * @throws \Exception
     */
    public function addExportFileInAsset(Channel $channel, string $exportFilePath): Asset
    {
        $exportFileSavePath = $channel->getExportFilePath();
        if ($exportFileSavePath && Asset::getByPath($exportFileSavePath)) {
            $parentFolder = Asset::getByPath($exportFileSavePath);
        } else {
            $parentFolder = $this->bundleService->getDefaultAssetFolderForExportedFiles();
        }
        $asset = new Asset();
        $asset->setParent($parentFolder);
        $asset->setFilename(basename($exportFilePath));
        $asset->setData(file_get_contents($exportFilePath));
        $asset->save();

        return $asset;
    }
    /**
     * commit the export file to the FTP server
     *
     * @param FTPDetail $FTPDetail
     * @param string $exportFilePath
     * @throws \Exception
     */
    public function sendExportFileToFTP(FTPDetail $FTPDetail, string $exportFilePath): void
    {
        $port = $FTPDetail->getServerPort() ?? 21;
        $ftpServer = $FTPDetail->getServerAddress();

        try {
            $ftpConn = ftp_connect($ftpServer, $port);
            if (!$ftpConn) {
                throw new \Exception();
            }
        } catch (\Exception $exception) {
            throw new \Exception("Could not connect to FTP server ".$FTPDetail->getName().", msg: ". $exception->getMessage());
        }

        try {
            $login = ftp_login($ftpConn, $FTPDetail->getUserName(), $FTPDetail->getPassword());
        } catch (\Exception $exception) {
            throw new \Exception("Could not log in to FTP server ".$FTPDetail->getName().", msg: ". $exception->getMessage());
        }

        try {
            $result = ftp_put($ftpConn, basename($exportFilePath), $exportFilePath, FTP_BINARY);
            if (!$result) {
                throw new \Exception();
            }
        } catch (\Exception $exception) {
            throw new \Exception("Could not put file on FTP server ".$FTPDetail->getName().", msg: ". $exception->getMessage());
        }

        ftp_close($ftpConn);
    }

    /**
     * @param string $hostURL
     */
    public function setHostURLInSession(string $hostURL): void
    {
        $hostURL = rtrim($hostURL, '/');
        $_SESSION[Constants::HOST_NAME_KEY_IN_SESSION] = $hostURL;
    }

    /**
     * @param FTPDetail $FTPDetail
     * @throws \Exception
     */
    public function validateFTPConnection(FTPDetail $FTPDetail)
    {
        $port = $FTPDetail->getServerPort() ?? 21;
        $ftpServer = $FTPDetail->getServerAddress();

        try {
            $ftpConn = ftp_connect($ftpServer, $port);

            if (!$ftpConn) {
                throw new \Exception();
            }
        } catch (\Exception $exception) {
            throw new \Exception("Could not connect to FTP server '".$FTPDetail->getName()."'");
        }

        try {
            ftp_login($ftpConn, $FTPDetail->getUserName(), $FTPDetail->getPassword());
        } catch (\Exception $exception) {
            throw new \Exception("Could not log in to FTP server '".$FTPDetail->getName()."'");
        }

        ftp_close($ftpConn);
    }
}
