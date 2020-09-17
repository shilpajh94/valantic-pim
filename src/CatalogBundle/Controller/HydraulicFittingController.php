<?php

namespace CatalogBundle\Controller;

use Pimcore\Model\Asset;
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
        // $attrImages = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['attributeImages'];
        $common = \Pimcore::getContainer()->get('app.common_helper');
        $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();
        $attributeImages = $common->getParameter($attributeImagesConfig, 'attributeImages');
        $CatalogImagesHYDFooter = $common->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');
        if ($this->getDocumentTag('relation', 'fitting-straight')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->getDocumentTag('relation', 'fitting-straight')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);

            $footerBgColor = $obj->getColor();

            /**
             * Get Catalog defined language
            */
            $lang = $common->getCatalogLanguage($obj);
            // $lang = 'fr_CA';
            $this->get('translator')->setLocale($lang);


            $data = array();
            $headerData = json_decode($obj->getHeaderData(), true);
            $headerKeys = array_keys($headerData);
            $headerKeysIndex = array_flip($headerKeys);

            $columnsData = $obj->getColumns();

            $iconRequired = 'YES';
            $subHeaderRequired = 'NO';
            $columnsData = json_decode($columnsData, true);

            // $headers = (array) json_decode($obj->getHeaderData());
            // $headerKeys = array_keys($headers);
            // $columns = (array) json_decode($obj->getColumns());
            // foreach($columns as $key => $cols) {
            //     $columns[$key]->columnLabel = $this->get('translator')->trans($key);
            // }

            $productsData = $obj->getProductsData();
            $brandsData = array();

            // p_r($headerKeysIndex);
            // p_r($productsData);
            if($productsData)
            {
                
                foreach ($productsData as $key => $item) 
                {
                    // $brandName = $item[$headerKeysIndex['brandName']][0];
                    $shortDescription = $item[$headerKeysIndex['shortDescription']];

                    if(!empty($shortDescription))
                    {
                        $uniqueId = md5($shortDescription . $brandName);
                        $brandsData[$uniqueId][] = $item;
                    }
                    unset($item);
                }

                unset($productsData);
            }

            $newBrandArray = array();
            if($brandsData)
            {
                foreach ($brandsData as $key => $brand) 
                {

                    $reinforcementArr = array();
                    $tubeMaterialArr = array();
                    $coverMaterialArr = array();
                    
                    $shortDescription = '';
                    $BrandShortText1 = '';
                    $LeftPrintCatalogImageObj = '';
                    $RightPrintCatalogImageObj = '';
                    $brandName = '';

                    foreach ($brand as $bkey => $bvalue) {
                        
                        $FittingTableName = $bvalue[$headerKeysIndex['FittingTableName']];
                        if($FittingTableName)
                        {
                            if(!$brandName && $bvalue[$headerKeysIndex['brandName']][0]) {
                                $brandName = $bvalue[$headerKeysIndex['brandName']][0];
                            }

                            if(!$HydFittingFamily && $bvalue[$headerKeysIndex['HydFittingFamily']][0]) {
                                $HydFittingFamily = $bvalue[$headerKeysIndex['HydFittingFamily']][0];
                            }

                            if(!$shortDescription && $bvalue[$headerKeysIndex['shortDescription']]) {
                                $shortDescription = $bvalue[$headerKeysIndex['shortDescription']];
                            }

                            if(!$BrandShortText1 && $bvalue[$headerKeysIndex['BrandShortText1']]) {
                                $BrandShortText1 = $bvalue[$headerKeysIndex['BrandShortText1']];
                            }

                            if(!$LeftPrintCatalogImageObj && $bvalue[$headerKeysIndex['LeftPrintCatalogImage']]) {
                                if (Asset\Service::pathExists($bvalue[$headerKeysIndex['LeftPrintCatalogImage']])) 
                                {
                                    $LeftPrintCatalogImage = \Pimcore\Model\Asset::getByPath($bvalue[$headerKeysIndex['LeftPrintCatalogImage']]);
                                    if(file_exists($LeftPrintCatalogImage->getFileSystemPath()))
                                    {
                                        $LeftPrintCatalogImageObj = $LeftPrintCatalogImage;
                                    }
                                    unset($LeftPrintCatalogImage);
                                }
                            }

                            if(!$RightPrintCatalogImageObj && $bvalue[$headerKeysIndex['RightPrintCatalogImage']]) {
                                if (Asset\Service::pathExists($bvalue[$headerKeysIndex['RightPrintCatalogImage']])) 
                                {
                                    $RightPrintCatalogImage = \Pimcore\Model\Asset::getByPath($bvalue[$headerKeysIndex['RightPrintCatalogImage']]);
                                    if(file_exists($RightPrintCatalogImage->getFileSystemPath()))
                                    {
                                        $RightPrintCatalogImageObj = $RightPrintCatalogImage;
                                    }
                                    unset($RightPrintCatalogImage);
                                }
                            }

                            if(isset($bvalue[$headerKeysIndex['HoseID1InFract']]) && !empty($bvalue[$headerKeysIndex['HoseID1InFract']])) {
                                $hoseID = $common->fractionToDecimal($bvalue[$headerKeysIndex['HoseID1InFract']]);
                            } else {
                                $hoseID = 0;
                            }
                        
                            $FittingTableKeys = $fittingTableColumn[$FittingTableName]['columns'];
                            // p_r($FittingTableKeys);
                            $columnsDataWithImages = array();
                            $articlesData = array();
                            $subHeaderRequired = '';
                            foreach ($FittingTableKeys as $ckey => $cvalue) {

                                foreach ($columnsData as $dkey => $value) {

                                    if($cvalue == $dkey)
                                    {
                                        $groupColumnName = $value['columnName'];
                                        if(isset($value['groupName']) && $value['groupName'])
                                        {
                                            $groupColumnName = $value['groupName'];
                                            $subHeaderRequired = 'YES';
                                        }
                        
                                        $columnsDataWithImages[$groupColumnName][$dkey]['groupName'] = $value['groupName'];
                                        $columnsDataWithImages[$groupColumnName][$dkey]['unitName'] = $this->get('translator')->trans($value['unitName']);
                                        $columnsDataWithImages[$groupColumnName][$dkey]['columnName'] = $value['columnName'];
                                        $columnsDataWithImages[$groupColumnName][$dkey]['columnLabel'] = $this->get('translator')->trans($groupColumnName);
                                        
                                        if (Asset\Service::pathExists($attributeImages[$value['columnName']])) 
                                            $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $attributeImages[$value['columnName']];

                                        
                                    }
                                }
                            }

                            
                            // $data[$uniqueId][$row['FittingTableName']]['data']['HoseID1InDec'][strval($hoseID)][] = $row;                            
                            // ksort($data[$uniqueId][$row['FittingTableName']]['data']['HoseID1InDec'],SORT_NUMERIC);
                            

                            // Getting order of the keys
                            $orderKeys = array();
                            foreach ($columnsDataWithImages as $skey => $svalue) {
                                foreach ($svalue as $vkey => $vvalue) {
                                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                                }
                            }
                                
                            foreach ($orderKeys as $ckey => $cvalue) {
                                    $articlesData[] = $bvalue[$headerKeysIndex[$ckey]];
                            }
                            
                            $newBrandArray[$key][$FittingTableName]['articleData']['articles'][strval($hoseID)][] = $articlesData;
                            ksort($newBrandArray[$key][$FittingTableName]['articleData']['articles'],SORT_NUMERIC);
                            $newBrandArray[$key][$FittingTableName]['articleData']['subHeaderRequired'] = $subHeaderRequired;
                            $newBrandArray[$key][$FittingTableName]['articleData']['columnsDataWithImages'] = $columnsDataWithImages;
                            $newBrandArray[$key][$FittingTableName]['brandData']['brandName'] = $brandName;
                            $newBrandArray[$key][$FittingTableName]['brandData']['HydFittingFamily'] = $HydFittingFamily;
                            $newBrandArray[$key][$FittingTableName]['brandData']['shortDescription'] = $shortDescription;
                            $newBrandArray[$key][$FittingTableName]['brandData']['BrandShortText1'] = $BrandShortText1;
                            $newBrandArray[$key][$FittingTableName]['brandData']['LeftPrintCatalogImageObj'] = $LeftPrintCatalogImageObj;
                            $newBrandArray[$key][$FittingTableName]['brandData']['RightPrintCatalogImageObj'] = $RightPrintCatalogImageObj;
                            unset($hoseID);
                        }
                    }
                        
                    

                    unset($brandsData[$key]);
                }
            }

            // p_r($newBrandArray);
            // die;
            // if (is_array($obj->getProductsData()) && !empty($obj->getProductsData())) {
            //     foreach ($obj->getProductsData() as $k => $row) {
            //         $productsData[] = array_combine($headerKeys, $row);
            //     }
            //     foreach ($productsData as $k => $row) {
            //         if (((isset($row['shortDescription']) && isset($row['brandName'])) && (!empty($row['shortDescription']) || !empty($row['brandName'])))) {
            //             $brandName = is_array($row['brandName']) && isset($row['brandName'][0]) && !empty($row['brandName'][0]) ? $row['brandName'][0] : "";
            //             $uniqueId = md5($row['shortDescription'] . $brandName);
            //             if (!isset($data[$uniqueId])) {
            //                 $data[$uniqueId] = array();
            //             }
            //             $leftImage = null;
            //             $rightImage = null;
            //             if (isset($row['FittingTableName']) && !empty($row['FittingTableName'])) {
            //                 $prodObj = \Pimcore\Model\DataObject\Product::getById($row['id']);
            //                 $leftImage = $prodObj->getLeftPrintCatalogImage();
            //                 $rightImage = $prodObj->getRightPrintCatalogImage();
                            
            //                 if(!isset($data[$uniqueId][$row['FittingTableName']]['leftImage'])) {
            //                     $data[$uniqueId][$row['FittingTableName']]['leftImage'] = '';
            //                 }
            //                 if(!isset($data[$uniqueId][$row['FittingTableName']]['rightImage'])) {
            //                     $data[$uniqueId][$row['FittingTableName']]['rightImage'] = '';
            //                 }
            //                 if(!isset($data[$uniqueId][$row['FittingTableName']]['shortDescription'])) {
            //                     $data[$uniqueId][$row['FittingTableName']]['shortDescription'] = '';
            //                 }
            //                 if(!isset($data[$uniqueId][$row['FittingTableName']]['BrandShortText1'])) {
            //                     $data[$uniqueId][$row['FittingTableName']]['BrandShortText1'] = '';
            //                 }
            //                 if(!isset($data[$uniqueId][$row['FittingTableName']]['brandName'])) {
            //                     $data[$uniqueId][$row['FittingTableName']]['brandName'] = '';
            //                 }
                            
            //                 if(empty($data[$uniqueId][$row['FittingTableName']]['shortDescription'])) {
            //                     $data[$uniqueId][$row['FittingTableName']]['shortDescription'] = $row['shortDescription'];
            //                 }
            //                 if(empty($data[$uniqueId][$row['FittingTableName']]['BrandShortText1'])) {
            //                     $data[$uniqueId][$row['FittingTableName']]['BrandShortText1'] = $row['BrandShortText1'];
            //                 }
            //                 if(empty($data[$uniqueId][$row['FittingTableName']]['brandName'])) {
            //                     $data[$uniqueId][$row['FittingTableName']]['brandName'] = $brandName;
            //                 }
            //                 if(empty($data[$uniqueId][$row['FittingTableName']]['leftImage'])) {
            //                     $data[$uniqueId][$row['FittingTableName']]['leftImage'] = $leftImage;
            //                 }
            //                 if(empty($data[$uniqueId][$row['FittingTableName']]['rightImage'])) {
            //                     $data[$uniqueId][$row['FittingTableName']]['rightImage'] = $rightImage;
            //                 }
            //                 if(isset($row['HydFittingFamily']) && is_array($row['HydFittingFamily']) && !empty($row['HydFittingFamily'])) {
            //                     if(!isset($data[$uniqueId][$row['FittingTableName']]['HydFittingFamily']) && empty($data[$uniqueId][$row['FittingTableName']]['HydFittingFamily'])) {
            //                         $data[$uniqueId][$row['FittingTableName']]['HydFittingFamily'] = $row['HydFittingFamily'][0];
            //                     }
            //                 }
                            
                            
            //                 if(isset($row['HoseID1InFract']) && !empty($row['HoseID1InFract'])) {
            //                     $hoseID = $common->fractionToDecimal($row['HoseID1InFract']);
            //                 } else {
            //                     $hoseID = 0;
            //                 }
            //                 $data[$uniqueId][$row['FittingTableName']]['data']['HoseID1InDec'][strval($hoseID)][] = $row;                            
            //                 ksort($data[$uniqueId][$row['FittingTableName']]['data']['HoseID1InDec'],SORT_NUMERIC);
            //                 unset($hoseID);
            //             }
            //             unset($brandName);
            //         }
            //     }
            // }
            // p_r($data);
            // die;
            $this->view['iconRequired'] = $iconRequired;
            $this->view['brandsData'] = $newBrandArray;
            $this->view['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
            $this->view['footer_logo_src'] = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange'];
            // $this->view['iconRequired'] = $iconRequired;
            // $this->view['iconRequired'] = $iconRequired;
            // $this->view['info'] = array(
            //     'iconRequired' => $iconRequired,
            //     'brandsData' => $newBrandArray,
            //     // 'fittingTableColumn' => $fittingTableColumn,
            //     // 'dataTableColumn' => $columns,
            //     // 'data' => $data,
            //     // 'activeClassColName' => 'HoseID1InFract',
            //     // 'attrImages' => $attrImages,
            //     'footer_class' => (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'',
            //     'footer_logo_src' => (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange']
            // );
        }
    }
}
