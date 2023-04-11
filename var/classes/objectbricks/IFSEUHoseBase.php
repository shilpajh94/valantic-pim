<?php 

/** 
* Generated at: 2023-04-08T12:11:36+05:30
* IP: 127.0.0.1


Fields Summary: 
- staticWire [booleanSelect]
- staticWireType [select]
- tubeCharacteristic [select]
- hoseIdDec [numeric]
- hoseIdMM [numeric]
- Note2BelowTable [input]
- FlowMediumStability [booleanSelect]
- BaseBrickMapping [input]
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
                        'value' => 14705867,
                      ),
                      1 => 
                      array (
                        'key' => 'Rough Bore',
                        'value' => 14705868,
                      ),
                      2 => 
                      array (
                        'key' => 'Smooth',
                        'value' => 14705869,
                      ),
                      3 => 
                      array (
                        'key' => 'Standard',
                        'value' => 14705870,
                      ),
                      4 => 
                      array (
                        'key' => 'Wrapped',
                        'value' => 14705871,
                      ),
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
                     'unsigned' => false,
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
                     'unsigned' => false,
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
                  7 => 
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
                     'name' => 'BaseBrickMapping',
                     'title' => 'BaseBrickMapping',
                     'tooltip' => '',
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
                        'value' => 14701508,
                      ),
                      1 => 
                      array (
                        'key' => '74310',
                        'value' => 14701509,
                      ),
                      2 => 
                      array (
                        'key' => '20018-1',
                        'value' => 14701510,
                      ),
                      3 => 
                      array (
                        'key' => '5510-2',
                        'value' => 14701511,
                      ),
                      4 => 
                      array (
                        'key' => '6257.70',
                        'value' => 14701512,
                      ),
                      5 => 
                      array (
                        'key' => '6257.72',
                        'value' => 14701513,
                      ),
                      6 => 
                      array (
                        'key' => '6257.21',
                        'value' => 14701514,
                      ),
                      7 => 
                      array (
                        'key' => '853',
                        'value' => 14701515,
                      ),
                      8 => 
                      array (
                        'key' => '854',
                        'value' => 14701516,
                      ),
                      9 => 
                      array (
                        'key' => '856',
                        'value' => 14701517,
                      ),
                      10 => 
                      array (
                        'key' => '857',
                        'value' => 14701518,
                      ),
                      11 => 
                      array (
                        'key' => '45545-2 HL3 (R22+R23)',
                        'value' => 14701519,
                      ),
                      12 => 
                      array (
                        'key' => '14593/14594',
                        'value' => 14701520,
                      ),
                      13 => 
                      array (
                        'key' => '16436-1:2016  CLASS-2 (10 bar)',
                        'value' => 14701521,
                      ),
                      14 => 
                      array (
                        'key' => '12115:2011',
                        'value' => 14701522,
                      ),
                      15 => 
                      array (
                        'key' => '1761',
                        'value' => 14701523,
                      ),
                      16 => 
                      array (
                        'key' => '250',
                        'value' => 14701524,
                      ),
                      17 => 
                      array (
                        'key' => '6134-1A',
                        'value' => 14701525,
                      ),
                      18 => 
                      array (
                        'key' => '6134-2A',
                        'value' => 14701526,
                      ),
                      19 => 
                      array (
                        'key' => '6134-2B',
                        'value' => 14701527,
                      ),
                      20 => 
                      array (
                        'key' => '2398:2017 3C/L-T',
                        'value' => 14701528,
                      ),
                      21 => 
                      array (
                        'key' => '2398:2017 2C/L-T',
                        'value' => 14701529,
                      ),
                      22 => 
                      array (
                        'key' => '333 N1W',
                        'value' => 14701530,
                      ),
                      23 => 
                      array (
                        'key' => '333 N1',
                        'value' => 14701531,
                      ),
                      24 => 
                      array (
                        'key' => '830-1/V',
                        'value' => 14701532,
                      ),
                      25 => 
                      array (
                        'key' => 'Class A',
                        'value' => 14701533,
                      ),
                      26 => 
                      array (
                        'key' => 'GERMANISCHEN LLOYD ',
                        'value' => 14701534,
                      ),
                      27 => 
                      array (
                        'key' => '2153',
                        'value' => 14701535,
                      ),
                      28 => 
                      array (
                        'key' => ' 1529/2014',
                        'value' => 14701536,
                      ),
                      29 => 
                      array (
                        'key' => '6615G',
                        'value' => 14701537,
                      ),
                      30 => 
                      array (
                        'key' => '407:2007',
                        'value' => 14701538,
                      ),
                      31 => 
                      array (
                        'key' => '1825',
                        'value' => 14701539,
                      ),
                      32 => 
                      array (
                        'key' => 'EC Regulation no. 1907/2006',
                        'value' => 14701540,
                      ),
                      33 => 
                      array (
                        'key' => 'Regulation 177.1520',
                        'value' => 14701541,
                      ),
                      34 => 
                      array (
                        'key' => 'Regulation 177.2600',
                        'value' => 14701542,
                      ),
                      35 => 
                      array (
                        'key' => 'Regulation 177.1550',
                        'value' => 14701543,
                      ),
                      36 => 
                      array (
                        'key' => 'Recommendation III',
                        'value' => 14701544,
                      ),
                      37 => 
                      array (
                        'key' => 'Recommendation XXI, Cat. 2',
                        'value' => 14701545,
                      ),
                      38 => 
                      array (
                        'key' => 'Recommendation XXI, Cat. 4',
                        'value' => 14701546,
                      ),
                      39 => 
                      array (
                        'key' => '1935/2004',
                        'value' => 14701547,
                      ),
                      40 => 
                      array (
                        'key' => '2023/2006',
                        'value' => 14701548,
                      ),
                      41 => 
                      array (
                        'key' => '10/11',
                        'value' => 14701549,
                      ),
                      42 => 
                      array (
                        'key' => 'CLASS VI',
                        'value' => 14701550,
                      ),
                      43 => 
                      array (
                        'key' => 'Licensed in accordance with BS 6920-1:2000',
                        'value' => 14701551,
                      ),
                      44 => 
                      array (
                        'key' => 'Licensed in accordance with Pipes guideline for plastics used for drinking water, DVGW W270 and VP 549',
                        'value' => 14701552,
                      ),
                      45 => 
                      array (
                        'key' => '6254.12',
                        'value' => 14701553,
                      ),
                      46 => 
                      array (
                        'key' => '6254.16',
                        'value' => 14701554,
                      ),
                      47 => 
                      array (
                        'key' => '590',
                        'value' => 14701555,
                      ),
                      48 => 
                      array (
                        'key' => '2398:2017 1A',
                        'value' => 14701556,
                      ),
                      49 => 
                      array (
                        'key' => '73411-B',
                        'value' => 14701557,
                      ),
                      50 => 
                      array (
                        'key' => 'J20 R3/R4 D3 - HT - EC',
                        'value' => 14701558,
                      ),
                      51 => 
                      array (
                        'key' => 'DB/SBB',
                        'value' => 14701559,
                      ),
                      52 => 
                      array (
                        'key' => '11851 - 1.4301',
                        'value' => 14701560,
                      ),
                      53 => 
                      array (
                        'key' => '100R13',
                        'value' => 14701561,
                      ),
                      54 => 
                      array (
                        'key' => '856 4SH',
                        'value' => 14701562,
                      ),
                      55 => 
                      array (
                        'key' => '853 1SN',
                        'value' => 14701563,
                      ),
                      56 => 
                      array (
                        'key' => '100R15',
                        'value' => 14701564,
                      ),
                      57 => 
                      array (
                        'key' => '100R12',
                        'value' => 14701565,
                      ),
                      58 => 
                      array (
                        'key' => '3821:2020',
                        'value' => 14701566,
                      ),
                      59 => 
                      array (
                        'key' => '16436-1:2016 Class 3 (30 bar)',
                        'value' => 14701567,
                      ),
                      60 => 
                      array (
                        'key' => '16436-1:2016 CLASS 3 (30 bar)',
                        'value' => 14701568,
                      ),
                      61 => 
                      array (
                        'key' => '856 4SP',
                        'value' => 14701569,
                      ),
                      62 => 
                      array (
                        'key' => '100R16',
                        'value' => 14701570,
                      ),
                      63 => 
                      array (
                        'key' => '857 2SC',
                        'value' => 14701571,
                      ),
                      64 => 
                      array (
                        'key' => '100R1AT',
                        'value' => 14701572,
                      ),
                      65 => 
                      array (
                        'key' => '100R2AT',
                        'value' => 14701573,
                      ),
                      66 => 
                      array (
                        'key' => '853 2SN',
                        'value' => 14701574,
                      ),
                      67 => 
                      array (
                        'key' => '100R19',
                        'value' => 14701575,
                      ),
                      68 => 
                      array (
                        'key' => '100R17',
                        'value' => 14701576,
                      ),
                      69 => 
                      array (
                        'key' => '11237 R19',
                        'value' => 14701577,
                      ),
                      70 => 
                      array (
                        'key' => '20023 4SH',
                        'value' => 14701578,
                      ),
                      71 => 
                      array (
                        'key' => '20023 4SP',
                        'value' => 14701579,
                      ),
                      72 => 
                      array (
                        'key' => 'MSHA',
                        'value' => 14701580,
                      ),
                      73 => 
                      array (
                        'key' => 'Dry Food',
                        'value' => 14701581,
                      ),
                      74 => 
                      array (
                        'key' => 'New node',
                        'value' => 14701582,
                      ),
                      75 => 
                      array (
                        'key' => '73379 Typ B1',
                        'value' => 14701583,
                      ),
                      76 => 
                      array (
                        'key' => 'J30 R9',
                        'value' => 14701584,
                      ),
                      77 => 
                      array (
                        'key' => '73379 Typ A1',
                        'value' => 14701585,
                      ),
                      78 => 
                      array (
                        'key' => 'BWGL',
                        'value' => 14701586,
                      ),
                      79 => 
                      array (
                        'key' => '16421 (W270)',
                        'value' => 14701587,
                      ),
                      80 => 
                      array (
                        'key' => '15807 (UIC830-1V)',
                        'value' => 14701588,
                      ),
                      81 => 
                      array (
                        'key' => 'DVGW',
                        'value' => 14701589,
                      ),
                      82 => 
                      array (
                        'key' => 'VP549',
                        'value' => 14701590,
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
                     'unsigned' => false,
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
                            'value' => 14702988,
                          ),
                          1 => 
                          array (
                            'key' => 'NBR',
                            'value' => 14702989,
                          ),
                          2 => 
                          array (
                            'key' => 'NR',
                            'value' => 14702990,
                          ),
                          3 => 
                          array (
                            'key' => 'CR',
                            'value' => 14702991,
                          ),
                          4 => 
                          array (
                            'key' => 'CR-EPDM',
                            'value' => 14702992,
                          ),
                          5 => 
                          array (
                            'key' => 'UPE',
                            'value' => 14702993,
                          ),
                          6 => 
                          array (
                            'key' => 'FEP',
                            'value' => 14702994,
                          ),
                          7 => 
                          array (
                            'key' => 'CIIR',
                            'value' => 14702995,
                          ),
                          8 => 
                          array (
                            'key' => 'SBR',
                            'value' => 14702996,
                          ),
                          9 => 
                          array (
                            'key' => 'PA',
                            'value' => 14702997,
                          ),
                          10 => 
                          array (
                            'key' => 'Special elastomer',
                            'value' => 14702998,
                          ),
                          11 => 
                          array (
                            'key' => 'SBR-EPDM',
                            'value' => 14702999,
                          ),
                          12 => 
                          array (
                            'key' => 'CSM/BR',
                            'value' => 14703000,
                          ),
                          13 => 
                          array (
                            'key' => 'Fluoroplastic ',
                            'value' => 14703001,
                          ),
                          14 => 
                          array (
                            'key' => 'AEM',
                            'value' => 14703002,
                          ),
                          15 => 
                          array (
                            'key' => 'SBR-BR',
                            'value' => 14703003,
                          ),
                          16 => 
                          array (
                            'key' => 'SBR-NR',
                            'value' => 14703004,
                          ),
                          17 => 
                          array (
                            'key' => 'no fuel solubility',
                            'value' => 14703005,
                          ),
                          18 => 
                          array (
                            'key' => 'Synthetic rubber',
                            'value' => 14703006,
                          ),
                          19 => 
                          array (
                            'key' => 'CPE',
                            'value' => 14703007,
                          ),
                          20 => 
                          array (
                            'key' => 'CM',
                            'value' => 14703008,
                          ),
                          21 => 
                          array (
                            'key' => 'FPM',
                            'value' => 14703009,
                          ),
                          22 => 
                          array (
                            'key' => 'ECO',
                            'value' => 14703010,
                          ),
                          23 => 
                          array (
                            'key' => 'FPM/HNBR',
                            'value' => 14703011,
                          ),
                          24 => 
                          array (
                            'key' => 'FPM/AEM',
                            'value' => 14703012,
                          ),
                          25 => 
                          array (
                            'key' => 'FPM/ECO',
                            'value' => 14703013,
                          ),
                          26 => 
                          array (
                            'key' => 'HNBR',
                            'value' => 14703014,
                          ),
                          27 => 
                          array (
                            'key' => 'UHMWPE',
                            'value' => 14703015,
                          ),
                          28 => 
                          array (
                            'key' => 'PU',
                            'value' => 14703016,
                          ),
                          29 => 
                          array (
                            'key' => 'EPDM black or EPM white',
                            'value' => 14703017,
                          ),
                          30 => 
                          array (
                            'key' => 'PTFE',
                            'value' => 14703018,
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
                            'value' => 14702921,
                          ),
                          1 => 
                          array (
                            'key' => 'white',
                            'value' => 14702922,
                          ),
                          2 => 
                          array (
                            'key' => 'black',
                            'value' => 14702923,
                          ),
                          3 => 
                          array (
                            'key' => 'grey',
                            'value' => 14702924,
                          ),
                          4 => 
                          array (
                            'key' => 'bright',
                            'value' => 14702925,
                          ),
                          5 => 
                          array (
                            'key' => 'blue',
                            'value' => 14702926,
                          ),
                          6 => 
                          array (
                            'key' => 'red',
                            'value' => 14702927,
                          ),
                          7 => 
                          array (
                            'key' => 'orange',
                            'value' => 14702928,
                          ),
                          8 => 
                          array (
                            'key' => 'black or white',
                            'value' => 14702929,
                          ),
                          9 => 
                          array (
                            'key' => 'light grey',
                            'value' => 14702930,
                          ),
                          10 => 
                          array (
                            'key' => 'white with magnetic and X-ray detectable grey elastomer layer behind',
                            'value' => 14702931,
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
                            'value' => 14703296,
                          ),
                          1 => 
                          array (
                            'key' => 'Aramid',
                            'value' => 14703297,
                          ),
                          2 => 
                          array (
                            'key' => '2 galvanized reinforcements',
                            'value' => 14703298,
                          ),
                          3 => 
                          array (
                            'key' => 'Synthetic corded plies',
                            'value' => 14703299,
                          ),
                          4 => 
                          array (
                            'key' => 'Textile reinforcement with 2 embedded Cu-wires',
                            'value' => 14703300,
                          ),
                          5 => 
                          array (
                            'key' => 'high tension steel wire',
                            'value' => 14703301,
                          ),
                          6 => 
                          array (
                            'key' => 'Synthetic yarns with steel wire braid',
                            'value' => 14703302,
                          ),
                          7 => 
                          array (
                            'key' => '4 alternating layers of spiraled high-tensile wire',
                            'value' => 14703303,
                          ),
                          8 => 
                          array (
                            'key' => 'Steel wire braids with embedded additional weights',
                            'value' => 14703304,
                          ),
                          9 => 
                          array (
                            'key' => 'PPS',
                            'value' => 14703305,
                          ),
                          10 => 
                          array (
                            'key' => 'CMD',
                            'value' => 14703306,
                          ),
                          11 => 
                          array (
                            'key' => 'CO',
                            'value' => 14703307,
                          ),
                          12 => 
                          array (
                            'key' => 'Synthetic yarns, rubberised, black, optionally with embedded steel wire spiral',
                            'value' => 14703308,
                          ),
                          13 => 
                          array (
                            'key' => 'Steel cord layers',
                            'value' => 14703309,
                          ),
                          14 => 
                          array (
                            'key' => 'Stainless steel braids (1.4401), glass fibre braids and elastomer interlayers',
                            'value' => 14703310,
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
                            'value' => 14702977,
                          ),
                          1 => 
                          array (
                            'key' => 'With integrated plastic helix',
                            'value' => 14702978,
                          ),
                          2 => 
                          array (
                            'key' => 'With 2 spiralled copper strands',
                            'value' => 14702979,
                          ),
                          3 => 
                          array (
                            'key' => 'With copper wire',
                            'value' => 14702980,
                          ),
                          4 => 
                          array (
                            'key' => 'With spring wire spiral',
                            'value' => 14702981,
                          ),
                          5 => 
                          array (
                            'key' => 'With galvanised spring steel helix',
                            'value' => 14702982,
                          ),
                          6 => 
                          array (
                            'key' => 'With steel helix from DN 25',
                            'value' => 14702983,
                          ),
                          7 => 
                          array (
                            'key' => 'With steel wire braid',
                            'value' => 14702984,
                          ),
                          8 => 
                          array (
                            'key' => 'With antistatic wire',
                            'value' => 14702985,
                          ),
                          9 => 
                          array (
                            'key' => 'With integrated steel wire spiral and antistatic wire',
                            'value' => 14702986,
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
                            'value' => 14703240,
                          ),
                          1 => 
                          array (
                            'key' => 'smooth',
                            'value' => 14703241,
                          ),
                          2 => 
                          array (
                            'key' => 'non-porous',
                            'value' => 14703242,
                          ),
                          3 => 
                          array (
                            'key' => 'plasticizer-free',
                            'value' => 14703243,
                          ),
                          4 => 
                          array (
                            'key' => 'high-performing',
                            'value' => 14703244,
                          ),
                          5 => 
                          array (
                            'key' => 'anti-adhesive',
                            'value' => 14703245,
                          ),
                          6 => 
                          array (
                            'key' => 'highly abrasion resisitant ',
                            'value' => 14703246,
                          ),
                          7 => 
                          array (
                            'key' => 'impermeable',
                            'value' => 14703247,
                          ),
                          8 => 
                          array (
                            'key' => 'seamless',
                            'value' => 14703248,
                          ),
                          9 => 
                          array (
                            'key' => 'electrically noncondctive',
                            'value' => 14703249,
                          ),
                          10 => 
                          array (
                            'key' => 'meets FDA (21 CFR 177.1550) and USP CLASS VI',
                            'value' => 14703250,
                          ),
                          11 => 
                          array (
                            'key' => 'absolutely neutral to taste and odour',
                            'value' => 14703251,
                          ),
                          12 => 
                          array (
                            'key' => 'according to recommendation XXI, cat. 2 of BfR',
                            'value' => 14703252,
                          ),
                          13 => 
                          array (
                            'key' => 'according to FDA (21 CFR 177.2600)',
                            'value' => 14703253,
                          ),
                          14 => 
                          array (
                            'key' => 'resistant to oil and fats',
                            'value' => 14703254,
                          ),
                          15 => 
                          array (
                            'key' => ' with Conti Orange Wear Indicator',
                            'value' => 14703255,
                          ),
                          16 => 
                          array (
                            'key' => 'with black coiled OHM conductive stripe',
                            'value' => 14703256,
                          ),
                          17 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω/m',
                            'value' => 14703257,
                          ),
                          18 => 
                          array (
                            'key' => 'highly abrasion resistant (acc. to DIN ISO 4649-A: <60mm³)',
                            'value' => 14703258,
                          ),
                          19 => 
                          array (
                            'key' => 'no fuel solubility',
                            'value' => 14703259,
                          ),
                          20 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω',
                            'value' => 14703260,
                          ),
                          21 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>9</sup> Ω/m',
                            'value' => 14703261,
                          ),
                          22 => 
                          array (
                            'key' => 'electrically insulating, R > 10<sup>9</sup> Ω/m',
                            'value' => 14703262,
                          ),
                          23 => 
                          array (
                            'key' => 'according to FDA ',
                            'value' => 14703263,
                          ),
                          24 => 
                          array (
                            'key' => 'almost odourless',
                            'value' => 14703264,
                          ),
                          25 => 
                          array (
                            'key' => 'Partial lining with special fleece and fluidisation channels underneath (max. 2 bar)',
                            'value' => 14703265,
                          ),
                          26 => 
                          array (
                            'key' => 'extruded',
                            'value' => 14703266,
                          ),
                          27 => 
                          array (
                            'key' => 'can be detected magnetically or by X-rays',
                            'value' => 14703267,
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
                            'value' => 14702944,
                          ),
                          1 => 
                          array (
                            'key' => 'NBR',
                            'value' => 14702945,
                          ),
                          2 => 
                          array (
                            'key' => 'NR',
                            'value' => 14702946,
                          ),
                          3 => 
                          array (
                            'key' => 'CR',
                            'value' => 14702947,
                          ),
                          4 => 
                          array (
                            'key' => 'CR-EPDM',
                            'value' => 14702948,
                          ),
                          5 => 
                          array (
                            'key' => 'UPE',
                            'value' => 14702949,
                          ),
                          6 => 
                          array (
                            'key' => 'FEP',
                            'value' => 14702950,
                          ),
                          7 => 
                          array (
                            'key' => 'CIIR',
                            'value' => 14702951,
                          ),
                          8 => 
                          array (
                            'key' => 'SBR',
                            'value' => 14702952,
                          ),
                          9 => 
                          array (
                            'key' => 'PA',
                            'value' => 14702953,
                          ),
                          10 => 
                          array (
                            'key' => 'SBR-EPDM',
                            'value' => 14702954,
                          ),
                          11 => 
                          array (
                            'key' => 'CSM-BR ',
                            'value' => 14702955,
                          ),
                          12 => 
                          array (
                            'key' => 'Spezial elastomer',
                            'value' => 14702956,
                          ),
                          13 => 
                          array (
                            'key' => 'AEM',
                            'value' => 14702957,
                          ),
                          14 => 
                          array (
                            'key' => 'CM',
                            'value' => 14702958,
                          ),
                          15 => 
                          array (
                            'key' => 'SBR-BR',
                            'value' => 14702959,
                          ),
                          16 => 
                          array (
                            'key' => 'CR-BR',
                            'value' => 14702960,
                          ),
                          17 => 
                          array (
                            'key' => 'IR-BR',
                            'value' => 14702961,
                          ),
                          18 => 
                          array (
                            'key' => 'SBR-NR',
                            'value' => 14702962,
                          ),
                          19 => 
                          array (
                            'key' => 'Synthetic rubber',
                            'value' => 14702963,
                          ),
                          20 => 
                          array (
                            'key' => 'CPE',
                            'value' => 14702964,
                          ),
                          21 => 
                          array (
                            'key' => 'CMD',
                            'value' => 14702965,
                          ),
                          22 => 
                          array (
                            'key' => 'PES',
                            'value' => 14702966,
                          ),
                          23 => 
                          array (
                            'key' => 'CSM',
                            'value' => 14702967,
                          ),
                          24 => 
                          array (
                            'key' => 'ECO',
                            'value' => 14702968,
                          ),
                          25 => 
                          array (
                            'key' => 'CO',
                            'value' => 14702969,
                          ),
                          26 => 
                          array (
                            'key' => 'NBR-PVC',
                            'value' => 14702970,
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
                            'value' => 14702933,
                          ),
                          1 => 
                          array (
                            'key' => 'grey',
                            'value' => 14702934,
                          ),
                          2 => 
                          array (
                            'key' => 'bright',
                            'value' => 14702935,
                          ),
                          3 => 
                          array (
                            'key' => 'orange',
                            'value' => 14702936,
                          ),
                          4 => 
                          array (
                            'key' => 'red',
                            'value' => 14702937,
                          ),
                          5 => 
                          array (
                            'key' => 'black',
                            'value' => 14702938,
                          ),
                          6 => 
                          array (
                            'key' => 'transparent',
                            'value' => 14702939,
                          ),
                          7 => 
                          array (
                            'key' => 'white',
                            'value' => 14702940,
                          ),
                          8 => 
                          array (
                            'key' => 'red-orange',
                            'value' => 14702941,
                          ),
                          9 => 
                          array (
                            'key' => 'blue and red',
                            'value' => 14702942,
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
                            'value' => 14702972,
                          ),
                          1 => 
                          array (
                            'key' => 'smooth',
                            'value' => 14702973,
                          ),
                          2 => 
                          array (
                            'key' => 'strongly corrugated',
                            'value' => 14702974,
                          ),
                          3 => 
                          array (
                            'key' => 'grooved',
                            'value' => 14702975,
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
                            'value' => 14703269,
                          ),
                          1 => 
                          array (
                            'key' => 'resistant to ozone, weather and UV',
                            'value' => 14703270,
                          ),
                          2 => 
                          array (
                            'key' => 'resistant to oil and fats',
                            'value' => 14703271,
                          ),
                          3 => 
                          array (
                            'key' => 'resistant to excrements',
                            'value' => 14703272,
                          ),
                          4 => 
                          array (
                            'key' => 'chemical-resistant',
                            'value' => 14703273,
                          ),
                          5 => 
                          array (
                            'key' => 'resistant to fats',
                            'value' => 14703274,
                          ),
                          6 => 
                          array (
                            'key' => 'from DN 28 upward fabric patterned',
                            'value' => 14703275,
                          ),
                          7 => 
                          array (
                            'key' => 'from DN 28 upward CR-cover (fabric patterned)',
                            'value' => 14703276,
                          ),
                          8 => 
                          array (
                            'key' => 'wear-resisitant',
                            'value' => 14703277,
                          ),
                          9 => 
                          array (
                            'key' => 'flame resistant',
                            'value' => 14703278,
                          ),
                          10 => 
                          array (
                            'key' => 'from DN 32 upward CR-cover (fabric patterned)',
                            'value' => 14703279,
                          ),
                          11 => 
                          array (
                            'key' => 'from DN 32 upward fabric patterned',
                            'value' => 14703280,
                          ),
                          12 => 
                          array (
                            'key' => 'resistant to process water and oily air',
                            'value' => 14703281,
                          ),
                          13 => 
                          array (
                            'key' => 'resistant to short influence of oil and chemicals',
                            'value' => 14703282,
                          ),
                          14 => 
                          array (
                            'key' => 'ageing resistant',
                            'value' => 14703283,
                          ),
                          15 => 
                          array (
                            'key' => 'with black coiled OHM conductive stripe',
                            'value' => 14703284,
                          ),
                          16 => 
                          array (
                            'key' => 'from DN 25 upward fabric patterned',
                            'value' => 14703285,
                          ),
                          17 => 
                          array (
                            'key' => 'hydrocarbon resistant',
                            'value' => 14703286,
                          ),
                          18 => 
                          array (
                            'key' => 'electrically conductive',
                            'value' => 14703287,
                          ),
                          19 => 
                          array (
                            'key' => 'flame-resistant (MSHA compliant)',
                            'value' => 14703288,
                          ),
                          20 => 
                          array (
                            'key' => 'resistant to chicken and fish fat',
                            'value' => 14703289,
                          ),
                          21 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω',
                            'value' => 14703290,
                          ),
                          22 => 
                          array (
                            'key' => 'optional',
                            'value' => 14703291,
                          ),
                          23 => 
                          array (
                            'key' => 'with heat protection cover',
                            'value' => 14703292,
                          ),
                          24 => 
                          array (
                            'key' => 'highly abrasion resistant (acc. to DIN ISO 4649-A: <60mm³)',
                            'value' => 14703293,
                          ),
                          25 => 
                          array (
                            'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω/m',
                            'value' => 14703294,
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
                            'value' => 14701014,
                          ),
                          1 => 
                          array (
                            'key' => 'Beverage industry',
                            'value' => 14701015,
                          ),
                          2 => 
                          array (
                            'key' => 'Camping and caravanning',
                            'value' => 14701016,
                          ),
                          3 => 
                          array (
                            'key' => 'Commercial kitchens',
                            'value' => 14701017,
                          ),
                          4 => 
                          array (
                            'key' => 'Municipal emergency water supply',
                            'value' => 14701018,
                          ),
                          5 => 
                          array (
                            'key' => 'Outdoor events',
                            'value' => 14701019,
                          ),
                          6 => 
                          array (
                            'key' => 'Construction industry',
                            'value' => 14701020,
                          ),
                          7 => 
                          array (
                            'key' => 'Open land',
                            'value' => 14701021,
                          ),
                          8 => 
                          array (
                            'key' => 'Metal surface treatment',
                            'value' => 14701022,
                          ),
                          9 => 
                          array (
                            'key' => 'General industry',
                            'value' => 14701023,
                          ),
                          10 => 
                          array (
                            'key' => 'Over- and underground workings',
                            'value' => 14701024,
                          ),
                          11 => 
                          array (
                            'key' => 'Municipal enterprises',
                            'value' => 14701025,
                          ),
                          12 => 
                          array (
                            'key' => 'Agricultural sector',
                            'value' => 14701026,
                          ),
                          13 => 
                          array (
                            'key' => 'Industry',
                            'value' => 14701027,
                          ),
                          14 => 
                          array (
                            'key' => 'Fleets',
                            'value' => 14701028,
                          ),
                          15 => 
                          array (
                            'key' => 'Garages',
                            'value' => 14701029,
                          ),
                          16 => 
                          array (
                            'key' => 'Workshops',
                            'value' => 14701030,
                          ),
                          17 => 
                          array (
                            'key' => 'Landscaping and gardening',
                            'value' => 14701031,
                          ),
                          18 => 
                          array (
                            'key' => 'Mobile or stationary hose lines',
                            'value' => 14701032,
                          ),
                          19 => 
                          array (
                            'key' => 'Commercial washing machines and dishwashers',
                            'value' => 14701033,
                          ),
                          20 => 
                          array (
                            'key' => 'Private Area',
                            'value' => 14701034,
                          ),
                          21 => 
                          array (
                            'key' => 'Railway industry',
                            'value' => 14701035,
                          ),
                          22 => 
                          array (
                            'key' => 'White goods industry',
                            'value' => 14701036,
                          ),
                          23 => 
                          array (
                            'key' => 'Shipyards',
                            'value' => 14701037,
                          ),
                          24 => 
                          array (
                            'key' => 'Yacht construction',
                            'value' => 14701038,
                          ),
                          25 => 
                          array (
                            'key' => 'Machinery and plant engineering',
                            'value' => 14701039,
                          ),
                          26 => 
                          array (
                            'key' => 'Cooling systems in combustion engines',
                            'value' => 14701040,
                          ),
                          27 => 
                          array (
                            'key' => 'Cooling and heating systems',
                            'value' => 14701041,
                          ),
                          28 => 
                          array (
                            'key' => 'Passenger and commercial vehicles',
                            'value' => 14701042,
                          ),
                          29 => 
                          array (
                            'key' => 'Mining industry',
                            'value' => 14701043,
                          ),
                          30 => 
                          array (
                            'key' => 'Public festivals',
                            'value' => 14701044,
                          ),
                          31 => 
                          array (
                            'key' => 'Weekly, Christmas and fair markets',
                            'value' => 14701045,
                          ),
                          32 => 
                          array (
                            'key' => 'Furnaces',
                            'value' => 14701046,
                          ),
                          33 => 
                          array (
                            'key' => 'Ex zones',
                            'value' => 14701047,
                          ),
                          34 => 
                          array (
                            'key' => 'Breweries',
                            'value' => 14701048,
                          ),
                          35 => 
                          array (
                            'key' => 'Distillereies',
                            'value' => 14701049,
                          ),
                          36 => 
                          array (
                            'key' => 'Wine press houses',
                            'value' => 14701050,
                          ),
                          37 => 
                          array (
                            'key' => 'Filling machines',
                            'value' => 14701051,
                          ),
                          38 => 
                          array (
                            'key' => 'Other installations in the brewing, beverage and spirits industry',
                            'value' => 14701052,
                          ),
                          39 => 
                          array (
                            'key' => 'Foodstuffs companies',
                            'value' => 14701053,
                          ),
                          40 => 
                          array (
                            'key' => 'Pharmaceutical and cosmetic industry',
                            'value' => 14701054,
                          ),
                          41 => 
                          array (
                            'key' => 'Dairies',
                            'value' => 14701055,
                          ),
                          42 => 
                          array (
                            'key' => 'Cheese dairies',
                            'value' => 14701056,
                          ),
                          43 => 
                          array (
                            'key' => 'Margarine factories',
                            'value' => 14701057,
                          ),
                          44 => 
                          array (
                            'key' => 'Fish processing',
                            'value' => 14701058,
                          ),
                          45 => 
                          array (
                            'key' => 'Abattoirs',
                            'value' => 14701059,
                          ),
                          46 => 
                          array (
                            'key' => 'Oil mills',
                            'value' => 14701060,
                          ),
                          47 => 
                          array (
                            'key' => 'Rendering plants',
                            'value' => 14701061,
                          ),
                          48 => 
                          array (
                            'key' => 'Large-scale butcheries',
                            'value' => 14701062,
                          ),
                          49 => 
                          array (
                            'key' => 'Jam factories',
                            'value' => 14701063,
                          ),
                          50 => 
                          array (
                            'key' => 'Milk collection vehicles',
                            'value' => 14701064,
                          ),
                          51 => 
                          array (
                            'key' => 'Chemical and petrochemical industry',
                            'value' => 14701065,
                          ),
                          52 => 
                          array (
                            'key' => 'Horticultural companies',
                            'value' => 14701066,
                          ),
                          53 => 
                          array (
                            'key' => 'Refineries',
                            'value' => 14701067,
                          ),
                          54 => 
                          array (
                            'key' => 'Shipping industry',
                            'value' => 14701068,
                          ),
                          55 => 
                          array (
                            'key' => 'Silo vehicles',
                            'value' => 14701069,
                          ),
                          56 => 
                          array (
                            'key' => 'Quarry',
                            'value' => 14701070,
                          ),
                          57 => 
                          array (
                            'key' => 'Compressed air and compressor manufacturers',
                            'value' => 14701071,
                          ),
                          58 => 
                          array (
                            'key' => 'Steel and iron industry',
                            'value' => 14701072,
                          ),
                          59 => 
                          array (
                            'key' => 'Petrol stations',
                            'value' => 14701073,
                          ),
                          60 => 
                          array (
                            'key' => 'Largescale garages',
                            'value' => 14701074,
                          ),
                          61 => 
                          array (
                            'key' => 'Field of compressed air handling',
                            'value' => 14701075,
                          ),
                          62 => 
                          array (
                            'key' => 'Installation and heating system companies',
                            'value' => 14701076,
                          ),
                          63 => 
                          array (
                            'key' => 'Foundries',
                            'value' => 14701077,
                          ),
                          64 => 
                          array (
                            'key' => 'Construction of bridges',
                            'value' => 14701078,
                          ),
                          65 => 
                          array (
                            'key' => 'Welding shops',
                            'value' => 14701079,
                          ),
                          66 => 
                          array (
                            'key' => 'Manufacturers of welding apparatus',
                            'value' => 14701080,
                          ),
                          67 => 
                          array (
                            'key' => 'Steel construction',
                            'value' => 14701081,
                          ),
                          68 => 
                          array (
                            'key' => 'Automobile industry',
                            'value' => 14701082,
                          ),
                          69 => 
                          array (
                            'key' => 'Welding and brazing machines',
                            'value' => 14701083,
                          ),
                          70 => 
                          array (
                            'key' => 'Pressure controlled gas units',
                            'value' => 14701084,
                          ),
                          71 => 
                          array (
                            'key' => 'Mushroom heaters, grills, flame weeding devices',
                            'value' => 14701085,
                          ),
                          72 => 
                          array (
                            'key' => 'Forestry',
                            'value' => 14701086,
                          ),
                          73 => 
                          array (
                            'key' => 'Mineral oil industry',
                            'value' => 14701087,
                          ),
                          74 => 
                          array (
                            'key' => 'Buliding cleaning services',
                            'value' => 14701088,
                          ),
                          75 => 
                          array (
                            'key' => 'Processing of metal surfaces',
                            'value' => 14701089,
                          ),
                          76 => 
                          array (
                            'key' => 'Iron foundries',
                            'value' => 14701090,
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
