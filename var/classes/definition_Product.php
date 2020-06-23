<?php 

/** 
* Generated at: 2020-06-22T08:23:12+02:00
* Inheritance: yes
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- articleNumber [input]
- eanUpc [input]
- materialGroup [manyToOneRelation]
- baseUOM [input]
- grossWeight [numeric]
- netWeight [numeric]
- weightUnit [select]
- localizedfields [localizedfields]
-- sapDescription [textarea]
-- FeaturesBenefitsBulletPoint [multiselect]
-- legalText [input]
-- Application [input]
-- BrandShortText1 [input]
-- BrandShortText2 [input]
-- BrandShortText3 [input]
-- BrandShortText4 [input]
-- BrandShortText5 [input]
-- shortDescription [wysiwyg]
-- longDescription [wysiwyg]
-- CompletenessPercentage [input]
-- EmptyFields [textarea]
- oldMaterialCode [input]
- manufacturer [input]
- manufacturerPartNumber [input]
- stccCode [input]
- industryStandard [input]
- continentalBrand [input]
- brandConstruction [input]
- substitutePartNumber [input]
- listPrice [input]
- currency [input]
- UnitsInPackage [input]
- deletedFlagAtClientLevel [booleanSelect]
- brandName [select]
- shelfLife [input]
- nitrosamines [input]
- rohs [input]
- reach [input]
- prop65Message [textarea]
- fittingFamily [multiselect]
- numeratorForConversionToBaseUnitsOfMeasure [textarea]
- alternativeUnitOfMeasureForStockkeepingUnit [input]
- denominatorForConversionToBaseUnitsOfMeasure [input]
- californiaProposition65ChemicalName1 [input]
- californiaProposition65ChemicalName2 [input]
- californiaProposition65ChemicalName3 [input]
- searchKeywords [input]
- webDiscription [input]
- proposition65WarningAttributesRequired [booleanSelect]
- BrandingLayline [textarea]
- VirtualCatalogBrandingLayline [input]
- packageLengthIN [numeric]
- packageWidthIN [numeric]
- packageWeightLBS [numeric]
- packageHeightIN [numeric]
- caseLengthIN [numeric]
- caseHeightIN [numeric]
- caseWidthIN [numeric]
- caseWeightLBS [numeric]
- palletLengthIN [numeric]
- palletHeightIN [numeric]
- palletWidthIN [numeric]
- palletWeightLBS [numeric]
- numberOfItems [numeric]
- casePackQuantity [numeric]
- orderIncrement [numeric]
- minimumOrderQuantity [numeric]
- numberOfCoils [numeric]
- tieBundles [numeric]
- bundlesOfQuantity [numeric]
- minimumTemperatureF [numeric]
- maximumTemperatureF [numeric]
- rangeTemperatureF [input]
- temperatureRangeFAndC [input]
- minimumTemperatureC [numeric]
- maximumTemperatureC [numeric]
- rangeTemperatureC [input]
- temperatureRangeApplication [input]
- succesorFlag [booleanSelect]
- B2CStoreFlag [booleanSelect]
- printedCatalogFlag [booleanSelect]
- virtualCatalogFlag [booleanSelect]
- returnFlag [booleanSelect]
- rebateFlag [booleanSelect]
- newItemFlagForCatalog [booleanSelect]
- ProductType [select]
- BusinessUnit [select]
- siopFullCode [input]
- SIOPLevel1 [manyToManyObjectRelation]
- SIOPLevel2 [manyToManyObjectRelation]
- SIOPLevel3 [manyToManyObjectRelation]
- SIOPLevel4 [manyToManyObjectRelation]
- SIOPLevel5 [manyToManyObjectRelation]
- SIOPLevel6 [manyToManyObjectRelation]
- SalesOrgData [reverseManyToManyObjectRelation]
- Plants [reverseManyToManyObjectRelation]
- Base [objectbricks]
- Skeleton [objectbricks]
- Fert [objectbricks]
- mainImage [image]
- frontView [image]
- sideView [image]
- cutView [image]
- Document [manyToManyRelation]
- priceData [table]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '1',
   'name' => 'Product',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1592806989,
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
   'allowInherit' => true,
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
         'fieldtype' => 'tabpanel',
         'border' => false,
         'tabPosition' => 'top',
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Base Data',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Base Data',
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
                 'fieldtype' => 'tabpanel',
                 'border' => false,
                 'tabPosition' => NULL,
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'SAP Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Imported From SAP',
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => 'Imported From SAP',
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
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Global Data Points',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'name' => 'Field Container',
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 200,
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'name' => 'Field Container',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 255,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'articleNumber',
                                     'title' => 'SAP Code / Material Number',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => true,
                                     'locked' => false,
                                     'style' => '',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => true,
                                     'visibleSearch' => true,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'eanUpc',
                                     'title' => 'EAN / UPC',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                     'fieldtype' => 'manyToOneRelation',
                                     'width' => 300,
                                     'assetUploadPath' => '',
                                     'relationType' => true,
                                     'queryColumnType' => 
                                    array (
                                      'id' => 'int(11)',
                                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                                    ),
                                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                                     'objectsAllowed' => true,
                                     'assetsAllowed' => false,
                                     'assetTypes' => 
                                    array (
                                    ),
                                     'documentsAllowed' => false,
                                     'documentTypes' => 
                                    array (
                                    ),
                                     'classes' => 
                                    array (
                                      0 => 
                                      array (
                                        'classes' => 'MaterialGroup',
                                      ),
                                    ),
                                     'pathFormatterClass' => '',
                                     'name' => 'materialGroup',
                                     'title' => 'Material Group',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => '',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'baseUOM',
                                     'title' => 'Base UOM',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'grossWeight',
                                     'title' => 'Gross Weight',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'netWeight',
                                     'title' => 'Net Weight',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'LB',
                                        'value' => 'LB',
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'G',
                                        'value' => 'G',
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'KG',
                                        'value' => 'KG',
                                      ),
                                    ),
                                     'width' => 300,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'weightUnit',
                                     'title' => 'Weight Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                                     'fieldtype' => 'localizedfields',
                                     'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                                     'childs' => 
                                    array (
                                      0 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                         'fieldtype' => 'textarea',
                                         'width' => 370,
                                         'height' => 100,
                                         'maxLength' => NULL,
                                         'showCharCount' => false,
                                         'excludeFromSearchIndex' => false,
                                         'queryColumnType' => 'longtext',
                                         'columnType' => 'longtext',
                                         'phpdocType' => 'string',
                                         'name' => 'sapDescription',
                                         'title' => 'SAP Description',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => true,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => '',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                    ),
                                     'name' => 'localizedfields',
                                     'region' => NULL,
                                     'layout' => NULL,
                                     'title' => '',
                                     'width' => 500,
                                     'height' => '',
                                     'maxTabs' => NULL,
                                     'labelWidth' => NULL,
                                     'border' => false,
                                     'provideSplitView' => false,
                                     'tabPosition' => NULL,
                                     'hideLabelsWhenTabsReached' => -1,
                                     'referencedFields' => 
                                    array (
                                      0 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                                         'fieldtype' => 'localizedfields',
                                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                                         'childs' => 
                                        array (
                                          0 => 
                                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                             'fieldtype' => 'fieldcontainer',
                                             'labelWidth' => 100,
                                             'layout' => 'hbox',
                                             'fieldLabel' => '',
                                             'name' => 'Field Container',
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
                                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                                 'fieldtype' => 'fieldcontainer',
                                                 'labelWidth' => 220,
                                                 'layout' => 'vbox',
                                                 'fieldLabel' => '',
                                                 'name' => 'Field Container',
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
                                                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                                     'fieldtype' => 'multiselect',
                                                     'options' => 
                                                    array (
                                                    ),
                                                     'width' => '',
                                                     'height' => '',
                                                     'maxItems' => 5,
                                                     'renderType' => 'list',
                                                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                                     'optionsProviderData' => 'Features|Name',
                                                     'queryColumnType' => 'text',
                                                     'columnType' => 'text',
                                                     'phpdocType' => 'array',
                                                     'dynamicOptions' => false,
                                                     'name' => 'FeaturesBenefitsBulletPoint',
                                                     'title' => 'Features & Benefits Bullet Points',
                                                     'tooltip' => '',
                                                     'mandatory' => false,
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
                                                  )),
                                                  1 => 
                                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                                     'fieldtype' => 'input',
                                                     'width' => 300,
                                                     'defaultValue' => NULL,
                                                     'queryColumnType' => 'varchar',
                                                     'columnType' => 'varchar',
                                                     'columnLength' => 190,
                                                     'phpdocType' => 'string',
                                                     'regex' => '',
                                                     'unique' => false,
                                                     'showCharCount' => false,
                                                     'name' => 'legalText',
                                                     'title' => 'Legal Text',
                                                     'tooltip' => '',
                                                     'mandatory' => false,
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
                                                  2 => 
                                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                                     'fieldtype' => 'input',
                                                     'width' => 300,
                                                     'defaultValue' => NULL,
                                                     'queryColumnType' => 'varchar',
                                                     'columnType' => 'varchar',
                                                     'columnLength' => 190,
                                                     'phpdocType' => 'string',
                                                     'regex' => '',
                                                     'unique' => false,
                                                     'showCharCount' => false,
                                                     'name' => 'Application',
                                                     'title' => 'Application (What does the hose convey?)',
                                                     'tooltip' => 'Application - What does the hose convey?',
                                                     'mandatory' => false,
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
                                                  3 => 
                                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                                     'fieldtype' => 'input',
                                                     'width' => 300,
                                                     'defaultValue' => NULL,
                                                     'queryColumnType' => 'varchar',
                                                     'columnType' => 'varchar',
                                                     'columnLength' => 190,
                                                     'phpdocType' => 'string',
                                                     'regex' => '',
                                                     'unique' => false,
                                                     'showCharCount' => false,
                                                     'name' => 'BrandShortText1',
                                                     'title' => 'Brand Short Text 1',
                                                     'tooltip' => '',
                                                     'mandatory' => false,
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
                                                  4 => 
                                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                                     'fieldtype' => 'input',
                                                     'width' => 300,
                                                     'defaultValue' => NULL,
                                                     'queryColumnType' => 'varchar',
                                                     'columnType' => 'varchar',
                                                     'columnLength' => 190,
                                                     'phpdocType' => 'string',
                                                     'regex' => '',
                                                     'unique' => false,
                                                     'showCharCount' => false,
                                                     'name' => 'BrandShortText2',
                                                     'title' => 'Brand Short Text 2',
                                                     'tooltip' => '',
                                                     'mandatory' => false,
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
                                                  5 => 
                                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                                     'fieldtype' => 'input',
                                                     'width' => 300,
                                                     'defaultValue' => NULL,
                                                     'queryColumnType' => 'varchar',
                                                     'columnType' => 'varchar',
                                                     'columnLength' => 190,
                                                     'phpdocType' => 'string',
                                                     'regex' => '',
                                                     'unique' => false,
                                                     'showCharCount' => false,
                                                     'name' => 'BrandShortText3',
                                                     'title' => 'Brand Short Text 3',
                                                     'tooltip' => '',
                                                     'mandatory' => false,
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
                                                  6 => 
                                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                                     'fieldtype' => 'input',
                                                     'width' => 300,
                                                     'defaultValue' => NULL,
                                                     'queryColumnType' => 'varchar',
                                                     'columnType' => 'varchar',
                                                     'columnLength' => 190,
                                                     'phpdocType' => 'string',
                                                     'regex' => '',
                                                     'unique' => false,
                                                     'showCharCount' => false,
                                                     'name' => 'BrandShortText4',
                                                     'title' => 'Brand Short Text 4',
                                                     'tooltip' => '',
                                                     'mandatory' => false,
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
                                                  7 => 
                                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                                     'fieldtype' => 'input',
                                                     'width' => 300,
                                                     'defaultValue' => NULL,
                                                     'queryColumnType' => 'varchar',
                                                     'columnType' => 'varchar',
                                                     'columnLength' => 190,
                                                     'phpdocType' => 'string',
                                                     'regex' => '',
                                                     'unique' => false,
                                                     'showCharCount' => false,
                                                     'name' => 'BrandShortText5',
                                                     'title' => 'Brand Short Text 5',
                                                     'tooltip' => '',
                                                     'mandatory' => false,
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
                                                ),
                                                 'locked' => false,
                                              )),
                                              1 => 
                                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                                 'fieldtype' => 'fieldcontainer',
                                                 'labelWidth' => 220,
                                                 'layout' => 'vbox',
                                                 'fieldLabel' => '',
                                                 'name' => 'Field Container',
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
                                                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                                     'fieldtype' => 'wysiwyg',
                                                     'width' => 300,
                                                     'height' => 150,
                                                     'queryColumnType' => 'longtext',
                                                     'columnType' => 'longtext',
                                                     'phpdocType' => 'string',
                                                     'toolbarConfig' => '',
                                                     'excludeFromSearchIndex' => false,
                                                     'name' => 'shortDescription',
                                                     'title' => 'Marketing / Short Description',
                                                     'tooltip' => '',
                                                     'mandatory' => false,
                                                     'noteditable' => false,
                                                     'index' => false,
                                                     'locked' => false,
                                                     'style' => 'margin-left:20px;',
                                                     'permissions' => NULL,
                                                     'datatype' => 'data',
                                                     'relationType' => false,
                                                     'invisible' => false,
                                                     'visibleGridView' => false,
                                                     'visibleSearch' => false,
                                                  )),
                                                  1 => 
                                                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                                     'fieldtype' => 'wysiwyg',
                                                     'width' => 300,
                                                     'height' => '',
                                                     'queryColumnType' => 'longtext',
                                                     'columnType' => 'longtext',
                                                     'phpdocType' => 'string',
                                                     'toolbarConfig' => '',
                                                     'excludeFromSearchIndex' => false,
                                                     'name' => 'longDescription',
                                                     'title' => 'Marketing / Long Description',
                                                     'tooltip' => '',
                                                     'mandatory' => false,
                                                     'noteditable' => false,
                                                     'index' => false,
                                                     'locked' => false,
                                                     'style' => 'margin-left:20px;',
                                                     'permissions' => NULL,
                                                     'datatype' => 'data',
                                                     'relationType' => false,
                                                     'invisible' => false,
                                                     'visibleGridView' => false,
                                                     'visibleSearch' => false,
                                                  )),
                                                ),
                                                 'locked' => false,
                                              )),
                                            ),
                                             'locked' => false,
                                          )),
                                        ),
                                         'name' => 'localizedfields',
                                         'region' => NULL,
                                         'layout' => NULL,
                                         'title' => '',
                                         'width' => '',
                                         'height' => '',
                                         'maxTabs' => NULL,
                                         'labelWidth' => 100,
                                         'border' => false,
                                         'provideSplitView' => false,
                                         'tabPosition' => NULL,
                                         'hideLabelsWhenTabsReached' => -1,
                                         'referencedFields' => 
                                        array (
                                        ),
                                         'fieldDefinitionsCache' => NULL,
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => NULL,
                                         'locked' => false,
                                         'style' => '',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => true,
                                         'visibleSearch' => true,
                                      )),
                                      1 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                                         'fieldtype' => 'localizedfields',
                                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                                         'childs' => 
                                        array (
                                          0 => 
                                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                             'fieldtype' => 'input',
                                             'width' => 600,
                                             'defaultValue' => NULL,
                                             'queryColumnType' => 'varchar',
                                             'columnType' => 'varchar',
                                             'columnLength' => 190,
                                             'phpdocType' => 'string',
                                             'regex' => '',
                                             'unique' => false,
                                             'showCharCount' => false,
                                             'name' => 'CompletenessPercentage',
                                             'title' => 'Completeness Percentage',
                                             'tooltip' => '',
                                             'mandatory' => false,
                                             'noteditable' => false,
                                             'index' => false,
                                             'locked' => false,
                                             'style' => 'padding: 10px; background-color: #d9edf7; border-color: #bce8f1 !important; color: #31708f;',
                                             'permissions' => NULL,
                                             'datatype' => 'data',
                                             'relationType' => false,
                                             'invisible' => false,
                                             'visibleGridView' => false,
                                             'visibleSearch' => false,
                                             'defaultValueGenerator' => '',
                                          )),
                                          1 => 
                                          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                             'fieldtype' => 'textarea',
                                             'width' => 600,
                                             'height' => 500,
                                             'maxLength' => NULL,
                                             'showCharCount' => false,
                                             'excludeFromSearchIndex' => false,
                                             'queryColumnType' => 'longtext',
                                             'columnType' => 'longtext',
                                             'phpdocType' => 'string',
                                             'name' => 'EmptyFields',
                                             'title' => 'Empty Fields',
                                             'tooltip' => '',
                                             'mandatory' => false,
                                             'noteditable' => false,
                                             'index' => false,
                                             'locked' => false,
                                             'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;',
                                             'permissions' => NULL,
                                             'datatype' => 'data',
                                             'relationType' => false,
                                             'invisible' => false,
                                             'visibleGridView' => false,
                                             'visibleSearch' => false,
                                          )),
                                        ),
                                         'name' => 'localizedfields',
                                         'region' => NULL,
                                         'layout' => NULL,
                                         'title' => '',
                                         'width' => '',
                                         'height' => '',
                                         'maxTabs' => NULL,
                                         'labelWidth' => 200,
                                         'border' => false,
                                         'provideSplitView' => false,
                                         'tabPosition' => NULL,
                                         'hideLabelsWhenTabsReached' => -1,
                                         'referencedFields' => 
                                        array (
                                        ),
                                         'fieldDefinitionsCache' => NULL,
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => NULL,
                                         'locked' => false,
                                         'style' => '',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => true,
                                         'visibleSearch' => true,
                                      )),
                                    ),
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => NULL,
                                     'locked' => false,
                                     'style' => '',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => true,
                                     'visibleSearch' => true,
                                  )),
                                ),
                                 'locked' => false,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 200,
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'name' => 'Field Container',
                                 'type' => NULL,
                                 'region' => NULL,
                                 'title' => '',
                                 'width' => NULL,
                                 'height' => NULL,
                                 'collapsible' => false,
                                 'collapsed' => false,
                                 'bodyStyle' => 'margin-left: 20px;',
                                 'datatype' => 'layout',
                                 'permissions' => NULL,
                                 'childs' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'oldMaterialCode',
                                     'title' => 'Old Material Code',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'manufacturer',
                                     'title' => 'Manufacturer',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'manufacturerPartNumber',
                                     'title' => 'Manufacturer Part Number',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'stccCode',
                                     'title' => 'STCC Code',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'industryStandard',
                                     'title' => 'Industry Standard #',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'continentalBrand',
                                     'title' => 'Continental Brand / Product Name',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'brandConstruction',
                                     'title' => 'Brand Construction',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'substitutePartNumber',
                                     'title' => ' Substitute Part Number',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'listPrice',
                                     'title' => 'List Price',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  9 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'currency',
                                     'title' => 'Currency',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  10 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => NULL,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'UnitsInPackage',
                                     'title' => 'Units in Package ',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                              )),
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 200,
                         'name' => 'Configurations',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Configurations',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => true,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                             'fieldtype' => 'booleanSelect',
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
                             'width' => 100,
                             'queryColumnType' => 'tinyint(1) null',
                             'columnType' => 'tinyint(1) null',
                             'phpdocType' => 'boolean',
                             'name' => 'deletedFlagAtClientLevel',
                             'title' => 'Deleted / Obsoleted Flag Client Level',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => true,
                             'index' => false,
                             'locked' => false,
                             'style' => '',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                    ),
                     'locked' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/overlay-download.svg',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'PIM Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Enriched In PIM',
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => ' Enriched In PIM',
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
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Additional Information',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'name' => 'Field Container',
                             'type' => NULL,
                             'region' => NULL,
                             'title' => 'ReadOnly In PIM',
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 210,
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'name' => 'Field Container',
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
                                        'key' => 'A.R. THOMSON',
                                        'value' => 'A.R. THOMSON',
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'ABBOTT',
                                        'value' => 'ABBOTT',
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'ABBOTT 1025 SERIES',
                                        'value' => 'ABBOTT 1025 SERIES',
                                      ),
                                      3 => 
                                      array (
                                        'key' => 'ABBOTT CHEM GROUT',
                                        'value' => 'ABBOTT CHEM GROUT',
                                      ),
                                      4 => 
                                      array (
                                        'key' => 'ABS BLAST',
                                        'value' => 'ABS BLAST',
                                      ),
                                      5 => 
                                      array (
                                        'key' => 'ACCORD TANK CLEANING',
                                        'value' => 'ACCORD TANK CLEANING',
                                      ),
                                      6 => 
                                      array (
                                        'key' => 'ACE BREWLINE',
                                        'value' => 'ACE BREWLINE',
                                      ),
                                      7 => 
                                      array (
                                        'key' => 'ACE FOOD',
                                        'value' => 'ACE FOOD',
                                      ),
                                      8 => 
                                      array (
                                        'key' => 'ACE FOOD DISCHARGE',
                                        'value' => 'ACE FOOD DISCHARGE',
                                      ),
                                      9 => 
                                      array (
                                        'key' => 'ACE GRAY FOOD',
                                        'value' => 'ACE GRAY FOOD',
                                      ),
                                      10 => 
                                      array (
                                        'key' => 'ACE RCR FLEXRITE',
                                        'value' => 'ACE RCR FLEXRITE',
                                      ),
                                      11 => 
                                      array (
                                        'key' => 'ACE RCT FLEXRITE',
                                        'value' => 'ACE RCT FLEXRITE',
                                      ),
                                      12 => 
                                      array (
                                        'key' => 'ACE RDC FOOD',
                                        'value' => 'ACE RDC FOOD',
                                      ),
                                      13 => 
                                      array (
                                        'key' => 'ACE RSD FOOD',
                                        'value' => 'ACE RSD FOOD',
                                      ),
                                      14 => 
                                      array (
                                        'key' => 'AD SEALING HYDROCARBON DRAIN',
                                        'value' => 'AD SEALING HYDROCARBON DRAIN',
                                      ),
                                      15 => 
                                      array (
                                        'key' => 'ADVANTAGE',
                                        'value' => 'ADVANTAGE',
                                      ),
                                      16 => 
                                      array (
                                        'key' => 'AEROPAL',
                                        'value' => 'AEROPAL',
                                      ),
                                      17 => 
                                      array (
                                        'key' => 'AG SPRAY',
                                        'value' => 'AG SPRAY',
                                      ),
                                      18 => 
                                      array (
                                        'key' => 'AGCHEM',
                                        'value' => 'AGCHEM',
                                      ),
                                      19 => 
                                      array (
                                        'key' => 'AGCHEM S&D',
                                        'value' => 'AGCHEM S&D',
                                      ),
                                      20 => 
                                      array (
                                        'key' => 'AGGIE GAS',
                                        'value' => 'AGGIE GAS',
                                      ),
                                      21 => 
                                      array (
                                        'key' => 'AGRI-FLEX',
                                        'value' => 'AGRI-FLEX',
                                      ),
                                      22 => 
                                      array (
                                        'key' => 'AHR WATER S&D',
                                        'value' => 'AHR WATER S&D',
                                      ),
                                      23 => 
                                      array (
                                        'key' => 'AIR 1000',
                                        'value' => 'AIR 1000',
                                      ),
                                      24 => 
                                      array (
                                        'key' => 'AIR 250',
                                        'value' => 'AIR 250',
                                      ),
                                      25 => 
                                      array (
                                        'key' => 'AIR 300',
                                        'value' => 'AIR 300',
                                      ),
                                      26 => 
                                      array (
                                        'key' => 'AIR 300 HD',
                                        'value' => 'AIR 300 HD',
                                      ),
                                      27 => 
                                      array (
                                        'key' => 'AIR 400',
                                        'value' => 'AIR 400',
                                      ),
                                      28 => 
                                      array (
                                        'key' => 'AIR BREATHING HOSE',
                                        'value' => 'AIR BREATHING HOSE',
                                      ),
                                      29 => 
                                      array (
                                        'key' => 'AIR PSNS',
                                        'value' => 'AIR PSNS',
                                      ),
                                      30 => 
                                      array (
                                        'key' => 'AIR PUMP GUNITE',
                                        'value' => 'AIR PUMP GUNITE',
                                      ),
                                      31 => 
                                      array (
                                        'key' => 'AIR TRIX',
                                        'value' => 'AIR TRIX',
                                      ),
                                      32 => 
                                      array (
                                        'key' => 'AIR-A-PLANE GLYCOL',
                                        'value' => 'AIR-A-PLANE GLYCOL',
                                      ),
                                      33 => 
                                      array (
                                        'key' => 'AIR-WATER 400',
                                        'value' => 'AIR-WATER 400',
                                      ),
                                      34 => 
                                      array (
                                        'key' => 'AIRCRAFT FUELING',
                                        'value' => 'AIRCRAFT FUELING',
                                      ),
                                      35 => 
                                      array (
                                        'key' => 'AIRGAS FRONTIER',
                                        'value' => 'AIRGAS FRONTIER',
                                      ),
                                      36 => 
                                      array (
                                        'key' => 'AIRGAS GRADE R',
                                        'value' => 'AIRGAS GRADE R',
                                      ),
                                      37 => 
                                      array (
                                        'key' => 'AIRGAS GRADE RM',
                                        'value' => 'AIRGAS GRADE RM',
                                      ),
                                      38 => 
                                      array (
                                        'key' => 'AIRGAS GRADE T',
                                        'value' => 'AIRGAS GRADE T',
                                      ),
                                      39 => 
                                      array (
                                        'key' => 'AIRMAX FLEXIMAX',
                                        'value' => 'AIRMAX FLEXIMAX',
                                      ),
                                      40 => 
                                      array (
                                        'key' => 'AIRMAX PROMAX',
                                        'value' => 'AIRMAX PROMAX',
                                      ),
                                      41 => 
                                      array (
                                        'key' => 'AIRMAX SUPERMAX',
                                        'value' => 'AIRMAX SUPERMAX',
                                      ),
                                      42 => 
                                      array (
                                        'key' => 'AJAX',
                                        'value' => 'AJAX',
                                      ),
                                      43 => 
                                      array (
                                        'key' => 'ALASKA RUBBER',
                                        'value' => 'ALASKA RUBBER',
                                      ),
                                      44 => 
                                      array (
                                        'key' => 'ALCAN MUD STACKING',
                                        'value' => 'ALCAN MUD STACKING',
                                      ),
                                      45 => 
                                      array (
                                        'key' => 'ALCOA POTROOM',
                                        'value' => 'ALCOA POTROOM',
                                      ),
                                      46 => 
                                      array (
                                        'key' => 'ALLCRETE TEXTILE',
                                        'value' => 'ALLCRETE TEXTILE',
                                      ),
                                      47 => 
                                      array (
                                        'key' => 'ALLCRETE WIRE',
                                        'value' => 'ALLCRETE WIRE',
                                      ),
                                      48 => 
                                      array (
                                        'key' => 'ALLENT GUNITE',
                                        'value' => 'ALLENT GUNITE',
                                      ),
                                      49 => 
                                      array (
                                        'key' => 'ALLENT REFRACTORY',
                                        'value' => 'ALLENT REFRACTORY',
                                      ),
                                      50 => 
                                      array (
                                        'key' => 'AMFLO 702-610',
                                        'value' => 'AMFLO 702-610',
                                      ),
                                      51 => 
                                      array (
                                        'key' => 'AMMONIUM NITRATE BLAST',
                                        'value' => 'AMMONIUM NITRATE BLAST',
                                      ),
                                      52 => 
                                      array (
                                        'key' => 'AMMONIUM NITRATE HD',
                                        'value' => 'AMMONIUM NITRATE HD',
                                      ),
                                      53 => 
                                      array (
                                        'key' => 'AMMONIUM NITRATE PELLET',
                                        'value' => 'AMMONIUM NITRATE PELLET',
                                      ),
                                      54 => 
                                      array (
                                        'key' => 'APACHE',
                                        'value' => 'APACHE',
                                      ),
                                      55 => 
                                      array (
                                        'key' => 'APOLLO',
                                        'value' => 'APOLLO',
                                      ),
                                      56 => 
                                      array (
                                        'key' => 'APOLLO FLEXDOCK',
                                        'value' => 'APOLLO FLEXDOCK',
                                      ),
                                      57 => 
                                      array (
                                        'key' => 'APPLIED INDUSTRIAL TECH',
                                        'value' => 'APPLIED INDUSTRIAL TECH',
                                      ),
                                      58 => 
                                      array (
                                        'key' => 'APPLIED JETTING',
                                        'value' => 'APPLIED JETTING',
                                      ),
                                      59 => 
                                      array (
                                        'key' => 'AQUAHAMMER',
                                        'value' => 'AQUAHAMMER',
                                      ),
                                      60 => 
                                      array (
                                        'key' => 'AQUAPAL',
                                        'value' => 'AQUAPAL',
                                      ),
                                      61 => 
                                      array (
                                        'key' => 'AR THOMSON EXTREME CRIMP',
                                        'value' => 'AR THOMSON EXTREME CRIMP',
                                      ),
                                      62 => 
                                      array (
                                        'key' => 'ARCAIR INSULATOR',
                                        'value' => 'ARCAIR INSULATOR',
                                      ),
                                      63 => 
                                      array (
                                        'key' => 'ARCHON',
                                        'value' => 'ARCHON',
                                      ),
                                      64 => 
                                      array (
                                        'key' => 'ARCO BLAST XF',
                                        'value' => 'ARCO BLAST XF',
                                      ),
                                      65 => 
                                      array (
                                        'key' => 'ARCTIC EXTREMEFLEX',
                                        'value' => 'ARCTIC EXTREMEFLEX',
                                      ),
                                      66 => 
                                      array (
                                        'key' => 'ARCTIC FLEXTRA',
                                        'value' => 'ARCTIC FLEXTRA',
                                      ),
                                      67 => 
                                      array (
                                        'key' => 'ARCTIC FLEXWING',
                                        'value' => 'ARCTIC FLEXWING',
                                      ),
                                      68 => 
                                      array (
                                        'key' => 'ARCTIC FUEL DISCHARGE',
                                        'value' => 'ARCTIC FUEL DISCHARGE',
                                      ),
                                      69 => 
                                      array (
                                        'key' => 'ARCTIC LCP3',
                                        'value' => 'ARCTIC LCP3',
                                      ),
                                      70 => 
                                      array (
                                        'key' => 'ARCTIC LCP4S',
                                        'value' => 'ARCTIC LCP4S',
                                      ),
                                      71 => 
                                      array (
                                        'key' => 'ARCTIC LCP6S',
                                        'value' => 'ARCTIC LCP6S',
                                      ),
                                      72 => 
                                      array (
                                        'key' => 'ARCTIC LR16SC',
                                        'value' => 'ARCTIC LR16SC',
                                      ),
                                      73 => 
                                      array (
                                        'key' => 'ARCTIC LR2SN',
                                        'value' => 'ARCTIC LR2SN',
                                      ),
                                      74 => 
                                      array (
                                        'key' => 'ARCTIC ORTAC',
                                        'value' => 'ARCTIC ORTAC',
                                      ),
                                      75 => 
                                      array (
                                        'key' => 'ARCTIC ORTAC PLUS',
                                        'value' => 'ARCTIC ORTAC PLUS',
                                      ),
                                      76 => 
                                      array (
                                        'key' => 'ARCTIC RIG SUPPLY',
                                        'value' => 'ARCTIC RIG SUPPLY',
                                      ),
                                      77 => 
                                      array (
                                        'key' => 'ARMOR-FLEX PRO',
                                        'value' => 'ARMOR-FLEX PRO',
                                      ),
                                      78 => 
                                      array (
                                        'key' => 'ARMORCOAT ACP3',
                                        'value' => 'ARMORCOAT ACP3',
                                      ),
                                      79 => 
                                      array (
                                        'key' => 'ARMORCOAT ACP4',
                                        'value' => 'ARMORCOAT ACP4',
                                      ),
                                      80 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC12',
                                        'value' => 'ARMORCOAT ARC12',
                                      ),
                                      81 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC13',
                                        'value' => 'ARMORCOAT ARC13',
                                      ),
                                      82 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC15',
                                        'value' => 'ARMORCOAT ARC15',
                                      ),
                                      83 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC16SC',
                                        'value' => 'ARMORCOAT ARC16SC',
                                      ),
                                      84 => 
                                      array (
                                        'key' => 'ARONSON',
                                        'value' => 'ARONSON',
                                      ),
                                      85 => 
                                      array (
                                        'key' => 'ARPHSE',
                                        'value' => 'ARPHSE',
                                      ),
                                      86 => 
                                      array (
                                        'key' => 'ARTRAC',
                                        'value' => 'ARTRAC',
                                      ),
                                      87 => 
                                      array (
                                        'key' => 'ARVAC SW',
                                        'value' => 'ARVAC SW',
                                      ),
                                      88 => 
                                      array (
                                        'key' => 'AS1335 TWIN-LINE',
                                        'value' => 'AS1335 TWIN-LINE',
                                      ),
                                      89 => 
                                      array (
                                        'key' => 'AS2435 TYPE 1 AIRBRAKE',
                                        'value' => 'AS2435 TYPE 1 AIRBRAKE',
                                      ),
                                      90 => 
                                      array (
                                        'key' => 'ASJ',
                                        'value' => 'ASJ',
                                      ),
                                      91 => 
                                      array (
                                        'key' => 'ASJ VERSACRETE',
                                        'value' => 'ASJ VERSACRETE',
                                      ),
                                      92 => 
                                      array (
                                        'key' => 'ATLANT WATER',
                                        'value' => 'ATLANT WATER',
                                      ),
                                      93 => 
                                      array (
                                        'key' => 'ATLAS',
                                        'value' => 'ATLAS',
                                      ),
                                      94 => 
                                      array (
                                        'key' => 'ATRUBB NR SPRAY',
                                        'value' => 'ATRUBB NR SPRAY',
                                      ),
                                      95 => 
                                      array (
                                        'key' => 'AUGER ARC PILING',
                                        'value' => 'AUGER ARC PILING',
                                      ),
                                      96 => 
                                      array (
                                        'key' => 'AUSTIN',
                                        'value' => 'AUSTIN',
                                      ),
                                      97 => 
                                      array (
                                        'key' => 'AUSTIN RUBBER',
                                        'value' => 'AUSTIN RUBBER',
                                      ),
                                      98 => 
                                      array (
                                        'key' => 'AUTOGRIP',
                                        'value' => 'AUTOGRIP',
                                      ),
                                      99 => 
                                      array (
                                        'key' => 'BAHCAL',
                                        'value' => 'BAHCAL',
                                      ),
                                      100 => 
                                      array (
                                        'key' => 'BANDING COIL',
                                        'value' => 'BANDING COIL',
                                      ),
                                      101 => 
                                      array (
                                        'key' => 'BC COLD FLEX',
                                        'value' => 'BC COLD FLEX',
                                      ),
                                      102 => 
                                      array (
                                        'key' => 'BC GASOLINE',
                                        'value' => 'BC GASOLINE',
                                      ),
                                      103 => 
                                      array (
                                        'key' => 'BC MARINA',
                                        'value' => 'BC MARINA',
                                      ),
                                      104 => 
                                      array (
                                        'key' => 'BEDFORD',
                                        'value' => 'BEDFORD',
                                      ),
                                      105 => 
                                      array (
                                        'key' => 'BLACK FLEXTRA II',
                                        'value' => 'BLACK FLEXTRA II',
                                      ),
                                      106 => 
                                      array (
                                        'key' => 'BLACK FLEXWING',
                                        'value' => 'BLACK FLEXWING',
                                      ),
                                      107 => 
                                      array (
                                        'key' => 'BLAST',
                                        'value' => 'BLAST',
                                      ),
                                      108 => 
                                      array (
                                        'key' => 'BLASTHOLE SLURRY & DEWATERING',
                                        'value' => 'BLASTHOLE SLURRY & DEWATERING',
                                      ),
                                      109 => 
                                      array (
                                        'key' => 'BLASTMASTER HD',
                                        'value' => 'BLASTMASTER HD',
                                      ),
                                      110 => 
                                      array (
                                        'key' => 'BLAUDIECK',
                                        'value' => 'BLAUDIECK',
                                      ),
                                      111 => 
                                      array (
                                        'key' => 'BLISSFUL FISHERMAN',
                                        'value' => 'BLISSFUL FISHERMAN',
                                      ),
                                      112 => 
                                      array (
                                        'key' => 'BLUCOR',
                                        'value' => 'BLUCOR',
                                      ),
                                      113 => 
                                      array (
                                        'key' => 'BLUCOR FLANGE',
                                        'value' => 'BLUCOR FLANGE',
                                      ),
                                      114 => 
                                      array (
                                        'key' => 'BLUE FLEXWING',
                                        'value' => 'BLUE FLEXWING',
                                      ),
                                      115 => 
                                      array (
                                        'key' => 'BLUE FLOUR',
                                        'value' => 'BLUE FLOUR',
                                      ),
                                      116 => 
                                      array (
                                        'key' => 'BLUE XTREME STRAIGH RAD HOSE',
                                        'value' => 'BLUE XTREME STRAIGH RAD HOSE',
                                      ),
                                      117 => 
                                      array (
                                        'key' => 'BOOTMOR',
                                        'value' => 'BOOTMOR',
                                      ),
                                      118 => 
                                      array (
                                        'key' => 'BOP SLEEVE',
                                        'value' => 'BOP SLEEVE',
                                      ),
                                      119 => 
                                      array (
                                        'key' => 'BOP WRAP',
                                        'value' => 'BOP WRAP',
                                      ),
                                      120 => 
                                      array (
                                        'key' => 'BOTTOM LOADING',
                                        'value' => 'BOTTOM LOADING',
                                      ),
                                      121 => 
                                      array (
                                        'key' => 'BR7',
                                        'value' => 'BR7',
                                      ),
                                      122 => 
                                      array (
                                        'key' => 'BRAIDAIR',
                                        'value' => 'BRAIDAIR',
                                      ),
                                      123 => 
                                      array (
                                        'key' => 'BRANHAM CHEMONE SUPERIOR',
                                        'value' => 'BRANHAM CHEMONE SUPERIOR',
                                      ),
                                      124 => 
                                      array (
                                        'key' => 'BREATHING AIR',
                                        'value' => 'BREATHING AIR',
                                      ),
                                      125 => 
                                      array (
                                        'key' => 'BREATHING AIR PLUS',
                                        'value' => 'BREATHING AIR PLUS',
                                      ),
                                      126 => 
                                      array (
                                        'key' => 'BRENNTAG',
                                        'value' => 'BRENNTAG',
                                      ),
                                      127 => 
                                      array (
                                        'key' => 'BREWERS HOSE',
                                        'value' => 'BREWERS HOSE',
                                      ),
                                      128 => 
                                      array (
                                        'key' => 'BREWLINE',
                                        'value' => 'BREWLINE',
                                      ),
                                      129 => 
                                      array (
                                        'key' => 'BRICK RED AIR',
                                        'value' => 'BRICK RED AIR',
                                      ),
                                      130 => 
                                      array (
                                        'key' => 'BRIDGEPOINT',
                                        'value' => 'BRIDGEPOINT',
                                      ),
                                      131 => 
                                      array (
                                        'key' => 'BRIGADE MINE',
                                        'value' => 'BRIGADE MINE',
                                      ),
                                      132 => 
                                      array (
                                        'key' => 'BRINE HOSE',
                                        'value' => 'BRINE HOSE',
                                      ),
                                      133 => 
                                      array (
                                        'key' => 'BROOM SWEEPER',
                                        'value' => 'BROOM SWEEPER',
                                      ),
                                      134 => 
                                      array (
                                        'key' => 'BROWN FLEXWING',
                                        'value' => 'BROWN FLEXWING',
                                      ),
                                      135 => 
                                      array (
                                        'key' => 'BUHLER MIAG',
                                        'value' => 'BUHLER MIAG',
                                      ),
                                      136 => 
                                      array (
                                        'key' => 'BUTTERWORTH',
                                        'value' => 'BUTTERWORTH',
                                      ),
                                      137 => 
                                      array (
                                        'key' => 'BUTYL 200',
                                        'value' => 'BUTYL 200',
                                      ),
                                      138 => 
                                      array (
                                        'key' => 'C&J WATER S&D',
                                        'value' => 'C&J WATER S&D',
                                      ),
                                      139 => 
                                      array (
                                        'key' => 'CABLE CONDUIT',
                                        'value' => 'CABLE CONDUIT',
                                      ),
                                      140 => 
                                      array (
                                        'key' => 'CABLE COOLING HOSE',
                                        'value' => 'CABLE COOLING HOSE',
                                      ),
                                      141 => 
                                      array (
                                        'key' => 'CABLE COVER',
                                        'value' => 'CABLE COVER',
                                      ),
                                      142 => 
                                      array (
                                        'key' => 'CAMBRG HEALY PII',
                                        'value' => 'CAMBRG HEALY PII',
                                      ),
                                      143 => 
                                      array (
                                        'key' => 'CAMLOK',
                                        'value' => 'CAMLOK',
                                      ),
                                      144 => 
                                      array (
                                        'key' => 'CARON ARCTIC FLEX',
                                        'value' => 'CARON ARCTIC FLEX',
                                      ),
                                      145 => 
                                      array (
                                        'key' => 'CARON BLACK SOFTWALL',
                                        'value' => 'CARON BLACK SOFTWALL',
                                      ),
                                      146 => 
                                      array (
                                        'key' => 'CARON FABCHEM',
                                        'value' => 'CARON FABCHEM',
                                      ),
                                      147 => 
                                      array (
                                        'key' => 'CASCADE DRY CEMENT',
                                        'value' => 'CASCADE DRY CEMENT',
                                      ),
                                      148 => 
                                      array (
                                        'key' => 'CENEX',
                                        'value' => 'CENEX',
                                      ),
                                      149 => 
                                      array (
                                        'key' => 'CENEX OT',
                                        'value' => 'CENEX OT',
                                      ),
                                      150 => 
                                      array (
                                        'key' => 'CENTRAL ROCK DRILL',
                                        'value' => 'CENTRAL ROCK DRILL',
                                      ),
                                      151 => 
                                      array (
                                        'key' => 'CHEMICAL ACID DISCHARGE',
                                        'value' => 'CHEMICAL ACID DISCHARGE',
                                      ),
                                      152 => 
                                      array (
                                        'key' => 'CHEMONE',
                                        'value' => 'CHEMONE',
                                      ),
                                      153 => 
                                      array (
                                        'key' => 'CHEMSTREAM',
                                        'value' => 'CHEMSTREAM',
                                      ),
                                      154 => 
                                      array (
                                        'key' => 'CHLO GARLOK',
                                        'value' => 'CHLO GARLOK',
                                      ),
                                      155 => 
                                      array (
                                        'key' => 'CLEANJET',
                                        'value' => 'CLEANJET',
                                      ),
                                      156 => 
                                      array (
                                        'key' => 'CLEANJET FDA',
                                        'value' => 'CLEANJET FDA',
                                      ),
                                      157 => 
                                      array (
                                        'key' => 'CLEAR PVC TUBING',
                                        'value' => 'CLEAR PVC TUBING',
                                      ),
                                      158 => 
                                      array (
                                        'key' => 'CLEARWATER',
                                        'value' => 'CLEARWATER',
                                      ),
                                      159 => 
                                      array (
                                        'key' => 'CO2 HOSE',
                                        'value' => 'CO2 HOSE',
                                      ),
                                      160 => 
                                      array (
                                        'key' => 'COAST GUARD',
                                        'value' => 'COAST GUARD',
                                      ),
                                      161 => 
                                      array (
                                        'key' => 'COLD BLUE',
                                        'value' => 'COLD BLUE',
                                      ),
                                      162 => 
                                      array (
                                        'key' => 'COLLECTOR',
                                        'value' => 'COLLECTOR',
                                      ),
                                      163 => 
                                      array (
                                        'key' => 'COLLECTOR FLEX',
                                        'value' => 'COLLECTOR FLEX',
                                      ),
                                      164 => 
                                      array (
                                        'key' => 'COLORITE',
                                        'value' => 'COLORITE',
                                      ),
                                      165 => 
                                      array (
                                        'key' => 'CON FORM SUPER FLEX',
                                        'value' => 'CON FORM SUPER FLEX',
                                      ),
                                      166 => 
                                      array (
                                        'key' => 'CONAG WATER S&D',
                                        'value' => 'CONAG WATER S&D',
                                      ),
                                      167 => 
                                      array (
                                        'key' => 'CONCRETE G820',
                                        'value' => 'CONCRETE G820',
                                      ),
                                      168 => 
                                      array (
                                        'key' => 'CONCRETE VIBRATOR',
                                        'value' => 'CONCRETE VIBRATOR',
                                      ),
                                      169 => 
                                      array (
                                        'key' => 'CONTI CHEM OIL',
                                        'value' => 'CONTI CHEM OIL',
                                      ),
                                      170 => 
                                      array (
                                        'key' => 'CONTI CHEM PHARMA',
                                        'value' => 'CONTI CHEM PHARMA',
                                      ),
                                      171 => 
                                      array (
                                        'key' => 'CONTI CHEM STANDARD',
                                        'value' => 'CONTI CHEM STANDARD',
                                      ),
                                      172 => 
                                      array (
                                        'key' => 'CONTI CHEM SUPERIOR FEP',
                                        'value' => 'CONTI CHEM SUPERIOR FEP',
                                      ),
                                      173 => 
                                      array (
                                        'key' => 'CONTI PAINT SPRAY',
                                        'value' => 'CONTI PAINT SPRAY',
                                      ),
                                      174 => 
                                      array (
                                        'key' => 'CONTI POTABLE WATER',
                                        'value' => 'CONTI POTABLE WATER',
                                      ),
                                      175 => 
                                      array (
                                        'key' => 'CONTI WASTE WATER',
                                        'value' => 'CONTI WASTE WATER',
                                      ),
                                      176 => 
                                      array (
                                        'key' => 'CONTINENTAL STEEL STEAM 250',
                                        'value' => 'CONTINENTAL STEEL STEAM 250',
                                      ),
                                      177 => 
                                      array (
                                        'key' => 'CONTRACTOR 4001',
                                        'value' => 'CONTRACTOR 4001',
                                      ),
                                      178 => 
                                      array (
                                        'key' => 'CONTRACTOR WATER S&D',
                                        'value' => 'CONTRACTOR WATER S&D',
                                      ),
                                      179 => 
                                      array (
                                        'key' => 'CONTRACTOR\'S WATER',
                                        'value' => 'CONTRACTOR\'S WATER',
                                      ),
                                      180 => 
                                      array (
                                        'key' => 'COOLING WATER',
                                        'value' => 'COOLING WATER',
                                      ),
                                      181 => 
                                      array (
                                        'key' => 'COOLING WATER 2.0',
                                        'value' => 'COOLING WATER 2.0',
                                      ),
                                      182 => 
                                      array (
                                        'key' => 'CPE DISCHARGE',
                                        'value' => 'CPE DISCHARGE',
                                      ),
                                      183 => 
                                      array (
                                        'key' => 'CREE BREWERS HOSE',
                                        'value' => 'CREE BREWERS HOSE',
                                      ),
                                      184 => 
                                      array (
                                        'key' => 'CULVERT',
                                        'value' => 'CULVERT',
                                      ),
                                      185 => 
                                      array (
                                        'key' => 'DAMPF TRIX 5000',
                                        'value' => 'DAMPF TRIX 5000',
                                      ),
                                      186 => 
                                      array (
                                        'key' => 'DAMPF TRIX 6000',
                                        'value' => 'DAMPF TRIX 6000',
                                      ),
                                      187 => 
                                      array (
                                        'key' => 'DARCY REDWING FUEL OIL',
                                        'value' => 'DARCY REDWING FUEL OIL',
                                      ),
                                      188 => 
                                      array (
                                        'key' => 'DEADMAN AIRCRAFT REFUELING',
                                        'value' => 'DEADMAN AIRCRAFT REFUELING',
                                      ),
                                      189 => 
                                      array (
                                        'key' => 'DEADMAN SANDBLAST',
                                        'value' => 'DEADMAN SANDBLAST',
                                      ),
                                      190 => 
                                      array (
                                        'key' => 'DEERE',
                                        'value' => 'DEERE',
                                      ),
                                      191 => 
                                      array (
                                        'key' => 'DEF DISPENSING',
                                        'value' => 'DEF DISPENSING',
                                      ),
                                      192 => 
                                      array (
                                        'key' => 'DEF TRANSFER',
                                        'value' => 'DEF TRANSFER',
                                      ),
                                      193 => 
                                      array (
                                        'key' => 'DEL TWIN-LINE GRADE R',
                                        'value' => 'DEL TWIN-LINE GRADE R',
                                      ),
                                      194 => 
                                      array (
                                        'key' => 'DEL TWIN-LINE GRADE RM',
                                        'value' => 'DEL TWIN-LINE GRADE RM',
                                      ),
                                      195 => 
                                      array (
                                        'key' => 'DENVER',
                                        'value' => 'DENVER',
                                      ),
                                      196 => 
                                      array (
                                        'key' => 'DENVER CONC VIBR',
                                        'value' => 'DENVER CONC VIBR',
                                      ),
                                      197 => 
                                      array (
                                        'key' => 'DESERT DR16SC',
                                        'value' => 'DESERT DR16SC',
                                      ),
                                      198 => 
                                      array (
                                        'key' => 'DESERT DR1SN',
                                        'value' => 'DESERT DR1SN',
                                      ),
                                      199 => 
                                      array (
                                        'key' => 'DESERT DR2SN',
                                        'value' => 'DESERT DR2SN',
                                      ),
                                      200 => 
                                      array (
                                        'key' => 'DESERT DR5',
                                        'value' => 'DESERT DR5',
                                      ),
                                      201 => 
                                      array (
                                        'key' => 'DESERT DUT',
                                        'value' => 'DESERT DUT',
                                      ),
                                      202 => 
                                      array (
                                        'key' => 'DEWATERING',
                                        'value' => 'DEWATERING',
                                      ),
                                      203 => 
                                      array (
                                        'key' => 'DIESEL OIL HARDWALL',
                                        'value' => 'DIESEL OIL HARDWALL',
                                      ),
                                      204 => 
                                      array (
                                        'key' => 'DIESEL OIL SOFTWALL',
                                        'value' => 'DIESEL OIL SOFTWALL',
                                      ),
                                      205 => 
                                      array (
                                        'key' => 'DIGESTER',
                                        'value' => 'DIGESTER',
                                      ),
                                      206 => 
                                      array (
                                        'key' => 'DIISOCYANATE',
                                        'value' => 'DIISOCYANATE',
                                      ),
                                      207 => 
                                      array (
                                        'key' => 'DINGA HOT WATER GUN',
                                        'value' => 'DINGA HOT WATER GUN',
                                      ),
                                      208 => 
                                      array (
                                        'key' => 'DISCHARGE',
                                        'value' => 'DISCHARGE',
                                      ),
                                      209 => 
                                      array (
                                        'key' => 'DISHWASHER DRAIN',
                                        'value' => 'DISHWASHER DRAIN',
                                      ),
                                      210 => 
                                      array (
                                        'key' => 'DISTILLERY 150',
                                        'value' => 'DISTILLERY 150',
                                      ),
                                      211 => 
                                      array (
                                        'key' => 'DISTRB ACID',
                                        'value' => 'DISTRB ACID',
                                      ),
                                      212 => 
                                      array (
                                        'key' => 'DISTRB ARCTIC ORTAC',
                                        'value' => 'DISTRB ARCTIC ORTAC',
                                      ),
                                      213 => 
                                      array (
                                        'key' => 'DISTRB STEEL AIR',
                                        'value' => 'DISTRB STEEL AIR',
                                      ),
                                      214 => 
                                      array (
                                        'key' => 'DISTRB WATER S&D',
                                        'value' => 'DISTRB WATER S&D',
                                      ),
                                      215 => 
                                      array (
                                        'key' => 'DIVERSIFLEX',
                                        'value' => 'DIVERSIFLEX',
                                      ),
                                      216 => 
                                      array (
                                        'key' => 'DIVERSIPIPE',
                                        'value' => 'DIVERSIPIPE',
                                      ),
                                      217 => 
                                      array (
                                        'key' => 'DIVING HOSE',
                                        'value' => 'DIVING HOSE',
                                      ),
                                      218 => 
                                      array (
                                        'key' => 'DMC CAUSTIC',
                                        'value' => 'DMC CAUSTIC',
                                      ),
                                      219 => 
                                      array (
                                        'key' => 'DOCK',
                                        'value' => 'DOCK',
                                      ),
                                      220 => 
                                      array (
                                        'key' => 'DOCK EN1765 L15',
                                        'value' => 'DOCK EN1765 L15',
                                      ),
                                      221 => 
                                      array (
                                        'key' => 'DOCK EN1765 S15',
                                        'value' => 'DOCK EN1765 S15',
                                      ),
                                      222 => 
                                      array (
                                        'key' => 'DOCK FDA',
                                        'value' => 'DOCK FDA',
                                      ),
                                      223 => 
                                      array (
                                        'key' => 'DOCK SMOOTH BORE HOT SULFUR',
                                        'value' => 'DOCK SMOOTH BORE HOT SULFUR',
                                      ),
                                      224 => 
                                      array (
                                        'key' => 'DOCK SUPPLY SW',
                                        'value' => 'DOCK SUPPLY SW',
                                      ),
                                      225 => 
                                      array (
                                        'key' => 'DREDGE SLEEVE',
                                        'value' => 'DREDGE SLEEVE',
                                      ),
                                      226 => 
                                      array (
                                        'key' => 'DRILL WATER',
                                        'value' => 'DRILL WATER',
                                      ),
                                      227 => 
                                      array (
                                        'key' => 'DRINKLINE',
                                        'value' => 'DRINKLINE',
                                      ),
                                      228 => 
                                      array (
                                        'key' => 'DRY CEMENT HD HARDWALL',
                                        'value' => 'DRY CEMENT HD HARDWALL',
                                      ),
                                      229 => 
                                      array (
                                        'key' => 'DRY CEMENT SOFTWALL',
                                        'value' => 'DRY CEMENT SOFTWALL',
                                      ),
                                      230 => 
                                      array (
                                        'key' => 'DRY ICE HOSE',
                                        'value' => 'DRY ICE HOSE',
                                      ),
                                      231 => 
                                      array (
                                        'key' => 'DUDLEY WATER',
                                        'value' => 'DUDLEY WATER',
                                      ),
                                      232 => 
                                      array (
                                        'key' => 'DUNLOP BOOSTER',
                                        'value' => 'DUNLOP BOOSTER',
                                      ),
                                      233 => 
                                      array (
                                        'key' => 'DURACO',
                                        'value' => 'DURACO',
                                      ),
                                      234 => 
                                      array (
                                        'key' => 'DURACO ROADPATCH',
                                        'value' => 'DURACO ROADPATCH',
                                      ),
                                      235 => 
                                      array (
                                        'key' => 'DYNACRAFT',
                                        'value' => 'DYNACRAFT',
                                      ),
                                      236 => 
                                      array (
                                        'key' => 'DYNO',
                                        'value' => 'DYNO',
                                      ),
                                      237 => 
                                      array (
                                        'key' => 'DYNO HOSE',
                                        'value' => 'DYNO HOSE',
                                      ),
                                      238 => 
                                      array (
                                        'key' => 'E 1-1',
                                        'value' => 'E 1-1',
                                      ),
                                      239 => 
                                      array (
                                        'key' => 'E 3-1',
                                        'value' => 'E 3-1',
                                      ),
                                      240 => 
                                      array (
                                        'key' => 'E 3-2',
                                        'value' => 'E 3-2',
                                      ),
                                      241 => 
                                      array (
                                        'key' => 'EAGLE AIR & WATER',
                                        'value' => 'EAGLE AIR & WATER',
                                      ),
                                      242 => 
                                      array (
                                        'key' => 'EHLYNN',
                                        'value' => 'EHLYNN',
                                      ),
                                      243 => 
                                      array (
                                        'key' => 'EHLYNN FLOUR TEC',
                                        'value' => 'EHLYNN FLOUR TEC',
                                      ),
                                      244 => 
                                      array (
                                        'key' => 'EHLYNN FOOD DISCHARGE',
                                        'value' => 'EHLYNN FOOD DISCHARGE',
                                      ),
                                      245 => 
                                      array (
                                        'key' => 'EHLYNN HOT AIR',
                                        'value' => 'EHLYNN HOT AIR',
                                      ),
                                      246 => 
                                      array (
                                        'key' => 'EHLYNN PIPE CONNECTOR',
                                        'value' => 'EHLYNN PIPE CONNECTOR',
                                      ),
                                      247 => 
                                      array (
                                        'key' => 'EHLYNN TPG',
                                        'value' => 'EHLYNN TPG',
                                      ),
                                      248 => 
                                      array (
                                        'key' => 'ELAFLEX LAY FLAT',
                                        'value' => 'ELAFLEX LAY FLAT',
                                      ),
                                      249 => 
                                      array (
                                        'key' => 'ELITE STANDARD RADIATOR',
                                        'value' => 'ELITE STANDARD RADIATOR',
                                      ),
                                      250 => 
                                      array (
                                        'key' => 'ELITE SW MARINE WET EXHAUST',
                                        'value' => 'ELITE SW MARINE WET EXHAUST',
                                      ),
                                      251 => 
                                      array (
                                        'key' => 'EN12115 PETROLEUM',
                                        'value' => 'EN12115 PETROLEUM',
                                      ),
                                      252 => 
                                      array (
                                        'key' => 'EPDM 200',
                                        'value' => 'EPDM 200',
                                      ),
                                      253 => 
                                      array (
                                        'key' => 'EPDM 200 (ECONOMY)',
                                        'value' => 'EPDM 200 (ECONOMY)',
                                      ),
                                      254 => 
                                      array (
                                        'key' => 'EPDM 200 (NON CON)',
                                        'value' => 'EPDM 200 (NON CON)',
                                      ),
                                      255 => 
                                      array (
                                        'key' => 'EPDM ACID',
                                        'value' => 'EPDM ACID',
                                      ),
                                      256 => 
                                      array (
                                        'key' => 'EPDM DISCHARGE',
                                        'value' => 'EPDM DISCHARGE',
                                      ),
                                      257 => 
                                      array (
                                        'key' => 'EPDM S&D',
                                        'value' => 'EPDM S&D',
                                      ),
                                      258 => 
                                      array (
                                        'key' => 'EPDM SD HD WATER',
                                        'value' => 'EPDM SD HD WATER',
                                      ),
                                      259 => 
                                      array (
                                        'key' => 'EPDM SD WATER',
                                        'value' => 'EPDM SD WATER',
                                      ),
                                      260 => 
                                      array (
                                        'key' => 'ERGON',
                                        'value' => 'ERGON',
                                      ),
                                      261 => 
                                      array (
                                        'key' => 'ERIKS',
                                        'value' => 'ERIKS',
                                      ),
                                      262 => 
                                      array (
                                        'key' => 'EURO TRIX',
                                        'value' => 'EURO TRIX',
                                      ),
                                      263 => 
                                      array (
                                        'key' => 'EXIMCO',
                                        'value' => 'EXIMCO',
                                      ),
                                      264 => 
                                      array (
                                        'key' => 'EXON GP DOCK',
                                        'value' => 'EXON GP DOCK',
                                      ),
                                      265 => 
                                      array (
                                        'key' => 'EXPRESS BLOWER',
                                        'value' => 'EXPRESS BLOWER',
                                      ),
                                      266 => 
                                      array (
                                        'key' => 'EXSTATIC',
                                        'value' => 'EXSTATIC',
                                      ),
                                      267 => 
                                      array (
                                        'key' => 'EXTREMEBLAST LOAD',
                                        'value' => 'EXTREMEBLAST LOAD',
                                      ),
                                      268 => 
                                      array (
                                        'key' => 'EXTREMEFLEX BEVERAGE',
                                        'value' => 'EXTREMEFLEX BEVERAGE',
                                      ),
                                      269 => 
                                      array (
                                        'key' => 'EXTREMEFLEX CHEMICAL BROWN',
                                        'value' => 'EXTREMEFLEX CHEMICAL BROWN',
                                      ),
                                      270 => 
                                      array (
                                        'key' => 'EXTREMEFLEX CHEMICAL PURPLE',
                                        'value' => 'EXTREMEFLEX CHEMICAL PURPLE',
                                      ),
                                      271 => 
                                      array (
                                        'key' => 'EXTREMEFLEX FOOD BLUE',
                                        'value' => 'EXTREMEFLEX FOOD BLUE',
                                      ),
                                      272 => 
                                      array (
                                        'key' => 'EXTREMEFLEX FOOD GRAY',
                                        'value' => 'EXTREMEFLEX FOOD GRAY',
                                      ),
                                      273 => 
                                      array (
                                        'key' => 'EXTREMEFLEX PETROLEUM',
                                        'value' => 'EXTREMEFLEX PETROLEUM',
                                      ),
                                      274 => 
                                      array (
                                        'key' => 'EXTREMEFLEX POTABLE WATER',
                                        'value' => 'EXTREMEFLEX POTABLE WATER',
                                      ),
                                      275 => 
                                      array (
                                        'key' => 'EXTREMEFLEX VERSIFLO',
                                        'value' => 'EXTREMEFLEX VERSIFLO',
                                      ),
                                      276 => 
                                      array (
                                        'key' => 'EXTREMEFLEX WATER SLURRY',
                                        'value' => 'EXTREMEFLEX WATER SLURRY',
                                      ),
                                      277 => 
                                      array (
                                        'key' => 'EZ GLIDE WINE',
                                        'value' => 'EZ GLIDE WINE',
                                      ),
                                      278 => 
                                      array (
                                        'key' => 'F5 AIR',
                                        'value' => 'F5 AIR',
                                      ),
                                      279 => 
                                      array (
                                        'key' => 'FABCHEM',
                                        'value' => 'FABCHEM',
                                      ),
                                      280 => 
                                      array (
                                        'key' => 'FABCHEM ARC',
                                        'value' => 'FABCHEM ARC',
                                      ),
                                      281 => 
                                      array (
                                        'key' => 'FABCHEM EN12115',
                                        'value' => 'FABCHEM EN12115',
                                      ),
                                      282 => 
                                      array (
                                        'key' => 'FABCHEM-C',
                                        'value' => 'FABCHEM-C',
                                      ),
                                      283 => 
                                      array (
                                        'key' => 'FIBERG CRUCIBLE GASK',
                                        'value' => 'FIBERG CRUCIBLE GASK',
                                      ),
                                      284 => 
                                      array (
                                        'key' => 'FINISHING BRANDS',
                                        'value' => 'FINISHING BRANDS',
                                      ),
                                      285 => 
                                      array (
                                        'key' => 'FIRE ENGINE BOOSTER',
                                        'value' => 'FIRE ENGINE BOOSTER',
                                      ),
                                      286 => 
                                      array (
                                        'key' => 'FIRE ENGINE SUCTION',
                                        'value' => 'FIRE ENGINE SUCTION',
                                      ),
                                      287 => 
                                      array (
                                        'key' => 'FIRE ENGINER BOOSTER',
                                        'value' => 'FIRE ENGINER BOOSTER',
                                      ),
                                      288 => 
                                      array (
                                        'key' => 'FISH HOSE',
                                        'value' => 'FISH HOSE',
                                      ),
                                      289 => 
                                      array (
                                        'key' => 'FISH TRANSFER',
                                        'value' => 'FISH TRANSFER',
                                      ),
                                      290 => 
                                      array (
                                        'key' => 'FLDCON',
                                        'value' => 'FLDCON',
                                      ),
                                      291 => 
                                      array (
                                        'key' => 'FLEX-ING FLEX AQUA WATER S&D',
                                        'value' => 'FLEX-ING FLEX AQUA WATER S&D',
                                      ),
                                      292 => 
                                      array (
                                        'key' => 'FLEX-ING FLEX-ON',
                                        'value' => 'FLEX-ING FLEX-ON',
                                      ),
                                      293 => 
                                      array (
                                        'key' => 'FLEX-PULSE FPII',
                                        'value' => 'FLEX-PULSE FPII',
                                      ),
                                      294 => 
                                      array (
                                        'key' => 'FLEXAGRIP',
                                        'value' => 'FLEXAGRIP',
                                      ),
                                      295 => 
                                      array (
                                        'key' => 'FLEXCHEM 225',
                                        'value' => 'FLEXCHEM 225',
                                      ),
                                      296 => 
                                      array (
                                        'key' => 'FLEXDOCK',
                                        'value' => 'FLEXDOCK',
                                      ),
                                      297 => 
                                      array (
                                        'key' => 'FLEXDOCK VERSAFUEL',
                                        'value' => 'FLEXDOCK VERSAFUEL',
                                      ),
                                      298 => 
                                      array (
                                        'key' => 'FLEXIBLE DOWNSPOUT',
                                        'value' => 'FLEXIBLE DOWNSPOUT',
                                      ),
                                      299 => 
                                      array (
                                        'key' => 'FLEXIBLE TEFLON',
                                        'value' => 'FLEXIBLE TEFLON',
                                      ),
                                      300 => 
                                      array (
                                        'key' => 'FLEXICORE',
                                        'value' => 'FLEXICORE',
                                      ),
                                      301 => 
                                      array (
                                        'key' => 'FLEXJET',
                                        'value' => 'FLEXJET',
                                      ),
                                      302 => 
                                      array (
                                        'key' => 'FLEXRITE',
                                        'value' => 'FLEXRITE',
                                      ),
                                      303 => 
                                      array (
                                        'key' => 'FLEXSHIELD SAE J1527 TYPE A1-15',
                                        'value' => 'FLEXSHIELD SAE J1527 TYPE A1-15',
                                      ),
                                      304 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 CB EXTREME CRIMP',
                                        'value' => 'FLEXSTEEL 250 CB EXTREME CRIMP',
                                      ),
                                      305 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 CB STEAM',
                                        'value' => 'FLEXSTEEL 250 CB STEAM',
                                      ),
                                      306 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 EPDM-20',
                                        'value' => 'FLEXSTEEL 250 EPDM-20',
                                      ),
                                      307 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 ORS STEAM',
                                        'value' => 'FLEXSTEEL 250 ORS STEAM',
                                      ),
                                      308 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 STEAM',
                                        'value' => 'FLEXSTEEL 250 STEAM',
                                      ),
                                      309 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA',
                                        'value' => 'FLEXSTEEL FUTURA',
                                      ),
                                      310 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA B20',
                                        'value' => 'FLEXSTEEL FUTURA B20',
                                      ),
                                      311 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA E25',
                                        'value' => 'FLEXSTEEL FUTURA E25',
                                      ),
                                      312 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA ETHAN-ALL',
                                        'value' => 'FLEXSTEEL FUTURA ETHAN-ALL',
                                      ),
                                      313 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA HVR',
                                        'value' => 'FLEXSTEEL FUTURA HVR',
                                      ),
                                      314 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA HVR LOW PERM',
                                        'value' => 'FLEXSTEEL FUTURA HVR LOW PERM',
                                      ),
                                      315 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA LOW PERM',
                                        'value' => 'FLEXSTEEL FUTURA LOW PERM',
                                      ),
                                      316 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA VAPOR ASSIST',
                                        'value' => 'FLEXSTEEL FUTURA VAPOR ASSIST',
                                      ),
                                      317 => 
                                      array (
                                        'key' => 'FLEXSTEEL MINE SPRAY',
                                        'value' => 'FLEXSTEEL MINE SPRAY',
                                      ),
                                      318 => 
                                      array (
                                        'key' => 'FLEXSTEEL MINESPRAY',
                                        'value' => 'FLEXSTEEL MINESPRAY',
                                      ),
                                      319 => 
                                      array (
                                        'key' => 'FLEXSTEEL SERVICE STATION AIR',
                                        'value' => 'FLEXSTEEL SERVICE STATION AIR',
                                      ),
                                      320 => 
                                      array (
                                        'key' => 'FLEXTRA DRY MATERIAL',
                                        'value' => 'FLEXTRA DRY MATERIAL',
                                      ),
                                      321 => 
                                      array (
                                        'key' => 'FLEXTRA LT',
                                        'value' => 'FLEXTRA LT',
                                      ),
                                      322 => 
                                      array (
                                        'key' => 'FLEXTRA OILFIELD',
                                        'value' => 'FLEXTRA OILFIELD',
                                      ),
                                      323 => 
                                      array (
                                        'key' => 'FLEXTRA ROCK DUST',
                                        'value' => 'FLEXTRA ROCK DUST',
                                      ),
                                      324 => 
                                      array (
                                        'key' => 'FLEXWAC',
                                        'value' => 'FLEXWAC',
                                      ),
                                      325 => 
                                      array (
                                        'key' => 'FLEXWING FOOD BLUE',
                                        'value' => 'FLEXWING FOOD BLUE',
                                      ),
                                      326 => 
                                      array (
                                        'key' => 'FLEXWING OILFIELD',
                                        'value' => 'FLEXWING OILFIELD',
                                      ),
                                      327 => 
                                      array (
                                        'key' => 'FLEXWING PETROLEUM',
                                        'value' => 'FLEXWING PETROLEUM',
                                      ),
                                      328 => 
                                      array (
                                        'key' => 'FLEXWING VERSAFUEL',
                                        'value' => 'FLEXWING VERSAFUEL',
                                      ),
                                      329 => 
                                      array (
                                        'key' => 'FLEXWING WATER S&D',
                                        'value' => 'FLEXWING WATER S&D',
                                      ),
                                      330 => 
                                      array (
                                        'key' => 'FLOATER',
                                        'value' => 'FLOATER',
                                      ),
                                      331 => 
                                      array (
                                        'key' => 'FLOATING HOSES',
                                        'value' => 'FLOATING HOSES',
                                      ),
                                      332 => 
                                      array (
                                        'key' => 'FLOUR DISCHARGE',
                                        'value' => 'FLOUR DISCHARGE',
                                      ),
                                      333 => 
                                      array (
                                        'key' => 'FLUOROPAL',
                                        'value' => 'FLUOROPAL',
                                      ),
                                      334 => 
                                      array (
                                        'key' => 'FOAM',
                                        'value' => 'FOAM',
                                      ),
                                      335 => 
                                      array (
                                        'key' => 'FOOD 2720',
                                        'value' => 'FOOD 2720',
                                      ),
                                      336 => 
                                      array (
                                        'key' => 'FOOD DISCHARGE',
                                        'value' => 'FOOD DISCHARGE',
                                      ),
                                      337 => 
                                      array (
                                        'key' => 'FOOD FLEX',
                                        'value' => 'FOOD FLEX',
                                      ),
                                      338 => 
                                      array (
                                        'key' => 'FOOD SUCTION & DISCHARGE',
                                        'value' => 'FOOD SUCTION & DISCHARGE',
                                      ),
                                      339 => 
                                      array (
                                        'key' => 'FOODCLEAN',
                                        'value' => 'FOODCLEAN',
                                      ),
                                      340 => 
                                      array (
                                        'key' => 'FOODLINER',
                                        'value' => 'FOODLINER',
                                      ),
                                      341 => 
                                      array (
                                        'key' => 'FORECAST BLAST',
                                        'value' => 'FORECAST BLAST',
                                      ),
                                      342 => 
                                      array (
                                        'key' => 'FORECAST BLAST XF',
                                        'value' => 'FORECAST BLAST XF',
                                      ),
                                      343 => 
                                      array (
                                        'key' => 'FORECAST SUCTION',
                                        'value' => 'FORECAST SUCTION',
                                      ),
                                      344 => 
                                      array (
                                        'key' => 'FORESTRY',
                                        'value' => 'FORESTRY',
                                      ),
                                      345 => 
                                      array (
                                        'key' => 'FORMADRAIN INFLATABLE HOSE',
                                        'value' => 'FORMADRAIN INFLATABLE HOSE',
                                      ),
                                      346 => 
                                      array (
                                        'key' => 'FORTRESS',
                                        'value' => 'FORTRESS',
                                      ),
                                      347 => 
                                      array (
                                        'key' => 'FOSTER',
                                        'value' => 'FOSTER',
                                      ),
                                      348 => 
                                      array (
                                        'key' => 'FRAC',
                                        'value' => 'FRAC',
                                      ),
                                      349 => 
                                      array (
                                        'key' => 'FRAC ACID S&D',
                                        'value' => 'FRAC ACID S&D',
                                      ),
                                      350 => 
                                      array (
                                        'key' => 'FRAC BLENDING S&D',
                                        'value' => 'FRAC BLENDING S&D',
                                      ),
                                      351 => 
                                      array (
                                        'key' => 'FRACO',
                                        'value' => 'FRACO',
                                      ),
                                      352 => 
                                      array (
                                        'key' => 'FREON CHARGING',
                                        'value' => 'FREON CHARGING',
                                      ),
                                      353 => 
                                      array (
                                        'key' => 'FRIG SEA',
                                        'value' => 'FRIG SEA',
                                      ),
                                      354 => 
                                      array (
                                        'key' => 'FRONTIER',
                                        'value' => 'FRONTIER',
                                      ),
                                      355 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE',
                                        'value' => 'FUEL DISCHARGE',
                                      ),
                                      356 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE HD',
                                        'value' => 'FUEL DISCHARGE HD',
                                      ),
                                      357 => 
                                      array (
                                        'key' => 'FUEL FILL SAE J1527 TYPE A2',
                                        'value' => 'FUEL FILL SAE J1527 TYPE A2',
                                      ),
                                      358 => 
                                      array (
                                        'key' => 'FUEL RIG SW',
                                        'value' => 'FUEL RIG SW',
                                      ),
                                      359 => 
                                      array (
                                        'key' => 'FUELGRIP COUPLING',
                                        'value' => 'FUELGRIP COUPLING',
                                      ),
                                      360 => 
                                      array (
                                        'key' => 'FUGGITT',
                                        'value' => 'FUGGITT',
                                      ),
                                      361 => 
                                      array (
                                        'key' => 'FUJI',
                                        'value' => 'FUJI',
                                      ),
                                      362 => 
                                      array (
                                        'key' => 'FURNACE DOOR',
                                        'value' => 'FURNACE DOOR',
                                      ),
                                      363 => 
                                      array (
                                        'key' => 'FUTURA O-RING KIT',
                                        'value' => 'FUTURA O-RING KIT',
                                      ),
                                      364 => 
                                      array (
                                        'key' => 'FUTURA RET RING INST. TOOL',
                                        'value' => 'FUTURA RET RING INST. TOOL',
                                      ),
                                      365 => 
                                      array (
                                        'key' => 'GALAXY G4826',
                                        'value' => 'GALAXY G4826',
                                      ),
                                      366 => 
                                      array (
                                        'key' => 'GALAXY G4867',
                                        'value' => 'GALAXY G4867',
                                      ),
                                      367 => 
                                      array (
                                        'key' => 'GALAXY G4890',
                                        'value' => 'GALAXY G4890',
                                      ),
                                      368 => 
                                      array (
                                        'key' => 'GALVANATOR',
                                        'value' => 'GALVANATOR',
                                      ),
                                      369 => 
                                      array (
                                        'key' => 'GAMMON',
                                        'value' => 'GAMMON',
                                      ),
                                      370 => 
                                      array (
                                        'key' => 'GAUNTLET',
                                        'value' => 'GAUNTLET',
                                      ),
                                      371 => 
                                      array (
                                        'key' => 'GENERIC',
                                        'value' => 'GENERIC',
                                      ),
                                      372 => 
                                      array (
                                        'key' => 'GENERIC LOW TEMP TANK TRUCK',
                                        'value' => 'GENERIC LOW TEMP TANK TRUCK',
                                      ),
                                      373 => 
                                      array (
                                        'key' => 'GENERIC PLASTER & GROUT',
                                        'value' => 'GENERIC PLASTER & GROUT',
                                      ),
                                      374 => 
                                      array (
                                        'key' => 'GENERIC VACUUM',
                                        'value' => 'GENERIC VACUUM',
                                      ),
                                      375 => 
                                      array (
                                        'key' => 'GENERIC WATER DISCHARGE',
                                        'value' => 'GENERIC WATER DISCHARGE',
                                      ),
                                      376 => 
                                      array (
                                        'key' => 'GENERIC WATER S&D',
                                        'value' => 'GENERIC WATER S&D',
                                      ),
                                      377 => 
                                      array (
                                        'key' => 'GENLINE',
                                        'value' => 'GENLINE',
                                      ),
                                      378 => 
                                      array (
                                        'key' => 'GENLINE GL',
                                        'value' => 'GENLINE GL',
                                      ),
                                      379 => 
                                      array (
                                        'key' => 'GENLINE GL-802',
                                        'value' => 'GENLINE GL-802',
                                      ),
                                      380 => 
                                      array (
                                        'key' => 'GENLINE GL-803',
                                        'value' => 'GENLINE GL-803',
                                      ),
                                      381 => 
                                      array (
                                        'key' => 'GHX',
                                        'value' => 'GHX',
                                      ),
                                      382 => 
                                      array (
                                        'key' => 'GILBARCO',
                                        'value' => 'GILBARCO',
                                      ),
                                      383 => 
                                      array (
                                        'key' => 'GLOBAL',
                                        'value' => 'GLOBAL',
                                      ),
                                      384 => 
                                      array (
                                        'key' => 'GNSPEC',
                                        'value' => 'GNSPEC',
                                      ),
                                      385 => 
                                      array (
                                        'key' => 'GNSPEC 100R12',
                                        'value' => 'GNSPEC 100R12',
                                      ),
                                      386 => 
                                      array (
                                        'key' => 'GNSPEC 100R16',
                                        'value' => 'GNSPEC 100R16',
                                      ),
                                      387 => 
                                      array (
                                        'key' => 'GNSPEC 100R2',
                                        'value' => 'GNSPEC 100R2',
                                      ),
                                      388 => 
                                      array (
                                        'key' => 'GNSPEC 100R6',
                                        'value' => 'GNSPEC 100R6',
                                      ),
                                      389 => 
                                      array (
                                        'key' => 'GNSPEC 200 AIR',
                                        'value' => 'GNSPEC 200 AIR',
                                      ),
                                      390 => 
                                      array (
                                        'key' => 'GNSPEC 250 AIR',
                                        'value' => 'GNSPEC 250 AIR',
                                      ),
                                      391 => 
                                      array (
                                        'key' => 'GNSPEC 300 AIR',
                                        'value' => 'GNSPEC 300 AIR',
                                      ),
                                      392 => 
                                      array (
                                        'key' => 'GNSPEC 4001 PRESSURE WASHER',
                                        'value' => 'GNSPEC 4001 PRESSURE WASHER',
                                      ),
                                      393 => 
                                      array (
                                        'key' => 'GNSPEC 4500 PRESSURE WASHER',
                                        'value' => 'GNSPEC 4500 PRESSURE WASHER',
                                      ),
                                      394 => 
                                      array (
                                        'key' => 'GNSPEC NR SPRAY',
                                        'value' => 'GNSPEC NR SPRAY',
                                      ),
                                      395 => 
                                      array (
                                        'key' => 'GNSPEC PUSH ON 250',
                                        'value' => 'GNSPEC PUSH ON 250',
                                      ),
                                      396 => 
                                      array (
                                        'key' => 'GOLD SNAKE',
                                        'value' => 'GOLD SNAKE',
                                      ),
                                      397 => 
                                      array (
                                        'key' => 'GOOD FLEX',
                                        'value' => 'GOOD FLEX',
                                      ),
                                      398 => 
                                      array (
                                        'key' => 'GOODALL',
                                        'value' => 'GOODALL',
                                      ),
                                      399 => 
                                      array (
                                        'key' => 'GORILLA',
                                        'value' => 'GORILLA',
                                      ),
                                      400 => 
                                      array (
                                        'key' => 'GRACO',
                                        'value' => 'GRACO',
                                      ),
                                      401 => 
                                      array (
                                        'key' => 'GRAINGER',
                                        'value' => 'GRAINGER',
                                      ),
                                      402 => 
                                      array (
                                        'key' => 'GRAY FLEXTRA LT',
                                        'value' => 'GRAY FLEXTRA LT',
                                      ),
                                      403 => 
                                      array (
                                        'key' => 'GRAY FLEXWING',
                                        'value' => 'GRAY FLEXWING',
                                      ),
                                      404 => 
                                      array (
                                        'key' => 'GRAY FOOD',
                                        'value' => 'GRAY FOOD',
                                      ),
                                      405 => 
                                      array (
                                        'key' => 'GRAY SUCTION',
                                        'value' => 'GRAY SUCTION',
                                      ),
                                      406 => 
                                      array (
                                        'key' => 'GREASE GUN HOSE',
                                        'value' => 'GREASE GUN HOSE',
                                      ),
                                      407 => 
                                      array (
                                        'key' => 'GREAT NECK',
                                        'value' => 'GREAT NECK',
                                      ),
                                      408 => 
                                      array (
                                        'key' => 'GREAT PLAINS',
                                        'value' => 'GREAT PLAINS',
                                      ),
                                      409 => 
                                      array (
                                        'key' => 'GREEN HORNET XF',
                                        'value' => 'GREEN HORNET XF',
                                      ),
                                      410 => 
                                      array (
                                        'key' => 'GUNITE',
                                        'value' => 'GUNITE',
                                      ),
                                      411 => 
                                      array (
                                        'key' => 'HAMILTON BLAST',
                                        'value' => 'HAMILTON BLAST',
                                      ),
                                      412 => 
                                      array (
                                        'key' => 'HAMILTON HYDROCARBON DRAIN',
                                        'value' => 'HAMILTON HYDROCARBON DRAIN',
                                      ),
                                      413 => 
                                      array (
                                        'key' => 'HANLIO TWIN-LINE GRADE R',
                                        'value' => 'HANLIO TWIN-LINE GRADE R',
                                      ),
                                      414 => 
                                      array (
                                        'key' => 'HART',
                                        'value' => 'HART',
                                      ),
                                      415 => 
                                      array (
                                        'key' => 'HART BLACK SOFTWALL',
                                        'value' => 'HART BLACK SOFTWALL',
                                      ),
                                      416 => 
                                      array (
                                        'key' => 'HART FABCHEM',
                                        'value' => 'HART FABCHEM',
                                      ),
                                      417 => 
                                      array (
                                        'key' => 'HART FLOUR DISCHARGE',
                                        'value' => 'HART FLOUR DISCHARGE',
                                      ),
                                      418 => 
                                      array (
                                        'key' => 'HART HOT AIR',
                                        'value' => 'HART HOT AIR',
                                      ),
                                      419 => 
                                      array (
                                        'key' => 'HARVEST',
                                        'value' => 'HARVEST',
                                      ),
                                      420 => 
                                      array (
                                        'key' => 'HD AIR',
                                        'value' => 'HD AIR',
                                      ),
                                      421 => 
                                      array (
                                        'key' => 'HD AIR & WATER',
                                        'value' => 'HD AIR & WATER',
                                      ),
                                      422 => 
                                      array (
                                        'key' => 'HD INDUSTRIAL VACUUM',
                                        'value' => 'HD INDUSTRIAL VACUUM',
                                      ),
                                      423 => 
                                      array (
                                        'key' => 'HD PETRO TRANSFER',
                                        'value' => 'HD PETRO TRANSFER',
                                      ),
                                      424 => 
                                      array (
                                        'key' => 'HD VACUUM',
                                        'value' => 'HD VACUUM',
                                      ),
                                      425 => 
                                      array (
                                        'key' => 'HD WATER DISCHARGE',
                                        'value' => 'HD WATER DISCHARGE',
                                      ),
                                      426 => 
                                      array (
                                        'key' => 'HD WATER SD',
                                        'value' => 'HD WATER SD',
                                      ),
                                      427 => 
                                      array (
                                        'key' => 'HEATER HOSE 20R3D2',
                                        'value' => 'HEATER HOSE 20R3D2',
                                      ),
                                      428 => 
                                      array (
                                        'key' => 'HEATER WATER',
                                        'value' => 'HEATER WATER',
                                      ),
                                      429 => 
                                      array (
                                        'key' => 'HEAVY DUTY STEAM PILE DRIVER',
                                        'value' => 'HEAVY DUTY STEAM PILE DRIVER',
                                      ),
                                      430 => 
                                      array (
                                        'key' => 'HEWITT',
                                        'value' => 'HEWITT',
                                      ),
                                      431 => 
                                      array (
                                        'key' => 'HEWITT AIRCRAFT',
                                        'value' => 'HEWITT AIRCRAFT',
                                      ),
                                      432 => 
                                      array (
                                        'key' => 'HI-MINER II',
                                        'value' => 'HI-MINER II',
                                      ),
                                      433 => 
                                      array (
                                        'key' => 'HI-PER',
                                        'value' => 'HI-PER',
                                      ),
                                      434 => 
                                      array (
                                        'key' => 'HIPER WATER',
                                        'value' => 'HIPER WATER',
                                      ),
                                      435 => 
                                      array (
                                        'key' => 'HOOSIER FOOD TL',
                                        'value' => 'HOOSIER FOOD TL',
                                      ),
                                      436 => 
                                      array (
                                        'key' => 'HOSCO',
                                        'value' => 'HOSCO',
                                      ),
                                      437 => 
                                      array (
                                        'key' => 'HOSE POWER',
                                        'value' => 'HOSE POWER',
                                      ),
                                      438 => 
                                      array (
                                        'key' => 'HOSEPOWER',
                                        'value' => 'HOSEPOWER',
                                      ),
                                      439 => 
                                      array (
                                        'key' => 'HOT TAR & ASPHALT EN13482',
                                        'value' => 'HOT TAR & ASPHALT EN13482',
                                      ),
                                      440 => 
                                      array (
                                        'key' => 'HOT TAR & ASPHALT ROUGH BORE',
                                        'value' => 'HOT TAR & ASPHALT ROUGH BORE',
                                      ),
                                      441 => 
                                      array (
                                        'key' => 'HOT WATER ELITE',
                                        'value' => 'HOT WATER ELITE',
                                      ),
                                      442 => 
                                      array (
                                        'key' => 'HR4',
                                        'value' => 'HR4',
                                      ),
                                      443 => 
                                      array (
                                        'key' => 'HR6',
                                        'value' => 'HR6',
                                      ),
                                      444 => 
                                      array (
                                        'key' => 'HUDSON',
                                        'value' => 'HUDSON',
                                      ),
                                      445 => 
                                      array (
                                        'key' => 'HUMIDIFIER HOSE',
                                        'value' => 'HUMIDIFIER HOSE',
                                      ),
                                      446 => 
                                      array (
                                        'key' => 'HUSKY',
                                        'value' => 'HUSKY',
                                      ),
                                      447 => 
                                      array (
                                        'key' => 'HVLP NON-CONDUCTIVE',
                                        'value' => 'HVLP NON-CONDUCTIVE',
                                      ),
                                      448 => 
                                      array (
                                        'key' => 'HW DRY CEMENT & BARITES',
                                        'value' => 'HW DRY CEMENT & BARITES',
                                      ),
                                      449 => 
                                      array (
                                        'key' => 'HYDROCARBON DRAIN',
                                        'value' => 'HYDROCARBON DRAIN',
                                      ),
                                      450 => 
                                      array (
                                        'key' => 'HYDROVATOR',
                                        'value' => 'HYDROVATOR',
                                      ),
                                      451 => 
                                      array (
                                        'key' => 'HYDROVATOR PLUS',
                                        'value' => 'HYDROVATOR PLUS',
                                      ),
                                      452 => 
                                      array (
                                        'key' => 'I.R.F.',
                                        'value' => 'I.R.F.',
                                      ),
                                      453 => 
                                      array (
                                        'key' => 'IBM COOLING WATER',
                                        'value' => 'IBM COOLING WATER',
                                      ),
                                      454 => 
                                      array (
                                        'key' => 'IBRS',
                                        'value' => 'IBRS',
                                      ),
                                      455 => 
                                      array (
                                        'key' => 'IBRS SANITARY',
                                        'value' => 'IBRS SANITARY',
                                      ),
                                      456 => 
                                      array (
                                        'key' => 'ICE CUTTER HOSE',
                                        'value' => 'ICE CUTTER HOSE',
                                      ),
                                      457 => 
                                      array (
                                        'key' => 'INERT GAS',
                                        'value' => 'INERT GAS',
                                      ),
                                      458 => 
                                      array (
                                        'key' => 'INET COOLING',
                                        'value' => 'INET COOLING',
                                      ),
                                      459 => 
                                      array (
                                        'key' => 'INFINITY CHEMICAL',
                                        'value' => 'INFINITY CHEMICAL',
                                      ),
                                      460 => 
                                      array (
                                        'key' => 'INFINITY FOOD',
                                        'value' => 'INFINITY FOOD',
                                      ),
                                      461 => 
                                      array (
                                        'key' => 'INFINITY FUEL DROP',
                                        'value' => 'INFINITY FUEL DROP',
                                      ),
                                      462 => 
                                      array (
                                        'key' => 'INFINITY FUEL DROP HD',
                                        'value' => 'INFINITY FUEL DROP HD',
                                      ),
                                      463 => 
                                      array (
                                        'key' => 'INFINITY MILK',
                                        'value' => 'INFINITY MILK',
                                      ),
                                      464 => 
                                      array (
                                        'key' => 'INJECTION COOLANT',
                                        'value' => 'INJECTION COOLANT',
                                      ),
                                      465 => 
                                      array (
                                        'key' => 'INLET HOSE',
                                        'value' => 'INLET HOSE',
                                      ),
                                      466 => 
                                      array (
                                        'key' => 'INSTA-GRIP 250',
                                        'value' => 'INSTA-GRIP 250',
                                      ),
                                      467 => 
                                      array (
                                        'key' => 'INSTA-GRIP 300',
                                        'value' => 'INSTA-GRIP 300',
                                      ),
                                      468 => 
                                      array (
                                        'key' => 'INSTA-GRIP HT',
                                        'value' => 'INSTA-GRIP HT',
                                      ),
                                      469 => 
                                      array (
                                        'key' => 'INSTA-GRIP SP',
                                        'value' => 'INSTA-GRIP SP',
                                      ),
                                      470 => 
                                      array (
                                        'key' => 'INSTA-GRIP TC',
                                        'value' => 'INSTA-GRIP TC',
                                      ),
                                      471 => 
                                      array (
                                        'key' => 'INSTA-LOCK',
                                        'value' => 'INSTA-LOCK',
                                      ),
                                      472 => 
                                      array (
                                        'key' => 'INTERCHEM',
                                        'value' => 'INTERCHEM',
                                      ),
                                      473 => 
                                      array (
                                        'key' => 'INTERM',
                                        'value' => 'INTERM',
                                      ),
                                      474 => 
                                      array (
                                        'key' => 'INTERNATIONAL BELT',
                                        'value' => 'INTERNATIONAL BELT',
                                      ),
                                      475 => 
                                      array (
                                        'key' => 'IRC DRILL WATER',
                                        'value' => 'IRC DRILL WATER',
                                      ),
                                      476 => 
                                      array (
                                        'key' => 'IRPCO',
                                        'value' => 'IRPCO',
                                      ),
                                      477 => 
                                      array (
                                        'key' => 'IRR',
                                        'value' => 'IRR',
                                      ),
                                      478 => 
                                      array (
                                        'key' => 'IRR FLEX JET',
                                        'value' => 'IRR FLEX JET',
                                      ),
                                      479 => 
                                      array (
                                        'key' => 'IRRIGATION BOOT',
                                        'value' => 'IRRIGATION BOOT',
                                      ),
                                      480 => 
                                      array (
                                        'key' => 'ISO 3821',
                                        'value' => 'ISO 3821',
                                      ),
                                      481 => 
                                      array (
                                        'key' => 'ISO 8031',
                                        'value' => 'ISO 8031',
                                      ),
                                      482 => 
                                      array (
                                        'key' => 'ITALPR',
                                        'value' => 'ITALPR',
                                      ),
                                      483 => 
                                      array (
                                        'key' => 'ITALPR TEFLON',
                                        'value' => 'ITALPR TEFLON',
                                      ),
                                      484 => 
                                      array (
                                        'key' => 'JACKHAMMER',
                                        'value' => 'JACKHAMMER',
                                      ),
                                      485 => 
                                      array (
                                        'key' => 'JB INDUSTRIES',
                                        'value' => 'JB INDUSTRIES',
                                      ),
                                      486 => 
                                      array (
                                        'key' => 'JET RANGER',
                                        'value' => 'JET RANGER',
                                      ),
                                      487 => 
                                      array (
                                        'key' => 'JETTING',
                                        'value' => 'JETTING',
                                      ),
                                      488 => 
                                      array (
                                        'key' => 'JETTING AND UTILITY',
                                        'value' => 'JETTING AND UTILITY',
                                      ),
                                      489 => 
                                      array (
                                        'key' => 'JGB INDUSTRIES',
                                        'value' => 'JGB INDUSTRIES',
                                      ),
                                      490 => 
                                      array (
                                        'key' => 'JOHN DEERE',
                                        'value' => 'JOHN DEERE',
                                      ),
                                      491 => 
                                      array (
                                        'key' => 'KAPTEC ULTRAFLEX',
                                        'value' => 'KAPTEC ULTRAFLEX',
                                      ),
                                      492 => 
                                      array (
                                        'key' => 'KAPTECH FOOD DICHARGE',
                                        'value' => 'KAPTECH FOOD DICHARGE',
                                      ),
                                      493 => 
                                      array (
                                        'key' => 'KELCO BLAST',
                                        'value' => 'KELCO BLAST',
                                      ),
                                      494 => 
                                      array (
                                        'key' => 'KETEK FLEX PETROLEUM',
                                        'value' => 'KETEK FLEX PETROLEUM',
                                      ),
                                      495 => 
                                      array (
                                        'key' => 'KINKGUARD',
                                        'value' => 'KINKGUARD',
                                      ),
                                      496 => 
                                      array (
                                        'key' => 'LABOUR BLUCOR COUPLING',
                                        'value' => 'LABOUR BLUCOR COUPLING',
                                      ),
                                      497 => 
                                      array (
                                        'key' => 'LACTOPAL',
                                        'value' => 'LACTOPAL',
                                      ),
                                      498 => 
                                      array (
                                        'key' => 'LAKECHARLES',
                                        'value' => 'LAKECHARLES',
                                      ),
                                      499 => 
                                      array (
                                        'key' => 'LEGACY TPU',
                                        'value' => 'LEGACY TPU',
                                      ),
                                      500 => 
                                      array (
                                        'key' => 'LG NITRILE',
                                        'value' => 'LG NITRILE',
                                      ),
                                      501 => 
                                      array (
                                        'key' => 'LIGHTRAC',
                                        'value' => 'LIGHTRAC',
                                      ),
                                      502 => 
                                      array (
                                        'key' => 'LIGHTWEIGHT VACUUM',
                                        'value' => 'LIGHTWEIGHT VACUUM',
                                      ),
                                      503 => 
                                      array (
                                        'key' => 'LINECRETE',
                                        'value' => 'LINECRETE',
                                      ),
                                      504 => 
                                      array (
                                        'key' => 'LIQUID MUD',
                                        'value' => 'LIQUID MUD',
                                      ),
                                      505 => 
                                      array (
                                        'key' => 'LIQUID MUD YS',
                                        'value' => 'LIQUID MUD YS',
                                      ),
                                      506 => 
                                      array (
                                        'key' => 'LIQUIFORCE',
                                        'value' => 'LIQUIFORCE',
                                      ),
                                      507 => 
                                      array (
                                        'key' => 'LPG DELIVERY PRO',
                                        'value' => 'LPG DELIVERY PRO',
                                      ),
                                      508 => 
                                      array (
                                        'key' => 'LW ARCTIC TANK TRUCK',
                                        'value' => 'LW ARCTIC TANK TRUCK',
                                      ),
                                      509 => 
                                      array (
                                        'key' => 'LW BLACK FLEXTRA II',
                                        'value' => 'LW BLACK FLEXTRA II',
                                      ),
                                      510 => 
                                      array (
                                        'key' => 'LW INDUSTRIAL VACUUM',
                                        'value' => 'LW INDUSTRIAL VACUUM',
                                      ),
                                      511 => 
                                      array (
                                        'key' => 'M&P MINE CONDUIT',
                                        'value' => 'M&P MINE CONDUIT',
                                      ),
                                      512 => 
                                      array (
                                        'key' => 'MANUS BLAST',
                                        'value' => 'MANUS BLAST',
                                      ),
                                      513 => 
                                      array (
                                        'key' => 'MANUS BLAST WHIP',
                                        'value' => 'MANUS BLAST WHIP',
                                      ),
                                      514 => 
                                      array (
                                        'key' => 'MARIAN',
                                        'value' => 'MARIAN',
                                      ),
                                      515 => 
                                      array (
                                        'key' => 'MARINE BILGE',
                                        'value' => 'MARINE BILGE',
                                      ),
                                      516 => 
                                      array (
                                        'key' => 'MARINE EXHAUST HOSE',
                                        'value' => 'MARINE EXHAUST HOSE',
                                      ),
                                      517 => 
                                      array (
                                        'key' => 'MARINE FUEL FEED VENT J1527 B2',
                                        'value' => 'MARINE FUEL FEED VENT J1527 B2',
                                      ),
                                      518 => 
                                      array (
                                        'key' => 'MARINE FUEL FILL',
                                        'value' => 'MARINE FUEL FILL',
                                      ),
                                      519 => 
                                      array (
                                        'key' => 'MARINE FUEL LINE',
                                        'value' => 'MARINE FUEL LINE',
                                      ),
                                      520 => 
                                      array (
                                        'key' => 'MARINE HARDWALL WET EXHAUST',
                                        'value' => 'MARINE HARDWALL WET EXHAUST',
                                      ),
                                      521 => 
                                      array (
                                        'key' => 'MARINE LIVEWELL',
                                        'value' => 'MARINE LIVEWELL',
                                      ),
                                      522 => 
                                      array (
                                        'key' => 'MARINE OIL FILL',
                                        'value' => 'MARINE OIL FILL',
                                      ),
                                      523 => 
                                      array (
                                        'key' => 'MARINE SANITATION',
                                        'value' => 'MARINE SANITATION',
                                      ),
                                      524 => 
                                      array (
                                        'key' => 'MARINE SOFTWALL WET EXHAUST',
                                        'value' => 'MARINE SOFTWALL WET EXHAUST',
                                      ),
                                      525 => 
                                      array (
                                        'key' => 'MARINE VACUUM',
                                        'value' => 'MARINE VACUUM',
                                      ),
                                      526 => 
                                      array (
                                        'key' => 'MAST-AIR',
                                        'value' => 'MAST-AIR',
                                      ),
                                      527 => 
                                      array (
                                        'key' => 'MASTERCOOL',
                                        'value' => 'MASTERCOOL',
                                      ),
                                      528 => 
                                      array (
                                        'key' => 'MASTHD',
                                        'value' => 'MASTHD',
                                      ),
                                      529 => 
                                      array (
                                        'key' => 'MATERIAL HANDLING',
                                        'value' => 'MATERIAL HANDLING',
                                      ),
                                      530 => 
                                      array (
                                        'key' => 'MATERIAL HANDLING DISCHARGE',
                                        'value' => 'MATERIAL HANDLING DISCHARGE',
                                      ),
                                      531 => 
                                      array (
                                        'key' => 'MAXXIM PREMIER ULTRA',
                                        'value' => 'MAXXIM PREMIER ULTRA',
                                      ),
                                      532 => 
                                      array (
                                        'key' => 'MCCARTY WATER S&D',
                                        'value' => 'MCCARTY WATER S&D',
                                      ),
                                      533 => 
                                      array (
                                        'key' => 'MCGILL',
                                        'value' => 'MCGILL',
                                      ),
                                      534 => 
                                      array (
                                        'key' => 'MECR&S',
                                        'value' => 'MECR&S',
                                      ),
                                      535 => 
                                      array (
                                        'key' => 'MECR&S PAINT SPRAY',
                                        'value' => 'MECR&S PAINT SPRAY',
                                      ),
                                      536 => 
                                      array (
                                        'key' => 'MER OILFIELD SUCTION',
                                        'value' => 'MER OILFIELD SUCTION',
                                      ),
                                      537 => 
                                      array (
                                        'key' => 'MERMAR',
                                        'value' => 'MERMAR',
                                      ),
                                      538 => 
                                      array (
                                        'key' => 'MESA',
                                        'value' => 'MESA',
                                      ),
                                      539 => 
                                      array (
                                        'key' => 'MESA AMMONIUM NITRATE PELLET',
                                        'value' => 'MESA AMMONIUM NITRATE PELLET',
                                      ),
                                      540 => 
                                      array (
                                        'key' => 'MESA DRAIN',
                                        'value' => 'MESA DRAIN',
                                      ),
                                      541 => 
                                      array (
                                        'key' => 'MESA GUNITE',
                                        'value' => 'MESA GUNITE',
                                      ),
                                      542 => 
                                      array (
                                        'key' => 'MESA PLASTER & GROUT',
                                        'value' => 'MESA PLASTER & GROUT',
                                      ),
                                      543 => 
                                      array (
                                        'key' => 'MESA REFRACTORY GUNITE',
                                        'value' => 'MESA REFRACTORY GUNITE',
                                      ),
                                      544 => 
                                      array (
                                        'key' => 'MESA ROOF DRAIN',
                                        'value' => 'MESA ROOF DRAIN',
                                      ),
                                      545 => 
                                      array (
                                        'key' => 'MESA ROOF DRAIN CHEMICAL',
                                        'value' => 'MESA ROOF DRAIN CHEMICAL',
                                      ),
                                      546 => 
                                      array (
                                        'key' => 'MHPRF 11588G II ST',
                                        'value' => 'MHPRF 11588G II ST',
                                      ),
                                      547 => 
                                      array (
                                        'key' => 'MIDWEST',
                                        'value' => 'MIDWEST',
                                      ),
                                      548 => 
                                      array (
                                        'key' => 'MIL A-A-59566',
                                        'value' => 'MIL A-A-59566',
                                      ),
                                      549 => 
                                      array (
                                        'key' => 'MIL A-A-59567',
                                        'value' => 'MIL A-A-59567',
                                      ),
                                      550 => 
                                      array (
                                        'key' => 'MIL-A-A-59565',
                                        'value' => 'MIL-A-A-59565',
                                      ),
                                      551 => 
                                      array (
                                        'key' => 'MIL-DTL-13444-I',
                                        'value' => 'MIL-DTL-13444-I',
                                      ),
                                      552 => 
                                      array (
                                        'key' => 'MIL-DTL-13444-III',
                                        'value' => 'MIL-DTL-13444-III',
                                      ),
                                      553 => 
                                      array (
                                        'key' => 'MIL-DTL-13531 TYPE II, CL A',
                                        'value' => 'MIL-DTL-13531 TYPE II, CL A',
                                      ),
                                      554 => 
                                      array (
                                        'key' => 'MIL-DTL-17505',
                                        'value' => 'MIL-DTL-17505',
                                      ),
                                      555 => 
                                      array (
                                        'key' => 'MIL-DTL-20176',
                                        'value' => 'MIL-DTL-20176',
                                      ),
                                      556 => 
                                      array (
                                        'key' => 'MIL-DTL-22240',
                                        'value' => 'MIL-DTL-22240',
                                      ),
                                      557 => 
                                      array (
                                        'key' => 'MIL-DTL-27516',
                                        'value' => 'MIL-DTL-27516',
                                      ),
                                      558 => 
                                      array (
                                        'key' => 'MIL-DTL-29210',
                                        'value' => 'MIL-DTL-29210',
                                      ),
                                      559 => 
                                      array (
                                        'key' => 'MIL-DTL-6615',
                                        'value' => 'MIL-DTL-6615',
                                      ),
                                      560 => 
                                      array (
                                        'key' => 'MIL-H-24580',
                                        'value' => 'MIL-H-24580',
                                      ),
                                      561 => 
                                      array (
                                        'key' => 'MIL-H-82127',
                                        'value' => 'MIL-H-82127',
                                      ),
                                      562 => 
                                      array (
                                        'key' => 'MIL-PRF-11588 TYPE I',
                                        'value' => 'MIL-PRF-11588 TYPE I',
                                      ),
                                      563 => 
                                      array (
                                        'key' => 'MIL-PRF-11588 TYPE III',
                                        'value' => 'MIL-PRF-11588 TYPE III',
                                      ),
                                      564 => 
                                      array (
                                        'key' => 'MIL-PRF-370 TYPE A',
                                        'value' => 'MIL-PRF-370 TYPE A',
                                      ),
                                      565 => 
                                      array (
                                        'key' => 'MIL-PRF-370 TYPE B',
                                        'value' => 'MIL-PRF-370 TYPE B',
                                      ),
                                      566 => 
                                      array (
                                        'key' => 'MILTARY',
                                        'value' => 'MILTARY',
                                      ),
                                      567 => 
                                      array (
                                        'key' => 'MILTON',
                                        'value' => 'MILTON',
                                      ),
                                      568 => 
                                      array (
                                        'key' => 'MINE CONDUIT',
                                        'value' => 'MINE CONDUIT',
                                      ),
                                      569 => 
                                      array (
                                        'key' => 'MOCCASIN',
                                        'value' => 'MOCCASIN',
                                      ),
                                      570 => 
                                      array (
                                        'key' => 'MORRIS AIR SEEDER',
                                        'value' => 'MORRIS AIR SEEDER',
                                      ),
                                      571 => 
                                      array (
                                        'key' => 'MORRIS AIR SEEDER LT',
                                        'value' => 'MORRIS AIR SEEDER LT',
                                      ),
                                      572 => 
                                      array (
                                        'key' => 'MPI',
                                        'value' => 'MPI',
                                      ),
                                      573 => 
                                      array (
                                        'key' => 'MPI PREMIUM-GUARD MARINE',
                                        'value' => 'MPI PREMIUM-GUARD MARINE',
                                      ),
                                      574 => 
                                      array (
                                        'key' => 'MUD CUTTING HW',
                                        'value' => 'MUD CUTTING HW',
                                      ),
                                      575 => 
                                      array (
                                        'key' => 'MUD RETURN LINE',
                                        'value' => 'MUD RETURN LINE',
                                      ),
                                      576 => 
                                      array (
                                        'key' => 'MUD STACKING',
                                        'value' => 'MUD STACKING',
                                      ),
                                      577 => 
                                      array (
                                        'key' => 'MULTISTREAM HW',
                                        'value' => 'MULTISTREAM HW',
                                      ),
                                      578 => 
                                      array (
                                        'key' => 'MULTISTREAM SW',
                                        'value' => 'MULTISTREAM SW',
                                      ),
                                      579 => 
                                      array (
                                        'key' => 'NAFIRE',
                                        'value' => 'NAFIRE',
                                      ),
                                      580 => 
                                      array (
                                        'key' => 'NAVISTAR',
                                        'value' => 'NAVISTAR',
                                      ),
                                      581 => 
                                      array (
                                        'key' => 'NELSON DUNN',
                                        'value' => 'NELSON DUNN',
                                      ),
                                      582 => 
                                      array (
                                        'key' => 'NEPTUNE',
                                        'value' => 'NEPTUNE',
                                      ),
                                      583 => 
                                      array (
                                        'key' => 'NESI OILFIELD',
                                        'value' => 'NESI OILFIELD',
                                      ),
                                      584 => 
                                      array (
                                        'key' => 'NEWLINE',
                                        'value' => 'NEWLINE',
                                      ),
                                      585 => 
                                      array (
                                        'key' => 'NISHIN',
                                        'value' => 'NISHIN',
                                      ),
                                      586 => 
                                      array (
                                        'key' => 'NISSHIN',
                                        'value' => 'NISSHIN',
                                      ),
                                      587 => 
                                      array (
                                        'key' => 'NITRO FLOOD WATER S&D',
                                        'value' => 'NITRO FLOOD WATER S&D',
                                      ),
                                      588 => 
                                      array (
                                        'key' => 'NITRO R&C WATER S&D',
                                        'value' => 'NITRO R&C WATER S&D',
                                      ),
                                      589 => 
                                      array (
                                        'key' => 'NITROGEN SERVICE',
                                        'value' => 'NITROGEN SERVICE',
                                      ),
                                      590 => 
                                      array (
                                        'key' => 'NOV',
                                        'value' => 'NOV',
                                      ),
                                      591 => 
                                      array (
                                        'key' => 'NPETRO LW',
                                        'value' => 'NPETRO LW',
                                      ),
                                      592 => 
                                      array (
                                        'key' => 'NR SPRAY',
                                        'value' => 'NR SPRAY',
                                      ),
                                      593 => 
                                      array (
                                        'key' => 'NR7',
                                        'value' => 'NR7',
                                      ),
                                      594 => 
                                      array (
                                        'key' => 'NR8',
                                        'value' => 'NR8',
                                      ),
                                      595 => 
                                      array (
                                        'key' => 'NSH',
                                        'value' => 'NSH',
                                      ),
                                      596 => 
                                      array (
                                        'key' => 'NUTRIFLEX',
                                        'value' => 'NUTRIFLEX',
                                      ),
                                      597 => 
                                      array (
                                        'key' => 'NUTRIFLEX STATIC WIRE',
                                        'value' => 'NUTRIFLEX STATIC WIRE',
                                      ),
                                      598 => 
                                      array (
                                        'key' => 'NUTRIFLEX SUCTION & DISCHARGE',
                                        'value' => 'NUTRIFLEX SUCTION & DISCHARGE',
                                      ),
                                      599 => 
                                      array (
                                        'key' => 'NUTRIFLO SUCTION & DISCHARGE',
                                        'value' => 'NUTRIFLO SUCTION & DISCHARGE',
                                      ),
                                      600 => 
                                      array (
                                        'key' => 'OAKLEY',
                                        'value' => 'OAKLEY',
                                      ),
                                      601 => 
                                      array (
                                        'key' => 'OFFSHORE FUEL',
                                        'value' => 'OFFSHORE FUEL',
                                      ),
                                      602 => 
                                      array (
                                        'key' => 'OFFSHORE VIPER',
                                        'value' => 'OFFSHORE VIPER',
                                      ),
                                      603 => 
                                      array (
                                        'key' => 'OIL DISCHARGE',
                                        'value' => 'OIL DISCHARGE',
                                      ),
                                      604 => 
                                      array (
                                        'key' => 'OIL RIG HARDWALL',
                                        'value' => 'OIL RIG HARDWALL',
                                      ),
                                      605 => 
                                      array (
                                        'key' => 'OIL RIG HARDWALL BIOFUEL',
                                        'value' => 'OIL RIG HARDWALL BIOFUEL',
                                      ),
                                      606 => 
                                      array (
                                        'key' => 'OIL RIG SOFTWALL',
                                        'value' => 'OIL RIG SOFTWALL',
                                      ),
                                      607 => 
                                      array (
                                        'key' => 'OIL TREAT & BLENDER',
                                        'value' => 'OIL TREAT & BLENDER',
                                      ),
                                      608 => 
                                      array (
                                        'key' => 'OILFIELD DISCHARGE',
                                        'value' => 'OILFIELD DISCHARGE',
                                      ),
                                      609 => 
                                      array (
                                        'key' => 'OILFIELD FRAC',
                                        'value' => 'OILFIELD FRAC',
                                      ),
                                      610 => 
                                      array (
                                        'key' => 'OMNI',
                                        'value' => 'OMNI',
                                      ),
                                      611 => 
                                      array (
                                        'key' => 'OMNI WATER S&D',
                                        'value' => 'OMNI WATER S&D',
                                      ),
                                      612 => 
                                      array (
                                        'key' => 'ORANGE FLEXWING',
                                        'value' => 'ORANGE FLEXWING',
                                      ),
                                      613 => 
                                      array (
                                        'key' => 'ORTAC',
                                        'value' => 'ORTAC',
                                      ),
                                      614 => 
                                      array (
                                        'key' => 'ORTAC II',
                                        'value' => 'ORTAC II',
                                      ),
                                      615 => 
                                      array (
                                        'key' => 'PACER',
                                        'value' => 'PACER',
                                      ),
                                      616 => 
                                      array (
                                        'key' => 'PAGUFIX',
                                        'value' => 'PAGUFIX',
                                      ),
                                      617 => 
                                      array (
                                        'key' => 'PALADIN',
                                        'value' => 'PALADIN',
                                      ),
                                      618 => 
                                      array (
                                        'key' => 'PANGBORN PA BLAST',
                                        'value' => 'PANGBORN PA BLAST',
                                      ),
                                      619 => 
                                      array (
                                        'key' => 'PARKING',
                                        'value' => 'PARKING',
                                      ),
                                      620 => 
                                      array (
                                        'key' => 'PERFECT GARDEN HOSE',
                                        'value' => 'PERFECT GARDEN HOSE',
                                      ),
                                      621 => 
                                      array (
                                        'key' => 'PERLAPAL',
                                        'value' => 'PERLAPAL',
                                      ),
                                      622 => 
                                      array (
                                        'key' => 'PETERS LIQUID MUD',
                                        'value' => 'PETERS LIQUID MUD',
                                      ),
                                      623 => 
                                      array (
                                        'key' => 'PETRO OIL S&D',
                                        'value' => 'PETRO OIL S&D',
                                      ),
                                      624 => 
                                      array (
                                        'key' => 'PETROL HARDWALL',
                                        'value' => 'PETROL HARDWALL',
                                      ),
                                      625 => 
                                      array (
                                        'key' => 'PGC PLACEMENT TEXTILE',
                                        'value' => 'PGC PLACEMENT TEXTILE',
                                      ),
                                      626 => 
                                      array (
                                        'key' => 'PHX FUEL GAS',
                                        'value' => 'PHX FUEL GAS',
                                      ),
                                      627 => 
                                      array (
                                        'key' => 'PHX OXYGEN',
                                        'value' => 'PHX OXYGEN',
                                      ),
                                      628 => 
                                      array (
                                        'key' => 'PLASTER & GROUT',
                                        'value' => 'PLASTER & GROUT',
                                      ),
                                      629 => 
                                      array (
                                        'key' => 'PLATINUM JAC RISER',
                                        'value' => 'PLATINUM JAC RISER',
                                      ),
                                      630 => 
                                      array (
                                        'key' => 'PLIOVIC FG',
                                        'value' => 'PLIOVIC FG',
                                      ),
                                      631 => 
                                      array (
                                        'key' => 'PLIOVIC GS',
                                        'value' => 'PLIOVIC GS',
                                      ),
                                      632 => 
                                      array (
                                        'key' => 'PLIOVIC PLUS',
                                        'value' => 'PLIOVIC PLUS',
                                      ),
                                      633 => 
                                      array (
                                        'key' => 'PLIOVIC PVC TUBING',
                                        'value' => 'PLIOVIC PVC TUBING',
                                      ),
                                      634 => 
                                      array (
                                        'key' => 'POSEIDON UL94-HB',
                                        'value' => 'POSEIDON UL94-HB',
                                      ),
                                      635 => 
                                      array (
                                        'key' => 'POT LINE',
                                        'value' => 'POT LINE',
                                      ),
                                      636 => 
                                      array (
                                        'key' => 'POT LINE HD',
                                        'value' => 'POT LINE HD',
                                      ),
                                      637 => 
                                      array (
                                        'key' => 'POTABLE STOCK TANK',
                                        'value' => 'POTABLE STOCK TANK',
                                      ),
                                      638 => 
                                      array (
                                        'key' => 'POTABLE WATER',
                                        'value' => 'POTABLE WATER',
                                      ),
                                      639 => 
                                      array (
                                        'key' => 'POTABLE WATER HW',
                                        'value' => 'POTABLE WATER HW',
                                      ),
                                      640 => 
                                      array (
                                        'key' => 'POTABLE WATER SW',
                                        'value' => 'POTABLE WATER SW',
                                      ),
                                      641 => 
                                      array (
                                        'key' => 'PRAIRIE GOLDFLEX',
                                        'value' => 'PRAIRIE GOLDFLEX',
                                      ),
                                      642 => 
                                      array (
                                        'key' => 'PREM MARINE WET EXHAUST COR',
                                        'value' => 'PREM MARINE WET EXHAUST COR',
                                      ),
                                      643 => 
                                      array (
                                        'key' => 'PREMIER REFRACTORY CLAMP',
                                        'value' => 'PREMIER REFRACTORY CLAMP',
                                      ),
                                      644 => 
                                      array (
                                        'key' => 'PREMIUM GARDEN',
                                        'value' => 'PREMIUM GARDEN',
                                      ),
                                      645 => 
                                      array (
                                        'key' => 'PREMIUM MARINE WET EXHAUST',
                                        'value' => 'PREMIUM MARINE WET EXHAUST',
                                      ),
                                      646 => 
                                      array (
                                        'key' => 'PROSPECTOR AIR',
                                        'value' => 'PROSPECTOR AIR',
                                      ),
                                      647 => 
                                      array (
                                        'key' => 'PROSPECTOR BOP 3000',
                                        'value' => 'PROSPECTOR BOP 3000',
                                      ),
                                      648 => 
                                      array (
                                        'key' => 'PROSPECTOR BOP 5000',
                                        'value' => 'PROSPECTOR BOP 5000',
                                      ),
                                      649 => 
                                      array (
                                        'key' => 'PROSPECTOR FLEX',
                                        'value' => 'PROSPECTOR FLEX',
                                      ),
                                      650 => 
                                      array (
                                        'key' => 'PROSPECTOR FLEX OILFIELD',
                                        'value' => 'PROSPECTOR FLEX OILFIELD',
                                      ),
                                      651 => 
                                      array (
                                        'key' => 'PROSPECTOR FLEX PETRO',
                                        'value' => 'PROSPECTOR FLEX PETRO',
                                      ),
                                      652 => 
                                      array (
                                        'key' => 'PROSPECTOR FRAC DISCHARGE',
                                        'value' => 'PROSPECTOR FRAC DISCHARGE',
                                      ),
                                      653 => 
                                      array (
                                        'key' => 'PROSPECTOR FRAC TANK HOSE',
                                        'value' => 'PROSPECTOR FRAC TANK HOSE',
                                      ),
                                      654 => 
                                      array (
                                        'key' => 'PROSPECTOR HOT OILER',
                                        'value' => 'PROSPECTOR HOT OILER',
                                      ),
                                      655 => 
                                      array (
                                        'key' => 'PROSPECTOR MINESPRAY',
                                        'value' => 'PROSPECTOR MINESPRAY',
                                      ),
                                      656 => 
                                      array (
                                        'key' => 'PROSPECTOR OIL RIG HW',
                                        'value' => 'PROSPECTOR OIL RIG HW',
                                      ),
                                      657 => 
                                      array (
                                        'key' => 'PROSPECTOR OIL RIG SW',
                                        'value' => 'PROSPECTOR OIL RIG SW',
                                      ),
                                      658 => 
                                      array (
                                        'key' => 'PROSPECTOR OILFIELD',
                                        'value' => 'PROSPECTOR OILFIELD',
                                      ),
                                      659 => 
                                      array (
                                        'key' => 'PROSPECTOR OILFIELD S&D',
                                        'value' => 'PROSPECTOR OILFIELD S&D',
                                      ),
                                      660 => 
                                      array (
                                        'key' => 'PROSPECTOR PETRO',
                                        'value' => 'PROSPECTOR PETRO',
                                      ),
                                      661 => 
                                      array (
                                        'key' => 'PROSPECTOR PLUS AIR',
                                        'value' => 'PROSPECTOR PLUS AIR',
                                      ),
                                      662 => 
                                      array (
                                        'key' => 'PROSPECTOR SHR',
                                        'value' => 'PROSPECTOR SHR',
                                      ),
                                      663 => 
                                      array (
                                        'key' => 'PROSPECTOR WATER DISCHARGE',
                                        'value' => 'PROSPECTOR WATER DISCHARGE',
                                      ),
                                      664 => 
                                      array (
                                        'key' => 'PROSPECTOR WATER S&D',
                                        'value' => 'PROSPECTOR WATER S&D',
                                      ),
                                      665 => 
                                      array (
                                        'key' => 'PROTECTION RING',
                                        'value' => 'PROTECTION RING',
                                      ),
                                      666 => 
                                      array (
                                        'key' => 'PSC CHEMICAL',
                                        'value' => 'PSC CHEMICAL',
                                      ),
                                      667 => 
                                      array (
                                        'key' => 'PULP & PAPER WASHDOWN',
                                        'value' => 'PULP & PAPER WASHDOWN',
                                      ),
                                      668 => 
                                      array (
                                        'key' => 'PUREONE',
                                        'value' => 'PUREONE',
                                      ),
                                      669 => 
                                      array (
                                        'key' => 'PURFIT',
                                        'value' => 'PURFIT',
                                      ),
                                      670 => 
                                      array (
                                        'key' => 'PURFIT BREWLINE',
                                        'value' => 'PURFIT BREWLINE',
                                      ),
                                      671 => 
                                      array (
                                        'key' => 'PURPLE FLEXWING',
                                        'value' => 'PURPLE FLEXWING',
                                      ),
                                      672 => 
                                      array (
                                        'key' => 'PURPLE SNAKE',
                                        'value' => 'PURPLE SNAKE',
                                      ),
                                      673 => 
                                      array (
                                        'key' => 'PURPLE SNAKE PLUS',
                                        'value' => 'PURPLE SNAKE PLUS',
                                      ),
                                      674 => 
                                      array (
                                        'key' => 'PYROFLEX HOT AIR',
                                        'value' => 'PYROFLEX HOT AIR',
                                      ),
                                      675 => 
                                      array (
                                        'key' => 'PYROFLEX HOT AIR III FDA',
                                        'value' => 'PYROFLEX HOT AIR III FDA',
                                      ),
                                      676 => 
                                      array (
                                        'key' => 'PYROFLEX HOT TAR WAND',
                                        'value' => 'PYROFLEX HOT TAR WAND',
                                      ),
                                      677 => 
                                      array (
                                        'key' => 'PYROFLEX II HOT AIR',
                                        'value' => 'PYROFLEX II HOT AIR',
                                      ),
                                      678 => 
                                      array (
                                        'key' => 'PYROFLEX II HOT TAR & ASPHALT',
                                        'value' => 'PYROFLEX II HOT TAR & ASPHALT',
                                      ),
                                      679 => 
                                      array (
                                        'key' => 'PYROFLEX III HOT AIR',
                                        'value' => 'PYROFLEX III HOT AIR',
                                      ),
                                      680 => 
                                      array (
                                        'key' => 'PYROFLEX III HOT AIR FDA',
                                        'value' => 'PYROFLEX III HOT AIR FDA',
                                      ),
                                      681 => 
                                      array (
                                        'key' => 'QR048',
                                        'value' => 'QR048',
                                      ),
                                      682 => 
                                      array (
                                        'key' => 'QR48',
                                        'value' => 'QR48',
                                      ),
                                      683 => 
                                      array (
                                        'key' => 'QUIKSTIR',
                                        'value' => 'QUIKSTIR',
                                      ),
                                      684 => 
                                      array (
                                        'key' => 'QUIKSTIR PUMP 2P',
                                        'value' => 'QUIKSTIR PUMP 2P',
                                      ),
                                      685 => 
                                      array (
                                        'key' => 'RADIATOR',
                                        'value' => 'RADIATOR',
                                      ),
                                      686 => 
                                      array (
                                        'key' => 'RAGCO',
                                        'value' => 'RAGCO',
                                      ),
                                      687 => 
                                      array (
                                        'key' => 'RAIL',
                                        'value' => 'RAIL',
                                      ),
                                      688 => 
                                      array (
                                        'key' => 'RANSBG NR SPRAY',
                                        'value' => 'RANSBG NR SPRAY',
                                      ),
                                      689 => 
                                      array (
                                        'key' => 'RAWHID FIRE ENGINE BOOSTER',
                                        'value' => 'RAWHID FIRE ENGINE BOOSTER',
                                      ),
                                      690 => 
                                      array (
                                        'key' => 'RCT FLEXRITE',
                                        'value' => 'RCT FLEXRITE',
                                      ),
                                      691 => 
                                      array (
                                        'key' => 'RDC',
                                        'value' => 'RDC',
                                      ),
                                      692 => 
                                      array (
                                        'key' => 'REAL RUBBER',
                                        'value' => 'REAL RUBBER',
                                      ),
                                      693 => 
                                      array (
                                        'key' => 'RED FLEXTRA',
                                        'value' => 'RED FLEXTRA',
                                      ),
                                      694 => 
                                      array (
                                        'key' => 'RED-L GOLDFLEX-C',
                                        'value' => 'RED-L GOLDFLEX-C',
                                      ),
                                      695 => 
                                      array (
                                        'key' => 'RED-L WATER',
                                        'value' => 'RED-L WATER',
                                      ),
                                      696 => 
                                      array (
                                        'key' => 'REDWING BLUE LOW TEMP',
                                        'value' => 'REDWING BLUE LOW TEMP',
                                      ),
                                      697 => 
                                      array (
                                        'key' => 'REDWING FUEL OIL',
                                        'value' => 'REDWING FUEL OIL',
                                      ),
                                      698 => 
                                      array (
                                        'key' => 'REDWING FUEL OIL HD',
                                        'value' => 'REDWING FUEL OIL HD',
                                      ),
                                      699 => 
                                      array (
                                        'key' => 'REDWING VERSABRAID',
                                        'value' => 'REDWING VERSABRAID',
                                      ),
                                      700 => 
                                      array (
                                        'key' => 'REFRACTORY GUNITE',
                                        'value' => 'REFRACTORY GUNITE',
                                      ),
                                      701 => 
                                      array (
                                        'key' => 'REFRACTORY HOSE',
                                        'value' => 'REFRACTORY HOSE',
                                      ),
                                      702 => 
                                      array (
                                        'key' => 'REFRIGERANT CHARGING',
                                        'value' => 'REFRIGERANT CHARGING',
                                      ),
                                      703 => 
                                      array (
                                        'key' => 'RELIANCE PROSPECTOR WATER S&D',
                                        'value' => 'RELIANCE PROSPECTOR WATER S&D',
                                      ),
                                      704 => 
                                      array (
                                        'key' => 'RELIANCE WATER S&D',
                                        'value' => 'RELIANCE WATER S&D',
                                      ),
                                      705 => 
                                      array (
                                        'key' => 'RES',
                                        'value' => 'RES',
                                      ),
                                      706 => 
                                      array (
                                        'key' => 'REVERSE CIRCULATION',
                                        'value' => 'REVERSE CIRCULATION',
                                      ),
                                      707 => 
                                      array (
                                        'key' => 'RIG SUPPLY',
                                        'value' => 'RIG SUPPLY',
                                      ),
                                      708 => 
                                      array (
                                        'key' => 'RIG SUPPLY SW',
                                        'value' => 'RIG SUPPLY SW',
                                      ),
                                      709 => 
                                      array (
                                        'key' => 'RIVERB',
                                        'value' => 'RIVERB',
                                      ),
                                      710 => 
                                      array (
                                        'key' => 'RL1131 TWIN-LINE GRADE R',
                                        'value' => 'RL1131 TWIN-LINE GRADE R',
                                      ),
                                      711 => 
                                      array (
                                        'key' => 'ROADPATCH',
                                        'value' => 'ROADPATCH',
                                      ),
                                      712 => 
                                      array (
                                        'key' => 'ROBIN FREON CHARGING',
                                        'value' => 'ROBIN FREON CHARGING',
                                      ),
                                      713 => 
                                      array (
                                        'key' => 'ROCK DRILL',
                                        'value' => 'ROCK DRILL',
                                      ),
                                      714 => 
                                      array (
                                        'key' => 'ROOF DRAIN',
                                        'value' => 'ROOF DRAIN',
                                      ),
                                      715 => 
                                      array (
                                        'key' => 'ROUGH BORE (HOT TAR & ASPHALT)',
                                        'value' => 'ROUGH BORE (HOT TAR & ASPHALT)',
                                      ),
                                      716 => 
                                      array (
                                        'key' => 'ROUGH BORE DOCK',
                                        'value' => 'ROUGH BORE DOCK',
                                      ),
                                      717 => 
                                      array (
                                        'key' => 'ROYAL BRASS PLIOVIC',
                                        'value' => 'ROYAL BRASS PLIOVIC',
                                      ),
                                      718 => 
                                      array (
                                        'key' => 'RSD',
                                        'value' => 'RSD',
                                      ),
                                      719 => 
                                      array (
                                        'key' => 'RX',
                                        'value' => 'RX',
                                      ),
                                      720 => 
                                      array (
                                        'key' => 'S4SH',
                                        'value' => 'S4SH',
                                      ),
                                      721 => 
                                      array (
                                        'key' => 'S4SP',
                                        'value' => 'S4SP',
                                      ),
                                      722 => 
                                      array (
                                        'key' => 'SAE 100R4',
                                        'value' => 'SAE 100R4',
                                      ),
                                      723 => 
                                      array (
                                        'key' => 'SAE 20R1',
                                        'value' => 'SAE 20R1',
                                      ),
                                      724 => 
                                      array (
                                        'key' => 'SAE 20R2 D1',
                                        'value' => 'SAE 20R2 D1',
                                      ),
                                      725 => 
                                      array (
                                        'key' => 'SAE 20R2D1',
                                        'value' => 'SAE 20R2D1',
                                      ),
                                      726 => 
                                      array (
                                        'key' => 'SAE J1527 A2 R1 ISO 7840 A2',
                                        'value' => 'SAE J1527 A2 R1 ISO 7840 A2',
                                      ),
                                      727 => 
                                      array (
                                        'key' => 'SAE J1527 TYPE A2 FUEL FILL',
                                        'value' => 'SAE J1527 TYPE A2 FUEL FILL',
                                      ),
                                      728 => 
                                      array (
                                        'key' => 'SAE-20R2 D1',
                                        'value' => 'SAE-20R2 D1',
                                      ),
                                      729 => 
                                      array (
                                        'key' => 'SAND RECOVERY S&D',
                                        'value' => 'SAND RECOVERY S&D',
                                      ),
                                      730 => 
                                      array (
                                        'key' => 'SAND SUCTION',
                                        'value' => 'SAND SUCTION',
                                      ),
                                      731 => 
                                      array (
                                        'key' => 'SANDBLAST 400',
                                        'value' => 'SANDBLAST 400',
                                      ),
                                      732 => 
                                      array (
                                        'key' => 'SANDER',
                                        'value' => 'SANDER',
                                      ),
                                      733 => 
                                      array (
                                        'key' => 'SANI-WASH',
                                        'value' => 'SANI-WASH',
                                      ),
                                      734 => 
                                      array (
                                        'key' => 'SANI-WASH PLUS',
                                        'value' => 'SANI-WASH PLUS',
                                      ),
                                      735 => 
                                      array (
                                        'key' => 'SANI-WASH SUPREME',
                                        'value' => 'SANI-WASH SUPREME',
                                      ),
                                      736 => 
                                      array (
                                        'key' => 'SCOMI LIQUID MUD',
                                        'value' => 'SCOMI LIQUID MUD',
                                      ),
                                      737 => 
                                      array (
                                        'key' => 'SCP3',
                                        'value' => 'SCP3',
                                      ),
                                      738 => 
                                      array (
                                        'key' => 'SCRMAC KURB KING',
                                        'value' => 'SCRMAC KURB KING',
                                      ),
                                      739 => 
                                      array (
                                        'key' => 'SEALFS',
                                        'value' => 'SEALFS',
                                      ),
                                      740 => 
                                      array (
                                        'key' => 'SERVICE STATION AIR',
                                        'value' => 'SERVICE STATION AIR',
                                      ),
                                      741 => 
                                      array (
                                        'key' => 'SFS (FIRE SUPPRESSION)',
                                        'value' => 'SFS (FIRE SUPPRESSION)',
                                      ),
                                      742 => 
                                      array (
                                        'key' => 'SGOBAIN',
                                        'value' => 'SGOBAIN',
                                      ),
                                      743 => 
                                      array (
                                        'key' => 'SGOBAIN FOOD DISCHARGE',
                                        'value' => 'SGOBAIN FOOD DISCHARGE',
                                      ),
                                      744 => 
                                      array (
                                        'key' => 'SGOBAIN FOOD S&D',
                                        'value' => 'SGOBAIN FOOD S&D',
                                      ),
                                      745 => 
                                      array (
                                        'key' => 'SHELLFLEX',
                                        'value' => 'SHELLFLEX',
                                      ),
                                      746 => 
                                      array (
                                        'key' => 'SHIELD',
                                        'value' => 'SHIELD',
                                      ),
                                      747 => 
                                      array (
                                        'key' => 'SINGLE LINE (GRADE R)',
                                        'value' => 'SINGLE LINE (GRADE R)',
                                      ),
                                      748 => 
                                      array (
                                        'key' => 'SINGLE LINE (GRADE RM)',
                                        'value' => 'SINGLE LINE (GRADE RM)',
                                      ),
                                      749 => 
                                      array (
                                        'key' => 'SINGLE LINE (GRADE T)',
                                        'value' => 'SINGLE LINE (GRADE T)',
                                      ),
                                      750 => 
                                      array (
                                        'key' => 'SK CARBOV',
                                        'value' => 'SK CARBOV',
                                      ),
                                      751 => 
                                      array (
                                        'key' => 'SLURRY',
                                        'value' => 'SLURRY',
                                      ),
                                      752 => 
                                      array (
                                        'key' => 'SMOOTH BORE DOCK',
                                        'value' => 'SMOOTH BORE DOCK',
                                      ),
                                      753 => 
                                      array (
                                        'key' => 'SMOOTH BORE HOT TAR & ASPHALT',
                                        'value' => 'SMOOTH BORE HOT TAR & ASPHALT',
                                      ),
                                      754 => 
                                      array (
                                        'key' => 'SMOOTH BORE MOLTEN SULPHUR',
                                        'value' => 'SMOOTH BORE MOLTEN SULPHUR',
                                      ),
                                      755 => 
                                      array (
                                        'key' => 'SNAPON',
                                        'value' => 'SNAPON',
                                      ),
                                      756 => 
                                      array (
                                        'key' => 'SOFTUB WATER',
                                        'value' => 'SOFTUB WATER',
                                      ),
                                      757 => 
                                      array (
                                        'key' => 'SOFTWALL',
                                        'value' => 'SOFTWALL',
                                      ),
                                      758 => 
                                      array (
                                        'key' => 'SOHO PROSPECTOR WATER S&D',
                                        'value' => 'SOHO PROSPECTOR WATER S&D',
                                      ),
                                      759 => 
                                      array (
                                        'key' => 'SOUTHERN',
                                        'value' => 'SOUTHERN',
                                      ),
                                      760 => 
                                      array (
                                        'key' => 'SPARTAN PRESSURE WASHER',
                                        'value' => 'SPARTAN PRESSURE WASHER',
                                      ),
                                      761 => 
                                      array (
                                        'key' => 'SPEEDAIRE',
                                        'value' => 'SPEEDAIRE',
                                      ),
                                      762 => 
                                      array (
                                        'key' => 'SPIR SEP',
                                        'value' => 'SPIR SEP',
                                      ),
                                      763 => 
                                      array (
                                        'key' => 'SPIR SEP TPG',
                                        'value' => 'SPIR SEP TPG',
                                      ),
                                      764 => 
                                      array (
                                        'key' => 'SPIRAFLEX 1500',
                                        'value' => 'SPIRAFLEX 1500',
                                      ),
                                      765 => 
                                      array (
                                        'key' => 'SPIRAFLEX 1600',
                                        'value' => 'SPIRAFLEX 1600',
                                      ),
                                      766 => 
                                      array (
                                        'key' => 'SPIRAFLEX ACTION F.E.S',
                                        'value' => 'SPIRAFLEX ACTION F.E.S',
                                      ),
                                      767 => 
                                      array (
                                        'key' => 'SPIRAFLEX AGFLEX',
                                        'value' => 'SPIRAFLEX AGFLEX',
                                      ),
                                      768 => 
                                      array (
                                        'key' => 'SPIRAFLEX AGGIE',
                                        'value' => 'SPIRAFLEX AGGIE',
                                      ),
                                      769 => 
                                      array (
                                        'key' => 'SPIRAFLEX AIR SEEDER',
                                        'value' => 'SPIRAFLEX AIR SEEDER',
                                      ),
                                      770 => 
                                      array (
                                        'key' => 'SPIRAFLEX BARKBLOWER',
                                        'value' => 'SPIRAFLEX BARKBLOWER',
                                      ),
                                      771 => 
                                      array (
                                        'key' => 'SPIRAFLEX BLACK SUPER-DUTY LAYFLAT',
                                        'value' => 'SPIRAFLEX BLACK SUPER-DUTY LAYFLAT',
                                      ),
                                      772 => 
                                      array (
                                        'key' => 'SPIRAFLEX BLUE EXTRA LIGHT DUTY LAYFLAT',
                                        'value' => 'SPIRAFLEX BLUE EXTRA LIGHT DUTY LAYFLAT',
                                      ),
                                      773 => 
                                      array (
                                        'key' => 'SPIRAFLEX CABLE GUARD',
                                        'value' => 'SPIRAFLEX CABLE GUARD',
                                      ),
                                      774 => 
                                      array (
                                        'key' => 'SPIRAFLEX DUCTING',
                                        'value' => 'SPIRAFLEX DUCTING',
                                      ),
                                      775 => 
                                      array (
                                        'key' => 'SPIRAFLEX FGVAC',
                                        'value' => 'SPIRAFLEX FGVAC',
                                      ),
                                      776 => 
                                      array (
                                        'key' => 'SPIRAFLEX FISH SUCTION',
                                        'value' => 'SPIRAFLEX FISH SUCTION',
                                      ),
                                      777 => 
                                      array (
                                        'key' => 'SPIRAFLEX FOODVAC',
                                        'value' => 'SPIRAFLEX FOODVAC',
                                      ),
                                      778 => 
                                      array (
                                        'key' => 'SPIRAFLEX GRASSVAC',
                                        'value' => 'SPIRAFLEX GRASSVAC',
                                      ),
                                      779 => 
                                      array (
                                        'key' => 'SPIRAFLEX GRAY LIGHT DUTY LAYFLAT',
                                        'value' => 'SPIRAFLEX GRAY LIGHT DUTY LAYFLAT',
                                      ),
                                      780 => 
                                      array (
                                        'key' => 'SPIRAFLEX GREEN LAYFLAT',
                                        'value' => 'SPIRAFLEX GREEN LAYFLAT',
                                      ),
                                      781 => 
                                      array (
                                        'key' => 'SPIRAFLEX HT',
                                        'value' => 'SPIRAFLEX HT',
                                      ),
                                      782 => 
                                      array (
                                        'key' => 'SPIRAFLEX LW ROCK DUST',
                                        'value' => 'SPIRAFLEX LW ROCK DUST',
                                      ),
                                      783 => 
                                      array (
                                        'key' => 'SPIRAFLEX MULCH BLOWER',
                                        'value' => 'SPIRAFLEX MULCH BLOWER',
                                      ),
                                      784 => 
                                      array (
                                        'key' => 'SPIRAFLEX MULCHBLOWER',
                                        'value' => 'SPIRAFLEX MULCHBLOWER',
                                      ),
                                      785 => 
                                      array (
                                        'key' => 'SPIRAFLEX RED MEDIUM DUTY LAYFLAT',
                                        'value' => 'SPIRAFLEX RED MEDIUM DUTY LAYFLAT',
                                      ),
                                      786 => 
                                      array (
                                        'key' => 'SPIRAFLEX ROCK DUST',
                                        'value' => 'SPIRAFLEX ROCK DUST',
                                      ),
                                      787 => 
                                      array (
                                        'key' => 'SPIRAFLEX VACUUM',
                                        'value' => 'SPIRAFLEX VACUUM',
                                      ),
                                      788 => 
                                      array (
                                        'key' => 'SPIRAFLEX VAPOR RECOVERY',
                                        'value' => 'SPIRAFLEX VAPOR RECOVERY',
                                      ),
                                      789 => 
                                      array (
                                        'key' => 'SPIRAFLEX YELLOW HEAVY DUTY LAYFLAT',
                                        'value' => 'SPIRAFLEX YELLOW HEAVY DUTY LAYFLAT',
                                      ),
                                      790 => 
                                      array (
                                        'key' => 'SPIRAFLOW',
                                        'value' => 'SPIRAFLOW',
                                      ),
                                      791 => 
                                      array (
                                        'key' => 'SPIRATHANE HD',
                                        'value' => 'SPIRATHANE HD',
                                      ),
                                      792 => 
                                      array (
                                        'key' => 'SPIRATHANE LD',
                                        'value' => 'SPIRATHANE LD',
                                      ),
                                      793 => 
                                      array (
                                        'key' => 'SPIRATHANE PT',
                                        'value' => 'SPIRATHANE PT',
                                      ),
                                      794 => 
                                      array (
                                        'key' => 'SR12',
                                        'value' => 'SR12',
                                      ),
                                      795 => 
                                      array (
                                        'key' => 'SR13',
                                        'value' => 'SR13',
                                      ),
                                      796 => 
                                      array (
                                        'key' => 'SR14',
                                        'value' => 'SR14',
                                      ),
                                      797 => 
                                      array (
                                        'key' => 'SR14A',
                                        'value' => 'SR14A',
                                      ),
                                      798 => 
                                      array (
                                        'key' => 'SR14B',
                                        'value' => 'SR14B',
                                      ),
                                      799 => 
                                      array (
                                        'key' => 'SR15',
                                        'value' => 'SR15',
                                      ),
                                      800 => 
                                      array (
                                        'key' => 'SR16SC',
                                        'value' => 'SR16SC',
                                      ),
                                      801 => 
                                      array (
                                        'key' => 'SR18',
                                        'value' => 'SR18',
                                      ),
                                      802 => 
                                      array (
                                        'key' => 'SR1SN',
                                        'value' => 'SR1SN',
                                      ),
                                      803 => 
                                      array (
                                        'key' => 'SR2SN',
                                        'value' => 'SR2SN',
                                      ),
                                      804 => 
                                      array (
                                        'key' => 'SR3',
                                        'value' => 'SR3',
                                      ),
                                      805 => 
                                      array (
                                        'key' => 'SR5',
                                        'value' => 'SR5',
                                      ),
                                      806 => 
                                      array (
                                        'key' => 'SR6',
                                        'value' => 'SR6',
                                      ),
                                      807 => 
                                      array (
                                        'key' => 'SR7',
                                        'value' => 'SR7',
                                      ),
                                      808 => 
                                      array (
                                        'key' => 'SR8',
                                        'value' => 'SR8',
                                      ),
                                      809 => 
                                      array (
                                        'key' => 'SRS',
                                        'value' => 'SRS',
                                      ),
                                      810 => 
                                      array (
                                        'key' => 'STANDARD STRAIGHT RAD',
                                        'value' => 'STANDARD STRAIGHT RAD',
                                      ),
                                      811 => 
                                      array (
                                        'key' => 'STEAM 250',
                                        'value' => 'STEAM 250',
                                      ),
                                      812 => 
                                      array (
                                        'key' => 'STEEL AIR',
                                        'value' => 'STEEL AIR',
                                      ),
                                      813 => 
                                      array (
                                        'key' => 'STEEL AIR BOOTSTRAP',
                                        'value' => 'STEEL AIR BOOTSTRAP',
                                      ),
                                      814 => 
                                      array (
                                        'key' => 'SUBSEA CABLE',
                                        'value' => 'SUBSEA CABLE',
                                      ),
                                      815 => 
                                      array (
                                        'key' => 'SULBANA GAUNTLET',
                                        'value' => 'SULBANA GAUNTLET',
                                      ),
                                      816 => 
                                      array (
                                        'key' => 'SUNSDEA MUD',
                                        'value' => 'SUNSDEA MUD',
                                      ),
                                      817 => 
                                      array (
                                        'key' => 'SUNSET WATER S&D FIRE SERVICE',
                                        'value' => 'SUNSET WATER S&D FIRE SERVICE',
                                      ),
                                      818 => 
                                      array (
                                        'key' => 'SUPER AIR 400',
                                        'value' => 'SUPER AIR 400',
                                      ),
                                      819 => 
                                      array (
                                        'key' => 'SUPER BLACK FLEXWING',
                                        'value' => 'SUPER BLACK FLEXWING',
                                      ),
                                      820 => 
                                      array (
                                        'key' => 'SUPER ORTAC®',
                                        'value' => 'SUPER ORTAC®',
                                      ),
                                      821 => 
                                      array (
                                        'key' => 'SUPER ROCK DRILL',
                                        'value' => 'SUPER ROCK DRILL',
                                      ),
                                      822 => 
                                      array (
                                        'key' => 'SUPER ROCK DRILL HT',
                                        'value' => 'SUPER ROCK DRILL HT',
                                      ),
                                      823 => 
                                      array (
                                        'key' => 'SUPER SANI-WASH',
                                        'value' => 'SUPER SANI-WASH',
                                      ),
                                      824 => 
                                      array (
                                        'key' => 'SUPERIOR',
                                        'value' => 'SUPERIOR',
                                      ),
                                      825 => 
                                      array (
                                        'key' => 'SUPFLOW',
                                        'value' => 'SUPFLOW',
                                      ),
                                      826 => 
                                      array (
                                        'key' => 'SUPVAC',
                                        'value' => 'SUPVAC',
                                      ),
                                      827 => 
                                      array (
                                        'key' => 'SURELINE',
                                        'value' => 'SURELINE',
                                      ),
                                      828 => 
                                      array (
                                        'key' => 'SW DRY CEMENT & BARYTES',
                                        'value' => 'SW DRY CEMENT & BARYTES',
                                      ),
                                      829 => 
                                      array (
                                        'key' => 'SWAGELOK',
                                        'value' => 'SWAGELOK',
                                      ),
                                      830 => 
                                      array (
                                        'key' => 'TAN FLEXTRA',
                                        'value' => 'TAN FLEXTRA',
                                      ),
                                      831 => 
                                      array (
                                        'key' => 'TAN FLEXTRA FDA',
                                        'value' => 'TAN FLEXTRA FDA',
                                      ),
                                      832 => 
                                      array (
                                        'key' => 'TAN FLEXWING',
                                        'value' => 'TAN FLEXWING',
                                      ),
                                      833 => 
                                      array (
                                        'key' => 'TAN FLEXWING FDA',
                                        'value' => 'TAN FLEXWING FDA',
                                      ),
                                      834 => 
                                      array (
                                        'key' => 'TANK CLEANING',
                                        'value' => 'TANK CLEANING',
                                      ),
                                      835 => 
                                      array (
                                        'key' => 'TANKER BARGE DISCHARGE',
                                        'value' => 'TANKER BARGE DISCHARGE',
                                      ),
                                      836 => 
                                      array (
                                        'key' => 'TEFLON',
                                        'value' => 'TEFLON',
                                      ),
                                      837 => 
                                      array (
                                        'key' => 'TETRA',
                                        'value' => 'TETRA',
                                      ),
                                      838 => 
                                      array (
                                        'key' => 'THERMIDOR',
                                        'value' => 'THERMIDOR',
                                      ),
                                      839 => 
                                      array (
                                        'key' => 'THOMPSON FLEX XLPE',
                                        'value' => 'THOMPSON FLEX XLPE',
                                      ),
                                      840 => 
                                      array (
                                        'key' => 'THUNDER INSTA-GRIP',
                                        'value' => 'THUNDER INSTA-GRIP',
                                      ),
                                      841 => 
                                      array (
                                        'key' => 'TIG WELDING',
                                        'value' => 'TIG WELDING',
                                      ),
                                      842 => 
                                      array (
                                        'key' => 'TIMCO',
                                        'value' => 'TIMCO',
                                      ),
                                      843 => 
                                      array (
                                        'key' => 'TIPCO PREMIUM GARDEN',
                                        'value' => 'TIPCO PREMIUM GARDEN',
                                      ),
                                      844 => 
                                      array (
                                        'key' => 'TORRIDAIR',
                                        'value' => 'TORRIDAIR',
                                      ),
                                      845 => 
                                      array (
                                        'key' => 'TOW CABLE',
                                        'value' => 'TOW CABLE',
                                      ),
                                      846 => 
                                      array (
                                        'key' => 'TR7',
                                        'value' => 'TR7',
                                      ),
                                      847 => 
                                      array (
                                        'key' => 'TR8',
                                        'value' => 'TR8',
                                      ),
                                      848 => 
                                      array (
                                        'key' => 'TRANSPLY',
                                        'value' => 'TRANSPLY',
                                      ),
                                      849 => 
                                      array (
                                        'key' => 'TRIDENT',
                                        'value' => 'TRIDENT',
                                      ),
                                      850 => 
                                      array (
                                        'key' => 'TRIDENT SER',
                                        'value' => 'TRIDENT SER',
                                      ),
                                      851 => 
                                      array (
                                        'key' => 'TRINCO BLAST',
                                        'value' => 'TRINCO BLAST',
                                      ),
                                      852 => 
                                      array (
                                        'key' => 'TRIPLX',
                                        'value' => 'TRIPLX',
                                      ),
                                      853 => 
                                      array (
                                        'key' => 'TRIX ACETYLENE',
                                        'value' => 'TRIX ACETYLENE',
                                      ),
                                      854 => 
                                      array (
                                        'key' => 'TRIX BLAUSTRAHL',
                                        'value' => 'TRIX BLAUSTRAHL',
                                      ),
                                      855 => 
                                      array (
                                        'key' => 'TRIX BRAKE',
                                        'value' => 'TRIX BRAKE',
                                      ),
                                      856 => 
                                      array (
                                        'key' => 'TRIX FUEL',
                                        'value' => 'TRIX FUEL',
                                      ),
                                      857 => 
                                      array (
                                        'key' => 'TRIX MULTIFOOD',
                                        'value' => 'TRIX MULTIFOOD',
                                      ),
                                      858 => 
                                      array (
                                        'key' => 'TRIX NITRO',
                                        'value' => 'TRIX NITRO',
                                      ),
                                      859 => 
                                      array (
                                        'key' => 'TRIX OXYGEN',
                                        'value' => 'TRIX OXYGEN',
                                      ),
                                      860 => 
                                      array (
                                        'key' => 'TRIX PAINT SPRAY',
                                        'value' => 'TRIX PAINT SPRAY',
                                      ),
                                      861 => 
                                      array (
                                        'key' => 'TRIX RESPIRATION',
                                        'value' => 'TRIX RESPIRATION',
                                      ),
                                      862 => 
                                      array (
                                        'key' => 'TRIX ROSTRAHL',
                                        'value' => 'TRIX ROSTRAHL',
                                      ),
                                      863 => 
                                      array (
                                        'key' => 'TRIX SUPER',
                                        'value' => 'TRIX SUPER',
                                      ),
                                      864 => 
                                      array (
                                        'key' => 'TUNNELCOTE ROCK DUST FLEXTRA',
                                        'value' => 'TUNNELCOTE ROCK DUST FLEXTRA',
                                      ),
                                      865 => 
                                      array (
                                        'key' => 'TUNNELCOTE ROCK DUST FLEXWING',
                                        'value' => 'TUNNELCOTE ROCK DUST FLEXWING',
                                      ),
                                      866 => 
                                      array (
                                        'key' => 'TWIN-LINE (GRADE R)',
                                        'value' => 'TWIN-LINE (GRADE R)',
                                      ),
                                      867 => 
                                      array (
                                        'key' => 'TWIN-LINE (GRADE RM)',
                                        'value' => 'TWIN-LINE (GRADE RM)',
                                      ),
                                      868 => 
                                      array (
                                        'key' => 'TWIN-LINE (GRADE T)',
                                        'value' => 'TWIN-LINE (GRADE T)',
                                      ),
                                      869 => 
                                      array (
                                        'key' => 'TWIN-LINE ISO 3821',
                                        'value' => 'TWIN-LINE ISO 3821',
                                      ),
                                      870 => 
                                      array (
                                        'key' => 'UL 92 FIRE EXTINGUISHER',
                                        'value' => 'UL 92 FIRE EXTINGUISHER',
                                      ),
                                      871 => 
                                      array (
                                        'key' => 'ULTRABRAID',
                                        'value' => 'ULTRABRAID',
                                      ),
                                      872 => 
                                      array (
                                        'key' => 'ULTRAFLEX',
                                        'value' => 'ULTRAFLEX',
                                      ),
                                      873 => 
                                      array (
                                        'key' => 'ULTRAMAR',
                                        'value' => 'ULTRAMAR',
                                      ),
                                      874 => 
                                      array (
                                        'key' => 'UNDERHILL',
                                        'value' => 'UNDERHILL',
                                      ),
                                      875 => 
                                      array (
                                        'key' => 'UNISOURCE',
                                        'value' => 'UNISOURCE',
                                      ),
                                      876 => 
                                      array (
                                        'key' => 'UNITRIX 60',
                                        'value' => 'UNITRIX 60',
                                      ),
                                      877 => 
                                      array (
                                        'key' => 'UNITRIX 80',
                                        'value' => 'UNITRIX 80',
                                      ),
                                      878 => 
                                      array (
                                        'key' => 'UNPRINTED SPRAY SALVAGE',
                                        'value' => 'UNPRINTED SPRAY SALVAGE',
                                      ),
                                      879 => 
                                      array (
                                        'key' => 'V-50 S&D',
                                        'value' => 'V-50 S&D',
                                      ),
                                      880 => 
                                      array (
                                        'key' => 'VACUUM',
                                        'value' => 'VACUUM',
                                      ),
                                      881 => 
                                      array (
                                        'key' => 'VAPOR RECOVERY',
                                        'value' => 'VAPOR RECOVERY',
                                      ),
                                      882 => 
                                      array (
                                        'key' => 'VAPOR RECOVERY DOCK',
                                        'value' => 'VAPOR RECOVERY DOCK',
                                      ),
                                      883 => 
                                      array (
                                        'key' => 'VARIFLEX',
                                        'value' => 'VARIFLEX',
                                      ),
                                      884 => 
                                      array (
                                        'key' => 'VELOCITY BANDING COIL',
                                        'value' => 'VELOCITY BANDING COIL',
                                      ),
                                      885 => 
                                      array (
                                        'key' => 'VELOCITY BEVERAGE TRANSFER',
                                        'value' => 'VELOCITY BEVERAGE TRANSFER',
                                      ),
                                      886 => 
                                      array (
                                        'key' => 'VELOCITY PETROLEUM TRANSFER',
                                        'value' => 'VELOCITY PETROLEUM TRANSFER',
                                      ),
                                      887 => 
                                      array (
                                        'key' => 'VELOCITY WATER TRANSFER',
                                        'value' => 'VELOCITY WATER TRANSFER',
                                      ),
                                      888 => 
                                      array (
                                        'key' => 'VERSACHEM',
                                        'value' => 'VERSACHEM',
                                      ),
                                      889 => 
                                      array (
                                        'key' => 'VERSACRETE',
                                        'value' => 'VERSACRETE',
                                      ),
                                      890 => 
                                      array (
                                        'key' => 'VERSAFUEL EN1765 S15',
                                        'value' => 'VERSAFUEL EN1765 S15',
                                      ),
                                      891 => 
                                      array (
                                        'key' => 'VERSAFUEL FLEX',
                                        'value' => 'VERSAFUEL FLEX',
                                      ),
                                      892 => 
                                      array (
                                        'key' => 'VERSIFLO DISCHARGE',
                                        'value' => 'VERSIFLO DISCHARGE',
                                      ),
                                      893 => 
                                      array (
                                        'key' => 'VERSIFLO S&D',
                                        'value' => 'VERSIFLO S&D',
                                      ),
                                      894 => 
                                      array (
                                        'key' => 'VICTOR',
                                        'value' => 'VICTOR',
                                      ),
                                      895 => 
                                      array (
                                        'key' => 'VINTNER',
                                        'value' => 'VINTNER',
                                      ),
                                      896 => 
                                      array (
                                        'key' => 'VINTNER MICROBAN',
                                        'value' => 'VINTNER MICROBAN',
                                      ),
                                      897 => 
                                      array (
                                        'key' => 'VINTNER RESERVE',
                                        'value' => 'VINTNER RESERVE',
                                      ),
                                      898 => 
                                      array (
                                        'key' => 'VIPER',
                                        'value' => 'VIPER',
                                      ),
                                      899 => 
                                      array (
                                        'key' => 'WAB SLURRY',
                                        'value' => 'WAB SLURRY',
                                      ),
                                      900 => 
                                      array (
                                        'key' => 'WASHDOWN',
                                        'value' => 'WASHDOWN',
                                      ),
                                      901 => 
                                      array (
                                        'key' => 'WASTE MATE',
                                        'value' => 'WASTE MATE',
                                      ),
                                      902 => 
                                      array (
                                        'key' => 'WATER & AIR HD',
                                        'value' => 'WATER & AIR HD',
                                      ),
                                      903 => 
                                      array (
                                        'key' => 'WATER DISCHARGE',
                                        'value' => 'WATER DISCHARGE',
                                      ),
                                      904 => 
                                      array (
                                        'key' => 'WATER DISCHARGE HD',
                                        'value' => 'WATER DISCHARGE HD',
                                      ),
                                      905 => 
                                      array (
                                        'key' => 'WATER HD',
                                        'value' => 'WATER HD',
                                      ),
                                      906 => 
                                      array (
                                        'key' => 'WATER JETTING 1000',
                                        'value' => 'WATER JETTING 1000',
                                      ),
                                      907 => 
                                      array (
                                        'key' => 'WATER JETTING 500',
                                        'value' => 'WATER JETTING 500',
                                      ),
                                      908 => 
                                      array (
                                        'key' => 'WATER REHAB',
                                        'value' => 'WATER REHAB',
                                      ),
                                      909 => 
                                      array (
                                        'key' => 'WATER SUCTION & DISCHARGE',
                                        'value' => 'WATER SUCTION & DISCHARGE',
                                      ),
                                      910 => 
                                      array (
                                        'key' => 'WESTERN',
                                        'value' => 'WESTERN',
                                      ),
                                      911 => 
                                      array (
                                        'key' => 'WHALE OIL',
                                        'value' => 'WHALE OIL',
                                      ),
                                      912 => 
                                      array (
                                        'key' => 'WHALE WATER',
                                        'value' => 'WHALE WATER',
                                      ),
                                      913 => 
                                      array (
                                        'key' => 'WHIPEND BLAST',
                                        'value' => 'WHIPEND BLAST',
                                      ),
                                      914 => 
                                      array (
                                        'key' => 'WHITE FLEXTRA',
                                        'value' => 'WHITE FLEXTRA',
                                      ),
                                      915 => 
                                      array (
                                        'key' => 'WHITE FLEXWING',
                                        'value' => 'WHITE FLEXWING',
                                      ),
                                      916 => 
                                      array (
                                        'key' => 'WHITEWATER',
                                        'value' => 'WHITEWATER',
                                      ),
                                      917 => 
                                      array (
                                        'key' => 'WINGCRAFT',
                                        'value' => 'WINGCRAFT',
                                      ),
                                      918 => 
                                      array (
                                        'key' => 'WIRE INSERTED RADIATOR HOSE',
                                        'value' => 'WIRE INSERTED RADIATOR HOSE',
                                      ),
                                      919 => 
                                      array (
                                        'key' => 'WOODMI SAWDUST',
                                        'value' => 'WOODMI SAWDUST',
                                      ),
                                      920 => 
                                      array (
                                        'key' => 'X-LIFE XCP3',
                                        'value' => 'X-LIFE XCP3',
                                      ),
                                      921 => 
                                      array (
                                        'key' => 'X-LIFE XCP3S',
                                        'value' => 'X-LIFE XCP3S',
                                      ),
                                      922 => 
                                      array (
                                        'key' => 'X-LIFE XCP4',
                                        'value' => 'X-LIFE XCP4',
                                      ),
                                      923 => 
                                      array (
                                        'key' => 'X-LIFE XCP4S',
                                        'value' => 'X-LIFE XCP4S',
                                      ),
                                      924 => 
                                      array (
                                        'key' => 'X-LIFE XCP5S',
                                        'value' => 'X-LIFE XCP5S',
                                      ),
                                      925 => 
                                      array (
                                        'key' => 'X-LIFE XCP6S',
                                        'value' => 'X-LIFE XCP6S',
                                      ),
                                      926 => 
                                      array (
                                        'key' => 'X-LIFE XR16SC',
                                        'value' => 'X-LIFE XR16SC',
                                      ),
                                      927 => 
                                      array (
                                        'key' => 'XF BLAST',
                                        'value' => 'XF BLAST',
                                      ),
                                      928 => 
                                      array (
                                        'key' => 'XLPE CHEMICAL TRANSFER',
                                        'value' => 'XLPE CHEMICAL TRANSFER',
                                      ),
                                      929 => 
                                      array (
                                        'key' => 'XPOWER',
                                        'value' => 'XPOWER',
                                      ),
                                      930 => 
                                      array (
                                        'key' => 'YARDMASTER GARDEN HOSE',
                                        'value' => 'YARDMASTER GARDEN HOSE',
                                      ),
                                      931 => 
                                      array (
                                        'key' => 'YELLOW FLEXWING',
                                        'value' => 'YELLOW FLEXWING',
                                      ),
                                      932 => 
                                      array (
                                        'key' => 'YUKON',
                                        'value' => 'YUKON',
                                      ),
                                      933 => 
                                      array (
                                        'key' => 'YUKON SPIRAFLEX',
                                        'value' => 'YUKON SPIRAFLEX',
                                      ),
                                      934 => 
                                      array (
                                        'key' => 'ZZH561K-AA2',
                                        'value' => 'ZZH561K-AA2',
                                      ),
                                      935 => 
                                      array (
                                        'key' => 'ZZH561K-BA2',
                                        'value' => 'ZZH561K-BA2',
                                      ),
                                      936 => 
                                      array (
                                        'key' => 'ZZH601 3-2',
                                        'value' => 'ZZH601 3-2',
                                      ),
                                    ),
                                     'width' => 300,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                     'optionsProviderData' => 'Brand|Name',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'brandName',
                                     'title' => 'Brand Name',
                                     'tooltip' => '
',
                                     'mandatory' => false,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'shelfLife',
                                     'title' => 'Shelf Life',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'nitrosamines',
                                     'title' => 'Nitrosamines',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'rohs',
                                     'title' => 'Rohs',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'reach',
                                     'title' => 'Reach',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'fieldtype' => 'textarea',
                                     'width' => 300,
                                     'height' => '',
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'queryColumnType' => 'longtext',
                                     'columnType' => 'longtext',
                                     'phpdocType' => 'string',
                                     'name' => 'prop65Message',
                                     'title' => 'Prop 65 Message',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  )),
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                     'fieldtype' => 'multiselect',
                                     'options' => 
                                    array (
                                    ),
                                     'width' => 300,
                                     'height' => '',
                                     'maxItems' => '',
                                     'renderType' => 'tags',
                                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                                     'optionsProviderData' => 'INH-HYD-HOSE',
                                     'queryColumnType' => 'text',
                                     'columnType' => 'text',
                                     'phpdocType' => 'array',
                                     'dynamicOptions' => false,
                                     'name' => 'fittingFamily',
                                     'title' => 'Fitting Family',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                  )),
                                ),
                                 'locked' => false,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 200,
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'name' => 'Field Container',
                                 'type' => NULL,
                                 'region' => NULL,
                                 'title' => '',
                                 'width' => NULL,
                                 'height' => NULL,
                                 'collapsible' => false,
                                 'collapsed' => false,
                                 'bodyStyle' => 'margin-left: 20px;',
                                 'datatype' => 'layout',
                                 'permissions' => NULL,
                                 'childs' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'fieldtype' => 'textarea',
                                     'width' => 300,
                                     'height' => 100,
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'queryColumnType' => 'longtext',
                                     'columnType' => 'longtext',
                                     'phpdocType' => 'string',
                                     'name' => 'numeratorForConversionToBaseUnitsOfMeasure',
                                     'title' => 'Numerator for Conversion to Base Units of Measure',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'alternativeUnitOfMeasureForStockkeepingUnit',
                                     'title' => 'Alternative Unit of Measure for Stockkeeping Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'denominatorForConversionToBaseUnitsOfMeasure',
                                     'title' => 'Denominator for conversion to base units of measure',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'californiaProposition65ChemicalName1',
                                     'title' => 'California Proposition65 Chemical Name1',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'californiaProposition65ChemicalName2',
                                     'title' => 'California Proposition 65 Chemical Name2',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'californiaProposition65ChemicalName3',
                                     'title' => 'California Proposition 65 Chemical Name3',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'searchKeywords',
                                     'title' => 'Search Keywords',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'webDiscription',
                                     'title' => 'Web Description',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
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
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'proposition65WarningAttributesRequired',
                                     'title' => 'Proposition 65 warning attributes required',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                  )),
                                ),
                                 'locked' => false,
                              )),
                            ),
                             'locked' => false,
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                             'fieldtype' => 'localizedfields',
                             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                             'childs' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 100,
                                 'layout' => 'hbox',
                                 'fieldLabel' => '',
                                 'name' => 'Field Container',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                     'fieldtype' => 'fieldcontainer',
                                     'labelWidth' => 220,
                                     'layout' => 'vbox',
                                     'fieldLabel' => '',
                                     'name' => 'Field Container',
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                         'fieldtype' => 'multiselect',
                                         'options' => 
                                        array (
                                        ),
                                         'width' => '',
                                         'height' => '',
                                         'maxItems' => 5,
                                         'renderType' => 'list',
                                         'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                         'optionsProviderData' => 'Features|Name',
                                         'queryColumnType' => 'text',
                                         'columnType' => 'text',
                                         'phpdocType' => 'array',
                                         'dynamicOptions' => false,
                                         'name' => 'FeaturesBenefitsBulletPoint',
                                         'title' => 'Features & Benefits Bullet Points',
                                         'tooltip' => '',
                                         'mandatory' => false,
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
                                      )),
                                      1 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'fieldtype' => 'input',
                                         'width' => 300,
                                         'defaultValue' => NULL,
                                         'queryColumnType' => 'varchar',
                                         'columnType' => 'varchar',
                                         'columnLength' => 190,
                                         'phpdocType' => 'string',
                                         'regex' => '',
                                         'unique' => false,
                                         'showCharCount' => false,
                                         'name' => 'legalText',
                                         'title' => 'Legal Text',
                                         'tooltip' => '',
                                         'mandatory' => false,
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
                                      2 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'fieldtype' => 'input',
                                         'width' => 300,
                                         'defaultValue' => NULL,
                                         'queryColumnType' => 'varchar',
                                         'columnType' => 'varchar',
                                         'columnLength' => 190,
                                         'phpdocType' => 'string',
                                         'regex' => '',
                                         'unique' => false,
                                         'showCharCount' => false,
                                         'name' => 'Application',
                                         'title' => 'Application (What does the hose convey?)',
                                         'tooltip' => 'Application - What does the hose convey?',
                                         'mandatory' => false,
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
                                      3 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'fieldtype' => 'input',
                                         'width' => 300,
                                         'defaultValue' => NULL,
                                         'queryColumnType' => 'varchar',
                                         'columnType' => 'varchar',
                                         'columnLength' => 190,
                                         'phpdocType' => 'string',
                                         'regex' => '',
                                         'unique' => false,
                                         'showCharCount' => false,
                                         'name' => 'BrandShortText1',
                                         'title' => 'Brand Short Text 1',
                                         'tooltip' => '',
                                         'mandatory' => false,
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
                                      4 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'fieldtype' => 'input',
                                         'width' => 300,
                                         'defaultValue' => NULL,
                                         'queryColumnType' => 'varchar',
                                         'columnType' => 'varchar',
                                         'columnLength' => 190,
                                         'phpdocType' => 'string',
                                         'regex' => '',
                                         'unique' => false,
                                         'showCharCount' => false,
                                         'name' => 'BrandShortText2',
                                         'title' => 'Brand Short Text 2',
                                         'tooltip' => '',
                                         'mandatory' => false,
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
                                      5 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'fieldtype' => 'input',
                                         'width' => 300,
                                         'defaultValue' => NULL,
                                         'queryColumnType' => 'varchar',
                                         'columnType' => 'varchar',
                                         'columnLength' => 190,
                                         'phpdocType' => 'string',
                                         'regex' => '',
                                         'unique' => false,
                                         'showCharCount' => false,
                                         'name' => 'BrandShortText3',
                                         'title' => 'Brand Short Text 3',
                                         'tooltip' => '',
                                         'mandatory' => false,
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
                                      6 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'fieldtype' => 'input',
                                         'width' => 300,
                                         'defaultValue' => NULL,
                                         'queryColumnType' => 'varchar',
                                         'columnType' => 'varchar',
                                         'columnLength' => 190,
                                         'phpdocType' => 'string',
                                         'regex' => '',
                                         'unique' => false,
                                         'showCharCount' => false,
                                         'name' => 'BrandShortText4',
                                         'title' => 'Brand Short Text 4',
                                         'tooltip' => '',
                                         'mandatory' => false,
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
                                      7 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'fieldtype' => 'input',
                                         'width' => 300,
                                         'defaultValue' => NULL,
                                         'queryColumnType' => 'varchar',
                                         'columnType' => 'varchar',
                                         'columnLength' => 190,
                                         'phpdocType' => 'string',
                                         'regex' => '',
                                         'unique' => false,
                                         'showCharCount' => false,
                                         'name' => 'BrandShortText5',
                                         'title' => 'Brand Short Text 5',
                                         'tooltip' => '',
                                         'mandatory' => false,
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
                                    ),
                                     'locked' => false,
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                     'fieldtype' => 'fieldcontainer',
                                     'labelWidth' => 220,
                                     'layout' => 'vbox',
                                     'fieldLabel' => '',
                                     'name' => 'Field Container',
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                         'fieldtype' => 'wysiwyg',
                                         'width' => 300,
                                         'height' => 150,
                                         'queryColumnType' => 'longtext',
                                         'columnType' => 'longtext',
                                         'phpdocType' => 'string',
                                         'toolbarConfig' => '',
                                         'excludeFromSearchIndex' => false,
                                         'name' => 'shortDescription',
                                         'title' => 'Marketing / Short Description',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-left:20px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                      1 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                         'fieldtype' => 'wysiwyg',
                                         'width' => 300,
                                         'height' => '',
                                         'queryColumnType' => 'longtext',
                                         'columnType' => 'longtext',
                                         'phpdocType' => 'string',
                                         'toolbarConfig' => '',
                                         'excludeFromSearchIndex' => false,
                                         'name' => 'longDescription',
                                         'title' => 'Marketing / Long Description',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-left:20px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                    ),
                                     'locked' => false,
                                  )),
                                ),
                                 'locked' => false,
                              )),
                            ),
                             'name' => 'localizedfields',
                             'region' => NULL,
                             'layout' => NULL,
                             'title' => '',
                             'width' => '',
                             'height' => '',
                             'maxTabs' => NULL,
                             'labelWidth' => 100,
                             'border' => false,
                             'provideSplitView' => false,
                             'tabPosition' => NULL,
                             'hideLabelsWhenTabsReached' => -1,
                             'referencedFields' => 
                            array (
                            ),
                             'fieldDefinitionsCache' => NULL,
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => NULL,
                             'locked' => false,
                             'style' => '',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => true,
                             'visibleSearch' => true,
                          )),
                        ),
                         'locked' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => '9 Digit Attributes',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '9 Digit Attributes',
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
                          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                             'fieldtype' => 'textarea',
                             'width' => 300,
                             'height' => 100,
                             'maxLength' => NULL,
                             'showCharCount' => false,
                             'excludeFromSearchIndex' => false,
                             'queryColumnType' => 'longtext',
                             'columnType' => 'longtext',
                             'phpdocType' => 'string',
                             'name' => 'BrandingLayline',
                             'title' => 'Branding / Layline',
                             'tooltip' => '',
                             'mandatory' => false,
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
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'fieldtype' => 'input',
                             'width' => 300,
                             'defaultValue' => NULL,
                             'queryColumnType' => 'varchar',
                             'columnType' => 'varchar',
                             'columnLength' => 190,
                             'phpdocType' => 'string',
                             'regex' => '',
                             'unique' => false,
                             'showCharCount' => false,
                             'name' => 'VirtualCatalogBrandingLayline',
                             'title' => 'Virtual Catalog Branding / Layline',
                             'tooltip' => '',
                             'mandatory' => false,
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
                        ),
                         'locked' => false,
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Packaging',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Packaging',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => true,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'name' => 'Field Container',
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 200,
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'name' => 'Field Container',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'packageLengthIN',
                                     'title' => 'Package Length (in)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'packageWidthIN',
                                     'title' => 'Package Width (in)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'packageWeightLBS',
                                     'title' => 'Package Weight (lbs)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'packageHeightIN',
                                     'title' => 'Package Height (in)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'caseLengthIN',
                                     'title' => 'Case Length (in)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'caseHeightIN',
                                     'title' => 'Case Height (in)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'caseWidthIN',
                                     'title' => 'Case Width (in)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'caseWeightLBS',
                                     'title' => 'Case Weight (lbs)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'palletLengthIN',
                                     'title' => 'Pallet Length (in)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  9 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'palletHeightIN',
                                     'title' => 'Pallet Height (in)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  10 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'palletWidthIN',
                                     'title' => 'Pallet Width (in)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  11 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'palletWeightLBS',
                                     'title' => 'Pallet Weight (lbs)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                ),
                                 'locked' => false,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 200,
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'name' => 'Field Container',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'numberOfItems',
                                     'title' => 'Number of Items',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'casePackQuantity',
                                     'title' => 'Case Pack Quantity',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'orderIncrement',
                                     'title' => 'Order Increment',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'minimumOrderQuantity',
                                     'title' => 'Minimum Order Quantity',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'numberOfCoils',
                                     'title' => 'Number of Coils',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'tieBundles',
                                     'title' => 'Tie Bundles ',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'bundlesOfQuantity',
                                     'title' => 'Bundles of Quantity',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                              )),
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Temperatures',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Temperatures',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => true,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'name' => 'Field Container',
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 230,
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'name' => 'Field Container',
                                 'type' => NULL,
                                 'region' => NULL,
                                 'title' => '',
                                 'width' => 400,
                                 'height' => NULL,
                                 'collapsible' => false,
                                 'collapsed' => false,
                                 'bodyStyle' => '',
                                 'datatype' => 'layout',
                                 'permissions' => NULL,
                                 'childs' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'minimumTemperatureF',
                                     'title' => 'Min Temp °F',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'maximumTemperatureF',
                                     'title' => 'Max temp °F',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'rangeTemperatureF',
                                     'title' => 'Temperature Range (°F)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => NULL,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'temperatureRangeFAndC',
                                     'title' => 'Temperature Range (°F & C°)',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                ),
                                 'locked' => false,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 230,
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'name' => 'Field Container',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'minimumTemperatureC',
                                     'title' => 'Min Temp °C',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'maximumTemperatureC',
                                     'title' => 'Max temp °C',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'rangeTemperatureC',
                                     'title' => 'Temperature Range (°C)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'temperatureRangeApplication',
                                     'title' => 'Temperature Range Application',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                              )),
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Configurations',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Configurations',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => true,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'name' => 'Field Container',
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 230,
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'name' => 'Field Container',
                                 'type' => NULL,
                                 'region' => NULL,
                                 'title' => '',
                                 'width' => 400,
                                 'height' => NULL,
                                 'collapsible' => false,
                                 'collapsed' => false,
                                 'bodyStyle' => '',
                                 'datatype' => 'layout',
                                 'permissions' => NULL,
                                 'childs' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
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
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'succesorFlag',
                                     'title' => 'Succesor / Supercession Flag',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
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
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'B2CStoreFlag',
                                     'title' => 'B2C Store Flag',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
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
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'printedCatalogFlag',
                                     'title' => 'Printed Catalog Flag',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
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
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'virtualCatalogFlag',
                                     'title' => 'Virtual Catalog Flag',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  )),
                                ),
                                 'locked' => false,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 230,
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'name' => 'Field Container',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
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
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'returnFlag',
                                     'title' => 'Return Flag',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
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
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'rebateFlag',
                                     'title' => 'Rebate Flag',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
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
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'newItemFlagForCatalog',
                                     'title' => 'New Item Flag for Catalog',
                                     'tooltip' => '',
                                     'mandatory' => false,
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
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Base',
                                        'value' => 'base',
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Skeleton',
                                        'value' => 'skeleton',
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'Fert',
                                        'value' => 'fert',
                                      ),
                                    ),
                                     'width' => 300,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'ProductType',
                                     'title' => 'ProductType',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'IFS',
                                        'value' => 'IFS',
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'PTG',
                                        'value' => 'PTG',
                                      ),
                                    ),
                                     'width' => '',
                                     'defaultValue' => 'IFS',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'BusinessUnit',
                                     'title' => 'Business Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => '',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => true,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                              )),
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                    ),
                     'locked' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/overlay-edit.svg',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'SIOP Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'SIOP Data',
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => 'Imported From SAP',
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
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'fieldtype' => 'input',
                         'width' => 300,
                         'defaultValue' => NULL,
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'regex' => '',
                         'unique' => false,
                         'showCharCount' => false,
                         'name' => 'siopFullCode',
                         'title' => 'SIOP Full Code',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => true,
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
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel1',
                         'title' => 'SIOP Level 1',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel2',
                         'title' => 'SIOP Level 2',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel3',
                         'title' => 'SIOP Level 3',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel4',
                         'title' => 'SIOP Level 4',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      6 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel5',
                         'title' => 'SIOP Level 5',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      7 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel6',
                         'title' => 'SIOP Level 6',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                    ),
                     'locked' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/genealogy.svg',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'PlantAndSalesData',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Plant & Sales Data',
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => 'Imported From SAP',
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
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ReverseManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'reverseManyToManyObjectRelation',
                         'ownerClassName' => 'SalesMaterialMaster',
                         'ownerClassId' => NULL,
                         'ownerFieldName' => 'Material',
                         'lazyLoading' => true,
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => NULL,
                         'allowToCreateNewObject' => true,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SalesOrgData',
                         'title' => 'Sales Data',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ReverseManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'reverseManyToManyObjectRelation',
                         'ownerClassName' => 'PlantMaterialMaster',
                         'ownerClassId' => NULL,
                         'ownerFieldName' => 'Material',
                         'lazyLoading' => true,
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => NULL,
                         'allowToCreateNewObject' => true,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'Plants',
                         'title' => 'Plants Data',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                    ),
                     'locked' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/candle_sticks.svg',
                  )),
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
             'icon' => '',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Base',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Brand Data',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                 'fieldtype' => 'objectbricks',
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Objectbrick',
                 'allowedTypes' => 
                array (
                  0 => 'HoseBase',
                  1 => 'PTGBase',
                ),
                 'maxItems' => '',
                 'border' => false,
                 'name' => 'Base',
                 'title' => '',
                 'tooltip' => '',
                 'mandatory' => false,
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
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_yellow.png',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Skeleton',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Skeleton Data',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                 'fieldtype' => 'objectbricks',
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Objectbrick',
                 'allowedTypes' => 
                array (
                  0 => 'HoseSkeleton',
                  1 => 'PTGSkeleton',
                ),
                 'maxItems' => '',
                 'border' => false,
                 'name' => 'Skeleton',
                 'title' => '',
                 'tooltip' => '',
                 'mandatory' => false,
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
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_blue.png',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Fert',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Fert Data',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                 'fieldtype' => 'objectbricks',
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Objectbrick',
                 'allowedTypes' => 
                array (
                  0 => 'AccessoriesFert',
                  1 => 'BeltsFert',
                  2 => 'HoseFert',
                  3 => 'HydFittingsFert',
                  4 => 'INHFittingsFert',
                  5 => 'MetalFert',
                  6 => 'PTGFert',
                  7 => 'SynchronousFert',
                ),
                 'maxItems' => '',
                 'border' => false,
                 'name' => 'Fert',
                 'title' => '',
                 'tooltip' => '',
                 'mandatory' => false,
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
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_green.png',
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Digital Assets',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Digital Assets',
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
                 'fieldtype' => 'tabpanel',
                 'border' => false,
                 'tabPosition' => NULL,
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Product Images',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 300,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'mainImage',
                         'title' => 'MainImage',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 300,
                         'height' => '',
                         'uploadPath' => '/Continental Aftermarket/Products/IAM ATE/Disc/Brake Disc',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'frontView',
                         'title' => 'Front view',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 300,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'sideView',
                         'title' => 'Side view',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 300,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'cutView',
                         'title' => 'Cut view',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; clear:right;',
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Documents',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
                         'fieldtype' => 'manyToManyRelation',
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'assetUploadPath' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'objectsAllowed' => false,
                         'assetsAllowed' => true,
                         'assetTypes' => 
                        array (
                          0 => 
                          array (
                            'assetTypes' => 'image',
                          ),
                          1 => 
                          array (
                            'assetTypes' => 'document',
                          ),
                          2 => 
                          array (
                            'assetTypes' => 'video',
                          ),
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'classes' => 
                        array (
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'Document',
                         'title' => 'Document',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'datatype' => 'data',
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
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/image-region.svg',
          )),
          5 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Pricing Data',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Pricing Data',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Table::__set_state(array(
                 'fieldtype' => 'table',
                 'width' => '',
                 'height' => '',
                 'cols' => 7,
                 'colsFixed' => true,
                 'rows' => '',
                 'rowsFixed' => false,
                 'data' => '',
                 'columnConfigActivated' => true,
                 'columnConfig' => 
                array (
                  0 => 
                  array (
                    'key' => '0',
                    'label' => 'Unique ID',
                  ),
                  1 => 
                  array (
                    'key' => '1',
                    'label' => 'Sales Organization',
                  ),
                  2 => 
                  array (
                    'key' => '2',
                    'label' => 'Distribution Channel',
                  ),
                  3 => 
                  array (
                    'key' => '3',
                    'label' => 'Validity End Date',
                  ),
                  4 => 
                  array (
                    'key' => '4',
                    'label' => 'Validity Start Date',
                  ),
                  5 => 
                  array (
                    'key' => '5',
                    'label' => 'Rate',
                  ),
                  6 => 
                  array (
                    'key' => '6',
                    'label' => 'Rate Unit',
                  ),
                ),
                 'queryColumnType' => 'longtext',
                 'columnType' => 'longtext',
                 'phpdocType' => 'array',
                 'name' => 'priceData',
                 'title' => 'Price Data',
                 'tooltip' => '',
                 'mandatory' => false,
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
              )),
            ),
             'locked' => false,
             'icon' => '',
          )),
          6 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Completeness',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Completeness',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                 'fieldtype' => 'localizedfields',
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                 'childs' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 600,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'CompletenessPercentage',
                     'title' => 'Completeness Percentage',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: #d9edf7; border-color: #bce8f1 !important; color: #31708f;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'fieldtype' => 'textarea',
                     'width' => 600,
                     'height' => 500,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'name' => 'EmptyFields',
                     'title' => 'Empty Fields',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                ),
                 'name' => 'localizedfields',
                 'region' => NULL,
                 'layout' => NULL,
                 'title' => '',
                 'width' => '',
                 'height' => '',
                 'maxTabs' => NULL,
                 'labelWidth' => 200,
                 'border' => false,
                 'provideSplitView' => false,
                 'tabPosition' => NULL,
                 'hideLabelsWhenTabsReached' => -1,
                 'referencedFields' => 
                array (
                ),
                 'fieldDefinitionsCache' => NULL,
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => NULL,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
              )),
            ),
             'locked' => false,
             'icon' => '',
          )),
        ),
         'locked' => false,
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
   'icon' => '',
   'previewUrl' => '',
   'group' => 'Products Data',
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
