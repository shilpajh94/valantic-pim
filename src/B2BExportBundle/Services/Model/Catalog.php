<?php
namespace B2BExportBundle\Services\Model;

use Exception;
use Pimcore\Db;
use Pimcore\Log\Simple as Logger;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition;

/**
 * Model Class CatalogGroup
 *
 * Catalog Group Service Model
 *
 * @package ExportBundle\Services\Model
 */
class Catalog {
    /**
     * Execute getGroups Function
     *
     * @return array
     * @throws Exception
     *
     */
	public static function getGroups(){
		try {
			// Querying product category from database
			$productCategories = Db::get()->fetchAll('SELECT
				*	from object_localized_2_en
			');
			return $productCategories;
		} catch (Exception $e) {
            Logger::log('b2bexport',"CatalogGroup Model Exception :: " .$ex->getMessage());
		}
	}

	/**
     * Execute getGroupsDescription Function
     *
     * @return array
     * @throws Exception
     *
     */
	public static function getGroupsDescription(){
		try {
            // Querying data from Sales Material Master Database
	    	$siopMasterList = Db::get()->fetchAll('SELECT object_2.o_id as id,
				Level,
				code,
				fullCode,
				ParentCategoryCode ,
				BusinessUnit
				FROM object_2
				WHERE BusinessUnit != ""
			');
			$data = [];
			$count = 0;
			foreach ($siopMasterList as $siop) {
				$siopList = DataObject::getById($siop['id']);
				$localizedArray = array_merge($siop, ['language' => $siopList->getLocalizedfields()->getInternalData(), 'languageMaster' => self::languageMaster()]);
				$data[] = $localizedArray;
				$count++;
			}

	    	return $data;
		} catch (Exception $e) {
            Logger::log('b2bexport',"Catalog Group Description Model Exception :: " .$e->getMessage());
		}
	}

	public function getAllManualCategories()
    {
        $categoryClassId = $this->getPimcoreClassIdbyName("Category");
        $subCategoryClassId = $this->getPimcoreClassIdbyName("SubCategory");
        $fittingCategoryClassId = $this->getPimcoreClassIdbyName("FittingCategory");
        $fittingSubCategoryClassId = $this->getPimcoreClassIdbyName("FittingSubCategory");

        try{
            $categorySql = "
                SELECT oo_id,name FROM object_query_". $categoryClassId ."
                UNION
                SELECT oo_id,name FROM object_query_". $subCategoryClassId ."
                UNION
                SELECT oo_id,name FROM object_query_". $fittingCategoryClassId ."
                UNION
                SELECT oo_id,name FROM object_query_". $fittingSubCategoryClassId ."
		    ";

            $result = Db::get()->fetchAll($categorySql);
            return $result;
        }catch (Exception $e) {
            Logger::log('b2bexport',"Catalog Model Exception :: " .$e->getMessage());
        }
    }

    public function getAllManualCategoriesWithLevel()
    {
        $categoryClassId = $this->getPimcoreClassIdbyName("Category");
        $subCategoryClassId = $this->getPimcoreClassIdbyName("SubCategory");
        $fittingCategoryClassId = $this->getPimcoreClassIdbyName("FittingCategory");
        $fittingSubCategoryClassId = $this->getPimcoreClassIdbyName("FittingSubCategory");

        try{
            $categorySql = "
                SELECT oo_id,name,'TRUE' as top_group,'1' as sequence,'0' as parent_group_identifier FROM object_query_". $categoryClassId ."
                UNION
                SELECT oo_id,name, 'FALSE' as top_group,'2' as sequence,IF(category IS NULL OR category = '','',SUBSTRING(category, 2 ,  LOCATE(',',category, 2)-2 )) as parent_group_identifier  FROM object_query_". $subCategoryClassId ."
                UNION
                SELECT oo_id,name,'TRUE' as top_group,'1' as sequence,'0' as parent_group_identifier FROM object_query_". $fittingCategoryClassId ."
                UNION
                SELECT oo_id,name,'TRUE' as top_group,'1' as sequence,'0' as parent_group_identifier FROM object_query_". $fittingSubCategoryClassId ."
		    ";

            $result = Db::get()->fetchAll($categorySql);
            return $result;
        }catch (Exception $e) {

            Logger::log('b2bexport',"Catalog Model Exception :: " .$e->getMessage());
        }
    }

	/**
     * Execute getEntries Function
     *
     * @return array
     * @throws Exception
     *
     */
	public static function getEntries(){
		try {

//		    $sql1 = "
//                SELECT DISTINCT
//                    SUBSTRING(TRIM(material),
//                        2,
//                        (LENGTH(TRIM(material)) - 2))
//                FROM
//                    object_query_10
//                WHERE
//                    epixFlag = '001'
//                        AND material IS NOT NULL
//                        AND material != ''
//		    ";
//
//		    $productIds = Db::get()->fetchCol($sql1);

//		    $oldSql = "SELECT
//				DISTINCT
//					oCommaSaperated.oo_id,
//					oCommaSaperated.mainImage,
//					oCommaSaperated.articleNumber as partNo,
//					oCommaSaperated.manufacturerPartNumber as MFPartNumber,
//					oCommaSaperated.industryStandard,
//					oCommaSaperated.siopFullCode,
//					objld1.sapDescription,
//					objld1.longDescription,
//					oCommaSaperated.netWeight,
//					oCommaSaperated.weightUnit,
//					objld1.language
//				FROM object_10 o10
//				RIGHT JOIN object_1 oCommaSaperated
//				ON FIND_IN_SET(oCommaSaperated.oo_id, o10.Material)
//				JOIN object_localized_data_1 objld1
//				ON oCommaSaperated.oo_id = objld1.ooo_id
//				AND objld1.sapDescription != ''
//				AND objld1.language = 'en'
//				WHERE o10.epixFlag = '001'
//				AND LOCATE(',', o10.Material)
//				UNION DISTINCT
//				SELECT
//					o1.oo_id,
//					o1.mainImage,
//					o1.articleNumber as partNo,
//					o1.manufacturerPartNumber as MFPartNumber,
//					o1.industryStandard,
//					o1.siopFullCode,
//					objld1.sapDescription,
//					objld1.longDescription,
//					o1.netWeight,
//					o1.weightUnit,
//					objld1.language
//				FROM object_10 o10
//				JOIN object_1 o1
//				ON o1.oo_id = o10.Material
//				JOIN object_localized_data_1 objld1
//				ON o1.oo_id = objld1.ooo_id
//				AND objld1.language = 'en'
//				AND objld1.sapDescription != ''
//				WHERE o10.epixFlag = '001'
//			";

            $newSQL = "SELECT
                            oCommaSaperated.oo_id,
                            oCommaSaperated.mainImage,
                            oCommaSaperated.articleNumber AS partNo,
                            oCommaSaperated.manufacturerPartNumber AS MFPartNumber,
                            oCommaSaperated.industryStandard,
                            oCommaSaperated.siopFullCode,
                            objld1.sapDescription,
                            objld1.longDescription,
                            oCommaSaperated.netWeight,
                            oCommaSaperated.weightUnit
                        FROM
                            object_query_1 oCommaSaperated
                                JOIN
                            object_localized_query_1_en objld1 ON oCommaSaperated.oo_id = objld1.ooo_id
                                AND objld1.sapDescription != ''
                        WHERE
                            oCommaSaperated.oo_id IN (SELECT DISTINCT
                                    SUBSTRING(TRIM(material),
                                            2,
                                            (LENGTH(TRIM(material)) - 2))
                                FROM
                                    object_query_10
                                WHERE
                                    epixFlag = '001'
                                        AND material IS NOT NULL
                                        AND material != '')
                                        ";


            // Querying data from product Master data from Database
            $productMaster = Db::get()->fetchAll($newSQL);

	    	return $productMaster;
		} catch (Exception $e) {
		    p_r($e->getMessage());
            Logger::log('b2bexport',"Catalog Entries Model Exception :: " .$e->getMessage());
		}
	}

	/**
     * Execute getEntriesDescription Function
     *
     * @return array
     * @throws Exception
     *
     */
	public function getEntriesDescription(){
		try {
            // Querying data from product Master data from Database
//            $sql1 = "
//                SELECT DISTINCT
//                    SUBSTRING(TRIM(material),
//                        2,
//                        (LENGTH(TRIM(material)) - 2))
//                FROM
//                    object_query_10
//                WHERE
//                    epixFlag = '001'
//                        AND material IS NOT NULL
//                        AND material != ''
//		    ";
//
//            $productIds = Db::get()->fetchCol($sql1);

//            $oldSql = "SELECT
//				DISTINCT
//					oCommaSaperated.oo_id,
//					oCommaSaperated.mainImage,
//					oCommaSaperated.articleNumber as partNo,
//					oCommaSaperated.manufacturerPartNumber as MFPartNumber,
//					oCommaSaperated.industryStandard,
//					oCommaSaperated.siopFullCode,
//					objld1.sapDescription,
//					objld1.longDescription,
//					oCommaSaperated.netWeight,
//					oCommaSaperated.weightUnit,
//					objld1.language
//				FROM object_10 o10
//				RIGHT JOIN object_1 oCommaSaperated
//				ON FIND_IN_SET(oCommaSaperated.oo_id, o10.Material)
//				JOIN object_localized_data_1 objld1
//				ON oCommaSaperated.oo_id = objld1.ooo_id
//				AND objld1.sapDescription != ''
//				WHERE o10.epixFlag = '001'
//				AND LOCATE(',', o10.Material)
//				UNION DISTINCT
//				SELECT
//					o1.oo_id,
//					o1.mainImage,
//					o1.articleNumber as partNo,
//					o1.manufacturerPartNumber as MFPartNumber,
//					o1.industryStandard,
//					o1.siopFullCode,
//					objld1.sapDescription,
//					objld1.longDescription,
//					o1.netWeight,
//					o1.weightUnit,
//					objld1.language
//				FROM object_10 o10
//				JOIN object_1 o1
//				ON o1.oo_id = o10.Material
//				JOIN object_localized_data_1 objld1
//				ON o1.oo_id = objld1.ooo_id
//				AND objld1.sapDescription != ''
//				WHERE o10.epixFlag = '001'
//			";


            $newSql = "SELECT
                            oCommaSaperated.oo_id,
                            oCommaSaperated.mainImage,
                            oCommaSaperated.articleNumber as partNo,
                            oCommaSaperated.manufacturerPartNumber as MFPartNumber,
                            oCommaSaperated.industryStandard,
                            oCommaSaperated.siopFullCode,
                            objld1.sapDescription,
                            objld1.longDescription,
                            oCommaSaperated.netWeight,
                            oCommaSaperated.weightUnit,
                            objld1.language
                        FROM
                            object_query_1 oCommaSaperated
                                JOIN
                            object_localized_query_1_en objld1 ON oCommaSaperated.oo_id = objld1.ooo_id
                                AND objld1.sapDescription != ''
                        WHERE
                            oCommaSaperated.oo_id IN (SELECT DISTINCT
                                    SUBSTRING(TRIM(material),
                                            2,
                                            (LENGTH(TRIM(material)) - 2))
                                FROM
                                    object_query_10
                                WHERE
                                    epixFlag = '001'
                                        AND material IS NOT NULL
                                        AND material != '')
			";

            $productMaster = Db::get()->fetchAll($newSql);

	    	// returning product master and language master data
	    	return ['productMaster' => $productMaster, 'languageMaster' => self::languageMaster()];
		} catch (Exception $e) {
            Logger::log('b2bexport',"Catalog Entries Description Model Exception :: " .$e->getMessage());
		}
	}

	/**
	 * Querying languages with languageId from Database
	 * @return array $languageMaster
	 */
	protected function languageMaster() {
		$languageMasterKeys = array_map(function($e){
				return $e['SystemCode'];
			}, Db::get()->fetchAll('
				SELECT SystemCode
				FROM object_27
			')
		);
		$languageMasterValues = array_map(function($e){
				return $e['Code'];
			}, Db::get()->fetchAll('
				SELECT Code
				FROM object_27
			')
		);
		// Language master from object_27 , ex : ['en' => -1, 'fr_CA' => -2]
		$languageMaster = array_combine($languageMasterKeys,$languageMasterValues);
		return 	$languageMaster;
	}

    /**
     * @param string $pimcoreClassName
     * @return string|null
     */
    public function getPimcoreClassIdbyName(string $pimcoreClassName): ?string
    {
        $classDef = ClassDefinition::getByName($pimcoreClassName);
        if($classDef){
            return $classDef->getId();
        }
        return null;
    }
}
