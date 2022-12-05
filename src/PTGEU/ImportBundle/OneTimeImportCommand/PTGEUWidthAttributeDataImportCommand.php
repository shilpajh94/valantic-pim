<?php

namespace PTGEU\ImportBundle\OneTimeImportCommand;

use Exception;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Yaml\Yaml;
use \Pimcore\Db;
use Pimcore\Model\DataObject;
use Pimcore;

class PTGEUWidthAttributeDataImportCommand extends AbstractCommand
{
    private $db;

    /**
     * Function is constructor and set the db connection
     */
    public function __construct()
    {
        $this->db  = Db::get();
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('ptgeu-widthAttribute-dataImport')
            ->setDescription('Importing of width attribute data in fert level brick')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
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
            $csvData = $results['data'];
            unset($result);
            foreach($csvData as $rowData){
                $fertObj = DataObject\PTGEUProduct::getByArticleNumber($rowData['SAPMaterialCode'], true);
                if($fertObj){
                        $fertObjectId = $fertObj->getId();
                        $fertBrickData = [
                            'widthMM' => $rowData['Width (bo?) (mm)'],
                            'widthIN' => $rowData['Width (bo?) (in)'],
                            'widthMMUnit' => 'mm',
                            'widthINUnit' => 'inch'
                        ];
                    $this->insertDataForWidthAttributeIntoTable($fertBrickData, 'object_brick_query_PTGEUCommonFert_38', $fertObjectId);
                    $this->insertDataForWidthAttributeIntoTable($fertBrickData, 'object_brick_store_PTGEUCommonFert_38', $fertObjectId);    
                }
            }
        }catch (\Throwable $th) {
            p_r($th->getMessage());
        }

    }

    private function insertDataForWidthAttributeIntoTable($dataArray, $tableName, $objId){

        $cols = array();

        foreach($dataArray as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        $sql = "UPDATE $tableName SET " . implode(', ', $cols) . " WHERE o_id =  $objId";
        $this->db->executeUpdate($sql);



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