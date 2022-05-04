<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2B;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use \Pimcore\Model\Asset;
use PimDataPostBundle\Model\UpdateWindow;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Lib\DeltaManager\B2B\Dao\B2BProductMediaDeltaManagerDao;
use PimDataPostBundle\Model\PersistantModel\PimcoreDeletedAssets;

class MediaDeltaManagerHelper
{
    private $updateWindow;

    private $dao;

    public function __construct()
    {
        $this->updateWindow = UpdateWindow::getInstance();
        $this->dao = new B2BProductMediaDeltaManagerDao();
    }

    public function getAssetsUpdatedRecords(): array
    {
        $list = new \Pimcore\Model\Asset\Listing();
        $list->setCondition("type = 'document' AND modificationDate >= ? AND modificationDate <= ?", [Util::getUpdateWindow()->getStartTimestamp(), Util::getUpdateWindow()->getEndTimestamp()]);
        $returnArray = [];
        foreach($list->load() as $assetRow)
        {
            $updatedAsset = $this->dao->getProductIdsByUpdatedAsset($assetRow->getId());
            if(count($updatedAsset) != 0){
                $returnArray[$assetRow->getId()] = $updatedAsset;
            }        
        }
        return $returnArray;
    }


    public function getAssetsDeletedRecords(): array
    {
        $list = new PimcoreDeletedAssets\Listing();
        $returnArray = [];
        foreach($list->load() as $assetRow)
        {
            $deletedAsset = $this->dao->getProductIdsByDeletedAsset($assetRow->assetId);
            if(count($deletedAsset) != 0){
                $returnArray[$assetRow->assetId] = $deletedAsset;
            }        
        }
        return $returnArray;
    }

}

