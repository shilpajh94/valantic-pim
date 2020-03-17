<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 16/3/20
 * Time: 4:44 PM
 */

namespace AppBundle\Command;

use AppBundle\Services\ConfigProviderService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Pimcore\Model\DataObject;

class MultiselectMasterImportCommand extends Command
{
    private $configProviderService;
    private $parentFolderObject;
    private $typeToFolderNameMapping;
    private $importDirectory;
    private $csvIndexToLangMap;

    /**
     * MultiselectMasterImportCommand constructor.
     * @param ConfigProviderService $configProviderService
     */
    public function __construct(ConfigProviderService $configProviderService)
    {
        $this->configProviderService = $configProviderService;

        $parentFolderPath = $this->getRequiredMultiselectMasterConfig('parentFolderPath');
        $this->parentFolderObject = DataObject\Folder::getByPath($parentFolderPath);

        $this->csvIndexToLangMap = $this->getRequiredMultiselectMasterConfig('csv_columns_index_language_mapping');
        $this->importDirectory = $this->getRequiredMultiselectMasterConfig('import_directory_system_path');
        $this->typeToFolderNameMapping = $this->getRequiredMultiselectMasterConfig("multiselect_type_to_pimcore_folder_mapping");

        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('contitech:multiselect_master_import')
            ->setDescription('Import the multiselect master data using CSV.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $scannedFiles = array_diff(scandir($this->importDirectory), array('..', '.'));
        $csvDelimiter = $this->getRequiredMultiselectMasterConfig("csv_delimiter");

        foreach ($scannedFiles as $fileName) {

            $filePath = $this->importDirectory . "/" . $fileName;
            $masterType = explode(".", $fileName)[0];

            if(!array_key_exists($masterType,$this->typeToFolderNameMapping)){
                $this->log("Master type ".$masterType." does not exist in pimcore, so skipping ".$fileName." file.","ERROR");
                continue;
            }

            $handle = fopen($filePath, "r");
            $rowCount = 1;

            while (($data = fgetcsv($handle,0,$csvDelimiter)) !== FALSE) {
                if (count($data) > 0) {
                    if ($data[0]) {

                        $masterObject = $this->getMasterObject($masterType, $data[0]);
                        foreach ($this->csvIndexToLangMap as $csvIndex => $languageCode) {
                            $masterObject->setName($data[(int)$csvIndex], $languageCode);
                        }
                        $masterObject->save();

                    } else {
                        $this->log("File [" . $filePath . "] row [" . $rowCount . "] does not contain english data, so skipping this row.");
                    }
                }
                $rowCount++;
            }
        }
    }

    /**
     * get the existing master object or create new one if it does not exist
     *
     * @param $type
     * @param $key
     * @return DataObject\MultiselectMaster
     */
    private function getMasterObject($type, $key)
    {

        $listing = new DataObject\MultiselectMaster\Listing();
        // we should have a unique entry for a set of key and type
        $listing->setCondition(" o_key = :key AND masterType = :masterType ", ["key" => $listing->quote($key), "masterType" => $listing->quote($type)]);
        $listing->load();
        $objects = $listing->getObjectS();

        // if object already exits then return it otherwise create new object
        if (count($objects) > 0) {
            $object = $objects[0];
        } else {
            $parentFolderObject = $this->getParentFolder($this->typeToFolderNameMapping[$type]);
            $object = new DataObject\MultiselectMaster();
            $key = \Pimcore\Model\Element\Service::getValidKey($key, 'object');
            $object->setKey($key);
            $object->setParent($parentFolderObject);
            $object->setPublished(true);
            // TODO: add validation for available types
            $object->setMasterType($type);
        }

        return $object;

    }

    /**
     * get the parent folder for the master object
     *
     * @param $folderName
     * @return null|DataObject\Folder
     */
    private function getParentFolder($folderName)
    {
        $folderName = \Pimcore\Model\Element\Service::getValidKey($folderName, 'object');

        $folderPath = $this->getRequiredMultiselectMasterConfig('parentFolderPath') . "/" . $folderName;


        $folderObject = DataObject\Folder::getByPath($folderPath, true);

        if (!$folderObject) {
            $folderObject = DataObject\Folder::create([
                'o_parentId' => $this->parentFolderObject->getId(),
                'o_creationDate' => time(),
//                'o_userOwner' => $this->getAdminUser()->getId(),
//                'o_userModification' => $this->getAdminUser()->getId(),
                'o_key' => $folderName,
                'o_published' => true
            ]);
        }
        return $folderObject;
    }

    /**
     * get required data from config file
     *
     * @param $key
     * @return mixed
     */
    private function getRequiredMultiselectMasterConfig($key)
    {
        return $this->configProviderService->getMultiselectMasterConfig()[$key];
    }

    /**
     * handle logging
     *
     * @param $message
     * @param string $level
     */
    private function log($message, $level = "INFO")
    {
        echo "[ " . $level . " ] " . $message;
    }

}