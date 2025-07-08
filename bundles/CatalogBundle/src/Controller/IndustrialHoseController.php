<?php

namespace CatalogBundle\Controller;

use CatalogBundle\Helper\CatalogTemplatingHelper;
use Pimcore\Db;
use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Pimcore\Controller\FrontendController;
use Pimcore\Bundle\WebToPrintBundle\Processor;

class IndustrialHoseController extends FrontendController
{
    private $s3srcArr = [];
    private $db;
    private $iconRequired = 'NO';
    private $subHeaderRequired = 'NO';
    private $attrbuteImgS3Arr = array();
    private $columnsData = array();
    private $attributeImages = array();
    private $featuresList = array();
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

    public function templateIndustrialHoseIndexByApplicationDynamicAction(Request $request)
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }
        try {
            $folderId = $this->document->getParent()->getId();
            $listing = new \Pimcore\Model\Document\Listing();
            $listing->setCondition("parentId = $folderId");
            $listing->load();
            $listing->setOrderKey("index");
            $listing->setOrder("asc");
            $templateArray = [
                'catalog/inh/inhprintcatalogproductpage.html.twig',
                'catalog/inh/inhfitting.html.twig',
            ];

            $industrial_hose_list = [];
            $industrial_hose_fitting_list = [];
            foreach ($listing as $doc) {
                if ($doc->hasChildren()) {
                    foreach ($doc->getChildren() as $key => $childDoc) {

                        if ($childDoc->hasChildren()) {
                            foreach ($childDoc->getChildren() as $key => $child2Doc) {
                                if (in_array($child2Doc->getTemplate(), $templateArray)) {
                                    if ($child2Doc->getTemplate() == 'catalog/inh/inhprintcatalogproductpage.html.twig') {
                                        $obj = $child2Doc->getEditable('industrial_hose_details');
                                        if (!empty($obj) && !empty($obj->getData())) {
                                            $dataParts = explode('$$', $obj->getData());
                                            $datam = [];
                                            if (isset($dataParts[0])) {
                                                $datam[] = $dataParts[0];
                                            }
                                            if (isset($dataParts[1])) {
                                                $datam[] = $dataParts[1];
                                            }

                                            $industrial_hose_list[] = $datam;
                                        }
                                    } elseif ($child2Doc->getTemplate() == 'catalog/inh/inhfitting.html.twig') {
                                        $obj = $child2Doc->getEditable('industrial_hose_fitting_details');
                                        if (!empty($obj) && !empty($obj->getData())) {
                                            $dataParts = explode('$$', $obj->getData());
                                            if (isset($dataParts[0]) && $dataParts[1]) {
                                                $industrial_hose_fitting_list[$dataParts[0]][] = $dataParts[1];
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            if (in_array($childDoc->getTemplate(), $templateArray)) {
                                if ($childDoc->getTemplate() == 'catalog/inh/inhprintcatalogproductpage.html.twig') {
                                    $obj = $childDoc->getEditable('industrial_hose_details');
                                    if (!empty($obj) && !empty($obj->getData())) {
                                        $dataParts = explode('$$', $obj->getData());
                                        $datam = [];
                                        if (isset($dataParts[0])) {
                                            $datam[] = $dataParts[0];
                                        }
                                        if (isset($dataParts[1])) {
                                            $datam[] = $dataParts[1];
                                        }

                                        $industrial_hose_list[] = $datam;
                                    }
                                } elseif ($childDoc->getTemplate() == 'catalog/inh/inhfitting.html.twig') {
                                    $obj = $childDoc->getEditable('industrial_hose_fitting_details');
                                    if (!empty($obj) && !empty($obj->getData())) {
                                        $dataParts = explode('$$', $obj->getData());
                                        if (isset($dataParts[0]) && $dataParts[1]) {
                                            $industrial_hose_fitting_list[$dataParts[0]][] = $dataParts[1];
                                        }
                                    }
                                }
                            }
                        }
                    }
                } else {
                    if (in_array($doc->getTemplate(), $templateArray)) {
                        if ($doc->getTemplate() == 'catalog/inh/inhprintcatalogproductpage.html.twig') {
                            $obj = $doc->getEditable('industrial_hose_details');
                            if (!empty($obj) && !empty($obj->getData())) {
                                $dataParts = explode('$$', $obj->getData());
                                $datam = [];
                                if (isset($dataParts[0])) {
                                    $datam[] = $dataParts[0];
                                }
                                if (isset($dataParts[1])) {
                                    $datam[] = $dataParts[1];
                                }

                                $industrial_hose_list[] = $datam;
                            }
                        } elseif ($doc->getTemplate() == 'catalog/inh/inhfitting.html.twig') {
                            $obj = $doc->getEditable('industrial_hose_fitting_details');
                            if (!empty($obj) && !empty($obj->getData())) {
                                $dataParts = explode('$$', $obj->getData());
                                if (isset($dataParts[0]) && $dataParts[1]) {
                                    $industrial_hose_fitting_list[$dataParts[0]][] = $dataParts[1];
                                }
                            }
                        }
                    }
                }
            }

            if ($industrial_hose_fitting_list) {
                foreach ($industrial_hose_fitting_list as $key => $value) {
                    $data = [];
                    $data[] = $key;
                    $data[] = implode(",", $value);

                    array_push($industrial_hose_list, $data);
                }
            }

            $parameterBag['data'] = $industrial_hose_list;
            return $this->render("catalog/inh/template_industrial_hose_index_by_application_dynamic.html.twig", $parameterBag);
        } catch (Exception $e) {
            return new Response($e->getMessage());
        }
    }

    public function templateIndustrialHoseIndexByAlphabetDynamicAction(Request $request)
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }
        try {
            $folderId = $this->document->getParent()->getId();
            $listing = new \Pimcore\Model\Document\Listing();
            $listing->setCondition("parentId = $folderId");
            $listing->load();
            $listing->setOrderKey("index");
            $listing->setOrder("asc");
            $templateArray = [
                'catalog/inh/inhprintcatalogproductpage.html.twig',
                'catalog/inh/inhfitting.html.twig',
            ];

            $industrial_hose_list = [];
            $allHoses = [];
            foreach ($listing as $doc) {
                if ($doc->hasChildren()) {
                    foreach ($doc->getChildren() as $key => $childDoc) {

                        if ($childDoc->hasChildren()) {
                            foreach ($childDoc->getChildren() as $key => $child2Doc) {
                                if (in_array($child2Doc->getTemplate(), $templateArray)) {
                                    if ($child2Doc->getTemplate() == 'catalog/inh/inhprintcatalogproductpage.html.twig') {
                                        $obj = $child2Doc->getEditable('industrial_hose_details');
                                        if (!empty($obj) && !empty($obj->getData())) {
                                            $dataParts = explode('$$', $obj->getData());
                                            if (isset($dataParts[1])) {
                                                $hoseslist = explode(",", $dataParts[1]);
                                                $allHoses = array_merge($allHoses, $hoseslist);
                                            }
                                        }
                                    } elseif ($child2Doc->getTemplate() == 'catalog/inh/inhfitting.html.twig') {
                                        $obj = $child2Doc->getEditable('industrial_hose_fitting_details');
                                        if (!empty($obj) && !empty($obj->getData())) {
                                            $dataParts = explode('$$', $obj->getData());
                                            if (isset($dataParts[1])) {
                                                $hoseslist = explode(",", $dataParts[1]);
                                                $allHoses = array_merge($allHoses, $hoseslist);
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            if (in_array($childDoc->getTemplate(), $templateArray)) {
                                if ($childDoc->getTemplate() == 'catalog/inh/inhprintcatalogproductpage.html.twig') {
                                    $obj = $childDoc->getEditable('industrial_hose_details');
                                    if (!empty($obj) && !empty($obj->getData())) {
                                        $dataParts = explode('$$', $obj->getData());
                                        if (isset($dataParts[1])) {
                                            $hoseslist = explode(",", $dataParts[1]);
                                            $allHoses = array_merge($allHoses, $hoseslist);
                                        }
                                    }
                                } elseif ($childDoc->getTemplate() == 'catalog/inh/inhfitting.html.twig') {
                                    $obj = $childDoc->getEditable('industrial_hose_fitting_details');
                                    if (!empty($obj) && !empty($obj->getData())) {
                                        $dataParts = explode('$$', $obj->getData());
                                        if (isset($dataParts[1])) {
                                            $hoseslist = explode(",", $dataParts[1]);
                                            $allHoses = array_merge($allHoses, $hoseslist);
                                        }
                                    }
                                }
                            }
                        }
                    }
                } else {
                    if (in_array($doc->getTemplate(), $templateArray)) {
                        if ($doc->getTemplate() == 'catalog/inh/inhprintcatalogproductpage.html.twig') {
                            $obj = $doc->getEditable('industrial_hose_details');
                            if (!empty($obj) && !empty($obj->getData())) {
                                $dataParts = explode('$$', $obj->getData());
                                if (isset($dataParts[1])) {
                                    $allHoses[] = $dataParts[1];
                                }
                            }
                        } elseif ($doc->getTemplate() == 'catalog/inh/inhfitting.html.twig') {
                            $obj = $doc->getEditable('industrial_hose_fitting_details');
                            if (!empty($obj) && !empty($obj->getData())) {
                                $dataParts = explode('$$', $obj->getData());
                                if (isset($dataParts[1])) {
                                    $allHoses[] = $dataParts[1];
                                }
                            }
                        }
                    }
                }
            }

            sort($allHoses);

            $industrial_hose_list_alphabet_sorted = [];
            if ($allHoses) {
                foreach ($allHoses as $key => $hose) {

                    $alphabetChar = $hose[0];
                    $industrial_hose_list[$alphabetChar][] = $hose;
                }

                if ($industrial_hose_list) {
                    foreach ($industrial_hose_list as $key => $value) {

                        $data = [];
                        $data[] = $key;
                        $data[] = implode(",", $value);
                        $industrial_hose_list_alphabet_sorted[] = $data;
                    }
                }
            }

            $parameterBag['data'] = $industrial_hose_list_alphabet_sorted;
            return $this->render("catalog/inh/template_industrial_hose_index_by_alphabet_dynamic.html.twig", $parameterBag);
        } catch (Exception $e) {
            return new Response($e->getMessage());
        }
    }

    public function templateIndustrialHoseTableOfContentsDynamicAction(Request $request)
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }

        try {
            $folderId = $this->document->getParent()->getId();
            $listing = new \Pimcore\Model\Document\Listing();
            $listing->setCondition("parentId = $folderId");
            $listing->load();
            $listing->setOrderKey("index");
            $listing->setOrder("asc");
            $templateArray = [
                'catalog/inh/inhprintcatalogproductpage.html.twig'
            ];

            $industrial_hose_list = [];
            foreach ($listing as $doc) {
                if ($doc->hasChildren()) {
                    foreach ($doc->getChildren() as $key => $childDoc) {

                        if ($childDoc->hasChildren()) {
                            foreach ($childDoc->getChildren() as $key => $child2Doc) {
                                if (in_array($child2Doc->getTemplate(), $templateArray)) {
                                    $obj = $child2Doc->getEditable('industrial_hose_details');
                                    if (!empty($obj) && !empty($obj->getData())) {
                                        $dataParts = explode('$$', $obj->getData());
                                        if (isset($dataParts[0])) {
                                            $dataParts2 = explode(':', $dataParts[0]);
                                            $industrial_hose_list[$dataParts2[0]][] = trim($dataParts2[1]);
                                        }
                                    }
                                }
                            }
                        } else {
                            if (in_array($childDoc->getTemplate(), $templateArray)) {

                                $obj = $childDoc->getEditable('industrial_hose_details');
                                if (!empty($obj) && !empty($obj->getData())) {
                                    $dataParts = explode('$$', $obj->getData());
                                    if (isset($dataParts[0])) {
                                        $dataParts2 = explode(':', $dataParts[0]);
                                        $industrial_hose_list[$dataParts2[0]][] = trim($dataParts2[1]);
                                    }
                                }
                            }
                        }
                    }
                } else {
                    if (in_array($doc->getTemplate(), $templateArray)) {

                        $obj = $doc->getEditable('industrial_hose_details');
                        if (!empty($obj) && !empty($obj->getData())) {
                            $dataParts = explode('$$', $obj->getData());
                            if (isset($dataParts[0])) {
                                $dataParts2 = explode(':', $dataParts[0]);
                                $industrial_hose_list[$dataParts2[0]][] = trim($dataParts2[1]);
                            }
                        }
                    }
                }
            }

            $application_host_list = [];
            $toc_data = [];
            if ($industrial_hose_list) {
                foreach ($industrial_hose_list as $key => $value) {
                    $data = [];
                    $data[] = $key;
                    $data[] = implode(",", $value);
                    $application_host_list[] = $data;
                }

                if ($application_host_list) {
                    $contiTech_industrial_hose[] = 'ContiTech Industrial Hose';
                    $contiTech_industrial_hose[] = $application_host_list;
                    $toc_data[] = $contiTech_industrial_hose;
                }
            }

            $parameterBag['data'] = $toc_data;
            return $this->render("catalog/inh/template_industrial_hose_table_of_contents_dynamic.html.twig", $parameterBag);
        } catch (Exception $e) {
            return new Response($e->getMessage());
        }
    }


    /**
     * @Route("/catalog/inh/sectionpage");
     * INH Section Page
     * This template will pick the rendering columns from "industrialhose-sectionpage-column.yml"
     * and data will be picked from data table
     * 3rd level category will be used as attribute table name to get rendering column list from configuration file
     */
    public function inhPrintCatalogAction(Request $request)
    {
        $inhSectionPageConfig = $this->containerInterface->get('app.config_provider_service')->getINHSectionPageConfig()['parameters'];
        $catalogImagesINHFooter = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['CatalogImagesINHFooter'];

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }

        $templateEditable = $this->document->getEditable('inh-printcatalog');

        if ($templateEditable && $templateEditable->getElement() != null) {
            $template = $templateEditable->getElement();

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
            $catalogLanguage = $catalogObj->getCatalogLanguage();
            $lang = $catalogLanguage;
            $footerBgColor = $template->getColor();

            $siop = $template->getSiopLevel4();
            $siopObj = $this->getSiopObject($siop);
            $configTableName = $tableName = "0410001010";
            $siop4Description = '';
            if ($siopObj != null) {
                $tableName = $siopObj->getParent()->getFullCode();
                $siop4Description = ($siopObj->getPrintedCatalogDescription($lang)) ? $siopObj->getPrintedCatalogDescription($lang) : $siopObj->getDescription($lang);
                $configTableName = ($siopObj->getParent()->getPrintedCatalogDescription($lang)) ? $siopObj->getParent()->getPrintedCatalogDescription($lang) : $siopObj->getParent()->getDescription($lang);
            }

            $headers = (array) json_decode($template->getHeaderData());

            $productPageColumns = $inhSectionPageConfig[$tableName];
            $data = array();

            if ($headers && $productPageColumns) {
                foreach ($productPageColumns['dispColumns'] as $key => $value) {
                    $productPageColumns['dispColumns'][$key]['title'] = $this->translatorInterface->trans($key);
                }

                $headerKeys = array_keys($headers);
                $headerKeys[] = 'ConstructionType';

                $brandsList = $this->getBrandsList();

                // Getting all siop level 4
                $query = "select oo_id, ConstructionType from object_localized_2_{$catalogLanguage} where level IN (3,4) ";
                $constructionTypeList = \Pimcore\Db\Helper::fetchPairs($this->db, $query);

                $productMinMaxPressure = [];
                if (is_array($template->getProductsData()) && !empty($template->getProductsData())) {
                    foreach ($template->getProductsData() as $row) {
                        $row[] = '';
                        $newRow = array_combine($headerKeys, $row);

                        $query = "select TRIM( BOTH ',' FROM SIOPLevel4)  from object_query_1 where oo_id IN (" . $newRow['id'] . ") ";
                        $siopLevel4Id = $this->db->fetchOne($query);

                        if (isset($constructionTypeList[$siopLevel4Id])) {
                            $newRow['ConstructionType'] = $constructionTypeList[$siopLevel4Id];
                        }

                        $productsData[] = $newRow;

                        if (isset($newRow['brandName'][0])) {
                            $productMinMaxPressure[$newRow['brandName']][] = $newRow['workingPressurePSI'] ?? null;
                        }
                    }

                    foreach ($productsData as $row) {

                        if (isset($row['brandName']) && !empty($row['brandName'])) {
                            $uniqueId = $configTableName;
                            $brandName = $row['brandName'];
                            if (!isset($data[$uniqueId])) {
                                $data[$uniqueId]['columns'] = $productPageColumns['columns'];
                                $data[$uniqueId]['dispColumns'] = $productPageColumns['dispColumns'];
                            }

                            foreach ($productPageColumns['columns'] as $col) {
                                if (isset($row[$col])) {
                                    if (!isset($data[$uniqueId]['data'][$brandName][$col])) {
                                        $data[$uniqueId]['data'][$brandName][$col] = "";
                                    }
                                    if (empty($data[$uniqueId]['data'][$brandName][$col])) {

                                        if ($col == 'workingPressurePSI') {
                                            $productMinPressure = min($productMinMaxPressure[$brandName]);
                                            $productMaxPressure = max($productMinMaxPressure[$brandName]);
                                            $wpString = ($productMinPressure == $productMaxPressure) ? $productMinPressure : $productMinPressure . " - " . $productMaxPressure;
                                            $data[$uniqueId]['data'][$brandName][$col] = $wpString;
                                        } else {
                                            $data[$uniqueId]['data'][$brandName][$col] = $row[$col];
                                        }
                                    }
                                }
                            }
                            if (isset($data[$uniqueId]['data'][$brandName]['SortOrder'])) {
                                if (array_key_exists($brandName,$data[$uniqueId]['data']) && isset($data[$uniqueId]['data'][$brandName])) {
                                        
                                    $data[$uniqueId]['data'][$brandName]['SortOrder'] = $brandsList[$brandName]['SortOrder'];
                                }

                                if (isset($data[$uniqueId]['data']['SortOrder'])) {
                                    array_multisort(array_column($data[$uniqueId]['data'], 'SortOrder'), SORT_ASC, $data[$uniqueId]['data']);
                                }
                            }
                        }
                    }
                }
            }

            $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesINHFooter['Black'] : $catalogImagesINHFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $categories = $this->getSIOP($lang, 'IFS');
            $parameterBag['info'] = array(
                'configTableName' => $configTableName,
                'siop4Description' => $siop4Description,
                'data' => $data,
                'categories' => $categories,
                'footer_class' => (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '',
                'footer_logo_src' => $footer_logo_src,
            );
        }
        return $this->render("catalog/inh/inhprintcatalog.html.twig", $parameterBag);
    }

    /**
     * @Route ("/catalog/inh/productpage")
     *
     */
    public function inhPrintCatalogProductPageAction(Request $request)
    {
        $inhProductPageConfig = $this->containerInterface->get('app.config_provider_service')->getINHProductPageConfig()['parameters'];
        $this->attributeImages = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['attributeImages'];
        $catalogImagesINHFooter = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['CatalogImagesINHFooter'];
        $catalogImagesINHProduct = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig()['parameters']['CatalogImagesINHProduct'];

        $brandsData = array();
		$className = "";
        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }
        $tableClass = \AppBundle\Helper\Common::cleanString( $this->document->getKey());
        $templateEditable = $this->document->getEditable('inh-printcatalogproduct');
        if ($templateEditable && $templateEditable->getElement() != null) {
            $template = $templateEditable->getElement();
            if($template){
				
			$className = $template->getClassName();
			$productsData = $template->getProductsData();
			$headerData = json_decode($template->getHeaderData(), true);
            $headerKeys = array_keys($headerData);
            $headerKeysIndex = array_flip($headerKeys); 
			$catalogLanguage = "";
			if($className == "SpecSheetCatalog"){
				$catalogLanguage = $template->getCatalogLanguage();
				
				$SAPRange = $template->getSAPRange();
				if($SAPRange == "Custom Selection") {
				$id = $template->getId();
					$query = "Select * from specsheet_custom_selection where object_id=$id";
					$row = $this->db->fetchAllAssociative($query);
					if(isset($row[0])){
						$exCludes = $row[0]['data'];
						if(!empty($exCludes)) {
						$includeArticles = explode(",",$exCludes);

						foreach ($productsData as $key => $productItem) {
							if(!in_array($productItem[$headerKeysIndex['articleNumber']], $includeArticles)){
								unset($productsData[$key]);
							}
						}
						}
					}
				}
				
			} else {
				$catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
				$catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());
				$catalogLanguage = $catalogObj->getCatalogLanguage();
			}
			if(empty($catalogLanguage)){
				$catalogLanguage = "en";
			}
                $footerBgColor = $template->getColor();

               

                $objColumnsData = $template->getColumns();
                $this->columnsData = json_decode($objColumnsData, true);

                $this->iconRequired = 'YES';

                $brandsList = $this->getBrandsList();
                $this->featuresList = $this->getFeaturesList('', $catalogLanguage);


                $query = "select oo_id, Level, description, PrintedCatalogDescription from object_localized_2_{$catalogLanguage} where level IN (3,4) ";

                $categoriesdb = $this->db->fetchAllAssociative($query);

                $categoriesList = array();

                foreach ($categoriesdb as $key => $value) {
                    $categoriesList[$value['oo_id']] = $value;
                }
                unset($categoriesdb);


                if ($productsData) {
                    $brandsData = array();
                    foreach ($productsData as $key => $item) {
                        if (isset($headerKeysIndex['brandName']) && isset($item[$headerKeysIndex['brandName']])) {
                            if(is_array($item[$headerKeysIndex['brandName']])){
                                if(isset($item[$headerKeysIndex['brandName']][0])){
                                    $brandsData[$item[$headerKeysIndex['brandName']][0]][] = $item;
                                }
                                
                            }else{
                                 $brandsData[$item[$headerKeysIndex['brandName']]][] = $item;
                            }
                            unset($item);
                        }
                    }

                    unset($productsData);
                }

                $siop4Description = '';
                $siop3Description = '';

                $newBrandArray = array();
                if ($brandsData) {
                    // Sorting Array by HoseIDMm
                    foreach ($brandsData as $sortKey => $sortBrand) {
                        if (isset($brandsData[$sortKey])) {
                            if (isset($headerKeysIndex['hoseIdMM'], $headerKeysIndex['hoseLengthFT'])) {
                                $hoseIdMMValues = array_column($brandsData[$sortKey], $headerKeysIndex['hoseIdMM']);
                                $hoseLengthFTValues = array_column($brandsData[$sortKey], $headerKeysIndex['hoseLengthFT']);

                                array_multisort(
                                    $hoseIdMMValues, SORT_ASC,
                                    $hoseLengthFTValues, SORT_ASC,
                                    $brandsData[$sortKey]
                                );
                            }
                        }
                    }

                    foreach ($brandsData as $key => $brand) {
                        $reinforcementArr = array();
                        $designFactorArr = array();
                        $designFactorArray = array();
                        $tubeMaterialArr = array();
                        $coverMaterialArr = array();

                        $designFactorStr = '';
                        $tubeMaterialStr = '';
                        $coverMaterialStr = '';
                        $brandingLayline = '';
                        $virtualCatalogReinforcement = '';
                        $virtualCatalogTubeMaterial = '';
                        $virtualCatalogCoverMaterial = '';
                        $leftImage = '';
                        $temperatureRangeFAndC = '';
                        $coupling = '';
                        $packaging = '';
                        $longDescription = '';
                        $featuresBenefitsBulletPointArr = array();
                        $oldMaterialCodeArr = array();

                        foreach ($brand as $bvalue) {
                            $groupingFieldName = null;
                            if(array_key_exists($key, $brandsList)){
                                $groupingFieldName = $brandsList[$key]['GroupingFieldName'];
                            }
                            $groupingFieldNameValue = null;
                            if ($groupingFieldName && isset($headerKeysIndex[$groupingFieldName]) && isset($bvalue[$headerKeysIndex[$groupingFieldName]])) {
                                $groupingFieldNameValue = $bvalue[$headerKeysIndex[$groupingFieldName]];
                            }


                            if (is_array($groupingFieldNameValue)) {
                                $groupingFieldNameValue = implode(",", $groupingFieldNameValue);
                            }

                            $fittingTableName = null;
                            $fittingTableKeys = null;
                            if (
                                isset($headerKeysIndex['FittingTableName']) &&
                                isset($bvalue[$headerKeysIndex['FittingTableName']]) &&
                                $bvalue[$headerKeysIndex['FittingTableName']]
                            ) {
                                $fittingTableName = $bvalue[$headerKeysIndex['FittingTableName']];
                                $fittingTableKeys = $inhProductPageConfig[$fittingTableName]['columns'];
                                $fittingTableColWidths = $inhProductPageConfig[$fittingTableName]['widthSetting'];
                            }

                            if (
                                $fittingTableName &&
                                is_array($fittingTableKeys) &&
                                isset($headerKeysIndex['id']) &&
                                isset($bvalue[$headerKeysIndex['id']])
                            ) {
                                $query = "select SIOPLevel3, SIOPLevel4 from object_query_1 where oo_id = '" . $bvalue[$headerKeysIndex['id']] . "'";

                                $record = $this->db->fetchAssociative($query);
                                $siopLevel3 = trim($record['SIOPLevel3'], ',');
                                $siopLevel4 = trim($record['SIOPLevel4'], ',');

                                if (!$siop3Description && $siopLevel3) {
                                    $siop3Description = !empty($categoriesList[$siopLevel3]['PrintedCatalogDescription']) ? $categoriesList[$siopLevel3]['PrintedCatalogDescription'] : $categoriesList[$siopLevel3]['description'];
                                }

                                if (!$siop4Description && $siopLevel4) {
                                    $siop4Description = !empty($categoriesList[$siopLevel4]['PrintedCatalogDescription']) ? $categoriesList[$siopLevel4]['PrintedCatalogDescription'] : $categoriesList[$siopLevel4]['description'];
                                }

                                $sixDigitVirtualCatalogDescription = '';
                                if (array_key_exists('sixDigitVirtualCatalogDescription', $headerKeysIndex) && $bvalue[$headerKeysIndex['sixDigitVirtualCatalogDescription']]) {
                                    $sixDigitVirtualCatalogDescription = $bvalue[$headerKeysIndex['sixDigitVirtualCatalogDescription']];
                                }

                                if (array_key_exists('oldMaterialCode', $headerKeysIndex) && isset($bvalue[$headerKeysIndex['oldMaterialCode']]) && !empty($bvalue[$headerKeysIndex['oldMaterialCode']]) && $bvalue[$headerKeysIndex['oldMaterialCode']] !== 'N/A') {
                                    $sixDigit = substr($bvalue[$headerKeysIndex['oldMaterialCode']], 0, 6);
                                    $sixDigitDevidedIntoTwoArray = str_split($sixDigit, 3);
                                    $sixDigitDashedString = implode('-', $sixDigitDevidedIntoTwoArray);
                                    $oldMaterialCodeArr[$groupingFieldNameValue][] = $sixDigitDashedString . " " . $sixDigitVirtualCatalogDescription;
                                }

                                if (array_key_exists('reinforcement', $headerKeysIndex) && $bvalue[$headerKeysIndex['reinforcement']]) {
                                    if(is_array($bvalue[$headerKeysIndex['reinforcement']])){
                                        $arr_reinforcement = explode('||', $bvalue[$headerKeysIndex['reinforcement']][0]);
                                    }else{
                                        $arr_reinforcement = explode('||', $bvalue[$headerKeysIndex['reinforcement']]);
                                    }
                                    $reinforcementArr = array_merge($reinforcementArr, $arr_reinforcement);
                                }

                                if (array_key_exists('safetyFactor', $headerKeysIndex) && $bvalue[$headerKeysIndex['safetyFactor']]) {
                                    $safetyFactor = ((is_array($bvalue[$headerKeysIndex['safetyFactor']]))?$bvalue[$headerKeysIndex['safetyFactor']][0]:$bvalue[$headerKeysIndex['safetyFactor']]);
                                    $arr_safetyFactor = explode('||', $safetyFactor);
                                    $designFactorArr = array_merge($designFactorArr, $arr_safetyFactor);
                                }

                                if (
                                    !$brandingLayline &&
                                    isset($headerKeysIndex['BrandingLayline']) &&
                                    !empty($bvalue[$headerKeysIndex['BrandingLayline']])
                                ) {
                                    $brandingLayline = $bvalue[$headerKeysIndex['BrandingLayline']];
                                }

                                if (
                                    !$virtualCatalogReinforcement &&
                                    isset($headerKeysIndex['VirtualCatalogReinforcement']) &&
                                    !empty($bvalue[$headerKeysIndex['VirtualCatalogReinforcement']])
                                ) {
                                    $virtualCatalogReinforcement = $bvalue[$headerKeysIndex['VirtualCatalogReinforcement']];
                                }

                                if (array_key_exists('tubeMaterial', $headerKeysIndex) && $bvalue[$headerKeysIndex['tubeMaterial']]) {
                                    if(is_array($bvalue[$headerKeysIndex['tubeMaterial']])){
                                        $arr_tubeMaterial = explode('||', $bvalue[$headerKeysIndex['tubeMaterial']][0]);
                                    }else{
                                        $arr_tubeMaterial = explode('||', $bvalue[$headerKeysIndex['tubeMaterial']]);
                                    }
                                    $tubeMaterialArr = array_merge($tubeMaterialArr, $arr_tubeMaterial);
                                }

                                if (
                                    !$virtualCatalogTubeMaterial &&
                                    isset($headerKeysIndex['VirtualCatalogTubeMaterial']) &&
                                    !empty($bvalue[$headerKeysIndex['VirtualCatalogTubeMaterial']])
                                ) {
                                    $virtualCatalogTubeMaterial = $bvalue[$headerKeysIndex['VirtualCatalogTubeMaterial']];
                                }

                                if (array_key_exists('coverMaterial', $headerKeysIndex) && $bvalue[$headerKeysIndex['coverMaterial']]) {
                                    if(is_array($bvalue[$headerKeysIndex['coverMaterial']])){
                                        $arr_coverMaterial = explode('||', $bvalue[$headerKeysIndex['coverMaterial']][0]);
                                    }else{
                                        $arr_coverMaterial = explode('||', $bvalue[$headerKeysIndex['coverMaterial']]);
                                    }
                                    $coverMaterialArr = array_merge($tubeMaterialArr, $arr_coverMaterial);
                                }

                                if (
                                    !$virtualCatalogCoverMaterial &&
                                    isset($headerKeysIndex['VirtualCatalogCoverMaterial']) &&
                                    !empty($bvalue[$headerKeysIndex['VirtualCatalogCoverMaterial']])
                                ) {
                                    $virtualCatalogCoverMaterial = $bvalue[$headerKeysIndex['VirtualCatalogCoverMaterial']];
                                }

                                if (
                                    !$leftImage &&
                                    isset($headerKeysIndex['LeftPrintCatalogImage']) &&
                                    isset($bvalue[$headerKeysIndex['LeftPrintCatalogImage']])
                                ) {
                                    $leftImage = \Pimcore\Model\Asset::getByPath($bvalue[$headerKeysIndex['LeftPrintCatalogImage']]);
                                }

                                if (
                                    !$temperatureRangeFAndC &&
                                    isset($headerKeysIndex['temperatureRangeFAndC']) &&
                                    !empty($bvalue[$headerKeysIndex['temperatureRangeFAndC']])
                                ) {
                                    $temperatureRangeFAndC = "<ul><li>" . $bvalue[$headerKeysIndex['temperatureRangeFAndC']];
                                }

                                if (
                                    !$coupling &&
                                    isset($headerKeysIndex['Coupling']) &&
                                    !empty($bvalue[$headerKeysIndex['Coupling']])
                                ) {
                                    $coupling = nl2br($bvalue[$headerKeysIndex['Coupling']]);
                                }

                                if (
                                    !$packaging &&
                                    isset($headerKeysIndex['Packaging']) &&
                                    !empty($bvalue[$headerKeysIndex['Packaging']])
                                ) {
                                    $packaging = nl2br($bvalue[$headerKeysIndex['Packaging']]);
                                }

                                if (
                                    !$longDescription &&
                                    isset($headerKeysIndex['longDescription']) &&
                                    isset($bvalue[$headerKeysIndex['longDescription']])
                                ) {
                                    $longDescription = $bvalue[$headerKeysIndex['longDescription']];
                                }

                                if (array_key_exists('FeaturesBenefitsBulletPoint', $headerKeysIndex) && $bvalue[$headerKeysIndex['FeaturesBenefitsBulletPoint']]) {
                                    if(is_array($bvalue[$headerKeysIndex['FeaturesBenefitsBulletPoint']])){
                                        $arr_FeaturesBenefitsBulletPoint = explode('||', $bvalue[$headerKeysIndex['FeaturesBenefitsBulletPoint']][0]);
                                    }else{
                                        $arr_FeaturesBenefitsBulletPoint = explode('||', $bvalue[$headerKeysIndex['FeaturesBenefitsBulletPoint']]);
                                    }
                                    if (count($arr_FeaturesBenefitsBulletPoint) > 0) {
                                        foreach ($arr_FeaturesBenefitsBulletPoint as $feature) {
                                            array_push($featuresBenefitsBulletPointArr, $feature);
                                        }
                                    }
                                }

                                $articlesData = array();
                                $this->subHeaderRequired = 'NO';
                                $columnsDataWithImages = $this->getColumnHeadersForCatalog(TRUE, $fittingTableKeys, $fittingTableColWidths);

                                // Getting order of the keys
                                $orderKeys = array();
                                foreach ($columnsDataWithImages as $svalue) {
                                    foreach ($svalue as $vvalue) {
                                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                                    }
                                }

                                foreach ($orderKeys as $ckey => $cvalue) {
                                    if ($ckey == 'coverColor') {
                                        $temp = '';
                                        if(is_array($bvalue[$headerKeysIndex[$ckey]])){
                                            $arr_coverColor = explode('||', $bvalue[$headerKeysIndex[$ckey]][0]);
                                        }else{
                                            $arr_coverColor = explode('||', $bvalue[$headerKeysIndex[$ckey]]);
                                        }

                                        if ($arr_coverColor) {
                                            $temp = implode(', ', $arr_coverColor);
                                        }
                                    } else {
                                        $temp = $bvalue[$headerKeysIndex[$ckey]];
                                    }

                                    $articlesData[] = $temp;
                                }

                                $oldMaterialCodeStr = '';
                                if (!empty($oldMaterialCodeArr[$groupingFieldNameValue])) {
                                    $oldMaterialCodeStr = implode(', ', array_unique($oldMaterialCodeArr[$groupingFieldNameValue]));
                                }

                                $newBrandArray[$key]['articleData'][$groupingFieldNameValue][$fittingTableName]['orderCodes'] = $oldMaterialCodeStr;
                                $newBrandArray[$key]['articleData'][$groupingFieldNameValue][$fittingTableName]['subHeaderRequired'] = $this->subHeaderRequired;
                                $newBrandArray[$key]['articleData'][$groupingFieldNameValue][$fittingTableName]['columnsDataWithImages'] = $columnsDataWithImages;
                                $newBrandArray[$key]['articleData'][$groupingFieldNameValue][$fittingTableName]['articles'][] = $articlesData;
                            }
                        }

                        if ($newBrandArray && isset($newBrandArray[$key]['articleData'])) {
                            ksort($newBrandArray[$key]['articleData']);
                        }

                        $reinforcementStr = strip_tags($virtualCatalogReinforcement, "<ul><li><span><strong>");
                        if (empty($reinforcementStr) && $reinforcementArr) {
                            $reinforcementStr = implode(', ', array_unique($reinforcementArr));
                        }

                        if ($designFactorArr) {
                            $uniqueDesignFactor = array_unique($designFactorArr);
                            foreach ($uniqueDesignFactor as $eachDesignFactor) {
                                $designFactorArray[] = "<ul><li>" . $eachDesignFactor;
                            }
                            $designFactorStr = implode(', ', $designFactorArray);
                        }

                        $tubeMaterialStr = strip_tags($virtualCatalogTubeMaterial, "<ul><li><span><strong>");
                        if (empty($tubeMaterialStr) && $tubeMaterialArr) {
                            $tubeMaterialStr = implode(', ', array_unique($tubeMaterialArr));
                        }

                        $coverMaterialStr = strip_tags($virtualCatalogCoverMaterial, "<ul><li><span><strong>");
                        if (empty($coverMaterialStr) && $coverMaterialArr) {
                            $coverMaterialStr = implode(', ', array_unique($coverMaterialArr));
                        }

                        $newBrandArray[$key]['brandData']['SIOP3Description'] = $siop3Description;
                        $newBrandArray[$key]['brandData']['SIOP4Description'] = $siop4Description;
                        $newBrandArray[$key]['brandData']['BrandingLayline'] = $brandingLayline;
                        $newBrandArray[$key]['brandData']['reinforcement'] = $reinforcementStr;
                        $newBrandArray[$key]['brandData']['designFactor'] = $designFactorStr;

                        $newBrandArray[$key]['brandData']['tubeMaterial'] = $tubeMaterialStr;
                        $newBrandArray[$key]['brandData']['coverMaterial'] = $coverMaterialStr;
                        $newBrandArray[$key]['brandData']['LeftPrintCatalogImage'] = $leftImage;
                        $newBrandArray[$key]['brandData']['temperatureRangeFAndC'] = $temperatureRangeFAndC;
                        $newBrandArray[$key]['brandData']['Coupling'] = $coupling;
                        $newBrandArray[$key]['brandData']['Packaging'] = $packaging;
                        $newBrandArray[$key]['brandData']['longDescription'] = $longDescription;

                        $safetyFeaturesList = $this->getFiveSortedFeaturesWithIconList($featuresBenefitsBulletPointArr);

                        unset($reinforcementArr);
                        unset($designFactorArr);
                        unset($tubeMaterialArr);
                        unset($coverMaterialArr);
                        unset($featuresBenefitsBulletPointArr);

                        $newBrandArray[$key]['brandData']['safetyFeatures'] = $safetyFeaturesList;
                        if(array_key_exists($key, $brandsList)){
                            $newBrandArray[$key]['SortOrder'] = $brandsList[$key]['SortOrder'];
                        }else{
                            $newBrandArray[$key]['SortOrder'] = '';
                        }

                        unset($brandsData[$key]);
                    }
                }

                if ($newBrandArray) {
                    array_multisort(array_column($newBrandArray, 'SortOrder'), SORT_ASC, $newBrandArray);
                }
				
				$categories = [];
				if($className == "CatalogTables"){
					$categories = $this->getSIOP($catalogLanguage, 'IFS');
				}
                $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesINHFooter['Black'] : $catalogImagesINHFooter['Orange'];
                $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

                $brandingImageSrc = $catalogImagesINHProduct['BrandingImage'];
                $brandingImageSrc = $this->getS3ImageSrc($brandingImageSrc);

                unset($objColumnsData);

                $parameterBag['info'] = array(
                    'iconRequired' => $this->iconRequired,
                    'brandsData' => $newBrandArray,
                    'categories' => $categories,
                    'selectedCategory' => $siop3Description,
                    'branding_image_src' => $brandingImageSrc,
                    'footer_class' => (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '',
                    'footer_logo_src' => $footer_logo_src,
					'className' => $className
                );
                $parameterBag['table_class']= $tableClass;
            }
        }
		
        return $this->render("catalog/inh/inhprintspecsheetproductpage.html.twig", $parameterBag);
    }


    /**
     * @Route ("/catalog/inh/fittingpage")
     *
     */
    public function inhFittingPageAction(Request $request)
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }

        $templateEditable = $this->document->getEditable('inh_fitting_page');
        if ($templateEditable && $templateEditable->getElement() != null) {
            $template = $templateEditable->getElement();
            $commonHelper = $this->containerInterface->get('app.common_helper');
            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();

            $this->attributeImages = $commonHelper->getParameter($attributeImagesConfig, 'attributeImages');
            $catalogImagesINHFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesINHFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($template->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());

            $catalogLanguage = $catalogObj->getCatalogLanguage();

            $footerBgColor = $template->getColor();
            $productsData = $template->getProductsData();
            $headerData = json_decode($template->getHeaderData(), true);
            $groupData = '';
            $footer_logo_src = '';

            if ($headerData) {
                $headerKeys = array_keys($headerData);
                $headerKeysIndex = array_flip($headerKeys);

                $objColumnsData = $template->getColumns();
                $this->columnsData = json_decode($objColumnsData, true);

                $menuCategories = $this->getSIOP($catalogLanguage);

                $this->iconRequired = 'YES';
                $this->subHeaderRequired = 'NO';

                $columnsDataWithImages = $this->getColumnHeadersForCatalog(false, []);

                unset($objColumnsData);

                // Getting order of the keys
                $orderKeys = array();
                foreach ($columnsDataWithImages as $svalue) {
                    foreach ($svalue as $vvalue) {
                        $orderKeys[$vvalue['columnName']] = $headerKeysIndex[$vvalue['columnName']];
                    }
                }

                $this->featuresList = $this->getFeaturesList('', $catalogLanguage);

                $query = "select oo_id, Level, description, PrintedCatalogDescription from object_localized_2_{$catalogLanguage} where level IN (3,4) ";
                $categories = $this->db->fetchAllAssociative($query);

                $categoriesList = array();

                foreach ($categories as $value) {
                    $categoriesList[$value['oo_id']] = $value;
                }
                unset($categories);

                $brandName = '';
                $pressureRating = '';
                $catagoryDescription = array();
                $mainImageObj = '';
                $profileDimensionImageObj = '';
                $material = array();
                $longDescription = '';
                $brandingLayline = '';
                $safetyFeatures = array();
                $orderCode = array();

                if ($productsData) {
                    foreach ($productsData as $item) {
                        if ($item[$headerKeysIndex['brandName']]) {
                            $query = "select oldMaterialCode, SIOPLevel3, SIOPLevel4 from object_query_1 where oo_id = '" . $item[$headerKeysIndex['id']] . "'";

                            $record = $this->db->fetchAssociative($query);
                            $siopLevel3 = trim($record['SIOPLevel3'], ',');
                            $siopLevel4 = trim($record['SIOPLevel4'], ',');

                            if (!$brandName && $item[$headerKeysIndex['brandName']]) {
                                $brandName = $item[$headerKeysIndex['brandName']][0];
                            }

                            if (isset($record['oldMaterialCode']) && !empty($record['oldMaterialCode']) && $record['oldMaterialCode'] !== 'N/A') {
                                $orderCode[] = substr($record['oldMaterialCode'], 0, 6);
                            }

                            if (!isset($catagoryDescription['SIOP3Description']) && $siopLevel3) {
                                $catagoryDescription['SIOP3Description'] = !empty($categoriesList[$siopLevel3]['PrintedCatalogDescription']) ? $categoriesList[$siopLevel3]['PrintedCatalogDescription'] : $categoriesList[$siopLevel3]['description'];
                            }

                            if (!isset($catagoryDescription['SIOP4Description']) && $record['SIOPLevel4']) {
                                $catagoryDescription['SIOP4Description'] = !empty($categoriesList[$siopLevel4]['PrintedCatalogDescription']) ? $categoriesList[$siopLevel4]['PrintedCatalogDescription'] : $categoriesList[$siopLevel4]['description'];
                            }

                            if (!$pressureRating && $item[$headerKeysIndex['PressureRatingPSI']]) {
                                $pressureRating = $item[$headerKeysIndex['PressureRatingPSI']];
                            }

                            if (!$mainImageObj && $item[$headerKeysIndex['mainImage']]) {
                                $mainImageObj = \Pimcore\Model\Asset::getByPath($item[$headerKeysIndex['mainImage']]);
                            }

                            if (!$profileDimensionImageObj && $item[$headerKeysIndex['ProfileDimensionImage']]) {
                                $profileDimensionImageObj = \Pimcore\Model\Asset::getByPath($item[$headerKeysIndex['ProfileDimensionImage']]);
                            }

                            if ($item[$headerKeysIndex['FittingMaterial']]) {
                                $material[] = $item[$headerKeysIndex['FittingMaterial']];
                            }

                            if ($item[$headerKeysIndex['BrandingLayline']] && empty($brandingLayline)) {
                                $brandingLayline = $item[$headerKeysIndex['BrandingLayline']];
                            }

                            if ($item[$headerKeysIndex['longDescription']] && empty($longDescription)) {
                                $longDescription = $item[$headerKeysIndex['longDescription']];
                            }

                            if ($item[$headerKeysIndex['FeaturesBenefitsBulletPoint']]) {
                                foreach ($item[$headerKeysIndex['FeaturesBenefitsBulletPoint']] as $feature) {
                                    array_push($safetyFeatures, $feature);
                                }
                            }

                            foreach ($orderKeys as $cvalue) {
                                $articlesData[] = $item[$cvalue];
                            }

                            $brandsData[] = $articlesData;
                            unset($articlesData);
                        }
                    }

                    $brandingStr = $brandingLayline;

                    $safetyFeaturesList = $this->getFiveSortedFeaturesWithIconList($safetyFeatures);

                    unset($safetyFeatures);

                    $material = array_unique($material);
                    $orderCodeArr = array_unique($orderCode);

                    $materialStr = implode(', ', $material);
                    $orderCodeStr = implode(', ', $orderCodeArr);

                    unset($material);
                    unset($orderCodeArr);
                    unset($safetyFeatures);

                    $groupData = array();
                    $groupData['subHeaderRequired'] = $this->subHeaderRequired;
                    $groupData['iconRequired'] = $this->iconRequired;
                    $groupData['material'] = $materialStr;
                    $groupData['pressureRating'] = $pressureRating;
                    $groupData['brandingLayline'] = $brandingStr;
                    $groupData['orderCodes'] = $orderCodeStr;
                    $groupData['safetyFeatures'] = $safetyFeaturesList;
                    $groupData['mainImageObj'] = $mainImageObj;
                    $groupData['ProfileDimensionImageObj'] = $profileDimensionImageObj;
                    $groupData['longDescription'] = $longDescription;
                    $groupData['data'] = $brandsData;
                    $groupData['columnsDataWithImages'] = $columnsDataWithImages;
                    $groupData['brandName'] = $brandName;
                    $groupData['categories'] = $menuCategories;
                    $groupData['selectedCategory'] = $catagoryDescription['SIOP3Description'];
                    $groupData['siop4Category'] = $catagoryDescription['SIOP4Description'];
                    $groupData['siop3Category'] = $catagoryDescription['SIOP3Description'];
                    unset($menuCategories);
                    unset($brandsData);
                    unset($mainImageObj);
                    unset($profileDimensionImageObj);

                    $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesINHFooter['Black'] : $catalogImagesINHFooter['Orange'];
                    $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);
                }
            }
            $parameterBag['groupData'] = $groupData;
            $parameterBag['footer_class'] = (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '';
            $parameterBag['footer_logo_src'] = $footer_logo_src;
            $tableClass = \AppBundle\Helper\Common::cleanString( $this->document->getKey());
            $parameterBag['table_class']= $tableClass;
        }
        return $this->render("catalog/inh/inhfitting.html.twig", $parameterBag);
    }

    public function inhFittingCoverAction(Request $request)
    {
        $templatesEditable = $this->document->getEditable('inh_fitting_cover_page');

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }

        if ($templatesEditable && $templatesEditable->getElements() != null) {
            $templates = $templatesEditable->getElements();
            $commonHelper = $this->containerInterface->get('app.common_helper');

            $attributeImagesConfig = $this->containerInterface->get('app.config_provider_service')->getAttributeImagesConfig();
            $inhFittingCoverPageConfig = $this->containerInterface->get('app.config_provider_service')->getINHFittingCoverPageConfig();

            $featuresMaterials = $commonHelper->getParameter($inhFittingCoverPageConfig, 'headers');
            $catalogImagesINHFooter = $commonHelper->getParameter($attributeImagesConfig, 'CatalogImagesINHFooter');

            $catalogCategoryObj = DataObject\CatalogCategory::getById($templates[0]->getParentId());
            $catalogObj = DataObject\Catalog::getById($catalogCategoryObj->getParentId());

            $catalogLanguage = $catalogObj->getCatalogLanguage();

            $footerBgColor = '';
            $templateBrandDtata = array();
            $menuCategories = $this->getSIOP($catalogLanguage);
            $catagoryDescription = array();

            $query = "select oo_id, Level, description, PrintedCatalogDescription from object_localized_2_{$catalogLanguage} where level IN (3,4) ";

            $categories = $this->db->fetchAllAssociative($query);

            $categoriesList = array();

            foreach ($categories as $value) {
                $categoriesList[$value['oo_id']] = $value;
            }

            unset($categories);

            foreach ($templates as $template) {
                if (empty(trim($footerBgColor))) {
                    $footerBgColor = $template->getColor();
                }

                $productsData = $template->getProductsData();
                $headerData = json_decode($template->getHeaderData(), true);

                if ($headerData) {
                    $headerKeys = array_keys($headerData);
                    $headerKeysIndex = array_flip($headerKeys);

                    $materialKeys = array_fill_keys($featuresMaterials, '');
                    foreach ($productsData as $item) {

                        if ($item[$headerKeysIndex['brandName']]) {
                            if (!isset($catagoryDescription['SIOP3Description'])) {
                                $query = "select SIOPLevel3 from object_query_1 where oo_id = '" . $item[$headerKeysIndex['id']] . "'";

                                $record = $this->db->fetchAssociative($query);
                                $siopLevel3 = trim($record['SIOPLevel3'], ',');
                                $catagoryDescription['SIOP3Description'] = !empty($categoriesList[$siopLevel3]['PrintedCatalogDescription']) ? $categoriesList[$siopLevel3]['PrintedCatalogDescription'] : $categoriesList[$siopLevel3]['description'];
                            }
                            foreach ($featuresMaterials as $material) {
                                if ($material == $item[$headerKeysIndex['FittingMaterial']]) {
                                    $materialKeys[$material] = 'Yes';
                                }
                            }
                            $templateBrandDtata[$item[$headerKeysIndex['brandName']]] = $materialKeys;
                        }
                    }
                }
            }

            unset($categoriesList);

            $footer_logo_src = (strtolower($footerBgColor) == 'orange') ? $catalogImagesINHFooter['Black'] : $catalogImagesINHFooter['Orange'];
            $footer_logo_src = $this->getS3ImageSrc($footer_logo_src);

            $parameterBag['featuresMaterials'] = $featuresMaterials;
            $parameterBag['templateBrandDtata'] = $templateBrandDtata;
            $parameterBag['categories'] = $menuCategories;
            $parameterBag['selectedCategory'] = ((isset($catagoryDescription['SIOP3Description']))?$catagoryDescription['SIOP3Description']:'');            
            $parameterBag['footer_class'] = (strtolower($footerBgColor) == 'orange') ? 'reverseColor' : '';
            $parameterBag['footer_logo_src'] = $footer_logo_src;

        }
        return $this->render("catalog/inh/inhfitting_cover.html.twig", $parameterBag);
    }

    private function getSIOP($language, $bu = '')
    {
        $listing = new \Pimcore\Model\DataObject\ProductCategory\Listing;
        if($bu == 'IFS'){
            $listing->setCondition("CatalogFlag = :catFlag AND BusinessUnit = :bu", ["catFlag" => 1, "bu" => $bu]);
        }
        else{
            $listing->setCondition("CatalogFlag = :catFlag", ["catFlag" => 1]);
        }
        $listing->load();
        $categories = array();
        foreach ($listing as $category) {
            if ($category->getLevel() == 3) {
                $categories[$category->getFullCode()]['mainCategory'][] = array(
                    'name' => ($category->getPrintedCatalogDescription($language)) ? $category->getPrintedCatalogDescription($language) : $category->getDescription($language),
                    'level' => $category->getLevel(),
                    'printable' => 1,
                    'SortOrder' => $category->getSortOrder()
                );
                $categories[$category->getFullCode()]['SortOrder'] = $category->getSortOrder();
            } else {
                $fullCode = $category->getParent()->getFullCode();
                $cat = array(
                    'name' => ($category->getPrintedCatalogDescription($language)) ? $category->getPrintedCatalogDescription($language) : $category->getDescription($language),
                    'level' => $category->getLevel(),
                    'printable' => 1,
                    'SortOrder' => $category->getSortOrder()
                );
                if (!isset($categories[$fullCode])) {
                    $categories[$fullCode]['mainCategory'][] = array(
                        'name' => ($category->getParent()->getPrintedCatalogDescription($language)) ? $category->getParent()->getPrintedCatalogDescription($language) : $category->getParent()->getDescription($language),
                        'level' => $category->getParent()->getLevel(),
                        'printable' => 0,
                        'SortOrder' => $category->getSortOrder()
                    );
                    $categories[$fullCode]['SortOrder'] = $category->getSortOrder();
                }
                $categories[$fullCode]['subCategory'][] = $cat;
            }
        }

        if ($categories) {
            array_multisort(array_column($categories, 'SortOrder'), SORT_ASC, $categories);
            foreach ($categories as $catKey => $catValue) {
                if (isset($categories[$catKey]['subCategory'])) {
                    array_multisort(array_column($categories[$catKey]['subCategory'], 'SortOrder'), SORT_ASC, $categories[$catKey]['subCategory']);
                }
            }
        }
        return $categories;
    }

    public function getFeaturesList($catalog_type, $language)
    {
        $entries = new DataObject\Features\Listing();
        $entries->load();
        $featureData = array();
        foreach ($entries as $entry) {
            if ($entry->getIcon()) {
                $featureData[$entry->getId()]['icon'] = $entry->getIcon()->getPath() . $entry->getIcon()->getFilename();
            }

            $featureData[$entry->getId()]['name'] = $entry->getName($language);
            $featureData[$entry->getId()]['key'] = $entry->getKey();
            $featureData[$entry->getId()]['SortOrder'] = $entry->getSortOrder();
        }
        return $featureData;
    }

    public function getFiveSortedFeaturesWithIconList($safetyFeatures)
    {

        $safetyFeatures = array_unique($safetyFeatures);

        $safetyFeaturesList  = array();
        $safetyFeaturesListWithImage = array();
        $safetyFeaturesListWithOutImage = array();

        if ($safetyFeatures) {
            foreach ($safetyFeatures as $fvalue) {
                $fIcon = isset($this->featuresList[$fvalue]['icon']) ? $this->featuresList[$fvalue]['icon'] : null;
                if ($fIcon) {
                    if (!isset($this->s3srcArr[$fvalue])) {
                        $this->s3srcArr[$fvalue] = $this->getS3ImageSrc($fIcon);
                    }

                    $safetyFeaturesListWithImage[] = array('name' => $this->featuresList[$fvalue]['name'], 'iconSrc' => $fvalue, 'SortOrder' => $this->featuresList[$fvalue]['SortOrder']);
                } else {
                    if(isset($this->featuresList[$fvalue])){
                        $safetyFeaturesListWithOutImage[] = array('name' => $this->featuresList[$fvalue]['name'], 'iconSrc' => $fIcon, 'SortOrder' => $this->featuresList[$fvalue]['SortOrder']);

                    }
                }
            }
        }

        if ($safetyFeaturesListWithImage) {
            array_multisort(array_column($safetyFeaturesListWithImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithImage);
        }

        if ($safetyFeaturesListWithOutImage) {
            array_multisort(array_column($safetyFeaturesListWithOutImage, 'SortOrder'), SORT_ASC, $safetyFeaturesListWithOutImage);
        }

        $safetyFeaturesList = array_merge_recursive($safetyFeaturesListWithImage, $safetyFeaturesListWithOutImage);

        if ($safetyFeaturesList) {
            $safetyFeaturesList = array_slice($safetyFeaturesList, 0, 5);

            foreach ($safetyFeaturesList as $key => $value) {

                if (isset($this->s3srcArr[$value['iconSrc']])) {
                    $safetyFeaturesList[$key]['iconSrc'] = $this->s3srcArr[$value['iconSrc']];
                }
            }
        }

        unset($safetyFeaturesListWithImage);
        unset($safetyFeaturesListWithOutImage);

        return $safetyFeaturesList;
    }

    private function getSiopObject($siop)
    {
        if (is_array($siop) && !empty($siop)) {
            foreach ($siop as $siopId) {
                return \Pimcore\Model\DataObject\ProductCategory::getById($siopId);
            }
        }
        return false;
    }

    public function getS3ImageSrc($src)
    {
        $s3src = '';
        $imgObj = \Pimcore\Model\Asset::getByPath($src);

        if ($imgObj) {
            $s3src = $this->catalogTemplatingHelper->getImageThumbnail($imgObj, $this->imageWidth);
        }

        return $s3src;
    }

    public function getBrandsList()
    {
        $query = "select name, SortOrder, GroupingFieldNameForInhHoseProductTemplate from object_query_3";
        $brandslistRecords = $this->db->fetchAllAssociative($query);

        $brandslist = array();
        if ($brandslistRecords) {
            foreach ($brandslistRecords as $value) {
                $brandslist[$value['name']]['SortOrder'] = $value['SortOrder'];
                $brandslist[$value['name']]['GroupingFieldName'] = $value['GroupingFieldNameForInhHoseProductTemplate'];
            }
        }
        return $brandslist;
    }

    public function getColumnHeadersForCatalog($isTableNameColumnRequired = FALSE, $tableNameColumns = [], $fittingTableColWidths)

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
                    if(array_key_exists($dkey, $fittingTableColWidths)){
                        $colWidth = $fittingTableColWidths[$dkey];
                    }

                    $columnsDataWithImages[$groupColumnName][$dkey]['groupName'] = $groupName;
                    $columnsDataWithImages[$groupColumnName][$dkey]['columnWidth'] = $colWidth;
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

    public function replaceYellowCode($string)
    {
        $string = str_replace('%*', '<span style="color: #ffa500;">', $string);
        $string = str_replace('*%', '</span>', $string);
        return $string;
    }

    public function getRequestedParameter(Request $request, $documentId): array
    {
        $parameterBag = [];
        $isParentContainerRequest = $request->get('isParentContainerRequest');
        $parameterBag['isParentContainerRequest'] = $isParentContainerRequest ? $isParentContainerRequest : false;
        $parameterBag['printermarks'] = $request->get('printermarks');
 
        $imageWidth = null;
        $imageRecompression = null;
        $printConfigFile = Processor::getJobConfigFile($documentId);
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
