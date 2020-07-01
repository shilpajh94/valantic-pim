<?php 

/** 
* Generated at: 2020-06-30T07:52:57+02:00
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
- weightg [numeric]
- weightKg [numeric]
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
- OutsidePurchaseFlag [checkbox]
- brandName [select]
- shelfLife [input]
- nitrosamines [input]
- rohs [input]
- reach [input]
- prop65Message [textarea]
- fittingFamily [multiselect]
- reinforcement [multiselect]
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
- VirtualCatalogHoseTemperatureRangeFAndC [textarea]
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
- LeftPrintCatalogImage [image]
- RightPrintCatalogImage [image]
- priceData [table]
- CatalogGrouping [input]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '1',
   'name' => 'Product',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1593496370,
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
                                     'name' => 'weightg',
                                     'title' => 'Weight_ g/m',
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
                                     'name' => 'weightKg',
                                     'title' => 'Weight (kg/m)',
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
                                     'visibleGridView' => true,
                                     'visibleSearch' => true,
                                     'defaultValueGenerator' => '',
                                  )),
                                  9 => 
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
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                             'fieldtype' => 'checkbox',
                             'defaultValue' => NULL,
                             'queryColumnType' => 'tinyint(1)',
                             'columnType' => 'tinyint(1)',
                             'phpdocType' => 'boolean',
                             'name' => 'OutsidePurchaseFlag',
                             'title' => 'Outside Purchase Indicator / Procurement Type',
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
                                        'value' => 1645,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'ABBOTT',
                                        'value' => 1646,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'ABBOTT 1025 SERIES',
                                        'value' => 1647,
                                      ),
                                      3 => 
                                      array (
                                        'key' => 'ABBOTT CHEM GROUT',
                                        'value' => 1648,
                                      ),
                                      4 => 
                                      array (
                                        'key' => 'ABS BLAST',
                                        'value' => 1649,
                                      ),
                                      5 => 
                                      array (
                                        'key' => 'ACCORD TANK CLEANING',
                                        'value' => 1650,
                                      ),
                                      6 => 
                                      array (
                                        'key' => 'Acculinear',
                                        'value' => 2672,
                                      ),
                                      7 => 
                                      array (
                                        'key' => 'ACE BREWLINE',
                                        'value' => 1651,
                                      ),
                                      8 => 
                                      array (
                                        'key' => 'ACE FOOD',
                                        'value' => 1652,
                                      ),
                                      9 => 
                                      array (
                                        'key' => 'ACE FOOD DISCHARGE',
                                        'value' => 1653,
                                      ),
                                      10 => 
                                      array (
                                        'key' => 'ACE GRAY FOOD',
                                        'value' => 1654,
                                      ),
                                      11 => 
                                      array (
                                        'key' => 'ACE RCR FLEXRITE',
                                        'value' => 1655,
                                      ),
                                      12 => 
                                      array (
                                        'key' => 'ACE RCT FLEXRITE',
                                        'value' => 1656,
                                      ),
                                      13 => 
                                      array (
                                        'key' => 'ACE RDC FOOD',
                                        'value' => 1657,
                                      ),
                                      14 => 
                                      array (
                                        'key' => 'ACE RSD FOOD',
                                        'value' => 1658,
                                      ),
                                      15 => 
                                      array (
                                        'key' => 'AD SEALING HYDROCARBON DRAIN',
                                        'value' => 1659,
                                      ),
                                      16 => 
                                      array (
                                        'key' => 'ADVANTAGE',
                                        'value' => 1660,
                                      ),
                                      17 => 
                                      array (
                                        'key' => 'AEROPAL',
                                        'value' => 1661,
                                      ),
                                      18 => 
                                      array (
                                        'key' => 'AG SPRAY',
                                        'value' => 1662,
                                      ),
                                      19 => 
                                      array (
                                        'key' => 'AGCHEM',
                                        'value' => 1663,
                                      ),
                                      20 => 
                                      array (
                                        'key' => 'AGCHEM S&D',
                                        'value' => 1664,
                                      ),
                                      21 => 
                                      array (
                                        'key' => 'AGGIE GAS',
                                        'value' => 1665,
                                      ),
                                      22 => 
                                      array (
                                        'key' => 'AGRI-FLEX',
                                        'value' => 1666,
                                      ),
                                      23 => 
                                      array (
                                        'key' => 'AHR WATER S&D',
                                        'value' => 1667,
                                      ),
                                      24 => 
                                      array (
                                        'key' => 'AIR 1000',
                                        'value' => 1668,
                                      ),
                                      25 => 
                                      array (
                                        'key' => 'AIR 250',
                                        'value' => 1669,
                                      ),
                                      26 => 
                                      array (
                                        'key' => 'AIR 300',
                                        'value' => 1670,
                                      ),
                                      27 => 
                                      array (
                                        'key' => 'AIR 300 HD',
                                        'value' => 1671,
                                      ),
                                      28 => 
                                      array (
                                        'key' => 'AIR 400',
                                        'value' => 1672,
                                      ),
                                      29 => 
                                      array (
                                        'key' => 'AIR BREATHING HOSE',
                                        'value' => 1673,
                                      ),
                                      30 => 
                                      array (
                                        'key' => 'AIR PSNS',
                                        'value' => 1674,
                                      ),
                                      31 => 
                                      array (
                                        'key' => 'AIR PUMP GUNITE',
                                        'value' => 1675,
                                      ),
                                      32 => 
                                      array (
                                        'key' => 'AIR TRIX',
                                        'value' => 1676,
                                      ),
                                      33 => 
                                      array (
                                        'key' => 'AIR-A-PLANE GLYCOL',
                                        'value' => 1677,
                                      ),
                                      34 => 
                                      array (
                                        'key' => 'AIR-WATER 400',
                                        'value' => 1686,
                                      ),
                                      35 => 
                                      array (
                                        'key' => 'AIRCRAFT FUELING',
                                        'value' => 1678,
                                      ),
                                      36 => 
                                      array (
                                        'key' => 'AIRGAS FRONTIER',
                                        'value' => 1679,
                                      ),
                                      37 => 
                                      array (
                                        'key' => 'AIRGAS GRADE R',
                                        'value' => 1680,
                                      ),
                                      38 => 
                                      array (
                                        'key' => 'AIRGAS GRADE RM',
                                        'value' => 1681,
                                      ),
                                      39 => 
                                      array (
                                        'key' => 'AIRGAS GRADE T',
                                        'value' => 1682,
                                      ),
                                      40 => 
                                      array (
                                        'key' => 'AIRMAX FLEXIMAX',
                                        'value' => 1683,
                                      ),
                                      41 => 
                                      array (
                                        'key' => 'AIRMAX PROMAX',
                                        'value' => 1684,
                                      ),
                                      42 => 
                                      array (
                                        'key' => 'AIRMAX SUPERMAX',
                                        'value' => 1685,
                                      ),
                                      43 => 
                                      array (
                                        'key' => 'AJAX',
                                        'value' => 1687,
                                      ),
                                      44 => 
                                      array (
                                        'key' => 'ALASKA RUBBER',
                                        'value' => 1688,
                                      ),
                                      45 => 
                                      array (
                                        'key' => 'ALCAN MUD STACKING',
                                        'value' => 1689,
                                      ),
                                      46 => 
                                      array (
                                        'key' => 'ALCOA POTROOM',
                                        'value' => 1690,
                                      ),
                                      47 => 
                                      array (
                                        'key' => 'ALLCRETE TEXTILE',
                                        'value' => 1691,
                                      ),
                                      48 => 
                                      array (
                                        'key' => 'ALLCRETE WIRE',
                                        'value' => 1692,
                                      ),
                                      49 => 
                                      array (
                                        'key' => 'ALLENT GUNITE',
                                        'value' => 1693,
                                      ),
                                      50 => 
                                      array (
                                        'key' => 'ALLENT REFRACTORY',
                                        'value' => 1694,
                                      ),
                                      51 => 
                                      array (
                                        'key' => 'AMFLO 702-610',
                                        'value' => 1695,
                                      ),
                                      52 => 
                                      array (
                                        'key' => 'AMMONIUM NITRATE BLAST',
                                        'value' => 1696,
                                      ),
                                      53 => 
                                      array (
                                        'key' => 'AMMONIUM NITRATE HD',
                                        'value' => 1697,
                                      ),
                                      54 => 
                                      array (
                                        'key' => 'AMMONIUM NITRATE PELLET',
                                        'value' => 1698,
                                      ),
                                      55 => 
                                      array (
                                        'key' => 'APACHE',
                                        'value' => 1699,
                                      ),
                                      56 => 
                                      array (
                                        'key' => 'APOLLO',
                                        'value' => 1700,
                                      ),
                                      57 => 
                                      array (
                                        'key' => 'APOLLO FLEXDOCK',
                                        'value' => 1701,
                                      ),
                                      58 => 
                                      array (
                                        'key' => 'APPLIED INDUSTRIAL TECH',
                                        'value' => 1702,
                                      ),
                                      59 => 
                                      array (
                                        'key' => 'APPLIED JETTING',
                                        'value' => 1703,
                                      ),
                                      60 => 
                                      array (
                                        'key' => 'AQUAHAMMER',
                                        'value' => 1704,
                                      ),
                                      61 => 
                                      array (
                                        'key' => 'AQUAPAL',
                                        'value' => 1705,
                                      ),
                                      62 => 
                                      array (
                                        'key' => 'AR THOMSON EXTREME CRIMP',
                                        'value' => 1706,
                                      ),
                                      63 => 
                                      array (
                                        'key' => 'ARCAIR INSULATOR',
                                        'value' => 1707,
                                      ),
                                      64 => 
                                      array (
                                        'key' => 'ARCHON',
                                        'value' => 1708,
                                      ),
                                      65 => 
                                      array (
                                        'key' => 'ARCO BLAST XF',
                                        'value' => 1709,
                                      ),
                                      66 => 
                                      array (
                                        'key' => 'ARCTIC EXTREMEFLEX',
                                        'value' => 1710,
                                      ),
                                      67 => 
                                      array (
                                        'key' => 'ARCTIC FLEXTRA',
                                        'value' => 1711,
                                      ),
                                      68 => 
                                      array (
                                        'key' => 'ARCTIC FLEXWING',
                                        'value' => 1712,
                                      ),
                                      69 => 
                                      array (
                                        'key' => 'ARCTIC FUEL DISCHARGE',
                                        'value' => 1713,
                                      ),
                                      70 => 
                                      array (
                                        'key' => 'ARCTIC LCP3',
                                        'value' => 1714,
                                      ),
                                      71 => 
                                      array (
                                        'key' => 'ARCTIC LCP4S',
                                        'value' => 1715,
                                      ),
                                      72 => 
                                      array (
                                        'key' => 'ARCTIC LCP6S',
                                        'value' => 1716,
                                      ),
                                      73 => 
                                      array (
                                        'key' => 'ARCTIC LR16SC',
                                        'value' => 1717,
                                      ),
                                      74 => 
                                      array (
                                        'key' => 'ARCTIC LR2SN',
                                        'value' => 1718,
                                      ),
                                      75 => 
                                      array (
                                        'key' => 'ARCTIC ORTAC',
                                        'value' => 1719,
                                      ),
                                      76 => 
                                      array (
                                        'key' => 'ARCTIC ORTAC PLUS',
                                        'value' => 1720,
                                      ),
                                      77 => 
                                      array (
                                        'key' => 'ARCTIC RIG SUPPLY',
                                        'value' => 1721,
                                      ),
                                      78 => 
                                      array (
                                        'key' => 'ARMOR-FLEX PRO',
                                        'value' => 1728,
                                      ),
                                      79 => 
                                      array (
                                        'key' => 'ARMORCOAT ACP3',
                                        'value' => 1722,
                                      ),
                                      80 => 
                                      array (
                                        'key' => 'ARMORCOAT ACP4',
                                        'value' => 1723,
                                      ),
                                      81 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC12',
                                        'value' => 1724,
                                      ),
                                      82 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC13',
                                        'value' => 1725,
                                      ),
                                      83 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC15',
                                        'value' => 1726,
                                      ),
                                      84 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC16SC',
                                        'value' => 1727,
                                      ),
                                      85 => 
                                      array (
                                        'key' => 'ARONSON',
                                        'value' => 1729,
                                      ),
                                      86 => 
                                      array (
                                        'key' => 'ARPHSE',
                                        'value' => 1730,
                                      ),
                                      87 => 
                                      array (
                                        'key' => 'ARTRAC',
                                        'value' => 1731,
                                      ),
                                      88 => 
                                      array (
                                        'key' => 'ARVAC SW',
                                        'value' => 1732,
                                      ),
                                      89 => 
                                      array (
                                        'key' => 'AS1335 TWIN-LINE',
                                        'value' => 1733,
                                      ),
                                      90 => 
                                      array (
                                        'key' => 'AS2435 TYPE 1 AIRBRAKE',
                                        'value' => 1734,
                                      ),
                                      91 => 
                                      array (
                                        'key' => 'ASJ',
                                        'value' => 1735,
                                      ),
                                      92 => 
                                      array (
                                        'key' => 'ASJ VERSACRETE',
                                        'value' => 1736,
                                      ),
                                      93 => 
                                      array (
                                        'key' => 'ATLANT WATER',
                                        'value' => 1737,
                                      ),
                                      94 => 
                                      array (
                                        'key' => 'ATLAS',
                                        'value' => 1738,
                                      ),
                                      95 => 
                                      array (
                                        'key' => 'ATRUBB NR SPRAY',
                                        'value' => 1739,
                                      ),
                                      96 => 
                                      array (
                                        'key' => 'AUGER ARC PILING',
                                        'value' => 1740,
                                      ),
                                      97 => 
                                      array (
                                        'key' => 'AUSTIN',
                                        'value' => 1741,
                                      ),
                                      98 => 
                                      array (
                                        'key' => 'AUSTIN RUBBER',
                                        'value' => 1742,
                                      ),
                                      99 => 
                                      array (
                                        'key' => 'AUTOGRIP',
                                        'value' => 1743,
                                      ),
                                      100 => 
                                      array (
                                        'key' => 'Axial Fan Hawk Pd',
                                        'value' => 2673,
                                      ),
                                      101 => 
                                      array (
                                        'key' => 'BAHCAL',
                                        'value' => 1744,
                                      ),
                                      102 => 
                                      array (
                                        'key' => 'BANDING COIL',
                                        'value' => 1745,
                                      ),
                                      103 => 
                                      array (
                                        'key' => 'BC COLD FLEX',
                                        'value' => 1746,
                                      ),
                                      104 => 
                                      array (
                                        'key' => 'BC GASOLINE',
                                        'value' => 1747,
                                      ),
                                      105 => 
                                      array (
                                        'key' => 'BC MARINA',
                                        'value' => 1748,
                                      ),
                                      106 => 
                                      array (
                                        'key' => 'BEDFORD',
                                        'value' => 1749,
                                      ),
                                      107 => 
                                      array (
                                        'key' => 'BLACK FLEXTRA II',
                                        'value' => 1750,
                                      ),
                                      108 => 
                                      array (
                                        'key' => 'BLACK FLEXWING',
                                        'value' => 1751,
                                      ),
                                      109 => 
                                      array (
                                        'key' => 'Blackhawk Pd',
                                        'value' => 2674,
                                      ),
                                      110 => 
                                      array (
                                        'key' => 'Blackhawk Pd Sprockets',
                                        'value' => 2724,
                                      ),
                                      111 => 
                                      array (
                                        'key' => 'BLAST',
                                        'value' => 1752,
                                      ),
                                      112 => 
                                      array (
                                        'key' => 'BLASTHOLE SLURRY & DEWATERING',
                                        'value' => 1753,
                                      ),
                                      113 => 
                                      array (
                                        'key' => 'BLASTMASTER HD',
                                        'value' => 1754,
                                      ),
                                      114 => 
                                      array (
                                        'key' => 'BLAUDIECK',
                                        'value' => 1755,
                                      ),
                                      115 => 
                                      array (
                                        'key' => 'BLISSFUL FISHERMAN',
                                        'value' => 1756,
                                      ),
                                      116 => 
                                      array (
                                        'key' => 'BLUCOR',
                                        'value' => 1757,
                                      ),
                                      117 => 
                                      array (
                                        'key' => 'BLUCOR FLANGE',
                                        'value' => 1758,
                                      ),
                                      118 => 
                                      array (
                                        'key' => 'BLUE FLEXWING',
                                        'value' => 1759,
                                      ),
                                      119 => 
                                      array (
                                        'key' => 'BLUE FLOUR',
                                        'value' => 1760,
                                      ),
                                      120 => 
                                      array (
                                        'key' => 'BLUE XTREME STRAIGH RAD HOSE',
                                        'value' => 1761,
                                      ),
                                      121 => 
                                      array (
                                        'key' => 'BOOTMOR',
                                        'value' => 1762,
                                      ),
                                      122 => 
                                      array (
                                        'key' => 'BOP SLEEVE',
                                        'value' => 1763,
                                      ),
                                      123 => 
                                      array (
                                        'key' => 'BOP WRAP',
                                        'value' => 1764,
                                      ),
                                      124 => 
                                      array (
                                        'key' => 'BOTTOM LOADING',
                                        'value' => 1765,
                                      ),
                                      125 => 
                                      array (
                                        'key' => 'Bowling',
                                        'value' => 2675,
                                      ),
                                      126 => 
                                      array (
                                        'key' => 'BR7',
                                        'value' => 1766,
                                      ),
                                      127 => 
                                      array (
                                        'key' => 'BRAIDAIR',
                                        'value' => 1767,
                                      ),
                                      128 => 
                                      array (
                                        'key' => 'BRANHAM CHEMONE SUPERIOR',
                                        'value' => 1768,
                                      ),
                                      129 => 
                                      array (
                                        'key' => 'BREATHING AIR',
                                        'value' => 1769,
                                      ),
                                      130 => 
                                      array (
                                        'key' => 'BREATHING AIR PLUS',
                                        'value' => 1770,
                                      ),
                                      131 => 
                                      array (
                                        'key' => 'BRENNTAG',
                                        'value' => 1771,
                                      ),
                                      132 => 
                                      array (
                                        'key' => 'BREWERS HOSE',
                                        'value' => 1772,
                                      ),
                                      133 => 
                                      array (
                                        'key' => 'BREWLINE',
                                        'value' => 1773,
                                      ),
                                      134 => 
                                      array (
                                        'key' => 'BRICK RED AIR',
                                        'value' => 1774,
                                      ),
                                      135 => 
                                      array (
                                        'key' => 'BRIDGEPOINT',
                                        'value' => 1775,
                                      ),
                                      136 => 
                                      array (
                                        'key' => 'BRIGADE MINE',
                                        'value' => 1776,
                                      ),
                                      137 => 
                                      array (
                                        'key' => 'BRINE HOSE',
                                        'value' => 1777,
                                      ),
                                      138 => 
                                      array (
                                        'key' => 'BROOM SWEEPER',
                                        'value' => 1778,
                                      ),
                                      139 => 
                                      array (
                                        'key' => 'BROWN FLEXWING',
                                        'value' => 1779,
                                      ),
                                      140 => 
                                      array (
                                        'key' => 'BUHLER MIAG',
                                        'value' => 1780,
                                      ),
                                      141 => 
                                      array (
                                        'key' => 'BUTTERWORTH',
                                        'value' => 1781,
                                      ),
                                      142 => 
                                      array (
                                        'key' => 'BUTYL 200',
                                        'value' => 1782,
                                      ),
                                      143 => 
                                      array (
                                        'key' => 'C&J WATER S&D',
                                        'value' => 1783,
                                      ),
                                      144 => 
                                      array (
                                        'key' => 'CABLE CONDUIT',
                                        'value' => 1784,
                                      ),
                                      145 => 
                                      array (
                                        'key' => 'CABLE COOLING HOSE',
                                        'value' => 1785,
                                      ),
                                      146 => 
                                      array (
                                        'key' => 'CABLE COVER',
                                        'value' => 1786,
                                      ),
                                      147 => 
                                      array (
                                        'key' => 'CAMBRG HEALY PII',
                                        'value' => 1787,
                                      ),
                                      148 => 
                                      array (
                                        'key' => 'CAMLOK',
                                        'value' => 1788,
                                      ),
                                      149 => 
                                      array (
                                        'key' => 'CARON ARCTIC FLEX',
                                        'value' => 1789,
                                      ),
                                      150 => 
                                      array (
                                        'key' => 'CARON BLACK SOFTWALL',
                                        'value' => 1790,
                                      ),
                                      151 => 
                                      array (
                                        'key' => 'CARON FABCHEM',
                                        'value' => 1791,
                                      ),
                                      152 => 
                                      array (
                                        'key' => 'CASCADE DRY CEMENT',
                                        'value' => 1792,
                                      ),
                                      153 => 
                                      array (
                                        'key' => 'CENEX',
                                        'value' => 1793,
                                      ),
                                      154 => 
                                      array (
                                        'key' => 'CENEX OT',
                                        'value' => 1794,
                                      ),
                                      155 => 
                                      array (
                                        'key' => 'CENTRAL ROCK DRILL',
                                        'value' => 1795,
                                      ),
                                      156 => 
                                      array (
                                        'key' => 'CHEMICAL ACID DISCHARGE',
                                        'value' => 1796,
                                      ),
                                      157 => 
                                      array (
                                        'key' => 'CHEMONE',
                                        'value' => 1797,
                                      ),
                                      158 => 
                                      array (
                                        'key' => 'CHEMSTREAM',
                                        'value' => 1798,
                                      ),
                                      159 => 
                                      array (
                                        'key' => 'CHLO GARLOK',
                                        'value' => 1799,
                                      ),
                                      160 => 
                                      array (
                                        'key' => 'CLEANJET',
                                        'value' => 1800,
                                      ),
                                      161 => 
                                      array (
                                        'key' => 'CLEANJET FDA',
                                        'value' => 1801,
                                      ),
                                      162 => 
                                      array (
                                        'key' => 'CLEAR PVC TUBING',
                                        'value' => 1802,
                                      ),
                                      163 => 
                                      array (
                                        'key' => 'CLEARWATER',
                                        'value' => 1803,
                                      ),
                                      164 => 
                                      array (
                                        'key' => 'CO2 HOSE',
                                        'value' => 1804,
                                      ),
                                      165 => 
                                      array (
                                        'key' => 'COAST GUARD',
                                        'value' => 1805,
                                      ),
                                      166 => 
                                      array (
                                        'key' => 'COLD BLUE',
                                        'value' => 1806,
                                      ),
                                      167 => 
                                      array (
                                        'key' => 'COLLECTOR',
                                        'value' => 1807,
                                      ),
                                      168 => 
                                      array (
                                        'key' => 'COLLECTOR FLEX',
                                        'value' => 1808,
                                      ),
                                      169 => 
                                      array (
                                        'key' => 'COLORITE',
                                        'value' => 1809,
                                      ),
                                      170 => 
                                      array (
                                        'key' => 'CON FORM SUPER FLEX',
                                        'value' => 1810,
                                      ),
                                      171 => 
                                      array (
                                        'key' => 'CONAG WATER S&D',
                                        'value' => 1811,
                                      ),
                                      172 => 
                                      array (
                                        'key' => 'CONCRETE G820',
                                        'value' => 1812,
                                      ),
                                      173 => 
                                      array (
                                        'key' => 'CONCRETE VIBRATOR',
                                        'value' => 1813,
                                      ),
                                      174 => 
                                      array (
                                        'key' => 'CONTI CHEM OIL',
                                        'value' => 1814,
                                      ),
                                      175 => 
                                      array (
                                        'key' => 'CONTI CHEM PHARMA',
                                        'value' => 1815,
                                      ),
                                      176 => 
                                      array (
                                        'key' => 'CONTI CHEM STANDARD',
                                        'value' => 1816,
                                      ),
                                      177 => 
                                      array (
                                        'key' => 'CONTI CHEM SUPERIOR FEP',
                                        'value' => 1817,
                                      ),
                                      178 => 
                                      array (
                                        'key' => 'CONTI PAINT SPRAY',
                                        'value' => 1818,
                                      ),
                                      179 => 
                                      array (
                                        'key' => 'CONTI POTABLE WATER',
                                        'value' => 1819,
                                      ),
                                      180 => 
                                      array (
                                        'key' => 'CONTI WASTE WATER',
                                        'value' => 1820,
                                      ),
                                      181 => 
                                      array (
                                        'key' => 'CONTINENTAL STEEL STEAM 250',
                                        'value' => 1821,
                                      ),
                                      182 => 
                                      array (
                                        'key' => 'Conti® V',
                                        'value' => 2676,
                                      ),
                                      183 => 
                                      array (
                                        'key' => 'Conti® V Advance',
                                        'value' => 2677,
                                      ),
                                      184 => 
                                      array (
                                        'key' => 'Conti® V Dual',
                                        'value' => 2678,
                                      ),
                                      185 => 
                                      array (
                                        'key' => 'Conti® V Fo',
                                        'value' => 2679,
                                      ),
                                      186 => 
                                      array (
                                        'key' => 'Conti® V Fo Advance',
                                        'value' => 2680,
                                      ),
                                      187 => 
                                      array (
                                        'key' => 'Conti® V Fo Pioneer',
                                        'value' => 2681,
                                      ),
                                      188 => 
                                      array (
                                        'key' => 'Conti® V Garden',
                                        'value' => 2682,
                                      ),
                                      189 => 
                                      array (
                                        'key' => 'Conti® V Multibelt',
                                        'value' => 2683,
                                      ),
                                      190 => 
                                      array (
                                        'key' => 'Conti® V Power',
                                        'value' => 2684,
                                      ),
                                      191 => 
                                      array (
                                        'key' => 'CONTRACTOR 4001',
                                        'value' => 1822,
                                      ),
                                      192 => 
                                      array (
                                        'key' => 'CONTRACTOR WATER S&D',
                                        'value' => 1823,
                                      ),
                                      193 => 
                                      array (
                                        'key' => 'CONTRACTOR\'S WATER',
                                        'value' => 1824,
                                      ),
                                      194 => 
                                      array (
                                        'key' => 'COOLING WATER',
                                        'value' => 1825,
                                      ),
                                      195 => 
                                      array (
                                        'key' => 'COOLING WATER 2.0',
                                        'value' => 1826,
                                      ),
                                      196 => 
                                      array (
                                        'key' => 'Cotton Cleaner',
                                        'value' => 2685,
                                      ),
                                      197 => 
                                      array (
                                        'key' => 'CPE DISCHARGE',
                                        'value' => 1827,
                                      ),
                                      198 => 
                                      array (
                                        'key' => 'CREE BREWERS HOSE',
                                        'value' => 1828,
                                      ),
                                      199 => 
                                      array (
                                        'key' => 'CULVERT',
                                        'value' => 1829,
                                      ),
                                      200 => 
                                      array (
                                        'key' => 'DAMPF TRIX 5000',
                                        'value' => 1830,
                                      ),
                                      201 => 
                                      array (
                                        'key' => 'DAMPF TRIX 6000',
                                        'value' => 1831,
                                      ),
                                      202 => 
                                      array (
                                        'key' => 'DARCY REDWING FUEL OIL',
                                        'value' => 1832,
                                      ),
                                      203 => 
                                      array (
                                        'key' => 'DEADMAN AIRCRAFT REFUELING',
                                        'value' => 1833,
                                      ),
                                      204 => 
                                      array (
                                        'key' => 'DEADMAN SANDBLAST',
                                        'value' => 1834,
                                      ),
                                      205 => 
                                      array (
                                        'key' => 'DEERE',
                                        'value' => 1835,
                                      ),
                                      206 => 
                                      array (
                                        'key' => 'DEF DISPENSING',
                                        'value' => 1836,
                                      ),
                                      207 => 
                                      array (
                                        'key' => 'DEF TRANSFER',
                                        'value' => 1837,
                                      ),
                                      208 => 
                                      array (
                                        'key' => 'DEL TWIN-LINE GRADE R',
                                        'value' => 1838,
                                      ),
                                      209 => 
                                      array (
                                        'key' => 'DEL TWIN-LINE GRADE RM',
                                        'value' => 1839,
                                      ),
                                      210 => 
                                      array (
                                        'key' => 'DENVER',
                                        'value' => 1840,
                                      ),
                                      211 => 
                                      array (
                                        'key' => 'DENVER CONC VIBR',
                                        'value' => 1841,
                                      ),
                                      212 => 
                                      array (
                                        'key' => 'DESERT DR16SC',
                                        'value' => 1842,
                                      ),
                                      213 => 
                                      array (
                                        'key' => 'DESERT DR1SN',
                                        'value' => 1843,
                                      ),
                                      214 => 
                                      array (
                                        'key' => 'DESERT DR2SN',
                                        'value' => 1844,
                                      ),
                                      215 => 
                                      array (
                                        'key' => 'DESERT DR5',
                                        'value' => 1845,
                                      ),
                                      216 => 
                                      array (
                                        'key' => 'DESERT DUT',
                                        'value' => 1846,
                                      ),
                                      217 => 
                                      array (
                                        'key' => 'DEWATERING',
                                        'value' => 1847,
                                      ),
                                      218 => 
                                      array (
                                        'key' => 'DIESEL OIL HARDWALL',
                                        'value' => 1848,
                                      ),
                                      219 => 
                                      array (
                                        'key' => 'DIESEL OIL SOFTWALL',
                                        'value' => 1849,
                                      ),
                                      220 => 
                                      array (
                                        'key' => 'DIGESTER',
                                        'value' => 1850,
                                      ),
                                      221 => 
                                      array (
                                        'key' => 'DIISOCYANATE',
                                        'value' => 1851,
                                      ),
                                      222 => 
                                      array (
                                        'key' => 'DINGA HOT WATER GUN',
                                        'value' => 1852,
                                      ),
                                      223 => 
                                      array (
                                        'key' => 'DISCHARGE',
                                        'value' => 1853,
                                      ),
                                      224 => 
                                      array (
                                        'key' => 'DISHWASHER DRAIN',
                                        'value' => 1854,
                                      ),
                                      225 => 
                                      array (
                                        'key' => 'DISTILLERY 150',
                                        'value' => 1855,
                                      ),
                                      226 => 
                                      array (
                                        'key' => 'DISTRB ACID',
                                        'value' => 1856,
                                      ),
                                      227 => 
                                      array (
                                        'key' => 'DISTRB ARCTIC ORTAC',
                                        'value' => 1857,
                                      ),
                                      228 => 
                                      array (
                                        'key' => 'DISTRB STEEL AIR',
                                        'value' => 1858,
                                      ),
                                      229 => 
                                      array (
                                        'key' => 'DISTRB WATER S&D',
                                        'value' => 1859,
                                      ),
                                      230 => 
                                      array (
                                        'key' => 'DIVERSIFLEX',
                                        'value' => 1860,
                                      ),
                                      231 => 
                                      array (
                                        'key' => 'DIVERSIPIPE',
                                        'value' => 1861,
                                      ),
                                      232 => 
                                      array (
                                        'key' => 'DIVING HOSE',
                                        'value' => 1862,
                                      ),
                                      233 => 
                                      array (
                                        'key' => 'DMC CAUSTIC',
                                        'value' => 1863,
                                      ),
                                      234 => 
                                      array (
                                        'key' => 'DOCK',
                                        'value' => 1864,
                                      ),
                                      235 => 
                                      array (
                                        'key' => 'DOCK EN1765 L15',
                                        'value' => 1865,
                                      ),
                                      236 => 
                                      array (
                                        'key' => 'DOCK EN1765 S15',
                                        'value' => 1866,
                                      ),
                                      237 => 
                                      array (
                                        'key' => 'DOCK FDA',
                                        'value' => 1867,
                                      ),
                                      238 => 
                                      array (
                                        'key' => 'DOCK SMOOTH BORE HOT SULFUR',
                                        'value' => 1868,
                                      ),
                                      239 => 
                                      array (
                                        'key' => 'DOCK SUPPLY SW',
                                        'value' => 1869,
                                      ),
                                      240 => 
                                      array (
                                        'key' => 'DREDGE SLEEVE',
                                        'value' => 1870,
                                      ),
                                      241 => 
                                      array (
                                        'key' => 'DRILL WATER',
                                        'value' => 1871,
                                      ),
                                      242 => 
                                      array (
                                        'key' => 'DRINKLINE',
                                        'value' => 1872,
                                      ),
                                      243 => 
                                      array (
                                        'key' => 'DRY CEMENT HD HARDWALL',
                                        'value' => 1873,
                                      ),
                                      244 => 
                                      array (
                                        'key' => 'DRY CEMENT SOFTWALL',
                                        'value' => 1874,
                                      ),
                                      245 => 
                                      array (
                                        'key' => 'DRY ICE HOSE',
                                        'value' => 1875,
                                      ),
                                      246 => 
                                      array (
                                        'key' => 'Dual Hi-Performance Pd',
                                        'value' => 2686,
                                      ),
                                      247 => 
                                      array (
                                        'key' => 'Dual Positive Drive Pd',
                                        'value' => 2687,
                                      ),
                                      248 => 
                                      array (
                                        'key' => 'DUDLEY WATER',
                                        'value' => 1876,
                                      ),
                                      249 => 
                                      array (
                                        'key' => 'DUNLOP BOOSTER',
                                        'value' => 1877,
                                      ),
                                      250 => 
                                      array (
                                        'key' => 'DURACO',
                                        'value' => 1878,
                                      ),
                                      251 => 
                                      array (
                                        'key' => 'DURACO ROADPATCH',
                                        'value' => 1879,
                                      ),
                                      252 => 
                                      array (
                                        'key' => 'DYNACRAFT',
                                        'value' => 1880,
                                      ),
                                      253 => 
                                      array (
                                        'key' => 'DYNO',
                                        'value' => 1881,
                                      ),
                                      254 => 
                                      array (
                                        'key' => 'DYNO HOSE',
                                        'value' => 1882,
                                      ),
                                      255 => 
                                      array (
                                        'key' => 'E 1-1',
                                        'value' => 1883,
                                      ),
                                      256 => 
                                      array (
                                        'key' => 'E 3-1',
                                        'value' => 1884,
                                      ),
                                      257 => 
                                      array (
                                        'key' => 'E 3-2',
                                        'value' => 1885,
                                      ),
                                      258 => 
                                      array (
                                        'key' => 'EAGLE AIR & WATER',
                                        'value' => 1886,
                                      ),
                                      259 => 
                                      array (
                                        'key' => 'EHLYNN',
                                        'value' => 1887,
                                      ),
                                      260 => 
                                      array (
                                        'key' => 'EHLYNN FLOUR TEC',
                                        'value' => 1888,
                                      ),
                                      261 => 
                                      array (
                                        'key' => 'EHLYNN FOOD DISCHARGE',
                                        'value' => 1889,
                                      ),
                                      262 => 
                                      array (
                                        'key' => 'EHLYNN HOT AIR',
                                        'value' => 1890,
                                      ),
                                      263 => 
                                      array (
                                        'key' => 'EHLYNN PIPE CONNECTOR',
                                        'value' => 1891,
                                      ),
                                      264 => 
                                      array (
                                        'key' => 'EHLYNN TPG',
                                        'value' => 1892,
                                      ),
                                      265 => 
                                      array (
                                        'key' => 'ELAFLEX LAY FLAT',
                                        'value' => 1893,
                                      ),
                                      266 => 
                                      array (
                                        'key' => 'Elatech',
                                        'value' => 2688,
                                      ),
                                      267 => 
                                      array (
                                        'key' => 'ELITE STANDARD RADIATOR',
                                        'value' => 1894,
                                      ),
                                      268 => 
                                      array (
                                        'key' => 'ELITE SW MARINE WET EXHAUST',
                                        'value' => 1895,
                                      ),
                                      269 => 
                                      array (
                                        'key' => 'EN12115 PETROLEUM',
                                        'value' => 1896,
                                      ),
                                      270 => 
                                      array (
                                        'key' => 'EPDM 200',
                                        'value' => 1897,
                                      ),
                                      271 => 
                                      array (
                                        'key' => 'EPDM 200 (ECONOMY)',
                                        'value' => 1898,
                                      ),
                                      272 => 
                                      array (
                                        'key' => 'EPDM 200 (NON CON)',
                                        'value' => 1899,
                                      ),
                                      273 => 
                                      array (
                                        'key' => 'EPDM ACID',
                                        'value' => 1900,
                                      ),
                                      274 => 
                                      array (
                                        'key' => 'EPDM DISCHARGE',
                                        'value' => 1901,
                                      ),
                                      275 => 
                                      array (
                                        'key' => 'EPDM S&D',
                                        'value' => 1902,
                                      ),
                                      276 => 
                                      array (
                                        'key' => 'EPDM SD HD WATER',
                                        'value' => 1903,
                                      ),
                                      277 => 
                                      array (
                                        'key' => 'EPDM SD WATER',
                                        'value' => 1904,
                                      ),
                                      278 => 
                                      array (
                                        'key' => 'ERGON',
                                        'value' => 1905,
                                      ),
                                      279 => 
                                      array (
                                        'key' => 'ERIKS',
                                        'value' => 1906,
                                      ),
                                      280 => 
                                      array (
                                        'key' => 'EURO TRIX',
                                        'value' => 1907,
                                      ),
                                      281 => 
                                      array (
                                        'key' => 'EXIMCO',
                                        'value' => 1908,
                                      ),
                                      282 => 
                                      array (
                                        'key' => 'EXON GP DOCK',
                                        'value' => 1909,
                                      ),
                                      283 => 
                                      array (
                                        'key' => 'EXPRESS BLOWER',
                                        'value' => 1910,
                                      ),
                                      284 => 
                                      array (
                                        'key' => 'EXSTATIC',
                                        'value' => 1911,
                                      ),
                                      285 => 
                                      array (
                                        'key' => 'EXTREMEBLAST LOAD',
                                        'value' => 1912,
                                      ),
                                      286 => 
                                      array (
                                        'key' => 'EXTREMEFLEX BEVERAGE',
                                        'value' => 1913,
                                      ),
                                      287 => 
                                      array (
                                        'key' => 'EXTREMEFLEX CHEMICAL BROWN',
                                        'value' => 1914,
                                      ),
                                      288 => 
                                      array (
                                        'key' => 'EXTREMEFLEX CHEMICAL PURPLE',
                                        'value' => 1915,
                                      ),
                                      289 => 
                                      array (
                                        'key' => 'EXTREMEFLEX FOOD BLUE',
                                        'value' => 1916,
                                      ),
                                      290 => 
                                      array (
                                        'key' => 'EXTREMEFLEX FOOD GRAY',
                                        'value' => 1917,
                                      ),
                                      291 => 
                                      array (
                                        'key' => 'EXTREMEFLEX PETROLEUM',
                                        'value' => 1918,
                                      ),
                                      292 => 
                                      array (
                                        'key' => 'EXTREMEFLEX POTABLE WATER',
                                        'value' => 1919,
                                      ),
                                      293 => 
                                      array (
                                        'key' => 'EXTREMEFLEX VERSIFLO',
                                        'value' => 1920,
                                      ),
                                      294 => 
                                      array (
                                        'key' => 'EXTREMEFLEX WATER SLURRY',
                                        'value' => 1921,
                                      ),
                                      295 => 
                                      array (
                                        'key' => 'EZ GLIDE WINE',
                                        'value' => 1922,
                                      ),
                                      296 => 
                                      array (
                                        'key' => 'F5 AIR',
                                        'value' => 1923,
                                      ),
                                      297 => 
                                      array (
                                        'key' => 'FABCHEM',
                                        'value' => 1924,
                                      ),
                                      298 => 
                                      array (
                                        'key' => 'FABCHEM ARC',
                                        'value' => 1925,
                                      ),
                                      299 => 
                                      array (
                                        'key' => 'FABCHEM EN12115',
                                        'value' => 1926,
                                      ),
                                      300 => 
                                      array (
                                        'key' => 'FABCHEM-C',
                                        'value' => 1927,
                                      ),
                                      301 => 
                                      array (
                                        'key' => 'Falcon Carbon',
                                        'value' => 2759,
                                      ),
                                      302 => 
                                      array (
                                        'key' => 'Falcon Pd',
                                        'value' => 2689,
                                      ),
                                      303 => 
                                      array (
                                        'key' => 'FHP',
                                        'value' => 2690,
                                      ),
                                      304 => 
                                      array (
                                        'key' => 'FIBERG CRUCIBLE GASK',
                                        'value' => 1928,
                                      ),
                                      305 => 
                                      array (
                                        'key' => 'FINISHING BRANDS',
                                        'value' => 1929,
                                      ),
                                      306 => 
                                      array (
                                        'key' => 'FIRE ENGINE BOOSTER',
                                        'value' => 1930,
                                      ),
                                      307 => 
                                      array (
                                        'key' => 'FIRE ENGINE SUCTION',
                                        'value' => 1931,
                                      ),
                                      308 => 
                                      array (
                                        'key' => 'FIRE ENGINER BOOSTER',
                                        'value' => 1932,
                                      ),
                                      309 => 
                                      array (
                                        'key' => 'FISH HOSE',
                                        'value' => 1933,
                                      ),
                                      310 => 
                                      array (
                                        'key' => 'FISH TRANSFER',
                                        'value' => 1934,
                                      ),
                                      311 => 
                                      array (
                                        'key' => 'Flat',
                                        'value' => 2691,
                                      ),
                                      312 => 
                                      array (
                                        'key' => 'FLDCON',
                                        'value' => 1935,
                                      ),
                                      313 => 
                                      array (
                                        'key' => 'FLEX-ING FLEX AQUA WATER S&D',
                                        'value' => 1943,
                                      ),
                                      314 => 
                                      array (
                                        'key' => 'FLEX-ING FLEX-ON',
                                        'value' => 1944,
                                      ),
                                      315 => 
                                      array (
                                        'key' => 'FLEX-PULSE FPII',
                                        'value' => 1946,
                                      ),
                                      316 => 
                                      array (
                                        'key' => 'FLEXAGRIP',
                                        'value' => 1936,
                                      ),
                                      317 => 
                                      array (
                                        'key' => 'FLEXCHEM 225',
                                        'value' => 1937,
                                      ),
                                      318 => 
                                      array (
                                        'key' => 'FLEXDOCK',
                                        'value' => 1938,
                                      ),
                                      319 => 
                                      array (
                                        'key' => 'FLEXDOCK VERSAFUEL',
                                        'value' => 1939,
                                      ),
                                      320 => 
                                      array (
                                        'key' => 'FLEXIBLE DOWNSPOUT',
                                        'value' => 1940,
                                      ),
                                      321 => 
                                      array (
                                        'key' => 'FLEXIBLE TEFLON',
                                        'value' => 1941,
                                      ),
                                      322 => 
                                      array (
                                        'key' => 'FLEXICORE',
                                        'value' => 1942,
                                      ),
                                      323 => 
                                      array (
                                        'key' => 'FLEXJET',
                                        'value' => 1945,
                                      ),
                                      324 => 
                                      array (
                                        'key' => 'FLEXRITE',
                                        'value' => 1947,
                                      ),
                                      325 => 
                                      array (
                                        'key' => 'FLEXSHIELD SAE J1527 TYPE A1-15',
                                        'value' => 1948,
                                      ),
                                      326 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 CB EXTREME CRIMP',
                                        'value' => 1949,
                                      ),
                                      327 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 CB STEAM',
                                        'value' => 1950,
                                      ),
                                      328 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 EPDM-20',
                                        'value' => 1951,
                                      ),
                                      329 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 ORS STEAM',
                                        'value' => 1952,
                                      ),
                                      330 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 STEAM',
                                        'value' => 1953,
                                      ),
                                      331 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA',
                                        'value' => 1954,
                                      ),
                                      332 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA B20',
                                        'value' => 1955,
                                      ),
                                      333 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA E25',
                                        'value' => 1956,
                                      ),
                                      334 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA ETHAN-ALL',
                                        'value' => 1957,
                                      ),
                                      335 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA HVR',
                                        'value' => 1958,
                                      ),
                                      336 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA HVR LOW PERM',
                                        'value' => 1959,
                                      ),
                                      337 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA LOW PERM',
                                        'value' => 1960,
                                      ),
                                      338 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA VAPOR ASSIST',
                                        'value' => 1961,
                                      ),
                                      339 => 
                                      array (
                                        'key' => 'FLEXSTEEL MINE SPRAY',
                                        'value' => 1962,
                                      ),
                                      340 => 
                                      array (
                                        'key' => 'FLEXSTEEL MINESPRAY',
                                        'value' => 1963,
                                      ),
                                      341 => 
                                      array (
                                        'key' => 'FLEXSTEEL SERVICE STATION AIR',
                                        'value' => 1964,
                                      ),
                                      342 => 
                                      array (
                                        'key' => 'FLEXTRA DRY MATERIAL',
                                        'value' => 1965,
                                      ),
                                      343 => 
                                      array (
                                        'key' => 'FLEXTRA LT',
                                        'value' => 1966,
                                      ),
                                      344 => 
                                      array (
                                        'key' => 'FLEXTRA OILFIELD',
                                        'value' => 1967,
                                      ),
                                      345 => 
                                      array (
                                        'key' => 'FLEXTRA ROCK DUST',
                                        'value' => 1968,
                                      ),
                                      346 => 
                                      array (
                                        'key' => 'FLEXWAC',
                                        'value' => 1969,
                                      ),
                                      347 => 
                                      array (
                                        'key' => 'FLEXWING FOOD BLUE',
                                        'value' => 1970,
                                      ),
                                      348 => 
                                      array (
                                        'key' => 'FLEXWING OILFIELD',
                                        'value' => 1971,
                                      ),
                                      349 => 
                                      array (
                                        'key' => 'FLEXWING PETROLEUM',
                                        'value' => 1972,
                                      ),
                                      350 => 
                                      array (
                                        'key' => 'FLEXWING VERSAFUEL',
                                        'value' => 1973,
                                      ),
                                      351 => 
                                      array (
                                        'key' => 'FLEXWING WATER S&D',
                                        'value' => 1974,
                                      ),
                                      352 => 
                                      array (
                                        'key' => 'FLOATER',
                                        'value' => 1975,
                                      ),
                                      353 => 
                                      array (
                                        'key' => 'FLOATING HOSES',
                                        'value' => 1976,
                                      ),
                                      354 => 
                                      array (
                                        'key' => 'FLOUR DISCHARGE',
                                        'value' => 1977,
                                      ),
                                      355 => 
                                      array (
                                        'key' => 'FLUOROPAL',
                                        'value' => 1978,
                                      ),
                                      356 => 
                                      array (
                                        'key' => 'FOAM',
                                        'value' => 1979,
                                      ),
                                      357 => 
                                      array (
                                        'key' => 'FOOD 2720',
                                        'value' => 1980,
                                      ),
                                      358 => 
                                      array (
                                        'key' => 'FOOD DISCHARGE',
                                        'value' => 1981,
                                      ),
                                      359 => 
                                      array (
                                        'key' => 'FOOD FLEX',
                                        'value' => 1982,
                                      ),
                                      360 => 
                                      array (
                                        'key' => 'FOOD SUCTION & DISCHARGE',
                                        'value' => 1983,
                                      ),
                                      361 => 
                                      array (
                                        'key' => 'FOODCLEAN',
                                        'value' => 1984,
                                      ),
                                      362 => 
                                      array (
                                        'key' => 'FOODLINER',
                                        'value' => 1985,
                                      ),
                                      363 => 
                                      array (
                                        'key' => 'FORECAST BLAST',
                                        'value' => 1986,
                                      ),
                                      364 => 
                                      array (
                                        'key' => 'FORECAST BLAST XF',
                                        'value' => 1987,
                                      ),
                                      365 => 
                                      array (
                                        'key' => 'FORECAST SUCTION',
                                        'value' => 1988,
                                      ),
                                      366 => 
                                      array (
                                        'key' => 'FORESTRY',
                                        'value' => 1989,
                                      ),
                                      367 => 
                                      array (
                                        'key' => 'FORMADRAIN INFLATABLE HOSE',
                                        'value' => 1990,
                                      ),
                                      368 => 
                                      array (
                                        'key' => 'FORTRESS',
                                        'value' => 1991,
                                      ),
                                      369 => 
                                      array (
                                        'key' => 'FOSTER',
                                        'value' => 1992,
                                      ),
                                      370 => 
                                      array (
                                        'key' => 'FRAC',
                                        'value' => 1993,
                                      ),
                                      371 => 
                                      array (
                                        'key' => 'FRAC ACID S&D',
                                        'value' => 1994,
                                      ),
                                      372 => 
                                      array (
                                        'key' => 'FRAC BLENDING S&D',
                                        'value' => 1995,
                                      ),
                                      373 => 
                                      array (
                                        'key' => 'FRACO',
                                        'value' => 1996,
                                      ),
                                      374 => 
                                      array (
                                        'key' => 'FREON CHARGING',
                                        'value' => 1997,
                                      ),
                                      375 => 
                                      array (
                                        'key' => 'FRIG SEA',
                                        'value' => 1998,
                                      ),
                                      376 => 
                                      array (
                                        'key' => 'FRONTIER',
                                        'value' => 1999,
                                      ),
                                      377 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE',
                                        'value' => 2000,
                                      ),
                                      378 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE HD',
                                        'value' => 2001,
                                      ),
                                      379 => 
                                      array (
                                        'key' => 'FUEL FILL SAE J1527 TYPE A2',
                                        'value' => 2002,
                                      ),
                                      380 => 
                                      array (
                                        'key' => 'FUEL RIG SW',
                                        'value' => 2003,
                                      ),
                                      381 => 
                                      array (
                                        'key' => 'FUELGRIP COUPLING',
                                        'value' => 2004,
                                      ),
                                      382 => 
                                      array (
                                        'key' => 'FUGGITT',
                                        'value' => 2005,
                                      ),
                                      383 => 
                                      array (
                                        'key' => 'FUJI',
                                        'value' => 2006,
                                      ),
                                      384 => 
                                      array (
                                        'key' => 'FURNACE DOOR',
                                        'value' => 2007,
                                      ),
                                      385 => 
                                      array (
                                        'key' => 'FUTURA O-RING KIT',
                                        'value' => 2008,
                                      ),
                                      386 => 
                                      array (
                                        'key' => 'FUTURA RET RING INST. TOOL',
                                        'value' => 2009,
                                      ),
                                      387 => 
                                      array (
                                        'key' => 'GALAXY G4826',
                                        'value' => 2010,
                                      ),
                                      388 => 
                                      array (
                                        'key' => 'GALAXY G4867',
                                        'value' => 2011,
                                      ),
                                      389 => 
                                      array (
                                        'key' => 'GALAXY G4890',
                                        'value' => 2012,
                                      ),
                                      390 => 
                                      array (
                                        'key' => 'GALVANATOR',
                                        'value' => 2013,
                                      ),
                                      391 => 
                                      array (
                                        'key' => 'GAMMON',
                                        'value' => 2014,
                                      ),
                                      392 => 
                                      array (
                                        'key' => 'GAUNTLET',
                                        'value' => 2015,
                                      ),
                                      393 => 
                                      array (
                                        'key' => 'GENERIC',
                                        'value' => 2016,
                                      ),
                                      394 => 
                                      array (
                                        'key' => 'GENERIC LOW TEMP TANK TRUCK',
                                        'value' => 2017,
                                      ),
                                      395 => 
                                      array (
                                        'key' => 'GENERIC PLASTER & GROUT',
                                        'value' => 2018,
                                      ),
                                      396 => 
                                      array (
                                        'key' => 'GENERIC VACUUM',
                                        'value' => 2019,
                                      ),
                                      397 => 
                                      array (
                                        'key' => 'GENERIC WATER DISCHARGE',
                                        'value' => 2020,
                                      ),
                                      398 => 
                                      array (
                                        'key' => 'GENERIC WATER S&D',
                                        'value' => 2021,
                                      ),
                                      399 => 
                                      array (
                                        'key' => 'GENLINE',
                                        'value' => 2022,
                                      ),
                                      400 => 
                                      array (
                                        'key' => 'GENLINE GL',
                                        'value' => 2023,
                                      ),
                                      401 => 
                                      array (
                                        'key' => 'GENLINE GL-802',
                                        'value' => 2024,
                                      ),
                                      402 => 
                                      array (
                                        'key' => 'GENLINE GL-803',
                                        'value' => 2025,
                                      ),
                                      403 => 
                                      array (
                                        'key' => 'GHX',
                                        'value' => 2026,
                                      ),
                                      404 => 
                                      array (
                                        'key' => 'GILBARCO',
                                        'value' => 2027,
                                      ),
                                      405 => 
                                      array (
                                        'key' => 'GLOBAL',
                                        'value' => 2028,
                                      ),
                                      406 => 
                                      array (
                                        'key' => 'GNSPEC',
                                        'value' => 2029,
                                      ),
                                      407 => 
                                      array (
                                        'key' => 'GNSPEC 100R12',
                                        'value' => 2030,
                                      ),
                                      408 => 
                                      array (
                                        'key' => 'GNSPEC 100R16',
                                        'value' => 2031,
                                      ),
                                      409 => 
                                      array (
                                        'key' => 'GNSPEC 100R2',
                                        'value' => 2032,
                                      ),
                                      410 => 
                                      array (
                                        'key' => 'GNSPEC 100R6',
                                        'value' => 2033,
                                      ),
                                      411 => 
                                      array (
                                        'key' => 'GNSPEC 200 AIR',
                                        'value' => 2034,
                                      ),
                                      412 => 
                                      array (
                                        'key' => 'GNSPEC 250 AIR',
                                        'value' => 2035,
                                      ),
                                      413 => 
                                      array (
                                        'key' => 'GNSPEC 300 AIR',
                                        'value' => 2036,
                                      ),
                                      414 => 
                                      array (
                                        'key' => 'GNSPEC 4001 PRESSURE WASHER',
                                        'value' => 2037,
                                      ),
                                      415 => 
                                      array (
                                        'key' => 'GNSPEC 4500 PRESSURE WASHER',
                                        'value' => 2038,
                                      ),
                                      416 => 
                                      array (
                                        'key' => 'GNSPEC NR SPRAY',
                                        'value' => 2039,
                                      ),
                                      417 => 
                                      array (
                                        'key' => 'GNSPEC PUSH ON 250',
                                        'value' => 2040,
                                      ),
                                      418 => 
                                      array (
                                        'key' => 'GOLD SNAKE',
                                        'value' => 2041,
                                      ),
                                      419 => 
                                      array (
                                        'key' => 'GOOD FLEX',
                                        'value' => 2042,
                                      ),
                                      420 => 
                                      array (
                                        'key' => 'GOODALL',
                                        'value' => 2043,
                                      ),
                                      421 => 
                                      array (
                                        'key' => 'GORILLA',
                                        'value' => 2044,
                                      ),
                                      422 => 
                                      array (
                                        'key' => 'GRACO',
                                        'value' => 2045,
                                      ),
                                      423 => 
                                      array (
                                        'key' => 'GRAINGER',
                                        'value' => 2046,
                                      ),
                                      424 => 
                                      array (
                                        'key' => 'GRAY FLEXTRA LT',
                                        'value' => 2047,
                                      ),
                                      425 => 
                                      array (
                                        'key' => 'GRAY FLEXWING',
                                        'value' => 2048,
                                      ),
                                      426 => 
                                      array (
                                        'key' => 'GRAY FOOD',
                                        'value' => 2049,
                                      ),
                                      427 => 
                                      array (
                                        'key' => 'GRAY SUCTION',
                                        'value' => 2050,
                                      ),
                                      428 => 
                                      array (
                                        'key' => 'GREASE GUN HOSE',
                                        'value' => 2051,
                                      ),
                                      429 => 
                                      array (
                                        'key' => 'GREAT NECK',
                                        'value' => 2052,
                                      ),
                                      430 => 
                                      array (
                                        'key' => 'GREAT PLAINS',
                                        'value' => 2053,
                                      ),
                                      431 => 
                                      array (
                                        'key' => 'GREEN HORNET XF',
                                        'value' => 2054,
                                      ),
                                      432 => 
                                      array (
                                        'key' => 'GTR/CTD Sprockets',
                                        'value' => 2760,
                                      ),
                                      433 => 
                                      array (
                                        'key' => 'GUNITE',
                                        'value' => 2055,
                                      ),
                                      434 => 
                                      array (
                                        'key' => 'HAMILTON BLAST',
                                        'value' => 2056,
                                      ),
                                      435 => 
                                      array (
                                        'key' => 'HAMILTON HYDROCARBON DRAIN',
                                        'value' => 2057,
                                      ),
                                      436 => 
                                      array (
                                        'key' => 'HANLIO TWIN-LINE GRADE R',
                                        'value' => 2058,
                                      ),
                                      437 => 
                                      array (
                                        'key' => 'HART',
                                        'value' => 2059,
                                      ),
                                      438 => 
                                      array (
                                        'key' => 'HART BLACK SOFTWALL',
                                        'value' => 2060,
                                      ),
                                      439 => 
                                      array (
                                        'key' => 'HART FABCHEM',
                                        'value' => 2061,
                                      ),
                                      440 => 
                                      array (
                                        'key' => 'HART FLOUR DISCHARGE',
                                        'value' => 2062,
                                      ),
                                      441 => 
                                      array (
                                        'key' => 'HART HOT AIR',
                                        'value' => 2063,
                                      ),
                                      442 => 
                                      array (
                                        'key' => 'HARVEST',
                                        'value' => 2064,
                                      ),
                                      443 => 
                                      array (
                                        'key' => 'Hawk Pd',
                                        'value' => 2692,
                                      ),
                                      444 => 
                                      array (
                                        'key' => 'Hawk Pd Sprockets',
                                        'value' => 2694,
                                      ),
                                      445 => 
                                      array (
                                        'key' => 'HD AIR',
                                        'value' => 2065,
                                      ),
                                      446 => 
                                      array (
                                        'key' => 'HD AIR & WATER',
                                        'value' => 2066,
                                      ),
                                      447 => 
                                      array (
                                        'key' => 'HD INDUSTRIAL VACUUM',
                                        'value' => 2067,
                                      ),
                                      448 => 
                                      array (
                                        'key' => 'HD PETRO TRANSFER',
                                        'value' => 2068,
                                      ),
                                      449 => 
                                      array (
                                        'key' => 'HD VACUUM',
                                        'value' => 2069,
                                      ),
                                      450 => 
                                      array (
                                        'key' => 'HD WATER DISCHARGE',
                                        'value' => 2070,
                                      ),
                                      451 => 
                                      array (
                                        'key' => 'HD WATER SD',
                                        'value' => 2071,
                                      ),
                                      452 => 
                                      array (
                                        'key' => 'HEATER HOSE 20R3D2',
                                        'value' => 2072,
                                      ),
                                      453 => 
                                      array (
                                        'key' => 'HEATER WATER',
                                        'value' => 2073,
                                      ),
                                      454 => 
                                      array (
                                        'key' => 'HEAVY DUTY STEAM PILE DRIVER',
                                        'value' => 2074,
                                      ),
                                      455 => 
                                      array (
                                        'key' => 'HEWITT',
                                        'value' => 2075,
                                      ),
                                      456 => 
                                      array (
                                        'key' => 'HEWITT AIRCRAFT',
                                        'value' => 2076,
                                      ),
                                      457 => 
                                      array (
                                        'key' => 'Hex',
                                        'value' => 2693,
                                      ),
                                      458 => 
                                      array (
                                        'key' => 'HI-MINER II',
                                        'value' => 2077,
                                      ),
                                      459 => 
                                      array (
                                        'key' => 'HI-PER',
                                        'value' => 2078,
                                      ),
                                      460 => 
                                      array (
                                        'key' => 'HIPER WATER',
                                        'value' => 2079,
                                      ),
                                      461 => 
                                      array (
                                        'key' => 'HOOSIER FOOD TL',
                                        'value' => 2080,
                                      ),
                                      462 => 
                                      array (
                                        'key' => 'HOSCO',
                                        'value' => 2081,
                                      ),
                                      463 => 
                                      array (
                                        'key' => 'HOSE POWER',
                                        'value' => 2082,
                                      ),
                                      464 => 
                                      array (
                                        'key' => 'HOSEPOWER',
                                        'value' => 2083,
                                      ),
                                      465 => 
                                      array (
                                        'key' => 'HOT TAR & ASPHALT EN13482',
                                        'value' => 2084,
                                      ),
                                      466 => 
                                      array (
                                        'key' => 'HOT TAR & ASPHALT ROUGH BORE',
                                        'value' => 2085,
                                      ),
                                      467 => 
                                      array (
                                        'key' => 'HOT WATER ELITE',
                                        'value' => 2086,
                                      ),
                                      468 => 
                                      array (
                                        'key' => 'HR4',
                                        'value' => 2087,
                                      ),
                                      469 => 
                                      array (
                                        'key' => 'HR6',
                                        'value' => 2088,
                                      ),
                                      470 => 
                                      array (
                                        'key' => 'HUDSON',
                                        'value' => 2089,
                                      ),
                                      471 => 
                                      array (
                                        'key' => 'HUMIDIFIER HOSE',
                                        'value' => 2090,
                                      ),
                                      472 => 
                                      array (
                                        'key' => 'HUSKY',
                                        'value' => 2091,
                                      ),
                                      473 => 
                                      array (
                                        'key' => 'HVLP NON-CONDUCTIVE',
                                        'value' => 2092,
                                      ),
                                      474 => 
                                      array (
                                        'key' => 'HW DRY CEMENT & BARITES',
                                        'value' => 2093,
                                      ),
                                      475 => 
                                      array (
                                        'key' => 'Hy-T Plus',
                                        'value' => 2695,
                                      ),
                                      476 => 
                                      array (
                                        'key' => 'Hy-T Plus Aramid',
                                        'value' => 2696,
                                      ),
                                      477 => 
                                      array (
                                        'key' => 'Hy-T Torque Team',
                                        'value' => 2697,
                                      ),
                                      478 => 
                                      array (
                                        'key' => 'Hy-T Torque Team Laminated',
                                        'value' => 2698,
                                      ),
                                      479 => 
                                      array (
                                        'key' => 'Hy-T Wedge',
                                        'value' => 2699,
                                      ),
                                      480 => 
                                      array (
                                        'key' => 'Hy-T Wedge Aramid',
                                        'value' => 2700,
                                      ),
                                      481 => 
                                      array (
                                        'key' => 'Hy-T Wedge Torque Team',
                                        'value' => 2701,
                                      ),
                                      482 => 
                                      array (
                                        'key' => 'HYDROCARBON DRAIN',
                                        'value' => 2094,
                                      ),
                                      483 => 
                                      array (
                                        'key' => 'HYDROVATOR',
                                        'value' => 2095,
                                      ),
                                      484 => 
                                      array (
                                        'key' => 'HYDROVATOR PLUS',
                                        'value' => 2096,
                                      ),
                                      485 => 
                                      array (
                                        'key' => 'I.R.F.',
                                        'value' => 2097,
                                      ),
                                      486 => 
                                      array (
                                        'key' => 'IBM COOLING WATER',
                                        'value' => 2098,
                                      ),
                                      487 => 
                                      array (
                                        'key' => 'IBRS',
                                        'value' => 2099,
                                      ),
                                      488 => 
                                      array (
                                        'key' => 'IBRS SANITARY',
                                        'value' => 2100,
                                      ),
                                      489 => 
                                      array (
                                        'key' => 'ICE CUTTER HOSE',
                                        'value' => 2101,
                                      ),
                                      490 => 
                                      array (
                                        'key' => 'INERT GAS',
                                        'value' => 2102,
                                      ),
                                      491 => 
                                      array (
                                        'key' => 'INET COOLING',
                                        'value' => 2103,
                                      ),
                                      492 => 
                                      array (
                                        'key' => 'INFINITY CHEMICAL',
                                        'value' => 2104,
                                      ),
                                      493 => 
                                      array (
                                        'key' => 'INFINITY FOOD',
                                        'value' => 2105,
                                      ),
                                      494 => 
                                      array (
                                        'key' => 'INFINITY FUEL DROP',
                                        'value' => 2106,
                                      ),
                                      495 => 
                                      array (
                                        'key' => 'INFINITY FUEL DROP HD',
                                        'value' => 2107,
                                      ),
                                      496 => 
                                      array (
                                        'key' => 'INFINITY MILK',
                                        'value' => 2108,
                                      ),
                                      497 => 
                                      array (
                                        'key' => 'INJECTION COOLANT',
                                        'value' => 2109,
                                      ),
                                      498 => 
                                      array (
                                        'key' => 'INLET HOSE',
                                        'value' => 2110,
                                      ),
                                      499 => 
                                      array (
                                        'key' => 'INSTA-GRIP 250',
                                        'value' => 2111,
                                      ),
                                      500 => 
                                      array (
                                        'key' => 'INSTA-GRIP 300',
                                        'value' => 2112,
                                      ),
                                      501 => 
                                      array (
                                        'key' => 'INSTA-GRIP HT',
                                        'value' => 2113,
                                      ),
                                      502 => 
                                      array (
                                        'key' => 'INSTA-GRIP SP',
                                        'value' => 2114,
                                      ),
                                      503 => 
                                      array (
                                        'key' => 'INSTA-GRIP TC',
                                        'value' => 2115,
                                      ),
                                      504 => 
                                      array (
                                        'key' => 'INSTA-LOCK',
                                        'value' => 2116,
                                      ),
                                      505 => 
                                      array (
                                        'key' => 'Insta-Power',
                                        'value' => 2702,
                                      ),
                                      506 => 
                                      array (
                                        'key' => 'INTERCHEM',
                                        'value' => 2117,
                                      ),
                                      507 => 
                                      array (
                                        'key' => 'INTERM',
                                        'value' => 2118,
                                      ),
                                      508 => 
                                      array (
                                        'key' => 'INTERNATIONAL BELT',
                                        'value' => 2119,
                                      ),
                                      509 => 
                                      array (
                                        'key' => 'IRC DRILL WATER',
                                        'value' => 2120,
                                      ),
                                      510 => 
                                      array (
                                        'key' => 'IRPCO',
                                        'value' => 2121,
                                      ),
                                      511 => 
                                      array (
                                        'key' => 'IRR',
                                        'value' => 2122,
                                      ),
                                      512 => 
                                      array (
                                        'key' => 'IRR FLEX JET',
                                        'value' => 2123,
                                      ),
                                      513 => 
                                      array (
                                        'key' => 'IRRIGATION BOOT',
                                        'value' => 2124,
                                      ),
                                      514 => 
                                      array (
                                        'key' => 'ISO 3821',
                                        'value' => 2125,
                                      ),
                                      515 => 
                                      array (
                                        'key' => 'ISO 8031',
                                        'value' => 2126,
                                      ),
                                      516 => 
                                      array (
                                        'key' => 'ITALPR',
                                        'value' => 2127,
                                      ),
                                      517 => 
                                      array (
                                        'key' => 'ITALPR TEFLON',
                                        'value' => 2128,
                                      ),
                                      518 => 
                                      array (
                                        'key' => 'JACKHAMMER',
                                        'value' => 2129,
                                      ),
                                      519 => 
                                      array (
                                        'key' => 'JB INDUSTRIES',
                                        'value' => 2130,
                                      ),
                                      520 => 
                                      array (
                                        'key' => 'JET RANGER',
                                        'value' => 2131,
                                      ),
                                      521 => 
                                      array (
                                        'key' => 'JETTING',
                                        'value' => 2132,
                                      ),
                                      522 => 
                                      array (
                                        'key' => 'JETTING AND UTILITY',
                                        'value' => 2133,
                                      ),
                                      523 => 
                                      array (
                                        'key' => 'JGB INDUSTRIES',
                                        'value' => 2134,
                                      ),
                                      524 => 
                                      array (
                                        'key' => 'JOHN DEERE',
                                        'value' => 2135,
                                      ),
                                      525 => 
                                      array (
                                        'key' => 'KAPTEC ULTRAFLEX',
                                        'value' => 2136,
                                      ),
                                      526 => 
                                      array (
                                        'key' => 'KAPTECH FOOD DICHARGE',
                                        'value' => 2137,
                                      ),
                                      527 => 
                                      array (
                                        'key' => 'KELCO BLAST',
                                        'value' => 2138,
                                      ),
                                      528 => 
                                      array (
                                        'key' => 'KETEK FLEX PETROLEUM',
                                        'value' => 2139,
                                      ),
                                      529 => 
                                      array (
                                        'key' => 'KINKGUARD',
                                        'value' => 2140,
                                      ),
                                      530 => 
                                      array (
                                        'key' => 'LABOUR BLUCOR COUPLING',
                                        'value' => 2141,
                                      ),
                                      531 => 
                                      array (
                                        'key' => 'LACTOPAL',
                                        'value' => 2142,
                                      ),
                                      532 => 
                                      array (
                                        'key' => 'LAKECHARLES',
                                        'value' => 2143,
                                      ),
                                      533 => 
                                      array (
                                        'key' => 'Laser Alignment',
                                        'value' => 2703,
                                      ),
                                      534 => 
                                      array (
                                        'key' => 'LEGACY TPU',
                                        'value' => 2144,
                                      ),
                                      535 => 
                                      array (
                                        'key' => 'LG NITRILE',
                                        'value' => 2145,
                                      ),
                                      536 => 
                                      array (
                                        'key' => 'LIGHTRAC',
                                        'value' => 2146,
                                      ),
                                      537 => 
                                      array (
                                        'key' => 'LIGHTWEIGHT VACUUM',
                                        'value' => 2147,
                                      ),
                                      538 => 
                                      array (
                                        'key' => 'LINECRETE',
                                        'value' => 2148,
                                      ),
                                      539 => 
                                      array (
                                        'key' => 'LIQUID MUD',
                                        'value' => 2149,
                                      ),
                                      540 => 
                                      array (
                                        'key' => 'LIQUID MUD YS',
                                        'value' => 2150,
                                      ),
                                      541 => 
                                      array (
                                        'key' => 'LIQUIFORCE',
                                        'value' => 2151,
                                      ),
                                      542 => 
                                      array (
                                        'key' => 'LPG DELIVERY PRO',
                                        'value' => 2152,
                                      ),
                                      543 => 
                                      array (
                                        'key' => 'LW ARCTIC TANK TRUCK',
                                        'value' => 2153,
                                      ),
                                      544 => 
                                      array (
                                        'key' => 'LW BLACK FLEXTRA II',
                                        'value' => 2154,
                                      ),
                                      545 => 
                                      array (
                                        'key' => 'LW INDUSTRIAL VACUUM',
                                        'value' => 2155,
                                      ),
                                      546 => 
                                      array (
                                        'key' => 'M&P MINE CONDUIT',
                                        'value' => 2156,
                                      ),
                                      547 => 
                                      array (
                                        'key' => 'MANUS BLAST',
                                        'value' => 2157,
                                      ),
                                      548 => 
                                      array (
                                        'key' => 'MANUS BLAST WHIP',
                                        'value' => 2158,
                                      ),
                                      549 => 
                                      array (
                                        'key' => 'MARIAN',
                                        'value' => 2159,
                                      ),
                                      550 => 
                                      array (
                                        'key' => 'MARINE BILGE',
                                        'value' => 2160,
                                      ),
                                      551 => 
                                      array (
                                        'key' => 'MARINE EXHAUST HOSE',
                                        'value' => 2161,
                                      ),
                                      552 => 
                                      array (
                                        'key' => 'MARINE FUEL FEED VENT J1527 B2',
                                        'value' => 2162,
                                      ),
                                      553 => 
                                      array (
                                        'key' => 'MARINE FUEL FILL',
                                        'value' => 2163,
                                      ),
                                      554 => 
                                      array (
                                        'key' => 'MARINE FUEL LINE',
                                        'value' => 2164,
                                      ),
                                      555 => 
                                      array (
                                        'key' => 'MARINE HARDWALL WET EXHAUST',
                                        'value' => 2165,
                                      ),
                                      556 => 
                                      array (
                                        'key' => 'MARINE LIVEWELL',
                                        'value' => 2166,
                                      ),
                                      557 => 
                                      array (
                                        'key' => 'MARINE OIL FILL',
                                        'value' => 2167,
                                      ),
                                      558 => 
                                      array (
                                        'key' => 'MARINE SANITATION',
                                        'value' => 2168,
                                      ),
                                      559 => 
                                      array (
                                        'key' => 'MARINE SOFTWALL WET EXHAUST',
                                        'value' => 2169,
                                      ),
                                      560 => 
                                      array (
                                        'key' => 'MARINE VACUUM',
                                        'value' => 2170,
                                      ),
                                      561 => 
                                      array (
                                        'key' => 'MAST-AIR',
                                        'value' => 2171,
                                      ),
                                      562 => 
                                      array (
                                        'key' => 'MASTERCOOL',
                                        'value' => 2172,
                                      ),
                                      563 => 
                                      array (
                                        'key' => 'MASTHD',
                                        'value' => 2173,
                                      ),
                                      564 => 
                                      array (
                                        'key' => 'MATERIAL HANDLING',
                                        'value' => 2174,
                                      ),
                                      565 => 
                                      array (
                                        'key' => 'MATERIAL HANDLING DISCHARGE',
                                        'value' => 2175,
                                      ),
                                      566 => 
                                      array (
                                        'key' => 'MAXXIM PREMIER ULTRA',
                                        'value' => 2176,
                                      ),
                                      567 => 
                                      array (
                                        'key' => 'MCCARTY WATER S&D',
                                        'value' => 2177,
                                      ),
                                      568 => 
                                      array (
                                        'key' => 'MCGILL',
                                        'value' => 2178,
                                      ),
                                      569 => 
                                      array (
                                        'key' => 'MECR&S',
                                        'value' => 2179,
                                      ),
                                      570 => 
                                      array (
                                        'key' => 'MECR&S PAINT SPRAY',
                                        'value' => 2180,
                                      ),
                                      571 => 
                                      array (
                                        'key' => 'MER OILFIELD SUCTION',
                                        'value' => 2181,
                                      ),
                                      572 => 
                                      array (
                                        'key' => 'MERMAR',
                                        'value' => 2182,
                                      ),
                                      573 => 
                                      array (
                                        'key' => 'MESA',
                                        'value' => 2183,
                                      ),
                                      574 => 
                                      array (
                                        'key' => 'MESA AMMONIUM NITRATE PELLET',
                                        'value' => 2184,
                                      ),
                                      575 => 
                                      array (
                                        'key' => 'MESA DRAIN',
                                        'value' => 2185,
                                      ),
                                      576 => 
                                      array (
                                        'key' => 'MESA GUNITE',
                                        'value' => 2186,
                                      ),
                                      577 => 
                                      array (
                                        'key' => 'MESA PLASTER & GROUT',
                                        'value' => 2187,
                                      ),
                                      578 => 
                                      array (
                                        'key' => 'MESA REFRACTORY GUNITE',
                                        'value' => 2188,
                                      ),
                                      579 => 
                                      array (
                                        'key' => 'MESA ROOF DRAIN',
                                        'value' => 2189,
                                      ),
                                      580 => 
                                      array (
                                        'key' => 'MESA ROOF DRAIN CHEMICAL',
                                        'value' => 2190,
                                      ),
                                      581 => 
                                      array (
                                        'key' => 'Metric',
                                        'value' => 2704,
                                      ),
                                      582 => 
                                      array (
                                        'key' => 'MHPRF 11588G II ST',
                                        'value' => 2191,
                                      ),
                                      583 => 
                                      array (
                                        'key' => 'MIDWEST',
                                        'value' => 2192,
                                      ),
                                      584 => 
                                      array (
                                        'key' => 'MIL A-A-59566',
                                        'value' => 2193,
                                      ),
                                      585 => 
                                      array (
                                        'key' => 'MIL A-A-59567',
                                        'value' => 2194,
                                      ),
                                      586 => 
                                      array (
                                        'key' => 'MIL-A-A-59565',
                                        'value' => 2195,
                                      ),
                                      587 => 
                                      array (
                                        'key' => 'MIL-DTL-13444-I',
                                        'value' => 2196,
                                      ),
                                      588 => 
                                      array (
                                        'key' => 'MIL-DTL-13444-III',
                                        'value' => 2197,
                                      ),
                                      589 => 
                                      array (
                                        'key' => 'MIL-DTL-13531 TYPE II, CL A',
                                        'value' => 2198,
                                      ),
                                      590 => 
                                      array (
                                        'key' => 'MIL-DTL-17505',
                                        'value' => 2199,
                                      ),
                                      591 => 
                                      array (
                                        'key' => 'MIL-DTL-20176',
                                        'value' => 2200,
                                      ),
                                      592 => 
                                      array (
                                        'key' => 'MIL-DTL-22240',
                                        'value' => 2201,
                                      ),
                                      593 => 
                                      array (
                                        'key' => 'MIL-DTL-27516',
                                        'value' => 2202,
                                      ),
                                      594 => 
                                      array (
                                        'key' => 'MIL-DTL-29210',
                                        'value' => 2203,
                                      ),
                                      595 => 
                                      array (
                                        'key' => 'MIL-DTL-6615',
                                        'value' => 2204,
                                      ),
                                      596 => 
                                      array (
                                        'key' => 'MIL-H-24580',
                                        'value' => 2205,
                                      ),
                                      597 => 
                                      array (
                                        'key' => 'MIL-H-82127',
                                        'value' => 2206,
                                      ),
                                      598 => 
                                      array (
                                        'key' => 'MIL-PRF-11588 TYPE I',
                                        'value' => 2207,
                                      ),
                                      599 => 
                                      array (
                                        'key' => 'MIL-PRF-11588 TYPE III',
                                        'value' => 2208,
                                      ),
                                      600 => 
                                      array (
                                        'key' => 'MIL-PRF-370 TYPE A',
                                        'value' => 2209,
                                      ),
                                      601 => 
                                      array (
                                        'key' => 'MIL-PRF-370 TYPE B',
                                        'value' => 2210,
                                      ),
                                      602 => 
                                      array (
                                        'key' => 'Mileagemaker',
                                        'value' => 2705,
                                      ),
                                      603 => 
                                      array (
                                        'key' => 'Mill Belt',
                                        'value' => 2706,
                                      ),
                                      604 => 
                                      array (
                                        'key' => 'MILTARY',
                                        'value' => 2211,
                                      ),
                                      605 => 
                                      array (
                                        'key' => 'MILTON',
                                        'value' => 2212,
                                      ),
                                      606 => 
                                      array (
                                        'key' => 'MINE CONDUIT',
                                        'value' => 2213,
                                      ),
                                      607 => 
                                      array (
                                        'key' => 'MOCCASIN',
                                        'value' => 2214,
                                      ),
                                      608 => 
                                      array (
                                        'key' => 'MORRIS AIR SEEDER',
                                        'value' => 2215,
                                      ),
                                      609 => 
                                      array (
                                        'key' => 'MORRIS AIR SEEDER LT',
                                        'value' => 2216,
                                      ),
                                      610 => 
                                      array (
                                        'key' => 'MPI',
                                        'value' => 2217,
                                      ),
                                      611 => 
                                      array (
                                        'key' => 'MPI PREMIUM-GUARD MARINE',
                                        'value' => 2218,
                                      ),
                                      612 => 
                                      array (
                                        'key' => 'MUD CUTTING HW',
                                        'value' => 2219,
                                      ),
                                      613 => 
                                      array (
                                        'key' => 'MUD RETURN LINE',
                                        'value' => 2220,
                                      ),
                                      614 => 
                                      array (
                                        'key' => 'MUD STACKING',
                                        'value' => 2221,
                                      ),
                                      615 => 
                                      array (
                                        'key' => 'Multirib',
                                        'value' => 2707,
                                      ),
                                      616 => 
                                      array (
                                        'key' => 'Multirib Power',
                                        'value' => 2708,
                                      ),
                                      617 => 
                                      array (
                                        'key' => 'MULTISTREAM HW',
                                        'value' => 2222,
                                      ),
                                      618 => 
                                      array (
                                        'key' => 'MULTISTREAM SW',
                                        'value' => 2223,
                                      ),
                                      619 => 
                                      array (
                                        'key' => 'NAFIRE',
                                        'value' => 2224,
                                      ),
                                      620 => 
                                      array (
                                        'key' => 'NAVISTAR',
                                        'value' => 2225,
                                      ),
                                      621 => 
                                      array (
                                        'key' => 'NELSON DUNN',
                                        'value' => 2226,
                                      ),
                                      622 => 
                                      array (
                                        'key' => 'Neothane',
                                        'value' => 2709,
                                      ),
                                      623 => 
                                      array (
                                        'key' => 'NEPTUNE',
                                        'value' => 2227,
                                      ),
                                      624 => 
                                      array (
                                        'key' => 'NESI OILFIELD',
                                        'value' => 2228,
                                      ),
                                      625 => 
                                      array (
                                        'key' => 'NEWLINE',
                                        'value' => 2229,
                                      ),
                                      626 => 
                                      array (
                                        'key' => 'NISHIN',
                                        'value' => 2230,
                                      ),
                                      627 => 
                                      array (
                                        'key' => 'NISSHIN',
                                        'value' => 2231,
                                      ),
                                      628 => 
                                      array (
                                        'key' => 'NITRO FLOOD WATER S&D',
                                        'value' => 2232,
                                      ),
                                      629 => 
                                      array (
                                        'key' => 'NITRO R&C WATER S&D',
                                        'value' => 2233,
                                      ),
                                      630 => 
                                      array (
                                        'key' => 'NITROGEN SERVICE',
                                        'value' => 2234,
                                      ),
                                      631 => 
                                      array (
                                        'key' => 'NOV',
                                        'value' => 2235,
                                      ),
                                      632 => 
                                      array (
                                        'key' => 'NPETRO LW',
                                        'value' => 2236,
                                      ),
                                      633 => 
                                      array (
                                        'key' => 'NR SPRAY',
                                        'value' => 2237,
                                      ),
                                      634 => 
                                      array (
                                        'key' => 'NR7',
                                        'value' => 2238,
                                      ),
                                      635 => 
                                      array (
                                        'key' => 'NR8',
                                        'value' => 2239,
                                      ),
                                      636 => 
                                      array (
                                        'key' => 'NSH',
                                        'value' => 2240,
                                      ),
                                      637 => 
                                      array (
                                        'key' => 'NUTRIFLEX',
                                        'value' => 2241,
                                      ),
                                      638 => 
                                      array (
                                        'key' => 'NUTRIFLEX STATIC WIRE',
                                        'value' => 2242,
                                      ),
                                      639 => 
                                      array (
                                        'key' => 'NUTRIFLEX SUCTION & DISCHARGE',
                                        'value' => 2243,
                                      ),
                                      640 => 
                                      array (
                                        'key' => 'NUTRIFLO SUCTION & DISCHARGE',
                                        'value' => 2244,
                                      ),
                                      641 => 
                                      array (
                                        'key' => 'OAKLEY',
                                        'value' => 2245,
                                      ),
                                      642 => 
                                      array (
                                        'key' => 'OETS',
                                        'value' => 2710,
                                      ),
                                      643 => 
                                      array (
                                        'key' => 'OFFSHORE FUEL',
                                        'value' => 2246,
                                      ),
                                      644 => 
                                      array (
                                        'key' => 'OFFSHORE VIPER',
                                        'value' => 2247,
                                      ),
                                      645 => 
                                      array (
                                        'key' => 'OIL DISCHARGE',
                                        'value' => 2248,
                                      ),
                                      646 => 
                                      array (
                                        'key' => 'OIL RIG HARDWALL',
                                        'value' => 2249,
                                      ),
                                      647 => 
                                      array (
                                        'key' => 'OIL RIG HARDWALL BIOFUEL',
                                        'value' => 2250,
                                      ),
                                      648 => 
                                      array (
                                        'key' => 'OIL RIG SOFTWALL',
                                        'value' => 2251,
                                      ),
                                      649 => 
                                      array (
                                        'key' => 'OIL TREAT & BLENDER',
                                        'value' => 2252,
                                      ),
                                      650 => 
                                      array (
                                        'key' => 'OILFIELD DISCHARGE',
                                        'value' => 2253,
                                      ),
                                      651 => 
                                      array (
                                        'key' => 'OILFIELD FRAC',
                                        'value' => 2254,
                                      ),
                                      652 => 
                                      array (
                                        'key' => 'OMNI',
                                        'value' => 2255,
                                      ),
                                      653 => 
                                      array (
                                        'key' => 'OMNI WATER S&D',
                                        'value' => 2256,
                                      ),
                                      654 => 
                                      array (
                                        'key' => 'Open End Falcon',
                                        'value' => 2711,
                                      ),
                                      655 => 
                                      array (
                                        'key' => 'Open End Hawk',
                                        'value' => 2712,
                                      ),
                                      656 => 
                                      array (
                                        'key' => 'Open End Hy-T Plus',
                                        'value' => 2713,
                                      ),
                                      657 => 
                                      array (
                                        'key' => 'Open End Metric T Pd',
                                        'value' => 2714,
                                      ),
                                      658 => 
                                      array (
                                        'key' => 'Open End Positive Drive',
                                        'value' => 2715,
                                      ),
                                      659 => 
                                      array (
                                        'key' => 'Open End Super Torque',
                                        'value' => 2716,
                                      ),
                                      660 => 
                                      array (
                                        'key' => 'ORANGE FLEXWING',
                                        'value' => 2257,
                                      ),
                                      661 => 
                                      array (
                                        'key' => 'ORTAC',
                                        'value' => 2258,
                                      ),
                                      662 => 
                                      array (
                                        'key' => 'ORTAC II',
                                        'value' => 2259,
                                      ),
                                      663 => 
                                      array (
                                        'key' => 'PACER',
                                        'value' => 2260,
                                      ),
                                      664 => 
                                      array (
                                        'key' => 'PAGUFIX',
                                        'value' => 2261,
                                      ),
                                      665 => 
                                      array (
                                        'key' => 'PALADIN',
                                        'value' => 2262,
                                      ),
                                      666 => 
                                      array (
                                        'key' => 'PANGBORN PA BLAST',
                                        'value' => 2263,
                                      ),
                                      667 => 
                                      array (
                                        'key' => 'PARKING',
                                        'value' => 2264,
                                      ),
                                      668 => 
                                      array (
                                        'key' => 'PERFECT GARDEN HOSE',
                                        'value' => 2265,
                                      ),
                                      669 => 
                                      array (
                                        'key' => 'PERLAPAL',
                                        'value' => 2266,
                                      ),
                                      670 => 
                                      array (
                                        'key' => 'PETERS LIQUID MUD',
                                        'value' => 2267,
                                      ),
                                      671 => 
                                      array (
                                        'key' => 'PETRO OIL S&D',
                                        'value' => 2268,
                                      ),
                                      672 => 
                                      array (
                                        'key' => 'PETROL HARDWALL',
                                        'value' => 2269,
                                      ),
                                      673 => 
                                      array (
                                        'key' => 'PGC PLACEMENT TEXTILE',
                                        'value' => 2270,
                                      ),
                                      674 => 
                                      array (
                                        'key' => 'PHX FUEL GAS',
                                        'value' => 2271,
                                      ),
                                      675 => 
                                      array (
                                        'key' => 'PHX OXYGEN',
                                        'value' => 2272,
                                      ),
                                      676 => 
                                      array (
                                        'key' => 'PLASTER & GROUT',
                                        'value' => 2273,
                                      ),
                                      677 => 
                                      array (
                                        'key' => 'PLATINUM JAC RISER',
                                        'value' => 2274,
                                      ),
                                      678 => 
                                      array (
                                        'key' => 'PLIOVIC FG',
                                        'value' => 2275,
                                      ),
                                      679 => 
                                      array (
                                        'key' => 'PLIOVIC GS',
                                        'value' => 2276,
                                      ),
                                      680 => 
                                      array (
                                        'key' => 'PLIOVIC PLUS',
                                        'value' => 2277,
                                      ),
                                      681 => 
                                      array (
                                        'key' => 'PLIOVIC PVC TUBING',
                                        'value' => 2278,
                                      ),
                                      682 => 
                                      array (
                                        'key' => 'Poly-V',
                                        'value' => 2718,
                                      ),
                                      683 => 
                                      array (
                                        'key' => 'Polyflat',
                                        'value' => 2717,
                                      ),
                                      684 => 
                                      array (
                                        'key' => 'POSEIDON UL94-HB',
                                        'value' => 2279,
                                      ),
                                      685 => 
                                      array (
                                        'key' => 'Positive Drive Pd',
                                        'value' => 2719,
                                      ),
                                      686 => 
                                      array (
                                        'key' => 'POT LINE',
                                        'value' => 2280,
                                      ),
                                      687 => 
                                      array (
                                        'key' => 'POT LINE HD',
                                        'value' => 2281,
                                      ),
                                      688 => 
                                      array (
                                        'key' => 'POTABLE STOCK TANK',
                                        'value' => 2282,
                                      ),
                                      689 => 
                                      array (
                                        'key' => 'POTABLE WATER',
                                        'value' => 2283,
                                      ),
                                      690 => 
                                      array (
                                        'key' => 'POTABLE WATER HW',
                                        'value' => 2284,
                                      ),
                                      691 => 
                                      array (
                                        'key' => 'POTABLE WATER SW',
                                        'value' => 2285,
                                      ),
                                      692 => 
                                      array (
                                        'key' => 'Powerspan CI',
                                        'value' => 2720,
                                      ),
                                      693 => 
                                      array (
                                        'key' => 'Powersport',
                                        'value' => 2721,
                                      ),
                                      694 => 
                                      array (
                                        'key' => 'PRAIRIE GOLDFLEX',
                                        'value' => 2286,
                                      ),
                                      695 => 
                                      array (
                                        'key' => 'PREM MARINE WET EXHAUST COR',
                                        'value' => 2287,
                                      ),
                                      696 => 
                                      array (
                                        'key' => 'PREMIER REFRACTORY CLAMP',
                                        'value' => 2288,
                                      ),
                                      697 => 
                                      array (
                                        'key' => 'PREMIUM GARDEN',
                                        'value' => 2289,
                                      ),
                                      698 => 
                                      array (
                                        'key' => 'PREMIUM MARINE WET EXHAUST',
                                        'value' => 2290,
                                      ),
                                      699 => 
                                      array (
                                        'key' => 'Private Brand',
                                        'value' => 2722,
                                      ),
                                      700 => 
                                      array (
                                        'key' => 'PROSPECTOR AIR',
                                        'value' => 2291,
                                      ),
                                      701 => 
                                      array (
                                        'key' => 'PROSPECTOR BOP 3000',
                                        'value' => 2292,
                                      ),
                                      702 => 
                                      array (
                                        'key' => 'PROSPECTOR BOP 5000',
                                        'value' => 2293,
                                      ),
                                      703 => 
                                      array (
                                        'key' => 'PROSPECTOR FLEX',
                                        'value' => 2294,
                                      ),
                                      704 => 
                                      array (
                                        'key' => 'PROSPECTOR FLEX OILFIELD',
                                        'value' => 2295,
                                      ),
                                      705 => 
                                      array (
                                        'key' => 'PROSPECTOR FLEX PETRO',
                                        'value' => 2296,
                                      ),
                                      706 => 
                                      array (
                                        'key' => 'PROSPECTOR FRAC DISCHARGE',
                                        'value' => 2297,
                                      ),
                                      707 => 
                                      array (
                                        'key' => 'PROSPECTOR FRAC TANK HOSE',
                                        'value' => 2298,
                                      ),
                                      708 => 
                                      array (
                                        'key' => 'PROSPECTOR HOT OILER',
                                        'value' => 2299,
                                      ),
                                      709 => 
                                      array (
                                        'key' => 'PROSPECTOR MINESPRAY',
                                        'value' => 2300,
                                      ),
                                      710 => 
                                      array (
                                        'key' => 'PROSPECTOR OIL RIG HW',
                                        'value' => 2301,
                                      ),
                                      711 => 
                                      array (
                                        'key' => 'PROSPECTOR OIL RIG SW',
                                        'value' => 2302,
                                      ),
                                      712 => 
                                      array (
                                        'key' => 'PROSPECTOR OILFIELD',
                                        'value' => 2303,
                                      ),
                                      713 => 
                                      array (
                                        'key' => 'PROSPECTOR OILFIELD S&D',
                                        'value' => 2304,
                                      ),
                                      714 => 
                                      array (
                                        'key' => 'PROSPECTOR PETRO',
                                        'value' => 2305,
                                      ),
                                      715 => 
                                      array (
                                        'key' => 'PROSPECTOR PLUS AIR',
                                        'value' => 2306,
                                      ),
                                      716 => 
                                      array (
                                        'key' => 'PROSPECTOR SHR',
                                        'value' => 2307,
                                      ),
                                      717 => 
                                      array (
                                        'key' => 'PROSPECTOR WATER DISCHARGE',
                                        'value' => 2308,
                                      ),
                                      718 => 
                                      array (
                                        'key' => 'PROSPECTOR WATER S&D',
                                        'value' => 2309,
                                      ),
                                      719 => 
                                      array (
                                        'key' => 'PROTECTION RING',
                                        'value' => 2310,
                                      ),
                                      720 => 
                                      array (
                                        'key' => 'PSC CHEMICAL',
                                        'value' => 2311,
                                      ),
                                      721 => 
                                      array (
                                        'key' => 'PULP & PAPER WASHDOWN',
                                        'value' => 2312,
                                      ),
                                      722 => 
                                      array (
                                        'key' => 'PUREONE',
                                        'value' => 2313,
                                      ),
                                      723 => 
                                      array (
                                        'key' => 'PURFIT',
                                        'value' => 2314,
                                      ),
                                      724 => 
                                      array (
                                        'key' => 'PURFIT BREWLINE',
                                        'value' => 2315,
                                      ),
                                      725 => 
                                      array (
                                        'key' => 'PURPLE FLEXWING',
                                        'value' => 2316,
                                      ),
                                      726 => 
                                      array (
                                        'key' => 'PURPLE SNAKE',
                                        'value' => 2317,
                                      ),
                                      727 => 
                                      array (
                                        'key' => 'PURPLE SNAKE PLUS',
                                        'value' => 2318,
                                      ),
                                      728 => 
                                      array (
                                        'key' => 'PYROFLEX HOT AIR',
                                        'value' => 2319,
                                      ),
                                      729 => 
                                      array (
                                        'key' => 'PYROFLEX HOT AIR III FDA',
                                        'value' => 2320,
                                      ),
                                      730 => 
                                      array (
                                        'key' => 'PYROFLEX HOT TAR WAND',
                                        'value' => 2321,
                                      ),
                                      731 => 
                                      array (
                                        'key' => 'PYROFLEX II HOT AIR',
                                        'value' => 2322,
                                      ),
                                      732 => 
                                      array (
                                        'key' => 'PYROFLEX II HOT TAR & ASPHALT',
                                        'value' => 2323,
                                      ),
                                      733 => 
                                      array (
                                        'key' => 'PYROFLEX III HOT AIR',
                                        'value' => 2324,
                                      ),
                                      734 => 
                                      array (
                                        'key' => 'PYROFLEX III HOT AIR FDA',
                                        'value' => 2325,
                                      ),
                                      735 => 
                                      array (
                                        'key' => 'QD Bushings',
                                        'value' => 2723,
                                      ),
                                      736 => 
                                      array (
                                        'key' => 'QR048',
                                        'value' => 2326,
                                      ),
                                      737 => 
                                      array (
                                        'key' => 'QR48',
                                        'value' => 2327,
                                      ),
                                      738 => 
                                      array (
                                        'key' => 'QUIKSTIR',
                                        'value' => 2328,
                                      ),
                                      739 => 
                                      array (
                                        'key' => 'QUIKSTIR PUMP 2P',
                                        'value' => 2329,
                                      ),
                                      740 => 
                                      array (
                                        'key' => 'RADIATOR',
                                        'value' => 2330,
                                      ),
                                      741 => 
                                      array (
                                        'key' => 'RAGCO',
                                        'value' => 2331,
                                      ),
                                      742 => 
                                      array (
                                        'key' => 'RAIL',
                                        'value' => 2332,
                                      ),
                                      743 => 
                                      array (
                                        'key' => 'RANSBG NR SPRAY',
                                        'value' => 2333,
                                      ),
                                      744 => 
                                      array (
                                        'key' => 'RAWHID FIRE ENGINE BOOSTER',
                                        'value' => 2334,
                                      ),
                                      745 => 
                                      array (
                                        'key' => 'RCT FLEXRITE',
                                        'value' => 2335,
                                      ),
                                      746 => 
                                      array (
                                        'key' => 'RDC',
                                        'value' => 2336,
                                      ),
                                      747 => 
                                      array (
                                        'key' => 'REAL RUBBER',
                                        'value' => 2337,
                                      ),
                                      748 => 
                                      array (
                                        'key' => 'RED FLEXTRA',
                                        'value' => 2338,
                                      ),
                                      749 => 
                                      array (
                                        'key' => 'RED-L GOLDFLEX-C',
                                        'value' => 2339,
                                      ),
                                      750 => 
                                      array (
                                        'key' => 'RED-L WATER',
                                        'value' => 2340,
                                      ),
                                      751 => 
                                      array (
                                        'key' => 'REDWING BLUE LOW TEMP',
                                        'value' => 2341,
                                      ),
                                      752 => 
                                      array (
                                        'key' => 'REDWING FUEL OIL',
                                        'value' => 2342,
                                      ),
                                      753 => 
                                      array (
                                        'key' => 'REDWING FUEL OIL HD',
                                        'value' => 2343,
                                      ),
                                      754 => 
                                      array (
                                        'key' => 'REDWING VERSABRAID',
                                        'value' => 2344,
                                      ),
                                      755 => 
                                      array (
                                        'key' => 'REFRACTORY GUNITE',
                                        'value' => 2345,
                                      ),
                                      756 => 
                                      array (
                                        'key' => 'REFRACTORY HOSE',
                                        'value' => 2346,
                                      ),
                                      757 => 
                                      array (
                                        'key' => 'REFRIGERANT CHARGING',
                                        'value' => 2347,
                                      ),
                                      758 => 
                                      array (
                                        'key' => 'RELIANCE PROSPECTOR WATER S&D',
                                        'value' => 2348,
                                      ),
                                      759 => 
                                      array (
                                        'key' => 'RELIANCE WATER S&D',
                                        'value' => 2349,
                                      ),
                                      760 => 
                                      array (
                                        'key' => 'RES',
                                        'value' => 2350,
                                      ),
                                      761 => 
                                      array (
                                        'key' => 'REVERSE CIRCULATION',
                                        'value' => 2351,
                                      ),
                                      762 => 
                                      array (
                                        'key' => 'RIG SUPPLY',
                                        'value' => 2352,
                                      ),
                                      763 => 
                                      array (
                                        'key' => 'RIG SUPPLY SW',
                                        'value' => 2353,
                                      ),
                                      764 => 
                                      array (
                                        'key' => 'RIVERB',
                                        'value' => 2354,
                                      ),
                                      765 => 
                                      array (
                                        'key' => 'RL1131 TWIN-LINE GRADE R',
                                        'value' => 2355,
                                      ),
                                      766 => 
                                      array (
                                        'key' => 'ROADPATCH',
                                        'value' => 2356,
                                      ),
                                      767 => 
                                      array (
                                        'key' => 'ROBIN FREON CHARGING',
                                        'value' => 2357,
                                      ),
                                      768 => 
                                      array (
                                        'key' => 'ROCK DRILL',
                                        'value' => 2358,
                                      ),
                                      769 => 
                                      array (
                                        'key' => 'ROOF DRAIN',
                                        'value' => 2359,
                                      ),
                                      770 => 
                                      array (
                                        'key' => 'ROUGH BORE (HOT TAR & ASPHALT)',
                                        'value' => 2360,
                                      ),
                                      771 => 
                                      array (
                                        'key' => 'ROUGH BORE DOCK',
                                        'value' => 2361,
                                      ),
                                      772 => 
                                      array (
                                        'key' => 'ROYAL BRASS PLIOVIC',
                                        'value' => 2362,
                                      ),
                                      773 => 
                                      array (
                                        'key' => 'RSD',
                                        'value' => 2363,
                                      ),
                                      774 => 
                                      array (
                                        'key' => 'RX',
                                        'value' => 2364,
                                      ),
                                      775 => 
                                      array (
                                        'key' => 'S4SH',
                                        'value' => 2365,
                                      ),
                                      776 => 
                                      array (
                                        'key' => 'S4SP',
                                        'value' => 2366,
                                      ),
                                      777 => 
                                      array (
                                        'key' => 'SAE 100R4',
                                        'value' => 2367,
                                      ),
                                      778 => 
                                      array (
                                        'key' => 'SAE 20R1',
                                        'value' => 2368,
                                      ),
                                      779 => 
                                      array (
                                        'key' => 'SAE 20R2 D1',
                                        'value' => 2369,
                                      ),
                                      780 => 
                                      array (
                                        'key' => 'SAE 20R2D1',
                                        'value' => 2370,
                                      ),
                                      781 => 
                                      array (
                                        'key' => 'SAE J1527 A2 R1 ISO 7840 A2',
                                        'value' => 2371,
                                      ),
                                      782 => 
                                      array (
                                        'key' => 'SAE J1527 TYPE A2 FUEL FILL',
                                        'value' => 2372,
                                      ),
                                      783 => 
                                      array (
                                        'key' => 'SAE-20R2 D1',
                                        'value' => 2373,
                                      ),
                                      784 => 
                                      array (
                                        'key' => 'SAND RECOVERY S&D',
                                        'value' => 2374,
                                      ),
                                      785 => 
                                      array (
                                        'key' => 'SAND SUCTION',
                                        'value' => 2375,
                                      ),
                                      786 => 
                                      array (
                                        'key' => 'SANDBLAST 400',
                                        'value' => 2376,
                                      ),
                                      787 => 
                                      array (
                                        'key' => 'SANDER',
                                        'value' => 2377,
                                      ),
                                      788 => 
                                      array (
                                        'key' => 'SANI-WASH',
                                        'value' => 2378,
                                      ),
                                      789 => 
                                      array (
                                        'key' => 'SANI-WASH PLUS',
                                        'value' => 2379,
                                      ),
                                      790 => 
                                      array (
                                        'key' => 'SANI-WASH SUPREME',
                                        'value' => 2380,
                                      ),
                                      791 => 
                                      array (
                                        'key' => 'SCOMI LIQUID MUD',
                                        'value' => 2381,
                                      ),
                                      792 => 
                                      array (
                                        'key' => 'SCP3',
                                        'value' => 2382,
                                      ),
                                      793 => 
                                      array (
                                        'key' => 'SCRMAC KURB KING',
                                        'value' => 2383,
                                      ),
                                      794 => 
                                      array (
                                        'key' => 'SEALFS',
                                        'value' => 2384,
                                      ),
                                      795 => 
                                      array (
                                        'key' => 'SERVICE STATION AIR',
                                        'value' => 2385,
                                      ),
                                      796 => 
                                      array (
                                        'key' => 'SFS (FIRE SUPPRESSION)',
                                        'value' => 2386,
                                      ),
                                      797 => 
                                      array (
                                        'key' => 'SGOBAIN',
                                        'value' => 2387,
                                      ),
                                      798 => 
                                      array (
                                        'key' => 'SGOBAIN FOOD DISCHARGE',
                                        'value' => 2388,
                                      ),
                                      799 => 
                                      array (
                                        'key' => 'SGOBAIN FOOD S&D',
                                        'value' => 2389,
                                      ),
                                      800 => 
                                      array (
                                        'key' => 'Sheaves',
                                        'value' => 2725,
                                      ),
                                      801 => 
                                      array (
                                        'key' => 'SHELLFLEX',
                                        'value' => 2390,
                                      ),
                                      802 => 
                                      array (
                                        'key' => 'SHIELD',
                                        'value' => 2391,
                                      ),
                                      803 => 
                                      array (
                                        'key' => 'SilentSync',
                                        'value' => 2726,
                                      ),
                                      804 => 
                                      array (
                                        'key' => 'SINGLE LINE (GRADE R)',
                                        'value' => 2392,
                                      ),
                                      805 => 
                                      array (
                                        'key' => 'SINGLE LINE (GRADE RM)',
                                        'value' => 2393,
                                      ),
                                      806 => 
                                      array (
                                        'key' => 'SINGLE LINE (GRADE T)',
                                        'value' => 2394,
                                      ),
                                      807 => 
                                      array (
                                        'key' => 'SK CARBOV',
                                        'value' => 2395,
                                      ),
                                      808 => 
                                      array (
                                        'key' => 'SLURRY',
                                        'value' => 2396,
                                      ),
                                      809 => 
                                      array (
                                        'key' => 'SMOOTH BORE DOCK',
                                        'value' => 2397,
                                      ),
                                      810 => 
                                      array (
                                        'key' => 'SMOOTH BORE HOT TAR & ASPHALT',
                                        'value' => 2398,
                                      ),
                                      811 => 
                                      array (
                                        'key' => 'SMOOTH BORE MOLTEN SULPHUR',
                                        'value' => 2399,
                                      ),
                                      812 => 
                                      array (
                                        'key' => 'SNAPON',
                                        'value' => 2400,
                                      ),
                                      813 => 
                                      array (
                                        'key' => 'SOFTUB WATER',
                                        'value' => 2401,
                                      ),
                                      814 => 
                                      array (
                                        'key' => 'SOFTWALL',
                                        'value' => 2402,
                                      ),
                                      815 => 
                                      array (
                                        'key' => 'SOHO PROSPECTOR WATER S&D',
                                        'value' => 2403,
                                      ),
                                      816 => 
                                      array (
                                        'key' => 'SOUTHERN',
                                        'value' => 2404,
                                      ),
                                      817 => 
                                      array (
                                        'key' => 'SPARTAN PRESSURE WASHER',
                                        'value' => 2405,
                                      ),
                                      818 => 
                                      array (
                                        'key' => 'Special Pd',
                                        'value' => 2727,
                                      ),
                                      819 => 
                                      array (
                                        'key' => 'SPEEDAIRE',
                                        'value' => 2406,
                                      ),
                                      820 => 
                                      array (
                                        'key' => 'SPIR SEP',
                                        'value' => 2407,
                                      ),
                                      821 => 
                                      array (
                                        'key' => 'SPIR SEP TPG',
                                        'value' => 2408,
                                      ),
                                      822 => 
                                      array (
                                        'key' => 'SPIRAFLEX 1500',
                                        'value' => 2409,
                                      ),
                                      823 => 
                                      array (
                                        'key' => 'SPIRAFLEX 1600',
                                        'value' => 2410,
                                      ),
                                      824 => 
                                      array (
                                        'key' => 'SPIRAFLEX ACTION F.E.S',
                                        'value' => 2411,
                                      ),
                                      825 => 
                                      array (
                                        'key' => 'SPIRAFLEX AGFLEX',
                                        'value' => 2412,
                                      ),
                                      826 => 
                                      array (
                                        'key' => 'SPIRAFLEX AGGIE',
                                        'value' => 2413,
                                      ),
                                      827 => 
                                      array (
                                        'key' => 'SPIRAFLEX AIR SEEDER',
                                        'value' => 2414,
                                      ),
                                      828 => 
                                      array (
                                        'key' => 'SPIRAFLEX BARKBLOWER',
                                        'value' => 2415,
                                      ),
                                      829 => 
                                      array (
                                        'key' => 'SPIRAFLEX BLACK SUPER-DUTY LAYFLAT',
                                        'value' => 2416,
                                      ),
                                      830 => 
                                      array (
                                        'key' => 'SPIRAFLEX BLUE EXTRA LIGHT DUTY LAYFLAT',
                                        'value' => 2417,
                                      ),
                                      831 => 
                                      array (
                                        'key' => 'SPIRAFLEX CABLE GUARD',
                                        'value' => 2418,
                                      ),
                                      832 => 
                                      array (
                                        'key' => 'SPIRAFLEX DUCTING',
                                        'value' => 2419,
                                      ),
                                      833 => 
                                      array (
                                        'key' => 'SPIRAFLEX FGVAC',
                                        'value' => 2420,
                                      ),
                                      834 => 
                                      array (
                                        'key' => 'SPIRAFLEX FISH SUCTION',
                                        'value' => 2421,
                                      ),
                                      835 => 
                                      array (
                                        'key' => 'SPIRAFLEX FOODVAC',
                                        'value' => 2422,
                                      ),
                                      836 => 
                                      array (
                                        'key' => 'SPIRAFLEX GRASSVAC',
                                        'value' => 2423,
                                      ),
                                      837 => 
                                      array (
                                        'key' => 'SPIRAFLEX GRAY LIGHT DUTY LAYFLAT',
                                        'value' => 2424,
                                      ),
                                      838 => 
                                      array (
                                        'key' => 'SPIRAFLEX GREEN LAYFLAT',
                                        'value' => 2425,
                                      ),
                                      839 => 
                                      array (
                                        'key' => 'SPIRAFLEX HT',
                                        'value' => 2426,
                                      ),
                                      840 => 
                                      array (
                                        'key' => 'SPIRAFLEX LW ROCK DUST',
                                        'value' => 2427,
                                      ),
                                      841 => 
                                      array (
                                        'key' => 'SPIRAFLEX MULCH BLOWER',
                                        'value' => 2428,
                                      ),
                                      842 => 
                                      array (
                                        'key' => 'SPIRAFLEX MULCHBLOWER',
                                        'value' => 2429,
                                      ),
                                      843 => 
                                      array (
                                        'key' => 'SPIRAFLEX RED MEDIUM DUTY LAYFLAT',
                                        'value' => 2430,
                                      ),
                                      844 => 
                                      array (
                                        'key' => 'SPIRAFLEX ROCK DUST',
                                        'value' => 2431,
                                      ),
                                      845 => 
                                      array (
                                        'key' => 'SPIRAFLEX VACUUM',
                                        'value' => 2432,
                                      ),
                                      846 => 
                                      array (
                                        'key' => 'SPIRAFLEX VAPOR RECOVERY',
                                        'value' => 2433,
                                      ),
                                      847 => 
                                      array (
                                        'key' => 'SPIRAFLEX YELLOW HEAVY DUTY LAYFLAT',
                                        'value' => 2434,
                                      ),
                                      848 => 
                                      array (
                                        'key' => 'SPIRAFLOW',
                                        'value' => 2435,
                                      ),
                                      849 => 
                                      array (
                                        'key' => 'SPIRATHANE HD',
                                        'value' => 2436,
                                      ),
                                      850 => 
                                      array (
                                        'key' => 'SPIRATHANE LD',
                                        'value' => 2437,
                                      ),
                                      851 => 
                                      array (
                                        'key' => 'SPIRATHANE PT',
                                        'value' => 2438,
                                      ),
                                      852 => 
                                      array (
                                        'key' => 'SR12',
                                        'value' => 2439,
                                      ),
                                      853 => 
                                      array (
                                        'key' => 'SR13',
                                        'value' => 2440,
                                      ),
                                      854 => 
                                      array (
                                        'key' => 'SR14',
                                        'value' => 2441,
                                      ),
                                      855 => 
                                      array (
                                        'key' => 'SR14A',
                                        'value' => 2442,
                                      ),
                                      856 => 
                                      array (
                                        'key' => 'SR14B',
                                        'value' => 2443,
                                      ),
                                      857 => 
                                      array (
                                        'key' => 'SR15',
                                        'value' => 2444,
                                      ),
                                      858 => 
                                      array (
                                        'key' => 'SR16SC',
                                        'value' => 2445,
                                      ),
                                      859 => 
                                      array (
                                        'key' => 'SR18',
                                        'value' => 2446,
                                      ),
                                      860 => 
                                      array (
                                        'key' => 'SR1SN',
                                        'value' => 2447,
                                      ),
                                      861 => 
                                      array (
                                        'key' => 'SR2SN',
                                        'value' => 2448,
                                      ),
                                      862 => 
                                      array (
                                        'key' => 'SR3',
                                        'value' => 2449,
                                      ),
                                      863 => 
                                      array (
                                        'key' => 'SR5',
                                        'value' => 2450,
                                      ),
                                      864 => 
                                      array (
                                        'key' => 'SR6',
                                        'value' => 2451,
                                      ),
                                      865 => 
                                      array (
                                        'key' => 'SR7',
                                        'value' => 2452,
                                      ),
                                      866 => 
                                      array (
                                        'key' => 'SR8',
                                        'value' => 2453,
                                      ),
                                      867 => 
                                      array (
                                        'key' => 'SRS',
                                        'value' => 2454,
                                      ),
                                      868 => 
                                      array (
                                        'key' => 'STANDARD STRAIGHT RAD',
                                        'value' => 2455,
                                      ),
                                      869 => 
                                      array (
                                        'key' => 'STEAM 250',
                                        'value' => 2456,
                                      ),
                                      870 => 
                                      array (
                                        'key' => 'STEEL AIR',
                                        'value' => 2457,
                                      ),
                                      871 => 
                                      array (
                                        'key' => 'STEEL AIR BOOTSTRAP',
                                        'value' => 2458,
                                      ),
                                      872 => 
                                      array (
                                        'key' => 'SUBSEA CABLE',
                                        'value' => 2459,
                                      ),
                                      873 => 
                                      array (
                                        'key' => 'SULBANA GAUNTLET',
                                        'value' => 2460,
                                      ),
                                      874 => 
                                      array (
                                        'key' => 'SUNSDEA MUD',
                                        'value' => 2461,
                                      ),
                                      875 => 
                                      array (
                                        'key' => 'SUNSET WATER S&D FIRE SERVICE',
                                        'value' => 2462,
                                      ),
                                      876 => 
                                      array (
                                        'key' => 'SUPER AIR 400',
                                        'value' => 2463,
                                      ),
                                      877 => 
                                      array (
                                        'key' => 'SUPER BLACK FLEXWING',
                                        'value' => 2464,
                                      ),
                                      878 => 
                                      array (
                                        'key' => 'SUPER ORTAC®',
                                        'value' => 2465,
                                      ),
                                      879 => 
                                      array (
                                        'key' => 'SUPER ROCK DRILL',
                                        'value' => 2466,
                                      ),
                                      880 => 
                                      array (
                                        'key' => 'SUPER ROCK DRILL HT',
                                        'value' => 2467,
                                      ),
                                      881 => 
                                      array (
                                        'key' => 'SUPER SANI-WASH',
                                        'value' => 2468,
                                      ),
                                      882 => 
                                      array (
                                        'key' => 'Super Torque',
                                        'value' => 2728,
                                      ),
                                      883 => 
                                      array (
                                        'key' => 'SUPERIOR',
                                        'value' => 2469,
                                      ),
                                      884 => 
                                      array (
                                        'key' => 'SUPFLOW',
                                        'value' => 2470,
                                      ),
                                      885 => 
                                      array (
                                        'key' => 'SUPVAC',
                                        'value' => 2471,
                                      ),
                                      886 => 
                                      array (
                                        'key' => 'SURELINE',
                                        'value' => 2472,
                                      ),
                                      887 => 
                                      array (
                                        'key' => 'SW DRY CEMENT & BARYTES',
                                        'value' => 2473,
                                      ),
                                      888 => 
                                      array (
                                        'key' => 'SWAGELOK',
                                        'value' => 2474,
                                      ),
                                      889 => 
                                      array (
                                        'key' => 'Synchrobelt',
                                        'value' => 2729,
                                      ),
                                      890 => 
                                      array (
                                        'key' => 'Synchrochain',
                                        'value' => 2730,
                                      ),
                                      891 => 
                                      array (
                                        'key' => 'Synchrochain Carbon',
                                        'value' => 2731,
                                      ),
                                      892 => 
                                      array (
                                        'key' => 'Synchrocolor',
                                        'value' => 2732,
                                      ),
                                      893 => 
                                      array (
                                        'key' => 'Synchrocolor CXA',
                                        'value' => 2733,
                                      ),
                                      894 => 
                                      array (
                                        'key' => 'Synchrocolor CXP',
                                        'value' => 2734,
                                      ),
                                      895 => 
                                      array (
                                        'key' => 'Synchrodrive',
                                        'value' => 2735,
                                      ),
                                      896 => 
                                      array (
                                        'key' => 'Synchrodrive N10',
                                        'value' => 2736,
                                      ),
                                      897 => 
                                      array (
                                        'key' => 'Synchroflex',
                                        'value' => 2737,
                                      ),
                                      898 => 
                                      array (
                                        'key' => 'Synchroflex Gen III',
                                        'value' => 2738,
                                      ),
                                      899 => 
                                      array (
                                        'key' => 'Synchroforce Carbon',
                                        'value' => 2739,
                                      ),
                                      900 => 
                                      array (
                                        'key' => 'Synchroforce CXA',
                                        'value' => 2740,
                                      ),
                                      901 => 
                                      array (
                                        'key' => 'Synchroforce CXP',
                                        'value' => 2741,
                                      ),
                                      902 => 
                                      array (
                                        'key' => 'Synchroforce Extreme',
                                        'value' => 2742,
                                      ),
                                      903 => 
                                      array (
                                        'key' => 'Synchroline',
                                        'value' => 2743,
                                      ),
                                      904 => 
                                      array (
                                        'key' => 'Synchroline CXP',
                                        'value' => 2744,
                                      ),
                                      905 => 
                                      array (
                                        'key' => 'Synchrorib',
                                        'value' => 2745,
                                      ),
                                      906 => 
                                      array (
                                        'key' => 'Synchrorib CXA',
                                        'value' => 2746,
                                      ),
                                      907 => 
                                      array (
                                        'key' => 'Synchrorib CXP',
                                        'value' => 2747,
                                      ),
                                      908 => 
                                      array (
                                        'key' => 'Synchrotwin',
                                        'value' => 2748,
                                      ),
                                      909 => 
                                      array (
                                        'key' => 'Synchrotwin CXP',
                                        'value' => 2749,
                                      ),
                                      910 => 
                                      array (
                                        'key' => 'TAN FLEXTRA',
                                        'value' => 2475,
                                      ),
                                      911 => 
                                      array (
                                        'key' => 'TAN FLEXTRA FDA',
                                        'value' => 2476,
                                      ),
                                      912 => 
                                      array (
                                        'key' => 'TAN FLEXWING',
                                        'value' => 2477,
                                      ),
                                      913 => 
                                      array (
                                        'key' => 'TAN FLEXWING FDA',
                                        'value' => 2478,
                                      ),
                                      914 => 
                                      array (
                                        'key' => 'TANK CLEANING',
                                        'value' => 2479,
                                      ),
                                      915 => 
                                      array (
                                        'key' => 'TANKER BARGE DISCHARGE',
                                        'value' => 2480,
                                      ),
                                      916 => 
                                      array (
                                        'key' => 'Taperlock Bushings',
                                        'value' => 2750,
                                      ),
                                      917 => 
                                      array (
                                        'key' => 'TEFLON',
                                        'value' => 2481,
                                      ),
                                      918 => 
                                      array (
                                        'key' => 'Tensionrite',
                                        'value' => 2751,
                                      ),
                                      919 => 
                                      array (
                                        'key' => 'TETRA',
                                        'value' => 2482,
                                      ),
                                      920 => 
                                      array (
                                        'key' => 'THERMIDOR',
                                        'value' => 2483,
                                      ),
                                      921 => 
                                      array (
                                        'key' => 'THOMPSON FLEX XLPE',
                                        'value' => 2484,
                                      ),
                                      922 => 
                                      array (
                                        'key' => 'THUNDER INSTA-GRIP',
                                        'value' => 2485,
                                      ),
                                      923 => 
                                      array (
                                        'key' => 'TIG WELDING',
                                        'value' => 2486,
                                      ),
                                      924 => 
                                      array (
                                        'key' => 'TIMCO',
                                        'value' => 2487,
                                      ),
                                      925 => 
                                      array (
                                        'key' => 'TIPCO PREMIUM GARDEN',
                                        'value' => 2488,
                                      ),
                                      926 => 
                                      array (
                                        'key' => 'Torque Team Laminated',
                                        'value' => 2752,
                                      ),
                                      927 => 
                                      array (
                                        'key' => 'Torque Team Plus',
                                        'value' => 2753,
                                      ),
                                      928 => 
                                      array (
                                        'key' => 'Torque-Flex',
                                        'value' => 2754,
                                      ),
                                      929 => 
                                      array (
                                        'key' => 'TORRIDAIR',
                                        'value' => 2489,
                                      ),
                                      930 => 
                                      array (
                                        'key' => 'TOW CABLE',
                                        'value' => 2490,
                                      ),
                                      931 => 
                                      array (
                                        'key' => 'TR7',
                                        'value' => 2491,
                                      ),
                                      932 => 
                                      array (
                                        'key' => 'TR8',
                                        'value' => 2492,
                                      ),
                                      933 => 
                                      array (
                                        'key' => 'TRANSPLY',
                                        'value' => 2493,
                                      ),
                                      934 => 
                                      array (
                                        'key' => 'Trapezoidal Sprockets',
                                        'value' => 2755,
                                      ),
                                      935 => 
                                      array (
                                        'key' => 'TRIDENT',
                                        'value' => 2494,
                                      ),
                                      936 => 
                                      array (
                                        'key' => 'TRIDENT SER',
                                        'value' => 2495,
                                      ),
                                      937 => 
                                      array (
                                        'key' => 'TRINCO BLAST',
                                        'value' => 2496,
                                      ),
                                      938 => 
                                      array (
                                        'key' => 'TRIPLX',
                                        'value' => 2497,
                                      ),
                                      939 => 
                                      array (
                                        'key' => 'TRIX ACETYLENE',
                                        'value' => 2498,
                                      ),
                                      940 => 
                                      array (
                                        'key' => 'TRIX BLAUSTRAHL',
                                        'value' => 2499,
                                      ),
                                      941 => 
                                      array (
                                        'key' => 'TRIX BRAKE',
                                        'value' => 2500,
                                      ),
                                      942 => 
                                      array (
                                        'key' => 'TRIX FUEL',
                                        'value' => 2501,
                                      ),
                                      943 => 
                                      array (
                                        'key' => 'TRIX MULTIFOOD',
                                        'value' => 2502,
                                      ),
                                      944 => 
                                      array (
                                        'key' => 'TRIX NITRO',
                                        'value' => 2503,
                                      ),
                                      945 => 
                                      array (
                                        'key' => 'TRIX OXYGEN',
                                        'value' => 2504,
                                      ),
                                      946 => 
                                      array (
                                        'key' => 'TRIX PAINT SPRAY',
                                        'value' => 2505,
                                      ),
                                      947 => 
                                      array (
                                        'key' => 'TRIX RESPIRATION',
                                        'value' => 2506,
                                      ),
                                      948 => 
                                      array (
                                        'key' => 'TRIX ROSTRAHL',
                                        'value' => 2507,
                                      ),
                                      949 => 
                                      array (
                                        'key' => 'TRIX SUPER',
                                        'value' => 2508,
                                      ),
                                      950 => 
                                      array (
                                        'key' => 'TUNNELCOTE ROCK DUST FLEXTRA',
                                        'value' => 2509,
                                      ),
                                      951 => 
                                      array (
                                        'key' => 'TUNNELCOTE ROCK DUST FLEXWING',
                                        'value' => 2510,
                                      ),
                                      952 => 
                                      array (
                                        'key' => 'TWIN-LINE (GRADE R)',
                                        'value' => 2511,
                                      ),
                                      953 => 
                                      array (
                                        'key' => 'TWIN-LINE (GRADE RM)',
                                        'value' => 2512,
                                      ),
                                      954 => 
                                      array (
                                        'key' => 'TWIN-LINE (GRADE T)',
                                        'value' => 2513,
                                      ),
                                      955 => 
                                      array (
                                        'key' => 'TWIN-LINE ISO 3821',
                                        'value' => 2514,
                                      ),
                                      956 => 
                                      array (
                                        'key' => 'UL 92 FIRE EXTINGUISHER',
                                        'value' => 2515,
                                      ),
                                      957 => 
                                      array (
                                        'key' => 'ULTRABRAID',
                                        'value' => 2516,
                                      ),
                                      958 => 
                                      array (
                                        'key' => 'ULTRAFLEX',
                                        'value' => 2517,
                                      ),
                                      959 => 
                                      array (
                                        'key' => 'ULTRAMAR',
                                        'value' => 2518,
                                      ),
                                      960 => 
                                      array (
                                        'key' => 'UNDERHILL',
                                        'value' => 2519,
                                      ),
                                      961 => 
                                      array (
                                        'key' => 'UNISOURCE',
                                        'value' => 2520,
                                      ),
                                      962 => 
                                      array (
                                        'key' => 'UNITRIX 60',
                                        'value' => 2521,
                                      ),
                                      963 => 
                                      array (
                                        'key' => 'UNITRIX 80',
                                        'value' => 2522,
                                      ),
                                      964 => 
                                      array (
                                        'key' => 'UNPRINTED SPRAY SALVAGE',
                                        'value' => 2523,
                                      ),
                                      965 => 
                                      array (
                                        'key' => 'V-50 S&D',
                                        'value' => 2524,
                                      ),
                                      966 => 
                                      array (
                                        'key' => 'VACUUM',
                                        'value' => 2525,
                                      ),
                                      967 => 
                                      array (
                                        'key' => 'VAPOR RECOVERY',
                                        'value' => 2526,
                                      ),
                                      968 => 
                                      array (
                                        'key' => 'VAPOR RECOVERY DOCK',
                                        'value' => 2527,
                                      ),
                                      969 => 
                                      array (
                                        'key' => 'Variable Speed',
                                        'value' => 2756,
                                      ),
                                      970 => 
                                      array (
                                        'key' => 'VARIFLEX',
                                        'value' => 2528,
                                      ),
                                      971 => 
                                      array (
                                        'key' => 'Varispeed Advance',
                                        'value' => 2757,
                                      ),
                                      972 => 
                                      array (
                                        'key' => 'VELOCITY BANDING COIL',
                                        'value' => 2529,
                                      ),
                                      973 => 
                                      array (
                                        'key' => 'VELOCITY BEVERAGE TRANSFER',
                                        'value' => 2530,
                                      ),
                                      974 => 
                                      array (
                                        'key' => 'VELOCITY PETROLEUM TRANSFER',
                                        'value' => 2531,
                                      ),
                                      975 => 
                                      array (
                                        'key' => 'VELOCITY WATER TRANSFER',
                                        'value' => 2532,
                                      ),
                                      976 => 
                                      array (
                                        'key' => 'VERSACHEM',
                                        'value' => 2533,
                                      ),
                                      977 => 
                                      array (
                                        'key' => 'VERSACRETE',
                                        'value' => 2534,
                                      ),
                                      978 => 
                                      array (
                                        'key' => 'VERSAFUEL EN1765 S15',
                                        'value' => 2535,
                                      ),
                                      979 => 
                                      array (
                                        'key' => 'VERSAFUEL FLEX',
                                        'value' => 2536,
                                      ),
                                      980 => 
                                      array (
                                        'key' => 'VERSIFLO DISCHARGE',
                                        'value' => 2537,
                                      ),
                                      981 => 
                                      array (
                                        'key' => 'VERSIFLO S&D',
                                        'value' => 2538,
                                      ),
                                      982 => 
                                      array (
                                        'key' => 'VICTOR',
                                        'value' => 2539,
                                      ),
                                      983 => 
                                      array (
                                        'key' => 'VINTNER',
                                        'value' => 2540,
                                      ),
                                      984 => 
                                      array (
                                        'key' => 'VINTNER MICROBAN',
                                        'value' => 2541,
                                      ),
                                      985 => 
                                      array (
                                        'key' => 'VINTNER RESERVE',
                                        'value' => 2542,
                                      ),
                                      986 => 
                                      array (
                                        'key' => 'VIPER',
                                        'value' => 2543,
                                      ),
                                      987 => 
                                      array (
                                        'key' => 'WAB SLURRY',
                                        'value' => 2544,
                                      ),
                                      988 => 
                                      array (
                                        'key' => 'WASHDOWN',
                                        'value' => 2545,
                                      ),
                                      989 => 
                                      array (
                                        'key' => 'WASTE MATE',
                                        'value' => 2546,
                                      ),
                                      990 => 
                                      array (
                                        'key' => 'WATER & AIR HD',
                                        'value' => 2547,
                                      ),
                                      991 => 
                                      array (
                                        'key' => 'WATER DISCHARGE',
                                        'value' => 2548,
                                      ),
                                      992 => 
                                      array (
                                        'key' => 'WATER DISCHARGE HD',
                                        'value' => 2549,
                                      ),
                                      993 => 
                                      array (
                                        'key' => 'WATER HD',
                                        'value' => 2550,
                                      ),
                                      994 => 
                                      array (
                                        'key' => 'WATER JETTING 1000',
                                        'value' => 2551,
                                      ),
                                      995 => 
                                      array (
                                        'key' => 'WATER JETTING 500',
                                        'value' => 2552,
                                      ),
                                      996 => 
                                      array (
                                        'key' => 'WATER REHAB',
                                        'value' => 2553,
                                      ),
                                      997 => 
                                      array (
                                        'key' => 'WATER SUCTION & DISCHARGE',
                                        'value' => 2554,
                                      ),
                                      998 => 
                                      array (
                                        'key' => 'Wedge TLP',
                                        'value' => 2758,
                                      ),
                                      999 => 
                                      array (
                                        'key' => 'WESTERN',
                                        'value' => 2555,
                                      ),
                                      1000 => 
                                      array (
                                        'key' => 'WHALE OIL',
                                        'value' => 2556,
                                      ),
                                      1001 => 
                                      array (
                                        'key' => 'WHALE WATER',
                                        'value' => 2557,
                                      ),
                                      1002 => 
                                      array (
                                        'key' => 'WHIPEND BLAST',
                                        'value' => 2558,
                                      ),
                                      1003 => 
                                      array (
                                        'key' => 'WHITE FLEXTRA',
                                        'value' => 2559,
                                      ),
                                      1004 => 
                                      array (
                                        'key' => 'WHITE FLEXWING',
                                        'value' => 2560,
                                      ),
                                      1005 => 
                                      array (
                                        'key' => 'WHITEWATER',
                                        'value' => 2561,
                                      ),
                                      1006 => 
                                      array (
                                        'key' => 'WINGCRAFT',
                                        'value' => 2562,
                                      ),
                                      1007 => 
                                      array (
                                        'key' => 'WIRE INSERTED RADIATOR HOSE',
                                        'value' => 2563,
                                      ),
                                      1008 => 
                                      array (
                                        'key' => 'WOODMI SAWDUST',
                                        'value' => 2564,
                                      ),
                                      1009 => 
                                      array (
                                        'key' => 'X-LIFE XCP3',
                                        'value' => 2566,
                                      ),
                                      1010 => 
                                      array (
                                        'key' => 'X-LIFE XCP3S',
                                        'value' => 2567,
                                      ),
                                      1011 => 
                                      array (
                                        'key' => 'X-LIFE XCP4',
                                        'value' => 2568,
                                      ),
                                      1012 => 
                                      array (
                                        'key' => 'X-LIFE XCP4S',
                                        'value' => 2569,
                                      ),
                                      1013 => 
                                      array (
                                        'key' => 'X-LIFE XCP5S',
                                        'value' => 2570,
                                      ),
                                      1014 => 
                                      array (
                                        'key' => 'X-LIFE XCP6S',
                                        'value' => 2571,
                                      ),
                                      1015 => 
                                      array (
                                        'key' => 'X-LIFE XR16SC',
                                        'value' => 2572,
                                      ),
                                      1016 => 
                                      array (
                                        'key' => 'XF BLAST',
                                        'value' => 2565,
                                      ),
                                      1017 => 
                                      array (
                                        'key' => 'XLPE CHEMICAL TRANSFER',
                                        'value' => 2573,
                                      ),
                                      1018 => 
                                      array (
                                        'key' => 'XPOWER',
                                        'value' => 2574,
                                      ),
                                      1019 => 
                                      array (
                                        'key' => 'YARDMASTER GARDEN HOSE',
                                        'value' => 2575,
                                      ),
                                      1020 => 
                                      array (
                                        'key' => 'YELLOW FLEXWING',
                                        'value' => 2576,
                                      ),
                                      1021 => 
                                      array (
                                        'key' => 'YUKON',
                                        'value' => 2577,
                                      ),
                                      1022 => 
                                      array (
                                        'key' => 'YUKON SPIRAFLEX',
                                        'value' => 2578,
                                      ),
                                      1023 => 
                                      array (
                                        'key' => 'ZZH561K-AA2',
                                        'value' => 2579,
                                      ),
                                      1024 => 
                                      array (
                                        'key' => 'ZZH561K-BA2',
                                        'value' => 2580,
                                      ),
                                      1025 => 
                                      array (
                                        'key' => 'ZZH601 3-2',
                                        'value' => 2581,
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
                                  7 => 
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
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'text',
                                     'columnType' => 'text',
                                     'phpdocType' => 'array',
                                     'dynamicOptions' => false,
                                     'name' => 'reinforcement',
                                     'title' => 'Reinforcement',
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
                                  4 => 
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
                                     'name' => 'VirtualCatalogHoseTemperatureRangeFAndC',
                                     'title' => 'Virtual Catalog Temperature Range (°F & C°)',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Catalog Assets',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Catalog Assets',
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
                         'name' => 'LeftPrintCatalogImage',
                         'title' => 'Left Print Catalog Image',
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
                         'name' => 'RightPrintCatalogImage',
                         'title' => 'Right Print Catalog Image',
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
             'name' => 'Catalog Attributes',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Catalog Attributes',
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
                 'width' => NULL,
                 'defaultValue' => NULL,
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'regex' => '',
                 'unique' => false,
                 'showCharCount' => false,
                 'name' => 'CatalogGrouping',
                 'title' => 'Catalog Grouping',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => NULL,
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
             'icon' => '',
          )),
          7 => 
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
