<?php

namespace B2BTranslationBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;

class B2BTranslationBundle extends AbstractPimcoreBundle implements PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getJsPaths(): array
    {
        return [
            '/bundles/b2btranslation/js/pimcore/startup.js',
            '/bundles/b2btranslation/js/pimcore/mappingPanel.js',
            '/bundles/b2btranslation/js/pimcore/mappingLeftPanel.js',
            '/bundles/b2btranslation/js/pimcore/configItem.js',
        ];
    }
}
