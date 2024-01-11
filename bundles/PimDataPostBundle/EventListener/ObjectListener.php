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

namespace PimDataPostBundle\EventListener;

use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject;

class ObjectListener
{
    /**
     * update B2C Category object's level value when creating any category
     *
     * @param DataObjectEvent $event
     */
    public function onPreAdd(DataObjectEvent $event)
    {
        $this->updateB2CCategoryLevel($event);
    }


    /**
     * update B2C Category object's level value when moving any category
     *
     * @param DataObjectEvent $event
     */
    public function onPreUpdate(DataObjectEvent $event)
    {
        $this->updateB2CCategoryLevel($event);
    }

    protected function updateB2CCategoryLevel(DataObjectEvent $event): void
    {
        $object = $event->getObject();
        if ($object instanceof DataObject\B2CCategory) {
            $level = $this->getRecursiveB2CCategoryLevel($object);
            $object->setLevel($level);
        }
    }

    protected function getRecursiveB2CCategoryLevel($object): int
    {
        static $level = 1;

        $parentID = $object->getParentID(); 
        $parentObject = DataObject::getById($parentID);

        if($parentObject)
        {
            if($parentObject->getType() == 'object' && $parentObject->getClassName() == 'B2CCategory')
            {
                return $parentObject->getLevel() + 1;
            }
            else{
                $this->getRecursiveB2CCategoryLevel($parentObject);
            }
        }

        return $level;
    }
}
