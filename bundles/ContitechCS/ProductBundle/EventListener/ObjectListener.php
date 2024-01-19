<?php

/**
 * Pimcore global services
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright Copyright (c) Pimcore global services
 * @license Pimcore global services GPLv3 and PEL
 */

namespace ContitechCS\ProductBundle\EventListener;

use ContitechCS\ProductBundle\Services\AppService;
use ContitechCS\ProductBundle\Services\UnitConverterService;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject;
use Symfony\Component\EventDispatcher\GenericEvent;
use ContitechCS\ImportBundle\Services\ImportConstants;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use ContitechCS\ProductBundle\Tool\Utils;
use Pimcore\Cache;
use Pimcore\Model\DataObject\ClassDefinition;
use ContitechCS\ProductBundle\Services\PercentageCompletionService;

class ObjectListener
{

    private $requestStack;

    private $appService;

    private $unitConversionService;

    private $percentageCompletionService;

    const INTERNAL_ASSETS_PATH = '/Contitech_ConveyorSolution/Internal Assets/';

    public function __construct(
        RequestStack $requestStack,
        AppService $appService,
        UnitConverterService $unitConverterService,
        PercentageCompletionService $percentageCompletionService
    ) {
        $this->requestStack = $requestStack;
        $this->appService = $appService;
        $this->unitConversionService = $unitConverterService;
        $this->percentageCompletionService = $percentageCompletionService;
    }

    /**
     * handle brick addition or deletion on product based on associated category
     *
     * to get rid of the performance decrease on every product save, we are using the http request
     * to identify whether any of the SIOP relation is changed in the product,if so, only then
     * process the product for brick changes
     *
     * @param DataObjectEvent $event
     */
    public function preUpdate(DataObjectEvent $event)
    {
        $object = $event->getObject();
        $type = $object->getType();

        if ($type != 'folder') {
            $className = $object->getClassName();

            if ($className == 'CSProducts') {
                //$this->checkUniqueProduct($object);
                $argument = $event->getArguments();

                $applyvalidation = false;
                if ($object->isPublished() && (!isset($argument['saveVersionOnly']) ||
                    empty($argument['saveVersionOnly']))) {
                    //custom brick validation

                    $product_name = trim($object->getName());
                    $parent = $object->getParent();
                    $config = $this->getConfigFromYmlFile(CS_PRODUCT_ATTRIBUTE_VALIDATION_FILE_PATH);

                    if (isset($config[$product_name])) {
                        $applyvalidation = true;
                    } else {
                        // if ($parent != "/Contitech_ConveyorSolution/Products") {
                        //     if ($parent->getType() == 'folder') {
                        //         $parent_name = $parent->getParent()->getName();
                        //     } else {
                        //         $parent_name = trim($parent->getName());
                        //     }

                        //     if (isset($config[$parent_name])) {
                        //         $applyvalidation = true;
                        //         $product_name = $parent_name;
                        //     }
                        // }
                    }
                }
                $applyvalidation = false;
                if ($applyvalidation) {
                    $arr = array('Please fill all mandatory fields');
                    foreach ($config[$product_name] as $cnf) {
                        $fieldName = $cnf['fieldName'];
                        $objectType = $cnf['objectType'];
                        if ($objectType === "class") {
                            $method = "get$fieldName";
                            $class = DataObject\ClassDefinition::getByName($className);
                            $fieldTitle = $class->getFieldDefinition($fieldName);
                            if ($fieldTitle) {
                                $fieldTitle = $fieldTitle->getTitle();
                            } else {
                                $fieldTitle = $fieldName;
                            }
                            $value = $object->$method();
                            if (empty($value)) {
                                $arr[] = "$fieldTitle in Base Data";
                            }
                        } else {
                            $getBrickMethod = "get$objectType";
                            $getBrickAttributeMethod = "get$fieldName";
                            $v = $object->getProductAttributes()->$getBrickMethod()->$getBrickAttributeMethod();
                            $brickClass =  DataObject\Objectbrick\Definition::getByKey($objectType);
                            $brickfieldTitle = $brickClass->getFieldDefinition($fieldName)->getTitle();
                            $objectTitle = $brickClass->getTitle();
                            if (empty($v)) {
                                $arr[] = "$brickfieldTitle in $objectTitle";
                            }
                        }
                    }

                    if (count($arr) > 1) {
                        $msg = join("<br />- ", $arr);
                        throw new \Pimcore\Model\Element\ValidationException($msg, 1234);
                    }
                }

                $response = $this->checkArchivedAssetMapping($object);
                if (empty($response['success'])) {
                    throw new \Pimcore\Model\Element\ValidationException(
                        'Archived asset can not be mapped with Product.'
                    );
                }
                //if (php_sapi_name() != "cli") {
                $object->setGetInheritedValues(true);
                //}
                $this->percentageCompletionService->completenessPercentage($object);
            }
        }
        /**
         * if object save is run through cli then do not perform the brick addition or deletion
         * because in this case the import script is already handling this.
         */
        //        if (php_sapi_name() != "cli") {
        // to also get the inherited values



        //$this->checkUniqueProduct($object);

        /**
         * update the unit conversion attributes
         */
        //$this->updateUnitConversionAttributes($object);

        //        }
    }

    /**
     *  Moving product to Region folder after clicking on Save and Publish
     * @param DataObjectEvent $event
     */
    public function moveProductToRegion(DataObjectEvent $event)
    {
        $object = $event->getObject();
        $type = $object->getType();

        if ($type != 'folder') {
            $className = $object->getClassName();

            if ($className == 'CSProducts' && php_sapi_name() != "cli" && !$object->hasChildren()) {
                //$argument = $event->getArguments();
                //if ($object->isPublished() &&
                // (!isset($argument['saveVersionOnly']) || empty($argument['saveVersionOnly']))) {
                $regionArray = $object->getCSRegion();
                if (is_array($regionArray) && !empty($regionArray)) {
                    $folderCreationPath = '';
                    $masterRegionArray = $this->getAllRegions();
                    $firstRegionId = trim($regionArray[0]);
                    $regionName = DataObject\CSRegion::getById($firstRegionId)->getRegionName();

                    $regionName = $this->removeSlash($regionName);
                    $folderCreationPath = $object->getPath();

                    foreach ($masterRegionArray as $region) {
                        $region = $this->removeSlash($region);
                        if (strpos($folderCreationPath, $region) !== false) {
                            $folderCreationPath = str_replace("/" . $region, "", $folderCreationPath);
                        }
                    }
                    foreach ($masterRegionArray as $region) {
                        $region = $this->removeSlash($region);
                        if (strpos($folderCreationPath, $region) === false && $region == $regionName) {
                            $folderCreationPath = $folderCreationPath . "/" . $regionName;
                        }
                    }
                    $parentId = DataObject\Service::createFolderByPath($folderCreationPath)->getId();
                    $object->setParentId($parentId);
                }
                else{
                    $parentFOlder = $object->getParent();
                    if(strtolower($parentFOlder->getType()) == 'folder')
                    {
                        $parentObjectID = $parentFOlder->getParentId();
                        $object->setParentId($parentObjectID);
                    }
                }
            }
        }
    }

    public function getAllRegions()
    {
        $regionList = new \Pimcore\Model\DataObject\CSRegion\Listing();
        $regionList->load();

        $fieldArray = array();
        foreach ($regionList as $list) {
            $fieldArray[] = $list->getRegionName();
        }
        return $fieldArray;
    }

    public function removeSlash($region)
    {
        if (strpos($region, "/") !== false) {
            $region = str_replace("/", "-", $region);
        }
        return $region;
    }

    public function checkArchivedAssetMapping(DataObject\CSProducts $product)
    {
        $classDefinition = DataObject\ClassDefinition::getByName($product->getClassName());
        $fieldDef = $classDefinition->getFieldDefinitions();

        //        $langs = \Pimcore\Tool::getValidLanguages();
        //        foreach ($langs as $lang) {
        foreach ($fieldDef as $field) {
            $fieldType = $field->getFieldType();
            $getter = "get" . ucfirst($field->getName());
            if ($fieldType == 'image') {
                $asset = $product->$getter();
                if (!empty($asset) && (strpos($asset->getRealFullPath(),
                    self::INTERNAL_ASSETS_PATH) !== false)) {
                    return ['success' => false, 'fieldName' => $field->getTitle()];
                }
            } elseif ($fieldType == 'imageGallery') {
                $gallery = $product->$getter();
                if (!empty($gallery) && !empty($gallery->getItems())) {
                    $items = $gallery->getItems();
                    foreach ($items as $item) {
                        if (!empty($item)) {
                            $asset = $item->getImage();
                            if (!empty($asset) && (strpos($asset->getRealFullPath(),
                                self::INTERNAL_ASSETS_PATH) !== false)) {
                                return ['success' => false, 'fieldName' => $field->getTitle()];
                            }
                        }
                    }
                }
            } elseif ($fieldType == 'video') {
                $video = $product->$getter();
                if (!empty($video) && $video->getType() == 'asset') {
                    $asset = $video->getData();
                    if (strpos($asset->getRealFullPath(), self::INTERNAL_ASSETS_PATH) !== false) {
                        return ['success' => false, 'fieldName' => $field->getTitle()];
                    }
                }
            } elseif ($fieldType == 'manyToManyRelation') {
                $docs = $product->$getter();
                foreach ($docs as $asset) {
                    if (strpos($asset->getRealFullPath(), self::INTERNAL_ASSETS_PATH) !== false) {
                        return ['success' => false, 'fieldName' => $field->getTitle()];
                    }
                }
            }
        }
        return ['success' => true];
    }


    // functionality to check if product is already exist or not,
    // if already exists then display an error message saying “Duplicate product name”
    public function checkUniqueProduct($object)
    {
        $productName = $object->getName();
        $productObjectId = $object->getId();
        if (!empty($productName)) {
            $list = new \Pimcore\Model\DataObject\CSProducts\Listing();
            $list->setCondition("Name = '$productName' AND oo_id != $productObjectId");
            $uniqueProduct = $list->load();
            if (!empty($uniqueProduct)) {
                throw new \Exception("Duplicate product name");
            }
        }
    }



    /**
     * to update the unit conversion attributes
     *
     * @param DataObject\Product $product
     * @throws \Exception
     */
    private function updateUnitConversionAttributes(DataObject\CSProducts $product)
    {
        $updatedData = $this->getEditedDataFromRequest();
        if (is_array($updatedData)) {
            $this->appService->updateUnitConversionAttributes($product, $updatedData);
        }
    }

    /**
     * get the edited data from the current request
     *product
     * @return mixed|null
     */
    private function getEditedDataFromRequest()
    {
        $updatedData = null;
        // get the current http request
        $currRequest = $this->requestStack->getCurrentRequest();

        if ($currRequest instanceof Request) {
            $updatedData = $currRequest->get('data');
            if ($updatedData) {
                $updatedData = json_decode($updatedData, true);
            }
        }

        return $updatedData;
    }

    /**
     * get yml config for the given file
     * caching the file data if environment is not dev
     *
     * @param $filePath
     * @return mixed
     */
    public function getConfigFromYmlFile($filePath)
    {
        $env = \Pimcore\Config::getEnvironment();
        $cacheKey = Utils::getCacheKeyForFilePath($filePath);

        if ($env != "dev") {
            $config = Cache::load($cacheKey);
            if (!$config) {
                $config = Utils::getYmlConfig($filePath);
                Cache::save($config, $cacheKey);
            }
        } else {
            $config = Utils::getYmlConfig($filePath);
            Cache::save($config, $cacheKey);
        }
        return $config;
    }

    public function beforeSearchListLoad(GenericEvent $event) {
        $list = $event->getArgument('list');
        $context = $event->getArgument('context');
        $className = isset($context['class']) ? $context['class'] : null;
        if (array_key_exists('context', $context)) {
            $contextArray = $context['context'];
            if ($className == 'CSProducts' && !empty($contextArray)) {
                $contextArray = (array)json_decode($contextArray);
                if (!empty($contextArray['scope']) && $contextArray['scope']=='objectEditor'
                    && $contextArray["fieldname"] == "CoverCompounds") {
                    $coverOptionPath = '/Cover Options/';
                    $condition = $list->getCondition();
                    $condition .= " AND (`fullpath` like '%".$coverOptionPath."%' ) ";
                    $list->setCondition($condition);
                    $event->setArgument('list', $list);
                }
            }
        }
    }
}
