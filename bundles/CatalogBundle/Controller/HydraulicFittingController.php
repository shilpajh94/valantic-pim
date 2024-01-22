<?php

namespace CatalogBundle\Controller;

use CatalogBundle\Helper\CatalogTemplatingHelper;
use Pimcore\Db;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Response;

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
    private $imageWidth;
    private $translatorInterface;

    public function __construct(CatalogTemplatingHelper $catalogTemplatingHelper, ContainerInterface $container, TranslatorInterface $translator)
    {
        $this->db = Db::get();
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
        $this->containerInterface = $container;
        $this->translatorInterface = $translator;
    }

    /**
     * Hydraulic Fitting Template, It will load all fitting tables and render it's data accordingly
     * See getFittingTableConfig
     * For header icon see getAttributeImagesConfig
     */

    public function fittingPageAction(Request $request): Response
    {
        $fittingTableColumnConfig = $this->containerInterface->get('app.config_provider_service')->getFittingTableConfig()['parameters'];

        $fittingTableColumn = $fittingTableColumnConfig['tables'];
        $shortDescriptionSortKeys = $fittingTableColumnConfig['shortDescriptionSortKeys'];
        $skiveTypeSortKeys = $fittingTableColumnConfig['skiveTypeSortKeys'];

        $common = $this->containerInterface->get('app.common_helper');
        $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
        $this->attributeImages = $common->getParameter($attributeImagesConfig, 'attributeImages');
        $catalogImagesHYDFooter = $common->getParameter($attributeImagesConfig, 'CatalogImagesHYDFooter');
        $parameterBag = $this->getRequestedParameter($request, $this->document->getId());

        if ($this->document->getEditable('fitting-straight')->getElement() instanceof  \Pimcore\Model\DataObject) {
            $id = $this->document->getEditable('fitting-straight')->getId();
            $obj = \Pimcore\Model\DataObject::getById($id);

            $footerBgColor = $obj->getColor();

            /**
             * Get Catalog defined language
             */
            $headerData = json_decode($obj->getHeaderData(), true);
            $headerKeys = array_keys($headerData);
            $headerKeysIndex = array_flip($headerKeys);

            $objColumnsData = $obj->getColumns();
            $this->iconRequired = 'YES';
            $this->columnsData = json_decode($objColumnsData, true);

            $productsData = $obj->getProductsData();
            $nomenClatureList = $this->getNomenClatureList();
            $brandsList = $this->getBrandsList();

            $brandsDataList = array();
            if ($productsData) {
                // HoseID1InFract field value to decimal and add a new field in product data
                foreach ($productsData as $key => $productItem) {
                    $hoseID1InFract = $productItem[$headerKeysIndex['HoseID1InFract']];
                    $hoseID1InDecimal = '';
                    if ($hoseID1InFract) {
                        $hoseID1InDecimal = $this->convertFranctionToDecimal($hoseID1InFract);
                    }
                    $productsData[$key][$headerKeysIndex['HoseID1InFract']] = trim($hoseID1InFract, ' ');
                    $productsData[$key][] = $hoseID1InDecimal;
                }

                $hoseID1InFractSortKey = array_key_last($productsData[0]);
                $hoseID1InDecimalCustom = array_column($productsData, $hoseID1InFractSortKey);

                array_multisort($hoseID1InDecimalCustom, SORT_ASC, $productsData);

                foreach ($productsData as $key => $item) {
                    $brandName = $item[$headerKeysIndex['brandName']];
                    $shortDescription = strip_tags($item[$headerKeysIndex['shortDescription']]);
                    $shortDescription = str_replace(array(" ", "-", "°", "/", PHP_EOL), "", $shortDescription);
                    $fittingTableName = $item[$headerKeysIndex['FittingTableName']];

                    if (!empty($brandName) && !empty($fittingTableName)) {
                        $brandsDataList[$brandName][$shortDescription][$fittingTableName][] = $item;
                    }
                }

                # Sort talbes using short table description
                $sortedBrandsData = [];
                if ($brandsDataList) {
                    foreach ($brandsDataList as $brandNameKey => $brandInfo) {

                        foreach ($shortDescriptionSortKeys as $shortDescriptionKey => $shortDescriptionKeyName) {

                            if (isset($brandInfo[$shortDescriptionKey])) {
                                $sortedBrandsData[$brandNameKey][$shortDescriptionKey] = $brandInfo[$shortDescriptionKey];
                            }
                        }

                        // Add the short marketing keys not in above shorted list

                        foreach ($brandInfo as $shortDKey => $shortDValue) {

                            if (!isset($sortedBrandsData[$brandNameKey][$shortDKey])) {
                                $sortedBrandsData[$brandNameKey][$shortDKey] = $brandInfo[$shortDKey];
                            }
                        }
                    }
                }

                unset($brandsDataList);
            }

            $newBrandArray = array();
            $hydFittingFamilyArr = array();
            if ($sortedBrandsData) {
                foreach ($sortedBrandsData as $brandKey => $sortDescriptionTables) {
                    foreach ($sortDescriptionTables as $sortDescriptionTableslist => $fittingTables) {
                        foreach ($fittingTables as $fittingTableName => $articlesGroups) {

                            $shortDescription = '';
                            $leftPrintCatalogImageObj = '';
                            $rightPrintCatalogImageObj = '';
                            foreach ($articlesGroups as $articles) {
                                if (isset($headerKeysIndex['NutType']) && $articles[$headerKeysIndex['NutType']]) {
                                    $nutType = $articles[$headerKeysIndex['NutType']];
                                } else {
                                    $nutType = '';
                                }
                                if (isset($headerKeysIndex['SingleHexYN']) && $articles[$headerKeysIndex['SingleHexYN']]) {
                                    $singleHex = $articles[$headerKeysIndex['SingleHexYN']];
                                } else {
                                    $singleHex = '';
                                }

                                $fittingTableKeys = $fittingTableColumn[$fittingTableName]['columns'];
                                $fittingTableColWidths = $fittingTableColumn[$fittingTableName]['widthSetting'];

                                if (is_array($fittingTableKeys)) {
                                    if (isset($articles[$headerKeysIndex['HydFittingFamily']]) && $articles[$headerKeysIndex['HydFittingFamily']]) {
                                        $hydFittingFamilyArr[$articles[$headerKeysIndex['HydFittingFamily']]] = $articles[$headerKeysIndex['HydFittingFamily']];
                                    }

                                    if (!$shortDescription && $articles[$headerKeysIndex['shortDescription']]) {
                                        $shortDescription = $articles[$headerKeysIndex['shortDescription']];
                                    }

                                    if (!$leftPrintCatalogImageObj && $articles[$headerKeysIndex['LeftPrintCatalogImage']]) {
                                        $leftPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($articles[$headerKeysIndex['LeftPrintCatalogImage']]);
                                    }

                                    if (!$rightPrintCatalogImageObj && $articles[$headerKeysIndex['RightPrintCatalogImage']]) {
                                        $rightPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($articles[$headerKeysIndex['RightPrintCatalogImage']]);
                                    }

                                    $articlesData = array();
                                    $this->subHeaderRequired = 'NO';
                                    $columnsDataWithImages = $this->getColumnHeadersForCatalog($fittingTableColWidths, true, $fittingTableKeys);
                                    // Getting order of the keys
                                    $orderKeys = array();


                                    foreach ($columnsDataWithImages as $svalue) {

                                        foreach ($svalue as $vvalue) {

                                            $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                                        }
                                    }

                                    if (isset($headerKeysIndex['DescriptivePartNumber']) && $articles[$headerKeysIndex['DescriptivePartNumber']]) {
                                        $partialPartNumberArray = explode('-', $articles[$headerKeysIndex['DescriptivePartNumber']]);
                                        $partialPartNumber = $partialPartNumberArray[0] . '-' . $partialPartNumberArray[1];
                                        if (isset($headerKeysIndex['ElbowType'])) {
                                            $articles[$headerKeysIndex['ElbowType']] = $nomenClatureList[$partialPartNumber];
                                        }
                                    } else {
                                        if (isset($headerKeysIndex['ElbowType'])) {
                                            $articles[$headerKeysIndex['ElbowType']] = '';
                                        }
                                    }

                                    $skiveType = '';
                                    if (in_array('SkiveType', $fittingTableKeys)) {
                                        $skiveType = $articles[$headerKeysIndex['SkiveType']];
                                        if ($skiveType == 'Non-Skive' || $skiveType == 'NS') {
                                            $skiveType = 'NS';

                                            if ($articles[$headerKeysIndex['LeftPrintCatalogImage']]) {
                                                $leftPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($articles[$headerKeysIndex['LeftPrintCatalogImage']]);
                                            }

                                            if ($articles[$headerKeysIndex['RightPrintCatalogImage']]) {
                                                $rightPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($articles[$headerKeysIndex['RightPrintCatalogImage']]);
                                            }
                                        } elseif ($skiveType == 'Dual-Grip' || $skiveType == 'DG') {
                                            $skiveType = 'DG';

                                            if ($articles[$headerKeysIndex['LeftPrintCatalogImage']]) {
                                                $leftPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($articles[$headerKeysIndex['LeftPrintCatalogImage']]);
                                            }

                                            if ($articles[$headerKeysIndex['RightPrintCatalogImage']]) {
                                                $rightPrintCatalogImageObj = \Pimcore\Model\Asset::getByPath($articles[$headerKeysIndex['RightPrintCatalogImage']]);
                                            }
                                        }
                                    }

                                    if ($orderKeys['HoseID1InFract']) {
                                        $originalHoseID1InFractIndex = array_search("HoseID1InFract", array_keys($orderKeys));
                                    }

                                    foreach ($orderKeys as $ckey => $cvalue) {
                                        $articlesData[] = $articles[$headerKeysIndex[$ckey]];
                                    }

                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$fittingTableName][$skiveType]['articleData']['articles'][] = $articlesData;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$fittingTableName][$skiveType]['articleData']['NutType'][] = $nutType;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$fittingTableName][$skiveType]['articleData']['SingleHexYN'][] = $singleHex;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$fittingTableName][$skiveType]['articleData']['HoseID1InFractIndex'] = $originalHoseID1InFractIndex;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$fittingTableName][$skiveType]['articleData']['subHeaderRequired'] = $this->subHeaderRequired;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$fittingTableName][$skiveType]['articleData']['columnsDataWithImages'] = $columnsDataWithImages;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$fittingTableName][$skiveType]['brandData']['brandName'] = $brandKey;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$fittingTableName][$skiveType]['brandData']['shortDescription'] = $shortDescription;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$fittingTableName][$skiveType]['brandData']['LeftPrintCatalogImageObj'] = $leftPrintCatalogImageObj;
                                    $newBrandArray[$brandKey][$sortDescriptionTableslist][$fittingTableName][$skiveType]['brandData']['RightPrintCatalogImageObj'] = $rightPrintCatalogImageObj;
                                }
                            }
                        }
                    }
                    $newBrandArray[$brandKey]['SortOrder'] = $brandsList[$brandKey];
                    unset($sortedBrandsData[$brandKey]);
                }
                if ($newBrandArray) {
                    array_multisort(array_column($newBrandArray, 'SortOrder'), SORT_ASC, $newBrandArray);
                }
            }
            unset($objColumnsData);

            $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesHYDFooter['Black'] : $catalogImagesHYDFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $parameterBag['HydFittingFamily'] = implode(', ', array_unique($hydFittingFamilyArr));
            $parameterBag['iconRequired'] = $this->iconRequired;
            $parameterBag['brandsData'] = $newBrandArray;
            $parameterBag['skiveTypeSortKeys'] = $skiveTypeSortKeys;
            $parameterBag['footer_class'] = (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '';
            $parameterBag['footer_logo_src'] = $footer_logo_src;
        }
        return $this->render("@Catalog/Fitting/hydraulic_fitting.html.twig", $parameterBag);
    }

    public function getS3ImageSrc($src): string
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);

        if ($imgObj) {
            $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj, $this->imageWidth);
        }

        return $s3src;
    }

    public function getNomenClatureList()
    {
        $query = "select partialPartNumber, elbowType from object_query_20";
        $record = $this->db->fetchAllAssociative($query);

        $nomenClatureData = array();
        foreach ($record as $entry) {
            $nomenClatureData[$entry['partialPartNumber']] = $entry['elbowType'];
        }
        return $nomenClatureData;
    }

    public function getBrandsList(): mixed
    {
        $query = "select name, SortOrder from object_query_3";
        return \Pimcore\Db\Helper::fetchPairs($this->db, $query);
    }

    public function getColumnHeadersForCatalog($fittingTableColWidths, $isTableNameColumnRequired = false, $tableNameColumns = []): array
    {
        $columnsDataWithImages = array();

        if ($isTableNameColumnRequired) {
            foreach ($this->columnsData as $dkey => $value) {
                if (in_array($dkey, $tableNameColumns)) {
                    $groupColumnName = $value['columnName'];
                    $groupName = '';
                    $columnWidth = '';
                    $unitName = '';

                    if (isset($value['columnWidth']) && $value['columnWidth']) {
                        $columnWidth = $value['columnWidth'];
                    }

                    if (isset($value['unitName']) && $value['unitName']) {
                        $unitName = $value['unitName'];
                    }

                    if (isset($value['groupName']) && $value['groupName']) {
                        $groupColumnName = $value['groupName'];
                        $groupName = $value['groupName'];
                        $this->subHeaderRequired = 'YES';
                    }

                    $columnsDataWithImages[$groupColumnName][$dkey]['groupName'] = $groupName;
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnWidth'] = $columnWidth;
                    $columnsDataWithImages[$groupColumnName][$dkey]['unitName'] = $this->replaceYellowCode($this->translatorInterface->trans($unitName));
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnName'] = $value['columnName'];
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnLabel'] = $this->replaceYellowCode($this->translatorInterface->trans($groupColumnName));

                    if ($this->iconRequired == 'YES') {
                        if (!isset($this->attrbuteImgS3Arr[$groupColumnName])) {
                            if (isset($this->attributeImages[$groupColumnName])) {
                                $attributeImagesSrc = $this->attributeImages[$groupColumnName];
                                $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                                $this->attrbuteImgS3Arr[$groupColumnName] = $attributeImagesSrc;
                                $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $attributeImagesSrc;
                            }
                        } else {
                            $columnsDataWithImages[$groupColumnName][$dkey]['columnIcon'] = $this->attrbuteImgS3Arr[$groupColumnName];
                        }
                    }
                }
            }
        } else {
            foreach ($this->columnsData as $key => $value) {

                $groupColumnName = $value['columnName'];
                $groupName = '';

                $columnWidth = '';
                $unitName = '';

                if (isset($value['columnWidth']) && $value['columnWidth']) {
                    $columnWidth = $value['columnWidth'];
                }

                if (isset($value['unitName']) && $value['unitName']) {
                    $unitName = $value['unitName'];
                }

                if (isset($value['groupName']) && $value['groupName']) {
                    $groupColumnName = $value['groupName'];
                    $groupName = $value['groupName'];
                    $this->subHeaderRequired = 'YES';
                }

                $columnsDataWithImages[$groupColumnName][$key]['groupName'] = $groupName;
                $columnsDataWithImages[$groupColumnName][$key]['columnWidth'] = $columnWidth;

                if ($value['columnName'] == 'listPrice') {
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = $unitName;
                } else {
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = ($unitName) ? $this->replaceYellowCode($this->translatorInterface->trans($unitName)) : '';
                }

                $columnsDataWithImages[$groupColumnName][$key]['columnName'] = $value['columnName'];
                $columnsDataWithImages[$groupColumnName][$key]['columnLabel'] = $this->replaceYellowCode($this->translatorInterface->trans($groupColumnName));

                if ($this->iconRequired == 'YES') {
                    if (!isset($this->attrbuteImgS3Arr[$groupColumnName])) {
                        if (isset($this->attributeImages[$groupColumnName])) {
                            $attributeImagesSrc = $this->attributeImages[$groupColumnName];
                            $attributeImagesSrc = $this->getS3ImageSrc($attributeImagesSrc);
                            $this->attrbuteImgS3Arr[$groupColumnName] = $attributeImagesSrc;
                            $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $attributeImagesSrc;
                        }
                    } else {
                        $columnsDataWithImages[$groupColumnName][$key]['columnIcon'] = $this->attrbuteImgS3Arr[$groupColumnName];
                    }
                }
            }
        }

        return $columnsDataWithImages;
    }
    public function replaceYellowCode($string): string
    {
        $string = str_replace('%*', '<span style="color: #ffa500;">', $string);
        $string = str_replace('*%', '</span>', $string);
        return $string;
    }

    public function convertFranctionToDecimal($string): mixed
    {
        $decimal = '';
        $string = str_replace(' ', '', $string);
        $stringParts = explode('-', $string);

        if (count($stringParts) > 1) {
            $floatValues = explode("/", $stringParts[1]);
            $decimalVal = $floatValues[0] / $floatValues[1];
            $decimal = $stringParts[0] + $decimalVal;
        } else {
            $fractionValues = explode("/", $stringParts[0]);
            if (count($fractionValues) > 1) {
                $decimal = $fractionValues[0] / $fractionValues[1];
            } else {
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
        if (file_exists($printConfigFile)) {
            $printConfigFileContent = file_get_contents($printConfigFile);
            $printConfig = json_decode($printConfigFileContent, true);
            $imageRecompression = $printConfig['config']['Image Quality'];
            $imageWidth = $printConfig['config']['Image Width'];
        }
        $this->imageWidth = $imageWidth;
        $parameterBag['imageQuality'] = $imageRecompression;
        $parameterBag['imageWidth'] = $imageWidth;

        return $parameterBag;
    }
}
