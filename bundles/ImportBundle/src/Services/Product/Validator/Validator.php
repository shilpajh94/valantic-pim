<?php
namespace SioBundle\Services\Validator;
use AppBundle\Services\Import;
use Exception;
use AppBundle\Controller\LogController as Logger;
class Validator {
    private $spreadsheet;
    private $columns;
    // It will assign instance of class which will import all data (Class which will be created by PIM using Class from backend)
    private $instance; 
    private $filePath;
    private $validatorClass;
    private $configuredColumns;
    private $logFileName;
    public function ValidateImportAndGetConfiguredData($param) {
        /* p_r($param);
        Output
        array:3 [
            "filePath" => "/home/praganosis/Working/Doc/siop.xlsx"
            "validatorClass" => "AppBundle\Services\Validator\Category"
            "mappedClass" => "Category"
        ] */
        $this->updateDefaults($param);
        try {
            if(isset($param['filePath'])) {
                $this->spreadsheet = Import::load($this->filePath);
                $this->columns = $this->extractColumn();
                if($this->columns) {
                    if($this->validateColumn()) {
                        // echo "Column Validated";
                        $data = array(
                            'colsIndex' => $this->getColsIndex(),
                            'configuredClassData'    =>  $this->instance->getAllProps()
                        );
                        return $data;
                    }
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            Logger::error($this->logFileName, $th);
            // echo $th->getMessage();
            die;
        }
    }

    
    public function validateColumn() {
        $this->columns = array_map("trim", $this->columns);
        $this->instance = $this->getInstanceOfConfigurationClass();
        $this->configuredColumns = $this->instance->columns;
        try {
            if(count($this->configuredColumns)) {
                /* convert array value into key to compare configured keys */
                $flippedCols = array_flip($this->columns);
                $diff = array_diff_key($this->configuredColumns, $flippedCols);
                if(count($diff)) {
                    throw new Exception('Configured column(s) could not found in imported file. Please check "'.get_class($this->instance).'" class');
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
            Logger::error($this->logFileName, $th);
            // echo $th->getMessage();
            die;
            return false;
        }
        return true;
    }

    /* This function will return array with matched column name with index */
    public function getColsIndex() {
        $ind = array();
        foreach($this->columns as $k=>$v) {
            if(array_key_exists($v, $this->configuredColumns)) {
                $ind[$v] = $k;
            }
        }
        return $ind;
    }

    public function getInstanceOfConfigurationClass() {
        return new $this->validatorClass;
    }

    public function extractColumn() {
        try {
            if($this->spreadsheet) {
                $activeSheet = $this->spreadsheet->getActiveSheet()->toArray();          
                foreach ($activeSheet as $rowCnt => $reader) {
                    return $reader;
                }
            } else {
                throw new Exception('Imported sheet has no columns');
            }
        } catch (\Throwable $th) {
            //throw $th;
            Logger::error($this->logFileName, $th);
            // echo $th->getMessage();
            die;
        }
        
        return false;
    }

    /* This function will override the default configuration */
    private function updateDefaults($params)
    {
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                if(property_exists($this, $k)) {
                    $this->$k = $v;
                }
                
            }
        }
    }
}