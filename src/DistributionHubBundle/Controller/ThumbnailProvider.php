<?php

namespace DistributionHubBundle\Controller;

use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

class ThumbnailProvider implements SelectOptionsProviderInterface {

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return array
     */
    public function getOptions($context, $fieldDefinition) {


        $list = new \Pimcore\Model\Asset\Image\Thumbnail\Config\Listing();
        $list->load();
        $thumbnaillist = $list->getThumbnails();
        $result = array();
        foreach ($thumbnaillist as $thumbnail) {
            if ($thumbnail instanceof \Pimcore\Model\Asset\Image\Thumbnail\Config) {
                $result[] = array(
                    'key' => $thumbnail->getName(),
                    'value' => $thumbnail->getName()
                );
            }
        }
        return $result;
    }

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return mixed
     */
    public function getDefaultValue($context, $fieldDefinition) {
        return 0;
    }

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return bool
     */
    public function hasStaticOptions($context, $fieldDefinition) {
        return true;
    }

}
