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

namespace AppBundle\EventListener;

use AppBundle\Services\AppService;
use AppBundle\Services\CategoryBrickMappingService;
use AppBundle\Services\ConfigProviderService;
use AppBundle\Services\UnitConverterService;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\ProductLine;
use Pimcore\Model\DataObject;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;


class ObjectListener
{

    private $requestStack;

    private $categoryBrickMappingService;

    private $unitConversionService;

    private $appService;

    public function __construct(RequestStack $requestStack, CategoryBrickMappingService $categoryBrickMappingService, UnitConverterService $unitConverterService,AppService $appService)
    {
        $this->requestStack = $requestStack;
        $this->categoryBrickMappingService = $categoryBrickMappingService;
        $this->unitConversionService = $unitConverterService;
        $this->appService = $appService;
    }


    /**
     * --
     *
     * Listen to following events
     * - pimcore.admin.object.list.beforeListLoad
     *
     * @param GenericEvent $event
     */
    public function beforeOpenObject(GenericEvent $event)
    {
        $currentObject = $event->getArgument('object');
        $data = $event->getArgument('data');
        if ($currentObject instanceof \Pimcore\Model\DataObject\Product) {
            $validLayouts = $data['validLayouts'];
            $productType = $currentObject->getProductType();
            $layoutName = '';
            if (!empty($productType)) {
                $layoutName = $layoutName;
            }
            if (!empty($layoutName)) {
                $customLayout = DataObject\ClassDefinition\CustomLayout::getByName($layoutName); //Id($data['currentLayoutId']);
                $customLayoutDefinition = $customLayout->getLayoutDefinitions();
                $data['currentLayoutId'] = $customLayout->getId();
                $data['layout'] = $customLayoutDefinition;
                foreach ($validLayouts as $layoutData) {
                    if ($layoutData['id'] == $data['currentLayoutId']) {
                        $newValidLayouts[] = $layoutData;
                        $data['validLayouts'] = $newValidLayouts;
                    }
                }
                $event->setArgument('data', $data);
            }

        }
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

        /**
         * if object save is run through cli then do not perform the brick addition or deletion
         * because in this case the import script is already handling this.
         */

        if (php_sapi_name() != "cli") {
            // to also get the inherited values
            $object->setGetInheritedValues(true);

            if ($object instanceof DataObject\Product) {

//                $categoryBrickMappingService = $this->categoryBrickMappingService;
//                $requestStack = $this->requestStack;
//
//                $currRequest = $requestStack->getCurrentRequest();
//                $siopRelationChanged = false;
//                $siopFullCodeChanged = false;
//
//                /**
//                 * check if any of the SIOP relational field data is changed in the product
//                 * this is being done using the http request so that the performance is not hampered
//                 */
//                if ($currRequest instanceof Request) {
//                    $siopRelationChanged = $categoryBrickMappingService->isSIOPRelationChangedInSaveRequest($currRequest);
//                    $siopFullCodeChanged = $categoryBrickMappingService->isSIOPFullCodeChangedInSaveRequest($currRequest);
//                }
//
//                /**
//                 * run the logic for brick change management for the product
//                 * if any of the SIOP relation data or SIOP full code in product is changed
//                 */
//                if ($siopRelationChanged || $siopFullCodeChanged) {
//                    $categoryBrickMappingService->manageBricksForSIOPRelationChange($object);
//                }

                /**
                 * update the unit conversion attributes
                 */
                $this->updateUnitConversionAttributes($object);

            }
            if($object instanceof DataObject\Users) {
                $this->updatePIMUser($object);
            }
        }

        if ($object instanceof DataObject\Product) {
            /**
             * update the calculative logic value fields
             */
            $this->appService->updateCalcFields($object);
            /**
             * update product hierarchy for nomenclature (fitting family desc and thread desc)
             */
//            $this->appService->updateProductHierarchyForNomenclature($object);

        }
    }

    /**
     * to update the unit conversion attributes
     *
     * @param DataObject\Product $product
     * @throws \Exception
     */
    private function updateUnitConversionAttributes(DataObject\Product $product)
    {
        $updatedData = $this->getEditedDataFromRequest();
        if(is_array($updatedData)){
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
        $requestStack = $this->requestStack;
        // get the current http request
        $currRequest = $requestStack->getCurrentRequest();

        if ($currRequest instanceof Request) {
            $updatedData = $currRequest->get('data');
            if ($updatedData) {
                $updatedData = json_decode($updatedData, true);
            }
        }

        return $updatedData;
    }



    /**
     * update PIM user when user object get updated
     * @param \Pimcore\Model\DataObject\Users $object
    */
    private function updatePIMUser(\Pimcore\Model\DataObject\Users $object) {
        $userObj = \Pimcore\Model\User::getByName($object->getUserName());
        if(!empty($userObj)) {
            $userData = array(
                'firstname' =>  $object->getFirstname(),
                'lastname'  =>  $object->getLastname(),
                'email'     =>  $object->getEmail(),
                'roles'     =>  $object->getUserType()
            );
            $userObj->setValues($userData);
            $userObj->update();
        }

    }

    /**
     * Listening to dataobject postupdate event
     *
     * @param DataObjectEvent $event
     */
    public function postUpdate(DataObjectEvent $event)
    {
        $object = $event->getObject();

        if($object instanceof  DataObject\PlantMaterialMaster){
            $materials = $object->getMaterial();
            $product = $materials[0];
            if($product){
                $this->appService->updateProductReturnFlag($product->getId());
            }
        }

    }


}
