<?php

namespace CatalogBundle\Controller;

use CatalogBundle\Helper\CatalogTemplatingHelper;
use Pimcore\Db;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Pimcore\Controller\FrontendController;

class HydraulicFittingController extends FrontendController
{
    private $db;
    private $iconRequired = 'NO';
    private $subHeaderRequired = 'NO';
    private $attrbuteImgS3Arr = array();
    private $columnsData = array();
    private $attributeImages = array();
    private $catalogTemplatingHelper;
    private $containerInterface;
    private $translator;
    private $imageWidth;

    public function __construct(CatalogTemplatingHelper $catalogTemplatingHelper, ContainerInterface $container, TranslatorInterface $translator)
    {
        $this->db = Db::get();
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
        $this->containerInterface = $container;
        $this->translator = $translator;
    }

    /**
     * Hydraulic Fitting Template, It will load all fitting tables and render it's data accordingly
     * See getFittingTableConfig
     * For header icon see getAttributeImagesConfig
     */

    public function fittingPageAction(Request $request)
    {
        $containerRequest = $request->get('containerRequest') ? $request->get('containerRequest') : FALSE;
        $fittingTableColumnConfig = $this->containerInterface->get('app.config_provider_service')->getFittingTableConfig()['parameters'];

        $fittingTableColumn = $fittingTableColumnConfig['tables'];
        $shortDescriptionSortKeys = $fittingTableColumnConfig['shortDescriptionSortKeys'];
        $skiveTypeSortKeys = $fittingTableColumnConfig['skiveTypeSortKeys'];

        $common = $this->containerInterface->get('app.common_helper');
        $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
        $this->attributeImages = $common->getParameter($attributeImagesConfig, 'attributeImages');
        $CatalogImagesHYDFooter = $common->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());

        if ($this->document->getEditable('fitting-straight')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->document->getEditable('fitting-straight')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);

            $footerBgColor = $obj->getColor();

            /**
             * Get Catalog defined language
            */
            $lang = $common->getCatalogLanguage($obj);
            // $lang = 'fr_CA';
            $this->translator->setLocale($lang);


            $data = array();
            $headerData = json_decode($obj->getHeaderData(), true);
            // p_r($headerData);
            $headerKeys = array_keys($headerData);
            // p_r($headerKeys);
            $headerKeysIndex = array_flip($headerKeys);

            $objColumnsData = $obj->getColumns();
            $this->iconRequired = 'YES';
            $this->columnsData = json_decode($objColumnsData, true);

            // $this->columnsData['ElbowType']['columnName'] = 'ElbowType';
            // $this->columnsData['ElbowType']['columnLabel'] = 'ElbowType';

            // $headerKeysIndex['ElbowType'] = count($headerKeysIndex);

            $productsData = $obj->getProductsData();
            $nomenClatureList = $this->getNomenClatureList();
            $brandsList = $this->getBrandsList();

            $brandsDataList = array();
            if($productsData)
            {
                // HoseID1InFract field value to decimal and add a new field in product data
                foreach ($productsData as $key => $productItem) {
                    $HoseID1InFract = $productItem[$headerKeysIndex['HoseID1InFract']];
                    $HoseID1InDecimal = '';
                    if($HoseID1InFract)
                    {
                        $HoseID1InDecimal = $this->convertFranctionToDecimal($HoseID1InFract);
                    }
                    $productsData[$key][$headerKeysIndex['HoseID1InFract']] = trim($HoseID1InFract,' ');
                    $productsData[$key][] = $HoseID1InDecimal;
                }

                $HoseID1InFractSortKey = array_key_last($productsData[0]);
                $HoseID1InDecimalCustom = array_column($productsData, $HoseID1InFractSortKey);

                array_multisort($HoseID1InDecimalCustom, SORT_ASC, $productsData);

                foreach ($productsData as $key => $item)
                {
                    $brandName = $item[$headerKeysIndex['brandName']][0];
                    $shortDescription = strip_tags($item[$headerKeysIndex['shortDescription']]);
                    $shortDescription = str_replace(array(" ","-","°","/",PHP_EOL), "", $shortDescription);
                    $FittingTableName = $item[$headerKeysIndex['FittingTableName']];

                    if(!empty($brandName) && !empty($FittingTableName))
                    {
                        $brandsDataList[$brandName][$shortDescription][$FittingTableName][] = $item;
                    }
                }

                # Sort talbes using short table description
                $sortedBrandsData = [];
                if($brandsDataList)
                {
                    foreach ($brandsDataList as $brandNameKey => $brandInfo) {

                        foreach ($shortDescriptionSortKeys as $shortDescriptionKey => $shortDescriptionKeyName) {

                            if(isset($brandInfo[$shortDescriptionKey]))
                            {
                                $sortedBrandsData[$brandNameKey][$shortDescriptionKey] = $brandInfo[$shortDescriptionKey];
                            }

                        }

                        // Add the short marketing keys not in above shorted list

                        foreach ($brandInfo as $shortDKey => $shortDValue) {

                            if(!isset($sortedBrandsData[$brandNameKey][$shortDKey]))
                            {
                                $sortedBrandsData[$brandNameKey][$shortDKey] = $brandInfo[$shortDKey];
                            }
                        }
                    }
                }

                unset($brandsDataList);

            }

            $newBrandArray = array();
            $HydFittingFamilyArr = array();
            if($sortedBrandsData)
            {
                foreach ($sortedBrandsData as $brandKey => $sortDescriptionTables)
                {
                    foreach ($sortDescriptionTables as $sortDescriptionTableslist => $fittingTables)
                    {
                        foreach ($fittingTables as $FittingTableName => $articlesGroups)
                        {

                            $shortDescription = '';
                            $LeftPrintCatalogImageObj = '';
                            $RightPrintCatalogImageObj = '';
                            foreach ($articlesGroups as $agkey => $articles)
                            {
                                if($articles[$headerKeysIndex['NutType']]){
                                    $nutType = $articles[$headerKeysIndex['NutType']];
                                }
                                else{
                                    $nutType = '';
                                }
                                if($articles[$headerKeysIndex['SingleHexYN']])
                                {
                                    $singleHex = $articles[$headerKeysIndex['SingleHexYN']];
                                }
                                else
                                {
                                    $singleHex = '';
                                }

                                $FittingTableKeys = $fittingTableColumn[$FittingTableName]['columns'];
                                $fittingTableColWidths = $fittingTableColumn[$FittingTableName]['widthSetting'];

                                if(is_array($FittingTableKeys))
                                {
                                    if($articles[$headerKeysIndex['HydFittingFamily']][0]) {
                                        $HydFittingFamilyArr[$articles[$headerKeysIndex['HydFittingFamily']][0]] = $articles[$headerKeysIndex['HydFittingFamily']][0];
                                    }

                                    if(!$shortDescription && $articles[$headerKeysIndex['shortDescription']]) {
                                        $shortDescription = $articles[$headerKeysIndex['shortDescription']];
                                    }

                                    if(!$LeftPrintCatalogImageObj && $articles[$headerKeysIndex['LeftPrintCatalogImage']]) {
                                        $LeftPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($articles[$headerKeysIndex['LeftPrintCatalogImage']]);
                                    }

                                    if(!$RightPrintCatalogImageObj && $articles[$headerKeysIndex['RightPrintCatalogImage']]) {
                                        $RightPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($articles[$headerKeysIndex['RightPrintCatalogImage']]);
                                    }

                                    $articlesData = array();
                                    $this->subHeaderRequired = 'NO';
                                    $columnsDataWithImages = $this->getColumnHeadersForCatalog(TRUE, $FittingTableKeys, $fittingTableColWidths);
                                    // Getting order of the keys
                                    $orderKeys = array();


                                    foreach ($columnsDataWithImages as $skey => $svalue) {

                                        foreach ($svalue as $vkey => $vvalue) {

                                                $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                                        }
                                    }

                                    if($articles[$headerKeysIndex['DescriptivePartNumber']])
                                    {
                                        $partialPartNumberArray = explode('-',$articles[$headerKeysIndex['DescriptivePartNumber']]);
                                        $partialPartNumber = $partialPartNumberArray[0].'-'.$partialPartNumberArray[1];
                                        $articles[$headerKeysIndex['ElbowType']]= $nomenClatureList[$partialPartNumber];
                                    }
                                    else
                                    {
                                        $articles[$headerKeysIndex['ElbowType']]= '';
                                    }

                                    $skiveType = '';
                                    if(in_array('SkiveType',$FittingTableKeys))
                                    {
                                        $skiveType = $articles[$headerKeysIndex['SkiveType']];
                                        if($skiveType == 'Non-Skive' || $skiveType == 'NS' )
                                        {
                                            $skiveType = 'NS';

                                            if($articles[$headerKeysIndex['LeftPrintCatalogImage']]) {
                                                $LeftPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($articles[$headerKeysIndex['LeftPrintCatalogImage']]);
                                            }

                                            if($articles[$headerKeysIndex['RightPrintCatalogImage']]) {
                                                $RightPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($articles[$headerKeysIndex['RightPrintCatalogImage']]);
                                            }
                                        }
                                        else if($skiveType == 'Dual-Grip' || $skiveType == 'DG'){
                                            $skiveType = 'DG';

                                            if($articles[$headerKeysIndex['LeftPrintCatalogImage']]) {
                                                $LeftPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($articles[$headerKeysIndex['LeftPrintCatalogImage']]);
                                            }

                                            if($articles[$headerKeysIndex['RightPrintCatalogImage']]) {
                                                $RightPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($articles[$headerKeysIndex['RightPrintCatalogImage']]);
                                            }
                                        }
                                    }

                                    if($orderKeys['HoseID1InFract'])
                                    {
                                        $originalHoseID1InFractIndex = array_search("HoseID1InFract",array_keys($orderKeys));
                                    }

                                    foreach ($orderKeys as $ckey => $cvalue) {
                                        $articlesData[] = $articles[$headerKeysIndex[$ckey]];
                                    }

                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$FittingTableName][$skiveType]['articleData']['articles'][] = $articlesData;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$FittingTableName][$skiveType]['articleData']['NutType'][] = $nutType;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$FittingTableName][$skiveType]['articleData']['SingleHexYN'][] = $singleHex;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$FittingTableName][$skiveType]['articleData']['HoseID1InFractIndex'] = $originalHoseID1InFractIndex;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$FittingTableName][$skiveType]['articleData']['subHeaderRequired'] = $this->subHeaderRequired;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$FittingTableName][$skiveType]['articleData']['columnsDataWithImages'] = $columnsDataWithImages;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$FittingTableName][$skiveType]['brandData']['brandName'] = $brandKey;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$FittingTableName][$skiveType]['brandData']['shortDescription'] = $shortDescription;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$FittingTableName][$skiveType]['brandData']['LeftPrintCatalogImageObj'] = $LeftPrintCatalogImageObj;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$FittingTableName][$skiveType]['brandData']['RightPrintCatalogImageObj'] = $RightPrintCatalogImageObj;
                                }
                            }
                        }
                    }
                    $newBrandArray[$brandKey]['SortOrder'] = $brandsList[$brandKey];
                    unset($sortedBrandsData[$brandKey]);
                }
                if($newBrandArray)
                    array_multisort (array_column($newBrandArray, 'SortOrder'), SORT_ASC, $newBrandArray);
            }
            // p_r($newBrandArray);die;
            unset($objColumnsData);

            $footer_logo_src = (strtolower($footerBgColor)== 'orange') ? $CatalogImagesHYDFooter['Black']:$CatalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $parameterBag['HydFittingFamily'] = implode(', ',array_unique($HydFittingFamilyArr));
            $parameterBag['iconRequired'] = $this->iconRequired;
            $parameterBag['brandsData'] = $newBrandArray;
            $parameterBag['skiveTypeSortKeys'] = $skiveTypeSortKeys;
            $parameterBag['footer_class'] = (strtolower($footerBgColor)== 'orange') ? 'reverseColor':'';
            $parameterBag['footer_logo_src'] = $footer_logo_src;
            $parameterBag['containerRequest'] = $containerRequest;
        }
        return $this->render("@Catalog/Fitting/hydraulic_fitting.html.twig", $parameterBag);
    }

    public function getS3ImageSrc($src)
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);

        if($imgObj){
            // $s3src = $imgObj->getThumbnail('catalog_thumb');
            $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj,$this->imageWidth);
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

    public function getColumnHeadersForCatalog($isTableNameColumnRequired = FALSE, $tableNameColumns = [], $fittingTableColWidths){
        $columnsDataWithImages = array();

        if($isTableNameColumnRequired)
        {
            foreach ($this->columnsData as $dkey => $value)
            {
                if(in_array($dkey,$tableNameColumns))
                {
                    if(array_key_exists($dkey, $fittingTableColWidths)){
                        $colWidth = $fittingTableColWidths[$dkey];
                    }
                    $groupColumnName = $value['columnName'];
                    if(isset($value['groupName']) && $value['groupName'])
                    {

                        $groupColumnName = $value['groupName'];
                        $this->subHeaderRequired = 'YES';
                    }
                    $columnsDataWithImages[$groupColumnName][$dkey]['groupName'] = $value['groupName'];
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnWidth'] = $colWidth;
                    $columnsDataWithImages[$groupColumnName][$dkey]['unitName'] = $this->replaceYellowCode($this->translator->trans($value['unitName']));
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnName'] = $value['columnName'];
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnLabel'] = $this->replaceYellowCode($this->translator->trans($groupColumnName));

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
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = ($value['unitName']) ? $this->replaceYellowCode($this->translator->trans($value['unitName'])) : '';

                $columnsDataWithImages[$groupColumnName][$key]['columnName'] = $value['columnName'];
                $columnsDataWithImages[$groupColumnName][$key]['columnLabel'] = $this->replaceYellowCode($this->translator->trans($groupColumnName));

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

    public function replaceYellowCode($string)
    {
        $string = str_replace('%*','<span style="color: #ffa500;">', $string);
        $string = str_replace('*%','</span>', $string);
        return $string;
    }

    public function convertFranctionToDecimal($string)
    {
        $decimal = '';
        $string = str_replace(' ', '', $string);
        $stringParts = explode('-', $string);

        if(count($stringParts) > 1)
        {
            $floatValues = explode("/",$stringParts[1]);
            $decimalVal = $floatValues[0]/$floatValues[1];
            $decimal = $stringParts[0] + $decimalVal;
        }
        else{
            $fractionValues = explode("/",$stringParts[0]);
            if(count($fractionValues) > 1)
            {
                $decimal = $fractionValues[0]/$fractionValues[1];
            }
            else{
                $decimal = $stringParts[0];
            }

        }

        return $decimal;
    }

    public function getRequestedParameter(Request $request, $documentId): array
    {
        $parameterBag = [];
        $parameterBag['printermarks'] = $request->get('printermarks');

        $imageWidth = null;
        $imageRecompression = null;
        $printConfigFile = \Pimcore\Web2Print\Processor::getJobConfigFile($documentId);
        if(file_exists($printConfigFile)){
            $printConfigFileContent = file_get_contents($printConfigFile);
            $printConfig = json_decode( $printConfigFileContent,true);
            $imageRecompression = $printConfig['config']['Image Quality'];
            $imageWidth = $printConfig['config']['Image Width'];
        }
        $this->imageWidth = $imageWidth;
        $parameterBag['imageQuality'] = $imageRecompression;
        $parameterBag['imageWidth'] = $imageWidth;

        return $parameterBag;
    }

}


