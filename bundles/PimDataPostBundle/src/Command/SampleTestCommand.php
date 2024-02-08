<?php
namespace PimDataPostBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class SampleTestCommand extends AbstractCommand
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
       echo "executed\n";
    }
}
