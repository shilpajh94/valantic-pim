<?php

namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;

use DistributionHubBundle\Lib\Constants;
use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;
use DistributionHubBundle\Lib\DHubLogger;
use S3CustomizationBundle\Lib\Utils;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class MediaGetter extends AbstractOperator
{
    private $thumbnail;

    public function __construct(\stdClass $config, $context = null)
    {

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
            if ($c instanceof AnyGetter || $c instanceof \DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator\AnyGetter){
                $customDefaultValue = $this->getCustomAnyGetter($c);
                $childResult = $customDefaultValue->getLabeledValue($element);
            }
            p_r($childResult->value);die;
            //p_r($childResult->value[0]);die;
            if ($childResult && $childResult->value) {
                $image = $childResult->value[1];
                //p_r($image);die;
		        // for contitech
                if ($image instanceof \Pimcore\Model\Asset\Image) {
                    die("DDDDDDDDDD");
                    $result->value = \DistributionHubBundle\Lib\Utils::getImageOrThumbnailPublicPath($image, $this->thumbnail);
                }
                if($result->value && $this->getContext()['purpose'] == "gridview"){
                    $result->value = '<a href="'.$result->value.'" target="_blank">'.$result->value.'</a>';
                }
                die("BBBBBBBBBB");
            }
        }
        return $result;
    }

    private function getCustomAnyGetter(AbstractOperator $anyGetter)
    {
        $config = new \stdClass();

        $refletionObject = new \ReflectionObject($anyGetter);
        $anyGetterProperties = ['label','childs','attribute','param1','isArrayType','forwardAttribute',
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
