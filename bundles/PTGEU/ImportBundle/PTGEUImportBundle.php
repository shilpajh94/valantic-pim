<?php

namespace PTGEU\ImportBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class PTGEUImportBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/ptgeuimport/js/pimcore/startup.js'
        ];
    }
}