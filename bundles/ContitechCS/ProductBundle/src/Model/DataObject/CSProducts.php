<?php

namespace ContitechCS\ProductBundle\Model\DataObject; 

class CSProducts extends \Pimcore\Model\DataObject\CSProducts {

    public function getElementAdminStyle() {
        if (!$this->o_elementAdminStyle) {
           $this->o_elementAdminStyle = new \ContitechCS\ProductBundle\Tool\AdminStyle($this);
        }
        return $this->o_elementAdminStyle;
    }
}

