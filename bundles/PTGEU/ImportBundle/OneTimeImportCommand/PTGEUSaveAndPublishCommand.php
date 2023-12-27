<?php

namespace PTGEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Db;

class PTGEUSaveAndPublishCommand extends AbstractCommand
{

    private $db;

    protected function configure()
    {
        $this->setName('contitech:ptg:eu:save')
        ->setDescription('PTGEU product save and publish command');
    }
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get();
        $sql = "SELECT `oo_id` from ptgeu_product_left_to_save";
        $record = $this->db->fetchAllAssociative($sql);
        p_r(count($record));
        foreach($record as $oo_id){
            $id = $oo_id['oo_id'];
            $obj = DataObject\PTGEUProduct::getById($id);
            if($obj){
                $obj->setPublished(1);
                if($obj->save()){
                    $deleteQuery = "DELETE FROM ptgeu_product_left_to_save WHERE oo_id = '$id'";
                    try {
                        $this->db->query($deleteQuery);
                        p_r($id);
                    } catch (\Exception $e) {
                        print_r($e);
                    }
                }
            }
            \Pimcore::collectGarbage();
        }
    }
}

