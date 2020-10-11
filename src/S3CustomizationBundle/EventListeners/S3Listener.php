<?php


namespace S3CustomizationBundle\EventListeners;


use Aws\S3\S3Client;
use S3CustomizationBundle\Lib\Utils;
use Symfony\Component\EventDispatcher\GenericEvent;

class S3Listener
{
    /**
     * @var string
     */
    private $s3BaseUrl;

    /**
     * @var string
     */
    private $s3TmpUrlPrefix;

    /**
     * @var string
     */
    private $s3AssetUrlPrefix;

    /**
     * @var Pimcore\Model\Asset
     */
    private $asset;

    /**
     * @var S3Client
     */
    private $s3Client;

    /**
     * @var bool
     */
    private $isUpdate;

    /**
     * Initialize neccessary variables
     */
    public function __construct()
    {
        if(!DISABLE_S3_CDN) {
            if ((int)\Pimcore::getKernel()->getContainer()->getParameter("cdn.enable")) {
                $this->s3BaseUrl = PIMCORE_CDN_BASEURL;
                $this->s3AssetUrlPrefix = $this->s3BaseUrl . "/assets";
                $this->s3TmpUrlPrefix = $this->s3BaseUrl . "/tmp";
            } else {
                $this->s3BaseUrl = PIMCORE_S3_BASEURL;
                $this->s3AssetUrlPrefix = $this->s3BaseUrl . str_replace("s3:/", "", PIMCORE_ASSET_DIRECTORY);
                $this->s3TmpUrlPrefix = $this->s3BaseUrl . str_replace("s3:/", "", PIMCORE_TEMPORARY_DIRECTORY);
            }
        }
    }


    /**
     * Listen to following events
     * pimcore.frontend.path.asset.image.thumbnail
     * pimcore.frontend.path.asset.document.image-thumbnail
     * pimcore.frontend.path.asset.video.image-thumbnail
     * pimcore.frontend.path.asset.video.thumbnail
     *
     * @param GenericEvent $event
     */
    public function onFrontendPathThumbnail(GenericEvent $event) {
        if(!DISABLE_S3_CDN) {
            $fileSystemPath = $event->getSubject()->getFileSystemPath();

            $cacheKey = "thumb_s3_" . md5($fileSystemPath);
            $path = \Pimcore\Cache::load($cacheKey);

            if(!$path) {
                if(!file_exists($fileSystemPath)) {
                    // the thumbnail doesn't exist yet, so we need to create it on request -> Thumbnail controller plugin
                    $path = str_replace(PIMCORE_TEMPORARY_DIRECTORY, "", $fileSystemPath);
                } else {

//                $key = str_replace(PIMCORE_TEMPORARY_DIRECTORY . "/", "/", $fileSystemPath);
//                try {
//                    $this->makeAssetPublicInS3('tmp'.$key, true);
//                } catch(\Exception $e) {
//                    // do nothing
//                }
                    $path = str_replace(PIMCORE_TEMPORARY_DIRECTORY . "/", $this->s3TmpUrlPrefix . "/", $fileSystemPath);
                }
            }

            $event->setArgument('frontendPath',$path);
        }
    }

    /**
     * Listen to following events
     * pimcore.asset.image.thumbnail
     * pimcore.asset.video.image-thumbnail
     * pimcore.asset.document.image-thumbnail
     *
     * @param GenericEvent $event
     */
    public function onAssetThumbnailCreated(GenericEvent $event)
    {
        if(!DISABLE_S3_CDN) {
            $thumbnail = $event->getSubject();
            $fsPath = $thumbnail->getFileSystemPath();
            if ($fsPath && $event->getArgument("generated")) {
                $cacheKey = "thumb_s3_" . md5($fsPath);

                \Pimcore\Cache::remove($cacheKey);
            }
        }
    }

    /**
     * Listen to following events
     * pimcore.frontend.path.asset
     *
     * @param GenericEvent $event
     */
    public function onFrontEndPathAsset(GenericEvent $event) {
        if(!DISABLE_S3_CDN) {
            $asset = $event->getSubject();
            $path = Utils::getAssetFullPathCompatibleToS3($asset);
//        $path = str_replace(PIMCORE_ASSET_DIRECTORY . "/", $this->s3AssetUrlPrefix . "/", $asset->getFileSystemPath());
            $event->setArgument('frontendPath',$path);
        }
    }
}
