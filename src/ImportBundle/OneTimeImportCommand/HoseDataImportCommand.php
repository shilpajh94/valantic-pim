<?php

/**
 * File Path: /home/praganosis/Working/CSV/hosedata.csv (Your File path on system)
 * Command: bin/console conti:onetimeimport:hose /home/praganosis/Working/CSV/hosedata.csv
 * Des: This command will import and enrich PTG data at class, base, skeleton, fert level including bricks too.
 * Just run the above command, it will create all required temp table if it does not exist into system
 * After creation of temp table, it will process the sheet to import and enrich data
 */

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;

class HoseDataImportCommand extends AbstractCommand
{

    const HOSE_BASE_OBJECT_BRICK_QUERY = 'object_brick_query_HoseBase_1';
    const HOSE_BASE_OBJECT_BRICK_STORE = 'object_brick_store_HoseBase_1';

    const HOSE_SKELE_OBJECT_BRICK_QUERY = 'object_brick_query_HoseSkeleton_1';
    const HOSE_SKELE_OBJECT_BRICK_STORE = 'object_brick_store_HoseSkeleton_1';

    const HOSE_FERT_OBJECT_BRICK_QUERY = 'object_brick_query_HoseFert_1';
    const HOSE_FERT_OBJECT_BRICK_STORE = 'object_brick_store_HoseFert_1';


    const PRODUCT_QUERY = 'object_query_1';
    const PRODUCT_STORE = 'object_store_1';

    const BATCH_SIZE = 100;
    private $langArr;
    private $db;
    private $t;
    private $masterTypes;
    private $masters;
    private $baseLevel;
    private $skeleLevel;
    private $baseLevelRecords;
    private $skeleLevelRecords;
    protected function configure()
    {
        $this->setName('conti:onetimeimport:hose')
            ->setDescription('PTG Import')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->masterTypes = [
            'tubeColor' => 'INH-HYD-HOSE~tubeColor', 'coverCharacteristic' => 'INH-HYD-HOSE~coverCharacteristic',
            'coverColor' => 'INH-HYD-HOSE~coverColor', 'agencyCompliance' => 'INH-HYD-HOSE~agencyCompliance',
            'reinforcement' => 'ProductClass~reinforcement', 'coverMaterial' => 'INH-HYD-HOSE~coverMaterial',
            'tubeCharacteristic' => 'INH-HYD-HOSE~tubeCharacteristic', 'tubeMaterial' => 'INH-HYD-HOSE~tubeMaterial'
        ];

        $this->baseLevel = [];
        $this->skeleLevel = [];
        $this->baseLevelRecords = [];
        $this->skeleLevelRecords = [];

        $filePath = $input->getArgument('filePath');
        $this->db = Db::get();
        $this->t = time();
        $this->langArr = \Pimcore\Tool::getValidLanguages();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->loadMaster();
            $this->createTempTable();
            $this->import($filePath);
            $this->updateFert();
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }


    private function import($filePath)
    {
        p_r('Importing data into temp table');
        $results = $this->getCSVData($filePath);
        $this->truncateTemp();
        $this->updateTable($results, 'oti_hosedata_temp');
    }

    /**
     * Getting list of available material code
     * Filter Base Level, Class Level Data and update data into table directly
     * Filter Skeleton Level data and update data into bricks table directly
     * Filter Fert Level data and update data into bicks table directly
     */
    private function updateFert()
    {
        $sql = "SELECT o.o_id, SUBSTR(o.oldMaterialCode,1,6) baseLevel, SUBSTR(o.oldMaterialCode,1,9) skeleLevel, SUBSTR(o.siopFullCode,1,6) sfCode, oht.*, 'Fert' as fieldname FROM oti_hosedata_temp oht JOIN object_1 o ON(o.articleNumber=oht.Object)";
        $results = $this->db->fetchAll($sql);
        $records = $this->getFertData($results);
        /**
         * Updating Base
         */
        $this->updateBase();

        /**
         * Updating Skeleton
         */
        $this->updateSkeleton();

        /**
         * Updating Fert
         */
        p_r('Processing ' . count($records) . ' records at fert level');
        p_r('Updating Fert');

        $this->updateTable($records, self::HOSE_FERT_OBJECT_BRICK_QUERY);
        $this->updateTable($records, self::HOSE_FERT_OBJECT_BRICK_STORE);
        p_r('Fert Updation - Done');

        /* Final log update, If any object couldn't match in product table */
        $this->updateLog();
    }

    /**
     * Updating Base Level Data
     * 
     */
    private function updateBase()
    {
        if (!empty($this->baseLevelRecords)) {
            $this->mapBaseLevelId($this->baseLevelRecords, $this->baseLevel);
            
            /**
             * Getting base data
             */
            $records = $this->getMainClassData($this->baseLevelRecords);

            p_r('Processing ' . count($this->baseLevelRecords) . ' records of main class data');
            p_r('Updating Main Level');

            $this->updateTable($records, self::PRODUCT_QUERY);
            // Update Store Table
            $this->updateTable($records, self::PRODUCT_STORE);
            unset($records);

            /**
             * Getting Base Brick Level Data
             */
            $records = $this->getBaseBrickData($this->baseLevelRecords);

            p_r('Processing ' . count($records) . ' records at base level');
            p_r('Updating Base Level');

            $this->updateTable($records, self::HOSE_BASE_OBJECT_BRICK_QUERY);

            // Update Store Table
            $this->updateTable($records, self::HOSE_BASE_OBJECT_BRICK_STORE);

            unset($records);
            p_r('Base Level Updation - Done');
        }
    }

    /**
     * Updating siop level 5 data (PTG base level)
     * Getting list of skeleton leve data through query
     * 
     */
    private function updateSkeleton()
    {
        if (!empty($this->skeleLevelRecords)) {
            $this->mapBaseLevelId($this->skeleLevelRecords, $this->skeleLevel);
            $records = $this->getHoseSkeletonData($this->skeleLevelRecords);

            p_r('Processing ' . count($records) . ' records at skeleton level');
            p_r('Updating skeleton');

            $this->updateTable($records, self::HOSE_SKELE_OBJECT_BRICK_QUERY);
            $this->updateTable($records, self::HOSE_SKELE_OBJECT_BRICK_STORE);

            p_r('Skeleton Updation - Done');
        }
    }

    private function getMainClassData($results)
    {
        $d = array();
        $i = 0;
        foreach ($results as $k => $r) {
            $reinforcement = "";
            $weightLbFt = NULL;
            $weightGM = NULL;
            if (!empty($r['Weight_lb_ft']) && !empty($r['Weight_G_M'])) {
                $weightLbFt = $r['Weight_lb_ft'];
                $weightGM = $r['Weight_G_M'];
            }
            if (!empty($r['Weight_lb_ft']) && empty($r['Weight_G_M'])) {
                $weightLbFt = $r['Weight_lb_ft'];
                $weightGM = $this->lbsTogram($weightLbFt);
            }
            if (empty($r['Weight_lb_ft']) && !empty($r['Weight_G_M'])) {
                $weightGM = $r['Weight_G_M'];
                $weightLbFt = $this->gramToLbs($weightGM);
            }

            if (!empty($r['Reinforcement'])) {
                $reinforcement = $this->getMultiselectInfo('reinforcement', $r['Reinforcement']);
            }

            $d[$i] = array(
                'oo_id'  =>  $r['level6n9digit_id'],
                'grossWeight' => !empty($r['Weight_lb_ft']) ? $r['Weight_lb_ft'] : NULL,
                'weightg' => !empty($r['Weight_G_M']) ? $r['Weight_G_M'] : NULL,
                'minimumTemperatureF'  =>  !empty($r['MinTemperature_Rating_F']) ? $r['MinTemperature_Rating_F'] : NULL,
                'minimumTemperatureC'  =>  !empty($r['MinTemperature_Rating_C']) ? $r['MinTemperature_Rating_C'] : NULL,
                'maximumTemperatureF'  =>  !empty($r['MaxTemperature_Rating_F']) ? $r['MaxTemperature_Rating_F'] : NULL,
                'maximumTemperatureC'  =>  !empty($r['MaxTemperature_Rating_C']) ? $r['MaxTemperature_Rating_C'] : NULL
            );
            $d[$i]['reinforcement'] = NULL;
            if (!empty($reinforcement) && $reinforcement['itemNotFound'] == false) {
                $d[$i]['reinforcement'] = implode(",", $reinforcement['items']);
            }
            
            $i++;
        }
        return $d;
    }

    /**
     * Getting HoseBase Data
     */
    private function getBaseBrickData($results)
    {
        $d = array();
        $i = 0;
        $clrArr = array(
            'SYNTHETIC RUBBER' => 'SYNTHETIC RUBBER',
            'Chemical Resistant' => 'Chemical Resistant'
        );
        
        
        foreach ($results as $k => $r) {
            $tbCols = array();
            $cvMatrls = array();
            $cvCols = array();
            $cvChars = array();
            $agComp = array();
            $tbMatrls = array();
            $tbChrct = array();
            $brands = array();
            $error = array();

            if (!empty($r['Brand_Name'])) {
                $clrArr = array();
                $clrArr = explode("/", strtolower($r['Brand_Name']));
                $clrInfo = $this->getBrands($clrArr);
                if (!empty($clrInfo['itemNotFound'])) {
                    $error[] = "Brands(s) '" . $clrInfo['itemNotFound'] . "' not found in master";
                } else {
                    $brands = $clrInfo['items'];
                }
                unset($clrInfo);
            }

            if (!empty($r['Tube_Material'])) {
                $clrArr = array();
                $clrArr = $r['Tube_Material']; //explode("/", strtolower($r['Tube_Material']));
                $clrInfo = $this->getMultiselectInfo('tubeMaterial', $clrArr);
                if (!empty($clrInfo['itemNotFound'])) {
                    $error[] = "Tube Materials(s) '" . $clrInfo['itemNotFound'] . "' not found in master";
                } else {
                    $tbMatrls = $clrInfo['items'];
                }
                unset($clrInfo);
            }

            if (!empty($r['Tube_Characteristic'])) {
                $clrArr = array();
                $clrArr = $r['Tube_Characteristic']; //explode("/", strtolower($r['Tube_Characteristic']));
                $clrInfo = $this->getMultiselectInfo('tubeCharacteristic', $clrArr);
                if (!empty($clrInfo['itemNotFound'])) {
                    $error[] = "Tube Characteristic(s) '" . $clrInfo['itemNotFound'] . "' not found in master";
                } else {
                    $tbChrct = $clrInfo['items'];
                }
                unset($clrInfo);
            }

            if (!empty($r['Tube_Color'])) {
                $clrArr = array();
                $clrArr = $r['Tube_Color']; // explode("/", strtolower($r['Tube_Color']));
                $clrInfo = $this->getMultiselectInfo('tubeColor', $clrArr);
                if (!empty($clrInfo['itemNotFound'])) {
                    $error[] = "Tube Color(s) '" . $clrInfo['itemNotFound'] . "' not found in master";
                } else {
                    $tbCols = $clrInfo['items'];
                }
                unset($clrInfo);
            }

            if (!empty($r['Cover_Material'])) {
                $clrArr = array();
                $clrArr = $r['Cover_Material']; //explode("/", strtolower($r['Cover_Material']));
                $clrInfo = $this->getMultiselectInfo('coverMaterial', $clrArr);
                if (!empty($clrInfo['itemNotFound'])) {
                    $error[] = "Cover Material(s) '" . $clrInfo['itemNotFound'] . "' not found in master";
                } else {
                    $cvMatrls = $clrInfo['items'];
                }
                unset($clrInfo);
            }

            if (!empty($r['Cover_color'])) {
                $clrArr = array();
                $clrArr = $r['Cover_color']; //explode("/", strtolower($r['Cover_color']));
                $clrInfo = $this->getMultiselectInfo('coverColor', $clrArr);
                if (!empty($clrInfo['itemNotFound'])) {
                    $error[] = "Cover Color(s) '" . $clrInfo['itemNotFound'] . "' not found in master";
                } else {
                    $cvCols = $clrInfo['items'];
                }
                unset($clrInfo);
            }

            if (!empty($r['Cover_Characteristic'])) {
                $clrArr = array();
                $clrArr = $r['Cover_Characteristic']; // explode("/", strtolower($r['Cover_Characteristic']));
                $clrInfo = $this->getMultiselectInfo('coverCharacteristic', $clrArr);
                if (!empty($clrInfo['itemNotFound'])) {
                    $error[] = "Cover Characteristic(s) '" . $clrInfo['itemNotFound'] . "' not found in master";
                } else {
                    $cvChars = $clrInfo['items'];
                }
                unset($clrInfo);
            }


            if (!empty($error)) {
                $results[$k]['statusCode'] = "Failed - Base Level";
                $results[$k]['failedReason']    =   implode(', ', $error);
            } else {
                $results[$k]['statusCode'] = "Success - Base Level";
                $results[$k]['failedReason'] = "";
            }

            $d[] = array(
                'o_id'  =>  $r['level6n9digit_id'],
                'fieldname'  =>  'Base',
                'tubeMaterial'  =>  !empty($tbMatrls) ? implode(',', $tbMatrls) : NULL,
                'tubeCharacteristic'    =>  !empty($tbChrct) ? implode(',', $tbChrct) : NULL,
                'tubeColor'  =>  !empty($tbCols) ? implode(',', $tbCols) : NULL,
                'coverMaterial'     =>  !empty($cvMatrls) ? implode(',', $cvMatrls) : NULL,
                'coverCharacteristic'   =>  !empty($cvChars) ? implode(',', $cvChars) : NULL,
                'coverColor'    =>  !empty($cvCols) ? implode(',', $cvCols) : NULL,

                'numberOfHelixWires'    =>  !empty($r['Number_of_Helix_Wires']) ? $r['Number_of_Helix_Wires'] : NULL,
                'numberOfPlies'     =>  !empty($r['Number_of_Plies']) ? $r['Number_of_Plies'] : NULL,
                'staticWire'  =>  !empty($r['Static_Wire']) ? 1 : NULL,

                'VirtualCatalogTubeMaterial' => !empty($r['Tube_Material']) ? implode(", ", $r['Tube_Material']) : NULL,
                'VirtualCatalogCoverMaterial' => !empty($r['Cover_Material']) ? implode(", ", $r['Cover_Material']) : NULL
            );

            if (!empty($r['Static_Wire'])) {
                $d[$i]['staticWire'] = strtolower($r['Static_Wire']) == "y" ? "Yes" : "No";
            } else {
                $d[$i]['staticWire'] = NULL;
            }
            

            $i++;
        }
        $this->insertDataToLogTable($results);
        return $d;
    }

    

    private function getHoseSkeletonData($results)
    {
        $d = array();

        $i = 0;
        foreach ($results as $k => $r) {
            
            $error = array();

            if (!empty($error)) {
                $results[$k]['statusCode'] = "Failed - Skeleton Level";
                $results[$k]['failedReason']    =   implode(', ', $error);
            } else {
                $results[$k]['statusCode'] = "Success - Skeleton Level";
                $results[$k]['failedReason'] = "";
            }

            // p_r($weightLbFt.' - '.$weightGM);
            $d[$i] = array(
                'o_id'  =>  $r['level6n9digit_id'],
                'fieldname'  =>  'Skeleton',
                'BendRadiusIN' =>  !empty($r['Bend_Radius_in']) ? $r['Bend_Radius_in'] : NULL,
                'BendRadiusMM' =>  !empty($r['Bend_Radius_mm']) ? $r['Bend_Radius_mm'] : NULL,
                'VacuumIN' =>  !empty($r['Vacuum_Rating_in']) ? $r['Vacuum_Rating_in'] : NULL,
                'VacuumMM' =>  !empty($r['Vacuum_Rating_mm']) ? $r['Vacuum_Rating_mm'] : NULL,
                'workingPressureMPA' =>  !empty($r['Working_Pressure_Mpa']) ? $r['Working_Pressure_Mpa'] : NULL,
                'workingPressurePSI' =>  !empty($r['Working_Pressure_PSI']) ? $r['Working_Pressure_PSI'] : NULL,
                'minBurstPressurePSI' =>  !empty($r['Min_Burst_Pressure_PSI']) ? $r['Min_Burst_Pressure_PSI'] : NULL,
                'minBurstPressurempa' =>  !empty($r['Min_Burst_Pressure_Mpa']) ? $r['Min_Burst_Pressure_Mpa'] : NULL,
                'HoseIDNominalIDFrac' =>  !empty($r['Hose_ID_in_Fract_Nominal_ID']) ? $r['Hose_ID_in_Fract_Nominal_ID'] : NULL,
                'hoseIdDec' =>  !empty($r['Hose_ID_in_Dec_Actual_ID']) ? $r['Hose_ID_in_Dec_Actual_ID'] : NULL,
                'hoseIdMM' =>  !empty($r['Hose_ID_mm_Actual_ID']) ? $r['Hose_ID_mm_Actual_ID'] : NULL,
                'hoseOdIn' =>  !empty($r['Hose_OD_in']) ? $r['Hose_OD_in'] : NULL,
                'hoseOdmm' =>  !empty($r['Hose_OD_mm']) ? $r['Hose_OD_mm'] : NULL,

                'VirtualCatalogVacuumIn'    =>  !empty($r['Vacuum_Rating_in']) ? $r['Vacuum_Rating_in'] : NULL,
                'VirtualCatalogWorkingPressureMPA'  =>  !empty($r['Working_Pressure_MPa']) ? $r['Working_Pressure_MPa'] : NULL,
                // 'VirtualCatalogReinforcement'   =>  !empty($reinfo) ? implode(',', $reinfo) : NULL,
                'VirtualCatalogVacuumMM'    => !empty($r['Vacuum_Rating_mm']) ? $r['Vacuum_Rating_mm'] : NULL,
                'VirtualCatalogWorkingPressurePSI'  => !empty($r['Working_Pressure_PSI']) ? $r['Working_Pressure_PSI'] : NULL
            );
            
            $i++;
        }
        $this->insertDataToLogTable($results);
        return $d;
    }

    /**
     * Creating Fert Level Data
     * $param array sheet result set
     * return array
     */
    private function getFertData($results)
    {
        $d = array();


        foreach ($results as $k => $r) {
            
            /* Extracting Base */
            if (!empty($r['baseLevel']) && is_numeric($r['baseLevel']) && !in_array($r['baseLevel'], $this->baseLevel)) {
                array_push($this->baseLevel, $r['baseLevel']);
                // $this->baseLevelRecords[$r['baseLevel']] = $r;
            }
            if (!empty($r['baseLevel']) && is_numeric($r['baseLevel'])) {
                $this->baseLevelRecords[$r['baseLevel']][] = $r;
            }

            if (!empty($r['skeleLevel']) && is_numeric($r['skeleLevel'])  && !in_array($r['skeleLevel'], $this->skeleLevel)) {
                array_push($this->skeleLevel, $r['skeleLevel']);
            }

            if (!empty($r['skeleLevel']) && is_numeric($r['skeleLevel'])) {
                $this->skeleLevelRecords[$r['skeleLevel']][] = $r;
            }
            $reinfo = array();
            $error = array();
            $clrInfo = array();
            // p_r($weightLbFt.' - '.$weightGM);
            $d[] = array(
                'o_id'  =>  $r['o_id'],
                'fieldname'  =>  'Fert',
                'hoseLengthFT' =>  !empty($r['Hose_Length_ft']) ? $r['Hose_Length_ft'] : NULL,
                'hoseLengthM' =>  !empty($r['Hose_Length_M']) ? $r['Hose_Length_M'] : NULL,
                'assembly' =>  !empty($r['Assembly_Not_Assembly']) ? 1 : NULL,
                'fitting1Type' =>  !empty($r['Fitting_1_Type']) ? $r['Fitting_1_Type'] : NULL,
                'fitting1Size' =>  !empty($r['Fitting_1_Size_FRACT']) ? $r['Fitting_1_Size_FRACT'] : NULL,
                'fitting1Material' =>  !empty($r['Fitting_1_Material']) ? $r['Fitting_1_Material'] : NULL,
                'fitting2Type' =>  !empty($r['Fitting_2_Type']) ? $r['Fitting_2_Type'] : NULL,
                'fitting2Size' =>  !empty($r['Fitting_2_Size_FRACT']) ? $r['Fitting_2_Size_FRACT'] : NULL,
                'fitting2Material' =>  !empty($r['Fitting_2_Material']) ? $r['Fitting_2_Material'] : NULL
            );
            $results[$k]['statusCode'] = 'Success - Fert Level';
            $results[$k]['failedReason'] = '';
        }
        $this->sanitizeBaseLevelData();
        $this->sanitizeSkeleLevelData();

        // $this->insertDataToLogTable($results);
        return $d;
    }

    private function sanitizeBaseLevelData()
    {
        $d = array();
        $rows = array();
        $i = 0;
        foreach ($this->baseLevelRecords as $baseLevelCode => $results) {
            if (!isset($d[$baseLevelCode])) {
                $d[$baseLevelCode] = array();
            }
            foreach ($results as $K => $result) {
                if (!isset($d[$baseLevelCode]['Weight_lb_ft'])) {
                    $d[$baseLevelCode]['Weight_lb_ft'] = '';
                }
                if (!isset($d[$baseLevelCode]['Weight_G_M'])) {
                    $d[$baseLevelCode]['Weight_G_M'] = '';
                }
                if (!isset($d[$baseLevelCode]['MinTemperature_Rating_F'])) {
                    $d[$baseLevelCode]['MinTemperature_Rating_F'] = '';
                }
                if (!isset($d[$baseLevelCode]['MinTemperature_Rating_C'])) {
                    $d[$baseLevelCode]['MinTemperature_Rating_C'] = '';
                }
                if (!isset($d[$baseLevelCode]['MaxTemperature_Rating_F'])) {
                    $d[$baseLevelCode]['MaxTemperature_Rating_F'] = '';
                }
                if (!isset($d[$baseLevelCode]['MaxTemperature_Rating_C'])) {
                    $d[$baseLevelCode]['MaxTemperature_Rating_C'] = '';
                }
                if (!isset($d[$baseLevelCode]['Reinforcement'])) {
                    $d[$baseLevelCode]['Reinforcement'] = NULL;
                }
                if (!isset($d[$baseLevelCode]['Static_Wire'])) {
                    $d[$baseLevelCode]['Static_Wire'] = '';
                }
                if (!isset($d[$baseLevelCode]['Tube_Material'])) {
                    $d[$baseLevelCode]['Tube_Material'] = NULL;
                }
                if (!isset($d[$baseLevelCode]['Tube_Characteristic'])) {
                    $d[$baseLevelCode]['Tube_Characteristic'] = NULL;
                }
                if (!isset($d[$baseLevelCode]['Tube_Color'])) {
                    $d[$baseLevelCode]['Tube_Color'] = NULL;
                }
                if (!isset($d[$baseLevelCode]['Cover_Material'])) {
                    $d[$baseLevelCode]['Cover_Material'] = NULL;
                }
                if (!isset($d[$baseLevelCode]['Cover_Characteristic'])) {
                    $d[$baseLevelCode]['Cover_Characteristic'] = NULL;
                }
                if (!isset($d[$baseLevelCode]['Cover_color'])) {
                    $d[$baseLevelCode]['Cover_color'] = NULL;
                }
                if (!isset($d[$baseLevelCode]['Number_of_Helix_Wires'])) {
                    $d[$baseLevelCode]['Number_of_Helix_Wires'] = '';
                }
                if (!isset($d[$baseLevelCode]['Number_of_Plies'])) {
                    $d[$baseLevelCode]['Number_of_Plies'] = '';
                }

                if (empty($d[$baseLevelCode]['Weight_lb_ft'])) {
                    $d[$baseLevelCode]['Weight_lb_ft'] = $result['Weight_lb_ft'];
                }
                if (empty($d[$baseLevelCode]['Weight_G_M'])) {
                    $d[$baseLevelCode]['Weight_G_M'] = $result['Weight_G_M'];
                }
                if (empty($d[$baseLevelCode]['MinTemperature_Rating_F'])) {
                    $d[$baseLevelCode]['MinTemperature_Rating_F'] = $result['MinTemperature_Rating_F'];
                }
                if (empty($d[$baseLevelCode]['MinTemperature_Rating_C'])) {
                    $d[$baseLevelCode]['MinTemperature_Rating_C'] = $result['MinTemperature_Rating_C'];
                }
                if (empty($d[$baseLevelCode]['MaxTemperature_Rating_F'])) {
                    $d[$baseLevelCode]['MaxTemperature_Rating_F'] = $result['MaxTemperature_Rating_F'];
                }
                if (empty($d[$baseLevelCode]['MaxTemperature_Rating_C'])) {
                    $d[$baseLevelCode]['MaxTemperature_Rating_C'] = $result['MaxTemperature_Rating_C'];
                }
                if (empty($d[$baseLevelCode]['Reinforcement'])) {
                    $arr = explode("/", $result['Reinforcement']);
                    foreach ($arr as $rf) {
                        $d[$baseLevelCode]['Reinforcement'][$rf] = $rf;
                    }
                    unset($arr);
                }


                if(empty($d[$baseLevelCode]['Static_Wire'])) {
                    $d[$baseLevelCode]['Static_Wire'] = $result['Static_Wire'];
                }
                if(empty($d[$baseLevelCode]['Number_of_Helix_Wires'])) {
                    $d[$baseLevelCode]['Number_of_Helix_Wires'] = $result['Number_of_Helix_Wires'];
                }
                if(empty($d[$baseLevelCode]['Number_of_Plies'])) {
                    $d[$baseLevelCode]['Number_of_Plies'] = $result['Number_of_Plies'];
                }
                
                if (!empty($result['Tube_Material'])) {
                    $arr = explode("/", $result['Tube_Material']);
                    foreach ($arr as $tm) {
                        $d[$baseLevelCode]['Tube_Material'][$tm] = $tm;
                    }
                    unset($arr);
                }
                if (!empty($result['Tube_Characteristic'])) {
                    $arr = explode("/", $result['Tube_Characteristic']);
                    foreach ($arr as $tc) {
                        $d[$baseLevelCode]['Tube_Material'][$tc] = $tc;
                    }
                    unset($arr);
                }
                if (!empty($result['Tube_Color'])) {
                    $arr = explode("/", $result['Tube_Color']);
                    foreach ($arr as $tc) {
                        $d[$baseLevelCode]['Tube_Color'][$tc] = $tc;
                    }
                    unset($arr);
                }
                if (!empty($result['Cover_Material'])) {
                    $arr = explode("/", $result['Cover_Material']);
                    foreach ($arr as $cm) {
                        $d[$baseLevelCode]['Cover_Material'][$cm] = $cm;
                    }
                    unset($arr);
                }
                if (!empty($result['Cover_Characteristic'])) {
                    $arr = explode("/", $result['Cover_Characteristic']);
                    foreach ($arr as $cc) {
                        $d[$baseLevelCode]['Cover_Characteristic'][$cc] = $cc;
                    }
                    unset($arr);
                }
                if (!empty($result['Cover_color'])) {
                    $arr = explode("/", $result['Cover_color']);
                    foreach ($arr as $cc) {
                        $d[$baseLevelCode]['Cover_color'][$cc] = $cc;
                    }
                    unset($arr);
                }
            }
            $this->baseLevelRecords[$baseLevelCode] = $d[$baseLevelCode];



            //    $tubeMat[$result['']] = $result['Tube_Material'];
            $i++;
        }
    }
    private function sanitizeSkeleLevelData()
    {
        $unitConverter = \Pimcore::getContainer()->get('AppBundle\Services\UnitConverterService');
        $d = array();
        $rows = array();
        $i = 0;
        foreach ($this->skeleLevelRecords as $baseLevelCode => $results) {
            if (!isset($d[$baseLevelCode])) {
                $d[$baseLevelCode] = array();
            }

            foreach ($results as $K => $result) {
                if (!isset($d[$baseLevelCode]['Bend_Radius_in'])) {
                    $d[$baseLevelCode]['Bend_Radius_in'] = '';
                }
                if (!isset($d[$baseLevelCode]['Bend_Radius_mm'])) {
                    $d[$baseLevelCode]['Bend_Radius_mm'] = '';
                }
                if (!isset($d[$baseLevelCode]['Vacuum_Rating_in'])) {
                    $d[$baseLevelCode]['Vacuum_Rating_in'] = '';
                }
                if (!isset($d[$baseLevelCode]['Vacuum_Rating_mm'])) {
                    $d[$baseLevelCode]['Vacuum_Rating_mm'] = '';
                }
                if (!isset($d[$baseLevelCode]['Working_Pressure_Mpa'])) {
                    $d[$baseLevelCode]['Working_Pressure_Mpa'] = '';
                }
                if (!isset($d[$baseLevelCode]['Working_Pressure_PSI'])) {
                    $d[$baseLevelCode]['Working_Pressure_PSI'] = '';
                }
                if (!isset($d[$baseLevelCode]['Min_Burst_Pressure_PSI'])) {
                    $d[$baseLevelCode]['Min_Burst_Pressure_PSI'] = '';
                }
                if (!isset($d[$baseLevelCode]['Min_Burst_Pressure_Mpa'])) {
                    $d[$baseLevelCode]['Min_Burst_Pressure_Mpa'] = '';
                }
                if (!isset($d[$baseLevelCode]['Hose_ID_in_Fract_Nominal_ID'])) {
                    $d[$baseLevelCode]['Hose_ID_in_Fract_Nominal_ID'] = '';
                }
                if (!isset($d[$baseLevelCode]['Hose_ID_in_Dec_Actual_ID'])) {
                    $d[$baseLevelCode]['Hose_ID_in_Dec_Actual_ID'] = '';
                }
                if (!isset($d[$baseLevelCode]['Hose_ID_mm_Actual_ID'])) {
                    $d[$baseLevelCode]['Hose_ID_mm_Actual_ID'] = '';
                }
                if (!isset($d[$baseLevelCode]['Hose_OD_in'])) {
                    $d[$baseLevelCode]['Hose_OD_in'] = '';
                }
                if (!isset($d[$baseLevelCode]['Hose_OD_mm'])) {
                    $d[$baseLevelCode]['Hose_OD_mm'] = '';
                }
               
                if(empty($d[$baseLevelCode]['Bend_Radius_in'])) {
                    $d[$baseLevelCode]['Bend_Radius_in'] = $result['Bend_Radius_in'];
                }
                if(empty($d[$baseLevelCode]['Bend_Radius_mm'])) {
                    $d[$baseLevelCode]['Bend_Radius_mm'] = $result['Bend_Radius_mm'];
                }

                if(empty($d[$baseLevelCode]['Vacuum_Rating_in'])) {
                    $unit = $unitConverter->getGroupWithValues('VacuumIN', floatval($result['Vacuum_Rating_in']));
                    
                    $d[$baseLevelCode]['Vacuum_Rating_in'] = $unit['VacuumIN'];//$result['Vacuum_Rating_in'];
                    $d[$baseLevelCode]['Vacuum_Rating_mm'] = $unit['VacuumMM'];
                    unset($unit);
                }

                if(empty($d[$baseLevelCode]['Working_Pressure_Mpa'])) {
                    $unit = $unitConverter->getGroupWithValues('workingPressureMPA', floatval($result['Working_Pressure_Mpa']));
                    $d[$baseLevelCode]['Working_Pressure_Mpa'] = $unit['workingPressureMPA'];//$result['Working_Pressure_Mpa'];
                    $d[$baseLevelCode]['Working_Pressure_PSI'] = $unit['workingPressurePSI'];
                    unset($unit);
                }

                if(empty($d[$baseLevelCode]['Min_Burst_Pressure_PSI'])) {
                    $unit = $unitConverter->getGroupWithValues('minBurstPressurePSI', floatval($result['Min_Burst_Pressure_PSI']));
                    $d[$baseLevelCode]['Min_Burst_Pressure_PSI'] = $unit['minBurstPressurePSI'];
                    $d[$baseLevelCode]['Min_Burst_Pressure_Mpa'] = $result['minBurstPressurempa'];
                    unset($unit);
                }

                if(empty($d[$baseLevelCode]['Hose_ID_in_Fract_Nominal_ID'])) {
                    $d[$baseLevelCode]['Hose_ID_in_Fract_Nominal_ID'] = $result['Hose_ID_in_Fract_Nominal_ID'];
                }
                if(empty($d[$baseLevelCode]['Hose_ID_in_Dec_Actual_ID'])) {
                    $d[$baseLevelCode]['Hose_ID_in_Dec_Actual_ID'] = $result['Hose_ID_in_Dec_Actual_ID'];
                }
                
                if(empty($d[$baseLevelCode]['Hose_ID_mm_Actual_ID'])) {
                    $d[$baseLevelCode]['Hose_ID_mm_Actual_ID'] = $result['Hose_ID_mm_Actual_ID'];
                }

                if(empty($d[$baseLevelCode]['Hose_OD_in'])) {
                    $d[$baseLevelCode]['Hose_OD_in'] = $result['Hose_OD_in'];
                }

                if(empty($d[$baseLevelCode]['Hose_OD_mm'])) {
                    $d[$baseLevelCode]['Hose_OD_mm'] = $result['Hose_OD_mm'];
                }
                       
            }
            
            $this->skeleLevelRecords[$baseLevelCode] = $d[$baseLevelCode];
          
            $i++;
        }
    }

    private function mapBaseLevelId(&$arr, $keys)
    {
        $sql = "SELECT o_id, o_key FROM object_1 WHERE o_key IN (" . implode(",", $keys) . ")";
        $results = $this->db->fetchAll($sql);
        foreach ($results as $result) {
            if (array_key_exists($result['o_key'], $arr)) {
                $arr[$result['o_key']]['level6n9digit_id'] = $result['o_id'];
            }
        }
    }

    /**
     * It will update Industrial hoses bricks at base and skeleton level
     * @param array result set
     * @param string Table name
     */
    private function updateBrickTable($results, $table)
    {
        $pf = 'o_key'; // Primary Fields
        if (!empty($results)) {
            $i = 1;

            foreach ($results as $result) {
                if ($i % 100 == 0) {
                    p_r("Processing record of ($table): $i");
                }
                $i++;
                $sql = "UPDATE `$table` SET";
                $cond = "";
                $wh = "";
                $valueArray = [];
                foreach ($result as $key => $value) {
                    if ($key == 'o_key')
                        continue;
                    if (!empty($cond)) {
                        $cond .= ", ";
                    }
                    if (!is_null($value)) {
                        $cond .= " `$key`=" . $this->db->quote($value);
                    } else {
                        $cond .= " `$key`=NULL";
                    }
                }
                $wh = " WHERE o_id IN (SELECT o_id FROM object_1 WHERE o_key='" . $result['o_key'] . "')";
                // echo $sql . $cond . $wh;die;
                $this->db->query($sql . $cond . $wh);
            }
        }
    }

    /**
     * Loading Masters
     * Class: Multiselector
     * ClassId = 22
     * View: object_22
     */
    private function loadMaster()
    {
        $where = "";
        $sql = "SELECT o_id, masterType, o_key FROM object_22 ";
        foreach ($this->masterTypes as $type) {
            if (empty($where)) {
                $where = " WHERE o_published=1 AND  masterType LIKE '%$type%'";
            } else {
                $where .= " OR masterType LIKE '%$type%'";
            }
        }
        $results = $this->db->query($sql . $where);
        foreach ($results as $result) {
            $type = array_search($result['masterType'], $this->masterTypes);
            $this->masters[$type][$result['o_id']] = strtolower($result['o_key']);
            unset($type);
        }
        unset($results);
        /* Loading Brands */
        $sql = "SELECT o_id, `name` FROM object_3 WHERE o_published=1";
        $results = $this->db->query($sql);
        foreach ($results as $result) {
            $type = array_search($result['masterType'], $this->masterTypes);
            $this->brands[$result['o_id']] = strtolower($result['name']);
            unset($type);
        }
    }

    /**
     * @param $masterKey: key name of the master array
     * $items: array which value have to be checked in master array
     * return type array
     * array elements
     * * items: list of matched value
     * * itemNotFound: list of searched item which not found in master
     * 
     */
    private function getMultiselectInfo($masterKey, $items)
    {
        $res = array();
        $itemNotFound = array();
        $hayStackArr = isset($this->masters[$masterKey]) && is_array($this->masters[$masterKey]) ? $this->masters[$masterKey] : array();
        foreach ($items as $val) {
            $item = array_search(strtolower(trim($val)), $hayStackArr) ?: false;
            if ($item === false) {
                $itemNotFound[] = ucfirst($val);
            } else {
                array_push($res, $item);
            }
        }
        unset($hayStackArr, $items);
        return array(
            'items' =>  $res,
            'itemNotFound' => !empty($itemNotFound) ? implode(",", $itemNotFound) : false
        );
    }

    /**
     * It will return brand ids
     * @param Brand information
     * return array (brand_ids)
     */
    private function getBrands($items)
    {
        $res = array();
        $itemNotFound = array();
        $hayStackArr = is_array($this->brands) ? $this->brands : array();
        foreach ($items as $val) {
            $item = array_search(trim($val), $hayStackArr) ?: false;
            if ($item === false) {
                $itemNotFound[] = ucfirst($val);
            } else {
                array_push($res, $item);
            }
        }
        unset($hayStackArr, $items);
        return array(
            'items' =>  $res,
            'itemNotFound' => !empty($itemNotFound) ? implode(",", $itemNotFound) : false
        );
    }


    private function updateTable($results, $table)
    {
        try {
            $rowCount = 1;
            $values = '';
            if (!empty($results)) {
                $sql = "INSERT INTO {$table}";
                $firstRow = $results[0];
                $keys = array_keys($firstRow);
                $valColumns = [];
                foreach ($keys as $key) {
                    $sqlColumns[] = "`" . $key . "`";
                    if ($key != 'o_id') {
                        $updateColumns[] = "`" . $key . "`= VALUES(`" . $key . "`)";
                    }
                    $valColumns[] = $key;
                }
                $sql = $sql . " (" . implode(",", $sqlColumns) . ") VALUES ";
                $update = " ON DUPLICATE KEY UPDATE " . implode(",", $updateColumns);
                foreach ($results as $r) {
                    $valueArray = [];
                    foreach ($valColumns as $key) {
                        if (!is_null($r[$key])) {
                            $valueArray[] = $this->db->quote($r[$key]);
                        } else {
                            $valueArray[] = "NULL";
                        }
                    }
                    $values .= '(' . implode(",", $valueArray) . '),';

                    if ($rowCount % self::BATCH_SIZE == 0) {
                        $query = $sql . rtrim($values, ',') . $update;
                        $this->db->query($query);
                        $values = '';
                    }
                    $rowCount++;
                }
                if (!empty($values)) {
                    $query = $sql . rtrim($values, ',') . $update;
                    $this->db->query($query);
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            p_r($th->getMessage());
        }
        unset($results, $table);
    }

    /**
     * LBS to Gram converter
     */
    private function lbsTogram($lb)
    {
        if (false !== $lb) {
            return number_format($lb / 0.0022046, 5, '.', '');
        }
        return;
    }

    /**
     * Gram to LBS converter
     */
    private function gramToLbs($g)
    {
        if (false !== $g) {
            return number_format($g * 0.0022046, 5, '.', '');
        }
    }

    private function updateLog()
    {
        p_r('Updating Log..');
        $sql = "SELECT oht.* FROM oti_hosedata_temp oht LEFT JOIN object_1 o ON(o.articleNumber=oht.`Object`) WHERE o.o_id is null";
        $data = $this->db->query($sql);
        $this->insertDataToLogTable($data, "Failed", "Object does not match in material mara");
    }

    public function getCSVData($fileName)
    {
        try {
            $columns = ['Object', 'Mat_Group', 'Plant', 'old_Mat', '6_Digts', 'Product_H', 'Description', 'Brand_Name', 'Tube_Material', 'Tube_Characteristic', 'Tube_Color', 'Cover_Material', 'Cover_Characteristic', 'Cover_color', 'Reinforcement', 'MinTemperature_Rating_F', 'MinTemperature_Rating_C', 'MaxTemperature_Rating_F', 'MaxTemperature_Rating_C', 'Static_Wire', 'Number_of_Helix_Wires', 'Number_of_Plies', 'Hose_Length_ft', 'Hose_Length_M', 'Hose_ID_in_Fract_Nominal_ID', 'Hose_ID_in_Dec_Actual_ID', 'Hose_ID_mm_Actual_ID', 'Hose_OD_in', 'Hose_OD_mm', 'Working_Pressure_Mpa', 'Working_Pressure_PSI', 'Min_Burst_Pressure_PSI', 'Min_Burst_Pressure_Mpa', 'Bend_Radius_in', 'Bend_Radius_mm', 'Vacuum_Rating_in', 'Vacuum_Rating_mm', 'Fitting_1_Type', 'Fitting_1_Size_FRACT', 'Fitting_1_Material', 'Fitting_2_Type', 'Fitting_2_Size_FRACT', 'Fitting_2_Material', 'Assembly_Not_Assembly', 'Weight_lb_ft', 'Weight_G_M'];

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

    private function truncateTemp()
    {
        $sql = "TRUNCATE oti_hosedata_temp;";
        $this->db->query($sql);
    }

    public function insertDataToLogTable($data, $success = "", $failedReason = "")
    {
        try {
            $rowCount = 1;
            $sql = "INSERT INTO oti_hosedata_log (id, record, statusCode, failedReason, createdAt) VALUES";
            foreach ($data as $dataKey => $dataValue) {
                $success = isset($dataValue['statusCode']) ? $dataValue['statusCode'] : $success;
                $failedReason = isset($dataValue['failedReason']) ? $dataValue['failedReason'] : $failedReason;
                if (isset($dataValue['statusCode'])) {
                    unset($dataValue['statusCode']);
                }
                if (isset($dataValue['failedReason'])) {
                    unset($dataValue['failedReason']);
                }
                $values .= '("' . $dataValue['Object'] . '", "' . addslashes(json_encode($dataValue)) . '", "' . $success . '","' . $failedReason . '",now()),';
                // inserting records in batch
                if ($rowCount % self::BATCH_SIZE == 0) {
                    $query = $sql . rtrim($values, ',');
                    $this->db->query($query);
                    $values = '';
                }
                $rowCount++;
            }
            if ($values) {
                $query = $sql . rtrim($values, ',');
                $this->db->query($query);
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    /**
     * Will create all required temp table
     */
    private function createTempTable()
    {
        $sql1 = "CREATE TABLE IF NOT EXISTS `oti_hosedata_temp` (
            `Object` varchar(25) NOT NULL,
            `Mat_Group` varchar(45) NOT NULL,
            `Plant` varchar(20) NOT NULL,
            `old_Mat` varchar(20) NOT NULL,
            `6_Digts` varchar(20) NOT NULL,
            `Product_H` varchar(25) NOT NULL,
            `Description` text NOT NULL,
            `Brand_Name` varchar(40) NOT NULL,
            `Tube_Material` varchar(45) NOT NULL,
            `Tube_Characteristic` varchar(45) NOT NULL,
            `Tube_Color` varchar(45) NOT NULL,
            `Cover_Material` varchar(100) NOT NULL,
            `Cover_Characteristic` varchar(45) NOT NULL,
            `Cover_color` varchar(100) NOT NULL,
            `Reinforcement` varchar(100) NOT NULL,
            `MinTemperature_Rating_F` varchar(10) NOT NULL,
            `MinTemperature_Rating_C` varchar(10) NOT NULL,
            `MaxTemperature_Rating_F` varchar(10) NOT NULL,
            `MaxTemperature_Rating_C` varchar(10) NOT NULL,
            `Static_Wire` varchar(10) NOT NULL,
            `Number_of_Helix_Wires` varchar(10) NOT NULL,
            `Number_of_Plies` varchar(10) NOT NULL,
            `Hose_Length_ft` varchar(10) NOT NULL,
            `Hose_Length_M` varchar(10) NOT NULL,
            `Hose_ID_in_Fract_Nominal_ID` varchar(10) NOT NULL,
            `Hose_ID_in_Dec_Actual_ID` varchar(10) NOT NULL,
            `Hose_ID_mm_Actual_ID` varchar(10) NOT NULL,
            `Hose_OD_in` varchar(10) NOT NULL,
            `Hose_OD_mm` varchar(10) NOT NULL,
            `Working_Pressure_Mpa` varchar(10) NOT NULL,
            `Working_Pressure_PSI` varchar(10) NOT NULL,
            `Min_Burst_Pressure_PSI` varchar(10) NOT NULL,
            `Min_Burst_Pressure_Mpa` varchar(10) NOT NULL,
            `Bend_Radius_in` varchar(10) NOT NULL,
            `Bend_Radius_mm` varchar(10) NOT NULL,
            `Vacuum_Rating_in` varchar(10) NOT NULL,
            `Vacuum_Rating_mm` varchar(10) NOT NULL,
            `Fitting_1_Type` varchar(45) NOT NULL,
            `Fitting_1_Size_FRACT` varchar(10) NOT NULL,
            `Fitting_1_Material` varchar(45) NOT NULL,
            `Fitting_2_Type` varchar(45) NOT NULL,
            `Fitting_2_Size_FRACT` varchar(10) NOT NULL,
            `Fitting_2_Material` varchar(45) NOT NULL,
            `Assembly_Not_Assembly` varchar(100) NOT NULL,
            `Weight_lb_ft` varchar(10) NOT NULL,
            `Weight_G_M` varchar(10) NOT NULL,
            PRIMARY KEY (`Object`),
            KEY `old_Mat` (`old_Mat`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $sql2 = "CREATE TABLE IF NOT EXISTS `oti_hosedata_log` (
            `logId` bigint(20) NOT NULL AUTO_INCREMENT,
            `id` varchar(30) NOT NULL,
            `record` longtext,
            `statusCode` char(25) DEFAULT NULL,
            `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `failedReason` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`logId`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $sql = $sql1 . $sql2;
        //   echo $sql1;
        $this->db->query($sql);
    }
}
