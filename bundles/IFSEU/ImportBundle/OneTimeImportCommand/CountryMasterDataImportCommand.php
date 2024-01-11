<?php


namespace IFSEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use IFSEU\ProductBundle\Services\ImportConstants;
use Exception;

class CountryMasterDataImportCommand extends AbstractCommand
{
    private $t;

    protected function configure()
    {
        $this->setName('ifs-eu-country-master-data-import-command')
            ->setDescription('Country master data import script')
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
        return 1;
    }


    private function import($filePath)
    {
        try {

            $results = $this->getCSVData($filePath);

            $data = $results['data'];

            unset($result);

            $parentFolderID = DataObject\Service::createFolderByPath(ImportConstants::IFS_EU_COUNTRY_MASTERDATA_FOLDER)->getId();

            if (isset($data) && is_array($data)) {
                foreach ($data  as $result) {
                    if (isset($result) && is_array($result)) {
                        $this->insertCountriesMasterData($result, $parentFolderID);
                    }
                }
            }
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function insertCountriesMasterData($result, $parentFolderID)
    {
        //$title = trim($result['Name']);
        $title = trim($result['TwoLetterIso']);

        $validKey = DataObject\Service::getValidKey($title, "object");
        try{
            if ($title) {

                $categoryObj = DataObject\IFSEUCountries::getByPath("/" . ImportConstants::IFS_EU_COUNTRY_MASTERDATA_FOLDER . "/" . $validKey);

                if (!$categoryObj) {
                    $obj = new DataObject\IFSEUCountries();
                    $obj->setKey($validKey);
                    $obj->setParentID($parentFolderID);
                    $obj->setCountryID($result['ID']);
                    $obj->setCountryName($result['Name']);
                    $obj->setCountryAbbr($result['TwoLetterIso']);
                    $obj->setPublished(true);
                    $obj->setOmitMandatoryCheck(true);
                    $obj->save();
                } 
            } else {
                echo "Invalid Key";
            }
        }catch(Exception $ex){
            p_r($ex->getMessage());
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
                            $rowData[mb_convert_encoding(trim($key), 'ISO-8859-1', 'UTF-8')] = mb_convert_encoding((trim($value)), 'ISO-8859-1', 'UTF-8');
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
