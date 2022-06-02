<?php

/**
 * Command: conti:onetimeimport:availability-check-code-plant-import-master-update <filePath>
 * filePath: Your File path on system
 * Des: Availability check code plant import master table update.
 */

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Db;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;

class AvailabilityCheckCodePlantImportMasterUpdateCommand extends AbstractCommand
{
    private $db;
    private $t;
    protected function configure()
    {
        $this->setName('conti:onetimeimport:availability-check-code-plant-import-master-update')
            ->setDescription('Availability check code plant import master table update')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->db = Db::get();
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
            
            $plantMaterialData = $this->getPlantMaterialData();

            $updateArray = [];
            $totalUpdateCount = 0;
            $i = 0;
            if (isset($data) && is_array($data)) {
                foreach ($data as $result) {
                    $key = $result['Material'].'$'.$result['Plant'].'$'.$result['Sales Organization'].'$'.$result['Distribution Channel'];
                    if (array_key_exists($key, $plantMaterialData)) {
                        $dataArray = $plantMaterialData[$key];

                        $record = null;
                        $record = \stripslashes($dataArray['record']);
                        $record = json_decode($record);
                        $record[] = $result['Availability Check'];

                        $updateArray[] = [
                            'id' => $key,
                            'record' => $record,
                            'hash' => ''
                        ];
                        
                        if ($i == 1000) {
                            p_r('------------Updating '.count($updateArray).'---------------');
                            $totalUpdateCount += count($updateArray);
                            $this->updateTable($updateArray, 'material_plant_import_master');
                            $updateArray = [];
                            $i = -1;
                        }
                        $i++;
                    }
                }
                if (!empty($updateArray)) {
                    p_r('------------Updating '.count($updateArray).'---------------');
                    $totalUpdateCount += count($updateArray);
                    $this->updateTable($updateArray, 'material_plant_import_master');
                }
            }

            p_r('------------Total '.$totalUpdateCount.' records updated ---------------');

        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    
    public function updateTable($dataArray, $tableName) {
        try {
            $rowCount = 1;
            $firstRec = $dataArray[0];
            $keys = array_keys($firstRec);
            $sql = "INSERT INTO `".$tableName."` ";
            $sqlColumns = [];
            $updateColumns = [];
            $valColumns = [];
            foreach ($keys as $key) {
                    $sqlColumns[] = "`".$key."`";
                    if ($key!='oo_id') {
                            $updateColumns[] = "`".$key."`= VALUES(`".$key."`)";
                    }
                    $valColumns[] = $key;
            }
            $sql = $sql." (".implode(",", $sqlColumns).") VALUES ";
            $update = " ON DUPLICATE KEY UPDATE ".implode(",", $updateColumns);
            $values = '';
            foreach ($dataArray as $data) {
                    $id = $data['id'];
                    $record = addslashes(json_encode($data['record'], true));
                    $hash   = md5($record);
                    $values .= '("'.$id.'", "'.$record.'", "'.$hash.'"),';

                // inserting records in batch
                if ($rowCount % 1000 == 0) {
                    $query = $sql.rtrim($values, ',').$update;
                    $this->db->query($query);
                    $values = '';
                }
                $rowCount++;
            }
            if (!empty($values)) {
                $query = $sql.rtrim($values, ',').$update ;
                $this->db->query($query);
            }
        } catch (\Exception $e) {
            echo $e->getMessage(); die;
        }
    }
    
    private function getPlantMaterialData() {
        $sql = "SELECT `id`, `record`, `hash` From `material_plant_import_master`";
        $results = $this->db->fetchAll($sql);
        $plantMaterialArray = [];
        foreach ($results as $plantMaterial) {
            $plantMaterialArray[$plantMaterial['id']] = $plantMaterial;
        }
        return $plantMaterialArray;
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
