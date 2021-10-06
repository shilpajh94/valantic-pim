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

                //custom brick validation
                $product_name = trim($object->getName());
                $parent = $object->getParent();
                $config = $this->getConfigFromYmlFile(CS_PRODUCT_ATTRIBUTE_VALIDATION_FILE_PATH);
                $applyvalidation = false;
                if (isset($config[$product_name])) {
                    $applyvalidation = true;
                } else {
                    if ($parent != "/Contitech_ConveyorSolution/Products") {
                        $parent_name = trim($parent->getName());
                        if (isset($config[$parent_name])) {
                            $applyvalidation = true;
                            $product_name = $parent_name;
                        }
                    }
                }
                //$applyvalidation = false;
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
            }
        }
        /**
         * if object save is run through cli then do not perform the brick addition or deletion
         * because in this case the import script is already handling this.
         */
        if (php_sapi_name() != "cli") {
            // to also get the inherited values
            $object->setGetInheritedValues(true);
            if ($object instanceof DataObject\CSProducts) {

                $this->percentageCompletionService->completenessPercentage($object);
                //$this->checkUniqueProduct($object);

                /**
                 * update the unit conversion attributes
                 */
                //$this->updateUnitConversionAttributes($object);
            }
        }
    }


    // functionality to check if product is already exist or not, if already exists then display an error message saying “Duplicate product name”
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
     *
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
}
