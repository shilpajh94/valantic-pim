<?php 

/** 
* Generated at: 2023-04-20T12:14:14+02:00
* Inheritance: yes
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- productBrandName [select]
- brandConstruction [select]
- catalogLayline [input]
- Category [select]
- Sub_Category [select]
- FeaturesBenefitsBulletPoint [multiselect]
- TPCode [input]
- localizedfields [localizedfields]
-- headlineWeb [input]
-- legalText [input]
-- BrandShortText1 [input]
-- BrandShortText2 [input]
-- Marking2 [input]
-- searchKeywords [multiselect]
-- commercialDescription [wysiwyg]
-- technicalDescription [wysiwyg]
-- sapDescription [textarea]
-- shippingConditions [input]
-- Conditions [input]
-- manufacturingLength [input]
-- minimumOrder [input]
-- CompletenessPercentage [input]
-- EmptyFields [textarea]
- Base [objectbricks]
- minimumTemperatureC [numeric]
- maximumTemperatureC [numeric]
- rangeTemperatureF [input]
- rangeTemperatureC [input]
- temperatureRangeApplication [input]
- temperatureRangeApplication1 [input]
- temperatureRangeApplication2 [input]
- temporaryUntilC [numeric]
- DampableUntil1C [numeric]
- DampableUntil2C [numeric]
- justTemporarily [booleanSelect]
- DampableUntil1T [numeric]
- DampableUntil2T [numeric]
- minimumTemperatureF [numeric]
- maximumTemperatureF [numeric]
- temperatureRangeFAndC [input]
- temperatureNote [input]
- temperatureRangeApplicationFAndC1 [input]
- temperatureRangeApplicationFAndC2 [input]
- temperatureRangeApplicationFAndC3 [input]
- temperatureRangeApplicationFAndC4 [input]
- temperatureRangeApplicationFAndC5 [input]
- temporaryUntilT [numeric]
- onlyOpenSystem [booleanSelect]
- PressureUntil [numeric]
- siopFullCode [input]
- SIOPLevel1 [manyToManyObjectRelation]
- SIOPLevel2 [manyToManyObjectRelation]
- SIOPLevel3 [manyToManyObjectRelation]
- SIOPLevel4 [manyToManyObjectRelation]
- SIOPLevel5 [manyToManyObjectRelation]
- SIOPLevel6 [manyToManyObjectRelation]
- SIOPLevel7 [manyToManyObjectRelation]
- Skeleton [objectbricks]
- B2CCategory [manyToManyObjectRelation]
- printedCatalogFlag [booleanSelect]
- B2CStoreFlag [booleanSelect]
- virtualCatalogFlag [booleanSelect]
- newItemFlagForCatalog [booleanSelect]
- webDescription [input]
- WebsiteLink [input]
- amazonTitle [input]
- materialNumber [input]
- EANCode [input]
- materialGroup [manyToOneRelation]
- countryOfOrigin [manyToOneRelation]
- baseUOM [input]
- grossWeight [numeric]
- netWeight [numeric]
- weightUnit [select]
- industryStandard [input]
- succesorFlag [booleanSelect]
- deletedFlagAtClientLevel [booleanSelect]
- rebateFlag [booleanSelect]
- BusinessUnit [select]
- Spezi [input]
- oldMaterialCode [input]
- manufacturer [input]
- stccCode [input]
- manufacturerPartNumber [input]
- returnFlag [booleanSelect]
- OutsidePurchaseFlag [checkbox]
- CustomsTariffNumber [input]
- b2BexternalID [input]
- sapDescriptionLanguage [input]
- weightg [numeric]
- weightKg [numeric]
- WeightLbsPerFTUOM [input]
- ProductType [select]
- shelfLife [input]
- ConflictMinerals [multiselect]
- additionalInformation [input]
- substitutePartNumber [input]
- numberOfItems [numeric]
- UnitsInPackage [input]
- SalesOrgData [reverseManyToManyObjectRelation]
- Plants [reverseManyToManyObjectRelation]
- rohs [select]
- reach [select]
- proposition65WarningAttributesRequired [booleanSelect]
- prop65Message [textarea]
- warningIcon [image]
- californiaProposition65ChemicalName1 [select]
- californiaProposition65ChemicalName2 [select]
- californiaProposition65ChemicalName3 [select]
- nitrosamines [input]
- Gallery [advancedManyToManyRelation]
- merchantDiscount [input]
- Discount [input]
- GrossPrice [input]
- Department [input]
- listPrice [input]
- productLength [numeric]
- ProductLengthUnit [input]
- OnStock [booleanSelect]
- productionLength [textarea]
- Amount [input]
- ConnectionType [input]
- Note [input]
- Currency [input]
- priceDate [input]
- minimumQuantityUnit [input]
- MinimumQuantityMeasurementUnit [input]
- EHoseID [input]
- publishedOnline [booleanSelect]
- mainImage [image]
- frontView [image]
- sideView [image]
- cutView [image]
- epixImage [image]
- TeaserImage [image]
- Images360 [imageGallery]
- altImage1 [image]
- altImage2 [image]
- altImage3 [image]
- altImage4 [image]
- altImage5 [image]
- altImage6 [image]
- altImage7 [image]
- altImage8 [image]
- certificationImage [image]
- video1 [video]
- video2 [video]
- video3 [video]
- Document [advancedManyToManyRelation]
- BrandingLaylineAssets [manyToManyRelation]
- LeftPrintCatalogImage [image]
- RightPrintCatalogImage [image]
- DrawingPictureForCatalog [image]
- Certificate1 [advancedManyToManyRelation]
- Certificate2 [advancedManyToManyRelation]
- priceData [table]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'IFSEUProduct',
   'name' => 'IFSEUProduct',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1681985640,
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
         'region' => '',
         'title' => '',
         'width' => NULL,
         'height' => NULL,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
         'datatype' => 'layout',
         'permissions' => NULL,
         'childs' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => 'fit',
             'border' => false,
             'name' => 'Base',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Brand Data',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
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
                 'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'childs' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => '',
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
                         'labelWidth' => 220,
                         'name' => 'hoseBaseData',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Hose Base Data',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'AIR TRIXÂ®',
                                        'value' => 15248410,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'AQUAPALÂ® DB',
                                        'value' => 15248471,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'AQUAPALÂ® NEW VERSION',
                                        'value' => 15248472,
                                      ),
                                      3 => 
                                      array (
                                        'key' => 'BLAUDIECKÂ® Fitting system',
                                        'value' => 15248437,
                                      ),
                                      4 => 
                                      array (
                                        'key' => 'BLAUDIECKÂ® LGD',
                                        'value' => 15248438,
                                      ),
                                      5 => 
                                      array (
                                        'key' => 'BLAUDIECKÂ® LGDS',
                                        'value' => 15248439,
                                      ),
                                      6 => 
                                      array (
                                        'key' => 'BLAUDIECKÂ® LGDSU',
                                        'value' => 15248440,
                                      ),
                                      7 => 
                                      array (
                                        'key' => 'BLAUDIECKÂ® LGDU',
                                        'value' => 15248441,
                                      ),
                                      8 => 
                                      array (
                                        'key' => 'COLLECTORÂ®',
                                        'value' => 15248442,
                                      ),
                                      9 => 
                                      array (
                                        'key' => 'COLLECTORÂ® FLEX',
                                        'value' => 15248443,
                                      ),
                                      10 => 
                                      array (
                                        'key' => 'CONTI ALLCRETEÂ® PRO TEXTILE',
                                        'value' => 15248418,
                                      ),
                                      11 => 
                                      array (
                                        'key' => 'CONTI ALLCRETEÂ® PRO WIRE',
                                        'value' => 15248419,
                                      ),
                                      12 => 
                                      array (
                                        'key' => 'CONTIÂ® BLUE STEAM',
                                        'value' => 15248444,
                                      ),
                                      13 => 
                                      array (
                                        'key' => 'CONTIÂ® Breathing air hose Plus',
                                        'value' => 15248411,
                                      ),
                                      14 => 
                                      array (
                                        'key' => 'CONTIÂ® CEMENT SILO',
                                        'value' => 15248420,
                                      ),
                                      15 => 
                                      array (
                                        'key' => 'CONTIÂ® CLEANJET - FDA',
                                        'value' => 15248445,
                                      ),
                                      16 => 
                                      array (
                                        'key' => 'CONTIÂ® FOOD & DRINK FLEX EPDM',
                                        'value' => 15248446,
                                      ),
                                      17 => 
                                      array (
                                        'key' => 'CONTIÂ® FOOD & DRINK FLEX UPE',
                                        'value' => 15248447,
                                      ),
                                      18 => 
                                      array (
                                        'key' => 'CONTIÂ® Fire hose CO',
                                        'value' => 15248405,
                                      ),
                                      19 => 
                                      array (
                                        'key' => 'CONTIÂ® Flux hose - blue',
                                        'value' => 15248426,
                                      ),
                                      20 => 
                                      array (
                                        'key' => 'CONTIÂ® Flux hose - red',
                                        'value' => 15248427,
                                      ),
                                      21 => 
                                      array (
                                        'key' => 'CONTIÂ® Hot air compressor hose',
                                        'value' => 15248412,
                                      ),
                                      22 => 
                                      array (
                                        'key' => 'CONTIÂ® L5L-1',
                                        'value' => 15248460,
                                      ),
                                      23 => 
                                      array (
                                        'key' => 'CONTIÂ® L5L-2',
                                        'value' => 15248461,
                                      ),
                                      24 => 
                                      array (
                                        'key' => 'CONTIÂ® M1L-OLN',
                                        'value' => 15248462,
                                      ),
                                      25 => 
                                      array (
                                        'key' => 'CONTIÂ® M1L-OLNW',
                                        'value' => 15248463,
                                      ),
                                      26 => 
                                      array (
                                        'key' => 'CONTIÂ® M4M-2',
                                        'value' => 15248464,
                                      ),
                                      27 => 
                                      array (
                                        'key' => 'CONTIÂ® M4M-2H',
                                        'value' => 15248465,
                                      ),
                                      28 => 
                                      array (
                                        'key' => 'CONTIÂ® OLNC',
                                        'value' => 15248466,
                                      ),
                                      29 => 
                                      array (
                                        'key' => 'CONTIÂ® PREMIUM SUCTION SD',
                                        'value' => 15248421,
                                      ),
                                      30 => 
                                      array (
                                        'key' => 'CONTIÂ® Paint spray hose PA',
                                        'value' => 15248406,
                                      ),
                                      31 => 
                                      array (
                                        'key' => 'CONTIÂ® Radiator Flex',
                                        'value' => 15248473,
                                      ),
                                      32 => 
                                      array (
                                        'key' => 'CONTIÂ® Radiator Flex - 2.000 mm',
                                        'value' => 15248474,
                                      ),
                                      33 => 
                                      array (
                                        'key' => 'CONTIÂ® SILO AIRXTREME',
                                        'value' => 15248413,
                                      ),
                                      34 => 
                                      array (
                                        'key' => 'CONTIÂ® SILO FOOD',
                                        'value' => 15248448,
                                      ),
                                      35 => 
                                      array (
                                        'key' => 'CONTIÂ® TWIN AUTOGEN',
                                        'value' => 15248428,
                                      ),
                                      36 => 
                                      array (
                                        'key' => 'CONTIÂ® Tar spray hose',
                                        'value' => 15248407,
                                      ),
                                      37 => 
                                      array (
                                        'key' => 'CONTIÂ® ULTIMATE',
                                        'value' => 15248422,
                                      ),
                                      38 => 
                                      array (
                                        'key' => 'CONTIÂ® ULTIMATE - Flange',
                                        'value' => 15248423,
                                      ),
                                      39 => 
                                      array (
                                        'key' => 'CONTIÂ® ULTIMATE CONDUCTIVE',
                                        'value' => 15248424,
                                      ),
                                      40 => 
                                      array (
                                        'key' => 'CONTIÂ® ULTIMATE Gasket',
                                        'value' => 15248425,
                                      ),
                                      41 => 
                                      array (
                                        'key' => 'Customized',
                                        'value' => 15248481,
                                      ),
                                      42 => 
                                      array (
                                        'key' => 'DAMPF TRIXÂ® 5000',
                                        'value' => 15248467,
                                      ),
                                      43 => 
                                      array (
                                        'key' => 'DAMPF TRIXÂ® 6000',
                                        'value' => 15248468,
                                      ),
                                      44 => 
                                      array (
                                        'key' => 'DAMPF TRIXÂ® 6000 OIL',
                                        'value' => 15248469,
                                      ),
                                      45 => 
                                      array (
                                        'key' => 'EURO TRIXÂ®',
                                        'value' => 15248475,
                                      ),
                                      46 => 
                                      array (
                                        'key' => 'GOLD SNAKEÂ®',
                                        'value' => 15248476,
                                      ),
                                      47 => 
                                      array (
                                        'key' => 'LACTOPALÂ®',
                                        'value' => 15248449,
                                      ),
                                      48 => 
                                      array (
                                        'key' => 'LACTOPALÂ® L',
                                        'value' => 15248450,
                                      ),
                                      49 => 
                                      array (
                                        'key' => 'PAGUCLAMPÂ® Fitting system',
                                        'value' => 15248451,
                                      ),
                                      50 => 
                                      array (
                                        'key' => 'PAGUFIXÂ® Fitting system',
                                        'value' => 15248452,
                                      ),
                                      51 => 
                                      array (
                                        'key' => 'PARKINGÂ®',
                                        'value' => 15248414,
                                      ),
                                      52 => 
                                      array (
                                        'key' => 'PHX Acetylene hose - red',
                                        'value' => 15248429,
                                      ),
                                      53 => 
                                      array (
                                        'key' => 'PHX Oxygen hose - blue',
                                        'value' => 15248430,
                                      ),
                                      54 => 
                                      array (
                                        'key' => 'PURPURSCHLANGEÂ®',
                                        'value' => 15248453,
                                      ),
                                      55 => 
                                      array (
                                        'key' => 'PURPURSCHLANGEÂ® PLUS CONDUCTIVE',
                                        'value' => 15248454,
                                      ),
                                      56 => 
                                      array (
                                        'key' => 'Rubber protection ring',
                                        'value' => 15248455,
                                      ),
                                      57 => 
                                      array (
                                        'key' => 'THERMIDORÂ®',
                                        'value' => 15248477,
                                      ),
                                      58 => 
                                      array (
                                        'key' => 'TRIX BLAUSTRAHLÂ®',
                                        'value' => 15248415,
                                      ),
                                      59 => 
                                      array (
                                        'key' => 'TRIX ROTSTRAHLÂ®',
                                        'value' => 15248478,
                                      ),
                                      60 => 
                                      array (
                                        'key' => 'TRIXÂ® AUTOGEN - black',
                                        'value' => 15248432,
                                      ),
                                      61 => 
                                      array (
                                        'key' => 'TRIXÂ® Acetylene hose - red',
                                        'value' => 15248431,
                                      ),
                                      62 => 
                                      array (
                                        'key' => 'TRIXÂ® Brake hose',
                                        'value' => 15248416,
                                      ),
                                      63 => 
                                      array (
                                        'key' => 'TRIXÂ® Breathing air hose',
                                        'value' => 15248417,
                                      ),
                                      64 => 
                                      array (
                                        'key' => 'TRIXÂ® High pressure hose',
                                        'value' => 15248479,
                                      ),
                                      65 => 
                                      array (
                                        'key' => 'TRIXÂ® MULTIFOOD - blue',
                                        'value' => 15248456,
                                      ),
                                      66 => 
                                      array (
                                        'key' => 'TRIXÂ® MULTIFOOD - white',
                                        'value' => 15248457,
                                      ),
                                      67 => 
                                      array (
                                        'key' => 'TRIXÂ® Nitrogen hose',
                                        'value' => 15248433,
                                      ),
                                      68 => 
                                      array (
                                        'key' => 'TRIXÂ® Oxygen hose - blue',
                                        'value' => 15248434,
                                      ),
                                      69 => 
                                      array (
                                        'key' => 'TRIXÂ® Paint spray hose EPDM',
                                        'value' => 15248408,
                                      ),
                                      70 => 
                                      array (
                                        'key' => 'TRIXÂ® Paint spray hose NBR',
                                        'value' => 15248409,
                                      ),
                                      71 => 
                                      array (
                                        'key' => 'TRIXÂ® Propane gas hose',
                                        'value' => 15248435,
                                      ),
                                      72 => 
                                      array (
                                        'key' => 'TRIXÂ® SUPER',
                                        'value' => 15248480,
                                      ),
                                      73 => 
                                      array (
                                        'key' => 'TRIXÂ® Universal fuel gas hose',
                                        'value' => 15248436,
                                      ),
                                      74 => 
                                      array (
                                        'key' => 'UNITRIXÂ® 60',
                                        'value' => 15248458,
                                      ),
                                      75 => 
                                      array (
                                        'key' => 'UNITRIXÂ® 80',
                                        'value' => 15248459,
                                      ),
                                      76 => 
                                      array (
                                        'key' => 'Water-saving gun DINGAÂ®',
                                        'value' => 15248470,
                                      ),
                                    ),
                                     'width' => 300,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\BrandOptionProvider',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'productBrandName',
                                     'title' => 'Product Brand Name',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'AIR TRIXÂ®',
                                        'value' => 15248410,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'AQUAPALÂ® DB',
                                        'value' => 15248471,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'AQUAPALÂ® NEW VERSION',
                                        'value' => 15248472,
                                      ),
                                      3 => 
                                      array (
                                        'key' => 'BLAUDIECKÂ® Fitting system',
                                        'value' => 15248437,
                                      ),
                                      4 => 
                                      array (
                                        'key' => 'BLAUDIECKÂ® LGD',
                                        'value' => 15248438,
                                      ),
                                      5 => 
                                      array (
                                        'key' => 'BLAUDIECKÂ® LGDS',
                                        'value' => 15248439,
                                      ),
                                      6 => 
                                      array (
                                        'key' => 'BLAUDIECKÂ® LGDSU',
                                        'value' => 15248440,
                                      ),
                                      7 => 
                                      array (
                                        'key' => 'BLAUDIECKÂ® LGDU',
                                        'value' => 15248441,
                                      ),
                                      8 => 
                                      array (
                                        'key' => 'COLLECTORÂ®',
                                        'value' => 15248442,
                                      ),
                                      9 => 
                                      array (
                                        'key' => 'COLLECTORÂ® FLEX',
                                        'value' => 15248443,
                                      ),
                                      10 => 
                                      array (
                                        'key' => 'CONTI ALLCRETEÂ® PRO TEXTILE',
                                        'value' => 15248418,
                                      ),
                                      11 => 
                                      array (
                                        'key' => 'CONTI ALLCRETEÂ® PRO WIRE',
                                        'value' => 15248419,
                                      ),
                                      12 => 
                                      array (
                                        'key' => 'CONTIÂ® BLUE STEAM',
                                        'value' => 15248444,
                                      ),
                                      13 => 
                                      array (
                                        'key' => 'CONTIÂ® Breathing air hose Plus',
                                        'value' => 15248411,
                                      ),
                                      14 => 
                                      array (
                                        'key' => 'CONTIÂ® CEMENT SILO',
                                        'value' => 15248420,
                                      ),
                                      15 => 
                                      array (
                                        'key' => 'CONTIÂ® CLEANJET - FDA',
                                        'value' => 15248445,
                                      ),
                                      16 => 
                                      array (
                                        'key' => 'CONTIÂ® FOOD & DRINK FLEX EPDM',
                                        'value' => 15248446,
                                      ),
                                      17 => 
                                      array (
                                        'key' => 'CONTIÂ® FOOD & DRINK FLEX UPE',
                                        'value' => 15248447,
                                      ),
                                      18 => 
                                      array (
                                        'key' => 'CONTIÂ® Fire hose CO',
                                        'value' => 15248405,
                                      ),
                                      19 => 
                                      array (
                                        'key' => 'CONTIÂ® Flux hose - blue',
                                        'value' => 15248426,
                                      ),
                                      20 => 
                                      array (
                                        'key' => 'CONTIÂ® Flux hose - red',
                                        'value' => 15248427,
                                      ),
                                      21 => 
                                      array (
                                        'key' => 'CONTIÂ® Hot air compressor hose',
                                        'value' => 15248412,
                                      ),
                                      22 => 
                                      array (
                                        'key' => 'CONTIÂ® L5L-1',
                                        'value' => 15248460,
                                      ),
                                      23 => 
                                      array (
                                        'key' => 'CONTIÂ® L5L-2',
                                        'value' => 15248461,
                                      ),
                                      24 => 
                                      array (
                                        'key' => 'CONTIÂ® M1L-OLN',
                                        'value' => 15248462,
                                      ),
                                      25 => 
                                      array (
                                        'key' => 'CONTIÂ® M1L-OLNW',
                                        'value' => 15248463,
                                      ),
                                      26 => 
                                      array (
                                        'key' => 'CONTIÂ® M4M-2',
                                        'value' => 15248464,
                                      ),
                                      27 => 
                                      array (
                                        'key' => 'CONTIÂ® M4M-2H',
                                        'value' => 15248465,
                                      ),
                                      28 => 
                                      array (
                                        'key' => 'CONTIÂ® OLNC',
                                        'value' => 15248466,
                                      ),
                                      29 => 
                                      array (
                                        'key' => 'CONTIÂ® PREMIUM SUCTION SD',
                                        'value' => 15248421,
                                      ),
                                      30 => 
                                      array (
                                        'key' => 'CONTIÂ® Paint spray hose PA',
                                        'value' => 15248406,
                                      ),
                                      31 => 
                                      array (
                                        'key' => 'CONTIÂ® Radiator Flex',
                                        'value' => 15248473,
                                      ),
                                      32 => 
                                      array (
                                        'key' => 'CONTIÂ® Radiator Flex - 2.000 mm',
                                        'value' => 15248474,
                                      ),
                                      33 => 
                                      array (
                                        'key' => 'CONTIÂ® SILO AIRXTREME',
                                        'value' => 15248413,
                                      ),
                                      34 => 
                                      array (
                                        'key' => 'CONTIÂ® SILO FOOD',
                                        'value' => 15248448,
                                      ),
                                      35 => 
                                      array (
                                        'key' => 'CONTIÂ® TWIN AUTOGEN',
                                        'value' => 15248428,
                                      ),
                                      36 => 
                                      array (
                                        'key' => 'CONTIÂ® Tar spray hose',
                                        'value' => 15248407,
                                      ),
                                      37 => 
                                      array (
                                        'key' => 'CONTIÂ® ULTIMATE',
                                        'value' => 15248422,
                                      ),
                                      38 => 
                                      array (
                                        'key' => 'CONTIÂ® ULTIMATE - Flange',
                                        'value' => 15248423,
                                      ),
                                      39 => 
                                      array (
                                        'key' => 'CONTIÂ® ULTIMATE CONDUCTIVE',
                                        'value' => 15248424,
                                      ),
                                      40 => 
                                      array (
                                        'key' => 'CONTIÂ® ULTIMATE Gasket',
                                        'value' => 15248425,
                                      ),
                                      41 => 
                                      array (
                                        'key' => 'Customized',
                                        'value' => 15248481,
                                      ),
                                      42 => 
                                      array (
                                        'key' => 'DAMPF TRIXÂ® 5000',
                                        'value' => 15248467,
                                      ),
                                      43 => 
                                      array (
                                        'key' => 'DAMPF TRIXÂ® 6000',
                                        'value' => 15248468,
                                      ),
                                      44 => 
                                      array (
                                        'key' => 'DAMPF TRIXÂ® 6000 OIL',
                                        'value' => 15248469,
                                      ),
                                      45 => 
                                      array (
                                        'key' => 'EURO TRIXÂ®',
                                        'value' => 15248475,
                                      ),
                                      46 => 
                                      array (
                                        'key' => 'GOLD SNAKEÂ®',
                                        'value' => 15248476,
                                      ),
                                      47 => 
                                      array (
                                        'key' => 'LACTOPALÂ®',
                                        'value' => 15248449,
                                      ),
                                      48 => 
                                      array (
                                        'key' => 'LACTOPALÂ® L',
                                        'value' => 15248450,
                                      ),
                                      49 => 
                                      array (
                                        'key' => 'PAGUCLAMPÂ® Fitting system',
                                        'value' => 15248451,
                                      ),
                                      50 => 
                                      array (
                                        'key' => 'PAGUFIXÂ® Fitting system',
                                        'value' => 15248452,
                                      ),
                                      51 => 
                                      array (
                                        'key' => 'PARKINGÂ®',
                                        'value' => 15248414,
                                      ),
                                      52 => 
                                      array (
                                        'key' => 'PHX Acetylene hose - red',
                                        'value' => 15248429,
                                      ),
                                      53 => 
                                      array (
                                        'key' => 'PHX Oxygen hose - blue',
                                        'value' => 15248430,
                                      ),
                                      54 => 
                                      array (
                                        'key' => 'PURPURSCHLANGEÂ®',
                                        'value' => 15248453,
                                      ),
                                      55 => 
                                      array (
                                        'key' => 'PURPURSCHLANGEÂ® PLUS CONDUCTIVE',
                                        'value' => 15248454,
                                      ),
                                      56 => 
                                      array (
                                        'key' => 'Rubber protection ring',
                                        'value' => 15248455,
                                      ),
                                      57 => 
                                      array (
                                        'key' => 'THERMIDORÂ®',
                                        'value' => 15248477,
                                      ),
                                      58 => 
                                      array (
                                        'key' => 'TRIX BLAUSTRAHLÂ®',
                                        'value' => 15248415,
                                      ),
                                      59 => 
                                      array (
                                        'key' => 'TRIX ROTSTRAHLÂ®',
                                        'value' => 15248478,
                                      ),
                                      60 => 
                                      array (
                                        'key' => 'TRIXÂ® AUTOGEN - black',
                                        'value' => 15248432,
                                      ),
                                      61 => 
                                      array (
                                        'key' => 'TRIXÂ® Acetylene hose - red',
                                        'value' => 15248431,
                                      ),
                                      62 => 
                                      array (
                                        'key' => 'TRIXÂ® Brake hose',
                                        'value' => 15248416,
                                      ),
                                      63 => 
                                      array (
                                        'key' => 'TRIXÂ® Breathing air hose',
                                        'value' => 15248417,
                                      ),
                                      64 => 
                                      array (
                                        'key' => 'TRIXÂ® High pressure hose',
                                        'value' => 15248479,
                                      ),
                                      65 => 
                                      array (
                                        'key' => 'TRIXÂ® MULTIFOOD - blue',
                                        'value' => 15248456,
                                      ),
                                      66 => 
                                      array (
                                        'key' => 'TRIXÂ® MULTIFOOD - white',
                                        'value' => 15248457,
                                      ),
                                      67 => 
                                      array (
                                        'key' => 'TRIXÂ® Nitrogen hose',
                                        'value' => 15248433,
                                      ),
                                      68 => 
                                      array (
                                        'key' => 'TRIXÂ® Oxygen hose - blue',
                                        'value' => 15248434,
                                      ),
                                      69 => 
                                      array (
                                        'key' => 'TRIXÂ® Paint spray hose EPDM',
                                        'value' => 15248408,
                                      ),
                                      70 => 
                                      array (
                                        'key' => 'TRIXÂ® Paint spray hose NBR',
                                        'value' => 15248409,
                                      ),
                                      71 => 
                                      array (
                                        'key' => 'TRIXÂ® Propane gas hose',
                                        'value' => 15248435,
                                      ),
                                      72 => 
                                      array (
                                        'key' => 'TRIXÂ® SUPER',
                                        'value' => 15248480,
                                      ),
                                      73 => 
                                      array (
                                        'key' => 'TRIXÂ® Universal fuel gas hose',
                                        'value' => 15248436,
                                      ),
                                      74 => 
                                      array (
                                        'key' => 'UNITRIXÂ® 60',
                                        'value' => 15248458,
                                      ),
                                      75 => 
                                      array (
                                        'key' => 'UNITRIXÂ® 80',
                                        'value' => 15248459,
                                      ),
                                      76 => 
                                      array (
                                        'key' => 'Water-saving gun DINGAÂ®',
                                        'value' => 15248470,
                                      ),
                                    ),
                                     'width' => 300,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\BrandOptionProvider',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'brandConstruction',
                                     'title' => 'Brand Construction',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                     'name' => 'catalogLayline',
                                     'title' => 'Catalog Layline',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'FBWM - Food',
                                        'value' => 15244793,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'FCHA - Fitting',
                                        'value' => 15244794,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'MBM - Machine Building & Manufacturing',
                                        'value' => 15244790,
                                      ),
                                      3 => 
                                      array (
                                        'key' => 'PCH - Fuels & Chemicals',
                                        'value' => 15244792,
                                      ),
                                      4 => 
                                      array (
                                        'key' => 'SMH - Solid & Material Handling',
                                        'value' => 15244791,
                                      ),
                                    ),
                                     'width' => 300,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\CategoryOptionsProvider',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'Category',
                                     'title' => 'Category',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                        'key' => 'Abrasive',
                                        'value' => 15244718,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Accessories',
                                        'value' => 15244728,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'Air & Gas',
                                        'value' => 15244717,
                                      ),
                                      3 => 
                                      array (
                                        'key' => 'Chemical',
                                        'value' => 15244719,
                                      ),
                                      4 => 
                                      array (
                                        'key' => 'Engines',
                                        'value' => 15244721,
                                      ),
                                      5 => 
                                      array (
                                        'key' => 'Fitting & Coupling',
                                        'value' => 15244727,
                                      ),
                                      6 => 
                                      array (
                                        'key' => 'Food & Beverage',
                                        'value' => 15244723,
                                      ),
                                      7 => 
                                      array (
                                        'key' => 'Industrial Cooling',
                                        'value' => 15244726,
                                      ),
                                      8 => 
                                      array (
                                        'key' => 'Potable Water',
                                        'value' => 15244724,
                                      ),
                                      9 => 
                                      array (
                                        'key' => 'Railway',
                                        'value' => 15244722,
                                      ),
                                      10 => 
                                      array (
                                        'key' => 'Steam',
                                        'value' => 15244720,
                                      ),
                                      11 => 
                                      array (
                                        'key' => 'Water ',
                                        'value' => 15244725,
                                      ),
                                    ),
                                     'width' => 300,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\SubCategoryOptionsProvider',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'Sub_Category',
                                     'title' => 'Sub-Category',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                     'fieldtype' => 'multiselect',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => '1/2” female thread',
                                        'value' => 15240323,
                                      ),
                                      1 => 
                                      array (
                                        'key' => '  10<sup>3</sup> Ω < R < 10<sup>8</sup> Ω ',
                                        'value' => 15240263,
                                      ),
                                      2 => 
                                      array (
                                        'key' => ' 16 bar 232 psi (Wasser)',
                                        'value' => 15240357,
                                      ),
                                      3 => 
                                      array (
                                        'key' => '2 bis 0',
                                        'value' => 15240440,
                                      ),
                                      4 => 
                                      array (
                                        'key' => '2 years warranty',
                                        'value' => 15240254,
                                      ),
                                      5 => 
                                      array (
                                        'key' => '2% Feuchtigkeit)',
                                        'value' => 15240431,
                                      ),
                                      6 => 
                                      array (
                                        'key' => '3 years warranty',
                                        'value' => 15240272,
                                      ),
                                      7 => 
                                      array (
                                        'key' => ' 3/4’’ und 1’’',
                                        'value' => 15240322,
                                      ),
                                      8 => 
                                      array (
                                        'key' => ' 4 Schrauben und 4 Muttern',
                                        'value' => 15240396,
                                      ),
                                      9 => 
                                      array (
                                        'key' => '5 years warranty',
                                        'value' => 15240260,
                                      ),
                                      10 => 
                                      array (
                                        'key' => '5B (150lbs)',
                                        'value' => 15240384,
                                      ),
                                      11 => 
                                      array (
                                        'key' => '6 g/cm3',
                                        'value' => 15240407,
                                      ),
                                      12 => 
                                      array (
                                        'key' => 'A version compliant with §10 BVOSt (previously LOBA) is also available',
                                        'value' => 15240285,
                                      ),
                                      13 => 
                                      array (
                                        'key' => 'Absolutely neutral to taste and odour',
                                        'value' => 15240238,
                                      ),
                                      14 => 
                                      array (
                                        'key' => 'Ageing resistant',
                                        'value' => 15240255,
                                      ),
                                      15 => 
                                      array (
                                        'key' => ' Allgemeintoleranzen nach DIN ISO 3302-1 EN2',
                                        'value' => 15240309,
                                      ),
                                      16 => 
                                      array (
                                        'key' => 'Anti UV',
                                        'value' => 15240418,
                                      ),
                                      17 => 
                                      array (
                                        'key' => 'Antistatic',
                                        'value' => 15240419,
                                      ),
                                      18 => 
                                      array (
                                        'key' => 'Approved by Deutsche Bahn AG',
                                        'value' => 15240370,
                                      ),
                                      19 => 
                                      array (
                                        'key' => 'Aromatic content up to 50%',
                                        'value' => 15240344,
                                      ),
                                      20 => 
                                      array (
                                        'key' => 'Available also with outside steel braiding',
                                        'value' => 15240393,
                                      ),
                                      21 => 
                                      array (
                                        'key' => 'Base hose OLNH 22 65',
                                        'value' => 15240366,
                                      ),
                                      22 => 
                                      array (
                                        'key' => 'Bend radius up to 1/2 that of SAE',
                                        'value' => 15240348,
                                      ),
                                      23 => 
                                      array (
                                        'key' => 'Bolt Circle Standard DIN: PN10 / ANSI: 150 lbs',
                                        'value' => 15240385,
                                      ),
                                      24 => 
                                      array (
                                        'key' => ' Brom und Sulfurichlorid',
                                        'value' => 15240317,
                                      ),
                                      25 => 
                                      array (
                                        'key' => ' CONTI® ULTIMATE CONDUCTIVE und CONTI® ULTIMATE Dichtung',
                                        'value' => 15240402,
                                      ),
                                      26 => 
                                      array (
                                        'key' => ' CONTI® ULTIMATE CONDUCTIVE und CONTI® ULTIMATE Flansch',
                                        'value' => 15240403,
                                      ),
                                      27 => 
                                      array (
                                        'key' => 'Calibrated Diameters',
                                        'value' => 15240420,
                                      ),
                                      28 => 
                                      array (
                                        'key' => 'Can also be used for welding processes with aggressive filler agents',
                                        'value' => 15240283,
                                      ),
                                      29 => 
                                      array (
                                        'key' => 'Can be cleaned by CIP installations',
                                        'value' => 15240251,
                                      ),
                                      30 => 
                                      array (
                                        'key' => 'Can be overrun',
                                        'value' => 15240271,
                                      ),
                                      31 => 
                                      array (
                                        'key' => 'Can be overrun (except construction with steel wire helix)',
                                        'value' => 15240253,
                                      ),
                                      32 => 
                                      array (
                                        'key' => 'Can be used in accordance with the specif_x001F_ications of BSH and BMU within the framework of noise protection measures for marine mammals',
                                        'value' => 15240351,
                                      ),
                                      33 => 
                                      array (
                                        'key' => 'Cold-elastic',
                                        'value' => 15240247,
                                      ),
                                      34 => 
                                      array (
                                        'key' => 'Cold-resistant',
                                        'value' => 15240326,
                                      ),
                                      35 => 
                                      array (
                                        'key' => 'Color-coded pressure range system for easy identification',
                                        'value' => 15240347,
                                      ),
                                      36 => 
                                      array (
                                        'key' => 'Compatible with standard water hose fittings',
                                        'value' => 15240293,
                                      ),
                                      37 => 
                                      array (
                                        'key' => 'Conical shape ensures ease of installation',
                                        'value' => 15240386,
                                      ),
                                      38 => 
                                      array (
                                        'key' => 'Conti Ultimate PN 10 Aluminium Flange System',
                                        'value' => 15240433,
                                      ),
                                      39 => 
                                      array (
                                        'key' => 'Continuos temperature resistant',
                                        'value' => 15240288,
                                      ),
                                      40 => 
                                      array (
                                        'key' => 'Continuously adjustable jet strength',
                                        'value' => 15240321,
                                      ),
                                      41 => 
                                      array (
                                        'key' => 'Couplings are partly hardend and with galvanized sleeve',
                                        'value' => 15240295,
                                      ),
                                      42 => 
                                      array (
                                        'key' => 'Couplings: all STD clamps with insert',
                                        'value' => 15240346,
                                      ),
                                      43 => 
                                      array (
                                        'key' => 'Customised production from inner diameter 80 mm to 1',
                                        'value' => 15240376,
                                      ),
                                      44 => 
                                      array (
                                        'key' => 'Customized laser marking on request',
                                        'value' => 15240333,
                                      ),
                                      45 => 
                                      array (
                                        'key' => 'DN 8 mm and 10 mm only available in old version at old prices for the time being',
                                        'value' => 15240416,
                                      ),
                                      46 => 
                                      array (
                                        'key' => 'Dielectric strength > 6kV (tube wall)',
                                        'value' => 15240401,
                                      ),
                                      47 => 
                                      array (
                                        'key' => ' Dieselkraftstoff bis +40°C / +104°F',
                                        'value' => 15240308,
                                      ),
                                      48 => 
                                      array (
                                        'key' => 'Different lenghts upon request',
                                        'value' => 15240296,
                                      ),
                                      49 => 
                                      array (
                                        'key' => 'Different manufacturing technologies - absolutely consistent product quality',
                                        'value' => 15240377,
                                      ),
                                      50 => 
                                      array (
                                        'key' => 'Different pressure stages possible',
                                        'value' => 15240373,
                                      ),
                                      51 => 
                                      array (
                                        'key' => 'Dimensionally stable',
                                        'value' => 15240252,
                                      ),
                                      52 => 
                                      array (
                                        'key' => 'Drinking water approval for cold and hot water up to +60°C',
                                        'value' => 15240415,
                                      ),
                                      53 => 
                                      array (
                                        'key' => 'During proper use as a Double Big Bubble Curtain_x001C_ (DBBC with speci_x001F_fic hole pattern)',
                                        'value' => 15240352,
                                      ),
                                      54 => 
                                      array (
                                        'key' => ' EPDM',
                                        'value' => 15240340,
                                      ),
                                      55 => 
                                      array (
                                        'key' => 'Easy Pack',
                                        'value' => 15240421,
                                      ),
                                      56 => 
                                      array (
                                        'key' => 'Easy crimping thanks to an optimized combination of ferrule and insert',
                                        'value' => 15240331,
                                      ),
                                      57 => 
                                      array (
                                        'key' => 'Easy to clean',
                                        'value' => 15240276,
                                      ),
                                      58 => 
                                      array (
                                        'key' => 'Easy to handle',
                                        'value' => 15240240,
                                      ),
                                      59 => 
                                      array (
                                        'key' => 'Electrical conductivity Type C: 10<sup>3</sup> Ω/m to 10<sup>6</sup> Ω/m; Type E: < 10<sup>2</sup> Ω/m',
                                        'value' => 15240275,
                                      ),
                                      60 => 
                                      array (
                                        'key' => 'Electrical insulation',
                                        'value' => 15240374,
                                      ),
                                      61 => 
                                      array (
                                        'key' => 'Electrically conductive Ω/T',
                                        'value' => 15240316,
                                      ),
                                      62 => 
                                      array (
                                        'key' => 'Excellent impulse performance',
                                        'value' => 15240349,
                                      ),
                                      63 => 
                                      array (
                                        'key' => 'Excellent resistant to heat aging',
                                        'value' => 15240315,
                                      ),
                                      64 => 
                                      array (
                                        'key' => 'Execution with and without helix possible',
                                        'value' => 15240447,
                                      ),
                                      65 => 
                                      array (
                                        'key' => 'Extremely durable',
                                        'value' => 15240248,
                                      ),
                                      66 => 
                                      array (
                                        'key' => 'Finished hose dimensions may be subject to change depending on specific gravity of medium transported',
                                        'value' => 15240409,
                                      ),
                                      67 => 
                                      array (
                                        'key' => 'Fire and toxicity behaviour according to EN 45545-2',
                                        'value' => 15240441,
                                      ),
                                      68 => 
                                      array (
                                        'key' => 'Fixed lengths with built-in couplings acc. to customers request',
                                        'value' => 15240318,
                                      ),
                                      69 => 
                                      array (
                                        'key' => 'Flexible',
                                        'value' => 15240282,
                                      ),
                                      70 => 
                                      array (
                                        'key' => 'Floatation Element: Three layers of PE foam',
                                        'value' => 15240406,
                                      ),
                                      71 => 
                                      array (
                                        'key' => 'Floatation Element: Two layers of PE foam',
                                        'value' => 15240410,
                                      ),
                                      72 => 
                                      array (
                                        'key' => 'Fluidisation channels for connection of G¼ for DN 10 pneumatic hoses',
                                        'value' => 15240439,
                                      ),
                                      73 => 
                                      array (
                                        'key' => 'For hoses with helix',
                                        'value' => 15240417,
                                      ),
                                      74 => 
                                      array (
                                        'key' => 'For more information',
                                        'value' => 15240444,
                                      ),
                                      75 => 
                                      array (
                                        'key' => 'For suction operation - vacuum-tight',
                                        'value' => 15240445,
                                      ),
                                      76 => 
                                      array (
                                        'key' => 'Free from DOTG and SVHC',
                                        'value' => 15240313,
                                      ),
                                      77 => 
                                      array (
                                        'key' => 'Free of twists',
                                        'value' => 15240250,
                                      ),
                                      78 => 
                                      array (
                                        'key' => 'Gentle and environmentally friendly cleaning',
                                        'value' => 15240320,
                                      ),
                                      79 => 
                                      array (
                                        'key' => 'Gentle material treatment',
                                        'value' => 15240443,
                                      ),
                                      80 => 
                                      array (
                                        'key' => 'Halogen Free',
                                        'value' => 15240425,
                                      ),
                                      81 => 
                                      array (
                                        'key' => 'Halogen-free ',
                                        'value' => 15240356,
                                      ),
                                      82 => 
                                      array (
                                        'key' => 'Heat-resistant',
                                        'value' => 15240245,
                                      ),
                                      83 => 
                                      array (
                                        'key' => ' Heavy Duty (US)',
                                        'value' => 15240294,
                                      ),
                                      84 => 
                                      array (
                                        'key' => ' Heißwasser ≥ 3',
                                        'value' => 15240273,
                                      ),
                                      85 => 
                                      array (
                                        'key' => 'High functionality',
                                        'value' => 15240249,
                                      ),
                                      86 => 
                                      array (
                                        'key' => 'High net weight and negative buoyancy thanks to embedded additional weights (DN100: ~20 t/km)',
                                        'value' => 15240353,
                                      ),
                                      87 => 
                                      array (
                                        'key' => 'High temperature resistance',
                                        'value' => 15240361,
                                      ),
                                      88 => 
                                      array (
                                        'key' => 'High-performance',
                                        'value' => 15240246,
                                      ),
                                      89 => 
                                      array (
                                        'key' => 'Highly flexible',
                                        'value' => 15240239,
                                      ),
                                      90 => 
                                      array (
                                        'key' => 'Hose 22 25 with outside steel braiding with blue colored marking',
                                        'value' => 15240395,
                                      ),
                                      91 => 
                                      array (
                                        'key' => 'Hydrolysis Resistance',
                                        'value' => 15240423,
                                      ),
                                      92 => 
                                      array (
                                        'key' => ' IDF ISO 2853',
                                        'value' => 15240335,
                                      ),
                                      93 => 
                                      array (
                                        'key' => 'Improved resistance against pop corning',
                                        'value' => 15240266,
                                      ),
                                      94 => 
                                      array (
                                        'key' => 'Indestructible',
                                        'value' => 15240236,
                                      ),
                                      95 => 
                                      array (
                                        'key' => 'Inner lining must be cleaned before installation/first use!',
                                        'value' => 15240287,
                                      ),
                                      96 => 
                                      array (
                                        'key' => 'Inside and outside heat resistant',
                                        'value' => 15240291,
                                      ),
                                      97 => 
                                      array (
                                        'key' => 'Kink-resistant',
                                        'value' => 15240244,
                                      ),
                                      98 => 
                                      array (
                                        'key' => ' Leitfähigkeit wird durch Gummikomponenten gewährleistet (keine Kupferlitze und entsprechender Anschluss notwendig)',
                                        'value' => 15240438,
                                      ),
                                      99 => 
                                      array (
                                        'key' => 'Lightweight',
                                        'value' => 15240243,
                                      ),
                                      100 => 
                                      array (
                                        'key' => 'Lightweight hose',
                                        'value' => 15240362,
                                      ),
                                      101 => 
                                      array (
                                        'key' => 'Lining and cover both resistant to oil and fats',
                                        'value' => 15240267,
                                      ),
                                      102 => 
                                      array (
                                        'key' => 'Long-lasting',
                                        'value' => 15240237,
                                      ),
                                      103 => 
                                      array (
                                        'key' => 'Low noise',
                                        'value' => 15240434,
                                      ),
                                      104 => 
                                      array (
                                        'key' => 'Low resistance to flow',
                                        'value' => 15240235,
                                      ),
                                      105 => 
                                      array (
                                        'key' => 'Low-energy',
                                        'value' => 15240436,
                                      ),
                                      106 => 
                                      array (
                                        'key' => 'M-type hose acc. to TRGS 727 no. 4.9.4 (Cu-wires to be grounded on both sides)',
                                        'value' => 15240292,
                                      ),
                                      107 => 
                                      array (
                                        'key' => 'Made of high-strength aluminium alloy',
                                        'value' => 15240383,
                                      ),
                                      108 => 
                                      array (
                                        'key' => 'Maintenance-free',
                                        'value' => 15240435,
                                      ),
                                      109 => 
                                      array (
                                        'key' => 'Material: stainless steel',
                                        'value' => 15240398,
                                      ),
                                      110 => 
                                      array (
                                        'key' => 'Meets the requirements of fire and smoke gas toxicity',
                                        'value' => 15240302,
                                      ),
                                      111 => 
                                      array (
                                        'key' => 'Meets the requirements of fire and smoke gas toxicity DIN EN 45545-2  -  HL3 für Anforderungssatz R22 + R23',
                                        'value' => 15240399,
                                      ),
                                      112 => 
                                      array (
                                        'key' => 'Microrganisms Resistance',
                                        'value' => 15240426,
                                      ),
                                      113 => 
                                      array (
                                        'key' => 'Minimum reserve buoyancy of 25% using OCIMF standard calculations for all hose',
                                        'value' => 15240408,
                                      ),
                                      114 => 
                                      array (
                                        'key' => ' Motorenschmieröle',
                                        'value' => 15240306,
                                      ),
                                      115 => 
                                      array (
                                        'key' => ' Nitrosaminen und SVHC',
                                        'value' => 15240304,
                                      ),
                                      116 => 
                                      array (
                                        'key' => 'No change to cross-section in the coupling area',
                                        'value' => 15240337,
                                      ),
                                      117 => 
                                      array (
                                        'key' => 'No damage to lining through swaging process',
                                        'value' => 15240332,
                                      ),
                                      118 => 
                                      array (
                                        'key' => 'No usage according to EN 1360',
                                        'value' => 15240345,
                                      ),
                                      119 => 
                                      array (
                                        'key' => 'Noise and vibration dampening',
                                        'value' => 15240446,
                                      ),
                                      120 => 
                                      array (
                                        'key' => 'Non-corrosive',
                                        'value' => 15240382,
                                      ),
                                      121 => 
                                      array (
                                        'key' => 'Not applicable for petrol pump hose station',
                                        'value' => 15240343,
                                      ),
                                      122 => 
                                      array (
                                        'key' => 'Not recommended for ex-zones',
                                        'value' => 15240277,
                                      ),
                                      123 => 
                                      array (
                                        'key' => 'Not suitable for medical use!',
                                        'value' => 15240286,
                                      ),
                                      124 => 
                                      array (
                                        'key' => 'Not suitable for pneumatic transport of bulk material in potentially explosive atmospheres according to TRGS 727 No. 6.4',
                                        'value' => 15240411,
                                      ),
                                      125 => 
                                      array (
                                        'key' => 'Not suitable for the transmission of torsional forces',
                                        'value' => 15240414,
                                      ),
                                      126 => 
                                      array (
                                        'key' => 'O-Phtalate Free',
                                        'value' => 15240427,
                                      ),
                                      127 => 
                                      array (
                                        'key' => 'Operation without motor power',
                                        'value' => 15240437,
                                      ),
                                      128 => 
                                      array (
                                        'key' => 'Optimally adapted to PAGUFIX® nozzles due to the coordinated tooth geometry',
                                        'value' => 15240404,
                                      ),
                                      129 => 
                                      array (
                                        'key' => 'Optionally available with chamfered ends',
                                        'value' => 15240371,
                                      ),
                                      130 => 
                                      array (
                                        'key' => 'Outside braided with steel including a blue stip inside the braiding',
                                        'value' => 15240365,
                                      ),
                                      131 => 
                                      array (
                                        'key' => 'Outside wire braiding',
                                        'value' => 15240400,
                                      ),
                                      132 => 
                                      array (
                                        'key' => 'Ozone Resistance',
                                        'value' => 15240424,
                                      ),
                                      133 => 
                                      array (
                                        'key' => 'Perfect compression set for a fantastic fit',
                                        'value' => 15240314,
                                      ),
                                      134 => 
                                      array (
                                        'key' => 'Perfect seal of the hose end (no wicking effect)',
                                        'value' => 15240329,
                                      ),
                                      135 => 
                                      array (
                                        'key' => 'Phtalate Free',
                                        'value' => 15240428,
                                      ),
                                      136 => 
                                      array (
                                        'key' => 'Piggable',
                                        'value' => 15240336,
                                      ),
                                      137 => 
                                      array (
                                        'key' => 'Potable Water Hose Deutsche Bahn AG Approval',
                                        'value' => 15240279,
                                      ),
                                      138 => 
                                      array (
                                        'key' => 'Produced with inner diameters from 3 - 40 mm',
                                        'value' => 15240339,
                                      ),
                                      139 => 
                                      array (
                                        'key' => 'Protects the hose and fitting from external damage in daily use',
                                        'value' => 15240405,
                                      ),
                                      140 => 
                                      array (
                                        'key' => '  R > 10<sup>11</sup> Ω/m',
                                        'value' => 15240448,
                                      ),
                                      141 => 
                                      array (
                                        'key' => ' R < 10<sup>2</sup> Ω',
                                        'value' => 15240268,
                                      ),
                                      142 => 
                                      array (
                                        'key' => '  R < 10<sup>6</sup> Ω',
                                        'value' => 15240264,
                                      ),
                                      143 => 
                                      array (
                                        'key' => '  R < 10<sup>6</sup> Ω/Leitung',
                                        'value' => 15240261,
                                      ),
                                      144 => 
                                      array (
                                        'key' => '  R < 10<sup>6</sup> Ω/m',
                                        'value' => 15240262,
                                      ),
                                      145 => 
                                      array (
                                        'key' => '  R < 10<sup>8</sup> Ω',
                                        'value' => 15240368,
                                      ),
                                      146 => 
                                      array (
                                        'key' => ' R < 10<sup>9</sup> Ω',
                                        'value' => 15240300,
                                      ),
                                      147 => 
                                      array (
                                        'key' => ' RMA Class A',
                                        'value' => 15240269,
                                      ),
                                      148 => 
                                      array (
                                        'key' => 'Recommended fittings system DINGA® water saving gun for hot water applications',
                                        'value' => 15240280,
                                      ),
                                      149 => 
                                      array (
                                        'key' => 'Recommended fittings system PAGUFIX®',
                                        'value' => 15240257,
                                      ),
                                      150 => 
                                      array (
                                        'key' => 'Resistance to pull-off forces above operating pressure',
                                        'value' => 15240338,
                                      ),
                                      151 => 
                                      array (
                                        'key' => 'Resistant to aggressive chemicals',
                                        'value' => 15240299,
                                      ),
                                      152 => 
                                      array (
                                        'key' => 'Resistant to alkalis and acids',
                                        'value' => 15240325,
                                      ),
                                      153 => 
                                      array (
                                        'key' => 'Resistant to all conventional lubricating oils (including Automatic-Transmission-Fluids and alloyed oils)',
                                        'value' => 15240311,
                                      ),
                                      154 => 
                                      array (
                                        'key' => 'Resistant to commonly used cleaning and disinfecting products',
                                        'value' => 15240256,
                                      ),
                                      155 => 
                                      array (
                                        'key' => 'Resistant to process water and oily air',
                                        'value' => 15240284,
                                      ),
                                      156 => 
                                      array (
                                        'key' => 'Reusable',
                                        'value' => 15240397,
                                      ),
                                      157 => 
                                      array (
                                        'key' => 'Robust',
                                        'value' => 15240234,
                                      ),
                                      158 => 
                                      array (
                                        'key' => 'Rubber protection rings available in blue',
                                        'value' => 15240334,
                                      ),
                                      159 => 
                                      array (
                                        'key' => 'Rubber sealing with steel reinforcement',
                                        'value' => 15240389,
                                      ),
                                      160 => 
                                      array (
                                        'key' => 'SOH 21 85 with stainless steel outside braiding',
                                        'value' => 15240367,
                                      ),
                                      161 => 
                                      array (
                                        'key' => 'Sea water resistant',
                                        'value' => 15240350,
                                      ),
                                      162 => 
                                      array (
                                        'key' => 'Sealing thickness: 8 mm',
                                        'value' => 15240390,
                                      ),
                                      163 => 
                                      array (
                                        'key' => 'Secure connection between hose and flange',
                                        'value' => 15240388,
                                      ),
                                      164 => 
                                      array (
                                        'key' => 'Sensitive to ozone - unused hoses must be stored with capped ends',
                                        'value' => 15240341,
                                      ),
                                      165 => 
                                      array (
                                        'key' => 'Shockproof',
                                        'value' => 15240270,
                                      ),
                                      166 => 
                                      array (
                                        'key' => ' Sicherheitsfaktor 10:1',
                                        'value' => 15240289,
                                      ),
                                      167 => 
                                      array (
                                        'key' => 'Silicon Free',
                                        'value' => 15240429,
                                      ),
                                      168 => 
                                      array (
                                        'key' => 'Small bending radius',
                                        'value' => 15240297,
                                      ),
                                      169 => 
                                      array (
                                        'key' => 'Suction-proof',
                                        'value' => 15240303,
                                      ),
                                      170 => 
                                      array (
                                        'key' => 'Suitable for VE-water ',
                                        'value' => 15240355,
                                      ),
                                      171 => 
                                      array (
                                        'key' => 'Suitable for all wellknown brands',
                                        'value' => 15240265,
                                      ),
                                      172 => 
                                      array (
                                        'key' => 'Suitable for biodiesel and methyl ester of rapeseed (RME) upto 70°C',
                                        'value' => 15240359,
                                      ),
                                      173 => 
                                      array (
                                        'key' => 'Suitable for commercial portable fire extinguisher',
                                        'value' => 15240369,
                                      ),
                                      174 => 
                                      array (
                                        'key' => 'Suitable for compressor applications',
                                        'value' => 15240360,
                                      ),
                                      175 => 
                                      array (
                                        'key' => 'Suitable for hot water for a short time up to +80°C / +176°F',
                                        'value' => 15240412,
                                      ),
                                      176 => 
                                      array (
                                        'key' => 'Suitable for oily air up to +100°C / +212°F',
                                        'value' => 15240307,
                                      ),
                                      177 => 
                                      array (
                                        'key' => 'Suitable for pure alcohol up to 100%',
                                        'value' => 15240258,
                                      ),
                                      178 => 
                                      array (
                                        'key' => 'Suitable for small bending radii',
                                        'value' => 15240310,
                                      ),
                                      179 => 
                                      array (
                                        'key' => 'Suitable for steam fittings according to DIN EN 14223',
                                        'value' => 15240281,
                                      ),
                                      180 => 
                                      array (
                                        'key' => 'Suitable for CIP cleaning processes',
                                        'value' => 15240298,
                                      ),
                                      181 => 
                                      array (
                                        'key' => 'Suited to use in ex-zones',
                                        'value' => 15240301,
                                      ),
                                      182 => 
                                      array (
                                        'key' => 'Swelling resistant',
                                        'value' => 15240342,
                                      ),
                                      183 => 
                                      array (
                                        'key' => ' TW_x001E_Schlauchkupplungen nach DIN EN 14420_x001E_6',
                                        'value' => 15240354,
                                      ),
                                      184 => 
                                      array (
                                        'key' => 'Temperature resistance variants available from -40°C / -40°F to +70°C / +158°F',
                                        'value' => 15240372,
                                      ),
                                      185 => 
                                      array (
                                        'key' => 'Temperature-restistant',
                                        'value' => 15240242,
                                      ),
                                      186 => 
                                      array (
                                        'key' => 'Tested according to DBL 6254.12 / DBL 6254.16',
                                        'value' => 15240375,
                                      ),
                                      187 => 
                                      array (
                                        'key' => 'Tested with 3 mio load cycles',
                                        'value' => 15240364,
                                      ),
                                      188 => 
                                      array (
                                        'key' => 'The bending radius must not be less than this!',
                                        'value' => 15240413,
                                      ),
                                      189 => 
                                      array (
                                        'key' => 'The conveying angle must be from -3° to -10° over the entire length',
                                        'value' => 15240432,
                                      ),
                                      190 => 
                                      array (
                                        'key' => 'The dimensions of the expanded joints are manufactured according to your specifications. Flange dimensions are to be matched to the required connections',
                                        'value' => 15240379,
                                      ),
                                      191 => 
                                      array (
                                        'key' => 'These products are distributed by our partner ELAFLEX: ELAFLEX HIBY GmbH & Co. KG Schackenburgallee 121 D-22525 Hamburg (Eidelstedt) Telefon  +49 (0) 40 540 00 50 Fax        +49 (0) 40 540 0',
                                        'value' => 15240381,
                                      ),
                                      192 => 
                                      array (
                                        'key' => 'Top feed in stainless steel quality (alt. in steel)',
                                        'value' => 15240430,
                                      ),
                                      193 => 
                                      array (
                                        'key' => ' Trennmittel- und fettfrei',
                                        'value' => 15240259,
                                      ),
                                      194 => 
                                      array (
                                        'key' => 'Type B (with copper braid) and Type F (non-metalic helix) available on request',
                                        'value' => 15240274,
                                      ),
                                      195 => 
                                      array (
                                        'key' => 'Unsuitable for biodiesel and methyl ester of rapeseed (RME)',
                                        'value' => 15240305,
                                      ),
                                      196 => 
                                      array (
                                        'key' => 'Vacuum stable',
                                        'value' => 15240241,
                                      ),
                                      197 => 
                                      array (
                                        'key' => 'Very good damping characteristic by a high volume increase',
                                        'value' => 15240312,
                                      ),
                                      198 => 
                                      array (
                                        'key' => 'Very good for often changing media',
                                        'value' => 15240278,
                                      ),
                                      199 => 
                                      array (
                                        'key' => 'Waste water',
                                        'value' => 15240422,
                                      ),
                                      200 => 
                                      array (
                                        'key' => 'Water flow 25 liters/minute at 5 bar / 72 psi',
                                        'value' => 15240319,
                                      ),
                                      201 => 
                                      array (
                                        'key' => 'Working pressure up to 20 bar (290 psi) at 95°C up to 6 bar (87 psi) at 164°C',
                                        'value' => 15240358,
                                      ),
                                      202 => 
                                      array (
                                        'key' => 'Working pressure up to 25 bar / 363 psi',
                                        'value' => 15240327,
                                      ),
                                      203 => 
                                      array (
                                        'key' => ' auch bei Heißreinigung durch ideale Zahngeometrie',
                                        'value' => 15240330,
                                      ),
                                      204 => 
                                      array (
                                        'key' => ' der Festigkeitsträger wird vor dem abrasiven Fördermedium geschützt',
                                        'value' => 15240387,
                                      ),
                                      205 => 
                                      array (
                                        'key' => ' die dem neuesten Stand der Technik entsprechen',
                                        'value' => 15240378,
                                      ),
                                      206 => 
                                      array (
                                        'key' => ' hygienische Verbindung zwischen Schlauchinnenschicht und Armaturstutzen',
                                        'value' => 15240328,
                                      ),
                                      207 => 
                                      array (
                                        'key' => ' kostengünstige und flexible Installation',
                                        'value' => 15240442,
                                      ),
                                      208 => 
                                      array (
                                        'key' => ' kurzfristig +220°C / +428°F bei 23 bar / 333 psi (Sattdampf)',
                                        'value' => 15240290,
                                      ),
                                      209 => 
                                      array (
                                        'key' => ' kurzzeitig bis 250°C',
                                        'value' => 15240363,
                                      ),
                                      210 => 
                                      array (
                                        'key' => 'low permeability',
                                        'value' => 15240392,
                                      ),
                                      211 => 
                                      array (
                                        'key' => ' max. +95°C (+203°F) - Heißwasser-Reinigungspistole',
                                        'value' => 15240324,
                                      ),
                                      212 => 
                                      array (
                                        'key' => 'not resistant to patrol fuel',
                                        'value' => 15240394,
                                      ),
                                      213 => 
                                      array (
                                        'key' => ' optional mit Stahl-Hinterlegflansch - Einvulkanisierter Stahlflansch',
                                        'value' => 15240380,
                                      ),
                                      214 => 
                                      array (
                                        'key' => 'vent line',
                                        'value' => 15240391,
                                      ),
                                    ),
                                     'width' => 300,
                                     'height' => '',
                                     'maxItems' => 5,
                                     'renderType' => 'tags',
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                                     'optionsProviderData' => 'propertiesGeneral',
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
                                     'style' => 'margin-left:20px;',
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
                                     'name' => 'TPCode',
                                     'title' => 'TP Code',
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
                                 'labelWidth' => 200,
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
                                         'columnLength' => 190,
                                         'phpdocType' => 'string',
                                         'regex' => '',
                                         'unique' => false,
                                         'showCharCount' => false,
                                         'name' => 'headlineWeb',
                                         'title' => 'Headline (Web)',
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
                                         'name' => 'Marking2',
                                         'title' => 'Marking 2',
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                         'fieldtype' => 'multiselect',
                                         'options' => 
                                        array (
                                        ),
                                         'width' => 300,
                                         'height' => '',
                                         'maxItems' => '',
                                         'renderType' => 'tags',
                                         'optionsProviderClass' => '',
                                         'optionsProviderData' => '',
                                         'queryColumnType' => 'text',
                                         'columnType' => 'text',
                                         'phpdocType' => 'array',
                                         'dynamicOptions' => false,
                                         'name' => 'searchKeywords',
                                         'title' => 'Search Keywords',
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                         'fieldtype' => 'wysiwyg',
                                         'width' => 500,
                                         'height' => 125,
                                         'queryColumnType' => 'longtext',
                                         'columnType' => 'longtext',
                                         'phpdocType' => 'string',
                                         'toolbarConfig' => '',
                                         'excludeFromSearchIndex' => false,
                                         'name' => 'commercialDescription',
                                         'title' => 'Commercial Description',
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
                                         'width' => 500,
                                         'height' => 125,
                                         'queryColumnType' => 'longtext',
                                         'columnType' => 'longtext',
                                         'phpdocType' => 'string',
                                         'toolbarConfig' => '',
                                         'excludeFromSearchIndex' => false,
                                         'name' => 'technicalDescription',
                                         'title' => 'Technical Description',
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
                             'labelWidth' => 200,
                             'border' => false,
                             'provideSplitView' => false,
                             'tabPosition' => NULL,
                             'hideLabelsWhenTabsReached' => NULL,
                             'referencedFields' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                                 'fieldtype' => 'localizedfields',
                                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                                 'childs' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'fieldtype' => 'textarea',
                                     'width' => 250,
                                     'height' => 120,
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
                                 'width' => '',
                                 'height' => '',
                                 'maxTabs' => NULL,
                                 'labelWidth' => 210,
                                 'border' => false,
                                 'provideSplitView' => false,
                                 'tabPosition' => NULL,
                                 'hideLabelsWhenTabsReached' => NULL,
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'shippingConditions',
                                     'title' => 'Shipping Conditions',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'Conditions',
                                     'title' => 'Conditions',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'manufacturingLength',
                                     'title' => 'Manufacturing Length',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'minimumOrder',
                                     'title' => 'Minimum Order',
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
                                 'name' => 'localizedfields',
                                 'region' => NULL,
                                 'layout' => NULL,
                                 'title' => '',
                                 'width' => 900,
                                 'height' => 300,
                                 'maxTabs' => NULL,
                                 'labelWidth' => 100,
                                 'border' => false,
                                 'provideSplitView' => false,
                                 'tabPosition' => NULL,
                                 'hideLabelsWhenTabsReached' => NULL,
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
                              2 => 
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
                                 'labelWidth' => 100,
                                 'border' => false,
                                 'provideSplitView' => false,
                                 'tabPosition' => NULL,
                                 'hideLabelsWhenTabsReached' => NULL,
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
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                         'fieldtype' => 'objectbricks',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Objectbrick',
                         'allowedTypes' => 
                        array (
                          0 => 'IFSEUHoseBase',
                        ),
                         'maxItems' => '',
                         'border' => true,
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
                      3 => 
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
                                     'style' => 'margin-left:10px;',
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
                                     'style' => 'margin-left:10px;',
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
                                     'style' => 'margin-left:10px;',
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
                                     'name' => 'rangeTemperatureC',
                                     'title' => 'Temperature Range (°C)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                     'name' => 'temperatureRangeApplication',
                                     'title' => 'Temperature Range Application',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                     'name' => 'temperatureRangeApplication1',
                                     'title' => 'Temperature Range Applications 1',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                     'name' => 'temperatureRangeApplication2',
                                     'title' => 'Temperature Range Applications 2',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'temporaryUntilC',
                                     'title' => 'Temporary Until (°C)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'DampableUntil1C',
                                     'title' => 'Dampable Until 1 (°C)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'DampableUntil2C',
                                     'title' => 'Dampable Until 2 (°C)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  10 => 
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
                                     'width' => 300,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'justTemporarily',
                                     'title' => 'Just "Temporarily"',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
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
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'DampableUntil1T',
                                     'title' => 'Dampable Until 1 (t)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  12 => 
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
                                     'name' => 'DampableUntil2T',
                                     'title' => 'Dampable Until 2 (t)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                     'name' => 'maximumTemperatureF',
                                     'title' => 'Max temp °F',
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
                                     'name' => 'temperatureRangeFAndC',
                                     'title' => 'Temperature Range (°F & C°)',
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
                                     'name' => 'temperatureNote',
                                     'title' => 'Temperature Note',
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
                                     'name' => 'temperatureRangeApplicationFAndC1',
                                     'title' => 'Temperature Range Application (Range °F to °C) 1',
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
                                     'name' => 'temperatureRangeApplicationFAndC2',
                                     'title' => 'Temperature Range Application (Range °F to °C) 2',
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
                                     'name' => 'temperatureRangeApplicationFAndC3',
                                     'title' => 'Temperature Range Application (Range °F to °C) 3',
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
                                     'name' => 'temperatureRangeApplicationFAndC4',
                                     'title' => 'Temperature Range Application (Range °F to °C) 4',
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
                                     'name' => 'temperatureRangeApplicationFAndC5',
                                     'title' => 'Temperature Range Application (Range °F to °C) 5',
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
                                  9 => 
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
                                     'name' => 'temporaryUntilT',
                                     'title' => 'Temporary Until (t)',
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
                                  10 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
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
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'onlyOpenSystem',
                                     'title' => 'Only Open System',
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
                                  11 => 
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
                                     'name' => 'PressureUntil',
                                     'title' => 'Pressure Until',
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
                    ),
                     'locked' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/overlay-edit.svg',
                  )),
                  1 => 
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
                         'width' => 220,
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
                            'classes' => 'IFSEUProductCategory',
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
                            'classes' => 'IFSEUProductCategory',
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
                            'classes' => 'IFSEUProductCategory',
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
                            'classes' => 'IFSEUProductCategory',
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
                            'classes' => 'IFSEUProductCategory',
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
                            'classes' => 'IFSEUProductCategory',
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
                      8 => 
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
                            'classes' => 'IFSEUProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel7',
                         'title' => 'SIOP Level 7',
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
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_yellow.png',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => '',
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
                  0 => 'IFSEUHoseSkeleton',
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
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => '',
             'border' => false,
             'name' => 'Fert',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Finished Goods Data',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
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
                 'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
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
                     'title' => 'Finished Good Attributes',
                     'width' => 1000,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => 1,
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'id,displayName',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'B2CCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'B2CCategory',
                         'title' => 'B2C Category',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Publish in the table',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 200,
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
                             'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
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
                                 'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
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
                                     'width' => 200,
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
                                     'width' => 200,
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
                                 'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
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
                                     'width' => 200,
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
                                     'style' => 'margin-left:60px;',
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
                                     'width' => 200,
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
                                     'style' => 'margin-left:60px;',
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
                         'locked' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Web',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 200,
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
                                     'width' => 200,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'webDescription',
                                     'title' => 'Web Description',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 200,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'WebsiteLink',
                                     'title' => 'Website Link',
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
                                 'bodyStyle' => 'margin-left: 20px;',
                                 'datatype' => 'layout',
                                 'permissions' => NULL,
                                 'childs' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 200,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'amazonTitle',
                                     'title' => 'Amazon Title',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 60px;',
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
                                     'width' => 250,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 255,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'materialNumber',
                                     'title' => 'Material number',
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
                                     'width' => 250,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'EANCode',
                                     'title' => 'EAN Code',
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
                                     'width' => 250,
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
                                        'classes' => 'IFSEUMaterialGroup',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                     'fieldtype' => 'manyToOneRelation',
                                     'width' => 250,
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
                                        'classes' => 'IFSEUCountries',
                                      ),
                                    ),
                                     'pathFormatterClass' => '',
                                     'name' => 'countryOfOrigin',
                                     'title' => 'Country Of Origin',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 250,
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
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 250,
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
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 250,
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
                                  7 => 
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
                                     'width' => 250,
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
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 250,
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
                                     'width' => 250,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'succesorFlag',
                                     'title' => 'Succesor / Supercession Flag',
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
                                  10 => 
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
                                     'width' => 250,
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
                                  11 => 
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
                                     'width' => 250,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'rebateFlag',
                                     'title' => 'Rebate Flag',
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
                                  12 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'IFSEU',
                                        'value' => 'IFSEU',
                                      ),
                                    ),
                                     'width' => 250,
                                     'defaultValue' => 'IFSEU',
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
                                  13 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 250,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'Spezi',
                                     'title' => 'Spezi ',
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
                                 'bodyStyle' => 'margin-left: 20px;',
                                 'datatype' => 'layout',
                                 'permissions' => NULL,
                                 'childs' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 250,
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
                                     'width' => 250,
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
                                     'width' => 250,
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
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 250,
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
                                  4 => 
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
                                     'width' => 250,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'returnFlag',
                                     'title' => 'Return Flag',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                                     'fieldtype' => 'checkbox',
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'tinyint(1)',
                                     'columnType' => 'tinyint(1)',
                                     'phpdocType' => 'boolean',
                                     'name' => 'OutsidePurchaseFlag',
                                     'title' => 'Outside Purchase Identifier / Procurement Type',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  6 => 
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
                                     'name' => 'CustomsTariffNumber',
                                     'title' => 'Customs Tariff Number',
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
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => NULL,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 32,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'b2BexternalID',
                                     'title' => 'B2B External ID',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => true,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 250,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'sapDescriptionLanguage',
                                     'title' => 'SAP Description Language',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  9 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                                     'fieldtype' => 'localizedfields',
                                     'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                                     'childs' => 
                                    array (
                                      0 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                         'fieldtype' => 'textarea',
                                         'width' => 250,
                                         'height' => 120,
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
                                     'width' => '',
                                     'height' => '',
                                     'maxTabs' => NULL,
                                     'labelWidth' => 210,
                                     'border' => false,
                                     'provideSplitView' => false,
                                     'tabPosition' => NULL,
                                     'hideLabelsWhenTabsReached' => NULL,
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
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Calculated',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 250,
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
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 250,
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
                                 'bodyStyle' => 'margin-left: 30px;',
                                 'datatype' => 'layout',
                                 'permissions' => NULL,
                                 'childs' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 250,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'WeightLbsPerFTUOM',
                                     'title' => 'Weight_Lbs per ft - UOM',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
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
                                     'width' => 250,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'ProductType',
                                     'title' => 'Product Type',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;',
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
                    ),
                     'locked' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/overlay-download.svg',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Packaging Attributes',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Additional Information',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Additional Information',
                         'width' => 950,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
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
                             'bodyStyle' => 'margin-left:10px;overflow-x: hidden;overflow-y: hidden;',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 220,
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
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                     'fieldtype' => 'multiselect',
                                     'options' => 
                                    array (
                                    ),
                                     'width' => 220,
                                     'height' => '',
                                     'maxItems' => '',
                                     'renderType' => 'tags',
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                                     'optionsProviderData' => 'conflictMinerals',
                                     'queryColumnType' => 'text',
                                     'columnType' => 'text',
                                     'phpdocType' => 'array',
                                     'dynamicOptions' => false,
                                     'name' => 'ConflictMinerals',
                                     'title' => 'Conflict Minerals',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'additionalInformation',
                                     'title' => 'Additional Information',
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
                                 'bodyStyle' => 'margin-left: 20px;',
                                 'datatype' => 'layout',
                                 'permissions' => NULL,
                                 'childs' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 220,
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
                                     'width' => 220,
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
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 220,
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
                    ),
                     'locked' => false,
                     'icon' => '',
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
                         'ownerClassName' => 'IFSEUSalesMaterialMaster',
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
                         'ownerClassName' => 'IFSEUPlantMaterialMaster',
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
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
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
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 200,
                         'name' => 'Certifications',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => 1000,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'fieldtype' => 'select',
                             'options' => 
                            array (
                            ),
                             'width' => 720,
                             'defaultValue' => '',
                             'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                             'optionsProviderData' => 'rohs',
                             'queryColumnType' => 'varchar',
                             'columnType' => 'varchar',
                             'columnLength' => 850,
                             'phpdocType' => 'string',
                             'dynamicOptions' => false,
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
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'fieldtype' => 'select',
                             'options' => 
                            array (
                            ),
                             'width' => 720,
                             'defaultValue' => '',
                             'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                             'optionsProviderData' => 'reach',
                             'queryColumnType' => 'varchar',
                             'columnType' => 'varchar',
                             'columnLength' => 1000,
                             'phpdocType' => 'string',
                             'dynamicOptions' => false,
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
                          2 => 
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
                             'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
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
                                     'width' => 220,
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
                                     'style' => '',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'fieldtype' => 'textarea',
                                     'width' => 220,
                                     'height' => 130,
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
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                     'fieldtype' => 'image',
                                     'width' => 315,
                                     'height' => 150,
                                     'uploadPath' => '',
                                     'queryColumnType' => 'int(11)',
                                     'columnType' => 'int(11)',
                                     'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                     'name' => 'warningIcon',
                                     'title' => 'Warning Icon',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:105px;',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                    ),
                                     'width' => 230,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                                     'optionsProviderData' => 'californiaProposition',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'californiaProposition65ChemicalName1',
                                     'title' => 'California Proposition 65 Chemical Name1',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                    ),
                                     'width' => 230,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                                     'optionsProviderData' => 'californiaProposition',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'californiaProposition65ChemicalName2',
                                     'title' => 'California Proposition 65 Chemical Name2',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                    ),
                                     'width' => 230,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                                     'optionsProviderData' => 'californiaProposition',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'californiaProposition65ChemicalName3',
                                     'title' => 'California Proposition 65 Chemical Name3',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;',
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
                                     'width' => 230,
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
                                     'style' => 'margin-left: 50px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyRelation::__set_state(array(
                                     'columns' => 
                                    array (
                                    ),
                                     'columnKeys' => 
                                    array (
                                    ),
                                     'fieldtype' => 'advancedManyToManyRelation',
                                     'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ElementMetadata[]',
                                     'optimizedAdminLoading' => false,
                                     'enableBatchEdit' => false,
                                     'allowMultipleAssignments' => false,
                                     'width' => '',
                                     'height' => '',
                                     'maxItems' => '',
                                     'assetUploadPath' => '',
                                     'queryColumnType' => 'text',
                                     'relationType' => true,
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
                                     'classes' => 
                                    array (
                                    ),
                                     'pathFormatterClass' => '',
                                     'name' => 'Gallery',
                                     'title' => 'Gallery',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;overflow-x: hidden;overflow-y: hidden;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
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
                         'locked' => false,
                      )),
                    ),
                     'locked' => false,
                     'icon' => '',
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Pricing and Stock',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Pricing and Stock',
                     'width' => 1100,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 200,
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'name' => 'Field Container',
                             'type' => NULL,
                             'region' => NULL,
                             'title' => '',
                             'width' => 1100,
                             'height' => 300,
                             'collapsible' => false,
                             'collapsed' => false,
                             'bodyStyle' => 'overflow-x: hidden;overflow-y: hidden;',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'merchantDiscount',
                                     'title' => 'Merchant Discount',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-top:10px;',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'Discount',
                                     'title' => 'Discount',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'GrossPrice',
                                     'title' => 'Gross Price',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'Department',
                                     'title' => 'Department',
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
                                     'width' => 220,
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
                                     'width' => 220,
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
                                     'name' => 'productLength',
                                     'title' => 'Product Length',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'ProductLengthUnit',
                                     'title' => 'Product Length Unit',
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
                                     'width' => 220,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'OnStock',
                                     'title' => 'On Stock',
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
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'fieldtype' => 'textarea',
                                     'width' => 220,
                                     'height' => 60,
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'queryColumnType' => 'longtext',
                                     'columnType' => 'longtext',
                                     'phpdocType' => 'string',
                                     'name' => 'productionLength',
                                     'title' => 'Production Length',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'Amount',
                                     'title' => 'Amount',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 45px;margin-top:10px;',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'ConnectionType',
                                     'title' => 'Connection Type',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 45px;',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'Note',
                                     'title' => 'Note',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 45px;',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'Currency',
                                     'title' => 'Currency',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 45px;',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'priceDate',
                                     'title' => 'Price Date',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 45px;',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'minimumQuantityUnit',
                                     'title' => 'Minimum Quantity Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 45px;',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'MinimumQuantityMeasurementUnit',
                                     'title' => 'Minimum Quantity Measurement Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 45px;',
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
                                     'width' => 220,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'EHoseID',
                                     'title' => 'ID',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 45px;',
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
                                     'width' => 220,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'publishedOnline',
                                     'title' => 'Published Online',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 45px;',
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'shippingConditions',
                                 'title' => 'Shipping Conditions',
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'Conditions',
                                 'title' => 'Conditions',
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
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'manufacturingLength',
                                 'title' => 'Manufacturing Length',
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
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'minimumOrder',
                                 'title' => 'Minimum Order',
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
                             'name' => 'localizedfields',
                             'region' => NULL,
                             'layout' => NULL,
                             'title' => '',
                             'width' => 900,
                             'height' => 300,
                             'maxTabs' => NULL,
                             'labelWidth' => 100,
                             'border' => false,
                             'provideSplitView' => false,
                             'tabPosition' => NULL,
                             'hideLabelsWhenTabsReached' => NULL,
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
                    ),
                     'locked' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/input.svg',
                  )),
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_green.png',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => '',
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
                 'bodyStyle' => 'height:100%;',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'childs' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => '',
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
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'mainImage',
                         'title' => 'Main Image',
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
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
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
                         'width' => 400,
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
                         'width' => 400,
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
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'epixImage',
                         'title' => 'EPIX Image',
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
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'TeaserImage',
                         'title' => 'Teaser Image',
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
                      6 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ImageGallery::__set_state(array(
                         'fieldtype' => 'imageGallery',
                         'queryColumnType' => 
                        array (
                          'images' => 'text',
                          'hotspots' => 'text',
                        ),
                         'columnType' => 
                        array (
                          'images' => 'text',
                          'hotspots' => 'text',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ImageGallery',
                         'width' => NULL,
                         'height' => NULL,
                         'uploadPath' => '',
                         'ratioX' => NULL,
                         'ratioY' => NULL,
                         'predefinedDataTemplates' => '',
                         'name' => 'Images360',
                         'title' => '360 Images',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; ',
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
                     'name' => 'Alternate_Images',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Alternate Images',
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
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'altImage1',
                         'title' => 'Alternate Image 1',
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
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'altImage2',
                         'title' => 'Alternate Image 2',
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
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'altImage3',
                         'title' => 'Alternate Image 3',
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
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'altImage4',
                         'title' => 'Alternate Image 4',
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
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'altImage5',
                         'title' => 'Alternate Image 5',
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
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'altImage6',
                         'title' => 'Alternate Image 6',
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
                      6 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'altImage7',
                         'title' => 'Alternate Image 7',
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
                      7 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'altImage8',
                         'title' => 'Alternate Image 8',
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
                      8 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'certificationImage',
                         'title' => 'Certification Image',
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
                     'name' => 'Videos',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Videos',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                         'fieldtype' => 'video',
                         'width' => 300,
                         'height' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\Video',
                         'name' => 'video1',
                         'title' => 'Video 1',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                         'fieldtype' => 'video',
                         'width' => 300,
                         'height' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\Video',
                         'name' => 'video2',
                         'title' => 'Video 2',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                         'fieldtype' => 'video',
                         'width' => 300,
                         'height' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\Video',
                         'name' => 'video3',
                         'title' => 'Video 3',
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
                    ),
                     'locked' => false,
                     'icon' => '',
                  )),
                  3 => 
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyRelation::__set_state(array(
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
                         'fieldtype' => 'advancedManyToManyRelation',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ElementMetadata[]',
                         'optimizedAdminLoading' => false,
                         'enableBatchEdit' => false,
                         'allowMultipleAssignments' => false,
                         'width' => '',
                         'height' => '',
                         'maxItems' => 20,
                         'assetUploadPath' => '',
                         'queryColumnType' => 'text',
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
                         'pathFormatterClass' => 'AppBundle\\Formatter\\AssetFormatter',
                         'name' => 'Document',
                         'title' => 'Document',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
                         'fieldtype' => 'manyToManyRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => 3,
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
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'classes' => 
                        array (
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'BrandingLaylineAssets',
                         'title' => 'Branding/Layline Assets',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
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
                     'icon' => '',
                  )),
                  4 => 
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
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'LeftPrintCatalogImage',
                         'title' => 'Left Image',
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
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'RightPrintCatalogImage',
                         'title' => 'Right Image',
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
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'DrawingPictureForCatalog',
                         'title' => 'Drawing Picture',
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
                    ),
                     'locked' => false,
                     'icon' => '',
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Certification',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Certification',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyRelation::__set_state(array(
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
                         'fieldtype' => 'advancedManyToManyRelation',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ElementMetadata[]',
                         'optimizedAdminLoading' => false,
                         'enableBatchEdit' => false,
                         'allowMultipleAssignments' => false,
                         'width' => '',
                         'height' => '',
                         'maxItems' => 20,
                         'assetUploadPath' => '',
                         'queryColumnType' => 'text',
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
                         'pathFormatterClass' => 'AppBundle\\Formatter\\AssetFormatter',
                         'name' => 'Certificate1',
                         'title' => 'Certificate 1',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyRelation::__set_state(array(
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
                         'fieldtype' => 'advancedManyToManyRelation',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ElementMetadata[]',
                         'optimizedAdminLoading' => false,
                         'enableBatchEdit' => false,
                         'allowMultipleAssignments' => false,
                         'width' => '',
                         'height' => '',
                         'maxItems' => 20,
                         'assetUploadPath' => '',
                         'queryColumnType' => 'text',
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
                         'name' => 'Certificate2',
                         'title' => 'Certificate 2',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
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
                     'icon' => '',
                  )),
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/image-region.svg',
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => '',
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
                 'cols' => 8,
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
                  7 => 
                  array (
                    'key' => 7,
                    'label' => 'Condition Type',
                  ),
                ),
                 'queryColumnType' => 'longtext',
                 'columnType' => 'longtext',
                 'phpdocType' => 'array',
                 'name' => 'priceData',
                 'title' => 'Price Data',
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/currency_exchange.svg',
          )),
          5 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => '',
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
                 'labelWidth' => 100,
                 'border' => false,
                 'provideSplitView' => false,
                 'tabPosition' => NULL,
                 'hideLabelsWhenTabsReached' => NULL,
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/accept_database.svg',
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
   'group' => 'IFSEU_ProductData',
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
