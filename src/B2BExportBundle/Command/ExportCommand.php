<?php
/**
 * Created by Sublime Text 3.
 * User: Divyamohan
 * Date: 28/04/20
 * Time: 4:31 PM
 */

namespace B2BExportBundle\Command;

use Doctrine\DBAL\Migrations\Tools\Console\Command\AbstractCommand;
use B2BExportBundle\Services\Export;
use Pimcore\Log;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Log\Simple as Logger;
use Exception;
/**
 * Class ExportCommand
 *
 * Csv export module for B2B Export
 *
 * @package B2BExportBundle\Command
 */
class ExportCommand extends AbstractCommand {
    public function __construct() {
        parent::__construct();
    }

	/**
     * Function to set the command configurations
     *
     */
    protected function configure() {
        $this
        ->setName('b2b:export')
        ->setDescription('This command is responsible for Export Contitech B2B Data.');
    }

    /**
     * Execute Function
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     * @throws \Exception
     * 
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
    	try{
            // Generate B2B Export CSVs
            (new Export)->generate();
            // Returning Void
            return;

        } catch (Exception $ex) {
            // Generating Error logs in Pimcore Log Directory
            // Path /var/log/export_b2b_catalog_groups_logs.log
            Logger::log('b2bexport',"Exception :: " .$ex->getMessage());
        }
    }

}
