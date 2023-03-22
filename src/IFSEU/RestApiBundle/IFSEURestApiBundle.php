<?php

namespace IFSEU\RestApiBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class IFSEURestApiBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/ifseurestapi/js/pimcore/startup.js'
        ];
    }
}