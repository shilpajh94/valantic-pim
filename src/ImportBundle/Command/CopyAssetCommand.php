<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;

/**
 * Description of CopyAssetCommand
 *
 * @author rohitsrivastava
 */
class CopyAssetCommand  extends AbstractCommand {
    
    private $fullFilesArray = [];
    protected function configure()
    {
        $this->setName('conti:copy-asset')
            ->setDescription('Asset Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $rootFolderPath = '/home/rohitsrivastava/Documents/Projects/ContiTech/Assets/HYH-Catalog_Links_Images/HYH-Catalog_Links_Images';
        $this->destPath = PIMCORE_PROJECT_ROOT.'/OneTimeImport/Assets';
        $this->filesPathArray = [];
        $this->filesNameArray = [];
        $this->getAllFilesOfDir($rootFolderPath);
        print_r($this->filesNameArray); die;
                
    }
    
    public function getAllFilesOfDir($rootFolderPath) {
        $dir = new \DirectoryIterator($rootFolderPath);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                if ($fileinfo->isDir()) {
                    $this->getAllFilesOfDir($fileinfo->getPathname());
                } else {
                    $sourceFilename = $fileinfo->getFileName();
                    $this->filesNameArray[] = $sourceFilename;
                    $destFilePath = $this->destPath."/".$sourceFilename;
                    copy($fileinfo->getPathname(), $destFilePath);
                    $this->filesPathArray[] = $fileinfo->getPathname();
                }
            }
        }
    }
    //put your code here
}
