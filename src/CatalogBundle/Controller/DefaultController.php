<?php

namespace CatalogBundle\Controller;

use Pimcore\Db;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    private $tableColumns;
    private $db;

    public function __construct()
    {
        $this->db = Db::get();
        /* Initilize monitoring item and set the number of steps will take to complete the task */
    }

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

    /**
     * @Route("/catalog/get-table-data")
     */
    public function getTableData(Request $request) {

        // $commonHelper = \Pimcore::getContainer()->get('app.common_helper');

        // $tableColumnsConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getCatalogTableColumnConfig();
        // $this->tableColumns = $commonHelper->getParameter($tableColumnsConfig, 'tableColumns');

        // $columns = array();
        // if(!empty($this->tableColumns) && count($this->tableColumns)>0) {
        //     foreach($this->tableColumns as $key => $column) {
        //         $columns[] = array($key,$column);
        //     }
        // }
        // $arr= array('storeData' => $columns, 'completeData'=>$this->tableColumns);

        $query = "SELECT `o_1`.`industryStandard` AS `PartNumber`, `o_1`.`articleNumber` AS `SAPNumber`, `hs_1`.`hoseIdNominalId` AS ``, `hs_1`.`hoseIdMM`, `hs_1`.`hoseOdmm`, `hs_1`.`workingPressurePSI`, `hs_1`.`workingPressureMPA`, `hs_1`.`minBurstPressurePSI`, `hs_1`.`minBurstPressurempa`, `hs_1`.`BendRadiusIN`, `hs_1`.`BendRadiusMM`, `hs_1`.`grossWeight`, `hs_1`.`fittingFamily` FROM `object_brick_query_HoseBase_1` AS `hb_1` INNER JOIN `object_1` AS `o_1` ON `hb_1`.`o_id`  = `o_1`.`oo_id` INNER JOIN `object_brick_query_HoseFert_1` AS `hf_1` ON `hf_1`.`o_id`  = `o_1`.`oo_id` INNER JOIN `object_brick_query_HoseSkeleton_1` AS `hs_1` ON `hs_1`.`o_id`  = `o_1`.`oo_id` WHERE `hb_1`.`brandName` LIKE '%X-LIFE XR16SC%'";
        $objectMaterial = $this->db->fetchAll($query);
        
        // foreach ($objectMaterial as $material) {
        //     $this->monitoringItem->getLogger()->info("Material: ".$MaterialKey." found");
        //     return $material['oo_id'];
        // }

        // $arr = array (
        //     'storeData' => array (
        //         0 => array ('StatisticalDimension', 'Statistical Dimension'),
        //         1 => array ('ServiceDescription', 'Service Description'),
        //         2 => array ('PR','PR'),
        //         3 => array ('GSI','GSI')
        //     )
        // );
        $arr= array('brandData' => [], 'articlesData'=>$objectMaterial);
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
    public function inhHydHoseTemplateAction(Request $request)
    {

    }

    public function containerAction(Request $request)
    {

    }
}
