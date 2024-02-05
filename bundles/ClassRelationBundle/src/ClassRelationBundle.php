<?php

namespace ClassRelationBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;
use Pimcore\Model\User\Permission\Definition;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Extension\Bundle\Installer\InstallerInterface;

class ClassRelationBundle extends AbstractPimcoreBundle implements PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getJsPaths(): array
    {
        return [
            '/bundles/classrelation/js/pimcore/startup.js'
        ];
    }

}
