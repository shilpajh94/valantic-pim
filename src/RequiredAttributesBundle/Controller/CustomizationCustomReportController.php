<?php

namespace RequiredAttributesBundle\Controller;

use Pimcore\Model\Tool\CustomReport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/custom-report")
 */
class CustomizationCustomReportController extends \Pimcore\Bundle\AdminBundle\Controller\Reports\CustomReportController
{
    /**
     * @Route("/data", methods={"GET", "POST"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function dataAction(Request $request)
    {
        $this->checkPermission('reports');

        $offset = $request->get('start', 0);
        $limit = $request->get('limit', 40);
        $sortingSettings = \Pimcore\Bundle\AdminBundle\Helper\QueryParams::extractSortingSettings(array_merge($request->request->all(), $request->query->all()));
        $sort = null;
        $dir = null;
        if ($sortingSettings['orderKey']) {
            $sort = $sortingSettings['orderKey'];
            $dir = $sortingSettings['order'];
        }

        $filters = ($request->get('filter') ? json_decode($request->get('filter'), true) : null);

        $drillDownFilters = $request->get('drillDownFilters', null);

        $config = CustomReport\Config::getByName($request->get('name'));
        $configuration = $config->getDataSourceConfig();

        $adapter = CustomReport\Config::getAdapter($configuration, $config);

        $result = $adapter->getData($filters, $sort, $dir, $offset, $limit, null, $drillDownFilters);
        
        if($config->name == 'DataCompletenessEmptyAttributes'){
            $itemsPerPage = (int)$limit;

            for($i =0; $i<= $itemsPerPage; $i++){
                $result['data'][$i]['Empty Fields'] = preg_replace('/[0-9]+\\)/', '|', $result['data'][0]['Empty Fields']);
            }    
        }
        return $this->adminJson([
            'success' => true,
            'data' => $result['data'],
            'total' => $result['total']
        ]);
    }
}