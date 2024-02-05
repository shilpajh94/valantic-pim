<?php

namespace ContitechCS\CatalogUIApiBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;

class CatalogUIApiBundle extends AbstractPimcoreBundle implements PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getJsPaths(): array
    {
        return [
            '/bundles/cataloguiapi/js/pimcore/startup.js',
            '/bundles/cataloguiapi/js/pimcore/printPage.js',
        ];
    }
}

