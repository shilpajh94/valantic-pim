<?php

namespace AppBundle\Command;

use Exception;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;
use Pimcore\Model\DataObject\PTGEUSalesMaterialMaster;
use Pimcore\Model\DataObject\PTGEUSalesOrg;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Pimcore global services
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright Copyright (c) Pimcore global services
 * @license Pimcore global services GPLv3 and PEL
 */

#[AsCommand(
    name: 'contitech:remove_duplicate_entry_from_relations_table',
    description: 'Command  remove duplicate entry from all classes ',
)]
class RemoveDuplicateEntryFromRelationsCommands extends AbstractCommand
{
    private $db = '';

    public function __construct(string|null $name = null)
    {


        $this->db = Db::get();
        parent::__construct();
    }
    /**
     * Configures the current command.
     * @return void
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     */
    protected function configure(): void
    {
        $this->addArgument('tableName',  InputArgument::REQUIRED, 'Id of table or all means all tables');
    }

    /**
     * This method is not abstract because you can use this class as a concrete class. In this case, instead of defining the execute() method, you set the code to execute by passing a Closure to the setCode() method.
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        try {
            $tableName = $input->getArgument('tableName');
            if ($tableName == 'all') {
                $this->writeInfo("Starting process of remove duplicate entry from all classes");
                $tablesIds = $this->getClassTableId();
                foreach ($tablesIds as $tablesId) {
                    if ($this->checkTableExistOrNot($tablesId)) {
                        $this->removeDuplicateEnteryFromRelations($tablesId);
                    }
                }
            } else {
                $this->writeInfo("Starting process of remove duplicate entry from $tableName class");
                if ($this->checkTableExistOrNot($tableName)) {
                    $this->removeDuplicateEnteryFromRelations($tableName);
                }
            }
            return self::SUCCESS;
        } catch (\Exception $e) {
            $this->writeError($e->getMessage());
            return self::FAILURE;
        }
    }

    /**
     *Get all classes table ids 
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     * @return array
     */
    private function getClassTableId(): array
    {
        $sql = "SELECT id FROM classes";
        $tablesId = $this->db->fetchFirstColumn($sql);
        return  count($tablesId) > 0 ? $tablesId : [];
    }
        /**
     *Check table exist or not 
     * @param string|int $tableId 
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     * @return bool
     */
    function checkTableExistOrNot(string|int $tableId):bool
    {

        try {
            $table = $table = "object_relations_$tableId";
            $query = "DESC  $table";
            $this->db->executeQuery($query);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

            /**
     *Remove Duplicate entry from relations table 
     * @param string|int $tableId 
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     * @return void
     */
    private function removeDuplicateEnteryFromRelations(string|int $id):void
    {
        $table = "object_relations_$id";
        $this->writeInfo("Deleting duplicate entry from $table");
        $allRelationIds = array();
        $this->db = Db::get();
        $startTime = strtotime('1 hour');
        $i = 0;
        while (true) {

            if (time() >= $startTime) {
                break;
            } else {
                ($i > 0) ?? $this->writeInfo('continue...');

                $sql = "SELECT *
            FROM  $table 
            GROUP BY src_id, dest_id HAVING count(*)> 1";

                $records = $this->db->fetchAllAssociative($sql);

                if (count($records) > 0) {
                    foreach ($records as $eachRecord) {
                        array_push($allRelationIds, $eachRecord['id']);
                    }
                    $duplicateRelationIds = implode(", ", $allRelationIds);

                    $deleteQuery = "DELETE from  $table where `id` IN ($duplicateRelationIds)";
                    $this->db->executeQuery($deleteQuery);

                    $updateIndexQuery = "UPDATE  $table set `index` = IF(`index` = 1 , 0 , `index`)";
                    $this->db->executeQuery($updateIndexQuery);
                } else {
                    break;
                }
            }
            $i++;
        }
        $this->writeInfo("Done: Removed duplicate entry from  $table ");
    }
}
