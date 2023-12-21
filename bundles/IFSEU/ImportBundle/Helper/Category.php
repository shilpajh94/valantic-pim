<?php

namespace IFSEU\ImportBundle\Helper;

use Pimcore\Model\DataObject;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Category
{
    private $common;
    private $root;
    private $codeLength;
    public $businessUnit;
    private $catConfigData;
    public $siopCodes;
    public $levelLength;
    private $container;

    public function __construct(ContainerInterface $container)
    {
        /* Initiate common helper */
        $this->container = $container;
        $this->common = $this->container->get('ifs_eu_import.common_helper');
        /* Loading global configuration for category */
        $this->catConfigData = $this->container->get('ifs_eu_import.config_provider_service')->getCategoryConfig();
        $this->root = $this->common->getParameter($this->catConfigData, 'root');
        $this->codeLength = $this->common->getParameter($this->catConfigData, 'codeLength');
        $this->levelLength = $this->common->getParameter($this->catConfigData, 'levelLength');
        $this->businessUnit = $this->common->getParameter($this->catConfigData, 'businessUnit');
    }

    public function getLevels($code, $kn = "")
    {
        $buCode = '50';
        $bu     = $this->businessUnit[$buCode];

        if (!$this->isValideCodeLength($code)) {
            return array(
                'status' => false,
                'message' => 'code "' . $code . '" length is not valid'
            );
        }

        $len    = strlen($code);
        $level  = $this->getLevelByLength($len);
        $levels = array();
        for ($i = $level; $i >= 1; $i--) {
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
                'bu'            => $bu
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
        if($levelLength)
            return substr($code, 0, $levelLength);
        else   
            return '';
    }

    /**
     * this function will extract code of given level
     */
    public function extractCodeLevelWise($level, $code)
    {
        $levelLength= isset($this->levelLength[$level]) ? $this->levelLength[$level] : NULL;
        $levelCode  = substr($code, 0, $levelLength);
        $len        = strlen($levelCode);
        $from       = $len - (isset($this->codeLength[$level]) ? $this->codeLength[$level] : 0);
        return substr($levelCode, $from, $len);
    }

    public function getParentLevel($currLevel)
    {
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

    public function getLevelOneParentId($bu)
    {
        $path = $this->root['fullPath'];
        return DataObject\Service::createFolderByPath($path)->getId();
    }

    public function getObjectByFullCode($code, $bu)
    {
        if (!empty($code)) {
            $obj = new DataObject\IFSEUProductCategory\Listing;
            $obj->setCondition("fullCode='$code' AND BusinessUnit='$bu'");
            $obj->setLimit(1);
            $obj->load();

            foreach ($obj as $o) {
                if ($o->getId())
                {
                    return $o;
                } 
            }
        }
        return false;
    }

    public function getCategories()
    {
        $catListing = new DataObject\IFSEUProductCategory\Listing;
        foreach($catListing as $cat) {
            $fullCode = $cat->getFullCode();
            $this->siopCodes[$fullCode] = array(
                'object' =>  $cat,
                'id'    =>  $cat->getId(),
                'fullPath'  =>  $cat->getFullPath()
            );
            unset($fullCode);
        }
       
        if($this->siopCodes)
        {
            return $this->siopCodes;
        }

        return false;
    }

    public function getCategoryIdByFullCode($fullCode)
    {
        if($this->siopCodes && array_key_exists($fullCode, $this->siopCodes)) {
            return $this->siopCodes[$fullCode]['id'];
        }
        return false;
    }

    public function getCategoryFullPathByFullCode($fullCode)
    {      
        if($this->siopCodes && array_key_exists($fullCode, $this->siopCodes)) {
            return $this->siopCodes[$fullCode]['fullPath'];
        }
        return false;
    }

    public function getObjectByCode($fullCode) {
        if($this->siopCodes && array_key_exists($fullCode, $this->siopCodes)) {
            return $this->siopCodes[$fullCode]['object'];
        }
        return false;
    }
}
