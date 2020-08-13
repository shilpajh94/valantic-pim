<?php

/**
 * File Path: /home/praganosis/Working/CSV/virtualcatalog.csv (Your File path on system)
 * Command: bin/console conti:onetimeimport:virtialcatalog /home/praganosis/Working/CSV/virtualcatalog.csv
 * Des: This command will import and enrich INF-HYD Virtual catalog data at base, skeleton, and product class.
 * Just run the above command, it will create all required temp table if it does not exist into system
 * After creation of temp table, it will process the sheet to import and enrich data
 */

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;
use Pimcore\Model\DataObject;

class VirtualCatalogImportCommand extends AbstractCommand
{

    const HOSE_BASE_OBJECT_BRICK_QUERY = 'object_brick_query_HoseBase_1';
    const HOSE_BASE_OBJECT_BRICK_STORE = 'object_brick_store_HoseBase_1';

    const HOSE_SKELE_OBJECT_BRICK_QUERY = 'object_brick_query_HoseSkeleton_1';
    const HOSE_SKELE_OBJECT_BRICK_STORE = 'object_brick_store_HoseSkeleton_1';

    const HOSE_FERT_OBJECT_BRICK_QUERY = 'object_brick_query_HoseFert_1';
    const HOSE_FERT_OBJECT_BRICK_STORE = 'object_brick_store_HoseFert_1';

    const BASE_QUERY_TABLE_NAME = 'object_query_1';
    const BASE_STORE_TABLE_NAME = 'object_store_1';

    const LOCALIZED_TABLE_1 = 'object_localized_data_1';

    const SUCCESS = "Success";
    const FAILED = "Failed";

    const BATCH_SIZE = 1000;
    private $langArr;
    private $db;
    private $t;
    private $results;
    private $baseLevelRecords;
    private $skeleLevelRecords;
    protected function configure()
    {
        $this->setName('conti:onetimeimport:hose')
            ->setDescription('Virtual Catalog Import')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $this->db = Db::get();
        $this->t = time();
        $this->langArr = \Pimcore\Tool::getValidLanguages();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->createTempTable();
            $this->import($filePath);
            $this->update();
            // $this->updateSkeleton();
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }


    private function import($filePath)
    {
        p_r('Importing data into temp table');
        $this->results = $this->getCSVData($filePath);
        $this->truncateTemp();
        $this->updateTable($this->results, 'virtual_catalog_temp');
    }

    /**
     * It will update object for catalog using php api
     */
    private function update()
    {
        $sql = "SELECT * FROM `virtual_catalog_temp`";
        $results = $this->db->fetchAll($sql);
        $logs = array();
        $arr6Digit = array();
        $digitFound = false;
        $keys = array();
        if (is_array($results) && !empty($results)) {
            foreach ($results as $i => $result) {
                $digitFound = false;
                $logs[$i] = array(
                    'data' => $result
                );

                if (!empty($result['6_Digit']) && is_numeric($result['6_Digit']) && strlen($result['6_Digit']) == 6) {
                    $digitFound = true;
                    $this->baseLevelRecords[$result['6_Digit']] = $result;
                } else {
                    $error[] = "Code {$result['6_Digit']} could not processed due to wrong length ";
                }
                /* if(!empty($result['6_Digit']) && is_numeric($result['6_Digit']) && strlen($result['6_Digit'])>=9) {
                    $digitFound = true;
                    $skeletonLevel = substr($result['6_Digit'], 0, 9);
                    $this->skeleLevelRecords[$skeletonLevel] = $result;
                    unset($skeletonLevel);
                } */
                if (!empty($error)) {
                    $logs[$i]['statusCode'] = self::FAILED;
                    $logs[$i]['failedReason'] =  implode(", ", $error);
                } else {
                    $logs[$i]['statusCode'] = self::SUCCESS;
                    $logs[$i]['failedReason'] = '';
                }
            }

            if (!empty($this->baseLevelRecords)) {
                $this->mapBaseLevelId($this->baseLevelRecords, array_keys($this->baseLevelRecords));
            }
            if (!empty($this->skeleLevelRecords)) {
                $this->mapBaseLevelId($this->skeleLevelRecords, array_keys($this->skeleLevelRecords));
            }

            $this->updateBase();
            /**
             * Update Log
             */
            p_r('Updateing Log');
            $this->insertDataToLogTable($logs);
            p_r('Updateing Log Done');
        }
    }

    private function updateBase()
    {
        /**
         * Updating Data
         */
        if (is_array($this->baseLevelRecords) && !empty($this->baseLevelRecords)) {
            p_r("Updating " . count($this->baseLevelRecords) . " Records at base level");
            foreach ($this->baseLevelRecords as $result) {
                $o = \Pimcore\Model\DataObject\Product::getById($result['level6n9digit_id']);
                if (!is_null($o)) {
                    p_r("Updating " . $result['level6n9digit_id']. ' '.$result['6_Digit'] );
                    if (!empty($result['Marketing_Long_Description'])) {
                        $o->setLongDescription($result['Marketing_Long_Description']);
                    }
                    if (!empty($result['Temperature_Range_F_and_C_Virtual_Catalog_Description'])) {
                        $o->setVirtualCatalogHoseTemperatureRangeFAndC($result['Temperature_Range_F_and_C_Virtual_Catalog_Description']);
                    }
                    if (!empty($result['Branding_Layline'])) {
                        $o->setBrandingLayline($result['Branding_Layline']);
                    }


                    // Hose Base Brick
                    if (!empty($result['Tube_Material_Virtual_Catalog_Description'])) {
                        $o->getBase()->getHoseBase()->setVirtualCatalogTubeMaterial($result['Tube_Material_Virtual_Catalog_Description']);
                    }
                    if (!empty($result['Cover_Material_Virtual_Catalog_Description'])) {
                        $o->getBase()->getHoseBase()->setVirtualCatalogCoverMaterial($result['Cover_Material_Virtual_Catalog_Description']);
                    }
                    if (!empty($result['Couplings_Virtual_Catalog_Description'])) {
                        $o->getBase()->getHoseBase()->setVirtualCatalogCoupling($result['Couplings_Virtual_Catalog_Description']);
                    }
                    if (!empty($result['Non_Stock_Sizes'])) {
                        $o->getBase()->getHoseBase()->setNonStockSizes($result['Non_Stock_Sizes']);
                    }

                    // Skeleton
                    if (!empty($result['Reinforcement_Virtual_Catalog_Description'])) {
                        // $o->getSkeleton()->getHoseSkeleton()->setVirtualCatalogReinforcement($result['Reinforcement_Virtual_Catalog_Description']);
                    }
                    $o->save();
                }
            }
        }
    }

    private function updateSkeleton()
    {
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
    private function updateObject()
    {
        $sql = "SELECT * FROM `virtual_catalog_temp`";
        $results = $this->db->fetchAll($sql);
        $logs = array();
        if (is_array($results) && !empty($results)) {
            foreach ($results as $i => $result) {
                $error = array();
                $success = array();
                $hoseLevels = NULL;
                // p_r($result);
                $logs[$i] = array(
                    'data' => $result
                );
                if (is_array($result) && !empty($result)) {
                    $hoseLevels = !empty($result['6_Digit']) ? explode(";", $result['6_Digit']) : $result['6_Digit'];
                    if (is_array($hoseLevels) && !empty($hoseLevels)) {
                        foreach ($hoseLevels as $hoseLevel) {
                            p_r('Process record number ' . ($i + 1));
                            $digitFound = true;
                            $records = array();
                            $bd = array();
                            $bdL = array();
                            $tblName = "";
                            $bd = $this->getBaseData($result, $hoseLevel);
                            $bdL = $this->getBaseLocalizedData($result, $hoseLevel);
                            if (strlen($hoseLevel) == 6) {
                                $d = array();
                                $records = $this->getBaseBrickData($result, $hoseLevel);
                                $this->updateBrickTable($records, self::HOSE_BASE_OBJECT_BRICK_QUERY);
                                // Update Store Table
                                $this->updateBrickTable($records, self::HOSE_BASE_OBJECT_BRICK_STORE);
                                $success[] = "Code $hoseLevel processed";
                            } else if (strlen($hoseLevel) == 9) {
                                $records = array();
                                $d = array();
                                $records = $this->getHoseSkeletonData($result, $hoseLevel);
                                $this->updateBrickTable($records, self::HOSE_SKELE_OBJECT_BRICK_QUERY);
                                $this->updateBrickTable($records, self::HOSE_SKELE_OBJECT_BRICK_STORE);
                                $success[] = "Code $hoseLevel processed";
                            } else {
                                $digitFound = false;
                                $error[] = "Code $hoseLevel could not processed due to wrong length";
                            }
                            if ($digitFound) {
                                $this->updateBaseTable($bd, self::BASE_QUERY_TABLE_NAME, 'oo_id');
                                $this->updateBaseTable($bd, self::BASE_STORE_TABLE_NAME, 'oo_id');
                                $this->updateLocalizedData($bdL, self::LOCALIZED_TABLE_1, 'ooo_id');
                                foreach ($this->langArr as $lk => $lang) {
                                    $tblName = "object_localized_query_1_" . $lang;
                                    $this->updateBaseTable($bdL, $tblName, 'ooo_id');
                                }
                            }

                            if (!empty($error)) {
                                $logs[$i]['statusCode'] = self::FAILED;
                                $logs[$i]['failedReason'] =  implode(", ", $error);
                            } else {
                                $logs[$i]['statusCode'] = self::SUCCESS;
                                $logs[$i]['failedReason'] = '';
                            }
                            unset($digitFound);
                        }
                    } else {
                        $error[] = "Not valid 6_9 digit code";
                        $logs[$i]['statusCode'] = self::FAILED;
                        $logs[$i]['failedReason'] = implode(", ", $error);
                    }
                }
            }
            /**
             * Update Log
             */
            p_r('Updateing Log');
            $this->insertDataToLogTable($logs);
            p_r('Updateing Log Done');
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

    private function updateBaseTable($results, $table, $pk)
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
                $wh = " WHERE $pk IN (SELECT o_id FROM objects WHERE o_key='" . $result['o_key'] . "')";
                // echo $sql . $cond . $wh;die;
                $this->db->query($sql . $cond . $wh);

                p_r('Processed Key: ' . $result['o_key']);
            }
        }
    }

    private function updateLocalizedData($results, $table, $pk)
    {
        $data = array();
        $oid = null;
        foreach ($this->langArr as $lang) {
            foreach ($results as $result) {
                if (empty($oid)) {
                    $oid = $this->getObjectIdByKey($result['o_key']);
                }
                $d = array(
                    'ooo_id' => $oid,
                    'longDescription' => $result['longDescription'],
                    'language' => $lang
                );
                array_push($data, $d);
            }
        }
        p_r($data);
        if (!empty($data)) {
            $this->updateTable($data, $table);
        }
    }

    private function getObjectIdByKey($key)
    {
        $sql = "SELECT o_id FROM objects WHERE o_key='" . $key . "'";
        $results = $this->db->fetchAll($sql);
        if (is_array($results)) {
            foreach ($results as $result) {
                return $result['o_id'];
            }
        }
        return null;
    }

    private function updateLog()
    {
        p_r('Updating Log..');
        $sql = "SELECT oht.* FROM oti_hosedata_temp oht LEFT JOIN object_1 o ON(o.articleNumber=oht.`Object`) WHERE o.o_id is null";
        $data = $this->db->query($sql);
        $this->insertDataToLogTable($data, "", "Object does not match in material mara");
    }


    private function getBaseData($r, $key)
    {
        $d[] = array(
            'o_key'  =>  $key,
            'BrandingLayline' => !empty($r['Branding_Layline']) ? $r['Branding_Layline'] : NULL,
            'VirtualCatalogBrandingLayline' => !empty($r['Branding_Layline']) ? $r['Branding_Layline'] : NULL,
            'virtualCatalogFlag' => 1
        );
        return $d;
    }
    private function getBaseLocalizedData($r, $key)
    {
        $d[] = array(
            'o_key'  =>  $key,
            'longDescription'   =>  !empty($r['Marketing_Long_Description']) ? $r['Marketing_Long_Description'] : NULL,
        );
        return $d;
    }
    /**
     * Getting HoseBase Data
     */
    private function getBaseBrickData($r, $key)
    {
        $d[] = array(
            'o_key'  =>  $key,
            'fieldname'  =>  'Base',
            'VirtualCatalogTubeMaterial' => !empty($r['Tube_Material_Virtual_Catalog_Description']) ? $r['Tube_Material_Virtual_Catalog_Description'] : NULL,
            'VirtualCatalogCoverMaterial' => !empty($r['Cover_Material_Virtual_Catalog_Description']) ? $r['Cover_Material_Virtual_Catalog_Description'] : NULL,
            'VirtualCatalogCoupling'    =>  !empty($r['Couplings_Virtual_Catalog_Description']) ? $r['Couplings_Virtual_Catalog_Description'] : NULL,
            'VirtualCatalogHoseTemperatureRangeFAndC' => !empty($r['Temperature_Range_F_and_C_Virtual_Catalog_Description']) ? $r['Temperature_Range_F_and_C_Virtual_Catalog_Description'] : NULL,
        );
        return $d;
    }

    private function getHoseSkeletonData($r, $key)
    {
        $d = array();
        $d[] = array(
            'o_key'  =>  $key,
            'fieldname'  =>  'Skeleton',
            'VirtualCatalogReinforcement'   =>  $r['Reinforcement_Virtual_Catalog_Description']
        );
        return $d;
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
                    if (!in_array($key, $ignore)) {
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
                        if ($table == 'object_brick_query_HoseSkeleton_1') {
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

    public function getCSVData($fileName)
    {
        try {
            $columns = ['6_Digit', 'Brand_Name', 'Marketing_Long_Description', 'Tube_Material_Virtual_Catalog_Description', 'Cover_Material_Virtual_Catalog_Description', 'Reinforcement_Virtual_Catalog_Description', 'Temperature_Range_F_and_C_Virtual_Catalog_Description', 'Branding_Layline', 'Couplings_Virtual_Catalog_Description', 'Non_Stock_Sizes'];

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
        $sql = "TRUNCATE virtual_catalog_temp;";
        $this->db->query($sql);
    }

    public function insertDataToLogTable($data)
    {
        try {
            $rowCount = 1;
            $sql = "INSERT INTO virtual_catalog_log (record, statusCode, failedReason, createdAt) VALUES";
            foreach ($data as $dataKey => $dataValue) {
                $success = $dataValue['statusCode'];
                $failedReason = $dataValue['failedReason'];
                $values .= '("' . addslashes(json_encode($dataValue['data'])) . '", "' . $success . '","' . $failedReason . '",now()),';
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
        $sql1 = "CREATE TABLE IF NOT EXISTS `virtual_catalog_temp` (
            `id` bigint(20) NOT NULL AUTO_INCREMENT,
            `6_Digit` varchar(190) NOT NULL,
            `Brand_Name` varchar(190) NOT NULL,
            `Marketing_Long_Description` text NOT NULL,
            `Tube_Material_Virtual_Catalog_Description` text NOT NULL,
            `Cover_Material_Virtual_Catalog_Description` text NOT NULL,
            `Reinforcement_Virtual_Catalog_Description` text NOT NULL,
            `Temperature_Range_F_and_C_Virtual_Catalog_Description` text NOT NULL,
            `Branding_Layline` varchar(190) NOT NULL,
            `Couplings_Virtual_Catalog_Description` text NOT NULL,
            `Non_Stock_Sizes` varchar(190) NOT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=411 DEFAULT CHARSET=utf8mb4;";
        //   $this->db->query($sql);

        $sql2 = "CREATE TABLE IF NOT EXISTS `virtual_catalog_log` (
            `logId` bigint(20) NOT NULL AUTO_INCREMENT,
            `record` longtext,
            `statusCode` char(10) DEFAULT NULL,
            `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `failedReason` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`logId`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        $sql = $sql1 . $sql2;
        //   echo $sql1;
        $this->db->query($sql);
    }
}
