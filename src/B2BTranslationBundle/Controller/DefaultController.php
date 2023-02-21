<?php

namespace B2BTranslationBundle\Controller;

use B2BTranslationBundle\Services\ConfigProviderService;
use Pimcore\Model\DataObject;
use Exception;
use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use Pimcore\Tool\Admin;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/b2_b_translation")
 */

class DefaultController extends AdminController
{
    private $common;
    public const CONFIG_NAME = 'plugin_b2b_translation_mapping';
    protected const SUCCESS = 'success';
    protected const MESSAGE = 'message';
    protected const B2B_TRANSLATION_MAPPINGS = 'B2B Translation Mappings';
    protected const B2B_IFS_PTG_US_FILE_NAME = 'ifs_ptg_us';
    protected const B2B_CS_US_FILE_NAME = 'cs_us';
    protected const B2B_PTG_EU_FILE_NAME = 'ptg_eu';
    protected const B2B_IFS_EU_FILE_NAME = 'ifs_us';
    protected const B2B_ECOMMERCE_FILE_NAME = 'b2b_ecommerce';

    public function __construct() {
        $this->common = \Pimcore::getContainer()->get('b2b_translation.common_helper');
    }

    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from b2_b_translation');
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
            $name = '';
            if($options)
            {
                foreach ($options as $key => $value) {
                    $vendors[] = array('id'=>$value['value'],'name'=>$value['key']);
                }
            }

            $object = DataObject\B2BTranslationMapping::getById($id);
            $data = $this->buildItem($object);
            
        } catch (Exception $e) {
            $msg = $e->getMessage();
            return $this->json(['result' => false, 'data' => [], "msg" => $msg]);
        }
        return $this->json(['result' => true, 'general' => ['o_id' => $object->getId(), 'o_key' => $object->getName()], 'data' => $data, 'vendors' => $vendors, "msg" => '']);
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
            'gridData' => $channel->getAVBVendorData()
        ];

        // 'vendor' => $channel->getVendorList(),
        //     'type' => $channel->getMappingType(),
        //     'gridData' => $channel->getAVBVendorData()
    }

    /**
     * mapping listing
     * @Route("/update")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateAction(Request $request)
    {
        $mappings = [];
        $user = Admin::getCurrentUser();
        $mappingId = $request->get('mappingId');
        $mappingObject = DataObject\B2BTranslationMapping::getById($mappingId);
        if (!empty($mappingObject) && $mappingObject instanceof DataObject\B2BTranslationMapping) {
            $vendorId = $request->get('vendor');
            $mappingType = $request->get('type');
            $data = $request->get('gridData');
            $mappingObject->setBusinessUnit($vendorId);
            $mappingObject->setTranslationDataType($mappingType);
            $gridData = [];
            if (!empty($data)) {
                $dataArray = (array)json_decode($data);
                // p_r($dataArray);
                foreach ($dataArray as $row) {
                    $rowArray = (array)$row;
                    $gridData[] = [$rowArray['name'], $rowArray['avbName']];
                }
                $mappingObject->setAVBVendorData($gridData);
            }
            $mappingObject->save();
        }
        return $this->json(["success" => true]);
    }

    public function getSalesForceAttribute($fileName, $translationClassType)
    {
        $b2bTranslationList = [];
        $b2bTranslationConfig = \Pimcore::getContainer()->get('b2b_translation.config_provider_service')->getBusinessUnitTranslationConfig($fileName);
        $b2bTranslationList = $this->common->getParameter($b2bTranslationConfig, $translationClassType);

        return $b2bTranslationList;
    }
    public function getLocalizedAttribute($businessUnit, $className)
    {
        $businessUnitFileName = '';

        if($businessUnit == 'IFS_PTG_US')
        {
            $businessUnitFileName = self::B2B_IFS_PTG_US_FILE_NAME;
        }
        else if($businessUnit == 'CS_US')
        {
            $businessUnitFileName = self::B2B_CS_US_FILE_NAME;
        }
        else if($businessUnit == 'PTG_EU')
        {
            $businessUnitFileName = self::B2B_PTG_EU_FILE_NAME;
        }
        else if($businessUnit == 'IFS_EU')
        {
            $businessUnitFileName = self::B2B_IFS_EU_FILE_NAME;
        }

        $b2bTranslationList = [];
        $b2bTranslationConfig = \Pimcore::getContainer()->get('b2b_translation.config_provider_service')->getBusinessUnitTranslationConfig($businessUnitFileName);
        $b2bTranslationList = $this->common->getParameter($b2bTranslationConfig, $className);

        return $b2bTranslationList;
    }


    /**
     * get vendors information
     * @Route("/getVendorData")
     * @param Request $request
     * @return JsonResponse
     */
    public function getVendorDataAction(Request $request)
    {
        $className = $request->get('type');
        $businessUnit = $request->get('vendor');

        $mappingObject = DataObject\B2BTranslationMapping::getById($request->get('mappingId'));
        $mappingArray = [];
        if (!empty($mappingObject) && $mappingObject instanceof DataObject\B2BTranslationMapping) {
            $mappingData = $mappingObject->getAVBVendorData();
            if (!empty($mappingData)) {
                foreach ($mappingData as $mData) {
                    $mappingArray[$mData['PIM Attribute Name']] = $mData['B2B SalesForce Attribute Name'];
                }
            }
        }

        $attributeList = $this->getLocalizedAttribute($businessUnit, $className);
        $data = [];
        $i = 1;
        if($attributeList)
        {
            foreach ($attributeList as $attributeKey => $record) {
                $avbData = '';
                if (array_key_exists($attributeKey, $mappingArray)) {
                    $avbData = $mappingArray[$attributeKey];
                }
                $data[] = array('id'=>$i++,'name'=>$attributeKey, 'avbName' => $avbData);
            }
        }
        return $this->json(['data' => $data]);
    }
    /**
     * get AVB Data information
     * @Route("/getAVBData")
     * @param Request $request
     * @return JsonResponse
     */
    public function getAVBDataAction(Request $request)
    {
        $className = $request->get('type');
        $attributeList = $this->getSalesForceAttribute(self::B2B_ECOMMERCE_FILE_NAME, $className);
        
        if($attributeList)
        {
            $data = [];
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
        // $list = new DataObject\Vendor\Listing();
        $vendors = [];
        // foreach ($list as $vendor) {
        //     $vendors[] = array('id'=>$vendor->getId(),'name'=>$vendor->getVendorName());
        // }
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
        // $this->checkPermission(self::CONFIG_NAME);
        try {
            $name = $request->get('name');
            $object = DataObject\B2BTranslationMapping::getByName(trim($name));
            if (!$object instanceof DataObject\B2BTranslationMapping) {
                // $parentId = DataObject\Service::createFolderByPath(self::B2B_TRANSLATION_MAPPINGS)->getId();
                $parentId = 10980879;
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
        // $this->checkPermission(self::CONFIG_NAME);
        try {
            $name = $request->get('name');
            $object = DataObject\B2BTranslationMapping::getByName(trim($name));
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
            $object = DataObject\B2BTranslationMapping::getByName(trim($name));
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
                // $newObject = \Pimcore\Model\DataObject\Service::cloneMe($object);
                // p_r($newObject);die;

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
        $objectId = (int) $request->get('objectId');
        
        try {
            $data = $request->request->all();

            // ChannelService::updateChannelMapping($data, $objectId);
            return $this->json([self::SUCCESS => true, self::MESSAGE => "Mapping Save successfully"]);
        } catch (\Exception $e) {
            return $this->json([self::SUCCESS => false, self::MESSAGE => $e->getMessage()]);
        }
    }
}
