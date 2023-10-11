<?php

namespace PTGEU\ImportBundle\OneTimeImportCommand;

use Exception;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use PTGEU\ProductBundle\Services\CompletenessPercentageService;
use Pimcore\Db;

class PTGEUPulleysToDataImportCommand extends AbstractCommand
{
    private $t;
    private $percentageCompletionService;
    private $db;


    protected function configure()
    {
        $this->setName('ptgeu-pulleysTo-data-import-command')
            ->setDescription('Pulleys To data import script')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function __construct(
        CompletenessPercentageService $percentageCompletionService
    ) {
        parent::__construct();
        $this->percentageCompletionService = $percentageCompletionService;
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
        $this->db  = Db::get();
        try {

            $results = $this->getCSVData($filePath);
            $data = $results['data'];
            $i = 1;

            foreach($data as $rowData){
                $object = DataObject\PTGEUProduct::getByArticleNumber(trim($rowData['SAPMaterialCode']), true);
                DataObject::setHideUnpublished(false);
                if($object && trim($rowData['Pulleys to'])){

                    $o_id = $object->getId();
                    $pulleysTo =  $this->db->quote(trim($rowData['Pulleys to']));

                    $querySql = "UPDATE object_brick_query_PTGEUVBeltsFert_38 SET pulleysTo = $pulleysTo where o_id = $o_id";
                    $this->db->executeUpdate($querySql);

                    $updateSql = "UPDATE object_brick_store_PTGEUVBeltsFert_38 SET pulleysTo = $pulleysTo where o_id = $o_id";
                    $this->db->executeUpdate($updateSql);

                    $this->percentageCompletionService->completenessPercentage($object, 'import');  
                    echo $i++.'. Material Number == '.$rowData['SAPMaterialCode'] . "\n";
                }else{
                    p_r($i++.' Object not found with material number '. $rowData['SAPMaterialCode']);
                }
            }
            }catch(Exception $ex){

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
