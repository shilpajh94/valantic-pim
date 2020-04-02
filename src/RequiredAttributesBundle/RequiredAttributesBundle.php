<?php

namespace RequiredAttributesBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class RequiredAttributesBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/requiredattributes/js/pimcore/startup.js'
        ];
    }
}