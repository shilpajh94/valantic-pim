<?php


namespace ImportBundle\OneTimeImportCommand;


use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Product;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command to import SynchronousDataUpdatePIM.xlsx file
 * shared by client to correct the wrongly mapped data
 * for datum length and pitch length and pitch
 *
 * Class ImportPTGSynchronousCorrectedDataCommand
 * @package ImportBundle\OneTimeImportCommand
 */
class ImportPTGSynchronousCorrectedDataCommand extends AbstractCommand
{
    const LOG_FILE_NAME = "import_ptg_synchronous_corrected_data";

    protected function configure()
    {
        $this->setName('onetime-import:import_ptg_synchronous_corrected_data')
            ->setDescription('Command to associate category and subcategory on the product using the brand name')
            ->addArgument('import_file', InputArgument::REQUIRED, 'Input file path');

    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $importFilePath = $input->getArgument('import_file');
        if (!file_exists($importFilePath)) {
            echo "Import file path '" . $importFilePath . "' not found." . PHP_EOL;
            return;
        }

        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . self::LOG_FILE_NAME . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w");
        $this->csvLog($csvLogFileHandle, array(
            "Import Sheet Row Number",
            "Import Status",
            "Comment",
            "Failure Message"
        ));

        $firstDataRow = 5;
        $currentRow = 0;
        if (($handle = fopen($importFilePath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                $currentRow++;
                $importStatus = "";
                $importComment = "";
                $importFailureMsg = "";

                if($currentRow < $firstDataRow){
                    continue;
                }
                $sapCode = $data[0];
                $pitchIN = $data[4]; // SynchronousFert pitchIN
                $pitchMM = $data[5]; // SynchronousFert pitchMM
                $widthIN = $data[6]; // PTGFert widthIn
                $widthMM = $data[7]; // PTGFert widthmm
                $pitchLengthIN = $data[8]; // SynchronousFert pitchLengthIN
                $pitchLengthMM = $data[9]; // SynchronousFert pitchLengthMM
                $datumLengthIN = $data[10]; // BeltsFert datumLengthIn
                $datumLengthMM = $data[11]; // BeltsFert datumLengtMM

                $product = Product::getByArticleNumber($sapCode,1);
                if($product !== null){

                    $productFertData = $product->getFert();

                    $syncFert = $productFertData->getSynchronousFert();
                    if(!$syncFert){
                        $syncFert = new DataObject\Objectbrick\Data\SynchronousFert($product);
                        $productFertData->setSynchronousFert($syncFert);
                        $importComment .= "SynchronousFert was added.";
                    }
                    $syncFert->setPitchIN($this->getCleanedNumericData($pitchIN));
                    $syncFert->setPitchMM($this->getCleanedNumericData($pitchMM));
                    $syncFert->setPitchLengthIN($this->getCleanedNumericData($pitchLengthIN));
                    $syncFert->setPitchLengthMM($this->getCleanedNumericData($pitchLengthMM));

                    $ptgFert = $productFertData->getPTGFert();
                    if(!$ptgFert){
                        $ptgFert = new DataObject\Objectbrick\Data\PTGFert($product);
                        $productFertData->setPTGFert($ptgFert);
                        $importComment .= "PTGFert was added.";
                    }
                    $ptgFert->setWidthIn($this->getCleanedNumericData($widthIN));
                    $ptgFert->setWidthmm($this->getCleanedNumericData($widthMM));

                    if($beltsFert = $productFertData->getBeltsFert()){
                        $beltsFert->setDatumLengthIn($this->getCleanedNumericData($datumLengthIN));
                        $beltsFert->setDatumLengtMM($this->getCleanedNumericData($datumLengthMM));
                    }

                    try {
                        $product->save();
                        $importStatus = "SUCCESS";
                    }catch (\Exception $exception){
                        $importStatus = "FAILURE";
                        $importFailureMsg = $exception->getMessage();
                    }

                }else{
                    $importComment = "Proudct was not found with sap number: " . $sapCode;
                }

                $this->consoleLog("[".$currentRow."] Status: " . $importStatus . " Comment: " .$importComment . " FAILURE MSG: " .$importFailureMsg);

                $this->csvLog($csvLogFileHandle, array(
                    $currentRow,
                    $importStatus,
                    $importComment,
                    $importFailureMsg
                ));
            }
            fclose($handle);
        }
        fclose($csvLogFileHandle);
    }

    private function getCleanedNumericData($data)
    {
        if(is_numeric($data)){
            return $data;
        }else{
            return null;
        }
    }

    /**
     * handle logging
     *
     * @param $message
     * @param string $level
     */
    private function consoleLog($message, $level = "INFO")
    {
        echo "[ " . $level . " ] " . $message . PHP_EOL;
    }

    /**
     * @param $logHandler
     * @param array $dataRow
     */
    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }

}
