<?php

namespace B2BSalesforcePTGEMEABundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;


class B2BSalesforcePTGEMEABundle extends AbstractPimcoreBundle implements PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getJsPaths(): array
    {
        return [
            '/bundles/b2bsalesforceptgemea/js/pimcore/startup.js',
            '/bundles/b2bsalesforceptgemea/js/pimcore/mappingPanel.js',
            '/bundles/b2bsalesforceptgemea/js/pimcore/mappingLeftPanel.js',
            '/bundles/b2bsalesforceptgemea/js/pimcore/configItem.js',
        ];
    }
}