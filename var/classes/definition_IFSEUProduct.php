<?php 

/** 
* Generated at: 2023-03-14T05:02:36+01:00
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
- PressureUntil [numeric]
- onlyOpenSystem [booleanSelect]
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
- DampableUntil1T [numeric]
- DampableUntil2T [numeric]
- siopFullCode [input]
- SIOPLevel1 [manyToManyObjectRelation]
- SIOPLevel2 [manyToManyObjectRelation]
- SIOPLevel3 [manyToManyObjectRelation]
- SIOPLevel4 [manyToManyObjectRelation]
- SIOPLevel5 [manyToManyObjectRelation]
- SIOPLevel6 [manyToManyObjectRelation]
- mainCategory [manyToManyObjectRelation]
- subCategory [manyToManyObjectRelation]
- fittingCategory [manyToManyObjectRelation]
- fittingSubCategory [manyToManyObjectRelation]
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
- OnStock [booleanSelect]
- Amount [input]
- productionLengths [numeric]
- ConnectionType [input]
- Note [input]
- Currency [input]
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
   'modificationDate' => 1678766552,
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
                         'name' => 'Layout',
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
                                        'key' => NULL,
                                        'value' => 7186053,
                                      ),
                                      1 => 
                                      array (
                                        'key' => '20R3D1 HEATER HOSE',
                                        'value' => 1829378,
                                      ),
                                      2 => 
                                      array (
                                        'key' => '20R3D2 HEATER HOSE',
                                        'value' => 1829349,
                                      ),
                                      3 => 
                                      array (
                                        'key' => '3-M 78-8007-5633-6 BLUE',
                                        'value' => 1829116,
                                      ),
                                      4 => 
                                      array (
                                        'key' => '3-M 78-8007-5637-7',
                                        'value' => 1829150,
                                      ),
                                      5 => 
                                      array (
                                        'key' => '3-M 78-8008-5757-1',
                                        'value' => 1829144,
                                      ),
                                      6 => 
                                      array (
                                        'key' => '3M 3020',
                                        'value' => 13056808,
                                      ),
                                      7 => 
                                      array (
                                        'key' => '556-50A',
                                        'value' => 1829102,
                                      ),
                                      8 => 
                                      array (
                                        'key' => 'A ZETA GOMMA',
                                        'value' => 13056773,
                                      ),
                                      9 => 
                                      array (
                                        'key' => 'A&E',
                                        'value' => 13056798,
                                      ),
                                      10 => 
                                      array (
                                        'key' => 'A&H',
                                        'value' => 1829180,
                                      ),
                                      11 => 
                                      array (
                                        'key' => 'A&M',
                                        'value' => 1829168,
                                      ),
                                      12 => 
                                      array (
                                        'key' => 'A.R. Thomson',
                                        'value' => 1645,
                                      ),
                                      13 => 
                                      array (
                                        'key' => 'A1',
                                        'value' => 5764903,
                                      ),
                                      14 => 
                                      array (
                                        'key' => 'ABBEY EXTREMEFLEX BEVERAGE',
                                        'value' => 13056769,
                                      ),
                                      15 => 
                                      array (
                                        'key' => 'Abbott',
                                        'value' => 1646,
                                      ),
                                      16 => 
                                      array (
                                        'key' => 'Abbott 1025 Series',
                                        'value' => 1647,
                                      ),
                                      17 => 
                                      array (
                                        'key' => 'Abbott Chem Grout',
                                        'value' => 1648,
                                      ),
                                      18 => 
                                      array (
                                        'key' => 'ABBOTT GOODYEAR GRIP',
                                        'value' => 1829149,
                                      ),
                                      19 => 
                                      array (
                                        'key' => 'ABBOTT INLET HOSE',
                                        'value' => 1829145,
                                      ),
                                      20 => 
                                      array (
                                        'key' => 'ABLE',
                                        'value' => 5759838,
                                      ),
                                      21 => 
                                      array (
                                        'key' => 'ABS Blast',
                                        'value' => 1649,
                                      ),
                                      22 => 
                                      array (
                                        'key' => 'ACADIANA',
                                        'value' => 13056770,
                                      ),
                                      23 => 
                                      array (
                                        'key' => 'Accord Tank Cleaning',
                                        'value' => 1650,
                                      ),
                                      24 => 
                                      array (
                                        'key' => 'Ace Brewline',
                                        'value' => 1651,
                                      ),
                                      25 => 
                                      array (
                                        'key' => 'Ace Food',
                                        'value' => 1652,
                                      ),
                                      26 => 
                                      array (
                                        'key' => 'Ace Food Discharge',
                                        'value' => 1653,
                                      ),
                                      27 => 
                                      array (
                                        'key' => 'ACE GARDEN',
                                        'value' => 14091606,
                                      ),
                                      28 => 
                                      array (
                                        'key' => 'Ace Gray Food',
                                        'value' => 1654,
                                      ),
                                      29 => 
                                      array (
                                        'key' => 'ACE RCR FLEXRITE',
                                        'value' => 1655,
                                      ),
                                      30 => 
                                      array (
                                        'key' => 'ACE RCT FLEXRITE',
                                        'value' => 1656,
                                      ),
                                      31 => 
                                      array (
                                        'key' => 'ACE RDC FOOD',
                                        'value' => 1657,
                                      ),
                                      32 => 
                                      array (
                                        'key' => 'ACE RSD FOOD',
                                        'value' => 1658,
                                      ),
                                      33 => 
                                      array (
                                        'key' => 'ACE WASHDOWN',
                                        'value' => 13056768,
                                      ),
                                      34 => 
                                      array (
                                        'key' => 'AD SEALING HYDROCARBON DRAIN',
                                        'value' => 1659,
                                      ),
                                      35 => 
                                      array (
                                        'key' => 'ADVANTAGE™',
                                        'value' => 1660,
                                      ),
                                      36 => 
                                      array (
                                        'key' => 'AEROPAL',
                                        'value' => 1661,
                                      ),
                                      37 => 
                                      array (
                                        'key' => 'AEROPAL BCT',
                                        'value' => 1829413,
                                      ),
                                      38 => 
                                      array (
                                        'key' => 'AEROPAL C',
                                        'value' => 1829408,
                                      ),
                                      39 => 
                                      array (
                                        'key' => 'AEROPAL CT',
                                        'value' => 1829410,
                                      ),
                                      40 => 
                                      array (
                                        'key' => 'AEROPAL E',
                                        'value' => 1829409,
                                      ),
                                      41 => 
                                      array (
                                        'key' => 'AEROPAL ECT',
                                        'value' => 1829411,
                                      ),
                                      42 => 
                                      array (
                                        'key' => 'AEROPAL FCT',
                                        'value' => 1829412,
                                      ),
                                      43 => 
                                      array (
                                        'key' => 'AG SPRAY',
                                        'value' => 1662,
                                      ),
                                      44 => 
                                      array (
                                        'key' => 'AG TRUCKING',
                                        'value' => 13056771,
                                      ),
                                      45 => 
                                      array (
                                        'key' => 'AGCHEM',
                                        'value' => 1663,
                                      ),
                                      46 => 
                                      array (
                                        'key' => 'AGCHEM S&D',
                                        'value' => 1664,
                                      ),
                                      47 => 
                                      array (
                                        'key' => 'AGGIE GAS™',
                                        'value' => 1665,
                                      ),
                                      48 => 
                                      array (
                                        'key' => 'AGRI-FLEX',
                                        'value' => 1666,
                                      ),
                                      49 => 
                                      array (
                                        'key' => 'AHR WATER S&D',
                                        'value' => 1667,
                                      ),
                                      50 => 
                                      array (
                                        'key' => 'AIR & MULTIPURPOSE',
                                        'value' => 1829206,
                                      ),
                                      51 => 
                                      array (
                                        'key' => 'AIR / WATER HOSE',
                                        'value' => 5759834,
                                      ),
                                      52 => 
                                      array (
                                        'key' => 'AIR 1000',
                                        'value' => 1668,
                                      ),
                                      53 => 
                                      array (
                                        'key' => 'AIR 250',
                                        'value' => 1669,
                                      ),
                                      54 => 
                                      array (
                                        'key' => 'AIR 250 / 300 / 400',
                                        'value' => 5679575,
                                      ),
                                      55 => 
                                      array (
                                        'key' => 'AIR 300',
                                        'value' => 1670,
                                      ),
                                      56 => 
                                      array (
                                        'key' => 'AIR 300 HD',
                                        'value' => 1671,
                                      ),
                                      57 => 
                                      array (
                                        'key' => 'AIR 400',
                                        'value' => 1672,
                                      ),
                                      58 => 
                                      array (
                                        'key' => 'AIR BREATHING HOSE',
                                        'value' => 1673,
                                      ),
                                      59 => 
                                      array (
                                        'key' => 'AIR PSNS',
                                        'value' => 1674,
                                      ),
                                      60 => 
                                      array (
                                        'key' => 'AIR PUMP GUNITE',
                                        'value' => 1675,
                                      ),
                                      61 => 
                                      array (
                                        'key' => 'AIR TRIX',
                                        'value' => 1676,
                                      ),
                                      62 => 
                                      array (
                                        'key' => 'AIR-A-PLANE GLYCOL',
                                        'value' => 1677,
                                      ),
                                      63 => 
                                      array (
                                        'key' => 'AIR-WATER 400',
                                        'value' => 1686,
                                      ),
                                      64 => 
                                      array (
                                        'key' => 'AIRCRAFT FUEL SENSING',
                                        'value' => 5601937,
                                      ),
                                      65 => 
                                      array (
                                        'key' => 'AIRCRAFT FUELING',
                                        'value' => 1678,
                                      ),
                                      66 => 
                                      array (
                                        'key' => 'AIRGAS',
                                        'value' => 7079916,
                                      ),
                                      67 => 
                                      array (
                                        'key' => 'AIRGAS FRONTIER',
                                        'value' => 1679,
                                      ),
                                      68 => 
                                      array (
                                        'key' => 'AIRGAS GRADE R',
                                        'value' => 1680,
                                      ),
                                      69 => 
                                      array (
                                        'key' => 'AIRGAS GRADE RM',
                                        'value' => 1681,
                                      ),
                                      70 => 
                                      array (
                                        'key' => 'AIRGAS GRADE T',
                                        'value' => 1682,
                                      ),
                                      71 => 
                                      array (
                                        'key' => 'AIRGAS INERT GAS',
                                        'value' => 13056825,
                                      ),
                                      72 => 
                                      array (
                                        'key' => 'AIRMAX FLEXIMAX',
                                        'value' => 1683,
                                      ),
                                      73 => 
                                      array (
                                        'key' => 'AIRMAX PROMAX',
                                        'value' => 1684,
                                      ),
                                      74 => 
                                      array (
                                        'key' => 'AIRMAX SUPERMAX',
                                        'value' => 1685,
                                      ),
                                      75 => 
                                      array (
                                        'key' => 'AIRSER',
                                        'value' => 1829328,
                                      ),
                                      76 => 
                                      array (
                                        'key' => 'AIRSTAR',
                                        'value' => 7079918,
                                      ),
                                      77 => 
                                      array (
                                        'key' => 'AJAX',
                                        'value' => 1687,
                                      ),
                                      78 => 
                                      array (
                                        'key' => 'ALASKA RUBBER',
                                        'value' => 1688,
                                      ),
                                      79 => 
                                      array (
                                        'key' => 'ALCAN MUD STACKING',
                                        'value' => 1689,
                                      ),
                                      80 => 
                                      array (
                                        'key' => 'ALCOA POTROOM',
                                        'value' => 1690,
                                      ),
                                      81 => 
                                      array (
                                        'key' => 'ALEMITE',
                                        'value' => 5759833,
                                      ),
                                      82 => 
                                      array (
                                        'key' => 'ALLCRETE® TEXTILE',
                                        'value' => 1691,
                                      ),
                                      83 => 
                                      array (
                                        'key' => 'ALLCRETE® TEXTILE HD',
                                        'value' => 7278692,
                                      ),
                                      84 => 
                                      array (
                                        'key' => 'ALLCRETE® WIRE',
                                        'value' => 1692,
                                      ),
                                      85 => 
                                      array (
                                        'key' => 'ALLENT GUNITE',
                                        'value' => 1693,
                                      ),
                                      86 => 
                                      array (
                                        'key' => 'ALLENT REFRACTORY',
                                        'value' => 1694,
                                      ),
                                      87 => 
                                      array (
                                        'key' => 'ALLIED GREENS KEEPER',
                                        'value' => 13056772,
                                      ),
                                      88 => 
                                      array (
                                        'key' => 'AMEREX 07648 FIREXB',
                                        'value' => 1829096,
                                      ),
                                      89 => 
                                      array (
                                        'key' => 'AMFLO 702-610',
                                        'value' => 1695,
                                      ),
                                      90 => 
                                      array (
                                        'key' => 'AMMONIUM NITRATE BLAST',
                                        'value' => 1696,
                                      ),
                                      91 => 
                                      array (
                                        'key' => 'AMMONIUM NITRATE HD',
                                        'value' => 1697,
                                      ),
                                      92 => 
                                      array (
                                        'key' => 'AMMONIUM NITRATE PELLET',
                                        'value' => 1698,
                                      ),
                                      93 => 
                                      array (
                                        'key' => 'ANCHOR AIR',
                                        'value' => 13056774,
                                      ),
                                      94 => 
                                      array (
                                        'key' => 'ANSUL 423267',
                                        'value' => 1829236,
                                      ),
                                      95 => 
                                      array (
                                        'key' => 'ANSUL 423581',
                                        'value' => 1829215,
                                      ),
                                      96 => 
                                      array (
                                        'key' => 'ANSUL 426809',
                                        'value' => 1829103,
                                      ),
                                      97 => 
                                      array (
                                        'key' => 'ANSUL 429196',
                                        'value' => 1829158,
                                      ),
                                      98 => 
                                      array (
                                        'key' => 'ANSUL 431352',
                                        'value' => 1829112,
                                      ),
                                      99 => 
                                      array (
                                        'key' => 'ANSUL 518518',
                                        'value' => 1829141,
                                      ),
                                      100 => 
                                      array (
                                        'key' => 'ANSUL 535688',
                                        'value' => 1829187,
                                      ),
                                      101 => 
                                      array (
                                        'key' => 'ANSUL 7083',
                                        'value' => 1829173,
                                      ),
                                      102 => 
                                      array (
                                        'key' => 'ANSUL 7091',
                                        'value' => 1829166,
                                      ),
                                      103 => 
                                      array (
                                        'key' => 'ANSUL 71976',
                                        'value' => 1829122,
                                      ),
                                      104 => 
                                      array (
                                        'key' => 'ANSUL 71980',
                                        'value' => 1829234,
                                      ),
                                      105 => 
                                      array (
                                        'key' => 'ANSUL 79007',
                                        'value' => 1829131,
                                      ),
                                      106 => 
                                      array (
                                        'key' => 'APACHE',
                                        'value' => 1699,
                                      ),
                                      107 => 
                                      array (
                                        'key' => 'APOLLO',
                                        'value' => 1700,
                                      ),
                                      108 => 
                                      array (
                                        'key' => 'APOLLO FLEXDOCK',
                                        'value' => 1701,
                                      ),
                                      109 => 
                                      array (
                                        'key' => 'APPION MEGAFLOW CT5',
                                        'value' => 1829128,
                                      ),
                                      110 => 
                                      array (
                                        'key' => 'APPLIED INDUSTRIAL TECH',
                                        'value' => 1702,
                                      ),
                                      111 => 
                                      array (
                                        'key' => 'APPLIED JETTING',
                                        'value' => 1703,
                                      ),
                                      112 => 
                                      array (
                                        'key' => 'AQUAHAMMER',
                                        'value' => 1704,
                                      ),
                                      113 => 
                                      array (
                                        'key' => 'AQUAPAL',
                                        'value' => 1705,
                                      ),
                                      114 => 
                                      array (
                                        'key' => 'AR THOMSON',
                                        'value' => 1829384,
                                      ),
                                      115 => 
                                      array (
                                        'key' => 'AR THOMSON EXTREME CRIMP',
                                        'value' => 1706,
                                      ),
                                      116 => 
                                      array (
                                        'key' => 'ARCAIR 5077MP',
                                        'value' => 1829172,
                                      ),
                                      117 => 
                                      array (
                                        'key' => 'ARCAIR INSULATOR',
                                        'value' => 1707,
                                      ),
                                      118 => 
                                      array (
                                        'key' => 'ARCHON',
                                        'value' => 1708,
                                      ),
                                      119 => 
                                      array (
                                        'key' => 'ARCO BLAST XF',
                                        'value' => 1709,
                                      ),
                                      120 => 
                                      array (
                                        'key' => 'ARCTIC EXTREMEFLEX™',
                                        'value' => 1710,
                                      ),
                                      121 => 
                                      array (
                                        'key' => 'ARCTIC FLEXTRA',
                                        'value' => 1711,
                                      ),
                                      122 => 
                                      array (
                                        'key' => 'ARCTIC FLEXWING®',
                                        'value' => 1712,
                                      ),
                                      123 => 
                                      array (
                                        'key' => 'ARCTIC FUEL DISCHARGE',
                                        'value' => 1713,
                                      ),
                                      124 => 
                                      array (
                                        'key' => 'ARCTIC LCP3',
                                        'value' => 1714,
                                      ),
                                      125 => 
                                      array (
                                        'key' => 'ARCTIC LCP4S',
                                        'value' => 1715,
                                      ),
                                      126 => 
                                      array (
                                        'key' => 'ARCTIC LCP6S',
                                        'value' => 1716,
                                      ),
                                      127 => 
                                      array (
                                        'key' => 'ARCTIC LR16SC',
                                        'value' => 1717,
                                      ),
                                      128 => 
                                      array (
                                        'key' => 'ARCTIC LR2SN',
                                        'value' => 1718,
                                      ),
                                      129 => 
                                      array (
                                        'key' => 'ARCTIC ORTAC™',
                                        'value' => 1719,
                                      ),
                                      130 => 
                                      array (
                                        'key' => 'ARCTIC ORTAC™ PLUS',
                                        'value' => 1720,
                                      ),
                                      131 => 
                                      array (
                                        'key' => 'ARCTIC RIG SUPPLY',
                                        'value' => 1721,
                                      ),
                                      132 => 
                                      array (
                                        'key' => 'ARMOR-FLEX PRO',
                                        'value' => 1728,
                                      ),
                                      133 => 
                                      array (
                                        'key' => 'ARMORCOAT ACP4',
                                        'value' => 1723,
                                      ),
                                      134 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC12',
                                        'value' => 1724,
                                      ),
                                      135 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC13',
                                        'value' => 1725,
                                      ),
                                      136 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC15',
                                        'value' => 1726,
                                      ),
                                      137 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC16SC',
                                        'value' => 1727,
                                      ),
                                      138 => 
                                      array (
                                        'key' => 'ARMORCOAT™ ACP3',
                                        'value' => 1722,
                                      ),
                                      139 => 
                                      array (
                                        'key' => 'ARMORVIN TOTAL PU TPHF',
                                        'value' => 13056775,
                                      ),
                                      140 => 
                                      array (
                                        'key' => 'ARONSON',
                                        'value' => 1729,
                                      ),
                                      141 => 
                                      array (
                                        'key' => 'ARPHSE',
                                        'value' => 1730,
                                      ),
                                      142 => 
                                      array (
                                        'key' => 'ARTRAC',
                                        'value' => 1731,
                                      ),
                                      143 => 
                                      array (
                                        'key' => 'ARVAC SW',
                                        'value' => 1732,
                                      ),
                                      144 => 
                                      array (
                                        'key' => 'AS1335 TWIN-LINE',
                                        'value' => 1733,
                                      ),
                                      145 => 
                                      array (
                                        'key' => 'AS2435 TYPE 1 AIRBRAKE',
                                        'value' => 1734,
                                      ),
                                      146 => 
                                      array (
                                        'key' => 'ASJ',
                                        'value' => 1735,
                                      ),
                                      147 => 
                                      array (
                                        'key' => 'ASJ FLEXCRETE TEXTILE',
                                        'value' => 13056776,
                                      ),
                                      148 => 
                                      array (
                                        'key' => 'ASJ VERSACRETE',
                                        'value' => 1736,
                                      ),
                                      149 => 
                                      array (
                                        'key' => 'ASTARAS INSULATER',
                                        'value' => 1829229,
                                      ),
                                      150 => 
                                      array (
                                        'key' => 'ATLANT WATER',
                                        'value' => 1737,
                                      ),
                                      151 => 
                                      array (
                                        'key' => 'ATLANTIC 9000',
                                        'value' => 13056777,
                                      ),
                                      152 => 
                                      array (
                                        'key' => 'ATLAS',
                                        'value' => 1738,
                                      ),
                                      153 => 
                                      array (
                                        'key' => 'ATRUBB NR SPRAY',
                                        'value' => 1739,
                                      ),
                                      154 => 
                                      array (
                                        'key' => 'AUGER ARC PILING',
                                        'value' => 1740,
                                      ),
                                      155 => 
                                      array (
                                        'key' => 'AUSTIN',
                                        'value' => 1741,
                                      ),
                                      156 => 
                                      array (
                                        'key' => 'AUSTIN RUBBER',
                                        'value' => 1742,
                                      ),
                                      157 => 
                                      array (
                                        'key' => 'AUTOGRIP',
                                        'value' => 1743,
                                      ),
                                      158 => 
                                      array (
                                        'key' => 'AXIAL FAN HAWK PD',
                                        'value' => 1829526,
                                      ),
                                      159 => 
                                      array (
                                        'key' => 'BAFSCO',
                                        'value' => 13056778,
                                      ),
                                      160 => 
                                      array (
                                        'key' => 'BAHCAL',
                                        'value' => 1744,
                                      ),
                                      161 => 
                                      array (
                                        'key' => 'BANDING COIL',
                                        'value' => 1745,
                                      ),
                                      162 => 
                                      array (
                                        'key' => 'BARYTES HARDWALL',
                                        'value' => 7717365,
                                      ),
                                      163 => 
                                      array (
                                        'key' => 'BC COLD FLEX',
                                        'value' => 1746,
                                      ),
                                      164 => 
                                      array (
                                        'key' => 'BC GASOLINE',
                                        'value' => 1747,
                                      ),
                                      165 => 
                                      array (
                                        'key' => 'BC MARINA',
                                        'value' => 1748,
                                      ),
                                      166 => 
                                      array (
                                        'key' => 'BECKER',
                                        'value' => 13056779,
                                      ),
                                      167 => 
                                      array (
                                        'key' => 'BEDFORD',
                                        'value' => 1749,
                                      ),
                                      168 => 
                                      array (
                                        'key' => 'BELTERRA',
                                        'value' => 13056780,
                                      ),
                                      169 => 
                                      array (
                                        'key' => 'BENTONQUIP',
                                        'value' => 13056786,
                                      ),
                                      170 => 
                                      array (
                                        'key' => 'BLACK FLEXTRA II',
                                        'value' => 1750,
                                      ),
                                      171 => 
                                      array (
                                        'key' => 'BLACK FLEXTRA II 150',
                                        'value' => 1829333,
                                      ),
                                      172 => 
                                      array (
                                        'key' => 'BLACK FLEXWING®',
                                        'value' => 1751,
                                      ),
                                      173 => 
                                      array (
                                        'key' => 'BLACK JACK',
                                        'value' => 5355084,
                                      ),
                                      174 => 
                                      array (
                                        'key' => 'BLACK SOFTWALL',
                                        'value' => 5354194,
                                      ),
                                      175 => 
                                      array (
                                        'key' => 'BLACKHAWK PD',
                                        'value' => 1829520,
                                      ),
                                      176 => 
                                      array (
                                        'key' => 'BLAST',
                                        'value' => 1752,
                                      ),
                                      177 => 
                                      array (
                                        'key' => 'BLAST HD',
                                        'value' => 7278691,
                                      ),
                                      178 => 
                                      array (
                                        'key' => 'BLASTHOLE SLURRY & DEWATERING',
                                        'value' => 1753,
                                      ),
                                      179 => 
                                      array (
                                        'key' => 'BLASTHOSE SLURRY',
                                        'value' => 1829297,
                                      ),
                                      180 => 
                                      array (
                                        'key' => 'BLASTMASTER HD',
                                        'value' => 1754,
                                      ),
                                      181 => 
                                      array (
                                        'key' => 'BLAUDIECK',
                                        'value' => 1755,
                                      ),
                                      182 => 
                                      array (
                                        'key' => 'BLAUSTRAHL',
                                        'value' => 1829415,
                                      ),
                                      183 => 
                                      array (
                                        'key' => 'BLISSFUL FISHERMAN',
                                        'value' => 1756,
                                      ),
                                      184 => 
                                      array (
                                        'key' => 'BLUCOR FLANGE',
                                        'value' => 1758,
                                      ),
                                      185 => 
                                      array (
                                        'key' => 'BLUCOR™',
                                        'value' => 1757,
                                      ),
                                      186 => 
                                      array (
                                        'key' => 'BLUE FLEXWING®',
                                        'value' => 1759,
                                      ),
                                      187 => 
                                      array (
                                        'key' => 'BLUE FLOUR',
                                        'value' => 1760,
                                      ),
                                      188 => 
                                      array (
                                        'key' => 'BLUE XTREME STRAIGH RAD HOSE',
                                        'value' => 1761,
                                      ),
                                      189 => 
                                      array (
                                        'key' => 'BOOTMOR',
                                        'value' => 1762,
                                      ),
                                      190 => 
                                      array (
                                        'key' => 'BOP SLEEVE',
                                        'value' => 1763,
                                      ),
                                      191 => 
                                      array (
                                        'key' => 'BOP WRAP',
                                        'value' => 1764,
                                      ),
                                      192 => 
                                      array (
                                        'key' => 'BOTTOM LOADING',
                                        'value' => 1765,
                                      ),
                                      193 => 
                                      array (
                                        'key' => 'BOWLING',
                                        'value' => 1829514,
                                      ),
                                      194 => 
                                      array (
                                        'key' => 'BR7',
                                        'value' => 1766,
                                      ),
                                      195 => 
                                      array (
                                        'key' => 'BRAIDAIR',
                                        'value' => 1767,
                                      ),
                                      196 => 
                                      array (
                                        'key' => 'BRANHAM AIR',
                                        'value' => 1829343,
                                      ),
                                      197 => 
                                      array (
                                        'key' => 'BRANHAM CHEMONE SUPERIOR',
                                        'value' => 1768,
                                      ),
                                      198 => 
                                      array (
                                        'key' => 'BREATHING AIR',
                                        'value' => 1769,
                                      ),
                                      199 => 
                                      array (
                                        'key' => 'BREATHING AIR HOSE',
                                        'value' => 1829260,
                                      ),
                                      200 => 
                                      array (
                                        'key' => 'BREATHING AIR PLUS',
                                        'value' => 1770,
                                      ),
                                      201 => 
                                      array (
                                        'key' => 'BRENNTAG',
                                        'value' => 1771,
                                      ),
                                      202 => 
                                      array (
                                        'key' => 'BREWERS HOSE',
                                        'value' => 1772,
                                      ),
                                      203 => 
                                      array (
                                        'key' => 'BREWLINE',
                                        'value' => 1773,
                                      ),
                                      204 => 
                                      array (
                                        'key' => 'BRICK RED AIR',
                                        'value' => 1774,
                                      ),
                                      205 => 
                                      array (
                                        'key' => 'BRIDGEPOINT',
                                        'value' => 1775,
                                      ),
                                      206 => 
                                      array (
                                        'key' => 'BRIGADE® MINE',
                                        'value' => 1776,
                                      ),
                                      207 => 
                                      array (
                                        'key' => 'BRINE',
                                        'value' => 13056787,
                                      ),
                                      208 => 
                                      array (
                                        'key' => 'BRINE HOSE',
                                        'value' => 1777,
                                      ),
                                      209 => 
                                      array (
                                        'key' => 'BROOM SWEEPER',
                                        'value' => 1778,
                                      ),
                                      210 => 
                                      array (
                                        'key' => 'BROTHERS',
                                        'value' => 13056788,
                                      ),
                                      211 => 
                                      array (
                                        'key' => 'BROWN FLEXWING®',
                                        'value' => 1779,
                                      ),
                                      212 => 
                                      array (
                                        'key' => 'BROWN/BLU FLEX',
                                        'value' => 1829430,
                                      ),
                                      213 => 
                                      array (
                                        'key' => 'BSP Flat Seat (British Standard Pipe)',
                                        'value' => 1829966,
                                      ),
                                      214 => 
                                      array (
                                        'key' => 'BSPP (British Standard Pipe Parallel)',
                                        'value' => 1829964,
                                      ),
                                      215 => 
                                      array (
                                        'key' => 'BSPP (British Standard Pipe Parallel) O-Rings',
                                        'value' => 3831015,
                                      ),
                                      216 => 
                                      array (
                                        'key' => 'BSPP, Bonded Seal',
                                        'value' => 14152432,
                                      ),
                                      217 => 
                                      array (
                                        'key' => 'BSPP, Bulkhead Locknut',
                                        'value' => 14152431,
                                      ),
                                      218 => 
                                      array (
                                        'key' => 'BSPP, Female - NPTF, Male',
                                        'value' => 14152435,
                                      ),
                                      219 => 
                                      array (
                                        'key' => 'BSPP, Female – BSPP, Female',
                                        'value' => 14152433,
                                      ),
                                      220 => 
                                      array (
                                        'key' => 'BSPP, Female – BSPT, Male',
                                        'value' => 14152434,
                                      ),
                                      221 => 
                                      array (
                                        'key' => 'BSPP, Female, Swivel Tee',
                                        'value' => 14152439,
                                      ),
                                      222 => 
                                      array (
                                        'key' => 'BSPP, Female, Swivel –  BSPP, Female, Swivel, 90° Elbow',
                                        'value' => 14152438,
                                      ),
                                      223 => 
                                      array (
                                        'key' => 'BSPP, Female, Swivel – BSPP,  Female, Swivel, 45° Elbow',
                                        'value' => 14152437,
                                      ),
                                      224 => 
                                      array (
                                        'key' => 'BSPP, Female, Swivel – BSPP, Female, Swivel',
                                        'value' => 14152436,
                                      ),
                                      225 => 
                                      array (
                                        'key' => 'BSPP, Female, Swivel – BSPP, Female, Swivel,  90° Block Elbow',
                                        'value' => 14152440,
                                      ),
                                      226 => 
                                      array (
                                        'key' => 'BSPP, Female, Swivel – BSPP, Male - BSPP, Male Tee',
                                        'value' => 14152441,
                                      ),
                                      227 => 
                                      array (
                                        'key' => 'BSPP, Female, Swivel – BSPT, Male, 90° Block Elbow',
                                        'value' => 14152442,
                                      ),
                                      228 => 
                                      array (
                                        'key' => 'BSPP, Female, Swivel – JIC 37°, Male',
                                        'value' => 14153136,
                                      ),
                                      229 => 
                                      array (
                                        'key' => 'BSPT (British Standard Pipe Tapered)',
                                        'value' => 1829965,
                                      ),
                                      230 => 
                                      array (
                                        'key' => 'BUHLER MIAG',
                                        'value' => 1780,
                                      ),
                                      231 => 
                                      array (
                                        'key' => 'BULLARD',
                                        'value' => 1829140,
                                      ),
                                      232 => 
                                      array (
                                        'key' => 'BUTTERWORTH',
                                        'value' => 1781,
                                      ),
                                      233 => 
                                      array (
                                        'key' => 'BUTTERWORTH INC.',
                                        'value' => 13056789,
                                      ),
                                      234 => 
                                      array (
                                        'key' => 'BUTYL 200',
                                        'value' => 1782,
                                      ),
                                      235 => 
                                      array (
                                        'key' => 'C&J WATER S&D',
                                        'value' => 1783,
                                      ),
                                      236 => 
                                      array (
                                        'key' => 'C&T MIL-DTL-13444H-1-6',
                                        'value' => 1829200,
                                      ),
                                      237 => 
                                      array (
                                        'key' => 'CABLE CONDUIT',
                                        'value' => 1784,
                                      ),
                                      238 => 
                                      array (
                                        'key' => 'CABLE COOLING HOSE',
                                        'value' => 1785,
                                      ),
                                      239 => 
                                      array (
                                        'key' => 'CABLE COVER',
                                        'value' => 1786,
                                      ),
                                      240 => 
                                      array (
                                        'key' => 'CAMBRG HEALY PII',
                                        'value' => 1787,
                                      ),
                                      241 => 
                                      array (
                                        'key' => 'CAMLOK',
                                        'value' => 1788,
                                      ),
                                      242 => 
                                      array (
                                        'key' => 'Capest ExtremeFlex™ Food',
                                        'value' => 14498389,
                                      ),
                                      243 => 
                                      array (
                                        'key' => 'CAPRI',
                                        'value' => 13056804,
                                      ),
                                      244 => 
                                      array (
                                        'key' => 'CARON',
                                        'value' => 13056790,
                                      ),
                                      245 => 
                                      array (
                                        'key' => 'CARON ARCTIC FLEX',
                                        'value' => 1789,
                                      ),
                                      246 => 
                                      array (
                                        'key' => 'CARON BLACK SOFTWALL',
                                        'value' => 1790,
                                      ),
                                      247 => 
                                      array (
                                        'key' => 'CARON FABCHEM',
                                        'value' => 1791,
                                      ),
                                      248 => 
                                      array (
                                        'key' => 'CASCADE DRY CEMENT',
                                        'value' => 1792,
                                      ),
                                      249 => 
                                      array (
                                        'key' => 'CASCO',
                                        'value' => 13056791,
                                      ),
                                      250 => 
                                      array (
                                        'key' => 'Catepillar Flange',
                                        'value' => 1829977,
                                      ),
                                      251 => 
                                      array (
                                        'key' => 'CATERPILLAR',
                                        'value' => 13056792,
                                      ),
                                      252 => 
                                      array (
                                        'key' => 'Caterpillar Flange O-Rings Code 61 and Code 62 Flange O-Rings',
                                        'value' => 1831352,
                                      ),
                                      253 => 
                                      array (
                                        'key' => 'Caterpillar® Flange',
                                        'value' => 1829961,
                                      ),
                                      254 => 
                                      array (
                                        'key' => 'CENEX',
                                        'value' => 1793,
                                      ),
                                      255 => 
                                      array (
                                        'key' => 'CENEX OT',
                                        'value' => 1794,
                                      ),
                                      256 => 
                                      array (
                                        'key' => 'CENTRAL ROCK DRILL',
                                        'value' => 1795,
                                      ),
                                      257 => 
                                      array (
                                        'key' => 'CHANGED TO FORTRESS WHITE',
                                        'value' => 1829316,
                                      ),
                                      258 => 
                                      array (
                                        'key' => 'CHARTER ROOF DRAIN',
                                        'value' => 12265903,
                                      ),
                                      259 => 
                                      array (
                                        'key' => 'CHEM ONE®',
                                        'value' => 1797,
                                      ),
                                      260 => 
                                      array (
                                        'key' => 'CHEMICAL ACID DISCHARGE',
                                        'value' => 1796,
                                      ),
                                      261 => 
                                      array (
                                        'key' => 'CHEMSTREAM',
                                        'value' => 1798,
                                      ),
                                      262 => 
                                      array (
                                        'key' => 'CHLO GARLOK',
                                        'value' => 1799,
                                      ),
                                      263 => 
                                      array (
                                        'key' => 'CITGO',
                                        'value' => 6422706,
                                      ),
                                      264 => 
                                      array (
                                        'key' => 'CITGO HYDROCARBON DRAIN',
                                        'value' => 1829202,
                                      ),
                                      265 => 
                                      array (
                                        'key' => 'CLAM JETTING',
                                        'value' => 1829434,
                                      ),
                                      266 => 
                                      array (
                                        'key' => 'CLEANJET',
                                        'value' => 1800,
                                      ),
                                      267 => 
                                      array (
                                        'key' => 'CLEANJET FDA',
                                        'value' => 1801,
                                      ),
                                      268 => 
                                      array (
                                        'key' => 'CLEAR PVC TUBING',
                                        'value' => 1802,
                                      ),
                                      269 => 
                                      array (
                                        'key' => 'CLEARWATER',
                                        'value' => 1803,
                                      ),
                                      270 => 
                                      array (
                                        'key' => 'CLEARWATER FLEXTRA NSF',
                                        'value' => 4683628,
                                      ),
                                      271 => 
                                      array (
                                        'key' => 'CLEARWATER SOFTWALL NSF',
                                        'value' => 4683629,
                                      ),
                                      272 => 
                                      array (
                                        'key' => 'Clip Pliers',
                                        'value' => 1830006,
                                      ),
                                      273 => 
                                      array (
                                        'key' => 'CMT FLEXIBLES LIMITED',
                                        'value' => 13056796,
                                      ),
                                      274 => 
                                      array (
                                        'key' => 'CNH',
                                        'value' => 7563318,
                                      ),
                                      275 => 
                                      array (
                                        'key' => 'CO2 HOSE',
                                        'value' => 1804,
                                      ),
                                      276 => 
                                      array (
                                        'key' => 'COAST GUARD',
                                        'value' => 1805,
                                      ),
                                      277 => 
                                      array (
                                        'key' => 'Code 61 Flange',
                                        'value' => 1829959,
                                      ),
                                      278 => 
                                      array (
                                        'key' => 'Code 61 Flange',
                                        'value' => 1829976,
                                      ),
                                      279 => 
                                      array (
                                        'key' => 'Code 61 Split Flange Clamp Kits ',
                                        'value' => 1831353,
                                      ),
                                      280 => 
                                      array (
                                        'key' => 'Code 62 Flange',
                                        'value' => 1829960,
                                      ),
                                      281 => 
                                      array (
                                        'key' => 'Code 62 Split Flange Clamp Kits',
                                        'value' => 3831018,
                                      ),
                                      282 => 
                                      array (
                                        'key' => 'COLD BLUE',
                                        'value' => 1806,
                                      ),
                                      283 => 
                                      array (
                                        'key' => 'COLD BLUE FLEX',
                                        'value' => 7186051,
                                      ),
                                      284 => 
                                      array (
                                        'key' => 'COLD FLEX',
                                        'value' => 13056797,
                                      ),
                                      285 => 
                                      array (
                                        'key' => 'COLLECTOR FLEX',
                                        'value' => 1808,
                                      ),
                                      286 => 
                                      array (
                                        'key' => 'COLLECTOR®',
                                        'value' => 1807,
                                      ),
                                      287 => 
                                      array (
                                        'key' => 'COLORITE',
                                        'value' => 1809,
                                      ),
                                      288 => 
                                      array (
                                        'key' => 'Compressor O-Ring Tube',
                                        'value' => 1829980,
                                      ),
                                      289 => 
                                      array (
                                        'key' => 'Compressor Pad Block',
                                        'value' => 1829988,
                                      ),
                                      290 => 
                                      array (
                                        'key' => 'CON FORM SUPER FLEX',
                                        'value' => 1810,
                                      ),
                                      291 => 
                                      array (
                                        'key' => 'CON-AG ECO',
                                        'value' => 6951845,
                                      ),
                                      292 => 
                                      array (
                                        'key' => 'CON-AG WATER S&D',
                                        'value' => 1811,
                                      ),
                                      293 => 
                                      array (
                                        'key' => 'CON-AG WATER S&D ECO',
                                        'value' => 7278690,
                                      ),
                                      294 => 
                                      array (
                                        'key' => 'CON-TECH',
                                        'value' => 1829228,
                                      ),
                                      295 => 
                                      array (
                                        'key' => 'CONCRETE G820',
                                        'value' => 1812,
                                      ),
                                      296 => 
                                      array (
                                        'key' => 'CONCRETE VIBRATOR',
                                        'value' => 1813,
                                      ),
                                      297 => 
                                      array (
                                        'key' => 'CONTI A&M',
                                        'value' => 1829426,
                                      ),
                                      298 => 
                                      array (
                                        'key' => 'CONTI BLUE STEAM FDA',
                                        'value' => 5554379,
                                      ),
                                      299 => 
                                      array (
                                        'key' => 'CONTI CEMENTING',
                                        'value' => 13295421,
                                      ),
                                      300 => 
                                      array (
                                        'key' => 'CONTI CHEM EXTRA',
                                        'value' => 7085031,
                                      ),
                                      301 => 
                                      array (
                                        'key' => 'CONTI CHEM OIL',
                                        'value' => 1814,
                                      ),
                                      302 => 
                                      array (
                                        'key' => 'CONTI CHEM PHARMA',
                                        'value' => 1815,
                                      ),
                                      303 => 
                                      array (
                                        'key' => 'CONTI CHEM STANDARD',
                                        'value' => 1816,
                                      ),
                                      304 => 
                                      array (
                                        'key' => 'CONTI CHEM SUPERIOR FEP',
                                        'value' => 1817,
                                      ),
                                      305 => 
                                      array (
                                        'key' => 'CONTI FEP',
                                        'value' => 7092828,
                                      ),
                                      306 => 
                                      array (
                                        'key' => 'CONTI FLUX',
                                        'value' => 13056799,
                                      ),
                                      307 => 
                                      array (
                                        'key' => 'CONTI FOOD & DRINK FLEX UPE',
                                        'value' => 10663607,
                                      ),
                                      308 => 
                                      array (
                                        'key' => 'CONTI PAINT SPRAY',
                                        'value' => 1818,
                                      ),
                                      309 => 
                                      array (
                                        'key' => 'CONTI POTABLE WATER',
                                        'value' => 1819,
                                      ),
                                      310 => 
                                      array (
                                        'key' => 'CONTI WASTE WATER',
                                        'value' => 1820,
                                      ),
                                      311 => 
                                      array (
                                        'key' => 'CONTICHEM',
                                        'value' => 1829407,
                                      ),
                                      312 => 
                                      array (
                                        'key' => 'CONTINENTAL / COX REEL',
                                        'value' => 7082340,
                                      ),
                                      313 => 
                                      array (
                                        'key' => 'CONTINENTAL MATTE GREEN',
                                        'value' => 1829282,
                                      ),
                                      314 => 
                                      array (
                                        'key' => 'CONTINENTAL STEEL STEAM 250',
                                        'value' => 1821,
                                      ),
                                      315 => 
                                      array (
                                        'key' => 'CONTI® OIL',
                                        'value' => 10709285,
                                      ),
                                      316 => 
                                      array (
                                        'key' => 'CONTI® TARSPRAY',
                                        'value' => 10705762,
                                      ),
                                      317 => 
                                      array (
                                        'key' => 'CONTRACTOR 4001',
                                        'value' => 1822,
                                      ),
                                      318 => 
                                      array (
                                        'key' => 'CONTRACTOR WATER S&D',
                                        'value' => 1823,
                                      ),
                                      319 => 
                                      array (
                                        'key' => 'CONTRACTOR\'S WATER',
                                        'value' => 1824,
                                      ),
                                      320 => 
                                      array (
                                        'key' => 'COOLING WATER',
                                        'value' => 1825,
                                      ),
                                      321 => 
                                      array (
                                        'key' => 'COOLING WATER 2.0',
                                        'value' => 1826,
                                      ),
                                      322 => 
                                      array (
                                        'key' => 'COTTON CLEANER',
                                        'value' => 1829519,
                                      ),
                                      323 => 
                                      array (
                                        'key' => 'COUPLING MALE SWIVEL',
                                        'value' => 1829191,
                                      ),
                                      324 => 
                                      array (
                                        'key' => 'CPE DISCHARGE',
                                        'value' => 1827,
                                      ),
                                      325 => 
                                      array (
                                        'key' => 'CPLAIR AIRCRAFT',
                                        'value' => 1829348,
                                      ),
                                      326 => 
                                      array (
                                        'key' => 'CREE BREWERS HOSE',
                                        'value' => 1828,
                                      ),
                                      327 => 
                                      array (
                                        'key' => 'CTI',
                                        'value' => 5355080,
                                      ),
                                      328 => 
                                      array (
                                        'key' => 'CULGAN',
                                        'value' => 13056805,
                                      ),
                                      329 => 
                                      array (
                                        'key' => 'CULVERT',
                                        'value' => 1829,
                                      ),
                                      330 => 
                                      array (
                                        'key' => 'DAMPF TRIX 5000',
                                        'value' => 1830,
                                      ),
                                      331 => 
                                      array (
                                        'key' => 'DAMPF TRIX 6000',
                                        'value' => 1831,
                                      ),
                                      332 => 
                                      array (
                                        'key' => 'DAMPFTRIX 6000',
                                        'value' => 1829406,
                                      ),
                                      333 => 
                                      array (
                                        'key' => 'DANICORP',
                                        'value' => 13056806,
                                      ),
                                      334 => 
                                      array (
                                        'key' => 'DANICORP DIVERS HOSE',
                                        'value' => 7837994,
                                      ),
                                      335 => 
                                      array (
                                        'key' => 'DARCOR RED',
                                        'value' => 1829318,
                                      ),
                                      336 => 
                                      array (
                                        'key' => 'DARCY REDWING FUEL OIL',
                                        'value' => 1832,
                                      ),
                                      337 => 
                                      array (
                                        'key' => 'DEADMAN AIRCRAFT REFUELING',
                                        'value' => 1833,
                                      ),
                                      338 => 
                                      array (
                                        'key' => 'DEADMAN SANDBLAST',
                                        'value' => 1834,
                                      ),
                                      339 => 
                                      array (
                                        'key' => 'DEEP BLUE',
                                        'value' => 1829431,
                                      ),
                                      340 => 
                                      array (
                                        'key' => 'DEERE',
                                        'value' => 1835,
                                      ),
                                      341 => 
                                      array (
                                        'key' => 'DEF DISPENSING',
                                        'value' => 1836,
                                      ),
                                      342 => 
                                      array (
                                        'key' => 'DEF TRANSFER',
                                        'value' => 1837,
                                      ),
                                      343 => 
                                      array (
                                        'key' => 'DEL TWIN-LINE GRADE R',
                                        'value' => 1838,
                                      ),
                                      344 => 
                                      array (
                                        'key' => 'DEL TWIN-LINE GRADE RM',
                                        'value' => 1839,
                                      ),
                                      345 => 
                                      array (
                                        'key' => 'DENVER',
                                        'value' => 1840,
                                      ),
                                      346 => 
                                      array (
                                        'key' => 'DENVER CONC VIBR',
                                        'value' => 1841,
                                      ),
                                      347 => 
                                      array (
                                        'key' => 'DESERT DR16SC',
                                        'value' => 1842,
                                      ),
                                      348 => 
                                      array (
                                        'key' => 'DESERT DR1SN',
                                        'value' => 1843,
                                      ),
                                      349 => 
                                      array (
                                        'key' => 'DESERT DR2SN',
                                        'value' => 1844,
                                      ),
                                      350 => 
                                      array (
                                        'key' => 'DESERT DR5',
                                        'value' => 1845,
                                      ),
                                      351 => 
                                      array (
                                        'key' => 'DESERT DUT',
                                        'value' => 1846,
                                      ),
                                      352 => 
                                      array (
                                        'key' => 'DEVILBISS',
                                        'value' => 1829178,
                                      ),
                                      353 => 
                                      array (
                                        'key' => 'DEWATERING',
                                        'value' => 1847,
                                      ),
                                      354 => 
                                      array (
                                        'key' => 'DIAMOND',
                                        'value' => 1829370,
                                      ),
                                      355 => 
                                      array (
                                        'key' => 'DIESEL OIL HARDWALL',
                                        'value' => 1848,
                                      ),
                                      356 => 
                                      array (
                                        'key' => 'DIESEL OIL SOFTWALL',
                                        'value' => 1849,
                                      ),
                                      357 => 
                                      array (
                                        'key' => 'DIGESTER',
                                        'value' => 1850,
                                      ),
                                      358 => 
                                      array (
                                        'key' => 'DIISOCYANATE',
                                        'value' => 1851,
                                      ),
                                      359 => 
                                      array (
                                        'key' => 'DIN 24 Heavy',
                                        'value' => 1829968,
                                      ),
                                      360 => 
                                      array (
                                        'key' => 'DIN 24 Heavy O-Rings',
                                        'value' => 3831017,
                                      ),
                                      361 => 
                                      array (
                                        'key' => 'DIN 24 Light',
                                        'value' => 1829967,
                                      ),
                                      362 => 
                                      array (
                                        'key' => 'DIN 24 Light O-Rings',
                                        'value' => 3831016,
                                      ),
                                      363 => 
                                      array (
                                        'key' => 'DIN 60',
                                        'value' => 1829969,
                                      ),
                                      364 => 
                                      array (
                                        'key' => 'DINGA HOT WATER GUN',
                                        'value' => 1852,
                                      ),
                                      365 => 
                                      array (
                                        'key' => 'DINGA NOZZLE',
                                        'value' => 5356966,
                                      ),
                                      366 => 
                                      array (
                                        'key' => 'DISCHARGE',
                                        'value' => 1853,
                                      ),
                                      367 => 
                                      array (
                                        'key' => 'DISHWASHER DRAIN',
                                        'value' => 1854,
                                      ),
                                      368 => 
                                      array (
                                        'key' => 'DISTILLERY 150',
                                        'value' => 1855,
                                      ),
                                      369 => 
                                      array (
                                        'key' => 'DISTRB ACID',
                                        'value' => 1856,
                                      ),
                                      370 => 
                                      array (
                                        'key' => 'DISTRB ARCTIC ORTAC',
                                        'value' => 1857,
                                      ),
                                      371 => 
                                      array (
                                        'key' => 'DISTRB STEEL AIR',
                                        'value' => 1858,
                                      ),
                                      372 => 
                                      array (
                                        'key' => 'DISTRB WATER S&D',
                                        'value' => 1859,
                                      ),
                                      373 => 
                                      array (
                                        'key' => 'DIVERSIFLEX',
                                        'value' => 1860,
                                      ),
                                      374 => 
                                      array (
                                        'key' => 'DIVERSIPIPE',
                                        'value' => 1861,
                                      ),
                                      375 => 
                                      array (
                                        'key' => 'DIVING HOSE',
                                        'value' => 1862,
                                      ),
                                      376 => 
                                      array (
                                        'key' => 'DMC CAUSTIC',
                                        'value' => 1863,
                                      ),
                                      377 => 
                                      array (
                                        'key' => 'DOCK',
                                        'value' => 1864,
                                      ),
                                      378 => 
                                      array (
                                        'key' => 'DOCK EN1765 L15',
                                        'value' => 1865,
                                      ),
                                      379 => 
                                      array (
                                        'key' => 'DOCK EN1765 S15',
                                        'value' => 1866,
                                      ),
                                      380 => 
                                      array (
                                        'key' => 'DOCK FDA',
                                        'value' => 1867,
                                      ),
                                      381 => 
                                      array (
                                        'key' => 'DOCK SMOOTH BORE HOT SULFUR',
                                        'value' => 1868,
                                      ),
                                      382 => 
                                      array (
                                        'key' => 'DOCK SUPPLY SW',
                                        'value' => 1869,
                                      ),
                                      383 => 
                                      array (
                                        'key' => 'DR16SC',
                                        'value' => 1830041,
                                      ),
                                      384 => 
                                      array (
                                        'key' => 'DRAGER',
                                        'value' => 7740237,
                                      ),
                                      385 => 
                                      array (
                                        'key' => 'DREDGE SLEEVE',
                                        'value' => 1870,
                                      ),
                                      386 => 
                                      array (
                                        'key' => 'DRILL WATER',
                                        'value' => 1871,
                                      ),
                                      387 => 
                                      array (
                                        'key' => 'DRINK FLEX',
                                        'value' => 5300789,
                                      ),
                                      388 => 
                                      array (
                                        'key' => 'DRINKLINE',
                                        'value' => 1872,
                                      ),
                                      389 => 
                                      array (
                                        'key' => 'DRY CEMENT & BARYTES HW',
                                        'value' => 7717364,
                                      ),
                                      390 => 
                                      array (
                                        'key' => 'DRY CEMENT HARDWALL',
                                        'value' => 7717366,
                                      ),
                                      391 => 
                                      array (
                                        'key' => 'DRY CEMENT HD HARDWALL',
                                        'value' => 1873,
                                      ),
                                      392 => 
                                      array (
                                        'key' => 'DRY CEMENT SOFTWALL',
                                        'value' => 1874,
                                      ),
                                      393 => 
                                      array (
                                        'key' => 'DRY ICE HOSE',
                                        'value' => 1875,
                                      ),
                                      394 => 
                                      array (
                                        'key' => 'DUAL HI-PERFORMANCE PD',
                                        'value' => 1829530,
                                      ),
                                      395 => 
                                      array (
                                        'key' => 'DUAL POSITIVE DRIVE PD',
                                        'value' => 1829510,
                                      ),
                                      396 => 
                                      array (
                                        'key' => 'Dual-Grip DGF1 Ferrule',
                                        'value' => 1830020,
                                      ),
                                      397 => 
                                      array (
                                        'key' => 'Dual-Grip DGF2 Ferrule',
                                        'value' => 1830021,
                                      ),
                                      398 => 
                                      array (
                                        'key' => 'DUDLEY WATER',
                                        'value' => 1876,
                                      ),
                                      399 => 
                                      array (
                                        'key' => 'DUNLOP BOOSTER',
                                        'value' => 1877,
                                      ),
                                      400 => 
                                      array (
                                        'key' => 'DURACO',
                                        'value' => 1878,
                                      ),
                                      401 => 
                                      array (
                                        'key' => 'DURACO ROADPATCH',
                                        'value' => 1879,
                                      ),
                                      402 => 
                                      array (
                                        'key' => 'DWE',
                                        'value' => 1829161,
                                      ),
                                      403 => 
                                      array (
                                        'key' => 'DYNACRAFT',
                                        'value' => 1880,
                                      ),
                                      404 => 
                                      array (
                                        'key' => 'DYNACRAFT D1045-2000',
                                        'value' => 1829127,
                                      ),
                                      405 => 
                                      array (
                                        'key' => 'DYNO',
                                        'value' => 1881,
                                      ),
                                      406 => 
                                      array (
                                        'key' => 'DYNO HOSE',
                                        'value' => 1882,
                                      ),
                                      407 => 
                                      array (
                                        'key' => 'DYNO HOSEINHOSE',
                                        'value' => 1829231,
                                      ),
                                      408 => 
                                      array (
                                        'key' => 'DYNO NOBEL',
                                        'value' => 1829125,
                                      ),
                                      409 => 
                                      array (
                                        'key' => 'E 1-1',
                                        'value' => 1883,
                                      ),
                                      410 => 
                                      array (
                                        'key' => 'E 3-1',
                                        'value' => 1884,
                                      ),
                                      411 => 
                                      array (
                                        'key' => 'E 3-2',
                                        'value' => 1885,
                                      ),
                                      412 => 
                                      array (
                                        'key' => 'EAGLE AIR & WATER',
                                        'value' => 1886,
                                      ),
                                      413 => 
                                      array (
                                        'key' => 'EAGLE FLUID POWER',
                                        'value' => 1829160,
                                      ),
                                      414 => 
                                      array (
                                        'key' => 'ECO LITE',
                                        'value' => 3831424,
                                      ),
                                      415 => 
                                      array (
                                        'key' => 'ECO RUBBER',
                                        'value' => 3831423,
                                      ),
                                      416 => 
                                      array (
                                        'key' => 'ECOLAB',
                                        'value' => 3831426,
                                      ),
                                      417 => 
                                      array (
                                        'key' => 'ECOLAB BLUE',
                                        'value' => 1829110,
                                      ),
                                      418 => 
                                      array (
                                        'key' => 'ECOLAB WASHDOWN',
                                        'value' => 1829193,
                                      ),
                                      419 => 
                                      array (
                                        'key' => 'EDPM DISCHARGE',
                                        'value' => 1829263,
                                      ),
                                      420 => 
                                      array (
                                        'key' => 'EHLYNN',
                                        'value' => 1887,
                                      ),
                                      421 => 
                                      array (
                                        'key' => 'EHLYNN FLOUR TEC',
                                        'value' => 1888,
                                      ),
                                      422 => 
                                      array (
                                        'key' => 'EHLYNN FOOD DISCHARGE',
                                        'value' => 1889,
                                      ),
                                      423 => 
                                      array (
                                        'key' => 'EHLYNN HOT AIR',
                                        'value' => 1890,
                                      ),
                                      424 => 
                                      array (
                                        'key' => 'EHLYNN PIPE CONNECTOR',
                                        'value' => 1891,
                                      ),
                                      425 => 
                                      array (
                                        'key' => 'EHLYNN TPG',
                                        'value' => 1892,
                                      ),
                                      426 => 
                                      array (
                                        'key' => 'ELAFLEX LAY FLAT',
                                        'value' => 1893,
                                      ),
                                      427 => 
                                      array (
                                        'key' => 'ELITE HOT WATER',
                                        'value' => 5680554,
                                      ),
                                      428 => 
                                      array (
                                        'key' => 'ELITE POLY-V',
                                        'value' => 1829495,
                                      ),
                                      429 => 
                                      array (
                                        'key' => 'ELITE POLY-V STRETCH',
                                        'value' => 1829529,
                                      ),
                                      430 => 
                                      array (
                                        'key' => 'ELITE STANDARD RADIATOR',
                                        'value' => 1894,
                                      ),
                                      431 => 
                                      array (
                                        'key' => 'ELITE SW MARINE WET EXHAUST',
                                        'value' => 1895,
                                      ),
                                      432 => 
                                      array (
                                        'key' => 'EMERALD',
                                        'value' => 5759836,
                                      ),
                                      433 => 
                                      array (
                                        'key' => 'EN12115 PETROLEUM',
                                        'value' => 1896,
                                      ),
                                      434 => 
                                      array (
                                        'key' => 'EPDM 200',
                                        'value' => 1897,
                                      ),
                                      435 => 
                                      array (
                                        'key' => 'EPDM 200 (ECONOMY)',
                                        'value' => 1898,
                                      ),
                                      436 => 
                                      array (
                                        'key' => 'EPDM 200 (NON CON)',
                                        'value' => 1899,
                                      ),
                                      437 => 
                                      array (
                                        'key' => 'EPDM ACID',
                                        'value' => 1900,
                                      ),
                                      438 => 
                                      array (
                                        'key' => 'EPDM DISCHARGE',
                                        'value' => 1901,
                                      ),
                                      439 => 
                                      array (
                                        'key' => 'EPDM S&D',
                                        'value' => 1902,
                                      ),
                                      440 => 
                                      array (
                                        'key' => 'EPDM SD HD WATER',
                                        'value' => 1903,
                                      ),
                                      441 => 
                                      array (
                                        'key' => 'EPDM SD WATER',
                                        'value' => 1904,
                                      ),
                                      442 => 
                                      array (
                                        'key' => 'ERGON',
                                        'value' => 1905,
                                      ),
                                      443 => 
                                      array (
                                        'key' => 'ERIKS',
                                        'value' => 1906,
                                      ),
                                      444 => 
                                      array (
                                        'key' => 'ESTABROOK',
                                        'value' => 1829163,
                                      ),
                                      445 => 
                                      array (
                                        'key' => 'EURO TRIX',
                                        'value' => 1907,
                                      ),
                                      446 => 
                                      array (
                                        'key' => 'EXIMCO',
                                        'value' => 1908,
                                      ),
                                      447 => 
                                      array (
                                        'key' => 'EXIMCO FLOATER',
                                        'value' => 1829227,
                                      ),
                                      448 => 
                                      array (
                                        'key' => 'EXIMCO HYD',
                                        'value' => 1829402,
                                      ),
                                      449 => 
                                      array (
                                        'key' => 'EXON GP DOCK',
                                        'value' => 1909,
                                      ),
                                      450 => 
                                      array (
                                        'key' => 'EXPRESS BLOWER',
                                        'value' => 1910,
                                      ),
                                      451 => 
                                      array (
                                        'key' => 'EXSTATIC',
                                        'value' => 1911,
                                      ),
                                      452 => 
                                      array (
                                        'key' => 'EXTREME CRIMP CB STEAM',
                                        'value' => 1829118,
                                      ),
                                      453 => 
                                      array (
                                        'key' => 'EXTREMEBLAST LOAD',
                                        'value' => 1912,
                                      ),
                                      454 => 
                                      array (
                                        'key' => 'EXTREMEFLEX™ BEVERAGE',
                                        'value' => 1913,
                                      ),
                                      455 => 
                                      array (
                                        'key' => 'EXTREMEFLEX™ BROWN',
                                        'value' => 1914,
                                      ),
                                      456 => 
                                      array (
                                        'key' => 'EXTREMEFLEX™ FOOD',
                                        'value' => 1829369,
                                      ),
                                      457 => 
                                      array (
                                        'key' => 'EXTREMEFLEX™ FOOD BLUE',
                                        'value' => 1916,
                                      ),
                                      458 => 
                                      array (
                                        'key' => 'EXTREMEFLEX™ FOOD GRAY',
                                        'value' => 1917,
                                      ),
                                      459 => 
                                      array (
                                        'key' => 'EXTREMEFLEX™ FOOD RED',
                                        'value' => 1829382,
                                      ),
                                      460 => 
                                      array (
                                        'key' => 'EXTREMEFLEX™ PETROLEUM',
                                        'value' => 1918,
                                      ),
                                      461 => 
                                      array (
                                        'key' => 'EXTREMEFLEX™ POTABLE WATER',
                                        'value' => 1919,
                                      ),
                                      462 => 
                                      array (
                                        'key' => 'EXTREMEFLEX™ PURPLE',
                                        'value' => 1915,
                                      ),
                                      463 => 
                                      array (
                                        'key' => 'EXTREMEFLEX™ VERSIFLO',
                                        'value' => 1920,
                                      ),
                                      464 => 
                                      array (
                                        'key' => 'EXTREMEFLEX™ WATER SLURRY',
                                        'value' => 1921,
                                      ),
                                      465 => 
                                      array (
                                        'key' => 'EZ GLIDE WINE',
                                        'value' => 1922,
                                      ),
                                      466 => 
                                      array (
                                        'key' => 'F5™',
                                        'value' => 1923,
                                      ),
                                      467 => 
                                      array (
                                        'key' => 'FABCHEM ARC',
                                        'value' => 1925,
                                      ),
                                      468 => 
                                      array (
                                        'key' => 'FABCHEM EN12115',
                                        'value' => 1926,
                                      ),
                                      469 => 
                                      array (
                                        'key' => 'FABCHEM-C',
                                        'value' => 1927,
                                      ),
                                      470 => 
                                      array (
                                        'key' => 'FABCHEM®',
                                        'value' => 1924,
                                      ),
                                      471 => 
                                      array (
                                        'key' => 'FALCON PD',
                                        'value' => 1829521,
                                      ),
                                      472 => 
                                      array (
                                        'key' => 'Ferrules',
                                        'value' => 1830012,
                                      ),
                                      473 => 
                                      array (
                                        'key' => 'FHP',
                                        'value' => 1829507,
                                      ),
                                      474 => 
                                      array (
                                        'key' => 'FIBERG CRUCIBLE GASK',
                                        'value' => 1928,
                                      ),
                                      475 => 
                                      array (
                                        'key' => 'FINISHING BRANDS',
                                        'value' => 1929,
                                      ),
                                      476 => 
                                      array (
                                        'key' => 'FINN',
                                        'value' => 1829171,
                                      ),
                                      477 => 
                                      array (
                                        'key' => 'FIRE ENGINE BOOSTER',
                                        'value' => 1930,
                                      ),
                                      478 => 
                                      array (
                                        'key' => 'FIRE ENGINE SUCTION',
                                        'value' => 1931,
                                      ),
                                      479 => 
                                      array (
                                        'key' => 'FIRE ENGINER BOOSTER',
                                        'value' => 1932,
                                      ),
                                      480 => 
                                      array (
                                        'key' => 'FIRE EXTINGUISHER UL92',
                                        'value' => 5679576,
                                      ),
                                      481 => 
                                      array (
                                        'key' => 'FIRE S&D',
                                        'value' => 1829433,
                                      ),
                                      482 => 
                                      array (
                                        'key' => 'FISH HOSE',
                                        'value' => 1933,
                                      ),
                                      483 => 
                                      array (
                                        'key' => 'FISH SUCTION',
                                        'value' => 1829238,
                                      ),
                                      484 => 
                                      array (
                                        'key' => 'FISH TRANSFER',
                                        'value' => 1934,
                                      ),
                                      485 => 
                                      array (
                                        'key' => 'Flange Engine Oil Connection (Two Bolt)',
                                        'value' => 1830007,
                                      ),
                                      486 => 
                                      array (
                                        'key' => 'Flareless Tube',
                                        'value' => 1829981,
                                      ),
                                      487 => 
                                      array (
                                        'key' => 'Flareless Tube Fittings',
                                        'value' => 1829955,
                                      ),
                                      488 => 
                                      array (
                                        'key' => 'Flareless Tube Nuts',
                                        'value' => 1829994,
                                      ),
                                      489 => 
                                      array (
                                        'key' => 'Flareless Tube Sleeves',
                                        'value' => 1829995,
                                      ),
                                      490 => 
                                      array (
                                        'key' => 'FLASH',
                                        'value' => 5355083,
                                      ),
                                      491 => 
                                      array (
                                        'key' => 'FLDCON',
                                        'value' => 1935,
                                      ),
                                      492 => 
                                      array (
                                        'key' => 'FLEX-ING FLEX AQUA WATER S&D',
                                        'value' => 1943,
                                      ),
                                      493 => 
                                      array (
                                        'key' => 'FLEX-ING FLEX-ON',
                                        'value' => 1944,
                                      ),
                                      494 => 
                                      array (
                                        'key' => 'FLEX-PULSE FPII',
                                        'value' => 1946,
                                      ),
                                      495 => 
                                      array (
                                        'key' => 'FLEXAGRIP™',
                                        'value' => 1936,
                                      ),
                                      496 => 
                                      array (
                                        'key' => 'FLEXCHEM 225',
                                        'value' => 1937,
                                      ),
                                      497 => 
                                      array (
                                        'key' => 'FLEXDOCK',
                                        'value' => 1938,
                                      ),
                                      498 => 
                                      array (
                                        'key' => 'FLEXDOCK VERSAFUEL',
                                        'value' => 1939,
                                      ),
                                      499 => 
                                      array (
                                        'key' => 'FLEXIBLE DOWNSPOUT',
                                        'value' => 1940,
                                      ),
                                      500 => 
                                      array (
                                        'key' => 'FLEXIBLE TEFLON',
                                        'value' => 1941,
                                      ),
                                      501 => 
                                      array (
                                        'key' => 'FLEXICORE',
                                        'value' => 1942,
                                      ),
                                      502 => 
                                      array (
                                        'key' => 'FLEXILLA',
                                        'value' => 1829099,
                                      ),
                                      503 => 
                                      array (
                                        'key' => 'FLEXING FLEX-ON',
                                        'value' => 1829124,
                                      ),
                                      504 => 
                                      array (
                                        'key' => 'FLEXJET',
                                        'value' => 1945,
                                      ),
                                      505 => 
                                      array (
                                        'key' => 'FLEXON',
                                        'value' => 1829094,
                                      ),
                                      506 => 
                                      array (
                                        'key' => 'FLEXRITE',
                                        'value' => 1947,
                                      ),
                                      507 => 
                                      array (
                                        'key' => 'FLEXSHIELD SAE J1527 A1-15',
                                        'value' => 1829362,
                                      ),
                                      508 => 
                                      array (
                                        'key' => 'FLEXSHIELD SAE J1527 TYPE A1-15',
                                        'value' => 1948,
                                      ),
                                      509 => 
                                      array (
                                        'key' => 'FLEXSTEEL® 250 CB EXTREME CRIMP',
                                        'value' => 1949,
                                      ),
                                      510 => 
                                      array (
                                        'key' => 'FLEXSTEEL® 250 CB STEAM',
                                        'value' => 1950,
                                      ),
                                      511 => 
                                      array (
                                        'key' => 'FLEXSTEEL® 250 EPDM',
                                        'value' => 1829327,
                                      ),
                                      512 => 
                                      array (
                                        'key' => 'FLEXSTEEL® 250 EPDM-20',
                                        'value' => 1951,
                                      ),
                                      513 => 
                                      array (
                                        'key' => 'FLEXSTEEL® 250 ORS STEAM',
                                        'value' => 1952,
                                      ),
                                      514 => 
                                      array (
                                        'key' => 'FLEXSTEEL® 250 STEAM',
                                        'value' => 1953,
                                      ),
                                      515 => 
                                      array (
                                        'key' => 'FLEXSTEEL® FUTURA',
                                        'value' => 1954,
                                      ),
                                      516 => 
                                      array (
                                        'key' => 'FLEXSTEEL® FUTURA B20',
                                        'value' => 1955,
                                      ),
                                      517 => 
                                      array (
                                        'key' => 'FLEXSTEEL® FUTURA E25',
                                        'value' => 1956,
                                      ),
                                      518 => 
                                      array (
                                        'key' => 'FLEXSTEEL® FUTURA ETHAN-ALL',
                                        'value' => 1957,
                                      ),
                                      519 => 
                                      array (
                                        'key' => 'FLEXSTEEL® FUTURA HVR',
                                        'value' => 1958,
                                      ),
                                      520 => 
                                      array (
                                        'key' => 'FLEXSTEEL® FUTURA HVR LOW PERM',
                                        'value' => 1959,
                                      ),
                                      521 => 
                                      array (
                                        'key' => 'FLEXSTEEL® FUTURA LOW PERM',
                                        'value' => 1960,
                                      ),
                                      522 => 
                                      array (
                                        'key' => 'FLEXSTEEL® FUTURA VAPOR ASSIST',
                                        'value' => 1961,
                                      ),
                                      523 => 
                                      array (
                                        'key' => 'FLEXSTEEL® HW',
                                        'value' => 1829212,
                                      ),
                                      524 => 
                                      array (
                                        'key' => 'FLEXSTEEL® MINESPRAY',
                                        'value' => 1963,
                                      ),
                                      525 => 
                                      array (
                                        'key' => 'FLEXSTEEL® SERVICE STATION AIR',
                                        'value' => 1964,
                                      ),
                                      526 => 
                                      array (
                                        'key' => 'FLEXSTEEL®MINE SPRAY',
                                        'value' => 1962,
                                      ),
                                      527 => 
                                      array (
                                        'key' => 'FLEXTRA DRY MATERIAL',
                                        'value' => 1965,
                                      ),
                                      528 => 
                                      array (
                                        'key' => 'FLEXTRA FOOD LT',
                                        'value' => 1966,
                                      ),
                                      529 => 
                                      array (
                                        'key' => 'FLEXTRA LT BLUE',
                                        'value' => 1829367,
                                      ),
                                      530 => 
                                      array (
                                        'key' => 'FLEXTRA OILFIELD',
                                        'value' => 1967,
                                      ),
                                      531 => 
                                      array (
                                        'key' => 'FLEXTRA PETROLEUM',
                                        'value' => 7287904,
                                      ),
                                      532 => 
                                      array (
                                        'key' => 'FLEXTRA ROCK DUST',
                                        'value' => 1968,
                                      ),
                                      533 => 
                                      array (
                                        'key' => 'FLEXTRAL',
                                        'value' => 5764904,
                                      ),
                                      534 => 
                                      array (
                                        'key' => 'FLEXTRAL GRIP-LOC',
                                        'value' => 1829179,
                                      ),
                                      535 => 
                                      array (
                                        'key' => 'FLEXTRAL J2',
                                        'value' => 1829399,
                                      ),
                                      536 => 
                                      array (
                                        'key' => 'FLEXWAC',
                                        'value' => 1969,
                                      ),
                                      537 => 
                                      array (
                                        'key' => 'FLEXWING® FOOD',
                                        'value' => 3947663,
                                      ),
                                      538 => 
                                      array (
                                        'key' => 'FLEXWING® FOOD BLUE',
                                        'value' => 1970,
                                      ),
                                      539 => 
                                      array (
                                        'key' => 'FLEXWING® OILFIELD',
                                        'value' => 1971,
                                      ),
                                      540 => 
                                      array (
                                        'key' => 'FLEXWING® PETROLEUM',
                                        'value' => 1972,
                                      ),
                                      541 => 
                                      array (
                                        'key' => 'FLEXWING® VERSAFUEL',
                                        'value' => 1973,
                                      ),
                                      542 => 
                                      array (
                                        'key' => 'FLEXWING® WATER S&D',
                                        'value' => 1974,
                                      ),
                                      543 => 
                                      array (
                                        'key' => 'FLOATER',
                                        'value' => 1975,
                                      ),
                                      544 => 
                                      array (
                                        'key' => 'FLOATING HOSES',
                                        'value' => 1976,
                                      ),
                                      545 => 
                                      array (
                                        'key' => 'FLOUR DISCHARGE',
                                        'value' => 1977,
                                      ),
                                      546 => 
                                      array (
                                        'key' => 'FLUOROPAL',
                                        'value' => 1978,
                                      ),
                                      547 => 
                                      array (
                                        'key' => 'FOAM',
                                        'value' => 1979,
                                      ),
                                      548 => 
                                      array (
                                        'key' => 'FOOD 2720',
                                        'value' => 1980,
                                      ),
                                      549 => 
                                      array (
                                        'key' => 'FOOD DISCHARGE',
                                        'value' => 1981,
                                      ),
                                      550 => 
                                      array (
                                        'key' => 'FOOD FLEX',
                                        'value' => 1982,
                                      ),
                                      551 => 
                                      array (
                                        'key' => 'FOOD S&D',
                                        'value' => 1983,
                                      ),
                                      552 => 
                                      array (
                                        'key' => 'FOODCLEAN',
                                        'value' => 1984,
                                      ),
                                      553 => 
                                      array (
                                        'key' => 'FOODLINER',
                                        'value' => 1985,
                                      ),
                                      554 => 
                                      array (
                                        'key' => 'Ford Spring Lock',
                                        'value' => 1829989,
                                      ),
                                      555 => 
                                      array (
                                        'key' => 'FORECAST BLAST',
                                        'value' => 1986,
                                      ),
                                      556 => 
                                      array (
                                        'key' => 'FORECAST BLAST XF',
                                        'value' => 1987,
                                      ),
                                      557 => 
                                      array (
                                        'key' => 'FORECAST SUCTION',
                                        'value' => 1988,
                                      ),
                                      558 => 
                                      array (
                                        'key' => 'FORESTRY',
                                        'value' => 1989,
                                      ),
                                      559 => 
                                      array (
                                        'key' => 'FORMADRAIN INFLATABLE HOSE',
                                        'value' => 1990,
                                      ),
                                      560 => 
                                      array (
                                        'key' => 'FORTRESS',
                                        'value' => 1991,
                                      ),
                                      561 => 
                                      array (
                                        'key' => 'FOSTER',
                                        'value' => 1992,
                                      ),
                                      562 => 
                                      array (
                                        'key' => 'FRAC',
                                        'value' => 1993,
                                      ),
                                      563 => 
                                      array (
                                        'key' => 'FRAC ACID S&D',
                                        'value' => 1994,
                                      ),
                                      564 => 
                                      array (
                                        'key' => 'FRAC ACID S&D 400',
                                        'value' => 1829354,
                                      ),
                                      565 => 
                                      array (
                                        'key' => 'FRAC BLENDING 500SD',
                                        'value' => 1829374,
                                      ),
                                      566 => 
                                      array (
                                        'key' => 'FRAC BLENDING S&D',
                                        'value' => 1995,
                                      ),
                                      567 => 
                                      array (
                                        'key' => 'FRACO',
                                        'value' => 1996,
                                      ),
                                      568 => 
                                      array (
                                        'key' => 'FREON CHARGING',
                                        'value' => 1997,
                                      ),
                                      569 => 
                                      array (
                                        'key' => 'FRIG SEA',
                                        'value' => 1998,
                                      ),
                                      570 => 
                                      array (
                                        'key' => 'FRONTIER®',
                                        'value' => 1999,
                                      ),
                                      571 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE',
                                        'value' => 2000,
                                      ),
                                      572 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE 150',
                                        'value' => 1829337,
                                      ),
                                      573 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE 200',
                                        'value' => 1829405,
                                      ),
                                      574 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE 250',
                                        'value' => 1829237,
                                      ),
                                      575 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE 300',
                                        'value' => 1829373,
                                      ),
                                      576 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE HD',
                                        'value' => 2001,
                                      ),
                                      577 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE HD 300',
                                        'value' => 1829422,
                                      ),
                                      578 => 
                                      array (
                                        'key' => 'FUEL FILL SAE J1527 TYPE A2',
                                        'value' => 2002,
                                      ),
                                      579 => 
                                      array (
                                        'key' => 'FUEL RIG SW',
                                        'value' => 2003,
                                      ),
                                      580 => 
                                      array (
                                        'key' => 'FUELGRIP COUPLING',
                                        'value' => 2004,
                                      ),
                                      581 => 
                                      array (
                                        'key' => 'FUGGITT',
                                        'value' => 2005,
                                      ),
                                      582 => 
                                      array (
                                        'key' => 'FUJI',
                                        'value' => 2006,
                                      ),
                                      583 => 
                                      array (
                                        'key' => 'FURNACE DOOR',
                                        'value' => 2007,
                                      ),
                                      584 => 
                                      array (
                                        'key' => 'FUTURA O-RING KIT',
                                        'value' => 2008,
                                      ),
                                      585 => 
                                      array (
                                        'key' => 'FUTURA RET RING INST. TOOL',
                                        'value' => 2009,
                                      ),
                                      586 => 
                                      array (
                                        'key' => 'GALAXY G4826',
                                        'value' => 2010,
                                      ),
                                      587 => 
                                      array (
                                        'key' => 'GALAXY G4867',
                                        'value' => 2011,
                                      ),
                                      588 => 
                                      array (
                                        'key' => 'GALAXY G4890',
                                        'value' => 2012,
                                      ),
                                      589 => 
                                      array (
                                        'key' => 'GALVANATOR®',
                                        'value' => 2013,
                                      ),
                                      590 => 
                                      array (
                                        'key' => 'GAMMON',
                                        'value' => 2014,
                                      ),
                                      591 => 
                                      array (
                                        'key' => 'GARDEN HOSE',
                                        'value' => 1829286,
                                      ),
                                      592 => 
                                      array (
                                        'key' => 'GARRISON GAUNTLET',
                                        'value' => 1829424,
                                      ),
                                      593 => 
                                      array (
                                        'key' => 'GATES',
                                        'value' => 1829135,
                                      ),
                                      594 => 
                                      array (
                                        'key' => 'GATES 32000002',
                                        'value' => 1829418,
                                      ),
                                      595 => 
                                      array (
                                        'key' => 'GATES 32000003',
                                        'value' => 1829305,
                                      ),
                                      596 => 
                                      array (
                                        'key' => 'GATES 32000006',
                                        'value' => 1829245,
                                      ),
                                      597 => 
                                      array (
                                        'key' => 'GATES 32000007',
                                        'value' => 1829294,
                                      ),
                                      598 => 
                                      array (
                                        'key' => 'GATES 32000008',
                                        'value' => 1829247,
                                      ),
                                      599 => 
                                      array (
                                        'key' => 'GATES 32000009',
                                        'value' => 1829209,
                                      ),
                                      600 => 
                                      array (
                                        'key' => 'GATES 32000011',
                                        'value' => 1829265,
                                      ),
                                      601 => 
                                      array (
                                        'key' => 'GATES 32000012',
                                        'value' => 1829276,
                                      ),
                                      602 => 
                                      array (
                                        'key' => 'GATES 32000013',
                                        'value' => 1829254,
                                      ),
                                      603 => 
                                      array (
                                        'key' => 'GATES 32000014',
                                        'value' => 1829213,
                                      ),
                                      604 => 
                                      array (
                                        'key' => 'GATES 32000015',
                                        'value' => 1829419,
                                      ),
                                      605 => 
                                      array (
                                        'key' => 'GATES 32000016',
                                        'value' => 1829235,
                                      ),
                                      606 => 
                                      array (
                                        'key' => 'GATES 32000213',
                                        'value' => 1829420,
                                      ),
                                      607 => 
                                      array (
                                        'key' => 'GATES 32020011',
                                        'value' => 1829185,
                                      ),
                                      608 => 
                                      array (
                                        'key' => 'GATES 32020016',
                                        'value' => 1829390,
                                      ),
                                      609 => 
                                      array (
                                        'key' => 'GATES 32020021',
                                        'value' => 1829391,
                                      ),
                                      610 => 
                                      array (
                                        'key' => 'GATES 32020027',
                                        'value' => 1829392,
                                      ),
                                      611 => 
                                      array (
                                        'key' => 'GATES 32041328',
                                        'value' => 1829151,
                                      ),
                                      612 => 
                                      array (
                                        'key' => 'GATES 32041346',
                                        'value' => 1829126,
                                      ),
                                      613 => 
                                      array (
                                        'key' => 'GATES 32041349',
                                        'value' => 1829194,
                                      ),
                                      614 => 
                                      array (
                                        'key' => 'GATES 32041355',
                                        'value' => 1829136,
                                      ),
                                      615 => 
                                      array (
                                        'key' => 'GATES 32041364',
                                        'value' => 1829148,
                                      ),
                                      616 => 
                                      array (
                                        'key' => 'GATES 32041425',
                                        'value' => 1829267,
                                      ),
                                      617 => 
                                      array (
                                        'key' => 'GATES 32041437',
                                        'value' => 1829394,
                                      ),
                                      618 => 
                                      array (
                                        'key' => 'GATES 32050016',
                                        'value' => 1829284,
                                      ),
                                      619 => 
                                      array (
                                        'key' => 'GATES 32050026',
                                        'value' => 1829250,
                                      ),
                                      620 => 
                                      array (
                                        'key' => 'GATES 32050031',
                                        'value' => 1829259,
                                      ),
                                      621 => 
                                      array (
                                        'key' => 'GATES 32050036',
                                        'value' => 1829240,
                                      ),
                                      622 => 
                                      array (
                                        'key' => 'GATES 32050040',
                                        'value' => 1829208,
                                      ),
                                      623 => 
                                      array (
                                        'key' => 'GATES 32050041',
                                        'value' => 1829177,
                                      ),
                                      624 => 
                                      array (
                                        'key' => 'GATES 32050046',
                                        'value' => 1829146,
                                      ),
                                      625 => 
                                      array (
                                        'key' => 'GATES 32050049',
                                        'value' => 1829244,
                                      ),
                                      626 => 
                                      array (
                                        'key' => 'GATES 32050055',
                                        'value' => 1829181,
                                      ),
                                      627 => 
                                      array (
                                        'key' => 'GATES 32050226',
                                        'value' => 1829308,
                                      ),
                                      628 => 
                                      array (
                                        'key' => 'GATES 32050231',
                                        'value' => 1829310,
                                      ),
                                      629 => 
                                      array (
                                        'key' => 'GATES 32050236',
                                        'value' => 1829421,
                                      ),
                                      630 => 
                                      array (
                                        'key' => 'GATES 32050241',
                                        'value' => 1829303,
                                      ),
                                      631 => 
                                      array (
                                        'key' => 'GATES 32714397',
                                        'value' => 1829425,
                                      ),
                                      632 => 
                                      array (
                                        'key' => 'GATES 3624-0145',
                                        'value' => 1829261,
                                      ),
                                      633 => 
                                      array (
                                        'key' => 'GATES GASFLEX',
                                        'value' => 1829331,
                                      ),
                                      634 => 
                                      array (
                                        'key' => 'GATES STEAMKING',
                                        'value' => 1829107,
                                      ),
                                      635 => 
                                      array (
                                        'key' => 'GAUNTLET®',
                                        'value' => 2015,
                                      ),
                                      636 => 
                                      array (
                                        'key' => 'GBT',
                                        'value' => 7605428,
                                      ),
                                      637 => 
                                      array (
                                        'key' => 'GENERIC',
                                        'value' => 2016,
                                      ),
                                      638 => 
                                      array (
                                        'key' => 'GENERIC AIR',
                                        'value' => 1829359,
                                      ),
                                      639 => 
                                      array (
                                        'key' => 'GENERIC AIR 250',
                                        'value' => 1829312,
                                      ),
                                      640 => 
                                      array (
                                        'key' => 'GENERIC AIR BREATHING',
                                        'value' => 7740436,
                                      ),
                                      641 => 
                                      array (
                                        'key' => 'GENERIC LOW TEMP TANK TRUCK',
                                        'value' => 2017,
                                      ),
                                      642 => 
                                      array (
                                        'key' => 'GENERIC PETRO TANK TRUCK',
                                        'value' => 1829253,
                                      ),
                                      643 => 
                                      array (
                                        'key' => 'GENERIC PL & GR',
                                        'value' => 1829332,
                                      ),
                                      644 => 
                                      array (
                                        'key' => 'GENERIC PLASTER & GROUT',
                                        'value' => 2018,
                                      ),
                                      645 => 
                                      array (
                                        'key' => 'GENERIC PUSH-ON',
                                        'value' => 5299956,
                                      ),
                                      646 => 
                                      array (
                                        'key' => 'GENERIC VACUUM',
                                        'value' => 2019,
                                      ),
                                      647 => 
                                      array (
                                        'key' => 'GENERIC WATER 100D',
                                        'value' => 1829299,
                                      ),
                                      648 => 
                                      array (
                                        'key' => 'GENERIC WATER DISCHARGE',
                                        'value' => 2020,
                                      ),
                                      649 => 
                                      array (
                                        'key' => 'GENERIC WATER S&D',
                                        'value' => 2021,
                                      ),
                                      650 => 
                                      array (
                                        'key' => 'GENLINE',
                                        'value' => 2022,
                                      ),
                                      651 => 
                                      array (
                                        'key' => 'GENLINE GL',
                                        'value' => 2023,
                                      ),
                                      652 => 
                                      array (
                                        'key' => 'GENLINE GL-802',
                                        'value' => 2024,
                                      ),
                                      653 => 
                                      array (
                                        'key' => 'GENLINE GL-803',
                                        'value' => 2025,
                                      ),
                                      654 => 
                                      array (
                                        'key' => 'GHX',
                                        'value' => 2026,
                                      ),
                                      655 => 
                                      array (
                                        'key' => 'GHX OILFIELD',
                                        'value' => 1829398,
                                      ),
                                      656 => 
                                      array (
                                        'key' => 'GHX OILFIELD S&D',
                                        'value' => 1829395,
                                      ),
                                      657 => 
                                      array (
                                        'key' => 'GHX PETRO XPOWER',
                                        'value' => 1829123,
                                      ),
                                      658 => 
                                      array (
                                        'key' => 'GHX WATER S&D',
                                        'value' => 1829397,
                                      ),
                                      659 => 
                                      array (
                                        'key' => 'GHX XPOWER OILFIELD FRAC TANK',
                                        'value' => 1829186,
                                      ),
                                      660 => 
                                      array (
                                        'key' => 'GILBARCO',
                                        'value' => 2027,
                                      ),
                                      661 => 
                                      array (
                                        'key' => 'GLOBAL',
                                        'value' => 2028,
                                      ),
                                      662 => 
                                      array (
                                        'key' => 'GLOBAL M24565-70-H',
                                        'value' => 1829204,
                                      ),
                                      663 => 
                                      array (
                                        'key' => 'GNSPEC',
                                        'value' => 2029,
                                      ),
                                      664 => 
                                      array (
                                        'key' => 'GNSPEC 100R12',
                                        'value' => 2030,
                                      ),
                                      665 => 
                                      array (
                                        'key' => 'GNSPEC 100R16',
                                        'value' => 2031,
                                      ),
                                      666 => 
                                      array (
                                        'key' => 'GNSPEC 100R17',
                                        'value' => 1829224,
                                      ),
                                      667 => 
                                      array (
                                        'key' => 'GNSPEC 100R2',
                                        'value' => 2032,
                                      ),
                                      668 => 
                                      array (
                                        'key' => 'GNSPEC 100R3',
                                        'value' => 13295418,
                                      ),
                                      669 => 
                                      array (
                                        'key' => 'GNSPEC 100R6',
                                        'value' => 2033,
                                      ),
                                      670 => 
                                      array (
                                        'key' => 'GNSPEC 200 AIR',
                                        'value' => 2034,
                                      ),
                                      671 => 
                                      array (
                                        'key' => 'GNSPEC 250 AIR',
                                        'value' => 2035,
                                      ),
                                      672 => 
                                      array (
                                        'key' => 'GNSPEC 300 AIR',
                                        'value' => 2036,
                                      ),
                                      673 => 
                                      array (
                                        'key' => 'GNSPEC 4001 PRESSURE WASHER',
                                        'value' => 2037,
                                      ),
                                      674 => 
                                      array (
                                        'key' => 'GNSPEC 4500 PRESSURE WASHER',
                                        'value' => 2038,
                                      ),
                                      675 => 
                                      array (
                                        'key' => 'GNSPEC NR SPRAY',
                                        'value' => 2039,
                                      ),
                                      676 => 
                                      array (
                                        'key' => 'GNSPEC PUSH ON 250',
                                        'value' => 2040,
                                      ),
                                      677 => 
                                      array (
                                        'key' => 'GOLD SNAKE',
                                        'value' => 2041,
                                      ),
                                      678 => 
                                      array (
                                        'key' => 'GOOD FLEX',
                                        'value' => 2042,
                                      ),
                                      679 => 
                                      array (
                                        'key' => 'GOODAL',
                                        'value' => 1829176,
                                      ),
                                      680 => 
                                      array (
                                        'key' => 'GOODALL',
                                        'value' => 2043,
                                      ),
                                      681 => 
                                      array (
                                        'key' => 'GOODALL CHEMICAL',
                                        'value' => 1829400,
                                      ),
                                      682 => 
                                      array (
                                        'key' => 'GOODYEAR',
                                        'value' => 13056782,
                                      ),
                                      683 => 
                                      array (
                                        'key' => 'GORILLA',
                                        'value' => 2044,
                                      ),
                                      684 => 
                                      array (
                                        'key' => 'GP3-11-1 / EN1765:2016 S10',
                                        'value' => 7989389,
                                      ),
                                      685 => 
                                      array (
                                        'key' => 'GP3-11-1 / EN1765:2016 S15',
                                        'value' => 7563309,
                                      ),
                                      686 => 
                                      array (
                                        'key' => 'GP3-11-1 / EN1765:2016 S21',
                                        'value' => 7989388,
                                      ),
                                      687 => 
                                      array (
                                        'key' => 'GR3',
                                        'value' => 10709286,
                                      ),
                                      688 => 
                                      array (
                                        'key' => 'GRACO',
                                        'value' => 2045,
                                      ),
                                      689 => 
                                      array (
                                        'key' => 'GRACO 079055',
                                        'value' => 1829134,
                                      ),
                                      690 => 
                                      array (
                                        'key' => 'GRAINGER',
                                        'value' => 2046,
                                      ),
                                      691 => 
                                      array (
                                        'key' => 'GRAY DUCTING',
                                        'value' => 1829388,
                                      ),
                                      692 => 
                                      array (
                                        'key' => 'GRAY FLEXTRA® LT',
                                        'value' => 2047,
                                      ),
                                      693 => 
                                      array (
                                        'key' => 'GRAY FLEXWING®',
                                        'value' => 2048,
                                      ),
                                      694 => 
                                      array (
                                        'key' => 'GRAY FOOD',
                                        'value' => 2049,
                                      ),
                                      695 => 
                                      array (
                                        'key' => 'GRAY SUCTION',
                                        'value' => 2050,
                                      ),
                                      696 => 
                                      array (
                                        'key' => 'GREASE GUN HOSE',
                                        'value' => 2051,
                                      ),
                                      697 => 
                                      array (
                                        'key' => 'GREAT NECK',
                                        'value' => 2052,
                                      ),
                                      698 => 
                                      array (
                                        'key' => 'GREAT PLAINS',
                                        'value' => 2053,
                                      ),
                                      699 => 
                                      array (
                                        'key' => 'GREEN HORNET XF',
                                        'value' => 2054,
                                      ),
                                      700 => 
                                      array (
                                        'key' => 'GREEN XLPE 150',
                                        'value' => 1829325,
                                      ),
                                      701 => 
                                      array (
                                        'key' => 'GRINUS',
                                        'value' => 1829389,
                                      ),
                                      702 => 
                                      array (
                                        'key' => 'GTF',
                                        'value' => 1829954,
                                      ),
                                      703 => 
                                      array (
                                        'key' => 'GUNITE',
                                        'value' => 2055,
                                      ),
                                      704 => 
                                      array (
                                        'key' => 'GUNITE (TAN)',
                                        'value' => 1829353,
                                      ),
                                      705 => 
                                      array (
                                        'key' => 'H101',
                                        'value' => 13295419,
                                      ),
                                      706 => 
                                      array (
                                        'key' => 'HAMILON BLAST',
                                        'value' => 1829365,
                                      ),
                                      707 => 
                                      array (
                                        'key' => 'HAMILTON',
                                        'value' => 5756819,
                                      ),
                                      708 => 
                                      array (
                                        'key' => 'HAMILTON BLAST',
                                        'value' => 2056,
                                      ),
                                      709 => 
                                      array (
                                        'key' => 'HAMILTON HYDROCARBON DRAIN',
                                        'value' => 2057,
                                      ),
                                      710 => 
                                      array (
                                        'key' => 'Hammer Union',
                                        'value' => 1829962,
                                      ),
                                      711 => 
                                      array (
                                        'key' => 'HANLIO TWIN-LINE (GRADE R)',
                                        'value' => 1829417,
                                      ),
                                      712 => 
                                      array (
                                        'key' => 'HANLIO TWIN-LINE GRADE R',
                                        'value' => 2058,
                                      ),
                                      713 => 
                                      array (
                                        'key' => 'HART',
                                        'value' => 2059,
                                      ),
                                      714 => 
                                      array (
                                        'key' => 'HART BLACK SOFTWALL',
                                        'value' => 2060,
                                      ),
                                      715 => 
                                      array (
                                        'key' => 'HART DIISOCYANATE VIPER',
                                        'value' => 13052942,
                                      ),
                                      716 => 
                                      array (
                                        'key' => 'HART FABCHEM',
                                        'value' => 2061,
                                      ),
                                      717 => 
                                      array (
                                        'key' => 'HART FLOUR DISCHARGE',
                                        'value' => 2062,
                                      ),
                                      718 => 
                                      array (
                                        'key' => 'HART HOT AIR',
                                        'value' => 2063,
                                      ),
                                      719 => 
                                      array (
                                        'key' => 'HARVEST®',
                                        'value' => 2064,
                                      ),
                                      720 => 
                                      array (
                                        'key' => 'HAWAII MARINE',
                                        'value' => 1829377,
                                      ),
                                      721 => 
                                      array (
                                        'key' => 'HAWK PD',
                                        'value' => 1829522,
                                      ),
                                      722 => 
                                      array (
                                        'key' => 'HD AIR',
                                        'value' => 2065,
                                      ),
                                      723 => 
                                      array (
                                        'key' => 'HD AIR & WATER',
                                        'value' => 2066,
                                      ),
                                      724 => 
                                      array (
                                        'key' => 'HD AIR 300',
                                        'value' => 1829289,
                                      ),
                                      725 => 
                                      array (
                                        'key' => 'HD INDUSTRIAL VACUUM',
                                        'value' => 2067,
                                      ),
                                      726 => 
                                      array (
                                        'key' => 'HD PETRO TRANSFER',
                                        'value' => 2068,
                                      ),
                                      727 => 
                                      array (
                                        'key' => 'HD VACUUM',
                                        'value' => 2069,
                                      ),
                                      728 => 
                                      array (
                                        'key' => 'HD WATER DISCHARGE',
                                        'value' => 2070,
                                      ),
                                      729 => 
                                      array (
                                        'key' => 'HD WATER SD',
                                        'value' => 2071,
                                      ),
                                      730 => 
                                      array (
                                        'key' => 'HEALY LOW PERM',
                                        'value' => 1829101,
                                      ),
                                      731 => 
                                      array (
                                        'key' => 'HEATER HOSE 20R3D2',
                                        'value' => 2072,
                                      ),
                                      732 => 
                                      array (
                                        'key' => 'HEATER WATER',
                                        'value' => 2073,
                                      ),
                                      733 => 
                                      array (
                                        'key' => 'HEAVY DUTY STEAM PILE DRIVER',
                                        'value' => 2074,
                                      ),
                                      734 => 
                                      array (
                                        'key' => 'HEWITT',
                                        'value' => 2075,
                                      ),
                                      735 => 
                                      array (
                                        'key' => 'HEWITT AIRCRAFT',
                                        'value' => 2076,
                                      ),
                                      736 => 
                                      array (
                                        'key' => 'HEWITT JACRISER',
                                        'value' => 13052944,
                                      ),
                                      737 => 
                                      array (
                                        'key' => 'HEX',
                                        'value' => 1829505,
                                      ),
                                      738 => 
                                      array (
                                        'key' => 'HI-MINER II',
                                        'value' => 2077,
                                      ),
                                      739 => 
                                      array (
                                        'key' => 'HI-PER®',
                                        'value' => 2078,
                                      ),
                                      740 => 
                                      array (
                                        'key' => 'HIGHLAND BRINE WATER S&D',
                                        'value' => 1829287,
                                      ),
                                      741 => 
                                      array (
                                        'key' => 'HIGHLAND POTABLE WATER S&D',
                                        'value' => 1829262,
                                      ),
                                      742 => 
                                      array (
                                        'key' => 'HIGHLAND RAW WATER S&D',
                                        'value' => 1829268,
                                      ),
                                      743 => 
                                      array (
                                        'key' => 'HIGHLAND WASTE WATER S&D',
                                        'value' => 1829315,
                                      ),
                                      744 => 
                                      array (
                                        'key' => 'HIPER WATER',
                                        'value' => 2079,
                                      ),
                                      745 => 
                                      array (
                                        'key' => 'HITECH',
                                        'value' => 13056781,
                                      ),
                                      746 => 
                                      array (
                                        'key' => 'HITECH FABCHEM',
                                        'value' => 13052943,
                                      ),
                                      747 => 
                                      array (
                                        'key' => 'HITECH WASHDOWN',
                                        'value' => 1829301,
                                      ),
                                      748 => 
                                      array (
                                        'key' => 'HOFMAN',
                                        'value' => 13056807,
                                      ),
                                      749 => 
                                      array (
                                        'key' => 'HOOSIER FOOD TL',
                                        'value' => 2080,
                                      ),
                                      750 => 
                                      array (
                                        'key' => 'HORNET XF',
                                        'value' => 7186054,
                                      ),
                                      751 => 
                                      array (
                                        'key' => 'HOSCO',
                                        'value' => 2081,
                                      ),
                                      752 => 
                                      array (
                                        'key' => 'HOSE ASSEMBLY COLD',
                                        'value' => 1829095,
                                      ),
                                      753 => 
                                      array (
                                        'key' => 'HOSE ASSEMBLY HOT',
                                        'value' => 1829097,
                                      ),
                                      754 => 
                                      array (
                                        'key' => 'HOSE GUYS',
                                        'value' => 1829344,
                                      ),
                                      755 => 
                                      array (
                                        'key' => 'Hose Joiner',
                                        'value' => 1829972,
                                      ),
                                      756 => 
                                      array (
                                        'key' => 'Hose Medner with Sight Glass',
                                        'value' => 1829990,
                                      ),
                                      757 => 
                                      array (
                                        'key' => 'Hose Mender',
                                        'value' => 1829982,
                                      ),
                                      758 => 
                                      array (
                                        'key' => 'Hose Mender with Sight Glass',
                                        'value' => 1829983,
                                      ),
                                      759 => 
                                      array (
                                        'key' => 'Hose Mender, Tee',
                                        'value' => 1829984,
                                      ),
                                      760 => 
                                      array (
                                        'key' => 'HOSE POWER',
                                        'value' => 2082,
                                      ),
                                      761 => 
                                      array (
                                        'key' => 'HOSEPOWER',
                                        'value' => 2083,
                                      ),
                                      762 => 
                                      array (
                                        'key' => 'HOSEPOWER PLASTER & GROUT',
                                        'value' => 1829401,
                                      ),
                                      763 => 
                                      array (
                                        'key' => 'HOSINC',
                                        'value' => 5759835,
                                      ),
                                      764 => 
                                      array (
                                        'key' => 'HOT AIR',
                                        'value' => 1829319,
                                      ),
                                      765 => 
                                      array (
                                        'key' => 'HOT SULFUR',
                                        'value' => 7654087,
                                      ),
                                      766 => 
                                      array (
                                        'key' => 'HOT TAR & ASPHALT',
                                        'value' => 12530046,
                                      ),
                                      767 => 
                                      array (
                                        'key' => 'HOT TAR & ASPHALT EN13482',
                                        'value' => 2084,
                                      ),
                                      768 => 
                                      array (
                                        'key' => 'HOT TAR & ASPHALT ROUGH BORE',
                                        'value' => 2085,
                                      ),
                                      769 => 
                                      array (
                                        'key' => 'HOT WATER ELITE',
                                        'value' => 2086,
                                      ),
                                      770 => 
                                      array (
                                        'key' => 'HR4',
                                        'value' => 2087,
                                      ),
                                      771 => 
                                      array (
                                        'key' => 'HR6',
                                        'value' => 2088,
                                      ),
                                      772 => 
                                      array (
                                        'key' => 'HSS WATER JETTING',
                                        'value' => 1829385,
                                      ),
                                      773 => 
                                      array (
                                        'key' => 'HUDSON',
                                        'value' => 2089,
                                      ),
                                      774 => 
                                      array (
                                        'key' => 'HUMIDIFIER HOSE',
                                        'value' => 2090,
                                      ),
                                      775 => 
                                      array (
                                        'key' => 'HUSKY',
                                        'value' => 2091,
                                      ),
                                      776 => 
                                      array (
                                        'key' => 'HVLP NON-CONDUCTIVE',
                                        'value' => 2092,
                                      ),
                                      777 => 
                                      array (
                                        'key' => 'HW DRY CEMENT & BARITES',
                                        'value' => 2093,
                                      ),
                                      778 => 
                                      array (
                                        'key' => 'HW OFFSHORE FUEL',
                                        'value' => 7610826,
                                      ),
                                      779 => 
                                      array (
                                        'key' => 'HY-T HEATER HOSE',
                                        'value' => 1829350,
                                      ),
                                      780 => 
                                      array (
                                        'key' => 'HY-T PLUS',
                                        'value' => 1829503,
                                      ),
                                      781 => 
                                      array (
                                        'key' => 'HY-T TORQUE TEAM',
                                        'value' => 1829494,
                                      ),
                                      782 => 
                                      array (
                                        'key' => 'HY-T TORQUE TEAM LAMINATED',
                                        'value' => 1829502,
                                      ),
                                      783 => 
                                      array (
                                        'key' => 'HY-T TORQUE TEAM PLUS',
                                        'value' => 1829499,
                                      ),
                                      784 => 
                                      array (
                                        'key' => 'HY-T WEDGE',
                                        'value' => 1829506,
                                      ),
                                      785 => 
                                      array (
                                        'key' => 'HY-T WEDGE TORQUE TEAM',
                                        'value' => 1829501,
                                      ),
                                      786 => 
                                      array (
                                        'key' => 'HYDROCARBON DRAIN',
                                        'value' => 2094,
                                      ),
                                      787 => 
                                      array (
                                        'key' => 'HYDROVATOR',
                                        'value' => 2095,
                                      ),
                                      788 => 
                                      array (
                                        'key' => 'HYDROVATOR PLUS',
                                        'value' => 2096,
                                      ),
                                      789 => 
                                      array (
                                        'key' => 'I.R.F.',
                                        'value' => 2097,
                                      ),
                                      790 => 
                                      array (
                                        'key' => 'IBM COOLING WATER',
                                        'value' => 2098,
                                      ),
                                      791 => 
                                      array (
                                        'key' => 'IBRS',
                                        'value' => 2099,
                                      ),
                                      792 => 
                                      array (
                                        'key' => 'IBRS FISH HOSE',
                                        'value' => 1829113,
                                      ),
                                      793 => 
                                      array (
                                        'key' => 'IBRS FISH S&D',
                                        'value' => 1829195,
                                      ),
                                      794 => 
                                      array (
                                        'key' => 'IBRS SANITARY',
                                        'value' => 2100,
                                      ),
                                      795 => 
                                      array (
                                        'key' => 'ICE CUTTER HOSE',
                                        'value' => 2101,
                                      ),
                                      796 => 
                                      array (
                                        'key' => 'ICS GROUP AIR',
                                        'value' => 1829356,
                                      ),
                                      797 => 
                                      array (
                                        'key' => 'IMPERL POLARSHIELD',
                                        'value' => 1829216,
                                      ),
                                      798 => 
                                      array (
                                        'key' => 'INERT GAS',
                                        'value' => 2102,
                                      ),
                                      799 => 
                                      array (
                                        'key' => 'INET COOLING',
                                        'value' => 2103,
                                      ),
                                      800 => 
                                      array (
                                        'key' => 'INFINITY™ CHEM',
                                        'value' => 1829288,
                                      ),
                                      801 => 
                                      array (
                                        'key' => 'INFINITY™ CHEMICAL',
                                        'value' => 2104,
                                      ),
                                      802 => 
                                      array (
                                        'key' => 'INFINITY™ FOOD',
                                        'value' => 2105,
                                      ),
                                      803 => 
                                      array (
                                        'key' => 'INFINITY™ FUEL DROP',
                                        'value' => 2106,
                                      ),
                                      804 => 
                                      array (
                                        'key' => 'INFINITY™ FUEL DROP HD',
                                        'value' => 2107,
                                      ),
                                      805 => 
                                      array (
                                        'key' => 'INFINITY™ MILK',
                                        'value' => 2108,
                                      ),
                                      806 => 
                                      array (
                                        'key' => 'INJECTION COOLANT',
                                        'value' => 2109,
                                      ),
                                      807 => 
                                      array (
                                        'key' => 'INLET HOSE',
                                        'value' => 2110,
                                      ),
                                      808 => 
                                      array (
                                        'key' => 'Inline Orifice Tubes',
                                        'value' => 1829996,
                                      ),
                                      809 => 
                                      array (
                                        'key' => 'INSTA-GRIP™',
                                        'value' => 1829109,
                                      ),
                                      810 => 
                                      array (
                                        'key' => 'INSTA-GRIP™ 250',
                                        'value' => 2111,
                                      ),
                                      811 => 
                                      array (
                                        'key' => 'INSTA-GRIP™ 300',
                                        'value' => 2112,
                                      ),
                                      812 => 
                                      array (
                                        'key' => 'INSTA-GRIP™ HT',
                                        'value' => 2113,
                                      ),
                                      813 => 
                                      array (
                                        'key' => 'INSTA-GRIP™ SP',
                                        'value' => 2114,
                                      ),
                                      814 => 
                                      array (
                                        'key' => 'INSTA-GRIP™ TC',
                                        'value' => 2115,
                                      ),
                                      815 => 
                                      array (
                                        'key' => 'INSTA-LOCK',
                                        'value' => 2116,
                                      ),
                                      816 => 
                                      array (
                                        'key' => 'INSTA-LOCK ADAPTER',
                                        'value' => 1829281,
                                      ),
                                      817 => 
                                      array (
                                        'key' => 'INSTA-LOCK COUPLER',
                                        'value' => 1829269,
                                      ),
                                      818 => 
                                      array (
                                        'key' => 'INSTA-LOCK CRIMP SLEEVE',
                                        'value' => 1829290,
                                      ),
                                      819 => 
                                      array (
                                        'key' => 'INSTA-LOCK DUST CAP',
                                        'value' => 1829167,
                                      ),
                                      820 => 
                                      array (
                                        'key' => 'INSTA-LOCK DUST PLUG',
                                        'value' => 1829295,
                                      ),
                                      821 => 
                                      array (
                                        'key' => 'INSTA-LOCK FERRULE',
                                        'value' => 1829278,
                                      ),
                                      822 => 
                                      array (
                                        'key' => 'INSTA-LOCK GASKET',
                                        'value' => 1829302,
                                      ),
                                      823 => 
                                      array (
                                        'key' => 'INSTA-LOCK HOSE STEM',
                                        'value' => 1829277,
                                      ),
                                      824 => 
                                      array (
                                        'key' => 'INSTA-LOCK JUMP SIZE',
                                        'value' => 1829251,
                                      ),
                                      825 => 
                                      array (
                                        'key' => 'INSTA-LOCK SPOOL ADAPTER',
                                        'value' => 1829314,
                                      ),
                                      826 => 
                                      array (
                                        'key' => 'INSTA-LOCK TYPE A',
                                        'value' => 1829243,
                                      ),
                                      827 => 
                                      array (
                                        'key' => 'INSTA-LOCK TYPE B',
                                        'value' => 1829248,
                                      ),
                                      828 => 
                                      array (
                                        'key' => 'INSTA-LOCK TYPE C',
                                        'value' => 1829119,
                                      ),
                                      829 => 
                                      array (
                                        'key' => 'INSTA-LOCK TYPE D',
                                        'value' => 1829115,
                                      ),
                                      830 => 
                                      array (
                                        'key' => 'INSTA-LOCK TYPE E',
                                        'value' => 1829223,
                                      ),
                                      831 => 
                                      array (
                                        'key' => 'INSTA-LOCK TYPE F',
                                        'value' => 1829285,
                                      ),
                                      832 => 
                                      array (
                                        'key' => 'INSTA-LOCK™ REPAIR KIT',
                                        'value' => 7989390,
                                      ),
                                      833 => 
                                      array (
                                        'key' => 'INSTA-POWER',
                                        'value' => 1829496,
                                      ),
                                      834 => 
                                      array (
                                        'key' => 'INTERCHANGE',
                                        'value' => 5764902,
                                      ),
                                      835 => 
                                      array (
                                        'key' => 'INTERCHEM',
                                        'value' => 2117,
                                      ),
                                      836 => 
                                      array (
                                        'key' => 'INTERM',
                                        'value' => 2118,
                                      ),
                                      837 => 
                                      array (
                                        'key' => 'INTERNATIONAL BELT',
                                        'value' => 2119,
                                      ),
                                      838 => 
                                      array (
                                        'key' => 'INTERNATIONAL BELT VERSIFLO S&D',
                                        'value' => 1829393,
                                      ),
                                      839 => 
                                      array (
                                        'key' => 'IRC DRILL WATER',
                                        'value' => 2120,
                                      ),
                                      840 => 
                                      array (
                                        'key' => 'IRPCO',
                                        'value' => 2121,
                                      ),
                                      841 => 
                                      array (
                                        'key' => 'IRPCO RED FUEL OIL',
                                        'value' => 1829155,
                                      ),
                                      842 => 
                                      array (
                                        'key' => 'IRR',
                                        'value' => 2122,
                                      ),
                                      843 => 
                                      array (
                                        'key' => 'IRR FLEX JET',
                                        'value' => 2123,
                                      ),
                                      844 => 
                                      array (
                                        'key' => 'IRRIGATION BOOT',
                                        'value' => 2124,
                                      ),
                                      845 => 
                                      array (
                                        'key' => 'ISO 3821',
                                        'value' => 2125,
                                      ),
                                      846 => 
                                      array (
                                        'key' => 'ISO 8031',
                                        'value' => 2126,
                                      ),
                                      847 => 
                                      array (
                                        'key' => 'ITALPR',
                                        'value' => 2127,
                                      ),
                                      848 => 
                                      array (
                                        'key' => 'ITALPR TEFLON',
                                        'value' => 2128,
                                      ),
                                      849 => 
                                      array (
                                        'key' => 'JACKHAMMER',
                                        'value' => 2129,
                                      ),
                                      850 => 
                                      array (
                                        'key' => 'JB INDUSTRIES',
                                        'value' => 2130,
                                      ),
                                      851 => 
                                      array (
                                        'key' => 'JET RANGER™',
                                        'value' => 2131,
                                      ),
                                      852 => 
                                      array (
                                        'key' => 'JETTING',
                                        'value' => 2132,
                                      ),
                                      853 => 
                                      array (
                                        'key' => 'JETTING AND UTILITY',
                                        'value' => 2133,
                                      ),
                                      854 => 
                                      array (
                                        'key' => 'JETTING UTILITY',
                                        'value' => 1829339,
                                      ),
                                      855 => 
                                      array (
                                        'key' => 'JGB INDUSTRIES',
                                        'value' => 2134,
                                      ),
                                      856 => 
                                      array (
                                        'key' => 'JIC 37° Flare',
                                        'value' => 1829945,
                                      ),
                                      857 => 
                                      array (
                                        'key' => 'JIC 37° Flare',
                                        'value' => 1830011,
                                      ),
                                      858 => 
                                      array (
                                        'key' => 'JIC 37° Male X JIC 37° Male',
                                        'value' => 7445338,
                                      ),
                                      859 => 
                                      array (
                                        'key' => 'JIC 37°, MALE - NPTF, MALE',
                                        'value' => 13295420,
                                      ),
                                      860 => 
                                      array (
                                        'key' => 'JIS 30 (Paralled Pipe Threads)',
                                        'value' => 1829971,
                                      ),
                                      861 => 
                                      array (
                                        'key' => 'JIS 30 (Parallel Pipe Threads)',
                                        'value' => 1829978,
                                      ),
                                      862 => 
                                      array (
                                        'key' => 'JOHN DEERE',
                                        'value' => 2135,
                                      ),
                                      863 => 
                                      array (
                                        'key' => 'JOHN DEERE WATER S&D',
                                        'value' => 1829271,
                                      ),
                                      864 => 
                                      array (
                                        'key' => 'KAPTEC ULTRAFLEX',
                                        'value' => 2136,
                                      ),
                                      865 => 
                                      array (
                                        'key' => 'KAPTECH FOOD DICHARGE',
                                        'value' => 2137,
                                      ),
                                      866 => 
                                      array (
                                        'key' => 'KCRUBBER AUGER ARC PILING',
                                        'value' => 1829175,
                                      ),
                                      867 => 
                                      array (
                                        'key' => 'KELCO BLAST',
                                        'value' => 2138,
                                      ),
                                      868 => 
                                      array (
                                        'key' => 'KETEK FLEX PETROLEUM',
                                        'value' => 2139,
                                      ),
                                      869 => 
                                      array (
                                        'key' => 'KH DIVERS HOSE',
                                        'value' => 5580054,
                                      ),
                                      870 => 
                                      array (
                                        'key' => 'KIDDE 20079 FIRE EX UL92',
                                        'value' => 1829219,
                                      ),
                                      871 => 
                                      array (
                                        'key' => 'KIMBALL',
                                        'value' => 7079915,
                                      ),
                                      872 => 
                                      array (
                                        'key' => 'KINK GUARD',
                                        'value' => 1829280,
                                      ),
                                      873 => 
                                      array (
                                        'key' => 'KINKGUARD',
                                        'value' => 2140,
                                      ),
                                      874 => 
                                      array (
                                        'key' => 'KINKGUARD GARDEN HOSE',
                                        'value' => 1829372,
                                      ),
                                      875 => 
                                      array (
                                        'key' => 'Komatsu 30 Flare with Metric Threads',
                                        'value' => 1829970,
                                      ),
                                      876 => 
                                      array (
                                        'key' => 'Komatsu Flange',
                                        'value' => 1829963,
                                      ),
                                      877 => 
                                      array (
                                        'key' => 'L&G GE SANDER HOSE',
                                        'value' => 1829139,
                                      ),
                                      878 => 
                                      array (
                                        'key' => 'L&G ROCK DUST SW HD',
                                        'value' => 1829121,
                                      ),
                                      879 => 
                                      array (
                                        'key' => 'LABOUR BLUCOR COUPLING',
                                        'value' => 2141,
                                      ),
                                      880 => 
                                      array (
                                        'key' => 'LACTOPAL',
                                        'value' => 2142,
                                      ),
                                      881 => 
                                      array (
                                        'key' => 'LACTOPAL L',
                                        'value' => 1829414,
                                      ),
                                      882 => 
                                      array (
                                        'key' => 'LAKECHARLES',
                                        'value' => 2143,
                                      ),
                                      883 => 
                                      array (
                                        'key' => 'LEGACY TPU',
                                        'value' => 2144,
                                      ),
                                      884 => 
                                      array (
                                        'key' => 'LG NITRILE',
                                        'value' => 2145,
                                      ),
                                      885 => 
                                      array (
                                        'key' => 'LIGHTRAC',
                                        'value' => 2146,
                                      ),
                                      886 => 
                                      array (
                                        'key' => 'LIGHTWEIGHT VACUUM',
                                        'value' => 2147,
                                      ),
                                      887 => 
                                      array (
                                        'key' => 'LINECRETE',
                                        'value' => 2148,
                                      ),
                                      888 => 
                                      array (
                                        'key' => 'LIQUID MUD',
                                        'value' => 2149,
                                      ),
                                      889 => 
                                      array (
                                        'key' => 'LIQUID MUD YS',
                                        'value' => 2150,
                                      ),
                                      890 => 
                                      array (
                                        'key' => 'LIQUIFORCE',
                                        'value' => 2151,
                                      ),
                                      891 => 
                                      array (
                                        'key' => 'LPG DELIVERY PRO',
                                        'value' => 2152,
                                      ),
                                      892 => 
                                      array (
                                        'key' => 'LUMPKIN',
                                        'value' => 1829203,
                                      ),
                                      893 => 
                                      array (
                                        'key' => 'LW ARCTIC TANK TRUCK',
                                        'value' => 2153,
                                      ),
                                      894 => 
                                      array (
                                        'key' => 'LW BLACK FLEXTRA II',
                                        'value' => 2154,
                                      ),
                                      895 => 
                                      array (
                                        'key' => 'LW INDUSTRIAL VACUUM',
                                        'value' => 2155,
                                      ),
                                      896 => 
                                      array (
                                        'key' => 'M&P MINE CONDUIT',
                                        'value' => 2156,
                                      ),
                                      897 => 
                                      array (
                                        'key' => 'M13531J-B3A',
                                        'value' => 1829133,
                                      ),
                                      898 => 
                                      array (
                                        'key' => 'MADE IN USA GARDEN',
                                        'value' => 1829273,
                                      ),
                                      899 => 
                                      array (
                                        'key' => 'MANUS BLAST',
                                        'value' => 2157,
                                      ),
                                      900 => 
                                      array (
                                        'key' => 'MANUS BLAST WHIP',
                                        'value' => 2158,
                                      ),
                                      901 => 
                                      array (
                                        'key' => 'MARIAN',
                                        'value' => 2159,
                                      ),
                                      902 => 
                                      array (
                                        'key' => 'MARINE BILGE',
                                        'value' => 2160,
                                      ),
                                      903 => 
                                      array (
                                        'key' => 'MARINE EXHAUST HOSE',
                                        'value' => 2161,
                                      ),
                                      904 => 
                                      array (
                                        'key' => 'MARINE FUEL FEED VENT J1527 B2',
                                        'value' => 2162,
                                      ),
                                      905 => 
                                      array (
                                        'key' => 'MARINE FUEL FILL',
                                        'value' => 2163,
                                      ),
                                      906 => 
                                      array (
                                        'key' => 'MARINE FUEL LINE',
                                        'value' => 2164,
                                      ),
                                      907 => 
                                      array (
                                        'key' => 'MARINE HARDWALL WET EXHAUST',
                                        'value' => 2165,
                                      ),
                                      908 => 
                                      array (
                                        'key' => 'MARINE LIVEWELL',
                                        'value' => 2166,
                                      ),
                                      909 => 
                                      array (
                                        'key' => 'MARINE OIL FILL',
                                        'value' => 2167,
                                      ),
                                      910 => 
                                      array (
                                        'key' => 'MARINE SANITATION',
                                        'value' => 2168,
                                      ),
                                      911 => 
                                      array (
                                        'key' => 'MARINE SOFTWALL WET EXHAUST',
                                        'value' => 2169,
                                      ),
                                      912 => 
                                      array (
                                        'key' => 'MARINE VACUUM',
                                        'value' => 2170,
                                      ),
                                      913 => 
                                      array (
                                        'key' => 'MAST-AIR',
                                        'value' => 2171,
                                      ),
                                      914 => 
                                      array (
                                        'key' => 'MASTERCOOL',
                                        'value' => 2172,
                                      ),
                                      915 => 
                                      array (
                                        'key' => 'MASTHD',
                                        'value' => 2173,
                                      ),
                                      916 => 
                                      array (
                                        'key' => 'MASTHEAD',
                                        'value' => 1829258,
                                      ),
                                      917 => 
                                      array (
                                        'key' => 'MASTHEAD CONTRACTOR\'S WATER',
                                        'value' => 1829352,
                                      ),
                                      918 => 
                                      array (
                                        'key' => 'MATERIAL HANDLING',
                                        'value' => 2174,
                                      ),
                                      919 => 
                                      array (
                                        'key' => 'MATERIAL HANDLING 150',
                                        'value' => 1829351,
                                      ),
                                      920 => 
                                      array (
                                        'key' => 'MATERIAL HANDLING DISCHARGE',
                                        'value' => 2175,
                                      ),
                                      921 => 
                                      array (
                                        'key' => 'MATERIAL HANDLING DISCHARGE 75',
                                        'value' => 1829334,
                                      ),
                                      922 => 
                                      array (
                                        'key' => 'MAXXIM PREMIER ULTRA',
                                        'value' => 2176,
                                      ),
                                      923 => 
                                      array (
                                        'key' => 'MCCARTY WATER S&D',
                                        'value' => 2177,
                                      ),
                                      924 => 
                                      array (
                                        'key' => 'MCGILL',
                                        'value' => 2178,
                                      ),
                                      925 => 
                                      array (
                                        'key' => 'MCP4S',
                                        'value' => 10663610,
                                      ),
                                      926 => 
                                      array (
                                        'key' => 'MCP5S',
                                        'value' => 13295422,
                                      ),
                                      927 => 
                                      array (
                                        'key' => 'MCP6S',
                                        'value' => 13295423,
                                      ),
                                      928 => 
                                      array (
                                        'key' => 'MECR&S',
                                        'value' => 2179,
                                      ),
                                      929 => 
                                      array (
                                        'key' => 'MECR&S PAINT SPRAY',
                                        'value' => 2180,
                                      ),
                                      930 => 
                                      array (
                                        'key' => 'MER OILFIELD SUCTION',
                                        'value' => 2181,
                                      ),
                                      931 => 
                                      array (
                                        'key' => 'MERCURY',
                                        'value' => 5759837,
                                      ),
                                      932 => 
                                      array (
                                        'key' => 'MERLETT ARMORVIN HNA',
                                        'value' => 5347027,
                                      ),
                                      933 => 
                                      array (
                                        'key' => 'MERLETT RAGNO CA',
                                        'value' => 5347026,
                                      ),
                                      934 => 
                                      array (
                                        'key' => 'MERLETT VACUPRESS CRISTAL',
                                        'value' => 5347028,
                                      ),
                                      935 => 
                                      array (
                                        'key' => 'MERMAR',
                                        'value' => 2182,
                                      ),
                                      936 => 
                                      array (
                                        'key' => 'MESA',
                                        'value' => 2183,
                                      ),
                                      937 => 
                                      array (
                                        'key' => 'MESA AMMONIUM NITRATE PELLET',
                                        'value' => 2184,
                                      ),
                                      938 => 
                                      array (
                                        'key' => 'MESA DRAIN',
                                        'value' => 2185,
                                      ),
                                      939 => 
                                      array (
                                        'key' => 'MESA GUNITE',
                                        'value' => 2186,
                                      ),
                                      940 => 
                                      array (
                                        'key' => 'MESA PLASTER & GROUT',
                                        'value' => 2187,
                                      ),
                                      941 => 
                                      array (
                                        'key' => 'MESA REFRACTORY GUNITE',
                                        'value' => 2188,
                                      ),
                                      942 => 
                                      array (
                                        'key' => 'MESA ROOF DRAIN',
                                        'value' => 2189,
                                      ),
                                      943 => 
                                      array (
                                        'key' => 'MESA ROOF DRAIN CHEMICAL',
                                        'value' => 2190,
                                      ),
                                      944 => 
                                      array (
                                        'key' => 'Metal Clips',
                                        'value' => 1830004,
                                      ),
                                      945 => 
                                      array (
                                        'key' => 'METRIC',
                                        'value' => 1829524,
                                      ),
                                      946 => 
                                      array (
                                        'key' => 'MH 500',
                                        'value' => 1829296,
                                      ),
                                      947 => 
                                      array (
                                        'key' => 'MH 75',
                                        'value' => 1829321,
                                      ),
                                      948 => 
                                      array (
                                        'key' => 'MHPRF 11588G II ST',
                                        'value' => 2191,
                                      ),
                                      949 => 
                                      array (
                                        'key' => 'MIDWEST',
                                        'value' => 2192,
                                      ),
                                      950 => 
                                      array (
                                        'key' => 'MIDWEST BELTING',
                                        'value' => 1829336,
                                      ),
                                      951 => 
                                      array (
                                        'key' => 'MIL 3992F',
                                        'value' => 1829222,
                                      ),
                                      952 => 
                                      array (
                                        'key' => 'MIL A-A-59566',
                                        'value' => 2193,
                                      ),
                                      953 => 
                                      array (
                                        'key' => 'MIL A-A-59567',
                                        'value' => 2194,
                                      ),
                                      954 => 
                                      array (
                                        'key' => 'MIL AA-59567 3-1',
                                        'value' => 1829292,
                                      ),
                                      955 => 
                                      array (
                                        'key' => 'MIL-A-A-59565',
                                        'value' => 2195,
                                      ),
                                      956 => 
                                      array (
                                        'key' => 'MIL-DTL-13444-I',
                                        'value' => 2196,
                                      ),
                                      957 => 
                                      array (
                                        'key' => 'MIL-DTL-13444-III',
                                        'value' => 2197,
                                      ),
                                      958 => 
                                      array (
                                        'key' => 'MIL-DTL-13531',
                                        'value' => 2198,
                                      ),
                                      959 => 
                                      array (
                                        'key' => 'MIL-DTL-17505',
                                        'value' => 2199,
                                      ),
                                      960 => 
                                      array (
                                        'key' => 'MIL-DTL-20176',
                                        'value' => 2200,
                                      ),
                                      961 => 
                                      array (
                                        'key' => 'MIL-DTL-22240',
                                        'value' => 2201,
                                      ),
                                      962 => 
                                      array (
                                        'key' => 'MIL-DTL-27516',
                                        'value' => 2202,
                                      ),
                                      963 => 
                                      array (
                                        'key' => 'MIL-DTL-29210E',
                                        'value' => 2203,
                                      ),
                                      964 => 
                                      array (
                                        'key' => 'MIL-DTL-3992',
                                        'value' => 11047034,
                                      ),
                                      965 => 
                                      array (
                                        'key' => 'MIL-DTL-6615',
                                        'value' => 2204,
                                      ),
                                      966 => 
                                      array (
                                        'key' => 'MIL-DTL-8788',
                                        'value' => 1830042,
                                      ),
                                      967 => 
                                      array (
                                        'key' => 'MIL-H-24136/4',
                                        'value' => 1829435,
                                      ),
                                      968 => 
                                      array (
                                        'key' => 'MIL-H-24580',
                                        'value' => 2205,
                                      ),
                                      969 => 
                                      array (
                                        'key' => 'MIL-H-82127',
                                        'value' => 2206,
                                      ),
                                      970 => 
                                      array (
                                        'key' => 'MIL-PRF-11588 TYPE I',
                                        'value' => 2207,
                                      ),
                                      971 => 
                                      array (
                                        'key' => 'MIL-PRF-11588 TYPE III',
                                        'value' => 2208,
                                      ),
                                      972 => 
                                      array (
                                        'key' => 'MIL-PRF-370 TYPE A',
                                        'value' => 2209,
                                      ),
                                      973 => 
                                      array (
                                        'key' => 'MIL-PRF-370 TYPE B',
                                        'value' => 2210,
                                      ),
                                      974 => 
                                      array (
                                        'key' => 'MILTARY',
                                        'value' => 2211,
                                      ),
                                      975 => 
                                      array (
                                        'key' => 'MILTON',
                                        'value' => 2212,
                                      ),
                                      976 => 
                                      array (
                                        'key' => 'MINE CONDUIT',
                                        'value' => 2213,
                                      ),
                                      977 => 
                                      array (
                                        'key' => 'MINNICH WATER HD',
                                        'value' => 1829157,
                                      ),
                                      978 => 
                                      array (
                                        'key' => 'MISC',
                                        'value' => 1829256,
                                      ),
                                      979 => 
                                      array (
                                        'key' => 'MIT TEKTON',
                                        'value' => 1829142,
                                      ),
                                      980 => 
                                      array (
                                        'key' => 'MOCCASIN',
                                        'value' => 2214,
                                      ),
                                      981 => 
                                      array (
                                        'key' => 'MORRIS AIR SEEDER',
                                        'value' => 2215,
                                      ),
                                      982 => 
                                      array (
                                        'key' => 'MORRIS AIR SEEDER LT',
                                        'value' => 2216,
                                      ),
                                      983 => 
                                      array (
                                        'key' => 'MOSS RUBBER & EQUIPMENT',
                                        'value' => 13056795,
                                      ),
                                      984 => 
                                      array (
                                        'key' => 'MPI',
                                        'value' => 2217,
                                      ),
                                      985 => 
                                      array (
                                        'key' => 'MPI 132-0580',
                                        'value' => 1829159,
                                      ),
                                      986 => 
                                      array (
                                        'key' => 'MPI 350-0380',
                                        'value' => 1829230,
                                      ),
                                      987 => 
                                      array (
                                        'key' => 'MPI 350-0560',
                                        'value' => 1829153,
                                      ),
                                      988 => 
                                      array (
                                        'key' => 'MPI 350-0580',
                                        'value' => 1829093,
                                      ),
                                      989 => 
                                      array (
                                        'key' => 'MPI HW EXHAUST',
                                        'value' => 1829300,
                                      ),
                                      990 => 
                                      array (
                                        'key' => 'MPI HW FUEL FILL',
                                        'value' => 1829137,
                                      ),
                                      991 => 
                                      array (
                                        'key' => 'MPI PREMIUM-GUARD MARINE',
                                        'value' => 2218,
                                      ),
                                      992 => 
                                      array (
                                        'key' => 'MRS',
                                        'value' => 1829338,
                                      ),
                                      993 => 
                                      array (
                                        'key' => 'MSA AIR BREATHING',
                                        'value' => 1829117,
                                      ),
                                      994 => 
                                      array (
                                        'key' => 'MSC',
                                        'value' => 6422707,
                                      ),
                                      995 => 
                                      array (
                                        'key' => 'MUD CUTTING HW',
                                        'value' => 2219,
                                      ),
                                      996 => 
                                      array (
                                        'key' => 'MUD RETURN LINE',
                                        'value' => 2220,
                                      ),
                                      997 => 
                                      array (
                                        'key' => 'MUD STACKING',
                                        'value' => 2221,
                                      ),
                                      998 => 
                                      array (
                                        'key' => 'MULTISTREAM HW',
                                        'value' => 2222,
                                      ),
                                      999 => 
                                      array (
                                        'key' => 'MULTISTREAM SW',
                                        'value' => 2223,
                                      ),
                                      1000 => 
                                      array (
                                        'key' => 'NAFIRE',
                                        'value' => 2224,
                                      ),
                                      1001 => 
                                      array (
                                        'key' => 'NAVISTAR',
                                        'value' => 2225,
                                      ),
                                      1002 => 
                                      array (
                                        'key' => 'NELSON DUNN',
                                        'value' => 2226,
                                      ),
                                      1003 => 
                                      array (
                                        'key' => 'NELSON DUNN CABLE COVER',
                                        'value' => 1829183,
                                      ),
                                      1004 => 
                                      array (
                                        'key' => 'NEOTHANE',
                                        'value' => 1829508,
                                      ),
                                      1005 => 
                                      array (
                                        'key' => 'NEPTUNE',
                                        'value' => 2227,
                                      ),
                                      1006 => 
                                      array (
                                        'key' => 'NESI OILFIELD',
                                        'value' => 2228,
                                      ),
                                      1007 => 
                                      array (
                                        'key' => 'NEWLINE',
                                        'value' => 2229,
                                      ),
                                      1008 => 
                                      array (
                                        'key' => 'NEWLINE VINTNER RESERVE',
                                        'value' => 1829255,
                                      ),
                                      1009 => 
                                      array (
                                        'key' => 'NEWLINE WALKWAY WATER',
                                        'value' => 1829403,
                                      ),
                                      1010 => 
                                      array (
                                        'key' => 'NISHIN',
                                        'value' => 2230,
                                      ),
                                      1011 => 
                                      array (
                                        'key' => 'NISSHIN',
                                        'value' => 2231,
                                      ),
                                      1012 => 
                                      array (
                                        'key' => 'NITRO FLOOD WATER S&D',
                                        'value' => 2232,
                                      ),
                                      1013 => 
                                      array (
                                        'key' => 'NITRO R&C WATER S&D',
                                        'value' => 2233,
                                      ),
                                      1014 => 
                                      array (
                                        'key' => 'NITROGEN SERVICE',
                                        'value' => 2234,
                                      ),
                                      1015 => 
                                      array (
                                        'key' => 'NOTRAX T43S5050RD',
                                        'value' => 1829207,
                                      ),
                                      1016 => 
                                      array (
                                        'key' => 'NOV',
                                        'value' => 2235,
                                      ),
                                      1017 => 
                                      array (
                                        'key' => 'NPETRO LW',
                                        'value' => 2236,
                                      ),
                                      1018 => 
                                      array (
                                        'key' => 'NPM API',
                                        'value' => 1829979,
                                      ),
                                      1019 => 
                                      array (
                                        'key' => 'NPSM',
                                        'value' => 1829953,
                                      ),
                                      1020 => 
                                      array (
                                        'key' => 'NPT API',
                                        'value' => 1829974,
                                      ),
                                      1021 => 
                                      array (
                                        'key' => 'NPT API Hammer Union ',
                                        'value' => 1830010,
                                      ),
                                      1022 => 
                                      array (
                                        'key' => 'NPTF',
                                        'value' => 1829952,
                                      ),
                                      1023 => 
                                      array (
                                        'key' => 'NPTF Male X NPSM Female Swivel',
                                        'value' => 7445339,
                                      ),
                                      1024 => 
                                      array (
                                        'key' => 'NPTF, Male – NPSM, Female, Swivel',
                                        'value' => 14152430,
                                      ),
                                      1025 => 
                                      array (
                                        'key' => 'NPTF, Male – NPTF, Male, Hex Nipple',
                                        'value' => 14152429,
                                      ),
                                      1026 => 
                                      array (
                                        'key' => 'NR SPRAY',
                                        'value' => 2237,
                                      ),
                                      1027 => 
                                      array (
                                        'key' => 'NR7',
                                        'value' => 2238,
                                      ),
                                      1028 => 
                                      array (
                                        'key' => 'NR8',
                                        'value' => 2239,
                                      ),
                                      1029 => 
                                      array (
                                        'key' => 'NRP JONES CT5',
                                        'value' => 1829196,
                                      ),
                                      1030 => 
                                      array (
                                        'key' => 'NRP JONES NON-UL CT5',
                                        'value' => 1829120,
                                      ),
                                      1031 => 
                                      array (
                                        'key' => 'NSH',
                                        'value' => 2240,
                                      ),
                                      1032 => 
                                      array (
                                        'key' => 'NUTRIFLEX',
                                        'value' => 2241,
                                      ),
                                      1033 => 
                                      array (
                                        'key' => 'NUTRIFLEX™ S&D',
                                        'value' => 2243,
                                      ),
                                      1034 => 
                                      array (
                                        'key' => 'NUTRIFLEX™ STATIC WIRE',
                                        'value' => 2242,
                                      ),
                                      1035 => 
                                      array (
                                        'key' => 'NUTRIFLO® S&D',
                                        'value' => 2244,
                                      ),
                                      1036 => 
                                      array (
                                        'key' => 'O-Ring Boss ',
                                        'value' => 1830009,
                                      ),
                                      1037 => 
                                      array (
                                        'key' => 'O-Ring Boss Straight Thread',
                                        'value' => 1829958,
                                      ),
                                      1038 => 
                                      array (
                                        'key' => 'O-Ring Boss Straight Thread',
                                        'value' => 1829975,
                                      ),
                                      1039 => 
                                      array (
                                        'key' => 'O-Ring Boss Straight Thread O-Rings',
                                        'value' => 1831351,
                                      ),
                                      1040 => 
                                      array (
                                        'key' => 'O-Ring Face Seal',
                                        'value' => 1829957,
                                      ),
                                      1041 => 
                                      array (
                                        'key' => 'O-Ring Face Seal',
                                        'value' => 1829991,
                                      ),
                                      1042 => 
                                      array (
                                        'key' => 'O-Ring Face Seal O-Rings',
                                        'value' => 1831350,
                                      ),
                                      1043 => 
                                      array (
                                        'key' => 'O-Ring for Ford Spring Lock',
                                        'value' => 1829997,
                                      ),
                                      1044 => 
                                      array (
                                        'key' => 'O-Ring for Switch',
                                        'value' => 1829998,
                                      ),
                                      1045 => 
                                      array (
                                        'key' => 'O-Ring for Tube Fittings',
                                        'value' => 1829999,
                                      ),
                                      1046 => 
                                      array (
                                        'key' => 'O-Ring Insert',
                                        'value' => 1829985,
                                      ),
                                      1047 => 
                                      array (
                                        'key' => 'O-Ring Tube',
                                        'value' => 1829986,
                                      ),
                                      1048 => 
                                      array (
                                        'key' => 'O-Ring Tube (Female to O-Ring Insert)',
                                        'value' => 1829993,
                                      ),
                                      1049 => 
                                      array (
                                        'key' => 'O-Ring Tube Compressor (Female to O-Ring Insert) ',
                                        'value' => 1829992,
                                      ),
                                      1050 => 
                                      array (
                                        'key' => 'OAKLEY',
                                        'value' => 2245,
                                      ),
                                      1051 => 
                                      array (
                                        'key' => 'OFFSHORE FUEL',
                                        'value' => 2246,
                                      ),
                                      1052 => 
                                      array (
                                        'key' => 'OFFSHORE FUEL 500',
                                        'value' => 1829275,
                                      ),
                                      1053 => 
                                      array (
                                        'key' => 'OFFSHORE FUEL 750',
                                        'value' => 1829364,
                                      ),
                                      1054 => 
                                      array (
                                        'key' => 'OFFSHORE VIPER',
                                        'value' => 2247,
                                      ),
                                      1055 => 
                                      array (
                                        'key' => 'OIL DISCHARGE',
                                        'value' => 2248,
                                      ),
                                      1056 => 
                                      array (
                                        'key' => 'OIL RIG HARDWALL',
                                        'value' => 2249,
                                      ),
                                      1057 => 
                                      array (
                                        'key' => 'OIL RIG HARDWALL BIOFUEL',
                                        'value' => 2250,
                                      ),
                                      1058 => 
                                      array (
                                        'key' => 'OIL RIG SOFTWALL',
                                        'value' => 2251,
                                      ),
                                      1059 => 
                                      array (
                                        'key' => 'OIL RIG SW',
                                        'value' => 1829329,
                                      ),
                                      1060 => 
                                      array (
                                        'key' => 'OIL TREAT & BLENDER',
                                        'value' => 2252,
                                      ),
                                      1061 => 
                                      array (
                                        'key' => 'OILFIELD DISCHARGE',
                                        'value' => 2253,
                                      ),
                                      1062 => 
                                      array (
                                        'key' => 'OILFIELD FRAC',
                                        'value' => 2254,
                                      ),
                                      1063 => 
                                      array (
                                        'key' => 'OMNI',
                                        'value' => 2255,
                                      ),
                                      1064 => 
                                      array (
                                        'key' => 'OMNI WATER S&D',
                                        'value' => 2256,
                                      ),
                                      1065 => 
                                      array (
                                        'key' => 'OPEN END FALCON',
                                        'value' => 1829523,
                                      ),
                                      1066 => 
                                      array (
                                        'key' => 'OPEN END HAWK',
                                        'value' => 1829517,
                                      ),
                                      1067 => 
                                      array (
                                        'key' => 'OPEN END HY-T PLUS',
                                        'value' => 1829504,
                                      ),
                                      1068 => 
                                      array (
                                        'key' => 'OPEN END METRIC T PD',
                                        'value' => 1829518,
                                      ),
                                      1069 => 
                                      array (
                                        'key' => 'OPEN END POSITIVE DRIVE',
                                        'value' => 1829511,
                                      ),
                                      1070 => 
                                      array (
                                        'key' => 'OPEN END SUPER TORQUE',
                                        'value' => 1829515,
                                      ),
                                      1071 => 
                                      array (
                                        'key' => 'ORANGE FLEXWING®',
                                        'value' => 2257,
                                      ),
                                      1072 => 
                                      array (
                                        'key' => 'ORTAC™',
                                        'value' => 2258,
                                      ),
                                      1073 => 
                                      array (
                                        'key' => 'ORTAC™ II',
                                        'value' => 2259,
                                      ),
                                      1074 => 
                                      array (
                                        'key' => 'P13007 EXTREMEFLEX BEVERAGE',
                                        'value' => 14498370,
                                      ),
                                      1075 => 
                                      array (
                                        'key' => 'P5S',
                                        'value' => 10663609,
                                      ),
                                      1076 => 
                                      array (
                                        'key' => 'PACER™',
                                        'value' => 2260,
                                      ),
                                      1077 => 
                                      array (
                                        'key' => 'PACIFIC RUBBER',
                                        'value' => 5764901,
                                      ),
                                      1078 => 
                                      array (
                                        'key' => 'PACIFIC RUBBER MULCHBLOWER',
                                        'value' => 1829232,
                                      ),
                                      1079 => 
                                      array (
                                        'key' => 'PAGUFIX',
                                        'value' => 2261,
                                      ),
                                      1080 => 
                                      array (
                                        'key' => 'PALADIN',
                                        'value' => 2262,
                                      ),
                                      1081 => 
                                      array (
                                        'key' => 'PALADIN DROP',
                                        'value' => 1829164,
                                      ),
                                      1082 => 
                                      array (
                                        'key' => 'PANAMA',
                                        'value' => 13056784,
                                      ),
                                      1083 => 
                                      array (
                                        'key' => 'PANGBORN PA BLAST',
                                        'value' => 2263,
                                      ),
                                      1084 => 
                                      array (
                                        'key' => 'PARAGON',
                                        'value' => 13056794,
                                      ),
                                      1085 => 
                                      array (
                                        'key' => 'PARC2W',
                                        'value' => 12472318,
                                      ),
                                      1086 => 
                                      array (
                                        'key' => 'PARC5S',
                                        'value' => 10663608,
                                      ),
                                      1087 => 
                                      array (
                                        'key' => 'PARKING',
                                        'value' => 2264,
                                      ),
                                      1088 => 
                                      array (
                                        'key' => 'PATHFINDER ECO',
                                        'value' => 3831419,
                                      ),
                                      1089 => 
                                      array (
                                        'key' => 'PATHFINDER GARDEN',
                                        'value' => 1829283,
                                      ),
                                      1090 => 
                                      array (
                                        'key' => 'PBE',
                                        'value' => 5355082,
                                      ),
                                      1091 => 
                                      array (
                                        'key' => 'PC200i',
                                        'value' => 7738136,
                                      ),
                                      1092 => 
                                      array (
                                        'key' => 'PEAK ENERGY FRONTIER',
                                        'value' => 1829371,
                                      ),
                                      1093 => 
                                      array (
                                        'key' => 'PERFECT GARDEN HOSE',
                                        'value' => 2265,
                                      ),
                                      1094 => 
                                      array (
                                        'key' => 'PERLAPAL',
                                        'value' => 2266,
                                      ),
                                      1095 => 
                                      array (
                                        'key' => 'PETERS LIQUID MUD',
                                        'value' => 2267,
                                      ),
                                      1096 => 
                                      array (
                                        'key' => 'PETRO OIL S&D',
                                        'value' => 2268,
                                      ),
                                      1097 => 
                                      array (
                                        'key' => 'PETRO OIL S&D 200',
                                        'value' => 1829416,
                                      ),
                                      1098 => 
                                      array (
                                        'key' => 'PETROHOSE',
                                        'value' => 5759832,
                                      ),
                                      1099 => 
                                      array (
                                        'key' => 'PETROL 400 HARDWALL',
                                        'value' => 1829355,
                                      ),
                                      1100 => 
                                      array (
                                        'key' => 'PETROL HARDWALL',
                                        'value' => 2269,
                                      ),
                                      1101 => 
                                      array (
                                        'key' => 'PGC PLACEMENT TEXTILE',
                                        'value' => 2270,
                                      ),
                                      1102 => 
                                      array (
                                        'key' => 'PHILLIPS 66 HYDROCARBON DRAIN',
                                        'value' => 1829218,
                                      ),
                                      1103 => 
                                      array (
                                        'key' => 'PHX FUEL GAS',
                                        'value' => 2271,
                                      ),
                                      1104 => 
                                      array (
                                        'key' => 'PHX OXYGEN',
                                        'value' => 2272,
                                      ),
                                      1105 => 
                                      array (
                                        'key' => 'PIONEER',
                                        'value' => 12265901,
                                      ),
                                      1106 => 
                                      array (
                                        'key' => 'PIONEER FLEXWING FOOD',
                                        'value' => 12265902,
                                      ),
                                      1107 => 
                                      array (
                                        'key' => 'PIONEER HOT AIR II SP',
                                        'value' => 1829220,
                                      ),
                                      1108 => 
                                      array (
                                        'key' => 'PIONEER PETRO TANK TRUCK',
                                        'value' => 1829386,
                                      ),
                                      1109 => 
                                      array (
                                        'key' => 'PIONEER XF BLAST',
                                        'value' => 1829379,
                                      ),
                                      1110 => 
                                      array (
                                        'key' => 'PLASTER & GROUT',
                                        'value' => 2273,
                                      ),
                                      1111 => 
                                      array (
                                        'key' => 'Plastic Clip Holder',
                                        'value' => 1830005,
                                      ),
                                      1112 => 
                                      array (
                                        'key' => 'Plastic Process Equipment',
                                        'value' => 6951846,
                                      ),
                                      1113 => 
                                      array (
                                        'key' => 'PLATINUM JAC RISER',
                                        'value' => 2274,
                                      ),
                                      1114 => 
                                      array (
                                        'key' => 'PLIOVIC AG SPRAY',
                                        'value' => 1829274,
                                      ),
                                      1115 => 
                                      array (
                                        'key' => 'PLIOVIC GS™',
                                        'value' => 2276,
                                      ),
                                      1116 => 
                                      array (
                                        'key' => 'PLIOVIC LIGHT WEIGHT',
                                        'value' => 10705761,
                                      ),
                                      1117 => 
                                      array (
                                        'key' => 'PLIOVIC PLUS',
                                        'value' => 2277,
                                      ),
                                      1118 => 
                                      array (
                                        'key' => 'PLIOVIC PVC TUBING',
                                        'value' => 2278,
                                      ),
                                      1119 => 
                                      array (
                                        'key' => 'PLIOVIC® FG',
                                        'value' => 2275,
                                      ),
                                      1120 => 
                                      array (
                                        'key' => 'POLAR SERVICE CENTER',
                                        'value' => 13056793,
                                      ),
                                      1121 => 
                                      array (
                                        'key' => 'POLY-V',
                                        'value' => 1829493,
                                      ),
                                      1122 => 
                                      array (
                                        'key' => 'POSEIDON',
                                        'value' => 10631868,
                                      ),
                                      1123 => 
                                      array (
                                        'key' => 'POSEIDON UL94-HB',
                                        'value' => 2279,
                                      ),
                                      1124 => 
                                      array (
                                        'key' => 'POSITIVE DRIVE PD',
                                        'value' => 1829509,
                                      ),
                                      1125 => 
                                      array (
                                        'key' => 'POT LINE',
                                        'value' => 2280,
                                      ),
                                      1126 => 
                                      array (
                                        'key' => 'POT LINE HD',
                                        'value' => 2281,
                                      ),
                                      1127 => 
                                      array (
                                        'key' => 'POTABLE STOCK TANK',
                                        'value' => 2282,
                                      ),
                                      1128 => 
                                      array (
                                        'key' => 'POTABLE WATER',
                                        'value' => 2283,
                                      ),
                                      1129 => 
                                      array (
                                        'key' => 'POTABLE WATER HW',
                                        'value' => 2284,
                                      ),
                                      1130 => 
                                      array (
                                        'key' => 'POTABLE WATER S&D',
                                        'value' => 1829346,
                                      ),
                                      1131 => 
                                      array (
                                        'key' => 'POTABLE WATER SW',
                                        'value' => 2285,
                                      ),
                                      1132 => 
                                      array (
                                        'key' => 'POWER PORT',
                                        'value' => 3831236,
                                      ),
                                      1133 => 
                                      array (
                                        'key' => 'POWERSPAN CL',
                                        'value' => 1829528,
                                      ),
                                      1134 => 
                                      array (
                                        'key' => 'PRAIRIE GOLDFLEX',
                                        'value' => 2286,
                                      ),
                                      1135 => 
                                      array (
                                        'key' => 'PRAIRIE GOLDFLEX PETRO',
                                        'value' => 1829174,
                                      ),
                                      1136 => 
                                      array (
                                        'key' => 'PREM MARINE WET EXHAUST COR',
                                        'value' => 2287,
                                      ),
                                      1137 => 
                                      array (
                                        'key' => 'PREMIER',
                                        'value' => 1829311,
                                      ),
                                      1138 => 
                                      array (
                                        'key' => 'PREMIER AIR 1000',
                                        'value' => 1829361,
                                      ),
                                      1139 => 
                                      array (
                                        'key' => 'PREMIER REFRACTORY CLAMP',
                                        'value' => 2288,
                                      ),
                                      1140 => 
                                      array (
                                        'key' => 'PREMIER VINTNER',
                                        'value' => 1829266,
                                      ),
                                      1141 => 
                                      array (
                                        'key' => 'PREMIUM GARDEN',
                                        'value' => 2289,
                                      ),
                                      1142 => 
                                      array (
                                        'key' => 'PREMIUM MARINE WET EXHAUST',
                                        'value' => 2290,
                                      ),
                                      1143 => 
                                      array (
                                        'key' => 'PROFESSIONAL AIR',
                                        'value' => 3831234,
                                      ),
                                      1144 => 
                                      array (
                                        'key' => 'PROSPECTOR CLEAN IN PLACE',
                                        'value' => 12907334,
                                      ),
                                      1145 => 
                                      array (
                                        'key' => 'PROSPECTOR FRAC 400 DISCHARGE',
                                        'value' => 1829404,
                                      ),
                                      1146 => 
                                      array (
                                        'key' => 'PROSPECTOR FRAC S&D',
                                        'value' => 7563312,
                                      ),
                                      1147 => 
                                      array (
                                        'key' => 'PROSPECTORFLEX BLUE UHMWPE',
                                        'value' => 1829272,
                                      ),
                                      1148 => 
                                      array (
                                        'key' => 'PROSPECTOR™ AIR',
                                        'value' => 2291,
                                      ),
                                      1149 => 
                                      array (
                                        'key' => 'PROSPECTOR™ BOP 3000',
                                        'value' => 2292,
                                      ),
                                      1150 => 
                                      array (
                                        'key' => 'PROSPECTOR™ BOP 5000',
                                        'value' => 2293,
                                      ),
                                      1151 => 
                                      array (
                                        'key' => 'PROSPECTOR™ FLEX',
                                        'value' => 2294,
                                      ),
                                      1152 => 
                                      array (
                                        'key' => 'PROSPECTOR™ FLEX OILFIELD',
                                        'value' => 2295,
                                      ),
                                      1153 => 
                                      array (
                                        'key' => 'PROSPECTOR™ FLEX PETRO',
                                        'value' => 2296,
                                      ),
                                      1154 => 
                                      array (
                                        'key' => 'PROSPECTOR™ FRAC DISCHARGE',
                                        'value' => 2297,
                                      ),
                                      1155 => 
                                      array (
                                        'key' => 'PROSPECTOR™ FRAC TANK HOSE',
                                        'value' => 2298,
                                      ),
                                      1156 => 
                                      array (
                                        'key' => 'PROSPECTOR™ HOT OILER',
                                        'value' => 2299,
                                      ),
                                      1157 => 
                                      array (
                                        'key' => 'PROSPECTOR™ MINESPRAY',
                                        'value' => 2300,
                                      ),
                                      1158 => 
                                      array (
                                        'key' => 'PROSPECTOR™ OIL RIG HARDWALL',
                                        'value' => 1829396,
                                      ),
                                      1159 => 
                                      array (
                                        'key' => 'PROSPECTOR™ OIL RIG HW',
                                        'value' => 2301,
                                      ),
                                      1160 => 
                                      array (
                                        'key' => 'PROSPECTOR™ OIL RIG SW',
                                        'value' => 2302,
                                      ),
                                      1161 => 
                                      array (
                                        'key' => 'PROSPECTOR™ OILFIELD',
                                        'value' => 2303,
                                      ),
                                      1162 => 
                                      array (
                                        'key' => 'PROSPECTOR™ OILFIELD S&D',
                                        'value' => 2304,
                                      ),
                                      1163 => 
                                      array (
                                        'key' => 'PROSPECTOR™ OILFIELD S&D 150',
                                        'value' => 1829375,
                                      ),
                                      1164 => 
                                      array (
                                        'key' => 'PROSPECTOR™ OILFIELD S&D 300',
                                        'value' => 1829241,
                                      ),
                                      1165 => 
                                      array (
                                        'key' => 'PROSPECTOR™ PETRO',
                                        'value' => 2305,
                                      ),
                                      1166 => 
                                      array (
                                        'key' => 'PROSPECTOR™ PLUS AIR',
                                        'value' => 2306,
                                      ),
                                      1167 => 
                                      array (
                                        'key' => 'PROSPECTOR™ SHR',
                                        'value' => 2307,
                                      ),
                                      1168 => 
                                      array (
                                        'key' => 'PROSPECTOR™ WATER DISCHARGE',
                                        'value' => 2308,
                                      ),
                                      1169 => 
                                      array (
                                        'key' => 'PROSPECTOR™ WATER DISCHARGE 150',
                                        'value' => 1829169,
                                      ),
                                      1170 => 
                                      array (
                                        'key' => 'PROSPECTOR™ WATER S&D',
                                        'value' => 2309,
                                      ),
                                      1171 => 
                                      array (
                                        'key' => 'PROTECTION RING',
                                        'value' => 2310,
                                      ),
                                      1172 => 
                                      array (
                                        'key' => 'PSC CHEMICAL',
                                        'value' => 2311,
                                      ),
                                      1173 => 
                                      array (
                                        'key' => 'PTT 30',
                                        'value' => 1830008,
                                      ),
                                      1174 => 
                                      array (
                                        'key' => 'PULP & PAPER WASHDOWN',
                                        'value' => 2312,
                                      ),
                                      1175 => 
                                      array (
                                        'key' => 'PUMPTEC PULSE',
                                        'value' => 1829211,
                                      ),
                                      1176 => 
                                      array (
                                        'key' => 'PUREONE',
                                        'value' => 2313,
                                      ),
                                      1177 => 
                                      array (
                                        'key' => 'PURFIT',
                                        'value' => 2314,
                                      ),
                                      1178 => 
                                      array (
                                        'key' => 'PURFIT BREWLINE',
                                        'value' => 2315,
                                      ),
                                      1179 => 
                                      array (
                                        'key' => 'PURPLE FLEXWING®',
                                        'value' => 2316,
                                      ),
                                      1180 => 
                                      array (
                                        'key' => 'PURPLE SNAKE PLUS',
                                        'value' => 2318,
                                      ),
                                      1181 => 
                                      array (
                                        'key' => 'PURPLE SNAKE®',
                                        'value' => 2317,
                                      ),
                                      1182 => 
                                      array (
                                        'key' => 'PYROFLEX HOT AIR',
                                        'value' => 2319,
                                      ),
                                      1183 => 
                                      array (
                                        'key' => 'PYROFLEX HOT TAR & ASPHALT II',
                                        'value' => 1829129,
                                      ),
                                      1184 => 
                                      array (
                                        'key' => 'PYROFLEX HOT TAR WAND',
                                        'value' => 2321,
                                      ),
                                      1185 => 
                                      array (
                                        'key' => 'PYROFLEX II HOT TAR & ASPHALT',
                                        'value' => 2323,
                                      ),
                                      1186 => 
                                      array (
                                        'key' => 'PYROFLEX III HOT AIR',
                                        'value' => 2324,
                                      ),
                                      1187 => 
                                      array (
                                        'key' => 'PYROFLEX III HOT AIR FDA',
                                        'value' => 2325,
                                      ),
                                      1188 => 
                                      array (
                                        'key' => 'PYROFLEX® HOT AIR II',
                                        'value' => 1829132,
                                      ),
                                      1189 => 
                                      array (
                                        'key' => 'PYROFLEX® HOT AIR III FDA',
                                        'value' => 2320,
                                      ),
                                      1190 => 
                                      array (
                                        'key' => 'PYROFLEX® II HOT AIR',
                                        'value' => 2322,
                                      ),
                                      1191 => 
                                      array (
                                        'key' => 'QR048',
                                        'value' => 2326,
                                      ),
                                      1192 => 
                                      array (
                                        'key' => 'QR48',
                                        'value' => 2327,
                                      ),
                                      1193 => 
                                      array (
                                        'key' => 'QUIKSTIR',
                                        'value' => 2328,
                                      ),
                                      1194 => 
                                      array (
                                        'key' => 'QUIKSTIR PUMP 2P',
                                        'value' => 2329,
                                      ),
                                      1195 => 
                                      array (
                                        'key' => 'R/W',
                                        'value' => 1829432,
                                      ),
                                      1196 => 
                                      array (
                                        'key' => 'RADIATOR',
                                        'value' => 2330,
                                      ),
                                      1197 => 
                                      array (
                                        'key' => 'RADIATOR HOSE',
                                        'value' => 1829347,
                                      ),
                                      1198 => 
                                      array (
                                        'key' => 'RAGCO',
                                        'value' => 2331,
                                      ),
                                      1199 => 
                                      array (
                                        'key' => 'RAGCO FABCHEM',
                                        'value' => 1829242,
                                      ),
                                      1200 => 
                                      array (
                                        'key' => 'RAGCO FLEX KENT',
                                        'value' => 1829387,
                                      ),
                                      1201 => 
                                      array (
                                        'key' => 'RAIL',
                                        'value' => 2332,
                                      ),
                                      1202 => 
                                      array (
                                        'key' => 'RANSBG NR SPRAY',
                                        'value' => 2333,
                                      ),
                                      1203 => 
                                      array (
                                        'key' => 'RAWHID FIRE ENGINE BOOSTER',
                                        'value' => 2334,
                                      ),
                                      1204 => 
                                      array (
                                        'key' => 'RBR & ACC',
                                        'value' => 11069176,
                                      ),
                                      1205 => 
                                      array (
                                        'key' => 'RCT FLEXRITE',
                                        'value' => 2335,
                                      ),
                                      1206 => 
                                      array (
                                        'key' => 'RDC',
                                        'value' => 2336,
                                      ),
                                      1207 => 
                                      array (
                                        'key' => 'REAL RUBBER',
                                        'value' => 2337,
                                      ),
                                      1208 => 
                                      array (
                                        'key' => 'RED FLEXTRA 100',
                                        'value' => 1829324,
                                      ),
                                      1209 => 
                                      array (
                                        'key' => 'RED FLEXTRA 150',
                                        'value' => 1829304,
                                      ),
                                      1210 => 
                                      array (
                                        'key' => 'RED FLEXTRA®',
                                        'value' => 2338,
                                      ),
                                      1211 => 
                                      array (
                                        'key' => 'RED HORNET',
                                        'value' => 7186052,
                                      ),
                                      1212 => 
                                      array (
                                        'key' => 'RED ORTAC II',
                                        'value' => 1829326,
                                      ),
                                      1213 => 
                                      array (
                                        'key' => 'RED-L DIVERTER',
                                        'value' => 13056783,
                                      ),
                                      1214 => 
                                      array (
                                        'key' => 'RED-L GOLDFLEX-C',
                                        'value' => 2339,
                                      ),
                                      1215 => 
                                      array (
                                        'key' => 'RED-L PLANT STEAM',
                                        'value' => 1829210,
                                      ),
                                      1216 => 
                                      array (
                                        'key' => 'RED-L WATER',
                                        'value' => 2340,
                                      ),
                                      1217 => 
                                      array (
                                        'key' => 'REDWING BLUE LOW TEMP',
                                        'value' => 2341,
                                      ),
                                      1218 => 
                                      array (
                                        'key' => 'REDWING BLUE LOW TEMP FUEL OIL',
                                        'value' => 1829205,
                                      ),
                                      1219 => 
                                      array (
                                        'key' => 'REDWING FUEL OIL HD',
                                        'value' => 2343,
                                      ),
                                      1220 => 
                                      array (
                                        'key' => 'REDWING HIGH DURO FUEL OIL',
                                        'value' => 1829342,
                                      ),
                                      1221 => 
                                      array (
                                        'key' => 'REDWING VERSABRAID™',
                                        'value' => 2344,
                                      ),
                                      1222 => 
                                      array (
                                        'key' => 'REDWING® FUEL OIL',
                                        'value' => 2342,
                                      ),
                                      1223 => 
                                      array (
                                        'key' => 'REFRACTORY GUNITE',
                                        'value' => 2345,
                                      ),
                                      1224 => 
                                      array (
                                        'key' => 'REFRACTORY HOSE',
                                        'value' => 2346,
                                      ),
                                      1225 => 
                                      array (
                                        'key' => 'REFRIGERANT CHARGING',
                                        'value' => 2347,
                                      ),
                                      1226 => 
                                      array (
                                        'key' => 'REINFLEX',
                                        'value' => 1829154,
                                      ),
                                      1227 => 
                                      array (
                                        'key' => 'RELIANCE',
                                        'value' => 13056785,
                                      ),
                                      1228 => 
                                      array (
                                        'key' => 'RELIANCE PROSPECTOR WATER S&D',
                                        'value' => 2348,
                                      ),
                                      1229 => 
                                      array (
                                        'key' => 'RELIANCE WATER S&D',
                                        'value' => 2349,
                                      ),
                                      1230 => 
                                      array (
                                        'key' => 'RES',
                                        'value' => 2350,
                                      ),
                                      1231 => 
                                      array (
                                        'key' => 'REVERSE CIRCULATION',
                                        'value' => 2351,
                                      ),
                                      1232 => 
                                      array (
                                        'key' => 'RIG SUPPLY',
                                        'value' => 2352,
                                      ),
                                      1233 => 
                                      array (
                                        'key' => 'RIG SUPPLY SW',
                                        'value' => 2353,
                                      ),
                                      1234 => 
                                      array (
                                        'key' => 'RITCHIE CT5',
                                        'value' => 1829098,
                                      ),
                                      1235 => 
                                      array (
                                        'key' => 'RIVERB',
                                        'value' => 2354,
                                      ),
                                      1236 => 
                                      array (
                                        'key' => 'RL1131 TWIN-LINE GRADE R',
                                        'value' => 2355,
                                      ),
                                      1237 => 
                                      array (
                                        'key' => 'ROADPATCH',
                                        'value' => 2356,
                                      ),
                                      1238 => 
                                      array (
                                        'key' => 'ROBIN FREON CHARGING',
                                        'value' => 2357,
                                      ),
                                      1239 => 
                                      array (
                                        'key' => 'ROBIN NEW',
                                        'value' => 1829138,
                                      ),
                                      1240 => 
                                      array (
                                        'key' => 'ROCK DRILL',
                                        'value' => 2358,
                                      ),
                                      1241 => 
                                      array (
                                        'key' => 'ROCK DRILL RED',
                                        'value' => 1829340,
                                      ),
                                      1242 => 
                                      array (
                                        'key' => 'ROCK DUST',
                                        'value' => 1829104,
                                      ),
                                      1243 => 
                                      array (
                                        'key' => 'ROOF DRAIN',
                                        'value' => 2359,
                                      ),
                                      1244 => 
                                      array (
                                        'key' => 'ROUGH BORE (HOT TAR & ASPHALT)',
                                        'value' => 2360,
                                      ),
                                      1245 => 
                                      array (
                                        'key' => 'ROUGH BORE DOCK',
                                        'value' => 2361,
                                      ),
                                      1246 => 
                                      array (
                                        'key' => 'ROUGH BORE DOCK 200',
                                        'value' => 1829323,
                                      ),
                                      1247 => 
                                      array (
                                        'key' => 'ROUGH BORE DOCK 300',
                                        'value' => 1829221,
                                      ),
                                      1248 => 
                                      array (
                                        'key' => 'ROYAL BRASS PLIOVIC',
                                        'value' => 2362,
                                      ),
                                      1249 => 
                                      array (
                                        'key' => 'ROYAL BRASS VERSIFLO S&D',
                                        'value' => 1829214,
                                      ),
                                      1250 => 
                                      array (
                                        'key' => 'RSD',
                                        'value' => 2363,
                                      ),
                                      1251 => 
                                      array (
                                        'key' => 'RUB & GASK WATER DISCHARGE',
                                        'value' => 1829358,
                                      ),
                                      1252 => 
                                      array (
                                        'key' => 'RUBBERWORX',
                                        'value' => 12406205,
                                      ),
                                      1253 => 
                                      array (
                                        'key' => 'RX',
                                        'value' => 2364,
                                      ),
                                      1254 => 
                                      array (
                                        'key' => 'S4SH',
                                        'value' => 2365,
                                      ),
                                      1255 => 
                                      array (
                                        'key' => 'S4SP',
                                        'value' => 2366,
                                      ),
                                      1256 => 
                                      array (
                                        'key' => 'SAE 100R4',
                                        'value' => 2367,
                                      ),
                                      1257 => 
                                      array (
                                        'key' => 'SAE 20R1',
                                        'value' => 2368,
                                      ),
                                      1258 => 
                                      array (
                                        'key' => 'SAE 20R1 SB/SC',
                                        'value' => 1829428,
                                      ),
                                      1259 => 
                                      array (
                                        'key' => 'SAE 20R1 SB/SC HARDWALL',
                                        'value' => 1829429,
                                      ),
                                      1260 => 
                                      array (
                                        'key' => 'SAE 20R2 D1',
                                        'value' => 2369,
                                      ),
                                      1261 => 
                                      array (
                                        'key' => 'SAE 20R2D1',
                                        'value' => 2370,
                                      ),
                                      1262 => 
                                      array (
                                        'key' => 'SAE 45 Flare',
                                        'value' => 1829987,
                                      ),
                                      1263 => 
                                      array (
                                        'key' => 'SAE 45° Flare',
                                        'value' => 1829950,
                                      ),
                                      1264 => 
                                      array (
                                        'key' => 'SAE 45° Inverted Flare',
                                        'value' => 1829951,
                                      ),
                                      1265 => 
                                      array (
                                        'key' => 'SAE J1527 A2 R1 ISO 7840 A2',
                                        'value' => 2371,
                                      ),
                                      1266 => 
                                      array (
                                        'key' => 'SAE J1527 TYPE A2 FUEL FILL',
                                        'value' => 2372,
                                      ),
                                      1267 => 
                                      array (
                                        'key' => 'SAE-20R2 D1',
                                        'value' => 2373,
                                      ),
                                      1268 => 
                                      array (
                                        'key' => 'SAFLEX NSFX',
                                        'value' => 1829189,
                                      ),
                                      1269 => 
                                      array (
                                        'key' => 'SAFLEX® (NSFX)',
                                        'value' => 1830043,
                                      ),
                                      1270 => 
                                      array (
                                        'key' => 'SAND RECOVERY S&D',
                                        'value' => 2374,
                                      ),
                                      1271 => 
                                      array (
                                        'key' => 'SAND SUCTION',
                                        'value' => 2375,
                                      ),
                                      1272 => 
                                      array (
                                        'key' => 'SANDBLAST 400',
                                        'value' => 2376,
                                      ),
                                      1273 => 
                                      array (
                                        'key' => 'SANDBLAST DEADMAN',
                                        'value' => 1829239,
                                      ),
                                      1274 => 
                                      array (
                                        'key' => 'SANDER',
                                        'value' => 2377,
                                      ),
                                      1275 => 
                                      array (
                                        'key' => 'SANI-WASH™',
                                        'value' => 2378,
                                      ),
                                      1276 => 
                                      array (
                                        'key' => 'SANI-WASH™ PLUS',
                                        'value' => 2379,
                                      ),
                                      1277 => 
                                      array (
                                        'key' => 'SANI-WASH™ SUPREME',
                                        'value' => 2380,
                                      ),
                                      1278 => 
                                      array (
                                        'key' => 'SBQ FLOATER',
                                        'value' => 1829147,
                                      ),
                                      1279 => 
                                      array (
                                        'key' => 'SBQ PETRO',
                                        'value' => 1829313,
                                      ),
                                      1280 => 
                                      array (
                                        'key' => 'SCARFING',
                                        'value' => 7563310,
                                      ),
                                      1281 => 
                                      array (
                                        'key' => 'SCOMI LIQUID MUD',
                                        'value' => 2381,
                                      ),
                                      1282 => 
                                      array (
                                        'key' => 'SCOTT',
                                        'value' => 1829100,
                                      ),
                                      1283 => 
                                      array (
                                        'key' => 'SCOTT AIR BREATHING',
                                        'value' => 7837755,
                                      ),
                                      1284 => 
                                      array (
                                        'key' => 'SCP3',
                                        'value' => 2382,
                                      ),
                                      1285 => 
                                      array (
                                        'key' => 'SCRMAC KURB KING',
                                        'value' => 2383,
                                      ),
                                      1286 => 
                                      array (
                                        'key' => 'SEAL-RITE',
                                        'value' => 5759831,
                                      ),
                                      1287 => 
                                      array (
                                        'key' => 'SEALFS',
                                        'value' => 2384,
                                      ),
                                      1288 => 
                                      array (
                                        'key' => 'Sealing Washers',
                                        'value' => 1830000,
                                      ),
                                      1289 => 
                                      array (
                                        'key' => 'SEMLER FDA',
                                        'value' => 1829170,
                                      ),
                                      1290 => 
                                      array (
                                        'key' => 'SERVICE STATION AIR',
                                        'value' => 2385,
                                      ),
                                      1291 => 
                                      array (
                                        'key' => 'SFS',
                                        'value' => 1830044,
                                      ),
                                      1292 => 
                                      array (
                                        'key' => 'SFS (FIRE SUPPRESSION)',
                                        'value' => 2386,
                                      ),
                                      1293 => 
                                      array (
                                        'key' => 'SGOBAIN',
                                        'value' => 2387,
                                      ),
                                      1294 => 
                                      array (
                                        'key' => 'SGOBAIN FOOD DISCHARGE',
                                        'value' => 2388,
                                      ),
                                      1295 => 
                                      array (
                                        'key' => 'SGOBAIN FOOD S&D',
                                        'value' => 2389,
                                      ),
                                      1296 => 
                                      array (
                                        'key' => 'SGUN',
                                        'value' => 1830045,
                                      ),
                                      1297 => 
                                      array (
                                        'key' => 'SHELLFLEX',
                                        'value' => 2390,
                                      ),
                                      1298 => 
                                      array (
                                        'key' => 'SHIELD',
                                        'value' => 2391,
                                      ),
                                      1299 => 
                                      array (
                                        'key' => 'SHJ',
                                        'value' => 1830046,
                                      ),
                                      1300 => 
                                      array (
                                        'key' => 'SIGNAL CALL',
                                        'value' => 1829298,
                                      ),
                                      1301 => 
                                      array (
                                        'key' => 'SILENTSYNC',
                                        'value' => 1829497,
                                      ),
                                      1302 => 
                                      array (
                                        'key' => 'SINGLE-LINE (GRADE R)',
                                        'value' => 2392,
                                      ),
                                      1303 => 
                                      array (
                                        'key' => 'SINGLE-LINE (GRADE R)',
                                        'value' => 1829246,
                                      ),
                                      1304 => 
                                      array (
                                        'key' => 'SINGLE-LINE (GRADE R)',
                                        'value' => 1829383,
                                      ),
                                      1305 => 
                                      array (
                                        'key' => 'SINGLE-LINE (GRADE RM)',
                                        'value' => 2393,
                                      ),
                                      1306 => 
                                      array (
                                        'key' => 'SINGLE-LINE (GRADE T)',
                                        'value' => 2394,
                                      ),
                                      1307 => 
                                      array (
                                        'key' => 'SINGLE-LINE (GRADE T)',
                                        'value' => 1829270,
                                      ),
                                      1308 => 
                                      array (
                                        'key' => 'SINGLE-LINE (GRADE T)',
                                        'value' => 1829309,
                                      ),
                                      1309 => 
                                      array (
                                        'key' => 'SK CARBOV',
                                        'value' => 2395,
                                      ),
                                      1310 => 
                                      array (
                                        'key' => 'SKYJAK',
                                        'value' => 13295417,
                                      ),
                                      1311 => 
                                      array (
                                        'key' => 'SLURRY',
                                        'value' => 2396,
                                      ),
                                      1312 => 
                                      array (
                                        'key' => 'SMOOTH BORE DOCK',
                                        'value' => 2397,
                                      ),
                                      1313 => 
                                      array (
                                        'key' => 'SMOOTH BORE HOT TAR & ASPHALT',
                                        'value' => 2398,
                                      ),
                                      1314 => 
                                      array (
                                        'key' => 'SMOOTH BORE MOLTEN SULPHUR',
                                        'value' => 2399,
                                      ),
                                      1315 => 
                                      array (
                                        'key' => 'SNAPON',
                                        'value' => 2400,
                                      ),
                                      1316 => 
                                      array (
                                        'key' => 'SOFTUB WATER',
                                        'value' => 2401,
                                      ),
                                      1317 => 
                                      array (
                                        'key' => 'SOFTWALL',
                                        'value' => 2402,
                                      ),
                                      1318 => 
                                      array (
                                        'key' => 'SOFTWALL FDA',
                                        'value' => 5355079,
                                      ),
                                      1319 => 
                                      array (
                                        'key' => 'SOHO PROSPECTOR WATER S&D',
                                        'value' => 2403,
                                      ),
                                      1320 => 
                                      array (
                                        'key' => 'SOURCE DISPENSING',
                                        'value' => 1829108,
                                      ),
                                      1321 => 
                                      array (
                                        'key' => 'SOUTH PNEUMATICS SW',
                                        'value' => 1829198,
                                      ),
                                      1322 => 
                                      array (
                                        'key' => 'SOUTHERN',
                                        'value' => 2404,
                                      ),
                                      1323 => 
                                      array (
                                        'key' => 'SOUTHWEST RUBBER',
                                        'value' => 7082341,
                                      ),
                                      1324 => 
                                      array (
                                        'key' => 'SPARTAN',
                                        'value' => 7082427,
                                      ),
                                      1325 => 
                                      array (
                                        'key' => 'SPARTAN PRESSURE WASHER',
                                        'value' => 2405,
                                      ),
                                      1326 => 
                                      array (
                                        'key' => 'Spartan Pressure Washer',
                                        'value' => 1829156,
                                      ),
                                      1327 => 
                                      array (
                                        'key' => 'SPECIAL PD',
                                        'value' => 1829512,
                                      ),
                                      1328 => 
                                      array (
                                        'key' => 'SPEEDAIRE',
                                        'value' => 2406,
                                      ),
                                      1329 => 
                                      array (
                                        'key' => 'SPIR SEP',
                                        'value' => 2407,
                                      ),
                                      1330 => 
                                      array (
                                        'key' => 'SPIR SEP TPG',
                                        'value' => 2408,
                                      ),
                                      1331 => 
                                      array (
                                        'key' => 'SPIRAFLEX® 1500',
                                        'value' => 2409,
                                      ),
                                      1332 => 
                                      array (
                                        'key' => 'SPIRAFLEX® 1600',
                                        'value' => 2410,
                                      ),
                                      1333 => 
                                      array (
                                        'key' => 'SPIRAFLEX® 2500',
                                        'value' => 1829307,
                                      ),
                                      1334 => 
                                      array (
                                        'key' => 'SPIRAFLEX® ACTION F.E.S',
                                        'value' => 2411,
                                      ),
                                      1335 => 
                                      array (
                                        'key' => 'SPIRAFLEX® AGFLEX',
                                        'value' => 2412,
                                      ),
                                      1336 => 
                                      array (
                                        'key' => 'SPIRAFLEX® AGGIE',
                                        'value' => 2413,
                                      ),
                                      1337 => 
                                      array (
                                        'key' => 'SPIRAFLEX® AGGIE PVC',
                                        'value' => 1829366,
                                      ),
                                      1338 => 
                                      array (
                                        'key' => 'SPIRAFLEX® AIR SEEDER',
                                        'value' => 2414,
                                      ),
                                      1339 => 
                                      array (
                                        'key' => 'SPIRAFLEX® BARKBLOWER',
                                        'value' => 2415,
                                      ),
                                      1340 => 
                                      array (
                                        'key' => 'SPIRAFLEX® BLACK SUPER-DUTY',
                                        'value' => 2416,
                                      ),
                                      1341 => 
                                      array (
                                        'key' => 'SPIRAFLEX® BLACK SUPER-DUTY',
                                        'value' => 1829363,
                                      ),
                                      1342 => 
                                      array (
                                        'key' => 'SPIRAFLEX® BLUE EXTRA LIGHT DUTY',
                                        'value' => 2417,
                                      ),
                                      1343 => 
                                      array (
                                        'key' => 'SPIRAFLEX® BLUE EXTRALIGHT DUTY',
                                        'value' => 1829357,
                                      ),
                                      1344 => 
                                      array (
                                        'key' => 'SPIRAFLEX® CABLE GUARD',
                                        'value' => 2418,
                                      ),
                                      1345 => 
                                      array (
                                        'key' => 'SPIRAFLEX® DUCTING',
                                        'value' => 2419,
                                      ),
                                      1346 => 
                                      array (
                                        'key' => 'SPIRAFLEX® EXTRA LIGHT DUTY',
                                        'value' => 1829188,
                                      ),
                                      1347 => 
                                      array (
                                        'key' => 'SPIRAFLEX® FGVAC',
                                        'value' => 2420,
                                      ),
                                      1348 => 
                                      array (
                                        'key' => 'SPIRAFLEX® FISH SUCTION',
                                        'value' => 2421,
                                      ),
                                      1349 => 
                                      array (
                                        'key' => 'SPIRAFLEX® FOODVAC',
                                        'value' => 2422,
                                      ),
                                      1350 => 
                                      array (
                                        'key' => 'SPIRAFLEX® GRASSVAC',
                                        'value' => 2423,
                                      ),
                                      1351 => 
                                      array (
                                        'key' => 'SPIRAFLEX® GRAY LIGHT DUTY',
                                        'value' => 2424,
                                      ),
                                      1352 => 
                                      array (
                                        'key' => 'SPIRAFLEX® GREEN',
                                        'value' => 2425,
                                      ),
                                      1353 => 
                                      array (
                                        'key' => 'SPIRAFLEX® GREEN',
                                        'value' => 1829335,
                                      ),
                                      1354 => 
                                      array (
                                        'key' => 'SPIRAFLEX® HEAVY DUTY',
                                        'value' => 1829199,
                                      ),
                                      1355 => 
                                      array (
                                        'key' => 'SPIRAFLEX® HT',
                                        'value' => 2426,
                                      ),
                                      1356 => 
                                      array (
                                        'key' => 'SPIRAFLEX® LIGHT DUTY',
                                        'value' => 1829190,
                                      ),
                                      1357 => 
                                      array (
                                        'key' => 'SPIRAFLEX® LW ROCK DUST',
                                        'value' => 2427,
                                      ),
                                      1358 => 
                                      array (
                                        'key' => 'SPIRAFLEX® MEDIUM DUTY',
                                        'value' => 1829182,
                                      ),
                                      1359 => 
                                      array (
                                        'key' => 'SPIRAFLEX® MULCH BLOWER',
                                        'value' => 2428,
                                      ),
                                      1360 => 
                                      array (
                                        'key' => 'SPIRAFLEX® MULCHBLOWER',
                                        'value' => 2429,
                                      ),
                                      1361 => 
                                      array (
                                        'key' => 'SPIRAFLEX® OIL FILL',
                                        'value' => 7401486,
                                      ),
                                      1362 => 
                                      array (
                                        'key' => 'SPIRAFLEX® RED MEDIUM DUTY',
                                        'value' => 2430,
                                      ),
                                      1363 => 
                                      array (
                                        'key' => 'SPIRAFLEX® RED MEDIUM DUTY',
                                        'value' => 1829317,
                                      ),
                                      1364 => 
                                      array (
                                        'key' => 'SPIRAFLEX® ROCK DUST',
                                        'value' => 2431,
                                      ),
                                      1365 => 
                                      array (
                                        'key' => 'SPIRAFLEX® VACUUM',
                                        'value' => 2432,
                                      ),
                                      1366 => 
                                      array (
                                        'key' => 'SPIRAFLEX® VAPOR RECOVERY',
                                        'value' => 2433,
                                      ),
                                      1367 => 
                                      array (
                                        'key' => 'SPIRAFLEX® YELLOW HEAVY DUTY',
                                        'value' => 2434,
                                      ),
                                      1368 => 
                                      array (
                                        'key' => 'SPIRAFLEX® YELLOW HEAVY DUTY',
                                        'value' => 1829381,
                                      ),
                                      1369 => 
                                      array (
                                        'key' => 'SPIRAFLOW®',
                                        'value' => 2435,
                                      ),
                                      1370 => 
                                      array (
                                        'key' => 'SPIRATHANE HD',
                                        'value' => 2436,
                                      ),
                                      1371 => 
                                      array (
                                        'key' => 'SPIRATHANE LD',
                                        'value' => 2437,
                                      ),
                                      1372 => 
                                      array (
                                        'key' => 'SPIRATHANE PT',
                                        'value' => 2438,
                                      ),
                                      1373 => 
                                      array (
                                        'key' => 'SPIRIT',
                                        'value' => 5355081,
                                      ),
                                      1374 => 
                                      array (
                                        'key' => 'SR12',
                                        'value' => 2439,
                                      ),
                                      1375 => 
                                      array (
                                        'key' => 'SR13',
                                        'value' => 2440,
                                      ),
                                      1376 => 
                                      array (
                                        'key' => 'SR14',
                                        'value' => 2441,
                                      ),
                                      1377 => 
                                      array (
                                        'key' => 'SR14A',
                                        'value' => 2442,
                                      ),
                                      1378 => 
                                      array (
                                        'key' => 'SR14B',
                                        'value' => 2443,
                                      ),
                                      1379 => 
                                      array (
                                        'key' => 'SR15',
                                        'value' => 2444,
                                      ),
                                      1380 => 
                                      array (
                                        'key' => 'SR16SC',
                                        'value' => 2445,
                                      ),
                                      1381 => 
                                      array (
                                        'key' => 'SR18',
                                        'value' => 2446,
                                      ),
                                      1382 => 
                                      array (
                                        'key' => 'SR1SN',
                                        'value' => 2447,
                                      ),
                                      1383 => 
                                      array (
                                        'key' => 'SR2SN',
                                        'value' => 2448,
                                      ),
                                      1384 => 
                                      array (
                                        'key' => 'SR3',
                                        'value' => 2449,
                                      ),
                                      1385 => 
                                      array (
                                        'key' => 'SR5',
                                        'value' => 2450,
                                      ),
                                      1386 => 
                                      array (
                                        'key' => 'SR6',
                                        'value' => 2451,
                                      ),
                                      1387 => 
                                      array (
                                        'key' => 'SR7',
                                        'value' => 2452,
                                      ),
                                      1388 => 
                                      array (
                                        'key' => 'SR8',
                                        'value' => 2453,
                                      ),
                                      1389 => 
                                      array (
                                        'key' => 'SRS',
                                        'value' => 2454,
                                      ),
                                      1390 => 
                                      array (
                                        'key' => 'STANDARD STRAIGHT RAD',
                                        'value' => 2455,
                                      ),
                                      1391 => 
                                      array (
                                        'key' => 'Standpipe',
                                        'value' => 1829956,
                                      ),
                                      1392 => 
                                      array (
                                        'key' => 'STANLEY',
                                        'value' => 1829192,
                                      ),
                                      1393 => 
                                      array (
                                        'key' => 'STANLEY N298402',
                                        'value' => 1829197,
                                      ),
                                      1394 => 
                                      array (
                                        'key' => 'STEAM 250',
                                        'value' => 2456,
                                      ),
                                      1395 => 
                                      array (
                                        'key' => 'STEAM HOSE',
                                        'value' => 1829165,
                                      ),
                                      1396 => 
                                      array (
                                        'key' => 'STEAM PILE DRIVER',
                                        'value' => 1829345,
                                      ),
                                      1397 => 
                                      array (
                                        'key' => 'STEEL AIR',
                                        'value' => 2457,
                                      ),
                                      1398 => 
                                      array (
                                        'key' => 'STEEL AIR BOOTSTRAP',
                                        'value' => 2458,
                                      ),
                                      1399 => 
                                      array (
                                        'key' => 'STEEL AIR MSHA',
                                        'value' => 1829249,
                                      ),
                                      1400 => 
                                      array (
                                        'key' => 'Stutsman',
                                        'value' => 13294617,
                                      ),
                                      1401 => 
                                      array (
                                        'key' => 'SUBSEA CABLE',
                                        'value' => 2459,
                                      ),
                                      1402 => 
                                      array (
                                        'key' => 'SULBANA GAUNTLET',
                                        'value' => 2460,
                                      ),
                                      1403 => 
                                      array (
                                        'key' => 'SUMMERS',
                                        'value' => 1829368,
                                      ),
                                      1404 => 
                                      array (
                                        'key' => 'SUNSDEA MUD',
                                        'value' => 2461,
                                      ),
                                      1405 => 
                                      array (
                                        'key' => 'SUNSET WATER S&D FIRE SERVICE',
                                        'value' => 2462,
                                      ),
                                      1406 => 
                                      array (
                                        'key' => 'SUPER AIR 400',
                                        'value' => 2463,
                                      ),
                                      1407 => 
                                      array (
                                        'key' => 'SUPER BLACK FLEXWING®',
                                        'value' => 2464,
                                      ),
                                      1408 => 
                                      array (
                                        'key' => 'SUPER ORTAC',
                                        'value' => 1829130,
                                      ),
                                      1409 => 
                                      array (
                                        'key' => 'Super Ortac™',
                                        'value' => 2465,
                                      ),
                                      1410 => 
                                      array (
                                        'key' => 'SUPER ROCK DRILL',
                                        'value' => 2466,
                                      ),
                                      1411 => 
                                      array (
                                        'key' => 'SUPER ROCK DRILL HT',
                                        'value' => 2467,
                                      ),
                                      1412 => 
                                      array (
                                        'key' => 'SUPER SANI-WASH 300',
                                        'value' => 1829152,
                                      ),
                                      1413 => 
                                      array (
                                        'key' => 'SUPER SANI-WASH™',
                                        'value' => 2468,
                                      ),
                                      1414 => 
                                      array (
                                        'key' => 'SUPER TORQUE',
                                        'value' => 1829525,
                                      ),
                                      1415 => 
                                      array (
                                        'key' => 'SUPER YC AIR',
                                        'value' => 7082890,
                                      ),
                                      1416 => 
                                      array (
                                        'key' => 'SUPERIOR',
                                        'value' => 2469,
                                      ),
                                      1417 => 
                                      array (
                                        'key' => 'SUPERIOR PETRO TANK TRUCK',
                                        'value' => 1829380,
                                      ),
                                      1418 => 
                                      array (
                                        'key' => 'SUPFLOW',
                                        'value' => 2470,
                                      ),
                                      1419 => 
                                      array (
                                        'key' => 'SUPVAC',
                                        'value' => 2471,
                                      ),
                                      1420 => 
                                      array (
                                        'key' => 'SURELINE',
                                        'value' => 2472,
                                      ),
                                      1421 => 
                                      array (
                                        'key' => 'SURELINE BLACK',
                                        'value' => 1829306,
                                      ),
                                      1422 => 
                                      array (
                                        'key' => 'SW DRY CEMENT & BARYTES',
                                        'value' => 2473,
                                      ),
                                      1423 => 
                                      array (
                                        'key' => 'SWAGELOK',
                                        'value' => 2474,
                                      ),
                                      1424 => 
                                      array (
                                        'key' => 'SYNCHROCHAIN CARBON',
                                        'value' => 1829531,
                                      ),
                                      1425 => 
                                      array (
                                        'key' => 'TAMARACK',
                                        'value' => 1829143,
                                      ),
                                      1426 => 
                                      array (
                                        'key' => 'TAN FLEXTRA',
                                        'value' => 2475,
                                      ),
                                      1427 => 
                                      array (
                                        'key' => 'TAN FLEXTRA FDA',
                                        'value' => 2476,
                                      ),
                                      1428 => 
                                      array (
                                        'key' => 'TAN FLEXWING®',
                                        'value' => 2477,
                                      ),
                                      1429 => 
                                      array (
                                        'key' => 'TAN FLEXWING® FDA',
                                        'value' => 2478,
                                      ),
                                      1430 => 
                                      array (
                                        'key' => 'TANK CLEANING',
                                        'value' => 2479,
                                      ),
                                      1431 => 
                                      array (
                                        'key' => 'TANKER BARGE DISCHARGE',
                                        'value' => 2480,
                                      ),
                                      1432 => 
                                      array (
                                        'key' => 'TECHNIWELD',
                                        'value' => 7079917,
                                      ),
                                      1433 => 
                                      array (
                                        'key' => 'TEFLON',
                                        'value' => 2481,
                                      ),
                                      1434 => 
                                      array (
                                        'key' => 'TEFPASS',
                                        'value' => 1829162,
                                      ),
                                      1435 => 
                                      array (
                                        'key' => 'TEKNOR',
                                        'value' => 1829106,
                                      ),
                                      1436 => 
                                      array (
                                        'key' => 'TEKNOR 8650GT',
                                        'value' => 1829201,
                                      ),
                                      1437 => 
                                      array (
                                        'key' => 'TEKNOR 8696-27',
                                        'value' => 1829217,
                                      ),
                                      1438 => 
                                      array (
                                        'key' => 'TEKNOR 969RR',
                                        'value' => 1829226,
                                      ),
                                      1439 => 
                                      array (
                                        'key' => 'TETRA',
                                        'value' => 2482,
                                      ),
                                      1440 => 
                                      array (
                                        'key' => 'THERMIDOR',
                                        'value' => 2483,
                                      ),
                                      1441 => 
                                      array (
                                        'key' => 'THESE ARE TIED TO NORFOLK SPECS...',
                                        'value' => 1829257,
                                      ),
                                      1442 => 
                                      array (
                                        'key' => 'THOMPSON FLEX XLPE',
                                        'value' => 2484,
                                      ),
                                      1443 => 
                                      array (
                                        'key' => 'THUNDER INSTA-GRIP',
                                        'value' => 2485,
                                      ),
                                      1444 => 
                                      array (
                                        'key' => 'TIG WELDING',
                                        'value' => 2486,
                                      ),
                                      1445 => 
                                      array (
                                        'key' => 'TIMCO',
                                        'value' => 2487,
                                      ),
                                      1446 => 
                                      array (
                                        'key' => 'TIO EXTREMEFLEX BEVERAGE',
                                        'value' => 14498372,
                                      ),
                                      1447 => 
                                      array (
                                        'key' => 'TIPCO EXTREMEFLEX BEVERAGE',
                                        'value' => 14498373,
                                      ),
                                      1448 => 
                                      array (
                                        'key' => 'TIPCO PREMIUM GARDEN',
                                        'value' => 2488,
                                      ),
                                      1449 => 
                                      array (
                                        'key' => 'TIPO',
                                        'value' => 1829427,
                                      ),
                                      1450 => 
                                      array (
                                        'key' => 'TORQUE TEAM LAMINATED',
                                        'value' => 1829516,
                                      ),
                                      1451 => 
                                      array (
                                        'key' => 'TORQUE TEAM PLUS',
                                        'value' => 1829500,
                                      ),
                                      1452 => 
                                      array (
                                        'key' => 'TORQUE-FLEX',
                                        'value' => 1829498,
                                      ),
                                      1453 => 
                                      array (
                                        'key' => 'TORRIDAIR',
                                        'value' => 2489,
                                      ),
                                      1454 => 
                                      array (
                                        'key' => 'TOW CABLE',
                                        'value' => 2490,
                                      ),
                                      1455 => 
                                      array (
                                        'key' => 'TR7',
                                        'value' => 2491,
                                      ),
                                      1456 => 
                                      array (
                                        'key' => 'TR8',
                                        'value' => 2492,
                                      ),
                                      1457 => 
                                      array (
                                        'key' => 'TRANSPLY',
                                        'value' => 2493,
                                      ),
                                      1458 => 
                                      array (
                                        'key' => 'TRI-STATE',
                                        'value' => 1829330,
                                      ),
                                      1459 => 
                                      array (
                                        'key' => 'TRIDENT',
                                        'value' => 2494,
                                      ),
                                      1460 => 
                                      array (
                                        'key' => 'TRIDENT SER',
                                        'value' => 2495,
                                      ),
                                      1461 => 
                                      array (
                                        'key' => 'TRINCO BLAST',
                                        'value' => 2496,
                                      ),
                                      1462 => 
                                      array (
                                        'key' => 'TRIPLX',
                                        'value' => 2497,
                                      ),
                                      1463 => 
                                      array (
                                        'key' => 'TRIX ACETYLENE',
                                        'value' => 2498,
                                      ),
                                      1464 => 
                                      array (
                                        'key' => 'TRIX BLAUSTRAHL',
                                        'value' => 2499,
                                      ),
                                      1465 => 
                                      array (
                                        'key' => 'TRIX BRAKE',
                                        'value' => 2500,
                                      ),
                                      1466 => 
                                      array (
                                        'key' => 'TRIX FUEL',
                                        'value' => 2501,
                                      ),
                                      1467 => 
                                      array (
                                        'key' => 'TRIX HP',
                                        'value' => 7082339,
                                      ),
                                      1468 => 
                                      array (
                                        'key' => 'TRIX MULTIFOOD',
                                        'value' => 2502,
                                      ),
                                      1469 => 
                                      array (
                                        'key' => 'TRIX NITRO',
                                        'value' => 2503,
                                      ),
                                      1470 => 
                                      array (
                                        'key' => 'TRIX OXYGEN',
                                        'value' => 2504,
                                      ),
                                      1471 => 
                                      array (
                                        'key' => 'TRIX PAINT SPRAY',
                                        'value' => 2505,
                                      ),
                                      1472 => 
                                      array (
                                        'key' => 'TRIX RESPIRATION',
                                        'value' => 2506,
                                      ),
                                      1473 => 
                                      array (
                                        'key' => 'TRIX ROSTRAHL',
                                        'value' => 2507,
                                      ),
                                      1474 => 
                                      array (
                                        'key' => 'TRIX SUPER',
                                        'value' => 2508,
                                      ),
                                      1475 => 
                                      array (
                                        'key' => 'TUNNELCOTE ROCK DUST FLEXTRA',
                                        'value' => 2509,
                                      ),
                                      1476 => 
                                      array (
                                        'key' => 'TUNNELCOTE ROCK DUST FLEXWING®',
                                        'value' => 2510,
                                      ),
                                      1477 => 
                                      array (
                                        'key' => 'TWIN-LINE (GRADE R)',
                                        'value' => 2511,
                                      ),
                                      1478 => 
                                      array (
                                        'key' => 'TWIN-LINE (GRADE RM)',
                                        'value' => 2512,
                                      ),
                                      1479 => 
                                      array (
                                        'key' => 'TWIN-LINE (GRADE T)',
                                        'value' => 2513,
                                      ),
                                      1480 => 
                                      array (
                                        'key' => 'TWIN-LINE ISO 3821',
                                        'value' => 2514,
                                      ),
                                      1481 => 
                                      array (
                                        'key' => 'UL 92 FIRE EXTINGUISHER',
                                        'value' => 2515,
                                      ),
                                      1482 => 
                                      array (
                                        'key' => 'ULTRABRAID BULL',
                                        'value' => 2516,
                                      ),
                                      1483 => 
                                      array (
                                        'key' => 'ULTRAFLEX',
                                        'value' => 2517,
                                      ),
                                      1484 => 
                                      array (
                                        'key' => 'ULTRAMAR',
                                        'value' => 2518,
                                      ),
                                      1485 => 
                                      array (
                                        'key' => 'ULTRAMAX',
                                        'value' => 5764905,
                                      ),
                                      1486 => 
                                      array (
                                        'key' => 'UNDERHILL',
                                        'value' => 2519,
                                      ),
                                      1487 => 
                                      array (
                                        'key' => 'Uni-Crimp UCF10 Ferrule',
                                        'value' => 1830018,
                                      ),
                                      1488 => 
                                      array (
                                        'key' => 'Uni-Crimp UCF11 Ferrule',
                                        'value' => 1830019,
                                      ),
                                      1489 => 
                                      array (
                                        'key' => 'UNI-Crimp UCF2 Ferrule',
                                        'value' => 1830013,
                                      ),
                                      1490 => 
                                      array (
                                        'key' => 'Uni-Crimp UCF3 Ferrule',
                                        'value' => 1830014,
                                      ),
                                      1491 => 
                                      array (
                                        'key' => 'Uni-Crimp UCF6 Ferrule',
                                        'value' => 1830015,
                                      ),
                                      1492 => 
                                      array (
                                        'key' => 'Uni-Crimp UCF8 Ferrule',
                                        'value' => 1830016,
                                      ),
                                      1493 => 
                                      array (
                                        'key' => 'Uni-Crimp UCF9 Ferrule',
                                        'value' => 1830017,
                                      ),
                                      1494 => 
                                      array (
                                        'key' => 'UNISOURCE',
                                        'value' => 2520,
                                      ),
                                      1495 => 
                                      array (
                                        'key' => 'UNISOURCE EXTREMEFLEX BEVERAGE',
                                        'value' => 14498371,
                                      ),
                                      1496 => 
                                      array (
                                        'key' => 'UNITED CENTRAL',
                                        'value' => 5764906,
                                      ),
                                      1497 => 
                                      array (
                                        'key' => 'UNITED RUBBER CONTRACTOR\'S WATER',
                                        'value' => 1829291,
                                      ),
                                      1498 => 
                                      array (
                                        'key' => 'UNITRIX 60',
                                        'value' => 2521,
                                      ),
                                      1499 => 
                                      array (
                                        'key' => 'UNITRIX 80',
                                        'value' => 2522,
                                      ),
                                      1500 => 
                                      array (
                                        'key' => 'UNIWELD',
                                        'value' => 1829184,
                                      ),
                                      1501 => 
                                      array (
                                        'key' => 'UNPRINTED SPRAY SALVAGE',
                                        'value' => 2523,
                                      ),
                                      1502 => 
                                      array (
                                        'key' => 'V-50 S&D',
                                        'value' => 2524,
                                      ),
                                      1503 => 
                                      array (
                                        'key' => 'VACUPRESS OIL',
                                        'value' => 10862808,
                                      ),
                                      1504 => 
                                      array (
                                        'key' => 'VACUPRESS OIL PU',
                                        'value' => 10862807,
                                      ),
                                      1505 => 
                                      array (
                                        'key' => 'VACUUM',
                                        'value' => 2525,
                                      ),
                                      1506 => 
                                      array (
                                        'key' => 'VACUWORX XR16SC',
                                        'value' => 3831418,
                                      ),
                                      1507 => 
                                      array (
                                        'key' => 'Valve Adapter',
                                        'value' => 1830001,
                                      ),
                                      1508 => 
                                      array (
                                        'key' => 'Valve Caps',
                                        'value' => 1830002,
                                      ),
                                      1509 => 
                                      array (
                                        'key' => 'Valve Core',
                                        'value' => 1830003,
                                      ),
                                      1510 => 
                                      array (
                                        'key' => 'VAPOR RECOVERY',
                                        'value' => 2526,
                                      ),
                                      1511 => 
                                      array (
                                        'key' => 'VAPOR RECOVERY DOCK',
                                        'value' => 2527,
                                      ),
                                      1512 => 
                                      array (
                                        'key' => 'VARIABLE SPEED',
                                        'value' => 1829513,
                                      ),
                                      1513 => 
                                      array (
                                        'key' => 'VARIFLEX™',
                                        'value' => 2528,
                                      ),
                                      1514 => 
                                      array (
                                        'key' => 'VELOCITY BANDING COIL',
                                        'value' => 2529,
                                      ),
                                      1515 => 
                                      array (
                                        'key' => 'VELOCITY PETROLEUM TRANSFER',
                                        'value' => 2531,
                                      ),
                                      1516 => 
                                      array (
                                        'key' => 'VELOCITY WATER TRANSFER',
                                        'value' => 2532,
                                      ),
                                      1517 => 
                                      array (
                                        'key' => 'VELOCITY™ BEVERAGE TRANSFER',
                                        'value' => 2530,
                                      ),
                                      1518 => 
                                      array (
                                        'key' => 'VERSACHEM™',
                                        'value' => 2533,
                                      ),
                                      1519 => 
                                      array (
                                        'key' => 'VERSACRETE',
                                        'value' => 2534,
                                      ),
                                      1520 => 
                                      array (
                                        'key' => 'VERSAFUEL',
                                        'value' => 7563311,
                                      ),
                                      1521 => 
                                      array (
                                        'key' => 'VERSAFUEL EN1765:2016 S15',
                                        'value' => 2535,
                                      ),
                                      1522 => 
                                      array (
                                        'key' => 'VERSAFUEL FLEX',
                                        'value' => 2536,
                                      ),
                                      1523 => 
                                      array (
                                        'key' => 'VERSIFLO DISCHARGE',
                                        'value' => 2537,
                                      ),
                                      1524 => 
                                      array (
                                        'key' => 'VERSIFLO S&D',
                                        'value' => 2538,
                                      ),
                                      1525 => 
                                      array (
                                        'key' => 'VICTOR',
                                        'value' => 2539,
                                      ),
                                      1526 => 
                                      array (
                                        'key' => 'VICTOR GRADE RM',
                                        'value' => 1829341,
                                      ),
                                      1527 => 
                                      array (
                                        'key' => 'VICTOR GRADE T',
                                        'value' => 1829114,
                                      ),
                                      1528 => 
                                      array (
                                        'key' => 'VINICLASS EXTREMEFLEX BEVERAGE',
                                        'value' => 14498369,
                                      ),
                                      1529 => 
                                      array (
                                        'key' => 'VINTNER',
                                        'value' => 2540,
                                      ),
                                      1530 => 
                                      array (
                                        'key' => 'VINTNER LITE',
                                        'value' => 7186049,
                                      ),
                                      1531 => 
                                      array (
                                        'key' => 'VINTNER MICROBAN',
                                        'value' => 2541,
                                      ),
                                      1532 => 
                                      array (
                                        'key' => 'VINTNER™ RESERVE',
                                        'value' => 2542,
                                      ),
                                      1533 => 
                                      array (
                                        'key' => 'VIPER®',
                                        'value' => 2543,
                                      ),
                                      1534 => 
                                      array (
                                        'key' => 'WAB SLURRY',
                                        'value' => 2544,
                                      ),
                                      1535 => 
                                      array (
                                        'key' => 'WASHDOWN',
                                        'value' => 2545,
                                      ),
                                      1536 => 
                                      array (
                                        'key' => 'WASHDOWN FDA',
                                        'value' => 7717343,
                                      ),
                                      1537 => 
                                      array (
                                        'key' => 'WASHDOWN HD',
                                        'value' => 12394783,
                                      ),
                                      1538 => 
                                      array (
                                        'key' => 'WASTE MATE',
                                        'value' => 2546,
                                      ),
                                      1539 => 
                                      array (
                                        'key' => 'WATER',
                                        'value' => 1829360,
                                      ),
                                      1540 => 
                                      array (
                                        'key' => 'WATER & AIR HD',
                                        'value' => 2547,
                                      ),
                                      1541 => 
                                      array (
                                        'key' => 'WATER 150 HD',
                                        'value' => 1829322,
                                      ),
                                      1542 => 
                                      array (
                                        'key' => 'WATER DISCHARGE',
                                        'value' => 2548,
                                      ),
                                      1543 => 
                                      array (
                                        'key' => 'WATER DISCHARGE 100',
                                        'value' => 1829320,
                                      ),
                                      1544 => 
                                      array (
                                        'key' => 'WATER DISCHARGE 150',
                                        'value' => 1829233,
                                      ),
                                      1545 => 
                                      array (
                                        'key' => 'WATER DISCHARGE 250',
                                        'value' => 1829376,
                                      ),
                                      1546 => 
                                      array (
                                        'key' => 'WATER DISCHARGE HD',
                                        'value' => 2549,
                                      ),
                                      1547 => 
                                      array (
                                        'key' => 'WATER DISCHARGE HD 600',
                                        'value' => 1829264,
                                      ),
                                      1548 => 
                                      array (
                                        'key' => 'WATER HD',
                                        'value' => 2550,
                                      ),
                                      1549 => 
                                      array (
                                        'key' => 'WATER JETTING',
                                        'value' => 1829279,
                                      ),
                                      1550 => 
                                      array (
                                        'key' => 'WATER JETTING 1000',
                                        'value' => 2551,
                                      ),
                                      1551 => 
                                      array (
                                        'key' => 'WATER JETTING 500',
                                        'value' => 2552,
                                      ),
                                      1552 => 
                                      array (
                                        'key' => 'WATER REHAB',
                                        'value' => 2553,
                                      ),
                                      1553 => 
                                      array (
                                        'key' => 'WATER S&D',
                                        'value' => 2554,
                                      ),
                                      1554 => 
                                      array (
                                        'key' => 'WATER S&D',
                                        'value' => 1829252,
                                      ),
                                      1555 => 
                                      array (
                                        'key' => 'WEDGE TLP',
                                        'value' => 1829527,
                                      ),
                                      1556 => 
                                      array (
                                        'key' => 'WEST MICH',
                                        'value' => 1829111,
                                      ),
                                      1557 => 
                                      array (
                                        'key' => 'WESTERN',
                                        'value' => 2555,
                                      ),
                                      1558 => 
                                      array (
                                        'key' => 'WESTFLEX',
                                        'value' => 5764907,
                                      ),
                                      1559 => 
                                      array (
                                        'key' => 'WHALE OIL',
                                        'value' => 2556,
                                      ),
                                      1560 => 
                                      array (
                                        'key' => 'WHALE WATER',
                                        'value' => 2557,
                                      ),
                                      1561 => 
                                      array (
                                        'key' => 'WHIPEND BLAST',
                                        'value' => 2558,
                                      ),
                                      1562 => 
                                      array (
                                        'key' => 'WHITE FLEXTRA',
                                        'value' => 2559,
                                      ),
                                      1563 => 
                                      array (
                                        'key' => 'WHITE FLEXWING®',
                                        'value' => 2560,
                                      ),
                                      1564 => 
                                      array (
                                        'key' => 'WHITEWATER®',
                                        'value' => 2561,
                                      ),
                                      1565 => 
                                      array (
                                        'key' => 'WHW GAUNTLET',
                                        'value' => 1829423,
                                      ),
                                      1566 => 
                                      array (
                                        'key' => 'WILD HOG',
                                        'value' => 1829225,
                                      ),
                                      1567 => 
                                      array (
                                        'key' => 'WINELINE',
                                        'value' => 7992690,
                                      ),
                                      1568 => 
                                      array (
                                        'key' => 'WINGCRAFT™',
                                        'value' => 2562,
                                      ),
                                      1569 => 
                                      array (
                                        'key' => 'WIRE INSERTED RADIATOR HOSE',
                                        'value' => 2563,
                                      ),
                                      1570 => 
                                      array (
                                        'key' => 'WOODMI SAWDUST',
                                        'value' => 2564,
                                      ),
                                      1571 => 
                                      array (
                                        'key' => 'X-LIFE™ XCP3',
                                        'value' => 2566,
                                      ),
                                      1572 => 
                                      array (
                                        'key' => 'X-LIFE™ XCP3S',
                                        'value' => 2567,
                                      ),
                                      1573 => 
                                      array (
                                        'key' => 'X-LIFE™ XCP4',
                                        'value' => 2568,
                                      ),
                                      1574 => 
                                      array (
                                        'key' => 'X-LIFE™ XCP4S',
                                        'value' => 2569,
                                      ),
                                      1575 => 
                                      array (
                                        'key' => 'X-LIFE™ XCP5S',
                                        'value' => 2570,
                                      ),
                                      1576 => 
                                      array (
                                        'key' => 'X-LIFE™ XCP6S',
                                        'value' => 2571,
                                      ),
                                      1577 => 
                                      array (
                                        'key' => 'X-LIFE™ XR16SC',
                                        'value' => 2572,
                                      ),
                                      1578 => 
                                      array (
                                        'key' => 'XF BLAST',
                                        'value' => 2565,
                                      ),
                                      1579 => 
                                      array (
                                        'key' => 'XLPE CHEMICAL TRANSFER',
                                        'value' => 2573,
                                      ),
                                      1580 => 
                                      array (
                                        'key' => 'XPOWER',
                                        'value' => 2574,
                                      ),
                                      1581 => 
                                      array (
                                        'key' => 'XPOWER OILFIELD FRAC HW',
                                        'value' => 1829105,
                                      ),
                                      1582 => 
                                      array (
                                        'key' => 'YARDMASTER ECO',
                                        'value' => 3831420,
                                      ),
                                      1583 => 
                                      array (
                                        'key' => 'YARDMASTER GARDEN HOSE',
                                        'value' => 2575,
                                      ),
                                      1584 => 
                                      array (
                                        'key' => 'YELLOW FLEXWING®',
                                        'value' => 2576,
                                      ),
                                      1585 => 
                                      array (
                                        'key' => 'YELLOW HORNET',
                                        'value' => 7186050,
                                      ),
                                      1586 => 
                                      array (
                                        'key' => 'YUKON',
                                        'value' => 2577,
                                      ),
                                      1587 => 
                                      array (
                                        'key' => 'YUKON BLUE',
                                        'value' => 1829293,
                                      ),
                                      1588 => 
                                      array (
                                        'key' => 'YUKON SPIRAFLEX',
                                        'value' => 2578,
                                      ),
                                      1589 => 
                                      array (
                                        'key' => 'ZZH561K-AA2',
                                        'value' => 2579,
                                      ),
                                      1590 => 
                                      array (
                                        'key' => 'ZZH561K-BA2',
                                        'value' => 2580,
                                      ),
                                      1591 => 
                                      array (
                                        'key' => 'ZZH601 3-2',
                                        'value' => 2581,
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
                                        'key' => '1/2 Bend Radius',
                                        'value' => 3187,
                                      ),
                                      1 => 
                                      array (
                                        'key' => '1000hr Steam Rack Tested',
                                        'value' => 3063,
                                      ),
                                      2 => 
                                      array (
                                        'key' => '10:1 Safety Factor',
                                        'value' => 3062,
                                      ),
                                      3 => 
                                      array (
                                        'key' => '20:1 Safety Factor',
                                        'value' => 3064,
                                      ),
                                      4 => 
                                      array (
                                        'key' => '25 to 30 percent higher power ratings than classical v-belts',
                                        'value' => 759991,
                                      ),
                                      5 => 
                                      array (
                                        'key' => '2:1 Safety Factor',
                                        'value' => 10822383,
                                      ),
                                      6 => 
                                      array (
                                        'key' => '3-A 18-02 Certified',
                                        'value' => 759935,
                                      ),
                                      7 => 
                                      array (
                                        'key' => '3A 18-03 Certified',
                                        'value' => 3065,
                                      ),
                                      8 => 
                                      array (
                                        'key' => '3A Compliant Tube',
                                        'value' => 3066,
                                      ),
                                      9 => 
                                      array (
                                        'key' => '4 percent more energy efficient than traditional v-belts',
                                        'value' => 759992,
                                      ),
                                      10 => 
                                      array (
                                        'key' => '4:1 Safety Factor',
                                        'value' => 759936,
                                      ),
                                      11 => 
                                      array (
                                        'key' => '500,000 Impulse Cycles Tested',
                                        'value' => 3067,
                                      ),
                                      12 => 
                                      array (
                                        'key' => 'Abrasion resistant tube',
                                        'value' => 3068,
                                      ),
                                      13 => 
                                      array (
                                        'key' => 'ABS Certified',
                                        'value' => 3069,
                                      ),
                                      14 => 
                                      array (
                                        'key' => 'Air Conditioning',
                                        'value' => 3070,
                                      ),
                                      15 => 
                                      array (
                                        'key' => 'Armorcoat™ Abrasion-Resistant Cover',
                                        'value' => 3071,
                                      ),
                                      16 => 
                                      array (
                                        'key' => 'Available in raw-edge, molded cog and envelope constructions',
                                        'value' => 759993,
                                      ),
                                      17 => 
                                      array (
                                        'key' => 'Available with cogs for increased flexibility and heat dissipation',
                                        'value' => 759994,
                                      ),
                                      18 => 
                                      array (
                                        'key' => 'Avilable in cut-edge or envelope construction',
                                        'value' => 759995,
                                      ),
                                      19 => 
                                      array (
                                        'key' => 'B100 Fuel Compatibility',
                                        'value' => 3072,
                                      ),
                                      20 => 
                                      array (
                                        'key' => 'B20 Fuel Compatibility',
                                        'value' => 3073,
                                      ),
                                      21 => 
                                      array (
                                        'key' => 'Barber Pole Design',
                                        'value' => 3188,
                                      ),
                                      22 => 
                                      array (
                                        'key' => 'Beats the heat, operates continuous at temperatures up to 210 F',
                                        'value' => 759996,
                                      ),
                                      23 => 
                                      array (
                                        'key' => 'Better Cover Adhesion',
                                        'value' => 759937,
                                      ),
                                      24 => 
                                      array (
                                        'key' => 'Better Flame Resistance',
                                        'value' => 759938,
                                      ),
                                      25 => 
                                      array (
                                        'key' => 'Braided Construction - Greater Fitting Retention',
                                        'value' => 759939,
                                      ),
                                      26 => 
                                      array (
                                        'key' => 'Braided Construction - Kink Resistant',
                                        'value' => 759940,
                                      ),
                                      27 => 
                                      array (
                                        'key' => 'Braided Construction - Reeling Durability',
                                        'value' => 759941,
                                      ),
                                      28 => 
                                      array (
                                        'key' => 'Braided Construction - Superior Durability',
                                        'value' => 759942,
                                      ),
                                      29 => 
                                      array (
                                        'key' => 'Braided Construction - Twist Resistant',
                                        'value' => 759943,
                                      ),
                                      30 => 
                                      array (
                                        'key' => 'Built In Couplings Available',
                                        'value' => 3074,
                                      ),
                                      31 => 
                                      array (
                                        'key' => 'Built On Chrome Mandrel',
                                        'value' => 759989,
                                      ),
                                      32 => 
                                      array (
                                        'key' => 'Chemical Resistant',
                                        'value' => 3075,
                                      ),
                                      33 => 
                                      array (
                                        'key' => 'Chemical resistant cover',
                                        'value' => 3833622,
                                      ),
                                      34 => 
                                      array (
                                        'key' => 'Chrome Mandrel Built',
                                        'value' => 3076,
                                      ),
                                      35 => 
                                      array (
                                        'key' => 'Cogged for cooler running',
                                        'value' => 759997,
                                      ),
                                      36 => 
                                      array (
                                        'key' => 'Conductive',
                                        'value' => 3077,
                                      ),
                                      37 => 
                                      array (
                                        'key' => 'Conductive Cover',
                                        'value' => 3078,
                                      ),
                                      38 => 
                                      array (
                                        'key' => 'Conductive Tube',
                                        'value' => 3079,
                                      ),
                                      39 => 
                                      array (
                                        'key' => 'Conductive Tube & Cover',
                                        'value' => 3080,
                                      ),
                                      40 => 
                                      array (
                                        'key' => 'Consistent performance',
                                        'value' => 759998,
                                      ),
                                      41 => 
                                      array (
                                        'key' => 'Consistent, reliable and predictable over the life of belt',
                                        'value' => 759999,
                                      ),
                                      42 => 
                                      array (
                                        'key' => 'Constant Pressure Rating',
                                        'value' => 3081,
                                      ),
                                      43 => 
                                      array (
                                        'key' => 'Continuous Lengths Available',
                                        'value' => 3082,
                                      ),
                                      44 => 
                                      array (
                                        'key' => 'Cost effective',
                                        'value' => 760000,
                                      ),
                                      45 => 
                                      array (
                                        'key' => 'Coupled Assembly Available',
                                        'value' => 3083,
                                      ),
                                      46 => 
                                      array (
                                        'key' => 'Crimp Specs Available',
                                        'value' => 3084,
                                      ),
                                      47 => 
                                      array (
                                        'key' => 'Crimped Solution Available',
                                        'value' => 759944,
                                      ),
                                      48 => 
                                      array (
                                        'key' => 'Crush Resistant',
                                        'value' => 3085,
                                      ),
                                      49 => 
                                      array (
                                        'key' => 'Cut Lengths Available',
                                        'value' => 3086,
                                      ),
                                      50 => 
                                      array (
                                        'key' => 'Decreased component wear',
                                        'value' => 760001,
                                      ),
                                      51 => 
                                      array (
                                        'key' => 'Decreased drive weight',
                                        'value' => 760002,
                                      ),
                                      52 => 
                                      array (
                                        'key' => 'Decreased system weight',
                                        'value' => 760003,
                                      ),
                                      53 => 
                                      array (
                                        'key' => 'Designed for high-capacity performance',
                                        'value' => 760004,
                                      ),
                                      54 => 
                                      array (
                                        'key' => 'Dissipates heat',
                                        'value' => 760005,
                                      ),
                                      55 => 
                                      array (
                                        'key' => 'Drinking Water Safe',
                                        'value' => 3087,
                                      ),
                                      56 => 
                                      array (
                                        'key' => 'Dual purpose for classical and FHP',
                                        'value' => 760006,
                                      ),
                                      57 => 
                                      array (
                                        'key' => 'Dual-sided classical profile',
                                        'value' => 760007,
                                      ),
                                      58 => 
                                      array (
                                        'key' => 'Durability that goes the distance',
                                        'value' => 760008,
                                      ),
                                      59 => 
                                      array (
                                        'key' => 'E25 Fuel Compatibility',
                                        'value' => 3088,
                                      ),
                                      60 => 
                                      array (
                                        'key' => 'E85 Fuel Compatibility',
                                        'value' => 3089,
                                      ),
                                      61 => 
                                      array (
                                        'key' => 'Ease of Coupling',
                                        'value' => 3090,
                                      ),
                                      62 => 
                                      array (
                                        'key' => 'Ease of Handling',
                                        'value' => 3091,
                                      ),
                                      63 => 
                                      array (
                                        'key' => 'Easy installation',
                                        'value' => 760009,
                                      ),
                                      64 => 
                                      array (
                                        'key' => 'Economical and trouble-free',
                                        'value' => 760010,
                                      ),
                                      65 => 
                                      array (
                                        'key' => 'Economical Solution',
                                        'value' => 3092,
                                      ),
                                      66 => 
                                      array (
                                        'key' => 'EI 1529-7th Edition, 2014 Compliant',
                                        'value' => 3093,
                                      ),
                                      67 => 
                                      array (
                                        'key' => 'Eliminates chirps, squeaks and squeals',
                                        'value' => 760011,
                                      ),
                                      68 => 
                                      array (
                                        'key' => 'EN 1361 Compliant',
                                        'value' => 3094,
                                      ),
                                      69 => 
                                      array (
                                        'key' => 'Energy saving',
                                        'value' => 760012,
                                      ),
                                      70 => 
                                      array (
                                        'key' => 'Engineered to universal metric profiles',
                                        'value' => 760013,
                                      ),
                                      71 => 
                                      array (
                                        'key' => 'Exceeds ASME B30.27-2009. 2:1 WP to Burst Ratio',
                                        'value' => 3095,
                                      ),
                                      72 => 
                                      array (
                                        'key' => 'Exceptional Durability',
                                        'value' => 3096,
                                      ),
                                      73 => 
                                      array (
                                        'key' => 'Exceptional lengthwise flexibility allows for small pulleys',
                                        'value' => 760014,
                                      ),
                                      74 => 
                                      array (
                                        'key' => 'Extended Life™ Cover',
                                        'value' => 3186,
                                      ),
                                      75 => 
                                      array (
                                        'key' => 'Extreme Flexibility',
                                        'value' => 3097,
                                      ),
                                      76 => 
                                      array (
                                        'key' => 'FDA / USDA Certified Tube',
                                        'value' => 3189,
                                      ),
                                      77 => 
                                      array (
                                        'key' => 'FDA / USDA Compliant Tube',
                                        'value' => 3190,
                                      ),
                                      78 => 
                                      array (
                                        'key' => 'Fiberglass tension cords for excellent resistance to shrinkage/elongation',
                                        'value' => 760066,
                                      ),
                                      79 => 
                                      array (
                                        'key' => 'Field Attachable Coupling',
                                        'value' => 3098,
                                      ),
                                      80 => 
                                      array (
                                        'key' => 'Fire resistant cover provides minimum 2-1/2 minute fire resistivity for USCG type A service',
                                        'value' => 4552263,
                                      ),
                                      81 => 
                                      array (
                                        'key' => 'Fits smaller pulleys',
                                        'value' => 760015,
                                      ),
                                      82 => 
                                      array (
                                        'key' => 'Full Vacuum Rating',
                                        'value' => 3099,
                                      ),
                                      83 => 
                                      array (
                                        'key' => 'Good Flexibility',
                                        'value' => 3100,
                                      ),
                                      84 => 
                                      array (
                                        'key' => 'Greater Abrasion Resistance In The Tube',
                                        'value' => 759946,
                                      ),
                                      85 => 
                                      array (
                                        'key' => 'Greater Abrasion Resistance On The Cover',
                                        'value' => 759947,
                                      ),
                                      86 => 
                                      array (
                                        'key' => 'Greater Ozone Resistance',
                                        'value' => 759948,
                                      ),
                                      87 => 
                                      array (
                                        'key' => 'Handles 90% of Common Chemicals',
                                        'value' => 3101,
                                      ),
                                      88 => 
                                      array (
                                        'key' => 'Handles 98% of Common Chemicals',
                                        'value' => 3102,
                                      ),
                                      89 => 
                                      array (
                                        'key' => 'Handles common industry chemicals',
                                        'value' => 4552265,
                                      ),
                                      90 => 
                                      array (
                                        'key' => 'Handles Common Industry Chemicals ',
                                        'value' => 3191,
                                      ),
                                      91 => 
                                      array (
                                        'key' => 'Handles High Aromatic Hydrocarbons',
                                        'value' => 3103,
                                      ),
                                      92 => 
                                      array (
                                        'key' => 'Heat and oil resistant',
                                        'value' => 760016,
                                      ),
                                      93 => 
                                      array (
                                        'key' => 'Heat, ozone and abrasion resistant',
                                        'value' => 760017,
                                      ),
                                      94 => 
                                      array (
                                        'key' => 'Helicog profile for quiet operation',
                                        'value' => 760018,
                                      ),
                                      95 => 
                                      array (
                                        'key' => 'High & Low Temperature Rating',
                                        'value' => 3104,
                                      ),
                                      96 => 
                                      array (
                                        'key' => 'High Oil Resistance Cover',
                                        'value' => 3105,
                                      ),
                                      97 => 
                                      array (
                                        'key' => 'High Oil Resistance Tube',
                                        'value' => 3106,
                                      ),
                                      98 => 
                                      array (
                                        'key' => 'High Oil Resistance Tube & Cover',
                                        'value' => 3107,
                                      ),
                                      99 => 
                                      array (
                                        'key' => 'High Pressure Rating',
                                        'value' => 3108,
                                      ),
                                      100 => 
                                      array (
                                        'key' => 'High Temperature Rating',
                                        'value' => 3109,
                                      ),
                                      101 => 
                                      array (
                                        'key' => 'High Temperature Rating',
                                        'value' => 3833587,
                                      ),
                                      102 => 
                                      array (
                                        'key' => 'High-strength aramid tensile members',
                                        'value' => 760020,
                                      ),
                                      103 => 
                                      array (
                                        'key' => 'Higher Maximum Temperature Rating',
                                        'value' => 759949,
                                      ),
                                      104 => 
                                      array (
                                        'key' => 'Higher Vacuum Rating',
                                        'value' => 759950,
                                      ),
                                      105 => 
                                      array (
                                        'key' => 'Higher Working Pressure',
                                        'value' => 759951,
                                      ),
                                      106 => 
                                      array (
                                        'key' => 'Highly versital',
                                        'value' => 760019,
                                      ),
                                      107 => 
                                      array (
                                        'key' => 'Homogeneous, Extruded Tube',
                                        'value' => 3110,
                                      ),
                                      108 => 
                                      array (
                                        'key' => 'Ideal for lumber applications',
                                        'value' => 760021,
                                      ),
                                      109 => 
                                      array (
                                        'key' => 'Increase belt life',
                                        'value' => 760022,
                                      ),
                                      110 => 
                                      array (
                                        'key' => 'Increased belt and sheave life',
                                        'value' => 760023,
                                      ),
                                      111 => 
                                      array (
                                        'key' => 'Increased belt life',
                                        'value' => 760024,
                                      ),
                                      112 => 
                                      array (
                                        'key' => 'Increased belt life up to 4 times',
                                        'value' => 760025,
                                      ),
                                      113 => 
                                      array (
                                        'key' => 'Increased efficiency',
                                        'value' => 760026,
                                      ),
                                      114 => 
                                      array (
                                        'key' => 'Increased flexibility, abrasion and heat resistance',
                                        'value' => 760027,
                                      ),
                                      115 => 
                                      array (
                                        'key' => 'Increased power',
                                        'value' => 760028,
                                      ),
                                      116 => 
                                      array (
                                        'key' => 'Internal Expansion For Expanded Flow',
                                        'value' => 759952,
                                      ),
                                      117 => 
                                      array (
                                        'key' => 'ISO1825:2010 Type E Grade 2 Compliant',
                                        'value' => 3111,
                                      ),
                                      118 => 
                                      array (
                                        'key' => 'Keeps you running in a pinch',
                                        'value' => 760029,
                                      ),
                                      119 => 
                                      array (
                                        'key' => 'Kink Resistance',
                                        'value' => 3112,
                                      ),
                                      120 => 
                                      array (
                                        'key' => 'Lightweight Construction',
                                        'value' => 3113,
                                      ),
                                      121 => 
                                      array (
                                        'key' => 'Limited Oil Resistance Cover',
                                        'value' => 3114,
                                      ),
                                      122 => 
                                      array (
                                        'key' => 'Limited Oil Resistance Tube',
                                        'value' => 3115,
                                      ),
                                      123 => 
                                      array (
                                        'key' => 'Limited Oil Resistance Tube & Cover',
                                        'value' => 3116,
                                      ),
                                      124 => 
                                      array (
                                        'key' => 'Lloyd\'s Certified',
                                        'value' => 3117,
                                      ),
                                      125 => 
                                      array (
                                        'key' => 'Longer life',
                                        'value' => 760030,
                                      ),
                                      126 => 
                                      array (
                                        'key' => 'Low Coefficient Of Friction For Ease Of Maneuverability',
                                        'value' => 759953,
                                      ),
                                      127 => 
                                      array (
                                        'key' => 'Low Computer Creep',
                                        'value' => 3118,
                                      ),
                                      128 => 
                                      array (
                                        'key' => 'Low Drag Resistance',
                                        'value' => 3119,
                                      ),
                                      129 => 
                                      array (
                                        'key' => 'Low Extraction Tube',
                                        'value' => 3120,
                                      ),
                                      130 => 
                                      array (
                                        'key' => 'Low Extraction Tube To Reduce Contamination',
                                        'value' => 759954,
                                      ),
                                      131 => 
                                      array (
                                        'key' => 'Low Force to Bend',
                                        'value' => 3121,
                                      ),
                                      132 => 
                                      array (
                                        'key' => 'Low Temperature Flexibility',
                                        'value' => 3122,
                                      ),
                                      133 => 
                                      array (
                                        'key' => 'Low Temperature Rating',
                                        'value' => 3123,
                                      ),
                                      134 => 
                                      array (
                                        'key' => 'Low Termperature Rating',
                                        'value' => 4552262,
                                      ),
                                      135 => 
                                      array (
                                        'key' => 'Low vibration for low noise',
                                        'value' => 760031,
                                      ),
                                      136 => 
                                      array (
                                        'key' => 'Lower Computer Creep',
                                        'value' => 759955,
                                      ),
                                      137 => 
                                      array (
                                        'key' => 'Lower Force To Bend',
                                        'value' => 759956,
                                      ),
                                      138 => 
                                      array (
                                        'key' => 'Lower Minimum Temperature Rating',
                                        'value' => 759957,
                                      ),
                                      139 => 
                                      array (
                                        'key' => 'Lower noise generation',
                                        'value' => 760032,
                                      ),
                                      140 => 
                                      array (
                                        'key' => 'Lower Weight Per Foot',
                                        'value' => 759958,
                                      ),
                                      141 => 
                                      array (
                                        'key' => 'Made in USA',
                                        'value' => 3124,
                                      ),
                                      142 => 
                                      array (
                                        'key' => 'Made in USA',
                                        'value' => 760033,
                                      ),
                                      143 => 
                                      array (
                                        'key' => 'Maintenance Free',
                                        'value' => 3125,
                                      ),
                                      144 => 
                                      array (
                                        'key' => 'Maximum Abrasion Resistant Cover',
                                        'value' => 3126,
                                      ),
                                      145 => 
                                      array (
                                        'key' => 'Medium Oil Resistance Cover',
                                        'value' => 3127,
                                      ),
                                      146 => 
                                      array (
                                        'key' => 'Medium Oil Resistance Tube',
                                        'value' => 3128,
                                      ),
                                      147 => 
                                      array (
                                        'key' => 'Medium Oil Resistance Tube & Cover',
                                        'value' => 3129,
                                      ),
                                      148 => 
                                      array (
                                        'key' => 'Meets ARPM IP-7 2011 Guidelines',
                                        'value' => 759959,
                                      ),
                                      149 => 
                                      array (
                                        'key' => 'Meets ARPM IP-7 Standards',
                                        'value' => 4552264,
                                      ),
                                      150 => 
                                      array (
                                        'key' => 'Meets ARPM IP-7 Standards ',
                                        'value' => 3192,
                                      ),
                                      151 => 
                                      array (
                                        'key' => 'Meets CARB requirements',
                                        'value' => 3130,
                                      ),
                                      152 => 
                                      array (
                                        'key' => 'Meets CGA E-1 Standards',
                                        'value' => 3131,
                                      ),
                                      153 => 
                                      array (
                                        'key' => 'Meets CGA Requirements',
                                        'value' => 759961,
                                      ),
                                      154 => 
                                      array (
                                        'key' => 'Meets DOT Requirements',
                                        'value' => 3132,
                                      ),
                                      155 => 
                                      array (
                                        'key' => 'Meets EN 12115:2011',
                                        'value' => 3133,
                                      ),
                                      156 => 
                                      array (
                                        'key' => 'Meets EPA requirements for low permeation Class A1-15 marine fuel lines',
                                        'value' => 3833595,
                                      ),
                                      157 => 
                                      array (
                                        'key' => 'Meets EVR Requirements',
                                        'value' => 3134,
                                      ),
                                      158 => 
                                      array (
                                        'key' => 'Meets ISO 22241-2 Immersion Test',
                                        'value' => 3135,
                                      ),
                                      159 => 
                                      array (
                                        'key' => 'Meets ISO 22241-2 Standard',
                                        'value' => 759962,
                                      ),
                                      160 => 
                                      array (
                                        'key' => 'Meets ISO 7840 Type A1',
                                        'value' => 3136,
                                      ),
                                      161 => 
                                      array (
                                        'key' => 'Meets ISO 7840 Type A2',
                                        'value' => 3137,
                                      ),
                                      162 => 
                                      array (
                                        'key' => 'Meets ISO 7840 Type B2',
                                        'value' => 3138,
                                      ),
                                      163 => 
                                      array (
                                        'key' => 'Meets Low Permeation Requirements',
                                        'value' => 759963,
                                      ),
                                      164 => 
                                      array (
                                        'key' => 'Meets ORVR requirements',
                                        'value' => 3139,
                                      ),
                                      165 => 
                                      array (
                                        'key' => 'Microban Cover',
                                        'value' => 3140,
                                      ),
                                      166 => 
                                      array (
                                        'key' => 'Microban Cover - Anti-Microbial Protection',
                                        'value' => 759965,
                                      ),
                                      167 => 
                                      array (
                                        'key' => 'Microban Cover Option Available',
                                        'value' => 3141,
                                      ),
                                      168 => 
                                      array (
                                        'key' => 'Mild Chemical Resistance',
                                        'value' => 3142,
                                      ),
                                      169 => 
                                      array (
                                        'key' => 'Military Applications',
                                        'value' => 3143,
                                      ),
                                      170 => 
                                      array (
                                        'key' => 'More narrow drive',
                                        'value' => 760034,
                                      ),
                                      171 => 
                                      array (
                                        'key' => 'MSHA Flame Resistant Cover',
                                        'value' => 3144,
                                      ),
                                      172 => 
                                      array (
                                        'key' => 'MSHA Flame Resistant Cover Available',
                                        'value' => 3145,
                                      ),
                                      173 => 
                                      array (
                                        'key' => 'MSHA Flame Resistant Tube & Cover',
                                        'value' => 3146,
                                      ),
                                      174 => 
                                      array (
                                        'key' => 'MSHA Rated Cover',
                                        'value' => 759966,
                                      ),
                                      175 => 
                                      array (
                                        'key' => 'Multiple Colors Available',
                                        'value' => 3147,
                                      ),
                                      176 => 
                                      array (
                                        'key' => 'NFPA Bulletin #407 Compliant',
                                        'value' => 3148,
                                      ),
                                      177 => 
                                      array (
                                        'key' => 'Nitrile Tube Designed for Jet Fuel',
                                        'value' => 3193,
                                      ),
                                      178 => 
                                      array (
                                        'key' => 'Non Conductive - Minimum Electric Resistance Greater Than 1 Megohm Per Inch At 1000 Volts Dc',
                                        'value' => 759967,
                                      ),
                                      179 => 
                                      array (
                                        'key' => 'Non-Conductive Cover',
                                        'value' => 3149,
                                      ),
                                      180 => 
                                      array (
                                        'key' => 'Non-Conductive Tube',
                                        'value' => 3150,
                                      ),
                                      181 => 
                                      array (
                                        'key' => 'Non-Conductive Tube & Cover',
                                        'value' => 3151,
                                      ),
                                      182 => 
                                      array (
                                        'key' => 'Non-Damming Cover',
                                        'value' => 3152,
                                      ),
                                      183 => 
                                      array (
                                        'key' => 'Non-Marking Cover',
                                        'value' => 3153,
                                      ),
                                      184 => 
                                      array (
                                        'key' => 'Non-Porous Tube',
                                        'value' => 3154,
                                      ),
                                      185 => 
                                      array (
                                        'key' => 'Non-Skive Crimped Solution',
                                        'value' => 759968,
                                      ),
                                      186 => 
                                      array (
                                        'key' => 'Not Pin-Pricked, Eliminating Path Of Moisture To Reinforcement',
                                        'value' => 759969,
                                      ),
                                      187 => 
                                      array (
                                        'key' => 'NSF-61 Listed Material',
                                        'value' => 3155,
                                      ),
                                      188 => 
                                      array (
                                        'key' => 'Oil Resistant',
                                        'value' => 3156,
                                      ),
                                      189 => 
                                      array (
                                        'key' => 'Oil, heat, ozone and abrasion resistant',
                                        'value' => 760035,
                                      ),
                                      190 => 
                                      array (
                                        'key' => 'Outperforms On Flex Fatigue Testing',
                                        'value' => 759970,
                                      ),
                                      191 => 
                                      array (
                                        'key' => 'Passes 1000 Hour Steam Rack Test',
                                        'value' => 759988,
                                      ),
                                      192 => 
                                      array (
                                        'key' => 'Peace of mind',
                                        'value' => 760036,
                                      ),
                                      193 => 
                                      array (
                                        'key' => 'Peroxide cured',
                                        'value' => 3157,
                                      ),
                                      194 => 
                                      array (
                                        'key' => 'Pin Pricked, Allowing Release Of Gasses Or Vapors Which May Permeate Tube Of The Hose',
                                        'value' => 759971,
                                      ),
                                      195 => 
                                      array (
                                        'key' => 'Pin-Pricked Cover',
                                        'value' => 3158,
                                      ),
                                      196 => 
                                      array (
                                        'key' => 'Premium Ozone Resistance',
                                        'value' => 3159,
                                      ),
                                      197 => 
                                      array (
                                        'key' => 'Provides accurate positioning',
                                        'value' => 760037,
                                      ),
                                      198 => 
                                      array (
                                        'key' => 'Quiet Channel Technology',
                                        'value' => 760038,
                                      ),
                                      199 => 
                                      array (
                                        'key' => 'Quiet tooth engagement',
                                        'value' => 760039,
                                      ),
                                      200 => 
                                      array (
                                        'key' => 'Reduce maintenance',
                                        'value' => 760040,
                                      ),
                                      201 => 
                                      array (
                                        'key' => 'Reduced costs',
                                        'value' => 760041,
                                      ),
                                      202 => 
                                      array (
                                        'key' => 'Reduced drive cost',
                                        'value' => 760042,
                                      ),
                                      203 => 
                                      array (
                                        'key' => 'Reduced drive weight',
                                        'value' => 760043,
                                      ),
                                      204 => 
                                      array (
                                        'key' => 'Reduced inventory',
                                        'value' => 760044,
                                      ),
                                      205 => 
                                      array (
                                        'key' => 'Reduced maintenance',
                                        'value' => 760045,
                                      ),
                                      206 => 
                                      array (
                                        'key' => 'Reduced maintenance provided by its resistance to elongation',
                                        'value' => 760046,
                                      ),
                                      207 => 
                                      array (
                                        'key' => 'Reduced operating noise up to 6 dB',
                                        'value' => 760047,
                                      ),
                                      208 => 
                                      array (
                                        'key' => 'Reduced overall costs',
                                        'value' => 760048,
                                      ),
                                      209 => 
                                      array (
                                        'key' => 'Reduced stretch and shrinkage',
                                        'value' => 760049,
                                      ),
                                      210 => 
                                      array (
                                        'key' => 'Reduced vibration and operating noise',
                                        'value' => 760050,
                                      ),
                                      211 => 
                                      array (
                                        'key' => 'Reduced vibration and turn over',
                                        'value' => 760051,
                                      ),
                                      212 => 
                                      array (
                                        'key' => 'Reeling Durability',
                                        'value' => 3160,
                                      ),
                                      213 => 
                                      array (
                                        'key' => 'Resistance up to 10% Xylene',
                                        'value' => 3161,
                                      ),
                                      214 => 
                                      array (
                                        'key' => 'Resistant to Animal Fats',
                                        'value' => 3162,
                                      ),
                                      215 => 
                                      array (
                                        'key' => 'Ribbed top for transverse rigidity, flexibility and cool running conditions',
                                        'value' => 760052,
                                      ),
                                      216 => 
                                      array (
                                        'key' => 'Rust Resistant Wire Reinforcement',
                                        'value' => 3163,
                                      ),
                                      217 => 
                                      array (
                                        'key' => 'Self tensioning technology',
                                        'value' => 760053,
                                      ),
                                      218 => 
                                      array (
                                        'key' => 'Silicone free raw materials and production',
                                        'value' => 760054,
                                      ),
                                      219 => 
                                      array (
                                        'key' => 'Smooth Cover For Low Drag Resistance',
                                        'value' => 759972,
                                      ),
                                      220 => 
                                      array (
                                        'key' => 'Smooth operation due to precision belt characteristics',
                                        'value' => 760055,
                                      ),
                                      221 => 
                                      array (
                                        'key' => 'Static Conductive',
                                        'value' => 3164,
                                      ),
                                      222 => 
                                      array (
                                        'key' => 'Static conductive',
                                        'value' => 760056,
                                      ),
                                      223 => 
                                      array (
                                        'key' => 'Static Dissipating Cover',
                                        'value' => 3165,
                                      ),
                                      224 => 
                                      array (
                                        'key' => 'Static Dissipating Tube',
                                        'value' => 3166,
                                      ),
                                      225 => 
                                      array (
                                        'key' => 'Static Dissipating Tube & Cover',
                                        'value' => 3167,
                                      ),
                                      226 => 
                                      array (
                                        'key' => 'Static Pressure Rating',
                                        'value' => 12472320,
                                      ),
                                      227 => 
                                      array (
                                        'key' => 'Static Wire',
                                        'value' => 3168,
                                      ),
                                      228 => 
                                      array (
                                        'key' => 'Static Wire Allowing For Static Continuity In Crimped Assembly',
                                        'value' => 759973,
                                      ),
                                      229 => 
                                      array (
                                        'key' => 'Static Wire Option Available',
                                        'value' => 3169,
                                      ),
                                      230 => 
                                      array (
                                        'key' => 'Suitable for drinking  water',
                                        'value' => 759974,
                                      ),
                                      231 => 
                                      array (
                                        'key' => 'Superior Abrasion Resistant Cover',
                                        'value' => 3170,
                                      ),
                                      232 => 
                                      array (
                                        'key' => 'Superior Abrasion Resistant Tube',
                                        'value' => 3171,
                                      ),
                                      233 => 
                                      array (
                                        'key' => 'Superior Abrasion Resistant Tube & Cover',
                                        'value' => 3172,
                                      ),
                                      234 => 
                                      array (
                                        'key' => 'Superior Bend Radius',
                                        'value' => 759975,
                                      ),
                                      235 => 
                                      array (
                                        'key' => 'Superior Cold Weather Flexibility',
                                        'value' => 759976,
                                      ),
                                      236 => 
                                      array (
                                        'key' => 'Superior Cover Adhesion',
                                        'value' => 3173,
                                      ),
                                      237 => 
                                      array (
                                        'key' => 'Superior Crush-Resistance',
                                        'value' => 759977,
                                      ),
                                      238 => 
                                      array (
                                        'key' => 'Superior Durability',
                                        'value' => 759978,
                                      ),
                                      239 => 
                                      array (
                                        'key' => 'Superior efficiency for improved performance',
                                        'value' => 760057,
                                      ),
                                      240 => 
                                      array (
                                        'key' => 'Superior Fitting Retention',
                                        'value' => 3174,
                                      ),
                                      241 => 
                                      array (
                                        'key' => 'Superior Kink Resistance',
                                        'value' => 759979,
                                      ),
                                      242 => 
                                      array (
                                        'key' => 'Superior Oil Resistance In The Tube',
                                        'value' => 759980,
                                      ),
                                      243 => 
                                      array (
                                        'key' => 'Superior Oil Resistance On The Cover',
                                        'value' => 759981,
                                      ),
                                      244 => 
                                      array (
                                        'key' => 'Superior Oil Resistance Tube And Cover',
                                        'value' => 759982,
                                      ),
                                      245 => 
                                      array (
                                        'key' => 'Superior Resistance To Oil, Grease And Animal Fat',
                                        'value' => 759983,
                                      ),
                                      246 => 
                                      array (
                                        'key' => 'Survivor Compound Available',
                                        'value' => 3194,
                                      ),
                                      247 => 
                                      array (
                                        'key' => 'Tapered Nozzle Available',
                                        'value' => 3175,
                                      ),
                                      248 => 
                                      array (
                                        'key' => 'Taste & Odorless Tube',
                                        'value' => 3176,
                                      ),
                                      249 => 
                                      array (
                                        'key' => 'Tolerates misalignment',
                                        'value' => 760058,
                                      ),
                                      250 => 
                                      array (
                                        'key' => 'Transmit power from both sides',
                                        'value' => 760059,
                                      ),
                                      251 => 
                                      array (
                                        'key' => 'True dimensional stability and higher horsepower capacity for long belt life',
                                        'value' => 760060,
                                      ),
                                      252 => 
                                      array (
                                        'key' => 'Twist Resistant',
                                        'value' => 3177,
                                      ),
                                      253 => 
                                      array (
                                        'key' => 'U.S. Coast Guard Certified',
                                        'value' => 3178,
                                      ),
                                      254 => 
                                      array (
                                        'key' => 'UL / CUL 330 Certified ',
                                        'value' => 759987,
                                      ),
                                      255 => 
                                      array (
                                        'key' => 'UL / CUL Certified',
                                        'value' => 3195,
                                      ),
                                      256 => 
                                      array (
                                        'key' => 'UL 330A Approved',
                                        'value' => 3179,
                                      ),
                                      257 => 
                                      array (
                                        'key' => 'UL 330B Approved',
                                        'value' => 3180,
                                      ),
                                      258 => 
                                      array (
                                        'key' => 'UL 94Hb Approved',
                                        'value' => 759984,
                                      ),
                                      259 => 
                                      array (
                                        'key' => 'UL Certified',
                                        'value' => 759985,
                                      ),
                                      260 => 
                                      array (
                                        'key' => 'Ultra-Low Permeation',
                                        'value' => 3181,
                                      ),
                                      261 => 
                                      array (
                                        'key' => 'Uniform cross section means less drive wear',
                                        'value' => 760061,
                                      ),
                                      262 => 
                                      array (
                                        'key' => 'Universal Fuel Compatibility',
                                        'value' => 3182,
                                      ),
                                      263 => 
                                      array (
                                        'key' => 'Universal tooth profile drops into existing sprockets',
                                        'value' => 760062,
                                      ),
                                      264 => 
                                      array (
                                        'key' => 'Universal tooth profile fits into existing RPP sprockets',
                                        'value' => 760063,
                                      ),
                                      265 => 
                                      array (
                                        'key' => 'Universal tooth profile, fits into existing HTD and RPP sprockets',
                                        'value' => 760064,
                                      ),
                                      266 => 
                                      array (
                                        'key' => 'USDA / FDA Certified',
                                        'value' => 759986,
                                      ),
                                      267 => 
                                      array (
                                        'key' => 'Vacuum Rated',
                                        'value' => 3183,
                                      ),
                                      268 => 
                                      array (
                                        'key' => 'Versatile Chemical Hose that Handles Petroleum Based Products',
                                        'value' => 3184,
                                      ),
                                      269 => 
                                      array (
                                        'key' => 'Visibility of Flow',
                                        'value' => 3185,
                                      ),
                                      270 => 
                                      array (
                                        'key' => 'Withstand high loading forces',
                                        'value' => 760065,
                                      ),
                                    ),
                                     'width' => 300,
                                     'height' => '',
                                     'maxItems' => 5,
                                     'renderType' => 'tags',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
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
                                     'name' => 'PressureUntil',
                                     'title' => 'Pressure Until',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'yes',
                                     'noLabel' => 'no',
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
                                        'key' => 'yes',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'no',
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
                                     'style' => 'margin-left:10px;',
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
                                     'decimalPrecision' => 3,
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
                                     'decimalPrecision' => 3,
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
                                     'style' => 'margin-left: 20px;',
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
                    ),
                     'locked' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/genealogy.svg',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Category Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Category Data',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'Name,ShortDescription',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'Category',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'mainCategory',
                         'title' => 'Main - Category',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'Name,ShortDescription',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'SubCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'subCategory',
                         'title' => 'Sub - Category',
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
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'Name,ShortDescription',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'FittingCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'fittingCategory',
                         'title' => 'Fitting Category',
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
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'Name,ShortDescription',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'FittingSubCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'fittingSubCategory',
                         'title' => 'Fitting Sub Category',
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/flow_chart.svg',
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
             'layout' => NULL,
             'border' => false,
             'name' => 'Fert',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Finished Goods Data',
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
                     'title' => 'Finished Good Attributes',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => 1000,
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
                         'bodyStyle' => '',
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
                                     'width' => 250,
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
                                     'width' => 250,
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
                                     'style' => 'margin-left:80px;',
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
                                     'width' => 250,
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
                                     'style' => 'margin-left:80px;',
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
                         'bodyStyle' => '',
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
                                     'width' => 250,
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
                                     'width' => 250,
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
                                     'width' => 250,
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
                                     'style' => 'margin-left: 80px;',
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
                                        'classes' => 'PTGEUCountryOfOrigin',
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
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 250,
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
                                        'key' => 'IFS',
                                        'value' => 'IFS',
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'PTG',
                                        'value' => 'PTG',
                                      ),
                                    ),
                                     'width' => 250,
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
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 250,
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
                     'bodyStyle' => '',
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
                             'bodyStyle' => 'margin-left:10px;',
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
                                     'width' => 220,
                                     'height' => '',
                                     'maxItems' => '',
                                     'renderType' => 'tags',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 200,
                         'name' => 'Certifications',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'border:0',
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
                             'width' => 710,
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
                             'width' => 710,
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
                                     'width' => 210,
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
                                     'style' => 'margin-left:205px;',
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
                                     'width' => 220,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                                     'optionsProviderData' => 'californiaProposition',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'californiaProposition65ChemicalName1',
                                     'title' => 'California Proposition65 Chemical Name1',
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
                                     'width' => 220,
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
                                     'width' => 220,
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
                                     'width' => 220,
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
                                     'width' => 440,
                                     'height' => '',
                                     'maxItems' => '',
                                     'assetUploadPath' => '',
                                     'queryColumnType' => 'text',
                                     'relationType' => true,
                                     'objectsAllowed' => false,
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
                                    ),
                                     'pathFormatterClass' => '',
                                     'name' => 'Gallery',
                                     'title' => 'Gallery',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 50px;',
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
                         'bodyStyle' => '',
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
                                     'name' => 'productionLengths',
                                     'title' => 'Production Lengths',
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
                                  5 => 
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
                         'width' => 300,
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
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 300,
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
                         'width' => 300,
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
                         'width' => 300,
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
                         'width' => 300,
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
                         'width' => 300,
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
                         'width' => 300,
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
                         'width' => 300,
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
                         'width' => 300,
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
                         'width' => 300,
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
                         'width' => 300,
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
                         'width' => 300,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'certificationImage',
                         'title' => 'Certification Image',
                         'tooltip' => 'Certification Image for Virtual Catalog API.',
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
                         'width' => 300,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'LeftPrintCatalogImage',
                         'title' => 'Left Image',
                         'tooltip' => 'Left print catalog image for hydraulic hose and hydraulic fitting hose.',
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
                         'title' => 'Right Image',
                         'tooltip' => 'Right print catalog image for hydraulic hose and hydraulic fitting hose.',
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
                         'name' => 'DrawingPictureForCatalog',
                         'title' => 'Drawing Picture',
                         'tooltip' => 'Drawing Picture For Catalog',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => true,
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
