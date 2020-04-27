<?php

namespace ADAuthBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class ADAuthBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/adauth/js/pimcore/startup.js'
        ];
    }
}
