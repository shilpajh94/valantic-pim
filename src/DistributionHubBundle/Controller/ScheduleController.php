<?php

namespace DistributionHubBundle\Controller;

use Doctrine\DBAL\Exception\NotNullConstraintViolationException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\FTPDetail;
use DistributionHubBundle\Model\Schedule;
use DistributionHubBundle\Services\BundleService;
use DistributionHubBundle\Lib\DHubLogger;
use DistributionHubBundle\Services\ScheduleService;

/**
 * @package DistributionHubBundle\Controller
 * @Route("/admin/distributionhub/schedules")
 */
class ScheduleController extends AdminController
{

    /**
     * @Route("/form_data")
     *
     * @param Request $request
     * @param ScheduleService $scheduleService
     * @return mixed
     */
    public function getAddFormDataAction(Request $request,ScheduleService $scheduleService){

        $channelId  = $request->get('channelId');
        $channel = Channel::getById($channelId);

        // checking if required configs are complete
//        $filter = $channel->getFilter();
        $attributeMapping = json_decode($channel->getColumnAttributeMapping(), true);
        $selectedGridColumns = $attributeMapping['selectedGridColumns'];
        if(!$channel->getPimcoreClassId() || count($selectedGridColumns) == 0){
            return $this->json(['success' => true,'requiredConfigComplete' => false]);
        }

        if($channel){
            $ftpName = $scheduleService->getFTPNameForChannel($channel);
            $exportFormats = $scheduleService->getAvailableExportFormats();
            $exportLocations = $scheduleService->getAvailableExportLocations();

            $ftpNames = array();
            if($ftpName){
                $ftpNames[] = $ftpName;
            }

            return $this->json([
                'success' => true,
                'ftpNames' => $ftpNames,
                'exportFormats' => $exportFormats,
                'exportLocations' => $exportLocations,
                'requiredConfigComplete' => true
                ]);
        }
        DHubLogger::log("Requested channel ($channelId) not found in ScheduleController getAddFormDataAction .", DHubLogger::INFO);

        $msg = $this->trans('dHub_channel_not_found_relaod_admin');
        return $this->json(['success' => false,'msg' => $msg]);

    }

    /**
     * @Route("/save")
     *
     * @param Request $request
     * @param ScheduleService $scheduleService
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function saveScheduleAction(Request $request,ScheduleService $scheduleService)
    {
 
        $name = $request->get('name');
        $exportDate = $request->get('exportDate');
        $exportTime = $request->get('exportTime');
        $exportFormat = $request->get('exportFormat');
        $exportLocation = empty($request->get('exportLocation')) ? "Pimcore" : $request->get('exportLocation');
        $exportFtp = $request->get('exportFtp');
        $channelId = $request->get('channelId');
        $downloadFileName = $request->get('downloadFileName');
        $exportResource = $request->get('exportResource');
        $exportImageCols = $request->get('exportImageCols');

        if(is_array($exportImageCols)){
            $exportImageCols = implode(',',$exportImageCols);
        }

        /**
         * checking if the channel exist
         */
        $channel = null;
        if($channelId){
            $channel = Channel::getById($channelId);
        }
        if(!$channel){
            DHubLogger::log("Requested channel ($channelId) not found in ScheduleController saveScheduleAction .", DHubLogger::INFO);
            $msg = $this->trans('dHub_channel_not_found_relaod_admin');
            return $this->json(['success' => false,'msg' => $msg]);
        }

        if(!$exportTime){
            $exportTime = "00:00";
        }
        $completeDateString = $exportDate.' '.$exportTime;
        $completeExportDate = \DateTime::createFromFormat('m/d/y H:i', $completeDateString);

        $schedule  = new Schedule();
        $schedule->setName($name);
        $schedule->setExportFormat($exportFormat);
        $schedule->setExportLocation($exportLocation);
        $schedule->setTime($completeExportDate);
        $schedule->setStatus(Constants::SCHEDULE_STATUS_CREATED);
        $schedule->setExportResource($exportResource);
        $schedule->setExportImageCols($exportImageCols);
        $schedule->setCreationDate(new \DateTime());

        if($downloadFileName){
            $schedule->setDownloadFileName($downloadFileName);
        }

        if($exportFtp){
            $ftp = FTPDetail::getById($exportFtp);
            if($ftp){
                $schedule->setFTPDetail($ftp);
            }
        }

        $schedule->setChannel($channel);

        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $schedule->setUserOwner($user->getId());

        try{
            $schedule->save();
        }catch (NotNullConstraintViolationException $exception) {
            DHubLogger::log("Error saving schedule: ".$exception->getMessage(), DHubLogger::CRITICAL);

            $msg = $this->trans('mandatory_field_check_failed-check application logger for more details.');
            return $this->json(['success' => false, 'msg' => $msg]);
        }catch (\Exception $exception) {
            DHubLogger::log("Error saving schedule: ".$exception->getMessage(), DHubLogger::CRITICAL);
            return $this->json(['success' => false, 'msg' => $exception->getMessage()]);
        }

        $data = $scheduleService->buildScheduleForGrid($schedule);
        $data['success'] = true;

        return $this->json($data);

    }

    /**
     * @Route("/list")
     *
     * @param Request $request
     * @param ScheduleService $scheduleService
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Exception
     */
    public function listSchedule(Request $request, ScheduleService $scheduleService)
    {
        $channelId = $request->get('channelId');

        $list = new Schedule\Listing();
        $condition = "channelId = ".$channelId." AND status != ".$list->quote(Constants::SCHEDULE_STATUS_EXPIRED);
        $list->setCondition($condition);
        $list->setOrderKey("creationDate");
        $list->setOrder("DESC");
        $list->load();

        $data = [];
        foreach($list->getItems() as $schedule ){
            $tmp = $scheduleService->buildScheduleForGrid($schedule);
            $data[] = $tmp;
        }

        return $this->json(['success'=> true, 'data' => $data]);
    }

    /**
     * @Route("/delete")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function deleteSchedule(Request $request)
    {
        $id = $request->get('scheduleId');

        $schedule = Schedule::getById($id);
        if($schedule){
            try{
                $schedule->delete();
            }catch (\Exception $exception){
                return $this->json(['success' => false,'msg' => $exception->getMessage()]);
            }
            return $this->json(['success' => true]);
        }
        DHubLogger::log("Requested schedule ($id) not found in ScheduleController deleteSchedule .", DHubLogger::INFO);
        $msg = $this->trans('dHub_schedule_not_found_relaod_admin');
        return $this->json(['success' => false,'msg' => $msg]);
    }

    /**
     * @Route("/export_image_columns")
     *
     * @param Request $request
     */
    public function getExportImageCols(Request $request){
        $channelId = (int)$request->get('channelId');
        $channel = Channel::getById($channelId);
        $colAttrMapping = json_decode($channel->getColumnAttributeMapping(),true);
        $exportImageCols = $colAttrMapping['exportImageCols'];
        $storeData = [];
        foreach($exportImageCols as $column){
            $storeData[] =  [ 'id' => $column['definitionKey'], 'name' =>  $column['templateHeader'] ] ;
        }
        return $this->json(['success' => true, 'data' => $storeData]);
    }

}
