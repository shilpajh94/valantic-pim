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

            unset($result);

            if (isset($data) && is_array($data)) {
                foreach ($data  as $result) {
                    if (isset($result) && is_array($result)) {
                        $this->createHierarchy($result);
                    }
                }
            }
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function createHierarchy($result)
    {
        $imageUrl = end($result);
        $imageName = $this->getImageUrl($imageUrl);
        $hierarchyArr = array_slice($result, 0, -1);

        $hierarchyString = implode('/', $hierarchyArr);

        $hierarchyPath = "/" . ImportConstants::CONTITECH_CS_ASSET_FOLDER . "/" . $hierarchyString;
        try {
            $assetId = Asset\Service::createFolderByPath($hierarchyPath)->getId();
            $assetObj = new Asset();
            $assetObj->setFilename($imageName);
            $assetObj->setData(file_get_contents($imageUrl));
            $assetObj->setParentId($assetId);
            $assetObj->save();
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function getImageUrl($imageUrl)
    {
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
