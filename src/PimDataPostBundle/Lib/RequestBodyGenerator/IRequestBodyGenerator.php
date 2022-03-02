<?php
namespace PimDataPostBundle\Lib\RequestBodyGenerator;

use PimDataPostBundle\Model\APIOperationType;

interface IRequestBodyGenerator
{
    public function generateRequestBody(array $tempTableData, APIOperationType $operationType): array;
}

