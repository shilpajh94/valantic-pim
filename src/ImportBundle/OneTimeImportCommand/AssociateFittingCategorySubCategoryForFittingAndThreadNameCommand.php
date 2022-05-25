<?php


namespace ImportBundle\OneTimeImportCommand;


use AppBundle\Services\AppService;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Pimcore\Console\AbstractCommand;
use Pimcore\Logger;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AssociateFittingCategorySubCategoryForFittingAndThreadNameCommand extends AbstractCommand
{
    const FITTING_THREAD_CAT_SUBCAT_SHEET_INDEX = 2;

    const DATA_START_ROW_NUMBER = 2;

    const FITTING_FAMILY_NAME_COLUMN = "A";
    const CATAGORY_COLUMN = "C";

    const THREAD_NAME_COLUMN = "D";
    const SUB_CATEGORY_COLUMN = "F";

    const LOG_FILE_NAME = "Associate-fitting-category-subcategory-for-fitting-and-thread_command_log";

    const STATUS_IMPORTED = "IMPORTED";
    const STATUS_FAILURE = "FAILURE";

    const STATUS_FITTING_FAMILY_NOT_FOUND = "FITTING_FAMILY_NOT_FOUND";
    const STATUS_CATEGORY_NOT_FOUND = "CATEGORY_NOT_FOUND";

    const STATUS_THREAD_NOT_FOUND = "THREAD_NOT_FOUND";
    const STATUS_SUB_CATEGORY_NOT_FOUND = "SUB_CATEGORY_NOT_FOUND";

    const STATUS_SOME_PRODUCTS_FAILED = "SOME_PRODUCTS_FAILED";

    private $appService;
    private $db;

    public function __construct(AppService $appService)
    {
        $this->appService = $appService;
        $this->db = \Pimcore\Db::get();
        parent::__construct();
    }

    protected function configure()
    {
            $this->setName('onetime-import:assoc-fitting-category-subcategory-for-fitting-and-thread')
            ->setDescription('Command to associate fitting category and subcategory on the product using the fitting name and thread name')
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
            "Import Type",
            "Fitting Family/Thread",
            "Category/Sub-Category",
            "Status",
            "Comment"
        ));

        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load($importFilePath);
        $worksheet = $spreadsheet->getSheet(self::FITTING_THREAD_CAT_SUBCAT_SHEET_INDEX);

        $highestRow = $worksheet->getHighestRow();

        $this->consoleLog("---------------------------STARTING FITTING FAMILY/CATEGORY IMPORT----------------------");

        // saving fitting category based on the fitting family
        for ($i = self::DATA_START_ROW_NUMBER; $i <= $highestRow; $i++) {

            $status = null;
            $failedProducts = [];
            $savedProductCount = 0;

            $fittingFamilyName = trim($worksheet->getCell(self::FITTING_FAMILY_NAME_COLUMN . strval($i))->getValue());
            $categoryName = trim($worksheet->getCell(self::CATAGORY_COLUMN . strval($i))->getValue());

            $this->consoleLog("-----------------------------------------------------------------");
            $this->consoleLog("STARTING to process fitting family [". $fittingFamilyName . "]");

            $fittingFamilyObject = DataObject\FittingFamily::getByName($fittingFamilyName, 1);

            if ($fittingFamilyObject != null) {

                $categoryObject = DataObject\FittingCategory::getByName($categoryName, 1);
                if ($categoryObject != null) {

                    // get product ids for those nomeclatures which has this fitting family
                    $nomenIds = $this->getNomeclautreIds("FittingFamily",$fittingFamilyObject->getId());
                    $productIds = $this->getProductIdsHavingNomenclatureIds($nomenIds);

                    $totalCount = count($productIds);
                    $this->consoleLog("Number of products found for fitting family [" . $totalCount . "]");

                    $tmpProcessedCount = 0;
                    foreach($productIds as $productId){
                        $product = DataObject\Product::getById($productId);
                        $product->setFittingCategory([$categoryObject]);

                        try {
                            $product->save();
                            $savedProductCount++;
                        }catch (\Exception $exception){
                            $this->consoleLog($exception->getMessage(),"ERROR");
                            $failedProducts[] = $product->getArticleNumber();
                            Logger::error("[ AssociateFittingCategorySubCategoryForFittingAndThreadNameCommand ] " . $exception->getMessage());
                            $status = self::STATUS_SOME_PRODUCTS_FAILED;
                        }
                        $tmpProcessedCount++;

                        if($tmpProcessedCount % 10 == 0){
                            $this->consoleLog($tmpProcessedCount . "/" . $totalCount . " products processed.");
                        }
                    }
                    if($status == null){
                        $status = self::STATUS_IMPORTED;
                    }

                } else {
                    $status = self::STATUS_CATEGORY_NOT_FOUND;
                }

            } else {
                $status = self::STATUS_FITTING_FAMILY_NOT_FOUND;
            }

            $this->consoleLog("STATUS: [ " . $status . " ]");

            $comment = 'Saved product count : ' . $savedProductCount . '. ';
            if(count($failedProducts)  > 0){
                $comment = "Products which COULD NOT be saved: [" . implode(", ", $failedProducts) . "]";
            }

            $this->csvLog($csvLogFileHandle, array(
                $i,
                "Fitting Family/Category",
                $fittingFamilyName,
                $categoryName,
                $status,
                $comment
            ));

        }

        $this->consoleLog("---------------------------STARTING THREAD/SUB CATEGORY IMPORT----------------------");
        // saving fitting sub category based on thread
        for ($i = self::DATA_START_ROW_NUMBER; $i <= $highestRow; $i++) {

            $status = null;
            $failedProducts = [];
            $savedProductCount = 0;

            $threadName = trim($worksheet->getCell(self::THREAD_NAME_COLUMN . strval($i))->getValue());
            $subCategoryName = trim($worksheet->getCell(self::SUB_CATEGORY_COLUMN . strval($i))->getValue());

            $this->consoleLog("------------------------------------------------------------------");
            $this->consoleLog("STARTING to process thread [". $threadName . "]");

            $threadObject = DataObject\Thread::getByName($threadName, 1);

            if ($threadObject != null) {

                $subCategoryObject = DataObject\FittingSubCategory::getByName($subCategoryName, 1);
                if ($subCategoryObject != null) {

                    // get product ids for those nomeclatures which has this fitting family
                    $nomenIds = $this->getNomeclautreIds("Thread",$threadObject->getId());
                    $productIds = $this->getProductIdsHavingNomenclatureIds($nomenIds);

                    $totalCount = count($productIds);
                    $this->consoleLog("Number of products found for thread [" . $totalCount . "]");

                    $tmpProcessedCount = 0;
                    foreach($productIds as $productId){
                        $product = DataObject\Product::getById($productId);
                        $product->setFittingSubCategory([$subCategoryObject]);

                        try {
                            $product->save();
                            $savedProductCount++;
                        }catch (\Exception $exception){
                            $this->consoleLog($exception->getMessage(),"ERROR");
                            $failedProducts[] = $product->getArticleNumber();
                            Logger::error("[ AssociateFittingCategorySubCategoryForFittingAndThreadNameCommand ] " . $exception->getMessage());
                            $status = self::STATUS_SOME_PRODUCTS_FAILED;
                        }
                        $tmpProcessedCount++;

                        if($tmpProcessedCount % 10 == 0){
                            $this->consoleLog($tmpProcessedCount . "/" . $totalCount . " products processed.");
                        }
                    }
                    if($status == null){
                        $status = self::STATUS_IMPORTED;
                    }

                } else {
                    $status = self::STATUS_SUB_CATEGORY_NOT_FOUND;
                }

            } else {
                $status = self::STATUS_THREAD_NOT_FOUND;
            }

            $this->consoleLog("STATUS: [ " . $status . " ]");

            $comment = 'Saved product count : ' . $savedProductCount . '. ';
            if(count($failedProducts)  > 0){
                $comment = "Products which could not be saved: [" . implode(", ", $failedProducts) . "]";
            }

            $this->csvLog($csvLogFileHandle, array(
                $i,
                "Thread/Sub Category",
                $threadName,
                $subCategoryName,
                $status,
                $comment
            ));

        }

        fclose($csvLogFileHandle);

        $this->consoleLog("Find log file at " . $csvLogFilePath);

    }

    /**
     * @param string $attributeName : can only be FittingFamily or Thread
     * @param string $value: id of FItting family or Thread object
     * @return array|mixed
     * @throws \Doctrine\DBAL\DBALException
     */
    private function getNomeclautreIds(string $attributeName, string $value): array
    {
        $nomeclatureClassId = $this->appService->getPimcoreClassIdbyName("NomenClature");

        $sql = "SELECT o_id FROM object_" . $nomeclatureClassId;
        $sql .= " WHERE " . $attributeName . " LIKE " . " '%," . $value . ",%' ";

        return $this->db->fetchCol($sql);
    }

    private function getProductIdsHavingNomenclatureIds(array $nomeclatureIds): array
    {
        $result = [];
        if(count($nomeclatureIds) > 0){
            $productClassId = $this->appService->getPimcoreClassIdbyName("Product");
            $formatedNomenIds = $this->formatNomeclatureIdsForQuery($nomeclatureIds);

            $sql  = "SELECT o_id FROM object_brick_query_HydFittingsFert_" . $productClassId ;
            $sql .= " WHERE fieldname = 'fert' ";
            $sql .= " AND nomenclatureDetails IN (" .implode(",", $formatedNomenIds).  ")";

            $result = $this->db->fetchCol($sql);
        }
        return $result;
    }

    private function formatNomeclatureIdsForQuery(array $nomenIds): array
    {
        $returnArray  = [];
        foreach($nomenIds as $id){
            $returnArray[] = "'," . $id . ",'";
        }
        return $returnArray;
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
