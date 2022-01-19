<?php

namespace AppBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use \Pimcore\Db;
use Pimcore\Model\DataObject;
use Pimcore;

class NutTypeDataImportCommand extends AbstractCommand
{

    private $db;
    protected function configure()
    {
        $this->setName('contitech:Nut-Type-Data-Import')
            ->setDescription('Import nut type data');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get();

        $sql = "SELECT o_id FROM object_brick_store_HydFittingsFert_1 
                WHERE '1' IN (ThrustWireNut, CrimpNutYN)";
         $results = $this->db->fetchAll($sql);

         foreach($results as $id){
            $element = DataObject\Product::getById($id['o_id']);
            $crimpNutValue = $element->getFert()->getHydFittingsFert()->getCrimpNutYN();
            $thrustWireNutValue = $element->getFert()->getHydFittingsFert()->getThrustWireNut();
            if($crimpNutValue == 1){
                $element->getFert()->getHydFittingsFert()->setNutType("Crimp Nut");
            }
            if($thrustWireNutValue == 1){
                $element->getFert()->getHydFittingsFert()->setThrustWireNut("Thrust Nut");

            }
            $element->save();
         }
        
    }
}
