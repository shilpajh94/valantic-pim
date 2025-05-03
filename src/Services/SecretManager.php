<?php

namespace App\Services;

use Aws\SecretsManager\SecretsManagerClient;
use Aws\Exception\AwsException;

class SecretManager

{
    private $client;
    private $secretId;

    public function __construct()

    {
        // Initialize AWS Secrets Manager client

        $this->secretId = 'pimcore-stage-secrets'; // this is the vault name that you have given in AWS Secret manager
        $this->client = new SecretsManagerClient([
            'version' => 'latest',
            'region' => 'eu-central-1'      // your aws region
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
            $secretArray = json_decode($result['SecretString']);
            foreach ($secretArray as $key => $value) {
                $_ENV[$key] = $value;
                putenv("$key" . '=' . $value);
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
        // List of exceptions that are handled in the same way
        $handledExceptions = [
            'DecryptionFailureException',
            'InternalServiceErrorException',
            'InvalidParameterException',
            'InvalidRequestException',
            'ResourceNotFoundException'
        ];

        // Check if the error type is in the list of handled exceptions
        if (in_array($error, $handledExceptions)) {
            // Throw the exception for centralized error handling
            // Please log errors according to the log path for the application
            throw $e;
        }
        // For unknown error types, also throw the exception for visibility
        throw $e;

    }
}
