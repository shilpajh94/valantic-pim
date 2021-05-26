<?php

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;

class ChildProcessSaveAllProducts extends AbstractCommand {

    protected function configure() {
        $this->addArgument('offset', InputArgument::REQUIRED, 'offset for product listing')
                ->addArgument('limit', InputArgument::REQUIRED, 'limit for product listing')
                ->addArgument('logfile', InputArgument::REQUIRED, 'logfile path');
    }

    public function execute(InputInterface $input, OutputInterface $output) {

        // \Pimcore\Model\Version::disable();
        $offset = $input->getArgument('offset');
        $limit = $input->getArgument('limit');
        $logfile = $input->getArgument('logfile');

        $csvLogFilePath = $logfile;
        $csvLogFileHandle = fopen($csvLogFilePath, "a");
        $this->csvLog($csvLogFileHandle, array(
            "Id",
            "Status",
            "Comment"
        ));

        $updateCount = 0;
        $processedCount = 0;

        $productListing = new DataObject\Product\Listing();
        $productListing->setUnpublished(true);
    //    $productListing->setCondition("o_id IN (1904015)");

        $productListing->setOrderKey("o_id");
        $productListing->setOrder("ASC");
        $productListing->setOffset($offset);
        $productListing->setLimit($limit);

        $productListing->load();
        $products = $productListing->getObjects();
        

        foreach ($products as $product) {
            $status = "NA";
            $msg = "";

            try {
                $product->save();
                $updateCount++;
                $status = "SUCCESS";
            } catch (\Exception $exception) {
                $status = "FAILURE";
                $msg = $exception->getMessage();
                $this->consoleLog("Product " . $product->getId() . ", Exception: " . $msg, "ERROR");
            }
            
            $processedCount++;

            $this->csvLog($csvLogFileHandle, array(
                $product->getId(),
                $status,
                $msg
            ));
        }
        $this->consoleLog("Last Updated Product " . $product->getId());

        fclose($csvLogFileHandle);
    }

    private function csvLog($logHandler, array $dataRow) {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }

    private function consoleLog($message, $level = "INFO") {
        echo "[ " . $level . " ] " . $message . PHP_EOL;
    }

}
