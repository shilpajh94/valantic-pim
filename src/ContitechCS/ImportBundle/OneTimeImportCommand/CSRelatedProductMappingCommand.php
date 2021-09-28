<?php

/**
 * File Path: Your File path on system
 * Command: cs:one-time-import:feature-and-benefit <filePath>
 * Des: Feature and Benefit data import script.
 */

namespace ContitechCS\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use ContitechCS\ImportBundle\Services\ImportConstants;

class CSRelatedProductMappingCommand extends AbstractCommand
{
    private $t;
    private $productFolderPath = ImportConstants::CONTITECH_CS_PRODUCT_FOLDER;

    protected function configure()
    {
        $this->setName('cs:one-time-import:related-product-mapping')
            ->setDescription('Feature and Benefit data import script')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');

        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->import($filePath);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }


    private function import($filePath)
    {
        try {

            $results = $this->getCSVData($filePath);

            $data = $results['data'];

            unset($result);

            if (isset($data) && is_array($data)) {

                foreach ($data  as $result) {

                    if (isset($result) && is_array($result)) {
                        $this->insertFeatureAndBenefit($result);
                    }
                }
            }
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function insertFeatureAndBenefit($result)
    {
        $productHierarchy = trim($result['Product Hierarchy']);
        $productName = trim($result['Product Name']);
        $product = trim($result['Product']);
        $relatedProducts = trim($result['Related Products']);

        if($productHierarchy && $productName && $relatedProducts)
        {
            $relatedProducts = explode('|', $relatedProducts);
            $relatedProducts = array_map('trim', $relatedProducts);

            $objectsToMap = array();
            foreach ($relatedProducts as $productKey) {
                $object = $this->getProductObject($productKey);
                if($object)
                {
                    $objectsToMap[] = $object;
                }
            }

            if($objectsToMap)
            {
                $productHierarchy = explode('/', $productHierarchy);
                $productHierarchy = array_map('trim', $productHierarchy);
                $productHierarchy = implode('/', $productHierarchy);

                $objectInMapPath = "/".$this->productFolderPath;
                if($productHierarchy && $productName && $product)
                {
                    $productKey = $productName."/". $product;
                    $validProductNameKey = DataObject\Service::getValidKey($productKey, "object");
                    $objectInMapPath = $objectInMapPath ."/".$productHierarchy."/".$validProductNameKey; 
                }
                else{
                    $validProductNameKey = DataObject\Service::getValidKey($productName, "object");
                    $objectInMapPath = $objectInMapPath ."/".$productHierarchy."/".$validProductNameKey; 
                }

                try {
                    $productObj = DataObject\CSProducts::getByPath($objectInMapPath);
                    $productObj->setBenefits('updated field');
                    $productObj->setCSRelatedProducts($objectsToMap);
                    $productObj->setOmitMandatoryCheck(true);
                    $productObj->save();
                    echo "\n ";
                    echo $objectInMapPath;
                    echo "\n Product Updated. \n";
                } catch (\Throwable $th) {
                    p_r($th->getMessage());
                }
            }
        }
    }

    public function getProductObject($productKey)
    {
        $objectlist = new DataObject\CSProducts\Listing;
        $validKey = DataObject\Service::getValidKey($productKey, "object");

        $objectlist->setCondition("o_key = ?", $validKey);
        $objectlist->setLimit(1);
        $objectlist->load();
        
        foreach ($objectlist as $object) {
            return $object;
        }
        return false;
    }

    public function getCSVData($fileName)
    {
        try {

            $csvFilePath = $fileName;
            $firstRowData = array();
            if (empty($csvFilePath)) {
                return $firstRowData;
            }

            $csvFilePath = str_replace("%20", " ", $csvFilePath);

            $dialect = \Pimcore\Tool\Admin::determineCsvDialect($csvFilePath);
            $data = [];
            $count = 0;

            if (($handle = fopen($csvFilePath, 'r')) !== false) {
                while (($rowData = fgetcsv($handle, 0, '@@', $dialect->quotechar, $dialect->escapechar)) !== false) {
                    if ($count == 0) {
                        foreach ($rowData as $key => $value) {
                            unset($rowData[$key]);
                            $rowData[utf8_decode(trim($key))] = utf8_decode(trim($value));
                        }
                        $firstRowData = $rowData;
                    } else {
                        $tmpData = [];
                        foreach ($firstRowData as $key => $value) {
                            $tmpData[$value] = utf8_encode($rowData[$key]);
                            $tmpData[$value] = $rowData[$key];
                        }
                        $data[] = $tmpData;
                    }
                    $count++;
                }
                fclose($handle);
            }
            return array(
                'header'    =>  $firstRowData,
                'data'      =>  $data
            );
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
}
