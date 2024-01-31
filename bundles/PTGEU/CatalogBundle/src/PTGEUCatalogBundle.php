<?php

namespace PTGEU\CatalogBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;

class PTGEUCatalogBundle extends AbstractPimcoreBundle implements PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getJsPaths(): array
    {
        return [
            '/bundles/ptgeucatalog/js/pimcore/euStartup.js',
            '/bundles/ptgeucatalog/js/pimcore/euHeaderSelection.js'
        ];
    }
}

