<?php

namespace PTGEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use \Pimcore\Db;
use Pimcore\Model\DataObject;

class PTGEUPolyVFertBrickMappingAndDataImport extends AbstractCommand
{
    private $db;
    private $t;

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
        $this->setName('ptgeu-polyVFertBrickMapping-and-dataImport')
            ->setDescription('Mapping of PolyVFert brick and importing the data')
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
            $siopFullCodeForMultiVRubberProducts = '50IN010050';
            foreach($csvData as $rowData){
                $fertObj = DataObject\PTGEUProduct::getByArticleNumber($rowData['SAPMaterialCode'], true);
                if($fertObj){
                    $siopCode = $fertObj->getSiopFullCode();
                    if(preg_match("/{$siopFullCodeForMultiVRubberProducts}/", $siopCode)) {

                        $polyVFertBrickClass = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\PTGEUPolyVFert';
                        $polyVFertBrickObject = new $polyVFertBrickClass($fertObj);
                        $polyVFertBrickObject->setFieldname('Fert');
                        $method = 'setPTGEUPolyVFert';
                        $fertObj->getFert()->$method($polyVFertBrickObject);
                        $fertObj->save();
                        $fertObjectId = $fertObj->getId();
                        $polyVFertBrickData = [
                            'refLineDiffHBMM' => $rowData['Ref. line diff. (hb) (mm)'],
                            'refLineDiffHBIN' => $rowData['Ref. line diff. (hb) (In)'],
                            'refLineDiffHBMMUnit' => 'mm',
                            'refLineDiffHBINUnit' => 'inch',
                        ];
                        $this->insertDataForpolyVFertBrickIntoTable($polyVFertBrickData,
                         'object_brick_query_PTGEUPolyVFert_38', $fertObjectId);
                        $this->insertDataForpolyVFertBrickIntoTable($polyVFertBrickData,
                         'object_brick_store_PTGEUPolyVFert_38', $fertObjectId);
                    }
                }
            }
        }catch (\Throwable $th) {
            p_r($th->getMessage());
        }

    }

    private function insertDataForpolyVFertBrickIntoTable($dataArray, $tableName, $objId){

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
                while (($rowData = fgetcsv($handle, 0, $dialect->delimiter,
                $dialect->quotechar, $dialect->escapechar)) !== false) {
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
