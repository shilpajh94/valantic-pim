<?php
namespace B2BTranslationBundle\Command;

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
        $this->setName('contitech:ifs:eu:export_localization_attribute')
            ->setDescription('Export IFSEU FileCommand');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logMessage('Script Execution Started', LogLevel::DEBUG());
        try{
            $this->db = Db::get();

            ////// Query For fetching the mapping headers/////
            $sqlMapping="select * from object_query_B2BTranslationMapping";
            $resultMapping= $this->db->fetchAll($sqlMapping);
            $arrHeader=explode('--',str_replace("\n",'--',$resultMapping[0]['AVBVendorData']));
            //dd($arrHeader);
            $headerMapping=[];
            $headers=[];
            $headers[]='language';
            foreach($arrHeader as $value){
                //dd($value);
                $str=explode('|',$value);
                //dd($str);
                if(!empty($str[1])){
                    $headerMapping[$str[0]]=$str[1];
                    $headers[]=$str[1];
                }
            }
            //dd($headers);
            //dd($headerMapping);
            /// class field data query /// 
            $sqlpProductClass = "select * from object_query_1 where oo_id=1840112";
            $sqlpProductClassresult= $this->db->fetchAll($sqlpProductClass);
            //dd($sqlpProductClassresult);
            foreach($sqlpProductClassresult as $key=>$sqlpProductClass_record){
                $reinforcement_id=str_replace(',','',$sqlpProductClass_record['reinforcement']);
            }

            $sqlpProductLocalizedSql = "select * from object_localized_data_22 where ooo_id=".$reinforcement_id;
            $ProductLocalizedResult= $this->db->fetchAll($sqlpProductLocalizedSql);
            //dd($ProductLocalizedResult);
            $productClassData=[];
            foreach($ProductLocalizedResult as $key=>$ProductLocalizedRecord){
                $productClassData[$ProductLocalizedRecord['language']]=$ProductLocalizedRecord['name'];
            }
            $file = fopen("export.csv","w");
            fputcsv($file, $headers);
            $sql = "select * from object_localized_data_1 where ooo_id=1840112";
            $result= $this->db->fetchAll($sql);
            $data=[];
            foreach($result as $key=>$record){
                //data['language']=$record['language'];
                foreach($headers as $headerValue){
                    $pimAttribute = array_search($headerValue,$headerMapping);
                    $data['language']=$record['language'];
                    if($headerValue=='reinforcement'){
                        //dd($headerValue);
                        $data[$headerValue]=$productClassData[$record['language']];

                    }else{
                        $data[$headerValue]=$record[$pimAttribute];
                    }
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