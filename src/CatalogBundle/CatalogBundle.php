<?php

namespace CatalogBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class CatalogBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/catalog/js/pimcore/startup.js',
            '/bundles/catalog/js/pimcore/headerSelection.js'
        ];
    }
    
    public function getCssPaths() {
        return [
            '/bundles/catalog/css/style.css'
        ];
    }
}