<?php
namespace ImportBundle\Services;
class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {

    private $startRow;
    private $endRow;
    private $lastCol;
    private $columns;
    public function __construct($config)
    {
        $this->startRow = $config['startRow'] ? : 1;
        $this->endRow   = isset($config['endRow']) ? $config['endRow'] : $config['totalRows'];
        $this->lastCol = $config['lastColumnLetter'];
        $this->columns = ['A', $this->lastCol];
    }
    public function readCell($column, $row, $worksheetName = '') {
        // Read title row and rows 20 - 30
        /* if ($row == 1 || ($row >= 20 && $row <= 30)) {
            return true;
        } */
        if ($row >= $this->startRow && $row <= $this->endRow) {
            if (in_array($column,range('A',$this->lastCol))) {
                return true;
            }
        }
        return false;
    }
}
