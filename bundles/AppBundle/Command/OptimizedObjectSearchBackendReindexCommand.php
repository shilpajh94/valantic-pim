<?php

/**
 * ObjectSearchBackendReindexCommand
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

namespace AppBundle\Command;

use Pimcore\Console\AbstractCommand;
use Pimcore\Logger;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\Search;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
//use Elements\Bundle\ProcessManagerBundle\ExecutionTrait;
use Elements\Bundle\ProcessManagerBundle\ExecutionTraitClass;


/**
 * ObjectSearchBackendReindexCommand Class
 */
class OptimizedObjectSearchBackendReindexCommand extends AbstractCommand
{
    use ExecutionTraitClass;

    /**
     * @var
     */
    private $monitoringItem;

    /**
     * @var \Pimcore\Db\ConnectionInterface
     */
    private $db;

    /**
     * @var
     */
    private $modificationDays;

    /**
     * @var
     */
    private $executionStartTimestamp;

    /**
     * @var
     */
    private $olderTimestampData;

    private $logger;

    private $olderTimeStamp;

    /**
     * OptimizedObjectSearchBackendReindexCommand constructor.
     * @param string|null $name
     */
    public function __construct(?string $name = null)
    {
        parent::__construct($name);
        $this->db = \Pimcore\Db::get();
    }

    /**
     * configure command - to generate search_backend_data table indexes for objects
     */
    protected function configure()
    {
        $this
            ->setName('contitech:optimized-object-search-backend-reindex')
            ->setDescription('Generate search_backend_data table indexes for objects')
            ->addOption(
                'monitoring-item-id', null, InputOption::VALUE_REQUIRED,
                'Contains the monitoring item if executed via the Pimcore backend'
            )
            ->addOption(
                'modification-days-count', '-d', InputOption::VALUE_OPTIONAL,
                'Specify the number of days to update the index the data updated in last modification-days-count days'
            )
            ->addArgument(
                'classNames', InputArgument::IS_ARRAY,
                'Specify the object class name (separate multiple names with spaces)'
            );
    }

    /**
     * Execute command - from cli
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @throws \Exception
     *
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // initialize process manager
        $this->initProcessManager($input->getOption('monitoring-item-id'));
        $this->monitoringItem = $this->getMonitoringItem();
        $this->logger = $this->monitoringItem->getLogger();


        $this->modificationDays = $input->getOption('modification-days-count');

        $classNames = $input->getArgument('classNames');

        $elementsPerLoop = 100;

        $this->log("Search backend re-index job initiated", "info");

        if (count($classNames) > 0) {
            $this->monitoringItem->setCurrentStep(1)->setTotalSteps(count($classNames))->save();
        } else {
            $this->monitoringItem->setCurrentStep(1)->setTotalSteps(1)->setCurrentWorkload(1)->setTotalWorkload(1)->setMessage(
                "No classes specified to process."
            )->setCompleted();
            exit();
        }

        $this->executionStartTimestamp = time();
        if ($this->modificationDays != null || $this->modificationDays == '0') {
            $olderTime = $this->getOlderTimestampByDays($this->modificationDays, true);
            $msg = "CREATING INDEX FOR OBJECTS WHICH HAVE BEEN UPDATED SINCE "."'".$olderTime."'"." (Y-M-D H:M:S).";
            $this->log("----------------------------------------");
            $this->log($msg);
            $this->log("----------------------------------------");
            $this->monitoringItem->setMessage($msg);
        }


        $classCount = 1;
        // iterate for each class passed in the classNames argument
        foreach ($classNames as $className) {
            $classDefClass = new \Pimcore\Model\DataObject\ClassDefinition();
            $classDef = $classDefClass->getDao()->getIdByName($className);
            $this->monitoringItem->setCurrentStep($classCount)->save();

            if ($classDef) {
                $this->log("----------------------------", "info");
                $msg = "Re-indexing process STARTED for class ".$className;
                $this->log($msg, "info");
                $this->monitoringItem->setMessage($msg);

                $deleteQuery = "DELETE FROM `search_backend_data` WHERE maintype = 'object' AND subtype = '$className'";

                $idStr = null;
                // check if the -d parameter is passed in script parameters
                if ($this->modificationDays != null || $this->modificationDays == '0') {
                    $updatedObjectIds = $this->getUpdatedObjectIdsArray($this->modificationDays, $className);
                    if (count($updatedObjectIds) <= 0) {
                        $msg = "No object found to re-index. No updated object found for last ".$this->modificationDays." days";
                        $this->log($msg);
                        $this->monitoringItem->setMessage($msg)->setCompleted();;
                        exit();
                    }
                    $idStr = '('.implode(',', $updatedObjectIds).')';
                    $deleteQuery .= " AND id IN ".$idStr;
                }

                // remove the existing entries of this class
                $this->db->query($deleteQuery);
                $this->log("Existing indexes removed for class ".$className);

                // get the objects listing
                $listClassName = '\\Pimcore\\Model\\DataObject\\'."$className".'\\Listing';
                $list = new $listClassName();
                if (method_exists($list, 'setUnpublished')) {
                    $list->setUnpublished(true);
                }

                if (method_exists($list, 'setObjectTypes')) {
                    $list->setObjectTypes([
                        AbstractObject::OBJECT_TYPE_OBJECT,
                        AbstractObject::OBJECT_TYPE_FOLDER,
                        AbstractObject::OBJECT_TYPE_VARIANT,

                    ]);
                }

                if ($this->modificationDays) {
                    // fetch only those objects which have been deleted in delete query above
                    $list->setCondition("o_id IN ".$idStr);
                }

                $elementsTotal = $list->getTotalCount();

                $this->monitoringItem->setTotalWorkload(ceil($elementsTotal / $elementsPerLoop))->save();
                for ($i = 0; $i < (ceil($elementsTotal / $elementsPerLoop)); $i++) {
                    $this->monitoringItem->setCurrentWorkload($i)->save();
                    $list->setLimit($elementsPerLoop);
                    $list->setOffset($i * $elementsPerLoop);

                    $elements = $list->load();

                    $dataArray = array();

                    foreach ($elements as $element) {
                        try {
                            $searchEntry = Search\Backend\Data::getForElement($element);
                            if ($searchEntry instanceof Search\Backend\Data and $searchEntry->getId() instanceof Search\Backend\Data\Id) {
                                $searchEntry->setDataFromElement($element);
                            } else {
                                $searchEntry = new Search\Backend\Data($element);
                            }
                            $dataArray[] = $this->getDataArrayFromBackendDataObject($searchEntry);
                        } catch (\Exception $e) {
                            $this->log($e,'error');
                        }
                    }
                    try{
                        $this->insertBackendDataEntry($dataArray);
                    }catch(\Exception $e){
                        $this->log($e,'error');
                    }

                    $this->log("Indexing done for ".(($i * $elementsPerLoop) + count($dataArray))." objects out of ".$elementsTotal." objects.");
                    \Pimcore::collectGarbage();
                }

                $msg = "Re-indexing process COMPLETED for class ".$className;
                $this->log($msg, "info");
                $this->monitoringItem->setMessage($msg);
                $this->log("----------------------------", "info");

            } else {
                $msg = "Class with name "."'".$className."'"." does not exist.";
                $this->log($msg, "warning");
                $this->monitoringItem->setMessage($msg);
            }
            $classCount++;

        }

        $this->db->query('OPTIMIZE TABLE search_backend_data;');
        $msg = "Search backend re-index job completed.";
        $this->log($msg);
        $this->monitoringItem->setMessage($msg)->setCompleted();

    }

    /**
     * just a handy function to log
     * @param $msg
     * @param string $level
     */
    private function log($msg, $level = "info")
    {
        echo "[ $level ] $msg";
        echo "\n";

        if ($level == "warning") {
            $this->logger->warning($msg);
        } elseif ($level == "critical") {
            $this->logger->critical($msg);
        } elseif($level == "error"){
            $this->logger->error($msg);
        }else {
            $this->logger->info($msg);
        }
    }

    /**
     * to insert the complete data in search_backend_data table
     * @param $dataArray
     */
    private function insertBackendDataEntry($dataArray)
    {
        $query = $this->createQueryForInsert($dataArray);

        $this->db->query($query);
    }

    /**
     * to create the query for insertion in search_backend_data table
     * @param $dataArray
     * @return string
     */
    private function createQueryForInsert($dataArray)
    {
        $columnNamesArray = array(
            'id',
            'fullpath',
            'maintype',
            'type',
            'subtype',
            'published',
            'creationDate',
            'modificationDate',
            'userOwner',
            'userModification',
            'data',
            'properties',
        );
        $valuesArray = array();
        foreach ($dataArray as $data) {
            $tempArr = array();
            foreach ($columnNamesArray as $columnName) {
                $tempArr[] = "'".$data[$columnName]."'";
            }
            $valuesArray[] = '('.implode(',', $tempArr).')';
        }
        $values = implode(',', $valuesArray);

        $query = "INSERT INTO `search_backend_data`";
        $query .= '('.implode(',', $columnNamesArray).')';
        $query .= " VALUES ".$values;


        return $query;
    }

    /**
     * convert Search\Backend\Data object to assoc array
     * @param $searchEntry
     * @return array
     */
    private function getDataArrayFromBackendDataObject($searchEntry)
    {
        $data = [
            'id' => $searchEntry->getId()->getId(),
            'fullpath' => $searchEntry->getFullPath(),
            'maintype' => $searchEntry->getId()->getType(),
            'type' => $searchEntry->getType(),
            'subtype' => $searchEntry->getSubtype(),
            'published' => $searchEntry->isPublished(),
            'creationDate' => $searchEntry->getCreationDate(),
            'modificationDate' => $searchEntry->getmodificationDate(),
            'userOwner' => $searchEntry->getUserOwner(),
            'userModification' => $searchEntry->getUserModification(),
            'data' => $searchEntry->getData(),
            'properties' => $searchEntry->getProperties(),
        ];

        return $data;
    }

    /**
     * get the ids of objects which have been updated in last $days days
     * @param $days
     * @param $className
     * @return array
     */
    private function getUpdatedObjectIdsArray($days, $className)
    {
        $ids = array();

        $olderTimeStamp = $this->getOlderTimestampByDays($days);

        $query = "SELECT o_id from objects";
        $query .= " WHERE  o_modificationDate > ".$olderTimeStamp;
        $query .= " AND o_className = "."'".$className."'";

        try {
            $ids = $this->db->fetchOne($query);
        } catch (\Exception $exception) {
            $this->log($exception->getMessage(), "critical");
            $this->monitoringItem->setMessage("An exception occured. Please see log for details");
        }

        return $ids;
    }

    /**
     * get UNIX time stamp for last $days'th day
     * @param $days
     * @param bool $formatted
     * @return mixed
     */
    private function getOlderTimestampByDays($days, $formatted = false)
    {

        if (!$this->olderTimeStamp) {

            if (is_numeric($days)) {
                $query = "SELECT UNIX_TIMESTAMP(CURTIME() - INTERVAL $days DAY) AS timestamp,FROM_UNIXTIME(UNIX_TIMESTAMP(CURTIME() - INTERVAL $days DAY)) AS formattedTimestamp";
                $this->olderTimestampData = $this->db->fetchAssociative($query);

            } else {
                $msg = "Please specify a valid numeric value for modification-days-count (-d).";
                $this->log($msg, "warning");
                $this->monitoringItem->setMessage($msg)->setCompleted();
                exit();
            }
        }

        return $formatted ? $this->olderTimestampData['formattedTimestamp'] : $this->olderTimestampData['timestamp'];
    }

}
