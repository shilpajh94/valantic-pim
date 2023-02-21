<?php
namespace IFSEU\ImportBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Tool\Utils;
use AppBundle\Logger\LogLevel;
use Pimcore\Db;
/**
 *
 * @package IFSEU\ExportBundle\Command
 */
class IFSEU_ExportProductLocationFileCommand extends Command
{

    /**
     * Function to set the command configurations
     *
     */
    private $db;
    protected function configure()
    {
        $this->setName('contitech:ifd:eu:export_localization_attribute')
            ->setDescription('Export IFSEU FileCommand');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo "111";
        
    
        $this->logMessage('Script Execution Started', LogLevel::DEBUG());
        try{
            $this->db = Db::get();
            $sql = "select ooo_id,language,shortDescription,longDescription,legalText,sapDescription,BrandShortText1,BrandShortText2,BrandShortText3,BrandShortText4,BrandShortText5,FeaturesBenefitsBulletPoint from object_localized_data_1"; //where ooo_id=13335363";
            $result= $this->db->fetchAll($sql);
            //dd($result);
            $headers = array_keys($result[0]);
            $file = fopen("export.csv","w");
            fputcsv($file, $headers);
            $data=[];
            foreach($result as $key=>$record){
                foreach($headers as $headerValue){
                    $data[$headerValue]=$record[$headerValue];
                }
                fputcsv($file, $data);
            }
            fclose($file);
        } catch(\Throwable $e) {
            $message = $e->getMessage();
            $message = "Exception while trying to export the data"." ".$message;
            $this->logMessage($message, LogLevel::CRITICAL());
            return;
        }
        die;
    }

    public function logMessage(String $msg, LogLevel $logLevel)
    {
        Utils::log(PRODUCT_LOCALIZATION_EXPORT_LOG_FILE, $msg, $logLevel);
    }
}