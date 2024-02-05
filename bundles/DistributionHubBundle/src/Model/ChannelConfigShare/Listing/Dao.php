<?php

namespace DistributionHubBundle\Model\ChannelConfigShare\Listing;

use DistributionHubBundle\Model\Listing\AbstractDao;

/**
 * @property DistributionHubBundle\Model\ChannelConfigShare\Listing $model
 */
class Dao extends AbstractDao
{
    const CLASS_NAME = '\\DistributionHubBundle\\Model\\ChannelConfigShare';

    const TABLE_NAME = \DistributionHubBundle\Model\ChannelConfigShare\Dao::TABLE_NAME;
    /**
     * Loads a list of channel configs for the specified parameters, returns an array of ChannelConfigShare elements
     *
     * @return array
     */
    public function load(): array
    {
        $channelConfigs = [];
        $data = $this->db->fetchAllAssociative("SELECT * FROM ". $this->db->quoteIdentifier(self::TABLE_NAME) . $this->getCondition() . $this->getOrder() . $this->getOffsetLimit(), $this->model->getConditionVariables());

        foreach ($data as $configData) {
            $channelConfig = new \DistributionHubBundle\Model\ChannelConfigShare();
            $channelConfig->setValues($configData);
            $channelConfigs[] = $channelConfig;
        }

        $this->model->setChannelConfigShares($channelConfigs);

        return $channelConfigs;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        $amount = 0;
        try {
            $amount = (int) $this->db->fetchOne("SELECT COUNT(*) as amount FROM ". $this->db->quoteIdentifier(self::TABLE_NAME) . $this->getCondition(), $this->model->getConditionVariables());
        } catch (\Exception $e) {
        }

        return $amount;
    }
}
