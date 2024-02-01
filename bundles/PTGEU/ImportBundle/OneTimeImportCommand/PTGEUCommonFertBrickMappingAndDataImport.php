<?php

namespace PTGEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use \Pimcore\Db;
use Pimcore\Model\DataObject;
use PTGEU\ProductBundle\Services\CompletenessPercentageService;

class PTGEUCommonFertBrickMappingAndDataImport extends AbstractCommand
{
    private $db;
    private $t;
    private $percentageCompletionService;
    /**
     * Function is constructor and set the db connection
     */
    public function __construct(CompletenessPercentageService $percentageCompletionService)
    {
        parent::__construct();
        $this->db  = Db::get();
        $this->percentageCompletionService = $percentageCompletionService;
    }

    protected function configure()
    {
        $this->setName('ptgeu-CommonFertBrickMapping-and-dataImport')
            ->setDescription('Mapping of CommonFert brick and importing the data')
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
            $i=2;
            foreach($csvData as $rowData){
                $fertObj = DataObject\PTGEUProduct::getByArticleNumber($rowData['SAPMaterialCode'], true);
                if($fertObj){
                    $fertObjectId = $fertObj->getId();
                    if(!$fertObj->getFert()->getPTGEUCommonFert()){
                        $commonFertBrickClass = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\PTGEUCommonFert';
                        $commonFertBrickObject = new $commonFertBrickClass($fertObj);
                        $commonFertBrickObject->setFieldname('Fert');
                        $method = 'setPTGEUCommonFert';
                        $fertObj->getFert()->$method($commonFertBrickObject);
                        $fertObj->save();
                    }

                    $commonFertBrickData = [
                        'heightMM' => $rowData['Height (h?) (mm)'],
                        'heightIN' => $rowData['Height (h?) (in)'],
                        'pitchHeightHduMM' => $rowData['Pitch height (hd/u) (mm)'],
                        'pitchHeightHduIN' => $rowData['Pitch height (hd/u) (In)'],
                        'ribPitchMM' => $rowData['Rib Pitch (s) (mm)'],
                        'ribPitchIN' => $rowData['Rib Pitch (s) (In)'],
                        'pitchLengthLpLwMM' => $rowData['Pitch Length (Lp/Lw) (mm)'],
                        'pitchLengthLpLwIN' => $rowData['Pitch Length (Lp/Lw) (in)'],
                        'refLengthLrMM' => $rowData['Ref. Length (Lr) (mm)'],
                        'refLengthLrIN' => $rowData['Ref. Length (Lr) (In)'],
                        'widthMM' => $rowData['Width (bo?) (mm)'],
                        'widthIN' => $rowData['Width (bo?) (in)'],
                        'ribs' => $rowData['Ribs'],
                        'pah' => $rowData['PAH'],
                        'heightMMUnit' => 'mm',
                        'widthMMUnit' => 'mm',
                        'pitchLengthLpLwMMUnit' => 'mm',
                        'pitchHeightHduMMUnit' => 'mm',
                        'refLengthLrMMUnit' => 'mm',
                        'ribPitchMM1' => 'mm',
                        'heightINUnit' => 'inch',
                        'widthINUnit' => 'inch',
                        'pitchLengthLpLwINUnit' => 'inch',
                        'pitchHeightHduINUnit' => 'inch',
                        'refLengthLrINUnit' => 'inch',
                        'ribPitchINUnit' => 'inch',

                    ];
                    $this->insertDataForCommonFertBrickIntoTable($commonFertBrickData,
                    'object_brick_query_PTGEUCommonFert_38', $fertObjectId);
                    $this->insertDataForCommonFertBrickIntoTable($commonFertBrickData,
                    'object_brick_store_PTGEUCommonFert_38', $fertObjectId);
                    $this->percentageCompletionService->completenessPercentage($fertObj, 'import');
                    p_r($i.'. '.$rowData['SAPMaterialCode']);

                }
                $i++;
            }
        }catch (\Throwable $th) {
            p_r($th->getMessage());
        }

    }

    private function insertDataForCommonFertBrickIntoTable($dataArray, $tableName, $objId){

        $cols = array();

        foreach($dataArray as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        $sql = "UPDATE $tableName SET " . implode(', ', $cols) . " WHERE id =  $objId";
        $this->db->executeQuery($sql);
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
                while (($rowData = fgetcsv($handle, 0, $dialect->delimiter, $dialect->quotechar,
                 $dialect->escapechar)) !== false) {
                    if ($count == 0) {
                        foreach ($rowData as $key => $value) {
                            unset($rowData[$key]);
                            $rowData[mb_convert_encoding(trim($key), 'ISO-8859-1', 'UTF-8')] =
                             mb_convert_encoding(trim($value), 'ISO-8859-1', 'UTF-8');
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
