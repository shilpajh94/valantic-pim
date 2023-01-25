<?php 

/** 
* Generated at: 2023-01-24T07:06:38+01:00
* IP: 127.0.0.1


Fields Summary: 
- staticWire [booleanSelect]
- staticWireType [select]
- tubeCharacteristic [multiselect]
- tubeColor [multiselect]
- tubeMaterial [multiselect]
- StandardMetTube [multiselect]
- VirtualCatalogTubeMaterial [wysiwyg]
- Coupling [input]
- sixDigitVirtualCatalogDescription [input]
- numberOfPlies [numeric]
- standardMetHoseComment [wysiwyg]
- standardMetHose [multiselect]
- IFSApplications [multiselect]
- numberOfHelixWires [numeric]
- LayFlatHoseYN [booleanSelect]
- coverCharacteristic [multiselect]
- coverColor [multiselect]
- coverMaterial [multiselect]
- StandardMetCover [multiselect]
- VirtualCatalogCoverMaterial [wysiwyg]
- Packaging [textarea]
- HelicalWireYN [booleanSelect]
- safetyFactor [multiselect]
- NonStockSizes [input]
- agencyCompliance [multiselect]
- acceptableHoseMedia [multiselect]
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
   'title' => 'Hose (6 Digit)',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Corrugated',
                        'value' => 2633,
                      ),
                      1 => 
                      array (
                        'key' => 'Rough Bore',
                        'value' => 2635,
                      ),
                      2 => 
                      array (
                        'key' => 'Smooth',
                        'value' => 2632,
                      ),
                      3 => 
                      array (
                        'key' => 'Standard',
                        'value' => 2634,
                      ),
                      4 => 
                      array (
                        'key' => 'Wrapped',
                        'value' => 1829690,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 1,
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
                  3 => 
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
                        'key' => 'Black / Blue',
                        'value' => 1829688,
                      ),
                      2 => 
                      array (
                        'key' => 'Black / Brown',
                        'value' => 1829687,
                      ),
                      3 => 
                      array (
                        'key' => 'Black / Clear',
                        'value' => 1829674,
                      ),
                      4 => 
                      array (
                        'key' => 'Black / Green',
                        'value' => 1829668,
                      ),
                      5 => 
                      array (
                        'key' => 'Black / Orange',
                        'value' => 1829665,
                      ),
                      6 => 
                      array (
                        'key' => 'Blue',
                        'value' => 2650,
                      ),
                      7 => 
                      array (
                        'key' => 'BLUE / CLEAR',
                        'value' => 1829682,
                      ),
                      8 => 
                      array (
                        'key' => 'BROWN / BLUE',
                        'value' => 1829675,
                      ),
                      9 => 
                      array (
                        'key' => 'Clear',
                        'value' => 2656,
                      ),
                      10 => 
                      array (
                        'key' => 'Clear / Black',
                        'value' => 1829659,
                      ),
                      11 => 
                      array (
                        'key' => 'Clear / Blue',
                        'value' => 1829667,
                      ),
                      12 => 
                      array (
                        'key' => 'CLEAR / CLEAR',
                        'value' => 1829684,
                      ),
                      13 => 
                      array (
                        'key' => 'Clear / Gray',
                        'value' => 5550461,
                      ),
                      14 => 
                      array (
                        'key' => 'Clear / Orange',
                        'value' => 1829673,
                      ),
                      15 => 
                      array (
                        'key' => 'Clear / White',
                        'value' => 1829663,
                      ),
                      16 => 
                      array (
                        'key' => 'Gray',
                        'value' => 7654089,
                      ),
                      17 => 
                      array (
                        'key' => 'GRAY / CLEAR',
                        'value' => 1829683,
                      ),
                      18 => 
                      array (
                        'key' => 'GRAY / GREEN',
                        'value' => 1829685,
                      ),
                      19 => 
                      array (
                        'key' => 'Green',
                        'value' => 2653,
                      ),
                      20 => 
                      array (
                        'key' => 'Green / Black',
                        'value' => 1829662,
                      ),
                      21 => 
                      array (
                        'key' => 'GREEN / BLUE',
                        'value' => 1829678,
                      ),
                      22 => 
                      array (
                        'key' => 'Green / Clear',
                        'value' => 1829672,
                      ),
                      23 => 
                      array (
                        'key' => 'Orange',
                        'value' => 2655,
                      ),
                      24 => 
                      array (
                        'key' => 'Orange / Clear',
                        'value' => 1829670,
                      ),
                      25 => 
                      array (
                        'key' => 'ORANGE / RED',
                        'value' => 1829686,
                      ),
                      26 => 
                      array (
                        'key' => 'Purple',
                        'value' => 2654,
                      ),
                      27 => 
                      array (
                        'key' => 'Red',
                        'value' => 2651,
                      ),
                      28 => 
                      array (
                        'key' => 'Red / Clear',
                        'value' => 1829660,
                      ),
                      29 => 
                      array (
                        'key' => 'Red / Green',
                        'value' => 1829669,
                      ),
                      30 => 
                      array (
                        'key' => 'Red / Yellow',
                        'value' => 1829664,
                      ),
                      31 => 
                      array (
                        'key' => 'Sand / Lime',
                        'value' => 1829666,
                      ),
                      32 => 
                      array (
                        'key' => 'Synthetic Rubber',
                        'value' => 1830040,
                      ),
                      33 => 
                      array (
                        'key' => 'Tan',
                        'value' => 3947662,
                      ),
                      34 => 
                      array (
                        'key' => 'Tan / Clear',
                        'value' => 1829661,
                      ),
                      35 => 
                      array (
                        'key' => 'White',
                        'value' => 2649,
                      ),
                      36 => 
                      array (
                        'key' => 'WHITE / CLEAR',
                        'value' => 1829676,
                      ),
                      37 => 
                      array (
                        'key' => 'Yellow',
                        'value' => 2652,
                      ),
                      38 => 
                      array (
                        'key' => 'YELLOW / BLACK',
                        'value' => 1829680,
                      ),
                      39 => 
                      array (
                        'key' => 'YELLOW / GRAY',
                        'value' => 1829679,
                      ),
                      40 => 
                      array (
                        'key' => 'Yellow / Green',
                        'value' => 1829671,
                      ),
                      41 => 
                      array (
                        'key' => 'YELLOW / STRIPE',
                        'value' => 1829681,
                      ),
                      42 => 
                      array (
                        'key' => 'YELLOW / YELLOW',
                        'value' => 1829677,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 1,
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
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Alphasyn',
                        'value' => 1829632,
                      ),
                      1 => 
                      array (
                        'key' => 'Butyl (IIR)',
                        'value' => 7654088,
                      ),
                      2 => 
                      array (
                        'key' => 'Chemituf®',
                        'value' => 3947661,
                      ),
                      3 => 
                      array (
                        'key' => 'Chemivic (NBR/PVC)',
                        'value' => 2661,
                      ),
                      4 => 
                      array (
                        'key' => 'Chlorobutyl (CIIR)',
                        'value' => 2666,
                      ),
                      5 => 
                      array (
                        'key' => 'Chloroprene (CR)',
                        'value' => 1829637,
                      ),
                      6 => 
                      array (
                        'key' => 'CPE (Chlorinated Polyethylene)',
                        'value' => 1830029,
                      ),
                      7 => 
                      array (
                        'key' => 'CR (Chloroprene)',
                        'value' => 1830027,
                      ),
                      8 => 
                      array (
                        'key' => 'EPDM Rubber',
                        'value' => 2658,
                      ),
                      9 => 
                      array (
                        'key' => 'Flosyn®',
                        'value' => 1829650,
                      ),
                      10 => 
                      array (
                        'key' => 'Fluorinated Ethylene Propylene (FEP)',
                        'value' => 1829649,
                      ),
                      11 => 
                      array (
                        'key' => 'FLUOROPLASTIC',
                        'value' => 1829654,
                      ),
                      12 => 
                      array (
                        'key' => 'Natural Rubber (NR)',
                        'value' => 5300787,
                      ),
                      13 => 
                      array (
                        'key' => 'NBR SYNTHETIC RUBBER',
                        'value' => 1829626,
                      ),
                      14 => 
                      array (
                        'key' => 'Nitrile',
                        'value' => 2660,
                      ),
                      15 => 
                      array (
                        'key' => 'Nitrile (NBR)',
                        'value' => 1829617,
                      ),
                      16 => 
                      array (
                        'key' => 'Nitrile (NBR), Fluorothermoplastic Barrier',
                        'value' => 1829636,
                      ),
                      17 => 
                      array (
                        'key' => 'NITRILE/PVC',
                        'value' => 1829657,
                      ),
                      18 => 
                      array (
                        'key' => 'Nylon',
                        'value' => 2665,
                      ),
                      19 => 
                      array (
                        'key' => 'Nylon Silicone Free',
                        'value' => 1829625,
                      ),
                      20 => 
                      array (
                        'key' => 'Oil-resistant synthetic rubber',
                        'value' => 1830035,
                      ),
                      21 => 
                      array (
                        'key' => 'PE',
                        'value' => 2670,
                      ),
                      22 => 
                      array (
                        'key' => 'Pliosyn (UHMWPE)',
                        'value' => 1829619,
                      ),
                      23 => 
                      array (
                        'key' => 'Pliosyn™ (Conductive)',
                        'value' => 11027109,
                      ),
                      24 => 
                      array (
                        'key' => 'PLIOVIC',
                        'value' => 1829630,
                      ),
                      25 => 
                      array (
                        'key' => 'POLYCHLOROPRENE',
                        'value' => 1829652,
                      ),
                      26 => 
                      array (
                        'key' => 'POLYCHLOROPRENE SYNTHETIC RUBBER',
                        'value' => 1829621,
                      ),
                      27 => 
                      array (
                        'key' => 'POLYESTER',
                        'value' => 1829648,
                      ),
                      28 => 
                      array (
                        'key' => 'Polyurethane',
                        'value' => 1829641,
                      ),
                      29 => 
                      array (
                        'key' => 'PP',
                        'value' => 2671,
                      ),
                      30 => 
                      array (
                        'key' => 'PTFE (POLYTETRAFLUOROETHYLENE)',
                        'value' => 1829631,
                      ),
                      31 => 
                      array (
                        'key' => 'Pureten™',
                        'value' => 1829627,
                      ),
                      32 => 
                      array (
                        'key' => 'PVC',
                        'value' => 2667,
                      ),
                      33 => 
                      array (
                        'key' => 'Pyrosyn®',
                        'value' => 1829616,
                      ),
                      34 => 
                      array (
                        'key' => 'Recycled TPV (Thermoplastic Vulcanizate)',
                        'value' => 6949791,
                      ),
                      35 => 
                      array (
                        'key' => 'SBR',
                        'value' => 2659,
                      ),
                      36 => 
                      array (
                        'key' => 'SBR SYNTHETIC RUBBER',
                        'value' => 1829620,
                      ),
                      37 => 
                      array (
                        'key' => 'SBR/EPDM',
                        'value' => 1829656,
                      ),
                      38 => 
                      array (
                        'key' => 'Special Transparent Plastomer Coating',
                        'value' => 5580055,
                      ),
                      39 => 
                      array (
                        'key' => 'Speclar (XLPE)',
                        'value' => 1829634,
                      ),
                      40 => 
                      array (
                        'key' => 'Sugar Cain Based EPDM',
                        'value' => 3831422,
                      ),
                      41 => 
                      array (
                        'key' => 'Super Thermo-Flo EPDM',
                        'value' => 1829635,
                      ),
                      42 => 
                      array (
                        'key' => 'Survivor®',
                        'value' => 1829644,
                      ),
                      43 => 
                      array (
                        'key' => 'Synthetic Rubber',
                        'value' => 2664,
                      ),
                      44 => 
                      array (
                        'key' => 'Teflon',
                        'value' => 1829628,
                      ),
                      45 => 
                      array (
                        'key' => 'Thermoplastic',
                        'value' => 1829639,
                      ),
                      46 => 
                      array (
                        'key' => 'Thermoplastic Alloyed Blend of Polyurethane and PVC',
                        'value' => 10706730,
                      ),
                      47 => 
                      array (
                        'key' => 'TPE',
                        'value' => 1829629,
                      ),
                      48 => 
                      array (
                        'key' => 'TPU',
                        'value' => 2669,
                      ),
                      49 => 
                      array (
                        'key' => 'TPV',
                        'value' => 2668,
                      ),
                      50 => 
                      array (
                        'key' => 'TRANSPARENT PLASTOMER',
                        'value' => 1829653,
                      ),
                      51 => 
                      array (
                        'key' => 'Tufsyn Synthetic Rubber',
                        'value' => 1829618,
                      ),
                      52 => 
                      array (
                        'key' => 'UHMWPE',
                        'value' => 1829645,
                      ),
                      53 => 
                      array (
                        'key' => 'UHMWPE RUBBER',
                        'value' => 1829646,
                      ),
                      54 => 
                      array (
                        'key' => 'UPE LINER',
                        'value' => 1829655,
                      ),
                      55 => 
                      array (
                        'key' => 'Urethane',
                        'value' => 1829640,
                      ),
                      56 => 
                      array (
                        'key' => 'Weatherex',
                        'value' => 7563317,
                      ),
                      57 => 
                      array (
                        'key' => 'White Nitrile (NBR) FDA Compliant',
                        'value' => 12392827,
                      ),
                      58 => 
                      array (
                        'key' => 'WINGPRENE SYNTHETIC RUBBER',
                        'value' => 1829638,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 1,
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
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => ' DIN 20023 4SH',
                        'value' => 3015,
                      ),
                      1 => 
                      array (
                        'key' => ' DIN 20023 4SP',
                        'value' => 3016,
                      ),
                      2 => 
                      array (
                        'key' => ' EN 853',
                        'value' => 3017,
                      ),
                      3 => 
                      array (
                        'key' => ' EN 853 1SN',
                        'value' => 3018,
                      ),
                      4 => 
                      array (
                        'key' => ' EN 853 2SN',
                        'value' => 3019,
                      ),
                      5 => 
                      array (
                        'key' => ' EN 854 R3',
                        'value' => 3020,
                      ),
                      6 => 
                      array (
                        'key' => ' EN 854 R6',
                        'value' => 3021,
                      ),
                      7 => 
                      array (
                        'key' => ' EN 855 R8',
                        'value' => 3022,
                      ),
                      8 => 
                      array (
                        'key' => ' EN 857 R7',
                        'value' => 3028,
                      ),
                      9 => 
                      array (
                        'key' => ' FDA 21 CFR 177',
                        'value' => 3029,
                      ),
                      10 => 
                      array (
                        'key' => '100 microamps/ft. at 75 KV',
                        'value' => 3030,
                      ),
                      11 => 
                      array (
                        'key' => '1500 Specifications',
                        'value' => 3031,
                      ),
                      12 => 
                      array (
                        'key' => '3-A 18-03 CERTIFIED',
                        'value' => 3032,
                      ),
                      13 => 
                      array (
                        'key' => '3-A COMPLIANT',
                        'value' => 3033,
                      ),
                      14 => 
                      array (
                        'key' => 'ARPM CLASS A (HIGH OIL RESISTANCE)',
                        'value' => 3034,
                      ),
                      15 => 
                      array (
                        'key' => 'ARPM CLASS B (MEDIUM OIL RESISTANCE)',
                        'value' => 3035,
                      ),
                      16 => 
                      array (
                        'key' => 'ARPM CLASS C (LIMITED OIL RESISTANCE)',
                        'value' => 3036,
                      ),
                      17 => 
                      array (
                        'key' => 'ARPM GRADE R WELDING HOSE',
                        'value' => 3037,
                      ),
                      18 => 
                      array (
                        'key' => 'ARPM GRADE RM WELDING HOSE',
                        'value' => 3038,
                      ),
                      19 => 
                      array (
                        'key' => 'ARPM GRADE T WELDING HOSE',
                        'value' => 3039,
                      ),
                      20 => 
                      array (
                        'key' => 'CARB',
                        'value' => 3040,
                      ),
                      21 => 
                      array (
                        'key' => 'CGA E-1',
                        'value' => 3041,
                      ),
                      22 => 
                      array (
                        'key' => 'CNH FZG20305',
                        'value' => 3042,
                      ),
                      23 => 
                      array (
                        'key' => 'CSA 8.1-M86',
                        'value' => 3043,
                      ),
                      24 => 
                      array (
                        'key' => 'DIN 74310',
                        'value' => 3044,
                      ),
                      25 => 
                      array (
                        'key' => 'DOT FMVSS 106 Type (AII)',
                        'value' => 3045,
                      ),
                      26 => 
                      array (
                        'key' => 'EN 856 4SH',
                        'value' => 3023,
                      ),
                      27 => 
                      array (
                        'key' => 'EN 856 4SP',
                        'value' => 3024,
                      ),
                      28 => 
                      array (
                        'key' => 'EN 856 R12',
                        'value' => 3025,
                      ),
                      29 => 
                      array (
                        'key' => 'EN 856 R13',
                        'value' => 3026,
                      ),
                      30 => 
                      array (
                        'key' => 'EN 857 2SC',
                        'value' => 3027,
                      ),
                      31 => 
                      array (
                        'key' => 'FDA/USDA CERTIFIED',
                        'value' => 3046,
                      ),
                      32 => 
                      array (
                        'key' => 'FDA/USDA COMPLIANT',
                        'value' => 3047,
                      ),
                      33 => 
                      array (
                        'key' => 'FMVSS106 49 CFR 571 106',
                        'value' => 3048,
                      ),
                      34 => 
                      array (
                        'key' => 'GM 6278M',
                        'value' => 3049,
                      ),
                      35 => 
                      array (
                        'key' => 'ISO 11237',
                        'value' => 3050,
                      ),
                      36 => 
                      array (
                        'key' => 'ISO3821',
                        'value' => 3051,
                      ),
                      37 => 
                      array (
                        'key' => 'ISO7840',
                        'value' => 2952,
                      ),
                      38 => 
                      array (
                        'key' => 'ISO8031',
                        'value' => 2953,
                      ),
                      39 => 
                      array (
                        'key' => 'MIL -AA59565',
                        'value' => 2954,
                      ),
                      40 => 
                      array (
                        'key' => 'MIL-370',
                        'value' => 2955,
                      ),
                      41 => 
                      array (
                        'key' => 'MIL-DTL-13444H Type I',
                        'value' => 2956,
                      ),
                      42 => 
                      array (
                        'key' => 'MIL-DTL-13444H Type III',
                        'value' => 2957,
                      ),
                      43 => 
                      array (
                        'key' => 'MIL-DTL-13531 Type II Class A',
                        'value' => 2958,
                      ),
                      44 => 
                      array (
                        'key' => 'MIL-DTL-20176G',
                        'value' => 2959,
                      ),
                      45 => 
                      array (
                        'key' => 'MIL-DTL-29210E',
                        'value' => 2960,
                      ),
                      46 => 
                      array (
                        'key' => 'MIL-DTL-39921',
                        'value' => 2961,
                      ),
                      47 => 
                      array (
                        'key' => 'MIL-DTL-8788',
                        'value' => 2962,
                      ),
                      48 => 
                      array (
                        'key' => 'MPAPS F-30',
                        'value' => 2963,
                      ),
                      49 => 
                      array (
                        'key' => 'MPAPS F-6032',
                        'value' => 2964,
                      ),
                      50 => 
                      array (
                        'key' => 'MPAPS F-6042',
                        'value' => 2965,
                      ),
                      51 => 
                      array (
                        'key' => 'MS-EA122',
                        'value' => 2966,
                      ),
                      52 => 
                      array (
                        'key' => 'MSHA 2G',
                        'value' => 2967,
                      ),
                      53 => 
                      array (
                        'key' => 'MSHA FLAME RESISTANT',
                        'value' => 2968,
                      ),
                      54 => 
                      array (
                        'key' => 'NIOSH',
                        'value' => 2969,
                      ),
                      55 => 
                      array (
                        'key' => 'NMMA',
                        'value' => 2970,
                      ),
                      56 => 
                      array (
                        'key' => 'NSF-61',
                        'value' => 2971,
                      ),
                      57 => 
                      array (
                        'key' => 'PLEWS RETAIL AIR HOSE',
                        'value' => 2972,
                      ),
                      58 => 
                      array (
                        'key' => 'SAE 100R12',
                        'value' => 2973,
                      ),
                      59 => 
                      array (
                        'key' => 'SAE 100R13',
                        'value' => 2974,
                      ),
                      60 => 
                      array (
                        'key' => 'SAE 100R14A',
                        'value' => 2975,
                      ),
                      61 => 
                      array (
                        'key' => 'SAE 100R15',
                        'value' => 2976,
                      ),
                      62 => 
                      array (
                        'key' => 'SAE 100R16',
                        'value' => 2977,
                      ),
                      63 => 
                      array (
                        'key' => 'SAE 100R17',
                        'value' => 2978,
                      ),
                      64 => 
                      array (
                        'key' => 'SAE 100R18',
                        'value' => 2979,
                      ),
                      65 => 
                      array (
                        'key' => 'SAE 100R19',
                        'value' => 2980,
                      ),
                      66 => 
                      array (
                        'key' => 'SAE 100R1AT',
                        'value' => 2981,
                      ),
                      67 => 
                      array (
                        'key' => 'SAE 100R2AT',
                        'value' => 2982,
                      ),
                      68 => 
                      array (
                        'key' => 'SAE 100R3',
                        'value' => 2983,
                      ),
                      69 => 
                      array (
                        'key' => 'SAE 100R4',
                        'value' => 2984,
                      ),
                      70 => 
                      array (
                        'key' => 'SAE 100R4AT',
                        'value' => 2985,
                      ),
                      71 => 
                      array (
                        'key' => 'SAE 100R5',
                        'value' => 2986,
                      ),
                      72 => 
                      array (
                        'key' => 'SAE 100R6',
                        'value' => 2987,
                      ),
                      73 => 
                      array (
                        'key' => 'SAE 100R7',
                        'value' => 2988,
                      ),
                      74 => 
                      array (
                        'key' => 'SAE 100R8',
                        'value' => 2989,
                      ),
                      75 => 
                      array (
                        'key' => 'SAE 1684',
                        'value' => 2990,
                      ),
                      76 => 
                      array (
                        'key' => 'SAE J1037',
                        'value' => 2991,
                      ),
                      77 => 
                      array (
                        'key' => 'SAE J1402',
                        'value' => 2992,
                      ),
                      78 => 
                      array (
                        'key' => 'SAE J1402 Type (AII)',
                        'value' => 2993,
                      ),
                      79 => 
                      array (
                        'key' => 'SAE J1403',
                        'value' => 2994,
                      ),
                      80 => 
                      array (
                        'key' => 'SAE J1527',
                        'value' => 2995,
                      ),
                      81 => 
                      array (
                        'key' => 'SAE J189',
                        'value' => 2996,
                      ),
                      82 => 
                      array (
                        'key' => 'SAE J1942 / U.S. Coast Guard',
                        'value' => 2997,
                      ),
                      83 => 
                      array (
                        'key' => 'SAE J20',
                        'value' => 2998,
                      ),
                      84 => 
                      array (
                        'key' => 'SAE J2064 Type C, Class I',
                        'value' => 2999,
                      ),
                      85 => 
                      array (
                        'key' => 'SAE J2064 Type C, Class II',
                        'value' => 3000,
                      ),
                      86 => 
                      array (
                        'key' => 'SAE J2076',
                        'value' => 3001,
                      ),
                      87 => 
                      array (
                        'key' => 'SAE J20R3 D1',
                        'value' => 3002,
                      ),
                      88 => 
                      array (
                        'key' => 'SAE J20R3 D2',
                        'value' => 3003,
                      ),
                      89 => 
                      array (
                        'key' => 'SAE J20R3 D3 HT EC',
                        'value' => 3004,
                      ),
                      90 => 
                      array (
                        'key' => 'SAE J30',
                        'value' => 3005,
                      ),
                      91 => 
                      array (
                        'key' => 'SAE J30 R6',
                        'value' => 3006,
                      ),
                      92 => 
                      array (
                        'key' => 'SAE J30 R7',
                        'value' => 3007,
                      ),
                      93 => 
                      array (
                        'key' => 'UL 21',
                        'value' => 3008,
                      ),
                      94 => 
                      array (
                        'key' => 'UL 330',
                        'value' => 3009,
                      ),
                      95 => 
                      array (
                        'key' => 'UL 92',
                        'value' => 3010,
                      ),
                      96 => 
                      array (
                        'key' => 'UL 94 HB',
                        'value' => 3011,
                      ),
                      97 => 
                      array (
                        'key' => 'UL330A',
                        'value' => 3012,
                      ),
                      98 => 
                      array (
                        'key' => 'UL330B',
                        'value' => 3013,
                      ),
                      99 => 
                      array (
                        'key' => 'WSE-M96D34',
                        'value' => 3014,
                      ),
                    ),
                     'width' => 300,
                     'height' => 180,
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
                  7 => 
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
                  8 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 300,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 150,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'sixDigitVirtualCatalogDescription',
                     'title' => 'Six Digit Virtual Catalog Description',
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
                  9 => 
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
                  11 => 
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
                        'key' => ' EN 857 R7',
                        'value' => 2792,
                      ),
                      9 => 
                      array (
                        'key' => ' FDA 21 CFR 177',
                        'value' => 2793,
                      ),
                      10 => 
                      array (
                        'key' => '100 microamps/ft. at 75 KV',
                        'value' => 2794,
                      ),
                      11 => 
                      array (
                        'key' => '1500 Specifications',
                        'value' => 2795,
                      ),
                      12 => 
                      array (
                        'key' => '3-A 18-03 CERTIFIED',
                        'value' => 2796,
                      ),
                      13 => 
                      array (
                        'key' => '3-A COMPLIANT',
                        'value' => 2797,
                      ),
                      14 => 
                      array (
                        'key' => 'ARPM CLASS A (HIGH OIL RESISTANCE)',
                        'value' => 2798,
                      ),
                      15 => 
                      array (
                        'key' => 'ARPM CLASS B (MEDIUM OIL RESISTANCE)',
                        'value' => 2799,
                      ),
                      16 => 
                      array (
                        'key' => 'ARPM CLASS C (LIMITED OIL RESISTANCE)',
                        'value' => 2800,
                      ),
                      17 => 
                      array (
                        'key' => 'ARPM GRADE R WELDING HOSE',
                        'value' => 2801,
                      ),
                      18 => 
                      array (
                        'key' => 'ARPM GRADE RM WELDING HOSE',
                        'value' => 2802,
                      ),
                      19 => 
                      array (
                        'key' => 'ARPM GRADE T WELDING HOSE',
                        'value' => 2803,
                      ),
                      20 => 
                      array (
                        'key' => 'BCS-174 Working Pressures & Impulse Requirements',
                        'value' => 12472323,
                      ),
                      21 => 
                      array (
                        'key' => 'CARB',
                        'value' => 2804,
                      ),
                      22 => 
                      array (
                        'key' => 'CGA E-1',
                        'value' => 2805,
                      ),
                      23 => 
                      array (
                        'key' => 'CNH FZG20305',
                        'value' => 2806,
                      ),
                      24 => 
                      array (
                        'key' => 'Continental Proprietary Standard',
                        'value' => 12472321,
                      ),
                      25 => 
                      array (
                        'key' => 'CSA 8.1-M86',
                        'value' => 2807,
                      ),
                      26 => 
                      array (
                        'key' => 'DIN 74310',
                        'value' => 2808,
                      ),
                      27 => 
                      array (
                        'key' => 'DOT FMVSS 106 Type (AII)',
                        'value' => 2809,
                      ),
                      28 => 
                      array (
                        'key' => 'EN 856 4SH',
                        'value' => 2787,
                      ),
                      29 => 
                      array (
                        'key' => 'EN 856 4SP',
                        'value' => 2788,
                      ),
                      30 => 
                      array (
                        'key' => 'EN 856 R12',
                        'value' => 2789,
                      ),
                      31 => 
                      array (
                        'key' => 'EN 856 R13',
                        'value' => 2790,
                      ),
                      32 => 
                      array (
                        'key' => 'EN 857 2SC',
                        'value' => 2791,
                      ),
                      33 => 
                      array (
                        'key' => 'FDA/USDA CERTIFIED',
                        'value' => 2810,
                      ),
                      34 => 
                      array (
                        'key' => 'FDA/USDA COMPLIANT',
                        'value' => 2811,
                      ),
                      35 => 
                      array (
                        'key' => 'FMVSS106 49 CFR 571 106',
                        'value' => 2812,
                      ),
                      36 => 
                      array (
                        'key' => 'GM 6278M',
                        'value' => 2813,
                      ),
                      37 => 
                      array (
                        'key' => 'ISO 11237',
                        'value' => 2814,
                      ),
                      38 => 
                      array (
                        'key' => 'ISO3821',
                        'value' => 2815,
                      ),
                      39 => 
                      array (
                        'key' => 'ISO7840',
                        'value' => 2816,
                      ),
                      40 => 
                      array (
                        'key' => 'ISO8031',
                        'value' => 2817,
                      ),
                      41 => 
                      array (
                        'key' => 'MIL -AA59565',
                        'value' => 2818,
                      ),
                      42 => 
                      array (
                        'key' => 'MIL-370',
                        'value' => 2819,
                      ),
                      43 => 
                      array (
                        'key' => 'MIL-DTL-13444H Type I',
                        'value' => 2820,
                      ),
                      44 => 
                      array (
                        'key' => 'MIL-DTL-13444H Type III',
                        'value' => 2821,
                      ),
                      45 => 
                      array (
                        'key' => 'MIL-DTL-13531 Type II Class A',
                        'value' => 2822,
                      ),
                      46 => 
                      array (
                        'key' => 'MIL-DTL-20176G',
                        'value' => 2823,
                      ),
                      47 => 
                      array (
                        'key' => 'MIL-DTL-29210E',
                        'value' => 2824,
                      ),
                      48 => 
                      array (
                        'key' => 'MIL-DTL-39921',
                        'value' => 2825,
                      ),
                      49 => 
                      array (
                        'key' => 'MIL-DTL-8788',
                        'value' => 2826,
                      ),
                      50 => 
                      array (
                        'key' => 'MPAPS F-30',
                        'value' => 2827,
                      ),
                      51 => 
                      array (
                        'key' => 'MPAPS F-6032',
                        'value' => 2828,
                      ),
                      52 => 
                      array (
                        'key' => 'MPAPS F-6042',
                        'value' => 2829,
                      ),
                      53 => 
                      array (
                        'key' => 'MS-EA122',
                        'value' => 2830,
                      ),
                      54 => 
                      array (
                        'key' => 'MSHA 2G',
                        'value' => 2831,
                      ),
                      55 => 
                      array (
                        'key' => 'MSHA FLAME RESISTANT',
                        'value' => 2832,
                      ),
                      56 => 
                      array (
                        'key' => 'NIOSH',
                        'value' => 2833,
                      ),
                      57 => 
                      array (
                        'key' => 'NMMA',
                        'value' => 2834,
                      ),
                      58 => 
                      array (
                        'key' => 'NSF-61',
                        'value' => 2835,
                      ),
                      59 => 
                      array (
                        'key' => 'PLEWS RETAIL AIR HOSE',
                        'value' => 2836,
                      ),
                      60 => 
                      array (
                        'key' => 'SAE 100R12',
                        'value' => 2837,
                      ),
                      61 => 
                      array (
                        'key' => 'SAE 100R13',
                        'value' => 2838,
                      ),
                      62 => 
                      array (
                        'key' => 'SAE 100R14A',
                        'value' => 2839,
                      ),
                      63 => 
                      array (
                        'key' => 'SAE 100R15',
                        'value' => 2840,
                      ),
                      64 => 
                      array (
                        'key' => 'SAE 100R16',
                        'value' => 2841,
                      ),
                      65 => 
                      array (
                        'key' => 'SAE 100R17',
                        'value' => 2842,
                      ),
                      66 => 
                      array (
                        'key' => 'SAE 100R18',
                        'value' => 2843,
                      ),
                      67 => 
                      array (
                        'key' => 'SAE 100R19',
                        'value' => 2844,
                      ),
                      68 => 
                      array (
                        'key' => 'SAE 100R1AT',
                        'value' => 2845,
                      ),
                      69 => 
                      array (
                        'key' => 'SAE 100R2AT',
                        'value' => 2846,
                      ),
                      70 => 
                      array (
                        'key' => 'SAE 100R3',
                        'value' => 2847,
                      ),
                      71 => 
                      array (
                        'key' => 'SAE 100R4',
                        'value' => 2848,
                      ),
                      72 => 
                      array (
                        'key' => 'SAE 100R4AT',
                        'value' => 2849,
                      ),
                      73 => 
                      array (
                        'key' => 'SAE 100R5',
                        'value' => 2850,
                      ),
                      74 => 
                      array (
                        'key' => 'SAE 100R6',
                        'value' => 2851,
                      ),
                      75 => 
                      array (
                        'key' => 'SAE 100R7',
                        'value' => 2852,
                      ),
                      76 => 
                      array (
                        'key' => 'SAE 100R8',
                        'value' => 2853,
                      ),
                      77 => 
                      array (
                        'key' => 'SAE 1684',
                        'value' => 2854,
                      ),
                      78 => 
                      array (
                        'key' => 'SAE J1037',
                        'value' => 2855,
                      ),
                      79 => 
                      array (
                        'key' => 'SAE J1402',
                        'value' => 2856,
                      ),
                      80 => 
                      array (
                        'key' => 'SAE J1402 Type (AII)',
                        'value' => 2857,
                      ),
                      81 => 
                      array (
                        'key' => 'SAE J1403',
                        'value' => 2858,
                      ),
                      82 => 
                      array (
                        'key' => 'SAE J1527',
                        'value' => 2859,
                      ),
                      83 => 
                      array (
                        'key' => 'SAE J189',
                        'value' => 2860,
                      ),
                      84 => 
                      array (
                        'key' => 'SAE J1942 / U.S. Coast Guard',
                        'value' => 2861,
                      ),
                      85 => 
                      array (
                        'key' => 'SAE J20',
                        'value' => 2862,
                      ),
                      86 => 
                      array (
                        'key' => 'SAE J2064 Type C, Class I',
                        'value' => 2863,
                      ),
                      87 => 
                      array (
                        'key' => 'SAE J2064 Type C, Class II',
                        'value' => 2864,
                      ),
                      88 => 
                      array (
                        'key' => 'SAE J2076',
                        'value' => 2865,
                      ),
                      89 => 
                      array (
                        'key' => 'SAE J20R3 D1',
                        'value' => 2866,
                      ),
                      90 => 
                      array (
                        'key' => 'SAE J20R3 D2',
                        'value' => 2867,
                      ),
                      91 => 
                      array (
                        'key' => 'SAE J20R3 D3 HT EC',
                        'value' => 2868,
                      ),
                      92 => 
                      array (
                        'key' => 'SAE J30',
                        'value' => 2869,
                      ),
                      93 => 
                      array (
                        'key' => 'SAE J30 R6',
                        'value' => 2870,
                      ),
                      94 => 
                      array (
                        'key' => 'SAE J30 R7',
                        'value' => 2871,
                      ),
                      95 => 
                      array (
                        'key' => 'UL 21',
                        'value' => 2872,
                      ),
                      96 => 
                      array (
                        'key' => 'UL 330',
                        'value' => 2873,
                      ),
                      97 => 
                      array (
                        'key' => 'UL 92',
                        'value' => 2874,
                      ),
                      98 => 
                      array (
                        'key' => 'UL 94 HB',
                        'value' => 2875,
                      ),
                      99 => 
                      array (
                        'key' => 'UL330A',
                        'value' => 2876,
                      ),
                      100 => 
                      array (
                        'key' => 'UL330B',
                        'value' => 2877,
                      ),
                      101 => 
                      array (
                        'key' => 'WSE-M96D34',
                        'value' => 2878,
                      ),
                    ),
                     'width' => 300,
                     'height' => 180,
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
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  12 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Aggregate',
                        'value' => 5887032,
                      ),
                      1 => 
                      array (
                        'key' => 'Agriculture',
                        'value' => 6951286,
                      ),
                      2 => 
                      array (
                        'key' => 'Aircraft Refueling',
                        'value' => 6951287,
                      ),
                      3 => 
                      array (
                        'key' => 'Auto / Truck Manufacturing',
                        'value' => 6951288,
                      ),
                      4 => 
                      array (
                        'key' => 'Beverage',
                        'value' => 6951289,
                      ),
                      5 => 
                      array (
                        'key' => 'Bulk Transport',
                        'value' => 6951290,
                      ),
                      6 => 
                      array (
                        'key' => 'Chemical',
                        'value' => 6951291,
                      ),
                      7 => 
                      array (
                        'key' => 'Cleaning',
                        'value' => 6951292,
                      ),
                      8 => 
                      array (
                        'key' => 'Computer Microchip',
                        'value' => 6951293,
                      ),
                      9 => 
                      array (
                        'key' => 'Construction',
                        'value' => 6951294,
                      ),
                      10 => 
                      array (
                        'key' => 'Contractors / Rental Houses',
                        'value' => 6951295,
                      ),
                      11 => 
                      array (
                        'key' => 'Food Processing',
                        'value' => 6951296,
                      ),
                      12 => 
                      array (
                        'key' => 'Food Transport',
                        'value' => 6951297,
                      ),
                      13 => 
                      array (
                        'key' => 'Forest Products',
                        'value' => 7947958,
                      ),
                      14 => 
                      array (
                        'key' => 'Fuel Dispensing',
                        'value' => 6951298,
                      ),
                      15 => 
                      array (
                        'key' => 'General Trade - Manufacturing',
                        'value' => 6951299,
                      ),
                      16 => 
                      array (
                        'key' => 'IFS',
                        'value' => 1840105,
                      ),
                      17 => 
                      array (
                        'key' => 'Industrial Machinery',
                        'value' => 6951300,
                      ),
                      18 => 
                      array (
                        'key' => 'Lawn and Garden',
                        'value' => 6951301,
                      ),
                      19 => 
                      array (
                        'key' => 'Marine',
                        'value' => 6951302,
                      ),
                      20 => 
                      array (
                        'key' => 'Metal Processing',
                        'value' => 6951303,
                      ),
                      21 => 
                      array (
                        'key' => 'Mining',
                        'value' => 6951304,
                      ),
                      22 => 
                      array (
                        'key' => 'Oil and Gas',
                        'value' => 6951305,
                      ),
                      23 => 
                      array (
                        'key' => 'Petrochem',
                        'value' => 6951306,
                      ),
                      24 => 
                      array (
                        'key' => 'Pharmaceutical and Cosmetics',
                        'value' => 6951307,
                      ),
                      25 => 
                      array (
                        'key' => 'Refinery',
                        'value' => 6951308,
                      ),
                      26 => 
                      array (
                        'key' => 'Service Industries',
                        'value' => 6951309,
                      ),
                      27 => 
                      array (
                        'key' => 'Textile',
                        'value' => 6951310,
                      ),
                      28 => 
                      array (
                        'key' => 'Transportation Equipment',
                        'value' => 13754847,
                      ),
                      29 => 
                      array (
                        'key' => 'Utilities and Communication',
                        'value' => 6951311,
                      ),
                      30 => 
                      array (
                        'key' => 'Warehouse Transport Logistics',
                        'value' => 6951312,
                      ),
                      31 => 
                      array (
                        'key' => 'Waste Water Treatment',
                        'value' => 6951313,
                      ),
                      32 => 
                      array (
                        'key' => 'Wine',
                        'value' => 8645024,
                      ),
                      33 => 
                      array (
                        'key' => 'Wood Processing',
                        'value' => 6951314,
                      ),
                    ),
                     'width' => 300,
                     'height' => 250,
                     'maxItems' => 20,
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\ApplicationOptionsProvider',
                     'optionsProviderData' => 'IFS',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'IFSApplications',
                     'title' => 'Applications',
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
                        'key' => 'Corrugated',
                        'value' => 2673,
                      ),
                      1 => 
                      array (
                        'key' => 'Corrugated / Smooth',
                        'value' => 10810636,
                      ),
                      2 => 
                      array (
                        'key' => 'Futurin™',
                        'value' => 1831329,
                      ),
                      3 => 
                      array (
                        'key' => 'Ribbed',
                        'value' => 2674,
                      ),
                      4 => 
                      array (
                        'key' => 'Smooth',
                        'value' => 2675,
                      ),
                      5 => 
                      array (
                        'key' => 'UHMWPE Film',
                        'value' => 1831330,
                      ),
                      6 => 
                      array (
                        'key' => 'Wire Braid',
                        'value' => 10663606,
                      ),
                      7 => 
                      array (
                        'key' => 'Wrapped',
                        'value' => 2676,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 1,
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
                        'key' => 'Black / Blue',
                        'value' => 1829614,
                      ),
                      2 => 
                      array (
                        'key' => 'Black / Blue Helix',
                        'value' => 10731038,
                      ),
                      3 => 
                      array (
                        'key' => 'Black / Brown',
                        'value' => 1829613,
                      ),
                      4 => 
                      array (
                        'key' => 'Black / Clear',
                        'value' => 1829600,
                      ),
                      5 => 
                      array (
                        'key' => 'Black / Double Orange Helix',
                        'value' => 10810635,
                      ),
                      6 => 
                      array (
                        'key' => 'Black / Green',
                        'value' => 1829594,
                      ),
                      7 => 
                      array (
                        'key' => 'Black / Green Helix',
                        'value' => 10731037,
                      ),
                      8 => 
                      array (
                        'key' => 'Black / Orange',
                        'value' => 1829591,
                      ),
                      9 => 
                      array (
                        'key' => 'Black / Orange & Green Helix',
                        'value' => 10810634,
                      ),
                      10 => 
                      array (
                        'key' => 'Black / Red',
                        'value' => 7841025,
                      ),
                      11 => 
                      array (
                        'key' => 'Black / Red Helix',
                        'value' => 10737256,
                      ),
                      12 => 
                      array (
                        'key' => 'Black / Yellow',
                        'value' => 1829563,
                      ),
                      13 => 
                      array (
                        'key' => 'Black / Yellow Helix',
                        'value' => 10731039,
                      ),
                      14 => 
                      array (
                        'key' => 'Blue',
                        'value' => 2602,
                      ),
                      15 => 
                      array (
                        'key' => 'Blue / Black',
                        'value' => 7186055,
                      ),
                      16 => 
                      array (
                        'key' => 'Blue / Blue',
                        'value' => 3913767,
                      ),
                      17 => 
                      array (
                        'key' => 'Blue / Orange',
                        'value' => 7839531,
                      ),
                      18 => 
                      array (
                        'key' => 'Brick Red',
                        'value' => 2604,
                      ),
                      19 => 
                      array (
                        'key' => 'Brown',
                        'value' => 2607,
                      ),
                      20 => 
                      array (
                        'key' => 'Brown / Blue',
                        'value' => 1829601,
                      ),
                      21 => 
                      array (
                        'key' => 'Clear',
                        'value' => 2611,
                      ),
                      22 => 
                      array (
                        'key' => 'Clear / Black',
                        'value' => 1829554,
                      ),
                      23 => 
                      array (
                        'key' => 'Clear / Blue',
                        'value' => 1829593,
                      ),
                      24 => 
                      array (
                        'key' => 'Clear / Clear',
                        'value' => 1829610,
                      ),
                      25 => 
                      array (
                        'key' => 'Clear / Gray',
                        'value' => 5550462,
                      ),
                      26 => 
                      array (
                        'key' => 'Clear / Orange',
                        'value' => 1829599,
                      ),
                      27 => 
                      array (
                        'key' => 'Clear / White',
                        'value' => 1829589,
                      ),
                      28 => 
                      array (
                        'key' => 'Clear / Yellow',
                        'value' => 14003005,
                      ),
                      29 => 
                      array (
                        'key' => 'Dark Green',
                        'value' => 2606,
                      ),
                      30 => 
                      array (
                        'key' => 'Gold',
                        'value' => 1829450,
                      ),
                      31 => 
                      array (
                        'key' => 'Gray',
                        'value' => 2601,
                      ),
                      32 => 
                      array (
                        'key' => 'Gray / Clear',
                        'value' => 1829609,
                      ),
                      33 => 
                      array (
                        'key' => 'Gray / Green',
                        'value' => 5356964,
                      ),
                      34 => 
                      array (
                        'key' => 'Gray / Orange',
                        'value' => 5356963,
                      ),
                      35 => 
                      array (
                        'key' => 'Green',
                        'value' => 2605,
                      ),
                      36 => 
                      array (
                        'key' => 'Green / Black',
                        'value' => 1829588,
                      ),
                      37 => 
                      array (
                        'key' => 'Green / Blue',
                        'value' => 1829604,
                      ),
                      38 => 
                      array (
                        'key' => 'Green / Clear',
                        'value' => 1829598,
                      ),
                      39 => 
                      array (
                        'key' => 'Green / Yellow',
                        'value' => 3946849,
                      ),
                      40 => 
                      array (
                        'key' => 'Lime',
                        'value' => 1829452,
                      ),
                      41 => 
                      array (
                        'key' => 'Orange',
                        'value' => 2609,
                      ),
                      42 => 
                      array (
                        'key' => 'Orange / Clear',
                        'value' => 1829596,
                      ),
                      43 => 
                      array (
                        'key' => 'Orange / Red',
                        'value' => 1829612,
                      ),
                      44 => 
                      array (
                        'key' => 'Pink',
                        'value' => 1830034,
                      ),
                      45 => 
                      array (
                        'key' => 'Purple',
                        'value' => 2608,
                      ),
                      46 => 
                      array (
                        'key' => 'Red',
                        'value' => 2603,
                      ),
                      47 => 
                      array (
                        'key' => 'Red / Black',
                        'value' => 3913768,
                      ),
                      48 => 
                      array (
                        'key' => 'Red / Clear',
                        'value' => 1829586,
                      ),
                      49 => 
                      array (
                        'key' => 'Red / Green',
                        'value' => 1829595,
                      ),
                      50 => 
                      array (
                        'key' => 'Red / Orange',
                        'value' => 1829553,
                      ),
                      51 => 
                      array (
                        'key' => 'Red / Yellow',
                        'value' => 1829590,
                      ),
                      52 => 
                      array (
                        'key' => 'Sand',
                        'value' => 1829451,
                      ),
                      53 => 
                      array (
                        'key' => 'Sand / Lime',
                        'value' => 1829592,
                      ),
                      54 => 
                      array (
                        'key' => 'Tan',
                        'value' => 1829444,
                      ),
                      55 => 
                      array (
                        'key' => 'Tan / Clear',
                        'value' => 1829587,
                      ),
                      56 => 
                      array (
                        'key' => 'White',
                        'value' => 2600,
                      ),
                      57 => 
                      array (
                        'key' => 'White / Clear',
                        'value' => 1829602,
                      ),
                      58 => 
                      array (
                        'key' => 'Yellow',
                        'value' => 2610,
                      ),
                      59 => 
                      array (
                        'key' => 'Yellow / Black',
                        'value' => 1829606,
                      ),
                      60 => 
                      array (
                        'key' => 'Yellow / Gray',
                        'value' => 1829605,
                      ),
                      61 => 
                      array (
                        'key' => 'Yellow / Green',
                        'value' => 1829597,
                      ),
                      62 => 
                      array (
                        'key' => 'Yellow / Green Helix',
                        'value' => 5288866,
                      ),
                      63 => 
                      array (
                        'key' => 'Yellow / Orange Helix',
                        'value' => 11039027,
                      ),
                      64 => 
                      array (
                        'key' => 'Yellow / Stripe',
                        'value' => 1829607,
                      ),
                      65 => 
                      array (
                        'key' => 'Yellow / Yellow',
                        'value' => 1829603,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 1,
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
                        'key' => '304 Stainless Steel Wire Braid',
                        'value' => 1829469,
                      ),
                      1 => 
                      array (
                        'key' => 'ARC Synthetic Rubber',
                        'value' => 1829458,
                      ),
                      2 => 
                      array (
                        'key' => 'Black',
                        'value' => 1831327,
                      ),
                      3 => 
                      array (
                        'key' => 'Carboxylated nitrile (XNBR)',
                        'value' => 2622,
                      ),
                      4 => 
                      array (
                        'key' => 'Carbryn™',
                        'value' => 2623,
                      ),
                      5 => 
                      array (
                        'key' => 'Carbryn™ with Microban',
                        'value' => 12392828,
                      ),
                      6 => 
                      array (
                        'key' => 'Chemivic (NBR/PVC)',
                        'value' => 2616,
                      ),
                      7 => 
                      array (
                        'key' => 'Chemivic (NBR/PVC); w/ Microban',
                        'value' => 5288867,
                      ),
                      8 => 
                      array (
                        'key' => 'Chlorinated Polyethylene',
                        'value' => 1830031,
                      ),
                      9 => 
                      array (
                        'key' => 'Chlorobutyl (CIIR)',
                        'value' => 1829487,
                      ),
                      10 => 
                      array (
                        'key' => 'Chloroprene (CR)',
                        'value' => 2618,
                      ),
                      11 => 
                      array (
                        'key' => 'Chlorosulfonated Polyethylene (CSM)',
                        'value' => 1830033,
                      ),
                      12 => 
                      array (
                        'key' => 'CPE',
                        'value' => 2617,
                      ),
                      13 => 
                      array (
                        'key' => 'CR/EPDM',
                        'value' => 1829491,
                      ),
                      14 => 
                      array (
                        'key' => 'EPDM (Conductive)',
                        'value' => 11027110,
                      ),
                      15 => 
                      array (
                        'key' => 'EPDM Rubber',
                        'value' => 2613,
                      ),
                      16 => 
                      array (
                        'key' => 'EPDM SYNTHETIC RUBBER',
                        'value' => 1829454,
                      ),
                      17 => 
                      array (
                        'key' => 'EPDM with Microban®',
                        'value' => 10736192,
                      ),
                      18 => 
                      array (
                        'key' => 'Epichlorohydrin (ECO)',
                        'value' => 2620,
                      ),
                      19 => 
                      array (
                        'key' => 'EZ Clean',
                        'value' => 5288868,
                      ),
                      20 => 
                      array (
                        'key' => 'Fiberglass Fabric over Rubber',
                        'value' => 1829483,
                      ),
                      21 => 
                      array (
                        'key' => 'Flexible Vinyl',
                        'value' => 1829486,
                      ),
                      22 => 
                      array (
                        'key' => 'Futurin™',
                        'value' => 2625,
                      ),
                      23 => 
                      array (
                        'key' => 'Impregnated Textile Braid',
                        'value' => 1830032,
                      ),
                      24 => 
                      array (
                        'key' => 'Natural Rubber (NR)',
                        'value' => 5300788,
                      ),
                      25 => 
                      array (
                        'key' => 'Nitrile (NBR)',
                        'value' => 2615,
                      ),
                      26 => 
                      array (
                        'key' => 'Nitrile / PVC',
                        'value' => 1830037,
                      ),
                      27 => 
                      array (
                        'key' => 'Omegasyn',
                        'value' => 1829470,
                      ),
                      28 => 
                      array (
                        'key' => 'PE',
                        'value' => 2629,
                      ),
                      29 => 
                      array (
                        'key' => 'Pliosyn™ (Conductive)',
                        'value' => 11027108,
                      ),
                      30 => 
                      array (
                        'key' => 'Polychloroprene',
                        'value' => 1830024,
                      ),
                      31 => 
                      array (
                        'key' => 'Polyester',
                        'value' => 1829482,
                      ),
                      32 => 
                      array (
                        'key' => 'Polyurethane',
                        'value' => 1829480,
                      ),
                      33 => 
                      array (
                        'key' => 'PP',
                        'value' => 2630,
                      ),
                      34 => 
                      array (
                        'key' => 'Pureten',
                        'value' => 1829479,
                      ),
                      35 => 
                      array (
                        'key' => 'PVC',
                        'value' => 2626,
                      ),
                      36 => 
                      array (
                        'key' => 'Pyrosyn®',
                        'value' => 1829455,
                      ),
                      37 => 
                      array (
                        'key' => 'Recycled TPV (Thermoplastic Vulcanizate)',
                        'value' => 6949792,
                      ),
                      38 => 
                      array (
                        'key' => 'SBR',
                        'value' => 2614,
                      ),
                      39 => 
                      array (
                        'key' => 'SBR / EPDM',
                        'value' => 1829492,
                      ),
                      40 => 
                      array (
                        'key' => 'Sugar Cane Based EPDM',
                        'value' => 3831421,
                      ),
                      41 => 
                      array (
                        'key' => 'Super Thermo-Flo EPDM',
                        'value' => 1829471,
                      ),
                      42 => 
                      array (
                        'key' => 'SYNTHETIC FABRIC PLIES',
                        'value' => 1829464,
                      ),
                      43 => 
                      array (
                        'key' => 'Synthetic Fiber',
                        'value' => 1829484,
                      ),
                      44 => 
                      array (
                        'key' => 'Synthetic Rubber',
                        'value' => 2621,
                      ),
                      45 => 
                      array (
                        'key' => 'Synthetic Rubber with Armorcoat',
                        'value' => 12472319,
                      ),
                      46 => 
                      array (
                        'key' => 'Synthetic Rubber, UHMWPE Film',
                        'value' => 1829477,
                      ),
                      47 => 
                      array (
                        'key' => 'Textile',
                        'value' => 2624,
                      ),
                      48 => 
                      array (
                        'key' => 'Textile Braid',
                        'value' => 1829472,
                      ),
                      49 => 
                      array (
                        'key' => 'Thermoplastic',
                        'value' => 1829473,
                      ),
                      50 => 
                      array (
                        'key' => 'Thermoplastic Alloyed Blend of Nitrile (NBR), Polyurethane and PVC',
                        'value' => 10706731,
                      ),
                      51 => 
                      array (
                        'key' => 'TPE',
                        'value' => 1829467,
                      ),
                      52 => 
                      array (
                        'key' => 'TPU',
                        'value' => 2628,
                      ),
                      53 => 
                      array (
                        'key' => 'TPV',
                        'value' => 2627,
                      ),
                      54 => 
                      array (
                        'key' => 'UHMWPE',
                        'value' => 1829475,
                      ),
                      55 => 
                      array (
                        'key' => 'Urethane',
                        'value' => 1829481,
                      ),
                      56 => 
                      array (
                        'key' => 'Wingprene Synthetic Rubber',
                        'value' => 1829463,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 1,
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
                  5 => 
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
                        'key' => ' EN 857 R7',
                        'value' => 2691,
                      ),
                      9 => 
                      array (
                        'key' => ' FDA 21 CFR 177',
                        'value' => 2692,
                      ),
                      10 => 
                      array (
                        'key' => '100 microamps/ft. at 75 KV',
                        'value' => 2693,
                      ),
                      11 => 
                      array (
                        'key' => '1500 Specifications',
                        'value' => 2694,
                      ),
                      12 => 
                      array (
                        'key' => '3-A 18-03 CERTIFIED',
                        'value' => 2695,
                      ),
                      13 => 
                      array (
                        'key' => '3-A COMPLIANT',
                        'value' => 2696,
                      ),
                      14 => 
                      array (
                        'key' => 'ARPM CLASS A (HIGH OIL RESISTANCE)',
                        'value' => 2697,
                      ),
                      15 => 
                      array (
                        'key' => 'ARPM CLASS B (MEDIUM OIL RESISTANCE)',
                        'value' => 2698,
                      ),
                      16 => 
                      array (
                        'key' => 'ARPM CLASS C (LIMITED OIL RESISTANCE)',
                        'value' => 2699,
                      ),
                      17 => 
                      array (
                        'key' => 'ARPM GRADE R WELDING HOSE',
                        'value' => 2700,
                      ),
                      18 => 
                      array (
                        'key' => 'ARPM GRADE RM WELDING HOSE',
                        'value' => 2701,
                      ),
                      19 => 
                      array (
                        'key' => 'ARPM GRADE T WELDING HOSE',
                        'value' => 2702,
                      ),
                      20 => 
                      array (
                        'key' => 'CARB',
                        'value' => 2703,
                      ),
                      21 => 
                      array (
                        'key' => 'CGA E-1',
                        'value' => 2704,
                      ),
                      22 => 
                      array (
                        'key' => 'CNH FZG20305',
                        'value' => 2705,
                      ),
                      23 => 
                      array (
                        'key' => 'CSA 8.1-M86',
                        'value' => 2706,
                      ),
                      24 => 
                      array (
                        'key' => 'DIN 74310',
                        'value' => 2707,
                      ),
                      25 => 
                      array (
                        'key' => 'DOT FMVSS 106 Type (AII)',
                        'value' => 2708,
                      ),
                      26 => 
                      array (
                        'key' => 'EN 856 4SH',
                        'value' => 2686,
                      ),
                      27 => 
                      array (
                        'key' => 'EN 856 4SP',
                        'value' => 2687,
                      ),
                      28 => 
                      array (
                        'key' => 'EN 856 R12',
                        'value' => 2688,
                      ),
                      29 => 
                      array (
                        'key' => 'EN 856 R13',
                        'value' => 2689,
                      ),
                      30 => 
                      array (
                        'key' => 'EN 857 2SC',
                        'value' => 2690,
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
                     'height' => 180,
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
                     'style' => 'margin-left: 20px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  6 => 
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
                  7 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'fieldtype' => 'textarea',
                     'width' => 300,
                     'height' => 150,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
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
                  )),
                  8 => 
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
                     'style' => 'margin-left: 20px;',
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
                        'key' => '10:1',
                        'value' => 3831290,
                      ),
                      1 => 
                      array (
                        'key' => '2.5:1',
                        'value' => 5891661,
                      ),
                      2 => 
                      array (
                        'key' => '20:1',
                        'value' => 3831291,
                      ),
                      3 => 
                      array (
                        'key' => '2:1',
                        'value' => 3831286,
                      ),
                      4 => 
                      array (
                        'key' => '3:1',
                        'value' => 3831287,
                      ),
                      5 => 
                      array (
                        'key' => '4:1',
                        'value' => 3831288,
                      ),
                      6 => 
                      array (
                        'key' => '5:1',
                        'value' => 3831289,
                      ),
                      7 => 
                      array (
                        'key' => '6:1',
                        'value' => 4620648,
                      ),
                      8 => 
                      array (
                        'key' => '8:1',
                        'value' => 7976301,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 1,
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                     'optionsProviderData' => 'INH-HYD-HOSE',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'safetyFactor',
                     'title' => 'Design Factor',
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
                  10 => 
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
                  11 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => '3-A 18-03',
                        'value' => 2587,
                      ),
                      1 => 
                      array (
                        'key' => 'CARB',
                        'value' => 2595,
                      ),
                      2 => 
                      array (
                        'key' => 'CSA',
                        'value' => 2594,
                      ),
                      3 => 
                      array (
                        'key' => 'CUL',
                        'value' => 2596,
                      ),
                      4 => 
                      array (
                        'key' => 'FDA',
                        'value' => 2585,
                      ),
                      5 => 
                      array (
                        'key' => 'FMVSS',
                        'value' => 2589,
                      ),
                      6 => 
                      array (
                        'key' => 'MIL -AA59565 (compressed air)',
                        'value' => 2593,
                      ),
                      7 => 
                      array (
                        'key' => 'MSHA',
                        'value' => 2590,
                      ),
                      8 => 
                      array (
                        'key' => 'NIOSH (Air Breathing)',
                        'value' => 2592,
                      ),
                      9 => 
                      array (
                        'key' => 'NMMA (Marine Hose)',
                        'value' => 2591,
                      ),
                      10 => 
                      array (
                        'key' => 'NSF',
                        'value' => 2597,
                      ),
                      11 => 
                      array (
                        'key' => 'UL',
                        'value' => 2588,
                      ),
                      12 => 
                      array (
                        'key' => 'USDA',
                        'value' => 2586,
                      ),
                    ),
                     'width' => 300,
                     'height' => 180,
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
                  12 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Abrasive Materials',
                        'value' => 3831293,
                      ),
                      1 => 
                      array (
                        'key' => 'Acetylene',
                        'value' => 13056819,
                      ),
                      2 => 
                      array (
                        'key' => 'Acid',
                        'value' => 3831294,
                      ),
                      3 => 
                      array (
                        'key' => 'Agricultural Chemicals',
                        'value' => 3831295,
                      ),
                      4 => 
                      array (
                        'key' => 'Air',
                        'value' => 3831296,
                      ),
                      5 => 
                      array (
                        'key' => 'B100',
                        'value' => 3831297,
                      ),
                      6 => 
                      array (
                        'key' => 'B20',
                        'value' => 3831298,
                      ),
                      7 => 
                      array (
                        'key' => 'B5',
                        'value' => 3831299,
                      ),
                      8 => 
                      array (
                        'key' => 'Bark',
                        'value' => 3831300,
                      ),
                      9 => 
                      array (
                        'key' => 'Base',
                        'value' => 3831301,
                      ),
                      10 => 
                      array (
                        'key' => 'Beer',
                        'value' => 3831302,
                      ),
                      11 => 
                      array (
                        'key' => 'Cement',
                        'value' => 3831303,
                      ),
                      12 => 
                      array (
                        'key' => 'Concrete',
                        'value' => 3831304,
                      ),
                      13 => 
                      array (
                        'key' => 'DEF',
                        'value' => 3831305,
                      ),
                      14 => 
                      array (
                        'key' => 'Diesel',
                        'value' => 3831306,
                      ),
                      15 => 
                      array (
                        'key' => 'E10',
                        'value' => 3831307,
                      ),
                      16 => 
                      array (
                        'key' => 'E100',
                        'value' => 3831308,
                      ),
                      17 => 
                      array (
                        'key' => 'E25',
                        'value' => 3831309,
                      ),
                      18 => 
                      array (
                        'key' => 'E85',
                        'value' => 3831310,
                      ),
                      19 => 
                      array (
                        'key' => 'Fuel Oil',
                        'value' => 3831311,
                      ),
                      20 => 
                      array (
                        'key' => 'GASOLINE',
                        'value' => 3831312,
                      ),
                      21 => 
                      array (
                        'key' => 'GRASS',
                        'value' => 3831313,
                      ),
                      22 => 
                      array (
                        'key' => 'HYDROCARBON',
                        'value' => 3831314,
                      ),
                      23 => 
                      array (
                        'key' => 'Hydrogen',
                        'value' => 13056821,
                      ),
                      24 => 
                      array (
                        'key' => 'Inert Gas',
                        'value' => 13056824,
                      ),
                      25 => 
                      array (
                        'key' => 'KEROSENE',
                        'value' => 3831315,
                      ),
                      26 => 
                      array (
                        'key' => 'LACQUERS',
                        'value' => 3831316,
                      ),
                      27 => 
                      array (
                        'key' => 'LPG',
                        'value' => 3831317,
                      ),
                      28 => 
                      array (
                        'key' => 'M100',
                        'value' => 3831318,
                      ),
                      29 => 
                      array (
                        'key' => 'Methane/Natural Gas',
                        'value' => 13056822,
                      ),
                      30 => 
                      array (
                        'key' => 'MULCH',
                        'value' => 3831319,
                      ),
                      31 => 
                      array (
                        'key' => 'NATURAL GAS',
                        'value' => 3831320,
                      ),
                      32 => 
                      array (
                        'key' => 'OIL',
                        'value' => 3831321,
                      ),
                      33 => 
                      array (
                        'key' => 'Oxygen',
                        'value' => 13056820,
                      ),
                      34 => 
                      array (
                        'key' => 'PAINT',
                        'value' => 3831322,
                      ),
                      35 => 
                      array (
                        'key' => 'Propylene And Methylacetylene-Propadiene Stabilized',
                        'value' => 13056823,
                      ),
                      36 => 
                      array (
                        'key' => 'SALT WATER',
                        'value' => 3831323,
                      ),
                      37 => 
                      array (
                        'key' => 'SEWAGE',
                        'value' => 3831324,
                      ),
                      38 => 
                      array (
                        'key' => 'STEAM',
                        'value' => 3831325,
                      ),
                      39 => 
                      array (
                        'key' => 'THINNERS',
                        'value' => 3831326,
                      ),
                      40 => 
                      array (
                        'key' => 'TURPENTINE',
                        'value' => 3831327,
                      ),
                      41 => 
                      array (
                        'key' => 'WATER',
                        'value' => 3831328,
                      ),
                      42 => 
                      array (
                        'key' => 'WINE',
                        'value' => 3831329,
                      ),
                    ),
                     'width' => 300,
                     'height' => 260,
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
