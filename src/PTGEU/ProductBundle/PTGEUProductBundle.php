<?php

namespace PTGEU\ProductBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class PTGEUProductBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/ptgeuproduct/js/pimcore/startup.js'
        ];
    }
}