<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 26/3/20
 * Time: 1:54 PM
 */

namespace RequiredAttributesBundle\Lib;


use Pimcore\Model\DataObject\Product;
use RequiredAttributesBundle\Lib\AttributeRegisterHandlers\LocNonLocAttributeGroupHandler;
use RequiredAttributesBundle\Lib\AttributeRegisterHandlers\ObjectBrickHandler;
use RequiredAttributesBundle\Lib\AttributeRegisterHandlers\ObjectRelationHandler;
use RequiredAttributesBundle\Lib\PimcoreDataTypeValueGetter\DefaultValueGetter;

/**
 * class responsible for tracking empty, populated and all attributes list
 *
 * Class RequiredAttributeManager
 * @package RequiredAttributesBundle\Lib
 */
class RequiredAttributeManager
{
    /**
     * @var array : the required attribute config
     */
    private $config;

    /**
     * @var Product : Product class object to track attributes for
     */
    private $product;

    /**
     * @var LocNonLocAttributeGroupHandler
     */
    private $locNonLocGroupHandler;

    /**
     * @var ObjectRelationHandler
     */
    private $objectRelationHandler;

    /**
     * @var ObjectBrickHandler
     */
    private $objectBrickHandler;

    /**
     * @var AttributeRegister
     */
    private $attributeRegister;

    /**
     * @var DefaultValueGetter
     */
    private $valueGetter;

    /**
     * RequiredAttributeManager constructor.
     *
     * @param array $config
     * @param Product $product
     */
    public function __construct(array $config, Product $product)
    {
        $this->config = $config;
        $this->product = $product;

        $this->attributeRegister = new AttributeRegister();
        $this->valueGetter = new DefaultValueGetter();

        /**
         * assuming the responsibility of LocNonLocAttributeGroupHandler to only handle the 'localized' and
         * 'non_localized' attributes, not to return the attribute register for other handlers
         *
         * that's why passing attribute register in each hanlder from here along with the LocNonLocAttributeGroupHandler
         * rather than other handlers getting the register from LocNonLocAttributeGroupHandler in their implementation.
         */
        $this->locNonLocGroupHandler = new LocNonLocAttributeGroupHandler($this->attributeRegister,$this->valueGetter);

        $this->objectRelationHandler = new ObjectRelationHandler($this->attributeRegister,$this->locNonLocGroupHandler);

        $this->objectBrickHandler = new ObjectBrickHandler($this->attributeRegister,$this->locNonLocGroupHandler);

        $this->writeRegister();
    }

    /**
     * add entries in the register for each kind of config segment to track the empty, populated and all attibutes list
     */
    private function writeRegister()
    {

        // non_localized handling
        $nonLocConfig = isset($this->config['non_localized']) ? $this->config['non_localized'] : NULL;
        if($nonLocConfig){
            $this->locNonLocGroupHandler->addEntriesForNonLocAttributeGroup($nonLocConfig,$this->product,array());
        }

        // localized handling
        $locConfig = isset($this->config['localized']) ? $this->config['localized'] : NULL;
        if($locConfig){
            $this->locNonLocGroupHandler->addEntriesForLocAttributeGroup($locConfig,$this->product,array());
        }

        // object_relations handling
        $objectRelationConfig = isset($this->config['object_relations']) ? $this->config['object_relations'] : NULL;
        if($objectRelationConfig){
            $this->objectRelationHandler->addEntriesForRelationalAttributes($objectRelationConfig,$this->product);
        }

        // object brick handling
        $objectBrickConfig = isset($this->config['object_bricks']) ? $this->config['object_bricks'] : NULL;
        if($objectBrickConfig){
            $this->objectBrickHandler->addEntriesForObjectBricks($objectBrickConfig,$this->product);
        }

    }

    /**
     * @return array
     */
    public function getEmptyAttributes(): array
    {
        return $this->attributeRegister->getEmptyAttributes();
    }

    /**
     * @return array
     */
    public function getPopulatedAttributes(): array
    {
        return $this->attributeRegister->getPopulatedAttributes();
    }

    /**
     * @return array
     */
    public function getAllAttributes(): array
    {
        return $this->attributeRegister->getAllAttributes();
    }

    /**
     * @param $language
     * @return array
     */
    public function getEmptyAttributesForLanguage(string $language): array
    {
        $nonLocEmptyAttributes = $this->getNonLocalizedEmptyAttributes();

        $locEmptyAttributes = $this->getLocalizedEmptyAttributes($language);

        return array_merge($nonLocEmptyAttributes,$locEmptyAttributes);
    }

    public function getNonLocalizedEmptyAttributes(): array
    {
        $allEmptyAttributes = $this->getEmptyAttributes();

        // non_localized emtpy attributes
        $nonLocEmptyAttributes = array();
        if(array_key_exists(AttributeRegister::NON_LOC_IDENTIFIER,$allEmptyAttributes)){
            $nonLocEmptyAttributes = $allEmptyAttributes[AttributeRegister::NON_LOC_IDENTIFIER];
        }
        return $nonLocEmptyAttributes;
    }

    public function getLocalizedEmptyAttributes(string $language):array
    {
        $allEmptyAttributes = $this->getEmptyAttributes();

        // localized empty attributes
        $locEmptyAttributes = array();
        if(array_key_exists($language,$allEmptyAttributes)){
            $locEmptyAttributes = $allEmptyAttributes[$language];
        }
        return $locEmptyAttributes;
    }

    /**
     * @param $language
     * @return int
     */
    public function getPopulatedAttributeCountForLanguage($language): int
    {
        $populatedAttributes = $this->getPopulatedAttributes();

        // count of non_localized populated attributes
        $nonLocPopulatedAttributeCount = 0;
        if(array_key_exists(AttributeRegister::NON_LOC_IDENTIFIER,$populatedAttributes)){
            $nonLocPopulatedAttributeCount = count($populatedAttributes[AttributeRegister::NON_LOC_IDENTIFIER]);
        }

        // count of localized populated attributes
        $locPopulatedAttributeCount = 0;
        if(array_key_exists($language,$populatedAttributes)){
            $locPopulatedAttributeCount = count($populatedAttributes[$language]);
        }

        return $nonLocPopulatedAttributeCount + $locPopulatedAttributeCount;
    }

    /**
     * @param string $language
     * @return float
     */
    public function getPopulatedPercentageForLanguage(string $language): float
    {
        $countOfAllAttributes = count($this->getAllAttributes());

        $countOfPopulatedAttributes = $this->getPopulatedAttributeCountForLanguage($language);

        return round(( $countOfPopulatedAttributes / $countOfAllAttributes ) * 100,2);
    }


}
