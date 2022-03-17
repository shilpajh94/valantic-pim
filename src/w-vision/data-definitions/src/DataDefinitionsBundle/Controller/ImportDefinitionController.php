<?php

/**
 * Data Definitions.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2016-2019 w-vision AG (https://www.w-vision.ch)
 * @license    https://github.com/w-vision/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

namespace Wvision\Bundle\DataDefinitionsBundle\Controller;

use Doctrine\DBAL\Exception\NotNullConstraintViolationException;
use CoreShop\Bundle\ResourceBundle\Controller\ResourceController;
use Pimcore\Model\DataObject;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Wvision\Bundle\DataDefinitionsBundle\Model\ImportDefinitionInterface;
use Wvision\Bundle\DataDefinitionsBundle\Model\ImportMapping\FromColumn;
use Wvision\Bundle\DataDefinitionsBundle\Service\FieldSelection;
use Wvision\Bundle\DataDefinitionsBundle\Lib\DataImportLogger;
use Wvision\Bundle\DataDefinitionsBundle\Helper\CommonHelper as commonHelper;
use CoreShop\Component\Resource\Model\ResourceInterface;
use Pimcore\Bundle\AdminBundle\HttpFoundation\JsonResponse;
use Wvision\Bundle\DataDefinitionsBundle\Model\ImportDefinition;
use AppBundle\Tool\Utils;
use Pimcore\Model\User\Role;
use Pimcore\Tool\Admin;
use Wvision\Bundle\DataDefinitionsBundle\Lib\Constants;
use Wvision\Bundle\DataDefinitionsBundle\Model\DataDefinitionImport;
use Pimcore\Model\Asset;
use Wvision\Bundle\DataDefinitionsBundle\Helper\ImportHelper as importHelper;



class ImportDefinitionController extends ResourceController
{
    /**
     * @return mixed|\Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getConfigAction()
    {
        $providers = $this->getConfigProviders();
        $loaders = $this->getConfigLoaders();
        $interpreters = $this->getConfigInterpreters();
        $cleaners = $this->getConfigCleaners();
        $setters = $this->getConfigSetters();
        $filters = $this->getConfigFilters();
        $runners = $this->getConfigRunners();
        $importRuleConditions = $this->getImportRuleConditions();
        $importRuleActions = $this->getImportRuleActions();
        return $this->viewHandler->handle([
            'providers' => array_keys($providers),
            'loaders' => array_keys($loaders),
            'interpreter' => array_keys($interpreters),
            'cleaner' => array_keys($cleaners),
            'setter' => array_keys($setters),
            'filters' => array_keys($filters),
            'runner' => array_keys($runners),
            'import_rules' => [
                'conditions' => array_keys($importRuleConditions),
                'actions' => array_keys($importRuleActions)
            ]
        ]);
    }
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function readUploadedFileAction(Request $request)
    {
        $commonHelperObject = new commonHelper();
        try {
            $result = $commonHelperObject->validateUploadedFile($_FILES['csvFile']);
            if ($result) {
                $tmpUploadPathfolder = PIMCORE_PROJECT_ROOT . '/' . $commonHelperObject->getConfig('tmp_template_upload_pimcore_dir');
                $uploadedFilePath = $tmpUploadPathfolder . $result['fileName'];
                try {
                    $asset = $commonHelperObject->addFileInAsset($uploadedFilePath, $request->get('definitionName'));
                    $fileId = $asset->getId();
                } catch (\Exception $exception) {
                    DataImportLogger::log("Error creating asset for uploaded file in ImportDefinitionController save:" . $exception->getMessage(), DataImportLogger::CRITICAL);
                    $msg = $this->trans("data_error_saving");
                    return $this->json(['success' => false, 'msg' => $msg]);
                }
                // if ($asset) {
                //     $commonHelperObject->setAssetId($asset->getId());
                // }
            }
        } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $exception) {
            DataImportLogger::log("Error reading uploaded file in ImportDefinitionController readUploadedFile:" . $exception->getMessage(), DataImportLogger::INFO);
            return $this->json(['success' => false, 'msg' => $this->trans('data_file_not_valid')]);
        } catch (\Exception $exception) {
            DataImportLogger::log("Error reading uploaded file ImportDefinitionController readUploadedFile:" . $exception->getMessage(), DataImportLogger::INFO);
            return $this->json(['success' => false, 'msg' => $exception->getMessage()]);
        }
        return $this->json(["success" => true, "fileType" => $result['fileType'], 'fileName' => $result['fileName'], 'fileId' => $fileId]);
    }
    /**
     * @param Request $request
     * @return mixed
     */
    public function testDataAction(Request $request)
    {
        $id = $request->get('id');
        $definition = $this->repository->find($id);
        if ($definition instanceof ImportDefinitionInterface) {
            try {
                if ($this->get('data_definitions.registry.provider')->get($definition->getProvider())->testData($definition->getConfiguration())) {
                    return $this->viewHandler->handle(['success' => true]);
                }
            } catch (\Exception $ex) {
                return $this->viewHandler->handle(['success' => false, 'message' => $ex->getMessage()]);
            }
        }
        return $this->viewHandler->handle(['success' => false]);
    }
    /**
     * @param Request $request
     * @return mixed|\Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Exception
     */
    public function getColumnsAction(Request $request)
    {
        $id = $request->get('id');
        $definition = $this->repository->find($id);
        $primaryKeyValue = $definition->getPrimaryKey();
       
        if ($definition instanceof ImportDefinitionInterface && $definition->getClass()) {
            $customFromColumn = new FromColumn();
            // $customFromColumn->setIdentifier('custom');
            // $customFromColumn->setLabel('Custom');
            try {
                $fromColumns = $this->get('data_definitions.registry.provider')->get($definition->getProvider())->getColumns($definition->getConfiguration(), $definition->name);
                $fromColumns[] = $customFromColumn;
            } catch (\Exception $e) {
                $fromColumns = [];
            }
            $classDefinition = DataObject\ClassDefinition::getByName($definition->getClass());
            if (!$classDefinition) {
                throw new NotFoundHttpException();
            }
            $toColumns = $this->get(FieldSelection::class)->getClassDefinition($classDefinition);
            $mappings = $definition->getMapping();
            $mappingDefinition = [];
            $fromColumnsResult = [];
            $bricks = [];
            $collections = [];
            foreach ($classDefinition->getFieldDefinitions() as $field) {
                if ($field instanceof DataObject\ClassDefinition\Data\Objectbricks) {
                    $bricks[$field->getName()] = $field->getAllowedTypes();
                } elseif ($field instanceof DataObject\ClassDefinition\Data\Fieldcollections) {
                    $collections[$field->getName()] = $field->getAllowedTypes();
                }
            }
            foreach ($fromColumns as $fromColumn) {
                $fromColumn = get_object_vars($fromColumn);
                $fromColumn['id'] = $fromColumn['identifier'];
                $fromColumnsResult[] = $fromColumn;
            }
            foreach ($toColumns as $classToColumn) {
                $found = false;
                if (\is_array($mappings)) {
                    foreach ($mappings as $mapping) {
                        if ($mapping->getToColumn() === $classToColumn->getIdentifier()) {
                            $found = true;
                            $mappingDefinition[] = [
                                'fromColumn' => $mapping->getFromColumn(),
                                'toColumn' => $mapping->getToColumn(),
                                'primaryIdentifier' => $mapping->getPrimaryIdentifier(),
                                'setter' => $mapping->getSetter(),
                                'setterConfig' => $mapping->getSetterConfig(),
                                'interpreter' => $mapping->getInterpreter(),
                                'interpreterConfig' => $mapping->getInterpreterConfig(),
                            ];
                            break;
                        }
                    }
                }
                if (!$found) {
                    $mappingDefinition[] = [
                        'identifier' => null,
                        'fromColumn' => null,
                        'toColumn' => $classToColumn->getIdentifier(),
                        'primaryIdentifier' => false,
                        'config' => $classToColumn->getConfig(),
                        'setter' => $classToColumn->getSetter(),
                        'setterConfig' => $classToColumn->getSetterConfig(),
                        'interpreter' => $classToColumn->getInterpreter(),
                        'interpreterConfig' => $classToColumn->getInterpreterConfig(),
                    ];
                }
            }
            
            $i = 0;
            foreach($mappingDefinition as $testData){
                if($mappingDefinition[$i]['toColumn'] == $primaryKeyValue){
                    $mappingDefinition[$i]['primaryIdentifier'] = true;
                }
                $i++;
            }
            
            return $this->viewHandler->handle([
                'success' => true,
                'mapping' => $mappingDefinition,
                'fromColumns' => $fromColumnsResult,
                'toColumns' => $toColumns,
                'bricks' => $bricks,
                'fieldcollections' => $collections,
            ]);
        }
        return $this->viewHandler->handle(['success' => false]);
    }
    /**
     * @param Request $request
     * @return Response
     */
    public function exportAction(Request $request): Response
    {
        $id = (int)$request->get('id');
        if ($id) {
            $definition = $this->repository->find($id);
            if ($definition instanceof ImportDefinitionInterface) {
                $name = $definition->getName();
                unset($definition->id, $definition->creationDate, $definition->modificationDate);
                $response = new Response();
                $response->headers->set('Content-Type', 'application/json');
                $response->headers->set(
                    'Content-Disposition',
                    sprintf('attachment; filename="import-definition-%s.json"', $name)
                );
                $response->headers->set('Pragma', 'no-cache');
                $response->headers->set('Expires', '0');
                $response->headers->set('Content-Transfer-Encoding', 'binary');
                $response->setContent(json_encode($definition));
                return $response;
            }
        }
        throw new NotFoundHttpException();
    }
    /**
     * @param Request $request
     * @return mixed|\Symfony\Component\HttpFoundation\JsonResponse
     */
    public function importAction(Request $request)
    {
        $id = (int)$request->get('id');
        $definition = $this->repository->find($id);
        if ($id && $definition instanceof ImportDefinitionInterface && $request->files->has('Filedata')) {
            $uploadedFile = $request->files->get('Filedata');
            if ($uploadedFile instanceof UploadedFile) {
                $jsonContent = file_get_contents($uploadedFile->getPathname());
                $data = $this->decodeJson($jsonContent, false);
                $form = $this->resourceFormFactory->create($this->metadata, $definition);
                $handledForm = $form->submit($data);
                if ($handledForm->isValid()) {
                    $definition = $form->getData();
                    $this->manager->persist($definition);
                    $this->manager->flush();
                    return $this->viewHandler->handle(['success' => true]);
                }
            }
        }
        return $this->viewHandler->handle(['success' => false]);
    }
    /**
     * @param Request $request
     * @return mixed|\Symfony\Component\HttpFoundation\JsonResponse
     */
    public function duplicateAction(Request $request)
    {
        $id = (int)$request->get('id');
        $definition = $this->repository->find($id);
        $name = (string)$request->get('name');
        if ($definition instanceof ImportDefinitionInterface && $name) {
            $newDefinition = clone $definition;
            $newDefinition->setId(null);
            $newDefinition->setName($name);
            $this->manager->persist($newDefinition);
            $this->manager->flush();
            return $this->viewHandler->handle(['success' => true, 'data' => $newDefinition]);
        }
        return $this->viewHandler->handle(['success' => false]);
    }
    /**
     * @return array
     */
    protected function getConfigProviders(): array
    {
        return $this->getParameter('data_definitions.import_providers');
    }
    /**
     * @return array
     */
    protected function getConfigLoaders(): array
    {
        return $this->getParameter('data_definitions.loaders');
    }
    /**
     * @return array
     */
    protected function getConfigInterpreters(): array
    {
        return $this->getParameter('data_definitions.interpreters');
    }
    /**
     * @return array
     */
    protected function getConfigCleaners(): array
    {
        return $this->getParameter('data_definitions.cleaners');
    }
    /**
     * @return array
     */
    protected function getConfigSetters(): array
    {
        return $this->getParameter('data_definitions.setters');
    }
    /**
     * @return array
     */
    protected function getConfigFilters(): array
    {
        return $this->getParameter('data_definitions.filters');
    }
    /**
     * @return array
     */
    protected function getConfigRunners(): array
    {
        return $this->getParameter('data_definitions.runners');
    }
    /**
     * @return array
     */
    protected function getImportRuleConditions(): array
    {
        return $this->getParameter('data_definitions.import_rule.conditions');
    }
    /**
     * @return array
     */
    protected function getImportRuleActions(): array
    {
        return $this->getParameter('data_definitions.import_rule.actions');
    }
    
    /**
     * @param Request $request
     */
    public function listClassAction(Request $request)
    {
        $requiredClass  = $this->importDefClass();
        $classesList    =  DataObject\ClassDefinition::getByName($requiredClass);
        if (!empty($classesList)) {
            $fieldArray = array();
            $fieldArrayTemp = array();
            $fieldArrayTemp['id'] = $classesList->getId();
            $fieldArrayTemp['name'] = $classesList->getName();
            $fieldArray[] = $fieldArrayTemp;
        } else {
            $adminClass = $this->getBusinessUnitClassFromConfig();
            $adminClasses = $adminClass['config'];
            $adminClassesList = new DataObject\ClassDefinition\Listing();
            $classNameAndDisplayNameArray = array();
            foreach ($adminClasses as $classForAdmin) {
                $conditionArray[] =  'name = ' . $adminClassesList->quote(implode("",array_keys($classForAdmin['Class'][0])));
                $classNameAndDisplayNameArray[(implode("",array_keys($classForAdmin['Class'][0])))] = implode("",array_values($classForAdmin['Class'][0]));
            }
            
            $adminClassesList->setCondition(implode(" OR ", $conditionArray));
            $adminClassesList->setOrderKey('name');
            $adminClassesList->setOrder('asc');
            $classes = $adminClassesList->load();
            $fieldArray = array();
            
            foreach ($classes as $class) {
                $fieldArrayTemp = array();
                $fieldArrayTemp['name'] = $class->getName();
                $fieldArrayTemp['displayName'] = $classNameAndDisplayNameArray[$fieldArrayTemp['name']];
                $fieldArray[] = $fieldArrayTemp;
            }
        }
        
        return $this->json(["data" => $fieldArray]);
    }

    /**
     * @param Request $request
     */
    public function listPrimaryKeyAction(Request $request)
    {
        $className      = $request->get('className');
        $buConfig       = $this->getBusinessUnitClassFromConfig();
        $importLevelData   = [];
        $importLevels      = $this->getImportLevels();
        if ($className == 'Product') {
            foreach ($importLevels as $importType) {
                $importTypeArray = array();
                $importTypeArray['name'] = $importType;
                $importLevelData[] = $importTypeArray;
            }
        }

        $arrPrimaryKey = [];
        if (isset($buConfig['config'])) {
            foreach ($buConfig['config'] as  $arrClass) {
                $configClassName = implode("",array_keys($arrClass['Class'][0]));
                $arrPrimaryKey[$configClassName] = $arrClass['PrimaryKey'];
            }
        }

        $primaryKeyData = [];
        $primaryKeyConfigData = array_key_exists($className, $arrPrimaryKey) ? $arrPrimaryKey[$className] : [];
        foreach ($primaryKeyConfigData as $primaryKey) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['name'] = $primaryKey;
            $primaryKeyData[] = $fieldArrayTemp;
        }

        $data = ['primaryKeyData' => $primaryKeyData, 'importLevelData' => $importLevelData];
        return $this->json(["data" => $data]);
    }
    public function importDefClass()
    {
        $user = Admin::getCurrentUser();
        if (!$user->isAdmin()) {
            $common_role = $this->getCommonRoles();
            $rolesConfig    = $this->getBusinessUnitRolesFromConfig();
            $resultBU       = [];
            if (isset($rolesConfig['config'])) {
                foreach ($rolesConfig['config'] as $roleClass => $arrRoles) {
                    $resultBU[$arrRoles['Roles'][0]] = $roleClass;
                }
            }
            $buConfig   = $this->getBusinessUnitClassFromConfig();
            $resultClass = [];
            if (isset($buConfig['config'])) {
                foreach ($buConfig['config'] as $buClass => $arrClass) {
                    $resultClass[$buClass] = $arrClass['Class'][0];
                }
            }
            foreach ($common_role as $currentRole) {
                if (array_key_exists($currentRole, $resultBU)) {
                    $currentBU = $resultBU[$currentRole];
                    if (array_key_exists($currentBU, $resultClass)) {
                        $importClass = $resultClass[$currentBU];
                    }
                }
            }
        }
        return $importClass;
    }

    public function  getBusinessUnitClassFromConfig()
    {
        $yamlFilePath = Constants::DATA_DEFINITION_BU_CLASS;
        return Utils::getYmlConfig($yamlFilePath);
    }

    public function getBusinessUnitRolesFromConfig()
    {
        $yamlFilePath = Constants::DATA_DEFINITION_BU_ROLES;
        return Utils::getYmlConfig($yamlFilePath);
    }

    public function getRoleFromConfg()
    {
        $getAllRoles = $this->getBusinessUnitRolesFromConfig();
        $rolesIFPTG = array("IFSPTG_US" => $getAllRoles['config']['IFSPTG_US']['Roles']);
        $rolesCBS = array("CBS" => $getAllRoles['config']['CBS']['Roles']);
        return array_merge($rolesCBS, $rolesIFPTG);
    }

    public function getClassesAccordingToRoles()
    {
        $roles = $this->getRoleFromConfg();
        $getClass = $this->getBusinessUnitClassFromConfig();
        foreach ($roles as $key => $val) {
            if ($key == 'CBS') {
                $class = $getClass['config']['CBS']['Class'];
            } else {
                $class = $getClass['config']['IFSPTG_US']['Class'];
            }
            return $class;
        }
    }

    public function getImportLevels()
    {
        $buConfig   = $this->getBusinessUnitClassFromConfig();
        if (isset($buConfig['config'])) {
            foreach ($buConfig['config'] as  $arrLevels) {
                $resultImportLevels[] = $arrLevels['PRODUCT_TYPE'];
            }
        }
        $importLevel = $resultImportLevels[0];

        return $importLevel;
    }

    public function getCommonRoles()
    {
        $role_array = [];
        $roles = $this->getRoleFromConfg();
        foreach ($roles as $role_id) {
            $role_array[] = $role_id[0];
        }
        $user = Admin::getCurrentUser();
        if (!$user->isAdmin()) {
            $userRole = $this->getAdminUser()->getRoles();
            if ($userRole) {
                foreach ($userRole  as $role_id) {
                    $role = Role::getById($role_id);
                    if ($role) {
                        $user_roles[] = ['name' => $role->getName()];
                    }
                }
                $current_user_roles = [];
                foreach ($user_roles as $role) {
                    $current_user_roles[] = $role['name'];
                }
            }
            $common_roles = array_intersect($current_user_roles, $role_array);
        }
        return $common_roles;
    }

    /*
     *
     * @return JsonResponse
     */
    public function addAction(Request $request)
    {
        $this->isGrantedOr403();

        $name = $request->get('name');

        $configArray = include PIMCORE_PROJECT_ROOT . '/var/config/importdefinitions.php';
        foreach ($configArray as $perConfig) {
            $existname[] = strtolower($perConfig['name']);
        }
        if(is_array($existname)){
            $alreadyTakenName =  in_array(strtolower($name), $existname);
        }

        if (strlen($name) <= 0 || $alreadyTakenName == true) {
            return $this->viewHandler->handle(['success' => false]);
        } else {
            $resource = $this->factory->createNew();

            if ($resource instanceof ResourceInterface) {
                $resource->setValue('name', $name);
            }

            foreach ($request->request->all() as $key => $value) {
                $resource->setValue($key, $value);
            }

            $this->eventDispatcher->dispatchPreEvent('create', $this->metadata, $resource, $request);

            $this->manager->persist($resource);
            $this->manager->flush();

            $this->eventDispatcher->dispatchPostEvent('create', $this->metadata, $resource, $request);

            return $this->viewHandler->handle(['data' => $resource, 'success' => true], ['group' => 'Detailed']);
        }
    }

    // fucntion to start data definition import
    public function saveDataDefinitionImportAction(Request $request)
    {
        $commonHelperObject = new commonHelper();
        $name               = $request->get('name');
        $importDefinitionId = $request->get('importDefinitionId');

        /**
         * checking if the data definition name exist
         */
        $existingDefinition =  DataDefinitionImport::getByName($name);

        if ($existingDefinition && $existingDefinition->getImportDefinitionId()==$importDefinitionId) {
            DataImportLogger::log("Requested data definition ($name) already exitst into the database.", DataImportLogger::INFO);
            $msg = $this->trans('data_definition_already_exists');
            return $this->json(['success' => false, 'msg' => $msg]);
        }

        /**
         * checking if the import definition exist
         */
        $importDefinition = null;
        if ($importDefinitionId) {
            $importDefinition = ImportDefinition::getById($importDefinitionId);
        }

        if (!$importDefinition) {
            DataImportLogger::log("Requested import definition ($importDefinitionId) not found in ImportDefinitionController saveDataDefinitionImportAction .", DataImportLogger::INFO);
            $msg = $this->trans('data_definition_not_found_relaod_admin');
            return $this->json(['success' => false, 'msg' => $msg]);
        }

        // get the config details to get the file path
        $configArray        = include PIMCORE_PROJECT_ROOT . '/var/config/importdefinitions.php';
        $currentDefinition  = $configArray[$importDefinitionId];
        $definitionName     = $currentDefinition['name'];
        $fileName           = $definitionName . "-" . $currentDefinition['configuration']['csvFile'];
        $filePath           = $commonHelperObject->getDefaultAssetFolderForUploadedFiles() . "/" . $fileName;
        $asset              = Asset::getByPath($filePath);
        $fullPath           = $asset->getFileSystemPath();
        $importFilePimcoreAssetId   = $asset->getId();

        $csvContent         = file_get_contents($fullPath);
        $tempFilePath       = PIMCORE_PROJECT_ROOT . '/var/tmp/'.$fileName;
        $fd                 = fopen($tempFilePath, "w");
        fputs($fd, $csvContent);
        
        
        // insert the record into the data definition import
        $dataImport  = new DataDefinitionImport();
        $dataImport->setName($name);
        $dataImport->setStatus(Constants::SCHEDULE_STATUS_INPROGRESS);
        $dataImport->setImportFileName($fileName);
        $dataImport->setImportFilePimcoreAssetId($importFilePimcoreAssetId);
        $dataImport->setImportProcessStartTime(new \DateTime());
        $dataImport->setImportDefinitionId($importDefinition->getId());
        $dataImport->setCreationDate(new \DateTime());

        $user = \Pimcore\Tool\Admin::getCurrentUser();
        $dataImport->setUserOwner($user->getId());

        try {
            $dataImport->save();
            $importDataId   = $dataImport->getId();

            // create command to import the data of csv and run command in background
            $arrParams      = ['file' => $tempFilePath, 'importDataId' => $importDataId];
            $encParams      = json_encode(json_encode($arrParams,JSON_UNESCAPED_SLASHES), JSON_UNESCAPED_SLASHES);
            $cmd            = PIMCORE_PROJECT_ROOT. "/bin/console data-definitions:import -d $importDefinitionId -p \"$encParams\"";
            $executed       = \Pimcore\Tool\Console::execInBackground($cmd);
        } catch (NotNullConstraintViolationException $exception) {
            DataImportLogger::log("Error saving schedule: " . $exception->getMessage(), DataImportLogger::CRITICAL);

            $msg = $this->trans('data_definition_mandatory_field_check_failed');
            return $this->json(['success' => false, 'msg' => $msg]);
        } catch (\Exception $exception) {
            DataImportLogger::log("Error saving schedule: " . $exception->getMessage(), DataImportLogger::CRITICAL);
            return $this->json(['success' => false, 'msg' => $exception->getMessage()]);
        }

        // return last inserted row
        $importHelperObject = new importHelper();
        $data = $importHelperObject->buildScheduleForGrid($dataImport);
        $data['success'] = true;

        return $this->json($data);
    }

    // function to list data definition import
    public function listDataDefinitionImportAction(Request $request)
    {
        $importHelperObject = new importHelper();
        $importDefinitionId = $request->get('importDefinitionId');

        $list = new DataDefinitionImport\Listing();
        $condition = "importDefinitionId = " . $importDefinitionId . " AND status != " . $list->quote(Constants::SCHEDULE_STATUS_EXPIRED);
        $list->setCondition($condition);
        $list->setOrderKey("creationDate");
        $list->setOrder("DESC");
        $list->load();

        $data = [];
        foreach ($list->getItems() as $dataImport) {
            $data[] = $importHelperObject->buildScheduleForGrid($dataImport);
        }

        return $this->json(['success' => true, 'data' => $data]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function deleteAction(Request $request)
    {
        $this->isGrantedOr403();

        $id = $request->get('id');

        $resource = $this->repository->find($id);

        if ($resource instanceof ResourceInterface) {
            $this->eventDispatcher->dispatchPreEvent('delete', $this->metadata, $resource, $request);

            $this->manager->remove($resource);
            $this->manager->flush();

            $this->eventDispatcher->dispatchPostEvent('delete', $this->metadata, $resource, $request);

            return $this->viewHandler->handle(['success' => true]);
        }

        return $this->viewHandler->handle(['success' => false]);
    }
}
