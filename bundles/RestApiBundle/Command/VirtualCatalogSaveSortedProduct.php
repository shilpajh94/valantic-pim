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
    private $virtualCatalogSortedProductTable = 'virtual_catalog_sorted_product_table';
    private $db;
    private $brandList;
    private $t;

    protected function configure()
    {
        $this->setName('restApi:virtual-catalog-save-sorted-product')
            ->setDescription('Get all products, sort these products and
            save them into virtual_catalog_sorted_product_table table.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->t = time();

            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');

            $this->db = Db::get();

            $this->createTable();

            $brandsData  = $this->getAllBrand();

            echo "Processing ".count($brandsData)." products having virtual catalog flag - true ". PHP_EOL;

            $this->getBrandProducts($brandsData);

            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');

        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
        return 1;
    }

    private function saveBrandProducts($allBrandProducts, $customArrayFlag, $customArray)
    {
        if($allBrandProducts)
        {

            $insertValues = [];
            $insert  = "INSERT INTO `{$this->virtualCatalogSortedProductTable}`
            (`oo_id`, `brand_name`, `selectedSortFieldName`, `selectedSortFieldValues`,
            `sortFieldValue`, `sapCode`, `siopFullcode`, `updatedAt`) VALUES ";
            foreach ($allBrandProducts as $brandProducts) {

                $oo_id = $brandProducts["oo_id"];

                if($customArrayFlag)
                {
                    $brandName = addslashes($customArray['brandNameText']);
                    $selectedSortFieldName = $customArray['sorting_GroupingField'];
                    $selectedSortFieldValues = $customArray['sorting'];
                    $selectedSortFieldValues = str_replace("'","",$selectedSortFieldValues);
                }
                else
                {
                    $brandName = addslashes($brandProducts['brandNameText']);
                    $selectedSortFieldName = $brandProducts['sorting_GroupingField'];
                    $selectedSortFieldValues = $brandProducts['sorting'];
                    $selectedSortFieldValues = str_replace("'","",$selectedSortFieldValues);
                }

                $sapCode = $brandProducts["articleNumber"];
                $siopFullcode = $brandProducts["siopFullCode"];
                $sortFieldValue = isset($brandProducts["sortFieldValue"]) ? $brandProducts["sortFieldValue"] : null;
                $updatedAt = $brandProducts["o_modificationDate"];

                $insertValues[] = " ($oo_id, '$brandName', '$selectedSortFieldName',
                '$selectedSortFieldValues', '$sortFieldValue', $sapCode, '$siopFullcode', $updatedAt) ";

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

    private function getBrandProducts($brandsArray)
    {
        if($brandsArray)
        {
            $brandWiseProductList = [];
            if($brandsArray)
            {
                foreach ($brandsArray as $brandData)
                {
                    $brandWiseProductList[$brandData['brand_id']][] = $brandData;
                }

                foreach ($brandWiseProductList as $brandKey => $brandProducts)
                {
                    if($brandKey)
                    {
                        $this->brandList[$brandKey] = $brandProducts;
                        $sortingColumn = array_column($brandProducts, 'sorting');
                        $sortingFiltered = array_filter($sortingColumn);

                        if(empty($sortingFiltered))
                        {
                            $sortingConfig = $brandProducts[0];
                            $brandNameText = $sortingConfig['brandNameText'];
                            echo "Save: Brand - ".$brandNameText. ", Product Count - ".
                            count($brandProducts). ", Sorting Config - No.".PHP_EOL;
                            $this->saveBrandProducts($brandProducts, false, []);
                        }
                        else
                        {
                            $sortingConfig = $brandProducts[0];
                            $fieldForSort = $sortingConfig['sorting_GroupingField'];
                            $sorting = $sortingConfig['sorting'];
                            $brandNameText = $sortingConfig['brandNameText'];


                            if(strtolower($sorting) == 'ascending' || strtolower($sorting) == 'descending'){
                                $sortingData = strtolower($sorting) == 'ascending' ? 'ASC' : 'DESC';

                            } elseif(strtolower($sorting) == 'yes' || strtolower($sorting) == 'no'){
                                $sortingData[] = strtolower($sorting) == 'yes' ? 1 : -1;
                            }
                            else{
                                $sortingData = json_decode($sorting, true);
                                $sortingData = array_keys($sortingData);
                            }
                            $brickName = $this->getSortingFieldDataFromConfig($fieldForSort);
                            $arr = $this->getProductsInSortedFormat($brandKey,$fieldForSort,$sortingData, $brickName);

                            $customArray = [];
                            $customArray['brandNameText'] = $brandNameText;
                            $customArray['sorting_GroupingField'] = $fieldForSort;
                            $customArray['sorting'] = $sorting;

                            echo "Save: Brand - ".$brandNameText. ", Product Count - ".
                            count($arr). ", Sorting Config - Yes.".PHP_EOL;

                            $this->saveBrandProducts($arr, true, $customArray);
                        }
                    }
                    else
                    {
                        echo "Save: Brand - Brand Not Found, Product Count - ".count($brandProducts). ".".PHP_EOL;
                        $this->saveBrandProducts($brandProducts, false, []);
                    }
                }
            }
        }
    }

    private function getProductsInSortedFormat($brandId,$fieldForSort,$sortingData, $brickName){
        $select = "SELECT `oo_id`, `objbrickquery1`.{$fieldForSort} AS
        `sortFieldValue` ,`articleNumber`, `siopFullCode`, `o_modificationDate`
        from `object_1` INNER JOIN `object_brick_query_".$brickName."_1`
        AS `objbrickquery1` ON object_1.oo_id = objbrickquery1.o_id
        where `VirtualCatalogFlag` = 1 AND `object_1`.`brandName` = ".$brandId."
        and `ProductType` = 'fert' "." ORDER BY ";
        if(is_array($sortingData)){
            $condition = '';
            $case = 'Case ';
            $i = 0;
            foreach($sortingData as $eachSortingData){
                $eachSortingData = trim($eachSortingData,"'");
                $eachSortingData = trim($eachSortingData,",");
                if($fieldForSort == 'reinforcement'){
                    $condition = $condition . " WHEN  TRIM(BOTH ',' FROM ".$fieldForSort.") =
                    '". $eachSortingData."' THEN ".$i;
                }else {
                    $condition = $condition. " WHEN TRIM(BOTH ',' FROM `objbrickquery1`.".$fieldForSort.") =
                    '". $eachSortingData."' THEN ".$i;
                }
                $i++;
            }
            $else = ' ELSE '.$i++. ' END';
            if($fieldForSort == 'reinforcement'){
                $sql = "SELECT `oo_id`, `{$fieldForSort}` AS
                `sortFieldValue`,`articleNumber`, `siopFullCode`, `o_modificationDate`
                from `object_1` where `VirtualCatalogFlag` = 1 AND `brandName` = ".$brandId."
                and `ProductType` = 'fert' "." ORDER BY ".$case.$condition.$else;
            }else{
                $sql = $select.$case.$condition.$else;
            }
        }else{
            $sql = $select.' `objbrickquery1`.'.$fieldForSort.' '. $sortingData;
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAllAssociative();
    }

    private function getSortingFieldDataFromConfig($groupingFieldNameForSorting){
        $groupingFieldsConfig = Yaml::parseFile(PIMCORE_PROJECT_ROOT .
         '/bundles/RestApiBundle/Resources/config/config.yaml');
        if(array_key_exists($groupingFieldNameForSorting,$groupingFieldsConfig['parameters']['grouping_fields'])){
            return $groupingFieldsConfig['parameters']['grouping_fields']
            [$groupingFieldNameForSorting]['container_name'];
        }
        return null;
    }

    private function createTable()
    {
        $sql = "DROP TABLE IF EXISTS `virtual_catalog_sorted_product_table`;
        CREATE TABLE `virtual_catalog_sorted_product_table` (
        `id` int NOT NULL AUTO_INCREMENT,
        `oo_id` int NOT NULL,
        `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
        `selectedSortFieldName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
        `selectedSortFieldValues` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
        `sortFieldValue` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
        `sort_order` int DEFAULT NULL,
        `sapCode` int NOT NULL,
        `siopFullcode` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
        `updatedAt` int NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    private function getAllBrand()
    {
        $sql = "SELECT
            p.oo_id, p.articleNumber, p.siopFullcode, p.o_modificationDate,p.brandName as brand_id,
            b.name AS brandNameText,
            vcmap.GroupingField as mapper_GroupingField,
            vcmap.originalValues as mapping,
            vcsort.GroupingField as sorting_GroupingField,
            IF(vcsort.columns = '{}' ,vcsort.Order,vcsort.columns) as sorting

            from object_1 p
            left join object_3 b on p.brandName = b.oo_id
            left join object_VirtualCatalogApiSorter vcsort on b.VirtualCatalogApiSorter__id = vcsort.oo_id
            left join object_VirtualCatalogApiMapper vcmap on b.VirtualCatalogApiMapper__id = vcmap.oo_id

            WHERE `p`.`VirtualCatalogFlag` = '1' AND `p`.`ProductType` = 'fert'

            ORDER BY b.name IS NULL, b.name ASC";
    //  p.brandName is not null and p.brandName <> '' and p.brandName IN (1649, 1646, 1660, 1722)
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAllAssociative();
    }

}