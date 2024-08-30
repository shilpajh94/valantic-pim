<?php
namespace RequiredAttributesBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\PimcoreBundleAdminClassicInterface;
use Pimcore\Extension\Bundle\Traits\BundleAdminClassicTrait;

class RequiredAttributesBundle extends AbstractPimcoreBundle implements PimcoreBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getJsPaths(): array
    {
        return [
            '/bundles/requiredattributes/js/pimcore/object/tags/overrideAbstract.js', 
            '/bundles/requiredattributes/js/pimcore/document/override.admin-ui-classic-bundle.document.tree.js',
            '/bundles/requiredattributes/js/pimcore/startup.js',
            '/bundles/requiredattributes/js/pimcore/overrides.js',
            '/bundles/requiredattributes/js/pimcore/pdf_preview_override.js',
            '/bundles/requiredattributes/js/pimcore/override_xliff.js',
            '/bundles/requiredattributes/js/pimcore/search_override.js',
            '/bundles/requiredattributes/js/pimcore/pimcore_helpers_override.js',
            '/bundles/requiredattributes/js/pimcore/object/helpers/override_classTree.js'
        ];
    }

    public function getCssPaths(): array
    {
        return [
            '/bundles/requiredattributes/css/style.css'
        ];
    }
}

