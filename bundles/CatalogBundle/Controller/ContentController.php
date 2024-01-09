<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CatalogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Controller\FrontendController;

/**
 * Description of ContentController
 *
 * @author rohitsrivastava
 */
class ContentController extends FrontendController {
    
    /**
     * @Route("/print_page")
     */
    public function pdfAction(Request $request) {
        $documentId = $this->document->getId();
        $parameterBag = $this->getRequestedParameter($request, $documentId);

        $requestUrl = $_SERVER['REQUEST_URI'];
        $previewUrl = "pimcore_preview=true";
        $showPDFInput = (strpos($requestUrl, $previewUrl) !== false) ? true : false;

        $parameterBag['showPDFInput'] = $showPDFInput;
        return $this->render("@Catalog/Content/pdf.html.twig", $parameterBag);
    }

    public function pdfWithFooterAction(Request $request) {
        $documentId = $this->document->getId();
        $parameterBag = $this->getRequestedParameter($request, $documentId);

        $requestUrl = $_SERVER['REQUEST_URI'];
        $previewUrl = "pimcore_preview=true";
        $showPDFInput = (strpos($requestUrl, $previewUrl) !== false) ? true : false;

        $parameterBag['showPDFInput'] = $showPDFInput;
        return $this->render("@Catalog/Content/pdfWithFooter.html.twig", $parameterBag);
    }

    public function getRequestedParameter(Request $request, $documentId): array
    {
        foreach ($request->attributes as $key => $value) {
            $parameterBag[$key] = $value;
        }

        $imageWidth = null;
        $imageRecompression = null;
        $printConfigFile = \Pimcore\Web2Print\Processor::getJobConfigFile($documentId);
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
