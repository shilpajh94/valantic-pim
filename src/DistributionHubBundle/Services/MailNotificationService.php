<?php

namespace DistributionHubBundle\Services;

use Pimcore\Mail;
use Pimcore\Model\User;
use Pimcore\Tool;

use DistributionHubBundle\Lib\Constants;
use DistributionHubBundle\Model\Channel;
use DistributionHubBundle\Model\Schedule;

class MailNotificationService
{
    private $mailContent;

    const BODY_KEY = 'body';
    const SUBJECT_KEY = 'subject';

    public function __construct(BundleService $bundleService)
    {
        $mailConfig = $bundleService->getConfigFromYmlFile(Constants::MAIL_CONFIG_FILE);
        $this->mailContent = $mailConfig['mail_content'];
    }

    public function sendNotification(Schedule $schedule,Channel $channel, string $status)
    {
        $userOwnerId = $schedule->getUserOwner();
        $user = User::getById($userOwnerId);
        $userMail = $user->getEmail();
        $username = $user->getName();

        if(!Mail::isValidEmailAddress($userMail)){
            throw new \Exception("Email address '$userMail' of user '$username' is not valid.");
        }

        $userLang = $user->getLanguage();

        $subject = $this->getMailSubject($status, $userLang);
        $body = $this->getMailBody($status, $userLang);

        $placeHolderReplacedSubject = $this->replacePlaceHoldersInItem($schedule, $channel, $user, $subject);
        $placeHolderReplacedBody = $this->replacePlaceHoldersInItem($schedule, $channel, $user, $body);

        $mailClient = new Mail();
        $mailClient->setTo($userMail);
        $mailClient->setSubject($placeHolderReplacedSubject);
        $mailClient->setBodyText($placeHolderReplacedBody);
        try{
            $mailClient->send();
        }catch (\Exception $exception){
            $msg = "Mail could not be sent. Exception msg:".$exception->getMessage();
            throw new \Exception($msg);
        }

    }

    public function replacePlaceHoldersInItem(Schedule $schedule, Channel $channel,User $user, string $item)
    {
        $placeHolderArray = $this->getPlaceHolderArray($schedule, $channel, $user);
        return strtr($item, $placeHolderArray);
    }

    public function getPlaceHolderArray(Schedule $schedule, Channel $channel, User $user)
    {
        $userName = empty($user->getFirstname()) ? $user->getName() : $user->getFirstname() ;

        return [
            '[SCHEDULE_NAME]' => $schedule->getName(),
            '[CHANNEL_NAME]' => $channel->getName(),
            '[USER_NAME]' => $userName
        ];
    }

    public function getMailSubject(string $status, string $lang): string
    {
        return $this->getMailItem($status, $lang, self::SUBJECT_KEY);
    }

    public function getMailBody(string $status, string $lang): string
    {
        return $this->getMailItem($status, $lang, self::BODY_KEY);
    }

    private function getMailItem(string $status, string $lang, string $item): string
    {
        $lang = $this->getAvailableContentLanguage($lang);
        $returnValue = '';
        if(array_key_exists($lang, $this->mailContent)){
            $langMailConfig = $this->mailContent[$lang];
            if(array_key_exists($status, $langMailConfig)){
                $statusMailConfig = $langMailConfig[$status];
                $returnValue = $statusMailConfig[$item];
            }
        }
        return $returnValue;
    }

    private function getAvailableContentLanguage(string $userLang)
    {
        $lang = $userLang;
        if(!array_key_exists($lang, $this->mailContent)){
            $lang = Tool::getDefaultLanguage();
            if(!array_key_exists($lang, $this->mailContent)){
                $lang = array_keys($this->mailContent)[0];
            }
        }
        return $lang;
    }

}
