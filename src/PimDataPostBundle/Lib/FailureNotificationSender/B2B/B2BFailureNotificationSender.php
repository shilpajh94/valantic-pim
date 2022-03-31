<?php

namespace PimDataPostBundle\Lib\FailureNotificationSender\B2B;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\FailureNotificationSender\B2B\B2BFailureNotificationSenderHelper;
use PimDataPostBundle\Lib\Util;

class B2BFailureNotificationSender extends AbstractB2BFailureNotificationSender
{
    private $helper;

    public function __construct()
    {
        $this->helper = new B2BFailureNotificationSenderHelper();
    }

    public function SendFailureNotification(): void 
    {
        
        $failedRecords = $this->helper->getSfFailureRecords();

        $fileName = "failed_log_".date("d")."_".time().".csv";
        $filePath = PIMCORE_TEMPORARY_DIRECTORY . "/" . $fileName;
        $sfFailureAssetFolder = Constants::FAILURE_LOG_ASSET_FOLDER."/".date("Y")."/".date("M");
        
        if(count($failedRecords)> 1)
        {
            $isFileCreated = Util::createFile($filePath, $failedRecords);

            if($isFileCreated)
            {
                $asset = Util::createAsset($fileName, $filePath, $sfFailureAssetFolder);
                
                if($asset)
                {
                    $id = $asset->getId();
                    $subType = $asset->getType();

                    $deepLink = $this->getDeepLink($id, 'asset', $subType);

                    $this->sendFailureCsvLinkEmail($deepLink);
                    Util::deleteFile($filePath);
                }
            }
        }
    }

    public function getDeepLink($id, $type, $subType)
    {
        $link = APPLICATION_HOST . "/admin/login/deeplink?";

        return $link."{$type}_{$id}_{$subType}";

    }
    
    public function sendFailureCsvLinkEmail($deepLink)
    {
        $userEmailIds = $this->helper->getUsersEmailByRolesNameList();

        $link = "<a href='".$deepLink."' target='_blank'>".$deepLink."</a>";
        $params = ['file_url' => $link];
        
        $mail = new \Pimcore\Mail();

        foreach ($userEmailIds as $email) {
            $mail->addTo($email);
        }

        $mail->setSubject(Constants::FAILURE_TEMPLATE_SUBJECT_NAME);
        $mail->setDocument(Constants::FAILURE_TEMPLATE_NAME);
        $mail->setParams($params);
        $mail->send();
    }
}
