<?php
namespace SSOIntegrationBundle\Service;

use SAML2\Response as SAMLResponse;
use SAML2\Binding;

class ResponseService
{
    private $response;
    
    /**
     * Receives the response from the identity provider
     * 
     * @throws \Exception
     */
    public function recieve()
    {
        $b = Binding::getCurrentBinding();
        $response = $b->receive();
        if(!$response instanceof SAMLResponse || !$response->isSuccess()){
            throw new \Exception('Not a valid SAML Response');
        }
        
        $this->response = $response;
    }
    
    /**
     * Parses the response and Returns the attributes from the response
     * 
     * @return array $attributeData
     * @throws \Exception
     */
    public function getAttributes()
    {
        if(!$this->response) {
            throw new \Exception('Empty SAML response');
        }
        
        $assertion = $this->getAssertion();
        $attributes = $assertion->getAttributes();
        
        $attributeData = [];
        foreach ($attributes as $key => $attribute) {
            $attributeKey = strrchr($key, '/') ? substr(strrchr($key, '/'), 1) : $key;
            if(count($attribute) ==  1) {
                $attributeData[$attributeKey] = $attribute[0]; 
                continue;
            }
            
            $attributeData[$attributeKey] = $attribute; 
        }
        return $attributeData;
    }
    
    /**
     * Return the first entry from the $assertions array
     * 
     * @return array 
     */
    public function getAssertion()
    {
        $assertions = $this->response->getAssertions();
        return array_pop($assertions);
    }
}
