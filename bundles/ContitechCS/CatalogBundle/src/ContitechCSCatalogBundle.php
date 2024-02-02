<?php

namespace ContitechCS\CatalogBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;

class ContitechCSCatalogBundle extends AbstractPimcoreBundle implements PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getJsPaths(): array
    {
        return [
            '/bundles/contitechcscatalog/js/pimcore/startup.js',
            '/bundles/contitechcscatalog/js/pimcore/resetTableOfContent.js'
        ];
    }
}
