<?php

namespace DistributionHubBundle\Model\Channel;

use DistributionHubBundle\Model\AbstractDao;
use DistributionHubBundle\Model\FTPDetail;
use DistributionHubBundle\Model\Filter;
use DistributionHubBundle\Model\Schedule;

class Dao extends AbstractDao
{
    const TABLE_NAME = 'distribution_hub_channel';

    const CHANNEL_FTP_MAP_TABLE_NAME = 'distribution_hub_channel_ftp_map';
    const CHANNEL_USER_SHARE_MAP_TABLE_NAME = 'distribution_hub_channel_user_share';

    const FILTER_TABLE_NAME = Filter\Dao::TABLE_NAME;

    const SCHEDULE_TABLE_NAME = Schedule\Dao::TABLE_NAME;


    /**
     * @param $id
     * @throws \Exception
     */
    public function getById($id)
    {
        $data = $this->db->fetchRow("SELECT * FROM " . $this->db->quoteIdentifier(static::TABLE_NAME) . " WHERE id = ?", $id);
        if (!$data["id"]) {
            throw new \Exception("record with id " . $id . " not found");
        }
        $this->assignVariablesToModel($data);

        if($data['filterId']){
            $filter = Filter::getById($data['filterId']);
            $this->model->setFilter($filter);
        }
    }

    public function getByName($name)
    {
        $data = $this->db->fetchRow("SELECT * FROM " . $this->db->quoteIdentifier(self::TABLE_NAME) . " WHERE name = ?", $name);
        if (!$data["id"]) {
            throw new \Exception("channel with id " . $name . " not found");
        }
        $this->assignVariablesToModel($data);

        if($data['filterId']){
            $filter = Filter::getById($data['filterId']);
            $this->model->setFilter($filter);
        }
    }

    /**
     * Save object to database
     *
     * @return bool
     */
    public function save()
    {
        $this->db->beginTransaction();
        try {
            $dateTime = new \DateTime();
            if(!$this->model->getId()){
                $this->model->setCreationDate($dateTime);
            }
            $this->model->setModificationDate($dateTime);

            $dataAttributes = get_object_vars($this->model);
            $data = [];
            foreach ($dataAttributes as $key => $value) {
                if (in_array($key, $this->getValidTableColumns(static::TABLE_NAME))) {
                    $data[$key] = $value;
                }
            }

            if(count($this->model->ftpDetailIds) > 0 ){
                $ftpData = [];
                foreach($this->model->ftpDetailIds as $id){
                    $tmp = ['channelId' => $this->model->getId(), 'ftpDetailId' => $id];
                    $ftpData = $tmp;
                }
                $this->db->insertOrUpdate('distribution_hub_channel_ftp_map', $ftpData);
            }

            $this->db->insertOrUpdate(static::TABLE_NAME, $data);

            $lastInsertId = $this->db->lastInsertId();
            if (!$this->model->getId() && $lastInsertId) {
                $this->model->setId($lastInsertId);
            }

            $this->db->commit();
            return true;
        } catch (\Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getFTPDetails()
    {
        try{
            $data = $this->db->fetchCol("SELECT ftpDetailId FROM " . $this->db->quoteIdentifier(self::CHANNEL_FTP_MAP_TABLE_NAME) . " WHERE channelId = ?",[$this->model->getId()]);
        }catch (\Exception $e){
            throw $e;
        }

        $ftpDetails = array();
        foreach($data as $ftpDetailId){
            $ftpDetails[] = FTPDetail::getById($ftpDetailId);
        }

        return $ftpDetails;
    }


    /**
     * Deletes object from database
     *
     * @return void
     */
    public function delete()
    {

        $this->db->beginTransaction();
        try {
            // delete filter of the schedule
            $filter = $this->model->getFilter();
            if($filter && $filter->getId()){
                $this->db->delete(static::FILTER_TABLE_NAME, ['id' => $filter->getId()]);
            }

            // delete schedules of the channel
            $scheduleIds = $this->getScheduleIds();
            foreach($scheduleIds as $scheduleId){
                $this->db->delete(static::SCHEDULE_TABLE_NAME, ['id' => $scheduleId]);
            }

            $this->db->delete(static::CHANNEL_USER_SHARE_MAP_TABLE_NAME, ['channelId' => $this->model->getId()]);
            $this->db->delete(static::TABLE_NAME, ['id' => $this->model->getId()]);

            $this->db->commit();
        } catch (\Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    public function getScheduleIds()
    {
        try{
            $data = $this->db->fetchCol("SELECT id FROM " . $this->db->quoteIdentifier(self::SCHEDULE_TABLE_NAME) . " WHERE channelId = ?",[$this->model->getId()]);

        } catch (Exception $ex) {
            throw $ex;
        }
        return $data;
    }




//        /**
//     * @return array
//     * @throws \Exception
//     */
//    public function getFilter()
//    {
//        try{
//            $data = $this->db->fetchCol("SELECT `id` FROM " . $this->db->quoteIdentifier(self::FILTER_TABLE_NAME) . " WHERE `srcId` = ?",[$this->model->getId()]);
//        }catch (\Exception $e){
//            throw $e;
//        }
//
//        $filters = array();
//        foreach($data as $filterId){
//            $filters[] = Filter::getById($filterId);
//        }
//
//        return $filters;
//    }

}
