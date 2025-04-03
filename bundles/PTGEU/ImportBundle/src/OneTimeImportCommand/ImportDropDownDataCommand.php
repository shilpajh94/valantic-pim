<?php

namespace PTGEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Db;
use PTGEU\ProductBundle\Services\CompletenessPercentageService;

class ImportDropDownDataCommand extends AbstractCommand
{
    private $t;
    private $db;
    private $percentageCompletionService;

    public function __construct(CompletenessPercentageService $percentageCompletionService)
    {
        parent::__construct();
        $this->db = Db::get();
        $this->percentageCompletionService = $percentageCompletionService;

    }
    protected function configure()
    {
        $this->setName('ptgeu:dropdown-data-import')
            ->setDescription('This command is used to import data for dropdown fields')
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
            $csvData = $results['data'];
            unset($result);
            $i=1;
            foreach($csvData as $rowData){

                $fertObj = DataObject\PTGEUProduct::getByArticleNumber($rowData['SAPMaterialCode'], true);
                if($fertObj){
                    if(isset($rowData['RMA Code'])){
                        if($fertObj->getFert()->getPTGEUVBeltsFert()){
                            $fertObjectId = $fertObj->getId();
                            $VBeltsFertBrickData = [
                                'rmaCode' => $rowData['RMA Code']
                            ];

                            $this->insertBrickData($VBeltsFertBrickData, 'object_brick_query_PTGEUVBeltsFert_38', $fertObjectId);
                            $this->insertBrickData($VBeltsFertBrickData, 'object_brick_store_PTGEUVBeltsFert_38', $fertObjectId);
                            $this->percentageCompletionService->completenessPercentage($fertObj, 'import');
                        }
                    }
                    if(isset($rowData['PAH'])){
                        if($fertObj->getFert()->getPTGEUCommonFert()){
                            $fertObjectId = $fertObj->getId();
                            $commonFertBrickData = [
                                'pah' => $rowData['PAH']
                            ];

                            $this->insertBrickData($commonFertBrickData, 'object_brick_store_PTGEUCommonFert_38', $fertObjectId);
                            $this->insertBrickData($commonFertBrickData, 'object_brick_query_PTGEUCommonFert_38', $fertObjectId);
                            $this->percentageCompletionService->completenessPercentage($fertObj, 'import');
                        }
                    }
                    if(isset($rowData['Reinforcement / Cord']) || isset($rowData['Performance'])){
                        $baseObject = $fertObj->getParent()->getParent();
                        $baseObjectId = $baseObject->getId();
                        if($baseObject && $baseObject->getType() != 'folder'){
                            if(isset($rowData['Reinforcement / Cord'])){
                                $reinforcementValuesToBeMapped = [];
                                $reinforcementValue     = trim($rowData['Reinforcement / Cord']);
                                $reinforcementValueArr  = explode('|', $reinforcementValue);
                                $fd = $baseObject->getClass()->getFieldDefinition("reinforcement");
                                $options = $fd->getOptions();
                                foreach($options as $eachOptions){
                                    foreach($reinforcementValueArr as $eachReinforcementValue){
                                        if(strtolower($eachOptions['value']) == strtolower($eachReinforcementValue)){
                                            array_push($reinforcementValuesToBeMapped,$eachOptions['value']);
                                        }
                                    }

                                }
                                $reinforcements  = implode(',', $reinforcementValuesToBeMapped);
                                $productClassData['reinforcement'] = $reinforcements;

                            }
                            if(isset($rowData['Performance'])){
                                $performance = trim($rowData['Performance']);
                                $fd = $baseObject->getClass()->getFieldDefinition("performance");
                                $options = $fd->getOptions();
                                foreach($options as $eachOptions){
                                    if(strtolower($eachOptions['value']) == strtolower($performance)){
                                        $productClassData['performance'] = trim($eachOptions['value']);
                                    }
                                }

                            }
                            $this->insertProductclassData($productClassData, 'object_store_38', $baseObjectId);
                            $this->insertProductclassData($productClassData, 'object_query_38', $baseObjectId);
                            $this->percentageCompletionService->completenessPercentage($baseObject, 'import');

                        }


                    }
                    if(isset($rowData['Status'])){
                        $productClassData['vtlStatus'] = $this->getVtlStatus($rowData['Status']);
                        $this->insertProductclassData($productClassData, 'object_store_38', $fertObj->getId());
                        $this->insertProductclassData($productClassData, 'object_query_38', $fertObj->getId());
                        $this->percentageCompletionService->completenessPercentage($fertObj, 'import');
                        p_r($i++.') '. $rowData['SAPMaterialCode']);
                    }
                }

            }

        }
        catch(\Exception $e){
            p_r($e);
        }
    }

    private function getVtlStatus(string $value)
    {
        $objVtl = new DataObject\PTGEUVTL\Listing();
        $objVtl->setCondition("description = ?", $value);
        if(!empty($objVtl))
        {
            foreach ($objVtl as $object) {
                return $object->getId();
            }
        }
        return '';
    }


    private function insertProductclassData($dataArray, $tableName, $objId){
        $cols = array();
        foreach($dataArray as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        $sql = "UPDATE $tableName SET " . implode(', ', $cols) . " WHERE oo_id =  $objId";
        $this->db->executeQuery($sql);
    }

    private function insertBrickData($dataArray, $tableName, $objId){
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
