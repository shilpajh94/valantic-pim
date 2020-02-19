<?php

namespace ClassRelationBundle\EventListener;

class EventListener {
    public function productSave($event) {
//        $object = $event->getObject();
//        if ($object instanceof \Pimcore\Model\DataObject\Product) {
//            $category = $object->getCategory();
//            if($category != NULL) {
//                $object->setCategoryName($category[0]->getCategoryName());
//            }
//            $vendor = $object->getVendor();
//            if($vendor != NULL) {
//                $object->setVendorName($vendor[0]->getVendorName());
//            }
//            $dateStr = date('Y/m/d',$object->getModificationDate());
//            $dateObj = new \DateTime($dateStr);
//            $dateObj->format('Y/m/d');
//            $object->setModifiedDate($dateObj);
//            $object->update();
//        }
    }
}