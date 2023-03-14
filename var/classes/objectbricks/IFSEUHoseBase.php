<?php 

/** 
* Generated at: 2023-03-14T07:03:08+01:00
* IP: 127.0.0.1


Fields Summary: 
- staticWire [booleanSelect]
- staticWireType [select]
- tubeCharacteristic [select]
- hoseIdDec [numeric]
- hoseIdMM [numeric]
- Note2BelowTable [multiselect]
- FlowMediumStability [booleanSelect]
- numberOfHelixWires [numeric]
- tubeGaugeFractional [input]
- NonStockSizes [input]
- standards [multiselect]
- numberOfPlies [numeric]
- withHelix [booleanSelect]
- Coupling [input]
- InnerLining [select]
- colorInnerLining [select]
- Reinforcement [select]
- Helix [select]
- propertiesInnerLayer [select]
- CoverOuterLayer [select]
- ColorOuterLayer [select]
- Haptic [select]
- PropertiesOuterLayer [select]
- FieldsOfApplication [multiselect]
- flowMedium [multiselect]
*/ 


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'IFSEUProduct',
      'fieldname' => 'Base',
    ),
  ),
   'dao' => NULL,
   'key' => 'IFSEUHoseBase',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => 'Technical Data',
   'group' => 'IFSEU_Bricks',
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'labelWidth' => 100,
     'layout' => NULL,
     'border' => false,
     'name' => NULL,
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
                     'name' => 'staticWire',
                     'title' => 'Static Wire',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Stainless Steel',
                        'value' => 'Stainless Steel',
                      ),
                      1 => 
                      array (
                        'key' => 'Copper',
                        'value' => 'Copper',
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
                     'name' => 'staticWireType',
                     'title' => 'Static Wire Type',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Corrugated',
                        'value' => NULL,
                      ),
                      1 => 
                      array (
                        'key' => 'Rough Bore',
                        'value' => NULL,
                      ),
                      2 => 
                      array (
                        'key' => 'Smooth',
                        'value' => NULL,
                      ),
                      3 => 
                      array (
                        'key' => 'Standard',
                        'value' => NULL,
                      ),
                      4 => 
                      array (
                        'key' => 'Wrapped',
                        'value' => NULL,
                      ),
                    ),
                     'width' => 300,
                     'defaultValue' => '',
                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                     'optionsProviderData' => 'tubeCharacteristic',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'dynamicOptions' => false,
                     'name' => 'tubeCharacteristic',
                     'title' => 'Tube Characteristic',
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
                     'decimalPrecision' => 2,
                     'name' => 'hoseIdDec',
                     'title' => 'Hose ID (in) (Dec.) Nominal ID',
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
                     'decimalPrecision' => 2,
                     'name' => 'hoseIdMM',
                     'title' => 'Hose ID (mm) Nominal ID',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'float:left; margin-right: 20px; clear:left;',
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
                     'maxItems' => 10,
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'Note2BelowTable',
                     'title' => 'Note 2 (Below Table)',
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
                     'name' => 'FlowMediumStability',
                     'title' => 'Flow Medium - Stability',
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
                     'name' => 'numberOfHelixWires',
                     'title' => 'Number of Helix Wires',
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
                     'name' => 'tubeGaugeFractional',
                     'title' => 'Tube Gauge (Fractional)',
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
                     'name' => 'NonStockSizes',
                     'title' => 'Non-Stock/Sizes',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Made in Germany',
                        'value' => 489,
                      ),
                      1 => 
                      array (
                        'key' => '74310',
                        'value' => 490,
                      ),
                      2 => 
                      array (
                        'key' => '20018-1',
                        'value' => 491,
                      ),
                      3 => 
                      array (
                        'key' => '5510-2',
                        'value' => 492,
                      ),
                      4 => 
                      array (
                        'key' => '6257.70',
                        'value' => 493,
                      ),
                      5 => 
                      array (
                        'key' => '6257.72',
                        'value' => 494,
                      ),
                      6 => 
                      array (
                        'key' => '6257.21',
                        'value' => 495,
                      ),
                      7 => 
                      array (
                        'key' => '853',
                        'value' => 496,
                      ),
                      8 => 
                      array (
                        'key' => '854',
                        'value' => 497,
                      ),
                      9 => 
                      array (
                        'key' => '856',
                        'value' => 498,
                      ),
                      10 => 
                      array (
                        'key' => '857',
                        'value' => 499,
                      ),
                      11 => 
                      array (
                        'key' => '45545-2 HL3 (R22+R23)',
                        'value' => 500,
                      ),
                      12 => 
                      array (
                        'key' => '14593/14594',
                        'value' => 501,
                      ),
                      13 => 
                      array (
                        'key' => '16436-1:2016  CLASS-2 (10 bar)',
                        'value' => 502,
                      ),
                      14 => 
                      array (
                        'key' => '12115:2011',
                        'value' => 503,
                      ),
                      15 => 
                      array (
                        'key' => '1761',
                        'value' => 504,
                      ),
                      16 => 
                      array (
                        'key' => '250',
                        'value' => 505,
                      ),
                      17 => 
                      array (
                        'key' => '6134-1A',
                        'value' => 507,
                      ),
                      18 => 
                      array (
                        'key' => '6134-2A',
                        'value' => 508,
                      ),
                      19 => 
                      array (
                        'key' => '6134-2B',
                        'value' => 509,
                      ),
                      20 => 
                      array (
                        'key' => '2398:2017 3C/L-T',
                        'value' => 510,
                      ),
                      21 => 
                      array (
                        'key' => '2398:2017 2C/L-T',
                        'value' => 511,
                      ),
                      22 => 
                      array (
                        'key' => '333 N1W',
                        'value' => 512,
                      ),
                      23 => 
                      array (
                        'key' => '333 N1',
                        'value' => 513,
                      ),
                      24 => 
                      array (
                        'key' => '830-1/V',
                        'value' => 514,
                      ),
                      25 => 
                      array (
                        'key' => 'Class A',
                        'value' => 515,
                      ),
                      26 => 
                      array (
                        'key' => 'GERMANISCHEN LLOYD ',
                        'value' => 516,
                      ),
                      27 => 
                      array (
                        'key' => '2153',
                        'value' => 517,
                      ),
                      28 => 
                      array (
                        'key' => ' 1529/2014',
                        'value' => 518,
                      ),
                      29 => 
                      array (
                        'key' => '6615G',
                        'value' => 519,
                      ),
                      30 => 
                      array (
                        'key' => '407:2007',
                        'value' => 520,
                      ),
                      31 => 
                      array (
                        'key' => '1825',
                        'value' => 521,
                      ),
                      32 => 
                      array (
                        'key' => 'EC Regulation no. 1907/2006',
                        'value' => 522,
                      ),
                      33 => 
                      array (
                        'key' => 'Regulation 177.1520',
                        'value' => 523,
                      ),
                      34 => 
                      array (
                        'key' => 'Regulation 177.2600',
                        'value' => 524,
                      ),
                      35 => 
                      array (
                        'key' => 'Regulation 177.1550',
                        'value' => 525,
                      ),
                      36 => 
                      array (
                        'key' => 'Recommendation III',
                        'value' => 526,
                      ),
                      37 => 
                      array (
                        'key' => 'Recommendation XXI, Cat. 2',
                        'value' => 527,
                      ),
                      38 => 
                      array (
                        'key' => 'Recommendation XXI, Cat. 4',
                        'value' => 528,
                      ),
                      39 => 
                      array (
                        'key' => '1935/2004',
                        'value' => 529,
                      ),
                      40 => 
                      array (
                        'key' => '2023/2006',
                        'value' => 530,
                      ),
                      41 => 
                      array (
                        'key' => '10/11',
                        'value' => 531,
                      ),
                      42 => 
                      array (
                        'key' => 'CLASS VI',
                        'value' => 532,
                      ),
                      43 => 
                      array (
                        'key' => 'Licensed in accordance with BS 6920-1:2000',
                        'value' => 533,
                      ),
                      44 => 
                      array (
                        'key' => 'Licensed in accordance with Pipes guideline for plastics used for drinking water, DVGW W270 and VP 549',
                        'value' => 534,
                      ),
                      45 => 
                      array (
                        'key' => '6254.12',
                        'value' => 536,
                      ),
                      46 => 
                      array (
                        'key' => '6254.16',
                        'value' => 537,
                      ),
                      47 => 
                      array (
                        'key' => '590',
                        'value' => 539,
                      ),
                      48 => 
                      array (
                        'key' => '2398:2017 1A',
                        'value' => 540,
                      ),
                      49 => 
                      array (
                        'key' => '73411-B',
                        'value' => 541,
                      ),
                      50 => 
                      array (
                        'key' => 'J20 R3/R4 D3 - HT - EC',
                        'value' => 545,
                      ),
                      51 => 
                      array (
                        'key' => 'DB/SBB',
                        'value' => 547,
                      ),
                      52 => 
                      array (
                        'key' => '11851 - 1.4301',
                        'value' => 1551,
                      ),
                      53 => 
                      array (
                        'key' => '100R13',
                        'value' => 2555,
                      ),
                      54 => 
                      array (
                        'key' => '856 4SH',
                        'value' => 2556,
                      ),
                      55 => 
                      array (
                        'key' => '853 1SN',
                        'value' => 2558,
                      ),
                      56 => 
                      array (
                        'key' => '100R15',
                        'value' => 2559,
                      ),
                      57 => 
                      array (
                        'key' => '100R12',
                        'value' => 2560,
                      ),
                      58 => 
                      array (
                        'key' => '3821:2020',
                        'value' => 2561,
                      ),
                      59 => 
                      array (
                        'key' => '16436-1:2016 Class 3 (30 bar)',
                        'value' => 2564,
                      ),
                      60 => 
                      array (
                        'key' => '16436-1:2016 CLASS 3 (30 bar)',
                        'value' => 2565,
                      ),
                      61 => 
                      array (
                        'key' => '856 4SP',
                        'value' => 2566,
                      ),
                      62 => 
                      array (
                        'key' => '100R16',
                        'value' => 2568,
                      ),
                      63 => 
                      array (
                        'key' => '857 2SC',
                        'value' => 2569,
                      ),
                      64 => 
                      array (
                        'key' => '100R1AT',
                        'value' => 2570,
                      ),
                      65 => 
                      array (
                        'key' => '100R2AT',
                        'value' => 2571,
                      ),
                      66 => 
                      array (
                        'key' => '853 2SN',
                        'value' => 2572,
                      ),
                      67 => 
                      array (
                        'key' => '100R19',
                        'value' => 2573,
                      ),
                      68 => 
                      array (
                        'key' => '100R17',
                        'value' => 2574,
                      ),
                      69 => 
                      array (
                        'key' => '11237 R19',
                        'value' => 2575,
                      ),
                      70 => 
                      array (
                        'key' => '20023 4SH',
                        'value' => 2576,
                      ),
                      71 => 
                      array (
                        'key' => '20023 4SP',
                        'value' => 2577,
                      ),
                      72 => 
                      array (
                        'key' => 'MSHA',
                        'value' => 2579,
                      ),
                      73 => 
                      array (
                        'key' => 'Dry Food',
                        'value' => 2580,
                      ),
                      74 => 
                      array (
                        'key' => 'New node',
                        'value' => 2581,
                      ),
                      75 => 
                      array (
                        'key' => '73379 Typ B1',
                        'value' => 2583,
                      ),
                      76 => 
                      array (
                        'key' => 'J30 R9',
                        'value' => 2585,
                      ),
                      77 => 
                      array (
                        'key' => '73379 Typ A1',
                        'value' => 2586,
                      ),
                      78 => 
                      array (
                        'key' => 'BWGL',
                        'value' => 2587,
                      ),
                      79 => 
                      array (
                        'key' => '16421 (W270)',
                        'value' => 2588,
                      ),
                      80 => 
                      array (
                        'key' => '15807 (UIC830-1V)',
                        'value' => 2590,
                      ),
                      81 => 
                      array (
                        'key' => 'DVGW',
                        'value' => 2591,
                      ),
                      82 => 
                      array (
                        'key' => 'VP549',
                        'value' => 2592,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 10,
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\StandardsOptionsProvider',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'standards',
                     'title' => 'Standards',
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
                     'decimalPrecision' => 0,
                     'name' => 'numberOfPlies',
                     'title' => 'Number of Plies',
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
                     'name' => 'withHelix',
                     'title' => 'With Helix',
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
                     'name' => 'Coupling',
                     'title' => 'Coupling',
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
          1 => 
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'fieldtype' => 'text',
                     'html' => 'Inner Layer',
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
                     'bodyStyle' => 'color:black;padding: 10px !important; background-color: #d4d1c9 !important;border-color: #bce8f1 !important',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                    ),
                     'locked' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 190,
                     'layout' => NULL,
                     'border' => true,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => '',
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
                            'key' => 'EPDM',
                            'value' => 345,
                          ),
                          1 => 
                          array (
                            'key' => 'NBR',
                            'value' => 346,
                          ),
                          2 => 
                          array (
                            'key' => 'NR',
                            'value' => 347,
                          ),
                          3 => 
                          array (
                            'key' => 'CR',
                            'value' => 348,
                          ),
                          4 => 
                          array (
                            'key' => 'CR-EPDM',
                            'value' => 349,
                          ),
                          5 => 
                          array (
                            'key' => 'UPE',
                            'value' => 350,
                          ),
                          6 => 
                          array (
                            'key' => 'FEP',
                            'value' => 351,
                          ),
                          7 => 
                          array (
                            'key' => 'CIIR',
                            'value' => 352,
                          ),
                          8 => 
                          array (
                            'key' => 'SBR',
                            'value' => 353,
                          ),
                          9 => 
                          array (
                            'key' => 'PA',
                            'value' => 354,
                          ),
                          10 => 
                          array (
                            'key' => 'Special elastomer',
                            'value' => 508,
                          ),
                          11 => 
                          array (
                            'key' => 'SBR-EPDM',
                            'value' => 509,
                          ),
                          12 => 
                          array (
                            'key' => 'CSM/BR',
                            'value' => 510,
                          ),
                          13 => 
                          array (
                            'key' => 'Fluoroplastic ',
                            'value' => 581,
                          ),
                          14 => 
                          array (
                            'key' => 'AEM',
                            'value' => 589,
                          ),
                          15 => 
                          array (
                            'key' => 'SBR-BR',
                            'value' => 612,
                          ),
                          16 => 
                          array (
                            'key' => 'SBR-NR',
                            'value' => 1616,
                          ),
                          17 => 
                          array (
                            'key' => 'no fuel solubility',
                            'value' => 1642,
                          ),
                          18 => 
                          array (
                            'key' => 'Synthetic rubber',
                            'value' => 2622,
                          ),
                          19 => 
                          array (
                            'key' => 'CPE',
                            'value' => 2628,
                          ),
                          20 => 
                          array (
                            'key' => 'CM',
                            'value' => 2646,
                          ),
                          21 => 
                          array (
                            'key' => 'FPM',
                            'value' => 2648,
                          ),
                          22 => 
                          array (
                            'key' => 'ECO',
                            'value' => 2685,
                          ),
                          23 => 
                          array (
                            'key' => 'FPM/HNBR',
                            'value' => 2687,
                          ),
                          24 => 
                          array (
                            'key' => 'FPM/AEM',
                            'value' => 2692,
                          ),
                          25 => 
                          array (
                            'key' => 'FPM/ECO',
                            'value' => 2694,
                          ),
                          26 => 
                          array (
                            'key' => 'HNBR',
                            'value' => 2700,
                          ),
                          27 => 
                          array (
                            'key' => 'UHMWPE',
                            'value' => 2727,
                          ),
                          28 => 
                          array (
                            'key' => 'PU',
                            'value' => 2736,
                          ),
                          29 => 
                          array (
                            'key' => 'EPDM black or EPM white',
                            'value' => 2780,
                          ),
                          30 => 
                          array (
                            'key' => 'PTFE',
                            'value' => 2802,
                          ),
                        ),
                         'width' => 300,
                         'defaultValue' => '',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'innerlining',
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'dynamicOptions' => false,
                         'name' => 'InnerLining',
                         'title' => 'Inner Lining',
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
                          0 => 
                          array (
                            'key' => 'transparent',
                            'value' => 355,
                          ),
                          1 => 
                          array (
                            'key' => 'white',
                            'value' => 356,
                          ),
                          2 => 
                          array (
                            'key' => 'black',
                            'value' => 357,
                          ),
                          3 => 
                          array (
                            'key' => 'grey',
                            'value' => 358,
                          ),
                          4 => 
                          array (
                            'key' => 'bright',
                            'value' => 359,
                          ),
                          5 => 
                          array (
                            'key' => 'blue',
                            'value' => 381,
                          ),
                          6 => 
                          array (
                            'key' => 'red',
                            'value' => 382,
                          ),
                          7 => 
                          array (
                            'key' => 'orange',
                            'value' => 383,
                          ),
                          8 => 
                          array (
                            'key' => 'black or white',
                            'value' => 2779,
                          ),
                          9 => 
                          array (
                            'key' => 'light grey',
                            'value' => 2799,
                          ),
                          10 => 
                          array (
                            'key' => 'white with magnetic and X-ray detectable grey elastomer layer behind',
                            'value' => 2800,
                          ),
                        ),
                         'width' => 300,
                         'defaultValue' => '',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'colorInn',
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'dynamicOptions' => false,
                         'name' => 'colorInnerLining',
                         'title' => 'Color',
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
                         'name' => 'Reinforcement',
                         'title' => 'Reinforcement',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'fieldtype' => 'select',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'With integrated steel wire helix',
                            'value' => 368,
                          ),
                          1 => 
                          array (
                            'key' => 'With integrated plastic helix',
                            'value' => 369,
                          ),
                          2 => 
                          array (
                            'key' => 'With 2 spiralled copper strands',
                            'value' => 511,
                          ),
                          3 => 
                          array (
                            'key' => 'With copper wire',
                            'value' => 512,
                          ),
                          4 => 
                          array (
                            'key' => 'With spring wire spiral',
                            'value' => 513,
                          ),
                          5 => 
                          array (
                            'key' => 'With galvanised spring steel helix',
                            'value' => 531,
                          ),
                          6 => 
                          array (
                            'key' => 'With steel helix from DN 25',
                            'value' => 2653,
                          ),
                          7 => 
                          array (
                            'key' => 'With steel wire braid',
                            'value' => 2661,
                          ),
                          8 => 
                          array (
                            'key' => 'With antistatic wire',
                            'value' => 2717,
                          ),
                          9 => 
                          array (
                            'key' => 'With integrated steel wire spiral and antistatic wire',
                            'value' => 2718,
                          ),
                        ),
                         'width' => 300,
                         'defaultValue' => '',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'helix',
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'dynamicOptions' => false,
                         'name' => 'Helix',
                         'title' => 'Helix',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'fieldtype' => 'select',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Robust',
                            'value' => 461,
                          ),
                          1 => 
                          array (
                            'key' => 'Low resistance to flow',
                            'value' => 462,
                          ),
                          2 => 
                          array (
                            'key' => 'Indestructible',
                            'value' => 463,
                          ),
                          3 => 
                          array (
                            'key' => 'Long-lasting',
                            'value' => 464,
                          ),
                          4 => 
                          array (
                            'key' => 'Absolutely neutral to taste and odour',
                            'value' => 465,
                          ),
                          5 => 
                          array (
                            'key' => 'Highly flexible',
                            'value' => 466,
                          ),
                          6 => 
                          array (
                            'key' => 'Easy to handle',
                            'value' => 467,
                          ),
                          7 => 
                          array (
                            'key' => 'Vacuum stable',
                            'value' => 468,
                          ),
                          8 => 
                          array (
                            'key' => 'Temperature-restistant',
                            'value' => 469,
                          ),
                          9 => 
                          array (
                            'key' => 'Lightweight',
                            'value' => 470,
                          ),
                          10 => 
                          array (
                            'key' => 'Kink-resistant',
                            'value' => 471,
                          ),
                          11 => 
                          array (
                            'key' => 'Heat-resistant',
                            'value' => 472,
                          ),
                          12 => 
                          array (
                            'key' => 'High-performance',
                            'value' => 473,
                          ),
                          13 => 
                          array (
                            'key' => 'Cold-elastic',
                            'value' => 474,
                          ),
                          14 => 
                          array (
                            'key' => 'Extremely durable',
                            'value' => 475,
                          ),
                          15 => 
                          array (
                            'key' => 'High functionality',
                            'value' => 476,
                          ),
                          16 => 
                          array (
                            'key' => 'Free of twists',
                            'value' => 477,
                          ),
                          17 => 
                          array (
                            'key' => 'Can be cleaned by CIP installations',
                            'value' => 478,
                          ),
                          18 => 
                          array (
                            'key' => 'Dimensionally stable',
                            'value' => 479,
                          ),
                          19 => 
                          array (
                            'key' => 'Can be overrun (except construction with steel wire helix)',
                            'value' => 480,
                          ),
                          20 => 
                          array (
                            'key' => '2 years warranty',
                            'value' => 481,
                          ),
                          21 => 
                          array (
                            'key' => 'Ageing resistant',
                            'value' => 482,
                          ),
                          22 => 
                          array (
                            'key' => 'Resistant to commonly used cleaning and disinfecting products',
                            'value' => 483,
                          ),
                          23 => 
                          array (
                            'key' => 'Recommended fittings system PAGUFIX®',
                            'value' => 484,
                          ),
                          24 => 
                          array (
                            'key' => 'Suitable for pure alcohol up to 100%',
                            'value' => 485,
                          ),
                          25 => 
                          array (
                            'key' => 'Release agent- and fat free, free from product harmful to lacquer',
                            'value' => 486,
                          ),
                          26 => 
                          array (
                            'key' => '5 years warranty',
                            'value' => 489,
                          ),
                          27 => 
                          array (
                            'key' => 'Up to DN 25 release agent- and fat free, free from product harmful to lacquer',
                            'value' => 490,
                          ),
                          28 => 
                          array (
                            'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω/line',
                            'value' => 491,
                          ),
                          29 => 
                          array (
                            'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω/m',
                            'value' => 492,
                          ),
                          30 => 
                          array (
                            'key' => 'Electrically conductive, 10<sup>3</sup> Ω < R < 10<sup>8</sup> Ω ',
                            'value' => 493,
                          ),
                          31 => 
                          array (
                            'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω',
                            'value' => 494,
                          ),
                          32 => 
                          array (
                            'key' => 'Suitable for all wellknown brands',
                            'value' => 495,
                          ),
                        ),
                         'width' => 300,
                         'defaultValue' => '',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'propertiesGeneral',
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'dynamicOptions' => false,
                         'name' => 'propertiesInnerLayer',
                         'title' => 'Properties',
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
                     'icon' => '',
                  )),
                ),
                 'locked' => false,
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                 'fieldtype' => 'fieldcontainer',
                 'labelWidth' => 100,
                 'layout' => 'vbox',
                 'fieldLabel' => '',
                 'name' => 'Field Container',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => '',
                 'width' => 20,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'childs' => 
                array (
                ),
                 'locked' => false,
              )),
              2 => 
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'fieldtype' => 'text',
                     'html' => 'Outer Layer',
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
                     'bodyStyle' => 'color:black;padding: 10px !important; background-color: #d4d1c9 !important;border-color: #bce8f1 !important',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                    ),
                     'locked' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 190,
                     'layout' => NULL,
                     'border' => true,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => '',
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
                            'key' => 'EPDM',
                            'value' => 370,
                          ),
                          1 => 
                          array (
                            'key' => 'NBR',
                            'value' => 371,
                          ),
                          2 => 
                          array (
                            'key' => 'NR',
                            'value' => 372,
                          ),
                          3 => 
                          array (
                            'key' => 'CR',
                            'value' => 373,
                          ),
                          4 => 
                          array (
                            'key' => 'CR-EPDM',
                            'value' => 374,
                          ),
                          5 => 
                          array (
                            'key' => 'UPE',
                            'value' => 375,
                          ),
                          6 => 
                          array (
                            'key' => 'FEP',
                            'value' => 376,
                          ),
                          7 => 
                          array (
                            'key' => 'CIIR',
                            'value' => 377,
                          ),
                          8 => 
                          array (
                            'key' => 'SBR',
                            'value' => 378,
                          ),
                          9 => 
                          array (
                            'key' => 'PA',
                            'value' => 379,
                          ),
                          10 => 
                          array (
                            'key' => 'SBR-EPDM',
                            'value' => 519,
                          ),
                          11 => 
                          array (
                            'key' => 'CSM-BR ',
                            'value' => 547,
                          ),
                          12 => 
                          array (
                            'key' => 'Spezial elastomer',
                            'value' => 560,
                          ),
                          13 => 
                          array (
                            'key' => 'AEM',
                            'value' => 590,
                          ),
                          14 => 
                          array (
                            'key' => 'CM',
                            'value' => 605,
                          ),
                          15 => 
                          array (
                            'key' => 'SBR-BR',
                            'value' => 611,
                          ),
                          16 => 
                          array (
                            'key' => 'CR-BR',
                            'value' => 1613,
                          ),
                          17 => 
                          array (
                            'key' => 'IR-BR',
                            'value' => 1615,
                          ),
                          18 => 
                          array (
                            'key' => 'SBR-NR',
                            'value' => 2619,
                          ),
                          19 => 
                          array (
                            'key' => 'Synthetic rubber',
                            'value' => 2623,
                          ),
                          20 => 
                          array (
                            'key' => 'CPE',
                            'value' => 2629,
                          ),
                          21 => 
                          array (
                            'key' => 'CMD',
                            'value' => 2643,
                          ),
                          22 => 
                          array (
                            'key' => 'PES',
                            'value' => 2654,
                          ),
                          23 => 
                          array (
                            'key' => 'CSM',
                            'value' => 2688,
                          ),
                          24 => 
                          array (
                            'key' => 'ECO',
                            'value' => 2696,
                          ),
                          25 => 
                          array (
                            'key' => 'CO',
                            'value' => 2698,
                          ),
                          26 => 
                          array (
                            'key' => 'NBR-PVC',
                            'value' => 2722,
                          ),
                        ),
                         'width' => 300,
                         'defaultValue' => '',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'cover',
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'dynamicOptions' => false,
                         'name' => 'CoverOuterLayer',
                         'title' => 'Cover',
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
                          0 => 
                          array (
                            'key' => 'blue',
                            'value' => 452,
                          ),
                          1 => 
                          array (
                            'key' => 'grey',
                            'value' => 453,
                          ),
                          2 => 
                          array (
                            'key' => 'bright',
                            'value' => 454,
                          ),
                          3 => 
                          array (
                            'key' => 'orange',
                            'value' => 455,
                          ),
                          4 => 
                          array (
                            'key' => 'red',
                            'value' => 456,
                          ),
                          5 => 
                          array (
                            'key' => 'black',
                            'value' => 457,
                          ),
                          6 => 
                          array (
                            'key' => 'transparent',
                            'value' => 458,
                          ),
                          7 => 
                          array (
                            'key' => 'white',
                            'value' => 459,
                          ),
                          8 => 
                          array (
                            'key' => 'red-orange',
                            'value' => 545,
                          ),
                          9 => 
                          array (
                            'key' => 'blue and red',
                            'value' => 549,
                          ),
                        ),
                         'width' => 300,
                         'defaultValue' => '',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'colorOut',
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'dynamicOptions' => false,
                         'name' => 'ColorOuterLayer',
                         'title' => 'Color',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'fieldtype' => 'select',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'fabric patterned',
                            'value' => 386,
                          ),
                          1 => 
                          array (
                            'key' => 'smooth',
                            'value' => 387,
                          ),
                          2 => 
                          array (
                            'key' => 'strongly corrugated',
                            'value' => 520,
                          ),
                          3 => 
                          array (
                            'key' => 'grooved',
                            'value' => 591,
                          ),
                        ),
                         'width' => 300,
                         'defaultValue' => '',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'haptic',
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'dynamicOptions' => false,
                         'name' => 'Haptic',
                         'title' => 'Haptic',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'fieldtype' => 'select',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Robust',
                            'value' => 461,
                          ),
                          1 => 
                          array (
                            'key' => 'Low resistance to flow',
                            'value' => 462,
                          ),
                          2 => 
                          array (
                            'key' => 'Indestructible',
                            'value' => 463,
                          ),
                          3 => 
                          array (
                            'key' => 'Long-lasting',
                            'value' => 464,
                          ),
                          4 => 
                          array (
                            'key' => 'Absolutely neutral to taste and odour',
                            'value' => 465,
                          ),
                          5 => 
                          array (
                            'key' => 'Highly flexible',
                            'value' => 466,
                          ),
                          6 => 
                          array (
                            'key' => 'Easy to handle',
                            'value' => 467,
                          ),
                          7 => 
                          array (
                            'key' => 'Vacuum stable',
                            'value' => 468,
                          ),
                          8 => 
                          array (
                            'key' => 'Temperature-restistant',
                            'value' => 469,
                          ),
                          9 => 
                          array (
                            'key' => 'Lightweight',
                            'value' => 470,
                          ),
                          10 => 
                          array (
                            'key' => 'Kink-resistant',
                            'value' => 471,
                          ),
                          11 => 
                          array (
                            'key' => 'Heat-resistant',
                            'value' => 472,
                          ),
                          12 => 
                          array (
                            'key' => 'High-performance',
                            'value' => 473,
                          ),
                          13 => 
                          array (
                            'key' => 'Cold-elastic',
                            'value' => 474,
                          ),
                          14 => 
                          array (
                            'key' => 'Extremely durable',
                            'value' => 475,
                          ),
                          15 => 
                          array (
                            'key' => 'High functionality',
                            'value' => 476,
                          ),
                          16 => 
                          array (
                            'key' => 'Free of twists',
                            'value' => 477,
                          ),
                          17 => 
                          array (
                            'key' => 'Can be cleaned by CIP installations',
                            'value' => 478,
                          ),
                          18 => 
                          array (
                            'key' => 'Dimensionally stable',
                            'value' => 479,
                          ),
                          19 => 
                          array (
                            'key' => 'Can be overrun (except construction with steel wire helix)',
                            'value' => 480,
                          ),
                          20 => 
                          array (
                            'key' => '2 years warranty',
                            'value' => 481,
                          ),
                          21 => 
                          array (
                            'key' => 'Ageing resistant',
                            'value' => 482,
                          ),
                          22 => 
                          array (
                            'key' => 'Resistant to commonly used cleaning and disinfecting products',
                            'value' => 483,
                          ),
                          23 => 
                          array (
                            'key' => 'Recommended fittings system PAGUFIX®',
                            'value' => 484,
                          ),
                          24 => 
                          array (
                            'key' => 'Suitable for pure alcohol up to 100%',
                            'value' => 485,
                          ),
                          25 => 
                          array (
                            'key' => 'Release agent- and fat free, free from product harmful to lacquer',
                            'value' => 486,
                          ),
                          26 => 
                          array (
                            'key' => '5 years warranty',
                            'value' => 489,
                          ),
                          27 => 
                          array (
                            'key' => 'Up to DN 25 release agent- and fat free, free from product harmful to lacquer',
                            'value' => 490,
                          ),
                          28 => 
                          array (
                            'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω/line',
                            'value' => 491,
                          ),
                          29 => 
                          array (
                            'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω/m',
                            'value' => 492,
                          ),
                          30 => 
                          array (
                            'key' => 'Electrically conductive, 10<sup>3</sup> Ω < R < 10<sup>8</sup> Ω ',
                            'value' => 493,
                          ),
                          31 => 
                          array (
                            'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω',
                            'value' => 494,
                          ),
                          32 => 
                          array (
                            'key' => 'Suitable for all wellknown brands',
                            'value' => 495,
                          ),
                        ),
                         'width' => 300,
                         'defaultValue' => '',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'propertiesGeneral',
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'dynamicOptions' => false,
                         'name' => 'PropertiesOuterLayer',
                         'title' => 'Properties',
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
                     'icon' => '',
                  )),
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
          )),
          2 => 
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'fieldtype' => 'text',
                     'html' => 'Fields of applications',
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
                     'bodyStyle' => 'color:black;padding: 10px !important; background-color: #d4d1c9 !important;border-color: #bce8f1 !important',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                    ),
                     'locked' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 190,
                     'layout' => NULL,
                     'border' => true,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => '',
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
                            'key' => 'Foodstuff industry',
                            'value' => 1,
                          ),
                          1 => 
                          array (
                            'key' => 'Beverage industry',
                            'value' => 2,
                          ),
                          2 => 
                          array (
                            'key' => 'Camping and caravanning',
                            'value' => 3,
                          ),
                          3 => 
                          array (
                            'key' => 'Commercial kitchens',
                            'value' => 4,
                          ),
                          4 => 
                          array (
                            'key' => 'Municipal emergency water supply',
                            'value' => 5,
                          ),
                          5 => 
                          array (
                            'key' => 'Outdoor events',
                            'value' => 6,
                          ),
                          6 => 
                          array (
                            'key' => 'Construction industry',
                            'value' => 7,
                          ),
                          7 => 
                          array (
                            'key' => 'Open land',
                            'value' => 8,
                          ),
                          8 => 
                          array (
                            'key' => 'Metal surface treatment',
                            'value' => 9,
                          ),
                          9 => 
                          array (
                            'key' => 'General industry',
                            'value' => 10,
                          ),
                          10 => 
                          array (
                            'key' => 'Over- and underground workings',
                            'value' => 11,
                          ),
                          11 => 
                          array (
                            'key' => 'Municipal enterprises',
                            'value' => 12,
                          ),
                          12 => 
                          array (
                            'key' => 'Agricultural sector',
                            'value' => 13,
                          ),
                          13 => 
                          array (
                            'key' => 'Industry',
                            'value' => 14,
                          ),
                          14 => 
                          array (
                            'key' => 'Fleets',
                            'value' => 15,
                          ),
                          15 => 
                          array (
                            'key' => 'Garages',
                            'value' => 16,
                          ),
                          16 => 
                          array (
                            'key' => 'Workshops',
                            'value' => 17,
                          ),
                          17 => 
                          array (
                            'key' => 'Landscaping and gardening',
                            'value' => 18,
                          ),
                          18 => 
                          array (
                            'key' => 'Mobile or stationary hose lines',
                            'value' => 19,
                          ),
                          19 => 
                          array (
                            'key' => 'Commercial washing machines and dishwashers',
                            'value' => 20,
                          ),
                          20 => 
                          array (
                            'key' => 'Private Area',
                            'value' => 21,
                          ),
                          21 => 
                          array (
                            'key' => 'Railway industry',
                            'value' => 22,
                          ),
                          22 => 
                          array (
                            'key' => 'White goods industry',
                            'value' => 23,
                          ),
                          23 => 
                          array (
                            'key' => 'Shipyards',
                            'value' => 24,
                          ),
                          24 => 
                          array (
                            'key' => 'Yacht construction',
                            'value' => 25,
                          ),
                          25 => 
                          array (
                            'key' => 'Machinery and plant engineering',
                            'value' => 26,
                          ),
                          26 => 
                          array (
                            'key' => 'Cooling systems in combustion engines',
                            'value' => 27,
                          ),
                          27 => 
                          array (
                            'key' => 'Cooling and heating systems',
                            'value' => 28,
                          ),
                          28 => 
                          array (
                            'key' => 'Passenger and commercial vehicles',
                            'value' => 29,
                          ),
                          29 => 
                          array (
                            'key' => 'Mining industry',
                            'value' => 30,
                          ),
                          30 => 
                          array (
                            'key' => 'Public festivals',
                            'value' => 31,
                          ),
                          31 => 
                          array (
                            'key' => 'Weekly, Christmas and fair markets',
                            'value' => 32,
                          ),
                          32 => 
                          array (
                            'key' => 'Furnaces',
                            'value' => 33,
                          ),
                          33 => 
                          array (
                            'key' => 'Ex zones',
                            'value' => 34,
                          ),
                          34 => 
                          array (
                            'key' => 'Breweries',
                            'value' => 35,
                          ),
                          35 => 
                          array (
                            'key' => 'Distillereies',
                            'value' => 36,
                          ),
                          36 => 
                          array (
                            'key' => 'Wine press houses',
                            'value' => 37,
                          ),
                          37 => 
                          array (
                            'key' => 'Filling machines',
                            'value' => 38,
                          ),
                          38 => 
                          array (
                            'key' => 'Other installations in the brewing, beverage and spirits industry',
                            'value' => 39,
                          ),
                          39 => 
                          array (
                            'key' => 'Foodstuffs companies',
                            'value' => 40,
                          ),
                          40 => 
                          array (
                            'key' => 'Pharmaceutical and cosmetic industry',
                            'value' => 42,
                          ),
                          41 => 
                          array (
                            'key' => 'Dairies',
                            'value' => 43,
                          ),
                          42 => 
                          array (
                            'key' => 'Cheese dairies',
                            'value' => 44,
                          ),
                          43 => 
                          array (
                            'key' => 'Margarine factories',
                            'value' => 45,
                          ),
                          44 => 
                          array (
                            'key' => 'Fish processing',
                            'value' => 46,
                          ),
                          45 => 
                          array (
                            'key' => 'Abattoirs',
                            'value' => 47,
                          ),
                          46 => 
                          array (
                            'key' => 'Oil mills',
                            'value' => 48,
                          ),
                          47 => 
                          array (
                            'key' => 'Rendering plants',
                            'value' => 49,
                          ),
                          48 => 
                          array (
                            'key' => 'Large-scale butcheries',
                            'value' => 50,
                          ),
                          49 => 
                          array (
                            'key' => 'Jam factories',
                            'value' => 51,
                          ),
                          50 => 
                          array (
                            'key' => 'Milk collection vehicles',
                            'value' => 52,
                          ),
                          51 => 
                          array (
                            'key' => 'Chemical and petrochemical industry',
                            'value' => 53,
                          ),
                          52 => 
                          array (
                            'key' => 'Horticultural companies',
                            'value' => 54,
                          ),
                          53 => 
                          array (
                            'key' => 'Refineries',
                            'value' => 55,
                          ),
                          54 => 
                          array (
                            'key' => 'Shipping industry',
                            'value' => 56,
                          ),
                          55 => 
                          array (
                            'key' => 'Silo vehicles',
                            'value' => 57,
                          ),
                          56 => 
                          array (
                            'key' => 'Quarry',
                            'value' => 58,
                          ),
                          57 => 
                          array (
                            'key' => 'Compressed air and compressor manufacturers',
                            'value' => 59,
                          ),
                          58 => 
                          array (
                            'key' => 'Steel and iron industry',
                            'value' => 60,
                          ),
                          59 => 
                          array (
                            'key' => 'Petrol stations',
                            'value' => 61,
                          ),
                          60 => 
                          array (
                            'key' => 'Largescale garages',
                            'value' => 62,
                          ),
                          61 => 
                          array (
                            'key' => 'Field of compressed air handling',
                            'value' => 63,
                          ),
                          62 => 
                          array (
                            'key' => 'Installation and heating system companies',
                            'value' => 64,
                          ),
                          63 => 
                          array (
                            'key' => 'Foundries',
                            'value' => 65,
                          ),
                          64 => 
                          array (
                            'key' => 'Construction of bridges',
                            'value' => 66,
                          ),
                          65 => 
                          array (
                            'key' => 'Welding shops',
                            'value' => 67,
                          ),
                          66 => 
                          array (
                            'key' => 'Manufacturers of welding apparatus',
                            'value' => 68,
                          ),
                          67 => 
                          array (
                            'key' => 'Steel construction',
                            'value' => 69,
                          ),
                          68 => 
                          array (
                            'key' => 'Automobile industry',
                            'value' => 70,
                          ),
                          69 => 
                          array (
                            'key' => 'Welding and brazing machines',
                            'value' => 71,
                          ),
                          70 => 
                          array (
                            'key' => 'Pressure controlled gas units',
                            'value' => 72,
                          ),
                          71 => 
                          array (
                            'key' => 'Mushroom heaters, grills, flame weeding devices',
                            'value' => 73,
                          ),
                          72 => 
                          array (
                            'key' => 'Forestry',
                            'value' => 74,
                          ),
                          73 => 
                          array (
                            'key' => 'Mineral oil industry',
                            'value' => 75,
                          ),
                          74 => 
                          array (
                            'key' => 'Buliding cleaning services',
                            'value' => 76,
                          ),
                          75 => 
                          array (
                            'key' => 'Processing of metal surfaces',
                            'value' => 77,
                          ),
                          76 => 
                          array (
                            'key' => 'Iron foundries',
                            'value' => 78,
                          ),
                          77 => 
                          array (
                            'key' => 'Cement plants',
                            'value' => 80,
                          ),
                          78 => 
                          array (
                            'key' => 'Cement silo trucks',
                            'value' => 81,
                          ),
                          79 => 
                          array (
                            'key' => 'Buliding material stores',
                            'value' => 82,
                          ),
                          80 => 
                          array (
                            'key' => 'Forwarding agents',
                            'value' => 83,
                          ),
                          81 => 
                          array (
                            'key' => 'Flue gas desulphurisation plants',
                            'value' => 84,
                          ),
                          82 => 
                          array (
                            'key' => 'Dry ice blasting machines',
                            'value' => 85,
                          ),
                          83 => 
                          array (
                            'key' => 'Sewer cleaning vehicles',
                            'value' => 86,
                          ),
                          84 => 
                          array (
                            'key' => 'Forklift trucks',
                            'value' => 87,
                          ),
                          85 => 
                          array (
                            'key' => 'Gravel plants',
                            'value' => 88,
                          ),
                          86 => 
                          array (
                            'key' => 'Gravel works',
                            'value' => 89,
                          ),
                          87 => 
                          array (
                            'key' => 'Offshore technology',
                            'value' => 90,
                          ),
                          88 => 
                          array (
                            'key' => 'Material handling',
                            'value' => 91,
                          ),
                          89 => 
                          array (
                            'key' => 'Large tank units',
                            'value' => 92,
                          ),
                          90 => 
                          array (
                            'key' => 'Iron and steel industry',
                            'value' => 93,
                          ),
                          91 => 
                          array (
                            'key' => 'Ground moving machines',
                            'value' => 94,
                          ),
                          92 => 
                          array (
                            'key' => 'Lifting platforms',
                            'value' => 95,
                          ),
                          93 => 
                          array (
                            'key' => 'Excavators',
                            'value' => 96,
                          ),
                          94 => 
                          array (
                            'key' => 'Agriculture machines',
                            'value' => 97,
                          ),
                          95 => 
                          array (
                            'key' => 'Lubricating oil circuit',
                            'value' => 98,
                          ),
                          96 => 
                          array (
                            'key' => 'Cooling and compressed air systems',
                            'value' => 99,
                          ),
                          97 => 
                          array (
                            'key' => 'Diesel fuel pipes',
                            'value' => 100,
                          ),
                          98 => 
                          array (
                            'key' => 'Road construction',
                            'value' => 101,
                          ),
                          99 => 
                          array (
                            'key' => 'Oil coolers',
                            'value' => 102,
                          ),
                          100 => 
                          array (
                            'key' => 'Lubricants, Hydraulik and Compressed air systems',
                            'value' => 103,
                          ),
                          101 => 
                          array (
                            'key' => 'Railroad cars',
                            'value' => 104,
                          ),
                          102 => 
                          array (
                            'key' => 'Fire extinguisher',
                            'value' => 105,
                          ),
                          103 => 
                          array (
                            'key' => 'Coating companies',
                            'value' => 106,
                          ),
                          104 => 
                          array (
                            'key' => 'Aircrafts',
                            'value' => 107,
                          ),
                          105 => 
                          array (
                            'key' => 'Harbours',
                            'value' => 108,
                          ),
                          106 => 
                          array (
                            'key' => 'UV systems',
                            'value' => 109,
                          ),
                          107 => 
                          array (
                            'key' => 'Kompressors',
                            'value' => 110,
                          ),
                          108 => 
                          array (
                            'key' => 'Turbocharger systems and exhaust flap controls',
                            'value' => 111,
                          ),
                          109 => 
                          array (
                            'key' => 'Channels',
                            'value' => 112,
                          ),
                          110 => 
                          array (
                            'key' => 'Tank ships',
                            'value' => 113,
                          ),
                          111 => 
                          array (
                            'key' => 'Breathing apparatus',
                            'value' => 114,
                          ),
                          112 => 
                          array (
                            'key' => 'Light diving equipment',
                            'value' => 115,
                          ),
                          113 => 
                          array (
                            'key' => 'Tank trucks',
                            'value' => 116,
                          ),
                          114 => 
                          array (
                            'key' => 'Truck brake systems',
                            'value' => 117,
                          ),
                          115 => 
                          array (
                            'key' => 'Agriculture',
                            'value' => 223,
                          ),
                          116 => 
                          array (
                            'key' => 'Construction machines',
                            'value' => 224,
                          ),
                          117 => 
                          array (
                            'key' => 'Engines',
                            'value' => 225,
                          ),
                          118 => 
                          array (
                            'key' => 'Bakeries',
                            'value' => 226,
                          ),
                          119 => 
                          array (
                            'key' => 'Painting companies',
                            'value' => 227,
                          ),
                          120 => 
                          array (
                            'key' => 'Butchers',
                            'value' => 228,
                          ),
                          121 => 
                          array (
                            'key' => 'Potable water storage tanks',
                            'value' => 229,
                          ),
                          122 => 
                          array (
                            'key' => 'Aviation Refueling',
                            'value' => 230,
                          ),
                          123 => 
                          array (
                            'key' => 'Low Temperature Areas',
                            'value' => 231,
                          ),
                          124 => 
                          array (
                            'key' => 'Ground Support Operations',
                            'value' => 232,
                          ),
                          125 => 
                          array (
                            'key' => 'Fuel Handling – Defueling & Refueling',
                            'value' => 233,
                          ),
                          126 => 
                          array (
                            'key' => 'Civil & Military',
                            'value' => 234,
                          ),
                          127 => 
                          array (
                            'key' => 'Low-pressure-applications',
                            'value' => 235,
                          ),
                          128 => 
                          array (
                            'key' => 'Oil coolers, lubricants and compressed air systems',
                            'value' => 236,
                          ),
                          129 => 
                          array (
                            'key' => 'Power-steering and lubricant systems',
                            'value' => 237,
                          ),
                          130 => 
                          array (
                            'key' => 'Milk processing industry',
                            'value' => 238,
                          ),
                          131 => 
                          array (
                            'key' => 'Convenience food industry',
                            'value' => 239,
                          ),
                          132 => 
                          array (
                            'key' => 'Industrial processing of flavorings, seasonings, gourmet food, fruit juices, lemonades & confectionery',
                            'value' => 240,
                          ),
                          133 => 
                          array (
                            'key' => 'Concrete and soild pumps',
                            'value' => 241,
                          ),
                          134 => 
                          array (
                            'key' => 'Disaster control, hospitals, airports',
                            'value' => 242,
                          ),
                          135 => 
                          array (
                            'key' => 'Catering',
                            'value' => 243,
                          ),
                          136 => 
                          array (
                            'key' => 'Milk reception',
                            'value' => 244,
                          ),
                          137 => 
                          array (
                            'key' => 'General offshore applications',
                            'value' => 1241,
                          ),
                          138 => 
                          array (
                            'key' => 'For transport of milk (for example teat hoses) and potable water according to KTW and DVGW W270',
                            'value' => 1244,
                          ),
                          139 => 
                          array (
                            'key' => 'Application as windscreen washer hose, air control hose, protective hose',
                            'value' => 1245,
                          ),
                          140 => 
                          array (
                            'key' => 'Tank truck',
                            'value' => 1246,
                          ),
                          141 => 
                          array (
                            'key' => 'Oil handling',
                            'value' => 2242,
                          ),
                          142 => 
                          array (
                            'key' => 'Bulk material handling',
                            'value' => 2243,
                          ),
                          143 => 
                          array (
                            'key' => 'Plastics production ',
                            'value' => 2244,
                          ),
                          144 => 
                          array (
                            'key' => 'For powders and granulates, for media such as: Cement, Sand, Coal dust, Micro Silica, Fly Ash, Limestone filler, Aluminium Oxide, Plastic Granulates, Industrial Waste',
                            'value' => 2245,
                          ),
                          145 => 
                          array (
                            'key' => 'High pressure hydraulic applications',
                            'value' => 2246,
                          ),
                          146 => 
                          array (
                            'key' => 'Constant pressure applications',
                            'value' => 2247,
                          ),
                          147 => 
                          array (
                            'key' => 'Medium pressure hydraulic applications',
                            'value' => 2248,
                          ),
                          148 => 
                          array (
                            'key' => 'Oil and chemicals processing industry',
                            'value' => 2249,
                          ),
                          149 => 
                          array (
                            'key' => 'Industrial processing of oil-, grease- and fruit-based substances',
                            'value' => 2250,
                          ),
                          150 => 
                          array (
                            'key' => 'Distilleries ',
                            'value' => 2251,
                          ),
                          151 => 
                          array (
                            'key' => 'Sewage Treatment Plants',
                            'value' => 2252,
                          ),
                          152 => 
                          array (
                            'key' => 'Powerplants',
                            'value' => 2253,
                          ),
                          153 => 
                          array (
                            'key' => 'Chemical industry',
                            'value' => 2254,
                          ),
                          154 => 
                          array (
                            'key' => 'Hydraulic and pneumatic applications',
                            'value' => 2255,
                          ),
                          155 => 
                          array (
                            'key' => 'Hydraulic applications',
                            'value' => 2256,
                          ),
                          156 => 
                          array (
                            'key' => 'High Power Cable',
                            'value' => 2257,
                          ),
                          157 => 
                          array (
                            'key' => 'Electric stove',
                            'value' => 2258,
                          ),
                          158 => 
                          array (
                            'key' => 'Heavy duty applications',
                            'value' => 2259,
                          ),
                          159 => 
                          array (
                            'key' => 'Air conditioners',
                            'value' => 2261,
                          ),
                          160 => 
                          array (
                            'key' => 'Powder material handling',
                            'value' => 2262,
                          ),
                          161 => 
                          array (
                            'key' => 'Conveying of powdered material (grain size ≤3mm)',
                            'value' => 2263,
                          ),
                          162 => 
                          array (
                            'key' => 'Gardening',
                            'value' => 2264,
                          ),
                          163 => 
                          array (
                            'key' => 'Building',
                            'value' => 2265,
                          ),
                          164 => 
                          array (
                            'key' => 'Nautical',
                            'value' => 2266,
                          ),
                          165 => 
                          array (
                            'key' => 'Transports',
                            'value' => 2267,
                          ),
                          166 => 
                          array (
                            'key' => 'House',
                            'value' => 2268,
                          ),
                          167 => 
                          array (
                            'key' => 'Not suitable for gasoline fuels',
                            'value' => 2269,
                          ),
                          168 => 
                          array (
                            'key' => 'Transport of all motor vehicle fuels',
                            'value' => 2270,
                          ),
                          169 => 
                          array (
                            'key' => 'In rail vehicles for cooling water and cooling brines, heating systems, roof drainage and drainage of condensation water',
                            'value' => 2271,
                          ),
                          170 => 
                          array (
                            'key' => 'Connecting hose of the main compressed air line between railway wagons and locomotive',
                            'value' => 2272,
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => 10,
                         'renderType' => 'tags',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\ApplicationsOptionsProvider',
                         'optionsProviderData' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
                         'dynamicOptions' => false,
                         'name' => 'FieldsOfApplication',
                         'title' => 'Fields Of Application',
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
                ),
                 'locked' => false,
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                 'fieldtype' => 'fieldcontainer',
                 'labelWidth' => 100,
                 'layout' => 'vbox',
                 'fieldLabel' => '',
                 'name' => 'Field Container',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => '',
                 'width' => 20,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'childs' => 
                array (
                ),
                 'locked' => false,
              )),
              2 => 
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                     'fieldtype' => 'text',
                     'html' => 'Flow Medium',
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
                     'bodyStyle' => 'color:black;padding: 10px !important; background-color: #d4d1c9 !important;border-color: #bce8f1 !important',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                    ),
                     'locked' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 190,
                     'layout' => NULL,
                     'border' => true,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => '',
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
                         'width' => 300,
                         'height' => '',
                         'maxItems' => 10,
                         'renderType' => 'tags',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\FlowMediumOptionsProvider',
                         'optionsProviderData' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
                         'dynamicOptions' => false,
                         'name' => 'flowMedium',
                         'title' => 'Flow Medium',
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
    ),
     'locked' => false,
     'icon' => NULL,
  )),
));
