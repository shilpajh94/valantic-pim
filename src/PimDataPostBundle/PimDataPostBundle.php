<?php

namespace PimDataPostBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class PimDataPostBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/pimdatapost/js/pimcore/startup.js'
        ];
    }
}