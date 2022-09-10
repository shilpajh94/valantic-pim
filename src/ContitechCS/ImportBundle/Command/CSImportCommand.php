<?php

namespace ContitechCS\ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Elements\Bundle\ProcessManagerBundle\ExecutionTraitClass;
use Symfony\Component\Console\Input\InputOption;

class CSImportCommand extends AbstractCommand
{
    use ExecutionTraitClass;
    protected function configure()
    {
        $this->setName('cs:import')
            ->setDescription('This command will handle all type of request');
        
        /* As per Process Manager plugin, we will use addOption to take use input
            becuase there is no option to take argument in process manager
        */
        /* monitoring-item-id: We don't need to paas it explicitly because, plugin do it */
       
        $this->addOption(
            'monitoring-item-id',
            null,
            InputOption::VALUE_REQUIRED,
            'Contains the monitoring item if executed via the Pimcore backend'
        );

        /* Asking for user input to execute our program */
        /* 'command-name' is a name of the command. eg: IFS (SIOP Import for IFS), PTG (SIOP Import for PTG) */
        
        $this->addOption(
            'commandType',
            'c',
            InputOption::VALUE_REQUIRED,
            'Please enter command name'
        );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        /* We will use options instead of argument */
        $options = $input->getOptions();

        if (isset($options['monitoring-item-id']) && !empty($options['monitoring-item-id'])) {
            $this->initProcessManager($options['monitoring-item-id']);
        }

        $lookupParam = array(
            'commandType'   =>  $options['commandType'] ?: null,
            'filePath'      =>  $options['filePath'] ?: null
        );

        $lookupObj = \Pimcore::getContainer()->get('cs_import.lookup_service');
        $lookupObj->execDataFeeder($lookupParam);
    }
}