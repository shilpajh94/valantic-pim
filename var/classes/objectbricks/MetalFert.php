<?php 

/** 
* Generated at: 2020-03-05T10:41:57+01:00
* IP: 192.168.9.138


Fields Summary: 
- boreType [input]
- beltType [input]
- finish [input]
- flange [checkbox]
- flangeMaterial [input]
- setScrew [input]
- overallThickness [quantityValue]
- hubDiameter [quantityValue]
- maxBoreSizeIN [quantityValue]
- maxBoreSizeMM [quantityValue]
- beltWidth [quantityValue]
- pitchDiameter [quantityValue]
- outsideDiameter [quantityValue]
- flangeDiameter [quantityValue]
- faceWidth [quantityValue]
- overAllLength [quantityValue]
- minBore [quantityValue]
- insideDiameter [quantityValue]
- stockThickness [quantityValue]
*/ 


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'Product',
      'fieldname' => 'Digit14',
    ),
  ),
   'title' => '',
   'group' => 'Metal',
   'key' => 'MetalFert',
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
             'labelWidth' => 100,
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => 'SAP',
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
                         'name' => 'boreType',
                         'title' => 'Bore Type',
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
                         'name' => 'beltType',
                         'title' => 'Belt  Type',
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
                         'name' => 'finish',
                         'title' => 'Finish',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'fieldtype' => 'checkbox',
                         'defaultValue' => NULL,
                         'queryColumnType' => 'tinyint(1)',
                         'columnType' => 'tinyint(1)',
                         'phpdocType' => 'boolean',
                         'name' => 'flange',
                         'title' => 'Flange (Y/N)',
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
                         'name' => 'flangeMaterial',
                         'title' => 'Flange Material',
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
                         'name' => 'setScrew',
                         'title' => 'Set Screw',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => NULL,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'overallThickness',
                         'title' => 'Overall Thickness (in)',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => NULL,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'hubDiameter',
                         'title' => 'Hub Diameter (in)',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'maxBoreSizeIN',
                         'title' => 'Max Bore Size (in)',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'maxBoreSizeMM',
                         'title' => 'Max Bore Size (MM)',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'beltWidth',
                         'title' => 'Belt Width',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'pitchDiameter',
                         'title' => 'Pitch Diameter ',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'outsideDiameter',
                         'title' => 'Outside Diameter ',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'flangeDiameter',
                         'title' => 'Flange Diameter (in)',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'faceWidth',
                         'title' => 'Face Width',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'overAllLength',
                         'title' => 'Over all Length',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'minBore',
                         'title' => 'Min bore (mm)',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'insideDiameter',
                         'title' => 'Inside Diameter ',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'queryColumnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'columnType' => 
                        array (
                          'value' => 'double',
                          'unit' => 'bigint(20)',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
                         'name' => 'stockThickness',
                         'title' => 'Stock Thickness',
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
