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
use Pimcore\Controller\FrontendController;


/**
 * Description of ContentController
 *
 * @author rohitsrivastava
 */
class ContentController extends FrontendController {
    
    public function pdfAction(Request $request) {

        $documentId = $this->document->getId();
        $parameterBag = $this->getRequestedParameter($request, $documentId);

        $showPDFInput = false;

        if(isset($_SERVER['REQUEST_URI']))
        {
            $requestUrl = $_SERVER['REQUEST_URI'];
            $previewUrl = "pimcore_preview=true";
            $showPDFInput = (strpos($requestUrl, $previewUrl) !== false) ? true : false;
        }

        $parameterBag['showPDFInput'] = $showPDFInput;
        return $this->render("@ContitechCSCatalog/Content/pdf.html.twig", $parameterBag);


        //return new Response('Hello world from web2_print');
    }
    
    public function coverPageAction(Request $request) {

    }
    
    public function backCoverAction(Request $request) {

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
