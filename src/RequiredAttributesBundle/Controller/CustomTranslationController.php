<?php

namespace RequiredAttributesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;
use Pimcore\Model\Element;
use Pimcore\Translation\ExportService\ExportServiceInterface;
use Pimcore\Translation\TranslationItemCollection\TranslationItemCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Yaml\Yaml;
use Pimcore\Model\DataObject\AbstractObject;

/**
 * CUSTOMIZATION IS DONE REGARDING ADDITION OF XLIFF FILTERS
 */
class CustomTranslationController extends \Pimcore\Bundle\AdminBundle\Controller\Admin\TranslationController{

    /**
     * -----------------------------------------------------------------------------------
     * THE FOLLOWING ISN'T RELATED TO THE SHARED TRANSLATIONS OR ADMIN-TRANSLATIONS
     * XLIFF CONTENT-EXPORT & MS WORD CONTENT-EXPORT
     * -----------------------------------------------------------------------------------
     */

    /**
     * @Route("/content-export-jobs", methods={"POST"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function contentExportJobsAction(Request $request)
    {
        $data = $this->decodeJson($request->get('data'));
        $elements = [];
        $jobs = [];
        $exportId = uniqid();
        $source = $request->get('source');
        $target = $request->get('target');
        $publishState = $request->get('publishState');
        $type = $request->get('type');
        $xliffFilters =$this->decodeJson($request->get('xliffFilters'));

        $source = str_replace('_', '-', $source);
        $target = str_replace('_', '-', $target);

        if ($data && is_array($data)) {
            foreach ($data as $element) {
                $elements[$element['type'] . '_' . $element['id']] = [
                    'id' => $element['id'],
                    'type' => $element['type'],
                ];
                $el = null;

                if ($element['children']) {
                    $el = Element\Service::getElementById($element['type'], $element['id']);
                    $baseClass = ELement\Service::getBaseClassNameForElement($element['type']);
                    $listClass = '\\Pimcore\\Model\\' . $baseClass . '\\Listing';
                    $list = new $listClass();
                    $list->setUnpublished(true);
                    if ($el instanceof DataObject\AbstractObject) {
                        // inlcude variants
                        $list->setObjectTypes(
                            [DataObject\AbstractObject::OBJECT_TYPE_VARIANT,
                                DataObject\AbstractObject::OBJECT_TYPE_OBJECT,
                                DataObject\AbstractObject::OBJECT_TYPE_FOLDER]
                        );
                    }
                    $list->setCondition(
                        ($el instanceof DataObject\AbstractObject ? 'o_' : '') . 'path LIKE ?',
                        [$el->getRealFullPath() . ($el->getRealFullPath() != '/' ? '/' : '') . '%']
                    );
                    $childs = $list->load();

                    foreach ($childs as $child) {
                        $childId = $child->getId();
                        $elements[$element['type'] . '_' . $childId] = [
                            'id' => $childId,
                            'type' => $element['type'],
                        ];
                        if (isset($element['relations']) && $element['relations']) {
                            $childDependencies = $child->getDependencies()->getRequires();
                            foreach ($childDependencies as $cd) {
                                if ($cd['type'] == 'object' || $cd['type'] == 'document') {
                                    $elements[$cd['type'] . '_' . $cd['id']] = $cd;
                                }
                            }
                        }
                    }
                }
                if (isset($element['relations']) && $element['relations']) {
                    if (!$el instanceof Element\AbstractElement) {
                        $el = Element\Service::getElementById($element['type'], $element['id']);
                    }
                    $dependencies = $el->getDependencies()->getRequires();
                    foreach ($dependencies as $dependency) {
                        if ($dependency['type'] == 'object' || $dependency['type'] == 'document') {
                            $elements[$dependency['type'] . '_' . $dependency['id']] = $dependency;
                        }
                    }
                }
            }
        }
        $elements = array_values($elements);
        $elementsPerJob = 10;
        if ($type == 'word') {
            // the word export can only handle one document per request
            // the problem is Document\Service::render(), ... in the action can be a $this->redirect() or exit;
            // nobody knows what's happening in an action ;-) So we need to isolate them in isolated processes
            // so that the export doesn't stop completely after a "redirect" or any other unexpected behavior of an action
            $elementsPerJob = 1;
        }
        // one job = X elements
        $elements = array_chunk($elements, $elementsPerJob);
        foreach ($elements as $chunk) {
            $jobs[] = [[
                'url' => '/admin/translation/' . $type . '-export',
                'method' => 'POST',
                'params' => [
                    'id' => $exportId,
                    'source' => $source,
                    'target' => $target,
                    'publishState' => $publishState,
                    'xliffFilters' => $this->encodeJson($xliffFilters),
                    'data' => $this->encodeJson($chunk),
                ],
            ]];
        }
        return $this->adminJson(
            [
                'success' => true,
                'jobs' => $jobs,
                'id' => $exportId,
            ]
        );
    }
    /**
     * @Route("/xliff-export", methods={"POST"})
     *
     * @param Request $request
     * @param ExportServiceInterface $exportService
     *
     * @return JsonResponse
     *
     * @throws \Exception
     */
    public function xliffExportAction(Request $request, ExportServiceInterface $exportService)
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

        return $this->adminJson([
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
     * @Route("/admin/xliff-filters/get-data", methods={"GET"})
     * @param Request $request
    */
    public function getXliffFiltersConfigAction(Request $request) {

        $XliffFiltersConfig = Yaml::parseFile(PIMCORE_PROJECT_ROOT . '/src/RequiredAttributesBundle/Resources/config/xliff_filters.yml');
        return $this->json(["success" => true,"data" => $XliffFiltersConfig['xliff_filters']]);
    }
    
}



