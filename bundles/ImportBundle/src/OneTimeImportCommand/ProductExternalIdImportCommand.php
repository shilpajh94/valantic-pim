<?php


namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;

/**
 * RUN : conti:onetimeimport:product_external_id_import
 *
 * Updating following attributes:
 * product class -> externalID
 *
 * Class ProductExternalIdImportCommand
 * @package ImportBundle\OneTimeImportCommand
 */
class ProductExternalIdImportCommand extends AbstractCommand
{
    private $db;

    protected function configure()
    {
        $this->setDescription("This command used for update the product's external id attribute.")
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->consoleLog("Script execution started." );

        $this->db = Db::get();
        $filePath = $input->getArgument('filePath');
        $results = $this->getCSVData($filePath);
        $data = $results['data'];
        $fileNameWithExt = end(explode('/',$filePath));
        $fileNameInfo = explode('.',$fileNameWithExt);
        $fileName = $fileNameInfo[0];

        $this->consoleLog("log file created to store the product's updation status.");

        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/{$fileName}_" . time() . "_log.csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "a");
        $this->csvLog($csvLogFileHandle, array(
            "Material",
            "External ID",
            "Status",
            "Comment"
        ));

        $scriptStartTime = time();
        $this->processRecords($csvLogFileHandle, $data);
        $scriptEndTime = time();
        $totalExecTime = ($scriptEndTime - $scriptStartTime) / 60 ;
        $this->consoleLog("Total Execution Time: " . $totalExecTime . " minutes" );
    }

    private function processRecords($csvLogFileHandle, $data)
    {
        $totalCount = count($data);
        $this->consoleLog("Total {$totalCount} Records found." );

        if($totalCount > 0)
        {
            $this->consoleLog("Updation started." );

            foreach ($data as $key => $record) {
                $recordNumber = $key+1;

                $articleNumber = trim($record['Material']);
                $externalID = trim($record['External ID']);

                $this->consoleLog("Process Record $recordNumber/$totalCount - articleNumber:$articleNumber");

                $status = "NA";
                $msg = "";

                if($articleNumber && $externalID)
                {
                    $isProductExist = $this->fetchRecordFromQueryTable($articleNumber);

                    if($isProductExist)
                    {
                        $response = $this->insertDataIntoTable($articleNumber, $externalID);
                        $status = $response['status'];
                        $msg = $response['msg'];
                    }
                    else{
                        $msg = "Material does not exist in system";
                    }
                }
                else{
                    $msg = "Material or External ID field empty";
                }

                $this->csvLog($csvLogFileHandle, array(
                    $articleNumber,
                    $externalID,
                    $status,
                    $msg
                ));
            }
        }
    }

    private function fetchRecordFromQueryTable($artcleNumber): bool
    {
        $sql = "SELECT oo_id FROM object_query_1 WHERE articleNumber = '{$artcleNumber}'";
        return ($this->db->fetchFirstColumn($sql)) ? true : false;
    }

    private function insertDataIntoTable($articleNumber, $externalID): array
    {
        $this->db->beginTransaction();
        try {
            $sql = "UPDATE object_query_1 SET externalID = '$externalID' WHERE articleNumber = '{$articleNumber}'";
            $this->db->executeQuery($sql);

            $sql = "UPDATE object_store_1 SET externalID = '$externalID' WHERE articleNumber = '{$articleNumber}'";
            $this->db->executeQuery($sql);

            $sql = "select * FROM material_import_master WHERE id = '{$articleNumber}'";
            $recordData = $this->db->fetchAssociative($sql);

            if($recordData)
            {
                $record = json_decode($recordData['record']);
                if(!in_array($externalID, $record))
                {
                    $record[]= $externalID;
                    $record = addslashes(json_encode($record, true));
                    $hash = md5($record);

                    $sql = "UPDATE material_import_master SET record = '$record', `hash`= '$hash' WHERE id = '{$articleNumber}'";
                    $this->db->executeQuery($sql);
                }
            }

            $this->db->commit();
            $status = "SUCCESS";
        } catch (\Exception $exception) {
            $this->db->rollBack();
            $status = "FAILURE";
            $msg = $exception->getMessage();
        }

        return array('status'=>$status,'msg'=>$msg);
    }

    private function csvLog($logHandler, array $dataRow) {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }

    private function consoleLog($message)
    {
        echo $message . PHP_EOL;
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
                while (($rowData = fgetcsv($handle, 0, ',', $dialect->quotechar, $dialect->escapechar)) !== false) {
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
