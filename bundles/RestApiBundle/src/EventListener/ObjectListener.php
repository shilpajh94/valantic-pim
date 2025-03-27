<?php

namespace RestApiBundle\EventListener;

use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\VirtualCatalogApiMapper;



class ObjectListener
{
    public function postAdd(DataObjectEvent $event)
    {
        try{
            // Static Wire Type master is not required as it is static master 
            //(client won't be able to create a new one).

            $multiSelectMasterClassList = array('INH-HYD-HOSE~tubeMaterial',
                                                'INH-HYD-HOSE~coverMaterial',
                                                'INH-HYD-HOSE~coverCharacteristic',
                                                'ProductClass~reinforcement',            
                                            );
            $dataObject = $event->getObject();

            // Check if the object is a valid DataObject from MultiSelectMaster class
            if ($dataObject instanceof \Pimcore\Model\DataObject\MultiselectMaster) {
                // Get the class of the DataObject
                $masterType = $dataObject->getMasterType();
                if(in_array($masterType, $multiSelectMasterClassList)){
                    $listing = new VirtualCatalogApiMapper\Listing();
                    foreach ($listing as $vcMapperObj) {
                        $vcMapperObj->save();
                    }
                }
            }
        }
        catch(\Exception $e){
            echo "Error: ". $e->getMessage();
        }
    }

}