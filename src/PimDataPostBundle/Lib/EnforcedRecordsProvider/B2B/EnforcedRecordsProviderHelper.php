<?php
namespace PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B;

use PimDataPostBundle\Model\PersistantModel\B2BEntityEnforcedToPush;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
class EnforcedRecordsProviderHelper
{
    private $SFObjectType;
    
    public function __construct($SFObjectType) {
        $this->SFObjectType = $SFObjectType;
    }
    
    public function getEntityEnforceRecords(string $operationType): array
    {
        $listing = new B2BEntityEnforcedToPush\Listing();
        $selection = "SFObjectType = " . $listing->quote(B2BSalesForceObjectType::getByString($this->SFObjectType)) . " AND ";
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
        $listing = new B2BEntityEnforcedToPush\Listing();
        $listing = $listing->setCondition('SFObjectType = ?', B2BSalesForceObjectType::getByString($this->SFObjectType));
        foreach($listing->load() as $row)
        {
            $row->delete();
        }
        return true;
    }

    public function getCategoryEnforcedRelationObject(): array
    {
        $listing = new B2BEntityEnforcedToPush\Listing();
        $listing = $listing->setCondition('SFObjectType = ?', B2BSalesForceObjectType::getByString($this->SFObjectType));
        $returnArray =[];
        foreach($listing->load() as $row)
        {
            $objectIdArray = explode("_",$row->objectId);
            if(isset($objectIdArray[0]) && isset($objectIdArray[1]))
            {
                $object = new B2BProductRelationChange();
                $object->setProductId($objectIdArray[0]);
                $object->setNewValue(','.$objectIdArray[1].',');
                $returnArray[] = $object;
            }
        }
        return $returnArray;
    }

    public function getMediaEnforcedRelationObject(string $operationType): array
    {
        $listing = new B2BEntityEnforcedToPush\Listing();
        $listing = $listing->setCondition('SFObjectType = ? AND operationType = ?', [B2BSalesForceObjectType::getByString($this->SFObjectType), APIOperationType::getByString($operationType)]);
        $returnArray =[];
        foreach($listing->load() as $row)
        {
            $objectIdArray = explode("_",$row->objectId);
            if(isset($objectIdArray[0]) && isset($objectIdArray[1]) && isset($objectIdArray[2]))
            {
                if($objectIdArray[1] == 'Document')
                    $objectIdArray[1] = "asset|".$objectIdArray[1];
                $object = new B2BProductRelationChange();
                $object->setProductId($objectIdArray[0]);
                if($row->operationType== APIOperationType::DELETE())
                $object->setOldValue($objectIdArray[2]);
                else
                $object->setNewValue($objectIdArray[2]);
                $object->setAttributeName($objectIdArray[1]);

                $returnArray[] = $object;
            }
        }
        return $returnArray;
    }



}

