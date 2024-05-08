<?php

namespace SSOIntegrationBundle\Service;

use SAML2\{AuthnRequest, Constants, Binding};
use SAML2\Compat\ContainerSingleton;
use SAML2\XML\saml\Issuer;
use Symfony\Component\Config\Util\XmlUtils;
use SAML2\HTTPRedirect as redirect;

class RequestService
{
    private $request;

    private $container;

    private $spConfig;

    private $idpConfig;

    /**
     * @param array $spConfig
     * @param array $idpConfig
     */
    public function __construct(array $spConfig, array $idpConfig)
    {
        $this->request = new AuthnRequest();
        $this->spConfig = $spConfig;
        $this->idpConfig = $idpConfig;
        $this->container = ContainerSingleton::getInstance();
    }

    /**
     * Makes the Request for the identity provider
     */
    public function make()
    {
        $issuer = null;
        $issuer = new Issuer($issuer);
        $issuer->setValue($this->spConfig['replyURL']);
        //$this->request->setNameIdPolicy($this->getPolicy());
        $this->request->setForceAuthn(false);
        $this->request->setIsPassive(false);
        $this->request->setProtocolBinding(Constants::BINDING_HTTP_POST);
        //$this->request->setIssuer($this->spConfig['entityID']);
        $this->request->setIssuer($issuer);
        $this->request->setAssertionConsumerServiceIndex(null);
        $this->request->setAttributeConsumingServiceIndex(null);
        $this->request->setAssertionConsumerServiceURL($this->spConfig['replyURL']);
        $this->request->setRelayState($this->spConfig['replyURL']);
        $this->request->setIDPList([]);
        $this->request->setRequesterID([]);
        $this->request->setId($this->container->generateId());
        $this->request->setDestination($this->getDestinationURL());
        
    }

    /**
     * Send the request to identity provider
     * 
     * @throws \Exception
     */
    public function send()
    { 
        if (!$this->request) {
            throw new \Exception('Empty request for saml');
        }

        // $binding = Binding::getBinding(Constants::BINDING_HTTP_REDIRECT);
        // $this->container->debugMessage($this->request->toSignedXML(), 'out');
        // $binding->send($this->request);

        $binding = new redirect();
        $url = $binding->getRedirectURL($this->request);
        ?>
            <script language="javascript">window.location.href="<?php echo $url; ?>"</script>
        <?php
    }

    /**
     * Get the policy from the service provider config
     * 
     * @return array
     */
    private function getPolicy(): array
    {
        return [
            'Format' => $this->spConfig['NameIDFormat'],
            'AllowCreate' => true
        ];
    }

    /**
     * Returns the destination url
     * 
     * @return string
     * @throws \Exception
     */
    private function getDestinationURL(): string
    {
        $services = $this->idpConfig['IDPSSODescriptor']['SingleSignOnService'];
        foreach ($services as $service) {
            if ($service['Binding'] === Constants::BINDING_HTTP_POST) {
                return $service['Location'];
            }
        }

        throw new \Exception('No destination URL is set');
    }
}
