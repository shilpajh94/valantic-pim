<?php 

/** 
* Generated at: 2022-07-08T12:12:04+02:00
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
   'modificationDate' => 1657275124,
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
                        'classes' => 'PTGEUSalesOrg',
                      ),
                    ),
                     'pathFormatterClass' => '',
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
                        'classes' => 'PTGEUDistributionChannel',
                      ),
                    ),
                     'pathFormatterClass' => '',
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
                        'classes' => 'PTGEUPlant',
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
                        'classes' => 'PTGEUCountryOfOrigin',
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
                     'noLabel' => 'Empty',
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
                        'key' => 'Empty',
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
                     'noLabel' => 'Empty',
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
                        'key' => 'Empty',
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
                        'value' => 11049547,
                      ),
                      1 => 
                      array (
                        'key' => '2-Synchroflex',
                        'value' => 11049549,
                      ),
                      2 => 
                      array (
                        'key' => '3-Powerspan',
                        'value' => 11049551,
                      ),
                      3 => 
                      array (
                        'key' => '4-Agridur',
                        'value' => 11049553,
                      ),
                      4 => 
                      array (
                        'key' => '20-PBL_AERZENER',
                        'value' => 11049555,
                      ),
                      5 => 
                      array (
                        'key' => '21-PBL_SIT',
                        'value' => 11049557,
                      ),
                      6 => 
                      array (
                        'key' => '22-PBL_ACORN',
                        'value' => 11049559,
                      ),
                      7 => 
                      array (
                        'key' => '23-PBL_AIXAM',
                        'value' => 11049561,
                      ),
                      8 => 
                      array (
                        'key' => '24-PBL_ALM',
                        'value' => 11049563,
                      ),
                      9 => 
                      array (
                        'key' => '25-PBL_ALZMETALL',
                        'value' => 11049565,
                      ),
                      10 => 
                      array (
                        'key' => '26-PBL_ARCELIK',
                        'value' => 11049567,
                      ),
                      11 => 
                      array (
                        'key' => '28-PBL_ATCO QUALCAST',
                        'value' => 11049570,
                      ),
                      12 => 
                      array (
                        'key' => '29-PBL_Atlas Copco',
                        'value' => 11049572,
                      ),
                      13 => 
                      array (
                        'key' => '30-PBL_Bosch Household',
                        'value' => 11049574,
                      ),
                      14 => 
                      array (
                        'key' => '31-PBL_BANDO',
                        'value' => 11049575,
                      ),
                      15 => 
                      array (
                        'key' => '32-PBL_BARMAG',
                        'value' => 11049577,
                      ),
                      16 => 
                      array (
                        'key' => '33-PBL_BARMENIA',
                        'value' => 11049579,
                      ),
                      17 => 
                      array (
                        'key' => '34-PBL_BERNER',
                        'value' => 11049581,
                      ),
                      18 => 
                      array (
                        'key' => '35-PBL_BERNINA',
                        'value' => 11049583,
                      ),
                      19 => 
                      array (
                        'key' => '36-PBL_BMW',
                        'value' => 11049585,
                      ),
                      20 => 
                      array (
                        'key' => '37-PBL_BOSCH',
                        'value' => 11049587,
                      ),
                      21 => 
                      array (
                        'key' => '38-PBL_BRUKS',
                        'value' => 11049589,
                      ),
                      22 => 
                      array (
                        'key' => '39-PBL_BÜHLER',
                        'value' => 11049591,
                      ),
                      23 => 
                      array (
                        'key' => '40-PBL_BYD',
                        'value' => 11049593,
                      ),
                      24 => 
                      array (
                        'key' => '41-PBL_CLAAS',
                        'value' => 11049595,
                      ),
                      25 => 
                      array (
                        'key' => '42-PBL_CNH',
                        'value' => 11049597,
                      ),
                      26 => 
                      array (
                        'key' => '43-PBL_COMPAIR',
                        'value' => 11049599,
                      ),
                      27 => 
                      array (
                        'key' => '44-PBL_CONCAR',
                        'value' => 11049601,
                      ),
                      28 => 
                      array (
                        'key' => '45-PBL_DEUSSEN',
                        'value' => 11049603,
                      ),
                      29 => 
                      array (
                        'key' => '46-PBL_DOLMAR',
                        'value' => 11049605,
                      ),
                      30 => 
                      array (
                        'key' => '48-PBL_ELECTROLUX',
                        'value' => 11049608,
                      ),
                      31 => 
                      array (
                        'key' => '49-PBL_ELGI ULTRA',
                        'value' => 11049609,
                      ),
                      32 => 
                      array (
                        'key' => '50-PBL_ESCAPE',
                        'value' => 11049611,
                      ),
                      33 => 
                      array (
                        'key' => '51-PBL_FASTERHOLT',
                        'value' => 11049613,
                      ),
                      34 => 
                      array (
                        'key' => '52-PBL_FENNER',
                        'value' => 11049615,
                      ),
                      35 => 
                      array (
                        'key' => '53-PBL_FLENDER',
                        'value' => 11049617,
                      ),
                      36 => 
                      array (
                        'key' => '54-PBL_FLYMO',
                        'value' => 11049619,
                      ),
                      37 => 
                      array (
                        'key' => '55-PBL_FRIGO',
                        'value' => 11049621,
                      ),
                      38 => 
                      array (
                        'key' => '56-PBL_GARDENA',
                        'value' => 11049623,
                      ),
                      39 => 
                      array (
                        'key' => '57-PBL_GEA',
                        'value' => 11049625,
                      ),
                      40 => 
                      array (
                        'key' => '58-PBL_GOLDWIND',
                        'value' => 11049627,
                      ),
                      41 => 
                      array (
                        'key' => '59-PBL_GUZZI',
                        'value' => 11049629,
                      ),
                      42 => 
                      array (
                        'key' => '60-PBL_HAKO',
                        'value' => 11049631,
                      ),
                      43 => 
                      array (
                        'key' => '61-PBL_HaoSheng NS',
                        'value' => 11049633,
                      ),
                      44 => 
                      array (
                        'key' => '62-PBL_HATZ',
                        'value' => 11049635,
                      ),
                      45 => 
                      array (
                        'key' => '63-PBL_HILTI',
                        'value' => 11049637,
                      ),
                      46 => 
                      array (
                        'key' => '64-PBL_Ingersoll Rand',
                        'value' => 11049639,
                      ),
                      47 => 
                      array (
                        'key' => '65-PBL_IRMER+ELZE',
                        'value' => 11049640,
                      ),
                      48 => 
                      array (
                        'key' => '66-PBL_JMS',
                        'value' => 11049642,
                      ),
                      49 => 
                      array (
                        'key' => '67-PBL_John Deere',
                        'value' => 11049644,
                      ),
                      50 => 
                      array (
                        'key' => '68-PBL_JUNGHEINRICH',
                        'value' => 11049646,
                      ),
                      51 => 
                      array (
                        'key' => '69-PBL_KAERCHER',
                        'value' => 11049648,
                      ),
                      52 => 
                      array (
                        'key' => '70-PBL_KAESER',
                        'value' => 11049650,
                      ),
                      53 => 
                      array (
                        'key' => '71-PBL_KAESSBOHRER',
                        'value' => 11049652,
                      ),
                      54 => 
                      array (
                        'key' => '72-PBL_KIVI PEKKA',
                        'value' => 11049654,
                      ),
                      55 => 
                      array (
                        'key' => '73-PBL_Klocke',
                        'value' => 11049656,
                      ),
                      56 => 
                      array (
                        'key' => '74-PBL_KUHN',
                        'value' => 11049658,
                      ),
                      57 => 
                      array (
                        'key' => '75-PBL_Lattimer',
                        'value' => 11049659,
                      ),
                      58 => 
                      array (
                        'key' => '76-PBL_LAVERDAS',
                        'value' => 11049661,
                      ),
                      59 => 
                      array (
                        'key' => '77-PBL_LENZE',
                        'value' => 11049663,
                      ),
                      60 => 
                      array (
                        'key' => '78-PBL_LEYBOLD',
                        'value' => 11049665,
                      ),
                      61 => 
                      array (
                        'key' => '79-PBL_LIEBHERR',
                        'value' => 11049667,
                      ),
                      62 => 
                      array (
                        'key' => '80-PBL_LINDE',
                        'value' => 11049669,
                      ),
                      63 => 
                      array (
                        'key' => '81-PBL_Lindner',
                        'value' => 11049671,
                      ),
                      64 => 
                      array (
                        'key' => '82-PBL_LINNIG',
                        'value' => 11049673,
                      ),
                      65 => 
                      array (
                        'key' => '83-PBL_LUBECA',
                        'value' => 11049675,
                      ),
                      66 => 
                      array (
                        'key' => '84-PBL_LUMIKKO',
                        'value' => 11049677,
                      ),
                      67 => 
                      array (
                        'key' => '85-PBL_M.E.C.',
                        'value' => 11049679,
                      ),
                      68 => 
                      array (
                        'key' => '86-PBL_MAFELL',
                        'value' => 11049681,
                      ),
                      69 => 
                      array (
                        'key' => '87-PBL_MAKITA',
                        'value' => 11049683,
                      ),
                      70 => 
                      array (
                        'key' => '88-PBL_MANROL',
                        'value' => 11049685,
                      ),
                      71 => 
                      array (
                        'key' => '89-PBL_MAXIPRESS',
                        'value' => 11049687,
                      ),
                      72 => 
                      array (
                        'key' => '90-PBL_MEGADYNE',
                        'value' => 11049689,
                      ),
                      73 => 
                      array (
                        'key' => '91-PBL_METABO',
                        'value' => 11049691,
                      ),
                      74 => 
                      array (
                        'key' => '92-PBL_MIELE HOCHSPANNUNGSFEST',
                        'value' => 11049693,
                      ),
                      75 => 
                      array (
                        'key' => '93-PBL_MINERVA',
                        'value' => 11049695,
                      ),
                      76 => 
                      array (
                        'key' => '94-PBL_NETZSCH',
                        'value' => 11049697,
                      ),
                      77 => 
                      array (
                        'key' => '95-PBL_NOBRAND',
                        'value' => 11049699,
                      ),
                      78 => 
                      array (
                        'key' => '96-PBL_NUR DIM',
                        'value' => 11049701,
                      ),
                      79 => 
                      array (
                        'key' => '97-PBL_ROBE',
                        'value' => 11049703,
                      ),
                      80 => 
                      array (
                        'key' => '98-PBL_OPTIBELT',
                        'value' => 11049705,
                      ),
                      81 => 
                      array (
                        'key' => '99-PBL_PFAFF',
                        'value' => 11049706,
                      ),
                      82 => 
                      array (
                        'key' => '100-PBL_PSROLMAN',
                        'value' => 11049708,
                      ),
                      83 => 
                      array (
                        'key' => '101-PBL_QUALCAST',
                        'value' => 11049710,
                      ),
                      84 => 
                      array (
                        'key' => '102-PBL_QUALTEX',
                        'value' => 11049712,
                      ),
                      85 => 
                      array (
                        'key' => '103-PBL_RIETER',
                        'value' => 11049714,
                      ),
                      86 => 
                      array (
                        'key' => '104-PBL_ROULUNDS',
                        'value' => 11049716,
                      ),
                      87 => 
                      array (
                        'key' => '105-PBL_RUBANG',
                        'value' => 11049718,
                      ),
                      88 => 
                      array (
                        'key' => '106-PBL_RUWAC',
                        'value' => 11049720,
                      ),
                      89 => 
                      array (
                        'key' => '107-PBL_SABO',
                        'value' => 11049722,
                      ),
                      90 => 
                      array (
                        'key' => '108-PBL_SANOK',
                        'value' => 11049724,
                      ),
                      91 => 
                      array (
                        'key' => '109-PBL_SCANCOIN',
                        'value' => 11049725,
                      ),
                      92 => 
                      array (
                        'key' => '110-PBL_Schaeffler',
                        'value' => 11049727,
                      ),
                      93 => 
                      array (
                        'key' => '111-PBL_SCHAUBL',
                        'value' => 11049729,
                      ),
                      94 => 
                      array (
                        'key' => '112-PBL_SCHENCK',
                        'value' => 11049731,
                      ),
                      95 => 
                      array (
                        'key' => '113-PBL_SCHINDLER',
                        'value' => 11049733,
                      ),
                      96 => 
                      array (
                        'key' => '114-PBL_SCHLAFHORST',
                        'value' => 11049735,
                      ),
                      97 => 
                      array (
                        'key' => '115-PBL_SCHWALBE',
                        'value' => 11049737,
                      ),
                      98 => 
                      array (
                        'key' => '116-PBL_SEPAMATIC',
                        'value' => 11049739,
                      ),
                      99 => 
                      array (
                        'key' => '117-PBL_SHELBOURNE',
                        'value' => 11049741,
                      ),
                      100 => 
                      array (
                        'key' => '118-PBL_SIGERIST',
                        'value' => 11049742,
                      ),
                      101 => 
                      array (
                        'key' => '119-PBL_SILGAN',
                        'value' => 11049743,
                      ),
                      102 => 
                      array (
                        'key' => '120-PBL_Singer',
                        'value' => 11049744,
                      ),
                      103 => 
                      array (
                        'key' => '121-PBL_SKLOSTROJ',
                        'value' => 11049745,
                      ),
                      104 => 
                      array (
                        'key' => '122-PBL_SODIKART',
                        'value' => 11049746,
                      ),
                      105 => 
                      array (
                        'key' => '123-PBL_SPEED CONTROL',
                        'value' => 11049747,
                      ),
                      106 => 
                      array (
                        'key' => '124-PBL_SPHEROS',
                        'value' => 11049748,
                      ),
                      107 => 
                      array (
                        'key' => '125-PBL_STIGA',
                        'value' => 11049749,
                      ),
                      108 => 
                      array (
                        'key' => '126-PBL_STIHL',
                        'value' => 11049750,
                      ),
                      109 => 
                      array (
                        'key' => '127-PBL_STILL',
                        'value' => 11049751,
                      ),
                      110 => 
                      array (
                        'key' => '128-PBL_SUMEIDA',
                        'value' => 11049752,
                      ),
                      111 => 
                      array (
                        'key' => '129-PBL_TAGEX',
                        'value' => 11049753,
                      ),
                      112 => 
                      array (
                        'key' => '130-PBL_TATA',
                        'value' => 11049754,
                      ),
                      113 => 
                      array (
                        'key' => '131-PBL_THERMOKING',
                        'value' => 11049755,
                      ),
                      114 => 
                      array (
                        'key' => '132-PBL_THYS',
                        'value' => 11049756,
                      ),
                      115 => 
                      array (
                        'key' => '133-PBL_TIC',
                        'value' => 11049757,
                      ),
                      116 => 
                      array (
                        'key' => '134-PBL_TKING',
                        'value' => 11049758,
                      ),
                      117 => 
                      array (
                        'key' => '135-PBL_TRUVOX',
                        'value' => 11049759,
                      ),
                      118 => 
                      array (
                        'key' => '136-PBL_TUBE WINDER',
                        'value' => 11049760,
                      ),
                      119 => 
                      array (
                        'key' => '137-PBL_UNIMAQ',
                        'value' => 11049761,
                      ),
                      120 => 
                      array (
                        'key' => '138-PBL_UNITEC',
                        'value' => 11049762,
                      ),
                      121 => 
                      array (
                        'key' => '139-PBL_VARIMAX',
                        'value' => 11049763,
                      ),
                      122 => 
                      array (
                        'key' => '140-PBL_VARIO SIT',
                        'value' => 11049764,
                      ),
                      123 => 
                      array (
                        'key' => '141-PBL_VIGAN',
                        'value' => 11049765,
                      ),
                      124 => 
                      array (
                        'key' => '142-PBL_VORWERK',
                        'value' => 11049766,
                      ),
                      125 => 
                      array (
                        'key' => '143-PBL_VW',
                        'value' => 11049767,
                      ),
                      126 => 
                      array (
                        'key' => '144-PBL_W+H',
                        'value' => 11049768,
                      ),
                      127 => 
                      array (
                        'key' => '145-PBL_WALTHER FLENDER',
                        'value' => 11049769,
                      ),
                      128 => 
                      array (
                        'key' => '146-PBL_WESSEL',
                        'value' => 11049770,
                      ),
                      129 => 
                      array (
                        'key' => '147-PBL_WESTFALIA',
                        'value' => 11049771,
                      ),
                      130 => 
                      array (
                        'key' => '148-PBL_WHIRLPOOL',
                        'value' => 11049772,
                      ),
                      131 => 
                      array (
                        'key' => '149-PBL_WHM',
                        'value' => 11049773,
                      ),
                      132 => 
                      array (
                        'key' => '150-PBL_WODSCHOW',
                        'value' => 11049774,
                      ),
                      133 => 
                      array (
                        'key' => '151-PBL_WOLF',
                        'value' => 11049775,
                      ),
                      134 => 
                      array (
                        'key' => '152-PBL_WYKO',
                        'value' => 11049776,
                      ),
                      135 => 
                      array (
                        'key' => '153-PBL_ZF',
                        'value' => 11049777,
                      ),
                      136 => 
                      array (
                        'key' => '154-PBL_AGATECH',
                        'value' => 11049778,
                      ),
                      137 => 
                      array (
                        'key' => '155-PBL_AGCO',
                        'value' => 11049779,
                      ),
                      138 => 
                      array (
                        'key' => '156-PBL_Audi',
                        'value' => 11049780,
                      ),
                      139 => 
                      array (
                        'key' => '157-PBL_AZETA',
                        'value' => 11049781,
                      ),
                      140 => 
                      array (
                        'key' => '158-PBL_Barne',
                        'value' => 11049782,
                      ),
                      141 => 
                      array (
                        'key' => '159-PBL_Bergmann',
                        'value' => 11049783,
                      ),
                      142 => 
                      array (
                        'key' => '160-PBL_Boekholt',
                        'value' => 11049784,
                      ),
                      143 => 
                      array (
                        'key' => '161-PBL_BUECHI',
                        'value' => 11049785,
                      ),
                      144 => 
                      array (
                        'key' => '162-PBL_DANA',
                        'value' => 11049786,
                      ),
                      145 => 
                      array (
                        'key' => '163-PBL_Eriks',
                        'value' => 11049787,
                      ),
                      146 => 
                      array (
                        'key' => '164-PBL_ETESIA',
                        'value' => 11049788,
                      ),
                      147 => 
                      array (
                        'key' => '165-PBL_EUROSTEAM',
                        'value' => 11049789,
                      ),
                      148 => 
                      array (
                        'key' => '166-PBL_FIAT',
                        'value' => 11049790,
                      ),
                      149 => 
                      array (
                        'key' => '167-PBL_Fischer Panda',
                        'value' => 11049791,
                      ),
                      150 => 
                      array (
                        'key' => '168-PBL_Gates',
                        'value' => 11049792,
                      ),
                      151 => 
                      array (
                        'key' => '169-PBL_Heidelberger',
                        'value' => 11049793,
                      ),
                      152 => 
                      array (
                        'key' => '170-PBL_HOMESPARES',
                        'value' => 11049794,
                      ),
                      153 => 
                      array (
                        'key' => '171-PBL_Imesa',
                        'value' => 11049795,
                      ),
                      154 => 
                      array (
                        'key' => '172-PBL_INA',
                        'value' => 11049796,
                      ),
                      155 => 
                      array (
                        'key' => '173-PBL_Innofit',
                        'value' => 11049797,
                      ),
                      156 => 
                      array (
                        'key' => '174-PBL_IVECO',
                        'value' => 11049798,
                      ),
                      157 => 
                      array (
                        'key' => '175-PBL_Ixion',
                        'value' => 11049799,
                      ),
                      158 => 
                      array (
                        'key' => '176-PBL_Jacob Mueller',
                        'value' => 11049800,
                      ),
                      159 => 
                      array (
                        'key' => '177-PBL_MAN',
                        'value' => 11049801,
                      ),
                      160 => 
                      array (
                        'key' => '178-PBL_MB',
                        'value' => 11049802,
                      ),
                      161 => 
                      array (
                        'key' => '179-PBL_MERITANO',
                        'value' => 11049803,
                      ),
                      162 => 
                      array (
                        'key' => '180-PBL_MONARK',
                        'value' => 11049804,
                      ),
                      163 => 
                      array (
                        'key' => '181-PBL_MOTOBEC',
                        'value' => 11049805,
                      ),
                      164 => 
                      array (
                        'key' => '182-PBL_MOTRIO',
                        'value' => 11049806,
                      ),
                      165 => 
                      array (
                        'key' => '183-PBL_NASOTO',
                        'value' => 11049807,
                      ),
                      166 => 
                      array (
                        'key' => '184-PBL_NEW FIT',
                        'value' => 11049808,
                      ),
                      167 => 
                      array (
                        'key' => '185-PBL_Panasonic',
                        'value' => 11049809,
                      ),
                      168 => 
                      array (
                        'key' => '186-PBL_RHIAG',
                        'value' => 11049810,
                      ),
                      169 => 
                      array (
                        'key' => '187-PBL_Rover',
                        'value' => 11049811,
                      ),
                      170 => 
                      array (
                        'key' => '188-PBL_SAINTGOBAIN',
                        'value' => 11049812,
                      ),
                      171 => 
                      array (
                        'key' => '189-PBL_SCANIA',
                        'value' => 11049813,
                      ),
                      172 => 
                      array (
                        'key' => '190-PBL_SKF',
                        'value' => 11049814,
                      ),
                      173 => 
                      array (
                        'key' => '191-PBL_STOMIL',
                        'value' => 11049815,
                      ),
                      174 => 
                      array (
                        'key' => '192-PBL_Temsa',
                        'value' => 11049816,
                      ),
                      175 => 
                      array (
                        'key' => '193-PBL_Triumph',
                        'value' => 11049817,
                      ),
                      176 => 
                      array (
                        'key' => '194-PBL_TRUETZLER',
                        'value' => 11049818,
                      ),
                      177 => 
                      array (
                        'key' => '195-PBL_Vertex',
                        'value' => 11049819,
                      ),
                      178 => 
                      array (
                        'key' => '196-PBL_VOSTERMAN',
                        'value' => 11049820,
                      ),
                      179 => 
                      array (
                        'key' => '197-PBL_Welltrans',
                        'value' => 11049821,
                      ),
                      180 => 
                      array (
                        'key' => '198-PBL_FORD',
                        'value' => 11049822,
                      ),
                      181 => 
                      array (
                        'key' => '199-PBL_Ihlas',
                        'value' => 11049823,
                      ),
                      182 => 
                      array (
                        'key' => '200-PBL_Metaflex',
                        'value' => 11049824,
                      ),
                      183 => 
                      array (
                        'key' => '201-PBL_MICO',
                        'value' => 11049825,
                      ),
                      184 => 
                      array (
                        'key' => '202-PBL_MONOBLOC',
                        'value' => 11049826,
                      ),
                      185 => 
                      array (
                        'key' => '203-PBL_MTU',
                        'value' => 11049827,
                      ),
                      186 => 
                      array (
                        'key' => '204-PBL_QBR',
                        'value' => 11049828,
                      ),
                      187 => 
                      array (
                        'key' => '205-PBL_QUINTON',
                        'value' => 11049829,
                      ),
                      188 => 
                      array (
                        'key' => '206-PBL_TMC',
                        'value' => 11049830,
                      ),
                      189 => 
                      array (
                        'key' => '207-PBL_KUKA',
                        'value' => 11049831,
                      ),
                      190 => 
                      array (
                        'key' => '208-PBL_ROTH',
                        'value' => 11049832,
                      ),
                      191 => 
                      array (
                        'key' => '209-PBL_Staeublin',
                        'value' => 11049833,
                      ),
                      192 => 
                      array (
                        'key' => '210-PBL_DOOSAN',
                        'value' => 11049834,
                      ),
                      193 => 
                      array (
                        'key' => '211-PBL_GETCO',
                        'value' => 11049835,
                      ),
                      194 => 
                      array (
                        'key' => '212-PBL_ILSBO',
                        'value' => 11049836,
                      ),
                      195 => 
                      array (
                        'key' => '213-PBL_KS',
                        'value' => 11049837,
                      ),
                      196 => 
                      array (
                        'key' => '214-PBL_MAGNETI',
                        'value' => 11049838,
                      ),
                      197 => 
                      array (
                        'key' => '215-PBL_METRIC',
                        'value' => 11049839,
                      ),
                      198 => 
                      array (
                        'key' => '216-PBL_SATZ',
                        'value' => 11049840,
                      ),
                      199 => 
                      array (
                        'key' => '217-PBL_SWR',
                        'value' => 11049841,
                      ),
                      200 => 
                      array (
                        'key' => '218-PBL_TS',
                        'value' => 11049842,
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
