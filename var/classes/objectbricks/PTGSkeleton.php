<?php

/**
 * Fields Summary:
 * - profile [input]
 * - heightIn [numeric]
 * - staticConductive [input]
 * - totalBeltThickness [numeric]
 * - pitchIN [numeric]
 * - pitchUOM [select]
 * - beltAngle [numeric]
 * - heightMm [numeric]
 * - heatOilResistant [input]
 * - totalToothThickness [numeric]
 * - pitchMM [numeric]
 */

return \Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'dao' => NULL,
   'key' => 'PTGSkeleton',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => '',
   'group' => 'PTG',
   'layoutDefinitions' => 
  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'name' => NULL,
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => 0,
     'height' => 0,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'children' => 
    array (
      0 => 
      \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => '',
         'width' => 0,
         'height' => 0,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'children' => 
        array (
          0 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
             'name' => 'Flange',
             'type' => NULL,
             'region' => NULL,
             'title' => '',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                 'name' => 'Field Container',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => '',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'profile',
                     'title' => 'Profile',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'name' => 'heightIn',
                     'title' => 'Height (in)',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => NULL,
                     'integer' => false,
                     'unsigned' => true,
                     'minValue' => NULL,
                     'maxValue' => NULL,
                     'unique' => false,
                     'decimalSize' => NULL,
                     'decimalPrecision' => 3,
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  2 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'staticConductive',
                     'title' => 'Static Conductive',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'name' => 'totalBeltThickness',
                     'title' => 'Total Belt Thickness',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => NULL,
                     'integer' => false,
                     'unsigned' => true,
                     'minValue' => NULL,
                     'maxValue' => NULL,
                     'unique' => false,
                     'decimalSize' => NULL,
                     'decimalPrecision' => 1,
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'name' => 'pitchIN',
                     'title' => 'Pitch (in)',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => NULL,
                     'integer' => false,
                     'unsigned' => true,
                     'minValue' => NULL,
                     'maxValue' => NULL,
                     'unique' => false,
                     'decimalSize' => NULL,
                     'decimalPrecision' => 3,
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  5 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'pitchUOM',
                     'title' => 'Pitch UOM',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'IN',
                        'value' => 'IN',
                      ),
                      1 => 
                      array (
                        'key' => 'MM',
                        'value' => 'MM',
                      ),
                    ),
                     'defaultValue' => '',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                     'width' => 300,
                     'optionsProviderType' => 'configure',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'fieldcontainer',
                 'layout' => 'vbox',
                 'fieldLabel' => '',
                 'labelWidth' => 200,
                 'labelAlign' => 'left',
              )),
              1 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                 'name' => 'Field Container',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => '',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'name' => 'beltAngle',
                     'title' => 'Belt Angle',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:20px;',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => NULL,
                     'integer' => false,
                     'unsigned' => false,
                     'minValue' => NULL,
                     'maxValue' => NULL,
                     'unique' => false,
                     'decimalSize' => NULL,
                     'decimalPrecision' => 1,
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'name' => 'heightMm',
                     'title' => 'Height (mm)',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:20px;',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => NULL,
                     'integer' => false,
                     'unsigned' => true,
                     'minValue' => NULL,
                     'maxValue' => NULL,
                     'unique' => false,
                     'decimalSize' => NULL,
                     'decimalPrecision' => 1,
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  2 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'heatOilResistant',
                     'title' => 'Heat & Oil Resistant',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:20px;',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => NULL,
                     'columnLength' => 190,
                     'regex' => '',
                     'regexFlags' => 
                    array (
                    ),
                     'unique' => false,
                     'showCharCount' => false,
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'name' => 'totalToothThickness',
                     'title' => 'Total Tooth Thickness',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:20px;',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => NULL,
                     'integer' => false,
                     'unsigned' => true,
                     'minValue' => NULL,
                     'maxValue' => NULL,
                     'unique' => false,
                     'decimalSize' => NULL,
                     'decimalPrecision' => 1,
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'name' => 'pitchMM',
                     'title' => 'Pitch (MM)',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:20px;',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => NULL,
                     'integer' => false,
                     'unsigned' => true,
                     'minValue' => NULL,
                     'maxValue' => NULL,
                     'unique' => false,
                     'decimalSize' => NULL,
                     'decimalPrecision' => 1,
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'fieldcontainer',
                 'layout' => 'vbox',
                 'fieldLabel' => '',
                 'labelWidth' => 200,
                 'labelAlign' => 'left',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'fieldcontainer',
             'layout' => 'hbox',
             'fieldLabel' => '',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'fieldtype' => 'panel',
         'layout' => NULL,
         'border' => false,
         'icon' => '',
         'labelWidth' => 100,
         'labelAlign' => 'left',
      )),
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'fieldDefinitionsCache' => NULL,
   'blockedVarsForExport' => 
  array (
  ),
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'Product',
      'fieldname' => 'Skeleton',
    ),
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
