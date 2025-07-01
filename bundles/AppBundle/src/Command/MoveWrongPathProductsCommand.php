<?php


namespace AppBundle\Command;



use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject\Product;
use Symfony\Component\Console\Input\InputArgument;
use Pimcore\Model\DataObject;

/**
 * Command to get the S3 paths which exist in pimcore_s3_path_mapping table
 * but are not present or deleted marked on S3
 *
 * Class S3WrongPathsCommand
 * @package AppBundle\Command
 */
class MoveWrongPathProductsCommand extends Command
{

    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this->setName('contitech:wrong_paths')
            ->setDescription('Move CS Products')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');


        $results = $this->getCSVData($filePath);

        $data = $results['data'];
        foreach ($data  as $result) {
            $list = new \Pimcore\Model\DataObject\Product\Listing();
            $list->setCondition("articleNumber LIKE :articleNumber", ["articleNumber" => $result['articleNumber']]);
            $list->setCondition("path LIKE :path", ["path" => "/Master List/SIOP Master List/%"]);
            $list->setUnpublished(true);
            if($list){
                foreach($list as $product){
                    
                    $productFullPath = $product->getFullPath();
                    $replacedPath = str_replace('/Master List/SIOP Master List/', '/Products Master/', $productFullPath);
                    $existingProductCheck = DataObject::getByPath($replacedPath);
                    if(!$existingProductCheck){
                        $currentPathWithoutKey = $product->getPath();
                        $replacedPathForParent = str_replace('/Master List/SIOP Master List/', '/Products Master/', $currentPathWithoutKey);
                        $parentFolder = DataObject::getByPath($replacedPathForParent);
                        if($parentFolder && $parentFolder->getType() == 'folder'){
                            $product->setParentId($parentFolder->getId());
                            $product->setPath($replacedPathForParent);
                            $product->save();
                            p_r($product->getId()." ==== new path ==== ".$replacedPathForParent);
                        }
                    }
                }

            }
            
        }
        return 1;
    }

        public function getCSVData($fileName)
    {
        try {

            $csvFilePath = $fileName;
            $firstRowData = array();
            if (empty($csvFilePath)) {
                return $firstRowData;
            }

            $csvFilePath = str_replace("%20", " ", $csvFilePath);

            $dialect = \Pimcore\Tool\Admin::determineCsvDialect($csvFilePath);
            $data = [];
            $count = 0;

            if (($handle = fopen($csvFilePath, 'r')) !== false) {
                while (($rowData = fgetcsv($handle, 0, $dialect->delimiter, $dialect->quotechar, $dialect->escapechar)) !== false) {
                    if ($count == 0) {
                        foreach ($rowData as $key => $value) {
                            unset($rowData[$key]);
                            $rowData[mb_convert_encoding(trim($key), 'ISO-8859-1', 'UTF-8')] = mb_convert_encoding(trim($value), 'ISO-8859-1', 'UTF-8');
                        }
                        $firstRowData = $rowData;
                    } else {
                        $tmpData = [];
                        foreach ($firstRowData as $key => $value) {
                            $tmpData[$value] = mb_convert_encoding($rowData[$key], 'UTF-8');
                            $tmpData[$value] = $rowData[$key];
                        }
                        $data[] = $tmpData;
                    }
                    $count++;
                }
                fclose($handle);
            }
            return array(
                'header'    =>  $firstRowData,
                'data'      =>  $data
            );
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
}
