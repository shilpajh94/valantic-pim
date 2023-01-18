<?php 

/** 
* Generated at: 2022-10-18T11:19:27+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- Name [input]
- Template [select]
- AttributeTable [select]
- Color [select]
- BaseProduct [multiselect]
- Brand [multiselect]
- SkeletonProduct [multiselect]
- FittingFamily [multiselect]
- SIOPLevel4 [multiselect]
- Columns [textarea]
- ProductsData [table]
- headerData [textarea]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '25',
   'name' => 'CatalogTables',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1666084765,
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
   'allowInherit' => false,
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
             'name' => 'Configuration',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Configuration',
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
                 'name' => 'BasicInfo',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Basic Info',
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
                     'name' => 'Name',
                     'title' => 'Name',
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
                        'key' => 'Hose Product Page',
                        'value' => 'Hose Product Page',
                      ),
                      1 => 
                      array (
                        'key' => 'Hose Line Page',
                        'value' => 'Hose Line Page',
                      ),
                      2 => 
                      array (
                        'key' => 'Hose Accessories Sleeving',
                        'value' => 'Hose Accessories Sleeving',
                      ),
                      3 => 
                      array (
                        'key' => 'Hose Sub Cover Page',
                        'value' => 'Hose Sub Cover Page',
                      ),
                      4 => 
                      array (
                        'key' => 'Hose Accessories Clamps',
                        'value' => 'Hose Accessories Clamps',
                      ),
                      5 => 
                      array (
                        'key' => 'Hydraulic Fitting',
                        'value' => 'Hydraulic Fitting',
                      ),
                      6 => 
                      array (
                        'key' => 'Industrial Hose Section Page',
                        'value' => 'Industrial Hose Section Page',
                      ),
                      7 => 
                      array (
                        'key' => 'Industrial Hose Product Page',
                        'value' => 'Industrial Hose Product Page',
                      ),
                      8 => 
                      array (
                        'key' => 'Hose Accessories Orings',
                        'value' => 'Hose Accessories Orings',
                      ),
                      9 => 
                      array (
                        'key' => 'PTG Product Page',
                        'value' => 'PTG Product Page',
                      ),
                      10 => 
                      array (
                        'key' => 'Hose Accessories Flanges',
                        'value' => 'Hose Accessories Flanges',
                      ),
                      11 => 
                      array (
                        'key' => 'PDF Page',
                        'value' => 'PDF Page',
                      ),
                      12 => 
                      array (
                        'key' => 'Industrial Hose Fitting Page',
                        'value' => 'Industrial Hose Fitting Page',
                      ),
                      13 => 
                      array (
                        'key' => 'Industrial Hose Fitting Cover Page',
                        'value' => 'Industrial Hose Fitting Cover Page',
                      ),
                      14 => 
                      array (
                        'key' => 'PDF Page with footer',
                        'value' => 'PDF Page with footer',
                      ),
                      15 => 
                      array (
                        'key' => 'Index By Descriptive Number',
                        'value' => 'Index By Descriptive Number',
                      ),
                      16 => 
                      array (
                        'key' => 'Table of Content',
                        'value' => 'Table of Content',
                      ),
                      17 => 
                      array (
                        'key' => 'Part Number Designations',
                        'value' => 'Part Number Designations',
                      ),
                      18 => 
                      array (
                        'key' => 'Index By Product Number',
                        'value' => 'Index By Product Number',
                      ),
                      19 => 
                      array (
                        'key' => 'Common Product Page',
                        'value' => 'Common Product Page',
                      ),
                      20 => 
                      array (
                        'key' => 'Common Editable Page',
                        'value' => 'Common Editable Page',
                      ),
                      21 => 
                      array (
                        'key' => 'Common PDF Pages ',
                        'value' => 'Common PDF Pages ',
                      ),
                      22 => 
                      array (
                        'key' => 'Common Section Page',
                        'value' => 'Common Section Page',
                      ),
                      23 => 
                      array (
                        'key' => 'ContiClean page',
                        'value' => 'ContiClean page',
                      ),
                      24 => 
                      array (
                        'key' => 'Textile Belt Construction',
                        'value' => 'Textile Belt Construction',
                      ),
                      25 => 
                      array (
                        'key' => 'Steelcord Belt Construction',
                        'value' => 'Steelcord Belt Construction',
                      ),
                      26 => 
                      array (
                        'key' => 'Sybercord Technology',
                        'value' => 'Sybercord Technology',
                      ),
                      27 => 
                      array (
                        'key' => 'Conti Pipe Belt',
                        'value' => 'Conti Pipe Belt',
                      ),
                      28 => 
                      array (
                        'key' => 'Mega Pipe Belt',
                        'value' => 'Mega Pipe Belt',
                      ),
                      29 => 
                      array (
                        'key' => 'Cover Compounds',
                        'value' => 'Cover Compounds',
                      ),
                      30 => 
                      array (
                        'key' => 'Cleated Belts',
                        'value' => 'Cleated Belts',
                      ),
                      31 => 
                      array (
                        'key' => 'Conti Protect Systems',
                        'value' => 'Conti Protect Systems',
                      ),
                      32 => 
                      array (
                        'key' => 'Conti Inspect Systems',
                        'value' => 'Conti Inspect Systems',
                      ),
                      33 => 
                      array (
                        'key' => 'Continental Conveyor Services',
                        'value' => 'Continental Conveyor Services',
                      ),
                      34 => 
                      array (
                        'key' => 'Conveyor Belt Group Contact Page',
                        'value' => 'Conveyor Belt Group Contact Page',
                      ),
                      35 => 
                      array (
                        'key' => 'Dynamic Table Of Content',
                        'value' => 'Dynamic Table Of Content',
                      ),
                      36 => 
                      array (
                        'key' => 'CS Cover Page with images',
                        'value' => 'CS Cover Page with images',
                      ),
                    ),
                     'width' => 300,
                     'defaultValue' => '',
                     'optionsProviderClass' => 'CatalogBundle\\OptionProvider\\DocumentOptionsProvider',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'dynamicOptions' => false,
                     'name' => 'Template',
                     'title' => 'Template',
                     'tooltip' => '
',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin:-42px 0px 10px 570px',
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
                     'width' => '',
                     'defaultValue' => '',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'dynamicOptions' => false,
                     'name' => 'AttributeTable',
                     'title' => 'Attribute Table',
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
                        'key' => 'Orange',
                        'value' => 'Orange',
                      ),
                      1 => 
                      array (
                        'key' => 'Black',
                        'value' => 'Black',
                      ),
                    ),
                     'width' => 300,
                     'defaultValue' => 'Black',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'dynamicOptions' => false,
                     'name' => 'Color',
                     'title' => 'Color',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin:-42px 0px 10px 570px',
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                 'fieldtype' => 'fieldset',
                 'labelWidth' => 100,
                 'name' => 'FilterInfo',
                 'type' => NULL,
                 'region' => '',
                 'title' => 'Filter By',
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
                     'width' => '',
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'BaseProduct',
                     'title' => 'Base Product',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
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
                        'key' => '556-50A',
                        'value' => 1829102,
                      ),
                      7 => 
                      array (
                        'key' => 'A.R. THOMSON',
                        'value' => 1645,
                      ),
                      8 => 
                      array (
                        'key' => 'A&H',
                        'value' => 1829180,
                      ),
                      9 => 
                      array (
                        'key' => 'A&M',
                        'value' => 1829168,
                      ),
                      10 => 
                      array (
                        'key' => 'A1',
                        'value' => 5764903,
                      ),
                      11 => 
                      array (
                        'key' => 'ABBOTT',
                        'value' => 1646,
                      ),
                      12 => 
                      array (
                        'key' => 'ABBOTT 1025 SERIES',
                        'value' => 1647,
                      ),
                      13 => 
                      array (
                        'key' => 'ABBOTT CHEM GROUT',
                        'value' => 1648,
                      ),
                      14 => 
                      array (
                        'key' => 'ABBOTT GOODYEAR GRIP',
                        'value' => 1829149,
                      ),
                      15 => 
                      array (
                        'key' => 'ABBOTT INLET HOSE',
                        'value' => 1829145,
                      ),
                      16 => 
                      array (
                        'key' => 'ABLE',
                        'value' => 5759838,
                      ),
                      17 => 
                      array (
                        'key' => 'ABS BLAST',
                        'value' => 1649,
                      ),
                      18 => 
                      array (
                        'key' => 'ACCORD TANK CLEANING',
                        'value' => 1650,
                      ),
                      19 => 
                      array (
                        'key' => 'ACE BREWLINE',
                        'value' => 1651,
                      ),
                      20 => 
                      array (
                        'key' => 'ACE FOOD',
                        'value' => 1652,
                      ),
                      21 => 
                      array (
                        'key' => 'ACE FOOD DISCHARGE',
                        'value' => 1653,
                      ),
                      22 => 
                      array (
                        'key' => 'ACE GRAY FOOD',
                        'value' => 1654,
                      ),
                      23 => 
                      array (
                        'key' => 'ACE RCR FLEXRITE',
                        'value' => 1655,
                      ),
                      24 => 
                      array (
                        'key' => 'ACE RCT FLEXRITE',
                        'value' => 1656,
                      ),
                      25 => 
                      array (
                        'key' => 'ACE RDC FOOD',
                        'value' => 1657,
                      ),
                      26 => 
                      array (
                        'key' => 'ACE RSD FOOD',
                        'value' => 1658,
                      ),
                      27 => 
                      array (
                        'key' => 'AD SEALING HYDROCARBON DRAIN',
                        'value' => 1659,
                      ),
                      28 => 
                      array (
                        'key' => 'ADVANTAGE',
                        'value' => 1660,
                      ),
                      29 => 
                      array (
                        'key' => 'AEROPAL',
                        'value' => 1661,
                      ),
                      30 => 
                      array (
                        'key' => 'AEROPAL BCT',
                        'value' => 1829413,
                      ),
                      31 => 
                      array (
                        'key' => 'AEROPAL C',
                        'value' => 1829408,
                      ),
                      32 => 
                      array (
                        'key' => 'AEROPAL CT',
                        'value' => 1829410,
                      ),
                      33 => 
                      array (
                        'key' => 'AEROPAL E',
                        'value' => 1829409,
                      ),
                      34 => 
                      array (
                        'key' => 'AEROPAL ECT',
                        'value' => 1829411,
                      ),
                      35 => 
                      array (
                        'key' => 'AEROPAL FCT',
                        'value' => 1829412,
                      ),
                      36 => 
                      array (
                        'key' => 'AG SPRAY',
                        'value' => 1662,
                      ),
                      37 => 
                      array (
                        'key' => 'AGCHEM',
                        'value' => 1663,
                      ),
                      38 => 
                      array (
                        'key' => 'AGCHEM S&D',
                        'value' => 1664,
                      ),
                      39 => 
                      array (
                        'key' => 'AGGIE GAS',
                        'value' => 1665,
                      ),
                      40 => 
                      array (
                        'key' => 'AGRI-FLEX',
                        'value' => 1666,
                      ),
                      41 => 
                      array (
                        'key' => 'AHR WATER S&D',
                        'value' => 1667,
                      ),
                      42 => 
                      array (
                        'key' => 'AIR / WATER HOSE',
                        'value' => 5759834,
                      ),
                      43 => 
                      array (
                        'key' => 'AIR & MULTIPURPOSE',
                        'value' => 1829206,
                      ),
                      44 => 
                      array (
                        'key' => 'AIR 1000',
                        'value' => 1668,
                      ),
                      45 => 
                      array (
                        'key' => 'AIR 250',
                        'value' => 1669,
                      ),
                      46 => 
                      array (
                        'key' => 'AIR 250 / 300 / 400',
                        'value' => 5679575,
                      ),
                      47 => 
                      array (
                        'key' => 'AIR 300',
                        'value' => 1670,
                      ),
                      48 => 
                      array (
                        'key' => 'AIR 300 HD',
                        'value' => 1671,
                      ),
                      49 => 
                      array (
                        'key' => 'AIR 400',
                        'value' => 1672,
                      ),
                      50 => 
                      array (
                        'key' => 'AIR BREATHING HOSE',
                        'value' => 1673,
                      ),
                      51 => 
                      array (
                        'key' => 'AIR PSNS',
                        'value' => 1674,
                      ),
                      52 => 
                      array (
                        'key' => 'AIR PUMP GUNITE',
                        'value' => 1675,
                      ),
                      53 => 
                      array (
                        'key' => 'AIR TRIX',
                        'value' => 1676,
                      ),
                      54 => 
                      array (
                        'key' => 'AIR-A-PLANE GLYCOL',
                        'value' => 1677,
                      ),
                      55 => 
                      array (
                        'key' => 'AIR-WATER 400',
                        'value' => 1686,
                      ),
                      56 => 
                      array (
                        'key' => 'AIRCRAFT FUEL SENSING',
                        'value' => 5601937,
                      ),
                      57 => 
                      array (
                        'key' => 'AIRCRAFT FUELING',
                        'value' => 1678,
                      ),
                      58 => 
                      array (
                        'key' => 'AIRGAS',
                        'value' => 7079916,
                      ),
                      59 => 
                      array (
                        'key' => 'AIRGAS FRONTIER',
                        'value' => 1679,
                      ),
                      60 => 
                      array (
                        'key' => 'AIRGAS GRADE R',
                        'value' => 1680,
                      ),
                      61 => 
                      array (
                        'key' => 'AIRGAS GRADE RM',
                        'value' => 1681,
                      ),
                      62 => 
                      array (
                        'key' => 'AIRGAS GRADE T',
                        'value' => 1682,
                      ),
                      63 => 
                      array (
                        'key' => 'AIRMAX FLEXIMAX',
                        'value' => 1683,
                      ),
                      64 => 
                      array (
                        'key' => 'AIRMAX PROMAX',
                        'value' => 1684,
                      ),
                      65 => 
                      array (
                        'key' => 'AIRMAX SUPERMAX',
                        'value' => 1685,
                      ),
                      66 => 
                      array (
                        'key' => 'AIRSER',
                        'value' => 1829328,
                      ),
                      67 => 
                      array (
                        'key' => 'AIRSTAR',
                        'value' => 7079918,
                      ),
                      68 => 
                      array (
                        'key' => 'AJAX',
                        'value' => 1687,
                      ),
                      69 => 
                      array (
                        'key' => 'ALASKA RUBBER',
                        'value' => 1688,
                      ),
                      70 => 
                      array (
                        'key' => 'ALCAN MUD STACKING',
                        'value' => 1689,
                      ),
                      71 => 
                      array (
                        'key' => 'ALCOA POTROOM',
                        'value' => 1690,
                      ),
                      72 => 
                      array (
                        'key' => 'ALEMITE',
                        'value' => 5759833,
                      ),
                      73 => 
                      array (
                        'key' => 'ALLCRETE TEXTILE',
                        'value' => 1691,
                      ),
                      74 => 
                      array (
                        'key' => 'ALLCRETE TEXTILE HD',
                        'value' => 7278692,
                      ),
                      75 => 
                      array (
                        'key' => 'ALLCRETE WIRE',
                        'value' => 1692,
                      ),
                      76 => 
                      array (
                        'key' => 'ALLENT GUNITE',
                        'value' => 1693,
                      ),
                      77 => 
                      array (
                        'key' => 'ALLENT REFRACTORY',
                        'value' => 1694,
                      ),
                      78 => 
                      array (
                        'key' => 'AMEREX 07648 FIREXB',
                        'value' => 1829096,
                      ),
                      79 => 
                      array (
                        'key' => 'AMFLO 702-610',
                        'value' => 1695,
                      ),
                      80 => 
                      array (
                        'key' => 'AMMONIUM NITRATE BLAST',
                        'value' => 1696,
                      ),
                      81 => 
                      array (
                        'key' => 'AMMONIUM NITRATE HD',
                        'value' => 1697,
                      ),
                      82 => 
                      array (
                        'key' => 'AMMONIUM NITRATE PELLET',
                        'value' => 1698,
                      ),
                      83 => 
                      array (
                        'key' => 'ANSUL 423267',
                        'value' => 1829236,
                      ),
                      84 => 
                      array (
                        'key' => 'ANSUL 423581',
                        'value' => 1829215,
                      ),
                      85 => 
                      array (
                        'key' => 'ANSUL 426809',
                        'value' => 1829103,
                      ),
                      86 => 
                      array (
                        'key' => 'ANSUL 429196',
                        'value' => 1829158,
                      ),
                      87 => 
                      array (
                        'key' => 'ANSUL 431352',
                        'value' => 1829112,
                      ),
                      88 => 
                      array (
                        'key' => 'ANSUL 518518',
                        'value' => 1829141,
                      ),
                      89 => 
                      array (
                        'key' => 'ANSUL 535688',
                        'value' => 1829187,
                      ),
                      90 => 
                      array (
                        'key' => 'ANSUL 7083',
                        'value' => 1829173,
                      ),
                      91 => 
                      array (
                        'key' => 'ANSUL 7091',
                        'value' => 1829166,
                      ),
                      92 => 
                      array (
                        'key' => 'ANSUL 71976',
                        'value' => 1829122,
                      ),
                      93 => 
                      array (
                        'key' => 'ANSUL 71980',
                        'value' => 1829234,
                      ),
                      94 => 
                      array (
                        'key' => 'ANSUL 79007',
                        'value' => 1829131,
                      ),
                      95 => 
                      array (
                        'key' => 'APACHE',
                        'value' => 1699,
                      ),
                      96 => 
                      array (
                        'key' => 'APOLLO',
                        'value' => 1700,
                      ),
                      97 => 
                      array (
                        'key' => 'APOLLO FLEXDOCK',
                        'value' => 1701,
                      ),
                      98 => 
                      array (
                        'key' => 'APPION MEGAFLOW CT5',
                        'value' => 1829128,
                      ),
                      99 => 
                      array (
                        'key' => 'APPLIED INDUSTRIAL TECH',
                        'value' => 1702,
                      ),
                      100 => 
                      array (
                        'key' => 'APPLIED JETTING',
                        'value' => 1703,
                      ),
                      101 => 
                      array (
                        'key' => 'AQUAHAMMER',
                        'value' => 1704,
                      ),
                      102 => 
                      array (
                        'key' => 'AQUAPAL',
                        'value' => 1705,
                      ),
                      103 => 
                      array (
                        'key' => 'AR THOMSON',
                        'value' => 1829384,
                      ),
                      104 => 
                      array (
                        'key' => 'AR THOMSON EXTREME CRIMP',
                        'value' => 1706,
                      ),
                      105 => 
                      array (
                        'key' => 'ARCAIR 5077MP',
                        'value' => 1829172,
                      ),
                      106 => 
                      array (
                        'key' => 'ARCAIR INSULATOR',
                        'value' => 1707,
                      ),
                      107 => 
                      array (
                        'key' => 'ARCHON',
                        'value' => 1708,
                      ),
                      108 => 
                      array (
                        'key' => 'ARCO BLAST XF',
                        'value' => 1709,
                      ),
                      109 => 
                      array (
                        'key' => 'ARCTIC EXTREMEFLEX',
                        'value' => 1710,
                      ),
                      110 => 
                      array (
                        'key' => 'ARCTIC FLEXTRA',
                        'value' => 1711,
                      ),
                      111 => 
                      array (
                        'key' => 'ARCTIC FLEXWING',
                        'value' => 1712,
                      ),
                      112 => 
                      array (
                        'key' => 'ARCTIC FUEL DISCHARGE',
                        'value' => 1713,
                      ),
                      113 => 
                      array (
                        'key' => 'ARCTIC LCP3',
                        'value' => 1714,
                      ),
                      114 => 
                      array (
                        'key' => 'ARCTIC LCP4S',
                        'value' => 1715,
                      ),
                      115 => 
                      array (
                        'key' => 'ARCTIC LCP6S',
                        'value' => 1716,
                      ),
                      116 => 
                      array (
                        'key' => 'ARCTIC LR16SC',
                        'value' => 1717,
                      ),
                      117 => 
                      array (
                        'key' => 'ARCTIC LR2SN',
                        'value' => 1718,
                      ),
                      118 => 
                      array (
                        'key' => 'ARCTIC ORTAC',
                        'value' => 1719,
                      ),
                      119 => 
                      array (
                        'key' => 'ARCTIC ORTAC PLUS',
                        'value' => 1720,
                      ),
                      120 => 
                      array (
                        'key' => 'ARCTIC RIG SUPPLY',
                        'value' => 1721,
                      ),
                      121 => 
                      array (
                        'key' => 'ARMOR-FLEX PRO',
                        'value' => 1728,
                      ),
                      122 => 
                      array (
                        'key' => 'ARMORCOAT ACP4',
                        'value' => 1723,
                      ),
                      123 => 
                      array (
                        'key' => 'ARMORCOAT ARC12',
                        'value' => 1724,
                      ),
                      124 => 
                      array (
                        'key' => 'ARMORCOAT ARC13',
                        'value' => 1725,
                      ),
                      125 => 
                      array (
                        'key' => 'ARMORCOAT ARC15',
                        'value' => 1726,
                      ),
                      126 => 
                      array (
                        'key' => 'ARMORCOAT ARC16SC',
                        'value' => 1727,
                      ),
                      127 => 
                      array (
                        'key' => 'ARMORCOAT™ ACP3',
                        'value' => 1722,
                      ),
                      128 => 
                      array (
                        'key' => 'ARONSON',
                        'value' => 1729,
                      ),
                      129 => 
                      array (
                        'key' => 'ARPHSE',
                        'value' => 1730,
                      ),
                      130 => 
                      array (
                        'key' => 'ARTRAC',
                        'value' => 1731,
                      ),
                      131 => 
                      array (
                        'key' => 'ARVAC SW',
                        'value' => 1732,
                      ),
                      132 => 
                      array (
                        'key' => 'AS1335 TWIN-LINE',
                        'value' => 1733,
                      ),
                      133 => 
                      array (
                        'key' => 'AS2435 TYPE 1 AIRBRAKE',
                        'value' => 1734,
                      ),
                      134 => 
                      array (
                        'key' => 'ASJ',
                        'value' => 1735,
                      ),
                      135 => 
                      array (
                        'key' => 'ASJ VERSACRETE',
                        'value' => 1736,
                      ),
                      136 => 
                      array (
                        'key' => 'ASTARAS INSULATER',
                        'value' => 1829229,
                      ),
                      137 => 
                      array (
                        'key' => 'ATLANT WATER',
                        'value' => 1737,
                      ),
                      138 => 
                      array (
                        'key' => 'ATLAS',
                        'value' => 1738,
                      ),
                      139 => 
                      array (
                        'key' => 'ATRUBB NR SPRAY',
                        'value' => 1739,
                      ),
                      140 => 
                      array (
                        'key' => 'AUGER ARC PILING',
                        'value' => 1740,
                      ),
                      141 => 
                      array (
                        'key' => 'AUSTIN',
                        'value' => 1741,
                      ),
                      142 => 
                      array (
                        'key' => 'AUSTIN RUBBER',
                        'value' => 1742,
                      ),
                      143 => 
                      array (
                        'key' => 'AUTOGRIP',
                        'value' => 1743,
                      ),
                      144 => 
                      array (
                        'key' => 'AXIAL FAN HAWK PD',
                        'value' => 1829526,
                      ),
                      145 => 
                      array (
                        'key' => 'BAHCAL',
                        'value' => 1744,
                      ),
                      146 => 
                      array (
                        'key' => 'BANDING COIL',
                        'value' => 1745,
                      ),
                      147 => 
                      array (
                        'key' => 'BARYTES HARDWALL',
                        'value' => 7717365,
                      ),
                      148 => 
                      array (
                        'key' => 'BC COLD FLEX',
                        'value' => 1746,
                      ),
                      149 => 
                      array (
                        'key' => 'BC GASOLINE',
                        'value' => 1747,
                      ),
                      150 => 
                      array (
                        'key' => 'BC MARINA',
                        'value' => 1748,
                      ),
                      151 => 
                      array (
                        'key' => 'BEDFORD',
                        'value' => 1749,
                      ),
                      152 => 
                      array (
                        'key' => 'BLACK FLEXTRA II',
                        'value' => 1750,
                      ),
                      153 => 
                      array (
                        'key' => 'BLACK FLEXTRA II 150',
                        'value' => 1829333,
                      ),
                      154 => 
                      array (
                        'key' => 'BLACK FLEXWING',
                        'value' => 1751,
                      ),
                      155 => 
                      array (
                        'key' => 'BLACK JACK',
                        'value' => 5355084,
                      ),
                      156 => 
                      array (
                        'key' => 'BLACK SOFTWALL',
                        'value' => 5354194,
                      ),
                      157 => 
                      array (
                        'key' => 'BLACKHAWK PD',
                        'value' => 1829520,
                      ),
                      158 => 
                      array (
                        'key' => 'BLAST',
                        'value' => 1752,
                      ),
                      159 => 
                      array (
                        'key' => 'BLAST HD',
                        'value' => 7278691,
                      ),
                      160 => 
                      array (
                        'key' => 'BLASTHOLE SLURRY & DEWATERING',
                        'value' => 1753,
                      ),
                      161 => 
                      array (
                        'key' => 'BLASTHOSE SLURRY',
                        'value' => 1829297,
                      ),
                      162 => 
                      array (
                        'key' => 'BLASTMASTER HD',
                        'value' => 1754,
                      ),
                      163 => 
                      array (
                        'key' => 'BLAUDIECK',
                        'value' => 1755,
                      ),
                      164 => 
                      array (
                        'key' => 'BLAUSTRAHL',
                        'value' => 1829415,
                      ),
                      165 => 
                      array (
                        'key' => 'BLISSFUL FISHERMAN',
                        'value' => 1756,
                      ),
                      166 => 
                      array (
                        'key' => 'BLUCOR',
                        'value' => 1757,
                      ),
                      167 => 
                      array (
                        'key' => 'BLUCOR FLANGE',
                        'value' => 1758,
                      ),
                      168 => 
                      array (
                        'key' => 'BLUE FLEXWING',
                        'value' => 1759,
                      ),
                      169 => 
                      array (
                        'key' => 'BLUE FLOUR',
                        'value' => 1760,
                      ),
                      170 => 
                      array (
                        'key' => 'BLUE XTREME STRAIGH RAD HOSE',
                        'value' => 1761,
                      ),
                      171 => 
                      array (
                        'key' => 'BOOTMOR',
                        'value' => 1762,
                      ),
                      172 => 
                      array (
                        'key' => 'BOP SLEEVE',
                        'value' => 1763,
                      ),
                      173 => 
                      array (
                        'key' => 'BOP WRAP',
                        'value' => 1764,
                      ),
                      174 => 
                      array (
                        'key' => 'BOTTOM LOADING',
                        'value' => 1765,
                      ),
                      175 => 
                      array (
                        'key' => 'BOWLING',
                        'value' => 1829514,
                      ),
                      176 => 
                      array (
                        'key' => 'BR7',
                        'value' => 1766,
                      ),
                      177 => 
                      array (
                        'key' => 'BRAIDAIR',
                        'value' => 1767,
                      ),
                      178 => 
                      array (
                        'key' => 'BRANHAM AIR',
                        'value' => 1829343,
                      ),
                      179 => 
                      array (
                        'key' => 'BRANHAM CHEMONE SUPERIOR',
                        'value' => 1768,
                      ),
                      180 => 
                      array (
                        'key' => 'BREATHING AIR',
                        'value' => 1769,
                      ),
                      181 => 
                      array (
                        'key' => 'BREATHING AIR HOSE',
                        'value' => 1829260,
                      ),
                      182 => 
                      array (
                        'key' => 'BREATHING AIR PLUS',
                        'value' => 1770,
                      ),
                      183 => 
                      array (
                        'key' => 'BRENNTAG',
                        'value' => 1771,
                      ),
                      184 => 
                      array (
                        'key' => 'BREWERS HOSE',
                        'value' => 1772,
                      ),
                      185 => 
                      array (
                        'key' => 'BREWLINE',
                        'value' => 1773,
                      ),
                      186 => 
                      array (
                        'key' => 'BRICK RED AIR',
                        'value' => 1774,
                      ),
                      187 => 
                      array (
                        'key' => 'BRIDGEPOINT',
                        'value' => 1775,
                      ),
                      188 => 
                      array (
                        'key' => 'BRIGADE® MINE',
                        'value' => 1776,
                      ),
                      189 => 
                      array (
                        'key' => 'BRINE HOSE',
                        'value' => 1777,
                      ),
                      190 => 
                      array (
                        'key' => 'BROOM SWEEPER',
                        'value' => 1778,
                      ),
                      191 => 
                      array (
                        'key' => 'BROWN FLEXWING',
                        'value' => 1779,
                      ),
                      192 => 
                      array (
                        'key' => 'BROWN/BLU FLEX',
                        'value' => 1829430,
                      ),
                      193 => 
                      array (
                        'key' => 'BSP Flat Seat (British Standard Pipe)',
                        'value' => 1829966,
                      ),
                      194 => 
                      array (
                        'key' => 'BSPP (British Standard Pipe Parallel)',
                        'value' => 1829964,
                      ),
                      195 => 
                      array (
                        'key' => 'BSPP (British Standard Pipe Parallel) O-Rings',
                        'value' => 3831015,
                      ),
                      196 => 
                      array (
                        'key' => 'BSPT (British Standard Pipe Tapered)',
                        'value' => 1829965,
                      ),
                      197 => 
                      array (
                        'key' => 'BUHLER MIAG',
                        'value' => 1780,
                      ),
                      198 => 
                      array (
                        'key' => 'BULLARD',
                        'value' => 1829140,
                      ),
                      199 => 
                      array (
                        'key' => 'BUTTERWORTH',
                        'value' => 1781,
                      ),
                      200 => 
                      array (
                        'key' => 'BUTYL 200',
                        'value' => 1782,
                      ),
                      201 => 
                      array (
                        'key' => 'C&J WATER S&D',
                        'value' => 1783,
                      ),
                      202 => 
                      array (
                        'key' => 'C&T MIL-DTL-13444H-1-6',
                        'value' => 1829200,
                      ),
                      203 => 
                      array (
                        'key' => 'CABLE CONDUIT',
                        'value' => 1784,
                      ),
                      204 => 
                      array (
                        'key' => 'CABLE COOLING HOSE',
                        'value' => 1785,
                      ),
                      205 => 
                      array (
                        'key' => 'CABLE COVER',
                        'value' => 1786,
                      ),
                      206 => 
                      array (
                        'key' => 'CAMBRG HEALY PII',
                        'value' => 1787,
                      ),
                      207 => 
                      array (
                        'key' => 'CAMLOK',
                        'value' => 1788,
                      ),
                      208 => 
                      array (
                        'key' => 'CARON ARCTIC FLEX',
                        'value' => 1789,
                      ),
                      209 => 
                      array (
                        'key' => 'CARON BLACK SOFTWALL',
                        'value' => 1790,
                      ),
                      210 => 
                      array (
                        'key' => 'CARON FABCHEM',
                        'value' => 1791,
                      ),
                      211 => 
                      array (
                        'key' => 'CASCADE DRY CEMENT',
                        'value' => 1792,
                      ),
                      212 => 
                      array (
                        'key' => 'Catepillar Flange',
                        'value' => 1829977,
                      ),
                      213 => 
                      array (
                        'key' => 'Caterpillar Flange',
                        'value' => 1829961,
                      ),
                      214 => 
                      array (
                        'key' => 'Caterpillar Flange O-Rings Code 61 and Code 62 Flange O-Rings (SAE J518)',
                        'value' => 1831352,
                      ),
                      215 => 
                      array (
                        'key' => 'CENEX',
                        'value' => 1793,
                      ),
                      216 => 
                      array (
                        'key' => 'CENEX OT',
                        'value' => 1794,
                      ),
                      217 => 
                      array (
                        'key' => 'CENTRAL ROCK DRILL',
                        'value' => 1795,
                      ),
                      218 => 
                      array (
                        'key' => 'CHANGED TO FORTRESS WHITE',
                        'value' => 1829316,
                      ),
                      219 => 
                      array (
                        'key' => 'CHEMICAL ACID DISCHARGE',
                        'value' => 1796,
                      ),
                      220 => 
                      array (
                        'key' => 'CHEMONE',
                        'value' => 1797,
                      ),
                      221 => 
                      array (
                        'key' => 'CHEMSTREAM',
                        'value' => 1798,
                      ),
                      222 => 
                      array (
                        'key' => 'CHLO GARLOK',
                        'value' => 1799,
                      ),
                      223 => 
                      array (
                        'key' => 'CITGO',
                        'value' => 6422706,
                      ),
                      224 => 
                      array (
                        'key' => 'CITGO HYDROCARBON DRAIN',
                        'value' => 1829202,
                      ),
                      225 => 
                      array (
                        'key' => 'CLAM JETTING',
                        'value' => 1829434,
                      ),
                      226 => 
                      array (
                        'key' => 'CLEANJET',
                        'value' => 1800,
                      ),
                      227 => 
                      array (
                        'key' => 'CLEANJET FDA',
                        'value' => 1801,
                      ),
                      228 => 
                      array (
                        'key' => 'CLEAR PVC TUBING',
                        'value' => 1802,
                      ),
                      229 => 
                      array (
                        'key' => 'CLEARWATER',
                        'value' => 1803,
                      ),
                      230 => 
                      array (
                        'key' => 'CLEARWATER FLEXTRA NSF',
                        'value' => 4683628,
                      ),
                      231 => 
                      array (
                        'key' => 'CLEARWATER SOFTWALL NSF',
                        'value' => 4683629,
                      ),
                      232 => 
                      array (
                        'key' => 'Clip Pliers',
                        'value' => 1830006,
                      ),
                      233 => 
                      array (
                        'key' => 'CNH',
                        'value' => 7563318,
                      ),
                      234 => 
                      array (
                        'key' => 'CO2 HOSE',
                        'value' => 1804,
                      ),
                      235 => 
                      array (
                        'key' => 'COAST GUARD',
                        'value' => 1805,
                      ),
                      236 => 
                      array (
                        'key' => 'Code 61 Flange (SAE  J518)',
                        'value' => 1829976,
                      ),
                      237 => 
                      array (
                        'key' => 'Code 61 Flange (SAE J518)',
                        'value' => 1829959,
                      ),
                      238 => 
                      array (
                        'key' => 'Code 61 Split Flange Clamp Kits ',
                        'value' => 1831353,
                      ),
                      239 => 
                      array (
                        'key' => 'Code 62 Flange (SAE J518)',
                        'value' => 1829960,
                      ),
                      240 => 
                      array (
                        'key' => 'Code 62 Split Flange Clamp Kits',
                        'value' => 3831018,
                      ),
                      241 => 
                      array (
                        'key' => 'COLD BLUE',
                        'value' => 1806,
                      ),
                      242 => 
                      array (
                        'key' => 'COLD BLUE FLEX',
                        'value' => 7186051,
                      ),
                      243 => 
                      array (
                        'key' => 'COLLECTOR',
                        'value' => 1807,
                      ),
                      244 => 
                      array (
                        'key' => 'COLLECTOR FLEX',
                        'value' => 1808,
                      ),
                      245 => 
                      array (
                        'key' => 'COLORITE',
                        'value' => 1809,
                      ),
                      246 => 
                      array (
                        'key' => 'Compressor O-Ring Tube',
                        'value' => 1829980,
                      ),
                      247 => 
                      array (
                        'key' => 'Compressor Pad Block',
                        'value' => 1829988,
                      ),
                      248 => 
                      array (
                        'key' => 'CON FORM SUPER FLEX',
                        'value' => 1810,
                      ),
                      249 => 
                      array (
                        'key' => 'CON-AG WATER S&D ECO',
                        'value' => 7278690,
                      ),
                      250 => 
                      array (
                        'key' => 'CON-TECH',
                        'value' => 1829228,
                      ),
                      251 => 
                      array (
                        'key' => 'CONAG ECO',
                        'value' => 6951845,
                      ),
                      252 => 
                      array (
                        'key' => 'CONAG WATER S&D',
                        'value' => 1811,
                      ),
                      253 => 
                      array (
                        'key' => 'CONCRETE G820',
                        'value' => 1812,
                      ),
                      254 => 
                      array (
                        'key' => 'CONCRETE VIBRATOR',
                        'value' => 1813,
                      ),
                      255 => 
                      array (
                        'key' => 'CONTI A&M',
                        'value' => 1829426,
                      ),
                      256 => 
                      array (
                        'key' => 'CONTI BLUE STEAM FDA',
                        'value' => 5554379,
                      ),
                      257 => 
                      array (
                        'key' => 'CONTI CHEM EXTRA',
                        'value' => 7085031,
                      ),
                      258 => 
                      array (
                        'key' => 'CONTI CHEM OIL',
                        'value' => 1814,
                      ),
                      259 => 
                      array (
                        'key' => 'CONTI CHEM PHARMA',
                        'value' => 1815,
                      ),
                      260 => 
                      array (
                        'key' => 'CONTI CHEM STANDARD',
                        'value' => 1816,
                      ),
                      261 => 
                      array (
                        'key' => 'CONTI CHEM SUPERIOR FEP',
                        'value' => 1817,
                      ),
                      262 => 
                      array (
                        'key' => 'CONTI FEP',
                        'value' => 7092828,
                      ),
                      263 => 
                      array (
                        'key' => 'CONTI FOOD & DRINK FLEX UPE',
                        'value' => 10663607,
                      ),
                      264 => 
                      array (
                        'key' => 'CONTI PAINT SPRAY',
                        'value' => 1818,
                      ),
                      265 => 
                      array (
                        'key' => 'CONTI POTABLE WATER',
                        'value' => 1819,
                      ),
                      266 => 
                      array (
                        'key' => 'CONTI WASTE WATER',
                        'value' => 1820,
                      ),
                      267 => 
                      array (
                        'key' => 'CONTI® OIL',
                        'value' => 10709285,
                      ),
                      268 => 
                      array (
                        'key' => 'CONTI® TARSPRAY',
                        'value' => 10705762,
                      ),
                      269 => 
                      array (
                        'key' => 'CONTICHEM',
                        'value' => 1829407,
                      ),
                      270 => 
                      array (
                        'key' => 'CONTINENTAL / COX REEL',
                        'value' => 7082340,
                      ),
                      271 => 
                      array (
                        'key' => 'CONTINENTAL MATTE GREEN',
                        'value' => 1829282,
                      ),
                      272 => 
                      array (
                        'key' => 'CONTINENTAL STEEL STEAM 250',
                        'value' => 1821,
                      ),
                      273 => 
                      array (
                        'key' => 'CONTRACTOR 4001',
                        'value' => 1822,
                      ),
                      274 => 
                      array (
                        'key' => 'CONTRACTOR WATER S&D',
                        'value' => 1823,
                      ),
                      275 => 
                      array (
                        'key' => 'CONTRACTOR\'S WATER',
                        'value' => 1824,
                      ),
                      276 => 
                      array (
                        'key' => 'COOLING WATER',
                        'value' => 1825,
                      ),
                      277 => 
                      array (
                        'key' => 'COOLING WATER 2.0',
                        'value' => 1826,
                      ),
                      278 => 
                      array (
                        'key' => 'COTTON CLEANER',
                        'value' => 1829519,
                      ),
                      279 => 
                      array (
                        'key' => 'COUPLING MALE SWIVEL',
                        'value' => 1829191,
                      ),
                      280 => 
                      array (
                        'key' => 'CPE DISCHARGE',
                        'value' => 1827,
                      ),
                      281 => 
                      array (
                        'key' => 'CPLAIR AIRCRAFT',
                        'value' => 1829348,
                      ),
                      282 => 
                      array (
                        'key' => 'CREE BREWERS HOSE',
                        'value' => 1828,
                      ),
                      283 => 
                      array (
                        'key' => 'CTI',
                        'value' => 5355080,
                      ),
                      284 => 
                      array (
                        'key' => 'CULVERT',
                        'value' => 1829,
                      ),
                      285 => 
                      array (
                        'key' => 'DAMPF TRIX 5000',
                        'value' => 1830,
                      ),
                      286 => 
                      array (
                        'key' => 'DAMPF TRIX 6000',
                        'value' => 1831,
                      ),
                      287 => 
                      array (
                        'key' => 'DAMPFTRIX 6000',
                        'value' => 1829406,
                      ),
                      288 => 
                      array (
                        'key' => 'DANICORP DIVERS HOSE',
                        'value' => 7837994,
                      ),
                      289 => 
                      array (
                        'key' => 'DARCOR RED',
                        'value' => 1829318,
                      ),
                      290 => 
                      array (
                        'key' => 'DARCY REDWING FUEL OIL',
                        'value' => 1832,
                      ),
                      291 => 
                      array (
                        'key' => 'DEADMAN AIRCRAFT REFUELING',
                        'value' => 1833,
                      ),
                      292 => 
                      array (
                        'key' => 'DEADMAN SANDBLAST',
                        'value' => 1834,
                      ),
                      293 => 
                      array (
                        'key' => 'DEEP BLUE',
                        'value' => 1829431,
                      ),
                      294 => 
                      array (
                        'key' => 'DEERE',
                        'value' => 1835,
                      ),
                      295 => 
                      array (
                        'key' => 'DEF DISPENSING',
                        'value' => 1836,
                      ),
                      296 => 
                      array (
                        'key' => 'DEF TRANSFER',
                        'value' => 1837,
                      ),
                      297 => 
                      array (
                        'key' => 'DEL TWIN-LINE GRADE R',
                        'value' => 1838,
                      ),
                      298 => 
                      array (
                        'key' => 'DEL TWIN-LINE GRADE RM',
                        'value' => 1839,
                      ),
                      299 => 
                      array (
                        'key' => 'DENVER',
                        'value' => 1840,
                      ),
                      300 => 
                      array (
                        'key' => 'DENVER CONC VIBR',
                        'value' => 1841,
                      ),
                      301 => 
                      array (
                        'key' => 'DESERT DR16SC',
                        'value' => 1842,
                      ),
                      302 => 
                      array (
                        'key' => 'DESERT DR1SN',
                        'value' => 1843,
                      ),
                      303 => 
                      array (
                        'key' => 'DESERT DR2SN',
                        'value' => 1844,
                      ),
                      304 => 
                      array (
                        'key' => 'DESERT DR5',
                        'value' => 1845,
                      ),
                      305 => 
                      array (
                        'key' => 'DESERT DUT',
                        'value' => 1846,
                      ),
                      306 => 
                      array (
                        'key' => 'DEVILBISS',
                        'value' => 1829178,
                      ),
                      307 => 
                      array (
                        'key' => 'DEWATERING',
                        'value' => 1847,
                      ),
                      308 => 
                      array (
                        'key' => 'DIAMOND',
                        'value' => 1829370,
                      ),
                      309 => 
                      array (
                        'key' => 'DIESEL OIL HARDWALL',
                        'value' => 1848,
                      ),
                      310 => 
                      array (
                        'key' => 'DIESEL OIL SOFTWALL',
                        'value' => 1849,
                      ),
                      311 => 
                      array (
                        'key' => 'DIGESTER',
                        'value' => 1850,
                      ),
                      312 => 
                      array (
                        'key' => 'DIISOCYANATE',
                        'value' => 1851,
                      ),
                      313 => 
                      array (
                        'key' => 'DIN 24 Heavy',
                        'value' => 1829968,
                      ),
                      314 => 
                      array (
                        'key' => 'DIN 24 Heavy O-Rings',
                        'value' => 3831017,
                      ),
                      315 => 
                      array (
                        'key' => 'DIN 24 Light',
                        'value' => 1829967,
                      ),
                      316 => 
                      array (
                        'key' => 'DIN 24 Light O-Rings',
                        'value' => 3831016,
                      ),
                      317 => 
                      array (
                        'key' => 'DIN 60',
                        'value' => 1829969,
                      ),
                      318 => 
                      array (
                        'key' => 'DINGA HOT WATER GUN',
                        'value' => 1852,
                      ),
                      319 => 
                      array (
                        'key' => 'DINGA NOZZLE',
                        'value' => 5356966,
                      ),
                      320 => 
                      array (
                        'key' => 'DISCHARGE',
                        'value' => 1853,
                      ),
                      321 => 
                      array (
                        'key' => 'DISHWASHER DRAIN',
                        'value' => 1854,
                      ),
                      322 => 
                      array (
                        'key' => 'DISTILLERY 150',
                        'value' => 1855,
                      ),
                      323 => 
                      array (
                        'key' => 'DISTRB ACID',
                        'value' => 1856,
                      ),
                      324 => 
                      array (
                        'key' => 'DISTRB ARCTIC ORTAC',
                        'value' => 1857,
                      ),
                      325 => 
                      array (
                        'key' => 'DISTRB STEEL AIR',
                        'value' => 1858,
                      ),
                      326 => 
                      array (
                        'key' => 'DISTRB WATER S&D',
                        'value' => 1859,
                      ),
                      327 => 
                      array (
                        'key' => 'DIVERSIFLEX',
                        'value' => 1860,
                      ),
                      328 => 
                      array (
                        'key' => 'DIVERSIPIPE',
                        'value' => 1861,
                      ),
                      329 => 
                      array (
                        'key' => 'DIVING HOSE',
                        'value' => 1862,
                      ),
                      330 => 
                      array (
                        'key' => 'DMC CAUSTIC',
                        'value' => 1863,
                      ),
                      331 => 
                      array (
                        'key' => 'DOCK',
                        'value' => 1864,
                      ),
                      332 => 
                      array (
                        'key' => 'DOCK EN1765 L15',
                        'value' => 1865,
                      ),
                      333 => 
                      array (
                        'key' => 'DOCK EN1765 S15',
                        'value' => 1866,
                      ),
                      334 => 
                      array (
                        'key' => 'DOCK FDA',
                        'value' => 1867,
                      ),
                      335 => 
                      array (
                        'key' => 'DOCK SMOOTH BORE HOT SULFUR',
                        'value' => 1868,
                      ),
                      336 => 
                      array (
                        'key' => 'DOCK SUPPLY SW',
                        'value' => 1869,
                      ),
                      337 => 
                      array (
                        'key' => 'DR16SC',
                        'value' => 1830041,
                      ),
                      338 => 
                      array (
                        'key' => 'DRAGER',
                        'value' => 7740237,
                      ),
                      339 => 
                      array (
                        'key' => 'DREDGE SLEEVE',
                        'value' => 1870,
                      ),
                      340 => 
                      array (
                        'key' => 'DRILL WATER',
                        'value' => 1871,
                      ),
                      341 => 
                      array (
                        'key' => 'DRINK FLEX',
                        'value' => 5300789,
                      ),
                      342 => 
                      array (
                        'key' => 'DRINKLINE',
                        'value' => 1872,
                      ),
                      343 => 
                      array (
                        'key' => 'DRY CEMENT & BARYTES HW',
                        'value' => 7717364,
                      ),
                      344 => 
                      array (
                        'key' => 'DRY CEMENT HARDWALL',
                        'value' => 7717366,
                      ),
                      345 => 
                      array (
                        'key' => 'DRY CEMENT HD HARDWALL',
                        'value' => 1873,
                      ),
                      346 => 
                      array (
                        'key' => 'DRY CEMENT SOFTWALL',
                        'value' => 1874,
                      ),
                      347 => 
                      array (
                        'key' => 'DRY ICE HOSE',
                        'value' => 1875,
                      ),
                      348 => 
                      array (
                        'key' => 'DUAL HI-PERFORMANCE PD',
                        'value' => 1829530,
                      ),
                      349 => 
                      array (
                        'key' => 'DUAL POSITIVE DRIVE PD',
                        'value' => 1829510,
                      ),
                      350 => 
                      array (
                        'key' => 'Dual-Grip DGF1 Ferrule',
                        'value' => 1830020,
                      ),
                      351 => 
                      array (
                        'key' => 'Dual-Grip DGF2 Ferrule',
                        'value' => 1830021,
                      ),
                      352 => 
                      array (
                        'key' => 'DUDLEY WATER',
                        'value' => 1876,
                      ),
                      353 => 
                      array (
                        'key' => 'DUNLOP BOOSTER',
                        'value' => 1877,
                      ),
                      354 => 
                      array (
                        'key' => 'DURACO',
                        'value' => 1878,
                      ),
                      355 => 
                      array (
                        'key' => 'DURACO ROADPATCH',
                        'value' => 1879,
                      ),
                      356 => 
                      array (
                        'key' => 'DWE',
                        'value' => 1829161,
                      ),
                      357 => 
                      array (
                        'key' => 'DYNACRAFT',
                        'value' => 1880,
                      ),
                      358 => 
                      array (
                        'key' => 'DYNACRAFT D1045-2000',
                        'value' => 1829127,
                      ),
                      359 => 
                      array (
                        'key' => 'DYNO',
                        'value' => 1881,
                      ),
                      360 => 
                      array (
                        'key' => 'DYNO HOSE',
                        'value' => 1882,
                      ),
                      361 => 
                      array (
                        'key' => 'DYNO HOSEINHOSE',
                        'value' => 1829231,
                      ),
                      362 => 
                      array (
                        'key' => 'DYNO NOBEL',
                        'value' => 1829125,
                      ),
                      363 => 
                      array (
                        'key' => 'E 1-1',
                        'value' => 1883,
                      ),
                      364 => 
                      array (
                        'key' => 'E 3-1',
                        'value' => 1884,
                      ),
                      365 => 
                      array (
                        'key' => 'E 3-2',
                        'value' => 1885,
                      ),
                      366 => 
                      array (
                        'key' => 'EAGLE AIR & WATER',
                        'value' => 1886,
                      ),
                      367 => 
                      array (
                        'key' => 'EAGLE FLUID POWER',
                        'value' => 1829160,
                      ),
                      368 => 
                      array (
                        'key' => 'ECO LITE',
                        'value' => 3831424,
                      ),
                      369 => 
                      array (
                        'key' => 'ECO RUBBER',
                        'value' => 3831423,
                      ),
                      370 => 
                      array (
                        'key' => 'ECOLAB',
                        'value' => 3831426,
                      ),
                      371 => 
                      array (
                        'key' => 'ECOLAB BLUE',
                        'value' => 1829110,
                      ),
                      372 => 
                      array (
                        'key' => 'ECOLAB WASHDOWN',
                        'value' => 1829193,
                      ),
                      373 => 
                      array (
                        'key' => 'EDPM DISCHARGE',
                        'value' => 1829263,
                      ),
                      374 => 
                      array (
                        'key' => 'EHLYNN',
                        'value' => 1887,
                      ),
                      375 => 
                      array (
                        'key' => 'EHLYNN FLOUR TEC',
                        'value' => 1888,
                      ),
                      376 => 
                      array (
                        'key' => 'EHLYNN FOOD DISCHARGE',
                        'value' => 1889,
                      ),
                      377 => 
                      array (
                        'key' => 'EHLYNN HOT AIR',
                        'value' => 1890,
                      ),
                      378 => 
                      array (
                        'key' => 'EHLYNN PIPE CONNECTOR',
                        'value' => 1891,
                      ),
                      379 => 
                      array (
                        'key' => 'EHLYNN TPG',
                        'value' => 1892,
                      ),
                      380 => 
                      array (
                        'key' => 'ELAFLEX LAY FLAT',
                        'value' => 1893,
                      ),
                      381 => 
                      array (
                        'key' => 'ELITE HOT WATER',
                        'value' => 5680554,
                      ),
                      382 => 
                      array (
                        'key' => 'ELITE POLY-V',
                        'value' => 1829495,
                      ),
                      383 => 
                      array (
                        'key' => 'ELITE POLY-V STRETCH',
                        'value' => 1829529,
                      ),
                      384 => 
                      array (
                        'key' => 'ELITE STANDARD RADIATOR',
                        'value' => 1894,
                      ),
                      385 => 
                      array (
                        'key' => 'ELITE SW MARINE WET EXHAUST',
                        'value' => 1895,
                      ),
                      386 => 
                      array (
                        'key' => 'EMERALD',
                        'value' => 5759836,
                      ),
                      387 => 
                      array (
                        'key' => 'EN12115 PETROLEUM',
                        'value' => 1896,
                      ),
                      388 => 
                      array (
                        'key' => 'EPDM 200',
                        'value' => 1897,
                      ),
                      389 => 
                      array (
                        'key' => 'EPDM 200 (ECONOMY)',
                        'value' => 1898,
                      ),
                      390 => 
                      array (
                        'key' => 'EPDM 200 (NON CON)',
                        'value' => 1899,
                      ),
                      391 => 
                      array (
                        'key' => 'EPDM ACID',
                        'value' => 1900,
                      ),
                      392 => 
                      array (
                        'key' => 'EPDM DISCHARGE',
                        'value' => 1901,
                      ),
                      393 => 
                      array (
                        'key' => 'EPDM S&D',
                        'value' => 1902,
                      ),
                      394 => 
                      array (
                        'key' => 'EPDM SD HD WATER',
                        'value' => 1903,
                      ),
                      395 => 
                      array (
                        'key' => 'EPDM SD WATER',
                        'value' => 1904,
                      ),
                      396 => 
                      array (
                        'key' => 'ERGON',
                        'value' => 1905,
                      ),
                      397 => 
                      array (
                        'key' => 'ERIKS',
                        'value' => 1906,
                      ),
                      398 => 
                      array (
                        'key' => 'ESTABROOK',
                        'value' => 1829163,
                      ),
                      399 => 
                      array (
                        'key' => 'EURO TRIX',
                        'value' => 1907,
                      ),
                      400 => 
                      array (
                        'key' => 'EXIMCO',
                        'value' => 1908,
                      ),
                      401 => 
                      array (
                        'key' => 'EXIMCO FLOATER',
                        'value' => 1829227,
                      ),
                      402 => 
                      array (
                        'key' => 'EXIMCO HYD',
                        'value' => 1829402,
                      ),
                      403 => 
                      array (
                        'key' => 'EXON GP DOCK',
                        'value' => 1909,
                      ),
                      404 => 
                      array (
                        'key' => 'EXPRESS BLOWER',
                        'value' => 1910,
                      ),
                      405 => 
                      array (
                        'key' => 'EXSTATIC',
                        'value' => 1911,
                      ),
                      406 => 
                      array (
                        'key' => 'EXTREME CRIMP CB STEAM',
                        'value' => 1829118,
                      ),
                      407 => 
                      array (
                        'key' => 'EXTREMEBLAST LOAD',
                        'value' => 1912,
                      ),
                      408 => 
                      array (
                        'key' => 'EXTREMEFLEX BEVERAGE',
                        'value' => 1913,
                      ),
                      409 => 
                      array (
                        'key' => 'EXTREMEFLEX CHEMICAL BROWN',
                        'value' => 1914,
                      ),
                      410 => 
                      array (
                        'key' => 'EXTREMEFLEX CHEMICAL PURPLE',
                        'value' => 1915,
                      ),
                      411 => 
                      array (
                        'key' => 'EXTREMEFLEX FOOD',
                        'value' => 1829369,
                      ),
                      412 => 
                      array (
                        'key' => 'EXTREMEFLEX FOOD BLUE',
                        'value' => 1916,
                      ),
                      413 => 
                      array (
                        'key' => 'EXTREMEFLEX FOOD GRAY',
                        'value' => 1917,
                      ),
                      414 => 
                      array (
                        'key' => 'EXTREMEFLEX FOOD RED',
                        'value' => 1829382,
                      ),
                      415 => 
                      array (
                        'key' => 'EXTREMEFLEX PETROLEUM',
                        'value' => 1918,
                      ),
                      416 => 
                      array (
                        'key' => 'EXTREMEFLEX POTABLE WATER',
                        'value' => 1919,
                      ),
                      417 => 
                      array (
                        'key' => 'EXTREMEFLEX VERSIFLO',
                        'value' => 1920,
                      ),
                      418 => 
                      array (
                        'key' => 'EXTREMEFLEX WATER SLURRY',
                        'value' => 1921,
                      ),
                      419 => 
                      array (
                        'key' => 'EZ GLIDE WINE',
                        'value' => 1922,
                      ),
                      420 => 
                      array (
                        'key' => 'F5 AIR',
                        'value' => 1923,
                      ),
                      421 => 
                      array (
                        'key' => 'FABCHEM',
                        'value' => 1924,
                      ),
                      422 => 
                      array (
                        'key' => 'FABCHEM ARC',
                        'value' => 1925,
                      ),
                      423 => 
                      array (
                        'key' => 'FABCHEM EN12115',
                        'value' => 1926,
                      ),
                      424 => 
                      array (
                        'key' => 'FABCHEM-C',
                        'value' => 1927,
                      ),
                      425 => 
                      array (
                        'key' => 'FALCON PD',
                        'value' => 1829521,
                      ),
                      426 => 
                      array (
                        'key' => 'Ferrules',
                        'value' => 1830012,
                      ),
                      427 => 
                      array (
                        'key' => 'FHP',
                        'value' => 1829507,
                      ),
                      428 => 
                      array (
                        'key' => 'FIBERG CRUCIBLE GASK',
                        'value' => 1928,
                      ),
                      429 => 
                      array (
                        'key' => 'FINISHING BRANDS',
                        'value' => 1929,
                      ),
                      430 => 
                      array (
                        'key' => 'FINN',
                        'value' => 1829171,
                      ),
                      431 => 
                      array (
                        'key' => 'FIRE ENGINE BOOSTER',
                        'value' => 1930,
                      ),
                      432 => 
                      array (
                        'key' => 'FIRE ENGINE SUCTION',
                        'value' => 1931,
                      ),
                      433 => 
                      array (
                        'key' => 'FIRE ENGINER BOOSTER',
                        'value' => 1932,
                      ),
                      434 => 
                      array (
                        'key' => 'FIRE EXTINGUISHER UL92',
                        'value' => 5679576,
                      ),
                      435 => 
                      array (
                        'key' => 'FIRE SUCTION & DISCHARGE',
                        'value' => 1829433,
                      ),
                      436 => 
                      array (
                        'key' => 'FISH HOSE',
                        'value' => 1933,
                      ),
                      437 => 
                      array (
                        'key' => 'FISH SUCTION',
                        'value' => 1829238,
                      ),
                      438 => 
                      array (
                        'key' => 'FISH TRANSFER',
                        'value' => 1934,
                      ),
                      439 => 
                      array (
                        'key' => 'Flange Engine Oil Connection (Two Bolt)',
                        'value' => 1830007,
                      ),
                      440 => 
                      array (
                        'key' => 'Flareless Tube',
                        'value' => 1829981,
                      ),
                      441 => 
                      array (
                        'key' => 'Flareless Tube Nuts',
                        'value' => 1829994,
                      ),
                      442 => 
                      array (
                        'key' => 'Flareless Tube Sleeves',
                        'value' => 1829995,
                      ),
                      443 => 
                      array (
                        'key' => 'FLASH',
                        'value' => 5355083,
                      ),
                      444 => 
                      array (
                        'key' => 'FLDCON',
                        'value' => 1935,
                      ),
                      445 => 
                      array (
                        'key' => 'FLEX-ING FLEX AQUA WATER S&D',
                        'value' => 1943,
                      ),
                      446 => 
                      array (
                        'key' => 'FLEX-ING FLEX-ON',
                        'value' => 1944,
                      ),
                      447 => 
                      array (
                        'key' => 'FLEX-PULSE FPII',
                        'value' => 1946,
                      ),
                      448 => 
                      array (
                        'key' => 'FLEXAGRIP™',
                        'value' => 1936,
                      ),
                      449 => 
                      array (
                        'key' => 'FLEXCHEM 225',
                        'value' => 1937,
                      ),
                      450 => 
                      array (
                        'key' => 'FLEXDOCK',
                        'value' => 1938,
                      ),
                      451 => 
                      array (
                        'key' => 'FLEXDOCK VERSAFUEL',
                        'value' => 1939,
                      ),
                      452 => 
                      array (
                        'key' => 'FLEXIBLE DOWNSPOUT',
                        'value' => 1940,
                      ),
                      453 => 
                      array (
                        'key' => 'FLEXIBLE TEFLON',
                        'value' => 1941,
                      ),
                      454 => 
                      array (
                        'key' => 'FLEXICORE',
                        'value' => 1942,
                      ),
                      455 => 
                      array (
                        'key' => 'FLEXILLA',
                        'value' => 1829099,
                      ),
                      456 => 
                      array (
                        'key' => 'FLEXING FLEX-ON',
                        'value' => 1829124,
                      ),
                      457 => 
                      array (
                        'key' => 'FLEXJET',
                        'value' => 1945,
                      ),
                      458 => 
                      array (
                        'key' => 'FLEXON',
                        'value' => 1829094,
                      ),
                      459 => 
                      array (
                        'key' => 'FLEXRITE',
                        'value' => 1947,
                      ),
                      460 => 
                      array (
                        'key' => 'FLEXSHIELD SAE J1527 A1-15',
                        'value' => 1829362,
                      ),
                      461 => 
                      array (
                        'key' => 'FLEXSHIELD SAE J1527 TYPE A1-15',
                        'value' => 1948,
                      ),
                      462 => 
                      array (
                        'key' => 'FLEXSTEEL 250 ORS STEAM',
                        'value' => 1952,
                      ),
                      463 => 
                      array (
                        'key' => 'FLEXSTEEL 250 STEAM',
                        'value' => 1953,
                      ),
                      464 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA',
                        'value' => 1954,
                      ),
                      465 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA B20',
                        'value' => 1955,
                      ),
                      466 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA E25',
                        'value' => 1956,
                      ),
                      467 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA ETHAN-ALL',
                        'value' => 1957,
                      ),
                      468 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA HVR',
                        'value' => 1958,
                      ),
                      469 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA HVR LOW PERM',
                        'value' => 1959,
                      ),
                      470 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA LOW PERM',
                        'value' => 1960,
                      ),
                      471 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA VAPOR ASSIST',
                        'value' => 1961,
                      ),
                      472 => 
                      array (
                        'key' => 'FLEXSTEEL HW',
                        'value' => 1829212,
                      ),
                      473 => 
                      array (
                        'key' => 'FLEXSTEEL MINE SPRAY',
                        'value' => 1962,
                      ),
                      474 => 
                      array (
                        'key' => 'FLEXSTEEL MINESPRAY',
                        'value' => 1963,
                      ),
                      475 => 
                      array (
                        'key' => 'FLEXSTEEL SERVICE STATION AIR',
                        'value' => 1964,
                      ),
                      476 => 
                      array (
                        'key' => 'FLEXSTEEL® 250 CB EXTREME CRIMP',
                        'value' => 1949,
                      ),
                      477 => 
                      array (
                        'key' => 'FLEXSTEEL® 250 CB STEAM',
                        'value' => 1950,
                      ),
                      478 => 
                      array (
                        'key' => 'FLEXSTEEL® 250 EPDM',
                        'value' => 1829327,
                      ),
                      479 => 
                      array (
                        'key' => 'FLEXSTEEL® 250 EPDM-20',
                        'value' => 1951,
                      ),
                      480 => 
                      array (
                        'key' => 'FLEXTRA DRY MATERIAL',
                        'value' => 1965,
                      ),
                      481 => 
                      array (
                        'key' => 'FLEXTRA LT',
                        'value' => 1966,
                      ),
                      482 => 
                      array (
                        'key' => 'FLEXTRA LT BLUE',
                        'value' => 1829367,
                      ),
                      483 => 
                      array (
                        'key' => 'FLEXTRA OILFIELD',
                        'value' => 1967,
                      ),
                      484 => 
                      array (
                        'key' => 'FLEXTRA PETROLEUM',
                        'value' => 7287904,
                      ),
                      485 => 
                      array (
                        'key' => 'FLEXTRA ROCK DUST',
                        'value' => 1968,
                      ),
                      486 => 
                      array (
                        'key' => 'FLEXTRAL',
                        'value' => 5764904,
                      ),
                      487 => 
                      array (
                        'key' => 'FLEXTRAL GRIP-LOC',
                        'value' => 1829179,
                      ),
                      488 => 
                      array (
                        'key' => 'FLEXTRAL J2',
                        'value' => 1829399,
                      ),
                      489 => 
                      array (
                        'key' => 'FLEXWAC',
                        'value' => 1969,
                      ),
                      490 => 
                      array (
                        'key' => 'FLEXWING FOOD',
                        'value' => 3947663,
                      ),
                      491 => 
                      array (
                        'key' => 'FLEXWING FOOD BLUE',
                        'value' => 1970,
                      ),
                      492 => 
                      array (
                        'key' => 'FLEXWING OILFIELD',
                        'value' => 1971,
                      ),
                      493 => 
                      array (
                        'key' => 'FLEXWING PETROLEUM',
                        'value' => 1972,
                      ),
                      494 => 
                      array (
                        'key' => 'FLEXWING VERSAFUEL',
                        'value' => 1973,
                      ),
                      495 => 
                      array (
                        'key' => 'FLEXWING WATER S&D',
                        'value' => 1974,
                      ),
                      496 => 
                      array (
                        'key' => 'FLOATER',
                        'value' => 1975,
                      ),
                      497 => 
                      array (
                        'key' => 'FLOATING HOSES',
                        'value' => 1976,
                      ),
                      498 => 
                      array (
                        'key' => 'FLOUR DISCHARGE',
                        'value' => 1977,
                      ),
                      499 => 
                      array (
                        'key' => 'FLUOROPAL',
                        'value' => 1978,
                      ),
                      500 => 
                      array (
                        'key' => 'FOAM',
                        'value' => 1979,
                      ),
                      501 => 
                      array (
                        'key' => 'FOOD 2720',
                        'value' => 1980,
                      ),
                      502 => 
                      array (
                        'key' => 'FOOD DISCHARGE',
                        'value' => 1981,
                      ),
                      503 => 
                      array (
                        'key' => 'FOOD FLEX',
                        'value' => 1982,
                      ),
                      504 => 
                      array (
                        'key' => 'FOOD SUCTION & DISCHARGE',
                        'value' => 1983,
                      ),
                      505 => 
                      array (
                        'key' => 'FOODCLEAN',
                        'value' => 1984,
                      ),
                      506 => 
                      array (
                        'key' => 'FOODLINER',
                        'value' => 1985,
                      ),
                      507 => 
                      array (
                        'key' => 'Ford Spring Lock',
                        'value' => 1829989,
                      ),
                      508 => 
                      array (
                        'key' => 'FORECAST BLAST',
                        'value' => 1986,
                      ),
                      509 => 
                      array (
                        'key' => 'FORECAST BLAST XF',
                        'value' => 1987,
                      ),
                      510 => 
                      array (
                        'key' => 'FORECAST SUCTION',
                        'value' => 1988,
                      ),
                      511 => 
                      array (
                        'key' => 'FORESTRY',
                        'value' => 1989,
                      ),
                      512 => 
                      array (
                        'key' => 'FORMADRAIN INFLATABLE HOSE',
                        'value' => 1990,
                      ),
                      513 => 
                      array (
                        'key' => 'FORTRESS',
                        'value' => 1991,
                      ),
                      514 => 
                      array (
                        'key' => 'FOSTER',
                        'value' => 1992,
                      ),
                      515 => 
                      array (
                        'key' => 'FRAC',
                        'value' => 1993,
                      ),
                      516 => 
                      array (
                        'key' => 'FRAC ACID S&D',
                        'value' => 1994,
                      ),
                      517 => 
                      array (
                        'key' => 'FRAC ACID S&D 400',
                        'value' => 1829354,
                      ),
                      518 => 
                      array (
                        'key' => 'FRAC BLENDING 500SD',
                        'value' => 1829374,
                      ),
                      519 => 
                      array (
                        'key' => 'FRAC BLENDING S&D',
                        'value' => 1995,
                      ),
                      520 => 
                      array (
                        'key' => 'FRACO',
                        'value' => 1996,
                      ),
                      521 => 
                      array (
                        'key' => 'FREON CHARGING',
                        'value' => 1997,
                      ),
                      522 => 
                      array (
                        'key' => 'FRIG SEA',
                        'value' => 1998,
                      ),
                      523 => 
                      array (
                        'key' => 'FRONTIER®',
                        'value' => 1999,
                      ),
                      524 => 
                      array (
                        'key' => 'FUEL DISCHARGE',
                        'value' => 2000,
                      ),
                      525 => 
                      array (
                        'key' => 'FUEL DISCHARGE 150',
                        'value' => 1829337,
                      ),
                      526 => 
                      array (
                        'key' => 'FUEL DISCHARGE 200',
                        'value' => 1829405,
                      ),
                      527 => 
                      array (
                        'key' => 'FUEL DISCHARGE 250',
                        'value' => 1829237,
                      ),
                      528 => 
                      array (
                        'key' => 'FUEL DISCHARGE 300',
                        'value' => 1829373,
                      ),
                      529 => 
                      array (
                        'key' => 'FUEL DISCHARGE HD',
                        'value' => 2001,
                      ),
                      530 => 
                      array (
                        'key' => 'FUEL DISCHARGE HD 300',
                        'value' => 1829422,
                      ),
                      531 => 
                      array (
                        'key' => 'FUEL FILL SAE J1527 TYPE A2',
                        'value' => 2002,
                      ),
                      532 => 
                      array (
                        'key' => 'FUEL RIG SW',
                        'value' => 2003,
                      ),
                      533 => 
                      array (
                        'key' => 'FUELGRIP COUPLING',
                        'value' => 2004,
                      ),
                      534 => 
                      array (
                        'key' => 'FUGGITT',
                        'value' => 2005,
                      ),
                      535 => 
                      array (
                        'key' => 'FUJI',
                        'value' => 2006,
                      ),
                      536 => 
                      array (
                        'key' => 'FURNACE DOOR',
                        'value' => 2007,
                      ),
                      537 => 
                      array (
                        'key' => 'FUTURA O-RING KIT',
                        'value' => 2008,
                      ),
                      538 => 
                      array (
                        'key' => 'FUTURA RET RING INST. TOOL',
                        'value' => 2009,
                      ),
                      539 => 
                      array (
                        'key' => 'GALAXY G4826',
                        'value' => 2010,
                      ),
                      540 => 
                      array (
                        'key' => 'GALAXY G4867',
                        'value' => 2011,
                      ),
                      541 => 
                      array (
                        'key' => 'GALAXY G4890',
                        'value' => 2012,
                      ),
                      542 => 
                      array (
                        'key' => 'GALVANATOR',
                        'value' => 2013,
                      ),
                      543 => 
                      array (
                        'key' => 'GAMMON',
                        'value' => 2014,
                      ),
                      544 => 
                      array (
                        'key' => 'GARDEN HOSE',
                        'value' => 1829286,
                      ),
                      545 => 
                      array (
                        'key' => 'GARRISON GAUNTLET',
                        'value' => 1829424,
                      ),
                      546 => 
                      array (
                        'key' => 'GATES',
                        'value' => 1829135,
                      ),
                      547 => 
                      array (
                        'key' => 'GATES 32000002',
                        'value' => 1829418,
                      ),
                      548 => 
                      array (
                        'key' => 'GATES 32000003',
                        'value' => 1829305,
                      ),
                      549 => 
                      array (
                        'key' => 'GATES 32000006',
                        'value' => 1829245,
                      ),
                      550 => 
                      array (
                        'key' => 'GATES 32000007',
                        'value' => 1829294,
                      ),
                      551 => 
                      array (
                        'key' => 'GATES 32000008',
                        'value' => 1829247,
                      ),
                      552 => 
                      array (
                        'key' => 'GATES 32000009',
                        'value' => 1829209,
                      ),
                      553 => 
                      array (
                        'key' => 'GATES 32000011',
                        'value' => 1829265,
                      ),
                      554 => 
                      array (
                        'key' => 'GATES 32000012',
                        'value' => 1829276,
                      ),
                      555 => 
                      array (
                        'key' => 'GATES 32000013',
                        'value' => 1829254,
                      ),
                      556 => 
                      array (
                        'key' => 'GATES 32000014',
                        'value' => 1829213,
                      ),
                      557 => 
                      array (
                        'key' => 'GATES 32000015',
                        'value' => 1829419,
                      ),
                      558 => 
                      array (
                        'key' => 'GATES 32000016',
                        'value' => 1829235,
                      ),
                      559 => 
                      array (
                        'key' => 'GATES 32000213',
                        'value' => 1829420,
                      ),
                      560 => 
                      array (
                        'key' => 'GATES 32020011',
                        'value' => 1829185,
                      ),
                      561 => 
                      array (
                        'key' => 'GATES 32020016',
                        'value' => 1829390,
                      ),
                      562 => 
                      array (
                        'key' => 'GATES 32020021',
                        'value' => 1829391,
                      ),
                      563 => 
                      array (
                        'key' => 'GATES 32020027',
                        'value' => 1829392,
                      ),
                      564 => 
                      array (
                        'key' => 'GATES 32041328',
                        'value' => 1829151,
                      ),
                      565 => 
                      array (
                        'key' => 'GATES 32041346',
                        'value' => 1829126,
                      ),
                      566 => 
                      array (
                        'key' => 'GATES 32041349',
                        'value' => 1829194,
                      ),
                      567 => 
                      array (
                        'key' => 'GATES 32041355',
                        'value' => 1829136,
                      ),
                      568 => 
                      array (
                        'key' => 'GATES 32041364',
                        'value' => 1829148,
                      ),
                      569 => 
                      array (
                        'key' => 'GATES 32041425',
                        'value' => 1829267,
                      ),
                      570 => 
                      array (
                        'key' => 'GATES 32041437',
                        'value' => 1829394,
                      ),
                      571 => 
                      array (
                        'key' => 'GATES 32050016',
                        'value' => 1829284,
                      ),
                      572 => 
                      array (
                        'key' => 'GATES 32050026',
                        'value' => 1829250,
                      ),
                      573 => 
                      array (
                        'key' => 'GATES 32050031',
                        'value' => 1829259,
                      ),
                      574 => 
                      array (
                        'key' => 'GATES 32050036',
                        'value' => 1829240,
                      ),
                      575 => 
                      array (
                        'key' => 'GATES 32050040',
                        'value' => 1829208,
                      ),
                      576 => 
                      array (
                        'key' => 'GATES 32050041',
                        'value' => 1829177,
                      ),
                      577 => 
                      array (
                        'key' => 'GATES 32050046',
                        'value' => 1829146,
                      ),
                      578 => 
                      array (
                        'key' => 'GATES 32050049',
                        'value' => 1829244,
                      ),
                      579 => 
                      array (
                        'key' => 'GATES 32050055',
                        'value' => 1829181,
                      ),
                      580 => 
                      array (
                        'key' => 'GATES 32050226',
                        'value' => 1829308,
                      ),
                      581 => 
                      array (
                        'key' => 'GATES 32050231',
                        'value' => 1829310,
                      ),
                      582 => 
                      array (
                        'key' => 'GATES 32050236',
                        'value' => 1829421,
                      ),
                      583 => 
                      array (
                        'key' => 'GATES 32050241',
                        'value' => 1829303,
                      ),
                      584 => 
                      array (
                        'key' => 'GATES 32714397',
                        'value' => 1829425,
                      ),
                      585 => 
                      array (
                        'key' => 'GATES 3624-0145',
                        'value' => 1829261,
                      ),
                      586 => 
                      array (
                        'key' => 'GATES GASFLEX',
                        'value' => 1829331,
                      ),
                      587 => 
                      array (
                        'key' => 'GATES STEAMKING',
                        'value' => 1829107,
                      ),
                      588 => 
                      array (
                        'key' => 'GAUNTLET',
                        'value' => 2015,
                      ),
                      589 => 
                      array (
                        'key' => 'GBT',
                        'value' => 7605428,
                      ),
                      590 => 
                      array (
                        'key' => 'GENERIC',
                        'value' => 2016,
                      ),
                      591 => 
                      array (
                        'key' => 'GENERIC AIR',
                        'value' => 1829359,
                      ),
                      592 => 
                      array (
                        'key' => 'GENERIC AIR 250',
                        'value' => 1829312,
                      ),
                      593 => 
                      array (
                        'key' => 'GENERIC AIR BREATHING',
                        'value' => 7740436,
                      ),
                      594 => 
                      array (
                        'key' => 'GENERIC LOW TEMP TANK TRUCK',
                        'value' => 2017,
                      ),
                      595 => 
                      array (
                        'key' => 'GENERIC PETRO TANK TRUCK',
                        'value' => 1829253,
                      ),
                      596 => 
                      array (
                        'key' => 'GENERIC PL & GR',
                        'value' => 1829332,
                      ),
                      597 => 
                      array (
                        'key' => 'GENERIC PLASTER & GROUT',
                        'value' => 2018,
                      ),
                      598 => 
                      array (
                        'key' => 'GENERIC PUSH-ON',
                        'value' => 5299956,
                      ),
                      599 => 
                      array (
                        'key' => 'GENERIC VACUUM',
                        'value' => 2019,
                      ),
                      600 => 
                      array (
                        'key' => 'GENERIC WATER 100D',
                        'value' => 1829299,
                      ),
                      601 => 
                      array (
                        'key' => 'GENERIC WATER DISCHARGE',
                        'value' => 2020,
                      ),
                      602 => 
                      array (
                        'key' => 'GENERIC WATER S&D',
                        'value' => 2021,
                      ),
                      603 => 
                      array (
                        'key' => 'GENLINE',
                        'value' => 2022,
                      ),
                      604 => 
                      array (
                        'key' => 'GENLINE GL',
                        'value' => 2023,
                      ),
                      605 => 
                      array (
                        'key' => 'GENLINE GL-802',
                        'value' => 2024,
                      ),
                      606 => 
                      array (
                        'key' => 'GENLINE GL-803',
                        'value' => 2025,
                      ),
                      607 => 
                      array (
                        'key' => 'GHX',
                        'value' => 2026,
                      ),
                      608 => 
                      array (
                        'key' => 'GHX OILFIELD',
                        'value' => 1829398,
                      ),
                      609 => 
                      array (
                        'key' => 'GHX OILFIELD S&D',
                        'value' => 1829395,
                      ),
                      610 => 
                      array (
                        'key' => 'GHX PETRO XPOWER',
                        'value' => 1829123,
                      ),
                      611 => 
                      array (
                        'key' => 'GHX WATER S&D',
                        'value' => 1829397,
                      ),
                      612 => 
                      array (
                        'key' => 'GHX XPOWER OILFIELD FRAC TANK',
                        'value' => 1829186,
                      ),
                      613 => 
                      array (
                        'key' => 'GILBARCO',
                        'value' => 2027,
                      ),
                      614 => 
                      array (
                        'key' => 'GLOBAL',
                        'value' => 2028,
                      ),
                      615 => 
                      array (
                        'key' => 'GLOBAL M24565-70-H',
                        'value' => 1829204,
                      ),
                      616 => 
                      array (
                        'key' => 'GNSPEC',
                        'value' => 2029,
                      ),
                      617 => 
                      array (
                        'key' => 'GNSPEC 100R12',
                        'value' => 2030,
                      ),
                      618 => 
                      array (
                        'key' => 'GNSPEC 100R16',
                        'value' => 2031,
                      ),
                      619 => 
                      array (
                        'key' => 'GNSPEC 100R17',
                        'value' => 1829224,
                      ),
                      620 => 
                      array (
                        'key' => 'GNSPEC 100R2',
                        'value' => 2032,
                      ),
                      621 => 
                      array (
                        'key' => 'GNSPEC 100R6',
                        'value' => 2033,
                      ),
                      622 => 
                      array (
                        'key' => 'GNSPEC 200 AIR',
                        'value' => 2034,
                      ),
                      623 => 
                      array (
                        'key' => 'GNSPEC 250 AIR',
                        'value' => 2035,
                      ),
                      624 => 
                      array (
                        'key' => 'GNSPEC 300 AIR',
                        'value' => 2036,
                      ),
                      625 => 
                      array (
                        'key' => 'GNSPEC 4001 PRESSURE WASHER',
                        'value' => 2037,
                      ),
                      626 => 
                      array (
                        'key' => 'GNSPEC 4500 PRESSURE WASHER',
                        'value' => 2038,
                      ),
                      627 => 
                      array (
                        'key' => 'GNSPEC NR SPRAY',
                        'value' => 2039,
                      ),
                      628 => 
                      array (
                        'key' => 'GNSPEC PUSH ON 250',
                        'value' => 2040,
                      ),
                      629 => 
                      array (
                        'key' => 'GOLD SNAKE',
                        'value' => 2041,
                      ),
                      630 => 
                      array (
                        'key' => 'GOOD FLEX',
                        'value' => 2042,
                      ),
                      631 => 
                      array (
                        'key' => 'GOODAL',
                        'value' => 1829176,
                      ),
                      632 => 
                      array (
                        'key' => 'GOODALL',
                        'value' => 2043,
                      ),
                      633 => 
                      array (
                        'key' => 'GOODALL CHEMICAL',
                        'value' => 1829400,
                      ),
                      634 => 
                      array (
                        'key' => 'GORILLA',
                        'value' => 2044,
                      ),
                      635 => 
                      array (
                        'key' => 'GP3-11-1 / EN1765:2016 S10',
                        'value' => 7989389,
                      ),
                      636 => 
                      array (
                        'key' => 'GP3-11-1 / EN1765:2016 S15',
                        'value' => 7563309,
                      ),
                      637 => 
                      array (
                        'key' => 'GP3-11-1 / EN1765:2016 S21',
                        'value' => 7989388,
                      ),
                      638 => 
                      array (
                        'key' => 'GR3',
                        'value' => 10709286,
                      ),
                      639 => 
                      array (
                        'key' => 'GRACO',
                        'value' => 2045,
                      ),
                      640 => 
                      array (
                        'key' => 'GRACO 079055',
                        'value' => 1829134,
                      ),
                      641 => 
                      array (
                        'key' => 'GRAINGER',
                        'value' => 2046,
                      ),
                      642 => 
                      array (
                        'key' => 'GRAY DUCTING',
                        'value' => 1829388,
                      ),
                      643 => 
                      array (
                        'key' => 'GRAY FLEXTRA LT',
                        'value' => 2047,
                      ),
                      644 => 
                      array (
                        'key' => 'GRAY FLEXWING',
                        'value' => 2048,
                      ),
                      645 => 
                      array (
                        'key' => 'GRAY FOOD',
                        'value' => 2049,
                      ),
                      646 => 
                      array (
                        'key' => 'GRAY SUCTION',
                        'value' => 2050,
                      ),
                      647 => 
                      array (
                        'key' => 'GREASE GUN HOSE',
                        'value' => 2051,
                      ),
                      648 => 
                      array (
                        'key' => 'GREAT NECK',
                        'value' => 2052,
                      ),
                      649 => 
                      array (
                        'key' => 'GREAT PLAINS',
                        'value' => 2053,
                      ),
                      650 => 
                      array (
                        'key' => 'GREEN HORNET XF',
                        'value' => 2054,
                      ),
                      651 => 
                      array (
                        'key' => 'GREEN XLPE 150',
                        'value' => 1829325,
                      ),
                      652 => 
                      array (
                        'key' => 'GRINUS',
                        'value' => 1829389,
                      ),
                      653 => 
                      array (
                        'key' => 'GTF',
                        'value' => 1829954,
                      ),
                      654 => 
                      array (
                        'key' => 'GUNITE',
                        'value' => 2055,
                      ),
                      655 => 
                      array (
                        'key' => 'GUNITE (TAN)',
                        'value' => 1829353,
                      ),
                      656 => 
                      array (
                        'key' => 'HAMILON BLAST',
                        'value' => 1829365,
                      ),
                      657 => 
                      array (
                        'key' => 'HAMILTON',
                        'value' => 5756819,
                      ),
                      658 => 
                      array (
                        'key' => 'HAMILTON BLAST',
                        'value' => 2056,
                      ),
                      659 => 
                      array (
                        'key' => 'HAMILTON HYDROCARBON DRAIN',
                        'value' => 2057,
                      ),
                      660 => 
                      array (
                        'key' => 'Hammer Union',
                        'value' => 1829962,
                      ),
                      661 => 
                      array (
                        'key' => 'HANLIO TWIN-LINE (GRADE R)',
                        'value' => 1829417,
                      ),
                      662 => 
                      array (
                        'key' => 'HANLIO TWIN-LINE GRADE R',
                        'value' => 2058,
                      ),
                      663 => 
                      array (
                        'key' => 'HART',
                        'value' => 2059,
                      ),
                      664 => 
                      array (
                        'key' => 'HART BLACK SOFTWALL',
                        'value' => 2060,
                      ),
                      665 => 
                      array (
                        'key' => 'HART FABCHEM',
                        'value' => 2061,
                      ),
                      666 => 
                      array (
                        'key' => 'HART FLOUR DISCHARGE',
                        'value' => 2062,
                      ),
                      667 => 
                      array (
                        'key' => 'HART HOT AIR',
                        'value' => 2063,
                      ),
                      668 => 
                      array (
                        'key' => 'HARVEST',
                        'value' => 2064,
                      ),
                      669 => 
                      array (
                        'key' => 'HAWAII MARINE',
                        'value' => 1829377,
                      ),
                      670 => 
                      array (
                        'key' => 'HAWK PD',
                        'value' => 1829522,
                      ),
                      671 => 
                      array (
                        'key' => 'HD AIR',
                        'value' => 2065,
                      ),
                      672 => 
                      array (
                        'key' => 'HD AIR & WATER',
                        'value' => 2066,
                      ),
                      673 => 
                      array (
                        'key' => 'HD AIR 300',
                        'value' => 1829289,
                      ),
                      674 => 
                      array (
                        'key' => 'HD INDUSTRIAL VACUUM',
                        'value' => 2067,
                      ),
                      675 => 
                      array (
                        'key' => 'HD PETRO TRANSFER',
                        'value' => 2068,
                      ),
                      676 => 
                      array (
                        'key' => 'HD VACUUM',
                        'value' => 2069,
                      ),
                      677 => 
                      array (
                        'key' => 'HD WATER DISCHARGE',
                        'value' => 2070,
                      ),
                      678 => 
                      array (
                        'key' => 'HD WATER SD',
                        'value' => 2071,
                      ),
                      679 => 
                      array (
                        'key' => 'HEALY LOW PERM',
                        'value' => 1829101,
                      ),
                      680 => 
                      array (
                        'key' => 'HEATER HOSE 20R3D2',
                        'value' => 2072,
                      ),
                      681 => 
                      array (
                        'key' => 'HEATER WATER',
                        'value' => 2073,
                      ),
                      682 => 
                      array (
                        'key' => 'HEAVY DUTY STEAM PILE DRIVER',
                        'value' => 2074,
                      ),
                      683 => 
                      array (
                        'key' => 'HEWITT',
                        'value' => 2075,
                      ),
                      684 => 
                      array (
                        'key' => 'HEWITT AIRCRAFT',
                        'value' => 2076,
                      ),
                      685 => 
                      array (
                        'key' => 'HEX',
                        'value' => 1829505,
                      ),
                      686 => 
                      array (
                        'key' => 'HI-MINER II',
                        'value' => 2077,
                      ),
                      687 => 
                      array (
                        'key' => 'HI-PER',
                        'value' => 2078,
                      ),
                      688 => 
                      array (
                        'key' => 'HIGHLAND BRINE WATER S&D',
                        'value' => 1829287,
                      ),
                      689 => 
                      array (
                        'key' => 'HIGHLAND POTABLE WATER S&D',
                        'value' => 1829262,
                      ),
                      690 => 
                      array (
                        'key' => 'HIGHLAND RAW WATER S&D',
                        'value' => 1829268,
                      ),
                      691 => 
                      array (
                        'key' => 'HIGHLAND WASTE WATER S&D',
                        'value' => 1829315,
                      ),
                      692 => 
                      array (
                        'key' => 'HIPER WATER',
                        'value' => 2079,
                      ),
                      693 => 
                      array (
                        'key' => 'HITECH WASHDOWN',
                        'value' => 1829301,
                      ),
                      694 => 
                      array (
                        'key' => 'HOOSIER FOOD TL',
                        'value' => 2080,
                      ),
                      695 => 
                      array (
                        'key' => 'HORNET XF',
                        'value' => 7186054,
                      ),
                      696 => 
                      array (
                        'key' => 'HOSCO',
                        'value' => 2081,
                      ),
                      697 => 
                      array (
                        'key' => 'HOSE ASSEMBLY COLD',
                        'value' => 1829095,
                      ),
                      698 => 
                      array (
                        'key' => 'HOSE ASSEMBLY HOT',
                        'value' => 1829097,
                      ),
                      699 => 
                      array (
                        'key' => 'HOSE GUYS',
                        'value' => 1829344,
                      ),
                      700 => 
                      array (
                        'key' => 'Hose Joiner',
                        'value' => 1829972,
                      ),
                      701 => 
                      array (
                        'key' => 'Hose Medner with Sight Glass',
                        'value' => 1829990,
                      ),
                      702 => 
                      array (
                        'key' => 'Hose Mender',
                        'value' => 1829982,
                      ),
                      703 => 
                      array (
                        'key' => 'Hose Mender with Sight Glass',
                        'value' => 1829983,
                      ),
                      704 => 
                      array (
                        'key' => 'Hose Mender, Tee',
                        'value' => 1829984,
                      ),
                      705 => 
                      array (
                        'key' => 'HOSE POWER',
                        'value' => 2082,
                      ),
                      706 => 
                      array (
                        'key' => 'HOSEPOWER',
                        'value' => 2083,
                      ),
                      707 => 
                      array (
                        'key' => 'HOSEPOWER PLASTER & GROUT',
                        'value' => 1829401,
                      ),
                      708 => 
                      array (
                        'key' => 'HOSINC',
                        'value' => 5759835,
                      ),
                      709 => 
                      array (
                        'key' => 'HOT AIR',
                        'value' => 1829319,
                      ),
                      710 => 
                      array (
                        'key' => 'HOT SULFUR',
                        'value' => 7654087,
                      ),
                      711 => 
                      array (
                        'key' => 'HOT TAR & ASPHALT EN13482',
                        'value' => 2084,
                      ),
                      712 => 
                      array (
                        'key' => 'HOT TAR & ASPHALT ROUGH BORE',
                        'value' => 2085,
                      ),
                      713 => 
                      array (
                        'key' => 'HOT WATER ELITE',
                        'value' => 2086,
                      ),
                      714 => 
                      array (
                        'key' => 'HR4',
                        'value' => 2087,
                      ),
                      715 => 
                      array (
                        'key' => 'HR6',
                        'value' => 2088,
                      ),
                      716 => 
                      array (
                        'key' => 'HSS WATER JETTING',
                        'value' => 1829385,
                      ),
                      717 => 
                      array (
                        'key' => 'HUDSON',
                        'value' => 2089,
                      ),
                      718 => 
                      array (
                        'key' => 'HUMIDIFIER HOSE',
                        'value' => 2090,
                      ),
                      719 => 
                      array (
                        'key' => 'HUSKY',
                        'value' => 2091,
                      ),
                      720 => 
                      array (
                        'key' => 'HVLP NON-CONDUCTIVE',
                        'value' => 2092,
                      ),
                      721 => 
                      array (
                        'key' => 'HW DRY CEMENT & BARITES',
                        'value' => 2093,
                      ),
                      722 => 
                      array (
                        'key' => 'HW OFFSHORE FUEL',
                        'value' => 7610826,
                      ),
                      723 => 
                      array (
                        'key' => 'HY-T HEATER HOSE',
                        'value' => 1829350,
                      ),
                      724 => 
                      array (
                        'key' => 'HY-T PLUS',
                        'value' => 1829503,
                      ),
                      725 => 
                      array (
                        'key' => 'HY-T TORQUE TEAM',
                        'value' => 1829494,
                      ),
                      726 => 
                      array (
                        'key' => 'HY-T TORQUE TEAM LAMINATED',
                        'value' => 1829502,
                      ),
                      727 => 
                      array (
                        'key' => 'HY-T TORQUE TEAM PLUS',
                        'value' => 1829499,
                      ),
                      728 => 
                      array (
                        'key' => 'HY-T WEDGE',
                        'value' => 1829506,
                      ),
                      729 => 
                      array (
                        'key' => 'HY-T WEDGE TORQUE TEAM',
                        'value' => 1829501,
                      ),
                      730 => 
                      array (
                        'key' => 'HYDROCARBON DRAIN',
                        'value' => 2094,
                      ),
                      731 => 
                      array (
                        'key' => 'HYDROVATOR',
                        'value' => 2095,
                      ),
                      732 => 
                      array (
                        'key' => 'HYDROVATOR PLUS',
                        'value' => 2096,
                      ),
                      733 => 
                      array (
                        'key' => 'I.R.F.',
                        'value' => 2097,
                      ),
                      734 => 
                      array (
                        'key' => 'IBM COOLING WATER',
                        'value' => 2098,
                      ),
                      735 => 
                      array (
                        'key' => 'IBRS',
                        'value' => 2099,
                      ),
                      736 => 
                      array (
                        'key' => 'IBRS FISH HOSE',
                        'value' => 1829113,
                      ),
                      737 => 
                      array (
                        'key' => 'IBRS FISH S&D',
                        'value' => 1829195,
                      ),
                      738 => 
                      array (
                        'key' => 'IBRS SANITARY',
                        'value' => 2100,
                      ),
                      739 => 
                      array (
                        'key' => 'ICE CUTTER HOSE',
                        'value' => 2101,
                      ),
                      740 => 
                      array (
                        'key' => 'ICS GROUP AIR',
                        'value' => 1829356,
                      ),
                      741 => 
                      array (
                        'key' => 'IMPERL POLARSHIELD',
                        'value' => 1829216,
                      ),
                      742 => 
                      array (
                        'key' => 'INERT GAS',
                        'value' => 2102,
                      ),
                      743 => 
                      array (
                        'key' => 'INET COOLING',
                        'value' => 2103,
                      ),
                      744 => 
                      array (
                        'key' => 'INFINITY CHEM',
                        'value' => 1829288,
                      ),
                      745 => 
                      array (
                        'key' => 'INFINITY CHEMICAL',
                        'value' => 2104,
                      ),
                      746 => 
                      array (
                        'key' => 'INFINITY FOOD',
                        'value' => 2105,
                      ),
                      747 => 
                      array (
                        'key' => 'INFINITY FUEL DROP',
                        'value' => 2106,
                      ),
                      748 => 
                      array (
                        'key' => 'INFINITY FUEL DROP HD',
                        'value' => 2107,
                      ),
                      749 => 
                      array (
                        'key' => 'INFINITY MILK',
                        'value' => 2108,
                      ),
                      750 => 
                      array (
                        'key' => 'INJECTION COOLANT',
                        'value' => 2109,
                      ),
                      751 => 
                      array (
                        'key' => 'INLET HOSE',
                        'value' => 2110,
                      ),
                      752 => 
                      array (
                        'key' => 'Inline Orifice Tubes',
                        'value' => 1829996,
                      ),
                      753 => 
                      array (
                        'key' => 'INSTA-GRIP™',
                        'value' => 1829109,
                      ),
                      754 => 
                      array (
                        'key' => 'INSTA-GRIP™ 250',
                        'value' => 2111,
                      ),
                      755 => 
                      array (
                        'key' => 'INSTA-GRIP™ 300',
                        'value' => 2112,
                      ),
                      756 => 
                      array (
                        'key' => 'INSTA-GRIP™ HT',
                        'value' => 2113,
                      ),
                      757 => 
                      array (
                        'key' => 'INSTA-GRIP™ SP',
                        'value' => 2114,
                      ),
                      758 => 
                      array (
                        'key' => 'INSTA-GRIP™ TC',
                        'value' => 2115,
                      ),
                      759 => 
                      array (
                        'key' => 'INSTA-LOCK',
                        'value' => 2116,
                      ),
                      760 => 
                      array (
                        'key' => 'INSTA-LOCK ADAPTER',
                        'value' => 1829281,
                      ),
                      761 => 
                      array (
                        'key' => 'INSTA-LOCK COUPLER',
                        'value' => 1829269,
                      ),
                      762 => 
                      array (
                        'key' => 'INSTA-LOCK CRIMP SLEEVE',
                        'value' => 1829290,
                      ),
                      763 => 
                      array (
                        'key' => 'INSTA-LOCK DUST CAP',
                        'value' => 1829167,
                      ),
                      764 => 
                      array (
                        'key' => 'INSTA-LOCK DUST PLUG',
                        'value' => 1829295,
                      ),
                      765 => 
                      array (
                        'key' => 'INSTA-LOCK FERRULE',
                        'value' => 1829278,
                      ),
                      766 => 
                      array (
                        'key' => 'INSTA-LOCK GASKET',
                        'value' => 1829302,
                      ),
                      767 => 
                      array (
                        'key' => 'INSTA-LOCK HOSE STEM',
                        'value' => 1829277,
                      ),
                      768 => 
                      array (
                        'key' => 'INSTA-LOCK JUMP SIZE',
                        'value' => 1829251,
                      ),
                      769 => 
                      array (
                        'key' => 'INSTA-LOCK SPOOL ADAPTER',
                        'value' => 1829314,
                      ),
                      770 => 
                      array (
                        'key' => 'INSTA-LOCK TYPE A',
                        'value' => 1829243,
                      ),
                      771 => 
                      array (
                        'key' => 'INSTA-LOCK TYPE B',
                        'value' => 1829248,
                      ),
                      772 => 
                      array (
                        'key' => 'INSTA-LOCK TYPE C',
                        'value' => 1829119,
                      ),
                      773 => 
                      array (
                        'key' => 'INSTA-LOCK TYPE D',
                        'value' => 1829115,
                      ),
                      774 => 
                      array (
                        'key' => 'INSTA-LOCK TYPE E',
                        'value' => 1829223,
                      ),
                      775 => 
                      array (
                        'key' => 'INSTA-LOCK TYPE F',
                        'value' => 1829285,
                      ),
                      776 => 
                      array (
                        'key' => 'INSTA-LOCK™ REPAIR KIT',
                        'value' => 7989390,
                      ),
                      777 => 
                      array (
                        'key' => 'INSTA-POWER',
                        'value' => 1829496,
                      ),
                      778 => 
                      array (
                        'key' => 'INTERCHANGE',
                        'value' => 5764902,
                      ),
                      779 => 
                      array (
                        'key' => 'INTERCHEM',
                        'value' => 2117,
                      ),
                      780 => 
                      array (
                        'key' => 'INTERM',
                        'value' => 2118,
                      ),
                      781 => 
                      array (
                        'key' => 'INTERNATIONAL BELT',
                        'value' => 2119,
                      ),
                      782 => 
                      array (
                        'key' => 'INTERNATIONAL BELT VERSIFLO S&D',
                        'value' => 1829393,
                      ),
                      783 => 
                      array (
                        'key' => 'IRC DRILL WATER',
                        'value' => 2120,
                      ),
                      784 => 
                      array (
                        'key' => 'IRPCO',
                        'value' => 2121,
                      ),
                      785 => 
                      array (
                        'key' => 'IRPCO RED FUEL OIL',
                        'value' => 1829155,
                      ),
                      786 => 
                      array (
                        'key' => 'IRR',
                        'value' => 2122,
                      ),
                      787 => 
                      array (
                        'key' => 'IRR FLEX JET',
                        'value' => 2123,
                      ),
                      788 => 
                      array (
                        'key' => 'IRRIGATION BOOT',
                        'value' => 2124,
                      ),
                      789 => 
                      array (
                        'key' => 'ISO 3821',
                        'value' => 2125,
                      ),
                      790 => 
                      array (
                        'key' => 'ISO 8031',
                        'value' => 2126,
                      ),
                      791 => 
                      array (
                        'key' => 'ITALPR',
                        'value' => 2127,
                      ),
                      792 => 
                      array (
                        'key' => 'ITALPR TEFLON',
                        'value' => 2128,
                      ),
                      793 => 
                      array (
                        'key' => 'JACKHAMMER',
                        'value' => 2129,
                      ),
                      794 => 
                      array (
                        'key' => 'JB INDUSTRIES',
                        'value' => 2130,
                      ),
                      795 => 
                      array (
                        'key' => 'JET RANGER',
                        'value' => 2131,
                      ),
                      796 => 
                      array (
                        'key' => 'JETTING',
                        'value' => 2132,
                      ),
                      797 => 
                      array (
                        'key' => 'JETTING AND UTILITY',
                        'value' => 2133,
                      ),
                      798 => 
                      array (
                        'key' => 'JETTING UTILITY',
                        'value' => 1829339,
                      ),
                      799 => 
                      array (
                        'key' => 'JGB INDUSTRIES',
                        'value' => 2134,
                      ),
                      800 => 
                      array (
                        'key' => 'JIC 37° Flare',
                        'value' => 1830011,
                      ),
                      801 => 
                      array (
                        'key' => 'JIC 37° Flare (SAE J514)',
                        'value' => 1829945,
                      ),
                      802 => 
                      array (
                        'key' => 'JIC 37° Male X JIC 37° Male',
                        'value' => 7445338,
                      ),
                      803 => 
                      array (
                        'key' => 'JIS 30 (Paralled Pipe Threads)',
                        'value' => 1829971,
                      ),
                      804 => 
                      array (
                        'key' => 'JIS 30 (Parallel Pipe Threads)',
                        'value' => 1829978,
                      ),
                      805 => 
                      array (
                        'key' => 'JOHN DEERE',
                        'value' => 2135,
                      ),
                      806 => 
                      array (
                        'key' => 'JOHN DEERE WATER S&D',
                        'value' => 1829271,
                      ),
                      807 => 
                      array (
                        'key' => 'KAPTEC ULTRAFLEX',
                        'value' => 2136,
                      ),
                      808 => 
                      array (
                        'key' => 'KAPTECH FOOD DICHARGE',
                        'value' => 2137,
                      ),
                      809 => 
                      array (
                        'key' => 'KCRUBBER AUGER ARC PILING',
                        'value' => 1829175,
                      ),
                      810 => 
                      array (
                        'key' => 'KELCO BLAST',
                        'value' => 2138,
                      ),
                      811 => 
                      array (
                        'key' => 'KETEK FLEX PETROLEUM',
                        'value' => 2139,
                      ),
                      812 => 
                      array (
                        'key' => 'KH DIVERS HOSE',
                        'value' => 5580054,
                      ),
                      813 => 
                      array (
                        'key' => 'KIDDE 20079 FIRE EX UL92',
                        'value' => 1829219,
                      ),
                      814 => 
                      array (
                        'key' => 'KIMBALL',
                        'value' => 7079915,
                      ),
                      815 => 
                      array (
                        'key' => 'KINK GUARD',
                        'value' => 1829280,
                      ),
                      816 => 
                      array (
                        'key' => 'KINKGUARD',
                        'value' => 2140,
                      ),
                      817 => 
                      array (
                        'key' => 'KINKGUARD GARDEN HOSE',
                        'value' => 1829372,
                      ),
                      818 => 
                      array (
                        'key' => 'Komatsu 30 Flare with Metric Threads',
                        'value' => 1829970,
                      ),
                      819 => 
                      array (
                        'key' => 'Komatsu Flange',
                        'value' => 1829963,
                      ),
                      820 => 
                      array (
                        'key' => 'L&G GE SANDER HOSE',
                        'value' => 1829139,
                      ),
                      821 => 
                      array (
                        'key' => 'L&G ROCK DUST SW HD',
                        'value' => 1829121,
                      ),
                      822 => 
                      array (
                        'key' => 'LABOUR BLUCOR COUPLING',
                        'value' => 2141,
                      ),
                      823 => 
                      array (
                        'key' => 'LACTOPAL',
                        'value' => 2142,
                      ),
                      824 => 
                      array (
                        'key' => 'LACTOPAL L',
                        'value' => 1829414,
                      ),
                      825 => 
                      array (
                        'key' => 'LAKECHARLES',
                        'value' => 2143,
                      ),
                      826 => 
                      array (
                        'key' => 'LEGACY TPU',
                        'value' => 2144,
                      ),
                      827 => 
                      array (
                        'key' => 'LG NITRILE',
                        'value' => 2145,
                      ),
                      828 => 
                      array (
                        'key' => 'LIGHTRAC',
                        'value' => 2146,
                      ),
                      829 => 
                      array (
                        'key' => 'LIGHTWEIGHT VACUUM',
                        'value' => 2147,
                      ),
                      830 => 
                      array (
                        'key' => 'LINECRETE',
                        'value' => 2148,
                      ),
                      831 => 
                      array (
                        'key' => 'LIQUID MUD',
                        'value' => 2149,
                      ),
                      832 => 
                      array (
                        'key' => 'LIQUID MUD YS',
                        'value' => 2150,
                      ),
                      833 => 
                      array (
                        'key' => 'LIQUIFORCE',
                        'value' => 2151,
                      ),
                      834 => 
                      array (
                        'key' => 'LPG DELIVERY PRO',
                        'value' => 2152,
                      ),
                      835 => 
                      array (
                        'key' => 'LUMPKIN',
                        'value' => 1829203,
                      ),
                      836 => 
                      array (
                        'key' => 'LW ARCTIC TANK TRUCK',
                        'value' => 2153,
                      ),
                      837 => 
                      array (
                        'key' => 'LW BLACK FLEXTRA II',
                        'value' => 2154,
                      ),
                      838 => 
                      array (
                        'key' => 'LW INDUSTRIAL VACUUM',
                        'value' => 2155,
                      ),
                      839 => 
                      array (
                        'key' => 'M&P MINE CONDUIT',
                        'value' => 2156,
                      ),
                      840 => 
                      array (
                        'key' => 'M13531J-B3A',
                        'value' => 1829133,
                      ),
                      841 => 
                      array (
                        'key' => 'MADE IN USA GARDEN',
                        'value' => 1829273,
                      ),
                      842 => 
                      array (
                        'key' => 'MANUS BLAST',
                        'value' => 2157,
                      ),
                      843 => 
                      array (
                        'key' => 'MANUS BLAST WHIP',
                        'value' => 2158,
                      ),
                      844 => 
                      array (
                        'key' => 'MARIAN',
                        'value' => 2159,
                      ),
                      845 => 
                      array (
                        'key' => 'MARINE BILGE',
                        'value' => 2160,
                      ),
                      846 => 
                      array (
                        'key' => 'MARINE EXHAUST HOSE',
                        'value' => 2161,
                      ),
                      847 => 
                      array (
                        'key' => 'MARINE FUEL FEED VENT J1527 B2',
                        'value' => 2162,
                      ),
                      848 => 
                      array (
                        'key' => 'MARINE FUEL FILL',
                        'value' => 2163,
                      ),
                      849 => 
                      array (
                        'key' => 'MARINE FUEL LINE',
                        'value' => 2164,
                      ),
                      850 => 
                      array (
                        'key' => 'MARINE HARDWALL WET EXHAUST',
                        'value' => 2165,
                      ),
                      851 => 
                      array (
                        'key' => 'MARINE LIVEWELL',
                        'value' => 2166,
                      ),
                      852 => 
                      array (
                        'key' => 'MARINE OIL FILL',
                        'value' => 2167,
                      ),
                      853 => 
                      array (
                        'key' => 'MARINE SANITATION',
                        'value' => 2168,
                      ),
                      854 => 
                      array (
                        'key' => 'MARINE SOFTWALL WET EXHAUST',
                        'value' => 2169,
                      ),
                      855 => 
                      array (
                        'key' => 'MARINE VACUUM',
                        'value' => 2170,
                      ),
                      856 => 
                      array (
                        'key' => 'MAST-AIR',
                        'value' => 2171,
                      ),
                      857 => 
                      array (
                        'key' => 'MASTERCOOL',
                        'value' => 2172,
                      ),
                      858 => 
                      array (
                        'key' => 'MASTHD',
                        'value' => 2173,
                      ),
                      859 => 
                      array (
                        'key' => 'MASTHEAD',
                        'value' => 1829258,
                      ),
                      860 => 
                      array (
                        'key' => 'MASTHEAD CONTRACTOR\'S WATER',
                        'value' => 1829352,
                      ),
                      861 => 
                      array (
                        'key' => 'MATERIAL HANDLING',
                        'value' => 2174,
                      ),
                      862 => 
                      array (
                        'key' => 'MATERIAL HANDLING 150',
                        'value' => 1829351,
                      ),
                      863 => 
                      array (
                        'key' => 'MATERIAL HANDLING DISCHARGE',
                        'value' => 2175,
                      ),
                      864 => 
                      array (
                        'key' => 'MATERIAL HANDLING DISCHARGE 75',
                        'value' => 1829334,
                      ),
                      865 => 
                      array (
                        'key' => 'MAXXIM PREMIER ULTRA',
                        'value' => 2176,
                      ),
                      866 => 
                      array (
                        'key' => 'MCCARTY WATER S&D',
                        'value' => 2177,
                      ),
                      867 => 
                      array (
                        'key' => 'MCGILL',
                        'value' => 2178,
                      ),
                      868 => 
                      array (
                        'key' => 'MCP4S',
                        'value' => 10663610,
                      ),
                      869 => 
                      array (
                        'key' => 'MECR&S',
                        'value' => 2179,
                      ),
                      870 => 
                      array (
                        'key' => 'MECR&S PAINT SPRAY',
                        'value' => 2180,
                      ),
                      871 => 
                      array (
                        'key' => 'MER OILFIELD SUCTION',
                        'value' => 2181,
                      ),
                      872 => 
                      array (
                        'key' => 'MERCURY',
                        'value' => 5759837,
                      ),
                      873 => 
                      array (
                        'key' => 'MERLETT ARMORVIN HNA',
                        'value' => 5347027,
                      ),
                      874 => 
                      array (
                        'key' => 'MERLETT RAGNO CA',
                        'value' => 5347026,
                      ),
                      875 => 
                      array (
                        'key' => 'MERLETT VACUPRESS CRISTAL',
                        'value' => 5347028,
                      ),
                      876 => 
                      array (
                        'key' => 'MERMAR',
                        'value' => 2182,
                      ),
                      877 => 
                      array (
                        'key' => 'MESA',
                        'value' => 2183,
                      ),
                      878 => 
                      array (
                        'key' => 'MESA AMMONIUM NITRATE PELLET',
                        'value' => 2184,
                      ),
                      879 => 
                      array (
                        'key' => 'MESA DRAIN',
                        'value' => 2185,
                      ),
                      880 => 
                      array (
                        'key' => 'MESA GUNITE',
                        'value' => 2186,
                      ),
                      881 => 
                      array (
                        'key' => 'MESA PLASTER & GROUT',
                        'value' => 2187,
                      ),
                      882 => 
                      array (
                        'key' => 'MESA REFRACTORY GUNITE',
                        'value' => 2188,
                      ),
                      883 => 
                      array (
                        'key' => 'MESA ROOF DRAIN',
                        'value' => 2189,
                      ),
                      884 => 
                      array (
                        'key' => 'MESA ROOF DRAIN CHEMICAL',
                        'value' => 2190,
                      ),
                      885 => 
                      array (
                        'key' => 'Metal Clips',
                        'value' => 1830004,
                      ),
                      886 => 
                      array (
                        'key' => 'METRIC',
                        'value' => 1829524,
                      ),
                      887 => 
                      array (
                        'key' => 'MH 500',
                        'value' => 1829296,
                      ),
                      888 => 
                      array (
                        'key' => 'MH 75',
                        'value' => 1829321,
                      ),
                      889 => 
                      array (
                        'key' => 'MHPRF 11588G II ST',
                        'value' => 2191,
                      ),
                      890 => 
                      array (
                        'key' => 'MIDWEST',
                        'value' => 2192,
                      ),
                      891 => 
                      array (
                        'key' => 'MIDWEST BELTING',
                        'value' => 1829336,
                      ),
                      892 => 
                      array (
                        'key' => 'MIL 3992F',
                        'value' => 1829222,
                      ),
                      893 => 
                      array (
                        'key' => 'MIL A-A-59566',
                        'value' => 2193,
                      ),
                      894 => 
                      array (
                        'key' => 'MIL A-A-59567',
                        'value' => 2194,
                      ),
                      895 => 
                      array (
                        'key' => 'MIL AA-59567 3-1',
                        'value' => 1829292,
                      ),
                      896 => 
                      array (
                        'key' => 'MIL-A-A-59565',
                        'value' => 2195,
                      ),
                      897 => 
                      array (
                        'key' => 'MIL-DTL-13444-I',
                        'value' => 2196,
                      ),
                      898 => 
                      array (
                        'key' => 'MIL-DTL-13444-III',
                        'value' => 2197,
                      ),
                      899 => 
                      array (
                        'key' => 'MIL-DTL-13531 TYPE II, CL A',
                        'value' => 2198,
                      ),
                      900 => 
                      array (
                        'key' => 'MIL-DTL-17505',
                        'value' => 2199,
                      ),
                      901 => 
                      array (
                        'key' => 'MIL-DTL-20176',
                        'value' => 2200,
                      ),
                      902 => 
                      array (
                        'key' => 'MIL-DTL-22240',
                        'value' => 2201,
                      ),
                      903 => 
                      array (
                        'key' => 'MIL-DTL-27516',
                        'value' => 2202,
                      ),
                      904 => 
                      array (
                        'key' => 'MIL-DTL-29210E',
                        'value' => 2203,
                      ),
                      905 => 
                      array (
                        'key' => 'MIL-DTL-6615',
                        'value' => 2204,
                      ),
                      906 => 
                      array (
                        'key' => 'MIL-DTL-8788',
                        'value' => 1830042,
                      ),
                      907 => 
                      array (
                        'key' => 'MIL-H-24136/4',
                        'value' => 1829435,
                      ),
                      908 => 
                      array (
                        'key' => 'MIL-H-24580',
                        'value' => 2205,
                      ),
                      909 => 
                      array (
                        'key' => 'MIL-H-82127',
                        'value' => 2206,
                      ),
                      910 => 
                      array (
                        'key' => 'MIL-PRF-11588 TYPE I',
                        'value' => 2207,
                      ),
                      911 => 
                      array (
                        'key' => 'MIL-PRF-11588 TYPE III',
                        'value' => 2208,
                      ),
                      912 => 
                      array (
                        'key' => 'MIL-PRF-370 TYPE A',
                        'value' => 2209,
                      ),
                      913 => 
                      array (
                        'key' => 'MIL-PRF-370 TYPE B',
                        'value' => 2210,
                      ),
                      914 => 
                      array (
                        'key' => 'MILTARY',
                        'value' => 2211,
                      ),
                      915 => 
                      array (
                        'key' => 'MILTON',
                        'value' => 2212,
                      ),
                      916 => 
                      array (
                        'key' => 'MINE CONDUIT',
                        'value' => 2213,
                      ),
                      917 => 
                      array (
                        'key' => 'MINNICH WATER HD',
                        'value' => 1829157,
                      ),
                      918 => 
                      array (
                        'key' => 'MISC',
                        'value' => 1829256,
                      ),
                      919 => 
                      array (
                        'key' => 'MIT TEKTON',
                        'value' => 1829142,
                      ),
                      920 => 
                      array (
                        'key' => 'MOCCASIN',
                        'value' => 2214,
                      ),
                      921 => 
                      array (
                        'key' => 'MORRIS AIR SEEDER',
                        'value' => 2215,
                      ),
                      922 => 
                      array (
                        'key' => 'MORRIS AIR SEEDER LT',
                        'value' => 2216,
                      ),
                      923 => 
                      array (
                        'key' => 'MPI',
                        'value' => 2217,
                      ),
                      924 => 
                      array (
                        'key' => 'MPI 132-0580',
                        'value' => 1829159,
                      ),
                      925 => 
                      array (
                        'key' => 'MPI 350-0380',
                        'value' => 1829230,
                      ),
                      926 => 
                      array (
                        'key' => 'MPI 350-0560',
                        'value' => 1829153,
                      ),
                      927 => 
                      array (
                        'key' => 'MPI 350-0580',
                        'value' => 1829093,
                      ),
                      928 => 
                      array (
                        'key' => 'MPI HW EXHAUST',
                        'value' => 1829300,
                      ),
                      929 => 
                      array (
                        'key' => 'MPI HW FUEL FILL',
                        'value' => 1829137,
                      ),
                      930 => 
                      array (
                        'key' => 'MPI PREMIUM-GUARD MARINE',
                        'value' => 2218,
                      ),
                      931 => 
                      array (
                        'key' => 'MRS',
                        'value' => 1829338,
                      ),
                      932 => 
                      array (
                        'key' => 'MSA AIR BREATHING',
                        'value' => 1829117,
                      ),
                      933 => 
                      array (
                        'key' => 'MSC',
                        'value' => 6422707,
                      ),
                      934 => 
                      array (
                        'key' => 'MUD CUTTING HW',
                        'value' => 2219,
                      ),
                      935 => 
                      array (
                        'key' => 'MUD RETURN LINE',
                        'value' => 2220,
                      ),
                      936 => 
                      array (
                        'key' => 'MUD STACKING',
                        'value' => 2221,
                      ),
                      937 => 
                      array (
                        'key' => 'MULTISTREAM HW',
                        'value' => 2222,
                      ),
                      938 => 
                      array (
                        'key' => 'MULTISTREAM SW',
                        'value' => 2223,
                      ),
                      939 => 
                      array (
                        'key' => 'NAFIRE',
                        'value' => 2224,
                      ),
                      940 => 
                      array (
                        'key' => 'NAVISTAR',
                        'value' => 2225,
                      ),
                      941 => 
                      array (
                        'key' => 'NELSON DUNN',
                        'value' => 2226,
                      ),
                      942 => 
                      array (
                        'key' => 'NELSON DUNN CABLE COVER',
                        'value' => 1829183,
                      ),
                      943 => 
                      array (
                        'key' => 'NEOTHANE',
                        'value' => 1829508,
                      ),
                      944 => 
                      array (
                        'key' => 'NEPTUNE',
                        'value' => 2227,
                      ),
                      945 => 
                      array (
                        'key' => 'NESI OILFIELD',
                        'value' => 2228,
                      ),
                      946 => 
                      array (
                        'key' => 'NEWLINE',
                        'value' => 2229,
                      ),
                      947 => 
                      array (
                        'key' => 'NEWLINE VINTNER RESERVE',
                        'value' => 1829255,
                      ),
                      948 => 
                      array (
                        'key' => 'NEWLINE WALKWAY WATER',
                        'value' => 1829403,
                      ),
                      949 => 
                      array (
                        'key' => 'NISHIN',
                        'value' => 2230,
                      ),
                      950 => 
                      array (
                        'key' => 'NISSHIN',
                        'value' => 2231,
                      ),
                      951 => 
                      array (
                        'key' => 'NITRO FLOOD WATER S&D',
                        'value' => 2232,
                      ),
                      952 => 
                      array (
                        'key' => 'NITRO R&C WATER S&D',
                        'value' => 2233,
                      ),
                      953 => 
                      array (
                        'key' => 'NITROGEN SERVICE',
                        'value' => 2234,
                      ),
                      954 => 
                      array (
                        'key' => 'NOTRAX T43S5050RD',
                        'value' => 1829207,
                      ),
                      955 => 
                      array (
                        'key' => 'NOV',
                        'value' => 2235,
                      ),
                      956 => 
                      array (
                        'key' => 'NPETRO LW',
                        'value' => 2236,
                      ),
                      957 => 
                      array (
                        'key' => 'NPM API',
                        'value' => 1829979,
                      ),
                      958 => 
                      array (
                        'key' => 'NPSM',
                        'value' => 1829953,
                      ),
                      959 => 
                      array (
                        'key' => 'NPT API',
                        'value' => 1829974,
                      ),
                      960 => 
                      array (
                        'key' => 'NPT API Hammer Union ',
                        'value' => 1830010,
                      ),
                      961 => 
                      array (
                        'key' => 'NPTF',
                        'value' => 1829952,
                      ),
                      962 => 
                      array (
                        'key' => 'NPTF Male X NPSM Female Swivel',
                        'value' => 7445339,
                      ),
                      963 => 
                      array (
                        'key' => 'NR SPRAY',
                        'value' => 2237,
                      ),
                      964 => 
                      array (
                        'key' => 'NR7',
                        'value' => 2238,
                      ),
                      965 => 
                      array (
                        'key' => 'NR8',
                        'value' => 2239,
                      ),
                      966 => 
                      array (
                        'key' => 'NRP JONES CT5',
                        'value' => 1829196,
                      ),
                      967 => 
                      array (
                        'key' => 'NRP JONES NON-UL CT5',
                        'value' => 1829120,
                      ),
                      968 => 
                      array (
                        'key' => 'NSH',
                        'value' => 2240,
                      ),
                      969 => 
                      array (
                        'key' => 'NUTRIFLEX',
                        'value' => 2241,
                      ),
                      970 => 
                      array (
                        'key' => 'NUTRIFLEX STATIC WIRE',
                        'value' => 2242,
                      ),
                      971 => 
                      array (
                        'key' => 'NUTRIFLEX SUCTION & DISCHARGE',
                        'value' => 2243,
                      ),
                      972 => 
                      array (
                        'key' => 'NUTRIFLO SUCTION & DISCHARGE',
                        'value' => 2244,
                      ),
                      973 => 
                      array (
                        'key' => 'O-Ring Boss ',
                        'value' => 1830009,
                      ),
                      974 => 
                      array (
                        'key' => 'O-Ring Boss Straight Thread (SAE J1453)',
                        'value' => 1829975,
                      ),
                      975 => 
                      array (
                        'key' => 'O-Ring Boss Straight Thread (SAE J514)',
                        'value' => 1829958,
                      ),
                      976 => 
                      array (
                        'key' => 'O-Ring Boss Straight Thread O-Rings (SAE J514)',
                        'value' => 1831351,
                      ),
                      977 => 
                      array (
                        'key' => 'O-Ring Face Seal',
                        'value' => 1829991,
                      ),
                      978 => 
                      array (
                        'key' => 'O-Ring Face Seal (SAE J1453 ORS/ORFS)',
                        'value' => 1829957,
                      ),
                      979 => 
                      array (
                        'key' => 'O-Ring Face Seal O-Rings (SAE J1453 ORS/ORFS)',
                        'value' => 1831350,
                      ),
                      980 => 
                      array (
                        'key' => 'O-Ring for Ford Spring Lock',
                        'value' => 1829997,
                      ),
                      981 => 
                      array (
                        'key' => 'O-Ring for Switch',
                        'value' => 1829998,
                      ),
                      982 => 
                      array (
                        'key' => 'O-Ring for Tube Fittings',
                        'value' => 1829999,
                      ),
                      983 => 
                      array (
                        'key' => 'O-Ring Insert',
                        'value' => 1829985,
                      ),
                      984 => 
                      array (
                        'key' => 'O-Ring Tube',
                        'value' => 1829986,
                      ),
                      985 => 
                      array (
                        'key' => 'O-Ring Tube (Female to O-Ring Insert)',
                        'value' => 1829993,
                      ),
                      986 => 
                      array (
                        'key' => 'O-Ring Tube Compressor (Female to O-Ring Insert) ',
                        'value' => 1829992,
                      ),
                      987 => 
                      array (
                        'key' => 'OAKLEY',
                        'value' => 2245,
                      ),
                      988 => 
                      array (
                        'key' => 'OFFSHORE FUEL',
                        'value' => 2246,
                      ),
                      989 => 
                      array (
                        'key' => 'OFFSHORE FUEL 500',
                        'value' => 1829275,
                      ),
                      990 => 
                      array (
                        'key' => 'OFFSHORE FUEL 750',
                        'value' => 1829364,
                      ),
                      991 => 
                      array (
                        'key' => 'OFFSHORE VIPER',
                        'value' => 2247,
                      ),
                      992 => 
                      array (
                        'key' => 'OIL DISCHARGE',
                        'value' => 2248,
                      ),
                      993 => 
                      array (
                        'key' => 'OIL RIG HARDWALL',
                        'value' => 2249,
                      ),
                      994 => 
                      array (
                        'key' => 'OIL RIG HARDWALL BIOFUEL',
                        'value' => 2250,
                      ),
                      995 => 
                      array (
                        'key' => 'OIL RIG SOFTWALL',
                        'value' => 2251,
                      ),
                      996 => 
                      array (
                        'key' => 'OIL RIG SW',
                        'value' => 1829329,
                      ),
                      997 => 
                      array (
                        'key' => 'OIL TREAT & BLENDER',
                        'value' => 2252,
                      ),
                      998 => 
                      array (
                        'key' => 'OILFIELD DISCHARGE',
                        'value' => 2253,
                      ),
                      999 => 
                      array (
                        'key' => 'OILFIELD FRAC',
                        'value' => 2254,
                      ),
                      1000 => 
                      array (
                        'key' => 'OMNI',
                        'value' => 2255,
                      ),
                      1001 => 
                      array (
                        'key' => 'OMNI WATER S&D',
                        'value' => 2256,
                      ),
                      1002 => 
                      array (
                        'key' => 'OPEN END FALCON',
                        'value' => 1829523,
                      ),
                      1003 => 
                      array (
                        'key' => 'OPEN END HAWK',
                        'value' => 1829517,
                      ),
                      1004 => 
                      array (
                        'key' => 'OPEN END HY-T PLUS',
                        'value' => 1829504,
                      ),
                      1005 => 
                      array (
                        'key' => 'OPEN END METRIC T PD',
                        'value' => 1829518,
                      ),
                      1006 => 
                      array (
                        'key' => 'OPEN END POSITIVE DRIVE',
                        'value' => 1829511,
                      ),
                      1007 => 
                      array (
                        'key' => 'OPEN END SUPER TORQUE',
                        'value' => 1829515,
                      ),
                      1008 => 
                      array (
                        'key' => 'ORANGE FLEXWING',
                        'value' => 2257,
                      ),
                      1009 => 
                      array (
                        'key' => 'ORTAC',
                        'value' => 2258,
                      ),
                      1010 => 
                      array (
                        'key' => 'ORTAC II',
                        'value' => 2259,
                      ),
                      1011 => 
                      array (
                        'key' => 'P5S',
                        'value' => 10663609,
                      ),
                      1012 => 
                      array (
                        'key' => 'PACER™',
                        'value' => 2260,
                      ),
                      1013 => 
                      array (
                        'key' => 'PACIFIC RUBBER',
                        'value' => 5764901,
                      ),
                      1014 => 
                      array (
                        'key' => 'PACIFIC RUBBER MULCHBLOWER',
                        'value' => 1829232,
                      ),
                      1015 => 
                      array (
                        'key' => 'PAGUFIX',
                        'value' => 2261,
                      ),
                      1016 => 
                      array (
                        'key' => 'PALADIN',
                        'value' => 2262,
                      ),
                      1017 => 
                      array (
                        'key' => 'PALADIN DROP',
                        'value' => 1829164,
                      ),
                      1018 => 
                      array (
                        'key' => 'PANGBORN PA BLAST',
                        'value' => 2263,
                      ),
                      1019 => 
                      array (
                        'key' => 'PARC5S',
                        'value' => 10663608,
                      ),
                      1020 => 
                      array (
                        'key' => 'PARKING',
                        'value' => 2264,
                      ),
                      1021 => 
                      array (
                        'key' => 'PATHFINDER ECO',
                        'value' => 3831419,
                      ),
                      1022 => 
                      array (
                        'key' => 'PATHFINDER GARDEN',
                        'value' => 1829283,
                      ),
                      1023 => 
                      array (
                        'key' => 'PBE',
                        'value' => 5355082,
                      ),
                      1024 => 
                      array (
                        'key' => 'PC200i',
                        'value' => 7738136,
                      ),
                      1025 => 
                      array (
                        'key' => 'PEAK ENERGY FRONTIER',
                        'value' => 1829371,
                      ),
                      1026 => 
                      array (
                        'key' => 'PERFECT GARDEN HOSE',
                        'value' => 2265,
                      ),
                      1027 => 
                      array (
                        'key' => 'PERLAPAL',
                        'value' => 2266,
                      ),
                      1028 => 
                      array (
                        'key' => 'PETERS LIQUID MUD',
                        'value' => 2267,
                      ),
                      1029 => 
                      array (
                        'key' => 'PETRO OIL S&D',
                        'value' => 2268,
                      ),
                      1030 => 
                      array (
                        'key' => 'PETRO OIL S&D 200',
                        'value' => 1829416,
                      ),
                      1031 => 
                      array (
                        'key' => 'PETROHOSE',
                        'value' => 5759832,
                      ),
                      1032 => 
                      array (
                        'key' => 'PETROL 400 HARDWALL',
                        'value' => 1829355,
                      ),
                      1033 => 
                      array (
                        'key' => 'PETROL HARDWALL',
                        'value' => 2269,
                      ),
                      1034 => 
                      array (
                        'key' => 'PGC PLACEMENT TEXTILE',
                        'value' => 2270,
                      ),
                      1035 => 
                      array (
                        'key' => 'PHILLIPS 66 HYDROCARBON DRAIN',
                        'value' => 1829218,
                      ),
                      1036 => 
                      array (
                        'key' => 'PHX FUEL GAS',
                        'value' => 2271,
                      ),
                      1037 => 
                      array (
                        'key' => 'PHX OXYGEN',
                        'value' => 2272,
                      ),
                      1038 => 
                      array (
                        'key' => 'PIONEER HOT AIR II SP',
                        'value' => 1829220,
                      ),
                      1039 => 
                      array (
                        'key' => 'PIONEER PETRO TANK TRUCK',
                        'value' => 1829386,
                      ),
                      1040 => 
                      array (
                        'key' => 'PIONEER XF BLAST',
                        'value' => 1829379,
                      ),
                      1041 => 
                      array (
                        'key' => 'PLASTER & GROUT',
                        'value' => 2273,
                      ),
                      1042 => 
                      array (
                        'key' => 'Plastic Clip Holder',
                        'value' => 1830005,
                      ),
                      1043 => 
                      array (
                        'key' => 'Plastic Process Equipment',
                        'value' => 6951846,
                      ),
                      1044 => 
                      array (
                        'key' => 'PLATINUM JAC RISER',
                        'value' => 2274,
                      ),
                      1045 => 
                      array (
                        'key' => 'PLIOVIC AG SPRAY',
                        'value' => 1829274,
                      ),
                      1046 => 
                      array (
                        'key' => 'PLIOVIC FG',
                        'value' => 2275,
                      ),
                      1047 => 
                      array (
                        'key' => 'PLIOVIC GS',
                        'value' => 2276,
                      ),
                      1048 => 
                      array (
                        'key' => 'PLIOVIC LIGHT WEIGHT',
                        'value' => 10705761,
                      ),
                      1049 => 
                      array (
                        'key' => 'PLIOVIC PLUS',
                        'value' => 2277,
                      ),
                      1050 => 
                      array (
                        'key' => 'PLIOVIC PVC TUBING',
                        'value' => 2278,
                      ),
                      1051 => 
                      array (
                        'key' => 'POLY-V',
                        'value' => 1829493,
                      ),
                      1052 => 
                      array (
                        'key' => 'POSEIDON',
                        'value' => 10631868,
                      ),
                      1053 => 
                      array (
                        'key' => 'POSEIDON UL94-HB',
                        'value' => 2279,
                      ),
                      1054 => 
                      array (
                        'key' => 'POSITIVE DRIVE PD',
                        'value' => 1829509,
                      ),
                      1055 => 
                      array (
                        'key' => 'POT LINE',
                        'value' => 2280,
                      ),
                      1056 => 
                      array (
                        'key' => 'POT LINE HD',
                        'value' => 2281,
                      ),
                      1057 => 
                      array (
                        'key' => 'POTABLE STOCK TANK',
                        'value' => 2282,
                      ),
                      1058 => 
                      array (
                        'key' => 'POTABLE WATER',
                        'value' => 2283,
                      ),
                      1059 => 
                      array (
                        'key' => 'POTABLE WATER HW',
                        'value' => 2284,
                      ),
                      1060 => 
                      array (
                        'key' => 'POTABLE WATER S&D',
                        'value' => 1829346,
                      ),
                      1061 => 
                      array (
                        'key' => 'POTABLE WATER SW',
                        'value' => 2285,
                      ),
                      1062 => 
                      array (
                        'key' => 'POWER PORT',
                        'value' => 3831236,
                      ),
                      1063 => 
                      array (
                        'key' => 'POWERSPAN CL',
                        'value' => 1829528,
                      ),
                      1064 => 
                      array (
                        'key' => 'PRAIRIE GOLDFLEX',
                        'value' => 2286,
                      ),
                      1065 => 
                      array (
                        'key' => 'PRAIRIE GOLDFLEX PETRO',
                        'value' => 1829174,
                      ),
                      1066 => 
                      array (
                        'key' => 'PREM MARINE WET EXHAUST COR',
                        'value' => 2287,
                      ),
                      1067 => 
                      array (
                        'key' => 'PREMIER',
                        'value' => 1829311,
                      ),
                      1068 => 
                      array (
                        'key' => 'PREMIER AIR 1000',
                        'value' => 1829361,
                      ),
                      1069 => 
                      array (
                        'key' => 'PREMIER REFRACTORY CLAMP',
                        'value' => 2288,
                      ),
                      1070 => 
                      array (
                        'key' => 'PREMIER VINTNER',
                        'value' => 1829266,
                      ),
                      1071 => 
                      array (
                        'key' => 'PREMIUM GARDEN',
                        'value' => 2289,
                      ),
                      1072 => 
                      array (
                        'key' => 'PREMIUM MARINE WET EXHAUST',
                        'value' => 2290,
                      ),
                      1073 => 
                      array (
                        'key' => 'PROFESSIONAL AIR',
                        'value' => 3831234,
                      ),
                      1074 => 
                      array (
                        'key' => 'PROSPECTOR FRAC 400 DISCHARGE',
                        'value' => 1829404,
                      ),
                      1075 => 
                      array (
                        'key' => 'PROSPECTOR FRAC S&D',
                        'value' => 7563312,
                      ),
                      1076 => 
                      array (
                        'key' => 'PROSPECTORFLEX BLUE UHMWPE',
                        'value' => 1829272,
                      ),
                      1077 => 
                      array (
                        'key' => 'PROSPECTOR™ AIR',
                        'value' => 2291,
                      ),
                      1078 => 
                      array (
                        'key' => 'PROSPECTOR™ BOP 3000',
                        'value' => 2292,
                      ),
                      1079 => 
                      array (
                        'key' => 'PROSPECTOR™ BOP 5000',
                        'value' => 2293,
                      ),
                      1080 => 
                      array (
                        'key' => 'PROSPECTOR™ FLEX',
                        'value' => 2294,
                      ),
                      1081 => 
                      array (
                        'key' => 'PROSPECTOR™ FLEX OILFIELD',
                        'value' => 2295,
                      ),
                      1082 => 
                      array (
                        'key' => 'PROSPECTOR™ FLEX PETRO',
                        'value' => 2296,
                      ),
                      1083 => 
                      array (
                        'key' => 'PROSPECTOR™ FRAC DISCHARGE',
                        'value' => 2297,
                      ),
                      1084 => 
                      array (
                        'key' => 'PROSPECTOR™ FRAC TANK HOSE',
                        'value' => 2298,
                      ),
                      1085 => 
                      array (
                        'key' => 'PROSPECTOR™ HOT OILER',
                        'value' => 2299,
                      ),
                      1086 => 
                      array (
                        'key' => 'PROSPECTOR™ MINESPRAY',
                        'value' => 2300,
                      ),
                      1087 => 
                      array (
                        'key' => 'PROSPECTOR™ OIL RIG HARDWALL',
                        'value' => 1829396,
                      ),
                      1088 => 
                      array (
                        'key' => 'PROSPECTOR™ OIL RIG HW',
                        'value' => 2301,
                      ),
                      1089 => 
                      array (
                        'key' => 'PROSPECTOR™ OIL RIG SW',
                        'value' => 2302,
                      ),
                      1090 => 
                      array (
                        'key' => 'PROSPECTOR™ OILFIELD',
                        'value' => 2303,
                      ),
                      1091 => 
                      array (
                        'key' => 'PROSPECTOR™ OILFIELD S&D',
                        'value' => 2304,
                      ),
                      1092 => 
                      array (
                        'key' => 'PROSPECTOR™ OILFIELD S&D 150',
                        'value' => 1829375,
                      ),
                      1093 => 
                      array (
                        'key' => 'PROSPECTOR™ OILFIELD S&D 300',
                        'value' => 1829241,
                      ),
                      1094 => 
                      array (
                        'key' => 'PROSPECTOR™ PETRO',
                        'value' => 2305,
                      ),
                      1095 => 
                      array (
                        'key' => 'PROSPECTOR™ PLUS AIR',
                        'value' => 2306,
                      ),
                      1096 => 
                      array (
                        'key' => 'PROSPECTOR™ SHR',
                        'value' => 2307,
                      ),
                      1097 => 
                      array (
                        'key' => 'PROSPECTOR™ WATER DISCHARGE',
                        'value' => 2308,
                      ),
                      1098 => 
                      array (
                        'key' => 'PROSPECTOR™ WATER DISCHARGE 150',
                        'value' => 1829169,
                      ),
                      1099 => 
                      array (
                        'key' => 'PROSPECTOR™ WATER S&D',
                        'value' => 2309,
                      ),
                      1100 => 
                      array (
                        'key' => 'PROTECTION RING',
                        'value' => 2310,
                      ),
                      1101 => 
                      array (
                        'key' => 'PSC CHEMICAL',
                        'value' => 2311,
                      ),
                      1102 => 
                      array (
                        'key' => 'PTT 30',
                        'value' => 1830008,
                      ),
                      1103 => 
                      array (
                        'key' => 'PULP & PAPER WASHDOWN',
                        'value' => 2312,
                      ),
                      1104 => 
                      array (
                        'key' => 'PUMPTEC PULSE',
                        'value' => 1829211,
                      ),
                      1105 => 
                      array (
                        'key' => 'PUREONE',
                        'value' => 2313,
                      ),
                      1106 => 
                      array (
                        'key' => 'PURFIT',
                        'value' => 2314,
                      ),
                      1107 => 
                      array (
                        'key' => 'PURFIT BREWLINE',
                        'value' => 2315,
                      ),
                      1108 => 
                      array (
                        'key' => 'PURPLE FLEXWING',
                        'value' => 2316,
                      ),
                      1109 => 
                      array (
                        'key' => 'PURPLE SNAKE',
                        'value' => 2317,
                      ),
                      1110 => 
                      array (
                        'key' => 'PURPLE SNAKE PLUS',
                        'value' => 2318,
                      ),
                      1111 => 
                      array (
                        'key' => 'PYROFLEX HOT AIR',
                        'value' => 2319,
                      ),
                      1112 => 
                      array (
                        'key' => 'PYROFLEX HOT AIR II',
                        'value' => 1829132,
                      ),
                      1113 => 
                      array (
                        'key' => 'PYROFLEX HOT AIR III FDA',
                        'value' => 2320,
                      ),
                      1114 => 
                      array (
                        'key' => 'PYROFLEX HOT TAR & ASPHALT II',
                        'value' => 1829129,
                      ),
                      1115 => 
                      array (
                        'key' => 'PYROFLEX HOT TAR WAND',
                        'value' => 2321,
                      ),
                      1116 => 
                      array (
                        'key' => 'PYROFLEX II HOT AIR',
                        'value' => 2322,
                      ),
                      1117 => 
                      array (
                        'key' => 'PYROFLEX II HOT TAR & ASPHALT',
                        'value' => 2323,
                      ),
                      1118 => 
                      array (
                        'key' => 'PYROFLEX III HOT AIR',
                        'value' => 2324,
                      ),
                      1119 => 
                      array (
                        'key' => 'PYROFLEX III HOT AIR FDA',
                        'value' => 2325,
                      ),
                      1120 => 
                      array (
                        'key' => 'QR048',
                        'value' => 2326,
                      ),
                      1121 => 
                      array (
                        'key' => 'QR48',
                        'value' => 2327,
                      ),
                      1122 => 
                      array (
                        'key' => 'QUIKSTIR',
                        'value' => 2328,
                      ),
                      1123 => 
                      array (
                        'key' => 'QUIKSTIR PUMP 2P',
                        'value' => 2329,
                      ),
                      1124 => 
                      array (
                        'key' => 'R/W',
                        'value' => 1829432,
                      ),
                      1125 => 
                      array (
                        'key' => 'RADIATOR',
                        'value' => 2330,
                      ),
                      1126 => 
                      array (
                        'key' => 'RADIATOR HOSE',
                        'value' => 1829347,
                      ),
                      1127 => 
                      array (
                        'key' => 'RAGCO',
                        'value' => 2331,
                      ),
                      1128 => 
                      array (
                        'key' => 'RAGCO FABCHEM',
                        'value' => 1829242,
                      ),
                      1129 => 
                      array (
                        'key' => 'RAGCO FLEX KENT',
                        'value' => 1829387,
                      ),
                      1130 => 
                      array (
                        'key' => 'RAIL',
                        'value' => 2332,
                      ),
                      1131 => 
                      array (
                        'key' => 'RANSBG NR SPRAY',
                        'value' => 2333,
                      ),
                      1132 => 
                      array (
                        'key' => 'RAWHID FIRE ENGINE BOOSTER',
                        'value' => 2334,
                      ),
                      1133 => 
                      array (
                        'key' => 'RCT FLEXRITE',
                        'value' => 2335,
                      ),
                      1134 => 
                      array (
                        'key' => 'RDC',
                        'value' => 2336,
                      ),
                      1135 => 
                      array (
                        'key' => 'REAL RUBBER',
                        'value' => 2337,
                      ),
                      1136 => 
                      array (
                        'key' => 'RED FLEXTRA',
                        'value' => 2338,
                      ),
                      1137 => 
                      array (
                        'key' => 'RED FLEXTRA 100',
                        'value' => 1829324,
                      ),
                      1138 => 
                      array (
                        'key' => 'RED FLEXTRA 150',
                        'value' => 1829304,
                      ),
                      1139 => 
                      array (
                        'key' => 'RED HORNET',
                        'value' => 7186052,
                      ),
                      1140 => 
                      array (
                        'key' => 'RED ORTAC II',
                        'value' => 1829326,
                      ),
                      1141 => 
                      array (
                        'key' => 'RED-L GOLDFLEX-C',
                        'value' => 2339,
                      ),
                      1142 => 
                      array (
                        'key' => 'RED-L PLANT STEAM',
                        'value' => 1829210,
                      ),
                      1143 => 
                      array (
                        'key' => 'RED-L WATER',
                        'value' => 2340,
                      ),
                      1144 => 
                      array (
                        'key' => 'REDWING BLUE LOW TEMP',
                        'value' => 2341,
                      ),
                      1145 => 
                      array (
                        'key' => 'REDWING BLUE LOW TEMP FUEL OIL',
                        'value' => 1829205,
                      ),
                      1146 => 
                      array (
                        'key' => 'REDWING FUEL OIL',
                        'value' => 2342,
                      ),
                      1147 => 
                      array (
                        'key' => 'REDWING FUEL OIL HD',
                        'value' => 2343,
                      ),
                      1148 => 
                      array (
                        'key' => 'REDWING HIGH DURO FUEL OIL',
                        'value' => 1829342,
                      ),
                      1149 => 
                      array (
                        'key' => 'REDWING VERSABRAID™',
                        'value' => 2344,
                      ),
                      1150 => 
                      array (
                        'key' => 'REFRACTORY GUNITE',
                        'value' => 2345,
                      ),
                      1151 => 
                      array (
                        'key' => 'REFRACTORY HOSE',
                        'value' => 2346,
                      ),
                      1152 => 
                      array (
                        'key' => 'REFRIGERANT CHARGING',
                        'value' => 2347,
                      ),
                      1153 => 
                      array (
                        'key' => 'REINFLEX',
                        'value' => 1829154,
                      ),
                      1154 => 
                      array (
                        'key' => 'RELIANCE PROSPECTOR WATER S&D',
                        'value' => 2348,
                      ),
                      1155 => 
                      array (
                        'key' => 'RELIANCE WATER S&D',
                        'value' => 2349,
                      ),
                      1156 => 
                      array (
                        'key' => 'RES',
                        'value' => 2350,
                      ),
                      1157 => 
                      array (
                        'key' => 'REVERSE CIRCULATION',
                        'value' => 2351,
                      ),
                      1158 => 
                      array (
                        'key' => 'RIG SUPPLY',
                        'value' => 2352,
                      ),
                      1159 => 
                      array (
                        'key' => 'RIG SUPPLY SW',
                        'value' => 2353,
                      ),
                      1160 => 
                      array (
                        'key' => 'RITCHIE CT5',
                        'value' => 1829098,
                      ),
                      1161 => 
                      array (
                        'key' => 'RIVERB',
                        'value' => 2354,
                      ),
                      1162 => 
                      array (
                        'key' => 'RL1131 TWIN-LINE GRADE R',
                        'value' => 2355,
                      ),
                      1163 => 
                      array (
                        'key' => 'ROADPATCH',
                        'value' => 2356,
                      ),
                      1164 => 
                      array (
                        'key' => 'ROBIN FREON CHARGING',
                        'value' => 2357,
                      ),
                      1165 => 
                      array (
                        'key' => 'ROBIN NEW',
                        'value' => 1829138,
                      ),
                      1166 => 
                      array (
                        'key' => 'ROCK DRILL',
                        'value' => 2358,
                      ),
                      1167 => 
                      array (
                        'key' => 'ROCK DRILL RED',
                        'value' => 1829340,
                      ),
                      1168 => 
                      array (
                        'key' => 'ROCK DUST',
                        'value' => 1829104,
                      ),
                      1169 => 
                      array (
                        'key' => 'ROOF DRAIN',
                        'value' => 2359,
                      ),
                      1170 => 
                      array (
                        'key' => 'ROUGH BORE (HOT TAR & ASPHALT)',
                        'value' => 2360,
                      ),
                      1171 => 
                      array (
                        'key' => 'ROUGH BORE DOCK',
                        'value' => 2361,
                      ),
                      1172 => 
                      array (
                        'key' => 'ROUGH BORE DOCK 200',
                        'value' => 1829323,
                      ),
                      1173 => 
                      array (
                        'key' => 'ROUGH BORE DOCK 300',
                        'value' => 1829221,
                      ),
                      1174 => 
                      array (
                        'key' => 'ROYAL BRASS PLIOVIC',
                        'value' => 2362,
                      ),
                      1175 => 
                      array (
                        'key' => 'ROYAL BRASS VERSIFLO S&D',
                        'value' => 1829214,
                      ),
                      1176 => 
                      array (
                        'key' => 'RSD',
                        'value' => 2363,
                      ),
                      1177 => 
                      array (
                        'key' => 'RUB & GASK WATER DISCHARGE',
                        'value' => 1829358,
                      ),
                      1178 => 
                      array (
                        'key' => 'RX',
                        'value' => 2364,
                      ),
                      1179 => 
                      array (
                        'key' => 'S4SH',
                        'value' => 2365,
                      ),
                      1180 => 
                      array (
                        'key' => 'S4SP',
                        'value' => 2366,
                      ),
                      1181 => 
                      array (
                        'key' => 'SAE 100R4',
                        'value' => 2367,
                      ),
                      1182 => 
                      array (
                        'key' => 'SAE 20R1',
                        'value' => 2368,
                      ),
                      1183 => 
                      array (
                        'key' => 'SAE 20R1 SB/SC',
                        'value' => 1829428,
                      ),
                      1184 => 
                      array (
                        'key' => 'SAE 20R1 SB/SC HARDWALL',
                        'value' => 1829429,
                      ),
                      1185 => 
                      array (
                        'key' => 'SAE 20R2 D1',
                        'value' => 2369,
                      ),
                      1186 => 
                      array (
                        'key' => 'SAE 20R2D1',
                        'value' => 2370,
                      ),
                      1187 => 
                      array (
                        'key' => 'SAE 45 Flare',
                        'value' => 1829987,
                      ),
                      1188 => 
                      array (
                        'key' => 'SAE 45 Inverted Flare',
                        'value' => 1829951,
                      ),
                      1189 => 
                      array (
                        'key' => 'SAE 45 J512 Flare',
                        'value' => 1829950,
                      ),
                      1190 => 
                      array (
                        'key' => 'SAE J1527 A2 R1 ISO 7840 A2',
                        'value' => 2371,
                      ),
                      1191 => 
                      array (
                        'key' => 'SAE J1527 TYPE A2 FUEL FILL',
                        'value' => 2372,
                      ),
                      1192 => 
                      array (
                        'key' => 'SAE J514 Flareless Tube Fittings',
                        'value' => 1829955,
                      ),
                      1193 => 
                      array (
                        'key' => 'SAE-20R2 D1',
                        'value' => 2373,
                      ),
                      1194 => 
                      array (
                        'key' => 'SAFLEX NSFX',
                        'value' => 1829189,
                      ),
                      1195 => 
                      array (
                        'key' => 'SAFLEX®',
                        'value' => 1830043,
                      ),
                      1196 => 
                      array (
                        'key' => 'SAND RECOVERY S&D',
                        'value' => 2374,
                      ),
                      1197 => 
                      array (
                        'key' => 'SAND SUCTION',
                        'value' => 2375,
                      ),
                      1198 => 
                      array (
                        'key' => 'SANDBLAST 400',
                        'value' => 2376,
                      ),
                      1199 => 
                      array (
                        'key' => 'SANDBLAST DEADMAN',
                        'value' => 1829239,
                      ),
                      1200 => 
                      array (
                        'key' => 'SANDER',
                        'value' => 2377,
                      ),
                      1201 => 
                      array (
                        'key' => 'SANI-WASH™',
                        'value' => 2378,
                      ),
                      1202 => 
                      array (
                        'key' => 'SANI-WASH™ PLUS',
                        'value' => 2379,
                      ),
                      1203 => 
                      array (
                        'key' => 'SANI-WASH™ SUPREME',
                        'value' => 2380,
                      ),
                      1204 => 
                      array (
                        'key' => 'SBQ FLOATER',
                        'value' => 1829147,
                      ),
                      1205 => 
                      array (
                        'key' => 'SBQ PETRO',
                        'value' => 1829313,
                      ),
                      1206 => 
                      array (
                        'key' => 'SCARFING',
                        'value' => 7563310,
                      ),
                      1207 => 
                      array (
                        'key' => 'SCOMI LIQUID MUD',
                        'value' => 2381,
                      ),
                      1208 => 
                      array (
                        'key' => 'SCOTT',
                        'value' => 1829100,
                      ),
                      1209 => 
                      array (
                        'key' => 'SCOTT AIR BREATHING',
                        'value' => 7837755,
                      ),
                      1210 => 
                      array (
                        'key' => 'SCP3',
                        'value' => 2382,
                      ),
                      1211 => 
                      array (
                        'key' => 'SCRMAC KURB KING',
                        'value' => 2383,
                      ),
                      1212 => 
                      array (
                        'key' => 'SEAL-RITE',
                        'value' => 5759831,
                      ),
                      1213 => 
                      array (
                        'key' => 'SEALFS',
                        'value' => 2384,
                      ),
                      1214 => 
                      array (
                        'key' => 'Sealing Washers',
                        'value' => 1830000,
                      ),
                      1215 => 
                      array (
                        'key' => 'SEMLER FDA',
                        'value' => 1829170,
                      ),
                      1216 => 
                      array (
                        'key' => 'SERVICE STATION AIR',
                        'value' => 2385,
                      ),
                      1217 => 
                      array (
                        'key' => 'SFS',
                        'value' => 1830044,
                      ),
                      1218 => 
                      array (
                        'key' => 'SFS (FIRE SUPPRESSION)',
                        'value' => 2386,
                      ),
                      1219 => 
                      array (
                        'key' => 'SGOBAIN',
                        'value' => 2387,
                      ),
                      1220 => 
                      array (
                        'key' => 'SGOBAIN FOOD DISCHARGE',
                        'value' => 2388,
                      ),
                      1221 => 
                      array (
                        'key' => 'SGOBAIN FOOD S&D',
                        'value' => 2389,
                      ),
                      1222 => 
                      array (
                        'key' => 'SGUN',
                        'value' => 1830045,
                      ),
                      1223 => 
                      array (
                        'key' => 'SHELLFLEX',
                        'value' => 2390,
                      ),
                      1224 => 
                      array (
                        'key' => 'SHIELD',
                        'value' => 2391,
                      ),
                      1225 => 
                      array (
                        'key' => 'SHJ',
                        'value' => 1830046,
                      ),
                      1226 => 
                      array (
                        'key' => 'SIGNAL CALL',
                        'value' => 1829298,
                      ),
                      1227 => 
                      array (
                        'key' => 'SILENTSYNC',
                        'value' => 1829497,
                      ),
                      1228 => 
                      array (
                        'key' => 'SINGLE-LINE (GRADE R)',
                        'value' => 1829383,
                      ),
                      1229 => 
                      array (
                        'key' => 'SINGLE-LINE (GRADE R)',
                        'value' => 2392,
                      ),
                      1230 => 
                      array (
                        'key' => 'SINGLE-LINE (GRADE R)',
                        'value' => 1829246,
                      ),
                      1231 => 
                      array (
                        'key' => 'SINGLE-LINE (GRADE RM)',
                        'value' => 2393,
                      ),
                      1232 => 
                      array (
                        'key' => 'SINGLE-LINE (GRADE T)',
                        'value' => 1829270,
                      ),
                      1233 => 
                      array (
                        'key' => 'SINGLE-LINE (GRADE T)',
                        'value' => 1829309,
                      ),
                      1234 => 
                      array (
                        'key' => 'SINGLE-LINE (GRADE T)',
                        'value' => 2394,
                      ),
                      1235 => 
                      array (
                        'key' => 'SK CARBOV',
                        'value' => 2395,
                      ),
                      1236 => 
                      array (
                        'key' => 'SLURRY',
                        'value' => 2396,
                      ),
                      1237 => 
                      array (
                        'key' => 'SMOOTH BORE DOCK',
                        'value' => 2397,
                      ),
                      1238 => 
                      array (
                        'key' => 'SMOOTH BORE HOT TAR & ASPHALT',
                        'value' => 2398,
                      ),
                      1239 => 
                      array (
                        'key' => 'SMOOTH BORE MOLTEN SULPHUR',
                        'value' => 2399,
                      ),
                      1240 => 
                      array (
                        'key' => 'SNAPON',
                        'value' => 2400,
                      ),
                      1241 => 
                      array (
                        'key' => 'SOFTUB WATER',
                        'value' => 2401,
                      ),
                      1242 => 
                      array (
                        'key' => 'SOFTWALL',
                        'value' => 2402,
                      ),
                      1243 => 
                      array (
                        'key' => 'SOFTWALL FDA',
                        'value' => 5355079,
                      ),
                      1244 => 
                      array (
                        'key' => 'SOHO PROSPECTOR WATER S&D',
                        'value' => 2403,
                      ),
                      1245 => 
                      array (
                        'key' => 'SOURCE DISPENSING',
                        'value' => 1829108,
                      ),
                      1246 => 
                      array (
                        'key' => 'SOUTH PNEUMATICS SW',
                        'value' => 1829198,
                      ),
                      1247 => 
                      array (
                        'key' => 'SOUTHERN',
                        'value' => 2404,
                      ),
                      1248 => 
                      array (
                        'key' => 'SOUTHWEST RUBBER',
                        'value' => 7082341,
                      ),
                      1249 => 
                      array (
                        'key' => 'SPARTAN',
                        'value' => 7082427,
                      ),
                      1250 => 
                      array (
                        'key' => 'SPARTAN PRESSURE WASHER',
                        'value' => 2405,
                      ),
                      1251 => 
                      array (
                        'key' => 'Spartan Pressure Washer',
                        'value' => 1829156,
                      ),
                      1252 => 
                      array (
                        'key' => 'SPECIAL PD',
                        'value' => 1829512,
                      ),
                      1253 => 
                      array (
                        'key' => 'SPEEDAIRE',
                        'value' => 2406,
                      ),
                      1254 => 
                      array (
                        'key' => 'SPIR SEP',
                        'value' => 2407,
                      ),
                      1255 => 
                      array (
                        'key' => 'SPIR SEP TPG',
                        'value' => 2408,
                      ),
                      1256 => 
                      array (
                        'key' => 'SPIRAFLEX® 1500',
                        'value' => 2409,
                      ),
                      1257 => 
                      array (
                        'key' => 'SPIRAFLEX® 1600',
                        'value' => 2410,
                      ),
                      1258 => 
                      array (
                        'key' => 'SPIRAFLEX® 2500',
                        'value' => 1829307,
                      ),
                      1259 => 
                      array (
                        'key' => 'SPIRAFLEX® ACTION F.E.S',
                        'value' => 2411,
                      ),
                      1260 => 
                      array (
                        'key' => 'SPIRAFLEX® AGFLEX',
                        'value' => 2412,
                      ),
                      1261 => 
                      array (
                        'key' => 'SPIRAFLEX® AGGIE',
                        'value' => 2413,
                      ),
                      1262 => 
                      array (
                        'key' => 'SPIRAFLEX® AGGIE PVC',
                        'value' => 1829366,
                      ),
                      1263 => 
                      array (
                        'key' => 'SPIRAFLEX® AIR SEEDER',
                        'value' => 2414,
                      ),
                      1264 => 
                      array (
                        'key' => 'SPIRAFLEX® BARKBLOWER',
                        'value' => 2415,
                      ),
                      1265 => 
                      array (
                        'key' => 'SPIRAFLEX® BLACK SUPER-DUTY',
                        'value' => 1829363,
                      ),
                      1266 => 
                      array (
                        'key' => 'SPIRAFLEX® BLACK SUPER-DUTY LAYFLAT',
                        'value' => 2416,
                      ),
                      1267 => 
                      array (
                        'key' => 'SPIRAFLEX® BLUE EXTRA LIGHT DUTY LAYFLAT',
                        'value' => 2417,
                      ),
                      1268 => 
                      array (
                        'key' => 'SPIRAFLEX® BLUE EXTRALIGHT DUTY',
                        'value' => 1829357,
                      ),
                      1269 => 
                      array (
                        'key' => 'SPIRAFLEX® CABLE GUARD',
                        'value' => 2418,
                      ),
                      1270 => 
                      array (
                        'key' => 'SPIRAFLEX® DUCTING',
                        'value' => 2419,
                      ),
                      1271 => 
                      array (
                        'key' => 'SPIRAFLEX® EXTRA LIGHT DUTY',
                        'value' => 1829188,
                      ),
                      1272 => 
                      array (
                        'key' => 'SPIRAFLEX® FGVAC',
                        'value' => 2420,
                      ),
                      1273 => 
                      array (
                        'key' => 'SPIRAFLEX® FISH SUCTION',
                        'value' => 2421,
                      ),
                      1274 => 
                      array (
                        'key' => 'SPIRAFLEX® FOODVAC',
                        'value' => 2422,
                      ),
                      1275 => 
                      array (
                        'key' => 'SPIRAFLEX® GRASSVAC',
                        'value' => 2423,
                      ),
                      1276 => 
                      array (
                        'key' => 'SPIRAFLEX® GRAY LIGHT DUTY LAYFLAT',
                        'value' => 2424,
                      ),
                      1277 => 
                      array (
                        'key' => 'SPIRAFLEX® GREEN',
                        'value' => 1829335,
                      ),
                      1278 => 
                      array (
                        'key' => 'SPIRAFLEX® GREEN LAYFLAT',
                        'value' => 2425,
                      ),
                      1279 => 
                      array (
                        'key' => 'SPIRAFLEX® HEAVY DUTY',
                        'value' => 1829199,
                      ),
                      1280 => 
                      array (
                        'key' => 'SPIRAFLEX® HT',
                        'value' => 2426,
                      ),
                      1281 => 
                      array (
                        'key' => 'SPIRAFLEX® LIGHT DUTY',
                        'value' => 1829190,
                      ),
                      1282 => 
                      array (
                        'key' => 'SPIRAFLEX® LW ROCK DUST',
                        'value' => 2427,
                      ),
                      1283 => 
                      array (
                        'key' => 'SPIRAFLEX® MEDIUM DUTY',
                        'value' => 1829182,
                      ),
                      1284 => 
                      array (
                        'key' => 'SPIRAFLEX® MULCH BLOWER',
                        'value' => 2428,
                      ),
                      1285 => 
                      array (
                        'key' => 'SPIRAFLEX® MULCHBLOWER',
                        'value' => 2429,
                      ),
                      1286 => 
                      array (
                        'key' => 'SPIRAFLEX® OIL FILL',
                        'value' => 7401486,
                      ),
                      1287 => 
                      array (
                        'key' => 'SPIRAFLEX® RED MEDIUM DUTY',
                        'value' => 1829317,
                      ),
                      1288 => 
                      array (
                        'key' => 'SPIRAFLEX® RED MEDIUM DUTY LAYFLAT',
                        'value' => 2430,
                      ),
                      1289 => 
                      array (
                        'key' => 'SPIRAFLEX® ROCK DUST',
                        'value' => 2431,
                      ),
                      1290 => 
                      array (
                        'key' => 'SPIRAFLEX® VACUUM',
                        'value' => 2432,
                      ),
                      1291 => 
                      array (
                        'key' => 'SPIRAFLEX® VAPOR RECOVERY',
                        'value' => 2433,
                      ),
                      1292 => 
                      array (
                        'key' => 'SPIRAFLEX® YELLOW HEAVY DUTY',
                        'value' => 1829381,
                      ),
                      1293 => 
                      array (
                        'key' => 'SPIRAFLEX® YELLOW HEAVY DUTY LAYFLAT',
                        'value' => 2434,
                      ),
                      1294 => 
                      array (
                        'key' => 'SPIRAFLOW',
                        'value' => 2435,
                      ),
                      1295 => 
                      array (
                        'key' => 'SPIRATHANE HD',
                        'value' => 2436,
                      ),
                      1296 => 
                      array (
                        'key' => 'SPIRATHANE LD',
                        'value' => 2437,
                      ),
                      1297 => 
                      array (
                        'key' => 'SPIRATHANE PT',
                        'value' => 2438,
                      ),
                      1298 => 
                      array (
                        'key' => 'SPIRIT',
                        'value' => 5355081,
                      ),
                      1299 => 
                      array (
                        'key' => 'SR12',
                        'value' => 2439,
                      ),
                      1300 => 
                      array (
                        'key' => 'SR13',
                        'value' => 2440,
                      ),
                      1301 => 
                      array (
                        'key' => 'SR14',
                        'value' => 2441,
                      ),
                      1302 => 
                      array (
                        'key' => 'SR14A',
                        'value' => 2442,
                      ),
                      1303 => 
                      array (
                        'key' => 'SR14B',
                        'value' => 2443,
                      ),
                      1304 => 
                      array (
                        'key' => 'SR15',
                        'value' => 2444,
                      ),
                      1305 => 
                      array (
                        'key' => 'SR16SC',
                        'value' => 2445,
                      ),
                      1306 => 
                      array (
                        'key' => 'SR18',
                        'value' => 2446,
                      ),
                      1307 => 
                      array (
                        'key' => 'SR1SN',
                        'value' => 2447,
                      ),
                      1308 => 
                      array (
                        'key' => 'SR2SN',
                        'value' => 2448,
                      ),
                      1309 => 
                      array (
                        'key' => 'SR3',
                        'value' => 2449,
                      ),
                      1310 => 
                      array (
                        'key' => 'SR5',
                        'value' => 2450,
                      ),
                      1311 => 
                      array (
                        'key' => 'SR6',
                        'value' => 2451,
                      ),
                      1312 => 
                      array (
                        'key' => 'SR7',
                        'value' => 2452,
                      ),
                      1313 => 
                      array (
                        'key' => 'SR8',
                        'value' => 2453,
                      ),
                      1314 => 
                      array (
                        'key' => 'SRS',
                        'value' => 2454,
                      ),
                      1315 => 
                      array (
                        'key' => 'STANDARD STRAIGHT RAD',
                        'value' => 2455,
                      ),
                      1316 => 
                      array (
                        'key' => 'Standpipe',
                        'value' => 1829956,
                      ),
                      1317 => 
                      array (
                        'key' => 'STANLEY',
                        'value' => 1829192,
                      ),
                      1318 => 
                      array (
                        'key' => 'STANLEY N298402',
                        'value' => 1829197,
                      ),
                      1319 => 
                      array (
                        'key' => 'STEAM 250',
                        'value' => 2456,
                      ),
                      1320 => 
                      array (
                        'key' => 'STEAM HOSE',
                        'value' => 1829165,
                      ),
                      1321 => 
                      array (
                        'key' => 'STEAM PILE DRIVER',
                        'value' => 1829345,
                      ),
                      1322 => 
                      array (
                        'key' => 'STEEL AIR',
                        'value' => 2457,
                      ),
                      1323 => 
                      array (
                        'key' => 'STEEL AIR BOOTSTRAP',
                        'value' => 2458,
                      ),
                      1324 => 
                      array (
                        'key' => 'STEEL AIR MSHA',
                        'value' => 1829249,
                      ),
                      1325 => 
                      array (
                        'key' => 'SUBSEA CABLE',
                        'value' => 2459,
                      ),
                      1326 => 
                      array (
                        'key' => 'SULBANA GAUNTLET',
                        'value' => 2460,
                      ),
                      1327 => 
                      array (
                        'key' => 'SUMMERS',
                        'value' => 1829368,
                      ),
                      1328 => 
                      array (
                        'key' => 'SUNSDEA MUD',
                        'value' => 2461,
                      ),
                      1329 => 
                      array (
                        'key' => 'SUNSET WATER S&D FIRE SERVICE',
                        'value' => 2462,
                      ),
                      1330 => 
                      array (
                        'key' => 'SUPER AIR 400',
                        'value' => 2463,
                      ),
                      1331 => 
                      array (
                        'key' => 'SUPER BLACK FLEXWING',
                        'value' => 2464,
                      ),
                      1332 => 
                      array (
                        'key' => 'SUPER ORTAC',
                        'value' => 1829130,
                      ),
                      1333 => 
                      array (
                        'key' => 'SUPER ORTAC®',
                        'value' => 2465,
                      ),
                      1334 => 
                      array (
                        'key' => 'SUPER ROCK DRILL',
                        'value' => 2466,
                      ),
                      1335 => 
                      array (
                        'key' => 'SUPER ROCK DRILL HT',
                        'value' => 2467,
                      ),
                      1336 => 
                      array (
                        'key' => 'SUPER SANI-WASH 300',
                        'value' => 1829152,
                      ),
                      1337 => 
                      array (
                        'key' => 'SUPER SANI-WASH™',
                        'value' => 2468,
                      ),
                      1338 => 
                      array (
                        'key' => 'SUPER TORQUE',
                        'value' => 1829525,
                      ),
                      1339 => 
                      array (
                        'key' => 'SUPER YC AIR',
                        'value' => 7082890,
                      ),
                      1340 => 
                      array (
                        'key' => 'SUPERIOR',
                        'value' => 2469,
                      ),
                      1341 => 
                      array (
                        'key' => 'SUPERIOR PETRO TANK TRUCK',
                        'value' => 1829380,
                      ),
                      1342 => 
                      array (
                        'key' => 'SUPFLOW',
                        'value' => 2470,
                      ),
                      1343 => 
                      array (
                        'key' => 'SUPVAC',
                        'value' => 2471,
                      ),
                      1344 => 
                      array (
                        'key' => 'SURELINE',
                        'value' => 2472,
                      ),
                      1345 => 
                      array (
                        'key' => 'SURELINE BLACK',
                        'value' => 1829306,
                      ),
                      1346 => 
                      array (
                        'key' => 'SW DRY CEMENT & BARYTES',
                        'value' => 2473,
                      ),
                      1347 => 
                      array (
                        'key' => 'SWAGELOK',
                        'value' => 2474,
                      ),
                      1348 => 
                      array (
                        'key' => 'SYNCHROCHAIN CARBON',
                        'value' => 1829531,
                      ),
                      1349 => 
                      array (
                        'key' => 'TAMARACK',
                        'value' => 1829143,
                      ),
                      1350 => 
                      array (
                        'key' => 'TAN FLEXTRA',
                        'value' => 2475,
                      ),
                      1351 => 
                      array (
                        'key' => 'TAN FLEXTRA FDA',
                        'value' => 2476,
                      ),
                      1352 => 
                      array (
                        'key' => 'TAN FLEXWING',
                        'value' => 2477,
                      ),
                      1353 => 
                      array (
                        'key' => 'TAN FLEXWING FDA',
                        'value' => 2478,
                      ),
                      1354 => 
                      array (
                        'key' => 'TANK CLEANING',
                        'value' => 2479,
                      ),
                      1355 => 
                      array (
                        'key' => 'TANKER BARGE DISCHARGE',
                        'value' => 2480,
                      ),
                      1356 => 
                      array (
                        'key' => 'TECHNIWELD',
                        'value' => 7079917,
                      ),
                      1357 => 
                      array (
                        'key' => 'TEFLON',
                        'value' => 2481,
                      ),
                      1358 => 
                      array (
                        'key' => 'TEFPASS',
                        'value' => 1829162,
                      ),
                      1359 => 
                      array (
                        'key' => 'TEKNOR',
                        'value' => 1829106,
                      ),
                      1360 => 
                      array (
                        'key' => 'TEKNOR 8650GT',
                        'value' => 1829201,
                      ),
                      1361 => 
                      array (
                        'key' => 'TEKNOR 8696-27',
                        'value' => 1829217,
                      ),
                      1362 => 
                      array (
                        'key' => 'TEKNOR 969RR',
                        'value' => 1829226,
                      ),
                      1363 => 
                      array (
                        'key' => 'TETRA',
                        'value' => 2482,
                      ),
                      1364 => 
                      array (
                        'key' => 'THERMIDOR',
                        'value' => 2483,
                      ),
                      1365 => 
                      array (
                        'key' => 'THESE ARE TIED TO NORFOLK SPECS...',
                        'value' => 1829257,
                      ),
                      1366 => 
                      array (
                        'key' => 'THOMPSON FLEX XLPE',
                        'value' => 2484,
                      ),
                      1367 => 
                      array (
                        'key' => 'THUNDER INSTA-GRIP',
                        'value' => 2485,
                      ),
                      1368 => 
                      array (
                        'key' => 'TIG WELDING',
                        'value' => 2486,
                      ),
                      1369 => 
                      array (
                        'key' => 'TIMCO',
                        'value' => 2487,
                      ),
                      1370 => 
                      array (
                        'key' => 'TIPCO PREMIUM GARDEN',
                        'value' => 2488,
                      ),
                      1371 => 
                      array (
                        'key' => 'TIPO',
                        'value' => 1829427,
                      ),
                      1372 => 
                      array (
                        'key' => 'TORQUE TEAM LAMINATED',
                        'value' => 1829516,
                      ),
                      1373 => 
                      array (
                        'key' => 'TORQUE TEAM PLUS',
                        'value' => 1829500,
                      ),
                      1374 => 
                      array (
                        'key' => 'TORQUE-FLEX',
                        'value' => 1829498,
                      ),
                      1375 => 
                      array (
                        'key' => 'TORRIDAIR',
                        'value' => 2489,
                      ),
                      1376 => 
                      array (
                        'key' => 'TOW CABLE',
                        'value' => 2490,
                      ),
                      1377 => 
                      array (
                        'key' => 'TR7',
                        'value' => 2491,
                      ),
                      1378 => 
                      array (
                        'key' => 'TR8',
                        'value' => 2492,
                      ),
                      1379 => 
                      array (
                        'key' => 'TRANSPLY',
                        'value' => 2493,
                      ),
                      1380 => 
                      array (
                        'key' => 'TRI-STATE',
                        'value' => 1829330,
                      ),
                      1381 => 
                      array (
                        'key' => 'TRIDENT',
                        'value' => 2494,
                      ),
                      1382 => 
                      array (
                        'key' => 'TRIDENT SER',
                        'value' => 2495,
                      ),
                      1383 => 
                      array (
                        'key' => 'TRINCO BLAST',
                        'value' => 2496,
                      ),
                      1384 => 
                      array (
                        'key' => 'TRIPLX',
                        'value' => 2497,
                      ),
                      1385 => 
                      array (
                        'key' => 'TRIX ACETYLENE',
                        'value' => 2498,
                      ),
                      1386 => 
                      array (
                        'key' => 'TRIX BLAUSTRAHL',
                        'value' => 2499,
                      ),
                      1387 => 
                      array (
                        'key' => 'TRIX BRAKE',
                        'value' => 2500,
                      ),
                      1388 => 
                      array (
                        'key' => 'TRIX FUEL',
                        'value' => 2501,
                      ),
                      1389 => 
                      array (
                        'key' => 'TRIX HP',
                        'value' => 7082339,
                      ),
                      1390 => 
                      array (
                        'key' => 'TRIX MULTIFOOD',
                        'value' => 2502,
                      ),
                      1391 => 
                      array (
                        'key' => 'TRIX NITRO',
                        'value' => 2503,
                      ),
                      1392 => 
                      array (
                        'key' => 'TRIX OXYGEN',
                        'value' => 2504,
                      ),
                      1393 => 
                      array (
                        'key' => 'TRIX PAINT SPRAY',
                        'value' => 2505,
                      ),
                      1394 => 
                      array (
                        'key' => 'TRIX RESPIRATION',
                        'value' => 2506,
                      ),
                      1395 => 
                      array (
                        'key' => 'TRIX ROSTRAHL',
                        'value' => 2507,
                      ),
                      1396 => 
                      array (
                        'key' => 'TRIX SUPER',
                        'value' => 2508,
                      ),
                      1397 => 
                      array (
                        'key' => 'TUNNELCOTE ROCK DUST FLEXTRA',
                        'value' => 2509,
                      ),
                      1398 => 
                      array (
                        'key' => 'TUNNELCOTE ROCK DUST FLEXWING',
                        'value' => 2510,
                      ),
                      1399 => 
                      array (
                        'key' => 'TWIN-LINE (GRADE R)',
                        'value' => 2511,
                      ),
                      1400 => 
                      array (
                        'key' => 'TWIN-LINE (GRADE RM)',
                        'value' => 2512,
                      ),
                      1401 => 
                      array (
                        'key' => 'TWIN-LINE (GRADE T)',
                        'value' => 2513,
                      ),
                      1402 => 
                      array (
                        'key' => 'TWIN-LINE ISO 3821',
                        'value' => 2514,
                      ),
                      1403 => 
                      array (
                        'key' => 'UL 92 FIRE EXTINGUISHER',
                        'value' => 2515,
                      ),
                      1404 => 
                      array (
                        'key' => 'ULTRABRAID BULL',
                        'value' => 2516,
                      ),
                      1405 => 
                      array (
                        'key' => 'ULTRAFLEX',
                        'value' => 2517,
                      ),
                      1406 => 
                      array (
                        'key' => 'ULTRAMAR',
                        'value' => 2518,
                      ),
                      1407 => 
                      array (
                        'key' => 'ULTRAMAX',
                        'value' => 5764905,
                      ),
                      1408 => 
                      array (
                        'key' => 'UNDERHILL',
                        'value' => 2519,
                      ),
                      1409 => 
                      array (
                        'key' => 'Uni-Crimp UCF10 Ferrule',
                        'value' => 1830018,
                      ),
                      1410 => 
                      array (
                        'key' => 'Uni-Crimp UCF11 Ferrule',
                        'value' => 1830019,
                      ),
                      1411 => 
                      array (
                        'key' => 'UNI-Crimp UCF2 Ferrule',
                        'value' => 1830013,
                      ),
                      1412 => 
                      array (
                        'key' => 'Uni-Crimp UCF3 Ferrule',
                        'value' => 1830014,
                      ),
                      1413 => 
                      array (
                        'key' => 'Uni-Crimp UCF6 Ferrule',
                        'value' => 1830015,
                      ),
                      1414 => 
                      array (
                        'key' => 'Uni-Crimp UCF8 Ferrule',
                        'value' => 1830016,
                      ),
                      1415 => 
                      array (
                        'key' => 'Uni-Crimp UCF9 Ferrule',
                        'value' => 1830017,
                      ),
                      1416 => 
                      array (
                        'key' => 'UNISOURCE',
                        'value' => 2520,
                      ),
                      1417 => 
                      array (
                        'key' => 'UNITED CENTRAL',
                        'value' => 5764906,
                      ),
                      1418 => 
                      array (
                        'key' => 'UNITED RUBBER CONTRACTOR\'S WATER',
                        'value' => 1829291,
                      ),
                      1419 => 
                      array (
                        'key' => 'UNITRIX 60',
                        'value' => 2521,
                      ),
                      1420 => 
                      array (
                        'key' => 'UNITRIX 80',
                        'value' => 2522,
                      ),
                      1421 => 
                      array (
                        'key' => 'UNIWELD',
                        'value' => 1829184,
                      ),
                      1422 => 
                      array (
                        'key' => 'UNPRINTED SPRAY SALVAGE',
                        'value' => 2523,
                      ),
                      1423 => 
                      array (
                        'key' => 'V-50 S&D',
                        'value' => 2524,
                      ),
                      1424 => 
                      array (
                        'key' => 'VACUPRESS OIL',
                        'value' => 10862808,
                      ),
                      1425 => 
                      array (
                        'key' => 'VACUPRESS OIL PU',
                        'value' => 10862807,
                      ),
                      1426 => 
                      array (
                        'key' => 'VACUUM',
                        'value' => 2525,
                      ),
                      1427 => 
                      array (
                        'key' => 'VACUWORX XR16SC',
                        'value' => 3831418,
                      ),
                      1428 => 
                      array (
                        'key' => 'Valve Adapter',
                        'value' => 1830001,
                      ),
                      1429 => 
                      array (
                        'key' => 'Valve Caps',
                        'value' => 1830002,
                      ),
                      1430 => 
                      array (
                        'key' => 'Valve Core',
                        'value' => 1830003,
                      ),
                      1431 => 
                      array (
                        'key' => 'VAPOR RECOVERY',
                        'value' => 2526,
                      ),
                      1432 => 
                      array (
                        'key' => 'VAPOR RECOVERY DOCK',
                        'value' => 2527,
                      ),
                      1433 => 
                      array (
                        'key' => 'VARIABLE SPEED',
                        'value' => 1829513,
                      ),
                      1434 => 
                      array (
                        'key' => 'VARIFLEX',
                        'value' => 2528,
                      ),
                      1435 => 
                      array (
                        'key' => 'VELOCITY BANDING COIL',
                        'value' => 2529,
                      ),
                      1436 => 
                      array (
                        'key' => 'VELOCITY BEVERAGE TRANSFER',
                        'value' => 2530,
                      ),
                      1437 => 
                      array (
                        'key' => 'VELOCITY PETROLEUM TRANSFER',
                        'value' => 2531,
                      ),
                      1438 => 
                      array (
                        'key' => 'VELOCITY WATER TRANSFER',
                        'value' => 2532,
                      ),
                      1439 => 
                      array (
                        'key' => 'VERSACHEM',
                        'value' => 2533,
                      ),
                      1440 => 
                      array (
                        'key' => 'VERSACRETE',
                        'value' => 2534,
                      ),
                      1441 => 
                      array (
                        'key' => 'VERSAFUEL',
                        'value' => 7563311,
                      ),
                      1442 => 
                      array (
                        'key' => 'VERSAFUEL EN1765:2016 S15',
                        'value' => 2535,
                      ),
                      1443 => 
                      array (
                        'key' => 'VERSAFUEL FLEX',
                        'value' => 2536,
                      ),
                      1444 => 
                      array (
                        'key' => 'VERSIFLO DISCHARGE',
                        'value' => 2537,
                      ),
                      1445 => 
                      array (
                        'key' => 'VERSIFLO SUCTION & DISCHARGE',
                        'value' => 2538,
                      ),
                      1446 => 
                      array (
                        'key' => 'VICTOR',
                        'value' => 2539,
                      ),
                      1447 => 
                      array (
                        'key' => 'VICTOR GRADE RM',
                        'value' => 1829341,
                      ),
                      1448 => 
                      array (
                        'key' => 'VICTOR GRADE T',
                        'value' => 1829114,
                      ),
                      1449 => 
                      array (
                        'key' => 'VINTNER',
                        'value' => 2540,
                      ),
                      1450 => 
                      array (
                        'key' => 'VINTNER LITE',
                        'value' => 7186049,
                      ),
                      1451 => 
                      array (
                        'key' => 'VINTNER MICROBAN',
                        'value' => 2541,
                      ),
                      1452 => 
                      array (
                        'key' => 'VINTNER RESERVE',
                        'value' => 2542,
                      ),
                      1453 => 
                      array (
                        'key' => 'VIPER',
                        'value' => 2543,
                      ),
                      1454 => 
                      array (
                        'key' => 'WAB SLURRY',
                        'value' => 2544,
                      ),
                      1455 => 
                      array (
                        'key' => 'WASHDOWN',
                        'value' => 2545,
                      ),
                      1456 => 
                      array (
                        'key' => 'WASHDOWN FDA',
                        'value' => 7717343,
                      ),
                      1457 => 
                      array (
                        'key' => 'WASTE MATE',
                        'value' => 2546,
                      ),
                      1458 => 
                      array (
                        'key' => 'WATER',
                        'value' => 1829360,
                      ),
                      1459 => 
                      array (
                        'key' => 'WATER & AIR HD',
                        'value' => 2547,
                      ),
                      1460 => 
                      array (
                        'key' => 'WATER 150 HD',
                        'value' => 1829322,
                      ),
                      1461 => 
                      array (
                        'key' => 'WATER DISCHARGE',
                        'value' => 2548,
                      ),
                      1462 => 
                      array (
                        'key' => 'WATER DISCHARGE 100',
                        'value' => 1829320,
                      ),
                      1463 => 
                      array (
                        'key' => 'WATER DISCHARGE 150',
                        'value' => 1829233,
                      ),
                      1464 => 
                      array (
                        'key' => 'WATER DISCHARGE 250',
                        'value' => 1829376,
                      ),
                      1465 => 
                      array (
                        'key' => 'WATER DISCHARGE HD',
                        'value' => 2549,
                      ),
                      1466 => 
                      array (
                        'key' => 'WATER DISCHARGE HD 600',
                        'value' => 1829264,
                      ),
                      1467 => 
                      array (
                        'key' => 'WATER HD',
                        'value' => 2550,
                      ),
                      1468 => 
                      array (
                        'key' => 'WATER JETTING',
                        'value' => 1829279,
                      ),
                      1469 => 
                      array (
                        'key' => 'WATER JETTING 1000',
                        'value' => 2551,
                      ),
                      1470 => 
                      array (
                        'key' => 'WATER JETTING 500',
                        'value' => 2552,
                      ),
                      1471 => 
                      array (
                        'key' => 'WATER REHAB',
                        'value' => 2553,
                      ),
                      1472 => 
                      array (
                        'key' => 'WATER S&D',
                        'value' => 1829252,
                      ),
                      1473 => 
                      array (
                        'key' => 'WATER SUCTION & DISCHARGE',
                        'value' => 2554,
                      ),
                      1474 => 
                      array (
                        'key' => 'WEDGE TLP',
                        'value' => 1829527,
                      ),
                      1475 => 
                      array (
                        'key' => 'WEST MICH',
                        'value' => 1829111,
                      ),
                      1476 => 
                      array (
                        'key' => 'WESTERN',
                        'value' => 2555,
                      ),
                      1477 => 
                      array (
                        'key' => 'WESTFLEX',
                        'value' => 5764907,
                      ),
                      1478 => 
                      array (
                        'key' => 'WHALE OIL',
                        'value' => 2556,
                      ),
                      1479 => 
                      array (
                        'key' => 'WHALE WATER',
                        'value' => 2557,
                      ),
                      1480 => 
                      array (
                        'key' => 'WHIPEND BLAST',
                        'value' => 2558,
                      ),
                      1481 => 
                      array (
                        'key' => 'WHITE FLEXTRA',
                        'value' => 2559,
                      ),
                      1482 => 
                      array (
                        'key' => 'WHITE FLEXWING',
                        'value' => 2560,
                      ),
                      1483 => 
                      array (
                        'key' => 'WHITEWATER',
                        'value' => 2561,
                      ),
                      1484 => 
                      array (
                        'key' => 'WHW GAUNTLET',
                        'value' => 1829423,
                      ),
                      1485 => 
                      array (
                        'key' => 'WILD HOG',
                        'value' => 1829225,
                      ),
                      1486 => 
                      array (
                        'key' => 'WINELINE',
                        'value' => 7992690,
                      ),
                      1487 => 
                      array (
                        'key' => 'WINGCRAFT',
                        'value' => 2562,
                      ),
                      1488 => 
                      array (
                        'key' => 'WIRE INSERTED RADIATOR HOSE',
                        'value' => 2563,
                      ),
                      1489 => 
                      array (
                        'key' => 'WOODMI SAWDUST',
                        'value' => 2564,
                      ),
                      1490 => 
                      array (
                        'key' => 'X-LIFE XCP3',
                        'value' => 2566,
                      ),
                      1491 => 
                      array (
                        'key' => 'X-LIFE XCP3S',
                        'value' => 2567,
                      ),
                      1492 => 
                      array (
                        'key' => 'X-LIFE XCP4',
                        'value' => 2568,
                      ),
                      1493 => 
                      array (
                        'key' => 'X-LIFE XCP4S',
                        'value' => 2569,
                      ),
                      1494 => 
                      array (
                        'key' => 'X-LIFE XCP5S',
                        'value' => 2570,
                      ),
                      1495 => 
                      array (
                        'key' => 'X-LIFE XCP6S',
                        'value' => 2571,
                      ),
                      1496 => 
                      array (
                        'key' => 'X-LIFE XR16SC',
                        'value' => 2572,
                      ),
                      1497 => 
                      array (
                        'key' => 'XF BLAST',
                        'value' => 2565,
                      ),
                      1498 => 
                      array (
                        'key' => 'XLPE CHEMICAL TRANSFER',
                        'value' => 2573,
                      ),
                      1499 => 
                      array (
                        'key' => 'XPOWER',
                        'value' => 2574,
                      ),
                      1500 => 
                      array (
                        'key' => 'XPOWER OILFIELD FRAC HW',
                        'value' => 1829105,
                      ),
                      1501 => 
                      array (
                        'key' => 'YARDMASTER ECO',
                        'value' => 3831420,
                      ),
                      1502 => 
                      array (
                        'key' => 'YARDMASTER GARDEN HOSE',
                        'value' => 2575,
                      ),
                      1503 => 
                      array (
                        'key' => 'YELLOW FLEXWING',
                        'value' => 2576,
                      ),
                      1504 => 
                      array (
                        'key' => 'YELLOW HORNET',
                        'value' => 7186050,
                      ),
                      1505 => 
                      array (
                        'key' => 'YUKON',
                        'value' => 2577,
                      ),
                      1506 => 
                      array (
                        'key' => 'YUKON BLUE',
                        'value' => 1829293,
                      ),
                      1507 => 
                      array (
                        'key' => 'YUKON SPIRAFLEX',
                        'value' => 2578,
                      ),
                      1508 => 
                      array (
                        'key' => 'ZZH561K-AA2',
                        'value' => 2579,
                      ),
                      1509 => 
                      array (
                        'key' => 'ZZH561K-BA2',
                        'value' => 2580,
                      ),
                      1510 => 
                      array (
                        'key' => 'ZZH601 3-2',
                        'value' => 2581,
                      ),
                    ),
                     'width' => '',
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'CatalogBundle\\OptionProvider\\BrandOptionsProvider',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'Brand',
                     'title' => 'Brand',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin:-42px 0px 10px 570px',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                    ),
                     'width' => '',
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'SkeletonProduct',
                     'title' => 'Skeleton Product',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'ABCT',
                        'value' => 1829868,
                      ),
                      1 => 
                      array (
                        'key' => 'ABPT',
                        'value' => 1829869,
                      ),
                      2 => 
                      array (
                        'key' => 'AC',
                        'value' => 1829865,
                      ),
                      3 => 
                      array (
                        'key' => 'AC2',
                        'value' => 5355085,
                      ),
                      4 => 
                      array (
                        'key' => 'AV',
                        'value' => 1829939,
                      ),
                      5 => 
                      array (
                        'key' => 'B1-DELETE',
                        'value' => 5354403,
                      ),
                      6 => 
                      array (
                        'key' => 'B2',
                        'value' => 1829854,
                      ),
                      7 => 
                      array (
                        'key' => 'B2SC',
                        'value' => 1830638,
                      ),
                      8 => 
                      array (
                        'key' => 'BP',
                        'value' => 1829870,
                      ),
                      9 => 
                      array (
                        'key' => 'BT',
                        'value' => 1829867,
                      ),
                      10 => 
                      array (
                        'key' => 'CB',
                        'value' => 1829941,
                      ),
                      11 => 
                      array (
                        'key' => 'CLIP',
                        'value' => 1829942,
                      ),
                      12 => 
                      array (
                        'key' => 'CLIP2',
                        'value' => 3833676,
                      ),
                      13 => 
                      array (
                        'key' => 'CLIPHLDR',
                        'value' => 1830382,
                      ),
                      14 => 
                      array (
                        'key' => 'COT',
                        'value' => 1829928,
                      ),
                      15 => 
                      array (
                        'key' => 'CT',
                        'value' => 1829871,
                      ),
                      16 => 
                      array (
                        'key' => 'DG',
                        'value' => 1829859,
                      ),
                      17 => 
                      array (
                        'key' => 'DGF1',
                        'value' => 1829891,
                      ),
                      18 => 
                      array (
                        'key' => 'DGF2',
                        'value' => 1829892,
                      ),
                      19 => 
                      array (
                        'key' => 'DH',
                        'value' => 1829872,
                      ),
                      20 => 
                      array (
                        'key' => 'DL',
                        'value' => 1829873,
                      ),
                      21 => 
                      array (
                        'key' => 'FG',
                        'value' => 1829861,
                      ),
                      22 => 
                      array (
                        'key' => 'FG2',
                        'value' => 1829893,
                      ),
                      23 => 
                      array (
                        'key' => 'FG5',
                        'value' => 1829894,
                      ),
                      24 => 
                      array (
                        'key' => 'FH',
                        'value' => 1830119,
                      ),
                      25 => 
                      array (
                        'key' => 'FL',
                        'value' => 1829874,
                      ),
                      26 => 
                      array (
                        'key' => 'FSL',
                        'value' => 1830388,
                      ),
                      27 => 
                      array (
                        'key' => 'FT',
                        'value' => 1830304,
                      ),
                      28 => 
                      array (
                        'key' => 'FTN',
                        'value' => 1829929,
                      ),
                      29 => 
                      array (
                        'key' => 'FTS',
                        'value' => 1829930,
                      ),
                      30 => 
                      array (
                        'key' => 'FTSM',
                        'value' => 1829931,
                      ),
                      31 => 
                      array (
                        'key' => 'GC',
                        'value' => 1829895,
                      ),
                      32 => 
                      array (
                        'key' => 'GG',
                        'value' => 1829863,
                      ),
                      33 => 
                      array (
                        'key' => 'HM',
                        'value' => 1829875,
                      ),
                      34 => 
                      array (
                        'key' => 'ILOT',
                        'value' => 1829932,
                      ),
                      35 => 
                      array (
                        'key' => 'JC',
                        'value' => 1829876,
                      ),
                      36 => 
                      array (
                        'key' => 'JS',
                        'value' => 1829877,
                      ),
                      37 => 
                      array (
                        'key' => 'KM',
                        'value' => 1829878,
                      ),
                      38 => 
                      array (
                        'key' => 'MC',
                        'value' => 1829879,
                      ),
                      39 => 
                      array (
                        'key' => 'MH',
                        'value' => 1829943,
                      ),
                      40 => 
                      array (
                        'key' => 'ML',
                        'value' => 1829880,
                      ),
                      41 => 
                      array (
                        'key' => 'MLL',
                        'value' => 1829944,
                      ),
                      42 => 
                      array (
                        'key' => 'MP',
                        'value' => 1829881,
                      ),
                      43 => 
                      array (
                        'key' => 'MS',
                        'value' => 1829882,
                      ),
                      44 => 
                      array (
                        'key' => 'NEEDS NOMENCLATURE ADDED',
                        'value' => 5356953,
                      ),
                      45 => 
                      array (
                        'key' => 'NP',
                        'value' => 1829883,
                      ),
                      46 => 
                      array (
                        'key' => 'NS',
                        'value' => 1829884,
                      ),
                      47 => 
                      array (
                        'key' => 'OB',
                        'value' => 1829885,
                      ),
                      48 => 
                      array (
                        'key' => 'OF',
                        'value' => 1829886,
                      ),
                      49 => 
                      array (
                        'key' => 'OI',
                        'value' => 1829933,
                      ),
                      50 => 
                      array (
                        'key' => 'OIM',
                        'value' => 1829936,
                      ),
                      51 => 
                      array (
                        'key' => 'OSWCH',
                        'value' => 1830419,
                      ),
                      52 => 
                      array (
                        'key' => 'OT',
                        'value' => 1829934,
                      ),
                      53 => 
                      array (
                        'key' => 'OTC',
                        'value' => 1829935,
                      ),
                      54 => 
                      array (
                        'key' => 'PB',
                        'value' => 1829887,
                      ),
                      55 => 
                      array (
                        'key' => 'PLIERS',
                        'value' => 1830438,
                      ),
                      56 => 
                      array (
                        'key' => 'PPT',
                        'value' => 1829888,
                      ),
                      57 => 
                      array (
                        'key' => 'R2',
                        'value' => 1829896,
                      ),
                      58 => 
                      array (
                        'key' => 'RA',
                        'value' => 1829897,
                      ),
                      59 => 
                      array (
                        'key' => 'S4',
                        'value' => 1829898,
                      ),
                      60 => 
                      array (
                        'key' => 'S6',
                        'value' => 1829857,
                      ),
                      61 => 
                      array (
                        'key' => 'SE',
                        'value' => 1829858,
                      ),
                      62 => 
                      array (
                        'key' => 'SF',
                        'value' => 1829864,
                      ),
                      63 => 
                      array (
                        'key' => 'SG',
                        'value' => 1829855,
                      ),
                      64 => 
                      array (
                        'key' => 'SH',
                        'value' => 1829899,
                      ),
                      65 => 
                      array (
                        'key' => 'SI',
                        'value' => 1829889,
                      ),
                      66 => 
                      array (
                        'key' => 'SRT',
                        'value' => 1829900,
                      ),
                      67 => 
                      array (
                        'key' => 'ST',
                        'value' => 1829890,
                      ),
                      68 => 
                      array (
                        'key' => 'SWCN',
                        'value' => 1829937,
                      ),
                      69 => 
                      array (
                        'key' => 'T7',
                        'value' => 1829866,
                      ),
                      70 => 
                      array (
                        'key' => 'T8',
                        'value' => 1829856,
                      ),
                      71 => 
                      array (
                        'key' => 'UC',
                        'value' => 1829860,
                      ),
                      72 => 
                      array (
                        'key' => 'UCF1',
                        'value' => 1829901,
                      ),
                      73 => 
                      array (
                        'key' => 'UCF10',
                        'value' => 1829902,
                      ),
                      74 => 
                      array (
                        'key' => 'UCF11',
                        'value' => 1829903,
                      ),
                      75 => 
                      array (
                        'key' => 'UCF2',
                        'value' => 1829904,
                      ),
                      76 => 
                      array (
                        'key' => 'UCF3',
                        'value' => 1829905,
                      ),
                      77 => 
                      array (
                        'key' => 'UCF4',
                        'value' => 1829906,
                      ),
                      78 => 
                      array (
                        'key' => 'UCF5',
                        'value' => 1829907,
                      ),
                      79 => 
                      array (
                        'key' => 'UCF6',
                        'value' => 1829908,
                      ),
                      80 => 
                      array (
                        'key' => 'UCF7',
                        'value' => 1829909,
                      ),
                      81 => 
                      array (
                        'key' => 'UCF8',
                        'value' => 1831134,
                      ),
                      82 => 
                      array (
                        'key' => 'UCF9',
                        'value' => 1829910,
                      ),
                      83 => 
                      array (
                        'key' => 'UCFB2',
                        'value' => 1829911,
                      ),
                      84 => 
                      array (
                        'key' => 'UCFSG',
                        'value' => 1829912,
                      ),
                      85 => 
                      array (
                        'key' => 'UCH',
                        'value' => 1829913,
                      ),
                      86 => 
                      array (
                        'key' => 'UCSC',
                        'value' => 1829914,
                      ),
                      87 => 
                      array (
                        'key' => 'UCSG',
                        'value' => 1829915,
                      ),
                      88 => 
                      array (
                        'key' => 'UT',
                        'value' => 1829862,
                      ),
                      89 => 
                      array (
                        'key' => 'VA',
                        'value' => 1829938,
                      ),
                      90 => 
                      array (
                        'key' => 'VCORE',
                        'value' => 1829940,
                      ),
                      91 => 
                      array (
                        'key' => 'XB2',
                        'value' => 1829916,
                      ),
                      92 => 
                      array (
                        'key' => 'XDG',
                        'value' => 1829917,
                      ),
                      93 => 
                      array (
                        'key' => 'XDG3',
                        'value' => 1829918,
                      ),
                      94 => 
                      array (
                        'key' => 'XDGF1',
                        'value' => 1829919,
                      ),
                      95 => 
                      array (
                        'key' => 'XDGF2',
                        'value' => 1829920,
                      ),
                      96 => 
                      array (
                        'key' => 'XDGF3',
                        'value' => 1829921,
                      ),
                      97 => 
                      array (
                        'key' => 'XS6',
                        'value' => 1829922,
                      ),
                      98 => 
                      array (
                        'key' => 'XS6C',
                        'value' => 1829923,
                      ),
                      99 => 
                      array (
                        'key' => 'XSC',
                        'value' => 1829924,
                      ),
                      100 => 
                      array (
                        'key' => 'XSG',
                        'value' => 1829925,
                      ),
                      101 => 
                      array (
                        'key' => 'XUC',
                        'value' => 1829926,
                      ),
                      102 => 
                      array (
                        'key' => 'XUCF',
                        'value' => 1829927,
                      ),
                    ),
                     'width' => '',
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                     'optionsProviderData' => 'FittingFamily|Name',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'FittingFamily',
                     'title' => ' Fitting Family',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin:-42px 0px 10px 570px',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                    ),
                     'width' => '',
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'SIOPLevel4',
                     'title' => 'SIOP Level 4',
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
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                 'fieldtype' => 'fieldset',
                 'labelWidth' => 100,
                 'name' => 'Headers',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Print Columns',
                 'width' => NULL,
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
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                 'fieldtype' => 'textarea',
                 'width' => '',
                 'height' => '',
                 'maxLength' => NULL,
                 'showCharCount' => false,
                 'excludeFromSearchIndex' => false,
                 'queryColumnType' => 'longtext',
                 'columnType' => 'longtext',
                 'phpdocType' => 'string',
                 'name' => 'Columns',
                 'title' => 'Columns',
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
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Data',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Data',
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
                 'cols' => '',
                 'colsFixed' => false,
                 'rows' => '',
                 'rowsFixed' => false,
                 'data' => '',
                 'columnConfigActivated' => false,
                 'columnConfig' => 
                array (
                ),
                 'queryColumnType' => 'longtext',
                 'columnType' => 'longtext',
                 'phpdocType' => 'array',
                 'name' => 'ProductsData',
                 'title' => 'Products Data',
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
                 'width' => '',
                 'height' => '',
                 'maxLength' => NULL,
                 'showCharCount' => false,
                 'excludeFromSearchIndex' => false,
                 'queryColumnType' => 'longtext',
                 'columnType' => 'longtext',
                 'phpdocType' => 'string',
                 'name' => 'headerData',
                 'title' => 'Header Data',
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
     'icon' => NULL,
  )),
   'icon' => '',
   'previewUrl' => '',
   'group' => '',
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
