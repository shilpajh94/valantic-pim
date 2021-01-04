<?php

namespace AppBundle\EventListener;

use Pimcore\Event\AdminEvents;
use Pimcore\Event\BundleManager\PathsEvent;
use Pimcore\Event\BundleManagerEvents;
use Pimcore\Model\Asset;
use S3CustomizationBundle\Lib\Utils;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class AdminAssetsListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            BundleManagerEvents::CSS_PATHS => 'onCSSPaths',
            AdminEvents::ASSET_GET_PRE_SEND_DATA => 'onAssetPreSendData'
        ];
    }

    public function onCSSPaths(PathsEvent $event)
    {
        $event->setPaths(array_merge($event->getPaths(), [
            '/bundles/app/css/admin.css'
        ]));
    }

    public function onAssetPreSendData(GenericEvent $event)
    {
        $data = $event->getArgument('data');
        $asset = $event->getArgument('asset');

        if( ($asset instanceof Asset) && (!($asset instanceof Asset\Folder))    ){
            $assetPublicPath = Utils::getAssetFullPathCompatibleToS3($asset);

            $data['url'] = $assetPublicPath;
            $event->setArgument('data',$data);
        }

    }
}
