<?php

namespace IFSEU\ProductBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;

class IFSEUProductBundle extends AbstractPimcoreBundle implements PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
    public function getNiceName() : string{
        return  "IFSEU Product Bundle";
    }
    public function getDescription() : string{
        return  "Bundle for IFSEU Product ";
    }
    public function getVersion() : string{
        return "0.0.1";
    }
    public function getJsPaths(): array
    { 
        return [
            '/bundles/ifseuproduct/js/pimcore/startup.js'
        ];
    }
}
