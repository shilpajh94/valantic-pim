<?php

namespace IFSEU\ProductBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class IFSEUProductBundle extends AbstractPimcoreBundle
{
    public function getJsPaths(): array
    {
        return [
            '/bundles/ifseuproduct/js/pimcore/startup.js'
        ];
    }
}
