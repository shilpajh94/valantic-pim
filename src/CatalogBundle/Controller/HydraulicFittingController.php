<?php

namespace CatalogBundle\Controller;

use Pimcore\Db;
use Pimcore\Model\DataObject;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HydraulicFittingController extends AbstractController
{

    private $tableColumns;
    private $db;

    public function __construct()
    {
        $this->db = Db::get();
        /* Initilize monitoring item and set the number of steps will take to complete the task */
    }

    /**
     * Hydraulic Fitting Template, It will load all fitting tables and render it's data accordingly
     * See getFittingTableConfig
     * For header icon see getAttributeImagesConfig
     */
    
    public function fittingPageAction(Request $request)
    {
        $fittingTableColumn = \Pimcore::getContainer()->get('app.config_provider_service')->getFittingTableConfig()['parameters'];
        $attrImages = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['attributeImages'];
        $common = \Pimcore::getContainer()->get('app.common_helper');
        if ($this->getDocumentTag('relation', 'fitting-straight')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->getDocumentTag('relation', 'fitting-straight')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);

            /**
             * Get Catalog defined language
            */
            $lang = $common->getCatalogLanguage($obj);
            // $lang = 'fr_CA';
            $this->get('translator')->setLocale($lang);


            $data = array();
            $headers = (array) json_decode($obj->getHeaderData());
            $headerKeys = array_keys($headers);
            $columns = (array) json_decode($obj->getColumns());
            foreach($columns as $key => $cols) {
                $columns[$key]->columnLabel = $this->get('translator')->trans($key);
            }
            $productsData = array();
            if (is_array($obj->getProductsData()) && !empty($obj->getProductsData())) {
                foreach ($obj->getProductsData() as $k => $row) {
                    $productsData[] = array_combine($headerKeys, $row);
                }
                foreach ($productsData as $k => $row) {
                    if (((isset($row['shortDescription']) && isset($row['brandName'])) && (!empty($row['shortDescription']) || !empty($row['brandName'])))) {
                        $brandName = is_array($row['brandName']) && isset($row['brandName'][0]) && !empty($row['brandName'][0]) ? $row['brandName'][0] : "";
                        $uniqueId = md5($row['shortDescription'] . $brandName);
                        if (!isset($data[$uniqueId])) {
                            $data[$uniqueId] = array();
                        }
                        $leftImage = null;
                        $rightImage = null;
                        if (isset($row['FittingTableName']) && !empty($row['FittingTableName'])) {
                            $prodObj = \Pimcore\Model\DataObject\Product::getById($row['id']);
                            $leftImage = $prodObj->getLeftPrintCatalogImage();
                            $rightImage = $prodObj->getRightPrintCatalogImage();
                            
                            if(!isset($data[$uniqueId][$row['FittingTableName']]['leftImage'])) {
                                $data[$uniqueId][$row['FittingTableName']]['leftImage'] = '';
                            }
                            if(!isset($data[$uniqueId][$row['FittingTableName']]['rightImage'])) {
                                $data[$uniqueId][$row['FittingTableName']]['rightImage'] = '';
                            }
                            if(!isset($data[$uniqueId][$row['FittingTableName']]['shortDescription'])) {
                                $data[$uniqueId][$row['FittingTableName']]['shortDescription'] = '';
                            }
                            if(!isset($data[$uniqueId][$row['FittingTableName']]['BrandShortText1'])) {
                                $data[$uniqueId][$row['FittingTableName']]['BrandShortText1'] = '';
                            }
                            if(!isset($data[$uniqueId][$row['FittingTableName']]['brandName'])) {
                                $data[$uniqueId][$row['FittingTableName']]['brandName'] = '';
                            }
                            
                            if(empty($data[$uniqueId][$row['FittingTableName']]['shortDescription'])) {
                                $data[$uniqueId][$row['FittingTableName']]['shortDescription'] = $row['shortDescription'];
                            }
                            if(empty($data[$uniqueId][$row['FittingTableName']]['BrandShortText1'])) {
                                $data[$uniqueId][$row['FittingTableName']]['BrandShortText1'] = $row['BrandShortText1'];
                            }
                            if(empty($data[$uniqueId][$row['FittingTableName']]['brandName'])) {
                                $data[$uniqueId][$row['FittingTableName']]['brandName'] = $brandName;
                            }
                            if(empty($data[$uniqueId][$row['FittingTableName']]['leftImage'])) {
                                $data[$uniqueId][$row['FittingTableName']]['leftImage'] = $leftImage;
                            }
                            if(empty($data[$uniqueId][$row['FittingTableName']]['rightImage'])) {
                                $data[$uniqueId][$row['FittingTableName']]['rightImage'] = $rightImage;
                            }
                            if(isset($row['HydFittingFamily']) && is_array($row['HydFittingFamily']) && !empty($row['HydFittingFamily'])) {
                                if(!isset($data[$uniqueId][$row['FittingTableName']]['HydFittingFamily']) && empty($data[$uniqueId][$row['FittingTableName']]['HydFittingFamily'])) {
                                    $data[$uniqueId][$row['FittingTableName']]['HydFittingFamily'] = $row['HydFittingFamily'][0];
                                }
                            }
                            
                            
                            if(isset($row['HoseID1InFract']) && !empty($row['HoseID1InFract'])) {
                                $hoseID = $common->fractionToDecimal($row['HoseID1InFract']);
                            } else {
                                $hoseID = 0;
                            }
                            $data[$uniqueId][$row['FittingTableName']]['data']['HoseID1InDec'][strval($hoseID)][] = $row;                            
                            ksort($data[$uniqueId][$row['FittingTableName']]['data']['HoseID1InDec'],SORT_NUMERIC);
                            unset($hoseID);
                        }
                        unset($brandName);
                    }
                }
            }
            
            $this->view['info'] = array(
                'fittingTableColumn' => $fittingTableColumn,
                'dataTableColumn' => $columns,
                'data' => $data,
                'activeClassColName' => 'HoseID1InFract',
                'attrImages' => $attrImages
            );
        }
    }
}
