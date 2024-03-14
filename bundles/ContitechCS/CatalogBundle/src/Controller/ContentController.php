<?php

 /**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @package    ContitechCSCatalogBundle
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace ContitechCS\CatalogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pimcore\Controller\FrontendController;
use Pimcore\Bundle\WebToPrintBundle\Processor;

/**
 * Description of ContentController
 *
 * @author rohitsrivastava
 */
class ContentController extends FrontendController
{
    /**
     * @param Request $request
     * @param Response
     */
    public function pdfAction(Request $request): Response
    {

        if(!$request->get('contentDocument')->getPublished()){
            $parameterBag = $this->getRequestedParameter($request, 0);
        }
        else{
            $documentPath = $this->document->getFullPath();
            $documentId = \Pimcore\Model\Document::getByPath($documentPath)->getId();
            $parameterBag = $this->getRequestedParameter($request, $documentId);
        }

        $showPDFInput = false;

        if (isset($_SERVER['REQUEST_URI'])) {
            $requestUrl = $_SERVER['REQUEST_URI'];
            $previewUrl = "pimcore_preview=true";
            $showPDFInput = (strpos($requestUrl, $previewUrl) !== false) ? true : false;
        }

        $parameterBag['showPDFInput'] = $showPDFInput;
        return $this->render("contitechcscatalog/content/pdf.html.twig", $parameterBag);
    }

    public function coverPageAction(Request $request) {
        // function needed for templates/contitechcscatalog/content/coverPage.html.twig
    }

    /**
     * @param Request $request
     * @param int $documentId
     * @return array $parameterBag
     */
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
        if (file_exists($printConfigFile)) {
            $printConfigFileContent = file_get_contents($printConfigFile);
            $printConfig = json_decode($printConfigFileContent, true);
            $imageRecompression = $printConfig['config']['Image Quality'];
            $imageWidth = $printConfig['config']['Image Width'];
        }

        $parameterBag['imageQuality'] = $imageRecompression;
        $parameterBag['imageWidth'] = $imageWidth;

        return $parameterBag;
    }
}
