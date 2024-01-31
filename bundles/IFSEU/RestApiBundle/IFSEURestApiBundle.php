<?php

namespace IFSEU\RestApiBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class IFSEURestApiBundle extends AbstractPimcoreBundle
{
    public function getNiceName() : string{
        return  "IFSEU REST API Bundle";
    }
    public function getDescription() : string{
        return  "Bundle for getting eHose data from IFSEU via REST API";
    }
    public function getVersion() : string{
        return "0.0.1";
    }
    public function getJsPaths()
    {
        return [
            '/bundles/ifseurestapi/js/pimcore/startup.js'
        ];
    }
}
