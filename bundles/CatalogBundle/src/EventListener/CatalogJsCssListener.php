<?php
namespace CatalogBundle\EventListener;

use Pimcore\Event\BundleManager\PathsEvent;

class CatalogJsCssListener
{
    public function addCSSFiles(PathsEvent $event): void
    {
        $event->setPaths(
            array_merge(
                $event->getPaths(),
                [
                    '/bundles/catalog/css/style.css'
                ]
            )
        );
    }

    public function addJSFiles(PathsEvent $event): void
    {
        $event->setPaths(
            array_merge(
                $event->getPaths(),
                [
                    '/bundles/catalog/js/pimcore/startup.js',
                    '/bundles/catalog/js/pimcore/headerSelection.js',
                    '/bundles/catalog/js/pimcore/formattedGridHandler.js',
                    '/bundles/catalog/js/pimcore/resetTableOfContent.js'
                ]
            )
        );
    }
}
