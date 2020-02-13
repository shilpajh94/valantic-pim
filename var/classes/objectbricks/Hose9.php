<?php 

/** 
* Generated at: 2020-02-12T13:46:04+01:00
* IP: 192.168.9.128


Fields Summary: 
- hoseIdDec [quantityValue]
- hoseIdMM [quantityValue]
- hoseOdIn [quantityValue]
- hoseOdmm [quantityValue]
- weightg [quantityValue]
- grossWeight [quantityValue]
- grossWeightUOM [select]
- workingPressurepsi [quantityValue]
- workingPressurempa [quantityValue]
- workingPressureBAR [quantityValue]
- minBurstPressurepsi [quantityValue]
- minBurstPressurempa [quantityValue]
- BendRadius_in [quantityValue]
- BendRadius_mm [quantityValue]
- Vacumm_in [quantityValue]
- Vacumm_mm [quantityValue]
- descriptive [input]
- hoseIdNominalId [input]
- tubeGauge [numeric]
- tubeGaugemm [numeric]
- reinforcement [multiselect]
- fittingFamily [multiselect]
- hoseDashSize [numeric]
*/ 


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'Product',
      'fieldname' => 'BrandData',
    ),
  ),
   'title' => 'Hose 9 Digit',
   'group' => 'IFS-INH-HYD',
   'key' => 'Hose9',
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
             'name' => 'Hose',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'fieldtype' => 'quantityValue',
                 'width' => 300,
                 'unitWidth' => NULL,
                 'defaultValue' => NULL,
                 'defaultUnit' => NULL,
                 'validUnits' => 
                array (
                  0 => '1',
                  1 => '3',
                  2 => '2',
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
                 'name' => 'hoseIdDec',
                 'title' => 'Hose ID (in) (Dec.) Actual ID',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'fieldtype' => 'quantityValue',
                 'width' => 300,
                 'unitWidth' => NULL,
                 'defaultValue' => NULL,
                 'defaultUnit' => NULL,
                 'validUnits' => 
                array (
                  0 => '1',
                  1 => '3',
                  2 => '2',
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
                 'name' => 'hoseIdMM',
                 'title' => 'Hose ID (mm) Actual ID',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'fieldtype' => 'quantityValue',
                 'width' => 300,
                 'unitWidth' => NULL,
                 'defaultValue' => NULL,
                 'defaultUnit' => NULL,
                 'validUnits' => 
                array (
                  0 => '1',
                  1 => '3',
                  2 => '2',
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
                 'name' => 'hoseOdIn',
                 'title' => 'Hose OD (in)',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'fieldtype' => 'quantityValue',
                 'width' => 300,
                 'unitWidth' => NULL,
                 'defaultValue' => NULL,
                 'defaultUnit' => NULL,
                 'validUnits' => 
                array (
                  0 => '1',
                  1 => '3',
                  2 => '2',
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
                 'name' => 'hoseOdmm',
                 'title' => 'Hose OD (mm)',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'fieldtype' => 'quantityValue',
                 'width' => 300,
                 'unitWidth' => NULL,
                 'defaultValue' => NULL,
                 'defaultUnit' => NULL,
                 'validUnits' => 
                array (
                  0 => '1',
                  1 => '3',
                  2 => '2',
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
                 'name' => 'weightg',
                 'title' => 'Weight_ g/m',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'fieldtype' => 'quantityValue',
                 'width' => 300,
                 'unitWidth' => NULL,
                 'defaultValue' => NULL,
                 'defaultUnit' => NULL,
                 'validUnits' => 
                array (
                  0 => '1',
                  1 => '3',
                  2 => '2',
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
                 'name' => 'grossWeight',
                 'title' => 'Gross Weight / Weight_Lbs per ft',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'fieldtype' => 'select',
                 'options' => 
                array (
                ),
                 'width' => '',
                 'defaultValue' => '',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'dynamicOptions' => false,
                 'name' => 'grossWeightUOM',
                 'title' => 'Weight_Lbs per ft - UOM',
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
                          0 => '1',
                          1 => '3',
                          2 => '2',
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
                         'name' => 'workingPressurepsi',
                         'title' => 'Working Pressure (psi)',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                          0 => '1',
                          1 => '3',
                          2 => '2',
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
                         'name' => 'workingPressurempa',
                         'title' => 'Working Pressure (mpa)',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                          0 => '1',
                          1 => '3',
                          2 => '2',
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
                         'name' => 'workingPressureBAR',
                         'title' => 'Working Pressure (BAR)',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                          0 => '3',
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
                         'name' => 'minBurstPressurepsi',
                         'title' => 'Min. Burst Pressure (psi)',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                          0 => '3',
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => true,
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
                         'name' => 'minBurstPressurempa',
                         'title' => 'Min. Burst Pressure (mpa)',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                          0 => '1',
                          1 => '3',
                          2 => '2',
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
                         'name' => 'BendRadius_in',
                         'title' => 'BendRadius_in',
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
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                          0 => '1',
                          1 => '3',
                          2 => '2',
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
                         'name' => 'BendRadius_mm',
                         'title' => 'BendRadius_mm',
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
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                          0 => '1',
                          1 => '3',
                          2 => '2',
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
                         'name' => 'Vacumm_in',
                         'title' => 'Vacumm_in',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'fieldtype' => 'quantityValue',
                         'width' => 300,
                         'unitWidth' => NULL,
                         'defaultValue' => NULL,
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                          0 => '1',
                          1 => '3',
                          2 => '2',
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
                         'name' => 'Vacumm_mm',
                         'title' => 'Vacum_mm',
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
                         'name' => 'descriptive',
                         'title' => 'Descriptive #',
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
                         'name' => 'hoseIdNominalId',
                         'title' => 'Hose ID (in Fract) Nominal ID',
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
                         'name' => 'tubeGauge',
                         'title' => 'Tube Gauge (in)',
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
                         'name' => 'tubeGaugemm',
                         'title' => 'Tube Gauge (mm)',
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
                          0 => 
                          array (
                            'key' => 'Synthetic Fabric',
                            'value' => 'Synthetic Fabric',
                          ),
                          1 => 
                          array (
                            'key' => 'Wire Helix',
                            'value' => 'Wire Helix',
                          ),
                          2 => 
                          array (
                            'key' => 'Aramid',
                            'value' => 'Aramid',
                          ),
                          3 => 
                          array (
                            'key' => 'Rayon',
                            'value' => 'Rayon',
                          ),
                          4 => 
                          array (
                            'key' => 'Polyester',
                            'value' => 'Polyester',
                          ),
                          5 => 
                          array (
                            'key' => 'Synthetic yarn',
                            'value' => 'Synthetic yarn',
                          ),
                          6 => 
                          array (
                            'key' => '1 Braid Steel Wire',
                            'value' => '1 Braid Steel Wire',
                          ),
                          7 => 
                          array (
                            'key' => '2 Braid Steel Wire',
                            'value' => '2 Braid Steel Wire',
                          ),
                          8 => 
                          array (
                            'key' => '1 Braid Synthetic Yarn',
                            'value' => '1 Braid Synthetic Yarn',
                          ),
                          9 => 
                          array (
                            'key' => '2 Braid Synthetic Yarn',
                            'value' => '2 Braid Synthetic Yarn',
                          ),
                          10 => 
                          array (
                            'key' => '1 Braid Synthetic Yarn with Static Wire',
                            'value' => '1 Braid Synthetic Yarn with Static Wire',
                          ),
                          11 => 
                          array (
                            'key' => '2 Braid Synthetic Yarn with Static Wire',
                            'value' => '2 Braid Synthetic Yarn with Static Wire',
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'list',
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
                         'dynamicOptions' => false,
                         'name' => 'reinforcement',
                         'title' => 'Reinforcement',
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
                            'key' => 'B2',
                            'value' => 'B2',
                          ),
                          1 => 
                          array (
                            'key' => 'FG',
                            'value' => 'FG',
                          ),
                          2 => 
                          array (
                            'key' => 'SE',
                            'value' => 'SE',
                          ),
                          3 => 
                          array (
                            'key' => 'SG',
                            'value' => 'SG',
                          ),
                          4 => 
                          array (
                            'key' => 'Fuelgrip',
                            'value' => 'Fuelgrip',
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
                         'name' => 'fittingFamily',
                         'title' => 'Fitting Family',
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
                         'name' => 'hoseDashSize',
                         'title' => 'Hose Dash Size',
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
