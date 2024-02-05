<?php

/**
 * Command: conti:onetimeimport:availability-check-code-sql-import <filePath>
 * filePath: Your File path on system
 * Des: Availability check code SQL import.
 */

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Db;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;

class AvailabilityCheckCodeSQLImportCommand extends AbstractCommand
{
    private $db;
    private $t;
    protected function configure()
    {
        $this->setName('conti:onetimeimport:availability-check-code-sql-import')
            ->setDescription('Availability check code SQL import')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get();
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

            $plantMaterialData = $this->getPlantMaterialData();
            $updateArray = [];
            $totalUpdateCount = 0;
            $i = 0;
            if (isset($data) && is_array($data)) {
                foreach ($data as $result) {
                    $key = $result['Material'].'-'.$result['Plant'].'-'.$result['Sales Organization'].'-'.$result['Distribution Channel'];
                    if (array_key_exists($key, $plantMaterialData)) {
                        $objectId = $plantMaterialData[$key];

                        if (!empty($result['Availability Check'])) {
                            $updateArray[] = [
                                'oo_id' => $objectId,
                                'AvailabilityCheckCode' => $result['Availability Check']
                            ];
                        }

                        if ($i == 1000) {
                            p_r('------------Updating '.count($updateArray).'---------------');
                            $totalUpdateCount += count($updateArray);
                            $this->updateTable($updateArray, 'object_query_12');
                            $this->updateTable($updateArray, 'object_store_12');
                            $updateArray = [];
                            $i = -1;
                        }
                        $i++;
                    }
                }
                if (!empty($updateArray)) {
                    p_r('------------Updating '.count($updateArray).'---------------');
                    $totalUpdateCount += count($updateArray);
                    $this->updateTable($updateArray, 'object_query_12');
                    $this->updateTable($updateArray, 'object_store_12');
                }
            }

            p_r('------------Total '.$totalUpdateCount.' records updated ---------------');

        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }


    public function updateTable($dataArray, $tableName) {
        try {
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

    private function getPlantMaterialData() {
        $sql = "SELECT `oo_id`, `key` From `object_12`";
        $results = $this->db->fetchAllAssociative($sql);
        $plantMaterialArray = [];
        foreach ($results as $plantMaterial) {
            $plantMaterialArray[$plantMaterial['key']] = $plantMaterial['oo_id'];
        }
        return $plantMaterialArray;
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
