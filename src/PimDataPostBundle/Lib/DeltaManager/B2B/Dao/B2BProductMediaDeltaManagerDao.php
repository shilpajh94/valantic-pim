<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2B\Dao;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerDao;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;
class B2BProductMediaDeltaManagerDao extends DeltaManagerDao
{

    private $db;    //database

    private $attributeConfigProvider;
    
    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
        $this->attributeConfigProvider= new B2BProductAttributeConfigProvider();
    }

    public function getProductIdsByAsset(int $assetId)
    {
        $sql = "SELECT o_id FROM ".Constants::B2B_PRODUCT_MASTER_TABLE_NAME;
        $sql .= " WHERE Document LIKE '%|".$assetId.",'";
        $result = $this->db->fetchAll($sql);
        $returnArray = [];
        $returnArray['Document'] = array_column($result , 'o_id');
        return $returnArray;
    }

    public function getProductIdsByDeletedAsset(int $assetId)
    {
        
        $attributesArray = $this->attributeConfigProvider->getMediaAttributeConfig();
        $returnArray = [];
        foreach($attributesArray as $key => $attributesRow)
        {
            $sql = "SELECT o_id FROM ".Constants::B2B_PRODUCT_MASTER_TABLE_NAME;
            if($key == 'Document')
            {
                $sql .= " WHERE ".$key." LIKE '%|".$assetId.",'";
            }
            else
            {
                $sql .= " WHERE ".$key." = '".$assetId."'";
            }
            $result = $this->db->fetchAll($sql);
            $returnArray[$key] = array_column($result , 'o_id');
        }
        return $returnArray;
    }

}

