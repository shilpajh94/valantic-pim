<?php


namespace IFSEU\ProductBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use IFSEU\ProductBundle\Services\ImportConstants;
use Symfony\Component\Yaml\Yaml;

class NormMasterDataImportCommand extends AbstractCommand
{
    private $t;

    protected function configure()
    {
        $this->setName('ifs-eu-norm-master-data-import-command')
            ->setDescription('Norm master data import script')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');

        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->import($filePath);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }


    private function import($filePath)
    {
        try {

            $results = $this->getCSVData($filePath);

            $data = $results['data'];

            unset($result);

            $parentFolderID = DataObject\Service::createFolderByPath(ImportConstants::IFS_EU_NORM_MASTERDATA_FOLDER)->getId();

            if (isset($data) && is_array($data)) {
                foreach ($data  as $result) {
                    if (isset($result) && is_array($result)) {
                        $this->insertNormMasterData($result, $parentFolderID);
                    }
                }
            }
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function insertNormMasterData($result, $parentFolderID)
    {

        $languageConfig = Yaml::parseFile(PIMCORE_PROJECT_ROOT . '/src/IFSEU/ProductBundle/Resources/config/language.yml');
        $title = trim($result['ID']);

        $validKey = DataObject\Service::getValidKey($title, "object");

        if ($title) {

            $categoryObj = DataObject\IFSEUNorm::getByPath("/" . ImportConstants::IFS_EU_NORM_MASTERDATA_FOLDER . "/" . $validKey);

            if (!$categoryObj) {
                $obj = new DataObject\IFSEUNorm();
                $obj->setKey($validKey);
                $obj->setParentID($parentFolderID);
                $obj->setNormID($result['ID']);

                foreach($result as $key => $eachColumnName){
                    if(array_key_exists($key,$languageConfig)){
                        $lang = ($languageConfig[$key]['language']);
                        $obj->setNorm($result[$key],$lang);
                    }
                }
                $obj->setPublished(true);
                $obj->setOmitMandatoryCheck(true);
                $obj->save();
            } 
        } else {
            echo "Invalid Key";
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
                            $rowData[utf8_decode(trim($key))] = utf8_decode(trim($value));
                        }
                        $firstRowData = $rowData;
                    } else {
                        $tmpData = [];
                        foreach ($firstRowData as $key => $value) {
                            $tmpData[$value] = utf8_encode($rowData[$key]);
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
