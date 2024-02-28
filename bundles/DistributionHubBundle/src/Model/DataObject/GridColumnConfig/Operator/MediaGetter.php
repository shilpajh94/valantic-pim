<?php

namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;

use DistributionHubBundle\Lib\Constants;
use Pimcore\Bundle\AdminBundle\DataObject\GridColumnConfig\Operator\AbstractOperator;
use DistributionHubBundle\Lib\DHubLogger;
use S3CustomizationBundle\Lib\Utils;
use stdClass;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class MediaGetter extends AbstractOperator
{
    private $thumbnail;

    public function __construct(\stdClass $config, $context = null)
    {

        $this->thumbnail = $config->thumbnail;
        parent::__construct($config, $context);
    }

    public function getLabeledValue($element) : stdClass
    {
        $result = new \stdClass();
        $result->label = $this->label;

        $children = $this->getChildren();

        if (!$children) {
            return $result;
        } else {
            $c = $children[0];
            $childResult = $c->getLabeledValue($element);
            if ($c instanceof AnyGetter || $c instanceof \DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator\AnyGetter){
                $customDefaultValue = $this->getCustomAnyGetter($c);
                $childResult = $customDefaultValue->getLabeledValue($element);
            }

            if ($childResult && $childResult->value) {
                $image = $childResult->value;
                if(is_array($image)){
                    foreach($image as $img){
                        if ($img instanceof \Pimcore\Model\Asset\Image) {
                            $result->value = \DistributionHubBundle\Lib\Utils::getImageOrThumbnailPublicPath($img, $this->thumbnail);
                        }
                        if($result->value && $this->getContext()['purpose'] == "gridview"){
                            $result->value = '<a href="'.$result->value.'" target="_blank">'.$result->value.'</a>';
                        }
                    }
                } else {
                    if ($image instanceof \Pimcore\Model\Asset\Image) {
                        $result->value = \DistributionHubBundle\Lib\Utils::getImageOrThumbnailPublicPath($image, $this->thumbnail);
                    }
                    if($result->value && $this->getContext()['purpose'] == "gridview"){
                        $result->value = '<a href="'.$result->value.'" target="_blank">'.$result->value.'</a>';
                    }
                }
            }
        }
        return $result;
    }

    private function getCustomAnyGetter(AbstractOperator $anyGetter)
    {
        $config = new \stdClass();

        $refletionObject = new \ReflectionObject($anyGetter);
        $anyGetterProperties = ['label','children','attribute','param1','isArrayType','forwardAttribute',
            'forwardParam1','returnLastResult'];
        foreach ($anyGetterProperties as $property) {
            $reflectionProperty = $refletionObject->getProperty($property);
            $reflectionProperty->setAccessible(true);
            $config->$property = $reflectionProperty->getValue($anyGetter);
        }
        $reflectionProperty = $refletionObject->getProperty('context');
        $reflectionProperty->setAccessible(true);
        $context = $reflectionProperty->getValue($anyGetter);

        return new CustomAnyGetter($config,$context);
    }
}
