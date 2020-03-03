<?php

namespace ImportBundle\Services\Category\Validator;

use Exception;
use Pimcore\Model\DataObject;

class Category
{
    public $columns;
    public $totalLevel;
    public $level;
    public $isTree;
    public $root;

    public $codeLength;
    public $levelLength;
    public $businessUnit;
    public $validCategories;
    public $rowCnt;

    public function __construct()
    {
        $this->rowCnt = 0;
        /* Column name and it's position */
        $this->common = \Pimcore::getContainer()->get('app.common_helper');
        $this->common->loadConfig('category.yml');
        $this->catHelper = $this->common->getInstance('app.category_helper');
        $this->columns = $this->common->getParameterItem('sheet','columnName');
    }
    public function validateSpreadSheet($spreadsheet)
    {
        $activeSheet = $spreadsheet->getActiveSheet()->toArray();
        $columns = $this->extractColumns($activeSheet);
        if(count($this->columns)!==count($columns)) {
            return array(
                'status'    =>  false,
                'message'   =>  'Uploaded file column(s) does not match with predefined configuration.'
            );
        }
        $reader = array_combine($this->columns, $columns);
        return $this->validateRow($reader);
    }

    public function validateRow($reader)
    {
        $flag = true;
        if (array_key_exists('code', $reader)) {
            if (!$this->catHelper->getLevels($reader['code'])['status']) {
                $flag = false;
                $exception = 'Column for code is not valid at row number ' . $this->rowCnt . '. Please check the code position or it\'s content length';
            }
        }
        if ($flag && array_key_exists('level', $reader)) {
            if (!$this->validateLevel($reader['level'])) {
                $flag = false;
                $exception = 'Column for level is not valid at row number ' . $this->rowCnt . '. Please check the column position or it\'s content length';
            }
        }
        if ($flag && array_key_exists('description', $reader)) {
            if (!$this->validateDescription($reader['description'])) {
                $flag = false;
                $exception = 'Column for description is not valid at row number ' . $this->rowCnt . '. Please check the column position or it\'s content length';
            }
        }

        return array(
            'status'    =>  $flag,
            'message'   =>  $exception
        );
    }

    private function validateDescription($description)
    {
        if (!empty($description)) {
            return true;
        }
        return false;
    }

    private function validateLevel($level)
    {
        if (!empty($level) && is_numeric($level)) {
            return strlen($level) == 1 ?: false;
        }
        return false;
    }
    private function extractColumns($activeSheet)
    {
        foreach ($activeSheet as $rowCnt => $reader) {
            $this->rowCnt = $rowCnt;
            if ($rowCnt == 1) {
                return $reader;
            }
        }
    }
}
