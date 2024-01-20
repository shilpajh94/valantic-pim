<?php

namespace IFSEU\ProductBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class IFSEUProductBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/ifseuproduct/js/pimcore/startup.js'
        ];
    }
}
