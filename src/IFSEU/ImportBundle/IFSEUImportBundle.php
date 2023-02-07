<?php

namespace IFSEU\ImportBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class IFSEUImportBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/ifseuimport/js/pimcore/startup.js'
        ];
    }
}