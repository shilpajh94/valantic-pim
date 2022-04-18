<?php

namespace PimDataPostBundle\Command\InitialLoadCommand;

use Pimcore\Console\AbstractCommand;
use PimDataPostBundle\InitialDataLoad\B2BProductInitialLoadProvider;
use PimDataPostBundle\Lib\FailureNotificationSender\B2B\B2BFailureNotificationSender;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\PersistantModel\B2BEntityEnforcedToPush;
use PimDataPostBundle\Model\PersistantModel\B2BPimFailureRecord;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\StatusType;
use PimDataPostBundle\PimDataPoster\B2B\IFSPTG\B2BCategoryDataPoster;
use PimDataPostBundle\PimDataPoster\B2B\IFSPTG\B2BProductCategoryRelationDataPoster;
use PimDataPostBundle\PimDataPoster\B2B\IFSPTG\B2BProductDataPoster;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;



class B2BInitialLoadCommand extends AbstractCommand
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $provider = new B2BProductInitialLoadProvider();
        $allProductIds = $provider->getProductIdsForInitialLoad();
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

         echo "executed\n";
    }

}