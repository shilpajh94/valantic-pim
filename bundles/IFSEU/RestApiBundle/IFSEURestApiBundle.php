<?php

namespace IFSEU\RestApiBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class IFSEURestApiBundle extends AbstractPimcoreBundle
{
    public function getNiceName(){
        return  "IFSEU REST API Bundle";
    }
    public function getDescription(){
        return  "Bundle for getting eHose data from IFSEU via REST API";
    }
    public function getVersion(){
        return "0.0.1";
    }
    public function getJsPaths()
    {
        return [
            '/bundles/ifseurestapi/js/pimcore/startup.js'
        ];
    }
}
