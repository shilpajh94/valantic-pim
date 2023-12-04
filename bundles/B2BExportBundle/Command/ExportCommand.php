<?php
/**
 * Created by Sublime Text 3.
 * User: Divyamohan
 * Date: 28/04/20
 * Time: 4:31 PM
 */

namespace B2BExportBundle\Command;

use AppBundle\Logger\LogLevel;
use Pimcore\Console\AbstractCommand;
use B2BExportBundle\Services\Export;
use Pimcore\Log;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Log\Simple as Logger;
use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Class ExportCommand
 *
 * Csv export module for B2B Export
 *
 * @package B2BExportBundle\Command
 */
class ExportCommand extends AbstractCommand {

    /**
     * Service variable for service class
     * @var $service
     */
	public $service;
    private $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        parent::__construct();
        $this->service = $this->container->get('b2b.export-service');
    }

	/**
     * Function to set the command configurations
     *
     */
    protected function configure() {
        $this
        ->setName('conti:b2b-export')
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
    // protected function execute(InputInterface $input, OutputInterface $output) {
    // 	try{
    //         // Generate B2B Export CSVs
    //         $this->service->generate();
    //         // Returning Void
    //         return;

    //     } catch (Exception $ex) {
    //         // Generating Error logs in Pimcore Log Directory
    //         // Path /var/log/export_b2b_catalog_groups_logs.log
    //         \B2BExportBundle\Lib\Utils::log("Exception :: " .$ex->getMessage(),LogLevel::CRITICAL());
    //     }
    // }

}

