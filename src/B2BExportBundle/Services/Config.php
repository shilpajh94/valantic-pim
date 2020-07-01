<?php

namespace B2BExportBundle\Services;

/**
 * Service Class Configurations
 *
 * Responsible for Maintaining all useful Constants & methods to retrieve file names
 *
 */
class Config {
	// Required Constants for B2B Export
	const PIMCORE_B2B_EXPORT_ROOT = PIMCORE_WEB_ROOT;
	const PIMCORE_B2B_EXPORT_DIRNAME = '/B2BExport/';
	const PIMCORE_B2B_EXPORT_DIRPATH =  self::PIMCORE_B2B_EXPORT_ROOT . self::PIMCORE_B2B_EXPORT_DIRNAME;
	const PIMCORE_B2B_EXPORT_FILENAME_CATALOGGROUP = 'CatalogGroups';
	const PIMCORE_B2B_EXPORT_FILENAME_CATALOGGROUPDESC = 'CatalogGroupDescription';
	const PIMCORE_B2B_EXPORT_FILENAME_CATALOGENTRIES = 'CatalogEntries';
	const PIMCORE_B2B_EXPORT_FILENAME_CATALOGENTRIESDESC = 'CatalogEntriesDescription';
	const PIMCORE_B2B_EXPORT_FILENAME_ATTRVALS = 'AttrVals';
	const PIMCORE_B2B_EXPORT_FILENAME_ATTRVALCATENTRY = 'AttrValCatEntry';
	const PIMCORE_B2B_EXPORT_FILENAME_ATTRIBUTEFACETS = 'AttributeFacets';
	const PIMCORE_B2B_EXPORT_FILENAME_ATTRVALSFACETS = 'AttrValsFacets';
	const PIMCORE_B2B_EXPORT_FILENAME_ATTRVALCATENTRYFACETS = 'AttrValCatEntryFacets';
	const PIMCORE_B2B_EXPORT_FILENAME_XMATERIALPLANT = 'xMaterialPlant';
	
	/**
	* Getting CSV filename for catalog group
	* @return String
	*
	*/
	public static function catalogGroupFileName() {
		return  (
			self::PIMCORE_B2B_EXPORT_DIRPATH .
			date('d-m-Y') . '/' .
			self::PIMCORE_B2B_EXPORT_FILENAME_CATALOGGROUP . 
			'.csv'
		);
	}

	/**
	* Getting CSV filename for catalog group description
	* @return String
	*
	*/
	public static function catalogGroupDescFileName() {
		return  (
			self::PIMCORE_B2B_EXPORT_DIRPATH .
			date('d-m-Y') . '/' .
			self::PIMCORE_B2B_EXPORT_FILENAME_CATALOGGROUPDESC . 
			'.csv'
		);
	}

	/**
	* Getting CSV filename for Catalog Entries
	* @return String
	*
	*/
	public static function catalogEntriesFileName() {
		return  (
			self::PIMCORE_B2B_EXPORT_DIRPATH .
			date('d-m-Y') . '/' .
			self::PIMCORE_B2B_EXPORT_FILENAME_CATALOGENTRIES . 
			'.csv'
		);
	}

	/**
	* Getting CSV filename for Catalog Entries Description
	* @return String
	*
	*/
	public static function catalogEntriesDescFileName() {
		return  (
			self::PIMCORE_B2B_EXPORT_DIRPATH .
			date('d-m-Y') . '/' .
			self::PIMCORE_B2B_EXPORT_FILENAME_CATALOGENTRIESDESC . 
			'.csv'
		);
	}

	/**
	* Getting CSV filename for Attribute Values
	* @return String
	*
	*/
	public static function	attrValsFileName() {
		return  (
			self::PIMCORE_B2B_EXPORT_DIRPATH .
			date('d-m-Y') . '/' .
			self::PIMCORE_B2B_EXPORT_FILENAME_ATTRVALS . 
			'.csv'
		);
	}
	
	/**
	* Getting CSV filename for Attribute Value Catagory Entry
	* @return String
	*
	*/
	public static function	attrValCatEntryFileName() {
		return  (
			self::PIMCORE_B2B_EXPORT_DIRPATH .
			date('d-m-Y') . '/' .
			self::PIMCORE_B2B_EXPORT_FILENAME_ATTRVALCATENTRY . 
			'.csv'
		);
	}
	
	/**
	* Getting CSV filename for Attribute Facets
	* @return String
	*
	*/
	public static function	attributeFacetsFileName() {
		return  (
			self::PIMCORE_B2B_EXPORT_DIRPATH .
			date('d-m-Y') . '/' .
			self::PIMCORE_B2B_EXPORT_FILENAME_ATTRIBUTEFACETS . 
			'.csv'
		);
	}
	
	/**
	* Getting CSV filename for Attribute Values Facets
	* @return String
	*
	*/
	public static function	attrValsFacetsFileName() {
		return  (
			self::PIMCORE_B2B_EXPORT_DIRPATH .
			date('d-m-Y') . '/' .
			self::PIMCORE_B2B_EXPORT_FILENAME_ATTRVALSFACETS . 
			'.csv'
		);
	}
	
	/**
	* Getting CSV filename for Attribute Value Catagory Entry Facets
	* @return String
	*
	*/
	public static function	attrValCatEntryFacetsFileName() {
		return  (
			self::PIMCORE_B2B_EXPORT_DIRPATH .
			date('d-m-Y') . '/' .
			self::PIMCORE_B2B_EXPORT_FILENAME_ATTRVALCATENTRYFACETS . 
			'.csv'
		);
	}
	
	/**
	* Getting CSV filename for X Material Plant
	* @return String
	*
	*/
	public static function	xMaterialPlantFileName() {
		return  (
			self::PIMCORE_B2B_EXPORT_DIRPATH .
			date('d-m-Y') . '/' .
			self::PIMCORE_B2B_EXPORT_FILENAME_XMATERIALPLANT . 
			'.csv'
		);
	}
}