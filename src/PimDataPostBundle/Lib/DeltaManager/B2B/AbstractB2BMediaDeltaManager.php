<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2B;

abstract class AbstractB2BMediaDeltaManager
{
    public abstract function getAssetsUpdatedRecords(): array;

    public abstract function getAssetsDeletedRecords(): array;
    
}

