<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CatalogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Controller\FrontendController;
use Pimcore\Bundle\WebToPrintBundle\Processor;

/**
 * Description of ContentController
 *
 * @author rohitsrivastava
 */
class ContentController extends FrontendController {

    /**
     * @Route("/print_page")
     */
    public function pdfAction(Request $request): Response {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }

        $showPDFInput = false;

        if(isset($_SERVER['REQUEST_URI']))
        {
            $requestUrl = $_SERVER['REQUEST_URI'];
            $previewUrl = "pimcore_preview=true";
            $showPDFInput = (strpos($requestUrl, $previewUrl) !== false) ? true : false;
        }

        $parameterBag['showPDFInput'] = $showPDFInput;
        return $this->render("catalog/content/pdf.html.twig", $parameterBag);
    }

    public function pdfWithFooterAction(Request $request): Response {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }

        $showPDFInput = false;

        if(isset($_SERVER['REQUEST_URI']))
        {
            $requestUrl = $_SERVER['REQUEST_URI'];
            $previewUrl = "pimcore_preview=true";
            $showPDFInput = (strpos($requestUrl, $previewUrl) !== false) ? true : false;
        }

        $parameterBag['showPDFInput'] = $showPDFInput;
        return $this->render("catalog/content/pdfWithFooter.html.twig", $parameterBag);
    }

    public function getRequestedParameter(Request $request, $documentId): array
    {
        $parameterBag = [];
        $isParentContainerRequest = $request->get('isParentContainerRequest');
        $parameterBag['isParentContainerRequest'] = $isParentContainerRequest ? $isParentContainerRequest : false;
        $parameterBag['printermarks'] = $request->get('printermarks');

        foreach ($request->attributes as $key => $value) {
            $parameterBag[$key] = $value;
        }

        $imageWidth = null;
        $imageRecompression = null;
        $printConfigFile = Processor::getJobConfigFile($documentId);
        if(file_exists($printConfigFile)){
            $printConfigFileContent = file_get_contents($printConfigFile);
            $printConfig = json_decode( $printConfigFileContent,true);
            $imageRecompression = $printConfig['config']['Image Quality'];
            $imageWidth = $printConfig['config']['Image Width'];
        }

        $parameterBag['imageQuality'] = $imageRecompression;
        $parameterBag['imageWidth'] = $imageWidth;

        return $parameterBag;
    }

}
