<?php 

/** 
* Generated at: 2020-08-08T12:40:54+02:00
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
- FittingFamily [select]
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
   'modificationDate' => 1596883252,
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
             'icon' => '',
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
                     'locked' => NULL,
                     'style' => 'margin:-42px 0px 10px 570px',
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
                        'key' => 'A.R. THOMSON',
                        'value' => 1645,
                      ),
                      1 => 
                      array (
                        'key' => 'ABBOTT',
                        'value' => 1646,
                      ),
                      2 => 
                      array (
                        'key' => 'ABBOTT 1025 SERIES',
                        'value' => 1647,
                      ),
                      3 => 
                      array (
                        'key' => 'ABBOTT CHEM GROUT',
                        'value' => 1648,
                      ),
                      4 => 
                      array (
                        'key' => 'ABS BLAST',
                        'value' => 1649,
                      ),
                      5 => 
                      array (
                        'key' => 'ACCORD TANK CLEANING',
                        'value' => 1650,
                      ),
                      6 => 
                      array (
                        'key' => 'ACE BREWLINE',
                        'value' => 1651,
                      ),
                      7 => 
                      array (
                        'key' => 'ACE FOOD',
                        'value' => 1652,
                      ),
                      8 => 
                      array (
                        'key' => 'ACE FOOD DISCHARGE',
                        'value' => 1653,
                      ),
                      9 => 
                      array (
                        'key' => 'ACE GRAY FOOD',
                        'value' => 1654,
                      ),
                      10 => 
                      array (
                        'key' => 'ACE RCR FLEXRITE',
                        'value' => 1655,
                      ),
                      11 => 
                      array (
                        'key' => 'ACE RCT FLEXRITE',
                        'value' => 1656,
                      ),
                      12 => 
                      array (
                        'key' => 'ACE RDC FOOD',
                        'value' => 1657,
                      ),
                      13 => 
                      array (
                        'key' => 'ACE RSD FOOD',
                        'value' => 1658,
                      ),
                      14 => 
                      array (
                        'key' => 'AD SEALING HYDROCARBON DRAIN',
                        'value' => 1659,
                      ),
                      15 => 
                      array (
                        'key' => 'ADVANTAGE',
                        'value' => 1660,
                      ),
                      16 => 
                      array (
                        'key' => 'AEROPAL',
                        'value' => 1661,
                      ),
                      17 => 
                      array (
                        'key' => 'AG SPRAY',
                        'value' => 1662,
                      ),
                      18 => 
                      array (
                        'key' => 'AGCHEM',
                        'value' => 1663,
                      ),
                      19 => 
                      array (
                        'key' => 'AGCHEM S&D',
                        'value' => 1664,
                      ),
                      20 => 
                      array (
                        'key' => 'AGGIE GAS',
                        'value' => 1665,
                      ),
                      21 => 
                      array (
                        'key' => 'AGRI-FLEX',
                        'value' => 1666,
                      ),
                      22 => 
                      array (
                        'key' => 'AHR WATER S&D',
                        'value' => 1667,
                      ),
                      23 => 
                      array (
                        'key' => 'AIR 1000',
                        'value' => 1668,
                      ),
                      24 => 
                      array (
                        'key' => 'AIR 250',
                        'value' => 1669,
                      ),
                      25 => 
                      array (
                        'key' => 'AIR 300',
                        'value' => 1670,
                      ),
                      26 => 
                      array (
                        'key' => 'AIR 300 HD',
                        'value' => 1671,
                      ),
                      27 => 
                      array (
                        'key' => 'AIR 400',
                        'value' => 1672,
                      ),
                      28 => 
                      array (
                        'key' => 'AIR BREATHING HOSE',
                        'value' => 1673,
                      ),
                      29 => 
                      array (
                        'key' => 'AIR PSNS',
                        'value' => 1674,
                      ),
                      30 => 
                      array (
                        'key' => 'AIR PUMP GUNITE',
                        'value' => 1675,
                      ),
                      31 => 
                      array (
                        'key' => 'AIR TRIX',
                        'value' => 1676,
                      ),
                      32 => 
                      array (
                        'key' => 'AIR-A-PLANE GLYCOL',
                        'value' => 1677,
                      ),
                      33 => 
                      array (
                        'key' => 'AIR-WATER 400',
                        'value' => 1686,
                      ),
                      34 => 
                      array (
                        'key' => 'AIRCRAFT FUELING',
                        'value' => 1678,
                      ),
                      35 => 
                      array (
                        'key' => 'AIRGAS FRONTIER',
                        'value' => 1679,
                      ),
                      36 => 
                      array (
                        'key' => 'AIRGAS GRADE R',
                        'value' => 1680,
                      ),
                      37 => 
                      array (
                        'key' => 'AIRGAS GRADE RM',
                        'value' => 1681,
                      ),
                      38 => 
                      array (
                        'key' => 'AIRGAS GRADE T',
                        'value' => 1682,
                      ),
                      39 => 
                      array (
                        'key' => 'AIRMAX FLEXIMAX',
                        'value' => 1683,
                      ),
                      40 => 
                      array (
                        'key' => 'AIRMAX PROMAX',
                        'value' => 1684,
                      ),
                      41 => 
                      array (
                        'key' => 'AIRMAX SUPERMAX',
                        'value' => 1685,
                      ),
                      42 => 
                      array (
                        'key' => 'AJAX',
                        'value' => 1687,
                      ),
                      43 => 
                      array (
                        'key' => 'ALASKA RUBBER',
                        'value' => 1688,
                      ),
                      44 => 
                      array (
                        'key' => 'ALCAN MUD STACKING',
                        'value' => 1689,
                      ),
                      45 => 
                      array (
                        'key' => 'ALCOA POTROOM',
                        'value' => 1690,
                      ),
                      46 => 
                      array (
                        'key' => 'ALLCRETE TEXTILE',
                        'value' => 1691,
                      ),
                      47 => 
                      array (
                        'key' => 'ALLCRETE WIRE',
                        'value' => 1692,
                      ),
                      48 => 
                      array (
                        'key' => 'ALLENT GUNITE',
                        'value' => 1693,
                      ),
                      49 => 
                      array (
                        'key' => 'ALLENT REFRACTORY',
                        'value' => 1694,
                      ),
                      50 => 
                      array (
                        'key' => 'AMFLO 702-610',
                        'value' => 1695,
                      ),
                      51 => 
                      array (
                        'key' => 'AMMONIUM NITRATE BLAST',
                        'value' => 1696,
                      ),
                      52 => 
                      array (
                        'key' => 'AMMONIUM NITRATE HD',
                        'value' => 1697,
                      ),
                      53 => 
                      array (
                        'key' => 'AMMONIUM NITRATE PELLET',
                        'value' => 1698,
                      ),
                      54 => 
                      array (
                        'key' => 'APACHE',
                        'value' => 1699,
                      ),
                      55 => 
                      array (
                        'key' => 'APOLLO',
                        'value' => 1700,
                      ),
                      56 => 
                      array (
                        'key' => 'APOLLO FLEXDOCK',
                        'value' => 1701,
                      ),
                      57 => 
                      array (
                        'key' => 'APPLIED INDUSTRIAL TECH',
                        'value' => 1702,
                      ),
                      58 => 
                      array (
                        'key' => 'APPLIED JETTING',
                        'value' => 1703,
                      ),
                      59 => 
                      array (
                        'key' => 'AQUAHAMMER',
                        'value' => 1704,
                      ),
                      60 => 
                      array (
                        'key' => 'AQUAPAL',
                        'value' => 1705,
                      ),
                      61 => 
                      array (
                        'key' => 'AR THOMSON EXTREME CRIMP',
                        'value' => 1706,
                      ),
                      62 => 
                      array (
                        'key' => 'ARCAIR INSULATOR',
                        'value' => 1707,
                      ),
                      63 => 
                      array (
                        'key' => 'ARCHON',
                        'value' => 1708,
                      ),
                      64 => 
                      array (
                        'key' => 'ARCO BLAST XF',
                        'value' => 1709,
                      ),
                      65 => 
                      array (
                        'key' => 'ARCTIC EXTREMEFLEX',
                        'value' => 1710,
                      ),
                      66 => 
                      array (
                        'key' => 'ARCTIC FLEXTRA',
                        'value' => 1711,
                      ),
                      67 => 
                      array (
                        'key' => 'ARCTIC FLEXWING',
                        'value' => 1712,
                      ),
                      68 => 
                      array (
                        'key' => 'ARCTIC FUEL DISCHARGE',
                        'value' => 1713,
                      ),
                      69 => 
                      array (
                        'key' => 'ARCTIC LCP3',
                        'value' => 1714,
                      ),
                      70 => 
                      array (
                        'key' => 'ARCTIC LCP4S',
                        'value' => 1715,
                      ),
                      71 => 
                      array (
                        'key' => 'ARCTIC LCP6S',
                        'value' => 1716,
                      ),
                      72 => 
                      array (
                        'key' => 'ARCTIC LR16SC',
                        'value' => 1717,
                      ),
                      73 => 
                      array (
                        'key' => 'ARCTIC LR2SN',
                        'value' => 1718,
                      ),
                      74 => 
                      array (
                        'key' => 'ARCTIC ORTAC',
                        'value' => 1719,
                      ),
                      75 => 
                      array (
                        'key' => 'ARCTIC ORTAC PLUS',
                        'value' => 1720,
                      ),
                      76 => 
                      array (
                        'key' => 'ARCTIC RIG SUPPLY',
                        'value' => 1721,
                      ),
                      77 => 
                      array (
                        'key' => 'ARMOR-FLEX PRO',
                        'value' => 1728,
                      ),
                      78 => 
                      array (
                        'key' => 'ARMORCOAT ACP3',
                        'value' => 1722,
                      ),
                      79 => 
                      array (
                        'key' => 'ARMORCOAT ACP4',
                        'value' => 1723,
                      ),
                      80 => 
                      array (
                        'key' => 'ARMORCOAT ARC12',
                        'value' => 1724,
                      ),
                      81 => 
                      array (
                        'key' => 'ARMORCOAT ARC13',
                        'value' => 1725,
                      ),
                      82 => 
                      array (
                        'key' => 'ARMORCOAT ARC15',
                        'value' => 1726,
                      ),
                      83 => 
                      array (
                        'key' => 'ARMORCOAT ARC16SC',
                        'value' => 1727,
                      ),
                      84 => 
                      array (
                        'key' => 'ARONSON',
                        'value' => 1729,
                      ),
                      85 => 
                      array (
                        'key' => 'ARPHSE',
                        'value' => 1730,
                      ),
                      86 => 
                      array (
                        'key' => 'ARTRAC',
                        'value' => 1731,
                      ),
                      87 => 
                      array (
                        'key' => 'ARVAC SW',
                        'value' => 1732,
                      ),
                      88 => 
                      array (
                        'key' => 'AS1335 TWIN-LINE',
                        'value' => 1733,
                      ),
                      89 => 
                      array (
                        'key' => 'AS2435 TYPE 1 AIRBRAKE',
                        'value' => 1734,
                      ),
                      90 => 
                      array (
                        'key' => 'ASJ',
                        'value' => 1735,
                      ),
                      91 => 
                      array (
                        'key' => 'ASJ VERSACRETE',
                        'value' => 1736,
                      ),
                      92 => 
                      array (
                        'key' => 'ATLANT WATER',
                        'value' => 1737,
                      ),
                      93 => 
                      array (
                        'key' => 'ATLAS',
                        'value' => 1738,
                      ),
                      94 => 
                      array (
                        'key' => 'ATRUBB NR SPRAY',
                        'value' => 1739,
                      ),
                      95 => 
                      array (
                        'key' => 'AUGER ARC PILING',
                        'value' => 1740,
                      ),
                      96 => 
                      array (
                        'key' => 'AUSTIN',
                        'value' => 1741,
                      ),
                      97 => 
                      array (
                        'key' => 'AUSTIN RUBBER',
                        'value' => 1742,
                      ),
                      98 => 
                      array (
                        'key' => 'AUTOGRIP',
                        'value' => 1743,
                      ),
                      99 => 
                      array (
                        'key' => 'BAHCAL',
                        'value' => 1744,
                      ),
                      100 => 
                      array (
                        'key' => 'BANDING COIL',
                        'value' => 1745,
                      ),
                      101 => 
                      array (
                        'key' => 'BC COLD FLEX',
                        'value' => 1746,
                      ),
                      102 => 
                      array (
                        'key' => 'BC GASOLINE',
                        'value' => 1747,
                      ),
                      103 => 
                      array (
                        'key' => 'BC MARINA',
                        'value' => 1748,
                      ),
                      104 => 
                      array (
                        'key' => 'BEDFORD',
                        'value' => 1749,
                      ),
                      105 => 
                      array (
                        'key' => 'BLACK FLEXTRA II',
                        'value' => 1750,
                      ),
                      106 => 
                      array (
                        'key' => 'BLACK FLEXWING',
                        'value' => 1751,
                      ),
                      107 => 
                      array (
                        'key' => 'BLAST',
                        'value' => 1752,
                      ),
                      108 => 
                      array (
                        'key' => 'BLASTHOLE SLURRY & DEWATERING',
                        'value' => 1753,
                      ),
                      109 => 
                      array (
                        'key' => 'BLASTMASTER HD',
                        'value' => 1754,
                      ),
                      110 => 
                      array (
                        'key' => 'BLAUDIECK',
                        'value' => 1755,
                      ),
                      111 => 
                      array (
                        'key' => 'BLISSFUL FISHERMAN',
                        'value' => 1756,
                      ),
                      112 => 
                      array (
                        'key' => 'BLUCOR',
                        'value' => 1757,
                      ),
                      113 => 
                      array (
                        'key' => 'BLUCOR FLANGE',
                        'value' => 1758,
                      ),
                      114 => 
                      array (
                        'key' => 'BLUE FLEXWING',
                        'value' => 1759,
                      ),
                      115 => 
                      array (
                        'key' => 'BLUE FLOUR',
                        'value' => 1760,
                      ),
                      116 => 
                      array (
                        'key' => 'BLUE XTREME STRAIGH RAD HOSE',
                        'value' => 1761,
                      ),
                      117 => 
                      array (
                        'key' => 'BOOTMOR',
                        'value' => 1762,
                      ),
                      118 => 
                      array (
                        'key' => 'BOP SLEEVE',
                        'value' => 1763,
                      ),
                      119 => 
                      array (
                        'key' => 'BOP WRAP',
                        'value' => 1764,
                      ),
                      120 => 
                      array (
                        'key' => 'BOTTOM LOADING',
                        'value' => 1765,
                      ),
                      121 => 
                      array (
                        'key' => 'BR7',
                        'value' => 1766,
                      ),
                      122 => 
                      array (
                        'key' => 'BRAIDAIR',
                        'value' => 1767,
                      ),
                      123 => 
                      array (
                        'key' => 'BRANHAM CHEMONE SUPERIOR',
                        'value' => 1768,
                      ),
                      124 => 
                      array (
                        'key' => 'BREATHING AIR',
                        'value' => 1769,
                      ),
                      125 => 
                      array (
                        'key' => 'BREATHING AIR PLUS',
                        'value' => 1770,
                      ),
                      126 => 
                      array (
                        'key' => 'BRENNTAG',
                        'value' => 1771,
                      ),
                      127 => 
                      array (
                        'key' => 'BREWERS HOSE',
                        'value' => 1772,
                      ),
                      128 => 
                      array (
                        'key' => 'BREWLINE',
                        'value' => 1773,
                      ),
                      129 => 
                      array (
                        'key' => 'BRICK RED AIR',
                        'value' => 1774,
                      ),
                      130 => 
                      array (
                        'key' => 'BRIDGEPOINT',
                        'value' => 1775,
                      ),
                      131 => 
                      array (
                        'key' => 'BRIGADE MINE',
                        'value' => 1776,
                      ),
                      132 => 
                      array (
                        'key' => 'BRINE HOSE',
                        'value' => 1777,
                      ),
                      133 => 
                      array (
                        'key' => 'BROOM SWEEPER',
                        'value' => 1778,
                      ),
                      134 => 
                      array (
                        'key' => 'BROWN FLEXWING',
                        'value' => 1779,
                      ),
                      135 => 
                      array (
                        'key' => 'BUHLER MIAG',
                        'value' => 1780,
                      ),
                      136 => 
                      array (
                        'key' => 'BUTTERWORTH',
                        'value' => 1781,
                      ),
                      137 => 
                      array (
                        'key' => 'BUTYL 200',
                        'value' => 1782,
                      ),
                      138 => 
                      array (
                        'key' => 'C&J WATER S&D',
                        'value' => 1783,
                      ),
                      139 => 
                      array (
                        'key' => 'CABLE CONDUIT',
                        'value' => 1784,
                      ),
                      140 => 
                      array (
                        'key' => 'CABLE COOLING HOSE',
                        'value' => 1785,
                      ),
                      141 => 
                      array (
                        'key' => 'CABLE COVER',
                        'value' => 1786,
                      ),
                      142 => 
                      array (
                        'key' => 'CAMBRG HEALY PII',
                        'value' => 1787,
                      ),
                      143 => 
                      array (
                        'key' => 'CAMLOK',
                        'value' => 1788,
                      ),
                      144 => 
                      array (
                        'key' => 'CARON ARCTIC FLEX',
                        'value' => 1789,
                      ),
                      145 => 
                      array (
                        'key' => 'CARON BLACK SOFTWALL',
                        'value' => 1790,
                      ),
                      146 => 
                      array (
                        'key' => 'CARON FABCHEM',
                        'value' => 1791,
                      ),
                      147 => 
                      array (
                        'key' => 'CASCADE DRY CEMENT',
                        'value' => 1792,
                      ),
                      148 => 
                      array (
                        'key' => 'CENEX',
                        'value' => 1793,
                      ),
                      149 => 
                      array (
                        'key' => 'CENEX OT',
                        'value' => 1794,
                      ),
                      150 => 
                      array (
                        'key' => 'CENTRAL ROCK DRILL',
                        'value' => 1795,
                      ),
                      151 => 
                      array (
                        'key' => 'CHEMICAL ACID DISCHARGE',
                        'value' => 1796,
                      ),
                      152 => 
                      array (
                        'key' => 'CHEMONE',
                        'value' => 1797,
                      ),
                      153 => 
                      array (
                        'key' => 'CHEMSTREAM',
                        'value' => 1798,
                      ),
                      154 => 
                      array (
                        'key' => 'CHLO GARLOK',
                        'value' => 1799,
                      ),
                      155 => 
                      array (
                        'key' => 'CLEANJET',
                        'value' => 1800,
                      ),
                      156 => 
                      array (
                        'key' => 'CLEANJET FDA',
                        'value' => 1801,
                      ),
                      157 => 
                      array (
                        'key' => 'CLEAR PVC TUBING',
                        'value' => 1802,
                      ),
                      158 => 
                      array (
                        'key' => 'CLEARWATER',
                        'value' => 1803,
                      ),
                      159 => 
                      array (
                        'key' => 'CO2 HOSE',
                        'value' => 1804,
                      ),
                      160 => 
                      array (
                        'key' => 'COAST GUARD',
                        'value' => 1805,
                      ),
                      161 => 
                      array (
                        'key' => 'Code 61 Split Flange Clamp Kits',
                        'value' => 1694333,
                      ),
                      162 => 
                      array (
                        'key' => 'Code 62 Split Flange Clamp Kits',
                        'value' => 1694334,
                      ),
                      163 => 
                      array (
                        'key' => 'COLD BLUE',
                        'value' => 1806,
                      ),
                      164 => 
                      array (
                        'key' => 'COLLECTOR',
                        'value' => 1807,
                      ),
                      165 => 
                      array (
                        'key' => 'COLLECTOR FLEX',
                        'value' => 1808,
                      ),
                      166 => 
                      array (
                        'key' => 'COLORITE',
                        'value' => 1809,
                      ),
                      167 => 
                      array (
                        'key' => 'CON FORM SUPER FLEX',
                        'value' => 1810,
                      ),
                      168 => 
                      array (
                        'key' => 'CONAG WATER S&D',
                        'value' => 1811,
                      ),
                      169 => 
                      array (
                        'key' => 'CONCRETE G820',
                        'value' => 1812,
                      ),
                      170 => 
                      array (
                        'key' => 'CONCRETE VIBRATOR',
                        'value' => 1813,
                      ),
                      171 => 
                      array (
                        'key' => 'CONTI CHEM OIL',
                        'value' => 1814,
                      ),
                      172 => 
                      array (
                        'key' => 'CONTI CHEM PHARMA',
                        'value' => 1815,
                      ),
                      173 => 
                      array (
                        'key' => 'CONTI CHEM STANDARD',
                        'value' => 1816,
                      ),
                      174 => 
                      array (
                        'key' => 'CONTI CHEM SUPERIOR FEP',
                        'value' => 1817,
                      ),
                      175 => 
                      array (
                        'key' => 'CONTI PAINT SPRAY',
                        'value' => 1818,
                      ),
                      176 => 
                      array (
                        'key' => 'CONTI POTABLE WATER',
                        'value' => 1819,
                      ),
                      177 => 
                      array (
                        'key' => 'CONTI WASTE WATER',
                        'value' => 1820,
                      ),
                      178 => 
                      array (
                        'key' => 'CONTINENTAL STEEL STEAM 250',
                        'value' => 1821,
                      ),
                      179 => 
                      array (
                        'key' => 'CONTRACTOR 4001',
                        'value' => 1822,
                      ),
                      180 => 
                      array (
                        'key' => 'CONTRACTOR WATER S&D',
                        'value' => 1823,
                      ),
                      181 => 
                      array (
                        'key' => 'CONTRACTOR\'S WATER',
                        'value' => 1824,
                      ),
                      182 => 
                      array (
                        'key' => 'COOLING WATER',
                        'value' => 1825,
                      ),
                      183 => 
                      array (
                        'key' => 'COOLING WATER 2.0',
                        'value' => 1826,
                      ),
                      184 => 
                      array (
                        'key' => 'CPE DISCHARGE',
                        'value' => 1827,
                      ),
                      185 => 
                      array (
                        'key' => 'CREE BREWERS HOSE',
                        'value' => 1828,
                      ),
                      186 => 
                      array (
                        'key' => 'CULVERT',
                        'value' => 1829,
                      ),
                      187 => 
                      array (
                        'key' => 'DAMPF TRIX 5000',
                        'value' => 1830,
                      ),
                      188 => 
                      array (
                        'key' => 'DAMPF TRIX 6000',
                        'value' => 1831,
                      ),
                      189 => 
                      array (
                        'key' => 'DARCY REDWING FUEL OIL',
                        'value' => 1832,
                      ),
                      190 => 
                      array (
                        'key' => 'DEADMAN AIRCRAFT REFUELING',
                        'value' => 1833,
                      ),
                      191 => 
                      array (
                        'key' => 'DEADMAN SANDBLAST',
                        'value' => 1834,
                      ),
                      192 => 
                      array (
                        'key' => 'DEERE',
                        'value' => 1835,
                      ),
                      193 => 
                      array (
                        'key' => 'DEF DISPENSING',
                        'value' => 1836,
                      ),
                      194 => 
                      array (
                        'key' => 'DEF TRANSFER',
                        'value' => 1837,
                      ),
                      195 => 
                      array (
                        'key' => 'DEL TWIN-LINE GRADE R',
                        'value' => 1838,
                      ),
                      196 => 
                      array (
                        'key' => 'DEL TWIN-LINE GRADE RM',
                        'value' => 1839,
                      ),
                      197 => 
                      array (
                        'key' => 'DENVER',
                        'value' => 1840,
                      ),
                      198 => 
                      array (
                        'key' => 'DENVER CONC VIBR',
                        'value' => 1841,
                      ),
                      199 => 
                      array (
                        'key' => 'DESERT DR16SC',
                        'value' => 1842,
                      ),
                      200 => 
                      array (
                        'key' => 'DESERT DR1SN',
                        'value' => 1843,
                      ),
                      201 => 
                      array (
                        'key' => 'DESERT DR2SN',
                        'value' => 1844,
                      ),
                      202 => 
                      array (
                        'key' => 'DESERT DR5',
                        'value' => 1845,
                      ),
                      203 => 
                      array (
                        'key' => 'DESERT DUT',
                        'value' => 1846,
                      ),
                      204 => 
                      array (
                        'key' => 'DEWATERING',
                        'value' => 1847,
                      ),
                      205 => 
                      array (
                        'key' => 'DIESEL OIL HARDWALL',
                        'value' => 1848,
                      ),
                      206 => 
                      array (
                        'key' => 'DIESEL OIL SOFTWALL',
                        'value' => 1849,
                      ),
                      207 => 
                      array (
                        'key' => 'DIGESTER',
                        'value' => 1850,
                      ),
                      208 => 
                      array (
                        'key' => 'DIISOCYANATE',
                        'value' => 1851,
                      ),
                      209 => 
                      array (
                        'key' => 'DINGA HOT WATER GUN',
                        'value' => 1852,
                      ),
                      210 => 
                      array (
                        'key' => 'DISCHARGE',
                        'value' => 1853,
                      ),
                      211 => 
                      array (
                        'key' => 'DISHWASHER DRAIN',
                        'value' => 1854,
                      ),
                      212 => 
                      array (
                        'key' => 'DISTILLERY 150',
                        'value' => 1855,
                      ),
                      213 => 
                      array (
                        'key' => 'DISTRB ACID',
                        'value' => 1856,
                      ),
                      214 => 
                      array (
                        'key' => 'DISTRB ARCTIC ORTAC',
                        'value' => 1857,
                      ),
                      215 => 
                      array (
                        'key' => 'DISTRB STEEL AIR',
                        'value' => 1858,
                      ),
                      216 => 
                      array (
                        'key' => 'DISTRB WATER S&D',
                        'value' => 1859,
                      ),
                      217 => 
                      array (
                        'key' => 'DIVERSIFLEX',
                        'value' => 1860,
                      ),
                      218 => 
                      array (
                        'key' => 'DIVERSIPIPE',
                        'value' => 1861,
                      ),
                      219 => 
                      array (
                        'key' => 'DIVING HOSE',
                        'value' => 1862,
                      ),
                      220 => 
                      array (
                        'key' => 'DMC CAUSTIC',
                        'value' => 1863,
                      ),
                      221 => 
                      array (
                        'key' => 'DOCK',
                        'value' => 1864,
                      ),
                      222 => 
                      array (
                        'key' => 'DOCK EN1765 L15',
                        'value' => 1865,
                      ),
                      223 => 
                      array (
                        'key' => 'DOCK EN1765 S15',
                        'value' => 1866,
                      ),
                      224 => 
                      array (
                        'key' => 'DOCK FDA',
                        'value' => 1867,
                      ),
                      225 => 
                      array (
                        'key' => 'DOCK SMOOTH BORE HOT SULFUR',
                        'value' => 1868,
                      ),
                      226 => 
                      array (
                        'key' => 'DOCK SUPPLY SW',
                        'value' => 1869,
                      ),
                      227 => 
                      array (
                        'key' => 'DREDGE SLEEVE',
                        'value' => 1870,
                      ),
                      228 => 
                      array (
                        'key' => 'DRILL WATER',
                        'value' => 1871,
                      ),
                      229 => 
                      array (
                        'key' => 'DRINKLINE',
                        'value' => 1872,
                      ),
                      230 => 
                      array (
                        'key' => 'DRY CEMENT HD HARDWALL',
                        'value' => 1873,
                      ),
                      231 => 
                      array (
                        'key' => 'DRY CEMENT SOFTWALL',
                        'value' => 1874,
                      ),
                      232 => 
                      array (
                        'key' => 'DRY ICE HOSE',
                        'value' => 1875,
                      ),
                      233 => 
                      array (
                        'key' => 'DUDLEY WATER',
                        'value' => 1876,
                      ),
                      234 => 
                      array (
                        'key' => 'DUNLOP BOOSTER',
                        'value' => 1877,
                      ),
                      235 => 
                      array (
                        'key' => 'DURACO',
                        'value' => 1878,
                      ),
                      236 => 
                      array (
                        'key' => 'DURACO ROADPATCH',
                        'value' => 1879,
                      ),
                      237 => 
                      array (
                        'key' => 'DYNACRAFT',
                        'value' => 1880,
                      ),
                      238 => 
                      array (
                        'key' => 'DYNO',
                        'value' => 1881,
                      ),
                      239 => 
                      array (
                        'key' => 'DYNO HOSE',
                        'value' => 1882,
                      ),
                      240 => 
                      array (
                        'key' => 'E 1-1',
                        'value' => 1883,
                      ),
                      241 => 
                      array (
                        'key' => 'E 3-1',
                        'value' => 1884,
                      ),
                      242 => 
                      array (
                        'key' => 'E 3-2',
                        'value' => 1885,
                      ),
                      243 => 
                      array (
                        'key' => 'EAGLE AIR & WATER',
                        'value' => 1886,
                      ),
                      244 => 
                      array (
                        'key' => 'EHLYNN',
                        'value' => 1887,
                      ),
                      245 => 
                      array (
                        'key' => 'EHLYNN FLOUR TEC',
                        'value' => 1888,
                      ),
                      246 => 
                      array (
                        'key' => 'EHLYNN FOOD DISCHARGE',
                        'value' => 1889,
                      ),
                      247 => 
                      array (
                        'key' => 'EHLYNN HOT AIR',
                        'value' => 1890,
                      ),
                      248 => 
                      array (
                        'key' => 'EHLYNN PIPE CONNECTOR',
                        'value' => 1891,
                      ),
                      249 => 
                      array (
                        'key' => 'EHLYNN TPG',
                        'value' => 1892,
                      ),
                      250 => 
                      array (
                        'key' => 'ELAFLEX LAY FLAT',
                        'value' => 1893,
                      ),
                      251 => 
                      array (
                        'key' => 'ELITE STANDARD RADIATOR',
                        'value' => 1894,
                      ),
                      252 => 
                      array (
                        'key' => 'ELITE SW MARINE WET EXHAUST',
                        'value' => 1895,
                      ),
                      253 => 
                      array (
                        'key' => 'EN12115 PETROLEUM',
                        'value' => 1896,
                      ),
                      254 => 
                      array (
                        'key' => 'EPDM 200',
                        'value' => 1897,
                      ),
                      255 => 
                      array (
                        'key' => 'EPDM 200 (ECONOMY)',
                        'value' => 1898,
                      ),
                      256 => 
                      array (
                        'key' => 'EPDM 200 (NON CON)',
                        'value' => 1899,
                      ),
                      257 => 
                      array (
                        'key' => 'EPDM ACID',
                        'value' => 1900,
                      ),
                      258 => 
                      array (
                        'key' => 'EPDM DISCHARGE',
                        'value' => 1901,
                      ),
                      259 => 
                      array (
                        'key' => 'EPDM S&D',
                        'value' => 1902,
                      ),
                      260 => 
                      array (
                        'key' => 'EPDM SD HD WATER',
                        'value' => 1903,
                      ),
                      261 => 
                      array (
                        'key' => 'EPDM SD WATER',
                        'value' => 1904,
                      ),
                      262 => 
                      array (
                        'key' => 'ERGON',
                        'value' => 1905,
                      ),
                      263 => 
                      array (
                        'key' => 'ERIKS',
                        'value' => 1906,
                      ),
                      264 => 
                      array (
                        'key' => 'EURO TRIX',
                        'value' => 1907,
                      ),
                      265 => 
                      array (
                        'key' => 'EXIMCO',
                        'value' => 1908,
                      ),
                      266 => 
                      array (
                        'key' => 'EXON GP DOCK',
                        'value' => 1909,
                      ),
                      267 => 
                      array (
                        'key' => 'EXPRESS BLOWER',
                        'value' => 1910,
                      ),
                      268 => 
                      array (
                        'key' => 'EXSTATIC',
                        'value' => 1911,
                      ),
                      269 => 
                      array (
                        'key' => 'EXTREMEBLAST LOAD',
                        'value' => 1912,
                      ),
                      270 => 
                      array (
                        'key' => 'EXTREMEFLEX BEVERAGE',
                        'value' => 1913,
                      ),
                      271 => 
                      array (
                        'key' => 'EXTREMEFLEX CHEMICAL BROWN',
                        'value' => 1914,
                      ),
                      272 => 
                      array (
                        'key' => 'EXTREMEFLEX CHEMICAL PURPLE',
                        'value' => 1915,
                      ),
                      273 => 
                      array (
                        'key' => 'EXTREMEFLEX FOOD BLUE',
                        'value' => 1916,
                      ),
                      274 => 
                      array (
                        'key' => 'EXTREMEFLEX FOOD GRAY',
                        'value' => 1917,
                      ),
                      275 => 
                      array (
                        'key' => 'EXTREMEFLEX PETROLEUM',
                        'value' => 1918,
                      ),
                      276 => 
                      array (
                        'key' => 'EXTREMEFLEX POTABLE WATER',
                        'value' => 1919,
                      ),
                      277 => 
                      array (
                        'key' => 'EXTREMEFLEX VERSIFLO',
                        'value' => 1920,
                      ),
                      278 => 
                      array (
                        'key' => 'EXTREMEFLEX WATER SLURRY',
                        'value' => 1921,
                      ),
                      279 => 
                      array (
                        'key' => 'EZ GLIDE WINE',
                        'value' => 1922,
                      ),
                      280 => 
                      array (
                        'key' => 'F5 AIR',
                        'value' => 1923,
                      ),
                      281 => 
                      array (
                        'key' => 'FABCHEM',
                        'value' => 1924,
                      ),
                      282 => 
                      array (
                        'key' => 'FABCHEM ARC',
                        'value' => 1925,
                      ),
                      283 => 
                      array (
                        'key' => 'FABCHEM EN12115',
                        'value' => 1926,
                      ),
                      284 => 
                      array (
                        'key' => 'FABCHEM-C',
                        'value' => 1927,
                      ),
                      285 => 
                      array (
                        'key' => 'FIBERG CRUCIBLE GASK',
                        'value' => 1928,
                      ),
                      286 => 
                      array (
                        'key' => 'FINISHING BRANDS',
                        'value' => 1929,
                      ),
                      287 => 
                      array (
                        'key' => 'FIRE ENGINE BOOSTER',
                        'value' => 1930,
                      ),
                      288 => 
                      array (
                        'key' => 'FIRE ENGINE SUCTION',
                        'value' => 1931,
                      ),
                      289 => 
                      array (
                        'key' => 'FIRE ENGINER BOOSTER',
                        'value' => 1932,
                      ),
                      290 => 
                      array (
                        'key' => 'FISH HOSE',
                        'value' => 1933,
                      ),
                      291 => 
                      array (
                        'key' => 'FISH TRANSFER',
                        'value' => 1934,
                      ),
                      292 => 
                      array (
                        'key' => 'FLDCON',
                        'value' => 1935,
                      ),
                      293 => 
                      array (
                        'key' => 'FLEX-ING FLEX AQUA WATER S&D',
                        'value' => 1943,
                      ),
                      294 => 
                      array (
                        'key' => 'FLEX-ING FLEX-ON',
                        'value' => 1944,
                      ),
                      295 => 
                      array (
                        'key' => 'FLEX-PULSE FPII',
                        'value' => 1946,
                      ),
                      296 => 
                      array (
                        'key' => 'FLEXAGRIP',
                        'value' => 1936,
                      ),
                      297 => 
                      array (
                        'key' => 'FLEXCHEM 225',
                        'value' => 1937,
                      ),
                      298 => 
                      array (
                        'key' => 'FLEXDOCK',
                        'value' => 1938,
                      ),
                      299 => 
                      array (
                        'key' => 'FLEXDOCK VERSAFUEL',
                        'value' => 1939,
                      ),
                      300 => 
                      array (
                        'key' => 'FLEXIBLE DOWNSPOUT',
                        'value' => 1940,
                      ),
                      301 => 
                      array (
                        'key' => 'FLEXIBLE TEFLON',
                        'value' => 1941,
                      ),
                      302 => 
                      array (
                        'key' => 'FLEXICORE',
                        'value' => 1942,
                      ),
                      303 => 
                      array (
                        'key' => 'FLEXJET',
                        'value' => 1945,
                      ),
                      304 => 
                      array (
                        'key' => 'FLEXRITE',
                        'value' => 1947,
                      ),
                      305 => 
                      array (
                        'key' => 'FLEXSHIELD SAE J1527 TYPE A1-15',
                        'value' => 1948,
                      ),
                      306 => 
                      array (
                        'key' => 'FLEXSTEEL 250 CB EXTREME CRIMP',
                        'value' => 1949,
                      ),
                      307 => 
                      array (
                        'key' => 'FLEXSTEEL 250 CB STEAM',
                        'value' => 1950,
                      ),
                      308 => 
                      array (
                        'key' => 'FLEXSTEEL 250 EPDM-20',
                        'value' => 1951,
                      ),
                      309 => 
                      array (
                        'key' => 'FLEXSTEEL 250 ORS STEAM',
                        'value' => 1952,
                      ),
                      310 => 
                      array (
                        'key' => 'FLEXSTEEL 250 STEAM',
                        'value' => 1953,
                      ),
                      311 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA',
                        'value' => 1954,
                      ),
                      312 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA B20',
                        'value' => 1955,
                      ),
                      313 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA E25',
                        'value' => 1956,
                      ),
                      314 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA ETHAN-ALL',
                        'value' => 1957,
                      ),
                      315 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA HVR',
                        'value' => 1958,
                      ),
                      316 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA HVR LOW PERM',
                        'value' => 1959,
                      ),
                      317 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA LOW PERM',
                        'value' => 1960,
                      ),
                      318 => 
                      array (
                        'key' => 'FLEXSTEEL FUTURA VAPOR ASSIST',
                        'value' => 1961,
                      ),
                      319 => 
                      array (
                        'key' => 'FLEXSTEEL MINE SPRAY',
                        'value' => 1962,
                      ),
                      320 => 
                      array (
                        'key' => 'FLEXSTEEL MINESPRAY',
                        'value' => 1963,
                      ),
                      321 => 
                      array (
                        'key' => 'FLEXSTEEL SERVICE STATION AIR',
                        'value' => 1964,
                      ),
                      322 => 
                      array (
                        'key' => 'FLEXTRA DRY MATERIAL',
                        'value' => 1965,
                      ),
                      323 => 
                      array (
                        'key' => 'FLEXTRA LT',
                        'value' => 1966,
                      ),
                      324 => 
                      array (
                        'key' => 'FLEXTRA OILFIELD',
                        'value' => 1967,
                      ),
                      325 => 
                      array (
                        'key' => 'FLEXTRA ROCK DUST',
                        'value' => 1968,
                      ),
                      326 => 
                      array (
                        'key' => 'FLEXWAC',
                        'value' => 1969,
                      ),
                      327 => 
                      array (
                        'key' => 'FLEXWING FOOD BLUE',
                        'value' => 1970,
                      ),
                      328 => 
                      array (
                        'key' => 'FLEXWING OILFIELD',
                        'value' => 1971,
                      ),
                      329 => 
                      array (
                        'key' => 'FLEXWING PETROLEUM',
                        'value' => 1972,
                      ),
                      330 => 
                      array (
                        'key' => 'FLEXWING VERSAFUEL',
                        'value' => 1973,
                      ),
                      331 => 
                      array (
                        'key' => 'FLEXWING WATER S&D',
                        'value' => 1974,
                      ),
                      332 => 
                      array (
                        'key' => 'FLOATER',
                        'value' => 1975,
                      ),
                      333 => 
                      array (
                        'key' => 'FLOATING HOSES',
                        'value' => 1976,
                      ),
                      334 => 
                      array (
                        'key' => 'FLOUR DISCHARGE',
                        'value' => 1977,
                      ),
                      335 => 
                      array (
                        'key' => 'FLUOROPAL',
                        'value' => 1978,
                      ),
                      336 => 
                      array (
                        'key' => 'FOAM',
                        'value' => 1979,
                      ),
                      337 => 
                      array (
                        'key' => 'FOOD 2720',
                        'value' => 1980,
                      ),
                      338 => 
                      array (
                        'key' => 'FOOD DISCHARGE',
                        'value' => 1981,
                      ),
                      339 => 
                      array (
                        'key' => 'FOOD FLEX',
                        'value' => 1982,
                      ),
                      340 => 
                      array (
                        'key' => 'FOOD SUCTION & DISCHARGE',
                        'value' => 1983,
                      ),
                      341 => 
                      array (
                        'key' => 'FOODCLEAN',
                        'value' => 1984,
                      ),
                      342 => 
                      array (
                        'key' => 'FOODLINER',
                        'value' => 1985,
                      ),
                      343 => 
                      array (
                        'key' => 'FORECAST BLAST',
                        'value' => 1986,
                      ),
                      344 => 
                      array (
                        'key' => 'FORECAST BLAST XF',
                        'value' => 1987,
                      ),
                      345 => 
                      array (
                        'key' => 'FORECAST SUCTION',
                        'value' => 1988,
                      ),
                      346 => 
                      array (
                        'key' => 'FORESTRY',
                        'value' => 1989,
                      ),
                      347 => 
                      array (
                        'key' => 'FORMADRAIN INFLATABLE HOSE',
                        'value' => 1990,
                      ),
                      348 => 
                      array (
                        'key' => 'FORTRESS',
                        'value' => 1991,
                      ),
                      349 => 
                      array (
                        'key' => 'FOSTER',
                        'value' => 1992,
                      ),
                      350 => 
                      array (
                        'key' => 'FRAC',
                        'value' => 1993,
                      ),
                      351 => 
                      array (
                        'key' => 'FRAC ACID S&D',
                        'value' => 1994,
                      ),
                      352 => 
                      array (
                        'key' => 'FRAC BLENDING S&D',
                        'value' => 1995,
                      ),
                      353 => 
                      array (
                        'key' => 'FRACO',
                        'value' => 1996,
                      ),
                      354 => 
                      array (
                        'key' => 'FREON CHARGING',
                        'value' => 1997,
                      ),
                      355 => 
                      array (
                        'key' => 'FRIG SEA',
                        'value' => 1998,
                      ),
                      356 => 
                      array (
                        'key' => 'FRONTIER',
                        'value' => 1999,
                      ),
                      357 => 
                      array (
                        'key' => 'FUEL DISCHARGE',
                        'value' => 2000,
                      ),
                      358 => 
                      array (
                        'key' => 'FUEL DISCHARGE HD',
                        'value' => 2001,
                      ),
                      359 => 
                      array (
                        'key' => 'FUEL FILL SAE J1527 TYPE A2',
                        'value' => 2002,
                      ),
                      360 => 
                      array (
                        'key' => 'FUEL RIG SW',
                        'value' => 2003,
                      ),
                      361 => 
                      array (
                        'key' => 'FUELGRIP COUPLING',
                        'value' => 2004,
                      ),
                      362 => 
                      array (
                        'key' => 'FUGGITT',
                        'value' => 2005,
                      ),
                      363 => 
                      array (
                        'key' => 'FUJI',
                        'value' => 2006,
                      ),
                      364 => 
                      array (
                        'key' => 'FURNACE DOOR',
                        'value' => 2007,
                      ),
                      365 => 
                      array (
                        'key' => 'FUTURA O-RING KIT',
                        'value' => 2008,
                      ),
                      366 => 
                      array (
                        'key' => 'FUTURA RET RING INST. TOOL',
                        'value' => 2009,
                      ),
                      367 => 
                      array (
                        'key' => 'GALAXY G4826',
                        'value' => 2010,
                      ),
                      368 => 
                      array (
                        'key' => 'GALAXY G4867',
                        'value' => 2011,
                      ),
                      369 => 
                      array (
                        'key' => 'GALAXY G4890',
                        'value' => 2012,
                      ),
                      370 => 
                      array (
                        'key' => 'GALVANATOR',
                        'value' => 2013,
                      ),
                      371 => 
                      array (
                        'key' => 'GAMMON',
                        'value' => 2014,
                      ),
                      372 => 
                      array (
                        'key' => 'GAUNTLET',
                        'value' => 2015,
                      ),
                      373 => 
                      array (
                        'key' => 'GENERIC',
                        'value' => 2016,
                      ),
                      374 => 
                      array (
                        'key' => 'GENERIC LOW TEMP TANK TRUCK',
                        'value' => 2017,
                      ),
                      375 => 
                      array (
                        'key' => 'GENERIC PLASTER & GROUT',
                        'value' => 2018,
                      ),
                      376 => 
                      array (
                        'key' => 'GENERIC VACUUM',
                        'value' => 2019,
                      ),
                      377 => 
                      array (
                        'key' => 'GENERIC WATER DISCHARGE',
                        'value' => 2020,
                      ),
                      378 => 
                      array (
                        'key' => 'GENERIC WATER S&D',
                        'value' => 2021,
                      ),
                      379 => 
                      array (
                        'key' => 'GENLINE',
                        'value' => 2022,
                      ),
                      380 => 
                      array (
                        'key' => 'GENLINE GL',
                        'value' => 2023,
                      ),
                      381 => 
                      array (
                        'key' => 'GENLINE GL-802',
                        'value' => 2024,
                      ),
                      382 => 
                      array (
                        'key' => 'GENLINE GL-803',
                        'value' => 2025,
                      ),
                      383 => 
                      array (
                        'key' => 'GHX',
                        'value' => 2026,
                      ),
                      384 => 
                      array (
                        'key' => 'GILBARCO',
                        'value' => 2027,
                      ),
                      385 => 
                      array (
                        'key' => 'GLOBAL',
                        'value' => 2028,
                      ),
                      386 => 
                      array (
                        'key' => 'GNSPEC',
                        'value' => 2029,
                      ),
                      387 => 
                      array (
                        'key' => 'GNSPEC 100R12',
                        'value' => 2030,
                      ),
                      388 => 
                      array (
                        'key' => 'GNSPEC 100R16',
                        'value' => 2031,
                      ),
                      389 => 
                      array (
                        'key' => 'GNSPEC 100R2',
                        'value' => 2032,
                      ),
                      390 => 
                      array (
                        'key' => 'GNSPEC 100R6',
                        'value' => 2033,
                      ),
                      391 => 
                      array (
                        'key' => 'GNSPEC 200 AIR',
                        'value' => 2034,
                      ),
                      392 => 
                      array (
                        'key' => 'GNSPEC 250 AIR',
                        'value' => 2035,
                      ),
                      393 => 
                      array (
                        'key' => 'GNSPEC 300 AIR',
                        'value' => 2036,
                      ),
                      394 => 
                      array (
                        'key' => 'GNSPEC 4001 PRESSURE WASHER',
                        'value' => 2037,
                      ),
                      395 => 
                      array (
                        'key' => 'GNSPEC 4500 PRESSURE WASHER',
                        'value' => 2038,
                      ),
                      396 => 
                      array (
                        'key' => 'GNSPEC NR SPRAY',
                        'value' => 2039,
                      ),
                      397 => 
                      array (
                        'key' => 'GNSPEC PUSH ON 250',
                        'value' => 2040,
                      ),
                      398 => 
                      array (
                        'key' => 'GOLD SNAKE',
                        'value' => 2041,
                      ),
                      399 => 
                      array (
                        'key' => 'GOOD FLEX',
                        'value' => 2042,
                      ),
                      400 => 
                      array (
                        'key' => 'GOODALL',
                        'value' => 2043,
                      ),
                      401 => 
                      array (
                        'key' => 'GORILLA',
                        'value' => 2044,
                      ),
                      402 => 
                      array (
                        'key' => 'GRACO',
                        'value' => 2045,
                      ),
                      403 => 
                      array (
                        'key' => 'GRAINGER',
                        'value' => 2046,
                      ),
                      404 => 
                      array (
                        'key' => 'GRAY FLEXTRA LT',
                        'value' => 2047,
                      ),
                      405 => 
                      array (
                        'key' => 'GRAY FLEXWING',
                        'value' => 2048,
                      ),
                      406 => 
                      array (
                        'key' => 'GRAY FOOD',
                        'value' => 2049,
                      ),
                      407 => 
                      array (
                        'key' => 'GRAY SUCTION',
                        'value' => 2050,
                      ),
                      408 => 
                      array (
                        'key' => 'GREASE GUN HOSE',
                        'value' => 2051,
                      ),
                      409 => 
                      array (
                        'key' => 'GREAT NECK',
                        'value' => 2052,
                      ),
                      410 => 
                      array (
                        'key' => 'GREAT PLAINS',
                        'value' => 2053,
                      ),
                      411 => 
                      array (
                        'key' => 'GREEN HORNET XF',
                        'value' => 2054,
                      ),
                      412 => 
                      array (
                        'key' => 'GUNITE',
                        'value' => 2055,
                      ),
                      413 => 
                      array (
                        'key' => 'HAMILTON BLAST',
                        'value' => 2056,
                      ),
                      414 => 
                      array (
                        'key' => 'HAMILTON HYDROCARBON DRAIN',
                        'value' => 2057,
                      ),
                      415 => 
                      array (
                        'key' => 'HANLIO TWIN-LINE GRADE R',
                        'value' => 2058,
                      ),
                      416 => 
                      array (
                        'key' => 'HART',
                        'value' => 2059,
                      ),
                      417 => 
                      array (
                        'key' => 'HART BLACK SOFTWALL',
                        'value' => 2060,
                      ),
                      418 => 
                      array (
                        'key' => 'HART FABCHEM',
                        'value' => 2061,
                      ),
                      419 => 
                      array (
                        'key' => 'HART FLOUR DISCHARGE',
                        'value' => 2062,
                      ),
                      420 => 
                      array (
                        'key' => 'HART HOT AIR',
                        'value' => 2063,
                      ),
                      421 => 
                      array (
                        'key' => 'HARVEST',
                        'value' => 2064,
                      ),
                      422 => 
                      array (
                        'key' => 'HD AIR',
                        'value' => 2065,
                      ),
                      423 => 
                      array (
                        'key' => 'HD AIR & WATER',
                        'value' => 2066,
                      ),
                      424 => 
                      array (
                        'key' => 'HD INDUSTRIAL VACUUM',
                        'value' => 2067,
                      ),
                      425 => 
                      array (
                        'key' => 'HD PETRO TRANSFER',
                        'value' => 2068,
                      ),
                      426 => 
                      array (
                        'key' => 'HD VACUUM',
                        'value' => 2069,
                      ),
                      427 => 
                      array (
                        'key' => 'HD WATER DISCHARGE',
                        'value' => 2070,
                      ),
                      428 => 
                      array (
                        'key' => 'HD WATER SD',
                        'value' => 2071,
                      ),
                      429 => 
                      array (
                        'key' => 'HEATER HOSE 20R3D2',
                        'value' => 2072,
                      ),
                      430 => 
                      array (
                        'key' => 'HEATER WATER',
                        'value' => 2073,
                      ),
                      431 => 
                      array (
                        'key' => 'HEAVY DUTY STEAM PILE DRIVER',
                        'value' => 2074,
                      ),
                      432 => 
                      array (
                        'key' => 'HEWITT',
                        'value' => 2075,
                      ),
                      433 => 
                      array (
                        'key' => 'HEWITT AIRCRAFT',
                        'value' => 2076,
                      ),
                      434 => 
                      array (
                        'key' => 'HI-MINER II',
                        'value' => 2077,
                      ),
                      435 => 
                      array (
                        'key' => 'HI-PER',
                        'value' => 2078,
                      ),
                      436 => 
                      array (
                        'key' => 'HIPER WATER',
                        'value' => 2079,
                      ),
                      437 => 
                      array (
                        'key' => 'HOOSIER FOOD TL',
                        'value' => 2080,
                      ),
                      438 => 
                      array (
                        'key' => 'HOSCO',
                        'value' => 2081,
                      ),
                      439 => 
                      array (
                        'key' => 'HOSE POWER',
                        'value' => 2082,
                      ),
                      440 => 
                      array (
                        'key' => 'Hose Routing Clamps',
                        'value' => 1694291,
                      ),
                      441 => 
                      array (
                        'key' => 'HOSEPOWER',
                        'value' => 2083,
                      ),
                      442 => 
                      array (
                        'key' => 'HOT TAR & ASPHALT EN13482',
                        'value' => 2084,
                      ),
                      443 => 
                      array (
                        'key' => 'HOT TAR & ASPHALT ROUGH BORE',
                        'value' => 2085,
                      ),
                      444 => 
                      array (
                        'key' => 'HOT WATER ELITE',
                        'value' => 2086,
                      ),
                      445 => 
                      array (
                        'key' => 'HR4',
                        'value' => 2087,
                      ),
                      446 => 
                      array (
                        'key' => 'HR6',
                        'value' => 2088,
                      ),
                      447 => 
                      array (
                        'key' => 'HUDSON',
                        'value' => 2089,
                      ),
                      448 => 
                      array (
                        'key' => 'HUMIDIFIER HOSE',
                        'value' => 2090,
                      ),
                      449 => 
                      array (
                        'key' => 'HUSKY',
                        'value' => 2091,
                      ),
                      450 => 
                      array (
                        'key' => 'HVLP NON-CONDUCTIVE',
                        'value' => 2092,
                      ),
                      451 => 
                      array (
                        'key' => 'HW DRY CEMENT & BARITES',
                        'value' => 2093,
                      ),
                      452 => 
                      array (
                        'key' => 'HYDROCARBON DRAIN',
                        'value' => 2094,
                      ),
                      453 => 
                      array (
                        'key' => 'HYDROVATOR',
                        'value' => 2095,
                      ),
                      454 => 
                      array (
                        'key' => 'HYDROVATOR PLUS',
                        'value' => 2096,
                      ),
                      455 => 
                      array (
                        'key' => 'I.R.F.',
                        'value' => 2097,
                      ),
                      456 => 
                      array (
                        'key' => 'IBM COOLING WATER',
                        'value' => 2098,
                      ),
                      457 => 
                      array (
                        'key' => 'IBRS',
                        'value' => 2099,
                      ),
                      458 => 
                      array (
                        'key' => 'IBRS SANITARY',
                        'value' => 2100,
                      ),
                      459 => 
                      array (
                        'key' => 'ICE CUTTER HOSE',
                        'value' => 2101,
                      ),
                      460 => 
                      array (
                        'key' => 'INERT GAS',
                        'value' => 2102,
                      ),
                      461 => 
                      array (
                        'key' => 'INET COOLING',
                        'value' => 2103,
                      ),
                      462 => 
                      array (
                        'key' => 'INFINITY CHEMICAL',
                        'value' => 2104,
                      ),
                      463 => 
                      array (
                        'key' => 'INFINITY FOOD',
                        'value' => 2105,
                      ),
                      464 => 
                      array (
                        'key' => 'INFINITY FUEL DROP',
                        'value' => 2106,
                      ),
                      465 => 
                      array (
                        'key' => 'INFINITY FUEL DROP HD',
                        'value' => 2107,
                      ),
                      466 => 
                      array (
                        'key' => 'INFINITY MILK',
                        'value' => 2108,
                      ),
                      467 => 
                      array (
                        'key' => 'INJECTION COOLANT',
                        'value' => 2109,
                      ),
                      468 => 
                      array (
                        'key' => 'INLET HOSE',
                        'value' => 2110,
                      ),
                      469 => 
                      array (
                        'key' => 'INSTA-GRIP 250',
                        'value' => 2111,
                      ),
                      470 => 
                      array (
                        'key' => 'INSTA-GRIP 300',
                        'value' => 2112,
                      ),
                      471 => 
                      array (
                        'key' => 'INSTA-GRIP HT',
                        'value' => 2113,
                      ),
                      472 => 
                      array (
                        'key' => 'INSTA-GRIP SP',
                        'value' => 2114,
                      ),
                      473 => 
                      array (
                        'key' => 'INSTA-GRIP TC',
                        'value' => 2115,
                      ),
                      474 => 
                      array (
                        'key' => 'INSTA-LOCK',
                        'value' => 2116,
                      ),
                      475 => 
                      array (
                        'key' => 'INTERCHEM',
                        'value' => 2117,
                      ),
                      476 => 
                      array (
                        'key' => 'INTERM',
                        'value' => 2118,
                      ),
                      477 => 
                      array (
                        'key' => 'INTERNATIONAL BELT',
                        'value' => 2119,
                      ),
                      478 => 
                      array (
                        'key' => 'IRC DRILL WATER',
                        'value' => 2120,
                      ),
                      479 => 
                      array (
                        'key' => 'IRPCO',
                        'value' => 2121,
                      ),
                      480 => 
                      array (
                        'key' => 'IRR',
                        'value' => 2122,
                      ),
                      481 => 
                      array (
                        'key' => 'IRR FLEX JET',
                        'value' => 2123,
                      ),
                      482 => 
                      array (
                        'key' => 'IRRIGATION BOOT',
                        'value' => 2124,
                      ),
                      483 => 
                      array (
                        'key' => 'ISO 3821',
                        'value' => 2125,
                      ),
                      484 => 
                      array (
                        'key' => 'ISO 8031',
                        'value' => 2126,
                      ),
                      485 => 
                      array (
                        'key' => 'ITALPR',
                        'value' => 2127,
                      ),
                      486 => 
                      array (
                        'key' => 'ITALPR TEFLON',
                        'value' => 2128,
                      ),
                      487 => 
                      array (
                        'key' => 'JACKHAMMER',
                        'value' => 2129,
                      ),
                      488 => 
                      array (
                        'key' => 'JB INDUSTRIES',
                        'value' => 2130,
                      ),
                      489 => 
                      array (
                        'key' => 'JET RANGER',
                        'value' => 2131,
                      ),
                      490 => 
                      array (
                        'key' => 'JETTING',
                        'value' => 2132,
                      ),
                      491 => 
                      array (
                        'key' => 'JETTING AND UTILITY',
                        'value' => 2133,
                      ),
                      492 => 
                      array (
                        'key' => 'JGB INDUSTRIES',
                        'value' => 2134,
                      ),
                      493 => 
                      array (
                        'key' => 'JOHN DEERE',
                        'value' => 2135,
                      ),
                      494 => 
                      array (
                        'key' => 'KAPTEC ULTRAFLEX',
                        'value' => 2136,
                      ),
                      495 => 
                      array (
                        'key' => 'KAPTECH FOOD DICHARGE',
                        'value' => 2137,
                      ),
                      496 => 
                      array (
                        'key' => 'KELCO BLAST',
                        'value' => 2138,
                      ),
                      497 => 
                      array (
                        'key' => 'KETEK FLEX PETROLEUM',
                        'value' => 2139,
                      ),
                      498 => 
                      array (
                        'key' => 'KINKGUARD',
                        'value' => 2140,
                      ),
                      499 => 
                      array (
                        'key' => 'LABOUR BLUCOR COUPLING',
                        'value' => 2141,
                      ),
                      500 => 
                      array (
                        'key' => 'LACTOPAL',
                        'value' => 2142,
                      ),
                      501 => 
                      array (
                        'key' => 'LAKECHARLES',
                        'value' => 2143,
                      ),
                      502 => 
                      array (
                        'key' => 'LEGACY TPU',
                        'value' => 2144,
                      ),
                      503 => 
                      array (
                        'key' => 'LG NITRILE',
                        'value' => 2145,
                      ),
                      504 => 
                      array (
                        'key' => 'LIGHTRAC',
                        'value' => 2146,
                      ),
                      505 => 
                      array (
                        'key' => 'LIGHTWEIGHT VACUUM',
                        'value' => 2147,
                      ),
                      506 => 
                      array (
                        'key' => 'LINECRETE',
                        'value' => 2148,
                      ),
                      507 => 
                      array (
                        'key' => 'LIQUID MUD',
                        'value' => 2149,
                      ),
                      508 => 
                      array (
                        'key' => 'LIQUID MUD YS',
                        'value' => 2150,
                      ),
                      509 => 
                      array (
                        'key' => 'LIQUIFORCE',
                        'value' => 2151,
                      ),
                      510 => 
                      array (
                        'key' => 'LPG DELIVERY PRO',
                        'value' => 2152,
                      ),
                      511 => 
                      array (
                        'key' => 'LW ARCTIC TANK TRUCK',
                        'value' => 2153,
                      ),
                      512 => 
                      array (
                        'key' => 'LW BLACK FLEXTRA II',
                        'value' => 2154,
                      ),
                      513 => 
                      array (
                        'key' => 'LW INDUSTRIAL VACUUM',
                        'value' => 2155,
                      ),
                      514 => 
                      array (
                        'key' => 'M&P MINE CONDUIT',
                        'value' => 2156,
                      ),
                      515 => 
                      array (
                        'key' => 'MANUS BLAST',
                        'value' => 2157,
                      ),
                      516 => 
                      array (
                        'key' => 'MANUS BLAST WHIP',
                        'value' => 2158,
                      ),
                      517 => 
                      array (
                        'key' => 'MARIAN',
                        'value' => 2159,
                      ),
                      518 => 
                      array (
                        'key' => 'MARINE BILGE',
                        'value' => 2160,
                      ),
                      519 => 
                      array (
                        'key' => 'MARINE EXHAUST HOSE',
                        'value' => 2161,
                      ),
                      520 => 
                      array (
                        'key' => 'MARINE FUEL FEED VENT J1527 B2',
                        'value' => 2162,
                      ),
                      521 => 
                      array (
                        'key' => 'MARINE FUEL FILL',
                        'value' => 2163,
                      ),
                      522 => 
                      array (
                        'key' => 'MARINE FUEL LINE',
                        'value' => 2164,
                      ),
                      523 => 
                      array (
                        'key' => 'MARINE HARDWALL WET EXHAUST',
                        'value' => 2165,
                      ),
                      524 => 
                      array (
                        'key' => 'MARINE LIVEWELL',
                        'value' => 2166,
                      ),
                      525 => 
                      array (
                        'key' => 'MARINE OIL FILL',
                        'value' => 2167,
                      ),
                      526 => 
                      array (
                        'key' => 'MARINE SANITATION',
                        'value' => 2168,
                      ),
                      527 => 
                      array (
                        'key' => 'MARINE SOFTWALL WET EXHAUST',
                        'value' => 2169,
                      ),
                      528 => 
                      array (
                        'key' => 'MARINE VACUUM',
                        'value' => 2170,
                      ),
                      529 => 
                      array (
                        'key' => 'MAST-AIR',
                        'value' => 2171,
                      ),
                      530 => 
                      array (
                        'key' => 'MASTERCOOL',
                        'value' => 2172,
                      ),
                      531 => 
                      array (
                        'key' => 'MASTHD',
                        'value' => 2173,
                      ),
                      532 => 
                      array (
                        'key' => 'MATERIAL HANDLING',
                        'value' => 2174,
                      ),
                      533 => 
                      array (
                        'key' => 'MATERIAL HANDLING DISCHARGE',
                        'value' => 2175,
                      ),
                      534 => 
                      array (
                        'key' => 'MAXXIM PREMIER ULTRA',
                        'value' => 2176,
                      ),
                      535 => 
                      array (
                        'key' => 'MCCARTY WATER S&D',
                        'value' => 2177,
                      ),
                      536 => 
                      array (
                        'key' => 'MCGILL',
                        'value' => 2178,
                      ),
                      537 => 
                      array (
                        'key' => 'MECR&S',
                        'value' => 2179,
                      ),
                      538 => 
                      array (
                        'key' => 'MECR&S PAINT SPRAY',
                        'value' => 2180,
                      ),
                      539 => 
                      array (
                        'key' => 'MER OILFIELD SUCTION',
                        'value' => 2181,
                      ),
                      540 => 
                      array (
                        'key' => 'MERMAR',
                        'value' => 2182,
                      ),
                      541 => 
                      array (
                        'key' => 'MESA',
                        'value' => 2183,
                      ),
                      542 => 
                      array (
                        'key' => 'MESA AMMONIUM NITRATE PELLET',
                        'value' => 2184,
                      ),
                      543 => 
                      array (
                        'key' => 'MESA DRAIN',
                        'value' => 2185,
                      ),
                      544 => 
                      array (
                        'key' => 'MESA GUNITE',
                        'value' => 2186,
                      ),
                      545 => 
                      array (
                        'key' => 'MESA PLASTER & GROUT',
                        'value' => 2187,
                      ),
                      546 => 
                      array (
                        'key' => 'MESA REFRACTORY GUNITE',
                        'value' => 2188,
                      ),
                      547 => 
                      array (
                        'key' => 'MESA ROOF DRAIN',
                        'value' => 2189,
                      ),
                      548 => 
                      array (
                        'key' => 'MESA ROOF DRAIN CHEMICAL',
                        'value' => 2190,
                      ),
                      549 => 
                      array (
                        'key' => 'MHPRF 11588G II ST',
                        'value' => 2191,
                      ),
                      550 => 
                      array (
                        'key' => 'MIDWEST',
                        'value' => 2192,
                      ),
                      551 => 
                      array (
                        'key' => 'MIL A-A-59566',
                        'value' => 2193,
                      ),
                      552 => 
                      array (
                        'key' => 'MIL A-A-59567',
                        'value' => 2194,
                      ),
                      553 => 
                      array (
                        'key' => 'MIL-A-A-59565',
                        'value' => 2195,
                      ),
                      554 => 
                      array (
                        'key' => 'MIL-DTL-13444-I',
                        'value' => 2196,
                      ),
                      555 => 
                      array (
                        'key' => 'MIL-DTL-13444-III',
                        'value' => 2197,
                      ),
                      556 => 
                      array (
                        'key' => 'MIL-DTL-13531 TYPE II, CL A',
                        'value' => 2198,
                      ),
                      557 => 
                      array (
                        'key' => 'MIL-DTL-17505',
                        'value' => 2199,
                      ),
                      558 => 
                      array (
                        'key' => 'MIL-DTL-20176',
                        'value' => 2200,
                      ),
                      559 => 
                      array (
                        'key' => 'MIL-DTL-22240',
                        'value' => 2201,
                      ),
                      560 => 
                      array (
                        'key' => 'MIL-DTL-27516',
                        'value' => 2202,
                      ),
                      561 => 
                      array (
                        'key' => 'MIL-DTL-29210',
                        'value' => 2203,
                      ),
                      562 => 
                      array (
                        'key' => 'MIL-DTL-6615',
                        'value' => 2204,
                      ),
                      563 => 
                      array (
                        'key' => 'MIL-H-24580',
                        'value' => 2205,
                      ),
                      564 => 
                      array (
                        'key' => 'MIL-H-82127',
                        'value' => 2206,
                      ),
                      565 => 
                      array (
                        'key' => 'MIL-PRF-11588 TYPE I',
                        'value' => 2207,
                      ),
                      566 => 
                      array (
                        'key' => 'MIL-PRF-11588 TYPE III',
                        'value' => 2208,
                      ),
                      567 => 
                      array (
                        'key' => 'MIL-PRF-370 TYPE A',
                        'value' => 2209,
                      ),
                      568 => 
                      array (
                        'key' => 'MIL-PRF-370 TYPE B',
                        'value' => 2210,
                      ),
                      569 => 
                      array (
                        'key' => 'MILTARY',
                        'value' => 2211,
                      ),
                      570 => 
                      array (
                        'key' => 'MILTON',
                        'value' => 2212,
                      ),
                      571 => 
                      array (
                        'key' => 'MINE CONDUIT',
                        'value' => 2213,
                      ),
                      572 => 
                      array (
                        'key' => 'MOCCASIN',
                        'value' => 2214,
                      ),
                      573 => 
                      array (
                        'key' => 'MORRIS AIR SEEDER',
                        'value' => 2215,
                      ),
                      574 => 
                      array (
                        'key' => 'MORRIS AIR SEEDER LT',
                        'value' => 2216,
                      ),
                      575 => 
                      array (
                        'key' => 'MPI',
                        'value' => 2217,
                      ),
                      576 => 
                      array (
                        'key' => 'MPI PREMIUM-GUARD MARINE',
                        'value' => 2218,
                      ),
                      577 => 
                      array (
                        'key' => 'MUD CUTTING HW',
                        'value' => 2219,
                      ),
                      578 => 
                      array (
                        'key' => 'MUD RETURN LINE',
                        'value' => 2220,
                      ),
                      579 => 
                      array (
                        'key' => 'MUD STACKING',
                        'value' => 2221,
                      ),
                      580 => 
                      array (
                        'key' => 'MULTISTREAM HW',
                        'value' => 2222,
                      ),
                      581 => 
                      array (
                        'key' => 'MULTISTREAM SW',
                        'value' => 2223,
                      ),
                      582 => 
                      array (
                        'key' => 'NAFIRE',
                        'value' => 2224,
                      ),
                      583 => 
                      array (
                        'key' => 'NAVISTAR',
                        'value' => 2225,
                      ),
                      584 => 
                      array (
                        'key' => 'NELSON DUNN',
                        'value' => 2226,
                      ),
                      585 => 
                      array (
                        'key' => 'NEPTUNE',
                        'value' => 2227,
                      ),
                      586 => 
                      array (
                        'key' => 'NESI OILFIELD',
                        'value' => 2228,
                      ),
                      587 => 
                      array (
                        'key' => 'NEWLINE',
                        'value' => 2229,
                      ),
                      588 => 
                      array (
                        'key' => 'NISHIN',
                        'value' => 2230,
                      ),
                      589 => 
                      array (
                        'key' => 'NISSHIN',
                        'value' => 2231,
                      ),
                      590 => 
                      array (
                        'key' => 'NITRO FLOOD WATER S&D',
                        'value' => 2232,
                      ),
                      591 => 
                      array (
                        'key' => 'NITRO R&C WATER S&D',
                        'value' => 2233,
                      ),
                      592 => 
                      array (
                        'key' => 'NITROGEN SERVICE',
                        'value' => 2234,
                      ),
                      593 => 
                      array (
                        'key' => 'NOV',
                        'value' => 2235,
                      ),
                      594 => 
                      array (
                        'key' => 'NPETRO LW',
                        'value' => 2236,
                      ),
                      595 => 
                      array (
                        'key' => 'NR SPRAY',
                        'value' => 2237,
                      ),
                      596 => 
                      array (
                        'key' => 'NR7',
                        'value' => 2238,
                      ),
                      597 => 
                      array (
                        'key' => 'NR8',
                        'value' => 2239,
                      ),
                      598 => 
                      array (
                        'key' => 'NSH',
                        'value' => 2240,
                      ),
                      599 => 
                      array (
                        'key' => 'NUTRIFLEX',
                        'value' => 2241,
                      ),
                      600 => 
                      array (
                        'key' => 'NUTRIFLEX STATIC WIRE',
                        'value' => 2242,
                      ),
                      601 => 
                      array (
                        'key' => 'NUTRIFLEX SUCTION & DISCHARGE',
                        'value' => 2243,
                      ),
                      602 => 
                      array (
                        'key' => 'NUTRIFLO SUCTION & DISCHARGE',
                        'value' => 2244,
                      ),
                      603 => 
                      array (
                        'key' => 'OAKLEY',
                        'value' => 2245,
                      ),
                      604 => 
                      array (
                        'key' => 'OFFSHORE FUEL',
                        'value' => 2246,
                      ),
                      605 => 
                      array (
                        'key' => 'OFFSHORE VIPER',
                        'value' => 2247,
                      ),
                      606 => 
                      array (
                        'key' => 'OIL DISCHARGE',
                        'value' => 2248,
                      ),
                      607 => 
                      array (
                        'key' => 'OIL RIG HARDWALL',
                        'value' => 2249,
                      ),
                      608 => 
                      array (
                        'key' => 'OIL RIG HARDWALL BIOFUEL',
                        'value' => 2250,
                      ),
                      609 => 
                      array (
                        'key' => 'OIL RIG SOFTWALL',
                        'value' => 2251,
                      ),
                      610 => 
                      array (
                        'key' => 'OIL TREAT & BLENDER',
                        'value' => 2252,
                      ),
                      611 => 
                      array (
                        'key' => 'OILFIELD DISCHARGE',
                        'value' => 2253,
                      ),
                      612 => 
                      array (
                        'key' => 'OILFIELD FRAC',
                        'value' => 2254,
                      ),
                      613 => 
                      array (
                        'key' => 'OMNI',
                        'value' => 2255,
                      ),
                      614 => 
                      array (
                        'key' => 'OMNI WATER S&D',
                        'value' => 2256,
                      ),
                      615 => 
                      array (
                        'key' => 'ORANGE FLEXWING',
                        'value' => 2257,
                      ),
                      616 => 
                      array (
                        'key' => 'ORTAC',
                        'value' => 2258,
                      ),
                      617 => 
                      array (
                        'key' => 'ORTAC II',
                        'value' => 2259,
                      ),
                      618 => 
                      array (
                        'key' => 'PACER',
                        'value' => 2260,
                      ),
                      619 => 
                      array (
                        'key' => 'PAGUFIX',
                        'value' => 2261,
                      ),
                      620 => 
                      array (
                        'key' => 'PALADIN',
                        'value' => 2262,
                      ),
                      621 => 
                      array (
                        'key' => 'PANGBORN PA BLAST',
                        'value' => 2263,
                      ),
                      622 => 
                      array (
                        'key' => 'PARKING',
                        'value' => 2264,
                      ),
                      623 => 
                      array (
                        'key' => 'PERFECT GARDEN HOSE',
                        'value' => 2265,
                      ),
                      624 => 
                      array (
                        'key' => 'PERLAPAL',
                        'value' => 2266,
                      ),
                      625 => 
                      array (
                        'key' => 'PETERS LIQUID MUD',
                        'value' => 2267,
                      ),
                      626 => 
                      array (
                        'key' => 'PETRO OIL S&D',
                        'value' => 2268,
                      ),
                      627 => 
                      array (
                        'key' => 'PETROL HARDWALL',
                        'value' => 2269,
                      ),
                      628 => 
                      array (
                        'key' => 'PGC PLACEMENT TEXTILE',
                        'value' => 2270,
                      ),
                      629 => 
                      array (
                        'key' => 'PHX FUEL GAS',
                        'value' => 2271,
                      ),
                      630 => 
                      array (
                        'key' => 'PHX OXYGEN',
                        'value' => 2272,
                      ),
                      631 => 
                      array (
                        'key' => 'PLASTER & GROUT',
                        'value' => 2273,
                      ),
                      632 => 
                      array (
                        'key' => 'PLATINUM JAC RISER',
                        'value' => 2274,
                      ),
                      633 => 
                      array (
                        'key' => 'PLIOVIC FG',
                        'value' => 2275,
                      ),
                      634 => 
                      array (
                        'key' => 'PLIOVIC GS',
                        'value' => 2276,
                      ),
                      635 => 
                      array (
                        'key' => 'PLIOVIC PLUS',
                        'value' => 2277,
                      ),
                      636 => 
                      array (
                        'key' => 'PLIOVIC PVC TUBING',
                        'value' => 2278,
                      ),
                      637 => 
                      array (
                        'key' => 'POSEIDON UL94-HB',
                        'value' => 2279,
                      ),
                      638 => 
                      array (
                        'key' => 'POT LINE',
                        'value' => 2280,
                      ),
                      639 => 
                      array (
                        'key' => 'POT LINE HD',
                        'value' => 2281,
                      ),
                      640 => 
                      array (
                        'key' => 'POTABLE STOCK TANK',
                        'value' => 2282,
                      ),
                      641 => 
                      array (
                        'key' => 'POTABLE WATER',
                        'value' => 2283,
                      ),
                      642 => 
                      array (
                        'key' => 'POTABLE WATER HW',
                        'value' => 2284,
                      ),
                      643 => 
                      array (
                        'key' => 'POTABLE WATER SW',
                        'value' => 2285,
                      ),
                      644 => 
                      array (
                        'key' => 'PRAIRIE GOLDFLEX',
                        'value' => 2286,
                      ),
                      645 => 
                      array (
                        'key' => 'PREM MARINE WET EXHAUST COR',
                        'value' => 2287,
                      ),
                      646 => 
                      array (
                        'key' => 'PREMIER REFRACTORY CLAMP',
                        'value' => 2288,
                      ),
                      647 => 
                      array (
                        'key' => 'PREMIUM GARDEN',
                        'value' => 2289,
                      ),
                      648 => 
                      array (
                        'key' => 'PREMIUM MARINE WET EXHAUST',
                        'value' => 2290,
                      ),
                      649 => 
                      array (
                        'key' => 'PROSPECTOR AIR',
                        'value' => 2291,
                      ),
                      650 => 
                      array (
                        'key' => 'PROSPECTOR BOP 3000',
                        'value' => 2292,
                      ),
                      651 => 
                      array (
                        'key' => 'PROSPECTOR BOP 5000',
                        'value' => 2293,
                      ),
                      652 => 
                      array (
                        'key' => 'PROSPECTOR FLEX',
                        'value' => 2294,
                      ),
                      653 => 
                      array (
                        'key' => 'PROSPECTOR FLEX OILFIELD',
                        'value' => 2295,
                      ),
                      654 => 
                      array (
                        'key' => 'PROSPECTOR FLEX PETRO',
                        'value' => 2296,
                      ),
                      655 => 
                      array (
                        'key' => 'PROSPECTOR FRAC DISCHARGE',
                        'value' => 2297,
                      ),
                      656 => 
                      array (
                        'key' => 'PROSPECTOR FRAC TANK HOSE',
                        'value' => 2298,
                      ),
                      657 => 
                      array (
                        'key' => 'PROSPECTOR HOT OILER',
                        'value' => 2299,
                      ),
                      658 => 
                      array (
                        'key' => 'PROSPECTOR MINESPRAY',
                        'value' => 2300,
                      ),
                      659 => 
                      array (
                        'key' => 'PROSPECTOR OIL RIG HW',
                        'value' => 2301,
                      ),
                      660 => 
                      array (
                        'key' => 'PROSPECTOR OIL RIG SW',
                        'value' => 2302,
                      ),
                      661 => 
                      array (
                        'key' => 'PROSPECTOR OILFIELD',
                        'value' => 2303,
                      ),
                      662 => 
                      array (
                        'key' => 'PROSPECTOR OILFIELD S&D',
                        'value' => 2304,
                      ),
                      663 => 
                      array (
                        'key' => 'PROSPECTOR PETRO',
                        'value' => 2305,
                      ),
                      664 => 
                      array (
                        'key' => 'PROSPECTOR PLUS AIR',
                        'value' => 2306,
                      ),
                      665 => 
                      array (
                        'key' => 'PROSPECTOR SHR',
                        'value' => 2307,
                      ),
                      666 => 
                      array (
                        'key' => 'PROSPECTOR WATER DISCHARGE',
                        'value' => 2308,
                      ),
                      667 => 
                      array (
                        'key' => 'PROSPECTOR WATER S&D',
                        'value' => 2309,
                      ),
                      668 => 
                      array (
                        'key' => 'PROTECTION RING',
                        'value' => 2310,
                      ),
                      669 => 
                      array (
                        'key' => 'Protective Sleeving',
                        'value' => 1694289,
                      ),
                      670 => 
                      array (
                        'key' => 'Protective Wrap',
                        'value' => 1694290,
                      ),
                      671 => 
                      array (
                        'key' => 'PSC CHEMICAL',
                        'value' => 2311,
                      ),
                      672 => 
                      array (
                        'key' => 'PULP & PAPER WASHDOWN',
                        'value' => 2312,
                      ),
                      673 => 
                      array (
                        'key' => 'PUREONE',
                        'value' => 2313,
                      ),
                      674 => 
                      array (
                        'key' => 'PURFIT',
                        'value' => 2314,
                      ),
                      675 => 
                      array (
                        'key' => 'PURFIT BREWLINE',
                        'value' => 2315,
                      ),
                      676 => 
                      array (
                        'key' => 'PURPLE FLEXWING',
                        'value' => 2316,
                      ),
                      677 => 
                      array (
                        'key' => 'PURPLE SNAKE',
                        'value' => 2317,
                      ),
                      678 => 
                      array (
                        'key' => 'PURPLE SNAKE PLUS',
                        'value' => 2318,
                      ),
                      679 => 
                      array (
                        'key' => 'PYROFLEX HOT AIR',
                        'value' => 2319,
                      ),
                      680 => 
                      array (
                        'key' => 'PYROFLEX HOT AIR III FDA',
                        'value' => 2320,
                      ),
                      681 => 
                      array (
                        'key' => 'PYROFLEX HOT TAR WAND',
                        'value' => 2321,
                      ),
                      682 => 
                      array (
                        'key' => 'PYROFLEX II HOT AIR',
                        'value' => 2322,
                      ),
                      683 => 
                      array (
                        'key' => 'PYROFLEX II HOT TAR & ASPHALT',
                        'value' => 2323,
                      ),
                      684 => 
                      array (
                        'key' => 'PYROFLEX III HOT AIR',
                        'value' => 2324,
                      ),
                      685 => 
                      array (
                        'key' => 'PYROFLEX III HOT AIR FDA',
                        'value' => 2325,
                      ),
                      686 => 
                      array (
                        'key' => 'QR048',
                        'value' => 2326,
                      ),
                      687 => 
                      array (
                        'key' => 'QR48',
                        'value' => 2327,
                      ),
                      688 => 
                      array (
                        'key' => 'QUIKSTIR',
                        'value' => 2328,
                      ),
                      689 => 
                      array (
                        'key' => 'QUIKSTIR PUMP 2P',
                        'value' => 2329,
                      ),
                      690 => 
                      array (
                        'key' => 'RADIATOR',
                        'value' => 2330,
                      ),
                      691 => 
                      array (
                        'key' => 'RAGCO',
                        'value' => 2331,
                      ),
                      692 => 
                      array (
                        'key' => 'RAIL',
                        'value' => 2332,
                      ),
                      693 => 
                      array (
                        'key' => 'RANSBG NR SPRAY',
                        'value' => 2333,
                      ),
                      694 => 
                      array (
                        'key' => 'RAWHID FIRE ENGINE BOOSTER',
                        'value' => 2334,
                      ),
                      695 => 
                      array (
                        'key' => 'RCT FLEXRITE',
                        'value' => 2335,
                      ),
                      696 => 
                      array (
                        'key' => 'RDC',
                        'value' => 2336,
                      ),
                      697 => 
                      array (
                        'key' => 'REAL RUBBER',
                        'value' => 2337,
                      ),
                      698 => 
                      array (
                        'key' => 'RED FLEXTRA',
                        'value' => 2338,
                      ),
                      699 => 
                      array (
                        'key' => 'RED-L GOLDFLEX-C',
                        'value' => 2339,
                      ),
                      700 => 
                      array (
                        'key' => 'RED-L WATER',
                        'value' => 2340,
                      ),
                      701 => 
                      array (
                        'key' => 'REDWING BLUE LOW TEMP',
                        'value' => 2341,
                      ),
                      702 => 
                      array (
                        'key' => 'REDWING FUEL OIL',
                        'value' => 2342,
                      ),
                      703 => 
                      array (
                        'key' => 'REDWING FUEL OIL HD',
                        'value' => 2343,
                      ),
                      704 => 
                      array (
                        'key' => 'REDWING VERSABRAID',
                        'value' => 2344,
                      ),
                      705 => 
                      array (
                        'key' => 'REFRACTORY GUNITE',
                        'value' => 2345,
                      ),
                      706 => 
                      array (
                        'key' => 'REFRACTORY HOSE',
                        'value' => 2346,
                      ),
                      707 => 
                      array (
                        'key' => 'REFRIGERANT CHARGING',
                        'value' => 2347,
                      ),
                      708 => 
                      array (
                        'key' => 'RELIANCE PROSPECTOR WATER S&D',
                        'value' => 2348,
                      ),
                      709 => 
                      array (
                        'key' => 'RELIANCE WATER S&D',
                        'value' => 2349,
                      ),
                      710 => 
                      array (
                        'key' => 'RES',
                        'value' => 2350,
                      ),
                      711 => 
                      array (
                        'key' => 'REVERSE CIRCULATION',
                        'value' => 2351,
                      ),
                      712 => 
                      array (
                        'key' => 'RIG SUPPLY',
                        'value' => 2352,
                      ),
                      713 => 
                      array (
                        'key' => 'RIG SUPPLY SW',
                        'value' => 2353,
                      ),
                      714 => 
                      array (
                        'key' => 'RIVERB',
                        'value' => 2354,
                      ),
                      715 => 
                      array (
                        'key' => 'RL1131 TWIN-LINE GRADE R',
                        'value' => 2355,
                      ),
                      716 => 
                      array (
                        'key' => 'ROADPATCH',
                        'value' => 2356,
                      ),
                      717 => 
                      array (
                        'key' => 'ROBIN FREON CHARGING',
                        'value' => 2357,
                      ),
                      718 => 
                      array (
                        'key' => 'ROCK DRILL',
                        'value' => 2358,
                      ),
                      719 => 
                      array (
                        'key' => 'ROOF DRAIN',
                        'value' => 2359,
                      ),
                      720 => 
                      array (
                        'key' => 'ROUGH BORE (HOT TAR & ASPHALT)',
                        'value' => 2360,
                      ),
                      721 => 
                      array (
                        'key' => 'ROUGH BORE DOCK',
                        'value' => 2361,
                      ),
                      722 => 
                      array (
                        'key' => 'ROYAL BRASS PLIOVIC',
                        'value' => 2362,
                      ),
                      723 => 
                      array (
                        'key' => 'RSD',
                        'value' => 2363,
                      ),
                      724 => 
                      array (
                        'key' => 'RX',
                        'value' => 2364,
                      ),
                      725 => 
                      array (
                        'key' => 'S4SH',
                        'value' => 2365,
                      ),
                      726 => 
                      array (
                        'key' => 'S4SP',
                        'value' => 2366,
                      ),
                      727 => 
                      array (
                        'key' => 'SAE 100R4',
                        'value' => 2367,
                      ),
                      728 => 
                      array (
                        'key' => 'SAE 20R1',
                        'value' => 2368,
                      ),
                      729 => 
                      array (
                        'key' => 'SAE 20R2 D1',
                        'value' => 2369,
                      ),
                      730 => 
                      array (
                        'key' => 'SAE 20R2D1',
                        'value' => 2370,
                      ),
                      731 => 
                      array (
                        'key' => 'SAE J1527 A2 R1 ISO 7840 A2',
                        'value' => 2371,
                      ),
                      732 => 
                      array (
                        'key' => 'SAE J1527 TYPE A2 FUEL FILL',
                        'value' => 2372,
                      ),
                      733 => 
                      array (
                        'key' => 'SAE-20R2 D1',
                        'value' => 2373,
                      ),
                      734 => 
                      array (
                        'key' => 'SAND RECOVERY S&D',
                        'value' => 2374,
                      ),
                      735 => 
                      array (
                        'key' => 'SAND SUCTION',
                        'value' => 2375,
                      ),
                      736 => 
                      array (
                        'key' => 'SANDBLAST 400',
                        'value' => 2376,
                      ),
                      737 => 
                      array (
                        'key' => 'SANDER',
                        'value' => 2377,
                      ),
                      738 => 
                      array (
                        'key' => 'SANI-WASH',
                        'value' => 2378,
                      ),
                      739 => 
                      array (
                        'key' => 'SANI-WASH PLUS',
                        'value' => 2379,
                      ),
                      740 => 
                      array (
                        'key' => 'SANI-WASH SUPREME',
                        'value' => 2380,
                      ),
                      741 => 
                      array (
                        'key' => 'SCOMI LIQUID MUD',
                        'value' => 2381,
                      ),
                      742 => 
                      array (
                        'key' => 'SCP3',
                        'value' => 2382,
                      ),
                      743 => 
                      array (
                        'key' => 'SCRMAC KURB KING',
                        'value' => 2383,
                      ),
                      744 => 
                      array (
                        'key' => 'SEALFS',
                        'value' => 2384,
                      ),
                      745 => 
                      array (
                        'key' => 'SERVICE STATION AIR',
                        'value' => 2385,
                      ),
                      746 => 
                      array (
                        'key' => 'SFS (FIRE SUPPRESSION)',
                        'value' => 2386,
                      ),
                      747 => 
                      array (
                        'key' => 'SGOBAIN',
                        'value' => 2387,
                      ),
                      748 => 
                      array (
                        'key' => 'SGOBAIN FOOD DISCHARGE',
                        'value' => 2388,
                      ),
                      749 => 
                      array (
                        'key' => 'SGOBAIN FOOD S&D',
                        'value' => 2389,
                      ),
                      750 => 
                      array (
                        'key' => 'SHELLFLEX',
                        'value' => 2390,
                      ),
                      751 => 
                      array (
                        'key' => 'SHIELD',
                        'value' => 2391,
                      ),
                      752 => 
                      array (
                        'key' => 'SINGLE LINE (GRADE R)',
                        'value' => 2392,
                      ),
                      753 => 
                      array (
                        'key' => 'SINGLE LINE (GRADE RM)',
                        'value' => 2393,
                      ),
                      754 => 
                      array (
                        'key' => 'SINGLE LINE (GRADE T)',
                        'value' => 2394,
                      ),
                      755 => 
                      array (
                        'key' => 'SK CARBOV',
                        'value' => 2395,
                      ),
                      756 => 
                      array (
                        'key' => 'SLURRY',
                        'value' => 2396,
                      ),
                      757 => 
                      array (
                        'key' => 'SMOOTH BORE DOCK',
                        'value' => 2397,
                      ),
                      758 => 
                      array (
                        'key' => 'SMOOTH BORE HOT TAR & ASPHALT',
                        'value' => 2398,
                      ),
                      759 => 
                      array (
                        'key' => 'SMOOTH BORE MOLTEN SULPHUR',
                        'value' => 2399,
                      ),
                      760 => 
                      array (
                        'key' => 'SNAPON',
                        'value' => 2400,
                      ),
                      761 => 
                      array (
                        'key' => 'SOFTUB WATER',
                        'value' => 2401,
                      ),
                      762 => 
                      array (
                        'key' => 'SOFTWALL',
                        'value' => 2402,
                      ),
                      763 => 
                      array (
                        'key' => 'SOHO PROSPECTOR WATER S&D',
                        'value' => 2403,
                      ),
                      764 => 
                      array (
                        'key' => 'SOUTHERN',
                        'value' => 2404,
                      ),
                      765 => 
                      array (
                        'key' => 'SPARTAN PRESSURE WASHER',
                        'value' => 2405,
                      ),
                      766 => 
                      array (
                        'key' => 'SPEEDAIRE',
                        'value' => 2406,
                      ),
                      767 => 
                      array (
                        'key' => 'SPIR SEP',
                        'value' => 2407,
                      ),
                      768 => 
                      array (
                        'key' => 'SPIR SEP TPG',
                        'value' => 2408,
                      ),
                      769 => 
                      array (
                        'key' => 'SPIRAFLEX 1500',
                        'value' => 2409,
                      ),
                      770 => 
                      array (
                        'key' => 'SPIRAFLEX 1600',
                        'value' => 2410,
                      ),
                      771 => 
                      array (
                        'key' => 'SPIRAFLEX ACTION F.E.S',
                        'value' => 2411,
                      ),
                      772 => 
                      array (
                        'key' => 'SPIRAFLEX AGFLEX',
                        'value' => 2412,
                      ),
                      773 => 
                      array (
                        'key' => 'SPIRAFLEX AGGIE',
                        'value' => 2413,
                      ),
                      774 => 
                      array (
                        'key' => 'SPIRAFLEX AIR SEEDER',
                        'value' => 2414,
                      ),
                      775 => 
                      array (
                        'key' => 'SPIRAFLEX BARKBLOWER',
                        'value' => 2415,
                      ),
                      776 => 
                      array (
                        'key' => 'SPIRAFLEX BLACK SUPER-DUTY LAYFLAT',
                        'value' => 2416,
                      ),
                      777 => 
                      array (
                        'key' => 'SPIRAFLEX BLUE EXTRA LIGHT DUTY LAYFLAT',
                        'value' => 2417,
                      ),
                      778 => 
                      array (
                        'key' => 'SPIRAFLEX CABLE GUARD',
                        'value' => 2418,
                      ),
                      779 => 
                      array (
                        'key' => 'SPIRAFLEX DUCTING',
                        'value' => 2419,
                      ),
                      780 => 
                      array (
                        'key' => 'SPIRAFLEX FGVAC',
                        'value' => 2420,
                      ),
                      781 => 
                      array (
                        'key' => 'SPIRAFLEX FISH SUCTION',
                        'value' => 2421,
                      ),
                      782 => 
                      array (
                        'key' => 'SPIRAFLEX FOODVAC',
                        'value' => 2422,
                      ),
                      783 => 
                      array (
                        'key' => 'SPIRAFLEX GRASSVAC',
                        'value' => 2423,
                      ),
                      784 => 
                      array (
                        'key' => 'SPIRAFLEX GRAY LIGHT DUTY LAYFLAT',
                        'value' => 2424,
                      ),
                      785 => 
                      array (
                        'key' => 'SPIRAFLEX GREEN LAYFLAT',
                        'value' => 2425,
                      ),
                      786 => 
                      array (
                        'key' => 'SPIRAFLEX HT',
                        'value' => 2426,
                      ),
                      787 => 
                      array (
                        'key' => 'SPIRAFLEX LW ROCK DUST',
                        'value' => 2427,
                      ),
                      788 => 
                      array (
                        'key' => 'SPIRAFLEX MULCH BLOWER',
                        'value' => 2428,
                      ),
                      789 => 
                      array (
                        'key' => 'SPIRAFLEX MULCHBLOWER',
                        'value' => 2429,
                      ),
                      790 => 
                      array (
                        'key' => 'SPIRAFLEX RED MEDIUM DUTY LAYFLAT',
                        'value' => 2430,
                      ),
                      791 => 
                      array (
                        'key' => 'SPIRAFLEX ROCK DUST',
                        'value' => 2431,
                      ),
                      792 => 
                      array (
                        'key' => 'SPIRAFLEX VACUUM',
                        'value' => 2432,
                      ),
                      793 => 
                      array (
                        'key' => 'SPIRAFLEX VAPOR RECOVERY',
                        'value' => 2433,
                      ),
                      794 => 
                      array (
                        'key' => 'SPIRAFLEX YELLOW HEAVY DUTY LAYFLAT',
                        'value' => 2434,
                      ),
                      795 => 
                      array (
                        'key' => 'SPIRAFLOW',
                        'value' => 2435,
                      ),
                      796 => 
                      array (
                        'key' => 'SPIRATHANE HD',
                        'value' => 2436,
                      ),
                      797 => 
                      array (
                        'key' => 'SPIRATHANE LD',
                        'value' => 2437,
                      ),
                      798 => 
                      array (
                        'key' => 'SPIRATHANE PT',
                        'value' => 2438,
                      ),
                      799 => 
                      array (
                        'key' => 'SR12',
                        'value' => 2439,
                      ),
                      800 => 
                      array (
                        'key' => 'SR13',
                        'value' => 2440,
                      ),
                      801 => 
                      array (
                        'key' => 'SR14',
                        'value' => 2441,
                      ),
                      802 => 
                      array (
                        'key' => 'SR14A',
                        'value' => 2442,
                      ),
                      803 => 
                      array (
                        'key' => 'SR14B',
                        'value' => 2443,
                      ),
                      804 => 
                      array (
                        'key' => 'SR15',
                        'value' => 2444,
                      ),
                      805 => 
                      array (
                        'key' => 'SR16SC',
                        'value' => 2445,
                      ),
                      806 => 
                      array (
                        'key' => 'SR18',
                        'value' => 2446,
                      ),
                      807 => 
                      array (
                        'key' => 'SR1SN',
                        'value' => 2447,
                      ),
                      808 => 
                      array (
                        'key' => 'SR2SN',
                        'value' => 2448,
                      ),
                      809 => 
                      array (
                        'key' => 'SR3',
                        'value' => 2449,
                      ),
                      810 => 
                      array (
                        'key' => 'SR5',
                        'value' => 2450,
                      ),
                      811 => 
                      array (
                        'key' => 'SR6',
                        'value' => 2451,
                      ),
                      812 => 
                      array (
                        'key' => 'SR7',
                        'value' => 2452,
                      ),
                      813 => 
                      array (
                        'key' => 'SR8',
                        'value' => 2453,
                      ),
                      814 => 
                      array (
                        'key' => 'SRS',
                        'value' => 2454,
                      ),
                      815 => 
                      array (
                        'key' => 'STANDARD STRAIGHT RAD',
                        'value' => 2455,
                      ),
                      816 => 
                      array (
                        'key' => 'STEAM 250',
                        'value' => 2456,
                      ),
                      817 => 
                      array (
                        'key' => 'STEEL AIR',
                        'value' => 2457,
                      ),
                      818 => 
                      array (
                        'key' => 'STEEL AIR BOOTSTRAP',
                        'value' => 2458,
                      ),
                      819 => 
                      array (
                        'key' => 'SUBSEA CABLE',
                        'value' => 2459,
                      ),
                      820 => 
                      array (
                        'key' => 'SULBANA GAUNTLET',
                        'value' => 2460,
                      ),
                      821 => 
                      array (
                        'key' => 'SUNSDEA MUD',
                        'value' => 2461,
                      ),
                      822 => 
                      array (
                        'key' => 'SUNSET WATER S&D FIRE SERVICE',
                        'value' => 2462,
                      ),
                      823 => 
                      array (
                        'key' => 'SUPER AIR 400',
                        'value' => 2463,
                      ),
                      824 => 
                      array (
                        'key' => 'SUPER BLACK FLEXWING',
                        'value' => 2464,
                      ),
                      825 => 
                      array (
                        'key' => 'SUPER ORTAC®',
                        'value' => 2465,
                      ),
                      826 => 
                      array (
                        'key' => 'SUPER ROCK DRILL',
                        'value' => 2466,
                      ),
                      827 => 
                      array (
                        'key' => 'SUPER ROCK DRILL HT',
                        'value' => 2467,
                      ),
                      828 => 
                      array (
                        'key' => 'SUPER SANI-WASH',
                        'value' => 2468,
                      ),
                      829 => 
                      array (
                        'key' => 'SUPERIOR',
                        'value' => 2469,
                      ),
                      830 => 
                      array (
                        'key' => 'SUPFLOW',
                        'value' => 2470,
                      ),
                      831 => 
                      array (
                        'key' => 'SUPVAC',
                        'value' => 2471,
                      ),
                      832 => 
                      array (
                        'key' => 'SURELINE',
                        'value' => 2472,
                      ),
                      833 => 
                      array (
                        'key' => 'SW DRY CEMENT & BARYTES',
                        'value' => 2473,
                      ),
                      834 => 
                      array (
                        'key' => 'SWAGELOK',
                        'value' => 2474,
                      ),
                      835 => 
                      array (
                        'key' => 'TAN FLEXTRA',
                        'value' => 2475,
                      ),
                      836 => 
                      array (
                        'key' => 'TAN FLEXTRA FDA',
                        'value' => 2476,
                      ),
                      837 => 
                      array (
                        'key' => 'TAN FLEXWING',
                        'value' => 2477,
                      ),
                      838 => 
                      array (
                        'key' => 'TAN FLEXWING FDA',
                        'value' => 2478,
                      ),
                      839 => 
                      array (
                        'key' => 'TANK CLEANING',
                        'value' => 2479,
                      ),
                      840 => 
                      array (
                        'key' => 'TANKER BARGE DISCHARGE',
                        'value' => 2480,
                      ),
                      841 => 
                      array (
                        'key' => 'TEFLON',
                        'value' => 2481,
                      ),
                      842 => 
                      array (
                        'key' => 'TETRA',
                        'value' => 2482,
                      ),
                      843 => 
                      array (
                        'key' => 'THERMIDOR',
                        'value' => 2483,
                      ),
                      844 => 
                      array (
                        'key' => 'THOMPSON FLEX XLPE',
                        'value' => 2484,
                      ),
                      845 => 
                      array (
                        'key' => 'THUNDER INSTA-GRIP',
                        'value' => 2485,
                      ),
                      846 => 
                      array (
                        'key' => 'TIG WELDING',
                        'value' => 2486,
                      ),
                      847 => 
                      array (
                        'key' => 'TIMCO',
                        'value' => 2487,
                      ),
                      848 => 
                      array (
                        'key' => 'TIPCO PREMIUM GARDEN',
                        'value' => 2488,
                      ),
                      849 => 
                      array (
                        'key' => 'TORRIDAIR',
                        'value' => 2489,
                      ),
                      850 => 
                      array (
                        'key' => 'TOW CABLE',
                        'value' => 2490,
                      ),
                      851 => 
                      array (
                        'key' => 'TR7',
                        'value' => 2491,
                      ),
                      852 => 
                      array (
                        'key' => 'TR8',
                        'value' => 2492,
                      ),
                      853 => 
                      array (
                        'key' => 'TRANSPLY',
                        'value' => 2493,
                      ),
                      854 => 
                      array (
                        'key' => 'TRIDENT',
                        'value' => 2494,
                      ),
                      855 => 
                      array (
                        'key' => 'TRIDENT SER',
                        'value' => 2495,
                      ),
                      856 => 
                      array (
                        'key' => 'TRINCO BLAST',
                        'value' => 2496,
                      ),
                      857 => 
                      array (
                        'key' => 'TRIPLX',
                        'value' => 2497,
                      ),
                      858 => 
                      array (
                        'key' => 'TRIX ACETYLENE',
                        'value' => 2498,
                      ),
                      859 => 
                      array (
                        'key' => 'TRIX BLAUSTRAHL',
                        'value' => 2499,
                      ),
                      860 => 
                      array (
                        'key' => 'TRIX BRAKE',
                        'value' => 2500,
                      ),
                      861 => 
                      array (
                        'key' => 'TRIX FUEL',
                        'value' => 2501,
                      ),
                      862 => 
                      array (
                        'key' => 'TRIX MULTIFOOD',
                        'value' => 2502,
                      ),
                      863 => 
                      array (
                        'key' => 'TRIX NITRO',
                        'value' => 2503,
                      ),
                      864 => 
                      array (
                        'key' => 'TRIX OXYGEN',
                        'value' => 2504,
                      ),
                      865 => 
                      array (
                        'key' => 'TRIX PAINT SPRAY',
                        'value' => 2505,
                      ),
                      866 => 
                      array (
                        'key' => 'TRIX RESPIRATION',
                        'value' => 2506,
                      ),
                      867 => 
                      array (
                        'key' => 'TRIX ROSTRAHL',
                        'value' => 2507,
                      ),
                      868 => 
                      array (
                        'key' => 'TRIX SUPER',
                        'value' => 2508,
                      ),
                      869 => 
                      array (
                        'key' => 'TUNNELCOTE ROCK DUST FLEXTRA',
                        'value' => 2509,
                      ),
                      870 => 
                      array (
                        'key' => 'TUNNELCOTE ROCK DUST FLEXWING',
                        'value' => 2510,
                      ),
                      871 => 
                      array (
                        'key' => 'TWIN-LINE (GRADE R)',
                        'value' => 2511,
                      ),
                      872 => 
                      array (
                        'key' => 'TWIN-LINE (GRADE RM)',
                        'value' => 2512,
                      ),
                      873 => 
                      array (
                        'key' => 'TWIN-LINE (GRADE T)',
                        'value' => 2513,
                      ),
                      874 => 
                      array (
                        'key' => 'TWIN-LINE ISO 3821',
                        'value' => 2514,
                      ),
                      875 => 
                      array (
                        'key' => 'UL 92 FIRE EXTINGUISHER',
                        'value' => 2515,
                      ),
                      876 => 
                      array (
                        'key' => 'ULTRABRAID',
                        'value' => 2516,
                      ),
                      877 => 
                      array (
                        'key' => 'ULTRAFLEX',
                        'value' => 2517,
                      ),
                      878 => 
                      array (
                        'key' => 'ULTRAMAR',
                        'value' => 2518,
                      ),
                      879 => 
                      array (
                        'key' => 'UNDERHILL',
                        'value' => 2519,
                      ),
                      880 => 
                      array (
                        'key' => 'UNISOURCE',
                        'value' => 2520,
                      ),
                      881 => 
                      array (
                        'key' => 'UNITRIX 60',
                        'value' => 2521,
                      ),
                      882 => 
                      array (
                        'key' => 'UNITRIX 80',
                        'value' => 2522,
                      ),
                      883 => 
                      array (
                        'key' => 'UNPRINTED SPRAY SALVAGE',
                        'value' => 2523,
                      ),
                      884 => 
                      array (
                        'key' => 'V-50 S&D',
                        'value' => 2524,
                      ),
                      885 => 
                      array (
                        'key' => 'VACUUM',
                        'value' => 2525,
                      ),
                      886 => 
                      array (
                        'key' => 'VAPOR RECOVERY',
                        'value' => 2526,
                      ),
                      887 => 
                      array (
                        'key' => 'VAPOR RECOVERY DOCK',
                        'value' => 2527,
                      ),
                      888 => 
                      array (
                        'key' => 'VARIFLEX',
                        'value' => 2528,
                      ),
                      889 => 
                      array (
                        'key' => 'VELOCITY BANDING COIL',
                        'value' => 2529,
                      ),
                      890 => 
                      array (
                        'key' => 'VELOCITY BEVERAGE TRANSFER',
                        'value' => 2530,
                      ),
                      891 => 
                      array (
                        'key' => 'VELOCITY PETROLEUM TRANSFER',
                        'value' => 2531,
                      ),
                      892 => 
                      array (
                        'key' => 'VELOCITY WATER TRANSFER',
                        'value' => 2532,
                      ),
                      893 => 
                      array (
                        'key' => 'VERSACHEM',
                        'value' => 2533,
                      ),
                      894 => 
                      array (
                        'key' => 'VERSACRETE',
                        'value' => 2534,
                      ),
                      895 => 
                      array (
                        'key' => 'VERSAFUEL EN1765 S15',
                        'value' => 2535,
                      ),
                      896 => 
                      array (
                        'key' => 'VERSAFUEL FLEX',
                        'value' => 2536,
                      ),
                      897 => 
                      array (
                        'key' => 'VERSIFLO DISCHARGE',
                        'value' => 2537,
                      ),
                      898 => 
                      array (
                        'key' => 'VERSIFLO S&D',
                        'value' => 2538,
                      ),
                      899 => 
                      array (
                        'key' => 'VICTOR',
                        'value' => 2539,
                      ),
                      900 => 
                      array (
                        'key' => 'VINTNER',
                        'value' => 2540,
                      ),
                      901 => 
                      array (
                        'key' => 'VINTNER MICROBAN',
                        'value' => 2541,
                      ),
                      902 => 
                      array (
                        'key' => 'VINTNER RESERVE',
                        'value' => 2542,
                      ),
                      903 => 
                      array (
                        'key' => 'VIPER',
                        'value' => 2543,
                      ),
                      904 => 
                      array (
                        'key' => 'WAB SLURRY',
                        'value' => 2544,
                      ),
                      905 => 
                      array (
                        'key' => 'WASHDOWN',
                        'value' => 2545,
                      ),
                      906 => 
                      array (
                        'key' => 'WASTE MATE',
                        'value' => 2546,
                      ),
                      907 => 
                      array (
                        'key' => 'WATER & AIR HD',
                        'value' => 2547,
                      ),
                      908 => 
                      array (
                        'key' => 'WATER DISCHARGE',
                        'value' => 2548,
                      ),
                      909 => 
                      array (
                        'key' => 'WATER DISCHARGE HD',
                        'value' => 2549,
                      ),
                      910 => 
                      array (
                        'key' => 'WATER HD',
                        'value' => 2550,
                      ),
                      911 => 
                      array (
                        'key' => 'WATER JETTING 1000',
                        'value' => 2551,
                      ),
                      912 => 
                      array (
                        'key' => 'WATER JETTING 500',
                        'value' => 2552,
                      ),
                      913 => 
                      array (
                        'key' => 'WATER REHAB',
                        'value' => 2553,
                      ),
                      914 => 
                      array (
                        'key' => 'WATER SUCTION & DISCHARGE',
                        'value' => 2554,
                      ),
                      915 => 
                      array (
                        'key' => 'WESTERN',
                        'value' => 2555,
                      ),
                      916 => 
                      array (
                        'key' => 'WHALE OIL',
                        'value' => 2556,
                      ),
                      917 => 
                      array (
                        'key' => 'WHALE WATER',
                        'value' => 2557,
                      ),
                      918 => 
                      array (
                        'key' => 'WHIPEND BLAST',
                        'value' => 2558,
                      ),
                      919 => 
                      array (
                        'key' => 'WHITE FLEXTRA',
                        'value' => 2559,
                      ),
                      920 => 
                      array (
                        'key' => 'WHITE FLEXWING',
                        'value' => 2560,
                      ),
                      921 => 
                      array (
                        'key' => 'WHITEWATER',
                        'value' => 2561,
                      ),
                      922 => 
                      array (
                        'key' => 'WINGCRAFT',
                        'value' => 2562,
                      ),
                      923 => 
                      array (
                        'key' => 'WIRE INSERTED RADIATOR HOSE',
                        'value' => 2563,
                      ),
                      924 => 
                      array (
                        'key' => 'WOODMI SAWDUST',
                        'value' => 2564,
                      ),
                      925 => 
                      array (
                        'key' => 'X-LIFE XCP3',
                        'value' => 2566,
                      ),
                      926 => 
                      array (
                        'key' => 'X-LIFE XCP3S',
                        'value' => 2567,
                      ),
                      927 => 
                      array (
                        'key' => 'X-LIFE XCP4',
                        'value' => 2568,
                      ),
                      928 => 
                      array (
                        'key' => 'X-LIFE XCP4S',
                        'value' => 2569,
                      ),
                      929 => 
                      array (
                        'key' => 'X-LIFE XCP5S',
                        'value' => 2570,
                      ),
                      930 => 
                      array (
                        'key' => 'X-LIFE XCP6S',
                        'value' => 2571,
                      ),
                      931 => 
                      array (
                        'key' => 'X-LIFE XR16SC',
                        'value' => 2572,
                      ),
                      932 => 
                      array (
                        'key' => 'XF BLAST',
                        'value' => 2565,
                      ),
                      933 => 
                      array (
                        'key' => 'XLPE CHEMICAL TRANSFER',
                        'value' => 2573,
                      ),
                      934 => 
                      array (
                        'key' => 'XPOWER',
                        'value' => 2574,
                      ),
                      935 => 
                      array (
                        'key' => 'YARDMASTER GARDEN HOSE',
                        'value' => 2575,
                      ),
                      936 => 
                      array (
                        'key' => 'YELLOW FLEXWING',
                        'value' => 2576,
                      ),
                      937 => 
                      array (
                        'key' => 'YUKON',
                        'value' => 2577,
                      ),
                      938 => 
                      array (
                        'key' => 'YUKON SPIRAFLEX',
                        'value' => 2578,
                      ),
                      939 => 
                      array (
                        'key' => 'ZZH561K-AA2',
                        'value' => 2579,
                      ),
                      940 => 
                      array (
                        'key' => 'ZZH561K-BA2',
                        'value' => 2580,
                      ),
                      941 => 
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => NULL,
                        'value' => 1694314,
                      ),
                      1 => 
                      array (
                        'key' => NULL,
                        'value' => 1694315,
                      ),
                      2 => 
                      array (
                        'key' => NULL,
                        'value' => 1694316,
                      ),
                      3 => 
                      array (
                        'key' => NULL,
                        'value' => 1694317,
                      ),
                      4 => 
                      array (
                        'key' => NULL,
                        'value' => 1694318,
                      ),
                      5 => 
                      array (
                        'key' => NULL,
                        'value' => 1694319,
                      ),
                      6 => 
                      array (
                        'key' => NULL,
                        'value' => 1694320,
                      ),
                      7 => 
                      array (
                        'key' => NULL,
                        'value' => 1694321,
                      ),
                      8 => 
                      array (
                        'key' => NULL,
                        'value' => 1694322,
                      ),
                      9 => 
                      array (
                        'key' => 'B2',
                        'value' => 1694295,
                      ),
                      10 => 
                      array (
                        'key' => 'S6',
                        'value' => 1694306,
                      ),
                      11 => 
                      array (
                        'key' => 'SE',
                        'value' => 1694307,
                      ),
                      12 => 
                      array (
                        'key' => 'SG',
                        'value' => 1694296,
                      ),
                      13 => 
                      array (
                        'key' => 'T8',
                        'value' => 1694297,
                      ),
                    ),
                     'width' => '',
                     'defaultValue' => '',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                     'optionsProviderData' => 'FittingFamily|Name',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
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
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'icon' => '',
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
