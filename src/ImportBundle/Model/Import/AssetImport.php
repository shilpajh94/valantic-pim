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

    public function getProductByAttribute(string $idValue,string $idAttribute, string $importType, ?string $siopLevel = "")
    {
        $productClassTable = "object_".$this->getPimcoreClassIdByName("Product");
        $productCatClassTable = "object_".$this->getPimcoreClassIdByName("ProductCategory");

        if($importType == "PTG" && trim($siopLevel) == "SAP #"){
            //in case of PTG, some of the records contain sap number instead of the siop code
            $idAttribute = "articleNumber";
        }

        $sql = "SELECT o.o_id, o.siopfullcode, CONCAT(s.o_path, s.o_key) AS siopFullPath";
        $sql .= " FROM ".$productClassTable." o";
        $sql .= " LEFT JOIN ".$productCatClassTable." s";
        $sql .= " ON (o.siopfullcode = s.fullCode)";
        $sql .= " WHERE o.".$idAttribute." = " . $this->db->quote($idValue) ;

        $productType = null;
        if($importType == "PTG"){
            if(trim($siopLevel) == '6'){
                $productType = "skeleton";
            }elseif(trim($siopLevel) == '5'){
                $productType = "base";
            }elseif(trim($siopLevel) == 'SAP #'){
                $productType = "fert";
            }

        }elseif($importType == "IFS"){
            $length = strlen($idValue);
            $productType = 'fert';
            if ($length == 6) {
                $productType = 'base';
            } elseif ($length == 9) {
                $productType = 'skeleton';
            }
        }

        if(!$productType){
            return array();
        }
        $productTypeCondition = " o.ProductType = " . $this->db->quote($productType);
        $sql .= " AND " . $productTypeCondition;

        return $this->db->fetchAll($sql);

    }

    private function getPimcoreClassIdByName(string $classname)
    {
        $classDef = \Pimcore\Model\DataObject\ClassDefinition::getByName($classname);
        return $classDef->getId();
    }

}
