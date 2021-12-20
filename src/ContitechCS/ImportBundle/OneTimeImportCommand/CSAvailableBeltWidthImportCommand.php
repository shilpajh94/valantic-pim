<?php

/**
 * File Path: Your File path on system
 * Command: cs:one-time-import:available-belt-width-import <filePath>
 * Des: Available Belt data import script.
 */

namespace ContitechCS\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use ContitechCS\ImportBundle\Services\ImportConstants;

class CSAvailableBeltWidthImportCommand extends AbstractCommand
{
    private $t;
    private $duplicateTitle = [];

    protected function configure()
    {
        $this->setName('cs:one-time-import:available-belt-width-import')
            ->setDescription('Available Belt width data import script')
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

                $parentFolderID = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_MASTERDATA_AVAILABLEBELTWIDTH_FOLDER)->getId();

                foreach ($data  as $result) {

                    if (isset($result) && is_array($result)) {
                        $this->insertAvailableBeltWidth($result, $parentFolderID);
                    }
                }

                echo "\n Total " . count($this->duplicateTitle) . " Duplicate title found. \n ";
                p_r($this->duplicateTitle);
            }
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function insertAvailableBeltWidth($result, $parentFolderID)
    {
        //print_r($result);
        $beltWidthMM = trim(ucwords($result['BeltWidthMM']));
        $beltWidthInch = trim(ucwords($result['BeltWidthInch']));

        $validKey = DataObject\Service::getValidKey($beltWidthInch, "object");
        if (empty($validKey)) {
            $validKey = DataObject\Service::getValidKey($beltWidthMM, "object");
        }

        if ($beltWidthInch || $beltWidthMM) {

            $beltWidthObj = DataObject\CSAvailableBeltWidths::getByPath("/" . ImportConstants::CONTITECH_CS_MASTERDATA_AVAILABLEBELTWIDTH_FOLDER . "/" . $validKey);

            if (!$beltWidthObj) {
                $obj = new DataObject\CSAvailableBeltWidths();
                $obj->setKey($validKey);
                $obj->setAvailableBeltWidthInch($beltWidthInch);
                $obj->setAvailableBeltWidthMM($beltWidthMM);
                $obj->setAvailableBeltWidthInchUnit("inch");
                $obj->setAvailableBeltWidthMMUnit("mm");
                $obj->setParentID($parentFolderID);
                $obj->setPublished(true);
                $obj->setOmitMandatoryCheck(true);
                $obj->save();
            } else {
                $this->duplicateTitle[] = $beltWidthMM;
            }
        } else {
            echo "Title not found";
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
                while (($rowData = fgetcsv($handle, 0, ',', $dialect->quotechar, $dialect->escapechar)) !== false) {
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
