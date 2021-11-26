<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\CatalogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ContitechCS\ProductBundle\Services\ConfigProviderService;
use ContitechCS\CatalogUIApiBundle\Services\DBModelService;

/**
 * Description of ContentController
 *
 * @author rohitsrivastava
 */
class ContentController extends AbstractController {
    
    /**
     * @Route("/print_page")
     */
    public function pdfAction(Request $request) {


        //return new Response('Hello world from web2_print');
    }

    /**
     * @Route("/move-container-pdf-to-assets")
     */
    public function moveContainerPdfToAssets(Request $request)
    {
        try
        {   
            $docId                  = $request->get('docId');
            $pdfTmpSaveDirectory    = PIMCORE_SYSTEM_TEMP_DIRECTORY;
            $savedPdfFileName       = "web2print-document-" . $docId . ".pdf";
            $savedPdfFilePath       = $pdfTmpSaveDirectory . "/" . $savedPdfFileName;

            
            if(file_exists($savedPdfFilePath))
            {  
                $asset = \Pimcore\Model\Asset::getByPath("/my-assets/sample.png");
                
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

                $this->savePdfIntoDb($newAsset,$docId);

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
     * Save pdf into db
     */
    private function savePdfIntoDb($objPdf,$containerId){
        try
        {   
            $objContainer = \Pimcore\Model\Document::getById($containerId);

            $productGroupId = $fileLink = '';

            if($objPdf)
            {
                $fileLink = $objPdf->getPath().$objPdf->getFileName();
            }

            if($objContainer && method_exists($objContainer,'getProperties'))
            {
                $properties = $objContainer->getProperties();

                if(isset($properties['ProductGroup']) && method_exists($properties['ProductGroup'],'getData') and method_exists($properties['ProductGroup']->getData(),'getId'))
                {
                    $productGroupId = $properties['ProductGroup']->getData()->getId();
                }
            }

            $objDbService = new DBModelService();
            $objDbService->saveProductgroupCatalogs($productGroupId,$containerId,$fileLink);
        }
        catch(\Exception $e)
        {       
            throw new \Exception($e->getMessage());
        }
    }
}
