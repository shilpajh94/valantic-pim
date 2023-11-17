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
        // $reader = new Xlsx;
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader(self::$fileType);
        $workSheetInfo = $reader->listWorksheetInfo(self::$filePath);
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
        $workSheet['startRow'] = self::$startRow ? : 0;
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

            // $csvFilePath = PIMCORE_ASSET_DIRECTORY . $filePath;

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
                        $data[] = $rowData;
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

}
