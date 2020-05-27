<?php

namespace CatalogBundle\Controller;

use Pimcore\Db;
use Pimcore\Model\DataObject;
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

        // $entries = new DataObject\Product\Listing();
        // $entries->setCondition("brandName LIKE ?", "%X-LIFE XR16SC%");
        // $entries->load();

        // $objectPlant = DataObject\Product::getBrandName('X-LIFE XR16SC');
        // p_r($entries);
        // die;

        $query = "SELECT `o_1`.`industryStandard` AS `PartNumber`, `o_1`.`articleNumber` AS `SAPNumber`, `hs_1`.`hoseIdNominalId` AS `hoseIdNominalId`, `hs_1`.`hoseIdMM`, `hs_1`.`hoseOdmm`, `hs_1`.`workingPressurePSI`, `hs_1`.`workingPressureMPA`, `hs_1`.`minBurstPressurePSI`, `hs_1`.`minBurstPressurempa`, `hs_1`.`BendRadiusIN`, `hs_1`.`BendRadiusMM`, `hs_1`.`grossWeight`, `hs_1`.`fittingFamily` FROM `object_brick_query_HoseBase_1` AS `hb_1` INNER JOIN `object_1` AS `o_1` ON `hb_1`.`o_id`  = `o_1`.`oo_id` INNER JOIN `object_brick_query_HoseFert_1` AS `hf_1` ON `hf_1`.`o_id`  = `o_1`.`oo_id` INNER JOIN `object_brick_query_HoseSkeleton_1` AS `hs_1` ON `hs_1`.`o_id`  = `o_1`.`oo_id` WHERE `hb_1`.`brandName` LIKE '%X-LIFE XR16SC%'";
        $objectMaterial = $this->db->fetchAll($query);

        // $query = "SELECT `o_1`.`industryStandard` AS `PartNumber`, `o_1`.`articleNumber` AS `SAPNumber`,`hb_1`.`brandName`, `hb_1`.`tubeMaterial`,`hb_1`.`Coupling`,`hb_1`.`Packaging`,`hb_1`.`coverMaterial`,`hb_1`.`hoseTemperatureRangeFAndC`,`hs_1`.`reinforcement`,`hb_1`.`safetyFactor`,`hs_1`.`hoseIdNominalId`, `hs_1`.`hoseIdMM`, `hs_1`.`hoseOdmm`, `hs_1`.`workingPressurePSI`, `hs_1`.`workingPressureMPA`, `hs_1`.`minBurstPressurePSI`, `hs_1`.`minBurstPressurempa`, `hs_1`.`BendRadiusIN`, `hs_1`.`BendRadiusMM`, `hs_1`.`grossWeight`, `hs_1`.`fittingFamily` FROM `object_brick_query_HoseBase_1` AS `hb_1` INNER JOIN `object_1` AS `o_1` ON `hb_1`.`o_id`  = `o_1`.`oo_id` INNER JOIN `object_brick_query_HoseFert_1` AS `hf_1` ON `hf_1`.`o_id`  = `o_1`.`oo_id` INNER JOIN `object_brick_query_HoseSkeleton_1` AS `hs_1` ON `hs_1`.`o_id`  = `o_1`.`oo_id` WHERE `hb_1`.`brandName` LIKE '%X-LIFE XR16SC%'";
        // $objectMaterial = $this->db->fetchAll($query);

        // foreach ($objectMaterial as $key => $value) {
        //     $entries = new DataObject\Product\Listing();
        //     $entries->setCondition("articleNumber LIKE ?", "%".$value['SAPNumber']."%");
        //     $entries->load();

        //     p_r($entries);
        //     die;
        //     // p_r($value['SAPNumber']);
        // }
            // print_r($objectMaterial);
            $fieldData = array_keys($objectMaterial[0]);
            $columnData = array();

            foreach ($fieldData as $key => $value) {
                $columnData[] = array('xtype'=>'gridcolumn','Text'=>$value,'header'=>$value, 'dataIndex'=> $value, 'flex' => 1);            
            }
        // die;
        
        $arr= array('brandData' => [], 'columnData'=>$columnData,'fieldData'=>$fieldData,'articlesData'=>$objectMaterial);
        echo json_encode($arr); die;
    }

    public function templateFittingPageStandardAction(Request $request)
    {

    }

    public function templateHoseLineTileTemplateAction(Request $request)
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
    public function inhTemplateHoseProductPageAction(Request $request)
    {

    }

    public function containerAction(Request $request)
    {

    }

    public function headerAction(Request $request)
    {
        return $this->render("CatalogBundle:Include:header.html.php", ["name1" => $request->get('name1')]);
        // $this->set('name1', 'sda');
        // $this->viewParameters->add([
        //     'name1' => $request->get('name1')
        // ]);
    }

    public function footerAction(Request $request)
    {

    }

}
