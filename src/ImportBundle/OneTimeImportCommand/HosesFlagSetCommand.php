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

class HosesFlagSetCommand extends AbstractCommand
{
    private $t;
    protected function configure()
    {
        $this->setName('conti:onetimeimport:hosesflag')
            ->setDescription('Flag Set in Pim')
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
            // $o = DataObject\Product::getById(28088);
            // p_r($o->getArticleNumber());
            // $o->setPrintedCatalogFlag("1");
            /** When trying to save the changes then it throw error */
            // 06:13:16 WARNING   [php] Warning: Invalid argument supplied for foreach() ["exception" => ErrorException { …}]
            // 06:13:16 WARNING   [php] Warning: Invalid argument supplied for foreach() ["exception" => ErrorException { …}]
            // $o->save();die;
            $results = $this->getCSVData($filePath);
            $fhandle = fopen($filePath, 'w');
            $header = $results['header'];
            $data = $results['data'];
            array_push($header, 'Status');
            fputcsv($fhandle, $header);
            if (isset($data) && is_array($data)) {
                foreach ($data as $result) {
                    $o = $this->getProductObject($result['Material']);
                    // p_r($o->getId());die;
                    if (!empty($o)) {
                        
                        if (!empty($result['Printed Catalog Y/N']) && strtolower($result['Printed Catalog Y/N']) == 'y') {
                            //p_r($result['Printed Catalog Y/N']);
                            $o->setPrintedCatalogFlag(true);
                        }
                        if (!empty($result['Printed Catalog Y/N']) && strtolower($result['Printed Catalog Y/N']) == 'n') {
                            //p_r($result['Printed Catalog Y/N']);
                            $o->setPrintedCatalogFlag(false);
                        }
                        if (!empty($result['Virtual Catalog']) && strtolower($result['Virtual Catalog']) == 'y') {
                            //p_r($result['Virtual Catalog']);
                            $o->setVirtualCatalogFlag(true);
                        }
                        if (!empty($result['Virtual Catalog']) && strtolower($result['Virtual Catalog']) == 'n') {
                            //p_r($result['Virtual Catalog']);
                            $o->setVirtualCatalogFlag(false);
                        }
                        if ($o->save()) {
                            array_push($result, "Success");
                        } else {
                            array_push($result, "Failed");
                        }
                        fputcsv($fhandle, $result);
                    }
                }
            }

            fclose($fhandle);
        } catch (\Throwable $th) {
            //throw $th;
            p_r($th->getMessage());
        }
    }

    private function getProductObject($articleNumber)
    {
        $entries = new DataObject\Product\Listing();
        $entries->setCondition("articleNumber LIKE ?", "%{$articleNumber}%");
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
