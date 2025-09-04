<?php
namespace App\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Pimcore\Model\User as PimUser;
use Pimcore\Db;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;

class ApiKeyProvider implements UserProviderInterface
{
    private $db;

    public function getUserForApiKey($apiKey)
    {
        $this->db = Db::get();
        $sql = "Select user_id from user_api_key where api_key = '{$apiKey}'";
        return $this->db->fetchAllAssociative($sql);
    }

    public function refreshUser(UserInterface $user)
    {
        throw new UnsupportedUserException();
    }

    /**
     * Loads the user for the given user identifier (e.g. username or email).
     *
     * This method must throw UserNotFoundException if the user is not found.
     *
     * @return TUser
     *
     * @throws UserNotFoundException
     */
    public function loadUserByIdentifier(string $identifier): UserInterface{
        throw new UserNotFoundException();
    }

    public function supportsClass($class)
    {
        return User::class === $class;
    }
}
