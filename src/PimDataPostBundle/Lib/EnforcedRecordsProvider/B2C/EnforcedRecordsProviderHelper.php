<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2C;

use PimDataPostBundle\Model\PersistantModel\B2CEntityEnforcedToPush;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Model\PersistantModel\B2CProductRelationChange;
class EnforcedRecordsProviderHelper
{
    private $SFObjectType;
    
    public function __construct($SFObjectType) {
        $this->SFObjectType = $SFObjectType;
    }
    
    public function getEntityEnforceRecords(string $operationType): array
    {
        $listing = new B2CEntityEnforcedToPush\Listing();
        $selection = "SFObjectType = " . $listing->quote(B2CSalesForceObjectType::getByString($this->SFObjectType)) . " AND ";
        $selection .= "operationType = " . $listing->quote(APIOperationType::getByString($operationType));
        $listing->setCondition($selection);
        $ids =[];

        foreach($listing->load() as $row)
        {
            $ids[] = $row->objectId;
        }
        return $ids;
    }

    public function deleteEntityEnforceRecords(): bool
    {
        $listing = new B2CEntityEnforcedToPush\Listing();
        $listing = $listing->setCondition('SFObjectType = ?', B2CSalesForceObjectType::getByString($this->SFObjectType));
        foreach($listing->load() as $row)
        {
            $row->delete();
        }
        return true;
    }

    public function getCategoryEnforcedRelationObject(): array
    {
        $listing = new B2CEntityEnforcedToPush\Listing();
        $listing = $listing->setCondition('SFObjectType = ?', B2CSalesForceObjectType::getByString($this->SFObjectType));
        $returnArray =[];
        foreach($listing->load() as $row)
        {
            $objectIdArray = explode("_",$row->objectId);
            if(isset($objectIdArray[0]) && isset($objectIdArray[1]))
            {
                $object = new B2CProductRelationChange();
                $object->setProductId($objectIdArray[0]);
                $object->setNewValue(','.$objectIdArray[1].',');
                $returnArray[] = $object;
            }
        }
        return $returnArray;
    }

    public function getMediaEnforcedRelationObject(string $operationType): array
    {
        $listing = new B2CEntityEnforcedToPush\Listing();
        $listing = $listing->setCondition('SFObjectType = ? AND operationType = ?', [B2CSalesForceObjectType::getByString($this->SFObjectType), APIOperationType::getByString($operationType)]);
        $returnArray =[];
        foreach($listing->load() as $row)
        {
            $recordId = $row->getObjectId();
            // separator here should be equal to B2BProductMediaPoster -> pimIdSeparator
            $valueArray = explode("_", $recordId);
            $newValue = $valueArray[2] == "" ? null : $valueArray[2];
            $oldValue = $valueArray[3] == "" ? null : $valueArray[3];
            $object = new B2BProductRelationChange();
            $object->setProductId($valueArray[0]);
            $object->setAttributeName($valueArray[1]);
            $object->setNewValue($newValue);
            $object->setOldValue($oldValue);

            $returnArray[] = $object;
        }
        return $returnArray;
    }



}

