<?php

namespace PimDataPostBundle\Command;

use Pimcore\Console\AbstractCommand;
use PimDataPostBundle\Lib\FailureNotificationSender\B2B\B2BFailureNotificationSender;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\PimDataPoster\B2B\IFSPTG\B2BCategoryDataPoster;
use PimDataPostBundle\PimDataPoster\B2B\IFSPTG\B2BProductCategoryRelationDataPoster;
use PimDataPostBundle\PimDataPoster\B2B\IFSPTG\B2BProductDataPoster;
use PimDataPostBundle\PimDataPoster\B2B\IFSPTG\B2BProductMediaPoster;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class PimDataPostCommand extends AbstractCommand
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $scriptStartTime = time();
        Util::setB2BScriptStartTime($scriptStartTime);
        p_r($scriptStartTime);

        $executor = new B2BProductDataPoster();
        $executor->postData();

        $executor = new B2BCategoryDataPoster();
        $executor->postData();

        $executor = new B2BProductCategoryRelationDataPoster();
        $executor->postData();

        $executor = new B2BProductMediaPoster();
        $executor->postData();

        $scriptEndTime = time();
        p_r("total time: " .( $scriptEndTime - $scriptStartTime ) . "s");

        $notificationSender = new B2BFailureNotificationSender();
        $notificationSender->SendFailureNotification();
        if(Util::isPIMFailureFlagSet()){
            $notificationSender->sendPIMFailureNotification();
        }

         echo "executed\n";
    }

}