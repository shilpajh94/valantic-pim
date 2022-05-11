<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2C;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use \Pimcore\Model\Asset;
use PimDataPostBundle\Model\UpdateWindow;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Lib\DeltaManager\B2C\Dao\B2CProductDeltaManagerDao;
use PimDataPostBundle\Model\PersistantModel\PimcoreDeletedAssets;

class B2CProductDeltaManagerHelper
{
    private $updateWindow;

    private $dao;

    private $tempMasterTablesMeta;

    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta)
    {
        $this->tempMasterTablesMeta=$tempMasterTablesMeta;

        $this->updateWindow = UpdateWindow::getInstance();
        $this->dao = new B2CProductDeltaManagerDao($tempMasterTablesMeta);
    }

    public function getProductIdsByAssetsUpdatedRecords(): array
    {
        $list = new \Pimcore\Model\Asset\Listing();
        $list->setCondition("type = 'document' AND modificationDate >= ? AND modificationDate <= ?", [Util::getUpdateWindow()->getStartTimestamp(), Util::getUpdateWindow()->getEndTimestamp()]);
        $returnArray = [];
        foreach($list->load() as $assetRow)
        {
            $updatedAsset = $this->dao->getProductIdsByUpdatedAsset($assetRow->getId());
            if(count($updatedAsset) != 0){
                $returnArray = array_merge($returnArray, $updatedAsset);
            }        
        }
        return $returnArray;
    }


    public function getProductIdsByAssetsDeletedRecords(): array
    {
        $list = new PimcoreDeletedAssets\Listing();
        $returnArr = [];
        foreach($list->load() as $assetRow)
        {
            $deletedAsset = $this->dao->getProductIdsByDeletedAsset($assetRow->assetId);
            if(count($deletedAsset) != 0){
                $returnArr = array_merge($returnArr, $deletedAsset);
            }        
        }
        return $returnArr;
    }

}

