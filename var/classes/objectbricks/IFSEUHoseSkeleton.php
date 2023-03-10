<?php 

/** 
* Generated at: 2023-03-10T07:39:02+01:00
* IP: 127.0.0.1


Fields Summary: 
- IdInch [numeric]
- IdMM [numeric]
- hoseIdNominalActualId [numeric]
- hoseIdMMActualId [numeric]
- OdIn [numeric]
- Odmm [numeric]
- FittingFamily [multiselect]
- workingPressureBAR [numeric]
- workingPressurePSI [numeric]
- workingPressureMPA [numeric]
- negativeToleranceIdMM [numeric]
- PositiveToleranceIdMM [numeric]
- negativeToleranceWtMM [numeric]
- PositiveToleranceWtMM [numeric]
- negativeToleranceOdMM [numeric]
- PositiveToleranceOdMM [numeric]
- BurstPressurePSI [numeric]
- BurstPressurempa [numeric]
- BurstPressureBar [numeric]
- descriptive [input]
- testPressureBar [numeric]
- testPressurePSI [numeric]
- BendingRadiusIN [numeric]
- BendingRadiusMM [numeric]
- wallThicknessInch [numeric]
- wallThicknessMM [numeric]
- VacuumIN [numeric]
- VacuumMM [numeric]
- VacuumBar [numeric]
- hoseDashSize [numeric]
*/ 


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'IFSEUProduct',
      'fieldname' => 'Skeleton',
    ),
  ),
   'dao' => NULL,
   'key' => 'IFSEUHoseSkeleton',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => 'Attributes',
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
         'layout' => '',
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'fieldtype' => 'fieldset',
             'labelWidth' => 220,
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Hose',
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
                 'name' => 'IdInch',
                 'title' => 'ID (Inch)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
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
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'IdMM',
                 'title' => 'ID (mm)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left;',
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
                 'width' => 200,
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
                 'name' => 'hoseIdNominalActualId',
                 'title' => 'Hose ID (in Nominal) Actual Id',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
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
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'hoseIdMMActualId',
                 'title' => 'Hose ID (mm) Actual Id',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left;',
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
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'OdIn',
                 'title' => 'OD (in)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
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
                 'name' => 'Odmm',
                 'title' => 'OD (mm)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; ',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                 'fieldtype' => 'multiselect',
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 'ABCT',
                    'value' => 1829868,
                  ),
                  1 => 
                  array (
                    'key' => 'ABPT',
                    'value' => 1829869,
                  ),
                  2 => 
                  array (
                    'key' => 'AC',
                    'value' => 1829865,
                  ),
                  3 => 
                  array (
                    'key' => 'AC2',
                    'value' => 5355085,
                  ),
                  4 => 
                  array (
                    'key' => 'AV',
                    'value' => 1829939,
                  ),
                  5 => 
                  array (
                    'key' => 'B1-DELETE',
                    'value' => 5354403,
                  ),
                  6 => 
                  array (
                    'key' => 'B2',
                    'value' => 1829854,
                  ),
                  7 => 
                  array (
                    'key' => 'B2SC',
                    'value' => 1830638,
                  ),
                  8 => 
                  array (
                    'key' => 'BP',
                    'value' => 1829870,
                  ),
                  9 => 
                  array (
                    'key' => 'BT',
                    'value' => 1829867,
                  ),
                  10 => 
                  array (
                    'key' => 'CB',
                    'value' => 1829941,
                  ),
                  11 => 
                  array (
                    'key' => 'CLIP',
                    'value' => 1829942,
                  ),
                  12 => 
                  array (
                    'key' => 'CLIP2',
                    'value' => 3833676,
                  ),
                  13 => 
                  array (
                    'key' => 'CLIPHLDR',
                    'value' => 1830382,
                  ),
                  14 => 
                  array (
                    'key' => 'COT',
                    'value' => 1829928,
                  ),
                  15 => 
                  array (
                    'key' => 'CT',
                    'value' => 1829871,
                  ),
                  16 => 
                  array (
                    'key' => 'DG',
                    'value' => 1829859,
                  ),
                  17 => 
                  array (
                    'key' => 'DGF1',
                    'value' => 1829891,
                  ),
                  18 => 
                  array (
                    'key' => 'DGF2',
                    'value' => 1829892,
                  ),
                  19 => 
                  array (
                    'key' => 'DH',
                    'value' => 1829872,
                  ),
                  20 => 
                  array (
                    'key' => 'DL',
                    'value' => 1829873,
                  ),
                  21 => 
                  array (
                    'key' => 'FG',
                    'value' => 1829861,
                  ),
                  22 => 
                  array (
                    'key' => 'FG2',
                    'value' => 1829893,
                  ),
                  23 => 
                  array (
                    'key' => 'FG5',
                    'value' => 1829894,
                  ),
                  24 => 
                  array (
                    'key' => 'FH',
                    'value' => 1830119,
                  ),
                  25 => 
                  array (
                    'key' => 'FL',
                    'value' => 1829874,
                  ),
                  26 => 
                  array (
                    'key' => 'FSL',
                    'value' => 1830388,
                  ),
                  27 => 
                  array (
                    'key' => 'FT',
                    'value' => 1830304,
                  ),
                  28 => 
                  array (
                    'key' => 'FTN',
                    'value' => 1829929,
                  ),
                  29 => 
                  array (
                    'key' => 'FTS',
                    'value' => 1829930,
                  ),
                  30 => 
                  array (
                    'key' => 'FTSM',
                    'value' => 1829931,
                  ),
                  31 => 
                  array (
                    'key' => 'GC',
                    'value' => 1829895,
                  ),
                  32 => 
                  array (
                    'key' => 'GG',
                    'value' => 1829863,
                  ),
                  33 => 
                  array (
                    'key' => 'HM',
                    'value' => 1829875,
                  ),
                  34 => 
                  array (
                    'key' => 'ILOT',
                    'value' => 1829932,
                  ),
                  35 => 
                  array (
                    'key' => 'JC',
                    'value' => 1829876,
                  ),
                  36 => 
                  array (
                    'key' => 'JS',
                    'value' => 1829877,
                  ),
                  37 => 
                  array (
                    'key' => 'KM',
                    'value' => 1829878,
                  ),
                  38 => 
                  array (
                    'key' => 'MC',
                    'value' => 1829879,
                  ),
                  39 => 
                  array (
                    'key' => 'MH',
                    'value' => 1829943,
                  ),
                  40 => 
                  array (
                    'key' => 'ML',
                    'value' => 1829880,
                  ),
                  41 => 
                  array (
                    'key' => 'MLL',
                    'value' => 1829944,
                  ),
                  42 => 
                  array (
                    'key' => 'MP',
                    'value' => 1829881,
                  ),
                  43 => 
                  array (
                    'key' => 'MS',
                    'value' => 1829882,
                  ),
                  44 => 
                  array (
                    'key' => 'N/A',
                    'value' => 14424799,
                  ),
                  45 => 
                  array (
                    'key' => 'NEEDS NOMENCLATURE ADDED',
                    'value' => 5356953,
                  ),
                  46 => 
                  array (
                    'key' => 'NP',
                    'value' => 1829883,
                  ),
                  47 => 
                  array (
                    'key' => 'NS',
                    'value' => 1829884,
                  ),
                  48 => 
                  array (
                    'key' => 'OB',
                    'value' => 1829885,
                  ),
                  49 => 
                  array (
                    'key' => 'OF',
                    'value' => 1829886,
                  ),
                  50 => 
                  array (
                    'key' => 'OI',
                    'value' => 1829933,
                  ),
                  51 => 
                  array (
                    'key' => 'OIM',
                    'value' => 1829936,
                  ),
                  52 => 
                  array (
                    'key' => 'OSWCH',
                    'value' => 1830419,
                  ),
                  53 => 
                  array (
                    'key' => 'OT',
                    'value' => 1829934,
                  ),
                  54 => 
                  array (
                    'key' => 'OTC',
                    'value' => 1829935,
                  ),
                  55 => 
                  array (
                    'key' => 'PB',
                    'value' => 1829887,
                  ),
                  56 => 
                  array (
                    'key' => 'PLIERS',
                    'value' => 1830438,
                  ),
                  57 => 
                  array (
                    'key' => 'PPT',
                    'value' => 1829888,
                  ),
                  58 => 
                  array (
                    'key' => 'R2',
                    'value' => 1829896,
                  ),
                  59 => 
                  array (
                    'key' => 'RA',
                    'value' => 1829897,
                  ),
                  60 => 
                  array (
                    'key' => 'S4',
                    'value' => 1829898,
                  ),
                  61 => 
                  array (
                    'key' => 'S6',
                    'value' => 1829857,
                  ),
                  62 => 
                  array (
                    'key' => 'SE',
                    'value' => 1829858,
                  ),
                  63 => 
                  array (
                    'key' => 'SF',
                    'value' => 1829864,
                  ),
                  64 => 
                  array (
                    'key' => 'SG',
                    'value' => 1829855,
                  ),
                  65 => 
                  array (
                    'key' => 'SH',
                    'value' => 1829899,
                  ),
                  66 => 
                  array (
                    'key' => 'SI',
                    'value' => 1829889,
                  ),
                  67 => 
                  array (
                    'key' => 'SRT',
                    'value' => 1829900,
                  ),
                  68 => 
                  array (
                    'key' => 'ST',
                    'value' => 1829890,
                  ),
                  69 => 
                  array (
                    'key' => 'SWCN',
                    'value' => 1829937,
                  ),
                  70 => 
                  array (
                    'key' => 'T7',
                    'value' => 1829866,
                  ),
                  71 => 
                  array (
                    'key' => 'T8',
                    'value' => 1829856,
                  ),
                  72 => 
                  array (
                    'key' => 'UC',
                    'value' => 1829860,
                  ),
                  73 => 
                  array (
                    'key' => 'UCF1',
                    'value' => 1829901,
                  ),
                  74 => 
                  array (
                    'key' => 'UCF10',
                    'value' => 1829902,
                  ),
                  75 => 
                  array (
                    'key' => 'UCF11',
                    'value' => 1829903,
                  ),
                  76 => 
                  array (
                    'key' => 'UCF2',
                    'value' => 1829904,
                  ),
                  77 => 
                  array (
                    'key' => 'UCF3',
                    'value' => 1829905,
                  ),
                  78 => 
                  array (
                    'key' => 'UCF4',
                    'value' => 1829906,
                  ),
                  79 => 
                  array (
                    'key' => 'UCF5',
                    'value' => 1829907,
                  ),
                  80 => 
                  array (
                    'key' => 'UCF6',
                    'value' => 1829908,
                  ),
                  81 => 
                  array (
                    'key' => 'UCF7',
                    'value' => 1829909,
                  ),
                  82 => 
                  array (
                    'key' => 'UCF8',
                    'value' => 1831134,
                  ),
                  83 => 
                  array (
                    'key' => 'UCF9',
                    'value' => 1829910,
                  ),
                  84 => 
                  array (
                    'key' => 'UCFB2',
                    'value' => 1829911,
                  ),
                  85 => 
                  array (
                    'key' => 'UCFSG',
                    'value' => 1829912,
                  ),
                  86 => 
                  array (
                    'key' => 'UCH',
                    'value' => 1829913,
                  ),
                  87 => 
                  array (
                    'key' => 'UCSC',
                    'value' => 1829914,
                  ),
                  88 => 
                  array (
                    'key' => 'UCSG',
                    'value' => 1829915,
                  ),
                  89 => 
                  array (
                    'key' => 'UT',
                    'value' => 1829862,
                  ),
                  90 => 
                  array (
                    'key' => 'VA',
                    'value' => 1829938,
                  ),
                  91 => 
                  array (
                    'key' => 'VCORE',
                    'value' => 1829940,
                  ),
                  92 => 
                  array (
                    'key' => 'XB2',
                    'value' => 1829916,
                  ),
                  93 => 
                  array (
                    'key' => 'XDG',
                    'value' => 1829917,
                  ),
                  94 => 
                  array (
                    'key' => 'XDG3',
                    'value' => 1829918,
                  ),
                  95 => 
                  array (
                    'key' => 'XDGF1',
                    'value' => 1829919,
                  ),
                  96 => 
                  array (
                    'key' => 'XDGF2',
                    'value' => 1829920,
                  ),
                  97 => 
                  array (
                    'key' => 'XDGF3',
                    'value' => 1829921,
                  ),
                  98 => 
                  array (
                    'key' => 'XS6',
                    'value' => 1829922,
                  ),
                  99 => 
                  array (
                    'key' => 'XS6C',
                    'value' => 1829923,
                  ),
                  100 => 
                  array (
                    'key' => 'XSC',
                    'value' => 1829924,
                  ),
                  101 => 
                  array (
                    'key' => 'XSG',
                    'value' => 1829925,
                  ),
                  102 => 
                  array (
                    'key' => 'XUC',
                    'value' => 1829926,
                  ),
                  103 => 
                  array (
                    'key' => 'XUCF',
                    'value' => 1829927,
                  ),
                ),
                 'width' => 200,
                 'height' => '',
                 'maxItems' => '',
                 'renderType' => 'tags',
                 'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                 'optionsProviderData' => 'FittingFamily|Name',
                 'queryColumnType' => 'text',
                 'columnType' => 'text',
                 'phpdocType' => 'array',
                 'dynamicOptions' => false,
                 'name' => 'FittingFamily',
                 'title' => 'Fitting Family',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
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
             'labelWidth' => 220,
             'name' => 'Working Pressure',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Working Pressure',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 200,
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
                 'name' => 'workingPressureBAR',
                 'title' => 'Working Pressure (BAR)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
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
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'workingPressurePSI',
                 'title' => 'Working Pressure (psi)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; ',
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
                 'width' => 200,
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
                 'name' => 'workingPressureMPA',
                 'title' => 'Working Pressure (mpa)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'fieldtype' => 'fieldset',
             'labelWidth' => 220,
             'name' => 'Tolerance Data',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Tolerance Data',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 200,
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
                 'name' => 'negativeToleranceIdMM',
                 'title' => 'Negative Tolerance Id (MM)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
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
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'PositiveToleranceIdMM',
                 'title' => 'Positive Tolerance Id (MM)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; ',
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
                 'width' => 200,
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
                 'name' => 'negativeToleranceWtMM',
                 'title' => 'Negative Tolerance WT (MM)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
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
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'PositiveToleranceWtMM',
                 'title' => 'Positive Tolerance WT (MM)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; ',
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
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'negativeToleranceOdMM',
                 'title' => 'Negative Tolerance OD (MM)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
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
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'PositiveToleranceOdMM',
                 'title' => 'Positive Tolerance OD (MM)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; ',
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
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'fieldtype' => 'fieldset',
             'labelWidth' => 220,
             'name' => 'Other',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Other',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 200,
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
                 'name' => 'BurstPressurePSI',
                 'title' => 'Burst pressure (PSI)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
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
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'BurstPressurempa',
                 'title' => 'Burst Pressure (mpa)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left;',
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
                 'width' => 200,
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
                 'name' => 'BurstPressureBar',
                 'title' => 'Burst Pressure (Bar)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
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
                 'width' => 200,
                 'defaultValue' => NULL,
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
                 'style' => 'float:left;',
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
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'testPressureBar',
                 'title' => 'Test Pressure (Bar)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left;  margin-right: 20px; clear:left;',
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
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'testPressurePSI',
                 'title' => 'Test Pressure (PSI)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left;',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 200,
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
                 'name' => 'BendingRadiusIN',
                 'title' => 'BendingRadius (in)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left;  margin-right: 20px; clear:left;',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
              7 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 200,
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
                 'name' => 'BendingRadiusMM',
                 'title' => 'Bending Radius (mm)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left;',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
              8 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 200,
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
                 'name' => 'wallThicknessInch',
                 'title' => 'Wall thickness (in)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
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
                 'width' => 200,
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
                 'name' => 'wallThicknessMM',
                 'title' => 'Wall thickness (mm)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; ',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
              10 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 200,
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
                 'name' => 'VacuumIN',
                 'title' => 'Vacuum (in)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; margin-right: 20px; clear:left;',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
              11 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 200,
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
                 'name' => 'VacuumMM',
                 'title' => 'Vacuum (mm)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; ',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
              12 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 200,
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
                 'name' => 'VacuumBar',
                 'title' => 'Vacuum (Bar)',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left;  margin-right: 20px; clear:left;',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
              13 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => 200,
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
                 'name' => 'hoseDashSize',
                 'title' => 'Hose Dash Size',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'float:left; ',
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
         'icon' => '',
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
));
