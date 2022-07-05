<?php

namespace PTGEU\CatalogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;
use CatalogBundle\Helper\CatalogTemplatingHelper;
use Pimcore\Db;

class DefaultController extends AbstractController
{
    private $featuresList = [];
    private $s3srcArr = [];
    private $attrbuteImgS3Arr = [];
    
    private $columnsData = [];
    private $attributeImages = [];
    private $iconRequired = 'NO';
    private $subHeaderRequired = 'NO';
    private $catalogTemplatingHelper;
    private $db;

    public function __construct(CatalogTemplatingHelper $catalogTemplatingHelper) {
        $this->db = Db::get();
        $this->catalogTemplatingHelper = $catalogTemplatingHelper;
        /* Initilize monitoring item and set the number of steps will take to complete the task */
    }

    /**
     * @Route("/ptgeu_catalog")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from ptgeu_catalog');
    }

    /**
     * @Route("/ptgeu_catalog/get-available-six-level-categories")
     */
    public function getAvailableSixLevelCategories(Request $request)
    {
        $parentCat = $request->get('catId');
        if($parentCat)
        {
            $parentObj = \Pimcore\Model\DataObject::getById($parentCat);
            $childs = $parentObj->getChildren([DataObject::OBJECT_TYPE_OBJECT]);

            $parentName = [];
            $parentIds = [];
            foreach ($childs as $child) {
                $parentName[$child->getId()] = $child->getDescription('en');
                $parentIds[] = $child->getId();
            }
            
            $categoryList = new DataObject\PTGEUProductHierarchy\Listing();
            $categoryList->setCondition("Level = ?", ["7"]);
            $categoryList->setCondition("o_parentId IN (?)", [$parentIds]);
            $categoryList->setOrderKey('description');
            $categoryList->setOrder("ASC");
            $categoryList = $categoryList->load();

            $i = 0;
            foreach ($categoryList as $cat) {
                $parentNameStr = $parentName[$cat->getParentId()] ? $parentName[$cat->getParentId()] : '';
                $optionData[$i]['text'] = $parentNameStr. "-". $cat->getDescription('en');
                $optionData[$i]['id'] = $cat->getId();
                $i++;
            }
        }

        $res['data'] = $optionData;

        echo json_encode(['data' => $res['data']]);
        die;
    }

    /**
     * @Route("/ptgeu_catalog/get-available-headers")
     */
    public function getAvailableHeaders(Request $request) {
        $commonHelper = \Pimcore::getContainer()->get('app.common_helper');
        $catalogConfig = \Pimcore::getContainer()->get('catalog.config_provider_service')->getCatalogConfig();
        $ptgProductPageConfig = $commonHelper->getParameter($catalogConfig, 'PTG Product Page');
        
        $columns = array();
        $arr = [];
        $defaultColumns = [];

        $tableColumns = $ptgProductPageConfig['Dynamic Table Attribute'];
        if ($tableColumns !== null) {
            if (!empty($tableColumns) && count($tableColumns) > 0) {
                foreach ($tableColumns as $key => $column) {
                    $fieldLabel = $column['fieldLabel'];
                    $columns[] = array($key, $key);
                    if($column['defaultColumn'])
                    {
                        $defaultColumns[] = $key;
                    }
                }
            }
            $arr = array('storeData' => $columns, 'completeData' => $tableColumns, 'defaultColumns'=> $defaultColumns,'success' => true);
        } else {
            $arr = array('storeData' => [], 'completeData' => [], 'success' => true);
        }

        echo json_encode($arr);
        die;
    }

    public function templatePtgEuProductPageAction(Request $request)
    {
        $containerRequest = $request->get('containerRequest') ? $request->get('containerRequest') : FALSE;
        $catalogCategoryTableObject = $this->getDocumentTag('relation', 'ptg_eu_product_page')->getElement();
        if($catalogCategoryTableObject)
        {
            $commonHelper = \Pimcore::getContainer()->get('app.common_helper');
            $attributeImagesConfig = \Pimcore::getContainer()->get('catalog.config_provider_service')->getAttributeImagesConfig();
            $priceListTableConfig = \Pimcore::getContainer()->get('catalog.config_provider_service')->getPriceListTableConfig();

            $catalogConfig = \Pimcore::getContainer()->get('catalog.config_provider_service')->getCatalogConfig();
            $ptgProductPageConfig = $commonHelper->getParameter($catalogConfig, 'PTG Product Page');
            $DynamicTableAttribute = $ptgProductPageConfig['Dynamic Table Attribute'];
            $tableSortingFields = $ptgProductPageConfig['Table Sorting Fields'];

            $priceListTableColumn = $commonHelper->getParameter($priceListTableConfig, 'priceListTableColumn');
            $priceListCurrency = $commonHelper->getParameter($priceListTableConfig, 'priceListCurrency');
            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $CatalogImagesPTGFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesPTGFooter');

            $catalogObj = DataObject\PTGEUCatalog::getById($catalogCategoryTableObject->getParentId());
            $IsPriceCatalog = $catalogObj->getIsPriceCatalog();
            // $CatalogLanguage = $catalogObj->getCatalogLanguage();
            $distributionChannel = $catalogObj->getDistributionChannel();
            $salesOrganisation = $catalogObj->getSalesOrganisation();
            $Currency = $catalogObj->getCurrency();
            $ValidFromDate = $catalogObj->getValidFromDate();
            $objColumnsData = $catalogCategoryTableObject->getColumns();
            $fifthLevelCategoryObj = $catalogCategoryTableObject->getFifthLevelCategory();
            $sixSevenLevelCategoryObj = $catalogCategoryTableObject->getSixSevenLevelCategory();
            
            if($fifthLevelCategoryObj)
            {
                $fifthLevelEntries = new DataObject\PTGEUProduct\Listing();
                $fifthLevelEntries->setCondition("productType = ? AND hierarchyLevel5 LIKE ?", ["base","%$fifthLevelCategoryObj%"]);
                $fifthLevelEntries->setLimit(1);

                foreach ($fifthLevelEntries as $entry) {
                    $fifthLevelProduct = $entry;
                }
            }

            $groupData = array();
            if($fifthLevelProduct)
            {
                $seventhLevelProductList = [];

                if($sixSevenLevelCategoryObj)
                {
                    foreach ($sixSevenLevelCategoryObj as $categoryId) {

                        $seventhLevelEntries = new DataObject\PTGEUProduct\Listing();
                        $seventhLevelEntries->setCondition("productType = ? AND hierarchyLevel7 LIKE ?", ["skeleton","%$categoryId%"]);
                        $seventhLevelEntries->setLimit(1);

                        foreach ($seventhLevelEntries as $entry) {
                            $seventhLevelProductList[] = $entry->getId();
                        }
                    }
                }

                $this->columnsData = json_decode($objColumnsData, true);
                if($IsPriceCatalog)
                {
                    $this->columnsData['listPrice']['columnName'] = 'listPrice';
                    $this->columnsData['listPrice']['columnLabel'] = 'listPrice';
                    $this->columnsData['listPrice']['unitName'] = $priceListCurrency[$Currency];
                }
                
                $columnsDataWithImages = $this->getColumnHeadersForCatalog();

                $orderKeys = array();
                foreach ($columnsDataWithImages as $skey => $svalue) {
                    foreach ($svalue as $vkey => $vvalue) {
                        $orderKeys[] = $vkey;
                    }
                }

                $orderFieldNameList = [];

                
                $tableSortingFieldsStatus = [];

                $needRemoveSortedField = false;

                if($this->columnsData)
                {
                    foreach ($orderKeys as $fieldName) {

                        $orderFieldNameList[$fieldName] = $this->columnsData[$fieldName];

                    }

                    if($orderFieldNameList)
                    {
                        foreach ($tableSortingFields as $fieldName) {

                            if(isset($orderFieldNameList[$fieldName]))
                            {
                                $tableSortingFieldsStatus[$fieldName] = true;
                            }
                            else{
                                $tableSortingFieldsStatus[$fieldName] = false;
                                $needRemoveSortedField = true;
                            }
                        }
                    }
                }

                $reinforcement = array();
                $this->subHeaderRequired = 'YES';
                $this->iconRequired = 'YES';
                $groupData['subHeaderRequired'] = $this->subHeaderRequired;
                $groupData['iconRequired'] = $this->iconRequired;
                $groupData['material'] = $fifthLevelProduct->getMaterial();
                $groupData['heatAndOilResistant'] = $fifthLevelProduct->getHeatAndOilResistant();

                if($fifthLevelProduct->getReinforcement())
                {
                    $reinforcement = $fifthLevelProduct->getReinforcement();
                }

                $reinforcement = implode(', ', $reinforcement);
                        
                $groupData['reinforcement'] = $reinforcement;

                $this->featuresList = $this->getFeaturesList('en');
                
                $safetyFeatures = array();

                if($fifthLevelProduct->getFeaturesBenefitsBulletPoint())
                {
                    foreach ($fifthLevelProduct->getFeaturesBenefitsBulletPoint() as $feature) {
                        array_push($safetyFeatures,$feature);
                    }
                }

                $safetyFeaturesList = $this->getFiveSortedFeaturesWithIconList($safetyFeatures);
                
                $groupData['safetyFeatures'] = $safetyFeaturesList;
                $groupData['mainImageObj'] = $fifthLevelProduct->getMainImage1();
                $groupData['ProfileDimensionImageObj'] = $fifthLevelProduct->getTechnicalDrawing1();
                $groupData['longDescription'] = $fifthLevelProduct->getLongDescription();
                $groupData['temperatureRange'] = $fifthLevelProduct->getRangeTemperatureF()."(".$fifthLevelProduct->getRangeTemperatureC().")";
                $groupData['brandName'] = $fifthLevelProduct->getProductName();
                
                $productObjectLevel6List = $fifthLevelProduct->getChildren([DataObject::OBJECT_TYPE_OBJECT]);

                $articleData = [];
                foreach ($productObjectLevel6List as $productObjectLevel6) {
                    
                    if(empty($seventhLevelProductList) || in_array($productObjectLevel6->getId(), $seventhLevelProductList))
                    {
                        $productObjectLevel7List = $productObjectLevel6->getChildren([DataObject::OBJECT_TYPE_OBJECT]);
                        foreach ($productObjectLevel7List as $article) {
                            if($article->getPrintedCatalogFlag() === true)
                            {
                                foreach ($orderFieldNameList as $fieldName => $fields) {
                                    if( ($fields['objectLevel'] == 'fert') && ($fields['fieldLevel'] == 'class') && (ucfirst($fields['fieldType']) == 'Input'))
                                    {
                                        $method = "get".ucfirst($fieldName);
                                        $data[$fieldName] = $article->$method();
                                    }
                                    else if( ($fields['objectLevel'] == 'fert') && ($fields['fieldLevel'] == 'objectBrick') && (ucfirst($fields['fieldType']) == 'Input'))
                                    {
                                        $fertMethod = "get".ucfirst($fields['objectBrickType']);
                                        $fertNameMethod = "get".$fields['objectBrickName'];
                                        $method = "get".ucfirst($fieldName);
                                        $data[$fieldName] = $article->$fertMethod()->$fertNameMethod()->$method();
                                    }
                                    else if( ($fields['objectLevel'] == 'base') && ($fields['fieldLevel'] == 'class') && (ucfirst($fields['fieldType']) == 'Input'))
                                    {
                                        $method = "get".ucfirst($fieldName);
                                        $data[$fieldName] = $fifthLevelProduct->$method();
                                    }
                                    else if( ($fields['objectLevel'] == 'skeleton') && ($fields['fieldLevel'] == 'class') && (ucfirst($fields['fieldType']) == 'Input'))
                                    {
                                        $method = "get".ucfirst($fieldName);
                                        $data[$fieldName] = $productObjectLevel6->$method();
                                    }
                                }

                                if($tableSortingFieldsStatus)
                                {
                                    foreach ($tableSortingFieldsStatus as $fieldName => $tableShowStatus) {
                                        if(!$tableShowStatus)
                                        {
                                            $fieldConfig = $DynamicTableAttribute[$fieldName];

                                            if( ($fieldConfig['objectLevel'] == 'fert') && ($fieldConfig['fieldLevel'] == 'class') && (ucfirst($fieldConfig['fieldType']) == 'Input'))
                                            {
                                                $method = "get".ucfirst($fieldName);
                                                $data[$fieldName] = $article->$method();
                                            }
                                            else if( ($fieldConfig['objectLevel'] == 'fert') && ($fieldConfig['fieldLevel'] == 'objectBrick') && (ucfirst($fieldConfig['fieldType']) == 'Input'))
                                            {
                                                $fertMethod = "get".ucfirst($fieldConfig['objectBrickType']);
                                                $fertNameMethod = "get".$fieldConfig['objectBrickName'];
                                                $method = "get".ucfirst($fieldName);
                                                $data[$fieldName] = $article->$fertMethod()->$fertNameMethod()->$method();
                                            }
                                            else if( ($fieldConfig['objectLevel'] == 'base') && ($fieldConfig['fieldLevel'] == 'class') && (ucfirst($fieldConfig['fieldType']) == 'Input'))
                                            {
                                                $method = "get".ucfirst($fieldName);
                                                $data[$fieldName] = $fifthLevelProduct->$method();
                                            }
                                            else if( ($fieldConfig['objectLevel'] == 'skeleton') && ($fieldConfig['fieldLevel'] == 'class') && (ucfirst($fieldConfig['fieldType']) == 'Input'))
                                            {
                                                $method = "get".ucfirst($fieldName);
                                                $data[$fieldName] = $productObjectLevel6->$method();
                                            }
                                        }
                                    }
                                }

                                if($IsPriceCatalog)
                                {
                                    $priceData = $article->getPriceData();
                                    $listPrice = '';
                                    if($priceData)
                                    {
                                        foreach ($priceData as $rvalue) 
                                        {
                                            if(($rvalue[$priceListTableColumn['Rate Unit']] == $Currency) && ($rvalue[$priceListTableColumn['Distribution Channel']] == $distributionChannel) && ($rvalue[$priceListTableColumn['Sales Organization']] == $salesOrganisation))
                                            {
                                                $ValidityStartDate = \Carbon\Carbon::createFromFormat('Y-m-d',$rvalue[$priceListTableColumn['Validity Start Date']]);
                                                $ValidityEndDate = \Carbon\Carbon::createFromFormat('Y-m-d',$rvalue[$priceListTableColumn['Validity End Date']]);

                                                if($ValidFromDate->between($ValidityStartDate, $ValidityEndDate)) {
                                                    $listPrice = $rvalue[$priceListTableColumn['Rate']];
                                                    break;
                                                }
                                            }
                                        }
                                    }

                                    $data['listPrice'] = $listPrice;
                                }
                                $articleData[$article->getProfile()][] = $data;
                            }
                        }
                    }
                }

                if($tableSortingFields)
                {
                    foreach ($articleData as $profile => $articlesList) {
                        
                        if(count($tableSortingFields) == 1)
                        {
                            $firstSortingColumn = array_column($articleData[$profile], $tableSortingFields[0]);
                            array_multisort($firstSortingColumn, SORT_ASC, $articleData[$profile]);

                            if($needRemoveSortedField)
                            {
                                $articleData[$profile] = $this->removeSortingColumn($tableSortingFieldsStatus, $articleData[$profile]);
                            }
                        }
                        else if(count($tableSortingFields) == 2)
                        {
                            $firstSortingColumn = array_column($articleData[$profile], $tableSortingFields[0]);
                            $secondSortingColumn = array_column($articleData[$profile], $tableSortingFields[1]);

                            array_multisort($firstSortingColumn, SORT_ASC, $secondSortingColumn, SORT_ASC,$articleData[$profile]);
                            
                            if($needRemoveSortedField)
                            {
                                $articleData[$profile] = $this->removeSortingColumn($tableSortingFieldsStatus, $articleData[$profile]);
                            }
                        }
                    }
                }

                $groupData['data'] = $articleData;
                $groupData['columnsDataWithImages'] = $columnsDataWithImages;

                $footer_logo_src = $CatalogImagesPTGFooter['Orange'];
                $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);
                
                $this->view['footer_class'] = '';
                $this->view['footer_logo_src'] = $footer_logo_src;
            }
            
            $this->view['containerRequest'] = $containerRequest;    
            $this->view['groupData'] = $groupData;
        }
    }

    public function removeSortingColumn($tableSortingFieldsStatus, $articlesList){

        $removeFieldList = [];
        foreach ($tableSortingFieldsStatus as $fieldName => $status) {
            if(!$status)
            {
                $removeFieldList[] = $fieldName;
            }
        }

        foreach ($articlesList as $key => $articleData) {

            foreach ($removeFieldList as $fieldName) {
                unset($articlesList[$key][$fieldName]);
            }
        }
        return $articlesList;
    }
    public function getFiveSortedFeaturesWithIconList($safetyFeatures){
        
        $safetyFeatures = array_unique($safetyFeatures);

        $safetyFeaturesList  = array();
        $safetyFeaturesListWithImage = array();
        $safetyFeaturesListWithOutImage = array();

        if($safetyFeatures)
        {
            foreach ($safetyFeatures as $fkey => $fvalue) {
                if($this->featuresList[$fvalue]['icon'])
                {
                    if(!isset($this->s3srcArr[$fvalue]))
                    {
                        $this->s3srcArr[$fvalue] = $this->getS3ImageSrc($this->featuresList[$fvalue]['icon']);
                    }
                    $safetyFeaturesListWithImage[] = array('name'=>$this->featuresList[$fvalue]['name'], 'iconSrc' => $this->s3srcArr[$fvalue], 'SortOrder' =>$this->featuresList[$fvalue]['SortOrder']);
                }
                else
                {
                    $safetyFeaturesListWithOutImage[] = array('name'=>$this->featuresList[$fvalue]['name'], 'iconSrc' => $this->featuresList[$fvalue]['icon'], 'SortOrder' =>$this->featuresList[$fvalue]['SortOrder']);
                }
            }
        }

        if($safetyFeaturesListWithImage)
        {
            array_multisort (array_column($safetyFeaturesListWithImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithImage);
        }
        
        if($safetyFeaturesListWithOutImage)
        {
            array_multisort (array_column($safetyFeaturesListWithOutImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithOutImage);
        }

        $safetyFeaturesList = array_merge_recursive($safetyFeaturesListWithImage,$safetyFeaturesListWithOutImage);
        
        if($safetyFeaturesList)
        {
            $safetyFeaturesList = array_slice($safetyFeaturesList, 0, 5);
        }

        unset($safetyFeaturesListWithImage);
        unset($safetyFeaturesListWithOutImage);
        
        return $safetyFeaturesList;
    }

    private function getFeaturesList($language){
        $entries = new DataObject\Features\Listing();
        $entries->load();
        $featureData = array();
        foreach($entries as $entry) {
            if($entry->getIcon())
            {
                $featureData[$entry->getId()]['icon'] = $entry->getIcon()->getPath().$entry->getIcon()->getFilename();
            }

            $featureData[$entry->getId()]['name'] = $entry->getName($language);
            $featureData[$entry->getId()]['key'] = $entry->getKey();
            $featureData[$entry->getId()]['SortOrder'] = $entry->getSortOrder();
        }
        return $featureData;
    }

    public function getS3ImageSrc($src)
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);

        if($imgObj){
            $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj,$this->view->imageWidth);
        }

        return $s3src;
    }

    public function getColumnHeadersForCatalog(){

        $columnsDataWithImages = array();

        if($this->columnsData)
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
                {
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = $value['unitName'];
                }
                else
                {
                    $columnsDataWithImages[$groupColumnName][$key]['unitName'] = ($value['unitName']) ? $this->get('translator')->trans($value['unitName']) : '';
                }

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
