<?php

namespace AppBundle\Services;

use Pimcore\Logger;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\Folder;
use Pimcore\Model\DataObject\Product;
use Pimcore\Model\DataObject\Service;
use Symfony\Component\HttpFoundation\Request;

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

    private $db;

    /**
     * AppService constructor.
     * @param UnitConverterService $unitConverterService
     * @param ConfigProviderService $configProviderService
     */
    public function __construct(UnitConverterService $unitConverterService,ConfigProviderService $configProviderService)
    {
        $this->unitConverterService = $unitConverterService;
        $this->configProviderService = $configProviderService;
        $this->db = \Pimcore\Db::get();
    }

    /**
     * @param Product $product
     * @param array $updatedData
     * @throws \Exception
     */
    public function updateUnitConversionAttributes(Product $product, array $updatedData)
    {
        $brickMappingConfig = $this->configProviderService->getBrickMappingConfig()['product_type_to_product_brick_field_mapping'];

        // creating brick data in required format and removing it from the update data
        $brickData = array();
        foreach ($brickMappingConfig as $level => $brickFieldNameInProduct) {
            if (array_key_exists($brickFieldNameInProduct, $updatedData)) {
                $brickData[$brickFieldNameInProduct] = $updatedData[$brickFieldNameInProduct];
                // unset the brick data from updated data
                unset($updatedData[$brickFieldNameInProduct]);
            }
        }

        // updated product attributes
        foreach ($updatedData as $attributeName => $attributeValue) {
            $this->updateAttributeGroup($product, $attributeName, floatval($attributeValue));
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
                        $this->updateAttributeGroup($brickItem, $brickAttributeName, $brickAttributeValue);
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
        if ( (is_numeric($value) || $value == null ) && $this->unitConverterService->isAttributeExistInAttributeToGroupMapCache($attributeName)) {
            $this->unitConverterService->setGroupValueInObjectByAttribute($object, $attributeName, $value);
        }
        return $object;
    }

    /**
     * update the calculative logic value fields
     *
     * @param Product $product
     */
    public function updateCalcFields(Product $product)
    {
        /**
         * setting temperature range fields
         */
        if($product->getMinimumTemperatureF() && $product->getMaximumTemperatureF()){
            $tempRangeF = $product->getMinimumTemperatureF() . "°F" .
                            " to " . $product->getMaximumTemperatureF() . "°F";
            $product->setRangeTemperatureF($tempRangeF);
        }

        if($product->getMinimumTemperatureC() && $product->getMaximumTemperatureC()){
            $tempRangeF = $product->getMinimumTemperatureC() . "°C" .
                            " to " . $product->getMaximumTemperatureC() . "°C";
            $product->setRangeTemperatureC($tempRangeF);
        }

        if($product->getRangeTemperatureF() && $product->getRangeTemperatureC()){
            $tempRangeFAndC = strval($product->getRangeTemperatureF()) . " (" .
                strval($product->getRangeTemperatureC()) .")" ;
            $product->setTemperatureRangeFAndC($tempRangeFAndC);
        }

        if($product->getFert()){
            /**
             * setting 'Total Weight (lbs) / Packaged Weight' in hose fert
             */
            if( $hoseFert = $product->getFert()->getHoseFert() ){
                $netWeight = $product->getNetWeight();
                $hoseLengthFT = $hoseFert->getHoseLengthFT();

                try{
                    if (!empty($hoseLengthFT) && !empty($netWeight)) {
                        $totalWeightPerPackage = $netWeight / $hoseLengthFT ;
                        $hoseFert->setTotalWeightPerPackage(round($totalWeightPerPackage, 5));
                    } else {
                        $hoseFert->setTotalWeightPerPackage(null);
                    }

                }catch (\Exception $exception){
                    $hoseFert->setTotalWeightPerPackage(null);
                }
            }

            /**
             * setting 'Thrust Wire Nut (Y/N)' in hyd fittings fert
             */
            if( $hydFittingFert = $product->getFert()->getHydFittingsFert() ){
                $thrustWireComponentNumber = $hydFittingFert->getThrustWireComponentNumber();
                if( $thrustWireComponentNumber && trim($thrustWireComponentNumber) !== '' ){
                    $hydFittingFert->setThrustWireNut(true);
                }else{
                    $hydFittingFert->setThrustWireNut(false);
                }
            }

            /**
             * setting 'Number of teeth' in synchronous fert
             */
            if( $syncFert = $product->getFert()->getSynchronousFert() ){
                $pitchLenghIn = $syncFert->getPitchLengthIN();
                $pitchIN = $syncFert->getPitchIN();

                try{
                    $numberOfTeeth = $pitchLenghIn / $pitchIN;
                    $syncFert->setNumberOfTeeth(round($numberOfTeeth, 5));
                }catch (\Exception $exception){
                    $syncFert->setNumberOfTeeth(null);
                }
            }
        }


    }

    /**
     * create logic for "Return Flag (Y/N) =If stock indicator is S, flag is Yes else NO"
     * and update the product table
     *
     * @param int $productId
     */
    public function updateProductReturnFlag(int $productId)
    {
        $db = \Pimcore\Db::get();
        $plantMaterialMasterClassId = $this->getPimcoreClassIdbyName('PlantMaterialMaster');

        if($plantMaterialMasterClassId){
            $plantMaterialMasterTableName = "object_".$plantMaterialMasterClassId;
            $productClassId = $this->getPimcoreClassIdbyName('Product');
            $productQueryTable = "object_query_".$productClassId;
            $productStoreTable = "object_store_".$productClassId;

            $query = "SELECT COUNT(*) FROM ".$plantMaterialMasterTableName;
            $query .= " WHERE Material = :productId AND StockIndicator = 'S'";

            $db->beginTransaction();

            try {
                $result = $db->fetchOne($query, array('productId' => ",".$productId.","));
                $newReturnFlagValue = null;
                if(0 === (int)$result ){
                    $newReturnFlagValue = 0;
                }else{
                    $newReturnFlagValue = 1;
                }

                $data = array('returnFlag' => $newReturnFlagValue);
                $identifier = array('oo_id' => $productId);
                $type = array('returnFlag' => \PDO::PARAM_INT,'oo_id' => \PDO::PARAM_INT);

                /**
                 * update product table for returnFlag
                 */
                $db->update($productQueryTable,$data,$identifier,$type);
                $db->update($productStoreTable,$data,$identifier,$type);

                $db->commit();
            }catch (\Exception $exception){
                Logger::error($exception);
                try {
                    $db->rollBack();
                } catch (\Exception $er) {
                    // PDO adapter throws exceptions if rollback fails
                    Logger::error($er);
                }
            }
        }
    }

    /**
     * @param string $pimcoreClassName
     * @return string|null
     */
    public function getPimcoreClassIdbyName(string $pimcoreClassName): ?string
    {
        $classDef = ClassDefinition::getByName($pimcoreClassName);
        if($classDef){
            return $classDef->getId();
        }
        return null;
    }

    /**
     * update Fitting Family and Thread Desc in HydFittingFert
     * by picking values from related nomenclature master object
     *
     * @param Product $product
     */
    public function updateFittingFamilyAndThreadDescInHydFittingFert(Product $product): void
    {
        if($product->getFert() && $hydFittingFert = $product->getFert()->getHydFittingsFert()){
            $nomenclature = null;
            $nomeClatureDetailMetaItems = $hydFittingFert->getNomenclatureDetails();
            if($nomeClatureDetailMetaItems){
                foreach($nomeClatureDetailMetaItems as $nomeClatureDetailMeta){
                    $nomenclature = $nomeClatureDetailMeta->getObject();
                    break;
                }
            }

            if($nomenclature){
                $fittingFamilyMetaItems = $nomenclature->getFittingFamily();
                $fittingFamilies = array();
                foreach($fittingFamilyMetaItems as $fittingFamilyMeta){
                    $fittingFamily = $fittingFamilyMeta->getObject();
                    $fittingFamilies[] = $fittingFamily->getId();
                }

                $threadMetaItems = $nomenclature->getThread();
                $threadDesc = '';
                foreach($threadMetaItems as $threadMeta){
                    $thread = $threadMeta->getObject();
                    $threadDesc = $thread->getDescription();
                    break;
                }

                $hydFittingFert->setHydFittingFamily($fittingFamilies);
                $hydFittingFert->setHydThreadDescription($threadDesc);
            }else{
//                $hydFittingFert->setHydFittingFamily([]);
//                $hydFittingFert->setHydThreadDescription(null);
            }
        }
    }

    /**
     * if siop 4 category has true value for nomenclatureHierarchy, then create
     * folder hierarchy using fitting family and thread desc and move the
     * product to the inner folder
     *
     * @param Product $product
     * @throws \Exception
     */
    public function updateProductHierarchyForNomenclature(Product $product): void
    {
        $siop4Cats = $product->getSIOPLevel4();

        if($siop4Cats &&
            $siop4Cats[0] &&
            $siop4Cats[0]->getNomenclatureHierarchy() &&
            $product->getFert() &&
            ($hydfittingFert = $product->getFert()->getHydFittingsFert())
        ){
            $fittingFamilyDesc = null;
            $threadDesc = $hydfittingFert->getHydThreadDescription();

            $fittingFamilyIdArr = $hydfittingFert->getHydFittingFamily();
            if(is_array($fittingFamilyIdArr) && count($fittingFamilyIdArr) > 0){
                $fittingFamilyId = $fittingFamilyIdArr[0];
                $fittingFamilyObj = \Pimcore\Model\DataObject\FittingFamily::getById($fittingFamilyId);
                if($fittingFamilyObj){
                    $fittingFamilyDesc = $fittingFamilyObj->getDescription();
                }
            }

            $siop4CatPath = $siop4Cats[0]->getRealFullPath();
            $productPathFor4levelCat = $this->convertCategoryPathToProductPath($siop4CatPath);

            $targetFolderPath = $productPathFor4levelCat;

            if($fittingFamilyDesc && ( $validFittingFamilyDesc = $this->getValidNameForKey($fittingFamilyDesc)) ){
//                $productParentPath = $product->getPath();
                $targetFolderPath = $targetFolderPath."/".$validFittingFamilyDesc;

                if($threadDesc && ( $validThreadDesc = $this->getValidNameForKey($threadDesc)) ){
                    $targetFolderPath = $targetFolderPath."/".$validThreadDesc;
                }
            }

            $targetFolder = $this->getProductFolderByPath($targetFolderPath);
            $product->setParent($targetFolder);
        }
    }

    public function convertCategoryPathToProductPath($categoryPath) {
        $search = '/Master List/SIOP Master List/SIOP Engineered Products';
        $replace = '/Products Master';
        return str_replace($search, $replace, $categoryPath);
    }

    /**
     * @param string $path
     * @return Folder
     * @throws \Exception
     */
    private function getProductFolderByPath(string $path): Folder
    {
        $folder = Folder::getByPath($path);
        if(!$folder){
            $folder = Service::createFolderByPath($path);
        }
        return $folder;
    }

    /**
     * @param string $string
     * @return string|null
     */
    private function getValidNameForKey(string $string): ?string
    {
        $string = explode("(",$string)[0];
        $string = substr($string, 0, FOLDER_KEY_LENGTH_FOR_FITTING_FAMILY_DESC_THREAD_DESC);
        return \Pimcore\Model\Element\Service::getValidKey($string,'object');
    }

    /**
     * update VirtualCatalogReinforcement value if reinforcement is updated
     */
    public function updateVirtualCatalogReinforcementForUpdateInReinforcement(Product $product,Request $request)
    {
        if ($request->get('data')) {
            $changedData = json_decode($request->get('data'), true);
            if(array_key_exists("reinforcement",$changedData)){
                $masterNames = $this->getMasterNames($changedData['reinforcement']);
                $product->setVirtualCatalogReinforcement(implode(",",$masterNames));
            }
        }
    }

    /**
     * get english master name for master ids
     *
     * @param array $masterIds
     * @return array
     * @throws \Exception
     */
    private function getMasterNames(array $masterIds): array
    {
        $masterClassId = $this->getPimcoreClassIdbyName("MultiselectMaster");
        $names = array();

        if(count($masterIds) > 0){
            $sql = "SELECT name FROM object_localized_query_" . $masterClassId . "_en";
            $sql .= " WHERE ooo_id IN (" . implode(",",$masterIds) . ")";
            // adding order by so that the names appear in the order of passed $masterIds
            $sql .= " ORDER BY FIELD(ooo_id," . implode(",",$masterIds) . ")";

            try{
                $names = $this->db->fetchCol($sql);
            }catch (\Exception $exception){
                Logger::error("Exception: " . $exception->getMessage());
                throw new \Exception("An unexpected error occurred.");
            }
        }
        return $names;
    }

    /**
     * saving objects in batches of $batchSize size
     *
     * @param array|null $articleNumbers
     * @param bool|null $printProgress only useful when running from console
     */
    public function saveProductsWithArticleNumbers(?array $articleNumbers = [],?bool $printProgress = false)
    {
        $batchSize = 1000;

        $listing = new Product\Listing();

        if(count($articleNumbers) > 0 ){
            $articleNumbersForQuery = [];
            foreach($articleNumbers as $articleNumber){
                $articleNumbersForQuery[] = "'" . $articleNumber . "'";
            }
            $condition = " articleNumber IN " . "(" . implode(",",$articleNumbersForQuery) . ")";
            $listing->setCondition($condition);
        }

        $totalCount = $listing->getTotalCount();
        $offset = 0;
        $savedCount = 0;
        while($offset <= ( $totalCount - 1) ){

            $listing->setOffset($offset);
            $listing->setLimit($batchSize);

            $listing->load();
            foreach($listing->getObjects() as $object){
                $object->save();
                $savedCount++;
                if($printProgress){
                    if($savedCount % 10 == 0){
                        echo "Saved " . $savedCount . "/" . $totalCount . PHP_EOL;
                    }
                }
            }

            $offset = $offset + $batchSize;
        }


    }

}
