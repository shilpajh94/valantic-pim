<?php

namespace ContitechCS\CatalogBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class ContitechCSCatalogBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/contitechcscatalog/js/pimcore/startup.js'
        ];
    }
}