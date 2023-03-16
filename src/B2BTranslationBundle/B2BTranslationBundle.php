<?php

namespace B2BTranslationBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class B2BTranslationBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/b2btranslation/js/pimcore/startup.js',
            '/bundles/b2btranslation/js/pimcore/mappingPanel.js',
            '/bundles/b2btranslation/js/pimcore/mappingLeftPanel.js',
            '/bundles/b2btranslation/js/pimcore/configItem.js',
        ];
    }
}
