<?php

namespace AppBundle\Command;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Elements\Bundle\ProcessManagerBundle\ExecutionTraitClass;
use Symfony\Component\Console\Input\InputOption;

class ImportFittingCommand extends AbstractCommand
{
    use ExecutionTraitClass;
    private $t;
    protected function configure()
    {
        $this->setName('conti:import:fittingdata')
            ->setDescription('Flag Set in Pim')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            // $this->import($filePath);
            $this->masterSelectSampleData($filePath);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }

    private function import($filePath)
    {
        try {
            $results = $this->getCSVData($filePath);
            $header = $results['header'];
            $data = $results['data'];
            if (isset($data) && is_array($data)) {
                foreach ($data as $k => $row) {
                    // p_r($row);die;
                    $obj = $this->getProductObject($row['SAP Number']);
                    p_r($obj->getId());
                    $obj->setShortDescription($row['Marketing Short Description']);
                    $obj->setBrandShortText1($row['Brand Short Text 1']);
                    $obj->setFittingTableName($row['FittingTableName']);
                    $obj->setPrintedCatalogFlag(1);
                    $hydFert = null;
                    $accFert = null;
                    if(!empty($row['Image'])) {
                        $image = \Pimcore\Model\Asset::getByPath($row['Image']);
                        $obj->setMainImage($image);
                        $obj->setRightPrintCatalogImage($image);
                        $leftImage = \Pimcore\Model\Asset::getByPath($row['Left Image']);
                        $obj->setLeftPrintCatalogImage($leftImage);
                    }
                    if ($obj->getFert()->getHydFittingsFert()) {
                        $hydFert  = $obj->getFert()->getHydFittingsFert();
                    } else {
                        $hydFert = new DataObject\Objectbrick\Data\HydFittingsFert($obj);
                    }
                    if ($obj->getFert()->getAccessoriesFert()) {
                        $accFert  = $obj->getFert()->getAccessoriesFert();
                    } else {
                        $accFert = new DataObject\Objectbrick\Data\AccessoriesFert($obj);
                    }
                    if (!empty($hydFert)) {
                        $hydFert->setActivantNumber($row['Product Number']);
                        $hydFert->setHoseID1InFract($row['Hose ID']);
                        $hydFert->setTubeODMM($row['Tube OD MM']);
                        $hydFert->setCutOffLengthIN($row['Cut-Off IN']);
                        $hydFert->setCutOffLengthMM($row['Cut-Off MM']);
                        $hydFert->setThreadDashSize1($row['ThreadDashSize1']);
                        $hydFert->setHex1WrenchSizeIN($row['Hex1WrenchSizeIN']);
                        $hydFert->setHex1WrenchSizeMM($row['Hex1WrenchSizeMM']);
                        $hydFert->setHex2WrenchSizeIN($row['Hex2WrenchSizeIN']);
                        $hydFert->setHex2WrenchSizeMM($row['Hex2WrenchSizeMM']);
                        $hydFert->setThreadSize1InDecimal($row['ThreadSize1InDecimal']);
                        $hydFert->setThreadSize2InDecimal($row['ThreadSize2InDecimal']);
//                        $hydFert->setElbowType($row['Elbow Type']);
                    }

                    if (!empty($accFert)) {
                        $accFert->setLengthIN($row['Length IN']);
                        $accFert->setLengthMM($row['Length MM']);
                    }
                    unset($hydFert,
                    $accFert);
                    $obj->save();
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            p_r($th->getMessage());
        }
    }

    private function masterSelectSampleData($filePath) {
        try {
            $results = $this->getCSVData($filePath);
            $header = $results['header'];
            $data = $results['data'];
            if (isset($data) && is_array($data)) {
                foreach ($data as $k => $row) {
                    $parentPath = \Pimcore\Model\DataObject\Folder::getById($row['Parent Id']);
                    $objPath = $parentPath->getFullPath().'/'.$row['Name'];
                    $obj = \Pimcore\Model\DataObject::getByPath($objPath);
                    if(is_null($obj)) {
                        $obj = new \Pimcore\Model\DataObject\MultiselectMaster;
                        $obj->setParentId($row['Parent Id']);
                        $obj->setKey($row['Name']);
                        $obj->setMasterType($row['Type']);
                        $obj->setName($row['Name']);
                        $obj->save();
                        p_r($obj->getId());
                    } else {
                        $obj->setPublished(1);
                        $obj->save();
                    }

                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            p_r($th->getMessage());
        }
    }

    private function getProductObject($sapNumber)
    {
        $listing = new \Pimcore\Model\DataObject\Product\Listing;
        $listing->setCondition("articleNumber LIKE :articleNumber", ["articleNumber" => $sapNumber]);
        $listing->setLimit(1);
        foreach ($listing as $obj) {
            return $obj;
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

            // $csvFilePath = PIMCORE_ASSET_DIRECTORY . $filePath;

            $csvFilePath = str_replace("%20", " ", $csvFilePath);

            $dialect = \Pimcore\Tool\Admin::determineCsvDialect($csvFilePath);
            $data = [];
            $count = 0;

            if (($handle = fopen($csvFilePath, 'r')) !== false) {
                while (($rowData = fgetcsv($handle, 0, $dialect->delimiter, $dialect->quotechar, $dialect->escapechar)) !== false) {
                    if ($count == 0) {
                        foreach ($rowData as $key => $value) {
                            unset($rowData[$key]);
                            $rowData[mb_convert_encoding(trim($key), 'ISO-8859-1', 'UTF-8')] = mb_convert_encoding(trim($value), 'ISO-8859-1', 'UTF-8');
                        }
                        $firstRowData = $rowData;
                    } else {
                        $tmpData = [];
                        foreach ($firstRowData as $key => $value) {
                            $tmpData[$value] = mb_convert_encoding($rowData[$key], 'UTF-8');
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
