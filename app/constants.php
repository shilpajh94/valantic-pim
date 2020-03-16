<?php

define("APPBUNDLE_CONFIG_DIRECTORY",PIMCORE_PROJECT_ROOT."/src/AppBundle/Resources/config");

//contitech configuration file paths
define("LEVEL_ATTRIBUTE_MAPPING_FILE_PATH",APPBUNDLE_CONFIG_DIRECTORY."/import/level_attribute_mapping.yml");
//Command file path
define('COMMAND_CONFIG_FILE_PATH', APPBUNDLE_CONFIG_DIRECTORY."/commands.yml");
// Global Category Configuraction File Path
define('CATEGORY_CONFIG_FILE_PATH', APPBUNDLE_CONFIG_DIRECTORY."/category.yml");
// Global Product Configuration File Path
define('PRODUCT_CONFIG_FILE_PATH', APPBUNDLE_CONFIG_DIRECTORY."/import/product.yml");

/* Errors Message */
define('INVALID_COMMAND', 'Invalid command: %s command not found');
define('FILE_FORMAT_DOESNOT_SUPPORT', 'This command does not support the given file format.');
define('IMPORT_FILE_NOT_FOUND', 'No files to proceed. Please check the directory, File path is %s');
define('ALLOWED_FILE_TYPES', 'Only %s files are allowed to uplod');