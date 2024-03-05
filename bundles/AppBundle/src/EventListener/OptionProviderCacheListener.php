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
use Symfony\Component\DependencyInjection\ContainerInterface;

class OptionProviderCacheListener
{
    private $optionProvider;
    private $commonHelper;
    private $optionProviderClasses;
    private $postAddNotAllowClasses;
    private $container;

    public function __construct(OptionProviderCacheService $optionProvider, ContainerInterface $container)
    {
        $this->container = $container;
        $this->optionProvider = $optionProvider;
        $this->commonHelper = $this->container->get('app.common_helper');
        $optionProviderCacheConfig = $this->container->get('app.config_provider_service')->getOptionProviderCacheConfig();
        $this->optionProviderClasses = $this->commonHelper->getParameter($optionProviderCacheConfig, 'optionProviderClasses');
        $this->postAddNotAllowClasses = $this->commonHelper->getParameter($optionProviderCacheConfig, 'postAddNotAllowClasses');
    }

    /**
     * Listening to dataobject postAdd event
     * @param DataObjectEvent $event
     */
    public function postAdd(DataObjectEvent $event)
    {
        $object = $event->getObject();
        if($object->getType() !== 'folder')
        {
            $className = $object->getClassName();
            $isPublished = $object->getPublished();

            if(in_array($className, $this->optionProviderClasses))
            {
                if($className == 'MultiselectMaster'){
                    
                    $masterType = $object->getMasterType();
                    
                    if($masterType)
                    {
                        if($isPublished)
                            $this->optionProvider->createUpdateOptionProviderMapCache($masterType, $object->getId(), $object->getName());
                        else
                            $this->optionProvider->clearOptionProviderMapCache($masterType, $object->getId());

                    }
                
                }else if($className == 'Applications'){
                    
                    $applicationType = $object->getApplicationType();
                    $className = $className.'~'.$applicationType;
                    
                    if($applicationType)
                    {
                        if($isPublished)
                            $this->optionProvider->createUpdateOptionProviderMapCache($className, $object->getId(), $object->getName());
                        else
                            $this->optionProvider->clearOptionProviderMapCache($className, $object->getId());
                    }
                
                }else{

                    if($isPublished)
                        $this->optionProvider->createUpdateOptionProviderMapCache($className, $object->getId(), $object->getName());
                    else
                        $this->optionProvider->clearOptionProviderMapCache($className, $object->getId());
                        
                }
            }
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
        if($object->getType() !== 'folder')
        {
            $className = $object->getClassName();
            $isPublished = $object->getPublished();

            if(in_array($className, $this->optionProviderClasses))
            {
                if($className == 'MultiselectMaster'){
                    
                    $masterType = $object->getMasterType();
                    
                    if($masterType)
                    {
                        if($isPublished)
                            $this->optionProvider->createUpdateOptionProviderMapCache($masterType, $object->getId(), $object->getName());
                        else
                            $this->optionProvider->clearOptionProviderMapCache($masterType, $object->getId());

                    }
                
                }else if($className == 'Applications'){
                    
                    $applicationType = $object->getApplicationType();
                    $className = $className.'~'.$applicationType;
                    
                    if($applicationType)
                    {
                        if($isPublished)
                            $this->optionProvider->createUpdateOptionProviderMapCache($className, $object->getId(), $object->getName());
                        else
                            $this->optionProvider->clearOptionProviderMapCache($className, $object->getId());
                    }
                
                }else{

                    if($isPublished && $className != 'Product')
                        $this->optionProvider->createUpdateOptionProviderMapCache($className, $object->getId(), $object->getName());
                    else
                        $this->optionProvider->clearOptionProviderMapCache($className, $object->getId());
                        
                }
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
        if($object->getType() !== 'folder')
        {
            $className = $object->getClassName();

            if(in_array($className, $this->optionProviderClasses))
            {
                if($className == 'MultiselectMaster')
                    $className = $object->getMasterType();
                
                if($className == 'Applications')
                    $className = $className.'~'. $object->getApplicationType();

                $this->optionProvider->clearOptionProviderMapCache($className, $object->getId());
            }
        }
    }
}
