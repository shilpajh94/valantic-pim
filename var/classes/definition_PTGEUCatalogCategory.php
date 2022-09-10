<?php 

/** 
* Generated at: 2022-07-05T14:09:19+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- fifthLevelCategory [select]
- sixSevenLevelCategory [multiselect]
- Columns [textarea]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'PTGEUCatalogCategory',
   'name' => 'PTGEUCatalogCategory',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1657022959,
   'userOwner' => 2,
   'userModification' => 2,
   'parentClass' => '',
   'implementsInterfaces' => '',
   'listingParentClass' => '',
   'useTraits' => '',
   'listingUseTraits' => '',
   'encryption' => false,
   'encryptedTables' => 
  array (
  ),
   'allowInherit' => false,
   'allowVariants' => NULL,
   'showVariants' => false,
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'labelWidth' => 100,
     'layout' => NULL,
     'border' => false,
     'name' => 'pimcore_root',
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'fieldtype' => 'fieldset',
             'labelWidth' => 200,
             'name' => 'FilterInfo',
             'type' => NULL,
             'region' => '',
             'title' => 'Filter By',
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
                  0 => 
                  array (
                    'key' => 'APPS-50IN09037104',
                    'value' => 10975480,
                  ),
                  1 => 
                  array (
                    'key' => 'Bushings-50IN08030097',
                    'value' => 10975461,
                  ),
                  2 => 
                  array (
                    'key' => 'Capping-50IN04022080',
                    'value' => 10975394,
                  ),
                  3 => 
                  array (
                    'key' => 'Conti®  Silentsync™-50IN03015046',
                    'value' => 10975141,
                  ),
                  4 => 
                  array (
                    'key' => 'Conti®  Synchrochain Carbon-50IN03014041',
                    'value' => 10975222,
                  ),
                  5 => 
                  array (
                    'key' => 'Conti®  Synchrochain Supreme-50IN03014042',
                    'value' => 10975229,
                  ),
                  6 => 
                  array (
                    'key' => 'Conti®  Synchroflex-50IN03014043',
                    'value' => 10975183,
                  ),
                  7 => 
                  array (
                    'key' => 'Conti®  Synchroflex TE-50IN03014045',
                    'value' => 10975236,
                  ),
                  8 => 
                  array (
                    'key' => 'Conti®  Synchroforce® Advance-50IN03015047',
                    'value' => 10975082,
                  ),
                  9 => 
                  array (
                    'key' => 'Conti®  Synchroforce® Advance Pro-50IN03015048',
                    'value' => 10975115,
                  ),
                  10 => 
                  array (
                    'key' => 'Conti®  Synchroforce® Supreme-50IN03015049',
                    'value' => 10975126,
                  ),
                  11 => 
                  array (
                    'key' => 'Conti®  Synchroline®-50IN03017060',
                    'value' => 10975262,
                  ),
                  12 => 
                  array (
                    'key' => 'Conti®  Synchroline® Advance-50IN03017061',
                    'value' => 10975283,
                  ),
                  13 => 
                  array (
                    'key' => 'Conti®  Synchrotwin® -50IN03015053',
                    'value' => 10975158,
                  ),
                  14 => 
                  array (
                    'key' => 'Conti®  Synchrotwin®  Advance-50IN03015054',
                    'value' => 10975171,
                  ),
                  15 => 
                  array (
                    'key' => 'Conti® FLAT-50IN04022081',
                    'value' => 10975389,
                  ),
                  16 => 
                  array (
                    'key' => 'Conti® FLAT PU-50IN04021079',
                    'value' => 10975400,
                  ),
                  17 => 
                  array (
                    'key' => 'Conti® FLATLINE-50IN04024089',
                    'value' => 10975406,
                  ),
                  18 => 
                  array (
                    'key' => 'Conti® Polyflat HF-50IN04023082',
                    'value' => 10975417,
                  ),
                  19 => 
                  array (
                    'key' => 'Conti® Polyflat HP-50IN04023083',
                    'value' => 10975412,
                  ),
                  20 => 
                  array (
                    'key' => 'Conti® Polyflat HS-50IN04023084',
                    'value' => 10975422,
                  ),
                  21 => 
                  array (
                    'key' => 'Conti® Polyflat XHP-50IN04023085',
                    'value' => 10975437,
                  ),
                  22 => 
                  array (
                    'key' => 'Conti® Polyflat XHPII-50IN04023086',
                    'value' => 10975442,
                  ),
                  23 => 
                  array (
                    'key' => 'Conti® Polyflat XHS-50IN04023087',
                    'value' => 10975427,
                  ),
                  24 => 
                  array (
                    'key' => 'Conti® Polyflat XHSII-50IN04023088',
                    'value' => 10975432,
                  ),
                  25 => 
                  array (
                    'key' => 'Conti® Synchrodrive® HF-50IN03016056',
                    'value' => 10975357,
                  ),
                  26 => 
                  array (
                    'key' => 'Conti® Synchrodrive® HP-50IN03016057',
                    'value' => 10975305,
                  ),
                  27 => 
                  array (
                    'key' => 'Conti® Synchrodrive® HS-50IN03016058',
                    'value' => 10975334,
                  ),
                  28 => 
                  array (
                    'key' => 'Conti® Synchrodrive® XHP-50IN03016059',
                    'value' => 10975376,
                  ),
                  29 => 
                  array (
                    'key' => 'Conti® Synchroforce®-50IN03015055',
                    'value' => 10975041,
                  ),
                  30 => 
                  array (
                    'key' => 'Conti® Varispeed Advance-50IN02011035',
                    'value' => 10975029,
                  ),
                  31 => 
                  array (
                    'key' => 'Conti® Varispeed Power-50IN02011036',
                    'value' => 10975034,
                  ),
                  32 => 
                  array (
                    'key' => 'Conti®V-50IN02010028',
                    'value' => 10974795,
                  ),
                  33 => 
                  array (
                    'key' => 'Conti®V  Torque Team-50IN02008023',
                    'value' => 10974889,
                  ),
                  34 => 
                  array (
                    'key' => 'Conti®V Advance-50IN02010029',
                    'value' => 10974824,
                  ),
                  35 => 
                  array (
                    'key' => 'Conti®V Dual-50IN02010030',
                    'value' => 10974863,
                  ),
                  36 => 
                  array (
                    'key' => 'Conti®V Dual Advance-50IN02010031',
                    'value' => 10974872,
                  ),
                  37 => 
                  array (
                    'key' => 'Conti®V Dual Supreme-50IN02010032',
                    'value' => 10974881,
                  ),
                  38 => 
                  array (
                    'key' => 'Conti®V Garden Supreme-50IN02010033',
                    'value' => 10974852,
                  ),
                  39 => 
                  array (
                    'key' => 'Conti®V Multirib-50IN01005015',
                    'value' => 10974758,
                  ),
                  40 => 
                  array (
                    'key' => 'Conti®V Multirib Advance-50IN01005016',
                    'value' => 10974769,
                  ),
                  41 => 
                  array (
                    'key' => 'Conti®V Multirib Dual-50IN01005017',
                    'value' => 10974783,
                  ),
                  42 => 
                  array (
                    'key' => 'Conti®V Multirib Elast-50IN01005018',
                    'value' => 10974776,
                  ),
                  43 => 
                  array (
                    'key' => 'Conti®V Supreme-50IN02010034',
                    'value' => 10974841,
                  ),
                  44 => 
                  array (
                    'key' => 'Conti®V Torque Team Advance-50IN02008024',
                    'value' => 10974918,
                  ),
                  45 => 
                  array (
                    'key' => 'Conti®V Torque Team Supreme-50IN02008025',
                    'value' => 10974935,
                  ),
                  46 => 
                  array (
                    'key' => 'Conti®VX-50IN02009026',
                    'value' => 10974947,
                  ),
                  47 => 
                  array (
                    'key' => 'Conti®VX Advance-50IN02009027',
                    'value' => 10974972,
                  ),
                  48 => 
                  array (
                    'key' => 'Conti®VX Torque Team-50IN02007021',
                    'value' => 10974988,
                  ),
                  49 => 
                  array (
                    'key' => 'Conti®VX Torque Team Advance-50IN02007022',
                    'value' => 10975013,
                  ),
                  50 => 
                  array (
                    'key' => 'Gauges-50IN09038105',
                    'value' => 10975474,
                  ),
                  51 => 
                  array (
                    'key' => 'MULTI-V PU-50IN01004014',
                    'value' => 10974788,
                  ),
                  52 => 
                  array (
                    'key' => 'Sheaves-50IN08033100',
                    'value' => 10975455,
                  ),
                  53 => 
                  array (
                    'key' => 'Sprockets-50IN08034101',
                    'value' => 10975449,
                  ),
                  54 => 
                  array (
                    'key' => 'Tensioner-50IN09040107',
                    'value' => 10975468,
                  ),
                ),
                 'width' => 350,
                 'defaultValue' => '',
                 'optionsProviderClass' => 'PTGEU\\CatalogBundle\\OptionProvider\\HierarchyOptionProvider',
                 'optionsProviderData' => '',
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'dynamicOptions' => false,
                 'name' => 'fifthLevelCategory',
                 'title' => 'Fifth Level Category',
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
                ),
                 'width' => 350,
                 'height' => '',
                 'maxItems' => '',
                 'renderType' => 'tags',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
                 'queryColumnType' => 'text',
                 'columnType' => 'text',
                 'phpdocType' => 'array',
                 'dynamicOptions' => false,
                 'name' => 'sixSevenLevelCategory',
                 'title' => 'Six And Seven Level Category',
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
             'name' => 'Headers',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Print Columns',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
            ),
             'locked' => false,
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
             'fieldtype' => 'textarea',
             'width' => '',
             'height' => '',
             'maxLength' => NULL,
             'showCharCount' => false,
             'excludeFromSearchIndex' => false,
             'queryColumnType' => 'longtext',
             'columnType' => 'longtext',
             'phpdocType' => 'string',
             'name' => 'Columns',
             'title' => 'Columns',
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
   'icon' => '',
   'previewUrl' => '',
   'group' => 'PTGEU',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
   'compositeIndices' => 
  array (
  ),
   'propertyVisibility' => 
  array (
    'grid' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
    'search' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
  ),
   'enableGridLocking' => false,
   'dao' => NULL,
));
