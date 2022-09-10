<?php

/**
 * File Path: Your File path on system
 * DownloadOrMapping: D - Downloading Assets, M - Mapping With Product
 * Command: cs:one-time-import:kentico-asset-import <filePath>
 * Des: Kentico Asset hierarchy asset import script.
 */

namespace ContitechCS\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use ContitechCS\ImportBundle\Services\ImportConstants;

class CSKenticoAssetImportCommand extends AbstractCommand
{
    private $t;

    protected function configure()
    {
        $this->setName('cs:one-time-import:kentico-asset-import')
            ->setDescription('Kentico asset import script')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ')
            ->addArgument('DownloadOrMapping', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $downloadOrMapping = strtoupper($input->getArgument('DownloadOrMapping'));

        if (!in_array($downloadOrMapping, array('D', 'M'))) {
            echo "\n Invalid Argument: Use 'D' For Downloading Assets and 'M' for Mapping Assets with Products. \n ";
            die;
        }

        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->import($filePath, $downloadOrMapping);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }


    private function import($filePath, $downloadOrMapping)
    {
        try {

            $results = $this->getCSVData($filePath);

            $data = $results['data'];

            $assetsData = [];
            if ($data) {
                foreach ($data as $dataValue) {
                    $level1 = trim($dataValue['Level1']);
                    $level2 = trim($dataValue['Level2']);
                    $level3 = trim($dataValue['Level3']);
                    $level4 = trim($dataValue['Level4']);
                    $level5 = trim($dataValue['Level5']);
                    $level6 = trim($dataValue['Level6']);
                    $level7 = trim($dataValue['Level7']);

                    if (strpos($dataValue['Level1'], "/") !== false) {
                        $level1 = str_replace("/", "-", $dataValue['Level1']);
                        $level1 = trim($level1);
                    }
                    if (strpos($dataValue['Level2'], "/") !== false) {
                        $level2 = str_replace("/", "-", $dataValue['Level2']);
                        $level2 = trim($level2);
                    }
                    if (strpos($dataValue['Level3'], "/") !== false) {
                        $level3 = str_replace("/", "-", $dataValue['Level3']);
                        $level3 = trim($level3);
                    }
                    if (strpos($dataValue['Level4'], "/") !== false) {
                        $level4 = str_replace("/", "-", $dataValue['Level4']);
                        $level4 = trim($level4);
                    }
                    if (strpos($dataValue['Level5'], "/") !== false) {
                        $level5 = str_replace("/", "-", $dataValue['Level5']);
                        $level5 = trim($level5);
                    }
                    if (strpos($dataValue['Level6'], "/") !== false) {
                        $level6 = str_replace("/", "-", $dataValue['Level6']);
                        $level6 = trim($level6);
                    }

                    if($level1 && $level2 && $level3 && $level4 && $level5 && $level6 && $level7){
                        $assetsData[$level1 . "/" . $level2 . "/" . $level3 . "/" . $level4 . "/" . $level5 . "/" . $level6][] = $level7;
                    } else if ($level1 && $level2 && $level3 && $level4 && $level5 && $level7){
                        $assetsData[$level1 . "/" . $level2 . "/" . $level3 . "/" . $level4 . "/" . $level5][] = $level7;
                    } else if ($level1 && $level2 && $level3 && $level4 && $level7) {
                        $assetsData[$level1 . "/" . $level2 . "/" . $level3 . "/" . $level4][] = $level7;
                    } else if ($level1 && $level2 && $level3 && $level7) {
                        $assetsData[$level1 . "/" . $level2 . "/" . $level3][] = $level7;
                    } else if ($level1 && $level2 && $level7) {
                        $assetsData[$level1 . "/" . $level2][] = $level7;
                    } else if ($level1 && $level7) {
                        $assetsData[$level1][] = $level7;
                    }
                }
            }
            unset($result);
            unset($data);

            if (isset($assetsData) && is_array($assetsData)) {
                foreach ($assetsData as $hierarchyPath => $images) {
                    if (isset($images) && is_array($images)) {
                        $this->createHierarchy($hierarchyPath, $images, $downloadOrMapping);
                    }
                }
            }
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function createHierarchy($assetPathToStore, $images, $downloadOrMapping)
    {
        if (preg_match('/\bCollection\b/', $assetPathToStore)) {
            $assetPathToStore = str_replace("Collection/", "", $assetPathToStore);
        }
        $hierarchyFolderPath = ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER;
        $hierarchyObjectPath = '/' . $hierarchyFolderPath . '/' . $assetPathToStore;
        $hierarchyPathObjCheck = DataObject\CSHierarchy::getByPath($hierarchyObjectPath);
        if ($hierarchyPathObjCheck) {
            $hierarchyPath = "/" . ImportConstants::CONTITECH_CS_ASSET_FOLDER . "/" . $assetPathToStore;
        } else {
            $hierarchyPath = "/" . ImportConstants::CONTITECH_CS_ASSET_FOLDER . '/Collection' . "/" . $assetPathToStore;
        }
        if ($downloadOrMapping == 'M') {
            $productPath = "/" . ImportConstants::CONTITECH_CS_PRODUCT_FOLDER . '/' . $assetPathToStore;
            $CSProductObj = DataObject\CSProducts::getByPath($productPath);
        }

        if ($downloadOrMapping == 'D') {
            echo "\n\n Folder Creation started";
            echo "\n\n Path - " . $hierarchyPath;
            try {
                $folderId = Asset\Service::createFolderByPath($hierarchyPath)->getId();
                echo "\n\n Folder Creation Done";
            } catch (\Throwable $th) {
                echo "\n\n";
                p_r($th->getMessage());
                echo "\n\n Folder Creation Failed";
            }
        }

        $items = [];
        if (CUSTOM_ENV == "prod" || CUSTOM_ENV == "stage") {
            $aContext = array(
                'http' => array(
                    'proxy'           => 'tcp://cias.geoaws.com:8080',
                    'request_fulluri' => true,
                ),
            );
            $cxContext = stream_context_create($aContext);
        }

        foreach ($images as $key => $imageUrl) {
            try {

                $imageName = $this->getImageUrl($imageUrl, $key);

                $assetObj = Asset::getByPath($hierarchyPath . "/" . $imageName);

                if (!$assetObj && $folderId && $downloadOrMapping == 'D') {
                    $assetObj = new Asset();
                    $assetObj->setFilename($imageName);
                    if (CUSTOM_ENV == "prod" || CUSTOM_ENV == "stage") {
                        $assetObj->setData(file_get_contents($imageUrl, False, $cxContext));
                    } else {
                        $assetObj->setData(file_get_contents($imageUrl));
                    }
                    $assetObj->setParentId($folderId);
                    $assetObj->save();

                    echo "\n\n Downloaded Successfully.";
                } else if ($downloadOrMapping == 'D') {
                    echo "\n\n Already Exist in Assets.";
                }

                if ($assetObj && ($downloadOrMapping == 'M')) {
                    echo "\n\n Set image in Hotspot";
                    $advancedImage = new \Pimcore\Model\DataObject\Data\Hotspotimage();
                    $advancedImage->setImage($assetObj);
                    $items[] = $advancedImage;
                } else if ($downloadOrMapping == 'M') {
                    echo "\n\n " . $hierarchyPath . "/" . $imageName . " - Image Not Found";
                }
            } catch (\Throwable $th) {
                echo "\n\n";
                p_r($th->getMessage());
                echo "\n\n";
            }
        }

        if ($downloadOrMapping == 'M') {

            if ($items && $CSProductObj) {
                echo "\n\n Adding " . count($items) . " in Gallary Started";
                $CSProductObj->setImageGallery(new \Pimcore\Model\DataObject\Data\ImageGallery($items));
                $CSProductObj->setOmitMandatoryCheck(true);
                $CSProductObj->setPublished(true);
                $CSProductObj->save();
                echo "\n\n Gallery Saved in path " . $productPath;
            } else {
                echo "\n\n Product group Folder '{$productPath}' not found.";
            }
        }
    }

    public function getImageUrl($imageUrl, $key)
    {
        if (strpos($imageUrl, "attachment.aspx") !== false) {
            $imageUrl = str_replace("attachment.aspx", "attachment_{$key}.jpg.aspx", $imageUrl);
        }
        $imageName = explode("/", $imageUrl);
        $imageName = end($imageName);
        $imageName = explode(".aspx", $imageName);
        $imageName = current($imageName);
        return $imageName;
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
                while (($rowData = fgetcsv($handle, 0, $dialect->delimiter, $dialect->quotechar, $dialect->escapechar)) !== false) {
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
