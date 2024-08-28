<?php

namespace AppBundle\Command;

use DateTime;
use Exception;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;
use Pimcore\Model\DataObject\Product;

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

class RemoveIFSNAMasterTableEntryOfNonExistentProductsCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('contitech:remove_ifs_na_master_table_entry_of_non_existent_products')
            ->setDescription('Remove IFS NA Master Table Entry Of Non-Existent Products Command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d');
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" .
            "remove_ifs_na_master_table_entry_of_non_existent_products_$currentDate.csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w");
        $this->csvLog($csvLogFileHandle, ["articleNumber"]);
        $db = Db::get();
        try {
            $selectQuery = "SELECT id FROM material_import_master";
            $masterTableRecordsArr = $db->fetchFirstColumn($selectQuery);
            $deleteFlag = 0;
            foreach ($masterTableRecordsArr as $masterTableRecord) {
                $productObj = Product::getByArticleNumber($masterTableRecord, true);
                if (empty($productObj)) {
                    $deleteFlag = 1;
                    $this->csvLog($csvLogFileHandle, [$masterTableRecord]);
                    $deleteQuery = "DELETE FROM material_import_master WHERE id = $masterTableRecord";
                    $db->executeQuery($deleteQuery);
                }
            }
            if ($deleteFlag == 0) {
                $msg = "No record found to delete";
                $this->csvLog($csvLogFileHandle, [$msg]);
            }
        } catch (Exception $e) {
            $this->csvLog($csvLogFileHandle, [$e->getMessage()]);
        }
        return 1;
    }

    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }
}
