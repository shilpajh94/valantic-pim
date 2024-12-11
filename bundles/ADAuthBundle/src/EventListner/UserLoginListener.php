<?php

namespace ADAuthBundle\EventListner;

use Pimcore\Model\User;
use Pimcore\Model\User\Role;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use AppBundle\Logger\LogLevel;
use AppBundle\Tool\Utils;

class UserLoginListener implements EventSubscriberInterface
{
    const DEFAULT_ROLE = "ReadOnly";
    const LOGGER_MODULE = 'AuthenticateListner';

    private $username;
    private $password;

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
        $securityUser = $event->getAuthenticationToken()->getUser()->getUser();
        if (!$securityUser instanceof User) {
            return;
        }

        $this->username = $securityUser->getUsername();
        $this->password = $securityUser->getPassword();

        try {

            $userObj = User::getByName($this->username);

            if (!empty($userObj) && $userObj->isAdmin()) {
                return; // do default authentication for admin users
            }

            $objLdapAuth = new LdapAuthenticate();

            $retUser = $objLdapAuth->getLdapAuthenticate($this->username, $this->password);

            if (isset($retUser['success']) && 1 == $retUser['success']) {
                $obj = $retUser['data'][0];
                return $this->createUser($obj, $userObj);
            }

        } catch (\Exception $ex) {
            Utils::log('LDAP_AUTHENTICATE_LOG_FILE',$ex->getMessage(),Loglevel::ERROR());
        }
    }

    /**
     * Create User and assign NewUser dummy role and also create a member object
     *
     * @param LdapAuthenticate $obj
     * @param User $userObj
     * @return User
     */
    private function createUser($obj, $userObj)
    {
        $roleObj = User\Role::getByName(self::DEFAULT_ROLE);

        $this->defaultRoleId = empty($roleObj) ? "" : (string) $roleObj->getId();

        $createUserData = array(
            "parentId" => 0,
            "username" => $this->username,
            "email" => $obj->getAttribute('mail')[0],
            "active" => true,
            "activePerspective" => "ReadOnly",
            "roles" => $this->defaultRoleId
        );

        $updateUserData = array(
            'firstname' => !empty($obj->getAttribute('givenName')[0]) ? $obj->getAttribute('givenName')[0] : "",
            'lastname' => !empty($obj->getAttribute('sn')[0]) ? $obj->getAttribute('sn')[0] : "",
            "password" => Tool\Authentication::getPasswordHash($this->username, $this->password)
        );

        $createUserData = array_merge($createUserData, $updateUserData);

        if ($userObj) {
            $userObj->setValues($updateUserData);
            $userObj->update();
        } else {
            $userObj = User::create($createUserData);
        }

        $this->createMember($userObj, $roleObj);
        return $userObj;
    }

    /**
     * Create a member object against login user
     *
     * @param User $userObj
     * @param Role $roleObj
     */
    private function createMember($userObj, $roleObj)
    {
        if ($userObj) {
            $folderName = '/' . MEMBER;

            $class = "\\Pimcore\\Model\\DataObject\\Users";
            $memberObj = $class::getByAdminReference($userObj->getId(), ['limit' => 1, 'unpublished' => true]);
            if (empty($memberObj)) {
                $folderClass = "\\Pimcore\\Model\\DataObject";
                $folder = $folderClass::getByPath($folderName);

                $memberObj = new $class();
                $memberObj->setParentId($folder->getId());
                $memberObj->setKey($userObj->getName());
                $memberObj->setFirstname($userObj->getFirstname());
                $memberObj->setLastname($userObj->getLastname());
                $memberObj->setEmail($userObj->getEmail());
                $memberObj->setAdminReference($userObj->getId());
                $memberObj->setUserType([$roleObj->getId()]);
                $memberObj->setPublished(1);

                $memberObj->save();
            }
        }
    }
}
