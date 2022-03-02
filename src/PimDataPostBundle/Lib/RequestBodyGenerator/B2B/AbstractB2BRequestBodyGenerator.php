<?php


namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2B;

use PimDataPostBundle\Lib\RequestBodyGenerator\IRequestBodyGenerator;
use PimDataPostBundle\Model\APIOperationType;

abstract class AbstractB2BRequestBodyGenerator implements IRequestBodyGenerator
{
    public abstract function generateRequestBody(array $tempTableData, APIOperationType $operationType): array;

    public abstract function generateCreateRequestBody(array $tempTableData): array;

    public abstract function generateUpdateRequestBody(array $tempTableData): array;

    public abstract function generateDeleteRequestBody(array $tempTableData): array;
}