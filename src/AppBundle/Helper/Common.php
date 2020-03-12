<?php

namespace AppBundle\Helper;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;

class Common
{
    public $config;
    public $path;
    
    public function __construct($path=__DIR__ . '/../Resources/config')
    {
        $this->path = $path;
    }
    public function loadConfig($file="commands.yml")
    {
        $this->config = new ContainerBuilder();
        $loader = new Loader\YamlFileLoader($this->config, new FileLocator($this->path));
        $loader->load($file);        
        return $this->config;
    }

    public function getParameter($key) {
        return $this->config->getParameter($key);        
    }

    public function getInstance($service) {
        return \Pimcore::getContainer()->get($service);
    }

    public function getParameterItem($key, $item) {
        return $this->config->getParameter($key)[$item];
    }

    public function moveFile($param)
    {
        /* 
            @$status: success or failed
            if success then move file to archive else move to failed folder
        */
        $filePath = $param['filePath'];
        $failedPath = $param['failedPath'];
        $archivePath = $param['archivePath'];
        $status = strtolower($param['status']);
        $fileObj = \Pimcore\Model\Asset::getByPath($filePath);
        $fileName = $fileObj->getFilename();
        $ext = $this->getExt($fileObj->getFilename());
        $newAsset = new \Pimcore\Model\Asset();
        if ($ext) {
            $fileName = $fileObj->getFilename();
            $fileName = substr($fileName, 0, strrpos($fileName, "."));
            $fileName = $fileName . '-' . $param['fileName'] . '.' . $ext;
        }
        $newAsset->setFilename($fileName);

        switch ($status) {
            case true:
                $parentInfo = \Pimcore\Model\Asset::getByPath($archivePath);
                $newAsset->setParentId($parentInfo->getId());
                $newAsset->setData(file_get_contents($fileObj->getFileSystemPath()));
                break;
            case false:
                $parentInfo = \Pimcore\Model\Asset::getByPath($failedPath);
                $newAsset->setParentId($parentInfo->getId());
                $newAsset->setData(file_get_contents($fileObj->getFileSystemPath()));
                break;
            default:
                throw new Exception('Issue in file moving after import ');
        }
        $newAsset->save(["versionNote" => "Import completed and status is $status, file path is: " . $fileObj->getFullPath()]);
        $fileObj->delete();
        return $newAsset;
    }

    public function getExt($fileName)
    {
        if (!empty($fileName)) {
            $arr = explode(".", $fileName);
            return end($arr);
        }
        return false;
    }
}
