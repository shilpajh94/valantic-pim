<?php

namespace DistributionHubBundle\Model\ChannelConfigShare;

use DistributionHubBundle\Model;

/**
 * @method DistributionHubBundle\Model\ChannelConfigShare\Listing\Dao getDao()
 * @method Model\ChannelConfigShare[] load()
 * @method Model\ChannelConfigShare current()
 */
class Listing extends Model\Listing\AbstractListing
{
    /**
     * @var array|null
     *
     * @deprecated use getter/setter methods or $this->data
     */
    protected $channelConfigShares = null;

    public function __construct()
    {
        $this->channelConfigShares = & $this->data;
    }

    /**
     * @return Model\ChannelConfigShare[]
     */
    public function getChannelConfigShares()
    {
        return $this->getData();
    }

    /**
     * @param array $channelConfigShares
     * @return Listing
     */
    public function setChannelConfigShares(array $channelConfigShares)
    {
        return $this->setData($channelConfigShares);
    }
}
