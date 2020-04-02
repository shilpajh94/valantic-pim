<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 1/4/20
 * Time: 7:44 PM
 */

namespace RequiredAttributesBundle\Services;


use AppBundle\Logger\LogLevel;
use AppBundle\Tool\Utils;
use Pimcore\Model\DataObject\Product;
use RequiredAttributesBundle\Lib\RequiredAttributeManager;

class RequiredAttributeIndicatorFieldPopulator
{

    /**
     * @var ConfigResolver
     */
    private $configResolver;

    public function __construct(ConfigResolver $configResolver)
    {
        $this->configResolver = $configResolver;
    }

    /**
     * populate empty and percentage fields in product for each type of required attribute config
     * specified in REQUIRED_ATTRIBUTE_CONFIG_TYPES_TO_PRODUCT_FIELDS_MAPPING constant
     *
     * @param Product $product
     * @param string $categorySiopCode
     */
    public function populateEmptyFieldAndPercentage(Product $product,string $categorySiopCode)
    {
        foreach(REQUIRED_ATTRIBUTE_CONFIG_TYPES_TO_PRODUCT_FIELDS_MAPPING as $configType => $productFields){
            try{
                $config = $this->configResolver->getConfig($categorySiopCode,$configType);
                $manager = new RequiredAttributeManager($config,$product);

                $langs = \Pimcore\Tool::getValidLanguages();

                foreach($langs as $lang){

                    $nonLocEmptyAttributesArray = $manager->getNonLocalizedEmptyAttributes();
                    $locEmptyAttributesArray = $manager->getLocalizedEmptyAttributes($lang);

                    $emptyAttributes = $this->getEmptyAttributeAsString($nonLocEmptyAttributesArray,$locEmptyAttributesArray);

                    $completenessPercentage = $manager->getPopulatedPercentageForLanguage($lang);

                    // write setters
                    $emptyFieldsTextareaSetter = 'set'.ucfirst($productFields['emptyFieldTextarea']);
                    $percentageInputSetter = 'set'.ucfirst($productFields['percentageInput']);

                    $product->$emptyFieldsTextareaSetter($emptyAttributes,$lang);
                    $product->$percentageInputSetter($completenessPercentage,$lang);
                }

            }catch (\Exception $exception){
                Utils::log(REQUIRED_ATTRIBUTES_LOG_FILE, $exception->getMessage(), LogLevel::CRITICAL());
            }
        }

    }

    /**
     * get SIOP level 2 category
     *
     * @param Product $product
     * @return mixed|null
     */
    public function getLevel2CategoryForProduct(Product $product)
    {
        $category = $this->getMappedObjectForManyToManyRelation($product,'SIOPLevel2');
        return $category;
    }

    /**
     * get attribute array in string form
     *
     * @param array $nonLocEmptyAttributesArray
     * @param array $locEmptyAttributesArray
     * @return string
     */
    private function getEmptyAttributeAsString(array $nonLocEmptyAttributesArray,array $locEmptyAttributesArray): string
    {
        $emptyAttributesString = '';

        if(count($nonLocEmptyAttributesArray) > 0 ){
            $emptyAttributesString .= "[ NON LOCALIZED ATTRIBUTES ]";
            $emptyAttributesString .= $this->formatAttributeArray($nonLocEmptyAttributesArray);
        }

        if(count($locEmptyAttributesArray) > 0){
            $emptyAttributesString .= "\n[ LOCALIZED ATTRIBUTES ]";
            $emptyAttributesString .= $this->formatAttributeArray($locEmptyAttributesArray);
        }

        return $emptyAttributesString;
    }

    /**
     * format the attribute array
     *
     * @param array $attrubutes
     * @return string
     */
    private function formatAttributeArray(array $attrubutes): string
    {
        $attributesString = '';
        $count = 0;
        foreach($attrubutes as $attribute){
            $attributesString .= "\n\t ".++$count. ") ".$attribute;
        }
        return $attributesString;
    }


    /**
     * @param $product
     * @param $relationAttributeName
     * @return mixed|null
     */
    private function getMappedObjectForManyToManyRelation($product, $relationAttributeName){
        $returnValue = null;

        $getter = 'get'.ucfirst($relationAttributeName);
        $objects = $product->$getter();
        if(is_array($objects) && count($objects) > 0 ){
            $returnValue = $objects[0];
        }
        return $returnValue;
    }
}