<?php
namespace AppBundle\Tool;

class AdminStyle extends \Pimcore\Model\Element\AdminStyle
{
    public function __construct($element)
    {
        parent::__construct($element);
        if($element instanceof \Pimcore\Model\DataObject\Product) {
            if(strtolower($element->getProductType()) == "base") {
                $this->elementIcon = '/bundles/pimcoreadmin/img/icon/tag_yellow.png';
                $this->elementIconClass = null;
            } else if($element->getProductType() == "skeleton") {
                $this->elementIcon = '/bundles/pimcoreadmin/img/icon/tag_blue.png';
                $this->elementIconClass = null;
            } else if($element->getProductType() == "fert") {
                $this->elementIcon = '/bundles/pimcoreadmin/img/icon/tag_green.png';
                $this->elementIconClass = null;
            }
        }
    }

}

