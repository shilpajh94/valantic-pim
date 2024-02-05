<?php

namespace ADAuthBundle\EventListner;

use Pimcore\Tool;
use Pimcore\Model\User;
use Pimcore\Event\Admin\Login\LoginCredentialsEvent;
// use Pimcore\Event\Admin\Login\LoginFailedEvent;
//use Pimcore\Log\ApplicationLogger as Logger;
//use AppBundle\Logger\FBBLogger;
use AppBundle\Logger\LogLevel;
use AppBundle\Tool\Utils;

/**
 * Authenticate Listner for AD Implementation
 * Authorize user from LDAP
 *
 * @author BhupinderBisht
 */
class AuthenticateListner
{

    const DEFAULT_ROLE = "ReadOnly";
    const LOGGER_MODULE = 'AuthenticateListner';

    private $username;
    private $password;

    /**
     * default role id in string format.
     * @var string
     */
    private $default_role_id;

    public function __construct()
    {
        $logConfig = [
            'rotate_file' => TRUE,
            'max_files' => 10
        ];
        //$this->logger = FBBLogger::getMonoLogger('authenticate_listner.log', 'ERROR', $logConfig);
    }

    /**
     * Callback function for the hook - pimcore.admin.login.credentials.
     *
     * @param LoginCredentialsEvent $event
     */
    public function onLoginCredentials(LoginCredentialsEvent $event)
    {


        $credentials = $event->getCredentials();
        $this->username = $credentials['username'];
        $this->password = $credentials['password'];
        
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
            } else {
                $event->setCredentials(array());
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
     */
    private function createUser($obj, $userObj)
    {
        $roleObj = User\Role::getByName(self::DEFAULT_ROLE);

        $this->default_role_id = empty($roleObj) ? "" : (string) $roleObj->getId();

        $createUserData = array(
            "parentId" => 0,
            "username" => $this->username,
            "email" => $obj->getAttribute('mail')[0],
            "active" => true,
            "activePerspective" => "ReadOnly",
            "roles" => $this->default_role_id
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

                try {
                    $memberObj->save();
                } catch (\Exception $e) {
                }
            }
        }
    }
}
