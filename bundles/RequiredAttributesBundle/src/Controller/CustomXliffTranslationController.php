<?php

namespace RequiredAttributesBundle\Controller;

use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\Element;
use Pimcore\Bundle\XliffBundle\ExportService\Exporter\ExporterInterface;
use Pimcore\Bundle\XliffBundle\ExportService\ExportServiceInterface;
use Pimcore\Bundle\XliffBundle\ImportDataExtractor\ImportDataExtractorInterface;
use Pimcore\Bundle\XliffBundle\TranslationItemCollection\TranslationItemCollection;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Bundle\XliffBundle\Controller\XliffTranslationController;


/**
 * CUSTOMIZATION IS DONE REGARDING ADDITION OF XLIFF FILTERS
 */
// class CustomTranslationController extends \Pimcore\Bundle\AdminBundle\Controller\Admin\TranslationController{
class CustomXliffTranslationController extends XliffTranslationController {

    /**
     * -----------------------------------------------------------------------------------
     * THE FOLLOWING ISN'T RELATED TO THE SHARED TRANSLATIONS OR ADMIN-TRANSLATIONS
     * XLIFF CONTENT-EXPORT & MS WORD CONTENT-EXPORT
     * -----------------------------------------------------------------------------------
     */

    
    /**
     * @Route("/admin/translation/xliff-export", methods={"POST"})
     *
     * @param Request $request
     * @param ExportServiceInterface $exportService
     *
     * @return JsonResponse
     *
     * @throws \Exception
     */
    public function getxliffExportAction(Request $request, ExportServiceInterface $exportService): JsonResponse
    {
        $id = $request->get('id');
        $data = $this->decodeJson($request->get('data'));
        $source = $request->get('source');
        $target = $request->get('target');
        $publishState = $request->get('publishState');
        $xliffFilters =$this->decodeJson($request->get('xliffFilters'));

        $translationItems = new TranslationItemCollection();

        foreach ($data as $el) {
            $element = Element\Service::getElementById($el['type'], $el['id']);
            if($element->getType() == 'folder'){
                continue;
            }
            if(!($this->checkPubslishFilter($element, $publishState))){
                continue;
            }
            if(!($this->checkXliffFilter($element, $xliffFilters))){
                continue;
            }
            $translationItems->addPimcoreElement($element);
        }
        $exportService->exportTranslationItems($translationItems, $source, [$target], $id);

        return $this->jsonResponse([
            'success' => true
        ]);
    }

    private function checkPubslishFilter(AbstractObject $object, string $userSelection){
        if($userSelection == 'true'){
            return $object->isPublished();
        }
       else{
        return true;
       }
    }

    protected function checkXliffFilter(AbstractObject $object, $xliffFilters){
        if($xliffFilters){
            $objectClassName = $object->getClassName();
            if (array_key_exists($objectClassName, $xliffFilters)){
                foreach($xliffFilters[$objectClassName] as $attributeName => $filterValue){
                    $methodName = 'get'.ucfirst(trim($attributeName));
                    if(strtolower($object->$methodName()) != strtolower($filterValue)){
                       return false;
                    }
                }
            }
        }
        return true;
    }

    /**
     * @Route("/xliff-import-upload", methods={"POST"})
     *
     * @param Request $request
     * @param ImportDataExtractorInterface $importDataExtractor
     *
     * @return JsonResponse
     *
     * @throws \Exception
     */
    public function xliffImportUploadAction(Request $request, ImportDataExtractorInterface $importDataExtractor):JsonResponse
    {
        $jobs = [];
        $id = uniqid();
        $importFile = $importDataExtractor->getImportFilePath($id);
        copy($_FILES['file']['tmp_name'], $importFile);

        $steps = $importDataExtractor->countSteps($id);

        for ($i = 0; $i < $steps; $i++) {
            $jobs[] = [[
                'url' => $this->generateUrl('pimcore_admin_translation_xliffimportelement'),
                'method' => 'POST',
                'params' => [
                    'id' => $id,
                    'step' => $i,
                ],
            ]];
        }

        $response = $this->jsonResponse([
            'success' => true,
            'jobs' => $jobs,
            'id' => $id,
        ]);
        // set content-type to text/html, otherwise (when application/json is sent) chrome will complain in
        // Ext.form.Action.Submit and mark the submission as failed
        $response->headers->set('Content-Type', 'text/html');

        return $response;
    }

    /**
     * @Route("/admin/translation/xliff-export-download", methods={"GET"})
     *
     * @param Request $request
     * @param ExporterInterface $translationExporter
     *
     * @return BinaryFileResponse
     */
    public function getxliffExportDownloadAction(Request $request, ExporterInterface $translationExporter, ExportServiceInterface $exportService):BinaryFileResponse
    {
        $id = $request->get('id');
        $exportFile = $exportService->getTranslationExporter()->getExportFilePath($id);

        $response = new BinaryFileResponse($exportFile);
        $response->headers->set('Content-Type', $translationExporter->getContentType());
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, basename($exportFile));
        $response->deleteFileAfterSend(true);

        return $response;
    }
    
}