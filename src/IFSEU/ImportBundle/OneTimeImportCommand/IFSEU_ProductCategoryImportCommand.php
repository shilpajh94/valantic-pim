<?php

/**
 * File Path: Your File path on system
 * Command: contitech:ifs:eu:one-time-import:product-category-import <filePath>
 * Des: Product category data import script.
 */

namespace IFSEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IFSEU_ProductCategoryImportCommand extends AbstractCommand
{
    private $t;

    protected function configure()
    {
        $this->setName('contitech:ifs:eu:one-time-import:product-category-import')
            ->setDescription('Product category data import script')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        
        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $serviceObj = \Pimcore::getContainer()->get('ifs_eu_import.category_import_service');
            $serviceObj->import($filePath);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }
}
