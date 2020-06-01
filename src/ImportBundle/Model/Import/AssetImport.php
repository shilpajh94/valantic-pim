<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImportBundle\Model\Import;

/**
 * Description of AssetImport
 *
 * @author rohitsrivastava
 */
class AssetImport {
    
    /**
     * Function is constructor and set the db connection
     */
    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }
    
    public function getProductByOldMaterialCode($code) {
        $length = strlen($code);
        $type = 'fert';
        if ($length == '6') {
            $type = 'base';
        } elseif ($length == '9') {
            $type = 'skeleton';
        }
        $sql = 'SELECT o.o_id, o.siopfullcode, CONCAT(s.o_path, s.o_key) AS siopFullPath FROM object_1 o LEFT JOIN object_2 s ON (o.siopfullcode = s.fullCode) WHERE o.o_key like '.$this->db->quote($code."%").' AND o.ProductType = '.$this->db->quote($type);
        return $this->db->fetchAll($sql);
    }
    
}
