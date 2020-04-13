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

class HoseDataImportCommand extends AbstractCommand
{

    const HOSE_BASE_OBJECT_BRICK_QUERY = 'object_brick_query_HoseBase_1';
    const HOSE_BASE_OBJECT_BRICK_STORE = 'object_brick_store_HoseBase_1';

    const HOSE_SKELE_OBJECT_BRICK_QUERY = 'object_brick_query_HoseSkeleton_1';
    const HOSE_SKELE_OBJECT_BRICK_STORE = 'object_brick_store_HoseSkeleton_1';


    const BATCH_SIZE = 1000;
    private $langArr;
    private $db;
    private $t;
    private $masterTypes;
    private $masters;
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
            'reinforcement' => 'INH-HYD-HOSE~reinforcement'
        ];

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
            $this->updateBase();
            $this->updateSkeleton();
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }

    
    private function import($filePath)
    {
        p_r('Importing data into temp table');
        $results = $this->getCSVData($filePath);
        $this->truncateTemp($results);
        $this->updateTable($results, 'oti_hosedata_temp');
        $this->filterHoseBaseData();
        $this->filterHoseSkeletonData();
    }


    /**
     * HoseBase Data
     */
    private function filterHoseBaseData()
    {
        p_r('Filtering Hose Base Level Data');
        $sql = "INSERT INTO oti_hosebase_temp SELECT o1_2.o_id, o1_2.o_key, o1_2.siopFullCode, o1_2.ProductType, oht.* FROM oti_hosedata_temp oht 
        JOIN object_1 o1_1 ON(o1_1.articleNumber=oht.`Object`)
        JOIN object_1 o1_2 ON(o1_2.o_key=SUBSTR(o1_1.oldMaterialCode, 1, 6)) WHERE o1_1.siopFullCode LIKE '%041000%' ON DUPLICATE KEY UPDATE oti_hosebase_temp.`Object`=oti_hosebase_temp.`Object`;";
        $this->db->query($sql);
    }

    /**
     * Hose Skeleton
     */
    private function filterHoseSkeletonData()
    {
        p_r('Filtering Hose Skeleton Level Data');
        $sql = "INSERT INTO oti_hoseskeleton_temp SELECT o1_2.o_id, o1_2.o_key, o1_2.siopFullCode, o1_2.ProductType, oht.* FROM oti_hosedata_temp oht 
        JOIN object_1 o1_1 ON(o1_1.articleNumber=oht.`Object`)
        JOIN object_1 o1_2 ON(o1_2.o_key=SUBSTR(o1_1.oldMaterialCode, 1, 9)) WHERE o1_1.siopFullCode LIKE '%041000%' ON DUPLICATE KEY UPDATE oti_hoseskeleton_temp.`Object`=oti_hoseskeleton_temp.`Object`;";
        $this->db->query($sql);
    }

    private function updateLog()
    {
        p_r('Updating Log..');
        /* $sql = "SELECT oht.* FROM oti_hosedata_temp oht JOIN object_1 o ON(o.articleNumber=oht.`Object`);";
        $data = $this->db->query($sql);
        $this->insertDataToLogTable($data, "Success");
        unset($data); */
        $sql = "SELECT oht.* FROM oti_hosedata_temp oht LEFT JOIN object_1 o ON(o.articleNumber=oht.`Object`) WHERE o.o_id is null";
        $data = $this->db->query($sql);
        $this->insertDataToLogTable($data, "", "Object does not match in material mara");
    }
    /**
     * Updating siop level 5 data (PTG base level)
     * Getting list of base leve data through query
     * 
     */
    private function updateBase()
    {
        $sql = "SELECT *, 'Base' as fieldname FROM oti_hosebase_temp";
        $results = $this->db->fetchAll($sql);
        // Update Query Table

        $records = $this->getBaseBrickData($results);
        p_r('Processing ' . count($results) . ' records at base level');
        p_r('Updating Base Level');
        $this->updateTable($records, self::HOSE_BASE_OBJECT_BRICK_QUERY);
        // Update Store Table
        $this->updateTable($records, self::HOSE_BASE_OBJECT_BRICK_STORE);
        unset($records);
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
        $sql = "SELECT *, 'Skeleton' as fieldname FROM oti_hoseskeleton_temp";
        $results = $this->db->fetchAll($sql);
        $records = $this->getHoseSkeletonData($results);
        p_r('Processing ' . count($records) . ' records at skeleton level');
        p_r('Updating skeleton');
        $this->updateTable($records, self::HOSE_SKELE_OBJECT_BRICK_QUERY);
        $this->updateTable($records, self::HOSE_SKELE_OBJECT_BRICK_STORE);
        p_r('Skeleton Updation - Done');
        $this->updateLog($results);
    }

    /**
     * Getting HoseBase Data
     */
    private function getBaseBrickData($results)
    {
        $d = array();
        foreach ($results as $k => $r) {
            $tbCols = array();
            $cvCols = array();
            $cvChars = array();
            $agComp = array();
            $error = array();

            if (!empty($r['Tube_Color'])) {
                $clrArr = array();
                $clrArr = explode("/", strtolower($r['Tube_Color']));
                $clrInfo = $this->getMultiselectInfo('tubeColor', $clrArr);
                if (!empty($clrInfo['itemNotFound'])) {
                    $error[] = "Tube Color(s) '" . $clrInfo['itemNotFound'] . "' not found in master";
                } else {
                    $tbCols = $clrInfo['items'];
                }
                unset($clrInfo);
            }

            if (!empty($r['Cover_color'])) {                
                $clrArr = array();
                $clrArr = explode("/", strtolower($r['Cover_color']));
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
                $clrArr = explode("/", strtolower($r['Cover_Characteristic']));
                $clrInfo = $this->getMultiselectInfo('coverCharacteristic', $clrArr);
                if (!empty($clrInfo['itemNotFound'])) {
                    $error[] = "Cover Characteristic(s) '" . $clrInfo['itemNotFound'] . "' not found in master";
                } else {
                    $cvChars = $clrInfo['items'];
                }
                unset($clrInfo);
            }

            if (!empty($r['Agency_Compliance'])) {
                $clrArr = array();
                $clrArr = explode("/", strtolower($r['Agency_Compliance']));
                $clrInfo = $this->getMultiselectInfo('agencyCompliance', $clrArr);
                if (!empty($clrInfo['itemNotFound'])) {
                    $error[] = "Agency Compliance(s) '" . $clrInfo['itemNotFound'] . "' not found in master";
                } else {
                    $agComp = $clrInfo['items'];
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
                'o_id'  =>  $r['o_id'],
                'fieldname'  =>  $r['fieldname'],
                'staticWire'  =>  !empty($r['Static_Wire_Y_N']) ? $r['Static_Wire_Y_N'] : '',
                'tubeColor'  =>  !empty($tbCols) ? implode(',', $tbCols) : '',
                'minimumTemperatureF'  =>  !empty($r['Min_Temperature_Rating_F']) ? $r['Min_Temperature_Rating_F'] : '',
                'maximumTemperatureF'  => !empty($r['Max_Temperature_Rating_F']) ? $r['Max_Temperature_Rating_F'] : '',
                'coverCharacteristic'  =>  !empty($cvChars) ? implode(',', $cvChars) : '',
                'coverColor'  =>  !empty($cvCols) ? implode(',', $cvCols) : '',
                'minimumTemperatureC'  =>  !empty($r['Min_Temperature_Rating_C']) ? $r['Min_Temperature_Rating_C'] : '',
                'maximumTemperatureC'  =>  !empty($r['Max_Temperature_Rating_C']) ? $r['Max_Temperature_Rating_C'] : '',
                'agencyCompliance'  =>  !empty($agComp) ? implode(',', $agComp) : ''
            );
        }
        $this->insertDataToLogTable($results);
        return $d;
    }

    private function getHoseSkeletonData($results)
    {
        $d = array();
        
        
        foreach ($results as $k=> $r) {
            $reinfo = array();
            $error = array();
            $clrInfo = array();
            if (!empty($r['Reinforcement'])) {
                $clrArr = array();
                $clrArr = explode("/", strtolower($r['Reinforcement']));
                $clrInfo = $this->getMultiselectInfo('reinforcement', $clrArr);
                if (!empty($clrInfo['itemNotFound'])) {
                    $error[] = "Tube Color(s) '" . $clrInfo['itemNotFound'] . "' not found in master";
                } else {
                    $reinfo = $clrInfo['items'];
                }
            }
            if (!empty($error)) {
                $results[$k]['statusCode'] = "Failed - Skeleton Level";
                $results[$k]['failedReason']    =   implode(', ', $error);
            } else {
                $results[$k]['statusCode'] = "Success - Skeleton Level";
                $results[$k]['failedReason'] = "";
            }
            $weightLbFt = '';
            $weightGM = '';
            if(!empty($r['Weight_lb_ft']) && !empty($r['Weight_G_M'])) {
                $weightLbFt = $r['Weight_lb_ft'];
                $weightGM = $r['Weight_G_M'];
            }
            if(!empty($r['Weight_lb_ft']) && empty($r['Weight_G_M'])) {
                $weightLbFt = $r['Weight_lb_ft'];
                $weightGM = $this->lbsTogram($weightLbFt);
            }
            if(empty($r['Weight_lb_ft']) && !empty($r['Weight_G_M'])) {
                $weightGM = $r['Weight_G_M'];
                $weightLbFt = $this->gramToLbs($weightGM);
            }
            // p_r($weightLbFt.' - '.$weightGM);
            $d[] = array(
                'o_id'  =>  $r['o_id'],
                'fieldname'  =>  $r['fieldname'],
                // 'descriptive'   =>  !empty($r['descriptive']) ? $r['descriptive'] : '',
                'grossWeight'   =>  $weightLbFt,
                'weightg'       =>  $weightGM,
                'BendRadius_in' =>  !empty($r['Bend_Radius_in']) ? $r['Bend_Radius_in'] : '',
                'BendRadius_mm' =>  !empty($r['Bend_Radius_mm']) ? $r['Bend_Radius_mm'] : '',
                'Vacumm_in' =>  !empty($r['Vacuum_Rating_in']) ? $r['Vacuum_Rating_in'] : '',
                'Vacumm_mm' =>  !empty($r['Vacuum_Rating_mm']) ? $r['Vacuum_Rating_mm'] : '',
                'workingPressurempa' =>  !empty($r['Working_Pressure_MPa']) ? $r['Working_Pressure_MPa'] : '',
                'workingPressurepsi' =>  !empty($r['Working_Pressure_PSI']) ? $r['Working_Pressure_PSI'] : '',
                'workingPressureBAR' =>  !empty($r['Working_Pressure_BAR']) ? $r['Working_Pressure_BAR'] : '',
                'minBurstPressurepsi' =>  !empty($r['Min_Burst_Pressure_PSI']) ? $r['Min_Burst_Pressure_PSI'] : '',
                'minBurstPressurempa' =>  !empty($r['Min_Burst_Pressure_Mpa']) ? $r['Min_Burst_Pressure_Mpa'] : '',
                'hoseIdNominalId' =>  !empty($r['Hose_ID_Fraction']) ? $r['Hose_ID_Fraction'] : '',
                'hoseIdDec' =>  !empty($r['Hose_ID_in']) ? $r['Hose_ID_in'] : '',
                'hoseIdMM' =>  !empty($r['Hose_ID_mm']) ? $r['Hose_ID_mm'] : '',
                'hoseOdIn' =>  !empty($r['Hose_OD_in']) ? $r['Hose_OD_in'] : '',
                'hoseOdmm' =>  !empty($r['Hose_OD_mm']) ? $r['Hose_OD_mm'] : '',
                'reinforcement' =>  !empty($reinfo) ? implode(',', $reinfo) : '',
            );
        }
        $this->insertDataToLogTable($results);
        return $d;
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
                $where = " WHERE masterType LIKE '%$type%'";
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
        $hayStackArr = isset($this->masters[$masterKey])&&is_array($this->masters[$masterKey])?$this->masters[$masterKey]:array();
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
            /** Fields ignore for update */
            $ignore = array('o_id', 'fieldname');
            if (!empty($results)) {
                $sql = "INSERT INTO {$table}";
                $firstRow = $results[0];
                $keys = array_keys($firstRow);
                $valColumns = [];
                foreach ($keys as $key) {
                    $sqlColumns[] = "`" . $key . "`";
                    if(!in_array($key, $ignore)) {
                        $updateColumns[] = "`" . $key . "`= VALUES(`" . $key . "`)";
                    }
                    $valColumns[] = $key;
                }
                $sql = $sql . " (" . implode(",", $sqlColumns) . ") VALUES ";
                $update = " ON DUPLICATE KEY UPDATE " . implode(",", $updateColumns);
                foreach ($results as $r) {
                    $valueArray = [];
                    $updateColumns = [];
                    foreach ($valColumns as $key) {
                        $valueArray[] = $this->db->quote($r[$key]);
                    }
                    $values .= '(' . implode(",", $valueArray) . '),';

                    if ($rowCount % self::BATCH_SIZE == 0) {
                        $query = $sql . rtrim($values, ',') . $update;
                        if($table=='object_brick_query_HoseSkeleton_1') {
                            p_r($query);
                        }
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

    private function lbsTogram($lb) {
        if(false!==$lb) {
            return number_format($lb / 0.0022046, 5, '.', '');
        }
        return;
    }

    private function gramToLbs($g) {
        if(false!==$g) {
            return number_format($g*0.0022046, 5, '.', '');
        }
    }

    public function getCSVData($fileName)
    {
        try {
            $columns = ['Object', 'Object_Category', 'Description', 'Class', 'Status', 'Primary_Brand', 'Continental_Brand', 'Brand_Construction', 'Hose_ID_Fraction', 'Hose_ID_in', 'Hose_ID_mm', 'Hose_OD_in', 'Hose_OD_mm', 'Cover_Construction', 'Cover_color', 'Tube_Construction', 'Tube_Color', 'Reinforcement', 'Min_Temperature_Rating_F', 'Min_Temperature_Rating_C', 'Max_Temperature_Rating_F', 'Max_Temperature_Rating_C', 'Min_Burst_Pressure_PSI', 'Min_Burst_Pressure_Mpa', 'Bend_Radius_in', 'Static_Wire_Y_N', 'Bend_Radius_mm', 'Vacuum_Rating_in', 'Vacuum_Rating_mm', 'Vacuum_Rating_HG_mm', 'Design_Factor', 'Agency_Compliance', 'Hose_Assembly_or_Bulk_Hose', 'Working_Pressure_MPa', 'Working_Pressure_PSI', 'Working_Pressure_BAR', 'Weight_lb_ft', 'Weight_G_M', 'Cover_Characteristic'];

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

    private function truncateTemp($results)
    {
        $sql = "TRUNCATE oti_hosebase_temp;TRUNCATE oti_hoseskeleton_temp;TRUNCATE oti_hosedata_temp;";
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
            `Object_Category` varchar(20) NOT NULL,
            `Description` text NOT NULL,
            `Class` varchar(40) NOT NULL,
            `Status` varchar(5) NOT NULL,
            `Primary_Brand` varchar(20) NOT NULL,
            `Continental_Brand` varchar(20) NOT NULL,
            `Brand_Construction` varchar(100) NOT NULL,
            `Hose_ID_Fraction` varchar(20) NOT NULL,
            `Hose_ID_in` varchar(20) NOT NULL,
            `Hose_ID_mm` varchar(20) NOT NULL,
            `Hose_OD_in` varchar(20) NOT NULL,
            `Hose_OD_mm` varchar(20) NOT NULL,
            `Cover_Construction` varchar(40) NOT NULL,
            `Cover_color` varchar(20) NOT NULL,
            `Tube_Construction` varchar(20) NOT NULL,
            `Tube_Color` varchar(20) NOT NULL,
            `Reinforcement` varchar(20) NOT NULL,
            `Min_Temperature_Rating_F` varchar(20) NOT NULL,
            `Min_Temperature_Rating_C` varchar(20) NOT NULL,
            `Max_Temperature_Rating_F` varchar(20) NOT NULL,
            `Max_Temperature_Rating_C` varchar(20) NOT NULL,
            `Min_Burst_Pressure_PSI` varchar(20) NOT NULL,
            `Min_Burst_Pressure_Mpa` varchar(20) NOT NULL,
            `Bend_Radius_in` varchar(20) NOT NULL,
            `Static_Wire_Y_N` varchar(10) NOT NULL,
            `Bend_Radius_mm` varchar(10) NOT NULL,
            `Vacuum_Rating_in` varchar(10) NOT NULL,
            `Vacuum_Rating_mm` varchar(10) NOT NULL,
            `Vacuum_Rating_HG_mm` varchar(10) NOT NULL,
            `Design_Factor` varchar(10) NOT NULL,
            `Agency_Compliance` varchar(10) NOT NULL,
            `Hose_Assembly_or_Bulk_Hose` varchar(10) NOT NULL,
            `Working_Pressure_MPa` varchar(10) NOT NULL,
            `Working_Pressure_PSI` varchar(10) NOT NULL,
            `Working_Pressure_BAR` varchar(10) NOT NULL,
            `Weight_lb_ft` varchar(10) NOT NULL,
            `Weight_G_M` varchar(10) NOT NULL,
            `Cover_Characteristic` varchar(40) NOT NULL,
            PRIMARY KEY (`Object`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        //   $this->db->query($sql);

        $sql2 = "CREATE TABLE IF NOT EXISTS `oti_hosebase_temp` (
            `o_id` int(11) unsigned NOT NULL,
            `o_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
            `siopFullCode` varchar(190) DEFAULT NULL,
            `ProductType` varchar(190) DEFAULT NULL,
            `Object` varchar(25) NOT NULL,
            `Object_Category` varchar(20) NOT NULL,
            `Description` text NOT NULL,
            `Class` varchar(40) NOT NULL,
            `Status` varchar(5) NOT NULL,
            `Primary_Brand` varchar(20) NOT NULL,
            `Continental_Brand` varchar(20) NOT NULL,
            `Brand_Construction` varchar(100) NOT NULL,
            `Hose_ID_Fraction` varchar(20) NOT NULL,
            `Hose_ID_in` varchar(20) NOT NULL,
            `Hose_ID_mm` varchar(20) NOT NULL,
            `Hose_OD_in` varchar(20) NOT NULL,
            `Hose_OD_mm` varchar(20) NOT NULL,
            `Cover_Construction` varchar(40) NOT NULL,
            `Cover_color` varchar(20) NOT NULL,
            `Tube_Construction` varchar(20) NOT NULL,
            `Tube_Color` varchar(20) NOT NULL,
            `Reinforcement` varchar(20) NOT NULL,
            `Min_Temperature_Rating_F` varchar(20) NOT NULL,
            `Min_Temperature_Rating_C` varchar(20) NOT NULL,
            `Max_Temperature_Rating_F` varchar(20) NOT NULL,
            `Max_Temperature_Rating_C` varchar(20) NOT NULL,
            `Min_Burst_Pressure_PSI` varchar(20) NOT NULL,
            `Min_Burst_Pressure_Mpa` varchar(20) NOT NULL,
            `Bend_Radius_in` varchar(20) NOT NULL,
            `Static_Wire_Y_N` varchar(10) NOT NULL,
            `Bend_Radius_mm` varchar(10) NOT NULL,
            `Vacuum_Rating_in` varchar(10) NOT NULL,
            `Vacuum_Rating_mm` varchar(10) NOT NULL,
            `Vacuum_Rating_HG_mm` varchar(10) NOT NULL,
            `Design_Factor` varchar(10) NOT NULL,
            `Agency_Compliance` varchar(10) NOT NULL,
            `Hose_Assembly_or_Bulk_Hose` varchar(10) NOT NULL,
            `Working_Pressure_MPa` varchar(10) NOT NULL,
            `Working_Pressure_PSI` varchar(10) NOT NULL,
            `Working_Pressure_BAR` varchar(10) NOT NULL,
            `Weight_lb_ft` varchar(10) NOT NULL,
            `Weight_G_M` varchar(10) NOT NULL,
            `Cover_Characteristic` varchar(40) NOT NULL,
            PRIMARY KEY (`o_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        //   $this->db->query($sql);

        $sql3 = "CREATE TABLE IF NOT EXISTS `oti_hoseskeleton_temp` (
            `o_id` int(11) unsigned NOT NULL,
            `o_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
            `siopFullCode` varchar(190) DEFAULT NULL,
            `ProductType` varchar(190) DEFAULT NULL,
            `Object` varchar(25) NOT NULL,
            `Object_Category` varchar(20) NOT NULL,
            `Description` text NOT NULL,
            `Class` varchar(40) NOT NULL,
            `Status` varchar(5) NOT NULL,
            `Primary_Brand` varchar(20) NOT NULL,
            `Continental_Brand` varchar(20) NOT NULL,
            `Brand_Construction` varchar(100) NOT NULL,
            `Hose_ID_Fraction` varchar(20) NOT NULL,
            `Hose_ID_in` varchar(20) NOT NULL,
            `Hose_ID_mm` varchar(20) NOT NULL,
            `Hose_OD_in` varchar(20) NOT NULL,
            `Hose_OD_mm` varchar(20) NOT NULL,
            `Cover_Construction` varchar(40) NOT NULL,
            `Cover_color` varchar(20) NOT NULL,
            `Tube_Construction` varchar(20) NOT NULL,
            `Tube_Color` varchar(20) NOT NULL,
            `Reinforcement` varchar(20) NOT NULL,
            `Min_Temperature_Rating_F` varchar(20) NOT NULL,
            `Min_Temperature_Rating_C` varchar(20) NOT NULL,
            `Max_Temperature_Rating_F` varchar(20) NOT NULL,
            `Max_Temperature_Rating_C` varchar(20) NOT NULL,
            `Min_Burst_Pressure_PSI` varchar(20) NOT NULL,
            `Min_Burst_Pressure_Mpa` varchar(20) NOT NULL,
            `Bend_Radius_in` varchar(20) NOT NULL,
            `Static_Wire_Y_N` varchar(10) NOT NULL,
            `Bend_Radius_mm` varchar(10) NOT NULL,
            `Vacuum_Rating_in` varchar(10) NOT NULL,
            `Vacuum_Rating_mm` varchar(10) NOT NULL,
            `Vacuum_Rating_HG_mm` varchar(10) NOT NULL,
            `Design_Factor` varchar(10) NOT NULL,
            `Agency_Compliance` varchar(10) NOT NULL,
            `Hose_Assembly_or_Bulk_Hose` varchar(10) NOT NULL,
            `Working_Pressure_MPa` varchar(10) NOT NULL,
            `Working_Pressure_PSI` varchar(10) NOT NULL,
            `Working_Pressure_BAR` varchar(10) NOT NULL,
            `Weight_lb_ft` varchar(10) NOT NULL,
            `Weight_G_M` varchar(10) NOT NULL,
            `Cover_Characteristic` varchar(40) NOT NULL,
            PRIMARY KEY (`o_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $sql4 = "CREATE TABLE `oti_hosedata_log` (
            `logId` bigint(20) NOT NULL AUTO_INCREMENT,
            `id` varchar(30) NOT NULL,
            `record` longtext,
            `statusCode` char(10) DEFAULT NULL,
            `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `failedReason` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`logId`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $sql = $sql1 . $sql2 . $sql3 . $sql4;
        //   echo $sql1;
        $this->db->query($sql);
    }
}
