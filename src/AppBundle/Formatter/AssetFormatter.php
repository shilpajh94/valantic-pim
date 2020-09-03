<?php

namespace AppBundle\Formatter;

use Pimcore\Model\Asset;
use Pimcore\Model\Element\ElementInterface;
use Pimcore\Model\DataObject\BlogArticle;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\PathFormatterInterface;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\News;

class AssetFormatter implements PathFormatterInterface {
    
    /**
     * @param array $result containing the nice path info. Modify it or leave it as it is. Pass it out afterwards!
     * @param ElementInterface $source the source object
     * @param array $targets list of nodes describing the target elements
     * @param array $params optional parameters. may contain additional context information in the future. to be defined.
     * 
     * @return array list of display names.
     */
    public function formatPath(array $result, ElementInterface $source, array $targets, array $params): array
    {
        /** @var  $fd Data */
        $fd = $params["fd"];
        $context = $params["context"];

        foreach ($targets as $key => $item) {
            $newPath = $item["fullpath"];
            
            if ($item["type"] == "asset") {
                $asset = Asset::getById($item["id"]);
                if ($asset) {
//                    $title = $asset->getMetadata("title");
                    if ($asset instanceof \Pimcore\Model\Asset\Image) {
                        $thumb = $asset->getThumbnail(['height' => '80']);
                    } elseif($asset instanceof \Pimcore\Model\Asset\Document) {
                        $thumb = $asset->getImageThumbnail(["height" => 80, "contain" => true]);
                    }

//                    if (!$title) {
//                        $title = "this guy does not have a title, use " . $newPath . " instead";
//                    }
                    //if ($fd instanceof Data\ManyToManyRelation) {
                        $newPath = " ". '<img src="' . $thumb . '" style="width: 80px; height: 60px; margin-bottom:10px;" />' . "<br>"."Path: ". $newPath;
                    //}
//                    else {
//                        $newPath = $title;
//                    }
                }
            }
                
            // don't forget to use the same key, otherwise the matching doesn't work
            $result[$key]= $newPath;
        }
        return $result;
    }
}
