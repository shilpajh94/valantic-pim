<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2B\Dao;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\DeltaManagerDao;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\PimFieldType;

class B2BProductDeltaManagerDao extends DeltaManagerDao
{
    public function getUpdatedMasterIds($masterClassName): array
    {
        $sql = "SELECT o_id FROM objects";
        $sql .= " WHERE o_className = :className";
        $sql .= " AND o_modificationDate BETWEEN :updateWindowStartTime AND :updateWindowEndTime";

        $result = $this->db->fetchCol($sql,["className" => $masterClassName, 
                                    "updateWindowStartTime" => Util::getUpdateWindow()->getStartTimestamp(),
                                    "updateWindowEndTime" => Util::getUpdateWindow()->getEndTimestamp()]);
        return $result;
    }

    public function getProductIdsForUpdatedMasterIds(array $updatedMasterIds, 
                                                        string $productAttributeNameInMasterTable, 
                                                        string $pimAttributeType,
                                                        string $masterTableName): array
    {
        if(empty($updatedMasterIds)){
            return [];
        }
        $sql = "SELECT o_id FROM " . $masterTableName;

        if($pimAttributeType === PimFieldType::SELECT()){
            $updatedMasterIdsString = "(" . implode(",", $updatedMasterIds) . ")";
            $sql .= " WHERE " . $productAttributeNameInMasterTable . " IN " . $updatedMasterIdsString;

        }elseif($pimAttributeType === PimFieldType::MULTISELECT() || 
                    $pimAttributeType === PimFieldType::ADVANCED_MANY_TO_MANY_OBJECT_RELATION()){
            $sql .= " WHERE ";
            $queryPart = [];
            foreach($updatedMasterIds as $masterId){
                $queryPart[] = " " . $productAttributeNameInMasterTable . " LIKE " . "," . $masterId . ",";
            }
            $sql .= implode(" OR ", $queryPart);

        }else{
            // @TODO: throw exception, this type is not handled
            return [];
        }

        $result = $this->db->fetchCol($sql);
        return $result;
    }
}

