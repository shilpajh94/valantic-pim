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
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

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
    name: 'contitech:map_salesorg_with_salesmaterial_for_ptgeu',
    description: 'Command first remove duplicate entry from object_relations_41 class if NeedToRemoveDuplicateEntry parameter is true and map sales org with sales material',
)]
class UpdateRecordsCommand extends AbstractCommand
{
    /**
     * Configures the current command.
     * @return void
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     */
    protected function configure(): void
    {
        $this->addArgument('NeedToRemoveDuplicateEntry',  InputArgument::OPTIONAL, 'User password');
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
            $NeedToRemoveDuplicateEntry = boolval($input->getArgument('NeedToRemoveDuplicateEntry'));

            if ($NeedToRemoveDuplicateEntry) {
                $this->runDuplicateEntryCommand($output);
            }
            $this->writeInfo('Start updating Record for PTGEUSalesMaterial SalesOrganization attribute');
            $this->runQuery();
            return self::SUCCESS;
        } catch (Exception $e) {
            $this->writeError($e->getMessage());
            return self::FAILURE;
        }
    }
    /**
     * Run contitech:remove_duplicate_entry_from_relations_table to Duplicate Entry from object_relations_41 
     *
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     * @return void
     */
    function runDuplicateEntryCommand(OutputInterface $output): void
    {

        $removeDuplicateRelationsCommand = new ArrayInput([
            'command' => 'contitech:remove_duplicate_entry_from_relations_table',
            'tableName' => 41,
        ]);
        $this->getApplication()->doRun($removeDuplicateRelationsCommand, $output);
    }
    /**
     * Map sales org with sales material 
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     * @return void
     */
    private function runQuery(): void
    {
        try {
            $records = $this->makeQuery();
            $salesOrgObject = PTGEUSalesOrg::getById(13334232);
            foreach ($records as $record) {
                $this->writeInfo("Saveing data for object :" . $record['SM_id']);

                $PTGEUSalesMaterialObject = PTGEUSalesMaterialMaster::getById($record['SM_id']);

                if (!empty($PTGEUSalesMaterialObject) && method_exists($PTGEUSalesMaterialObject, 'setSalesOrganization')) {
                    $PTGEUSalesMaterialObject->setSalesOrganization($salesOrgObject);
                    $PTGEUSalesMaterialObject->save();
                } else {
                    $this->writeInfo("Object not found:" . $record['SM_id']);
                }
            }
        } catch (Exception $ex) {
            $this->writeInfo("Object not found:" . $record['SM_id']);
        }
    }

    /**
     *  Make SQL query to get sales org attribute from salesMaterial where salesOrganization__id IS NULL AND salesOrganization__type=object
     * @author Sandeep Bhardwaj <sandeep@happiestminds.com>
     * @return array
     */
    private function makeQuery(): array
    {
        $db = Db::get();
        $sql = "SELECT SM.oo_id AS SM_id,  products.oo_id AS products_id, SM.salesOrganization__id,SM.salesOrganization__type FROM  object_query_41 AS SM INNER JOIN object_38 AS products ON TRIM(BOTH ',' FROM SM.Material) = products.oo_id WHERE SM.salesOrganization__id IS NULL AND SM.salesOrganization__type='object' ";
        $records = $db->fetchAllAssociative($sql);
        return count($records) ? $records : [];
    }
}
