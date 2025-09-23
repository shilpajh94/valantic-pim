<?php
 
namespace PTGEU\ImportBundle\Command;
 
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Elements\Bundle\ProcessManagerBundle\ExecutionTraitClass;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\DependencyInjection\ContainerInterface;
use PTGEU\ImportBundle\Model\ProductModel;
use PTGEU\ImportBundle\Services\ProductService;
use Pimcore\Db;
 
class PimcoreSaveRecordsCommand extends AbstractCommand
{
    use ExecutionTraitClass;
    private $container;
    private $productModel;
    private $db;
 
    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
        $this->productModel = new ProductModel($this->container);
        $this->db = Db::get();
    }
    /*
    * activity can be either -- save or delete
    */
    protected function configure()
    {
        $this->setName('conti:pimcore_save_records')
            ->setDescription('This command will save records for ptgeu present in pimcore_save table')
            ->addArgument('businessUnit', InputArgument::REQUIRED, 'Enter Business Unit')
            ->addArgument('activity', InputArgument::REQUIRED, 'Enter Activity To Be Performed');
        
       
        $this->addOption(
            'monitoring-item-id',
            null,
            InputOption::VALUE_REQUIRED,
            'Contains the monitoring item if executed via the Pimcore backend'
        );
        
    }
 
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $options = $input->getOptions();
        $monitoringId = $options['monitoring-item-id'];

        $bu = $input->getArgument('businessUnit');
        $activity = $input->getArgument('activity');
 
        if (isset($monitoringId)) {
            $monitoringItem = $this->initProcessManager($monitoringId);
            $monitoringItem->setCurrentWorkload(0)->setTotalWorkload(100)->setMessage('Starting process')->save();
        }     
        if($activity == 'save'){
            $this->fetchRecordsToBeSaved($bu, $monitoringItem);
        }else if($activity == 'delete'){
            $this->productModel->deleteBuRecordsInPimcoreSaveTable('PTGEU');
        }
 
        if ($monitoringId) {
            $monitoringItem->setMessage('Job finished')->setCompleted();
        }
        return 1;
    }

    public function fetchRecordsToBeSaved($bu, $monitoringItem){
        $sql = "SELECT oo_id from pimcore_save where status = 0 and businessUnit = '$bu'" ;
        $result = $this->db->fetchAllAssociative($sql);
        if(count($result)){

            $updatedArticlesIdArray = array_column($result, 'oo_id');             

            $this->saveProducts($updatedArticlesIdArray, $monitoringItem, $bu);
        }
    }

    public function saveProducts($updatedArticlesIdArray, $monitoringItem, $bu)
    {
        if($bu == 'PTGEU'){
            $className = 'PTGEUProduct';
        }
        elseif($bu == 'IFSNA'){
            $className = 'Product';
        }

        $total = count($updatedArticlesIdArray);
        $i = 1;
        foreach ($updatedArticlesIdArray as $objectId) {
            if (!empty($objectId)) {
                $dataObjectClass = "\\Pimcore\\Model\\DataObject\\".$className;
                $object = $dataObjectClass::getById($objectId);
                if (!empty($object) && $object instanceof $dataObjectClass) {
                    $object->save();
                    $this->productModel->changeStatusFromPimcoreSaveTableForRecords($objectId);
                    $monitoringItem->setMessage($i.' / '.$total.' Done')->save();
                    $i++;
                }
            }
        }
    }
    
}