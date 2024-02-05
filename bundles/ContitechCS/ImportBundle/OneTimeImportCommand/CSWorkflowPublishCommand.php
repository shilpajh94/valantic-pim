<?php

namespace ContitechCS\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \Pimcore\Db;

class CSWorkflowPublishCommand extends AbstractCommand
{
    private $db;
    protected function configure()
    {
        $this->setName('cs-workflow-publish')
            ->setDescription('This command will publish workflow state for all Cover Options children');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get();

        $sqlQuery =    "SELECT `oo_id`
                        FROM `object_CSProducts`
                        WHERE `path` LIKE '%/Contitech_ConveyorSolution/Products/Material Handling/Cover Options/%'";

        $productsList = $this->db->fetchAllAssociative($sqlQuery);

        $sql = "SELECT `cid` from element_workflow_state";
        $record = $this->db->fetchAllAssociative($sql);
        if($productsList)
        {
            foreach ($productsList as $id) {
                $objectId = $id['oo_id'];
                $key = array_search($objectId, array_column($record, 'cid'));
                if ($key){
                    $updateQuery = "UPDATE element_workflow_state SET place = 'published' where cid = $objectId";
                    $this->db->executeQuery($updateQuery);
                    print_r('Updated state for ----- '.$objectId);
                    echo PHP_EOL;
                }else{
                    $insertQuery = "INSERT into element_workflow_state (`cid`,`ctype`,`place`,`workflow`) VALUES('$objectId', 'object', 'published', 'product_enrichment')";
                    $this->db->executeQuery($insertQuery);
                    print_r('Inserted for  ----- '.$objectId);
                    echo PHP_EOL;
                }
            }
        }
    }
}
