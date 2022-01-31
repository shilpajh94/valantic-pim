<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ProductBundle\Controller;

use Pimcore\Bundle\AdminBundle\Controller\Admin\UserController as ParentUserController;
use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use Pimcore\Bundle\AdminBundle\HttpFoundation\JsonResponse;
use Pimcore\Config;
use Pimcore\Controller\EventedControllerInterface;
use Pimcore\Logger;
use Pimcore\Model\DataObject;
use Pimcore\Model\Element;
use Pimcore\Model\User;
use Pimcore\Tool;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Description of UserController
 *
 */
/**
 * @Route("/admin/user")
 */
class UserController extends ParentUserController {
    
    /**
     * @Route("/tree-get-childs-by-id", methods={"GET"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function treeGetChildsByIdAction(Request $request)
    {
        $list = new User\Listing();
        $list->setCondition('parentId = ?', intval($request->get('node')));
        $list->setOrder('ASC');
        $list->setOrderKey('name');
        $list->load();

        $users = [];
        if (is_array($list->getUsers())) {
            foreach ($list->getUsers() as $user) {
                if ($user->getId() && $user->getName() != 'system') {
                    $users[] = $this->getTreeNodeConfig($user);
                }
            }
        }

        return $this->adminJson($users);
    }

    /**
     * @param User $user
     *
     * @return array
     */
    protected function getTreeNodeConfig($user)
    {
        $name = $user->getName();
        if (!($user instanceof \Pimcore\Model\User\Folder )) {
            $nameArray = [];
            if (!empty($user->getFirstname())) {
                $nameArray[] = $user->getFirstname();
            }
            if (!empty($user->getLastname())) {
                $nameArray[] = $user->getLastname();
            }
            if (!empty($nameArray) && count($nameArray)>0) {
                $name .= ' ('.implode(" ", $nameArray).')';
            }
        }
        $tmpUser = [
            'id' => $user->getId(),
            'text' => $name,
            'elementType' => 'user',
            'type' => $user->getType(),
            'qtipCfg' => [
                'title' => 'ID: ' . $user->getId()
            ]
        ];

        // set type specific settings
        if ($user instanceof User\Folder) {
            $tmpUser['leaf'] = false;
            $tmpUser['iconCls'] = 'pimcore_icon_folder';
            $tmpUser['expanded'] = true;
            $tmpUser['allowChildren'] = true;

            if ($user->hasChildren()) {
                $tmpUser['expanded'] = false;
            } else {
                $tmpUser['loaded'] = true;
            }
        } else {
            $tmpUser['leaf'] = true;
            $tmpUser['iconCls'] = 'pimcore_icon_user';
            if (!$user->getActive()) {
                $tmpUser['cls'] = ' pimcore_unpublished';
            }
            $tmpUser['allowChildren'] = false;
            $tmpUser['admin'] = $user->isAdmin();
        }

        return $tmpUser;
    }
}
