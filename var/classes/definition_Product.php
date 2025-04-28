<?php

/**
 * Inheritance: yes
 * Variants: no
 *
 * Fields Summary:
 * - brandName [select]
 * - reinforcement [multiselect]
 * - VirtualCatalogReinforcement [wysiwyg]
 * - brandConstruction [select]
 * - searchKeywords [input]
 * - BrandingLayline [input]
 * - Base [objectbricks]
 * - localizedfields [localizedfields]
 * -- FeaturesBenefitsBulletPoint [multiselect]
 * -- legalText [input]
 * -- BrandShortText1 [input]
 * -- BrandShortText2 [input]
 * -- BrandShortText3 [input]
 * -- BrandShortText4 [input]
 * -- BrandShortText5 [input]
 * -- shortDescription [wysiwyg]
 * -- longDescription [wysiwyg]
 * -- webDiscription [textarea]
 * -- productShortDescription [textarea]
 * -- amazonTitle [input]
 * -- sapDescription [textarea]
 * -- CompletenessPercentage [input]
 * -- EmptyFields [textarea]
 * - minimumTemperatureF [numeric]
 * - maximumTemperatureF [numeric]
 * - rangeTemperatureF [input]
 * - rangeTemperatureC [input]
 * - temperatureRangeApplication [input]
 * - temperatureRangeApplication1 [input]
 * - temperatureRangeApplication2 [input]
 * - temperatureRangeApplication3 [input]
 * - temperatureRangeApplication4 [input]
 * - temperatureRangeApplication5 [input]
 * - minimumTemperatureC [numeric]
 * - maximumTemperatureC [numeric]
 * - temperatureRangeFAndC [input]
 * - VirtualCatalogHoseTemperatureRangeFAndC [wysiwyg]
 * - temperatureRangeApplicationFAndC1 [input]
 * - temperatureRangeApplicationFAndC2 [input]
 * - temperatureRangeApplicationFAndC3 [input]
 * - temperatureRangeApplicationFAndC4 [input]
 * - temperatureRangeApplicationFAndC5 [input]
 * - siopFullCode [input]
 * - SIOPLevel1 [manyToManyObjectRelation]
 * - SIOPLevel2 [manyToManyObjectRelation]
 * - SIOPLevel3 [manyToManyObjectRelation]
 * - SIOPLevel4 [manyToManyObjectRelation]
 * - SIOPLevel5 [manyToManyObjectRelation]
 * - SIOPLevel6 [manyToManyObjectRelation]
 * - category [manyToManyObjectRelation]
 * - subCategory [manyToManyObjectRelation]
 * - fittingCategory [manyToManyObjectRelation]
 * - fittingSubCategory [manyToManyObjectRelation]
 * - selectBrandName [select]
 * - sapRange [select]
 * - Columns [textarea]
 * - Skeleton [objectbricks]
 * - B2CCategory [manyToManyObjectRelation]
 * - printedCatalogFlag [booleanSelect]
 * - B2CStoreFlag [booleanSelect]
 * - virtualCatalogReadyToGo [booleanSelect]
 * - virtualCatalogFlag [booleanSelect]
 * - newItemFlagForCatalog [booleanSelect]
 * - Fert [objectbricks]
 * - articleNumber [input]
 * - eanUpc [input]
 * - materialGroup [manyToOneRelation]
 * - baseUOM [input]
 * - grossWeight [numeric]
 * - netWeight [numeric]
 * - weightUnit [select]
 * - industryStandard [input]
 * - stccCode [input]
 * - succesorFlag [booleanSelect]
 * - deletedFlagAtClientLevel [booleanSelect]
 * - BusinessUnit [select]
 * - oldMaterialCode [input]
 * - manufacturer [input]
 * - manufacturerPartNumber [input]
 * - returnFlag [booleanSelect]
 * - rebateFlag [booleanSelect]
 * - OutsidePurchaseFlag [checkbox]
 * - externalID [input]
 * - weightg [numeric]
 * - weightKg [numeric]
 * - WeightLbsPerFTUOM [input]
 * - ProductType [select]
 * - packageLengthIN [numeric]
 * - packageWidthIN [numeric]
 * - packageWeightLBS [numeric]
 * - packageHeightIN [numeric]
 * - caseLengthIN [numeric]
 * - caseHeightIN [numeric]
 * - caseWidthIN [numeric]
 * - caseWeightLBS [numeric]
 * - palletLengthIN [numeric]
 * - palletHeightIN [numeric]
 * - numberOfItems [numeric]
 * - casePackQuantity [numeric]
 * - numberOfCoils [numeric]
 * - tieBundles [numeric]
 * - bundlesOfQuantity [numeric]
 * - palletWeightLBS [numeric]
 * - palletWidthIN [numeric]
 * - shelfLife [input]
 * - ConflictMinerals [multiselect]
 * - substitutePartNumber [input]
 * - alternativeUnitOfMeasureForStockkeepingUnit [input]
 * - denominatorForConversionToBaseUnitsOfMeasure [input]
 * - numeratorForConversionToBaseUnitsOfMeasure [textarea]
 * - UnitsInPackage [input]
 * - SalesOrgData [reverseObjectRelation]
 * - Plants [reverseObjectRelation]
 * - rohs [select]
 * - reach [select]
 * - proposition65WarningAttributesRequired [booleanSelect]
 * - prop65Message [textarea]
 * - warningIcon [image]
 * - californiaProposition65ChemicalName1 [select]
 * - californiaProposition65ChemicalName2 [select]
 * - californiaProposition65ChemicalName3 [select]
 * - nitrosamines [input]
 * - mainImage [image]
 * - frontView [image]
 * - sideView [image]
 * - cutView [image]
 * - epixImage [image]
 * - Images360 [imageGallery]
 * - altImage1 [image]
 * - altImage2 [image]
 * - altImage3 [image]
 * - altImage4 [image]
 * - altImage5 [image]
 * - altImage6 [image]
 * - altImage7 [image]
 * - altImage8 [image]
 * - certificationImage [image]
 * - video1 [video]
 * - video2 [video]
 * - video3 [video]
 * - Document [advancedManyToManyRelation]
 * - BrandingLaylineAssets [manyToManyRelation]
 * - LeftPrintCatalogImage [image]
 * - RightPrintCatalogImage [image]
 * - DrawingPictureForCatalog [image]
 * - ProfileDimensionImage [image]
 * - beltIdentificationImage [image]
 * - profileDimensionPtsBelts [image]
 * - priceData [table]
 * - CatalogGrouping [input]
 * - FittingTableName [select]
 * - CatalogSortTable [numeric]
 */

return \Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => '1',
   'name' => 'Product',
   'title' => '',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1744699842,
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
      \Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
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
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Base',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Brand Data',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
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
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'PIM Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Enriched In PIM',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'text',
                         'html' => ' Enriched In PIM',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Features and Marketing Data',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
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
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                     'name' => 'brandName',
                                     'title' => 'Brand Name',
                                     'tooltip' => '
',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                     'width' => 300,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                     'optionsProviderData' => 'Brand|Name',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                     'name' => 'reinforcement',
                                     'title' => 'Reinforcement',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'maxItems' => 1,
                                     'renderType' => 'tags',
                                     'dynamicOptions' => false,
                                     'defaultValue' => 
                                    array (
                                      0 => '1',
                                    ),
                                     'height' => '',
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                                     'optionsProviderData' => 'ProductClass',
                                  )),
                                  2 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                     'name' => 'VirtualCatalogReinforcement',
                                     'title' => 'Virtual Catalog Reinforcement',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:215px;',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'toolbarConfig' => '',
                                     'excludeFromSearchIndex' => false,
                                     'maxCharacters' => 0,
                                     'height' => 150,
                                     'width' => 295,
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 200,
                                 'labelAlign' => 'left',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                     'name' => 'brandConstruction',
                                     'title' => 'Brand Construction',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => 300,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                     'optionsProviderData' => 'Brand|Name',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'searchKeywords',
                                     'title' => 'Search Keywords',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'BrandingLayline',
                                     'title' => 'Catalog Layline',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 200,
                                 'labelAlign' => 'left',
                              )),
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'labelWidth' => 100,
                             'labelAlign' => 'left',
                          )),
                          1 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                             'name' => 'Base',
                             'title' => 'Base',
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
                             'allowedTypes' => 
                            array (
                              0 => 'HoseBase',
                              1 => 'PTGBase',
                            ),
                             'maxItems' => NULL,
                             'border' => false,
                          )),
                          2 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                             'name' => 'localizedfields',
                             'title' => '',
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
                             'visibleGridView' => true,
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'children' => 
                            array (
                              0 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                     'name' => 'Field Container',
                                     'type' => NULL,
                                     'region' => NULL,
                                     'title' => '',
                                     'width' => 600,
                                     'height' => 0,
                                     'collapsible' => false,
                                     'collapsed' => false,
                                     'bodyStyle' => '',
                                     'datatype' => 'layout',
                                     'children' => 
                                    array (
                                      0 => 
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                         'name' => 'FeaturesBenefitsBulletPoint',
                                         'title' => 'Features & Benefits Bullet Points',
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
                                         'dynamicOptions' => false,
                                         'defaultValue' => 
                                        array (
                                          0 => '1',
                                        ),
                                         'height' => 270,
                                         'width' => 300,
                                         'defaultValueGenerator' => '',
                                         'optionsProviderType' => NULL,
                                         'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                         'optionsProviderData' => 'Features|Name',
                                      )),
                                      1 => 
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'name' => 'legalText',
                                         'title' => 'Legal Text',
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
                                         'width' => 300,
                                         'defaultValueGenerator' => '',
                                      )),
                                      2 => 
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'name' => 'BrandShortText1',
                                         'title' => 'Brand Short Text 1',
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
                                         'width' => 300,
                                         'defaultValueGenerator' => '',
                                      )),
                                      3 => 
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'name' => 'BrandShortText2',
                                         'title' => 'Brand Short Text 2',
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
                                         'width' => 300,
                                         'defaultValueGenerator' => '',
                                      )),
                                      4 => 
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'name' => 'BrandShortText3',
                                         'title' => 'Brand Short Text 3',
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
                                         'width' => 300,
                                         'defaultValueGenerator' => '',
                                      )),
                                      5 => 
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'name' => 'BrandShortText4',
                                         'title' => 'Brand Short Text 4',
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
                                         'width' => 300,
                                         'defaultValueGenerator' => '',
                                      )),
                                      6 => 
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'name' => 'BrandShortText5',
                                         'title' => 'Brand Short Text 5',
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
                                         'width' => 300,
                                         'defaultValueGenerator' => '',
                                      )),
                                    ),
                                     'locked' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'fieldtype' => 'fieldcontainer',
                                     'layout' => 'vbox',
                                     'fieldLabel' => '',
                                     'labelWidth' => 220,
                                     'labelAlign' => 'left',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                     'name' => 'Field Container',
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
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                         'name' => 'shortDescription',
                                         'title' => 'Product Brand Description Short',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-left:20px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'toolbarConfig' => '',
                                         'excludeFromSearchIndex' => false,
                                         'maxCharacters' => 0,
                                         'height' => 210,
                                         'width' => 400,
                                      )),
                                      1 => 
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                         'name' => 'longDescription',
                                         'title' => 'Product Brand Description Long',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-left:20px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'toolbarConfig' => '',
                                         'excludeFromSearchIndex' => false,
                                         'maxCharacters' => 0,
                                         'height' => 300,
                                         'width' => 400,
                                      )),
                                    ),
                                     'locked' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'fieldtype' => 'fieldcontainer',
                                     'layout' => 'vbox',
                                     'fieldLabel' => '',
                                     'labelWidth' => 220,
                                     'labelAlign' => 'left',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'hbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 100,
                                 'labelAlign' => 'left',
                              )),
                            ),
                             'region' => NULL,
                             'layout' => NULL,
                             'maxTabs' => 35,
                             'border' => false,
                             'provideSplitView' => false,
                             'tabPosition' => 'top',
                             'hideLabelsWhenTabsReached' => NULL,
                             'referencedFields' => 
                            array (
                              0 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                                 'name' => 'localizedfields',
                                 'title' => '',
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
                                 'visibleGridView' => true,
                                 'visibleSearch' => true,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'children' => 
                                array (
                                  0 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                     'name' => 'Field Container',
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
                                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                         'name' => 'Field Container',
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
                                          \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                             'name' => 'webDiscription',
                                             'title' => 'Product Long Description',
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
                                             'maxLength' => NULL,
                                             'showCharCount' => false,
                                             'excludeFromSearchIndex' => false,
                                             'height' => 100,
                                             'width' => 200,
                                          )),
                                          1 => 
                                          \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                             'name' => 'productShortDescription',
                                             'title' => 'Product Short Description',
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
                                             'maxLength' => NULL,
                                             'showCharCount' => false,
                                             'excludeFromSearchIndex' => false,
                                             'height' => 100,
                                             'width' => 200,
                                          )),
                                        ),
                                         'locked' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'fieldtype' => 'fieldcontainer',
                                         'layout' => 'vbox',
                                         'fieldLabel' => '',
                                         'labelWidth' => 150,
                                         'labelAlign' => 'left',
                                      )),
                                      1 => 
                                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                         'name' => 'Field Container',
                                         'type' => NULL,
                                         'region' => NULL,
                                         'title' => '',
                                         'width' => 0,
                                         'height' => 0,
                                         'collapsible' => false,
                                         'collapsed' => false,
                                         'bodyStyle' => 'margin-left: 20px;',
                                         'datatype' => 'layout',
                                         'children' => 
                                        array (
                                          0 => 
                                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                             'name' => 'amazonTitle',
                                             'title' => 'Amazon Title',
                                             'tooltip' => '',
                                             'mandatory' => false,
                                             'noteditable' => false,
                                             'index' => false,
                                             'locked' => false,
                                             'style' => 'margin-left: 20px;',
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
                                             'width' => 220,
                                             'defaultValueGenerator' => '',
                                          )),
                                        ),
                                         'locked' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'fieldtype' => 'fieldcontainer',
                                         'layout' => 'vbox',
                                         'fieldLabel' => '',
                                         'labelWidth' => 150,
                                         'labelAlign' => 'left',
                                      )),
                                    ),
                                     'locked' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'fieldtype' => 'fieldcontainer',
                                     'layout' => 'hbox',
                                     'fieldLabel' => '',
                                     'labelWidth' => 150,
                                     'labelAlign' => 'left',
                                  )),
                                ),
                                 'region' => NULL,
                                 'layout' => NULL,
                                 'maxTabs' => 30,
                                 'border' => false,
                                 'provideSplitView' => false,
                                 'tabPosition' => 'top',
                                 'hideLabelsWhenTabsReached' => NULL,
                                 'referencedFields' => 
                                array (
                                ),
                                 'permissionView' => NULL,
                                 'permissionEdit' => NULL,
                                 'labelWidth' => 0,
                                 'labelAlign' => 'left',
                                 'width' => NULL,
                                 'height' => NULL,
                                 'fieldDefinitionsCache' => NULL,
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                                 'name' => 'localizedfields',
                                 'title' => '',
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
                                 'visibleGridView' => true,
                                 'visibleSearch' => true,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'children' => 
                                array (
                                  0 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'sapDescription',
                                     'title' => 'SAP Description',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:30px;',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'height' => 100,
                                     'width' => 200,
                                  )),
                                ),
                                 'region' => NULL,
                                 'layout' => NULL,
                                 'maxTabs' => 35,
                                 'border' => false,
                                 'provideSplitView' => false,
                                 'tabPosition' => 'top',
                                 'hideLabelsWhenTabsReached' => NULL,
                                 'referencedFields' => 
                                array (
                                ),
                                 'permissionView' => NULL,
                                 'permissionEdit' => NULL,
                                 'labelWidth' => 250,
                                 'labelAlign' => 'left',
                                 'width' => NULL,
                                 'height' => NULL,
                                 'fieldDefinitionsCache' => NULL,
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                                 'name' => 'localizedfields',
                                 'title' => '',
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
                                 'visibleGridView' => true,
                                 'visibleSearch' => true,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'children' => 
                                array (
                                  0 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'CompletenessPercentage',
                                     'title' => 'Completeness Percentage',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'padding: 10px; background-color: #d9edf7; border-color: #bce8f1 !important; color: #31708f;',
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
                                     'width' => 600,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'EmptyFields',
                                     'title' => 'Empty Fields',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'height' => 500,
                                     'width' => 600,
                                  )),
                                ),
                                 'region' => NULL,
                                 'layout' => NULL,
                                 'maxTabs' => 35,
                                 'border' => false,
                                 'provideSplitView' => false,
                                 'tabPosition' => 'top',
                                 'hideLabelsWhenTabsReached' => NULL,
                                 'referencedFields' => 
                                array (
                                ),
                                 'permissionView' => NULL,
                                 'permissionEdit' => NULL,
                                 'labelWidth' => 200,
                                 'labelAlign' => 'left',
                                 'width' => NULL,
                                 'height' => NULL,
                                 'fieldDefinitionsCache' => NULL,
                              )),
                            ),
                             'permissionView' => NULL,
                             'permissionEdit' => NULL,
                             'labelWidth' => 100,
                             'labelAlign' => 'left',
                             'width' => NULL,
                             'height' => NULL,
                             'fieldDefinitionsCache' => NULL,
                          )),
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 220,
                         'labelAlign' => 'left',
                      )),
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Temperatures',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Temperatures',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => true,
                         'collapsed' => true,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
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
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'minimumTemperatureF',
                                     'title' => 'Min Temp °F',
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
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => 3,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'maximumTemperatureF',
                                     'title' => 'Max temp °F',
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
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => 3,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'rangeTemperatureF',
                                     'title' => 'Temperature Range (°F)',
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
                                     'columnLength' => 190,
                                     'regex' => '',
                                     'regexFlags' => 
                                    array (
                                    ),
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'rangeTemperatureC',
                                     'title' => 'Temperature Range (°C)',
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
                                     'columnLength' => 190,
                                     'regex' => '',
                                     'regexFlags' => 
                                    array (
                                    ),
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeApplication',
                                     'title' => 'Temperature Range Application',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeApplication1',
                                     'title' => 'Temperature Range Applications 1',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeApplication2',
                                     'title' => 'Temperature Range Applications 2',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  7 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeApplication3',
                                     'title' => 'Temperature Range Applications 3',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  8 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeApplication4',
                                     'title' => 'Temperature Range Applications 4',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  9 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeApplication5',
                                     'title' => 'Temperature Range Applications 5',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 230,
                                 'labelAlign' => 'left',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'minimumTemperatureC',
                                     'title' => 'Min Temp °C',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'maximumTemperatureC',
                                     'title' => 'Max temp °C',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeFAndC',
                                     'title' => 'Temperature Range (°F & C°)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                     'name' => 'VirtualCatalogHoseTemperatureRangeFAndC',
                                     'title' => 'Virtual Catalog Temperature Range (°F & C°)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 245px;',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => true,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'toolbarConfig' => '',
                                     'excludeFromSearchIndex' => false,
                                     'maxCharacters' => 0,
                                     'height' => 150,
                                     'width' => 295,
                                  )),
                                  4 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeApplicationFAndC1',
                                     'title' => 'Temperature Range Application (Range °F to °C) 1',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeApplicationFAndC2',
                                     'title' => 'Temperature Range Application (Range °F to °C) 2',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeApplicationFAndC3',
                                     'title' => 'Temperature Range Application (Range °F to °C) 3',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  7 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeApplicationFAndC4',
                                     'title' => 'Temperature Range Application (Range °F to °C) 4',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  8 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeApplicationFAndC5',
                                     'title' => 'Temperature Range Application (Range °F to °C) 5',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 250,
                                 'labelAlign' => 'left',
                              )),
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'labelWidth' => 100,
                             'labelAlign' => 'left',
                          )),
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'fieldset',
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/overlay-edit.svg',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'SIOP Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'SIOP Data',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'text',
                         'html' => 'Imported From SAP',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'siopFullCode',
                         'title' => 'SIOP Full Code',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => true,
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
                         'width' => 220,
                         'defaultValueGenerator' => '',
                      )),
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'SIOPLevel1',
                         'title' => 'SIOP Level 1',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
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
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'code,fullCode,description',
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
                      3 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'SIOPLevel2',
                         'title' => 'SIOP Level 2',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
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
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'code,fullCode,description',
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
                      4 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'SIOPLevel3',
                         'title' => 'SIOP Level 3',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
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
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'code,fullCode,description',
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
                      5 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'SIOPLevel4',
                         'title' => 'SIOP Level 4',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
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
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'code,fullCode,description',
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
                      6 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'SIOPLevel5',
                         'title' => 'SIOP Level 5',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
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
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'code,fullCode,description',
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
                      7 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'SIOPLevel6',
                         'title' => 'SIOP Level 6',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
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
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'code,fullCode,description',
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
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'panel',
                     'layout' => NULL,
                     'border' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/genealogy.svg',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  2 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Category Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Category Data',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'category',
                         'title' => 'Category',
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
                          0 => 
                          array (
                            'classes' => 'Category',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'Name,ShortDescription',
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
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'subCategory',
                         'title' => 'Sub Category',
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
                          0 => 
                          array (
                            'classes' => 'SubCategory',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'Name,ShortDescription',
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
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'fittingCategory',
                         'title' => 'Fitting Category',
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
                          0 => 
                          array (
                            'classes' => 'FittingCategory',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'Name,ShortDescription',
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
                      3 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'fittingSubCategory',
                         'title' => 'Fitting Sub Category',
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
                          0 => 
                          array (
                            'classes' => 'FittingSubCategory',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'Name,ShortDescription',
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
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'panel',
                     'layout' => NULL,
                     'border' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/flow_chart.svg',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  3 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Spec Sheet Export',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Spec Sheet Export',
                     'width' => '',
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'selectBrandName',
                         'title' => 'Select Brand Name',
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
                        ),
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => 300,
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'sapRange',
                         'title' => 'Sap Range',
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
                            'key' => 'PrintedCatalog',
                            'value' => 'PrintedCatalog',
                          ),
                          1 => 
                          array (
                            'key' => 'CustomSelection',
                            'value' => 'CustomSelection',
                          ),
                        ),
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => 300,
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Headers',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Print Columns',
                         'width' => '',
                         'height' => '',
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
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'labelAlign' => 'left',
                      )),
                      3 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                         'name' => 'Columns',
                         'title' => 'Columns',
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
                         'maxLength' => NULL,
                         'showCharCount' => false,
                         'excludeFromSearchIndex' => false,
                         'height' => '',
                         'width' => '',
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'panel',
                     'layout' => NULL,
                     'border' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/genealogy.svg',
                     'labelWidth' => 100,
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
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_yellow.png',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          1 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Skeleton',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Skeleton Data',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                 'name' => 'Skeleton',
                 'title' => 'Skeleton',
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
                 'allowedTypes' => 
                array (
                  0 => 'HoseSkeleton',
                  1 => 'PTGSkeleton',
                ),
                 'maxItems' => NULL,
                 'border' => false,
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_blue.png',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          2 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Fert',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Finished Goods Data',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
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
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Finished Good Attributes',
                     'width' => '',
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'B2CCategory',
                         'title' => 'B2C Category',
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
                          0 => 
                          array (
                            'classes' => 'B2CCategory',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => 1,
                         'visibleFields' => 'id,displayName',
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
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Catalog Flags',
                         'width' => '',
                         'height' => '',
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
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
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'printedCatalogFlag',
                                     'title' => 'Printed Catalog Flag',
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
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'B2CStoreFlag',
                                     'title' => 'B2C Store Flag',
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
                                  )),
                                  2 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'virtualCatalogReadyToGo',
                                     'title' => 'Virtual Catalog Ready To Go',
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
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 150,
                                 'labelAlign' => 'left',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'virtualCatalogFlag',
                                     'title' => 'Virtual Catalog Flag',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:140px;',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
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
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'newItemFlagForCatalog',
                                     'title' => 'New Item Flag for Catalog',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:140px;',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
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
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 150,
                                 'labelAlign' => 'left',
                              )),
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'labelWidth' => 150,
                             'labelAlign' => 'left',
                          )),
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 150,
                         'labelAlign' => 'left',
                      )),
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Web',
                         'width' => '',
                         'height' => '',
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                             'name' => 'localizedfields',
                             'title' => '',
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
                             'visibleGridView' => true,
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'children' => 
                            array (
                              0 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                     'name' => 'Field Container',
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
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                         'name' => 'webDiscription',
                                         'title' => 'Product Long Description',
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
                                         'maxLength' => NULL,
                                         'showCharCount' => false,
                                         'excludeFromSearchIndex' => false,
                                         'height' => 100,
                                         'width' => 200,
                                      )),
                                      1 => 
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                         'name' => 'productShortDescription',
                                         'title' => 'Product Short Description',
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
                                         'maxLength' => NULL,
                                         'showCharCount' => false,
                                         'excludeFromSearchIndex' => false,
                                         'height' => 100,
                                         'width' => 200,
                                      )),
                                    ),
                                     'locked' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'fieldtype' => 'fieldcontainer',
                                     'layout' => 'vbox',
                                     'fieldLabel' => '',
                                     'labelWidth' => 150,
                                     'labelAlign' => 'left',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                     'name' => 'Field Container',
                                     'type' => NULL,
                                     'region' => NULL,
                                     'title' => '',
                                     'width' => 0,
                                     'height' => 0,
                                     'collapsible' => false,
                                     'collapsed' => false,
                                     'bodyStyle' => 'margin-left: 20px;',
                                     'datatype' => 'layout',
                                     'children' => 
                                    array (
                                      0 => 
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'name' => 'amazonTitle',
                                         'title' => 'Amazon Title',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-left: 20px;',
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
                                         'width' => 220,
                                         'defaultValueGenerator' => '',
                                      )),
                                    ),
                                     'locked' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'fieldtype' => 'fieldcontainer',
                                     'layout' => 'vbox',
                                     'fieldLabel' => '',
                                     'labelWidth' => 150,
                                     'labelAlign' => 'left',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'hbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 150,
                                 'labelAlign' => 'left',
                              )),
                            ),
                             'region' => NULL,
                             'layout' => NULL,
                             'maxTabs' => 30,
                             'border' => false,
                             'provideSplitView' => false,
                             'tabPosition' => 'top',
                             'hideLabelsWhenTabsReached' => NULL,
                             'referencedFields' => 
                            array (
                            ),
                             'permissionView' => NULL,
                             'permissionEdit' => NULL,
                             'labelWidth' => 0,
                             'labelAlign' => 'left',
                             'width' => NULL,
                             'height' => NULL,
                             'fieldDefinitionsCache' => NULL,
                          )),
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 150,
                         'labelAlign' => 'left',
                      )),
                      3 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                         'name' => 'Fert',
                         'title' => 'Fert',
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
                         'maxItems' => NULL,
                         'border' => false,
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
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'SAP Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Imported From SAP',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'text',
                         'html' => 'Imported From SAP',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Global Data Points',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
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
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'articleNumber',
                                     'title' => 'SAP Code / Material Number',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => true,
                                     'locked' => false,
                                     'style' => '',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => true,
                                     'visibleSearch' => true,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'defaultValue' => NULL,
                                     'columnLength' => 255,
                                     'regex' => '',
                                     'regexFlags' => 
                                    array (
                                    ),
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'width' => 200,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'eanUpc',
                                     'title' => 'EAN / UPC',
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
                                     'columnLength' => 190,
                                     'regex' => '',
                                     'regexFlags' => 
                                    array (
                                    ),
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'width' => 200,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                     'name' => 'materialGroup',
                                     'title' => 'Material Group',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                      0 => 
                                      array (
                                        'classes' => 'MaterialGroup',
                                      ),
                                    ),
                                     'displayMode' => NULL,
                                     'pathFormatterClass' => '',
                                     'assetInlineDownloadAllowed' => false,
                                     'assetUploadPath' => '',
                                     'allowToClearRelation' => true,
                                     'objectsAllowed' => true,
                                     'assetsAllowed' => false,
                                     'assetTypes' => 
                                    array (
                                    ),
                                     'documentsAllowed' => false,
                                     'documentTypes' => 
                                    array (
                                    ),
                                     'width' => 200,
                                  )),
                                  3 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'baseUOM',
                                     'title' => 'Base UOM',
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
                                     'columnLength' => 190,
                                     'regex' => '',
                                     'regexFlags' => 
                                    array (
                                    ),
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'width' => 200,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'grossWeight',
                                     'title' => 'Gross Weight',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 200,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'netWeight',
                                     'title' => 'Net Weight',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 200,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'weightUnit',
                                     'title' => 'Weight Unit',
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
                                     'defaultValue' => '',
                                     'columnLength' => 190,
                                     'dynamicOptions' => false,
                                     'defaultValueGenerator' => '',
                                     'width' => 200,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                  )),
                                  7 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'industryStandard',
                                     'title' => 'Industry Standard #',
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
                                     'columnLength' => 190,
                                     'regex' => '',
                                     'regexFlags' => 
                                    array (
                                    ),
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'width' => 200,
                                     'defaultValueGenerator' => '',
                                  )),
                                  8 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'stccCode',
                                     'title' => 'STCC Code',
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
                                     'columnLength' => 190,
                                     'regex' => '',
                                     'regexFlags' => 
                                    array (
                                    ),
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'width' => 200,
                                     'defaultValueGenerator' => '',
                                  )),
                                  9 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'succesorFlag',
                                     'title' => 'Succesor / Supercession Flag',
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
                                  )),
                                  10 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'deletedFlagAtClientLevel',
                                     'title' => 'Deleted / Obsoleted Flag Client Level',
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
                                  )),
                                  11 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'BusinessUnit',
                                     'title' => 'Business Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => '',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => true,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
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
                                     'defaultValue' => 'IFS',
                                     'columnLength' => 190,
                                     'dynamicOptions' => false,
                                     'defaultValueGenerator' => '',
                                     'width' => 100,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 250,
                                 'labelAlign' => 'left',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
                                 'type' => NULL,
                                 'region' => NULL,
                                 'title' => '',
                                 'width' => '',
                                 'height' => '',
                                 'collapsible' => false,
                                 'collapsed' => false,
                                 'bodyStyle' => 'margin-left: 20px;',
                                 'datatype' => 'layout',
                                 'children' => 
                                array (
                                  0 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'oldMaterialCode',
                                     'title' => 'Old Material Code',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 40px;',
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
                                     'width' => 200,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'manufacturer',
                                     'title' => 'Manufacturer',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 40px;',
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
                                     'width' => 200,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'manufacturerPartNumber',
                                     'title' => 'Manufacturer Part Number',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 40px;',
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
                                     'width' => 200,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                                     'name' => 'localizedfields',
                                     'title' => '',
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
                                     'visibleGridView' => true,
                                     'visibleSearch' => true,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'children' => 
                                    array (
                                      0 => 
                                      \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                         'name' => 'sapDescription',
                                         'title' => 'SAP Description',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => true,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-left:30px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'maxLength' => NULL,
                                         'showCharCount' => false,
                                         'excludeFromSearchIndex' => false,
                                         'height' => 100,
                                         'width' => 200,
                                      )),
                                    ),
                                     'region' => NULL,
                                     'layout' => NULL,
                                     'maxTabs' => 35,
                                     'border' => false,
                                     'provideSplitView' => false,
                                     'tabPosition' => 'top',
                                     'hideLabelsWhenTabsReached' => NULL,
                                     'referencedFields' => 
                                    array (
                                    ),
                                     'permissionView' => NULL,
                                     'permissionEdit' => NULL,
                                     'labelWidth' => 250,
                                     'labelAlign' => 'left',
                                     'width' => NULL,
                                     'height' => NULL,
                                     'fieldDefinitionsCache' => NULL,
                                  )),
                                  4 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'returnFlag',
                                     'title' => 'Return Flag',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:40px;',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
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
                                  )),
                                  5 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'rebateFlag',
                                     'title' => 'Rebate Flag',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:40px;',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
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
                                  )),
                                  6 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                                     'name' => 'OutsidePurchaseFlag',
                                     'title' => 'Outside Purchase Indicator / Procurement Type',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:40px;',
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
                                     'defaultValueGenerator' => '',
                                  )),
                                  7 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'externalID',
                                     'title' => 'External ID',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:40px;',
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
                                     'columnLength' => 32,
                                     'regex' => '',
                                     'regexFlags' => 
                                    array (
                                    ),
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 250,
                                 'labelAlign' => 'left',
                              )),
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'labelWidth' => 100,
                             'labelAlign' => 'left',
                          )),
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'labelAlign' => 'left',
                      )),
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Calculated',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
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
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'weightg',
                                     'title' => 'Weight_ g/m',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'weightKg',
                                     'title' => 'Weight (kg/m)',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 200,
                                 'labelAlign' => 'left',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'WeightLbsPerFTUOM',
                                     'title' => 'Weight_Lbs per ft - UOM',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 45px;',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'ProductType',
                                     'title' => 'ProductType',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 45px;',
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
                                     'defaultValue' => '',
                                     'columnLength' => 190,
                                     'dynamicOptions' => false,
                                     'defaultValueGenerator' => '',
                                     'width' => 100,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 200,
                                 'labelAlign' => 'left',
                              )),
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'labelWidth' => 100,
                             'labelAlign' => 'left',
                          )),
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'fieldset',
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/overlay-download.svg',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  2 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Packaging Attributes',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Packaging Attributes',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Packaging Attributes',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
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
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'packageLengthIN',
                                     'title' => 'Package Length (in)',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'packageWidthIN',
                                     'title' => 'Package Width (in)',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'packageWeightLBS',
                                     'title' => 'Package Weight (lbs)',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'packageHeightIN',
                                     'title' => 'Package Height (in)',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'caseLengthIN',
                                     'title' => 'Case Length (in)',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'caseHeightIN',
                                     'title' => 'Case Height (in)',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'caseWidthIN',
                                     'title' => 'Case Width (in)',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  7 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'caseWeightLBS',
                                     'title' => 'Case Weight (lbs)',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  8 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'palletLengthIN',
                                     'title' => 'Pallet Length (in)',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  9 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'palletHeightIN',
                                     'title' => 'Pallet Height (in)',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 220,
                                 'labelAlign' => 'left',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'numberOfItems',
                                     'title' => 'Number of Items',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'casePackQuantity',
                                     'title' => 'Case Pack Quantity',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'numberOfCoils',
                                     'title' => 'Number of Coils',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'tieBundles',
                                     'title' => 'Tie Bundles ',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'bundlesOfQuantity',
                                     'title' => 'Bundles of Quantity',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'palletWeightLBS',
                                     'title' => 'Pallet Weight (lbs)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'palletWidthIN',
                                     'title' => 'Pallet Width (in)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 220,
                                 'labelAlign' => 'left',
                              )),
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'labelWidth' => 100,
                             'labelAlign' => 'left',
                          )),
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'labelAlign' => 'left',
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Additional Information',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Additional Information',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
                             'type' => NULL,
                             'region' => NULL,
                             'title' => 'ReadOnly In PIM',
                             'width' => 0,
                             'height' => 0,
                             'collapsible' => false,
                             'collapsed' => false,
                             'bodyStyle' => 'margin-left:10px;',
                             'datatype' => 'layout',
                             'children' => 
                            array (
                              0 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'shelfLife',
                                     'title' => 'Shelf Life',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                     'name' => 'ConflictMinerals',
                                     'title' => 'Conflict Minerals',
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
                                        'key' => 'Tantalum',
                                        'value' => 'Tantalum',
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Tin',
                                        'value' => 'Tin',
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'Gold',
                                        'value' => 'Gold',
                                      ),
                                      3 => 
                                      array (
                                        'key' => 'Tungsten',
                                        'value' => 'Tungsten',
                                      ),
                                    ),
                                     'maxItems' => NULL,
                                     'renderType' => 'tags',
                                     'dynamicOptions' => false,
                                     'defaultValue' => NULL,
                                     'height' => '',
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                  )),
                                  2 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'substitutePartNumber',
                                     'title' => ' Substitute Part Number',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'alternativeUnitOfMeasureForStockkeepingUnit',
                                     'title' => 'Alternative Unit of Measure for Stockkeeping Unit',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'denominatorForConversionToBaseUnitsOfMeasure',
                                     'title' => 'Denominator for conversion to base units of measure',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 220,
                                 'labelAlign' => 'left',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
                                 'type' => NULL,
                                 'region' => NULL,
                                 'title' => '',
                                 'width' => 0,
                                 'height' => 0,
                                 'collapsible' => false,
                                 'collapsed' => false,
                                 'bodyStyle' => 'margin-left: 20px;',
                                 'datatype' => 'layout',
                                 'children' => 
                                array (
                                  0 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'numeratorForConversionToBaseUnitsOfMeasure',
                                     'title' => 'Numerator for Conversion to Base Units of Measure',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'height' => 100,
                                     'width' => 220,
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'UnitsInPackage',
                                     'title' => 'Units in Package ',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 220,
                                 'labelAlign' => 'left',
                              )),
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'labelWidth' => 100,
                             'labelAlign' => 'left',
                          )),
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 220,
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
                     'icon' => '',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  3 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'PlantAndSalesData',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Plant & Sales Data',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'text',
                         'html' => 'Imported From SAP',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ReverseObjectRelation::__set_state(array(
                         'name' => 'SalesOrgData',
                         'title' => 'Sales Data',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
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
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => NULL,
                         'allowToCreateNewObject' => true,
                         'allowToClearRelation' => true,
                         'optimizedAdminLoading' => false,
                         'enableTextSelection' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'width' => '',
                         'height' => '',
                         'ownerClassName' => 'SalesMaterialMaster',
                         'ownerClassId' => NULL,
                         'ownerFieldName' => 'Material',
                         'lazyLoading' => true,
                      )),
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ReverseObjectRelation::__set_state(array(
                         'name' => 'Plants',
                         'title' => 'Plants Data',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
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
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => NULL,
                         'allowToCreateNewObject' => true,
                         'allowToClearRelation' => true,
                         'optimizedAdminLoading' => false,
                         'enableTextSelection' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'width' => '',
                         'height' => '',
                         'ownerClassName' => 'PlantMaterialMaster',
                         'ownerClassId' => NULL,
                         'ownerFieldName' => 'Material',
                         'lazyLoading' => true,
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'panel',
                     'layout' => NULL,
                     'border' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/candle_sticks.svg',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  4 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Chemical Items',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Chemical Items',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Chemical Items',
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
                             'name' => 'rohs',
                             'title' => 'Rohs',
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
                                'key' => 'Cadmium (Cd): < 100 ppm',
                                'value' => 'Cadmium (Cd): < 100 ppm',
                              ),
                              1 => 
                              array (
                                'key' => 'Lead (Pb): < 1000 ppm',
                                'value' => 'Lead (Pb): < 1000 ppm',
                              ),
                              2 => 
                              array (
                                'key' => 'Mercury (Hg): < 1000 ppm',
                                'value' => 'Mercury (Hg): < 1000 ppm',
                              ),
                              3 => 
                              array (
                                'key' => 'Hexavalent Chromium: (Cr VI) < 1000 ppm',
                                'value' => 'Hexavalent Chromium: (Cr VI) < 1000 ppm',
                              ),
                              4 => 
                              array (
                                'key' => 'Polybrominated Biphenyls (PBB): < 1000 ppm',
                                'value' => 'Polybrominated Biphenyls (PBB): < 1000 ppm',
                              ),
                              5 => 
                              array (
                                'key' => 'Polybrominated Diphenyl Ethers (PBDE): < 1000 ppm',
                                'value' => 'Polybrominated Diphenyl Ethers (PBDE): < 1000 ppm',
                              ),
                              6 => 
                              array (
                                'key' => 'Bis(2-Ethylhexyl) phthalate (DEHP): < 1000 ppm',
                                'value' => 'Bis(2-Ethylhexyl) phthalate (DEHP): < 1000 ppm',
                              ),
                              7 => 
                              array (
                                'key' => 'Benzyl butyl phthalate (BBP): < 1000 ppm',
                                'value' => 'Benzyl butyl phthalate (BBP): < 1000 ppm',
                              ),
                              8 => 
                              array (
                                'key' => 'Dibutyl phthalate (DBP): < 1000 ppm',
                                'value' => 'Dibutyl phthalate (DBP): < 1000 ppm',
                              ),
                              9 => 
                              array (
                                'key' => 'Diisobutyl phthalate (DIBP): < 1000 ppm',
                                'value' => 'Diisobutyl phthalate (DIBP): < 1000 ppm',
                              ),
                            ),
                             'defaultValue' => '',
                             'columnLength' => 850,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => 730,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => '',
                             'optionsProviderData' => '',
                          )),
                          1 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'reach',
                             'title' => 'Reach',
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
                                'key' => '1-methyl-2-pyrrolidone (NMP)',
                                'value' => '1-methyl-2-pyrrolidone -NMP-',
                              ),
                              1 => 
                              array (
                                'key' => '1,1-Dichloroethene',
                                'value' => '1-1-Dichloroethene',
                              ),
                              2 => 
                              array (
                                'key' => '1,1,1,2-Tetrachloroethane',
                                'value' => '1-1-1-2-Tetrachloroethane',
                              ),
                              3 => 
                              array (
                                'key' => '1,1,2-Trichloroethane',
                                'value' => '1-1-2-Trichloroethane',
                              ),
                              4 => 
                              array (
                                'key' => '1,1,2,2-Tetrachloroethane',
                                'value' => '1-1-2-2-Tetrachloroethane',
                              ),
                              5 => 
                              array (
                                'key' => '1,4-Dichlorobenzene',
                                'value' => '1-4-Dichlorobenzene',
                              ),
                              6 => 
                              array (
                                'key' => '2-(2-butoxyethoxy)ethanol (DEGBE)',
                                'value' => '2--2-butoxyethoxy-ethanol -DEGBE-',
                              ),
                              7 => 
                              array (
                                'key' => '2-(2-methoxyethoxy)ethanol (DEGME)',
                                'value' => '2--2-methoxyethoxy-ethanol -DEGME-',
                              ),
                              8 => 
                              array (
                                'key' => '2-naphthylamine and salts',
                                'value' => '2-naphthylamine and salts',
                              ),
                              9 => 
                              array (
                                'key' => '4-Aminobiphenyl xenylamine and salts',
                                'value' => '4-Aminobiphenyl xenylamine and salts',
                              ),
                              10 => 
                              array (
                                'key' => '4-Nitrobiphenyl',
                                'value' => '4-Nitrobiphenyl',
                              ),
                              11 => 
                              array (
                                'key' => 'Acrylamide',
                                'value' => 'Acrylamide',
                              ),
                              12 => 
                              array (
                                'key' => 'Ammonium and compounds: nitrates, polysulphides, sulphide, hydrogen sulphides, inorganic salts',
                                'value' => 'Ammonium and compounds- nitrates- polysulphides- sulphide- hydrogen sulphides- inorganic salts',
                              ),
                              13 => 
                              array (
                                'key' => 'Arsenic and compounds',
                                'value' => 'Arsenic and compounds',
                              ),
                              14 => 
                              array (
                                'key' => 'Asbestos fibers',
                                'value' => 'Asbestos fibers',
                              ),
                              15 => 
                              array (
                                'key' => 'Azocolourants and Azodyes',
                                'value' => 'Azocolourants and Azodyes',
                              ),
                              16 => 
                              array (
                                'key' => 'Benzene',
                                'value' => 'Benzene',
                              ),
                              17 => 
                              array (
                                'key' => 'Benzidine and salts',
                                'value' => 'Benzidine and salts',
                              ),
                              18 => 
                              array (
                                'key' => 'Bis(pentabromophenyl)ether (decaBDE)',
                                'value' => 'Bis-pentabromophenyl-ether -decaBDE-',
                              ),
                              19 => 
                              array (
                                'key' => 'Bisphenol A',
                                'value' => 'Bisphenol A',
                              ),
                              20 => 
                              array (
                                'key' => 'Bromoacetic acid esters: Butyl bromoacetate, Propyl bromoacetate, Ethyl bromoacetate, Methyl bromoacetate',
                                'value' => 'Bromoacetic acid esters- Butyl bromoacetate- Propyl bromoacetate- Ethyl bromoacetate- Methyl bromoacetate',
                              ),
                              21 => 
                              array (
                                'key' => 'Cadmium and compounds',
                                'value' => 'Cadmium and compounds',
                              ),
                              22 => 
                              array (
                                'key' => 'Chloroethene and Chloroethylene (Vinyl chloride)',
                                'value' => 'Chloroethene and Chloroethylene -Vinyl chloride-',
                              ),
                              23 => 
                              array (
                                'key' => 'Chloroform',
                                'value' => 'Chloroform',
                              ),
                              24 => 
                              array (
                                'key' => 'Chromium VI and compounds',
                                'value' => 'Chromium VI and compounds',
                              ),
                              25 => 
                              array (
                                'key' => 'CMR substances in textiles',
                                'value' => 'CMR substances in textiles',
                              ),
                              26 => 
                              array (
                                'key' => 'Coal tars: low-temp oils, alkalines, acids, extracts, phenols, distillates; anthracene, creosote, naphthalene oils',
                                'value' => 'Coal tars- low-temp oils- alkalines- acids- extracts- phenols- distillates; anthracene- creosote- naphthalene oils',
                              ),
                              27 => 
                              array (
                                'key' => 'Cyclohexane',
                                'value' => 'Cyclohexane',
                              ),
                              28 => 
                              array (
                                'key' => 'Di-µ-oxo-di-n-butylstanniohydroxyborane / Dibutyltin hydrogen borate C8H19BO3Sn (DBB)',
                                'value' => 'Di-µ-oxo-di-n-butylstanniohydroxyborane - Dibutyltin hydrogen borate C8H19BO3Sn -DBB-',
                              ),
                              29 => 
                              array (
                                'key' => 'Dichloromethane',
                                'value' => 'Dichloromethane',
                              ),
                              30 => 
                              array (
                                'key' => 'Dimethylfumarate (DMF)',
                                'value' => 'Dimethylfumarate -DMF-',
                              ),
                              31 => 
                              array (
                                'key' => 'Diphenylether, octabromo derivative C12H2Br8O',
                                'value' => 'Diphenylether- octabromo derivative C12H2Br8O',
                              ),
                              32 => 
                              array (
                                'key' => 'Directive 1999/45/EC dangerous liquids',
                                'value' => 'Directive 1999-45-EC dangerous liquids',
                              ),
                              33 => 
                              array (
                                'key' => 'EC 1272/2008 Annex VI Part 3 carcinogens, mutagens, and reprotoxins per category 1A, 1B (Table 3.1) or 1, 2 (Table 3.2)',
                                'value' => 'EC 1272-2008 Annex VI Part 3 carcinogens- mutagens- and reprotoxins per category 1A- 1B -Table 3.1- or 1- 2 -Table 3.2-',
                              ),
                              34 => 
                              array (
                                'key' => 'Flammable gases (Cat 1,2), liquids (Cat 1,2,3), solids (Cat 1,2) that in water emit flamable gases (Cat 1,2,3) of pyrophoric liquids, solids (Cat 1)',
                                'value' => 'Flammable gases -Cat 1-2-- liquids -Cat 1-2-3-- solids -Cat 1-2- that in water emit flamable gases -Cat 1-2-3- of pyrophoric liquids- solids -Cat 1-',
                              ),
                              35 => 
                              array (
                                'key' => 'Hexachloroethane',
                                'value' => 'Hexachloroethane',
                              ),
                              36 => 
                              array (
                                'key' => 'Lead and compounds',
                                'value' => 'Lead and compounds',
                              ),
                              37 => 
                              array (
                                'key' => 'Mercury and compounds',
                                'value' => 'Mercury and compounds',
                              ),
                              38 => 
                              array (
                                'key' => 'Methanol',
                                'value' => 'Methanol',
                              ),
                              39 => 
                              array (
                                'key' => 'Methylenediphenyl diisocyanate (MDI)',
                                'value' => 'Methylenediphenyl diisocyanate -MDI-',
                              ),
                              40 => 
                              array (
                                'key' => 'Monomethyl -tetrachlorodiphenyl methane (Ugilec 141)',
                                'value' => 'Monomethyl -tetrachlorodiphenyl methane -Ugilec 141-',
                              ),
                              41 => 
                              array (
                                'key' => 'Monomethyl-dibromo-diphenyl methane bromobenzylbromotoluene, mixture of isomers (DBBT)',
                                'value' => 'Monomethyl-dibromo-diphenyl methane bromobenzylbromotoluene- mixture of isomers -DBBT-',
                              ),
                              42 => 
                              array (
                                'key' => 'Monomethyl-dichloro-diphenyl methane (Ugilec 121/21)',
                                'value' => 'Monomethyl-dichloro-diphenyl methane -Ugilec 121-21-',
                              ),
                              43 => 
                              array (
                                'key' => 'Nickel and compounds',
                                'value' => 'Nickel and compounds',
                              ),
                              44 => 
                              array (
                                'key' => 'Nonylphenol C6H4(OH)C9H19 and Nonylphenol ethoxylates',
                                'value' => 'Nonylphenol C6H4-OH-C9H19 and Nonylphenol ethoxylates',
                              ),
                              45 => 
                              array (
                                'key' => 'Nonylphenol ethoxylates (NPE) (C2H4O)nC15H24O',
                                'value' => 'Nonylphenol ethoxylates -NPE- -C2H4O-nC15H24O',
                              ),
                              46 => 
                              array (
                                'key' => 'Octamethylcyclotetrasiloxane (D4), Decamethylcyclopentasiloxane (D5)',
                                'value' => 'Octamethylcyclotetrasiloxane -D4-- Decamethylcyclopentasiloxane -D5-',
                              ),
                              47 => 
                              array (
                                'key' => 'Organostannic compounds',
                                'value' => 'Organostannic compounds',
                              ),
                              48 => 
                              array (
                                'key' => 'Pentachloroethane',
                                'value' => 'Pentachloroethane',
                              ),
                              49 => 
                              array (
                                'key' => 'Pentachlorophenol and salts, esters',
                                'value' => 'Pentachlorophenol and salts- esters',
                              ),
                              50 => 
                              array (
                                'key' => 'Perfluorooctanoic acid (PFOA) and salts',
                                'value' => 'Perfluorooctanoic acid -PFOA- and salts',
                              ),
                              51 => 
                              array (
                                'key' => 'Phenylmercury: 2-ethylhexanoate, acetate, neodecanoate, octanoate, propionate',
                                'value' => 'Phenylmercury- 2-ethylhexanoate- acetate- neodecanoate- octanoate- propionate',
                              ),
                              52 => 
                              array (
                                'key' => 'Phthalates: 1,2-Benzenedicarboxylic acid, di-C8-10-branched alkyl esters, C9-rich, 1,2-Benzenedicarboxylic acid, di-C9-11-branched alkyl esters, C10-rich, Di-isononyl phthalate (DINP), Di-isodecyl phthalate (DIDP), Di-n-octyl phthalate (DNOP)',
                                'value' => 'Phthalates- 1-2-Benzenedicarboxylic acid- di-C8-10-branched alkyl esters- C9-rich- 1-2-Benzenedicarboxylic acid- di-C9-11-branched alkyl esters- C10-rich- Di-isononyl phthalate -DINP-- Di-isodecyl phthalate -DIDP-- Di-n-octyl phthalate -DNOP-',
                              ),
                              53 => 
                              array (
                                'key' => 'Phthalates: Dibutyl phthalate (DBP), Benzyl butyl phthalate (BBP), Bis (2-ethylhexyl) phthalate (DEHP)',
                                'value' => 'Phthalates- Dibutyl phthalate -DBP-- Benzyl butyl phthalate -BBP-- Bis -2-ethylhexyl- phthalate -DEHP-',
                              ),
                              54 => 
                              array (
                                'key' => 'Polybromobiphenyls, Polybrominatedbiphenyls (PBB)',
                                'value' => 'Polybromobiphenyls- Polybrominatedbiphenyls -PBB-',
                              ),
                              55 => 
                              array (
                                'key' => 'Polychlorinated terphenyls (PCTs)',
                                'value' => 'Polychlorinated terphenyls -PCTs-',
                              ),
                              56 => 
                              array (
                                'key' => 'Polycyclic-aromatic hydrocarbons (PAHs): Benzo[a]pyrene (BaP), Benzo[e]pyrene (BeP), Benzo[a]anthracene (BaA), Chrysen (CHR), Benzo[b]fluoranthene (BbFA), Benzo[j]fluoranthene (BjFA), Benzo[k]fluoranthene (BkFA), Dibenzo[a,h]anthracene (DBAhA)',
                                'value' => 'Polycyclic-aromatic hydrocarbons -PAHs-- Benzo-a-pyrene -BaP-- Benzo-e-pyrene -BeP-- Benzo-a-anthracene -BaA-- Chrysen -CHR-- Benzo-b-fluoranthene -BbFA-- Benzo-j-fluoranthene -BjFA-- Benzo-k-fluoranthene -BkFA-- Dibenzo-a-h-anthracene -DBAhA-',
                              ),
                              57 => 
                              array (
                                'key' => 'Soap bark powder (Quillaja saponaria) and saponine derivatives',
                                'value' => 'Soap bark powder -Quillaja saponaria- and saponine derivatives',
                              ),
                              58 => 
                              array (
                                'key' => 'Toluene',
                                'value' => 'Toluene',
                              ),
                              59 => 
                              array (
                                'key' => 'Trichlorobenzene',
                                'value' => 'Trichlorobenzene',
                              ),
                              60 => 
                              array (
                                'key' => 'Tris (2,3 dibromopropyl) phosphate',
                                'value' => 'Tris -2-3 dibromopropyl- phosphate',
                              ),
                              61 => 
                              array (
                                'key' => 'Tris(aziridinyl) phosphinoxide',
                                'value' => 'Tris-aziridinyl- phosphinoxide',
                              ),
                            ),
                             'defaultValue' => '',
                             'columnLength' => 1000,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => 730,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => '',
                             'optionsProviderData' => '',
                          )),
                          2 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
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
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'proposition65WarningAttributesRequired',
                                     'title' => 'Proposition 65 warning attributes required',
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
                                     'width' => 220,
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'prop65Message',
                                     'title' => 'Prop 65 Message',
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
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'height' => 130,
                                     'width' => 220,
                                  )),
                                  2 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                     'name' => 'warningIcon',
                                     'title' => 'Warning Icon',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:170px;',
                                     'permissions' => NULL,
                                     'fieldtype' => '',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'uploadPath' => '',
                                     'width' => 250,
                                     'height' => 150,
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 200,
                                 'labelAlign' => 'left',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
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
                                     'name' => 'californiaProposition65ChemicalName1',
                                     'title' => 'California Proposition65 Chemical Name1',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'width' => 220,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                     'optionsProviderData' => 'Chemical|Name',
                                  )),
                                  1 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'californiaProposition65ChemicalName2',
                                     'title' => 'California Proposition 65 Chemical Name2',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'width' => 220,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                     'optionsProviderData' => 'Chemical|Name',
                                  )),
                                  2 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'californiaProposition65ChemicalName3',
                                     'title' => 'California Proposition 65 Chemical Name3',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'width' => 220,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                     'optionsProviderData' => 'Chemical|Name',
                                  )),
                                  3 => 
                                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'nitrosamines',
                                     'title' => 'Nitrosamines',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                                     'width' => 220,
                                     'defaultValueGenerator' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 220,
                                 'labelAlign' => 'left',
                              )),
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'labelWidth' => 100,
                             'labelAlign' => 'left',
                          )),
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 150,
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
                     'icon' => '',
                     'labelWidth' => 100,
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
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_green.png',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          3 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Digital Assets',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Digital Assets',
             'width' => 0,
             'height' => 1100,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
                 'name' => 'Layout',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => '',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => 'height:100%;',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Product Images',
                     'width' => 0,
                     'height' => 1000,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'mainImage',
                         'title' => 'MainImage',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'frontView',
                         'title' => 'Front view',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '/Continental Aftermarket/Products/IAM ATE/Disc/Brake Disc',
                         'width' => 300,
                         'height' => '',
                      )),
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'sideView',
                         'title' => 'Side view',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
                      )),
                      3 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'cutView',
                         'title' => 'Cut view',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; clear:right;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
                      )),
                      4 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'epixImage',
                         'title' => 'EPIX Image',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
                      )),
                      5 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ImageGallery::__set_state(array(
                         'name' => 'Images360',
                         'title' => '360 Images',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; ',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'ratioX' => NULL,
                         'ratioY' => NULL,
                         'predefinedDataTemplates' => '',
                         'height' => NULL,
                         'width' => NULL,
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'panel',
                     'layout' => '',
                     'border' => false,
                     'icon' => '',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Alternate_Images',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Alternate Images',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'altImage1',
                         'title' => 'Alternate Image 1',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'altImage2',
                         'title' => 'Alternate Image 2',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
                      )),
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'altImage3',
                         'title' => 'Alternate Image 3',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
                      )),
                      3 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'altImage4',
                         'title' => 'Alternate Image 4',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
                      )),
                      4 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'altImage5',
                         'title' => 'Alternate Image 5',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
                      )),
                      5 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'altImage6',
                         'title' => 'Alternate Image 6',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
                      )),
                      6 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'altImage7',
                         'title' => 'Alternate Image 7',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
                      )),
                      7 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'altImage8',
                         'title' => 'Alternate Image 8',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
                      )),
                      8 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'certificationImage',
                         'title' => 'Certification Image',
                         'tooltip' => 'Certification Image for Virtual Catalog API.',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 300,
                         'height' => '',
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
                  2 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Videos',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Videos',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                         'name' => 'video1',
                         'title' => 'Video 1',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'allowedTypes' => NULL,
                         'supportedTypes' => 
                        array (
                          0 => 'asset',
                          1 => 'youtube',
                          2 => 'vimeo',
                          3 => 'dailymotion',
                        ),
                         'height' => '',
                         'width' => 300,
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                         'name' => 'video2',
                         'title' => 'Video 2',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'allowedTypes' => NULL,
                         'supportedTypes' => 
                        array (
                          0 => 'asset',
                          1 => 'youtube',
                          2 => 'vimeo',
                          3 => 'dailymotion',
                        ),
                         'height' => '',
                         'width' => 300,
                      )),
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                         'name' => 'video3',
                         'title' => 'Video 3',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'allowedTypes' => NULL,
                         'supportedTypes' => 
                        array (
                          0 => 'asset',
                          1 => 'youtube',
                          2 => 'vimeo',
                          3 => 'dailymotion',
                        ),
                         'height' => '',
                         'width' => 300,
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
                  3 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Documents',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyRelation::__set_state(array(
                         'name' => 'Document',
                         'title' => 'Document',
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
                         'displayMode' => NULL,
                         'pathFormatterClass' => 'AppBundle\\Formatter\\AssetFormatter',
                         'maxItems' => 20,
                         'assetInlineDownloadAllowed' => false,
                         'assetUploadPath' => '',
                         'allowToClearRelation' => true,
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
                          3 => 
                          array (
                            'assetTypes' => 'text',
                          ),
                          4 => 
                          array (
                            'assetTypes' => 'unknown',
                          ),
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'enableTextSelection' => false,
                         'width' => '',
                         'height' => NULL,
                         'columns' => 
                        array (
                          0 => 
                          array (
                            'type' => 'text',
                            'position' => 1,
                            'key' => 'DrawingNumber',
                            'label' => 'Drawing Number',
                          ),
                          1 => 
                          array (
                            'type' => 'number',
                            'position' => 2,
                            'key' => 'DrawingRevisionNumber',
                            'label' => 'Drawing Revision number',
                          ),
                          2 => 
                          array (
                            'type' => 'text',
                            'position' => 3,
                            'key' => 'DrawingRevisionDate',
                            'label' => 'Drawing Revision Date',
                            'width' => NULL,
                          ),
                          3 => 
                          array (
                            'type' => 'bool',
                            'position' => 4,
                            'key' => 'CertificationDocument',
                            'label' => 'Certification Document',
                          ),
                        ),
                         'columnKeys' => 
                        array (
                          0 => 'DrawingNumber',
                          1 => 'DrawingRevisionNumber',
                          2 => 'DrawingRevisionDate',
                          3 => 'CertificationDocument',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ElementMetadata[]',
                         'optimizedAdminLoading' => false,
                         'enableBatchEdit' => false,
                         'allowMultipleAssignments' => false,
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
                         'name' => 'BrandingLaylineAssets',
                         'title' => 'Branding/Layline Assets',
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
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => 3,
                         'assetInlineDownloadAllowed' => false,
                         'assetUploadPath' => '',
                         'allowToClearRelation' => true,
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
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'enableTextSelection' => false,
                         'width' => '',
                         'height' => '',
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
                  4 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Catalog Assets',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Catalog Assets',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'LeftPrintCatalogImage',
                         'title' => 'Left Image',
                         'tooltip' => 'Left print catalog image for hydraulic hose and hydraulic fitting hose.',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 325,
                         'height' => '',
                      )),
                      1 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'RightPrintCatalogImage',
                         'title' => 'Right Image',
                         'tooltip' => 'Right print catalog image for hydraulic hose and hydraulic fitting hose.',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '/Continental Aftermarket/Products/IAM ATE/Disc/Brake Disc',
                         'width' => 325,
                         'height' => '',
                      )),
                      2 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'DrawingPictureForCatalog',
                         'title' => 'Drawing Picture',
                         'tooltip' => 'Drawing Picture For Catalog',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => true,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 550,
                         'height' => '',
                      )),
                      3 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'ProfileDimensionImage',
                         'title' => 'Profile Dimension Image',
                         'tooltip' => 'Profile dimension image for PTG hose and industrial fitting catalog.',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 325,
                         'height' => '',
                      )),
                      4 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'beltIdentificationImage',
                         'title' => 'Belt Identification Image',
                         'tooltip' => 'Belt Identification Image',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '/Continental Aftermarket/Products/IAM ATE/Disc/Brake Disc',
                         'width' => 325,
                         'height' => '',
                      )),
                      5 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'profileDimensionPtsBelts',
                         'title' => 'PTS belts Profile Dimension Image',
                         'tooltip' => 'Profile dimension image for PTS belt catalog.',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'width' => 400,
                         'height' => '',
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/image-region.svg',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          4 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Pricing Data',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Pricing Data',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Table::__set_state(array(
                 'name' => 'priceData',
                 'title' => 'Price Data',
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
                 'cols' => 7,
                 'colsFixed' => true,
                 'rows' => NULL,
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
                 'height' => '',
                 'width' => '',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/currency_exchange.svg',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          5 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Catalog Attributes',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Catalog Attributes',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'CatalogGrouping',
                 'title' => 'Catalog Grouping',
                 'tooltip' => 'Attribute for hydraulic hose catalog grouping.',
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
                 'width' => 220,
                 'defaultValueGenerator' => '',
              )),
              1 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'FittingTableName',
                 'title' => 'Table Name',
                 'tooltip' => 'Attribute for hydraulic fitting hose and industrial hose catalog grouping.',
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
                    'key' => 'Fitting-Banjo',
                    'value' => 'Fitting-Banjo',
                  ),
                  1 => 
                  array (
                    'key' => 'Fitting Accessories-AC Adapter',
                    'value' => 'Fitting Accessories-AC Adapter',
                  ),
                  2 => 
                  array (
                    'key' => 'Fitting Accessories-AC Clip',
                    'value' => 'Fitting Accessories-AC Clip',
                  ),
                  3 => 
                  array (
                    'key' => 'Fitting Accessories-AC Nut',
                    'value' => 'Fitting Accessories-AC Nut',
                  ),
                  4 => 
                  array (
                    'key' => 'Fitting Accessories-AC Orifice',
                    'value' => 'Fitting Accessories-AC Orifice',
                  ),
                  5 => 
                  array (
                    'key' => 'Fitting Accessories-AC O-ring',
                    'value' => 'Fitting Accessories-AC O-ring',
                  ),
                  6 => 
                  array (
                    'key' => 'Fitting Accessories-AC O-ring 2',
                    'value' => 'Fitting Accessories-AC O-ring 2',
                  ),
                  7 => 
                  array (
                    'key' => 'Fitting Accessories-AC Sleeve',
                    'value' => 'Fitting Accessories-AC Sleeve',
                  ),
                  8 => 
                  array (
                    'key' => 'Fitting Accessories-AC Tools',
                    'value' => 'Fitting Accessories-AC Tools',
                  ),
                  9 => 
                  array (
                    'key' => 'Fitting Accessories-AC Valve Adapter',
                    'value' => 'Fitting Accessories-AC Valve Adapter',
                  ),
                  10 => 
                  array (
                    'key' => 'Fitting Accessories-AC Valve Caps',
                    'value' => 'Fitting Accessories-AC Valve Caps',
                  ),
                  11 => 
                  array (
                    'key' => 'Fitting Accessories-AC Valve Core',
                    'value' => 'Fitting Accessories-AC Valve Core',
                  ),
                  12 => 
                  array (
                    'key' => 'Fitting Accessories-AC Washer',
                    'value' => 'Fitting Accessories-AC Washer',
                  ),
                  13 => 
                  array (
                    'key' => 'Fitting-AC Joiner',
                    'value' => 'Fitting-AC Joiner',
                  ),
                  14 => 
                  array (
                    'key' => 'Fitting-AC Joiner Elbow',
                    'value' => 'Fitting-AC Joiner Elbow',
                  ),
                  15 => 
                  array (
                    'key' => 'Fitting-AC Joiner T',
                    'value' => 'Fitting-AC Joiner T',
                  ),
                  16 => 
                  array (
                    'key' => 'Fitting-AC Joiner Valve',
                    'value' => 'Fitting-AC Joiner Valve',
                  ),
                  17 => 
                  array (
                    'key' => 'Fitting-AC Straight 1',
                    'value' => 'Fitting-AC Straight 1',
                  ),
                  18 => 
                  array (
                    'key' => 'Fitting-AC Tube',
                    'value' => 'Fitting-AC Tube',
                  ),
                  19 => 
                  array (
                    'key' => 'Fitting-AC Valve',
                    'value' => 'Fitting-AC Valve',
                  ),
                  20 => 
                  array (
                    'key' => 'Fitting-AC Valve 2',
                    'value' => 'Fitting-AC Valve 2',
                  ),
                  21 => 
                  array (
                    'key' => 'Fitting-AC Valve 3',
                    'value' => 'Fitting-AC Valve 3',
                  ),
                  22 => 
                  array (
                    'key' => 'Fitting-Elbow',
                    'value' => 'Fitting-Elbow',
                  ),
                  23 => 
                  array (
                    'key' => 'Fitting-Elbow 2',
                    'value' => 'Fitting-Elbow 2',
                  ),
                  24 => 
                  array (
                    'key' => 'Fitting-Elbow 3',
                    'value' => 'Fitting-Elbow 3',
                  ),
                  25 => 
                  array (
                    'key' => 'Fitting-Elbow 4',
                    'value' => 'Fitting-Elbow 4',
                  ),
                  26 => 
                  array (
                    'key' => 'Fitting-Elbow 5',
                    'value' => 'Fitting-Elbow 5',
                  ),
                  27 => 
                  array (
                    'key' => 'Fitting-Elbow 6',
                    'value' => 'Fitting-Elbow 6',
                  ),
                  28 => 
                  array (
                    'key' => 'Fitting-Elbow Reatt',
                    'value' => 'Fitting-Elbow Reatt',
                  ),
                  29 => 
                  array (
                    'key' => 'Fitting-Elbow Reatt 2',
                    'value' => 'Fitting-Elbow Reatt 2',
                  ),
                  30 => 
                  array (
                    'key' => 'Fitting-Elbow Skive',
                    'value' => 'Fitting-Elbow Skive',
                  ),
                  31 => 
                  array (
                    'key' => 'Fitting-Ferrule',
                    'value' => 'Fitting-Ferrule',
                  ),
                  32 => 
                  array (
                    'key' => 'Fitting-Flange Elbow 2',
                    'value' => 'Fitting-Flange Elbow 2',
                  ),
                  33 => 
                  array (
                    'key' => 'Fitting-Flange Elbow',
                    'value' => 'Fitting-Flange Elbow',
                  ),
                  34 => 
                  array (
                    'key' => 'Fitting-Flange Elbow Skive',
                    'value' => 'Fitting-Flange Elbow Skive',
                  ),
                  35 => 
                  array (
                    'key' => 'Fitting-Flange Straight',
                    'value' => 'Fitting-Flange Straight',
                  ),
                  36 => 
                  array (
                    'key' => 'Fitting-Flange Straight Skive',
                    'value' => 'Fitting-Flange Straight Skive',
                  ),
                  37 => 
                  array (
                    'key' => 'Fitting-Joiner',
                    'value' => 'Fitting-Joiner',
                  ),
                  38 => 
                  array (
                    'key' => 'Fitting-Standpipe Elbow',
                    'value' => 'Fitting-Standpipe Elbow',
                  ),
                  39 => 
                  array (
                    'key' => 'Fitting-Standpipe Elbow 2',
                    'value' => 'Fitting-Standpipe Elbow 2',
                  ),
                  40 => 
                  array (
                    'key' => 'Fitting-Standpipe Straight',
                    'value' => 'Fitting-Standpipe Straight',
                  ),
                  41 => 
                  array (
                    'key' => 'Fitting-Straight',
                    'value' => 'Fitting-Straight',
                  ),
                  42 => 
                  array (
                    'key' => 'Fitting-Straight 2',
                    'value' => 'Fitting-Straight 2',
                  ),
                  43 => 
                  array (
                    'key' => 'Fitting-Straight Reatt',
                    'value' => 'Fitting-Straight Reatt',
                  ),
                  44 => 
                  array (
                    'key' => 'Fitting-Straight Reatt 2',
                    'value' => 'Fitting-Straight Reatt 2',
                  ),
                  45 => 
                  array (
                    'key' => 'Fitting-Straight Skive',
                    'value' => 'Fitting-Straight Skive',
                  ),
                  46 => 
                  array (
                    'key' => 'Fitting-Straight Skive 2',
                    'value' => 'Fitting-Straight Skive 2',
                  ),
                  47 => 
                  array (
                    'key' => 'Fitting-Union',
                    'value' => 'Fitting-Union',
                  ),
                  48 => 
                  array (
                    'key' => 'Fitting-Union Skive',
                    'value' => 'Fitting-Union Skive',
                  ),
                  49 => 
                  array (
                    'key' => 'Hose Attribute Table 1',
                    'value' => 'Hose Attribute Table 1',
                  ),
                  50 => 
                  array (
                    'key' => 'Hose Attribute Table 2',
                    'value' => 'Hose Attribute Table 2',
                  ),
                  51 => 
                  array (
                    'key' => 'Hose Attribute Table 3',
                    'value' => 'Hose Attribute Table 3',
                  ),
                  52 => 
                  array (
                    'key' => 'Hose Attribute Table 4',
                    'value' => 'Hose Attribute Table 4',
                  ),
                  53 => 
                  array (
                    'key' => 'Hose Attribute Table 5',
                    'value' => 'Hose Attribute Table 5',
                  ),
                  54 => 
                  array (
                    'key' => 'Hose Attribute Table 6',
                    'value' => 'Hose Attribute Table 6',
                  ),
                  55 => 
                  array (
                    'key' => 'Hose Attribute Table 7',
                    'value' => 'Hose Attribute Table 7',
                  ),
                  56 => 
                  array (
                    'key' => 'Hose Attribute Table 8',
                    'value' => 'Hose Attribute Table 8',
                  ),
                  57 => 
                  array (
                    'key' => 'Hose Attribute Table 9',
                    'value' => 'Hose Attribute Table 9',
                  ),
                  58 => 
                  array (
                    'key' => 'Hose Attribute Table 10',
                    'value' => 'Hose Attribute Table 10',
                  ),
                  59 => 
                  array (
                    'key' => 'Hose Attribute Table 11',
                    'value' => 'Hose Attribute Table 11',
                  ),
                  60 => 
                  array (
                    'key' => 'Hose Attribute Table 13',
                    'value' => 'Hose Attribute Table 13',
                  ),
                ),
                 'defaultValue' => '',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => 220,
                 'optionsProviderType' => NULL,
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
              )),
              2 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'name' => 'CatalogSortTable',
                 'title' => 'Catalog Sort Table',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => true,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'integer' => true,
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'width' => 220,
                 'defaultValueGenerator' => '',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/data_sheet.svg',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          6 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Completeness',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Completeness',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                 'name' => 'localizedfields',
                 'title' => '',
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
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'CompletenessPercentage',
                     'title' => 'Completeness Percentage',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: #d9edf7; border-color: #bce8f1 !important; color: #31708f;',
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
                     'width' => 600,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'EmptyFields',
                     'title' => 'Empty Fields',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                     'height' => 500,
                     'width' => 600,
                  )),
                ),
                 'region' => NULL,
                 'layout' => NULL,
                 'maxTabs' => 35,
                 'border' => false,
                 'provideSplitView' => false,
                 'tabPosition' => 'top',
                 'hideLabelsWhenTabsReached' => NULL,
                 'referencedFields' => 
                array (
                ),
                 'permissionView' => NULL,
                 'permissionEdit' => NULL,
                 'labelWidth' => 200,
                 'labelAlign' => 'left',
                 'width' => NULL,
                 'height' => NULL,
                 'fieldDefinitionsCache' => NULL,
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/accept_database.svg',
             'labelWidth' => 100,
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
   'group' => 'Products Data',
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
