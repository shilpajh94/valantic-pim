<?php
namespace PimDataPostBundle\Model\DeltaManager;

class TempMasterTablesMeta
{
    private $tempTableName;
    
    private $masterTableName;
    
    private $hashColumnName;

    private $relationalhashColumnName;
    
    public function __construct(string $tempTableName, string $masterTableName, string $nonRelationalhashColumnName, string $relationalhashColumnName) {
        $this->tempTableName = $tempTableName;
        $this->masterTableName = $masterTableName;
        $this->hashColumnName = $nonRelationalhashColumnName;
        $this->relationalhashColumnName = $relationalhashColumnName;
    }
    
    public function getTempTableName()
    {
        return $this->tempTableName;
    }
    
    public function getMasterTableName()
    {
        return $this->masterTableName;
    }
    
    public function getNonRelationalhashColumnName()
    {
        return $this->hashColumnName;
    }
    
    public function getRelationalhashColumnName()
    {
        return $this->relationalhashColumnName;
    }
}

