<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Pimcore\Model\DataObject;
use Pimcore\Db;


/**
 * Class DataFixingOfMultiselectDropDownCommand
 * @package AppBundle\Command
 */
class DataFixingOfMultiselectDropDownCommand extends Command
{

    private $db;
    private $t;
    
    /**
     * Function is constructor and set the db connection
     */
    public function __construct()
    {   
        parent::__construct();
        $this->db = \Pimcore\Db::get();
    }

    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this->setName('contitech:remove_duplicate_values_of_dropdown')
            ->setDescription('Remove duplicate values in dropdown lists')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');

        $this->t = time();

        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->getCSVData($filePath);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }    
    }

    /**
     * Function to get CSVDatacommand and to remove
     * duplicate entries in the MultiSelect dropDown 
     */
    public function getCSVData($fileName)
    {  
       $startRow = 0;
        if (($handle = fopen($fileName, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {   
                if ($startRow > 0)
                {
                    $setIdArr  = explode(',',end($data));
                    $deletedIdArr     = array_diff(explode(',',$data[3]),$setIdArr);
                    $deletedIdStr   = implode('|',$deletedIdArr);

                    $columns = ['coverColor','coverMaterial','tubeMaterial'];
                    
                    foreach($columns as $columnName)
                    {
                        $where = 'WHERE CONCAT(",", `'.$columnName.'`, ",") REGEXP ",('.$deletedIdStr.'),"';
                        $sql = "SELECT * FROM object_brick_store_HoseBase_1 $where";
                        $record = $this->db->fetchAllAssociative($sql);                       
                        foreach ($record as $product)
                        {
                            $productId = $product['id'];

                            if($productId)
                            {   
                                $obj    = DataObject::getById($productId);
                                $setter = "set".ucfirst($columnName);
                                $obj->getBase()->getHoseBase()->$setter($setIdArr);
                                $obj->save();
                            }
                        } 
                    }
                    if($data[0] == 'ProductClass~reinforcement')
                    {
                        $where  = 'WHERE CONCAT(",", `reinforcement`, ",") REGEXP ",('.$deletedIdStr.'),"';
                        $sql1    = "SELECT * FROM object_store_1 $where";
                        $record = $this->db->fetchAllAssociative($sql1);
                        if($record)
                        {
                            foreach ($record as $product)
                            {
                                $productId = $product['oo_id'];       
                                if($productId)
                                {   
                                    $obj    = DataObject::getById($productId);
                                    $obj->setReinforcement($setIdArr);
                                    $obj->save();
                                }
                            } 
                        }
                    }
                    // unpublish object
                    if($deletedIdArr)
                    {
                        foreach($deletedIdArr as $deleteId)
                        {
                            $obj    = DataObject::getById($deleteId);
                            $obj->setPublished(false);
                            $obj->save();
                            $obj->delete();
                        }
                    }
                } 
               $startRow++;
            }
            fclose($handle);
        }
    }
} 


    
 