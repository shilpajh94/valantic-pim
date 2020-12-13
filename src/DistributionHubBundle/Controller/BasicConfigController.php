<?php

namespace DistributionHubBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Exception\NotNullConstraintViolationException;
use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use Pimcore\Model\Asset;
use DistributionHubBundle\Lib\DHubLogger;
use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\FTPDetail;
use DistributionHubBundle\Services\BasicConfigService;
use DistributionHubBundle\Services\BundleService;
use DistributionHubBundle\Services\ChannelService;
use Pimcore\Model\DataObject\AbstractObject;

/**
 * @package DistributionHubBundle\Controller
 * @Route("/admin/distributionhub/basic_config")
 */
class BasicConfigController extends AdminController
{
    /**
     * @Route("/get_pimcore_classes")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getPimcoreClasses(Request $request)
    {
        $list = new \Pimcore\Model\DataObject\ClassDefinition\Listing();
        $list->load();
        $availableClasses = $list->getClasses();

        $fieldArray = array();
        foreach ($availableClasses as $classes) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['id'] = $classes->getId();
            $fieldArrayTemp['name'] = $classes->getName();
            $fieldArray[] = $fieldArrayTemp;
        }

        return $this->json(["classes" => $fieldArray]);

    }

    /**
     * @Route("/read_uploaded_file")
     *
     * @param Request $request
     * @param BasicConfigService $basicConfigService
     * @return JsonResponse
     */
    public function readUploadedFile(Request $request, BasicConfigService $basicConfigService)
    {

        try {
            $result = $basicConfigService->validateUploadedFile($_FILES['file']);

        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $exception) {
            DHubLogger::log("Error reading uploaded file in BasicConfigController readUploadedFile:".$exception->getMessage(), DHubLogger::INFO);
            return $this->json(['success' => false, 'msg' => $this->trans('dHub_file_not_valid') ]);

        } catch (\Exception $exception) {
            DHubLogger::log("Error reading uploaded file BasicConfigController readUploadedFile:".$exception->getMessage(), DHubLogger::INFO);
            return $this->json(['success' => false, 'msg' => $exception->getMessage()]);
        }

        return $this->json(["success" => true, "fileType" => $result['fileType'], 'sheetNames' => $result['sheetNames'], 'fileName' => $result['fileName']]);

    }

    /**
     * @Route("/read_uploaded_list_file")
     *
     * @param Request $request
     * @param BasicConfigService $basicConfigService
     * @return JsonResponse
     */
    public function readUploadedFileList(Request $request, BasicConfigService $basicConfigService, BundleService $bundleService)
    {
        $allParams = array_merge($request->request->all(), $request->query->all());
        $channelName = $allParams["channelName"];

        try {
            $result = $basicConfigService->validateUploadedFile($_FILES['file']);

            if($result['fileType'] === Constants::FILE_TYPE_CSV){
                $tmpUploadPathfolder = PIMCORE_PROJECT_ROOT . '/'.$bundleService->getConfig('tmp_template_upload_pimcore_dir');

                $uploadedFilePath = $tmpUploadPathfolder . $result['fileName'] ;
                try{
                    $asset = $basicConfigService->addFileInAsset($uploadedFilePath, $channelName);
                }catch (\Exception $exception){
                    DHubLogger::log("Error creating asset for uploaded file: ".$exception->getMessage(), DHubLogger::CRITICAL);
                    $msg = $this->trans("dHub_error_uploading_file");
                    return $this->json(['success' => false, 'msg' => $msg]);
                }
                $newAssetFileName = $asset->getFilename();
                $newAsseetId = $asset->getId();
            }

        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $exception) {
            DHubLogger::log("Error reading uploaded file in Filter configuration readUploadedFile:".$exception->getMessage(), DHubLogger::INFO);
            return $this->json(['success' => false, 'msg' => $this->trans('dHub_file_not_valid') ]);

        } catch (\Exception $exception) {
            DHubLogger::log("Error reading uploaded file :".$exception->getMessage(), DHubLogger::INFO);
            return $this->json(['success' => false, 'msg' => $exception->getMessage()]);
        }

        return $this->json(["success" => true, "fileType" => $result['fileType'], 'fileName' => $result['fileName'], 'assetId' => $newAsseetId]);
    }

    /**
     * @Route("/save")
     *
     * @param Request $request
     * @param BasicConfigService $basicConfigService
     * @param BundleService $bundleService
     * @return JsonResponse
     * @throws \Exception
     */
    public function save(Request $request, BasicConfigService $basicConfigService,BundleService $bundleService)
    {
        $channelId = $request->get('channelId');
        $pimcoreClassId = $request->get('pimcoreClassId');
        $fileType = $request->get('fileType');
        $sheetNumberInExcel = $request->get('sheetNumber');
        $rowNumberInExcel = $request->get('headerRowNumber');
        $csvDelimiter = $request->get('csvDelimiter');
        $exportCsvDelimiter = $request->get('exportCsvDelimiter');
        $newlyUploadedFileName = $request->get('newlyUploadedFileName');
        $exportFileUploadPath = $request->get('exportFileUploadPath');
        $ftpName = $request->get('ftpName');
        $ftpServerAddress = $request->get('ftpServerAddress');
        $ftpPort = $request->get('ftpPort');
        $ftpUserName = $request->get('ftpUserName');
        $ftpPassword = $request->get('ftpPassword');

        $channel = Channel::getById($channelId);
        $newAssetFileName = null;
        $newAsseetId = null;
        $uploadedFilePath = null;
        $asset = null;

        if ($channel) {
            $channel->setPimcoreClassId($pimcoreClassId);
            if(!$channel->getColumnAttributeMapping()){
                $mappingAttributes = $this->encodeJson(ChannelService::getMappingInfo([], $pimcoreClassId));
                $channel->setColumnAttributeMapping($mappingAttributes);
            }
            $channel->setExportFileCSVDelimiter($exportCsvDelimiter);

            if ($fileType) {
                $channel->setHeaderMappingFileType($fileType);
            }
            if ($fileType == Constants::FILE_TYPE_EXCEL) {
                $channel->setSheetNumberInMappingFile($sheetNumberInExcel);
                $channel->setHeaderRowNumberInMappingFile($rowNumberInExcel);

                $channel->setMappingFileCSVDelimiter(null);
            } elseif ($fileType == Constants::FILE_TYPE_CSV) {
                $channel->setSheetNumberInMappingFile(null);
                $channel->setHeaderRowNumberInMappingFile(null);

                $channel->setMappingFileCSVDelimiter($csvDelimiter);
            }
            if($exportFileUploadPath){
                $channel->setExportFilePath($exportFileUploadPath);
            }else{
                $channel->setExportFilePath($bundleService->getDefaultAssetFolderPathForExportedFiles());
            }

            // operations on uploaded file
            if ($newlyUploadedFileName) {
                $tmpUploadPathfolder = PIMCORE_PROJECT_ROOT . '/'.$bundleService->getConfig('tmp_template_upload_pimcore_dir');

                $uploadedFilePath = $tmpUploadPathfolder . $newlyUploadedFileName;
                try{
                    $asset = $basicConfigService->addFileInAsset($uploadedFilePath,$channel->getName());
                }catch (\Exception $exception){
                    DHubLogger::log("Error creating asset for uploaded file in BasicConfigController save:".$exception->getMessage(), DHubLogger::CRITICAL);
                    $msg = $this->trans("dHub_error_saving_channel");
                    return $this->json(['success' => false, 'msg' => $msg]);
                }
                $newAssetFileName = $asset->getFilename();
                $newAsseetId = $asset->getId();
                if ($asset) {
                    $channel->setHeaderMappingFileAssetId($asset->getId());
                }
            }

            $ftpDetails = $channel->getFTPDetails();
            $newFTPCreated = false;
            if(count($ftpDetails) == 0){
                $newFTPCreated = true;
                $ftp = new FTPDetail();
            }else{
                $ftp = $ftpDetails[0];
            }
            if($ftpServerAddress != null && $ftpPort != null ){
                $ftp->setName($ftpName);
                $ftp->setServerAddress($ftpServerAddress);
                $ftp->setServerPort($ftpPort);
                $ftp->setUserName($ftpUserName);
                $ftp->setPassword($ftpPassword);

                try{
                    $ftp->save();
                }catch (NotNullConstraintViolationException $exception) {
                    DHubLogger::log("Error saving FTP for channel ($channelId) in BasicConfigController save :".$exception->getMessage(), DHubLogger::CRITICAL);

                    $msg = $this->trans('mandatory_field_check_failed');
                    return $this->json(['success' => false, 'msg' => $msg]);
                }catch (\Exception $exception) {
                    DHubLogger::log("Error saving FTP for channel ($channelId) in BasicConfigController save : ".$exception->getMessage(), DHubLogger::CRITICAL);
                    return $this->json(['success' => false, 'msg' => $exception->getMessage()]);
                }
                $channel->setFTPDetails(array($ftp));
            }

            try {
                $channel->save();
            }catch (NotNullConstraintViolationException $exception) {
                if ($asset) {
                    $asset->delete();
                }
                DHubLogger::log("Error saving channel ($channelId) in BasicConfigController save:".$exception->getMessage(), DHubLogger::CRITICAL);
                $msg = $this->trans('mandatory_field_check_failed');
                return $this->json(['success' => false, 'msg' => $msg]);
            } catch (\Exception $exception) {
                if ($asset) {
                    $asset->delete();
                }
                DHubLogger::log("Error saving channel ($channelId) in BasicConfigController save:".$exception->getMessage(), DHubLogger::CRITICAL);
                return $this->json(['success' => false, 'msg' => $exception->getMessage()]);
            }
            if($uploadedFilePath){
                unlink($uploadedFilePath);
            }

            return $this->json([
                'success' => true,
                'newAssetFileName' => $newAssetFileName,
                'newAssetId' => $newAsseetId
            ]);

        } else {
            $msg = $this->trans('dHub_channel_not_found_relaod_admin');
            return $this->json(['success' => false, 'msg' => $msg]);
        }

    }


    /**
     * @Route("/save-confirmation-response")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function saveConfirmationResponse(Request $request)
    {
        $channelId = $request->get('channelId');
        $channel = Channel::getById($channelId);
        $mappingAttributes = $this->encodeJson(ChannelService::getMappingInfo([]));
        $filter = new \DistributionHubBundle\Model\Filter();
        $filter->setObjectType(AbstractObject::OBJECT_TYPE_VARIANT);
        $filter->save();
        if($channel){
            $channel->setColumnAttributeMapping($mappingAttributes);
            $channel->setFilter($filter);
            $channel->setShowInGridMapping(null);
            $channel->setShareGlobally(null);
            $channel->setDescription(null);
            $channel->setLanguage(null);
            $channel->setMappingFileCSVDelimiter(null);
            $channel->setSheetNumberInMappingFile(null);
            $channel->setHeaderRowNumberInMappingFile(null);
            // remove schedules
            $scheduleList = new \DistributionHubBundle\Model\Schedule\Listing();
            $scheduleList->setCondition("channelId = ".$channelId." ");
            $scheduleList->load();
            if(!empty($scheduleList->getItems())){
                foreach ($scheduleList->getItems() as $schedule) {
                    $schedule->delete(); 
                }
            } 
            $channel->save();

            return $this->json(['success' => true, 'msg' => "channel resetted"]);
        }
        return $this->json(['success' => false]);
    }
}
