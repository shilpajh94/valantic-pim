<?php 

/** 
* Generated at: 2020-06-12T13:01:44+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- Category [multiselect]
- Logo [image]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '24',
   'name' => 'CatalogCategory',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1591959698,
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'fieldtype' => 'panel',
         'labelWidth' => 100,
         'layout' => NULL,
         'border' => false,
         'icon' => '',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
             'fieldtype' => 'multiselect',
             'options' => 
            array (
              0 => 
              array (
                'key' => 'ABRASIVE TRANSFER - HANDBUILT',
                'value' => 27108,
              ),
              1 => 
              array (
                'key' => 'AC - General',
                'value' => 1271681,
              ),
              2 => 
              array (
                'key' => 'Accessories',
                'value' => 27909,
              ),
              3 => 
              array (
                'key' => 'ACCESSORIES - OP',
                'value' => 27093,
              ),
              4 => 
              array (
                'key' => 'AG Belt',
                'value' => 27801,
              ),
              5 => 
              array (
                'key' => 'Air & Multipurpose - General',
                'value' => 1271563,
              ),
              6 => 
              array (
                'key' => 'Air & Multipurpose - General Purpose',
                'value' => 28076,
              ),
              7 => 
              array (
                'key' => 'Air & Multipurpose - Heavy Duty',
                'value' => 1271564,
              ),
              8 => 
              array (
                'key' => 'Air & Multipurpose - Push On',
                'value' => 1271565,
              ),
              9 => 
              array (
                'key' => 'Air and Water Hose',
                'value' => 1271713,
              ),
              10 => 
              array (
                'key' => 'Air Brake',
                'value' => 1271698,
              ),
              11 => 
              array (
                'key' => 'AIR BREATHING HOSE - BRAIDED',
                'value' => 27073,
              ),
              12 => 
              array (
                'key' => 'AIR BREATHING HOSE - HANDBUILT',
                'value' => 27074,
              ),
              13 => 
              array (
                'key' => 'Air-Turbo Hose - General',
                'value' => 1271704,
              ),
              14 => 
              array (
                'key' => 'AIRCRAFT REFUELING - HANDBUILT',
                'value' => 27118,
              ),
              15 => 
              array (
                'key' => 'AIRCRAFT REFUELING - SPIRAL',
                'value' => 27119,
              ),
              16 => 
              array (
                'key' => 'Assemblies',
                'value' => 27166,
              ),
              17 => 
              array (
                'key' => 'Assemblies',
                'value' => 1271688,
              ),
              18 => 
              array (
                'key' => 'Assemblies',
                'value' => 1271706,
              ),
              19 => 
              array (
                'key' => 'Auto V',
                'value' => 27986,
              ),
              20 => 
              array (
                'key' => 'Bellows - General',
                'value' => 1271663,
              ),
              21 => 
              array (
                'key' => 'BOP',
                'value' => 27158,
              ),
              22 => 
              array (
                'key' => 'Bowling Machine',
                'value' => 27791,
              ),
              23 => 
              array (
                'key' => 'Braided Fittings',
                'value' => 27153,
              ),
              24 => 
              array (
                'key' => 'Bulk',
                'value' => 1271682,
              ),
              25 => 
              array (
                'key' => 'Bulk',
                'value' => 1271686,
              ),
              26 => 
              array (
                'key' => 'Bulk',
                'value' => 1271691,
              ),
              27 => 
              array (
                'key' => 'Bulk',
                'value' => 1271695,
              ),
              28 => 
              array (
                'key' => 'Bulk',
                'value' => 1271701,
              ),
              29 => 
              array (
                'key' => 'BULK TRANSFER - HANDBUILT',
                'value' => 27109,
              ),
              30 => 
              array (
                'key' => 'BULK TRANSFER - PVC',
                'value' => 27110,
              ),
              31 => 
              array (
                'key' => 'Bus',
                'value' => 1271656,
              ),
              32 => 
              array (
                'key' => 'Bus',
                'value' => 1271661,
              ),
              33 => 
              array (
                'key' => 'Bushings',
                'value' => 27847,
              ),
              34 => 
              array (
                'key' => 'Changeover Supplies',
                'value' => 27912,
              ),
              35 => 
              array (
                'key' => 'Chemical - Chemical Transfer',
                'value' => 1271630,
              ),
              36 => 
              array (
                'key' => 'Chemical Transfer',
                'value' => 1271577,
              ),
              37 => 
              array (
                'key' => 'Clamps & Connectors',
                'value' => 1271711,
              ),
              38 => 
              array (
                'key' => 'Classical',
                'value' => 27170,
              ),
              39 => 
              array (
                'key' => 'Classical',
                'value' => 27358,
              ),
              40 => 
              array (
                'key' => 'Cleaning  - Cleaning Equipment',
                'value' => 1271631,
              ),
              41 => 
              array (
                'key' => 'Cleaning Equipment',
                'value' => 1271601,
              ),
              42 => 
              array (
                'key' => 'CLEANING EQUIPMENT - BRAIDED',
                'value' => 27092,
              ),
              43 => 
              array (
                'key' => 'Composite Sprockets',
                'value' => 27890,
              ),
              44 => 
              array (
                'key' => 'Compound-General',
                'value' => 1271650,
              ),
              45 => 
              array (
                'key' => 'CONCRETE - HANDBUILT',
                'value' => 27111,
              ),
              46 => 
              array (
                'key' => 'Conti Air & Water',
                'value' => 1271615,
              ),
              47 => 
              array (
                'key' => 'Conti Aircraft',
                'value' => 1271618,
              ),
              48 => 
              array (
                'key' => 'Conti Food & Beverage',
                'value' => 1271616,
              ),
              49 => 
              array (
                'key' => 'Conti Legacy Other',
                'value' => 1271614,
              ),
              50 => 
              array (
                'key' => 'Conti PetroChem',
                'value' => 1271617,
              ),
              51 => 
              array (
                'key' => 'Conti Steam Hose',
                'value' => 1271619,
              ),
              52 => 
              array (
                'key' => 'Coolant Hose - General',
                'value' => 1271700,
              ),
              53 => 
              array (
                'key' => 'Cotton Cleaner',
                'value' => 27794,
              ),
              54 => 
              array (
                'key' => 'Crimpers',
                'value' => 27164,
              ),
              55 => 
              array (
                'key' => 'CTD',
                'value' => 27728,
              ),
              56 => 
              array (
                'key' => 'DISCHARGE HOSE - BRAIDED',
                'value' => 27131,
              ),
              57 => 
              array (
                'key' => 'DISCHARGE HOSE - HANDBUILT',
                'value' => 27132,
              ),
              58 => 
              array (
                'key' => 'DISCHARGE HOSE - OP',
                'value' => 27133,
              ),
              59 => 
              array (
                'key' => 'DISCHARGE HOSE - PVC',
                'value' => 27134,
              ),
              60 => 
              array (
                'key' => 'DISPENSING - BRAIDED',
                'value' => 27120,
              ),
              61 => 
              array (
                'key' => 'DISPENSING - SPIRAL',
                'value' => 27121,
              ),
              62 => 
              array (
                'key' => 'DIVING HOSE - BRAIDED',
                'value' => 27075,
              ),
              63 => 
              array (
                'key' => 'DIVING HOSE - OP',
                'value' => 27076,
              ),
              64 => 
              array (
                'key' => 'DOCK HOSE - HANDBUILT',
                'value' => 27122,
              ),
              65 => 
              array (
                'key' => 'Fabric - General',
                'value' => 1271647,
              ),
              66 => 
              array (
                'key' => 'Fittings - General',
                'value' => 27165,
              ),
              67 => 
              array (
                'key' => 'Fittings - General',
                'value' => 1271597,
              ),
              68 => 
              array (
                'key' => 'Fittings - Insta-Lock',
                'value' => 1271598,
              ),
              69 => 
              array (
                'key' => 'Flat Belt',
                'value' => 27747,
              ),
              70 => 
              array (
                'key' => 'Flat Idlers',
                'value' => 27887,
              ),
              71 => 
              array (
                'key' => 'Food - Dry Transfer - PVC',
                'value' => 1271571,
              ),
              72 => 
              array (
                'key' => 'Food - Dry Transfer - Rubber',
                'value' => 1271572,
              ),
              73 => 
              array (
                'key' => 'Food - General',
                'value' => 1271566,
              ),
              74 => 
              array (
                'key' => 'Food - Liquid Transfer - PVC',
                'value' => 1271569,
              ),
              75 => 
              array (
                'key' => 'Food - Liquid Transfer - Rubber',
                'value' => 1271570,
              ),
              76 => 
              array (
                'key' => 'Food - Transfer',
                'value' => 1271567,
              ),
              77 => 
              array (
                'key' => 'Formed',
                'value' => 1271683,
              ),
              78 => 
              array (
                'key' => 'Formed',
                'value' => 1271687,
              ),
              79 => 
              array (
                'key' => 'Formed',
                'value' => 1271692,
              ),
              80 => 
              array (
                'key' => 'Formed',
                'value' => 1271696,
              ),
              81 => 
              array (
                'key' => 'Formed',
                'value' => 1271702,
              ),
              82 => 
              array (
                'key' => 'Formed',
                'value' => 1271705,
              ),
              83 => 
              array (
                'key' => 'Freon - Freon Charging CY5',
                'value' => 1271633,
              ),
              84 => 
              array (
                'key' => 'Freon Charging CY5',
                'value' => 1271610,
              ),
              85 => 
              array (
                'key' => 'Fuel Hose - General',
                'value' => 1271694,
              ),
              86 => 
              array (
                'key' => 'Fuel Oil',
                'value' => 1271583,
              ),
              87 => 
              array (
                'key' => 'Fuel Oil',
                'value' => 1271596,
              ),
              88 => 
              array (
                'key' => 'Garage Exhaust Hose and Acc.',
                'value' => 1271712,
              ),
              89 => 
              array (
                'key' => 'GARDEN - PVC',
                'value' => 27135,
              ),
              90 => 
              array (
                'key' => 'GARDEN - SPIRAL',
                'value' => 27136,
              ),
              91 => 
              array (
                'key' => 'GENERAL PURPOSE - BRAIDED',
                'value' => 27077,
              ),
              92 => 
              array (
                'key' => 'GENERAL PURPOSE - HANDBUILT',
                'value' => 27078,
              ),
              93 => 
              array (
                'key' => 'GENERAL PURPOSE - OP',
                'value' => 27079,
              ),
              94 => 
              array (
                'key' => 'GENERAL PURPOSE - PVC',
                'value' => 27080,
              ),
              95 => 
              array (
                'key' => 'GENERAL PURPOSE - SPIRAL',
                'value' => 27081,
              ),
              96 => 
              array (
                'key' => 'GT',
                'value' => 27501,
              ),
              97 => 
              array (
                'key' => 'HEAVY DUTY - BRAIDED',
                'value' => 27082,
              ),
              98 => 
              array (
                'key' => 'HEAVY DUTY - HANDBUILT',
                'value' => 27083,
              ),
              99 => 
              array (
                'key' => 'HEAVY DUTY - OP',
                'value' => 27084,
              ),
              100 => 
              array (
                'key' => 'Helical Offset',
                'value' => 27480,
              ),
              101 => 
              array (
                'key' => 'Hex',
                'value' => 27284,
              ),
              102 => 
              array (
                'key' => 'Hose Accessories - General',
                'value' => 27162,
              ),
              103 => 
              array (
                'key' => 'Hose Kits',
                'value' => 1271708,
              ),
              104 => 
              array (
                'key' => 'Hot Oiler',
                'value' => 27160,
              ),
              105 => 
              array (
                'key' => 'HTD',
                'value' => 27510,
              ),
              106 => 
              array (
                'key' => 'Hydraulic Brake - General',
                'value' => 1271685,
              ),
              107 => 
              array (
                'key' => 'INSTA-LOCK - OP',
                'value' => 27094,
              ),
              108 => 
              array (
                'key' => 'Kits',
                'value' => 28042,
              ),
              109 => 
              array (
                'key' => 'Lawn and Garden',
                'value' => 28038,
              ),
              110 => 
              array (
                'key' => 'Literature',
                'value' => 1271726,
              ),
              111 => 
              array (
                'key' => 'LPG - LPG Delivery Pro',
                'value' => 1271635,
              ),
              112 => 
              array (
                'key' => 'LPG Delivery Pro',
                'value' => 1271602,
              ),
              113 => 
              array (
                'key' => 'Marine - Handbuilt',
                'value' => 1271603,
              ),
              114 => 
              array (
                'key' => 'Marine - Marine - Handbuilt',
                'value' => 27105,
              ),
              115 => 
              array (
                'key' => 'Marine - Marine - Sprial',
                'value' => 27106,
              ),
              116 => 
              array (
                'key' => 'MARINE - PVC',
                'value' => 27107,
              ),
              117 => 
              array (
                'key' => 'Marine Sprial',
                'value' => 1271609,
              ),
              118 => 
              array (
                'key' => 'Material Handling - Cement & Concrete',
                'value' => 1271575,
              ),
              119 => 
              array (
                'key' => 'Material Handling - General',
                'value' => 1271573,
              ),
              120 => 
              array (
                'key' => 'Material Handling-Bulk&Abrasive Transfer',
                'value' => 1271574,
              ),
              121 => 
              array (
                'key' => 'Metric',
                'value' => 27309,
              ),
              122 => 
              array (
                'key' => 'Metric',
                'value' => 27423,
              ),
              123 => 
              array (
                'key' => 'Military',
                'value' => 27161,
              ),
              124 => 
              array (
                'key' => 'Military',
                'value' => 1271612,
              ),
              125 => 
              array (
                'key' => 'Mining - Mining General',
                'value' => 1271592,
              ),
              126 => 
              array (
                'key' => 'Mining - Mining Mine Spray',
                'value' => 1271593,
              ),
              127 => 
              array (
                'key' => 'MINING GENERAL - BRAIDED',
                'value' => 27114,
              ),
              128 => 
              array (
                'key' => 'MINING GENERAL - HANDBUILT',
                'value' => 27115,
              ),
              129 => 
              array (
                'key' => 'MINING GENERAL - PVC',
                'value' => 27116,
              ),
              130 => 
              array (
                'key' => 'MINING GENERAL - SPIRAL',
                'value' => 27117,
              ),
              131 => 
              array (
                'key' => 'Misc',
                'value' => 27350,
              ),
              132 => 
              array (
                'key' => 'Misc',
                'value' => 27434,
              ),
              133 => 
              array (
                'key' => 'Misc',
                'value' => 27471,
              ),
              134 => 
              array (
                'key' => 'Misc',
                'value' => 27737,
              ),
              135 => 
              array (
                'key' => 'Misc',
                'value' => 27807,
              ),
              136 => 
              array (
                'key' => 'Misc',
                'value' => 27917,
              ),
              137 => 
              array (
                'key' => 'Misc Credits/Charges',
                'value' => 1271637,
              ),
              138 => 
              array (
                'key' => 'Misc Credits/Charges',
                'value' => 1271639,
              ),
              139 => 
              array (
                'key' => 'Misc Credits/Charges',
                'value' => 1271641,
              ),
              140 => 
              array (
                'key' => 'Misc Credits/Charges',
                'value' => 1271678,
              ),
              141 => 
              array (
                'key' => 'Misc Credits/Charges',
                'value' => 1271720,
              ),
              142 => 
              array (
                'key' => 'Misc. Other Materials',
                'value' => 1271723,
              ),
              143 => 
              array (
                'key' => 'Miscellaneous',
                'value' => 1271673,
              ),
              144 => 
              array (
                'key' => 'Miscellaneous',
                'value' => 1271676,
              ),
              145 => 
              array (
                'key' => 'Miscellaneous',
                'value' => 1271710,
              ),
              146 => 
              array (
                'key' => 'Molded Hose',
                'value' => 28075,
              ),
              147 => 
              array (
                'key' => 'Multi-V',
                'value' => 27968,
              ),
              148 => 
              array (
                'key' => 'Neothane',
                'value' => 27740,
              ),
              149 => 
              array (
                'key' => 'Obsolete',
                'value' => 1271731,
              ),
              150 => 
              array (
                'key' => 'OE Cust Forecasts',
                'value' => 27168,
              ),
              151 => 
              array (
                'key' => 'Open End Pd',
                'value' => 27622,
              ),
              152 => 
              array (
                'key' => 'Other',
                'value' => 1271728,
              ),
              153 => 
              array (
                'key' => 'Petroleum - Aircraft Refueling',
                'value' => 1271578,
              ),
              154 => 
              array (
                'key' => 'Petroleum - General',
                'value' => 1271576,
              ),
              155 => 
              array (
                'key' => 'Petroleum - Petroleum Dock Hose',
                'value' => 1271579,
              ),
              156 => 
              array (
                'key' => 'Petroleum - Petroleum Transfer',
                'value' => 1271580,
              ),
              157 => 
              array (
                'key' => 'Petroleum - Transfer - Braided',
                'value' => 1271581,
              ),
              158 => 
              array (
                'key' => 'Petroleum Dispensing',
                'value' => 1271582,
              ),
              159 => 
              array (
                'key' => 'Petroleum Dispensing',
                'value' => 1271595,
              ),
              160 => 
              array (
                'key' => 'Poly-V',
                'value' => 27441,
              ),
              161 => 
              array (
                'key' => 'Poly-V',
                'value' => 27920,
              ),
              162 => 
              array (
                'key' => 'Polyurethane Belts',
                'value' => 27665,
              ),
              163 => 
              array (
                'key' => 'POTABLE WATER - HANDBUILT',
                'value' => 27095,
              ),
              164 => 
              array (
                'key' => 'POTABLE WATER - OP',
                'value' => 27096,
              ),
              165 => 
              array (
                'key' => 'POTABLE WATER - PVC',
                'value' => 27097,
              ),
              166 => 
              array (
                'key' => 'Power Sports',
                'value' => 27916,
              ),
              167 => 
              array (
                'key' => 'Power Steering',
                'value' => 1271717,
              ),
              168 => 
              array (
                'key' => 'PUSH-ON - BRAIDED',
                'value' => 27085,
              ),
              169 => 
              array (
                'key' => 'PUSH-ON - SPIRAL',
                'value' => 27086,
              ),
              170 => 
              array (
                'key' => 'Quick Couplings & Adaptors',
                'value' => 27163,
              ),
              171 => 
              array (
                'key' => 'Recreational',
                'value' => 28032,
              ),
              172 => 
              array (
                'key' => 'Rolling Lobes - General',
                'value' => 1271653,
              ),
              173 => 
              array (
                'key' => 'RPP',
                'value' => 27555,
              ),
              174 => 
              array (
                'key' => 'Service Assembly',
                'value' => 1271674,
              ),
              175 => 
              array (
                'key' => 'Sheaves',
                'value' => 27864,
              ),
              176 => 
              array (
                'key' => 'SHR',
                'value' => 27159,
              ),
              177 => 
              array (
                'key' => 'Silicon',
                'value' => 1271715,
              ),
              178 => 
              array (
                'key' => 'Sleeves - General',
                'value' => 1271668,
              ),
              179 => 
              array (
                'key' => 'Snap-On Rolling Lobe - General',
                'value' => 1271659,
              ),
              180 => 
              array (
                'key' => 'Special Applications - General',
                'value' => 27157,
              ),
              181 => 
              array (
                'key' => 'Specialty - General',
                'value' => 1271600,
              ),
              182 => 
              array (
                'key' => 'Spiral Fittings',
                'value' => 27155,
              ),
              183 => 
              array (
                'key' => 'Spiral Hose',
                'value' => 27154,
              ),
              184 => 
              array (
                'key' => 'SPRAY - BRAIDED',
                'value' => 27087,
              ),
              185 => 
              array (
                'key' => 'SPRAY - PVC',
                'value' => 27088,
              ),
              186 => 
              array (
                'key' => 'Spray - Spray Hose',
                'value' => 1271621,
              ),
              187 => 
              array (
                'key' => 'Spray Hose',
                'value' => 1271604,
              ),
              188 => 
              array (
                'key' => 'Springride',
                'value' => 1271657,
              ),
              189 => 
              array (
                'key' => 'Springride',
                'value' => 1271666,
              ),
              190 => 
              array (
                'key' => 'Springride',
                'value' => 1271671,
              ),
              191 => 
              array (
                'key' => 'Sprockets',
                'value' => 27810,
              ),
              192 => 
              array (
                'key' => 'STD',
                'value' => 27602,
              ),
              193 => 
              array (
                'key' => 'Steam - Handbuilt',
                'value' => 1271623,
              ),
              194 => 
              array (
                'key' => 'Steam - Large Bore Braid',
                'value' => 1271624,
              ),
              195 => 
              array (
                'key' => 'Steam - Military',
                'value' => 1271625,
              ),
              196 => 
              array (
                'key' => 'Steam - Small Bore Braid',
                'value' => 1271605,
              ),
              197 => 
              array (
                'key' => 'Steam - Small Bore Braid',
                'value' => 1271622,
              ),
              198 => 
              array (
                'key' => 'Steam Handbelt',
                'value' => 1271607,
              ),
              199 => 
              array (
                'key' => 'STEAM HOSE - BRAIDED',
                'value' => 27128,
              ),
              200 => 
              array (
                'key' => 'STEAM HOSE - HANDBUILT',
                'value' => 27129,
              ),
              201 => 
              array (
                'key' => 'STEAM HOSE - OP',
                'value' => 27130,
              ),
              202 => 
              array (
                'key' => 'Steam Largebore Braid',
                'value' => 1271608,
              ),
              203 => 
              array (
                'key' => 'SUCTION & DISCHARGE HOSE - BRAIDED',
                'value' => 27137,
              ),
              204 => 
              array (
                'key' => 'SUCTION & DISCHARGE HOSE - HANDBUILT',
                'value' => 27138,
              ),
              205 => 
              array (
                'key' => 'SUCTION & DISCHARGE HOSE - PVC',
                'value' => 27139,
              ),
              206 => 
              array (
                'key' => 'SUCTION - BRAIDED',
                'value' => 27089,
              ),
              207 => 
              array (
                'key' => 'Tensioners & Pulleys',
                'value' => 28052,
              ),
              208 => 
              array (
                'key' => 'Textile & Braid Hose',
                'value' => 27152,
              ),
              209 => 
              array (
                'key' => 'Thermoplastic',
                'value' => 27156,
              ),
              210 => 
              array (
                'key' => 'Timing',
                'value' => 28019,
              ),
              211 => 
              array (
                'key' => 'TOC/EOC - General',
                'value' => 1271690,
              ),
              212 => 
              array (
                'key' => 'Tools',
                'value' => 27906,
              ),
              213 => 
              array (
                'key' => 'Tools',
                'value' => 1271714,
              ),
              214 => 
              array (
                'key' => 'Trailer',
                'value' => 1271655,
              ),
              215 => 
              array (
                'key' => 'Trailer',
                'value' => 1271665,
              ),
              216 => 
              array (
                'key' => 'Trailer',
                'value' => 1271670,
              ),
              217 => 
              array (
                'key' => 'TRANSFER - BRAIDED',
                'value' => 27098,
              ),
              218 => 
              array (
                'key' => 'TRANSFER - BRAIDED',
                'value' => 27127,
              ),
              219 => 
              array (
                'key' => 'TRANSFER - HANDBUILT',
                'value' => 27090,
              ),
              220 => 
              array (
                'key' => 'TRANSFER - HANDBUILT',
                'value' => 27099,
              ),
              221 => 
              array (
                'key' => 'TRANSFER - OP',
                'value' => 27091,
              ),
              222 => 
              array (
                'key' => 'TRANSFER - OP',
                'value' => 27100,
              ),
              223 => 
              array (
                'key' => 'TRANSFER - PVC',
                'value' => 27101,
              ),
              224 => 
              array (
                'key' => 'TRANSFER DISCHARGE - BRAIDED',
                'value' => 27123,
              ),
              225 => 
              array (
                'key' => 'TRANSFER DISCHARGE - HANDBUILT',
                'value' => 27124,
              ),
              226 => 
              array (
                'key' => 'TRANSFER SUCTION & DISCHARGE - HANDBUILT',
                'value' => 27125,
              ),
              227 => 
              array (
                'key' => 'TRANSFER SUCTION & DISCHARGE - PVC',
                'value' => 27126,
              ),
              228 => 
              array (
                'key' => 'Trapezoidal',
                'value' => 27564,
              ),
              229 => 
              array (
                'key' => 'Truck',
                'value' => 1271654,
              ),
              230 => 
              array (
                'key' => 'Truck',
                'value' => 1271660,
              ),
              231 => 
              array (
                'key' => 'Truck',
                'value' => 1271664,
              ),
              232 => 
              array (
                'key' => 'Truck',
                'value' => 1271669,
              ),
              233 => 
              array (
                'key' => 'Truck Refrigeration Belt',
                'value' => 28071,
              ),
              234 => 
              array (
                'key' => 'Tubing',
                'value' => 1271716,
              ),
              235 => 
              array (
                'key' => 'VACUUM - HANDBUILT',
                'value' => 27112,
              ),
              236 => 
              array (
                'key' => 'VACUUM - PVC',
                'value' => 27113,
              ),
              237 => 
              array (
                'key' => 'Vacuum - PVC',
                'value' => 1271627,
              ),
              238 => 
              array (
                'key' => 'Vacuum - Rubber',
                'value' => 1271628,
              ),
              239 => 
              array (
                'key' => 'Vacuum Brake',
                'value' => 1271718,
              ),
              240 => 
              array (
                'key' => 'Variable Speed',
                'value' => 27772,
              ),
              241 => 
              array (
                'key' => 'Vintner & Velocity Beverage',
                'value' => 1271568,
              ),
              242 => 
              array (
                'key' => 'WASHDOWN - BRAIDED',
                'value' => 27102,
              ),
              243 => 
              array (
                'key' => 'WASHDOWN - HANDBUILT',
                'value' => 27140,
              ),
              244 => 
              array (
                'key' => 'WASHDOWN - OP',
                'value' => 27103,
              ),
              245 => 
              array (
                'key' => 'WASHDOWN - SPIRAL',
                'value' => 27104,
              ),
              246 => 
              array (
                'key' => 'Water - Discharge - PVC',
                'value' => 1271590,
              ),
              247 => 
              array (
                'key' => 'Water - Discharge - Rubber',
                'value' => 1271591,
              ),
              248 => 
              array (
                'key' => 'Water - Garden Hose',
                'value' => 1271587,
              ),
              249 => 
              array (
                'key' => 'Water - General',
                'value' => 1271584,
              ),
              250 => 
              array (
                'key' => 'Water - Washdown Hose',
                'value' => 1271586,
              ),
              251 => 
              array (
                'key' => 'Water - Water Suction and Discharge - PV',
                'value' => 1271588,
              ),
              252 => 
              array (
                'key' => 'Water - Water Suction and Discharge - Ru',
                'value' => 1271589,
              ),
              253 => 
              array (
                'key' => 'Water Suction & Discharge',
                'value' => 1271585,
              ),
              254 => 
              array (
                'key' => 'Wedge',
                'value' => 27246,
              ),
              255 => 
              array (
                'key' => 'Wedge',
                'value' => 27387,
              ),
              256 => 
              array (
                'key' => 'WELDING - BRAIDED',
                'value' => 27141,
              ),
              257 => 
              array (
                'key' => 'WELDING - OP',
                'value' => 27142,
              ),
              258 => 
              array (
                'key' => 'WELDING - SPIRAL',
                'value' => 27143,
              ),
              259 => 
              array (
                'key' => 'Welding - Welding Hoses',
                'value' => 1271629,
              ),
              260 => 
              array (
                'key' => 'Welding Hoses',
                'value' => 1271606,
              ),
              261 => 
              array (
                'key' => 'Yarn - General',
                'value' => 1271644,
              ),
            ),
             'width' => '',
             'height' => '',
             'maxItems' => '',
             'renderType' => 'tags',
             'optionsProviderClass' => 'CatalogBundle\\OptionProvider\\CategoryOptionsProvider',
             'optionsProviderData' => '',
             'queryColumnType' => 'text',
             'columnType' => 'text',
             'phpdocType' => 'array',
             'dynamicOptions' => false,
             'name' => 'Category',
             'title' => 'Category',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
             'fieldtype' => 'image',
             'width' => '',
             'height' => '',
             'uploadPath' => '',
             'queryColumnType' => 'int(11)',
             'columnType' => 'int(11)',
             'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
             'name' => 'Logo',
             'title' => 'Logo',
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
