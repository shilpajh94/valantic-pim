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
     * save data into product_group_catalogs table
     * @return array
     */
    public function saveProductgroupCatalogs($productGroupId,$containerId,$fileLink)
    {   
        try
        {   

          $productGroupId = $productGroupId?$productGroupId:'null';
          $result = $this->db->fetchAll("select id from product_group_catalogs where ContainerId = $containerId");

          if($result){
            $sql = "UPDATE product_group_catalogs SET ProductgGroupId = $productGroupId,PdfLink = '$fileLink',UpdatedAt = now() where ContainerId = $containerId";
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

    /**
     * get data from product_group_catalogs table
     * @return array
     */
    public function getProductgroupCatalogs()
    {   
        try
        {   
          $sql = "SELECT * FROM product_group_catalogs";
          $result = $this->db->fetchAll($sql);

          return $result;
        }
        catch (Exception $e) 
        {  
            throw new Exception($e->getMessage());
        }
    }
}

