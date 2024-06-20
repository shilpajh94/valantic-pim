<?php

/**
 * This command will set the OutsidePurchaseIdentifierOrProcurementType in PlantMaterialMaster class
 */

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProcurementTypeCommand extends AbstractCommand
{
    private $t;
    private $db;

    /**
     * Function is constructor and set the db connection
     */
    public function __construct()
    {
        parent::__construct();
        $this->db = \Pimcore\Db::get();
    }

    protected function configure()
    {
        $this->setName('conti:onetimeimport:procurement-type-import-command')
            ->setDescription('ProcurmentType import command')
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
            $data = $results['data'];

            if (empty($data)) {
                return;
            }

            $updatedCount = 0;
            $notFoundCount = 0;

            foreach ($data as $result) {
                $key = $this->generateKey($result);

                $sql = "SELECT `oo_id` FROM object_12 WHERE `key` = ?";
                $record = $this->db->fetchAllAssociative($sql, [$key]);

                if (!empty($record)) {
                    $oo_id = $record[0]['oo_id'];
                    $queryTable = "UPDATE object_query_12
                     SET OutsidePurchaseIdentifierOrProcurementType = ? WHERE oo_id = ?";
                    $this->db->executeQuery($queryTable, [$result['Procurement Type'], $oo_id]);
                    $storeTable = "UPDATE object_store_12
                     SET OutsidePurchaseIdentifierOrProcurementType = ? WHERE oo_id = ?";
                    $this->db->executeQuery($storeTable, [$result['Procurement Type'], $oo_id]);
                    $updatedCount++;
                    echo "$oo_id \n";
                } else {
                    $notFoundCount++;
                    echo "Object doesn't exist for this key --- $key \n";
                }
            }

            echo "Total updated count: $updatedCount, not found count: $notFoundCount \n";

        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    private function generateKey($result)
    {
        $key = '';
        if (!empty($result["Material"])) {
            $key .= $result["Material"] . '-';
        }
        if (!empty($result["Plant"])) {
            $key .= $result["Plant"] . '-';
        }
        if (!empty($result["Sales Organization"])) {
            $key .= $result["Sales Organization"] . '-';
        }
        if (!empty($result["Distribution Channel"])) {
            $key .= $result["Distribution Channel"];
        }
        return $key;
    }

    public function getCSVData($fileName)
    {
        try {
            $csvFilePath = $fileName;

            if (empty($csvFilePath)) {
                return array('header' => array(), 'data' => array());
            }

            $csvFilePath = str_replace("%20", " ", $csvFilePath);
            $dialect = \Pimcore\Tool\Admin::determineCsvDialect($csvFilePath);

            $firstRowData = $this->getFirstRowData($csvFilePath, $dialect);
            $data = $this->getDataRows($csvFilePath, $dialect, $firstRowData);

            return array('header' => $firstRowData, 'data' => $data);
        } catch (\Exception $e) {
            return array('error' => $e->getMessage());
        }
    }

    private function getFirstRowData($csvFilePath, $dialect)
    {
        $firstRowData = array();

        if (($handle = fopen($csvFilePath, 'r')) !== false) {
            $rowData = fgetcsv($handle, 0, $dialect->delimiter, $dialect->quotechar, $dialect->escapechar);
            if ($rowData !== false) {
                foreach ($rowData as $key => $value) {
                    $firstRowData[mb_convert_encoding(trim($key), 'ISO-8859-1', 'UTF-8')] =
                        mb_convert_encoding(trim($value), 'ISO-8859-1', 'UTF-8');
                }
            }
            fclose($handle);
        }

        return $firstRowData;
    }

    private function getDataRows($csvFilePath, $dialect, $firstRowData)
    {
        $data = array();
        $count = 0;

        if (($handle = fopen($csvFilePath, 'r')) !== false) {
            while (($rowData = fgetcsv(
                $handle,
                0,
                $dialect->delimiter,
                $dialect->quotechar,
                $dialect->escapechar
            )) !== false) {
                if ($count > 0) {
                    $tmpData = array();
                    foreach ($firstRowData as $key => $value) {
                        $tmpData[$value] = mb_convert_encoding($rowData[$key], 'UTF-8');
                    }
                    $data[] = $tmpData;
                }
                $count++;
            }
            fclose($handle);
        }

        return $data;
    }
}
