<?php 

/** 
* Generated at: 2020-03-03T07:58:42+01:00
* IP: 127.0.0.1


Fields Summary: 
- staticWire [input]
- numberOfHelixWires [numeric]
- unitOfWeight [input]
- netWeight [numeric]
- numberOfPlies [numeric]
- brandName [multiselect]
- tubeMaterial [multiselect]
- tubeCharacteristic [multiselect]
- tubeColor [multiselect]
- minimumTemperatureF [numeric]
- maximumTemperatureF [numeric]
- rangeTemperatureF [numeric]
- specifications [multiselect]
- StandardMetCover [multiselect]
- standardMetHose [multiselect]
- coverMaterial [multiselect]
- coverCharacteristic [multiselect]
- coverColor [multiselect]
- minimumTemperatureC [numeric]
- maximumTemperatureC [numeric]
- rangeTemperatureC1 [numeric]
- agencyCompliance [multiselect]
- safetyFactor [multiselect]
- acceptableHoseMedia [multiselect]
*/ 


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'Product',
      'fieldname' => 'Specification',
    ),
  ),
   'title' => 'Hose (6 Digit)',
   'group' => 'IFS-INH-HYD',
   'key' => 'HoseBase',
   'parentClass' => '',
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'labelWidth' => 100,
     'layout' => NULL,
     'border' => false,
     'icon' => NULL,
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
         'layout' => '',
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'fieldtype' => 'fieldset',
             'labelWidth' => 200,
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Imported from SAP',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'fieldtype' => 'input',
                 'width' => 300,
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
                 'unsigned' => false,
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
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'fieldtype' => 'input',
                 'width' => 300,
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
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'netWeight',
                 'title' => 'Net Weight (kg)',
                 'tooltip' => 'Kg',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 300,
                 'defaultValue' => NULL,
                 'queryColumnType' => 'double',
                 'columnType' => 'double',
                 'phpdocType' => 'float',
                 'integer' => false,
                 'unsigned' => false,
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
              )),
            ),
             'locked' => false,
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'fieldtype' => 'fieldset',
             'labelWidth' => 100,
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Updated in PIM',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'FRONTIER 200',
                            'value' => 'FRONTIER 200',
                          ),
                          1 => 
                          array (
                            'key' => 'Vintner Reserver',
                            'value' => 'Vintner Reserver',
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => 'Brand|Name',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
                         'dynamicOptions' => false,
                         'name' => 'brandName',
                         'title' => 'Brand Name',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => '',
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
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => '',
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
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => '',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'fieldtype' => 'numeric',
                         'width' => 300,
                         'defaultValue' => NULL,
                         'queryColumnType' => 'double',
                         'columnType' => 'double',
                         'phpdocType' => 'float',
                         'integer' => false,
                         'unsigned' => false,
                         'minValue' => NULL,
                         'maxValue' => NULL,
                         'unique' => false,
                         'decimalSize' => NULL,
                         'decimalPrecision' => NULL,
                         'name' => 'minimumTemperatureF',
                         'title' => 'Min Temp °F',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'fieldtype' => 'numeric',
                         'width' => 300,
                         'defaultValue' => NULL,
                         'queryColumnType' => 'double',
                         'columnType' => 'double',
                         'phpdocType' => 'float',
                         'integer' => false,
                         'unsigned' => false,
                         'minValue' => NULL,
                         'maxValue' => NULL,
                         'unique' => false,
                         'decimalSize' => NULL,
                         'decimalPrecision' => NULL,
                         'name' => 'maximumTemperatureF',
                         'title' => 'Max temp °F',
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
                         'width' => 300,
                         'defaultValue' => NULL,
                         'queryColumnType' => 'double',
                         'columnType' => 'double',
                         'phpdocType' => 'float',
                         'integer' => false,
                         'unsigned' => false,
                         'minValue' => NULL,
                         'maxValue' => NULL,
                         'unique' => false,
                         'decimalSize' => NULL,
                         'decimalPrecision' => NULL,
                         'name' => 'rangeTemperatureF',
                         'title' => 'Temperature Range (°F)',
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
                      7 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'ARPM Class A',
                            'value' => 'ARPM Class A',
                          ),
                          1 => 
                          array (
                            'key' => 'ARPM Class B',
                            'value' => 'ARPM Class B',
                          ),
                          2 => 
                          array (
                            'key' => 'ARPM Class C',
                            'value' => 'ARPM Class C',
                          ),
                          3 => 
                          array (
                            'key' => 'EN',
                            'value' => 'EN',
                          ),
                          4 => 
                          array (
                            'key' => 'SAE',
                            'value' => 'SAE',
                          ),
                          5 => 
                          array (
                            'key' => 'ARPM Grade R',
                            'value' => 'ARPM Grade R',
                          ),
                          6 => 
                          array (
                            'key' => 'ARPM Grade RM',
                            'value' => 'ARPM Grade RM',
                          ),
                          7 => 
                          array (
                            'key' => 'ARPM Grade T',
                            'value' => 'ARPM Grade T',
                          ),
                          8 => 
                          array (
                            'key' => 'ISO',
                            'value' => 'ISO',
                          ),
                          9 => 
                          array (
                            'key' => 'SAE J20',
                            'value' => 'SAE J20',
                          ),
                          10 => 
                          array (
                            'key' => 'SAE J30',
                            'value' => 'SAE J30',
                          ),
                          11 => 
                          array (
                            'key' => 'SAE J189',
                            'value' => 'SAE J189',
                          ),
                          12 => 
                          array (
                            'key' => 'SAE J1402',
                            'value' => 'SAE J1402',
                          ),
                          13 => 
                          array (
                            'key' => 'SAE J1403',
                            'value' => 'SAE J1403',
                          ),
                          14 => 
                          array (
                            'key' => 'SAE J2076',
                            'value' => 'SAE J2076',
                          ),
                          15 => 
                          array (
                            'key' => 'SAE J1527',
                            'value' => 'SAE J1527',
                          ),
                          16 => 
                          array (
                            'key' => 'SAE J1037',
                            'value' => 'SAE J1037',
                          ),
                          17 => 
                          array (
                            'key' => 'SAE J20R3 D1',
                            'value' => 'SAE J20R3 D1',
                          ),
                          18 => 
                          array (
                            'key' => 'SAE J20R3 D2',
                            'value' => 'SAE J20R3 D2',
                          ),
                          19 => 
                          array (
                            'key' => 'SAE J20R3 D3 HT EC',
                            'value' => 'SAE J20R3 D3 HT EC',
                          ),
                          20 => 
                          array (
                            'key' => 'SAE J30 R6',
                            'value' => 'SAE J30 R6',
                          ),
                          21 => 
                          array (
                            'key' => 'SAE J30 R7',
                            'value' => 'SAE J30 R7',
                          ),
                          22 => 
                          array (
                            'key' => 'UL 330',
                            'value' => 'UL 330',
                          ),
                          23 => 
                          array (
                            'key' => 'UL 92',
                            'value' => 'UL 92',
                          ),
                          24 => 
                          array (
                            'key' => 'UL 94',
                            'value' => 'UL 94',
                          ),
                          25 => 
                          array (
                            'key' => 'ISO 3821',
                            'value' => 'ISO 3821',
                          ),
                          26 => 
                          array (
                            'key' => 'AS 1335',
                            'value' => 'AS 1335',
                          ),
                          27 => 
                          array (
                            'key' => 'DIN 74310',
                            'value' => 'DIN 74310',
                          ),
                          28 => 
                          array (
                            'key' => 'UL 21 (LPG)',
                            'value' => 'UL 21 (LPG)',
                          ),
                          29 => 
                          array (
                            'key' => 'CSA 8.1-M86 (LPG)',
                            'value' => 'CSA 8.1-M86 (LPG)',
                          ),
                          30 => 
                          array (
                            'key' => 'ISO 3821',
                            'value' => 'ISO 3821',
                          ),
                          31 => 
                          array (
                            'key' => 'ISO7840 (marine hose)',
                            'value' => 'ISO7840 (marine hose)',
                          ),
                          32 => 
                          array (
                            'key' => 'ISO8031 (conductivity)',
                            'value' => 'ISO8031 (conductivity)',
                          ),
                          33 => 
                          array (
                            'key' => 'AS 1335',
                            'value' => 'AS 1335',
                          ),
                          34 => 
                          array (
                            'key' => 'DIN 74310',
                            'value' => 'DIN 74310',
                          ),
                          35 => 
                          array (
                            'key' => 'NMMA (Marine Hose)',
                            'value' => 'NMMA (Marine Hose)',
                          ),
                          36 => 
                          array (
                            'key' => 'NIOSH (Air Breathing)',
                            'value' => 'NIOSH (Air Breathing)',
                          ),
                          37 => 
                          array (
                            'key' => 'MIL -AA59565 (compressed air)',
                            'value' => 'MIL -AA59565 (compressed air)',
                          ),
                          38 => 
                          array (
                            'key' => 'MSHA',
                            'value' => 'MSHA',
                          ),
                          39 => 
                          array (
                            'key' => 'FDA',
                            'value' => 'FDA',
                          ),
                          40 => 
                          array (
                            'key' => 'NSF',
                            'value' => 'NSF',
                          ),
                          41 => 
                          array (
                            'key' => '3-A 18-03',
                            'value' => '3-A 18-03',
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
                         'dynamicOptions' => false,
                         'name' => 'specifications',
                         'title' => 'Specifications / Standard Met Tube',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'ARPM Class A',
                            'value' => 'ARPM Class A',
                          ),
                          1 => 
                          array (
                            'key' => 'ARPM Class B',
                            'value' => 'ARPM Class B',
                          ),
                          2 => 
                          array (
                            'key' => 'ARPM Class C',
                            'value' => 'ARPM Class C',
                          ),
                          3 => 
                          array (
                            'key' => 'EN',
                            'value' => 'EN',
                          ),
                          4 => 
                          array (
                            'key' => 'SAE',
                            'value' => 'SAE',
                          ),
                          5 => 
                          array (
                            'key' => 'ARPM Grade R',
                            'value' => 'ARPM Grade R',
                          ),
                          6 => 
                          array (
                            'key' => 'ARPM Grade RM',
                            'value' => 'ARPM Grade RM',
                          ),
                          7 => 
                          array (
                            'key' => 'ARPM Grade T',
                            'value' => 'ARPM Grade T',
                          ),
                          8 => 
                          array (
                            'key' => 'ISO',
                            'value' => 'ISO',
                          ),
                          9 => 
                          array (
                            'key' => 'SAE J20',
                            'value' => 'SAE J20',
                          ),
                          10 => 
                          array (
                            'key' => 'SAE J30',
                            'value' => 'SAE J30',
                          ),
                          11 => 
                          array (
                            'key' => 'SAE J189',
                            'value' => 'SAE J189',
                          ),
                          12 => 
                          array (
                            'key' => 'SAE J1402',
                            'value' => 'SAE J1402',
                          ),
                          13 => 
                          array (
                            'key' => 'SAE J1403',
                            'value' => 'SAE J1403',
                          ),
                          14 => 
                          array (
                            'key' => 'SAE J2076',
                            'value' => 'SAE J2076',
                          ),
                          15 => 
                          array (
                            'key' => 'SAE J1527',
                            'value' => 'SAE J1527',
                          ),
                          16 => 
                          array (
                            'key' => 'SAE J1037',
                            'value' => 'SAE J1037',
                          ),
                          17 => 
                          array (
                            'key' => 'SAE J20R3 D1',
                            'value' => 'SAE J20R3 D1',
                          ),
                          18 => 
                          array (
                            'key' => 'SAE J20R3 D2',
                            'value' => 'SAE J20R3 D2',
                          ),
                          19 => 
                          array (
                            'key' => 'SAE J20R3 D3 HT EC',
                            'value' => 'SAE J20R3 D3 HT EC',
                          ),
                          20 => 
                          array (
                            'key' => 'SAE J30 R6',
                            'value' => 'SAE J30 R6',
                          ),
                          21 => 
                          array (
                            'key' => 'SAE J30 R7',
                            'value' => 'SAE J30 R7',
                          ),
                          22 => 
                          array (
                            'key' => 'UL 330',
                            'value' => 'UL 330',
                          ),
                          23 => 
                          array (
                            'key' => 'UL 92',
                            'value' => 'UL 92',
                          ),
                          24 => 
                          array (
                            'key' => 'UL 94',
                            'value' => 'UL 94',
                          ),
                          25 => 
                          array (
                            'key' => 'ISO 3821',
                            'value' => 'ISO 3821',
                          ),
                          26 => 
                          array (
                            'key' => 'AS 1335',
                            'value' => 'AS 1335',
                          ),
                          27 => 
                          array (
                            'key' => 'DIN 74310',
                            'value' => 'DIN 74310',
                          ),
                          28 => 
                          array (
                            'key' => 'UL 21 (LPG)',
                            'value' => 'UL 21 (LPG)',
                          ),
                          29 => 
                          array (
                            'key' => 'CSA 8.1-M86 (LPG)',
                            'value' => 'CSA 8.1-M86 (LPG)',
                          ),
                          30 => 
                          array (
                            'key' => 'ISO 3821',
                            'value' => 'ISO 3821',
                          ),
                          31 => 
                          array (
                            'key' => 'ISO7840 (marine hose)',
                            'value' => 'ISO7840 (marine hose)',
                          ),
                          32 => 
                          array (
                            'key' => 'ISO8031 (conductivity)',
                            'value' => 'ISO8031 (conductivity)',
                          ),
                          33 => 
                          array (
                            'key' => 'AS 1335',
                            'value' => 'AS 1335',
                          ),
                          34 => 
                          array (
                            'key' => 'DIN 74310',
                            'value' => 'DIN 74310',
                          ),
                          35 => 
                          array (
                            'key' => 'NMMA (Marine Hose)',
                            'value' => 'NMMA (Marine Hose)',
                          ),
                          36 => 
                          array (
                            'key' => 'NIOSH (Air Breathing)',
                            'value' => 'NIOSH (Air Breathing)',
                          ),
                          37 => 
                          array (
                            'key' => 'MIL -AA59565 (compressed air)',
                            'value' => 'MIL -AA59565 (compressed air)',
                          ),
                          38 => 
                          array (
                            'key' => 'MSHA',
                            'value' => 'MSHA',
                          ),
                          39 => 
                          array (
                            'key' => 'FDA',
                            'value' => 'FDA',
                          ),
                          40 => 
                          array (
                            'key' => 'NSF',
                            'value' => 'NSF',
                          ),
                          41 => 
                          array (
                            'key' => '3-A 18-03',
                            'value' => '3-A 18-03',
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
                         'dynamicOptions' => false,
                         'name' => 'StandardMetCover',
                         'title' => 'Specifications / Standard Met Cover',
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
                      9 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'ARPM Class A',
                            'value' => 'ARPM Class A',
                          ),
                          1 => 
                          array (
                            'key' => 'ARPM Class B',
                            'value' => 'ARPM Class B',
                          ),
                          2 => 
                          array (
                            'key' => 'ARPM Class C',
                            'value' => 'ARPM Class C',
                          ),
                          3 => 
                          array (
                            'key' => 'EN',
                            'value' => 'EN',
                          ),
                          4 => 
                          array (
                            'key' => 'SAE',
                            'value' => 'SAE',
                          ),
                          5 => 
                          array (
                            'key' => 'ARPM Grade R',
                            'value' => 'ARPM Grade R',
                          ),
                          6 => 
                          array (
                            'key' => 'ARPM Grade RM',
                            'value' => 'ARPM Grade RM',
                          ),
                          7 => 
                          array (
                            'key' => 'ARPM Grade T',
                            'value' => 'ARPM Grade T',
                          ),
                          8 => 
                          array (
                            'key' => 'ISO',
                            'value' => 'ISO',
                          ),
                          9 => 
                          array (
                            'key' => 'SAE J20',
                            'value' => 'SAE J20',
                          ),
                          10 => 
                          array (
                            'key' => 'SAE J30',
                            'value' => 'SAE J30',
                          ),
                          11 => 
                          array (
                            'key' => 'SAE J189',
                            'value' => 'SAE J189',
                          ),
                          12 => 
                          array (
                            'key' => 'SAE J1402',
                            'value' => 'SAE J1402',
                          ),
                          13 => 
                          array (
                            'key' => 'SAE J1403',
                            'value' => 'SAE J1403',
                          ),
                          14 => 
                          array (
                            'key' => 'SAE J2076',
                            'value' => 'SAE J2076',
                          ),
                          15 => 
                          array (
                            'key' => 'SAE J1527',
                            'value' => 'SAE J1527',
                          ),
                          16 => 
                          array (
                            'key' => 'SAE J1037',
                            'value' => 'SAE J1037',
                          ),
                          17 => 
                          array (
                            'key' => 'SAE J20R3 D1',
                            'value' => 'SAE J20R3 D1',
                          ),
                          18 => 
                          array (
                            'key' => 'SAE J20R3 D2',
                            'value' => 'SAE J20R3 D2',
                          ),
                          19 => 
                          array (
                            'key' => 'SAE J20R3 D3 HT EC',
                            'value' => 'SAE J20R3 D3 HT EC',
                          ),
                          20 => 
                          array (
                            'key' => 'SAE J30 R6',
                            'value' => 'SAE J30 R6',
                          ),
                          21 => 
                          array (
                            'key' => 'SAE J30 R7',
                            'value' => 'SAE J30 R7',
                          ),
                          22 => 
                          array (
                            'key' => 'UL 330',
                            'value' => 'UL 330',
                          ),
                          23 => 
                          array (
                            'key' => 'UL 92',
                            'value' => 'UL 92',
                          ),
                          24 => 
                          array (
                            'key' => 'UL 94',
                            'value' => 'UL 94',
                          ),
                          25 => 
                          array (
                            'key' => 'ISO 3821',
                            'value' => 'ISO 3821',
                          ),
                          26 => 
                          array (
                            'key' => 'AS 1335',
                            'value' => 'AS 1335',
                          ),
                          27 => 
                          array (
                            'key' => 'DIN 74310',
                            'value' => 'DIN 74310',
                          ),
                          28 => 
                          array (
                            'key' => 'UL 21 (LPG)',
                            'value' => 'UL 21 (LPG)',
                          ),
                          29 => 
                          array (
                            'key' => 'CSA 8.1-M86 (LPG)',
                            'value' => 'CSA 8.1-M86 (LPG)',
                          ),
                          30 => 
                          array (
                            'key' => 'ISO 3821',
                            'value' => 'ISO 3821',
                          ),
                          31 => 
                          array (
                            'key' => 'ISO7840 (marine hose)',
                            'value' => 'ISO7840 (marine hose)',
                          ),
                          32 => 
                          array (
                            'key' => 'ISO8031 (conductivity)',
                            'value' => 'ISO8031 (conductivity)',
                          ),
                          33 => 
                          array (
                            'key' => 'AS 1335',
                            'value' => 'AS 1335',
                          ),
                          34 => 
                          array (
                            'key' => 'DIN 74310',
                            'value' => 'DIN 74310',
                          ),
                          35 => 
                          array (
                            'key' => 'NMMA (Marine Hose)',
                            'value' => 'NMMA (Marine Hose)',
                          ),
                          36 => 
                          array (
                            'key' => 'NIOSH (Air Breathing)',
                            'value' => 'NIOSH (Air Breathing)',
                          ),
                          37 => 
                          array (
                            'key' => 'MIL -AA59565 (compressed air)',
                            'value' => 'MIL -AA59565 (compressed air)',
                          ),
                          38 => 
                          array (
                            'key' => 'MSHA',
                            'value' => 'MSHA',
                          ),
                          39 => 
                          array (
                            'key' => 'FDA',
                            'value' => 'FDA',
                          ),
                          40 => 
                          array (
                            'key' => 'UL330A',
                            'value' => 'UL330A',
                          ),
                          41 => 
                          array (
                            'key' => 'UL330B',
                            'value' => 'UL330B',
                          ),
                          42 => 
                          array (
                            'key' => 'MIL-DTL-29210E',
                            'value' => 'MIL-DTL-29210E',
                          ),
                          43 => 
                          array (
                            'key' => 'NSF',
                            'value' => 'NSF',
                          ),
                          44 => 
                          array (
                            'key' => '3-A 18-03',
                            'value' => '3-A 18-03',
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
                         'dynamicOptions' => false,
                         'name' => 'standardMetHose',
                         'title' => 'Specifications / Standard Met Hose',
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
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => '',
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
                         'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => '',
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
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => '',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'fieldtype' => 'numeric',
                         'width' => 300,
                         'defaultValue' => NULL,
                         'queryColumnType' => 'double',
                         'columnType' => 'double',
                         'phpdocType' => 'float',
                         'integer' => false,
                         'unsigned' => false,
                         'minValue' => NULL,
                         'maxValue' => NULL,
                         'unique' => false,
                         'decimalSize' => NULL,
                         'decimalPrecision' => NULL,
                         'name' => 'minimumTemperatureC',
                         'title' => 'Min Temp °C',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'fieldtype' => 'numeric',
                         'width' => 300,
                         'defaultValue' => NULL,
                         'queryColumnType' => 'double',
                         'columnType' => 'double',
                         'phpdocType' => 'float',
                         'integer' => false,
                         'unsigned' => false,
                         'minValue' => NULL,
                         'maxValue' => NULL,
                         'unique' => false,
                         'decimalSize' => NULL,
                         'decimalPrecision' => NULL,
                         'name' => 'maximumTemperatureC',
                         'title' => 'Max temp °C',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'fieldtype' => 'numeric',
                         'width' => 300,
                         'defaultValue' => NULL,
                         'queryColumnType' => 'double',
                         'columnType' => 'double',
                         'phpdocType' => 'float',
                         'integer' => false,
                         'unsigned' => false,
                         'minValue' => NULL,
                         'maxValue' => NULL,
                         'unique' => false,
                         'decimalSize' => NULL,
                         'decimalPrecision' => NULL,
                         'name' => 'rangeTemperatureC1',
                         'title' => 'Temperature Range (°C)',
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
                            'key' => 'FDA',
                            'value' => 'FDA',
                          ),
                          1 => 
                          array (
                            'key' => 'USDA',
                            'value' => 'USDA',
                          ),
                          2 => 
                          array (
                            'key' => '3-A 18-03',
                            'value' => '3-A 18-03',
                          ),
                          3 => 
                          array (
                            'key' => 'UL',
                            'value' => 'UL',
                          ),
                          4 => 
                          array (
                            'key' => 'FMVSS',
                            'value' => 'FMVSS',
                          ),
                          5 => 
                          array (
                            'key' => 'MSHA',
                            'value' => 'MSHA',
                          ),
                          6 => 
                          array (
                            'key' => 'NMMA (Marine Hose)',
                            'value' => 'NMMA (Marine Hose)',
                          ),
                          7 => 
                          array (
                            'key' => 'NIOSH (Air Breathing)',
                            'value' => 'NIOSH (Air Breathing)',
                          ),
                          8 => 
                          array (
                            'key' => 'MIL -AA59565 (compressed air)',
                            'value' => 'MIL -AA59565 (compressed air)',
                          ),
                          9 => 
                          array (
                            'key' => 'CSA',
                            'value' => 'CSA',
                          ),
                          10 => 
                          array (
                            'key' => 'CARB',
                            'value' => 'CARB',
                          ),
                          11 => 
                          array (
                            'key' => 'CUL',
                            'value' => 'CUL',
                          ),
                          12 => 
                          array (
                            'key' => 'NSF',
                            'value' => 'NSF',
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
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
                      7 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => '2:1',
                            'value' => '2:1',
                          ),
                          1 => 
                          array (
                            'key' => '3:1',
                            'value' => '3:1',
                          ),
                          2 => 
                          array (
                            'key' => '4:1',
                            'value' => '4:1',
                          ),
                          3 => 
                          array (
                            'key' => '5:1',
                            'value' => '5:1',
                          ),
                          4 => 
                          array (
                            'key' => '10:1',
                            'value' => '10:1',
                          ),
                          5 => 
                          array (
                            'key' => '20:1',
                            'value' => '20:1',
                          ),
                          6 => 
                          array (
                            'key' => 'Not every hose is rated with design factor',
                            'value' => 'Not every hose is rated with design factor',
                          ),
                          7 => 
                          array (
                            'key' => 'Automotive and garden hoses are rated with burst',
                            'value' => 'Automotive and garden hoses are rated with burst',
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
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
                      8 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Beer',
                            'value' => 'Beer',
                          ),
                          1 => 
                          array (
                            'key' => 'Wine',
                            'value' => 'Wine',
                          ),
                          2 => 
                          array (
                            'key' => 'Water',
                            'value' => 'Water',
                          ),
                          3 => 
                          array (
                            'key' => 'Air',
                            'value' => 'Air',
                          ),
                          4 => 
                          array (
                            'key' => 'Oil',
                            'value' => 'Oil',
                          ),
                          5 => 
                          array (
                            'key' => 'Kerosene',
                            'value' => 'Kerosene',
                          ),
                          6 => 
                          array (
                            'key' => 'Fuel Oil',
                            'value' => 'Fuel Oil',
                          ),
                          7 => 
                          array (
                            'key' => 'DEF',
                            'value' => 'DEF',
                          ),
                          8 => 
                          array (
                            'key' => 'Steam',
                            'value' => 'Steam',
                          ),
                          9 => 
                          array (
                            'key' => 'Gasoline',
                            'value' => 'Gasoline',
                          ),
                          10 => 
                          array (
                            'key' => 'Diesel',
                            'value' => 'Diesel',
                          ),
                          11 => 
                          array (
                            'key' => 'E10',
                            'value' => 'E10',
                          ),
                          12 => 
                          array (
                            'key' => 'B5',
                            'value' => 'B5',
                          ),
                          13 => 
                          array (
                            'key' => 'B20',
                            'value' => 'B20',
                          ),
                          14 => 
                          array (
                            'key' => 'E25',
                            'value' => 'E25',
                          ),
                          15 => 
                          array (
                            'key' => 'E85',
                            'value' => 'E85',
                          ),
                          16 => 
                          array (
                            'key' => 'E100',
                            'value' => 'E100',
                          ),
                          17 => 
                          array (
                            'key' => 'M100',
                            'value' => 'M100',
                          ),
                          18 => 
                          array (
                            'key' => 'B100',
                            'value' => 'B100',
                          ),
                          19 => 
                          array (
                            'key' => 'LPG',
                            'value' => 'LPG',
                          ),
                          20 => 
                          array (
                            'key' => 'Paint',
                            'value' => 'Paint',
                          ),
                          21 => 
                          array (
                            'key' => 'Lacquers',
                            'value' => 'Lacquers',
                          ),
                          22 => 
                          array (
                            'key' => 'Thinners',
                            'value' => 'Thinners',
                          ),
                          23 => 
                          array (
                            'key' => 'Turpentine',
                            'value' => 'Turpentine',
                          ),
                          24 => 
                          array (
                            'key' => 'Hydrocarbon',
                            'value' => 'Hydrocarbon',
                          ),
                          25 => 
                          array (
                            'key' => 'Acid',
                            'value' => 'Acid',
                          ),
                          26 => 
                          array (
                            'key' => 'Base',
                            'value' => 'Base',
                          ),
                          27 => 
                          array (
                            'key' => 'Concrete',
                            'value' => 'Concrete',
                          ),
                          28 => 
                          array (
                            'key' => 'Mulch',
                            'value' => 'Mulch',
                          ),
                          29 => 
                          array (
                            'key' => 'Bark',
                            'value' => 'Bark',
                          ),
                          30 => 
                          array (
                            'key' => 'Grass',
                            'value' => 'Grass',
                          ),
                          31 => 
                          array (
                            'key' => 'Abrasive Materials',
                            'value' => 'Abrasive Materials',
                          ),
                          32 => 
                          array (
                            'key' => 'Sewage',
                            'value' => 'Sewage',
                          ),
                          33 => 
                          array (
                            'key' => 'Agricultural Chemicals',
                            'value' => 'Agricultural Chemicals',
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
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
          )),
        ),
         'locked' => false,
      )),
    ),
     'locked' => false,
  )),
   'dao' => NULL,
));
