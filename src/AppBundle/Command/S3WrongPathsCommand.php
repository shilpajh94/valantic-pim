<?php


namespace AppBundle\Command;


use Aws\S3\S3Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command to get the S3 paths which exist in pimcore_s3_path_mapping table
 * but are not present or deleted marked on S3
 *
 * Class S3WrongPathsCommand
 * @package AppBundle\Command
 */
class S3WrongPathsCommand extends Command
{

    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this->setName('contitech:s3_wrong_paths')
            ->setDescription('Print Wrong S3 paths');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $db = \Pimcore\Db::get();
        $query = "select * from pimcore_s3_path_mapping";
        $result = $db->fetchAll($query);

        $csvLogFilePath = PIMCORE_LOG_DIRECTORY."/"."s3_wrong_continental_paths".".csv";
        $csvLogFileHandle = fopen($csvLogFilePath,"w");
        $this->csvLog($csvLogFileHandle, array("id","pim_path","s3_path","file_exists"));

        $total = count($result);
        $count = 0;
        $failCount = 0;
        foreach($result as $row){
            $id = $row['id'];
            $pimPath = $row['pimcore_path'];
            $s3Path = $row['s3_path'];

            $s3ProtocolPath = "s3://".S3_BUCKET . "/assets" . $s3Path;

            $file_exists = file_exists($s3ProtocolPath) ? '1': '0';
            if($file_exists === '0'){
                $failCount++;
            }
            $this->csvLog($csvLogFileHandle, array($id,$pimPath,$s3Path,$file_exists ) );
            $count++;
            echo $file_exists;
            if($count % 20 == 0){
                echo PHP_EOL.$count . "($failCount)"." / " . $total.PHP_EOL;
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
