<?php 

/** 
* Generated at: 2020-08-25T19:46:05+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- Brand [select]
- Name [input]
- RatingScale [select]
- TemperatureRating [numeric]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '15',
   'name' => 'Chemical',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1598377565,
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
                'key' => '20R3D1 HEATER HOSE',
                'value' => 1829378,
              ),
              1 => 
              array (
                'key' => '20R3D2 HEATER',
                'value' => 1829349,
              ),
              2 => 
              array (
                'key' => '3-M 78-8007-5633-6 BLUE',
                'value' => 1829116,
              ),
              3 => 
              array (
                'key' => '3-M 78-8007-5637-7',
                'value' => 1829150,
              ),
              4 => 
              array (
                'key' => '3-M 78-8008-5757-1',
                'value' => 1829144,
              ),
              5 => 
              array (
                'key' => '556-50A',
                'value' => 1829102,
              ),
              6 => 
              array (
                'key' => 'A&H',
                'value' => 1829180,
              ),
              7 => 
              array (
                'key' => 'A&M',
                'value' => 1829168,
              ),
              8 => 
              array (
                'key' => 'A.R. THOMSON',
                'value' => 1645,
              ),
              9 => 
              array (
                'key' => 'ABBOTT',
                'value' => 1646,
              ),
              10 => 
              array (
                'key' => 'ABBOTT 1025 SERIES',
                'value' => 1647,
              ),
              11 => 
              array (
                'key' => 'ABBOTT CHEM GROUT',
                'value' => 1648,
              ),
              12 => 
              array (
                'key' => 'ABBOTT GOODYEAR GRIP',
                'value' => 1829149,
              ),
              13 => 
              array (
                'key' => 'ABBOTT INLET HOSE',
                'value' => 1829145,
              ),
              14 => 
              array (
                'key' => 'ABS BLAST',
                'value' => 1649,
              ),
              15 => 
              array (
                'key' => 'ACCORD TANK CLEANING',
                'value' => 1650,
              ),
              16 => 
              array (
                'key' => 'ACE BREWLINE',
                'value' => 1651,
              ),
              17 => 
              array (
                'key' => 'ACE FOOD',
                'value' => 1652,
              ),
              18 => 
              array (
                'key' => 'ACE FOOD DISCHARGE',
                'value' => 1653,
              ),
              19 => 
              array (
                'key' => 'ACE GRAY FOOD',
                'value' => 1654,
              ),
              20 => 
              array (
                'key' => 'ACE RCR FLEXRITE',
                'value' => 1655,
              ),
              21 => 
              array (
                'key' => 'ACE RCT FLEXRITE',
                'value' => 1656,
              ),
              22 => 
              array (
                'key' => 'ACE RDC FOOD',
                'value' => 1657,
              ),
              23 => 
              array (
                'key' => 'ACE RSD FOOD',
                'value' => 1658,
              ),
              24 => 
              array (
                'key' => 'AD SEALING HYDROCARBON DRAIN',
                'value' => 1659,
              ),
              25 => 
              array (
                'key' => 'ADVANTAGE',
                'value' => 1660,
              ),
              26 => 
              array (
                'key' => 'AEROPAL',
                'value' => 1661,
              ),
              27 => 
              array (
                'key' => 'AEROPAL BCT',
                'value' => 1829413,
              ),
              28 => 
              array (
                'key' => 'AEROPAL C',
                'value' => 1829408,
              ),
              29 => 
              array (
                'key' => 'AEROPAL CT',
                'value' => 1829410,
              ),
              30 => 
              array (
                'key' => 'AEROPAL E',
                'value' => 1829409,
              ),
              31 => 
              array (
                'key' => 'AEROPAL ECT',
                'value' => 1829411,
              ),
              32 => 
              array (
                'key' => 'AEROPAL FCT',
                'value' => 1829412,
              ),
              33 => 
              array (
                'key' => 'AG SPRAY',
                'value' => 1662,
              ),
              34 => 
              array (
                'key' => 'AGCHEM',
                'value' => 1663,
              ),
              35 => 
              array (
                'key' => 'AGCHEM S&D',
                'value' => 1664,
              ),
              36 => 
              array (
                'key' => 'AGGIE GAS',
                'value' => 1665,
              ),
              37 => 
              array (
                'key' => 'AGRI-FLEX',
                'value' => 1666,
              ),
              38 => 
              array (
                'key' => 'AHR WATER S&D',
                'value' => 1667,
              ),
              39 => 
              array (
                'key' => 'AIR & MULTIPURPOSE',
                'value' => 1829206,
              ),
              40 => 
              array (
                'key' => 'AIR 1000',
                'value' => 1668,
              ),
              41 => 
              array (
                'key' => 'AIR 250',
                'value' => 1669,
              ),
              42 => 
              array (
                'key' => 'AIR 300',
                'value' => 1670,
              ),
              43 => 
              array (
                'key' => 'AIR 300 HD',
                'value' => 1671,
              ),
              44 => 
              array (
                'key' => 'AIR 400',
                'value' => 1672,
              ),
              45 => 
              array (
                'key' => 'AIR BREATHING HOSE',
                'value' => 1673,
              ),
              46 => 
              array (
                'key' => 'AIR PSNS',
                'value' => 1674,
              ),
              47 => 
              array (
                'key' => 'AIR PUMP GUNITE',
                'value' => 1675,
              ),
              48 => 
              array (
                'key' => 'AIR TRIX',
                'value' => 1676,
              ),
              49 => 
              array (
                'key' => 'AIR-A-PLANE GLYCOL',
                'value' => 1677,
              ),
              50 => 
              array (
                'key' => 'AIR-WATER 400',
                'value' => 1686,
              ),
              51 => 
              array (
                'key' => 'AIRCRAFT FUELING',
                'value' => 1678,
              ),
              52 => 
              array (
                'key' => 'AIRGAS FRONTIER',
                'value' => 1679,
              ),
              53 => 
              array (
                'key' => 'AIRGAS GRADE R',
                'value' => 1680,
              ),
              54 => 
              array (
                'key' => 'AIRGAS GRADE RM',
                'value' => 1681,
              ),
              55 => 
              array (
                'key' => 'AIRGAS GRADE T',
                'value' => 1682,
              ),
              56 => 
              array (
                'key' => 'AIRMAX FLEXIMAX',
                'value' => 1683,
              ),
              57 => 
              array (
                'key' => 'AIRMAX PROMAX',
                'value' => 1684,
              ),
              58 => 
              array (
                'key' => 'AIRMAX SUPERMAX',
                'value' => 1685,
              ),
              59 => 
              array (
                'key' => 'AIRSER',
                'value' => 1829328,
              ),
              60 => 
              array (
                'key' => 'AJAX',
                'value' => 1687,
              ),
              61 => 
              array (
                'key' => 'ALASKA RUBBER',
                'value' => 1688,
              ),
              62 => 
              array (
                'key' => 'ALCAN MUD STACKING',
                'value' => 1689,
              ),
              63 => 
              array (
                'key' => 'ALCOA POTROOM',
                'value' => 1690,
              ),
              64 => 
              array (
                'key' => 'ALLCRETE TEXTILE',
                'value' => 1691,
              ),
              65 => 
              array (
                'key' => 'ALLCRETE WIRE',
                'value' => 1692,
              ),
              66 => 
              array (
                'key' => 'ALLENT GUNITE',
                'value' => 1693,
              ),
              67 => 
              array (
                'key' => 'ALLENT REFRACTORY',
                'value' => 1694,
              ),
              68 => 
              array (
                'key' => 'AMEREX 07648 FIREXB',
                'value' => 1829096,
              ),
              69 => 
              array (
                'key' => 'AMFLO 702-610',
                'value' => 1695,
              ),
              70 => 
              array (
                'key' => 'AMMONIUM NITRATE BLAST',
                'value' => 1696,
              ),
              71 => 
              array (
                'key' => 'AMMONIUM NITRATE HD',
                'value' => 1697,
              ),
              72 => 
              array (
                'key' => 'AMMONIUM NITRATE PELLET',
                'value' => 1698,
              ),
              73 => 
              array (
                'key' => 'ANSUL 423267',
                'value' => 1829236,
              ),
              74 => 
              array (
                'key' => 'ANSUL 423581',
                'value' => 1829215,
              ),
              75 => 
              array (
                'key' => 'ANSUL 426809',
                'value' => 1829103,
              ),
              76 => 
              array (
                'key' => 'ANSUL 429196',
                'value' => 1829158,
              ),
              77 => 
              array (
                'key' => 'ANSUL 431352',
                'value' => 1829112,
              ),
              78 => 
              array (
                'key' => 'ANSUL 518518',
                'value' => 1829141,
              ),
              79 => 
              array (
                'key' => 'ANSUL 535688',
                'value' => 1829187,
              ),
              80 => 
              array (
                'key' => 'ANSUL 7083',
                'value' => 1829173,
              ),
              81 => 
              array (
                'key' => 'ANSUL 7091',
                'value' => 1829166,
              ),
              82 => 
              array (
                'key' => 'ANSUL 71976',
                'value' => 1829122,
              ),
              83 => 
              array (
                'key' => 'ANSUL 71980',
                'value' => 1829234,
              ),
              84 => 
              array (
                'key' => 'ANSUL 79007',
                'value' => 1829131,
              ),
              85 => 
              array (
                'key' => 'APACHE',
                'value' => 1699,
              ),
              86 => 
              array (
                'key' => 'APOLLO',
                'value' => 1700,
              ),
              87 => 
              array (
                'key' => 'APOLLO FLEXDOCK',
                'value' => 1701,
              ),
              88 => 
              array (
                'key' => 'APPION MEGAFLOW CT5',
                'value' => 1829128,
              ),
              89 => 
              array (
                'key' => 'APPLIED INDUSTRIAL TECH',
                'value' => 1702,
              ),
              90 => 
              array (
                'key' => 'APPLIED JETTING',
                'value' => 1703,
              ),
              91 => 
              array (
                'key' => 'AQUAHAMMER',
                'value' => 1704,
              ),
              92 => 
              array (
                'key' => 'AQUAPAL',
                'value' => 1705,
              ),
              93 => 
              array (
                'key' => 'AR THOMSON',
                'value' => 1829384,
              ),
              94 => 
              array (
                'key' => 'AR THOMSON EXTREME CRIMP',
                'value' => 1706,
              ),
              95 => 
              array (
                'key' => 'ARCAIR 5077MP',
                'value' => 1829172,
              ),
              96 => 
              array (
                'key' => 'ARCAIR INSULATOR',
                'value' => 1707,
              ),
              97 => 
              array (
                'key' => 'ARCHON',
                'value' => 1708,
              ),
              98 => 
              array (
                'key' => 'ARCO BLAST XF',
                'value' => 1709,
              ),
              99 => 
              array (
                'key' => 'ARCTIC EXTREMEFLEX',
                'value' => 1710,
              ),
              100 => 
              array (
                'key' => 'ARCTIC FLEXTRA',
                'value' => 1711,
              ),
              101 => 
              array (
                'key' => 'ARCTIC FLEXWING',
                'value' => 1712,
              ),
              102 => 
              array (
                'key' => 'ARCTIC FUEL DISCHARGE',
                'value' => 1713,
              ),
              103 => 
              array (
                'key' => 'ARCTIC LCP3',
                'value' => 1714,
              ),
              104 => 
              array (
                'key' => 'ARCTIC LCP4S',
                'value' => 1715,
              ),
              105 => 
              array (
                'key' => 'ARCTIC LCP6S',
                'value' => 1716,
              ),
              106 => 
              array (
                'key' => 'ARCTIC LR16SC',
                'value' => 1717,
              ),
              107 => 
              array (
                'key' => 'ARCTIC LR2SN',
                'value' => 1718,
              ),
              108 => 
              array (
                'key' => 'ARCTIC ORTAC',
                'value' => 1719,
              ),
              109 => 
              array (
                'key' => 'ARCTIC ORTAC PLUS',
                'value' => 1720,
              ),
              110 => 
              array (
                'key' => 'ARCTIC RIG SUPPLY',
                'value' => 1721,
              ),
              111 => 
              array (
                'key' => 'ARMOR-FLEX PRO',
                'value' => 1728,
              ),
              112 => 
              array (
                'key' => 'ARMORCOAT ACP3',
                'value' => 1722,
              ),
              113 => 
              array (
                'key' => 'ARMORCOAT ACP4',
                'value' => 1723,
              ),
              114 => 
              array (
                'key' => 'ARMORCOAT ARC12',
                'value' => 1724,
              ),
              115 => 
              array (
                'key' => 'ARMORCOAT ARC13',
                'value' => 1725,
              ),
              116 => 
              array (
                'key' => 'ARMORCOAT ARC15',
                'value' => 1726,
              ),
              117 => 
              array (
                'key' => 'ARMORCOAT ARC16SC',
                'value' => 1727,
              ),
              118 => 
              array (
                'key' => 'ARONSON',
                'value' => 1729,
              ),
              119 => 
              array (
                'key' => 'ARPHSE',
                'value' => 1730,
              ),
              120 => 
              array (
                'key' => 'ARTRAC',
                'value' => 1731,
              ),
              121 => 
              array (
                'key' => 'ARVAC SW',
                'value' => 1732,
              ),
              122 => 
              array (
                'key' => 'AS1335 TWIN-LINE',
                'value' => 1733,
              ),
              123 => 
              array (
                'key' => 'AS2435 TYPE 1 AIRBRAKE',
                'value' => 1734,
              ),
              124 => 
              array (
                'key' => 'ASJ',
                'value' => 1735,
              ),
              125 => 
              array (
                'key' => 'ASJ VERSACRETE',
                'value' => 1736,
              ),
              126 => 
              array (
                'key' => 'ASTARAS INSULATER',
                'value' => 1829229,
              ),
              127 => 
              array (
                'key' => 'ATLANT WATER',
                'value' => 1737,
              ),
              128 => 
              array (
                'key' => 'ATLAS',
                'value' => 1738,
              ),
              129 => 
              array (
                'key' => 'ATRUBB NR SPRAY',
                'value' => 1739,
              ),
              130 => 
              array (
                'key' => 'AUGER ARC PILING',
                'value' => 1740,
              ),
              131 => 
              array (
                'key' => 'AUSTIN',
                'value' => 1741,
              ),
              132 => 
              array (
                'key' => 'AUSTIN RUBBER',
                'value' => 1742,
              ),
              133 => 
              array (
                'key' => 'AUTOGRIP',
                'value' => 1743,
              ),
              134 => 
              array (
                'key' => 'AXIAL FAN HAWK PD',
                'value' => 1829526,
              ),
              135 => 
              array (
                'key' => 'BAHCAL',
                'value' => 1744,
              ),
              136 => 
              array (
                'key' => 'BANDING COIL',
                'value' => 1745,
              ),
              137 => 
              array (
                'key' => 'BC COLD FLEX',
                'value' => 1746,
              ),
              138 => 
              array (
                'key' => 'BC GASOLINE',
                'value' => 1747,
              ),
              139 => 
              array (
                'key' => 'BC MARINA',
                'value' => 1748,
              ),
              140 => 
              array (
                'key' => 'BEDFORD',
                'value' => 1749,
              ),
              141 => 
              array (
                'key' => 'BLACK FLEXTRA II',
                'value' => 1750,
              ),
              142 => 
              array (
                'key' => 'BLACK FLEXTRA II 150',
                'value' => 1829333,
              ),
              143 => 
              array (
                'key' => 'BLACK FLEXWING',
                'value' => 1751,
              ),
              144 => 
              array (
                'key' => 'BLACKHAWK PD',
                'value' => 1829520,
              ),
              145 => 
              array (
                'key' => 'BLAST',
                'value' => 1752,
              ),
              146 => 
              array (
                'key' => 'BLASTHOLE SLURRY & DEWATERING',
                'value' => 1753,
              ),
              147 => 
              array (
                'key' => 'BLASTHOSE SLURRY',
                'value' => 1829297,
              ),
              148 => 
              array (
                'key' => 'BLASTMASTER HD',
                'value' => 1754,
              ),
              149 => 
              array (
                'key' => 'BLAUDIECK',
                'value' => 1755,
              ),
              150 => 
              array (
                'key' => 'BLAUSTRAHL',
                'value' => 1829415,
              ),
              151 => 
              array (
                'key' => 'BLISSFUL FISHERMAN',
                'value' => 1756,
              ),
              152 => 
              array (
                'key' => 'BLUCOR',
                'value' => 1757,
              ),
              153 => 
              array (
                'key' => 'BLUCOR FLANGE',
                'value' => 1758,
              ),
              154 => 
              array (
                'key' => 'BLUE FLEXWING',
                'value' => 1759,
              ),
              155 => 
              array (
                'key' => 'BLUE FLOUR',
                'value' => 1760,
              ),
              156 => 
              array (
                'key' => 'BLUE XTREME STRAIGH RAD HOSE',
                'value' => 1761,
              ),
              157 => 
              array (
                'key' => 'BOOTMOR',
                'value' => 1762,
              ),
              158 => 
              array (
                'key' => 'BOP SLEEVE',
                'value' => 1763,
              ),
              159 => 
              array (
                'key' => 'BOP WRAP',
                'value' => 1764,
              ),
              160 => 
              array (
                'key' => 'BOTTOM LOADING',
                'value' => 1765,
              ),
              161 => 
              array (
                'key' => 'BOWLING',
                'value' => 1829514,
              ),
              162 => 
              array (
                'key' => 'BR7',
                'value' => 1766,
              ),
              163 => 
              array (
                'key' => 'BRAIDAIR',
                'value' => 1767,
              ),
              164 => 
              array (
                'key' => 'BRANHAM AIR',
                'value' => 1829343,
              ),
              165 => 
              array (
                'key' => 'BRANHAM CHEMONE SUPERIOR',
                'value' => 1768,
              ),
              166 => 
              array (
                'key' => 'BREATHING AIR',
                'value' => 1769,
              ),
              167 => 
              array (
                'key' => 'BREATHING AIR HOSE',
                'value' => 1829260,
              ),
              168 => 
              array (
                'key' => 'BREATHING AIR PLUS',
                'value' => 1770,
              ),
              169 => 
              array (
                'key' => 'BRENNTAG',
                'value' => 1771,
              ),
              170 => 
              array (
                'key' => 'BREWERS HOSE',
                'value' => 1772,
              ),
              171 => 
              array (
                'key' => 'BREWLINE',
                'value' => 1773,
              ),
              172 => 
              array (
                'key' => 'BRICK RED AIR',
                'value' => 1774,
              ),
              173 => 
              array (
                'key' => 'BRIDGEPOINT',
                'value' => 1775,
              ),
              174 => 
              array (
                'key' => 'BRIGADE MINE',
                'value' => 1776,
              ),
              175 => 
              array (
                'key' => 'BRINE HOSE',
                'value' => 1777,
              ),
              176 => 
              array (
                'key' => 'BROOM SWEEPER',
                'value' => 1778,
              ),
              177 => 
              array (
                'key' => 'BROWN FLEXWING',
                'value' => 1779,
              ),
              178 => 
              array (
                'key' => 'BROWN/BLU FLEX',
                'value' => 1829430,
              ),
              179 => 
              array (
                'key' => 'BSP Flat Seat (British Standard Pipe)',
                'value' => 1829966,
              ),
              180 => 
              array (
                'key' => 'BSPP (British Standard Pipe Parallel)',
                'value' => 1829964,
              ),
              181 => 
              array (
                'key' => 'BSPT (British Standard Pipe Tapered)',
                'value' => 1829965,
              ),
              182 => 
              array (
                'key' => 'BUHLER MIAG',
                'value' => 1780,
              ),
              183 => 
              array (
                'key' => 'BULLARD',
                'value' => 1829140,
              ),
              184 => 
              array (
                'key' => 'BUTTERWORTH',
                'value' => 1781,
              ),
              185 => 
              array (
                'key' => 'BUTYL 200',
                'value' => 1782,
              ),
              186 => 
              array (
                'key' => 'C&J WATER S&D',
                'value' => 1783,
              ),
              187 => 
              array (
                'key' => 'C&T MIL-DTL-13444H-1-6',
                'value' => 1829200,
              ),
              188 => 
              array (
                'key' => 'CABLE CONDUIT',
                'value' => 1784,
              ),
              189 => 
              array (
                'key' => 'CABLE COOLING HOSE',
                'value' => 1785,
              ),
              190 => 
              array (
                'key' => 'CABLE COVER',
                'value' => 1786,
              ),
              191 => 
              array (
                'key' => 'CAMBRG HEALY PII',
                'value' => 1787,
              ),
              192 => 
              array (
                'key' => 'CAMLOK',
                'value' => 1788,
              ),
              193 => 
              array (
                'key' => 'CARON ARCTIC FLEX',
                'value' => 1789,
              ),
              194 => 
              array (
                'key' => 'CARON BLACK SOFTWALL',
                'value' => 1790,
              ),
              195 => 
              array (
                'key' => 'CARON FABCHEM',
                'value' => 1791,
              ),
              196 => 
              array (
                'key' => 'CASCADE DRY CEMENT',
                'value' => 1792,
              ),
              197 => 
              array (
                'key' => 'Catepillar Flange',
                'value' => 1829977,
              ),
              198 => 
              array (
                'key' => 'Caterpillar Flange',
                'value' => 1829961,
              ),
              199 => 
              array (
                'key' => 'Caterpillar Flange O-Rings Code 61 and Code 62 Flange O-Rings (SAE J518)',
                'value' => 1831352,
              ),
              200 => 
              array (
                'key' => 'CENEX',
                'value' => 1793,
              ),
              201 => 
              array (
                'key' => 'CENEX OT',
                'value' => 1794,
              ),
              202 => 
              array (
                'key' => 'CENTRAL ROCK DRILL',
                'value' => 1795,
              ),
              203 => 
              array (
                'key' => 'CHANGED TO FORTRESS WHITE',
                'value' => 1829316,
              ),
              204 => 
              array (
                'key' => 'CHEMICAL ACID DISCHARGE',
                'value' => 1796,
              ),
              205 => 
              array (
                'key' => 'CHEMONE',
                'value' => 1797,
              ),
              206 => 
              array (
                'key' => 'CHEMSTREAM',
                'value' => 1798,
              ),
              207 => 
              array (
                'key' => 'CHLO GARLOK',
                'value' => 1799,
              ),
              208 => 
              array (
                'key' => 'CITGO HYDROCARBON DRAIN',
                'value' => 1829202,
              ),
              209 => 
              array (
                'key' => 'CLAM JETTING',
                'value' => 1829434,
              ),
              210 => 
              array (
                'key' => 'CLEANJET',
                'value' => 1800,
              ),
              211 => 
              array (
                'key' => 'CLEANJET FDA',
                'value' => 1801,
              ),
              212 => 
              array (
                'key' => 'CLEAR PVC TUBING',
                'value' => 1802,
              ),
              213 => 
              array (
                'key' => 'CLEARWATER',
                'value' => 1803,
              ),
              214 => 
              array (
                'key' => 'Clip Pliers',
                'value' => 1830006,
              ),
              215 => 
              array (
                'key' => 'CO2 HOSE',
                'value' => 1804,
              ),
              216 => 
              array (
                'key' => 'COAST GUARD',
                'value' => 1805,
              ),
              217 => 
              array (
                'key' => 'Code 61 Flange (SAE  J518)',
                'value' => 1829976,
              ),
              218 => 
              array (
                'key' => 'Code 61 Flange (SAE J518)',
                'value' => 1829959,
              ),
              219 => 
              array (
                'key' => 'Code 61 Split Flange Clamp Kits ',
                'value' => 1831353,
              ),
              220 => 
              array (
                'key' => 'Code 62 Flange (SAE J518)',
                'value' => 1829960,
              ),
              221 => 
              array (
                'key' => 'COLD BLUE',
                'value' => 1806,
              ),
              222 => 
              array (
                'key' => 'COLLECTOR',
                'value' => 1807,
              ),
              223 => 
              array (
                'key' => 'COLLECTOR FLEX',
                'value' => 1808,
              ),
              224 => 
              array (
                'key' => 'COLORITE',
                'value' => 1809,
              ),
              225 => 
              array (
                'key' => 'Compressor O-Ring Tube',
                'value' => 1829980,
              ),
              226 => 
              array (
                'key' => 'Compressor Pad Block',
                'value' => 1829988,
              ),
              227 => 
              array (
                'key' => 'CON FORM SUPER FLEX',
                'value' => 1810,
              ),
              228 => 
              array (
                'key' => 'CON-TECH',
                'value' => 1829228,
              ),
              229 => 
              array (
                'key' => 'CONAG WATER S&D',
                'value' => 1811,
              ),
              230 => 
              array (
                'key' => 'CONCRETE G820',
                'value' => 1812,
              ),
              231 => 
              array (
                'key' => 'CONCRETE VIBRATOR',
                'value' => 1813,
              ),
              232 => 
              array (
                'key' => 'CONTI A&M',
                'value' => 1829426,
              ),
              233 => 
              array (
                'key' => 'CONTI CHEM OIL',
                'value' => 1814,
              ),
              234 => 
              array (
                'key' => 'CONTI CHEM PHARMA',
                'value' => 1815,
              ),
              235 => 
              array (
                'key' => 'CONTI CHEM STANDARD',
                'value' => 1816,
              ),
              236 => 
              array (
                'key' => 'CONTI CHEM SUPERIOR FEP',
                'value' => 1817,
              ),
              237 => 
              array (
                'key' => 'CONTI PAINT SPRAY',
                'value' => 1818,
              ),
              238 => 
              array (
                'key' => 'CONTI POTABLE WATER',
                'value' => 1819,
              ),
              239 => 
              array (
                'key' => 'CONTI WASTE WATER',
                'value' => 1820,
              ),
              240 => 
              array (
                'key' => 'CONTICHEM',
                'value' => 1829407,
              ),
              241 => 
              array (
                'key' => 'CONTINENTAL MATTE GREEN',
                'value' => 1829282,
              ),
              242 => 
              array (
                'key' => 'CONTINENTAL STEEL STEAM 250',
                'value' => 1821,
              ),
              243 => 
              array (
                'key' => 'CONTRACTOR 4001',
                'value' => 1822,
              ),
              244 => 
              array (
                'key' => 'CONTRACTOR WATER S&D',
                'value' => 1823,
              ),
              245 => 
              array (
                'key' => 'CONTRACTOR\'S WATER',
                'value' => 1824,
              ),
              246 => 
              array (
                'key' => 'COOLING WATER',
                'value' => 1825,
              ),
              247 => 
              array (
                'key' => 'COOLING WATER 2.0',
                'value' => 1826,
              ),
              248 => 
              array (
                'key' => 'COTTON CLEANER',
                'value' => 1829519,
              ),
              249 => 
              array (
                'key' => 'COUPLING MALE SWIVEL',
                'value' => 1829191,
              ),
              250 => 
              array (
                'key' => 'CPE DISCHARGE',
                'value' => 1827,
              ),
              251 => 
              array (
                'key' => 'CPLAIR AIRCRAFT',
                'value' => 1829348,
              ),
              252 => 
              array (
                'key' => 'CREE BREWERS HOSE',
                'value' => 1828,
              ),
              253 => 
              array (
                'key' => 'CULVERT',
                'value' => 1829,
              ),
              254 => 
              array (
                'key' => 'DAMPF TRIX 5000',
                'value' => 1830,
              ),
              255 => 
              array (
                'key' => 'DAMPF TRIX 6000',
                'value' => 1831,
              ),
              256 => 
              array (
                'key' => 'DAMPFTRIX 6000',
                'value' => 1829406,
              ),
              257 => 
              array (
                'key' => 'DARCOR RED',
                'value' => 1829318,
              ),
              258 => 
              array (
                'key' => 'DARCY REDWING FUEL OIL',
                'value' => 1832,
              ),
              259 => 
              array (
                'key' => 'DEADMAN AIRCRAFT REFUELING',
                'value' => 1833,
              ),
              260 => 
              array (
                'key' => 'DEADMAN SANDBLAST',
                'value' => 1834,
              ),
              261 => 
              array (
                'key' => 'DEEP BLUE',
                'value' => 1829431,
              ),
              262 => 
              array (
                'key' => 'DEERE',
                'value' => 1835,
              ),
              263 => 
              array (
                'key' => 'DEF DISPENSING',
                'value' => 1836,
              ),
              264 => 
              array (
                'key' => 'DEF TRANSFER',
                'value' => 1837,
              ),
              265 => 
              array (
                'key' => 'DEL TWIN-LINE GRADE R',
                'value' => 1838,
              ),
              266 => 
              array (
                'key' => 'DEL TWIN-LINE GRADE RM',
                'value' => 1839,
              ),
              267 => 
              array (
                'key' => 'DENVER',
                'value' => 1840,
              ),
              268 => 
              array (
                'key' => 'DENVER CONC VIBR',
                'value' => 1841,
              ),
              269 => 
              array (
                'key' => 'DESERT DR16SC',
                'value' => 1842,
              ),
              270 => 
              array (
                'key' => 'DESERT DR1SN',
                'value' => 1843,
              ),
              271 => 
              array (
                'key' => 'DESERT DR2SN',
                'value' => 1844,
              ),
              272 => 
              array (
                'key' => 'DESERT DR5',
                'value' => 1845,
              ),
              273 => 
              array (
                'key' => 'DESERT DUT',
                'value' => 1846,
              ),
              274 => 
              array (
                'key' => 'DEVILBISS',
                'value' => 1829178,
              ),
              275 => 
              array (
                'key' => 'DEWATERING',
                'value' => 1847,
              ),
              276 => 
              array (
                'key' => 'DIAMOND',
                'value' => 1829370,
              ),
              277 => 
              array (
                'key' => 'DIESEL OIL HARDWALL',
                'value' => 1848,
              ),
              278 => 
              array (
                'key' => 'DIESEL OIL SOFTWALL',
                'value' => 1849,
              ),
              279 => 
              array (
                'key' => 'DIGESTER',
                'value' => 1850,
              ),
              280 => 
              array (
                'key' => 'DIISOCYANATE',
                'value' => 1851,
              ),
              281 => 
              array (
                'key' => 'DIN 24 Heavy',
                'value' => 1829968,
              ),
              282 => 
              array (
                'key' => 'DIN 24 Light',
                'value' => 1829967,
              ),
              283 => 
              array (
                'key' => 'DIN 60',
                'value' => 1829969,
              ),
              284 => 
              array (
                'key' => 'DINGA HOT WATER GUN',
                'value' => 1852,
              ),
              285 => 
              array (
                'key' => 'DISCHARGE',
                'value' => 1853,
              ),
              286 => 
              array (
                'key' => 'DISHWASHER DRAIN',
                'value' => 1854,
              ),
              287 => 
              array (
                'key' => 'DISTILLERY 150',
                'value' => 1855,
              ),
              288 => 
              array (
                'key' => 'DISTRB ACID',
                'value' => 1856,
              ),
              289 => 
              array (
                'key' => 'DISTRB ARCTIC ORTAC',
                'value' => 1857,
              ),
              290 => 
              array (
                'key' => 'DISTRB STEEL AIR',
                'value' => 1858,
              ),
              291 => 
              array (
                'key' => 'DISTRB WATER S&D',
                'value' => 1859,
              ),
              292 => 
              array (
                'key' => 'DIVERSIFLEX',
                'value' => 1860,
              ),
              293 => 
              array (
                'key' => 'DIVERSIPIPE',
                'value' => 1861,
              ),
              294 => 
              array (
                'key' => 'DIVING HOSE',
                'value' => 1862,
              ),
              295 => 
              array (
                'key' => 'DMC CAUSTIC',
                'value' => 1863,
              ),
              296 => 
              array (
                'key' => 'DOCK',
                'value' => 1864,
              ),
              297 => 
              array (
                'key' => 'DOCK EN1765 L15',
                'value' => 1865,
              ),
              298 => 
              array (
                'key' => 'DOCK EN1765 S15',
                'value' => 1866,
              ),
              299 => 
              array (
                'key' => 'DOCK FDA',
                'value' => 1867,
              ),
              300 => 
              array (
                'key' => 'DOCK SMOOTH BORE HOT SULFUR',
                'value' => 1868,
              ),
              301 => 
              array (
                'key' => 'DOCK SUPPLY SW',
                'value' => 1869,
              ),
              302 => 
              array (
                'key' => 'DR16SC',
                'value' => 1830041,
              ),
              303 => 
              array (
                'key' => 'DREDGE SLEEVE',
                'value' => 1870,
              ),
              304 => 
              array (
                'key' => 'DRILL WATER',
                'value' => 1871,
              ),
              305 => 
              array (
                'key' => 'DRINKLINE',
                'value' => 1872,
              ),
              306 => 
              array (
                'key' => 'DRY CEMENT HD HARDWALL',
                'value' => 1873,
              ),
              307 => 
              array (
                'key' => 'DRY CEMENT SOFTWALL',
                'value' => 1874,
              ),
              308 => 
              array (
                'key' => 'DRY ICE HOSE',
                'value' => 1875,
              ),
              309 => 
              array (
                'key' => 'DUAL HI-PERFORMANCE PD',
                'value' => 1829530,
              ),
              310 => 
              array (
                'key' => 'DUAL POSITIVE DRIVE PD',
                'value' => 1829510,
              ),
              311 => 
              array (
                'key' => 'Dual-Grip DGF1 Ferrule',
                'value' => 1830020,
              ),
              312 => 
              array (
                'key' => 'Dual-Grip DGF2 Ferrule',
                'value' => 1830021,
              ),
              313 => 
              array (
                'key' => 'DUDLEY WATER',
                'value' => 1876,
              ),
              314 => 
              array (
                'key' => 'DUNLOP BOOSTER',
                'value' => 1877,
              ),
              315 => 
              array (
                'key' => 'DURACO',
                'value' => 1878,
              ),
              316 => 
              array (
                'key' => 'DURACO ROADPATCH',
                'value' => 1879,
              ),
              317 => 
              array (
                'key' => 'DWE',
                'value' => 1829161,
              ),
              318 => 
              array (
                'key' => 'DYNACRAFT',
                'value' => 1880,
              ),
              319 => 
              array (
                'key' => 'DYNACRAFT D1045-2000',
                'value' => 1829127,
              ),
              320 => 
              array (
                'key' => 'DYNO',
                'value' => 1881,
              ),
              321 => 
              array (
                'key' => 'DYNO HOSE',
                'value' => 1882,
              ),
              322 => 
              array (
                'key' => 'DYNO HOSEINHOSE',
                'value' => 1829231,
              ),
              323 => 
              array (
                'key' => 'DYNO NOBEL',
                'value' => 1829125,
              ),
              324 => 
              array (
                'key' => 'E 1-1',
                'value' => 1883,
              ),
              325 => 
              array (
                'key' => 'E 3-1',
                'value' => 1884,
              ),
              326 => 
              array (
                'key' => 'E 3-2',
                'value' => 1885,
              ),
              327 => 
              array (
                'key' => 'EAGLE AIR & WATER',
                'value' => 1886,
              ),
              328 => 
              array (
                'key' => 'EAGLE FLUID POWER',
                'value' => 1829160,
              ),
              329 => 
              array (
                'key' => 'ECOLAB BLUE',
                'value' => 1829110,
              ),
              330 => 
              array (
                'key' => 'ECOLAB WASHDOWN',
                'value' => 1829193,
              ),
              331 => 
              array (
                'key' => 'EDPM DISCHARGE',
                'value' => 1829263,
              ),
              332 => 
              array (
                'key' => 'EHLYNN',
                'value' => 1887,
              ),
              333 => 
              array (
                'key' => 'EHLYNN FLOUR TEC',
                'value' => 1888,
              ),
              334 => 
              array (
                'key' => 'EHLYNN FOOD DISCHARGE',
                'value' => 1889,
              ),
              335 => 
              array (
                'key' => 'EHLYNN HOT AIR',
                'value' => 1890,
              ),
              336 => 
              array (
                'key' => 'EHLYNN PIPE CONNECTOR',
                'value' => 1891,
              ),
              337 => 
              array (
                'key' => 'EHLYNN TPG',
                'value' => 1892,
              ),
              338 => 
              array (
                'key' => 'ELAFLEX LAY FLAT',
                'value' => 1893,
              ),
              339 => 
              array (
                'key' => 'ELITE POLY-V',
                'value' => 1829495,
              ),
              340 => 
              array (
                'key' => 'ELITE POLY-V STRETCH',
                'value' => 1829529,
              ),
              341 => 
              array (
                'key' => 'ELITE STANDARD RADIATOR',
                'value' => 1894,
              ),
              342 => 
              array (
                'key' => 'ELITE SW MARINE WET EXHAUST',
                'value' => 1895,
              ),
              343 => 
              array (
                'key' => 'EN12115 PETROLEUM',
                'value' => 1896,
              ),
              344 => 
              array (
                'key' => 'EPDM 200',
                'value' => 1897,
              ),
              345 => 
              array (
                'key' => 'EPDM 200 (ECONOMY)',
                'value' => 1898,
              ),
              346 => 
              array (
                'key' => 'EPDM 200 (NON CON)',
                'value' => 1899,
              ),
              347 => 
              array (
                'key' => 'EPDM ACID',
                'value' => 1900,
              ),
              348 => 
              array (
                'key' => 'EPDM DISCHARGE',
                'value' => 1901,
              ),
              349 => 
              array (
                'key' => 'EPDM S&D',
                'value' => 1902,
              ),
              350 => 
              array (
                'key' => 'EPDM SD HD WATER',
                'value' => 1903,
              ),
              351 => 
              array (
                'key' => 'EPDM SD WATER',
                'value' => 1904,
              ),
              352 => 
              array (
                'key' => 'ERGON',
                'value' => 1905,
              ),
              353 => 
              array (
                'key' => 'ERIKS',
                'value' => 1906,
              ),
              354 => 
              array (
                'key' => 'ESTABROOK',
                'value' => 1829163,
              ),
              355 => 
              array (
                'key' => 'EURO TRIX',
                'value' => 1907,
              ),
              356 => 
              array (
                'key' => 'EXIMCO',
                'value' => 1908,
              ),
              357 => 
              array (
                'key' => 'EXIMCO FLOATER',
                'value' => 1829227,
              ),
              358 => 
              array (
                'key' => 'EXIMCO HYD',
                'value' => 1829402,
              ),
              359 => 
              array (
                'key' => 'EXON GP DOCK',
                'value' => 1909,
              ),
              360 => 
              array (
                'key' => 'EXPRESS BLOWER',
                'value' => 1910,
              ),
              361 => 
              array (
                'key' => 'EXSTATIC',
                'value' => 1911,
              ),
              362 => 
              array (
                'key' => 'EXTREME CRIMP CB STEAM',
                'value' => 1829118,
              ),
              363 => 
              array (
                'key' => 'EXTREMEBLAST LOAD',
                'value' => 1912,
              ),
              364 => 
              array (
                'key' => 'EXTREMEFLEX BEVERAGE',
                'value' => 1913,
              ),
              365 => 
              array (
                'key' => 'EXTREMEFLEX CHEMICAL BROWN',
                'value' => 1914,
              ),
              366 => 
              array (
                'key' => 'EXTREMEFLEX CHEMICAL PURPLE',
                'value' => 1915,
              ),
              367 => 
              array (
                'key' => 'EXTREMEFLEX FOOD',
                'value' => 1829369,
              ),
              368 => 
              array (
                'key' => 'EXTREMEFLEX FOOD BLUE',
                'value' => 1916,
              ),
              369 => 
              array (
                'key' => 'EXTREMEFLEX FOOD GRAY',
                'value' => 1917,
              ),
              370 => 
              array (
                'key' => 'EXTREMEFLEX FOOD RED',
                'value' => 1829382,
              ),
              371 => 
              array (
                'key' => 'EXTREMEFLEX PETROLEUM',
                'value' => 1918,
              ),
              372 => 
              array (
                'key' => 'EXTREMEFLEX POTABLE WATER',
                'value' => 1919,
              ),
              373 => 
              array (
                'key' => 'EXTREMEFLEX VERSIFLO',
                'value' => 1920,
              ),
              374 => 
              array (
                'key' => 'EXTREMEFLEX WATER SLURRY',
                'value' => 1921,
              ),
              375 => 
              array (
                'key' => 'EZ GLIDE WINE',
                'value' => 1922,
              ),
              376 => 
              array (
                'key' => 'F5 AIR',
                'value' => 1923,
              ),
              377 => 
              array (
                'key' => 'FABCHEM',
                'value' => 1924,
              ),
              378 => 
              array (
                'key' => 'FABCHEM ARC',
                'value' => 1925,
              ),
              379 => 
              array (
                'key' => 'FABCHEM EN12115',
                'value' => 1926,
              ),
              380 => 
              array (
                'key' => 'FABCHEM-C',
                'value' => 1927,
              ),
              381 => 
              array (
                'key' => 'FALCON PD',
                'value' => 1829521,
              ),
              382 => 
              array (
                'key' => 'Ferrules',
                'value' => 1830012,
              ),
              383 => 
              array (
                'key' => 'FHP',
                'value' => 1829507,
              ),
              384 => 
              array (
                'key' => 'FIBERG CRUCIBLE GASK',
                'value' => 1928,
              ),
              385 => 
              array (
                'key' => 'FINISHING BRANDS',
                'value' => 1929,
              ),
              386 => 
              array (
                'key' => 'FINN',
                'value' => 1829171,
              ),
              387 => 
              array (
                'key' => 'FIRE ENGINE BOOSTER',
                'value' => 1930,
              ),
              388 => 
              array (
                'key' => 'FIRE ENGINE SUCTION',
                'value' => 1931,
              ),
              389 => 
              array (
                'key' => 'FIRE ENGINER BOOSTER',
                'value' => 1932,
              ),
              390 => 
              array (
                'key' => 'FIRE SUCTION & DISCHARGE',
                'value' => 1829433,
              ),
              391 => 
              array (
                'key' => 'FISH HOSE',
                'value' => 1933,
              ),
              392 => 
              array (
                'key' => 'FISH SUCTION',
                'value' => 1829238,
              ),
              393 => 
              array (
                'key' => 'FISH TRANSFER',
                'value' => 1934,
              ),
              394 => 
              array (
                'key' => 'Flange Engine Oil Connection (Two Bolt)',
                'value' => 1830007,
              ),
              395 => 
              array (
                'key' => 'Flareless Tube',
                'value' => 1829981,
              ),
              396 => 
              array (
                'key' => 'Flareless Tube Nuts',
                'value' => 1829994,
              ),
              397 => 
              array (
                'key' => 'Flareless Tube Sleeves',
                'value' => 1829995,
              ),
              398 => 
              array (
                'key' => 'FLDCON',
                'value' => 1935,
              ),
              399 => 
              array (
                'key' => 'FLEX-ING FLEX AQUA WATER S&D',
                'value' => 1943,
              ),
              400 => 
              array (
                'key' => 'FLEX-ING FLEX-ON',
                'value' => 1944,
              ),
              401 => 
              array (
                'key' => 'FLEX-PULSE FPII',
                'value' => 1946,
              ),
              402 => 
              array (
                'key' => 'FLEXAGRIP',
                'value' => 1936,
              ),
              403 => 
              array (
                'key' => 'FLEXCHEM 225',
                'value' => 1937,
              ),
              404 => 
              array (
                'key' => 'FLEXDOCK',
                'value' => 1938,
              ),
              405 => 
              array (
                'key' => 'FLEXDOCK VERSAFUEL',
                'value' => 1939,
              ),
              406 => 
              array (
                'key' => 'FLEXIBLE DOWNSPOUT',
                'value' => 1940,
              ),
              407 => 
              array (
                'key' => 'FLEXIBLE TEFLON',
                'value' => 1941,
              ),
              408 => 
              array (
                'key' => 'FLEXICORE',
                'value' => 1942,
              ),
              409 => 
              array (
                'key' => 'FLEXILLA',
                'value' => 1829099,
              ),
              410 => 
              array (
                'key' => 'FLEXING FLEX-ON',
                'value' => 1829124,
              ),
              411 => 
              array (
                'key' => 'FLEXJET',
                'value' => 1945,
              ),
              412 => 
              array (
                'key' => 'FLEXON',
                'value' => 1829094,
              ),
              413 => 
              array (
                'key' => 'FLEXRITE',
                'value' => 1947,
              ),
              414 => 
              array (
                'key' => 'FLEXSHIELD SAE J1527 A1-15',
                'value' => 1829362,
              ),
              415 => 
              array (
                'key' => 'FLEXSHIELD SAE J1527 TYPE A1-15',
                'value' => 1948,
              ),
              416 => 
              array (
                'key' => 'FLEXSTEEL 250 CB EXTREME CRIMP',
                'value' => 1949,
              ),
              417 => 
              array (
                'key' => 'FLEXSTEEL 250 CB STEAM',
                'value' => 1950,
              ),
              418 => 
              array (
                'key' => 'FLEXSTEEL 250 EPDM',
                'value' => 1829327,
              ),
              419 => 
              array (
                'key' => 'FLEXSTEEL 250 EPDM-20',
                'value' => 1951,
              ),
              420 => 
              array (
                'key' => 'FLEXSTEEL 250 ORS STEAM',
                'value' => 1952,
              ),
              421 => 
              array (
                'key' => 'FLEXSTEEL 250 STEAM',
                'value' => 1953,
              ),
              422 => 
              array (
                'key' => 'FLEXSTEEL FUTURA',
                'value' => 1954,
              ),
              423 => 
              array (
                'key' => 'FLEXSTEEL FUTURA B20',
                'value' => 1955,
              ),
              424 => 
              array (
                'key' => 'FLEXSTEEL FUTURA E25',
                'value' => 1956,
              ),
              425 => 
              array (
                'key' => 'FLEXSTEEL FUTURA ETHAN-ALL',
                'value' => 1957,
              ),
              426 => 
              array (
                'key' => 'FLEXSTEEL FUTURA HVR',
                'value' => 1958,
              ),
              427 => 
              array (
                'key' => 'FLEXSTEEL FUTURA HVR LOW PERM',
                'value' => 1959,
              ),
              428 => 
              array (
                'key' => 'FLEXSTEEL FUTURA LOW PERM',
                'value' => 1960,
              ),
              429 => 
              array (
                'key' => 'FLEXSTEEL FUTURA VAPOR ASSIST',
                'value' => 1961,
              ),
              430 => 
              array (
                'key' => 'FLEXSTEEL HW',
                'value' => 1829212,
              ),
              431 => 
              array (
                'key' => 'FLEXSTEEL MINE SPRAY',
                'value' => 1962,
              ),
              432 => 
              array (
                'key' => 'FLEXSTEEL MINESPRAY',
                'value' => 1963,
              ),
              433 => 
              array (
                'key' => 'FLEXSTEEL SERVICE STATION AIR',
                'value' => 1964,
              ),
              434 => 
              array (
                'key' => 'FLEXTRA DRY MATERIAL',
                'value' => 1965,
              ),
              435 => 
              array (
                'key' => 'FLEXTRA LT',
                'value' => 1966,
              ),
              436 => 
              array (
                'key' => 'FLEXTRA LT BLUE',
                'value' => 1829367,
              ),
              437 => 
              array (
                'key' => 'FLEXTRA OILFIELD',
                'value' => 1967,
              ),
              438 => 
              array (
                'key' => 'FLEXTRA ROCK DUST',
                'value' => 1968,
              ),
              439 => 
              array (
                'key' => 'FLEXTRAL GRIP-LOC',
                'value' => 1829179,
              ),
              440 => 
              array (
                'key' => 'FLEXTRAL J2',
                'value' => 1829399,
              ),
              441 => 
              array (
                'key' => 'FLEXWAC',
                'value' => 1969,
              ),
              442 => 
              array (
                'key' => 'FLEXWING FOOD BLUE',
                'value' => 1970,
              ),
              443 => 
              array (
                'key' => 'FLEXWING OILFIELD',
                'value' => 1971,
              ),
              444 => 
              array (
                'key' => 'FLEXWING PETROLEUM',
                'value' => 1972,
              ),
              445 => 
              array (
                'key' => 'FLEXWING VERSAFUEL',
                'value' => 1973,
              ),
              446 => 
              array (
                'key' => 'FLEXWING WATER S&D',
                'value' => 1974,
              ),
              447 => 
              array (
                'key' => 'FLOATER',
                'value' => 1975,
              ),
              448 => 
              array (
                'key' => 'FLOATING HOSES',
                'value' => 1976,
              ),
              449 => 
              array (
                'key' => 'FLOUR DISCHARGE',
                'value' => 1977,
              ),
              450 => 
              array (
                'key' => 'FLUOROPAL',
                'value' => 1978,
              ),
              451 => 
              array (
                'key' => 'FOAM',
                'value' => 1979,
              ),
              452 => 
              array (
                'key' => 'FOOD 2720',
                'value' => 1980,
              ),
              453 => 
              array (
                'key' => 'FOOD DISCHARGE',
                'value' => 1981,
              ),
              454 => 
              array (
                'key' => 'FOOD FLEX',
                'value' => 1982,
              ),
              455 => 
              array (
                'key' => 'FOOD SUCTION & DISCHARGE',
                'value' => 1983,
              ),
              456 => 
              array (
                'key' => 'FOODCLEAN',
                'value' => 1984,
              ),
              457 => 
              array (
                'key' => 'FOODLINER',
                'value' => 1985,
              ),
              458 => 
              array (
                'key' => 'Ford Spring Lock',
                'value' => 1829989,
              ),
              459 => 
              array (
                'key' => 'FORECAST BLAST',
                'value' => 1986,
              ),
              460 => 
              array (
                'key' => 'FORECAST BLAST XF',
                'value' => 1987,
              ),
              461 => 
              array (
                'key' => 'FORECAST SUCTION',
                'value' => 1988,
              ),
              462 => 
              array (
                'key' => 'FORESTRY',
                'value' => 1989,
              ),
              463 => 
              array (
                'key' => 'FORMADRAIN INFLATABLE HOSE',
                'value' => 1990,
              ),
              464 => 
              array (
                'key' => 'FORTRESS',
                'value' => 1991,
              ),
              465 => 
              array (
                'key' => 'FOSTER',
                'value' => 1992,
              ),
              466 => 
              array (
                'key' => 'FRAC',
                'value' => 1993,
              ),
              467 => 
              array (
                'key' => 'FRAC ACID S&D',
                'value' => 1994,
              ),
              468 => 
              array (
                'key' => 'FRAC ACID S&D 400',
                'value' => 1829354,
              ),
              469 => 
              array (
                'key' => 'FRAC BLENDING 500SD',
                'value' => 1829374,
              ),
              470 => 
              array (
                'key' => 'FRAC BLENDING S&D',
                'value' => 1995,
              ),
              471 => 
              array (
                'key' => 'FRACO',
                'value' => 1996,
              ),
              472 => 
              array (
                'key' => 'FREON CHARGING',
                'value' => 1997,
              ),
              473 => 
              array (
                'key' => 'FRIG SEA',
                'value' => 1998,
              ),
              474 => 
              array (
                'key' => 'FRONTIER',
                'value' => 1999,
              ),
              475 => 
              array (
                'key' => 'FUEL DISCHARGE',
                'value' => 2000,
              ),
              476 => 
              array (
                'key' => 'FUEL DISCHARGE 150',
                'value' => 1829337,
              ),
              477 => 
              array (
                'key' => 'FUEL DISCHARGE 200',
                'value' => 1829405,
              ),
              478 => 
              array (
                'key' => 'FUEL DISCHARGE 250',
                'value' => 1829237,
              ),
              479 => 
              array (
                'key' => 'FUEL DISCHARGE 300',
                'value' => 1829373,
              ),
              480 => 
              array (
                'key' => 'FUEL DISCHARGE HD',
                'value' => 2001,
              ),
              481 => 
              array (
                'key' => 'FUEL DISCHARGE HD 300',
                'value' => 1829422,
              ),
              482 => 
              array (
                'key' => 'FUEL FILL SAE J1527 TYPE A2',
                'value' => 2002,
              ),
              483 => 
              array (
                'key' => 'FUEL RIG SW',
                'value' => 2003,
              ),
              484 => 
              array (
                'key' => 'FUELGRIP COUPLING',
                'value' => 2004,
              ),
              485 => 
              array (
                'key' => 'FUGGITT',
                'value' => 2005,
              ),
              486 => 
              array (
                'key' => 'FUJI',
                'value' => 2006,
              ),
              487 => 
              array (
                'key' => 'FURNACE DOOR',
                'value' => 2007,
              ),
              488 => 
              array (
                'key' => 'FUTURA O-RING KIT',
                'value' => 2008,
              ),
              489 => 
              array (
                'key' => 'FUTURA RET RING INST. TOOL',
                'value' => 2009,
              ),
              490 => 
              array (
                'key' => 'GALAXY G4826',
                'value' => 2010,
              ),
              491 => 
              array (
                'key' => 'GALAXY G4867',
                'value' => 2011,
              ),
              492 => 
              array (
                'key' => 'GALAXY G4890',
                'value' => 2012,
              ),
              493 => 
              array (
                'key' => 'GALVANATOR',
                'value' => 2013,
              ),
              494 => 
              array (
                'key' => 'GAMMON',
                'value' => 2014,
              ),
              495 => 
              array (
                'key' => 'GARDEN HOSE',
                'value' => 1829286,
              ),
              496 => 
              array (
                'key' => 'GARRISON GAUNTLET',
                'value' => 1829424,
              ),
              497 => 
              array (
                'key' => 'GATES',
                'value' => 1829135,
              ),
              498 => 
              array (
                'key' => 'GATES 32000002',
                'value' => 1829418,
              ),
              499 => 
              array (
                'key' => 'GATES 32000003',
                'value' => 1829305,
              ),
              500 => 
              array (
                'key' => 'GATES 32000006',
                'value' => 1829245,
              ),
              501 => 
              array (
                'key' => 'GATES 32000007',
                'value' => 1829294,
              ),
              502 => 
              array (
                'key' => 'GATES 32000008',
                'value' => 1829247,
              ),
              503 => 
              array (
                'key' => 'GATES 32000009',
                'value' => 1829209,
              ),
              504 => 
              array (
                'key' => 'GATES 32000011',
                'value' => 1829265,
              ),
              505 => 
              array (
                'key' => 'GATES 32000012',
                'value' => 1829276,
              ),
              506 => 
              array (
                'key' => 'GATES 32000013',
                'value' => 1829254,
              ),
              507 => 
              array (
                'key' => 'GATES 32000014',
                'value' => 1829213,
              ),
              508 => 
              array (
                'key' => 'GATES 32000015',
                'value' => 1829419,
              ),
              509 => 
              array (
                'key' => 'GATES 32000016',
                'value' => 1829235,
              ),
              510 => 
              array (
                'key' => 'GATES 32000213',
                'value' => 1829420,
              ),
              511 => 
              array (
                'key' => 'GATES 32020011',
                'value' => 1829185,
              ),
              512 => 
              array (
                'key' => 'GATES 32020016',
                'value' => 1829390,
              ),
              513 => 
              array (
                'key' => 'GATES 32020021',
                'value' => 1829391,
              ),
              514 => 
              array (
                'key' => 'GATES 32020027',
                'value' => 1829392,
              ),
              515 => 
              array (
                'key' => 'GATES 32041328',
                'value' => 1829151,
              ),
              516 => 
              array (
                'key' => 'GATES 32041346',
                'value' => 1829126,
              ),
              517 => 
              array (
                'key' => 'GATES 32041349',
                'value' => 1829194,
              ),
              518 => 
              array (
                'key' => 'GATES 32041355',
                'value' => 1829136,
              ),
              519 => 
              array (
                'key' => 'GATES 32041364',
                'value' => 1829148,
              ),
              520 => 
              array (
                'key' => 'GATES 32041425',
                'value' => 1829267,
              ),
              521 => 
              array (
                'key' => 'GATES 32041437',
                'value' => 1829394,
              ),
              522 => 
              array (
                'key' => 'GATES 32050016',
                'value' => 1829284,
              ),
              523 => 
              array (
                'key' => 'GATES 32050026',
                'value' => 1829250,
              ),
              524 => 
              array (
                'key' => 'GATES 32050031',
                'value' => 1829259,
              ),
              525 => 
              array (
                'key' => 'GATES 32050036',
                'value' => 1829240,
              ),
              526 => 
              array (
                'key' => 'GATES 32050040',
                'value' => 1829208,
              ),
              527 => 
              array (
                'key' => 'GATES 32050041',
                'value' => 1829177,
              ),
              528 => 
              array (
                'key' => 'GATES 32050046',
                'value' => 1829146,
              ),
              529 => 
              array (
                'key' => 'GATES 32050049',
                'value' => 1829244,
              ),
              530 => 
              array (
                'key' => 'GATES 32050055',
                'value' => 1829181,
              ),
              531 => 
              array (
                'key' => 'GATES 32050226',
                'value' => 1829308,
              ),
              532 => 
              array (
                'key' => 'GATES 32050231',
                'value' => 1829310,
              ),
              533 => 
              array (
                'key' => 'GATES 32050236',
                'value' => 1829421,
              ),
              534 => 
              array (
                'key' => 'GATES 32050241',
                'value' => 1829303,
              ),
              535 => 
              array (
                'key' => 'GATES 32714397',
                'value' => 1829425,
              ),
              536 => 
              array (
                'key' => 'GATES 3624-0145',
                'value' => 1829261,
              ),
              537 => 
              array (
                'key' => 'GATES GASFLEX',
                'value' => 1829331,
              ),
              538 => 
              array (
                'key' => 'GATES STEAMKING',
                'value' => 1829107,
              ),
              539 => 
              array (
                'key' => 'GAUNTLET',
                'value' => 2015,
              ),
              540 => 
              array (
                'key' => 'GENERIC',
                'value' => 2016,
              ),
              541 => 
              array (
                'key' => 'GENERIC AIR',
                'value' => 1829359,
              ),
              542 => 
              array (
                'key' => 'GENERIC AIR 250',
                'value' => 1829312,
              ),
              543 => 
              array (
                'key' => 'GENERIC LOW TEMP TANK TRUCK',
                'value' => 2017,
              ),
              544 => 
              array (
                'key' => 'GENERIC PETRO TANK TRUCK',
                'value' => 1829253,
              ),
              545 => 
              array (
                'key' => 'GENERIC PL & GR',
                'value' => 1829332,
              ),
              546 => 
              array (
                'key' => 'GENERIC PLASTER & GROUT',
                'value' => 2018,
              ),
              547 => 
              array (
                'key' => 'GENERIC VACUUM',
                'value' => 2019,
              ),
              548 => 
              array (
                'key' => 'GENERIC WATER 100D',
                'value' => 1829299,
              ),
              549 => 
              array (
                'key' => 'GENERIC WATER DISCHARGE',
                'value' => 2020,
              ),
              550 => 
              array (
                'key' => 'GENERIC WATER S&D',
                'value' => 2021,
              ),
              551 => 
              array (
                'key' => 'GENLINE',
                'value' => 2022,
              ),
              552 => 
              array (
                'key' => 'GENLINE GL',
                'value' => 2023,
              ),
              553 => 
              array (
                'key' => 'GENLINE GL-802',
                'value' => 2024,
              ),
              554 => 
              array (
                'key' => 'GENLINE GL-803',
                'value' => 2025,
              ),
              555 => 
              array (
                'key' => 'GHX',
                'value' => 2026,
              ),
              556 => 
              array (
                'key' => 'GHX OILFIELD',
                'value' => 1829398,
              ),
              557 => 
              array (
                'key' => 'GHX OILFIELD S&D',
                'value' => 1829395,
              ),
              558 => 
              array (
                'key' => 'GHX PETRO XPOWER',
                'value' => 1829123,
              ),
              559 => 
              array (
                'key' => 'GHX WATER S&D',
                'value' => 1829397,
              ),
              560 => 
              array (
                'key' => 'GHX XPOWER OILFIELD FRAC TANK',
                'value' => 1829186,
              ),
              561 => 
              array (
                'key' => 'GILBARCO',
                'value' => 2027,
              ),
              562 => 
              array (
                'key' => 'GLOBAL',
                'value' => 2028,
              ),
              563 => 
              array (
                'key' => 'GLOBAL M24565-70-H',
                'value' => 1829204,
              ),
              564 => 
              array (
                'key' => 'GNSPEC',
                'value' => 2029,
              ),
              565 => 
              array (
                'key' => 'GNSPEC 100R12',
                'value' => 2030,
              ),
              566 => 
              array (
                'key' => 'GNSPEC 100R16',
                'value' => 2031,
              ),
              567 => 
              array (
                'key' => 'GNSPEC 100R17',
                'value' => 1829224,
              ),
              568 => 
              array (
                'key' => 'GNSPEC 100R2',
                'value' => 2032,
              ),
              569 => 
              array (
                'key' => 'GNSPEC 100R6',
                'value' => 2033,
              ),
              570 => 
              array (
                'key' => 'GNSPEC 200 AIR',
                'value' => 2034,
              ),
              571 => 
              array (
                'key' => 'GNSPEC 250 AIR',
                'value' => 2035,
              ),
              572 => 
              array (
                'key' => 'GNSPEC 300 AIR',
                'value' => 2036,
              ),
              573 => 
              array (
                'key' => 'GNSPEC 4001 PRESSURE WASHER',
                'value' => 2037,
              ),
              574 => 
              array (
                'key' => 'GNSPEC 4500 PRESSURE WASHER',
                'value' => 2038,
              ),
              575 => 
              array (
                'key' => 'GNSPEC NR SPRAY',
                'value' => 2039,
              ),
              576 => 
              array (
                'key' => 'GNSPEC PUSH ON 250',
                'value' => 2040,
              ),
              577 => 
              array (
                'key' => 'GOLD SNAKE',
                'value' => 2041,
              ),
              578 => 
              array (
                'key' => 'GOOD FLEX',
                'value' => 2042,
              ),
              579 => 
              array (
                'key' => 'GOODAL',
                'value' => 1829176,
              ),
              580 => 
              array (
                'key' => 'GOODALL',
                'value' => 2043,
              ),
              581 => 
              array (
                'key' => 'GOODALL CHEMICAL',
                'value' => 1829400,
              ),
              582 => 
              array (
                'key' => 'GORILLA',
                'value' => 2044,
              ),
              583 => 
              array (
                'key' => 'GRACO',
                'value' => 2045,
              ),
              584 => 
              array (
                'key' => 'GRACO 079055',
                'value' => 1829134,
              ),
              585 => 
              array (
                'key' => 'GRAINGER',
                'value' => 2046,
              ),
              586 => 
              array (
                'key' => 'GRAY DUCTING',
                'value' => 1829388,
              ),
              587 => 
              array (
                'key' => 'GRAY FLEXTRA LT',
                'value' => 2047,
              ),
              588 => 
              array (
                'key' => 'GRAY FLEXWING',
                'value' => 2048,
              ),
              589 => 
              array (
                'key' => 'GRAY FOOD',
                'value' => 2049,
              ),
              590 => 
              array (
                'key' => 'GRAY SUCTION',
                'value' => 2050,
              ),
              591 => 
              array (
                'key' => 'GREASE GUN HOSE',
                'value' => 2051,
              ),
              592 => 
              array (
                'key' => 'GREAT NECK',
                'value' => 2052,
              ),
              593 => 
              array (
                'key' => 'GREAT PLAINS',
                'value' => 2053,
              ),
              594 => 
              array (
                'key' => 'GREEN HORNET XF',
                'value' => 2054,
              ),
              595 => 
              array (
                'key' => 'GREEN XLPE 150',
                'value' => 1829325,
              ),
              596 => 
              array (
                'key' => 'GRINUS',
                'value' => 1829389,
              ),
              597 => 
              array (
                'key' => 'GTF',
                'value' => 1829954,
              ),
              598 => 
              array (
                'key' => 'GUNITE',
                'value' => 2055,
              ),
              599 => 
              array (
                'key' => 'GUNITE (TAN)',
                'value' => 1829353,
              ),
              600 => 
              array (
                'key' => 'HAMILON BLAST',
                'value' => 1829365,
              ),
              601 => 
              array (
                'key' => 'HAMILTON BLAST',
                'value' => 2056,
              ),
              602 => 
              array (
                'key' => 'HAMILTON HYDROCARBON DRAIN',
                'value' => 2057,
              ),
              603 => 
              array (
                'key' => 'Hammer Union',
                'value' => 1829962,
              ),
              604 => 
              array (
                'key' => 'HANLIO TWIN-LINE (GRADE R)',
                'value' => 1829417,
              ),
              605 => 
              array (
                'key' => 'HANLIO TWIN-LINE GRADE R',
                'value' => 2058,
              ),
              606 => 
              array (
                'key' => 'HART',
                'value' => 2059,
              ),
              607 => 
              array (
                'key' => 'HART BLACK SOFTWALL',
                'value' => 2060,
              ),
              608 => 
              array (
                'key' => 'HART FABCHEM',
                'value' => 2061,
              ),
              609 => 
              array (
                'key' => 'HART FLOUR DISCHARGE',
                'value' => 2062,
              ),
              610 => 
              array (
                'key' => 'HART HOT AIR',
                'value' => 2063,
              ),
              611 => 
              array (
                'key' => 'HARVEST',
                'value' => 2064,
              ),
              612 => 
              array (
                'key' => 'HAWAII MARINE',
                'value' => 1829377,
              ),
              613 => 
              array (
                'key' => 'HAWK PD',
                'value' => 1829522,
              ),
              614 => 
              array (
                'key' => 'HD AIR',
                'value' => 2065,
              ),
              615 => 
              array (
                'key' => 'HD AIR & WATER',
                'value' => 2066,
              ),
              616 => 
              array (
                'key' => 'HD AIR 300',
                'value' => 1829289,
              ),
              617 => 
              array (
                'key' => 'HD INDUSTRIAL VACUUM',
                'value' => 2067,
              ),
              618 => 
              array (
                'key' => 'HD PETRO TRANSFER',
                'value' => 2068,
              ),
              619 => 
              array (
                'key' => 'HD VACUUM',
                'value' => 2069,
              ),
              620 => 
              array (
                'key' => 'HD WATER DISCHARGE',
                'value' => 2070,
              ),
              621 => 
              array (
                'key' => 'HD WATER SD',
                'value' => 2071,
              ),
              622 => 
              array (
                'key' => 'HEALY LOW PERM',
                'value' => 1829101,
              ),
              623 => 
              array (
                'key' => 'HEATER HOSE 20R3D2',
                'value' => 2072,
              ),
              624 => 
              array (
                'key' => 'HEATER WATER',
                'value' => 2073,
              ),
              625 => 
              array (
                'key' => 'HEAVY DUTY STEAM PILE DRIVER',
                'value' => 2074,
              ),
              626 => 
              array (
                'key' => 'HEWITT',
                'value' => 2075,
              ),
              627 => 
              array (
                'key' => 'HEWITT AIRCRAFT',
                'value' => 2076,
              ),
              628 => 
              array (
                'key' => 'HEX',
                'value' => 1829505,
              ),
              629 => 
              array (
                'key' => 'HI-MINER II',
                'value' => 2077,
              ),
              630 => 
              array (
                'key' => 'HI-PER',
                'value' => 2078,
              ),
              631 => 
              array (
                'key' => 'HIGHLAND BRINE WATER S&D',
                'value' => 1829287,
              ),
              632 => 
              array (
                'key' => 'HIGHLAND POTABLE WATER S&D',
                'value' => 1829262,
              ),
              633 => 
              array (
                'key' => 'HIGHLAND RAW WATER S&D',
                'value' => 1829268,
              ),
              634 => 
              array (
                'key' => 'HIGHLAND WASTE WATER S&D',
                'value' => 1829315,
              ),
              635 => 
              array (
                'key' => 'HIPER WATER',
                'value' => 2079,
              ),
              636 => 
              array (
                'key' => 'HITECH WASHDOWN',
                'value' => 1829301,
              ),
              637 => 
              array (
                'key' => 'HOOSIER FOOD TL',
                'value' => 2080,
              ),
              638 => 
              array (
                'key' => 'HOSCO',
                'value' => 2081,
              ),
              639 => 
              array (
                'key' => 'HOSE ASSEMBLY COLD',
                'value' => 1829095,
              ),
              640 => 
              array (
                'key' => 'HOSE ASSEMBLY HOT',
                'value' => 1829097,
              ),
              641 => 
              array (
                'key' => 'HOSE GUYS',
                'value' => 1829344,
              ),
              642 => 
              array (
                'key' => 'Hose Joiner',
                'value' => 1829972,
              ),
              643 => 
              array (
                'key' => 'Hose Medner with Sight Glass',
                'value' => 1829990,
              ),
              644 => 
              array (
                'key' => 'Hose Mender',
                'value' => 1829982,
              ),
              645 => 
              array (
                'key' => 'Hose Mender with Sight Glass',
                'value' => 1829983,
              ),
              646 => 
              array (
                'key' => 'Hose Mender, Tee',
                'value' => 1829984,
              ),
              647 => 
              array (
                'key' => 'HOSE POWER',
                'value' => 2082,
              ),
              648 => 
              array (
                'key' => 'HOSEPOWER',
                'value' => 2083,
              ),
              649 => 
              array (
                'key' => 'HOSEPOWER PLASTER & GROUT',
                'value' => 1829401,
              ),
              650 => 
              array (
                'key' => 'HOT AIR',
                'value' => 1829319,
              ),
              651 => 
              array (
                'key' => 'HOT TAR & ASPHALT EN13482',
                'value' => 2084,
              ),
              652 => 
              array (
                'key' => 'HOT TAR & ASPHALT ROUGH BORE',
                'value' => 2085,
              ),
              653 => 
              array (
                'key' => 'HOT WATER ELITE',
                'value' => 2086,
              ),
              654 => 
              array (
                'key' => 'HR4',
                'value' => 2087,
              ),
              655 => 
              array (
                'key' => 'HR6',
                'value' => 2088,
              ),
              656 => 
              array (
                'key' => 'HSS WATER JETTING',
                'value' => 1829385,
              ),
              657 => 
              array (
                'key' => 'HUDSON',
                'value' => 2089,
              ),
              658 => 
              array (
                'key' => 'HUMIDIFIER HOSE',
                'value' => 2090,
              ),
              659 => 
              array (
                'key' => 'HUSKY',
                'value' => 2091,
              ),
              660 => 
              array (
                'key' => 'HVLP NON-CONDUCTIVE',
                'value' => 2092,
              ),
              661 => 
              array (
                'key' => 'HW DRY CEMENT & BARITES',
                'value' => 2093,
              ),
              662 => 
              array (
                'key' => 'HY-T HEATER HOSE',
                'value' => 1829350,
              ),
              663 => 
              array (
                'key' => 'HY-T PLUS',
                'value' => 1829503,
              ),
              664 => 
              array (
                'key' => 'HY-T TORQUE TEAM',
                'value' => 1829494,
              ),
              665 => 
              array (
                'key' => 'HY-T TORQUE TEAM LAMINATED',
                'value' => 1829502,
              ),
              666 => 
              array (
                'key' => 'HY-T TORQUE TEAM PLUS',
                'value' => 1829499,
              ),
              667 => 
              array (
                'key' => 'HY-T WEDGE',
                'value' => 1829506,
              ),
              668 => 
              array (
                'key' => 'HY-T WEDGE TORQUE TEAM',
                'value' => 1829501,
              ),
              669 => 
              array (
                'key' => 'HYDROCARBON DRAIN',
                'value' => 2094,
              ),
              670 => 
              array (
                'key' => 'HYDROVATOR',
                'value' => 2095,
              ),
              671 => 
              array (
                'key' => 'HYDROVATOR PLUS',
                'value' => 2096,
              ),
              672 => 
              array (
                'key' => 'I.R.F.',
                'value' => 2097,
              ),
              673 => 
              array (
                'key' => 'IBM COOLING WATER',
                'value' => 2098,
              ),
              674 => 
              array (
                'key' => 'IBRS',
                'value' => 2099,
              ),
              675 => 
              array (
                'key' => 'IBRS FISH HOSE',
                'value' => 1829113,
              ),
              676 => 
              array (
                'key' => 'IBRS FISH S&D',
                'value' => 1829195,
              ),
              677 => 
              array (
                'key' => 'IBRS SANITARY',
                'value' => 2100,
              ),
              678 => 
              array (
                'key' => 'ICE CUTTER HOSE',
                'value' => 2101,
              ),
              679 => 
              array (
                'key' => 'ICS GROUP AIR',
                'value' => 1829356,
              ),
              680 => 
              array (
                'key' => 'IMPERL POLARSHIELD',
                'value' => 1829216,
              ),
              681 => 
              array (
                'key' => 'INERT GAS',
                'value' => 2102,
              ),
              682 => 
              array (
                'key' => 'INET COOLING',
                'value' => 2103,
              ),
              683 => 
              array (
                'key' => 'INFINITY CHEM',
                'value' => 1829288,
              ),
              684 => 
              array (
                'key' => 'INFINITY CHEMICAL',
                'value' => 2104,
              ),
              685 => 
              array (
                'key' => 'INFINITY FOOD',
                'value' => 2105,
              ),
              686 => 
              array (
                'key' => 'INFINITY FUEL DROP',
                'value' => 2106,
              ),
              687 => 
              array (
                'key' => 'INFINITY FUEL DROP HD',
                'value' => 2107,
              ),
              688 => 
              array (
                'key' => 'INFINITY MILK',
                'value' => 2108,
              ),
              689 => 
              array (
                'key' => 'INJECTION COOLANT',
                'value' => 2109,
              ),
              690 => 
              array (
                'key' => 'INLET HOSE',
                'value' => 2110,
              ),
              691 => 
              array (
                'key' => 'Inline Orifice Tubes',
                'value' => 1829996,
              ),
              692 => 
              array (
                'key' => 'INSTA-GRIP',
                'value' => 1829109,
              ),
              693 => 
              array (
                'key' => 'INSTA-GRIP 250',
                'value' => 2111,
              ),
              694 => 
              array (
                'key' => 'INSTA-GRIP 300',
                'value' => 2112,
              ),
              695 => 
              array (
                'key' => 'INSTA-GRIP HT',
                'value' => 2113,
              ),
              696 => 
              array (
                'key' => 'INSTA-GRIP SP',
                'value' => 2114,
              ),
              697 => 
              array (
                'key' => 'INSTA-GRIP TC',
                'value' => 2115,
              ),
              698 => 
              array (
                'key' => 'INSTA-LOCK',
                'value' => 2116,
              ),
              699 => 
              array (
                'key' => 'INSTA-LOCK ADAPTER',
                'value' => 1829281,
              ),
              700 => 
              array (
                'key' => 'INSTA-LOCK COUPLER',
                'value' => 1829269,
              ),
              701 => 
              array (
                'key' => 'INSTA-LOCK CRIMP SLEEVE',
                'value' => 1829290,
              ),
              702 => 
              array (
                'key' => 'INSTA-LOCK DUST CAP',
                'value' => 1829167,
              ),
              703 => 
              array (
                'key' => 'INSTA-LOCK DUST PLUG',
                'value' => 1829295,
              ),
              704 => 
              array (
                'key' => 'INSTA-LOCK FERRULE',
                'value' => 1829278,
              ),
              705 => 
              array (
                'key' => 'INSTA-LOCK GASKET',
                'value' => 1829302,
              ),
              706 => 
              array (
                'key' => 'INSTA-LOCK HOSE STEM',
                'value' => 1829277,
              ),
              707 => 
              array (
                'key' => 'INSTA-LOCK JUMP SIZE',
                'value' => 1829251,
              ),
              708 => 
              array (
                'key' => 'INSTA-LOCK SPOOL ADAPTER',
                'value' => 1829314,
              ),
              709 => 
              array (
                'key' => 'INSTA-LOCK TYPE A',
                'value' => 1829243,
              ),
              710 => 
              array (
                'key' => 'INSTA-LOCK TYPE B',
                'value' => 1829248,
              ),
              711 => 
              array (
                'key' => 'INSTA-LOCK TYPE C',
                'value' => 1829119,
              ),
              712 => 
              array (
                'key' => 'INSTA-LOCK TYPE D',
                'value' => 1829115,
              ),
              713 => 
              array (
                'key' => 'INSTA-LOCK TYPE E',
                'value' => 1829223,
              ),
              714 => 
              array (
                'key' => 'INSTA-LOCK TYPE F',
                'value' => 1829285,
              ),
              715 => 
              array (
                'key' => 'INSTA-POWER',
                'value' => 1829496,
              ),
              716 => 
              array (
                'key' => 'INTERCHEM',
                'value' => 2117,
              ),
              717 => 
              array (
                'key' => 'INTERM',
                'value' => 2118,
              ),
              718 => 
              array (
                'key' => 'INTERNATIONAL BELT',
                'value' => 2119,
              ),
              719 => 
              array (
                'key' => 'INTERNATIONAL BELT VERSIFLO S&D',
                'value' => 1829393,
              ),
              720 => 
              array (
                'key' => 'IRC DRILL WATER',
                'value' => 2120,
              ),
              721 => 
              array (
                'key' => 'IRPCO',
                'value' => 2121,
              ),
              722 => 
              array (
                'key' => 'IRPCO RED FUEL OIL',
                'value' => 1829155,
              ),
              723 => 
              array (
                'key' => 'IRR',
                'value' => 2122,
              ),
              724 => 
              array (
                'key' => 'IRR FLEX JET',
                'value' => 2123,
              ),
              725 => 
              array (
                'key' => 'IRRIGATION BOOT',
                'value' => 2124,
              ),
              726 => 
              array (
                'key' => 'ISO 3821',
                'value' => 2125,
              ),
              727 => 
              array (
                'key' => 'ISO 8031',
                'value' => 2126,
              ),
              728 => 
              array (
                'key' => 'ITALPR',
                'value' => 2127,
              ),
              729 => 
              array (
                'key' => 'ITALPR TEFLON',
                'value' => 2128,
              ),
              730 => 
              array (
                'key' => 'JACKHAMMER',
                'value' => 2129,
              ),
              731 => 
              array (
                'key' => 'JB INDUSTRIES',
                'value' => 2130,
              ),
              732 => 
              array (
                'key' => 'JET RANGER',
                'value' => 2131,
              ),
              733 => 
              array (
                'key' => 'JETTING',
                'value' => 2132,
              ),
              734 => 
              array (
                'key' => 'JETTING AND UTILITY',
                'value' => 2133,
              ),
              735 => 
              array (
                'key' => 'JETTING UTILITY',
                'value' => 1829339,
              ),
              736 => 
              array (
                'key' => 'JGB INDUSTRIES',
                'value' => 2134,
              ),
              737 => 
              array (
                'key' => 'JIC 37 Flare',
                'value' => 1830011,
              ),
              738 => 
              array (
                'key' => 'JIC 37 Flare (SAE J514)',
                'value' => 1829945,
              ),
              739 => 
              array (
                'key' => 'JIS 30 (Paralled Pipe Threads)',
                'value' => 1829971,
              ),
              740 => 
              array (
                'key' => 'JIS 30 (Parallel Pipe Threads)',
                'value' => 1829978,
              ),
              741 => 
              array (
                'key' => 'JOHN DEERE',
                'value' => 2135,
              ),
              742 => 
              array (
                'key' => 'JOHN DEERE WATER S&D',
                'value' => 1829271,
              ),
              743 => 
              array (
                'key' => 'KAPTEC ULTRAFLEX',
                'value' => 2136,
              ),
              744 => 
              array (
                'key' => 'KAPTECH FOOD DICHARGE',
                'value' => 2137,
              ),
              745 => 
              array (
                'key' => 'KCRUBBER AUGER ARC PILING',
                'value' => 1829175,
              ),
              746 => 
              array (
                'key' => 'KELCO BLAST',
                'value' => 2138,
              ),
              747 => 
              array (
                'key' => 'KETEK FLEX PETROLEUM',
                'value' => 2139,
              ),
              748 => 
              array (
                'key' => 'KIDDE 20079 FIRE EX UL92',
                'value' => 1829219,
              ),
              749 => 
              array (
                'key' => 'KINK GUARD',
                'value' => 1829280,
              ),
              750 => 
              array (
                'key' => 'KINKGUARD',
                'value' => 2140,
              ),
              751 => 
              array (
                'key' => 'KINKGUARD GARDEN HOSE',
                'value' => 1829372,
              ),
              752 => 
              array (
                'key' => 'Komatsu 30 Flare with Metric Threads',
                'value' => 1829970,
              ),
              753 => 
              array (
                'key' => 'Komatsu Flange',
                'value' => 1829963,
              ),
              754 => 
              array (
                'key' => 'L&G GE SANDER HOSE',
                'value' => 1829139,
              ),
              755 => 
              array (
                'key' => 'L&G ROCK DUST SW HD',
                'value' => 1829121,
              ),
              756 => 
              array (
                'key' => 'LABOUR BLUCOR COUPLING',
                'value' => 2141,
              ),
              757 => 
              array (
                'key' => 'LACTOPAL',
                'value' => 2142,
              ),
              758 => 
              array (
                'key' => 'LACTOPAL L',
                'value' => 1829414,
              ),
              759 => 
              array (
                'key' => 'LAKECHARLES',
                'value' => 2143,
              ),
              760 => 
              array (
                'key' => 'LEGACY TPU',
                'value' => 2144,
              ),
              761 => 
              array (
                'key' => 'LG NITRILE',
                'value' => 2145,
              ),
              762 => 
              array (
                'key' => 'LIGHTRAC',
                'value' => 2146,
              ),
              763 => 
              array (
                'key' => 'LIGHTWEIGHT VACUUM',
                'value' => 2147,
              ),
              764 => 
              array (
                'key' => 'LINECRETE',
                'value' => 2148,
              ),
              765 => 
              array (
                'key' => 'LIQUID MUD',
                'value' => 2149,
              ),
              766 => 
              array (
                'key' => 'LIQUID MUD YS',
                'value' => 2150,
              ),
              767 => 
              array (
                'key' => 'LIQUIFORCE',
                'value' => 2151,
              ),
              768 => 
              array (
                'key' => 'LPG DELIVERY PRO',
                'value' => 2152,
              ),
              769 => 
              array (
                'key' => 'LUMPKIN',
                'value' => 1829203,
              ),
              770 => 
              array (
                'key' => 'LW ARCTIC TANK TRUCK',
                'value' => 2153,
              ),
              771 => 
              array (
                'key' => 'LW BLACK FLEXTRA II',
                'value' => 2154,
              ),
              772 => 
              array (
                'key' => 'LW INDUSTRIAL VACUUM',
                'value' => 2155,
              ),
              773 => 
              array (
                'key' => 'M&P MINE CONDUIT',
                'value' => 2156,
              ),
              774 => 
              array (
                'key' => 'M13531J-B3A',
                'value' => 1829133,
              ),
              775 => 
              array (
                'key' => 'MADE IN USA GARDEN',
                'value' => 1829273,
              ),
              776 => 
              array (
                'key' => 'MANUS BLAST',
                'value' => 2157,
              ),
              777 => 
              array (
                'key' => 'MANUS BLAST WHIP',
                'value' => 2158,
              ),
              778 => 
              array (
                'key' => 'MARIAN',
                'value' => 2159,
              ),
              779 => 
              array (
                'key' => 'MARINE BILGE',
                'value' => 2160,
              ),
              780 => 
              array (
                'key' => 'MARINE EXHAUST HOSE',
                'value' => 2161,
              ),
              781 => 
              array (
                'key' => 'MARINE FUEL FEED VENT J1527 B2',
                'value' => 2162,
              ),
              782 => 
              array (
                'key' => 'MARINE FUEL FILL',
                'value' => 2163,
              ),
              783 => 
              array (
                'key' => 'MARINE FUEL LINE',
                'value' => 2164,
              ),
              784 => 
              array (
                'key' => 'MARINE HARDWALL WET EXHAUST',
                'value' => 2165,
              ),
              785 => 
              array (
                'key' => 'MARINE LIVEWELL',
                'value' => 2166,
              ),
              786 => 
              array (
                'key' => 'MARINE OIL FILL',
                'value' => 2167,
              ),
              787 => 
              array (
                'key' => 'MARINE SANITATION',
                'value' => 2168,
              ),
              788 => 
              array (
                'key' => 'MARINE SOFTWALL WET EXHAUST',
                'value' => 2169,
              ),
              789 => 
              array (
                'key' => 'MARINE VACUUM',
                'value' => 2170,
              ),
              790 => 
              array (
                'key' => 'MAST-AIR',
                'value' => 2171,
              ),
              791 => 
              array (
                'key' => 'MASTERCOOL',
                'value' => 2172,
              ),
              792 => 
              array (
                'key' => 'MASTHD',
                'value' => 2173,
              ),
              793 => 
              array (
                'key' => 'MASTHEAD',
                'value' => 1829258,
              ),
              794 => 
              array (
                'key' => 'MASTHEAD CONTRACTOR\'S WATER',
                'value' => 1829352,
              ),
              795 => 
              array (
                'key' => 'MATERIAL HANDLING',
                'value' => 2174,
              ),
              796 => 
              array (
                'key' => 'MATERIAL HANDLING 150',
                'value' => 1829351,
              ),
              797 => 
              array (
                'key' => 'MATERIAL HANDLING DISCHARGE',
                'value' => 2175,
              ),
              798 => 
              array (
                'key' => 'MATERIAL HANDLING DISCHARGE 75',
                'value' => 1829334,
              ),
              799 => 
              array (
                'key' => 'MAXXIM PREMIER ULTRA',
                'value' => 2176,
              ),
              800 => 
              array (
                'key' => 'MCCARTY WATER S&D',
                'value' => 2177,
              ),
              801 => 
              array (
                'key' => 'MCGILL',
                'value' => 2178,
              ),
              802 => 
              array (
                'key' => 'MECR&S',
                'value' => 2179,
              ),
              803 => 
              array (
                'key' => 'MECR&S PAINT SPRAY',
                'value' => 2180,
              ),
              804 => 
              array (
                'key' => 'MER OILFIELD SUCTION',
                'value' => 2181,
              ),
              805 => 
              array (
                'key' => 'MERMAR',
                'value' => 2182,
              ),
              806 => 
              array (
                'key' => 'MESA',
                'value' => 2183,
              ),
              807 => 
              array (
                'key' => 'MESA AMMONIUM NITRATE PELLET',
                'value' => 2184,
              ),
              808 => 
              array (
                'key' => 'MESA DRAIN',
                'value' => 2185,
              ),
              809 => 
              array (
                'key' => 'MESA GUNITE',
                'value' => 2186,
              ),
              810 => 
              array (
                'key' => 'MESA PLASTER & GROUT',
                'value' => 2187,
              ),
              811 => 
              array (
                'key' => 'MESA REFRACTORY GUNITE',
                'value' => 2188,
              ),
              812 => 
              array (
                'key' => 'MESA ROOF DRAIN',
                'value' => 2189,
              ),
              813 => 
              array (
                'key' => 'MESA ROOF DRAIN CHEMICAL',
                'value' => 2190,
              ),
              814 => 
              array (
                'key' => 'Metal Clips',
                'value' => 1830004,
              ),
              815 => 
              array (
                'key' => 'METRIC',
                'value' => 1829524,
              ),
              816 => 
              array (
                'key' => 'MH 500',
                'value' => 1829296,
              ),
              817 => 
              array (
                'key' => 'MH 75',
                'value' => 1829321,
              ),
              818 => 
              array (
                'key' => 'MHPRF 11588G II ST',
                'value' => 2191,
              ),
              819 => 
              array (
                'key' => 'MIDWEST',
                'value' => 2192,
              ),
              820 => 
              array (
                'key' => 'MIDWEST BELTING',
                'value' => 1829336,
              ),
              821 => 
              array (
                'key' => 'MIL 3992F',
                'value' => 1829222,
              ),
              822 => 
              array (
                'key' => 'MIL A-A-59566',
                'value' => 2193,
              ),
              823 => 
              array (
                'key' => 'MIL A-A-59567',
                'value' => 2194,
              ),
              824 => 
              array (
                'key' => 'MIL AA-59567 3-1',
                'value' => 1829292,
              ),
              825 => 
              array (
                'key' => 'MIL-A-A-59565',
                'value' => 2195,
              ),
              826 => 
              array (
                'key' => 'MIL-DTL-13444-I',
                'value' => 2196,
              ),
              827 => 
              array (
                'key' => 'MIL-DTL-13444-III',
                'value' => 2197,
              ),
              828 => 
              array (
                'key' => 'MIL-DTL-13531 TYPE II, CL A',
                'value' => 2198,
              ),
              829 => 
              array (
                'key' => 'MIL-DTL-17505',
                'value' => 2199,
              ),
              830 => 
              array (
                'key' => 'MIL-DTL-20176',
                'value' => 2200,
              ),
              831 => 
              array (
                'key' => 'MIL-DTL-22240',
                'value' => 2201,
              ),
              832 => 
              array (
                'key' => 'MIL-DTL-27516',
                'value' => 2202,
              ),
              833 => 
              array (
                'key' => 'MIL-DTL-29210',
                'value' => 2203,
              ),
              834 => 
              array (
                'key' => 'MIL-DTL-6615',
                'value' => 2204,
              ),
              835 => 
              array (
                'key' => 'MIL-DTL-8788',
                'value' => 1830042,
              ),
              836 => 
              array (
                'key' => 'MIL-H-24136/4',
                'value' => 1829435,
              ),
              837 => 
              array (
                'key' => 'MIL-H-24580',
                'value' => 2205,
              ),
              838 => 
              array (
                'key' => 'MIL-H-82127',
                'value' => 2206,
              ),
              839 => 
              array (
                'key' => 'MIL-PRF-11588 TYPE I',
                'value' => 2207,
              ),
              840 => 
              array (
                'key' => 'MIL-PRF-11588 TYPE III',
                'value' => 2208,
              ),
              841 => 
              array (
                'key' => 'MIL-PRF-370 TYPE A',
                'value' => 2209,
              ),
              842 => 
              array (
                'key' => 'MIL-PRF-370 TYPE B',
                'value' => 2210,
              ),
              843 => 
              array (
                'key' => 'MILTARY',
                'value' => 2211,
              ),
              844 => 
              array (
                'key' => 'MILTON',
                'value' => 2212,
              ),
              845 => 
              array (
                'key' => 'MINE CONDUIT',
                'value' => 2213,
              ),
              846 => 
              array (
                'key' => 'MINNICH WATER HD',
                'value' => 1829157,
              ),
              847 => 
              array (
                'key' => 'MISC',
                'value' => 1829256,
              ),
              848 => 
              array (
                'key' => 'MIT TEKTON',
                'value' => 1829142,
              ),
              849 => 
              array (
                'key' => 'MOCCASIN',
                'value' => 2214,
              ),
              850 => 
              array (
                'key' => 'MORRIS AIR SEEDER',
                'value' => 2215,
              ),
              851 => 
              array (
                'key' => 'MORRIS AIR SEEDER LT',
                'value' => 2216,
              ),
              852 => 
              array (
                'key' => 'MPI',
                'value' => 2217,
              ),
              853 => 
              array (
                'key' => 'MPI 132-0580',
                'value' => 1829159,
              ),
              854 => 
              array (
                'key' => 'MPI 350-0380',
                'value' => 1829230,
              ),
              855 => 
              array (
                'key' => 'MPI 350-0560',
                'value' => 1829153,
              ),
              856 => 
              array (
                'key' => 'MPI 350-0580',
                'value' => 1829093,
              ),
              857 => 
              array (
                'key' => 'MPI HW EXHAUST',
                'value' => 1829300,
              ),
              858 => 
              array (
                'key' => 'MPI HW FUEL FILL',
                'value' => 1829137,
              ),
              859 => 
              array (
                'key' => 'MPI PREMIUM-GUARD MARINE',
                'value' => 2218,
              ),
              860 => 
              array (
                'key' => 'MRS',
                'value' => 1829338,
              ),
              861 => 
              array (
                'key' => 'MSA AIR BREATHING',
                'value' => 1829117,
              ),
              862 => 
              array (
                'key' => 'MUD CUTTING HW',
                'value' => 2219,
              ),
              863 => 
              array (
                'key' => 'MUD RETURN LINE',
                'value' => 2220,
              ),
              864 => 
              array (
                'key' => 'MUD STACKING',
                'value' => 2221,
              ),
              865 => 
              array (
                'key' => 'MULTISTREAM HW',
                'value' => 2222,
              ),
              866 => 
              array (
                'key' => 'MULTISTREAM SW',
                'value' => 2223,
              ),
              867 => 
              array (
                'key' => 'NAFIRE',
                'value' => 2224,
              ),
              868 => 
              array (
                'key' => 'NAVISTAR',
                'value' => 2225,
              ),
              869 => 
              array (
                'key' => 'NELSON DUNN',
                'value' => 2226,
              ),
              870 => 
              array (
                'key' => 'NELSON DUNN CABLE COVER',
                'value' => 1829183,
              ),
              871 => 
              array (
                'key' => 'NEOTHANE',
                'value' => 1829508,
              ),
              872 => 
              array (
                'key' => 'NEPTUNE',
                'value' => 2227,
              ),
              873 => 
              array (
                'key' => 'NESI OILFIELD',
                'value' => 2228,
              ),
              874 => 
              array (
                'key' => 'NEWLINE',
                'value' => 2229,
              ),
              875 => 
              array (
                'key' => 'NEWLINE VINTNER RESERVE',
                'value' => 1829255,
              ),
              876 => 
              array (
                'key' => 'NEWLINE WALKWAY WATER',
                'value' => 1829403,
              ),
              877 => 
              array (
                'key' => 'NISHIN',
                'value' => 2230,
              ),
              878 => 
              array (
                'key' => 'NISSHIN',
                'value' => 2231,
              ),
              879 => 
              array (
                'key' => 'NITRO FLOOD WATER S&D',
                'value' => 2232,
              ),
              880 => 
              array (
                'key' => 'NITRO R&C WATER S&D',
                'value' => 2233,
              ),
              881 => 
              array (
                'key' => 'NITROGEN SERVICE',
                'value' => 2234,
              ),
              882 => 
              array (
                'key' => 'NOTRAX T43S5050RD',
                'value' => 1829207,
              ),
              883 => 
              array (
                'key' => 'NOV',
                'value' => 2235,
              ),
              884 => 
              array (
                'key' => 'NPETRO LW',
                'value' => 2236,
              ),
              885 => 
              array (
                'key' => 'NPM API',
                'value' => 1829979,
              ),
              886 => 
              array (
                'key' => 'NPSM',
                'value' => 1829953,
              ),
              887 => 
              array (
                'key' => 'NPT API',
                'value' => 1829974,
              ),
              888 => 
              array (
                'key' => 'NPT API Hammer Union ',
                'value' => 1830010,
              ),
              889 => 
              array (
                'key' => 'NPTF',
                'value' => 1829952,
              ),
              890 => 
              array (
                'key' => 'NR SPRAY',
                'value' => 2237,
              ),
              891 => 
              array (
                'key' => 'NR7',
                'value' => 2238,
              ),
              892 => 
              array (
                'key' => 'NR8',
                'value' => 2239,
              ),
              893 => 
              array (
                'key' => 'NRP JONES CT5',
                'value' => 1829196,
              ),
              894 => 
              array (
                'key' => 'NRP JONES NON-UL CT5',
                'value' => 1829120,
              ),
              895 => 
              array (
                'key' => 'NSH',
                'value' => 2240,
              ),
              896 => 
              array (
                'key' => 'NUTRIFLEX',
                'value' => 2241,
              ),
              897 => 
              array (
                'key' => 'NUTRIFLEX STATIC WIRE',
                'value' => 2242,
              ),
              898 => 
              array (
                'key' => 'NUTRIFLEX SUCTION & DISCHARGE',
                'value' => 2243,
              ),
              899 => 
              array (
                'key' => 'NUTRIFLO SUCTION & DISCHARGE',
                'value' => 2244,
              ),
              900 => 
              array (
                'key' => 'O-Ring Boss ',
                'value' => 1830009,
              ),
              901 => 
              array (
                'key' => 'O-Ring Boss Straight Thread (SAE J1453)',
                'value' => 1829975,
              ),
              902 => 
              array (
                'key' => 'O-Ring Boss Straight Thread (SAE J514)',
                'value' => 1829958,
              ),
              903 => 
              array (
                'key' => 'O-Ring Boss Straight Thread O-Rings (SAE J514)',
                'value' => 1831351,
              ),
              904 => 
              array (
                'key' => 'O-Ring Face Seal',
                'value' => 1829991,
              ),
              905 => 
              array (
                'key' => 'O-Ring Face Seal (SAE J1453 ORS/ORFS)',
                'value' => 1829957,
              ),
              906 => 
              array (
                'key' => 'O-Ring Face Seal O-Rings (SAE J1453 ORS/ORFS)',
                'value' => 1831350,
              ),
              907 => 
              array (
                'key' => 'O-Ring for Ford Spring Lock',
                'value' => 1829997,
              ),
              908 => 
              array (
                'key' => 'O-Ring for Switch',
                'value' => 1829998,
              ),
              909 => 
              array (
                'key' => 'O-Ring for Tube Fittings',
                'value' => 1829999,
              ),
              910 => 
              array (
                'key' => 'O-Ring Insert',
                'value' => 1829985,
              ),
              911 => 
              array (
                'key' => 'O-Ring Tube',
                'value' => 1829986,
              ),
              912 => 
              array (
                'key' => 'O-Ring Tube (Female to O-Ring Insert)',
                'value' => 1829993,
              ),
              913 => 
              array (
                'key' => 'O-Ring Tube Compressor (Female to O-Ring Insert) ',
                'value' => 1829992,
              ),
              914 => 
              array (
                'key' => 'OAKLEY',
                'value' => 2245,
              ),
              915 => 
              array (
                'key' => 'OFFSHORE FUEL',
                'value' => 2246,
              ),
              916 => 
              array (
                'key' => 'OFFSHORE FUEL 500',
                'value' => 1829275,
              ),
              917 => 
              array (
                'key' => 'OFFSHORE FUEL 750',
                'value' => 1829364,
              ),
              918 => 
              array (
                'key' => 'OFFSHORE VIPER',
                'value' => 2247,
              ),
              919 => 
              array (
                'key' => 'OIL DISCHARGE',
                'value' => 2248,
              ),
              920 => 
              array (
                'key' => 'OIL RIG HARDWALL',
                'value' => 2249,
              ),
              921 => 
              array (
                'key' => 'OIL RIG HARDWALL BIOFUEL',
                'value' => 2250,
              ),
              922 => 
              array (
                'key' => 'OIL RIG SOFTWALL',
                'value' => 2251,
              ),
              923 => 
              array (
                'key' => 'OIL RIG SW',
                'value' => 1829329,
              ),
              924 => 
              array (
                'key' => 'OIL TREAT & BLENDER',
                'value' => 2252,
              ),
              925 => 
              array (
                'key' => 'OILFIELD DISCHARGE',
                'value' => 2253,
              ),
              926 => 
              array (
                'key' => 'OILFIELD FRAC',
                'value' => 2254,
              ),
              927 => 
              array (
                'key' => 'OMNI',
                'value' => 2255,
              ),
              928 => 
              array (
                'key' => 'OMNI WATER S&D',
                'value' => 2256,
              ),
              929 => 
              array (
                'key' => 'OPEN END FALCON',
                'value' => 1829523,
              ),
              930 => 
              array (
                'key' => 'OPEN END HAWK',
                'value' => 1829517,
              ),
              931 => 
              array (
                'key' => 'OPEN END HY-T PLUS',
                'value' => 1829504,
              ),
              932 => 
              array (
                'key' => 'OPEN END METRIC T PD',
                'value' => 1829518,
              ),
              933 => 
              array (
                'key' => 'OPEN END POSITIVE DRIVE',
                'value' => 1829511,
              ),
              934 => 
              array (
                'key' => 'OPEN END SUPER TORQUE',
                'value' => 1829515,
              ),
              935 => 
              array (
                'key' => 'ORANGE FLEXWING',
                'value' => 2257,
              ),
              936 => 
              array (
                'key' => 'ORTAC',
                'value' => 2258,
              ),
              937 => 
              array (
                'key' => 'ORTAC II',
                'value' => 2259,
              ),
              938 => 
              array (
                'key' => 'PACER',
                'value' => 2260,
              ),
              939 => 
              array (
                'key' => 'PACIFIC RUBBER MULCHBLOWER',
                'value' => 1829232,
              ),
              940 => 
              array (
                'key' => 'PAGUFIX',
                'value' => 2261,
              ),
              941 => 
              array (
                'key' => 'PALADIN',
                'value' => 2262,
              ),
              942 => 
              array (
                'key' => 'PALADIN DROP',
                'value' => 1829164,
              ),
              943 => 
              array (
                'key' => 'PANGBORN PA BLAST',
                'value' => 2263,
              ),
              944 => 
              array (
                'key' => 'PARKING',
                'value' => 2264,
              ),
              945 => 
              array (
                'key' => 'PATHFINDER GARDEN',
                'value' => 1829283,
              ),
              946 => 
              array (
                'key' => 'PEAK ENERGY FRONTIER',
                'value' => 1829371,
              ),
              947 => 
              array (
                'key' => 'PERFECT GARDEN HOSE',
                'value' => 2265,
              ),
              948 => 
              array (
                'key' => 'PERLAPAL',
                'value' => 2266,
              ),
              949 => 
              array (
                'key' => 'PETERS LIQUID MUD',
                'value' => 2267,
              ),
              950 => 
              array (
                'key' => 'PETRO OIL S&D',
                'value' => 2268,
              ),
              951 => 
              array (
                'key' => 'PETRO OIL S&D 200',
                'value' => 1829416,
              ),
              952 => 
              array (
                'key' => 'PETROL 400 HARDWALL',
                'value' => 1829355,
              ),
              953 => 
              array (
                'key' => 'PETROL HARDWALL',
                'value' => 2269,
              ),
              954 => 
              array (
                'key' => 'PGC PLACEMENT TEXTILE',
                'value' => 2270,
              ),
              955 => 
              array (
                'key' => 'PHILLIPS 66 HYDROCARBON DRAIN',
                'value' => 1829218,
              ),
              956 => 
              array (
                'key' => 'PHX FUEL GAS',
                'value' => 2271,
              ),
              957 => 
              array (
                'key' => 'PHX OXYGEN',
                'value' => 2272,
              ),
              958 => 
              array (
                'key' => 'PIONEER HOT AIR II SP',
                'value' => 1829220,
              ),
              959 => 
              array (
                'key' => 'PIONEER PETRO TANK TRUCK',
                'value' => 1829386,
              ),
              960 => 
              array (
                'key' => 'PIONEER XF BLAST',
                'value' => 1829379,
              ),
              961 => 
              array (
                'key' => 'PLASTER & GROUT',
                'value' => 2273,
              ),
              962 => 
              array (
                'key' => 'Plastic Clip Holder',
                'value' => 1830005,
              ),
              963 => 
              array (
                'key' => 'PLATINUM JAC RISER',
                'value' => 2274,
              ),
              964 => 
              array (
                'key' => 'PLIOVIC AG SPRAY',
                'value' => 1829274,
              ),
              965 => 
              array (
                'key' => 'PLIOVIC FG',
                'value' => 2275,
              ),
              966 => 
              array (
                'key' => 'PLIOVIC GS',
                'value' => 2276,
              ),
              967 => 
              array (
                'key' => 'PLIOVIC PLUS',
                'value' => 2277,
              ),
              968 => 
              array (
                'key' => 'PLIOVIC PVC TUBING',
                'value' => 2278,
              ),
              969 => 
              array (
                'key' => 'POLY-V',
                'value' => 1829493,
              ),
              970 => 
              array (
                'key' => 'POSEIDON UL94-HB',
                'value' => 2279,
              ),
              971 => 
              array (
                'key' => 'POSITIVE DRIVE PD',
                'value' => 1829509,
              ),
              972 => 
              array (
                'key' => 'POT LINE',
                'value' => 2280,
              ),
              973 => 
              array (
                'key' => 'POT LINE HD',
                'value' => 2281,
              ),
              974 => 
              array (
                'key' => 'POTABLE STOCK TANK',
                'value' => 2282,
              ),
              975 => 
              array (
                'key' => 'POTABLE WATER',
                'value' => 2283,
              ),
              976 => 
              array (
                'key' => 'POTABLE WATER HW',
                'value' => 2284,
              ),
              977 => 
              array (
                'key' => 'POTABLE WATER S&D',
                'value' => 1829346,
              ),
              978 => 
              array (
                'key' => 'POTABLE WATER SW',
                'value' => 2285,
              ),
              979 => 
              array (
                'key' => 'POWERSPAN CL',
                'value' => 1829528,
              ),
              980 => 
              array (
                'key' => 'PRAIRIE GOLDFLEX',
                'value' => 2286,
              ),
              981 => 
              array (
                'key' => 'PRAIRIE GOLDFLEX PETRO',
                'value' => 1829174,
              ),
              982 => 
              array (
                'key' => 'PREM MARINE WET EXHAUST COR',
                'value' => 2287,
              ),
              983 => 
              array (
                'key' => 'PREMIER',
                'value' => 1829311,
              ),
              984 => 
              array (
                'key' => 'PREMIER AIR 1000',
                'value' => 1829361,
              ),
              985 => 
              array (
                'key' => 'PREMIER REFRACTORY CLAMP',
                'value' => 2288,
              ),
              986 => 
              array (
                'key' => 'PREMIER VINTNER',
                'value' => 1829266,
              ),
              987 => 
              array (
                'key' => 'PREMIUM GARDEN',
                'value' => 2289,
              ),
              988 => 
              array (
                'key' => 'PREMIUM MARINE WET EXHAUST',
                'value' => 2290,
              ),
              989 => 
              array (
                'key' => 'PROSPECTOR AIR',
                'value' => 2291,
              ),
              990 => 
              array (
                'key' => 'PROSPECTOR BOP 3000',
                'value' => 2292,
              ),
              991 => 
              array (
                'key' => 'PROSPECTOR BOP 5000',
                'value' => 2293,
              ),
              992 => 
              array (
                'key' => 'PROSPECTOR FLEX',
                'value' => 2294,
              ),
              993 => 
              array (
                'key' => 'PROSPECTOR FLEX OILFIELD',
                'value' => 2295,
              ),
              994 => 
              array (
                'key' => 'PROSPECTOR FLEX PETRO',
                'value' => 2296,
              ),
              995 => 
              array (
                'key' => 'PROSPECTOR FRAC 400 DISCHARGE',
                'value' => 1829404,
              ),
              996 => 
              array (
                'key' => 'PROSPECTOR FRAC DISCHARGE',
                'value' => 2297,
              ),
              997 => 
              array (
                'key' => 'PROSPECTOR FRAC TANK HOSE',
                'value' => 2298,
              ),
              998 => 
              array (
                'key' => 'PROSPECTOR HOT OILER',
                'value' => 2299,
              ),
              999 => 
              array (
                'key' => 'PROSPECTOR MINESPRAY',
                'value' => 2300,
              ),
              1000 => 
              array (
                'key' => 'PROSPECTOR OIL RIG HARDWALL',
                'value' => 1829396,
              ),
              1001 => 
              array (
                'key' => 'PROSPECTOR OIL RIG HW',
                'value' => 2301,
              ),
              1002 => 
              array (
                'key' => 'PROSPECTOR OIL RIG SW',
                'value' => 2302,
              ),
              1003 => 
              array (
                'key' => 'PROSPECTOR OILFIELD',
                'value' => 2303,
              ),
              1004 => 
              array (
                'key' => 'PROSPECTOR OILFIELD S&D',
                'value' => 2304,
              ),
              1005 => 
              array (
                'key' => 'PROSPECTOR OILFIELD S&D 150',
                'value' => 1829375,
              ),
              1006 => 
              array (
                'key' => 'PROSPECTOR OILFIELD S&D 300',
                'value' => 1829241,
              ),
              1007 => 
              array (
                'key' => 'PROSPECTOR PETRO',
                'value' => 2305,
              ),
              1008 => 
              array (
                'key' => 'PROSPECTOR PLUS AIR',
                'value' => 2306,
              ),
              1009 => 
              array (
                'key' => 'PROSPECTOR SHR',
                'value' => 2307,
              ),
              1010 => 
              array (
                'key' => 'PROSPECTOR WATER DISCHARGE',
                'value' => 2308,
              ),
              1011 => 
              array (
                'key' => 'PROSPECTOR WATER DISCHARGE 150',
                'value' => 1829169,
              ),
              1012 => 
              array (
                'key' => 'PROSPECTOR WATER S&D',
                'value' => 2309,
              ),
              1013 => 
              array (
                'key' => 'PROSPECTORFLEX BLUE UHMWPE',
                'value' => 1829272,
              ),
              1014 => 
              array (
                'key' => 'PROTECTION RING',
                'value' => 2310,
              ),
              1015 => 
              array (
                'key' => 'PSC CHEMICAL',
                'value' => 2311,
              ),
              1016 => 
              array (
                'key' => 'PTT 30',
                'value' => 1830008,
              ),
              1017 => 
              array (
                'key' => 'PULP & PAPER WASHDOWN',
                'value' => 2312,
              ),
              1018 => 
              array (
                'key' => 'PUMPTEC PULSE',
                'value' => 1829211,
              ),
              1019 => 
              array (
                'key' => 'PUREONE',
                'value' => 2313,
              ),
              1020 => 
              array (
                'key' => 'PURFIT',
                'value' => 2314,
              ),
              1021 => 
              array (
                'key' => 'PURFIT BREWLINE',
                'value' => 2315,
              ),
              1022 => 
              array (
                'key' => 'PURPLE FLEXWING',
                'value' => 2316,
              ),
              1023 => 
              array (
                'key' => 'PURPLE SNAKE',
                'value' => 2317,
              ),
              1024 => 
              array (
                'key' => 'PURPLE SNAKE PLUS',
                'value' => 2318,
              ),
              1025 => 
              array (
                'key' => 'PYROFLEX HOT AIR',
                'value' => 2319,
              ),
              1026 => 
              array (
                'key' => 'PYROFLEX HOT AIR II',
                'value' => 1829132,
              ),
              1027 => 
              array (
                'key' => 'PYROFLEX HOT AIR III FDA',
                'value' => 2320,
              ),
              1028 => 
              array (
                'key' => 'PYROFLEX HOT TAR & ASPHALT II',
                'value' => 1829129,
              ),
              1029 => 
              array (
                'key' => 'PYROFLEX HOT TAR WAND',
                'value' => 2321,
              ),
              1030 => 
              array (
                'key' => 'PYROFLEX II HOT AIR',
                'value' => 2322,
              ),
              1031 => 
              array (
                'key' => 'PYROFLEX II HOT TAR & ASPHALT',
                'value' => 2323,
              ),
              1032 => 
              array (
                'key' => 'PYROFLEX III HOT AIR',
                'value' => 2324,
              ),
              1033 => 
              array (
                'key' => 'PYROFLEX III HOT AIR FDA',
                'value' => 2325,
              ),
              1034 => 
              array (
                'key' => 'QR048',
                'value' => 2326,
              ),
              1035 => 
              array (
                'key' => 'QR48',
                'value' => 2327,
              ),
              1036 => 
              array (
                'key' => 'QUIKSTIR',
                'value' => 2328,
              ),
              1037 => 
              array (
                'key' => 'QUIKSTIR PUMP 2P',
                'value' => 2329,
              ),
              1038 => 
              array (
                'key' => 'R/W',
                'value' => 1829432,
              ),
              1039 => 
              array (
                'key' => 'RADIATOR',
                'value' => 2330,
              ),
              1040 => 
              array (
                'key' => 'RADIATOR HOSE',
                'value' => 1829347,
              ),
              1041 => 
              array (
                'key' => 'RAGCO',
                'value' => 2331,
              ),
              1042 => 
              array (
                'key' => 'RAGCO FABCHEM',
                'value' => 1829242,
              ),
              1043 => 
              array (
                'key' => 'RAGCO FLEX KENT',
                'value' => 1829387,
              ),
              1044 => 
              array (
                'key' => 'RAIL',
                'value' => 2332,
              ),
              1045 => 
              array (
                'key' => 'RANSBG NR SPRAY',
                'value' => 2333,
              ),
              1046 => 
              array (
                'key' => 'RAWHID FIRE ENGINE BOOSTER',
                'value' => 2334,
              ),
              1047 => 
              array (
                'key' => 'RCT FLEXRITE',
                'value' => 2335,
              ),
              1048 => 
              array (
                'key' => 'RDC',
                'value' => 2336,
              ),
              1049 => 
              array (
                'key' => 'REAL RUBBER',
                'value' => 2337,
              ),
              1050 => 
              array (
                'key' => 'RED FLEXTRA',
                'value' => 2338,
              ),
              1051 => 
              array (
                'key' => 'RED FLEXTRA 100',
                'value' => 1829324,
              ),
              1052 => 
              array (
                'key' => 'RED FLEXTRA 150',
                'value' => 1829304,
              ),
              1053 => 
              array (
                'key' => 'RED ORTAC II',
                'value' => 1829326,
              ),
              1054 => 
              array (
                'key' => 'RED-L GOLDFLEX-C',
                'value' => 2339,
              ),
              1055 => 
              array (
                'key' => 'RED-L PLANT STEAM',
                'value' => 1829210,
              ),
              1056 => 
              array (
                'key' => 'RED-L WATER',
                'value' => 2340,
              ),
              1057 => 
              array (
                'key' => 'REDWING BLUE LOW TEMP',
                'value' => 2341,
              ),
              1058 => 
              array (
                'key' => 'REDWING BLUE LOW TEMP FUEL OIL',
                'value' => 1829205,
              ),
              1059 => 
              array (
                'key' => 'REDWING FUEL OIL',
                'value' => 2342,
              ),
              1060 => 
              array (
                'key' => 'REDWING FUEL OIL HD',
                'value' => 2343,
              ),
              1061 => 
              array (
                'key' => 'REDWING HIGH DURO FUEL OIL',
                'value' => 1829342,
              ),
              1062 => 
              array (
                'key' => 'REDWING VERSABRAID',
                'value' => 2344,
              ),
              1063 => 
              array (
                'key' => 'REFRACTORY GUNITE',
                'value' => 2345,
              ),
              1064 => 
              array (
                'key' => 'REFRACTORY HOSE',
                'value' => 2346,
              ),
              1065 => 
              array (
                'key' => 'REFRIGERANT CHARGING',
                'value' => 2347,
              ),
              1066 => 
              array (
                'key' => 'REINFLEX',
                'value' => 1829154,
              ),
              1067 => 
              array (
                'key' => 'RELIANCE PROSPECTOR WATER S&D',
                'value' => 2348,
              ),
              1068 => 
              array (
                'key' => 'RELIANCE WATER S&D',
                'value' => 2349,
              ),
              1069 => 
              array (
                'key' => 'RES',
                'value' => 2350,
              ),
              1070 => 
              array (
                'key' => 'REVERSE CIRCULATION',
                'value' => 2351,
              ),
              1071 => 
              array (
                'key' => 'RIG SUPPLY',
                'value' => 2352,
              ),
              1072 => 
              array (
                'key' => 'RIG SUPPLY SW',
                'value' => 2353,
              ),
              1073 => 
              array (
                'key' => 'RITCHIE CT5',
                'value' => 1829098,
              ),
              1074 => 
              array (
                'key' => 'RIVERB',
                'value' => 2354,
              ),
              1075 => 
              array (
                'key' => 'RL1131 TWIN-LINE GRADE R',
                'value' => 2355,
              ),
              1076 => 
              array (
                'key' => 'ROADPATCH',
                'value' => 2356,
              ),
              1077 => 
              array (
                'key' => 'ROBIN FREON CHARGING',
                'value' => 2357,
              ),
              1078 => 
              array (
                'key' => 'ROBIN NEW',
                'value' => 1829138,
              ),
              1079 => 
              array (
                'key' => 'ROCK DRILL',
                'value' => 2358,
              ),
              1080 => 
              array (
                'key' => 'ROCK DRILL RED',
                'value' => 1829340,
              ),
              1081 => 
              array (
                'key' => 'ROCK DUST',
                'value' => 1829104,
              ),
              1082 => 
              array (
                'key' => 'ROOF DRAIN',
                'value' => 2359,
              ),
              1083 => 
              array (
                'key' => 'ROUGH BORE (HOT TAR & ASPHALT)',
                'value' => 2360,
              ),
              1084 => 
              array (
                'key' => 'ROUGH BORE DOCK',
                'value' => 2361,
              ),
              1085 => 
              array (
                'key' => 'ROUGH BORE DOCK 200',
                'value' => 1829323,
              ),
              1086 => 
              array (
                'key' => 'ROUGH BORE DOCK 300',
                'value' => 1829221,
              ),
              1087 => 
              array (
                'key' => 'ROYAL BRASS PLIOVIC',
                'value' => 2362,
              ),
              1088 => 
              array (
                'key' => 'ROYAL BRASS VERSIFLO S&D',
                'value' => 1829214,
              ),
              1089 => 
              array (
                'key' => 'RSD',
                'value' => 2363,
              ),
              1090 => 
              array (
                'key' => 'RUB & GASK WATER DISCHARGE',
                'value' => 1829358,
              ),
              1091 => 
              array (
                'key' => 'RX',
                'value' => 2364,
              ),
              1092 => 
              array (
                'key' => 'S4SH',
                'value' => 2365,
              ),
              1093 => 
              array (
                'key' => 'S4SP',
                'value' => 2366,
              ),
              1094 => 
              array (
                'key' => 'SAE 100R4',
                'value' => 2367,
              ),
              1095 => 
              array (
                'key' => 'SAE 20R1',
                'value' => 2368,
              ),
              1096 => 
              array (
                'key' => 'SAE 20R1 SB/SC',
                'value' => 1829428,
              ),
              1097 => 
              array (
                'key' => 'SAE 20R1 SB/SC HARDWALL',
                'value' => 1829429,
              ),
              1098 => 
              array (
                'key' => 'SAE 20R2 D1',
                'value' => 2369,
              ),
              1099 => 
              array (
                'key' => 'SAE 20R2D1',
                'value' => 2370,
              ),
              1100 => 
              array (
                'key' => 'SAE 45 Flare',
                'value' => 1829987,
              ),
              1101 => 
              array (
                'key' => 'SAE 45 Inverted Flare',
                'value' => 1829951,
              ),
              1102 => 
              array (
                'key' => 'SAE 45 J512 Flare',
                'value' => 1829950,
              ),
              1103 => 
              array (
                'key' => 'SAE J1527 A2 R1 ISO 7840 A2',
                'value' => 2371,
              ),
              1104 => 
              array (
                'key' => 'SAE J1527 TYPE A2 FUEL FILL',
                'value' => 2372,
              ),
              1105 => 
              array (
                'key' => 'SAE J514 Flareless Tube Fittings',
                'value' => 1829955,
              ),
              1106 => 
              array (
                'key' => 'SAE-20R2 D1',
                'value' => 2373,
              ),
              1107 => 
              array (
                'key' => 'SAFEFLEX',
                'value' => 1830043,
              ),
              1108 => 
              array (
                'key' => 'SAFLEX NSFX',
                'value' => 1829189,
              ),
              1109 => 
              array (
                'key' => 'SAND RECOVERY S&D',
                'value' => 2374,
              ),
              1110 => 
              array (
                'key' => 'SAND SUCTION',
                'value' => 2375,
              ),
              1111 => 
              array (
                'key' => 'SANDBLAST 400',
                'value' => 2376,
              ),
              1112 => 
              array (
                'key' => 'SANDBLAST DEADMAN',
                'value' => 1829239,
              ),
              1113 => 
              array (
                'key' => 'SANDER',
                'value' => 2377,
              ),
              1114 => 
              array (
                'key' => 'SANI-WASH',
                'value' => 2378,
              ),
              1115 => 
              array (
                'key' => 'SANI-WASH PLUS',
                'value' => 2379,
              ),
              1116 => 
              array (
                'key' => 'SANI-WASH SUPREME',
                'value' => 2380,
              ),
              1117 => 
              array (
                'key' => 'SBQ FLOATER',
                'value' => 1829147,
              ),
              1118 => 
              array (
                'key' => 'SBQ PETRO',
                'value' => 1829313,
              ),
              1119 => 
              array (
                'key' => 'SCOMI LIQUID MUD',
                'value' => 2381,
              ),
              1120 => 
              array (
                'key' => 'SCOTT',
                'value' => 1829100,
              ),
              1121 => 
              array (
                'key' => 'SCP3',
                'value' => 2382,
              ),
              1122 => 
              array (
                'key' => 'SCRMAC KURB KING',
                'value' => 2383,
              ),
              1123 => 
              array (
                'key' => 'SEALFS',
                'value' => 2384,
              ),
              1124 => 
              array (
                'key' => 'Sealing Washers',
                'value' => 1830000,
              ),
              1125 => 
              array (
                'key' => 'SEMLER FDA',
                'value' => 1829170,
              ),
              1126 => 
              array (
                'key' => 'SERVICE STATION AIR',
                'value' => 2385,
              ),
              1127 => 
              array (
                'key' => 'SFS',
                'value' => 1830044,
              ),
              1128 => 
              array (
                'key' => 'SFS (FIRE SUPPRESSION)',
                'value' => 2386,
              ),
              1129 => 
              array (
                'key' => 'SGOBAIN',
                'value' => 2387,
              ),
              1130 => 
              array (
                'key' => 'SGOBAIN FOOD DISCHARGE',
                'value' => 2388,
              ),
              1131 => 
              array (
                'key' => 'SGOBAIN FOOD S&D',
                'value' => 2389,
              ),
              1132 => 
              array (
                'key' => 'SGUN',
                'value' => 1830045,
              ),
              1133 => 
              array (
                'key' => 'SHELLFLEX',
                'value' => 2390,
              ),
              1134 => 
              array (
                'key' => 'SHIELD',
                'value' => 2391,
              ),
              1135 => 
              array (
                'key' => 'SHJ',
                'value' => 1830046,
              ),
              1136 => 
              array (
                'key' => 'SIGNAL CALL',
                'value' => 1829298,
              ),
              1137 => 
              array (
                'key' => 'SILENTSYNC',
                'value' => 1829497,
              ),
              1138 => 
              array (
                'key' => 'SINGLE LINE (GRADE R)',
                'value' => 2392,
              ),
              1139 => 
              array (
                'key' => 'SINGLE LINE (GRADE RM)',
                'value' => 2393,
              ),
              1140 => 
              array (
                'key' => 'SINGLE LINE (GRADE T)',
                'value' => 2394,
              ),
              1141 => 
              array (
                'key' => 'SINGLE LINE GRADE R',
                'value' => 1829246,
              ),
              1142 => 
              array (
                'key' => 'SINGLE LINE GRADE T',
                'value' => 1829309,
              ),
              1143 => 
              array (
                'key' => 'SINGLE-LINE GRADE R',
                'value' => 1829383,
              ),
              1144 => 
              array (
                'key' => 'SINGLE-LINE GRADE T',
                'value' => 1829270,
              ),
              1145 => 
              array (
                'key' => 'SK CARBOV',
                'value' => 2395,
              ),
              1146 => 
              array (
                'key' => 'SLURRY',
                'value' => 2396,
              ),
              1147 => 
              array (
                'key' => 'SMOOTH BORE DOCK',
                'value' => 2397,
              ),
              1148 => 
              array (
                'key' => 'SMOOTH BORE HOT TAR & ASPHALT',
                'value' => 2398,
              ),
              1149 => 
              array (
                'key' => 'SMOOTH BORE MOLTEN SULPHUR',
                'value' => 2399,
              ),
              1150 => 
              array (
                'key' => 'SNAPON',
                'value' => 2400,
              ),
              1151 => 
              array (
                'key' => 'SOFTUB WATER',
                'value' => 2401,
              ),
              1152 => 
              array (
                'key' => 'SOFTWALL',
                'value' => 2402,
              ),
              1153 => 
              array (
                'key' => 'SOHO PROSPECTOR WATER S&D',
                'value' => 2403,
              ),
              1154 => 
              array (
                'key' => 'SOURCE DISPENSING',
                'value' => 1829108,
              ),
              1155 => 
              array (
                'key' => 'SOUTH PNEUMATICS SW',
                'value' => 1829198,
              ),
              1156 => 
              array (
                'key' => 'SOUTHERN',
                'value' => 2404,
              ),
              1157 => 
              array (
                'key' => 'Spartan Pressure Washer',
                'value' => 1829156,
              ),
              1158 => 
              array (
                'key' => 'SPARTAN PRESSURE WASHER',
                'value' => 2405,
              ),
              1159 => 
              array (
                'key' => 'SPECIAL PD',
                'value' => 1829512,
              ),
              1160 => 
              array (
                'key' => 'SPEEDAIRE',
                'value' => 2406,
              ),
              1161 => 
              array (
                'key' => 'SPIR SEP',
                'value' => 2407,
              ),
              1162 => 
              array (
                'key' => 'SPIR SEP TPG',
                'value' => 2408,
              ),
              1163 => 
              array (
                'key' => 'SPIRAFLEX 1500',
                'value' => 2409,
              ),
              1164 => 
              array (
                'key' => 'SPIRAFLEX 1600',
                'value' => 2410,
              ),
              1165 => 
              array (
                'key' => 'SPIRAFLEX 2500',
                'value' => 1829307,
              ),
              1166 => 
              array (
                'key' => 'SPIRAFLEX ACTION F.E.S',
                'value' => 2411,
              ),
              1167 => 
              array (
                'key' => 'SPIRAFLEX AGFLEX',
                'value' => 2412,
              ),
              1168 => 
              array (
                'key' => 'SPIRAFLEX AGGIE',
                'value' => 2413,
              ),
              1169 => 
              array (
                'key' => 'SPIRAFLEX AGGIE PVC',
                'value' => 1829366,
              ),
              1170 => 
              array (
                'key' => 'SPIRAFLEX AIR SEEDER',
                'value' => 2414,
              ),
              1171 => 
              array (
                'key' => 'SPIRAFLEX BARKBLOWER',
                'value' => 2415,
              ),
              1172 => 
              array (
                'key' => 'SPIRAFLEX BLACK SUPER-DUTY',
                'value' => 1829363,
              ),
              1173 => 
              array (
                'key' => 'SPIRAFLEX BLACK SUPER-DUTY LAYFLAT',
                'value' => 2416,
              ),
              1174 => 
              array (
                'key' => 'SPIRAFLEX BLUE EXTRA LIGHT DUTY LAYFLAT',
                'value' => 2417,
              ),
              1175 => 
              array (
                'key' => 'SPIRAFLEX BLUE EXTRALIGHT DUTY',
                'value' => 1829357,
              ),
              1176 => 
              array (
                'key' => 'SPIRAFLEX CABLE GUARD',
                'value' => 2418,
              ),
              1177 => 
              array (
                'key' => 'SPIRAFLEX DUCTING',
                'value' => 2419,
              ),
              1178 => 
              array (
                'key' => 'SPIRAFLEX EXTRA LIGHT DUTY',
                'value' => 1829188,
              ),
              1179 => 
              array (
                'key' => 'SPIRAFLEX FGVAC',
                'value' => 2420,
              ),
              1180 => 
              array (
                'key' => 'SPIRAFLEX FISH SUCTION',
                'value' => 2421,
              ),
              1181 => 
              array (
                'key' => 'SPIRAFLEX FOODVAC',
                'value' => 2422,
              ),
              1182 => 
              array (
                'key' => 'SPIRAFLEX GRASSVAC',
                'value' => 2423,
              ),
              1183 => 
              array (
                'key' => 'SPIRAFLEX GRAY LIGHT DUTY LAYFLAT',
                'value' => 2424,
              ),
              1184 => 
              array (
                'key' => 'SPIRAFLEX GREEN',
                'value' => 1829335,
              ),
              1185 => 
              array (
                'key' => 'SPIRAFLEX GREEN LAYFLAT',
                'value' => 2425,
              ),
              1186 => 
              array (
                'key' => 'SPIRAFLEX HEAVY DUTY',
                'value' => 1829199,
              ),
              1187 => 
              array (
                'key' => 'SPIRAFLEX HT',
                'value' => 2426,
              ),
              1188 => 
              array (
                'key' => 'SPIRAFLEX LIGHT DUTY',
                'value' => 1829190,
              ),
              1189 => 
              array (
                'key' => 'SPIRAFLEX LW ROCK DUST',
                'value' => 2427,
              ),
              1190 => 
              array (
                'key' => 'SPIRAFLEX MEDIUM DUTY',
                'value' => 1829182,
              ),
              1191 => 
              array (
                'key' => 'SPIRAFLEX MULCH BLOWER',
                'value' => 2428,
              ),
              1192 => 
              array (
                'key' => 'SPIRAFLEX MULCHBLOWER',
                'value' => 2429,
              ),
              1193 => 
              array (
                'key' => 'SPIRAFLEX RED MEDIUM DUTY',
                'value' => 1829317,
              ),
              1194 => 
              array (
                'key' => 'SPIRAFLEX RED MEDIUM DUTY LAYFLAT',
                'value' => 2430,
              ),
              1195 => 
              array (
                'key' => 'SPIRAFLEX ROCK DUST',
                'value' => 2431,
              ),
              1196 => 
              array (
                'key' => 'SPIRAFLEX VACUUM',
                'value' => 2432,
              ),
              1197 => 
              array (
                'key' => 'SPIRAFLEX VAPOR RECOVERY',
                'value' => 2433,
              ),
              1198 => 
              array (
                'key' => 'SPIRAFLEX YELLOW HEAVY DUTY',
                'value' => 1829381,
              ),
              1199 => 
              array (
                'key' => 'SPIRAFLEX YELLOW HEAVY DUTY LAYFLAT',
                'value' => 2434,
              ),
              1200 => 
              array (
                'key' => 'SPIRAFLOW',
                'value' => 2435,
              ),
              1201 => 
              array (
                'key' => 'SPIRATHANE HD',
                'value' => 2436,
              ),
              1202 => 
              array (
                'key' => 'SPIRATHANE LD',
                'value' => 2437,
              ),
              1203 => 
              array (
                'key' => 'SPIRATHANE PT',
                'value' => 2438,
              ),
              1204 => 
              array (
                'key' => 'SR12',
                'value' => 2439,
              ),
              1205 => 
              array (
                'key' => 'SR13',
                'value' => 2440,
              ),
              1206 => 
              array (
                'key' => 'SR14',
                'value' => 2441,
              ),
              1207 => 
              array (
                'key' => 'SR14A',
                'value' => 2442,
              ),
              1208 => 
              array (
                'key' => 'SR14B',
                'value' => 2443,
              ),
              1209 => 
              array (
                'key' => 'SR15',
                'value' => 2444,
              ),
              1210 => 
              array (
                'key' => 'SR16SC',
                'value' => 2445,
              ),
              1211 => 
              array (
                'key' => 'SR18',
                'value' => 2446,
              ),
              1212 => 
              array (
                'key' => 'SR1SN',
                'value' => 2447,
              ),
              1213 => 
              array (
                'key' => 'SR2SN',
                'value' => 2448,
              ),
              1214 => 
              array (
                'key' => 'SR3',
                'value' => 2449,
              ),
              1215 => 
              array (
                'key' => 'SR5',
                'value' => 2450,
              ),
              1216 => 
              array (
                'key' => 'SR6',
                'value' => 2451,
              ),
              1217 => 
              array (
                'key' => 'SR7',
                'value' => 2452,
              ),
              1218 => 
              array (
                'key' => 'SR8',
                'value' => 2453,
              ),
              1219 => 
              array (
                'key' => 'SRS',
                'value' => 2454,
              ),
              1220 => 
              array (
                'key' => 'STANDARD STRAIGHT RAD',
                'value' => 2455,
              ),
              1221 => 
              array (
                'key' => 'Standpipe',
                'value' => 1829956,
              ),
              1222 => 
              array (
                'key' => 'STANLEY',
                'value' => 1829192,
              ),
              1223 => 
              array (
                'key' => 'STANLEY N298402',
                'value' => 1829197,
              ),
              1224 => 
              array (
                'key' => 'STEAM 250',
                'value' => 2456,
              ),
              1225 => 
              array (
                'key' => 'STEAM HOSE',
                'value' => 1829165,
              ),
              1226 => 
              array (
                'key' => 'STEAM PILE DRIVER',
                'value' => 1829345,
              ),
              1227 => 
              array (
                'key' => 'STEEL AIR',
                'value' => 2457,
              ),
              1228 => 
              array (
                'key' => 'STEEL AIR BOOTSTRAP',
                'value' => 2458,
              ),
              1229 => 
              array (
                'key' => 'STEEL AIR MSHA',
                'value' => 1829249,
              ),
              1230 => 
              array (
                'key' => 'SUBSEA CABLE',
                'value' => 2459,
              ),
              1231 => 
              array (
                'key' => 'SULBANA GAUNTLET',
                'value' => 2460,
              ),
              1232 => 
              array (
                'key' => 'SUMMERS',
                'value' => 1829368,
              ),
              1233 => 
              array (
                'key' => 'SUNSDEA MUD',
                'value' => 2461,
              ),
              1234 => 
              array (
                'key' => 'SUNSET WATER S&D FIRE SERVICE',
                'value' => 2462,
              ),
              1235 => 
              array (
                'key' => 'SUPER AIR 400',
                'value' => 2463,
              ),
              1236 => 
              array (
                'key' => 'SUPER BLACK FLEXWING',
                'value' => 2464,
              ),
              1237 => 
              array (
                'key' => 'SUPER ORTAC',
                'value' => 1829130,
              ),
              1238 => 
              array (
                'key' => 'SUPER ORTAC®',
                'value' => 2465,
              ),
              1239 => 
              array (
                'key' => 'SUPER ROCK DRILL',
                'value' => 2466,
              ),
              1240 => 
              array (
                'key' => 'SUPER ROCK DRILL HT',
                'value' => 2467,
              ),
              1241 => 
              array (
                'key' => 'SUPER SANI-WASH',
                'value' => 2468,
              ),
              1242 => 
              array (
                'key' => 'SUPER SANI-WASH 300',
                'value' => 1829152,
              ),
              1243 => 
              array (
                'key' => 'SUPER TORQUE',
                'value' => 1829525,
              ),
              1244 => 
              array (
                'key' => 'SUPERIOR',
                'value' => 2469,
              ),
              1245 => 
              array (
                'key' => 'SUPERIOR PETRO TANK TRUCK',
                'value' => 1829380,
              ),
              1246 => 
              array (
                'key' => 'SUPFLOW',
                'value' => 2470,
              ),
              1247 => 
              array (
                'key' => 'SUPVAC',
                'value' => 2471,
              ),
              1248 => 
              array (
                'key' => 'SURELINE',
                'value' => 2472,
              ),
              1249 => 
              array (
                'key' => 'SURELINE BLACK',
                'value' => 1829306,
              ),
              1250 => 
              array (
                'key' => 'SW DRY CEMENT & BARYTES',
                'value' => 2473,
              ),
              1251 => 
              array (
                'key' => 'SWAGELOK',
                'value' => 2474,
              ),
              1252 => 
              array (
                'key' => 'SYNCHROCHAIN CARBON',
                'value' => 1829531,
              ),
              1253 => 
              array (
                'key' => 'TAMARACK',
                'value' => 1829143,
              ),
              1254 => 
              array (
                'key' => 'TAN FLEXTRA',
                'value' => 2475,
              ),
              1255 => 
              array (
                'key' => 'TAN FLEXTRA FDA',
                'value' => 2476,
              ),
              1256 => 
              array (
                'key' => 'TAN FLEXWING',
                'value' => 2477,
              ),
              1257 => 
              array (
                'key' => 'TAN FLEXWING FDA',
                'value' => 2478,
              ),
              1258 => 
              array (
                'key' => 'TANK CLEANING',
                'value' => 2479,
              ),
              1259 => 
              array (
                'key' => 'TANKER BARGE DISCHARGE',
                'value' => 2480,
              ),
              1260 => 
              array (
                'key' => 'TEFLON',
                'value' => 2481,
              ),
              1261 => 
              array (
                'key' => 'TEFPASS',
                'value' => 1829162,
              ),
              1262 => 
              array (
                'key' => 'TEKNOR',
                'value' => 1829106,
              ),
              1263 => 
              array (
                'key' => 'TEKNOR 8650GT',
                'value' => 1829201,
              ),
              1264 => 
              array (
                'key' => 'TEKNOR 8696-27',
                'value' => 1829217,
              ),
              1265 => 
              array (
                'key' => 'TEKNOR 969RR',
                'value' => 1829226,
              ),
              1266 => 
              array (
                'key' => 'TETRA',
                'value' => 2482,
              ),
              1267 => 
              array (
                'key' => 'THERMIDOR',
                'value' => 2483,
              ),
              1268 => 
              array (
                'key' => 'THESE ARE TIED TO NORFOLK SPECS...',
                'value' => 1829257,
              ),
              1269 => 
              array (
                'key' => 'THOMPSON FLEX XLPE',
                'value' => 2484,
              ),
              1270 => 
              array (
                'key' => 'THUNDER INSTA-GRIP',
                'value' => 2485,
              ),
              1271 => 
              array (
                'key' => 'TIG WELDING',
                'value' => 2486,
              ),
              1272 => 
              array (
                'key' => 'TIMCO',
                'value' => 2487,
              ),
              1273 => 
              array (
                'key' => 'TIPCO PREMIUM GARDEN',
                'value' => 2488,
              ),
              1274 => 
              array (
                'key' => 'TIPO',
                'value' => 1829427,
              ),
              1275 => 
              array (
                'key' => 'TORQUE TEAM LAMINATED',
                'value' => 1829516,
              ),
              1276 => 
              array (
                'key' => 'TORQUE TEAM PLUS',
                'value' => 1829500,
              ),
              1277 => 
              array (
                'key' => 'TORQUE-FLEX',
                'value' => 1829498,
              ),
              1278 => 
              array (
                'key' => 'TORRIDAIR',
                'value' => 2489,
              ),
              1279 => 
              array (
                'key' => 'TOW CABLE',
                'value' => 2490,
              ),
              1280 => 
              array (
                'key' => 'TR7',
                'value' => 2491,
              ),
              1281 => 
              array (
                'key' => 'TR8',
                'value' => 2492,
              ),
              1282 => 
              array (
                'key' => 'TRANSPLY',
                'value' => 2493,
              ),
              1283 => 
              array (
                'key' => 'TRI-STATE',
                'value' => 1829330,
              ),
              1284 => 
              array (
                'key' => 'TRIDENT',
                'value' => 2494,
              ),
              1285 => 
              array (
                'key' => 'TRIDENT SER',
                'value' => 2495,
              ),
              1286 => 
              array (
                'key' => 'TRINCO BLAST',
                'value' => 2496,
              ),
              1287 => 
              array (
                'key' => 'TRIPLX',
                'value' => 2497,
              ),
              1288 => 
              array (
                'key' => 'TRIX ACETYLENE',
                'value' => 2498,
              ),
              1289 => 
              array (
                'key' => 'TRIX BLAUSTRAHL',
                'value' => 2499,
              ),
              1290 => 
              array (
                'key' => 'TRIX BRAKE',
                'value' => 2500,
              ),
              1291 => 
              array (
                'key' => 'TRIX FUEL',
                'value' => 2501,
              ),
              1292 => 
              array (
                'key' => 'TRIX MULTIFOOD',
                'value' => 2502,
              ),
              1293 => 
              array (
                'key' => 'TRIX NITRO',
                'value' => 2503,
              ),
              1294 => 
              array (
                'key' => 'TRIX OXYGEN',
                'value' => 2504,
              ),
              1295 => 
              array (
                'key' => 'TRIX PAINT SPRAY',
                'value' => 2505,
              ),
              1296 => 
              array (
                'key' => 'TRIX RESPIRATION',
                'value' => 2506,
              ),
              1297 => 
              array (
                'key' => 'TRIX ROSTRAHL',
                'value' => 2507,
              ),
              1298 => 
              array (
                'key' => 'TRIX SUPER',
                'value' => 2508,
              ),
              1299 => 
              array (
                'key' => 'TUNNELCOTE ROCK DUST FLEXTRA',
                'value' => 2509,
              ),
              1300 => 
              array (
                'key' => 'TUNNELCOTE ROCK DUST FLEXWING',
                'value' => 2510,
              ),
              1301 => 
              array (
                'key' => 'TWIN-LINE (GRADE R)',
                'value' => 2511,
              ),
              1302 => 
              array (
                'key' => 'TWIN-LINE (GRADE RM)',
                'value' => 2512,
              ),
              1303 => 
              array (
                'key' => 'TWIN-LINE (GRADE T)',
                'value' => 2513,
              ),
              1304 => 
              array (
                'key' => 'TWIN-LINE ISO 3821',
                'value' => 2514,
              ),
              1305 => 
              array (
                'key' => 'UL 92 FIRE EXTINGUISHER',
                'value' => 2515,
              ),
              1306 => 
              array (
                'key' => 'ULTRABRAID',
                'value' => 2516,
              ),
              1307 => 
              array (
                'key' => 'ULTRAFLEX',
                'value' => 2517,
              ),
              1308 => 
              array (
                'key' => 'ULTRAMAR',
                'value' => 2518,
              ),
              1309 => 
              array (
                'key' => 'UNDERHILL',
                'value' => 2519,
              ),
              1310 => 
              array (
                'key' => 'Uni-Crimp UCF10 Ferrule',
                'value' => 1830018,
              ),
              1311 => 
              array (
                'key' => 'Uni-Crimp UCF11 Ferrule',
                'value' => 1830019,
              ),
              1312 => 
              array (
                'key' => 'UNI-Crimp UCF2 Ferrule',
                'value' => 1830013,
              ),
              1313 => 
              array (
                'key' => 'Uni-Crimp UCF3 Ferrule',
                'value' => 1830014,
              ),
              1314 => 
              array (
                'key' => 'Uni-Crimp UCF6 Ferrule',
                'value' => 1830015,
              ),
              1315 => 
              array (
                'key' => 'Uni-Crimp UCF8 Ferrule',
                'value' => 1830016,
              ),
              1316 => 
              array (
                'key' => 'Uni-Crimp UCF9 Ferrule',
                'value' => 1830017,
              ),
              1317 => 
              array (
                'key' => 'UNISOURCE',
                'value' => 2520,
              ),
              1318 => 
              array (
                'key' => 'UNITED RUBBER CONTRACTOR\'S WATER',
                'value' => 1829291,
              ),
              1319 => 
              array (
                'key' => 'UNITRIX 60',
                'value' => 2521,
              ),
              1320 => 
              array (
                'key' => 'UNITRIX 80',
                'value' => 2522,
              ),
              1321 => 
              array (
                'key' => 'UNIWELD',
                'value' => 1829184,
              ),
              1322 => 
              array (
                'key' => 'UNPRINTED SPRAY SALVAGE',
                'value' => 2523,
              ),
              1323 => 
              array (
                'key' => 'V-50 S&D',
                'value' => 2524,
              ),
              1324 => 
              array (
                'key' => 'VACUUM',
                'value' => 2525,
              ),
              1325 => 
              array (
                'key' => 'Valve Adapter',
                'value' => 1830001,
              ),
              1326 => 
              array (
                'key' => 'Valve Caps',
                'value' => 1830002,
              ),
              1327 => 
              array (
                'key' => 'Valve Core',
                'value' => 1830003,
              ),
              1328 => 
              array (
                'key' => 'VAPOR RECOVERY',
                'value' => 2526,
              ),
              1329 => 
              array (
                'key' => 'VAPOR RECOVERY DOCK',
                'value' => 2527,
              ),
              1330 => 
              array (
                'key' => 'VARIABLE SPEED',
                'value' => 1829513,
              ),
              1331 => 
              array (
                'key' => 'VARIFLEX',
                'value' => 2528,
              ),
              1332 => 
              array (
                'key' => 'VELOCITY BANDING COIL',
                'value' => 2529,
              ),
              1333 => 
              array (
                'key' => 'VELOCITY BEVERAGE TRANSFER',
                'value' => 2530,
              ),
              1334 => 
              array (
                'key' => 'VELOCITY PETROLEUM TRANSFER',
                'value' => 2531,
              ),
              1335 => 
              array (
                'key' => 'VELOCITY WATER TRANSFER',
                'value' => 2532,
              ),
              1336 => 
              array (
                'key' => 'VERSACHEM',
                'value' => 2533,
              ),
              1337 => 
              array (
                'key' => 'VERSACRETE',
                'value' => 2534,
              ),
              1338 => 
              array (
                'key' => 'VERSAFUEL EN1765 S15',
                'value' => 2535,
              ),
              1339 => 
              array (
                'key' => 'VERSAFUEL FLEX',
                'value' => 2536,
              ),
              1340 => 
              array (
                'key' => 'VERSIFLO DISCHARGE',
                'value' => 2537,
              ),
              1341 => 
              array (
                'key' => 'VERSIFLO S&D',
                'value' => 2538,
              ),
              1342 => 
              array (
                'key' => 'VICTOR',
                'value' => 2539,
              ),
              1343 => 
              array (
                'key' => 'VICTOR GRADE RM',
                'value' => 1829341,
              ),
              1344 => 
              array (
                'key' => 'VICTOR GRADE T',
                'value' => 1829114,
              ),
              1345 => 
              array (
                'key' => 'VINTNER',
                'value' => 2540,
              ),
              1346 => 
              array (
                'key' => 'VINTNER MICROBAN',
                'value' => 2541,
              ),
              1347 => 
              array (
                'key' => 'VINTNER RESERVE',
                'value' => 2542,
              ),
              1348 => 
              array (
                'key' => 'VIPER',
                'value' => 2543,
              ),
              1349 => 
              array (
                'key' => 'WAB SLURRY',
                'value' => 2544,
              ),
              1350 => 
              array (
                'key' => 'WASHDOWN',
                'value' => 2545,
              ),
              1351 => 
              array (
                'key' => 'WASTE MATE',
                'value' => 2546,
              ),
              1352 => 
              array (
                'key' => 'WATER',
                'value' => 1829360,
              ),
              1353 => 
              array (
                'key' => 'WATER & AIR HD',
                'value' => 2547,
              ),
              1354 => 
              array (
                'key' => 'WATER 150 HD',
                'value' => 1829322,
              ),
              1355 => 
              array (
                'key' => 'WATER DISCHARGE',
                'value' => 2548,
              ),
              1356 => 
              array (
                'key' => 'WATER DISCHARGE 100',
                'value' => 1829320,
              ),
              1357 => 
              array (
                'key' => 'WATER DISCHARGE 150',
                'value' => 1829233,
              ),
              1358 => 
              array (
                'key' => 'WATER DISCHARGE 250',
                'value' => 1829376,
              ),
              1359 => 
              array (
                'key' => 'WATER DISCHARGE HD',
                'value' => 2549,
              ),
              1360 => 
              array (
                'key' => 'WATER DISCHARGE HD 600',
                'value' => 1829264,
              ),
              1361 => 
              array (
                'key' => 'WATER HD',
                'value' => 2550,
              ),
              1362 => 
              array (
                'key' => 'WATER JETTING',
                'value' => 1829279,
              ),
              1363 => 
              array (
                'key' => 'WATER JETTING 1000',
                'value' => 2551,
              ),
              1364 => 
              array (
                'key' => 'WATER JETTING 500',
                'value' => 2552,
              ),
              1365 => 
              array (
                'key' => 'WATER REHAB',
                'value' => 2553,
              ),
              1366 => 
              array (
                'key' => 'WATER S&D',
                'value' => 1829252,
              ),
              1367 => 
              array (
                'key' => 'WATER SUCTION & DISCHARGE',
                'value' => 2554,
              ),
              1368 => 
              array (
                'key' => 'WEDGE TLP',
                'value' => 1829527,
              ),
              1369 => 
              array (
                'key' => 'WEST MICH',
                'value' => 1829111,
              ),
              1370 => 
              array (
                'key' => 'WESTERN',
                'value' => 2555,
              ),
              1371 => 
              array (
                'key' => 'WHALE OIL',
                'value' => 2556,
              ),
              1372 => 
              array (
                'key' => 'WHALE WATER',
                'value' => 2557,
              ),
              1373 => 
              array (
                'key' => 'WHIPEND BLAST',
                'value' => 2558,
              ),
              1374 => 
              array (
                'key' => 'WHITE FLEXTRA',
                'value' => 2559,
              ),
              1375 => 
              array (
                'key' => 'WHITE FLEXWING',
                'value' => 2560,
              ),
              1376 => 
              array (
                'key' => 'WHITEWATER',
                'value' => 2561,
              ),
              1377 => 
              array (
                'key' => 'WHW GAUNTLET',
                'value' => 1829423,
              ),
              1378 => 
              array (
                'key' => 'WILD HOG',
                'value' => 1829225,
              ),
              1379 => 
              array (
                'key' => 'WINGCRAFT',
                'value' => 2562,
              ),
              1380 => 
              array (
                'key' => 'WIRE INSERTED RADIATOR HOSE',
                'value' => 2563,
              ),
              1381 => 
              array (
                'key' => 'WOODMI SAWDUST',
                'value' => 2564,
              ),
              1382 => 
              array (
                'key' => 'X-LIFE XCP3',
                'value' => 2566,
              ),
              1383 => 
              array (
                'key' => 'X-LIFE XCP3S',
                'value' => 2567,
              ),
              1384 => 
              array (
                'key' => 'X-LIFE XCP4',
                'value' => 2568,
              ),
              1385 => 
              array (
                'key' => 'X-LIFE XCP4S',
                'value' => 2569,
              ),
              1386 => 
              array (
                'key' => 'X-LIFE XCP5S',
                'value' => 2570,
              ),
              1387 => 
              array (
                'key' => 'X-LIFE XCP6S',
                'value' => 2571,
              ),
              1388 => 
              array (
                'key' => 'X-LIFE XR16SC',
                'value' => 2572,
              ),
              1389 => 
              array (
                'key' => 'XF BLAST',
                'value' => 2565,
              ),
              1390 => 
              array (
                'key' => 'XLPE CHEMICAL TRANSFER',
                'value' => 2573,
              ),
              1391 => 
              array (
                'key' => 'XPOWER',
                'value' => 2574,
              ),
              1392 => 
              array (
                'key' => 'XPOWER OILFIELD FRAC HW',
                'value' => 1829105,
              ),
              1393 => 
              array (
                'key' => 'YARDMASTER GARDEN HOSE',
                'value' => 2575,
              ),
              1394 => 
              array (
                'key' => 'YELLOW FLEXWING',
                'value' => 2576,
              ),
              1395 => 
              array (
                'key' => 'YUKON',
                'value' => 2577,
              ),
              1396 => 
              array (
                'key' => 'YUKON BLUE',
                'value' => 1829293,
              ),
              1397 => 
              array (
                'key' => 'YUKON SPIRAFLEX',
                'value' => 2578,
              ),
              1398 => 
              array (
                'key' => 'ZZH561K-AA2',
                'value' => 2579,
              ),
              1399 => 
              array (
                'key' => 'ZZH561K-BA2',
                'value' => 2580,
              ),
              1400 => 
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
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'defaultValueGenerator' => '',
          )),
          3 => 
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
