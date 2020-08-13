<?php

namespace DistributionHubBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DistributionHubBundle\Lib\DHubLogger;

class DefaultController extends FrontendController {

    /**
     * @Route("/admin/default/list_thumb")
     * 
     * @param Request $request
     * @return type
     */
    public function listThumbnailAction(Request $request) {
        $data = array();
        
        $filterFunc = function ($dataRow){           
            return $dataRow['downloadable'];
        };
        
        $list = new \Pimcore\Model\Asset\Image\Thumbnail\Config\Listing();
        $list->setFilter($filterFunc);
        $items = $list->getThumbnails();
        foreach ($items as $item) {
            $tmp = ['id' => $item->getName(), 'name' => $item->getName()];
            $data[] = $tmp;
        }
        return $this->json(['success' => true, 'data' => $data]);
    }

}
