<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 1/4/20
 * Time: 9:16 AM
 */

namespace RequiredAttributesBundle\EventListeners;


use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject;
use RequiredAttributesBundle\Services\RequiredAttributeIndicatorFieldPopulator;


class ProductListener
{

    /**
     * @var RequiredAttributeIndicatorFieldPopulator
     */
    private $attributeIndicatorFieldPopulator;

    /**
     * ProductListener constructor.
     *
     * @param RequiredAttributeIndicatorFieldPopulator $attributeIndicatorFieldPopulator
     */
    public function __construct(RequiredAttributeIndicatorFieldPopulator $attributeIndicatorFieldPopulator)
    {
        $this->attributeIndicatorFieldPopulator = $attributeIndicatorFieldPopulator;
    }

    /**
     * populate empty  and percentage fields in product
     *
     * @param DataObjectEvent $event
     */
    public function preUpdate(DataObjectEvent $event)
    {
        $object = $event->getObject();
        if ($object instanceof DataObject\Product) {
            if($object->getProductType() == 'fert'){
                $object->setGetInheritedValues(true);

                $category = $this->attributeIndicatorFieldPopulator->getLevel2CategoryForProduct($object);

                if($category instanceof DataObject\ProductCategory){
                    $categorySiopCode = $category->getCode();
                    if($categorySiopCode){
                        $this->attributeIndicatorFieldPopulator->populateEmptyFieldAndPercentage($object,$categorySiopCode);

                    }
                }
            }

        }

    }

}