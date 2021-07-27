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


class ObjectListener
{

    private $requestStack;

    private $appService;

    private $unitConversionService;

    public function __construct(RequestStack $requestStack,
                                AppService $appService,
                                UnitConverterService $unitConverterService
                                )
    {
        $this->requestStack = $requestStack;
        $this->appService = $appService;
        $this->unitConversionService = $unitConverterService;
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

            if ($object instanceof DataObject\CSProducts) {

                /**
                 * update the unit conversion attributes
                 */
                $this->updateUnitConversionAttributes($object);

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
}
