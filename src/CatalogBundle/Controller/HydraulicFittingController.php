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

            $columnsData['ElbowType']['columnName'] = 'ElbowType';
            $columnsData['ElbowType']['columnLabel'] = 'ElbowType';
            $headerKeysIndex['ElbowType'] = count($headerKeysIndex);
            
            $productsData = $obj->getProductsData();
            $nomenClatureList = $this->getNomenClatureList();

            $brandsData = array();

            if($productsData)
            {
                
                foreach ($productsData as $key => $item) 
                {
                    $brandName = $item[$headerKeysIndex['brandName']][0];
                    $BrandShortText1 = $item[$headerKeysIndex['BrandShortText1']];

                    if(!empty($brandName))
                    {
                        $uniqueId = md5($brandName);
                        $brandsData[$uniqueId][] = $item;
                    }
                    else if(!empty($BrandShortText1))
                    {
                        $uniqueId = md5($BrandShortText1);
                        $brandsData[$uniqueId][] = $item;
                    }
                    unset($item);
                }

                unset($productsData);
            }

            $newBrandArray = array();
            $HydFittingFamilyArr = array();
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

                            if($bvalue[$headerKeysIndex['HydFittingFamily']][0]) {
                                $HydFittingFamilyArr[$bvalue[$headerKeysIndex['HydFittingFamily']][0]] = $bvalue[$headerKeysIndex['HydFittingFamily']][0];
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
                                        
                                        if (Asset\Service::pathExists($attributeImages[$groupColumnName])) 
                                            $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $attributeImages[$groupColumnName];

                                        
                                    }
                                }
                            }

                            // Getting order of the keys
                            $orderKeys = array();
                            foreach ($columnsDataWithImages as $skey => $svalue) {
                                foreach ($svalue as $vkey => $vvalue) {
                                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                                }
                            }
                                
                            if($bvalue[$headerKeysIndex['DescriptivePartNumber']])
                            {
                                $partialPartNumberArray = explode('-',$bvalue[$headerKeysIndex['DescriptivePartNumber']]);
                                $partialPartNumber = $partialPartNumberArray[0].'-'.$partialPartNumberArray[1];
                                $bvalue[]= $nomenClatureList[$partialPartNumber];
                            }
                            else
                            {
                                $bvalue[]= '';
                            }

                            foreach ($orderKeys as $ckey => $cvalue) {
                                    $articlesData[] = $bvalue[$headerKeysIndex[$ckey]];
                            }
                            
                            $newBrandArray[$key][$FittingTableName]['articleData']['articles'][strval($hoseID)][] = $articlesData;
                            ksort($newBrandArray[$key][$FittingTableName]['articleData']['articles'],SORT_NUMERIC);
                            $newBrandArray[$key][$FittingTableName]['articleData']['subHeaderRequired'] = $subHeaderRequired;
                            $newBrandArray[$key][$FittingTableName]['articleData']['columnsDataWithImages'] = $columnsDataWithImages;
                            $newBrandArray[$key][$FittingTableName]['brandData']['brandName'] = !empty($brandName) ? $brandName : $BrandShortText1;
                            // $newBrandArray[$key][$FittingTableName]['brandData']['HydFittingFamily'] = $HydFittingFamily;
                            $newBrandArray[$key][$FittingTableName]['brandData']['shortDescription'] = $shortDescription;
                            // $newBrandArray[$key][$FittingTableName]['brandData']['BrandShortText1'] = $BrandShortText1;
                            $newBrandArray[$key][$FittingTableName]['brandData']['LeftPrintCatalogImageObj'] = $LeftPrintCatalogImageObj;
                            $newBrandArray[$key][$FittingTableName]['brandData']['RightPrintCatalogImageObj'] = $RightPrintCatalogImageObj;
                            unset($hoseID);
                        }
                    }
                    unset($brandsData[$key]);
                }
            }

            $this->view['HydFittingFamily'] = implode(', ',array_unique($HydFittingFamilyArr));
            $this->view['iconRequired'] = $iconRequired;
            $this->view['brandsData'] = $newBrandArray;
            $this->view['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
            $this->view['footer_logo_src'] = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange'];
        }
    }

    public function getNomenClatureList(){
        $query = "select partialPartNumber, elbowType from object_query_20";
        $record = $this->db->fetchAll($query);

        $NomenClatureData = array();
        foreach($record as $entry) {
            $NomenClatureData[$entry['partialPartNumber']] = $entry['elbowType'];
        }
        return $NomenClatureData;
    }
}

