<?php

namespace ContitechCS\ImportBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class ContitechCSImportBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/contitechcsimport/js/pimcore/startup.js'
        ];
    }
}