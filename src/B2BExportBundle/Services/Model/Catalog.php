<?php
namespace B2BExportBundle\Services\Model;

use Exception;
use Pimcore\Db;
use Pimcore\Log\Simple as Logger;
use Pimcore\Model\DataObject;

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
            Logger::log('b2bexport',"Catalog Group Description Model Exception :: " .$ex->getMessage());
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
            // Querying data from product Master data from Database
	    	$productMaster = Db::get()->fetchAll("SELECT
			articleNumber as partNo,
			manufacturerPartNumber as MFPartNo,
			industryStandard,
			siopFullCode,
			objld1.sapDescription
			FROM object_1
			LEFT JOIN object_localized_data_1 objld1
			ON object_1.oo_id = objld1.ooo_id 
			AND objld1.`language` = 'en' 
			AND objld1.sapDescription != ''
			WHERE object_1.oo_id IN (SELECT DISTINCT o1.oo_id
            FROM object_10 o10
            INNER JOIN object_1 o1 ON 
            (replace(substring(substring_index(o10.Material, ',', 1), 
            length(substring_index(o10.Material, ',', 1- 1)) + 1), ',', '') = o1.oo_id)
			WHERE o10.epixFlag = '001'
			)
			");
	    	return $productMaster;
		} catch (Exception $e) {
            Logger::log('b2bexport',"Catalog Entries Model Exception :: " .$ex->getMessage());
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
	    	$productMaster = Db::get()->fetchAll("SELECT
					oo_id,
					articleNumber as partNo,
					manufacturerPartNumber as MFPartNo,
					industryStandard,
					siopFullCode,
					objld1.sapDescription,
					objld1.longDescription,
					netWeight,
					weightUnit,
					objld1.language
			FROM object_1
			LEFT JOIN object_localized_data_1 objld1
			ON object_1.oo_id = objld1.ooo_id 
			WHERE object_1.oo_id IN (SELECT DISTINCT o1.oo_id
            FROM object_10 o10
            INNER JOIN object_1 o1 ON 
            (replace(substring(substring_index(o10.Material, ',', 1), 
            length(substring_index(o10.Material, ',', 1- 1)) + 1), ',', '') = o1.oo_id)
			WHERE o10.epixFlag = '001'
			)
			AND objld1.sapDescription != ''
	    	");
	    	// returning product master and language master data
	    	return ['productMaster' => $productMaster, 'languageMaster' => self::languageMaster()];
		} catch (Exception $e) {
            Logger::log('b2bexport',"Catalog Entries Description Model Exception :: " .$ex->getMessage());
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
}