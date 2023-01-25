<?php

/**
 * Command: restApi:virtual-catalog-save-sorted-product
 * Des: save sorted product into a temporary database table `virtual_catalog_sorted_product_table`
 */

namespace RestApiBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Db;
use Symfony\Component\Yaml\Yaml;

class VirtualCatalogSaveSortedProduct extends AbstractCommand
{
    private $virtual_catalog_sorted_product_table = 'virtual_catalog_sorted_product_table';
    private $db;
    private $brandList;
    private $t;
    private $totalProductCount = 0;

    protected function configure()
    {
        $this->setName('restApi:virtual-catalog-save-sorted-product')
            ->setDescription('Get all products, sort these products and save them into virtual_catalog_sorted_product_table table.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->t = time();
            
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            
            $this->db = Db::get();

            $this->createTable();
            $this->truncateTable();

            $brandsData  = $this->getAllBrand();
            echo "No of brands having products - ". count($brandsData).PHP_EOL;
            $this->getBrandProducts($brandsData);


            // $this->saveBrandProducts($allBrandProducts);

            echo "Total {$this->totalProductCount} products processed.".PHP_EOL;
            

            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');

        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
        
    }

    private function saveBrandProducts($allBrandProducts)
    {
        if($allBrandProducts)
        {
            foreach ($allBrandProducts as $brandKey => $brandProducts) {
                
                $brandName = addslashes($this->brandList[$brandKey]['brandNameText']);
                echo "Save brand ".$brandName. " products. It have ".count($brandProducts). " products".PHP_EOL;
                $selectedSortFieldName = $this->brandList[$brandKey]['sorting_GroupingField'];
                $selectedSortFieldValues = $this->brandList[$brandKey]['sorting'];
                $selectedSortFieldValues = str_replace("'","",$selectedSortFieldValues);
                
                $insert  = "INSERT INTO `{$this->virtual_catalog_sorted_product_table}` (`product_id`, `brand_name`, `selectedSortFieldName`, `selectedSortFieldValues`, `sortFieldValue`, `sapCode`, `siopFullcode`) VALUES ";

                foreach ($brandProducts as $indexKey => $product) {
                    
                    $oo_id = $product["oo_id"];
                    $sapCode = $product["articleNumber"];
                    $siopFullcode = $product["siopFullCode"];
                    $sortFieldValue = $product["sortFieldValue"];
                    
                    $insertValues[] = " ($oo_id, '$brandName', '$selectedSortFieldName', '$selectedSortFieldValues', '$sortFieldValue', $sapCode, $siopFullcode) ";
                }

                if($insertValues)
                {
                    $sql = $insert. implode(',', $insertValues);
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute();

                    unset($insertValues);
                }
            }
        }
        
    }

    private function getBrandProducts($brandsArray)
    {
        if($brandsArray)
        {
            foreach($brandsArray as $eachBrand){
                
                $arr = [];
                $brandId = $eachBrand['brand_id'];
                
                $this->brandList[$brandId] = $eachBrand;
                if($eachBrand['sorting'] == NULL){
                    $arr[$brandId] = $this->getProductsForTheRequiredBrand($brandId);
                }else{
                    $fieldForSort = $eachBrand['sorting_GroupingField'];
                    if(strtolower($eachBrand['sorting']) == 'ascending' || strtolower($eachBrand['sorting']) == 'descending'){
                        $sortingData = strtolower($eachBrand['sorting']) == 'ascending' ? 'ASC' : 'DESC';
                        
                    } else if(strtolower($eachBrand['sorting']) == 'yes' || strtolower($eachBrand['sorting']) == 'no'){
                        $sortingData[] = strtolower($eachBrand['sorting']) == 'yes' ? 1 : -1;
                    }
                    else{
                        $sortingData = json_decode($eachBrand['sorting'], TRUE);
                        $sortingData = array_keys($sortingData);
                    }
                    $brickName = $this->getSortingFieldDataFromConfig($fieldForSort);
                    $arr[$brandId] = $this->getProductsInSortedFormat($brandId,$fieldForSort,$sortingData, $brickName);
                }

                if(count($arr[$brandId]) > 0)
                {
                    $this->saveBrandProducts($arr);
                    $this->totalProductCount += count($arr[$brandId]);
                }
                unset($arr[$brandId]);
            }
        }
    }

    private function getProductsInSortedFormat($brandId,$fieldForSort,$sortingData, $brickName){
        $select = "SELECT `oo_id`, `objbrickquery1`.{$fieldForSort} AS `sortFieldValue` ,`articleNumber`, `siopFullCode` from `object_1` INNER JOIN `object_brick_query_".$brickName."_1` AS `objbrickquery1` ON object_1.oo_id = objbrickquery1.o_id
        where `VirtualCatalogFlag` = 1 AND `object_1`.`brandName` = ".$brandId." and `ProductType` = 'fert' "." ORDER BY ";
        if(is_array($sortingData)){
            $condition = '';
            $case = 'Case ';
            $i = 0;
            foreach($sortingData as $eachSortingData){
                $eachSortingData = trim($eachSortingData,"'");
                $eachSortingData = trim($eachSortingData,",");
                if($fieldForSort == 'reinforcement'){
                    $condition = $condition . " WHEN  TRIM(BOTH ',' FROM ".$fieldForSort.") = '". $eachSortingData."' THEN ".$i;
                }else {
                    $condition = $condition. " WHEN TRIM(BOTH ',' FROM `objbrickquery1`.".$fieldForSort.")  = '". $eachSortingData."' THEN ".$i;
                }
                $i++;
            }
            $else = ' ELSE '.$i++. ' END';
            if($fieldForSort == 'reinforcement'){
                $sql = "SELECT `oo_id`, `{$fieldForSort}` AS `sortFieldValue`,`articleNumber`, `siopFullCode` from `object_1` where `VirtualCatalogFlag` = 1 AND `brandName` = ".$brandId." and `ProductType` = 'fert' "." ORDER BY ".$case.$condition.$else;
            }else{
                $sql = $select.$case.$condition.$else;
            }
        }else{
            $sql = $select.' `objbrickquery1`.'.$fieldForSort.' '. $sortingData;
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    private function getSortingFieldDataFromConfig($groupingFieldNameForSorting){
        $groupingFieldsConfig = Yaml::parseFile(PIMCORE_PROJECT_ROOT . '/src/RestApiBundle/Resources/config/config.yml');
        if(array_key_exists($groupingFieldNameForSorting,$groupingFieldsConfig['parameters']['grouping_fields'])){
            return $groupingFieldsConfig['parameters']['grouping_fields'][$groupingFieldNameForSorting]['container_name'];
        }
        return null;
    }

    private function getProductsForTheRequiredBrand($brandId){
        $sql = "SELECT `oo_id`, `articleNumber`, `siopFullCode` from `object_1` where `VirtualCatalogFlag` = 1 AND `ProductType` = 'fert' AND `brandName` = ".$brandId;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    private function truncateTable()
    {
        $sql = "TRUNCATE TABLE `{$this->virtual_catalog_sorted_product_table}`";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

    }

    private function createTable()
    {
        $sql = "DROP TABLE IF EXISTS `virtual_catalog_sorted_product_table`;
        CREATE TABLE `virtual_catalog_sorted_product_table` (
        `id` int NOT NULL AUTO_INCREMENT,
        `product_id` int NOT NULL,
        `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
        `selectedSortFieldName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
        `selectedSortFieldValues` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
        `sortFieldValue` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
        `sort_order` int DEFAULT NULL,
        `sapCode` int NOT NULL,
        `siopFullcode` int NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
    private function getAllBrand()
    {
        $sql = "SELECT distinct p.brandName as brand_id, b.name AS brandNameText,vcmap.GroupingField as mapper_GroupingField, 
            vcmap.originalValues as mapping, vcsort.GroupingField as sorting_GroupingField, 
            
            IF(vcsort.columns = '{}' ,vcsort.Order,vcsort.columns) as sorting
            from object_1 p join object_3 b on p.brandName = b.oo_id  left join object_VirtualCatalogApiSorter vcsort
            on b.VirtualCatalogApiSorter__id = vcsort.oo_id left join object_VirtualCatalogApiMapper vcmap
            on b.VirtualCatalogApiMapper__id = vcmap.oo_id where p.brandName is not null
            and p.brandName <> ''
            ORDER BY p.brandName ";
    // and p.brandName IN (1649, 1646, 1660, 1722) 
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

}