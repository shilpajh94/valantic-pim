<?php

namespace Wvision\Bundle\DataDefinitionsBundle\Model\Listing;

class AbstractListing extends \Pimcore\Model\Listing\AbstractListing
{

    public $items = array();


    public function isValidOrderKey(string $key): bool
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
