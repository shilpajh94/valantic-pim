<?php

namespace IFSEU\ProductBundle\EventListeners;

use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject;
use IFSEU\ProductBundle\Services\CompletenessPercentageService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ObjectsListener
{

    private $percentageCompletionService;
    private $appService;
    private $requestStack;
    private $container;

    public function __construct(RequestStack $requestStack,
        CompletenessPercentageService $percentageCompletionService, ContainerInterface $container
    ) {
        $this->container = $container;
        $this->percentageCompletionService = $percentageCompletionService;
        $this->appService = $this->container->get('ifs_eu_import.appServices');
        $this->requestStack = $requestStack;
    }

    /**
     * @param DataObjectEvent $event
     */
    public function preUpdate(DataObjectEvent $event)
    {
        $object = $event->getObject();
        if ($object->getType() != 'folder') {
            $className = $object->getClassName();
            
            if ($className == 'IFSEUProduct')
            {
                $this->percentageCompletionService->completenessPercentage($object, 'save');
            }

            if ($object instanceof DataObject\IFSEUProduct) {
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
