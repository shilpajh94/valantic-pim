<?php

namespace DistributionHubBundle\Model\ChannelConfigShare;

use DistributionHubBundle\Model\AbstractDao;
use Pimcore\Db;

/**
 * @property DistributionHubBundle\Model\ChannelConfigShare $model
 */
class Dao extends AbstractDao
{

    const TABLE_NAME = 'distribution_hub_channel_user_share';

    /**
     * @param int $sharedWithUserId
     *
     * @throws \Exception
     */
    public function getChannelBySharedWithId($sharedWithUserId)
    {
        $data = $this->db->fetchFirstColumn("SELECT channelId FROM " . $this->db->quoteIdentifier(self::TABLE_NAME) . " WHERE sharedWithUserId = ?", [$sharedWithUserId]);
        if (!$data) {
            return null;
            //throw new \Exception('channel shared with ' . $sharedWithUserId . ' not found');
        }
        return $data;
    }
    /**
     * @param int $channelId
     *
     * @throws \Exception
     */
    public function getUserByChannelId($channelId)
    {
        $data = $this->db->fetchFirstColumn("SELECT sharedWithUserId FROM " . $this->db->quoteIdentifier(self::TABLE_NAME) . " WHERE channelId = ?", [$channelId]);
        if (!$data) {
            return null;
            //throw new \Exception('user with ' . $channelId . ' not found');
        }
        return $data;
    }

    public function save()
    {
        $channelConfig = $this->model->getObjectVars();
        $data = [];

        foreach ($channelConfig as $key => $value) {
            if (in_array($key, $this->getValidTableColumns(self::TABLE_NAME))) {
                if (is_bool($value)) {
                    $value = (int) $value;
                }

                $data[$key] = $value;
            }
        }

        $this->db->insertOrUpdate(self::TABLE_NAME, $data);
    }

    /**
     * Deletes object from database
     */
    public function delete()
    {
        $this->db->delete(self::TABLE_NAME, ['channelId' => $this->model->getChannelId(), 'sharedWithUserId' => $this->model->getSharedWithUserId()]);
    }

    /**
     * Deletes object from database
     * @param $configId
     */
    public static function deleteShareConfig($configId)
    {
        $db = Db::get();
        $db->executeQuery('DELETE from '.self::TABLE_NAME.' where channelId = ' . $db->quote($configId));
    }
}
