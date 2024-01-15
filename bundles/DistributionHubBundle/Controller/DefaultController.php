<?php

namespace DistributionHubBundle\Controller;

use DistributionHubBundle\Lib\Constants;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DistributionHubBundle\Lib\DHubLogger;

class DefaultController extends FrontendController
{

    /**
     * @Route("/admin/default/list_thumb")
     *
     * @param Request $request
     * @return type
     */
    public function listThumbnailAction(Request $request) {
        $data = array();

        // for contitech
        $items = Constants::S3_THUMBS_WITH_LAMBDA;
        foreach ($items as $item) {
            $tmp = ['id' => $item, 'name' => $item];
            $data[] = $tmp;
        }

        return $this->json(['success' => true, 'data' => $data]);
    }
}
