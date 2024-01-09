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
use Symfony\Component\HttpFoundation\Request;
use ContitechCS\CatalogUIApiBundle\Interfaces\ConstantsInterface;


class DBModelService implements ConstantsInterface
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
    public function saveProductgroupCatalogs($productGroupId, $containerId, $fileLink, $language, $region)
    {
        try {
            $fileLink       = $fileLink ? $fileLink : 'null';
            $productGroupId = $productGroupId ? $productGroupId : 'null';
            $language       = $language ? $language : 'null';
            $region         = $region ? $region : 'null';

            $result = $this->db->fetchAll("select id from product_group_catalogs where ContainerId = $containerId");

            if ($result) {
                $sql = "UPDATE product_group_catalogs SET ProductgGroupId = $productGroupId,
          PdfLink = '$fileLink',language = '$language',region = '$region',
          UpdatedAt = now() where ContainerId = $containerId";
            } else {
                $sql = "INSERT INTO product_group_catalogs SET ProductgGroupId = $productGroupId,
          ContainerId = $containerId,PdfLink = '$fileLink',CreatedAt = now(),language = '$language',region = '$region'";
            }

            $this->db->query($sql);

            return true;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * get data from product_group_catalogs table
     * @return array
     */
    public function getProductgroupCatalogs()
    {
        try {
            $req = Request::createFromGlobals();

            $productGroups  = $req->get('productGroups');
            $region         = $req->get('region');
            $language       = $req->get('language');

            $sql = "SELECT * FROM product_group_catalogs WHERE 1";
            $where = [];
            if ($productGroups) {
                $productGroups = explode(',', $productGroups);
                $productGroups = "'" . implode("','", $productGroups) . "'";
                $where[] = "ProductgGroupId IN ($productGroups)";
            }

            if ($region) {
                $where[] = "Region = '$region'";
            }

            if ($language) {
                $where[] = "Language = '$language'";
            }

            $sql .= $where ? " AND " . implode(' AND ', $where) : '';

            return $this->db->fetchAll($sql);

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get product's group from modular catalog
     * @return array
     * @access public
     */
    public function getProductGroupIds()
    {
        try {

            $sql = "SELECT ProductgGroupId FROM product_group_catalogs";

            $result = $this->db->fetchAll($sql);

            if (!$result) {
                throw new Exception(self::RECORDS_NOT_FOUND);
            }

            return array_column($result, 'ProductgGroupId');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
