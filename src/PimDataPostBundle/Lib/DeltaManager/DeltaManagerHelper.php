<?php
namespace PimDataPostBundle\Lib\DeltaManager;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;

class DeltaManagerHelper
{
    private $tempMasterTablesMeta;
    
    private $deltaManagerDao;
    
    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta) {
        $this->tempMasterTablesMeta = $tempMasterTablesMeta;  
    }
    
    public function getTempMasterTablesMeta(): TempMasterTablesMeta
    {
        return $this->tempMasterTablesMeta;
    }
    

}

