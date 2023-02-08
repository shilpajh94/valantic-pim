<?php

namespace IFSEU\ImportBundle\Helper;

class Common
{

    public function getParameter($data, $key) {
        if(!empty($data) && isset($data['parameters'])) {
            return isset($data['parameters'][$key])?$data['parameters'][$key]:false;       
        }
    }
}
