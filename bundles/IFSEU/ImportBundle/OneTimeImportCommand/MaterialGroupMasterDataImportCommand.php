<?php


namespace IFSEU\ImportBundle\OneTimeImportCommand;

use Exception;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use IFSEU\ProductBundle\Services\ImportConstants;

class MaterialGroupMasterDataImportCommand extends AbstractCommand
{
    private $t;

    protected function configure()
    {
        $this->setName('ifs-eu-material-group-master-data-import-command')
            ->setDescription('Material Group master data import script')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');

        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->import($filePath);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }


    private function import($filePath)
    {
        try {

            $results = $this->getCSVData($filePath);

            $data = $results['data'];

            unset($result);

            $parentFolderID = DataObject\Service::createFolderByPath(ImportConstants::IFS_EU_MATERIAL_GROUP_MASTERDATA_FOLDER)->getId();

            if (isset($data) && is_array($data)) {
                foreach ($data  as $result) {
                    if (isset($result) && is_array($result)) {
                        $this->insertMaterialGroupMasterData($result, $parentFolderID);
                    }
                }
            }
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function insertMaterialGroupMasterData($result, $parentFolderID)
    {
        $title = trim($result['code']);

        $validKey = DataObject\Service::getValidKey($title, "object");
        try{
            if ($title) {

                $brandObj = DataObject\IFSEUMaterialGroup::getByPath("/" . ImportConstants::IFS_EU_MATERIAL_GROUP_MASTERDATA_FOLDER . "/" . $validKey);

                if (!$brandObj) {
                    $obj = new DataObject\IFSEUMaterialGroup();
                    $obj->setKey($validKey);
                    $obj->setParentID($parentFolderID);
                    $obj->setCode($result['code']);
                    $obj->setPublished(true);
                    $obj->save();
                } 
            } else {
                echo "Invalid Key";
            }
        }catch(Exception $ex){
            p_r($ex->getMessage());
        }
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
                            $rowData[utf8_decode(trim($key))] = utf8_decode(trim($value));
                        }
                        $firstRowData = $rowData;
                    } else {
                        $tmpData = [];
                        foreach ($firstRowData as $key => $value) {
                            $tmpData[$value] = utf8_encode($rowData[$key]);
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
