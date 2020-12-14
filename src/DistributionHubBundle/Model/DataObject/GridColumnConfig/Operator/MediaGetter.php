<?php

namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;

use DistributionHubBundle\Lib\Constants;
use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;
use DistributionHubBundle\Lib\DHubLogger;
use S3CustomizationBundle\Lib\Utils;
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
		// for contitech
                if ($image instanceof \Pimcore\Model\Asset\Image) {
                    $result->value = \DistributionHubBundle\Lib\Utils::getImageOrThumbnailPublicPath($image, $this->thumbnail);
                }
                if($result->value && $this->getContext()['purpose'] == "gridview"){
                    $result->value = '<a href="'.$result->value.'" target="_blank">'.$result->value.'</a>';
                }
            }
        }
        return $result;
    }
}
