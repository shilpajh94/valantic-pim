<?php

namespace SapBwBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class SapBwBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/sapbw/js/pimcore/startup.js'
        ];
    }
}