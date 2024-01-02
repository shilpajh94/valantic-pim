<?php
namespace PTGEU\ImportBundle\Services;

class MyReadFilterService implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {

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

    public function readCell($column, $row, $worksheetName = '')
    {
        if ($row >= $this->startRow && $row <= $this->endRow &&
        in_array($column,range('A',$this->lastCol))
        ) {
            return true;
        }
        return false;
    }
}
