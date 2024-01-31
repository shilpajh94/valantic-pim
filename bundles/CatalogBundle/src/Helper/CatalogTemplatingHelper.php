<?php

namespace CatalogBundle\Helper;

use Symfony\Component\Templating\Helper\Helper;
use \Pimcore\Model\Asset\Image;

class CatalogTemplatingHelper extends Helper{

    /**
     * @inheritdoc
     */
    public function getName() {
        return "CatalogTemplatingHelper";
    }


    /**
     * @param Image|Pimcore\Model\Document\Tag\Image $image
     * @param string $selectedThumbnaiWidth
     * 
     * @return Image\Thumbnail
     */
    public function getImageThumbnail($image, ?string $selectedThumbnaiWidth): ?Image\Thumbnail
    {
        $thumbnail = null;

        if(array_key_exists($selectedThumbnaiWidth,CATALOG_IMAGE_THUBNAILS))
        {
            $thumbnail =  $image->getThumbnail(CATALOG_IMAGE_THUBNAILS[$selectedThumbnaiWidth]);
        }

        if($thumbnail === null){
            $thumbnail =  $image->getThumbnail(CATALOG_IMAGE_THUBNAILS['Original']);
        }

        return $thumbnail !== "" ? $thumbnail : null ;
    }
}