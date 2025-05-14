<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - CatalogType [select]
 * - ValidFromDate [date]
 * - CatalogName [input]
 * - Currency [select]
 * - CatalogLanguage [language]
 * - IsPriceCatalog [booleanSelect]
 * - DistributionChannel [select]
 * - SalesOrganisation [select]
 */

return \Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => '26',
   'name' => 'Catalog',
   'title' => '',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1745817991,
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
  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
      \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
          \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'name' => 'CatalogType',
             'title' => 'Catalog Type',
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
             'options' => 
            array (
              0 => 
              array (
                'key' => 'Industrial Hose',
                'value' => '041000',
              ),
              1 => 
              array (
                'key' => 'Hydraulic Hose',
                'value' => '041500',
              ),
              2 => 
              array (
                'key' => 'PTG',
                'value' => '043000',
              ),
            ),
             'defaultValue' => '',
             'columnLength' => 190,
             'dynamicOptions' => false,
             'defaultValueGenerator' => '',
             'width' => '',
             'optionsProviderType' => 'configure',
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
          )),
          1 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
             'name' => 'ValidFromDate',
             'title' => 'Valid From Date',
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
             'useCurrentDate' => false,
             'columnType' => 'bigint(20)',
             'defaultValueGenerator' => '',
          )),
          2 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'name' => 'CatalogName',
             'title' => 'Catalog Name',
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
             'regex' => '',
             'regexFlags' => 
            array (
            ),
             'unique' => false,
             'showCharCount' => false,
             'width' => NULL,
             'defaultValueGenerator' => '',
          )),
          3 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'name' => 'Currency',
             'title' => 'Currency',
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
             'options' => 
            array (
              0 => 
              array (
                'key' => 'USD',
                'value' => 'USD',
              ),
            ),
             'defaultValue' => '',
             'columnLength' => 190,
             'dynamicOptions' => false,
             'defaultValueGenerator' => '',
             'width' => '',
             'optionsProviderType' => 'configure',
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
          )),
          4 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Language::__set_state(array(
             'name' => 'CatalogLanguage',
             'title' => 'Language',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => 'width:350px;',
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
             'defaultValue' => NULL,
             'columnLength' => 190,
             'dynamicOptions' => false,
             'defaultValueGenerator' => '',
             'width' => '',
             'optionsProviderType' => NULL,
             'optionsProviderClass' => NULL,
             'optionsProviderData' => NULL,
             'onlySystemLanguages' => true,
          )),
          5 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
             'name' => 'IsPriceCatalog',
             'title' => 'Is Price Catalog',
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
             'yesLabel' => 'Yes',
             'noLabel' => 'No',
             'emptyLabel' => 'Empty',
             'options' => 
            array (
              0 => 
              array (
                'key' => 'Empty',
                'value' => 0,
              ),
              1 => 
              array (
                'key' => 'Yes',
                'value' => 1,
              ),
              2 => 
              array (
                'key' => 'No',
                'value' => -1,
              ),
            ),
             'width' => '',
          )),
          6 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'name' => 'DistributionChannel',
             'title' => 'Distribution Channel',
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
             'defaultValue' => '1',
             'columnLength' => 190,
             'dynamicOptions' => false,
             'defaultValueGenerator' => '',
             'width' => '',
             'optionsProviderType' => 'class',
             'optionsProviderClass' => 'CatalogBundle\\OptionProvider\\DistributionAndSalesOptionsProvider',
             'optionsProviderData' => 'DistributionChannel|name+code|code',
          )),
          7 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'name' => 'SalesOrganisation',
             'title' => 'Sales Organisation',
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
             'defaultValue' => '1',
             'columnLength' => 190,
             'dynamicOptions' => false,
             'defaultValueGenerator' => '',
             'width' => '',
             'optionsProviderType' => 'class',
             'optionsProviderClass' => 'CatalogBundle\\OptionProvider\\DistributionAndSalesOptionsProvider',
             'optionsProviderData' => 'SalesOrganisation|name+code|code',
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
