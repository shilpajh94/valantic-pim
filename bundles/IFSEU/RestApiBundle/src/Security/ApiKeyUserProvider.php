<?php
namespace IFSEU\RestApiBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Pimcore\Model\User as PimUser;
use Pimcore\Db;

class ApiKeyUserProvider implements UserProviderInterface
{
    private $db;

    public function getUsernameForApiKey($apiKey)
    {
        $this->db = Db::get();
        $sql = "Select user_id from user_api_key where api_key = '{$apiKey}'";
        return $this->db->fetchAllAssociative($sql);
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

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        return $identifier;
    }
}
