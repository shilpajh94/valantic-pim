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
    private $typeToFolderNameMapping;
    private $importDirectory;
    private $csvIndexToLangMap;
    private $multiselectMasterRootFolderObject;

    /**
     * MultiselectMasterImportCommand constructor.
     * @param ConfigProviderService $configProviderService
     */
    public function __construct(ConfigProviderService $configProviderService)
    {
        $this->configProviderService = $configProviderService;

        $multiselectMasterRootFolderPath = $this->getRequiredMultiselectMasterConfig('multiselectMasterRootFolderPath');
        $this->multiselectMasterRootFolderObject = DataObject\Folder::getByPath($multiselectMasterRootFolderPath);

        $this->csvIndexToLangMap = $this->getRequiredMultiselectMasterConfig('csv_columns_index_language_mapping');
        $this->importDirectory = PIMCORE_PROJECT_ROOT.$this->getRequiredMultiselectMasterConfig('import_directory_system_path_from_pimcore_root');
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
//        $scannedFiles = array_diff(scandir($this->importDirectory), array('..', '.'));
        $csvDelimiter = $this->getRequiredMultiselectMasterConfig("csv_delimiter");

        $dirStructure = $this->dirToArray($this->importDirectory);

        foreach ($dirStructure as $folderName => $files) {
            // TODO: we can check for valid brick group names here
            $brickGroupName = $folderName;


            foreach ($files as $fileName) {

                $filePath = $this->importDirectory . "/" . $brickGroupName . "/" . $fileName;
                $masterType = explode(".", $fileName)[0];

                $this->consoleLog("Starting  [" . $brickGroupName . "] -> [" . $fileName . "] file import ");

                if (!array_key_exists($masterType, $this->typeToFolderNameMapping)) {
                    $this->consoleLog("Master type " . $masterType . " does not exist in pimcore, so skipping  [" . $brickGroupName . "] -> [" . $fileName . "] file.You might need to update multiselect master import config file to import this.", "ERROR");
                    continue;
                }

                $handle = fopen($filePath, "r");
                $csvLogFilePath = explode(".",$filePath)[0]."_log.csv";
                $csvLogFileHandle = fopen($csvLogFilePath,"w");

                $headers = fgetcsv($handle, 0, $csvDelimiter);
                var_dump($headers);
                if(is_array($headers)){
                    $this->csvLog($csvLogFileHandle,array_merge($headers,array("Status","Message")));
                }


                $rowCount = 1;
                while (($data = fgetcsv($handle, 0, $csvDelimiter)) !== FALSE) {
                    $rowCount++;
                    if (count($data) > 0) {
                        if ($data[0]) {

                            $masterObject = $this->getMasterObject($masterType, $brickGroupName, $data[0]);
                            foreach ($this->csvIndexToLangMap as $csvIndex => $languageCode) {
                                $masterObject->setName($data[(int)$csvIndex], $languageCode);
                            }
                            try {
                                $masterObject->save();
                                $this->consoleLog("[" . $data[0] . "] record imported.");
                                $this->csvLog($csvLogFileHandle,array_merge($data,array("Success","")));

                            } catch (\Exception $exception) {
                                $this->consoleLog("[" . $data[0] . "] record could not be imported.\nException:" . $exception->getMessage(), "ERROR");
                                $this->csvLog($csvLogFileHandle,array_merge($data,array("FAILED",$exception->getMessage())));
                            }

                        } else {
                            $this->consoleLog("File  [" . $brickGroupName . "] -> [" . $fileName . "] row [" . $rowCount . "] does not contain english languague data, so skipping this row.");
                            $this->csvLog($csvLogFileHandle,array_merge($data,array("FAILED","Record does not contain english language data.")));
                        }
                    }
                }
                fclose($handle);
                fclose($csvLogFileHandle);
            }

        }
    }

    /**
     * get the existing master object or create new one if it does not exist
     *
     * @param string $type
     * @param string $brickGroupName
     * @param string $key
     * @return DataObject\MultiselectMaster
     * @throws \Exception
     */
    private function getMasterObject(string $type, string $brickGroupName, string $key): DataObject\MultiselectMaster
    {
        $key = \Pimcore\Model\Element\Service::getValidKey($key, 'object');
        $masterType = $this->getMasterType($type, $brickGroupName);

        $listing = new DataObject\MultiselectMaster\Listing();
        // we should have a unique entry for a set of key and type
        $listing->setCondition(" o_key   = :key AND masterType = :masterType ", ["key" => $key, "masterType" => $masterType]);
        $listing->load();
        $objects = $listing->getObjects();

        // if object already exits then return it otherwise create new object
        if (count($objects) > 0) {
            $object = $objects[0];
        } else {
            $masterObjectParentFolderObject = $this->getParentFolderForMasterObject($this->typeToFolderNameMapping[$type], $brickGroupName);
            $object = new DataObject\MultiselectMaster();
            $object->setKey($key);
            $object->setParent($masterObjectParentFolderObject);
            $object->setPublished(true);
            // TODO: add validation for available types
            $object->setMasterType($masterType);
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
        $typeFolderName = \Pimcore\Model\Element\Service::getValidKey($typeFolderName, 'object');
        $brickGroupName = \Pimcore\Model\Element\Service::getValidKey($brickGroupName, 'object');

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

    private function createFolder($folderName, $folderParent)
    {

        $folderObject = DataObject\Folder::create([
            'o_parentId' => $folderParent->getId(),
            'o_creationDate' => time(),
//                'o_userOwner' => $this->getAdminUser()->getId(),
//                'o_userModification' => $this->getAdminUser()->getId(),
            'o_key' => $folderName,
            'o_published' => true
        ]);
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
     * recursive function to convert the directory structure to an array
     *
     * @param string $dir
     * @return array
     */
    private function dirToArray(string $dir): array
    {
        $result = array();

        $cdir = scandir($dir);
        foreach ($cdir as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                if (is_dir($dir . "/" . $value)) {
                    $result[$value] = $this->dirToArray($dir . "/" . $value);
                } else {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }

    /**
     * handle logging
     *
     * @param $message
     * @param string $level
     */
    private function consoleLog($message, $level = "INFO")
    {
        echo "[ " . $level . " ] " . $message . PHP_EOL;
        // add the logic for csv file logging
    }

    private function csvLog($logHandler,array $dataRow)
    {
        $csvDelimiter = $this->getRequiredMultiselectMasterConfig("csv_delimiter");

        fputcsv($logHandler,$dataRow,$csvDelimiter);
    }

    private function getMasterType(string $type, string $brickGroupName)
    {
        return $brickGroupName . "~" . $type;
    }

}