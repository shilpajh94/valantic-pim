<?php

namespace ContitechCS\ProductBundle\Services;

use phpDocumentor\Reflection\Types\Self_;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\CSProducts;
use Pimcore\Model\DataObject\Service;
use Symfony\Component\HttpFoundation\Request;
use ContitechCS\ImportBundle\Services\ImportConstants;
use Pimcore\Model\Asset;
class AppService
{
    /**
     * @var UnitConverterService
     */
    private $unitConverterService;

    /**
     * @var ConfigProviderService
     */
    private $configProviderService;

    /**
     * AppService constructor.
     * @param UnitConverterService $unitConverterService
     * @param ConfigProviderService $configProviderService
     */
    public function __construct(UnitConverterService $unitConverterService,ConfigProviderService $configProviderService)
    {
        $this->unitConverterService = $unitConverterService;
        $this->configProviderService = $configProviderService;
    }


    /**
     * @param Product $product
     * @param array $updatedData
     * @throws \Exception
     */
    public function updateUnitConversionAttributes(CSProducts $product, array $updatedData)
    {
        
        $brickMappingConfig = $this->configProviderService->getBrickMappingConfig()['product_type_to_product_brick_field_mapping'];

        // creating brick data in required format and removing it from the update data
        $brickData = array();
        foreach ($brickMappingConfig as $brickFieldNameInProduct) {
            if (array_key_exists($brickFieldNameInProduct, $updatedData)) {
                $brickData[$brickFieldNameInProduct] = $updatedData[$brickFieldNameInProduct];
                // unset the brick data from updated data
                unset($updatedData[$brickFieldNameInProduct]);
            }
        }

        // updated product attributes
        foreach ($updatedData as $attributeName => $attributeValue) {
            if($attributeValue === null){
                $this->updateAttributeGroup($product, $attributeName, null);
            }else{
                $this->updateAttributeGroup($product, $attributeName, floatval($attributeValue));
            }
        }

        // update brick attributes
        // iterating every brick container in product
        foreach ($brickData as $brickFieldNameInProductClass => $brickItems) {
            $getter = 'get' . ucfirst($brickFieldNameInProductClass);
            $brickContainer = $product->$getter();

            // iterating every brick item in the brick collection
            foreach ($brickItems as $brickItem) {
                $brickItemType = $brickItem['type'];
                $brickUpdatedData = $brickItem['data'];
                if (is_array($brickUpdatedData) && count($brickUpdatedData) > 0) {
                    $itemGetter = 'get' . ucfirst($brickItemType);
                    $brickItem = $brickContainer->$itemGetter();

                    // iterating every attribute in the brick item
                    foreach ($brickUpdatedData as $brickAttributeName => $brickAttributeValue) {
                        if($brickAttributeValue === null){
                            $this->updateAttributeGroup($brickItem, $brickAttributeName, null);
                        }else{
                            $this->updateAttributeGroup($brickItem, $brickAttributeName, floatval($brickAttributeValue));
                        }
                    }
                }

            }

        }
    }

    /**
     * to update the attribute group for the given attribute
     *
     * @param $object
     * @param string $attributeName
     * @param $value
     * @return mixed
     * @throws \Exception
     */
    public function updateAttributeGroup($object, string $attributeName, $value)
    {
        if ( (is_numeric($value) || $value === null ) && $this->unitConverterService->isAttributeExistInAttributeToGroupMapCache($attributeName)) {
            $this->unitConverterService->setGroupValueInObjectByAttribute($object, $attributeName, $value);
        }
        return $object;
    }

    /**
     * to create Assets Hierarch From product path
     *
     * @param $product
     * @param string $folderpath
     * @throws \Exception
     */

    public function createAssetsHierarch($product){
        $folderpath = "";
        if($product){
            $o_path = $product->getPath();
            $o_key = $product->getKey();
            $product_path = ImportConstants::CONTITECH_CS_PRODUCT_FOLDER;
            $asset_path = ImportConstants::CONTITECH_CS_ASSET_FOLDER;
            $product_asset_path = \str_replace($product_path, $asset_path, $o_path);
            $product_asset_path = $product_asset_path.$o_key."/";
            $folderpath = Asset\Service::createFolderByPath($product_asset_path);
        }
        return $folderpath;
    }
}
