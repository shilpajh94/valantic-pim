<?php 

/** 
* Generated at: 2023-04-07T06:32:10+02:00
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
                        'value' => 14699791,
                      ),
                      1 => 
                      array (
                        'key' => 'Rough Bore',
                        'value' => 14699792,
                      ),
                      2 => 
                      array (
                        'key' => 'Smooth',
                        'value' => 14699793,
                      ),
                      3 => 
                      array (
                        'key' => 'Standard',
                        'value' => 14699794,
                      ),
                      4 => 
                      array (
                        'key' => 'Wrapped',
                        'value' => 14699795,
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
                     'locked' => NULL,
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
                        'value' => 14697900,
                      ),
                      1 => 
                      array (
                        'key' => '74310',
                        'value' => 14697901,
                      ),
                      2 => 
                      array (
                        'key' => '20018-1',
                        'value' => 14697902,
                      ),
                      3 => 
                      array (
                        'key' => '5510-2',
                        'value' => 14697903,
                      ),
                      4 => 
                      array (
                        'key' => '6257.70',
                        'value' => 14697904,
                      ),
                      5 => 
                      array (
                        'key' => '6257.72',
                        'value' => 14697905,
                      ),
                      6 => 
                      array (
                        'key' => '6257.21',
                        'value' => 14697906,
                      ),
                      7 => 
                      array (
                        'key' => '853',
                        'value' => 14697907,
                      ),
                      8 => 
                      array (
                        'key' => '854',
                        'value' => 14697908,
                      ),
                      9 => 
                      array (
                        'key' => '856',
                        'value' => 14697909,
                      ),
                      10 => 
                      array (
                        'key' => '857',
                        'value' => 14697910,
                      ),
                      11 => 
                      array (
                        'key' => '45545-2 HL3 (R22+R23)',
                        'value' => 14697911,
                      ),
                      12 => 
                      array (
                        'key' => '14593/14594',
                        'value' => 14697912,
                      ),
                      13 => 
                      array (
                        'key' => '16436-1:2016  CLASS-2 (10 bar)',
                        'value' => 14697913,
                      ),
                      14 => 
                      array (
                        'key' => '12115:2011',
                        'value' => 14697914,
                      ),
                      15 => 
                      array (
                        'key' => '1761',
                        'value' => 14697915,
                      ),
                      16 => 
                      array (
                        'key' => '250',
                        'value' => 14697916,
                      ),
                      17 => 
                      array (
                        'key' => '6134-1A',
                        'value' => 14697917,
                      ),
                      18 => 
                      array (
                        'key' => '6134-2A',
                        'value' => 14697918,
                      ),
                      19 => 
                      array (
                        'key' => '6134-2B',
                        'value' => 14697919,
                      ),
                      20 => 
                      array (
                        'key' => '2398:2017 3C/L-T',
                        'value' => 14697920,
                      ),
                      21 => 
                      array (
                        'key' => '2398:2017 2C/L-T',
                        'value' => 14697921,
                      ),
                      22 => 
                      array (
                        'key' => '333 N1W',
                        'value' => 14697922,
                      ),
                      23 => 
                      array (
                        'key' => '333 N1',
                        'value' => 14697923,
                      ),
                      24 => 
                      array (
                        'key' => '830-1/V',
                        'value' => 14697924,
                      ),
                      25 => 
                      array (
                        'key' => 'Class A',
                        'value' => 14697925,
                      ),
                      26 => 
                      array (
                        'key' => 'GERMANISCHEN LLOYD ',
                        'value' => 14697926,
                      ),
                      27 => 
                      array (
                        'key' => '2153',
                        'value' => 14697927,
                      ),
                      28 => 
                      array (
                        'key' => ' 1529/2014',
                        'value' => 14697928,
                      ),
                      29 => 
                      array (
                        'key' => '6615G',
                        'value' => 14697929,
                      ),
                      30 => 
                      array (
                        'key' => '407:2007',
                        'value' => 14697930,
                      ),
                      31 => 
                      array (
                        'key' => '1825',
                        'value' => 14697931,
                      ),
                      32 => 
                      array (
                        'key' => 'EC Regulation no. 1907/2006',
                        'value' => 14697932,
                      ),
                      33 => 
                      array (
                        'key' => 'Regulation 177.1520',
                        'value' => 14697933,
                      ),
                      34 => 
                      array (
                        'key' => 'Regulation 177.2600',
                        'value' => 14697934,
                      ),
                      35 => 
                      array (
                        'key' => 'Regulation 177.1550',
                        'value' => 14697935,
                      ),
                      36 => 
                      array (
                        'key' => 'Recommendation III',
                        'value' => 14697936,
                      ),
                      37 => 
                      array (
                        'key' => 'Recommendation XXI, Cat. 2',
                        'value' => 14697937,
                      ),
                      38 => 
                      array (
                        'key' => 'Recommendation XXI, Cat. 4',
                        'value' => 14697938,
                      ),
                      39 => 
                      array (
                        'key' => '1935/2004',
                        'value' => 14697939,
                      ),
                      40 => 
                      array (
                        'key' => '2023/2006',
                        'value' => 14697940,
                      ),
                      41 => 
                      array (
                        'key' => '10/11',
                        'value' => 14697941,
                      ),
                      42 => 
                      array (
                        'key' => 'CLASS VI',
                        'value' => 14697942,
                      ),
                      43 => 
                      array (
                        'key' => 'Licensed in accordance with BS 6920-1:2000',
                        'value' => 14697943,
                      ),
                      44 => 
                      array (
                        'key' => 'Licensed in accordance with Pipes guideline for plastics used for drinking water, DVGW W270 and VP 549',
                        'value' => 14697944,
                      ),
                      45 => 
                      array (
                        'key' => '6254.12',
                        'value' => 14697945,
                      ),
                      46 => 
                      array (
                        'key' => '6254.16',
                        'value' => 14697946,
                      ),
                      47 => 
                      array (
                        'key' => '590',
                        'value' => 14697947,
                      ),
                      48 => 
                      array (
                        'key' => '2398:2017 1A',
                        'value' => 14697948,
                      ),
                      49 => 
                      array (
                        'key' => '73411-B',
                        'value' => 14697949,
                      ),
                      50 => 
                      array (
                        'key' => 'J20 R3/R4 D3 - HT - EC',
                        'value' => 14697950,
                      ),
                      51 => 
                      array (
                        'key' => 'DB/SBB',
                        'value' => 14697951,
                      ),
                      52 => 
                      array (
                        'key' => '11851 - 1.4301',
                        'value' => 14697952,
                      ),
                      53 => 
                      array (
                        'key' => '100R13',
                        'value' => 14697953,
                      ),
                      54 => 
                      array (
                        'key' => '856 4SH',
                        'value' => 14697954,
                      ),
                      55 => 
                      array (
                        'key' => '853 1SN',
                        'value' => 14697955,
                      ),
                      56 => 
                      array (
                        'key' => '100R15',
                        'value' => 14697956,
                      ),
                      57 => 
                      array (
                        'key' => '100R12',
                        'value' => 14697957,
                      ),
                      58 => 
                      array (
                        'key' => '3821:2020',
                        'value' => 14697958,
                      ),
                      59 => 
                      array (
                        'key' => '16436-1:2016 Class 3 (30 bar)',
                        'value' => 14697959,
                      ),
                      60 => 
                      array (
                        'key' => '16436-1:2016 CLASS 3 (30 bar)',
                        'value' => 14697960,
                      ),
                      61 => 
                      array (
                        'key' => '856 4SP',
                        'value' => 14697961,
                      ),
                      62 => 
                      array (
                        'key' => '100R16',
                        'value' => 14697962,
                      ),
                      63 => 
                      array (
                        'key' => '857 2SC',
                        'value' => 14697963,
                      ),
                      64 => 
                      array (
                        'key' => '100R1AT',
                        'value' => 14697964,
                      ),
                      65 => 
                      array (
                        'key' => '100R2AT',
                        'value' => 14697965,
                      ),
                      66 => 
                      array (
                        'key' => '853 2SN',
                        'value' => 14697966,
                      ),
                      67 => 
                      array (
                        'key' => '100R19',
                        'value' => 14697967,
                      ),
                      68 => 
                      array (
                        'key' => '100R17',
                        'value' => 14697968,
                      ),
                      69 => 
                      array (
                        'key' => '11237 R19',
                        'value' => 14697969,
                      ),
                      70 => 
                      array (
                        'key' => '20023 4SH',
                        'value' => 14697970,
                      ),
                      71 => 
                      array (
                        'key' => '20023 4SP',
                        'value' => 14697971,
                      ),
                      72 => 
                      array (
                        'key' => 'MSHA',
                        'value' => 14697972,
                      ),
                      73 => 
                      array (
                        'key' => 'Dry Food',
                        'value' => 14697973,
                      ),
                      74 => 
                      array (
                        'key' => 'New node',
                        'value' => 14697974,
                      ),
                      75 => 
                      array (
                        'key' => '73379 Typ B1',
                        'value' => 14697975,
                      ),
                      76 => 
                      array (
                        'key' => 'J30 R9',
                        'value' => 14697976,
                      ),
                      77 => 
                      array (
                        'key' => '73379 Typ A1',
                        'value' => 14697977,
                      ),
                      78 => 
                      array (
                        'key' => 'BWGL',
                        'value' => 14697978,
                      ),
                      79 => 
                      array (
                        'key' => '16421 (W270)',
                        'value' => 14697979,
                      ),
                      80 => 
                      array (
                        'key' => '15807 (UIC830-1V)',
                        'value' => 14697980,
                      ),
                      81 => 
                      array (
                        'key' => 'DVGW',
                        'value' => 14697981,
                      ),
                      82 => 
                      array (
                        'key' => 'VP549',
                        'value' => 14697982,
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
                            'value' => 14698532,
                          ),
                          1 => 
                          array (
                            'key' => 'NBR',
                            'value' => 14698533,
                          ),
                          2 => 
                          array (
                            'key' => 'NR',
                            'value' => 14698534,
                          ),
                          3 => 
                          array (
                            'key' => 'CR',
                            'value' => 14698535,
                          ),
                          4 => 
                          array (
                            'key' => 'CR-EPDM',
                            'value' => 14698536,
                          ),
                          5 => 
                          array (
                            'key' => 'UPE',
                            'value' => 14698537,
                          ),
                          6 => 
                          array (
                            'key' => 'FEP',
                            'value' => 14698538,
                          ),
                          7 => 
                          array (
                            'key' => 'CIIR',
                            'value' => 14698539,
                          ),
                          8 => 
                          array (
                            'key' => 'SBR',
                            'value' => 14698540,
                          ),
                          9 => 
                          array (
                            'key' => 'PA',
                            'value' => 14698541,
                          ),
                          10 => 
                          array (
                            'key' => 'Special elastomer',
                            'value' => 14698542,
                          ),
                          11 => 
                          array (
                            'key' => 'SBR-EPDM',
                            'value' => 14698543,
                          ),
                          12 => 
                          array (
                            'key' => 'CSM/BR',
                            'value' => 14698544,
                          ),
                          13 => 
                          array (
                            'key' => 'Fluoroplastic ',
                            'value' => 14698545,
                          ),
                          14 => 
                          array (
                            'key' => 'AEM',
                            'value' => 14698546,
                          ),
                          15 => 
                          array (
                            'key' => 'SBR-BR',
                            'value' => 14698547,
                          ),
                          16 => 
                          array (
                            'key' => 'SBR-NR',
                            'value' => 14698548,
                          ),
                          17 => 
                          array (
                            'key' => 'no fuel solubility',
                            'value' => 14698549,
                          ),
                          18 => 
                          array (
                            'key' => 'Synthetic rubber',
                            'value' => 14698550,
                          ),
                          19 => 
                          array (
                            'key' => 'CPE',
                            'value' => 14698551,
                          ),
                          20 => 
                          array (
                            'key' => 'CM',
                            'value' => 14698552,
                          ),
                          21 => 
                          array (
                            'key' => 'FPM',
                            'value' => 14698553,
                          ),
                          22 => 
                          array (
                            'key' => 'ECO',
                            'value' => 14698554,
                          ),
                          23 => 
                          array (
                            'key' => 'FPM/HNBR',
                            'value' => 14698555,
                          ),
                          24 => 
                          array (
                            'key' => 'FPM/AEM',
                            'value' => 14698556,
                          ),
                          25 => 
                          array (
                            'key' => 'FPM/ECO',
                            'value' => 14698557,
                          ),
                          26 => 
                          array (
                            'key' => 'HNBR',
                            'value' => 14698558,
                          ),
                          27 => 
                          array (
                            'key' => 'UHMWPE',
                            'value' => 14698559,
                          ),
                          28 => 
                          array (
                            'key' => 'PU',
                            'value' => 14698560,
                          ),
                          29 => 
                          array (
                            'key' => 'EPDM black or EPM white',
                            'value' => 14698561,
                          ),
                          30 => 
                          array (
                            'key' => 'PTFE',
                            'value' => 14698562,
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
                            'value' => 14698465,
                          ),
                          1 => 
                          array (
                            'key' => 'white',
                            'value' => 14698466,
                          ),
                          2 => 
                          array (
                            'key' => 'black',
                            'value' => 14698467,
                          ),
                          3 => 
                          array (
                            'key' => 'grey',
                            'value' => 14698468,
                          ),
                          4 => 
                          array (
                            'key' => 'bright',
                            'value' => 14698469,
                          ),
                          5 => 
                          array (
                            'key' => 'blue',
                            'value' => 14698470,
                          ),
                          6 => 
                          array (
                            'key' => 'red',
                            'value' => 14698471,
                          ),
                          7 => 
                          array (
                            'key' => 'orange',
                            'value' => 14698472,
                          ),
                          8 => 
                          array (
                            'key' => 'black or white',
                            'value' => 14698473,
                          ),
                          9 => 
                          array (
                            'key' => 'light grey',
                            'value' => 14698474,
                          ),
                          10 => 
                          array (
                            'key' => 'white with magnetic and X-ray detectable grey elastomer layer behind',
                            'value' => 14698475,
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
                            'value' => 14698840,
                          ),
                          1 => 
                          array (
                            'key' => 'Aramid',
                            'value' => 14698841,
                          ),
                          2 => 
                          array (
                            'key' => '2 galvanized reinforcements',
                            'value' => 14698842,
                          ),
                          3 => 
                          array (
                            'key' => 'Synthetic corded plies',
                            'value' => 14698843,
                          ),
                          4 => 
                          array (
                            'key' => 'Textile reinforcement with 2 embedded Cu-wires',
                            'value' => 14698844,
                          ),
                          5 => 
                          array (
                            'key' => 'high tension steel wire',
                            'value' => 14698845,
                          ),
                          6 => 
                          array (
                            'key' => 'Synthetic yarns with steel wire braid',
                            'value' => 14698846,
                          ),
                          7 => 
                          array (
                            'key' => '4 alternating layers of spiraled high-tensile wire',
                            'value' => 14698847,
                          ),
                          8 => 
                          array (
                            'key' => 'Steel wire braids with embedded additional weights',
                            'value' => 14698848,
                          ),
                          9 => 
                          array (
                            'key' => 'PPS',
                            'value' => 14698849,
                          ),
                          10 => 
                          array (
                            'key' => 'CMD',
                            'value' => 14698850,
                          ),
                          11 => 
                          array (
                            'key' => 'CO',
                            'value' => 14698851,
                          ),
                          12 => 
                          array (
                            'key' => 'Synthetic yarns, rubberised, black, optionally with embedded steel wire spiral',
                            'value' => 14698852,
                          ),
                          13 => 
                          array (
                            'key' => 'Steel cord layers',
                            'value' => 14698853,
                          ),
                          14 => 
                          array (
                            'key' => 'Stainless steel braids (1.4401), glass fibre braids and elastomer interlayers',
                            'value' => 14698854,
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
                            'value' => 14698521,
                          ),
                          1 => 
                          array (
                            'key' => 'With integrated plastic helix',
                            'value' => 14698522,
                          ),
                          2 => 
                          array (
                            'key' => 'With 2 spiralled copper strands',
                            'value' => 14698523,
                          ),
                          3 => 
                          array (
                            'key' => 'With copper wire',
                            'value' => 14698524,
                          ),
                          4 => 
                          array (
                            'key' => 'With spring wire spiral',
                            'value' => 14698525,
                          ),
                          5 => 
                          array (
                            'key' => 'With galvanised spring steel helix',
                            'value' => 14698526,
                          ),
                          6 => 
                          array (
                            'key' => 'With steel helix from DN 25',
                            'value' => 14698527,
                          ),
                          7 => 
                          array (
                            'key' => 'With steel wire braid',
                            'value' => 14698528,
                          ),
                          8 => 
                          array (
                            'key' => 'With antistatic wire',
                            'value' => 14698529,
                          ),
                          9 => 
                          array (
                            'key' => 'With integrated steel wire spiral and antistatic wire',
                            'value' => 14698530,
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
                            'value' => 14698784,
                          ),
                          1 => 
                          array (
                            'key' => 'smooth',
                            'value' => 14698785,
                          ),
                          2 => 
                          array (
                            'key' => 'non-porous',
                            'value' => 14698786,
                          ),
                          3 => 
                          array (
                            'key' => 'plasticizer-free',
                            'value' => 14698787,
                          ),
                          4 => 
                          array (
                            'key' => 'high-performing',
                            'value' => 14698788,
                          ),
                          5 => 
                          array (
                            'key' => 'anti-adhesive',
                            'value' => 14698789,
                          ),
                          6 => 
                          array (
                            'key' => 'highly abrasion resisitant ',
                            'value' => 14698790,
                          ),
                          7 => 
                          array (
                            'key' => 'impermeable',
                            'value' => 14698791,
                          ),
                          8 => 
                          array (
                            'key' => 'seamless',
                            'value' => 14698792,
                          ),
                          9 => 
                          array (
                            'key' => 'electrically noncondctive',
                            'value' => 14698793,
                          ),
                          10 => 
                          array (
                            'key' => 'meets FDA (21 CFR 177.1550) and USP CLASS VI',
                            'value' => 14698794,
                          ),
                          11 => 
                          array (
                            'key' => 'absolutely neutral to taste and odour',
                            'value' => 14698795,
                          ),
                          12 => 
                          array (
                            'key' => 'according to recommendation XXI, cat. 2 of BfR',
                            'value' => 14698796,
                          ),
                          13 => 
                          array (
                            'key' => 'according to FDA (21 CFR 177.2600)',
                            'value' => 14698797,
                          ),
                          14 => 
                          array (
                            'key' => 'resistant to oil and fats',
                            'value' => 14698798,
                          ),
                          15 => 
                          array (
                            'key' => ' with Conti Orange Wear Indicator',
                            'value' => 14698799,
                          ),
                          16 => 
                          array (
                            'key' => 'with black coiled OHM conductive stripe',
                            'value' => 14698800,
                          ),
                          17 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω/m',
                            'value' => 14698801,
                          ),
                          18 => 
                          array (
                            'key' => 'highly abrasion resistant (acc. to DIN ISO 4649-A: <60mm³)',
                            'value' => 14698802,
                          ),
                          19 => 
                          array (
                            'key' => 'no fuel solubility',
                            'value' => 14698803,
                          ),
                          20 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω',
                            'value' => 14698804,
                          ),
                          21 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>9</sup> Ω/m',
                            'value' => 14698805,
                          ),
                          22 => 
                          array (
                            'key' => 'electrically insulating, R > 10<sup>9</sup> Ω/m',
                            'value' => 14698806,
                          ),
                          23 => 
                          array (
                            'key' => 'according to FDA ',
                            'value' => 14698807,
                          ),
                          24 => 
                          array (
                            'key' => 'almost odourless',
                            'value' => 14698808,
                          ),
                          25 => 
                          array (
                            'key' => 'Partial lining with special fleece and fluidisation channels underneath (max. 2 bar)',
                            'value' => 14698809,
                          ),
                          26 => 
                          array (
                            'key' => 'extruded',
                            'value' => 14698810,
                          ),
                          27 => 
                          array (
                            'key' => 'can be detected magnetically or by X-rays',
                            'value' => 14698811,
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
                            'value' => 14698488,
                          ),
                          1 => 
                          array (
                            'key' => 'NBR',
                            'value' => 14698489,
                          ),
                          2 => 
                          array (
                            'key' => 'NR',
                            'value' => 14698490,
                          ),
                          3 => 
                          array (
                            'key' => 'CR',
                            'value' => 14698491,
                          ),
                          4 => 
                          array (
                            'key' => 'CR-EPDM',
                            'value' => 14698492,
                          ),
                          5 => 
                          array (
                            'key' => 'UPE',
                            'value' => 14698493,
                          ),
                          6 => 
                          array (
                            'key' => 'FEP',
                            'value' => 14698494,
                          ),
                          7 => 
                          array (
                            'key' => 'CIIR',
                            'value' => 14698495,
                          ),
                          8 => 
                          array (
                            'key' => 'SBR',
                            'value' => 14698496,
                          ),
                          9 => 
                          array (
                            'key' => 'PA',
                            'value' => 14698497,
                          ),
                          10 => 
                          array (
                            'key' => 'SBR-EPDM',
                            'value' => 14698498,
                          ),
                          11 => 
                          array (
                            'key' => 'CSM-BR ',
                            'value' => 14698499,
                          ),
                          12 => 
                          array (
                            'key' => 'Spezial elastomer',
                            'value' => 14698500,
                          ),
                          13 => 
                          array (
                            'key' => 'AEM',
                            'value' => 14698501,
                          ),
                          14 => 
                          array (
                            'key' => 'CM',
                            'value' => 14698502,
                          ),
                          15 => 
                          array (
                            'key' => 'SBR-BR',
                            'value' => 14698503,
                          ),
                          16 => 
                          array (
                            'key' => 'CR-BR',
                            'value' => 14698504,
                          ),
                          17 => 
                          array (
                            'key' => 'IR-BR',
                            'value' => 14698505,
                          ),
                          18 => 
                          array (
                            'key' => 'SBR-NR',
                            'value' => 14698506,
                          ),
                          19 => 
                          array (
                            'key' => 'Synthetic rubber',
                            'value' => 14698507,
                          ),
                          20 => 
                          array (
                            'key' => 'CPE',
                            'value' => 14698508,
                          ),
                          21 => 
                          array (
                            'key' => 'CMD',
                            'value' => 14698509,
                          ),
                          22 => 
                          array (
                            'key' => 'PES',
                            'value' => 14698510,
                          ),
                          23 => 
                          array (
                            'key' => 'CSM',
                            'value' => 14698511,
                          ),
                          24 => 
                          array (
                            'key' => 'ECO',
                            'value' => 14698512,
                          ),
                          25 => 
                          array (
                            'key' => 'CO',
                            'value' => 14698513,
                          ),
                          26 => 
                          array (
                            'key' => 'NBR-PVC',
                            'value' => 14698514,
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
                            'value' => 14698477,
                          ),
                          1 => 
                          array (
                            'key' => 'grey',
                            'value' => 14698478,
                          ),
                          2 => 
                          array (
                            'key' => 'bright',
                            'value' => 14698479,
                          ),
                          3 => 
                          array (
                            'key' => 'orange',
                            'value' => 14698480,
                          ),
                          4 => 
                          array (
                            'key' => 'red',
                            'value' => 14698481,
                          ),
                          5 => 
                          array (
                            'key' => 'black',
                            'value' => 14698482,
                          ),
                          6 => 
                          array (
                            'key' => 'transparent',
                            'value' => 14698483,
                          ),
                          7 => 
                          array (
                            'key' => 'white',
                            'value' => 14698484,
                          ),
                          8 => 
                          array (
                            'key' => 'red-orange',
                            'value' => 14698485,
                          ),
                          9 => 
                          array (
                            'key' => 'blue and red',
                            'value' => 14698486,
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
                            'value' => 14698516,
                          ),
                          1 => 
                          array (
                            'key' => 'smooth',
                            'value' => 14698517,
                          ),
                          2 => 
                          array (
                            'key' => 'strongly corrugated',
                            'value' => 14698518,
                          ),
                          3 => 
                          array (
                            'key' => 'grooved',
                            'value' => 14698519,
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
                            'value' => 14698813,
                          ),
                          1 => 
                          array (
                            'key' => 'resistant to ozone, weather and UV',
                            'value' => 14698814,
                          ),
                          2 => 
                          array (
                            'key' => 'resistant to oil and fats',
                            'value' => 14698815,
                          ),
                          3 => 
                          array (
                            'key' => 'resistant to excrements',
                            'value' => 14698816,
                          ),
                          4 => 
                          array (
                            'key' => 'chemical-resistant',
                            'value' => 14698817,
                          ),
                          5 => 
                          array (
                            'key' => 'resistant to fats',
                            'value' => 14698818,
                          ),
                          6 => 
                          array (
                            'key' => 'from DN 28 upward fabric patterned',
                            'value' => 14698819,
                          ),
                          7 => 
                          array (
                            'key' => 'from DN 28 upward CR-cover (fabric patterned)',
                            'value' => 14698820,
                          ),
                          8 => 
                          array (
                            'key' => 'wear-resisitant',
                            'value' => 14698821,
                          ),
                          9 => 
                          array (
                            'key' => 'flame resistant',
                            'value' => 14698822,
                          ),
                          10 => 
                          array (
                            'key' => 'from DN 32 upward CR-cover (fabric patterned)',
                            'value' => 14698823,
                          ),
                          11 => 
                          array (
                            'key' => 'from DN 32 upward fabric patterned',
                            'value' => 14698824,
                          ),
                          12 => 
                          array (
                            'key' => 'resistant to process water and oily air',
                            'value' => 14698825,
                          ),
                          13 => 
                          array (
                            'key' => 'resistant to short influence of oil and chemicals',
                            'value' => 14698826,
                          ),
                          14 => 
                          array (
                            'key' => 'ageing resistant',
                            'value' => 14698827,
                          ),
                          15 => 
                          array (
                            'key' => 'with black coiled OHM conductive stripe',
                            'value' => 14698828,
                          ),
                          16 => 
                          array (
                            'key' => 'from DN 25 upward fabric patterned',
                            'value' => 14698829,
                          ),
                          17 => 
                          array (
                            'key' => 'hydrocarbon resistant',
                            'value' => 14698830,
                          ),
                          18 => 
                          array (
                            'key' => 'electrically conductive',
                            'value' => 14698831,
                          ),
                          19 => 
                          array (
                            'key' => 'flame-resistant (MSHA compliant)',
                            'value' => 14698832,
                          ),
                          20 => 
                          array (
                            'key' => 'resistant to chicken and fish fat',
                            'value' => 14698833,
                          ),
                          21 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω',
                            'value' => 14698834,
                          ),
                          22 => 
                          array (
                            'key' => 'optional',
                            'value' => 14698835,
                          ),
                          23 => 
                          array (
                            'key' => 'with heat protection cover',
                            'value' => 14698836,
                          ),
                          24 => 
                          array (
                            'key' => 'highly abrasion resistant (acc. to DIN ISO 4649-A: <60mm³)',
                            'value' => 14698837,
                          ),
                          25 => 
                          array (
                            'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω/m',
                            'value' => 14698838,
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
                            'value' => 14697406,
                          ),
                          1 => 
                          array (
                            'key' => 'Beverage industry',
                            'value' => 14697407,
                          ),
                          2 => 
                          array (
                            'key' => 'Camping and caravanning',
                            'value' => 14697408,
                          ),
                          3 => 
                          array (
                            'key' => 'Commercial kitchens',
                            'value' => 14697409,
                          ),
                          4 => 
                          array (
                            'key' => 'Municipal emergency water supply',
                            'value' => 14697410,
                          ),
                          5 => 
                          array (
                            'key' => 'Outdoor events',
                            'value' => 14697411,
                          ),
                          6 => 
                          array (
                            'key' => 'Construction industry',
                            'value' => 14697412,
                          ),
                          7 => 
                          array (
                            'key' => 'Open land',
                            'value' => 14697413,
                          ),
                          8 => 
                          array (
                            'key' => ' Apparate',
                            'value' => 14697414,
                          ),
                          9 => 
                          array (
                            'key' => 'General industry',
                            'value' => 14697415,
                          ),
                          10 => 
                          array (
                            'key' => 'Over- and underground workings',
                            'value' => 14697416,
                          ),
                          11 => 
                          array (
                            'key' => 'Municipal enterprises',
                            'value' => 14697417,
                          ),
                          12 => 
                          array (
                            'key' => 'Agricultural sector',
                            'value' => 14697418,
                          ),
                          13 => 
                          array (
                            'key' => 'Industry',
                            'value' => 14697419,
                          ),
                          14 => 
                          array (
                            'key' => 'Fleets',
                            'value' => 14697420,
                          ),
                          15 => 
                          array (
                            'key' => 'Garages',
                            'value' => 14697421,
                          ),
                          16 => 
                          array (
                            'key' => 'Workshops',
                            'value' => 14697422,
                          ),
                          17 => 
                          array (
                            'key' => 'Landscaping and gardening',
                            'value' => 14697423,
                          ),
                          18 => 
                          array (
                            'key' => 'Mobile or stationary hose lines',
                            'value' => 14697424,
                          ),
                          19 => 
                          array (
                            'key' => 'Commercial washing machines and dishwashers',
                            'value' => 14697425,
                          ),
                          20 => 
                          array (
                            'key' => 'Private Area',
                            'value' => 14697426,
                          ),
                          21 => 
                          array (
                            'key' => 'Railway industry',
                            'value' => 14697427,
                          ),
                          22 => 
                          array (
                            'key' => 'White goods industry',
                            'value' => 14697428,
                          ),
                          23 => 
                          array (
                            'key' => 'Shipyards',
                            'value' => 14697429,
                          ),
                          24 => 
                          array (
                            'key' => 'Yacht construction',
                            'value' => 14697430,
                          ),
                          25 => 
                          array (
                            'key' => 'Machinery and plant engineering',
                            'value' => 14697431,
                          ),
                          26 => 
                          array (
                            'key' => 'Cooling systems in combustion engines',
                            'value' => 14697432,
                          ),
                          27 => 
                          array (
                            'key' => 'Cooling and heating systems',
                            'value' => 14697433,
                          ),
                          28 => 
                          array (
                            'key' => 'Passenger and commercial vehicles',
                            'value' => 14697434,
                          ),
                          29 => 
                          array (
                            'key' => 'Mining industry',
                            'value' => 14697435,
                          ),
                          30 => 
                          array (
                            'key' => 'Public festivals',
                            'value' => 14697436,
                          ),
                          31 => 
                          array (
                            'key' => ' Weihnachts- und Jahrmärkte',
                            'value' => 14697437,
                          ),
                          32 => 
                          array (
                            'key' => 'Furnaces',
                            'value' => 14697438,
                          ),
                          33 => 
                          array (
                            'key' => 'Ex zones',
                            'value' => 14697439,
                          ),
                          34 => 
                          array (
                            'key' => 'Breweries',
                            'value' => 14697440,
                          ),
                          35 => 
                          array (
                            'key' => 'Distillereies',
                            'value' => 14697441,
                          ),
                          36 => 
                          array (
                            'key' => 'Wine press houses',
                            'value' => 14697442,
                          ),
                          37 => 
                          array (
                            'key' => 'Filling machines',
                            'value' => 14697443,
                          ),
                          38 => 
                          array (
                            'key' => ' Getränke- und Spirituosenindustrie',
                            'value' => 14697444,
                          ),
                          39 => 
                          array (
                            'key' => 'Foodstuffs companies',
                            'value' => 14697445,
                          ),
                          40 => 
                          array (
                            'key' => 'Pharmaceutical and cosmetic industry',
                            'value' => 14697446,
                          ),
                          41 => 
                          array (
                            'key' => 'Dairies',
                            'value' => 14697447,
                          ),
                          42 => 
                          array (
                            'key' => 'Cheese dairies',
                            'value' => 14697448,
                          ),
                          43 => 
                          array (
                            'key' => 'Margarine factories',
                            'value' => 14697449,
                          ),
                          44 => 
                          array (
                            'key' => 'Fish processing',
                            'value' => 14697450,
                          ),
                          45 => 
                          array (
                            'key' => 'Abattoirs',
                            'value' => 14697451,
                          ),
                          46 => 
                          array (
                            'key' => 'Oil mills',
                            'value' => 14697452,
                          ),
                          47 => 
                          array (
                            'key' => 'Rendering plants',
                            'value' => 14697453,
                          ),
                          48 => 
                          array (
                            'key' => 'Large-scale butcheries',
                            'value' => 14697454,
                          ),
                          49 => 
                          array (
                            'key' => 'Jam factories',
                            'value' => 14697455,
                          ),
                          50 => 
                          array (
                            'key' => 'Milk collection vehicles',
                            'value' => 14697456,
                          ),
                          51 => 
                          array (
                            'key' => 'Chemical and petrochemical industry',
                            'value' => 14697457,
                          ),
                          52 => 
                          array (
                            'key' => 'Horticultural companies',
                            'value' => 14697458,
                          ),
                          53 => 
                          array (
                            'key' => 'Refineries',
                            'value' => 14697459,
                          ),
                          54 => 
                          array (
                            'key' => 'Shipping industry',
                            'value' => 14697460,
                          ),
                          55 => 
                          array (
                            'key' => 'Silo vehicles',
                            'value' => 14697461,
                          ),
                          56 => 
                          array (
                            'key' => 'Quarry',
                            'value' => 14697462,
                          ),
                          57 => 
                          array (
                            'key' => 'Compressed air and compressor manufacturers',
                            'value' => 14697463,
                          ),
                          58 => 
                          array (
                            'key' => 'Steel and iron industry',
                            'value' => 14697464,
                          ),
                          59 => 
                          array (
                            'key' => 'Petrol stations',
                            'value' => 14697465,
                          ),
                          60 => 
                          array (
                            'key' => 'Largescale garages',
                            'value' => 14697466,
                          ),
                          61 => 
                          array (
                            'key' => 'Field of compressed air handling',
                            'value' => 14697467,
                          ),
                          62 => 
                          array (
                            'key' => 'Installation and heating system companies',
                            'value' => 14697468,
                          ),
                          63 => 
                          array (
                            'key' => 'Foundries',
                            'value' => 14697469,
                          ),
                          64 => 
                          array (
                            'key' => 'Construction of bridges',
                            'value' => 14697470,
                          ),
                          65 => 
                          array (
                            'key' => 'Welding shops',
                            'value' => 14697471,
                          ),
                          66 => 
                          array (
                            'key' => 'Manufacturers of welding apparatus',
                            'value' => 14697472,
                          ),
                          67 => 
                          array (
                            'key' => 'Steel construction',
                            'value' => 14697473,
                          ),
                          68 => 
                          array (
                            'key' => 'Automobile industry',
                            'value' => 14697474,
                          ),
                          69 => 
                          array (
                            'key' => 'Welding and brazing machines',
                            'value' => 14697475,
                          ),
                          70 => 
                          array (
                            'key' => 'Pressure controlled gas units',
                            'value' => 14697476,
                          ),
                          71 => 
                          array (
                            'key' => ' Grill- und Bratgeräte und Abflammgeräte',
                            'value' => 14697477,
                          ),
                          72 => 
                          array (
                            'key' => 'Forestry',
                            'value' => 14697478,
                          ),
                          73 => 
                          array (
                            'key' => 'Mineral oil industry',
                            'value' => 14697479,
                          ),
                          74 => 
                          array (
                            'key' => 'Buliding cleaning services',
                            'value' => 14697480,
                          ),
                          75 => 
                          array (
                            'key' => 'Processing of metal surfaces',
                            'value' => 14697481,
                          ),
                          76 => 
                          array (
                            'key' => 'Iron foundries',
                            'value' => 14697482,
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
