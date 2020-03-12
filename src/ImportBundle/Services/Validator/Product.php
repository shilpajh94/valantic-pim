<?php

namespace ImportBundle\Services\Validator;

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
    public $productType;
    private $prdHelper;
    public function __construct()
    {
        $this->rowCnt = 0;
        $this->prdHelper = \Pimcore::getContainer()->get('app.product_helper');
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
            if (!$this->prdHelper->getLevels($reader['code'])['status']) {
                $flag = false;
                $exception = 'Column for code is not valid at row number ' . $this->rowCnt . '. Please check the code position or it\'s content length';
            }
        }


        return array(
            'status'    =>  $flag,
            'message'   =>  $exception
        );
    }

    public function validateBaseOrSkeleton($oldMaterial, $skeletonLength = 9)
    {
        /**
         * @ This function will check and return status about variant creation. Please read the status code
         * Code: 1 -> Material code exist and variant will be created under base/skeleting
         * Code: 2 -> Material code exist but length is less than statndard lendth of skeleton
         * Code: 3 -> Material code does not exist and variant will be created at base level
         */
        $code = 3; // Material code does not exist and variant will be created at base level
        $message = '';
        $len = strlen($oldMaterial);
        
        if (!empty($oldMaterial) && is_numeric($oldMaterial)) {
            if ($len >= $skeletonLength) {
                $code = 1;
            } else {
                $code = 2;
                $message = 'Old Material code does not match with standard skeleton code length';
            }
        }
        return array(
            'code'  =>  $code,
            'message'   =>  $message
        );
    }

    private function isEmpty($str)
    {
        if (!empty($str)) {
            return true;
        }
        return false;
    }

    
}
