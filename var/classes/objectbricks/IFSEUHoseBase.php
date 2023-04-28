<?php 

/** 
* Generated at: 2023-04-28T12:19:03+05:30
* IP: 127.0.0.1


Fields Summary: 
- staticWire [booleanSelect]
- staticWireType [select]
- tubeCharacteristic [select]
- hoseIdDec [numeric]
- hoseIdMM [numeric]
- FlowMediumStability [booleanSelect]
- Coupling [input]
- BaseBrickMapping [input]
- numberOfHelixWires [numeric]
- tubeGaugeFractional [input]
- NonStockSizes [input]
- standards [multiselect]
- numberOfPlies [numeric]
- InnerLining [select]
- colorInnerLining [select]
- Reinforcement [select]
- Helix [select]
- propertiesInnerLayer [multiselect]
- CoverOuterLayer [select]
- ColorOuterLayer [select]
- Haptic [select]
- PropertiesOuterLayer [multiselect]
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
                        'key' => '10/11',
                        'value' => 14701549,
                      ),
                      1 => 
                      array (
                        'key' => '100R12',
                        'value' => 14701565,
                      ),
                      2 => 
                      array (
                        'key' => '100R13',
                        'value' => 14701561,
                      ),
                      3 => 
                      array (
                        'key' => '100R15',
                        'value' => 14701564,
                      ),
                      4 => 
                      array (
                        'key' => '100R16',
                        'value' => 14701570,
                      ),
                      5 => 
                      array (
                        'key' => '100R17',
                        'value' => 14701576,
                      ),
                      6 => 
                      array (
                        'key' => '100R19',
                        'value' => 14701575,
                      ),
                      7 => 
                      array (
                        'key' => '100R1AT',
                        'value' => 14701572,
                      ),
                      8 => 
                      array (
                        'key' => '100R2AT',
                        'value' => 14701573,
                      ),
                      9 => 
                      array (
                        'key' => '11237 R19',
                        'value' => 14701577,
                      ),
                      10 => 
                      array (
                        'key' => '11851 - 1.4301',
                        'value' => 14701560,
                      ),
                      11 => 
                      array (
                        'key' => '12115:2011',
                        'value' => 14701522,
                      ),
                      12 => 
                      array (
                        'key' => '14593/14594',
                        'value' => 14701520,
                      ),
                      13 => 
                      array (
                        'key' => ' 1529/2014',
                        'value' => 14701536,
                      ),
                      14 => 
                      array (
                        'key' => '15807 (UIC830-1V)',
                        'value' => 14701588,
                      ),
                      15 => 
                      array (
                        'key' => '16421 (W270)',
                        'value' => 14701587,
                      ),
                      16 => 
                      array (
                        'key' => '16436-1:2016  CLASS-2 (10 bar)',
                        'value' => 14701521,
                      ),
                      17 => 
                      array (
                        'key' => '16436-1:2016 CLASS 3 (30 bar)',
                        'value' => 14701568,
                      ),
                      18 => 
                      array (
                        'key' => '16436-1:2016 Class 3 (30 bar)',
                        'value' => 14701567,
                      ),
                      19 => 
                      array (
                        'key' => '1761',
                        'value' => 14701523,
                      ),
                      20 => 
                      array (
                        'key' => '1825',
                        'value' => 14701539,
                      ),
                      21 => 
                      array (
                        'key' => '1935/2004',
                        'value' => 14701547,
                      ),
                      22 => 
                      array (
                        'key' => '20018-1',
                        'value' => 14701510,
                      ),
                      23 => 
                      array (
                        'key' => '20023 4SH',
                        'value' => 14701578,
                      ),
                      24 => 
                      array (
                        'key' => '20023 4SP',
                        'value' => 14701579,
                      ),
                      25 => 
                      array (
                        'key' => '2023/2006',
                        'value' => 14701548,
                      ),
                      26 => 
                      array (
                        'key' => '2153',
                        'value' => 14701535,
                      ),
                      27 => 
                      array (
                        'key' => '2398:2017 1A',
                        'value' => 14701556,
                      ),
                      28 => 
                      array (
                        'key' => '2398:2017 2C/L-T',
                        'value' => 14701529,
                      ),
                      29 => 
                      array (
                        'key' => '2398:2017 3C/L-T',
                        'value' => 14701528,
                      ),
                      30 => 
                      array (
                        'key' => '250',
                        'value' => 14701524,
                      ),
                      31 => 
                      array (
                        'key' => '333 N1',
                        'value' => 14701531,
                      ),
                      32 => 
                      array (
                        'key' => '333 N1W',
                        'value' => 14701530,
                      ),
                      33 => 
                      array (
                        'key' => '3821:2020',
                        'value' => 14701566,
                      ),
                      34 => 
                      array (
                        'key' => '407:2007',
                        'value' => 14701538,
                      ),
                      35 => 
                      array (
                        'key' => '45545-2 HL3 (R22+R23)',
                        'value' => 14701519,
                      ),
                      36 => 
                      array (
                        'key' => '5510-2',
                        'value' => 14701511,
                      ),
                      37 => 
                      array (
                        'key' => '590',
                        'value' => 14701555,
                      ),
                      38 => 
                      array (
                        'key' => '6134-1A',
                        'value' => 14701525,
                      ),
                      39 => 
                      array (
                        'key' => '6134-2A',
                        'value' => 14701526,
                      ),
                      40 => 
                      array (
                        'key' => '6134-2B',
                        'value' => 14701527,
                      ),
                      41 => 
                      array (
                        'key' => '6254.12',
                        'value' => 14701553,
                      ),
                      42 => 
                      array (
                        'key' => '6254.16',
                        'value' => 14701554,
                      ),
                      43 => 
                      array (
                        'key' => '6257.21',
                        'value' => 14701514,
                      ),
                      44 => 
                      array (
                        'key' => '6257.70',
                        'value' => 14701512,
                      ),
                      45 => 
                      array (
                        'key' => '6257.72',
                        'value' => 14701513,
                      ),
                      46 => 
                      array (
                        'key' => '6615G',
                        'value' => 14701537,
                      ),
                      47 => 
                      array (
                        'key' => '73379 Typ A1',
                        'value' => 14701585,
                      ),
                      48 => 
                      array (
                        'key' => '73379 Typ B1',
                        'value' => 14701583,
                      ),
                      49 => 
                      array (
                        'key' => '73411-B',
                        'value' => 14701557,
                      ),
                      50 => 
                      array (
                        'key' => '74310',
                        'value' => 14701509,
                      ),
                      51 => 
                      array (
                        'key' => '830-1/V',
                        'value' => 14701532,
                      ),
                      52 => 
                      array (
                        'key' => '853',
                        'value' => 14701515,
                      ),
                      53 => 
                      array (
                        'key' => '853 1SN',
                        'value' => 14701563,
                      ),
                      54 => 
                      array (
                        'key' => '853 2SN',
                        'value' => 14701574,
                      ),
                      55 => 
                      array (
                        'key' => '854',
                        'value' => 14701516,
                      ),
                      56 => 
                      array (
                        'key' => '856',
                        'value' => 14701517,
                      ),
                      57 => 
                      array (
                        'key' => '856 4SH',
                        'value' => 14701562,
                      ),
                      58 => 
                      array (
                        'key' => '856 4SP',
                        'value' => 14701569,
                      ),
                      59 => 
                      array (
                        'key' => '857',
                        'value' => 14701518,
                      ),
                      60 => 
                      array (
                        'key' => '857 2SC',
                        'value' => 14701571,
                      ),
                      61 => 
                      array (
                        'key' => 'BWGL',
                        'value' => 14701586,
                      ),
                      62 => 
                      array (
                        'key' => 'CLASS VI',
                        'value' => 14701550,
                      ),
                      63 => 
                      array (
                        'key' => 'Class A',
                        'value' => 14701533,
                      ),
                      64 => 
                      array (
                        'key' => 'DB/SBB',
                        'value' => 14701559,
                      ),
                      65 => 
                      array (
                        'key' => 'DVGW',
                        'value' => 14701589,
                      ),
                      66 => 
                      array (
                        'key' => 'Dry Food',
                        'value' => 14701581,
                      ),
                      67 => 
                      array (
                        'key' => 'EC Regulation no. 1907/2006',
                        'value' => 14701540,
                      ),
                      68 => 
                      array (
                        'key' => 'GERMANISCHEN LLOYD ',
                        'value' => 14701534,
                      ),
                      69 => 
                      array (
                        'key' => 'J20 R3/R4 D3 - HT - EC',
                        'value' => 14701558,
                      ),
                      70 => 
                      array (
                        'key' => 'J30 R9',
                        'value' => 14701584,
                      ),
                      71 => 
                      array (
                        'key' => 'Licensed in accordance with BS 6920-1:2000',
                        'value' => 14701551,
                      ),
                      72 => 
                      array (
                        'key' => 'Licensed in accordance with Pipes guideline for plastics used for drinking water, DVGW W270 and VP 549',
                        'value' => 14701552,
                      ),
                      73 => 
                      array (
                        'key' => 'MSHA',
                        'value' => 14701580,
                      ),
                      74 => 
                      array (
                        'key' => 'Made in Germany',
                        'value' => 14701508,
                      ),
                      75 => 
                      array (
                        'key' => 'New node',
                        'value' => 14701582,
                      ),
                      76 => 
                      array (
                        'key' => 'Recommendation III',
                        'value' => 14701544,
                      ),
                      77 => 
                      array (
                        'key' => 'Recommendation XXI, Cat. 2',
                        'value' => 14701545,
                      ),
                      78 => 
                      array (
                        'key' => 'Recommendation XXI, Cat. 4',
                        'value' => 14701546,
                      ),
                      79 => 
                      array (
                        'key' => 'Regulation 177.1520',
                        'value' => 14701541,
                      ),
                      80 => 
                      array (
                        'key' => 'Regulation 177.1550',
                        'value' => 14701543,
                      ),
                      81 => 
                      array (
                        'key' => 'Regulation 177.2600',
                        'value' => 14701542,
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
                            'key' => 'AEM',
                            'value' => 14703002,
                          ),
                          1 => 
                          array (
                            'key' => 'CIIR',
                            'value' => 14702995,
                          ),
                          2 => 
                          array (
                            'key' => 'CM',
                            'value' => 14703008,
                          ),
                          3 => 
                          array (
                            'key' => 'CPE',
                            'value' => 14703007,
                          ),
                          4 => 
                          array (
                            'key' => 'CR',
                            'value' => 14702991,
                          ),
                          5 => 
                          array (
                            'key' => 'CR-EPDM',
                            'value' => 14702992,
                          ),
                          6 => 
                          array (
                            'key' => 'CSM/BR',
                            'value' => 14703000,
                          ),
                          7 => 
                          array (
                            'key' => 'ECO',
                            'value' => 14703010,
                          ),
                          8 => 
                          array (
                            'key' => 'EPDM',
                            'value' => 14702988,
                          ),
                          9 => 
                          array (
                            'key' => 'EPDM black or EPM white',
                            'value' => 14703017,
                          ),
                          10 => 
                          array (
                            'key' => 'FEP',
                            'value' => 14702994,
                          ),
                          11 => 
                          array (
                            'key' => 'FPM',
                            'value' => 14703009,
                          ),
                          12 => 
                          array (
                            'key' => 'FPM/AEM',
                            'value' => 14703012,
                          ),
                          13 => 
                          array (
                            'key' => 'FPM/ECO',
                            'value' => 14703013,
                          ),
                          14 => 
                          array (
                            'key' => 'FPM/HNBR',
                            'value' => 14703011,
                          ),
                          15 => 
                          array (
                            'key' => 'Fluoroplastic ',
                            'value' => 14703001,
                          ),
                          16 => 
                          array (
                            'key' => 'HNBR',
                            'value' => 14703014,
                          ),
                          17 => 
                          array (
                            'key' => 'NBR',
                            'value' => 14702989,
                          ),
                          18 => 
                          array (
                            'key' => 'NR',
                            'value' => 14702990,
                          ),
                          19 => 
                          array (
                            'key' => 'PA',
                            'value' => 14702997,
                          ),
                          20 => 
                          array (
                            'key' => 'PTFE',
                            'value' => 14703018,
                          ),
                          21 => 
                          array (
                            'key' => 'PU',
                            'value' => 14703016,
                          ),
                          22 => 
                          array (
                            'key' => 'SBR',
                            'value' => 14702996,
                          ),
                          23 => 
                          array (
                            'key' => 'SBR-BR',
                            'value' => 14703003,
                          ),
                          24 => 
                          array (
                            'key' => 'SBR-EPDM',
                            'value' => 14702999,
                          ),
                          25 => 
                          array (
                            'key' => 'SBR-NR',
                            'value' => 14703004,
                          ),
                          26 => 
                          array (
                            'key' => 'Special elastomer',
                            'value' => 14702998,
                          ),
                          27 => 
                          array (
                            'key' => 'Synthetic rubber',
                            'value' => 14703006,
                          ),
                          28 => 
                          array (
                            'key' => 'UHMWPE',
                            'value' => 14703015,
                          ),
                          29 => 
                          array (
                            'key' => 'UPE',
                            'value' => 14702993,
                          ),
                          30 => 
                          array (
                            'key' => 'no fuel solubility',
                            'value' => 14703005,
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
                            'key' => 'black',
                            'value' => 14702923,
                          ),
                          1 => 
                          array (
                            'key' => 'black or white',
                            'value' => 14702929,
                          ),
                          2 => 
                          array (
                            'key' => 'blue',
                            'value' => 14702926,
                          ),
                          3 => 
                          array (
                            'key' => 'bright',
                            'value' => 14702925,
                          ),
                          4 => 
                          array (
                            'key' => 'grey',
                            'value' => 14702924,
                          ),
                          5 => 
                          array (
                            'key' => 'light grey',
                            'value' => 14702930,
                          ),
                          6 => 
                          array (
                            'key' => 'orange',
                            'value' => 14702928,
                          ),
                          7 => 
                          array (
                            'key' => 'red',
                            'value' => 14702927,
                          ),
                          8 => 
                          array (
                            'key' => 'transparent',
                            'value' => 14702921,
                          ),
                          9 => 
                          array (
                            'key' => 'white',
                            'value' => 14702922,
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
                            'key' => '2 galvanized reinforcements',
                            'value' => 14703298,
                          ),
                          1 => 
                          array (
                            'key' => '4 alternating layers of spiraled high-tensile wire',
                            'value' => 14703303,
                          ),
                          2 => 
                          array (
                            'key' => 'Aramid',
                            'value' => 14703297,
                          ),
                          3 => 
                          array (
                            'key' => 'CMD',
                            'value' => 14703306,
                          ),
                          4 => 
                          array (
                            'key' => 'CO',
                            'value' => 14703307,
                          ),
                          5 => 
                          array (
                            'key' => 'PPS',
                            'value' => 14703305,
                          ),
                          6 => 
                          array (
                            'key' => 'Stainless steel braids (1.4401), glass fibre braids and elastomer interlayers',
                            'value' => 14703310,
                          ),
                          7 => 
                          array (
                            'key' => 'Steel cord layers',
                            'value' => 14703309,
                          ),
                          8 => 
                          array (
                            'key' => 'Steel wire braids with embedded additional weights',
                            'value' => 14703304,
                          ),
                          9 => 
                          array (
                            'key' => 'Synthetic corded plies',
                            'value' => 14703299,
                          ),
                          10 => 
                          array (
                            'key' => 'Synthetic fibres',
                            'value' => 14703296,
                          ),
                          11 => 
                          array (
                            'key' => 'Synthetic yarns with steel wire braid',
                            'value' => 14703302,
                          ),
                          12 => 
                          array (
                            'key' => 'Synthetic yarns, rubberised, black, optionally with embedded steel wire spiral',
                            'value' => 14703308,
                          ),
                          13 => 
                          array (
                            'key' => 'Textile reinforcement with 2 embedded Cu-wires',
                            'value' => 14703300,
                          ),
                          14 => 
                          array (
                            'key' => 'high tension steel wire',
                            'value' => 14703301,
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
                            'key' => 'With 2 spiralled copper strands',
                            'value' => 14702979,
                          ),
                          1 => 
                          array (
                            'key' => 'With antistatic wire',
                            'value' => 14702985,
                          ),
                          2 => 
                          array (
                            'key' => 'With copper wire',
                            'value' => 14702980,
                          ),
                          3 => 
                          array (
                            'key' => 'With galvanised spring steel helix',
                            'value' => 14702982,
                          ),
                          4 => 
                          array (
                            'key' => 'With integrated plastic helix',
                            'value' => 14702978,
                          ),
                          5 => 
                          array (
                            'key' => 'With integrated steel wire helix',
                            'value' => 14702977,
                          ),
                          6 => 
                          array (
                            'key' => 'With integrated steel wire spiral and antistatic wire',
                            'value' => 14702986,
                          ),
                          7 => 
                          array (
                            'key' => 'With spring wire spiral',
                            'value' => 14702981,
                          ),
                          8 => 
                          array (
                            'key' => 'With steel helix from DN 25',
                            'value' => 14702983,
                          ),
                          9 => 
                          array (
                            'key' => 'With steel wire braid',
                            'value' => 14702984,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Partial lining with special fleece and fluidisation channels underneath (max. 2 bar)',
                            'value' => 14703265,
                          ),
                          1 => 
                          array (
                            'key' => 'absolutely neutral to taste and odour',
                            'value' => 14703251,
                          ),
                          2 => 
                          array (
                            'key' => 'according to FDA ',
                            'value' => 14703263,
                          ),
                          3 => 
                          array (
                            'key' => 'according to FDA (21 CFR 177.2600)',
                            'value' => 14703253,
                          ),
                          4 => 
                          array (
                            'key' => 'according to recommendation XXI, cat. 2 of BfR',
                            'value' => 14703252,
                          ),
                          5 => 
                          array (
                            'key' => 'almost odourless',
                            'value' => 14703264,
                          ),
                          6 => 
                          array (
                            'key' => 'anti-adhesive',
                            'value' => 14703245,
                          ),
                          7 => 
                          array (
                            'key' => 'can be detected magnetically or by X-rays',
                            'value' => 14703267,
                          ),
                          8 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω',
                            'value' => 14703260,
                          ),
                          9 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω/m',
                            'value' => 14703257,
                          ),
                          10 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>9</sup> Ω/m',
                            'value' => 14703261,
                          ),
                          11 => 
                          array (
                            'key' => 'electrically insulating, R > 10<sup>9</sup> Ω/m',
                            'value' => 14703262,
                          ),
                          12 => 
                          array (
                            'key' => 'electrically noncondctive',
                            'value' => 14703249,
                          ),
                          13 => 
                          array (
                            'key' => 'extruded',
                            'value' => 14703266,
                          ),
                          14 => 
                          array (
                            'key' => 'high-performing',
                            'value' => 14703244,
                          ),
                          15 => 
                          array (
                            'key' => 'highly abrasion resisitant ',
                            'value' => 14703246,
                          ),
                          16 => 
                          array (
                            'key' => 'highly abrasion resistant (acc. to DIN ISO 4649-A: <60mm³)',
                            'value' => 14703258,
                          ),
                          17 => 
                          array (
                            'key' => 'homogenous',
                            'value' => 14703240,
                          ),
                          18 => 
                          array (
                            'key' => 'impermeable',
                            'value' => 14703247,
                          ),
                          19 => 
                          array (
                            'key' => 'meets FDA (21 CFR 177.1550) and USP CLASS VI',
                            'value' => 14703250,
                          ),
                          20 => 
                          array (
                            'key' => 'no fuel solubility',
                            'value' => 14703259,
                          ),
                          21 => 
                          array (
                            'key' => 'non-porous',
                            'value' => 14703242,
                          ),
                          22 => 
                          array (
                            'key' => 'plasticizer-free',
                            'value' => 14703243,
                          ),
                          23 => 
                          array (
                            'key' => 'resistant to oil and fats',
                            'value' => 14703254,
                          ),
                          24 => 
                          array (
                            'key' => 'seamless',
                            'value' => 14703248,
                          ),
                          25 => 
                          array (
                            'key' => 'smooth',
                            'value' => 14703241,
                          ),
                          26 => 
                          array (
                            'key' => ' with Conti Orange Wear Indicator',
                            'value' => 14703255,
                          ),
                          27 => 
                          array (
                            'key' => 'with black coiled OHM conductive stripe',
                            'value' => 14703256,
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'propertiesInn',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
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
                            'key' => 'AEM',
                            'value' => 14702957,
                          ),
                          1 => 
                          array (
                            'key' => 'CIIR',
                            'value' => 14702951,
                          ),
                          2 => 
                          array (
                            'key' => 'CM',
                            'value' => 14702958,
                          ),
                          3 => 
                          array (
                            'key' => 'CMD',
                            'value' => 14702965,
                          ),
                          4 => 
                          array (
                            'key' => 'CO',
                            'value' => 14702969,
                          ),
                          5 => 
                          array (
                            'key' => 'CPE',
                            'value' => 14702964,
                          ),
                          6 => 
                          array (
                            'key' => 'CR',
                            'value' => 14702947,
                          ),
                          7 => 
                          array (
                            'key' => 'CR-BR',
                            'value' => 14702960,
                          ),
                          8 => 
                          array (
                            'key' => 'CR-EPDM',
                            'value' => 14702948,
                          ),
                          9 => 
                          array (
                            'key' => 'CSM',
                            'value' => 14702967,
                          ),
                          10 => 
                          array (
                            'key' => 'CSM-BR ',
                            'value' => 14702955,
                          ),
                          11 => 
                          array (
                            'key' => 'ECO',
                            'value' => 14702968,
                          ),
                          12 => 
                          array (
                            'key' => 'EPDM',
                            'value' => 14702944,
                          ),
                          13 => 
                          array (
                            'key' => 'FEP',
                            'value' => 14702950,
                          ),
                          14 => 
                          array (
                            'key' => 'IR-BR',
                            'value' => 14702961,
                          ),
                          15 => 
                          array (
                            'key' => 'NBR',
                            'value' => 14702945,
                          ),
                          16 => 
                          array (
                            'key' => 'NBR-PVC',
                            'value' => 14702970,
                          ),
                          17 => 
                          array (
                            'key' => 'NR',
                            'value' => 14702946,
                          ),
                          18 => 
                          array (
                            'key' => 'PA',
                            'value' => 14702953,
                          ),
                          19 => 
                          array (
                            'key' => 'PES',
                            'value' => 14702966,
                          ),
                          20 => 
                          array (
                            'key' => 'SBR',
                            'value' => 14702952,
                          ),
                          21 => 
                          array (
                            'key' => 'SBR-BR',
                            'value' => 14702959,
                          ),
                          22 => 
                          array (
                            'key' => 'SBR-EPDM',
                            'value' => 14702954,
                          ),
                          23 => 
                          array (
                            'key' => 'SBR-NR',
                            'value' => 14702962,
                          ),
                          24 => 
                          array (
                            'key' => 'Spezial elastomer',
                            'value' => 14702956,
                          ),
                          25 => 
                          array (
                            'key' => 'Synthetic rubber',
                            'value' => 14702963,
                          ),
                          26 => 
                          array (
                            'key' => 'UPE',
                            'value' => 14702949,
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
                         'title' => 'Cover ',
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
                            'key' => 'black',
                            'value' => 14702938,
                          ),
                          1 => 
                          array (
                            'key' => 'blue',
                            'value' => 14702933,
                          ),
                          2 => 
                          array (
                            'key' => 'blue and red',
                            'value' => 14702942,
                          ),
                          3 => 
                          array (
                            'key' => 'bright',
                            'value' => 14702935,
                          ),
                          4 => 
                          array (
                            'key' => 'grey',
                            'value' => 14702934,
                          ),
                          5 => 
                          array (
                            'key' => 'orange',
                            'value' => 14702936,
                          ),
                          6 => 
                          array (
                            'key' => 'red',
                            'value' => 14702937,
                          ),
                          7 => 
                          array (
                            'key' => 'red-orange',
                            'value' => 14702941,
                          ),
                          8 => 
                          array (
                            'key' => 'transparent',
                            'value' => 14702939,
                          ),
                          9 => 
                          array (
                            'key' => 'white',
                            'value' => 14702940,
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
                            'key' => 'grooved',
                            'value' => 14702975,
                          ),
                          2 => 
                          array (
                            'key' => 'smooth',
                            'value' => 14702973,
                          ),
                          3 => 
                          array (
                            'key' => 'strongly corrugated',
                            'value' => 14702974,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω/m',
                            'value' => 14703294,
                          ),
                          1 => 
                          array (
                            'key' => 'abrasion resistant',
                            'value' => 14703269,
                          ),
                          2 => 
                          array (
                            'key' => 'ageing resistant',
                            'value' => 14703283,
                          ),
                          3 => 
                          array (
                            'key' => 'chemical-resistant',
                            'value' => 14703273,
                          ),
                          4 => 
                          array (
                            'key' => 'electrically conductive',
                            'value' => 14703287,
                          ),
                          5 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω',
                            'value' => 14703290,
                          ),
                          6 => 
                          array (
                            'key' => 'flame resistant',
                            'value' => 14703278,
                          ),
                          7 => 
                          array (
                            'key' => 'flame-resistant (MSHA compliant)',
                            'value' => 14703288,
                          ),
                          8 => 
                          array (
                            'key' => 'from DN 25 upward fabric patterned',
                            'value' => 14703285,
                          ),
                          9 => 
                          array (
                            'key' => 'from DN 28 upward CR-cover (fabric patterned)',
                            'value' => 14703276,
                          ),
                          10 => 
                          array (
                            'key' => 'from DN 28 upward fabric patterned',
                            'value' => 14703275,
                          ),
                          11 => 
                          array (
                            'key' => 'from DN 32 upward CR-cover (fabric patterned)',
                            'value' => 14703279,
                          ),
                          12 => 
                          array (
                            'key' => 'from DN 32 upward fabric patterned',
                            'value' => 14703280,
                          ),
                          13 => 
                          array (
                            'key' => 'highly abrasion resistant (acc. to DIN ISO 4649-A: <60mm³)',
                            'value' => 14703293,
                          ),
                          14 => 
                          array (
                            'key' => 'hydrocarbon resistant',
                            'value' => 14703286,
                          ),
                          15 => 
                          array (
                            'key' => 'optional',
                            'value' => 14703291,
                          ),
                          16 => 
                          array (
                            'key' => 'resistant to chicken and fish fat',
                            'value' => 14703289,
                          ),
                          17 => 
                          array (
                            'key' => 'resistant to excrements',
                            'value' => 14703272,
                          ),
                          18 => 
                          array (
                            'key' => 'resistant to fats',
                            'value' => 14703274,
                          ),
                          19 => 
                          array (
                            'key' => 'resistant to oil and fats',
                            'value' => 14703271,
                          ),
                          20 => 
                          array (
                            'key' => 'resistant to ozone, weather and UV',
                            'value' => 14703270,
                          ),
                          21 => 
                          array (
                            'key' => 'resistant to process water and oily air',
                            'value' => 14703281,
                          ),
                          22 => 
                          array (
                            'key' => 'resistant to short influence of oil and chemicals',
                            'value' => 14703282,
                          ),
                          23 => 
                          array (
                            'key' => 'wear-resisitant',
                            'value' => 14703277,
                          ),
                          24 => 
                          array (
                            'key' => 'with black coiled OHM conductive stripe',
                            'value' => 14703284,
                          ),
                          25 => 
                          array (
                            'key' => 'with heat protection cover',
                            'value' => 14703292,
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                         'optionsProviderData' => 'propertiesOut',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
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
                            'key' => 'Abattoirs',
                            'value' => 14701059,
                          ),
                          1 => 
                          array (
                            'key' => 'Agricultural sector',
                            'value' => 14701026,
                          ),
                          2 => 
                          array (
                            'key' => 'Automobile industry',
                            'value' => 14701082,
                          ),
                          3 => 
                          array (
                            'key' => 'Beverage industry',
                            'value' => 14701015,
                          ),
                          4 => 
                          array (
                            'key' => 'Breweries',
                            'value' => 14701048,
                          ),
                          5 => 
                          array (
                            'key' => 'Buliding cleaning services',
                            'value' => 14701088,
                          ),
                          6 => 
                          array (
                            'key' => 'Camping and caravanning',
                            'value' => 14701016,
                          ),
                          7 => 
                          array (
                            'key' => 'Cheese dairies',
                            'value' => 14701056,
                          ),
                          8 => 
                          array (
                            'key' => 'Chemical and petrochemical industry',
                            'value' => 14701065,
                          ),
                          9 => 
                          array (
                            'key' => 'Commercial kitchens',
                            'value' => 14701017,
                          ),
                          10 => 
                          array (
                            'key' => 'Commercial washing machines and dishwashers',
                            'value' => 14701033,
                          ),
                          11 => 
                          array (
                            'key' => 'Compressed air and compressor manufacturers',
                            'value' => 14701071,
                          ),
                          12 => 
                          array (
                            'key' => 'Construction industry',
                            'value' => 14701020,
                          ),
                          13 => 
                          array (
                            'key' => 'Construction of bridges',
                            'value' => 14701078,
                          ),
                          14 => 
                          array (
                            'key' => 'Cooling and heating systems',
                            'value' => 14701041,
                          ),
                          15 => 
                          array (
                            'key' => 'Cooling systems in combustion engines',
                            'value' => 14701040,
                          ),
                          16 => 
                          array (
                            'key' => 'Dairies',
                            'value' => 14701055,
                          ),
                          17 => 
                          array (
                            'key' => 'Distillereies',
                            'value' => 14701049,
                          ),
                          18 => 
                          array (
                            'key' => 'Ex zones',
                            'value' => 14701047,
                          ),
                          19 => 
                          array (
                            'key' => 'Field of compressed air handling',
                            'value' => 14701075,
                          ),
                          20 => 
                          array (
                            'key' => 'Filling machines',
                            'value' => 14701051,
                          ),
                          21 => 
                          array (
                            'key' => 'Fish processing',
                            'value' => 14701058,
                          ),
                          22 => 
                          array (
                            'key' => 'Fleets',
                            'value' => 14701028,
                          ),
                          23 => 
                          array (
                            'key' => 'Foodstuff industry',
                            'value' => 14701014,
                          ),
                          24 => 
                          array (
                            'key' => 'Foodstuffs companies',
                            'value' => 14701053,
                          ),
                          25 => 
                          array (
                            'key' => 'Forestry',
                            'value' => 14701086,
                          ),
                          26 => 
                          array (
                            'key' => 'Foundries',
                            'value' => 14701077,
                          ),
                          27 => 
                          array (
                            'key' => 'Furnaces',
                            'value' => 14701046,
                          ),
                          28 => 
                          array (
                            'key' => 'Garages',
                            'value' => 14701029,
                          ),
                          29 => 
                          array (
                            'key' => 'General industry',
                            'value' => 14701023,
                          ),
                          30 => 
                          array (
                            'key' => 'Horticultural companies',
                            'value' => 14701066,
                          ),
                          31 => 
                          array (
                            'key' => 'Industry',
                            'value' => 14701027,
                          ),
                          32 => 
                          array (
                            'key' => 'Installation and heating system companies',
                            'value' => 14701076,
                          ),
                          33 => 
                          array (
                            'key' => 'Iron foundries',
                            'value' => 14701090,
                          ),
                          34 => 
                          array (
                            'key' => 'Jam factories',
                            'value' => 14701063,
                          ),
                          35 => 
                          array (
                            'key' => 'Landscaping and gardening',
                            'value' => 14701031,
                          ),
                          36 => 
                          array (
                            'key' => 'Large-scale butcheries',
                            'value' => 14701062,
                          ),
                          37 => 
                          array (
                            'key' => 'Largescale garages',
                            'value' => 14701074,
                          ),
                          38 => 
                          array (
                            'key' => 'Machinery and plant engineering',
                            'value' => 14701039,
                          ),
                          39 => 
                          array (
                            'key' => 'Manufacturers of welding apparatus',
                            'value' => 14701080,
                          ),
                          40 => 
                          array (
                            'key' => 'Margarine factories',
                            'value' => 14701057,
                          ),
                          41 => 
                          array (
                            'key' => 'Metal surface treatment',
                            'value' => 14701022,
                          ),
                          42 => 
                          array (
                            'key' => 'Milk collection vehicles',
                            'value' => 14701064,
                          ),
                          43 => 
                          array (
                            'key' => 'Mineral oil industry',
                            'value' => 14701087,
                          ),
                          44 => 
                          array (
                            'key' => 'Mining industry',
                            'value' => 14701043,
                          ),
                          45 => 
                          array (
                            'key' => 'Mobile or stationary hose lines',
                            'value' => 14701032,
                          ),
                          46 => 
                          array (
                            'key' => 'Municipal emergency water supply',
                            'value' => 14701018,
                          ),
                          47 => 
                          array (
                            'key' => 'Municipal enterprises',
                            'value' => 14701025,
                          ),
                          48 => 
                          array (
                            'key' => 'Mushroom heaters, grills, flame weeding devices',
                            'value' => 14701085,
                          ),
                          49 => 
                          array (
                            'key' => 'Oil mills',
                            'value' => 14701060,
                          ),
                          50 => 
                          array (
                            'key' => 'Open land',
                            'value' => 14701021,
                          ),
                          51 => 
                          array (
                            'key' => 'Other installations in the brewing, beverage and spirits industry',
                            'value' => 14701052,
                          ),
                          52 => 
                          array (
                            'key' => 'Outdoor events',
                            'value' => 14701019,
                          ),
                          53 => 
                          array (
                            'key' => 'Over- and underground workings',
                            'value' => 14701024,
                          ),
                          54 => 
                          array (
                            'key' => 'Passenger and commercial vehicles',
                            'value' => 14701042,
                          ),
                          55 => 
                          array (
                            'key' => 'Petrol stations',
                            'value' => 14701073,
                          ),
                          56 => 
                          array (
                            'key' => 'Pharmaceutical and cosmetic industry',
                            'value' => 14701054,
                          ),
                          57 => 
                          array (
                            'key' => 'Pressure controlled gas units',
                            'value' => 14701084,
                          ),
                          58 => 
                          array (
                            'key' => 'Private Area',
                            'value' => 14701034,
                          ),
                          59 => 
                          array (
                            'key' => 'Processing of metal surfaces',
                            'value' => 14701089,
                          ),
                          60 => 
                          array (
                            'key' => 'Public festivals',
                            'value' => 14701044,
                          ),
                          61 => 
                          array (
                            'key' => 'Quarry',
                            'value' => 14701070,
                          ),
                          62 => 
                          array (
                            'key' => 'Railway industry',
                            'value' => 14701035,
                          ),
                          63 => 
                          array (
                            'key' => 'Refineries',
                            'value' => 14701067,
                          ),
                          64 => 
                          array (
                            'key' => 'Rendering plants',
                            'value' => 14701061,
                          ),
                          65 => 
                          array (
                            'key' => 'Shipping industry',
                            'value' => 14701068,
                          ),
                          66 => 
                          array (
                            'key' => 'Shipyards',
                            'value' => 14701037,
                          ),
                          67 => 
                          array (
                            'key' => 'Silo vehicles',
                            'value' => 14701069,
                          ),
                          68 => 
                          array (
                            'key' => 'Steel and iron industry',
                            'value' => 14701072,
                          ),
                          69 => 
                          array (
                            'key' => 'Steel construction',
                            'value' => 14701081,
                          ),
                          70 => 
                          array (
                            'key' => 'Weekly, Christmas and fair markets',
                            'value' => 14701045,
                          ),
                          71 => 
                          array (
                            'key' => 'Welding and brazing machines',
                            'value' => 14701083,
                          ),
                          72 => 
                          array (
                            'key' => 'Welding shops',
                            'value' => 14701079,
                          ),
                          73 => 
                          array (
                            'key' => 'White goods industry',
                            'value' => 14701036,
                          ),
                          74 => 
                          array (
                            'key' => 'Wine press houses',
                            'value' => 14701050,
                          ),
                          75 => 
                          array (
                            'key' => 'Workshops',
                            'value' => 14701030,
                          ),
                          76 => 
                          array (
                            'key' => 'Yacht construction',
                            'value' => 14701038,
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
                            'key' => 'Abrasive bulk material',
                            'value' => 14701330,
                          ),
                          1 => 
                          array (
                            'key' => 'Abrasive foods',
                            'value' => 14701484,
                          ),
                          2 => 
                          array (
                            'key' => 'Acetates',
                            'value' => 14701436,
                          ),
                          3 => 
                          array (
                            'key' => 'Acetylene gas',
                            'value' => 14701410,
                          ),
                          4 => 
                          array (
                            'key' => 'Acidic foods ',
                            'value' => 14701482,
                          ),
                          5 => 
                          array (
                            'key' => 'Acids',
                            'value' => 14701376,
                          ),
                          6 => 
                          array (
                            'key' => 'Activated carbon',
                            'value' => 14701488,
                          ),
                          7 => 
                          array (
                            'key' => 'Air',
                            'value' => 14701367,
                          ),
                          8 => 
                          array (
                            'key' => 'Alcohol',
                            'value' => 14701326,
                          ),
                          9 => 
                          array (
                            'key' => 'Alcohol <20%',
                            'value' => 14701480,
                          ),
                          10 => 
                          array (
                            'key' => 'Aldehydes',
                            'value' => 14701437,
                          ),
                          11 => 
                          array (
                            'key' => 'Aluminium Oxide',
                            'value' => 14701391,
                          ),
                          12 => 
                          array (
                            'key' => 'Aluminium oxide',
                            'value' => 14701453,
                          ),
                          13 => 
                          array (
                            'key' => ' Antifreeze and corrosion inhibitors',
                            'value' => 14701340,
                          ),
                          14 => 
                          array (
                            'key' => 'Antifreezing compounds',
                            'value' => 14701415,
                          ),
                          15 => 
                          array (
                            'key' => 'Argon',
                            'value' => 14701406,
                          ),
                          16 => 
                          array (
                            'key' => 'Ash',
                            'value' => 14701383,
                          ),
                          17 => 
                          array (
                            'key' => 'Beer',
                            'value' => 14701357,
                          ),
                          18 => 
                          array (
                            'key' => 'Benzine',
                            'value' => 14701409,
                          ),
                          19 => 
                          array (
                            'key' => 'Biodiesel resistant',
                            'value' => 14701491,
                          ),
                          20 => 
                          array (
                            'key' => 'Bitumen',
                            'value' => 14701365,
                          ),
                          21 => 
                          array (
                            'key' => 'Breathing air',
                            'value' => 14701408,
                          ),
                          22 => 
                          array (
                            'key' => 'Bulk material',
                            'value' => 14701493,
                          ),
                          23 => 
                          array (
                            'key' => 'Butane',
                            'value' => 14701411,
                          ),
                          24 => 
                          array (
                            'key' => 'Buttermilk',
                            'value' => 14701457,
                          ),
                          25 => 
                          array (
                            'key' => ' CO<sub>2</sub>',
                            'value' => 14701407,
                          ),
                          26 => 
                          array (
                            'key' => 'Carbon black',
                            'value' => 14701386,
                          ),
                          27 => 
                          array (
                            'key' => 'Caustics',
                            'value' => 14701377,
                          ),
                          28 => 
                          array (
                            'key' => 'Cement',
                            'value' => 14701389,
                          ),
                          29 => 
                          array (
                            'key' => 'Chalk',
                            'value' => 14701382,
                          ),
                          30 => 
                          array (
                            'key' => 'Cheese',
                            'value' => 14701464,
                          ),
                          31 => 
                          array (
                            'key' => 'Chemicals',
                            'value' => 14701331,
                          ),
                          32 => 
                          array (
                            'key' => 'Chlorine rubber lacquer',
                            'value' => 14701397,
                          ),
                          33 => 
                          array (
                            'key' => 'Chocolate',
                            'value' => 14701465,
                          ),
                          34 => 
                          array (
                            'key' => 'Citric acid ',
                            'value' => 14701469,
                          ),
                          35 => 
                          array (
                            'key' => 'Clean chemicals',
                            'value' => 14701495,
                          ),
                          36 => 
                          array (
                            'key' => 'Cleaning agents',
                            'value' => 14701430,
                          ),
                          37 => 
                          array (
                            'key' => 'Cleaning and disinfection agents ',
                            'value' => 14701375,
                          ),
                          38 => 
                          array (
                            'key' => 'Coal',
                            'value' => 14701384,
                          ),
                          39 => 
                          array (
                            'key' => 'Coal dust',
                            'value' => 14701449,
                          ),
                          40 => 
                          array (
                            'key' => 'Cold water',
                            'value' => 14701402,
                          ),
                          41 => 
                          array (
                            'key' => 'Commercially available cooling water additives in usual concentrations',
                            'value' => 14701505,
                          ),
                          42 => 
                          array (
                            'key' => 'Compressed air',
                            'value' => 14701338,
                          ),
                          43 => 
                          array (
                            'key' => 'Concrete',
                            'value' => 14701388,
                          ),
                          44 => 
                          array (
                            'key' => 'Condensate',
                            'value' => 14701497,
                          ),
                          45 => 
                          array (
                            'key' => 'Condensation',
                            'value' => 14701355,
                          ),
                          46 => 
                          array (
                            'key' => 'Cooling water',
                            'value' => 14701349,
                          ),
                          47 => 
                          array (
                            'key' => 'Corrosion preventives',
                            'value' => 14701422,
                          ),
                          48 => 
                          array (
                            'key' => 'Corundum',
                            'value' => 14701390,
                          ),
                          49 => 
                          array (
                            'key' => 'Cottage cheese',
                            'value' => 14701466,
                          ),
                          50 => 
                          array (
                            'key' => 'Dairy ice cream',
                            'value' => 14701486,
                          ),
                          51 => 
                          array (
                            'key' => 'Dairy products',
                            'value' => 14701361,
                          ),
                          52 => 
                          array (
                            'key' => 'Demineralised water',
                            'value' => 14701344,
                          ),
                          53 => 
                          array (
                            'key' => 'Diesel fuel',
                            'value' => 14701348,
                          ),
                          54 => 
                          array (
                            'key' => 'Disinfectants',
                            'value' => 14701412,
                          ),
                          55 => 
                          array (
                            'key' => 'Dough ',
                            'value' => 14701478,
                          ),
                          56 => 
                          array (
                            'key' => 'Dredging sludge',
                            'value' => 14701381,
                          ),
                          57 => 
                          array (
                            'key' => 'Dry Ice',
                            'value' => 14701487,
                          ),
                          58 => 
                          array (
                            'key' => 'Dry and oily compressed air',
                            'value' => 14701506,
                          ),
                          59 => 
                          array (
                            'key' => 'Dusty Media',
                            'value' => 14701489,
                          ),
                          60 => 
                          array (
                            'key' => 'Egg yolk',
                            'value' => 14701459,
                          ),
                          61 => 
                          array (
                            'key' => 'Emulsion paints',
                            'value' => 14701400,
                          ),
                          62 => 
                          array (
                            'key' => 'Engine oil',
                            'value' => 14701446,
                          ),
                          63 => 
                          array (
                            'key' => 'Epoxy laquer',
                            'value' => 14701399,
                          ),
                          64 => 
                          array (
                            'key' => 'Ester',
                            'value' => 14701438,
                          ),
                          65 => 
                          array (
                            'key' => 'Excrements',
                            'value' => 14701333,
                          ),
                          66 => 
                          array (
                            'key' => 'Explosive gas',
                            'value' => 14701414,
                          ),
                          67 => 
                          array (
                            'key' => 'Explosive gases and their mixtures',
                            'value' => 14701366,
                          ),
                          68 => 
                          array (
                            'key' => 'Extinguishing media',
                            'value' => 14701492,
                          ),
                          69 => 
                          array (
                            'key' => 'Fats',
                            'value' => 14701379,
                          ),
                          70 => 
                          array (
                            'key' => 'Fatty and oily products',
                            'value' => 14701347,
                          ),
                          71 => 
                          array (
                            'key' => 'Fatty foods',
                            'value' => 14701483,
                          ),
                          72 => 
                          array (
                            'key' => 'Fishmeal',
                            'value' => 14701477,
                          ),
                          73 => 
                          array (
                            'key' => 'Flour',
                            'value' => 14701394,
                          ),
                          74 => 
                          array (
                            'key' => 'Fly ash',
                            'value' => 14701451,
                          ),
                          75 => 
                          array (
                            'key' => 'Foodstuffs',
                            'value' => 14701481,
                          ),
                          76 => 
                          array (
                            'key' => 'Fruit ice cream',
                            'value' => 14701485,
                          ),
                          77 => 
                          array (
                            'key' => 'Fruits',
                            'value' => 14701460,
                          ),
                          78 => 
                          array (
                            'key' => 'Fuel',
                            'value' => 14701341,
                          ),
                          79 => 
                          array (
                            'key' => 'Fuel gases mixed with fluxes and oxygen',
                            'value' => 14701350,
                          ),
                          80 => 
                          array (
                            'key' => 'Fuel oil',
                            'value' => 14701444,
                          ),
                          81 => 
                          array (
                            'key' => 'Fuel-containing air',
                            'value' => 14701490,
                          ),
                          82 => 
                          array (
                            'key' => 'Fuels',
                            'value' => 14701346,
                          ),
                          83 => 
                          array (
                            'key' => 'Gas',
                            'value' => 14701404,
                          ),
                          84 => 
                          array (
                            'key' => 'Gasoil',
                            'value' => 14701417,
                          ),
                          85 => 
                          array (
                            'key' => 'Gear lubricant oil',
                            'value' => 14701447,
                          ),
                          86 => 
                          array (
                            'key' => 'Gelatine',
                            'value' => 14701458,
                          ),
                          87 => 
                          array (
                            'key' => 'Glues',
                            'value' => 14701370,
                          ),
                          88 => 
                          array (
                            'key' => 'Glycol solutions',
                            'value' => 14701418,
                          ),
                          89 => 
                          array (
                            'key' => 'Granulate (Salt, Sugar)',
                            'value' => 14701476,
                          ),
                          90 => 
                          array (
                            'key' => 'Granulate and powder media',
                            'value' => 14701328,
                          ),
                          91 => 
                          array (
                            'key' => 'Granules',
                            'value' => 14701419,
                          ),
                          92 => 
                          array (
                            'key' => 'Gravel',
                            'value' => 14701380,
                          ),
                          93 => 
                          array (
                            'key' => 'Hot air (not oily)',
                            'value' => 14701441,
                          ),
                          94 => 
                          array (
                            'key' => 'Hot cooling water',
                            'value' => 14701440,
                          ),
                          95 => 
                          array (
                            'key' => 'Hot water',
                            'value' => 14701403,
                          ),
                          96 => 
                          array (
                            'key' => 'Hydraulic fluids',
                            'value' => 14701420,
                          ),
                          97 => 
                          array (
                            'key' => 'Hydraulik oils',
                            'value' => 14701368,
                          ),
                          98 => 
                          array (
                            'key' => 'Hygenic/sanitary products',
                            'value' => 14701496,
                          ),
                          99 => 
                          array (
                            'key' => 'Ice',
                            'value' => 14701461,
                          ),
                          100 => 
                          array (
                            'key' => 'Industrial waste',
                            'value' => 14701455,
                          ),
                          101 => 
                          array (
                            'key' => 'Juice',
                            'value' => 14701471,
                          ),
                          102 => 
                          array (
                            'key' => 'Kerosene',
                            'value' => 14701421,
                          ),
                          103 => 
                          array (
                            'key' => 'Ketchup',
                            'value' => 14701472,
                          ),
                          104 => 
                          array (
                            'key' => 'Ketones',
                            'value' => 14701439,
                          ),
                          105 => 
                          array (
                            'key' => 'LPG',
                            'value' => 14701423,
                          ),
                          106 => 
                          array (
                            'key' => 'Lacquers',
                            'value' => 14701369,
                          ),
                          107 => 
                          array (
                            'key' => 'Lactic acid ',
                            'value' => 14701474,
                          ),
                          108 => 
                          array (
                            'key' => 'Lard',
                            'value' => 14701504,
                          ),
                          109 => 
                          array (
                            'key' => 'Limestone filler',
                            'value' => 14701452,
                          ),
                          110 => 
                          array (
                            'key' => 'Liquid gas',
                            'value' => 14701416,
                          ),
                          111 => 
                          array (
                            'key' => 'Liquid mud containing crude oil and grit ',
                            'value' => 14701494,
                          ),
                          112 => 
                          array (
                            'key' => 'Liquid oily and fatty foods',
                            'value' => 14701329,
                          ),
                          113 => 
                          array (
                            'key' => 'Lubricants',
                            'value' => 14701372,
                          ),
                          114 => 
                          array (
                            'key' => 'Lubricating oil',
                            'value' => 14701345,
                          ),
                          115 => 
                          array (
                            'key' => 'Micro silica',
                            'value' => 14701450,
                          ),
                          116 => 
                          array (
                            'key' => 'Microsilica',
                            'value' => 14701501,
                          ),
                          117 => 
                          array (
                            'key' => 'Milk',
                            'value' => 14701360,
                          ),
                          118 => 
                          array (
                            'key' => 'Milk powder',
                            'value' => 14701473,
                          ),
                          119 => 
                          array (
                            'key' => 'Mineral oil',
                            'value' => 14701424,
                          ),
                          120 => 
                          array (
                            'key' => 'Mineral oil and glycol-based hydraulic fluids',
                            'value' => 14701335,
                          ),
                          121 => 
                          array (
                            'key' => 'Mud',
                            'value' => 14701443,
                          ),
                          122 => 
                          array (
                            'key' => 'Mustard',
                            'value' => 14701468,
                          ),
                          123 => 
                          array (
                            'key' => 'Naphtha',
                            'value' => 14701425,
                          ),
                          124 => 
                          array (
                            'key' => 'Natural gas',
                            'value' => 14701413,
                          ),
                          125 => 
                          array (
                            'key' => 'Nitro cellulose lacquer',
                            'value' => 14701396,
                          ),
                          126 => 
                          array (
                            'key' => 'Nitrogen',
                            'value' => 14701405,
                          ),
                          127 => 
                          array (
                            'key' => 'Non-flammable gas',
                            'value' => 14701426,
                          ),
                          128 => 
                          array (
                            'key' => 'Oil',
                            'value' => 14701378,
                          ),
                          129 => 
                          array (
                            'key' => 'Oils',
                            'value' => 14701371,
                          ),
                          130 => 
                          array (
                            'key' => 'Oily air',
                            'value' => 14701363,
                          ),
                          131 => 
                          array (
                            'key' => 'Ore',
                            'value' => 14701385,
                          ),
                          132 => 
                          array (
                            'key' => 'Oxygen',
                            'value' => 14701353,
                          ),
                          133 => 
                          array (
                            'key' => 'PVC',
                            'value' => 14701502,
                          ),
                          134 => 
                          array (
                            'key' => 'Paints',
                            'value' => 14701352,
                          ),
                          135 => 
                          array (
                            'key' => 'Pesticides',
                            'value' => 14701433,
                          ),
                          136 => 
                          array (
                            'key' => 'Petroleum based products up to 50% aromatic component',
                            'value' => 14701448,
                          ),
                          137 => 
                          array (
                            'key' => 'Plastic granulates',
                            'value' => 14701454,
                          ),
                          138 => 
                          array (
                            'key' => 'Polar and aromatic solvents ',
                            'value' => 14701339,
                          ),
                          139 => 
                          array (
                            'key' => 'Polar solvents',
                            'value' => 14701435,
                          ),
                          140 => 
                          array (
                            'key' => 'Polyester lacquer',
                            'value' => 14701401,
                          ),
                          141 => 
                          array (
                            'key' => 'Polyurethane laqcuer',
                            'value' => 14701398,
                          ),
                          142 => 
                          array (
                            'key' => 'Potable water',
                            'value' => 14701362,
                          ),
                          143 => 
                          array (
                            'key' => 'Powder',
                            'value' => 14701479,
                          ),
                          144 => 
                          array (
                            'key' => 'Powder media',
                            'value' => 14701429,
                          ),
                          145 => 
                          array (
                            'key' => 'Powdery and fine-grained bulk materials (grain size "equal to/smaller than" 3mm)',
                            'value' => 14701503,
                          ),
                          146 => 
                          array (
                            'key' => 'Power steering oil',
                            'value' => 14701445,
                          ),
                          147 => 
                          array (
                            'key' => 'Pressurized air',
                            'value' => 14701427,
                          ),
                          148 => 
                          array (
                            'key' => 'Process water',
                            'value' => 14701374,
                          ),
                          149 => 
                          array (
                            'key' => 'Propane',
                            'value' => 14701428,
                          ),
                          150 => 
                          array (
                            'key' => 'Quarz powder',
                            'value' => 14701392,
                          ),
                          151 => 
                          array (
                            'key' => 'Raw milk',
                            'value' => 14701431,
                          ),
                          152 => 
                          array (
                            'key' => 'Raw oil',
                            'value' => 14701337,
                          ),
                          153 => 
                          array (
                            'key' => 'Refrigerant',
                            'value' => 14701343,
                          ),
                          154 => 
                          array (
                            'key' => 'Rice pudding ',
                            'value' => 14701467,
                          ),
                          155 => 
                          array (
                            'key' => 'Salt',
                            'value' => 14701387,
                          ),
                          156 => 
                          array (
                            'key' => 'Salt solutions',
                            'value' => 14701432,
                          ),
                          157 => 
                          array (
                            'key' => 'Sand',
                            'value' => 14701334,
                          ),
                          158 => 
                          array (
                            'key' => 'Sand Steelgrit',
                            'value' => 14701332,
                          ),
                          159 => 
                          array (
                            'key' => 'Sea water',
                            'value' => 14701373,
                          ),
                          160 => 
                          array (
                            'key' => 'Sewage',
                            'value' => 14701356,
                          ),
                          161 => 
                          array (
                            'key' => 'Solvents',
                            'value' => 14701342,
                          ),
                          162 => 
                          array (
                            'key' => 'Sparkling wine ',
                            'value' => 14701462,
                          ),
                          163 => 
                          array (
                            'key' => 'Spirit lacquer',
                            'value' => 14701395,
                          ),
                          164 => 
                          array (
                            'key' => 'Spirits',
                            'value' => 14701475,
                          ),
                          165 => 
                          array (
                            'key' => 'Starch',
                            'value' => 14701499,
                          ),
                          166 => 
                          array (
                            'key' => 'Steam',
                            'value' => 14701327,
                          ),
                          167 => 
                          array (
                            'key' => 'Sugar',
                            'value' => 14701393,
                          ),
                          168 => 
                          array (
                            'key' => 'Sugar syrup',
                            'value' => 14701470,
                          ),
                          169 => 
                          array (
                            'key' => 'Tallow',
                            'value' => 14701456,
                          ),
                          170 => 
                          array (
                            'key' => 'Tar',
                            'value' => 14701364,
                          ),
                          171 => 
                          array (
                            'key' => 'Treated and non-treated cooling water',
                            'value' => 14701351,
                          ),
                          172 => 
                          array (
                            'key' => 'Ultrapure water',
                            'value' => 14701354,
                          ),
                          173 => 
                          array (
                            'key' => 'Vegetable and mineral lubricants',
                            'value' => 14701336,
                          ),
                          174 => 
                          array (
                            'key' => 'Vinegar ',
                            'value' => 14701463,
                          ),
                          175 => 
                          array (
                            'key' => 'Washing powder',
                            'value' => 14701500,
                          ),
                          176 => 
                          array (
                            'key' => 'Water',
                            'value' => 14701325,
                          ),
                          177 => 
                          array (
                            'key' => 'Water emulsions',
                            'value' => 14701434,
                          ),
                          178 => 
                          array (
                            'key' => 'Water-based saturated steam',
                            'value' => 14701498,
                          ),
                          179 => 
                          array (
                            'key' => 'Wine',
                            'value' => 14701358,
                          ),
                          180 => 
                          array (
                            'key' => 'Yoghurt',
                            'value' => 14701359,
                          ),
                          181 => 
                          array (
                            'key' => 'liquid and pasty chemical and petroleum based products',
                            'value' => 14701442,
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
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
