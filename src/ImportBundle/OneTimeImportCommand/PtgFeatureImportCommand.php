<?php

/**
 * filePath: /home/praganosis/Working/CSV/ptg_import.csv (Your File path on system)
 * Command:  bin/console conti:onetimeimport:ptg-feature /home/syncrasy/Music/tttt/ptg_EXPORT_DATA_2.csv PTG
 * Des: This command import features for ptg
 */

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
// use Pimcore\Db;

class PtgFeatureImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('conti:onetimeimport:ptg-feature')
            ->setDescription('PTG Import')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->t = time();
        $filePath = $input->getArgument('filePath');
        // $featureType = $input->getArgument('featureType');
        $featureType = 'PTG';
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');

            $this->import($filePath, $featureType);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }

    private function import($filePath, $featureType)
    {
        \Pimcore\Model\Version::disable();
        $results = $this->getCSVData($filePath);

        $featuresList = $this->getUpdatedFeaturesList('en', $featureType);

        if($results)
        {
            $unique_features = array();
            $articleNotFoundInDB = array();
            $articleParentNotFound = array();
            $updated6IDs = array();
            $updatedFertIDs = array();
            $havingParentCount = 0;
            $count = 0;
            $nocount = 0;
            foreach ($results as $rkey => $rvalue) 
            {
                $FeatureToUpdate = array();
                $Bullet_Point_1 = $Bullet_Point_2 = $Bullet_Point_3 = $Bullet_Point_4 = $Bullet_Point_5 = '';

                $Bullet_Point_1 = trim($rvalue['Bullet_Point_1']);
                $Bullet_Point_2 = trim($rvalue['Bullet_Point_2']);
                $Bullet_Point_3 = trim($rvalue['Bullet_Point_3']);
                $Bullet_Point_4 = trim($rvalue['Bullet_Point_4']);
                $Bullet_Point_5 = trim($rvalue['Bullet_Point_5']);

                $Bullet_Point_1 = ($Bullet_Point_1 == '-') ? '' : $Bullet_Point_1;
                $Bullet_Point_2 = ($Bullet_Point_2 == '-') ? '' : $Bullet_Point_2;
                $Bullet_Point_3 = ($Bullet_Point_3 == '-') ? '' : $Bullet_Point_3;
                $Bullet_Point_4 = ($Bullet_Point_4 == '-') ? '' : $Bullet_Point_4;
                $Bullet_Point_5 = ($Bullet_Point_5 == '-') ? '' : $Bullet_Point_5;

                if($Bullet_Point_1 || $Bullet_Point_2 || $Bullet_Point_3 || $Bullet_Point_4 || $Bullet_Point_5)
                {
                    if($Bullet_Point_1)
                        $unique_features[] = $Bullet_Point_1;
                    if($Bullet_Point_2)    
                        $unique_features[] = $Bullet_Point_2;
                    if($Bullet_Point_3)    
                        $unique_features[] = $Bullet_Point_3;
                    if($Bullet_Point_4)    
                        $unique_features[] = $Bullet_Point_4;
                    if($Bullet_Point_5)    
                        $unique_features[] = $Bullet_Point_5;

                    $articleNo = trim($rvalue['SAPMaterialCode']);

                    if($articleNo)
                    {
                        $product = $this->getProductObject($articleNo);
                        if($product)
                        {
                            $firstParent = $product->getParent();

                            if($firstParent->getType() != 'folder')
                            {
                                if($firstParent->getProductType() == 'skeleton')
                                {
                                    $parent = $firstParent->getParent();
                                    
                                    if($parent && $parent->getProductType() == 'base')
                                    {
                                        $parentID = $parent->getId();

                                        if(!in_array($parentID, $updated6IDs))
                                        {
                                            if($Bullet_Point_1)
                                            {
                                                $Bullet_Point_1_UPPER = strtoupper($Bullet_Point_1);
                                                $Bullet_Point_1_UPPER_Value = array_search ($Bullet_Point_1_UPPER , $featuresList);
                                                if($Bullet_Point_1_UPPER_Value){
                                                    $FeatureToUpdate[] = $Bullet_Point_1_UPPER_Value;
                                                }
                                            }

                                            if($Bullet_Point_2)
                                            {
                                                $Bullet_Point_2_UPPER = strtoupper($Bullet_Point_2);
                                                $Bullet_Point_2_UPPER_Value = array_search ($Bullet_Point_2_UPPER , $featuresList);
                                                if($Bullet_Point_2_UPPER_Value){
                                                    $FeatureToUpdate[] = $Bullet_Point_2_UPPER_Value;
                                                }
                                            }

                                            if($Bullet_Point_3)
                                            {
                                                $Bullet_Point_3_UPPER = strtoupper($Bullet_Point_3);
                                                $Bullet_Point_3_UPPER_Value = array_search ($Bullet_Point_3_UPPER , $featuresList);
                                                if($Bullet_Point_3_UPPER_Value){
                                                    $FeatureToUpdate[] = $Bullet_Point_3_UPPER_Value;
                                                }
                                            }

                                            if($Bullet_Point_4)
                                            {
                                                $Bullet_Point_4_UPPER = strtoupper($Bullet_Point_4);
                                                $Bullet_Point_4_UPPER_Value = array_search ($Bullet_Point_4_UPPER , $featuresList);
                                                if($Bullet_Point_4_UPPER_Value){
                                                    $FeatureToUpdate[] = $Bullet_Point_4_UPPER_Value;
                                                }
                                            }

                                            if($Bullet_Point_5)
                                            {
                                                $Bullet_Point_5_UPPER = strtoupper($Bullet_Point_5);
                                                $Bullet_Point_5_UPPER_Value = array_search ($Bullet_Point_5_UPPER , $featuresList);
                                                if($Bullet_Point_5_UPPER_Value){
                                                    $FeatureToUpdate[] = $Bullet_Point_5_UPPER_Value;
                                                }
                                            }

                                            
                                            

                                            $parent->setFeaturesBenefitsBulletPoint($FeatureToUpdate);

                                            // // p_r($parent->save());
                                            if($parent->save())
                                            {
                                                // echo "6 digit id -". $parentID. " updated \n";
                                                $updated6IDs[] = $parentID;
                                            }
                                            // die;
                                        }

                                        $havingParentCount++;
                                    }
                                    else{
                                        $articleParentNotFound[] = $articleNo;
                                    }
                                }
                            }
                            else
                            {
                                // p_r($firstParent);
                                if($Bullet_Point_1)
                                {
                                    $Bullet_Point_1_UPPER = strtoupper($Bullet_Point_1);
                                    $Bullet_Point_1_UPPER_Value = array_search ($Bullet_Point_1_UPPER , $featuresList);
                                    if($Bullet_Point_1_UPPER_Value){
                                        $FeatureToUpdate[] = $Bullet_Point_1_UPPER_Value;
                                    }
                                }

                                if($Bullet_Point_2)
                                {
                                    $Bullet_Point_2_UPPER = strtoupper($Bullet_Point_2);
                                    $Bullet_Point_2_UPPER_Value = array_search ($Bullet_Point_2_UPPER , $featuresList);
                                    if($Bullet_Point_2_UPPER_Value){
                                        $FeatureToUpdate[] = $Bullet_Point_2_UPPER_Value;
                                    }
                                }

                                if($Bullet_Point_3)
                                {
                                    $Bullet_Point_3_UPPER = strtoupper($Bullet_Point_3);
                                    $Bullet_Point_3_UPPER_Value = array_search ($Bullet_Point_3_UPPER , $featuresList);
                                    if($Bullet_Point_3_UPPER_Value){
                                        $FeatureToUpdate[] = $Bullet_Point_3_UPPER_Value;
                                    }
                                }

                                if($Bullet_Point_4)
                                {
                                    $Bullet_Point_4_UPPER = strtoupper($Bullet_Point_4);
                                    $Bullet_Point_4_UPPER_Value = array_search ($Bullet_Point_4_UPPER , $featuresList);
                                    if($Bullet_Point_4_UPPER_Value){
                                        $FeatureToUpdate[] = $Bullet_Point_4_UPPER_Value;
                                    }
                                }

                                if($Bullet_Point_5)
                                {
                                    $Bullet_Point_5_UPPER = strtoupper($Bullet_Point_5);
                                    $Bullet_Point_5_UPPER_Value = array_search ($Bullet_Point_5_UPPER , $featuresList);
                                    if($Bullet_Point_5_UPPER_Value){
                                        $FeatureToUpdate[] = $Bullet_Point_5_UPPER_Value;
                                    }
                                }

                                $product->setFeaturesBenefitsBulletPoint($FeatureToUpdate);

                                if($product->save())
                                {
                                    $productId = $product->getId();
                                    $updatedFertIDs[] =  $productId;

                                //    echo "fert id -". $productId. " updated \n";
                                }

                            }
                        }
                        else{
                            $articleNotFoundInDB[] = $articleNo;
                        }
                    }
                    
                    $count++;
                }
                else{
                    $nocount++;
                }
            }

            p_r( " Total SKUs - ".$count." Having Features" );
            p_r( " Total SKUs - ".$nocount." with no Features" );
            p_r( " Total SKUs - ".$havingParentCount." Having Parents" );
            

            if(\count($articleNotFoundInDB))
            {
                p_r( " Total articles - ".count($articleNotFoundInDB)." not found in DB" );
                p_r($articleNotFoundInDB);
            }

            if(\count($articleParentNotFound))
            {
                p_r( " Total articles parent - ".count($articleParentNotFound)." not found" );
                p_r($articleParentNotFound);
            }
            
            if(\count($updated6IDs))
            {
                p_r( " Total 6 digits IDs updated - ".count($updated6IDs) );
                p_r($updated6IDs);
            }

            if(\count($updatedFertIDs))
            {
                p_r( " Total fert IDs updated - ".count($updatedFertIDs) );
                p_r($updatedFertIDs);
            }
            
            
            $ss = array_unique($unique_features);

            

            // $a=array("Animal" => "horse", "Type" => "mammal");
            $ss = array_map(function($f){
                $f=strtoupper($f);
                return $f;
            }, $ss);

            // p_r($featuresList);
            $fnotfound = [];

            foreach ($ss as $skey => $svalue) {

                if(!in_array($svalue,$featuresList))
                {
                    $fnotfound[] = $svalue;
                }

            }

            // p_r($ss);

            if($fnotfound)
            {
                p_r("Below features are not found in master");
                p_r($fnotfound);
            }

        }
        die;

    }

    private function getProductObject($articleNumber)
    {
        $entries = new DataObject\Product\Listing();
        $entries->setCondition("articleNumber ='$articleNumber'");
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

    public function getUpdatedFeaturesList($language, $featureType){
        $entries = new DataObject\Features\Listing();
        $entries->setCondition("FeatureType = ?", "{$featureType}");
        $entries->load();
        $featureData = array();
        foreach($entries as $entry) {

            $featureData[$entry->getId()] = strtoupper($entry->getName($language));
            // $featureData[$entry->getName($language)] = $entry->getId();
            // $featureData[$entry->getId()]['key'] = $entry->getKey();
            // $featureData[$entry->getId()]['name'] = strtoupper($entry->getName($language));
            // $featureData[$entry->getId()]['FeatureType'] = strtoupper($entry->getFeatureType());
            // $featureData[$entry->getId()]['SortOrder'] = $entry->getSortOrder();
        }
        // p_r($featureData);
        return $featureData;
    }

    public function getCSVData($fileName)
    {
        try {
            $columns = ['SAPMaterialCode', 'Product_Hrc_Lvl2_Name', 'Product_Hrc_Lvl3_Name', 'Product_Hrc_Lvl4_Name', 'Bullet_Point_1', 'Bullet_Point_2', 'Bullet_Point_3', 'Bullet_Point_4', 'Bullet_Point_5'];
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
                        foreach ($columns as $key => $value) {
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
            return $data;
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
}