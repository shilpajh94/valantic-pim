<?php

namespace ADIntegrationBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class ADIntegrationBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/adintegration/js/pimcore/startup.js'
        ];
    }
}