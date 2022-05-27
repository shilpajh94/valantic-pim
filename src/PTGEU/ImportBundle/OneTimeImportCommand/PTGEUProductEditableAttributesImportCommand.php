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

class PTGEUProductEditableAttributesImportCommand extends AbstractCommand
{
    private $t;
    const LOG_FILE_NAME = "PTGEU_Product_Editable_Attributes_Import_Command_Log.csv";

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
                $productImportConfig   = \Pimcore::getContainer()->get('import.config_provider_service')->getEditableProductAttributesImportConfig();

                // get imported csv data
                $csvInfo        = ImportService::getCSVData($filePath);
                $csvHeader      = $csvInfo['header'];
                $csvData        = $csvInfo['data'];
                
                $i = 1;
                $colNameArray       = [];
                $incorrectDataArray = [];
                $importStatus       = "FAILURE";
                $allObjectBricks    = [];
                foreach($csvData  as $key => $productData) 
                {
                    $i++;
                    $articleNumber  = $productData[0];
                    $productData    = array_combine($csvHeader, $productData);
                    $product        = DataObject\PTGEUProduct::getByArticleNumber($articleNumber, true);
                    if(!empty($product))
                    {
                        $productClassBricks = $this->getProductClassBricks($product);
                        $allObjectBricks    = $productClassBricks;
                        
                        $bricksData = [];
                        foreach ($productData as $fieldCVSKey => $fieldValue) 
                        { 
                            $fieldCVSKey = trim($fieldCVSKey);
                            if(isset($productImportConfig[$fieldCVSKey])) 
                            {
                                $fieldConfig= $productImportConfig[$fieldCVSKey];
                                $fieldName  = ucfirst($fieldConfig['fieldName']);
                                $fieldType  = $fieldConfig['fieldType'];
                                $objectType = $fieldConfig['objectType'];
                                if ($objectType == 'class') 
                                {
                                    if (($fieldType == 'Number') && $fieldValue && !is_numeric($fieldValue)) {
                                        $colNameArray[]         = $fieldCVSKey;
                                        $incorrectDataArray[]   = $fieldValue;
                                    }

                                    $method = 'set' . $fieldName;

                                    if($fieldType=='Multiselection' && $fieldName=='FeaturesBenefitsBulletPoint')
                                    {
                                        $fieldValueArr  = explode(',', trim($fieldValue));
                                        $featureValueArr = [];
                                        foreach ($fieldValueArr as $feature) {
                                            $objFeatures = new DataObject\Features\Listing();
                                            $objFeatures->setCondition('Name = ?', trim($feature));
                                            foreach ($objFeatures as $featureData) {
                                                $featureValueArr[] = $featureData->getId();
                                            }
                                        }
                                        $fieldValue = array_map('trim', $featureValueArr);
                                        $product->$method($fieldValue);
                                    }
                                    else
                                    {
                                        $product->$method($fieldValue, 1);
                                    }
                                }
                                else
                                {
                                    $bricksData[$fieldConfig['objectType']][$fieldName]['fieldType'] = $fieldConfig['fieldType'];
                                    $bricksData[$fieldConfig['objectType']][$fieldName]['blockName'] = $fieldConfig['blockName'];
                                    $bricksData[$fieldConfig['objectType']][$fieldName]['fieldValue'] = $fieldValue;
                                }
                            }
                            else
                            {
                                $colNameArray[] = $fieldCVSKey. 'does not exists in configuration file.';
                            }
                        }
                        
                        if(!empty($allObjectBricks)) 
                        {
                            foreach($allObjectBricks as $brickType=>$bricks) 
                            {
                                foreach($bricks as $brick) 
                                {
                                    if (isset($bricksData[$brick])) 
                                    {
                                        $class = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\' . $brick;
                                        $brickObject = new $class($product);
                                        foreach ($bricksData[$brick] as $fieldKey => $fieldData) 
                                        {
                                            $fieldValue = trim($fieldData['fieldValue']);

                                            if (($fieldData['fieldType'] == 'Number') && $fieldValue && !is_numeric($fieldValue)) {
                                                $colNameArray[] = $fieldKey;
                                                $incorrectDataArray[] = $fieldValue;
                                            }

                                            $objectBrickFieldMethod = 'set' . $fieldKey;

                                            $brickObject->$objectBrickFieldMethod($fieldValue, 1);
                                            $brickObject->setFieldname($brickType);
                                            $method = 'set' . $brick;
                                            $bickTypeMethod = 'get' . ucfirst($brickType);
                                            $product->$bickTypeMethod()->$method($brickObject, 1);
                                        }
                                    }
                                }
                            }
                        }

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

    /*
     * @param $prodObject
     */
    private function getProductClassBricks($prodObject)
    {
        $bricks    = [];
        $classDefinition = ClassDefinition::getByName($prodObject->getClassName());
        foreach ($classDefinition->getFieldDefinitions() as $field) 
        {
            $fieldName = $field->getName();
            $fieldType = $field->getFieldType();
            if($fieldType == "objectbricks") 
            {
                $classBricks = $field->getAllowedTypes();
                $getType   = 'get'.ucfirst($fieldName);
                foreach($classBricks as $brickName)
                {
                    $getBrickName   = 'get'.ucfirst($brickName);
                    if(!empty($prodObject->$getType()->$getBrickName()))
                    {
                        $bricks[$fieldName][] = $brickName;
                    }
                }
            }
        }
        return $bricks;
    }
}
