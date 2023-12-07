<?php

/**
 * File Path: Your File path on system
 * Command: cs:one-time-import:industries <filePath>
 * Des: Industries data import script.
 */

namespace ContitechCS\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use ContitechCS\ImportBundle\Services\ImportConstants;
use ContitechCS\ProductBundle\Services\ConfigProviderService;

class CSIndustriesImportCommand extends AbstractCommand
{
    private $t;
    private $duplicateTitle = [];
    private $configProviderService;

    protected function configure()
    {
        $this->setName('cs:one-time-import:industries-import')
            ->setDescription('Industries data import script')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ')
            ->addArgument('language', InputArgument::REQUIRED, 'Enter Language');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->configProviderService = new ConfigProviderService();
        $languageArray = $this->configProviderService->getLanguageConfig();
        $filePath = $input->getArgument('filePath');
        $language = strtolower($input->getArgument('language'));

        if (!in_array($language, $languageArray)) {
            echo "\n Invalid Argument: Use atleast one language code, among 'en', 'de', 'pt', 'es', 'fr', 'zh' to import the data in that particular language. \n ";
            die;
        }

        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->import($filePath, $language);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
        return 1;
    }


    private function import($filePath, $language)
    {
        try {

            $results = $this->getCSVData($filePath);

            $data = $results['data'];

            unset($result);

            if (isset($data) && is_array($data)) {

                $parentFolderID = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_MASTERDATA_INDUSTRIES_FOLDER)->getId();

                foreach ($data  as $result) {
                    if (isset($result) && is_array($result)) {
                        $this->insertIndustries($result, $parentFolderID, $language);
                    }
                }

                echo "\n Total " . count($this->duplicateTitle) . " Duplicate title found. \n ";
                p_r($this->duplicateTitle);
            }
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function insertIndustries($result, $parentFolderID, $language)
    {

        $title = trim(ucwords($result['Title']));
        $value = trim($result['Value']);

        $validKey = DataObject\Service::getValidKey($title, "object");

        if ($title) {

            $industryObj = DataObject\CSIndustries::getByPath("/" . ImportConstants::CONTITECH_CS_MASTERDATA_INDUSTRIES_FOLDER . "/" . $validKey);

            if (!$industryObj) {
                $obj = new DataObject\CSIndustries();
                $obj->setKey($validKey);
                $obj->setParentID($parentFolderID);
            } else {
                $obj = $industryObj;
            }
            $obj->setIndustryName($value, $language);
            $obj->setPublished(true);
            $obj->setOmitMandatoryCheck(true);
            $obj->save();
        } else {
            echo "Title not found";
        }
    }

    public function getCSVData($fileName)
    {
        try {

            $csvFilePath = $fileName;
            $firstRowData = array();
            if (empty($csvFilePath)) {
                return $firstRowData;
            }

            $csvFilePath = str_replace("%20", " ", $csvFilePath);

            $dialect = \Pimcore\Tool\Admin::determineCsvDialect($csvFilePath);
            $data = [];
            $count = 0;

            if (($handle = fopen($csvFilePath, 'r')) !== false) {
                while (($rowData = fgetcsv($handle, 0, $dialect->delimiter, $dialect->quotechar, $dialect->escapechar)) !== false) {
                    if ($count == 0) {
                        foreach ($rowData as $key => $value) {
                            unset($rowData[$key]);
                            $rowData[mb_convert_encoding(trim($key), 'ISO-8859-1', 'UTF-8')] = mb_convert_encoding(trim($value), 'ISO-8859-1', 'UTF-8'); // alternate for utf8_decode
                        }
                        $firstRowData = $rowData;
                    } else {
                        $tmpData = [];
                        foreach ($firstRowData as $key => $value) {
                            $tmpData[$value] = mb_convert_encoding($rowData[$key], 'UTF-8');
                            $tmpData[$value] = $rowData[$key];
                        }
                        $data[] = $tmpData;
                    }
                    $count++;
                }
                fclose($handle);
            }
            return array(
                'header'    =>  $firstRowData,
                'data'      =>  $data
            );
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
}
