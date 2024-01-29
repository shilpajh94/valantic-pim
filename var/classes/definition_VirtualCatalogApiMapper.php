<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - GroupingField [select]
 * - originalValues [table]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => 'VirtualCatalogApiMapper',
   'name' => 'VirtualCatalogApiMapper',
   'title' => '',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1706469193,
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
   'allowVariants' => false,
   'showVariants' => false,
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'name' => 'pimcore_root',
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => 0,
     'height' => 0,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'children' => 
    array (
      0 => 
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => '',
         'width' => 0,
         'height' => 0,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'children' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'name' => 'GroupingField',
             'title' => 'Grouping Field',
             'tooltip' => '',
             'mandatory' => true,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
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
             'defaultValue' => '',
             'columnLength' => 190,
             'dynamicOptions' => false,
             'defaultValueGenerator' => '',
             'width' => '',
             'optionsProviderType' => NULL,
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => '',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'text',
             'html' => '<div class="alert alert-warning" style="width:400px">Mapping is not applicable for numeric fields.</div>',
             'renderingClass' => '',
             'renderingData' => '',
             'border' => false,
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Table::__set_state(array(
             'name' => 'originalValues',
             'title' => 'Mapping',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => 'float: left;margin-right: 50px;',
             'permissions' => NULL,
             'fieldtype' => '',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'cols' => NULL,
             'colsFixed' => false,
             'rows' => NULL,
             'rowsFixed' => false,
             'data' => '',
             'columnConfigActivated' => false,
             'columnConfig' => 
            array (
            ),
             'height' => '',
             'width' => 600,
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'fieldtype' => 'panel',
         'layout' => NULL,
         'border' => false,
         'icon' => '',
         'labelWidth' => 100,
         'labelAlign' => 'left',
      )),
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'icon' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
   'previewGeneratorReference' => NULL,
   'compositeIndices' => 
  array (
  ),
   'showFieldLookup' => false,
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
   'deletedDataComponents' => 
  array (
  ),
   'blockedVarsForExport' => 
  array (
  ),
   'fieldDefinitionsCache' => 
  array (
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
