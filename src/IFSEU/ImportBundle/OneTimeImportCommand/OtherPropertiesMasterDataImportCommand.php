<?php


namespace IFSEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use IFSEU\ProductBundle\Services\ImportConstants;
use Symfony\Component\Yaml\Yaml;

class OtherPropertiesMasterDataImportCommand extends AbstractCommand
{
    private $t;

    protected function configure()
    {
        $this->setName('ifs-eu-other-properties-master-data-import-command')
            ->setDescription('Properties master data import script')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ')
            ->addArgument('typeName', InputArgument::REQUIRED, 'Enter TypeName: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $typeName = $input->getArgument('typeName');
        $dataArr = array($filePath,$typeName);
        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->import($dataArr);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }


    private function import($dataArr)
    {
        try {

            $results = $this->getCSVData($dataArr[0]);

            $data = $results['data'];
            $finalData = [];
            foreach($data as $dt){
               $dt['typeName'] = $dataArr[1]; 
                $finalData[] = $dt;
            }
           
            $fileName = basename($dataArr[0], ".csv");
            unset($result);

            $parentFolderID = DataObject\Service::createFolderByPath(ImportConstants::IFS_EU_PROPERTIES_MASTERDATA_FOLDER)->getId();

            if (isset($finalData) && is_array($finalData)) {
                foreach ($finalData  as $result) {
                    if (isset($result) && is_array($result)) {
                        $childTypeFolderId = DataObject\Service::createFolderByPath(ImportConstants::IFS_EU_PROPERTIES_MASTERDATA_FOLDER.'/'.$fileName)->getId();
                        $this->insertPropertiesMasterData($result, $childTypeFolderId);
                    }
                }
            }
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function insertPropertiesMasterData($result, $childTypeFolderId)
    {

        $languageConfig = Yaml::parseFile(PIMCORE_PROJECT_ROOT . '/src/IFSEU/ProductBundle/Resources/config/language.yml');
        //$title = trim($result['ID']).'-'.trim($result['EN']);
        $title = trim($result['Name']);

        $validKey = DataObject\Service::getValidKey($title, "object");

        if ($title) {

            $categoryObj = DataObject\IFSEUProperties::getByPath("/" . ImportConstants::IFS_EU_PROPERTIES_MASTERDATA_FOLDER . "/" . $validKey);

            if (!$categoryObj) {
                $obj = new DataObject\IFSEUProperties();
                $obj->setKey($validKey);
                $obj->setParentID($childTypeFolderId);
                // $obj->setPropertyID($result['ID']);
                
                $obj->setTypeName($result['typeName']);
                foreach($result as $key => $eachColumnName){
                    if(array_key_exists($key,$languageConfig)){
                        $lang = ($languageConfig[$key]['language']);
                        $obj->setPropertyName($result[$key],$lang);
                        $obj->setDescription($result[$key],$lang);
                    $obj->setPropertiesCustomerFacingVersion($result[$key],$lang);
                    }
                    $obj->setPropertyName($result['Name'],$lang);
                    $obj->setDescription($result['Name'],$lang);
                    $obj->setPropertiesCustomerFacingVersion($result['Name'],$lang);
                   
                    


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
