<?php

namespace ADAuthBundle\EventListner;

use Pimcore\Model\User;
use Pimcore\Model\User\Role;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use AppBundle\Logger\LogLevel;
use AppBundle\Tool\Utils;
use Pimcore\Model\DataObject;


class UserLoginListener implements EventSubscriberInterface
{
    const DEFAULT_ROLE = "ReadOnly";
    const LOGGER_MODULE = 'AuthenticateListner';

    private $username;

    /**
     * default role id in string format.
     * @var string
     */
    private $defaultRoleId;

    public static function getSubscribedEvents(): array
    {
        return [
            InteractiveLoginEvent::class => 'onUserLogin',
        ];
    }

    public function onUserLogin(InteractiveLoginEvent $event)
    {
        // Check if user is authenticated user or not
        $securityUser = $event->getAuthenticationToken()->getUser()->getUser();
        if (!$securityUser instanceof User) {
            return;
        }

        $this->username = $securityUser->getUsername();
        try {

            $user = User::getByName($this->username);

            // Give user ReadOnly Role by default
            $roleObj = User\Role::getByName(self::DEFAULT_ROLE);
            $this->defaultRoleId = empty($roleObj) ? "" : (string) $roleObj->getId();

            if (!empty($user) && $user->isAdmin()) {
                return; // do default authentication for admin users
            }
            $userObj = DataObject\Users::getByPath('/Users/'.$this->username);

            // Create Users object if not already created
            if(!$userObj){
                $memberObj = new DataObject\Users();
                $memberObj->setParentId(6);
                $memberObj->setKey($user->getName());
                $memberObj->setFirstname($user->getFirstname());
                $memberObj->setLastname($user->getLastname());
                $memberObj->setEmail($user->getEmail());
                $memberObj->setUserType([$roleObj->getId()]);
                $memberObj->setPublished(1);
                $memberObj->save();
            }
        } catch (\Exception $ex) {
            Utils::log('AUTHENTICATE_LOG_FILE',$ex->getMessage(),Loglevel::ERROR());
        }
    }
}
