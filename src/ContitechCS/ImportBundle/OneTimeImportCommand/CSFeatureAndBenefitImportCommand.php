<?php

/**
 * File Path: Your File path on system
 * Command: cs:one-time-import:feature-and-benefit <filePath>
 * Des: Feature and Benefit data import script.
 */

namespace ContitechCS\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use ContitechCS\ImportBundle\Services\ImportConstants;

class CSFeatureAndBenefitImportCommand extends AbstractCommand
{
    private $t;
    private $duplicateTitle = [];

    protected function configure()
    {
        $this->setName('cs:one-time-import:feature-and-benefit-import')
            ->setDescription('Feature and Benefit data import script')
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

                $parentFolderID = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_MASTERDATA_CSFEATURESANDBENEFITS_FOLDER)->getId();
                
                foreach ($data  as $result) {
                    
                    if (isset($result) && is_array($result)) {
                        $this->insertFeatureAndBenefit($result, $parentFolderID);
                    }
                }

                echo "\n Total ".count($this->duplicateTitle). " Duplicate title found. \n ";
                p_r($this->duplicateTitle);
            }

        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function insertFeatureAndBenefit($result, $parentFolderID)
    {
        $title = trim($result['Title']);

        $validKey = DataObject\Service::getValidKey($title, "obejct");

        $description = trim($result['Description']);

        if ($title) {
            $featureObj = DataObject\CSFeaturesAndBenefits::getByPath("/".ImportConstants::CONTITECH_CS_MASTERDATA_CSFEATURESANDBENEFITS_FOLDER."/".$validKey);
            
            if(!$featureObj)
            {
                $obj = new DataObject\CSFeaturesAndBenefits();
                $obj->setKey($validKey);
                $obj->setFeatureName($title);
                $obj->setFeatureDescription($description);
                $obj->setParentID($parentFolderID);
                $obj->setPublished(true);
                $obj->setOmitMandatoryCheck(true);
                $obj->save();
            }
            else{
                $this->duplicateTitle[] = $title;
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
                while (($rowData = fgetcsv($handle, 0, '@@', $dialect->quotechar, $dialect->escapechar)) !== false) {
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
