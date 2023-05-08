<?php

namespace B2BTranslationBundle\Helper;

class Common
{
    public function getParameter($data, $key) {
        if(!empty($data) && isset($data['parameters'])) {
            return isset($data['parameters'][$key])?$data['parameters'][$key]:false;       
        }
    }

    public function getInstance($service) {
        return \Pimcore::getContainer()->get($service);
    }

    public function getParameterItem($data, $key, $item) {
        if(!empty($data) && isset($data['parameters'])) {
            return isset($data['parameters'][$key])&&isset($data['parameters'][$key][$item])?$data['parameters'][$key][$item]:false;       
        }
    }
    public function getBooleanParameter($data) {
        if(!empty($data) && isset($data['parameters'])) {
            return isset($data['parameters'])?$data['parameters']:false;       
        }
    }
}
