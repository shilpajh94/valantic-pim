<?php 

/** 
* Generated at: 2023-09-19T15:55:36+05:30
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- Brand [select]
- Name [input]
- tubeMaterial [block]
-- tubeMaterial [select]
-- rating [select]
- fittingMaterial [block]
-- fittingMaterial [select]
-- rating [select]
- RatingScale [select]
- gasket [multiselect]
- TemperatureRating [numeric]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '15',
   'name' => 'Chemical',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1695119136,
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'fieldtype' => 'panel',
         'labelWidth' => 150,
         'layout' => NULL,
         'border' => false,
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => 'Chemical',
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
                'key' => '3M 3020',
                'value' => 13056808,
              ),
              7 => 
              array (
                'key' => '556-50A',
                'value' => 1829102,
              ),
              8 => 
              array (
                'key' => 'A ZETA GOMMA',
                'value' => 13056773,
              ),
              9 => 
              array (
                'key' => 'A&E',
                'value' => 13056798,
              ),
              10 => 
              array (
                'key' => 'A&H',
                'value' => 1829180,
              ),
              11 => 
              array (
                'key' => 'A&M',
                'value' => 1829168,
              ),
              12 => 
              array (
                'key' => 'A.R. Thomson',
                'value' => 1645,
              ),
              13 => 
              array (
                'key' => 'A1',
                'value' => 5764903,
              ),
              14 => 
              array (
                'key' => 'ABBEY EXTREMEFLEX BEVERAGE',
                'value' => 13056769,
              ),
              15 => 
              array (
                'key' => 'Abbott',
                'value' => 1646,
              ),
              16 => 
              array (
                'key' => 'Abbott 1025 Series',
                'value' => 1647,
              ),
              17 => 
              array (
                'key' => 'Abbott Chem Grout',
                'value' => 1648,
              ),
              18 => 
              array (
                'key' => 'ABBOTT GOODYEAR GRIP',
                'value' => 1829149,
              ),
              19 => 
              array (
                'key' => 'ABBOTT INLET HOSE',
                'value' => 1829145,
              ),
              20 => 
              array (
                'key' => 'ABLE',
                'value' => 5759838,
              ),
              21 => 
              array (
                'key' => 'ABS Blast',
                'value' => 1649,
              ),
              22 => 
              array (
                'key' => 'ACADIANA',
                'value' => 13056770,
              ),
              23 => 
              array (
                'key' => 'Accord Tank Cleaning',
                'value' => 1650,
              ),
              24 => 
              array (
                'key' => 'Ace Brewline',
                'value' => 1651,
              ),
              25 => 
              array (
                'key' => 'Ace Food',
                'value' => 1652,
              ),
              26 => 
              array (
                'key' => 'Ace Food Discharge',
                'value' => 1653,
              ),
              27 => 
              array (
                'key' => 'ACE GARDEN',
                'value' => 14091606,
              ),
              28 => 
              array (
                'key' => 'Ace Gray Food',
                'value' => 1654,
              ),
              29 => 
              array (
                'key' => 'ACE RCR FLEXRITE',
                'value' => 1655,
              ),
              30 => 
              array (
                'key' => 'ACE RCT FLEXRITE',
                'value' => 1656,
              ),
              31 => 
              array (
                'key' => 'ACE RDC FOOD',
                'value' => 1657,
              ),
              32 => 
              array (
                'key' => 'ACE RSD FOOD',
                'value' => 1658,
              ),
              33 => 
              array (
                'key' => 'ACE WASHDOWN',
                'value' => 13056768,
              ),
              34 => 
              array (
                'key' => 'AD SEALING HYDROCARBON DRAIN',
                'value' => 1659,
              ),
              35 => 
              array (
                'key' => 'ADVANTAGE™',
                'value' => 1660,
              ),
              36 => 
              array (
                'key' => 'AEROPAL',
                'value' => 1661,
              ),
              37 => 
              array (
                'key' => 'AEROPAL BCT',
                'value' => 1829413,
              ),
              38 => 
              array (
                'key' => 'AEROPAL C',
                'value' => 1829408,
              ),
              39 => 
              array (
                'key' => 'AEROPAL CT',
                'value' => 1829410,
              ),
              40 => 
              array (
                'key' => 'AEROPAL E',
                'value' => 1829409,
              ),
              41 => 
              array (
                'key' => 'AEROPAL ECT',
                'value' => 1829411,
              ),
              42 => 
              array (
                'key' => 'AEROPAL FCT',
                'value' => 1829412,
              ),
              43 => 
              array (
                'key' => 'AG SPRAY',
                'value' => 1662,
              ),
              44 => 
              array (
                'key' => 'AG TRUCKING',
                'value' => 13056771,
              ),
              45 => 
              array (
                'key' => 'AGCHEM',
                'value' => 1663,
              ),
              46 => 
              array (
                'key' => 'AGCHEM S&D',
                'value' => 1664,
              ),
              47 => 
              array (
                'key' => 'AGGIE GAS™',
                'value' => 1665,
              ),
              48 => 
              array (
                'key' => 'AGRI-FLEX',
                'value' => 1666,
              ),
              49 => 
              array (
                'key' => 'AHR WATER S&D',
                'value' => 1667,
              ),
              50 => 
              array (
                'key' => 'AIR & MULTIPURPOSE',
                'value' => 1829206,
              ),
              51 => 
              array (
                'key' => 'AIR / WATER HOSE',
                'value' => 5759834,
              ),
              52 => 
              array (
                'key' => 'AIR 1000',
                'value' => 1668,
              ),
              53 => 
              array (
                'key' => 'AIR 250',
                'value' => 1669,
              ),
              54 => 
              array (
                'key' => 'AIR 250 / 300 / 400',
                'value' => 5679575,
              ),
              55 => 
              array (
                'key' => 'AIR 300',
                'value' => 1670,
              ),
              56 => 
              array (
                'key' => 'AIR 300 HD',
                'value' => 1671,
              ),
              57 => 
              array (
                'key' => 'AIR 400',
                'value' => 1672,
              ),
              58 => 
              array (
                'key' => 'AIR BREATHING HOSE',
                'value' => 1673,
              ),
              59 => 
              array (
                'key' => 'AIR PSNS',
                'value' => 1674,
              ),
              60 => 
              array (
                'key' => 'AIR PUMP GUNITE',
                'value' => 1675,
              ),
              61 => 
              array (
                'key' => 'AIR TRIX',
                'value' => 1676,
              ),
              62 => 
              array (
                'key' => 'AIR-A-PLANE GLYCOL',
                'value' => 1677,
              ),
              63 => 
              array (
                'key' => 'AIR-WATER 400',
                'value' => 1686,
              ),
              64 => 
              array (
                'key' => 'AIRCRAFT FUEL SENSING',
                'value' => 5601937,
              ),
              65 => 
              array (
                'key' => 'AIRCRAFT FUELING',
                'value' => 1678,
              ),
              66 => 
              array (
                'key' => 'AIRGAS',
                'value' => 7079916,
              ),
              67 => 
              array (
                'key' => 'AIRGAS FRONTIER',
                'value' => 1679,
              ),
              68 => 
              array (
                'key' => 'AIRGAS GRADE R',
                'value' => 1680,
              ),
              69 => 
              array (
                'key' => 'AIRGAS GRADE RM',
                'value' => 1681,
              ),
              70 => 
              array (
                'key' => 'AIRGAS GRADE T',
                'value' => 1682,
              ),
              71 => 
              array (
                'key' => 'AIRGAS INERT GAS',
                'value' => 13056825,
              ),
              72 => 
              array (
                'key' => 'AIRMAX FLEXIMAX',
                'value' => 1683,
              ),
              73 => 
              array (
                'key' => 'AIRMAX PROMAX',
                'value' => 1684,
              ),
              74 => 
              array (
                'key' => 'AIRMAX SUPERMAX',
                'value' => 1685,
              ),
              75 => 
              array (
                'key' => 'AIRSER',
                'value' => 1829328,
              ),
              76 => 
              array (
                'key' => 'AIRSTAR',
                'value' => 7079918,
              ),
              77 => 
              array (
                'key' => 'AJAX',
                'value' => 1687,
              ),
              78 => 
              array (
                'key' => 'ALASKA RUBBER',
                'value' => 1688,
              ),
              79 => 
              array (
                'key' => 'ALCAN MUD STACKING',
                'value' => 1689,
              ),
              80 => 
              array (
                'key' => 'ALCOA POTROOM',
                'value' => 1690,
              ),
              81 => 
              array (
                'key' => 'ALEMITE',
                'value' => 5759833,
              ),
              82 => 
              array (
                'key' => 'ALLCRETE® TEXTILE',
                'value' => 1691,
              ),
              83 => 
              array (
                'key' => 'ALLCRETE® TEXTILE HD',
                'value' => 7278692,
              ),
              84 => 
              array (
                'key' => 'ALLCRETE® WIRE',
                'value' => 1692,
              ),
              85 => 
              array (
                'key' => 'ALLENT GUNITE',
                'value' => 1693,
              ),
              86 => 
              array (
                'key' => 'ALLENT REFRACTORY',
                'value' => 1694,
              ),
              87 => 
              array (
                'key' => 'ALLIED GREENS KEEPER',
                'value' => 13056772,
              ),
              88 => 
              array (
                'key' => 'AMEREX 07648 FIREXB',
                'value' => 1829096,
              ),
              89 => 
              array (
                'key' => 'AMFLO 702-610',
                'value' => 1695,
              ),
              90 => 
              array (
                'key' => 'AMMONIUM NITRATE BLAST',
                'value' => 1696,
              ),
              91 => 
              array (
                'key' => 'AMMONIUM NITRATE HD',
                'value' => 1697,
              ),
              92 => 
              array (
                'key' => 'AMMONIUM NITRATE PELLET',
                'value' => 1698,
              ),
              93 => 
              array (
                'key' => 'ANCHOR AIR',
                'value' => 13056774,
              ),
              94 => 
              array (
                'key' => 'ANSUL 423267',
                'value' => 1829236,
              ),
              95 => 
              array (
                'key' => 'ANSUL 423581',
                'value' => 1829215,
              ),
              96 => 
              array (
                'key' => 'ANSUL 426809',
                'value' => 1829103,
              ),
              97 => 
              array (
                'key' => 'ANSUL 429196',
                'value' => 1829158,
              ),
              98 => 
              array (
                'key' => 'ANSUL 431352',
                'value' => 1829112,
              ),
              99 => 
              array (
                'key' => 'ANSUL 518518',
                'value' => 1829141,
              ),
              100 => 
              array (
                'key' => 'ANSUL 535688',
                'value' => 1829187,
              ),
              101 => 
              array (
                'key' => 'ANSUL 7083',
                'value' => 1829173,
              ),
              102 => 
              array (
                'key' => 'ANSUL 7091',
                'value' => 1829166,
              ),
              103 => 
              array (
                'key' => 'ANSUL 71976',
                'value' => 1829122,
              ),
              104 => 
              array (
                'key' => 'ANSUL 71980',
                'value' => 1829234,
              ),
              105 => 
              array (
                'key' => 'ANSUL 79007',
                'value' => 1829131,
              ),
              106 => 
              array (
                'key' => 'APACHE',
                'value' => 1699,
              ),
              107 => 
              array (
                'key' => 'APOLLO',
                'value' => 1700,
              ),
              108 => 
              array (
                'key' => 'APOLLO FLEXDOCK',
                'value' => 1701,
              ),
              109 => 
              array (
                'key' => 'APPION MEGAFLOW CT5',
                'value' => 1829128,
              ),
              110 => 
              array (
                'key' => 'APPLIED INDUSTRIAL TECH',
                'value' => 1702,
              ),
              111 => 
              array (
                'key' => 'APPLIED JETTING',
                'value' => 1703,
              ),
              112 => 
              array (
                'key' => 'AQUAHAMMER',
                'value' => 1704,
              ),
              113 => 
              array (
                'key' => 'AQUAPAL',
                'value' => 1705,
              ),
              114 => 
              array (
                'key' => 'AR THOMSON',
                'value' => 1829384,
              ),
              115 => 
              array (
                'key' => 'AR THOMSON EXTREME CRIMP',
                'value' => 1706,
              ),
              116 => 
              array (
                'key' => 'ARCAIR 5077MP',
                'value' => 1829172,
              ),
              117 => 
              array (
                'key' => 'ARCAIR INSULATOR',
                'value' => 1707,
              ),
              118 => 
              array (
                'key' => 'ARCHON',
                'value' => 1708,
              ),
              119 => 
              array (
                'key' => 'ARCO BLAST XF',
                'value' => 1709,
              ),
              120 => 
              array (
                'key' => 'ARCTIC EXTREMEFLEX™',
                'value' => 1710,
              ),
              121 => 
              array (
                'key' => 'ARCTIC FLEXTRA',
                'value' => 1711,
              ),
              122 => 
              array (
                'key' => 'ARCTIC FLEXWING®',
                'value' => 1712,
              ),
              123 => 
              array (
                'key' => 'ARCTIC FUEL DISCHARGE',
                'value' => 1713,
              ),
              124 => 
              array (
                'key' => 'ARCTIC LCP3',
                'value' => 1714,
              ),
              125 => 
              array (
                'key' => 'ARCTIC LCP4S',
                'value' => 1715,
              ),
              126 => 
              array (
                'key' => 'ARCTIC LCP6S',
                'value' => 1716,
              ),
              127 => 
              array (
                'key' => 'ARCTIC LR16SC',
                'value' => 1717,
              ),
              128 => 
              array (
                'key' => 'ARCTIC LR2SN',
                'value' => 1718,
              ),
              129 => 
              array (
                'key' => 'ARCTIC ORTAC™',
                'value' => 1719,
              ),
              130 => 
              array (
                'key' => 'ARCTIC ORTAC™ PLUS',
                'value' => 1720,
              ),
              131 => 
              array (
                'key' => 'ARCTIC RIG SUPPLY',
                'value' => 1721,
              ),
              132 => 
              array (
                'key' => 'ARMOR-FLEX PRO',
                'value' => 1728,
              ),
              133 => 
              array (
                'key' => 'ARMORCOAT ACP4',
                'value' => 1723,
              ),
              134 => 
              array (
                'key' => 'ARMORCOAT ARC12',
                'value' => 1724,
              ),
              135 => 
              array (
                'key' => 'ARMORCOAT ARC13',
                'value' => 1725,
              ),
              136 => 
              array (
                'key' => 'ARMORCOAT ARC15',
                'value' => 1726,
              ),
              137 => 
              array (
                'key' => 'ARMORCOAT ARC16SC',
                'value' => 1727,
              ),
              138 => 
              array (
                'key' => 'ARMORCOAT™ ACP3',
                'value' => 1722,
              ),
              139 => 
              array (
                'key' => 'ARMORVIN TOTAL PU TPHF',
                'value' => 13056775,
              ),
              140 => 
              array (
                'key' => 'ARONSON',
                'value' => 1729,
              ),
              141 => 
              array (
                'key' => 'ARPHSE',
                'value' => 1730,
              ),
              142 => 
              array (
                'key' => 'ARTRAC',
                'value' => 1731,
              ),
              143 => 
              array (
                'key' => 'ARVAC SW',
                'value' => 1732,
              ),
              144 => 
              array (
                'key' => 'AS1335 TWIN-LINE',
                'value' => 1733,
              ),
              145 => 
              array (
                'key' => 'AS2435 TYPE 1 AIRBRAKE',
                'value' => 1734,
              ),
              146 => 
              array (
                'key' => 'ASJ',
                'value' => 1735,
              ),
              147 => 
              array (
                'key' => 'ASJ FLEXCRETE TEXTILE',
                'value' => 13056776,
              ),
              148 => 
              array (
                'key' => 'ASJ VERSACRETE',
                'value' => 1736,
              ),
              149 => 
              array (
                'key' => 'ASTARAS INSULATER',
                'value' => 1829229,
              ),
              150 => 
              array (
                'key' => 'ATLANT WATER',
                'value' => 1737,
              ),
              151 => 
              array (
                'key' => 'ATLANTIC 9000',
                'value' => 13056777,
              ),
              152 => 
              array (
                'key' => 'ATLAS',
                'value' => 1738,
              ),
              153 => 
              array (
                'key' => 'ATRUBB NR SPRAY',
                'value' => 1739,
              ),
              154 => 
              array (
                'key' => 'AUGER ARC PILING',
                'value' => 1740,
              ),
              155 => 
              array (
                'key' => 'AUSTIN',
                'value' => 1741,
              ),
              156 => 
              array (
                'key' => 'AUSTIN RUBBER',
                'value' => 1742,
              ),
              157 => 
              array (
                'key' => 'AUTOGRIP',
                'value' => 1743,
              ),
              158 => 
              array (
                'key' => 'AXIAL FAN HAWK PD',
                'value' => 1829526,
              ),
              159 => 
              array (
                'key' => 'BAFSCO',
                'value' => 13056778,
              ),
              160 => 
              array (
                'key' => 'BAHCAL',
                'value' => 1744,
              ),
              161 => 
              array (
                'key' => 'BANDING COIL',
                'value' => 1745,
              ),
              162 => 
              array (
                'key' => 'BARYTES HARDWALL',
                'value' => 7717365,
              ),
              163 => 
              array (
                'key' => 'BC COLD FLEX',
                'value' => 1746,
              ),
              164 => 
              array (
                'key' => 'BC GASOLINE',
                'value' => 1747,
              ),
              165 => 
              array (
                'key' => 'BC MARINA',
                'value' => 1748,
              ),
              166 => 
              array (
                'key' => 'BECKER',
                'value' => 13056779,
              ),
              167 => 
              array (
                'key' => 'BEDFORD',
                'value' => 1749,
              ),
              168 => 
              array (
                'key' => 'BELTERRA',
                'value' => 13056780,
              ),
              169 => 
              array (
                'key' => 'BENTONQUIP',
                'value' => 13056786,
              ),
              170 => 
              array (
                'key' => 'BLACK FLEXTRA II',
                'value' => 1750,
              ),
              171 => 
              array (
                'key' => 'BLACK FLEXTRA II 150',
                'value' => 1829333,
              ),
              172 => 
              array (
                'key' => 'BLACK FLEXWING®',
                'value' => 1751,
              ),
              173 => 
              array (
                'key' => 'BLACK JACK',
                'value' => 5355084,
              ),
              174 => 
              array (
                'key' => 'BLACK SOFTWALL',
                'value' => 5354194,
              ),
              175 => 
              array (
                'key' => 'BLACKHAWK PD',
                'value' => 1829520,
              ),
              176 => 
              array (
                'key' => 'BLAST',
                'value' => 1752,
              ),
              177 => 
              array (
                'key' => 'BLAST HD',
                'value' => 7278691,
              ),
              178 => 
              array (
                'key' => 'BLASTHOLE SLURRY & DEWATERING',
                'value' => 1753,
              ),
              179 => 
              array (
                'key' => 'BLASTHOSE SLURRY',
                'value' => 1829297,
              ),
              180 => 
              array (
                'key' => 'BLASTMASTER HD',
                'value' => 1754,
              ),
              181 => 
              array (
                'key' => 'BLAUDIECK',
                'value' => 1755,
              ),
              182 => 
              array (
                'key' => 'BLAUSTRAHL',
                'value' => 1829415,
              ),
              183 => 
              array (
                'key' => 'BLISSFUL FISHERMAN',
                'value' => 1756,
              ),
              184 => 
              array (
                'key' => 'BLUCOR FLANGE',
                'value' => 1758,
              ),
              185 => 
              array (
                'key' => 'BLUCOR™',
                'value' => 1757,
              ),
              186 => 
              array (
                'key' => 'BLUE FLEXWING®',
                'value' => 1759,
              ),
              187 => 
              array (
                'key' => 'BLUE FLOUR',
                'value' => 1760,
              ),
              188 => 
              array (
                'key' => 'BLUE XTREME STRAIGH RAD HOSE',
                'value' => 1761,
              ),
              189 => 
              array (
                'key' => 'BOOTMOR',
                'value' => 1762,
              ),
              190 => 
              array (
                'key' => 'BOP SLEEVE',
                'value' => 1763,
              ),
              191 => 
              array (
                'key' => 'BOP WRAP',
                'value' => 1764,
              ),
              192 => 
              array (
                'key' => 'BOTTOM LOADING',
                'value' => 1765,
              ),
              193 => 
              array (
                'key' => 'BOWLING',
                'value' => 1829514,
              ),
              194 => 
              array (
                'key' => 'BR7',
                'value' => 1766,
              ),
              195 => 
              array (
                'key' => 'BRAIDAIR',
                'value' => 1767,
              ),
              196 => 
              array (
                'key' => 'BRANHAM AIR',
                'value' => 1829343,
              ),
              197 => 
              array (
                'key' => 'BRANHAM CHEMONE SUPERIOR',
                'value' => 1768,
              ),
              198 => 
              array (
                'key' => 'BREATHING AIR',
                'value' => 1769,
              ),
              199 => 
              array (
                'key' => 'BREATHING AIR HOSE',
                'value' => 1829260,
              ),
              200 => 
              array (
                'key' => 'BREATHING AIR PLUS',
                'value' => 1770,
              ),
              201 => 
              array (
                'key' => 'BRENNTAG',
                'value' => 1771,
              ),
              202 => 
              array (
                'key' => 'BREWERS HOSE',
                'value' => 1772,
              ),
              203 => 
              array (
                'key' => 'BREWLINE',
                'value' => 1773,
              ),
              204 => 
              array (
                'key' => 'BRICK RED AIR',
                'value' => 1774,
              ),
              205 => 
              array (
                'key' => 'BRIDGEPOINT',
                'value' => 1775,
              ),
              206 => 
              array (
                'key' => 'BRIGADE® MINE',
                'value' => 1776,
              ),
              207 => 
              array (
                'key' => 'BRINE',
                'value' => 13056787,
              ),
              208 => 
              array (
                'key' => 'BRINE HOSE',
                'value' => 1777,
              ),
              209 => 
              array (
                'key' => 'BROOM SWEEPER',
                'value' => 1778,
              ),
              210 => 
              array (
                'key' => 'BROTHERS',
                'value' => 13056788,
              ),
              211 => 
              array (
                'key' => 'BROWN FLEXWING®',
                'value' => 1779,
              ),
              212 => 
              array (
                'key' => 'BROWN/BLU FLEX',
                'value' => 1829430,
              ),
              213 => 
              array (
                'key' => 'BSP Flat Seat (British Standard Pipe)',
                'value' => 1829966,
              ),
              214 => 
              array (
                'key' => 'BSPP (British Standard Pipe Parallel)',
                'value' => 1829964,
              ),
              215 => 
              array (
                'key' => 'BSPP (British Standard Pipe Parallel) O-Rings',
                'value' => 3831015,
              ),
              216 => 
              array (
                'key' => 'BSPP, Bonded Seal',
                'value' => 14152432,
              ),
              217 => 
              array (
                'key' => 'BSPP, Bulkhead Locknut',
                'value' => 14152431,
              ),
              218 => 
              array (
                'key' => 'BSPP, Female - NPTF, Male',
                'value' => 14152435,
              ),
              219 => 
              array (
                'key' => 'BSPP, Female – BSPP, Female',
                'value' => 14152433,
              ),
              220 => 
              array (
                'key' => 'BSPP, Female – BSPT, Male',
                'value' => 14152434,
              ),
              221 => 
              array (
                'key' => 'BSPP, Female, Swivel Tee',
                'value' => 14152439,
              ),
              222 => 
              array (
                'key' => 'BSPP, Female, Swivel –  BSPP, Female, Swivel, 90° Elbow',
                'value' => 14152438,
              ),
              223 => 
              array (
                'key' => 'BSPP, Female, Swivel – BSPP,  Female, Swivel, 45° Elbow',
                'value' => 14152437,
              ),
              224 => 
              array (
                'key' => 'BSPP, Female, Swivel – BSPP, Female, Swivel',
                'value' => 14152436,
              ),
              225 => 
              array (
                'key' => 'BSPP, Female, Swivel – BSPP, Female, Swivel,  90° Block Elbow',
                'value' => 14152440,
              ),
              226 => 
              array (
                'key' => 'BSPP, Female, Swivel – BSPP, Male - BSPP, Male Tee',
                'value' => 14152441,
              ),
              227 => 
              array (
                'key' => 'BSPP, Female, Swivel – BSPT, Male, 90° Block Elbow',
                'value' => 14152442,
              ),
              228 => 
              array (
                'key' => 'BSPP, Female, Swivel – JIC 37°, Male',
                'value' => 14153136,
              ),
              229 => 
              array (
                'key' => 'BSPT (British Standard Pipe Tapered)',
                'value' => 1829965,
              ),
              230 => 
              array (
                'key' => 'BUHLER MIAG',
                'value' => 1780,
              ),
              231 => 
              array (
                'key' => 'BULLARD',
                'value' => 1829140,
              ),
              232 => 
              array (
                'key' => 'BUTTERWORTH',
                'value' => 1781,
              ),
              233 => 
              array (
                'key' => 'BUTTERWORTH INC.',
                'value' => 13056789,
              ),
              234 => 
              array (
                'key' => 'BUTYL 200',
                'value' => 1782,
              ),
              235 => 
              array (
                'key' => 'C&J WATER S&D',
                'value' => 1783,
              ),
              236 => 
              array (
                'key' => 'C&T MIL-DTL-13444H-1-6',
                'value' => 1829200,
              ),
              237 => 
              array (
                'key' => 'CABLE CONDUIT',
                'value' => 1784,
              ),
              238 => 
              array (
                'key' => 'CABLE COOLING HOSE',
                'value' => 1785,
              ),
              239 => 
              array (
                'key' => 'CABLE COVER',
                'value' => 1786,
              ),
              240 => 
              array (
                'key' => 'CAMBRG HEALY PII',
                'value' => 1787,
              ),
              241 => 
              array (
                'key' => 'CAMLOK',
                'value' => 1788,
              ),
              242 => 
              array (
                'key' => 'Capest ExtremeFlex™ Food',
                'value' => 14498389,
              ),
              243 => 
              array (
                'key' => 'CAPRI',
                'value' => 13056804,
              ),
              244 => 
              array (
                'key' => 'CARON',
                'value' => 13056790,
              ),
              245 => 
              array (
                'key' => 'CARON ARCTIC FLEX',
                'value' => 1789,
              ),
              246 => 
              array (
                'key' => 'CARON BLACK SOFTWALL',
                'value' => 1790,
              ),
              247 => 
              array (
                'key' => 'CARON FABCHEM',
                'value' => 1791,
              ),
              248 => 
              array (
                'key' => 'CASCADE DRY CEMENT',
                'value' => 1792,
              ),
              249 => 
              array (
                'key' => 'CASCO',
                'value' => 13056791,
              ),
              250 => 
              array (
                'key' => 'Catepillar Flange',
                'value' => 1829977,
              ),
              251 => 
              array (
                'key' => 'CATERPILLAR',
                'value' => 13056792,
              ),
              252 => 
              array (
                'key' => 'Caterpillar Flange O-Rings Code 61 and Code 62 Flange O-Rings',
                'value' => 1831352,
              ),
              253 => 
              array (
                'key' => 'Caterpillar® Flange',
                'value' => 1829961,
              ),
              254 => 
              array (
                'key' => 'CENEX',
                'value' => 1793,
              ),
              255 => 
              array (
                'key' => 'CENEX OT',
                'value' => 1794,
              ),
              256 => 
              array (
                'key' => 'CENTRAL ROCK DRILL',
                'value' => 1795,
              ),
              257 => 
              array (
                'key' => 'CHANGED TO FORTRESS WHITE',
                'value' => 1829316,
              ),
              258 => 
              array (
                'key' => 'CHARTER ROOF DRAIN',
                'value' => 12265903,
              ),
              259 => 
              array (
                'key' => 'CHEM ONE®',
                'value' => 1797,
              ),
              260 => 
              array (
                'key' => 'CHEMICAL ACID DISCHARGE',
                'value' => 1796,
              ),
              261 => 
              array (
                'key' => 'CHEMSTREAM',
                'value' => 1798,
              ),
              262 => 
              array (
                'key' => 'CHLO GARLOK',
                'value' => 1799,
              ),
              263 => 
              array (
                'key' => 'CITGO',
                'value' => 6422706,
              ),
              264 => 
              array (
                'key' => 'CITGO HYDROCARBON DRAIN',
                'value' => 1829202,
              ),
              265 => 
              array (
                'key' => 'CLAM JETTING',
                'value' => 1829434,
              ),
              266 => 
              array (
                'key' => 'CLEANJET',
                'value' => 1800,
              ),
              267 => 
              array (
                'key' => 'CLEANJET FDA',
                'value' => 1801,
              ),
              268 => 
              array (
                'key' => 'CLEAR PVC TUBING',
                'value' => 1802,
              ),
              269 => 
              array (
                'key' => 'CLEARWATER',
                'value' => 1803,
              ),
              270 => 
              array (
                'key' => 'CLEARWATER FLEXTRA NSF',
                'value' => 4683628,
              ),
              271 => 
              array (
                'key' => 'CLEARWATER SOFTWALL NSF',
                'value' => 4683629,
              ),
              272 => 
              array (
                'key' => 'Clip Pliers',
                'value' => 1830006,
              ),
              273 => 
              array (
                'key' => 'CMT FLEXIBLES LIMITED',
                'value' => 13056796,
              ),
              274 => 
              array (
                'key' => 'CNH',
                'value' => 7563318,
              ),
              275 => 
              array (
                'key' => 'CO2 HOSE',
                'value' => 1804,
              ),
              276 => 
              array (
                'key' => 'COAST GUARD',
                'value' => 1805,
              ),
              277 => 
              array (
                'key' => 'Code 61 Flange',
                'value' => 1829959,
              ),
              278 => 
              array (
                'key' => 'Code 61 Flange',
                'value' => 1829976,
              ),
              279 => 
              array (
                'key' => 'Code 61 Split Flange Clamp Kits ',
                'value' => 1831353,
              ),
              280 => 
              array (
                'key' => 'Code 62 Flange',
                'value' => 1829960,
              ),
              281 => 
              array (
                'key' => 'Code 62 Split Flange Clamp Kits',
                'value' => 3831018,
              ),
              282 => 
              array (
                'key' => 'COLD BLUE',
                'value' => 1806,
              ),
              283 => 
              array (
                'key' => 'COLD BLUE FLEX',
                'value' => 7186051,
              ),
              284 => 
              array (
                'key' => 'COLD FLEX',
                'value' => 13056797,
              ),
              285 => 
              array (
                'key' => 'COLLECTOR FLEX',
                'value' => 1808,
              ),
              286 => 
              array (
                'key' => 'COLLECTOR®',
                'value' => 1807,
              ),
              287 => 
              array (
                'key' => 'COLORITE',
                'value' => 1809,
              ),
              288 => 
              array (
                'key' => 'Compressor O-Ring Tube',
                'value' => 1829980,
              ),
              289 => 
              array (
                'key' => 'Compressor Pad Block',
                'value' => 1829988,
              ),
              290 => 
              array (
                'key' => 'CON FORM SUPER FLEX',
                'value' => 1810,
              ),
              291 => 
              array (
                'key' => 'CON-AG ECO',
                'value' => 6951845,
              ),
              292 => 
              array (
                'key' => 'CON-AG WATER S&D',
                'value' => 1811,
              ),
              293 => 
              array (
                'key' => 'CON-AG WATER S&D ECO',
                'value' => 7278690,
              ),
              294 => 
              array (
                'key' => 'CON-TECH',
                'value' => 1829228,
              ),
              295 => 
              array (
                'key' => 'CONCRETE G820',
                'value' => 1812,
              ),
              296 => 
              array (
                'key' => 'CONCRETE VIBRATOR',
                'value' => 1813,
              ),
              297 => 
              array (
                'key' => 'CONTI A&M',
                'value' => 1829426,
              ),
              298 => 
              array (
                'key' => 'CONTI BLUE STEAM FDA',
                'value' => 5554379,
              ),
              299 => 
              array (
                'key' => 'CONTI CEMENTING',
                'value' => 13295421,
              ),
              300 => 
              array (
                'key' => 'CONTI CHEM EXTRA',
                'value' => 7085031,
              ),
              301 => 
              array (
                'key' => 'CONTI CHEM OIL',
                'value' => 1814,
              ),
              302 => 
              array (
                'key' => 'CONTI CHEM PHARMA',
                'value' => 1815,
              ),
              303 => 
              array (
                'key' => 'CONTI CHEM STANDARD',
                'value' => 1816,
              ),
              304 => 
              array (
                'key' => 'CONTI CHEM SUPERIOR FEP',
                'value' => 1817,
              ),
              305 => 
              array (
                'key' => 'CONTI FEP',
                'value' => 7092828,
              ),
              306 => 
              array (
                'key' => 'CONTI FLUX',
                'value' => 13056799,
              ),
              307 => 
              array (
                'key' => 'CONTI FOOD & DRINK FLEX UPE',
                'value' => 10663607,
              ),
              308 => 
              array (
                'key' => 'CONTI PAINT SPRAY',
                'value' => 1818,
              ),
              309 => 
              array (
                'key' => 'CONTI POTABLE WATER',
                'value' => 1819,
              ),
              310 => 
              array (
                'key' => 'CONTI WASTE WATER',
                'value' => 1820,
              ),
              311 => 
              array (
                'key' => 'CONTICHEM',
                'value' => 1829407,
              ),
              312 => 
              array (
                'key' => 'CONTINENTAL / COX REEL',
                'value' => 7082340,
              ),
              313 => 
              array (
                'key' => 'CONTINENTAL MATTE GREEN',
                'value' => 1829282,
              ),
              314 => 
              array (
                'key' => 'CONTINENTAL STEEL STEAM 250',
                'value' => 1821,
              ),
              315 => 
              array (
                'key' => 'CONTI® OIL',
                'value' => 10709285,
              ),
              316 => 
              array (
                'key' => 'CONTI® TARSPRAY',
                'value' => 10705762,
              ),
              317 => 
              array (
                'key' => 'CONTRACTOR 4001',
                'value' => 1822,
              ),
              318 => 
              array (
                'key' => 'CONTRACTOR WATER S&D',
                'value' => 1823,
              ),
              319 => 
              array (
                'key' => 'CONTRACTOR\'S WATER',
                'value' => 1824,
              ),
              320 => 
              array (
                'key' => 'COOLING WATER',
                'value' => 1825,
              ),
              321 => 
              array (
                'key' => 'COOLING WATER 2.0',
                'value' => 1826,
              ),
              322 => 
              array (
                'key' => 'COTTON CLEANER',
                'value' => 1829519,
              ),
              323 => 
              array (
                'key' => 'COUPLING MALE SWIVEL',
                'value' => 1829191,
              ),
              324 => 
              array (
                'key' => 'CPE DISCHARGE',
                'value' => 1827,
              ),
              325 => 
              array (
                'key' => 'CPLAIR AIRCRAFT',
                'value' => 1829348,
              ),
              326 => 
              array (
                'key' => 'CREE BREWERS HOSE',
                'value' => 1828,
              ),
              327 => 
              array (
                'key' => 'CTI',
                'value' => 5355080,
              ),
              328 => 
              array (
                'key' => 'CULGAN',
                'value' => 13056805,
              ),
              329 => 
              array (
                'key' => 'CULVERT',
                'value' => 1829,
              ),
              330 => 
              array (
                'key' => 'DAMPF TRIX 5000',
                'value' => 1830,
              ),
              331 => 
              array (
                'key' => 'DAMPF TRIX 6000',
                'value' => 1831,
              ),
              332 => 
              array (
                'key' => 'DAMPFTRIX 6000',
                'value' => 1829406,
              ),
              333 => 
              array (
                'key' => 'DANICORP',
                'value' => 13056806,
              ),
              334 => 
              array (
                'key' => 'DANICORP DIVERS HOSE',
                'value' => 7837994,
              ),
              335 => 
              array (
                'key' => 'DARCOR RED',
                'value' => 1829318,
              ),
              336 => 
              array (
                'key' => 'DARCY REDWING FUEL OIL',
                'value' => 1832,
              ),
              337 => 
              array (
                'key' => 'DEADMAN AIRCRAFT REFUELING',
                'value' => 1833,
              ),
              338 => 
              array (
                'key' => 'DEADMAN SANDBLAST',
                'value' => 1834,
              ),
              339 => 
              array (
                'key' => 'DEEP BLUE',
                'value' => 1829431,
              ),
              340 => 
              array (
                'key' => 'DEERE',
                'value' => 1835,
              ),
              341 => 
              array (
                'key' => 'DEF DISPENSING',
                'value' => 1836,
              ),
              342 => 
              array (
                'key' => 'DEF TRANSFER',
                'value' => 1837,
              ),
              343 => 
              array (
                'key' => 'DEL TWIN-LINE GRADE R',
                'value' => 1838,
              ),
              344 => 
              array (
                'key' => 'DEL TWIN-LINE GRADE RM',
                'value' => 1839,
              ),
              345 => 
              array (
                'key' => 'DENVER',
                'value' => 1840,
              ),
              346 => 
              array (
                'key' => 'DENVER CONC VIBR',
                'value' => 1841,
              ),
              347 => 
              array (
                'key' => 'DESERT DR16SC',
                'value' => 1842,
              ),
              348 => 
              array (
                'key' => 'DESERT DR1SN',
                'value' => 1843,
              ),
              349 => 
              array (
                'key' => 'DESERT DR2SN',
                'value' => 1844,
              ),
              350 => 
              array (
                'key' => 'DESERT DR5',
                'value' => 1845,
              ),
              351 => 
              array (
                'key' => 'DESERT DUT',
                'value' => 1846,
              ),
              352 => 
              array (
                'key' => 'DEVILBISS',
                'value' => 1829178,
              ),
              353 => 
              array (
                'key' => 'DEWATERING',
                'value' => 1847,
              ),
              354 => 
              array (
                'key' => 'DIAMOND',
                'value' => 1829370,
              ),
              355 => 
              array (
                'key' => 'DIESEL OIL HARDWALL',
                'value' => 1848,
              ),
              356 => 
              array (
                'key' => 'DIESEL OIL SOFTWALL',
                'value' => 1849,
              ),
              357 => 
              array (
                'key' => 'DIGESTER',
                'value' => 1850,
              ),
              358 => 
              array (
                'key' => 'DIISOCYANATE',
                'value' => 1851,
              ),
              359 => 
              array (
                'key' => 'DIN 24 Heavy',
                'value' => 1829968,
              ),
              360 => 
              array (
                'key' => 'DIN 24 Heavy O-Rings',
                'value' => 3831017,
              ),
              361 => 
              array (
                'key' => 'DIN 24 Light',
                'value' => 1829967,
              ),
              362 => 
              array (
                'key' => 'DIN 24 Light O-Rings',
                'value' => 3831016,
              ),
              363 => 
              array (
                'key' => 'DIN 60',
                'value' => 1829969,
              ),
              364 => 
              array (
                'key' => 'DINGA HOT WATER GUN',
                'value' => 1852,
              ),
              365 => 
              array (
                'key' => 'DINGA NOZZLE',
                'value' => 5356966,
              ),
              366 => 
              array (
                'key' => 'DISCHARGE',
                'value' => 1853,
              ),
              367 => 
              array (
                'key' => 'DISHWASHER DRAIN',
                'value' => 1854,
              ),
              368 => 
              array (
                'key' => 'DISTILLERY 150',
                'value' => 1855,
              ),
              369 => 
              array (
                'key' => 'DISTRB ACID',
                'value' => 1856,
              ),
              370 => 
              array (
                'key' => 'DISTRB ARCTIC ORTAC',
                'value' => 1857,
              ),
              371 => 
              array (
                'key' => 'DISTRB STEEL AIR',
                'value' => 1858,
              ),
              372 => 
              array (
                'key' => 'DISTRB WATER S&D',
                'value' => 1859,
              ),
              373 => 
              array (
                'key' => 'DIVERSIFLEX',
                'value' => 1860,
              ),
              374 => 
              array (
                'key' => 'DIVERSIPIPE',
                'value' => 1861,
              ),
              375 => 
              array (
                'key' => 'DIVING HOSE',
                'value' => 1862,
              ),
              376 => 
              array (
                'key' => 'DMC CAUSTIC',
                'value' => 1863,
              ),
              377 => 
              array (
                'key' => 'DOCK',
                'value' => 1864,
              ),
              378 => 
              array (
                'key' => 'DOCK EN1765 L15',
                'value' => 1865,
              ),
              379 => 
              array (
                'key' => 'DOCK EN1765 S15',
                'value' => 1866,
              ),
              380 => 
              array (
                'key' => 'DOCK FDA',
                'value' => 1867,
              ),
              381 => 
              array (
                'key' => 'DOCK SMOOTH BORE HOT SULFUR',
                'value' => 1868,
              ),
              382 => 
              array (
                'key' => 'DOCK SUPPLY SW',
                'value' => 1869,
              ),
              383 => 
              array (
                'key' => 'DR16SC',
                'value' => 1830041,
              ),
              384 => 
              array (
                'key' => 'DRAGER',
                'value' => 7740237,
              ),
              385 => 
              array (
                'key' => 'DREDGE SLEEVE',
                'value' => 1870,
              ),
              386 => 
              array (
                'key' => 'DRILL WATER',
                'value' => 1871,
              ),
              387 => 
              array (
                'key' => 'DRINK FLEX',
                'value' => 5300789,
              ),
              388 => 
              array (
                'key' => 'DRINKLINE',
                'value' => 1872,
              ),
              389 => 
              array (
                'key' => 'DRY CEMENT & BARYTES HW',
                'value' => 7717364,
              ),
              390 => 
              array (
                'key' => 'DRY CEMENT HARDWALL',
                'value' => 7717366,
              ),
              391 => 
              array (
                'key' => 'DRY CEMENT HD HARDWALL',
                'value' => 1873,
              ),
              392 => 
              array (
                'key' => 'DRY CEMENT SOFTWALL',
                'value' => 1874,
              ),
              393 => 
              array (
                'key' => 'DRY ICE HOSE',
                'value' => 1875,
              ),
              394 => 
              array (
                'key' => 'DUAL HI-PERFORMANCE PD',
                'value' => 1829530,
              ),
              395 => 
              array (
                'key' => 'DUAL POSITIVE DRIVE PD',
                'value' => 1829510,
              ),
              396 => 
              array (
                'key' => 'Dual-Grip DGF1 Ferrule',
                'value' => 1830020,
              ),
              397 => 
              array (
                'key' => 'Dual-Grip DGF2 Ferrule',
                'value' => 1830021,
              ),
              398 => 
              array (
                'key' => 'DUDLEY WATER',
                'value' => 1876,
              ),
              399 => 
              array (
                'key' => 'DUNLOP BOOSTER',
                'value' => 1877,
              ),
              400 => 
              array (
                'key' => 'DURACO',
                'value' => 1878,
              ),
              401 => 
              array (
                'key' => 'DURACO ROADPATCH',
                'value' => 1879,
              ),
              402 => 
              array (
                'key' => 'DWE',
                'value' => 1829161,
              ),
              403 => 
              array (
                'key' => 'DYNACRAFT',
                'value' => 1880,
              ),
              404 => 
              array (
                'key' => 'DYNACRAFT D1045-2000',
                'value' => 1829127,
              ),
              405 => 
              array (
                'key' => 'DYNO',
                'value' => 1881,
              ),
              406 => 
              array (
                'key' => 'DYNO HOSE',
                'value' => 1882,
              ),
              407 => 
              array (
                'key' => 'DYNO HOSEINHOSE',
                'value' => 1829231,
              ),
              408 => 
              array (
                'key' => 'DYNO NOBEL',
                'value' => 1829125,
              ),
              409 => 
              array (
                'key' => 'E 1-1',
                'value' => 1883,
              ),
              410 => 
              array (
                'key' => 'E 3-1',
                'value' => 1884,
              ),
              411 => 
              array (
                'key' => 'E 3-2',
                'value' => 1885,
              ),
              412 => 
              array (
                'key' => 'EAGLE AIR & WATER',
                'value' => 1886,
              ),
              413 => 
              array (
                'key' => 'EAGLE FLUID POWER',
                'value' => 1829160,
              ),
              414 => 
              array (
                'key' => 'ECO LITE',
                'value' => 3831424,
              ),
              415 => 
              array (
                'key' => 'ECO RUBBER',
                'value' => 3831423,
              ),
              416 => 
              array (
                'key' => 'ECOLAB',
                'value' => 3831426,
              ),
              417 => 
              array (
                'key' => 'ECOLAB BLUE',
                'value' => 1829110,
              ),
              418 => 
              array (
                'key' => 'ECOLAB WASHDOWN',
                'value' => 1829193,
              ),
              419 => 
              array (
                'key' => 'EDPM DISCHARGE',
                'value' => 1829263,
              ),
              420 => 
              array (
                'key' => 'EHLYNN',
                'value' => 1887,
              ),
              421 => 
              array (
                'key' => 'EHLYNN FLOUR TEC',
                'value' => 1888,
              ),
              422 => 
              array (
                'key' => 'EHLYNN FOOD DISCHARGE',
                'value' => 1889,
              ),
              423 => 
              array (
                'key' => 'EHLYNN HOT AIR',
                'value' => 1890,
              ),
              424 => 
              array (
                'key' => 'EHLYNN PIPE CONNECTOR',
                'value' => 1891,
              ),
              425 => 
              array (
                'key' => 'EHLYNN TPG',
                'value' => 1892,
              ),
              426 => 
              array (
                'key' => 'ELAFLEX LAY FLAT',
                'value' => 1893,
              ),
              427 => 
              array (
                'key' => 'ELITE HOT WATER',
                'value' => 5680554,
              ),
              428 => 
              array (
                'key' => 'ELITE POLY-V',
                'value' => 1829495,
              ),
              429 => 
              array (
                'key' => 'ELITE POLY-V STRETCH',
                'value' => 1829529,
              ),
              430 => 
              array (
                'key' => 'ELITE STANDARD RADIATOR',
                'value' => 1894,
              ),
              431 => 
              array (
                'key' => 'ELITE SW MARINE WET EXHAUST',
                'value' => 1895,
              ),
              432 => 
              array (
                'key' => 'EMERALD',
                'value' => 5759836,
              ),
              433 => 
              array (
                'key' => 'EN12115 PETROLEUM',
                'value' => 1896,
              ),
              434 => 
              array (
                'key' => 'EPDM 200',
                'value' => 1897,
              ),
              435 => 
              array (
                'key' => 'EPDM 200 (ECONOMY)',
                'value' => 1898,
              ),
              436 => 
              array (
                'key' => 'EPDM 200 (NON CON)',
                'value' => 1899,
              ),
              437 => 
              array (
                'key' => 'EPDM ACID',
                'value' => 1900,
              ),
              438 => 
              array (
                'key' => 'EPDM DISCHARGE',
                'value' => 1901,
              ),
              439 => 
              array (
                'key' => 'EPDM S&D',
                'value' => 1902,
              ),
              440 => 
              array (
                'key' => 'EPDM SD HD WATER',
                'value' => 1903,
              ),
              441 => 
              array (
                'key' => 'EPDM SD WATER',
                'value' => 1904,
              ),
              442 => 
              array (
                'key' => 'ERGON',
                'value' => 1905,
              ),
              443 => 
              array (
                'key' => 'ERIKS',
                'value' => 1906,
              ),
              444 => 
              array (
                'key' => 'ESTABROOK',
                'value' => 1829163,
              ),
              445 => 
              array (
                'key' => 'EURO TRIX',
                'value' => 1907,
              ),
              446 => 
              array (
                'key' => 'EXIMCO',
                'value' => 1908,
              ),
              447 => 
              array (
                'key' => 'EXIMCO FLOATER',
                'value' => 1829227,
              ),
              448 => 
              array (
                'key' => 'EXIMCO HYD',
                'value' => 1829402,
              ),
              449 => 
              array (
                'key' => 'EXON GP DOCK',
                'value' => 1909,
              ),
              450 => 
              array (
                'key' => 'EXPRESS BLOWER',
                'value' => 1910,
              ),
              451 => 
              array (
                'key' => 'EXSTATIC',
                'value' => 1911,
              ),
              452 => 
              array (
                'key' => 'EXTREME CRIMP CB STEAM',
                'value' => 1829118,
              ),
              453 => 
              array (
                'key' => 'EXTREMEBLAST LOAD',
                'value' => 1912,
              ),
              454 => 
              array (
                'key' => 'EXTREMEFLEX™ BEVERAGE',
                'value' => 1913,
              ),
              455 => 
              array (
                'key' => 'EXTREMEFLEX™ BROWN',
                'value' => 1914,
              ),
              456 => 
              array (
                'key' => 'EXTREMEFLEX™ FOOD',
                'value' => 1829369,
              ),
              457 => 
              array (
                'key' => 'EXTREMEFLEX™ FOOD BLUE',
                'value' => 1916,
              ),
              458 => 
              array (
                'key' => 'EXTREMEFLEX™ FOOD GRAY',
                'value' => 1917,
              ),
              459 => 
              array (
                'key' => 'EXTREMEFLEX™ FOOD RED',
                'value' => 1829382,
              ),
              460 => 
              array (
                'key' => 'EXTREMEFLEX™ PETROLEUM',
                'value' => 1918,
              ),
              461 => 
              array (
                'key' => 'EXTREMEFLEX™ POTABLE WATER',
                'value' => 1919,
              ),
              462 => 
              array (
                'key' => 'EXTREMEFLEX™ PURPLE',
                'value' => 1915,
              ),
              463 => 
              array (
                'key' => 'EXTREMEFLEX™ VERSIFLO',
                'value' => 1920,
              ),
              464 => 
              array (
                'key' => 'EXTREMEFLEX™ WATER SLURRY',
                'value' => 1921,
              ),
              465 => 
              array (
                'key' => 'EZ GLIDE WINE',
                'value' => 1922,
              ),
              466 => 
              array (
                'key' => 'F5™',
                'value' => 1923,
              ),
              467 => 
              array (
                'key' => 'FABCHEM ARC',
                'value' => 1925,
              ),
              468 => 
              array (
                'key' => 'FABCHEM EN12115',
                'value' => 1926,
              ),
              469 => 
              array (
                'key' => 'FABCHEM-C',
                'value' => 1927,
              ),
              470 => 
              array (
                'key' => 'FABCHEM®',
                'value' => 1924,
              ),
              471 => 
              array (
                'key' => 'FALCON PD',
                'value' => 1829521,
              ),
              472 => 
              array (
                'key' => 'Ferrules',
                'value' => 1830012,
              ),
              473 => 
              array (
                'key' => 'FHP',
                'value' => 1829507,
              ),
              474 => 
              array (
                'key' => 'FIBERG CRUCIBLE GASK',
                'value' => 1928,
              ),
              475 => 
              array (
                'key' => 'FINISHING BRANDS',
                'value' => 1929,
              ),
              476 => 
              array (
                'key' => 'FINN',
                'value' => 1829171,
              ),
              477 => 
              array (
                'key' => 'FIRE ENGINE BOOSTER',
                'value' => 1930,
              ),
              478 => 
              array (
                'key' => 'FIRE ENGINE SUCTION',
                'value' => 1931,
              ),
              479 => 
              array (
                'key' => 'FIRE ENGINER BOOSTER',
                'value' => 1932,
              ),
              480 => 
              array (
                'key' => 'FIRE EXTINGUISHER UL92',
                'value' => 5679576,
              ),
              481 => 
              array (
                'key' => 'FIRE S&D',
                'value' => 1829433,
              ),
              482 => 
              array (
                'key' => 'FISH HOSE',
                'value' => 1933,
              ),
              483 => 
              array (
                'key' => 'FISH SUCTION',
                'value' => 1829238,
              ),
              484 => 
              array (
                'key' => 'FISH TRANSFER',
                'value' => 1934,
              ),
              485 => 
              array (
                'key' => 'Flange Engine Oil Connection (Two Bolt)',
                'value' => 1830007,
              ),
              486 => 
              array (
                'key' => 'Flareless Tube',
                'value' => 1829981,
              ),
              487 => 
              array (
                'key' => 'Flareless Tube Fittings',
                'value' => 1829955,
              ),
              488 => 
              array (
                'key' => 'Flareless Tube Nuts',
                'value' => 1829994,
              ),
              489 => 
              array (
                'key' => 'Flareless Tube Sleeves',
                'value' => 1829995,
              ),
              490 => 
              array (
                'key' => 'FLASH',
                'value' => 5355083,
              ),
              491 => 
              array (
                'key' => 'FLDCON',
                'value' => 1935,
              ),
              492 => 
              array (
                'key' => 'FLEX-ING FLEX AQUA WATER S&D',
                'value' => 1943,
              ),
              493 => 
              array (
                'key' => 'FLEX-ING FLEX-ON',
                'value' => 1944,
              ),
              494 => 
              array (
                'key' => 'FLEX-PULSE FPII',
                'value' => 1946,
              ),
              495 => 
              array (
                'key' => 'FLEXAGRIP™',
                'value' => 1936,
              ),
              496 => 
              array (
                'key' => 'FLEXCHEM 225',
                'value' => 1937,
              ),
              497 => 
              array (
                'key' => 'FLEXDOCK',
                'value' => 1938,
              ),
              498 => 
              array (
                'key' => 'FLEXDOCK VERSAFUEL',
                'value' => 1939,
              ),
              499 => 
              array (
                'key' => 'FLEXIBLE DOWNSPOUT',
                'value' => 1940,
              ),
              500 => 
              array (
                'key' => 'FLEXIBLE TEFLON',
                'value' => 1941,
              ),
              501 => 
              array (
                'key' => 'FLEXICORE',
                'value' => 1942,
              ),
              502 => 
              array (
                'key' => 'FLEXILLA',
                'value' => 1829099,
              ),
              503 => 
              array (
                'key' => 'FLEXING FLEX-ON',
                'value' => 1829124,
              ),
              504 => 
              array (
                'key' => 'FLEXJET',
                'value' => 1945,
              ),
              505 => 
              array (
                'key' => 'FLEXON',
                'value' => 1829094,
              ),
              506 => 
              array (
                'key' => 'FLEXRITE',
                'value' => 1947,
              ),
              507 => 
              array (
                'key' => 'FLEXSHIELD SAE J1527 A1-15',
                'value' => 1829362,
              ),
              508 => 
              array (
                'key' => 'FLEXSHIELD SAE J1527 TYPE A1-15',
                'value' => 1948,
              ),
              509 => 
              array (
                'key' => 'FLEXSTEEL® 250 CB EXTREME CRIMP',
                'value' => 1949,
              ),
              510 => 
              array (
                'key' => 'FLEXSTEEL® 250 CB STEAM',
                'value' => 1950,
              ),
              511 => 
              array (
                'key' => 'FLEXSTEEL® 250 EPDM',
                'value' => 1829327,
              ),
              512 => 
              array (
                'key' => 'FLEXSTEEL® 250 EPDM-20',
                'value' => 1951,
              ),
              513 => 
              array (
                'key' => 'FLEXSTEEL® 250 ORS STEAM',
                'value' => 1952,
              ),
              514 => 
              array (
                'key' => 'FLEXSTEEL® 250 STEAM',
                'value' => 1953,
              ),
              515 => 
              array (
                'key' => 'FLEXSTEEL® FUTURA',
                'value' => 1954,
              ),
              516 => 
              array (
                'key' => 'FLEXSTEEL® FUTURA B20',
                'value' => 1955,
              ),
              517 => 
              array (
                'key' => 'FLEXSTEEL® FUTURA E25',
                'value' => 1956,
              ),
              518 => 
              array (
                'key' => 'FLEXSTEEL® FUTURA ETHAN-ALL',
                'value' => 1957,
              ),
              519 => 
              array (
                'key' => 'FLEXSTEEL® FUTURA HVR',
                'value' => 1958,
              ),
              520 => 
              array (
                'key' => 'FLEXSTEEL® FUTURA HVR LOW PERM',
                'value' => 1959,
              ),
              521 => 
              array (
                'key' => 'FLEXSTEEL® FUTURA LOW PERM',
                'value' => 1960,
              ),
              522 => 
              array (
                'key' => 'FLEXSTEEL® FUTURA VAPOR ASSIST',
                'value' => 1961,
              ),
              523 => 
              array (
                'key' => 'FLEXSTEEL® HW',
                'value' => 1829212,
              ),
              524 => 
              array (
                'key' => 'FLEXSTEEL® MINESPRAY',
                'value' => 1963,
              ),
              525 => 
              array (
                'key' => 'FLEXSTEEL® SERVICE STATION AIR',
                'value' => 1964,
              ),
              526 => 
              array (
                'key' => 'FLEXSTEEL®MINE SPRAY',
                'value' => 1962,
              ),
              527 => 
              array (
                'key' => 'FLEXTRA DRY MATERIAL',
                'value' => 1965,
              ),
              528 => 
              array (
                'key' => 'FLEXTRA FOOD LT',
                'value' => 1966,
              ),
              529 => 
              array (
                'key' => 'FLEXTRA LT BLUE',
                'value' => 1829367,
              ),
              530 => 
              array (
                'key' => 'FLEXTRA OILFIELD',
                'value' => 1967,
              ),
              531 => 
              array (
                'key' => 'FLEXTRA PETROLEUM',
                'value' => 7287904,
              ),
              532 => 
              array (
                'key' => 'FLEXTRA ROCK DUST',
                'value' => 1968,
              ),
              533 => 
              array (
                'key' => 'FLEXTRAL',
                'value' => 5764904,
              ),
              534 => 
              array (
                'key' => 'FLEXTRAL GRIP-LOC',
                'value' => 1829179,
              ),
              535 => 
              array (
                'key' => 'FLEXTRAL J2',
                'value' => 1829399,
              ),
              536 => 
              array (
                'key' => 'FLEXWAC',
                'value' => 1969,
              ),
              537 => 
              array (
                'key' => 'FLEXWING® FOOD',
                'value' => 3947663,
              ),
              538 => 
              array (
                'key' => 'FLEXWING® FOOD BLUE',
                'value' => 1970,
              ),
              539 => 
              array (
                'key' => 'FLEXWING® OILFIELD',
                'value' => 1971,
              ),
              540 => 
              array (
                'key' => 'FLEXWING® PETROLEUM',
                'value' => 1972,
              ),
              541 => 
              array (
                'key' => 'FLEXWING® VERSAFUEL',
                'value' => 1973,
              ),
              542 => 
              array (
                'key' => 'FLEXWING® WATER S&D',
                'value' => 1974,
              ),
              543 => 
              array (
                'key' => 'FLOATER',
                'value' => 1975,
              ),
              544 => 
              array (
                'key' => 'FLOATING HOSES',
                'value' => 1976,
              ),
              545 => 
              array (
                'key' => 'FLOUR DISCHARGE',
                'value' => 1977,
              ),
              546 => 
              array (
                'key' => 'FLUOROPAL',
                'value' => 1978,
              ),
              547 => 
              array (
                'key' => 'FOAM',
                'value' => 1979,
              ),
              548 => 
              array (
                'key' => 'FOOD 2720',
                'value' => 1980,
              ),
              549 => 
              array (
                'key' => 'FOOD DISCHARGE',
                'value' => 1981,
              ),
              550 => 
              array (
                'key' => 'FOOD FLEX',
                'value' => 1982,
              ),
              551 => 
              array (
                'key' => 'FOOD S&D',
                'value' => 1983,
              ),
              552 => 
              array (
                'key' => 'FOODCLEAN',
                'value' => 1984,
              ),
              553 => 
              array (
                'key' => 'FOODLINER',
                'value' => 1985,
              ),
              554 => 
              array (
                'key' => 'Ford Spring Lock',
                'value' => 1829989,
              ),
              555 => 
              array (
                'key' => 'FORECAST BLAST',
                'value' => 1986,
              ),
              556 => 
              array (
                'key' => 'FORECAST BLAST XF',
                'value' => 1987,
              ),
              557 => 
              array (
                'key' => 'FORECAST SUCTION',
                'value' => 1988,
              ),
              558 => 
              array (
                'key' => 'FORESTRY',
                'value' => 1989,
              ),
              559 => 
              array (
                'key' => 'FORMADRAIN INFLATABLE HOSE',
                'value' => 1990,
              ),
              560 => 
              array (
                'key' => 'FORTRESS',
                'value' => 1991,
              ),
              561 => 
              array (
                'key' => 'FOSTER',
                'value' => 1992,
              ),
              562 => 
              array (
                'key' => 'FRAC',
                'value' => 1993,
              ),
              563 => 
              array (
                'key' => 'FRAC ACID S&D',
                'value' => 1994,
              ),
              564 => 
              array (
                'key' => 'FRAC ACID S&D 400',
                'value' => 1829354,
              ),
              565 => 
              array (
                'key' => 'FRAC BLENDING 500SD',
                'value' => 1829374,
              ),
              566 => 
              array (
                'key' => 'FRAC BLENDING S&D',
                'value' => 1995,
              ),
              567 => 
              array (
                'key' => 'FRACO',
                'value' => 1996,
              ),
              568 => 
              array (
                'key' => 'FREON CHARGING',
                'value' => 1997,
              ),
              569 => 
              array (
                'key' => 'FRIG SEA',
                'value' => 1998,
              ),
              570 => 
              array (
                'key' => 'FRONTIER®',
                'value' => 1999,
              ),
              571 => 
              array (
                'key' => 'FUEL DISCHARGE',
                'value' => 2000,
              ),
              572 => 
              array (
                'key' => 'FUEL DISCHARGE 150',
                'value' => 1829337,
              ),
              573 => 
              array (
                'key' => 'FUEL DISCHARGE 200',
                'value' => 1829405,
              ),
              574 => 
              array (
                'key' => 'FUEL DISCHARGE 250',
                'value' => 1829237,
              ),
              575 => 
              array (
                'key' => 'FUEL DISCHARGE 300',
                'value' => 1829373,
              ),
              576 => 
              array (
                'key' => 'FUEL DISCHARGE HD',
                'value' => 2001,
              ),
              577 => 
              array (
                'key' => 'FUEL DISCHARGE HD 300',
                'value' => 1829422,
              ),
              578 => 
              array (
                'key' => 'FUEL FILL SAE J1527 TYPE A2',
                'value' => 2002,
              ),
              579 => 
              array (
                'key' => 'FUEL RIG SW',
                'value' => 2003,
              ),
              580 => 
              array (
                'key' => 'FUELGRIP COUPLING',
                'value' => 2004,
              ),
              581 => 
              array (
                'key' => 'FUGGITT',
                'value' => 2005,
              ),
              582 => 
              array (
                'key' => 'FUJI',
                'value' => 2006,
              ),
              583 => 
              array (
                'key' => 'FURNACE DOOR',
                'value' => 2007,
              ),
              584 => 
              array (
                'key' => 'FUTURA O-RING KIT',
                'value' => 2008,
              ),
              585 => 
              array (
                'key' => 'FUTURA RET RING INST. TOOL',
                'value' => 2009,
              ),
              586 => 
              array (
                'key' => 'GALAXY G4826',
                'value' => 2010,
              ),
              587 => 
              array (
                'key' => 'GALAXY G4867',
                'value' => 2011,
              ),
              588 => 
              array (
                'key' => 'GALAXY G4890',
                'value' => 2012,
              ),
              589 => 
              array (
                'key' => 'GALVANATOR®',
                'value' => 2013,
              ),
              590 => 
              array (
                'key' => 'GAMMON',
                'value' => 2014,
              ),
              591 => 
              array (
                'key' => 'GARDEN HOSE',
                'value' => 1829286,
              ),
              592 => 
              array (
                'key' => 'GARRISON GAUNTLET',
                'value' => 1829424,
              ),
              593 => 
              array (
                'key' => 'GATES',
                'value' => 1829135,
              ),
              594 => 
              array (
                'key' => 'GATES 32000002',
                'value' => 1829418,
              ),
              595 => 
              array (
                'key' => 'GATES 32000003',
                'value' => 1829305,
              ),
              596 => 
              array (
                'key' => 'GATES 32000006',
                'value' => 1829245,
              ),
              597 => 
              array (
                'key' => 'GATES 32000007',
                'value' => 1829294,
              ),
              598 => 
              array (
                'key' => 'GATES 32000008',
                'value' => 1829247,
              ),
              599 => 
              array (
                'key' => 'GATES 32000009',
                'value' => 1829209,
              ),
              600 => 
              array (
                'key' => 'GATES 32000011',
                'value' => 1829265,
              ),
              601 => 
              array (
                'key' => 'GATES 32000012',
                'value' => 1829276,
              ),
              602 => 
              array (
                'key' => 'GATES 32000013',
                'value' => 1829254,
              ),
              603 => 
              array (
                'key' => 'GATES 32000014',
                'value' => 1829213,
              ),
              604 => 
              array (
                'key' => 'GATES 32000015',
                'value' => 1829419,
              ),
              605 => 
              array (
                'key' => 'GATES 32000016',
                'value' => 1829235,
              ),
              606 => 
              array (
                'key' => 'GATES 32000213',
                'value' => 1829420,
              ),
              607 => 
              array (
                'key' => 'GATES 32020011',
                'value' => 1829185,
              ),
              608 => 
              array (
                'key' => 'GATES 32020016',
                'value' => 1829390,
              ),
              609 => 
              array (
                'key' => 'GATES 32020021',
                'value' => 1829391,
              ),
              610 => 
              array (
                'key' => 'GATES 32020027',
                'value' => 1829392,
              ),
              611 => 
              array (
                'key' => 'GATES 32041328',
                'value' => 1829151,
              ),
              612 => 
              array (
                'key' => 'GATES 32041346',
                'value' => 1829126,
              ),
              613 => 
              array (
                'key' => 'GATES 32041349',
                'value' => 1829194,
              ),
              614 => 
              array (
                'key' => 'GATES 32041355',
                'value' => 1829136,
              ),
              615 => 
              array (
                'key' => 'GATES 32041364',
                'value' => 1829148,
              ),
              616 => 
              array (
                'key' => 'GATES 32041425',
                'value' => 1829267,
              ),
              617 => 
              array (
                'key' => 'GATES 32041437',
                'value' => 1829394,
              ),
              618 => 
              array (
                'key' => 'GATES 32050016',
                'value' => 1829284,
              ),
              619 => 
              array (
                'key' => 'GATES 32050026',
                'value' => 1829250,
              ),
              620 => 
              array (
                'key' => 'GATES 32050031',
                'value' => 1829259,
              ),
              621 => 
              array (
                'key' => 'GATES 32050036',
                'value' => 1829240,
              ),
              622 => 
              array (
                'key' => 'GATES 32050040',
                'value' => 1829208,
              ),
              623 => 
              array (
                'key' => 'GATES 32050041',
                'value' => 1829177,
              ),
              624 => 
              array (
                'key' => 'GATES 32050046',
                'value' => 1829146,
              ),
              625 => 
              array (
                'key' => 'GATES 32050049',
                'value' => 1829244,
              ),
              626 => 
              array (
                'key' => 'GATES 32050055',
                'value' => 1829181,
              ),
              627 => 
              array (
                'key' => 'GATES 32050226',
                'value' => 1829308,
              ),
              628 => 
              array (
                'key' => 'GATES 32050231',
                'value' => 1829310,
              ),
              629 => 
              array (
                'key' => 'GATES 32050236',
                'value' => 1829421,
              ),
              630 => 
              array (
                'key' => 'GATES 32050241',
                'value' => 1829303,
              ),
              631 => 
              array (
                'key' => 'GATES 32714397',
                'value' => 1829425,
              ),
              632 => 
              array (
                'key' => 'GATES 3624-0145',
                'value' => 1829261,
              ),
              633 => 
              array (
                'key' => 'GATES GASFLEX',
                'value' => 1829331,
              ),
              634 => 
              array (
                'key' => 'GATES STEAMKING',
                'value' => 1829107,
              ),
              635 => 
              array (
                'key' => 'GAUNTLET®',
                'value' => 2015,
              ),
              636 => 
              array (
                'key' => 'GBT',
                'value' => 7605428,
              ),
              637 => 
              array (
                'key' => 'GENERIC',
                'value' => 2016,
              ),
              638 => 
              array (
                'key' => 'GENERIC AIR',
                'value' => 1829359,
              ),
              639 => 
              array (
                'key' => 'GENERIC AIR 250',
                'value' => 1829312,
              ),
              640 => 
              array (
                'key' => 'GENERIC AIR BREATHING',
                'value' => 7740436,
              ),
              641 => 
              array (
                'key' => 'GENERIC LOW TEMP TANK TRUCK',
                'value' => 2017,
              ),
              642 => 
              array (
                'key' => 'GENERIC PETRO TANK TRUCK',
                'value' => 1829253,
              ),
              643 => 
              array (
                'key' => 'GENERIC PL & GR',
                'value' => 1829332,
              ),
              644 => 
              array (
                'key' => 'GENERIC PLASTER & GROUT',
                'value' => 2018,
              ),
              645 => 
              array (
                'key' => 'GENERIC PUSH-ON',
                'value' => 5299956,
              ),
              646 => 
              array (
                'key' => 'GENERIC VACUUM',
                'value' => 2019,
              ),
              647 => 
              array (
                'key' => 'GENERIC WATER 100D',
                'value' => 1829299,
              ),
              648 => 
              array (
                'key' => 'GENERIC WATER DISCHARGE',
                'value' => 2020,
              ),
              649 => 
              array (
                'key' => 'GENERIC WATER S&D',
                'value' => 2021,
              ),
              650 => 
              array (
                'key' => 'GENLINE',
                'value' => 2022,
              ),
              651 => 
              array (
                'key' => 'GENLINE GL',
                'value' => 2023,
              ),
              652 => 
              array (
                'key' => 'GENLINE GL-802',
                'value' => 2024,
              ),
              653 => 
              array (
                'key' => 'GENLINE GL-803',
                'value' => 2025,
              ),
              654 => 
              array (
                'key' => 'GHX',
                'value' => 2026,
              ),
              655 => 
              array (
                'key' => 'GHX OILFIELD',
                'value' => 1829398,
              ),
              656 => 
              array (
                'key' => 'GHX OILFIELD S&D',
                'value' => 1829395,
              ),
              657 => 
              array (
                'key' => 'GHX PETRO XPOWER',
                'value' => 1829123,
              ),
              658 => 
              array (
                'key' => 'GHX WATER S&D',
                'value' => 1829397,
              ),
              659 => 
              array (
                'key' => 'GHX XPOWER OILFIELD FRAC TANK',
                'value' => 1829186,
              ),
              660 => 
              array (
                'key' => 'GILBARCO',
                'value' => 2027,
              ),
              661 => 
              array (
                'key' => 'GLOBAL',
                'value' => 2028,
              ),
              662 => 
              array (
                'key' => 'GLOBAL M24565-70-H',
                'value' => 1829204,
              ),
              663 => 
              array (
                'key' => 'GNSPEC',
                'value' => 2029,
              ),
              664 => 
              array (
                'key' => 'GNSPEC 100R12',
                'value' => 2030,
              ),
              665 => 
              array (
                'key' => 'GNSPEC 100R16',
                'value' => 2031,
              ),
              666 => 
              array (
                'key' => 'GNSPEC 100R17',
                'value' => 1829224,
              ),
              667 => 
              array (
                'key' => 'GNSPEC 100R2',
                'value' => 2032,
              ),
              668 => 
              array (
                'key' => 'GNSPEC 100R3',
                'value' => 13295418,
              ),
              669 => 
              array (
                'key' => 'GNSPEC 100R6',
                'value' => 2033,
              ),
              670 => 
              array (
                'key' => 'GNSPEC 200 AIR',
                'value' => 2034,
              ),
              671 => 
              array (
                'key' => 'GNSPEC 250 AIR',
                'value' => 2035,
              ),
              672 => 
              array (
                'key' => 'GNSPEC 300 AIR',
                'value' => 2036,
              ),
              673 => 
              array (
                'key' => 'GNSPEC 4001 PRESSURE WASHER',
                'value' => 2037,
              ),
              674 => 
              array (
                'key' => 'GNSPEC 4500 PRESSURE WASHER',
                'value' => 2038,
              ),
              675 => 
              array (
                'key' => 'GNSPEC NR SPRAY',
                'value' => 2039,
              ),
              676 => 
              array (
                'key' => 'GNSPEC PUSH ON 250',
                'value' => 2040,
              ),
              677 => 
              array (
                'key' => 'GOLD SNAKE',
                'value' => 2041,
              ),
              678 => 
              array (
                'key' => 'GOOD FLEX',
                'value' => 2042,
              ),
              679 => 
              array (
                'key' => 'GOODAL',
                'value' => 1829176,
              ),
              680 => 
              array (
                'key' => 'GOODALL',
                'value' => 2043,
              ),
              681 => 
              array (
                'key' => 'GOODALL CHEMICAL',
                'value' => 1829400,
              ),
              682 => 
              array (
                'key' => 'GOODYEAR',
                'value' => 13056782,
              ),
              683 => 
              array (
                'key' => 'GORILLA',
                'value' => 2044,
              ),
              684 => 
              array (
                'key' => 'GP3-11-1 / EN1765:2016 S10',
                'value' => 7989389,
              ),
              685 => 
              array (
                'key' => 'GP3-11-1 / EN1765:2016 S15',
                'value' => 7563309,
              ),
              686 => 
              array (
                'key' => 'GP3-11-1 / EN1765:2016 S21',
                'value' => 7989388,
              ),
              687 => 
              array (
                'key' => 'GR3',
                'value' => 10709286,
              ),
              688 => 
              array (
                'key' => 'GRACO',
                'value' => 2045,
              ),
              689 => 
              array (
                'key' => 'GRACO 079055',
                'value' => 1829134,
              ),
              690 => 
              array (
                'key' => 'GRAINGER',
                'value' => 2046,
              ),
              691 => 
              array (
                'key' => 'GRAY DUCTING',
                'value' => 1829388,
              ),
              692 => 
              array (
                'key' => 'GRAY FLEXTRA® LT',
                'value' => 2047,
              ),
              693 => 
              array (
                'key' => 'GRAY FLEXWING®',
                'value' => 2048,
              ),
              694 => 
              array (
                'key' => 'GRAY FOOD',
                'value' => 2049,
              ),
              695 => 
              array (
                'key' => 'GRAY SUCTION',
                'value' => 2050,
              ),
              696 => 
              array (
                'key' => 'GREASE GUN HOSE',
                'value' => 2051,
              ),
              697 => 
              array (
                'key' => 'GREAT NECK',
                'value' => 2052,
              ),
              698 => 
              array (
                'key' => 'GREAT PLAINS',
                'value' => 2053,
              ),
              699 => 
              array (
                'key' => 'GREEN HORNET XF',
                'value' => 2054,
              ),
              700 => 
              array (
                'key' => 'GREEN XLPE 150',
                'value' => 1829325,
              ),
              701 => 
              array (
                'key' => 'GRINUS',
                'value' => 1829389,
              ),
              702 => 
              array (
                'key' => 'GTF',
                'value' => 1829954,
              ),
              703 => 
              array (
                'key' => 'GUNITE',
                'value' => 2055,
              ),
              704 => 
              array (
                'key' => 'GUNITE (TAN)',
                'value' => 1829353,
              ),
              705 => 
              array (
                'key' => 'H101',
                'value' => 13295419,
              ),
              706 => 
              array (
                'key' => 'HAMILON BLAST',
                'value' => 1829365,
              ),
              707 => 
              array (
                'key' => 'HAMILTON',
                'value' => 5756819,
              ),
              708 => 
              array (
                'key' => 'HAMILTON BLAST',
                'value' => 2056,
              ),
              709 => 
              array (
                'key' => 'HAMILTON HYDROCARBON DRAIN',
                'value' => 2057,
              ),
              710 => 
              array (
                'key' => 'Hammer Union',
                'value' => 1829962,
              ),
              711 => 
              array (
                'key' => 'HANLIO TWIN-LINE (GRADE R)',
                'value' => 1829417,
              ),
              712 => 
              array (
                'key' => 'HANLIO TWIN-LINE GRADE R',
                'value' => 2058,
              ),
              713 => 
              array (
                'key' => 'HART',
                'value' => 2059,
              ),
              714 => 
              array (
                'key' => 'HART BLACK SOFTWALL',
                'value' => 2060,
              ),
              715 => 
              array (
                'key' => 'HART DIISOCYANATE VIPER',
                'value' => 13052942,
              ),
              716 => 
              array (
                'key' => 'HART FABCHEM',
                'value' => 2061,
              ),
              717 => 
              array (
                'key' => 'HART FLOUR DISCHARGE',
                'value' => 2062,
              ),
              718 => 
              array (
                'key' => 'HART HOT AIR',
                'value' => 2063,
              ),
              719 => 
              array (
                'key' => 'HARVEST®',
                'value' => 2064,
              ),
              720 => 
              array (
                'key' => 'HAWAII MARINE',
                'value' => 1829377,
              ),
              721 => 
              array (
                'key' => 'HAWK PD',
                'value' => 1829522,
              ),
              722 => 
              array (
                'key' => 'HD AIR',
                'value' => 2065,
              ),
              723 => 
              array (
                'key' => 'HD AIR & WATER',
                'value' => 2066,
              ),
              724 => 
              array (
                'key' => 'HD AIR 300',
                'value' => 1829289,
              ),
              725 => 
              array (
                'key' => 'HD INDUSTRIAL VACUUM',
                'value' => 2067,
              ),
              726 => 
              array (
                'key' => 'HD PETRO TRANSFER',
                'value' => 2068,
              ),
              727 => 
              array (
                'key' => 'HD VACUUM',
                'value' => 2069,
              ),
              728 => 
              array (
                'key' => 'HD WATER DISCHARGE',
                'value' => 2070,
              ),
              729 => 
              array (
                'key' => 'HD WATER SD',
                'value' => 2071,
              ),
              730 => 
              array (
                'key' => 'HEALY LOW PERM',
                'value' => 1829101,
              ),
              731 => 
              array (
                'key' => 'HEATER HOSE 20R3D2',
                'value' => 2072,
              ),
              732 => 
              array (
                'key' => 'HEATER WATER',
                'value' => 2073,
              ),
              733 => 
              array (
                'key' => 'HEAVY DUTY STEAM PILE DRIVER',
                'value' => 2074,
              ),
              734 => 
              array (
                'key' => 'HEWITT',
                'value' => 2075,
              ),
              735 => 
              array (
                'key' => 'HEWITT AIRCRAFT',
                'value' => 2076,
              ),
              736 => 
              array (
                'key' => 'HEWITT JACRISER',
                'value' => 13052944,
              ),
              737 => 
              array (
                'key' => 'HEX',
                'value' => 1829505,
              ),
              738 => 
              array (
                'key' => 'HI-MINER II',
                'value' => 2077,
              ),
              739 => 
              array (
                'key' => 'HI-PER®',
                'value' => 2078,
              ),
              740 => 
              array (
                'key' => 'HIGHLAND BRINE WATER S&D',
                'value' => 1829287,
              ),
              741 => 
              array (
                'key' => 'HIGHLAND POTABLE WATER S&D',
                'value' => 1829262,
              ),
              742 => 
              array (
                'key' => 'HIGHLAND RAW WATER S&D',
                'value' => 1829268,
              ),
              743 => 
              array (
                'key' => 'HIGHLAND WASTE WATER S&D',
                'value' => 1829315,
              ),
              744 => 
              array (
                'key' => 'HIPER WATER',
                'value' => 2079,
              ),
              745 => 
              array (
                'key' => 'HITECH',
                'value' => 13056781,
              ),
              746 => 
              array (
                'key' => 'HITECH FABCHEM',
                'value' => 13052943,
              ),
              747 => 
              array (
                'key' => 'HITECH WASHDOWN',
                'value' => 1829301,
              ),
              748 => 
              array (
                'key' => 'HOFMAN',
                'value' => 13056807,
              ),
              749 => 
              array (
                'key' => 'HOOSIER FOOD TL',
                'value' => 2080,
              ),
              750 => 
              array (
                'key' => 'HORNET XF',
                'value' => 7186054,
              ),
              751 => 
              array (
                'key' => 'HOSCO',
                'value' => 2081,
              ),
              752 => 
              array (
                'key' => 'HOSE ASSEMBLY COLD',
                'value' => 1829095,
              ),
              753 => 
              array (
                'key' => 'HOSE ASSEMBLY HOT',
                'value' => 1829097,
              ),
              754 => 
              array (
                'key' => 'HOSE GUYS',
                'value' => 1829344,
              ),
              755 => 
              array (
                'key' => 'Hose Joiner',
                'value' => 1829972,
              ),
              756 => 
              array (
                'key' => 'Hose Medner with Sight Glass',
                'value' => 1829990,
              ),
              757 => 
              array (
                'key' => 'Hose Mender',
                'value' => 1829982,
              ),
              758 => 
              array (
                'key' => 'Hose Mender with Sight Glass',
                'value' => 1829983,
              ),
              759 => 
              array (
                'key' => 'Hose Mender, Tee',
                'value' => 1829984,
              ),
              760 => 
              array (
                'key' => 'HOSE POWER',
                'value' => 2082,
              ),
              761 => 
              array (
                'key' => 'HOSEPOWER',
                'value' => 2083,
              ),
              762 => 
              array (
                'key' => 'HOSEPOWER PLASTER & GROUT',
                'value' => 1829401,
              ),
              763 => 
              array (
                'key' => 'HOSINC',
                'value' => 5759835,
              ),
              764 => 
              array (
                'key' => 'HOT AIR',
                'value' => 1829319,
              ),
              765 => 
              array (
                'key' => 'HOT SULFUR',
                'value' => 7654087,
              ),
              766 => 
              array (
                'key' => 'HOT TAR & ASPHALT',
                'value' => 12530046,
              ),
              767 => 
              array (
                'key' => 'HOT TAR & ASPHALT EN13482',
                'value' => 2084,
              ),
              768 => 
              array (
                'key' => 'HOT TAR & ASPHALT ROUGH BORE',
                'value' => 2085,
              ),
              769 => 
              array (
                'key' => 'HOT WATER ELITE',
                'value' => 2086,
              ),
              770 => 
              array (
                'key' => 'HR4',
                'value' => 2087,
              ),
              771 => 
              array (
                'key' => 'HR6',
                'value' => 2088,
              ),
              772 => 
              array (
                'key' => 'HSS WATER JETTING',
                'value' => 1829385,
              ),
              773 => 
              array (
                'key' => 'HUDSON',
                'value' => 2089,
              ),
              774 => 
              array (
                'key' => 'HUMIDIFIER HOSE',
                'value' => 2090,
              ),
              775 => 
              array (
                'key' => 'HUSKY',
                'value' => 2091,
              ),
              776 => 
              array (
                'key' => 'HVLP NON-CONDUCTIVE',
                'value' => 2092,
              ),
              777 => 
              array (
                'key' => 'HW DRY CEMENT & BARITES',
                'value' => 2093,
              ),
              778 => 
              array (
                'key' => 'HW OFFSHORE FUEL',
                'value' => 7610826,
              ),
              779 => 
              array (
                'key' => 'HY-T HEATER HOSE',
                'value' => 1829350,
              ),
              780 => 
              array (
                'key' => 'HY-T PLUS',
                'value' => 1829503,
              ),
              781 => 
              array (
                'key' => 'HY-T TORQUE TEAM',
                'value' => 1829494,
              ),
              782 => 
              array (
                'key' => 'HY-T TORQUE TEAM LAMINATED',
                'value' => 1829502,
              ),
              783 => 
              array (
                'key' => 'HY-T TORQUE TEAM PLUS',
                'value' => 1829499,
              ),
              784 => 
              array (
                'key' => 'HY-T WEDGE',
                'value' => 1829506,
              ),
              785 => 
              array (
                'key' => 'HY-T WEDGE TORQUE TEAM',
                'value' => 1829501,
              ),
              786 => 
              array (
                'key' => 'HYDROCARBON DRAIN',
                'value' => 2094,
              ),
              787 => 
              array (
                'key' => 'HYDROVATOR',
                'value' => 2095,
              ),
              788 => 
              array (
                'key' => 'HYDROVATOR PLUS',
                'value' => 2096,
              ),
              789 => 
              array (
                'key' => 'HyperFlex',
                'value' => 14768965,
              ),
              790 => 
              array (
                'key' => 'I.R.F.',
                'value' => 2097,
              ),
              791 => 
              array (
                'key' => 'IBM COOLING WATER',
                'value' => 2098,
              ),
              792 => 
              array (
                'key' => 'IBRS',
                'value' => 2099,
              ),
              793 => 
              array (
                'key' => 'IBRS FISH HOSE',
                'value' => 1829113,
              ),
              794 => 
              array (
                'key' => 'IBRS FISH S&D',
                'value' => 1829195,
              ),
              795 => 
              array (
                'key' => 'IBRS SANITARY',
                'value' => 2100,
              ),
              796 => 
              array (
                'key' => 'ICE CUTTER HOSE',
                'value' => 2101,
              ),
              797 => 
              array (
                'key' => 'ICS GROUP AIR',
                'value' => 1829356,
              ),
              798 => 
              array (
                'key' => 'IMPERL POLARSHIELD',
                'value' => 1829216,
              ),
              799 => 
              array (
                'key' => 'INERT GAS',
                'value' => 2102,
              ),
              800 => 
              array (
                'key' => 'INET COOLING',
                'value' => 2103,
              ),
              801 => 
              array (
                'key' => 'INFINITY™ CHEM',
                'value' => 1829288,
              ),
              802 => 
              array (
                'key' => 'INFINITY™ CHEMICAL',
                'value' => 2104,
              ),
              803 => 
              array (
                'key' => 'INFINITY™ FOOD',
                'value' => 2105,
              ),
              804 => 
              array (
                'key' => 'INFINITY™ FUEL DROP',
                'value' => 2106,
              ),
              805 => 
              array (
                'key' => 'INFINITY™ FUEL DROP HD',
                'value' => 2107,
              ),
              806 => 
              array (
                'key' => 'INFINITY™ MILK',
                'value' => 2108,
              ),
              807 => 
              array (
                'key' => 'INJECTION COOLANT',
                'value' => 2109,
              ),
              808 => 
              array (
                'key' => 'INLET HOSE',
                'value' => 2110,
              ),
              809 => 
              array (
                'key' => 'Inline Orifice Tubes',
                'value' => 1829996,
              ),
              810 => 
              array (
                'key' => 'INSTA-GRIP™',
                'value' => 1829109,
              ),
              811 => 
              array (
                'key' => 'INSTA-GRIP™ 250',
                'value' => 2111,
              ),
              812 => 
              array (
                'key' => 'INSTA-GRIP™ 300',
                'value' => 2112,
              ),
              813 => 
              array (
                'key' => 'INSTA-GRIP™ HT',
                'value' => 2113,
              ),
              814 => 
              array (
                'key' => 'INSTA-GRIP™ SP',
                'value' => 2114,
              ),
              815 => 
              array (
                'key' => 'INSTA-GRIP™ TC',
                'value' => 2115,
              ),
              816 => 
              array (
                'key' => 'INSTA-LOCK',
                'value' => 2116,
              ),
              817 => 
              array (
                'key' => 'INSTA-LOCK ADAPTER',
                'value' => 1829281,
              ),
              818 => 
              array (
                'key' => 'INSTA-LOCK COUPLER',
                'value' => 1829269,
              ),
              819 => 
              array (
                'key' => 'INSTA-LOCK CRIMP SLEEVE',
                'value' => 1829290,
              ),
              820 => 
              array (
                'key' => 'INSTA-LOCK DUST CAP',
                'value' => 1829167,
              ),
              821 => 
              array (
                'key' => 'INSTA-LOCK DUST PLUG',
                'value' => 1829295,
              ),
              822 => 
              array (
                'key' => 'INSTA-LOCK FERRULE',
                'value' => 1829278,
              ),
              823 => 
              array (
                'key' => 'INSTA-LOCK GASKET',
                'value' => 1829302,
              ),
              824 => 
              array (
                'key' => 'INSTA-LOCK HOSE STEM',
                'value' => 1829277,
              ),
              825 => 
              array (
                'key' => 'INSTA-LOCK JUMP SIZE',
                'value' => 1829251,
              ),
              826 => 
              array (
                'key' => 'INSTA-LOCK SPOOL ADAPTER',
                'value' => 1829314,
              ),
              827 => 
              array (
                'key' => 'INSTA-LOCK TYPE A',
                'value' => 1829243,
              ),
              828 => 
              array (
                'key' => 'INSTA-LOCK TYPE B',
                'value' => 1829248,
              ),
              829 => 
              array (
                'key' => 'INSTA-LOCK TYPE C',
                'value' => 1829119,
              ),
              830 => 
              array (
                'key' => 'INSTA-LOCK TYPE D',
                'value' => 1829115,
              ),
              831 => 
              array (
                'key' => 'INSTA-LOCK TYPE E',
                'value' => 1829223,
              ),
              832 => 
              array (
                'key' => 'INSTA-LOCK TYPE F',
                'value' => 1829285,
              ),
              833 => 
              array (
                'key' => 'INSTA-LOCK™ REPAIR KIT',
                'value' => 7989390,
              ),
              834 => 
              array (
                'key' => 'INSTA-POWER',
                'value' => 1829496,
              ),
              835 => 
              array (
                'key' => 'INTERCHANGE',
                'value' => 5764902,
              ),
              836 => 
              array (
                'key' => 'INTERCHEM',
                'value' => 2117,
              ),
              837 => 
              array (
                'key' => 'INTERM',
                'value' => 2118,
              ),
              838 => 
              array (
                'key' => 'INTERNATIONAL BELT',
                'value' => 2119,
              ),
              839 => 
              array (
                'key' => 'INTERNATIONAL BELT VERSIFLO S&D',
                'value' => 1829393,
              ),
              840 => 
              array (
                'key' => 'IRC DRILL WATER',
                'value' => 2120,
              ),
              841 => 
              array (
                'key' => 'IRPCO',
                'value' => 2121,
              ),
              842 => 
              array (
                'key' => 'IRPCO RED FUEL OIL',
                'value' => 1829155,
              ),
              843 => 
              array (
                'key' => 'IRR',
                'value' => 2122,
              ),
              844 => 
              array (
                'key' => 'IRR FLEX JET',
                'value' => 2123,
              ),
              845 => 
              array (
                'key' => 'IRRIGATION BOOT',
                'value' => 2124,
              ),
              846 => 
              array (
                'key' => 'ISO 3821',
                'value' => 2125,
              ),
              847 => 
              array (
                'key' => 'ISO 8031',
                'value' => 2126,
              ),
              848 => 
              array (
                'key' => 'ITALPR',
                'value' => 2127,
              ),
              849 => 
              array (
                'key' => 'ITALPR TEFLON',
                'value' => 2128,
              ),
              850 => 
              array (
                'key' => 'JACKHAMMER',
                'value' => 2129,
              ),
              851 => 
              array (
                'key' => 'JB INDUSTRIES',
                'value' => 2130,
              ),
              852 => 
              array (
                'key' => 'JET RANGER™',
                'value' => 2131,
              ),
              853 => 
              array (
                'key' => 'JETTING',
                'value' => 2132,
              ),
              854 => 
              array (
                'key' => 'JETTING AND UTILITY',
                'value' => 2133,
              ),
              855 => 
              array (
                'key' => 'JETTING UTILITY',
                'value' => 1829339,
              ),
              856 => 
              array (
                'key' => 'JGB INDUSTRIES',
                'value' => 2134,
              ),
              857 => 
              array (
                'key' => 'JIC 37° Flare',
                'value' => 1829945,
              ),
              858 => 
              array (
                'key' => 'JIC 37° Flare',
                'value' => 1830011,
              ),
              859 => 
              array (
                'key' => 'JIC 37° Male X JIC 37° Male',
                'value' => 7445338,
              ),
              860 => 
              array (
                'key' => 'JIC 37°, MALE - NPTF, MALE',
                'value' => 13295420,
              ),
              861 => 
              array (
                'key' => 'JIS 30 (Paralled Pipe Threads)',
                'value' => 1829971,
              ),
              862 => 
              array (
                'key' => 'JIS 30 (Parallel Pipe Threads)',
                'value' => 1829978,
              ),
              863 => 
              array (
                'key' => 'JOHN DEERE',
                'value' => 2135,
              ),
              864 => 
              array (
                'key' => 'JOHN DEERE WATER S&D',
                'value' => 1829271,
              ),
              865 => 
              array (
                'key' => 'KAPTEC ULTRAFLEX',
                'value' => 2136,
              ),
              866 => 
              array (
                'key' => 'KAPTECH FOOD DICHARGE',
                'value' => 2137,
              ),
              867 => 
              array (
                'key' => 'KCRUBBER AUGER ARC PILING',
                'value' => 1829175,
              ),
              868 => 
              array (
                'key' => 'KELCO BLAST',
                'value' => 2138,
              ),
              869 => 
              array (
                'key' => 'KETEK FLEX PETROLEUM',
                'value' => 2139,
              ),
              870 => 
              array (
                'key' => 'KH DIVERS HOSE',
                'value' => 5580054,
              ),
              871 => 
              array (
                'key' => 'KIDDE 20079 FIRE EX UL92',
                'value' => 1829219,
              ),
              872 => 
              array (
                'key' => 'KIMBALL',
                'value' => 7079915,
              ),
              873 => 
              array (
                'key' => 'KINK GUARD',
                'value' => 1829280,
              ),
              874 => 
              array (
                'key' => 'KINKGUARD',
                'value' => 2140,
              ),
              875 => 
              array (
                'key' => 'KINKGUARD GARDEN HOSE',
                'value' => 1829372,
              ),
              876 => 
              array (
                'key' => 'Komatsu 30 Flare with Metric Threads',
                'value' => 1829970,
              ),
              877 => 
              array (
                'key' => 'Komatsu Flange',
                'value' => 1829963,
              ),
              878 => 
              array (
                'key' => 'L&G GE SANDER HOSE',
                'value' => 1829139,
              ),
              879 => 
              array (
                'key' => 'L&G ROCK DUST SW HD',
                'value' => 1829121,
              ),
              880 => 
              array (
                'key' => 'LABOUR BLUCOR COUPLING',
                'value' => 2141,
              ),
              881 => 
              array (
                'key' => 'LACTOPAL',
                'value' => 2142,
              ),
              882 => 
              array (
                'key' => 'LACTOPAL L',
                'value' => 1829414,
              ),
              883 => 
              array (
                'key' => 'LAKECHARLES',
                'value' => 2143,
              ),
              884 => 
              array (
                'key' => 'LEGACY TPU',
                'value' => 2144,
              ),
              885 => 
              array (
                'key' => 'LG NITRILE',
                'value' => 2145,
              ),
              886 => 
              array (
                'key' => 'LIGHTRAC',
                'value' => 2146,
              ),
              887 => 
              array (
                'key' => 'LIGHTWEIGHT VACUUM',
                'value' => 2147,
              ),
              888 => 
              array (
                'key' => 'LINECRETE',
                'value' => 2148,
              ),
              889 => 
              array (
                'key' => 'LIQUID MUD',
                'value' => 2149,
              ),
              890 => 
              array (
                'key' => 'LIQUID MUD YS',
                'value' => 2150,
              ),
              891 => 
              array (
                'key' => 'LIQUIFORCE',
                'value' => 2151,
              ),
              892 => 
              array (
                'key' => 'LPG DELIVERY PRO',
                'value' => 2152,
              ),
              893 => 
              array (
                'key' => 'LUMPKIN',
                'value' => 1829203,
              ),
              894 => 
              array (
                'key' => 'LW ARCTIC TANK TRUCK',
                'value' => 2153,
              ),
              895 => 
              array (
                'key' => 'LW BLACK FLEXTRA II',
                'value' => 2154,
              ),
              896 => 
              array (
                'key' => 'LW INDUSTRIAL VACUUM',
                'value' => 2155,
              ),
              897 => 
              array (
                'key' => 'M&P MINE CONDUIT',
                'value' => 2156,
              ),
              898 => 
              array (
                'key' => 'M13531J-B3A',
                'value' => 1829133,
              ),
              899 => 
              array (
                'key' => 'MADE IN USA GARDEN',
                'value' => 1829273,
              ),
              900 => 
              array (
                'key' => 'MANUS BLAST',
                'value' => 2157,
              ),
              901 => 
              array (
                'key' => 'MANUS BLAST WHIP',
                'value' => 2158,
              ),
              902 => 
              array (
                'key' => 'MARIAN',
                'value' => 2159,
              ),
              903 => 
              array (
                'key' => 'MARINE BILGE',
                'value' => 2160,
              ),
              904 => 
              array (
                'key' => 'MARINE EXHAUST HOSE',
                'value' => 2161,
              ),
              905 => 
              array (
                'key' => 'MARINE FUEL FEED VENT J1527 B2',
                'value' => 2162,
              ),
              906 => 
              array (
                'key' => 'MARINE FUEL FILL',
                'value' => 2163,
              ),
              907 => 
              array (
                'key' => 'MARINE FUEL LINE',
                'value' => 2164,
              ),
              908 => 
              array (
                'key' => 'MARINE HARDWALL WET EXHAUST',
                'value' => 2165,
              ),
              909 => 
              array (
                'key' => 'MARINE LIVEWELL',
                'value' => 2166,
              ),
              910 => 
              array (
                'key' => 'MARINE OIL FILL',
                'value' => 2167,
              ),
              911 => 
              array (
                'key' => 'MARINE SANITATION',
                'value' => 2168,
              ),
              912 => 
              array (
                'key' => 'MARINE SOFTWALL WET EXHAUST',
                'value' => 2169,
              ),
              913 => 
              array (
                'key' => 'MARINE VACUUM',
                'value' => 2170,
              ),
              914 => 
              array (
                'key' => 'MAST-AIR',
                'value' => 2171,
              ),
              915 => 
              array (
                'key' => 'MASTERCOOL',
                'value' => 2172,
              ),
              916 => 
              array (
                'key' => 'MASTHD',
                'value' => 2173,
              ),
              917 => 
              array (
                'key' => 'MASTHEAD',
                'value' => 1829258,
              ),
              918 => 
              array (
                'key' => 'MASTHEAD CONTRACTOR\'S WATER',
                'value' => 1829352,
              ),
              919 => 
              array (
                'key' => 'MATERIAL HANDLING',
                'value' => 2174,
              ),
              920 => 
              array (
                'key' => 'MATERIAL HANDLING 150',
                'value' => 1829351,
              ),
              921 => 
              array (
                'key' => 'MATERIAL HANDLING DISCHARGE',
                'value' => 2175,
              ),
              922 => 
              array (
                'key' => 'MATERIAL HANDLING DISCHARGE 75',
                'value' => 1829334,
              ),
              923 => 
              array (
                'key' => 'MAXXIM PREMIER ULTRA',
                'value' => 2176,
              ),
              924 => 
              array (
                'key' => 'MCCARTY WATER S&D',
                'value' => 2177,
              ),
              925 => 
              array (
                'key' => 'MCGILL',
                'value' => 2178,
              ),
              926 => 
              array (
                'key' => 'MCP4S',
                'value' => 10663610,
              ),
              927 => 
              array (
                'key' => 'MCP5S',
                'value' => 13295422,
              ),
              928 => 
              array (
                'key' => 'MCP6S',
                'value' => 13295423,
              ),
              929 => 
              array (
                'key' => 'MECR&S',
                'value' => 2179,
              ),
              930 => 
              array (
                'key' => 'MECR&S PAINT SPRAY',
                'value' => 2180,
              ),
              931 => 
              array (
                'key' => 'MER OILFIELD SUCTION',
                'value' => 2181,
              ),
              932 => 
              array (
                'key' => 'MERCURY',
                'value' => 5759837,
              ),
              933 => 
              array (
                'key' => 'MERLETT ARMORVIN HNA',
                'value' => 5347027,
              ),
              934 => 
              array (
                'key' => 'MERLETT RAGNO CA',
                'value' => 5347026,
              ),
              935 => 
              array (
                'key' => 'MERLETT VACUPRESS CRISTAL',
                'value' => 5347028,
              ),
              936 => 
              array (
                'key' => 'MERMAR',
                'value' => 2182,
              ),
              937 => 
              array (
                'key' => 'MESA',
                'value' => 2183,
              ),
              938 => 
              array (
                'key' => 'MESA AMMONIUM NITRATE PELLET',
                'value' => 2184,
              ),
              939 => 
              array (
                'key' => 'MESA DRAIN',
                'value' => 2185,
              ),
              940 => 
              array (
                'key' => 'MESA GUNITE',
                'value' => 2186,
              ),
              941 => 
              array (
                'key' => 'MESA PLASTER & GROUT',
                'value' => 2187,
              ),
              942 => 
              array (
                'key' => 'MESA REFRACTORY GUNITE',
                'value' => 2188,
              ),
              943 => 
              array (
                'key' => 'MESA ROOF DRAIN',
                'value' => 2189,
              ),
              944 => 
              array (
                'key' => 'MESA ROOF DRAIN CHEMICAL',
                'value' => 2190,
              ),
              945 => 
              array (
                'key' => 'Metal Clips',
                'value' => 1830004,
              ),
              946 => 
              array (
                'key' => 'METRIC',
                'value' => 1829524,
              ),
              947 => 
              array (
                'key' => 'MH 500',
                'value' => 1829296,
              ),
              948 => 
              array (
                'key' => 'MH 75',
                'value' => 1829321,
              ),
              949 => 
              array (
                'key' => 'MHPRF 11588G II ST',
                'value' => 2191,
              ),
              950 => 
              array (
                'key' => 'MIDWEST',
                'value' => 2192,
              ),
              951 => 
              array (
                'key' => 'MIDWEST BELTING',
                'value' => 1829336,
              ),
              952 => 
              array (
                'key' => 'MIL 3992F',
                'value' => 1829222,
              ),
              953 => 
              array (
                'key' => 'MIL A-A-59566',
                'value' => 2193,
              ),
              954 => 
              array (
                'key' => 'MIL A-A-59567',
                'value' => 2194,
              ),
              955 => 
              array (
                'key' => 'MIL AA-59567 3-1',
                'value' => 1829292,
              ),
              956 => 
              array (
                'key' => 'MIL-A-A-59565',
                'value' => 2195,
              ),
              957 => 
              array (
                'key' => 'MIL-DTL-13444-I',
                'value' => 2196,
              ),
              958 => 
              array (
                'key' => 'MIL-DTL-13444-III',
                'value' => 2197,
              ),
              959 => 
              array (
                'key' => 'MIL-DTL-13531',
                'value' => 2198,
              ),
              960 => 
              array (
                'key' => 'MIL-DTL-17505',
                'value' => 2199,
              ),
              961 => 
              array (
                'key' => 'MIL-DTL-20176',
                'value' => 2200,
              ),
              962 => 
              array (
                'key' => 'MIL-DTL-22240',
                'value' => 2201,
              ),
              963 => 
              array (
                'key' => 'MIL-DTL-27516',
                'value' => 2202,
              ),
              964 => 
              array (
                'key' => 'MIL-DTL-29210E',
                'value' => 2203,
              ),
              965 => 
              array (
                'key' => 'MIL-DTL-3992',
                'value' => 11047034,
              ),
              966 => 
              array (
                'key' => 'MIL-DTL-6615',
                'value' => 2204,
              ),
              967 => 
              array (
                'key' => 'MIL-DTL-8788',
                'value' => 1830042,
              ),
              968 => 
              array (
                'key' => 'MIL-H-24136/4',
                'value' => 1829435,
              ),
              969 => 
              array (
                'key' => 'MIL-H-24580',
                'value' => 2205,
              ),
              970 => 
              array (
                'key' => 'MIL-H-82127',
                'value' => 2206,
              ),
              971 => 
              array (
                'key' => 'MIL-PRF-11588 TYPE I',
                'value' => 2207,
              ),
              972 => 
              array (
                'key' => 'MIL-PRF-11588 TYPE III',
                'value' => 2208,
              ),
              973 => 
              array (
                'key' => 'MIL-PRF-370 TYPE A',
                'value' => 2209,
              ),
              974 => 
              array (
                'key' => 'MIL-PRF-370 TYPE B',
                'value' => 2210,
              ),
              975 => 
              array (
                'key' => 'MILTARY',
                'value' => 2211,
              ),
              976 => 
              array (
                'key' => 'MILTON',
                'value' => 2212,
              ),
              977 => 
              array (
                'key' => 'MINE CONDUIT',
                'value' => 2213,
              ),
              978 => 
              array (
                'key' => 'MINNICH WATER HD',
                'value' => 1829157,
              ),
              979 => 
              array (
                'key' => 'MISC',
                'value' => 1829256,
              ),
              980 => 
              array (
                'key' => 'MIT TEKTON',
                'value' => 1829142,
              ),
              981 => 
              array (
                'key' => 'MOCCASIN',
                'value' => 2214,
              ),
              982 => 
              array (
                'key' => 'MORRIS AIR SEEDER',
                'value' => 2215,
              ),
              983 => 
              array (
                'key' => 'MORRIS AIR SEEDER LT',
                'value' => 2216,
              ),
              984 => 
              array (
                'key' => 'MOSS RUBBER & EQUIPMENT',
                'value' => 13056795,
              ),
              985 => 
              array (
                'key' => 'MPI',
                'value' => 2217,
              ),
              986 => 
              array (
                'key' => 'MPI 132-0580',
                'value' => 1829159,
              ),
              987 => 
              array (
                'key' => 'MPI 350-0380',
                'value' => 1829230,
              ),
              988 => 
              array (
                'key' => 'MPI 350-0560',
                'value' => 1829153,
              ),
              989 => 
              array (
                'key' => 'MPI 350-0580',
                'value' => 1829093,
              ),
              990 => 
              array (
                'key' => 'MPI HW EXHAUST',
                'value' => 1829300,
              ),
              991 => 
              array (
                'key' => 'MPI HW FUEL FILL',
                'value' => 1829137,
              ),
              992 => 
              array (
                'key' => 'MPI PREMIUM-GUARD MARINE',
                'value' => 2218,
              ),
              993 => 
              array (
                'key' => 'MRS',
                'value' => 1829338,
              ),
              994 => 
              array (
                'key' => 'MSA AIR BREATHING',
                'value' => 1829117,
              ),
              995 => 
              array (
                'key' => 'MSC',
                'value' => 6422707,
              ),
              996 => 
              array (
                'key' => 'MUD CUTTING HW',
                'value' => 2219,
              ),
              997 => 
              array (
                'key' => 'MUD RETURN LINE',
                'value' => 2220,
              ),
              998 => 
              array (
                'key' => 'MUD STACKING',
                'value' => 2221,
              ),
              999 => 
              array (
                'key' => 'MULTISTREAM HW',
                'value' => 2222,
              ),
              1000 => 
              array (
                'key' => 'MULTISTREAM SW',
                'value' => 2223,
              ),
              1001 => 
              array (
                'key' => 'NAFIRE',
                'value' => 2224,
              ),
              1002 => 
              array (
                'key' => 'NAVISTAR',
                'value' => 2225,
              ),
              1003 => 
              array (
                'key' => 'NELSON DUNN',
                'value' => 2226,
              ),
              1004 => 
              array (
                'key' => 'NELSON DUNN CABLE COVER',
                'value' => 1829183,
              ),
              1005 => 
              array (
                'key' => 'NEOTHANE',
                'value' => 1829508,
              ),
              1006 => 
              array (
                'key' => 'NEPTUNE',
                'value' => 2227,
              ),
              1007 => 
              array (
                'key' => 'NESI OILFIELD',
                'value' => 2228,
              ),
              1008 => 
              array (
                'key' => 'NEWLINE',
                'value' => 2229,
              ),
              1009 => 
              array (
                'key' => 'NEWLINE VINTNER RESERVE',
                'value' => 1829255,
              ),
              1010 => 
              array (
                'key' => 'NEWLINE WALKWAY WATER',
                'value' => 1829403,
              ),
              1011 => 
              array (
                'key' => 'NISHIN',
                'value' => 2230,
              ),
              1012 => 
              array (
                'key' => 'NISSHIN',
                'value' => 2231,
              ),
              1013 => 
              array (
                'key' => 'NITRO FLOOD WATER S&D',
                'value' => 2232,
              ),
              1014 => 
              array (
                'key' => 'NITRO R&C WATER S&D',
                'value' => 2233,
              ),
              1015 => 
              array (
                'key' => 'NITROGEN SERVICE',
                'value' => 2234,
              ),
              1016 => 
              array (
                'key' => 'NOTRAX T43S5050RD',
                'value' => 1829207,
              ),
              1017 => 
              array (
                'key' => 'NOV',
                'value' => 2235,
              ),
              1018 => 
              array (
                'key' => 'NPETRO LW',
                'value' => 2236,
              ),
              1019 => 
              array (
                'key' => 'NPM API',
                'value' => 1829979,
              ),
              1020 => 
              array (
                'key' => 'NPSM',
                'value' => 1829953,
              ),
              1021 => 
              array (
                'key' => 'NPT API',
                'value' => 1829974,
              ),
              1022 => 
              array (
                'key' => 'NPT API Hammer Union ',
                'value' => 1830010,
              ),
              1023 => 
              array (
                'key' => 'NPTF',
                'value' => 1829952,
              ),
              1024 => 
              array (
                'key' => 'NPTF Male X NPSM Female Swivel',
                'value' => 7445339,
              ),
              1025 => 
              array (
                'key' => 'NPTF, Male – NPSM, Female, Swivel',
                'value' => 14152430,
              ),
              1026 => 
              array (
                'key' => 'NPTF, Male – NPTF, Male, Hex Nipple',
                'value' => 14152429,
              ),
              1027 => 
              array (
                'key' => 'NR SPRAY',
                'value' => 2237,
              ),
              1028 => 
              array (
                'key' => 'NR7',
                'value' => 2238,
              ),
              1029 => 
              array (
                'key' => 'NR8',
                'value' => 2239,
              ),
              1030 => 
              array (
                'key' => 'NRP JONES CT5',
                'value' => 1829196,
              ),
              1031 => 
              array (
                'key' => 'NRP JONES NON-UL CT5',
                'value' => 1829120,
              ),
              1032 => 
              array (
                'key' => 'NSH',
                'value' => 2240,
              ),
              1033 => 
              array (
                'key' => 'NUTRIFLEX',
                'value' => 2241,
              ),
              1034 => 
              array (
                'key' => 'NUTRIFLEX™ S&D',
                'value' => 2243,
              ),
              1035 => 
              array (
                'key' => 'NUTRIFLEX™ STATIC WIRE',
                'value' => 2242,
              ),
              1036 => 
              array (
                'key' => 'NUTRIFLO® S&D',
                'value' => 2244,
              ),
              1037 => 
              array (
                'key' => 'O-Ring Boss ',
                'value' => 1830009,
              ),
              1038 => 
              array (
                'key' => 'O-Ring Boss Straight Thread',
                'value' => 1829958,
              ),
              1039 => 
              array (
                'key' => 'O-Ring Boss Straight Thread',
                'value' => 1829975,
              ),
              1040 => 
              array (
                'key' => 'O-Ring Boss Straight Thread O-Rings',
                'value' => 1831351,
              ),
              1041 => 
              array (
                'key' => 'O-Ring Face Seal',
                'value' => 1829957,
              ),
              1042 => 
              array (
                'key' => 'O-Ring Face Seal',
                'value' => 1829991,
              ),
              1043 => 
              array (
                'key' => 'O-Ring Face Seal O-Rings',
                'value' => 1831350,
              ),
              1044 => 
              array (
                'key' => 'O-Ring for Ford Spring Lock',
                'value' => 1829997,
              ),
              1045 => 
              array (
                'key' => 'O-Ring for Switch',
                'value' => 1829998,
              ),
              1046 => 
              array (
                'key' => 'O-Ring for Tube Fittings',
                'value' => 1829999,
              ),
              1047 => 
              array (
                'key' => 'O-Ring Insert',
                'value' => 1829985,
              ),
              1048 => 
              array (
                'key' => 'O-Ring Tube',
                'value' => 1829986,
              ),
              1049 => 
              array (
                'key' => 'O-Ring Tube (Female to O-Ring Insert)',
                'value' => 1829993,
              ),
              1050 => 
              array (
                'key' => 'O-Ring Tube Compressor (Female to O-Ring Insert) ',
                'value' => 1829992,
              ),
              1051 => 
              array (
                'key' => 'OAKLEY',
                'value' => 2245,
              ),
              1052 => 
              array (
                'key' => 'OFFSHORE FUEL',
                'value' => 2246,
              ),
              1053 => 
              array (
                'key' => 'OFFSHORE FUEL 500',
                'value' => 1829275,
              ),
              1054 => 
              array (
                'key' => 'OFFSHORE FUEL 750',
                'value' => 1829364,
              ),
              1055 => 
              array (
                'key' => 'OFFSHORE VIPER',
                'value' => 2247,
              ),
              1056 => 
              array (
                'key' => 'OIL DISCHARGE',
                'value' => 2248,
              ),
              1057 => 
              array (
                'key' => 'OIL RIG HARDWALL',
                'value' => 2249,
              ),
              1058 => 
              array (
                'key' => 'OIL RIG HARDWALL BIOFUEL',
                'value' => 2250,
              ),
              1059 => 
              array (
                'key' => 'OIL RIG SOFTWALL',
                'value' => 2251,
              ),
              1060 => 
              array (
                'key' => 'OIL RIG SW',
                'value' => 1829329,
              ),
              1061 => 
              array (
                'key' => 'OIL TREAT & BLENDER',
                'value' => 2252,
              ),
              1062 => 
              array (
                'key' => 'OILFIELD DISCHARGE',
                'value' => 2253,
              ),
              1063 => 
              array (
                'key' => 'OILFIELD FRAC',
                'value' => 2254,
              ),
              1064 => 
              array (
                'key' => 'OMNI',
                'value' => 2255,
              ),
              1065 => 
              array (
                'key' => 'OMNI WATER S&D',
                'value' => 2256,
              ),
              1066 => 
              array (
                'key' => 'OPEN END FALCON',
                'value' => 1829523,
              ),
              1067 => 
              array (
                'key' => 'OPEN END HAWK',
                'value' => 1829517,
              ),
              1068 => 
              array (
                'key' => 'OPEN END HY-T PLUS',
                'value' => 1829504,
              ),
              1069 => 
              array (
                'key' => 'OPEN END METRIC T PD',
                'value' => 1829518,
              ),
              1070 => 
              array (
                'key' => 'OPEN END POSITIVE DRIVE',
                'value' => 1829511,
              ),
              1071 => 
              array (
                'key' => 'OPEN END SUPER TORQUE',
                'value' => 1829515,
              ),
              1072 => 
              array (
                'key' => 'ORANGE FLEXWING®',
                'value' => 2257,
              ),
              1073 => 
              array (
                'key' => 'ORTAC™',
                'value' => 2258,
              ),
              1074 => 
              array (
                'key' => 'ORTAC™ II',
                'value' => 2259,
              ),
              1075 => 
              array (
                'key' => 'P13007 EXTREMEFLEX BEVERAGE',
                'value' => 14498370,
              ),
              1076 => 
              array (
                'key' => 'P5S',
                'value' => 10663609,
              ),
              1077 => 
              array (
                'key' => 'PACER™',
                'value' => 2260,
              ),
              1078 => 
              array (
                'key' => 'PACIFIC RUBBER',
                'value' => 5764901,
              ),
              1079 => 
              array (
                'key' => 'PACIFIC RUBBER MULCHBLOWER',
                'value' => 1829232,
              ),
              1080 => 
              array (
                'key' => 'PAGUFIX',
                'value' => 2261,
              ),
              1081 => 
              array (
                'key' => 'PALADIN',
                'value' => 2262,
              ),
              1082 => 
              array (
                'key' => 'PALADIN DROP',
                'value' => 1829164,
              ),
              1083 => 
              array (
                'key' => 'PANAMA',
                'value' => 13056784,
              ),
              1084 => 
              array (
                'key' => 'PANGBORN PA BLAST',
                'value' => 2263,
              ),
              1085 => 
              array (
                'key' => 'PARAGON',
                'value' => 13056794,
              ),
              1086 => 
              array (
                'key' => 'PARC2W',
                'value' => 12472318,
              ),
              1087 => 
              array (
                'key' => 'PARC5S',
                'value' => 10663608,
              ),
              1088 => 
              array (
                'key' => 'PARKING',
                'value' => 2264,
              ),
              1089 => 
              array (
                'key' => 'PATHFINDER ECO',
                'value' => 3831419,
              ),
              1090 => 
              array (
                'key' => 'PATHFINDER GARDEN',
                'value' => 1829283,
              ),
              1091 => 
              array (
                'key' => 'PBE',
                'value' => 5355082,
              ),
              1092 => 
              array (
                'key' => 'PC200i',
                'value' => 7738136,
              ),
              1093 => 
              array (
                'key' => 'PEAK ENERGY FRONTIER',
                'value' => 1829371,
              ),
              1094 => 
              array (
                'key' => 'PERFECT GARDEN HOSE',
                'value' => 2265,
              ),
              1095 => 
              array (
                'key' => 'PERLAPAL',
                'value' => 2266,
              ),
              1096 => 
              array (
                'key' => 'PETERS LIQUID MUD',
                'value' => 2267,
              ),
              1097 => 
              array (
                'key' => 'PETRO OIL S&D',
                'value' => 2268,
              ),
              1098 => 
              array (
                'key' => 'PETRO OIL S&D 200',
                'value' => 1829416,
              ),
              1099 => 
              array (
                'key' => 'PETROHOSE',
                'value' => 5759832,
              ),
              1100 => 
              array (
                'key' => 'PETROL 400 HARDWALL',
                'value' => 1829355,
              ),
              1101 => 
              array (
                'key' => 'PETROL HARDWALL',
                'value' => 2269,
              ),
              1102 => 
              array (
                'key' => 'PGC PLACEMENT TEXTILE',
                'value' => 2270,
              ),
              1103 => 
              array (
                'key' => 'PHILLIPS 66 HYDROCARBON DRAIN',
                'value' => 1829218,
              ),
              1104 => 
              array (
                'key' => 'PHX FUEL GAS',
                'value' => 2271,
              ),
              1105 => 
              array (
                'key' => 'PHX OXYGEN',
                'value' => 2272,
              ),
              1106 => 
              array (
                'key' => 'PIONEER',
                'value' => 12265901,
              ),
              1107 => 
              array (
                'key' => 'PIONEER FLEXWING FOOD',
                'value' => 12265902,
              ),
              1108 => 
              array (
                'key' => 'PIONEER HOT AIR II SP',
                'value' => 1829220,
              ),
              1109 => 
              array (
                'key' => 'PIONEER PETRO TANK TRUCK',
                'value' => 1829386,
              ),
              1110 => 
              array (
                'key' => 'PIONEER XF BLAST',
                'value' => 1829379,
              ),
              1111 => 
              array (
                'key' => 'PLASTER & GROUT',
                'value' => 2273,
              ),
              1112 => 
              array (
                'key' => 'Plastic Clip Holder',
                'value' => 1830005,
              ),
              1113 => 
              array (
                'key' => 'Plastic Process Equipment',
                'value' => 6951846,
              ),
              1114 => 
              array (
                'key' => 'PLATINUM JAC RISER',
                'value' => 2274,
              ),
              1115 => 
              array (
                'key' => 'PLIOVIC AG SPRAY',
                'value' => 1829274,
              ),
              1116 => 
              array (
                'key' => 'PLIOVIC GS™',
                'value' => 2276,
              ),
              1117 => 
              array (
                'key' => 'PLIOVIC LIGHT WEIGHT',
                'value' => 10705761,
              ),
              1118 => 
              array (
                'key' => 'PLIOVIC PLUS',
                'value' => 2277,
              ),
              1119 => 
              array (
                'key' => 'PLIOVIC PVC TUBING',
                'value' => 2278,
              ),
              1120 => 
              array (
                'key' => 'PLIOVIC® FG',
                'value' => 2275,
              ),
              1121 => 
              array (
                'key' => 'POLAR SERVICE CENTER',
                'value' => 13056793,
              ),
              1122 => 
              array (
                'key' => 'POLY-V',
                'value' => 1829493,
              ),
              1123 => 
              array (
                'key' => 'POSEIDON',
                'value' => 10631868,
              ),
              1124 => 
              array (
                'key' => 'POSEIDON UL94-HB',
                'value' => 2279,
              ),
              1125 => 
              array (
                'key' => 'POSITIVE DRIVE PD',
                'value' => 1829509,
              ),
              1126 => 
              array (
                'key' => 'POT LINE',
                'value' => 2280,
              ),
              1127 => 
              array (
                'key' => 'POT LINE HD',
                'value' => 2281,
              ),
              1128 => 
              array (
                'key' => 'POTABLE STOCK TANK',
                'value' => 2282,
              ),
              1129 => 
              array (
                'key' => 'POTABLE WATER',
                'value' => 2283,
              ),
              1130 => 
              array (
                'key' => 'POTABLE WATER HW',
                'value' => 2284,
              ),
              1131 => 
              array (
                'key' => 'POTABLE WATER S&D',
                'value' => 1829346,
              ),
              1132 => 
              array (
                'key' => 'POTABLE WATER SW',
                'value' => 2285,
              ),
              1133 => 
              array (
                'key' => 'POWER PORT',
                'value' => 3831236,
              ),
              1134 => 
              array (
                'key' => 'POWERSPAN CL',
                'value' => 1829528,
              ),
              1135 => 
              array (
                'key' => 'PRAIRIE GOLDFLEX',
                'value' => 2286,
              ),
              1136 => 
              array (
                'key' => 'PRAIRIE GOLDFLEX PETRO',
                'value' => 1829174,
              ),
              1137 => 
              array (
                'key' => 'PREM MARINE WET EXHAUST COR',
                'value' => 2287,
              ),
              1138 => 
              array (
                'key' => 'PREMIER',
                'value' => 1829311,
              ),
              1139 => 
              array (
                'key' => 'PREMIER AIR 1000',
                'value' => 1829361,
              ),
              1140 => 
              array (
                'key' => 'PREMIER REFRACTORY CLAMP',
                'value' => 2288,
              ),
              1141 => 
              array (
                'key' => 'PREMIER VINTNER',
                'value' => 1829266,
              ),
              1142 => 
              array (
                'key' => 'PREMIUM GARDEN',
                'value' => 2289,
              ),
              1143 => 
              array (
                'key' => 'PREMIUM MARINE WET EXHAUST',
                'value' => 2290,
              ),
              1144 => 
              array (
                'key' => 'PROFESSIONAL AIR',
                'value' => 3831234,
              ),
              1145 => 
              array (
                'key' => 'PROSPECTOR CLEAN IN PLACE',
                'value' => 12907334,
              ),
              1146 => 
              array (
                'key' => 'PROSPECTOR FRAC 400 DISCHARGE',
                'value' => 1829404,
              ),
              1147 => 
              array (
                'key' => 'PROSPECTOR FRAC S&D',
                'value' => 7563312,
              ),
              1148 => 
              array (
                'key' => 'PROSPECTORFLEX BLUE UHMWPE',
                'value' => 1829272,
              ),
              1149 => 
              array (
                'key' => 'PROSPECTOR™ AIR',
                'value' => 2291,
              ),
              1150 => 
              array (
                'key' => 'PROSPECTOR™ BOP 3000',
                'value' => 2292,
              ),
              1151 => 
              array (
                'key' => 'PROSPECTOR™ BOP 5000',
                'value' => 2293,
              ),
              1152 => 
              array (
                'key' => 'PROSPECTOR™ FLEX',
                'value' => 2294,
              ),
              1153 => 
              array (
                'key' => 'PROSPECTOR™ FLEX OILFIELD',
                'value' => 2295,
              ),
              1154 => 
              array (
                'key' => 'PROSPECTOR™ FLEX PETRO',
                'value' => 2296,
              ),
              1155 => 
              array (
                'key' => 'PROSPECTOR™ FRAC DISCHARGE',
                'value' => 2297,
              ),
              1156 => 
              array (
                'key' => 'PROSPECTOR™ FRAC TANK HOSE',
                'value' => 2298,
              ),
              1157 => 
              array (
                'key' => 'PROSPECTOR™ HOT OILER',
                'value' => 2299,
              ),
              1158 => 
              array (
                'key' => 'PROSPECTOR™ MINESPRAY',
                'value' => 2300,
              ),
              1159 => 
              array (
                'key' => 'PROSPECTOR™ OIL RIG HARDWALL',
                'value' => 1829396,
              ),
              1160 => 
              array (
                'key' => 'PROSPECTOR™ OIL RIG HW',
                'value' => 2301,
              ),
              1161 => 
              array (
                'key' => 'PROSPECTOR™ OIL RIG SW',
                'value' => 2302,
              ),
              1162 => 
              array (
                'key' => 'PROSPECTOR™ OILFIELD',
                'value' => 2303,
              ),
              1163 => 
              array (
                'key' => 'PROSPECTOR™ OILFIELD S&D',
                'value' => 2304,
              ),
              1164 => 
              array (
                'key' => 'PROSPECTOR™ OILFIELD S&D 150',
                'value' => 1829375,
              ),
              1165 => 
              array (
                'key' => 'PROSPECTOR™ OILFIELD S&D 300',
                'value' => 1829241,
              ),
              1166 => 
              array (
                'key' => 'PROSPECTOR™ PETRO',
                'value' => 2305,
              ),
              1167 => 
              array (
                'key' => 'PROSPECTOR™ PLUS AIR',
                'value' => 2306,
              ),
              1168 => 
              array (
                'key' => 'PROSPECTOR™ SHR',
                'value' => 2307,
              ),
              1169 => 
              array (
                'key' => 'PROSPECTOR™ WATER DISCHARGE',
                'value' => 2308,
              ),
              1170 => 
              array (
                'key' => 'PROSPECTOR™ WATER DISCHARGE 150',
                'value' => 1829169,
              ),
              1171 => 
              array (
                'key' => 'PROSPECTOR™ WATER S&D',
                'value' => 2309,
              ),
              1172 => 
              array (
                'key' => 'PROTECTION RING',
                'value' => 2310,
              ),
              1173 => 
              array (
                'key' => 'PSC CHEMICAL',
                'value' => 2311,
              ),
              1174 => 
              array (
                'key' => 'PTT 30',
                'value' => 1830008,
              ),
              1175 => 
              array (
                'key' => 'PULP & PAPER WASHDOWN',
                'value' => 2312,
              ),
              1176 => 
              array (
                'key' => 'PUMPTEC PULSE',
                'value' => 1829211,
              ),
              1177 => 
              array (
                'key' => 'PUREONE',
                'value' => 2313,
              ),
              1178 => 
              array (
                'key' => 'PURFIT',
                'value' => 2314,
              ),
              1179 => 
              array (
                'key' => 'PURFIT BREWLINE',
                'value' => 2315,
              ),
              1180 => 
              array (
                'key' => 'PURPLE FLEXWING®',
                'value' => 2316,
              ),
              1181 => 
              array (
                'key' => 'PURPLE SNAKE PLUS',
                'value' => 2318,
              ),
              1182 => 
              array (
                'key' => 'PURPLE SNAKE®',
                'value' => 2317,
              ),
              1183 => 
              array (
                'key' => 'PYROFLEX HOT AIR',
                'value' => 2319,
              ),
              1184 => 
              array (
                'key' => 'PYROFLEX HOT TAR & ASPHALT II',
                'value' => 1829129,
              ),
              1185 => 
              array (
                'key' => 'PYROFLEX HOT TAR WAND',
                'value' => 2321,
              ),
              1186 => 
              array (
                'key' => 'PYROFLEX II HOT TAR & ASPHALT',
                'value' => 2323,
              ),
              1187 => 
              array (
                'key' => 'PYROFLEX III HOT AIR',
                'value' => 2324,
              ),
              1188 => 
              array (
                'key' => 'PYROFLEX III HOT AIR FDA',
                'value' => 2325,
              ),
              1189 => 
              array (
                'key' => 'PYROFLEX® HOT AIR II',
                'value' => 1829132,
              ),
              1190 => 
              array (
                'key' => 'PYROFLEX® HOT AIR III FDA',
                'value' => 2320,
              ),
              1191 => 
              array (
                'key' => 'PYROFLEX® II HOT AIR',
                'value' => 2322,
              ),
              1192 => 
              array (
                'key' => 'QR048',
                'value' => 2326,
              ),
              1193 => 
              array (
                'key' => 'QR48',
                'value' => 2327,
              ),
              1194 => 
              array (
                'key' => 'QUIKSTIR',
                'value' => 2328,
              ),
              1195 => 
              array (
                'key' => 'QUIKSTIR PUMP 2P',
                'value' => 2329,
              ),
              1196 => 
              array (
                'key' => 'R/W',
                'value' => 1829432,
              ),
              1197 => 
              array (
                'key' => 'RADIATOR',
                'value' => 2330,
              ),
              1198 => 
              array (
                'key' => 'RADIATOR HOSE',
                'value' => 1829347,
              ),
              1199 => 
              array (
                'key' => 'RAGCO',
                'value' => 2331,
              ),
              1200 => 
              array (
                'key' => 'RAGCO FABCHEM',
                'value' => 1829242,
              ),
              1201 => 
              array (
                'key' => 'RAGCO FLEX KENT',
                'value' => 1829387,
              ),
              1202 => 
              array (
                'key' => 'RAIL',
                'value' => 2332,
              ),
              1203 => 
              array (
                'key' => 'RANSBG NR SPRAY',
                'value' => 2333,
              ),
              1204 => 
              array (
                'key' => 'RAWHID FIRE ENGINE BOOSTER',
                'value' => 2334,
              ),
              1205 => 
              array (
                'key' => 'RBR & ACC',
                'value' => 11069176,
              ),
              1206 => 
              array (
                'key' => 'RCT FLEXRITE',
                'value' => 2335,
              ),
              1207 => 
              array (
                'key' => 'RDC',
                'value' => 2336,
              ),
              1208 => 
              array (
                'key' => 'REAL RUBBER',
                'value' => 2337,
              ),
              1209 => 
              array (
                'key' => 'RED FLEXTRA 100',
                'value' => 1829324,
              ),
              1210 => 
              array (
                'key' => 'RED FLEXTRA 150',
                'value' => 1829304,
              ),
              1211 => 
              array (
                'key' => 'RED FLEXTRA®',
                'value' => 2338,
              ),
              1212 => 
              array (
                'key' => 'RED HORNET',
                'value' => 7186052,
              ),
              1213 => 
              array (
                'key' => 'RED ORTAC II',
                'value' => 1829326,
              ),
              1214 => 
              array (
                'key' => 'RED-L DIVERTER',
                'value' => 13056783,
              ),
              1215 => 
              array (
                'key' => 'RED-L GOLDFLEX-C',
                'value' => 2339,
              ),
              1216 => 
              array (
                'key' => 'RED-L PLANT STEAM',
                'value' => 1829210,
              ),
              1217 => 
              array (
                'key' => 'RED-L WATER',
                'value' => 2340,
              ),
              1218 => 
              array (
                'key' => 'REDWING BLUE LOW TEMP',
                'value' => 2341,
              ),
              1219 => 
              array (
                'key' => 'REDWING BLUE LOW TEMP FUEL OIL',
                'value' => 1829205,
              ),
              1220 => 
              array (
                'key' => 'REDWING FUEL OIL HD',
                'value' => 2343,
              ),
              1221 => 
              array (
                'key' => 'REDWING HIGH DURO FUEL OIL',
                'value' => 1829342,
              ),
              1222 => 
              array (
                'key' => 'REDWING VERSABRAID™',
                'value' => 2344,
              ),
              1223 => 
              array (
                'key' => 'REDWING® FUEL OIL',
                'value' => 2342,
              ),
              1224 => 
              array (
                'key' => 'REFRACTORY GUNITE',
                'value' => 2345,
              ),
              1225 => 
              array (
                'key' => 'REFRACTORY HOSE',
                'value' => 2346,
              ),
              1226 => 
              array (
                'key' => 'REFRIGERANT CHARGING',
                'value' => 2347,
              ),
              1227 => 
              array (
                'key' => 'REINFLEX',
                'value' => 1829154,
              ),
              1228 => 
              array (
                'key' => 'RELIANCE',
                'value' => 13056785,
              ),
              1229 => 
              array (
                'key' => 'RELIANCE PROSPECTOR WATER S&D',
                'value' => 2348,
              ),
              1230 => 
              array (
                'key' => 'RELIANCE WATER S&D',
                'value' => 2349,
              ),
              1231 => 
              array (
                'key' => 'RES',
                'value' => 2350,
              ),
              1232 => 
              array (
                'key' => 'REVERSE CIRCULATION',
                'value' => 2351,
              ),
              1233 => 
              array (
                'key' => 'RIG SUPPLY',
                'value' => 2352,
              ),
              1234 => 
              array (
                'key' => 'RIG SUPPLY SW',
                'value' => 2353,
              ),
              1235 => 
              array (
                'key' => 'RITCHIE CT5',
                'value' => 1829098,
              ),
              1236 => 
              array (
                'key' => 'RIVERB',
                'value' => 2354,
              ),
              1237 => 
              array (
                'key' => 'RL1131 TWIN-LINE GRADE R',
                'value' => 2355,
              ),
              1238 => 
              array (
                'key' => 'ROADPATCH',
                'value' => 2356,
              ),
              1239 => 
              array (
                'key' => 'ROBIN FREON CHARGING',
                'value' => 2357,
              ),
              1240 => 
              array (
                'key' => 'ROBIN NEW',
                'value' => 1829138,
              ),
              1241 => 
              array (
                'key' => 'ROCK DRILL',
                'value' => 2358,
              ),
              1242 => 
              array (
                'key' => 'ROCK DRILL RED',
                'value' => 1829340,
              ),
              1243 => 
              array (
                'key' => 'ROCK DUST',
                'value' => 1829104,
              ),
              1244 => 
              array (
                'key' => 'ROOF DRAIN',
                'value' => 2359,
              ),
              1245 => 
              array (
                'key' => 'ROUGH BORE (HOT TAR & ASPHALT)',
                'value' => 2360,
              ),
              1246 => 
              array (
                'key' => 'ROUGH BORE DOCK',
                'value' => 2361,
              ),
              1247 => 
              array (
                'key' => 'ROUGH BORE DOCK 200',
                'value' => 1829323,
              ),
              1248 => 
              array (
                'key' => 'ROUGH BORE DOCK 300',
                'value' => 1829221,
              ),
              1249 => 
              array (
                'key' => 'ROYAL BRASS PLIOVIC',
                'value' => 2362,
              ),
              1250 => 
              array (
                'key' => 'ROYAL BRASS VERSIFLO S&D',
                'value' => 1829214,
              ),
              1251 => 
              array (
                'key' => 'RSD',
                'value' => 2363,
              ),
              1252 => 
              array (
                'key' => 'RUB & GASK WATER DISCHARGE',
                'value' => 1829358,
              ),
              1253 => 
              array (
                'key' => 'RUBBERWORX',
                'value' => 12406205,
              ),
              1254 => 
              array (
                'key' => 'RX',
                'value' => 2364,
              ),
              1255 => 
              array (
                'key' => 'S4SH',
                'value' => 2365,
              ),
              1256 => 
              array (
                'key' => 'S4SP',
                'value' => 2366,
              ),
              1257 => 
              array (
                'key' => 'SAE 100R4',
                'value' => 2367,
              ),
              1258 => 
              array (
                'key' => 'SAE 20R1',
                'value' => 2368,
              ),
              1259 => 
              array (
                'key' => 'SAE 20R1 SB/SC',
                'value' => 1829428,
              ),
              1260 => 
              array (
                'key' => 'SAE 20R1 SB/SC HARDWALL',
                'value' => 1829429,
              ),
              1261 => 
              array (
                'key' => 'SAE 20R2 D1',
                'value' => 2369,
              ),
              1262 => 
              array (
                'key' => 'SAE 20R2D1',
                'value' => 2370,
              ),
              1263 => 
              array (
                'key' => 'SAE 45 Flare',
                'value' => 1829987,
              ),
              1264 => 
              array (
                'key' => 'SAE 45° Flare',
                'value' => 1829950,
              ),
              1265 => 
              array (
                'key' => 'SAE 45° Inverted Flare',
                'value' => 1829951,
              ),
              1266 => 
              array (
                'key' => 'SAE J1527 A2 R1 ISO 7840 A2',
                'value' => 2371,
              ),
              1267 => 
              array (
                'key' => 'SAE J1527 TYPE A2 FUEL FILL',
                'value' => 2372,
              ),
              1268 => 
              array (
                'key' => 'SAE-20R2 D1',
                'value' => 2373,
              ),
              1269 => 
              array (
                'key' => 'SAFLEX NSFX',
                'value' => 1829189,
              ),
              1270 => 
              array (
                'key' => 'SAFLEX® (NSFX)',
                'value' => 1830043,
              ),
              1271 => 
              array (
                'key' => 'SAND RECOVERY S&D',
                'value' => 2374,
              ),
              1272 => 
              array (
                'key' => 'SAND SUCTION',
                'value' => 2375,
              ),
              1273 => 
              array (
                'key' => 'SANDBLAST 400',
                'value' => 2376,
              ),
              1274 => 
              array (
                'key' => 'SANDBLAST DEADMAN',
                'value' => 1829239,
              ),
              1275 => 
              array (
                'key' => 'SANDER',
                'value' => 2377,
              ),
              1276 => 
              array (
                'key' => 'SANI-WASH™',
                'value' => 2378,
              ),
              1277 => 
              array (
                'key' => 'SANI-WASH™ PLUS',
                'value' => 2379,
              ),
              1278 => 
              array (
                'key' => 'SANI-WASH™ SUPREME',
                'value' => 2380,
              ),
              1279 => 
              array (
                'key' => 'SBQ FLOATER',
                'value' => 1829147,
              ),
              1280 => 
              array (
                'key' => 'SBQ PETRO',
                'value' => 1829313,
              ),
              1281 => 
              array (
                'key' => 'SCARFING',
                'value' => 7563310,
              ),
              1282 => 
              array (
                'key' => 'SCOMI LIQUID MUD',
                'value' => 2381,
              ),
              1283 => 
              array (
                'key' => 'SCOTT',
                'value' => 1829100,
              ),
              1284 => 
              array (
                'key' => 'SCOTT AIR BREATHING',
                'value' => 7837755,
              ),
              1285 => 
              array (
                'key' => 'SCP3',
                'value' => 2382,
              ),
              1286 => 
              array (
                'key' => 'SCRMAC KURB KING',
                'value' => 2383,
              ),
              1287 => 
              array (
                'key' => 'SEAL-RITE',
                'value' => 5759831,
              ),
              1288 => 
              array (
                'key' => 'SEALFS',
                'value' => 2384,
              ),
              1289 => 
              array (
                'key' => 'Sealing Washers',
                'value' => 1830000,
              ),
              1290 => 
              array (
                'key' => 'SEMLER FDA',
                'value' => 1829170,
              ),
              1291 => 
              array (
                'key' => 'SERVICE STATION AIR',
                'value' => 2385,
              ),
              1292 => 
              array (
                'key' => 'SFS',
                'value' => 1830044,
              ),
              1293 => 
              array (
                'key' => 'SFS (FIRE SUPPRESSION)',
                'value' => 2386,
              ),
              1294 => 
              array (
                'key' => 'SGOBAIN',
                'value' => 2387,
              ),
              1295 => 
              array (
                'key' => 'SGOBAIN FOOD DISCHARGE',
                'value' => 2388,
              ),
              1296 => 
              array (
                'key' => 'SGOBAIN FOOD S&D',
                'value' => 2389,
              ),
              1297 => 
              array (
                'key' => 'SGUN',
                'value' => 1830045,
              ),
              1298 => 
              array (
                'key' => 'SHELLFLEX',
                'value' => 2390,
              ),
              1299 => 
              array (
                'key' => 'SHIELD',
                'value' => 2391,
              ),
              1300 => 
              array (
                'key' => 'SHJ',
                'value' => 1830046,
              ),
              1301 => 
              array (
                'key' => 'SIGNAL CALL',
                'value' => 1829298,
              ),
              1302 => 
              array (
                'key' => 'SILENTSYNC',
                'value' => 1829497,
              ),
              1303 => 
              array (
                'key' => 'SINGLE-LINE (GRADE R)',
                'value' => 2392,
              ),
              1304 => 
              array (
                'key' => 'SINGLE-LINE (GRADE R)',
                'value' => 1829246,
              ),
              1305 => 
              array (
                'key' => 'SINGLE-LINE (GRADE R)',
                'value' => 1829383,
              ),
              1306 => 
              array (
                'key' => 'SINGLE-LINE (GRADE RM)',
                'value' => 2393,
              ),
              1307 => 
              array (
                'key' => 'SINGLE-LINE (GRADE T)',
                'value' => 2394,
              ),
              1308 => 
              array (
                'key' => 'SINGLE-LINE (GRADE T)',
                'value' => 1829270,
              ),
              1309 => 
              array (
                'key' => 'SINGLE-LINE (GRADE T)',
                'value' => 1829309,
              ),
              1310 => 
              array (
                'key' => 'SK CARBOV',
                'value' => 2395,
              ),
              1311 => 
              array (
                'key' => 'SKYJAK',
                'value' => 13295417,
              ),
              1312 => 
              array (
                'key' => 'SLURRY',
                'value' => 2396,
              ),
              1313 => 
              array (
                'key' => 'SMOOTH BORE DOCK',
                'value' => 2397,
              ),
              1314 => 
              array (
                'key' => 'SMOOTH BORE HOT TAR & ASPHALT',
                'value' => 2398,
              ),
              1315 => 
              array (
                'key' => 'SMOOTH BORE MOLTEN SULPHUR',
                'value' => 2399,
              ),
              1316 => 
              array (
                'key' => 'SNAPON',
                'value' => 2400,
              ),
              1317 => 
              array (
                'key' => 'SOFTUB WATER',
                'value' => 2401,
              ),
              1318 => 
              array (
                'key' => 'SOFTWALL',
                'value' => 2402,
              ),
              1319 => 
              array (
                'key' => 'SOFTWALL FDA',
                'value' => 5355079,
              ),
              1320 => 
              array (
                'key' => 'SOHO PROSPECTOR WATER S&D',
                'value' => 2403,
              ),
              1321 => 
              array (
                'key' => 'SOURCE DISPENSING',
                'value' => 1829108,
              ),
              1322 => 
              array (
                'key' => 'SOUTH PNEUMATICS SW',
                'value' => 1829198,
              ),
              1323 => 
              array (
                'key' => 'SOUTHERN',
                'value' => 2404,
              ),
              1324 => 
              array (
                'key' => 'SOUTHWEST RUBBER',
                'value' => 7082341,
              ),
              1325 => 
              array (
                'key' => 'SPARTAN',
                'value' => 7082427,
              ),
              1326 => 
              array (
                'key' => 'SPARTAN PRESSURE WASHER',
                'value' => 2405,
              ),
              1327 => 
              array (
                'key' => 'Spartan Pressure Washer',
                'value' => 1829156,
              ),
              1328 => 
              array (
                'key' => 'SPECIAL PD',
                'value' => 1829512,
              ),
              1329 => 
              array (
                'key' => 'SPEEDAIRE',
                'value' => 2406,
              ),
              1330 => 
              array (
                'key' => 'SPIR SEP',
                'value' => 2407,
              ),
              1331 => 
              array (
                'key' => 'SPIR SEP TPG',
                'value' => 2408,
              ),
              1332 => 
              array (
                'key' => 'SPIRAFLEX® 1500',
                'value' => 2409,
              ),
              1333 => 
              array (
                'key' => 'SPIRAFLEX® 1600',
                'value' => 2410,
              ),
              1334 => 
              array (
                'key' => 'SPIRAFLEX® 2500',
                'value' => 1829307,
              ),
              1335 => 
              array (
                'key' => 'SPIRAFLEX® ACTION F.E.S',
                'value' => 2411,
              ),
              1336 => 
              array (
                'key' => 'SPIRAFLEX® AGFLEX',
                'value' => 2412,
              ),
              1337 => 
              array (
                'key' => 'SPIRAFLEX® AGGIE',
                'value' => 2413,
              ),
              1338 => 
              array (
                'key' => 'SPIRAFLEX® AGGIE PVC',
                'value' => 1829366,
              ),
              1339 => 
              array (
                'key' => 'SPIRAFLEX® AIR SEEDER',
                'value' => 2414,
              ),
              1340 => 
              array (
                'key' => 'SPIRAFLEX® BARKBLOWER',
                'value' => 2415,
              ),
              1341 => 
              array (
                'key' => 'SPIRAFLEX® BLACK SUPER-DUTY',
                'value' => 2416,
              ),
              1342 => 
              array (
                'key' => 'SPIRAFLEX® BLACK SUPER-DUTY',
                'value' => 1829363,
              ),
              1343 => 
              array (
                'key' => 'SPIRAFLEX® BLUE EXTRA LIGHT DUTY',
                'value' => 2417,
              ),
              1344 => 
              array (
                'key' => 'SPIRAFLEX® BLUE EXTRALIGHT DUTY',
                'value' => 1829357,
              ),
              1345 => 
              array (
                'key' => 'SPIRAFLEX® CABLE GUARD',
                'value' => 2418,
              ),
              1346 => 
              array (
                'key' => 'SPIRAFLEX® DUCTING',
                'value' => 2419,
              ),
              1347 => 
              array (
                'key' => 'SPIRAFLEX® EXTRA LIGHT DUTY',
                'value' => 1829188,
              ),
              1348 => 
              array (
                'key' => 'SPIRAFLEX® FGVAC',
                'value' => 2420,
              ),
              1349 => 
              array (
                'key' => 'SPIRAFLEX® FISH SUCTION',
                'value' => 2421,
              ),
              1350 => 
              array (
                'key' => 'SPIRAFLEX® FOODVAC',
                'value' => 2422,
              ),
              1351 => 
              array (
                'key' => 'SPIRAFLEX® GRASSVAC',
                'value' => 2423,
              ),
              1352 => 
              array (
                'key' => 'SPIRAFLEX® GRAY LIGHT DUTY',
                'value' => 2424,
              ),
              1353 => 
              array (
                'key' => 'SPIRAFLEX® GREEN',
                'value' => 2425,
              ),
              1354 => 
              array (
                'key' => 'SPIRAFLEX® GREEN',
                'value' => 1829335,
              ),
              1355 => 
              array (
                'key' => 'SPIRAFLEX® HEAVY DUTY',
                'value' => 1829199,
              ),
              1356 => 
              array (
                'key' => 'SPIRAFLEX® HT',
                'value' => 2426,
              ),
              1357 => 
              array (
                'key' => 'SPIRAFLEX® LIGHT DUTY',
                'value' => 1829190,
              ),
              1358 => 
              array (
                'key' => 'SPIRAFLEX® LW ROCK DUST',
                'value' => 2427,
              ),
              1359 => 
              array (
                'key' => 'SPIRAFLEX® MEDIUM DUTY',
                'value' => 1829182,
              ),
              1360 => 
              array (
                'key' => 'SPIRAFLEX® MULCH BLOWER',
                'value' => 2428,
              ),
              1361 => 
              array (
                'key' => 'SPIRAFLEX® MULCHBLOWER',
                'value' => 2429,
              ),
              1362 => 
              array (
                'key' => 'SPIRAFLEX® OIL FILL',
                'value' => 7401486,
              ),
              1363 => 
              array (
                'key' => 'SPIRAFLEX® RED MEDIUM DUTY',
                'value' => 2430,
              ),
              1364 => 
              array (
                'key' => 'SPIRAFLEX® RED MEDIUM DUTY',
                'value' => 1829317,
              ),
              1365 => 
              array (
                'key' => 'SPIRAFLEX® ROCK DUST',
                'value' => 2431,
              ),
              1366 => 
              array (
                'key' => 'SPIRAFLEX® VACUUM',
                'value' => 2432,
              ),
              1367 => 
              array (
                'key' => 'SPIRAFLEX® VAPOR RECOVERY',
                'value' => 2433,
              ),
              1368 => 
              array (
                'key' => 'SPIRAFLEX® YELLOW HEAVY DUTY',
                'value' => 2434,
              ),
              1369 => 
              array (
                'key' => 'SPIRAFLEX® YELLOW HEAVY DUTY',
                'value' => 1829381,
              ),
              1370 => 
              array (
                'key' => 'SPIRAFLOW®',
                'value' => 2435,
              ),
              1371 => 
              array (
                'key' => 'SPIRATHANE HD',
                'value' => 2436,
              ),
              1372 => 
              array (
                'key' => 'SPIRATHANE LD',
                'value' => 2437,
              ),
              1373 => 
              array (
                'key' => 'SPIRATHANE PT',
                'value' => 2438,
              ),
              1374 => 
              array (
                'key' => 'SPIRIT',
                'value' => 5355081,
              ),
              1375 => 
              array (
                'key' => 'SR12',
                'value' => 2439,
              ),
              1376 => 
              array (
                'key' => 'SR13',
                'value' => 2440,
              ),
              1377 => 
              array (
                'key' => 'SR14',
                'value' => 2441,
              ),
              1378 => 
              array (
                'key' => 'SR14A',
                'value' => 2442,
              ),
              1379 => 
              array (
                'key' => 'SR14B',
                'value' => 2443,
              ),
              1380 => 
              array (
                'key' => 'SR15',
                'value' => 2444,
              ),
              1381 => 
              array (
                'key' => 'SR16SC',
                'value' => 2445,
              ),
              1382 => 
              array (
                'key' => 'SR18',
                'value' => 2446,
              ),
              1383 => 
              array (
                'key' => 'SR1SN',
                'value' => 2447,
              ),
              1384 => 
              array (
                'key' => 'SR2SN',
                'value' => 2448,
              ),
              1385 => 
              array (
                'key' => 'SR3',
                'value' => 2449,
              ),
              1386 => 
              array (
                'key' => 'SR5',
                'value' => 2450,
              ),
              1387 => 
              array (
                'key' => 'SR6',
                'value' => 2451,
              ),
              1388 => 
              array (
                'key' => 'SR7',
                'value' => 2452,
              ),
              1389 => 
              array (
                'key' => 'SR8',
                'value' => 2453,
              ),
              1390 => 
              array (
                'key' => 'SRS',
                'value' => 2454,
              ),
              1391 => 
              array (
                'key' => 'STANDARD STRAIGHT RAD',
                'value' => 2455,
              ),
              1392 => 
              array (
                'key' => 'Standpipe',
                'value' => 1829956,
              ),
              1393 => 
              array (
                'key' => 'STANLEY',
                'value' => 1829192,
              ),
              1394 => 
              array (
                'key' => 'STANLEY N298402',
                'value' => 1829197,
              ),
              1395 => 
              array (
                'key' => 'STEAM 250',
                'value' => 2456,
              ),
              1396 => 
              array (
                'key' => 'STEAM HOSE',
                'value' => 1829165,
              ),
              1397 => 
              array (
                'key' => 'STEAM PILE DRIVER',
                'value' => 1829345,
              ),
              1398 => 
              array (
                'key' => 'STEEL AIR',
                'value' => 2457,
              ),
              1399 => 
              array (
                'key' => 'STEEL AIR BOOTSTRAP',
                'value' => 2458,
              ),
              1400 => 
              array (
                'key' => 'STEEL AIR MSHA',
                'value' => 1829249,
              ),
              1401 => 
              array (
                'key' => 'Stutsman',
                'value' => 13294617,
              ),
              1402 => 
              array (
                'key' => 'SUBSEA CABLE',
                'value' => 2459,
              ),
              1403 => 
              array (
                'key' => 'SULBANA GAUNTLET',
                'value' => 2460,
              ),
              1404 => 
              array (
                'key' => 'SUMMERS',
                'value' => 1829368,
              ),
              1405 => 
              array (
                'key' => 'SUNSDEA MUD',
                'value' => 2461,
              ),
              1406 => 
              array (
                'key' => 'SUNSET WATER S&D FIRE SERVICE',
                'value' => 2462,
              ),
              1407 => 
              array (
                'key' => 'SUPER AIR 400',
                'value' => 2463,
              ),
              1408 => 
              array (
                'key' => 'SUPER BLACK FLEXWING®',
                'value' => 2464,
              ),
              1409 => 
              array (
                'key' => 'SUPER ORTAC',
                'value' => 1829130,
              ),
              1410 => 
              array (
                'key' => 'Super Ortac™',
                'value' => 2465,
              ),
              1411 => 
              array (
                'key' => 'SUPER ROCK DRILL',
                'value' => 2466,
              ),
              1412 => 
              array (
                'key' => 'SUPER ROCK DRILL HT',
                'value' => 2467,
              ),
              1413 => 
              array (
                'key' => 'SUPER SANI-WASH 300',
                'value' => 1829152,
              ),
              1414 => 
              array (
                'key' => 'SUPER SANI-WASH™',
                'value' => 2468,
              ),
              1415 => 
              array (
                'key' => 'SUPER TORQUE',
                'value' => 1829525,
              ),
              1416 => 
              array (
                'key' => 'SUPER YC AIR',
                'value' => 7082890,
              ),
              1417 => 
              array (
                'key' => 'SUPERIOR',
                'value' => 2469,
              ),
              1418 => 
              array (
                'key' => 'SUPERIOR PETRO TANK TRUCK',
                'value' => 1829380,
              ),
              1419 => 
              array (
                'key' => 'SUPFLOW',
                'value' => 2470,
              ),
              1420 => 
              array (
                'key' => 'SUPVAC',
                'value' => 2471,
              ),
              1421 => 
              array (
                'key' => 'SURELINE',
                'value' => 2472,
              ),
              1422 => 
              array (
                'key' => 'SURELINE BLACK',
                'value' => 1829306,
              ),
              1423 => 
              array (
                'key' => 'SW DRY CEMENT & BARYTES',
                'value' => 2473,
              ),
              1424 => 
              array (
                'key' => 'SWAGELOK',
                'value' => 2474,
              ),
              1425 => 
              array (
                'key' => 'SYNCHROCHAIN CARBON',
                'value' => 1829531,
              ),
              1426 => 
              array (
                'key' => 'TAMARACK',
                'value' => 1829143,
              ),
              1427 => 
              array (
                'key' => 'TAN FLEXTRA',
                'value' => 2475,
              ),
              1428 => 
              array (
                'key' => 'TAN FLEXTRA FDA',
                'value' => 2476,
              ),
              1429 => 
              array (
                'key' => 'TAN FLEXWING®',
                'value' => 2477,
              ),
              1430 => 
              array (
                'key' => 'TAN FLEXWING® FDA',
                'value' => 2478,
              ),
              1431 => 
              array (
                'key' => 'TANK CLEANING',
                'value' => 2479,
              ),
              1432 => 
              array (
                'key' => 'TANKER BARGE DISCHARGE',
                'value' => 2480,
              ),
              1433 => 
              array (
                'key' => 'TECHNIWELD',
                'value' => 7079917,
              ),
              1434 => 
              array (
                'key' => 'TEFLON',
                'value' => 2481,
              ),
              1435 => 
              array (
                'key' => 'TEFPASS',
                'value' => 1829162,
              ),
              1436 => 
              array (
                'key' => 'TEKNOR',
                'value' => 1829106,
              ),
              1437 => 
              array (
                'key' => 'TEKNOR 8650GT',
                'value' => 1829201,
              ),
              1438 => 
              array (
                'key' => 'TEKNOR 8696-27',
                'value' => 1829217,
              ),
              1439 => 
              array (
                'key' => 'TEKNOR 969RR',
                'value' => 1829226,
              ),
              1440 => 
              array (
                'key' => 'TETRA',
                'value' => 2482,
              ),
              1441 => 
              array (
                'key' => 'THERMIDOR',
                'value' => 2483,
              ),
              1442 => 
              array (
                'key' => 'THESE ARE TIED TO NORFOLK SPECS...',
                'value' => 1829257,
              ),
              1443 => 
              array (
                'key' => 'THOMPSON FLEX XLPE',
                'value' => 2484,
              ),
              1444 => 
              array (
                'key' => 'THUNDER INSTA-GRIP',
                'value' => 2485,
              ),
              1445 => 
              array (
                'key' => 'Tifco',
                'value' => 14768964,
              ),
              1446 => 
              array (
                'key' => 'TIG WELDING',
                'value' => 2486,
              ),
              1447 => 
              array (
                'key' => 'TIMCO',
                'value' => 2487,
              ),
              1448 => 
              array (
                'key' => 'TIO EXTREMEFLEX BEVERAGE',
                'value' => 14498372,
              ),
              1449 => 
              array (
                'key' => 'TIPCO EXTREMEFLEX BEVERAGE',
                'value' => 14498373,
              ),
              1450 => 
              array (
                'key' => 'TIPCO PREMIUM GARDEN',
                'value' => 2488,
              ),
              1451 => 
              array (
                'key' => 'TIPO',
                'value' => 1829427,
              ),
              1452 => 
              array (
                'key' => 'TORQUE TEAM LAMINATED',
                'value' => 1829516,
              ),
              1453 => 
              array (
                'key' => 'TORQUE TEAM PLUS',
                'value' => 1829500,
              ),
              1454 => 
              array (
                'key' => 'TORQUE-FLEX',
                'value' => 1829498,
              ),
              1455 => 
              array (
                'key' => 'TORRIDAIR',
                'value' => 2489,
              ),
              1456 => 
              array (
                'key' => 'TOW CABLE',
                'value' => 2490,
              ),
              1457 => 
              array (
                'key' => 'TR7',
                'value' => 2491,
              ),
              1458 => 
              array (
                'key' => 'TR8',
                'value' => 2492,
              ),
              1459 => 
              array (
                'key' => 'TRANSPLY',
                'value' => 2493,
              ),
              1460 => 
              array (
                'key' => 'TRI-STATE',
                'value' => 1829330,
              ),
              1461 => 
              array (
                'key' => 'TRIDENT',
                'value' => 2494,
              ),
              1462 => 
              array (
                'key' => 'TRIDENT SER',
                'value' => 2495,
              ),
              1463 => 
              array (
                'key' => 'TRINCO BLAST',
                'value' => 2496,
              ),
              1464 => 
              array (
                'key' => 'TRIPLX',
                'value' => 2497,
              ),
              1465 => 
              array (
                'key' => 'TRIX ACETYLENE',
                'value' => 2498,
              ),
              1466 => 
              array (
                'key' => 'TRIX BLAUSTRAHL',
                'value' => 2499,
              ),
              1467 => 
              array (
                'key' => 'TRIX BRAKE',
                'value' => 2500,
              ),
              1468 => 
              array (
                'key' => 'TRIX FUEL',
                'value' => 2501,
              ),
              1469 => 
              array (
                'key' => 'TRIX HP',
                'value' => 7082339,
              ),
              1470 => 
              array (
                'key' => 'TRIX MULTIFOOD',
                'value' => 2502,
              ),
              1471 => 
              array (
                'key' => 'TRIX NITRO',
                'value' => 2503,
              ),
              1472 => 
              array (
                'key' => 'TRIX OXYGEN',
                'value' => 2504,
              ),
              1473 => 
              array (
                'key' => 'TRIX PAINT SPRAY',
                'value' => 2505,
              ),
              1474 => 
              array (
                'key' => 'TRIX RESPIRATION',
                'value' => 2506,
              ),
              1475 => 
              array (
                'key' => 'TRIX ROSTRAHL',
                'value' => 2507,
              ),
              1476 => 
              array (
                'key' => 'TRIX SUPER',
                'value' => 2508,
              ),
              1477 => 
              array (
                'key' => 'TUNNELCOTE ROCK DUST FLEXTRA',
                'value' => 2509,
              ),
              1478 => 
              array (
                'key' => 'TUNNELCOTE ROCK DUST FLEXWING®',
                'value' => 2510,
              ),
              1479 => 
              array (
                'key' => 'TWIN-LINE (GRADE R)',
                'value' => 2511,
              ),
              1480 => 
              array (
                'key' => 'TWIN-LINE (GRADE RM)',
                'value' => 2512,
              ),
              1481 => 
              array (
                'key' => 'TWIN-LINE (GRADE T)',
                'value' => 2513,
              ),
              1482 => 
              array (
                'key' => 'TWIN-LINE ISO 3821',
                'value' => 2514,
              ),
              1483 => 
              array (
                'key' => 'UL 92 FIRE EXTINGUISHER',
                'value' => 2515,
              ),
              1484 => 
              array (
                'key' => 'ULTRABRAID BULL',
                'value' => 2516,
              ),
              1485 => 
              array (
                'key' => 'ULTRAFLEX',
                'value' => 2517,
              ),
              1486 => 
              array (
                'key' => 'ULTRAMAR',
                'value' => 2518,
              ),
              1487 => 
              array (
                'key' => 'ULTRAMAX',
                'value' => 5764905,
              ),
              1488 => 
              array (
                'key' => 'UNDERHILL',
                'value' => 2519,
              ),
              1489 => 
              array (
                'key' => 'Uni-Crimp UCF10 Ferrule',
                'value' => 1830018,
              ),
              1490 => 
              array (
                'key' => 'Uni-Crimp UCF11 Ferrule',
                'value' => 1830019,
              ),
              1491 => 
              array (
                'key' => 'UNI-Crimp UCF2 Ferrule',
                'value' => 1830013,
              ),
              1492 => 
              array (
                'key' => 'Uni-Crimp UCF3 Ferrule',
                'value' => 1830014,
              ),
              1493 => 
              array (
                'key' => 'Uni-Crimp UCF6 Ferrule',
                'value' => 1830015,
              ),
              1494 => 
              array (
                'key' => 'Uni-Crimp UCF8 Ferrule',
                'value' => 1830016,
              ),
              1495 => 
              array (
                'key' => 'Uni-Crimp UCF9 Ferrule',
                'value' => 1830017,
              ),
              1496 => 
              array (
                'key' => 'UNISOURCE',
                'value' => 2520,
              ),
              1497 => 
              array (
                'key' => 'UNISOURCE EXTREMEFLEX BEVERAGE',
                'value' => 14498371,
              ),
              1498 => 
              array (
                'key' => 'UNITED CENTRAL',
                'value' => 5764906,
              ),
              1499 => 
              array (
                'key' => 'UNITED RUBBER CONTRACTOR\'S WATER',
                'value' => 1829291,
              ),
              1500 => 
              array (
                'key' => 'UNITRIX 60',
                'value' => 2521,
              ),
              1501 => 
              array (
                'key' => 'UNITRIX 80',
                'value' => 2522,
              ),
              1502 => 
              array (
                'key' => 'UNIWELD',
                'value' => 1829184,
              ),
              1503 => 
              array (
                'key' => 'UNPRINTED SPRAY SALVAGE',
                'value' => 2523,
              ),
              1504 => 
              array (
                'key' => 'V-50 S&D',
                'value' => 2524,
              ),
              1505 => 
              array (
                'key' => 'VACUPRESS OIL',
                'value' => 10862808,
              ),
              1506 => 
              array (
                'key' => 'VACUPRESS OIL PU',
                'value' => 10862807,
              ),
              1507 => 
              array (
                'key' => 'VACUUM',
                'value' => 2525,
              ),
              1508 => 
              array (
                'key' => 'VACUWORX XR16SC',
                'value' => 3831418,
              ),
              1509 => 
              array (
                'key' => 'Valve Adapter',
                'value' => 1830001,
              ),
              1510 => 
              array (
                'key' => 'Valve Caps',
                'value' => 1830002,
              ),
              1511 => 
              array (
                'key' => 'Valve Core',
                'value' => 1830003,
              ),
              1512 => 
              array (
                'key' => 'VAPOR RECOVERY',
                'value' => 2526,
              ),
              1513 => 
              array (
                'key' => 'VAPOR RECOVERY DOCK',
                'value' => 2527,
              ),
              1514 => 
              array (
                'key' => 'VARIABLE SPEED',
                'value' => 1829513,
              ),
              1515 => 
              array (
                'key' => 'VARIFLEX™',
                'value' => 2528,
              ),
              1516 => 
              array (
                'key' => 'VELOCITY BANDING COIL',
                'value' => 2529,
              ),
              1517 => 
              array (
                'key' => 'VELOCITY PETROLEUM TRANSFER',
                'value' => 2531,
              ),
              1518 => 
              array (
                'key' => 'VELOCITY WATER TRANSFER',
                'value' => 2532,
              ),
              1519 => 
              array (
                'key' => 'VELOCITY™ BEVERAGE TRANSFER',
                'value' => 2530,
              ),
              1520 => 
              array (
                'key' => 'VERSACHEM™',
                'value' => 2533,
              ),
              1521 => 
              array (
                'key' => 'VERSACRETE',
                'value' => 2534,
              ),
              1522 => 
              array (
                'key' => 'VERSAFUEL',
                'value' => 7563311,
              ),
              1523 => 
              array (
                'key' => 'VERSAFUEL EN1765:2016 S15',
                'value' => 2535,
              ),
              1524 => 
              array (
                'key' => 'VERSAFUEL FLEX',
                'value' => 2536,
              ),
              1525 => 
              array (
                'key' => 'VERSIFLO DISCHARGE',
                'value' => 2537,
              ),
              1526 => 
              array (
                'key' => 'VERSIFLO S&D',
                'value' => 2538,
              ),
              1527 => 
              array (
                'key' => 'VICTOR',
                'value' => 2539,
              ),
              1528 => 
              array (
                'key' => 'VICTOR GRADE RM',
                'value' => 1829341,
              ),
              1529 => 
              array (
                'key' => 'VICTOR GRADE T',
                'value' => 1829114,
              ),
              1530 => 
              array (
                'key' => 'VINICLASS EXTREMEFLEX BEVERAGE',
                'value' => 14498369,
              ),
              1531 => 
              array (
                'key' => 'VINTNER',
                'value' => 2540,
              ),
              1532 => 
              array (
                'key' => 'VINTNER LITE',
                'value' => 7186049,
              ),
              1533 => 
              array (
                'key' => 'VINTNER MICROBAN',
                'value' => 2541,
              ),
              1534 => 
              array (
                'key' => 'VINTNER™ RESERVE',
                'value' => 2542,
              ),
              1535 => 
              array (
                'key' => 'VIPER®',
                'value' => 2543,
              ),
              1536 => 
              array (
                'key' => 'WAB SLURRY',
                'value' => 2544,
              ),
              1537 => 
              array (
                'key' => 'WASHDOWN',
                'value' => 2545,
              ),
              1538 => 
              array (
                'key' => 'WASHDOWN FDA',
                'value' => 7717343,
              ),
              1539 => 
              array (
                'key' => 'WASHDOWN HD',
                'value' => 12394783,
              ),
              1540 => 
              array (
                'key' => 'WASTE MATE',
                'value' => 2546,
              ),
              1541 => 
              array (
                'key' => 'WATER',
                'value' => 1829360,
              ),
              1542 => 
              array (
                'key' => 'WATER & AIR HD',
                'value' => 2547,
              ),
              1543 => 
              array (
                'key' => 'WATER 150 HD',
                'value' => 1829322,
              ),
              1544 => 
              array (
                'key' => 'WATER DISCHARGE',
                'value' => 2548,
              ),
              1545 => 
              array (
                'key' => 'WATER DISCHARGE 100',
                'value' => 1829320,
              ),
              1546 => 
              array (
                'key' => 'WATER DISCHARGE 150',
                'value' => 1829233,
              ),
              1547 => 
              array (
                'key' => 'WATER DISCHARGE 250',
                'value' => 1829376,
              ),
              1548 => 
              array (
                'key' => 'WATER DISCHARGE HD',
                'value' => 2549,
              ),
              1549 => 
              array (
                'key' => 'WATER DISCHARGE HD 600',
                'value' => 1829264,
              ),
              1550 => 
              array (
                'key' => 'WATER HD',
                'value' => 2550,
              ),
              1551 => 
              array (
                'key' => 'WATER JETTING',
                'value' => 1829279,
              ),
              1552 => 
              array (
                'key' => 'WATER JETTING 1000',
                'value' => 2551,
              ),
              1553 => 
              array (
                'key' => 'WATER JETTING 500',
                'value' => 2552,
              ),
              1554 => 
              array (
                'key' => 'WATER REHAB',
                'value' => 2553,
              ),
              1555 => 
              array (
                'key' => 'WATER S&D',
                'value' => 2554,
              ),
              1556 => 
              array (
                'key' => 'WATER S&D',
                'value' => 1829252,
              ),
              1557 => 
              array (
                'key' => 'Water Transfer',
                'value' => 15217071,
              ),
              1558 => 
              array (
                'key' => 'WEDGE TLP',
                'value' => 1829527,
              ),
              1559 => 
              array (
                'key' => 'WEST MICH',
                'value' => 1829111,
              ),
              1560 => 
              array (
                'key' => 'WESTERN',
                'value' => 2555,
              ),
              1561 => 
              array (
                'key' => 'WESTFLEX',
                'value' => 5764907,
              ),
              1562 => 
              array (
                'key' => 'WHALE OIL',
                'value' => 2556,
              ),
              1563 => 
              array (
                'key' => 'WHALE WATER',
                'value' => 2557,
              ),
              1564 => 
              array (
                'key' => 'WHIPEND BLAST',
                'value' => 2558,
              ),
              1565 => 
              array (
                'key' => 'WHITE FLEXTRA',
                'value' => 2559,
              ),
              1566 => 
              array (
                'key' => 'WHITE FLEXWING®',
                'value' => 2560,
              ),
              1567 => 
              array (
                'key' => 'WHITEWATER®',
                'value' => 2561,
              ),
              1568 => 
              array (
                'key' => 'WHW GAUNTLET',
                'value' => 1829423,
              ),
              1569 => 
              array (
                'key' => 'WILD HOG',
                'value' => 1829225,
              ),
              1570 => 
              array (
                'key' => 'WINELINE',
                'value' => 7992690,
              ),
              1571 => 
              array (
                'key' => 'WINGCRAFT™',
                'value' => 2562,
              ),
              1572 => 
              array (
                'key' => 'WIRE INSERTED RADIATOR HOSE',
                'value' => 2563,
              ),
              1573 => 
              array (
                'key' => 'WOODMI SAWDUST',
                'value' => 2564,
              ),
              1574 => 
              array (
                'key' => 'X-Life™ XBR7',
                'value' => 15065539,
              ),
              1575 => 
              array (
                'key' => 'X-LIFE™ XCP3',
                'value' => 2566,
              ),
              1576 => 
              array (
                'key' => 'X-LIFE™ XCP3S',
                'value' => 2567,
              ),
              1577 => 
              array (
                'key' => 'X-LIFE™ XCP4',
                'value' => 2568,
              ),
              1578 => 
              array (
                'key' => 'X-LIFE™ XCP4S',
                'value' => 2569,
              ),
              1579 => 
              array (
                'key' => 'X-LIFE™ XCP5S',
                'value' => 2570,
              ),
              1580 => 
              array (
                'key' => 'X-LIFE™ XCP6S',
                'value' => 2571,
              ),
              1581 => 
              array (
                'key' => 'X-Life™ XNR7',
                'value' => 15065537,
              ),
              1582 => 
              array (
                'key' => 'X-Life™ XNR8',
                'value' => 15065541,
              ),
              1583 => 
              array (
                'key' => 'X-LIFE™ XR16SC',
                'value' => 2572,
              ),
              1584 => 
              array (
                'key' => 'X-Life™ XR18',
                'value' => 15065543,
              ),
              1585 => 
              array (
                'key' => 'X-Life™ XR7',
                'value' => 15065536,
              ),
              1586 => 
              array (
                'key' => 'X-Life™ XR8',
                'value' => 15065540,
              ),
              1587 => 
              array (
                'key' => 'X-Life™ XTR7',
                'value' => 15065538,
              ),
              1588 => 
              array (
                'key' => 'X-Life™ XTR8',
                'value' => 15065542,
              ),
              1589 => 
              array (
                'key' => 'XF BLAST',
                'value' => 2565,
              ),
              1590 => 
              array (
                'key' => 'XLPE CHEMICAL TRANSFER',
                'value' => 2573,
              ),
              1591 => 
              array (
                'key' => 'XPOWER',
                'value' => 2574,
              ),
              1592 => 
              array (
                'key' => 'XPOWER OILFIELD FRAC HW',
                'value' => 1829105,
              ),
              1593 => 
              array (
                'key' => 'YARDMASTER ECO',
                'value' => 3831420,
              ),
              1594 => 
              array (
                'key' => 'YARDMASTER GARDEN HOSE',
                'value' => 2575,
              ),
              1595 => 
              array (
                'key' => 'YELLOW FLEXWING®',
                'value' => 2576,
              ),
              1596 => 
              array (
                'key' => 'YELLOW HORNET',
                'value' => 7186050,
              ),
              1597 => 
              array (
                'key' => 'YUKON',
                'value' => 2577,
              ),
              1598 => 
              array (
                'key' => 'YUKON BLUE',
                'value' => 1829293,
              ),
              1599 => 
              array (
                'key' => 'YUKON SPIRAFLEX',
                'value' => 2578,
              ),
              1600 => 
              array (
                'key' => 'ZZH561K-AA2',
                'value' => 2579,
              ),
              1601 => 
              array (
                'key' => 'ZZH561K-BA2',
                'value' => 2580,
              ),
              1602 => 
              array (
                'key' => 'ZZH601 3-2',
                'value' => 2581,
              ),
            ),
             'width' => 350,
             'defaultValue' => '',
             'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
             'optionsProviderData' => 'Brand|Name',
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'dynamicOptions' => false,
             'name' => 'Brand',
             'title' => 'Brand',
             'tooltip' => '
',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'fieldtype' => 'input',
             'width' => 350,
             'defaultValue' => NULL,
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'regex' => '',
             'unique' => false,
             'showCharCount' => false,
             'name' => 'Name',
             'title' => 'Chemical Name',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Block::__set_state(array(
             'fieldtype' => 'block',
             'lazyLoading' => false,
             'disallowAddRemove' => false,
             'disallowReorder' => false,
             'collapsible' => false,
             'collapsed' => false,
             'maxItems' => NULL,
             'columnType' => 'longtext',
             'styleElement' => '',
             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\BlockElement[][]',
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'fieldtype' => 'select',
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 'EPDM Rubber',
                    'value' => 2658,
                  ),
                  1 => 
                  array (
                    'key' => 'SBR',
                    'value' => 2659,
                  ),
                  2 => 
                  array (
                    'key' => 'Nitrile',
                    'value' => 2660,
                  ),
                  3 => 
                  array (
                    'key' => 'Chemivic (NBR/PVC)',
                    'value' => 2661,
                  ),
                  4 => 
                  array (
                    'key' => 'Synthetic Rubber',
                    'value' => 2664,
                  ),
                  5 => 
                  array (
                    'key' => 'Nylon',
                    'value' => 2665,
                  ),
                  6 => 
                  array (
                    'key' => 'Chlorobutyl (CIIR)',
                    'value' => 2666,
                  ),
                  7 => 
                  array (
                    'key' => 'PVC Compound',
                    'value' => 2667,
                  ),
                  8 => 
                  array (
                    'key' => 'TPV',
                    'value' => 2668,
                  ),
                  9 => 
                  array (
                    'key' => 'TPU',
                    'value' => 2669,
                  ),
                  10 => 
                  array (
                    'key' => 'PE',
                    'value' => 2670,
                  ),
                  11 => 
                  array (
                    'key' => 'PP',
                    'value' => 2671,
                  ),
                  12 => 
                  array (
                    'key' => 'Pyrosyn®',
                    'value' => 1829616,
                  ),
                  13 => 
                  array (
                    'key' => 'Nitrile (NBR)',
                    'value' => 1829617,
                  ),
                  14 => 
                  array (
                    'key' => 'Tufsyn Synthetic Rubber',
                    'value' => 1829618,
                  ),
                  15 => 
                  array (
                    'key' => 'Pliosyn (UHMWPE)',
                    'value' => 1829619,
                  ),
                  16 => 
                  array (
                    'key' => 'SBR SYNTHETIC RUBBER',
                    'value' => 1829620,
                  ),
                  17 => 
                  array (
                    'key' => 'POLYCHLOROPRENE SYNTHETIC RUBBER',
                    'value' => 1829621,
                  ),
                  18 => 
                  array (
                    'key' => 'Nylon Silicone Free',
                    'value' => 1829625,
                  ),
                  19 => 
                  array (
                    'key' => 'NBR SYNTHETIC RUBBER',
                    'value' => 1829626,
                  ),
                  20 => 
                  array (
                    'key' => 'Pureten™',
                    'value' => 1829627,
                  ),
                  21 => 
                  array (
                    'key' => 'Teflon',
                    'value' => 1829628,
                  ),
                  22 => 
                  array (
                    'key' => 'TPE',
                    'value' => 1829629,
                  ),
                  23 => 
                  array (
                    'key' => 'PLIOVIC',
                    'value' => 1829630,
                  ),
                  24 => 
                  array (
                    'key' => 'PTFE (POLYTETRAFLUOROETHYLENE)',
                    'value' => 1829631,
                  ),
                  25 => 
                  array (
                    'key' => 'Alphasyn',
                    'value' => 1829632,
                  ),
                  26 => 
                  array (
                    'key' => 'Speclar (XLPE)',
                    'value' => 1829634,
                  ),
                  27 => 
                  array (
                    'key' => 'Super Thermo-Flo EPDM',
                    'value' => 1829635,
                  ),
                  28 => 
                  array (
                    'key' => 'Nitrile (NBR), Fluorothermoplastic Barrier',
                    'value' => 1829636,
                  ),
                  29 => 
                  array (
                    'key' => 'Chloroprene (CR)',
                    'value' => 1829637,
                  ),
                  30 => 
                  array (
                    'key' => 'WINGPRENE SYNTHETIC RUBBER',
                    'value' => 1829638,
                  ),
                  31 => 
                  array (
                    'key' => 'Thermoplastic',
                    'value' => 1829639,
                  ),
                  32 => 
                  array (
                    'key' => 'Urethane',
                    'value' => 1829640,
                  ),
                  33 => 
                  array (
                    'key' => 'Polyurethane',
                    'value' => 1829641,
                  ),
                  34 => 
                  array (
                    'key' => 'Survivor®',
                    'value' => 1829644,
                  ),
                  35 => 
                  array (
                    'key' => 'UHMWPE',
                    'value' => 1829645,
                  ),
                  36 => 
                  array (
                    'key' => 'UHMWPE RUBBER',
                    'value' => 1829646,
                  ),
                  37 => 
                  array (
                    'key' => 'POLYESTER',
                    'value' => 1829648,
                  ),
                  38 => 
                  array (
                    'key' => 'Fluorinated Ethylene Propylene (FEP)',
                    'value' => 1829649,
                  ),
                  39 => 
                  array (
                    'key' => 'Flosyn®',
                    'value' => 1829650,
                  ),
                  40 => 
                  array (
                    'key' => 'POLYCHLOROPRENE',
                    'value' => 1829652,
                  ),
                  41 => 
                  array (
                    'key' => 'TRANSPARENT PLASTOMER',
                    'value' => 1829653,
                  ),
                  42 => 
                  array (
                    'key' => 'FLUOROPLASTIC',
                    'value' => 1829654,
                  ),
                  43 => 
                  array (
                    'key' => 'UPE LINER',
                    'value' => 1829655,
                  ),
                  44 => 
                  array (
                    'key' => 'SBR/EPDM',
                    'value' => 1829656,
                  ),
                  45 => 
                  array (
                    'key' => 'NITRILE/PVC',
                    'value' => 1829657,
                  ),
                  46 => 
                  array (
                    'key' => 'CR (Chloroprene)',
                    'value' => 1830027,
                  ),
                  47 => 
                  array (
                    'key' => 'CPE (Chlorinated Polyethylene)',
                    'value' => 1830029,
                  ),
                  48 => 
                  array (
                    'key' => 'Oil-resistant synthetic rubber',
                    'value' => 1830035,
                  ),
                  49 => 
                  array (
                    'key' => 'Sugar Cain Based EPDM',
                    'value' => 3831422,
                  ),
                  50 => 
                  array (
                    'key' => 'Chemituf®',
                    'value' => 3947661,
                  ),
                  51 => 
                  array (
                    'key' => 'Natural Rubber (NR)',
                    'value' => 5300787,
                  ),
                  52 => 
                  array (
                    'key' => 'Special Transparent Plastomer Coating',
                    'value' => 5580055,
                  ),
                  53 => 
                  array (
                    'key' => 'Recycled TPV (Thermoplastic Vulcanizate)',
                    'value' => 6949791,
                  ),
                  54 => 
                  array (
                    'key' => 'Weatherex',
                    'value' => 7563317,
                  ),
                  55 => 
                  array (
                    'key' => 'Butyl (IIR)',
                    'value' => 7654088,
                  ),
                  56 => 
                  array (
                    'key' => 'Thermoplastic Alloyed Blend of Polyurethane and PVC',
                    'value' => 10706730,
                  ),
                  57 => 
                  array (
                    'key' => 'Pliosyn™ (Conductive)',
                    'value' => 11027109,
                  ),
                  58 => 
                  array (
                    'key' => 'White Nitrile (NBR) FDA Compliant',
                    'value' => 12392827,
                  ),
                  59 => 
                  array (
                    'key' => 'Premium PVC Compound',
                    'value' => 15136284,
                  ),
                ),
                 'width' => '',
                 'defaultValue' => '',
                 'optionsProviderClass' => 'ImportBundle\\OptionProvider\\TubeMaterialOptionsProvider',
                 'optionsProviderData' => '',
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'dynamicOptions' => false,
                 'name' => 'tubeMaterial',
                 'title' => 'Tube Material',
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
                    'key' => 'A',
                    'value' => 'A',
                  ),
                  1 => 
                  array (
                    'key' => 'B',
                    'value' => 'B',
                  ),
                  2 => 
                  array (
                    'key' => 'X',
                    'value' => 'X',
                  ),
                  3 => 
                  array (
                    'key' => 'I',
                    'value' => 'I',
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
                 'name' => 'rating',
                 'title' => 'Rating',
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
             'layout' => NULL,
             'referencedFields' => 
            array (
            ),
             'name' => 'tubeMaterial',
             'title' => 'Tube Material ',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Block::__set_state(array(
             'fieldtype' => 'block',
             'lazyLoading' => false,
             'disallowAddRemove' => false,
             'disallowReorder' => false,
             'collapsible' => false,
             'collapsed' => false,
             'maxItems' => NULL,
             'columnType' => 'longtext',
             'styleElement' => '',
             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\BlockElement[][]',
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'fieldtype' => 'select',
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => '316 SS',
                    'value' => 15257319,
                  ),
                  1 => 
                  array (
                    'key' => 'Aluminum',
                    'value' => 15257320,
                  ),
                  2 => 
                  array (
                    'key' => 'Brass',
                    'value' => 15257321,
                  ),
                ),
                 'width' => '',
                 'defaultValue' => '',
                 'optionsProviderClass' => 'ImportBundle\\OptionProvider\\FittingMaterialOptionsProvider',
                 'optionsProviderData' => '',
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'dynamicOptions' => false,
                 'name' => 'fittingMaterial',
                 'title' => 'Fitting Material',
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
                    'key' => 'A',
                    'value' => 'A',
                    'id' => 'extModel16656-1',
                  ),
                  1 => 
                  array (
                    'key' => 'B',
                    'value' => 'B',
                    'id' => 'extModel16656-2',
                  ),
                  2 => 
                  array (
                    'key' => 'X',
                    'value' => 'X',
                    'id' => 'extModel16656-3',
                  ),
                  3 => 
                  array (
                    'key' => 'I',
                    'value' => 'I',
                    'id' => 'extModel16656-4',
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
                 'name' => 'rating',
                 'title' => 'Rating',
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
             'layout' => NULL,
             'referencedFields' => 
            array (
            ),
             'name' => 'fittingMaterial',
             'title' => 'Fitting Material ',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => 'margin-bottom: 10px;',
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
              0 => 
              array (
                'key' => 'Continuous Service',
                'value' => 'Continuous Service',
              ),
              1 => 
              array (
                'key' => 'Do not use',
                'value' => 'Do not use',
              ),
              2 => 
              array (
                'key' => 'Insufficient Data',
                'value' => ' contact customer Service',
              ),
              3 => 
              array (
                'key' => 'Intermittent Service',
                'value' => 'Intermittent Service',
              ),
            ),
             'width' => 350,
             'defaultValue' => '',
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'dynamicOptions' => false,
             'name' => 'RatingScale',
             'title' => 'Rating Scale',
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
          5 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
             'fieldtype' => 'multiselect',
             'options' => 
            array (
              0 => 
              array (
                'key' => 'N',
                'value' => 15257323,
              ),
              1 => 
              array (
                'key' => 'P',
                'value' => 15257324,
              ),
              2 => 
              array (
                'key' => 'S',
                'value' => 15257325,
              ),
              3 => 
              array (
                'key' => 'T',
                'value' => 15257326,
              ),
              4 => 
              array (
                'key' => 'V',
                'value' => 15257327,
              ),
            ),
             'width' => 350,
             'height' => '',
             'maxItems' => '',
             'renderType' => 'list',
             'optionsProviderClass' => 'ImportBundle\\OptionProvider\\GasketOptionsProvider',
             'optionsProviderData' => '',
             'queryColumnType' => 'text',
             'columnType' => 'text',
             'phpdocType' => 'array',
             'dynamicOptions' => false,
             'name' => 'gasket',
             'title' => 'Gasket',
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
             'width' => 350,
             'defaultValue' => NULL,
             'queryColumnType' => 'double',
             'columnType' => 'double',
             'phpdocType' => 'float',
             'integer' => true,
             'unsigned' => true,
             'minValue' => NULL,
             'maxValue' => NULL,
             'unique' => false,
             'decimalSize' => NULL,
             'decimalPrecision' => NULL,
             'name' => 'TemperatureRating',
             'title' => 'Temperature Rating ',
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
     'icon' => NULL,
  )),
   'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/datahub.svg',
   'previewUrl' => '',
   'group' => 'Masters',
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
