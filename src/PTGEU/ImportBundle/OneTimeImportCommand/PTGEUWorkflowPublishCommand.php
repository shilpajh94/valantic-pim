<?php

namespace PTGEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \Pimcore\Db;
use Pimcore\Model\DataObject;

class PTGEUWorkflowPublishCommand extends AbstractCommand
{
    private $db;
    protected function configure()
    {
        $this->setName('ptgeu-workflow-publish')
            ->setDescription('This command will publish workflow state for all PTGEU Products');        
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get();
        $productsList = new DataObject\PTGEUProduct\Listing();
        $productsList->load();
        if($productsList)
        {
            $sql = "SELECT `cid` from element_workflow_state";
            $record = $this->db->fetchAll($sql);
            foreach ($productsList->getObjects() as $obj) {
                $objectId = $obj->getId();
                $key = array_search($objectId, array_column($record, 'cid'));
                if ($key){
                    $updateQuery = "UPDATE element_workflow_state SET place = 'published' where cid = $objectId";
                    $this->db->executeUpdate($updateQuery);
                    print_r('Updated state for ----- '.$objectId);
                    echo PHP_EOL;
                }else{
                    $insertQuery = "INSERT into element_workflow_state (`cid`,`ctype`,`place`,`workflow`) VALUES('$objectId', 'object', 'published', 'ptg_eu_product_enrichment')";
                    $this->db->query($insertQuery);
                    print_r('Inserted for  ----- '.$objectId);
                    echo PHP_EOL;
                }
            }
    
            
        }
    }
}