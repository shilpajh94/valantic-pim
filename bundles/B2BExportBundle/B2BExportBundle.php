<?php

namespace B2BExportBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class B2BExportBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/b2bexport/js/pimcore/startup.js'
        ];
    }
}