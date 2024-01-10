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

class PTGEUSkeletonBrickMappingAndDataImport extends AbstractCommand
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
        $this->setName('ptgeu-skeletonBrickMapping-and-dataImport')
            ->setDescription('Mapping of Skeleton bricks and importing the data')
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
        return 1;
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
                    $skeletonObject = $fertObj->getParent();
                    if($skeletonObject->getType() != 'folder'){

                        $skeletonBrickClass = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\PTGEUFlatBeltsSkeleton';
                        $skeltonBrickObject = new $skeletonBrickClass($skeletonObject);
                        $skeltonBrickObject->setFieldname('Skeleton');
                        $method = 'setPTGEUFlatBeltsSkeleton';
                        $skeletonObject->getSkeleton()->$method($skeltonBrickObject);
                        $skeletonObject->save();
                        $skeletonObjectId = $fertObj->getParent()->getId();
                        $skeletonBrickData = [
                            'toothPitchPtMM' => $rowData['Tooth Pitch (P/t) (mm)'],
                            'toothPitchPtIN' => $rowData['Tooth Pitch (P/t) (in)'],
                            'beltThicknessHsMM' => $rowData['Belt thickness (hs) (mm)'],
                            'beltThicknessHsIN' => $rowData['Belt thickness (hs) (In)'],
                            'toothHeightHtMM' => $rowData['Tooth height (ht) (mm)'],
                            'toothHeightHtIN' => $rowData['Tooth height (ht) (In)'],
                            'toothPitchPtMMUnit' => 'mm',
                            'toothHeightHtMMUnit' => 'mm',
                            'beltThicknessHsMMUnit' => 'mm',
                            'toothPitchPtINUnit' => 'inch',
                            'toothHeightHtINUnit' => 'inch',
                            'beltThicknessHsINUnit' => 'inch'
                        ];
                    }
                    $this->insertDataForSkeletonBrickIntoTable($skeletonBrickData,
                     'object_brick_query_PTGEUFlatBeltsSkeleton_38', $skeletonObjectId);
                    $this->insertDataForSkeletonBrickIntoTable($skeletonBrickData,
                     'object_brick_store_PTGEUFlatBeltsSkeleton_38', $skeletonObjectId);
                }
            }
        }catch (\Throwable $th) {
            p_r($th->getMessage());
        }

    }

    private function insertDataForSkeletonBrickIntoTable($dataArray, $tableName, $objId){

        $cols = array();

        foreach($dataArray as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        $sql = "UPDATE $tableName SET " . implode(', ', $cols) . " WHERE o_id =  $objId";
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
                while (($rowData = fgetcsv($handle, 0, $dialect->delimiter,
                 $dialect->quotechar, $dialect->escapechar)) !== false) {
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
