<?php


namespace AppBundle\Command;


use Aws\Lambda\LambdaClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command to invoke lambda function manually
 * This will invoke the lambda function for all the s3_path (not for folders) in "pimcore_s3_path_mapping" table
 *
 * Class InvokeLambdaCommand
 * @package AppBundle\Command
 */
class InvokeLambdaCommand extends Command
{
    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this->setName('contitech:invoke_aws_lambda')
            ->setDescription('Invoke AWS Lambda for objects in s3 bucket');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $result = $this->getS3EntriesForLambda();

        $csvLogFilePath = PIMCORE_LOG_DIRECTORY."/"."invoke_lambda_" . time() .".csv";
        $csvLogFileHandle = fopen($csvLogFilePath,"w");
        $this->csvLog($csvLogFileHandle, array(
            "id",
            "pim_path",
            "s3_path",
            "key",
            "function_error",
            "log_result",
            "status_code",
            "payload_errorType",
            "payload_errorMsg",
            "complete_response"
        ));

        $total = count($result);
        $count = 0;
        $failCount = 0;
        foreach($result as $row){

            $id = $row['pimcore_object_id'];
            $pimPath = $row['pimcore_path'];
            $s3Path = $row['s3_path'];
            $s3Key =  "assets" . $s3Path;

            echo "Starting for " . $s3Key . PHP_EOL;

            $functionError = "";
            $logResult = "";
            $statusCode = "";
            $lambdaCompleteResponse = "";
            $payloadErrorType = "";
            $payloadErrorMsg = "";

            $s3ProtocolPath = "s3://".S3_BUCKET . "/assets" . $s3Path;

            $lambdaResult = $this->invokeLambdaAndGetResponse($s3Key);
            
            $responsePayload = $lambdaResult->get("Payload")->getContents();
            $responsePayload = json_decode($responsePayload,true);
            if( is_array($responsePayload) && array_key_exists("errorType", $responsePayload)){
                $payloadErrorType = $responsePayload["errorType"]; 
                $payloadErrorMsg = $responsePayload["errorMessage"];
                $failCount++;
            }
            
            $functionError = $lambdaResult->get("FunctionError");
            $logResult = $lambdaResult->get("LogResult");
            $statusCode = $lambdaResult->get("StatusCode");

            $lambdaCompleteResponse = strval($lambdaResult);

            $this->csvLog($csvLogFileHandle, array(
                $id,
                $pimPath,
                $s3Path,
                $s3Key,
                $functionError,
                $logResult,
                $statusCode,
                $payloadErrorType,
                $payloadErrorMsg,
                $lambdaCompleteResponse
                ) );

            $count++;

            echo "Lambda Status[". $statusCode ."] [". $s3Key ."]" . "[" .$payloadErrorType. "]" .PHP_EOL.PHP_EOL;

            if($count % 20 == 0){
                echo "---------------------------";
                echo $count ." / " . $total . " (not found: $failCount)" . PHP_EOL;
                echo "---------------------------";
            }
        }
        fclose($csvLogFileHandle);
    }

    private function invokeLambdaAndGetResponse(string $s3Key)
    {

        $lambdaClient = $this->getLambdaClient();

        $payload = json_encode([
            "Records" => [
                [
                    "s3" => [
                        "object" => [
                            "key" => $s3Key
                        ],
                        "bucket" => [
                            "name" => S3_BUCKET
                        ]
                    ]
                ]
            ]
        ]);

        return $lambdaClient->invoke([
            "FunctionName" => IMAGE_TRANSFORMATION_LAMBDA_FUNCTION_NAME,
            "Payload" => $payload
        ]);
    }

    /**
     * get the csv entries for which the lambda function is to run
     *
     * @param string $filePath
     * @return array
     */
    private function getS3EntriesForLambda()
    {
        $db = \Pimcore\Db::get();

        $query = "select * from pimcore_s3_path_mapping";
        $query .= " join assets";
        $query .= " on pimcore_s3_path_mapping.pimcore_object_id = assets.id";
        $query .= " where type = 'image'";

        $result = $db->fetchAllAssociative($query);

        /*
        $result = [
            [
                "pimcore_object_id" => 10816,
                "pimcore_path" => "/Test Folder/lambda_test_folder/sql_joins3.png",
                "s3_path" => "/CatalogImages/HYD/Footer/Continental_Logo_Master_Black.png"
            ],
            [
                "pimcore_object_id" => 10817,
                "pimcore_path" => "/Test Folder/lambda_test_folder/test_image.png",
                "s3_path" => "/CatalogImages/HYD/Footer/Continental_Logo_Master_yellow.png"
            ]
        ];
        */
        return $result;
    }

    private function csvLog($logHandler,array $dataRow)
    {
        $csvDelimiter = ",";
        fputcsv($logHandler,$dataRow,$csvDelimiter);
    }

    private function getLambdaClient()
    {
        $s3ConfigSettings = [];
        if (CUSTOM_ENV == "stage" || CUSTOM_ENV == "prod"){

            $s3ConfigSettings = [
                'version' => 'latest',
                'region' => IMAGE_TRANSFORMATION_LAMBDA_FUNCTION_REGION,
            ];

        }elseif (CUSTOM_ENV == "dev" || CUSTOM_ENV == "qc"){

            $s3ConfigSettings = [
                'version' => 'latest',
                'region' => IMAGE_TRANSFORMATION_LAMBDA_FUNCTION_REGION,
                'credentials' => [
                    'key' => S3_KEY,
                    'secret' => S3_SECRET
                ],
            ];
        }

        return new LambdaClient($s3ConfigSettings);
    }
}
