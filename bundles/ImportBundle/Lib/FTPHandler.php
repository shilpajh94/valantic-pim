<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ImportBundle\Lib;
use phpseclib\Net\SFTP;
use ImportBundle\Lib\Constants;
/**
 * Description of FTPHandler
 *
 * @author rohitsrivastava
 */
class FTPHandler {

    private $sftp;
    private $host; // = FTP_HOST;
    private $username; // = FTP_USERNAME;
    private $password; // = FTP_PASSWORD;
    private $folderPath; // = FTP_FOLDER;
    private $archivePath; // = FTP_ARCHIVE_FOLDER;
    private $fileStartWith; // = FTP_FILE_START_WITH;
    private $fileExt; // = FTP_FILE_EXT;
    private $importPath; // = PIMCORE_PRIVATE_VAR.IMPORT_FILE_DIR;
    public $latestFile = '';
    public $files = '';


    public function __construct() {
        $this->host = Constants::FTP_HOST;
        $this->username = Constants::FTP_USERNAME;
        $this->password = Constants::FTP_PASSWORD;
        $this->folderPath = Constants::FTP_FOLDER;
        $this->port = 21;
        $this->archivePath = '';//$params['FTP_ARCHIVE_FOLDER'];
        $this->fileStartWith = ''; //$params['FTP_FILE_START_WITH'];
        $this->fileExt = '' ; //$params['FTP_FILE_EXT'];
        $this->importPath = ''; //PIMCORE_PRIVATE_VAR.$params['IMPORT_FOLDER'];
        
    }

    /*
     * Connect to S3
     */
    public function connect() {
//        $sftp = new SFTP($this->host, $this->port);
//        if (!$sftp->login($this->username, $this->password)) {
//            //print_r($sftp); die;
//            throw new \Exception('Cannot login into your server !');
//        }
//        $this->sftp = $sftp;
        $sftp = ftp_connect($this->host, $this->port);
        if (!ftp_login($sftp, $this->username, $this->password)) {
            throw new \Exception('Cannot login into your server !');
        }
        $this->sftp = $sftp;
    }

    /*
     * Get latest filename
     */
    public function getLatestFileName() {
        $files = $this->sftp->nlist($this->folderPath);

        // change this logic according to your need
        $files = preg_grep('/^('.$this->fileStartWith.')+([0-9]+)\.('.$this->fileExt.')$/i' , $files);
        
        if(count($files) > 0) {
            $this->latestFile = max($files);
        }
    }
    
    /*
     * Get latest filename
     */
    public function getAllLatestFiles() {
        $files = $this->sftp->nlist($this->folderPath);
        $currentDate = date('Ymd'); //"20190522";
        $yesterday = date("Ymd", mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));
        // change this logic according to your need
        $todayFiles = preg_grep('/^('.$this->fileStartWith.')+('.$currentDate.')+([0-9-]+)+\.('.$this->fileExt.')$/i' , $files);
        if (count($todayFiles)>0) {
            $this->files = $todayFiles;
        } else {
            $yFiles = preg_grep('/^('.$this->fileStartWith.')+('.$yesterday.')+([0-9-]+)+\.('.$this->fileExt.')$/i' , $files);
            if (count($yFiles)>0) {
                $this->files = $yFiles;
            }
        }
    }

    /*
     * Move file into archive folder
     */
    public function moveToArchive() {
        if(!empty($this->files)) {
            foreach ($this->files as $file) {
                $source = "/".$this->folderPath."/".$file;
                $destination = "/".$this->archivePath."/".$file;
                $flag = $this->sftp->put($destination, $this->sftp->get($source));
                if($flag) {
                    $this->sftp->delete($source);            
                }
            }
        }
    }

    /*
     * Copy file to local system
     */
    public function copyToLocal() {
        if(!empty($this->latestFile)) {
            $source = $this->folderPath."/".$this->latestFile;
            $destination = $this->importPath."/".$this->latestFile;
            $this->sftp->get($source, $destination);
        }
    }    

    /*
     * Copy file to local system
     */
    public function copyFilesToLocal() {
        if(!empty($this->files)) {
            foreach ($this->files as $file) {
                $source = $this->folderPath."/".$file;
                $destination = $this->importPath."/".$file;
                $this->sftp->get($source, $destination);
            }
        }
    }
    
    
    public function getFtpFileContent($ftpPath, $filename) {
        try {
            $tmpFile = PIMCORE_TEMPORARY_DIRECTORY."/tmp-".date("Ymdhis")."-".$filename;
            ftp_get($this->sftp, $tmpFile, $this->folderPath."/".$ftpPath, FTP_BINARY);
            //$this->sftp->get($this->folderPath."/".$ftpPath, $tmpFile);
            $content = file_get_contents($tmpFile);
            unlink($tmpFile);
            return $content;
        } catch (\Exception $e) {
            return false;
        }
        
    }
    
}
