<?php

namespace IFSEU\ImportBundle\OneTimeImportCommand;

use Exception;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use IFSEU\ImportBundle\Model\ProductModel;
use IFSEU\ProductBundle\Services\CompletenessPercentageService;

class ProductLengthDataImportCommand extends AbstractCommand
{
    private $t;
    private $productDataTableDataArray;
    private $productModel;
    private $percentageCompletionService;

    protected function configure()
    {
        $this->setName('ifs-eu-productLength-data-import-command')
            ->setDescription('Product Length data import script')
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
        $this->productDataTableDataArray = [];
        $this->productModel =  new ProductModel;

        try {

            $results = $this->getCSVData($filePath);
            $data = $results['data'];
            $i = 1;

            foreach($data as $rowData){
                $object = DataObject\IFSEUProduct::getByMaterialNumber(trim($rowData['Material']), true);
                DataObject::setHideUnpublished(false);
                if($object){
                    $this->productDataTableDataArray[] = [
                        'oo_id' => $object->getId(),
                        'productLength' => trim($rowData['Product length']),
                        'ProductLengthUnit'=>trim($rowData['Product Length unit'])
                    ];
                    if (!empty($this->productDataTableDataArray)) {
                        $this->productModel->insertIntoProductTable($this->productDataTableDataArray, 'object_query_IFSEUProduct');
                        $this->productModel->insertIntoProductTable($this->productDataTableDataArray, 'object_store_IFSEUProduct');
                    }  
                    $this->percentageCompletionService->completenessPercentage($object, 'import');  
                    echo $i++.'. Material Number == '.$rowData['Material'] . "\n";
                }else{
                    p_r($i++.' Object not found with material number '. $rowData['Material']);
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
