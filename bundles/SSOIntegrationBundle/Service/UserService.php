<?php

namespace SSOIntegrationBundle\Service;

use Pimcore\Model\User;
use Pimcore\Bundle\AdminBundle\Security\User\TokenStorageUserResolver;
use Pimcore\Tool\Authentication;
use Pimcore\Model\User\Role;
use Pimcore\Model\DataObject;


class UserService
{
    const DEFAULT_ROLE = "ReadOnly";
    private $defaultRoleId;
    private $spConfig;

    /**
     * @param array $spConfig
     */
    public function __construct(array $spConfig)
    {
        $this->spConfig = $spConfig;
    }

    /**
     * @param $username
     * @param $userData
     * @return User\AbstractUser
     * @throws \Exception
     */
    public function save($username, $userData): User
    {
        // get role by groups
        $defaultRole = $_ENV['DEFAULT_ROLE'];
        $role = Role::getByName($defaultRole);
        $hash = Authentication::getPasswordHash($username, $this->randomPassword(10));
        $user = User::create([
            'firstname' => $userData['firstname'],
            'lastname' => $userData['lastname'],
            'email' => $userData['email'],
            'parentId' => intval($userData['parentId']),
            'name' => trim($userData['name']),
            'password' => $hash,
            'active' => true,

        ]);
        
        if ($role) {
            $roleId = $role->getId();
            // set role id or admin access
            $user->setRoles([$roleId]);
        } else {
            $user->setAdmin(true);
        }

        $user->setWelcomeScreen(true);
        $user->setMemorizeTabs(true);
        $user->setCloseWarning(true);
        $user->save();
        return $user;
    }

    /**
     * @param User\AbstractUser $user
     * @param array $userData
     * @return User\AbstractUser
     * @throws \Exception
     */
    public function update(User\AbstractUser $user, array $userData): User
    {
        // get role by website setting
        $defaultRole = $_ENV['DEFAULT_ROLE'];
        $role = Role::getByName($defaultRole);
        $userRoles = $user->getRoles();
        $user->setValues($userData);
        if (empty($user->getPassword())) {
            $user->setPassword(Authentication::getPasswordHash($user->getName(), $this->randomPassword(10)));
        }

        if (empty($userRoles)) {
            // set role id or admin access
            if ($role) {
                $roleId = $role->getId();
                // set role id or default role access
                $user->setRoles([$roleId]);
            } else {
                $user->setAdmin(true);
            }
        }
        return $user->save();
    }

    /**
     * Returns the admin user from PIMCORE
     *
     * @return User
     */
    protected function getAdminUser()
    {
        $resolver = \Pimcore::getContainer()->get(TokenStorageUserResolver::class);
        return $resolver->getUser();
    }

    /**
     * Get the user from PIMCORE
     *
     * @param string $username
     * @return User\AbstractUser
     */
    public function getUserByUsername(string $username)
    {
        return User::getByName($username);
    }

    /**
     * @param int $length
     * @return bool|string
     */
    private function randomPassword($length = 10)
    {
        $length = ($length) ? ($length) : (10);
        $string = "abcdefghijklmnopqrstuvwxyz"; //to upper
        $numeric = '0123456789';
        $punctuation = '!@#$%^&*()_+~`|}{[]\:;?><,./-=';
        $pwod = "";
        $character = "";
        while (strlen($pwod) < $length) {
            $entity1 = ceil(strlen($string) * ((float)rand() / (float)getrandmax()));
            $entity2 = ceil(strlen($numeric) * ((float)rand() / (float)getrandmax()));
            $entity3 = ceil(strlen($punctuation) * ((float)rand() / (float)getrandmax()));
            $hold = substr($string, $entity1);
            $hold = ($entity1 % 2 == 0) ? (strtoupper($hold)) : ($hold);
            $character .= $hold;
            $character .= substr($numeric, $entity2);
            $character .= substr($punctuation, $entity3);
            $pwod = $character;
        }
        return $pwod;
    }

    public function userObjsave($username, $userData){
        
        // Give user ReadOnly Role by default
        $roleObj = User\Role::getByName(self::DEFAULT_ROLE);
        $this->defaultRoleId = empty($roleObj) ? "" : (string) $roleObj->getId();

        
        $userObj = DataObject\Users::getByPath('/Users/'.$username);

            // Create Users object if not already created
            if(!$userObj){
                $memberObj = new DataObject\Users();
                $memberObj->setParentId(6);
                $memberObj->setKey($username);
                $memberObj->setFirstname($userData['firstname']);
                $memberObj->setLastname($userData['lastname']);
                $memberObj->setEmail($userData['email']);
                $memberObj->setUserType([$roleObj->getId()]);
                $memberObj->setPublished(1);
                $memberObj->save();
            }
    }
}
