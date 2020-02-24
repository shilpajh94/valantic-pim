<?php

namespace AppBundle\Services\Validator;

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
        $this->columns = array('code', 'level', 'description', 'status');
        $this->level = array(
            1   => array(
                'codeLength'        =>  2,
                'fullCodeLength'    =>  2
            ),
            2   => array(
                'codeLength'        =>  4,
                'fullCodeLength'    =>  6
            ),
            3   => array(
                'codeLength'        =>  4,
                'fullCodeLength'    =>  10
            ),
            4   => array(
                'codeLength'        =>  3,
                'fullCodeLength'    =>  13
            ),
            5   => array(
                'codeLength'        =>  3,
                'fullCodeLength'    =>  16
            ),
            6   => array(
                'codeLength'        =>  2,
                'fullCodeLength'    =>  18
            ),
        );
        $this->root = array(
            'type'      =>  'dataObject',
            'subType'   =>  'folder',
            'fullPath'  =>  '/Master List/SIOP Master List/SIOP Engineered Products',
            'id'        =>  2,
            'parentId'  =>  ''
        );


        // Number of digit fixed for each level
        $this->codeLength = array(
            1 => 2, 2 => 4, 3 => 4, 4 => 3, 5 => 3, 6 => 2
        );
        // length of digit on each level
        $this->levelLength = array(
            1 => 2, 2 => 6, 3 => 10, 4 => 13, 5 => 16, 6 => 18
        );

        $this->validCategories = array(
            'Industrial Hose'   => 1000,
            'Hydraulics'        => 1500,
            'PTP'               => 3000
        );
        $this->businessUnit = array(
            1000 => 'IFS',
            1500 => 'IFS',
            3000 => 'PTG'
        );
    }

    public function getLevels($code, $kn = "")
    {
        $buCode = $this->isValidCategoryFormat($code);
        $bu = $this->businessUnit[$buCode];
        if (!$this->isValideCodeLength($code)) {
            return array(
                'status' => false,
                'message' => 'code "' . $code . '" length is not valid'
            );
        }
        if (!$buCode) {
            return array(
                'status' => false,
                'message' => 'code "' . $code . '" does not belong to any valid category'
            );
        }
        $len = strlen($code);
        $level = $this->getLevelByLength($len);
        $levels = array();
        for ($i = $level; $i >= 2; $i--) {
            $parentLevel = $this->getParentLevel($i);
            $levelFullCode = $this->extractFullCodeLevelWise($i, $code);
            $parentFullCode = $this->extractFullCodeLevelWise(($i - 1), $code);
            $levels[$i] = array(
                'code'  =>  $this->extractCodeLevelWise($i, $code),
                'parentCode'    =>  $this->extractCodeLevelWise($parentLevel, $code),
                'fullCode'      =>  $code,
                'levelFullCode' =>  $levelFullCode,
                'parentFullCode' =>  $parentFullCode,
                'level'         =>  $i,
                'bu'            =>  $bu
            );
            if ($i == $level) {
                $levels[$i]['objectKey'] = $kn;
            } else {
                $levels[$i]['objectKey'] = $kn . $levelFullCode;
            }
            /* If level is 2 then get it's parent id */
            if(2==$i) {
                $levels[$i]['parentId'] = $this->getLevel2ParentId($bu);
            } 
        }

        return array(
            'status'    =>  true,
            'levels'    =>  $levels
        );
    }

    public function extractFullCodeLevelWise($currLevel, $code)
    {
        $levelLength = $this->levelLength[$currLevel];
        return substr($code, 0, $levelLength);
    }
    public function extractCodeLevelWise($level, $code)
    {
        $len = strlen($code);
        $codeLength = $this->codeLength[$level];
        $levelLength = $this->levelLength[$level];
        // p_r($levelLength);

        $levelCode = substr($code, 0, $levelLength);
        $len = strlen($levelCode);
        $from = $len - $codeLength;
        return substr($levelCode, $from, $len);
    }

    public function getParentLevel($currLevel)
    {
        // if(2==$currLevel) {
        //     return $currLevel;
        // }
        return $currLevel - 1;
    }
    public function getLevelByLength($len)
    {
        return array_search($len, $this->levelLength);
    }

    public function isValideCodeLength($code)
    {
        $len = strlen($code);
        return in_array($len, $this->levelLength);
    }

    public function getLevel2ParentId($bu) {
        $path = $this->root['fullPath'].'/'.$bu;
        $o = DataObject::getByPath($path);
        if(!empty($o)) {
            return $o->getId();
        }
    }

    public function isValidCategoryFormat($code)
    {
        $levelLen = $this->levelLength;
        $startLevel = array_shift($levelLen);
        $startLvlcode = $this->extractCodeLevelWise($startLevel, $code);
        if (in_array($startLvlcode, $this->validCategories)) {
            return $startLvlcode;
        }
        return false;
    }

    public function validateSpreadSheet($spreadsheet)
    {
        $activeSheet = $spreadsheet->getActiveSheet()->toArray();
        $columns = $this->extractColumns($activeSheet);
        $reader = array_combine($this->columns, $columns);
        return $this->validateRow($reader);
    }

    public function validateRow($reader)
    {
        $flag = true;
        if (array_key_exists('code', $reader)) {
            if (!$this->getLevels($reader['code'])['status']) {
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
    public function getAllProps()
    {
        $data = array(
            'columns'       =>  $this->columns,
            'root'          =>  $this->root,
            'level'         =>  $this->level
        );
        return $data;
    }
}
