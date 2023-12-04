<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ProductBundle\Controller;


use ContitechCS\ProductBundle\Lib\Constants;
use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Description of RolesController
 *
 * @author rohitsrivastava
 */
/**
 * @Route("/admin/contitechcs/roles")
 */
class RolesController extends AdminController {
    
    /**
     * This function will return configuration for object tree folders and their allowed class mapping
     *
     * @Route("/get-folder-class-map")
     *
     * @param Request $request
     *
     * @return json folderClassMappingArray
     */
    public function getFolderClassMapAction(Request $request) {
        $currentUser = \Pimcore\Tool\Admin::getCurrentUser();
        $currentUser->getId();
        
        return $this->json(['mapping' => Constants::CONTITECHCS_FOLDER_CLASS_MAPPING, 'success' => true]);
    }
}
