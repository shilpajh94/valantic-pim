<?php

namespace CatalogBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class CatalogBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/catalog/js/pimcore/startup.js'
        ];
    }
}