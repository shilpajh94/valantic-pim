<?php

/**
 * mention the available types and subtypes of attribute configs
 */
define("REQUIRED_ATTRIBUTE_CONFIG_TYPES",array(
    'COMPLETENESS' => 'completeness',
    'VALIDATION' => array(
        'VIRTUAL_CATALOG' => 'validation_virtual_catalog',
        'EPIX' => 'validation_epix',
        'B2C' => 'validation_b2c'
    ),
));



define('REQUIRED_ATTRIBUTE_CONFIG_DIRECTORY',APPBUNDLE_CONFIG_DIRECTORY.'/required_attributes');
define('VALIDATION_REQUIRED_ATTRIBUTE_CONFIG_DIRECTORY',REQUIRED_ATTRIBUTE_CONFIG_DIRECTORY.'/validation');



/**
 * mention the type to folder mapping
 * the config files for the type should exist in the mentioned folder
 */
define('REQUIRED_ATTRIBUTE_CONFIG_TYPES_TO_DIR_MAPPING',array(
    'completeness' => REQUIRED_ATTRIBUTE_CONFIG_DIRECTORY.'/completeness',
//    'validation_virtual_catalog' => VALIDATION_REQUIRED_ATTRIBUTE_CONFIG_DIRECTORY.'/virtual_catalog',
//    'validation_epix' => VALIDATION_REQUIRED_ATTRIBUTE_CONFIG_DIRECTORY.'/epix',
//    'validation_b2c' => VALIDATION_REQUIRED_ATTRIBUTE_CONFIG_DIRECTORY.'/b2c',
));



/**
 * mention the pimcore product fields for config type
 *
 * this is being used in the RequiredAttributesBundle\EventListeners/ProductListener
 */
define('REQUIRED_ATTRIBUTE_CONFIG_TYPES_TO_PRODUCT_FIELDS_MAPPING',array(
    'completeness' => array('emptyFieldTextarea' => 'EmptyFields','percentageInput' => 'CompletenessPercentage'),
));