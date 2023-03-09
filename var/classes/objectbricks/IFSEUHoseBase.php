<?php 

/** 
* Generated at: 2023-03-09T06:37:55+01:00
* IP: 127.0.0.1


Fields Summary: 
- Reinforcement [select]
- staticWire [booleanSelect]
- staticWireType [select]
- tubeCharacteristic [select]
- colorInnerLining [select]
- InnerLining [select]
- hoseIdDec [numeric]
- hoseIdMM [numeric]
- propertiesInnerLayer [select]
- Coupling [input]
- sixDigitVirtualCatalogDescription [input]
- numberOfPlies [numeric]
- standards [multiselect]
- FieldsOfApplication [multiselect]
- Note2BelowTable [multiselect]
- withHelix [booleanSelect]
- Helix [input]
- agencyCompliance [multiselect]
- FlowMediumStability [booleanSelect]
- flowMedium [multiselect]
- Packaging [input]
- numberOfHelixWires [numeric]
- LayFlatHoseYN [booleanSelect]
- Haptic [select]
- CoverOuterLayer [select]
- ColorOuterLayer [select]
- designFactor [select]
- tubeGaugeFractional [input]
- safetyFactorARPMStandard [select]
- PropertiesOuterLayer [select]
- NonStockSizes [input]
- VirtualCatalogCoverMaterial [wysiwyg]
- VirtualCatalogTubeMaterial [wysiwyg]
- standardMetHoseComment [wysiwyg]
*/ 


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'IFSEUProduct',
      'fieldname' => 'Base',
    ),
  ),
   'dao' => NULL,
   'key' => 'IFSEUHoseBase',
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
                     'name' => 'Reinforcement',
                     'title' => 'Reinforcement',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                     'fieldtype' => 'booleanSelect',
                     'yesLabel' => 'Yes',
                     'noLabel' => 'No',
                     'emptyLabel' => 'Empty',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Empty',
                        'value' => 0,
                      ),
                      1 => 
                      array (
                        'key' => 'Yes',
                        'value' => 1,
                      ),
                      2 => 
                      array (
                        'key' => 'No',
                        'value' => -1,
                      ),
                    ),
                     'width' => 300,
                     'queryColumnType' => 'tinyint(1) null',
                     'columnType' => 'tinyint(1) null',
                     'phpdocType' => 'boolean',
                     'name' => 'staticWire',
                     'title' => 'Static Wire',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Stainless Steel',
                        'value' => 'Stainless Steel',
                      ),
                      1 => 
                      array (
                        'key' => 'Copper',
                        'value' => 'Copper',
                      ),
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
                     'name' => 'staticWireType',
                     'title' => 'Static Wire Type',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Corrugated',
                        'value' => 2633,
                      ),
                      1 => 
                      array (
                        'key' => 'Rough Bore',
                        'value' => 2635,
                      ),
                      2 => 
                      array (
                        'key' => 'Smooth',
                        'value' => 2632,
                      ),
                      3 => 
                      array (
                        'key' => 'Standard',
                        'value' => 2634,
                      ),
                      4 => 
                      array (
                        'key' => 'Wrapped',
                        'value' => 1829690,
                      ),
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
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'transparent',
                        'value' => 355,
                      ),
                      1 => 
                      array (
                        'key' => 'white',
                        'value' => 356,
                      ),
                      2 => 
                      array (
                        'key' => 'black',
                        'value' => 357,
                      ),
                      3 => 
                      array (
                        'key' => 'grey',
                        'value' => 358,
                      ),
                      4 => 
                      array (
                        'key' => 'bright',
                        'value' => 359,
                      ),
                      5 => 
                      array (
                        'key' => 'blue',
                        'value' => 381,
                      ),
                      6 => 
                      array (
                        'key' => 'red',
                        'value' => 382,
                      ),
                      7 => 
                      array (
                        'key' => 'orange',
                        'value' => 383,
                      ),
                      8 => 
                      array (
                        'key' => 'black or white',
                        'value' => 2779,
                      ),
                      9 => 
                      array (
                        'key' => 'light grey',
                        'value' => 2799,
                      ),
                      10 => 
                      array (
                        'key' => 'white with magnetic and X-ray detectable grey elastomer layer behind',
                        'value' => 2800,
                      ),
                    ),
                     'width' => 300,
                     'defaultValue' => '',
                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                     'optionsProviderData' => 'colorInn',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'dynamicOptions' => false,
                     'name' => 'colorInnerLining',
                     'title' => 'Color - Inner Lining',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'EPDM',
                        'value' => 345,
                      ),
                      1 => 
                      array (
                        'key' => 'NBR',
                        'value' => 346,
                      ),
                      2 => 
                      array (
                        'key' => 'NR',
                        'value' => 347,
                      ),
                      3 => 
                      array (
                        'key' => 'CR',
                        'value' => 348,
                      ),
                      4 => 
                      array (
                        'key' => 'CR-EPDM',
                        'value' => 349,
                      ),
                      5 => 
                      array (
                        'key' => 'UPE',
                        'value' => 350,
                      ),
                      6 => 
                      array (
                        'key' => 'FEP',
                        'value' => 351,
                      ),
                      7 => 
                      array (
                        'key' => 'CIIR',
                        'value' => 352,
                      ),
                      8 => 
                      array (
                        'key' => 'SBR',
                        'value' => 353,
                      ),
                      9 => 
                      array (
                        'key' => 'PA',
                        'value' => 354,
                      ),
                      10 => 
                      array (
                        'key' => 'Special elastomer',
                        'value' => 508,
                      ),
                      11 => 
                      array (
                        'key' => 'SBR-EPDM',
                        'value' => 509,
                      ),
                      12 => 
                      array (
                        'key' => 'CSM/BR',
                        'value' => 510,
                      ),
                      13 => 
                      array (
                        'key' => 'Fluoroplastic ',
                        'value' => 581,
                      ),
                      14 => 
                      array (
                        'key' => 'AEM',
                        'value' => 589,
                      ),
                      15 => 
                      array (
                        'key' => 'SBR-BR',
                        'value' => 612,
                      ),
                      16 => 
                      array (
                        'key' => 'SBR-NR',
                        'value' => 1616,
                      ),
                      17 => 
                      array (
                        'key' => 'no fuel solubility',
                        'value' => 1642,
                      ),
                      18 => 
                      array (
                        'key' => 'Synthetic rubber',
                        'value' => 2622,
                      ),
                      19 => 
                      array (
                        'key' => 'CPE',
                        'value' => 2628,
                      ),
                      20 => 
                      array (
                        'key' => 'CM',
                        'value' => 2646,
                      ),
                      21 => 
                      array (
                        'key' => 'FPM',
                        'value' => 2648,
                      ),
                      22 => 
                      array (
                        'key' => 'ECO',
                        'value' => 2685,
                      ),
                      23 => 
                      array (
                        'key' => 'FPM/HNBR',
                        'value' => 2687,
                      ),
                      24 => 
                      array (
                        'key' => 'FPM/AEM',
                        'value' => 2692,
                      ),
                      25 => 
                      array (
                        'key' => 'FPM/ECO',
                        'value' => 2694,
                      ),
                      26 => 
                      array (
                        'key' => 'HNBR',
                        'value' => 2700,
                      ),
                      27 => 
                      array (
                        'key' => 'UHMWPE',
                        'value' => 2727,
                      ),
                      28 => 
                      array (
                        'key' => 'PU',
                        'value' => 2736,
                      ),
                      29 => 
                      array (
                        'key' => 'EPDM black or EPM white',
                        'value' => 2780,
                      ),
                      30 => 
                      array (
                        'key' => 'PTFE',
                        'value' => 2802,
                      ),
                    ),
                     'width' => 300,
                     'defaultValue' => '',
                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                     'optionsProviderData' => 'innerlining',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'dynamicOptions' => false,
                     'name' => 'InnerLining',
                     'title' => 'Inner Lining',
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
                  6 => 
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
                     'decimalPrecision' => 2,
                     'name' => 'hoseIdDec',
                     'title' => 'Hose ID (in) (Dec.) Nominal ID',
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
                  7 => 
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
                     'decimalPrecision' => 2,
                     'name' => 'hoseIdMM',
                     'title' => 'Hose ID (mm) Nominal ID',
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
                  8 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Robust',
                        'value' => 461,
                      ),
                      1 => 
                      array (
                        'key' => 'Low resistance to flow',
                        'value' => 462,
                      ),
                      2 => 
                      array (
                        'key' => 'Indestructible',
                        'value' => 463,
                      ),
                      3 => 
                      array (
                        'key' => 'Long-lasting',
                        'value' => 464,
                      ),
                      4 => 
                      array (
                        'key' => 'Absolutely neutral to taste and odour',
                        'value' => 465,
                      ),
                      5 => 
                      array (
                        'key' => 'Highly flexible',
                        'value' => 466,
                      ),
                      6 => 
                      array (
                        'key' => 'Easy to handle',
                        'value' => 467,
                      ),
                      7 => 
                      array (
                        'key' => 'Vacuum stable',
                        'value' => 468,
                      ),
                      8 => 
                      array (
                        'key' => 'Temperature-restistant',
                        'value' => 469,
                      ),
                      9 => 
                      array (
                        'key' => 'Lightweight',
                        'value' => 470,
                      ),
                      10 => 
                      array (
                        'key' => 'Kink-resistant',
                        'value' => 471,
                      ),
                      11 => 
                      array (
                        'key' => 'Heat-resistant',
                        'value' => 472,
                      ),
                      12 => 
                      array (
                        'key' => 'High-performance',
                        'value' => 473,
                      ),
                      13 => 
                      array (
                        'key' => 'Cold-elastic',
                        'value' => 474,
                      ),
                      14 => 
                      array (
                        'key' => 'Extremely durable',
                        'value' => 475,
                      ),
                      15 => 
                      array (
                        'key' => 'High functionality',
                        'value' => 476,
                      ),
                      16 => 
                      array (
                        'key' => 'Free of twists',
                        'value' => 477,
                      ),
                      17 => 
                      array (
                        'key' => 'Can be cleaned by CIP installations',
                        'value' => 478,
                      ),
                      18 => 
                      array (
                        'key' => 'Dimensionally stable',
                        'value' => 479,
                      ),
                      19 => 
                      array (
                        'key' => 'Can be overrun (except construction with steel wire helix)',
                        'value' => 480,
                      ),
                      20 => 
                      array (
                        'key' => '2 years warranty',
                        'value' => 481,
                      ),
                      21 => 
                      array (
                        'key' => 'Ageing resistant',
                        'value' => 482,
                      ),
                      22 => 
                      array (
                        'key' => 'Resistant to commonly used cleaning and disinfecting products',
                        'value' => 483,
                      ),
                      23 => 
                      array (
                        'key' => 'Recommended fittings system PAGUFIX®',
                        'value' => 484,
                      ),
                      24 => 
                      array (
                        'key' => 'Suitable for pure alcohol up to 100%',
                        'value' => 485,
                      ),
                      25 => 
                      array (
                        'key' => 'Release agent- and fat free, free from product harmful to lacquer',
                        'value' => 486,
                      ),
                      26 => 
                      array (
                        'key' => '5 years warranty',
                        'value' => 489,
                      ),
                      27 => 
                      array (
                        'key' => 'Up to DN 25 release agent- and fat free, free from product harmful to lacquer',
                        'value' => 490,
                      ),
                      28 => 
                      array (
                        'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω/line',
                        'value' => 491,
                      ),
                      29 => 
                      array (
                        'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω/m',
                        'value' => 492,
                      ),
                      30 => 
                      array (
                        'key' => 'Electrically conductive, 10<sup>3</sup> Ω < R < 10<sup>8</sup> Ω ',
                        'value' => 493,
                      ),
                      31 => 
                      array (
                        'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω',
                        'value' => 494,
                      ),
                      32 => 
                      array (
                        'key' => 'Suitable for all wellknown brands',
                        'value' => 495,
                      ),
                    ),
                     'width' => 300,
                     'defaultValue' => '',
                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                     'optionsProviderData' => 'propertiesGeneral',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'dynamicOptions' => false,
                     'name' => 'propertiesInnerLayer',
                     'title' => 'Properties Inner Layer',
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
                     'name' => 'Coupling',
                     'title' => 'Coupling',
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
                  10 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 300,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 150,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'sixDigitVirtualCatalogDescription',
                     'title' => 'Six Digit Virtual Catalog Description',
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
                  11 => 
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
                     'decimalPrecision' => 0,
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
                  12 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 10,
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'standards',
                     'title' => 'Standards',
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
                  13 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 10,
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'FieldsOfApplication',
                     'title' => 'Fields Of Application',
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
                  14 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 10,
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'Note2BelowTable',
                     'title' => 'Note 2 (Below Table)',
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
                  15 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                     'fieldtype' => 'booleanSelect',
                     'yesLabel' => 'Yes',
                     'noLabel' => 'No',
                     'emptyLabel' => 'Empty',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Empty',
                        'value' => 0,
                      ),
                      1 => 
                      array (
                        'key' => 'Yes',
                        'value' => 1,
                      ),
                      2 => 
                      array (
                        'key' => 'No',
                        'value' => -1,
                      ),
                    ),
                     'width' => 300,
                     'queryColumnType' => 'tinyint(1) null',
                     'columnType' => 'tinyint(1) null',
                     'phpdocType' => 'boolean',
                     'name' => 'withHelix',
                     'title' => 'With Helix',
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
                  16 => 
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
                     'name' => 'Helix',
                     'title' => 'Helix',
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
                  17 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => '3-A 18-03',
                        'value' => 2587,
                      ),
                      1 => 
                      array (
                        'key' => 'CARB',
                        'value' => 2595,
                      ),
                      2 => 
                      array (
                        'key' => 'CSA',
                        'value' => 2594,
                      ),
                      3 => 
                      array (
                        'key' => 'CUL',
                        'value' => 2596,
                      ),
                      4 => 
                      array (
                        'key' => 'FDA',
                        'value' => 2585,
                      ),
                      5 => 
                      array (
                        'key' => 'FMVSS',
                        'value' => 2589,
                      ),
                      6 => 
                      array (
                        'key' => 'MIL -AA59565 (compressed air)',
                        'value' => 2593,
                      ),
                      7 => 
                      array (
                        'key' => 'MSHA',
                        'value' => 2590,
                      ),
                      8 => 
                      array (
                        'key' => 'NIOSH (Air Breathing)',
                        'value' => 2592,
                      ),
                      9 => 
                      array (
                        'key' => 'NMMA (Marine Hose)',
                        'value' => 2591,
                      ),
                      10 => 
                      array (
                        'key' => 'NSF',
                        'value' => 2597,
                      ),
                      11 => 
                      array (
                        'key' => 'UL',
                        'value' => 2588,
                      ),
                      12 => 
                      array (
                        'key' => 'USDA',
                        'value' => 2586,
                      ),
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 10,
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
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  18 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                     'fieldtype' => 'booleanSelect',
                     'yesLabel' => 'Yes',
                     'noLabel' => 'No',
                     'emptyLabel' => 'Empty',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Empty',
                        'value' => 0,
                      ),
                      1 => 
                      array (
                        'key' => 'Yes',
                        'value' => 1,
                      ),
                      2 => 
                      array (
                        'key' => 'No',
                        'value' => -1,
                      ),
                    ),
                     'width' => 300,
                     'queryColumnType' => 'tinyint(1) null',
                     'columnType' => 'tinyint(1) null',
                     'phpdocType' => 'boolean',
                     'name' => 'FlowMediumStability',
                     'title' => 'Flow Medium - Stability',
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
                  19 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'fieldtype' => 'multiselect',
                     'options' => 
                    array (
                    ),
                     'width' => 300,
                     'height' => '',
                     'maxItems' => 10,
                     'renderType' => 'tags',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                     'queryColumnType' => 'text',
                     'columnType' => 'text',
                     'phpdocType' => 'array',
                     'dynamicOptions' => false,
                     'name' => 'flowMedium',
                     'title' => 'Flow Medium',
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
                  20 => 
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
                     'style' => 'margin-left: 20px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                     'fieldtype' => 'booleanSelect',
                     'yesLabel' => 'Yes',
                     'noLabel' => 'No',
                     'emptyLabel' => 'Empty',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Empty',
                        'value' => 0,
                      ),
                      1 => 
                      array (
                        'key' => 'Yes',
                        'value' => 1,
                      ),
                      2 => 
                      array (
                        'key' => 'No',
                        'value' => -1,
                      ),
                    ),
                     'width' => 300,
                     'queryColumnType' => 'tinyint(1) null',
                     'columnType' => 'tinyint(1) null',
                     'phpdocType' => 'boolean',
                     'name' => 'LayFlatHoseYN',
                     'title' => 'Lay-Flat Hose Y/N',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'fabric patterned',
                        'value' => 386,
                      ),
                      1 => 
                      array (
                        'key' => 'smooth',
                        'value' => 387,
                      ),
                      2 => 
                      array (
                        'key' => 'strongly corrugated',
                        'value' => 520,
                      ),
                      3 => 
                      array (
                        'key' => 'grooved',
                        'value' => 591,
                      ),
                    ),
                     'width' => 300,
                     'defaultValue' => '',
                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                     'optionsProviderData' => 'haptic',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'dynamicOptions' => false,
                     'name' => 'Haptic',
                     'title' => 'Haptic',
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
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'EPDM',
                        'value' => 370,
                      ),
                      1 => 
                      array (
                        'key' => 'NBR',
                        'value' => 371,
                      ),
                      2 => 
                      array (
                        'key' => 'NR',
                        'value' => 372,
                      ),
                      3 => 
                      array (
                        'key' => 'CR',
                        'value' => 373,
                      ),
                      4 => 
                      array (
                        'key' => 'CR-EPDM',
                        'value' => 374,
                      ),
                      5 => 
                      array (
                        'key' => 'UPE',
                        'value' => 375,
                      ),
                      6 => 
                      array (
                        'key' => 'FEP',
                        'value' => 376,
                      ),
                      7 => 
                      array (
                        'key' => 'CIIR',
                        'value' => 377,
                      ),
                      8 => 
                      array (
                        'key' => 'SBR',
                        'value' => 378,
                      ),
                      9 => 
                      array (
                        'key' => 'PA',
                        'value' => 379,
                      ),
                      10 => 
                      array (
                        'key' => 'SBR-EPDM',
                        'value' => 519,
                      ),
                      11 => 
                      array (
                        'key' => 'CSM-BR ',
                        'value' => 547,
                      ),
                      12 => 
                      array (
                        'key' => 'Spezial elastomer',
                        'value' => 560,
                      ),
                      13 => 
                      array (
                        'key' => 'AEM',
                        'value' => 590,
                      ),
                      14 => 
                      array (
                        'key' => 'CM',
                        'value' => 605,
                      ),
                      15 => 
                      array (
                        'key' => 'SBR-BR',
                        'value' => 611,
                      ),
                      16 => 
                      array (
                        'key' => 'CR-BR',
                        'value' => 1613,
                      ),
                      17 => 
                      array (
                        'key' => 'IR-BR',
                        'value' => 1615,
                      ),
                      18 => 
                      array (
                        'key' => 'SBR-NR',
                        'value' => 2619,
                      ),
                      19 => 
                      array (
                        'key' => 'Synthetic rubber',
                        'value' => 2623,
                      ),
                      20 => 
                      array (
                        'key' => 'CPE',
                        'value' => 2629,
                      ),
                      21 => 
                      array (
                        'key' => 'CMD',
                        'value' => 2643,
                      ),
                      22 => 
                      array (
                        'key' => 'PES',
                        'value' => 2654,
                      ),
                      23 => 
                      array (
                        'key' => 'CSM',
                        'value' => 2688,
                      ),
                      24 => 
                      array (
                        'key' => 'ECO',
                        'value' => 2696,
                      ),
                      25 => 
                      array (
                        'key' => 'CO',
                        'value' => 2698,
                      ),
                      26 => 
                      array (
                        'key' => 'NBR-PVC',
                        'value' => 2722,
                      ),
                    ),
                     'width' => 300,
                     'defaultValue' => '',
                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                     'optionsProviderData' => 'cover',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'dynamicOptions' => false,
                     'name' => 'CoverOuterLayer',
                     'title' => 'Color - Outer Layer',
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
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'blue',
                        'value' => 452,
                      ),
                      1 => 
                      array (
                        'key' => 'grey',
                        'value' => 453,
                      ),
                      2 => 
                      array (
                        'key' => 'bright',
                        'value' => 454,
                      ),
                      3 => 
                      array (
                        'key' => 'orange',
                        'value' => 455,
                      ),
                      4 => 
                      array (
                        'key' => 'red',
                        'value' => 456,
                      ),
                      5 => 
                      array (
                        'key' => 'black',
                        'value' => 457,
                      ),
                      6 => 
                      array (
                        'key' => 'transparent',
                        'value' => 458,
                      ),
                      7 => 
                      array (
                        'key' => 'white',
                        'value' => 459,
                      ),
                      8 => 
                      array (
                        'key' => 'red-orange',
                        'value' => 545,
                      ),
                      9 => 
                      array (
                        'key' => 'blue and red',
                        'value' => 549,
                      ),
                    ),
                     'width' => 300,
                     'defaultValue' => '',
                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                     'optionsProviderData' => 'colorOut',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'dynamicOptions' => false,
                     'name' => 'ColorOuterLayer',
                     'title' => 'Cover - Outer Layer',
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
                  5 => 
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
                     'name' => 'designFactor',
                     'title' => 'Design Factor',
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
                     'name' => 'tubeGaugeFractional',
                     'title' => 'Tube Gauge (Fractional)',
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
                     'name' => 'safetyFactorARPMStandard',
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
                     'defaultValueGenerator' => '',
                  )),
                  8 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Robust',
                        'value' => 461,
                      ),
                      1 => 
                      array (
                        'key' => 'Low resistance to flow',
                        'value' => 462,
                      ),
                      2 => 
                      array (
                        'key' => 'Indestructible',
                        'value' => 463,
                      ),
                      3 => 
                      array (
                        'key' => 'Long-lasting',
                        'value' => 464,
                      ),
                      4 => 
                      array (
                        'key' => 'Absolutely neutral to taste and odour',
                        'value' => 465,
                      ),
                      5 => 
                      array (
                        'key' => 'Highly flexible',
                        'value' => 466,
                      ),
                      6 => 
                      array (
                        'key' => 'Easy to handle',
                        'value' => 467,
                      ),
                      7 => 
                      array (
                        'key' => 'Vacuum stable',
                        'value' => 468,
                      ),
                      8 => 
                      array (
                        'key' => 'Temperature-restistant',
                        'value' => 469,
                      ),
                      9 => 
                      array (
                        'key' => 'Lightweight',
                        'value' => 470,
                      ),
                      10 => 
                      array (
                        'key' => 'Kink-resistant',
                        'value' => 471,
                      ),
                      11 => 
                      array (
                        'key' => 'Heat-resistant',
                        'value' => 472,
                      ),
                      12 => 
                      array (
                        'key' => 'High-performance',
                        'value' => 473,
                      ),
                      13 => 
                      array (
                        'key' => 'Cold-elastic',
                        'value' => 474,
                      ),
                      14 => 
                      array (
                        'key' => 'Extremely durable',
                        'value' => 475,
                      ),
                      15 => 
                      array (
                        'key' => 'High functionality',
                        'value' => 476,
                      ),
                      16 => 
                      array (
                        'key' => 'Free of twists',
                        'value' => 477,
                      ),
                      17 => 
                      array (
                        'key' => 'Can be cleaned by CIP installations',
                        'value' => 478,
                      ),
                      18 => 
                      array (
                        'key' => 'Dimensionally stable',
                        'value' => 479,
                      ),
                      19 => 
                      array (
                        'key' => 'Can be overrun (except construction with steel wire helix)',
                        'value' => 480,
                      ),
                      20 => 
                      array (
                        'key' => '2 years warranty',
                        'value' => 481,
                      ),
                      21 => 
                      array (
                        'key' => 'Ageing resistant',
                        'value' => 482,
                      ),
                      22 => 
                      array (
                        'key' => 'Resistant to commonly used cleaning and disinfecting products',
                        'value' => 483,
                      ),
                      23 => 
                      array (
                        'key' => 'Recommended fittings system PAGUFIX®',
                        'value' => 484,
                      ),
                      24 => 
                      array (
                        'key' => 'Suitable for pure alcohol up to 100%',
                        'value' => 485,
                      ),
                      25 => 
                      array (
                        'key' => 'Release agent- and fat free, free from product harmful to lacquer',
                        'value' => 486,
                      ),
                      26 => 
                      array (
                        'key' => '5 years warranty',
                        'value' => 489,
                      ),
                      27 => 
                      array (
                        'key' => 'Up to DN 25 release agent- and fat free, free from product harmful to lacquer',
                        'value' => 490,
                      ),
                      28 => 
                      array (
                        'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω/line',
                        'value' => 491,
                      ),
                      29 => 
                      array (
                        'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω/m',
                        'value' => 492,
                      ),
                      30 => 
                      array (
                        'key' => 'Electrically conductive, 10<sup>3</sup> Ω < R < 10<sup>8</sup> Ω ',
                        'value' => 493,
                      ),
                      31 => 
                      array (
                        'key' => 'Electrically conductive, R < 10<sup>6</sup> Ω',
                        'value' => 494,
                      ),
                      32 => 
                      array (
                        'key' => 'Suitable for all wellknown brands',
                        'value' => 495,
                      ),
                    ),
                     'width' => 300,
                     'defaultValue' => '',
                     'optionsProviderClass' => 'IFSEU\\ImportBundle\\OptionProvider\\PropertiesOptionsProvider',
                     'optionsProviderData' => 'propertiesGeneral',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'dynamicOptions' => false,
                     'name' => 'PropertiesOuterLayer',
                     'title' => 'Properties Outer Layer',
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
                     'name' => 'NonStockSizes',
                     'title' => 'Non-Stock/Sizes',
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
                  10 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                     'fieldtype' => 'wysiwyg',
                     'width' => 295,
                     'height' => 150,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'toolbarConfig' => '',
                     'excludeFromSearchIndex' => false,
                     'name' => 'VirtualCatalogCoverMaterial',
                     'title' => 'Virtual Catalog Cover Material',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:225px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  11 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                     'fieldtype' => 'wysiwyg',
                     'width' => 295,
                     'height' => 150,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'toolbarConfig' => '',
                     'excludeFromSearchIndex' => false,
                     'name' => 'VirtualCatalogTubeMaterial',
                     'title' => 'Virtual Catalog Tube Material',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:225px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  12 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                     'fieldtype' => 'wysiwyg',
                     'width' => 295,
                     'height' => 150,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'toolbarConfig' => '',
                     'excludeFromSearchIndex' => false,
                     'name' => 'standardMetHoseComment',
                     'title' => 'Standard Met- Hose "Comment"',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:225px;',
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
         'icon' => '',
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
));
