<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImportBundle\Services\Model;

use Exception;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use ImportBundle\Services\Import;
use ImportBundle\Services\ImportConstants;

/**
 * Description of AssetImportModel
 *
 * @author rohitsrivastava
 */
class AssetImportModel {
    //put your code here
    public function __construct() {
        $this->datasource = 'ASSETS'; // "ASSETS" OR "FTP"
        $this->assetFilePath = '/Data Import Files/Price List/PIM_ListPrice.csv';
    }
}
