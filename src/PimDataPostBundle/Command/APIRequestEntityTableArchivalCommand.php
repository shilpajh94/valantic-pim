<?php
namespace PimDataPostBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Lib\Constants;
use Pimcore\Db;

class APIRequestEntityTableArchivalCommand extends AbstractCommand
{
    private $db;
    protected function configure()
    {
        $this->setName('conti:datapost:api-request-entity-table-archival-command')
            ->setDescription('Command for archive old records from api request entity table.')
            ->addArgument('numberOfDays', InputArgument::REQUIRED, 'Enter the number of days old records need to archived.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get(); 

        $numberOfDays = trim($input->getArgument('numberOfDays'));

        echo "\n execution started. \n";

        $this->proceesAPIRequestEntityTableArchival("B2B", $numberOfDays);
        $this->proceesAPIRequestEntityTableArchival("B2C", $numberOfDays);

        echo "\n execution completed. \n";
    }

    private function proceesAPIRequestEntityTableArchival(string $shopType, int $numberOfDays): void
    {   
        echo "\n processing {$shopType} records. \n";

        $API_REQUEST_ENTITIES_TABLE = Constants::getDynamicConstant($shopType, "API_REQUEST_ENTITIES_TABLE");
        $API_REQUEST_ARCHIVE_CSV_LOG_HEADERS = Constants::getDynamicConstant($shopType, "API_REQUEST_ARCHIVE_CSV_LOG_HEADERS");
        $API_REQUEST_ARCHIVE_FOLDER = Constants::getDynamicConstant($shopType, "API_REQUEST_ARCHIVE_FOLDER");
        
        $b2bAPIRequestEntityRecords = $this->fetchTableRecords($API_REQUEST_ENTITIES_TABLE, $numberOfDays);

        $archiveRecords = [];
        $archiveRecords[] = array_keys($API_REQUEST_ARCHIVE_CSV_LOG_HEADERS);

        foreach($b2bAPIRequestEntityRecords as $record){
            $data = [];
            foreach ($API_REQUEST_ARCHIVE_CSV_LOG_HEADERS as $fieldKey) {
                $data[$fieldKey] = $record[$fieldKey];
            }
            $archiveRecords[] = $data;
        }
        
        if(count($archiveRecords)> 1)
        {
            $fileName = date("M")."_archive_".time().".csv";
            $filePath = PIMCORE_TEMPORARY_DIRECTORY . "/" . $fileName;
            $b2bAPIRequestArchiveFolder = $API_REQUEST_ARCHIVE_FOLDER."/".date("Y");

            $isFileCreated = Util::createCsvFile($filePath, $archiveRecords);
            if($isFileCreated)
            {
                $asset = Util::createAsset($fileName, $filePath, $b2bAPIRequestArchiveFolder);
                
                if($asset)
                {
                    $ids = array_column($archiveRecords, 'id');
                    $this->deleteTableRecords($API_REQUEST_ENTITIES_TABLE, $ids);
                }
            }
        }
    }

    private function fetchTableRecords(string $tableName, int $numberOfDays): array 
    {
        $sql = "SELECT * FROM {$tableName} WHERE creationDate <= UNIX_TIMESTAMP(CURTIME() - INTERVAL {$numberOfDays} DAY);";
        return $this->db->fetchAll($sql);
    }

    private function deleteTableRecords(string $tableName, array $ids): void 
    {
        if($ids){
            $recordIds = implode(',', $ids);
            $sql = "DELETE FROM {$tableName} WHERE id IN ({$recordIds})";
            $this->db->query($sql);
        }
    }
}

