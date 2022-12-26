<?php
namespace PimDataPostBundle\Lib\RequestBodyGenerator;

interface IRequestBodyGenerator
{
    public function generateRequestBody(array $tempTableData): array;
}

