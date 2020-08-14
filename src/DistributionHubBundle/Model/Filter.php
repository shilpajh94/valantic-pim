<?php

namespace DistributionHubBundle\Model;

use DistributionHubBundle\Model\AbstractModel;

class Filter extends AbstractModel
{
    public $objectType;

    public $filterConfig;


    /**
     * @return mixed
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * @param mixed $objectType
     */
    public function setObjectType(?string $objectType): void
    {
        $this->objectType = $objectType;
    }

    /**
     * @return mixed
     */
    public function getFilterConfig()
    {
        return $this->filterConfig;
    }

    /**
     * @param mixed $filterConfig
     */
    public function setFilterConfig(?string $filterConfig): void
    {
        $this->filterConfig = $filterConfig;
    } 
}