<?php


namespace ImportBundle\OneTimeImportCommand;


use AppBundle\Lib\UnitConversion\ConverterFactory;
use AppBundle\Lib\UnitConversion\Unit;
use AppBundle\Services\AppService;
use AppBundle\Services\UnitConverterService;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

/**
 * RUN : conti:onetimeimport:update_missed_unit_conversion_attributes
 *
 * Updating following attributes:
 * product class -> Weight_ g/m
 * product class -> Weight_ g/m
 * hose skeleton -> Working Pressure (BAR)
 * inh fitting fert -> Overall Length (mm)
 * inh fitting fert -> Maximum OD (mm)
 *
 * Class UpdateMissedUnitConversionAttributes
 * @package ImportBundle\OneTimeImportCommand
 */
class UpdateMissedUnitConversionAttributes extends AbstractCommand
{
    private $unitConverterService;
    private $appService;
    
    // const LOG_FILE_NAME = "update_missed_unit_conversion_attributes";
     const WEIGHT_LBS_LOG_FILE_NAME = "update_missed_unit_conversion_attributes_weightlbsperftuom";
    
    private $commands = array(
        "command1" => array(
            "logFile" => "update_missed_unit_conversion_attributes",
            "missedUnitConversion" => "missedUnitConversion"
        ),
        "command2" => array(
            "logFile" => "update_missed_unit_conversion_attributes_weightlbsperftuom",
            "missedUnitConversionLBS" => "missedUnitConversionLBS"
        )
    );

    const BATCH_SIZE = 10;

    public function __construct(UnitConverterService $unitConverterService,AppService $appService)
    {
        $this->unitConverterService = $unitConverterService;
        $this->appService = $appService;
        parent::__construct();
    }

    protected function configure()
    {
        $this->addArgument('identifier', InputArgument::REQUIRED, 'identifier for differentiate');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $identifier = $input->getArgument('identifier');
        foreach($this->commands as $command){
            if(array_key_exists($identifier, $command)) {
                echo "I am here";
            } else {
                echo "I am in else part";
            }
        }
        $scriptStartTime = time();
        // if(isset($weightlbsperftuom) && !empty($weightlbsperftuom)){
             $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . self::WEIGHT_LBS_LOG_FILE_NAME . ".csv";
        // } else {
        //     $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . self::LOG_FILE_NAME . ".csv";
        // }
        $productListing = new DataObject\Product\Listing();
        $productListing->setUnpublished(true);
        //$productListing->setCondition("o_id IN (1846678,1846680,1846682,1846684,1840172)");

        $productListing->setOrderKey("o_id");
        $productListing->setOrder("ASC");

        $totalCount = $productListing->getTotalCount();
        $noOfBatches = $totalCount / self::BATCH_SIZE;

        $offset = 0;
        $batchIndex = 1;
        while ($offset <= ( $totalCount - 1)) {
            $batchStartTime = time();
            $this->initializeChildProcess($offset,self::BATCH_SIZE,$csvLogFilePath);
            $offset = ($offset + self::BATCH_SIZE);
            $batchIndex++;
            $batchEndTime = time();

            $singlebatchSpentTime = $batchEndTime - $batchStartTime;

            $this->consoleLog("-------------------------------------------");
            $this->consoleLog("Processed Records: " . ($offset)  . "/" . $totalCount);
            $this->consoleLog("Time taken for this batch : " . ( $singlebatchSpentTime )/60 . " minutes" );
            $this->consoleLog("ETA : " . ( $noOfBatches * $singlebatchSpentTime )/60 . " minutes" );
            $this->consoleLog("-------------------------------------------");
//            \Pimcore::collectGarbage();
        }
        $scriptEndTime = time();
        $totalExecTime = ($scriptEndTime - $scriptStartTime) / 60 ;
        $this->consoleLog("Total Execution Time: " . $totalExecTime . " minutes" );

    }

    private function initializeChildProcess(int $offset,int $limit,string $logFile)
    {
        //if(isset($weightlbsperftuom) && !empty($weightlbsperftuom)) {
            $command = implode(' ',array(
                PIMCORE_PROJECT_ROOT."/bin/console ",
                "conti:onetimeimport:child_process_update_missed_unit_conversion_attributes_weightlbsperftuom",
                $offset,
                $limit,
                $logFile
            ));
        // } else {
        //     $command = implode(' ',array(
        //         PIMCORE_PROJECT_ROOT."/bin/console ",
        //         "conti:onetimeimport:child_process_update_missed_unit_conversion_attributes",
        //         $offset,
        //         $limit,
        //         $logFile
        //     ));
        // }

        $process = new Process($command);
        $process->setTimeout(1800);
        $process->run();

        $output = $process->getOutput();
        $errorOutput = $process->getErrorOutput();

        $this->consoleLog("[OUTPUT] :" . $output);
        $this->consoleLog("[ERROR OUTPUT] :" . $errorOutput);
    }


    private function consoleLog($message, $level = "INFO")
    {
        echo $message . PHP_EOL;
    }

}