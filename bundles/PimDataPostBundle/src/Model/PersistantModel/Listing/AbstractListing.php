<?php

namespace PimDataPostBundle\Model\PersistantModel\Listing;

class AbstractListing extends \Pimcore\Model\Listing\AbstractListing
{

    public $items = array();


    public function isValidOrderKey($key): bool
    {
        return true;
    }


    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }
}
