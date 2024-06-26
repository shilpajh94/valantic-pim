<?php

namespace AppBundle\Services;

class ImportProcessEmailNotificationService
{
    const LOGGER_MODULE = 'Import_Process_Email_Notification';

    public function sendMailNotification($msg)
    {
        $params = ['message' => $msg];
        $emailArray = [
            'kenichi.ban@contitech.de',
            'anthony.miller@contitech.de',
            'max.oliver.umali@contitech.ph',
            'rajesh.kumar4@happiestminds.com',
            'gaurav.tyagi@happiestminds.com',
        ];
        $mail = new \Pimcore\Mail();
        foreach ($emailArray as $email) {
            $mail->addto($email);
        }
        $mail->subject("Regular Import Process Failure");
        $mail->setDocument('/Email/Import Process Failure Email');
        $mail->setParams($params);
        $mail->setIgnoreDebugMode(true);
        try {
            $mail->send();
        } catch (\Exception $exception) {
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->
                error("Exception sending mail: " . $exception->getMessage());
        }
    }
}
