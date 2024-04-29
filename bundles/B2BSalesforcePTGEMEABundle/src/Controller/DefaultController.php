<?php

namespace B2BSalesforcePTGEMEABundle\Controller;

use Pimcore\Model\DataObject;
use Exception;
use Pimcore\Controller\UserAwareController;
use Pimcore\Tool\Admin;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use B2BSalesforcePTGEMEABundle\PTGEUB2BConstants;

/**
 * @Route("/admin/b2bsalesforceptgemea")
 */

class DefaultController extends UserAwareController
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from b2b_salesforce_ptg_eu');
    }

}
