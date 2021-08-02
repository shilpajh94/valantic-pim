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

            $parentId = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER)->getId();

            if (isset($data) && is_array($data)) {
                foreach ($data  as $result) {
                    $brick = $result['Bricks'];
                    unset($result['Bricks']);
                    $parentId = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER)->getId();
                    if (isset($result) && is_array($result)) {
                        $this->createHierarchy($result, $brick, $parentId);
                    }
                }
            }
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function createHierarchy($result, $brick, $parentId)
    {
        $hierarchy = '';
        foreach ($result as $key => $value) {
            $hierarchyName = $value;
            $level = $key;
            $hierarchy = $hierarchy . '/' . $hierarchyName;
            if (!empty($hierarchyName)) {
                $hierarchyNamePath = "/" . ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER . "/" . $hierarchy;
                $CSHierarchyObj = DataObject\CSHierarchy::getByPath($hierarchyNamePath);
                if (!$CSHierarchyObj) {
                    $obj = new DataObject\CSHierarchy();
                    $obj->setKey($hierarchyName);
                    $obj->setName($hierarchyName);
                    $obj->setLevel($level);
                    $obj->setRelatedBricks([$brick]);
                    $obj->setParentId($parentId);
                    $obj->setPublished(true);
                    $output = $obj->save();

                    $parentId = $output->getId();
                } else {
                    $parentId = $CSHierarchyObj->getId();
                }
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
