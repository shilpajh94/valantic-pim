<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2B;

class B2BProductMediaDeltaManager extends AbstractB2BMediaDeltaManager
{
    private $helper;

    public function __construct()  
    {
        $this->helper = new MediaDeltaManagerHelper();
    }

    public function getAssetsUpdatedRecords(): array
    {
        return $this->helper->getAssetsUpdatedRecords();
    }

    public function getAssetsDeletedRecords(): array
    {
        return $this->helper->getAssetsDeletedRecords();
    }
}

