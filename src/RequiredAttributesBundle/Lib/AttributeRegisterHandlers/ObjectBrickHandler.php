<?php

namespace RequiredAttributesBundle\Lib\AttributeRegisterHandlers;

use AppBundle\Services\ConfigProviderService;
use Pimcore\Model\DataObject\Product;
use RequiredAttributesBundle\Lib\AttributeRegister;

/**
 * class to add entries in the attribute register for 'object_bricks' config segment
 *
 * Class ObjectBrickHandler
 * @package RequiredAttributesBundle\Lib\AttributeRegisterHandlers
 */
class ObjectBrickHandler
{
    /**
     * @var AttributeRegister
     */
    private $register;

    /**
     * @var LocNonLocAttributeGroupHandler
     */
    private $locNonLocGroupHandler;

    /**
     * ObjectBrickHandler constructor.
     *
     * @param AttributeRegister $register
     * @param LocNonLocAttributeGroupHandler $locNonLocGroupHandler
     */
    public function __construct(AttributeRegister $register,LocNonLocAttributeGroupHandler $locNonLocGroupHandler)
    {
        $this->register = $register;
        $this->locNonLocGroupHandler = $locNonLocGroupHandler;
        $this->brickMappingConfig = \Pimcore::getKernel()->getContainer()->get(ConfigProviderService::class)->getBrickMappingConfig()['product_type_to_product_brick_field_mapping'];
    }

    /**
     * root function to add entries in the attribute register for 'object_bricks' config segment
     *
     * @param $brickConfig
     * @param $object
     */
    public function addEntriesForObjectBricks($brickConfig, $object)
    {
        $baseConfig = $brickConfig['Base'];
        $skeletonConfig = $brickConfig['Skeleton'];
        $fertConfig = $brickConfig['Fert'];

        if($baseConfig){
            $this->addEntriesForBaseLevel($baseConfig, $object);
        }
        if($skeletonConfig){
            $this->addEntriesForSkeletonLevel($skeletonConfig, $object);
        }
        if($fertConfig){
            $this->addEntriesForFertLevel($fertConfig, $object);
        }
    }

    /**
     * add entries in attribute register for base level config
     *
     * @param array $baseConfig
     * @param $product
     */
    private function addEntriesForBaseLevel(array $baseConfig, $product)
    {
        $this->addEntriesForBrickByLevel($baseConfig, $product, 'base');
    }

    /**
     * add entries in attribute register for skeletong level config
     *
     * @param array $skeletonConfig
     * @param $product
     */
    private function addEntriesForSkeletonLevel(array $skeletonConfig, $product)
    {
        $this->addEntriesForBrickByLevel($skeletonConfig, $product, 'skeleton');
    }

    /**
     * add entries in the attribute register for fert level config
     *
     * @param array $fertConfig
     * @param $product
     */
    private function addEntriesForFertLevel(array $fertConfig, $product)
    {

        $this->addEntriesForBrickByLevel($fertConfig, $product, 'fert');
    }

    /**
     * @param array $levelConfig
     * @param Product $product
     * @param string $levelType
     * @throws \Exception
     */
    private function addEntriesForBrickByLevel(array $levelConfig,Product $product,string $levelType){

        $fieldNameInProduct = $this->brickMappingConfig[$levelType];
        $getter = 'get'.ucfirst($fieldNameInProduct);
        $brickObjectInProductClass = $product->$getter();

        $allowedBricks = $brickObjectInProductClass->getAllowedBrickTypes();

        $brickFieldInProductClassTitle = $levelConfig['label'];
        $brickItemsConfig = $levelConfig['brick_items'];

        foreach($brickItemsConfig as $brickKey => $brickConfig)
        {
            if(in_array($brickKey, $allowedBricks)){
                $brickTitle = $brickConfig['label'];

                $titles = array($brickFieldInProductClassTitle,$brickTitle);

                $brickItemGetter = 'get'.ucfirst($brickKey);
                $brickItem = $brickObjectInProductClass->$brickItemGetter();

                if($brickItem){
                    $this->locNonLocGroupHandler->addEntriesForLocNonLocAttributeGroup($brickConfig,$brickItem,$titles);
                }else{
                    // handle if the brick is not attached to this object
                    $this->locNonLocGroupHandler->addEntryForEmptyLocNonLocGroup($brickConfig,$titles);
                }
            }

        }
    }


}