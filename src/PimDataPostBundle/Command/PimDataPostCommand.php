<?php

namespace PimDataPostBundle\Command;

use Doctrine\ORM\Query\Expr\Func;
use Pimcore\Console\AbstractCommand;
use PimDataPostBundle\Lib\FailureNotificationSender\B2B\B2BFailureNotificationSender;
use PimDataPostBundle\Lib\FailureNotificationSender\B2C\B2CFailureNotificationSender;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Logger\B2BLogger;
use PimDataPostBundle\Model\PersistantModel\PimcoreDeletedAssets;
use PimDataPostBundle\PimDataPoster\B2B\IFSPTG\B2BCategoryDataPoster;
use PimDataPostBundle\PimDataPoster\B2B\IFSPTG\B2BProductCategoryRelationDataPoster;
use PimDataPostBundle\PimDataPoster\B2B\IFSPTG\B2BProductDataPoster;
use PimDataPostBundle\PimDataPoster\B2B\IFSPTG\B2BProductMediaPoster;
use PimDataPostBundle\PimDataPoster\B2C\IFSPTG\B2CCategoryDataPoster;
use PimDataPostBundle\PimDataPoster\B2C\IFSPTG\B2CProductCategoryRelationDataPoster;
use PimDataPostBundle\PimDataPoster\B2C\IFSPTG\B2CProductDataPoster;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class PimDataPostCommand extends AbstractCommand
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->postDataForB2BShop();
        $this->postDataForB2CShop();
      
        $this->removeEntriesFromPimDeletedAssets();

        if(Util::isPIMFailureFlagSet()){
            $notificationSender = new B2CFailureNotificationSender();
            try{
                $notificationSender->sendPIMFailureNotification();
            }catch(\Throwable $throwable){
                B2BLogger::getInstace()->error("Error sending PIM failure email notification:" . get_class($throwable) . " in PimDataPostCommand: " . $throwable->getMessage() .". StackTrace: " .$throwable->getTraceAsString());
            }
        }

         echo "executed\n";
    }

    private function postDataForB2BShop()
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
        try{
            $notificationSender->sendFailureNotification();
        }catch(\Throwable $throwable){
                B2BLogger::getInstace()->error("Error sending email notification:" . get_class($throwable) . " in PimDataPostCommand: " . $throwable->getMessage() .". StackTrace: " .$throwable->getTraceAsString());
                Util::setPIMFailureFlag();
        }
    }

    private function postDataForB2CShop()
    {
        $b2cscriptStartTime = time();
        Util::setB2CScriptStartTime($b2cscriptStartTime);
        p_r($b2cscriptStartTime);

        $executor = new B2CProductDataPoster();
        $executor->postData();

        $executor = new B2CCategoryDataPoster();
        $executor->postData();

        $executor = new B2CProductCategoryRelationDataPoster();
        $executor->postData();

        $scriptEndTime = time();
        p_r("total time: " .( $scriptEndTime - $b2cscriptStartTime ) . "s");


        $notificationSender = new B2CFailureNotificationSender();
        try{
            $notificationSender->sendFailureNotification();
        }catch(\Throwable $throwable){
                B2BLogger::getInstace()->error("Error sending email notification:" . get_class($throwable) . " in PimDataPostCommand: " . $throwable->getMessage() .". StackTrace: " .$throwable->getTraceAsString());
                Util::setPIMFailureFlag();
        }
    }


    private function removeEntriesFromPimDeletedAssets()
    {
        $list = new PimcoreDeletedAssets\Listing();
        foreach($list as $obj){
            $obj->delete();
        }
    }

}