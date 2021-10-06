<?php
namespace ContitechCS\ProductBundle\Tool;

class AdminStyle extends \Pimcore\Model\Element\AdminStyle
{
    public function __construct($element)
    {
        parent::__construct($element);
        if($element instanceof \Pimcore\Model\DataObject\CSProducts) {
            if (empty($element->getIsArchived()) && empty($element->getIsPaused())) {
                $this->elementIcon = '/bundles/pimcoreadmin/img/icon/tag_green.png';
                $this->elementIconClass = null;
            } elseif(!empty($element->getIsArchived())) {
                $this->elementIcon = '/bundles/pimcoreadmin/img/icon/tag_red.png';
                $this->elementIconClass = null;
            } elseif(!empty($element->getIsPaused())) {
                $this->elementIcon = '/bundles/pimcoreadmin/img/icon/tag_yellow.png';
                $this->elementIconClass = null;
            }
        }
    }

}

