<?php

namespace PimDataPostBundle\EventListener;
use PimDataPostBundle\Model\PersistantModel\PimcoreDeletedAssets;
use Pimcore\Event\Model\ElementEventInterface;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Event\Model\AssetEvent;
use Pimcore\Event\Model\DocumentEvent;

class AssetListener {
    public function onPostAssetDelete (ElementEventInterface $e) {
       
        if($e instanceof AssetEvent) {
            $asset = $e->getAsset(); 
            if($asset->getType() == 'image' ||  $asset->getType() == 'video' || $asset->getType() == 'document')
            {
                $newObject = new PimcoreDeletedAssets();
                $newObject->setAssetId($asset->getId());
                $newObject->setType($asset->getType());
                $newObject->save();
            }
        }
    }
}