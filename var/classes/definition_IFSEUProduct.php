<?php

/**
 * Inheritance: yes
 * Variants: no
 *
 * Fields Summary:
 * - productBrandName [select]
 * - brandConstruction [select]
 * - catalogLayline [input]
 * - Category [select]
 * - Sub_Category [select]
 * - productPublishedOnline [booleanSelect]
 * - datasheetPublishedInTheDealerPortal [booleanSelect]
 * - pricelistPublishedInTheDealerPortal [booleanSelect]
 * - FeaturesBenefitsBulletPoint [multiselect]
 * - TPCode [input]
 * - WebsiteLink [input]
 * - localizedfields [localizedfields]
 * -- headlineWeb [input]
 * -- productBrandNamePerLanguage [input]
 * -- BrandShortText2 [input]
 * -- searchKeywords [multiselect]
 * -- Marking1 [textarea]
 * -- Marking2 [textarea]
 * -- commercialDescription [wysiwyg]
 * -- technicalDescription [wysiwyg]
 * -- shortDescription [wysiwyg]
 * -- longDescription [wysiwyg]
 * -- NoteInformationBelowTable [multiselect]
 * -- webDescription [textarea]
 * -- productShortDescription [textarea]
 * -- amazonTitle [input]
 * -- sapDescription [textarea]
 * -- CompletenessPercentage [input]
 * -- EmptyFields [textarea]
 * - Base [objectbricks]
 * - minimumTemperatureC [numeric]
 * - maximumTemperatureC [numeric]
 * - rangeTemperatureC [input]
 * - temperatureRangeApplication [input]
 * - temporaryUntilC [numeric]
 * - DampableUntil1C [numeric]
 * - DampableUntil1T [numeric]
 * - justTemporarily [booleanSelect]
 * - PressureUntil [numeric]
 * - minimumTemperatureF [numeric]
 * - maximumTemperatureF [numeric]
 * - rangeTemperatureF [input]
 * - temperatureRangeFAndC [input]
 * - temporaryUntilT [numeric]
 * - DampableUntil2C [numeric]
 * - DampableUntil2T [numeric]
 * - onlyOpenSystem [booleanSelect]
 * - temperatureNote [input]
 * - siopFullCode [input]
 * - SIOPLevel1 [manyToManyObjectRelation]
 * - SIOPLevel2 [manyToManyObjectRelation]
 * - SIOPLevel3 [manyToManyObjectRelation]
 * - SIOPLevel4 [manyToManyObjectRelation]
 * - SIOPLevel5 [manyToManyObjectRelation]
 * - SIOPLevel6 [manyToManyObjectRelation]
 * - SIOPLevel7 [manyToManyObjectRelation]
 * - shippingConditions [multiselect]
 * - Conditions [multiselect]
 * - minimumOrder [multiselect]
 * - manufacturingLength [multiselect]
 * - Skeleton [objectbricks]
 * - B2CCategory [manyToManyObjectRelation]
 * - printedCatalogFlag [booleanSelect]
 * - B2CStoreFlag [booleanSelect]
 * - virtualCatalogFlag [booleanSelect]
 * - newItemFlagForCatalog [booleanSelect]
 * - productLength [numeric]
 * - ProductLengthUnit [input]
 * - materialNumber [input]
 * - EANCode [input]
 * - materialGroup [manyToOneRelation]
 * - countryOfOrigin [manyToOneRelation]
 * - baseUOM [input]
 * - grossWeight [numeric]
 * - netWeight [numeric]
 * - weightUnit [select]
 * - industryStandard [input]
 * - succesorFlag [booleanSelect]
 * - deletedFlagAtClientLevel [booleanSelect]
 * - rebateFlag [booleanSelect]
 * - BusinessUnit [select]
 * - Spezi [input]
 * - oldMaterialCode [input]
 * - manufacturer [input]
 * - stccCode [input]
 * - manufacturerPartNumber [input]
 * - returnFlag [booleanSelect]
 * - OutsidePurchaseFlag [checkbox]
 * - eHoseProduct [checkbox]
 * - CustomsTariffNumber [input]
 * - b2BexternalID [input]
 * - sapDescriptionLanguage [input]
 * - weightg [numeric]
 * - weightKg [numeric]
 * - WeightLbsPerFTUOM [input]
 * - ProductType [select]
 * - shelfLife [input]
 * - ConflictMinerals [multiselect]
 * - additionalInformation [input]
 * - substitutePartNumber [input]
 * - numberOfItems [numeric]
 * - UnitsInPackage [input]
 * - SalesOrgData [reverseObjectRelation]
 * - Plants [reverseObjectRelation]
 * - rohs [select]
 * - reach [select]
 * - Gallery [advancedManyToManyRelation]
 * - proposition65WarningAttributesRequired [booleanSelect]
 * - prop65Message [textarea]
 * - warningIcon [image]
 * - californiaProposition65ChemicalName1 [select]
 * - californiaProposition65ChemicalName2 [select]
 * - californiaProposition65ChemicalName3 [select]
 * - nitrosamines [input]
 * - merchantDiscount [input]
 * - Discount [input]
 * - GrossPrice [input]
 * - Department [input]
 * - listPrice [input]
 * - additionalDiscount [input]
 * - OnStock [booleanSelect]
 * - publishedOnline [booleanSelect]
 * - priceDate [date]
 * - Amount [input]
 * - ConnectionType [input]
 * - Note [input]
 * - Currency [input]
 * - minimumQuantityUnit [input]
 * - MinimumQuantityMeasurementUnit [input]
 * - EHoseID [input]
 * - productionLength [multiselect]
 * - mainImage [image]
 * - frontView [image]
 * - sideView [image]
 * - cutView [image]
 * - epixImage [image]
 * - TeaserImage [image]
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
 * - Document [manyToManyRelation]
 * - BrandingLaylineAssets [manyToManyRelation]
 * - LeftPrintCatalogImage [image]
 * - RightPrintCatalogImage [image]
 * - DrawingPictureForCatalog [image]
 * - Certificate1 [advancedManyToManyRelation]
 * - Certificate2 [advancedManyToManyRelation]
 * - priceData [table]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => 'IFSEUProduct',
   'name' => 'IFSEUProduct',
   'title' => '',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1707300457,
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
         'region' => '',
         'title' => '',
         'width' => 0,
         'height' => 0,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
         'datatype' => 'layout',
         'children' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Base',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Brand Data',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
                 'name' => 'Layout',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => '',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'hoseBaseData',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Hose Base Data',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'productBrandName',
                                     'title' => 'Product Brand Name',
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
                                     'defaultValue' => '',
                                     'columnLength' => 190,
                                     'dynamicOptions' => false,
                                     'defaultValueGenerator' => '',
                                     'width' => 300,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\BrandOptionProvider',
                                     'optionsProviderData' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'brandConstruction',
                                     'title' => 'Brand Construction',
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
                                     'defaultValue' => '',
                                     'columnLength' => 190,
                                     'dynamicOptions' => false,
                                     'defaultValueGenerator' => '',
                                     'width' => 300,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\BrandOptionProvider',
                                     'optionsProviderData' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'catalogLayline',
                                     'title' => 'Catalog Layline',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'Category',
                                     'title' => 'Category',
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
                                     'defaultValue' => '1',
                                     'columnLength' => 190,
                                     'dynamicOptions' => false,
                                     'defaultValueGenerator' => '',
                                     'width' => 300,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\CategoryOptionsProvider',
                                     'optionsProviderData' => '',
                                  )),
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'Sub_Category',
                                     'title' => 'Sub-Category',
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
                                     'defaultValue' => '1',
                                     'columnLength' => 190,
                                     'dynamicOptions' => false,
                                     'defaultValueGenerator' => '',
                                     'width' => 300,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\SubCategoryOptionsProvider',
                                     'optionsProviderData' => '',
                                  )),
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'productPublishedOnline',
                                     'title' => 'Product published online? (Continental Web)',
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
                                     'yesLabel' => 'Yes',
                                     'noLabel' => 'No',
                                     'emptyLabel' => 'empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'empty',
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
                                     'width' => 300,
                                  )),
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'datasheetPublishedInTheDealerPortal',
                                     'title' => 'Datasheet published in the dealer portal?',
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
                                     'yesLabel' => 'Yes',
                                     'noLabel' => 'No',
                                     'emptyLabel' => 'empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'empty',
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
                                     'width' => 300,
                                  )),
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'pricelistPublishedInTheDealerPortal',
                                     'title' => 'Pricelist published in the dealer portal?',
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
                                     'yesLabel' => 'Yes',
                                     'noLabel' => 'No',
                                     'emptyLabel' => 'empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'empty',
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
                                     'width' => 300,
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                     'name' => 'FeaturesBenefitsBulletPoint',
                                     'title' => 'Features & Benefits Bullet Points',
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
                                     'maxItems' => NULL,
                                     'renderType' => 'tags',
                                     'dynamicOptions' => false,
                                     'height' => '',
                                     'width' => 300,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                                     'optionsProviderData' => 'propertiesGeneral',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'TPCode',
                                     'title' => 'TP Code',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;margin-top:10px;',
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
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'WebsiteLink',
                                 'title' => 'Website Link',
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
                                 'defaultValue' => NULL,
                                 'columnLength' => 190,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 820,
                                 'defaultValueGenerator' => '',
                              )),
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'labelWidth' => 200,
                             'labelAlign' => 'left',
                          )),
                          2 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'name' => 'headlineWeb',
                                         'title' => 'Headline (Web)',
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
                                      1 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'name' => 'productBrandNamePerLanguage',
                                         'title' => 'Product Brand Name Per Language',
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
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
                                      3 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                         'name' => 'searchKeywords',
                                         'title' => 'Search Keywords',
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
                                         'maxItems' => NULL,
                                         'renderType' => 'tags',
                                         'dynamicOptions' => false,
                                         'height' => '',
                                         'width' => 300,
                                         'optionsProviderType' => NULL,
                                         'optionsProviderClass' => '',
                                         'optionsProviderData' => '',
                                      )),
                                      4 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                         'name' => 'Marking1',
                                         'title' => 'Marking 1',
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
                                         'height' => 80,
                                         'width' => 300,
                                      )),
                                      5 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                         'name' => 'Marking2',
                                         'title' => 'Marking 2',
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
                                         'height' => 80,
                                         'width' => 300,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                         'name' => 'commercialDescription',
                                         'title' => 'Commercial Description',
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
                                         'height' => 120,
                                         'width' => 350,
                                      )),
                                      1 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                         'name' => 'technicalDescription',
                                         'title' => 'Technical Description',
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
                                         'height' => 120,
                                         'width' => 350,
                                      )),
                                      2 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
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
                                         'height' => 120,
                                         'width' => 350,
                                      )),
                                      3 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
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
                                         'height' => 120,
                                         'width' => 350,
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
                                 'labelWidth' => 200,
                                 'labelAlign' => 'left',
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                     'name' => 'NoteInformationBelowTable',
                                     'title' => 'Note (Information Below Table)',
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
                                     'height' => 80,
                                     'width' => 830,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\NoteInformationBelowTableOptionsProvider',
                                     'optionsProviderData' => '',
                                  )),
                                ),
                                 'locked' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'fieldtype' => 'fieldcontainer',
                                 'layout' => 'hbox',
                                 'fieldLabel' => '',
                                 'labelWidth' => 200,
                                 'labelAlign' => 'left',
                              )),
                            ),
                             'region' => NULL,
                             'layout' => NULL,
                             'maxTabs' => 35,
                             'border' => false,
                             'provideSplitView' => true,
                             'tabPosition' => 'top',
                             'hideLabelsWhenTabsReached' => NULL,
                             'referencedFields' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                             'name' => 'webDescription',
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
                                          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
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
                                         'labelWidth' => 200,
                                         'labelAlign' => 'left',
                                      )),
                                      1 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                             'name' => 'amazonTitle',
                                             'title' => 'Amazon Title',
                                             'tooltip' => '',
                                             'mandatory' => false,
                                             'noteditable' => false,
                                             'index' => false,
                                             'locked' => false,
                                             'style' => 'margin-left: 60px;',
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
                                     'labelWidth' => 200,
                                     'labelAlign' => 'left',
                                  )),
                                ),
                                 'region' => NULL,
                                 'layout' => NULL,
                                 'maxTabs' => 35,
                                 'border' => false,
                                 'provideSplitView' => true,
                                 'tabPosition' => 'top',
                                 'hideLabelsWhenTabsReached' => NULL,
                                 'referencedFields' => 
                                array (
                                ),
                                 'permissionView' => NULL,
                                 'permissionEdit' => NULL,
                                 'labelWidth' => 210,
                                 'labelAlign' => 'left',
                                 'fieldDefinitionsCache' => NULL,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'sapDescription',
                                     'title' => 'SAP Description',
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
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'height' => 120,
                                     'width' => 250,
                                  )),
                                ),
                                 'region' => NULL,
                                 'layout' => NULL,
                                 'maxTabs' => 35,
                                 'border' => false,
                                 'provideSplitView' => true,
                                 'tabPosition' => 'top',
                                 'hideLabelsWhenTabsReached' => NULL,
                                 'referencedFields' => 
                                array (
                                ),
                                 'permissionView' => NULL,
                                 'permissionEdit' => NULL,
                                 'labelWidth' => 210,
                                 'labelAlign' => 'left',
                                 'fieldDefinitionsCache' => NULL,
                              )),
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'CompletenessPercentage',
                                     'title' => 'Completeness Percentage',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'EmptyFields',
                                     'title' => 'Empty Fields',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                 'provideSplitView' => true,
                                 'tabPosition' => 'top',
                                 'hideLabelsWhenTabsReached' => NULL,
                                 'referencedFields' => 
                                array (
                                ),
                                 'permissionView' => NULL,
                                 'permissionEdit' => NULL,
                                 'labelWidth' => 100,
                                 'labelAlign' => 'left',
                                 'fieldDefinitionsCache' => NULL,
                              )),
                            ),
                             'permissionView' => NULL,
                             'permissionEdit' => NULL,
                             'labelWidth' => 200,
                             'labelAlign' => 'left',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                         'name' => 'Base',
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
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'allowedTypes' => 
                        array (
                          0 => 'IFSEUHoseBase',
                        ),
                         'maxItems' => NULL,
                         'border' => true,
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
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
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'minimumTemperatureC',
                                     'title' => 'Min Temp °C',
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
                                     'defaultValue' => NULL,
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'maximumTemperatureC',
                                     'title' => 'Max temp °C',
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
                                     'defaultValue' => NULL,
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'rangeTemperatureC',
                                     'title' => 'Temperature Range (°C)',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeApplication',
                                     'title' => 'Temperature Range Application',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'temporaryUntilC',
                                     'title' => 'Temporary Until (°C)',
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
                                     'defaultValue' => NULL,
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'DampableUntil1C',
                                     'title' => 'Dampable Until 1 (°C)',
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
                                     'defaultValue' => NULL,
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'DampableUntil1T',
                                     'title' => 'Dampable Until 1 (t)',
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
                                     'defaultValue' => NULL,
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'justTemporarily',
                                     'title' => 'Just "Temporarily"',
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
                                     'width' => 300,
                                  )),
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'PressureUntil',
                                     'title' => 'Pressure Until',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 10px;',
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
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'minimumTemperatureF',
                                     'title' => 'Min Temp °F',
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
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'maximumTemperatureF',
                                     'title' => 'Max temp °F',
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
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'rangeTemperatureF',
                                     'title' => 'Temperature Range (°F)',
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
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureRangeFAndC',
                                     'title' => 'Temperature Range (°F & C°)',
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
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'temporaryUntilT',
                                     'title' => 'Temporary Until (t)',
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
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'DampableUntil2C',
                                     'title' => 'Dampable Until 2 (°C)',
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
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'DampableUntil2T',
                                     'title' => 'Dampable Until 2 (t)',
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
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 300,
                                     'defaultValueGenerator' => '',
                                  )),
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'onlyOpenSystem',
                                     'title' => 'Only Open System',
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
                                     'yesLabel' => 'Yes',
                                     'noLabel' => 'No',
                                     'emptyLabel' => 'empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'empty',
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
                                     'width' => 300,
                                  )),
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'temperatureNote',
                                     'title' => 'Temperature Note',
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
                     'layout' => '',
                     'border' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/overlay-edit.svg',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
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
                            'classes' => 'IFSEUProductCategory',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
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
                            'classes' => 'IFSEUProductCategory',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
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
                            'classes' => 'IFSEUProductCategory',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
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
                            'classes' => 'IFSEUProductCategory',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
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
                            'classes' => 'IFSEUProductCategory',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
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
                            'classes' => 'IFSEUProductCategory',
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
                      8 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'SIOPLevel7',
                         'title' => 'SIOP Level 7',
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
                            'classes' => 'IFSEUProductCategory',
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Pricing & Stocking Details',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Pricing & Stocking Details',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                         'name' => 'Field Container',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => 1100,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                             'name' => 'shippingConditions',
                             'title' => 'Shipping Conditions',
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
                             'height' => 80,
                             'width' => 830,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\ShippingConditionsOptionsProvider',
                             'optionsProviderData' => '',
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                             'name' => 'Conditions',
                             'title' => 'Conditions',
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
                             'height' => 80,
                             'width' => 830,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\ConditionsOptionsProvider',
                             'optionsProviderData' => '',
                          )),
                          2 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                             'name' => 'minimumOrder',
                             'title' => 'Minimum Order',
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
                             'height' => 80,
                             'width' => 830,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\MinimumOrderOptionsProvider',
                             'optionsProviderData' => '',
                          )),
                          3 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                             'name' => 'manufacturingLength',
                             'title' => 'Manufacturing Length',
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
                             'height' => 80,
                             'width' => 830,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\ManufacturingLengthOptionsProvider',
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
                     'fieldtype' => 'panel',
                     'layout' => NULL,
                     'border' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/input.svg',
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
             'layout' => 'fit',
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_yellow.png',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                 'name' => 'Skeleton',
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
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'allowedTypes' => 
                array (
                  0 => 'IFSEUHoseSkeleton',
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
             'layout' => '',
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_blue.png',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Fert',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Finished Goods Data',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
                 'name' => 'Layout',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => '',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Finished Good Attributes',
                     'width' => 1000,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Publish in the table',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
                             'type' => NULL,
                             'region' => NULL,
                             'title' => '',
                             'width' => 0,
                             'height' => 0,
                             'collapsible' => false,
                             'collapsed' => false,
                             'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                             'datatype' => 'layout',
                             'children' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
                                 'type' => NULL,
                                 'region' => NULL,
                                 'title' => '',
                                 'width' => 0,
                                 'height' => 0,
                                 'collapsible' => false,
                                 'collapsed' => false,
                                 'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                                 'datatype' => 'layout',
                                 'children' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
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
                                     'width' => 200,
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
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
                                 'labelWidth' => 200,
                                 'labelAlign' => 'left',
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
                                 'type' => NULL,
                                 'region' => NULL,
                                 'title' => '',
                                 'width' => 0,
                                 'height' => 0,
                                 'collapsible' => false,
                                 'collapsed' => false,
                                 'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                                 'datatype' => 'layout',
                                 'children' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'virtualCatalogFlag',
                                     'title' => 'Virtual Catalog Flag',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:60px;',
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
                                     'width' => 200,
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'newItemFlagForCatalog',
                                     'title' => 'New Item Flag for Catalog',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:60px;',
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
                             'labelWidth' => 200,
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Product Length',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'name' => 'productLength',
                                     'title' => 'Product Length',
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
                                     'decimalPrecision' => NULL,
                                     'width' => 200,
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'ProductLengthUnit',
                                     'title' => 'Product Length Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 60px;',
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
                             'labelWidth' => 200,
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
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'webDescription',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
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
                                 'labelWidth' => 200,
                                 'labelAlign' => 'left',
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'amazonTitle',
                                     'title' => 'Amazon Title',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 60px;',
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
                             'labelWidth' => 200,
                             'labelAlign' => 'left',
                          )),
                        ),
                         'region' => NULL,
                         'layout' => NULL,
                         'maxTabs' => 35,
                         'border' => false,
                         'provideSplitView' => true,
                         'tabPosition' => 'top',
                         'hideLabelsWhenTabsReached' => NULL,
                         'referencedFields' => 
                        array (
                        ),
                         'permissionView' => NULL,
                         'permissionEdit' => NULL,
                         'labelWidth' => 210,
                         'labelAlign' => 'left',
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
                     'icon' => '',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
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
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'materialNumber',
                                     'title' => 'Material number',
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
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'EANCode',
                                     'title' => 'EAN Code',
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
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
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
                                        'classes' => 'IFSEUMaterialGroup',
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
                                     'width' => 250,
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                     'name' => 'countryOfOrigin',
                                     'title' => 'Country Of Origin',
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
                                        'classes' => 'IFSEUCountries',
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
                                     'width' => 250,
                                  )),
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
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
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
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
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
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
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
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
                                     'width' => 250,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                  )),
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
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
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  9 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'succesorFlag',
                                     'title' => 'Succesor / Supercession Flag',
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
                                     'width' => 250,
                                  )),
                                  10 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
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
                                     'width' => 250,
                                  )),
                                  11 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'rebateFlag',
                                     'title' => 'Rebate Flag',
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
                                     'width' => 250,
                                  )),
                                  12 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
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
                                        'key' => 'IFSEU',
                                        'value' => 'IFSEU',
                                      ),
                                    ),
                                     'defaultValue' => 'IFSEU',
                                     'columnLength' => 190,
                                     'dynamicOptions' => false,
                                     'defaultValueGenerator' => '',
                                     'width' => 250,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                  )),
                                  13 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'Spezi',
                                     'title' => 'Spezi ',
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
                                     'width' => 250,
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'oldMaterialCode',
                                     'title' => 'Old Material Code',
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
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'manufacturer',
                                     'title' => 'Manufacturer',
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
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'stccCode',
                                     'title' => 'STCC Code',
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
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'manufacturerPartNumber',
                                     'title' => 'Manufacturer Part Number',
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
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'returnFlag',
                                     'title' => 'Return Flag',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                     'width' => 250,
                                  )),
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                                     'name' => 'OutsidePurchaseFlag',
                                     'title' => 'Outside Purchase Identifier / Procurement Type',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                                     'name' => 'eHoseProduct',
                                     'title' => 'eHose Product',
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
                                     'defaultValueGenerator' => '',
                                  )),
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'CustomsTariffNumber',
                                     'title' => 'Customs Tariff Number',
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
                                     'width' => NULL,
                                     'defaultValueGenerator' => '',
                                  )),
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'b2BexternalID',
                                     'title' => 'B2B External ID',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'columnLength' => 32,
                                     'regex' => '',
                                     'regexFlags' => 
                                    array (
                                    ),
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'width' => NULL,
                                     'defaultValueGenerator' => '',
                                  )),
                                  9 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'sapDescriptionLanguage',
                                     'title' => 'SAP Description Language',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  10 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                         'name' => 'sapDescription',
                                         'title' => 'SAP Description',
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
                                         'maxLength' => NULL,
                                         'showCharCount' => false,
                                         'excludeFromSearchIndex' => false,
                                         'height' => 120,
                                         'width' => 250,
                                      )),
                                    ),
                                     'region' => NULL,
                                     'layout' => NULL,
                                     'maxTabs' => 35,
                                     'border' => false,
                                     'provideSplitView' => true,
                                     'tabPosition' => 'top',
                                     'hideLabelsWhenTabsReached' => NULL,
                                     'referencedFields' => 
                                    array (
                                    ),
                                     'permissionView' => NULL,
                                     'permissionEdit' => NULL,
                                     'labelWidth' => 210,
                                     'labelAlign' => 'left',
                                     'fieldDefinitionsCache' => NULL,
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
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
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
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
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
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
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
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'width' => 250,
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'name' => 'Field Container',
                                 'type' => NULL,
                                 'region' => NULL,
                                 'title' => '',
                                 'width' => 0,
                                 'height' => 0,
                                 'collapsible' => false,
                                 'collapsed' => false,
                                 'bodyStyle' => 'margin-left: 30px;',
                                 'datatype' => 'layout',
                                 'children' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'WeightLbsPerFTUOM',
                                     'title' => 'Weight_Lbs per ft - UOM',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;',
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
                                     'width' => 250,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'ProductType',
                                     'title' => 'Product Type',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;',
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
                                     'width' => 250,
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Packaging Attributes',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Additional Information',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Additional Information',
                         'width' => 950,
                         'height' => 0,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
                             'type' => NULL,
                             'region' => NULL,
                             'title' => 'ReadOnly In PIM',
                             'width' => 0,
                             'height' => 0,
                             'collapsible' => false,
                             'collapsed' => false,
                             'bodyStyle' => 'margin-left:10px;overflow-x: hidden;overflow-y: hidden;',
                             'datatype' => 'layout',
                             'children' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
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
                                     'maxItems' => NULL,
                                     'renderType' => 'tags',
                                     'dynamicOptions' => false,
                                     'height' => '',
                                     'width' => 220,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                                     'optionsProviderData' => 'conflictMinerals',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'additionalInformation',
                                     'title' => 'Additional Information',
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'substitutePartNumber',
                                     'title' => ' Substitute Part Number',
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
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
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
                     'icon' => '',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ReverseObjectRelation::__set_state(array(
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
                         'ownerClassName' => 'IFSEUSalesMaterialMaster',
                         'ownerClassId' => NULL,
                         'ownerFieldName' => 'Material',
                         'lazyLoading' => true,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ReverseObjectRelation::__set_state(array(
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
                         'ownerClassName' => 'IFSEUPlantMaterialMaster',
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Certifications',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Certifications',
                     'width' => 1000,
                     'height' => 480,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Certifications',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => 1000,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
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
                             'defaultValue' => '1',
                             'columnLength' => 850,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => 720,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                             'optionsProviderData' => 'rohs',
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
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
                             'defaultValue' => '1',
                             'columnLength' => 1000,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => 720,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                             'optionsProviderData' => 'reach',
                          )),
                          2 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyRelation::__set_state(array(
                             'name' => 'Gallery',
                             'title' => 'Gallery',
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
                             'maxItems' => NULL,
                             'assetInlineDownloadAllowed' => false,
                             'assetUploadPath' => '',
                             'allowToClearRelation' => true,
                             'objectsAllowed' => false,
                             'assetsAllowed' => true,
                             'assetTypes' => 
                            array (
                              0 => 
                              array (
                                'assetTypes' => 'document',
                              ),
                            ),
                             'documentsAllowed' => false,
                             'documentTypes' => 
                            array (
                            ),
                             'enableTextSelection' => false,
                             'width' => 920,
                             'height' => '',
                             'columns' => 
                            array (
                              0 => 
                              array (
                                'type' => 'text',
                                'position' => 1,
                                'key' => 'name',
                                'id' => 'extModel4590-1',
                                'label' => 'Document',
                              ),
                            ),
                             'columnKeys' => 
                            array (
                              0 => 'name',
                            ),
                             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ElementMetadata[]',
                             'optimizedAdminLoading' => false,
                             'enableBatchEdit' => false,
                             'allowMultipleAssignments' => false,
                          )),
                          3 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
                             'type' => NULL,
                             'region' => NULL,
                             'title' => '',
                             'width' => 0,
                             'height' => 0,
                             'collapsible' => false,
                             'collapsed' => false,
                             'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                             'datatype' => 'layout',
                             'children' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                     'name' => 'warningIcon',
                                     'title' => 'Warning Icon',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:105px;',
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
                                     'width' => 315,
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'californiaProposition65ChemicalName1',
                                     'title' => 'California Proposition 65 Chemical Name1',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;',
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
                                     'width' => 230,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                                     'optionsProviderData' => 'californiaProposition',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'californiaProposition65ChemicalName2',
                                     'title' => 'California Proposition 65 Chemical Name2',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;',
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
                                     'width' => 230,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                                     'optionsProviderData' => 'californiaProposition',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'name' => 'californiaProposition65ChemicalName3',
                                     'title' => 'California Proposition 65 Chemical Name3',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;',
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
                                     'width' => 230,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                                     'optionsProviderData' => 'californiaProposition',
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'nitrosamines',
                                     'title' => 'Nitrosamines',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;',
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
                                     'width' => 230,
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
                         'labelWidth' => 200,
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
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Pricing and Stock',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Pricing and Stock',
                     'width' => 1100,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'name' => 'Field Container',
                             'type' => NULL,
                             'region' => NULL,
                             'title' => '',
                             'width' => 1100,
                             'height' => 700,
                             'collapsible' => false,
                             'collapsed' => false,
                             'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                             'datatype' => 'layout',
                             'children' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'merchantDiscount',
                                     'title' => 'Merchant Discount',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-top:12px;',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'Discount',
                                     'title' => 'Discount',
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
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'GrossPrice',
                                     'title' => 'Gross Price',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'Department',
                                     'title' => 'Department',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'listPrice',
                                     'title' => 'List Price',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'additionalDiscount',
                                     'title' => 'Additional Discount',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'OnStock',
                                     'title' => 'On Stock',
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
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'name' => 'publishedOnline',
                                     'title' => 'Published Online',
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
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
                                     'name' => 'priceDate',
                                     'title' => 'Price Date',
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
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'Amount',
                                     'title' => 'Amount',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 45px;margin-top:10px;',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'ConnectionType',
                                     'title' => 'Connection Type',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
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
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'Note',
                                     'title' => 'Note',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
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
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'Currency',
                                     'title' => 'Currency',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
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
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'minimumQuantityUnit',
                                     'title' => 'Minimum Quantity Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
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
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'MinimumQuantityMeasurementUnit',
                                     'title' => 'Minimum Quantity Measurement Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
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
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'EHoseID',
                                     'title' => 'ID',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
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
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                     'name' => 'productionLength',
                                     'title' => 'Production Length',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
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
                                     'maxItems' => NULL,
                                     'renderType' => 'tags',
                                     'dynamicOptions' => false,
                                     'height' => '',
                                     'width' => 220,
                                     'optionsProviderType' => NULL,
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\ProductionLengthOptionsProvider',
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
                             'labelWidth' => 200,
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/input.svg',
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
             'layout' => '',
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_green.png',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Digital Assets',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Digital Assets',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Product Images',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'mainImage',
                         'title' => 'Main Image',
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
                         'width' => 400,
                         'height' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
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
                         'uploadPath' => '',
                         'width' => 400,
                         'height' => '',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
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
                         'width' => 400,
                         'height' => '',
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
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
                         'width' => 400,
                         'height' => '',
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
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
                         'width' => 400,
                         'height' => '',
                      )),
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'TeaserImage',
                         'title' => 'Teaser Image',
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
                         'width' => 400,
                         'height' => '',
                      )),
                      6 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ImageGallery::__set_state(array(
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
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
                         'width' => 400,
                         'height' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
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
                         'width' => 400,
                         'height' => '',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
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
                         'width' => 400,
                         'height' => '',
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
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
                         'width' => 400,
                         'height' => '',
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
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
                         'width' => 400,
                         'height' => '',
                      )),
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
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
                         'width' => 400,
                         'height' => '',
                      )),
                      6 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
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
                         'width' => 400,
                         'height' => '',
                      )),
                      7 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
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
                         'width' => 400,
                         'height' => '',
                      )),
                      8 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'certificationImage',
                         'title' => 'Certification Image',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
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
                         'pathFormatterClass' => '',
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
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'enableTextSelection' => false,
                         'width' => '',
                         'height' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
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
                         'pathFormatterClass' => 'AppBundle\\Formatter\\AssetFormatter',
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'LeftPrintCatalogImage',
                         'title' => 'Left Image',
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
                         'width' => 400,
                         'height' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'RightPrintCatalogImage',
                         'title' => 'Right Image',
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
                         'width' => 400,
                         'height' => '',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'name' => 'DrawingPictureForCatalog',
                         'title' => 'Drawing Picture',
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
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Certification',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Certification',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyRelation::__set_state(array(
                         'name' => 'Certificate1',
                         'title' => 'Certificate 1',
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
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'enableTextSelection' => false,
                         'width' => '',
                         'height' => '',
                         'columns' => 
                        array (
                          0 => 
                          array (
                            'type' => 'text',
                            'position' => 1,
                            'key' => 'DrawingNumber',
                            'id' => 'extModel2946-1',
                            'label' => 'Drawing Number',
                          ),
                          1 => 
                          array (
                            'type' => 'number',
                            'position' => 2,
                            'key' => 'DrawingRevisionNumber',
                            'id' => 'extModel2946-2',
                            'label' => 'Drawing Revision number',
                          ),
                          2 => 
                          array (
                            'type' => 'text',
                            'position' => 3,
                            'key' => 'DrawingRevisionDate',
                            'id' => 'extModel2946-3',
                            'label' => 'Drawing Revision Date',
                            'width' => NULL,
                          ),
                          3 => 
                          array (
                            'type' => 'bool',
                            'position' => 4,
                            'key' => 'CertificationDocument',
                            'id' => 'extModel7263-1',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyRelation::__set_state(array(
                         'name' => 'Certificate2',
                         'title' => 'Certificate 2',
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
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'enableTextSelection' => false,
                         'width' => '',
                         'height' => '',
                         'columns' => 
                        array (
                          0 => 
                          array (
                            'type' => 'text',
                            'position' => 1,
                            'key' => 'DrawingNumber',
                            'id' => 'extModel2946-1',
                            'label' => 'Drawing Number',
                          ),
                          1 => 
                          array (
                            'type' => 'number',
                            'position' => 2,
                            'key' => 'DrawingRevisionNumber',
                            'id' => 'extModel2946-2',
                            'label' => 'Drawing Revision number',
                          ),
                          2 => 
                          array (
                            'type' => 'text',
                            'position' => 3,
                            'key' => 'DrawingRevisionDate',
                            'id' => 'extModel2946-3',
                            'label' => 'Drawing Revision Date',
                            'width' => NULL,
                          ),
                          3 => 
                          array (
                            'type' => 'bool',
                            'position' => 4,
                            'key' => 'CertificationDocument',
                            'id' => 'extModel7263-1',
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
             'layout' => '',
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/image-region.svg',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Table::__set_state(array(
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
                 'cols' => 8,
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
                  7 => 
                  array (
                    'key' => 7,
                    'label' => 'Condition Type',
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
             'layout' => '',
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/currency_exchange.svg',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          5 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'CompletenessPercentage',
                     'title' => 'Completeness Percentage',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'EmptyFields',
                     'title' => 'Empty Fields',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
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
                 'provideSplitView' => true,
                 'tabPosition' => 'top',
                 'hideLabelsWhenTabsReached' => NULL,
                 'referencedFields' => 
                array (
                ),
                 'permissionView' => NULL,
                 'permissionEdit' => NULL,
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
                 'fieldDefinitionsCache' => NULL,
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => '',
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
   'group' => 'IFSEU_ProductData',
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
