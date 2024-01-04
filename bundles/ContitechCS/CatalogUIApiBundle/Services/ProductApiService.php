<?php

/**
 * User: Mahesh Lakher
 * Date: 26/07/2021
 * Time: 11:00 AM
 */

namespace ContitechCS\CatalogUIApiBundle\Services;

use ContitechCS\CatalogUIApiBundle\Services\DBModelService;
use Pimcore\Model\DataObject;
use ContitechCS\CatalogUIApiBundle\Interfaces\ConstantsInterface;
use \Exception;
use ContitechCS\ProductBundle\Services\ConfigProviderService;
use Symfony\Component\HttpFoundation\Request;



class ProductApiService implements ConstantsInterface
{

    protected $dbModelService;
    protected $configProviderService;

    public function __construct()
    {
        $this->dbModelService = new DBModelService();
        $this->configProviderService = new ConfigProviderService();
    }
    /**
     * Get cs products
     * @return array
     */
    public function getCSProducts($language)
    {
        try {
            $productgGroupId = $this->dbModelService->getProductGroupIds();

            $result = [];
            $entries = new DataObject\CSProducts\Listing();
            $entries->setOrderKey("Name");
            $entries->setCondition("oo_id IN(?)", [$productgGroupId]);
            $entries->load();

            if (!count($entries)) {
                throw new Exception(self::RECORDS_NOT_FOUND);
            }

            foreach ($entries as $obj) {
                $result[] = ['name' => $obj->getName($language), 'id' => $obj->getId()];
            }
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get product group catalogs
     * @return array
     */
    public function getProductGroupCatalogs()
    {
        try {
            $req       = Request::createFromGlobals();
            $result    = $this->dbModelService->getProductgroupCatalogs();
            $language  = $req->get('language');

            if (!$result) {
                throw new Exception(self::RECORDS_NOT_FOUND);
            }

            $config = $this->configProviderService->getCatalogApiConfig();

            $data = [];
            foreach ($result as $val) {
                $containerId  = $val['ContainerId'];
                $arr          = [];
                $object       = \Pimcore\Model\DataObject::getById($val['ProductgGroupId']);

                if (method_exists($object, 'getName')) {
                    $arr['name'] = $object->getName($language);
                } else {
                    $arr['name'] = '';
                }

                $arr['id']    = $object->getId();
                $objContainer = \Pimcore\Model\Document::getById($containerId);

                if (method_exists($objContainer, 'getAllChildren') && $objContainer->getAllChildren()) {
                    foreach ($objContainer->getAllChildren() as $objDoc) {
                        $templateName = $objDoc->getTemplate();
                        if (isset($config['CatalogTemplateEditable'][$templateName])) {
                            $conflig_arr = $config['CatalogTemplateEditable'][$templateName];

                            $editables = [];
                            foreach ($conflig_arr as $config_val) {

                                if (method_exists($objDoc, 'getElement')) {
                                    if (!empty($objDoc->getElement($config_val)) &&
                                        !empty($objDoc->getElement($config_val)->getData())) {
                                        $editables[] = ['title' => $objDoc->getElement($config_val)->getData()];
                                    }
                                }
                            }
                            if (!empty($editables) && count($editables) > 0) {
                                $arr['tableOfContentPageInfo'][] = $editables;
                            }
                        }
                    }
                }
                $arr['pdfLink'] = $val['PdfLink'];
                $data[] = $arr;
            }
            $response['backAndFrontCoverPDF'] =   $this->getCoverPagePdfLink();
            $response['catalog']              =   $data;

            return $response;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getAssetFullPath($objAsset)
    {
        try {
            if ($objAsset) {
                return \S3CustomizationBundle\Lib\Utils::getAssetFullPathCompatibleToS3($objAsset);
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private function getCoverPagePdfLink()
    {
        try {
            $req            = Request::createFromGlobals();
            $language       = $req->get('language');
            $regionId       = $req->get('region');
            $regionName     = '';
            $objRegion       =    DataObject::getById($regionId);

            if (!$objRegion) {
                throw new Exception(SELF::INVALID_REGION_ID_MSG);
            }

            $regionName   = $objRegion->getRegionName();
            $regionName = \Pimcore\File::getValidFilename($regionName);

            $parentPath = $this->configProviderService->getWebSiteSetting('CS_cover_page_assets_folder');
            $parentPath = $parentPath ? $parentPath . '/' . $regionName . '/' .
                $language : 'Contitech_ConveyorSolution/container_pdf/cover_page/' . $language;

            $obj   = \Pimcore\Model\Asset\Service::createFolderByPath("/$parentPath");

            $pdfArr = [];
            if ($obj) {
                $listing = new \Pimcore\Model\Asset\Listing();
                $listing->setCondition("parentId = " . $obj->getId());

                if (count($listing)) {
                    foreach ($listing as $key => $objAsset) {
                        if ($key == 0) {
                            $pdfArr['frontCoverPDF'] = $this->getAssetFullPath($objAsset);
                        } else {
                            $pdfArr['backCoverPDF'] = $this->getAssetFullPath($objAsset);
                        }
                    }
                }
            }
            return $pdfArr;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getRegion()
    {
        try {
            $entries = new DataObject\CSRegion\Listing();
            $entries->setOrderKey("RegionName");
            $entries->setOrder("asc");
            $entries->load();

            if (!count($entries)) {
                throw new Exception(self::RECORDS_NOT_FOUND);
            }

            $result = [];

            foreach ($entries as $obj) {
                $result[] = ['id' => $obj->getId(), 'name' => $obj->getRegionName()];
            }

            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
