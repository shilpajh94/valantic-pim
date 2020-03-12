<?php

namespace AppBundle\Helper;

use Pimcore\Model\DataObject;

class Category
{
    private $common;
    private $root;
    private $codeLength;
    private $validCategories;
    private $businessUnit;
    private $catConfigData;
    public function __construct()
    {
        /* Initiate common helper */
        $this->common = \Pimcore::getContainer()->get('app.common_helper');
        /* Loading global configuration for category */
        $this->catConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getCategoryConfig();
        $this->root = $this->common->getParameter($this->catConfigData, 'root');
        $this->codeLength = $this->common->getParameter($this->catConfigData, 'codeLength');
        $this->levelLength = $this->common->getParameter($this->catConfigData, 'levelLength');
        $this->validCategories = $this->common->getParameter($this->catConfigData, 'validCategories');
        $this->businessUnit = $this->common->getParameter($this->catConfigData, 'businessUnit');
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
        }

        return array(
            'status'    =>  true,
            'levels'    =>  $levels
        );
    }

    /**
     * this function will extract fullcode of given level
     */
    public function extractFullCodeLevelWise($currLevel, $code)
    {
        $levelLength = $this->levelLength[$currLevel];
        return substr($code, 0, $levelLength);
    }

    /**
     * this function will extract code of given level
     */
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

    public function getLevel2ParentId($bu)
    {
        $path = $this->root['fullPath'] . '/' . $bu;
        return DataObject\Service::createFolderByPath($path)->getId();
        /* $o = DataObject::getByPath($path);
        if (!empty($o)) {
            return $o->getId();
        } else {
            $pobj = DataObject::getByPath($this->root['fullPath']);
            if($pobj) {
                $buFol = new DataObject\Folder;
                $buFol->setKey($bu);
                $buFol->setParentId($pobj->getId());
                $buFol->save();
            }
        } */
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

    public function getObjectByFullCode($code, $bu)
    {
        if (!empty($code)) {
            // $obj = \Pimcore::getContainer()->get($this->listingService);
            $obj = new DataObject\ProductCategory\Listing;
            $obj->setCondition("FullCode='$code' AND BusinessUnit='$bu'");
            $obj->setLimit(1);
            $obj->load();

            foreach ($obj as $o) {
                if ($o->getId())
                    return $o;
            }
        }
        return false;
    }
}
