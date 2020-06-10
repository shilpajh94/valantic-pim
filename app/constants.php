<?php

// require_once('s3_config_constants.php');

/**
 * to include the constants used to name the log file
 */
require_once('log_file_name_constants.php');


define("APPBUNDLE_CONFIG_DIRECTORY",PIMCORE_PROJECT_ROOT."/src/AppBundle/Resources/config");
define("CATALOGBUNDLE_CONFIG_DIRECTORY",PIMCORE_PROJECT_ROOT."/src/CatalogBundle/Resources/config");

/**
 * to include the constants of the required attributes module
 * this is being used for calculating completeness,calculating some validations for export etc.
 */
require_once('required_attribute_constants.php');


//contitech configuration file paths
define("LEVEL_ATTRIBUTE_MAPPING_FILE_PATH",APPBUNDLE_CONFIG_DIRECTORY."/import/level_attribute_mapping.yml");
//Command file path
define('COMMAND_CONFIG_FILE_PATH', APPBUNDLE_CONFIG_DIRECTORY."/commands.yml");
// Global Category Configuraction File Path
define('CATEGORY_CONFIG_FILE_PATH', APPBUNDLE_CONFIG_DIRECTORY."/category.yml");
// Global Product Configuration File Path
define('PRODUCT_CONFIG_FILE_PATH', APPBUNDLE_CONFIG_DIRECTORY."/import/product.yml");

// Global Category Configuraction File Path
define('PLANT_MATERIAL_CONFIG_FILE_PATH', APPBUNDLE_CONFIG_DIRECTORY."/import/plant_material.yml");

// Global Category Configuraction File Path
define('SALES_MATERIAL_CONFIG_FILE_PATH', APPBUNDLE_CONFIG_DIRECTORY."/import/sales_material.yml");

/* Errors Message */
define('INVALID_COMMAND', 'Invalid command: %s command not found');
define('FILE_FORMAT_DOESNOT_SUPPORT', 'This command does not support the given file format.');
define('IMPORT_FILE_NOT_FOUND', 'Please check the directory %s, File %s not found');
define('ALLOWED_FILE_TYPES', 'Only %s files are allowed to uplod');

define("BRICK_MAPPING_CONFIG_FILE_PATH",APPBUNDLE_CONFIG_DIRECTORY."/brick_mapping_config.yml");

define("MULTISELECT_MASTER_IMPORT_CONFIG",APPBUNDLE_CONFIG_DIRECTORY."/import/multiselect_master_import_config.yml");

define("PRODUCT_CLASS_NAME", "Product");

define("PRODUCT_CLASS_ID", "1");

define("UNIT_CONVERSION_ATTRIBUTE_GROUP_FILE_PATH",APPBUNDLE_CONFIG_DIRECTORY."/unit_conversion/attribute_groups.yml");

define('MEMBER', 'Users');
define('WORKFLOW_CONFIG_FILE_PATH', APPBUNDLE_CONFIG_DIRECTORY."/workflow/workflow.yml");
define('CATALOG_TABLE_COLUMN_CONFIG_FILE_PATH', APPBUNDLE_CONFIG_DIRECTORY."/catalog/table_column.yml");
define('CATALOG_TABLE_DYNAMIC_COLUMN_CONFIG_FILE_PATH', CATALOGBUNDLE_CONFIG_DIRECTORY."/grid-column-mapping.yml");

