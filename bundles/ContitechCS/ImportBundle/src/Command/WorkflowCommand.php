<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ImportBundle\Command;

/**
 * Description of TagsImportCommand
 *
 */
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Elements\Bundle\ProcessManagerBundle\ExecutionTraitClass;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\DependencyInjection\ContainerInterface;

class WorkflowCommand extends AbstractCommand {
    //put your code here

    private $container;
    private $workflow;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected function configure()
    {
        $this->setName('cs:workflow:mark-products-published')
            ->setDescription('This command will import tags in system. It will read csv file from website setting config.'); 
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $options = $input->getOptions();
        $this->workflow = $this->container->get('state_machine.product_enrichment');
        $listObject = new \Pimcore\Model\DataObject\CSProducts\Listing();
        $listObject->setCondition("published = 1");
        $listObject->load();
        echo "1";
        foreach($listObject as $object) {
            p_r($object->getId());
            echo "====".PHP_EOL;
            try {
                $response = $this->workflow->can($object, 'direct_publish');
                var_dump($response);
                if($response) {
                    $this->workflow->apply($object, 'direct_publish');
                }
            } catch(\Exception $e) {
                p_r($e); 
            }
        }
     
        
    }

}
