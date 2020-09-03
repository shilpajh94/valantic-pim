<?php 

/** 
* Generated at: 2020-08-28T11:38:15+02:00
* IP: 127.0.0.1


Fields Summary: 
- staticWire [input]
- numberOfPlies [numeric]
- HelicalWireYN [booleanSelect]
- tubeCharacteristic [multiselect]
- tubeColor [multiselect]
- StandardMetTube [multiselect]
- Coupling [input]
- tubeMaterial [multiselect]
- VirtualCatalogTubeMaterial [wysiwyg]
- StandardMetCover [multiselect]
- standardMetHoseComment [wysiwyg]
- numberOfHelixWires [numeric]
- LayFlatHoseYN [booleanSelect]
- coverCharacteristic [multiselect]
- coverColor [multiselect]
- agencyCompliance [multiselect]
- safetyFactor [multiselect]
- standardMetHose [multiselect]
- acceptableHoseMedia [multiselect]
- Packaging [input]
- NonStockSizes [input]
- coverMaterial [multiselect]
- VirtualCatalogCoverMaterial [wysiwyg]
*/ 


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'Product',
      'fieldname' => 'Base',
    ),
  ),
   'dao' => NULL,
   'key' => 'HoseBase',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => 'Hose (6 Digit)',
   'group' => 'INH-HYD-HOSE',
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
             'labelWidth' => 100,
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
                     'width' => 300,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'staticWire',
                     'title' => 'Static Wire',
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
                     'decimalPrecision' => 0,
                     'name' => 'numberOfPlies',
                     'title' => 'Number of Plies',
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
                     'name' => 'HelicalWireYN',
                     'title' => 'Helical Wire Y/N',
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
                        'key' => 'Smooth',
                        'value' => 2632,
                      ),
                      1 => 
                      array (
                        'key' => 'Corrugated',
                        'value' => 2633,
                      ),
                      2 => 
                      array (
                        'key' => 'Standard',
                        'value' => 2634,
                      ),
                      3 => 
                      array (
                        'key' => 'Rough Bore',
                        'value' => 2635,
                      ),
                      4 => 
                      array (
                        'key' => 'Conductive',
                        'value' => 2636,
                      ),
                      5 => 
                      array (
                        'key' => 'Non-conductive',
                        'value' => 2637,
                      ),
                      6 => 
                      array (
                        'key' => 'ARPM Class A oil resistance',
                        'value' => 2638,
                      ),
                      7 => 
                      array (
                        'key' => 'ARPM Class B oil resistance',
                        'value' => 2639,
                      ),
                      8 => 
                      array (
                        'key' => 'ARPM Class C oil resistance',
                        'value' => 2640,
                      ),
                      9 => 
                      array (
                        'key' => 'Low Temperature',
                        'value' => 2641,
                      ),
                      10 => 
                      array (
                        'key' => 'Heat Resistant',
                        'value' => 2642,
                      ),
                      11 => 
                      array (
                        'key' => 'Silicone Free',
                        'value' => 2643,
                      ),
                      12 => 
                      array (
                        'key' => 'Chemical Resistant',
                        'value' => 2644,
                      ),
                      13 => 
                      array (
                        'key' => 'Fuel-Resistant',
                        'value' => 2645,
                      ),
                      14 => 
                      array (
                        'key' => 'Flame-Resistant',
                        'value' => 2646,
                      ),
                      15 => 
                      array (
                        'key' => 'WRAPPED',
                        'value' => 1829690,
                      ),
                      16 => 
                      array (
                        'key' => 'FLUOROTHERMOPLASTIC BARRIER',
                        'value' => 1831316,
                      ),
                      17 => 
                      array (
                        'key' => 'SMOOTH',
                        'value' => 1831354,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
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
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Black',
                        'value' => 2648,
                      ),
                      1 => 
                      array (
                        'key' => 'White',
                        'value' => 2649,
                      ),
                      2 => 
                      array (
                        'key' => 'Blue',
                        'value' => 2650,
                      ),
                      3 => 
                      array (
                        'key' => 'Red',
                        'value' => 2651,
                      ),
                      4 => 
                      array (
                        'key' => 'Yellow',
                        'value' => 2652,
                      ),
                      5 => 
                      array (
                        'key' => 'Green',
                        'value' => 2653,
                      ),
                      6 => 
                      array (
                        'key' => 'Purple',
                        'value' => 2654,
                      ),
                      7 => 
                      array (
                        'key' => 'Orange',
                        'value' => 2655,
                      ),
                      8 => 
                      array (
                        'key' => 'Clear',
                        'value' => 2656,
                      ),
                      9 => 
                      array (
                        'key' => 'CLEAR / BLACK',
                        'value' => 1829659,
                      ),
                      10 => 
                      array (
                        'key' => 'RED / CLEAR',
                        'value' => 1829660,
                      ),
                      11 => 
                      array (
                        'key' => 'TAN / CLEAR',
                        'value' => 1829661,
                      ),
                      12 => 
                      array (
                        'key' => 'GREEN / BLACK',
                        'value' => 1829662,
                      ),
                      13 => 
                      array (
                        'key' => 'CLEAR / WHITE',
                        'value' => 1829663,
                      ),
                      14 => 
                      array (
                        'key' => 'RED / YELLOW',
                        'value' => 1829664,
                      ),
                      15 => 
                      array (
                        'key' => 'BLACK / ORANGE',
                        'value' => 1829665,
                      ),
                      16 => 
                      array (
                        'key' => 'SAND / LIME',
                        'value' => 1829666,
                      ),
                      17 => 
                      array (
                        'key' => 'CLEAR / BLUE',
                        'value' => 1829667,
                      ),
                      18 => 
                      array (
                        'key' => 'BLACK / GREEN',
                        'value' => 1829668,
                      ),
                      19 => 
                      array (
                        'key' => 'RED / GREEN',
                        'value' => 1829669,
                      ),
                      20 => 
                      array (
                        'key' => 'ORANGE / CLEAR',
                        'value' => 1829670,
                      ),
                      21 => 
                      array (
                        'key' => 'YELLOW / GREEN',
                        'value' => 1829671,
                      ),
                      22 => 
                      array (
                        'key' => 'GREEN / CLEAR',
                        'value' => 1829672,
                      ),
                      23 => 
                      array (
                        'key' => 'CLEAR / ORANGE',
                        'value' => 1829673,
                      ),
                      24 => 
                      array (
                        'key' => 'BLACK / CLEAR',
                        'value' => 1829674,
                      ),
                      25 => 
                      array (
                        'key' => 'BROWN / BLUE',
                        'value' => 1829675,
                      ),
                      26 => 
                      array (
                        'key' => 'WHITE / CLEAR',
                        'value' => 1829676,
                      ),
                      27 => 
                      array (
                        'key' => 'YELLOW / YELLOW',
                        'value' => 1829677,
                      ),
                      28 => 
                      array (
                        'key' => 'GREEN / BLUE',
                        'value' => 1829678,
                      ),
                      29 => 
                      array (
                        'key' => 'YELLOW / GRAY',
                        'value' => 1829679,
                      ),
                      30 => 
                      array (
                        'key' => 'YELLOW / BLACK',
                        'value' => 1829680,
                      ),
                      31 => 
                      array (
                        'key' => 'YELLOW / STRIPE',
                        'value' => 1829681,
                      ),
                      32 => 
                      array (
                        'key' => 'BLUE / CLEAR',
                        'value' => 1829682,
                      ),
                      33 => 
                      array (
                        'key' => 'GRAY / CLEAR',
                        'value' => 1829683,
                      ),
                      34 => 
                      array (
                        'key' => 'CLEAR / CLEAR',
                        'value' => 1829684,
                      ),
                      35 => 
                      array (
                        'key' => 'GRAY / GREEN',
                        'value' => 1829685,
                      ),
                      36 => 
                      array (
                        'key' => 'ORANGE / RED',
                        'value' => 1829686,
                      ),
                      37 => 
                      array (
                        'key' => 'BLACK / BROWN',
                        'value' => 1829687,
                      ),
                      38 => 
                      array (
                        'key' => 'BLACK / BLUE',
                        'value' => 1829688,
                      ),
                      39 => 
                      array (
                        'key' => 'Black nitrile synthetic rubber',
                        'value' => 1830023,
                      ),
                      40 => 
                      array (
                        'key' => 'NBR (Nitrile)',
                        'value' => 1830026,
                      ),
                      41 => 
                      array (
                        'key' => 'CR (Polychloroprene)',
                        'value' => 1830028,
                      ),
                      42 => 
                      array (
                        'key' => 'CPE (Chlorinated Polyethylene)',
                        'value' => 1830030,
                      ),
                      43 => 
                      array (
                        'key' => 'Oil-resistant synthetic rubber',
                        'value' => 1830036,
                      ),
                      44 => 
                      array (
                        'key' => '(NBR) Nitrile',
                        'value' => 1830039,
                      ),
                      45 => 
                      array (
                        'key' => 'Synthetic Rubber',
                        'value' => 1830040,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'tubeColor',
                     'title' => 'Tube Color',
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
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'ISO7840',
                        'value' => 2952,
                      ),
                      1 => 
                      array (
                        'key' => 'ISO8031',
                        'value' => 2953,
                      ),
                      2 => 
                      array (
                        'key' => 'MIL -AA59565',
                        'value' => 2954,
                      ),
                      3 => 
                      array (
                        'key' => 'MIL-370',
                        'value' => 2955,
                      ),
                      4 => 
                      array (
                        'key' => 'MIL-DTL-13444H Type I',
                        'value' => 2956,
                      ),
                      5 => 
                      array (
                        'key' => 'MIL-DTL-13444H Type III',
                        'value' => 2957,
                      ),
                      6 => 
                      array (
                        'key' => 'MIL-DTL-13531 Type II Class A',
                        'value' => 2958,
                      ),
                      7 => 
                      array (
                        'key' => 'MIL-DTL-20176G',
                        'value' => 2959,
                      ),
                      8 => 
                      array (
                        'key' => 'MIL-DTL-29210E',
                        'value' => 2960,
                      ),
                      9 => 
                      array (
                        'key' => 'MIL-DTL-39921',
                        'value' => 2961,
                      ),
                      10 => 
                      array (
                        'key' => 'MIL-DTL-8788',
                        'value' => 2962,
                      ),
                      11 => 
                      array (
                        'key' => 'MPAPS F-30',
                        'value' => 2963,
                      ),
                      12 => 
                      array (
                        'key' => 'MPAPS F-6032',
                        'value' => 2964,
                      ),
                      13 => 
                      array (
                        'key' => 'MPAPS F-6042',
                        'value' => 2965,
                      ),
                      14 => 
                      array (
                        'key' => 'MS-EA122',
                        'value' => 2966,
                      ),
                      15 => 
                      array (
                        'key' => 'MSHA 2G',
                        'value' => 2967,
                      ),
                      16 => 
                      array (
                        'key' => 'MSHA FLAME RESISTANT',
                        'value' => 2968,
                      ),
                      17 => 
                      array (
                        'key' => 'NIOSH',
                        'value' => 2969,
                      ),
                      18 => 
                      array (
                        'key' => 'NMMA',
                        'value' => 2970,
                      ),
                      19 => 
                      array (
                        'key' => 'NSF-61',
                        'value' => 2971,
                      ),
                      20 => 
                      array (
                        'key' => 'PLEWS RETAIL AIR HOSE',
                        'value' => 2972,
                      ),
                      21 => 
                      array (
                        'key' => 'SAE 100R12',
                        'value' => 2973,
                      ),
                      22 => 
                      array (
                        'key' => 'SAE 100R13',
                        'value' => 2974,
                      ),
                      23 => 
                      array (
                        'key' => 'SAE 100R14A',
                        'value' => 2975,
                      ),
                      24 => 
                      array (
                        'key' => 'SAE 100R15',
                        'value' => 2976,
                      ),
                      25 => 
                      array (
                        'key' => 'SAE 100R16',
                        'value' => 2977,
                      ),
                      26 => 
                      array (
                        'key' => 'SAE 100R17',
                        'value' => 2978,
                      ),
                      27 => 
                      array (
                        'key' => 'SAE 100R18',
                        'value' => 2979,
                      ),
                      28 => 
                      array (
                        'key' => 'SAE 100R19',
                        'value' => 2980,
                      ),
                      29 => 
                      array (
                        'key' => 'SAE 100R1AT',
                        'value' => 2981,
                      ),
                      30 => 
                      array (
                        'key' => 'SAE 100R2AT',
                        'value' => 2982,
                      ),
                      31 => 
                      array (
                        'key' => 'SAE 100R3',
                        'value' => 2983,
                      ),
                      32 => 
                      array (
                        'key' => 'SAE 100R4',
                        'value' => 2984,
                      ),
                      33 => 
                      array (
                        'key' => 'SAE 100R4AT',
                        'value' => 2985,
                      ),
                      34 => 
                      array (
                        'key' => 'SAE 100R5',
                        'value' => 2986,
                      ),
                      35 => 
                      array (
                        'key' => 'SAE 100R6',
                        'value' => 2987,
                      ),
                      36 => 
                      array (
                        'key' => 'SAE 100R7',
                        'value' => 2988,
                      ),
                      37 => 
                      array (
                        'key' => 'SAE 100R8',
                        'value' => 2989,
                      ),
                      38 => 
                      array (
                        'key' => 'SAE 1684',
                        'value' => 2990,
                      ),
                      39 => 
                      array (
                        'key' => 'SAE J1037',
                        'value' => 2991,
                      ),
                      40 => 
                      array (
                        'key' => 'SAE J1402',
                        'value' => 2992,
                      ),
                      41 => 
                      array (
                        'key' => 'SAE J1402 Type (AII)',
                        'value' => 2993,
                      ),
                      42 => 
                      array (
                        'key' => 'SAE J1403',
                        'value' => 2994,
                      ),
                      43 => 
                      array (
                        'key' => 'SAE J1527',
                        'value' => 2995,
                      ),
                      44 => 
                      array (
                        'key' => 'SAE J189',
                        'value' => 2996,
                      ),
                      45 => 
                      array (
                        'key' => 'SAE J1942 / U.S. Coast Guard',
                        'value' => 2997,
                      ),
                      46 => 
                      array (
                        'key' => 'SAE J20',
                        'value' => 2998,
                      ),
                      47 => 
                      array (
                        'key' => 'SAE J2064 Type C, Class I',
                        'value' => 2999,
                      ),
                      48 => 
                      array (
                        'key' => 'SAE J2064 Type C, Class II',
                        'value' => 3000,
                      ),
                      49 => 
                      array (
                        'key' => 'SAE J2076',
                        'value' => 3001,
                      ),
                      50 => 
                      array (
                        'key' => 'SAE J20R3 D1',
                        'value' => 3002,
                      ),
                      51 => 
                      array (
                        'key' => 'SAE J20R3 D2',
                        'value' => 3003,
                      ),
                      52 => 
                      array (
                        'key' => 'SAE J20R3 D3 HT EC',
                        'value' => 3004,
                      ),
                      53 => 
                      array (
                        'key' => 'SAE J30',
                        'value' => 3005,
                      ),
                      54 => 
                      array (
                        'key' => 'SAE J30 R6',
                        'value' => 3006,
                      ),
                      55 => 
                      array (
                        'key' => 'SAE J30 R7',
                        'value' => 3007,
                      ),
                      56 => 
                      array (
                        'key' => 'UL 21',
                        'value' => 3008,
                      ),
                      57 => 
                      array (
                        'key' => 'UL 330',
                        'value' => 3009,
                      ),
                      58 => 
                      array (
                        'key' => 'UL 92',
                        'value' => 3010,
                      ),
                      59 => 
                      array (
                        'key' => 'UL 94 HB',
                        'value' => 3011,
                      ),
                      60 => 
                      array (
                        'key' => 'UL330A',
                        'value' => 3012,
                      ),
                      61 => 
                      array (
                        'key' => 'UL330B',
                        'value' => 3013,
                      ),
                      62 => 
                      array (
                        'key' => 'WSE-M96D34',
                        'value' => 3014,
                      ),
                      63 => 
                      array (
                        'key' => ' DIN 20023 4SH',
                        'value' => 3015,
                      ),
                      64 => 
                      array (
                        'key' => ' DIN 20023 4SP',
                        'value' => 3016,
                      ),
                      65 => 
                      array (
                        'key' => ' EN 853',
                        'value' => 3017,
                      ),
                      66 => 
                      array (
                        'key' => ' EN 853 1SN',
                        'value' => 3018,
                      ),
                      67 => 
                      array (
                        'key' => ' EN 853 2SN',
                        'value' => 3019,
                      ),
                      68 => 
                      array (
                        'key' => ' EN 854 R3',
                        'value' => 3020,
                      ),
                      69 => 
                      array (
                        'key' => ' EN 854 R6',
                        'value' => 3021,
                      ),
                      70 => 
                      array (
                        'key' => ' EN 855 R8',
                        'value' => 3022,
                      ),
                      71 => 
                      array (
                        'key' => 'EN 856 4SH',
                        'value' => 3023,
                      ),
                      72 => 
                      array (
                        'key' => 'EN 856 4SP',
                        'value' => 3024,
                      ),
                      73 => 
                      array (
                        'key' => 'EN 856 R12',
                        'value' => 3025,
                      ),
                      74 => 
                      array (
                        'key' => 'EN 856 R13',
                        'value' => 3026,
                      ),
                      75 => 
                      array (
                        'key' => 'EN 857 2SC',
                        'value' => 3027,
                      ),
                      76 => 
                      array (
                        'key' => ' EN 857 R7',
                        'value' => 3028,
                      ),
                      77 => 
                      array (
                        'key' => ' FDA 21 CFR 177',
                        'value' => 3029,
                      ),
                      78 => 
                      array (
                        'key' => '100 microamps/ft. at 75 KV',
                        'value' => 3030,
                      ),
                      79 => 
                      array (
                        'key' => '1500 Specifications',
                        'value' => 3031,
                      ),
                      80 => 
                      array (
                        'key' => '3-A 18-03 CERTIFIED',
                        'value' => 3032,
                      ),
                      81 => 
                      array (
                        'key' => '3-A COMPLIANT',
                        'value' => 3033,
                      ),
                      82 => 
                      array (
                        'key' => 'ARPM CLASS A (HIGH OIL RESISTANCE)',
                        'value' => 3034,
                      ),
                      83 => 
                      array (
                        'key' => 'ARPM CLASS B (MEDIUM OIL RESISTANCE)',
                        'value' => 3035,
                      ),
                      84 => 
                      array (
                        'key' => 'ARPM CLASS C (LIMITED OIL RESISTANCE)',
                        'value' => 3036,
                      ),
                      85 => 
                      array (
                        'key' => 'ARPM GRADE R WELDING HOSE',
                        'value' => 3037,
                      ),
                      86 => 
                      array (
                        'key' => 'ARPM GRADE RM WELDING HOSE',
                        'value' => 3038,
                      ),
                      87 => 
                      array (
                        'key' => 'ARPM GRADE T WELDING HOSE',
                        'value' => 3039,
                      ),
                      88 => 
                      array (
                        'key' => 'CARB',
                        'value' => 3040,
                      ),
                      89 => 
                      array (
                        'key' => 'CGA E-1',
                        'value' => 3041,
                      ),
                      90 => 
                      array (
                        'key' => 'CNH FZG20305',
                        'value' => 3042,
                      ),
                      91 => 
                      array (
                        'key' => 'CSA 8.1-M86',
                        'value' => 3043,
                      ),
                      92 => 
                      array (
                        'key' => 'DIN 74310',
                        'value' => 3044,
                      ),
                      93 => 
                      array (
                        'key' => 'DOT FMVSS 106 Type (AII)',
                        'value' => 3045,
                      ),
                      94 => 
                      array (
                        'key' => 'FDA/USDA CERTIFIED',
                        'value' => 3046,
                      ),
                      95 => 
                      array (
                        'key' => 'FDA/USDA COMPLIANT',
                        'value' => 3047,
                      ),
                      96 => 
                      array (
                        'key' => 'FMVSS106 49 CFR 571 106',
                        'value' => 3048,
                      ),
                      97 => 
                      array (
                        'key' => 'GM 6278M',
                        'value' => 3049,
                      ),
                      98 => 
                      array (
                        'key' => 'ISO 11237',
                        'value' => 3050,
                      ),
                      99 => 
                      array (
                        'key' => 'ISO3821',
                        'value' => 3051,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'StandardMetTube',
                     'title' => 'Standard Met- Tube',
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
                     'title' => 'Catalog Coupling',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'EPDM',
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
                        'key' => 'CPE',
                        'value' => 2662,
                      ),
                      5 => 
                      array (
                        'key' => 'CR (Chloroprene)',
                        'value' => 2663,
                      ),
                      6 => 
                      array (
                        'key' => 'Synthetic Rubber',
                        'value' => 2664,
                      ),
                      7 => 
                      array (
                        'key' => 'Nylon',
                        'value' => 2665,
                      ),
                      8 => 
                      array (
                        'key' => 'Chlorobutyl',
                        'value' => 2666,
                      ),
                      9 => 
                      array (
                        'key' => 'PVC',
                        'value' => 2667,
                      ),
                      10 => 
                      array (
                        'key' => 'TPV',
                        'value' => 2668,
                      ),
                      11 => 
                      array (
                        'key' => 'TPU',
                        'value' => 2669,
                      ),
                      12 => 
                      array (
                        'key' => 'PE',
                        'value' => 2670,
                      ),
                      13 => 
                      array (
                        'key' => 'PP',
                        'value' => 2671,
                      ),
                      14 => 
                      array (
                        'key' => 'EPDM SYNTHETIC RUBBER',
                        'value' => 1829615,
                      ),
                      15 => 
                      array (
                        'key' => 'PYROSYN® SYNTHETIC RUBBER',
                        'value' => 1829616,
                      ),
                      16 => 
                      array (
                        'key' => '(NBR) NITRILE SYNTHETIC RUBBER',
                        'value' => 1829617,
                      ),
                      17 => 
                      array (
                        'key' => 'TUFSYN SYNTHETIC RUBBER',
                        'value' => 1829618,
                      ),
                      18 => 
                      array (
                        'key' => 'PLIOSYN (UHMWPE)',
                        'value' => 1829619,
                      ),
                      19 => 
                      array (
                        'key' => 'SBR SYNTHETIC RUBBER',
                        'value' => 1829620,
                      ),
                      20 => 
                      array (
                        'key' => 'POLYCHLOROPRENE SYNTHETIC RUBBER',
                        'value' => 1829621,
                      ),
                      21 => 
                      array (
                        'key' => 'CHLOROBUTYL SYNTHETIC RUBBER',
                        'value' => 1829622,
                      ),
                      22 => 
                      array (
                        'key' => 'CHLOROPRENE SYNTHETIC RUBBER',
                        'value' => 1829623,
                      ),
                      23 => 
                      array (
                        'key' => 'SYNTHETIC RUBBER',
                        'value' => 1829624,
                      ),
                      24 => 
                      array (
                        'key' => 'NYLON SILICONE-FREE',
                        'value' => 1829625,
                      ),
                      25 => 
                      array (
                        'key' => 'NBR SYNTHETIC RUBBER',
                        'value' => 1829626,
                      ),
                      26 => 
                      array (
                        'key' => 'PURETEN NATURAL RUBBER',
                        'value' => 1829627,
                      ),
                      27 => 
                      array (
                        'key' => 'TEFLON',
                        'value' => 1829628,
                      ),
                      28 => 
                      array (
                        'key' => 'TPE',
                        'value' => 1829629,
                      ),
                      29 => 
                      array (
                        'key' => 'PLIOVIC',
                        'value' => 1829630,
                      ),
                      30 => 
                      array (
                        'key' => 'PTFE (POLYTETRAFLUOROETHYLENE)',
                        'value' => 1829631,
                      ),
                      31 => 
                      array (
                        'key' => 'ALPHASYN',
                        'value' => 1829632,
                      ),
                      32 => 
                      array (
                        'key' => '(CPE) CHEMRIN SYNTHETIC RUBBER',
                        'value' => 1829633,
                      ),
                      33 => 
                      array (
                        'key' => 'SPECLAR (XLPE)',
                        'value' => 1829634,
                      ),
                      34 => 
                      array (
                        'key' => 'SUPER THERMO-FLO EPDM',
                        'value' => 1829635,
                      ),
                      35 => 
                      array (
                        'key' => '(NBR) NITRILE SYNTHETIC RUBBER; FLUOROTHERMOPLASTIC BARRIER',
                        'value' => 1829636,
                      ),
                      36 => 
                      array (
                        'key' => '(CR) NEOPRENE SYNTHETIC RUBBER',
                        'value' => 1829637,
                      ),
                      37 => 
                      array (
                        'key' => 'WINGPRENE SYNTHETIC RUBBER',
                        'value' => 1829638,
                      ),
                      38 => 
                      array (
                        'key' => 'THERMOPLASTIC',
                        'value' => 1829639,
                      ),
                      39 => 
                      array (
                        'key' => 'URETHANE',
                        'value' => 1829640,
                      ),
                      40 => 
                      array (
                        'key' => 'POLYURETHANE',
                        'value' => 1829641,
                      ),
                      41 => 
                      array (
                        'key' => '(CPE) CHLORINATED POLYETHYLENE',
                        'value' => 1829642,
                      ),
                      42 => 
                      array (
                        'key' => '(NR) NATURAL RUBBER',
                        'value' => 1829643,
                      ),
                      43 => 
                      array (
                        'key' => 'SURVIVOR SYNTHETIC RUBBER',
                        'value' => 1829644,
                      ),
                      44 => 
                      array (
                        'key' => 'UHMWPE',
                        'value' => 1829645,
                      ),
                      45 => 
                      array (
                        'key' => 'UHMWPE RUBBER',
                        'value' => 1829646,
                      ),
                      46 => 
                      array (
                        'key' => 'NYLON',
                        'value' => 1829647,
                      ),
                      47 => 
                      array (
                        'key' => 'POLYESTER',
                        'value' => 1829648,
                      ),
                      48 => 
                      array (
                        'key' => 'FLUORINATED ETHYLENE PROPYLENE',
                        'value' => 1829649,
                      ),
                      49 => 
                      array (
                        'key' => 'FLOSYN SYNTHETIC RUBBER',
                        'value' => 1829650,
                      ),
                      50 => 
                      array (
                        'key' => 'CHLORBUTYL SYNTHETIC RUBBER',
                        'value' => 1829651,
                      ),
                      51 => 
                      array (
                        'key' => 'POLYCHLOROPRENE',
                        'value' => 1829652,
                      ),
                      52 => 
                      array (
                        'key' => 'TRANSPARENT PLASTOMER',
                        'value' => 1829653,
                      ),
                      53 => 
                      array (
                        'key' => 'FLUOROPLASTIC',
                        'value' => 1829654,
                      ),
                      54 => 
                      array (
                        'key' => 'UPE LINER',
                        'value' => 1829655,
                      ),
                      55 => 
                      array (
                        'key' => 'SBR/EPDM',
                        'value' => 1829656,
                      ),
                      56 => 
                      array (
                        'key' => 'NITRILE/PVC',
                        'value' => 1829657,
                      ),
                      57 => 
                      array (
                        'key' => '(NBR/PVC) CHEMIVIC SYNTHETIC RUBBER',
                        'value' => 1829658,
                      ),
                      58 => 
                      array (
                        'key' => 'Black nitrile synthetic rubber',
                        'value' => 1830022,
                      ),
                      59 => 
                      array (
                        'key' => 'NBR (Nitrile)',
                        'value' => 1830025,
                      ),
                      60 => 
                      array (
                        'key' => 'CR (Polychloroprene)',
                        'value' => 1830027,
                      ),
                      61 => 
                      array (
                        'key' => 'CPE (Chlorinated Polyethylene)',
                        'value' => 1830029,
                      ),
                      62 => 
                      array (
                        'key' => 'Oil-resistant synthetic rubber',
                        'value' => 1830035,
                      ),
                      63 => 
                      array (
                        'key' => '(NBR) Nitrile',
                        'value' => 1830038,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
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
                  )),
                  8 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                     'fieldtype' => 'wysiwyg',
                     'width' => 295,
                     'height' => 150,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'toolbarConfig' => '',
                     'excludeFromSearchIndex' => false,
                     'name' => 'VirtualCatalogTubeMaterial',
                     'title' => 'Virtual Catalog Tube Material',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:205px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  9 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => ' DIN 20023 4SH',
                        'value' => 2678,
                      ),
                      1 => 
                      array (
                        'key' => ' DIN 20023 4SP',
                        'value' => 2679,
                      ),
                      2 => 
                      array (
                        'key' => ' EN 853',
                        'value' => 2680,
                      ),
                      3 => 
                      array (
                        'key' => ' EN 853 1SN',
                        'value' => 2681,
                      ),
                      4 => 
                      array (
                        'key' => ' EN 853 2SN',
                        'value' => 2682,
                      ),
                      5 => 
                      array (
                        'key' => ' EN 854 R3',
                        'value' => 2683,
                      ),
                      6 => 
                      array (
                        'key' => ' EN 854 R6',
                        'value' => 2684,
                      ),
                      7 => 
                      array (
                        'key' => ' EN 855 R8',
                        'value' => 2685,
                      ),
                      8 => 
                      array (
                        'key' => 'EN 856 4SH',
                        'value' => 2686,
                      ),
                      9 => 
                      array (
                        'key' => 'EN 856 4SP',
                        'value' => 2687,
                      ),
                      10 => 
                      array (
                        'key' => 'EN 856 R12',
                        'value' => 2688,
                      ),
                      11 => 
                      array (
                        'key' => 'EN 856 R13',
                        'value' => 2689,
                      ),
                      12 => 
                      array (
                        'key' => 'EN 857 2SC',
                        'value' => 2690,
                      ),
                      13 => 
                      array (
                        'key' => ' EN 857 R7',
                        'value' => 2691,
                      ),
                      14 => 
                      array (
                        'key' => ' FDA 21 CFR 177',
                        'value' => 2692,
                      ),
                      15 => 
                      array (
                        'key' => '100 microamps/ft. at 75 KV',
                        'value' => 2693,
                      ),
                      16 => 
                      array (
                        'key' => '1500 Specifications',
                        'value' => 2694,
                      ),
                      17 => 
                      array (
                        'key' => '3-A 18-03 CERTIFIED',
                        'value' => 2695,
                      ),
                      18 => 
                      array (
                        'key' => '3-A COMPLIANT',
                        'value' => 2696,
                      ),
                      19 => 
                      array (
                        'key' => 'ARPM CLASS A (HIGH OIL RESISTANCE)',
                        'value' => 2697,
                      ),
                      20 => 
                      array (
                        'key' => 'ARPM CLASS B (MEDIUM OIL RESISTANCE)',
                        'value' => 2698,
                      ),
                      21 => 
                      array (
                        'key' => 'ARPM CLASS C (LIMITED OIL RESISTANCE)',
                        'value' => 2699,
                      ),
                      22 => 
                      array (
                        'key' => 'ARPM GRADE R WELDING HOSE',
                        'value' => 2700,
                      ),
                      23 => 
                      array (
                        'key' => 'ARPM GRADE RM WELDING HOSE',
                        'value' => 2701,
                      ),
                      24 => 
                      array (
                        'key' => 'ARPM GRADE T WELDING HOSE',
                        'value' => 2702,
                      ),
                      25 => 
                      array (
                        'key' => 'CARB',
                        'value' => 2703,
                      ),
                      26 => 
                      array (
                        'key' => 'CGA E-1',
                        'value' => 2704,
                      ),
                      27 => 
                      array (
                        'key' => 'CNH FZG20305',
                        'value' => 2705,
                      ),
                      28 => 
                      array (
                        'key' => 'CSA 8.1-M86',
                        'value' => 2706,
                      ),
                      29 => 
                      array (
                        'key' => 'DIN 74310',
                        'value' => 2707,
                      ),
                      30 => 
                      array (
                        'key' => 'DOT FMVSS 106 Type (AII)',
                        'value' => 2708,
                      ),
                      31 => 
                      array (
                        'key' => 'FDA/USDA CERTIFIED',
                        'value' => 2709,
                      ),
                      32 => 
                      array (
                        'key' => 'FDA/USDA COMPLIANT',
                        'value' => 2710,
                      ),
                      33 => 
                      array (
                        'key' => 'FMVSS106 49 CFR 571 106',
                        'value' => 2711,
                      ),
                      34 => 
                      array (
                        'key' => 'GM 6278M',
                        'value' => 2712,
                      ),
                      35 => 
                      array (
                        'key' => 'ISO 11237',
                        'value' => 2713,
                      ),
                      36 => 
                      array (
                        'key' => 'ISO3821',
                        'value' => 2714,
                      ),
                      37 => 
                      array (
                        'key' => 'ISO7840',
                        'value' => 2715,
                      ),
                      38 => 
                      array (
                        'key' => 'ISO8031',
                        'value' => 2716,
                      ),
                      39 => 
                      array (
                        'key' => 'MIL -AA59565',
                        'value' => 2717,
                      ),
                      40 => 
                      array (
                        'key' => 'MIL-370',
                        'value' => 2718,
                      ),
                      41 => 
                      array (
                        'key' => 'MIL-DTL-13444H Type I',
                        'value' => 2719,
                      ),
                      42 => 
                      array (
                        'key' => 'MIL-DTL-13444H Type III',
                        'value' => 2720,
                      ),
                      43 => 
                      array (
                        'key' => 'MIL-DTL-13531 Type II Class A',
                        'value' => 2721,
                      ),
                      44 => 
                      array (
                        'key' => 'MIL-DTL-20176G',
                        'value' => 2722,
                      ),
                      45 => 
                      array (
                        'key' => 'MIL-DTL-29210E',
                        'value' => 2723,
                      ),
                      46 => 
                      array (
                        'key' => 'MIL-DTL-39921',
                        'value' => 2724,
                      ),
                      47 => 
                      array (
                        'key' => 'MIL-DTL-8788',
                        'value' => 2725,
                      ),
                      48 => 
                      array (
                        'key' => 'MPAPS F-30',
                        'value' => 2726,
                      ),
                      49 => 
                      array (
                        'key' => 'MPAPS F-6032',
                        'value' => 2727,
                      ),
                      50 => 
                      array (
                        'key' => 'MPAPS F-6042',
                        'value' => 2728,
                      ),
                      51 => 
                      array (
                        'key' => 'MS-EA122',
                        'value' => 2729,
                      ),
                      52 => 
                      array (
                        'key' => 'MSHA 2G',
                        'value' => 2730,
                      ),
                      53 => 
                      array (
                        'key' => 'MSHA FLAME RESISTANT',
                        'value' => 2731,
                      ),
                      54 => 
                      array (
                        'key' => 'NIOSH',
                        'value' => 2732,
                      ),
                      55 => 
                      array (
                        'key' => 'NMMA',
                        'value' => 2733,
                      ),
                      56 => 
                      array (
                        'key' => 'NSF-61',
                        'value' => 2734,
                      ),
                      57 => 
                      array (
                        'key' => 'PLEWS RETAIL AIR HOSE',
                        'value' => 2735,
                      ),
                      58 => 
                      array (
                        'key' => 'SAE 100R12',
                        'value' => 2736,
                      ),
                      59 => 
                      array (
                        'key' => 'SAE 100R13',
                        'value' => 2737,
                      ),
                      60 => 
                      array (
                        'key' => 'SAE 100R14A',
                        'value' => 2738,
                      ),
                      61 => 
                      array (
                        'key' => 'SAE 100R15',
                        'value' => 2739,
                      ),
                      62 => 
                      array (
                        'key' => 'SAE 100R16',
                        'value' => 2740,
                      ),
                      63 => 
                      array (
                        'key' => 'SAE 100R17',
                        'value' => 2741,
                      ),
                      64 => 
                      array (
                        'key' => 'SAE 100R18',
                        'value' => 2742,
                      ),
                      65 => 
                      array (
                        'key' => 'SAE 100R19',
                        'value' => 2743,
                      ),
                      66 => 
                      array (
                        'key' => 'SAE 100R1AT',
                        'value' => 2744,
                      ),
                      67 => 
                      array (
                        'key' => 'SAE 100R2AT',
                        'value' => 2745,
                      ),
                      68 => 
                      array (
                        'key' => 'SAE 100R3',
                        'value' => 2746,
                      ),
                      69 => 
                      array (
                        'key' => 'SAE 100R4',
                        'value' => 2747,
                      ),
                      70 => 
                      array (
                        'key' => 'SAE 100R4AT',
                        'value' => 2748,
                      ),
                      71 => 
                      array (
                        'key' => 'SAE 100R5',
                        'value' => 2749,
                      ),
                      72 => 
                      array (
                        'key' => 'SAE 100R6',
                        'value' => 2750,
                      ),
                      73 => 
                      array (
                        'key' => 'SAE 100R7',
                        'value' => 2751,
                      ),
                      74 => 
                      array (
                        'key' => 'SAE 100R8',
                        'value' => 2752,
                      ),
                      75 => 
                      array (
                        'key' => 'SAE 1684',
                        'value' => 2753,
                      ),
                      76 => 
                      array (
                        'key' => 'SAE J1037',
                        'value' => 2754,
                      ),
                      77 => 
                      array (
                        'key' => 'SAE J1402',
                        'value' => 2755,
                      ),
                      78 => 
                      array (
                        'key' => 'SAE J1402 Type (AII)',
                        'value' => 2756,
                      ),
                      79 => 
                      array (
                        'key' => 'SAE J1403',
                        'value' => 2757,
                      ),
                      80 => 
                      array (
                        'key' => 'SAE J1527',
                        'value' => 2758,
                      ),
                      81 => 
                      array (
                        'key' => 'SAE J189',
                        'value' => 2759,
                      ),
                      82 => 
                      array (
                        'key' => 'SAE J1942 / U.S. Coast Guard',
                        'value' => 2760,
                      ),
                      83 => 
                      array (
                        'key' => 'SAE J20',
                        'value' => 2761,
                      ),
                      84 => 
                      array (
                        'key' => 'SAE J2064 Type C, Class I',
                        'value' => 2762,
                      ),
                      85 => 
                      array (
                        'key' => 'SAE J2064 Type C, Class II',
                        'value' => 2763,
                      ),
                      86 => 
                      array (
                        'key' => 'SAE J2076',
                        'value' => 2764,
                      ),
                      87 => 
                      array (
                        'key' => 'SAE J20R3 D1',
                        'value' => 2765,
                      ),
                      88 => 
                      array (
                        'key' => 'SAE J20R3 D2',
                        'value' => 2766,
                      ),
                      89 => 
                      array (
                        'key' => 'SAE J20R3 D3 HT EC',
                        'value' => 2767,
                      ),
                      90 => 
                      array (
                        'key' => 'SAE J30',
                        'value' => 2768,
                      ),
                      91 => 
                      array (
                        'key' => 'SAE J30 R6',
                        'value' => 2769,
                      ),
                      92 => 
                      array (
                        'key' => 'SAE J30 R7',
                        'value' => 2770,
                      ),
                      93 => 
                      array (
                        'key' => 'UL 21',
                        'value' => 2771,
                      ),
                      94 => 
                      array (
                        'key' => 'UL 330',
                        'value' => 2772,
                      ),
                      95 => 
                      array (
                        'key' => 'UL 92',
                        'value' => 2773,
                      ),
                      96 => 
                      array (
                        'key' => 'UL 94 HB',
                        'value' => 2774,
                      ),
                      97 => 
                      array (
                        'key' => 'UL330A',
                        'value' => 2775,
                      ),
                      98 => 
                      array (
                        'key' => 'UL330B',
                        'value' => 2776,
                      ),
                      99 => 
                      array (
                        'key' => 'WSE-M96D34',
                        'value' => 2777,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'StandardMetCover',
                     'title' => 'Standard Met- Cover',
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
                  10 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                     'fieldtype' => 'wysiwyg',
                     'width' => 295,
                     'height' => 150,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'toolbarConfig' => '',
                     'excludeFromSearchIndex' => false,
                     'name' => 'standardMetHoseComment',
                     'title' => 'Standard Met- Hose "Comment"',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:205px;',
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
                     'name' => 'LayFlatHoseYN',
                     'title' => 'Lay-Flat Hose Y/N',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'CORRUGATED',
                        'value' => 2673,
                      ),
                      1 => 
                      array (
                        'key' => 'RIBBED',
                        'value' => 2674,
                      ),
                      2 => 
                      array (
                        'key' => 'SMOOTH',
                        'value' => 2675,
                      ),
                      3 => 
                      array (
                        'key' => 'WRAPPED',
                        'value' => 2676,
                      ),
                      4 => 
                      array (
                        'key' => 'FUTURIN™ SYNTHETIC RUBBER',
                        'value' => 1831329,
                      ),
                      5 => 
                      array (
                        'key' => 'UHMWPE FILM',
                        'value' => 1831330,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'coverCharacteristic',
                     'title' => 'Cover Characteristic',
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
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Black',
                        'value' => 2599,
                      ),
                      1 => 
                      array (
                        'key' => 'White',
                        'value' => 2600,
                      ),
                      2 => 
                      array (
                        'key' => 'Gray',
                        'value' => 2601,
                      ),
                      3 => 
                      array (
                        'key' => 'Blue',
                        'value' => 2602,
                      ),
                      4 => 
                      array (
                        'key' => 'Red',
                        'value' => 2603,
                      ),
                      5 => 
                      array (
                        'key' => 'Brick Red',
                        'value' => 2604,
                      ),
                      6 => 
                      array (
                        'key' => 'Green',
                        'value' => 2605,
                      ),
                      7 => 
                      array (
                        'key' => 'Dark Green',
                        'value' => 2606,
                      ),
                      8 => 
                      array (
                        'key' => 'Brown',
                        'value' => 2607,
                      ),
                      9 => 
                      array (
                        'key' => 'Purple',
                        'value' => 2608,
                      ),
                      10 => 
                      array (
                        'key' => 'Orange',
                        'value' => 2609,
                      ),
                      11 => 
                      array (
                        'key' => 'Yellow',
                        'value' => 2610,
                      ),
                      12 => 
                      array (
                        'key' => 'Clear',
                        'value' => 2611,
                      ),
                      13 => 
                      array (
                        'key' => 'TAN',
                        'value' => 1829444,
                      ),
                      14 => 
                      array (
                        'key' => 'PINK',
                        'value' => 1829449,
                      ),
                      15 => 
                      array (
                        'key' => 'GOLD',
                        'value' => 1829450,
                      ),
                      16 => 
                      array (
                        'key' => 'SAND',
                        'value' => 1829451,
                      ),
                      17 => 
                      array (
                        'key' => 'LIME',
                        'value' => 1829452,
                      ),
                      18 => 
                      array (
                        'key' => 'TAN#3',
                        'value' => 1829453,
                      ),
                      19 => 
                      array (
                        'key' => 'BRICK RED',
                        'value' => 1829552,
                      ),
                      20 => 
                      array (
                        'key' => 'RED / ORANGE',
                        'value' => 1829553,
                      ),
                      21 => 
                      array (
                        'key' => 'CLEAR / BLACK',
                        'value' => 1829554,
                      ),
                      22 => 
                      array (
                        'key' => 'BLACK / YELLOW',
                        'value' => 1829563,
                      ),
                      23 => 
                      array (
                        'key' => 'RED / CLEAR',
                        'value' => 1829586,
                      ),
                      24 => 
                      array (
                        'key' => 'TAN / CLEAR',
                        'value' => 1829587,
                      ),
                      25 => 
                      array (
                        'key' => 'GREEN / BLACK',
                        'value' => 1829588,
                      ),
                      26 => 
                      array (
                        'key' => 'CLEAR / WHITE',
                        'value' => 1829589,
                      ),
                      27 => 
                      array (
                        'key' => 'RED / YELLOW',
                        'value' => 1829590,
                      ),
                      28 => 
                      array (
                        'key' => 'BLACK / ORANGE',
                        'value' => 1829591,
                      ),
                      29 => 
                      array (
                        'key' => 'SAND / LIME',
                        'value' => 1829592,
                      ),
                      30 => 
                      array (
                        'key' => 'CLEAR / BLUE',
                        'value' => 1829593,
                      ),
                      31 => 
                      array (
                        'key' => 'BLACK / GREEN',
                        'value' => 1829594,
                      ),
                      32 => 
                      array (
                        'key' => 'RED / GREEN',
                        'value' => 1829595,
                      ),
                      33 => 
                      array (
                        'key' => 'ORANGE / CLEAR',
                        'value' => 1829596,
                      ),
                      34 => 
                      array (
                        'key' => 'YELLOW / GREEN',
                        'value' => 1829597,
                      ),
                      35 => 
                      array (
                        'key' => 'GREEN / CLEAR',
                        'value' => 1829598,
                      ),
                      36 => 
                      array (
                        'key' => 'CLEAR / ORANGE',
                        'value' => 1829599,
                      ),
                      37 => 
                      array (
                        'key' => 'BLACK / CLEAR',
                        'value' => 1829600,
                      ),
                      38 => 
                      array (
                        'key' => 'BROWN / BLUE',
                        'value' => 1829601,
                      ),
                      39 => 
                      array (
                        'key' => 'WHITE / CLEAR',
                        'value' => 1829602,
                      ),
                      40 => 
                      array (
                        'key' => 'YELLOW / YELLOW',
                        'value' => 1829603,
                      ),
                      41 => 
                      array (
                        'key' => 'GREEN / BLUE',
                        'value' => 1829604,
                      ),
                      42 => 
                      array (
                        'key' => 'YELLOW / GRAY',
                        'value' => 1829605,
                      ),
                      43 => 
                      array (
                        'key' => 'YELLOW / BLACK',
                        'value' => 1829606,
                      ),
                      44 => 
                      array (
                        'key' => 'YELLOW / STRIPE',
                        'value' => 1829607,
                      ),
                      45 => 
                      array (
                        'key' => 'BLUE / CLEAR',
                        'value' => 1829608,
                      ),
                      46 => 
                      array (
                        'key' => 'GRAY / CLEAR',
                        'value' => 1829609,
                      ),
                      47 => 
                      array (
                        'key' => 'CLEAR / CLEAR',
                        'value' => 1829610,
                      ),
                      48 => 
                      array (
                        'key' => 'GRAY / GREEN',
                        'value' => 1829611,
                      ),
                      49 => 
                      array (
                        'key' => 'ORANGE / RED',
                        'value' => 1829612,
                      ),
                      50 => 
                      array (
                        'key' => 'BLACK / BROWN',
                        'value' => 1829613,
                      ),
                      51 => 
                      array (
                        'key' => 'BLACK / BLUE',
                        'value' => 1829614,
                      ),
                      52 => 
                      array (
                        'key' => 'Pink',
                        'value' => 1830034,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'coverColor',
                     'title' => 'Cover Color',
                     'tooltip' => '
',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'FDA',
                        'value' => 2585,
                      ),
                      1 => 
                      array (
                        'key' => 'USDA',
                        'value' => 2586,
                      ),
                      2 => 
                      array (
                        'key' => '3-A 18-03',
                        'value' => 2587,
                      ),
                      3 => 
                      array (
                        'key' => 'UL',
                        'value' => 2588,
                      ),
                      4 => 
                      array (
                        'key' => 'FMVSS',
                        'value' => 2589,
                      ),
                      5 => 
                      array (
                        'key' => 'MSHA',
                        'value' => 2590,
                      ),
                      6 => 
                      array (
                        'key' => 'NMMA (Marine Hose)',
                        'value' => 2591,
                      ),
                      7 => 
                      array (
                        'key' => 'NIOSH (Air Breathing)',
                        'value' => 2592,
                      ),
                      8 => 
                      array (
                        'key' => 'MIL -AA59565 (compressed air)',
                        'value' => 2593,
                      ),
                      9 => 
                      array (
                        'key' => 'CSA',
                        'value' => 2594,
                      ),
                      10 => 
                      array (
                        'key' => 'CARB',
                        'value' => 2595,
                      ),
                      11 => 
                      array (
                        'key' => 'CUL',
                        'value' => 2596,
                      ),
                      12 => 
                      array (
                        'key' => 'NSF',
                        'value' => 2597,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'agencyCompliance',
                     'title' => 'Agency Compliance',
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
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'safetyFactor',
                     'title' => 'Safety Factor (ARPM Standard)',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => ' DIN 20023 4SH',
                        'value' => 2779,
                      ),
                      1 => 
                      array (
                        'key' => ' DIN 20023 4SP',
                        'value' => 2780,
                      ),
                      2 => 
                      array (
                        'key' => ' EN 853',
                        'value' => 2781,
                      ),
                      3 => 
                      array (
                        'key' => ' EN 853 1SN',
                        'value' => 2782,
                      ),
                      4 => 
                      array (
                        'key' => ' EN 853 2SN',
                        'value' => 2783,
                      ),
                      5 => 
                      array (
                        'key' => ' EN 854 R3',
                        'value' => 2784,
                      ),
                      6 => 
                      array (
                        'key' => ' EN 854 R6',
                        'value' => 2785,
                      ),
                      7 => 
                      array (
                        'key' => ' EN 855 R8',
                        'value' => 2786,
                      ),
                      8 => 
                      array (
                        'key' => 'EN 856 4SH',
                        'value' => 2787,
                      ),
                      9 => 
                      array (
                        'key' => 'EN 856 4SP',
                        'value' => 2788,
                      ),
                      10 => 
                      array (
                        'key' => 'EN 856 R12',
                        'value' => 2789,
                      ),
                      11 => 
                      array (
                        'key' => 'EN 856 R13',
                        'value' => 2790,
                      ),
                      12 => 
                      array (
                        'key' => 'EN 857 2SC',
                        'value' => 2791,
                      ),
                      13 => 
                      array (
                        'key' => ' EN 857 R7',
                        'value' => 2792,
                      ),
                      14 => 
                      array (
                        'key' => ' FDA 21 CFR 177',
                        'value' => 2793,
                      ),
                      15 => 
                      array (
                        'key' => '100 microamps/ft. at 75 KV',
                        'value' => 2794,
                      ),
                      16 => 
                      array (
                        'key' => '1500 Specifications',
                        'value' => 2795,
                      ),
                      17 => 
                      array (
                        'key' => '3-A 18-03 CERTIFIED',
                        'value' => 2796,
                      ),
                      18 => 
                      array (
                        'key' => '3-A COMPLIANT',
                        'value' => 2797,
                      ),
                      19 => 
                      array (
                        'key' => 'ARPM CLASS A (HIGH OIL RESISTANCE)',
                        'value' => 2798,
                      ),
                      20 => 
                      array (
                        'key' => 'ARPM CLASS B (MEDIUM OIL RESISTANCE)',
                        'value' => 2799,
                      ),
                      21 => 
                      array (
                        'key' => 'ARPM CLASS C (LIMITED OIL RESISTANCE)',
                        'value' => 2800,
                      ),
                      22 => 
                      array (
                        'key' => 'ARPM GRADE R WELDING HOSE',
                        'value' => 2801,
                      ),
                      23 => 
                      array (
                        'key' => 'ARPM GRADE RM WELDING HOSE',
                        'value' => 2802,
                      ),
                      24 => 
                      array (
                        'key' => 'ARPM GRADE T WELDING HOSE',
                        'value' => 2803,
                      ),
                      25 => 
                      array (
                        'key' => 'CARB',
                        'value' => 2804,
                      ),
                      26 => 
                      array (
                        'key' => 'CGA E-1',
                        'value' => 2805,
                      ),
                      27 => 
                      array (
                        'key' => 'CNH FZG20305',
                        'value' => 2806,
                      ),
                      28 => 
                      array (
                        'key' => 'CSA 8.1-M86',
                        'value' => 2807,
                      ),
                      29 => 
                      array (
                        'key' => 'DIN 74310',
                        'value' => 2808,
                      ),
                      30 => 
                      array (
                        'key' => 'DOT FMVSS 106 Type (AII)',
                        'value' => 2809,
                      ),
                      31 => 
                      array (
                        'key' => 'FDA/USDA CERTIFIED',
                        'value' => 2810,
                      ),
                      32 => 
                      array (
                        'key' => 'FDA/USDA COMPLIANT',
                        'value' => 2811,
                      ),
                      33 => 
                      array (
                        'key' => 'FMVSS106 49 CFR 571 106',
                        'value' => 2812,
                      ),
                      34 => 
                      array (
                        'key' => 'GM 6278M',
                        'value' => 2813,
                      ),
                      35 => 
                      array (
                        'key' => 'ISO 11237',
                        'value' => 2814,
                      ),
                      36 => 
                      array (
                        'key' => 'ISO3821',
                        'value' => 2815,
                      ),
                      37 => 
                      array (
                        'key' => 'ISO7840',
                        'value' => 2816,
                      ),
                      38 => 
                      array (
                        'key' => 'ISO8031',
                        'value' => 2817,
                      ),
                      39 => 
                      array (
                        'key' => 'MIL -AA59565',
                        'value' => 2818,
                      ),
                      40 => 
                      array (
                        'key' => 'MIL-370',
                        'value' => 2819,
                      ),
                      41 => 
                      array (
                        'key' => 'MIL-DTL-13444H Type I',
                        'value' => 2820,
                      ),
                      42 => 
                      array (
                        'key' => 'MIL-DTL-13444H Type III',
                        'value' => 2821,
                      ),
                      43 => 
                      array (
                        'key' => 'MIL-DTL-13531 Type II Class A',
                        'value' => 2822,
                      ),
                      44 => 
                      array (
                        'key' => 'MIL-DTL-20176G',
                        'value' => 2823,
                      ),
                      45 => 
                      array (
                        'key' => 'MIL-DTL-29210E',
                        'value' => 2824,
                      ),
                      46 => 
                      array (
                        'key' => 'MIL-DTL-39921',
                        'value' => 2825,
                      ),
                      47 => 
                      array (
                        'key' => 'MIL-DTL-8788',
                        'value' => 2826,
                      ),
                      48 => 
                      array (
                        'key' => 'MPAPS F-30',
                        'value' => 2827,
                      ),
                      49 => 
                      array (
                        'key' => 'MPAPS F-6032',
                        'value' => 2828,
                      ),
                      50 => 
                      array (
                        'key' => 'MPAPS F-6042',
                        'value' => 2829,
                      ),
                      51 => 
                      array (
                        'key' => 'MS-EA122',
                        'value' => 2830,
                      ),
                      52 => 
                      array (
                        'key' => 'MSHA 2G',
                        'value' => 2831,
                      ),
                      53 => 
                      array (
                        'key' => 'MSHA FLAME RESISTANT',
                        'value' => 2832,
                      ),
                      54 => 
                      array (
                        'key' => 'NIOSH',
                        'value' => 2833,
                      ),
                      55 => 
                      array (
                        'key' => 'NMMA',
                        'value' => 2834,
                      ),
                      56 => 
                      array (
                        'key' => 'NSF-61',
                        'value' => 2835,
                      ),
                      57 => 
                      array (
                        'key' => 'PLEWS RETAIL AIR HOSE',
                        'value' => 2836,
                      ),
                      58 => 
                      array (
                        'key' => 'SAE 100R12',
                        'value' => 2837,
                      ),
                      59 => 
                      array (
                        'key' => 'SAE 100R13',
                        'value' => 2838,
                      ),
                      60 => 
                      array (
                        'key' => 'SAE 100R14A',
                        'value' => 2839,
                      ),
                      61 => 
                      array (
                        'key' => 'SAE 100R15',
                        'value' => 2840,
                      ),
                      62 => 
                      array (
                        'key' => 'SAE 100R16',
                        'value' => 2841,
                      ),
                      63 => 
                      array (
                        'key' => 'SAE 100R17',
                        'value' => 2842,
                      ),
                      64 => 
                      array (
                        'key' => 'SAE 100R18',
                        'value' => 2843,
                      ),
                      65 => 
                      array (
                        'key' => 'SAE 100R19',
                        'value' => 2844,
                      ),
                      66 => 
                      array (
                        'key' => 'SAE 100R1AT',
                        'value' => 2845,
                      ),
                      67 => 
                      array (
                        'key' => 'SAE 100R2AT',
                        'value' => 2846,
                      ),
                      68 => 
                      array (
                        'key' => 'SAE 100R3',
                        'value' => 2847,
                      ),
                      69 => 
                      array (
                        'key' => 'SAE 100R4',
                        'value' => 2848,
                      ),
                      70 => 
                      array (
                        'key' => 'SAE 100R4AT',
                        'value' => 2849,
                      ),
                      71 => 
                      array (
                        'key' => 'SAE 100R5',
                        'value' => 2850,
                      ),
                      72 => 
                      array (
                        'key' => 'SAE 100R6',
                        'value' => 2851,
                      ),
                      73 => 
                      array (
                        'key' => 'SAE 100R7',
                        'value' => 2852,
                      ),
                      74 => 
                      array (
                        'key' => 'SAE 100R8',
                        'value' => 2853,
                      ),
                      75 => 
                      array (
                        'key' => 'SAE 1684',
                        'value' => 2854,
                      ),
                      76 => 
                      array (
                        'key' => 'SAE J1037',
                        'value' => 2855,
                      ),
                      77 => 
                      array (
                        'key' => 'SAE J1402',
                        'value' => 2856,
                      ),
                      78 => 
                      array (
                        'key' => 'SAE J1402 Type (AII)',
                        'value' => 2857,
                      ),
                      79 => 
                      array (
                        'key' => 'SAE J1403',
                        'value' => 2858,
                      ),
                      80 => 
                      array (
                        'key' => 'SAE J1527',
                        'value' => 2859,
                      ),
                      81 => 
                      array (
                        'key' => 'SAE J189',
                        'value' => 2860,
                      ),
                      82 => 
                      array (
                        'key' => 'SAE J1942 / U.S. Coast Guard',
                        'value' => 2861,
                      ),
                      83 => 
                      array (
                        'key' => 'SAE J20',
                        'value' => 2862,
                      ),
                      84 => 
                      array (
                        'key' => 'SAE J2064 Type C, Class I',
                        'value' => 2863,
                      ),
                      85 => 
                      array (
                        'key' => 'SAE J2064 Type C, Class II',
                        'value' => 2864,
                      ),
                      86 => 
                      array (
                        'key' => 'SAE J2076',
                        'value' => 2865,
                      ),
                      87 => 
                      array (
                        'key' => 'SAE J20R3 D1',
                        'value' => 2866,
                      ),
                      88 => 
                      array (
                        'key' => 'SAE J20R3 D2',
                        'value' => 2867,
                      ),
                      89 => 
                      array (
                        'key' => 'SAE J20R3 D3 HT EC',
                        'value' => 2868,
                      ),
                      90 => 
                      array (
                        'key' => 'SAE J30',
                        'value' => 2869,
                      ),
                      91 => 
                      array (
                        'key' => 'SAE J30 R6',
                        'value' => 2870,
                      ),
                      92 => 
                      array (
                        'key' => 'SAE J30 R7',
                        'value' => 2871,
                      ),
                      93 => 
                      array (
                        'key' => 'UL 21',
                        'value' => 2872,
                      ),
                      94 => 
                      array (
                        'key' => 'UL 330',
                        'value' => 2873,
                      ),
                      95 => 
                      array (
                        'key' => 'UL 92',
                        'value' => 2874,
                      ),
                      96 => 
                      array (
                        'key' => 'UL 94 HB',
                        'value' => 2875,
                      ),
                      97 => 
                      array (
                        'key' => 'UL330A',
                        'value' => 2876,
                      ),
                      98 => 
                      array (
                        'key' => 'UL330B',
                        'value' => 2877,
                      ),
                      99 => 
                      array (
                        'key' => 'WSE-M96D34',
                        'value' => 2878,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'standardMetHose',
                     'title' => 'Standard Met- Hose',
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
                  7 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'acceptableHoseMedia',
                     'title' => 'Acceptable Hose Media',
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
                  8 => 
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
                     'name' => 'Packaging',
                     'title' => 'Catalog Packaging',
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
                  9 => 
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
                  10 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'EPDM',
                        'value' => 2613,
                      ),
                      1 => 
                      array (
                        'key' => 'SBR',
                        'value' => 2614,
                      ),
                      2 => 
                      array (
                        'key' => 'Nitrile',
                        'value' => 2615,
                      ),
                      3 => 
                      array (
                        'key' => 'Chemivic (NBR/PVC)',
                        'value' => 2616,
                      ),
                      4 => 
                      array (
                        'key' => 'CPE',
                        'value' => 2617,
                      ),
                      5 => 
                      array (
                        'key' => 'CR (Chloroprene)',
                        'value' => 2618,
                      ),
                      6 => 
                      array (
                        'key' => 'CSM',
                        'value' => 2619,
                      ),
                      7 => 
                      array (
                        'key' => 'ECO',
                        'value' => 2620,
                      ),
                      8 => 
                      array (
                        'key' => 'Synthetic Rubber',
                        'value' => 2621,
                      ),
                      9 => 
                      array (
                        'key' => 'XNBR',
                        'value' => 2622,
                      ),
                      10 => 
                      array (
                        'key' => 'Carbryn',
                        'value' => 2623,
                      ),
                      11 => 
                      array (
                        'key' => 'Textile',
                        'value' => 2624,
                      ),
                      12 => 
                      array (
                        'key' => 'Futurin Synthetic Rubber',
                        'value' => 2625,
                      ),
                      13 => 
                      array (
                        'key' => 'PVC',
                        'value' => 2626,
                      ),
                      14 => 
                      array (
                        'key' => 'TPV',
                        'value' => 2627,
                      ),
                      15 => 
                      array (
                        'key' => 'TPU',
                        'value' => 2628,
                      ),
                      16 => 
                      array (
                        'key' => 'PE',
                        'value' => 2629,
                      ),
                      17 => 
                      array (
                        'key' => 'PP',
                        'value' => 2630,
                      ),
                      18 => 
                      array (
                        'key' => 'EPDM SYNTHETIC RUBBER',
                        'value' => 1829454,
                      ),
                      19 => 
                      array (
                        'key' => 'PYROSYN® SYNTHETIC RUBBER',
                        'value' => 1829455,
                      ),
                      20 => 
                      array (
                        'key' => '(XNBR) CARBRYN SYNTHETIC RUBBER',
                        'value' => 1829456,
                      ),
                      21 => 
                      array (
                        'key' => '(NBR) NITRILE SYNTHETIC RUBBER',
                        'value' => 1829457,
                      ),
                      22 => 
                      array (
                        'key' => 'ARC SYNTHETIC RUBBER',
                        'value' => 1829458,
                      ),
                      23 => 
                      array (
                        'key' => 'SYNTHETIC RUBBER',
                        'value' => 1829459,
                      ),
                      24 => 
                      array (
                        'key' => 'SBR SYNTHETIC RUBBER',
                        'value' => 1829460,
                      ),
                      25 => 
                      array (
                        'key' => 'FUTURIN™ SYNTHETIC RUBBER',
                        'value' => 1829461,
                      ),
                      26 => 
                      array (
                        'key' => '(CR) NEOPRENE SYNTHETIC RUBBER',
                        'value' => 1829462,
                      ),
                      27 => 
                      array (
                        'key' => 'WINGPRENE SYNTHETIC RUBBER',
                        'value' => 1829463,
                      ),
                      28 => 
                      array (
                        'key' => 'SYNTHETIC FABRIC PLIES',
                        'value' => 1829464,
                      ),
                      29 => 
                      array (
                        'key' => 'CHLOROSULFONATED POLYETHYLENE',
                        'value' => 1829465,
                      ),
                      30 => 
                      array (
                        'key' => 'POLYCHLOROPRENE',
                        'value' => 1829466,
                      ),
                      31 => 
                      array (
                        'key' => 'TPE',
                        'value' => 1829467,
                      ),
                      32 => 
                      array (
                        'key' => 'PLIOVIC',
                        'value' => 1829468,
                      ),
                      33 => 
                      array (
                        'key' => '304 STAINLESS STEEL WIRE BRAID',
                        'value' => 1829469,
                      ),
                      34 => 
                      array (
                        'key' => 'OMEGASYN RUBBER',
                        'value' => 1829470,
                      ),
                      35 => 
                      array (
                        'key' => 'SUPER THERMO-FLO EPDM',
                        'value' => 1829471,
                      ),
                      36 => 
                      array (
                        'key' => 'TEXTILE BRAID',
                        'value' => 1829472,
                      ),
                      37 => 
                      array (
                        'key' => 'THERMOPLASTIC',
                        'value' => 1829473,
                      ),
                      38 => 
                      array (
                        'key' => 'IMPREGNATED TEXTILE BRAID',
                        'value' => 1829474,
                      ),
                      39 => 
                      array (
                        'key' => 'UHMWPE RUBBER',
                        'value' => 1829475,
                      ),
                      40 => 
                      array (
                        'key' => 'CHLOROPRENE SYNTHETIC RUBBER',
                        'value' => 1829476,
                      ),
                      41 => 
                      array (
                        'key' => 'SYNTHETIC RUBBER; UHMWPE FILM',
                        'value' => 1829477,
                      ),
                      42 => 
                      array (
                        'key' => '(CPE) CHLORINATED POLYETHYLENE',
                        'value' => 1829478,
                      ),
                      43 => 
                      array (
                        'key' => 'PURETEN NATURAL RUBBER',
                        'value' => 1829479,
                      ),
                      44 => 
                      array (
                        'key' => 'POLYURETHANE',
                        'value' => 1829480,
                      ),
                      45 => 
                      array (
                        'key' => 'URETHANE',
                        'value' => 1829481,
                      ),
                      46 => 
                      array (
                        'key' => 'POLYESTER',
                        'value' => 1829482,
                      ),
                      47 => 
                      array (
                        'key' => 'FIBERGLASS FABRIC OVER RUBBER',
                        'value' => 1829483,
                      ),
                      48 => 
                      array (
                        'key' => 'SYNTHETIC FIBER',
                        'value' => 1829484,
                      ),
                      49 => 
                      array (
                        'key' => 'CHEMIVIC SYNTHETIC RUBBER',
                        'value' => 1829485,
                      ),
                      50 => 
                      array (
                        'key' => 'FLEXIBLE VINYL',
                        'value' => 1829486,
                      ),
                      51 => 
                      array (
                        'key' => 'CHLOROBUTYL SYNTHETIC RUBBER',
                        'value' => 1829487,
                      ),
                      52 => 
                      array (
                        'key' => 'NBR SYNTHETIC RUBBER',
                        'value' => 1829488,
                      ),
                      53 => 
                      array (
                        'key' => '(NR) NATURAL RUBBER',
                        'value' => 1829489,
                      ),
                      54 => 
                      array (
                        'key' => '(NBR/PVC) CHEMIVIC SYNTHETIC RUBBER',
                        'value' => 1829490,
                      ),
                      55 => 
                      array (
                        'key' => 'CR/EPDM',
                        'value' => 1829491,
                      ),
                      56 => 
                      array (
                        'key' => 'SBR/EPDM',
                        'value' => 1829492,
                      ),
                      57 => 
                      array (
                        'key' => 'Polychloroprene',
                        'value' => 1830024,
                      ),
                      58 => 
                      array (
                        'key' => 'Chlorinated Polyethylene',
                        'value' => 1830031,
                      ),
                      59 => 
                      array (
                        'key' => 'Impregnated Textile Braid',
                        'value' => 1830032,
                      ),
                      60 => 
                      array (
                        'key' => 'Chlorosulfonated Polyethylene',
                        'value' => 1830033,
                      ),
                      61 => 
                      array (
                        'key' => 'Nitrile / PVC',
                        'value' => 1830037,
                      ),
                      62 => 
                      array (
                        'key' => 'BLACK',
                        'value' => 1831327,
                      ),
                      63 => 
                      array (
                        'key' => '(NBR/PVC) CHEMIVIC SYNTHETIC RUBBER',
                        'value' => 1831328,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'coverMaterial',
                     'title' => 'Cover Material',
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
                  11 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                     'fieldtype' => 'wysiwyg',
                     'width' => 295,
                     'height' => 150,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'toolbarConfig' => '',
                     'excludeFromSearchIndex' => false,
                     'name' => 'VirtualCatalogCoverMaterial',
                     'title' => 'Virtual Catalog Cover Material',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:225px;',
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
         'icon' => '',
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
));
