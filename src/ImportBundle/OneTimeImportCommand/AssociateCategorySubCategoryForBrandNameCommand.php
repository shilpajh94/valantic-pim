<?php
namespace ImportBundle\OneTimeImportCommand;


use PhpOffice\PhpSpreadsheet\IOFactory;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Logger;

/**
 * command to import file Hydraulic Hose Catalog Structure-PIM (1).xlsx
 *
 * Command to associate category and subcategory on the product using the brand name
 *
 * Class AssociateCategorySubCategoryForBrandNameCommand
 * @package ImportBundle\OneTimeImportCommand
 */
class AssociateCategorySubCategoryForBrandNameCommand extends AbstractCommand
{
    const BRAND_NAME_CAT_SUBCAT_SHEET_INDEX = 1;

    const DATA_START_ROW_NUMBER = 2;
    const BRAND_NAME_COLUMN = "A";

    const CATEGORY_COLUMN = "B";

    const SUBCATEGORY_COLUMN = "C";

    const LOG_FILE_NAME = "Associate_category_subcategory_for_brand_name_command_log";

    const STATUS_IMPORTED = "IMPORTED";
    const STATUS_FAILURE = "FAILURE";
    const STATUS_BRAND_NOT_FOUND = "BRAND_NOT_FOUND";
    const STATUS_CATEGORY_NOT_FOUND = "CATEGORY_NOT_FOUND";
    const STATUS_SOME_PRODUCTS_FAILED = "SOME_PRODUCTS_FAILED";


    protected function configure()
    {
        $this->setName('onetime-import:assoc-category-subcategory-for-brand-name')
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
            "Hose Name",
            "Category",
            "Sub-Category",
            "Status",
            "Sub-Category Found",
            "Comment"
        ));


        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load($importFilePath);
        $worksheet = $spreadsheet->getSheet(self::BRAND_NAME_CAT_SUBCAT_SHEET_INDEX);

        $highestRow = $worksheet->getHighestRow();

        for ($i = self::DATA_START_ROW_NUMBER; $i <= $highestRow; $i++) {

            $status = null;
            $subCategoryFound = "";
            $failedProducts = [];
            $savedProductCount = 0;

            $brandName = trim($worksheet->getCell(self::BRAND_NAME_COLUMN . strval($i))->getValue());
            $categoryName = trim($worksheet->getCell(self::CATEGORY_COLUMN . strval($i))->getValue());
            $subCategoryName = trim($worksheet->getCell(self::SUBCATEGORY_COLUMN . strval($i))->getValue());

            $this->consoleLog("----------------------------------------------------------------------");
            $this->consoleLog("STARTING to process brand [". $brandName . "]");

            $brandObject = DataObject\Brand::getByName($brandName,1);

            if($brandObject != null){
                $categoryObject = DataObject\Category::getByName($categoryName,1);
                if($categoryObject != null){

                    $subCategoryObject = DataObject\SubCategory::getByName($subCategoryName,1);

                    if($subCategoryObject != null){
                        $subCategoryFound = "YES";
                    }else{
                        $subCategoryFound = "NO";
                    }

                    $listing = new DataObject\Product\Listing();
                    $listing->setCondition("brandName = " . $brandObject->getId());
                    $listing->load();

                    $totalCount = $listing->getTotalCount();

                    $this->consoleLog("Number of products found for brand [" . $totalCount . "]");

                    $tmpProcessedCount = 0;
                    foreach($listing as $product){

                        $product->setCategory([$categoryObject]);
                        if($subCategoryObject != null){
                            $product->setSubCategory([$subCategoryObject]);
                        }

                        try {
                            $product->save();
                            $savedProductCount++;
                        }catch (\Exception $exception){
                            $this->consoleLog($exception->getMessage(),"ERROR");
                            $failedProducts[] = $product->getArticleNumber();
                            Logger::error("[ AssociateCategorySubCategoryForBrandNameCommand ] " . $exception->getMessage());
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
                }else{
                    $status = self::STATUS_CATEGORY_NOT_FOUND;
                }

            }else{
                $status = self::STATUS_BRAND_NOT_FOUND;
                // brand not found in pimcore
            }

            $this->consoleLog("STATUS: [ " . $status . " ]");

            $comment = 'Saved product count : ' . $savedProductCount . '. ';
            if(count($failedProducts)  > 0){
                $comment = "Products which COULD NOT be saved: [" . implode(", ", $failedProducts) . "]";
            }

            $this->csvLog($csvLogFileHandle, array(
                $i,
                $brandName,
                $categoryName,
                $subCategoryName,
                $status,
                $subCategoryFound,
                $comment
            ));
        }
        fclose($csvLogFileHandle);

        $this->consoleLog("Find log file at " . $csvLogFilePath);

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
