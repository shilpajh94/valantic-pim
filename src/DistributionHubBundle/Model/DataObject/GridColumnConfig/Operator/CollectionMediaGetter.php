<?php

namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;

use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Lib\DHubLogger;
use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;

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

        if($image instanceof \Pimcore\Model\DataObject\Data\Hotspotimage){
            $image = $image->getImage();
        }

        if ($image instanceof \Pimcore\Model\Asset\Image) {
            $hostUrl = $this->getHostUrl();

            if($this->thumbnail){
                $thumbnailConfig = \Pimcore\Model\Asset\Image\Thumbnail\Config::getByName($this->thumbnail);
                if($thumbnailConfig){
                    $result->value = $hostUrl.strval($image->getThumbnail($this->thumbnail));
                }else{
                    DHubLogger::log("Thumbnail $this->thumbnail do not exit.", DHubLogger::NOTICE);
                }
            }else{
                $result->value = $hostUrl.strval($image);
            }

        }
        if($result->value && $this->getContext()['purpose'] == "gridview"){
            $result->value = '<a href="'.$result->value.'" target="_blank">'.$result->value.'</a>';
        }

        return $result;
    }

    public function getHostUrl()
    {
        $hostUrl = null;
        if(php_sapi_name() === 'cli'){
            $hostUrl = $_SESSION[Constants::HOST_NAME_KEY_IN_SESSION];
        }else{
            $hostUrl = \Pimcore\Tool::getHostUrl();
        }
        return $hostUrl;
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
