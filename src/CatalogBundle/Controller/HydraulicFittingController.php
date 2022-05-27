<?php

namespace CatalogBundle\Controller;

use CatalogBundle\Helper\CatalogTemplatingHelper;
use Pimcore\Model\Asset;
use Pimcore\Db;
use Pimcore\Model\DataObject;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use S3CustomizationBundle\Lib\Utils;

class HydraulicFittingController extends AbstractController
{

    private $tableColumns;
    private $db;
    private $iconRequired = 'NO';
    private $subHeaderRequired = 'NO';
    private $attrbuteImgS3Arr = array();
    private $columnsData = array();
    private $attributeImages = array();
    private $catalogTemplatingHelper;


    public function __construct(CatalogTemplatingHelper $catalogTemplatingHelper)
    {
        $this->db = Db::get();
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
        /* Initilize monitoring item and set the number of steps will take to complete the task */
    }

    /**
     * Hydraulic Fitting Template, It will load all fitting tables and render it's data accordingly
     * See getFittingTableConfig
     * For header icon see getAttributeImagesConfig
     */

    public function fittingPageAction(Request $request)
    {
        $containerRequest = $request->get('containerRequest') ? $request->get('containerRequest') : FALSE;
        $fittingTableColumn = \Pimcore::getContainer()->get('app.config_provider_service')->getFittingTableConfig()['parameters'];
        // $attrImages = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['attributeImages'];
        $common = \Pimcore::getContainer()->get('app.common_helper');
        $attributeImagesConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getAttributeImagesConfig();
        $this->attributeImages = $common->getParameter($attributeImagesConfig, 'attributeImages');
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

            $objColumnsData = $obj->getColumns();

            $this->iconRequired = 'YES';
            $this->columnsData = json_decode($objColumnsData, true);

            $this->columnsData['ElbowType']['columnName'] = 'ElbowType';
            $this->columnsData['ElbowType']['columnLabel'] = 'ElbowType';

            $headerKeysIndex['ElbowType'] = count($headerKeysIndex);

            $productsData = $obj->getProductsData();
            $nomenClatureList = $this->getNomenClatureList();
            $brandsList = $this->getBrandsList();

            $brandsData = array();
            if($productsData)
            {
                foreach ($productsData as $key => $item)
                {
                    $brandName = $item[$headerKeysIndex['brandName']][0];
                    $FittingTableName = $item[$headerKeysIndex['FittingTableName']];

                    if(!empty($brandName) && !empty($FittingTableName))
                    {
                        if(isset($item[$headerKeysIndex['HoseID1InFract']]) && !empty($item[$headerKeysIndex['HoseID1InFract']])) {
                            $hoseID = $common->fractionToDecimal($item[$headerKeysIndex['HoseID1InFract']]);
                        } else {
                            $hoseID = 0;
                        }
                        $brandsData[$brandName][$FittingTableName][strval($hoseID)][] = $item;
                        unset($hoseID);
                    }
                }
            }
            unset($productsData);

            foreach ($brandsData as $brandName => $fittingTables) {
                foreach ($fittingTables as $fittingTable => $allSortedGroupList) {
                    ksort($brandsData[$brandName][$fittingTable],SORT_NUMERIC);
                }
            }

            $newBrandArray = array();
            $HydFittingFamilyArr = array();
            if($brandsData)
            {
                foreach ($brandsData as $brandKey => $fittingTables)
                {
                    foreach ($fittingTables as $FittingTableName => $articlesGroups) 
                    {
                        $shortDescription = '';
                        $LeftPrintCatalogImageObj = '';
                        $RightPrintCatalogImageObj = '';
                        foreach ($articlesGroups as $agkey => $articles) 
                        {
                            foreach ($articles as $akey => $bvalue) 
                            {
                                $FittingTableKeys = $fittingTableColumn[$FittingTableName]['columns'];
                                if(is_array($FittingTableKeys))
                                {
                                    if($bvalue[$headerKeysIndex['HydFittingFamily']][0]) {
                                        $HydFittingFamilyArr[$bvalue[$headerKeysIndex['HydFittingFamily']][0]] = $bvalue[$headerKeysIndex['HydFittingFamily']][0];
                                    }

                                    if(!$shortDescription && $bvalue[$headerKeysIndex['shortDescription']]) {
                                        $shortDescription = $bvalue[$headerKeysIndex['shortDescription']];
                                    }

                                    if(!$LeftPrintCatalogImageObj && $bvalue[$headerKeysIndex['LeftPrintCatalogImage']]) {
                                        $LeftPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($bvalue[$headerKeysIndex['LeftPrintCatalogImage']]);
                                    }

                                    if(!$RightPrintCatalogImageObj && $bvalue[$headerKeysIndex['RightPrintCatalogImage']]) {
                                        $RightPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($bvalue[$headerKeysIndex['RightPrintCatalogImage']]);
                                    }

                                    $articlesData = array();
                                    $this->subHeaderRequired = 'NO';

                                    $columnsDataWithImages = $this->getColumnHeadersForCatalog(TRUE, $FittingTableKeys);

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

                                    $newBrandArray[$brandKey][$FittingTableName]['articleData']['articles'][$agkey][] = $articlesData;
                                    $newBrandArray[$brandKey][$FittingTableName]['articleData']['subHeaderRequired'] = $this->subHeaderRequired;
                                    $newBrandArray[$brandKey][$FittingTableName]['articleData']['columnsDataWithImages'] = $columnsDataWithImages;
                                    $newBrandArray[$brandKey][$FittingTableName]['brandData']['brandName'] = $brandKey;
                                    $newBrandArray[$brandKey][$FittingTableName]['brandData']['shortDescription'] = $shortDescription;
                                    $newBrandArray[$brandKey][$FittingTableName]['brandData']['LeftPrintCatalogImageObj'] = $LeftPrintCatalogImageObj;
                                    $newBrandArray[$brandKey][$FittingTableName]['brandData']['RightPrintCatalogImageObj'] = $RightPrintCatalogImageObj;
                                }
                            }
                        }
                    }
                    $newBrandArray[$brandKey]['SortOrder'] = $brandsList[$brandKey];
                    unset($brandsData[$brandKey]);
                }
                if($newBrandArray)
                    array_multisort (array_column($newBrandArray, 'SortOrder'), SORT_ASC, $newBrandArray);
            }

            unset($objColumnsData);

            $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $this->view['HydFittingFamily'] = implode(', ',array_unique($HydFittingFamilyArr));
            $this->view['iconRequired'] = $this->iconRequired;
            $this->view['brandsData'] = $newBrandArray;
            $this->view['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
            $this->view['footer_logo_src'] = $footer_logo_src;
            $this->view['containerRequest'] = $containerRequest;
        }
    }

    public function getS3ImageSrc($src)
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);

        if($imgObj){
            // $s3src = $imgObj->getThumbnail('catalog_thumb');
            $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj,$this->view->imageWidth);
//            $s3src = Utils::getAssetFullPathCompatibleToS3($imgObj);
        }

        return $s3src;
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

    public function getBrandsList(){
        $query = "select name, SortOrder from object_query_3";
        $brandslist = $this->db->fetchPairs($query);
        return $brandslist;
    }

    public function getColumnHeadersForCatalog($isTableNameColumnRequired = FALSE, $tableNameColumns = []){

        $columnsDataWithImages = array();

        if($isTableNameColumnRequired)
        {
            foreach ($this->columnsData as $dkey => $value) 
            {
                if(in_array($dkey,$tableNameColumns))
                {
                    $groupColumnName = $value['columnName'];
                    if(isset($value['groupName']) && $value['groupName'])
                    {
                        $groupColumnName = $value['groupName'];
                        $this->subHeaderRequired = 'YES';
                    }

                    $columnsDataWithImages[$groupColumnName][$dkey]['groupName'] = $value['groupName'];
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnWidth'] = $value['columnWidth'];
                    $columnsDataWithImages[$groupColumnName][$dkey]['unitName'] = $this->get('translator')->trans($value['unitName']);
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnName'] = $value['columnName'];
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnLabel'] = $this->get('translator')->trans($groupColumnName);

                    if ($this->iconRequired == 'YES')
                    {
                        if(!isset($this->attrbuteImgS3Arr[$groupColumnName]))
                        {
                            $attributeImagesSrc = $this->attributeImages[$groupColumnName];
                            $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                            $this->attrbuteImgS3Arr[$groupColumnName] = $attributeImagesSrc;
                            $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $attributeImagesSrc;
                        }
                        else
                        {
                            $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $this->attrbuteImgS3Arr[$groupColumnName];
                        }
                    }
                }
            }
        }
        else
        {
            foreach ($this->columnsData as $key => $value) {

                $groupColumnName = $value['columnName'];
                if(isset($value['groupName']) && $value['groupName'])
                {
                    $groupColumnName = $value['groupName'];
                    $this->subHeaderRequired = 'YES';
                }

                $columnsDataWithImages[$groupColumnName][$key]['groupName'] = $value['groupName'];
                $columnsDataWithImages[$groupColumnName][$key]['columnWidth'] = $value['columnWidth'];

                if($value['columnName'] == 'listPrice')
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = $value['unitName'];
                else
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = ($value['unitName']) ? $this->get('translator')->trans($value['unitName']) : '';

                $columnsDataWithImages[$groupColumnName][$key]['columnName'] = $value['columnName'];
                $columnsDataWithImages[$groupColumnName][$key]['columnLabel'] = $this->get('translator')->trans($groupColumnName);

                if ($this->iconRequired == 'YES')
                {
                    if(!isset($this->attrbuteImgS3Arr[$groupColumnName]))
                    {
                        $attributeImagesSrc = $this->attributeImages[$groupColumnName];
                        $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                        $this->attrbuteImgS3Arr[$groupColumnName] = $attributeImagesSrc;
                        $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $attributeImagesSrc;
                    }
                    else
                    {
                        $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $this->attrbuteImgS3Arr[$groupColumnName];
                    }
                }
            }
        }

        return $columnsDataWithImages;
    }
}

