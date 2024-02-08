<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2C\Dao;

use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Model\PersistantModel\B2CEntityEnforcedToPush\Dao as B2CEntityEnforcedToPushTable;
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
        $sql = "SELECT t1.objectId FROM ".B2CEntityEnforcedToPushTable::TABLE_NAME." t1 ";
        $sql .= " JOIN ".Constants::B2C_CATEGORY_OBJECT_TABLE_NAME." t2 ON t2.oo_id = t1.objectId ";
        $sql .= " WHERE t1.operationType = '".APIOperationType::getByString($operationType)."'";
        $sql .= " AND t1.SFObjectType = '".B2CSalesForceObjectType::getByString($this->SFObjectType)."'";
        $sql .= " AND t2.Level = ".$level;
        $result = $this->db->fetchAllAssociative($sql);
        return array_column($result,'objectId');
    }

}
