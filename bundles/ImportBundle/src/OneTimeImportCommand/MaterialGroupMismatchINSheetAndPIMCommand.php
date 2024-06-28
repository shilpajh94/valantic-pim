<?php

/**
 * This command will find the Material number of those products
 *  having differnce in material group attribute in PIM And Sheet in Product class
 */

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MaterialGroupMismatchINSheetAndPIMCommand extends AbstractCommand
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
        $this->setName('conti:onetimeimport:material-group-mismatch-command')
            ->setDescription('Material Group Mismatch find command')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');

        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');

            $exportedFilePath = $this->export($filePath);
            $this->import($exportedFilePath);

            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
        return 1;
    }

    private function export($filePath)
    {
        try {
            $results = $this->getCSVData($filePath);
            $data = $results['data'];

            if (empty($data)) {
                return;
            }
            $columns[] = "Material";
            $columns[] = "Material Group in SAP File";
            $columns[] = "Material Group in PIM";

            $fileName = "Product_MaterialGroup_" . date('mdY') . "_Logs" . '.csv';

            $fileResource = fopen(PIMCORE_SYSTEM_TEMP_DIRECTORY . '/' . $fileName, 'w');
            fputcsv($fileResource, $columns, ',');

            $rowCount = 1;
            $j = 1;
            p_r("Total row count == " . count($data));
            p_r("Export for material Group mismatch data Started");
            $totalParts = ceil(count($data) / 5000);

            foreach ($data as $result) {
                $materialGroupInSheet = $result['Material Group'];
                $articleNumber = $result['Material'];

                $sql = "SELECT product.articleNumber, materialGroup.code FROM `object_21` as materialGroup
                 INNER JOIN `object_1` as product
                 ON materialGroup.oo_id = product.materialGroup__id WHERE product.articleNumber = '$articleNumber' ";

                $record = $this->db->fetchAllAssociative($sql);

                if (!empty($record) && $materialGroupInSheet != $record[0]['code']) {
                    $row    = [];
                    $row[]  = $record[0]['articleNumber'];
                    $row[]  = $materialGroupInSheet;
                    $row[]  = $record[0]['code'];

                    fputcsv($fileResource, $row, ',');
                }
                $rowCount++;

                if ($rowCount % 5000 == 0) {
                    echo "Part " . $j . '/' . $totalParts . " completed" . PHP_EOL;
                    $j++;
                }
            }
            echo "Part " . $j . '/' . $totalParts . " completed" . PHP_EOL;
            p_r("Export Completed");
            return PIMCORE_SYSTEM_TEMP_DIRECTORY . '/' . $fileName;
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    private function import($filePath)
    {
        try {
            $results = $this->getCSVData($filePath);
            $data = $results['data'];

            if (empty($data)) {
                return;
            }

            p_r("Import to update material group started");
            foreach ($data as $result) {
                $articleNumber = $result['Material'];

                $sql = "SELECT oo_id FROM object_1 WHERE articleNumber = '$articleNumber' ";
                $record = $this->db->fetchAllAssociative($sql);

                if (!empty($record)) {
                    $oo_id = $record[0]['oo_id'];
                    $code = $result['Material Group in SAP File'];

                    $sql = "SELECT oo_id FROM object_21 WHERE code = '$code'";
                    $result = $this->db->fetchAllAssociative($sql);
                    $materialGroupId = $result[0]['oo_id'];

                    $queryTable = "UPDATE object_query_1
                                    SET materialGroup__id = $materialGroupId, materialGroup__type = 'object'
                                    WHERE oo_id = $oo_id ";
                    $this->db->executeQuery($queryTable);

                    $relationTable = "UPDATE object_relations_1
                                    SET dest_id = $materialGroupId, type = 'object', `index`= 0
                                    WHERE src_id = $oo_id AND fieldname = 'materialGroup' ";
                    $this->db->executeQuery($relationTable);

                    echo "$oo_id \n";
                }
            }
            p_r("Import Completed for the above id's");
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
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
