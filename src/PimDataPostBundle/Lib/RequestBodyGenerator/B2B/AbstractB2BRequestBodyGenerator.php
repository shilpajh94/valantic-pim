<?php


namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2B;

use PimDataPostBundle\Lib\RequestBodyGenerator\IRequestBodyGenerator;

abstract class AbstractB2BRequestBodyGenerator implements IRequestBodyGenerator
{
    public abstract function generateRequestBody(array $tempTableData): array;

    public abstract function generateCreateRequestBody(array $tempTableData): array;

    public abstract function generateUpdateRequestBody(array $tempTableData): array;

    public abstract function generateDeleteRequestBody(array $tempTableData): array;
}