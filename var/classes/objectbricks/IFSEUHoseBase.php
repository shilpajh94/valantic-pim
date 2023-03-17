<?php 

/** 
* Generated at: 2023-03-17T10:58:44+05:30
* IP: 127.0.0.1


Fields Summary: 
- staticWire [booleanSelect]
- staticWireType [select]
- tubeCharacteristic [select]
- hoseIdDec [numeric]
- hoseIdMM [numeric]
- Note2BelowTable [input]
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
                    ),
                     'width' => 300,
                     'defaultValue' => '',
                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                     'optionsProviderData' => 'tubecharacteristic',
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
                     'decimalPrecision' => NULL,
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
                     'decimalPrecision' => NULL,
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
                     'defaultValueGenerator' => '',
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
                     'decimalPrecision' => NULL,
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
                          0 => 
                          array (
                            'key' => 'Synthetic fibres',
                            'value' => 366,
                          ),
                          1 => 
                          array (
                            'key' => 'Aramid',
                            'value' => 367,
                          ),
                          2 => 
                          array (
                            'key' => '2 galvanized reinforcements',
                            'value' => 514,
                          ),
                          3 => 
                          array (
                            'key' => 'Synthetic corded plies',
                            'value' => 515,
                          ),
                          4 => 
                          array (
                            'key' => 'Textile reinforcement with 2 embedded Cu-wires',
                            'value' => 567,
                          ),
                          5 => 
                          array (
                            'key' => 'high tension steel wire',
                            'value' => 575,
                          ),
                          6 => 
                          array (
                            'key' => 'Synthetic yarns with steel wire braid',
                            'value' => 609,
                          ),
                          7 => 
                          array (
                            'key' => '4 alternating layers of spiraled high-tensile wire',
                            'value' => 2627,
                          ),
                          8 => 
                          array (
                            'key' => 'Steel wire braids with embedded additional weights',
                            'value' => 2636,
                          ),
                          9 => 
                          array (
                            'key' => 'PPS',
                            'value' => 2658,
                          ),
                          10 => 
                          array (
                            'key' => 'CMD',
                            'value' => 2695,
                          ),
                          11 => 
                          array (
                            'key' => 'CO',
                            'value' => 2697,
                          ),
                          12 => 
                          array (
                            'key' => 'Synthetic yarns, rubberised, black, optionally with embedded steel wire spiral',
                            'value' => 2705,
                          ),
                          13 => 
                          array (
                            'key' => 'Steel cord layers',
                            'value' => 2721,
                          ),
                          14 => 
                          array (
                            'key' => 'Stainless steel braids (1.4401), glass fibre braids and elastomer interlayers',
                            'value' => 2732,
                          ),
                        ),
                         'width' => 300,
                         'defaultValue' => '',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'reinforcements',
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
                            'key' => 'homogenous',
                            'value' => 360,
                          ),
                          1 => 
                          array (
                            'key' => 'smooth',
                            'value' => 361,
                          ),
                          2 => 
                          array (
                            'key' => 'non-porous',
                            'value' => 362,
                          ),
                          3 => 
                          array (
                            'key' => 'plasticizer-free',
                            'value' => 363,
                          ),
                          4 => 
                          array (
                            'key' => 'high-performing',
                            'value' => 364,
                          ),
                          5 => 
                          array (
                            'key' => 'anti-adhesive',
                            'value' => 365,
                          ),
                          6 => 
                          array (
                            'key' => 'highly abrasion resisitant ',
                            'value' => 516,
                          ),
                          7 => 
                          array (
                            'key' => 'impermeable',
                            'value' => 517,
                          ),
                          8 => 
                          array (
                            'key' => 'seamless',
                            'value' => 518,
                          ),
                          9 => 
                          array (
                            'key' => 'electrically noncondctive',
                            'value' => 530,
                          ),
                          10 => 
                          array (
                            'key' => 'meets FDA (21 CFR 177.1550) and USP CLASS VI',
                            'value' => 533,
                          ),
                          11 => 
                          array (
                            'key' => 'absolutely neutral to taste and odour',
                            'value' => 538,
                          ),
                          12 => 
                          array (
                            'key' => 'according to recommendation XXI, cat. 2 of BfR',
                            'value' => 557,
                          ),
                          13 => 
                          array (
                            'key' => 'according to FDA (21 CFR 177.2600)',
                            'value' => 559,
                          ),
                          14 => 
                          array (
                            'key' => 'resistant to oil and fats',
                            'value' => 572,
                          ),
                          15 => 
                          array (
                            'key' => ' with Conti Orange Wear Indicator',
                            'value' => 578,
                          ),
                          16 => 
                          array (
                            'key' => 'with black coiled OHM conductive stripe',
                            'value' => 584,
                          ),
                          17 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω/m',
                            'value' => 588,
                          ),
                          18 => 
                          array (
                            'key' => 'highly abrasion resistant (acc. to DIN ISO 4649-A: <60mm³)',
                            'value' => 613,
                          ),
                          19 => 
                          array (
                            'key' => 'no fuel solubility',
                            'value' => 1643,
                          ),
                          20 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω',
                            'value' => 2668,
                          ),
                          21 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>9</sup> Ω/m',
                            'value' => 2711,
                          ),
                          22 => 
                          array (
                            'key' => 'electrically insulating, R > 10<sup>9</sup> Ω/m',
                            'value' => 2712,
                          ),
                          23 => 
                          array (
                            'key' => 'according to FDA ',
                            'value' => 2729,
                          ),
                          24 => 
                          array (
                            'key' => 'almost odourless',
                            'value' => 2737,
                          ),
                          25 => 
                          array (
                            'key' => 'Partial lining with special fleece and fluidisation channels underneath (max. 2 bar)',
                            'value' => 2753,
                          ),
                          26 => 
                          array (
                            'key' => 'extruded',
                            'value' => 2778,
                          ),
                          27 => 
                          array (
                            'key' => 'can be detected magnetically or by X-rays',
                            'value' => 2798,
                          ),
                        ),
                         'width' => 300,
                         'defaultValue' => '',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'propertiesInn',
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
                            'key' => 'abrasion resistant',
                            'value' => 388,
                          ),
                          1 => 
                          array (
                            'key' => 'resistant to ozone, weather and UV',
                            'value' => 389,
                          ),
                          2 => 
                          array (
                            'key' => 'resistant to oil and fats',
                            'value' => 390,
                          ),
                          3 => 
                          array (
                            'key' => 'resistant to excrements',
                            'value' => 391,
                          ),
                          4 => 
                          array (
                            'key' => 'chemical-resistant',
                            'value' => 392,
                          ),
                          5 => 
                          array (
                            'key' => 'resistant to fats',
                            'value' => 521,
                          ),
                          6 => 
                          array (
                            'key' => 'from DN 28 upward fabric patterned',
                            'value' => 522,
                          ),
                          7 => 
                          array (
                            'key' => 'from DN 28 upward CR-cover (fabric patterned)',
                            'value' => 523,
                          ),
                          8 => 
                          array (
                            'key' => 'wear-resisitant',
                            'value' => 524,
                          ),
                          9 => 
                          array (
                            'key' => 'flame resistant',
                            'value' => 532,
                          ),
                          10 => 
                          array (
                            'key' => 'from DN 32 upward CR-cover (fabric patterned)',
                            'value' => 542,
                          ),
                          11 => 
                          array (
                            'key' => 'from DN 32 upward fabric patterned',
                            'value' => 546,
                          ),
                          12 => 
                          array (
                            'key' => 'resistant to process water and oily air',
                            'value' => 551,
                          ),
                          13 => 
                          array (
                            'key' => 'resistant to short influence of oil and chemicals',
                            'value' => 555,
                          ),
                          14 => 
                          array (
                            'key' => 'ageing resistant',
                            'value' => 558,
                          ),
                          15 => 
                          array (
                            'key' => 'with black coiled OHM conductive stripe',
                            'value' => 583,
                          ),
                          16 => 
                          array (
                            'key' => 'from DN 25 upward fabric patterned',
                            'value' => 610,
                          ),
                          17 => 
                          array (
                            'key' => 'hydrocarbon resistant',
                            'value' => 1614,
                          ),
                          18 => 
                          array (
                            'key' => 'electrically conductive',
                            'value' => 1646,
                          ),
                          19 => 
                          array (
                            'key' => 'flame-resistant (MSHA compliant)',
                            'value' => 2624,
                          ),
                          20 => 
                          array (
                            'key' => 'resistant to chicken and fish fat',
                            'value' => 2641,
                          ),
                          21 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω',
                            'value' => 2669,
                          ),
                          22 => 
                          array (
                            'key' => 'optional',
                            'value' => 2706,
                          ),
                          23 => 
                          array (
                            'key' => 'with heat protection cover',
                            'value' => 2709,
                          ),
                          24 => 
                          array (
                            'key' => 'highly abrasion resistant (acc. to DIN ISO 4649-A: <60mm³)',
                            'value' => 2710,
                          ),
                          25 => 
                          array (
                            'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω/m',
                            'value' => 2733,
                          ),
                        ),
                         'width' => 300,
                         'defaultValue' => '',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'propertiesOut',
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
                          0 => 
                          array (
                            'key' => 'Water',
                            'value' => 14701325,
                          ),
                          1 => 
                          array (
                            'key' => 'Alcohol',
                            'value' => 14701326,
                          ),
                          2 => 
                          array (
                            'key' => 'Steam',
                            'value' => 14701327,
                          ),
                          3 => 
                          array (
                            'key' => 'Granulate and powder media',
                            'value' => 14701328,
                          ),
                          4 => 
                          array (
                            'key' => 'Liquid oily and fatty foods',
                            'value' => 14701329,
                          ),
                          5 => 
                          array (
                            'key' => 'Abrasive bulk material',
                            'value' => 14701330,
                          ),
                          6 => 
                          array (
                            'key' => 'Chemicals',
                            'value' => 14701331,
                          ),
                          7 => 
                          array (
                            'key' => 'Sand Steelgrit',
                            'value' => 14701332,
                          ),
                          8 => 
                          array (
                            'key' => 'Excrements',
                            'value' => 14701333,
                          ),
                          9 => 
                          array (
                            'key' => 'Sand',
                            'value' => 14701334,
                          ),
                          10 => 
                          array (
                            'key' => 'Mineral oil and glycol-based hydraulic fluids',
                            'value' => 14701335,
                          ),
                          11 => 
                          array (
                            'key' => 'Vegetable and mineral lubricants',
                            'value' => 14701336,
                          ),
                          12 => 
                          array (
                            'key' => 'Raw oil',
                            'value' => 14701337,
                          ),
                          13 => 
                          array (
                            'key' => 'Compressed air',
                            'value' => 14701338,
                          ),
                          14 => 
                          array (
                            'key' => 'Polar and aromatic solvents ',
                            'value' => 14701339,
                          ),
                          15 => 
                          array (
                            'key' => ' Antifreeze and corrosion inhibitors',
                            'value' => 14701340,
                          ),
                          16 => 
                          array (
                            'key' => 'Fuel',
                            'value' => 14701341,
                          ),
                          17 => 
                          array (
                            'key' => 'Solvents',
                            'value' => 14701342,
                          ),
                          18 => 
                          array (
                            'key' => 'Refrigerant',
                            'value' => 14701343,
                          ),
                          19 => 
                          array (
                            'key' => 'Demineralised water',
                            'value' => 14701344,
                          ),
                          20 => 
                          array (
                            'key' => 'Lubricating oil',
                            'value' => 14701345,
                          ),
                          21 => 
                          array (
                            'key' => 'Fuels',
                            'value' => 14701346,
                          ),
                          22 => 
                          array (
                            'key' => 'Fatty and oily products',
                            'value' => 14701347,
                          ),
                          23 => 
                          array (
                            'key' => 'Diesel fuel',
                            'value' => 14701348,
                          ),
                          24 => 
                          array (
                            'key' => 'Cooling water',
                            'value' => 14701349,
                          ),
                          25 => 
                          array (
                            'key' => 'Fuel gases mixed with fluxes and oxygen',
                            'value' => 14701350,
                          ),
                          26 => 
                          array (
                            'key' => 'Treated and non-treated cooling water',
                            'value' => 14701351,
                          ),
                          27 => 
                          array (
                            'key' => 'Paints',
                            'value' => 14701352,
                          ),
                          28 => 
                          array (
                            'key' => 'Oxygen',
                            'value' => 14701353,
                          ),
                          29 => 
                          array (
                            'key' => 'Ultrapure water',
                            'value' => 14701354,
                          ),
                          30 => 
                          array (
                            'key' => 'Condensation',
                            'value' => 14701355,
                          ),
                          31 => 
                          array (
                            'key' => 'Sewage',
                            'value' => 14701356,
                          ),
                          32 => 
                          array (
                            'key' => 'Beer',
                            'value' => 14701357,
                          ),
                          33 => 
                          array (
                            'key' => 'Wine',
                            'value' => 14701358,
                          ),
                          34 => 
                          array (
                            'key' => 'Yoghurt',
                            'value' => 14701359,
                          ),
                          35 => 
                          array (
                            'key' => 'Milk',
                            'value' => 14701360,
                          ),
                          36 => 
                          array (
                            'key' => 'Dairy products',
                            'value' => 14701361,
                          ),
                          37 => 
                          array (
                            'key' => 'Potable water',
                            'value' => 14701362,
                          ),
                          38 => 
                          array (
                            'key' => 'Oily air',
                            'value' => 14701363,
                          ),
                          39 => 
                          array (
                            'key' => 'Tar',
                            'value' => 14701364,
                          ),
                          40 => 
                          array (
                            'key' => 'Bitumen',
                            'value' => 14701365,
                          ),
                          41 => 
                          array (
                            'key' => 'Explosive gases and their mixtures',
                            'value' => 14701366,
                          ),
                          42 => 
                          array (
                            'key' => 'Air',
                            'value' => 14701367,
                          ),
                          43 => 
                          array (
                            'key' => 'Hydraulik oils',
                            'value' => 14701368,
                          ),
                          44 => 
                          array (
                            'key' => 'Lacquers',
                            'value' => 14701369,
                          ),
                          45 => 
                          array (
                            'key' => 'Glues',
                            'value' => 14701370,
                          ),
                          46 => 
                          array (
                            'key' => 'Oils',
                            'value' => 14701371,
                          ),
                          47 => 
                          array (
                            'key' => 'Lubricants',
                            'value' => 14701372,
                          ),
                          48 => 
                          array (
                            'key' => 'Sea water',
                            'value' => 14701373,
                          ),
                          49 => 
                          array (
                            'key' => 'Process water',
                            'value' => 14701374,
                          ),
                          50 => 
                          array (
                            'key' => 'Cleaning and disinfection agents ',
                            'value' => 14701375,
                          ),
                          51 => 
                          array (
                            'key' => 'Acids',
                            'value' => 14701376,
                          ),
                          52 => 
                          array (
                            'key' => 'Caustics',
                            'value' => 14701377,
                          ),
                          53 => 
                          array (
                            'key' => 'Oil',
                            'value' => 14701378,
                          ),
                          54 => 
                          array (
                            'key' => 'Fats',
                            'value' => 14701379,
                          ),
                          55 => 
                          array (
                            'key' => 'Gravel',
                            'value' => 14701380,
                          ),
                          56 => 
                          array (
                            'key' => 'Dredging sludge',
                            'value' => 14701381,
                          ),
                          57 => 
                          array (
                            'key' => 'Chalk',
                            'value' => 14701382,
                          ),
                          58 => 
                          array (
                            'key' => 'Ash',
                            'value' => 14701383,
                          ),
                          59 => 
                          array (
                            'key' => 'Coal',
                            'value' => 14701384,
                          ),
                          60 => 
                          array (
                            'key' => 'Ore',
                            'value' => 14701385,
                          ),
                          61 => 
                          array (
                            'key' => 'Carbon black',
                            'value' => 14701386,
                          ),
                          62 => 
                          array (
                            'key' => 'Salt',
                            'value' => 14701387,
                          ),
                          63 => 
                          array (
                            'key' => 'Concrete',
                            'value' => 14701388,
                          ),
                          64 => 
                          array (
                            'key' => 'Cement',
                            'value' => 14701389,
                          ),
                          65 => 
                          array (
                            'key' => 'Corundum',
                            'value' => 14701390,
                          ),
                          66 => 
                          array (
                            'key' => 'Aluminium Oxide',
                            'value' => 14701391,
                          ),
                          67 => 
                          array (
                            'key' => 'Quarz powder',
                            'value' => 14701392,
                          ),
                          68 => 
                          array (
                            'key' => 'Sugar',
                            'value' => 14701393,
                          ),
                          69 => 
                          array (
                            'key' => 'Flour',
                            'value' => 14701394,
                          ),
                          70 => 
                          array (
                            'key' => 'Spirit lacquer',
                            'value' => 14701395,
                          ),
                          71 => 
                          array (
                            'key' => 'Nitro cellulose lacquer',
                            'value' => 14701396,
                          ),
                          72 => 
                          array (
                            'key' => 'Chlorine rubber lacquer',
                            'value' => 14701397,
                          ),
                          73 => 
                          array (
                            'key' => 'Polyurethane laqcuer',
                            'value' => 14701398,
                          ),
                          74 => 
                          array (
                            'key' => 'Epoxy laquer',
                            'value' => 14701399,
                          ),
                          75 => 
                          array (
                            'key' => 'Emulsion paints',
                            'value' => 14701400,
                          ),
                          76 => 
                          array (
                            'key' => 'Polyester lacquer',
                            'value' => 14701401,
                          ),
                          77 => 
                          array (
                            'key' => 'Cold water',
                            'value' => 14701402,
                          ),
                          78 => 
                          array (
                            'key' => 'Hot water',
                            'value' => 14701403,
                          ),
                          79 => 
                          array (
                            'key' => 'Gas',
                            'value' => 14701404,
                          ),
                          80 => 
                          array (
                            'key' => 'Nitrogen',
                            'value' => 14701405,
                          ),
                          81 => 
                          array (
                            'key' => 'Argon',
                            'value' => 14701406,
                          ),
                          82 => 
                          array (
                            'key' => ' CO<sub>2</sub>',
                            'value' => 14701407,
                          ),
                          83 => 
                          array (
                            'key' => 'Breathing air',
                            'value' => 14701408,
                          ),
                          84 => 
                          array (
                            'key' => 'Benzine',
                            'value' => 14701409,
                          ),
                          85 => 
                          array (
                            'key' => 'Acetylene gas',
                            'value' => 14701410,
                          ),
                          86 => 
                          array (
                            'key' => 'Butane',
                            'value' => 14701411,
                          ),
                          87 => 
                          array (
                            'key' => 'Disinfectants',
                            'value' => 14701412,
                          ),
                          88 => 
                          array (
                            'key' => 'Natural gas',
                            'value' => 14701413,
                          ),
                          89 => 
                          array (
                            'key' => 'Explosive gas',
                            'value' => 14701414,
                          ),
                          90 => 
                          array (
                            'key' => 'Antifreezing compounds',
                            'value' => 14701415,
                          ),
                          91 => 
                          array (
                            'key' => 'Liquid gas',
                            'value' => 14701416,
                          ),
                          92 => 
                          array (
                            'key' => 'Gasoil',
                            'value' => 14701417,
                          ),
                          93 => 
                          array (
                            'key' => 'Glycol solutions',
                            'value' => 14701418,
                          ),
                          94 => 
                          array (
                            'key' => 'Granules',
                            'value' => 14701419,
                          ),
                          95 => 
                          array (
                            'key' => 'Hydraulic fluids',
                            'value' => 14701420,
                          ),
                          96 => 
                          array (
                            'key' => 'Kerosene',
                            'value' => 14701421,
                          ),
                          97 => 
                          array (
                            'key' => 'Corrosion preventives',
                            'value' => 14701422,
                          ),
                          98 => 
                          array (
                            'key' => 'LPG',
                            'value' => 14701423,
                          ),
                          99 => 
                          array (
                            'key' => 'Mineral oil',
                            'value' => 14701424,
                          ),
                          100 => 
                          array (
                            'key' => 'Naphtha',
                            'value' => 14701425,
                          ),
                          101 => 
                          array (
                            'key' => 'Non-flammable gas',
                            'value' => 14701426,
                          ),
                          102 => 
                          array (
                            'key' => 'Pressurized air',
                            'value' => 14701427,
                          ),
                          103 => 
                          array (
                            'key' => 'Propane',
                            'value' => 14701428,
                          ),
                          104 => 
                          array (
                            'key' => 'Powder media',
                            'value' => 14701429,
                          ),
                          105 => 
                          array (
                            'key' => 'Cleaning agents',
                            'value' => 14701430,
                          ),
                          106 => 
                          array (
                            'key' => 'Raw milk',
                            'value' => 14701431,
                          ),
                          107 => 
                          array (
                            'key' => 'Salt solutions',
                            'value' => 14701432,
                          ),
                          108 => 
                          array (
                            'key' => 'Pesticides',
                            'value' => 14701433,
                          ),
                          109 => 
                          array (
                            'key' => 'Water emulsions',
                            'value' => 14701434,
                          ),
                          110 => 
                          array (
                            'key' => 'Polar solvents',
                            'value' => 14701435,
                          ),
                          111 => 
                          array (
                            'key' => 'Acetates',
                            'value' => 14701436,
                          ),
                          112 => 
                          array (
                            'key' => 'Aldehydes',
                            'value' => 14701437,
                          ),
                          113 => 
                          array (
                            'key' => 'Ester',
                            'value' => 14701438,
                          ),
                          114 => 
                          array (
                            'key' => 'Ketones',
                            'value' => 14701439,
                          ),
                          115 => 
                          array (
                            'key' => 'Hot cooling water',
                            'value' => 14701440,
                          ),
                          116 => 
                          array (
                            'key' => 'Hot air (not oily)',
                            'value' => 14701441,
                          ),
                          117 => 
                          array (
                            'key' => 'liquid and pasty chemical and petroleum based products',
                            'value' => 14701442,
                          ),
                          118 => 
                          array (
                            'key' => 'Mud',
                            'value' => 14701443,
                          ),
                          119 => 
                          array (
                            'key' => 'Fuel oil',
                            'value' => 14701444,
                          ),
                          120 => 
                          array (
                            'key' => 'Power steering oil',
                            'value' => 14701445,
                          ),
                          121 => 
                          array (
                            'key' => 'Engine oil',
                            'value' => 14701446,
                          ),
                          122 => 
                          array (
                            'key' => 'Gear lubricant oil',
                            'value' => 14701447,
                          ),
                          123 => 
                          array (
                            'key' => 'Petroleum based products up to 50% aromatic component',
                            'value' => 14701448,
                          ),
                          124 => 
                          array (
                            'key' => 'Coal dust',
                            'value' => 14701449,
                          ),
                          125 => 
                          array (
                            'key' => 'Micro silica',
                            'value' => 14701450,
                          ),
                          126 => 
                          array (
                            'key' => 'Fly ash',
                            'value' => 14701451,
                          ),
                          127 => 
                          array (
                            'key' => 'Limestone filler',
                            'value' => 14701452,
                          ),
                          128 => 
                          array (
                            'key' => 'Aluminium oxide',
                            'value' => 14701453,
                          ),
                          129 => 
                          array (
                            'key' => 'Plastic granulates',
                            'value' => 14701454,
                          ),
                          130 => 
                          array (
                            'key' => 'Industrial waste',
                            'value' => 14701455,
                          ),
                          131 => 
                          array (
                            'key' => 'Tallow',
                            'value' => 14701456,
                          ),
                          132 => 
                          array (
                            'key' => 'Buttermilk',
                            'value' => 14701457,
                          ),
                          133 => 
                          array (
                            'key' => 'Gelatine',
                            'value' => 14701458,
                          ),
                          134 => 
                          array (
                            'key' => 'Egg yolk',
                            'value' => 14701459,
                          ),
                          135 => 
                          array (
                            'key' => 'Fruits',
                            'value' => 14701460,
                          ),
                          136 => 
                          array (
                            'key' => 'Ice',
                            'value' => 14701461,
                          ),
                          137 => 
                          array (
                            'key' => 'Sparkling wine ',
                            'value' => 14701462,
                          ),
                          138 => 
                          array (
                            'key' => 'Vinegar ',
                            'value' => 14701463,
                          ),
                          139 => 
                          array (
                            'key' => 'Cheese',
                            'value' => 14701464,
                          ),
                          140 => 
                          array (
                            'key' => 'Chocolate',
                            'value' => 14701465,
                          ),
                          141 => 
                          array (
                            'key' => 'Cottage cheese',
                            'value' => 14701466,
                          ),
                          142 => 
                          array (
                            'key' => 'Rice pudding ',
                            'value' => 14701467,
                          ),
                          143 => 
                          array (
                            'key' => 'Mustard',
                            'value' => 14701468,
                          ),
                          144 => 
                          array (
                            'key' => 'Citric acid ',
                            'value' => 14701469,
                          ),
                          145 => 
                          array (
                            'key' => 'Sugar syrup',
                            'value' => 14701470,
                          ),
                          146 => 
                          array (
                            'key' => 'Juice',
                            'value' => 14701471,
                          ),
                          147 => 
                          array (
                            'key' => 'Ketchup',
                            'value' => 14701472,
                          ),
                          148 => 
                          array (
                            'key' => 'Milk powder',
                            'value' => 14701473,
                          ),
                          149 => 
                          array (
                            'key' => 'Lactic acid ',
                            'value' => 14701474,
                          ),
                          150 => 
                          array (
                            'key' => 'Spirits',
                            'value' => 14701475,
                          ),
                          151 => 
                          array (
                            'key' => 'Granulate (Salt, Sugar)',
                            'value' => 14701476,
                          ),
                          152 => 
                          array (
                            'key' => 'Fishmeal',
                            'value' => 14701477,
                          ),
                          153 => 
                          array (
                            'key' => 'Dough ',
                            'value' => 14701478,
                          ),
                          154 => 
                          array (
                            'key' => 'Powder',
                            'value' => 14701479,
                          ),
                          155 => 
                          array (
                            'key' => 'Alcohol <20%',
                            'value' => 14701480,
                          ),
                          156 => 
                          array (
                            'key' => 'Foodstuffs',
                            'value' => 14701481,
                          ),
                          157 => 
                          array (
                            'key' => 'Acidic foods ',
                            'value' => 14701482,
                          ),
                          158 => 
                          array (
                            'key' => 'Fatty foods',
                            'value' => 14701483,
                          ),
                          159 => 
                          array (
                            'key' => 'Abrasive foods',
                            'value' => 14701484,
                          ),
                          160 => 
                          array (
                            'key' => 'Fruit ice cream',
                            'value' => 14701485,
                          ),
                          161 => 
                          array (
                            'key' => 'Dairy ice cream',
                            'value' => 14701486,
                          ),
                          162 => 
                          array (
                            'key' => 'Dry Ice',
                            'value' => 14701487,
                          ),
                          163 => 
                          array (
                            'key' => 'Activated carbon',
                            'value' => 14701488,
                          ),
                          164 => 
                          array (
                            'key' => 'Dusty Media',
                            'value' => 14701489,
                          ),
                          165 => 
                          array (
                            'key' => 'Fuel-containing air',
                            'value' => 14701490,
                          ),
                          166 => 
                          array (
                            'key' => 'Biodiesel resistant',
                            'value' => 14701491,
                          ),
                          167 => 
                          array (
                            'key' => 'Extinguishing media',
                            'value' => 14701492,
                          ),
                          168 => 
                          array (
                            'key' => 'Bulk material',
                            'value' => 14701493,
                          ),
                          169 => 
                          array (
                            'key' => 'Liquid mud containing crude oil and grit ',
                            'value' => 14701494,
                          ),
                          170 => 
                          array (
                            'key' => 'Clean chemicals',
                            'value' => 14701495,
                          ),
                          171 => 
                          array (
                            'key' => 'Hygenic/sanitary products',
                            'value' => 14701496,
                          ),
                          172 => 
                          array (
                            'key' => 'Condensate',
                            'value' => 14701497,
                          ),
                          173 => 
                          array (
                            'key' => 'Water-based saturated steam',
                            'value' => 14701498,
                          ),
                          174 => 
                          array (
                            'key' => 'Starch',
                            'value' => 14701499,
                          ),
                          175 => 
                          array (
                            'key' => 'Washing powder',
                            'value' => 14701500,
                          ),
                          176 => 
                          array (
                            'key' => 'Microsilica',
                            'value' => 14701501,
                          ),
                          177 => 
                          array (
                            'key' => 'PVC',
                            'value' => 14701502,
                          ),
                          178 => 
                          array (
                            'key' => 'Powdery and fine-grained bulk materials (grain size "equal to/smaller than" 3mm)',
                            'value' => 14701503,
                          ),
                          179 => 
                          array (
                            'key' => 'Lard',
                            'value' => 14701504,
                          ),
                          180 => 
                          array (
                            'key' => 'Commercially available cooling water additives in usual concentrations',
                            'value' => 14701505,
                          ),
                          181 => 
                          array (
                            'key' => 'Dry and oily compressed air',
                            'value' => 14701506,
                          ),
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
