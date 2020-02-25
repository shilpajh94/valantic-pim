<?php

namespace ImportBundle\Services;

use ImportBundle\Services\MyReadFilter;
// use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Import
{
    private static $fileType;
    private static $spreadsheet;
    private static $filePath;
    public static function load($filePath)
    {
        self::$filePath = $filePath;
        self::$fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($filePath);
        // $reader = new Xlsx;
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader(self::$fileType);
        $workSheetInfo = $reader->listWorksheetInfo($filePath);
        /* See Helper Function to explore worksheet
        https://phpspreadsheet.readthedocs.io/en/latest/topics/reading-files/#helper-methods
        */
        /* p_r($workSheetInfo); 
        eg:
            array:2 [
            0 => array:5 [
                "worksheetName" => "IFS"
                "lastColumnLetter" => "K"
                "lastColumnIndex" => 10
                "totalRows" => "73"
                "totalColumns" => 11
            ]
            1 => array:5 [
                "worksheetName" => "HYD & PTG"
                "lastColumnLetter" => "D"
                "lastColumnIndex" => 3
                "totalRows" => "944"
                "totalColumns" => 4
            ]
            ]
        */
        $workSheet = array_shift($workSheetInfo);
        
        /* 
        eg:
            p_r($workSheet);
            array:5 [
            "worksheetName" => "IFS"
            "lastColumnLetter" => "K"
            "lastColumnIndex" => 10
            "totalRows" => "73"
            "totalColumns" => 11
            ]

        */  
        $reader->setLoadSheetsOnly($workSheet['workSheetName']);
        $flag = $reader->setReadFilter(new MyReadFilter($workSheet));

        /* For Understanding, Exploring features of PHPOffice Spreadsheet */
        /* 
        $spreadsheet = $reader->load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        echo "Highest Total Rows: ".$worksheet->getHighestRow();
        echo "\nHighest Row: ".$worksheet->getHighestDataRow();
        echo "\nHighest Cols: ".$worksheet->getHighestDataColumn();
         */

        // p_r($spreadsheet);
        /* Writing into sheet */
        /*
        // Get an object of the current spreadsheet 
        $spreadsheet = $reader->load($filePath);
        // Set the cell value in the current spreadsheet eg: A1, B1, A2, B2
        $spreadsheet->getActiveSheet()->setCellValue('L1','Status');
        // Get an object of the writer by passing current spreadsheet and file type
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, self::$fileType);
        // Save the updated spreadsheet
        $writer->save($filePath);
         */
        if ($flag) {
            self::$spreadsheet = $reader->load($filePath);
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

}
