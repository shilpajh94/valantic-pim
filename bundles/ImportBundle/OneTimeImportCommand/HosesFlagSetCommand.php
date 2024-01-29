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
    private $db;
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
//            $fhandle = fopen($filePath, 'w');
            $header = $results['header'];
            $data = $results['data'];
            array_push($header, 'Status');
//            fputcsv($fhandle, $header);
            $productsData = $this->getProductsData();
            $updateArray = [];
            $i = 0;
            if (isset($data) && is_array($data)) {
                foreach ($data as $result) {
                    if (array_key_exists($result['Material'], $productsData)) {
                        $objectId = $productsData[$result['Material']];
                        echo $objectId.PHP_EOL;
                        $printedFlag = null;
                        $virtualFlag = null;
                        if (!empty($result['Printed Catalog Y/N']) && strtolower($result['Printed Catalog Y/N']) == 'y') {
                            //p_r($result['Printed Catalog Y/N']);
                            $printedFlag = '1'; //$o->setPrintedCatalogFlag(true);
                        }
                        if (!empty($result['Printed Catalog Y/N']) && strtolower($result['Printed Catalog Y/N']) == 'n') {
                            //p_r($result['Printed Catalog Y/N']);
//                            $o->setPrintedCatalogFlag(false);
                            $printedFlag = '-1';
                        }
                        if (!empty($result['Virtual Catalog']) && strtolower($result['Virtual Catalog']) == 'y') {
                            //p_r($result['Virtual Catalog']);
//                            $o->setVirtualCatalogFlag(true);
                            $virtualFlag = '1';
                        }
                        if (!empty($result['Virtual Catalog']) && strtolower($result['Virtual Catalog']) == 'n') {
                            //p_r($result['Virtual Catalog']);
//                            $o->setVirtualCatalogFlag(false);
                            $virtualFlag = '-1';
                        }
                        $updateArray[] = [
                            'oo_id' => $objectId,
                            'printedCatalogFlag' => $printedFlag,
                            'virtualCatalogFlag' => $virtualFlag
                        ];
                        if ($i == 1000) {
                            $this->updateTable($updateArray, 'object_query_1');
                            $this->updateTable($updateArray, 'object_store_1');
                            $updateArray = [];
                            $i = -1;
                        }
                        $i++;
                    }
                }
                if (count($updateArray)>0) {
                    $this->updateTable($updateArray, 'object_query_1');
                    $this->updateTable($updateArray, 'object_store_1');
                }
            }

//            fclose($fhandle);
        } catch (\Throwable $th) {
            //throw $th;
            p_r($th->getMessage());
        }
    }


    public function updateTable($dataArray, $tableName) {
        try {
            $this->db = \Pimcore\Db::get();
            $rowCount = 1;
            $firstRec = $dataArray[0];
            $keys = array_keys($firstRec);
            $sql = "INSERT INTO `".$tableName."` ";
            $sqlColumns = [];
            $updateColumns = [];
            $valColumns = [];
            foreach ($keys as $key) {
                    $sqlColumns[] = "`".$key."`";
                    if ($key!='oo_id') {
                            $updateColumns[] = "`".$key."`= VALUES(`".$key."`)";
                    }
                    $valColumns[] = $key;
            }
            $sql = $sql." (".implode(",", $sqlColumns).") VALUES ";
            $update = " ON DUPLICATE KEY UPDATE ".implode(",", $updateColumns);
            $values = '';
            foreach ($dataArray as $data) {
                    $valueArray = [];
                    foreach ($valColumns as $key) {
                            $valueArray[] = $this->db->quote($data[$key]);
                    }
                $values .= '('.implode(",", $valueArray).'),';
                // inserting records in batch
                if ($rowCount % 1000 == 0) {
                    $query = $sql.rtrim($values, ',').$update;
                    $this->db->executeQuery($query);
                    $values = '';
                }
                $rowCount++;
            }
            if (!empty($values)) {
                $query = $sql.rtrim($values, ',').$update ;
                $this->db->executeQuery($query);
            }
        } catch (\Exception $e) {
            echo $e->getMessage(); die;
        }
    }

    private function getProductsData() {
        $db = \Pimcore\Db::get();
        $sql = "SELECT `oo_id`, `articleNumber` From `object_query_1` where `ProductType` = 'fert' ";
        $results = $db->fetchAllAssociative($sql);
        $productArray = [];
        foreach ($results as $product) {
            $productArray[$product['articleNumber']] = $product['oo_id'];
        }
        return $productArray;
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
                            $rowData[mb_convert_encoding(trim($key), 'ISO-8859-1', 'UTF-8')] = mb_convert_encoding(trim($value), 'ISO-8859-1', 'UTF-8'); // alternate for utf8_decode
                        }
                        $firstRowData = $rowData;
                    } else {
                        $tmpData = [];
                        foreach ($firstRowData as $key => $value) {
                            $tmpData[$value] = mb_convert_encoding($rowData[$key], 'UTF-8'); // alternate for utf8_encode
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
