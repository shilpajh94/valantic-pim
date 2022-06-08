<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator;
use PimDataPostBundle\Model\Types\APIOperationType;
interface IHTTPRequestGenerator
{

    public function getRequest(int $batch, APIOperationType $operationType = null);

    public function getTotalBatches(APIOperationType $operationType = null);
    
}