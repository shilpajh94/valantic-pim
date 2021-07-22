<?php

/**
 * File Path: Your File path on system
 * Command: cs:one-time-import:product-hierarchy-import <filePath>
 * Des: Product hierarchy data import script.
 */

namespace ContitechCS\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use ContitechCS\ImportBundle\Services\ImportConstants;

class CSHierarchyImportCommand extends AbstractCommand
{
    private $t;
    private $Level1Hierarchy = array();
    private $Level2Hierarchy = array();
    private $Level3Hierarchy = array();

    protected function configure()
    {
        $this->setName('cs:one-time-import:product-hierarchy-import')
            ->setDescription('Product hierarchy data import script')
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

            $ProductHierarchyFolderId = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER)->getId();

            if (isset($data) && is_array($data)) {
                foreach ($data  as $result) {

                    if (isset($result) && is_array($result)) {

                        $this->createCSHierarchy($ProductHierarchyFolderId, $result, 1);
                    }
                }
            }

            unset($data);
            unset($this->Level1Hierarchy);
            unset($this->Level2Hierarchy);
            unset($this->Level3Hierarchy);
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function createCSHierarchy($parentId, $result, $processedLevel = 1)
    {
        $Level1HierarchyName =  array_values($result)[0];
        $Level2HierarchyName =  array_values($result)[1];
        $Level3HierarchyName =  array_values($result)[2];

        if (isset($this->Level1Hierarchy[$Level1HierarchyName]) && $processedLevel === 1) {
            $this->createCSHierarchy($this->Level1Hierarchy[$Level1HierarchyName], $result, $processedLevel = 2);
        }

        if (isset($this->Level2Hierarchy[$Level2HierarchyName]) && $processedLevel === 2) {
            $this->createCSHierarchy($this->Level2Hierarchy[$Level2HierarchyName], $result, $processedLevel = 3);
        }

        if (isset($this->Level3Hierarchy[$Level3HierarchyName]) && $processedLevel === 3) {
            $this->createCSHierarchy($this->Level3Hierarchy[$Level3HierarchyName], $result, $processedLevel = 4);
            return;
        }

        if (trim($Level1HierarchyName) && $processedLevel < 4) {
            $hierarchy = '';
            if ($processedLevel == 1) {
                $hierarchy = $Level1HierarchyName;
                $hierarchyName = $Level1HierarchyName;
                $level = array_keys($result)[0];
            }

            if ($processedLevel == 2) {
                $hierarchy = $Level1HierarchyName . '/' . $Level2HierarchyName;
                $hierarchyName = $Level2HierarchyName;
                $level = array_keys($result)[1];
            }

            if ($processedLevel == 3) {
                $hierarchy = $Level1HierarchyName . '/' . $Level2HierarchyName . '/' . $Level3HierarchyName;
                $hierarchyName = $Level3HierarchyName;
                $level = array_keys($result)[2];
            }

            $hierarchyNamePath = "/" . ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER . "/" . $hierarchy;

            try {

                $CSHierarchyObj = DataObject\CSHierarchy::getByPath($hierarchyNamePath);

                if (!$CSHierarchyObj) {
                    $obj = new DataObject\CSHierarchy();

                    $obj->setKey($hierarchyName);
                    $obj->setName($hierarchyName);
                    $obj->setLevel($level);
                    $obj->setParentId($parentId);
                    $obj->setPublished(true);

                    $output = $obj->save();

                    $objectId = $output->getId();

                    if (!isset($this->Level1Hierarchy[$Level1HierarchyName]) && $processedLevel === 1) {
                        $this->Level1Hierarchy[$Level1HierarchyName] = $objectId;
                    }

                    if (!isset($this->Level2Hierarchy[$Level2HierarchyName]) && $processedLevel === 2) {
                        $this->Level2Hierarchy[$Level2HierarchyName] = $objectId;
                    }

                    if (!isset($this->Level3Hierarchy[$Level3HierarchyName]) && $processedLevel === 3) {
                        $this->Level3Hierarchy[$Level3HierarchyName] = $objectId;
                    }
                } else {
                    if (!isset($this->Level1Hierarchy[$Level1HierarchyName]) && $processedLevel === 1) {
                        $objectId = $CSHierarchyObj->getId();
                        $this->Level1Hierarchy[$Level1HierarchyName] = $CSHierarchyObj->getId();
                    }

                    if (!isset($this->Level2Hierarchy[$Level2HierarchyName]) && $processedLevel === 2) {
                        $objectId = $CSHierarchyObj->getId();
                        $this->Level2Hierarchy[$Level2HierarchyName] = $CSHierarchyObj->getId();
                    }

                    if (!isset($this->Level3Hierarchy[$Level3HierarchyName]) && $processedLevel === 3) {
                        $objectId = $CSHierarchyObj->getId();
                        $this->Level3Hierarchy[$Level3HierarchyName] = $CSHierarchyObj->getId();
                    }
                }

                if (trim($Level2HierarchyName) && $processedLevel === 1) {
                    $this->createCSHierarchy($objectId, $result, $processedLevel = 2);
                }

                if (trim($Level2HierarchyName) && trim($Level3HierarchyName) && $processedLevel === 2) {
                    $this->createCSHierarchy($objectId, $result, $processedLevel = 3);
                }
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        }
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
                        $cols = count($rowData);
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
