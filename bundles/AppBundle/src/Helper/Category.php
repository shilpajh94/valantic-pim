<?php

namespace AppBundle\Helper;

use Pimcore\Model\DataObject;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Category
{
    private $common;
    private $root;
    private $codeLength;
    private $validCategories;
    public $businessUnit;
    private $catConfigData;
    private $businessUnitMaxLevel;
    public $siopCodes;
    private $container;
    private $levelLength;
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        /* Initiate common helper */
        $this->common = $this->container->get('app.common_helper');
        /* Loading global configuration for category */
        $this->catConfigData = $this->container->get('app.config_provider_service')->getCategoryConfig();
        $this->root = $this->common->getParameter($this->catConfigData, 'root');
        $this->codeLength = $this->common->getParameter($this->catConfigData, 'codeLength');
        $this->levelLength = $this->common->getParameter($this->catConfigData, 'levelLength');
        $this->validCategories = $this->common->getParameter($this->catConfigData, 'validCategories');
        $this->businessUnit = $this->common->getParameter($this->catConfigData, 'businessUnit');
        $this->businessUnitMaxLevel = $this->common->getParameter($this->catConfigData, 'businessUnitMaxLevel');
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
                $levels[$i]['objectKey'] = $levelFullCode;
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
        $levelLength = isset($this->levelLength[$currLevel]) ? $this->levelLength[$currLevel] : NULL;
        return substr($code, 0, $levelLength);
    }

    /**
     * this function will extract code of given level
     */
    public function extractCodeLevelWise($level, $code)
    {
        $len = strlen($code);
        $codeLength = isset($this->codeLength[$level]) ? $this->codeLength[$level] : NULL;
        $levelLength = isset($this->levelLength[$level]) ? $this->levelLength[$level] : NULL;
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
        $path = $this->root['fullPath'];
        if (!empty($bu)) {
            $path = $this->root['fullPath'] . '/' . $bu;
        }
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

    public function getLevel1ParentId()
    {
        $path = $this->root['fullPath'];
        $obj = DataObject::getByPath($path);
        if (!empty($obj)) {
            return $obj->getId();
        }
        return false;
    }

    /**
     * Valid Categories
     * array:3 [
        "Industrial House" => 1000
        "Hydraulics" => 1500
        "PTP" => 3000
        ]
        Valid SIOP length level wise
        array:6 [
            1 => 2
            2 => 6
            3 => 10
            4 => 13
            5 => 16
            6 => 18
        ]
    $param: string - full siop code
    Will validate with above given category
     */
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
            // $obj = $this->container->get($this->listingService);
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

    /**
     * Param: string - full siop code
     * will return true or false if full code belong to maximum siop level
     */
    public function codeHoldMaximumLevel($code)
    {
        $buCode = $this->isValidCategoryFormat($code);
        $bu = $this->businessUnit[$buCode];
        $level = $this->getLevelByLength(strlen($code));
        $buMaxLevel = $this->businessUnitMaxLevel[$bu];
        /* Validating allowed max level for current business with current code level */
        if ($level == $buMaxLevel) {
            return true;
        }
        return false;
    }

    public function getCategories()
    {
        $catListing = new DataObject\ProductCategory\Listing;
        foreach($catListing as $cat) {
            $fullCode = $cat->getFullCode();
            $this->siopCodes[$fullCode] = array(
                'object' =>  $cat,
                'id'    =>  $cat->getId(),
                'fullPath'  =>  $cat->getFullPath()
            );
            unset($fullCode);
        }
        /* $stmt = \Pimcore\Db::get()->prepare("call getCategories()");
        $stmt->execute();
        $this->siopCodes = $stmt->fetchAllAssociative(); */
        if ($this->siopCodes)
            return $this->siopCodes;
        return false;
    }

    public function getCategoryIdByFullCode($fullCode)
    {
        $fcIndex = false;
        if ($this->siopCodes) {
            if(array_key_exists($fullCode, $this->siopCodes)) {
                return $this->siopCodes[$fullCode]['id'];
            }
        }
        return false;
    }

    public function getCategoryFullPathByFullCode($fullCode)
    {
        $fcIndex = false;
        if ($this->siopCodes) {
            if(array_key_exists($fullCode, $this->siopCodes)) {
                return $this->siopCodes[$fullCode]['fullPath'];
            }
        }
        return false;
    }

    public function getObjectByCode($fullCode) {
        if ($this->siopCodes) {
            if(array_key_exists($fullCode, $this->siopCodes)) {
                return $this->siopCodes[$fullCode]['object'];
            }
        }
        return false;
    }
}