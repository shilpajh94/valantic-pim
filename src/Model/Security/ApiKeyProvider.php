<?php
namespace App\Model\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Pimcore\Model\User as PimUser;
use Pimcore\Db;

/*
 @Author : Arun kumar
 This class is use to authenticate the Apikey
*/

class ApiKeyProvider implements UserProviderInterface
{
    private $db;

    Public function getUserForApiKey($apiKey)
    {
        $this->db = Db::get();
		$apiKey = $this->db->quote($apiKey);
        $sql = "Select user_id from user_api_key where api_key = $apiKey";
        return $this->db->fetchAllAssociative($sql);
    }
	
	Public function refreshUser(UserInterface $user)
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
    Public function loadUserByIdentifier(string $identifier): UserInterface{
        throw new UserNotFoundException();
    }

    Public function supportsClass($class)
    {
        return User::class === $class;
    }

}
