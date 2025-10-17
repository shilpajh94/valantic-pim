<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use Pimcore\Bundle\AdminBundle\Controller\Admin\DataObject\DataObjectController;
use Pimcore\Model\DataObject\UniProductBase;

class UniProductGetInheritedDataForObjectService
{
    private ?DataObjectController $dataObjectController = null;

    /**
     * Call getDataForObject on the controller, even if it's non-public.
     *
     * @return array<string, mixed>
     *
     * @throws \ReflectionException
     */
    public function callGetDataForObject(UniProductBase $object, bool $objectFromVersion = false): array
    {
        try {
            $controller = $this->getController();
            $ref = new \ReflectionClass($controller);
            $method = $ref->getMethod('getDataForObject');
            $method->setAccessible(true);
            $prop = $ref->getProperty('objectData');
            $prop->setAccessible(true);
            $method->invoke($controller, $object, $objectFromVersion);

            return $value = $prop->getValue($controller);
        } catch (\ReflectionException $e) {
            throw new \RuntimeException('Cannot call getDataForObject: ' . $e->getMessage(), 0, $e);
        }
    }

    private function getController(): DataObjectController
    {
        if (!$this->dataObjectController instanceof DataObjectController) {
            $this->dataObjectController = \Pimcore::getContainer()->get(DataObjectController::class);
        }

        return $this->dataObjectController;
    }
}
