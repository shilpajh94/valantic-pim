<?php

/**
 * File Path: Your File path on system
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

            $assetsData = [];
            if ($data) {
                foreach ($data as $dataValue) {
                    $level1 = trim($dataValue['Level1']);
                    $level2 = trim($dataValue['Level2']);
                    $level3 = trim($dataValue['Level3']);
                    $level4 = trim($dataValue['Level4']);
                    $level5 = trim($dataValue['Level5']);

                    if ($level1 && $level2 && $level3 && $level4 && $level5) {
                        $assetsData[$level1 . "/" . $level2 . "/" . $level3 . "/" . $level4][] = $level5;
                    } else if ($level1 && $level2 && $level3 && $level5) {
                        $assetsData[$level1 . "/" . $level2 . "/" . $level3][] = $level5;
                    } else if ($level1 && $level2 && $level5) {
                        $assetsData[$level1 . "/" . $level2][] = $level5;
                    } else if ($level1 && $level5) {
                        $assetsData[$level1][] = $level5;
                    }
                }
            }

            unset($result);
            unset($data);

            if (isset($assetsData) && is_array($assetsData)) {
                foreach ($assetsData as $hierarchyPath => $images) {
                    if (isset($images) && is_array($images)) {
                        $this->createHierarchy($hierarchyPath, $images);
                    }
                }
            }
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function createHierarchy($assetPathToStore, $images)
    {
        $hierarchyPath = "/" . ImportConstants::CONTITECH_CS_ASSET_FOLDER . "/" . $assetPathToStore;
        $productPath = "/" . ImportConstants::CONTITECH_CS_PRODUCT_FOLDER . '/' . $assetPathToStore;

        $CSProductObj = DataObject\CSProducts::getByPath($productPath);

        $folderId = Asset\Service::createFolderByPath($hierarchyPath)->getId();

        $items = [];
        foreach ($images as $key => $imageUrl) {
            try {

                $imageName = $this->getImageUrl($imageUrl, $key);

                $assetObj = Asset::getByPath($hierarchyPath . "/" . $imageName);

                if (!$assetObj) {
                    $assetObj = new Asset();
                    $assetObj->setFilename($imageName);
                    $assetObj->setData(file_get_contents($imageUrl));
                    $assetObj->setParentId($folderId);
                    $assetObj->save();
                }
                $advancedImage = new \Pimcore\Model\DataObject\Data\Hotspotimage();
                $advancedImage->setImage($assetObj);
                $items[] = $advancedImage;
            } catch (\Throwable $th) {
                p_r($th->getMessage());
            }
        }

        if ($items && $CSProductObj) {
            $CSProductObj->setImageGallery(new \Pimcore\Model\DataObject\Data\ImageGallery($items));
            $CSProductObj->setOmitMandatoryCheck(true);
            $CSProductObj->setPublished(true);
            $CSProductObj->save();
            echo "\n\nGallery Saved in path " . $productPath;
        } else {
            echo "\n Product group '{$productPath}' not found.";
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
