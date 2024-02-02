<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace IFSEU\ProductBundle\Controller;


use Pimcore\Bundle\AdminBundle\HttpFoundation\JsonResponse;
use Pimcore\Event\AdminEvents;
use Pimcore\Model\DataObject;
use IFSEU\ProductBundle\Model\DataObject\Service as DataObjectService;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * @Route("/admin/class")
 */
class ClassController extends \Pimcore\Bundle\AdminBundle\Controller\Admin\DataObject\ClassController {
    
    /**
     * @Route("/objectbrick-tree", methods={"GET", "POST"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    // public function objectbrickTreeAction(Request $request,EventDispatcherInterface $eventDispatcher)
    // {
    //     $list = new DataObject\Objectbrick\Definition\Listing();
    //     $list = $list->load();

    //     $forObjectEditor = $request->get('forObjectEditor');

    //     $layoutDefinitions = [];
    //     $groups = [];
    //     $definitions = [];
    //     $fieldname = null;
    //     $className = null;

    //     $object = DataObject\AbstractObject::getById($request->get('object_id'));

    //     if ($request->query->has('class_id') && $request->query->has('field_name')) {
    //         $classId = $request->get('class_id');
    //         $fieldname = $request->get('field_name');
    //         $classDefinition = DataObject\ClassDefinition::getById($classId);
    //         $className = $classDefinition->getName();
    //     }

    //     /** @var DataObject\Objectbrick\Definition $item */
    //     foreach ($list as $item) {
    //         if ($request->query->has('class_id') && $request->query->has('field_name')) {
    //             $keep = false;
    //             $clsDefs = $item->getClassDefinitions();
    //             if (!empty($clsDefs)) {
    //                 foreach ($clsDefs as $cd) {
    //                     if ($cd['classname'] == $className && $cd['fieldname'] == $fieldname) {
    //                         $keep = true;
    //                         continue;
    //                     }
    //                 }
    //             }
    //             if (!$keep) {
    //                 continue;
    //             }
    //         }

    //         if ($item->getGroup()) {
    //             if (!isset($groups[$item->getGroup()])) {
    //                 $groups[$item->getGroup()] = [
    //                     'id' => 'group_' . $item->getKey(),
    //                     'text' => $item->getGroup(),
    //                     'expandable' => true,
    //                     'leaf' => false,
    //                     'allowChildren' => true,
    //                     'iconCls' => 'pimcore_icon_folder',
    //                     'group' => $item->getGroup(),
    //                     'children' => []
    //                 ];
    //             }
    //             if ($forObjectEditor) {
    //                 $itemLayoutDefinitions = $item->getLayoutDefinitions();
    //                 DataObjectService::enrichLayoutDefinition($itemLayoutDefinitions, $object);

    //                 $layoutDefinitions[$item->getKey()] = $itemLayoutDefinitions;
    //             }
    //             $groups[$item->getGroup()]['children'][] =
    //                 [
    //                     'id' => $item->getKey(),
    //                     'text' => $item->getKey(),
    //                     'title' => $item->getTitle(),
    //                     'key' => $item->getKey(),
    //                     'leaf' => true,
    //                     'iconCls' => 'pimcore_icon_objectbricks'
    //                 ];
    //         } else {
    //             if ($forObjectEditor) {
    //                 $layout = $item->getLayoutDefinitions();

    //                 $currentLayoutId = $request->get('layoutId', null);

    //                 $user = $this->getAdminUser();
    //                 if ($currentLayoutId == -1 && $user->isAdmin()) {
    //                     DataObject\Service::createSuperLayout($layout);
    //                     $objectData['layout'] = $layout;
    //                 }

    //                 $context = [
    //                     'containerType' => 'objectbrick',
    //                     'containerKey' => $item->getKey(),
    //                     'outerFieldname' => $request->get('field_name')
    //                 ];

    //                 DataObjectService::enrichLayoutDefinition($layout, $object, $context);

    //                 $layoutDefinitions[$item->getKey()] = $layout;
    //             }
    //             $definitions[] = [
    //                 'id' => $item->getKey(),
    //                 'text' => $item->getKey(),
    //                 'title' => $item->getTitle(),
    //                 'key' => $item->getKey(),
    //                 'leaf' => true,
    //                 'iconCls' => 'pimcore_icon_objectbricks'
    //             ];
    //         }
    //     }

    //     foreach ($groups as $group) {
    //         $definitions[] = $group;
    //     }

    //     $event = new GenericEvent($this, [
    //         'list' => $definitions,
    //         'objectId' => $request->get('object_id')
    //     ]);
    //     \Pimcore::getEventDispatcher()->dispatch(AdminEvents::CLASS_OBJECTBRICK_LIST_PRE_SEND_DATA, $event);
    //     $definitions = $event->getArgument('list');

    //     if ($forObjectEditor) {
    //         return $this->adminJson(['objectbricks' => $definitions, 'layoutDefinitions' => $layoutDefinitions]);
    //     } else {
    //         return $this->adminJson($definitions);
    //     }
    // }
    
    // /**
    //  * @Route("/objectbrick-list", methods={"GET"})
    //  *
    //  * @param Request $request
    //  *
    //  * @return JsonResponse
    //  */
    // public function objectbrickListAction(Request $request,EventDispatcherInterface $eventDispatcher)
    // {
    //     $list = new DataObject\Objectbrick\Definition\Listing();
    //     $list = $list->load();

    //     if ($request->query->has('class_id') && $request->query->has('field_name')) {
    //         $filteredList = [];
    //         $classId = $request->get('class_id');
    //         $fieldname = $request->get('field_name');
    //         $classDefinition = DataObject\ClassDefinition::getById($classId);
    //         $className = $classDefinition->getName();

    //         foreach ($list as $type) {
    //             $clsDefs = $type->getClassDefinitions();
    //             if (!empty($clsDefs)) {
    //                 foreach ($clsDefs as $cd) {
    //                     if ($cd['classname'] == $className && $cd['fieldname'] == $fieldname) {
    //                         $filteredList[] = $type;
    //                         continue;
    //                     }
    //                 }
    //             }

    //             $layout = $type->getLayoutDefinitions();

    //             $currentLayoutId = $request->get('layoutId', null);

    //             $user = $this->getAdminUser();
    //             if ($currentLayoutId == -1 && $user->isAdmin()) {
    //                 DataObject\Service::createSuperLayout($layout);
    //                 $objectData['layout'] = $layout;
    //             }

    //             $context = [
    //                 'containerType' => 'objectbrick',
    //                 'containerKey' => $type->getKey(),
    //                 'outerFieldname' => $request->get('field_name')
    //             ];

    //             $object = DataObject\AbstractObject::getById($request->get('object_id'));

    //             DataObjectService::enrichLayoutDefinition($layout, $object, $context);
    //             $type->setLayoutDefinitions($layout);
    //         }

    //         $list = $filteredList;
    //     }

    //     $event = new GenericEvent($this, [
    //         'list' => $list,
    //         'objectId' => $request->get('object_id')
    //     ]);
    //     \Pimcore::getEventDispatcher()->dispatch(AdminEvents::CLASS_OBJECTBRICK_LIST_PRE_SEND_DATA, $event);
    //     $list = $event->getArgument('list');

    //     return $this->adminJson(['objectbricks' => $list]);
    // }
}
