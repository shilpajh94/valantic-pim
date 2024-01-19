<?php
namespace ImportBundle\OneTimeImportCommand;


use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject\Product;
use \Pimcore\Model\Asset;

class AssetMappingCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('conti:import:IFSPTG-US_Asset-Mapping')
            ->setDescription('Command to map assets')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Input file path');

    }


    public function execute(InputInterface $input, OutputInterface $output)
    {
        try{

            $filePath = $input->getArgument('filePath');

            $attributeNameArray = array('Main Image' => 'mainImage', 'Alternate Image 1' => 'altImage1',
             'Alternate Image 2' => 'altImage2', 'Alternate Image 3' => 'altImage3', 'Alternate Image 4' => 'altImage4',
              'Alternate Image 5' => 'altImage5', 'Alternate Image 6' => 'altImage6');
    
            if (is_file($filePath)) {
                $csvFilePath = $filePath;
                $csvFilePath = str_replace("%20", " ", $csvFilePath);
                $csvInfo = $this->getCSVData($csvFilePath);
                foreach($csvInfo['data'] as $row){
                    $this->assetMapping($row, $attributeNameArray);
                }
            }
    
        }
        catch(Exception $ex){
            p_r($ex);
        }

    }

    public function assetMapping($row, $attributeNameArray){
        try{
            foreach($row as $key => $eachColumn){
                $assetPath = '/Product Assets/Aftermarket/';
                $product = $this->checkIfProductExists($row['SAP #']);
                if($key != 'SAP #'){
                    $assetPath = $assetPath.$eachColumn.'.JPG';
                    $fieldNameSetterMethod = 'set'.ucfirst($attributeNameArray[$key]);
                    $assetObject = $this->checkIfAssetExists($assetPath);
                    if($product && $assetObject){
                        $product->$fieldNameSetterMethod($assetObject);
                        $product->save();
                        echo 'Asset Mapped for '.$key.' with article number --- '. $row['SAP #']."\n";

                    }
                }
            }
        }
        catch(Exception $ex){
            p_r($ex);
        }
    }

    private function checkIfAssetExists(string $assetHierarchyFilePath)
    {
        $getAsset = Asset::getByPath($assetHierarchyFilePath);
        if($getAsset){
            return $getAsset;
        }
        return false;
    }

    private function checkIfProductExists($articleNumber)
    {
        $product = Product::getByArticlenumber($articleNumber, 1);
        if($product)
        {
            return $product;
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
                while (($rowData = fgetcsv($handle, 0, $dialect->delimiter, $dialect->quotechar,
                 $dialect->escapechar)) !== false) {
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