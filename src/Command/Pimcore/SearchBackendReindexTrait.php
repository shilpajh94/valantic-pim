<?php

declare(strict_types=1);

namespace App\Command\Pimcore;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\Document;
use Pimcore\Model\Element\Service;

trait SearchBackendReindexTrait
{
    protected function getList(string $type): Document\Listing|DataObject\Listing|Asset\Listing
    {
        $baseClass = Service::getBaseClassNameForElement($type);
        $listClassName = '\\Pimcore\\Model\\' . $baseClass . '\\Listing';
        /** @var Document\Listing|Asset\Listing|DataObject\Listing $list */
        $list = new $listClassName();

        if (method_exists($list, 'setUnpublished')) {
            $list->setUnpublished(true);
        }

        if (method_exists($list, 'setObjectTypes')) {
            $list->setObjectTypes([
                DataObject\AbstractObject::OBJECT_TYPE_OBJECT,
                DataObject\AbstractObject::OBJECT_TYPE_FOLDER,
                DataObject\AbstractObject::OBJECT_TYPE_VARIANT,
            ]);
        }

        return $list;
    }
}
