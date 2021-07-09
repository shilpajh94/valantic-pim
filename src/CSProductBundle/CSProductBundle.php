<?php

namespace CSProductBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class CSProductBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/csproduct/js/pimcore/startup.js'
        ];
    }
}