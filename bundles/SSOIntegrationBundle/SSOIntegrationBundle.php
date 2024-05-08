<?php

namespace SSOIntegrationBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class SSOIntegrationBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/ssointegration/js/pimcore/startup.js'
        ];
    }
}