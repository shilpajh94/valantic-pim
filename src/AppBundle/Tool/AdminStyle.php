<?php
namespace AppBundle\Tool;

class AdminStyle extends \Pimcore\Model\Element\AdminStyle
{
    public function __construct($element)
    {
        parent::__construct($element);
        if($element instanceof \Pimcore\Model\DataObject\Product) {
            if($element->getProductType() == "Base") {
                $this->elementIcon = '/bundles/pimcoreadmin/img/icon/tag_green.png';
                $this->elementIconClass = null;
            } else if($element->getProductType() == "6Digit") {
                $this->elementIcon = '/bundles/pimcoreadmin/img/icon/tag_yellow.png';
                $this->elementIconClass = null;
            } else if($element->getProductType() == "9Digit") {
                $this->elementIcon = '/bundles/pimcoreadmin/img/icon/tag_blue.png';
                $this->elementIconClass = null;
            }
        }
    }

}

