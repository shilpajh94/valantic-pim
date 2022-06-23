<?php

/**
 * File Path: Your File path on system
 * Command: cs:one-time-import:product-hierarchy-import <filePath>
 * Des: Product hierarchy data import script.
 */

namespace PTGEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class PTGEUProductAssetImportCommand extends AbstractCommand
{
    private $t;

    protected function configure()
    {
        $this->setName('contitech:ptg:eu:one-time-import:product-asset-import')
            ->setDescription('Product hierarchy data import script')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ')
            ->addArgument('DownloadOrMapping', InputArgument::REQUIRED, 'Enter Action: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $downloadOrMapping = strtoupper($input->getArgument('DownloadOrMapping'));
        if (!in_array($downloadOrMapping, array('D', 'M'))) {
            echo "\n Invalid Argument: Use 'D' For Downloading Assets and 'M' for Mapping Assets with Products. \n ";
            die;
        }
        
        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $serviceObj = \Pimcore::getContainer()->get('import.sap_product_asset_service');
            $serviceObj->import($filePath, $downloadOrMapping);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }
}
