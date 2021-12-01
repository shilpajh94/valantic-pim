<?php

namespace ContitechCS\CatalogUIApiBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ContitechCS\ProductBundle\Services\ConfigProviderService;
use ContitechCS\CatalogUIApiBundle\Services\DBModelService;
use \Pimcore\Model\Document;
use ContitechCS\CatalogUIApiBundle\Services\ProductApiService;

class DefaultController extends FrontendController
{
    /**
     * @Route("/catalog_ui_api")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from catalog_ui_api');
    }

    /**
     * @Route("/move-container-pdf-to-assets")
     */
    public function moveContainerPdfToAssets(Request $request)
    {   
        try
        {   
            $docId                  = $request->get('docId');
            $language               =   '';
            $regionName             =   '';
            $productGroupId         =   '';

            //print container object
            $docObj                 = Document::getById($docId);	
            
            if($docObj->getProperty('language'))
            {
                $language = $docObj->getProperty('language');
            }
            
            if($docObj->getProperty('region')->getRegionName())
            {
                $regionName = $docObj->getProperty('region')->getRegionName();
                $regionId = $docObj->getProperty('region')->getId();
            }

            if(!$language)
            {
                return $this->json(array("success" => false,"msg" => "Unable to find language"));
            }

            if(!$regionName)
            {
                return $this->json(array("success" => false,"msg" => "Unable to find region. Please drop region and property key would be region"));
            }

            // get product group id
            if($docObj && method_exists($docObj,'getProperties'))
            {
                $properties = $docObj->getProperties();

                if(isset($properties['ProductGroup']) && method_exists($properties['ProductGroup'],'getData') and method_exists($properties['ProductGroup']->getData(),'getId'))
                {
                    $productGroupId = $properties['ProductGroup']->getData()->getId();
                }
            }

            if(!$productGroupId)
            {
                return $this->json(array("success" => false,"msg" => "Unable to find product. Please drop product and property key would be ProductGroup"));
            }

            $pdfTmpSaveDirectory    = PIMCORE_SYSTEM_TEMP_DIRECTORY;
            $savedPdfFileName       = $productGroupId . ".pdf";
            $tempFileName           = "web2print-document-" . $docId . ".pdf";
            $savedPdfFilePath       = $pdfTmpSaveDirectory . "/" . $tempFileName;

            if(file_exists($savedPdfFilePath))
            {  
                $objConfig = new ConfigProviderService();
                $parentPath = $objConfig->getWebSiteSetting('CS_catalogs_container_pdf_folder');
                $parentPath = $parentPath ? $parentPath : 'Contitech_ConveyorSolution/container_pdf';
                
                //check if pdf already there
                $asset =\Pimcore\Model\Asset::getByPath("/".$parentPath.'/'.$savedPdfFileName);
                
                if($asset){
                    $asset->delete();
                }
                
                $obj   = \Pimcore\Model\Asset\Service::createFolderByPath("/$parentPath");
                $parentFolder = $obj->getPath().$obj->getFileName();
                
                $newAsset = new \Pimcore\Model\Asset();
                $newAsset->setFilename($savedPdfFileName);
                $newAsset->setData(file_get_contents($savedPdfFilePath));
                $newAsset->setParent(\Pimcore\Model\Asset::getByPath("$parentFolder"));
                $newAsset->save();
                
                $this->savePdfIntoDb($newAsset,$docId,$language,$regionId,$productGroupId);

                // public cover pages
                $this->publishCoverPagePdf($docObj,$language,$regionName);
                
                return $this->json(array("success" => true,"msg" => "Pdf Published Successfully"));
            }
            else
            {
                return $this->json(array("success" => false,"msg" => "No PDF file found.Please generate PDF first to publish it."));
            }
        }
        catch(\Exception $e)
        {
            die($e->getMessage());
        }
    }

    /**
     * publish cover page pdf
     */
    private function publishCoverPagePdf($objPrintContainer,$language,$region)
    {   
        try
        {
            $objConfig = new ConfigProviderService();
            
            $parentPath = $objConfig->getWebSiteSetting('CS_cover_page_assets_folder');

            $parentPath = $parentPath ? $parentPath: "Contitech_ConveyorSolution/container_pdf/$language";

            $regionFolder = \Pimcore\File::getValidFilename($region);

            $parentPath = $parentPath."/".$regionFolder."/".$language;
            
            foreach($objPrintContainer->getParent()->getChildren() as $obj)
            {   
                if($obj->getType() == 'folder' && $obj->getKey() == 'coverPage')
                {
                    if($obj->getChildren())
                    {
                        foreach($obj->getChildren() as $objDoc)
                        {
                            $docId                  = $objDoc->getId();
                            $pdfTmpSaveDirectory    = PIMCORE_SYSTEM_TEMP_DIRECTORY;
                            $savedPdfFileName       = "web2print-document-" . $docId . ".pdf";
                            $savedPdfFilePath       = $pdfTmpSaveDirectory . "/" . $savedPdfFileName;
                            if(file_exists($savedPdfFilePath))
                            {
                                //check if pdf already there
                                $asset =\Pimcore\Model\Asset::getByPath("/".$parentPath.'/'.$savedPdfFileName);


                                // delete if already exists
                                if($asset){
                                    $asset->delete();
                                }
                                
                                $obj   = \Pimcore\Model\Asset\Service::createFolderByPath("/$parentPath");
                                $parentFolder = $obj->getPath().$obj->getFileName();
                
                                $newAsset = new \Pimcore\Model\Asset();
                                $newAsset->setFilename($savedPdfFileName);
                                $newAsset->setData(file_get_contents($savedPdfFilePath));
                                $newAsset->setParent(\Pimcore\Model\Asset::getByPath("$parentFolder"));
                                $newAsset->save();
                            }
                            else
                            {
                                die(json_encode(array("success" => false,"msg" => "No Cover page's PDF file found.Please generate both Cover page's PDF first to publish it.")));
                            }
                        }
                    }
                    break;
                }
            }
        }
        catch(\Exception $e)
        {       
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Save pdf into db
     */
    private function savePdfIntoDb($objPdf,$containerId,$language,$region,$productGroupId)
    {
        try
        {   
            $objContainer = \Pimcore\Model\Document::getById($containerId);

            $fileLink = '';

            if($objPdf)
            {
                $objApiService = new ProductApiService();
                $fileLink = $objApiService->getAssetFullPath($objPdf);
            }

            $objDbService = new DBModelService();
            $objDbService->saveProductgroupCatalogs($productGroupId,$containerId,$fileLink,$language,$region);
        }
        catch(\Exception $e)
        {       
            throw new \Exception($e->getMessage());
        }
    }
}
