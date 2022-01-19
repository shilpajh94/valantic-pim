<?php


namespace AppBundle\Command;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetTestDataCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('conti:import:test_Data')
            ->setDescription('Test data import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $folderId = DataObject::getByPath('/Products Master/IFS/Hydraulics/Textile & Braid/Braided Fittings/Ultra-Crimp/JIC 37° FLARE')->getId();
        $list = new DataObject\Product\Listing();
        $list->addConditionParam("o_parentId = ?", $folderId);
        $list->load();
        // $i = 0;
        foreach ($list as $obj) {
            $id = $obj->getId();
            if($id > 181343){
                break;
            }
            if($id == 181287 || $id == 181288 || $id == 181291 || $id == 181293 || $id == 181295 || $id == 181297){
                $obj->setLongDescription('Female / Swivel');
            }
            else{
                $obj->setLongDescription('Female / 90° Elbow / Swivel');
            }
            
            // $data = $obj->getShortDescription();
            // $obj->setLongDescription('Female / Swivel');
            $obj->save();
        }
    }
}