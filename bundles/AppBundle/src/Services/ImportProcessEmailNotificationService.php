<?php

namespace AppBundle\Services;

use AppBundle\Logger\AppLogger;

class ImportProcessEmailNotificationService
{
    const LOGGER_MODULE = 'Import_Process_Email_Notification';

    /**
     * Sends Import Process Failure Email
     *
     * @param string $msg Message which needs to be sent in the email.
     *
     * @throws \Exception If any exception is encountered while sending the email.
     * @author Animesh Chaturvedi
     * @return void
     */
    public function sendMailNotification($buType, $msg)
    {
        try {
            $params = [
                'message' => $msg,
                'env' => ucfirst(CUSTOM_ENV)
            ];
            if (str_contains($buType, 'PTGEU')) {
                $emailArray = [
                    // 'kenichi.ban@contitech.de',
                    // 'anthony.miller@contitech.de',
                    // 'max.oliver.umali@contitech.ph',
                    'rajesh.kumar4@happiestminds.com',
                    'gaurav.tyagi@happiestminds.com',
                    // 'amit.rajput@ptg.contitech.in'
                ];
            } else {
                $emailArray = [
                    // 'kenichi.ban@contitech.de',
                    // 'anthony.miller@contitech.de',
                    // 'max.oliver.umali@contitech.ph',
                    'rajesh.kumar4@happiestminds.com',
                    'gaurav.tyagi@happiestminds.com',
                ];
            }
            $mail = new \Pimcore\Mail();
            foreach ($emailArray as $email) {
                $mail->addto($email);
            }
            $mail->subject(ucfirst(CUSTOM_ENV) . " || " . $buType . " || Regular SAP File Data Import Process Failure");
            $mail->setDocument('/Email/Import Process Failure Email');
            $mail->setParams($params);
            $mail->setIgnoreDebugMode(true);
            $mail->send();
        } catch (\Exception $exception) {
            p_r($exception);
            AppLogger::log(self::LOGGER_MODULE)->error("Exception sending mail: " . $exception->getMessage());
        }
    }
}
