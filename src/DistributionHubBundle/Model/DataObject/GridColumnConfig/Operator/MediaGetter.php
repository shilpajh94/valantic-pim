<?php

namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;

use DistributionHubBundle\Lib\Constants;
use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;
use DistributionHubBundle\Lib\DHubLogger;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class MediaGetter extends AbstractOperator {
    private $thumbnail;

    public function __construct(\stdClass $config, $context = null) {

        $this->thumbnail = $config->thumbnail;
        parent::__construct($config, $context);
    }

    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;

        $childs = $this->getChilds();

        if (!$childs) {
            return $result;
        } else {
            $c = $childs[0];
            $childResult = $c->getLabeledValue($element);
            if ($childResult && $childResult->value) {

                $image = $childResult->value;

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
            }
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
}
