<?php

/**
 * File Path: Your File path on system
 * Command: cs:one-time-import:product-hierarchy-import <filePath>
 * Des: Product hierarchy data import script.
 */

namespace PTGEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use PTGEU\ImportBundle\Services\ImportService;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PTGEUProductEditableAttributesImportCommand extends AbstractCommand
{
    private $configProviderService;
    private $t;
    private $featurePoints;
    const LOG_FILE_NAME = "ptgeu-editable-product-attributes-log.csv";
    private $container;
 
    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected function configure()
    {
        $this->setName('contitech:ptg:eu:one-time-import:product-editable-attributes-import')
            ->setDescription('Product data import script')
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
        return 1;
    }

    private function import($filePath)
    {
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . self::LOG_FILE_NAME;
        $csvLogFileHandle = fopen($csvLogFilePath, "w");
        $this->csvLog($csvLogFileHandle, array(
            "Import Sheet Row Number",
            "Material",
            "Data Issue Column",
            "Incorrect Data",
            "Comment",
            "Status"
        ));

        try {
                // get editable product attribute config
                $this->configProviderService    = $this->container->get('import.config_provider_service');

                // get imported csv data
                $csvInfo        = ImportService::getCSVData($filePath);
                $csvHeader      = $csvInfo['header'];
                $csvData        = $csvInfo['data'];
                
                $i = 1;
                $colNameArray       = [];
                $incorrectDataArray = [];
                foreach($csvData  as $rowData)
                {
                    $i++;
                    $articleNumber  = $rowData[0];
                    $product           = DataObject\PTGEUProduct::getByArticleNumber($articleNumber, true);
                    if(!empty($product))
                    {
                        $rowData    = array_combine($csvHeader, $rowData);
                        $this->processProduct($rowData, $product, $i);

                        // unset features points var once row processed
                        unset($this->featurePoints);

                        try {
                            $product->save();
                            $importStatus = "SUCCESS";
                            $comment = 'Material processed.';
                        }catch (\Exception $exception){
                            $importStatus = "FAILURE";
                            $comment = $exception->getMessage();
                        }
                    }
                    else
                    {
                        $importStatus = "FAILURE";
                        $comment = 'Material number does not exists.';
                    }

                    $colNames       = implode(", ", $colNameArray);
                    $incorrectData  = implode(", ", $incorrectDataArray);

                    $this->csvLog($csvLogFileHandle, array(
                        $i,
                        $articleNumber,
                        $colNames,
                        $incorrectData,
                        $comment,
                        $importStatus
                    ));
                }

        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }

        fclose($csvLogFileHandle);
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

    private function processProduct($rowData, $product ,$i)
    {
        $productImportConfig  = $this->configProviderService->getEditableProductAttributesImportConfig();
        foreach ($rowData as $fieldCSVKey => $fieldValue)
        {
            $fieldCSVKey = trim($fieldCSVKey);
            if(isset($productImportConfig[$fieldCSVKey]))
            {
                $fieldConfig= $productImportConfig[$fieldCSVKey];
                $fieldName  = $fieldConfig['fieldName'];
                $fieldType  = $fieldConfig['fieldType'];
                $objectType = $fieldConfig['objectType'];
                if ($objectType == 'class')
                {
                    if($fieldName == 'longDescription' || $fieldName == 'shortDescription' ||
                     $fieldName=='FeaturesBenefitsBulletPoint'){
                        if($fieldType=='Multiselection' && $fieldName=='FeaturesBenefitsBulletPoint')
                        {
                            $this->featurePoints[] = trim($fieldValue);
                        }
                        $this->saveDescriptionInBase($product,$fieldName,$fieldValue,$fieldType);
                    }else{
                        
    
                        // call function process product attributes
                        $this->processProductAttributes($product, $fieldName, $fieldType, $fieldValue, $fieldCSVKey);
    
                    }
                }
            }
            else
            {
                $colNameArray[] = $fieldCSVKey. 'does not exists in configuration file.';
            }
        }
        echo 'Data updated for row '.$i.' ===  Article Number ==== '.$product->getArticleNumber(). PHP_EOL;
    }

    private function saveDescriptionInBase($product,$fieldName,$fieldValue,$fieldType){

        $baseObject = $product->getParent()->getParent();
        $method = 'set' . ucfirst($fieldName);
        if($fieldType=='Multiselection' && $fieldName=='FeaturesBenefitsBulletPoint')
        {
            $featureValueArr= $this->getProcessedFeaturePoints($this->featurePoints);
            $fieldValue     = array_map('trim', $featureValueArr);
            $baseObject->$method($fieldValue);
        }
        $baseObject->$method($fieldValue);
        $baseObject->save();
    }

    private function processProductAttributes($product, $fieldName, $fieldType, $fieldValue, $fieldCSVKey)
    {
        if (($fieldType == 'Number') && $fieldValue && !is_numeric($fieldValue)) {
            $colNameArray[]         = $fieldCSVKey;
            $incorrectDataArray[]   = $fieldValue;
        }
        $method = 'set' . ucfirst($fieldName);
        
        if($fieldType=='Boolean Select')
        {
            $booleanValue = $this->getBooleanValue($fieldValue);
            $product->$method($booleanValue, 1);
        }
        elseif($fieldName=='searchKeywords' && $fieldType == 'Select')
        {
            $searchKeywordObject = $this->getSearchKeyWordsObject($fieldValue);
            if($searchKeywordObject !=''){
                $product->$method($searchKeywordObject);
            }
        }
        elseif($fieldName=='longDescription' || $fieldName=='shortDescription' ||
         $fieldName=='webDiscription' || $fieldName=='legalText' || $fieldName=='CategoryDescriptionCatalog')
        {
            $product->$method($fieldValue, 'en');
        }
        else
        {
            $product->$method($fieldValue, 1);
        }
    }

    private function getBooleanValue($data)
    {
        switch ($data) {
            case 'Y':
                return true;
            case 'N':
                return false;
            default:
                return;
        }
    }

    private function getProcessedFeaturePoints($featurePoints)
    {
        $featureValueArr = [];
        $featuresBenefitsBulletPoint = array_filter($featurePoints);
        if(!empty($featuresBenefitsBulletPoint))
        {
            foreach($featuresBenefitsBulletPoint as $feature)
            {
                $objFeatures = new DataObject\PTGEUFeaturesAndBenefits\Listing();
                $objFeatures->setCondition("FeaturesAndBenefits = ?", $feature);
                if(!empty($objFeatures))
                {
                    foreach ($objFeatures as $featureData) {
                        $featureValueArr[] = $featureData->getId();
                    }
                }
            }
        }
        return $featureValueArr;
    }

    private function getSearchKeyWordsObject(string $value)
    {

        $objSearchKeywords = new DataObject\PTGEUSearchKeywords\Listing();
        $objSearchKeywords->setCondition("SearchKeywords = ?", $value);
        if(!empty($objSearchKeywords))
        {
            foreach ($objSearchKeywords as $object) {
                return $object->getId();
            }
        }
        return '';

    }
}
