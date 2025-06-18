<?php

namespace AppBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;

/*
    Below script is unpublishing and deleting records 
    Unpublishing is done using database query.
    Therefore, there won't be any version created for unpublishing of the objects.

*/

class UnpublishRecordsCommand extends AbstractCommand
{

    protected function configure()
    {
        $this->setName('Unpublish-Records-Command')
        ->setDescription('Unpublish records provided in the file')
        ->addArgument('activity', InputArgument::REQUIRED, 'Enter Required Activity: unpublish or delete')
        ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');

    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $activity = $input->getArgument('activity');

        $results = $this->getCSVData($filePath);

        if($activity == 'unpublish'){
            $this->unpublishRecords($results);
        }else if($activity == 'delete'){
            $this->deleteRecords($results);
        }       
        return 1;
    }

    public function unpublishRecords($results){
        try {
            $db = \Pimcore\Db::get();

            $data = $results['data'];
            $chunkSize = 100;

            $totalChunks = ceil(count($data) / $chunkSize);
            $currentChunk = 1;

            foreach (array_chunk($data, $chunkSize) as $chunk) {
                $ids = [];

                foreach ($chunk as $row) {
                    if (isset($row['oo_id'])) {
                        $ids[] = (int)$row['oo_id'];
                    }
                }

                if (!empty($ids)) {
                    $idList = implode(',', $ids);
                    $sql = "UPDATE objects SET published = 0 WHERE id IN ($idList)";

                    try {
                        $db->executeQuery($sql);
                        echo "Chunk $currentChunk/$totalChunks: Updated " . count($ids) . "/" . count($chunk) . " records.\n";
                        p_r($idList);
                    } catch (\Exception $e) {
                        echo "Error in chunk $currentChunk/$totalChunks: " . $e->getMessage() . "\n";
                    }
                }

                $currentChunk++;
            }

        } catch (\Exception $ex) {
            p_r($ex);
        }


    }

    public function deleteRecords($results){
        try{
            $data = $results['data'];
            foreach ($data  as $result) {
                $productId = $result['oo_id'];
                $obj    = DataObject::getById($productId);
                if($obj){
                    echo $obj->getId()." is deleting \n";
                    $obj->delete();
                }
            }
        }
        catch(\Exception $ex){
            p_r($ex);
        }


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
                            $rowData[mb_convert_encoding(trim($key), 'ISO-8859-1', 'UTF-8')] = mb_convert_encoding(trim($value), 'ISO-8859-1', 'UTF-8');
                        }
                        $firstRowData = $rowData;
                    } else {
                        $tmpData = [];
                        foreach ($firstRowData as $key => $value) {
                            $tmpData[$value] = mb_convert_encoding($rowData[$key], 'UTF-8');
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