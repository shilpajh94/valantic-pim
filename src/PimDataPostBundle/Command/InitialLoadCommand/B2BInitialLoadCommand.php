<?php

namespace PimDataPostBundle\Command\InitialLoadCommand;

use Pimcore\Console\AbstractCommand;
use PimDataPostBundle\InitialDataLoad\B2BProductInitialLoadProvider;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\B2BProductTempTablePopulator;
use PimDataPostBundle\Model\PersistantModel\B2BPimFailureRecord;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\StatusType;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class B2BInitialLoadCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('conti:datapost:b2b-initial-load-command')
            ->setDescription('This command is used to send initial PIM data to the salesforce')
            ->addArgument('pageNumber', InputArgument::REQUIRED, 'Enter page number');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $b2bProductTempTablePopulator = new B2BProductTempTablePopulator();

        $pageSize = 25000;
        $pageNumber = trim($input->getArgument('pageNumber'));

        if(is_numeric($pageNumber) && ($pageNumber > 0))
        {
            $provider = new B2BProductInitialLoadProvider();
            $allProductIds = $provider->getProductIdsForInitialLoad($pageSize, $pageNumber);

            $allProductIds = $b2bProductTempTablePopulator->filterIFSPTGProducts($allProductIds);

            $currTime = time();

            foreach($allProductIds as $id)
            {
                $record = new B2BPimFailureRecord();
                $record->setPimId($id)
                        ->setFailureMessage("initial load")
                        ->setSFObjectType(B2BSalesForceObjectType::PRODUCT())
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