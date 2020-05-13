<?php

namespace CatalogBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    private $tableColumns;
    /**
     * @Route("/catalog")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from catalog');
    }
    
    /**
     * @Route("/catalog/get-available-headers")
     */
    public function getAvailableHeaders(Request $request) {

        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        $tableColumnsConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getCatalogTableColumnConfig();
        $this->tableColumns = $commonHelper->getParameter($tableColumnsConfig, 'tableColumns');

        $columns = array();
        if(!empty($this->tableColumns) && count($this->tableColumns)>0) {
            foreach($this->tableColumns as $key => $column) {
                $columns[] = array($key,$column);
            }
        }
        $arr= array('storeData' => $columns, 'completeData'=>$this->tableColumns);
        // $arr = array (
        //     'storeData' => array (
        //         0 => array ('StatisticalDimension', 'Statistical Dimension'),
        //         1 => array ('ServiceDescription', 'Service Description'),
        //         2 => array ('PR','PR'),
        //         3 => array ('GSI','GSI')
        //     )
        // );
        echo json_encode($arr); die;
    }

    public function template1Action(Request $request)
    {

    }

    public function template2Action(Request $request)
    {

    }

    public function hydTemplate1Action(Request $request)
    {

    }

    public function hydTemplate2Action(Request $request)
    {

    }

    public function hydTemplate3Action(Request $request)
    {

    }

    public function hydTemplate4Action(Request $request)
    {

    }

    public function hydTemplate5Action(Request $request)
    {

    }

    public function containerAction(Request $request)
    {

    }
}
