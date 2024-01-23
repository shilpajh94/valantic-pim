<?php
namespace AppBundle\Model\Product\AdminStyle;

use Pimcore\Model\DataObject;
use Pimcore\Model\Element\AdminStyle;
use Pimcore\Model\Element\ElementInterface;

class Product extends AdminStyle
{
    protected ElementInterface $element;

    public function __construct(ElementInterface $element)
    {
        parent::__construct($element);

        $this->element = $element;

        if ($element instanceof \Pimcore\Model\DataObject\Product) {
            if(strtolower($element->getProductType()) == "base") {
                $this->elementIcon = '/bundles/pimcoreadmin/img/icon/tag_yellow.png';
                $this->elementIconClass = null;
            } elseif($element->getProductType() == "skeleton") {
                $this->elementIcon = '/bundles/pimcoreadmin/img/icon/tag_blue.png';
                $this->elementIconClass = null;
            } elseif($element->getProductType() == "fert") {
                $this->elementIcon = '/bundles/pimcoreadmin/img/icon/tag_green.png';
                $this->elementIconClass = null;
            }
        }
    }
}