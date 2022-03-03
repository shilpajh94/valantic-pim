<?php

namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2B;

use PimDataPostBundle\Lib\RequestBodyGenerator\RequestBodyGeneratorHelper;

class B2BProductRequestBodyGenerator extends AbstractB2BRequestBodyGenerator
{
    private $requestBodyGeneratorHelper;

    private $b2bProductRequestBodyGeneratorDao;

    public function __construct()
    {
        $this->requestBodyGeneratorHelper = new RequestBodyGeneratorHelper();
        $this->b2bProductRequestBodyGeneratorDao = new B2BProductRequestBodyGeneratorDao();
    }

    public function generateRequestBody(array $tempTableData): array
    {
        
    }

    public function generateCreateRequestBody(array $tempTableData): array
    {

    }

    public function generateUpdateRequestBody(array $tempTableData): array
    {

    }

    public function generateDeleteRequestBody(array $tempTableData): array
    {

    }
}