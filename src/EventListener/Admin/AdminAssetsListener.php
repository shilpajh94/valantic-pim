<?php

declare(strict_types=1);

namespace App\EventListener\Admin;

use Pimcore\Event\BundleManager\PathsEvent;
use Pimcore\Event\BundleManagerEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminAssetsListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            BundleManagerEvents::JS_PATHS => 'onJsPaths',
        ];
    }

    public function onJsPaths(PathsEvent $event): void
    {
        $event->addPaths([
            '/admin/js/open.js',
            '/admin/js/perspective.js',
            '/admin/js/CategoryExportPanel.js',
            '/admin/js/output-configurator.js',
            '/admin/js/uniFinishedGoods.js',
            '/admin/js/uniInternalCategories.js',
        ]);
    }
}
