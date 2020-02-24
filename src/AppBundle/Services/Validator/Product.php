<?php

namespace AppBundle\Services\Validator;

use Exception;

class Product
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
<<<<<<< HEAD
=======
    public $productType;
>>>>>>> master

    public function __construct()
    {
        $this->rowCnt = 0;
        /* Column name and it's position */
        // code is "Prod Hier" in excel header
        $this->columns = array(
            'material', 'language', 'description', 'group', 'code',
            'baseUOM', 'oldMaterial', 'prodHier1', 'prodHier1Desc', 'prodHier2', 'prodHier2Desc',
            'prodHier3', 'prodHier3Desc', 'prodHier4', 'prodHier4Desc', 'prodHier5', 'prodHier5Desc',
            'prodHier6', 'prodHier6Desc', 'industryStandard', 'manufacture', 'manufacturePartNumber',
            'eanUPC', 'stccCode'
        );
        $this->level = array(
            1   => array(
                'codeLength'        =>  2,
                'fullCodeLength'    =>  2,
                'key'               =>  'prodHier1Desc'
            ),
            2   => array(
                'codeLength'        =>  4,
                'fullCodeLength'    =>  6,
                'key'               =>  'prodHier2Desc',
            ),
            3   => array(
                'codeLength'        =>  4,
                'fullCodeLength'    =>  10,
                'key'               =>  'prodHier3Desc'
            ),
            4   => array(
                'codeLength'        =>  3,
                'fullCodeLength'    =>  13,
                'key'               =>  'prodHier4Desc'
            ),
            5   => array(
                'codeLength'        =>  3,
                'fullCodeLength'    =>  16,
                'key'               =>  'prodHier5Desc'
            ),
            6   => array(
                'codeLength'        =>  2,
                'fullCodeLength'    =>  18,
                'key'               =>  'prodHier6Desc'
            ),
        );
        $this->root = array(
            'type'      =>  'dataObject',
            'subType'   =>  'folder',
            'fullPath'  =>  '/Products Master',
            'id'        =>  171,
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
        /* $this->parentPath = array(
            'IFS'   =>  
        ); */
<<<<<<< HEAD
=======
        $this->productType = array(
            6   =>  '6Digit',
            9   =>  '9Digit',
            14  =>  'Base (14 Digit)'
        );
>>>>>>> master
    }

    public function getLevels($code, $reader = array())
    {
        $buCode = $this->isValidCategoryFormat($code);
        $bu = $this->businessUnit[$buCode];
        /* Replace product hierarchy descrioption for level 1 with business unit*/
        $reader['prodHier1Desc'] = $bu;
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
        for ($i = $level; $i >= 1; $i--) {
            $objectKey = empty($reader) ?: $reader[$this->level[$i]['key']];
            $parentLevel = $this->getParentLevel($i);
            $levelFullCode = $this->extractFullCodeLevelWise($i, $code);
            $parentFullCode = $this->extractFullCodeLevelWise(($i - 1), $code);
            $parentPath = $parentLevel?$this->getParentPath($parentLevel, $buCode, $reader):$this->root['fullPath'];
            $objectPath = $parentPath.'/'.$objectKey;
            $levels[$i] = array(
                'code'          =>  $this->extractCodeLevelWise($i, $code),
                'parentCode'    =>  $this->extractCodeLevelWise($parentLevel, $code),
                'fullCode'      =>  $code,
                'levelFullCode' =>  $levelFullCode,
                'parentFullCode' =>  $parentFullCode,
                'level'         =>  $i,
                'bu'            =>  $bu,
                'objectKey'     =>  $objectKey,
                'parentObjectKey'   =>  empty($reader) ?: $reader[$this->level[$parentLevel]['key']],
                'objectPath'    =>  $objectPath,
                'parentPath'    =>  $parentPath
            );
            // p_r($levels);die;
        }

        return array(
            'status'    =>  true,
            'levels'    =>  $levels
        );
    }

    public function getParentPath($lvl, $buCode, $reader)
    {
        $bu = $this->businessUnit[$buCode];
        $path = '';
        if ($lvl == 1) {
            $path = '';
        } else {
            for ($i = 1; $i <= $lvl; $i++) {
                // $path[] = \Pimcore\Model\Element\Service::getValidKey($reader[$this->level[$i]['key']], 'object');
                if (empty($path))
                    $path = \Pimcore\Model\Element\Service::getValidKey($reader[$this->level[$i]['key']], 'folder');
                else {
                    $path .= '/' . \Pimcore\Model\Element\Service::getValidKey($reader[$this->level[$i]['key']], 'folder');
                }
            }
        }
        if(empty($path)) {
            $path = $this->root['fullPath'].'/'.$bu;
        } else {
            $path = $this->root['fullPath'].'/'.$path;
        }
        return $path;
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
        $exception = '';
        if (array_key_exists('material', $reader)) {
            if (!$this->isEmpty($reader['material'])) {
                $flag = false;
                $exception = 'Material Code is not valid at row number ' . $this->rowCnt . '. Please check the code position or it\'s content length';
            }
        }
        if ($flag && array_key_exists('description', $reader)) {
            if (!$this->isEmpty($reader['description'])) {
                $flag = false;
                $exception = 'Column for description is not valid at row number ' . $this->rowCnt . '. Please check the column position or it\'s content length';
            }
        }
        if (array_key_exists('code', $reader)) {
            if (!$this->getLevels($reader['code'])['status']) {
                $flag = false;
                $exception = 'Column for code is not valid at row number ' . $this->rowCnt . '. Please check the code position or it\'s content length';
            }
        }

        
        return array(
            'status'    =>  $flag,
            'message'   =>  $exception
        );
    }

    private function isEmpty($str)
    {
        if (!empty($str)) {
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
            'level'         =>  $this->level,
            'oldMaterialLength' =>  14,
            'cmnPrdSpecLength'  =>  6, // Brand
            'cmnSpecLength'     =>  9 // Skeleton
        );
        return $data;
    }
}
