<?php

/**
 * File Path: /home/praganosis/Working/CSV/hosesflag.csv (Your File path on system)
 * Command: bin/console conti:onetimeimport:hosesflag /home/praganosis/Working/CSV/hosesflag.csv
 * Des: This command will set the flat value of industrial hoses.
 */

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;

class VirtualCatalogFlagImportCommand extends AbstractCommand
{
    private $t;
    protected function configure()
    {
        $this->setName('conti:onetimeimport:virtual-catalog-flag')
            ->setDescription('Virtual Catalog Flage Import')
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
    }


    private function import($filePath)
    {
        try {

            $results = $this->getCSVData($filePath);

            $data = $results['data'];
            
            if (isset($data) && is_array($data)) {
                foreach ($data as $key => $result) {
                    $excelKey = $key + 2;
                    $product = $this->getProductObject($result['SAP']);
                    if($product)
                    {
                        if(strtoupper($result['Virtual Catalog Flag']) == 'Y') 
                        {
                            $product->setVirtualCatalogFlag(true);
                            $product->save();
                            echo "{$excelKey} - SAP ".$result['SAP']." updated successfully \n";
                        }else if(strtoupper($result['Virtual Catalog Flag']) == 'N'){
                            $product->setVirtualCatalogFlag(false);
                            $product->save();
                            echo "{$excelKey} - SAP ".$result['SAP']." updated successfully \n";
                        }
                        else{
                            echo "{$excelKey} - SAP ".$result['SAP']." not found \n";
                        }
                        
                    }
                    else
                    {
                        echo "{$excelKey} - SAP ".$result['SAP']." not found \n";
                    }

                    // if($key == 500)
                    //     break;
                }
            }

        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }
    
    private function getProductObject($articleNumber)
    {
        $entries = new DataObject\Product\Listing();
        $entries->setCondition("articleNumber ='$articleNumber'");
        // $entries->setCondition("o_key =", "{$digit6code}");
        $entries->setLimit(1);
        $entries->load();
        if($entries) {
            foreach ($entries as $entry) {
                return $entry;
            }
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

            // $csvFilePath = PIMCORE_ASSET_DIRECTORY . $filePath;

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
                        $cols = count($rowData);
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
