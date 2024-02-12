<?php

namespace AppBundle\Services;

use Pimcore\Model\DataObject;
use Pimcore\Model\Element\Service;

class MultiselectMasterService
{
    private $configProviderService;

    private $typeToFolderNameMapping;

    private $multiselectMasterRootFolderObject;

    public function __construct(ConfigProviderService $configProviderService)
    {
        $this->configProviderService = $configProviderService;
        $multiselectMasterRootFolderPath = $this->getRequiredMultiselectMasterConfig('multiselectMasterRootFolderPath');
        $this->multiselectMasterRootFolderObject = DataObject\Folder::getByPath($multiselectMasterRootFolderPath);
        $this->typeToFolderNameMapping = $this->getRequiredMultiselectMasterConfig("multiselect_type_to_pimcore_folder_mapping");
    }

    /**
     * get the existing master object or create new one if it does not exist
     *
     * @param string $type : name of the multiselect/select field
     * @param string $brickGroupName
     * @param string $key : key of the master object
     * @param bool $createIfNotExist : true to create not existing masters
     * @return DataObject\MultiselectMaster
     * @throws \Exception
     */
    public function getMasterObject(string $type, string $brickGroupName, string $key, bool $createIfNotExist = true): ?DataObject\MultiselectMaster
    {
        $object = null;
        $key = Service::getValidKey($key, 'object');
        $masterType = $this->getMasterType($type, $brickGroupName);

        $listing = new DataObject\MultiselectMaster\Listing();
        // we should have a unique entry for a set of key and type
        $listing->setCondition(" key   = :key AND masterType = :masterType ", ["key" => $key, "masterType" => $masterType]);
        $listing->load();
        $objects = $listing->getObjects();

        // if object already exits then return it otherwise create new object
        if (count($objects) > 0) {
            $object = $objects[0];
        } else {
            if($createIfNotExist){
                $masterObjectParentFolderObject = $this->getParentFolderForMasterObject($this->typeToFolderNameMapping[$type], $brickGroupName);
                if($masterObjectParentFolderObject){
                    $object = new DataObject\MultiselectMaster();
                    $object->setKey($key);
                    $object->setParent($masterObjectParentFolderObject);
                    $object->setPublished(true);
                    // TODO: add validation for available types
                    $object->setMasterType($masterType);
                }
            }
        }

        return $object;

    }

    /**
     * get the parent folder for the master object
     *
     * @param $typeFolderName
     * @param $brickGroupName
     * @return DataObject\Folder
     */
    private function getParentFolderForMasterObject($typeFolderName, $brickGroupName): DataObject\Folder
    {
        $typeFolderName = Service::getValidKey($typeFolderName, 'object');
        $brickGroupName = Service::getValidKey($brickGroupName, 'object');

        $brickGroupFolderPath = $this->getRequiredMultiselectMasterConfig('multiselectMasterRootFolderPath') . "/" . $brickGroupName;
        $brickGroupFolderObject = DataObject\Folder::getByPath($brickGroupFolderPath, true);
        // create brick group folder if does not exist
        if (!$brickGroupFolderObject) {
            $brickGroupFolderObject = $this->createFolder($brickGroupName, $this->multiselectMasterRootFolderObject);
        }

        $typeFolderPath = $brickGroupFolderPath . "/" . $typeFolderName;
        $typeFolderObject = DataObject\Folder::getByPath($typeFolderPath, true);
        // create type folder if does not exist
        if (!$typeFolderObject) {
            $typeFolderObject = $this->createFolder($typeFolderName, $brickGroupFolderObject);
        }

        return $typeFolderObject;
    }

    private function createFolder(string $folderName, DataObject\Folder $folderParent): DataObject\Folder
    {

        $folderObject = DataObject\Folder::create([
            'parentId' => $folderParent->getId(),
            'creationDate' => time(),
//                'userOwner' => $this->getAdminUser()->getId(),
//                'userModification' => $this->getAdminUser()->getId(),
            'key' => $folderName,
            'published' => true
        ]);
        return $folderObject;
    }


    private function getMasterType(string $type, string $brickGroupName): string
    {
        return $brickGroupName . "~" . $type;
    }

    /**
     * get required data from config file
     *
     * @param $key
     * @return mixed
     */
    public function getRequiredMultiselectMasterConfig(string $key)
    {
        return $this->configProviderService->getMultiselectMasterConfig()[$key];
    }

}
