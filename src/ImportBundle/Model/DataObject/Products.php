<?php

namespace AppBundle\Model\DataObject; 

class Products extends \Pimcore\Model\DataObject\Product {

    public function getElementAdminStyle() {
        if (!$this->o_elementAdminStyle) {
           $this->o_elementAdminStyle = new \AppBundle\Tool\AdminStyle($this);
        }
        return $this->o_elementAdminStyle;
    }
}

