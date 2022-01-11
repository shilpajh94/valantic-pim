<?php

namespace RequiredAttributesBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class RequiredAttributesBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/requiredattributes/js/pimcore/startup.js',
            '/bundles/requiredattributes/js/pimcore/overrides.js',
            '/bundles/requiredattributes/js/pimcore/pdf_preview_override.js',
            '/bundles/requiredattributes/js/pimcore/override_one.js',
        ];
    }

    public function getCssPaths()
    {
        return [
            '/bundles/requiredattributes/css/style.css'
        ];
    }
}
