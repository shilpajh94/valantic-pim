<?php

/**
 * This command will set the Features in brand level
 */

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Model\Element\Service;

class FeatureImportCommand extends AbstractCommand
{
    private $t;
    private $featuresList;

    protected function configure()
    {
        $this->setName('conti:onetimeimport:feature-import-command')
            ->setDescription('Feature import command')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ')
            ->addArgument('needToCreateMaster', InputArgument::OPTIONAL, 'needToCreateMaster flag required "YES" ')
            ->addArgument('needToMergeExistingFeature', InputArgument::OPTIONAL, 'needToMergeExistingFeature flag required "YES" ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $needToCreateMaster = $input->getArgument('needToCreateMaster');
        $needToMergeExistingFeature = $input->getArgument('needToMergeExistingFeature');

        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->import($filePath, $needToCreateMaster, $needToMergeExistingFeature);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }

    private function import($filePath, $needToCreateMaster, $needToMergeExistingFeature)
    {
        try {
            $results = $this->getCSVData($filePath);
            $data = $results['data'];

            $this->featuresList = $this->getUpdatedFeaturesList('en');

            if (isset($data) && is_array($data)) {
                foreach ($data as $result) {
                    $digit6Array = explode(";",$result['6 Digit']);

                    if($digit6Array)
                    {
                        foreach ($digit6Array as $key => $single6Digit) {
                            $product = $this->getProductObject($single6Digit);
                            if($product)
                            {
                                unset($result['6 Digit']);

                                $FeatureToUpdate = array();
                                foreach ($result as $fkey => $fvalue) {
                                    
                                    if($fvalue)
                                    {
                                        $trimValue = trim($fvalue);
                                        $uppertrimValue = strtoupper($trimValue);
                                        $value = array_search ($uppertrimValue , $this->featuresList);
                                        if($value){
                                            $FeatureToUpdate[] = $value;
                                        }
                                        else{

                                            if($needToCreateMaster == 'YES')
                                            {
                                                $id = $this->createFeature($trimValue);
                                                
                                                if($id)
                                                {
                                                    $FeatureToUpdate[] = $id;
                                                    $this->featuresList = $this->getUpdatedFeaturesList('en');
                                                }
                                            }
                                            
                                            echo "Feature - ". $trimValue. " Not Found, Created in feature list \n";
                                        }
                                    }
                                }

                                if($needToMergeExistingFeature == 'YES')
                                {
                                    $productExistingFeature = $product->getFeaturesBenefitsBulletPoint();
                                    if($productExistingFeature)
                                    {
                                        $FeatureToUpdate = array_merge($FeatureToUpdate,$productExistingFeature);
                                        $FeatureToUpdate = array_unique($FeatureToUpdate);
                                    }
                                }

                                $product->setFeaturesBenefitsBulletPoint($FeatureToUpdate);
                                $product->save();
                                unset($FeatureToUpdate);
                                echo "6 Digit - ".$single6Digit." updated successfully \n";

                            }
                            else
                            {
                                echo "6 Digit - ".$single6Digit." not found \n";
                            }
                        }
                    }
                }
            }

        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }
    
    private function getProductObject($digit6code)
    {
        $entries = new DataObject\Product\Listing();
        $entries->setCondition("o_key ='$digit6code'");
        // $entries->setCondition("o_key =", "{$digit6code}");
        $entries->setLimit(1);
        $entries->load();
        if($entries) {
            foreach ($entries as $entry) {
                return $entry;
            }
        }
        
        return false;
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
                while (($rowData = fgetcsv($handle, 0, '@', $dialect->quotechar, $dialect->escapechar)) !== false) {
                    if ($count == 0) {
                        foreach ($rowData as $key => $value) {
                            unset($rowData[$key]);
                            $rowData[mb_convert_encoding(trim($key), 'ISO-8859-1', 'UTF-8')] = mb_convert_encoding(trim($value), 'ISO-8859-1', 'UTF-8'); // alternate for utf8_decode
                        }
                        $firstRowData = $rowData;
                    } else {
                        $tmpData = [];
                        foreach ($firstRowData as $key => $value) {
                            $tmpData[$value] = mb_convert_encoding($rowData[$key], 'UTF-8'); // alternate for utf8_encode
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

    public function createFeature($name){
        $parentFolderId= DataObject\Service::createFolderByPath('/Master List/Features And Benefits/new')->getId();
        $feature = new DataObject\Features();
        $feature->setKey(Service::getValidKey($name, 'object'));
        $feature->setName($name, 'en');
        $feature->setParentId($parentFolderId);
        $feature->setPublished(TRUE);
        $feature->save();
        
        return $feature->getId();
    }
    public function getUpdatedFeaturesList($language){
        $entries = new DataObject\Features\Listing();
        // $entries->setCondition("FeatureType = ?", "{$catalog_type}");
        $entries->load();
        $featureData = array();
        foreach($entries as $entry) {
            if($entry->getIcon())
                $featureData[$entry->getId()]['icon'] = $entry->getIcon()->getPath().$entry->getIcon()->getFilename();

            $featureData[$entry->getId()] = strtoupper($entry->getName($language));
            // $featureData[$entry->getName($language)] = $entry->getId();
            // $featureData[$entry->getId()]['key'] = $entry->getKey();
            // $featureData[$entry->getId()]['id'] = $entry->getId();
            // $featureData[$entry->getId()]['SortOrder'] = $entry->getSortOrder();
        }
        // p_r($featureData);
        return $featureData;
    }
}
