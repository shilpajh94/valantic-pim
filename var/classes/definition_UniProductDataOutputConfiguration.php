<?php

/**
 * Inheritance: no
 * Variants: no
 * Product Data Output Configuration
 *
 * Fields Summary:
 * - exportType [select]
 * - outputFormat [select]
 * - frequency [select]
 * - weekday [select]
 * - dayOfMonth [numeric]
 * - timeOfDay [time]
 * - exportDirectory [manyToOneRelation]
 * - lastRun [datetime]
 * - finishedGoods [manyToManyObjectRelation]
 * - dataFields [multiselect]
 * - productGroupSpecificDatafields [multiselect]
 * - columnNameType [select]
 * - languages [languagemultiselect]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => 'UniPrOutConfig',
   'name' => 'UniProductDataOutputConfiguration',
   'title' => '',
   'description' => 'Product Data Output Configuration',
   'creationDate' => NULL,
   'modificationDate' => 1758002924,
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => '',
         'width' => '',
         'height' => '',
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'children' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => 'General Settings',
             'width' => '',
             'height' => '',
             'collapsible' => true,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'exportType',
                 'title' => 'Export Type',
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
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'optionsProviderType' => 'class',
                 'optionsProviderClass' => '\\App\\Model\\OptionsProvider\\UniProductManagement\\OutputConfigurationExportType',
                 'optionsProviderData' => '',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'outputFormat',
                 'title' => 'Output Format',
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
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'optionsProviderType' => 'class',
                 'optionsProviderClass' => '\\App\\Model\\OptionsProvider\\UniProductManagement\\OutputConfigurationOutputFormat',
                 'optionsProviderData' => '',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'frequency',
                 'title' => 'Frequency',
                 'tooltip' => '',
                 'mandatory' => false,
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
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'optionsProviderType' => 'class',
                 'optionsProviderClass' => '\\App\\Model\\OptionsProvider\\UniProductManagement\\OutputConfigurationFrequencyType',
                 'optionsProviderData' => '',
              )),
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'weekday',
                 'title' => 'Weekday',
                 'tooltip' => '',
                 'mandatory' => false,
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
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'optionsProviderType' => 'class',
                 'optionsProviderClass' => '\\App\\Model\\OptionsProvider\\UniProductManagement\\OutputConfigurationWeekday',
                 'optionsProviderData' => '',
              )),
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'name' => 'dayOfMonth',
                 'title' => 'Day of Month',
                 'tooltip' => '',
                 'mandatory' => false,
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
                 'defaultValue' => NULL,
                 'integer' => true,
                 'unsigned' => true,
                 'minValue' => 1.0,
                 'maxValue' => 31.0,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'width' => 250,
                 'defaultValueGenerator' => '',
              )),
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Time::__set_state(array(
                 'name' => 'timeOfDay',
                 'title' => 'Time Of Day',
                 'tooltip' => '',
                 'mandatory' => false,
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
                 'defaultValue' => NULL,
                 'columnLength' => 5,
                 'regex' => '',
                 'regexFlags' => 
                array (
                ),
                 'unique' => false,
                 'showCharCount' => false,
                 'width' => 250,
                 'defaultValueGenerator' => '',
                 'minValue' => '00:00',
                 'maxValue' => '23:45',
                 'increment' => 15,
              )),
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'name' => 'exportDirectory',
                 'title' => 'Scheduled Export Directory',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                ),
                 'displayMode' => 'grid',
                 'pathFormatterClass' => '',
                 'assetInlineDownloadAllowed' => false,
                 'assetUploadPath' => '',
                 'allowToClearRelation' => true,
                 'objectsAllowed' => false,
                 'assetsAllowed' => true,
                 'assetTypes' => 
                array (
                  0 => 
                  array (
                    'assetTypes' => 'folder',
                  ),
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'width' => 250,
              )),
              7 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Datetime::__set_state(array(
                 'name' => 'lastRun',
                 'title' => 'Last Run',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
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
                 'defaultValue' => NULL,
                 'useCurrentDate' => false,
                 'columnType' => 'bigint(20)',
                 'defaultValueGenerator' => '',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => '',
             'border' => true,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/settings.svg',
             'labelWidth' => 250,
             'labelAlign' => 'left',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Customize Export',
             'width' => '',
             'height' => '',
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                 'name' => 'finishedGoods',
                 'title' => 'Finished Goods / Internal Categories',
                 'tooltip' => '',
                 'mandatory' => true,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'UniProductBase',
                  ),
                  1 => 
                  array (
                    'classes' => 'UniProductCategoryInternal',
                  ),
                ),
                 'displayMode' => 'grid',
                 'pathFormatterClass' => '',
                 'maxItems' => NULL,
                 'visibleFields' => 'productBrandName,masterBrand,productFamily',
                 'allowToCreateNewObject' => false,
                 'allowToClearRelation' => true,
                 'optimizedAdminLoading' => false,
                 'enableTextSelection' => false,
                 'visibleFieldDefinitions' => 
                array (
                ),
                 'width' => '',
                 'height' => '',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                 'name' => 'dataFields',
                 'title' => 'Data Fields for Base product and internal Categories',
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
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'maxItems' => NULL,
                 'renderType' => 'tags',
                 'dynamicOptions' => true,
                 'defaultValue' => NULL,
                 'height' => '',
                 'width' => 300,
                 'defaultValueGenerator' => '',
                 'optionsProviderType' => 'class',
                 'optionsProviderClass' => '\\App\\Service\\UniProductManagement\\OutputConfiguratorDataFieldsProvider',
                 'optionsProviderData' => '',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                 'name' => 'productGroupSpecificDatafields',
                 'title' => 'Product Group Specific Datafields',
                 'tooltip' => '',
                 'mandatory' => false,
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
                 'maxItems' => NULL,
                 'renderType' => 'tags',
                 'dynamicOptions' => true,
                 'defaultValue' => NULL,
                 'height' => '',
                 'width' => 300,
                 'defaultValueGenerator' => '',
                 'optionsProviderType' => 'class',
                 'optionsProviderClass' => '\\App\\Service\\UniProductManagement\\OutputConfiguratorObjectbrickFieldsProvider',
                 'optionsProviderData' => '',
              )),
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'columnNameType',
                 'title' => 'Column Name Type',
                 'tooltip' => 'Pick "Label" for user-friendly attribute names and "Technical" for data import compatible headings',
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
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => 300,
                 'optionsProviderType' => 'class',
                 'optionsProviderClass' => '\\App\\Model\\OptionsProvider\\UniProductManagement\\OutputConfigurationColumnType',
                 'optionsProviderData' => '',
              )),
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Languagemultiselect::__set_state(array(
                 'name' => 'languages',
                 'title' => 'Languages',
                 'tooltip' => '',
                 'mandatory' => false,
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
                 'options' => NULL,
                 'maxItems' => NULL,
                 'renderType' => 'tags',
                 'dynamicOptions' => false,
                 'defaultValue' => NULL,
                 'height' => '',
                 'width' => '',
                 'defaultValueGenerator' => '',
                 'optionsProviderType' => NULL,
                 'optionsProviderClass' => NULL,
                 'optionsProviderData' => NULL,
                 'onlySystemLanguages' => true,
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => true,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/export.svg',
             'labelWidth' => 350,
             'labelAlign' => 'left',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'fieldtype' => 'tabpanel',
         'border' => false,
         'tabPosition' => 'top',
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
   'group' => 'UniProductManagement',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
   'previewGeneratorReference' => '',
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
      'key' => true,
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
