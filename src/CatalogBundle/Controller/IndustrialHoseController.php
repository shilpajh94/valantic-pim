<?php

namespace CatalogBundle\Controller;

use Pimcore\Db;
use Pimcore\Model\DataObject;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndustrialHoseController extends FrontendController
{

    private $tableColumns;
    private $db;

    public function __construct()
    {
        $this->db = Db::get();
    }

    public function inhPrintCatalogAction(Request $request)
    {
        $inhSectionPageConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getINHSectionPageConfig()['parameters'];
        $attrImages = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['attributeImages'];
        if ($this->getDocumentTag('relation', 'inh-printcatalog')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->getDocumentTag('relation', 'inh-printcatalog')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);
            $data = array();
            $headers = (array) json_decode($obj->getHeaderData());
            $headerKeys = array_keys($headers);
            $columns = (array) json_decode($obj->getColumns());

            $productsData = array();
            $brands = array(
                0=>1645,
                1646,1645,1647,1648,1649,1649,1650,1650,1651,1652,1645,1645,1646
            );
            if (is_array($obj->getProductsData()) && !empty($obj->getProductsData())) {
                foreach ($obj->getProductsData() as $k => $row) {
                    $productsData[] = array_combine($headerKeys, $row);
                }
                $i = 0;
                foreach ($productsData as $k => $row) {
                    $obj = \Pimcore\Model\DataObject\Product::getById($row['id']);
                    $obj->setBrandName(strval([$brands[$i]]));
                    $obj->save();
                    $i++;
                    if (((isset($row['shortDescription']) && isset($row['BrandShortText1'])) && (!empty($row['shortDescription']) || !empty($row['BrandShortText1'])))) {
                        $uniqueId = md5($row['shortDescription'] . $row['BrandShortText1']);
                        if (!isset($data[$uniqueId])) {
                            $data[$uniqueId] = array();
                        }
                        $leftImage = null;
                        if (isset($row['FittingTableName']) && !empty($row['FittingTableName'])) {
                            $prodObj = \Pimcore\Model\DataObject\Product::getById($row['id']);
                            $leftImage = $prodObj->getLeftPrintCatalogImage();
                            $rightImage = $prodObj->getRightPrintCatalogImage();
                            $data[$uniqueId][$row['FittingTableName']]['shortDescription'] = !isset($data[$uniqueId][$row['FittingTableName']]['shortDescription']) && !empty($data[$uniqueId][$row['FittingTableName']]['shortDescription']) ? $data[$uniqueId][$row['FittingTableName']]['shortDescription'] : $row['shortDescription'];
                            $data[$uniqueId][$row['FittingTableName']]['BrandShortText1'] = !isset($data[$uniqueId][$row['FittingTableName']]['BrandShortText1']) && !empty($data[$uniqueId][$row['FittingTableName']]['BrandShortText1']) ? $data[$uniqueId][$row['FittingTableName']]['BrandShortText1'] : $row['BrandShortText1'];
                            $data[$uniqueId][$row['FittingTableName']]['leftImage'] = !isset($data[$uniqueId][$row['FittingTableName']]['leftImage']) && !empty($data[$uniqueId][$row['FittingTableName']]['leftImage']) ? $data[$uniqueId][$row['FittingTableName']]['leftImage'] : $leftImage;
                            $data[$uniqueId][$row['FittingTableName']]['rightImage'] = !isset($data[$uniqueId][$row['FittingTableName']]['rightImage']) && !empty($data[$uniqueId][$row['FittingTableName']]['rightImage']) ? $data[$uniqueId][$row['FittingTableName']]['rightImage'] : $rightImage;

                            if (isset($row['HoseID1InDec'])) {
                                $data[$uniqueId][$row['FittingTableName']]['data']['HoseID1InDec'][strval($row['HoseID1InDec'])][] = $row;
                                ksort($data[$uniqueId][$row['FittingTableName']]['data']['HoseID1InDec'], SORT_NUMERIC);
                            }
                        }
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
