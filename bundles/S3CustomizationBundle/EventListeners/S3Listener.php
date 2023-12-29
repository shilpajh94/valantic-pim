<?php


namespace S3CustomizationBundle\EventListeners;


use Aws\S3\S3Client;
use Pimcore\Event\Model\AssetEvent;
use Pimcore\Event\Model\ElementEventInterface;
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
            if ((int)CDN_ENABLE) {
                $this->s3BaseUrl = PIMCORE_CDN_BASEURL;
                $this->s3AssetUrlPrefix = $this->s3BaseUrl . "/assets";
                $this->s3TmpUrlPrefix = $this->s3BaseUrl . "/tmp";
            } else {
                $this->s3BaseUrl = PIMCORE_S3_BASEURL;
                $this->s3AssetUrlPrefix = $this->s3BaseUrl . str_replace("s3:/", "", PIMCORE_ASSET_DIRECTORY);
                $this->s3TmpUrlPrefix = $this->s3BaseUrl . str_replace("s3:/", "", PIMCORE_SYSTEM_TEMP_DIRECTORY);
            }

            $this->s3Client =  Utils::getS3Client();
        }
    }

    /**
     * Make s3 bucket asset publicly available
     */
    protected function makeAssetPublicInS3($assetPath, $isTmp = false)
    {
        // Returning from here, as we can't make folder public after applying some
        // security rules by client. Throwing error while creating folder. 
        return;
        // get the S3 path of asset from pimcore_s3 path mapping
        $s3CustomizationService = \Pimcore::getKernel()->getContainer()->get(\S3CustomizationBundle\Services\S3CustomizationService::class);
        $assetPath = $s3CustomizationService->getS3PathForPimcorePath($assetPath,true);


        $this->s3Client->putObjectAcl(array(
            'ACL' => 'public-read-write',
            'Grants' => array(
                array(
                    'Grantee' => array(
                        'DisplayName' => 'public-read-write',
                        'EmailAddress' => 'pradeep.singh@pimcore.services',
                        'Type' => 'CanonicalUser1'),
                    'Permission' => 'READ',
                ),
            ),
            'Owner' => array(
                'DisplayName' => S3_BUCKET,
            ),
            'Bucket' => S3_BUCKET,
            'Key' => $assetPath,
            'RequestPayer' => S3_BUCKET,
        ));

//        if($isTmp === false) {
//            $this->asset->update(true);
//        }
    }
    
    protected function makeAssetPrivateInS3($assetPath, $isTmp = false)
    {
        // get the S3 path of asset from pimcore_s3 path mapping
        $s3CustomizationService = \Pimcore::getKernel()->getContainer()->get(\S3CustomizationBundle\Services\S3CustomizationService::class);
        $assetPath = $s3CustomizationService->getS3PathForPimcorePath($assetPath, true);
        $this->s3Client->putObjectAcl(array(
            'ACL' => 'private',
            'Owner' => array(
                'DisplayName' => S3_BUCKET,
            ),
            'Bucket' => S3_BUCKET,
            'Key' => $assetPath,
            'RequestPayer' => S3_BUCKET,
        ));
    }

    /**
     * Check if asset need to make public in S3 bucket
     */
    protected function checkIfMakeAssetPublicinS3()
    {
        $return = true;
        $internalFolders = INTERNAL_ASSET_FOLDER_PATHS;
        $currentAssetPath = $this->asset->getRealFullPath();
        if (!empty($internalFolders) && count($internalFolders)>0) {
            foreach ($internalFolders as $folder) {
                if (strpos($currentAssetPath, $folder)!== false) {
                    $return = false;
                    break;
                }
            }
        }
        return $return;
    }


    public function onPostUpdate(ElementEventInterface $e)
    {
        if(!DISABLE_S3_CDN) {
            if($e instanceof AssetEvent) {
                $this->asset = $e->getAsset();
                if($this->asset->getType() == "folder") {
                    return false;
                }
                $key = $this->asset->getRealFullPath();

                // if($this->checkIfMakeAssetPublicinS3()) {
                //     try {
                //         //if(!$this->asset->getProperty("isPublicInS3")) {
                //         $this->makeAssetPublicInS3('assets'.$key);
                //         //}
                //     } catch(\Exception $e) {
                //         // do nothing
                //     }
                // } else {
                //     try {
                //         $this->makeAssetPrivateInS3('assets'.$key);
                //     } catch(\Exception $e) {
                //         // do nothing
                //     }
                // }

            }
        }

    }

    public function onPostAdd(ElementEventInterface $e)
    {
        if(!DISABLE_S3_CDN) {
            if($e instanceof AssetEvent) {
                $this->asset = $e->getAsset();
                $key = $this->asset->getRealFullPath();

                // if($this->checkIfMakeAssetPublicinS3()) {
                //     try {
                //         $this->makeAssetPublicInS3('assets'.$key);
                //     } catch(\Exception $e) {
                //         // do nothing
                //     }
                // }
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
            //$fileSystemPath = $event->getSubject()->getFileSystemPath();
            $fileSystemPath = $event->getSubject()->getStream();

            $cacheKey = "thumb_s3_" . md5($fileSystemPath);
            $path = \Pimcore\Cache::load($cacheKey);

            if(!$path) {
                if(!file_exists($fileSystemPath)) {
                    // the thumbnail doesn't exist yet, so we need to create it on request -> Thumbnail controller plugin
                    $path = str_replace(PIMCORE_SYSTEM_TEMP_DIRECTORY, "", $fileSystemPath);
                } else {

                $key = str_replace(PIMCORE_SYSTEM_TEMP_DIRECTORY . "/", "/", $fileSystemPath);
                try {
                    // $this->makeAssetPublicInS3('tmp'.$key, true);
                } catch(\Exception $e) {
                    // do nothing
                }
                    $path = str_replace(PIMCORE_SYSTEM_TEMP_DIRECTORY . "/", $this->s3TmpUrlPrefix . "/", $fileSystemPath);
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
            $stream = $thumbnail->getAsset();
            //$fsPath = $thumbnail->getFileSystemPath();
            $fsPath = $stream->getStream();
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
