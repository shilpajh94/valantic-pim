<?php
namespace PimDataPostBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;


class SampleTestCommand extends AbstractCommand
{
    protected $configProvider;

    public function execute(InputInterface $input, OutputInterface $output)
    {
       $b2bcong = new B2BProductAttributeConfigProvider();
       $config = $b2bcong->getCompleteConfig();

       p_r($config);
       echo "Finished";
       die;
    }
}

