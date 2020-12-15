<?php

/**
 * File Path: /home/praganosis/Working/CSV/hosedata.csv (Your File path on system)
 * Command: bin/console conti:onetimeimport:hose /home/praganosis/Working/CSV/hosedata.csv
 * Des: This command will import and enrich PTG data at class, base, skeleton, fert level including bricks too.
 * Just run the above command, it will create all required temp table if it does not exist into system
 * After creation of temp table, it will process the sheet to import and enrich data
 */

namespace ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;

class CleanSIOPCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('conti:product-siop-cleaning')
            ->setDescription('SAP Price Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get(); //
        $sql = "select src_id, sum(if(fieldname = 'SIOPLevel1', 1, 0)) as Level1Count from object_relations_1 group by src_id  Having Level1Count > 1";
        $data = $this->db->fetchAll($sql);
        foreach($data as $rec) {
            echo $rec['src_id'].PHP_EOL;
            $queryTableSql = "Select SIOPLevel1, SIOPLevel2, SIOPLevel3, SIOPLevel4, SIOPLevel5, SIOPLevel6 from object_query_1 WHERE `oo_id` = '".$rec['src_id']."'";
            $queryData = $this->db->fetchAll($queryTableSql);
            foreach ($queryData as $qData) {
                $siopLevel1 = $qData['SIOPLevel1'];
                if (!empty($siopLevel1)) {
                    $siopLevel1Arr = explode(',', $siopLevel1);
                    $siopLevel1 = ",".$siopLevel1Arr[1].",";
                }
                $siopLevel2 = $qData['SIOPLevel2'];
                if (!empty($siopLevel2)) {
                    $siopLevel2Arr = explode(',', $siopLevel2);
                    $siopLevel2 = ",".$siopLevel2Arr[1].",";
                }
                $siopLevel3 = $qData['SIOPLevel3'];
                if (!empty($siopLevel3)) {
                    $siopLevel3Arr = explode(',', $siopLevel3);
                    $siopLevel3 = ",".$siopLevel3Arr[1].",";
                }
                $siopLevel4 = $qData['SIOPLevel4'];
                if (!empty($siopLevel4)) {
                    $siopLevel4Arr = explode(',', $siopLevel4);
                    $siopLevel4 = ",".$siopLevel4Arr[1].",";
                }
                
                $siopLevel5 = $qData['SIOPLevel5'];
                if (!empty($siopLevel5)) {
                    $siopLevel5Arr = explode(',', $siopLevel5);
                    $siopLevel5 = ",".$siopLevel5Arr[1].",";
                } else {
                    $siopLevel5 = null;
                }
                $siopLevel6 = $qData['SIOPLevel6'];
                if (!empty($siopLevel6)) {
                    $siopLevel6Arr = explode(',', $siopLevel6);
                    $siopLevel6 = ",".$siopLevel6Arr[1].",";
                } else {
                    $siopLevel5 = null;
                }
                $updateQuery = "Update object_query_1 set `SIOPLevel1` = '".$siopLevel1."', `SIOPLevel2` = '".$siopLevel2."', `SIOPLevel3` = '".$siopLevel3."', `SIOPLevel4` = '".$siopLevel4."', `SIOPLevel5` = '".$siopLevel5."', `SIOPLevel6` = '".$siopLevel6."' WHERE `oo_id` = '".$rec['src_id']."' "; 
                echo $updateQuery.PHP_EOL;
                $this->db->query($updateQuery);
            }
            $query = "delete from `object_relations_1` where `src_id` = '".$rec['src_id']."' and (`index` = 0 OR `index` = 2) and `fieldname` like 'SIOPLevel%'";
            $this->db->query($query);
        }
    }
}