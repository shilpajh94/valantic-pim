<?php

namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;

use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Lib\DHubLogger;
use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;
use S3CustomizationBundle\Lib\Utils;

class CollectionMediaGetter extends AbstractOperator
{
    private $thumbnail;
    private $fcFieldInBaseClass;
    private $fcIndex;
    private $fcAttribute;

    public function __construct(\stdClass $config, $context = null) {

        $this->thumbnail = $config->thumbnail;
        $this->fcFieldInBaseClass = $config->fcFieldInBaseClass;
        $this->fcIndex = $config->fcIndex;
        $this->fcAttribute = $config->fcAttribute;
        parent::__construct($config, $context);
    }

    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;

        $image = $this->getAsset($element);
	// for contitech
        if ($image instanceof \Pimcore\Model\Asset\Image) {
            $result->value = \DistributionHubBundle\Lib\Utils::getImageOrThumbnailPublicPath($image, $this->thumbnail);
        }
        if($result->value && $this->getContext()['purpose'] == "gridview"){
            $result->value = '<a href="'.$result->value.'" target="_blank">'.$result->value.'</a>';
        }

        return $result;
    }

    private function getAsset($element)
    {
        $asset = null;
        $getter = "get".ucfirst($this->fcFieldInBaseClass);
        if(method_exists($element, $getter)){
            $fc = $element->$getter();
            if($fc){
                $item = $fc->get($this->fcIndex);
                if($item){
                    $attrGetter = "get".ucfirst($this->fcAttribute);
                    if(method_exists($item, $attrGetter)){
                        $asset = $item->$attrGetter();
                    }
                }
            }

        }
        return $asset;
    }
}
