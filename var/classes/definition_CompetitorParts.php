<?php 

/** 
* Generated at: 2020-04-07T13:33:04+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- Material [manyToManyObjectRelation]
- CompetitorName [select]
- CompetitorProductName [select]
- PartNumber [input]
- CompetitorIdFraction [input]
- CompetitorIdDec [numeric]
- CompetitorLength [numeric]
- CompetitiveDescription [textarea]
- CompetitiveIndustryStandard [input]
- ContinentalBenefitOverHose1 [input]
- ContinentalBenefitOverHose2 [input]
- ContinentalBenefitOverHose3 [input]
- CompetitorListPrice [input]
- CompetitivePriceDate [date]
- DocumentCurrency [input]
- CompetitiveMultiplier [numeric]
- CompetitorNetPrice [input]
- CompetitorPriceUOM [input]
- CompetitorPrimaryAlternate [input]
- Comments [textarea]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '19',
   'name' => 'CompetitorParts',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1586259184,
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
          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
             'fieldtype' => 'manyToManyObjectRelation',
             'width' => '',
             'height' => '',
             'maxItems' => '',
             'queryColumnType' => 'text',
             'phpdocType' => 'array',
             'relationType' => true,
             'visibleFields' => 
            array (
            ),
             'allowToCreateNewObject' => false,
             'optimizedAdminLoading' => false,
             'visibleFieldDefinitions' => 
            array (
            ),
             'lazyLoading' => true,
             'classes' => 
            array (
              0 => 
              array (
                'classes' => 'Product',
              ),
            ),
             'pathFormatterClass' => '',
             'name' => 'Material',
             'title' => 'Material',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'fieldtype' => 'select',
             'options' => 
            array (
              0 => 
              array (
                'key' => 'Carlisle',
                'value' => 'Carlisle',
              ),
              1 => 
              array (
                'key' => 'Carlisle',
                'value' => 'Carlisle',
              ),
              2 => 
              array (
                'key' => 'Carlisle',
                'value' => 'Carlisle',
              ),
              3 => 
              array (
                'key' => 'Dayco',
                'value' => 'Dayco',
              ),
              4 => 
              array (
                'key' => 'Dayco',
                'value' => 'Dayco',
              ),
              5 => 
              array (
                'key' => 'Dayco',
                'value' => 'Dayco',
              ),
              6 => 
              array (
                'key' => 'Dayco',
                'value' => 'Dayco',
              ),
              7 => 
              array (
                'key' => 'Dayco',
                'value' => 'Dayco',
              ),
              8 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              9 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              10 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              11 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              12 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              13 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              14 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              15 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              16 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              17 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              18 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              19 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              20 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              21 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              22 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              23 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              24 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              25 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              26 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              27 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              28 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              29 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              30 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              31 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              32 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              33 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              34 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              35 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
              36 => 
              array (
                'key' => 'Gates',
                'value' => 'Gates',
              ),
            ),
             'width' => '',
             'defaultValue' => '',
             'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
             'optionsProviderData' => 'Competitor|Name',
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'dynamicOptions' => false,
             'name' => 'CompetitorName',
             'title' => 'Competitor Name',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'fieldtype' => 'select',
             'options' => 
            array (
              0 => 
              array (
                'key' => 'AIR/OIL HOSE',
                'value' => 'AIR/OIL HOSE',
              ),
              1 => 
              array (
                'key' => 'BARRICADE® FUEL INJECTION HOSE - CLAMSHELL PKG',
                'value' => 'BARRICADE® FUEL INJECTION HOSE - CLAMSHELL PKG',
              ),
              2 => 
              array (
                'key' => 'CHARTER AIR HOSE',
                'value' => 'CHARTER AIR HOSE',
              ),
              3 => 
              array (
                'key' => 'CHARTER AIR HOSE - BULK',
                'value' => 'CHARTER AIR HOSE - BULK',
              ),
              4 => 
              array (
                'key' => 'COG V BANDS',
                'value' => 'COG V BANDS',
              ),
              5 => 
              array (
                'key' => 'COOLANT HOSE - FLEETRUNNER®',
                'value' => 'COOLANT HOSE - FLEETRUNNER®',
              ),
              6 => 
              array (
                'key' => 'COOLANT HOSE - GREEN STRIPE® 2-PLY STRAIGHT (3 FT. LENGTHS)',
                'value' => 'COOLANT HOSE - GREEN STRIPE® 2-PLY STRAIGHT (3 FT. LENGTHS)',
              ),
              7 => 
              array (
                'key' => 'COOLANT HOSE - GREEN STRIPE® 4-PLY HEAVY DUTY (3 FT. LENGTHS)',
                'value' => 'COOLANT HOSE - GREEN STRIPE® 4-PLY HEAVY DUTY (3 FT. LENGTHS)',
              ),
              8 => 
              array (
                'key' => 'COOLANT HOSE - GREEN STRIPE® WIRE INSERTED (10 FT. LENGTHS)',
                'value' => 'COOLANT HOSE - GREEN STRIPE® WIRE INSERTED (10 FT. LENGTHS)',
              ),
              9 => 
              array (
                'key' => 'COOLANT HOSE - GREEN STRIPE® WIRE INSERTED (5 FT. LENGTHS)',
                'value' => 'COOLANT HOSE - GREEN STRIPE® WIRE INSERTED (5 FT. LENGTHS)',
              ),
              10 => 
              array (
                'key' => 'COOLANT HOSE - MOLDED',
                'value' => 'COOLANT HOSE - MOLDED',
              ),
              11 => 
              array (
                'key' => 'COOLANT HOSE - SILICONE (3 FT. LENGTHS)',
                'value' => 'COOLANT HOSE - SILICONE (3 FT. LENGTHS)',
              ),
              12 => 
              array (
                'key' => 'COOLANT HOSE - SMALL I.D.',
                'value' => 'COOLANT HOSE - SMALL I.D.',
              ),
              13 => 
              array (
                'key' => 'COOLANT HOSE - VULCO® STRAIGHT (3 FT. LENGTHS)',
                'value' => 'COOLANT HOSE - VULCO® STRAIGHT (3 FT. LENGTHS)',
              ),
              14 => 
              array (
                'key' => 'FUEL FILL HOSE (3 FT. LENGTHS)',
                'value' => 'FUEL FILL HOSE (3 FT. LENGTHS)',
              ),
              15 => 
              array (
                'key' => 'FUEL HOSE',
                'value' => 'FUEL HOSE',
              ),
              16 => 
              array (
                'key' => 'FUEL LINE HOSE - PVC/EEC',
                'value' => 'FUEL LINE HOSE - PVC/EEC',
              ),
              17 => 
              array (
                'key' => 'HEATER HOSE',
                'value' => 'HEATER HOSE',
              ),
              18 => 
              array (
                'key' => 'HEATER HOSE - CHARTER',
                'value' => 'HEATER HOSE - CHARTER',
              ),
              19 => 
              array (
                'key' => 'HEATER HOSE - FIREWALL',
                'value' => 'HEATER HOSE - FIREWALL',
              ),
              20 => 
              array (
                'key' => 'HEATER HOSE - GREEN STRIPE',
                'value' => 'HEATER HOSE - GREEN STRIPE',
              ),
              21 => 
              array (
                'key' => 'HEATER HOSE - POLYBAGGED',
                'value' => 'HEATER HOSE - POLYBAGGED',
              ),
              22 => 
              array (
                'key' => 'HEATER HOSE - SAFETY STRIPE',
                'value' => 'HEATER HOSE - SAFETY STRIPE',
              ),
              23 => 
              array (
                'key' => 'MICRO-V BELTS',
                'value' => 'MICRO-V BELTS',
              ),
              24 => 
              array (
                'key' => 'MISC HOSE',
                'value' => 'MISC HOSE',
              ),
              25 => 
              array (
                'key' => 'POWER BRAKE HOSE',
                'value' => 'POWER BRAKE HOSE',
              ),
              26 => 
              array (
                'key' => 'RADIATOR HOSE',
                'value' => 'RADIATOR HOSE',
              ),
              27 => 
              array (
                'key' => 'SAFETY STRIPE AIR HOSE',
                'value' => 'SAFETY STRIPE AIR HOSE',
              ),
              28 => 
              array (
                'key' => 'THERMO GPX AIR HOSE',
                'value' => 'THERMO GPX AIR HOSE',
              ),
              29 => 
              array (
                'key' => 'TRANSMISSION OIL COOLER HOSE - BULK',
                'value' => 'TRANSMISSION OIL COOLER HOSE - BULK',
              ),
              30 => 
              array (
                'key' => 'TRANSMISSION OIL COOLER HOSE - CLAMSHELL PKG',
                'value' => 'TRANSMISSION OIL COOLER HOSE - CLAMSHELL PKG',
              ),
              31 => 
              array (
                'key' => 'TRI-POWER POWERBAND BELTS',
                'value' => 'TRI-POWER POWERBAND BELTS',
              ),
              32 => 
              array (
                'key' => 'V RIBBED',
                'value' => 'V RIBBED',
              ),
              33 => 
              array (
                'key' => 'V RIBBED J BELT',
                'value' => 'V RIBBED J BELT',
              ),
              34 => 
              array (
                'key' => 'VACUUM TUBING - NON-REINFORCED',
                'value' => 'VACUUM TUBING - NON-REINFORCED',
              ),
              35 => 
              array (
                'key' => 'VACUUM TUBING - RADIATOR OVERFLOW',
                'value' => 'VACUUM TUBING - RADIATOR OVERFLOW',
              ),
              36 => 
              array (
                'key' => 'VACUUM TUBING - REINFORCED WINDSHIELD',
                'value' => 'VACUUM TUBING - REINFORCED WINDSHIELD',
              ),
            ),
             'width' => '',
             'defaultValue' => '',
             'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
             'optionsProviderData' => 'Competitor|ProductName',
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'dynamicOptions' => false,
             'name' => 'CompetitorProductName',
             'title' => 'Competitor Product Name',
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
             'name' => 'PartNumber',
             'title' => 'Competitor Part Number',
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
             'name' => 'CompetitorIdFraction',
             'title' => 'Competitor ID (in) Fraction',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
             'fieldtype' => 'numeric',
             'width' => '',
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
             'name' => 'CompetitorIdDec',
             'title' => 'Competitor ID (in) Dec',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
             'fieldtype' => 'numeric',
             'width' => '',
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
             'name' => 'CompetitorLength',
             'title' => 'Competitor Length (ft)',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
             'fieldtype' => 'textarea',
             'width' => 400,
             'height' => 150,
             'maxLength' => NULL,
             'showCharCount' => false,
             'excludeFromSearchIndex' => false,
             'queryColumnType' => 'longtext',
             'columnType' => 'longtext',
             'phpdocType' => 'string',
             'name' => 'CompetitiveDescription',
             'title' => 'Competitive Description',
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
             'name' => 'CompetitiveIndustryStandard',
             'title' => 'Competitive Industry Standard',
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
          9 => 
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
             'name' => 'ContinentalBenefitOverHose1',
             'title' => 'Continental Benefit Over This Hose 1',
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
          10 => 
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
             'name' => 'ContinentalBenefitOverHose2',
             'title' => 'Continental Benefit Over This Hose 2',
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
          11 => 
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
             'name' => 'ContinentalBenefitOverHose3',
             'title' => 'Continental Benefit Over This Hose 3',
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
          12 => 
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
             'name' => 'CompetitorListPrice',
             'title' => 'Competitor List Price',
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
          13 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
             'fieldtype' => 'date',
             'queryColumnType' => 'bigint(20)',
             'columnType' => 'bigint(20)',
             'phpdocType' => '\\Carbon\\Carbon',
             'defaultValue' => NULL,
             'useCurrentDate' => false,
             'name' => 'CompetitivePriceDate',
             'title' => 'Competitive Price Date',
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
          14 => 
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
             'name' => 'DocumentCurrency',
             'title' => 'Document Currency',
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
          15 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
             'fieldtype' => 'numeric',
             'width' => '',
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
             'name' => 'CompetitiveMultiplier',
             'title' => 'Competitive Multiplier',
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
          16 => 
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
             'name' => 'CompetitorNetPrice',
             'title' => 'Competitor Net Price',
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
          17 => 
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
             'name' => 'CompetitorPriceUOM',
             'title' => 'Competitor Price UOM',
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
          18 => 
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
             'name' => 'CompetitorPrimaryAlternate',
             'title' => 'Competitor Primary/Alternate',
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
          19 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
             'fieldtype' => 'textarea',
             'width' => 400,
             'height' => 150,
             'maxLength' => NULL,
             'showCharCount' => false,
             'excludeFromSearchIndex' => false,
             'queryColumnType' => 'longtext',
             'columnType' => 'longtext',
             'phpdocType' => 'string',
             'name' => 'Comments',
             'title' => 'Comments',
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
