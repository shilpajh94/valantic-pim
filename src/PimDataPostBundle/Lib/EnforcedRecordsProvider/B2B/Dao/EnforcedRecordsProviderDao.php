<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\Dao;

use PimDataPostBundle\Model\PersistantModel\B2BEntityEnforcedToPush;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Model\PersistantModel\B2BEntityEnforcedToPush\Dao as B2BEntityEnforcedToPushTable;
class EnforcedRecordsProviderDao
{
    private $db;    //database
    private $SFObjectType;  
   
    public function __construct($SFObjectType)
    {
        $this->db = \Pimcore\Db::get();
        $this->SFObjectType=$SFObjectType;
  
    }
    
    public function getEntityEnforceRecordsByLevel(string $operationType, $level): array
    {
        $sql = "SELECT t1.objectId FROM ".B2BEntityEnforcedToPushTable::TABLE_NAME." t1 ";
        $sql .= " JOIN ".Constants::B2B_CATEGORY_OBJECT_TABLE_NAME." t2 ON t2.oo_id = t1.objectId ";
        $sql .= " WHERE t1.operationType = '".APIOperationType::getByString($operationType)."'";
        $sql .= " AND t1.SFObjectType = '".B2BSalesForceObjectType::getByString($this->SFObjectType)."'";
        $sql .= " AND t2.Level = ".$level;
   
        $result = $this->db->fetchAll($sql);
        return array_column($result,'objectId');
    }

}

