<?php

namespace PimDataPostBundle\Command\InitialLoadCommand;

use Pimcore\Console\AbstractCommand;
use PimDataPostBundle\InitialDataLoad\B2CProductInitialLoadProvider;
use PimDataPostBundle\Lib\TempTablePopulator\B2C\B2CProductTempTablePopulator;
use PimDataPostBundle\Model\PersistantModel\B2CPimFailureRecord;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Model\Types\StatusType;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class B2CInitialLoadCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('conti:datapost:b2c-initial-load-command')
            ->setDescription('This command is used to send initial PIM data to the salesforce')
            ->addArgument('pageNumber', InputArgument::REQUIRED, 'Enter page number');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $b2cProductTempTablePopulator = new B2CProductTempTablePopulator();

        $pageSize = 10000;
        $pageNumber = trim($input->getArgument('pageNumber'));

        if(is_numeric($pageNumber) && ($pageNumber > 0))
        {
            $provider = new B2CProductInitialLoadProvider();
            $allProductIds = $provider->getProductIdsForInitialLoad($pageSize, $pageNumber);

            $allProductIds = $b2cProductTempTablePopulator->filterIFSPTGProducts($allProductIds);

            $currTime = time();
            
            foreach($allProductIds as $id)
            {
                $record = new B2CPimFailureRecord();
                $record->setPimId($id)
                        ->setFailureMessage("initial load")
                        ->setSFObjectType(B2CSalesForceObjectType::PRODUCT())
                        ->setStatus(StatusType::FIXED())
                        ->setTimestamp($currTime)
                        ->save();
            }
        }
        else{
            echo "\n Page number should be numeric and should be greater than or equal to 1. \n";
        }

         echo "executed\n";
    }

}