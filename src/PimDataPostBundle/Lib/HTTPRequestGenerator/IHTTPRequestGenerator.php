<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator;

interface IHTTPRequestGenerator
{

    public function getRequest(int $batch);

    public function getTotalBatches();
    
}