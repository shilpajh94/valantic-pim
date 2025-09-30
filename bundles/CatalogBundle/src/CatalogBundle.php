<?php

namespace CatalogBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;

class CatalogBundle extends AbstractPimcoreBundle implements PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getJsPaths(): array
    {
        return [
            '/bundles/catalog/js/pimcore/startup.js',
            '/bundles/catalog/js/pimcore/headerSelection.js',
            '/bundles/catalog/js/pimcore/formattedGridHandler.js',
            '/bundles/catalog/js/pimcore/resetTableOfContent.js',
            '/bundles/catalog/js/pimcore/ptsCatalogHeaderSelection.js',
            '/bundles/catalog/js/pimcore/brandsortingOrder.js',

        ];
    }

    public function getCssPaths(): array
    {
        return [
            '/bundles/catalog/css/style.css'
        ];
    }
}
