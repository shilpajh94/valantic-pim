<?php
namespace PTGEU\ImportBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Db;
use AppBundle\Lib\SFTPConnection;
use AppBundle\Tool\Utils;
use AppBundle\Logger\LogLevel;

/**
 * Class DeleteRecordsFromImportMasterTableForNewlyCreatedMasterCommand
 * @package PTGEU\ImportBundle\Command
 */
class DeleteRecordsFromImportMasterTableForNewlyCreatedMasterCommand extends Command
{
    private $db;

    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this->setName('contitech:delete_records_from_import_master_table_for_newly_created_master')
            ->setDescription('Delete Records from import master table for newly created master');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get();
        $newMasterRecords = [];
        // Master Data - PTGEUBeltType
        $ptgeuBeltType =  "SELECT *
                FROM object_PTGEUBeltType
                WHERE creationDate >= UNIX_TIMESTAMP(NOW() - INTERVAL 1 DAY)";
        $beltTypeRecords = $this->db->fetchAllAssociative($ptgeuBeltType);
        foreach($beltTypeRecords as $key => $value){
            $newMasterRecords['Belt Type'][] = $value['key'];
        }

        // Master Data - PTGEUStaticConductive
        $ptgeuStaticConductive = "SELECT *
                FROM object_PTGEUStaticConductive
                WHERE creationDate >= UNIX_TIMESTAMP(NOW() - INTERVAL 1 DAY)";
        $ptgeuStaticConductiveRecords = $this->db->fetchAllAssociative($ptgeuStaticConductive);
        foreach($ptgeuStaticConductiveRecords as $key => $value){
            $newMasterRecords['Static Conductive'][] = $value['key'];
        }

        // Master Data - PTGEUPerformance
        $ptgeuPerformance = "SELECT *
                FROM object_PTGEUPerformance
                WHERE creationDate >= UNIX_TIMESTAMP(NOW() - INTERVAL 1 DAY)";
        $ptgeuPerformanceRecords = $this->db->fetchAllAssociative($ptgeuPerformance);
        foreach($ptgeuPerformanceRecords as $key => $value){
            $newMasterRecords['Performance'][] = $value['key'];
        }

        // Master Data - Color
        $ptgeuColor = "SELECT *
                FROM object_PTGEUColor
                WHERE creationDate >= UNIX_TIMESTAMP(NOW() - INTERVAL 1 DAY)";
        $ptgeuColorRecords = $this->db->fetchAllAssociative($ptgeuColor);
        foreach($ptgeuColorRecords as $key => $value){
            $newMasterRecords['Color'][] = $value['key'];
        }

        // Master Data - VTL Status
        $ptgeuVTLStatus = "SELECT *
                FROM object_PTGEUVTL
                WHERE creationDate >= UNIX_TIMESTAMP(NOW() - INTERVAL 1 DAY)";
        $ptgeuVTLStatusRecords = $this->db->fetchAllAssociative($ptgeuVTLStatus);
        foreach($ptgeuVTLStatusRecords as $key => $value){
            $newMasterRecords['Status'][] = $value['key'];
        }

        // dd($newMasterRecords);
        $masterArr = array(
            "Color" => 46,
            "Static Conductive" => 47,
            "Performance" => 56,
            "Belt Type" => 57,
            "Status" => 100
        );
        foreach($newMasterRecords as $eachMaster => $newValues){
            $masterIndex = $masterArr[$eachMaster];
            foreach($newValues as $key => $eachValue){
                $sql = "SELECT * from ptgeu_material_import_master where record LIKE '%$eachValue%'";
                $records = $this->db->fetchAllAssociative($sql);
                if(!empty($records)){
                    foreach($records as $key => $arr){
                        $data = explode(",",$arr['record']);
                        $tableData = str_replace('"',"",$data[$masterIndex]);
                        if(strtoupper($tableData) == strtoupper($eachValue)){
                            $sapMaterialCode = $arr['id'];
                            $deleteQuery = "DELETE from ptgeu_material_import_master where id = '$sapMaterialCode'";
                            $this->db->executeQuery($deleteQuery);
                            p_r("Records deleted for this id - " .  $sapMaterialCode);
                        }
                    }
                }
            }
        }
        return 1;
    }
}
