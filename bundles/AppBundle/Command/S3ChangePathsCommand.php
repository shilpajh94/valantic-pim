<?php


namespace AppBundle\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command to correct the S3 paths
 * NOT REUSABLE, this was done to fix an S3 related issue
 *
 * Class S3ChangePathsCommand
 * @package AppBundle\Command
 */
class S3ChangePathsCommand extends Command
{
    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this->setName('contitech:s3_change_paths')
            ->setDescription('Print Wrong S3 paths');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        stream_context_set_default(array("s3" => array("acl" => "public-read-write")));

        $db = \Pimcore\Db::get();
        $query = "select * from pimcore_s3_path_mapping";
        $query .= " join assets";
        $query .= " on pimcore_s3_path_mapping.pimcore_object_id = assets.id";
        $query .= " where type != 'folder'";

        $result = $db->fetchAllAssociative($query);

        $csvLogFilePath = PIMCORE_LOG_DIRECTORY."/"."s3_changed_paths_" . time() .".csv";
        $csvLogFileHandle = fopen($csvLogFilePath,"w");
        $this->csvLog($csvLogFileHandle, array("id","pim_path","s3_path","file_exists","file_renamed"));

        $total = count($result);
        $count = 0;
        $failCount = 0;
        $renameCount = 0;
        $renameFailCount = 0;
        foreach($result as $row){
            $id = $row['pimcore_object_id'];
            $pimPath = $row['pimcore_path'];
            $s3Path = $row['s3_path'];
            $type = $row['type'];


            $s3ProtocolPath = "s3://".S3_BUCKET . "/assets" . $s3Path;
            $pimProtocolPaths = "s3://".S3_BUCKET . "/assets" . $pimPath;

            /*
            if($type === 'folder'){
                $s3ProtocolPath = rtrim($s3ProtocolPath, '/') . '/';
                $pimProtocolPaths = rtrim($pimProtocolPaths, '/') . '/';
            }
            */

            $file_exists = file_exists($s3ProtocolPath) ? '1': '0';
            $result = 'NA';

            echo $count. "  ";
            if($pimPath === $s3Path){
                $this->csvLog($csvLogFileHandle, array($id,$pimPath,$s3Path,$file_exists,'') );
                $count++;
                continue;
            }

            if($file_exists === '0'){
                $failCount++;
            }else{
                $result = rename($s3ProtocolPath,$pimProtocolPaths) ? '1':'0';
                $result === '0'? $renameFailCount++ : $renameCount++;
            }

            $this->csvLog($csvLogFileHandle, array($id,$pimPath,$s3Path,$file_exists,$result) );
            $count++;
//            echo $file_exists . " -> " . $result;

//            if($result === '1'){
//                fclose($csvLogFileHandle);
//                return;
//            }

            if($count % 20 == 0){
                echo PHP_EOL.$count . "($failCount)"." / " . $total . PHP_EOL;
                echo PHP_EOL.$count . "($renameCount)"." / " . $total . PHP_EOL;
            }
        }
        fclose($csvLogFileHandle);

    }

    private function csvLog($logHandler,array $dataRow)
    {
        $csvDelimiter = ",";

        fputcsv($logHandler,$dataRow,$csvDelimiter);
    }
}
