<?php


namespace ImportBundle\OneTimeImportCommand;


use PhpOffice\PhpSpreadsheet\IOFactory;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PopulateHydFittingTableNameCommand extends AbstractCommand
{

    private $productClassId;

    private $db;

    const DATA_ROW_NUMBER = 2;

    const STATUS_SUCCESS = "SUCCESS";
    const STATUS_FAILURE = "FAILURE";
    const STATUS_NOMECLATURE_NOT_FOUND = "NOMECLATURE_NOT_FOUND";
    const STATUS_NOMENCLATURE_FOUND_BUT_NO_ASSOCIATED_PRODUCT_FOUND = "NOMENCLATURE_FOUND_BUT_NO_ASSOCIATED_PRODUCT_FOUND";
    const STATUS_INVALID_DATA = "INVALID_DATA";

    const LOG_FILE_NAME = "HYD_FITTING_TABLE_IDENTIFICATION_IMPORT_LOG";

    private $comments = array();

    public function __construct(string $name = null)
    {
        $this->productClassId = \Pimcore\Model\DataObject\ClassDefinition::getByName("Product")->getId();
        $this->db = \Pimcore\Db::get();

        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName('onetime-import:populate-hyd-fitting-table-name')
            ->setDescription('Commamd to populate hydroulics fitting table name in product class')
            ->addArgument('import_file', InputArgument::REQUIRED, 'Input file path');

    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $importFilePath = $input->getArgument('import_file');
        if (!file_exists($importFilePath)) {
            echo "Import file path '" . $importFilePath . "' not found." . PHP_EOL;
            return;
        }

        $fittingFamilyThreadToNomenIdMap = array();

//        $listing = new DataObject\NomenClature\Listing();
//        $condition = "FittingFamily IS NOT NULL AND Thread IS NOT NULL ";
//        $listing->setCondition($condition);
//        $listing->load();
//
//        foreach ($listing->getObjects() as $nomObject) {
//
//            $threadCodes = array();
//            $threadMetaItems = $nomObject->getThread();
//            foreach ($threadMetaItems as $threadMetaItem) {
//                $threadObject = $threadMetaItem->getObject();
//                $threadCodes[] = trim($threadObject->getName());
//            }
//
//            $fittingFamilyMetaItems = $nomObject->getFittingFamily();
//            foreach ($fittingFamilyMetaItems as $fittingFamilyMetaItem) {
//                $fittingFamilyObject = $fittingFamilyMetaItem->getObject();
//                $fittingFamilyCode = trim($fittingFamilyObject->getName());
//
//                foreach ($threadCodes as $threadCode) {
//                    $key = $fittingFamilyCode . "-" . $threadCode;
//                    $fittingFamilyThreadToNomenIdMap[$key][] = $nomObject->getId();
//                }
//            }
//        }


        $statusCountArray = array(
            self::STATUS_SUCCESS => 0,
            self::STATUS_FAILURE => 0,
            self::STATUS_NOMECLATURE_NOT_FOUND => 0,
            self::STATUS_NOMENCLATURE_FOUND_BUT_NO_ASSOCIATED_PRODUCT_FOUND => 0,
            self::STATUS_INVALID_DATA => 0
        );

        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . self::LOG_FILE_NAME . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w");
        $this->csvLog($csvLogFileHandle, array("Import Sheet Row Number", "Family-Thread", "Status", "Comment"));

        // starting import process
        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load($importFilePath);
        $worksheet = $spreadsheet->getSheet(0);

        $status = '';
        $comment = '';
        $recordsCount = 0;
        $highestRow = $worksheet->getHighestRow();
        $totalUpdatedProducts = 0;

        // iterating import sheet
        for ($i = self::DATA_ROW_NUMBER; $i <= $highestRow; $i++) {
            $recordsCount++;
            $this->comments = array();
            $status = self::STATUS_FAILURE;
            $fittingFamilyThreadString = '';
            $updatedProductCount = 0;

            try {
                $fittingFamilyThreadString = trim($worksheet->getCell("A" . strval($i))->getValue());
                $tableName = trim($worksheet->getCell("B" . strval($i))->getValue());

                if (!empty($fittingFamilyThreadString) && !empty($tableName)) {
                    $nomObject = DataObject\NomenClature::getByPartialPartNumber($fittingFamilyThreadString,1);

                    if($nomObject){
                        $productIds = $this->getProductIdsWithNomenClatureId($nomObject->getId());

                        if(count($productIds) > 0 ){
                            $this->updateProductsWithTableName($productIds, $tableName);
                            $status = self::STATUS_SUCCESS;
                            $updatedProductCount = count($productIds);
                            $totalUpdatedProducts += $updatedProductCount;
                            $this->comments[] = "Updated product count: (" . $updatedProductCount . ") ids: " . implode(', ', $productIds);
                        }else{
                            $status = self::STATUS_NOMENCLATURE_FOUND_BUT_NO_ASSOCIATED_PRODUCT_FOUND;
                            $this->comments[] = "Nomenclature was found but it was not associated with any product.";
                        }
                    }else {
                        $status = self::STATUS_NOMECLATURE_NOT_FOUND;
                        $this->comments[] = "No nomenclature could be found for FittingFamily+Thread (Partial Part Number) " . $fittingFamilyThreadString;
                    }

//                    if (array_key_exists($fittingFamilyThreadString, $fittingFamilyThreadToNomenIdMap)) {
//                        $nomIds = $fittingFamilyThreadToNomenIdMap[$fittingFamilyThreadString];
//                        $productIds = $this->getProductIdsWithNomenClatureId($nomIds);
//
//                        if(count($productIds) > 0 ){
//                            $this->updateProductsWithTableName($productIds, $tableName);
//                            $status = self::STATUS_SUCCESS;
//                            $updatedProductCount = count($productIds);
//                            $totalUpdatedProducts += $updatedProductCount;
//                            $this->comments[] = "Updated product count: (" . $updatedProductCount . ") ids: " . implode(', ', $productIds);
//                        }else{
//                            $status = self::STATUS_NOMENCLATURE_FOUND_BUT_NO_ASSOCIATED_PRODUCT_FOUND;
//                            $this->comments[] = "Nomenclature was found but it was not associated with any product.";
//                        }
//
//                    } else {
//                        $status = self::STATUS_NOMECLATURE_NOT_FOUND;
//                        $this->comments[] = "No nomenclature could be found for FittingFamily+Thread " . $fittingFamilyThreadString;
//                    }
                } else {
                    $status = self::STATUS_INVALID_DATA;
                    $this->comments[] = "Fitting Family+Thread or Table name not found.";
                }
            } catch (\Exception $exception) {
                $status = self::STATUS_FAILURE;
                $this->comments[] = "Exception caught: " . $exception->getMessage();
            }

            $msg = "Row (" . $i . "), FittingFamily+Thread: " . $fittingFamilyThreadString . ", UPDATED PRODUCT COUNT: (" . $updatedProductCount . "), status: [" . $status . "]";
            $this->consoleLog($msg);
            $statusCountArray[$status]++;
            $this->csvLog($csvLogFileHandle, array($i, $fittingFamilyThreadString, $status, implode("\n", $this->comments)));
        }
        fclose($csvLogFileHandle);

        $this->consoleLog("-------------------------------SUMMARY------------------------------------");
        $this->consoleLog("Total records processed -> " . ($recordsCount));
        foreach($statusCountArray as $status => $count){
            $msg = "'" . $status . "' count -> " . $count;
            $this->consoleLog($msg);
        }
        $this->consoleLog("------------------------");
        $this->consoleLog("Total Updated Products count:" . $totalUpdatedProducts);
        $this->consoleLog("-------------------------------SUMMARY------------------------------------");

        $this->consoleLog("Check log file for details at '" . $csvLogFilePath . "'");

    }

    private function getProductIdsWithNomenClatureId(int $nomId): array
    {
        $productIds = array();
//        $formattedIdArrayForQuery = $this->formatIdsArrayForQuery($nomIds);
        if ($nomId) {
            $hydFittingFertTableName = "object_brick_query_HydFittingsFert_" . $this->productClassId;

            $query = "SELECT id FROM " . $hydFittingFertTableName;
            $query .= " WHERE nomenclatureDetails = " . "',". $nomId . ",'" ;

            $productIds = $this->db->fetchOne($query);
        }
        return $productIds;
    }

    private function formatIdsArrayForQuery(array $nomIds): array
    {
        $formattedArr = array();
        foreach ($nomIds as $id) {
            $formattedArr[] = "'," . $id . ",'";
        }
        return $formattedArr;
    }

    private function updateProductsWithTableName(array $productIds, string $tableName)
    {
        $productQueryTableName = "object_query_" . $this->productClassId;
        $productStoreTableName = "object_store_" . $this->productClassId;

        $query1 = "UPDATE " . $productQueryTableName;
        $query1 .= " SET FittingTableName = " . $this->db->quote($tableName);
        $query1 .= " WHERE oo_id IN " . "(" . implode(",", $productIds) . ")";

        $query2 = "UPDATE " . $productStoreTableName;
        $query2 .= " SET FittingTableName = " . $this->db->quote($tableName);
        $query2 .= " WHERE oo_id IN " . "(" . implode(",", $productIds) . ")";

        $this->db->beginTransaction();
        try {

            $this->db->exec($query1);
            $this->db->exec($query2);

            $this->db->commit();

        } catch (\Exception $exception) {
            try {
                $this->db->rollBack();
            } catch (\Exception $er) {
                throw $er;
            }
            throw $exception;
        }

    }

    /**
     * handle logging
     *
     * @param $message
     * @param string $level
     */
    private function consoleLog($message, $level = "INFO")
    {
        echo "[ " . $level . " ] " . $message . PHP_EOL;
    }

    /**
     * @param $logHandler
     * @param array $dataRow
     */
    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";

        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }

}
