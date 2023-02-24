<?php
namespace B2BTranslationBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Tool\Utils;
use AppBundle\Logger\LogLevel;
use Pimcore\Db;
use B2BTranslationBundle\Controller\DefaultController;
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

            $businessUnit='IFS_PTG_US';
            $className='Product';
            $productID='1840112';

            $obj=new DefaultController();

            /// Getting Attributes of the localization config file ////

            $attributeList=$obj->getLocalizedAttribute($businessUnit,$className);
            
            /// Fetch CSV Headers from B2BTranslation Mapping Tables ////
            
            $headerMapping= $this->fetchB2BTranslationMapping($businessUnit,$className);

            //dd($attributeList);
            $filterArr=[];
            foreach($attributeList as $key=>$value){
                //dd($key);
                if($attributeList[$key]['type']!='Product'){
                    $attributeName=$key;
                    $type=$attributeList[$key]['type'];
                    $tableName=$attributeList[$key]['tableName'];
                    $localizedTable=$attributeList[$key]['localizedTable'];
                    $filterArr[$attributeName]=$this->getAllClassAndBricksProduct($attributeName,$type,$tableName,$localizedTable,$productID);
                    //dd($filterArr);

                }
            }
            dd("1111");

            $file = fopen("export.csv","w");
            fputcsv($file,array_values($headerMapping));

            $sql = "select * from object_localized_data_1 where ooo_id='{$productID}'";
            $result= $this->db->fetchAll($sql);
            $data=[];
            foreach($result as $key=>$record){
                //data['language']=$record['language'];
                foreach($headerMapping as $key=>$headerValue){
                    $data[$headerValue]=$productClassData[$record['language']];
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

            dd("1111");

            /////////////////////////////////////////////////////
            /////////////////////////////////////////////////////
            $file = fopen("export.csv","w");
            fputcsv($file,array_values($headerMapping));
            
            /// fecth class field data query /// 
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

    public function fetchB2BTranslationMapping($businessUnit,$className){

        $sqlMapping="select * from object_query_B2BTranslationMapping where BusinessUnit='{$businessUnit}' and TranslationDataType='{$className}'";
        $resultMapping= $this->db->fetchAll($sqlMapping);
        $arrHeader=explode('--',str_replace("\n",'--',$resultMapping[0]['AVBVendorData']));
        $headerMapping=[];
        foreach($arrHeader as $value){
            $str=explode('|',$value);
            if(!empty($str[1])){
                $headerMapping[$str[0]]=$str[1];
            }
        }
        return $headerMapping;
    }
    public function getAllClassAndBricksProduct($attributeName,$type,$tableName,$localizedTable,$productID){

        if($type=='class'){
            $coulmnName='oo_id';
        }else{
            $coulmnName='o_id';
        }
        $sqlTable="select * from {$tableName} where {$coulmnName}='{$productID}'";
        //dd("111");
        $result= $this->db->fetchAll($sqlTable);
        //dd($result);
        $ids=[];
        $attributeId='';
        $data=[];
        if(!empty($result)){

            foreach($result as $value){
                $attributeId=str_replace(',','',$value[$attributeName]);
                //$data[$value[$coulmnName]]=$attributeId;
                //$ids[]=$attributeId;
            }
        }
        if(!empty($attributeId)){
            //dd($ids);
            $str=implode(',',$ids);
            $sqlLocalized="select * from {$localizedTable} where ooo_id in ({$attributeId})";
            //dd($sqlLocalized);
            $resultLocalized= $this->db->fetchAll($sqlLocalized);
            foreach($resultLocalized as $value){
            //dd($value);
                $data[$productID][$attributeId][$value['language']]=$value['name'];
            }
            //dd($data);
        }
        return $data;
    }
}