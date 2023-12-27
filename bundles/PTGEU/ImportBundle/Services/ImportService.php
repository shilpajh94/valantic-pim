<?php

namespace PTGEU\ImportBundle\Services;

use PTGEU\ImportBundle\Services\MyReadFilterService;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class ImportService
{
    private static $fileType;
    private static $spreadsheet;
    private static $filePath;
    private static $startRow;
    public static function load($config)
    {
        if(!is_array($config)) {
            self::$filePath = $config;
        } else {
            self::$filePath = $config['filePath'];
            self::$startRow = $config['startRow'];
        }
        self::$fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify(self::$filePath);
        
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader(self::$fileType);
        $workSheetInfo = $reader->listWorksheetInfo(self::$filePath);
       
        $workSheet = array_shift($workSheetInfo);
       
        $reader->setLoadSheetsOnly($workSheet['workSheetName']);
        $workSheet['startRow'] = self::$startRow ? : 0;
        $flag = $reader->setReadFilter(new MyReadFilterService($workSheet));
      
        if ($flag) {
            self::$spreadsheet = $reader->load(self::$filePath);
            return self::$spreadsheet;
        }

        return false;

    }

    public static function getActiveSheetInfo($worksheet) {
        /* Current worksheet will return following value of sheet */
        return array(
            'highestRow'        =>  $worksheet->getHighestRow(),
            'highestDataRow'    =>  $worksheet->getHighestDataRow(),
            'highestColumn'     =>  $worksheet->getHighestColumn(),
            'highestDataColumn' =>  $worksheet->getHighestDataColumn(),
        );
    }

    public static function setCell($cellName, $cellValue) {
        self::$spreadsheet->getActiveSheet()->setCellValue($cellName,$cellValue);
    }
    public static function save() {
        // Get an object of the writer by passing current spreadsheet and file type
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter(self::$spreadsheet, self::$fileType);
        // Save the updated spreadsheet
        $writer->save(self::$filePath);
    }

    public static function getCSVData($fileName)
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
            $dialect->delimiter = ',';
            if (($handle = fopen($csvFilePath, 'r')) !== false) {
                while (($rowData = fgetcsv($handle, 0, $dialect->delimiter, $dialect->quotechar,
                 $dialect->escapechar)) !== false) {
                    if ($count == 0) {
                        foreach ($rowData as $key => $value) {
                            unset($rowData[$key]);
                            $rowData[utf8_decode(trim($key))] = utf8_decode(trim(str_replace("°","",$value)));
                        }
                        $firstRowData = $rowData;
                    } else {
                        $data[] = $rowData;
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
