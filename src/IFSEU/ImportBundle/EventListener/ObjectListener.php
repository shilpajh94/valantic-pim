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

namespace IFSEU\ImportBundle\EventListener;

use IFSEU\ImportBundle\Services\AppService;
use IFSEU\ImportBundle\Services\CategoryBrickMappingService;
use IFSEU\ImportBundle\Services\ConfigProviderService;
use IFSEU\ImportBundle\Services\UnitConverterService;
use Pimcore\Bundle\AdminBundle\Helper\GridHelperService;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\ProductLine;
use Pimcore\Model\DataObject;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Pimcore\Event\Model\DocumentEvent;


class ObjectListener
{

    private $requestStack;

    private $categoryBrickMappingService;

    private $unitConversionService;

    private $appService;

    private $customGridHelperService;

    public function __construct(RequestStack $requestStack,
                                GridHelperService $customGridHelperService
                                )
    {
        $this->requestStack = $requestStack;
        $this->categoryBrickMappingService = \Pimcore::getContainer()->get('ifs_eu_import.category_brick_mapping_service');
        $this->unitConversionService = \Pimcore::getContainer()->get('ifs_eu_import.unit_conversion_import_service');
        $this->appService = \Pimcore::getContainer()->get('ifs_eu_import.appServices');
        $this->customGridHelperService = $customGridHelperService;
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

            if ($object instanceof DataObject\IFSEUProduct) {
                /**
                 * update the unit conversion attributes
                 */
                $this->updateUnitConversionAttributes($object);

            }
        }
        if ($object instanceof DataObject\IFSEUProduct) {
            /**
             * update the calculative logic value fields
             */
            $this->appService->updateCalcFields($object);

        }
    }


    /**
     * to update the unit conversion attributes
     *
     * @param DataObject\Product $product
     * @throws \Exception
     */
    private function updateUnitConversionAttributes(DataObject\IFSEUProduct $product)
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
}
