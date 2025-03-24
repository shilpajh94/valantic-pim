<?php
namespace CatalogBundle\Model;


use Pimcore\Db;
use Pimcore\Model\DataObject;

class Catalog
{
    private $db;

    /**
     * Getting DB connection object
     */
    public function __construct()
    {
        $this->db = Db::get();
    }
	
	Public function getCustomRecords($objId){
		$query = "Select data from specsheet_custom_selection where object_id=$objId";
			$row = $this->db->fetchAllAssociative($query);
			$records = [];
			if(isset($row[0])){
				$records = explode(",",$row[0]['data']);
			}
			return $records;
	}
	
}