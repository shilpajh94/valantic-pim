<?php

namespace AppBundle\Model\DataObject; 

class Products extends \Pimcore\Model\DataObject\Product {
    private $o_elementAdminStyle;
    
    public function getElementAdminStyle() {
        if (!$this->o_elementAdminStyle) {
           $this->o_elementAdminStyle = new \AppBundle\Tool\AdminStyle($this);
        }
        return $this->o_elementAdminStyle;
    }
}

