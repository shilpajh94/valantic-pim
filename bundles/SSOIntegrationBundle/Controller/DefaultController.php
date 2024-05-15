<?php

namespace SSOIntegrationBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\User\AbstractUser;
use SSOIntegrationBundle\Service\RequestService;
use Pimcore\Tool\Authentication;
use SAML2\Compat\ContainerSingleton;
use SSOIntegrationBundle\Service\RequestService as SAMLRequest;
use SSOIntegrationBundle\Service\ResponseService as SAMLResponse;
use SSOIntegrationBundle\Service\UserService;
use SSOIntegrationBundle\Service\ContainerService;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @Route("saml/")
 */
class DefaultController extends FrontendController
{
    protected $container;

    public function __construct(ContainerService $container)
    {
        ContainerSingleton::setContainer($container);
    }

    /**
     * Makes the request and send to the identity provider
     *
     * @Route("login", name="saml_login")
     * @Route("login/", name="saml_login_fallback")
     *
     * @param RequestService $SAMLRequest
     */
    public function indexAction(SAMLRequest $SAMLRequest)
    {
        
        $SAMLRequest->make();
        $SAMLRequest->send();
        
    }

    /**
     * Handles the response from identity provider
     * and Redirect to the PIMCORE login
     *
     * @Route("sso")
     * @Route("sso/")
     *
     * @param UserService $userService
     * @param SAMLResponse $SAMLResponse
     * @return string Returns a RedirectResponse to the pimcore_admin_login_check.
     */
    public function ssoAction(UserService $userService, SAMLResponse $SAMLResponse)
    {
        try {
            $loginUrl = $this->generateUrl('pimcore_admin_login_check');

            $SAMLResponse->recieve();
            $attributeData = $SAMLResponse->getAttributes();
            $email = trim($attributeData['name']);
            $username = (isset((explode('@',$email))[0])? (explode('@',$email))[0]:$email);
            $user = $userService->getUserByUsername($username);

            $userData = [
                'firstname' => $attributeData['givenname'],
                'lastname' => $attributeData['surname'],
                'email' => $email,
                'name'=>$username
            ];

            if (!$user instanceof AbstractUser) {
                $userData['parentId'] = 0;
                $userData['active'] = true;
                $user = $userService->save($username, $userData);
            } else if ($user instanceof AbstractUser && $user->getName() == $userData['name']) {
                $user = $userService->update($user, $userData);
            }

            $token = Authentication::generateToken($user->getName());
            $loginUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/admin/login/login?username=' . $username . '&token=' . $token;
            
            
        } catch (\Exception $exception) {
            
            $exception->getMessage();
        }
        ?>
            <script language="javascript">window.location.href="<?php echo $loginUrl; ?>"</script>
        <?php
       
        // return $this->redirect($loginUrl);
    }
}
