<?php 

/** 
* Generated at: 2020-03-03T07:44:01+01:00
* IP: 127.0.0.1


Fields Summary: 
- pitchUOM [select]
- pitchIN [quantityValue]
- pitchMM [quantityValue]
- pitchLengthUOM [select]
- pitchLengthIN [quantityValue]
- pitchLengthMM [quantityValue]
- numberOfTeeth [calculatedValue]
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
   'group' => 'PTG',
   'key' => 'SynchronousFert',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'fieldtype' => 'select',
                         'options' => 
                        array (
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
                         'name' => 'pitchUOM',
                         'title' => 'Pitch UOM',
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
                         'name' => 'pitchIN',
                         'title' => 'Pitch (in)',
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
                         'name' => 'pitchMM',
                         'title' => 'Pitch (MM)',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'fieldtype' => 'select',
                         'options' => 
                        array (
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
                         'name' => 'pitchLengthUOM',
                         'title' => 'Pitch Length UOM',
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
                         'name' => 'pitchLengthIN',
                         'title' => 'Pitch Length (in)',
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
                         'name' => 'pitchLengthMM',
                         'title' => 'Pitch Length (MM)',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\CalculatedValue::__set_state(array(
                     'fieldtype' => 'calculatedValue',
                     'elementType' => 'input',
                     'width' => 0,
                     'calculatorClass' => '',
                     'queryColumnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\CalculatedValue',
                     'name' => 'numberOfTeeth',
                     'title' => 'Number of teeth',
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
        ),
         'locked' => false,
      )),
    ),
     'locked' => false,
  )),
   'dao' => NULL,
));
