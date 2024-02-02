<?php

namespace IFSEU\RestApiBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;

class IFSEURestApiBundle extends AbstractPimcoreBundle implements PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;
    
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getNiceName() : string{
        return  "IFSEU REST API Bundle";
    }
    public function getDescription() : string{
        return  "Bundle for getting eHose data from IFSEU via REST API";
    }
    public function getVersion() : string{
        return "0.0.1";
    }
    public function getJsPaths(): array
    {
        return [
            '/bundles/ifseurestapi/js/pimcore/startup.js'
        ];
    }
}
