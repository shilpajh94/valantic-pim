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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ObjectListener
{
    private $requestStack;
    private $SFTable1Helper;
    private $B2bB2cAttributes;
    private $commonHelper;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
        $this->commonHelper = \Pimcore::getContainer()->get('app.common_helper');
        $this->SFTable1Helper = \Pimcore::getContainer()->get('pimDataPostBundle.SFTable1_helper');
        $this->B2bB2cAttributes = \Pimcore::getContainer()->get('app.config_provider_service')->getB2bB2cAtrributeConfig();
        
        // p_r("__construct");
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
            p_r("postAdd");
            die;
        }
    }

    /**
     * Listening to dataobject postUpdate event
     *
     * @param DataObjectEvent $event
     */
    public function preUpdate(DataObjectEvent $event)
    {
        $object = $event->getObject();
        // if($object->getType() !== 'folder' && $object->getB2CStoreFlag())
        if($object->getType() !== 'folder')
        {
            $update_type = 'relation';
            $operation_type = 'Delete';
            $relation_update_status = 0;
            $object_class_type = $object->getClassName();
            $B2CAttributes = $this->commonHelper->getParameter($this->B2bB2cAttributes, 'B2C');
            if(isset($B2CAttributes[$object_class_type]))
            {
                $relaventObjectAttributes = $B2CAttributes[$object_class_type];
                $relationAttribute = $relaventObjectAttributes['relationalAttr'];
                $updatedData = $this->getEditedDataFromRequest();

                if($updatedData)
                {
                    $objectId = $object->getId();
                    foreach ($updatedData as $updatedkey => $value) {
                        if(isset($relationAttribute[$updatedkey]))
                        {
                            $entryAvailable = $this->SFTable1Helper->checkAlreadyEntryExist($objectId, $updatedkey, 1);
                            if(!$entryAvailable)
                            {
                                $relational_attribute_id = $this->SFTable1Helper->getRelationalAttrId($objectId, $updatedkey);
                                $this->SFTable1Helper->insertRecrodIntoTable($objectId, $update_type, $updatedkey, $relational_attribute_id, $operation_type, $relation_update_status);
                            }
                        }
                    }
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
        // if($object->getType() !== 'folder' && $object->getB2CStoreFlag())
        if($object->getType() !== 'folder')
        {
            $update_type = 'object';
            $operation_type = 'Update';
            $relation_update_status = 1;
            $object_class_type = $object->getClassName();
            $B2CAttributes = $this->commonHelper->getParameter($this->B2bB2cAttributes, 'B2C');
            if(isset($B2CAttributes[$object_class_type]))
            {
                $relaventObjectAttributes = $B2CAttributes[$object_class_type];
                $relationAttribute = $relaventObjectAttributes['relationalAttr'];
                $normalAttribute = $relaventObjectAttributes['attr'];
                $updatedData = $this->getEditedDataFromRequest();

                $objectId = $object->getId();
                if($updatedData)
                {
                    foreach ($updatedData as $updatedkey => $value) {
                        if(isset($relationAttribute[$updatedkey]))
                        {
                            $entryAvailable = $this->SFTable1Helper->checkAlreadyEntryExist($objectId, $updatedkey, $relation_update_status);
                            if(!$entryAvailable)
                            {
                                $this->SFTable1Helper->setRelationalUpdateStatusFlag($objectId, $updatedkey, $relation_update_status);
                            }
                        }
                    }
                }

                if($updatedData)
                {
                    $needProcessRecord = false;
                    foreach ($updatedData as $updatedkey => $value) {
                        if(isset($normalAttribute[$updatedkey]))
                        {
                            $needProcessRecord = true;
                            break;
                        }
                    }

                    if($needProcessRecord)
                    {
                        $this->SFTable1Helper->insertRecrodIntoTable($objectId, $update_type, $relation_attr_name, $old_data, $operation_type, $relation_update_status);
                    }
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
            p_r("postDelete");
            die;
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
        // $requestStack = $this->requestStack;
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
