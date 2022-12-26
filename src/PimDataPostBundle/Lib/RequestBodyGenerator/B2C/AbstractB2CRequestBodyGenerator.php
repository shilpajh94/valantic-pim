<?php


namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2C;

use PimDataPostBundle\Lib\RequestBodyGenerator\IRequestBodyGenerator;

abstract class AbstractB2CRequestBodyGenerator implements IRequestBodyGenerator
{
    protected $allowedAttributeTypes;
    
    public abstract function generateRequestBody(array $tempTableData): array;

    public abstract function generateCreateRequestBody(array $tempTableData): array;

    public abstract function generateUpdateRequestBody(array $tempTableData): array;

    public abstract function generateDeleteRequestBody(array $tempTableData): array;
    
    /**
     * function to check if we need to send particular attribute to Sales force or not
     * @param type $config
     * @return boolean
     */
    protected function checkIfSendToSF($config) {
        if (!empty($config['sendToSF']) && !empty($config['sf_attribute_name'])) {
            return true;
        }
        return false;
    }
    
    /**
     * function if we need to further fetch value for particular attribute or current value will suffice based on attribute types
     * @param type $config
     * @return boolean
     */
    protected function checkIfTypeIsAllowed($config) {
        if (!empty($config['pim_attribute_type']) && in_array(strtolower($config['pim_attribute_type']), $this->allowedAttributeTypes)) {
            return true;
        }
        return false;
    }
}