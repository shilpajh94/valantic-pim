<?php 

/** 
* Generated at: 2022-09-23T10:51:05+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: ::1


Fields Summary: 
- GroupingField [select]
- originalValues [table]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'VirtualCatalogApiMapper',
   'name' => 'VirtualCatalogApiMapper',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1663923065,
   'userOwner' => 2,
   'userModification' => 2,
   'parentClass' => '',
   'implementsInterfaces' => '',
   'listingParentClass' => '',
   'useTraits' => '',
   'listingUseTraits' => '',
   'encryption' => false,
   'encryptedTables' => 
  array (
  ),
   'allowInherit' => false,
   'allowVariants' => NULL,
   'showVariants' => false,
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'labelWidth' => 100,
     'layout' => NULL,
     'border' => false,
     'name' => 'pimcore_root',
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => NULL,
     'height' => NULL,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'permissions' => NULL,
     'childs' => 
    array (
      0 => 
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'fieldtype' => 'panel',
         'labelWidth' => 100,
         'layout' => NULL,
         'border' => false,
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => '',
         'width' => NULL,
         'height' => NULL,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'permissions' => NULL,
         'childs' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'fieldtype' => 'select',
             'options' => 
            array (
              0 => 
              array (
                'key' => 'Working Pressure (psi)',
                'value' => 'workingPressurePSI',
              ),
              1 => 
              array (
                'key' => 'Tube Material',
                'value' => 'tubeMaterial',
              ),
              2 => 
              array (
                'key' => 'Tube Gauge',
                'value' => 'tubeGaugeIN',
              ),
              3 => 
              array (
                'key' => 'Static Wire',
                'value' => 'staticWire',
              ),
              4 => 
              array (
                'key' => 'Reinforcement',
                'value' => 'reinforcement',
              ),
              5 => 
              array (
                'key' => 'Number of Plies',
                'value' => 'numberOfPlies',
              ),
              6 => 
              array (
                'key' => 'Cover Material',
                'value' => 'coverMaterial',
              ),
              7 => 
              array (
                'key' => 'Static Wire Type',
                'value' => 'staticWireType',
              ),
              8 => 
              array (
                'key' => 'Cover Characteristic',
                'value' => 'coverCharacteristic',
              ),
            ),
             'width' => '',
             'defaultValue' => '',
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'dynamicOptions' => false,
             'name' => 'GroupingField',
             'title' => 'Grouping Field',
             'tooltip' => '',
             'mandatory' => true,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'defaultValueGenerator' => '',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
             'fieldtype' => 'text',
             'html' => '<div class="alert alert-warning" style="width:400px">Mapping is not applicable for numeric fields.</div>',
             'renderingClass' => '',
             'renderingData' => '',
             'border' => false,
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => '',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
            ),
             'locked' => false,
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Table::__set_state(array(
             'fieldtype' => 'table',
             'width' => 600,
             'height' => '',
             'cols' => '',
             'colsFixed' => false,
             'rows' => '',
             'rowsFixed' => false,
             'data' => '',
             'columnConfigActivated' => false,
             'columnConfig' => 
            array (
            ),
             'queryColumnType' => 'longtext',
             'columnType' => 'longtext',
             'phpdocType' => 'array',
             'name' => 'originalValues',
             'title' => 'Mapping',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => 'float: left;margin-right: 50px;',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
          )),
        ),
         'locked' => false,
         'icon' => '',
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
   'icon' => '',
   'previewUrl' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
   'compositeIndices' => 
  array (
  ),
   'propertyVisibility' => 
  array (
    'grid' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
    'search' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
  ),
   'enableGridLocking' => false,
   'dao' => NULL,
));
