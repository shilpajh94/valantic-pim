<?php
namespace ImportBundle\Services\Model;
use ImportBundle\Services\Product\Validator\Product as ProductValidator;
use Pimcore\Model\DataObject\ProductCategory;
class ProductModel {
    private $prdVldInstance;
    public function __construct() {
        $this->prdVldInstance = new ProductValidator;
    }
    public function getProductType($index) {
        return $this->prdVldInstance->productType[$index];
    }

    public function setSiop($siops, \Pimcore\Model\DataObject\Product $targetObject) {
        if(!empty($targetObject) && !empty($siops)) {
            foreach($siops as $l => $siop) {
                $sioLvlName = "setSIOPLevel".$l;
                // p_r($siop->getId().' - '.$siop->getFullCode());
                if(!empty($siop) && $siop->getId())
                $targetObject->$sioLvlName([ProductCategory::getById($siop->getId())]);
            }
        }
    }
}