<?php
namespace RestApiBundle\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\SimplePreAuthenticatorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Authentication\Token\PreAuthenticatedToken;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use RestApiBundle\RestTrait\RestResponce;

class ApiKeyAuthenticator implements SimplePreAuthenticatorInterface, AuthenticationFailureHandlerInterface
{
    use RestResponce;
    public function createToken(Request $request, $providerKey)
    {
        $apiKey = $request->headers->get('x-api-key');
        if (!$apiKey) {
            throw new BadCredentialsException('MissingApiKey');
        }

        return new PreAuthenticatedToken(
            'annon.',
            $apiKey,
            $providerKey
        );
    }

    public function supportsToken(TokenInterface $token, $providerKey)
    {
        return $token instanceof PreAuthenticatedToken &&
            $token->getProviderKey();
    }

    public function authenticateToken(TokenInterface $token, UserProviderInterface $userProvider, $providerKey)
    {
        if(!$userProvider instanceof ApiKeyUserProvider) {
            throw new \InvalidArgumentException(
                sprintf(
                    'The user provider must be an instance of ApiKeyUserProvider (%s was given).',
                    get_class($userProvider)
                )
            );
        }

        $apiKey = $token->getCredentials();
        $username = $userProvider->getUsernameForApiKey($apiKey);

        if (!$username) {
            throw new CustomUserMessageAuthenticationException(
                'InvalidApiKey'
            );
        }

        $user = $userProvider->loadUserByUsername($username);

        return new PreAuthenticatedToken(
            $user,
            $apiKey,
            $providerKey,
            $user->getRoles()
        );
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $method = $request->getMethod();
        if($method =='OPTIONS') {
            return new Response();
        }

        $exMsg = $exception->getMessage();
        return $this->jsonResponce($this->responseCode($exMsg, $exMsg), 403);
    }
}

