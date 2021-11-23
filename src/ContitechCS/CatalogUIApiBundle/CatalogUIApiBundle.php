<?php

namespace ContitechCS\CatalogUIApiBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class CatalogUIApiBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/cataloguiapi/js/pimcore/startup.js'
        ];
    }
}