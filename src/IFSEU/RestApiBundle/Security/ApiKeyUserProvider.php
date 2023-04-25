<?php
namespace IFSEU\RestApiBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Pimcore\Model\User as PimUser;
//use Pimcore\Model\DataObject\Widgets;

class ApiKeyUserProvider implements UserProviderInterface
{
    public function getUsernameForApiKey($apiKey)
    {
        $usersObj = new PimUser\Listing();
        $usersObj->setCondition('apiKey="'. $apiKey . '"');
        $users = $usersObj->load();
        $username = '';
        if ($users) {
            $username = $users[0]->getName();
        }
        return $username;
    }

    public function loadUserByUsername($username)
    {
        return new User(
            $username,
            null,
            ['ROLE_API']
        );
    }

    public function refreshUser(UserInterface $user)
    {
        throw new UnsupportedUserException();
    }

    public function supportsClass($class)
    {
        return User::class === $class;
    }
}
