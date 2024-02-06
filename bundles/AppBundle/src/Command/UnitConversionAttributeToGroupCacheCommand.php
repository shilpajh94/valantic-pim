<?php

namespace AppBundle\Command;

use AppBundle\Logger\LogLevel;
use AppBundle\Services\UnitConverterService;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

/**
 * responsible for creation and deletion of attribute to group cache for unit conversion
 *
 * Class UnitConversionAttributeToGroupCacheCommand
 * @package AppBundle\Command
 */
class UnitConversionAttributeToGroupCacheCommand extends AbstractCommand
{
    /**
     * @var UnitConverterService
     */
    private $unitConversionService;

    public function __construct( UnitConverterService $unitConverterService)
    {
        parent::__construct();
        $this->unitConversionService = $unitConverterService;
    }

    /**
     * configuring the command
     */
    protected function configure()
    {
        $this
            ->setName('contitech:unit_conversion_attribute_to_group_cache')
            ->setDescription('Create or delete attribute to group cache for unit conversion.')
            ->addOption(
                'create', 'c', InputOption::VALUE_NONE,
                'to create the cache'
            )
            ->addOption(
                'delete', 'd', InputOption::VALUE_NONE,
                'to delete the cache'
            );

    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        if ($input->getOption('create')) {
            try{

                $this->log("Starting cache deletion.");
                $this->unitConversionService->clearAttributeToGroupMapCache();
                $this->log("Cache deleted.");

                $this->log("Starting cache creation.");
                $this->unitConversionService->createAttributeToGroupMapCache();
                $this->log("Cache created.");
            }catch (\Exception $exception){
                $this->log($exception->getMessage(),LogLevel::CRITICAL());
            }

        } elseif ($input->getOption('delete')) {
            $this->log("Starting cache deletion.");
            $this->unitConversionService->clearAttributeToGroupMapCache();
            $this->log("Cache deleted.");
        }
    }

    /**
     * @param string $msg
     * @param LogLevel|null $level
     */
    private function log(string $msg,?LogLevel $level = null)
    {
        if(!$level){
            $level = LogLevel::INFO();
        }

        echo "[ ".strval($level)." ] ".$msg;
        echo "\n";

    }

}