<?php 

/** 
* Generated at: 2021-12-16T11:56:02+01:00
* IP: 127.0.0.1


Fields Summary: 
- MaximumBeltWidthMM [numeric]
- MinimumBeltMMWidth [numeric]
- BeltWidthRangeMM [input]
- WeightKG [numeric]
- DiameterInch [numeric]
- AvailableProfilePatternWidths [numeric]
- AvailableBeltWidthRangeMM [input]
- BeltWidth [multiselect]
- MaximumBeltWidthMMUnit [input]
- MinimumBeltWidthMMUnit [input]
- BeltWidthRangeMMUnit [input]
- WeightKGUnit [input]
- DiameterInchUnit [input]
- AvailableProfilePatternWidthsUnit [input]
- AvailableBeltWidthRangeMMUnit [input]
- BeltWidthUnit [input]
- MaximumBeltWidthInch [numeric]
- MinimumBeltWidthInch [numeric]
- BeltWidthRangeInch [input]
- WeightLb [numeric]
- Diameter [numeric]
- VolumeFlow [numeric]
- AvailableBeltWidthRangeInch [input]
- BeltWidthmm [multiselect]
- MaximumBeltWidthInchUnit [input]
- MinimumBeltWidthInchUnit [input]
- BeltWidthRangeInchUnit [input]
- WeightLbUnit [input]
- DiameterUnit [input]
- VolumeFlowUnit [input]
- AvailableBeltWidthRangeInchUnit [input]
- BeltWidthmmUnit [input]
- AvailableBeltPatternWidthBlock [block]
-- availableBeltWidthInch [select]
-- availablePatternWidthInch [multiselect]
*/ 


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'CSProducts',
      'fieldname' => 'ProductAttributes',
    ),
  ),
   'dao' => NULL,
   'key' => 'ProdDimensions',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => 'Product Dimensions',
   'group' => 'CONVEYOR-BELT-SOLUTION',
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
         'layout' => '',
         'border' => false,
         'name' => 'Layout',
         'type' => NULL,
         'region' => '',
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
                 'labelWidth' => 150,
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
                     'width' => 200,
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
                     'name' => 'MaximumBeltWidthMM',
                     'title' => 'Maximum Belt Width',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'fieldtype' => 'numeric',
                     'width' => 200,
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
                     'name' => 'MinimumBeltMMWidth',
                     'title' => 'Minimum Belt Width',
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
                     'width' => 200,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'BeltWidthRangeMM',
                     'title' => 'Belt width range',
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
                     'width' => 200,
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
                     'name' => 'WeightKG',
                     'title' => 'Weight',
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
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'fieldtype' => 'numeric',
                     'width' => 200,
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
                     'name' => 'DiameterInch',
                     'title' => 'Diameter',
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
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'fieldtype' => 'numeric',
                     'width' => 200,
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
                     'name' => 'AvailableProfilePatternWidths',
                     'title' => 'Available Profile Pattern Widths',
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
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 200,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'AvailableBeltWidthRangeMM',
                     'title' => 'Available belt width range',
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
                        'key' => 25.59,
                        'value' => 7921514,
                      ),
                      1 => 
                      array (
                        'key' => 31.5,
                        'value' => 7921515,
                      ),
                      2 => 
                      array (
                        'key' => 39.37,
                        'value' => 7921516,
                      ),
                      3 => 
                      array (
                        'key' => 47.24,
                        'value' => 7921517,
                      ),
                      4 => 
                      array (
                        'key' => 55.12,
                        'value' => 7921518,
                      ),
                      5 => 
                      array (
                        'key' => 42,
                        'value' => 7921519,
                      ),
                      6 => 
                      array (
                        'key' => 48,
                        'value' => 7921520,
                      ),
                      7 => 
                      array (
                        'key' => 54,
                        'value' => 7921521,
                      ),
                      8 => 
                      array (
                        'key' => 60,
                        'value' => 7921522,
                      ),
                      9 => 
                      array (
                        'key' => 66,
                        'value' => 7921523,
                      ),
                      10 => 
                      array (
                        'key' => 72,
                        'value' => 7921524,
                      ),
                      11 => 
                      array (
                        'key' => 30,
                        'value' => 7921525,
                      ),
                      12 => 
                      array (
                        'key' => 36,
                        'value' => 7921526,
                      ),
                      13 => 
                      array (
                        'key' => 24,
                        'value' => 7921527,
                      ),
                      14 => 
                      array (
                        'key' => 14,
                        'value' => 7921528,
                      ),
                      15 => 
                      array (
                        'key' => 11.81,
                        'value' => 7921529,
                      ),
                      16 => 
                      array (
                        'key' => 15.75,
                        'value' => 7921530,
                      ),
                      17 => 
                      array (
                        'key' => 19.69,
                        'value' => 7921531,
                      ),
                      18 => 
                      array (
                        'key' => 18,
                        'value' => 7921532,
                      ),
                      19 => 
                      array (
                        'key' => 10,
                        'value' => 7921533,
                      ),
                      20 => 
                      array (
                        'key' => 9.84,
                        'value' => 7921534,
                      ),
                      21 => 
                      array (
                        'key' => 9.06,
                        'value' => 7921535,
                      ),
                      22 => 
                      array (
                        'key' => 8,
                        'value' => 7921536,
                      ),
                      23 => 
                      array (
                        'key' => 5.91,
                        'value' => 7921537,
                      ),
                      24 => 
                      array (
                        'key' => 7.87,
                        'value' => 7921538,
                      ),
                      25 => 
                      array (
                        'key' => 3,
                        'value' => 7921539,
                      ),
                      26 => 
                      array (
                        'key' => 2,
                        'value' => 7921540,
                      ),
                      27 => 
                      array (
                        'key' => 650,
                        'value' => 7921541,
                      ),
                      28 => 
                      array (
                        'key' => 800,
                        'value' => 7921542,
                      ),
                      29 => 
                      array (
                        'key' => 1000,
                        'value' => 7921543,
                      ),
                      30 => 
                      array (
                        'key' => 1200,
                        'value' => 7921544,
                      ),
                      31 => 
                      array (
                        'key' => 1400,
                        'value' => 7921545,
                      ),
                    ),
                     'width' => 200,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'ContitechCS\\ProductBundle\\OptionProvider\\AvailableBeltWidthOptionProvider',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'BeltWidth',
                     'title' => 'Belt Width',
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
                 'labelWidth' => 50,
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
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'MaximumBeltWidthMMUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;',
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
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'MinimumBeltWidthMMUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;',
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
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'BeltWidthRangeMMUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'WeightKGUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'DiameterInchUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'AvailableProfilePatternWidthsUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => true,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'AvailableBeltWidthRangeMMUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;margin-top:6px;',
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
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'BeltWidthUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;margin-top:4px;',
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
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                 'fieldtype' => 'fieldcontainer',
                 'labelWidth' => 150,
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
                     'width' => 200,
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
                     'name' => 'MaximumBeltWidthInch',
                     'title' => 'Maximum Belt Width',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:80px;',
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
                     'width' => 200,
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
                     'name' => 'MinimumBeltWidthInch',
                     'title' => 'Minimum Belt Width',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:80px;',
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
                     'width' => 200,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'BeltWidthRangeInch',
                     'title' => 'Belt width range',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:80px;',
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
                     'width' => 200,
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
                     'name' => 'WeightLb',
                     'title' => 'Weight',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:80px;',
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
                     'width' => 200,
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
                     'name' => 'Diameter',
                     'title' => 'Diameter',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:80px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'fieldtype' => 'numeric',
                     'width' => 200,
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
                     'name' => 'VolumeFlow',
                     'title' => 'Volume Flow',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:80px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 200,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'AvailableBeltWidthRangeInch',
                     'title' => 'Available belt width range',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:80px;',
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
                        'key' => 25.59,
                        'value' => 7921514,
                      ),
                      1 => 
                      array (
                        'key' => 31.5,
                        'value' => 7921515,
                      ),
                      2 => 
                      array (
                        'key' => 39.37,
                        'value' => 7921516,
                      ),
                      3 => 
                      array (
                        'key' => 47.24,
                        'value' => 7921517,
                      ),
                      4 => 
                      array (
                        'key' => 55.12,
                        'value' => 7921518,
                      ),
                      5 => 
                      array (
                        'key' => 42,
                        'value' => 7921519,
                      ),
                      6 => 
                      array (
                        'key' => 48,
                        'value' => 7921520,
                      ),
                      7 => 
                      array (
                        'key' => 54,
                        'value' => 7921521,
                      ),
                      8 => 
                      array (
                        'key' => 60,
                        'value' => 7921522,
                      ),
                      9 => 
                      array (
                        'key' => 66,
                        'value' => 7921523,
                      ),
                      10 => 
                      array (
                        'key' => 72,
                        'value' => 7921524,
                      ),
                      11 => 
                      array (
                        'key' => 30,
                        'value' => 7921525,
                      ),
                      12 => 
                      array (
                        'key' => 36,
                        'value' => 7921526,
                      ),
                      13 => 
                      array (
                        'key' => 24,
                        'value' => 7921527,
                      ),
                      14 => 
                      array (
                        'key' => 14,
                        'value' => 7921528,
                      ),
                      15 => 
                      array (
                        'key' => 11.81,
                        'value' => 7921529,
                      ),
                      16 => 
                      array (
                        'key' => 15.75,
                        'value' => 7921530,
                      ),
                      17 => 
                      array (
                        'key' => 19.69,
                        'value' => 7921531,
                      ),
                      18 => 
                      array (
                        'key' => 18,
                        'value' => 7921532,
                      ),
                      19 => 
                      array (
                        'key' => 10,
                        'value' => 7921533,
                      ),
                      20 => 
                      array (
                        'key' => 9.84,
                        'value' => 7921534,
                      ),
                      21 => 
                      array (
                        'key' => 9.06,
                        'value' => 7921535,
                      ),
                      22 => 
                      array (
                        'key' => 8,
                        'value' => 7921536,
                      ),
                      23 => 
                      array (
                        'key' => 5.91,
                        'value' => 7921537,
                      ),
                      24 => 
                      array (
                        'key' => 7.87,
                        'value' => 7921538,
                      ),
                      25 => 
                      array (
                        'key' => 3,
                        'value' => 7921539,
                      ),
                      26 => 
                      array (
                        'key' => 2,
                        'value' => 7921540,
                      ),
                      27 => 
                      array (
                        'key' => 650,
                        'value' => 7921541,
                      ),
                      28 => 
                      array (
                        'key' => 800,
                        'value' => 7921542,
                      ),
                      29 => 
                      array (
                        'key' => 1000,
                        'value' => 7921543,
                      ),
                      30 => 
                      array (
                        'key' => 1200,
                        'value' => 7921544,
                      ),
                      31 => 
                      array (
                        'key' => 1400,
                        'value' => 7921545,
                      ),
                    ),
                     'width' => 200,
                     'height' => '',
                     'maxItems' => '',
                     'renderType' => 'tags',
                     'optionsProviderClass' => 'ContitechCS\\ProductBundle\\OptionProvider\\AvailableBeltWidthOptionProvider',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'BeltWidthmm',
                     'title' => 'Belt Width',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:80px;',
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
              3 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                 'fieldtype' => 'fieldcontainer',
                 'labelWidth' => 40,
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
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'MaximumBeltWidthInchUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;',
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
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'MinimumBeltWidthInchUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;',
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
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'BeltWidthRangeInchUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'WeightLbUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'DiameterUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'VolumeFlowUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'AvailableBeltWidthRangeInchUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;margin-top:6px;',
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
                     'width' => 40,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'BeltWidthmmUnit',
                     'title' => '',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding-left:10px;margin-top:4px;',
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
      1 => 
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
                    'key' => 25.59,
                    'value' => 7921514,
                  ),
                  1 => 
                  array (
                    'key' => 31.5,
                    'value' => 7921515,
                  ),
                  2 => 
                  array (
                    'key' => 39.37,
                    'value' => 7921516,
                  ),
                  3 => 
                  array (
                    'key' => 47.24,
                    'value' => 7921517,
                  ),
                  4 => 
                  array (
                    'key' => 55.12,
                    'value' => 7921518,
                  ),
                  5 => 
                  array (
                    'key' => 42,
                    'value' => 7921519,
                  ),
                  6 => 
                  array (
                    'key' => 48,
                    'value' => 7921520,
                  ),
                  7 => 
                  array (
                    'key' => 54,
                    'value' => 7921521,
                  ),
                  8 => 
                  array (
                    'key' => 60,
                    'value' => 7921522,
                  ),
                  9 => 
                  array (
                    'key' => 66,
                    'value' => 7921523,
                  ),
                  10 => 
                  array (
                    'key' => 72,
                    'value' => 7921524,
                  ),
                  11 => 
                  array (
                    'key' => 30,
                    'value' => 7921525,
                  ),
                  12 => 
                  array (
                    'key' => 36,
                    'value' => 7921526,
                  ),
                  13 => 
                  array (
                    'key' => 24,
                    'value' => 7921527,
                  ),
                  14 => 
                  array (
                    'key' => 14,
                    'value' => 7921528,
                  ),
                  15 => 
                  array (
                    'key' => 11.81,
                    'value' => 7921529,
                  ),
                  16 => 
                  array (
                    'key' => 15.75,
                    'value' => 7921530,
                  ),
                  17 => 
                  array (
                    'key' => 19.69,
                    'value' => 7921531,
                  ),
                  18 => 
                  array (
                    'key' => 18,
                    'value' => 7921532,
                  ),
                  19 => 
                  array (
                    'key' => 10,
                    'value' => 7921533,
                  ),
                  20 => 
                  array (
                    'key' => 9.84,
                    'value' => 7921534,
                  ),
                  21 => 
                  array (
                    'key' => 9.06,
                    'value' => 7921535,
                  ),
                  22 => 
                  array (
                    'key' => 8,
                    'value' => 7921536,
                  ),
                  23 => 
                  array (
                    'key' => 5.91,
                    'value' => 7921537,
                  ),
                  24 => 
                  array (
                    'key' => 7.87,
                    'value' => 7921538,
                  ),
                  25 => 
                  array (
                    'key' => 3,
                    'value' => 7921539,
                  ),
                  26 => 
                  array (
                    'key' => 2,
                    'value' => 7921540,
                  ),
                  27 => 
                  array (
                    'key' => 650,
                    'value' => 7921541,
                  ),
                  28 => 
                  array (
                    'key' => 800,
                    'value' => 7921542,
                  ),
                  29 => 
                  array (
                    'key' => 1000,
                    'value' => 7921543,
                  ),
                  30 => 
                  array (
                    'key' => 1200,
                    'value' => 7921544,
                  ),
                  31 => 
                  array (
                    'key' => 1400,
                    'value' => 7921545,
                  ),
                ),
                 'width' => 300,
                 'defaultValue' => '',
                 'optionsProviderClass' => 'ContitechCS\\ProductBundle\\OptionProvider\\AvailableBeltWidthOptionProvider',
                 'optionsProviderData' => '',
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'dynamicOptions' => false,
                 'name' => 'availableBeltWidthInch',
                 'title' => 'Available Belt Width (in)',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                 'fieldtype' => 'multiselect',
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 25.59,
                    'value' => 7920691,
                  ),
                  1 => 
                  array (
                    'key' => 31.5,
                    'value' => 7920692,
                  ),
                  2 => 
                  array (
                    'key' => 39.37,
                    'value' => 7920693,
                  ),
                  3 => 
                  array (
                    'key' => 47.24,
                    'value' => 7920694,
                  ),
                  4 => 
                  array (
                    'key' => 55.12,
                    'value' => 7920695,
                  ),
                  5 => 
                  array (
                    'key' => 42,
                    'value' => 7920696,
                  ),
                  6 => 
                  array (
                    'key' => 48,
                    'value' => 7920697,
                  ),
                  7 => 
                  array (
                    'key' => 54,
                    'value' => 7920698,
                  ),
                  8 => 
                  array (
                    'key' => 60,
                    'value' => 7920699,
                  ),
                  9 => 
                  array (
                    'key' => 66,
                    'value' => 7920700,
                  ),
                  10 => 
                  array (
                    'key' => 72,
                    'value' => 7920701,
                  ),
                  11 => 
                  array (
                    'key' => 30,
                    'value' => 7920702,
                  ),
                  12 => 
                  array (
                    'key' => 36,
                    'value' => 7920703,
                  ),
                  13 => 
                  array (
                    'key' => 24,
                    'value' => 7920704,
                  ),
                  14 => 
                  array (
                    'key' => 14,
                    'value' => 7920705,
                  ),
                  15 => 
                  array (
                    'key' => 11.81,
                    'value' => 7920706,
                  ),
                  16 => 
                  array (
                    'key' => 15.75,
                    'value' => 7920707,
                  ),
                  17 => 
                  array (
                    'key' => 19.69,
                    'value' => 7920708,
                  ),
                  18 => 
                  array (
                    'key' => 18,
                    'value' => 7920709,
                  ),
                  19 => 
                  array (
                    'key' => 10,
                    'value' => 7920710,
                  ),
                  20 => 
                  array (
                    'key' => 9.84,
                    'value' => 7920711,
                  ),
                  21 => 
                  array (
                    'key' => 9.06,
                    'value' => 7920712,
                  ),
                  22 => 
                  array (
                    'key' => 8,
                    'value' => 7920713,
                  ),
                  23 => 
                  array (
                    'key' => 5.91,
                    'value' => 7920714,
                  ),
                  24 => 
                  array (
                    'key' => 7.87,
                    'value' => 7920715,
                  ),
                  25 => 
                  array (
                    'key' => 3,
                    'value' => 7920716,
                  ),
                  26 => 
                  array (
                    'key' => 2,
                    'value' => 7920717,
                  ),
                  27 => 
                  array (
                    'key' => 'Continuous',
                    'value' => 7920718,
                  ),
                ),
                 'width' => 300,
                 'height' => '',
                 'maxItems' => '',
                 'renderType' => 'tags',
                 'optionsProviderClass' => 'ContitechCS\\ProductBundle\\OptionProvider\\AvailablePatternWidthOptionProvider',
                 'optionsProviderData' => '',
                 'queryColumnType' => 'text',
                 'columnType' => 'text',
                 'phpdocType' => 'array',
                 'dynamicOptions' => false,
                 'name' => 'availablePatternWidthInch',
                 'title' => 'Available Pattern Width (inch)',
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
             'layout' => NULL,
             'referencedFields' => 
            array (
            ),
             'name' => 'AvailableBeltPatternWidthBlock',
             'title' => 'Available Belt / Pattern Width Block',
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
));
