<?php

namespace ContitechCS\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;


class CSMapAllCoverCompoundDataInProducts extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('cs:one-time-import:map-coverCompound-data')
            ->setDescription('Script to map cover compound data in all the products')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $results = $this->getCSVData($filePath);
        $data = $results['data'];
        foreach($data as $row){
            $productPath = $row['Path'];
            $product = DataObject\CSProducts::getByPath($productPath);
            if($product){
                $coverCompoundPathArray = explode("|", trim(ucwords($row['Cover Comppounds'])));

                $coverCompoundPathArray = array_map('trim', $coverCompoundPathArray);
                $objectsToMap = array();
                foreach ($coverCompoundPathArray as $val) {
                    $object = $this->getProductObject($val);
                    if($object){
                        $objectsToMap[] = $object;
                    }
                }
                $product->setCoverCompounds($objectsToMap);
                $product->save();    
            }
        }
    }

    public function getProductObject($productPath){
        $productObj = DataObject\CSProducts::getByPath($productPath);
        if($productObj){
            return $productObj;
        }
        return false;
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
