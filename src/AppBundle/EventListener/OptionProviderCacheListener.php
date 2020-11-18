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

use AppBundle\Services\OptionProviderCacheService;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject;

class OptionProviderCacheListener
{
    private $optionProvider;

    private $optionProviderClasses = ["Brand", "FittingFamily", "Features", "FittingEndFamilyType", "MultiselectMaster"];
    
    public function __construct(OptionProviderCacheService $optionProvider)
    {
        $this->optionProvider = $optionProvider;
    }

    /**
     * Listening to dataobject postAdd event
     * @param DataObjectEvent $event
     */
    public function postAdd(DataObjectEvent $event)
    {
        $object = $event->getObject();
        $className = $object->getClassName();

        if(in_array($className, $this->optionProviderClasses) && ($className != "MultiselectMaster"))
        {
            $this->optionProvider->createUpdateOptionProviderMapCache($className, $object->getId(), $object->getName());
        }
    }

    /**
     * Listening to dataobject postUpdate event
     *
     * @param DataObjectEvent $event
     */
    public function postUpdate(DataObjectEvent $event)
    {
        $object = $event->getObject();
        $className = $object->getClassName();

        if(in_array($className, $this->optionProviderClasses))
        {
            if($className == 'MultiselectMaster'){
                $masterType = $object->getMasterType();
                
                if($masterType)
                    $this->optionProvider->createUpdateOptionProviderMapCache($masterType, $object->getId(), $object->getName());
            }
            else{
                $this->optionProvider->createUpdateOptionProviderMapCache($className, $object->getId(), $object->getName());
            }
        }

    }

    /**
     * Listening to dataobject postDelete event
     *
     * @param DataObjectEvent $event
     */
    public function postDelete(DataObjectEvent $event)
    {
        $object = $event->getObject();
        $className = $object->getClassName();

        if(in_array($className, $this->optionProviderClasses))
        {
            if($className == 'MultiselectMaster')
                $className = $object->getMasterType();

            $this->optionProvider->clearOptionProviderMapCache($className, $object->getId());
        }
    }
}
