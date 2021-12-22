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
            AdminEvents::ASSET_GET_PRE_SEND_DATA => 'onAssetPreSendData',
            AdminEvents::ASSET_LIST_BEFORE_LIST_LOAD => 'beforeListLoad'
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
            if (!DISABLE_S3_CDN) {
                $assetPublicPath = Utils::getAssetFullPathCompatibleToS3($asset);
            } else {
                $assetPublicPath = $asset->getFullpath();
            }

            $data['url'] = $assetPublicPath;
            $event->setArgument('data',$data);
        }

    }
    
    public function beforeListLoad(GenericEvent $event) {
        $list = $event->getArgument('list');
        $context = $event->getArgument('context');
        if (!empty($context['context'])) {
            $contextJson = (array)json_decode($context['context']);
            if (!empty($contextJson) && !empty($contextJson['scope']) && $contextJson['scope'] == 'objectEditor') {
                $user = \Pimcore\Tool\Admin::getCurrentUser();
                if (!$user->isAdmin()) {
                    $userIds = $user->getRoles();
                    $userIds[] = $user->getId();
                    $conditionFilters = ' (
                        (select list from users_workspaces_asset where userId in (' . implode(',', $userIds) . ') and LOCATE(fullpath,cpath)=1  ORDER BY LENGTH(cpath) DESC LIMIT 1)=1
                        OR
                        (select list from users_workspaces_asset where userId in (' . implode(',', $userIds) . ') and LOCATE(cpath, fullpath)=1  ORDER BY LENGTH(cpath) DESC LIMIT 1)=1
                     )';
                    $condition = $list->getCondition(); 
                    $condition = $condition." AND ".$conditionFilters; 
                    $list->setCondition($condition);
                    $event->setArgument('list',$list);
                }
            }
        }
        
    }
}
