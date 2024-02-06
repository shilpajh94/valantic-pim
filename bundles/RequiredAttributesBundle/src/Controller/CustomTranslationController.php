<?php

namespace RequiredAttributesBundle\Controller;

use Symfony\Component\Yaml\Yaml;
use Pimcore\Model\DataObject\AbstractObject;
use Doctrine\DBAL\Exception\SyntaxErrorException;
use Doctrine\DBAL\Query\QueryBuilder as DoctrineQueryBuilder;
use Pimcore\Bundle\AdminBundle\Controller\AdminAbstractController;
use Pimcore\File;
use Pimcore\Localization\LocaleServiceInterface;
use Pimcore\Logger;
use Pimcore\Model\DataObject;
use Pimcore\Model\Document;
use Pimcore\Model\Element;
use Pimcore\Model\Translation;
use Pimcore\Tool;
use Pimcore\Tool\Session;
use Pimcore\Translation\ExportService\Exporter\ExporterInterface;
use Pimcore\Translation\ExportService\ExportServiceInterface;
use Pimcore\Translation\ImportDataExtractor\ImportDataExtractorInterface;
use Pimcore\Translation\ImporterService\ImporterServiceInterface;
use Pimcore\Translation\TranslationItemCollection\TranslationItemCollection;
use Pimcore\Translation\Translator;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;



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
    public function contentExportJobsAction(Request $request):JsonResponse
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
            // so that the export doesn't stop completely after a "redirect" or
            // any other unexpected behavior of an action
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
    // public function xliffExportAction(Request $request, ExportServiceInterface $exportService): JsonResponse
    // {
    //     $id = $request->get('id');
    //     $data = $this->decodeJson($request->get('data'));
    //     $source = $request->get('source');
    //     $target = $request->get('target');
    //     $publishState = $request->get('publishState');
    //     $xliffFilters =$this->decodeJson($request->get('xliffFilters'));

    //     $translationItems = new TranslationItemCollection();

    //     foreach ($data as $el) {
    //         $element = Element\Service::getElementById($el['type'], $el['id']);
    //         if($element->getType() == 'folder'){
    //             continue;
    //         }
    //         if(!($this->checkPubslishFilter($element, $publishState))){
    //             continue;
    //         }
    //         if(!($this->checkXliffFilter($element, $xliffFilters))){
    //             continue;
    //         }
    //         $translationItems->addPimcoreElement($element);
    //     }
    //     $exportService->exportTranslationItems($translationItems, $source, [$target], $id);

    //     return $this->adminJson([
    //         'success' => true
    //     ]);
    // }

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
     * @Route("/add-admin-translation-keys", methods={"POST"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function addAdminTranslationKeysAction(Request $request):JsonResponse
    {
        $keys = $request->get('keys');
        if ($keys) {
            $availableLanguages = Tool\Admin::getLanguages();
            $data = $this->decodeJson($keys);
            foreach ($data as $translationData) {
                $t = null; // reset

                try {
                    $t = Translation::getByKey($translationData, Translation::DOMAIN_ADMIN);
                } catch (\Exception $e) {
                    Logger::log((string) $e);
                }
                if (!$t instanceof Translation) {
                    $t = new Translation();
                    $t->setDomain(Translation::DOMAIN_ADMIN);
                    $t->setKey($translationData);
                    $t->setCreationDate(time());
                    $t->setModificationDate(time());

                    foreach ($availableLanguages as $lang) {
                        $t->addTranslation($lang, '');
                    }

                    try {
                        $t->save();
                    } catch (\Exception $e) {
                        Logger::log((string) $e);
                    }
                }
            }
        }

        return $this->adminJson(null);
    }

        /**
     * @Route("/export", methods={"GET"})
     *
     * @param Request $request
     *
     * @return Response
     */
    // public function exportAction(Request $request)
    // {
    //     $domain = $request->get('domain', Translation::DOMAIN_DEFAULT);
    //     $admin = $domain == Translation::DOMAIN_ADMIN;

    //     $this->checkPermission(($admin ? 'admin_' : '') . 'translations');

    //     $translation = new Translation();
    //     $translation->setDomain($domain);
    //     $tableName = $translation->getDao()->getDatabaseTableName();

    //     // clear translation cache
    //     Translation::clearDependentCache();

    //     $list = new Translation\Listing();
    //     $list->setDomain($domain);

    //     $joins = [];

    //     $list->setOrder('asc');
    //     $list->setOrderKey($tableName . '.key', false);

    //     $conditions = $this->getGridFilterCondition($request, $tableName, false, $admin);
    //     if (!empty($conditions)) {
    //         $list->setCondition($conditions['condition'], $conditions['params']);
    //     }

    //     $filters = $this->getGridFilterCondition($request, $tableName, true, $admin);

    //     if ($filters) {
    //         $joins = array_merge($joins, $filters['joins']);
    //     }

    //     $this->extendTranslationQuery($joins, $list, $tableName, $filters);

    //     try {
    //         $list->load();
    //     } catch (SyntaxErrorException $syntaxErrorException) {
    //         throw new \InvalidArgumentException('Check your arguments.');
    //     }

    //     $translations = [];
    //     $translationObjects = $list->getTranslations();

    //     // fill with one dummy translation if the store is empty
    //     if (empty($translationObjects)) {
    //         if ($admin) {
    //             $t = new Translation();
    //             $t->setDomain(Translation::DOMAIN_ADMIN);
    //             $languages = Tool\Admin::getLanguages();
    //         } else {
    //             $t = new Translation();
    //             $languages = $this->getAdminUser()->getAllowedLanguagesForViewingWebsiteTranslations();
    //         }

    //         foreach ($languages as $language) {
    //             $t->addTranslation($language, '');
    //         }

    //         $translationObjects[] = $t;
    //     }

    //     foreach ($translationObjects as $t) {
    //         $row = $t->getTranslations();
    //         $row = Element\Service::escapeCsvRecord($row);
    //         $translations[] = array_merge(
    //             ['key' => $t->getKey(),
    //                 'creationDate' => $t->getCreationDate(),
    //                 'modificationDate' => $t->getModificationDate(),
    //             ],
    //             $row
    //         );
    //     }

    //     //header column
    //     $columns = array_keys($translations[0]);

    //     if ($admin) {
    //         $languages = Tool\Admin::getLanguages();
    //     } else {
    //         $languages = $this->getAdminUser()->getAllowedLanguagesForViewingWebsiteTranslations();
    //     }

    //     //add language columns which have no translations yet
    //     foreach ($languages as $l) {
    //         if (!in_array($l, $columns)) {
    //             $columns[] = $l;
    //         }
    //     }

    //     //remove invalid languages
    //     foreach ($columns as $key => $column) {
    //         if (strtolower(trim($column)) != 'key' && !in_array($column, $languages)) {
    //             unset($columns[$key]);
    //         }
    //     }
    //     $columns = array_values($columns);

    //     $headerRow = [];
    //     foreach ($columns as $key => $value) {
    //         $headerRow[] = '"' . $value . '"';
    //     }
    //     $csv = implode(';', $headerRow) . "\r\n";

    //     foreach ($translations as $t) {
    //         $tempRow = [];
    //         foreach ($columns as $key) {
    //             $value = $t[$key] ?? null;
    //             //clean value of evil stuff such as " and linebreaks
    //             if (is_string($value)) {
    //                 $value = Tool\Text::removeLineBreaks($value);
    //                 $value = str_replace('"', '&quot;', $value);

    //                 $tempRow[$key] = '"' . $value . '"';
    //             } else {
    //                 $tempRow[$key] = $value;
    //             }
    //         }
    //         $csv .= implode(';', $tempRow) . "\r\n";
    //     }

    //     $response = new Response("\xEF\xBB\xBF" . $csv);
    //     $response->headers->set('Content-Encoding', 'UTF-8');
    //     $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
    //     $response->headers->set('Content-Disposition', 'attachment; filename="export_' . $domain . '_translations.csv"');
    //     ini_set('display_errors', '0'); //to prevent warning messages in csv

    //     return $response;
    // }


    /**
     * @Route("/translations", methods={"POST"})
     *
     * @param Request $request
     * @param Translator $translator
     *
     * @return JsonResponse
     */
    public function translationsAction(Request $request, TranslatorInterface $translator):JsonResponse
    {
        $domain = $request->get('domain', Translation::DOMAIN_DEFAULT);
        $admin = $domain === Translation::DOMAIN_ADMIN;

        $this->checkPermission(($admin ? 'admin_' : '') . 'translations');

        $translation = new Translation();
        $translation->setDomain($domain);
        $tableName = $translation->getDao()->getDatabaseTableName();

        // clear translation cache
        Translation::clearDependentCache();

        if ($request->get('data')) {
            $data = $this->decodeJson($request->get('data'));

            if ($request->get('xaction') == 'destroy') {
                $t = Translation::getByKey($data['key'], $domain);
                if ($t instanceof Translation) {
                    $t->delete();
                }

                return $this->adminJson(['success' => true, 'data' => []]);
            } elseif ($request->get('xaction') == 'update') {
                $t = Translation::getByKey($data['key'], $domain);

                foreach ($data as $key => $value) {
                    $key = preg_replace('/^_/', '', $key, 1);
                    if (!in_array($key, ['key', 'type'])) {
                        $t->addTranslation($key, $value);
                    }
                }

                if ($data['key']) {
                    $t->setKey($data['key']);
                }

                if ($data['type']) {
                    $t->setType($data['type']);
                }
                $t->setModificationDate(time());
                $t->save();

                $return = array_merge(
                    [
                        'key' => $t->getKey(),
                        'creationDate' => $t->getCreationDate(),
                        'modificationDate' => $t->getModificationDate(),
                        'type' => $t->getType(),
                    ],
                    $this->prefixTranslations($t->getTranslations())
                );

                return $this->adminJson(['data' => $return, 'success' => true]);
            } elseif ($request->get('xaction') == 'create') {
                $t = Translation::getByKey($data['key'], $domain);
                if ($t) {
                    return $this->adminJson([
                        'message' => 'identifier_already_exists',
                        'success' => false,
                    ]);
                }

                $t = new Translation();
                $t->setDomain($domain);
                $t->setKey($data['key']);
                $t->setCreationDate(time());
                $t->setModificationDate(time());
                $t->setType($data['type'] ?? null);

                foreach (Tool::getValidLanguages() as $lang) {
                    $t->addTranslation($lang, '');
                }
                $t->save();

                $return = array_merge(
                    [
                        'key' => $t->getKey(),
                        'creationDate' => $t->getCreationDate(),
                        'modificationDate' => $t->getModificationDate(),
                        'type' => $t->getType(),
                    ],
                    $this->prefixTranslations($t->getTranslations())
                );

                return $this->adminJson(['data' => $return, 'success' => true]);
            }
        } else {
            // get list of types
            $list = new Translation\Listing();
            $list->setDomain($domain);

            $validLanguages = $admin ? Tool\Admin::getLanguages() : $this->getAdminUser()->getAllowedLanguagesForViewingWebsiteTranslations();

            $list->setOrder('asc');
            $list->setOrderKey($tableName . '.key', false);
            $list->setLanguages($validLanguages);

            $sortingSettings = \Pimcore\Bundle\AdminBundle\Helper\QueryParams::extractSortingSettings(
                array_merge($request->request->all(), $request->query->all())
            );

            $joins = [];

            if ($orderKey = $sortingSettings['orderKey']) {
                if (in_array(trim($orderKey, '_'), $validLanguages)) {
                    $orderKey = trim($orderKey, '_');
                    $joins[] = [
                        'language' => $orderKey,
                    ];
                    $list->setOrderKey($orderKey);
                } elseif ($list->isValidOrderKey($sortingSettings['orderKey'])) {
                    $list->setOrderKey($tableName . '.' . $sortingSettings['orderKey'], false);
                }
            }
            if ($sortingSettings['order']) {
                $list->setOrder($sortingSettings['order']);
            }

            $list->setLimit($request->get('limit'));
            $list->setOffset($request->get('start'));

            $conditions = $this->getGridFilterCondition($request, $tableName, false, $admin);
            $filters = $this->getGridFilterCondition($request, $tableName, true, $admin);

            if ($filters) {
                $joins = array_merge($joins, $filters['joins']);
            }

            if (!empty($conditions)) {
                $list->setCondition($conditions['condition'], $conditions['params']);
            }

            $this->extendTranslationQuery($joins, $list, $tableName, $filters);

            try {
                $list->load();
            } catch (SyntaxErrorException $syntaxErrorException) {
                throw new \InvalidArgumentException('Check your arguments.');
            }

            $translations = [];
            $searchString = $request->get('searchString');
            foreach ($list->getTranslations() as $t) {
                //Reload translation to get complete data,
                //if translation fetched based on the text not key
                if ($searchString && !strpos($searchString, $t->getKey())) {
                    if (!$t = Translation::getByKey($t->getKey(), $domain)) {
                        continue;
                    }
                }

                $translations[] = array_merge(
                    $this->prefixTranslations($t->getTranslations()),
                    [
                        'key' => $t->getKey(),
                        'creationDate' => $t->getCreationDate(),
                        'modificationDate' => $t->getModificationDate(),
                        'type' => $t->getType(),
                    ]
                );
            }

            return $this->adminJson(['data' => $translations, 'success' => true, 'total' => $list->getTotalCount()]);
        }

        return $this->adminJson(['success' => false]);
    }

        /**
     * @Route("/upload-import", methods={"POST"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    // public function uploadImportFileAction(Request $request): JsonResponse
    // {
    //     $tmpData = file_get_contents($_FILES['Filedata']['tmp_name']);

    //     //store data for further usage
    //     $filename = uniqid('import_translations-');
    //     $importFile = PIMCORE_SYSTEM_TEMP_DIRECTORY . '/' . $filename;
    //     File::put($importFile, $tmpData);

    //     Session::useSession(function (AttributeBagInterface $session) use ($importFile) {
    //         $session->set('translation_import_file', $importFile);
    //     }, 'pimcore_importconfig');

    //     // determine csv settings
    //     $dialect = Tool\Admin::determineCsvDialect($importFile);

    //     //ignore if line terminator is already hex otherwise generate hex for string
    //     if (!empty($dialect->lineterminator) && empty(preg_match('/[a-f0-9]{2}/i', $dialect->lineterminator))) {
    //         $dialect->lineterminator = bin2hex($dialect->lineterminator);
    //     }

    //     return $this->adminJson([
    //         'success' => true,
    //         'config' => [
    //             'csvSettings' => $dialect,
    //         ],
    //     ]);
    // }

        /**
     * @Route("/import", methods={"POST"})
     *
     * @param Request $request
     * @param LocaleServiceInterface $localeService
     *
     * @return JsonResponse
     */
    public function importAction(Request $request, LocaleServiceInterface $localeService):JsonResponse
    {
        $domain = $request->get('domain', Translation::DOMAIN_DEFAULT);
        $admin = $domain == Translation::DOMAIN_ADMIN;

        $dialect = $request->get('csvSettings', null);
        $session = Session::get('pimcore_importconfig');
        $tmpFile = $session->get('translation_import_file');

        if ($dialect) {
            $dialect = json_decode($dialect);
        }

        $this->checkPermission(($admin ? 'admin_' : '') . 'translations');

        $merge = $request->get('merge');
        $overwrite = !$merge;

        $allowedLanguages = $this->getAdminUser()->getAllowedLanguagesForEditingWebsiteTranslations();
        if ($admin) {
            $allowedLanguages = Tool\Admin::getLanguages();
        }

        $delta = Translation::importTranslationsFromFile(
            $tmpFile,
            $domain,
            $overwrite,
            $allowedLanguages,
            $dialect
        );

        if (is_file($tmpFile)) {
            @unlink($tmpFile);
        }

        $result = [
            'success' => true,
        ];
        if ($merge) {
            $enrichedDelta = [];

            foreach ($delta as $item) {
                $lg = $item['lg'];
                $currentLocale = $localeService->findLocale();
                $item['lgname'] = \Locale::getDisplayLanguage($lg, $currentLocale);
                $item['icon'] = $this->generateUrl('pimcore_admin_misc_getlanguageflag', ['language' => $lg]);
                $item['current'] = $item['text'];
                $enrichedDelta[] = $item;
            }

            $result['delta'] = base64_encode(json_encode($enrichedDelta));
        }

        $response = $this->adminJson($result);
        // set content-type to text/html, otherwise (when application/json is sent) chrome will complain in
        // Ext.form.Action.Submit and mark the submission as failed
        $response->headers->set('Content-Type', 'text/html');

        return $response;
    }

        /**
     * @Route("/cleanup", methods={"DELETE"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function cleanupAction(Request $request):JsonResponse
    {
        $domain = $request->get('domain', Translation::DOMAIN_DEFAULT);
        $list = new Translation\Listing();
        $list->setDomain($domain);
        $list->cleanup();

        \Pimcore\Cache::clearTags(['translator', 'translate']);

        return $this->adminJson(['success' => true]);
    }

        /**
     * @Route("/get-translation-domains", methods={"GET"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getTranslationDomainsAction(Request $request):JsonResponse
    {
        $translation = new Translation();

        $domains = array_map(
            fn ($domain) => ['name' => $domain],
            $translation->getDao()->getAvailableDomains(),
        );

        return $this->adminJson(['domains' => $domains]);
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

        $response = $this->adminJson([
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
     * @Route("/get-website-translation-languages", methods={"GET"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getWebsiteTranslationLanguagesAction(Request $request):JsonResponse
    {
        return $this->adminJson(
            [
                'view' => $this->getAdminUser()->getAllowedLanguagesForViewingWebsiteTranslations(),

                //when no view language is defined, all languages are editable. if one view language is defined, it
                //may be possible that no edit language is set intentionally
                'edit' => $this->getAdminUser()->getAllowedLanguagesForEditingWebsiteTranslations(),
            ]
        );
    }

    /**
     * @Route("/xliff-export-download", methods={"GET"})
     *
     * @param Request $request
     * @param ExporterInterface $translationExporter
     *
     * @return BinaryFileResponse
     */
    public function xliffExportDownloadAction(Request $request, ExporterInterface $translationExporter, ExportServiceInterface $exportService):BinaryFileResponse
    {
        $id = $request->get('id');
        $exportFile = $exportService->getTranslationExporter()->getExportFilePath($id);

        $response = new BinaryFileResponse($exportFile);
        $response->headers->set('Content-Type', $translationExporter->getContentType());
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, basename($exportFile));
        $response->deleteFileAfterSend(true);

        return $response;
    }


    /**
     * @Route("/admin/xliff-filters/get-data", methods={"GET"})
     * @param Request $request
    */
    public function getXliffFiltersConfigAction(Request $request) {

        $xLiffFiltersConfig = Yaml::parseFile(PIMCORE_PROJECT_ROOT .
        '/bundles/RequiredAttributesBundle/Resources/config/xliff_filters.yaml');
        return $this->json(["success" => true,"data" => $xLiffFiltersConfig['xliff_filters']]);
    }
    
}