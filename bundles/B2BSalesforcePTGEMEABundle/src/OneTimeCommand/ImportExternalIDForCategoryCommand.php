<?php
namespace B2BSalesforcePTGEMEABundle\OneTimeCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;
use B2BSalesforcePTGEMEABundle\PimDataImport\PimDataImportHelper;

class ImportExternalIDForCategoryCommand extends AbstractCommand
{
    private $BusinessUnits = ['1' => 'IFS_PTG_US', '2' => 'CS', '3' => 'PTG_EU', '4' => 'IFS_EMEA'];
    private $bu;
    private $db;
    private $helper;
    private $bUProductClassTableID = [
        'IFS_PTG_US' => '2',
        'CS' => 'CSHierarchy',
        'PTG_EU' => '39',
        'IFS_EMEA' => 'IFSEUProductCategory',
    ];

    protected function configure()
    {
        $this->setName('contitech:b2b:onetime:import-external_id-for-category-command')
            ->setDescription('Category external id updation script');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        echo "Script execution started.".PHP_EOL.PHP_EOL;

        $this->db = Db::get();
        $this->helper = new PimDataImportHelper;

        for ($i=1; $i <= 4; $i++) { 
            $this->bu = $this->BusinessUnits[$i];
            echo "Business Unit - {$this->bu}".PHP_EOL.PHP_EOL;
            $this->importExternalIdForCategory();
        }
        echo PHP_EOL;
        echo "Script execution stopped.".PHP_EOL;
    }

    private function importExternalIdForCategory()
    {
        echo "Product categories external id data import started.".PHP_EOL;
        try {

            $classID = $this->bUProductClassTableID[$this->bu];
            $validationTrue = $this->helper->checkFieldValidation($classID);
            
            if($validationTrue)
            {
                $categoryIds = $this->getAllCategoryIds($classID);

                foreach ($categoryIds as $id) {
                    $externalID = $id."_category";
                    $this->updateExternalIdByCategoryId($classID, $externalID, $id);
                }
            }
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }
        echo PHP_EOL;
        echo "Product categories external id data import stopped.".PHP_EOL;
    }

    public function getAllCategoryIds($classID)
    {
        $query = "SELECT `id` FROM object_{$classID}";
        return $this->db->fetchFirstColumn($query);
    }

    public function updateExternalIdByCategoryId($classID, $externalID, $id)
    {
        $query = "UPDATE object_query_{$classID} SET externalID ='{$externalID}' WHERE oo_id ='{$id}'";
        $this->db->query($query);
        $query = "UPDATE object_store_{$classID} SET externalID ='{$externalID}' WHERE oo_id ='{$id}'";
        $this->db->query($query);
    }
}
?>