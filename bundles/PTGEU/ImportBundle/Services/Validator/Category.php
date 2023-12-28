<?php

namespace PTGEU\ImportBundle\Services\Validator;

use Exception;
use Pimcore\Model\DataObject;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
    public $rowCnt;
    private $catConfigData;
    private $common;
    private $catHelper;
    private $container;
    private $exception;
    
    public function __construct(ContainerInterface $container)
    {
        $this->rowCnt = 0;
        $this->container = $container;

        /* Column name and it's position */
        $this->common = $this->container->get('import.common_helper');
        $this->catConfigData = $this->container->get('import.config_provider_service')->getCategoryConfig();
        $this->catHelper = $this->container->get('import.category_helper');
        $this->columns = $this->common->getParameterItem($this->catConfigData, 'sheet','columnName');
    }

    public function validateSpreadSheet($spreadsheet)
    {
        $activeSheet = $spreadsheet->getActiveSheet()->toArray();
        $cols = $this->extractColumns($activeSheet);
        if(count($this->columns)!==count($cols)) {
            return array(
                'status'    =>  false,
                'message'   =>  'Uploaded file column(s) does not match with predefined configuration.'
            );
        }
        $reader = array_combine($this->columns, $cols);
        return $this->validateRow($reader);
    }

    public function validateRow($reader)
    {
        $flag  = true;
        if (array_key_exists('code', $reader) &&
        !$this->catHelper->getLevels($reader['code'])['status']
        ) {
            $flag = false;
            $this->exception = 'Column for code is not valid at row number ' .
                $this->rowCnt . '. Please check the code position or it\'s content length';
        }
        if ($flag && array_key_exists('level', $reader) &&
        !$this->validateLevel($reader['level'])
        ) {
            $flag = false;
            $this->exception = 'Column for level is not valid at row number ' .
                $this->rowCnt . '. Please check the column position or it\'s content length';
        }
        if ($flag && array_key_exists('description', $reader) &&
        !$this->validateDescription($reader['description'])
        ) {
            $flag = false;
            $this->exception = 'Column for description is not valid at row number ' .
                $this->rowCnt . '. Please check the column position or it\'s content length';
        }

        return array(
            'status'    =>  $flag,
            'message'   =>  $this->exception
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
