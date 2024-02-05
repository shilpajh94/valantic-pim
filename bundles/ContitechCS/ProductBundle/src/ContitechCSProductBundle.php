<?php

namespace ContitechCS\ProductBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;

class ContitechCSProductBundle extends AbstractPimcoreBundle implements PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getJsPaths(): array
    {
        return [
            '/bundles/contitechcsproduct/js/pimcore/startup.js',
            '/bundles/contitechcsproduct/js/pimcore/tags/objectbricks.js',
            '/bundles/contitechcsproduct/js/pimcore/object/tree.js',
            // '/bundles/contitechcsproduct/js/pimcore/object/versions.js',
            // '/bundles/contitechcsproduct/js/pimcore/object.js'
        ];
    }
    public function getCssPaths(): array
    {
        return [
            '/bundles/contitechcsproduct/css/csproduct.css'
        ];
    }
}
