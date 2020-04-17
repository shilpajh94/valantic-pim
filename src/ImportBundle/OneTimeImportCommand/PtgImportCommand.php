<?php

/**
 * File Path: /home/praganosis/Working/CSV/ptg_import.csv (Your File path on system)
 * Command: bin/console conti:onetimeimport:ptg /home/praganosis/Working/CSV/ptg_import.csv
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

class PtgImportCommand extends AbstractCommand
{

    const PTG_BASE_OBJECT_BRICK_QUERY = 'object_brick_query_PTGBase_1';
    const PTG_BASE_OBJECT_BRICK_STORE = 'object_brick_store_PTGBase_1';
    const PTG_BASE_OBJECT_BRICK_LOCALIZED = 'object_brick_localized_PTGBase_1';
    const PTG_BASE_OBJECT_BRICK_LOCALIZED_QUERY_EN = 'object_brick_localized_query_PTGBase_1_en';

    const PTG_SKELETON_OBJECT_BRICK_QUERY = 'object_brick_query_PTGSkeleton_1';
    const PTG_SKELETON_OBJECT_BRICK_STORE = 'object_brick_store_PTGSkeleton_1';

    const PTG_FERT_OBJECT_BRICK_QUERY = 'object_brick_query_PTGFert_1';
    const PTG_FERT_OBJECT_BRICK_STORE = 'object_brick_store_PTGFert_1';

    const BELTS_FERT_OBJECT_BRICK_QUERY = 'object_brick_query_BeltsFert_1';
    const BELTS_FERT_OBJECT_BRICK_STORE = 'object_brick_store_BeltsFert_1';

    const SYNC_FERT_OBJECT_BRICK_QUERY = 'object_brick_query_SynchronousFert_1';
    const SYNC_FERT_OBJECT_BRICK_STORE = 'object_brick_store_SynchronousFert_1';

    const METAL_FERT_OBJECT_BRICK_QUERY = 'object_brick_query_MetalFert_1';
    const METAL_FERT_OBJECT_BRICK_STORE = 'object_brick_store_MetalFert_1';

    const PRODUCT_LOCALIZED_DATA = 'object_localized_data_1';
    const PRODUCT_LOCALIZED_QUERY_L = 'object_localized_query_1_en';

    const BATCH_SIZE = 1000;
    private $langArr;
    private $db;
    private $t;
    protected function configure()
    {
        $this->setName('conti:onetimeimport:ptg')
            ->setDescription('PTG Import')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $this->db = Db::get();
        $this->t = time();
        $this->langArr = \Pimcore\Tool::getValidLanguages();
        if (is_file($filePath)) {
            p_r('Script started at: '.date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->createTempTable();
            $this->import($filePath);
            $this->updateBase();
            $this->updateSkeleton();
            $this->updateFert();
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: '.(abs(time() - $this->t) / 60).' mnt');
        }
    }

    private function import($filePath) {
        p_r('Importing data into temp table');
        $results = $this->getCSVData($filePath);
        $this->truncateTemp($results);
        $this->updateTable($results, 'ptg_import');
        $this->filterSiopLvl5Data();
        $this->filterSiopLvl6Data();
    }

   
    /**
     * Updating siopLvl5 temp table with siop level 5 data
    */
    private function filterSiopLvl5Data() {
        p_r('Filtering Siop Level 5(Base Level) Data');
        $sql = "INSERT INTO siopLvl5_objects SELECT o1_2.o_id as siopLvl5_object_id, o1_2.siopFullCode, pi.* FROM ptg_import pi JOIN object_1 o1_1 ON(o1_1.articleNumber=pi.SAPMaterialCode)
        JOIN object_1 o1_2 ON(o1_2.siopFullCode=SUBSTR(o1_1.siopFullCode, 1, 16)) ON DUPLICATE KEY UPDATE siopLvl5_objects.Width_in=siopLvl5_objects.Width_in;";
        $this->db->query($sql);
    }

    /**
     * Updating siopLvl6 temp table with siop level 5 data
    */
    private function filterSiopLvl6Data() {
        p_r('Filtering Siop Level 6(Skeleton Level) Data');
        $sql = "INSERT INTO siopLvl6_objects SELECT o1_2.o_id as siopLvl6_object_id, o1_2.siopFullCode, pi.* FROM ptg_import pi JOIN object_1 o1_1 ON(o1_1.articleNumber=pi.SAPMaterialCode)
        JOIN object_1 o1_2 ON(o1_2.siopFullCode=o1_1.siopFullCode) JOIN object_2 ctgry ON(ctgry.fullCode=o1_2.siopFullCode)
        WHERE o1_2.o_key=ctgry.o_key ON DUPLICATE KEY UPDATE siopLvl6_objects.Width_in=siopLvl6_objects.Width_in;";
        $this->db->query($sql);
    }

    /**
     * Updating siop level 5 data (PTG base level)
     * Getting list of base leve data through query
     * 
     */
    private function updateBase()
    {
        $sql = "SELECT siopLvl5_object_id o_id, 'Base' as fieldname, Material material, Min_Temperature_F minimumTemperatureF, Min_Temperature_C minimumTemperatureC, Reinforcement reinforcement, Max_Temperature_F maximumTemperatureF, Max_Temperature_C maximumTemperatureC FROM siopLvl5_objects";
        $results = $this->db->fetchAll($sql);
        // Update Query Table

        $records = $this->getBaseBrickData($results);
        p_r('Processing '.count($results).' records at base level');
        p_r('Updating Base Level');
        $this->updateTable($records, self::PTG_BASE_OBJECT_BRICK_QUERY);
        // Update Store Table
        $this->updateTable($records, self::PTG_BASE_OBJECT_BRICK_STORE);
        p_r('Base Level Updation - Done');
        // Update localized base brick
        /* Commenting below code due to deletion of fields from PTGBase bricks
        $records = $this->getBaseBrickLocalizedData($results);
        $this->updateTable($records['localizeData'], self::PTG_BASE_OBJECT_BRICK_LOCALIZED);
        $this->updateTable($records['localizedQueryDataEN'], self::PTG_BASE_OBJECT_BRICK_LOCALIZED_QUERY_EN);
         */
    }

    /**
     * Updating siop level 5 data (PTG base level)
     * Getting list of skeleton leve data through query
     * 
     */
    private function updateSkeleton()
    {
        /* Field missing in the sheet */
        /**
         * beltAngle, height
         */
        $sql = "SELECT siopLvl6_object_id o_id, 'Skeleton' as fieldname, `Profile`, Static_Conductive staticConductive, 
        Heat_and_Oil_Resistant heatOilResistant FROM siopLvl6_objects";
        $results = $this->db->fetchAll($sql);
        $records = $this->getSkeletonBricks($results);
        p_r('Processing '.count($results).' records at skeleton level');
        p_r('Updating skeleton');
        $this->updateTable($records, self::PTG_SKELETON_OBJECT_BRICK_QUERY);
        $this->updateTable($records, self::PTG_SKELETON_OBJECT_BRICK_STORE);
        p_r('Skeleton Updation - Done');
    }

    /**
     * Updating all associated bricks at PTG Fert level
     * Getting all available records for updating through query
     * Received result will have all filtered data by matching sap code in object_1 table with articleNumber
     * Getting mapped bricks object id by looking it into brick tables
     * If brick id will not null then it will update the record 
     */

    private function updateFert()
    {
        // $sql = "SELECT o.o_id, pi.*, 'Digit14' as fieldname FROM ptg_import pi JOIN object_1 o ON(o.articleNumber=pi.SAPMaterialCode)";
        $sql = "SELECT o.o_id, ptgf.o_id ptg_fert_oid, ptgblts.o_id ptg_belt_oid, ptgsync.o_id ptg_sync_oid, 
        ptgmtl.o_id ptg_metal_oid, pi.*, 'Fert' as fieldname FROM ptg_import pi 
        JOIN object_1 o ON(o.articleNumber=pi.SAPMaterialCode) 
        LEFT JOIN object_brick_query_PTGFert_1 ptgf ON(ptgf.o_id=o.o_id) 
        LEFT JOIN object_brick_query_BeltsFert_1 ptgblts ON(ptgblts.o_id=o.o_id) 
        LEFT JOIN object_brick_query_SynchronousFert_1 ptgsync ON(ptgsync.o_id=o.o_id) 
        LEFT JOIN object_brick_query_MetalFert_1 ptgmtl ON(ptgmtl.o_id=o.o_id)";
        $results = $this->db->fetchAll($sql);

        p_r('Processing '.count($results).' records at fert level');
        $records = $this->getFertData($results);
        // p_r($records['ptgFertQuery']);die;
        
        if (isset($records['productLocalizedData']) && !empty($records['productLocalizedData'])) {
            p_r('Updating Product Localized Data');
            $this->updateTable($records['productLocalizedData'], self::PRODUCT_LOCALIZED_DATA);
            $this->updateTable($records['productLocalizedData'], self::PRODUCT_LOCALIZED_QUERY_L);
            p_r('Product Localized Data Updation Done');
        }

        if (isset($records['ptgFertQuery']) && !empty($records['ptgFertQuery'])) {
            p_r('Updating PTG Fert');
            $this->updateTable($records['ptgFertQuery'], self::PTG_FERT_OBJECT_BRICK_QUERY);
            $this->updateTable($records['ptgFertQuery'], self::PTG_FERT_OBJECT_BRICK_STORE);
            p_r('PTG Fert Updation Done');
        }
        if (isset($records['beltsFertQuery']) && !empty($records['beltsFertQuery'])) {
            p_r('Updating Belts Fert');
            $this->updateTable($records['beltsFertQuery'], self::BELTS_FERT_OBJECT_BRICK_QUERY);
            $this->updateTable($records['beltsFertQuery'], self::BELTS_FERT_OBJECT_BRICK_STORE);
            p_r('Belts Fert Updation Done');
        }
        if (isset($records['syncFertQuery']) && !empty($records['syncFertQuery'])) {
            p_r('Sync Fert Updating');
            $this->updateTable($records['syncFertQuery'], self::SYNC_FERT_OBJECT_BRICK_QUERY);
            $this->updateTable($records['syncFertStore'], self::SYNC_FERT_OBJECT_BRICK_STORE);
            p_r('Sync Fert Updation Done');
        }
        if (isset($records['metalFertQuery']) && !empty($records['metalFertQuery'])) {
            p_r('Metal Fert Updating');
            $this->updateTable($records['metalFertQuery'], self::METAL_FERT_OBJECT_BRICK_QUERY);
            $this->updateTable($records['metalFertQuery'], self::METAL_FERT_OBJECT_BRICK_STORE);
            p_r('Metal Fert Updation Done');
        }
        $this->insertDataToLogTable($results);
    }

    /**
     * Get all bricks and product class localized mapped data
    */
    private function getFertData($results)
    {
        $d = array();
        /**
         * Commented fields are missing, means not found in imported sheet
         */
        $productLocalizedData = array();
        $productLocalizedQueryL = array();
        $ptgFertQuery = array();
        $ptgFertStore = array();
        $beltsFertQuery = array();
        $beltsFertStore = array();
        $syncFertQuery = array();
        $syncFertStore = array();
        $metalFertQuery = array();
        $metalFertStore = array();
        foreach ($results as $r) {
            // Product Level Data
            $ar = array(
                'ooo_id'    =>  $r['o_id'],
                'language'  =>  'en',
                'FeaturesBenefitsBulletPoint1'  =>  !$this->isSheetValueEmpty($r['Bullet_Point_1'])?$r['Bullet_Point_1']:'',
                'FeaturesBenefitsBulletPoint2'  =>  !$this->isSheetValueEmpty($r['Bullet_Point_2'])?$r['Bullet_Point_2']:'',
                'FeaturesBenefitsBulletPoint3'  =>  !$this->isSheetValueEmpty($r['Bullet_Point_3'])?$r['Bullet_Point_3']:'',
                'FeaturesBenefitsBulletPoint4'  =>  !$this->isSheetValueEmpty($r['Bullet_Point_4'])?$r['Bullet_Point_4']:'',
                'FeaturesBenefitsBulletPoint5'  =>  !$this->isSheetValueEmpty($r['Bullet_Point_5'])?$r['Bullet_Point_5']:'',
                'longDescription'  =>  !$this->isSheetValueEmpty($r['LongDescriptionHTML'])?$r['LongDescriptionHTML']:''
            );
            array_push($productLocalizedData, $ar);
            // array_push($productLocalizedQueryL, $ar);
            unset($ar);
            // PTG Fert
            if (!empty($r['ptg_fert_oid'])) {
                $ar = array(
                    'o_id'      =>  $r['o_id'],
                    'fieldname'     =>  $r['fieldname'],
                    'color'   =>  !$this->isSheetValueEmpty($r['Color']) ? ucfirst(strtolower($r['Color'])): '',
                    // 'customerProductFamily'   =>  $r[''],
                    // 'heightIn'   =>  $r[''],
                    // 'heightmm'   =>  $r[''],
                    'widthmm'   =>  !$this->isSheetValueEmpty($r['Width_mm']) ? $r['Width_mm'] : NULL,
                    'widthIn'   =>  !$this->isSheetValueEmpty($r['Width_in']) ? $r['Width_in'] : NULL,
                    // 'CADFile'   =>  $r[''],
                    // 'CADLink'   =>  $r[''],
                    // 'PDFDrawing'   =>  $r[''],
                    // 'PDFLink'   =>  $r[''],
                );
                array_push($ptgFertQuery, $ar);
                // array_push($ptgFertStore, $ar);
                unset($ar);
            }

            // Belt Fert
            if (!empty($r['ptg_belt_oid'])) {
                $ar = array(
                    'o_id' =>  $r['o_id'],
                    'fieldname' =>  $r['fieldname'],
                    // 'effectiveLengthUOM' => '',
                    // 'numberOfBands' =>  '',
                    'insideLengthIN' => !$this->isSheetValueEmpty($r['Product_inside_Length_in']) ? $r['Product_inside_Length_in']: NULL,
                    'insideLengthMM' => !$this->isSheetValueEmpty($r['Product_inside_Length_mm']) ? $r['Product_inside_Length_mm']: NULL,
                    'datumLengthIn' => !$this->isSheetValueEmpty($r['Datum_Length_in']) ? $r['Datum_Length_in'] : NULL,
                    'datumLengtMM' => !$this->isSheetValueEmpty($r['Datum_Length_mm']) ? $r['Datum_Length_mm'] : NULL,
                    'outsideLengthIN' => !$this->isSheetValueEmpty($r['Outside_Length_in']) ? $r['Outside_Length_in'] : NULL,
                    'outsideLengtMM' => !$this->isSheetValueEmpty($r['Outside_Length_mm']) ? $r['Outside_Length_mm'] : NULL,
                    // 'productEffectiveLengthIn__value' => '',
                    // 'productEffectiveLengthIn__unit ' => '',
                    // 'productEffectiveLengthMM__value' => '',
                    // 'productEffectiveLengthMM__unit' => ''
                );
                array_push($beltsFertQuery, $ar);
                // array_push($beltsFertStore, $ar);
                unset($ar);
            }


            // Synchronouse Fert
            if (!empty($r['ptg_sync_oid'])) {
                $ar = array(
                    'o_id' =>  $r['o_id'],
                    'fieldname' =>  $r['fieldname'],
                    'pitchIN' =>  !$this->isSheetValueEmpty($r['Pitch_in']) ? $r['Pitch_in'] : NULL,
                    'pitchMM' => !$this->isSheetValueEmpty($r['Pitch_mm ']) ? $r['Pitch_mm '] : NULL,
                    'numberOfTeeth' =>  !$this->isSheetValueEmpty($r['Number_of_teeth ']) ? $r['Number_of_teeth '] : NULL,
                );

                array_push($syncFertQuery, $ar);
                unset($ar['numberOfTeeth']);
                array_push($syncFertStore, $ar);
                unset($ar);
            }

            if (!empty($r['ptg_metal_oid'])) {
                $ar = array(
                    'o_id'  =>  $r['o_id'],
                    'fieldname'  =>  $r['fieldname'],
                    'boreType'  =>  !$this->isSheetValueEmpty($r['Bore_Type']) ? $r['Bore_Type'] : '',
                    'flange'  =>  !$this->isSheetValueEmpty($r['Flanges_Yes_No']) && strtolower($r['Flanges_Yes_No']) == 'y' ? 1 : NULL,
                    'maxBoreSizeIN'  =>  !$this->isSheetValueEmpty($r['Max_Bore_Size_in']) ? $r['Max_Bore_Size_in'] : NULL,
                    'maxBoreSizeMM'  =>  !$this->isSheetValueEmpty($r['Max_Bore_Size_mm']) ? $r['Max_Bore_Size_mm'] : NULL,
                    'flangeDiameterIn'  =>  !$this->isSheetValueEmpty($r['Flange_Outer_Diameter_in']) ? $r['Flange_Outer_Diameter_in'] : NULL,
                    'flangeDiameterMm'  =>  !$this->isSheetValueEmpty($r['Flange_Outer_Diameter_mm']) ? $r['Flange_Outer_Diameter_mm'] : NULL
                );

                $ar['outsideDiameterIn'] = NULL;
                $ar['outsideDiameterMm'] = NULL;
                $ar['pitchDiameterIn'] = NULL;
                $ar['pitchDiameterMm'] = NULL;
                $ar['faceWidthIn'] = NULL;
                $ar['faceWidthMm'] = NULL;
                $ar['minBoreIn'] = NULL;
                $ar['minBoreMm'] = NULL;
                if (!$this->isSheetValueEmpty($r['Outside_Diameter_in'])) {
                    $ar['outsideDiameterIn'] = $r['Outside_Diameter_in'];
                }
                if (!$this->isSheetValueEmpty($r['Outside_Diameter_mm'])) {
                    $ar['outsideDiameterMm'] = $r['Outside_Diameter_mm'];
                }
                if (!$this->isSheetValueEmpty($r['Pitch_Diameter_in'])) {
                    $ar['pitchDiameterIn'] = $r['Pitch_Diameter_in'];
                }
                if (!$this->isSheetValueEmpty($r['Pitch_Diameter_mm'])) {
                    $ar['pitchDiameterMm'] = $r['Pitch_Diameter_mm'];
                }
                if (!$this->isSheetValueEmpty($r['Face_Width_in'])) {
                    $ar['faceWidthIn'] = $r['Face_Width_in'];
                }
                if (!$this->isSheetValueEmpty($r['Face_Width_mm'])) {
                    $ar['faceWidthMm'] = $r['Face_Width_mm'];
                }
                if (!$this->isSheetValueEmpty($r['Min_Bore_Size_in_Bushings'])) {
                    $ar['minBoreIn'] = $r['Min_Bore_Size_in_Bushings'];
                }
                if (!$this->isSheetValueEmpty($r['Min_Bore_Size_mm'])) {
                    $ar['minBoreMm'] = $r['Min_Bore_Size_mm'];
                }
                array_push($metalFertQuery, $ar);
                // array_push($metalFertStore, $ar);
                unset($ar);
            }
        }
        return array(
            'ptgFertQuery'      =>  $ptgFertQuery,
            'ptgFertStore'      =>  $ptgFertStore,
            'beltsFertQuery'    =>  $beltsFertQuery,
            'beltsFertStore'    =>  $beltsFertStore,
            'syncFertQuery'     =>  $syncFertQuery,
            'syncFertStore'     =>  $syncFertStore,
            'metalFertQuery'    =>  $metalFertQuery,
            'metalFertStore'    =>  $metalFertStore,
            'productLocalizedData'  =>  $productLocalizedData,
            'productLocalizedQueryL' =>  $productLocalizedQueryL
        );
    }

    private function isSheetValueEmpty($str)
    {
        if (empty(trim($str)) || trim($str) == '-')
            return true;
        return false;
    }

    private function getBaseBrickData($results)
    {
        $d = array();
        foreach ($results as $r) {
            $d[] = array(
                'o_id'  =>  $r['o_id'],
                'fieldname'  =>  $r['fieldname'],
                'material'  =>  !$this->isSheetValueEmpty($r['material'])?$r['material']:'',
                'minimumTemperatureF'  =>  !$this->isSheetValueEmpty($r['minimumTemperatureF'])?$r['minimumTemperatureF']:NULL,
                'minimumTemperatureC'  =>  !$this->isSheetValueEmpty($r['minimumTemperatureC'])?$r['minimumTemperatureC']:NULL,
                'reinforcement'  =>  !$this->isSheetValueEmpty($r['reinforcement'])?$r['reinforcement']:'',
                'maximumTemperatureF'  =>  !$this->isSheetValueEmpty($r['maximumTemperatureF'])?$r['maximumTemperatureF']:NULL,
                'maximumTemperatureC'  =>  !$this->isSheetValueEmpty($r['maximumTemperatureC'])?$r['maximumTemperatureC']:NULL
            );
        }
        return $d;
    }

    private function getSkeletonBricks($results) {
        $d = array();
        foreach ($results as $r) {
            $d[] = array(
                'o_id'  =>  $r['o_id'],
                'fieldname'  =>  $r['fieldname'],
                'profile'  =>  !$this->isSheetValueEmpty($r['Profile'])?$r['Profile']:'',
                // 'beltAngle'  =>  !$this->isSheetValueEmpty($r['minimumTemperatureF'])?$r['minimumTemperatureF']:NULL,
                // 'heightIn'  =>  !$this->isSheetValueEmpty($r['minimumTemperatureC'])?$r['minimumTemperatureC']:NULL,
                // 'heightMm'  =>  !$this->isSheetValueEmpty($r['reinforcement'])?$r['reinforcement']:'',
                'staticConductive'  =>  !$this->isSheetValueEmpty($r['staticConductive'])?$r['staticConductive']:NULL,
                'heatOilResistant'  =>  !$this->isSheetValueEmpty($r['heatOilResistant'])?$r['heatOilResistant']:NULL
            );
        }
        return $d;
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
                        if(!is_null($key)) {
                            $valueArray[] = $this->db->quote($r[$key]);
                        } else {
                            $valueArray[] = $r[$key];
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


    private function truncateTemp($results){
        $sql = "TRUNCATE siopLvl5_objects; TRUNCATE siopLvl6_objects; TRUNCATE ptg_import;";
        $this->db->query($sql);
    }

    public function insertDataToLogTable($data, $flag = true)
    {
        try {
            if($flag) {
                p_r("Updating Log..");
            }
            $rowCount = 1;
            $sql = "INSERT INTO ptg_import_log (id, record, statusCode, failedReason, createdAt) VALUES";
            foreach ($data as $dataKey => $dataValue) {
                if($flag) {
                    $values .= '("'.$dataValue['SAPMaterialCode'].'", "'.addslashes(json_encode($dataValue)).'", "Success","",now()),';
                } else {
                    $values .= '("'.$dataValue['SAPMaterialCode'].'", "'.addslashes(json_encode($dataValue)).'", "Failed","Sap Code not found in material mara sheet",now()),';
                }                
                // inserting records in batch
                if ($rowCount % self::BATCH_SIZE == 0) {
                    $query = $sql.rtrim($values, ',');
                    $this->db->query($query);
                    $values = '';
                }
                $rowCount++;
            }
            if($values)
            {
                $query = $sql.rtrim($values, ',') ;
                $this->db->query($query);
            }
            $data = null;
            if($flag) {
                $flag = false;
                $sql = "SELECT pi.* FROM ptg_import pi LEFT JOIN object_1 o ON(o.articleNumber=pi.SAPMaterialCode) WHERE o.o_id is null";                
                $data = $this->db->fetchAll($sql);
                $this->insertDataToLogTable($data, false);
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getCSVData($fileName)
    {
        try {
            $columns = ['SAPMaterialCode', 'Product_Hrc_Lvl2_Name', 'Product_Hrc_Lvl3_Name', 'Product_Hrc_Lvl4_Name', 'LongDescriptionHTML', 'Bullet_Point_1', 'Bullet_Point_2', 'Bullet_Point_3', 'Bullet_Point_4', 'Bullet_Point_5', 'CharacteristicDescription', 'Belt_Profile_Grv_Cross_Section', 'Bore_Type', 'Brand', 'Bushing_Number', 'Bushing_Style', 'Color', 'Core_Material_Type', 'Datum_Diameter_in', 'Datum_Diameter_mm', 'Datum_Length_in', 'Datum_Length_mm', 'Face_Width_in', 'Face_Width_mm', 'Flange_Outer_Diameter_in', 'Flange_Outer_Diameter_mm', 'Flanges_Yes_No', 'Heat_and_Oil_Resistant', 'Image_1_Catalog_House', 'Image_2_Catalog_House', 'Image_3_Catalog_House', 'Image_Extension_Catalog_House', 'Image_Root_URL_Catalog_House', 'KeySeat_Bushing_Std_or_Special', 'Keyway_Size_1', 'Keyway_Size_2', 'Length_Trough_Bore_in', 'Length_Trough_Bore_mm', 'Material', 'Max_Bore_Size_in', 'Max_Bore_Size_mm', 'Max_RPM', 'Max_Temperature_C', 'Max_Temperature_F', 'Min_Bore_Size_in_Bushings', 'Min_Bore_Size_mm', 'Min_Temperature_C', 'Min_Temperature_F', 'Number_of_Grooves', 'Number_of_Ribs', 'Number_of_teeth', 'Outside_Diameter_in', 'Outside_Diameter_mm', 'Outside_Length_in', 'Outside_Length_mm', 'Pitch_in', 'Pitch_mm', 'Pitch_Diameter_in', 'Pitch_Diameter_mm', 'Product_inside_Length_in', 'Product_inside_Length_mm', 'Profile', 'Reinforcement', 'Static_Conductive', 'Stock_Bore_in', 'Stock_Bore_mm', 'Top_Belt_Width_per_Strand_in', 'Top_Belt_Width_per_Strand_mm', 'Width_in', 'Width_mm'];
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

    /**
     * Will create all required temp table
    */
    private function createTempTable() {
        $sql1 = " CREATE TABLE IF NOT EXISTS `ptg_import` (
            `SAPMaterialCode` varchar(20) NOT NULL,
            `Product_Hrc_Lvl2_Name` varchar(100) NOT NULL,
            `Product_Hrc_Lvl3_Name` varchar(100) NOT NULL,
            `Product_Hrc_Lvl4_Name` varchar(100) NOT NULL,
            `LongDescriptionHTML` text NOT NULL,
            `Bullet_Point_1` varchar(100) NOT NULL,
            `Bullet_Point_2` varchar(100) NOT NULL,
            `Bullet_Point_3` varchar(100) NOT NULL,
            `Bullet_Point_4` varchar(100) NOT NULL,
            `Bullet_Point_5` varchar(100) NOT NULL,
            `CharacteristicDescription` varchar(255) NOT NULL,
            `Belt_Profile_Grv_Cross_Section` varchar(255) NOT NULL,
            `Bore_Type` varchar(255) NOT NULL,
            `Brand` varchar(100) NOT NULL,
            `Bushing_Number` varchar(20) NOT NULL,
            `Bushing_Style` varchar(100) NOT NULL,
            `Color` varchar(20) NOT NULL,
            `Core_Material_Type` varchar(255) NOT NULL,
            `Datum_Diameter_in` varchar(50) NOT NULL,
            `Datum_Diameter_mm` varchar(50) NOT NULL,
            `Datum_Length_in` varchar(50) NOT NULL,
            `Datum_Length_mm` varchar(20) NOT NULL,
            `Face_Width_in` varchar(255) NOT NULL,
            `Face_Width_mm` varchar(255) NOT NULL,
            `Flange_Outer_Diameter_in` varchar(255) NOT NULL,
            `Flange_Outer_Diameter_mm` varchar(255) NOT NULL,
            `Flanges_Yes_No` varchar(255) NOT NULL,
            `Heat_and_Oil_Resistant` varchar(255) NOT NULL,
            `Image_1_Catalog_House` varchar(255) NOT NULL,
            `Image_2_Catalog_House` varchar(255) NOT NULL,
            `Image_3_Catalog_House` varchar(255) NOT NULL,
            `Image_Extension_Catalog_House` varchar(255) NOT NULL,
            `Image_Root_URL_Catalog_House` varchar(255) NOT NULL,
            `KeySeat_Bushing_Std_or_Special` varchar(255) NOT NULL,
            `Keyway_Size_1` varchar(255) NOT NULL,
            `Keyway_Size_2` varchar(255) NOT NULL,
            `Length_Trough_Bore_in` varchar(255) NOT NULL,
            `Length_Trough_Bore_mm` varchar(255) NOT NULL,
            `Material` varchar(255) NOT NULL,
            `Max_Bore_Size_in` varchar(255) NOT NULL,
            `Max_Bore_Size_mm` varchar(255) NOT NULL,
            `Max_RPM` varchar(255) NOT NULL,
            `Max_Temperature_C` varchar(255) NOT NULL,
            `Max_Temperature_F` varchar(255) NOT NULL,
            `Min_Bore_Size_in_Bushings` varchar(255) NOT NULL,
            `Min_Bore_Size_mm` varchar(255) NOT NULL,
            `Min_Temperature_C` varchar(255) NOT NULL,
            `Min_Temperature_F` varchar(255) NOT NULL,
            `Number_of_Grooves` varchar(255) NOT NULL,
            `Number_of_Ribs` varchar(255) NOT NULL,
            `Number_of_teeth` varchar(100) NOT NULL,
            `Outside_Diameter_in` varchar(50) NOT NULL,
            `Outside_Diameter_mm` varchar(50) NOT NULL,
            `Outside_Length_in` varchar(50) NOT NULL,
            `Outside_Length_mm` varchar(50) NOT NULL,
            `Pitch_in` varchar(50) NOT NULL,
            `Pitch_mm` varchar(50) NOT NULL,
            `Pitch_Diameter_in` varchar(50) NOT NULL,
            `Pitch_Diameter_mm` varchar(50) NOT NULL,
            `Product_inside_Length_in` varchar(50) NOT NULL,
            `Product_inside_Length_mm` varchar(50) NOT NULL,
            `Profile` varchar(50) NOT NULL,
            `Reinforcement` varchar(40) NOT NULL,
            `Static_Conductive` varchar(40) NOT NULL,
            `Stock_Bore_in` varchar(50) NOT NULL,
            `Stock_Bore_mm` varchar(50) NOT NULL,
            `Top_Belt_Width_per_Strand_in` varchar(50) NOT NULL,
            `Top_Belt_Width_per_Strand_mm` varchar(50) NOT NULL,
            `Width_in` varchar(50) NOT NULL,
            `Width_mm` varchar(50) NOT NULL,
            PRIMARY KEY (`SAPMaterialCode`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        //   $this->db->query($sql);

          $sql2 = "CREATE TABLE IF NOT EXISTS `siopLvl5_objects` (
            `siopLvl5_object_id` varchar(10) NOT NULL,
            `siopFullCode` varchar(20) NOT NULL,
            `SAPMaterialCode` varchar(20) NOT NULL,
            `Product_Hrc_Lvl2_Name` varchar(100) NOT NULL,
            `Product_Hrc_Lvl3_Name` varchar(100) NOT NULL,
            `Product_Hrc_Lvl4_Name` varchar(100) NOT NULL,
            `LongDescriptionHTML` text NOT NULL,
            `Bullet_Point_1` varchar(100) NOT NULL,
            `Bullet_Point_2` varchar(100) NOT NULL,
            `Bullet_Point_3` varchar(100) NOT NULL,
            `Bullet_Point_4` varchar(100) NOT NULL,
            `Bullet_Point_5` varchar(100) NOT NULL,
            `CharacteristicDescription` varchar(255) NOT NULL,
            `Belt_Profile_Grv_Cross_Section` varchar(255) NOT NULL,
            `Bore_Type` varchar(255) NOT NULL,
            `Brand` varchar(100) NOT NULL,
            `Bushing_Number` varchar(20) NOT NULL,
            `Bushing_Style` varchar(100) NOT NULL,
            `Color` varchar(20) NOT NULL,
            `Core_Material_Type` varchar(255) NOT NULL,
            `Datum_Diameter_in` varchar(50) NOT NULL,
            `Datum_Diameter_mm` varchar(50) NOT NULL,
            `Datum_Length_in` varchar(50) NOT NULL,
            `Datum_Length_mm` varchar(20) NOT NULL,
            `Face_Width_in` varchar(255) NOT NULL,
            `Face_Width_mm` varchar(255) NOT NULL,
            `Flange_Outer_Diameter_in` varchar(255) NOT NULL,
            `Flange_Outer_Diameter_mm` varchar(255) NOT NULL,
            `Flanges_Yes_No` varchar(255) NOT NULL,
            `Heat_and_Oil_Resistant` varchar(255) NOT NULL,
            `Image_1_Catalog_House` varchar(255) NOT NULL,
            `Image_2_Catalog_House` varchar(255) NOT NULL,
            `Image_3_Catalog_House` varchar(255) NOT NULL,
            `Image_Extension_Catalog_House` varchar(255) NOT NULL,
            `Image_Root_URL_Catalog_House` varchar(255) NOT NULL,
            `KeySeat_Bushing_Std_or_Special` varchar(255) NOT NULL,
            `Keyway_Size_1` varchar(255) NOT NULL,
            `Keyway_Size_2` varchar(255) NOT NULL,
            `Length_Trough_Bore_in` varchar(255) NOT NULL,
            `Length_Trough_Bore_mm` varchar(255) NOT NULL,
            `Material` varchar(255) NOT NULL,
            `Max_Bore_Size_in` varchar(255) NOT NULL,
            `Max_Bore_Size_mm` varchar(255) NOT NULL,
            `Max_RPM` varchar(255) NOT NULL,
            `Max_Temperature_C` varchar(255) NOT NULL,
            `Max_Temperature_F` varchar(255) NOT NULL,
            `Min_Bore_Size_in_Bushings` varchar(255) NOT NULL,
            `Min_Bore_Size_mm` varchar(255) NOT NULL,
            `Min_Temperature_C` varchar(255) NOT NULL,
            `Min_Temperature_F` varchar(255) NOT NULL,
            `Number_of_Grooves` varchar(255) NOT NULL,
            `Number_of_Ribs` varchar(255) NOT NULL,
            `Number_of_teeth` varchar(100) NOT NULL,
            `Outside_Diameter_in` varchar(50) NOT NULL,
            `Outside_Diameter_mm` varchar(50) NOT NULL,
            `Outside_Length_in` varchar(50) NOT NULL,
            `Outside_Length_mm` varchar(50) NOT NULL,
            `Pitch_in` varchar(50) NOT NULL,
            `Pitch_mm` varchar(50) NOT NULL,
            `Pitch_Diameter_in` varchar(50) NOT NULL,
            `Pitch_Diameter_mm` varchar(50) NOT NULL,
            `Product_inside_Length_in` varchar(50) NOT NULL,
            `Product_inside_Length_mm` varchar(50) NOT NULL,
            `Profile` varchar(50) NOT NULL,
            `Reinforcement` varchar(40) NOT NULL,
            `Static_Conductive` varchar(40) NOT NULL,
            `Stock_Bore_in` varchar(50) NOT NULL,
            `Stock_Bore_mm` varchar(50) NOT NULL,
            `Top_Belt_Width_per_Strand_in` varchar(50) NOT NULL,
            `Top_Belt_Width_per_Strand_mm` varchar(50) NOT NULL,
            `Width_in` varchar(50) NOT NULL,
            `Width_mm` varchar(50) NOT NULL,
            PRIMARY KEY (`siopLvl5_object_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        //   $this->db->query($sql);

          $sql3 = "CREATE TABLE IF NOT EXISTS `siopLvl6_objects` (
            `siopLvl6_object_id` varchar(10) NOT NULL,
            `siopFullCode` varchar(20) NOT NULL,
            `SAPMaterialCode` varchar(20) NOT NULL,
            `Product_Hrc_Lvl2_Name` varchar(100) NOT NULL,
            `Product_Hrc_Lvl3_Name` varchar(100) NOT NULL,
            `Product_Hrc_Lvl4_Name` varchar(100) NOT NULL,
            `LongDescriptionHTML` text NOT NULL,
            `Bullet_Point_1` varchar(100) NOT NULL,
            `Bullet_Point_2` varchar(100) NOT NULL,
            `Bullet_Point_3` varchar(100) NOT NULL,
            `Bullet_Point_4` varchar(100) NOT NULL,
            `Bullet_Point_5` varchar(100) NOT NULL,
            `CharacteristicDescription` varchar(255) NOT NULL,
            `Belt_Profile_Grv_Cross_Section` varchar(255) NOT NULL,
            `Bore_Type` varchar(255) NOT NULL,
            `Brand` varchar(100) NOT NULL,
            `Bushing_Number` varchar(20) NOT NULL,
            `Bushing_Style` varchar(100) NOT NULL,
            `Color` varchar(20) NOT NULL,
            `Core_Material_Type` varchar(255) NOT NULL,
            `Datum_Diameter_in` varchar(50) NOT NULL,
            `Datum_Diameter_mm` varchar(50) NOT NULL,
            `Datum_Length_in` varchar(50) NOT NULL,
            `Datum_Length_mm` varchar(20) NOT NULL,
            `Face_Width_in` varchar(255) NOT NULL,
            `Face_Width_mm` varchar(255) NOT NULL,
            `Flange_Outer_Diameter_in` varchar(255) NOT NULL,
            `Flange_Outer_Diameter_mm` varchar(255) NOT NULL,
            `Flanges_Yes_No` varchar(255) NOT NULL,
            `Heat_and_Oil_Resistant` varchar(255) NOT NULL,
            `Image_1_Catalog_House` varchar(255) NOT NULL,
            `Image_2_Catalog_House` varchar(255) NOT NULL,
            `Image_3_Catalog_House` varchar(255) NOT NULL,
            `Image_Extension_Catalog_House` varchar(255) NOT NULL,
            `Image_Root_URL_Catalog_House` varchar(255) NOT NULL,
            `KeySeat_Bushing_Std_or_Special` varchar(255) NOT NULL,
            `Keyway_Size_1` varchar(255) NOT NULL,
            `Keyway_Size_2` varchar(255) NOT NULL,
            `Length_Trough_Bore_in` varchar(255) NOT NULL,
            `Length_Trough_Bore_mm` varchar(255) NOT NULL,
            `Material` varchar(255) NOT NULL,
            `Max_Bore_Size_in` varchar(255) NOT NULL,
            `Max_Bore_Size_mm` varchar(255) NOT NULL,
            `Max_RPM` varchar(255) NOT NULL,
            `Max_Temperature_C` varchar(255) NOT NULL,
            `Max_Temperature_F` varchar(255) NOT NULL,
            `Min_Bore_Size_in_Bushings` varchar(255) NOT NULL,
            `Min_Bore_Size_mm` varchar(255) NOT NULL,
            `Min_Temperature_C` varchar(255) NOT NULL,
            `Min_Temperature_F` varchar(255) NOT NULL,
            `Number_of_Grooves` varchar(255) NOT NULL,
            `Number_of_Ribs` varchar(255) NOT NULL,
            `Number_of_teeth` varchar(100) NOT NULL,
            `Outside_Diameter_in` varchar(50) NOT NULL,
            `Outside_Diameter_mm` varchar(50) NOT NULL,
            `Outside_Length_in` varchar(50) NOT NULL,
            `Outside_Length_mm` varchar(50) NOT NULL,
            `Pitch_in` varchar(50) NOT NULL,
            `Pitch_mm` varchar(50) NOT NULL,
            `Pitch_Diameter_in` varchar(50) NOT NULL,
            `Pitch_Diameter_mm` varchar(50) NOT NULL,
            `Product_inside_Length_in` varchar(50) NOT NULL,
            `Product_inside_Length_mm` varchar(50) NOT NULL,
            `Profile` varchar(50) NOT NULL,
            `Reinforcement` varchar(40) NOT NULL,
            `Static_Conductive` varchar(40) NOT NULL,
            `Stock_Bore_in` varchar(50) NOT NULL,
            `Stock_Bore_mm` varchar(50) NOT NULL,
            `Top_Belt_Width_per_Strand_in` varchar(50) NOT NULL,
            `Top_Belt_Width_per_Strand_mm` varchar(50) NOT NULL,
            `Width_in` varchar(50) NOT NULL,
            `Width_mm` varchar(50) NOT NULL,
            PRIMARY KEY (`siopLvl6_object_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

          $sql4 = "CREATE TABLE IF NOT EXISTS `ptg_import_log` (
            `logId` bigint(20) NOT NULL AUTO_INCREMENT,
            `id` varchar(30) NOT NULL,
            `record` longtext,
            `statusCode` char(10) DEFAULT NULL,
            `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `failedReason` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`logId`)
          ) ENGINE=InnoDB AUTO_INCREMENT=15440 DEFAULT CHARSET=utf8mb4;";
          $sql = $sql1.$sql2.$sql3.$sql4;
          $this->db->query($sql);
    }
}
