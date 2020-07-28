<?php 

/** 
* Generated at: 2020-07-23T12:33:40+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- CatalogType [select]
- ValidFromDate [date]
- CatalogName [input]
- Currency [select]
- CatalogLanguage [select]
- IsPriceCatalog [booleanSelect]
- DistributionChannel [select]
- SalesOrganisation [select]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '26',
   'name' => 'Catalog',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1595500419,
   'userOwner' => 2,
   'userModification' => 2,
   'parentClass' => '',
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
   'cacheRawRelationData' => false,
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'labelWidth' => 100,
     'layout' => NULL,
     'border' => false,
     'icon' => NULL,
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
         'icon' => '',
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
             'width' => '',
             'defaultValue' => '',
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'dynamicOptions' => false,
             'name' => 'CatalogType',
             'title' => 'Catalog Type',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
             'fieldtype' => 'date',
             'queryColumnType' => 'bigint(20)',
             'columnType' => 'bigint(20)',
             'phpdocType' => '\\Carbon\\Carbon',
             'defaultValue' => NULL,
             'useCurrentDate' => false,
             'name' => 'ValidFromDate',
             'title' => 'Valid From Date',
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
             'width' => NULL,
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'regex' => '',
             'unique' => false,
             'showCharCount' => false,
             'name' => 'CatalogName',
             'title' => 'Catalog Name',
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
                'key' => 'USD',
                'value' => 'USD',
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
             'name' => 'Currency',
             'title' => 'Currency',
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
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'fieldtype' => 'select',
             'options' => 
            array (
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
             'name' => 'CatalogLanguage',
             'title' => 'Language',
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
             'width' => '',
             'queryColumnType' => 'tinyint(1) null',
             'columnType' => 'tinyint(1) null',
             'phpdocType' => 'boolean',
             'name' => 'IsPriceCatalog',
             'title' => 'Is Price Catalog',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'fieldtype' => 'select',
             'options' => 
            array (
              0 => 
              array (
                'key' => 'END USER (09)',
                'value' => '09',
              ),
              1 => 
              array (
                'key' => 'EPD SALES (02)',
                'value' => '02',
              ),
              2 => 
              array (
                'key' => 'HERITAGE (05)',
                'value' => '05',
              ),
              3 => 
              array (
                'key' => 'INTERNAL BUSINESS (10)',
                'value' => '10',
              ),
              4 => 
              array (
                'key' => 'OEM (07)',
                'value' => '07',
              ),
              5 => 
              array (
                'key' => 'PHOENIX (04)',
                'value' => '04',
              ),
              6 => 
              array (
                'key' => 'Phoenix Xtra Blanket (06)',
                'value' => '06',
              ),
              7 => 
              array (
                'key' => 'RP SALES (03)',
                'value' => '03',
              ),
            ),
             'width' => '',
             'defaultValue' => '',
             'optionsProviderClass' => 'CatalogBundle\\OptionProvider\\DistributionAndSalesOptionsProvider',
             'optionsProviderData' => 'DistributionChannel|name+code|code',
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'dynamicOptions' => false,
             'name' => 'DistributionChannel',
             'title' => 'Distribution Channel',
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
          7 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'fieldtype' => 'select',
             'options' => 
            array (
              0 => 
              array (
                'key' => ' (0153)',
                'value' => '0153',
              ),
              1 => 
              array (
                'key' => ' (0154)',
                'value' => '0154',
              ),
              2 => 
              array (
                'key' => 'AAM CT AS (0002)',
                'value' => '0002',
              ),
              3 => 
              array (
                'key' => 'Argentina Sales (0711)',
                'value' => '0711',
              ),
              4 => 
              array (
                'key' => 'BELT CONCEPTS (0239)',
                'value' => '0239',
              ),
              5 => 
              array (
                'key' => 'BeltTrade Inc. (9252)',
                'value' => '9252',
              ),
              6 => 
              array (
                'key' => 'CHILE (0027)',
                'value' => '0027',
              ),
              7 => 
              array (
                'key' => 'Chile Sales (0727)',
                'value' => '0727',
              ),
              8 => 
              array (
                'key' => 'Contitech (Shandong) (0443)',
                'value' => '0443',
              ),
              9 => 
              array (
                'key' => 'ContiTech Canada, In (0310)',
                'value' => '0310',
              ),
              10 => 
              array (
                'key' => 'Contitech de México (0644)',
                'value' => '0644',
              ),
              11 => 
              array (
                'key' => 'ContiTech Slovenija (0674)',
                'value' => '0674',
              ),
              12 => 
              array (
                'key' => 'ContiTech USA, Inc. (0109)',
                'value' => '0109',
              ),
              13 => 
              array (
                'key' => 'COSMOFLEX (0247)',
                'value' => '0247',
              ),
              14 => 
              array (
                'key' => 'CT Africa (Pty) Ltd (0478)',
                'value' => '0478',
              ),
              15 => 
              array (
                'key' => 'CT Australia Pty Ltd (0623)',
                'value' => '0623',
              ),
              16 => 
              array (
                'key' => 'CT Mex Industry (7003)',
                'value' => '7003',
              ),
              17 => 
              array (
                'key' => 'CT MX Chihuahua (0697)',
                'value' => '0697',
              ),
              18 => 
              array (
                'key' => 'CT Ponta Grossa (0757)',
                'value' => '0757',
              ),
              19 => 
              array (
                'key' => 'CT Services (Pty)Ltd (0475)',
                'value' => '0475',
              ),
              20 => 
              array (
                'key' => 'CT South Africa(Pty) (0479)',
                'value' => '0479',
              ),
              21 => 
              array (
                'key' => 'CVB Brazil Sales (0553)',
                'value' => '0553',
              ),
              22 => 
              array (
                'key' => 'DO NOT USE (1674)',
                'value' => '1674',
              ),
              23 => 
              array (
                'key' => 'Dunlop EPD France (0424)',
                'value' => '0424',
              ),
              24 => 
              array (
                'key' => 'EPD EUROPE (0621)',
                'value' => '0621',
              ),
              25 => 
              array (
                'key' => 'EPD Intl Sales Corp (0252)',
                'value' => '0252',
              ),
              26 => 
              array (
                'key' => 'Fluid Automotive CZ (0449)',
                'value' => '0449',
              ),
              27 => 
              array (
                'key' => 'GEP Changzhou CV Ltd (0442)',
                'value' => '0442',
              ),
              28 => 
              array (
                'key' => 'GEP Changzhou DC Ltd (0441)',
                'value' => '0441',
              ),
              29 => 
              array (
                'key' => 'GEP Changzhou Ltd (0440)',
                'value' => '0440',
              ),
              30 => 
              array (
                'key' => 'GEP Qingdao (0633)',
                'value' => '0633',
              ),
              31 => 
              array (
                'key' => 'GOODYEAR T & R GEP (X109)',
                'value' => 'X109',
              ),
              32 => 
              array (
                'key' => 'GOODYEAR T & R GEP (Y109)',
                'value' => 'Y109',
              ),
              33 => 
              array (
                'key' => 'Granford Mfg (0617)',
                'value' => '0617',
              ),
              34 => 
              array (
                'key' => 'IND CT AS (0004)',
                'value' => '0004',
              ),
              35 => 
              array (
                'key' => 'Industry PTS (0043)',
                'value' => '0043',
              ),
              36 => 
              array (
                'key' => 'Korea Sales (0451)',
                'value' => '0451',
              ),
              37 => 
              array (
                'key' => 'Legg Industry (8333)',
                'value' => '8333',
              ),
              38 => 
              array (
                'key' => 'Mexico Production (1644)',
                'value' => '1644',
              ),
              39 => 
              array (
                'key' => 'New Co - CA Sales (1646)',
                'value' => '1646',
              ),
              40 => 
              array (
                'key' => 'New Co - US Sales (1647)',
                'value' => '1647',
              ),
              41 => 
              array (
                'key' => 'Phoenix Cnvr Blt Sol (0241)',
                'value' => '0241',
              ),
              42 => 
              array (
                'key' => 'PU CT AS (0005)',
                'value' => '0005',
              ),
              43 => 
              array (
                'key' => 'Qingdao/Shanghai (0634)',
                'value' => '0634',
              ),
              44 => 
              array (
                'key' => 'RCT Brazil Sales Org (0754)',
                'value' => '0754',
              ),
              45 => 
              array (
                'key' => 'Seawing Industria (0755)',
                'value' => '0755',
              ),
              46 => 
              array (
                'key' => 'Singapore Sales (0450)',
                'value' => '0450',
              ),
              47 => 
              array (
                'key' => 'Speciality Yarn & Co (0243)',
                'value' => '0243',
              ),
              48 => 
              array (
                'key' => 'Specialty Fabrics (0240)',
                'value' => '0240',
              ),
              49 => 
              array (
                'key' => 'St Marys Rubber Trk. (0149)',
                'value' => '0149',
              ),
              50 => 
              array (
                'key' => 'Veyance Germany (0677)',
                'value' => '0677',
              ),
              51 => 
              array (
                'key' => 'Veyance Ind. Service (0242)',
                'value' => '0242',
              ),
              52 => 
              array (
                'key' => 'Veyance Spain (0681)',
                'value' => '0681',
              ),
              53 => 
              array (
                'key' => 'VT Hellas ( Greece ) (0682)',
                'value' => '0682',
              ),
              54 => 
              array (
                'key' => 'VTD Brazil Sales Org (0751)',
                'value' => '0751',
              ),
              55 => 
              array (
                'key' => 'VTE Chasetown UK (2674)',
                'value' => '2674',
              ),
              56 => 
              array (
                'key' => 'VTI Brazil Sales Org (0753)',
                'value' => '0753',
              ),
            ),
             'width' => '',
             'defaultValue' => '',
             'optionsProviderClass' => 'CatalogBundle\\OptionProvider\\DistributionAndSalesOptionsProvider',
             'optionsProviderData' => 'SalesOrganisation|name+code|code',
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'dynamicOptions' => false,
             'name' => 'SalesOrganisation',
             'title' => 'Sales Organisation',
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
    ),
     'locked' => false,
  )),
   'icon' => '',
   'previewUrl' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
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
   'dao' => NULL,
));
