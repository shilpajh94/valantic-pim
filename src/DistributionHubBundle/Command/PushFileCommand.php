<?php

/**
 * ImportCommand
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) 2009-2016 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 * @desc This file is used for import execution
 *
 */

namespace DistributionHubBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputOption;
use Pimcore\Log\ApplicationLogger;
use Pimcore\Console\Dumper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject\Channel;
use Pimcore\Model\DataObject\Mapping;
use Carbon\Carbon;
use Pimcore\Model\DataObject\ClassDefinition;
use phpseclib\Net\SFTP;
use \NotificationBundle\Model\Notification;

/**
 * ImportCommand Class
 */
class PushFileCommand extends AbstractCommand {

    /**
     * configure command - for import execution
     */
    protected function configure() {
        $this
                ->setName('pushto:ftp')
                ->setDescription('Push file to FTP server Service')
                ->addOption('active', 'a', InputOption::VALUE_OPTIONAL, 'Active yes or no')
                ->addOption('maintenance', 'm', InputOption::VALUE_OPTIONAL, 'Ignore maintenance');
    }

    /**
     * Execute command - from cli
     *
     * @param InputInterface $input            
     * @param OutputInterface $output            
     *
     * @throws \Exception
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        try {

            $active = $input->getOption('active');
            $channels = new Channel\Listing();
            $channels->setCondition('active = 1');
            $channelsArr = $channels->load();

            if (count($channelsArr)) {

                foreach ($channelsArr as $channel) {

                    $mapping = $channel->getMapping();
                    $classUsed = $mapping->getClassUsed();

                    $class = $class = ClassDefinition::getByName($classUsed);
                    $fields = $class->getFieldDefinitions();

                    if (!is_object($mapping)) {
                        continue;
                    }
                    $channelId = $channel->getId();
                    $filter = $channel->getFilterConditions();
                    if (count($mapping->getColumns())) {

                        $headerMetaData = [];
                        $headerMetaData[0][0] = "id";
                        $headerMetaData[0][1] = "";
                        $headerMetaData[1][0] = "filename";
                        $headerMetaData[1][1] = "";
                        $headerMetaData[2][0] = "categoryName"; // remove ID
                        $headerMetaData[2][1] = ""; // remove ID
                        $headerMetaData[3][0] = "vendorName"; // remove ID
                        $headerMetaData[3][1] = ""; // remove ID
                        $headerMetaData[4][0] = "modifiedDate"; // remove filename
                        $headerMetaData[4][1] = ""; // remove ID


                        foreach ($mapping->getColumns() as $key => $col) {
                            $headerData[$key + 5] = $col[0];
                            if (trim($col[1]) != '') {
                                $field = explode("(", $col[1]);
                                $headerMetaData[$key + 5][0] = trim($field[0]);
                                if (isset($fields[trim($field[0])])) {
                                    $headerMetaData[$key + 5][1] = $fields[trim($field[0])]->getFieldType();
                                } else {
                                    $headerMetaData[$key + 5][1] = '';
                                }
                                // if the field is labelfield
                                if ($col[2] == true) {
                                    $headerMetaData[$key + 5][2] = true;
                                }
                            } else {
                                $headerMetaData[$key + 5][0] = '';
                            }
                        }

                        $mappingId = $mapping->getId();
                        $this->mappingObjectId = $mappingId;
                        $obj = new \DistributionHubBundle\Controller\ChannelController();
                        $gridData = $this->getGridData($classUsed, $headerMetaData, $filter);


                        $collections = $this->getCollectionDefinition($mapping->getId());
                        
                        $file = $obj->createCsvFile($classUsed, $headerMetaData, $gridData, $collections, $headerData, $mappingId);
                    } else {
                        continue;
                    }

                    if ($channel->getFtpFileType() === 'Excel') {

                        $filePath = PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/";
                        try {
                            $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
                            $objPHPExcel = $objReader->load($filePath . $file);
                            $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPExcel, 'Xlsx');
                            $file = "export" . time() . ".xlsx";
                            $objWriter->save($filePath . $file);
                        } catch (\Exception $e) {
                            throw new \Exception($e->getMessage());
                        }
                    }

                    $remote_file = '/SFTP/' . $file;
                    $soucefile = PIMCORE_PROJECT_ROOT . "/src/DistributionHubBundle/tmp/" . $file;



                    $websiteConfig = \Pimcore\Config::getWebsiteConfig();

                    $host = $websiteConfig->ftpHost;
                    $username = $websiteConfig->ftpUserName;
                    $password = $websiteConfig->ftpPassword;

                    $sftp = new SFTP($host);

                    if (!$sftp->login($username, $password)) {
                        throw new \Exception('Cannot login into your server !');
                    } else {

                        $success = $sftp->put($remote_file, $soucefile, SFTP::SOURCE_LOCAL_FILE);
                        if ($success) {
                            $adminUsers = \Pimcore\Model\WebsiteSetting::getByName('notifyUsers');
                            if (is_object($adminUsers)) {
                                $adminData = explode(",", $adminUsers->getData());
                                foreach ($adminData as $adminUser) {
                                    if (\Pimcore\Mail::isValidEmailAddress($adminUser)) {
                                        $adminArr[] = $adminUser;
                                    }
                                }
                            }
                            $channel->setActive(0);
                            $channel->save();
                            $notificationObj = new Notification();
                            $params = array('FILE_PATH' => $remote_file);
                            if (count($adminArr)) {
                                $templatePath = "/EmailTemplates/PushFTPNotificationTemplate";
                                $notificationObj->setTemplatePath($templatePath);
                                $notificationObj->sendNotification($params, $adminArr);
                            }
                            //$this->sendMail(array('anupam.chauhan@osscube.com'), "push to ftp automatic", "sucess");
                        }
                    }
                    echo "\n Success \n";
                }
            } else {
                throw new \Exception('No data export channels found.');
            }
        } catch (\Exception $excp) {
            $this->writeError("\n" . $excp->getMessage() . "\n");
        }
    }

    public function getGridData($class, $headerMeta, $filter = null) {
        $headerMetaData = $headerMeta;

        $classDefinition = \Pimcore\Model\DataObject\ClassDefinition::getByName(ucfirst($class));
        $featureJoins = $conditionFilters = [];

        if ($filter) {
            $filter = unserialize($filter);
            $filter = json_encode($filter);
            $conditionFilters[] = \Pimcore\Model\DataObject\Service::getFilterCondition($filter, $classDefinition);
        }

        $class = "\\Pimcore\\Model\\DataObject\\" . ucfirst($class) . "\\Listing";
        $productListing = new $class();
        $productListing->setOrderKey("o_modificationDate");
        $productListing->setCondition(implode(' AND ', $conditionFilters));
        $productListing->setOrder('DESC');
        $productListing->setObjectTypes([\Pimcore\Model\DataObject\AbstractObject::OBJECT_TYPE_VARIANT, \Pimcore\Model\DataObject\AbstractObject::OBJECT_TYPE_OBJECT]);

        $classColumns = array();

        foreach ($headerMetaData as $key => $value) {
            if ($value[0] != "IgnoreField") {
                if ($value[0] != "" && $value[0] != "id" && $value[0] != "filename" && $value[0] !== "categoryName" && $value[0] !== "vendorName" && $value[0] !== "modifiedDate") {
                    array_push($classColumns, $value[0]);
                }
                if ($value[2] == true) {
                    array_push($classColumns, $value[0] . '_clabel');
                }
            }
        }

        $gridAllData = array();

        foreach ($productListing->load() as $data) {
            $gridAllData[] = $this->rowData($data, $classColumns);
        }

        return $gridAllData;
    }

    public function rowData($data, $classColumns) {

        $tempArray = array();
        $tempArray['ID'] = $data->getO_Id();
        $tempArray['FILENAME'] = $data->getO_Key();
        $collectionIndex = 0;
        for ($j = 0; $j < count($classColumns); $j++) {
            $i = 2;
            foreach ($classColumns as $values) {
                $source = $this->getMappedSourceColumn($values);
                if (preg_match('/[~]/', $values)) {
                    $brick = explode("~", $values);
                    $classAttributeName = "get" . ucfirst($brick[0]);
                    $brickFieldName = "get" . ucfirst($brick[1]);
                    $brickName = "get" . ucfirst($brick[2]);

                    if ($data->{$classAttributeName}()->{$brickName}() != null) {
                        $column = $data->{$classAttributeName}()->{$brickName}()->{$brickFieldName}();
                        if ($column != null) {
                            $tempArray[$source] = $column;
                        }
                    }
                } else if (strpos($values, '_clabel')) {
                    $fieldArray = explode('_', $values);
                    $classDef = $data->getClass();
                    if ($classDef) {
                        $classField = $classDef->getFieldDefinition($fieldArray[0]);
                        if ($classField) {
                            $fieldTitle = $classField->getTitle();
                            $tempArray[$source] = $fieldTitle;
                        }
                    }
                } else if (preg_match('/[#]/', $values)) {
                    /* $collection = explode("#", $values);
                      $collectionFieldName = "get" . ucfirst($collection[0]);
                      $collectionName = "get" . ucfirst($collection[1]);
                      //$brickName = "get" . ucfirst($brick[2]);
                      if ($data->{$collectionName}() != null && count($data->{$collectionName}()->getItems())) {
                      $columnData = $data->{$collectionName}()->getItems()[$collectionIndex];
                      if (is_object($columnData)) {
                      $column = $columnData->{$collectionFieldName}();
                      if ($column != null) {
                      $keyVal = get_object_vars($column);
                      foreach ($keyVal as $keyValue) {
                      $tempArray[$source] = $keyValue;
                      }
                      } else {
                      $tempArray[$source] = $column;
                      }
                      }
                      }
                      $collectionIndex++; */
                } else if ($data->getType() == "variant") {
                    $column = "get" . ucfirst($values);
                    if ($data->{$column}() == null) {
                        $parentClass = \Pimcore\Model\DataObject::getById($data->getParentId());
                        $tempArray[$source] = $parentClass->{$column}();
                    } else {
                        $tempArray[$source] = $data->{$column}();
                    }
                } else {
                    $column = "get" . ucfirst($values);
                    $tempArray[$source] = $data->{$column}();
                }
            }
        }
        return $tempArray;
    }

    protected function getMappedSourceColumn($key) {
        $mapping = \Pimcore\Model\DataObject\Mapping::getById($this->mappingObjectId);
        $source = null;
        if ($mapping) {
            foreach ($mapping->getColumns() as $mapping) {

                if (isset($mapping[1]) && !empty(trim($mapping[1]))) {
                    $fieldArray = explode('_', $key);
                    if (isset($mapping[1]) && strpos($key, '_clabel') && $mapping[2] == true && $mapping[1] == $fieldArray[0]) {
                        $source = $mapping[0];
                        break;
                    } else if (strpos($mapping[1], $key) !== false && $mapping[2] != true) {
                        $source = $mapping[0];
                        break;
                    }
                }
            }
        }
        return $source;
    }

    public function getCollectionDefinition($mappingObjectId) {
        $collectionDefinitionArr = array();
        $mappingObj = \Pimcore\Model\DataObject\Mapping::getById($mappingObjectId);
        $columns = $mappingObj->getColumns();

        if (count($columns)) {
            foreach ($columns as $colRow) {
                if (strpos($colRow[1], "#") !== false) {
                    $parts = explode(" ", $colRow[1]);
                    $collectionParts = explode("#", $parts[0]);
                    $fieldName = $collectionParts[0];
                    $collectionName = $collectionParts[1];
                    $outCsvClumn = $colRow[0];
                    $collectionIndex = (int) $colRow[2];

                    $dependentFieldName = $dependentFieldValue = "";
                    if ($this->isJSON($colRow[3])) {
                        $arr = json_decode($colRow[3], true);
                        if (!empty(key($arr)) != "" && !empty($arr[key($arr)])) {
                            $dependentFieldName = trim(key($arr));
                            $dependentFieldValue = trim($arr[key($arr)]);
                        }
                    }

                    $collectionDefinitionArr[] = array(
                        "collectionName" => $collectionName,
                        "fieldName" => $fieldName,
                        "csvColumnName" => $outCsvClumn,
                        "collectionIndex" => $collectionIndex,
                        "dependentFieldName" => $dependentFieldName,
                        "dependentFieldValue" => $dependentFieldValue
                    );
                }
            }
        }

        return $collectionDefinitionArr;
    }

    public function isJSON($param) {
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }

//Not in use
    /*
      public function sendMail($emailArr, $subject, $body) {
      try {
      $pimcoreMailObject = new \Pimcore\Mail();
      $pimcoreMailObject->setTo($emailArr);
      $adminUsers = \Pimcore\Model\WebsiteSetting::getByName('notifyUsers');
      if (is_object($adminUsers)) {
      $adminUsers = explode(",", $adminUsers->getData());
      if (count($adminUsers)) {
      $pimcoreMailObject->setCc($adminUsers);
      }
      }
      $pimcoreMailObject->setSubject($subject);
      $pimcoreMailObject->setBody($body);
      $pimcoreMailObject->send();
      } catch (\Throwable $ex) {
      $this->writeError("\n" . $ex->getMessage() . "\n");
      }
      }
     */
}
