<?php


namespace IFSEU\ImportBundle\OneTimeImportCommand;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Db;


class IFSEUSaveAndPublishCommand extends AbstractCommand

{
	private $db;
	protected function configure()
	{
		$this->setName('contitech:ifs:eu:save')
		->setDescription('IFSEU product save and publish command');
	}
	public function execute(InputInterface $input, OutputInterface $output)
	{
		$this->db = Db::get();
		$getIfseuProductIdsSQL = "SELECT oo_id from object_IFSEUProduct";
		$productIds = $this->db->fetchAllAssociative($getIfseuProductIdsSQL);
		$trucateSql = "TRUNCATE TABLE ifseu_product_left_to_save";
		$this->db->query($trucateSql);
		foreach($productIds as $productId)
		{
			$insertSql = "INSERT INTO ifseu_product_left_to_save VALUES(".$productId['oo_id'].")";
			$this->db->query($insertSql);
		}
		$sql = "SELECT `oo_id` from ifseu_product_left_to_save";
		$record = $this->db->fetchAllAssociative($sql);
		p_r(count($record));
		foreach($record as $oo_id){
			$id = $oo_id['oo_id'];
			$obj = DataObject\IFSEUProduct::getById($id);
			if($obj){
				$obj->setPublished(1);
				if($obj->save()){
					$deleteQuery = "DELETE FROM ifseu_product_left_to_save WHERE oo_id = '$id'";
					try {
							$this->db->query($deleteQuery);
							p_r($id);
					} catch (\Exception $e) {
							print_r($e);
					}
				}
			}
			\Pimcore::collectGarbage();
		}
		return 1;
	}
}