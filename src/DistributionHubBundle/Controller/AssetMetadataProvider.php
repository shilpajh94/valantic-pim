<?php

namespace DistributionHubBundle\Controller;

use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\Metadata;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

class AssetMetadataProvider implements SelectOptionsProviderInterface {

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return array
     */
    public function getOptions($context, $fieldDefinition) {

        $type = "asset";
//        $subType = $request->get('subType');
        $list = Metadata\Predefined\Listing::getByTargetType($type, [$subType]);
        $result = [];
        foreach ($list as $item) {
            /** @var $item Metadata\Predefined */
            $item->expand();
            if ($item instanceof \Pimcore\Model\Metadata\Predefined) {
                if (!($item->getLanguage() == "" || $item->getLanguage() == null)) {
                    $name = $item->getName() . " (" . $item->getLanguage() . ")";
                } else {
                    $name = $item->getName() ;
                }
                $result[] = array(
                    'key' => $name,
                    'value' => $item->getId()
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
