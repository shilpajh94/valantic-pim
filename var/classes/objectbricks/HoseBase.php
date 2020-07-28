<?php 

/** 
* Generated at: 2020-07-28T08:47:41+02:00
* IP: 127.0.0.1


Fields Summary: 
- staticWire [input]
- numberOfHelixWires [numeric]
- numberOfPlies [numeric]
- LayFlatHoseYN [booleanSelect]
- tubeMaterial [multiselect]
- tubeCharacteristic [multiselect]
- tubeColor [multiselect]
- StandardMetTube [multiselect]
- StandardMetCover [multiselect]
- standardMetHoseComment [textarea]
- coverMaterial [multiselect]
- coverCharacteristic [multiselect]
- coverColor [multiselect]
- agencyCompliance [multiselect]
- safetyFactor [multiselect]
- standardMetHose [multiselect]
- acceptableHoseMedia [multiselect]
- Packaging [input]
- Coupling [input]
- NonStockSizes [input]
- VirtualCatalogTubeMaterial [textarea]
- VirtualCatalogCoupling [textarea]
- VirtualCatalogCoverMaterial [textarea]
- VirtualCatalogPackaging [textarea]
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
             'labelWidth' => 200,
             'layout' => '',
             'border' => false,
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Imported from SAP',
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
              2 => 
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
              3 => 
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
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Enriched In PIM',
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
                            'key' => 'Black nitrile synthetic rubber',
                            'value' => 1818455,
                          ),
                          15 => 
                          array (
                            'key' => 'NBR (Nitrile)',
                            'value' => 1818461,
                          ),
                          16 => 
                          array (
                            'key' => 'CR (Polychloroprene)',
                            'value' => 1818467,
                          ),
                          17 => 
                          array (
                            'key' => 'CPE (Chlorinated Polyethylene)',
                            'value' => 1818473,
                          ),
                          18 => 
                          array (
                            'key' => 'Oil-resistant synthetic rubber',
                            'value' => 1818489,
                          ),
                          19 => 
                          array (
                            'key' => '(NBR) Nitrile',
                            'value' => 1818501,
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
                      1 => 
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
                            'key' => 'SMOOTH',
                            'value' => 1818456,
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
                      2 => 
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
                            'key' => 'Black nitrile synthetic rubber',
                            'value' => 1818457,
                          ),
                          10 => 
                          array (
                            'key' => 'NBR (Nitrile)',
                            'value' => 1818462,
                          ),
                          11 => 
                          array (
                            'key' => 'CR (Polychloroprene)',
                            'value' => 1818468,
                          ),
                          12 => 
                          array (
                            'key' => 'CPE (Chlorinated Polyethylene)',
                            'value' => 1818474,
                          ),
                          13 => 
                          array (
                            'key' => 'Oil-resistant synthetic rubber',
                            'value' => 1818490,
                          ),
                          14 => 
                          array (
                            'key' => '(NBR) Nitrile',
                            'value' => 1818502,
                          ),
                          15 => 
                          array (
                            'key' => 'Synthetic Rubber',
                            'value' => 1818503,
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
                      3 => 
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
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => ' DIN 20023 4SH',
                            'value' => 1818510,
                          ),
                          1 => 
                          array (
                            'key' => ' DIN 20023 4SP',
                            'value' => 1818511,
                          ),
                          2 => 
                          array (
                            'key' => ' EN 853',
                            'value' => 1818512,
                          ),
                          3 => 
                          array (
                            'key' => ' EN 853 1SN',
                            'value' => 1818513,
                          ),
                          4 => 
                          array (
                            'key' => ' EN 853 2SN',
                            'value' => 1818514,
                          ),
                          5 => 
                          array (
                            'key' => ' EN 854 R3',
                            'value' => 1818515,
                          ),
                          6 => 
                          array (
                            'key' => ' EN 854 R6',
                            'value' => 1818516,
                          ),
                          7 => 
                          array (
                            'key' => ' EN 855 R8',
                            'value' => 1818517,
                          ),
                          8 => 
                          array (
                            'key' => 'EN 856 4SH',
                            'value' => 1818518,
                          ),
                          9 => 
                          array (
                            'key' => 'EN 856 4SP',
                            'value' => 1818519,
                          ),
                          10 => 
                          array (
                            'key' => 'EN 856 R12',
                            'value' => 1818520,
                          ),
                          11 => 
                          array (
                            'key' => 'EN 856 R13',
                            'value' => 1818521,
                          ),
                          12 => 
                          array (
                            'key' => 'EN 857 2SC',
                            'value' => 1818522,
                          ),
                          13 => 
                          array (
                            'key' => ' EN 857 R7',
                            'value' => 1818523,
                          ),
                          14 => 
                          array (
                            'key' => ' FDA 21 CFR 177',
                            'value' => 1818524,
                          ),
                          15 => 
                          array (
                            'key' => '100 microamps/ft. at 75 KV',
                            'value' => 1818525,
                          ),
                          16 => 
                          array (
                            'key' => '1500 Specifications',
                            'value' => 1818526,
                          ),
                          17 => 
                          array (
                            'key' => '3-A 18-03 CERTIFIED',
                            'value' => 1818527,
                          ),
                          18 => 
                          array (
                            'key' => '3-A COMPLIANT',
                            'value' => 1818528,
                          ),
                          19 => 
                          array (
                            'key' => 'ARPM CLASS A (HIGH OIL RESISTANCE)',
                            'value' => 1818529,
                          ),
                          20 => 
                          array (
                            'key' => 'ARPM CLASS B (MEDIUM OIL RESISTANCE)',
                            'value' => 1818530,
                          ),
                          21 => 
                          array (
                            'key' => 'ARPM CLASS C (LIMITED OIL RESISTANCE)',
                            'value' => 1818531,
                          ),
                          22 => 
                          array (
                            'key' => 'ARPM GRADE R WELDING HOSE',
                            'value' => 1818532,
                          ),
                          23 => 
                          array (
                            'key' => 'ARPM GRADE RM WELDING HOSE',
                            'value' => 1818533,
                          ),
                          24 => 
                          array (
                            'key' => 'ARPM GRADE T WELDING HOSE',
                            'value' => 1818534,
                          ),
                          25 => 
                          array (
                            'key' => 'CARB',
                            'value' => 1818535,
                          ),
                          26 => 
                          array (
                            'key' => 'CGA E-1',
                            'value' => 1818536,
                          ),
                          27 => 
                          array (
                            'key' => 'CNH FZG20305',
                            'value' => 1818537,
                          ),
                          28 => 
                          array (
                            'key' => 'CSA 8.1-M86',
                            'value' => 1818538,
                          ),
                          29 => 
                          array (
                            'key' => 'DIN 74310',
                            'value' => 1818539,
                          ),
                          30 => 
                          array (
                            'key' => 'DOT FMVSS 106 Type (AII)',
                            'value' => 1818540,
                          ),
                          31 => 
                          array (
                            'key' => 'FDA/USDA CERTIFIED',
                            'value' => 1818541,
                          ),
                          32 => 
                          array (
                            'key' => 'FDA/USDA COMPLIANT',
                            'value' => 1818542,
                          ),
                          33 => 
                          array (
                            'key' => 'FMVSS106 49 CFR 571 106',
                            'value' => 1818543,
                          ),
                          34 => 
                          array (
                            'key' => 'GM 6278M',
                            'value' => 1818544,
                          ),
                          35 => 
                          array (
                            'key' => 'ISO 11237',
                            'value' => 1818545,
                          ),
                          36 => 
                          array (
                            'key' => 'ISO3821',
                            'value' => 1818546,
                          ),
                          37 => 
                          array (
                            'key' => 'ISO7840',
                            'value' => 1818547,
                          ),
                          38 => 
                          array (
                            'key' => 'ISO8031',
                            'value' => 1818548,
                          ),
                          39 => 
                          array (
                            'key' => 'MIL -AA59565',
                            'value' => 1818549,
                          ),
                          40 => 
                          array (
                            'key' => 'MIL-370',
                            'value' => 1818550,
                          ),
                          41 => 
                          array (
                            'key' => 'MIL-DTL-13444H Type I',
                            'value' => 1818551,
                          ),
                          42 => 
                          array (
                            'key' => 'MIL-DTL-13444H Type III',
                            'value' => 1818552,
                          ),
                          43 => 
                          array (
                            'key' => 'MIL-DTL-13531 Type II Class A',
                            'value' => 1818553,
                          ),
                          44 => 
                          array (
                            'key' => 'MIL-DTL-20176G',
                            'value' => 1818554,
                          ),
                          45 => 
                          array (
                            'key' => 'MIL-DTL-29210E',
                            'value' => 1818555,
                          ),
                          46 => 
                          array (
                            'key' => 'MIL-DTL-39921',
                            'value' => 1818556,
                          ),
                          47 => 
                          array (
                            'key' => 'MIL-DTL-8788',
                            'value' => 1818557,
                          ),
                          48 => 
                          array (
                            'key' => 'MPAPS F-30',
                            'value' => 1818558,
                          ),
                          49 => 
                          array (
                            'key' => 'MPAPS F-6032',
                            'value' => 1818559,
                          ),
                          50 => 
                          array (
                            'key' => 'MPAPS F-6042',
                            'value' => 1818560,
                          ),
                          51 => 
                          array (
                            'key' => 'MS-EA122',
                            'value' => 1818561,
                          ),
                          52 => 
                          array (
                            'key' => 'MSHA 2G',
                            'value' => 1818562,
                          ),
                          53 => 
                          array (
                            'key' => 'MSHA FLAME RESISTANT',
                            'value' => 1818563,
                          ),
                          54 => 
                          array (
                            'key' => 'NIOSH',
                            'value' => 1818564,
                          ),
                          55 => 
                          array (
                            'key' => 'NMMA',
                            'value' => 1818565,
                          ),
                          56 => 
                          array (
                            'key' => 'NSF-61',
                            'value' => 1818566,
                          ),
                          57 => 
                          array (
                            'key' => 'PLEWS RETAIL AIR HOSE',
                            'value' => 1818567,
                          ),
                          58 => 
                          array (
                            'key' => 'SAE 100R12',
                            'value' => 1818568,
                          ),
                          59 => 
                          array (
                            'key' => 'SAE 100R13',
                            'value' => 1818569,
                          ),
                          60 => 
                          array (
                            'key' => 'SAE 100R14A',
                            'value' => 1818570,
                          ),
                          61 => 
                          array (
                            'key' => 'SAE 100R15',
                            'value' => 1818571,
                          ),
                          62 => 
                          array (
                            'key' => 'SAE 100R16',
                            'value' => 1818572,
                          ),
                          63 => 
                          array (
                            'key' => 'SAE 100R17',
                            'value' => 1818573,
                          ),
                          64 => 
                          array (
                            'key' => 'SAE 100R18',
                            'value' => 1818574,
                          ),
                          65 => 
                          array (
                            'key' => 'SAE 100R19',
                            'value' => 1818575,
                          ),
                          66 => 
                          array (
                            'key' => 'SAE 100R1AT',
                            'value' => 1818576,
                          ),
                          67 => 
                          array (
                            'key' => 'SAE 100R2AT',
                            'value' => 1818577,
                          ),
                          68 => 
                          array (
                            'key' => 'SAE 100R3',
                            'value' => 1818578,
                          ),
                          69 => 
                          array (
                            'key' => 'SAE 100R4',
                            'value' => 1818579,
                          ),
                          70 => 
                          array (
                            'key' => 'SAE 100R4AT',
                            'value' => 1818580,
                          ),
                          71 => 
                          array (
                            'key' => 'SAE 100R5',
                            'value' => 1818581,
                          ),
                          72 => 
                          array (
                            'key' => 'SAE 100R6',
                            'value' => 1818582,
                          ),
                          73 => 
                          array (
                            'key' => 'SAE 100R7',
                            'value' => 1818583,
                          ),
                          74 => 
                          array (
                            'key' => 'SAE 100R8',
                            'value' => 1818584,
                          ),
                          75 => 
                          array (
                            'key' => 'SAE 1684',
                            'value' => 1818585,
                          ),
                          76 => 
                          array (
                            'key' => 'SAE J1037',
                            'value' => 1818586,
                          ),
                          77 => 
                          array (
                            'key' => 'SAE J1402',
                            'value' => 1818587,
                          ),
                          78 => 
                          array (
                            'key' => 'SAE J1402 Type (AII)',
                            'value' => 1818588,
                          ),
                          79 => 
                          array (
                            'key' => 'SAE J1403',
                            'value' => 1818589,
                          ),
                          80 => 
                          array (
                            'key' => 'SAE J1527',
                            'value' => 1818590,
                          ),
                          81 => 
                          array (
                            'key' => 'SAE J189',
                            'value' => 1818591,
                          ),
                          82 => 
                          array (
                            'key' => 'SAE J1942 / U.S. Coast Guard',
                            'value' => 1818592,
                          ),
                          83 => 
                          array (
                            'key' => 'SAE J20',
                            'value' => 1818593,
                          ),
                          84 => 
                          array (
                            'key' => 'SAE J2064 Type C, Class I',
                            'value' => 1818594,
                          ),
                          85 => 
                          array (
                            'key' => 'SAE J2064 Type C, Class II',
                            'value' => 1818595,
                          ),
                          86 => 
                          array (
                            'key' => 'SAE J2076',
                            'value' => 1818596,
                          ),
                          87 => 
                          array (
                            'key' => 'SAE J20R3 D1',
                            'value' => 1818597,
                          ),
                          88 => 
                          array (
                            'key' => 'SAE J20R3 D2',
                            'value' => 1818598,
                          ),
                          89 => 
                          array (
                            'key' => 'SAE J20R3 D3 HT EC',
                            'value' => 1818599,
                          ),
                          90 => 
                          array (
                            'key' => 'SAE J30',
                            'value' => 1818600,
                          ),
                          91 => 
                          array (
                            'key' => 'SAE J30 R6',
                            'value' => 1818601,
                          ),
                          92 => 
                          array (
                            'key' => 'SAE J30 R7',
                            'value' => 1818602,
                          ),
                          93 => 
                          array (
                            'key' => 'UL 21',
                            'value' => 1818603,
                          ),
                          94 => 
                          array (
                            'key' => 'UL 330',
                            'value' => 1818604,
                          ),
                          95 => 
                          array (
                            'key' => 'UL 92',
                            'value' => 1818605,
                          ),
                          96 => 
                          array (
                            'key' => 'UL 94 HB',
                            'value' => 1818606,
                          ),
                          97 => 
                          array (
                            'key' => 'UL330A',
                            'value' => 1818607,
                          ),
                          98 => 
                          array (
                            'key' => 'UL330B',
                            'value' => 1818608,
                          ),
                          99 => 
                          array (
                            'key' => 'WSE-M96D34',
                            'value' => 1818609,
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
                      5 => 
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
                         'name' => 'standardMetHoseComment',
                         'title' => 'Standard Met- Hose "Comment"',
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
                            'key' => 'Polychloroprene',
                            'value' => 1818458,
                          ),
                          19 => 
                          array (
                            'key' => 'Chlorinated Polyethylene',
                            'value' => 1818475,
                          ),
                          20 => 
                          array (
                            'key' => 'Impregnated Textile Braid',
                            'value' => 1818478,
                          ),
                          21 => 
                          array (
                            'key' => 'Chlorosulfonated Polyethylene',
                            'value' => 1818480,
                          ),
                          22 => 
                          array (
                            'key' => 'Nitrile / PVC',
                            'value' => 1818494,
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
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'WRAPPED',
                            'value' => 1818460,
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
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Black',
                            'value' => 1818442,
                          ),
                          1 => 
                          array (
                            'key' => 'White',
                            'value' => 1818443,
                          ),
                          2 => 
                          array (
                            'key' => 'Gray',
                            'value' => 1818444,
                          ),
                          3 => 
                          array (
                            'key' => 'Blue',
                            'value' => 1818445,
                          ),
                          4 => 
                          array (
                            'key' => 'Red',
                            'value' => 1818446,
                          ),
                          5 => 
                          array (
                            'key' => 'Brick Red',
                            'value' => 1818447,
                          ),
                          6 => 
                          array (
                            'key' => 'Green',
                            'value' => 1818448,
                          ),
                          7 => 
                          array (
                            'key' => 'Dark Green',
                            'value' => 1818449,
                          ),
                          8 => 
                          array (
                            'key' => 'Brown',
                            'value' => 1818450,
                          ),
                          9 => 
                          array (
                            'key' => 'Purple',
                            'value' => 1818451,
                          ),
                          10 => 
                          array (
                            'key' => 'Orange',
                            'value' => 1818452,
                          ),
                          11 => 
                          array (
                            'key' => 'Yellow',
                            'value' => 1818453,
                          ),
                          12 => 
                          array (
                            'key' => 'Clear',
                            'value' => 1818454,
                          ),
                          13 => 
                          array (
                            'key' => 'Pink',
                            'value' => 1818488,
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
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'FDA',
                            'value' => 1818428,
                          ),
                          1 => 
                          array (
                            'key' => 'USDA',
                            'value' => 1818429,
                          ),
                          2 => 
                          array (
                            'key' => '3-A 18-03',
                            'value' => 1818430,
                          ),
                          3 => 
                          array (
                            'key' => 'UL',
                            'value' => 1818431,
                          ),
                          4 => 
                          array (
                            'key' => 'FMVSS',
                            'value' => 1818432,
                          ),
                          5 => 
                          array (
                            'key' => 'MSHA',
                            'value' => 1818433,
                          ),
                          6 => 
                          array (
                            'key' => 'NMMA (Marine Hose)',
                            'value' => 1818434,
                          ),
                          7 => 
                          array (
                            'key' => 'NIOSH (Air Breathing)',
                            'value' => 1818435,
                          ),
                          8 => 
                          array (
                            'key' => 'MIL -AA59565 (compressed air)',
                            'value' => 1818436,
                          ),
                          9 => 
                          array (
                            'key' => 'CSA',
                            'value' => 1818437,
                          ),
                          10 => 
                          array (
                            'key' => 'CARB',
                            'value' => 1818438,
                          ),
                          11 => 
                          array (
                            'key' => 'CUL',
                            'value' => 1818439,
                          ),
                          12 => 
                          array (
                            'key' => 'NSF',
                            'value' => 1818440,
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
                      4 => 
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
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'SAE 100R2AT; EN 853',
                            'value' => 1818464,
                          ),
                          1 => 
                          array (
                            'key' => 'SAE 100R17',
                            'value' => 1818465,
                          ),
                          2 => 
                          array (
                            'key' => 'SAE 100R19',
                            'value' => 1818466,
                          ),
                          3 => 
                          array (
                            'key' => 'SAE 100R12;EN 856 R12',
                            'value' => 1818469,
                          ),
                          4 => 
                          array (
                            'key' => 'SAE 100R13;EN 856 R13',
                            'value' => 1818470,
                          ),
                          5 => 
                          array (
                            'key' => 'SAE 100R15',
                            'value' => 1818471,
                          ),
                          6 => 
                          array (
                            'key' => 'SAE 100R16;EN 857 2SC',
                            'value' => 1818472,
                          ),
                          7 => 
                          array (
                            'key' => 'SAE 100R1AT; EN 853 1SN;SAE J1942 / U.S. Coast Guard',
                            'value' => 1818476,
                          ),
                          8 => 
                          array (
                            'key' => 'SAE 100R2AT; EN 853 2SN;SAE J1942 / U.S. Coast Guard',
                            'value' => 1818477,
                          ),
                          9 => 
                          array (
                            'key' => 'SAE 100R5;DOT FMVSS 106 Type (AII);SAE J1402 Type (AII);SAE J1942 / U.S. Coast Guard',
                            'value' => 1818479,
                          ),
                          10 => 
                          array (
                            'key' => 'SAE 100R6; EN 854 R6',
                            'value' => 1818481,
                          ),
                          11 => 
                          array (
                            'key' => 'SAE 100R16; EN 857 2SC;SAE J1942 / U.S. Coast Guard',
                            'value' => 1818482,
                          ),
                          12 => 
                          array (
                            'key' => 'SAE 100R4;SAE J1942 / U.S. Coast Guard',
                            'value' => 1818483,
                          ),
                          13 => 
                          array (
                            'key' => 'MIL-DTL-13444H Type I',
                            'value' => 1818484,
                          ),
                          14 => 
                          array (
                            'key' => 'MIL-DTL-13444H Type III',
                            'value' => 1818485,
                          ),
                          15 => 
                          array (
                            'key' => 'MIL-DTL-13531 Type II Class A',
                            'value' => 1818486,
                          ),
                          16 => 
                          array (
                            'key' => 'MIL-DTL-8788',
                            'value' => 1818487,
                          ),
                          17 => 
                          array (
                            'key' => 'MSHA 2G',
                            'value' => 1818491,
                          ),
                          18 => 
                          array (
                            'key' => 'EN 856 4SH; DIN 20023 4SH',
                            'value' => 1818492,
                          ),
                          19 => 
                          array (
                            'key' => 'EN 856 4SP; DIN 20023 4SP',
                            'value' => 1818493,
                          ),
                          20 => 
                          array (
                            'key' => '100 microamps/ft. at 75 KV',
                            'value' => 1818495,
                          ),
                          21 => 
                          array (
                            'key' => 'SAE 100R17;SAE J1942 / U.S. Coast Guard',
                            'value' => 1818496,
                          ),
                          22 => 
                          array (
                            'key' => 'SAE 100R12; EN 856 R12;SAE J1942 / U.S. Coast Guard',
                            'value' => 1818497,
                          ),
                          23 => 
                          array (
                            'key' => 'SAE 100R13; EN 856 R13;SAE J1942 / U.S. Coast Guard',
                            'value' => 1818498,
                          ),
                          24 => 
                          array (
                            'key' => 'SAE 100R4AT; EN 853 1SN;SAE J1942 / U.S. Coast Guard',
                            'value' => 1818499,
                          ),
                          25 => 
                          array (
                            'key' => 'SAE 100R3; EN 854 R3',
                            'value' => 1818500,
                          ),
                          26 => 
                          array (
                            'key' => 'SAE 100R12',
                            'value' => 1818504,
                          ),
                          27 => 
                          array (
                            'key' => 'SAE 100R19;ISO 11237',
                            'value' => 1818505,
                          ),
                          28 => 
                          array (
                            'key' => 'SAE 100R12; EN 856 4SH',
                            'value' => 1818506,
                          ),
                          29 => 
                          array (
                            'key' => 'SAE 100R13',
                            'value' => 1818507,
                          ),
                          30 => 
                          array (
                            'key' => 'SAE 100R15; EN 856 4SP',
                            'value' => 1818508,
                          ),
                          31 => 
                          array (
                            'key' => ' DIN 20023 4SH',
                            'value' => 1818610,
                          ),
                          32 => 
                          array (
                            'key' => ' DIN 20023 4SP',
                            'value' => 1818611,
                          ),
                          33 => 
                          array (
                            'key' => ' EN 853',
                            'value' => 1818612,
                          ),
                          34 => 
                          array (
                            'key' => ' EN 853 1SN',
                            'value' => 1818613,
                          ),
                          35 => 
                          array (
                            'key' => ' EN 853 2SN',
                            'value' => 1818614,
                          ),
                          36 => 
                          array (
                            'key' => ' EN 854 R3',
                            'value' => 1818615,
                          ),
                          37 => 
                          array (
                            'key' => ' EN 854 R6',
                            'value' => 1818616,
                          ),
                          38 => 
                          array (
                            'key' => ' EN 855 R8',
                            'value' => 1818617,
                          ),
                          39 => 
                          array (
                            'key' => 'EN 856 4SH',
                            'value' => 1818618,
                          ),
                          40 => 
                          array (
                            'key' => 'EN 856 4SP',
                            'value' => 1818619,
                          ),
                          41 => 
                          array (
                            'key' => 'EN 856 R12',
                            'value' => 1818620,
                          ),
                          42 => 
                          array (
                            'key' => 'EN 856 R13',
                            'value' => 1818621,
                          ),
                          43 => 
                          array (
                            'key' => 'EN 857 2SC',
                            'value' => 1818622,
                          ),
                          44 => 
                          array (
                            'key' => ' EN 857 R7',
                            'value' => 1818623,
                          ),
                          45 => 
                          array (
                            'key' => ' FDA 21 CFR 177',
                            'value' => 1818624,
                          ),
                          46 => 
                          array (
                            'key' => '1500 Specifications',
                            'value' => 1818625,
                          ),
                          47 => 
                          array (
                            'key' => '3-A 18-03 CERTIFIED',
                            'value' => 1818626,
                          ),
                          48 => 
                          array (
                            'key' => '3-A COMPLIANT',
                            'value' => 1818627,
                          ),
                          49 => 
                          array (
                            'key' => 'ARPM CLASS A (HIGH OIL RESISTANCE)',
                            'value' => 1818628,
                          ),
                          50 => 
                          array (
                            'key' => 'ARPM CLASS B (MEDIUM OIL RESISTANCE)',
                            'value' => 1818629,
                          ),
                          51 => 
                          array (
                            'key' => 'ARPM CLASS C (LIMITED OIL RESISTANCE)',
                            'value' => 1818630,
                          ),
                          52 => 
                          array (
                            'key' => 'ARPM GRADE R WELDING HOSE',
                            'value' => 1818631,
                          ),
                          53 => 
                          array (
                            'key' => 'ARPM GRADE RM WELDING HOSE',
                            'value' => 1818632,
                          ),
                          54 => 
                          array (
                            'key' => 'ARPM GRADE T WELDING HOSE',
                            'value' => 1818633,
                          ),
                          55 => 
                          array (
                            'key' => 'CARB',
                            'value' => 1818634,
                          ),
                          56 => 
                          array (
                            'key' => 'CGA E-1',
                            'value' => 1818635,
                          ),
                          57 => 
                          array (
                            'key' => 'CNH FZG20305',
                            'value' => 1818636,
                          ),
                          58 => 
                          array (
                            'key' => 'CSA 8.1-M86',
                            'value' => 1818637,
                          ),
                          59 => 
                          array (
                            'key' => 'DIN 74310',
                            'value' => 1818638,
                          ),
                          60 => 
                          array (
                            'key' => 'DOT FMVSS 106 Type (AII)',
                            'value' => 1818639,
                          ),
                          61 => 
                          array (
                            'key' => 'FDA/USDA CERTIFIED',
                            'value' => 1818640,
                          ),
                          62 => 
                          array (
                            'key' => 'FDA/USDA COMPLIANT',
                            'value' => 1818641,
                          ),
                          63 => 
                          array (
                            'key' => 'FMVSS106 49 CFR 571 106',
                            'value' => 1818642,
                          ),
                          64 => 
                          array (
                            'key' => 'GM 6278M',
                            'value' => 1818643,
                          ),
                          65 => 
                          array (
                            'key' => 'ISO 11237',
                            'value' => 1818644,
                          ),
                          66 => 
                          array (
                            'key' => 'ISO3821',
                            'value' => 1818645,
                          ),
                          67 => 
                          array (
                            'key' => 'ISO7840',
                            'value' => 1818646,
                          ),
                          68 => 
                          array (
                            'key' => 'ISO8031',
                            'value' => 1818647,
                          ),
                          69 => 
                          array (
                            'key' => 'MIL -AA59565',
                            'value' => 1818648,
                          ),
                          70 => 
                          array (
                            'key' => 'MIL-370',
                            'value' => 1818649,
                          ),
                          71 => 
                          array (
                            'key' => 'MIL-DTL-20176G',
                            'value' => 1818650,
                          ),
                          72 => 
                          array (
                            'key' => 'MIL-DTL-29210E',
                            'value' => 1818651,
                          ),
                          73 => 
                          array (
                            'key' => 'MIL-DTL-39921',
                            'value' => 1818652,
                          ),
                          74 => 
                          array (
                            'key' => 'MPAPS F-30',
                            'value' => 1818653,
                          ),
                          75 => 
                          array (
                            'key' => 'MPAPS F-6032',
                            'value' => 1818654,
                          ),
                          76 => 
                          array (
                            'key' => 'MPAPS F-6042',
                            'value' => 1818655,
                          ),
                          77 => 
                          array (
                            'key' => 'MS-EA122',
                            'value' => 1818656,
                          ),
                          78 => 
                          array (
                            'key' => 'MSHA FLAME RESISTANT',
                            'value' => 1818657,
                          ),
                          79 => 
                          array (
                            'key' => 'NIOSH',
                            'value' => 1818658,
                          ),
                          80 => 
                          array (
                            'key' => 'NMMA',
                            'value' => 1818659,
                          ),
                          81 => 
                          array (
                            'key' => 'NSF-61',
                            'value' => 1818660,
                          ),
                          82 => 
                          array (
                            'key' => 'PLEWS RETAIL AIR HOSE',
                            'value' => 1818661,
                          ),
                          83 => 
                          array (
                            'key' => 'SAE 100R14A',
                            'value' => 1818662,
                          ),
                          84 => 
                          array (
                            'key' => 'SAE 100R16',
                            'value' => 1818663,
                          ),
                          85 => 
                          array (
                            'key' => 'SAE 100R18',
                            'value' => 1818664,
                          ),
                          86 => 
                          array (
                            'key' => 'SAE 100R1AT',
                            'value' => 1818665,
                          ),
                          87 => 
                          array (
                            'key' => 'SAE 100R2AT',
                            'value' => 1818666,
                          ),
                          88 => 
                          array (
                            'key' => 'SAE 100R3',
                            'value' => 1818667,
                          ),
                          89 => 
                          array (
                            'key' => 'SAE 100R4',
                            'value' => 1818668,
                          ),
                          90 => 
                          array (
                            'key' => 'SAE 100R4AT',
                            'value' => 1818669,
                          ),
                          91 => 
                          array (
                            'key' => 'SAE 100R5',
                            'value' => 1818670,
                          ),
                          92 => 
                          array (
                            'key' => 'SAE 100R6',
                            'value' => 1818671,
                          ),
                          93 => 
                          array (
                            'key' => 'SAE 100R7',
                            'value' => 1818672,
                          ),
                          94 => 
                          array (
                            'key' => 'SAE 100R8',
                            'value' => 1818673,
                          ),
                          95 => 
                          array (
                            'key' => 'SAE 1684',
                            'value' => 1818674,
                          ),
                          96 => 
                          array (
                            'key' => 'SAE J1037',
                            'value' => 1818675,
                          ),
                          97 => 
                          array (
                            'key' => 'SAE J1402',
                            'value' => 1818676,
                          ),
                          98 => 
                          array (
                            'key' => 'SAE J1402 Type (AII)',
                            'value' => 1818677,
                          ),
                          99 => 
                          array (
                            'key' => 'SAE J1403',
                            'value' => 1818678,
                          ),
                          100 => 
                          array (
                            'key' => 'SAE J1527',
                            'value' => 1818679,
                          ),
                          101 => 
                          array (
                            'key' => 'SAE J189',
                            'value' => 1818680,
                          ),
                          102 => 
                          array (
                            'key' => 'SAE J1942 / U.S. Coast Guard',
                            'value' => 1818681,
                          ),
                          103 => 
                          array (
                            'key' => 'SAE J20',
                            'value' => 1818682,
                          ),
                          104 => 
                          array (
                            'key' => 'SAE J2064 Type C, Class I',
                            'value' => 1818683,
                          ),
                          105 => 
                          array (
                            'key' => 'SAE J2064 Type C, Class II',
                            'value' => 1818684,
                          ),
                          106 => 
                          array (
                            'key' => 'SAE J2076',
                            'value' => 1818685,
                          ),
                          107 => 
                          array (
                            'key' => 'SAE J20R3 D1',
                            'value' => 1818686,
                          ),
                          108 => 
                          array (
                            'key' => 'SAE J20R3 D2',
                            'value' => 1818687,
                          ),
                          109 => 
                          array (
                            'key' => 'SAE J20R3 D3 HT EC',
                            'value' => 1818688,
                          ),
                          110 => 
                          array (
                            'key' => 'SAE J30',
                            'value' => 1818689,
                          ),
                          111 => 
                          array (
                            'key' => 'SAE J30 R6',
                            'value' => 1818690,
                          ),
                          112 => 
                          array (
                            'key' => 'SAE J30 R7',
                            'value' => 1818691,
                          ),
                          113 => 
                          array (
                            'key' => 'UL 21',
                            'value' => 1818692,
                          ),
                          114 => 
                          array (
                            'key' => 'UL 330',
                            'value' => 1818693,
                          ),
                          115 => 
                          array (
                            'key' => 'UL 92',
                            'value' => 1818694,
                          ),
                          116 => 
                          array (
                            'key' => 'UL 94 HB',
                            'value' => 1818695,
                          ),
                          117 => 
                          array (
                            'key' => 'UL330A',
                            'value' => 1818696,
                          ),
                          118 => 
                          array (
                            'key' => 'UL330B',
                            'value' => 1818697,
                          ),
                          119 => 
                          array (
                            'key' => 'WSE-M96D34',
                            'value' => 1818698,
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
                      6 => 
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
                         'name' => 'Packaging',
                         'title' => 'Packaging',
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
                  )),
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
             'icon' => '',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Virtual Catalog Fields',
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
                 'title' => 'Virtual Catalog Fields',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => true,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                         'fieldtype' => 'textarea',
                         'width' => 300,
                         'height' => 100,
                         'maxLength' => NULL,
                         'showCharCount' => false,
                         'excludeFromSearchIndex' => false,
                         'queryColumnType' => 'longtext',
                         'columnType' => 'longtext',
                         'phpdocType' => 'string',
                         'name' => 'VirtualCatalogTubeMaterial',
                         'title' => 'Virtual Catalog Tube Material',
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
                         'width' => 300,
                         'height' => 100,
                         'maxLength' => NULL,
                         'showCharCount' => false,
                         'excludeFromSearchIndex' => false,
                         'queryColumnType' => 'longtext',
                         'columnType' => 'longtext',
                         'phpdocType' => 'string',
                         'name' => 'VirtualCatalogCoupling',
                         'title' => 'Virtual Catalog Coupling',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                         'fieldtype' => 'textarea',
                         'width' => 300,
                         'height' => 100,
                         'maxLength' => NULL,
                         'showCharCount' => false,
                         'excludeFromSearchIndex' => false,
                         'queryColumnType' => 'longtext',
                         'columnType' => 'longtext',
                         'phpdocType' => 'string',
                         'name' => 'VirtualCatalogCoverMaterial',
                         'title' => 'Virtual Catalog Cover Material',
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
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                         'fieldtype' => 'textarea',
                         'width' => 300,
                         'height' => 100,
                         'maxLength' => NULL,
                         'showCharCount' => false,
                         'excludeFromSearchIndex' => false,
                         'queryColumnType' => 'longtext',
                         'columnType' => 'longtext',
                         'phpdocType' => 'string',
                         'name' => 'VirtualCatalogPackaging',
                         'title' => 'Virtual Catalog Packaging',
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
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
));
