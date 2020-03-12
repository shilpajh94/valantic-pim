<?php

namespace SiopBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class SiopBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/siop/js/pimcore/startup.js'
        ];
    }
}