<?php


namespace ImportBundle\OneTimeImportCommand;


use AppBundle\Services\AppService;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AssociateNomenclatureToProductCommand extends AbstractCommand
{
    private $db;

    private $appService;

    const LOG_FILE_NAME = "nomenclature_product_assoc_log";

    public function __construct(AppService $appService)
    {
        $this->db = \Pimcore\Db::get();
        $this->appService = $appService;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('onetime-import:assoc-nomenclature-product')
            ->setDescription('Commamd to associate nomenclature to products');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY."/". self::LOG_FILE_NAME .".csv";
        $csvLogFileHandle = fopen($csvLogFilePath,"w");
        $this->csvLog($csvLogFileHandle, array("#","Descriptive Part Number",
            "Nomenclature Found",
            "Reduced Descriptive Part Number for which Nomenclature was found ",
            "Associated Product SAP #"));

        $productData = $this->getHydFittingProductIData();

        $index = 0;
        $matchFound = 0;
        $matchWithRedPartNumber = 0;
        foreach($productData as $productDatum){
            $index++;
            $nomenclatureFound = "NO";
            $assocProductSap = '';
            $productId = $productDatum["o_id"];
            $productDescriptivePartNumber = trim($productDatum["DescriptivePartNumber"]);
            $this->consoleLog("( ".$index." ) Processing Descriptive Part Number ".$productDescriptivePartNumber);

            $descriptivePartNumberParts = explode("-",$productDescriptivePartNumber);

            // search for nomeclature master using the DescriptivePartNumber
            // if no master is found than search again by reducing the string at '-'

            $searchString = $productDescriptivePartNumber;
            do{
                $this->consoleLog("Searching Nomenclature master for '" . $searchString . "'");

                $nomenclature = DataObject\NomenClature::getByPartialPartNumber($searchString, 1);

                if($nomenclature){
                    $nomenclatureFound = "YES";
                    $matchFound++;
                    if($searchString != $productDescriptivePartNumber){
                        $matchWithRedPartNumber++;
                        $nomenclatureFound = "YES, with reduced part number ";
                    }
                    $this->consoleLog("Nomenclature master found for '" . $searchString . "' Descriptive Part Number.");


                    $product = DataObject\Product::getById($productId);

                    $hydFittingFert = $product->getFert()->getHydFittingsFert();

                    $elementMetadata = new DataObject\Data\ObjectMetadata('nomenclatureDetails', [], $nomenclature);
                    $hydFittingFert->setNomenclatureDetails([$elementMetadata]);

                    // this is not needed here, as it is already being handled at product pre-save
//                    $this->appService->updateFittingFamilyAndThreadDescInHydFittingFert($product);

                    $product->save();
                    $assocProductSap = $product->getArticleNumber();
                    break;
                }else{
                    $this->consoleLog("Nomenclature NOT FOUND found for '" . $searchString . "'");
                }
                array_pop($descriptivePartNumberParts);
                $searchString = implode("-",$descriptivePartNumberParts);
            }while ( count($descriptivePartNumberParts) > 0 );


            $this->csvLog($csvLogFileHandle,[$index, $productDescriptivePartNumber, $nomenclatureFound, $searchString, $assocProductSap]);
        }
        $this->consoleLog("----------------------------SUMMERY-----------------------------");
        $this->consoleLog("Total Descriptive Part Numbers processed: " . $index);
        $this->consoleLog("Total Nomenclature Masters found: " . $matchFound);
        $this->consoleLog("Total Nomenclature Masters found with reduced part number : " . $matchWithRedPartNumber);
        $this->consoleLog("Logs at " . $csvLogFilePath);
        fclose($csvLogFileHandle);
    }

    private function getHydFittingProductIData()
    {
        $productClassId = $this->getPimcoreClassId("Product");
        $hydFittingTableName = "object_brick_query_HydFittingsFert_".$productClassId;

        $sql = "SELECT o_id,DescriptivePartNumber FROM ".$hydFittingTableName;
        $sql .= " WHERE DescriptivePartNumber IS NOT NULL";

        $resultset = $this->db->fetchAll($sql);

        return $resultset;
    }

    private function getPimcoreClassId(string $name): string
    {
        return \Pimcore\Model\DataObject\ClassDefinition::getByName($name)->getId();
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

    private function csvLog($logHandler,array $dataRow)
    {
        $csvDelimiter = ",";

        fputcsv($logHandler,$dataRow,$csvDelimiter);
    }


}
