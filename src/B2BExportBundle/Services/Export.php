<?php

namespace B2BExportBundle\Services;

use Exception;
use Pimcore\Db;
use Pimcore\File;
use AppBundle\Tool\Utils;
use Pimcore\Model\DataObject;
use Pimcore\Model\Asset;
use Pimcore\Log\Simple as Logger;
use Pimcore\Tests\Helper\Pimcore;
use B2BExportBundle\Services\Config;
use B2BExportBundle\Services\Model\Catalog;
use B2BExportBundle\Services\Model\Material;
use B2BExportBundle\Services\Model\Attribute;

/**
 * Service Class Export
 *
 * Responsible for Csv export module for B2B Export
 *
 */
class Export {
	
	/**
	 * Execute generate Function
	 *
	 * @return void
	 * @throws Exception
	 *
	 */
	public function generate() {
		try {
			// Generating CSV for Catalog Group
			$fileName = Config::catalogGroupFileName();
			$this->saveCatalogGroupsCSV($fileName);
			// Generating CSV for Catalog Group
			$fileName = Config::catalogGroupDescFileName();
			$this->saveCatalogGroupsDescCSV($fileName);
			// Generating CSV for Catalog Entries
			$fileName = Config::catalogEntriesFileName();
			$this->saveCatalogEntriesCSV($fileName);
			// Generating CSV for Catalog Entries Description
			$fileName = Config::catalogEntriesDescFileName();
			$this->saveCatalogEntriesDescCSV($fileName);
			// Generating CSV for Attribute Values
			$fileName = Config::attrValsFileName();
			$this->saveAttrValsCSV($fileName);
			// Generating CSV for Attribute Value Category Entry
			$fileName = Config::attrValCatEntryFileName();
			$this->saveAttrValCatEntryCSV($fileName);
			// Generating CSV for Attribute Facets
			$fileName = Config::attributeFacetsFileName();
			$this->saveAttributeFacetsCSV($fileName);
			// Generating CSV for Catalog Entries
			$fileName = Config::attrValsFacetsFileName();
			$this->saveAttrValsFacetsCSV($fileName);
			// Generating CSV for Catalog Entries
			$fileName = Config::attrValCatEntryFacetsFileName();
			$this->saveAttrValCatEntryFacetsCSV($fileName);
			// Generating CSV for Catalog Entries
			$fileName = Config::xMaterialPlantFileName();
			$this->saveXMaterialPlantCSV($fileName);
			// Returning Void
			return;
		} catch (Exception $e) {
			Logger::log('b2bexport', $e->getMessage());
		};
	}

	/**
	 * saveCatalogGroupsCSV Function
	 * This method will generate csv file using Core PHP File methods
	 *
	 * @param String $fileName
	 * @return void
	 *
	 */
	protected function saveCatalogGroupsCSV($fileName) {
		$time = time();
		p_r('<<<<<<<===================================>>>>>>>');
		p_r('Catalog Groups Script execution started: ' . date('h:i:s', $time));
		$data = Catalog::getGroups();
		if (count($data) > 0) {
			// Generating Empty csv file with string ($fileName)
			File::put($fileName, '');
			// Opening file resource to write content
			$fileResource = fopen($fileName, 'w');
			// Filling CSV columns
			$columns = array('GroupIdentifier', 'TopGroup', 'ParentGroupIdentifier', 'Name', 'Sequence');
			fputcsv($fileResource, $columns, ',');
			foreach ($data as $item) {
				// Filling CSV Data Rows
				extract($item);
				$sequence = $Level - 1;
				if ($BusinessUnit == 'PTG') {
					if ($sequence > 0 && $sequence < 6) {
						if (!in_array($fullCode, ['04100096000', '049999', '041700', '042000', '049700', '041800', '041900'])) {
							$groupIdentifier = ltrim($fullCode, '04');
							$row[] = $groupIdentifier;
							$topGroup = 'FALSE';
							$parentGroupIdentifier = preg_replace('/' . $code . '$/', '', $groupIdentifier);
							if ($sequence == 1) {
								$topGroup = 'TRUE';
								$parentGroupIdentifier = 0;
							}
							$row[] = $topGroup;
							$row[] = $parentGroupIdentifier;
							$row[] = $description;
							$row[] = $sequence;
							fputcsv($fileResource, $row, ',');
							unset($row);
						}
					}
				} else if($BusinessUnit == 'IFS'){
					if ($sequence > 0 && $sequence < 4) {
						if (!in_array($fullCode, ['04100096000', '049999', '041700', '042000', '049700', '041800', '041900'])) {
							$groupIdentifier = ltrim($fullCode, '04');
							$row[] = $groupIdentifier;
							$topGroup = 'FALSE';
							$parentGroupIdentifier = preg_replace('/' . $code . '$/', '', $groupIdentifier);
							if ($sequence == 1) {
								$topGroup = 'TRUE';
								$parentGroupIdentifier = 0;
							}
							$row[] = $topGroup;
							$row[] = $parentGroupIdentifier;
							$row[] = $description;
							$row[] = $sequence;
							fputcsv($fileResource, $row, ',');
							unset($row);
						}
					}
				}
			}
			fclose($fileResource);
		} else {
			throw new Exception("Export Service Exception ::  Error Processing Catalog Groups CSV, No records Found..");
		}
		p_r('--------------Total Execution Time---------------');
		p_r('Script completed after: ' . (abs(time() - $time) / 60) . ' minutes');
	}

	/**
	 * saveCatalogGroupsCSV Function
	 * This method will generate csv file using Core PHP File methods
	 *
	 * @param String $fileName
	 * @return void
	 *
	 */
	protected function saveCatalogGroupsDescCSV($fileName) {
		$time = time();
		p_r('<<<<<<<===================================>>>>>>>');
		p_r('Catalog Group Description Script execution started: ' . date('h:i:s', $time));
		$data = Catalog::getGroupsDescription();
		if (count($data) > 0) {
			// Generating Empty csv file with string ($fileName)
			File::put($fileName, ' ');
			// Opening file resource to write content
			$fileResource = fopen($fileName, 'w');
			// Filling CSV columns
			$columns = array('GroupIdentifier', 'Name', 'LanguageId');
			fputcsv($fileResource, $columns, ',');
			foreach ($data as $item) {
				// Filling CSV Data Rows
				extract($item);
				$sequence = $Level - 1;
				if($BusinessUnit == 'IFS'){
					if ($sequence > 0 && $sequence < 4) {
						if (!in_array($fullCode, ['04100096000', '049999', '041700', '042000', '049700', '041800', '041900'])) {
							foreach ($language as $key => $languageIterator) {
								if (!empty($languageIterator['description']) && isset($languageMaster[$key])) {
									$row[] = ltrim($fullCode, '04');
									$row[] = $languageIterator['description'];
									$row[] = $languageMaster[$key];
									fputcsv($fileResource, $row, ',');
									unset($row);
								}
							}
						}
					}
				} else if($BusinessUnit == 'PTG'){
					if ($sequence > 0 && $sequence < 6) {
						if (!in_array($fullCode, ['04100096000', '049999', '041700', '042000', '049700', '041800', '041900'])) {
							foreach ($language as $key => $languageIterator) {
								if (!empty($languageIterator['description']) && isset($languageMaster[$key])) {
									$row[] = ltrim($fullCode, '04');
									$row[] = $languageIterator['description'];
									$row[] = $languageMaster[$key];
									fputcsv($fileResource, $row, ',');
									unset($row);
								}
							}
						}
					}
				}
			}
			fclose($fileResource);
		} else {
			throw new Exception("Export Service Exception ::  Error, Processing Catalog Group Description CSV, No records Found..");
		}
		p_r('--------------Total Execution Time---------------');
		p_r('Script completed after: ' . (abs(time() - $time) / 60) . ' minutes');
	}

	/**
	 * saveCatalogEntriesCSV Function
	 * This method will generate csv file using Core PHP File methods
	 *
	 * @param String $fileName
	 * @return void
	 *
	 */
	protected function saveCatalogEntriesCSV($fileName) {
		$time = time();
		p_r('<<<<<<<===================================>>>>>>>');
		p_r('Catalog Entries Script execution started: ' . date('h:i:s', $time));
		$data = Catalog::getEntries();
		if (count($data) > 0) {
			// Generating Empty csv file with string ($fileName)
			File::put($fileName, ' ');
			// Opening file resource to write content
			$fileResource = fopen($fileName, 'w');
			// Filling CSV columns
			$columns = array('PartNumber', 'MFPartNumber', 'IndustryStandard', 'MaterialDescription', 'ParentGroupIdentifier');
			fputcsv($fileResource, $columns, ',');
			foreach ($data as $item) {
				// Filling CSV Data Rows
				extract($item);
				// dd($item);
				if (!in_array($siopFullCode, ['04', '04100096000', '049999', '041700', '042000', '049700', '041800', '041900'])) {
					$row[] = $partNo;
					$row[] = $MFPartNumber;
					$row[] = $industryStandard;
					$row[] = $sapDescription;
					$row[] = ltrim($siopFullCode, '04');
					fputcsv($fileResource, $row, ',');
					unset($row);
				}
			}
			fclose($fileResource);
		} else {
			throw new Exception("Export Service Exception ::  Error, Processing Catalog Entries CSV, No records Found..");
		}
		p_r('--------------Total Execution Time---------------');
		p_r('Script completed after: ' . (abs(time() - $time) / 60) . ' minutes');
	}

	/**
	 * saveCatalogEntriesDescCSV Function
	 * This method will generate csv file using Core PHP File methods
	 *
	 * @param String $fileName
	 * @return void
	 *
	 */
	protected function saveCatalogEntriesDescCSV($fileName) {
		$time = time();
		p_r('<<<<<<<===================================>>>>>>>');
		p_r('Catalog Entries Description Script execution started: ' . date('h:i:s', $time));
		$data = Catalog::getEntriesDescription();
		extract($data);
		if (count($productMaster) > 0) {
			// Generating Empty csv file with string ($fileName)
			File::put($fileName, ' ');
			// Opening file resource to write content
			$fileResource = fopen($fileName, 'w');
			// Filling CSV columns
			$columns = array('PartNumber', 'Name', 'LanguageId', 'LongDescription', 'ImageName');
			fputcsv($fileResource, $columns, ',');
			foreach ($productMaster as $item) {
				// Filling CSV Data Rows
				extract($item);
				if ($siopFullCode != 04) {
						$object = ($item['mainImage'] != NULL ? Asset::getById($item['mainImage'])->getFullPath() : "NULL");
						$row[] = $partNo;
						$row[] = $sapDescription . '%' . $netWeight . $weightUnit;
						$row[] = $languageMaster[$language];
						$row[] = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', html_entity_decode($longDescription));
						if(\Pimcore\Tool::getHostUrl() && $object != 'NULL'){
							$row[] = \Pimcore\Tool::getHostUrl(). $object;
						} else {
							$row[] = $object;
						}
						fputcsv($fileResource, $row, ',');
						unset($row);
				}
			}
			fclose($fileResource);
		} else {
			throw new Exception("Export Service Exception ::  Error, Processing Catalog Entries Description CSV, No records Found..");
		}
		p_r('--------------Total Execution Time---------------');
		p_r('Script completed after: ' . (abs(time() - $time) / 60) . ' minutes');
	}

	/**
	 * saveAttrValsCSV Function
	 * This method will generate csv file using Core PHP File methods
	 *
	 * @param String $fileName
	 * @return void
	 *
	 */
	protected function saveAttrValsCSV($fileName) {
		$time = time();
		p_r('<<<<<<<===================================>>>>>>>');
		p_r('Attribute Value Script execution started: ' . date('h:i:s', $time));
		$data = Attribute::getValues();
		extract($data);
		if (count($materialMaster) > 0 || count($productLineMaster) > 0) {
			// Generating Empty csv file with string ($fileName)
			File::put($fileName, ' ');
			// Opening file resource to write content
			$fileResource = fopen($fileName, 'w');
			// Filling CSV columns
			$columns = array('Identifier', 'ValueId', 'Value', 'LanguageId');
			fputcsv($fileResource, $columns, ',');
			foreach ($materialMaster as $item) {
				// Filling CSV Data Rows
				extract($item);
				$row[] = 'SalesOrg/DC/Plant';
				$row[] = $Identifier;
				$row[] = $Identifier;
				$row[] = -1;
				fputcsv($fileResource, $row, ',');
				unset($row);
			}
			foreach ($productLineMaster as $item) {
				// Filling CSV Data Rows
				extract($item);
				$row[] = 'ProductLine';
				$row[] = $code;
				$row[] = $code;
				$row[] = -1;
				fputcsv($fileResource, $row, ',');
				unset($row);
			}
			fclose($fileResource);
		} else {
			throw new Exception("Export Service Exception ::  Error, Processing Attribute Value CSV, No records Found..");
		}
		p_r('--------------Total Execution Time---------------');
		p_r('Script completed after: ' . (abs(time() - $time) / 60) . ' minutes');
	}

	/**
	 * saveAttrValCatEntryCSV Function
	 * This method will generate csv file using Core PHP File methods
	 *
	 * @param String $fileName
	 * @return void
	 *
	 */
	protected function saveAttrValCatEntryCSV($fileName) {
		$time = time();
		p_r('<<<<<<<===================================>>>>>>>');
		p_r('Attribute Value Category Entry Script execution started: ' . date('h:i:s', $time));
		$data = Attribute::getValuesCategoryEntry();
		extract($data);
		if (count($salesMaterialMaster) > 0 || count($productLineMaster) > 0) {
			// Generating Empty csv file with string ($fileName)
			File::put($fileName, ' ');
			// Opening file resource to write content
			$fileResource = fopen($fileName, 'w');
			// Filling CSV columns
			$columns = array('PartNumber', 'Identifier', 'ValueId', 'Value', 'LanguageId');
			fputcsv($fileResource, $columns, ',');
			foreach ($salesMaterialMaster as $item) {
				// Filling SalesOrg/DC/Plant CSV Data Rows
				extract($item);
				$row[] = $partNo;
				$row[] = 'SalesOrg/DC/Plant';
				$row[] = $value;
				$row[] = $value;
				$row[] = -1;
				fputcsv($fileResource, $row, ',');
				unset($row);
			}
			foreach ($productLineMaster as $item) {
				// Filling Product Line CSV Data Rows
				extract($item);
				$row[] = $partNo;
				$row[] = 'ProductLine';
				$row[] = $value;
				$row[] = $value;
				$row[] = -1;
				fputcsv($fileResource, $row, ',');
				unset($row);
			}
			fclose($fileResource);
		} else {
			throw new Exception("Export Service Exception ::  Error, Processing Attribute Value Category Entry CSV, No records Found..");
		}
		p_r('--------------Total Execution Time---------------');
		p_r('Script completed after: ' . (abs(time() - $time) / 60) . ' minutes');
	}

	/**
	 * saveAttrFacetsCSV Function
	 * This method will generate csv file using Core PHP File methods
	 *
	 * @param String $fileName
	 * @return void
	 *
	 */
	protected function saveAttributeFacetsCSV($fileName) {
		$time = time();
		p_r('<<<<<<<===================================>>>>>>>');
		p_r('Attribute Facets Script execution started: ' . date('h:i:s', $time));
		$data = Attribute::getFacets();
		if (count($data) > 0) {
			// Generating Empty csv file with string ($fileName)
			File::put($fileName, ' ');
			// Opening file resource to write content
			$fileResource = fopen($fileName, 'w');
			// Filling CSV columns
			$columns = array('Identifier', 'Name', 'LanguageId');
			fputcsv($fileResource, $columns, ',');
			foreach ($data as $item) {
				// Filling CSV Data Rows
				if ($item['PIM Attribute Name'] != '') {
					$row[] = $item['B2B Attribute ID'] ?: "#NA";
					$row[] = lcfirst( str_replace('VirtualCatalog', '', $item['PIM Attribute Name'])) ?: "#NA";
					$row[] = -1;
					fputcsv($fileResource, $row, ',');
					unset($row);
				}
			}
			fclose($fileResource);
		} else {
			throw new Exception("Export Service Exception ::  Error, Processing Attribute Facets CSV, No records Found..");
		}
		p_r('--------------Total Execution Time---------------');
		p_r('Script completed after: ' . (abs(time() - $time) / 60) . ' minutes');
	}

	/**
	 * saveAttrValsFacetsCSV Function
	 * This method will generate csv file using Core PHP File methods
	 *
	 * @param String $fileName
	 * @return void
	 *
	 */
	protected function saveAttrValsFacetsCSV($fileName) {
		$time = time();
		p_r('<<<<<<<===================================>>>>>>>');
		p_r('Attribute Value Facets Script execution started: ' . date('h:i:s', $time));
		$data = Attribute::getValuesFacets();
		extract($data);
		if (count($attributes) > 0) {
			// Generating Empty csv file with string ($fileName)
			File::put($fileName, ' ');
			// Opening file resource to write content
			$fileResource = fopen($fileName, 'w');
			// Filling CSV columns
			$columns = array('Identifier', 'ValueId', 'Value', 'LanguageId');
			fputcsv($fileResource, $columns, ',');
			// Loading Product Hierarchy with all related Object Bricks - Base, Skeleton & Fert
			$product = new DataObject\Product();
			// Loading PIM product class field definition
			$pimHierarchyAttributes = $product->getClass()->getFieldDefinitions();
			// Loading PIM product object bricks field definition
			$productBaseObjectBricksArray = $product->getBase()->getAllowedBrickTypes();
			$productSkeletonObjectBricksArray = $product->getSkeleton()->getAllowedBrickTypes();
			$productFertObjectBricksArray = $product->getFert()->getAllowedBrickTypes();
			$productObjectBricks = array_merge($productBaseObjectBricksArray, $productSkeletonObjectBricksArray, $productFertObjectBricksArray);
			// Retrieving product definition with object brick field definitions
			// @var $pimHierarchyAttributes
			foreach ($productObjectBricks as $brickChild) {
				$objectBrickGetter = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\' . $brickChild;
				$objectBrickInstance = new $objectBrickGetter($product);
				$pimHierarchyAttributes = array_merge($pimHierarchyAttributes, $objectBrickInstance->getDefinition()->getFieldDefinitions());
				unset($objectBrickInstance, $objectBrickGetter);
			}
			//  Get Multiselect Attribute Multilingual Mapping 
			$multiSelectMultiLingualMapping = $this->getMultiselectMapping();
			foreach ($attributes as &$attribute) {
				// Filling CSV Data Rows
				if ($attribute['isSelect'] == '1') {
					$attributeName = lcfirst( str_replace('VirtualCatalog', '', $attribute['PIM Attribute Name']));
					if (!empty($attribute['B2B Attribute ID']) &&  $pimHierarchyAttributes[$attributeName]) {
						if($multiSelectMultiLingualMapping[$attributeName]){
							// Querying available options from respective field definition
							$options = $this->getOptions($pimHierarchyAttributes[$attributeName], $languageMaster);
							foreach ($options as $pimAttribute) {
								$row[] = $attribute['B2B Attribute ID'];
								$row[] = $pimAttribute['key'];
								$row[] = $pimAttribute['key'];
								$row[] = $pimAttribute['lang'];
								fputcsv($fileResource, $row, ',');
								unset($row);
							}
							unset($options);
						} else {
							// Querying available options from respective field definition
							$options = $pimHierarchyAttributes[$attributeName]->getOptions();
							foreach ($options as $pimAttribute) {
								$row[] = $attribute['B2B Attribute ID'];
								$row[] = $pimAttribute['key'];
								$row[] = $pimAttribute['key'];
								$row[] = -1;
								fputcsv($fileResource, $row, ',');
								unset($row);
							}
							unset($options);
						}
					}
					unset($attributeMultiselectObject);
				}
			}
			fclose($fileResource);
		} else {
			throw new Exception("Export Service Exception ::  Error, Processing Attribute Value Facets CSV, No records Found..");
		}
		p_r('--------------Total Execution Time---------------');
		p_r('Script completed after: ' . (abs(time() - $time) / 60) . ' minutes');
	}

	/**
	 * saveAttrValCatEntryFacetsCSV Function
	 * This method will generate csv file using Core PHP File methods
	 *
	 * @param String $fileName
	 * @return void
	 *
	 */
	protected function saveAttrValCatEntryFacetsCSV($fileName) {
		$time = time();
		p_r('<<<<<<<===================================>>>>>>>');
		p_r('Attribute Value Category Entry Facets Script execution started: ' . date('h:i:s', $time));
		$data = Attribute::getAttrValCatEntryFacets();
		extract($data);
		if (count($productsMaster) > 0) {
			// Generating Empty csv file with string ($fileName)
			File::put($fileName, ' ');
			// Opening file resource to write content
			$fileResource = fopen($fileName, 'w');
			// Filling CSV columns
			$columns = array('PartNumber', 'AttributeIdentifier', 'ValueId');
			fputcsv($fileResource, $columns, ',');
            foreach ($productsMaster as $productID) {
				// Querying Product Data WITH Product Brick Data
				$productData = Db::get()->fetchAll('SELECT 
					* 
					FROM object_1 o1
					LEFT JOIN object_localized_data_1 old1
					ON old1.ooo_id = o1.oo_id
					AND old1.language = "en"
					LEFT JOIN object_brick_store_PTGBase_1 OBSPTGBase_1
					ON OBSPTGBase_1.o_id = o1.oo_id
					LEFT JOIN object_brick_store_HoseBase_1 OBSHoseBase_1
					ON OBSHoseBase_1.o_id = o1.oo_id
					LEFT JOIN object_brick_store_PTGSkeleton_1 OBSPTGSkeleton_1
					ON OBSPTGSkeleton_1.o_id = o1.oo_id
					LEFT JOIN object_brick_store_HoseSkeleton_1 OBSHoseSkeleton_1
					ON OBSHoseSkeleton_1.o_id = o1.oo_id
					LEFT JOIN object_brick_store_BeltsFert_1 OBSBeltsFert_1
					ON OBSBeltsFert_1.o_id = o1.oo_id
					LEFT JOIN object_brick_store_PTGFert_1 OBSPTGFert_1
					ON OBSPTGFert_1.o_id = o1.oo_id
					LEFT JOIN object_brick_store_MetalFert_1 OBSMetalFert_1
					ON OBSMetalFert_1.o_id = o1.oo_id
					LEFT JOIN object_brick_store_SynchronousFert_1 OBSSynchronousFert_1
					ON OBSSynchronousFert_1.o_id = o1.oo_id
					LEFT JOIN object_brick_store_HydFittingsFert_1 OBSHydFittingsFert_1
					ON OBSHydFittingsFert_1.o_id = o1.oo_id
					LEFT JOIN object_brick_store_INHFittingsFert_1 OBSINHFittingsFert_1
					ON OBSINHFittingsFert_1.o_id = o1.oo_id
					LEFT JOIN object_brick_store_HoseFert_1 OBSHoseFert_1
					ON OBSHoseFert_1.o_id = o1.oo_id
					LEFT JOIN object_brick_store_AccessoriesFert_1 OBSAccessoriesFert_1
					ON OBSAccessoriesFert_1.o_id = o1.oo_id
					WHERE o1.oo_id = ' . $productID['oo_id'] . '
				')[0];
				// Iterating available PIM attribute to append matching attribute for products
				foreach ($attributes as &$attribute) {
					// different If Checks for existing scenario
					if (isset($productData[$attribute['PIM Attribute Name']])
					&& !empty($attribute['B2B Attribute ID'])
					&& !empty($productData[$attribute['PIM Attribute Name']])
					&& strtolower(
						str_replace(['#', '/', ' '], '', $productData[$attribute['PIM Attribute Name']])
					) != 'na'
				) {
						// Filling CSV Data Rows
						$row[] = $productData['articleNumber'];
						$row[] = $attribute['B2B Attribute ID'];
						$row[] = lcfirst(str_replace('VirtualCatalog', '', $attribute['PIM Attribute Name']));
						fputcsv($fileResource, $row, ',');
						unset($row);
					}
				}
            }
			fclose($fileResource);
		} else {
			throw new Exception("Export Service Exception ::  Error, Processing Attribute Value Category Entry Facets CSV, No records Found..");
		}
		p_r('--------------Total Execution Time---------------');
		p_r('Script completed after: ' . (abs(time() - $time) / 60) . ' minutes');
	}

	/**
	 * saveXMaterialPlantCSV Function
	 * This method will generate csv file using Core PHP File methods
	 *
	 * @param String $fileName
	 * @return void
	 *
	 */
	protected function saveXMaterialPlantCSV($fileName) {
		$time = time();
		p_r('<<<<<<<===================================>>>>>>>');
		p_r('X Material Plant Script execution started: ' . date('h:i:s', $time));
		$data = Material::getPlants();
		if (count($data) > 0) {
			// Generating Empty csv file with string ($fileName)
			File::put($fileName, ' ');
			// Opening file resource to write content
			$fileResource = fopen($fileName, 'w');
			// Filling CSV columns
			$columns = array('partnumber', 'salesorgcode', 'dccode', 'salesuom', 'deliveringplant', 'leadtime', 'minordqty', 'maxordqty', 'ordincrementquantity', 'stockindicator', 'pricepageflag');
			fputcsv($fileResource, $columns, ',');
			foreach ($data as $item) {
				// Filling CSV Data Rows
				extract($item);
				$row[] = $partNo;
				$row[] = $salesOrgCode;
				$row[] = $dcCode;
				$row[] = $SalesUOM;
				$row[] = $plantCode;
				$row[] = $leadTime;
				$row[] = (string) sprintf('%.20f', $minOrdQty);
				$row[] = (string) sprintf('%.20f', $maxOrdQty);
				$row[] = (string) sprintf('%.20f', $ordIncrementQty);
				$row[] = $SalesUOM ?: "<NA>";
				$row[] = $pricePageFlag ?: 'NA';
				fputcsv($fileResource, $row, ',');
				unset($row, $key_array);
			}
			fclose($fileResource);
		} else {
			throw new Exception("Export Service Exception ::  Error, Processing X Material Plant CSV, No records Found..");
		}
		p_r('--------------Total Execution Time---------------');
		p_r('Script completed after: ' . (abs(time() - $time) / 60) . ' minutes');
	}

	/**
		* Method to get Multiselects Multilingual Field Mapping.
		*
		* @return array $vcFieldMapping virtual catalog mapping configuration.
		*/
   protected function getMultiselectMapping() {
	   $vcFieldMapping = array();
	   $yamlFilePath = PIMCORE_PROJECT_ROOT . "/src/B2BExportBundle/Resources/config/multiselect_mapping.yml";
	   $vcFieldMapping = Utils::getYmlConfig($yamlFilePath);
	   return $vcFieldMapping['multiselect_list']['attrubutes_with_multilingual_mapping'];
   }

   /**
     *
     * GET Multiselect options for multilingual fields
     *
     * @param array $languageMaster
     * @param \Pimcore\Model\DataObject\ClassDefinition\Data $fieldDefinition
	* @return array $returnValue key value pairs with language codes
     */
   protected function getOptions($fieldDefinition, $languageMaster) {
		$returnValue = array();
		$optionsProviderData = $fieldDefinition->getOptionsProviderData();
		$optionsProviderClass = $fieldDefinition->getOptionsProviderClass();
		// field provider data must have entry for brick group name
		if($optionsProviderData){
			$fieldName = $fieldDefinition->getName();
			$masterType = $this->getMasterType($optionsProviderClass, $optionsProviderData,$fieldName);
			$list = Db::get()->fetchAll('SELECT
				old22.name AS NAME,
				old22.language AS LANG,
				old22.ooo_id AS ID
				FROM object_22 o22
				JOIN  `object_localized_data_22`  old22
				ON o22.oo_id = old22.ooo_id
				WHERE `masterType` = "'.$masterType.'"
				AND old22.name != ""
			');
			foreach($list as $object){
				$key = $object['NAME'];
				$value = $object['ID'];
				$objectLanguage = $languageMaster[$object['LANG']];
				if(!empty($key) && !empty($objectLanguage)){
					$returnValue[] = array('key' => $key, 'value' => $value, 'lang' => $objectLanguage);
				}
			}
		}
        return $returnValue;
   }
   
   /**
     *
     * GET Multiselect options for multilingual fields
     *
     * @param string $optionsProviderClass
     * @param string $optionsProviderData
     * @param string $fieldName
	* @return array $fieldName | $optionsProviderData."~".$fieldName (Brick Name~fieldName)
     */
   protected function getMasterType($optionsProviderClass, $optionsProviderData, $fieldName) {
	   //TODO: place this separator in a config file
	   if($optionsProviderClass == "AppBundle\OptionProvider\OptionProviderForBrickMultiselects"){
			return $optionsProviderData."~".$fieldName;
	   }
	   return $fieldName;
   }
}
