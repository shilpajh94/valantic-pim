<?php

namespace DistributionHubBundle\Model\Schedule;

use DistributionHubBundle\Model\AbstractDao;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\FTPDetail;

class Dao extends AbstractDao
{
    const TABLE_NAME = 'distribution_hub_schedule';

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

        if ($data['ftpDetailId']) {
            $ftp = FTPDetail::getById($data['ftpDetailId']);
            $this->model->setFTPDetail($ftp);
        }

        if ($data['channelId']) {
            $channel = Channel::getById($data['channelId']);
            $this->model->setChannel($channel);
        }
    }
}
