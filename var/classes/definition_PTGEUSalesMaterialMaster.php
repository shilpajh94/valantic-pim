<?php 

/** 
* Generated at: 2022-06-22T14:40:24+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- Material [manyToManyObjectRelation]
- salesOrganization [manyToOneRelation]
- distributionChannel [manyToOneRelation]
- deliveringPlant [manyToOneRelation]
- countryOfOrigin [manyToOneRelation]
- salesUOM [input]
- salesText1 [textarea]
- deletedFlagAtDistributionChainLevel [numeric]
- epixFlag [booleanSelect]
- pricePageFlag [booleanSelect]
- privateBrand [select]
- deletedFlagAtSalesLevel [booleanSelect]
- salesText2 [textarea]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '41',
   'name' => 'PTGEUSalesMaterialMaster',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1655901624,
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
         'labelWidth' => 150,
         'layout' => NULL,
         'border' => false,
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => 'Sales Material Data',
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
             'fieldtype' => 'text',
             'html' => 'Imported From SAP',
             'renderingClass' => '',
             'renderingData' => '',
             'border' => false,
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => '',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
            ),
             'locked' => false,
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
             'fieldtype' => 'manyToManyObjectRelation',
             'width' => 1140,
             'height' => '',
             'maxItems' => '',
             'queryColumnType' => 'text',
             'phpdocType' => 'array',
             'relationType' => true,
             'visibleFields' => 'id,key,articleNumber',
             'allowToCreateNewObject' => false,
             'optimizedAdminLoading' => false,
             'visibleFieldDefinitions' => 
            array (
            ),
             'classes' => 
            array (
              0 => 
              array (
                'classes' => 'PTGEUProduct',
              ),
            ),
             'pathFormatterClass' => '',
             'name' => 'Material',
             'title' => 'Material',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => true,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
          )),
          2 => 
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => 310,
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => true,
                     'assetsAllowed' => false,
                     'assetTypes' => 
                    array (
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'classes' => 
                    array (
                      0 => 
                      array (
                        'classes' => 'SalesOrganisation',
                      ),
                    ),
                     'pathFormatterClass' => 'AppBundle\\Formatter\\PathFormatter',
                     'name' => 'salesOrganization',
                     'title' => 'Sales Organization',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => 310,
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => true,
                     'assetsAllowed' => false,
                     'assetTypes' => 
                    array (
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'classes' => 
                    array (
                      0 => 
                      array (
                        'classes' => 'DistributionChannel',
                      ),
                    ),
                     'pathFormatterClass' => 'AppBundle\\Formatter\\PathFormatter',
                     'name' => 'distributionChannel',
                     'title' => 'Distribution Channel',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => 310,
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => true,
                     'assetsAllowed' => false,
                     'assetTypes' => 
                    array (
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'classes' => 
                    array (
                      0 => 
                      array (
                        'classes' => 'Plant',
                      ),
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'deliveringPlant',
                     'title' => 'Delivering Plant',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'fieldtype' => 'manyToOneRelation',
                     'width' => 310,
                     'assetUploadPath' => '',
                     'relationType' => true,
                     'queryColumnType' => 
                    array (
                      'id' => 'int(11)',
                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                    ),
                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                     'objectsAllowed' => true,
                     'assetsAllowed' => false,
                     'assetTypes' => 
                    array (
                    ),
                     'documentsAllowed' => false,
                     'documentTypes' => 
                    array (
                    ),
                     'classes' => 
                    array (
                      0 => 
                      array (
                        'classes' => 'Country',
                      ),
                    ),
                     'pathFormatterClass' => '',
                     'name' => 'countryOfOrigin',
                     'title' => 'Country Of Origin',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 350,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'salesUOM',
                     'title' => 'Sales Unit',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'fieldtype' => 'textarea',
                     'width' => 350,
                     'height' => 150,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'name' => 'salesText1',
                     'title' => 'Sales Text1',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
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
                 'bodyStyle' => 'float:left; margin-left: 20px;',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'childs' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'fieldtype' => 'numeric',
                     'width' => 350,
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
                     'name' => 'deletedFlagAtDistributionChainLevel',
                     'title' => 'Deleted / Obsoleted Flag Distribution Chain Level',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
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
                     'emptyLabel' => 'No',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'No',
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
                     'width' => 350,
                     'queryColumnType' => 'tinyint(1) null',
                     'columnType' => 'tinyint(1) null',
                     'phpdocType' => 'boolean',
                     'name' => 'epixFlag',
                     'title' => 'Epix Flag / B2B Flag',
                     'tooltip' => 'Material Group 1 is Apex/B2B flag.',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                     'fieldtype' => 'booleanSelect',
                     'yesLabel' => 'Yes',
                     'noLabel' => 'No',
                     'emptyLabel' => 'No',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'No',
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
                     'width' => 350,
                     'queryColumnType' => 'tinyint(1) null',
                     'columnType' => 'tinyint(1) null',
                     'phpdocType' => 'boolean',
                     'name' => 'pricePageFlag',
                     'title' => 'Price Page Flag',
                     'tooltip' => 'Material Group 2 is a price page flag. ',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'fieldtype' => 'select',
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => '1-Continental',
                        'value' => 11047351,
                      ),
                      1 => 
                      array (
                        'key' => '100-PBL_PSROLMAN',
                        'value' => 11047435,
                      ),
                      2 => 
                      array (
                        'key' => '101-PBL_QUALCAST',
                        'value' => 11047436,
                      ),
                      3 => 
                      array (
                        'key' => '102-PBL_QUALTEX',
                        'value' => 11047437,
                      ),
                      4 => 
                      array (
                        'key' => '103-PBL_RIETER',
                        'value' => 11047438,
                      ),
                      5 => 
                      array (
                        'key' => '104-PBL_ROULUNDS',
                        'value' => 11047439,
                      ),
                      6 => 
                      array (
                        'key' => '105-PBL_RUBANG',
                        'value' => 11047440,
                      ),
                      7 => 
                      array (
                        'key' => '106-PBL_RUWAC',
                        'value' => 11047441,
                      ),
                      8 => 
                      array (
                        'key' => '107-PBL_SABO',
                        'value' => 11047442,
                      ),
                      9 => 
                      array (
                        'key' => '108-PBL_SANOK',
                        'value' => 11047443,
                      ),
                      10 => 
                      array (
                        'key' => '109-PBL_SCANCOIN',
                        'value' => 11047444,
                      ),
                      11 => 
                      array (
                        'key' => '110-PBL_Schaeffler',
                        'value' => 11047445,
                      ),
                      12 => 
                      array (
                        'key' => '111-PBL_SCHAUBL',
                        'value' => 11047446,
                      ),
                      13 => 
                      array (
                        'key' => '112-PBL_SCHENCK',
                        'value' => 11047447,
                      ),
                      14 => 
                      array (
                        'key' => '113-PBL_SCHINDLER',
                        'value' => 11047448,
                      ),
                      15 => 
                      array (
                        'key' => '114-PBL_SCHLAFHORST',
                        'value' => 11047449,
                      ),
                      16 => 
                      array (
                        'key' => '115-PBL_SCHWALBE',
                        'value' => 11047450,
                      ),
                      17 => 
                      array (
                        'key' => '116-PBL_SEPAMATIC',
                        'value' => 11047451,
                      ),
                      18 => 
                      array (
                        'key' => '117-PBL_SHELBOURNE',
                        'value' => 11047452,
                      ),
                      19 => 
                      array (
                        'key' => '118-PBL_SIGERIST',
                        'value' => 11047453,
                      ),
                      20 => 
                      array (
                        'key' => '119-PBL_SILGAN',
                        'value' => 11047454,
                      ),
                      21 => 
                      array (
                        'key' => '120-PBL_Singer',
                        'value' => 11047455,
                      ),
                      22 => 
                      array (
                        'key' => '121-PBL_SKLOSTROJ',
                        'value' => 11047456,
                      ),
                      23 => 
                      array (
                        'key' => '122-PBL_SODIKART',
                        'value' => 11047457,
                      ),
                      24 => 
                      array (
                        'key' => '123-PBL_SPEED CONTROL',
                        'value' => 11047458,
                      ),
                      25 => 
                      array (
                        'key' => '124-PBL_SPHEROS',
                        'value' => 11047459,
                      ),
                      26 => 
                      array (
                        'key' => '125-PBL_STIGA',
                        'value' => 11047460,
                      ),
                      27 => 
                      array (
                        'key' => '126-PBL_STIHL',
                        'value' => 11047461,
                      ),
                      28 => 
                      array (
                        'key' => '127-PBL_STILL',
                        'value' => 11047462,
                      ),
                      29 => 
                      array (
                        'key' => '128-PBL_SUMEIDA',
                        'value' => 11047463,
                      ),
                      30 => 
                      array (
                        'key' => '129-PBL_TAGEX',
                        'value' => 11047464,
                      ),
                      31 => 
                      array (
                        'key' => '130-PBL_TATA',
                        'value' => 11047465,
                      ),
                      32 => 
                      array (
                        'key' => '131-PBL_THERMOKING',
                        'value' => 11047466,
                      ),
                      33 => 
                      array (
                        'key' => '132-PBL_THYS',
                        'value' => 11047467,
                      ),
                      34 => 
                      array (
                        'key' => '133-PBL_TIC',
                        'value' => 11047468,
                      ),
                      35 => 
                      array (
                        'key' => '134-PBL_TKING',
                        'value' => 11047469,
                      ),
                      36 => 
                      array (
                        'key' => '135-PBL_TRUVOX',
                        'value' => 11047470,
                      ),
                      37 => 
                      array (
                        'key' => '136-PBL_TUBE WINDER',
                        'value' => 11047471,
                      ),
                      38 => 
                      array (
                        'key' => '137-PBL_UNIMAQ',
                        'value' => 11047472,
                      ),
                      39 => 
                      array (
                        'key' => '138-PBL_UNITEC',
                        'value' => 11047473,
                      ),
                      40 => 
                      array (
                        'key' => '139-PBL_VARIMAX',
                        'value' => 11047474,
                      ),
                      41 => 
                      array (
                        'key' => '140-PBL_VARIO SIT',
                        'value' => 11047475,
                      ),
                      42 => 
                      array (
                        'key' => '141-PBL_VIGAN',
                        'value' => 11047476,
                      ),
                      43 => 
                      array (
                        'key' => '142-PBL_VORWERK',
                        'value' => 11047477,
                      ),
                      44 => 
                      array (
                        'key' => '143-PBL_VW',
                        'value' => 11047478,
                      ),
                      45 => 
                      array (
                        'key' => '144-PBL_W+H',
                        'value' => 11047479,
                      ),
                      46 => 
                      array (
                        'key' => '145-PBL_WALTHER FLENDER',
                        'value' => 11047480,
                      ),
                      47 => 
                      array (
                        'key' => '146-PBL_WESSEL',
                        'value' => 11047481,
                      ),
                      48 => 
                      array (
                        'key' => '147-PBL_WESTFALIA',
                        'value' => 11047482,
                      ),
                      49 => 
                      array (
                        'key' => '148-PBL_WHIRLPOOL',
                        'value' => 11047483,
                      ),
                      50 => 
                      array (
                        'key' => '149-PBL_WHM',
                        'value' => 11047484,
                      ),
                      51 => 
                      array (
                        'key' => '150-PBL_WODSCHOW',
                        'value' => 11047485,
                      ),
                      52 => 
                      array (
                        'key' => '151-PBL_WOLF',
                        'value' => 11047486,
                      ),
                      53 => 
                      array (
                        'key' => '152-PBL_WYKO',
                        'value' => 11047487,
                      ),
                      54 => 
                      array (
                        'key' => '153-PBL_ZF',
                        'value' => 11047488,
                      ),
                      55 => 
                      array (
                        'key' => '154-PBL_AGATECH',
                        'value' => 11047489,
                      ),
                      56 => 
                      array (
                        'key' => '155-PBL_AGCO',
                        'value' => 11047490,
                      ),
                      57 => 
                      array (
                        'key' => '156-PBL_Audi',
                        'value' => 11047491,
                      ),
                      58 => 
                      array (
                        'key' => '157-PBL_AZETA',
                        'value' => 11047492,
                      ),
                      59 => 
                      array (
                        'key' => '158-PBL_Barne',
                        'value' => 11047493,
                      ),
                      60 => 
                      array (
                        'key' => '159-PBL_Bergmann',
                        'value' => 11047494,
                      ),
                      61 => 
                      array (
                        'key' => '160-PBL_Boekholt',
                        'value' => 11047495,
                      ),
                      62 => 
                      array (
                        'key' => '161-PBL_BUECHI',
                        'value' => 11047496,
                      ),
                      63 => 
                      array (
                        'key' => '162-PBL_DANA',
                        'value' => 11047497,
                      ),
                      64 => 
                      array (
                        'key' => '163-PBL_Eriks',
                        'value' => 11047498,
                      ),
                      65 => 
                      array (
                        'key' => '164-PBL_ETESIA',
                        'value' => 11047499,
                      ),
                      66 => 
                      array (
                        'key' => '165-PBL_EUROSTEAM',
                        'value' => 11047500,
                      ),
                      67 => 
                      array (
                        'key' => '166-PBL_FIAT',
                        'value' => 11047501,
                      ),
                      68 => 
                      array (
                        'key' => '167-PBL_Fischer Panda',
                        'value' => 11047502,
                      ),
                      69 => 
                      array (
                        'key' => '168-PBL_Gates',
                        'value' => 11047503,
                      ),
                      70 => 
                      array (
                        'key' => '169-PBL_Heidelberger',
                        'value' => 11047504,
                      ),
                      71 => 
                      array (
                        'key' => '170-PBL_HOMESPARES',
                        'value' => 11047505,
                      ),
                      72 => 
                      array (
                        'key' => '171-PBL_Imesa',
                        'value' => 11047506,
                      ),
                      73 => 
                      array (
                        'key' => '172-PBL_INA',
                        'value' => 11047507,
                      ),
                      74 => 
                      array (
                        'key' => '173-PBL_Innofit',
                        'value' => 11047508,
                      ),
                      75 => 
                      array (
                        'key' => '174-PBL_IVECO',
                        'value' => 11047509,
                      ),
                      76 => 
                      array (
                        'key' => '175-PBL_Ixion',
                        'value' => 11047510,
                      ),
                      77 => 
                      array (
                        'key' => '176-PBL_Jacob Mueller',
                        'value' => 11047511,
                      ),
                      78 => 
                      array (
                        'key' => '177-PBL_MAN',
                        'value' => 11047512,
                      ),
                      79 => 
                      array (
                        'key' => '178-PBL_MB',
                        'value' => 11047513,
                      ),
                      80 => 
                      array (
                        'key' => '179-PBL_MERITANO',
                        'value' => 11047514,
                      ),
                      81 => 
                      array (
                        'key' => '180-PBL_MONARK',
                        'value' => 11047515,
                      ),
                      82 => 
                      array (
                        'key' => '181-PBL_MOTOBEC',
                        'value' => 11047516,
                      ),
                      83 => 
                      array (
                        'key' => '182-PBL_MOTRIO',
                        'value' => 11047517,
                      ),
                      84 => 
                      array (
                        'key' => '183-PBL_NASOTO',
                        'value' => 11047518,
                      ),
                      85 => 
                      array (
                        'key' => '184-PBL_NEW FIT',
                        'value' => 11047519,
                      ),
                      86 => 
                      array (
                        'key' => '185-PBL_Panasonic',
                        'value' => 11047520,
                      ),
                      87 => 
                      array (
                        'key' => '186-PBL_RHIAG',
                        'value' => 11047521,
                      ),
                      88 => 
                      array (
                        'key' => '187-PBL_Rover',
                        'value' => 11047522,
                      ),
                      89 => 
                      array (
                        'key' => '188-PBL_SAINTGOBAIN',
                        'value' => 11047523,
                      ),
                      90 => 
                      array (
                        'key' => '189-PBL_SCANIA',
                        'value' => 11047524,
                      ),
                      91 => 
                      array (
                        'key' => '190-PBL_SKF',
                        'value' => 11047525,
                      ),
                      92 => 
                      array (
                        'key' => '191-PBL_STOMIL',
                        'value' => 11047526,
                      ),
                      93 => 
                      array (
                        'key' => '192-PBL_Temsa',
                        'value' => 11047527,
                      ),
                      94 => 
                      array (
                        'key' => '193-PBL_Triumph',
                        'value' => 11047528,
                      ),
                      95 => 
                      array (
                        'key' => '194-PBL_TRUETZLER',
                        'value' => 11047529,
                      ),
                      96 => 
                      array (
                        'key' => '195-PBL_Vertex',
                        'value' => 11047530,
                      ),
                      97 => 
                      array (
                        'key' => '196-PBL_VOSTERMAN',
                        'value' => 11047531,
                      ),
                      98 => 
                      array (
                        'key' => '197-PBL_Welltrans',
                        'value' => 11047532,
                      ),
                      99 => 
                      array (
                        'key' => '198-PBL_FORD',
                        'value' => 11047533,
                      ),
                      100 => 
                      array (
                        'key' => '199-PBL_Ihlas',
                        'value' => 11047534,
                      ),
                      101 => 
                      array (
                        'key' => '2-Synchroflex',
                        'value' => 11047352,
                      ),
                      102 => 
                      array (
                        'key' => '20-PBL_AERZENER',
                        'value' => 11047355,
                      ),
                      103 => 
                      array (
                        'key' => '200-PBL_Metaflex',
                        'value' => 11047535,
                      ),
                      104 => 
                      array (
                        'key' => '201-PBL_MICO',
                        'value' => 11047536,
                      ),
                      105 => 
                      array (
                        'key' => '202-PBL_MONOBLOC',
                        'value' => 11047537,
                      ),
                      106 => 
                      array (
                        'key' => '203-PBL_MTU',
                        'value' => 11047538,
                      ),
                      107 => 
                      array (
                        'key' => '204-PBL_QBR',
                        'value' => 11047539,
                      ),
                      108 => 
                      array (
                        'key' => '205-PBL_QUINTON',
                        'value' => 11047540,
                      ),
                      109 => 
                      array (
                        'key' => '206-PBL_TMC',
                        'value' => 11047541,
                      ),
                      110 => 
                      array (
                        'key' => '207-PBL_KUKA',
                        'value' => 11047542,
                      ),
                      111 => 
                      array (
                        'key' => '208-PBL_ROTH',
                        'value' => 11047543,
                      ),
                      112 => 
                      array (
                        'key' => '209-PBL_Staeublin',
                        'value' => 11047544,
                      ),
                      113 => 
                      array (
                        'key' => '21-PBL_SIT',
                        'value' => 11047356,
                      ),
                      114 => 
                      array (
                        'key' => '210-PBL_DOOSAN',
                        'value' => 11047545,
                      ),
                      115 => 
                      array (
                        'key' => '211-PBL_GETCO',
                        'value' => 11047546,
                      ),
                      116 => 
                      array (
                        'key' => '212-PBL_ILSBO',
                        'value' => 11047547,
                      ),
                      117 => 
                      array (
                        'key' => '213-PBL_KS',
                        'value' => 11047548,
                      ),
                      118 => 
                      array (
                        'key' => '214-PBL_MAGNETI',
                        'value' => 11047549,
                      ),
                      119 => 
                      array (
                        'key' => '215-PBL_METRIC',
                        'value' => 11047550,
                      ),
                      120 => 
                      array (
                        'key' => '216-PBL_SATZ',
                        'value' => 11047551,
                      ),
                      121 => 
                      array (
                        'key' => '217-PBL_SWR',
                        'value' => 11047552,
                      ),
                      122 => 
                      array (
                        'key' => '218-PBL_TS',
                        'value' => 11047553,
                      ),
                      123 => 
                      array (
                        'key' => '22-PBL_ACORN',
                        'value' => 11047357,
                      ),
                      124 => 
                      array (
                        'key' => '23-PBL_AIXAM',
                        'value' => 11047358,
                      ),
                      125 => 
                      array (
                        'key' => '24-PBL_ALM',
                        'value' => 11047359,
                      ),
                      126 => 
                      array (
                        'key' => '25-PBL_ALZMETALL',
                        'value' => 11047360,
                      ),
                      127 => 
                      array (
                        'key' => '26-PBL_ARCELIK',
                        'value' => 11047361,
                      ),
                      128 => 
                      array (
                        'key' => '27-PBL_Becker / Berges',
                        'value' => 11047362,
                      ),
                      129 => 
                      array (
                        'key' => '28-PBL_ATCO QUALCAST',
                        'value' => 11047363,
                      ),
                      130 => 
                      array (
                        'key' => '29-PBL_Atlas Copco',
                        'value' => 11047364,
                      ),
                      131 => 
                      array (
                        'key' => '3-Powerspan',
                        'value' => 11047353,
                      ),
                      132 => 
                      array (
                        'key' => '30-PBL_Bosch Household',
                        'value' => 11047365,
                      ),
                      133 => 
                      array (
                        'key' => '31-PBL_BANDO',
                        'value' => 11047366,
                      ),
                      134 => 
                      array (
                        'key' => '32-PBL_BARMAG',
                        'value' => 11047367,
                      ),
                      135 => 
                      array (
                        'key' => '33-PBL_BARMENIA',
                        'value' => 11047368,
                      ),
                      136 => 
                      array (
                        'key' => '34-PBL_BERNER',
                        'value' => 11047369,
                      ),
                      137 => 
                      array (
                        'key' => '35-PBL_BERNINA',
                        'value' => 11047370,
                      ),
                      138 => 
                      array (
                        'key' => '36-PBL_BMW',
                        'value' => 11047371,
                      ),
                      139 => 
                      array (
                        'key' => '37-PBL_BOSCH',
                        'value' => 11047372,
                      ),
                      140 => 
                      array (
                        'key' => '38-PBL_BRUKS',
                        'value' => 11047373,
                      ),
                      141 => 
                      array (
                        'key' => '39-PBL_BÜHLER',
                        'value' => 11047374,
                      ),
                      142 => 
                      array (
                        'key' => '4-Agridur',
                        'value' => 11047354,
                      ),
                      143 => 
                      array (
                        'key' => '40-PBL_BYD',
                        'value' => 11047375,
                      ),
                      144 => 
                      array (
                        'key' => '41-PBL_CLAAS',
                        'value' => 11047376,
                      ),
                      145 => 
                      array (
                        'key' => '42-PBL_CNH',
                        'value' => 11047377,
                      ),
                      146 => 
                      array (
                        'key' => '43-PBL_COMPAIR',
                        'value' => 11047378,
                      ),
                      147 => 
                      array (
                        'key' => '44-PBL_CONCAR',
                        'value' => 11047379,
                      ),
                      148 => 
                      array (
                        'key' => '45-PBL_DEUSSEN',
                        'value' => 11047380,
                      ),
                      149 => 
                      array (
                        'key' => '46-PBL_DOLMAR',
                        'value' => 11047381,
                      ),
                      150 => 
                      array (
                        'key' => '47-PBL_DUERK/ADLER',
                        'value' => 11047382,
                      ),
                      151 => 
                      array (
                        'key' => '48-PBL_ELECTROLUX',
                        'value' => 11047383,
                      ),
                      152 => 
                      array (
                        'key' => '49-PBL_ELGI ULTRA',
                        'value' => 11047384,
                      ),
                      153 => 
                      array (
                        'key' => '50-PBL_ESCAPE',
                        'value' => 11047385,
                      ),
                      154 => 
                      array (
                        'key' => '51-PBL_FASTERHOLT',
                        'value' => 11047386,
                      ),
                      155 => 
                      array (
                        'key' => '52-PBL_FENNER',
                        'value' => 11047387,
                      ),
                      156 => 
                      array (
                        'key' => '53-PBL_FLENDER',
                        'value' => 11047388,
                      ),
                      157 => 
                      array (
                        'key' => '54-PBL_FLYMO',
                        'value' => 11047389,
                      ),
                      158 => 
                      array (
                        'key' => '55-PBL_FRIGO',
                        'value' => 11047390,
                      ),
                      159 => 
                      array (
                        'key' => '56-PBL_GARDENA',
                        'value' => 11047391,
                      ),
                      160 => 
                      array (
                        'key' => '57-PBL_GEA',
                        'value' => 11047392,
                      ),
                      161 => 
                      array (
                        'key' => '58-PBL_GOLDWIND',
                        'value' => 11047393,
                      ),
                      162 => 
                      array (
                        'key' => '59-PBL_GUZZI',
                        'value' => 11047394,
                      ),
                      163 => 
                      array (
                        'key' => '60-PBL_HAKO',
                        'value' => 11047395,
                      ),
                      164 => 
                      array (
                        'key' => '61-PBL_HaoSheng NS',
                        'value' => 11047396,
                      ),
                      165 => 
                      array (
                        'key' => '62-PBL_HATZ',
                        'value' => 11047397,
                      ),
                      166 => 
                      array (
                        'key' => '63-PBL_HILTI',
                        'value' => 11047398,
                      ),
                      167 => 
                      array (
                        'key' => '64-PBL_Ingersoll Rand',
                        'value' => 11047399,
                      ),
                      168 => 
                      array (
                        'key' => '65-PBL_IRMER+ELZE',
                        'value' => 11047400,
                      ),
                      169 => 
                      array (
                        'key' => '66-PBL_JMS',
                        'value' => 11047401,
                      ),
                      170 => 
                      array (
                        'key' => '67-PBL_John Deere',
                        'value' => 11047402,
                      ),
                      171 => 
                      array (
                        'key' => '68-PBL_JUNGHEINRICH',
                        'value' => 11047403,
                      ),
                      172 => 
                      array (
                        'key' => '69-PBL_KAERCHER',
                        'value' => 11047404,
                      ),
                      173 => 
                      array (
                        'key' => '70-PBL_KAESER',
                        'value' => 11047405,
                      ),
                      174 => 
                      array (
                        'key' => '71-PBL_KAESSBOHRER',
                        'value' => 11047406,
                      ),
                      175 => 
                      array (
                        'key' => '72-PBL_KIVI PEKKA',
                        'value' => 11047407,
                      ),
                      176 => 
                      array (
                        'key' => '73-PBL_Klocke',
                        'value' => 11047408,
                      ),
                      177 => 
                      array (
                        'key' => '74-PBL_KUHN',
                        'value' => 11047409,
                      ),
                      178 => 
                      array (
                        'key' => '75-PBL_Lattimer',
                        'value' => 11047410,
                      ),
                      179 => 
                      array (
                        'key' => '76-PBL_LAVERDAS',
                        'value' => 11047411,
                      ),
                      180 => 
                      array (
                        'key' => '77-PBL_LENZE',
                        'value' => 11047412,
                      ),
                      181 => 
                      array (
                        'key' => '78-PBL_LEYBOLD',
                        'value' => 11047413,
                      ),
                      182 => 
                      array (
                        'key' => '79-PBL_LIEBHERR',
                        'value' => 11047414,
                      ),
                      183 => 
                      array (
                        'key' => '80-PBL_LINDE',
                        'value' => 11047415,
                      ),
                      184 => 
                      array (
                        'key' => '81-PBL_Lindner',
                        'value' => 11047416,
                      ),
                      185 => 
                      array (
                        'key' => '82-PBL_LINNIG',
                        'value' => 11047417,
                      ),
                      186 => 
                      array (
                        'key' => '83-PBL_LUBECA',
                        'value' => 11047418,
                      ),
                      187 => 
                      array (
                        'key' => '84-PBL_LUMIKKO',
                        'value' => 11047419,
                      ),
                      188 => 
                      array (
                        'key' => '85-PBL_M.E.C.',
                        'value' => 11047420,
                      ),
                      189 => 
                      array (
                        'key' => '86-PBL_MAFELL',
                        'value' => 11047421,
                      ),
                      190 => 
                      array (
                        'key' => '87-PBL_MAKITA',
                        'value' => 11047422,
                      ),
                      191 => 
                      array (
                        'key' => '88-PBL_MANROL',
                        'value' => 11047423,
                      ),
                      192 => 
                      array (
                        'key' => '89-PBL_MAXIPRESS',
                        'value' => 11047424,
                      ),
                      193 => 
                      array (
                        'key' => '90-PBL_MEGADYNE',
                        'value' => 11047425,
                      ),
                      194 => 
                      array (
                        'key' => '91-PBL_METABO',
                        'value' => 11047426,
                      ),
                      195 => 
                      array (
                        'key' => '92-PBL_MIELE HOCHSPANNUNGSFEST',
                        'value' => 11047427,
                      ),
                      196 => 
                      array (
                        'key' => '93-PBL_MINERVA',
                        'value' => 11047428,
                      ),
                      197 => 
                      array (
                        'key' => '94-PBL_NETZSCH',
                        'value' => 11047429,
                      ),
                      198 => 
                      array (
                        'key' => '95-PBL_NOBRAND',
                        'value' => 11047430,
                      ),
                      199 => 
                      array (
                        'key' => '96-PBL_NUR DIM',
                        'value' => 11047431,
                      ),
                      200 => 
                      array (
                        'key' => '97-PBL_ROBE',
                        'value' => 11047432,
                      ),
                      201 => 
                      array (
                        'key' => '98-PBL_OPTIBELT',
                        'value' => 11047433,
                      ),
                      202 => 
                      array (
                        'key' => '99-PBL_PFAFF',
                        'value' => 11047434,
                      ),
                    ),
                     'width' => 350,
                     'defaultValue' => '',
                     'optionsProviderClass' => '\\PTGEU\\ProductBundle\\OptionProvider\\PTGEUBrandOptionProvider',
                     'optionsProviderData' => 'Brand|Name',
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'dynamicOptions' => false,
                     'name' => 'privateBrand',
                     'title' => 'Generic / Private Brand',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
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
                     'width' => 350,
                     'queryColumnType' => 'tinyint(1) null',
                     'columnType' => 'tinyint(1) null',
                     'phpdocType' => 'boolean',
                     'name' => 'deletedFlagAtSalesLevel',
                     'title' => 'Delete Flag - Sales Level',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'fieldtype' => 'textarea',
                     'width' => 350,
                     'height' => 150,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'name' => 'salesText2',
                     'title' => 'Sales Text2',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
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
