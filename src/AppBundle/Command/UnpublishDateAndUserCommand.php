<?php

namespace AppBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;

class UnpublishDateAndUserCommand extends AbstractCommand
{
    private $logArray;

    protected function configure()
    {
        $this->setName('Unpublish-Date-And-User-Command')
        ->setDescription('Get Product Unpublish Date And their User')
        ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');

    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->logArray = [];

        $filePath = $input->getArgument('filePath');


        $results = $this->getCSVData($filePath);

        $data = $results['data'];
        foreach ($data  as $result) {
            $sapNumberArray[] = $result['sapNumber'];
        }
        $articleNumbers = implode(",",$sapNumberArray);

        $productListing = new DataObject\Product\Listing();
        $productListing->setUnpublished(true);
        $productListing->setCondition("articleNumber IN ($articleNumbers)");
        $productListing->load();
        foreach($productListing as $eachProduct){
            $versionCount = 1;
            $versions = $eachProduct->getVersions();
            $previousVersion = $versions[count($versions)-1];
            $previousObject = $previousVersion->getData();
            if($previousObject){
                $publishState = $previousObject->getPublished();
                while($publishState != 'true'){
                    $versionCount++;
                    $previousVersion = $versions[count($versions)- $versionCount];
                    $previousObject = $previousVersion->getData();
                    if($previousObject){
                        $publishState = $previousObject->getPublished();
                    }
                }
                $versionCount--;
                $previousVersion = $versions[count($versions)- $versionCount];
                $previousObject = $previousVersion->getData();
                if($previousObject){
                    $articleNumber = $previousObject->getArticleNumber();
                    $date = gmdate('Y-m-d H:i:s',$previousObject->getModificationDate());
                    $user = $previousObject->getUserModification();
                    $logRow = [
                        'SapNumber' => $articleNumber,
                        'Date' => $date,
                        'User' => $user
                    ];
                    $this->logArray[] = $logRow; 
                }
            }
        }
        $fileName = "IFSPTG-US_Unpublish_Date_User". '.csv';
        $localizationImportlogFilePath = PIMCORE_TEMPORARY_DIRECTORY."/".$fileName;
        $fp = fopen($localizationImportlogFilePath, 'wb');
        fputcsv($fp, ['SapNumber', 'Date', 'User']);
        foreach ($this->logArray as $article) {
            fputcsv($fp, $article);
        }
        fclose($fp);

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

