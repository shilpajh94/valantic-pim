<?php

namespace PTGEU\CatalogBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class PTGEUCatalogBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/ptgeucatalog/js/pimcore/euStartup.js',
            '/bundles/ptgeucatalog/js/pimcore/euHeaderSelection.js'
        ];
    }
}