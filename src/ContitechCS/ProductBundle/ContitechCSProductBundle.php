<?php

namespace ContitechCS\ProductBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class ContitechCSProductBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/contitechcsproduct/js/pimcore/startup.js',
            '/bundles/contitechcsproduct/js/pimcore/object.js'
        ];
    }
    public function getCssPaths() {
        return [
            '/bundles/contitechcsproduct/css/csproduct.css'
        ];
    }
}