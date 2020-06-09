<?php 

/** 
* Generated at: 2020-06-09T14:57:58+02:00
* IP: 127.0.0.1


Fields Summary: 
- staticWire [input]
- numberOfHelixWires [numeric]
- unitOfWeight [input]
- netWeight [numeric]
- numberOfPlies [numeric]
- tubeMaterial [multiselect]
- tubeCharacteristic [multiselect]
- tubeColor [multiselect]
- StandardMetTube [multiselect]
- StandardMetCover [multiselect]
- standardMetHose [multiselect]
- standardMetHoseComment [textarea]
- coverMaterial [multiselect]
- coverCharacteristic [multiselect]
- coverColor [multiselect]
- agencyCompliance [multiselect]
- safetyFactor [multiselect]
- acceptableHoseMedia [multiselect]
- Packaging [input]
- Coupling [input]
- hoseTemperatureRangeFAndC [input]
- TemperatureRangeApplication [input]
- VirtualCatalogTubeMaterial [textarea]
- VirtualCatalogCoupling [textarea]
- VirtualCatalogPackaging [textarea]
- VirtualCatalogCoverMaterial [textarea]
- VirtualCatalogHoseTemperatureRangeFAndC [textarea]
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
             'labelWidth' => 100,
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
                 'name' => 'unitOfWeight',
                 'title' => 'Unit Of Weight',
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
                 'name' => 'netWeight',
                 'title' => 'Net Weight (kg)',
                 'tooltip' => 'Kg',
                 'mandatory' => false,
                 'noteditable' => true,
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
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
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
                      6 => 
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
                      8 => 
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
                         'name' => 'hoseTemperatureRangeFAndC',
                         'title' => 'Temperature Range (°F & C°)',
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
                         'name' => 'TemperatureRangeApplication',
                         'title' => 'Temperature Range Application',
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
                    ),
                     'locked' => false,
                  )),
                ),
                 'locked' => false,
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                 'fieldtype' => 'fieldset',
                 'labelWidth' => 200,
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
                         'title' => 'Imported From SAP',
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
                          2 => 
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
                             'name' => 'VirtualCatalogHoseTemperatureRangeFAndC',
                             'title' => 'Virtual Catalog Temperature Range (°F & C°)',
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
