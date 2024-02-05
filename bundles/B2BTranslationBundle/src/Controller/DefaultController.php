<?php

namespace B2BTranslationBundle\Controller;

use Pimcore\Model\DataObject;
use Exception;
use Pimcore\Controller\FrontendController;
use Pimcore\Tool\Admin;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use B2BTranslationBundle\B2BTranslationConstants;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Pimcore\Security\User\TokenStorageUserResolver;
use Pimcore\Security\User\User as UserProxy;
use Symfony\Contracts\Service\Attribute\Required;

/**
 * @Route("/admin/b2b_translation")
 */

class DefaultController extends FrontendController
{
    private $common;
    protected $container;
    private $config;
    public const CONFIG_NAME = 'plugin_b2b_translation_mapping';
    protected const SUCCESS = 'success';
    protected const MESSAGE = 'message';
    protected const B2B_TRANSLATION_MAPPINGS = 'B2B Translation Mappings';

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->config = $this->container->get('b2b_translation.config_provider_service');
        $this->common = $this->container->get('b2b_translation.common_helper');
    }

    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from b2b_translation');
    }

    /**
     * @Route("/import")
     */
    public function translationImportAction(Request $request)
    {
        $cmd = PIMCORE_PROJECT_ROOT."/bin/console contitech:b2b:pim-data-import-command";
        shell_exec($cmd);
        return new Response('Executed');
    }

    /**
     * @Route("/export")
     */
    public function translationExportAction(Request $request)
    {
        $cmd = PIMCORE_PROJECT_ROOT."/bin/console contitech:b2b:pim-data-export-command";
        shell_exec($cmd);
        return new Response('Executed');
    }
    
    /**
     * mapping listing
     * @Route("/tree")
     * @param Request $request
     * @return JsonResponse
     */
    public function listAction(Request $request)
    {
        $mappings = [];
        $obj = new DataObject\B2BTranslationMapping\Listing();

        $channel = $obj->load();
        foreach ($channel as $row) {
            $mappings[] = array('id'=>$row->getId(),'text'=>$row->getName(), 'leaf'=>'true');
        }

        return $this->json($mappings);
    }

    /**
     * @Route("/get")
     * @param Request $request
     * @return JsonResponse
     */
    public function getAction(Request $request)
    {
        $data = [];
        try {

            $class = DataObject\ClassDefinition::getByName('B2BTranslationMapping');
            $fieldTitle = $class->getFieldDefinition('BusinessUnit');
            $options = $fieldTitle->getOptions();

            $vendors = [];
            $id = $request->get('id');
            if($options)
            {
                foreach ($options as $value) {
                    $vendors[] = array('id'=>$value['value'],'name'=>$value['key']);
                }
            }

            $object = DataObject\B2BTranslationMapping::getById($id);
            $data = $this->buildItem($object);
            
        } catch (Exception $e) {
            $msg = $e->getMessage();
            return $this->json(['result' => false, 'data' => [], "msg" => $msg]);
        }
        return $this->json(['result' => true, 'general' => ['o_id' => $object->getId(),
        'o_key' => $object->getName()], 'data' => $data, 'vendors' => $vendors, "msg" => '']);
    }

    /**
     * @param MappingTable $channel
     *
     * @return array
     */
    private function buildItem($channel): array
    {
        return [
            'id' => $channel->getId(),
            'text' => $channel->getName(),
            'vendor' => $channel->getBusinessUnit(),
            'type' => $channel->getTranslationDataType(),
            'gridData' => $channel->getPIMB2BMappingData()
        ];
    }

    /**
     * mapping listing
     * @Route("/update")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateAction(Request $request)
    {
        $mappingId = $request->get('mappingId');
        $mappingObject = DataObject\B2BTranslationMapping::getById($mappingId);
        if (!empty($mappingObject) && $mappingObject instanceof DataObject\B2BTranslationMapping) {
            $vendorId = $request->get('vendor');
            $mappingType = $request->get('type');
            $data = $request->get('gridData');
            $mappingObject->setBusinessUnit($vendorId);
            $mappingObject->setTranslationDataType($mappingType);
            $gridData = [];
            $checkDuplicate=[];
            $duplicateCount=0;
            $duplicateFieldName=[];
            if (!empty($data)) {
                $dataArray = (array)json_decode($data);
                foreach ($dataArray as $row) {
                    $rowArray = (array)$row;
                    if(in_array($rowArray['b2bName'],$checkDuplicate) && !empty($rowArray['b2bName'])){
                        $duplicateCount=1;
                        $duplicateFieldName[]=$rowArray['b2bName'];
                    }else{
                        $checkDuplicate[]=$rowArray['b2bName'];
                    }
                    if($rowArray['b2bName'] == '1')
                    {
                        $gridData[] = [$rowArray['name'], ''];
                    }
                    else{
                        $gridData[] = [$rowArray['name'], $rowArray['b2bName']];
                    }
                }

                $mappingObject->setPIMB2BMappingData($gridData);
            }
            if($duplicateCount>0){
                $duplicateFieldNameStr=implode(',',$duplicateFieldName);
                $msg="Duplicate Mapping of B2B Attribute Fields : ".$duplicateFieldNameStr;
                return $this->json([self::SUCCESS => false, self::MESSAGE => $msg]);
                
            }else{
                $mappingObject->save();
            }
        }
        return $this->json(["success" => true]);
    }

    public function getSalesForceAttribute($fileName, $translationClassType)
    {
        $b2bTranslationConfig = $this->config->getBusinessUnitTranslationConfig($fileName);

        return $this->common->getParameter($b2bTranslationConfig, $translationClassType);
    }
    public function getLocalizedAttribute($businessUnit, $className)
    {
        $businessUnitFileName = '';

        if($businessUnit == 'IFS_PTG_US')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_IFS_PTG_US_FILE_NAME;
        }
        elseif($businessUnit == 'CS')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_CS_US_FILE_NAME;
        }
        elseif($businessUnit == 'PTG_EU')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_PTG_EU_FILE_NAME;
        }
        elseif($businessUnit == 'IFS_EMEA')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_IFS_EU_FILE_NAME;
        }

        $b2bTranslationConfig = $this->config->getBusinessUnitTranslationConfig($businessUnitFileName);

        return $this->common->getParameter($b2bTranslationConfig, $className);
    }


    /**
     * get pim information
     * @Route("/getPIMData")
     * @param Request $request
     * @return JsonResponse
     */
    public function getPIMDataAction(Request $request)
    {
        $className = $request->get('type');
        $businessUnit = $request->get('vendor');

        $mappingObject = DataObject\B2BTranslationMapping::getById($request->get('mappingId'));
        $mappingArray = [];
        if (!empty($mappingObject) && $mappingObject instanceof DataObject\B2BTranslationMapping) {
            $mappingData = $mappingObject->getPIMB2BMappingData();
            if (!empty($mappingData)) {
                foreach ($mappingData as $mData) {
                    $mappingArray[$mData['PIM Attribute Name']] = $mData['B2B SalesForce Attribute Name'];
                }
            }
        }

        $attributeList = $this->getLocalizedAttribute($businessUnit, $className);

        if($attributeList)
        {
            ksort($attributeList,SORT_LOCALE_STRING);
        }
        
        $data = [];
        $i = 1;
        if($attributeList)
        {
            foreach ($attributeList as $attributeKey => $record) {
                $b2bData = '';
                if (array_key_exists($attributeKey, $mappingArray)) {
                    $b2bData = $mappingArray[$attributeKey];
                }
                $data[] = array('id'=>$i++,'name'=>$attributeKey, 'b2bName' => $b2bData);
            }
        }
        return $this->json(['data' => $data]);
    }
    /**
     * get B2B Data information
     * @Route("/getB2BData")
     * @param Request $request
     * @return JsonResponse
     */
    public function getB2BDataAction(Request $request)
    {
        $className = $request->get('type');
        $attributeList = $this->getSalesForceAttribute(B2BTranslationConstants::B2B_ECOMMERCE_FILE_NAME, $className);
        
        if($attributeList)
        {
            ksort($attributeList,SORT_LOCALE_STRING);
        }
        
        if($attributeList)
        {
            $data = [];
            $data[] = array('id'=>'1','name'=>'(Empty)');
            foreach ($attributeList as $key => $record) {
                $data[] = array('id'=>$key,'name'=>$key);
            }
        }

        return $this->json(['data' => $data]);
    }
    
    
    /**
     * get vendors information
     * @Route("/get-vendors")
     * @param Request $request
     * @return JsonResponse
     */
    public function getVendorsAction(Request $request)
    {
        $vendors = [];
        $vendors[] = array('id'=>'1','name'=>'IFS US');
        return $this->json($vendors);
    }

    /**
     * add mapping
     * @Route("/add")
     * @param Request $request
     * @return JsonResponse
     */
    public function addAction(Request $request)
    {
        try {
            $name = $request->get('name');
            $object = DataObject\B2BTranslationMapping::getByName(trim($name), 1);

            if (!$object instanceof DataObject\B2BTranslationMapping) {
                $parentId = DataObject\Service::createFolderByPath(self::B2B_TRANSLATION_MAPPINGS)->getId();
                $newObject = new DataObject\B2BTranslationMapping;
                $newObject->setName(trim($name));
                $newObject->setKey(\Pimcore\Model\Element\Service::getValidKey(trim($name), 'object'));
                $newObject->setParentId($parentId);
                $newObject->setPublished(true);
                $newObject->save();
                return $this->json([self::SUCCESS => true, "id" => $newObject->getId(), 'message' => '']);
            } else {
                $message = 'prevented creating object because object with same path+key already exists';
                return $this->json([self::SUCCESS => false, self::MESSAGE => $message, 'id' => $object->getId()]);
            }
        } catch (Exception $ex) {
            return $this->json([self::SUCCESS => false, self::MESSAGE => $ex->getMessage()]);
        }
    }
    /**
     * add mapping
     * @Route("/add")
     * @param Request $request
     * @return JsonResponse
     */
    public function saveAction(Request $request)
    {
        try {
            $name = $request->get('name');
            $object = DataObject\B2BTranslationMapping::getByName(trim($name), 1);
            if (!$object instanceof DataObject\B2BTranslationMapping) {
                $parentId = DataObject\Service::createFolderByPath(self::B2B_TRANSLATION_MAPPINGS)->getId();
                $newObject = new DataObject\B2BTranslationMapping;
                $newObject->setName(trim($name));
                $newObject->setKey(\Pimcore\Model\Element\Service::getValidKey(trim($name), 'object'));
                $newObject->setParentId($parentId);
                $newObject->setPublished(true);
                $newObject->save();
                return $this->json([self::SUCCESS => true, "id" => $newObject->getId(), 'message' => '']);
            } else {
                $message = 'prevented creating object because object with same path+key already exists';
                return $this->json([self::SUCCESS => false, self::MESSAGE => $message, 'id' => $object->getId()]);
            }
        } catch (Exception $ex) {
            return $this->json([self::SUCCESS => false, self::MESSAGE => $ex->getMessage()]);
        }
    }

    /**
     * @var TokenStorageUserResolver|TokenStorageUserResolver
     */
    protected $tokenResolver;

    #[Required]
    public function setTokenResolver(TokenStorageUserResolver $tokenResolver): void
    {
        $this->tokenResolver = $tokenResolver;
    }

    /**
    * Get user from user proxy object which is registered on security component
    *
    * @param bool $proxyUser Return the proxy user (UserInterface) instead of the pimcore model
    *
    * @return UserProxy|User|null
    */
    protected function getPimcoreUser($proxyUser = false)
    {
        if ($proxyUser) {
            return $this->tokenResolver->getUserProxy();
        }

        return $this->tokenResolver->getUser();
    }

    /**
    * Check user permission
    *
    * @param string $permission
    *
    * @throws AccessDeniedHttpException
    */
    protected function checkPermission($permission)
    {
        if (!$this->getPimcoreUser() || !$this->getPimcoreUser()->isAllowed($permission)) {
            Logger::error(
                'User {user} attempted to access {permission}, but has no permission to do so',
                [
                    'user' => $this->getPimcoreUser()?->getName(),
                    'permission' => $permission,
                ]
            );

            throw $this->createAccessDeniedHttpException();
        }
    }

    /**
     * delete mapping
     * @Route("/delete")
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteAction(Request $request)
    {
        $this->checkPermission(self::CONFIG_NAME);
        try {
            $id = intval($request->query->get('id'));
            $object = DataObject\B2BTranslationMapping::getById($id);
            $object->delete();
            return $this->json([self::SUCCESS => true]);
        } catch (Exception $ex) {
            return $this->json([self::SUCCESS => false]);
        }
    }

    /**
     * rename mapping
     * @Route("/rename")
     * @param Request $request
     * @return JsonResponse
     */
    public function renameAction(Request $request)
    {
        $this->checkPermission(self::CONFIG_NAME);
        try {
            $id = intval($request->query->get('id'));
            $name = trim($request->query->get('name'));
            $object = DataObject\B2BTranslationMapping::getByName(trim($name), 1);
            if (!$object instanceof DataObject\B2BTranslationMapping) {
                $object = DataObject\B2BTranslationMapping::getById($id);
                $object->setName($name);
                $object->save();
                return $this->json([self::SUCCESS => true, "id" => $object->getId(), self::MESSAGE => '']);
            } else {
                $message = 'prevented renaming object because object with same path+key already exists';
                return $this->json([self::SUCCESS => false, self::MESSAGE => $message, 'id' => $object->getId(),]);
            }
        } catch (Exception $ex) {
            return $this->json([self::SUCCESS => false, self::MESSAGE => $ex->getMessage()]);
        }
    }

    /**
     * @Route("/clone")
     *
     * @param Request $request
     *
     * @return JsonResponse
     * @throws Exception
     *
     */
    public function cloneAction(Request $request)
    {
        try {
            $id = intval($request->get('id'));
            $object  = DataObject\B2BTranslationMapping::getById($id);

            if ($object instanceof DataObject\B2BTranslationMapping) {

                $objectService = new \Pimcore\Model\DataObject\Service($object);
                $newObject = $objectService->copyAsChild($object->getParent(), $object);
                return $this->json([self::SUCCESS => true, "id" => $newObject->getId(), self::MESSAGE => '']);
            } else {
                return $this->createNotFoundException('Channel configuration not found');
            }
        } catch (Exception $e) {
            return $this->json([self::SUCCESS => false, self::MESSAGE => $e->getMessage()]);
        }
    }

    /**
     * @Route("/vendor-mapping/save", methods={"post"})
     * @param Request $request
     * @return JsonResponse
     */
    public function saveMapping(Request $request)
    {
        try {
            return $this->json([self::SUCCESS => true, self::MESSAGE => "Mapping Save successfully"]);
        } catch (\Exception $e) {
            return $this->json([self::SUCCESS => false, self::MESSAGE => $e->getMessage()]);
        }
    }
}