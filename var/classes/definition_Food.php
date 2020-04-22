<?php 

/** 
* Generated at: 2020-04-16T10:25:38+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)


Fields Summary: 
- Brand [select]
- Name [input]
- FoodType [select]
- FoodNote [textarea]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '16',
   'name' => 'Food',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1587025538,
   'userOwner' => 2,
   'userModification' => 2,
   'parentClass' => '',
   'implementsInterfaces' => NULL,
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
         'labelWidth' => 100,
         'layout' => NULL,
         'border' => false,
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => 'Food',
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
                'key' => 'ADVANTAGE',
                'value' => 'ADVANTAGE',
              ),
              1 => 
              array (
                'key' => 'AGGIE GAS (No Static Wire)',
                'value' => 'AGGIE GAS (No Static Wire)',
              ),
              2 => 
              array (
                'key' => 'AGGIE GAS (With Static Wire)',
                'value' => 'AGGIE GAS (With Static Wire)',
              ),
              3 => 
              array (
                'key' => 'AIR 300',
                'value' => 'AIR 300',
              ),
              4 => 
              array (
                'key' => 'AIR 400',
                'value' => 'AIR 400',
              ),
              5 => 
              array (
                'key' => 'AIR BRAKE (SAE J1402-A)',
                'value' => 'AIR BRAKE (SAE J1402-A)',
              ),
              6 => 
              array (
                'key' => 'ALLCRETE TEXTILE',
                'value' => 'ALLCRETE TEXTILE',
              ),
              7 => 
              array (
                'key' => 'ALLCRETE WIRE',
                'value' => 'ALLCRETE WIRE',
              ),
              8 => 
              array (
                'key' => 'AMMONIUM NITRATE HD',
                'value' => 'AMMONIUM NITRATE HD',
              ),
              9 => 
              array (
                'key' => 'AQUAHAMMER',
                'value' => 'AQUAHAMMER',
              ),
              10 => 
              array (
                'key' => 'AQUAPAL',
                'value' => 'AQUAPAL',
              ),
              11 => 
              array (
                'key' => 'ARCTIC EXTREMEFLEX',
                'value' => 'ARCTIC EXTREMEFLEX',
              ),
              12 => 
              array (
                'key' => 'ARCTIC FLEXTRA',
                'value' => 'ARCTIC FLEXTRA',
              ),
              13 => 
              array (
                'key' => 'ARCTIC FLEXWING',
                'value' => 'ARCTIC FLEXWING',
              ),
              14 => 
              array (
                'key' => 'ARCTIC FUEL DISCHARGE',
                'value' => 'ARCTIC FUEL DISCHARGE',
              ),
              15 => 
              array (
                'key' => 'ARCTIC FUEL OIL DELIVERY',
                'value' => 'ARCTIC FUEL OIL DELIVERY',
              ),
              16 => 
              array (
                'key' => 'ARCTIC ORTAC',
                'value' => 'ARCTIC ORTAC',
              ),
              17 => 
              array (
                'key' => 'ARCTIC ORTAC PLUS',
                'value' => 'ARCTIC ORTAC PLUS',
              ),
              18 => 
              array (
                'key' => 'ARTRAC',
                'value' => 'ARTRAC',
              ),
              19 => 
              array (
                'key' => 'ARVAC SW',
                'value' => 'ARVAC SW',
              ),
              20 => 
              array (
                'key' => 'BARYTES HW',
                'value' => 'BARYTES HW',
              ),
              21 => 
              array (
                'key' => 'BC COLD FLEX',
                'value' => 'BC COLD FLEX',
              ),
              22 => 
              array (
                'key' => 'BC GASOLINE (1 BRAID)',
                'value' => 'BC GASOLINE (1 BRAID)',
              ),
              23 => 
              array (
                'key' => 'BC GASOLINE (2 BRAID)',
                'value' => 'BC GASOLINE (2 BRAID)',
              ),
              24 => 
              array (
                'key' => 'BC MARINA',
                'value' => 'BC MARINA',
              ),
              25 => 
              array (
                'key' => 'BLACK SOFTWALL (1/4")',
                'value' => 'BLACK SOFTWALL (1/4")',
              ),
              26 => 
              array (
                'key' => 'BLACK SOFTWALL (1/8")',
                'value' => 'BLACK SOFTWALL (1/8")',
              ),
              27 => 
              array (
                'key' => 'BLACK SOFTWALL (3/16")',
                'value' => 'BLACK SOFTWALL (3/16")',
              ),
              28 => 
              array (
                'key' => 'BLACK SOFTWALL (5/16")',
                'value' => 'BLACK SOFTWALL (5/16")',
              ),
              29 => 
              array (
                'key' => 'BLACK SOFTWALL SURVIVOR',
                'value' => 'BLACK SOFTWALL SURVIVOR',
              ),
              30 => 
              array (
                'key' => 'BLASTHOLE SLURRY & DE-WATERING',
                'value' => 'BLASTHOLE SLURRY & DE-WATERING',
              ),
              31 => 
              array (
                'key' => 'BLAUDIECK LGD',
                'value' => 'BLAUDIECK LGD',
              ),
              32 => 
              array (
                'key' => 'BLUCOR (Black Chemituf)',
                'value' => 'BLUCOR (Black Chemituf)',
              ),
              33 => 
              array (
                'key' => 'BLUCOR (Black Pureten)',
                'value' => 'BLUCOR (Black Pureten)',
              ),
              34 => 
              array (
                'key' => 'BLUCOR (Survivor)',
                'value' => 'BLUCOR (Survivor)',
              ),
              35 => 
              array (
                'key' => 'BLUCOR (Tan Pureten)',
                'value' => 'BLUCOR (Tan Pureten)',
              ),
              36 => 
              array (
                'key' => 'BLUE FLEXWING',
                'value' => 'BLUE FLEXWING',
              ),
              37 => 
              array (
                'key' => 'BLUE FLOUR',
                'value' => 'BLUE FLOUR',
              ),
              38 => 
              array (
                'key' => 'BLUE FOOD FLEXWING',
                'value' => 'BLUE FOOD FLEXWING',
              ),
              39 => 
              array (
                'key' => 'BLUE LOW TEMP FUEL OIL DELIVERY',
                'value' => 'BLUE LOW TEMP FUEL OIL DELIVERY',
              ),
              40 => 
              array (
                'key' => 'BLUE NITROGEN',
                'value' => 'BLUE NITROGEN',
              ),
              41 => 
              array (
                'key' => 'BOTTOM LOADING',
                'value' => 'BOTTOM LOADING',
              ),
              42 => 
              array (
                'key' => 'BRAIDAIR',
                'value' => 'BRAIDAIR',
              ),
              43 => 
              array (
                'key' => 'BREWLINE',
                'value' => 'BREWLINE',
              ),
              44 => 
              array (
                'key' => 'BREWLINE WITH MICROBAN',
                'value' => 'BREWLINE WITH MICROBAN',
              ),
              45 => 
              array (
                'key' => 'BRICK RED AIR',
                'value' => 'BRICK RED AIR',
              ),
              46 => 
              array (
                'key' => 'BRIGADE MINE',
                'value' => 'BRIGADE MINE',
              ),
              47 => 
              array (
                'key' => 'BROWN CHEM-ACID DISCHARGE',
                'value' => 'BROWN CHEM-ACID DISCHARGE',
              ),
              48 => 
              array (
                'key' => 'BROWN FLEXWING',
                'value' => 'BROWN FLEXWING',
              ),
              49 => 
              array (
                'key' => 'CELLAR\'S CHOICE',
                'value' => 'CELLAR\'S CHOICE',
              ),
              50 => 
              array (
                'key' => 'CHEMONE',
                'value' => 'CHEMONE',
              ),
              51 => 
              array (
                'key' => 'CLAM JETTING',
                'value' => 'CLAM JETTING',
              ),
              52 => 
              array (
                'key' => 'CLEARWATER POTABLE WATER',
                'value' => 'CLEARWATER POTABLE WATER',
              ),
              53 => 
              array (
                'key' => 'COLD BLUE',
                'value' => 'COLD BLUE',
              ),
              54 => 
              array (
                'key' => 'COLLECTOR',
                'value' => 'COLLECTOR',
              ),
              55 => 
              array (
                'key' => 'CON-AG 150 WATER S&D',
                'value' => 'CON-AG 150 WATER S&D',
              ),
              56 => 
              array (
                'key' => 'CON-AG WATER S&D',
                'value' => 'CON-AG WATER S&D',
              ),
              57 => 
              array (
                'key' => 'CONTI CHEM SUPERIOR FEP',
                'value' => 'CONTI CHEM SUPERIOR FEP',
              ),
              58 => 
              array (
                'key' => 'CRIMPED STEAM ASSEMBLY',
                'value' => 'CRIMPED STEAM ASSEMBLY',
              ),
              59 => 
              array (
                'key' => 'DAMPF TRIX 6000',
                'value' => 'DAMPF TRIX 6000',
              ),
              60 => 
              array (
                'key' => 'DEADMAN AIRCRAFT REFUELING',
                'value' => 'DEADMAN AIRCRAFT REFUELING',
              ),
              61 => 
              array (
                'key' => 'DEADMAN SANDBLAST',
                'value' => 'DEADMAN SANDBLAST',
              ),
              62 => 
              array (
                'key' => 'DEEP BLUE POTABLE WATER',
                'value' => 'DEEP BLUE POTABLE WATER',
              ),
              63 => 
              array (
                'key' => 'DEF DISPENSING HOSE',
                'value' => 'DEF DISPENSING HOSE',
              ),
              64 => 
              array (
                'key' => 'DEF TRANSFER HOSE - BRAIDED',
                'value' => 'DEF TRANSFER HOSE - BRAIDED',
              ),
              65 => 
              array (
                'key' => 'DEF TRANSFER HOSE - HAND-BUILT',
                'value' => 'DEF TRANSFER HOSE - HAND-BUILT',
              ),
              66 => 
              array (
                'key' => 'DINGA WATER-SAVING GUN',
                'value' => 'DINGA WATER-SAVING GUN',
              ),
              67 => 
              array (
                'key' => 'DISHWASHER DRAIN HOSE',
                'value' => 'DISHWASHER DRAIN HOSE',
              ),
              68 => 
              array (
                'key' => 'DISTILLERY 150',
                'value' => 'DISTILLERY 150',
              ),
              69 => 
              array (
                'key' => 'DIVERSIFLEX',
                'value' => 'DIVERSIFLEX',
              ),
              70 => 
              array (
                'key' => 'DIVERSIPIPE 150',
                'value' => 'DIVERSIPIPE 150',
              ),
              71 => 
              array (
                'key' => 'DIVERSIPIPE 75',
                'value' => 'DIVERSIPIPE 75',
              ),
              72 => 
              array (
                'key' => 'DOCK',
                'value' => 'DOCK',
              ),
              73 => 
              array (
                'key' => 'DREDGE SLEEVE',
                'value' => 'DREDGE SLEEVE',
              ),
              74 => 
              array (
                'key' => 'DRINKLINE',
                'value' => 'DRINKLINE',
              ),
              75 => 
              array (
                'key' => 'DRY CEMENT & BARITES HW',
                'value' => 'DRY CEMENT & BARITES HW',
              ),
              76 => 
              array (
                'key' => 'ELITE HOT WATER',
                'value' => 'ELITE HOT WATER',
              ),
              77 => 
              array (
                'key' => 'EN12115 PETROLEUM HOSE',
                'value' => 'EN12115 PETROLEUM HOSE',
              ),
              78 => 
              array (
                'key' => 'EN1765 S15 225 PSI S&D NITRILE DOCK',
                'value' => 'EN1765 S15 225 PSI S&D NITRILE DOCK',
              ),
              79 => 
              array (
                'key' => 'EXSTATIC',
                'value' => 'EXSTATIC',
              ),
              80 => 
              array (
                'key' => 'EXTREMEBLAST LOAD 300',
                'value' => 'EXTREMEBLAST LOAD 300',
              ),
              81 => 
              array (
                'key' => 'EXTREMEFLEX BEVERAGE GRAY',
                'value' => 'EXTREMEFLEX BEVERAGE GRAY',
              ),
              82 => 
              array (
                'key' => 'EXTREMEFLEX BEVERAGE RED WITH EZ CLEAN COVER',
                'value' => 'EXTREMEFLEX BEVERAGE RED WITH EZ CLEAN COVER',
              ),
              83 => 
              array (
                'key' => 'EXTREMEFLEX BEVERAGE WITH MICROBAN',
                'value' => 'EXTREMEFLEX BEVERAGE WITH MICROBAN',
              ),
              84 => 
              array (
                'key' => 'EXTREMEFLEX BROWN',
                'value' => 'EXTREMEFLEX BROWN',
              ),
              85 => 
              array (
                'key' => 'EXTREMEFLEX FOOD GRADE',
                'value' => 'EXTREMEFLEX FOOD GRADE',
              ),
              86 => 
              array (
                'key' => 'EXTREMEFLEX PETROLEUM',
                'value' => 'EXTREMEFLEX PETROLEUM',
              ),
              87 => 
              array (
                'key' => 'EXTREMEFLEX POTABLE WATER',
                'value' => 'EXTREMEFLEX POTABLE WATER',
              ),
              88 => 
              array (
                'key' => 'EXTREMEFLEX PURPLE',
                'value' => 'EXTREMEFLEX PURPLE',
              ),
              89 => 
              array (
                'key' => 'EZ GLIDE WINE',
                'value' => 'EZ GLIDE WINE',
              ),
              90 => 
              array (
                'key' => 'F5 AIR',
                'value' => 'F5 AIR',
              ),
              91 => 
              array (
                'key' => 'FABCHEM',
                'value' => 'FABCHEM',
              ),
              92 => 
              array (
                'key' => 'FABCHEM-C',
                'value' => 'FABCHEM-C',
              ),
              93 => 
              array (
                'key' => 'FIRE ENGINE BOOSTER',
                'value' => 'FIRE ENGINE BOOSTER',
              ),
              94 => 
              array (
                'key' => 'FLEXAGRIP',
                'value' => 'FLEXAGRIP',
              ),
              95 => 
              array (
                'key' => 'FLEXDOCK 225',
                'value' => 'FLEXDOCK 225',
              ),
              96 => 
              array (
                'key' => 'FLEXDOCK 300',
                'value' => 'FLEXDOCK 300',
              ),
              97 => 
              array (
                'key' => 'FLEXIBLE DOWNSPOUT',
                'value' => 'FLEXIBLE DOWNSPOUT',
              ),
              98 => 
              array (
                'key' => 'FLEXSHIELD SAE J1527 TYPE A1-15',
                'value' => 'FLEXSHIELD SAE J1527 TYPE A1-15',
              ),
              99 => 
              array (
                'key' => 'FLEXSHIELD SAE J1527 USCG TYPE A1-15 / ISO 7840 MARINE BARRIER HOSE',
                'value' => 'FLEXSHIELD SAE J1527 USCG TYPE A1-15 / ISO 7840 MARINE BARRIER HOSE',
              ),
              100 => 
              array (
                'key' => 'FLEXSTEEL 250 CB EXTREME STEAM',
                'value' => 'FLEXSTEEL 250 CB EXTREME STEAM',
              ),
              101 => 
              array (
                'key' => 'FLEXSTEEL 250 CB STEAM',
                'value' => 'FLEXSTEEL 250 CB STEAM',
              ),
              102 => 
              array (
                'key' => 'FLEXSTEEL 250 EPDM-20',
                'value' => 'FLEXSTEEL 250 EPDM-20',
              ),
              103 => 
              array (
                'key' => 'FLEXSTEEL 250 ORS STEAM',
                'value' => 'FLEXSTEEL 250 ORS STEAM',
              ),
              104 => 
              array (
                'key' => 'FLEXSTEEL 250 STEAM',
                'value' => 'FLEXSTEEL 250 STEAM',
              ),
              105 => 
              array (
                'key' => 'FLEXSTEEL 250 STEAM X',
                'value' => 'FLEXSTEEL 250 STEAM X',
              ),
              106 => 
              array (
                'key' => 'FLEXSTEEL FUTURA',
                'value' => 'FLEXSTEEL FUTURA',
              ),
              107 => 
              array (
                'key' => 'FLEXSTEEL FUTURA B20 DISPENSING HOSE ASSEMBLY',
                'value' => 'FLEXSTEEL FUTURA B20 DISPENSING HOSE ASSEMBLY',
              ),
              108 => 
              array (
                'key' => 'FLEXSTEEL FUTURA E25 DISPENSING HOSE ASSEMBLY',
                'value' => 'FLEXSTEEL FUTURA E25 DISPENSING HOSE ASSEMBLY',
              ),
              109 => 
              array (
                'key' => 'FLEXSTEEL FUTURA ETHAN-ALL DISPENSING HOSE',
                'value' => 'FLEXSTEEL FUTURA ETHAN-ALL DISPENSING HOSE',
              ),
              110 => 
              array (
                'key' => 'FLEXSTEEL FUTURA HVR LOW PERM',
                'value' => 'FLEXSTEEL FUTURA HVR LOW PERM',
              ),
              111 => 
              array (
                'key' => 'FLEXSTEEL FUTURA LOW PERM',
                'value' => 'FLEXSTEEL FUTURA LOW PERM',
              ),
              112 => 
              array (
                'key' => 'FLEXSTEEL FUTURA VAPOR ASSIST',
                'value' => 'FLEXSTEEL FUTURA VAPOR ASSIST',
              ),
              113 => 
              array (
                'key' => 'FLEXSTEEL MINE SPRAY',
                'value' => 'FLEXSTEEL MINE SPRAY',
              ),
              114 => 
              array (
                'key' => 'FLEXSTEEL SERVICE STATION AIR',
                'value' => 'FLEXSTEEL SERVICE STATION AIR',
              ),
              115 => 
              array (
                'key' => 'FLEXTRA DRY MATERIAL',
                'value' => 'FLEXTRA DRY MATERIAL',
              ),
              116 => 
              array (
                'key' => 'FLEXTRA ROCK DUST',
                'value' => 'FLEXTRA ROCK DUST',
              ),
              117 => 
              array (
                'key' => 'FLEXWING PETROLEUM',
                'value' => 'FLEXWING PETROLEUM',
              ),
              118 => 
              array (
                'key' => 'FLEXWING VERSAFUEL',
                'value' => 'FLEXWING VERSAFUEL',
              ),
              119 => 
              array (
                'key' => 'FLEXWING WATER S&D',
                'value' => 'FLEXWING WATER S&D',
              ),
              120 => 
              array (
                'key' => 'FORTRESS  Blue 1200 MICROBAN',
                'value' => 'FORTRESS  Blue 1200 MICROBAN',
              ),
              121 => 
              array (
                'key' => 'FORTRESS 1000',
                'value' => 'FORTRESS 1000',
              ),
              122 => 
              array (
                'key' => 'FORTRESS 300 - WHITE',
                'value' => 'FORTRESS 300 - WHITE',
              ),
              123 => 
              array (
                'key' => 'FORTRESS 3000',
                'value' => 'FORTRESS 3000',
              ),
              124 => 
              array (
                'key' => 'FORTRESS Blue 300 FDA Microban',
                'value' => 'FORTRESS Blue 300 FDA Microban',
              ),
              125 => 
              array (
                'key' => 'FORTRESS Yellow 300',
                'value' => 'FORTRESS Yellow 300',
              ),
              126 => 
              array (
                'key' => 'FRAC 500 S&D',
                'value' => 'FRAC 500 S&D',
              ),
              127 => 
              array (
                'key' => 'FRAC 600',
                'value' => 'FRAC 600',
              ),
              128 => 
              array (
                'key' => 'FRAC CUT GOUGE',
                'value' => 'FRAC CUT GOUGE',
              ),
              129 => 
              array (
                'key' => 'FRAS AIR/WATER AS2660B',
                'value' => 'FRAS AIR/WATER AS2660B',
              ),
              130 => 
              array (
                'key' => 'FRONTIER 200',
                'value' => 'FRONTIER 200',
              ),
              131 => 
              array (
                'key' => 'FRONTIER 200 READY 2 GO',
                'value' => 'FRONTIER 200 READY 2 GO',
              ),
              132 => 
              array (
                'key' => 'FRONTIER 250',
                'value' => 'FRONTIER 250',
              ),
              133 => 
              array (
                'key' => 'FRONTIER 250 READY 2 GO',
                'value' => 'FRONTIER 250 READY 2 GO',
              ),
              134 => 
              array (
                'key' => 'FRONTIER 300',
                'value' => 'FRONTIER 300',
              ),
              135 => 
              array (
                'key' => 'FRONTIER 300 READY 2 GO',
                'value' => 'FRONTIER 300 READY 2 GO',
              ),
              136 => 
              array (
                'key' => 'FUEL DISCHARGE',
                'value' => 'FUEL DISCHARGE',
              ),
              137 => 
              array (
                'key' => 'FUEL DISCHARGE 250',
                'value' => 'FUEL DISCHARGE 250',
              ),
              138 => 
              array (
                'key' => 'FUEL DISCHARGE 300',
                'value' => 'FUEL DISCHARGE 300',
              ),
              139 => 
              array (
                'key' => 'FUEL FILL SAE J1527 TYPE A CLASS 2 STYLE R2 / ISO 7840-A2',
                'value' => 'FUEL FILL SAE J1527 TYPE A CLASS 2 STYLE R2 / ISO 7840-A2',
              ),
              140 => 
              array (
                'key' => 'FURNACE DOOR',
                'value' => 'FURNACE DOOR',
              ),
              141 => 
              array (
                'key' => 'GAUNTLET 1500',
                'value' => 'GAUNTLET 1500',
              ),
              142 => 
              array (
                'key' => 'GAUNTLET 3000',
                'value' => 'GAUNTLET 3000',
              ),
              143 => 
              array (
                'key' => 'GAUNTLET 4500',
                'value' => 'GAUNTLET 4500',
              ),
              144 => 
              array (
                'key' => 'GBT BLAST',
                'value' => 'GBT BLAST',
              ),
              145 => 
              array (
                'key' => 'GENERIC PETROLEUM TRANSFER',
                'value' => 'GENERIC PETROLEUM TRANSFER',
              ),
              146 => 
              array (
                'key' => 'GENERIC VACUUM 50 HOSE',
                'value' => 'GENERIC VACUUM 50 HOSE',
              ),
              147 => 
              array (
                'key' => 'GORILLA',
                'value' => 'GORILLA',
              ),
              148 => 
              array (
                'key' => 'GRAY FLEXTRA LT',
                'value' => 'GRAY FLEXTRA LT',
              ),
              149 => 
              array (
                'key' => 'GRAY FLEXWING',
                'value' => 'GRAY FLEXWING',
              ),
              150 => 
              array (
                'key' => 'GRAY FLOUR DISCHARGE',
                'value' => 'GRAY FLOUR DISCHARGE',
              ),
              151 => 
              array (
                'key' => 'GRAY FOOD',
                'value' => 'GRAY FOOD',
              ),
              152 => 
              array (
                'key' => 'GREEN CABLE COVER',
                'value' => 'GREEN CABLE COVER',
              ),
              153 => 
              array (
                'key' => 'GREEN HORNET XF',
                'value' => 'GREEN HORNET XF',
              ),
              154 => 
              array (
                'key' => 'GREEN NITROGEN',
                'value' => 'GREEN NITROGEN',
              ),
              155 => 
              array (
                'key' => 'GREENSKEEPER',
                'value' => 'GREENSKEEPER',
              ),
              156 => 
              array (
                'key' => 'HARDWALL WET EXHAUST',
                'value' => 'HARDWALL WET EXHAUST',
              ),
              157 => 
              array (
                'key' => 'HARVEST',
                'value' => 'HARVEST',
              ),
              158 => 
              array (
                'key' => 'HD INDUSTRIAL VACUUM',
                'value' => 'HD INDUSTRIAL VACUUM',
              ),
              159 => 
              array (
                'key' => 'HD MUD CUTTING HOSE HW',
                'value' => 'HD MUD CUTTING HOSE HW',
              ),
              160 => 
              array (
                'key' => 'HD WATER DISCHARGE',
                'value' => 'HD WATER DISCHARGE',
              ),
              161 => 
              array (
                'key' => 'HEAVY DUTY STEAM PILE DRIVER',
                'value' => 'HEAVY DUTY STEAM PILE DRIVER',
              ),
              162 => 
              array (
                'key' => 'HI-PER',
                'value' => 'HI-PER',
              ),
              163 => 
              array (
                'key' => 'HOT SULFUR',
                'value' => 'HOT SULFUR',
              ),
              164 => 
              array (
                'key' => 'HOT TAR & ASPHALT',
                'value' => 'HOT TAR & ASPHALT',
              ),
              165 => 
              array (
                'key' => 'HYDROCARBON DRAIN HOSE - BRAIDED',
                'value' => 'HYDROCARBON DRAIN HOSE - BRAIDED',
              ),
              166 => 
              array (
                'key' => 'HYDROCARBON DRAIN HOSE - HAND BUILT',
                'value' => 'HYDROCARBON DRAIN HOSE - HAND BUILT',
              ),
              167 => 
              array (
                'key' => 'HYDROCARBON DRAIN HOSE ASSEMBLIES',
                'value' => 'HYDROCARBON DRAIN HOSE ASSEMBLIES',
              ),
              168 => 
              array (
                'key' => 'HYDROVATOR',
                'value' => 'HYDROVATOR',
              ),
              169 => 
              array (
                'key' => 'HYDROVATOR SURVIVOR',
                'value' => 'HYDROVATOR SURVIVOR',
              ),
              170 => 
              array (
                'key' => 'i',
                'value' => 'i',
              ),
              171 => 
              array (
                'key' => 'INFINITY CHEMICAL',
                'value' => 'INFINITY CHEMICAL',
              ),
              172 => 
              array (
                'key' => 'INFINITY FOOD',
                'value' => 'INFINITY FOOD',
              ),
              173 => 
              array (
                'key' => 'INFINITY FUEL DROP',
                'value' => 'INFINITY FUEL DROP',
              ),
              174 => 
              array (
                'key' => 'INFINITY FUEL DROP HD',
                'value' => 'INFINITY FUEL DROP HD',
              ),
              175 => 
              array (
                'key' => 'INSTA-GRIP 250',
                'value' => 'INSTA-GRIP 250',
              ),
              176 => 
              array (
                'key' => 'INSTA-GRIP 300',
                'value' => 'INSTA-GRIP 300',
              ),
              177 => 
              array (
                'key' => 'INSTA-GRIP HT 300',
                'value' => 'INSTA-GRIP HT 300',
              ),
              178 => 
              array (
                'key' => 'INSTA-GRIP TC',
                'value' => 'INSTA-GRIP TC',
              ),
              179 => 
              array (
                'key' => 'JACKHAMMER',
                'value' => 'JACKHAMMER',
              ),
              180 => 
              array (
                'key' => 'JET RANGER',
                'value' => 'JET RANGER',
              ),
              181 => 
              array (
                'key' => 'LACTOPAL',
                'value' => 'LACTOPAL',
              ),
              182 => 
              array (
                'key' => 'LIQUID MUD',
                'value' => 'LIQUID MUD',
              ),
              183 => 
              array (
                'key' => 'LOW PRESSURE DIVER’S AIR HOSE',
                'value' => 'LOW PRESSURE DIVER’S AIR HOSE',
              ),
              184 => 
              array (
                'key' => 'LOW TEMPERATURE PETROLEUM TANK TRUCK',
                'value' => 'LOW TEMPERATURE PETROLEUM TANK TRUCK',
              ),
              185 => 
              array (
                'key' => 'LPG DELIVERY PRO',
                'value' => 'LPG DELIVERY PRO',
              ),
              186 => 
              array (
                'key' => 'LPG DELIVERY PRO PREMADE FACTORY ASSEMBLIES',
                'value' => 'LPG DELIVERY PRO PREMADE FACTORY ASSEMBLIES',
              ),
              187 => 
              array (
                'key' => 'LW ARCTIC TANK TRUCK',
                'value' => 'LW ARCTIC TANK TRUCK',
              ),
              188 => 
              array (
                'key' => 'LW BLACK FLEXTRA II',
                'value' => 'LW BLACK FLEXTRA II',
              ),
              189 => 
              array (
                'key' => 'LW INDUSTRIAL VACUUM',
                'value' => 'LW INDUSTRIAL VACUUM',
              ),
              190 => 
              array (
                'key' => 'M&P MINE CONDUIT',
                'value' => 'M&P MINE CONDUIT',
              ),
              191 => 
              array (
                'key' => 'MARINE FUEL FEED VENT HOSE USCG/SAE J1527 TYPE A2 (FIRE RETARDANT)',
                'value' => 'MARINE FUEL FEED VENT HOSE USCG/SAE J1527 TYPE A2 (FIRE RETARDANT)',
              ),
              192 => 
              array (
                'key' => 'MARINE FUEL FEED VENT HOSE USCG/SAE J1527 TYPE B2 (NON-FIRE RETARDANT)',
                'value' => 'MARINE FUEL FEED VENT HOSE USCG/SAE J1527 TYPE B2 (NON-FIRE RETARDANT)',
              ),
              193 => 
              array (
                'key' => 'MARINE FUEL LINE USCG/SAE J1527 & ISO 7840 TYPE A1',
                'value' => 'MARINE FUEL LINE USCG/SAE J1527 & ISO 7840 TYPE A1',
              ),
              194 => 
              array (
                'key' => 'MAXXIM PREMIER',
                'value' => 'MAXXIM PREMIER',
              ),
              195 => 
              array (
                'key' => 'MAXXIM PREMIER PLUS',
                'value' => 'MAXXIM PREMIER PLUS',
              ),
              196 => 
              array (
                'key' => 'MAXXIM PREMIER ULTRA',
                'value' => 'MAXXIM PREMIER ULTRA',
              ),
              197 => 
              array (
                'key' => 'MIL-A-A 59565 MILITARY AIR HOSE',
                'value' => 'MIL-A-A 59565 MILITARY AIR HOSE',
              ),
              198 => 
              array (
                'key' => 'MIL-DTL-29210E STEAM',
                'value' => 'MIL-DTL-29210E STEAM',
              ),
              199 => 
              array (
                'key' => 'MIL-PRF-370J TYPE B',
                'value' => 'MIL-PRF-370J TYPE B',
              ),
              200 => 
              array (
                'key' => 'MINE CONDUIT',
                'value' => 'MINE CONDUIT',
              ),
              201 => 
              array (
                'key' => 'MINE SPRAY',
                'value' => 'MINE SPRAY',
              ),
              202 => 
              array (
                'key' => 'NEPTUNE 1500',
                'value' => 'NEPTUNE 1500',
              ),
              203 => 
              array (
                'key' => 'NEPTUNE 3000',
                'value' => 'NEPTUNE 3000',
              ),
              204 => 
              array (
                'key' => 'NEPTUNE 4001-R',
                'value' => 'NEPTUNE 4001-R',
              ),
              205 => 
              array (
                'key' => 'NEPTUNE 4500',
                'value' => 'NEPTUNE 4500',
              ),
              206 => 
              array (
                'key' => 'NEPTUNE 6000',
                'value' => 'NEPTUNE 6000',
              ),
              207 => 
              array (
                'key' => 'NITRILE RIG HOSE 300',
                'value' => 'NITRILE RIG HOSE 300',
              ),
              208 => 
              array (
                'key' => 'NITROGEN SERVICE HOSE',
                'value' => 'NITROGEN SERVICE HOSE',
              ),
              209 => 
              array (
                'key' => 'NR SPRAY',
                'value' => 'NR SPRAY',
              ),
              210 => 
              array (
                'key' => 'NUTRIFLEX STATIC WIRE',
                'value' => 'NUTRIFLEX STATIC WIRE',
              ),
              211 => 
              array (
                'key' => 'NUTRIFLEX SUCTION & DISCHARGE',
                'value' => 'NUTRIFLEX SUCTION & DISCHARGE',
              ),
              212 => 
              array (
                'key' => 'NUTRIFLO SUCTION & DISCHARGE',
                'value' => 'NUTRIFLO SUCTION & DISCHARGE',
              ),
              213 => 
              array (
                'key' => 'OIL RIG HW',
                'value' => 'OIL RIG HW',
              ),
              214 => 
              array (
                'key' => 'OIL RIG SW',
                'value' => 'OIL RIG SW',
              ),
              215 => 
              array (
                'key' => 'OILFIELD FRAC',
                'value' => 'OILFIELD FRAC',
              ),
              216 => 
              array (
                'key' => 'ORANGE FLEXWING',
                'value' => 'ORANGE FLEXWING',
              ),
              217 => 
              array (
                'key' => 'ORTAC 250',
                'value' => 'ORTAC 250',
              ),
              218 => 
              array (
                'key' => 'ORTAC 300',
                'value' => 'ORTAC 300',
              ),
              219 => 
              array (
                'key' => 'ORTAC 400',
                'value' => 'ORTAC 400',
              ),
              220 => 
              array (
                'key' => 'PACER',
                'value' => 'PACER',
              ),
              221 => 
              array (
                'key' => 'PALADIN',
                'value' => 'PALADIN',
              ),
              222 => 
              array (
                'key' => 'PATHFINDER GARDEN HOSE',
                'value' => 'PATHFINDER GARDEN HOSE',
              ),
              223 => 
              array (
                'key' => 'PGC PLACEMENT TEXTILE',
                'value' => 'PGC PLACEMENT TEXTILE',
              ),
              224 => 
              array (
                'key' => 'PLASTER & GROUT',
                'value' => 'PLASTER & GROUT',
              ),
              225 => 
              array (
                'key' => 'PLATINUM JAC RISER',
                'value' => 'PLATINUM JAC RISER',
              ),
              226 => 
              array (
                'key' => 'PLICORD STEAM 250',
                'value' => 'PLICORD STEAM 250',
              ),
              227 => 
              array (
                'key' => 'PLIOVIC AG SPRAY 1800',
                'value' => 'PLIOVIC AG SPRAY 1800',
              ),
              228 => 
              array (
                'key' => 'PLIOVIC AG SPRAY 2400',
                'value' => 'PLIOVIC AG SPRAY 2400',
              ),
              229 => 
              array (
                'key' => 'PLIOVIC FG (FDA-3A)',
                'value' => 'PLIOVIC FG (FDA-3A)',
              ),
              230 => 
              array (
                'key' => 'PLIOVIC GS',
                'value' => 'PLIOVIC GS',
              ),
              231 => 
              array (
                'key' => 'PLIOVIC PLUS 250',
                'value' => 'PLIOVIC PLUS 250',
              ),
              232 => 
              array (
                'key' => 'PLIOVIC PVC TUBING',
                'value' => 'PLIOVIC PVC TUBING',
              ),
              233 => 
              array (
                'key' => 'POTABLE WATER',
                'value' => 'POTABLE WATER',
              ),
              234 => 
              array (
                'key' => 'PREMIUM RUBBER GARDEN HOSE',
                'value' => 'PREMIUM RUBBER GARDEN HOSE',
              ),
              235 => 
              array (
                'key' => 'PRESSURE WASHER FITTINGS',
                'value' => 'PRESSURE WASHER FITTINGS',
              ),
              236 => 
              array (
                'key' => 'PROSPECTOR AIR 300',
                'value' => 'PROSPECTOR AIR 300',
              ),
              237 => 
              array (
                'key' => 'PROSPECTOR FLEX OILFIELD',
                'value' => 'PROSPECTOR FLEX OILFIELD',
              ),
              238 => 
              array (
                'key' => 'PROSPECTOR FLEX PETRO 150',
                'value' => 'PROSPECTOR FLEX PETRO 150',
              ),
              239 => 
              array (
                'key' => 'PROSPECTOR FLEX RED 100',
                'value' => 'PROSPECTOR FLEX RED 100',
              ),
              240 => 
              array (
                'key' => 'PROSPECTOR FRAC 400 DISCHARGE',
                'value' => 'PROSPECTOR FRAC 400 DISCHARGE',
              ),
              241 => 
              array (
                'key' => 'PROSPECTOR FRAC TANK HOSE',
                'value' => 'PROSPECTOR FRAC TANK HOSE',
              ),
              242 => 
              array (
                'key' => 'PROSPECTOR OILFIELD 150',
                'value' => 'PROSPECTOR OILFIELD 150',
              ),
              243 => 
              array (
                'key' => 'PROSPECTOR OILFIELD 300',
                'value' => 'PROSPECTOR OILFIELD 300',
              ),
              244 => 
              array (
                'key' => 'PROSPECTOR PETRO 150',
                'value' => 'PROSPECTOR PETRO 150',
              ),
              245 => 
              array (
                'key' => 'PROSPECTOR PETRO 300',
                'value' => 'PROSPECTOR PETRO 300',
              ),
              246 => 
              array (
                'key' => 'PROSPECTOR PLUS AIR 400 - EPDM TUBE',
                'value' => 'PROSPECTOR PLUS AIR 400 - EPDM TUBE',
              ),
              247 => 
              array (
                'key' => 'PROSPECTOR PLUS AIR 400 - SBR TUBE',
                'value' => 'PROSPECTOR PLUS AIR 400 - SBR TUBE',
              ),
              248 => 
              array (
                'key' => 'PROSPECTOR WATER DISCHARGE 150',
                'value' => 'PROSPECTOR WATER DISCHARGE 150',
              ),
              249 => 
              array (
                'key' => 'PROSPECTOR WATER S&D',
                'value' => 'PROSPECTOR WATER S&D',
              ),
              250 => 
              array (
                'key' => 'PROTECTION RING',
                'value' => 'PROTECTION RING',
              ),
              251 => 
              array (
                'key' => 'PULP & PAPER WASHDOWN',
                'value' => 'PULP & PAPER WASHDOWN',
              ),
              252 => 
              array (
                'key' => 'PURPLE FLEXWING',
                'value' => 'PURPLE FLEXWING',
              ),
              253 => 
              array (
                'key' => 'PURPLE SNAKE',
                'value' => 'PURPLE SNAKE',
              ),
              254 => 
              array (
                'key' => 'PURPLE SNAKE PLUS',
                'value' => 'PURPLE SNAKE PLUS',
              ),
              255 => 
              array (
                'key' => 'PYROFLEX HOT TAR & ASPHALT II',
                'value' => 'PYROFLEX HOT TAR & ASPHALT II',
              ),
              256 => 
              array (
                'key' => 'PYROFLEX HOT TAR WAND',
                'value' => 'PYROFLEX HOT TAR WAND',
              ),
              257 => 
              array (
                'key' => 'PYROFLEX II HOT AIR',
                'value' => 'PYROFLEX II HOT AIR',
              ),
              258 => 
              array (
                'key' => 'PYROFLEX III HOT AIR',
                'value' => 'PYROFLEX III HOT AIR',
              ),
              259 => 
              array (
                'key' => 'RED FLEXTRA 100',
                'value' => 'RED FLEXTRA 100',
              ),
              260 => 
              array (
                'key' => 'RED FLEXTRA 150',
                'value' => 'RED FLEXTRA 150',
              ),
              261 => 
              array (
                'key' => 'RED ORTAC II',
                'value' => 'RED ORTAC II',
              ),
              262 => 
              array (
                'key' => 'REDWING FUEL OIL',
                'value' => 'REDWING FUEL OIL',
              ),
              263 => 
              array (
                'key' => 'REFUELING SENSING',
                'value' => 'REFUELING SENSING',
              ),
              264 => 
              array (
                'key' => 'ROUGH BORE ASPHALT & BITUMEN EN13482',
                'value' => 'ROUGH BORE ASPHALT & BITUMEN EN13482',
              ),
              265 => 
              array (
                'key' => 'RVC (Reverse Circulation)',
                'value' => 'RVC (Reverse Circulation)',
              ),
              266 => 
              array (
                'key' => 'S&D FRAC',
                'value' => 'S&D FRAC',
              ),
              267 => 
              array (
                'key' => 'SAE 20R1 SB/SC',
                'value' => 'SAE 20R1 SB/SC',
              ),
              268 => 
              array (
                'key' => 'SAE J1527 TYPE A2 FUEL FILL',
                'value' => 'SAE J1527 TYPE A2 FUEL FILL',
              ),
              269 => 
              array (
                'key' => 'SAND SUCTION',
                'value' => 'SAND SUCTION',
              ),
              270 => 
              array (
                'key' => 'SANI-WASH SUPREME 300',
                'value' => 'SANI-WASH SUPREME 300',
              ),
              271 => 
              array (
                'key' => 'SANI-WASH™ 300',
                'value' => 'SANI-WASH™ 300',
              ),
              272 => 
              array (
                'key' => 'SERVICE STATION AIR',
                'value' => 'SERVICE STATION AIR',
              ),
              273 => 
              array (
                'key' => 'SINGLE LINE WELDING (GRADE R)',
                'value' => 'SINGLE LINE WELDING (GRADE R)',
              ),
              274 => 
              array (
                'key' => 'SINGLE LINE WELDING (GRADE RM)',
                'value' => 'SINGLE LINE WELDING (GRADE RM)',
              ),
              275 => 
              array (
                'key' => 'SINGLE LINE WELDING (GRADE T)',
                'value' => 'SINGLE LINE WELDING (GRADE T)',
              ),
              276 => 
              array (
                'key' => 'SMOOTH BORE ASPHALT & BITUMEN EN13482',
                'value' => 'SMOOTH BORE ASPHALT & BITUMEN EN13482',
              ),
              277 => 
              array (
                'key' => 'SMOOTH BORE DOCK 200',
                'value' => 'SMOOTH BORE DOCK 200',
              ),
              278 => 
              array (
                'key' => 'SMOOTH BORE DOCK 300',
                'value' => 'SMOOTH BORE DOCK 300',
              ),
              279 => 
              array (
                'key' => 'SOFTWALL WET EXHAUST',
                'value' => 'SOFTWALL WET EXHAUST',
              ),
              280 => 
              array (
                'key' => 'SPIRAFLEX 1500',
                'value' => 'SPIRAFLEX 1500',
              ),
              281 => 
              array (
                'key' => 'SPIRAFLEX 1600',
                'value' => 'SPIRAFLEX 1600',
              ),
              282 => 
              array (
                'key' => 'SPIRAFLEX 1700',
                'value' => 'SPIRAFLEX 1700',
              ),
              283 => 
              array (
                'key' => 'SPIRAFLEX AGGIE PVC',
                'value' => 'SPIRAFLEX AGGIE PVC',
              ),
              284 => 
              array (
                'key' => 'SPIRAFLEX AIR SEEDER',
                'value' => 'SPIRAFLEX AIR SEEDER',
              ),
              285 => 
              array (
                'key' => 'SPIRAFLEX BLACK LAY-FLAT SUPER-DUTY HOSE',
                'value' => 'SPIRAFLEX BLACK LAY-FLAT SUPER-DUTY HOSE',
              ),
              286 => 
              array (
                'key' => 'SPIRAFLEX BLUE EXTRA LIGHT DUTY',
                'value' => 'SPIRAFLEX BLUE EXTRA LIGHT DUTY',
              ),
              287 => 
              array (
                'key' => 'SPIRAFLEX CABLE GUARD',
                'value' => 'SPIRAFLEX CABLE GUARD',
              ),
              288 => 
              array (
                'key' => 'SPIRAFLEX DUCTING',
                'value' => 'SPIRAFLEX DUCTING',
              ),
              289 => 
              array (
                'key' => 'SPIRAFLEX FOOD GRADE VACUUM SW',
                'value' => 'SPIRAFLEX FOOD GRADE VACUUM SW',
              ),
              290 => 
              array (
                'key' => 'SPIRAFLEX GRASSVAC',
                'value' => 'SPIRAFLEX GRASSVAC',
              ),
              291 => 
              array (
                'key' => 'SPIRAFLEX GRAY LIGHT DUTY',
                'value' => 'SPIRAFLEX GRAY LIGHT DUTY',
              ),
              292 => 
              array (
                'key' => 'SPIRAFLEX GREEN',
                'value' => 'SPIRAFLEX GREEN',
              ),
              293 => 
              array (
                'key' => 'SPIRAFLEX GREEN SUCTION',
                'value' => 'SPIRAFLEX GREEN SUCTION',
              ),
              294 => 
              array (
                'key' => 'SPIRAFLEX HT',
                'value' => 'SPIRAFLEX HT',
              ),
              295 => 
              array (
                'key' => 'SPIRAFLEX LIGHT WEIGHT ROCK DUST',
                'value' => 'SPIRAFLEX LIGHT WEIGHT ROCK DUST',
              ),
              296 => 
              array (
                'key' => 'SPIRAFLEX MULCH BLOWER',
                'value' => 'SPIRAFLEX MULCH BLOWER',
              ),
              297 => 
              array (
                'key' => 'SPIRAFLEX RED MEDIUM DUTY',
                'value' => 'SPIRAFLEX RED MEDIUM DUTY',
              ),
              298 => 
              array (
                'key' => 'SPIRAFLEX ROCK DUST STATIC WIRE',
                'value' => 'SPIRAFLEX ROCK DUST STATIC WIRE',
              ),
              299 => 
              array (
                'key' => 'SPIRAFLEX VACUUM',
                'value' => 'SPIRAFLEX VACUUM',
              ),
              300 => 
              array (
                'key' => 'SPIRAFLEX VAPOR RECOVERY',
                'value' => 'SPIRAFLEX VAPOR RECOVERY',
              ),
              301 => 
              array (
                'key' => 'SPIRAFLEX YELLOW HD 2700',
                'value' => 'SPIRAFLEX YELLOW HD 2700',
              ),
              302 => 
              array (
                'key' => 'SPIRAFLOW',
                'value' => 'SPIRAFLOW',
              ),
              303 => 
              array (
                'key' => 'SPIRATHANE HD',
                'value' => 'SPIRATHANE HD',
              ),
              304 => 
              array (
                'key' => 'SPIRATHANE LD',
                'value' => 'SPIRATHANE LD',
              ),
              305 => 
              array (
                'key' => 'SPIRATHANE PT',
                'value' => 'SPIRATHANE PT',
              ),
              306 => 
              array (
                'key' => 'STAINLESS STEEL & ALUMINUM CRIMP SLEEVES',
                'value' => 'STAINLESS STEEL & ALUMINUM CRIMP SLEEVES',
              ),
              307 => 
              array (
                'key' => 'STEEL AIR',
                'value' => 'STEEL AIR',
              ),
              308 => 
              array (
                'key' => 'STEEL AIR (SBR)',
                'value' => 'STEEL AIR (SBR)',
              ),
              309 => 
              array (
                'key' => 'SUPER AIR 400 - YELLOW',
                'value' => 'SUPER AIR 400 - YELLOW',
              ),
              310 => 
              array (
                'key' => 'SUPER BLACK FLEXWING 300',
                'value' => 'SUPER BLACK FLEXWING 300',
              ),
              311 => 
              array (
                'key' => 'SUPER BLACK FLEXWING 400',
                'value' => 'SUPER BLACK FLEXWING 400',
              ),
              312 => 
              array (
                'key' => 'SUPER ORTAC®',
                'value' => 'SUPER ORTAC®',
              ),
              313 => 
              array (
                'key' => 'SUPER ROCK DRILL',
                'value' => 'SUPER ROCK DRILL',
              ),
              314 => 
              array (
                'key' => 'SUPER ROCK DRILL HT 600',
                'value' => 'SUPER ROCK DRILL HT 600',
              ),
              315 => 
              array (
                'key' => 'SUPER SANI-WASH 300',
                'value' => 'SUPER SANI-WASH 300',
              ),
              316 => 
              array (
                'key' => 'SURELINE',
                'value' => 'SURELINE',
              ),
              317 => 
              array (
                'key' => 'TAN FLEXTRA',
                'value' => 'TAN FLEXTRA',
              ),
              318 => 
              array (
                'key' => 'TAN FLEXTRA FDA',
                'value' => 'TAN FLEXTRA FDA',
              ),
              319 => 
              array (
                'key' => 'TAN FLEXWING',
                'value' => 'TAN FLEXWING',
              ),
              320 => 
              array (
                'key' => 'TAN FLEXWING FDA',
                'value' => 'TAN FLEXWING FDA',
              ),
              321 => 
              array (
                'key' => 'TAN SOFTWALL',
                'value' => 'TAN SOFTWALL',
              ),
              322 => 
              array (
                'key' => 'TAN SOFTWALL FDA',
                'value' => 'TAN SOFTWALL FDA',
              ),
              323 => 
              array (
                'key' => 'TANKER BARGE DISCHARGE',
                'value' => 'TANKER BARGE DISCHARGE',
              ),
              324 => 
              array (
                'key' => 'TANKER BARGE NITRILE 300',
                'value' => 'TANKER BARGE NITRILE 300',
              ),
              325 => 
              array (
                'key' => 'TORRIDAIR',
                'value' => 'TORRIDAIR',
              ),
              326 => 
              array (
                'key' => 'TRINCO BLAST BLUE',
                'value' => 'TRINCO BLAST BLUE',
              ),
              327 => 
              array (
                'key' => 'TRIX MULTIFOOD - BLUE',
                'value' => 'TRIX MULTIFOOD - BLUE',
              ),
              328 => 
              array (
                'key' => 'TUNNELCOTE ROCK DUST FLEXTRA CORRUGATED',
                'value' => 'TUNNELCOTE ROCK DUST FLEXTRA CORRUGATED',
              ),
              329 => 
              array (
                'key' => 'TUNNELCOTE ROCK DUST FLEXWING SMOOTH',
                'value' => 'TUNNELCOTE ROCK DUST FLEXWING SMOOTH',
              ),
              330 => 
              array (
                'key' => 'TWIN LINE WELDING GRADE T READY 2 GO',
                'value' => 'TWIN LINE WELDING GRADE T READY 2 GO',
              ),
              331 => 
              array (
                'key' => 'TWIN-LINE WELDING GRADE R - TYPE VD',
                'value' => 'TWIN-LINE WELDING GRADE R - TYPE VD',
              ),
              332 => 
              array (
                'key' => 'TWIN-LINE WELDING GRADE R READY 2 GO',
                'value' => 'TWIN-LINE WELDING GRADE R READY 2 GO',
              ),
              333 => 
              array (
                'key' => 'TWIN-LINE WELDING GRADE RM - TYPE VD',
                'value' => 'TWIN-LINE WELDING GRADE RM - TYPE VD',
              ),
              334 => 
              array (
                'key' => 'TWIN-LINE WELDING GRADE T - TYPE VD',
                'value' => 'TWIN-LINE WELDING GRADE T - TYPE VD',
              ),
              335 => 
              array (
                'key' => 'ULTRABRAID® BULL HOSE',
                'value' => 'ULTRABRAID® BULL HOSE',
              ),
              336 => 
              array (
                'key' => 'UNITRIX 60',
                'value' => 'UNITRIX 60',
              ),
              337 => 
              array (
                'key' => 'UNITRIX 80',
                'value' => 'UNITRIX 80',
              ),
              338 => 
              array (
                'key' => 'VAPOR RECOVERY DOCK',
                'value' => 'VAPOR RECOVERY DOCK',
              ),
              339 => 
              array (
                'key' => 'VARIFLEX 200',
                'value' => 'VARIFLEX 200',
              ),
              340 => 
              array (
                'key' => 'VARIFLEX 250',
                'value' => 'VARIFLEX 250',
              ),
              341 => 
              array (
                'key' => 'VARIFLEX 300',
                'value' => 'VARIFLEX 300',
              ),
              342 => 
              array (
                'key' => 'VARIFLEX 300 READY 2 GO',
                'value' => 'VARIFLEX 300 READY 2 GO',
              ),
              343 => 
              array (
                'key' => 'VELOCITY BEVERAGE TRANSFER',
                'value' => 'VELOCITY BEVERAGE TRANSFER',
              ),
              344 => 
              array (
                'key' => 'VELOCITY WATER TRANSFER',
                'value' => 'VELOCITY WATER TRANSFER',
              ),
              345 => 
              array (
                'key' => 'VERSACHEM',
                'value' => 'VERSACHEM',
              ),
              346 => 
              array (
                'key' => 'VERSAFUEL 300',
                'value' => 'VERSAFUEL 300',
              ),
              347 => 
              array (
                'key' => 'VERSAFUEL FLEX',
                'value' => 'VERSAFUEL FLEX',
              ),
              348 => 
              array (
                'key' => 'VERSIFLO 125 WATER DISCHARGE',
                'value' => 'VERSIFLO 125 WATER DISCHARGE',
              ),
              349 => 
              array (
                'key' => 'VERSIFLO 150 WATER SUCTION & DISCHARGE',
                'value' => 'VERSIFLO 150 WATER SUCTION & DISCHARGE',
              ),
              350 => 
              array (
                'key' => 'VERSIFLO 300 WATER DISCHARGE',
                'value' => 'VERSIFLO 300 WATER DISCHARGE',
              ),
              351 => 
              array (
                'key' => 'VINTNER LITE 150 EPDM',
                'value' => 'VINTNER LITE 150 EPDM',
              ),
              352 => 
              array (
                'key' => 'VINTNER RESERVE 250 CB',
                'value' => 'VINTNER RESERVE 250 CB',
              ),
              353 => 
              array (
                'key' => 'VINTNER RESERVE 250 EPDM',
                'value' => 'VINTNER RESERVE 250 EPDM',
              ),
              354 => 
              array (
                'key' => 'VINTNER WITH MICROBAN',
                'value' => 'VINTNER WITH MICROBAN',
              ),
              355 => 
              array (
                'key' => 'VINTNER™',
                'value' => 'VINTNER™',
              ),
              356 => 
              array (
                'key' => 'VIPER',
                'value' => 'VIPER',
              ),
              357 => 
              array (
                'key' => 'WASHDOWN',
                'value' => 'WASHDOWN',
              ),
              358 => 
              array (
                'key' => 'WASTE MATE',
                'value' => 'WASTE MATE',
              ),
              359 => 
              array (
                'key' => 'WATER DISCHARGE 150',
                'value' => 'WATER DISCHARGE 150',
              ),
              360 => 
              array (
                'key' => 'WATER DISCHARGE 300',
                'value' => 'WATER DISCHARGE 300',
              ),
              361 => 
              array (
                'key' => 'WATER DISCHARGE HD',
                'value' => 'WATER DISCHARGE HD',
              ),
              362 => 
              array (
                'key' => 'WATER DISCHARGE HD 200',
                'value' => 'WATER DISCHARGE HD 200',
              ),
              363 => 
              array (
                'key' => 'WATER MOCCASIN',
                'value' => 'WATER MOCCASIN',
              ),
              364 => 
              array (
                'key' => 'WATER S&D',
                'value' => 'WATER S&D',
              ),
              365 => 
              array (
                'key' => 'WATER S&D 300',
                'value' => 'WATER S&D 300',
              ),
              366 => 
              array (
                'key' => 'WHITE FLEXWING',
                'value' => 'WHITE FLEXWING',
              ),
              367 => 
              array (
                'key' => 'WHITE WASHDOWN',
                'value' => 'WHITE WASHDOWN',
              ),
              368 => 
              array (
                'key' => 'WHITE WASHDOWN FDA',
                'value' => 'WHITE WASHDOWN FDA',
              ),
              369 => 
              array (
                'key' => 'WHITEWATER PRESSURE WASHER SERVICE',
                'value' => 'WHITEWATER PRESSURE WASHER SERVICE',
              ),
              370 => 
              array (
                'key' => 'WHITEWATER STEAM CLEANER SERVICE',
                'value' => 'WHITEWATER STEAM CLEANER SERVICE',
              ),
              371 => 
              array (
                'key' => 'WINELINE',
                'value' => 'WINELINE',
              ),
              372 => 
              array (
                'key' => 'WINGCRAFT',
                'value' => 'WINGCRAFT',
              ),
              373 => 
              array (
                'key' => 'XF BLAST (2 PLY)',
                'value' => 'XF BLAST (2 PLY)',
              ),
              374 => 
              array (
                'key' => 'XLPE CHEMICAL TRANSFER',
                'value' => 'XLPE CHEMICAL TRANSFER',
              ),
              375 => 
              array (
                'key' => 'YARDMASTER GARDEN HOSE',
                'value' => 'YARDMASTER GARDEN HOSE',
              ),
              376 => 
              array (
                'key' => 'YELLOW CHEM-ACID DISCHARGE',
                'value' => 'YELLOW CHEM-ACID DISCHARGE',
              ),
              377 => 
              array (
                'key' => 'YELLOW FLEXWING',
                'value' => 'YELLOW FLEXWING',
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
             'title' => 'Food Name',
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
                'key' => 'Excellent',
                'value' => 'Excellent',
              ),
              1 => 
              array (
                'key' => 'Good',
                'value' => 'Good',
              ),
              2 => 
              array (
                'key' => 'Insufficient Information',
                'value' => 'Insufficient Information',
              ),
              3 => 
              array (
                'key' => 'Not Recommended',
                'value' => 'Not Recommended',
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
             'name' => 'FoodType',
             'title' => 'Food Type',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
             'fieldtype' => 'textarea',
             'width' => 350,
             'height' => 150,
             'maxLength' => NULL,
             'showCharCount' => false,
             'excludeFromSearchIndex' => false,
             'queryColumnType' => 'longtext',
             'columnType' => 'longtext',
             'phpdocType' => 'string',
             'name' => 'FoodNote',
             'title' => 'Food Note',
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
