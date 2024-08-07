<?php

namespace AppBundle\Command;

use Exception;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;
use Pimcore\Model\DataObject\PTGEUSalesMaterialMaster;
use \Pimcore\Model\Dataobject;
use Pimcore\Model\DataObject\PTGEUSalesOrg;

#[AsCommand(
    name: 'contitech:Update_Records',
    description: 'Update Sales'
)]
class UpdateRecordsCommand extends AbstractCommand
{

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->writeInfo('Start updating Record for PTGEUSalesMaterial SalesOrganization attribute');
        $this->runQuery();
        return 1;
    }

    private function runQuery()
    {
        try {
            $this->removeDuplicateEnteryFromRelations();
            $records = $this->makeQuery();
            $salesOrgObject = PTGEUSalesOrg::getById(13334232);
            foreach ($records as $record) {
                $this->writeInfo("Save data for object :" . $record['SM_id']);

                $PTGEUSalesMaterialObject = PTGEUSalesMaterialMaster::getById($record['SM_id']);
               
                if(!empty( $PTGEUSalesMaterialObject) && method_exists( $PTGEUSalesMaterialObject,'setSalesOrganization')){
                    $PTGEUSalesMaterialObject->setSalesOrganization($salesOrgObject);
                    $PTGEUSalesMaterialObject->save();
                }
              
            }
        } catch (Exception $ex) {
            p_r($ex);
        }
    }
    private function makeQuery(): array
    {
        $db = Db::get();
        $sql = "SELECT SM.oo_id AS SM_id,  products.oo_id AS products_id, SM.salesOrganization__id,SM.salesOrganization__type FROM  object_query_41 AS SM INNER JOIN object_38 AS products ON TRIM(BOTH ',' FROM SM.Material) = products.oo_id WHERE SM.salesOrganization__id IS NULL AND SM.salesOrganization__type='object' ";
        $records = $db->fetchAllAssociative($sql);
        return $records;
    }
    private function removeDuplicateEnteryFromRelations()
    {
        $this->writeInfo('Deleting duplicate entry from object_relations_41');
        $allRelationIds = array();
        $db = Db::get();

        
        while(true){
            $this->writeInfo('conntinue...');
            $sql = "SELECT *
            FROM object_relations_41 
            GROUP BY src_id, dest_id HAVING count(*)> 1";
        
            $records = $db->fetchAllAssociative($sql);
            if(count($records)>0){
                foreach ($records as $eachRecord) {
                    array_push($allRelationIds, $eachRecord['id']);
                }
                $duplicateRelationIds = implode(", ", $allRelationIds);
        
                $deleteQuery = "DELETE from object_relations_41 where `id` IN ($duplicateRelationIds)";
                $db->executeQuery($deleteQuery);
        
                $updateIndexQuery = "UPDATE object_relations_41 set `index` = IF(`index` = 1 , 0 , `index`)";
                $db->executeQuery($updateIndexQuery);
               
            }
            else{
                break ;
            }
        }
        $this->writeInfo('Done: Removed duplicate entry from object_relations_41');

        
    }
}
