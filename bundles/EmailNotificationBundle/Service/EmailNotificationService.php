<?php

namespace EmailNotificationBundle\Service;

/*
 * Email notifications service.
 */

use Pimcore\Mail;
use Pimcore\Model\Asset;
use Pimcore\Model\Document;

class EmailNotificationService {

    /**
     * Attachment assets object
     * @var object
     */
    protected $attachment = null;

    /**
     * @inheritDoc
     */
    public function __construct() {
    }

    /**
     * Send notifications email.
     * @param $emailParams array('toEmails' => '', 'subject' => '',
     * 'body' => '', 'attachment' => '', 'templateName' => '')
     * @return boolean
     */
    public function sendNotificationsEmail(array $emailParams) {
        
        try {
            $mail = new Mail();

            $templateName = $emailParams['templateName'];
            $emailDocument = Document::getByPath($templateName);
            
            foreach ($emailParams['toEmails'] as $key => $value) {
                $mail->addTo($key, $value);
            }

            foreach ($emailParams['ccEmails'] as $key => $value) {
                $mail->addCc($key, $value);
            }
            
            if(isset($emailParams['subject']) && !empty($emailParams['subject'])) {
                $mail->subject($emailParams['subject']);
            }
            $mail->setDocument($emailDocument);
            $mail->setParams($emailParams['dataParams']);
            
            // Send attachment.
            if (!empty($emailParams['attachment'])) {
                foreach ($emailParams['attachment'] as $attachment) {
                    $this->attachment = $this->createAttachmentAssetsObject($attachment);
                    $mail->createAttachment($this->attachment->getData(),
                        $this->attachment->getMimetype(), $this->attachment->getFilename());
                }
            }

            $mailSent = $mail->send();

            if ($mailSent) {
                $res = true;
            } else {
                $res = false;
            }
            return $res;
        } catch (\Exception $ex) {
            return false;
        }
    }

    /**
     * Create file asstes object which is used in email to get file properties.
     */
    protected function createAttachmentAssetsObject($filePath) {
        $fileName = basename($filePath);
        // Create an assets object only not save to get properties of file.
        $html = @file_get_contents($filePath);
        // Remove file after reading data.
        @unlink($filePath);
        $newAsset = new Asset();
        $newAsset->setFilename($fileName);
        $newAsset->setData($html);
        return $newAsset;
    }
    
}
