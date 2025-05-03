<?php

namespace App\Services;

require '/var/www/html/vendor/autoload.php';

use Aws\SecretsManager\SecretsManagerClient;
use Aws\Exception\AwsException;

class SecretManager
{
    private $client;
    private $secretId;

    public function __construct()
    {
        
        $this->secretId = 'pimcore-prod-secrets';
        $this->client = new SecretsManagerClient([
            'version' => 'latest',
            'region' => 'eu-central-1'
        ]);
    }

    /**
     * Retrieve database credentials from AWS Secrets Manager
     */
    public function retrieveSecret()
    {
        try {
            // Retrieve secret value from AWS Secrets Manager
            $result = $this->client->getSecretValue([
                'SecretId' => $this->secretId,
            ]);

            // Extract credentials from secret value
            $secretArray = json_decode($result['SecretString'], true);
            foreach ($secretArray as $key => $value) {
                putenv($key . '=' . $value);
            }
        } catch (AwsException $e) {
            // Handle AWS exceptions
            $this->handleAwsException($e);
        }
    }

    /**
     * Handle AWS exceptions
     *
     * @param AwsException $e The AWS exception to handle
     * @throws AwsException If the exception cannot be handled
     */
    private function handleAwsException(AwsException $e)
    {
        $error = $e->getAwsErrorCode();
        // Handle different types of AWS exceptions
        switch ($error) {
            case 'DecryptionFailureException':
            case 'InternalServiceErrorException':
            case 'InvalidParameterException':
            case 'InvalidRequestException':
            case 'ResourceNotFoundException':
                // Throw the exception for centralized error handling
                throw $e;
                break;
            default:
                // Unknown error types should also be thrown for visibility
                throw $e;
                break;
        }
    }
}
