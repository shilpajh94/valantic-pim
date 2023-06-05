<?php 

/** 
* Generated at: 2023-06-01T11:41:58+00:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- fifthLevelCategory [select]
- sixSevenLevelCategory [multiselect]
- Columns [textarea]
- SortingColumns [textarea]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'PTGEUCatalogCategory',
   'name' => 'PTGEUCatalogCategory',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1685619718,
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
                    'key' => 'Acculinear-50IN04016127',
                    'value' => 13335224,
                  ),
                  1 => 
                  array (
                    'key' => 'Acculinear-50IN03016127',
                    'value' => 13335091,
                  ),
                  2 => 
                  array (
                    'key' => 'APPS-50IN09037104',
                    'value' => 13335335,
                  ),
                  3 => 
                  array (
                    'key' => 'Bushings-50IN08030097',
                    'value' => 13335312,
                  ),
                  4 => 
                  array (
                    'key' => 'Capping-50IN04022080',
                    'value' => 13335207,
                  ),
                  5 => 
                  array (
                    'key' => 'Composite Sprockets-50IN08034126',
                    'value' => 13335291,
                  ),
                  6 => 
                  array (
                    'key' => 'Conti® FALCON PD-50IN03015113',
                    'value' => 13334730,
                  ),
                  7 => 
                  array (
                    'key' => 'Conti® FALCON PD-50IN03017113',
                    'value' => 13335042,
                  ),
                  8 => 
                  array (
                    'key' => 'Conti® FLAT-50IN04022081',
                    'value' => 13335202,
                  ),
                  9 => 
                  array (
                    'key' => 'Conti® FLAT PU-50IN04016079',
                    'value' => 13335215,
                  ),
                  10 => 
                  array (
                    'key' => 'Conti® FLAT PU-50IN04021079',
                    'value' => 13335228,
                  ),
                  11 => 
                  array (
                    'key' => 'Conti® FLATLINE-50IN04024089',
                    'value' => 13335238,
                  ),
                  12 => 
                  array (
                    'key' => 'Conti® Polyflat HF-50IN04023082',
                    'value' => 13335256,
                  ),
                  13 => 
                  array (
                    'key' => 'Conti® Polyflat HP-50IN04023083',
                    'value' => 13335251,
                  ),
                  14 => 
                  array (
                    'key' => 'Conti® Polyflat HS-50IN04023084',
                    'value' => 13335264,
                  ),
                  15 => 
                  array (
                    'key' => 'Conti® Polyflat special cord-50IN04023124',
                    'value' => 13335259,
                  ),
                  16 => 
                  array (
                    'key' => 'Conti® Polyflat XHP-50IN04023085',
                    'value' => 13335279,
                  ),
                  17 => 
                  array (
                    'key' => 'Conti® Polyflat XHPII-50IN04023086',
                    'value' => 13335284,
                  ),
                  18 => 
                  array (
                    'key' => 'Conti® Polyflat XHS-50IN04023087',
                    'value' => 13335269,
                  ),
                  19 => 
                  array (
                    'key' => 'Conti® Polyflat XHSII-50IN04023088',
                    'value' => 13335274,
                  ),
                  20 => 
                  array (
                    'key' => 'Conti® PolyFlatLine-50IN04023119',
                    'value' => 13335248,
                  ),
                  21 => 
                  array (
                    'key' => 'Conti® PolyFlatLine-50IN04016119',
                    'value' => 13335221,
                  ),
                  22 => 
                  array (
                    'key' => 'Conti® Polyrope-50IN04016118',
                    'value' => 13335218,
                  ),
                  23 => 
                  array (
                    'key' => 'Conti® Polyrope-50IN04023118',
                    'value' => 13335234,
                  ),
                  24 => 
                  array (
                    'key' => 'Conti® Silentsync-50IN03015046',
                    'value' => 13334856,
                  ),
                  25 => 
                  array (
                    'key' => 'Conti® Synchrochain-50IN03014112',
                    'value' => 13334943,
                  ),
                  26 => 
                  array (
                    'key' => 'Conti® Synchrochain Carbon-50IN03014041',
                    'value' => 13334986,
                  ),
                  27 => 
                  array (
                    'key' => 'Conti® Synchrochain Supreme-50IN03014042',
                    'value' => 13334999,
                  ),
                  28 => 
                  array (
                    'key' => 'Conti® Synchrocolor Supreme-50IN03015117',
                    'value' => 13334853,
                  ),
                  29 => 
                  array (
                    'key' => 'Conti® Synchrodrive HP-50IN03016057',
                    'value' => 13335100,
                  ),
                  30 => 
                  array (
                    'key' => 'Conti® Synchrodrive HS-50IN03016058',
                    'value' => 13335146,
                  ),
                  31 => 
                  array (
                    'key' => 'Conti® Synchrodrive special cord-50IN03016123',
                    'value' => 13335137,
                  ),
                  32 => 
                  array (
                    'key' => 'Conti® Synchrodrive Truly Endless-50IN03016121',
                    'value' => 13335134,
                  ),
                  33 => 
                  array (
                    'key' => 'Conti® Synchrodrive Truly Endless-50IN03014121',
                    'value' => 13334993,
                  ),
                  34 => 
                  array (
                    'key' => 'Conti® Synchrodrive welded-50IN03016122',
                    'value' => 13335141,
                  ),
                  35 => 
                  array (
                    'key' => 'Conti® Synchrodrive welded-50IN03014122',
                    'value' => 13334996,
                  ),
                  36 => 
                  array (
                    'key' => 'Conti® Synchrodrive XHS-50IN03016120',
                    'value' => 13335097,
                  ),
                  37 => 
                  array (
                    'key' => 'Conti® Synchrodrive® HF-50IN03016056',
                    'value' => 13335169,
                  ),
                  38 => 
                  array (
                    'key' => 'Conti® Synchrodrive® XHP-50IN03016059',
                    'value' => 13335189,
                  ),
                  39 => 
                  array (
                    'key' => 'Conti® Synchroflex-50IN03014043',
                    'value' => 13334947,
                  ),
                  40 => 
                  array (
                    'key' => 'Conti® Synchroflex Supreme-50IN03014044',
                    'value' => 13335006,
                  ),
                  41 => 
                  array (
                    'key' => 'Conti® Synchroflex TE-50IN03014045',
                    'value' => 13335016,
                  ),
                  42 => 
                  array (
                    'key' => 'Conti® Synchroforce Advance-50IN03015047',
                    'value' => 13334787,
                  ),
                  43 => 
                  array (
                    'key' => 'Conti® Synchroforce Advance Pro-50IN03015048',
                    'value' => 13334822,
                  ),
                  44 => 
                  array (
                    'key' => 'Conti® Synchroforce Supreme-50IN03015049',
                    'value' => 13334837,
                  ),
                  45 => 
                  array (
                    'key' => 'Conti® Synchroforce®-50IN03015055',
                    'value' => 13334740,
                  ),
                  46 => 
                  array (
                    'key' => 'Conti® Synchroline Advance-50IN03017061',
                    'value' => 13335069,
                  ),
                  47 => 
                  array (
                    'key' => 'Conti® Synchroline®-50IN03017060',
                    'value' => 13335046,
                  ),
                  48 => 
                  array (
                    'key' => 'Conti® Synchropaint-50IN03015050',
                    'value' => 13334877,
                  ),
                  49 => 
                  array (
                    'key' => 'Conti® Synchropaint Advance-50IN03015051',
                    'value' => 13334884,
                  ),
                  50 => 
                  array (
                    'key' => 'Conti® Synchropaint Advance Pro-50IN03015052',
                    'value' => 13334901,
                  ),
                  51 => 
                  array (
                    'key' => 'Conti® Synchrorib-50IN03015131',
                    'value' => 13334891,
                  ),
                  52 => 
                  array (
                    'key' => 'Conti® Synchrorib Advance-50IN03015132',
                    'value' => 13334897,
                  ),
                  53 => 
                  array (
                    'key' => 'Conti® Synchrorib Advance Pro-50IN03015133',
                    'value' => 13334894,
                  ),
                  54 => 
                  array (
                    'key' => 'Conti® Synchrotwin-50IN03015053',
                    'value' => 13334908,
                  ),
                  55 => 
                  array (
                    'key' => 'Conti® Synchrotwin Advance-50IN03015054',
                    'value' => 13334931,
                  ),
                  56 => 
                  array (
                    'key' => 'Conti® Synchrotwin Advance Pro-50IN03015116',
                    'value' => 13334921,
                  ),
                  57 => 
                  array (
                    'key' => 'Conti® Varispeed Advance-50IN02011035',
                    'value' => 13334710,
                  ),
                  58 => 
                  array (
                    'key' => 'Conti® Varispeed Power-50IN02011036',
                    'value' => 13334719,
                  ),
                  59 => 
                  array (
                    'key' => 'Conti®V-50IN02010028',
                    'value' => 13334402,
                  ),
                  60 => 
                  array (
                    'key' => 'Conti®V Advance-50IN02010029',
                    'value' => 13334439,
                  ),
                  61 => 
                  array (
                    'key' => 'Conti®V Dual-50IN02010030',
                    'value' => 13334488,
                  ),
                  62 => 
                  array (
                    'key' => 'Conti®V Dual Advance-50IN02010031',
                    'value' => 13334501,
                  ),
                  63 => 
                  array (
                    'key' => 'Conti®V Dual Supreme-50IN02010032',
                    'value' => 13334510,
                  ),
                  64 => 
                  array (
                    'key' => 'Conti®V Garden Supreme-50IN02010033',
                    'value' => 13334477,
                  ),
                  65 => 
                  array (
                    'key' => 'Conti®V Multirib-50IN01005015',
                    'value' => 13334328,
                  ),
                  66 => 
                  array (
                    'key' => 'Conti®V Multirib Advance-50IN01005016',
                    'value' => 13334347,
                  ),
                  67 => 
                  array (
                    'key' => 'Conti®V Multirib Dual-50IN01005017',
                    'value' => 13334363,
                  ),
                  68 => 
                  array (
                    'key' => 'Conti®V Multirib Elast-50IN01005018',
                    'value' => 13334356,
                  ),
                  69 => 
                  array (
                    'key' => 'Conti®V Supreme-50IN02010034',
                    'value' => 13334461,
                  ),
                  70 => 
                  array (
                    'key' => 'Conti®V Torque Team-50IN02008023',
                    'value' => 13334519,
                  ),
                  71 => 
                  array (
                    'key' => 'Conti®V Torque Team Advance-50IN02008024',
                    'value' => 13334553,
                  ),
                  72 => 
                  array (
                    'key' => 'Conti®V Torque Team Powerspan-50IN02008109',
                    'value' => 13334576,
                  ),
                  73 => 
                  array (
                    'key' => 'Conti®V Torque Team Supreme-50IN02008025',
                    'value' => 13334579,
                  ),
                  74 => 
                  array (
                    'key' => 'Conti®VX-50IN02009026',
                    'value' => 13334599,
                  ),
                  75 => 
                  array (
                    'key' => 'Conti®VX Advance-50IN02009027',
                    'value' => 13334628,
                  ),
                  76 => 
                  array (
                    'key' => 'Conti®VX Torque Team-50IN02007021',
                    'value' => 13334661,
                  ),
                  77 => 
                  array (
                    'key' => 'Conti®VX Torque Team Advance-50IN02007022',
                    'value' => 13334690,
                  ),
                  78 => 
                  array (
                    'key' => 'Fuel Hose-50IN10041108',
                    'value' => 13335354,
                  ),
                  79 => 
                  array (
                    'key' => 'Gauges-50IN09038105',
                    'value' => 13335327,
                  ),
                  80 => 
                  array (
                    'key' => 'iSync-50IN03014128',
                    'value' => 13335013,
                  ),
                  81 => 
                  array (
                    'key' => 'Laminated-50IN02009115',
                    'value' => 13334651,
                  ),
                  82 => 
                  array (
                    'key' => 'Laminated-50IN02010115',
                    'value' => 13334395,
                  ),
                  83 => 
                  array (
                    'key' => 'MULTI-V PU-50IN01004014',
                    'value' => 13334371,
                  ),
                  84 => 
                  array (
                    'key' => 'Others-50IN02010111',
                    'value' => 13334392,
                  ),
                  85 => 
                  array (
                    'key' => 'Others-50IN99999999',
                    'value' => 13335349,
                  ),
                  86 => 
                  array (
                    'key' => 'Others-50IN03015111',
                    'value' => 13334926,
                  ),
                  87 => 
                  array (
                    'key' => 'Polyflat Elevator-50IN04023114',
                    'value' => 13335243,
                  ),
                  88 => 
                  array (
                    'key' => 'PowerSpan raw edge-50IN02009110',
                    'value' => 13334654,
                  ),
                  89 => 
                  array (
                    'key' => 'PowerSpan wrapped-50IN02010109',
                    'value' => 13334378,
                  ),
                  90 => 
                  array (
                    'key' => 'PU open ended-50IN03016130',
                    'value' => 13335094,
                  ),
                  91 => 
                  array (
                    'key' => 'RATOF-50IN99999998',
                    'value' => 13335346,
                  ),
                  92 => 
                  array (
                    'key' => 'Service Tools-50IN09039106',
                    'value' => 13335339,
                  ),
                  93 => 
                  array (
                    'key' => 'Sheaves-50IN08033100',
                    'value' => 13335304,
                  ),
                  94 => 
                  array (
                    'key' => 'Sprockets-50IN08034101',
                    'value' => 13335294,
                  ),
                  95 => 
                  array (
                    'key' => 'Tensioner-50IN09040107',
                    'value' => 13335319,
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
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'fieldtype' => 'fieldset',
             'labelWidth' => 100,
             'name' => 'SortingHeaders',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Sorting Columns',
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
          4 => 
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
             'name' => 'SortingColumns',
             'title' => 'SortingColumns',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => NULL,
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
