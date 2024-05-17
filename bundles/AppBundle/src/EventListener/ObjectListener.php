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
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Pimcore\Event\Model\DocumentEvent;
use Pimcore\Bundle\WebToPrintBundle\Event\Model\PrintConfigEvent;
use Pimcore\Bundle\WebToPrintBundle\Processor\PdfReactor;
use Pimcore\Model;

class ObjectListener
{
    private $requestStack;
    private $appService;

    public function __construct(
        RequestStack $requestStack,
        AppService $appService,
    ) {
        $this->requestStack = $requestStack;
        $this->appService = $appService;
    }

    public function modifyProcessingOptions(PrintConfigEvent $event)
    {

        $arguments = $event->getArguments();
        $options = $arguments['options'];

        $processor = $event->getProcessor();
        if ($processor instanceof PdfReactor) {

            //add option disableBackgroundExecution into pdf generation process (pdf reactor functionality)
            $options[] = ['name' => 'disableBackgroundExecution', 'type' => 'bool', 'default' => true];
            $options[] = [
                'name' => 'Image Quality',
                'type' => 'select',
                'values' => ['Original', '90%', '80%', '70%', '60%', '50%', '40%', '30%', '20%', '10%'],
                'default' => 'Original'
            ];
            $options[] = [
                'name' => 'Image Width',
                'type' => 'select',
                'values' => ['Original', '2500', '2000', '1500', '1000', '500'],
                'default' => 'Original'
            ];
        }

        $arguments['options'] = $options;
        $event->setArguments($arguments);
    }

    public function listenPrintPrePdfGeneration(DocumentEvent $event)
    {
        $document = $event->getDocument();
        $_SESSION[PDF_GENERATION_REQUEST_SOURCE_DOC_SESSION_KEY] = $document->getId();
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
            $layoutName = '';

            if (!empty($layoutName)) {
                $customLayout = DataObject\ClassDefinition\CustomLayout::getByName($layoutName);
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

        $this->appService->updateCalcFields($object);

        /**
         * if object save is run through cli then do not perform the brick addition or deletion
         * because in this case the import script is already handling this.
         */

        if (php_sapi_name() != "cli") {
            // to also get the inherited values
            $object->setGetInheritedValues(true);

            if ($object instanceof DataObject\Product) {

                /**
                 * update the unit conversion attributes
                 */
                $this->updateUnitConversionAttributes($object);
            }
            if ($object instanceof DataObject\Users) {
                $this->updatePIMUser($object);
            }
        }

        if ($this->requestStack->getCurrentRequest() != null){
            if ($object instanceof DataObject\Product) {
                /**
                 * update the calculative logic value fields
                 */
                $currentRequestData = json_decode($this->requestStack->getCurrentRequest()->getPayload()->get('data'), true);
    
    
                if (strtoLower($object->getProductType()) == 'fert' && (array_key_exists('minimumTemperatureF', $currentRequestData) || array_key_exists('maximumTemperatureF', $currentRequestData))) {
                    $minTempFFromBase = $object->getParent()->getParent()->getMinimumTemperatureF();
                    $maxTempFFromBase = $object->getParent()->getParent()->getMaximumTemperatureF();
    
                    $minTempFFromFert = $object->getMinimumTemperatureF();
                    $maxTempFFromFert = $object->getMaximumTemperatureF();
                    if (((string)$minTempFFromBase == (string)$minTempFFromFert) && ((string)$maxTempFFromBase == (string)$maxTempFFromFert)) {
    
                        $this->appService->updateCalcFields($object);
                        $object->setRangeTemperatureF(null);
                    } else {
                        $this->appService->updateCalcFields($object);
                    }
                } elseif (strtoLower($object->getProductType()) != 'fert') {
    
                    $this->appService->updateCalcFields($object);
                }
    
    
    
                /**
                 * update Fitting Family and Thread Desc in HydFittingFert
                 * by picking values from related nomenclature master object
                 */
                $this->appService->updateFittingFamilyAndThreadDescInHydFittingFert($object);
                /**
                 * update product hierarchy for nomenclature (fitting family desc and thread desc)
                 */
                $this->appService->updateProductHierarchyForNomenclature($object);
    
                /**
                 * update VirtualCatalogReinforcement value if reinforcement is updated
                 */
                $requestStack = $this->requestStack;
                $currRequest = $requestStack->getCurrentRequest();
                if ($currRequest instanceof Request) {
                    $this->appService->updateVirtualCatalogReinforcementForUpdateInReinforcement($object, $currRequest);
                }
            }
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
        $requestStack = $this->requestStack;
        // get the current http request
        $currRequest = $requestStack->getCurrentRequest();

        if ($currRequest instanceof Request) {
            $updatedData = $currRequest->get('data');

            if ($updatedData) {
                $arr = ['Skeleton', 'Base', 'Fert'];
                $updatedData = json_decode($updatedData, true);
                foreach ($arr as $valuesBrick) {
                    foreach ($updatedData as $key => $value) {
                        if ((strpos($key, $valuesBrick) !== false) && (strpos($key, '~') !== false)) {
                            $str_arr = explode('~', $key);
                            $tempArr = ["type" => $str_arr[0], "data" => [$str_arr[1] => $value]];
                            $updatedData[$valuesBrick][] = $tempArr;
                            unset($updatedData[$key]);
                        }
                    }
                }
            }
        }

        return $updatedData;
    }



    /**
     * update PIM user when user object get updated
     * @param \Pimcore\Model\DataObject\Users $object
     */
    private function updatePIMUser(\Pimcore\Model\DataObject\Users $object)
    {
        // $userObj = \Pimcore\Model\User::getById($object->getAdminReference());
        $userObj = \Pimcore\Model\User::getById($object->getId());

        if (!empty($userObj)) {
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

        if ($object instanceof  DataObject\PlantMaterialMaster) {
            $materials = $object->getMaterial();
            if (is_array($materials) && !empty($materials)) {
                $product = $materials[0];
                if ($product) {
                    $this->appService->updateProductReturnFlag($product->getId());
                }
            }
        }
    }

    public function preSendData(GenericEvent $event)
    {
        $data = $event->getArgument('data');
        $object = $event->getArgument('object');

        if ($object->getType() === 'folder') {
            $data['isAllowedSQLEditor'] = 0;
            $currentUser = \Pimcore\Tool\Admin::getCurrentUser();
            if ($this->isAllowSQLEditor($currentUser)) {
                $data['isAllowedSQLEditor'] = 1;
            }
            $event->setArgument('data', $data);
        }
    }

    /**
     * sql editor should be visible to admin or ApplicationAdmin only
     *
     * @param $adminUser
     * @return bool
     */
    public function isAllowSQLEditor($adminUser): bool
    {
        foreach (GRID_SQL_EDITOR_ALLOWED_ROLES as $roleName) {
            $appliicationAdminRole = Model\User\Role::getByName($roleName);

            $adminRoles = $adminUser->getRoles();
            if (in_array($appliicationAdminRole->getId(), $adminRoles) || $adminUser->isAdmin()) {
                return true;
            }
        }
        return false;
    }
}
