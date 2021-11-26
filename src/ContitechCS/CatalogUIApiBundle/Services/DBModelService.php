<?php

/**
 * User: Mahesh Lakher
 * Date: 26/07/2021
 * Time: 11:00 AM
 */

namespace ContitechCS\CatalogUIApiBundle\Services;
use Pimcore\Model\DataObject;
use \Exception;
use Pimcore\Db;



class DBModelService
{   
    protected $db;

    public function __construct()
    {
      $this->db = Db::get();
    }
    /**
     * Get cs products
     * @return array
     */
    public function saveProductgroupCatalogs($productGroupId,$containerId,$fileLink)
    {   
        try
        {   
          $result = $this->db->fetchAll("select id from product_group_catalogs where ContainerId = $containerId");

          if($result){
            $sql = "UPDATE product_group_catalogs SET ProductgGroupId = $productGroupId,ContainerId = $containerId,PdfLink = '$fileLink',UpdatedAt = now()";
          }
          else{
            $sql = "INSERT INTO product_group_catalogs SET ProductgGroupId = $productGroupId,ContainerId = $containerId,PdfLink = '$fileLink',CreatedAt = now()";
          }

          $this->db->query($sql);
          
          return true;
        }
        catch (Exception $e) 
        {  
            throw new Exception($e->getMessage());
        }
    }
}

