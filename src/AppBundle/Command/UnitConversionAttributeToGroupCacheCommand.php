<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 20/4/20
 * Time: 12:14 PM
 */

namespace AppBundle\Command;

use AppBundle\Logger\LogLevel;
use AppBundle\Services\UnitConverterService;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class UnitConversionAttributeToGroupCacheCommand extends AbstractCommand
{

    private $unitConversionService;

    public function __construct(?string $name = null, UnitConverterService $unitConverterService)
    {
        parent::__construct($name);
        $this->unitConversionService = $unitConverterService;
    }

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

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        var_dump(\Pimcore\Cache::load(UnitConverterService::CACHE_KEY));
//        die();


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



    private function log(string $msg,?LogLevel $level = null)
    {
        if(!$level){
            $level = LogLevel::INFO();
        }

        echo "[ ".strval($level)." ] ".$msg;
        echo "\n";

    }

}