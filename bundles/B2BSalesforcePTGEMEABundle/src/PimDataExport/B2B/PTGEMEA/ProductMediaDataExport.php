<?php

namespace B2BSalesforcePTGEMEABundle\PimDataExport\B2B\PTGEMEA;


use B2BSalesforcePTGEMEABundle\Logger\LogLevel;
use B2BSalesforcePTGEMEABundle\PimDataExport\IDataExport;
use B2BSalesforcePTGEMEABundle\PimDataExport\PimDataExportHelper;
use Pimcore\Model\DataObject;
use \Pimcore\Model\Asset;
use PimDataPostBundle\Model\Types\ImageTransformationSize;
use B2BSalesforcePTGEMEABundle\Tool\Utils;
use PimDataPostBundle\Lib\Util;
use Symfony\Component\Yaml\Yaml;


class ProductMediaDataExport implements IDataExport
{
    private $bu;
    private $helper;
    const B2B_PRODUCT_SMALL_IMAGE_DISPLAY_TYPE = "Product Image Small";
    const B2B_PRODUCT_MEDIUM_IMAGE_DISPLAY_TYPE = "Product Image Medium";

    public function __construct($bu)
    {
        $this->bu = $bu;
        $this->helper = new PimDataExportHelper;
    }

    public function exportData()
    {

        $this->helper->logMessage("{$this->bu}: Script Execution Started", LogLevel::DEBUG());

        $filePath = PTGEU_B2B_SFTP_DOWNLOAD_TEMP_DIR . "PIM_Salesforce_B2B_Product_Media_P61.csv";

        try {
            $ptgeuConfig = Yaml::parseFile(PIMCORE_PROJECT_ROOT . '/bundles/B2BSalesforcePTGEMEABundle/config/bu_translation_config/ptg_eu.yaml');
            $ptgeuMediaAttributesConfig = $ptgeuConfig['parameters']['Media'];

            $allB2BProductId = $this->helper->getAllB2BProduct($this->bu);

            if ($allB2BProductId) {
                $mediaAttributes = $this->getAllMediaAttributes($ptgeuMediaAttributesConfig);
                $file = fopen($filePath, "w+");
                $displayKeys = array('Product2__c', 'B2B_Media_Type__c', 'B2B_Display_Type__c', 'B2B_Media_URL__c', 'B2B_Description__c', 'B2B_IsAttachment__c', 'B2B_Alt_Text__c', 'B2B_External_Id_c__c', 'B2B_Sequence__c');
                fputcsv($file, $displayKeys);
                $productMediaDataArray = $this->helper->getAllMediaDataForEachProduct($allB2BProductId, $mediaAttributes);
                $i = 1;

                echo $message = "{$this->bu}: B2B ptgeu product media data csv file created\n";
                echo PHP_EOL;
                $this->helper->logMessage($message, LogLevel::INFO());

                foreach ($productMediaDataArray as $eachproductMediaData) {
                    if ($i % 1000 == 0) {
                        echo 'Processed ' . $i . ' out of ' . count($allB2BProductId) . ' products ' . PHP_EOL;
                    }
                    $i++;
                    foreach ($eachproductMediaData as $attributeName => $assetId) {
                        if ($attributeName != 'oo_id' && $attributeName != 'articleNumber') {
                            if ($ptgeuMediaAttributesConfig[$attributeName]['mediaType'] == 'image') {
                                $this->imageData($eachproductMediaData, $attributeName, $assetId, $file);
                            } else {
                                $this->otherMediaData($eachproductMediaData, $attributeName, $assetId, $file);
                            }
                        }
                    }
                }
            } else {
                echo $message = "{$this->bu}: B2B PTGEU products not found to export";
                echo PHP_EOL;
                $this->helper->logMessage($message, LogLevel::ERROR());
            }
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            $message = "Exception while trying to export the data" . " " . $message;
            $this->logMessage($message, LogLevel::CRITICAL());
            return;
        }
    }


    public function imageData($eachproductMediaData, $attributeName, $assetId, $file)
    {

        $sequence = array('mainImage1' => '1', 'mainImage2' => '2', 'halfView1' => '3', 'halfView2' => '4');
        $imageTypes = array('Medium', 'Large');


        foreach ($imageTypes as $eachImageType) {

            $product = DataObject\PTGEUProduct::getById($eachproductMediaData['oo_id']);
            $url = '';

            if ($assetId && ($attributeName != 'oo_id' || $attributeName != 'articleNumber')) {
                $asset = Asset::getById($assetId);
                if ($asset && $product) {
                    $articleNumber = $product->getArticleNumber();
                    if ($eachImageType == 'Medium') {
                        $url = Util::getAssetPublicPath($asset, ImageTransformationSize::MEDIUM());
                        $displayType = self::B2B_PRODUCT_SMALL_IMAGE_DISPLAY_TYPE;
                    } else {
                        $url = Util::getAssetPublicPath($asset, ImageTransformationSize::LARGE());
                        $displayType = self::B2B_PRODUCT_MEDIUM_IMAGE_DISPLAY_TYPE;
                    }
                    $url = str_replace("Â", "", $url);
                    if (!empty($asset->getMetadata("title"))) {
                        $altText = $asset->getMetadata("title");
                    } else {
                        $altText = strrev(explode('/', strrev($url))[0]);
                    }
                    $assetResultSet['Product2__c'] = '06-' . $articleNumber;
                    $assetResultSet['B2B_Media_Type__c'] = $asset->getType();
                    $assetResultSet['B2B_Display_Type__c'] = $displayType;
                    $assetResultSet['B2B_Media_URL__c'] = $url;
                    $assetResultSet['B2B_Description__c'] = substr($asset->getFilename(), 0, strpos($asset->getFilename(), "."));
                    $assetResultSet['B2B_IsAttachment__c'] = 'False';
                    $assetResultSet['B2B_Alt_Text__c'] = $altText;
                    // $assetResultSet['B2B_External_Id_c__c'] = $articleNumber.'_'.$assetId.'_'.$attributeName;
                    $assetResultSet['B2B_External_Id_c__c'] = $articleNumber . '_' . $this->createExternalId($attributeName, $eachImageType);
                    $assetResultSet['B2B_Sequence__c'] = isset($sequence[$attributeName]) ? $sequence[$attributeName] : '';
                    fputcsv($file, $assetResultSet);

                }
            }
        }
    }
    public function createExternalId($attributeName, $eachImageType)
    {
        $getFirstCapLatterExpr = '/(?<=|^)[A-Z]/';
        preg_match_all($getFirstCapLatterExpr, $attributeName, $firstCapmatches);
        $secondLatter = (isset($firstCapmatches[0][0])) ? $firstCapmatches[0][0] : '';
        return strtoupper(substr($attributeName, 0, 1)) . $secondLatter . substr($attributeName, -1) . '_' . strtolower(substr($eachImageType, 0, 3));
    }

    public function otherMediaData($eachproductMediaData, $attributeName, $assetId, $file)
    {
        $product = DataObject\PTGEUProduct::getById($eachproductMediaData['oo_id']);
        if (isset($assetId) && ($attributeName != 'oo_id' || $attributeName != 'articleNumber')) {
            $explodedAssetId = explode('|', $assetId);
            $assetId = trim(str_replace(',', '', $explodedAssetId[1]));
            $asset = Asset::getById($assetId);
            if ($asset && $product) {
                $articleNumber = $product->getArticleNumber();
                $mediaType = '';
                if ($asset->hasProperty('media_type') && $asset->getProperties()['media_type']->getData() != null) {
                    $mediaType = $asset->getProperties()['media_type']->getData();
                }
                if (!empty($asset->getMetadata("title"))) {
                    $altText = $asset->getMetadata("title");
                } else {
                    $altText = strrev(explode('/', strrev(Util::getAssetPublicPath($asset)))[0]);
                }
                $assetResultSet['Product2__c'] = '06-' . $articleNumber;
                $assetResultSet['B2B_Media_Type__c'] = $mediaType;
                $assetResultSet['B2B_Display_Type__c'] = '';
                $assetResultSet['B2B_Media_URL__c'] = Util::getAssetPublicPath($asset);
                $assetResultSet['B2B_Description__c'] = substr($asset->getFilename(), 0, strpos($asset->getFilename(), "."));
                $assetResultSet['B2B_IsAttachment__c'] = 'True';
                $assetResultSet['B2B_Alt_Text__c'] = $altText;
                $assetResultSet['B2B_External_Id_c__c'] = $articleNumber . '_' . $this->otherMediaExternalIdCreation($attributeName);
                $assetResultSet['B2B_Sequence__c'] = '';

                fputcsv($file, $assetResultSet);

            }
        }

    }

    public function otherMediaExternalIdCreation($attributeName)
    {
        $num = substr($attributeName, -1);
        if (str_starts_with($attributeName, 'D')) {
            $extIdAttr = substr(lcFirst($attributeName), 0, 3) . $num;
        } elseif (str_starts_with($attributeName, 'C')) {
            $extIdAttr = substr(lcFirst($attributeName), 0, 4) . $num;
        }
        return $extIdAttr;
    }

    public function getAllMediaAttributes($ptgeuMediaAttributesConfig)
    {
        foreach ($ptgeuMediaAttributesConfig as $attributeConfig) {
            $mediaAttributes[] = $attributeConfig['fieldName'];
        }
        return $mediaAttributes;

    }

    public function uploadFile()
    {
        $customFileName = "PIM_Salesforce_B2B_Product_Media_P61.csv";
        $this->helper->uploadFile($customFileName);
    }

    public function logMessage(string $msg, LogLevel $logLevel)
    {
        Utils::log(PTGEMEA_EXPORT_LOG_FILE, $msg, $logLevel);
    }
}
