<?php 

/** 
* Generated at: 2023-05-09T16:35:43+05:30
* IP: 127.0.0.1


Fields Summary: 
- BaseBrickMapping [input]
- standards [multiselect]
- InnerLining [select]
- colorInnerLining [select]
- Reinforcement [select]
- Helix [select]
- numberOfHelixWires [numeric]
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 190,
                     'layout' => NULL,
                     'border' => false,
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
                            'key' => '10/11',
                            'value' => 15243210,
                          ),
                          1 => 
                          array (
                            'key' => '100R12',
                            'value' => 15243226,
                          ),
                          2 => 
                          array (
                            'key' => '100R13',
                            'value' => 15243222,
                          ),
                          3 => 
                          array (
                            'key' => '100R15',
                            'value' => 15243225,
                          ),
                          4 => 
                          array (
                            'key' => '100R16',
                            'value' => 15243231,
                          ),
                          5 => 
                          array (
                            'key' => '100R17',
                            'value' => 15243237,
                          ),
                          6 => 
                          array (
                            'key' => '100R19',
                            'value' => 15243236,
                          ),
                          7 => 
                          array (
                            'key' => '100R1AT',
                            'value' => 15243233,
                          ),
                          8 => 
                          array (
                            'key' => '100R2AT',
                            'value' => 15243234,
                          ),
                          9 => 
                          array (
                            'key' => '11237 R19',
                            'value' => 15243238,
                          ),
                          10 => 
                          array (
                            'key' => '11851 - 1.4301',
                            'value' => 15243221,
                          ),
                          11 => 
                          array (
                            'key' => '12115:2011',
                            'value' => 15243183,
                          ),
                          12 => 
                          array (
                            'key' => '14593/14594',
                            'value' => 15243181,
                          ),
                          13 => 
                          array (
                            'key' => ' 1529/2014',
                            'value' => 15243197,
                          ),
                          14 => 
                          array (
                            'key' => '15807 (UIC830-1V)',
                            'value' => 15243249,
                          ),
                          15 => 
                          array (
                            'key' => '16421 (W270)',
                            'value' => 15243248,
                          ),
                          16 => 
                          array (
                            'key' => '16436-1:2016  CLASS-2 (10 bar)',
                            'value' => 15243182,
                          ),
                          17 => 
                          array (
                            'key' => '16436-1:2016 CLASS 3 (30 bar)',
                            'value' => 15243229,
                          ),
                          18 => 
                          array (
                            'key' => '16436-1:2016 Class 3 (30 bar)',
                            'value' => 15243228,
                          ),
                          19 => 
                          array (
                            'key' => '1761',
                            'value' => 15243184,
                          ),
                          20 => 
                          array (
                            'key' => '1825',
                            'value' => 15243200,
                          ),
                          21 => 
                          array (
                            'key' => '1935/2004',
                            'value' => 15243208,
                          ),
                          22 => 
                          array (
                            'key' => '20018-1',
                            'value' => 15243171,
                          ),
                          23 => 
                          array (
                            'key' => '20023 4SH',
                            'value' => 15243239,
                          ),
                          24 => 
                          array (
                            'key' => '20023 4SP',
                            'value' => 15243240,
                          ),
                          25 => 
                          array (
                            'key' => '2023/2006',
                            'value' => 15243209,
                          ),
                          26 => 
                          array (
                            'key' => '2153',
                            'value' => 15243196,
                          ),
                          27 => 
                          array (
                            'key' => '2398:2017 1A',
                            'value' => 15243217,
                          ),
                          28 => 
                          array (
                            'key' => '2398:2017 2C/L-T',
                            'value' => 15243190,
                          ),
                          29 => 
                          array (
                            'key' => '2398:2017 3C/L-T',
                            'value' => 15243189,
                          ),
                          30 => 
                          array (
                            'key' => '250',
                            'value' => 15243185,
                          ),
                          31 => 
                          array (
                            'key' => '333 N1',
                            'value' => 15243192,
                          ),
                          32 => 
                          array (
                            'key' => '333 N1W',
                            'value' => 15243191,
                          ),
                          33 => 
                          array (
                            'key' => '3821:2020',
                            'value' => 15243227,
                          ),
                          34 => 
                          array (
                            'key' => '407:2007',
                            'value' => 15243199,
                          ),
                          35 => 
                          array (
                            'key' => '45545-2 HL3 (R22+R23)',
                            'value' => 15243180,
                          ),
                          36 => 
                          array (
                            'key' => '5510-2',
                            'value' => 15243172,
                          ),
                          37 => 
                          array (
                            'key' => '590',
                            'value' => 15243216,
                          ),
                          38 => 
                          array (
                            'key' => '6134-1A',
                            'value' => 15243186,
                          ),
                          39 => 
                          array (
                            'key' => '6134-2A',
                            'value' => 15243187,
                          ),
                          40 => 
                          array (
                            'key' => '6134-2B',
                            'value' => 15243188,
                          ),
                          41 => 
                          array (
                            'key' => '6254.12',
                            'value' => 15243214,
                          ),
                          42 => 
                          array (
                            'key' => '6254.16',
                            'value' => 15243215,
                          ),
                          43 => 
                          array (
                            'key' => '6257.21',
                            'value' => 15243175,
                          ),
                          44 => 
                          array (
                            'key' => '6257.70',
                            'value' => 15243173,
                          ),
                          45 => 
                          array (
                            'key' => '6257.72',
                            'value' => 15243174,
                          ),
                          46 => 
                          array (
                            'key' => '6615G',
                            'value' => 15243198,
                          ),
                          47 => 
                          array (
                            'key' => '73379 Typ A1',
                            'value' => 15243246,
                          ),
                          48 => 
                          array (
                            'key' => '73379 Typ B1',
                            'value' => 15243244,
                          ),
                          49 => 
                          array (
                            'key' => '73411-B',
                            'value' => 15243218,
                          ),
                          50 => 
                          array (
                            'key' => '74310',
                            'value' => 15243170,
                          ),
                          51 => 
                          array (
                            'key' => '830-1/V',
                            'value' => 15243193,
                          ),
                          52 => 
                          array (
                            'key' => '853',
                            'value' => 15243176,
                          ),
                          53 => 
                          array (
                            'key' => '853 1SN',
                            'value' => 15243224,
                          ),
                          54 => 
                          array (
                            'key' => '853 2SN',
                            'value' => 15243235,
                          ),
                          55 => 
                          array (
                            'key' => '854',
                            'value' => 15243177,
                          ),
                          56 => 
                          array (
                            'key' => '856',
                            'value' => 15243178,
                          ),
                          57 => 
                          array (
                            'key' => '856 4SH',
                            'value' => 15243223,
                          ),
                          58 => 
                          array (
                            'key' => '856 4SP',
                            'value' => 15243230,
                          ),
                          59 => 
                          array (
                            'key' => '857',
                            'value' => 15243179,
                          ),
                          60 => 
                          array (
                            'key' => '857 2SC',
                            'value' => 15243232,
                          ),
                          61 => 
                          array (
                            'key' => 'BWGL',
                            'value' => 15243247,
                          ),
                          62 => 
                          array (
                            'key' => 'CLASS VI',
                            'value' => 15243211,
                          ),
                          63 => 
                          array (
                            'key' => 'Class A',
                            'value' => 15243194,
                          ),
                          64 => 
                          array (
                            'key' => 'DB/SBB',
                            'value' => 15243220,
                          ),
                          65 => 
                          array (
                            'key' => 'DVGW',
                            'value' => 15243250,
                          ),
                          66 => 
                          array (
                            'key' => 'Dry Food',
                            'value' => 15243242,
                          ),
                          67 => 
                          array (
                            'key' => 'EC Regulation no. 1907/2006',
                            'value' => 15243201,
                          ),
                          68 => 
                          array (
                            'key' => 'GERMANISCHEN LLOYD ',
                            'value' => 15243195,
                          ),
                          69 => 
                          array (
                            'key' => 'J20 R3/R4 D3 - HT - EC',
                            'value' => 15243219,
                          ),
                          70 => 
                          array (
                            'key' => 'J30 R9',
                            'value' => 15243245,
                          ),
                          71 => 
                          array (
                            'key' => 'Licensed in accordance with BS 6920-1:2000',
                            'value' => 15243212,
                          ),
                          72 => 
                          array (
                            'key' => 'Licensed in accordance with Pipes guideline for plastics used for drinking water, DVGW W270 and VP 549',
                            'value' => 15243213,
                          ),
                          73 => 
                          array (
                            'key' => 'MSHA',
                            'value' => 15243241,
                          ),
                          74 => 
                          array (
                            'key' => 'Made in Germany',
                            'value' => 15243169,
                          ),
                          75 => 
                          array (
                            'key' => 'New node',
                            'value' => 15243243,
                          ),
                          76 => 
                          array (
                            'key' => 'Recommendation III',
                            'value' => 15243205,
                          ),
                          77 => 
                          array (
                            'key' => 'Recommendation XXI, Cat. 2',
                            'value' => 15243206,
                          ),
                          78 => 
                          array (
                            'key' => 'Recommendation XXI, Cat. 4',
                            'value' => 15243207,
                          ),
                          79 => 
                          array (
                            'key' => 'Regulation 177.1520',
                            'value' => 15243202,
                          ),
                          80 => 
                          array (
                            'key' => 'Regulation 177.1550',
                            'value' => 15243204,
                          ),
                          81 => 
                          array (
                            'key' => 'Regulation 177.2600',
                            'value' => 15243203,
                          ),
                          82 => 
                          array (
                            'key' => 'VP549',
                            'value' => 15243251,
                          ),
                        ),
                         'width' => 850,
                         'height' => 60,
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
                            'value' => 15243348,
                          ),
                          1 => 
                          array (
                            'key' => 'CIIR',
                            'value' => 15243341,
                          ),
                          2 => 
                          array (
                            'key' => 'CM',
                            'value' => 15243354,
                          ),
                          3 => 
                          array (
                            'key' => 'CPE',
                            'value' => 15243353,
                          ),
                          4 => 
                          array (
                            'key' => 'CR',
                            'value' => 15243337,
                          ),
                          5 => 
                          array (
                            'key' => 'CR-EPDM',
                            'value' => 15243338,
                          ),
                          6 => 
                          array (
                            'key' => 'CSM/BR',
                            'value' => 15243346,
                          ),
                          7 => 
                          array (
                            'key' => 'ECO',
                            'value' => 15243356,
                          ),
                          8 => 
                          array (
                            'key' => 'EPDM',
                            'value' => 15243334,
                          ),
                          9 => 
                          array (
                            'key' => 'EPDM black or EPM white',
                            'value' => 15243363,
                          ),
                          10 => 
                          array (
                            'key' => 'FEP',
                            'value' => 15243340,
                          ),
                          11 => 
                          array (
                            'key' => 'FPM',
                            'value' => 15243355,
                          ),
                          12 => 
                          array (
                            'key' => 'FPM/AEM',
                            'value' => 15243358,
                          ),
                          13 => 
                          array (
                            'key' => 'FPM/ECO',
                            'value' => 15243359,
                          ),
                          14 => 
                          array (
                            'key' => 'FPM/HNBR',
                            'value' => 15243357,
                          ),
                          15 => 
                          array (
                            'key' => 'Fluoroplastic ',
                            'value' => 15243347,
                          ),
                          16 => 
                          array (
                            'key' => 'HNBR',
                            'value' => 15243360,
                          ),
                          17 => 
                          array (
                            'key' => 'NBR',
                            'value' => 15243335,
                          ),
                          18 => 
                          array (
                            'key' => 'NR',
                            'value' => 15243336,
                          ),
                          19 => 
                          array (
                            'key' => 'PA',
                            'value' => 15243343,
                          ),
                          20 => 
                          array (
                            'key' => 'PTFE',
                            'value' => 15243364,
                          ),
                          21 => 
                          array (
                            'key' => 'PU',
                            'value' => 15243362,
                          ),
                          22 => 
                          array (
                            'key' => 'SBR',
                            'value' => 15243342,
                          ),
                          23 => 
                          array (
                            'key' => 'SBR-BR',
                            'value' => 15243349,
                          ),
                          24 => 
                          array (
                            'key' => 'SBR-EPDM',
                            'value' => 15243345,
                          ),
                          25 => 
                          array (
                            'key' => 'SBR-NR',
                            'value' => 15243350,
                          ),
                          26 => 
                          array (
                            'key' => 'Special elastomer',
                            'value' => 15243344,
                          ),
                          27 => 
                          array (
                            'key' => 'Synthetic rubber',
                            'value' => 15243352,
                          ),
                          28 => 
                          array (
                            'key' => 'UHMWPE',
                            'value' => 15243361,
                          ),
                          29 => 
                          array (
                            'key' => 'UPE',
                            'value' => 15243339,
                          ),
                          30 => 
                          array (
                            'key' => 'no fuel solubility',
                            'value' => 15243351,
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
                            'value' => 15243269,
                          ),
                          1 => 
                          array (
                            'key' => 'black or white',
                            'value' => 15243275,
                          ),
                          2 => 
                          array (
                            'key' => 'blue',
                            'value' => 15243272,
                          ),
                          3 => 
                          array (
                            'key' => 'bright',
                            'value' => 15243271,
                          ),
                          4 => 
                          array (
                            'key' => 'grey',
                            'value' => 15243270,
                          ),
                          5 => 
                          array (
                            'key' => 'light grey',
                            'value' => 15243276,
                          ),
                          6 => 
                          array (
                            'key' => 'orange',
                            'value' => 15243274,
                          ),
                          7 => 
                          array (
                            'key' => 'red',
                            'value' => 15243273,
                          ),
                          8 => 
                          array (
                            'key' => 'transparent',
                            'value' => 15243267,
                          ),
                          9 => 
                          array (
                            'key' => 'white',
                            'value' => 15243268,
                          ),
                          10 => 
                          array (
                            'key' => 'white with magnetic and X-ray detectable grey elastomer layer behind',
                            'value' => 15243277,
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
                            'value' => 15243644,
                          ),
                          1 => 
                          array (
                            'key' => '4 alternating layers of spiraled high-tensile wire',
                            'value' => 15243649,
                          ),
                          2 => 
                          array (
                            'key' => 'Aramid',
                            'value' => 15243643,
                          ),
                          3 => 
                          array (
                            'key' => 'CMD',
                            'value' => 15243652,
                          ),
                          4 => 
                          array (
                            'key' => 'CO',
                            'value' => 15243653,
                          ),
                          5 => 
                          array (
                            'key' => 'PPS',
                            'value' => 15243651,
                          ),
                          6 => 
                          array (
                            'key' => 'Stainless steel braids (1.4401), glass fibre braids and elastomer interlayers',
                            'value' => 15243656,
                          ),
                          7 => 
                          array (
                            'key' => 'Steel cord layers',
                            'value' => 15243655,
                          ),
                          8 => 
                          array (
                            'key' => 'Steel wire braids with embedded additional weights',
                            'value' => 15243650,
                          ),
                          9 => 
                          array (
                            'key' => 'Synthetic corded plies',
                            'value' => 15243645,
                          ),
                          10 => 
                          array (
                            'key' => 'Synthetic fibres',
                            'value' => 15243642,
                          ),
                          11 => 
                          array (
                            'key' => 'Synthetic yarns with steel wire braid',
                            'value' => 15243648,
                          ),
                          12 => 
                          array (
                            'key' => 'Synthetic yarns, rubberised, black, optionally with embedded steel wire spiral',
                            'value' => 15243654,
                          ),
                          13 => 
                          array (
                            'key' => 'Textile reinforcement with 2 embedded Cu-wires',
                            'value' => 15243646,
                          ),
                          14 => 
                          array (
                            'key' => 'high tension steel wire',
                            'value' => 15243647,
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
                            'value' => 15243325,
                          ),
                          1 => 
                          array (
                            'key' => 'With antistatic wire',
                            'value' => 15243331,
                          ),
                          2 => 
                          array (
                            'key' => 'With copper wire',
                            'value' => 15243326,
                          ),
                          3 => 
                          array (
                            'key' => 'With galvanised spring steel helix',
                            'value' => 15243328,
                          ),
                          4 => 
                          array (
                            'key' => 'With integrated plastic helix',
                            'value' => 15243324,
                          ),
                          5 => 
                          array (
                            'key' => 'With integrated steel wire helix',
                            'value' => 15243323,
                          ),
                          6 => 
                          array (
                            'key' => 'With integrated steel wire spiral and antistatic wire',
                            'value' => 15243332,
                          ),
                          7 => 
                          array (
                            'key' => 'With spring wire spiral',
                            'value' => 15243327,
                          ),
                          8 => 
                          array (
                            'key' => 'With steel helix from DN 25',
                            'value' => 15243329,
                          ),
                          9 => 
                          array (
                            'key' => 'With steel wire braid',
                            'value' => 15243330,
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
                          0 => 
                          array (
                            'key' => 'Partial lining with special fleece and fluidisation channels underneath (max. 2 bar)',
                            'value' => 15243611,
                          ),
                          1 => 
                          array (
                            'key' => 'absolutely neutral to taste and odour',
                            'value' => 15243597,
                          ),
                          2 => 
                          array (
                            'key' => 'according to FDA ',
                            'value' => 15243609,
                          ),
                          3 => 
                          array (
                            'key' => 'according to FDA (21 CFR 177.2600)',
                            'value' => 15243599,
                          ),
                          4 => 
                          array (
                            'key' => 'according to recommendation XXI, cat. 2 of BfR',
                            'value' => 15243598,
                          ),
                          5 => 
                          array (
                            'key' => 'almost odourless',
                            'value' => 15243610,
                          ),
                          6 => 
                          array (
                            'key' => 'anti-adhesive',
                            'value' => 15243591,
                          ),
                          7 => 
                          array (
                            'key' => 'can be detected magnetically or by X-rays',
                            'value' => 15243613,
                          ),
                          8 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω',
                            'value' => 15243606,
                          ),
                          9 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω/m',
                            'value' => 15243603,
                          ),
                          10 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>9</sup> Ω/m',
                            'value' => 15243607,
                          ),
                          11 => 
                          array (
                            'key' => 'electrically insulating, R > 10<sup>9</sup> Ω/m',
                            'value' => 15243608,
                          ),
                          12 => 
                          array (
                            'key' => 'electrically noncondctive',
                            'value' => 15243595,
                          ),
                          13 => 
                          array (
                            'key' => 'extruded',
                            'value' => 15243612,
                          ),
                          14 => 
                          array (
                            'key' => 'high-performing',
                            'value' => 15243590,
                          ),
                          15 => 
                          array (
                            'key' => 'highly abrasion resisitant ',
                            'value' => 15243592,
                          ),
                          16 => 
                          array (
                            'key' => 'highly abrasion resistant (acc. to DIN ISO 4649-A: <60mm³)',
                            'value' => 15243604,
                          ),
                          17 => 
                          array (
                            'key' => 'homogenous',
                            'value' => 15243586,
                          ),
                          18 => 
                          array (
                            'key' => 'impermeable',
                            'value' => 15243593,
                          ),
                          19 => 
                          array (
                            'key' => 'meets FDA (21 CFR 177.1550) and USP CLASS VI',
                            'value' => 15243596,
                          ),
                          20 => 
                          array (
                            'key' => 'no fuel solubility',
                            'value' => 15243605,
                          ),
                          21 => 
                          array (
                            'key' => 'non-porous',
                            'value' => 15243588,
                          ),
                          22 => 
                          array (
                            'key' => 'plasticizer-free',
                            'value' => 15243589,
                          ),
                          23 => 
                          array (
                            'key' => 'resistant to oil and fats',
                            'value' => 15243600,
                          ),
                          24 => 
                          array (
                            'key' => 'seamless',
                            'value' => 15243594,
                          ),
                          25 => 
                          array (
                            'key' => 'smooth',
                            'value' => 15243587,
                          ),
                          26 => 
                          array (
                            'key' => ' with Conti Orange Wear Indicator',
                            'value' => 15243601,
                          ),
                          27 => 
                          array (
                            'key' => 'with black coiled OHM conductive stripe',
                            'value' => 15243602,
                          ),
                        ),
                         'width' => 300,
                         'height' => 10,
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
                            'value' => 15243303,
                          ),
                          1 => 
                          array (
                            'key' => 'CIIR',
                            'value' => 15243297,
                          ),
                          2 => 
                          array (
                            'key' => 'CM',
                            'value' => 15243304,
                          ),
                          3 => 
                          array (
                            'key' => 'CMD',
                            'value' => 15243311,
                          ),
                          4 => 
                          array (
                            'key' => 'CO',
                            'value' => 15243315,
                          ),
                          5 => 
                          array (
                            'key' => 'CPE',
                            'value' => 15243310,
                          ),
                          6 => 
                          array (
                            'key' => 'CR',
                            'value' => 15243293,
                          ),
                          7 => 
                          array (
                            'key' => 'CR-BR',
                            'value' => 15243306,
                          ),
                          8 => 
                          array (
                            'key' => 'CR-EPDM',
                            'value' => 15243294,
                          ),
                          9 => 
                          array (
                            'key' => 'CSM',
                            'value' => 15243313,
                          ),
                          10 => 
                          array (
                            'key' => 'CSM-BR ',
                            'value' => 15243301,
                          ),
                          11 => 
                          array (
                            'key' => 'ECO',
                            'value' => 15243314,
                          ),
                          12 => 
                          array (
                            'key' => 'EPDM',
                            'value' => 15243290,
                          ),
                          13 => 
                          array (
                            'key' => 'FEP',
                            'value' => 15243296,
                          ),
                          14 => 
                          array (
                            'key' => 'IR-BR',
                            'value' => 15243307,
                          ),
                          15 => 
                          array (
                            'key' => 'NBR',
                            'value' => 15243291,
                          ),
                          16 => 
                          array (
                            'key' => 'NBR-PVC',
                            'value' => 15243316,
                          ),
                          17 => 
                          array (
                            'key' => 'NR',
                            'value' => 15243292,
                          ),
                          18 => 
                          array (
                            'key' => 'PA',
                            'value' => 15243299,
                          ),
                          19 => 
                          array (
                            'key' => 'PES',
                            'value' => 15243312,
                          ),
                          20 => 
                          array (
                            'key' => 'SBR',
                            'value' => 15243298,
                          ),
                          21 => 
                          array (
                            'key' => 'SBR-BR',
                            'value' => 15243305,
                          ),
                          22 => 
                          array (
                            'key' => 'SBR-EPDM',
                            'value' => 15243300,
                          ),
                          23 => 
                          array (
                            'key' => 'SBR-NR',
                            'value' => 15243308,
                          ),
                          24 => 
                          array (
                            'key' => 'Spezial elastomer',
                            'value' => 15243302,
                          ),
                          25 => 
                          array (
                            'key' => 'Synthetic rubber',
                            'value' => 15243309,
                          ),
                          26 => 
                          array (
                            'key' => 'UPE',
                            'value' => 15243295,
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
                            'value' => 15243284,
                          ),
                          1 => 
                          array (
                            'key' => 'blue',
                            'value' => 15243279,
                          ),
                          2 => 
                          array (
                            'key' => 'blue and red',
                            'value' => 15243288,
                          ),
                          3 => 
                          array (
                            'key' => 'bright',
                            'value' => 15243281,
                          ),
                          4 => 
                          array (
                            'key' => 'grey',
                            'value' => 15243280,
                          ),
                          5 => 
                          array (
                            'key' => 'orange',
                            'value' => 15243282,
                          ),
                          6 => 
                          array (
                            'key' => 'red',
                            'value' => 15243283,
                          ),
                          7 => 
                          array (
                            'key' => 'red-orange',
                            'value' => 15243287,
                          ),
                          8 => 
                          array (
                            'key' => 'transparent',
                            'value' => 15243285,
                          ),
                          9 => 
                          array (
                            'key' => 'white',
                            'value' => 15243286,
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
                            'value' => 15243318,
                          ),
                          1 => 
                          array (
                            'key' => 'grooved',
                            'value' => 15243321,
                          ),
                          2 => 
                          array (
                            'key' => 'smooth',
                            'value' => 15243319,
                          ),
                          3 => 
                          array (
                            'key' => 'strongly corrugated',
                            'value' => 15243320,
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
                            'value' => 15243640,
                          ),
                          1 => 
                          array (
                            'key' => 'abrasion resistant',
                            'value' => 15243615,
                          ),
                          2 => 
                          array (
                            'key' => 'ageing resistant',
                            'value' => 15243629,
                          ),
                          3 => 
                          array (
                            'key' => 'chemical-resistant',
                            'value' => 15243619,
                          ),
                          4 => 
                          array (
                            'key' => 'electrically conductive',
                            'value' => 15243633,
                          ),
                          5 => 
                          array (
                            'key' => 'electrically conductive, R < 10<sup>6</sup> Ω',
                            'value' => 15243636,
                          ),
                          6 => 
                          array (
                            'key' => 'flame resistant',
                            'value' => 15243624,
                          ),
                          7 => 
                          array (
                            'key' => 'flame-resistant (MSHA compliant)',
                            'value' => 15243634,
                          ),
                          8 => 
                          array (
                            'key' => 'from DN 25 upward fabric patterned',
                            'value' => 15243631,
                          ),
                          9 => 
                          array (
                            'key' => 'from DN 28 upward CR-cover (fabric patterned)',
                            'value' => 15243622,
                          ),
                          10 => 
                          array (
                            'key' => 'from DN 28 upward fabric patterned',
                            'value' => 15243621,
                          ),
                          11 => 
                          array (
                            'key' => 'from DN 32 upward CR-cover (fabric patterned)',
                            'value' => 15243625,
                          ),
                          12 => 
                          array (
                            'key' => 'from DN 32 upward fabric patterned',
                            'value' => 15243626,
                          ),
                          13 => 
                          array (
                            'key' => 'highly abrasion resistant (acc. to DIN ISO 4649-A: <60mm³)',
                            'value' => 15243639,
                          ),
                          14 => 
                          array (
                            'key' => 'hydrocarbon resistant',
                            'value' => 15243632,
                          ),
                          15 => 
                          array (
                            'key' => 'optional',
                            'value' => 15243637,
                          ),
                          16 => 
                          array (
                            'key' => 'resistant to chicken and fish fat',
                            'value' => 15243635,
                          ),
                          17 => 
                          array (
                            'key' => 'resistant to excrements',
                            'value' => 15243618,
                          ),
                          18 => 
                          array (
                            'key' => 'resistant to fats',
                            'value' => 15243620,
                          ),
                          19 => 
                          array (
                            'key' => 'resistant to oil and fats',
                            'value' => 15243617,
                          ),
                          20 => 
                          array (
                            'key' => 'resistant to ozone, weather and UV',
                            'value' => 15243616,
                          ),
                          21 => 
                          array (
                            'key' => 'resistant to process water and oily air',
                            'value' => 15243627,
                          ),
                          22 => 
                          array (
                            'key' => 'resistant to short influence of oil and chemicals',
                            'value' => 15243628,
                          ),
                          23 => 
                          array (
                            'key' => 'wear-resisitant',
                            'value' => 15243623,
                          ),
                          24 => 
                          array (
                            'key' => 'with black coiled OHM conductive stripe',
                            'value' => 15243630,
                          ),
                          25 => 
                          array (
                            'key' => 'with heat protection cover',
                            'value' => 15243638,
                          ),
                        ),
                         'width' => 300,
                         'height' => 10,
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
                            'value' => 15245396,
                          ),
                          1 => 
                          array (
                            'key' => 'Agricultural sector',
                            'value' => 15245363,
                          ),
                          2 => 
                          array (
                            'key' => 'Agriculture',
                            'value' => 15245466,
                          ),
                          3 => 
                          array (
                            'key' => 'Agriculture machines',
                            'value' => 15245445,
                          ),
                          4 => 
                          array (
                            'key' => 'Air conditioners',
                            'value' => 15245511,
                          ),
                          5 => 
                          array (
                            'key' => 'Aircrafts',
                            'value' => 15245455,
                          ),
                          6 => 
                          array (
                            'key' => 'Application as windscreen washer hose, air control hose, protective hose',
                            'value' => 15245491,
                          ),
                          7 => 
                          array (
                            'key' => 'Automobile industry',
                            'value' => 15245419,
                          ),
                          8 => 
                          array (
                            'key' => 'Aviation Refueling',
                            'value' => 15245473,
                          ),
                          9 => 
                          array (
                            'key' => 'Bakeries',
                            'value' => 15245469,
                          ),
                          10 => 
                          array (
                            'key' => 'Beverage industry',
                            'value' => 15245352,
                          ),
                          11 => 
                          array (
                            'key' => 'Breathing apparatus',
                            'value' => 15245462,
                          ),
                          12 => 
                          array (
                            'key' => 'Breweries',
                            'value' => 15245385,
                          ),
                          13 => 
                          array (
                            'key' => 'Building',
                            'value' => 15245515,
                          ),
                          14 => 
                          array (
                            'key' => 'Buliding cleaning services',
                            'value' => 15245425,
                          ),
                          15 => 
                          array (
                            'key' => 'Buliding material stores',
                            'value' => 15245430,
                          ),
                          16 => 
                          array (
                            'key' => 'Bulk material handling',
                            'value' => 15245494,
                          ),
                          17 => 
                          array (
                            'key' => 'Butchers',
                            'value' => 15245471,
                          ),
                          18 => 
                          array (
                            'key' => 'Camping and caravanning',
                            'value' => 15245353,
                          ),
                          19 => 
                          array (
                            'key' => 'Catering',
                            'value' => 15245486,
                          ),
                          20 => 
                          array (
                            'key' => 'Cement plants',
                            'value' => 15245428,
                          ),
                          21 => 
                          array (
                            'key' => 'Cement silo trucks',
                            'value' => 15245429,
                          ),
                          22 => 
                          array (
                            'key' => 'Channels',
                            'value' => 15245460,
                          ),
                          23 => 
                          array (
                            'key' => 'Cheese dairies',
                            'value' => 15245393,
                          ),
                          24 => 
                          array (
                            'key' => 'Chemical and petrochemical industry',
                            'value' => 15245402,
                          ),
                          25 => 
                          array (
                            'key' => 'Chemical industry',
                            'value' => 15245505,
                          ),
                          26 => 
                          array (
                            'key' => 'Civil & Military',
                            'value' => 15245477,
                          ),
                          27 => 
                          array (
                            'key' => 'Coating companies',
                            'value' => 15245454,
                          ),
                          28 => 
                          array (
                            'key' => 'Commercial kitchens',
                            'value' => 15245354,
                          ),
                          29 => 
                          array (
                            'key' => 'Commercial washing machines and dishwashers',
                            'value' => 15245370,
                          ),
                          30 => 
                          array (
                            'key' => 'Compressed air and compressor manufacturers',
                            'value' => 15245408,
                          ),
                          31 => 
                          array (
                            'key' => 'Concrete and soild pumps',
                            'value' => 15245484,
                          ),
                          32 => 
                          array (
                            'key' => 'Connecting hose of the main compressed air line between railway wagons and locomotive',
                            'value' => 15245522,
                          ),
                          33 => 
                          array (
                            'key' => 'Constant pressure applications',
                            'value' => 15245498,
                          ),
                          34 => 
                          array (
                            'key' => 'Construction industry',
                            'value' => 15245357,
                          ),
                          35 => 
                          array (
                            'key' => 'Construction machines',
                            'value' => 15245467,
                          ),
                          36 => 
                          array (
                            'key' => 'Construction of bridges',
                            'value' => 15245415,
                          ),
                          37 => 
                          array (
                            'key' => 'Convenience food industry',
                            'value' => 15245482,
                          ),
                          38 => 
                          array (
                            'key' => 'Conveying of powdered material (grain size ≤3mm)',
                            'value' => 15245513,
                          ),
                          39 => 
                          array (
                            'key' => 'Cooling and compressed air systems',
                            'value' => 15245447,
                          ),
                          40 => 
                          array (
                            'key' => 'Cooling and heating systems',
                            'value' => 15245378,
                          ),
                          41 => 
                          array (
                            'key' => 'Cooling systems in combustion engines',
                            'value' => 15245377,
                          ),
                          42 => 
                          array (
                            'key' => 'Dairies',
                            'value' => 15245392,
                          ),
                          43 => 
                          array (
                            'key' => 'Diesel fuel pipes',
                            'value' => 15245448,
                          ),
                          44 => 
                          array (
                            'key' => 'Disaster control, hospitals, airports',
                            'value' => 15245485,
                          ),
                          45 => 
                          array (
                            'key' => 'Distillereies',
                            'value' => 15245386,
                          ),
                          46 => 
                          array (
                            'key' => 'Distilleries ',
                            'value' => 15245502,
                          ),
                          47 => 
                          array (
                            'key' => 'Dry ice blasting machines',
                            'value' => 15245433,
                          ),
                          48 => 
                          array (
                            'key' => 'Electric stove',
                            'value' => 15245509,
                          ),
                          49 => 
                          array (
                            'key' => 'Engines',
                            'value' => 15245468,
                          ),
                          50 => 
                          array (
                            'key' => 'Ex zones',
                            'value' => 15245384,
                          ),
                          51 => 
                          array (
                            'key' => 'Excavators',
                            'value' => 15245444,
                          ),
                          52 => 
                          array (
                            'key' => 'Field of compressed air handling',
                            'value' => 15245412,
                          ),
                          53 => 
                          array (
                            'key' => 'Filling machines',
                            'value' => 15245388,
                          ),
                          54 => 
                          array (
                            'key' => 'Fire extinguisher',
                            'value' => 15245453,
                          ),
                          55 => 
                          array (
                            'key' => 'Fish processing',
                            'value' => 15245395,
                          ),
                          56 => 
                          array (
                            'key' => 'Fleets',
                            'value' => 15245365,
                          ),
                          57 => 
                          array (
                            'key' => 'Flue gas desulphurisation plants',
                            'value' => 15245432,
                          ),
                          58 => 
                          array (
                            'key' => 'Foodstuff industry',
                            'value' => 15245351,
                          ),
                          59 => 
                          array (
                            'key' => 'Foodstuffs companies',
                            'value' => 15245390,
                          ),
                          60 => 
                          array (
                            'key' => 'For powders and granulates, for media such as: Cement, Sand, Coal dust, Micro Silica, Fly Ash, Limestone filler, Aluminium Oxide, Plastic Granulates, Industrial Waste',
                            'value' => 15245496,
                          ),
                          61 => 
                          array (
                            'key' => 'For transport of fuel oil, petrol, diesel and bio diesel',
                            'value' => 15245489,
                          ),
                          62 => 
                          array (
                            'key' => 'For transport of milk (for example teat hoses) and potable water according to KTW and DVGW W270',
                            'value' => 15245490,
                          ),
                          63 => 
                          array (
                            'key' => 'Forestry',
                            'value' => 15245423,
                          ),
                          64 => 
                          array (
                            'key' => 'Forklift trucks',
                            'value' => 15245435,
                          ),
                          65 => 
                          array (
                            'key' => 'Forwarding agents',
                            'value' => 15245431,
                          ),
                          66 => 
                          array (
                            'key' => 'Foundries',
                            'value' => 15245414,
                          ),
                          67 => 
                          array (
                            'key' => 'Fuel Handling – Defueling & Refueling',
                            'value' => 15245476,
                          ),
                          68 => 
                          array (
                            'key' => 'Furnaces',
                            'value' => 15245383,
                          ),
                          69 => 
                          array (
                            'key' => 'Garages',
                            'value' => 15245366,
                          ),
                          70 => 
                          array (
                            'key' => 'Gardening',
                            'value' => 15245514,
                          ),
                          71 => 
                          array (
                            'key' => 'General industry',
                            'value' => 15245360,
                          ),
                          72 => 
                          array (
                            'key' => 'General offshore applications',
                            'value' => 15245488,
                          ),
                          73 => 
                          array (
                            'key' => 'Gravel plants',
                            'value' => 15245436,
                          ),
                          74 => 
                          array (
                            'key' => 'Gravel works',
                            'value' => 15245437,
                          ),
                          75 => 
                          array (
                            'key' => 'Ground Support Operations',
                            'value' => 15245475,
                          ),
                          76 => 
                          array (
                            'key' => 'Ground moving machines',
                            'value' => 15245442,
                          ),
                          77 => 
                          array (
                            'key' => 'Harbours',
                            'value' => 15245456,
                          ),
                          78 => 
                          array (
                            'key' => 'Heavy duty applications',
                            'value' => 15245510,
                          ),
                          79 => 
                          array (
                            'key' => 'High Power Cable',
                            'value' => 15245508,
                          ),
                          80 => 
                          array (
                            'key' => 'High pressure hydraulic applications',
                            'value' => 15245497,
                          ),
                          81 => 
                          array (
                            'key' => 'Horticultural companies',
                            'value' => 15245403,
                          ),
                          82 => 
                          array (
                            'key' => 'House',
                            'value' => 15245518,
                          ),
                          83 => 
                          array (
                            'key' => 'Hydraulic and pneumatic applications',
                            'value' => 15245506,
                          ),
                          84 => 
                          array (
                            'key' => 'Hydraulic applications',
                            'value' => 15245507,
                          ),
                          85 => 
                          array (
                            'key' => 'In rail vehicles for cooling water and cooling brines, heating systems, roof drainage and drainage of condensation water',
                            'value' => 15245521,
                          ),
                          86 => 
                          array (
                            'key' => 'Industrial processing of flavorings, seasonings, gourmet food, fruit juices, lemonades & confectionery',
                            'value' => 15245483,
                          ),
                          87 => 
                          array (
                            'key' => 'Industrial processing of oil-, grease- and fruit-based substances',
                            'value' => 15245501,
                          ),
                          88 => 
                          array (
                            'key' => 'Industry',
                            'value' => 15245364,
                          ),
                          89 => 
                          array (
                            'key' => 'Installation and heating system companies',
                            'value' => 15245413,
                          ),
                          90 => 
                          array (
                            'key' => 'Iron and steel industry',
                            'value' => 15245441,
                          ),
                          91 => 
                          array (
                            'key' => 'Iron foundries',
                            'value' => 15245427,
                          ),
                          92 => 
                          array (
                            'key' => 'Jam factories',
                            'value' => 15245400,
                          ),
                          93 => 
                          array (
                            'key' => 'Kompressors',
                            'value' => 15245458,
                          ),
                          94 => 
                          array (
                            'key' => 'Landscaping and gardening',
                            'value' => 15245368,
                          ),
                          95 => 
                          array (
                            'key' => 'Large tank units',
                            'value' => 15245440,
                          ),
                          96 => 
                          array (
                            'key' => 'Large-scale butcheries',
                            'value' => 15245399,
                          ),
                          97 => 
                          array (
                            'key' => 'Largescale garages',
                            'value' => 15245411,
                          ),
                          98 => 
                          array (
                            'key' => 'Lifting platforms',
                            'value' => 15245443,
                          ),
                          99 => 
                          array (
                            'key' => 'Light diving equipment',
                            'value' => 15245463,
                          ),
                          100 => 
                          array (
                            'key' => 'Low Temperature Areas',
                            'value' => 15245474,
                          ),
                          101 => 
                          array (
                            'key' => 'Low-pressure-applications',
                            'value' => 15245478,
                          ),
                          102 => 
                          array (
                            'key' => 'Lubricants, Hydraulik and Compressed air systems',
                            'value' => 15245451,
                          ),
                          103 => 
                          array (
                            'key' => 'Lubricating oil circuit',
                            'value' => 15245446,
                          ),
                          104 => 
                          array (
                            'key' => 'Machinery and plant engineering',
                            'value' => 15245376,
                          ),
                          105 => 
                          array (
                            'key' => 'Manufacturers of welding apparatus',
                            'value' => 15245417,
                          ),
                          106 => 
                          array (
                            'key' => 'Margarine factories',
                            'value' => 15245394,
                          ),
                          107 => 
                          array (
                            'key' => 'Material handling',
                            'value' => 15245439,
                          ),
                          108 => 
                          array (
                            'key' => 'Medium pressure hydraulic applications',
                            'value' => 15245499,
                          ),
                          109 => 
                          array (
                            'key' => 'Metal surface treatment',
                            'value' => 15245359,
                          ),
                          110 => 
                          array (
                            'key' => 'Milk collection vehicles',
                            'value' => 15245401,
                          ),
                          111 => 
                          array (
                            'key' => 'Milk processing industry',
                            'value' => 15245481,
                          ),
                          112 => 
                          array (
                            'key' => 'Milk reception',
                            'value' => 15245487,
                          ),
                          113 => 
                          array (
                            'key' => 'Mineral oil industry',
                            'value' => 15245424,
                          ),
                          114 => 
                          array (
                            'key' => 'Mining industry',
                            'value' => 15245380,
                          ),
                          115 => 
                          array (
                            'key' => 'Mobile or stationary hose lines',
                            'value' => 15245369,
                          ),
                          116 => 
                          array (
                            'key' => 'Municipal emergency water supply',
                            'value' => 15245355,
                          ),
                          117 => 
                          array (
                            'key' => 'Municipal enterprises',
                            'value' => 15245362,
                          ),
                          118 => 
                          array (
                            'key' => 'Mushroom heaters, grills, flame weeding devices',
                            'value' => 15245422,
                          ),
                          119 => 
                          array (
                            'key' => 'Nautical',
                            'value' => 15245516,
                          ),
                          120 => 
                          array (
                            'key' => 'Not suitable for gasoline fuels',
                            'value' => 15245519,
                          ),
                          121 => 
                          array (
                            'key' => 'Offshore technology',
                            'value' => 15245438,
                          ),
                          122 => 
                          array (
                            'key' => 'Oil and chemicals processing industry',
                            'value' => 15245500,
                          ),
                          123 => 
                          array (
                            'key' => 'Oil coolers',
                            'value' => 15245450,
                          ),
                          124 => 
                          array (
                            'key' => 'Oil coolers, lubricants and compressed air systems',
                            'value' => 15245479,
                          ),
                          125 => 
                          array (
                            'key' => 'Oil handling',
                            'value' => 15245493,
                          ),
                          126 => 
                          array (
                            'key' => 'Oil mills',
                            'value' => 15245397,
                          ),
                          127 => 
                          array (
                            'key' => 'Open land',
                            'value' => 15245358,
                          ),
                          128 => 
                          array (
                            'key' => 'Other installations in the brewing, beverage and spirits industry',
                            'value' => 15245389,
                          ),
                          129 => 
                          array (
                            'key' => 'Outdoor events',
                            'value' => 15245356,
                          ),
                          130 => 
                          array (
                            'key' => 'Over- and underground workings',
                            'value' => 15245361,
                          ),
                          131 => 
                          array (
                            'key' => 'Painting companies',
                            'value' => 15245470,
                          ),
                          132 => 
                          array (
                            'key' => 'Passenger and commercial vehicles',
                            'value' => 15245379,
                          ),
                          133 => 
                          array (
                            'key' => 'Petrol stations',
                            'value' => 15245410,
                          ),
                          134 => 
                          array (
                            'key' => 'Pharmaceutical and cosmetic industry',
                            'value' => 15245391,
                          ),
                          135 => 
                          array (
                            'key' => 'Plastics production ',
                            'value' => 15245495,
                          ),
                          136 => 
                          array (
                            'key' => 'Potable water storage tanks',
                            'value' => 15245472,
                          ),
                          137 => 
                          array (
                            'key' => 'Powder material handling',
                            'value' => 15245512,
                          ),
                          138 => 
                          array (
                            'key' => 'Power-steering and lubricant systems',
                            'value' => 15245480,
                          ),
                          139 => 
                          array (
                            'key' => 'Powerplants',
                            'value' => 15245504,
                          ),
                          140 => 
                          array (
                            'key' => 'Pressure controlled gas units',
                            'value' => 15245421,
                          ),
                          141 => 
                          array (
                            'key' => 'Private Area',
                            'value' => 15245371,
                          ),
                          142 => 
                          array (
                            'key' => 'Processing of metal surfaces',
                            'value' => 15245426,
                          ),
                          143 => 
                          array (
                            'key' => 'Public festivals',
                            'value' => 15245381,
                          ),
                          144 => 
                          array (
                            'key' => 'Quarry',
                            'value' => 15245407,
                          ),
                          145 => 
                          array (
                            'key' => 'Railroad cars',
                            'value' => 15245452,
                          ),
                          146 => 
                          array (
                            'key' => 'Railway industry',
                            'value' => 15245372,
                          ),
                          147 => 
                          array (
                            'key' => 'Refineries',
                            'value' => 15245404,
                          ),
                          148 => 
                          array (
                            'key' => 'Rendering plants',
                            'value' => 15245398,
                          ),
                          149 => 
                          array (
                            'key' => 'Road construction',
                            'value' => 15245449,
                          ),
                          150 => 
                          array (
                            'key' => 'Sewage Treatment Plants',
                            'value' => 15245503,
                          ),
                          151 => 
                          array (
                            'key' => 'Sewer cleaning vehicles',
                            'value' => 15245434,
                          ),
                          152 => 
                          array (
                            'key' => 'Shipping industry',
                            'value' => 15245405,
                          ),
                          153 => 
                          array (
                            'key' => 'Shipyards',
                            'value' => 15245374,
                          ),
                          154 => 
                          array (
                            'key' => 'Silo vehicles',
                            'value' => 15245406,
                          ),
                          155 => 
                          array (
                            'key' => 'Steel and iron industry',
                            'value' => 15245409,
                          ),
                          156 => 
                          array (
                            'key' => 'Steel construction',
                            'value' => 15245418,
                          ),
                          157 => 
                          array (
                            'key' => 'Tank ships',
                            'value' => 15245461,
                          ),
                          158 => 
                          array (
                            'key' => 'Tank truck',
                            'value' => 15245492,
                          ),
                          159 => 
                          array (
                            'key' => 'Tank trucks',
                            'value' => 15245464,
                          ),
                          160 => 
                          array (
                            'key' => 'Transport of all motor vehicle fuels',
                            'value' => 15245520,
                          ),
                          161 => 
                          array (
                            'key' => 'Transports',
                            'value' => 15245517,
                          ),
                          162 => 
                          array (
                            'key' => 'Truck brake systems',
                            'value' => 15245465,
                          ),
                          163 => 
                          array (
                            'key' => 'Turbocharger systems and exhaust flap controls',
                            'value' => 15245459,
                          ),
                          164 => 
                          array (
                            'key' => 'UV systems',
                            'value' => 15245457,
                          ),
                          165 => 
                          array (
                            'key' => 'Weekly, Christmas and fair markets',
                            'value' => 15245382,
                          ),
                          166 => 
                          array (
                            'key' => 'Welding and brazing machines',
                            'value' => 15245420,
                          ),
                          167 => 
                          array (
                            'key' => 'Welding shops',
                            'value' => 15245416,
                          ),
                          168 => 
                          array (
                            'key' => 'White goods industry',
                            'value' => 15245373,
                          ),
                          169 => 
                          array (
                            'key' => 'Wine press houses',
                            'value' => 15245387,
                          ),
                          170 => 
                          array (
                            'key' => 'Workshops',
                            'value' => 15245367,
                          ),
                          171 => 
                          array (
                            'key' => 'Yacht construction',
                            'value' => 15245375,
                          ),
                        ),
                         'width' => 300,
                         'height' => 10,
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
                            'value' => 15242991,
                          ),
                          1 => 
                          array (
                            'key' => 'Abrasive foods',
                            'value' => 15243145,
                          ),
                          2 => 
                          array (
                            'key' => 'Acetates',
                            'value' => 15243097,
                          ),
                          3 => 
                          array (
                            'key' => 'Acetylene gas',
                            'value' => 15243071,
                          ),
                          4 => 
                          array (
                            'key' => 'Acidic foods ',
                            'value' => 15243143,
                          ),
                          5 => 
                          array (
                            'key' => 'Acids',
                            'value' => 15243037,
                          ),
                          6 => 
                          array (
                            'key' => 'Activated carbon',
                            'value' => 15243149,
                          ),
                          7 => 
                          array (
                            'key' => 'Air',
                            'value' => 15243028,
                          ),
                          8 => 
                          array (
                            'key' => 'Alcohol',
                            'value' => 15242987,
                          ),
                          9 => 
                          array (
                            'key' => 'Alcohol <20%',
                            'value' => 15243141,
                          ),
                          10 => 
                          array (
                            'key' => 'Aldehydes',
                            'value' => 15243098,
                          ),
                          11 => 
                          array (
                            'key' => 'Aluminium Oxide',
                            'value' => 15243052,
                          ),
                          12 => 
                          array (
                            'key' => 'Aluminium oxide',
                            'value' => 15243114,
                          ),
                          13 => 
                          array (
                            'key' => ' Antifreeze and corrosion inhibitors',
                            'value' => 15243001,
                          ),
                          14 => 
                          array (
                            'key' => 'Antifreezing compounds',
                            'value' => 15243076,
                          ),
                          15 => 
                          array (
                            'key' => 'Argon',
                            'value' => 15243067,
                          ),
                          16 => 
                          array (
                            'key' => 'Ash',
                            'value' => 15243044,
                          ),
                          17 => 
                          array (
                            'key' => 'Beer',
                            'value' => 15243018,
                          ),
                          18 => 
                          array (
                            'key' => 'Benzine',
                            'value' => 15243070,
                          ),
                          19 => 
                          array (
                            'key' => 'Biodiesel resistant',
                            'value' => 15243152,
                          ),
                          20 => 
                          array (
                            'key' => 'Bitumen',
                            'value' => 15243026,
                          ),
                          21 => 
                          array (
                            'key' => 'Breathing air',
                            'value' => 15243069,
                          ),
                          22 => 
                          array (
                            'key' => 'Bulk material',
                            'value' => 15243154,
                          ),
                          23 => 
                          array (
                            'key' => 'Butane',
                            'value' => 15243072,
                          ),
                          24 => 
                          array (
                            'key' => 'Buttermilk',
                            'value' => 15243118,
                          ),
                          25 => 
                          array (
                            'key' => ' CO<sub>2</sub>',
                            'value' => 15243068,
                          ),
                          26 => 
                          array (
                            'key' => 'Carbon black',
                            'value' => 15243047,
                          ),
                          27 => 
                          array (
                            'key' => 'Caustics',
                            'value' => 15243038,
                          ),
                          28 => 
                          array (
                            'key' => 'Cement',
                            'value' => 15243050,
                          ),
                          29 => 
                          array (
                            'key' => 'Chalk',
                            'value' => 15243043,
                          ),
                          30 => 
                          array (
                            'key' => 'Cheese',
                            'value' => 15243125,
                          ),
                          31 => 
                          array (
                            'key' => 'Chemicals',
                            'value' => 15242992,
                          ),
                          32 => 
                          array (
                            'key' => 'Chlorine rubber lacquer',
                            'value' => 15243058,
                          ),
                          33 => 
                          array (
                            'key' => 'Chocolate',
                            'value' => 15243126,
                          ),
                          34 => 
                          array (
                            'key' => 'Citric acid ',
                            'value' => 15243130,
                          ),
                          35 => 
                          array (
                            'key' => 'Clean chemicals',
                            'value' => 15243156,
                          ),
                          36 => 
                          array (
                            'key' => 'Cleaning agents',
                            'value' => 15243091,
                          ),
                          37 => 
                          array (
                            'key' => 'Cleaning and disinfection agents ',
                            'value' => 15243036,
                          ),
                          38 => 
                          array (
                            'key' => 'Coal',
                            'value' => 15243045,
                          ),
                          39 => 
                          array (
                            'key' => 'Coal dust',
                            'value' => 15243110,
                          ),
                          40 => 
                          array (
                            'key' => 'Cold water',
                            'value' => 15243063,
                          ),
                          41 => 
                          array (
                            'key' => 'Commercially available cooling water additives in usual concentrations',
                            'value' => 15243166,
                          ),
                          42 => 
                          array (
                            'key' => 'Compressed air',
                            'value' => 15242999,
                          ),
                          43 => 
                          array (
                            'key' => 'Concrete',
                            'value' => 15243049,
                          ),
                          44 => 
                          array (
                            'key' => 'Condensate',
                            'value' => 15243158,
                          ),
                          45 => 
                          array (
                            'key' => 'Condensation',
                            'value' => 15243016,
                          ),
                          46 => 
                          array (
                            'key' => 'Cooling water',
                            'value' => 15243010,
                          ),
                          47 => 
                          array (
                            'key' => 'Corrosion preventives',
                            'value' => 15243083,
                          ),
                          48 => 
                          array (
                            'key' => 'Corundum',
                            'value' => 15243051,
                          ),
                          49 => 
                          array (
                            'key' => 'Cottage cheese',
                            'value' => 15243127,
                          ),
                          50 => 
                          array (
                            'key' => 'Dairy ice cream',
                            'value' => 15243147,
                          ),
                          51 => 
                          array (
                            'key' => 'Dairy products',
                            'value' => 15243022,
                          ),
                          52 => 
                          array (
                            'key' => 'Demineralised water',
                            'value' => 15243005,
                          ),
                          53 => 
                          array (
                            'key' => 'Diesel fuel',
                            'value' => 15243009,
                          ),
                          54 => 
                          array (
                            'key' => 'Disinfectants',
                            'value' => 15243073,
                          ),
                          55 => 
                          array (
                            'key' => 'Dough ',
                            'value' => 15243139,
                          ),
                          56 => 
                          array (
                            'key' => 'Dredging sludge',
                            'value' => 15243042,
                          ),
                          57 => 
                          array (
                            'key' => 'Dry Ice',
                            'value' => 15243148,
                          ),
                          58 => 
                          array (
                            'key' => 'Dry and oily compressed air',
                            'value' => 15243167,
                          ),
                          59 => 
                          array (
                            'key' => 'Dusty Media',
                            'value' => 15243150,
                          ),
                          60 => 
                          array (
                            'key' => 'Egg yolk',
                            'value' => 15243120,
                          ),
                          61 => 
                          array (
                            'key' => 'Emulsion paints',
                            'value' => 15243061,
                          ),
                          62 => 
                          array (
                            'key' => 'Engine oil',
                            'value' => 15243107,
                          ),
                          63 => 
                          array (
                            'key' => 'Epoxy laquer',
                            'value' => 15243060,
                          ),
                          64 => 
                          array (
                            'key' => 'Ester',
                            'value' => 15243099,
                          ),
                          65 => 
                          array (
                            'key' => 'Excrements',
                            'value' => 15242994,
                          ),
                          66 => 
                          array (
                            'key' => 'Explosive gas',
                            'value' => 15243075,
                          ),
                          67 => 
                          array (
                            'key' => 'Explosive gases and their mixtures',
                            'value' => 15243027,
                          ),
                          68 => 
                          array (
                            'key' => 'Extinguishing media',
                            'value' => 15243153,
                          ),
                          69 => 
                          array (
                            'key' => 'Fats',
                            'value' => 15243040,
                          ),
                          70 => 
                          array (
                            'key' => 'Fatty and oily products',
                            'value' => 15243008,
                          ),
                          71 => 
                          array (
                            'key' => 'Fatty foods',
                            'value' => 15243144,
                          ),
                          72 => 
                          array (
                            'key' => 'Fishmeal',
                            'value' => 15243138,
                          ),
                          73 => 
                          array (
                            'key' => 'Flour',
                            'value' => 15243055,
                          ),
                          74 => 
                          array (
                            'key' => 'Fly ash',
                            'value' => 15243112,
                          ),
                          75 => 
                          array (
                            'key' => 'Foodstuffs',
                            'value' => 15243142,
                          ),
                          76 => 
                          array (
                            'key' => 'Fruit ice cream',
                            'value' => 15243146,
                          ),
                          77 => 
                          array (
                            'key' => 'Fruits',
                            'value' => 15243121,
                          ),
                          78 => 
                          array (
                            'key' => 'Fuel',
                            'value' => 15243002,
                          ),
                          79 => 
                          array (
                            'key' => 'Fuel gases mixed with fluxes and oxygen',
                            'value' => 15243011,
                          ),
                          80 => 
                          array (
                            'key' => 'Fuel oil',
                            'value' => 15243105,
                          ),
                          81 => 
                          array (
                            'key' => 'Fuel-containing air',
                            'value' => 15243151,
                          ),
                          82 => 
                          array (
                            'key' => 'Fuels',
                            'value' => 15243007,
                          ),
                          83 => 
                          array (
                            'key' => 'Gas',
                            'value' => 15243065,
                          ),
                          84 => 
                          array (
                            'key' => 'Gasoil',
                            'value' => 15243078,
                          ),
                          85 => 
                          array (
                            'key' => 'Gear lubricant oil',
                            'value' => 15243108,
                          ),
                          86 => 
                          array (
                            'key' => 'Gelatine',
                            'value' => 15243119,
                          ),
                          87 => 
                          array (
                            'key' => 'Glues',
                            'value' => 15243031,
                          ),
                          88 => 
                          array (
                            'key' => 'Glycol solutions',
                            'value' => 15243079,
                          ),
                          89 => 
                          array (
                            'key' => 'Granulate (Salt, Sugar)',
                            'value' => 15243137,
                          ),
                          90 => 
                          array (
                            'key' => 'Granulate and powder media',
                            'value' => 15242989,
                          ),
                          91 => 
                          array (
                            'key' => 'Granules',
                            'value' => 15243080,
                          ),
                          92 => 
                          array (
                            'key' => 'Gravel',
                            'value' => 15243041,
                          ),
                          93 => 
                          array (
                            'key' => 'Hot air (not oily)',
                            'value' => 15243102,
                          ),
                          94 => 
                          array (
                            'key' => 'Hot cooling water',
                            'value' => 15243101,
                          ),
                          95 => 
                          array (
                            'key' => 'Hot water',
                            'value' => 15243064,
                          ),
                          96 => 
                          array (
                            'key' => 'Hydraulic fluids',
                            'value' => 15243081,
                          ),
                          97 => 
                          array (
                            'key' => 'Hydraulik oils',
                            'value' => 15243029,
                          ),
                          98 => 
                          array (
                            'key' => 'Hygenic/sanitary products',
                            'value' => 15243157,
                          ),
                          99 => 
                          array (
                            'key' => 'Ice',
                            'value' => 15243122,
                          ),
                          100 => 
                          array (
                            'key' => 'Industrial waste',
                            'value' => 15243116,
                          ),
                          101 => 
                          array (
                            'key' => 'Juice',
                            'value' => 15243132,
                          ),
                          102 => 
                          array (
                            'key' => 'Kerosene',
                            'value' => 15243082,
                          ),
                          103 => 
                          array (
                            'key' => 'Ketchup',
                            'value' => 15243133,
                          ),
                          104 => 
                          array (
                            'key' => 'Ketones',
                            'value' => 15243100,
                          ),
                          105 => 
                          array (
                            'key' => 'LPG',
                            'value' => 15243084,
                          ),
                          106 => 
                          array (
                            'key' => 'Lacquers',
                            'value' => 15243030,
                          ),
                          107 => 
                          array (
                            'key' => 'Lactic acid ',
                            'value' => 15243135,
                          ),
                          108 => 
                          array (
                            'key' => 'Lard',
                            'value' => 15243165,
                          ),
                          109 => 
                          array (
                            'key' => 'Limestone filler',
                            'value' => 15243113,
                          ),
                          110 => 
                          array (
                            'key' => 'Liquid gas',
                            'value' => 15243077,
                          ),
                          111 => 
                          array (
                            'key' => 'Liquid mud containing crude oil and grit ',
                            'value' => 15243155,
                          ),
                          112 => 
                          array (
                            'key' => 'Liquid oily and fatty foods',
                            'value' => 15242990,
                          ),
                          113 => 
                          array (
                            'key' => 'Lubricants',
                            'value' => 15243033,
                          ),
                          114 => 
                          array (
                            'key' => 'Lubricating oil',
                            'value' => 15243006,
                          ),
                          115 => 
                          array (
                            'key' => 'Micro silica',
                            'value' => 15243111,
                          ),
                          116 => 
                          array (
                            'key' => 'Microsilica',
                            'value' => 15243162,
                          ),
                          117 => 
                          array (
                            'key' => 'Milk',
                            'value' => 15243021,
                          ),
                          118 => 
                          array (
                            'key' => 'Milk powder',
                            'value' => 15243134,
                          ),
                          119 => 
                          array (
                            'key' => 'Mineral oil',
                            'value' => 15243085,
                          ),
                          120 => 
                          array (
                            'key' => 'Mineral oil and glycol-based hydraulic fluids',
                            'value' => 15242996,
                          ),
                          121 => 
                          array (
                            'key' => 'Mud',
                            'value' => 15243104,
                          ),
                          122 => 
                          array (
                            'key' => 'Mustard',
                            'value' => 15243129,
                          ),
                          123 => 
                          array (
                            'key' => 'Naphtha',
                            'value' => 15243086,
                          ),
                          124 => 
                          array (
                            'key' => 'Natural gas',
                            'value' => 15243074,
                          ),
                          125 => 
                          array (
                            'key' => 'Nitro cellulose lacquer',
                            'value' => 15243057,
                          ),
                          126 => 
                          array (
                            'key' => 'Nitrogen',
                            'value' => 15243066,
                          ),
                          127 => 
                          array (
                            'key' => 'Non-flammable gas',
                            'value' => 15243087,
                          ),
                          128 => 
                          array (
                            'key' => 'Oil',
                            'value' => 15243039,
                          ),
                          129 => 
                          array (
                            'key' => 'Oils',
                            'value' => 15243032,
                          ),
                          130 => 
                          array (
                            'key' => 'Oily air',
                            'value' => 15243024,
                          ),
                          131 => 
                          array (
                            'key' => 'Ore',
                            'value' => 15243046,
                          ),
                          132 => 
                          array (
                            'key' => 'Oxygen',
                            'value' => 15243014,
                          ),
                          133 => 
                          array (
                            'key' => 'PVC',
                            'value' => 15243163,
                          ),
                          134 => 
                          array (
                            'key' => 'Paints',
                            'value' => 15243013,
                          ),
                          135 => 
                          array (
                            'key' => 'Pesticides',
                            'value' => 15243094,
                          ),
                          136 => 
                          array (
                            'key' => 'Petroleum based products up to 50% aromatic component',
                            'value' => 15243109,
                          ),
                          137 => 
                          array (
                            'key' => 'Plastic granulates',
                            'value' => 15243115,
                          ),
                          138 => 
                          array (
                            'key' => 'Polar and aromatic solvents ',
                            'value' => 15243000,
                          ),
                          139 => 
                          array (
                            'key' => 'Polar solvents',
                            'value' => 15243096,
                          ),
                          140 => 
                          array (
                            'key' => 'Polyester lacquer',
                            'value' => 15243062,
                          ),
                          141 => 
                          array (
                            'key' => 'Polyurethane laqcuer',
                            'value' => 15243059,
                          ),
                          142 => 
                          array (
                            'key' => 'Potable water',
                            'value' => 15243023,
                          ),
                          143 => 
                          array (
                            'key' => 'Powder',
                            'value' => 15243140,
                          ),
                          144 => 
                          array (
                            'key' => 'Powder media',
                            'value' => 15243090,
                          ),
                          145 => 
                          array (
                            'key' => 'Powdery and fine-grained bulk materials (grain size "equal to/smaller than" 3mm)',
                            'value' => 15243164,
                          ),
                          146 => 
                          array (
                            'key' => 'Power steering oil',
                            'value' => 15243106,
                          ),
                          147 => 
                          array (
                            'key' => 'Pressurized air',
                            'value' => 15243088,
                          ),
                          148 => 
                          array (
                            'key' => 'Process water',
                            'value' => 15243035,
                          ),
                          149 => 
                          array (
                            'key' => 'Propane',
                            'value' => 15243089,
                          ),
                          150 => 
                          array (
                            'key' => 'Quarz powder',
                            'value' => 15243053,
                          ),
                          151 => 
                          array (
                            'key' => 'Raw milk',
                            'value' => 15243092,
                          ),
                          152 => 
                          array (
                            'key' => 'Raw oil',
                            'value' => 15242998,
                          ),
                          153 => 
                          array (
                            'key' => 'Refrigerant',
                            'value' => 15243004,
                          ),
                          154 => 
                          array (
                            'key' => 'Rice pudding ',
                            'value' => 15243128,
                          ),
                          155 => 
                          array (
                            'key' => 'Salt',
                            'value' => 15243048,
                          ),
                          156 => 
                          array (
                            'key' => 'Salt solutions',
                            'value' => 15243093,
                          ),
                          157 => 
                          array (
                            'key' => 'Sand',
                            'value' => 15242995,
                          ),
                          158 => 
                          array (
                            'key' => 'Sand Steelgrit',
                            'value' => 15242993,
                          ),
                          159 => 
                          array (
                            'key' => 'Sea water',
                            'value' => 15243034,
                          ),
                          160 => 
                          array (
                            'key' => 'Sewage',
                            'value' => 15243017,
                          ),
                          161 => 
                          array (
                            'key' => 'Solvents',
                            'value' => 15243003,
                          ),
                          162 => 
                          array (
                            'key' => 'Sparkling wine ',
                            'value' => 15243123,
                          ),
                          163 => 
                          array (
                            'key' => 'Spirit lacquer',
                            'value' => 15243056,
                          ),
                          164 => 
                          array (
                            'key' => 'Spirits',
                            'value' => 15243136,
                          ),
                          165 => 
                          array (
                            'key' => 'Starch',
                            'value' => 15243160,
                          ),
                          166 => 
                          array (
                            'key' => 'Steam',
                            'value' => 15242988,
                          ),
                          167 => 
                          array (
                            'key' => 'Sugar',
                            'value' => 15243054,
                          ),
                          168 => 
                          array (
                            'key' => 'Sugar syrup',
                            'value' => 15243131,
                          ),
                          169 => 
                          array (
                            'key' => 'Tallow',
                            'value' => 15243117,
                          ),
                          170 => 
                          array (
                            'key' => 'Tar',
                            'value' => 15243025,
                          ),
                          171 => 
                          array (
                            'key' => 'Treated and non-treated cooling water',
                            'value' => 15243012,
                          ),
                          172 => 
                          array (
                            'key' => 'Ultrapure water',
                            'value' => 15243015,
                          ),
                          173 => 
                          array (
                            'key' => 'Vegetable and mineral lubricants',
                            'value' => 15242997,
                          ),
                          174 => 
                          array (
                            'key' => 'Vinegar ',
                            'value' => 15243124,
                          ),
                          175 => 
                          array (
                            'key' => 'Washing powder',
                            'value' => 15243161,
                          ),
                          176 => 
                          array (
                            'key' => 'Water',
                            'value' => 15242986,
                          ),
                          177 => 
                          array (
                            'key' => 'Water emulsions',
                            'value' => 15243095,
                          ),
                          178 => 
                          array (
                            'key' => 'Water-based saturated steam',
                            'value' => 15243159,
                          ),
                          179 => 
                          array (
                            'key' => 'Wine',
                            'value' => 15243019,
                          ),
                          180 => 
                          array (
                            'key' => 'Yoghurt',
                            'value' => 15243020,
                          ),
                          181 => 
                          array (
                            'key' => 'liquid and pasty chemical and petroleum based products',
                            'value' => 15243103,
                          ),
                        ),
                         'width' => 300,
                         'height' => 10,
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\FlowMediumOptionsProvider',
                         'optionsProviderData' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
                         'dynamicOptions' => false,
                         'name' => 'flowMedium',
                         'title' => 'Suitable Flow Medium',
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
