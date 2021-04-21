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
    private $identifier;
    
    // Using an array to run the appropriate command
    // on the basis of argument passed by User
    private $commands = array(
        "missedUnitConversion" => array(
            "logFile" => "update_missed_unit_conversion_attributes",
            "command" => "conti:onetimeimport:child_process_update_missed_unit_conversion_attributes"
        ),
        "missedUnitConversionLBSPerFTUOM" => array(
            "logFile" => "update_missed_unit_conversion_attributes_weightlbsperftuom",
            "command" => "conti:onetimeimport:child_process_update_missed_unit_conversion_attributes_weightlbsperftuom"
        )
    );

    const BATCH_SIZE = 1000;

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
        $this->identifier = $input->getArgument('identifier');
        if(!array_key_exists($this->identifier, $this->commands)) {
            $this->consoleLog("Enter Required Parameter: i.e [missedUnitConversion or missedUnitConversionLBSPerFTUOM]");
            return;
        }
        
        $scriptStartTime = time();
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . $this->commands[$this->identifier]['logFile'] . ".csv";
        
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
        }
        $scriptEndTime = time();
        $totalExecTime = ($scriptEndTime - $scriptStartTime) / 60 ;
        $this->consoleLog("Total Execution Time: " . $totalExecTime . " minutes" );

    }

    private function initializeChildProcess(int $offset,int $limit,string $logFile)
    {
        $command = implode(' ',array(
            PIMCORE_PROJECT_ROOT."/bin/console ",
            $this->commands[$this->identifier]['command'],
            $offset,
            $limit,
            $logFile
        ));

        $process = new Process($command);
        $process->setTimeout(1800);
        $process->run();

        $output = $process->getOutput();
        $errorOutput = $process->getErrorOutput();

        $this->consoleLog("[OUTPUT] :" . $output);
        $this->consoleLog("[ERROR OUTPUT] :" . $errorOutput);
    }


    private function consoleLog($message)
    {
        echo $message . PHP_EOL;
    }

}