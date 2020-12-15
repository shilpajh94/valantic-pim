<?php

namespace DistributionHubBundle\Model;

use DistributionHubBundle\Model\AbstractModel;

class Filter extends AbstractModel
{
    public $objectType;

    public $filterConfig;

    public $filterByList;

    public $listFileAssetId;

    public $filterByAttribute;
    
    public $listFileSavePath;

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

    /**
     * @return mixed
     */
    public function getFilterByList()
    {
        return $this->filterByList;
    }

    /**
     * @param mixed $filterByList
     */
    public function setFilterByList(?bool $filterByList): void
    {
        $this->filterByList = $filterByList;
    }

    /**
     * @return mixed
     */
    public function getListFileAssetId()
    {
        return $this->listFileAssetId;
    }

    /**
     * @param mixed $listFileAssetId
     */
    public function setListFileAssetId(?string $listFileAssetId): void
    {
        $this->listFileAssetId = $listFileAssetId;
    }

    /**
     * @return mixed
     */
    public function getFilterByAttribute()
    {
        return $this->filterByAttribute;
    }

    /**
     * @param mixed $filterByAttribute
     */
    public function setFilterByAttribute(?string $filterByAttribute): void
    {
        $this->filterByAttribute = $filterByAttribute;
    }
    
    /**
     * @return mixed
     */
    public function getListFileSavePath()
    {
        return $this->listFileSavePath;
    }

    /**
     * @param mixed $listFileSavePath
     */
    public function setListFileSavePath(?string $listFileSavePath): void
    {
        $this->listFileSavePath = $listFileSavePath;
    }
}
