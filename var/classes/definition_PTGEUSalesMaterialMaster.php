<?php 

/** 
* Generated at: 2022-06-21T13:22:48+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: ::1


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
   'modificationDate' => 1655810566,
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
                        'key' => '-A.R. THOMSON',
                        'value' => 1645,
                      ),
                      1 => 
                      array (
                        'key' => '-ABBOTT',
                        'value' => 1646,
                      ),
                      2 => 
                      array (
                        'key' => '-ABBOTT 1025 SERIES',
                        'value' => 1647,
                      ),
                      3 => 
                      array (
                        'key' => '-ABBOTT CHEM GROUT',
                        'value' => 1648,
                      ),
                      4 => 
                      array (
                        'key' => '-ABS BLAST',
                        'value' => 1649,
                      ),
                      5 => 
                      array (
                        'key' => '-ACCORD TANK CLEANING',
                        'value' => 1650,
                      ),
                      6 => 
                      array (
                        'key' => '-ACE BREWLINE',
                        'value' => 1651,
                      ),
                      7 => 
                      array (
                        'key' => '-ACE FOOD',
                        'value' => 1652,
                      ),
                      8 => 
                      array (
                        'key' => '-ACE FOOD DISCHARGE',
                        'value' => 1653,
                      ),
                      9 => 
                      array (
                        'key' => '-ACE GRAY FOOD',
                        'value' => 1654,
                      ),
                      10 => 
                      array (
                        'key' => '-ACE RCR FLEXRITE',
                        'value' => 1655,
                      ),
                      11 => 
                      array (
                        'key' => '-ACE RCT FLEXRITE',
                        'value' => 1656,
                      ),
                      12 => 
                      array (
                        'key' => '-ACE RDC FOOD',
                        'value' => 1657,
                      ),
                      13 => 
                      array (
                        'key' => '-ACE RSD FOOD',
                        'value' => 1658,
                      ),
                      14 => 
                      array (
                        'key' => '-AD SEALING HYDROCARBON DRAIN',
                        'value' => 1659,
                      ),
                      15 => 
                      array (
                        'key' => '-ADVANTAGE™',
                        'value' => 1660,
                      ),
                      16 => 
                      array (
                        'key' => '-AEROPAL',
                        'value' => 1661,
                      ),
                      17 => 
                      array (
                        'key' => '-AG SPRAY',
                        'value' => 1662,
                      ),
                      18 => 
                      array (
                        'key' => '-AGCHEM',
                        'value' => 1663,
                      ),
                      19 => 
                      array (
                        'key' => '-AGCHEM S&D',
                        'value' => 1664,
                      ),
                      20 => 
                      array (
                        'key' => '-AGGIE GAS™',
                        'value' => 1665,
                      ),
                      21 => 
                      array (
                        'key' => '-AGRI-FLEX',
                        'value' => 1666,
                      ),
                      22 => 
                      array (
                        'key' => '-AHR WATER S&D',
                        'value' => 1667,
                      ),
                      23 => 
                      array (
                        'key' => '-AIR 1000',
                        'value' => 1668,
                      ),
                      24 => 
                      array (
                        'key' => '-AIR 250',
                        'value' => 1669,
                      ),
                      25 => 
                      array (
                        'key' => '-AIR 300',
                        'value' => 1670,
                      ),
                      26 => 
                      array (
                        'key' => '-AIR 300 HD',
                        'value' => 1671,
                      ),
                      27 => 
                      array (
                        'key' => '-AIR 400',
                        'value' => 1672,
                      ),
                      28 => 
                      array (
                        'key' => '-AIR BREATHING HOSE',
                        'value' => 1673,
                      ),
                      29 => 
                      array (
                        'key' => '-AIR PSNS',
                        'value' => 1674,
                      ),
                      30 => 
                      array (
                        'key' => '-AIR PUMP GUNITE',
                        'value' => 1675,
                      ),
                      31 => 
                      array (
                        'key' => '-AIR TRIX',
                        'value' => 1676,
                      ),
                      32 => 
                      array (
                        'key' => '-AIR-A-PLANE GLYCOL',
                        'value' => 1677,
                      ),
                      33 => 
                      array (
                        'key' => '-AIRCRAFT FUELING',
                        'value' => 1678,
                      ),
                      34 => 
                      array (
                        'key' => '-AIRGAS FRONTIER',
                        'value' => 1679,
                      ),
                      35 => 
                      array (
                        'key' => '-AIRGAS GRADE R',
                        'value' => 1680,
                      ),
                      36 => 
                      array (
                        'key' => '-AIRGAS GRADE RM',
                        'value' => 1681,
                      ),
                      37 => 
                      array (
                        'key' => '-AIRGAS GRADE T',
                        'value' => 1682,
                      ),
                      38 => 
                      array (
                        'key' => '-AIRMAX FLEXIMAX',
                        'value' => 1683,
                      ),
                      39 => 
                      array (
                        'key' => '-AIRMAX PROMAX',
                        'value' => 1684,
                      ),
                      40 => 
                      array (
                        'key' => '-AIRMAX SUPERMAX',
                        'value' => 1685,
                      ),
                      41 => 
                      array (
                        'key' => '-AIR-WATER 400',
                        'value' => 1686,
                      ),
                      42 => 
                      array (
                        'key' => '-AJAX',
                        'value' => 1687,
                      ),
                      43 => 
                      array (
                        'key' => '-ALASKA RUBBER',
                        'value' => 1688,
                      ),
                      44 => 
                      array (
                        'key' => '-ALCAN MUD STACKING',
                        'value' => 1689,
                      ),
                      45 => 
                      array (
                        'key' => '-ALCOA POTROOM',
                        'value' => 1690,
                      ),
                      46 => 
                      array (
                        'key' => '-ALLCRETE® TEXTILE',
                        'value' => 1691,
                      ),
                      47 => 
                      array (
                        'key' => '-ALLCRETE® WIRE',
                        'value' => 1692,
                      ),
                      48 => 
                      array (
                        'key' => '-ALLENT GUNITE',
                        'value' => 1693,
                      ),
                      49 => 
                      array (
                        'key' => '-ALLENT REFRACTORY',
                        'value' => 1694,
                      ),
                      50 => 
                      array (
                        'key' => '-AMFLO 702-610',
                        'value' => 1695,
                      ),
                      51 => 
                      array (
                        'key' => '-AMMONIUM NITRATE BLAST',
                        'value' => 1696,
                      ),
                      52 => 
                      array (
                        'key' => '-AMMONIUM NITRATE HD',
                        'value' => 1697,
                      ),
                      53 => 
                      array (
                        'key' => '-AMMONIUM NITRATE PELLET',
                        'value' => 1698,
                      ),
                      54 => 
                      array (
                        'key' => '-APACHE',
                        'value' => 1699,
                      ),
                      55 => 
                      array (
                        'key' => '-APOLLO',
                        'value' => 1700,
                      ),
                      56 => 
                      array (
                        'key' => '-APOLLO FLEXDOCK',
                        'value' => 1701,
                      ),
                      57 => 
                      array (
                        'key' => '-APPLIED INDUSTRIAL TECH',
                        'value' => 1702,
                      ),
                      58 => 
                      array (
                        'key' => '-APPLIED JETTING',
                        'value' => 1703,
                      ),
                      59 => 
                      array (
                        'key' => '-AQUAHAMMER',
                        'value' => 1704,
                      ),
                      60 => 
                      array (
                        'key' => '-AQUAPAL',
                        'value' => 1705,
                      ),
                      61 => 
                      array (
                        'key' => '-AR THOMSON EXTREME CRIMP',
                        'value' => 1706,
                      ),
                      62 => 
                      array (
                        'key' => '-ARCAIR INSULATOR',
                        'value' => 1707,
                      ),
                      63 => 
                      array (
                        'key' => '-ARCHON',
                        'value' => 1708,
                      ),
                      64 => 
                      array (
                        'key' => '-ARCO BLAST XF',
                        'value' => 1709,
                      ),
                      65 => 
                      array (
                        'key' => '-ARCTIC EXTREMEFLEX™',
                        'value' => 1710,
                      ),
                      66 => 
                      array (
                        'key' => '-ARCTIC FLEXTRA',
                        'value' => 1711,
                      ),
                      67 => 
                      array (
                        'key' => '-ARCTIC FLEXWING®',
                        'value' => 1712,
                      ),
                      68 => 
                      array (
                        'key' => '-ARCTIC FUEL DISCHARGE',
                        'value' => 1713,
                      ),
                      69 => 
                      array (
                        'key' => '-ARCTIC LCP3',
                        'value' => 1714,
                      ),
                      70 => 
                      array (
                        'key' => '-ARCTIC LCP4S',
                        'value' => 1715,
                      ),
                      71 => 
                      array (
                        'key' => '-ARCTIC LCP6S',
                        'value' => 1716,
                      ),
                      72 => 
                      array (
                        'key' => '-ARCTIC LR16SC',
                        'value' => 1717,
                      ),
                      73 => 
                      array (
                        'key' => '-ARCTIC LR2SN',
                        'value' => 1718,
                      ),
                      74 => 
                      array (
                        'key' => '-ARCTIC ORTAC',
                        'value' => 1719,
                      ),
                      75 => 
                      array (
                        'key' => '-ARCTIC ORTAC PLUS',
                        'value' => 1720,
                      ),
                      76 => 
                      array (
                        'key' => '-ARCTIC RIG SUPPLY',
                        'value' => 1721,
                      ),
                      77 => 
                      array (
                        'key' => '-ARMORCOAT™ ACP3',
                        'value' => 1722,
                      ),
                      78 => 
                      array (
                        'key' => '-ARMORCOAT ACP4',
                        'value' => 1723,
                      ),
                      79 => 
                      array (
                        'key' => '-ARMORCOAT ARC12',
                        'value' => 1724,
                      ),
                      80 => 
                      array (
                        'key' => '-ARMORCOAT ARC13',
                        'value' => 1725,
                      ),
                      81 => 
                      array (
                        'key' => '-ARMORCOAT ARC15',
                        'value' => 1726,
                      ),
                      82 => 
                      array (
                        'key' => '-ARMORCOAT ARC16SC',
                        'value' => 1727,
                      ),
                      83 => 
                      array (
                        'key' => '-ARMOR-FLEX PRO',
                        'value' => 1728,
                      ),
                      84 => 
                      array (
                        'key' => '-ARONSON',
                        'value' => 1729,
                      ),
                      85 => 
                      array (
                        'key' => '-ARPHSE',
                        'value' => 1730,
                      ),
                      86 => 
                      array (
                        'key' => '-ARTRAC',
                        'value' => 1731,
                      ),
                      87 => 
                      array (
                        'key' => '-ARVAC SW',
                        'value' => 1732,
                      ),
                      88 => 
                      array (
                        'key' => '-AS1335 TWIN-LINE',
                        'value' => 1733,
                      ),
                      89 => 
                      array (
                        'key' => '-AS2435 TYPE 1 AIRBRAKE',
                        'value' => 1734,
                      ),
                      90 => 
                      array (
                        'key' => '-ASJ',
                        'value' => 1735,
                      ),
                      91 => 
                      array (
                        'key' => '-ASJ VERSACRETE',
                        'value' => 1736,
                      ),
                      92 => 
                      array (
                        'key' => '-ATLANT WATER',
                        'value' => 1737,
                      ),
                      93 => 
                      array (
                        'key' => '-ATLAS',
                        'value' => 1738,
                      ),
                      94 => 
                      array (
                        'key' => '-ATRUBB NR SPRAY',
                        'value' => 1739,
                      ),
                      95 => 
                      array (
                        'key' => '-AUGER ARC PILING',
                        'value' => 1740,
                      ),
                      96 => 
                      array (
                        'key' => '-AUSTIN',
                        'value' => 1741,
                      ),
                      97 => 
                      array (
                        'key' => '-AUSTIN RUBBER',
                        'value' => 1742,
                      ),
                      98 => 
                      array (
                        'key' => '-AUTOGRIP',
                        'value' => 1743,
                      ),
                      99 => 
                      array (
                        'key' => '-BAHCAL',
                        'value' => 1744,
                      ),
                      100 => 
                      array (
                        'key' => '-BANDING COIL',
                        'value' => 1745,
                      ),
                      101 => 
                      array (
                        'key' => '-BC COLD FLEX',
                        'value' => 1746,
                      ),
                      102 => 
                      array (
                        'key' => '-BC GASOLINE',
                        'value' => 1747,
                      ),
                      103 => 
                      array (
                        'key' => '-BC MARINA',
                        'value' => 1748,
                      ),
                      104 => 
                      array (
                        'key' => '-BEDFORD',
                        'value' => 1749,
                      ),
                      105 => 
                      array (
                        'key' => '-BLACK FLEXTRA II',
                        'value' => 1750,
                      ),
                      106 => 
                      array (
                        'key' => '-BLACK FLEXWING®',
                        'value' => 1751,
                      ),
                      107 => 
                      array (
                        'key' => '-BLAST',
                        'value' => 1752,
                      ),
                      108 => 
                      array (
                        'key' => '-BLASTHOLE SLURRY & DEWATERING',
                        'value' => 1753,
                      ),
                      109 => 
                      array (
                        'key' => '-BLASTMASTER HD',
                        'value' => 1754,
                      ),
                      110 => 
                      array (
                        'key' => '-BLAUDIECK',
                        'value' => 1755,
                      ),
                      111 => 
                      array (
                        'key' => '-BLISSFUL FISHERMAN',
                        'value' => 1756,
                      ),
                      112 => 
                      array (
                        'key' => '-BLUCOR',
                        'value' => 1757,
                      ),
                      113 => 
                      array (
                        'key' => '-BLUCOR FLANGE',
                        'value' => 1758,
                      ),
                      114 => 
                      array (
                        'key' => '-BLUE FLEXWING®',
                        'value' => 1759,
                      ),
                      115 => 
                      array (
                        'key' => '-BLUE FLOUR',
                        'value' => 1760,
                      ),
                      116 => 
                      array (
                        'key' => '-BLUE XTREME STRAIGH RAD HOSE',
                        'value' => 1761,
                      ),
                      117 => 
                      array (
                        'key' => '-BOOTMOR',
                        'value' => 1762,
                      ),
                      118 => 
                      array (
                        'key' => '-BOP SLEEVE',
                        'value' => 1763,
                      ),
                      119 => 
                      array (
                        'key' => '-BOP WRAP',
                        'value' => 1764,
                      ),
                      120 => 
                      array (
                        'key' => '-BOTTOM LOADING',
                        'value' => 1765,
                      ),
                      121 => 
                      array (
                        'key' => '-BR7',
                        'value' => 1766,
                      ),
                      122 => 
                      array (
                        'key' => '-BRAIDAIR',
                        'value' => 1767,
                      ),
                      123 => 
                      array (
                        'key' => '-BRANHAM CHEMONE SUPERIOR',
                        'value' => 1768,
                      ),
                      124 => 
                      array (
                        'key' => '-BREATHING AIR',
                        'value' => 1769,
                      ),
                      125 => 
                      array (
                        'key' => '-BREATHING AIR PLUS',
                        'value' => 1770,
                      ),
                      126 => 
                      array (
                        'key' => '-BRENNTAG',
                        'value' => 1771,
                      ),
                      127 => 
                      array (
                        'key' => '-BREWERS HOSE',
                        'value' => 1772,
                      ),
                      128 => 
                      array (
                        'key' => '-BREWLINE',
                        'value' => 1773,
                      ),
                      129 => 
                      array (
                        'key' => '-BRICK RED AIR',
                        'value' => 1774,
                      ),
                      130 => 
                      array (
                        'key' => '-BRIDGEPOINT',
                        'value' => 1775,
                      ),
                      131 => 
                      array (
                        'key' => '-BRIGADE® MINE',
                        'value' => 1776,
                      ),
                      132 => 
                      array (
                        'key' => '-BRINE HOSE',
                        'value' => 1777,
                      ),
                      133 => 
                      array (
                        'key' => '-BROOM SWEEPER',
                        'value' => 1778,
                      ),
                      134 => 
                      array (
                        'key' => '-BROWN FLEXWING®',
                        'value' => 1779,
                      ),
                      135 => 
                      array (
                        'key' => '-BUHLER MIAG',
                        'value' => 1780,
                      ),
                      136 => 
                      array (
                        'key' => '-BUTTERWORTH',
                        'value' => 1781,
                      ),
                      137 => 
                      array (
                        'key' => '-BUTYL 200',
                        'value' => 1782,
                      ),
                      138 => 
                      array (
                        'key' => '-C&J WATER S&D',
                        'value' => 1783,
                      ),
                      139 => 
                      array (
                        'key' => '-CABLE CONDUIT',
                        'value' => 1784,
                      ),
                      140 => 
                      array (
                        'key' => '-CABLE COOLING HOSE',
                        'value' => 1785,
                      ),
                      141 => 
                      array (
                        'key' => '-CABLE COVER',
                        'value' => 1786,
                      ),
                      142 => 
                      array (
                        'key' => '-CAMBRG HEALY PII',
                        'value' => 1787,
                      ),
                      143 => 
                      array (
                        'key' => '-CAMLOK',
                        'value' => 1788,
                      ),
                      144 => 
                      array (
                        'key' => '-CARON ARCTIC FLEX',
                        'value' => 1789,
                      ),
                      145 => 
                      array (
                        'key' => '-CARON BLACK SOFTWALL',
                        'value' => 1790,
                      ),
                      146 => 
                      array (
                        'key' => '-CARON FABCHEM',
                        'value' => 1791,
                      ),
                      147 => 
                      array (
                        'key' => '-CASCADE DRY CEMENT',
                        'value' => 1792,
                      ),
                      148 => 
                      array (
                        'key' => '-CENEX',
                        'value' => 1793,
                      ),
                      149 => 
                      array (
                        'key' => '-CENEX OT',
                        'value' => 1794,
                      ),
                      150 => 
                      array (
                        'key' => '-CENTRAL ROCK DRILL',
                        'value' => 1795,
                      ),
                      151 => 
                      array (
                        'key' => '-CHEMICAL ACID DISCHARGE',
                        'value' => 1796,
                      ),
                      152 => 
                      array (
                        'key' => '-CHEM ONE®',
                        'value' => 1797,
                      ),
                      153 => 
                      array (
                        'key' => '-CHEMSTREAM',
                        'value' => 1798,
                      ),
                      154 => 
                      array (
                        'key' => '-CHLO GARLOK',
                        'value' => 1799,
                      ),
                      155 => 
                      array (
                        'key' => '-CLEANJET',
                        'value' => 1800,
                      ),
                      156 => 
                      array (
                        'key' => '-CLEANJET FDA',
                        'value' => 1801,
                      ),
                      157 => 
                      array (
                        'key' => '-CLEAR PVC TUBING',
                        'value' => 1802,
                      ),
                      158 => 
                      array (
                        'key' => '-CLEARWATER',
                        'value' => 1803,
                      ),
                      159 => 
                      array (
                        'key' => '-CO2 HOSE',
                        'value' => 1804,
                      ),
                      160 => 
                      array (
                        'key' => '-COAST GUARD',
                        'value' => 1805,
                      ),
                      161 => 
                      array (
                        'key' => '-COLD BLUE',
                        'value' => 1806,
                      ),
                      162 => 
                      array (
                        'key' => '-COLLECTOR',
                        'value' => 1807,
                      ),
                      163 => 
                      array (
                        'key' => '-COLLECTOR FLEX',
                        'value' => 1808,
                      ),
                      164 => 
                      array (
                        'key' => '-COLORITE',
                        'value' => 1809,
                      ),
                      165 => 
                      array (
                        'key' => '-CON FORM SUPER FLEX',
                        'value' => 1810,
                      ),
                      166 => 
                      array (
                        'key' => '-CON-AG WATER S&D',
                        'value' => 1811,
                      ),
                      167 => 
                      array (
                        'key' => '-CONCRETE G820',
                        'value' => 1812,
                      ),
                      168 => 
                      array (
                        'key' => '-CONCRETE VIBRATOR',
                        'value' => 1813,
                      ),
                      169 => 
                      array (
                        'key' => '-CONTI CHEM OIL',
                        'value' => 1814,
                      ),
                      170 => 
                      array (
                        'key' => '-CONTI CHEM PHARMA',
                        'value' => 1815,
                      ),
                      171 => 
                      array (
                        'key' => '-CONTI CHEM STANDARD',
                        'value' => 1816,
                      ),
                      172 => 
                      array (
                        'key' => '-CONTI CHEM SUPERIOR FEP',
                        'value' => 1817,
                      ),
                      173 => 
                      array (
                        'key' => '-CONTI PAINT SPRAY',
                        'value' => 1818,
                      ),
                      174 => 
                      array (
                        'key' => '-CONTI POTABLE WATER',
                        'value' => 1819,
                      ),
                      175 => 
                      array (
                        'key' => '-CONTI WASTE WATER',
                        'value' => 1820,
                      ),
                      176 => 
                      array (
                        'key' => '-CONTINENTAL STEEL STEAM 250',
                        'value' => 1821,
                      ),
                      177 => 
                      array (
                        'key' => '-CONTRACTOR 4001',
                        'value' => 1822,
                      ),
                      178 => 
                      array (
                        'key' => '-CONTRACTOR WATER S&D',
                        'value' => 1823,
                      ),
                      179 => 
                      array (
                        'key' => '-CONTRACTOR\'S WATER',
                        'value' => 1824,
                      ),
                      180 => 
                      array (
                        'key' => '-COOLING WATER',
                        'value' => 1825,
                      ),
                      181 => 
                      array (
                        'key' => '-COOLING WATER 2.0',
                        'value' => 1826,
                      ),
                      182 => 
                      array (
                        'key' => '-CPE DISCHARGE',
                        'value' => 1827,
                      ),
                      183 => 
                      array (
                        'key' => '-CREE BREWERS HOSE',
                        'value' => 1828,
                      ),
                      184 => 
                      array (
                        'key' => '-CULVERT',
                        'value' => 1829,
                      ),
                      185 => 
                      array (
                        'key' => '-DAMPF TRIX 5000',
                        'value' => 1830,
                      ),
                      186 => 
                      array (
                        'key' => '-DAMPF TRIX 6000',
                        'value' => 1831,
                      ),
                      187 => 
                      array (
                        'key' => '-DARCY REDWING FUEL OIL',
                        'value' => 1832,
                      ),
                      188 => 
                      array (
                        'key' => '-DEADMAN AIRCRAFT REFUELING',
                        'value' => 1833,
                      ),
                      189 => 
                      array (
                        'key' => '-DEADMAN SANDBLAST',
                        'value' => 1834,
                      ),
                      190 => 
                      array (
                        'key' => '-DEERE',
                        'value' => 1835,
                      ),
                      191 => 
                      array (
                        'key' => '-DEF DISPENSING',
                        'value' => 1836,
                      ),
                      192 => 
                      array (
                        'key' => '-DEF TRANSFER',
                        'value' => 1837,
                      ),
                      193 => 
                      array (
                        'key' => '-DEL TWIN-LINE GRADE R',
                        'value' => 1838,
                      ),
                      194 => 
                      array (
                        'key' => '-DEL TWIN-LINE GRADE RM',
                        'value' => 1839,
                      ),
                      195 => 
                      array (
                        'key' => '-DENVER',
                        'value' => 1840,
                      ),
                      196 => 
                      array (
                        'key' => '-DENVER CONC VIBR',
                        'value' => 1841,
                      ),
                      197 => 
                      array (
                        'key' => '-DESERT DR16SC',
                        'value' => 1842,
                      ),
                      198 => 
                      array (
                        'key' => '-DESERT DR1SN',
                        'value' => 1843,
                      ),
                      199 => 
                      array (
                        'key' => '-DESERT DR2SN',
                        'value' => 1844,
                      ),
                      200 => 
                      array (
                        'key' => '-DESERT DR5',
                        'value' => 1845,
                      ),
                      201 => 
                      array (
                        'key' => '-DESERT DUT',
                        'value' => 1846,
                      ),
                      202 => 
                      array (
                        'key' => '-DEWATERING',
                        'value' => 1847,
                      ),
                      203 => 
                      array (
                        'key' => '-DIESEL OIL HARDWALL',
                        'value' => 1848,
                      ),
                      204 => 
                      array (
                        'key' => '-DIESEL OIL SOFTWALL',
                        'value' => 1849,
                      ),
                      205 => 
                      array (
                        'key' => '-DIGESTER',
                        'value' => 1850,
                      ),
                      206 => 
                      array (
                        'key' => '-DIISOCYANATE',
                        'value' => 1851,
                      ),
                      207 => 
                      array (
                        'key' => '-DINGA HOT WATER GUN',
                        'value' => 1852,
                      ),
                      208 => 
                      array (
                        'key' => '-DISCHARGE',
                        'value' => 1853,
                      ),
                      209 => 
                      array (
                        'key' => '-DISHWASHER DRAIN',
                        'value' => 1854,
                      ),
                      210 => 
                      array (
                        'key' => '-DISTILLERY 150',
                        'value' => 1855,
                      ),
                      211 => 
                      array (
                        'key' => '-DISTRB ACID',
                        'value' => 1856,
                      ),
                      212 => 
                      array (
                        'key' => '-DISTRB ARCTIC ORTAC',
                        'value' => 1857,
                      ),
                      213 => 
                      array (
                        'key' => '-DISTRB STEEL AIR',
                        'value' => 1858,
                      ),
                      214 => 
                      array (
                        'key' => '-DISTRB WATER S&D',
                        'value' => 1859,
                      ),
                      215 => 
                      array (
                        'key' => '-DIVERSIFLEX',
                        'value' => 1860,
                      ),
                      216 => 
                      array (
                        'key' => '-DIVERSIPIPE',
                        'value' => 1861,
                      ),
                      217 => 
                      array (
                        'key' => '-DIVING HOSE',
                        'value' => 1862,
                      ),
                      218 => 
                      array (
                        'key' => '-DMC CAUSTIC',
                        'value' => 1863,
                      ),
                      219 => 
                      array (
                        'key' => '-DOCK',
                        'value' => 1864,
                      ),
                      220 => 
                      array (
                        'key' => '-DOCK EN1765 L15',
                        'value' => 1865,
                      ),
                      221 => 
                      array (
                        'key' => '-DOCK EN1765 S15',
                        'value' => 1866,
                      ),
                      222 => 
                      array (
                        'key' => '-DOCK FDA',
                        'value' => 1867,
                      ),
                      223 => 
                      array (
                        'key' => '-DOCK SMOOTH BORE HOT SULFUR',
                        'value' => 1868,
                      ),
                      224 => 
                      array (
                        'key' => '-DOCK SUPPLY SW',
                        'value' => 1869,
                      ),
                      225 => 
                      array (
                        'key' => '-DREDGE SLEEVE',
                        'value' => 1870,
                      ),
                      226 => 
                      array (
                        'key' => '-DRILL WATER',
                        'value' => 1871,
                      ),
                      227 => 
                      array (
                        'key' => '-DRINKLINE',
                        'value' => 1872,
                      ),
                      228 => 
                      array (
                        'key' => '-DRY CEMENT HD HARDWALL',
                        'value' => 1873,
                      ),
                      229 => 
                      array (
                        'key' => '-DRY CEMENT SOFTWALL',
                        'value' => 1874,
                      ),
                      230 => 
                      array (
                        'key' => '-DRY ICE HOSE',
                        'value' => 1875,
                      ),
                      231 => 
                      array (
                        'key' => '-DUDLEY WATER',
                        'value' => 1876,
                      ),
                      232 => 
                      array (
                        'key' => '-DUNLOP BOOSTER',
                        'value' => 1877,
                      ),
                      233 => 
                      array (
                        'key' => '-DURACO',
                        'value' => 1878,
                      ),
                      234 => 
                      array (
                        'key' => '-DURACO ROADPATCH',
                        'value' => 1879,
                      ),
                      235 => 
                      array (
                        'key' => '-DYNACRAFT',
                        'value' => 1880,
                      ),
                      236 => 
                      array (
                        'key' => '-DYNO',
                        'value' => 1881,
                      ),
                      237 => 
                      array (
                        'key' => '-DYNO HOSE',
                        'value' => 1882,
                      ),
                      238 => 
                      array (
                        'key' => '-E 1-1',
                        'value' => 1883,
                      ),
                      239 => 
                      array (
                        'key' => '-E 3-1',
                        'value' => 1884,
                      ),
                      240 => 
                      array (
                        'key' => '-E 3-2',
                        'value' => 1885,
                      ),
                      241 => 
                      array (
                        'key' => '-EAGLE AIR & WATER',
                        'value' => 1886,
                      ),
                      242 => 
                      array (
                        'key' => '-EHLYNN',
                        'value' => 1887,
                      ),
                      243 => 
                      array (
                        'key' => '-EHLYNN FLOUR TEC',
                        'value' => 1888,
                      ),
                      244 => 
                      array (
                        'key' => '-EHLYNN FOOD DISCHARGE',
                        'value' => 1889,
                      ),
                      245 => 
                      array (
                        'key' => '-EHLYNN HOT AIR',
                        'value' => 1890,
                      ),
                      246 => 
                      array (
                        'key' => '-EHLYNN PIPE CONNECTOR',
                        'value' => 1891,
                      ),
                      247 => 
                      array (
                        'key' => '-EHLYNN TPG',
                        'value' => 1892,
                      ),
                      248 => 
                      array (
                        'key' => '-ELAFLEX LAY FLAT',
                        'value' => 1893,
                      ),
                      249 => 
                      array (
                        'key' => '-ELITE STANDARD RADIATOR',
                        'value' => 1894,
                      ),
                      250 => 
                      array (
                        'key' => '-ELITE SW MARINE WET EXHAUST',
                        'value' => 1895,
                      ),
                      251 => 
                      array (
                        'key' => '-EN12115 PETROLEUM',
                        'value' => 1896,
                      ),
                      252 => 
                      array (
                        'key' => '-EPDM 200',
                        'value' => 1897,
                      ),
                      253 => 
                      array (
                        'key' => '-EPDM 200 (ECONOMY)',
                        'value' => 1898,
                      ),
                      254 => 
                      array (
                        'key' => '-EPDM 200 (NON CON)',
                        'value' => 1899,
                      ),
                      255 => 
                      array (
                        'key' => '-EPDM ACID',
                        'value' => 1900,
                      ),
                      256 => 
                      array (
                        'key' => '-EPDM DISCHARGE',
                        'value' => 1901,
                      ),
                      257 => 
                      array (
                        'key' => '-EPDM S&D',
                        'value' => 1902,
                      ),
                      258 => 
                      array (
                        'key' => '-EPDM SD HD WATER',
                        'value' => 1903,
                      ),
                      259 => 
                      array (
                        'key' => '-EPDM SD WATER',
                        'value' => 1904,
                      ),
                      260 => 
                      array (
                        'key' => '-ERGON',
                        'value' => 1905,
                      ),
                      261 => 
                      array (
                        'key' => '-ERIKS',
                        'value' => 1906,
                      ),
                      262 => 
                      array (
                        'key' => '-EURO TRIX',
                        'value' => 1907,
                      ),
                      263 => 
                      array (
                        'key' => '-EXIMCO',
                        'value' => 1908,
                      ),
                      264 => 
                      array (
                        'key' => '-EXON GP DOCK',
                        'value' => 1909,
                      ),
                      265 => 
                      array (
                        'key' => '-EXPRESS BLOWER',
                        'value' => 1910,
                      ),
                      266 => 
                      array (
                        'key' => '-EXSTATIC',
                        'value' => 1911,
                      ),
                      267 => 
                      array (
                        'key' => '-EXTREMEBLAST LOAD',
                        'value' => 1912,
                      ),
                      268 => 
                      array (
                        'key' => '-EXTREMEFLEX™ BEVERAGE',
                        'value' => 1913,
                      ),
                      269 => 
                      array (
                        'key' => '-EXTREMEFLEX™ BROWN',
                        'value' => 1914,
                      ),
                      270 => 
                      array (
                        'key' => '-EXTREMEFLEX™ PURPLE',
                        'value' => 1915,
                      ),
                      271 => 
                      array (
                        'key' => '-EXTREMEFLEX™ FOOD BLUE',
                        'value' => 1916,
                      ),
                      272 => 
                      array (
                        'key' => '-EXTREMEFLEX™ FOOD GRAY',
                        'value' => 1917,
                      ),
                      273 => 
                      array (
                        'key' => '-EXTREMEFLEX™ PETROLEUM',
                        'value' => 1918,
                      ),
                      274 => 
                      array (
                        'key' => '-EXTREMEFLEX™ POTABLE WATER',
                        'value' => 1919,
                      ),
                      275 => 
                      array (
                        'key' => '-EXTREMEFLEX™ VERSIFLO',
                        'value' => 1920,
                      ),
                      276 => 
                      array (
                        'key' => '-EXTREMEFLEX™ WATER SLURRY',
                        'value' => 1921,
                      ),
                      277 => 
                      array (
                        'key' => '-EZ GLIDE WINE',
                        'value' => 1922,
                      ),
                      278 => 
                      array (
                        'key' => '-F5™',
                        'value' => 1923,
                      ),
                      279 => 
                      array (
                        'key' => '-FABCHEM®',
                        'value' => 1924,
                      ),
                      280 => 
                      array (
                        'key' => '-FABCHEM ARC',
                        'value' => 1925,
                      ),
                      281 => 
                      array (
                        'key' => '-FABCHEM EN12115',
                        'value' => 1926,
                      ),
                      282 => 
                      array (
                        'key' => '-FABCHEM-C',
                        'value' => 1927,
                      ),
                      283 => 
                      array (
                        'key' => '-FIBERG CRUCIBLE GASK',
                        'value' => 1928,
                      ),
                      284 => 
                      array (
                        'key' => '-FINISHING BRANDS',
                        'value' => 1929,
                      ),
                      285 => 
                      array (
                        'key' => '-FIRE ENGINE BOOSTER',
                        'value' => 1930,
                      ),
                      286 => 
                      array (
                        'key' => '-FIRE ENGINE SUCTION',
                        'value' => 1931,
                      ),
                      287 => 
                      array (
                        'key' => '-FIRE ENGINER BOOSTER',
                        'value' => 1932,
                      ),
                      288 => 
                      array (
                        'key' => '-FISH HOSE',
                        'value' => 1933,
                      ),
                      289 => 
                      array (
                        'key' => '-FISH TRANSFER',
                        'value' => 1934,
                      ),
                      290 => 
                      array (
                        'key' => '-FLDCON',
                        'value' => 1935,
                      ),
                      291 => 
                      array (
                        'key' => '-FLEXAGRIP™',
                        'value' => 1936,
                      ),
                      292 => 
                      array (
                        'key' => '-FLEXCHEM 225',
                        'value' => 1937,
                      ),
                      293 => 
                      array (
                        'key' => '-FLEXDOCK',
                        'value' => 1938,
                      ),
                      294 => 
                      array (
                        'key' => '-FLEXDOCK VERSAFUEL',
                        'value' => 1939,
                      ),
                      295 => 
                      array (
                        'key' => '-FLEXIBLE DOWNSPOUT',
                        'value' => 1940,
                      ),
                      296 => 
                      array (
                        'key' => '-FLEXIBLE TEFLON',
                        'value' => 1941,
                      ),
                      297 => 
                      array (
                        'key' => '-FLEXICORE',
                        'value' => 1942,
                      ),
                      298 => 
                      array (
                        'key' => '-FLEX-ING FLEX AQUA WATER S&D',
                        'value' => 1943,
                      ),
                      299 => 
                      array (
                        'key' => '-FLEX-ING FLEX-ON',
                        'value' => 1944,
                      ),
                      300 => 
                      array (
                        'key' => '-FLEXJET',
                        'value' => 1945,
                      ),
                      301 => 
                      array (
                        'key' => '-FLEX-PULSE FPII',
                        'value' => 1946,
                      ),
                      302 => 
                      array (
                        'key' => '-FLEXRITE',
                        'value' => 1947,
                      ),
                      303 => 
                      array (
                        'key' => '-FLEXSHIELD SAE J1527 TYPE A1-15',
                        'value' => 1948,
                      ),
                      304 => 
                      array (
                        'key' => '-FLEXSTEEL® 250 CB EXTREME CRIMP',
                        'value' => 1949,
                      ),
                      305 => 
                      array (
                        'key' => '-FLEXSTEEL® 250 CB STEAM',
                        'value' => 1950,
                      ),
                      306 => 
                      array (
                        'key' => '-FLEXSTEEL® 250 EPDM-20',
                        'value' => 1951,
                      ),
                      307 => 
                      array (
                        'key' => '-FLEXSTEEL® 250 ORS STEAM',
                        'value' => 1952,
                      ),
                      308 => 
                      array (
                        'key' => '-FLEXSTEEL® 250 STEAM',
                        'value' => 1953,
                      ),
                      309 => 
                      array (
                        'key' => '-FLEXSTEEL® FUTURA',
                        'value' => 1954,
                      ),
                      310 => 
                      array (
                        'key' => '-FLEXSTEEL® FUTURA B20',
                        'value' => 1955,
                      ),
                      311 => 
                      array (
                        'key' => '-FLEXSTEEL® FUTURA E25',
                        'value' => 1956,
                      ),
                      312 => 
                      array (
                        'key' => '-FLEXSTEEL® FUTURA ETHAN-ALL',
                        'value' => 1957,
                      ),
                      313 => 
                      array (
                        'key' => '-FLEXSTEEL® FUTURA HVR',
                        'value' => 1958,
                      ),
                      314 => 
                      array (
                        'key' => '-FLEXSTEEL® FUTURA HVR LOW PERM',
                        'value' => 1959,
                      ),
                      315 => 
                      array (
                        'key' => '-FLEXSTEEL® FUTURA LOW PERM',
                        'value' => 1960,
                      ),
                      316 => 
                      array (
                        'key' => '-FLEXSTEEL® FUTURA VAPOR ASSIST',
                        'value' => 1961,
                      ),
                      317 => 
                      array (
                        'key' => '-FLEXSTEEL®MINE SPRAY',
                        'value' => 1962,
                      ),
                      318 => 
                      array (
                        'key' => '-FLEXSTEEL® MINESPRAY',
                        'value' => 1963,
                      ),
                      319 => 
                      array (
                        'key' => '-FLEXSTEEL® SERVICE STATION AIR',
                        'value' => 1964,
                      ),
                      320 => 
                      array (
                        'key' => '-FLEXTRA DRY MATERIAL',
                        'value' => 1965,
                      ),
                      321 => 
                      array (
                        'key' => '-FLEXTRA LT',
                        'value' => 1966,
                      ),
                      322 => 
                      array (
                        'key' => '-FLEXTRA OILFIELD',
                        'value' => 1967,
                      ),
                      323 => 
                      array (
                        'key' => '-FLEXTRA ROCK DUST',
                        'value' => 1968,
                      ),
                      324 => 
                      array (
                        'key' => '-FLEXWAC',
                        'value' => 1969,
                      ),
                      325 => 
                      array (
                        'key' => '-FLEXWING® FOOD BLUE',
                        'value' => 1970,
                      ),
                      326 => 
                      array (
                        'key' => '-FLEXWING® OILFIELD',
                        'value' => 1971,
                      ),
                      327 => 
                      array (
                        'key' => '-FLEXWING® PETROLEUM',
                        'value' => 1972,
                      ),
                      328 => 
                      array (
                        'key' => '-FLEXWING® VERSAFUEL',
                        'value' => 1973,
                      ),
                      329 => 
                      array (
                        'key' => '-FLEXWING® WATER S&D',
                        'value' => 1974,
                      ),
                      330 => 
                      array (
                        'key' => '-FLOATER',
                        'value' => 1975,
                      ),
                      331 => 
                      array (
                        'key' => '-FLOATING HOSES',
                        'value' => 1976,
                      ),
                      332 => 
                      array (
                        'key' => '-FLOUR DISCHARGE',
                        'value' => 1977,
                      ),
                      333 => 
                      array (
                        'key' => '-FLUOROPAL',
                        'value' => 1978,
                      ),
                      334 => 
                      array (
                        'key' => '-FOAM',
                        'value' => 1979,
                      ),
                      335 => 
                      array (
                        'key' => '-FOOD 2720',
                        'value' => 1980,
                      ),
                      336 => 
                      array (
                        'key' => '-FOOD DISCHARGE',
                        'value' => 1981,
                      ),
                      337 => 
                      array (
                        'key' => '-FOOD FLEX',
                        'value' => 1982,
                      ),
                      338 => 
                      array (
                        'key' => '-FOOD S&D',
                        'value' => 1983,
                      ),
                      339 => 
                      array (
                        'key' => '-FOODCLEAN',
                        'value' => 1984,
                      ),
                      340 => 
                      array (
                        'key' => '-FOODLINER',
                        'value' => 1985,
                      ),
                      341 => 
                      array (
                        'key' => '-FORECAST BLAST',
                        'value' => 1986,
                      ),
                      342 => 
                      array (
                        'key' => '-FORECAST BLAST XF',
                        'value' => 1987,
                      ),
                      343 => 
                      array (
                        'key' => '-FORECAST SUCTION',
                        'value' => 1988,
                      ),
                      344 => 
                      array (
                        'key' => '-FORESTRY',
                        'value' => 1989,
                      ),
                      345 => 
                      array (
                        'key' => '-FORMADRAIN INFLATABLE HOSE',
                        'value' => 1990,
                      ),
                      346 => 
                      array (
                        'key' => '-FORTRESS',
                        'value' => 1991,
                      ),
                      347 => 
                      array (
                        'key' => '-FOSTER',
                        'value' => 1992,
                      ),
                      348 => 
                      array (
                        'key' => '-FRAC',
                        'value' => 1993,
                      ),
                      349 => 
                      array (
                        'key' => '-FRAC ACID S&D',
                        'value' => 1994,
                      ),
                      350 => 
                      array (
                        'key' => '-FRAC BLENDING S&D',
                        'value' => 1995,
                      ),
                      351 => 
                      array (
                        'key' => '-FRACO',
                        'value' => 1996,
                      ),
                      352 => 
                      array (
                        'key' => '-FREON CHARGING',
                        'value' => 1997,
                      ),
                      353 => 
                      array (
                        'key' => '-FRIG SEA',
                        'value' => 1998,
                      ),
                      354 => 
                      array (
                        'key' => '-FRONTIER®',
                        'value' => 1999,
                      ),
                      355 => 
                      array (
                        'key' => '-FUEL DISCHARGE',
                        'value' => 2000,
                      ),
                      356 => 
                      array (
                        'key' => '-FUEL DISCHARGE HD',
                        'value' => 2001,
                      ),
                      357 => 
                      array (
                        'key' => '-FUEL FILL SAE J1527 TYPE A2',
                        'value' => 2002,
                      ),
                      358 => 
                      array (
                        'key' => '-FUEL RIG SW',
                        'value' => 2003,
                      ),
                      359 => 
                      array (
                        'key' => '-FUELGRIP COUPLING',
                        'value' => 2004,
                      ),
                      360 => 
                      array (
                        'key' => '-FUGGITT',
                        'value' => 2005,
                      ),
                      361 => 
                      array (
                        'key' => '-FUJI',
                        'value' => 2006,
                      ),
                      362 => 
                      array (
                        'key' => '-FURNACE DOOR',
                        'value' => 2007,
                      ),
                      363 => 
                      array (
                        'key' => '-FUTURA O-RING KIT',
                        'value' => 2008,
                      ),
                      364 => 
                      array (
                        'key' => '-FUTURA RET RING INST. TOOL',
                        'value' => 2009,
                      ),
                      365 => 
                      array (
                        'key' => '-GALAXY G4826',
                        'value' => 2010,
                      ),
                      366 => 
                      array (
                        'key' => '-GALAXY G4867',
                        'value' => 2011,
                      ),
                      367 => 
                      array (
                        'key' => '-GALAXY G4890',
                        'value' => 2012,
                      ),
                      368 => 
                      array (
                        'key' => '-GALVANATOR®',
                        'value' => 2013,
                      ),
                      369 => 
                      array (
                        'key' => '-GAMMON',
                        'value' => 2014,
                      ),
                      370 => 
                      array (
                        'key' => '-GAUNTLET®',
                        'value' => 2015,
                      ),
                      371 => 
                      array (
                        'key' => '-GENERIC',
                        'value' => 2016,
                      ),
                      372 => 
                      array (
                        'key' => '-GENERIC LOW TEMP TANK TRUCK',
                        'value' => 2017,
                      ),
                      373 => 
                      array (
                        'key' => '-GENERIC PLASTER & GROUT',
                        'value' => 2018,
                      ),
                      374 => 
                      array (
                        'key' => '-GENERIC VACUUM',
                        'value' => 2019,
                      ),
                      375 => 
                      array (
                        'key' => '-GENERIC WATER DISCHARGE',
                        'value' => 2020,
                      ),
                      376 => 
                      array (
                        'key' => '-GENERIC WATER S&D',
                        'value' => 2021,
                      ),
                      377 => 
                      array (
                        'key' => '-GENLINE',
                        'value' => 2022,
                      ),
                      378 => 
                      array (
                        'key' => '-GENLINE GL',
                        'value' => 2023,
                      ),
                      379 => 
                      array (
                        'key' => '-GENLINE GL-802',
                        'value' => 2024,
                      ),
                      380 => 
                      array (
                        'key' => '-GENLINE GL-803',
                        'value' => 2025,
                      ),
                      381 => 
                      array (
                        'key' => '-GHX',
                        'value' => 2026,
                      ),
                      382 => 
                      array (
                        'key' => '-GILBARCO',
                        'value' => 2027,
                      ),
                      383 => 
                      array (
                        'key' => '-GLOBAL',
                        'value' => 2028,
                      ),
                      384 => 
                      array (
                        'key' => '-GNSPEC',
                        'value' => 2029,
                      ),
                      385 => 
                      array (
                        'key' => '-GNSPEC 100R12',
                        'value' => 2030,
                      ),
                      386 => 
                      array (
                        'key' => '-GNSPEC 100R16',
                        'value' => 2031,
                      ),
                      387 => 
                      array (
                        'key' => '-GNSPEC 100R2',
                        'value' => 2032,
                      ),
                      388 => 
                      array (
                        'key' => '-GNSPEC 100R6',
                        'value' => 2033,
                      ),
                      389 => 
                      array (
                        'key' => '-GNSPEC 200 AIR',
                        'value' => 2034,
                      ),
                      390 => 
                      array (
                        'key' => '-GNSPEC 250 AIR',
                        'value' => 2035,
                      ),
                      391 => 
                      array (
                        'key' => '-GNSPEC 300 AIR',
                        'value' => 2036,
                      ),
                      392 => 
                      array (
                        'key' => '-GNSPEC 4001 PRESSURE WASHER',
                        'value' => 2037,
                      ),
                      393 => 
                      array (
                        'key' => '-GNSPEC 4500 PRESSURE WASHER',
                        'value' => 2038,
                      ),
                      394 => 
                      array (
                        'key' => '-GNSPEC NR SPRAY',
                        'value' => 2039,
                      ),
                      395 => 
                      array (
                        'key' => '-GNSPEC PUSH ON 250',
                        'value' => 2040,
                      ),
                      396 => 
                      array (
                        'key' => '-GOLD SNAKE',
                        'value' => 2041,
                      ),
                      397 => 
                      array (
                        'key' => '-GOOD FLEX',
                        'value' => 2042,
                      ),
                      398 => 
                      array (
                        'key' => '-GOODALL',
                        'value' => 2043,
                      ),
                      399 => 
                      array (
                        'key' => '-GORILLA',
                        'value' => 2044,
                      ),
                      400 => 
                      array (
                        'key' => '-GRACO',
                        'value' => 2045,
                      ),
                      401 => 
                      array (
                        'key' => '-GRAINGER',
                        'value' => 2046,
                      ),
                      402 => 
                      array (
                        'key' => '-GRAY FLEXTRA LT',
                        'value' => 2047,
                      ),
                      403 => 
                      array (
                        'key' => '-GRAY FLEXWING®',
                        'value' => 2048,
                      ),
                      404 => 
                      array (
                        'key' => '-GRAY FOOD',
                        'value' => 2049,
                      ),
                      405 => 
                      array (
                        'key' => '-GRAY SUCTION',
                        'value' => 2050,
                      ),
                      406 => 
                      array (
                        'key' => '-GREASE GUN HOSE',
                        'value' => 2051,
                      ),
                      407 => 
                      array (
                        'key' => '-GREAT NECK',
                        'value' => 2052,
                      ),
                      408 => 
                      array (
                        'key' => '-GREAT PLAINS',
                        'value' => 2053,
                      ),
                      409 => 
                      array (
                        'key' => '-GREEN HORNET XF',
                        'value' => 2054,
                      ),
                      410 => 
                      array (
                        'key' => '-GUNITE',
                        'value' => 2055,
                      ),
                      411 => 
                      array (
                        'key' => '-HAMILTON BLAST',
                        'value' => 2056,
                      ),
                      412 => 
                      array (
                        'key' => '-HAMILTON HYDROCARBON DRAIN',
                        'value' => 2057,
                      ),
                      413 => 
                      array (
                        'key' => '-HANLIO TWIN-LINE GRADE R',
                        'value' => 2058,
                      ),
                      414 => 
                      array (
                        'key' => '-HART',
                        'value' => 2059,
                      ),
                      415 => 
                      array (
                        'key' => '-HART BLACK SOFTWALL',
                        'value' => 2060,
                      ),
                      416 => 
                      array (
                        'key' => '-HART FABCHEM',
                        'value' => 2061,
                      ),
                      417 => 
                      array (
                        'key' => '-HART FLOUR DISCHARGE',
                        'value' => 2062,
                      ),
                      418 => 
                      array (
                        'key' => '-HART HOT AIR',
                        'value' => 2063,
                      ),
                      419 => 
                      array (
                        'key' => '-HARVEST',
                        'value' => 2064,
                      ),
                      420 => 
                      array (
                        'key' => '-HD AIR',
                        'value' => 2065,
                      ),
                      421 => 
                      array (
                        'key' => '-HD AIR & WATER',
                        'value' => 2066,
                      ),
                      422 => 
                      array (
                        'key' => '-HD INDUSTRIAL VACUUM',
                        'value' => 2067,
                      ),
                      423 => 
                      array (
                        'key' => '-HD PETRO TRANSFER',
                        'value' => 2068,
                      ),
                      424 => 
                      array (
                        'key' => '-HD VACUUM',
                        'value' => 2069,
                      ),
                      425 => 
                      array (
                        'key' => '-HD WATER DISCHARGE',
                        'value' => 2070,
                      ),
                      426 => 
                      array (
                        'key' => '-HD WATER SD',
                        'value' => 2071,
                      ),
                      427 => 
                      array (
                        'key' => '-HEATER HOSE 20R3D2',
                        'value' => 2072,
                      ),
                      428 => 
                      array (
                        'key' => '-HEATER WATER',
                        'value' => 2073,
                      ),
                      429 => 
                      array (
                        'key' => '-HEAVY DUTY STEAM PILE DRIVER',
                        'value' => 2074,
                      ),
                      430 => 
                      array (
                        'key' => '-HEWITT',
                        'value' => 2075,
                      ),
                      431 => 
                      array (
                        'key' => '-HEWITT AIRCRAFT',
                        'value' => 2076,
                      ),
                      432 => 
                      array (
                        'key' => '-HI-MINER II',
                        'value' => 2077,
                      ),
                      433 => 
                      array (
                        'key' => '-HI-PER®',
                        'value' => 2078,
                      ),
                      434 => 
                      array (
                        'key' => '-HIPER WATER',
                        'value' => 2079,
                      ),
                      435 => 
                      array (
                        'key' => '-HOOSIER FOOD TL',
                        'value' => 2080,
                      ),
                      436 => 
                      array (
                        'key' => '-HOSCO',
                        'value' => 2081,
                      ),
                      437 => 
                      array (
                        'key' => '-HOSE POWER',
                        'value' => 2082,
                      ),
                      438 => 
                      array (
                        'key' => '-HOSEPOWER',
                        'value' => 2083,
                      ),
                      439 => 
                      array (
                        'key' => '-HOT TAR & ASPHALT EN13482',
                        'value' => 2084,
                      ),
                      440 => 
                      array (
                        'key' => '-HOT TAR & ASPHALT ROUGH BORE',
                        'value' => 2085,
                      ),
                      441 => 
                      array (
                        'key' => '-HOT WATER ELITE',
                        'value' => 2086,
                      ),
                      442 => 
                      array (
                        'key' => '-HR4',
                        'value' => 2087,
                      ),
                      443 => 
                      array (
                        'key' => '-HR6',
                        'value' => 2088,
                      ),
                      444 => 
                      array (
                        'key' => '-HUDSON',
                        'value' => 2089,
                      ),
                      445 => 
                      array (
                        'key' => '-HUMIDIFIER HOSE',
                        'value' => 2090,
                      ),
                      446 => 
                      array (
                        'key' => '-HUSKY',
                        'value' => 2091,
                      ),
                      447 => 
                      array (
                        'key' => '-HVLP NON-CONDUCTIVE',
                        'value' => 2092,
                      ),
                      448 => 
                      array (
                        'key' => '-HW DRY CEMENT & BARITES',
                        'value' => 2093,
                      ),
                      449 => 
                      array (
                        'key' => '-HYDROCARBON DRAIN',
                        'value' => 2094,
                      ),
                      450 => 
                      array (
                        'key' => '-HYDROVATOR',
                        'value' => 2095,
                      ),
                      451 => 
                      array (
                        'key' => '-HYDROVATOR PLUS',
                        'value' => 2096,
                      ),
                      452 => 
                      array (
                        'key' => '-I.R.F.',
                        'value' => 2097,
                      ),
                      453 => 
                      array (
                        'key' => '-IBM COOLING WATER',
                        'value' => 2098,
                      ),
                      454 => 
                      array (
                        'key' => '-IBRS',
                        'value' => 2099,
                      ),
                      455 => 
                      array (
                        'key' => '-IBRS SANITARY',
                        'value' => 2100,
                      ),
                      456 => 
                      array (
                        'key' => '-ICE CUTTER HOSE',
                        'value' => 2101,
                      ),
                      457 => 
                      array (
                        'key' => '-INERT GAS',
                        'value' => 2102,
                      ),
                      458 => 
                      array (
                        'key' => '-INET COOLING',
                        'value' => 2103,
                      ),
                      459 => 
                      array (
                        'key' => '-INFINITY™ CHEMICAL',
                        'value' => 2104,
                      ),
                      460 => 
                      array (
                        'key' => '-INFINITY™ FOOD',
                        'value' => 2105,
                      ),
                      461 => 
                      array (
                        'key' => '-INFINITY™ FUEL DROP',
                        'value' => 2106,
                      ),
                      462 => 
                      array (
                        'key' => '-INFINITY™ FUEL DROP HD',
                        'value' => 2107,
                      ),
                      463 => 
                      array (
                        'key' => '-INFINITY™ MILK',
                        'value' => 2108,
                      ),
                      464 => 
                      array (
                        'key' => '-INJECTION COOLANT',
                        'value' => 2109,
                      ),
                      465 => 
                      array (
                        'key' => '-INLET HOSE',
                        'value' => 2110,
                      ),
                      466 => 
                      array (
                        'key' => '-INSTA-GRIP™ 250',
                        'value' => 2111,
                      ),
                      467 => 
                      array (
                        'key' => '-INSTA-GRIP™ 300',
                        'value' => 2112,
                      ),
                      468 => 
                      array (
                        'key' => '-INSTA-GRIP™ HT',
                        'value' => 2113,
                      ),
                      469 => 
                      array (
                        'key' => '-INSTA-GRIP™ SP',
                        'value' => 2114,
                      ),
                      470 => 
                      array (
                        'key' => '-INSTA-GRIP™ TC',
                        'value' => 2115,
                      ),
                      471 => 
                      array (
                        'key' => '-INSTA-LOCK',
                        'value' => 2116,
                      ),
                      472 => 
                      array (
                        'key' => '-INTERCHEM',
                        'value' => 2117,
                      ),
                      473 => 
                      array (
                        'key' => '-INTERM',
                        'value' => 2118,
                      ),
                      474 => 
                      array (
                        'key' => '-INTERNATIONAL BELT',
                        'value' => 2119,
                      ),
                      475 => 
                      array (
                        'key' => '-IRC DRILL WATER',
                        'value' => 2120,
                      ),
                      476 => 
                      array (
                        'key' => '-IRPCO',
                        'value' => 2121,
                      ),
                      477 => 
                      array (
                        'key' => '-IRR',
                        'value' => 2122,
                      ),
                      478 => 
                      array (
                        'key' => '-IRR FLEX JET',
                        'value' => 2123,
                      ),
                      479 => 
                      array (
                        'key' => '-IRRIGATION BOOT',
                        'value' => 2124,
                      ),
                      480 => 
                      array (
                        'key' => '-ISO 3821',
                        'value' => 2125,
                      ),
                      481 => 
                      array (
                        'key' => '-ISO 8031',
                        'value' => 2126,
                      ),
                      482 => 
                      array (
                        'key' => '-ITALPR',
                        'value' => 2127,
                      ),
                      483 => 
                      array (
                        'key' => '-ITALPR TEFLON',
                        'value' => 2128,
                      ),
                      484 => 
                      array (
                        'key' => '-JACKHAMMER',
                        'value' => 2129,
                      ),
                      485 => 
                      array (
                        'key' => '-JB INDUSTRIES',
                        'value' => 2130,
                      ),
                      486 => 
                      array (
                        'key' => '-JET RANGER™',
                        'value' => 2131,
                      ),
                      487 => 
                      array (
                        'key' => '-JETTING',
                        'value' => 2132,
                      ),
                      488 => 
                      array (
                        'key' => '-JETTING AND UTILITY',
                        'value' => 2133,
                      ),
                      489 => 
                      array (
                        'key' => '-JGB INDUSTRIES',
                        'value' => 2134,
                      ),
                      490 => 
                      array (
                        'key' => '-JOHN DEERE',
                        'value' => 2135,
                      ),
                      491 => 
                      array (
                        'key' => '-KAPTEC ULTRAFLEX',
                        'value' => 2136,
                      ),
                      492 => 
                      array (
                        'key' => '-KAPTECH FOOD DICHARGE',
                        'value' => 2137,
                      ),
                      493 => 
                      array (
                        'key' => '-KELCO BLAST',
                        'value' => 2138,
                      ),
                      494 => 
                      array (
                        'key' => '-KETEK FLEX PETROLEUM',
                        'value' => 2139,
                      ),
                      495 => 
                      array (
                        'key' => '-KINKGUARD',
                        'value' => 2140,
                      ),
                      496 => 
                      array (
                        'key' => '-LABOUR BLUCOR COUPLING',
                        'value' => 2141,
                      ),
                      497 => 
                      array (
                        'key' => '-LACTOPAL',
                        'value' => 2142,
                      ),
                      498 => 
                      array (
                        'key' => '-LAKECHARLES',
                        'value' => 2143,
                      ),
                      499 => 
                      array (
                        'key' => '-LEGACY TPU',
                        'value' => 2144,
                      ),
                      500 => 
                      array (
                        'key' => '-LG NITRILE',
                        'value' => 2145,
                      ),
                      501 => 
                      array (
                        'key' => '-LIGHTRAC',
                        'value' => 2146,
                      ),
                      502 => 
                      array (
                        'key' => '-LIGHTWEIGHT VACUUM',
                        'value' => 2147,
                      ),
                      503 => 
                      array (
                        'key' => '-LINECRETE',
                        'value' => 2148,
                      ),
                      504 => 
                      array (
                        'key' => '-LIQUID MUD',
                        'value' => 2149,
                      ),
                      505 => 
                      array (
                        'key' => '-LIQUID MUD YS',
                        'value' => 2150,
                      ),
                      506 => 
                      array (
                        'key' => '-LIQUIFORCE',
                        'value' => 2151,
                      ),
                      507 => 
                      array (
                        'key' => '-LPG DELIVERY PRO',
                        'value' => 2152,
                      ),
                      508 => 
                      array (
                        'key' => '-LW ARCTIC TANK TRUCK',
                        'value' => 2153,
                      ),
                      509 => 
                      array (
                        'key' => '-LW BLACK FLEXTRA II',
                        'value' => 2154,
                      ),
                      510 => 
                      array (
                        'key' => '-LW INDUSTRIAL VACUUM',
                        'value' => 2155,
                      ),
                      511 => 
                      array (
                        'key' => '-M&P MINE CONDUIT',
                        'value' => 2156,
                      ),
                      512 => 
                      array (
                        'key' => '-MANUS BLAST',
                        'value' => 2157,
                      ),
                      513 => 
                      array (
                        'key' => '-MANUS BLAST WHIP',
                        'value' => 2158,
                      ),
                      514 => 
                      array (
                        'key' => '-MARIAN',
                        'value' => 2159,
                      ),
                      515 => 
                      array (
                        'key' => '-MARINE BILGE',
                        'value' => 2160,
                      ),
                      516 => 
                      array (
                        'key' => '-MARINE EXHAUST HOSE',
                        'value' => 2161,
                      ),
                      517 => 
                      array (
                        'key' => '-MARINE FUEL FEED VENT J1527 B2',
                        'value' => 2162,
                      ),
                      518 => 
                      array (
                        'key' => '-MARINE FUEL FILL',
                        'value' => 2163,
                      ),
                      519 => 
                      array (
                        'key' => '-MARINE FUEL LINE',
                        'value' => 2164,
                      ),
                      520 => 
                      array (
                        'key' => '-MARINE HARDWALL WET EXHAUST',
                        'value' => 2165,
                      ),
                      521 => 
                      array (
                        'key' => '-MARINE LIVEWELL',
                        'value' => 2166,
                      ),
                      522 => 
                      array (
                        'key' => '-MARINE OIL FILL',
                        'value' => 2167,
                      ),
                      523 => 
                      array (
                        'key' => '-MARINE SANITATION',
                        'value' => 2168,
                      ),
                      524 => 
                      array (
                        'key' => '-MARINE SOFTWALL WET EXHAUST',
                        'value' => 2169,
                      ),
                      525 => 
                      array (
                        'key' => '-MARINE VACUUM',
                        'value' => 2170,
                      ),
                      526 => 
                      array (
                        'key' => '-MAST-AIR',
                        'value' => 2171,
                      ),
                      527 => 
                      array (
                        'key' => '-MASTERCOOL',
                        'value' => 2172,
                      ),
                      528 => 
                      array (
                        'key' => '-MASTHD',
                        'value' => 2173,
                      ),
                      529 => 
                      array (
                        'key' => '-MATERIAL HANDLING',
                        'value' => 2174,
                      ),
                      530 => 
                      array (
                        'key' => '-MATERIAL HANDLING DISCHARGE',
                        'value' => 2175,
                      ),
                      531 => 
                      array (
                        'key' => '-MAXXIM PREMIER ULTRA',
                        'value' => 2176,
                      ),
                      532 => 
                      array (
                        'key' => '-MCCARTY WATER S&D',
                        'value' => 2177,
                      ),
                      533 => 
                      array (
                        'key' => '-MCGILL',
                        'value' => 2178,
                      ),
                      534 => 
                      array (
                        'key' => '-MECR&S',
                        'value' => 2179,
                      ),
                      535 => 
                      array (
                        'key' => '-MECR&S PAINT SPRAY',
                        'value' => 2180,
                      ),
                      536 => 
                      array (
                        'key' => '-MER OILFIELD SUCTION',
                        'value' => 2181,
                      ),
                      537 => 
                      array (
                        'key' => '-MERMAR',
                        'value' => 2182,
                      ),
                      538 => 
                      array (
                        'key' => '-MESA',
                        'value' => 2183,
                      ),
                      539 => 
                      array (
                        'key' => '-MESA AMMONIUM NITRATE PELLET',
                        'value' => 2184,
                      ),
                      540 => 
                      array (
                        'key' => '-MESA DRAIN',
                        'value' => 2185,
                      ),
                      541 => 
                      array (
                        'key' => '-MESA GUNITE',
                        'value' => 2186,
                      ),
                      542 => 
                      array (
                        'key' => '-MESA PLASTER & GROUT',
                        'value' => 2187,
                      ),
                      543 => 
                      array (
                        'key' => '-MESA REFRACTORY GUNITE',
                        'value' => 2188,
                      ),
                      544 => 
                      array (
                        'key' => '-MESA ROOF DRAIN',
                        'value' => 2189,
                      ),
                      545 => 
                      array (
                        'key' => '-MESA ROOF DRAIN CHEMICAL',
                        'value' => 2190,
                      ),
                      546 => 
                      array (
                        'key' => '-MHPRF 11588G II ST',
                        'value' => 2191,
                      ),
                      547 => 
                      array (
                        'key' => '-MIDWEST',
                        'value' => 2192,
                      ),
                      548 => 
                      array (
                        'key' => '-MIL A-A-59566',
                        'value' => 2193,
                      ),
                      549 => 
                      array (
                        'key' => '-MIL A-A-59567',
                        'value' => 2194,
                      ),
                      550 => 
                      array (
                        'key' => '-MIL-A-A-59565',
                        'value' => 2195,
                      ),
                      551 => 
                      array (
                        'key' => '-MIL-DTL-13444-I',
                        'value' => 2196,
                      ),
                      552 => 
                      array (
                        'key' => '-MIL-DTL-13444-III',
                        'value' => 2197,
                      ),
                      553 => 
                      array (
                        'key' => '-MIL-DTL-13531 TYPE II, CL A',
                        'value' => 2198,
                      ),
                      554 => 
                      array (
                        'key' => '-MIL-DTL-17505',
                        'value' => 2199,
                      ),
                      555 => 
                      array (
                        'key' => '-MIL-DTL-20176',
                        'value' => 2200,
                      ),
                      556 => 
                      array (
                        'key' => '-MIL-DTL-22240',
                        'value' => 2201,
                      ),
                      557 => 
                      array (
                        'key' => '-MIL-DTL-27516',
                        'value' => 2202,
                      ),
                      558 => 
                      array (
                        'key' => '-MIL-DTL-29210E',
                        'value' => 2203,
                      ),
                      559 => 
                      array (
                        'key' => '-MIL-DTL-6615',
                        'value' => 2204,
                      ),
                      560 => 
                      array (
                        'key' => '-MIL-H-24580',
                        'value' => 2205,
                      ),
                      561 => 
                      array (
                        'key' => '-MIL-H-82127',
                        'value' => 2206,
                      ),
                      562 => 
                      array (
                        'key' => '-MIL-PRF-11588 TYPE I',
                        'value' => 2207,
                      ),
                      563 => 
                      array (
                        'key' => '-MIL-PRF-11588 TYPE III',
                        'value' => 2208,
                      ),
                      564 => 
                      array (
                        'key' => '-MIL-PRF-370 TYPE A',
                        'value' => 2209,
                      ),
                      565 => 
                      array (
                        'key' => '-MIL-PRF-370 TYPE B',
                        'value' => 2210,
                      ),
                      566 => 
                      array (
                        'key' => '-MILTARY',
                        'value' => 2211,
                      ),
                      567 => 
                      array (
                        'key' => '-MILTON',
                        'value' => 2212,
                      ),
                      568 => 
                      array (
                        'key' => '-MINE CONDUIT',
                        'value' => 2213,
                      ),
                      569 => 
                      array (
                        'key' => '-MOCCASIN',
                        'value' => 2214,
                      ),
                      570 => 
                      array (
                        'key' => '-MORRIS AIR SEEDER',
                        'value' => 2215,
                      ),
                      571 => 
                      array (
                        'key' => '-MORRIS AIR SEEDER LT',
                        'value' => 2216,
                      ),
                      572 => 
                      array (
                        'key' => '-MPI',
                        'value' => 2217,
                      ),
                      573 => 
                      array (
                        'key' => '-MPI PREMIUM-GUARD MARINE',
                        'value' => 2218,
                      ),
                      574 => 
                      array (
                        'key' => '-MUD CUTTING HW',
                        'value' => 2219,
                      ),
                      575 => 
                      array (
                        'key' => '-MUD RETURN LINE',
                        'value' => 2220,
                      ),
                      576 => 
                      array (
                        'key' => '-MUD STACKING',
                        'value' => 2221,
                      ),
                      577 => 
                      array (
                        'key' => '-MULTISTREAM HW',
                        'value' => 2222,
                      ),
                      578 => 
                      array (
                        'key' => '-MULTISTREAM SW',
                        'value' => 2223,
                      ),
                      579 => 
                      array (
                        'key' => '-NAFIRE',
                        'value' => 2224,
                      ),
                      580 => 
                      array (
                        'key' => '-NAVISTAR',
                        'value' => 2225,
                      ),
                      581 => 
                      array (
                        'key' => '-NELSON DUNN',
                        'value' => 2226,
                      ),
                      582 => 
                      array (
                        'key' => '-NEPTUNE',
                        'value' => 2227,
                      ),
                      583 => 
                      array (
                        'key' => '-NESI OILFIELD',
                        'value' => 2228,
                      ),
                      584 => 
                      array (
                        'key' => '-NEWLINE',
                        'value' => 2229,
                      ),
                      585 => 
                      array (
                        'key' => '-NISHIN',
                        'value' => 2230,
                      ),
                      586 => 
                      array (
                        'key' => '-NISSHIN',
                        'value' => 2231,
                      ),
                      587 => 
                      array (
                        'key' => '-NITRO FLOOD WATER S&D',
                        'value' => 2232,
                      ),
                      588 => 
                      array (
                        'key' => '-NITRO R&C WATER S&D',
                        'value' => 2233,
                      ),
                      589 => 
                      array (
                        'key' => '-NITROGEN SERVICE',
                        'value' => 2234,
                      ),
                      590 => 
                      array (
                        'key' => '-NOV',
                        'value' => 2235,
                      ),
                      591 => 
                      array (
                        'key' => '-NPETRO LW',
                        'value' => 2236,
                      ),
                      592 => 
                      array (
                        'key' => '-NR SPRAY',
                        'value' => 2237,
                      ),
                      593 => 
                      array (
                        'key' => '-NR7',
                        'value' => 2238,
                      ),
                      594 => 
                      array (
                        'key' => '-NR8',
                        'value' => 2239,
                      ),
                      595 => 
                      array (
                        'key' => '-NSH',
                        'value' => 2240,
                      ),
                      596 => 
                      array (
                        'key' => '-NUTRIFLEX',
                        'value' => 2241,
                      ),
                      597 => 
                      array (
                        'key' => '-NUTRIFLEX STATIC WIRE',
                        'value' => 2242,
                      ),
                      598 => 
                      array (
                        'key' => '-NUTRIFLEX S&D',
                        'value' => 2243,
                      ),
                      599 => 
                      array (
                        'key' => '-NUTRIFLO S&D',
                        'value' => 2244,
                      ),
                      600 => 
                      array (
                        'key' => '-OAKLEY',
                        'value' => 2245,
                      ),
                      601 => 
                      array (
                        'key' => '-OFFSHORE FUEL',
                        'value' => 2246,
                      ),
                      602 => 
                      array (
                        'key' => '-OFFSHORE VIPER',
                        'value' => 2247,
                      ),
                      603 => 
                      array (
                        'key' => '-OIL DISCHARGE',
                        'value' => 2248,
                      ),
                      604 => 
                      array (
                        'key' => '-OIL RIG HARDWALL',
                        'value' => 2249,
                      ),
                      605 => 
                      array (
                        'key' => '-OIL RIG HARDWALL BIOFUEL',
                        'value' => 2250,
                      ),
                      606 => 
                      array (
                        'key' => '-OIL RIG SOFTWALL',
                        'value' => 2251,
                      ),
                      607 => 
                      array (
                        'key' => '-OIL TREAT & BLENDER',
                        'value' => 2252,
                      ),
                      608 => 
                      array (
                        'key' => '-OILFIELD DISCHARGE',
                        'value' => 2253,
                      ),
                      609 => 
                      array (
                        'key' => '-OILFIELD FRAC',
                        'value' => 2254,
                      ),
                      610 => 
                      array (
                        'key' => '-OMNI',
                        'value' => 2255,
                      ),
                      611 => 
                      array (
                        'key' => '-OMNI WATER S&D',
                        'value' => 2256,
                      ),
                      612 => 
                      array (
                        'key' => '-ORANGE FLEXWING®',
                        'value' => 2257,
                      ),
                      613 => 
                      array (
                        'key' => '-ORTAC™',
                        'value' => 2258,
                      ),
                      614 => 
                      array (
                        'key' => '-ORTAC™ II',
                        'value' => 2259,
                      ),
                      615 => 
                      array (
                        'key' => '-PACER™',
                        'value' => 2260,
                      ),
                      616 => 
                      array (
                        'key' => '-PAGUFIX',
                        'value' => 2261,
                      ),
                      617 => 
                      array (
                        'key' => '-PALADIN',
                        'value' => 2262,
                      ),
                      618 => 
                      array (
                        'key' => '-PANGBORN PA BLAST',
                        'value' => 2263,
                      ),
                      619 => 
                      array (
                        'key' => '-PARKING',
                        'value' => 2264,
                      ),
                      620 => 
                      array (
                        'key' => '-PERFECT GARDEN HOSE',
                        'value' => 2265,
                      ),
                      621 => 
                      array (
                        'key' => '-PERLAPAL',
                        'value' => 2266,
                      ),
                      622 => 
                      array (
                        'key' => '-PETERS LIQUID MUD',
                        'value' => 2267,
                      ),
                      623 => 
                      array (
                        'key' => '-PETRO OIL S&D',
                        'value' => 2268,
                      ),
                      624 => 
                      array (
                        'key' => '-PETROL HARDWALL',
                        'value' => 2269,
                      ),
                      625 => 
                      array (
                        'key' => '-PGC PLACEMENT TEXTILE',
                        'value' => 2270,
                      ),
                      626 => 
                      array (
                        'key' => '-PHX FUEL GAS',
                        'value' => 2271,
                      ),
                      627 => 
                      array (
                        'key' => '-PHX OXYGEN',
                        'value' => 2272,
                      ),
                      628 => 
                      array (
                        'key' => '-PLASTER & GROUT',
                        'value' => 2273,
                      ),
                      629 => 
                      array (
                        'key' => '-PLATINUM JAC RISER',
                        'value' => 2274,
                      ),
                      630 => 
                      array (
                        'key' => '-PLIOVIC FG',
                        'value' => 2275,
                      ),
                      631 => 
                      array (
                        'key' => '-PLIOVIC GS™',
                        'value' => 2276,
                      ),
                      632 => 
                      array (
                        'key' => '-PLIOVIC PLUS',
                        'value' => 2277,
                      ),
                      633 => 
                      array (
                        'key' => '-PLIOVIC PVC TUBING',
                        'value' => 2278,
                      ),
                      634 => 
                      array (
                        'key' => '-POSEIDON UL94-HB',
                        'value' => 2279,
                      ),
                      635 => 
                      array (
                        'key' => '-POT LINE',
                        'value' => 2280,
                      ),
                      636 => 
                      array (
                        'key' => '-POT LINE HD',
                        'value' => 2281,
                      ),
                      637 => 
                      array (
                        'key' => '-POTABLE STOCK TANK',
                        'value' => 2282,
                      ),
                      638 => 
                      array (
                        'key' => '-POTABLE WATER',
                        'value' => 2283,
                      ),
                      639 => 
                      array (
                        'key' => '-POTABLE WATER HW',
                        'value' => 2284,
                      ),
                      640 => 
                      array (
                        'key' => '-POTABLE WATER SW',
                        'value' => 2285,
                      ),
                      641 => 
                      array (
                        'key' => '-PRAIRIE GOLDFLEX',
                        'value' => 2286,
                      ),
                      642 => 
                      array (
                        'key' => '-PREM MARINE WET EXHAUST COR',
                        'value' => 2287,
                      ),
                      643 => 
                      array (
                        'key' => '-PREMIER REFRACTORY CLAMP',
                        'value' => 2288,
                      ),
                      644 => 
                      array (
                        'key' => '-PREMIUM GARDEN',
                        'value' => 2289,
                      ),
                      645 => 
                      array (
                        'key' => '-PREMIUM MARINE WET EXHAUST',
                        'value' => 2290,
                      ),
                      646 => 
                      array (
                        'key' => '-PROSPECTOR™ AIR',
                        'value' => 2291,
                      ),
                      647 => 
                      array (
                        'key' => '-PROSPECTOR™ BOP 3000',
                        'value' => 2292,
                      ),
                      648 => 
                      array (
                        'key' => '-PROSPECTOR™ BOP 5000',
                        'value' => 2293,
                      ),
                      649 => 
                      array (
                        'key' => '-PROSPECTOR™ FLEX',
                        'value' => 2294,
                      ),
                      650 => 
                      array (
                        'key' => '-PROSPECTOR™ FLEX OILFIELD',
                        'value' => 2295,
                      ),
                      651 => 
                      array (
                        'key' => '-PROSPECTOR™ FLEX PETRO',
                        'value' => 2296,
                      ),
                      652 => 
                      array (
                        'key' => '-PROSPECTOR™ FRAC DISCHARGE',
                        'value' => 2297,
                      ),
                      653 => 
                      array (
                        'key' => '-PROSPECTOR™ FRAC TANK HOSE',
                        'value' => 2298,
                      ),
                      654 => 
                      array (
                        'key' => '-PROSPECTOR™ HOT OILER',
                        'value' => 2299,
                      ),
                      655 => 
                      array (
                        'key' => '-PROSPECTOR™ MINESPRAY',
                        'value' => 2300,
                      ),
                      656 => 
                      array (
                        'key' => '-PROSPECTOR™ OIL RIG HW',
                        'value' => 2301,
                      ),
                      657 => 
                      array (
                        'key' => '-PROSPECTOR™ OIL RIG SW',
                        'value' => 2302,
                      ),
                      658 => 
                      array (
                        'key' => '-PROSPECTOR™ OILFIELD',
                        'value' => 2303,
                      ),
                      659 => 
                      array (
                        'key' => '-PROSPECTOR™ OILFIELD S&D',
                        'value' => 2304,
                      ),
                      660 => 
                      array (
                        'key' => '-PROSPECTOR™ PETRO',
                        'value' => 2305,
                      ),
                      661 => 
                      array (
                        'key' => '-PROSPECTOR™ PLUS AIR',
                        'value' => 2306,
                      ),
                      662 => 
                      array (
                        'key' => '-PROSPECTOR™ SHR',
                        'value' => 2307,
                      ),
                      663 => 
                      array (
                        'key' => '-PROSPECTOR™ WATER DISCHARGE',
                        'value' => 2308,
                      ),
                      664 => 
                      array (
                        'key' => '-PROSPECTOR™ WATER S&D',
                        'value' => 2309,
                      ),
                      665 => 
                      array (
                        'key' => '-PROTECTION RING',
                        'value' => 2310,
                      ),
                      666 => 
                      array (
                        'key' => '-PSC CHEMICAL',
                        'value' => 2311,
                      ),
                      667 => 
                      array (
                        'key' => '-PULP & PAPER WASHDOWN',
                        'value' => 2312,
                      ),
                      668 => 
                      array (
                        'key' => '-PUREONE',
                        'value' => 2313,
                      ),
                      669 => 
                      array (
                        'key' => '-PURFIT',
                        'value' => 2314,
                      ),
                      670 => 
                      array (
                        'key' => '-PURFIT BREWLINE',
                        'value' => 2315,
                      ),
                      671 => 
                      array (
                        'key' => '-PURPLE FLEXWING®',
                        'value' => 2316,
                      ),
                      672 => 
                      array (
                        'key' => '-PURPLE SNAKE',
                        'value' => 2317,
                      ),
                      673 => 
                      array (
                        'key' => '-PURPLE SNAKE PLUS',
                        'value' => 2318,
                      ),
                      674 => 
                      array (
                        'key' => '-PYROFLEX HOT AIR',
                        'value' => 2319,
                      ),
                      675 => 
                      array (
                        'key' => '-PYROFLEX HOT AIR III FDA',
                        'value' => 2320,
                      ),
                      676 => 
                      array (
                        'key' => '-PYROFLEX HOT TAR WAND',
                        'value' => 2321,
                      ),
                      677 => 
                      array (
                        'key' => '-PYROFLEX II HOT AIR',
                        'value' => 2322,
                      ),
                      678 => 
                      array (
                        'key' => '-PYROFLEX II HOT TAR & ASPHALT',
                        'value' => 2323,
                      ),
                      679 => 
                      array (
                        'key' => '-PYROFLEX III HOT AIR',
                        'value' => 2324,
                      ),
                      680 => 
                      array (
                        'key' => '-PYROFLEX III HOT AIR FDA',
                        'value' => 2325,
                      ),
                      681 => 
                      array (
                        'key' => '-QR048',
                        'value' => 2326,
                      ),
                      682 => 
                      array (
                        'key' => '-QR48',
                        'value' => 2327,
                      ),
                      683 => 
                      array (
                        'key' => '-QUIKSTIR',
                        'value' => 2328,
                      ),
                      684 => 
                      array (
                        'key' => '-QUIKSTIR PUMP 2P',
                        'value' => 2329,
                      ),
                      685 => 
                      array (
                        'key' => '-RADIATOR',
                        'value' => 2330,
                      ),
                      686 => 
                      array (
                        'key' => '-RAGCO',
                        'value' => 2331,
                      ),
                      687 => 
                      array (
                        'key' => '-RAIL',
                        'value' => 2332,
                      ),
                      688 => 
                      array (
                        'key' => '-RANSBG NR SPRAY',
                        'value' => 2333,
                      ),
                      689 => 
                      array (
                        'key' => '-RAWHID FIRE ENGINE BOOSTER',
                        'value' => 2334,
                      ),
                      690 => 
                      array (
                        'key' => '-RCT FLEXRITE',
                        'value' => 2335,
                      ),
                      691 => 
                      array (
                        'key' => '-RDC',
                        'value' => 2336,
                      ),
                      692 => 
                      array (
                        'key' => '-REAL RUBBER',
                        'value' => 2337,
                      ),
                      693 => 
                      array (
                        'key' => '-RED FLEXTRA',
                        'value' => 2338,
                      ),
                      694 => 
                      array (
                        'key' => '-RED-L GOLDFLEX-C',
                        'value' => 2339,
                      ),
                      695 => 
                      array (
                        'key' => '-RED-L WATER',
                        'value' => 2340,
                      ),
                      696 => 
                      array (
                        'key' => '-REDWING BLUE LOW TEMP',
                        'value' => 2341,
                      ),
                      697 => 
                      array (
                        'key' => '-REDWING FUEL OIL',
                        'value' => 2342,
                      ),
                      698 => 
                      array (
                        'key' => '-REDWING FUEL OIL HD',
                        'value' => 2343,
                      ),
                      699 => 
                      array (
                        'key' => '-REDWING VERSABRAID™',
                        'value' => 2344,
                      ),
                      700 => 
                      array (
                        'key' => '-REFRACTORY GUNITE',
                        'value' => 2345,
                      ),
                      701 => 
                      array (
                        'key' => '-REFRACTORY HOSE',
                        'value' => 2346,
                      ),
                      702 => 
                      array (
                        'key' => '-REFRIGERANT CHARGING',
                        'value' => 2347,
                      ),
                      703 => 
                      array (
                        'key' => '-RELIANCE PROSPECTOR WATER S&D',
                        'value' => 2348,
                      ),
                      704 => 
                      array (
                        'key' => '-RELIANCE WATER S&D',
                        'value' => 2349,
                      ),
                      705 => 
                      array (
                        'key' => '-RES',
                        'value' => 2350,
                      ),
                      706 => 
                      array (
                        'key' => '-REVERSE CIRCULATION',
                        'value' => 2351,
                      ),
                      707 => 
                      array (
                        'key' => '-RIG SUPPLY',
                        'value' => 2352,
                      ),
                      708 => 
                      array (
                        'key' => '-RIG SUPPLY SW',
                        'value' => 2353,
                      ),
                      709 => 
                      array (
                        'key' => '-RIVERB',
                        'value' => 2354,
                      ),
                      710 => 
                      array (
                        'key' => '-RL1131 TWIN-LINE GRADE R',
                        'value' => 2355,
                      ),
                      711 => 
                      array (
                        'key' => '-ROADPATCH',
                        'value' => 2356,
                      ),
                      712 => 
                      array (
                        'key' => '-ROBIN FREON CHARGING',
                        'value' => 2357,
                      ),
                      713 => 
                      array (
                        'key' => '-ROCK DRILL',
                        'value' => 2358,
                      ),
                      714 => 
                      array (
                        'key' => '-ROOF DRAIN',
                        'value' => 2359,
                      ),
                      715 => 
                      array (
                        'key' => '-ROUGH BORE (HOT TAR & ASPHALT)',
                        'value' => 2360,
                      ),
                      716 => 
                      array (
                        'key' => '-ROUGH BORE DOCK',
                        'value' => 2361,
                      ),
                      717 => 
                      array (
                        'key' => '-ROYAL BRASS PLIOVIC',
                        'value' => 2362,
                      ),
                      718 => 
                      array (
                        'key' => '-RSD',
                        'value' => 2363,
                      ),
                      719 => 
                      array (
                        'key' => '-RX',
                        'value' => 2364,
                      ),
                      720 => 
                      array (
                        'key' => '-S4SH',
                        'value' => 2365,
                      ),
                      721 => 
                      array (
                        'key' => '-S4SP',
                        'value' => 2366,
                      ),
                      722 => 
                      array (
                        'key' => '-SAE 100R4',
                        'value' => 2367,
                      ),
                      723 => 
                      array (
                        'key' => '-SAE 20R1',
                        'value' => 2368,
                      ),
                      724 => 
                      array (
                        'key' => '-SAE 20R2 D1',
                        'value' => 2369,
                      ),
                      725 => 
                      array (
                        'key' => '-SAE 20R2D1',
                        'value' => 2370,
                      ),
                      726 => 
                      array (
                        'key' => '-SAE J1527 A2 R1 ISO 7840 A2',
                        'value' => 2371,
                      ),
                      727 => 
                      array (
                        'key' => '-SAE J1527 TYPE A2 FUEL FILL',
                        'value' => 2372,
                      ),
                      728 => 
                      array (
                        'key' => '-SAE-20R2 D1',
                        'value' => 2373,
                      ),
                      729 => 
                      array (
                        'key' => '-SAND RECOVERY S&D',
                        'value' => 2374,
                      ),
                      730 => 
                      array (
                        'key' => '-SAND SUCTION',
                        'value' => 2375,
                      ),
                      731 => 
                      array (
                        'key' => '-SANDBLAST 400',
                        'value' => 2376,
                      ),
                      732 => 
                      array (
                        'key' => '-SANDER',
                        'value' => 2377,
                      ),
                      733 => 
                      array (
                        'key' => '-SANI-WASH™',
                        'value' => 2378,
                      ),
                      734 => 
                      array (
                        'key' => '-SANI-WASH™ PLUS',
                        'value' => 2379,
                      ),
                      735 => 
                      array (
                        'key' => '-SANI-WASH™ SUPREME',
                        'value' => 2380,
                      ),
                      736 => 
                      array (
                        'key' => '-SCOMI LIQUID MUD',
                        'value' => 2381,
                      ),
                      737 => 
                      array (
                        'key' => '-SCP3',
                        'value' => 2382,
                      ),
                      738 => 
                      array (
                        'key' => '-SCRMAC KURB KING',
                        'value' => 2383,
                      ),
                      739 => 
                      array (
                        'key' => '-SEALFS',
                        'value' => 2384,
                      ),
                      740 => 
                      array (
                        'key' => '-SERVICE STATION AIR',
                        'value' => 2385,
                      ),
                      741 => 
                      array (
                        'key' => '-SFS (FIRE SUPPRESSION)',
                        'value' => 2386,
                      ),
                      742 => 
                      array (
                        'key' => '-SGOBAIN',
                        'value' => 2387,
                      ),
                      743 => 
                      array (
                        'key' => '-SGOBAIN FOOD DISCHARGE',
                        'value' => 2388,
                      ),
                      744 => 
                      array (
                        'key' => '-SGOBAIN FOOD S&D',
                        'value' => 2389,
                      ),
                      745 => 
                      array (
                        'key' => '-SHELLFLEX',
                        'value' => 2390,
                      ),
                      746 => 
                      array (
                        'key' => '-SHIELD',
                        'value' => 2391,
                      ),
                      747 => 
                      array (
                        'key' => '-SINGLE-LINE (GRADE R)',
                        'value' => 2392,
                      ),
                      748 => 
                      array (
                        'key' => '-SINGLE-LINE (GRADE RM)',
                        'value' => 2393,
                      ),
                      749 => 
                      array (
                        'key' => '-SINGLE-LINE (GRADE T)',
                        'value' => 2394,
                      ),
                      750 => 
                      array (
                        'key' => '-SK CARBOV',
                        'value' => 2395,
                      ),
                      751 => 
                      array (
                        'key' => '-SLURRY',
                        'value' => 2396,
                      ),
                      752 => 
                      array (
                        'key' => '-SMOOTH BORE DOCK',
                        'value' => 2397,
                      ),
                      753 => 
                      array (
                        'key' => '-SMOOTH BORE HOT TAR & ASPHALT',
                        'value' => 2398,
                      ),
                      754 => 
                      array (
                        'key' => '-SMOOTH BORE MOLTEN SULPHUR',
                        'value' => 2399,
                      ),
                      755 => 
                      array (
                        'key' => '-SNAPON',
                        'value' => 2400,
                      ),
                      756 => 
                      array (
                        'key' => '-SOFTUB WATER',
                        'value' => 2401,
                      ),
                      757 => 
                      array (
                        'key' => '-SOFTWALL',
                        'value' => 2402,
                      ),
                      758 => 
                      array (
                        'key' => '-SOHO PROSPECTOR WATER S&D',
                        'value' => 2403,
                      ),
                      759 => 
                      array (
                        'key' => '-SOUTHERN',
                        'value' => 2404,
                      ),
                      760 => 
                      array (
                        'key' => '-SPARTAN PRESSURE WASHER',
                        'value' => 2405,
                      ),
                      761 => 
                      array (
                        'key' => '-SPEEDAIRE',
                        'value' => 2406,
                      ),
                      762 => 
                      array (
                        'key' => '-SPIR SEP',
                        'value' => 2407,
                      ),
                      763 => 
                      array (
                        'key' => '-SPIR SEP TPG',
                        'value' => 2408,
                      ),
                      764 => 
                      array (
                        'key' => '-SPIRAFLEX® 1500',
                        'value' => 2409,
                      ),
                      765 => 
                      array (
                        'key' => '-SPIRAFLEX® 1600',
                        'value' => 2410,
                      ),
                      766 => 
                      array (
                        'key' => '-SPIRAFLEX® ACTION F.E.S',
                        'value' => 2411,
                      ),
                      767 => 
                      array (
                        'key' => '-SPIRAFLEX® AGFLEX',
                        'value' => 2412,
                      ),
                      768 => 
                      array (
                        'key' => '-SPIRAFLEX® AGGIE',
                        'value' => 2413,
                      ),
                      769 => 
                      array (
                        'key' => '-SPIRAFLEX® AIR SEEDER',
                        'value' => 2414,
                      ),
                      770 => 
                      array (
                        'key' => '-SPIRAFLEX® BARKBLOWER',
                        'value' => 2415,
                      ),
                      771 => 
                      array (
                        'key' => '-SPIRAFLEX® BLACK SUPER-DUTY',
                        'value' => 2416,
                      ),
                      772 => 
                      array (
                        'key' => '-SPIRAFLEX® BLUE EXTRA LIGHT DUTY',
                        'value' => 2417,
                      ),
                      773 => 
                      array (
                        'key' => '-SPIRAFLEX® CABLE GUARD',
                        'value' => 2418,
                      ),
                      774 => 
                      array (
                        'key' => '-SPIRAFLEX® DUCTING',
                        'value' => 2419,
                      ),
                      775 => 
                      array (
                        'key' => '-SPIRAFLEX® FGVAC',
                        'value' => 2420,
                      ),
                      776 => 
                      array (
                        'key' => '-SPIRAFLEX® FISH SUCTION',
                        'value' => 2421,
                      ),
                      777 => 
                      array (
                        'key' => '-SPIRAFLEX® FOODVAC',
                        'value' => 2422,
                      ),
                      778 => 
                      array (
                        'key' => '-SPIRAFLEX® GRASSVAC',
                        'value' => 2423,
                      ),
                      779 => 
                      array (
                        'key' => '-SPIRAFLEX® GRAY LIGHT DUTY',
                        'value' => 2424,
                      ),
                      780 => 
                      array (
                        'key' => '-SPIRAFLEX® GREEN',
                        'value' => 2425,
                      ),
                      781 => 
                      array (
                        'key' => '-SPIRAFLEX® HT',
                        'value' => 2426,
                      ),
                      782 => 
                      array (
                        'key' => '-SPIRAFLEX® LW ROCK DUST',
                        'value' => 2427,
                      ),
                      783 => 
                      array (
                        'key' => '-SPIRAFLEX® MULCH BLOWER',
                        'value' => 2428,
                      ),
                      784 => 
                      array (
                        'key' => '-SPIRAFLEX® MULCHBLOWER',
                        'value' => 2429,
                      ),
                      785 => 
                      array (
                        'key' => '-SPIRAFLEX® RED MEDIUM DUTY',
                        'value' => 2430,
                      ),
                      786 => 
                      array (
                        'key' => '-SPIRAFLEX® ROCK DUST',
                        'value' => 2431,
                      ),
                      787 => 
                      array (
                        'key' => '-SPIRAFLEX® VACUUM',
                        'value' => 2432,
                      ),
                      788 => 
                      array (
                        'key' => '-SPIRAFLEX® VAPOR RECOVERY',
                        'value' => 2433,
                      ),
                      789 => 
                      array (
                        'key' => '-SPIRAFLEX® YELLOW HEAVY DUTY',
                        'value' => 2434,
                      ),
                      790 => 
                      array (
                        'key' => '-SPIRAFLOW',
                        'value' => 2435,
                      ),
                      791 => 
                      array (
                        'key' => '-SPIRATHANE HD',
                        'value' => 2436,
                      ),
                      792 => 
                      array (
                        'key' => '-SPIRATHANE LD',
                        'value' => 2437,
                      ),
                      793 => 
                      array (
                        'key' => '-SPIRATHANE PT',
                        'value' => 2438,
                      ),
                      794 => 
                      array (
                        'key' => '-SR12',
                        'value' => 2439,
                      ),
                      795 => 
                      array (
                        'key' => '-SR13',
                        'value' => 2440,
                      ),
                      796 => 
                      array (
                        'key' => '-SR14',
                        'value' => 2441,
                      ),
                      797 => 
                      array (
                        'key' => '-SR14A',
                        'value' => 2442,
                      ),
                      798 => 
                      array (
                        'key' => '-SR14B',
                        'value' => 2443,
                      ),
                      799 => 
                      array (
                        'key' => '-SR15',
                        'value' => 2444,
                      ),
                      800 => 
                      array (
                        'key' => '-SR16SC',
                        'value' => 2445,
                      ),
                      801 => 
                      array (
                        'key' => '-SR18',
                        'value' => 2446,
                      ),
                      802 => 
                      array (
                        'key' => '-SR1SN',
                        'value' => 2447,
                      ),
                      803 => 
                      array (
                        'key' => '-SR2SN',
                        'value' => 2448,
                      ),
                      804 => 
                      array (
                        'key' => '-SR3',
                        'value' => 2449,
                      ),
                      805 => 
                      array (
                        'key' => '-SR5',
                        'value' => 2450,
                      ),
                      806 => 
                      array (
                        'key' => '-SR6',
                        'value' => 2451,
                      ),
                      807 => 
                      array (
                        'key' => '-SR7',
                        'value' => 2452,
                      ),
                      808 => 
                      array (
                        'key' => '-SR8',
                        'value' => 2453,
                      ),
                      809 => 
                      array (
                        'key' => '-SRS',
                        'value' => 2454,
                      ),
                      810 => 
                      array (
                        'key' => '-STANDARD STRAIGHT RAD',
                        'value' => 2455,
                      ),
                      811 => 
                      array (
                        'key' => '-STEAM 250',
                        'value' => 2456,
                      ),
                      812 => 
                      array (
                        'key' => '-STEEL AIR',
                        'value' => 2457,
                      ),
                      813 => 
                      array (
                        'key' => '-STEEL AIR BOOTSTRAP',
                        'value' => 2458,
                      ),
                      814 => 
                      array (
                        'key' => '-SUBSEA CABLE',
                        'value' => 2459,
                      ),
                      815 => 
                      array (
                        'key' => '-SULBANA GAUNTLET',
                        'value' => 2460,
                      ),
                      816 => 
                      array (
                        'key' => '-SUNSDEA MUD',
                        'value' => 2461,
                      ),
                      817 => 
                      array (
                        'key' => '-SUNSET WATER S&D FIRE SERVICE',
                        'value' => 2462,
                      ),
                      818 => 
                      array (
                        'key' => '-SUPER AIR 400',
                        'value' => 2463,
                      ),
                      819 => 
                      array (
                        'key' => '-SUPER BLACK FLEXWING®',
                        'value' => 2464,
                      ),
                      820 => 
                      array (
                        'key' => '-SUPER ORTAC®',
                        'value' => 2465,
                      ),
                      821 => 
                      array (
                        'key' => '-SUPER ROCK DRILL',
                        'value' => 2466,
                      ),
                      822 => 
                      array (
                        'key' => '-SUPER ROCK DRILL HT',
                        'value' => 2467,
                      ),
                      823 => 
                      array (
                        'key' => '-SUPER SANI-WASH™',
                        'value' => 2468,
                      ),
                      824 => 
                      array (
                        'key' => '-SUPERIOR',
                        'value' => 2469,
                      ),
                      825 => 
                      array (
                        'key' => '-SUPFLOW',
                        'value' => 2470,
                      ),
                      826 => 
                      array (
                        'key' => '-SUPVAC',
                        'value' => 2471,
                      ),
                      827 => 
                      array (
                        'key' => '-SURELINE',
                        'value' => 2472,
                      ),
                      828 => 
                      array (
                        'key' => '-SW DRY CEMENT & BARYTES',
                        'value' => 2473,
                      ),
                      829 => 
                      array (
                        'key' => '-SWAGELOK',
                        'value' => 2474,
                      ),
                      830 => 
                      array (
                        'key' => '-TAN FLEXTRA',
                        'value' => 2475,
                      ),
                      831 => 
                      array (
                        'key' => '-TAN FLEXTRA FDA',
                        'value' => 2476,
                      ),
                      832 => 
                      array (
                        'key' => '-TAN FLEXWING®',
                        'value' => 2477,
                      ),
                      833 => 
                      array (
                        'key' => '-TAN FLEXWING® FDA',
                        'value' => 2478,
                      ),
                      834 => 
                      array (
                        'key' => '-TANK CLEANING',
                        'value' => 2479,
                      ),
                      835 => 
                      array (
                        'key' => '-TANKER BARGE DISCHARGE',
                        'value' => 2480,
                      ),
                      836 => 
                      array (
                        'key' => '-TEFLON',
                        'value' => 2481,
                      ),
                      837 => 
                      array (
                        'key' => '-TETRA',
                        'value' => 2482,
                      ),
                      838 => 
                      array (
                        'key' => '-THERMIDOR',
                        'value' => 2483,
                      ),
                      839 => 
                      array (
                        'key' => '-THOMPSON FLEX XLPE',
                        'value' => 2484,
                      ),
                      840 => 
                      array (
                        'key' => '-THUNDER INSTA-GRIP',
                        'value' => 2485,
                      ),
                      841 => 
                      array (
                        'key' => '-TIG WELDING',
                        'value' => 2486,
                      ),
                      842 => 
                      array (
                        'key' => '-TIMCO',
                        'value' => 2487,
                      ),
                      843 => 
                      array (
                        'key' => '-TIPCO PREMIUM GARDEN',
                        'value' => 2488,
                      ),
                      844 => 
                      array (
                        'key' => '-TORRIDAIR',
                        'value' => 2489,
                      ),
                      845 => 
                      array (
                        'key' => '-TOW CABLE',
                        'value' => 2490,
                      ),
                      846 => 
                      array (
                        'key' => '-TR7',
                        'value' => 2491,
                      ),
                      847 => 
                      array (
                        'key' => '-TR8',
                        'value' => 2492,
                      ),
                      848 => 
                      array (
                        'key' => '-TRANSPLY',
                        'value' => 2493,
                      ),
                      849 => 
                      array (
                        'key' => '-TRIDENT',
                        'value' => 2494,
                      ),
                      850 => 
                      array (
                        'key' => '-TRIDENT SER',
                        'value' => 2495,
                      ),
                      851 => 
                      array (
                        'key' => '-TRINCO BLAST',
                        'value' => 2496,
                      ),
                      852 => 
                      array (
                        'key' => '-TRIPLX',
                        'value' => 2497,
                      ),
                      853 => 
                      array (
                        'key' => '-TRIX ACETYLENE',
                        'value' => 2498,
                      ),
                      854 => 
                      array (
                        'key' => '-TRIX BLAUSTRAHL',
                        'value' => 2499,
                      ),
                      855 => 
                      array (
                        'key' => '-TRIX BRAKE',
                        'value' => 2500,
                      ),
                      856 => 
                      array (
                        'key' => '-TRIX FUEL',
                        'value' => 2501,
                      ),
                      857 => 
                      array (
                        'key' => '-TRIX MULTIFOOD',
                        'value' => 2502,
                      ),
                      858 => 
                      array (
                        'key' => '-TRIX NITRO',
                        'value' => 2503,
                      ),
                      859 => 
                      array (
                        'key' => '-TRIX OXYGEN',
                        'value' => 2504,
                      ),
                      860 => 
                      array (
                        'key' => '-TRIX PAINT SPRAY',
                        'value' => 2505,
                      ),
                      861 => 
                      array (
                        'key' => '-TRIX RESPIRATION',
                        'value' => 2506,
                      ),
                      862 => 
                      array (
                        'key' => '-TRIX ROSTRAHL',
                        'value' => 2507,
                      ),
                      863 => 
                      array (
                        'key' => '-TRIX SUPER',
                        'value' => 2508,
                      ),
                      864 => 
                      array (
                        'key' => '-TUNNELCOTE ROCK DUST FLEXTRA',
                        'value' => 2509,
                      ),
                      865 => 
                      array (
                        'key' => '-TUNNELCOTE ROCK DUST FLEXWING®',
                        'value' => 2510,
                      ),
                      866 => 
                      array (
                        'key' => '-TWIN-LINE (GRADE R)',
                        'value' => 2511,
                      ),
                      867 => 
                      array (
                        'key' => '-TWIN-LINE (GRADE RM)',
                        'value' => 2512,
                      ),
                      868 => 
                      array (
                        'key' => '-TWIN-LINE (GRADE T)',
                        'value' => 2513,
                      ),
                      869 => 
                      array (
                        'key' => '-TWIN-LINE ISO 3821',
                        'value' => 2514,
                      ),
                      870 => 
                      array (
                        'key' => '-UL 92 FIRE EXTINGUISHER',
                        'value' => 2515,
                      ),
                      871 => 
                      array (
                        'key' => '-ULTRABRAID BULL',
                        'value' => 2516,
                      ),
                      872 => 
                      array (
                        'key' => '-ULTRAFLEX',
                        'value' => 2517,
                      ),
                      873 => 
                      array (
                        'key' => '-ULTRAMAR',
                        'value' => 2518,
                      ),
                      874 => 
                      array (
                        'key' => '-UNDERHILL',
                        'value' => 2519,
                      ),
                      875 => 
                      array (
                        'key' => '-UNISOURCE',
                        'value' => 2520,
                      ),
                      876 => 
                      array (
                        'key' => '-UNITRIX 60',
                        'value' => 2521,
                      ),
                      877 => 
                      array (
                        'key' => '-UNITRIX 80',
                        'value' => 2522,
                      ),
                      878 => 
                      array (
                        'key' => '-UNPRINTED SPRAY SALVAGE',
                        'value' => 2523,
                      ),
                      879 => 
                      array (
                        'key' => '-V-50 S&D',
                        'value' => 2524,
                      ),
                      880 => 
                      array (
                        'key' => '-VACUUM',
                        'value' => 2525,
                      ),
                      881 => 
                      array (
                        'key' => '-VAPOR RECOVERY',
                        'value' => 2526,
                      ),
                      882 => 
                      array (
                        'key' => '-VAPOR RECOVERY DOCK',
                        'value' => 2527,
                      ),
                      883 => 
                      array (
                        'key' => '-VARIFLEX™',
                        'value' => 2528,
                      ),
                      884 => 
                      array (
                        'key' => '-VELOCITY BANDING COIL',
                        'value' => 2529,
                      ),
                      885 => 
                      array (
                        'key' => '-VELOCITY BEVERAGE TRANSFER',
                        'value' => 2530,
                      ),
                      886 => 
                      array (
                        'key' => '-VELOCITY PETROLEUM TRANSFER',
                        'value' => 2531,
                      ),
                      887 => 
                      array (
                        'key' => '-VELOCITY WATER TRANSFER',
                        'value' => 2532,
                      ),
                      888 => 
                      array (
                        'key' => '-VERSACHEM™',
                        'value' => 2533,
                      ),
                      889 => 
                      array (
                        'key' => '-VERSACRETE',
                        'value' => 2534,
                      ),
                      890 => 
                      array (
                        'key' => '-VERSAFUEL EN1765:2016 S15',
                        'value' => 2535,
                      ),
                      891 => 
                      array (
                        'key' => '-VERSAFUEL FLEX',
                        'value' => 2536,
                      ),
                      892 => 
                      array (
                        'key' => '-VERSIFLO DISCHARGE',
                        'value' => 2537,
                      ),
                      893 => 
                      array (
                        'key' => '-VERSIFLO S&D',
                        'value' => 2538,
                      ),
                      894 => 
                      array (
                        'key' => '-VICTOR',
                        'value' => 2539,
                      ),
                      895 => 
                      array (
                        'key' => '-VINTNER',
                        'value' => 2540,
                      ),
                      896 => 
                      array (
                        'key' => '-VINTNER MICROBAN',
                        'value' => 2541,
                      ),
                      897 => 
                      array (
                        'key' => '-VINTNER RESERVE',
                        'value' => 2542,
                      ),
                      898 => 
                      array (
                        'key' => '-VIPER®',
                        'value' => 2543,
                      ),
                      899 => 
                      array (
                        'key' => '-WAB SLURRY',
                        'value' => 2544,
                      ),
                      900 => 
                      array (
                        'key' => '-WASHDOWN',
                        'value' => 2545,
                      ),
                      901 => 
                      array (
                        'key' => '-WASTE MATE',
                        'value' => 2546,
                      ),
                      902 => 
                      array (
                        'key' => '-WATER & AIR HD',
                        'value' => 2547,
                      ),
                      903 => 
                      array (
                        'key' => '-WATER DISCHARGE',
                        'value' => 2548,
                      ),
                      904 => 
                      array (
                        'key' => '-WATER DISCHARGE HD',
                        'value' => 2549,
                      ),
                      905 => 
                      array (
                        'key' => '-WATER HD',
                        'value' => 2550,
                      ),
                      906 => 
                      array (
                        'key' => '-WATER JETTING 1000',
                        'value' => 2551,
                      ),
                      907 => 
                      array (
                        'key' => '-WATER JETTING 500',
                        'value' => 2552,
                      ),
                      908 => 
                      array (
                        'key' => '-WATER REHAB',
                        'value' => 2553,
                      ),
                      909 => 
                      array (
                        'key' => '-WATER S&D',
                        'value' => 2554,
                      ),
                      910 => 
                      array (
                        'key' => '-WESTERN',
                        'value' => 2555,
                      ),
                      911 => 
                      array (
                        'key' => '-WHALE OIL',
                        'value' => 2556,
                      ),
                      912 => 
                      array (
                        'key' => '-WHALE WATER',
                        'value' => 2557,
                      ),
                      913 => 
                      array (
                        'key' => '-WHIPEND BLAST',
                        'value' => 2558,
                      ),
                      914 => 
                      array (
                        'key' => '-WHITE FLEXTRA',
                        'value' => 2559,
                      ),
                      915 => 
                      array (
                        'key' => '-WHITE FLEXWING®',
                        'value' => 2560,
                      ),
                      916 => 
                      array (
                        'key' => '-WHITEWATER',
                        'value' => 2561,
                      ),
                      917 => 
                      array (
                        'key' => '-WINGCRAFT™',
                        'value' => 2562,
                      ),
                      918 => 
                      array (
                        'key' => '-WIRE INSERTED RADIATOR HOSE',
                        'value' => 2563,
                      ),
                      919 => 
                      array (
                        'key' => '-WOODMI SAWDUST',
                        'value' => 2564,
                      ),
                      920 => 
                      array (
                        'key' => '-XF BLAST',
                        'value' => 2565,
                      ),
                      921 => 
                      array (
                        'key' => '-X-LIFE™ XCP3',
                        'value' => 2566,
                      ),
                      922 => 
                      array (
                        'key' => '-X-LIFE™ XCP3S',
                        'value' => 2567,
                      ),
                      923 => 
                      array (
                        'key' => '-X-LIFE™ XCP4',
                        'value' => 2568,
                      ),
                      924 => 
                      array (
                        'key' => '-X-LIFE™ XCP4S',
                        'value' => 2569,
                      ),
                      925 => 
                      array (
                        'key' => '-X-LIFE™ XCP5S',
                        'value' => 2570,
                      ),
                      926 => 
                      array (
                        'key' => '-X-LIFE™ XCP6S',
                        'value' => 2571,
                      ),
                      927 => 
                      array (
                        'key' => '-X-LIFE™ XR16SC',
                        'value' => 2572,
                      ),
                      928 => 
                      array (
                        'key' => '-XLPE CHEMICAL TRANSFER',
                        'value' => 2573,
                      ),
                      929 => 
                      array (
                        'key' => '-XPOWER',
                        'value' => 2574,
                      ),
                      930 => 
                      array (
                        'key' => '-YARDMASTER GARDEN HOSE',
                        'value' => 2575,
                      ),
                      931 => 
                      array (
                        'key' => '-YELLOW FLEXWING®',
                        'value' => 2576,
                      ),
                      932 => 
                      array (
                        'key' => '-YUKON',
                        'value' => 2577,
                      ),
                      933 => 
                      array (
                        'key' => '-YUKON SPIRAFLEX',
                        'value' => 2578,
                      ),
                      934 => 
                      array (
                        'key' => '-ZZH561K-AA2',
                        'value' => 2579,
                      ),
                      935 => 
                      array (
                        'key' => '-ZZH561K-BA2',
                        'value' => 2580,
                      ),
                      936 => 
                      array (
                        'key' => '-ZZH601 3-2',
                        'value' => 2581,
                      ),
                      937 => 
                      array (
                        'key' => '-MPI 350-0580',
                        'value' => 1829093,
                      ),
                      938 => 
                      array (
                        'key' => '-FLEXON',
                        'value' => 1829094,
                      ),
                      939 => 
                      array (
                        'key' => '-HOSE ASSEMBLY COLD',
                        'value' => 1829095,
                      ),
                      940 => 
                      array (
                        'key' => '-AMEREX 07648 FIREXB',
                        'value' => 1829096,
                      ),
                      941 => 
                      array (
                        'key' => '-HOSE ASSEMBLY HOT',
                        'value' => 1829097,
                      ),
                      942 => 
                      array (
                        'key' => '-RITCHIE CT5',
                        'value' => 1829098,
                      ),
                      943 => 
                      array (
                        'key' => '-FLEXILLA',
                        'value' => 1829099,
                      ),
                      944 => 
                      array (
                        'key' => '-SCOTT',
                        'value' => 1829100,
                      ),
                      945 => 
                      array (
                        'key' => '-HEALY LOW PERM',
                        'value' => 1829101,
                      ),
                      946 => 
                      array (
                        'key' => '-556-50A',
                        'value' => 1829102,
                      ),
                      947 => 
                      array (
                        'key' => '-ANSUL 426809',
                        'value' => 1829103,
                      ),
                      948 => 
                      array (
                        'key' => '-ROCK DUST',
                        'value' => 1829104,
                      ),
                      949 => 
                      array (
                        'key' => '-XPOWER OILFIELD FRAC HW',
                        'value' => 1829105,
                      ),
                      950 => 
                      array (
                        'key' => '-TEKNOR',
                        'value' => 1829106,
                      ),
                      951 => 
                      array (
                        'key' => '-GATES STEAMKING',
                        'value' => 1829107,
                      ),
                      952 => 
                      array (
                        'key' => '-SOURCE DISPENSING',
                        'value' => 1829108,
                      ),
                      953 => 
                      array (
                        'key' => '-INSTA-GRIP™',
                        'value' => 1829109,
                      ),
                      954 => 
                      array (
                        'key' => '-ECOLAB BLUE',
                        'value' => 1829110,
                      ),
                      955 => 
                      array (
                        'key' => '-WEST MICH',
                        'value' => 1829111,
                      ),
                      956 => 
                      array (
                        'key' => '-ANSUL 431352',
                        'value' => 1829112,
                      ),
                      957 => 
                      array (
                        'key' => '-IBRS FISH HOSE',
                        'value' => 1829113,
                      ),
                      958 => 
                      array (
                        'key' => '-VICTOR GRADE T',
                        'value' => 1829114,
                      ),
                      959 => 
                      array (
                        'key' => '-INSTA-LOCK TYPE D',
                        'value' => 1829115,
                      ),
                      960 => 
                      array (
                        'key' => '-3-M 78-8007-5633-6 BLUE',
                        'value' => 1829116,
                      ),
                      961 => 
                      array (
                        'key' => '-MSA AIR BREATHING',
                        'value' => 1829117,
                      ),
                      962 => 
                      array (
                        'key' => '-EXTREME CRIMP CB STEAM',
                        'value' => 1829118,
                      ),
                      963 => 
                      array (
                        'key' => '-INSTA-LOCK TYPE C',
                        'value' => 1829119,
                      ),
                      964 => 
                      array (
                        'key' => '-NRP JONES NON-UL CT5',
                        'value' => 1829120,
                      ),
                      965 => 
                      array (
                        'key' => '-L&G ROCK DUST SW HD',
                        'value' => 1829121,
                      ),
                      966 => 
                      array (
                        'key' => '-ANSUL 71976',
                        'value' => 1829122,
                      ),
                      967 => 
                      array (
                        'key' => '-GHX PETRO XPOWER',
                        'value' => 1829123,
                      ),
                      968 => 
                      array (
                        'key' => '-FLEXING FLEX-ON',
                        'value' => 1829124,
                      ),
                      969 => 
                      array (
                        'key' => '-DYNO NOBEL',
                        'value' => 1829125,
                      ),
                      970 => 
                      array (
                        'key' => '-GATES 32041346',
                        'value' => 1829126,
                      ),
                      971 => 
                      array (
                        'key' => '-DYNACRAFT D1045-2000',
                        'value' => 1829127,
                      ),
                      972 => 
                      array (
                        'key' => '-APPION MEGAFLOW CT5',
                        'value' => 1829128,
                      ),
                      973 => 
                      array (
                        'key' => '-PYROFLEX HOT TAR & ASPHALT II',
                        'value' => 1829129,
                      ),
                      974 => 
                      array (
                        'key' => '-SUPER ORTAC',
                        'value' => 1829130,
                      ),
                      975 => 
                      array (
                        'key' => '-ANSUL 79007',
                        'value' => 1829131,
                      ),
                      976 => 
                      array (
                        'key' => '-PYROFLEX HOT AIR II',
                        'value' => 1829132,
                      ),
                      977 => 
                      array (
                        'key' => '-M13531J-B3A',
                        'value' => 1829133,
                      ),
                      978 => 
                      array (
                        'key' => '-GRACO 079055',
                        'value' => 1829134,
                      ),
                      979 => 
                      array (
                        'key' => '-GATES',
                        'value' => 1829135,
                      ),
                      980 => 
                      array (
                        'key' => '-GATES 32041355',
                        'value' => 1829136,
                      ),
                      981 => 
                      array (
                        'key' => '-MPI HW FUEL FILL',
                        'value' => 1829137,
                      ),
                      982 => 
                      array (
                        'key' => '-ROBIN NEW',
                        'value' => 1829138,
                      ),
                      983 => 
                      array (
                        'key' => '-L&G GE SANDER HOSE',
                        'value' => 1829139,
                      ),
                      984 => 
                      array (
                        'key' => '-BULLARD',
                        'value' => 1829140,
                      ),
                      985 => 
                      array (
                        'key' => '-ANSUL 518518',
                        'value' => 1829141,
                      ),
                      986 => 
                      array (
                        'key' => '-MIT TEKTON',
                        'value' => 1829142,
                      ),
                      987 => 
                      array (
                        'key' => '-TAMARACK',
                        'value' => 1829143,
                      ),
                      988 => 
                      array (
                        'key' => '-3-M 78-8008-5757-1',
                        'value' => 1829144,
                      ),
                      989 => 
                      array (
                        'key' => '-ABBOTT INLET HOSE',
                        'value' => 1829145,
                      ),
                      990 => 
                      array (
                        'key' => '-GATES 32050046',
                        'value' => 1829146,
                      ),
                      991 => 
                      array (
                        'key' => '-SBQ FLOATER',
                        'value' => 1829147,
                      ),
                      992 => 
                      array (
                        'key' => '-GATES 32041364',
                        'value' => 1829148,
                      ),
                      993 => 
                      array (
                        'key' => '-ABBOTT GOODYEAR GRIP',
                        'value' => 1829149,
                      ),
                      994 => 
                      array (
                        'key' => '-3-M 78-8007-5637-7',
                        'value' => 1829150,
                      ),
                      995 => 
                      array (
                        'key' => '-GATES 32041328',
                        'value' => 1829151,
                      ),
                      996 => 
                      array (
                        'key' => '-SUPER SANI-WASH 300',
                        'value' => 1829152,
                      ),
                      997 => 
                      array (
                        'key' => '-MPI 350-0560',
                        'value' => 1829153,
                      ),
                      998 => 
                      array (
                        'key' => '-REINFLEX',
                        'value' => 1829154,
                      ),
                      999 => 
                      array (
                        'key' => '-IRPCO RED FUEL OIL',
                        'value' => 1829155,
                      ),
                      1000 => 
                      array (
                        'key' => '-Spartan Pressure Washer',
                        'value' => 1829156,
                      ),
                      1001 => 
                      array (
                        'key' => '-MINNICH WATER HD',
                        'value' => 1829157,
                      ),
                      1002 => 
                      array (
                        'key' => '-ANSUL 429196',
                        'value' => 1829158,
                      ),
                      1003 => 
                      array (
                        'key' => '-MPI 132-0580',
                        'value' => 1829159,
                      ),
                      1004 => 
                      array (
                        'key' => '-EAGLE FLUID POWER',
                        'value' => 1829160,
                      ),
                      1005 => 
                      array (
                        'key' => '-DWE',
                        'value' => 1829161,
                      ),
                      1006 => 
                      array (
                        'key' => '-TEFPASS',
                        'value' => 1829162,
                      ),
                      1007 => 
                      array (
                        'key' => '-ESTABROOK',
                        'value' => 1829163,
                      ),
                      1008 => 
                      array (
                        'key' => '-PALADIN DROP',
                        'value' => 1829164,
                      ),
                      1009 => 
                      array (
                        'key' => '-STEAM HOSE',
                        'value' => 1829165,
                      ),
                      1010 => 
                      array (
                        'key' => '-ANSUL 7091',
                        'value' => 1829166,
                      ),
                      1011 => 
                      array (
                        'key' => '-INSTA-LOCK DUST CAP',
                        'value' => 1829167,
                      ),
                      1012 => 
                      array (
                        'key' => '-A&M',
                        'value' => 1829168,
                      ),
                      1013 => 
                      array (
                        'key' => '-PROSPECTOR™ WATER DISCHARGE 150',
                        'value' => 1829169,
                      ),
                      1014 => 
                      array (
                        'key' => '-SEMLER FDA',
                        'value' => 1829170,
                      ),
                      1015 => 
                      array (
                        'key' => '-FINN',
                        'value' => 1829171,
                      ),
                      1016 => 
                      array (
                        'key' => '-ARCAIR 5077MP',
                        'value' => 1829172,
                      ),
                      1017 => 
                      array (
                        'key' => '-ANSUL 7083',
                        'value' => 1829173,
                      ),
                      1018 => 
                      array (
                        'key' => '-PRAIRIE GOLDFLEX PETRO',
                        'value' => 1829174,
                      ),
                      1019 => 
                      array (
                        'key' => '-KCRUBBER AUGER ARC PILING',
                        'value' => 1829175,
                      ),
                      1020 => 
                      array (
                        'key' => '-GOODAL',
                        'value' => 1829176,
                      ),
                      1021 => 
                      array (
                        'key' => '-GATES 32050041',
                        'value' => 1829177,
                      ),
                      1022 => 
                      array (
                        'key' => '-DEVILBISS',
                        'value' => 1829178,
                      ),
                      1023 => 
                      array (
                        'key' => '-FLEXTRAL GRIP-LOC',
                        'value' => 1829179,
                      ),
                      1024 => 
                      array (
                        'key' => '-A&H',
                        'value' => 1829180,
                      ),
                      1025 => 
                      array (
                        'key' => '-GATES 32050055',
                        'value' => 1829181,
                      ),
                      1026 => 
                      array (
                        'key' => '-SPIRAFLEX® MEDIUM DUTY',
                        'value' => 1829182,
                      ),
                      1027 => 
                      array (
                        'key' => '-NELSON DUNN CABLE COVER',
                        'value' => 1829183,
                      ),
                      1028 => 
                      array (
                        'key' => '-UNIWELD',
                        'value' => 1829184,
                      ),
                      1029 => 
                      array (
                        'key' => '-GATES 32020011',
                        'value' => 1829185,
                      ),
                      1030 => 
                      array (
                        'key' => '-GHX XPOWER OILFIELD FRAC TANK',
                        'value' => 1829186,
                      ),
                      1031 => 
                      array (
                        'key' => '-ANSUL 535688',
                        'value' => 1829187,
                      ),
                      1032 => 
                      array (
                        'key' => '-SPIRAFLEX® EXTRA LIGHT DUTY',
                        'value' => 1829188,
                      ),
                      1033 => 
                      array (
                        'key' => '-SAFLEX NSFX',
                        'value' => 1829189,
                      ),
                      1034 => 
                      array (
                        'key' => '-SPIRAFLEX® LIGHT DUTY',
                        'value' => 1829190,
                      ),
                      1035 => 
                      array (
                        'key' => '-COUPLING MALE SWIVEL',
                        'value' => 1829191,
                      ),
                      1036 => 
                      array (
                        'key' => '-STANLEY',
                        'value' => 1829192,
                      ),
                      1037 => 
                      array (
                        'key' => '-ECOLAB WASHDOWN',
                        'value' => 1829193,
                      ),
                      1038 => 
                      array (
                        'key' => '-GATES 32041349',
                        'value' => 1829194,
                      ),
                      1039 => 
                      array (
                        'key' => '-IBRS FISH S&D',
                        'value' => 1829195,
                      ),
                      1040 => 
                      array (
                        'key' => '-NRP JONES CT5',
                        'value' => 1829196,
                      ),
                      1041 => 
                      array (
                        'key' => '-STANLEY N298402',
                        'value' => 1829197,
                      ),
                      1042 => 
                      array (
                        'key' => '-SOUTH PNEUMATICS SW',
                        'value' => 1829198,
                      ),
                      1043 => 
                      array (
                        'key' => '-SPIRAFLEX® HEAVY DUTY',
                        'value' => 1829199,
                      ),
                      1044 => 
                      array (
                        'key' => '-C&T MIL-DTL-13444H-1-6',
                        'value' => 1829200,
                      ),
                      1045 => 
                      array (
                        'key' => '-TEKNOR 8650GT',
                        'value' => 1829201,
                      ),
                      1046 => 
                      array (
                        'key' => '-CITGO HYDROCARBON DRAIN',
                        'value' => 1829202,
                      ),
                      1047 => 
                      array (
                        'key' => '-LUMPKIN',
                        'value' => 1829203,
                      ),
                      1048 => 
                      array (
                        'key' => '-GLOBAL M24565-70-H',
                        'value' => 1829204,
                      ),
                      1049 => 
                      array (
                        'key' => '-REDWING BLUE LOW TEMP FUEL OIL',
                        'value' => 1829205,
                      ),
                      1050 => 
                      array (
                        'key' => '-AIR & MULTIPURPOSE',
                        'value' => 1829206,
                      ),
                      1051 => 
                      array (
                        'key' => '-NOTRAX T43S5050RD',
                        'value' => 1829207,
                      ),
                      1052 => 
                      array (
                        'key' => '-GATES 32050040',
                        'value' => 1829208,
                      ),
                      1053 => 
                      array (
                        'key' => '-GATES 32000009',
                        'value' => 1829209,
                      ),
                      1054 => 
                      array (
                        'key' => '-RED-L PLANT STEAM',
                        'value' => 1829210,
                      ),
                      1055 => 
                      array (
                        'key' => '-PUMPTEC PULSE',
                        'value' => 1829211,
                      ),
                      1056 => 
                      array (
                        'key' => '-FLEXSTEEL® HW',
                        'value' => 1829212,
                      ),
                      1057 => 
                      array (
                        'key' => '-GATES 32000014',
                        'value' => 1829213,
                      ),
                      1058 => 
                      array (
                        'key' => '-ROYAL BRASS VERSIFLO S&D',
                        'value' => 1829214,
                      ),
                      1059 => 
                      array (
                        'key' => '-ANSUL 423581',
                        'value' => 1829215,
                      ),
                      1060 => 
                      array (
                        'key' => '-IMPERL POLARSHIELD',
                        'value' => 1829216,
                      ),
                      1061 => 
                      array (
                        'key' => '-TEKNOR 8696-27',
                        'value' => 1829217,
                      ),
                      1062 => 
                      array (
                        'key' => '-PHILLIPS 66 HYDROCARBON DRAIN',
                        'value' => 1829218,
                      ),
                      1063 => 
                      array (
                        'key' => '-KIDDE 20079 FIRE EX UL92',
                        'value' => 1829219,
                      ),
                      1064 => 
                      array (
                        'key' => '-PIONEER HOT AIR II SP',
                        'value' => 1829220,
                      ),
                      1065 => 
                      array (
                        'key' => '-ROUGH BORE DOCK 300',
                        'value' => 1829221,
                      ),
                      1066 => 
                      array (
                        'key' => '-MIL 3992F',
                        'value' => 1829222,
                      ),
                      1067 => 
                      array (
                        'key' => '-INSTA-LOCK TYPE E',
                        'value' => 1829223,
                      ),
                      1068 => 
                      array (
                        'key' => '-GNSPEC 100R17',
                        'value' => 1829224,
                      ),
                      1069 => 
                      array (
                        'key' => '-WILD HOG',
                        'value' => 1829225,
                      ),
                      1070 => 
                      array (
                        'key' => '-TEKNOR 969RR',
                        'value' => 1829226,
                      ),
                      1071 => 
                      array (
                        'key' => '-EXIMCO FLOATER',
                        'value' => 1829227,
                      ),
                      1072 => 
                      array (
                        'key' => '-CON-TECH',
                        'value' => 1829228,
                      ),
                      1073 => 
                      array (
                        'key' => '-ASTARAS INSULATER',
                        'value' => 1829229,
                      ),
                      1074 => 
                      array (
                        'key' => '-MPI 350-0380',
                        'value' => 1829230,
                      ),
                      1075 => 
                      array (
                        'key' => '-DYNO HOSEINHOSE',
                        'value' => 1829231,
                      ),
                      1076 => 
                      array (
                        'key' => '-PACIFIC RUBBER MULCHBLOWER',
                        'value' => 1829232,
                      ),
                      1077 => 
                      array (
                        'key' => '-WATER DISCHARGE 150',
                        'value' => 1829233,
                      ),
                      1078 => 
                      array (
                        'key' => '-ANSUL 71980',
                        'value' => 1829234,
                      ),
                      1079 => 
                      array (
                        'key' => '-GATES 32000016',
                        'value' => 1829235,
                      ),
                      1080 => 
                      array (
                        'key' => '-ANSUL 423267',
                        'value' => 1829236,
                      ),
                      1081 => 
                      array (
                        'key' => '-FUEL DISCHARGE 250',
                        'value' => 1829237,
                      ),
                      1082 => 
                      array (
                        'key' => '-FISH SUCTION',
                        'value' => 1829238,
                      ),
                      1083 => 
                      array (
                        'key' => '-SANDBLAST DEADMAN',
                        'value' => 1829239,
                      ),
                      1084 => 
                      array (
                        'key' => '-GATES 32050036',
                        'value' => 1829240,
                      ),
                      1085 => 
                      array (
                        'key' => '-PROSPECTOR™ OILFIELD S&D 300',
                        'value' => 1829241,
                      ),
                      1086 => 
                      array (
                        'key' => '-RAGCO FABCHEM',
                        'value' => 1829242,
                      ),
                      1087 => 
                      array (
                        'key' => '-INSTA-LOCK TYPE A',
                        'value' => 1829243,
                      ),
                      1088 => 
                      array (
                        'key' => '-GATES 32050049',
                        'value' => 1829244,
                      ),
                      1089 => 
                      array (
                        'key' => '-GATES 32000006',
                        'value' => 1829245,
                      ),
                      1090 => 
                      array (
                        'key' => '-SINGLE-LINE (GRADE R)',
                        'value' => 1829246,
                      ),
                      1091 => 
                      array (
                        'key' => '-GATES 32000008',
                        'value' => 1829247,
                      ),
                      1092 => 
                      array (
                        'key' => '-INSTA-LOCK TYPE B',
                        'value' => 1829248,
                      ),
                      1093 => 
                      array (
                        'key' => '-STEEL AIR MSHA',
                        'value' => 1829249,
                      ),
                      1094 => 
                      array (
                        'key' => '-GATES 32050026',
                        'value' => 1829250,
                      ),
                      1095 => 
                      array (
                        'key' => '-INSTA-LOCK JUMP SIZE',
                        'value' => 1829251,
                      ),
                      1096 => 
                      array (
                        'key' => '-WATER S&D',
                        'value' => 1829252,
                      ),
                      1097 => 
                      array (
                        'key' => '-GENERIC PETRO TANK TRUCK',
                        'value' => 1829253,
                      ),
                      1098 => 
                      array (
                        'key' => '-GATES 32000013',
                        'value' => 1829254,
                      ),
                      1099 => 
                      array (
                        'key' => '-NEWLINE VINTNER RESERVE',
                        'value' => 1829255,
                      ),
                      1100 => 
                      array (
                        'key' => '-MISC',
                        'value' => 1829256,
                      ),
                      1101 => 
                      array (
                        'key' => '-THESE ARE TIED TO NORFOLK SPECS...',
                        'value' => 1829257,
                      ),
                      1102 => 
                      array (
                        'key' => '-MASTHEAD',
                        'value' => 1829258,
                      ),
                      1103 => 
                      array (
                        'key' => '-GATES 32050031',
                        'value' => 1829259,
                      ),
                      1104 => 
                      array (
                        'key' => '-BREATHING AIR HOSE',
                        'value' => 1829260,
                      ),
                      1105 => 
                      array (
                        'key' => '-GATES 3624-0145',
                        'value' => 1829261,
                      ),
                      1106 => 
                      array (
                        'key' => '-HIGHLAND POTABLE WATER S&D',
                        'value' => 1829262,
                      ),
                      1107 => 
                      array (
                        'key' => '-EDPM DISCHARGE',
                        'value' => 1829263,
                      ),
                      1108 => 
                      array (
                        'key' => '-WATER DISCHARGE HD 600',
                        'value' => 1829264,
                      ),
                      1109 => 
                      array (
                        'key' => '-GATES 32000011',
                        'value' => 1829265,
                      ),
                      1110 => 
                      array (
                        'key' => '-PREMIER VINTNER',
                        'value' => 1829266,
                      ),
                      1111 => 
                      array (
                        'key' => '-GATES 32041425',
                        'value' => 1829267,
                      ),
                      1112 => 
                      array (
                        'key' => '-HIGHLAND RAW WATER S&D',
                        'value' => 1829268,
                      ),
                      1113 => 
                      array (
                        'key' => '-INSTA-LOCK COUPLER',
                        'value' => 1829269,
                      ),
                      1114 => 
                      array (
                        'key' => '-SINGLE-LINE (GRADE T)',
                        'value' => 1829270,
                      ),
                      1115 => 
                      array (
                        'key' => '-JOHN DEERE WATER S&D',
                        'value' => 1829271,
                      ),
                      1116 => 
                      array (
                        'key' => '-PROSPECTORFLEX BLUE UHMWPE',
                        'value' => 1829272,
                      ),
                      1117 => 
                      array (
                        'key' => '-MADE IN USA GARDEN',
                        'value' => 1829273,
                      ),
                      1118 => 
                      array (
                        'key' => '-PLIOVIC AG SPRAY',
                        'value' => 1829274,
                      ),
                      1119 => 
                      array (
                        'key' => '-OFFSHORE FUEL 500',
                        'value' => 1829275,
                      ),
                      1120 => 
                      array (
                        'key' => '-GATES 32000012',
                        'value' => 1829276,
                      ),
                      1121 => 
                      array (
                        'key' => '-INSTA-LOCK HOSE STEM',
                        'value' => 1829277,
                      ),
                      1122 => 
                      array (
                        'key' => '-INSTA-LOCK FERRULE',
                        'value' => 1829278,
                      ),
                      1123 => 
                      array (
                        'key' => '-WATER JETTING',
                        'value' => 1829279,
                      ),
                      1124 => 
                      array (
                        'key' => '-KINK GUARD',
                        'value' => 1829280,
                      ),
                      1125 => 
                      array (
                        'key' => '-INSTA-LOCK ADAPTER',
                        'value' => 1829281,
                      ),
                      1126 => 
                      array (
                        'key' => '-CONTINENTAL MATTE GREEN',
                        'value' => 1829282,
                      ),
                      1127 => 
                      array (
                        'key' => '-PATHFINDER GARDEN',
                        'value' => 1829283,
                      ),
                      1128 => 
                      array (
                        'key' => '-GATES 32050016',
                        'value' => 1829284,
                      ),
                      1129 => 
                      array (
                        'key' => '-INSTA-LOCK TYPE F',
                        'value' => 1829285,
                      ),
                      1130 => 
                      array (
                        'key' => '-GARDEN HOSE',
                        'value' => 1829286,
                      ),
                      1131 => 
                      array (
                        'key' => '-HIGHLAND BRINE WATER S&D',
                        'value' => 1829287,
                      ),
                      1132 => 
                      array (
                        'key' => '-INFINITY™ CHEM',
                        'value' => 1829288,
                      ),
                      1133 => 
                      array (
                        'key' => '-HD AIR 300',
                        'value' => 1829289,
                      ),
                      1134 => 
                      array (
                        'key' => '-INSTA-LOCK CRIMP SLEEVE',
                        'value' => 1829290,
                      ),
                      1135 => 
                      array (
                        'key' => '-UNITED RUBBER CONTRACTOR\'S WATER',
                        'value' => 1829291,
                      ),
                      1136 => 
                      array (
                        'key' => '-MIL AA-59567 3-1',
                        'value' => 1829292,
                      ),
                      1137 => 
                      array (
                        'key' => '-YUKON BLUE',
                        'value' => 1829293,
                      ),
                      1138 => 
                      array (
                        'key' => '-GATES 32000007',
                        'value' => 1829294,
                      ),
                      1139 => 
                      array (
                        'key' => '-INSTA-LOCK DUST PLUG',
                        'value' => 1829295,
                      ),
                      1140 => 
                      array (
                        'key' => '-MH 500',
                        'value' => 1829296,
                      ),
                      1141 => 
                      array (
                        'key' => '-BLASTHOSE SLURRY',
                        'value' => 1829297,
                      ),
                      1142 => 
                      array (
                        'key' => '-SIGNAL CALL',
                        'value' => 1829298,
                      ),
                      1143 => 
                      array (
                        'key' => '-GENERIC WATER 100D',
                        'value' => 1829299,
                      ),
                      1144 => 
                      array (
                        'key' => '-MPI HW EXHAUST',
                        'value' => 1829300,
                      ),
                      1145 => 
                      array (
                        'key' => '-HITECH WASHDOWN',
                        'value' => 1829301,
                      ),
                      1146 => 
                      array (
                        'key' => '-INSTA-LOCK GASKET',
                        'value' => 1829302,
                      ),
                      1147 => 
                      array (
                        'key' => '-GATES 32050241',
                        'value' => 1829303,
                      ),
                      1148 => 
                      array (
                        'key' => '-RED FLEXTRA 150',
                        'value' => 1829304,
                      ),
                      1149 => 
                      array (
                        'key' => '-GATES 32000003',
                        'value' => 1829305,
                      ),
                      1150 => 
                      array (
                        'key' => '-SURELINE BLACK',
                        'value' => 1829306,
                      ),
                      1151 => 
                      array (
                        'key' => '-SPIRAFLEX® 2500',
                        'value' => 1829307,
                      ),
                      1152 => 
                      array (
                        'key' => '-GATES 32050226',
                        'value' => 1829308,
                      ),
                      1153 => 
                      array (
                        'key' => '-SINGLE-LINE (GRADE T)',
                        'value' => 1829309,
                      ),
                      1154 => 
                      array (
                        'key' => '-GATES 32050231',
                        'value' => 1829310,
                      ),
                      1155 => 
                      array (
                        'key' => '-PREMIER',
                        'value' => 1829311,
                      ),
                      1156 => 
                      array (
                        'key' => '-GENERIC AIR 250',
                        'value' => 1829312,
                      ),
                      1157 => 
                      array (
                        'key' => '-SBQ PETRO',
                        'value' => 1829313,
                      ),
                      1158 => 
                      array (
                        'key' => '-INSTA-LOCK SPOOL ADAPTER',
                        'value' => 1829314,
                      ),
                      1159 => 
                      array (
                        'key' => '-HIGHLAND WASTE WATER S&D',
                        'value' => 1829315,
                      ),
                      1160 => 
                      array (
                        'key' => '-CHANGED TO FORTRESS WHITE',
                        'value' => 1829316,
                      ),
                      1161 => 
                      array (
                        'key' => '-SPIRAFLEX® RED MEDIUM DUTY',
                        'value' => 1829317,
                      ),
                      1162 => 
                      array (
                        'key' => '-DARCOR RED',
                        'value' => 1829318,
                      ),
                      1163 => 
                      array (
                        'key' => '-HOT AIR',
                        'value' => 1829319,
                      ),
                      1164 => 
                      array (
                        'key' => '-WATER DISCHARGE 100',
                        'value' => 1829320,
                      ),
                      1165 => 
                      array (
                        'key' => '-MH 75',
                        'value' => 1829321,
                      ),
                      1166 => 
                      array (
                        'key' => '-WATER 150 HD',
                        'value' => 1829322,
                      ),
                      1167 => 
                      array (
                        'key' => '-ROUGH BORE DOCK 200',
                        'value' => 1829323,
                      ),
                      1168 => 
                      array (
                        'key' => '-RED FLEXTRA 100',
                        'value' => 1829324,
                      ),
                      1169 => 
                      array (
                        'key' => '-GREEN XLPE 150',
                        'value' => 1829325,
                      ),
                      1170 => 
                      array (
                        'key' => '-RED ORTAC II',
                        'value' => 1829326,
                      ),
                      1171 => 
                      array (
                        'key' => '-FLEXSTEEL® 250 EPDM',
                        'value' => 1829327,
                      ),
                      1172 => 
                      array (
                        'key' => '-AIRSER',
                        'value' => 1829328,
                      ),
                      1173 => 
                      array (
                        'key' => '-OIL RIG SW',
                        'value' => 1829329,
                      ),
                      1174 => 
                      array (
                        'key' => '-TRI-STATE',
                        'value' => 1829330,
                      ),
                      1175 => 
                      array (
                        'key' => '-GATES GASFLEX',
                        'value' => 1829331,
                      ),
                      1176 => 
                      array (
                        'key' => '-GENERIC PL & GR',
                        'value' => 1829332,
                      ),
                      1177 => 
                      array (
                        'key' => '-BLACK FLEXTRA II 150',
                        'value' => 1829333,
                      ),
                      1178 => 
                      array (
                        'key' => '-MATERIAL HANDLING DISCHARGE 75',
                        'value' => 1829334,
                      ),
                      1179 => 
                      array (
                        'key' => '-SPIRAFLEX® GREEN',
                        'value' => 1829335,
                      ),
                      1180 => 
                      array (
                        'key' => '-MIDWEST BELTING',
                        'value' => 1829336,
                      ),
                      1181 => 
                      array (
                        'key' => '-FUEL DISCHARGE 150',
                        'value' => 1829337,
                      ),
                      1182 => 
                      array (
                        'key' => '-MRS',
                        'value' => 1829338,
                      ),
                      1183 => 
                      array (
                        'key' => '-JETTING UTILITY',
                        'value' => 1829339,
                      ),
                      1184 => 
                      array (
                        'key' => '-ROCK DRILL RED',
                        'value' => 1829340,
                      ),
                      1185 => 
                      array (
                        'key' => '-VICTOR GRADE RM',
                        'value' => 1829341,
                      ),
                      1186 => 
                      array (
                        'key' => '-REDWING HIGH DURO FUEL OIL',
                        'value' => 1829342,
                      ),
                      1187 => 
                      array (
                        'key' => '-BRANHAM AIR',
                        'value' => 1829343,
                      ),
                      1188 => 
                      array (
                        'key' => '-HOSE GUYS',
                        'value' => 1829344,
                      ),
                      1189 => 
                      array (
                        'key' => '-STEAM PILE DRIVER',
                        'value' => 1829345,
                      ),
                      1190 => 
                      array (
                        'key' => '-POTABLE WATER S&D',
                        'value' => 1829346,
                      ),
                      1191 => 
                      array (
                        'key' => '-RADIATOR HOSE',
                        'value' => 1829347,
                      ),
                      1192 => 
                      array (
                        'key' => '-CPLAIR AIRCRAFT',
                        'value' => 1829348,
                      ),
                      1193 => 
                      array (
                        'key' => '-20R3D2 HEATER HOSE',
                        'value' => 1829349,
                      ),
                      1194 => 
                      array (
                        'key' => '-HY-T HEATER HOSE',
                        'value' => 1829350,
                      ),
                      1195 => 
                      array (
                        'key' => '-MATERIAL HANDLING 150',
                        'value' => 1829351,
                      ),
                      1196 => 
                      array (
                        'key' => '-MASTHEAD CONTRACTOR\'S WATER',
                        'value' => 1829352,
                      ),
                      1197 => 
                      array (
                        'key' => '-GUNITE (TAN)',
                        'value' => 1829353,
                      ),
                      1198 => 
                      array (
                        'key' => '-FRAC ACID S&D 400',
                        'value' => 1829354,
                      ),
                      1199 => 
                      array (
                        'key' => '-PETROL 400 HARDWALL',
                        'value' => 1829355,
                      ),
                      1200 => 
                      array (
                        'key' => '-ICS GROUP AIR',
                        'value' => 1829356,
                      ),
                      1201 => 
                      array (
                        'key' => '-SPIRAFLEX® BLUE EXTRALIGHT DUTY',
                        'value' => 1829357,
                      ),
                      1202 => 
                      array (
                        'key' => '-RUB & GASK WATER DISCHARGE',
                        'value' => 1829358,
                      ),
                      1203 => 
                      array (
                        'key' => '-GENERIC AIR',
                        'value' => 1829359,
                      ),
                      1204 => 
                      array (
                        'key' => '-WATER',
                        'value' => 1829360,
                      ),
                      1205 => 
                      array (
                        'key' => '-PREMIER AIR 1000',
                        'value' => 1829361,
                      ),
                      1206 => 
                      array (
                        'key' => '-FLEXSHIELD SAE J1527 A1-15',
                        'value' => 1829362,
                      ),
                      1207 => 
                      array (
                        'key' => '-SPIRAFLEX® BLACK SUPER-DUTY',
                        'value' => 1829363,
                      ),
                      1208 => 
                      array (
                        'key' => '-OFFSHORE FUEL 750',
                        'value' => 1829364,
                      ),
                      1209 => 
                      array (
                        'key' => '-HAMILON BLAST',
                        'value' => 1829365,
                      ),
                      1210 => 
                      array (
                        'key' => '-SPIRAFLEX® AGGIE PVC',
                        'value' => 1829366,
                      ),
                      1211 => 
                      array (
                        'key' => '-FLEXTRA LT BLUE',
                        'value' => 1829367,
                      ),
                      1212 => 
                      array (
                        'key' => '-SUMMERS',
                        'value' => 1829368,
                      ),
                      1213 => 
                      array (
                        'key' => '-EXTREMEFLEX™ FOOD',
                        'value' => 1829369,
                      ),
                      1214 => 
                      array (
                        'key' => '-DIAMOND',
                        'value' => 1829370,
                      ),
                      1215 => 
                      array (
                        'key' => '-PEAK ENERGY FRONTIER',
                        'value' => 1829371,
                      ),
                      1216 => 
                      array (
                        'key' => '-KINKGUARD GARDEN HOSE',
                        'value' => 1829372,
                      ),
                      1217 => 
                      array (
                        'key' => '-FUEL DISCHARGE 300',
                        'value' => 1829373,
                      ),
                      1218 => 
                      array (
                        'key' => '-FRAC BLENDING 500SD',
                        'value' => 1829374,
                      ),
                      1219 => 
                      array (
                        'key' => '-PROSPECTOR™ OILFIELD S&D 150',
                        'value' => 1829375,
                      ),
                      1220 => 
                      array (
                        'key' => '-WATER DISCHARGE 250',
                        'value' => 1829376,
                      ),
                      1221 => 
                      array (
                        'key' => '-HAWAII MARINE',
                        'value' => 1829377,
                      ),
                      1222 => 
                      array (
                        'key' => '-20R3D1 HEATER HOSE',
                        'value' => 1829378,
                      ),
                      1223 => 
                      array (
                        'key' => '-PIONEER XF BLAST',
                        'value' => 1829379,
                      ),
                      1224 => 
                      array (
                        'key' => '-SUPERIOR PETRO TANK TRUCK',
                        'value' => 1829380,
                      ),
                      1225 => 
                      array (
                        'key' => '-SPIRAFLEX® YELLOW HEAVY DUTY',
                        'value' => 1829381,
                      ),
                      1226 => 
                      array (
                        'key' => '-EXTREMEFLEX™ FOOD RED',
                        'value' => 1829382,
                      ),
                      1227 => 
                      array (
                        'key' => '-SINGLE-LINE (GRADE R)',
                        'value' => 1829383,
                      ),
                      1228 => 
                      array (
                        'key' => '-AR THOMSON',
                        'value' => 1829384,
                      ),
                      1229 => 
                      array (
                        'key' => '-HSS WATER JETTING',
                        'value' => 1829385,
                      ),
                      1230 => 
                      array (
                        'key' => '-PIONEER PETRO TANK TRUCK',
                        'value' => 1829386,
                      ),
                      1231 => 
                      array (
                        'key' => '-RAGCO FLEX KENT',
                        'value' => 1829387,
                      ),
                      1232 => 
                      array (
                        'key' => '-GRAY DUCTING',
                        'value' => 1829388,
                      ),
                      1233 => 
                      array (
                        'key' => '-GRINUS',
                        'value' => 1829389,
                      ),
                      1234 => 
                      array (
                        'key' => '-GATES 32020016',
                        'value' => 1829390,
                      ),
                      1235 => 
                      array (
                        'key' => '-GATES 32020021',
                        'value' => 1829391,
                      ),
                      1236 => 
                      array (
                        'key' => '-GATES 32020027',
                        'value' => 1829392,
                      ),
                      1237 => 
                      array (
                        'key' => '-INTERNATIONAL BELT VERSIFLO S&D',
                        'value' => 1829393,
                      ),
                      1238 => 
                      array (
                        'key' => '-GATES 32041437',
                        'value' => 1829394,
                      ),
                      1239 => 
                      array (
                        'key' => '-GHX OILFIELD S&D',
                        'value' => 1829395,
                      ),
                      1240 => 
                      array (
                        'key' => '-PROSPECTOR™ OIL RIG HARDWALL',
                        'value' => 1829396,
                      ),
                      1241 => 
                      array (
                        'key' => '-GHX WATER S&D',
                        'value' => 1829397,
                      ),
                      1242 => 
                      array (
                        'key' => '-GHX OILFIELD',
                        'value' => 1829398,
                      ),
                      1243 => 
                      array (
                        'key' => '-FLEXTRAL J2',
                        'value' => 1829399,
                      ),
                      1244 => 
                      array (
                        'key' => '-GOODALL CHEMICAL',
                        'value' => 1829400,
                      ),
                      1245 => 
                      array (
                        'key' => '-HOSEPOWER PLASTER & GROUT',
                        'value' => 1829401,
                      ),
                      1246 => 
                      array (
                        'key' => '-EXIMCO HYD',
                        'value' => 1829402,
                      ),
                      1247 => 
                      array (
                        'key' => '-NEWLINE WALKWAY WATER',
                        'value' => 1829403,
                      ),
                      1248 => 
                      array (
                        'key' => '-PROSPECTOR FRAC 400 DISCHARGE',
                        'value' => 1829404,
                      ),
                      1249 => 
                      array (
                        'key' => '-FUEL DISCHARGE 200',
                        'value' => 1829405,
                      ),
                      1250 => 
                      array (
                        'key' => '-DAMPFTRIX 6000',
                        'value' => 1829406,
                      ),
                      1251 => 
                      array (
                        'key' => '-CONTICHEM',
                        'value' => 1829407,
                      ),
                      1252 => 
                      array (
                        'key' => '-AEROPAL C',
                        'value' => 1829408,
                      ),
                      1253 => 
                      array (
                        'key' => '-AEROPAL E',
                        'value' => 1829409,
                      ),
                      1254 => 
                      array (
                        'key' => '-AEROPAL CT',
                        'value' => 1829410,
                      ),
                      1255 => 
                      array (
                        'key' => '-AEROPAL ECT',
                        'value' => 1829411,
                      ),
                      1256 => 
                      array (
                        'key' => '-AEROPAL FCT',
                        'value' => 1829412,
                      ),
                      1257 => 
                      array (
                        'key' => '-AEROPAL BCT',
                        'value' => 1829413,
                      ),
                      1258 => 
                      array (
                        'key' => '-LACTOPAL L',
                        'value' => 1829414,
                      ),
                      1259 => 
                      array (
                        'key' => '-BLAUSTRAHL',
                        'value' => 1829415,
                      ),
                      1260 => 
                      array (
                        'key' => '-PETRO OIL S&D 200',
                        'value' => 1829416,
                      ),
                      1261 => 
                      array (
                        'key' => '-HANLIO TWIN-LINE (GRADE R)',
                        'value' => 1829417,
                      ),
                      1262 => 
                      array (
                        'key' => '-GATES 32000002',
                        'value' => 1829418,
                      ),
                      1263 => 
                      array (
                        'key' => '-GATES 32000015',
                        'value' => 1829419,
                      ),
                      1264 => 
                      array (
                        'key' => '-GATES 32000213',
                        'value' => 1829420,
                      ),
                      1265 => 
                      array (
                        'key' => '-GATES 32050236',
                        'value' => 1829421,
                      ),
                      1266 => 
                      array (
                        'key' => '-FUEL DISCHARGE HD 300',
                        'value' => 1829422,
                      ),
                      1267 => 
                      array (
                        'key' => '-WHW GAUNTLET',
                        'value' => 1829423,
                      ),
                      1268 => 
                      array (
                        'key' => '-GARRISON GAUNTLET',
                        'value' => 1829424,
                      ),
                      1269 => 
                      array (
                        'key' => '-GATES 32714397',
                        'value' => 1829425,
                      ),
                      1270 => 
                      array (
                        'key' => '-CONTI A&M',
                        'value' => 1829426,
                      ),
                      1271 => 
                      array (
                        'key' => '-TIPO',
                        'value' => 1829427,
                      ),
                      1272 => 
                      array (
                        'key' => '-SAE 20R1 SB/SC',
                        'value' => 1829428,
                      ),
                      1273 => 
                      array (
                        'key' => '-SAE 20R1 SB/SC HARDWALL',
                        'value' => 1829429,
                      ),
                      1274 => 
                      array (
                        'key' => '-BROWN/BLU FLEX',
                        'value' => 1829430,
                      ),
                      1275 => 
                      array (
                        'key' => '-DEEP BLUE',
                        'value' => 1829431,
                      ),
                      1276 => 
                      array (
                        'key' => '-R/W',
                        'value' => 1829432,
                      ),
                      1277 => 
                      array (
                        'key' => '-FIRE S&D',
                        'value' => 1829433,
                      ),
                      1278 => 
                      array (
                        'key' => '-CLAM JETTING',
                        'value' => 1829434,
                      ),
                      1279 => 
                      array (
                        'key' => '-MIL-H-24136/4',
                        'value' => 1829435,
                      ),
                      1280 => 
                      array (
                        'key' => '-POLY-V',
                        'value' => 1829493,
                      ),
                      1281 => 
                      array (
                        'key' => '-HY-T TORQUE TEAM',
                        'value' => 1829494,
                      ),
                      1282 => 
                      array (
                        'key' => '-ELITE POLY-V',
                        'value' => 1829495,
                      ),
                      1283 => 
                      array (
                        'key' => '-INSTA-POWER',
                        'value' => 1829496,
                      ),
                      1284 => 
                      array (
                        'key' => '-SILENTSYNC',
                        'value' => 1829497,
                      ),
                      1285 => 
                      array (
                        'key' => '-TORQUE-FLEX',
                        'value' => 1829498,
                      ),
                      1286 => 
                      array (
                        'key' => '-HY-T TORQUE TEAM PLUS',
                        'value' => 1829499,
                      ),
                      1287 => 
                      array (
                        'key' => '-TORQUE TEAM PLUS',
                        'value' => 1829500,
                      ),
                      1288 => 
                      array (
                        'key' => '-HY-T WEDGE TORQUE TEAM',
                        'value' => 1829501,
                      ),
                      1289 => 
                      array (
                        'key' => '-HY-T TORQUE TEAM LAMINATED',
                        'value' => 1829502,
                      ),
                      1290 => 
                      array (
                        'key' => '-HY-T PLUS',
                        'value' => 1829503,
                      ),
                      1291 => 
                      array (
                        'key' => '-OPEN END HY-T PLUS',
                        'value' => 1829504,
                      ),
                      1292 => 
                      array (
                        'key' => '-HEX',
                        'value' => 1829505,
                      ),
                      1293 => 
                      array (
                        'key' => '-HY-T WEDGE',
                        'value' => 1829506,
                      ),
                      1294 => 
                      array (
                        'key' => '-FHP',
                        'value' => 1829507,
                      ),
                      1295 => 
                      array (
                        'key' => '-NEOTHANE',
                        'value' => 1829508,
                      ),
                      1296 => 
                      array (
                        'key' => '-POSITIVE DRIVE PD',
                        'value' => 1829509,
                      ),
                      1297 => 
                      array (
                        'key' => '-DUAL POSITIVE DRIVE PD',
                        'value' => 1829510,
                      ),
                      1298 => 
                      array (
                        'key' => '-OPEN END POSITIVE DRIVE',
                        'value' => 1829511,
                      ),
                      1299 => 
                      array (
                        'key' => '-SPECIAL PD',
                        'value' => 1829512,
                      ),
                      1300 => 
                      array (
                        'key' => '-VARIABLE SPEED',
                        'value' => 1829513,
                      ),
                      1301 => 
                      array (
                        'key' => '-BOWLING',
                        'value' => 1829514,
                      ),
                      1302 => 
                      array (
                        'key' => '-OPEN END SUPER TORQUE',
                        'value' => 1829515,
                      ),
                      1303 => 
                      array (
                        'key' => '-TORQUE TEAM LAMINATED',
                        'value' => 1829516,
                      ),
                      1304 => 
                      array (
                        'key' => '-OPEN END HAWK',
                        'value' => 1829517,
                      ),
                      1305 => 
                      array (
                        'key' => '-OPEN END METRIC T PD',
                        'value' => 1829518,
                      ),
                      1306 => 
                      array (
                        'key' => '-COTTON CLEANER',
                        'value' => 1829519,
                      ),
                      1307 => 
                      array (
                        'key' => '-BLACKHAWK PD',
                        'value' => 1829520,
                      ),
                      1308 => 
                      array (
                        'key' => '-FALCON PD',
                        'value' => 1829521,
                      ),
                      1309 => 
                      array (
                        'key' => '-HAWK PD',
                        'value' => 1829522,
                      ),
                      1310 => 
                      array (
                        'key' => '-OPEN END FALCON',
                        'value' => 1829523,
                      ),
                      1311 => 
                      array (
                        'key' => '-METRIC',
                        'value' => 1829524,
                      ),
                      1312 => 
                      array (
                        'key' => '-SUPER TORQUE',
                        'value' => 1829525,
                      ),
                      1313 => 
                      array (
                        'key' => '-AXIAL FAN HAWK PD',
                        'value' => 1829526,
                      ),
                      1314 => 
                      array (
                        'key' => '-WEDGE TLP',
                        'value' => 1829527,
                      ),
                      1315 => 
                      array (
                        'key' => '-POWERSPAN CL',
                        'value' => 1829528,
                      ),
                      1316 => 
                      array (
                        'key' => '-ELITE POLY-V STRETCH',
                        'value' => 1829529,
                      ),
                      1317 => 
                      array (
                        'key' => '-DUAL HI-PERFORMANCE PD',
                        'value' => 1829530,
                      ),
                      1318 => 
                      array (
                        'key' => '-SYNCHROCHAIN CARBON',
                        'value' => 1829531,
                      ),
                      1319 => 
                      array (
                        'key' => '-JIC 37° Flare (SAE J514)',
                        'value' => 1829945,
                      ),
                      1320 => 
                      array (
                        'key' => '-SAE 45 J512 Flare',
                        'value' => 1829950,
                      ),
                      1321 => 
                      array (
                        'key' => '-SAE 45 Inverted Flare',
                        'value' => 1829951,
                      ),
                      1322 => 
                      array (
                        'key' => '-NPTF',
                        'value' => 1829952,
                      ),
                      1323 => 
                      array (
                        'key' => '-NPSM',
                        'value' => 1829953,
                      ),
                      1324 => 
                      array (
                        'key' => '-GTF',
                        'value' => 1829954,
                      ),
                      1325 => 
                      array (
                        'key' => '-SAE J514 Flareless Tube Fittings',
                        'value' => 1829955,
                      ),
                      1326 => 
                      array (
                        'key' => '-Standpipe',
                        'value' => 1829956,
                      ),
                      1327 => 
                      array (
                        'key' => '-O-Ring Face Seal (SAE J1453 ORS/ORFS)',
                        'value' => 1829957,
                      ),
                      1328 => 
                      array (
                        'key' => '-O-Ring Boss Straight Thread (SAE J514)',
                        'value' => 1829958,
                      ),
                      1329 => 
                      array (
                        'key' => '-Code 61 Flange (SAE J518)',
                        'value' => 1829959,
                      ),
                      1330 => 
                      array (
                        'key' => '-Code 62 Flange (SAE J518)',
                        'value' => 1829960,
                      ),
                      1331 => 
                      array (
                        'key' => '-Caterpillar Flange',
                        'value' => 1829961,
                      ),
                      1332 => 
                      array (
                        'key' => '-Hammer Union',
                        'value' => 1829962,
                      ),
                      1333 => 
                      array (
                        'key' => '-Komatsu Flange',
                        'value' => 1829963,
                      ),
                      1334 => 
                      array (
                        'key' => '-BSPP (British Standard Pipe Parallel)',
                        'value' => 1829964,
                      ),
                      1335 => 
                      array (
                        'key' => '-BSPT (British Standard Pipe Tapered)',
                        'value' => 1829965,
                      ),
                      1336 => 
                      array (
                        'key' => '-BSP Flat Seat (British Standard Pipe)',
                        'value' => 1829966,
                      ),
                      1337 => 
                      array (
                        'key' => '-DIN 24 Light',
                        'value' => 1829967,
                      ),
                      1338 => 
                      array (
                        'key' => '-DIN 24 Heavy',
                        'value' => 1829968,
                      ),
                      1339 => 
                      array (
                        'key' => '-DIN 60',
                        'value' => 1829969,
                      ),
                      1340 => 
                      array (
                        'key' => '-Komatsu 30 Flare with Metric Threads',
                        'value' => 1829970,
                      ),
                      1341 => 
                      array (
                        'key' => '-JIS 30 (Paralled Pipe Threads)',
                        'value' => 1829971,
                      ),
                      1342 => 
                      array (
                        'key' => '-Hose Joiner',
                        'value' => 1829972,
                      ),
                      1343 => 
                      array (
                        'key' => '-NPT API',
                        'value' => 1829974,
                      ),
                      1344 => 
                      array (
                        'key' => '-O-Ring Boss Straight Thread (SAE J1453)',
                        'value' => 1829975,
                      ),
                      1345 => 
                      array (
                        'key' => '-Code 61 Flange (SAE  J518)',
                        'value' => 1829976,
                      ),
                      1346 => 
                      array (
                        'key' => '-Catepillar Flange',
                        'value' => 1829977,
                      ),
                      1347 => 
                      array (
                        'key' => '-JIS 30 (Parallel Pipe Threads)',
                        'value' => 1829978,
                      ),
                      1348 => 
                      array (
                        'key' => '-NPM API',
                        'value' => 1829979,
                      ),
                      1349 => 
                      array (
                        'key' => '-Compressor O-Ring Tube',
                        'value' => 1829980,
                      ),
                      1350 => 
                      array (
                        'key' => '-Flareless Tube',
                        'value' => 1829981,
                      ),
                      1351 => 
                      array (
                        'key' => '-Hose Mender',
                        'value' => 1829982,
                      ),
                      1352 => 
                      array (
                        'key' => '-Hose Mender with Sight Glass',
                        'value' => 1829983,
                      ),
                      1353 => 
                      array (
                        'key' => '-Hose Mender, Tee',
                        'value' => 1829984,
                      ),
                      1354 => 
                      array (
                        'key' => '-O-Ring Insert',
                        'value' => 1829985,
                      ),
                      1355 => 
                      array (
                        'key' => '-O-Ring Tube',
                        'value' => 1829986,
                      ),
                      1356 => 
                      array (
                        'key' => '-SAE 45 Flare',
                        'value' => 1829987,
                      ),
                      1357 => 
                      array (
                        'key' => '-Compressor Pad Block',
                        'value' => 1829988,
                      ),
                      1358 => 
                      array (
                        'key' => '-Ford Spring Lock',
                        'value' => 1829989,
                      ),
                      1359 => 
                      array (
                        'key' => '-Hose Medner with Sight Glass',
                        'value' => 1829990,
                      ),
                      1360 => 
                      array (
                        'key' => '-O-Ring Face Seal',
                        'value' => 1829991,
                      ),
                      1361 => 
                      array (
                        'key' => '-O-Ring Tube Compressor (Female to O-Ring Insert) ',
                        'value' => 1829992,
                      ),
                      1362 => 
                      array (
                        'key' => '-O-Ring Tube (Female to O-Ring Insert)',
                        'value' => 1829993,
                      ),
                      1363 => 
                      array (
                        'key' => '-Flareless Tube Nuts',
                        'value' => 1829994,
                      ),
                      1364 => 
                      array (
                        'key' => '-Flareless Tube Sleeves',
                        'value' => 1829995,
                      ),
                      1365 => 
                      array (
                        'key' => '-Inline Orifice Tubes',
                        'value' => 1829996,
                      ),
                      1366 => 
                      array (
                        'key' => '-O-Ring for Ford Spring Lock',
                        'value' => 1829997,
                      ),
                      1367 => 
                      array (
                        'key' => '-O-Ring for Switch',
                        'value' => 1829998,
                      ),
                      1368 => 
                      array (
                        'key' => '-O-Ring for Tube Fittings',
                        'value' => 1829999,
                      ),
                      1369 => 
                      array (
                        'key' => '-Sealing Washers',
                        'value' => 1830000,
                      ),
                      1370 => 
                      array (
                        'key' => '-Valve Adapter',
                        'value' => 1830001,
                      ),
                      1371 => 
                      array (
                        'key' => '-Valve Caps',
                        'value' => 1830002,
                      ),
                      1372 => 
                      array (
                        'key' => '-Valve Core',
                        'value' => 1830003,
                      ),
                      1373 => 
                      array (
                        'key' => '-Metal Clips',
                        'value' => 1830004,
                      ),
                      1374 => 
                      array (
                        'key' => '-Plastic Clip Holder',
                        'value' => 1830005,
                      ),
                      1375 => 
                      array (
                        'key' => '-Clip Pliers',
                        'value' => 1830006,
                      ),
                      1376 => 
                      array (
                        'key' => '-Flange Engine Oil Connection (Two Bolt)',
                        'value' => 1830007,
                      ),
                      1377 => 
                      array (
                        'key' => '-PTT 30',
                        'value' => 1830008,
                      ),
                      1378 => 
                      array (
                        'key' => '-O-Ring Boss ',
                        'value' => 1830009,
                      ),
                      1379 => 
                      array (
                        'key' => '-NPT API Hammer Union ',
                        'value' => 1830010,
                      ),
                      1380 => 
                      array (
                        'key' => '-JIC 37° Flare',
                        'value' => 1830011,
                      ),
                      1381 => 
                      array (
                        'key' => '-Ferrules',
                        'value' => 1830012,
                      ),
                      1382 => 
                      array (
                        'key' => '-UNI-Crimp UCF2 Ferrule',
                        'value' => 1830013,
                      ),
                      1383 => 
                      array (
                        'key' => '-Uni-Crimp UCF3 Ferrule',
                        'value' => 1830014,
                      ),
                      1384 => 
                      array (
                        'key' => '-Uni-Crimp UCF6 Ferrule',
                        'value' => 1830015,
                      ),
                      1385 => 
                      array (
                        'key' => '-Uni-Crimp UCF8 Ferrule',
                        'value' => 1830016,
                      ),
                      1386 => 
                      array (
                        'key' => '-Uni-Crimp UCF9 Ferrule',
                        'value' => 1830017,
                      ),
                      1387 => 
                      array (
                        'key' => '-Uni-Crimp UCF10 Ferrule',
                        'value' => 1830018,
                      ),
                      1388 => 
                      array (
                        'key' => '-Uni-Crimp UCF11 Ferrule',
                        'value' => 1830019,
                      ),
                      1389 => 
                      array (
                        'key' => '-Dual-Grip DGF1 Ferrule',
                        'value' => 1830020,
                      ),
                      1390 => 
                      array (
                        'key' => '-Dual-Grip DGF2 Ferrule',
                        'value' => 1830021,
                      ),
                      1391 => 
                      array (
                        'key' => '-DR16SC',
                        'value' => 1830041,
                      ),
                      1392 => 
                      array (
                        'key' => '-MIL-DTL-8788',
                        'value' => 1830042,
                      ),
                      1393 => 
                      array (
                        'key' => '-SAFLEX® (NSFX)',
                        'value' => 1830043,
                      ),
                      1394 => 
                      array (
                        'key' => '-SFS',
                        'value' => 1830044,
                      ),
                      1395 => 
                      array (
                        'key' => '-SGUN',
                        'value' => 1830045,
                      ),
                      1396 => 
                      array (
                        'key' => '-SHJ',
                        'value' => 1830046,
                      ),
                      1397 => 
                      array (
                        'key' => '-O-Ring Face Seal O-Rings (SAE J1453 ORS/ORFS)',
                        'value' => 1831350,
                      ),
                      1398 => 
                      array (
                        'key' => '-O-Ring Boss Straight Thread O-Rings (SAE J514)',
                        'value' => 1831351,
                      ),
                      1399 => 
                      array (
                        'key' => '-Caterpillar Flange O-Rings Code 61 and Code 62 Flange O-Rings (SAE J518)',
                        'value' => 1831352,
                      ),
                      1400 => 
                      array (
                        'key' => '-Code 61 Split Flange Clamp Kits ',
                        'value' => 1831353,
                      ),
                      1401 => 
                      array (
                        'key' => '-BSPP (British Standard Pipe Parallel) O-Rings',
                        'value' => 3831015,
                      ),
                      1402 => 
                      array (
                        'key' => '-DIN 24 Light O-Rings',
                        'value' => 3831016,
                      ),
                      1403 => 
                      array (
                        'key' => '-DIN 24 Heavy O-Rings',
                        'value' => 3831017,
                      ),
                      1404 => 
                      array (
                        'key' => '-Code 62 Split Flange Clamp Kits',
                        'value' => 3831018,
                      ),
                      1405 => 
                      array (
                        'key' => '-PROFESSIONAL AIR',
                        'value' => 3831234,
                      ),
                      1406 => 
                      array (
                        'key' => '-POWER PORT',
                        'value' => 3831236,
                      ),
                      1407 => 
                      array (
                        'key' => '-VACUWORX XR16SC',
                        'value' => 3831418,
                      ),
                      1408 => 
                      array (
                        'key' => '-PATHFINDER ECO',
                        'value' => 3831419,
                      ),
                      1409 => 
                      array (
                        'key' => '-YARDMASTER ECO',
                        'value' => 3831420,
                      ),
                      1410 => 
                      array (
                        'key' => '-ECO RUBBER',
                        'value' => 3831423,
                      ),
                      1411 => 
                      array (
                        'key' => '-ECO LITE',
                        'value' => 3831424,
                      ),
                      1412 => 
                      array (
                        'key' => '-ECOLAB',
                        'value' => 3831426,
                      ),
                      1413 => 
                      array (
                        'key' => '-FLEXWING® FOOD',
                        'value' => 3947663,
                      ),
                      1414 => 
                      array (
                        'key' => '-CLEARWATER FLEXTRA NSF',
                        'value' => 4683628,
                      ),
                      1415 => 
                      array (
                        'key' => '-CLEARWATER SOFTWALL NSF',
                        'value' => 4683629,
                      ),
                      1416 => 
                      array (
                        'key' => '-GENERIC PUSH-ON',
                        'value' => 5299956,
                      ),
                      1417 => 
                      array (
                        'key' => '-DRINK FLEX',
                        'value' => 5300789,
                      ),
                      1418 => 
                      array (
                        'key' => '-MERLETT RAGNO CA',
                        'value' => 5347026,
                      ),
                      1419 => 
                      array (
                        'key' => '-MERLETT ARMORVIN HNA',
                        'value' => 5347027,
                      ),
                      1420 => 
                      array (
                        'key' => '-MERLETT VACUPRESS CRISTAL',
                        'value' => 5347028,
                      ),
                      1421 => 
                      array (
                        'key' => '-BLACK SOFTWALL',
                        'value' => 5354194,
                      ),
                      1422 => 
                      array (
                        'key' => '-SOFTWALL FDA',
                        'value' => 5355079,
                      ),
                      1423 => 
                      array (
                        'key' => '-CTI',
                        'value' => 5355080,
                      ),
                      1424 => 
                      array (
                        'key' => '-SPIRIT',
                        'value' => 5355081,
                      ),
                      1425 => 
                      array (
                        'key' => '-PBE',
                        'value' => 5355082,
                      ),
                      1426 => 
                      array (
                        'key' => '-FLASH',
                        'value' => 5355083,
                      ),
                      1427 => 
                      array (
                        'key' => '-BLACK JACK',
                        'value' => 5355084,
                      ),
                      1428 => 
                      array (
                        'key' => '-DINGA NOZZLE',
                        'value' => 5356966,
                      ),
                      1429 => 
                      array (
                        'key' => '-CONTI BLUE STEAM FDA',
                        'value' => 5554379,
                      ),
                      1430 => 
                      array (
                        'key' => '-KH DIVERS HOSE',
                        'value' => 5580054,
                      ),
                      1431 => 
                      array (
                        'key' => '-AIRCRAFT FUEL SENSING',
                        'value' => 5601937,
                      ),
                      1432 => 
                      array (
                        'key' => '-AIR 250 / 300 / 400',
                        'value' => 5679575,
                      ),
                      1433 => 
                      array (
                        'key' => '-FIRE EXTINGUISHER UL92',
                        'value' => 5679576,
                      ),
                      1434 => 
                      array (
                        'key' => '-ELITE HOT WATER',
                        'value' => 5680554,
                      ),
                      1435 => 
                      array (
                        'key' => '-HAMILTON',
                        'value' => 5756819,
                      ),
                      1436 => 
                      array (
                        'key' => '-SEAL-RITE',
                        'value' => 5759831,
                      ),
                      1437 => 
                      array (
                        'key' => '-PETROHOSE',
                        'value' => 5759832,
                      ),
                      1438 => 
                      array (
                        'key' => '-ALEMITE',
                        'value' => 5759833,
                      ),
                      1439 => 
                      array (
                        'key' => '-AIR / WATER HOSE',
                        'value' => 5759834,
                      ),
                      1440 => 
                      array (
                        'key' => '-HOSINC',
                        'value' => 5759835,
                      ),
                      1441 => 
                      array (
                        'key' => '-EMERALD',
                        'value' => 5759836,
                      ),
                      1442 => 
                      array (
                        'key' => '-MERCURY',
                        'value' => 5759837,
                      ),
                      1443 => 
                      array (
                        'key' => '-ABLE',
                        'value' => 5759838,
                      ),
                      1444 => 
                      array (
                        'key' => '-PACIFIC RUBBER',
                        'value' => 5764901,
                      ),
                      1445 => 
                      array (
                        'key' => '-INTERCHANGE',
                        'value' => 5764902,
                      ),
                      1446 => 
                      array (
                        'key' => '-A1',
                        'value' => 5764903,
                      ),
                      1447 => 
                      array (
                        'key' => '-FLEXTRAL',
                        'value' => 5764904,
                      ),
                      1448 => 
                      array (
                        'key' => '-ULTRAMAX',
                        'value' => 5764905,
                      ),
                      1449 => 
                      array (
                        'key' => '-UNITED CENTRAL',
                        'value' => 5764906,
                      ),
                      1450 => 
                      array (
                        'key' => '-WESTFLEX',
                        'value' => 5764907,
                      ),
                      1451 => 
                      array (
                        'key' => '-CITGO',
                        'value' => 6422706,
                      ),
                      1452 => 
                      array (
                        'key' => '-MSC',
                        'value' => 6422707,
                      ),
                      1453 => 
                      array (
                        'key' => '-CON-AG ECO',
                        'value' => 6951845,
                      ),
                      1454 => 
                      array (
                        'key' => '-Plastic Process Equipment',
                        'value' => 6951846,
                      ),
                      1455 => 
                      array (
                        'key' => '-KIMBALL',
                        'value' => 7079915,
                      ),
                      1456 => 
                      array (
                        'key' => '-AIRGAS',
                        'value' => 7079916,
                      ),
                      1457 => 
                      array (
                        'key' => '-TECHNIWELD',
                        'value' => 7079917,
                      ),
                      1458 => 
                      array (
                        'key' => '-AIRSTAR',
                        'value' => 7079918,
                      ),
                      1459 => 
                      array (
                        'key' => '-TRIX HP',
                        'value' => 7082339,
                      ),
                      1460 => 
                      array (
                        'key' => '-CONTINENTAL / COX REEL',
                        'value' => 7082340,
                      ),
                      1461 => 
                      array (
                        'key' => '-SOUTHWEST RUBBER',
                        'value' => 7082341,
                      ),
                      1462 => 
                      array (
                        'key' => '-SPARTAN',
                        'value' => 7082427,
                      ),
                      1463 => 
                      array (
                        'key' => '-SUPER YC AIR',
                        'value' => 7082890,
                      ),
                      1464 => 
                      array (
                        'key' => '-CONTI CHEM EXTRA',
                        'value' => 7085031,
                      ),
                      1465 => 
                      array (
                        'key' => '-CONTI FEP',
                        'value' => 7092828,
                      ),
                      1466 => 
                      array (
                        'key' => '-VINTNER LITE',
                        'value' => 7186049,
                      ),
                      1467 => 
                      array (
                        'key' => '-YELLOW HORNET',
                        'value' => 7186050,
                      ),
                      1468 => 
                      array (
                        'key' => '-COLD BLUE FLEX',
                        'value' => 7186051,
                      ),
                      1469 => 
                      array (
                        'key' => '-RED HORNET',
                        'value' => 7186052,
                      ),
                      1470 => 
                      array (
                        'key' => '-',
                        'value' => 7186053,
                      ),
                      1471 => 
                      array (
                        'key' => '-HORNET XF',
                        'value' => 7186054,
                      ),
                      1472 => 
                      array (
                        'key' => '-CON-AG WATER S&D ECO',
                        'value' => 7278690,
                      ),
                      1473 => 
                      array (
                        'key' => '-BLAST HD',
                        'value' => 7278691,
                      ),
                      1474 => 
                      array (
                        'key' => '-ALLCRETE® TEXTILE HD',
                        'value' => 7278692,
                      ),
                      1475 => 
                      array (
                        'key' => '-FLEXTRA PETROLEUM',
                        'value' => 7287904,
                      ),
                      1476 => 
                      array (
                        'key' => '-SPIRAFLEX® OIL FILL',
                        'value' => 7401486,
                      ),
                      1477 => 
                      array (
                        'key' => '-JIC 37° Male X JIC 37° Male',
                        'value' => 7445338,
                      ),
                      1478 => 
                      array (
                        'key' => '-NPTF Male X NPSM Female Swivel',
                        'value' => 7445339,
                      ),
                      1479 => 
                      array (
                        'key' => '-GP3-11-1 / EN1765:2016 S15',
                        'value' => 7563309,
                      ),
                      1480 => 
                      array (
                        'key' => '-SCARFING',
                        'value' => 7563310,
                      ),
                      1481 => 
                      array (
                        'key' => '-VERSAFUEL',
                        'value' => 7563311,
                      ),
                      1482 => 
                      array (
                        'key' => '-PROSPECTOR FRAC S&D',
                        'value' => 7563312,
                      ),
                      1483 => 
                      array (
                        'key' => '-CNH',
                        'value' => 7563318,
                      ),
                      1484 => 
                      array (
                        'key' => '-GBT',
                        'value' => 7605428,
                      ),
                      1485 => 
                      array (
                        'key' => '-HW OFFSHORE FUEL',
                        'value' => 7610826,
                      ),
                      1486 => 
                      array (
                        'key' => '-HOT SULFUR',
                        'value' => 7654087,
                      ),
                      1487 => 
                      array (
                        'key' => '-WASHDOWN FDA',
                        'value' => 7717343,
                      ),
                      1488 => 
                      array (
                        'key' => '-DRY CEMENT & BARYTES HW',
                        'value' => 7717364,
                      ),
                      1489 => 
                      array (
                        'key' => '-BARYTES HARDWALL',
                        'value' => 7717365,
                      ),
                      1490 => 
                      array (
                        'key' => '-DRY CEMENT HARDWALL',
                        'value' => 7717366,
                      ),
                      1491 => 
                      array (
                        'key' => '-PC200i',
                        'value' => 7738136,
                      ),
                      1492 => 
                      array (
                        'key' => '-DRAGER',
                        'value' => 7740237,
                      ),
                      1493 => 
                      array (
                        'key' => '-GENERIC AIR BREATHING',
                        'value' => 7740436,
                      ),
                      1494 => 
                      array (
                        'key' => '-SCOTT AIR BREATHING',
                        'value' => 7837755,
                      ),
                      1495 => 
                      array (
                        'key' => '-DANICORP DIVERS HOSE',
                        'value' => 7837994,
                      ),
                      1496 => 
                      array (
                        'key' => '-GP3-11-1 / EN1765:2016 S21',
                        'value' => 7989388,
                      ),
                      1497 => 
                      array (
                        'key' => '-GP3-11-1 / EN1765:2016 S10',
                        'value' => 7989389,
                      ),
                      1498 => 
                      array (
                        'key' => '-INSTA-LOCK™ REPAIR KIT',
                        'value' => 7989390,
                      ),
                      1499 => 
                      array (
                        'key' => '-WINELINE',
                        'value' => 7992690,
                      ),
                      1500 => 
                      array (
                        'key' => '-POSEIDON',
                        'value' => 10631868,
                      ),
                      1501 => 
                      array (
                        'key' => '-CONTI FOOD & DRINK FLEX UPE',
                        'value' => 10663607,
                      ),
                      1502 => 
                      array (
                        'key' => '-PARC5S',
                        'value' => 10663608,
                      ),
                      1503 => 
                      array (
                        'key' => '-P5S',
                        'value' => 10663609,
                      ),
                      1504 => 
                      array (
                        'key' => '-MCP4S',
                        'value' => 10663610,
                      ),
                      1505 => 
                      array (
                        'key' => '-PLIOVIC LIGHT WEIGHT',
                        'value' => 10705761,
                      ),
                      1506 => 
                      array (
                        'key' => '-CONTI® TARSPRAY',
                        'value' => 10705762,
                      ),
                      1507 => 
                      array (
                        'key' => '-CONTI® OIL',
                        'value' => 10709285,
                      ),
                      1508 => 
                      array (
                        'key' => '-GR3',
                        'value' => 10709286,
                      ),
                      1509 => 
                      array (
                        'key' => '-VACUPRESS OIL PU',
                        'value' => 10862807,
                      ),
                      1510 => 
                      array (
                        'key' => '-VACUPRESS OIL',
                        'value' => 10862808,
                      ),
                      1511 => 
                      array (
                        'key' => '-MIL-DTL-3992',
                        'value' => 11047034,
                      ),
                      1512 => 
                      array (
                        'key' => '-RBR & ACC',
                        'value' => 11069176,
                      ),
                      1513 => 
                      array (
                        'key' => '-PIONEER',
                        'value' => 12265901,
                      ),
                      1514 => 
                      array (
                        'key' => '-PIONEER FLEXWING FOOD',
                        'value' => 12265902,
                      ),
                      1515 => 
                      array (
                        'key' => '-CHARTER ROOF DRAIN',
                        'value' => 12265903,
                      ),
                      1516 => 
                      array (
                        'key' => '-WASHDOWN HD',
                        'value' => 12394783,
                      ),
                      1517 => 
                      array (
                        'key' => '-RUBBERWORX',
                        'value' => 12406205,
                      ),
                      1518 => 
                      array (
                        'key' => '-PARC2W',
                        'value' => 12472318,
                      ),
                      1519 => 
                      array (
                        'key' => '-HOT TAR & ASPHALT',
                        'value' => 12530046,
                      ),
                      1520 => 
                      array (
                        'key' => '-PROSPECTOR CLEAN IN PLACE',
                        'value' => 12907334,
                      ),
                      1521 => 
                      array (
                        'key' => '1-Continental',
                        'value' => 12960731,
                      ),
                      1522 => 
                      array (
                        'key' => '2-Synchroflex',
                        'value' => 12960732,
                      ),
                      1523 => 
                      array (
                        'key' => '3-Powerspan',
                        'value' => 12960733,
                      ),
                      1524 => 
                      array (
                        'key' => '4-Agridur',
                        'value' => 12960734,
                      ),
                      1525 => 
                      array (
                        'key' => '20-PBL_AERZENER',
                        'value' => 12960735,
                      ),
                      1526 => 
                      array (
                        'key' => '21-PBL_SIT',
                        'value' => 12960736,
                      ),
                      1527 => 
                      array (
                        'key' => '22-PBL_ACORN',
                        'value' => 12960737,
                      ),
                      1528 => 
                      array (
                        'key' => '23-PBL_AIXAM',
                        'value' => 12960738,
                      ),
                      1529 => 
                      array (
                        'key' => '24-PBL_ALM',
                        'value' => 12960739,
                      ),
                      1530 => 
                      array (
                        'key' => '25-PBL_ALZMETALL',
                        'value' => 12960740,
                      ),
                      1531 => 
                      array (
                        'key' => '26-PBL_ARCELIK',
                        'value' => 12960741,
                      ),
                      1532 => 
                      array (
                        'key' => '27-PBL_Becker / Berges',
                        'value' => 12960742,
                      ),
                      1533 => 
                      array (
                        'key' => '28-PBL_ATCO QUALCAST',
                        'value' => 12960743,
                      ),
                      1534 => 
                      array (
                        'key' => '29-PBL_Atlas Copco',
                        'value' => 12960744,
                      ),
                      1535 => 
                      array (
                        'key' => '30-PBL_Bosch Household',
                        'value' => 12960745,
                      ),
                      1536 => 
                      array (
                        'key' => '31-PBL_BANDO',
                        'value' => 12960746,
                      ),
                      1537 => 
                      array (
                        'key' => '32-PBL_BARMAG',
                        'value' => 12960747,
                      ),
                      1538 => 
                      array (
                        'key' => '33-PBL_BARMENIA',
                        'value' => 12960748,
                      ),
                      1539 => 
                      array (
                        'key' => '34-PBL_BERNER',
                        'value' => 12960749,
                      ),
                      1540 => 
                      array (
                        'key' => '35-PBL_BERNINA',
                        'value' => 12960750,
                      ),
                      1541 => 
                      array (
                        'key' => '36-PBL_BMW',
                        'value' => 12960751,
                      ),
                      1542 => 
                      array (
                        'key' => '37-PBL_BOSCH',
                        'value' => 12960752,
                      ),
                      1543 => 
                      array (
                        'key' => '38-PBL_BRUKS',
                        'value' => 12960753,
                      ),
                      1544 => 
                      array (
                        'key' => '39-PBL_BÜHLER',
                        'value' => 12960754,
                      ),
                      1545 => 
                      array (
                        'key' => '40-PBL_BYD',
                        'value' => 12960755,
                      ),
                      1546 => 
                      array (
                        'key' => '41-PBL_CLAAS',
                        'value' => 12960756,
                      ),
                      1547 => 
                      array (
                        'key' => '42-PBL_CNH',
                        'value' => 12960757,
                      ),
                      1548 => 
                      array (
                        'key' => '43-PBL_COMPAIR',
                        'value' => 12960758,
                      ),
                      1549 => 
                      array (
                        'key' => '44-PBL_CONCAR',
                        'value' => 12960759,
                      ),
                      1550 => 
                      array (
                        'key' => '45-PBL_DEUSSEN',
                        'value' => 12960760,
                      ),
                      1551 => 
                      array (
                        'key' => '46-PBL_DOLMAR',
                        'value' => 12960761,
                      ),
                      1552 => 
                      array (
                        'key' => '47-PBL_DUERK/ADLER',
                        'value' => 12960762,
                      ),
                      1553 => 
                      array (
                        'key' => '48-PBL_ELECTROLUX',
                        'value' => 12960763,
                      ),
                      1554 => 
                      array (
                        'key' => '49-PBL_ELGI ULTRA',
                        'value' => 12960764,
                      ),
                      1555 => 
                      array (
                        'key' => '50-PBL_ESCAPE',
                        'value' => 12960765,
                      ),
                      1556 => 
                      array (
                        'key' => '51-PBL_FASTERHOLT',
                        'value' => 12960766,
                      ),
                      1557 => 
                      array (
                        'key' => '52-PBL_FENNER',
                        'value' => 12960767,
                      ),
                      1558 => 
                      array (
                        'key' => '53-PBL_FLENDER',
                        'value' => 12960768,
                      ),
                      1559 => 
                      array (
                        'key' => '54-PBL_FLYMO',
                        'value' => 12960769,
                      ),
                      1560 => 
                      array (
                        'key' => '55-PBL_FRIGO',
                        'value' => 12960770,
                      ),
                      1561 => 
                      array (
                        'key' => '56-PBL_GARDENA',
                        'value' => 12960771,
                      ),
                      1562 => 
                      array (
                        'key' => '57-PBL_GEA',
                        'value' => 12960772,
                      ),
                      1563 => 
                      array (
                        'key' => '58-PBL_GOLDWIND',
                        'value' => 12960773,
                      ),
                      1564 => 
                      array (
                        'key' => '59-PBL_GUZZI',
                        'value' => 12960774,
                      ),
                      1565 => 
                      array (
                        'key' => '60-PBL_HAKO',
                        'value' => 12960775,
                      ),
                      1566 => 
                      array (
                        'key' => '61-PBL_HaoSheng NS',
                        'value' => 12960776,
                      ),
                      1567 => 
                      array (
                        'key' => '62-PBL_HATZ',
                        'value' => 12960777,
                      ),
                      1568 => 
                      array (
                        'key' => '63-PBL_HILTI',
                        'value' => 12960778,
                      ),
                      1569 => 
                      array (
                        'key' => '64-PBL_Ingersoll Rand',
                        'value' => 12960779,
                      ),
                      1570 => 
                      array (
                        'key' => '65-PBL_IRMER+ELZE',
                        'value' => 12960780,
                      ),
                      1571 => 
                      array (
                        'key' => '66-PBL_JMS',
                        'value' => 12960781,
                      ),
                      1572 => 
                      array (
                        'key' => '67-PBL_John Deere',
                        'value' => 12960782,
                      ),
                      1573 => 
                      array (
                        'key' => '68-PBL_JUNGHEINRICH',
                        'value' => 12960783,
                      ),
                      1574 => 
                      array (
                        'key' => '69-PBL_KAERCHER',
                        'value' => 12960784,
                      ),
                      1575 => 
                      array (
                        'key' => '70-PBL_KAESER',
                        'value' => 12960785,
                      ),
                      1576 => 
                      array (
                        'key' => '71-PBL_KAESSBOHRER',
                        'value' => 12960786,
                      ),
                      1577 => 
                      array (
                        'key' => '72-PBL_KIVI PEKKA',
                        'value' => 12960787,
                      ),
                      1578 => 
                      array (
                        'key' => '73-PBL_Klocke',
                        'value' => 12960788,
                      ),
                      1579 => 
                      array (
                        'key' => '74-PBL_KUHN',
                        'value' => 12960789,
                      ),
                      1580 => 
                      array (
                        'key' => '75-PBL_Lattimer',
                        'value' => 12960790,
                      ),
                      1581 => 
                      array (
                        'key' => '76-PBL_LAVERDAS',
                        'value' => 12960791,
                      ),
                      1582 => 
                      array (
                        'key' => '77-PBL_LENZE',
                        'value' => 12960792,
                      ),
                      1583 => 
                      array (
                        'key' => '78-PBL_LEYBOLD',
                        'value' => 12960793,
                      ),
                      1584 => 
                      array (
                        'key' => '79-PBL_LIEBHERR',
                        'value' => 12960794,
                      ),
                      1585 => 
                      array (
                        'key' => '80-PBL_LINDE',
                        'value' => 12960795,
                      ),
                      1586 => 
                      array (
                        'key' => '81-PBL_Lindner',
                        'value' => 12960796,
                      ),
                      1587 => 
                      array (
                        'key' => '82-PBL_LINNIG',
                        'value' => 12960797,
                      ),
                      1588 => 
                      array (
                        'key' => '83-PBL_LUBECA',
                        'value' => 12960798,
                      ),
                      1589 => 
                      array (
                        'key' => '84-PBL_LUMIKKO',
                        'value' => 12960799,
                      ),
                      1590 => 
                      array (
                        'key' => '85-PBL_M.E.C.',
                        'value' => 12960800,
                      ),
                      1591 => 
                      array (
                        'key' => '86-PBL_MAFELL',
                        'value' => 12960801,
                      ),
                      1592 => 
                      array (
                        'key' => '87-PBL_MAKITA',
                        'value' => 12960802,
                      ),
                      1593 => 
                      array (
                        'key' => '88-PBL_MANROL',
                        'value' => 12960803,
                      ),
                      1594 => 
                      array (
                        'key' => '89-PBL_MAXIPRESS',
                        'value' => 12960804,
                      ),
                      1595 => 
                      array (
                        'key' => '90-PBL_MEGADYNE',
                        'value' => 12960805,
                      ),
                      1596 => 
                      array (
                        'key' => '91-PBL_METABO',
                        'value' => 12960806,
                      ),
                      1597 => 
                      array (
                        'key' => '92-PBL_MIELE HOCHSPANNUNGSFEST',
                        'value' => 12960807,
                      ),
                      1598 => 
                      array (
                        'key' => '93-PBL_MINERVA',
                        'value' => 12960808,
                      ),
                      1599 => 
                      array (
                        'key' => '94-PBL_NETZSCH',
                        'value' => 12960809,
                      ),
                      1600 => 
                      array (
                        'key' => '95-PBL_NOBRAND',
                        'value' => 12960810,
                      ),
                      1601 => 
                      array (
                        'key' => '96-PBL_NUR DIM',
                        'value' => 12960811,
                      ),
                      1602 => 
                      array (
                        'key' => '97-PBL_ROBE',
                        'value' => 12960812,
                      ),
                      1603 => 
                      array (
                        'key' => '98-PBL_OPTIBELT',
                        'value' => 12960813,
                      ),
                      1604 => 
                      array (
                        'key' => '99-PBL_PFAFF',
                        'value' => 12960814,
                      ),
                      1605 => 
                      array (
                        'key' => '100-PBL_PSROLMAN',
                        'value' => 12960815,
                      ),
                      1606 => 
                      array (
                        'key' => '101-PBL_QUALCAST',
                        'value' => 12960816,
                      ),
                      1607 => 
                      array (
                        'key' => '102-PBL_QUALTEX',
                        'value' => 12960817,
                      ),
                      1608 => 
                      array (
                        'key' => '103-PBL_RIETER',
                        'value' => 12960818,
                      ),
                      1609 => 
                      array (
                        'key' => '104-PBL_ROULUNDS',
                        'value' => 12960819,
                      ),
                      1610 => 
                      array (
                        'key' => '105-PBL_RUBANG',
                        'value' => 12960820,
                      ),
                      1611 => 
                      array (
                        'key' => '106-PBL_RUWAC',
                        'value' => 12960821,
                      ),
                      1612 => 
                      array (
                        'key' => '107-PBL_SABO',
                        'value' => 12960822,
                      ),
                      1613 => 
                      array (
                        'key' => '108-PBL_SANOK',
                        'value' => 12960823,
                      ),
                      1614 => 
                      array (
                        'key' => '109-PBL_SCANCOIN',
                        'value' => 12960824,
                      ),
                      1615 => 
                      array (
                        'key' => '110-PBL_Schaeffler',
                        'value' => 12960825,
                      ),
                      1616 => 
                      array (
                        'key' => '111-PBL_SCHAUBL',
                        'value' => 12960826,
                      ),
                      1617 => 
                      array (
                        'key' => '112-PBL_SCHENCK',
                        'value' => 12960827,
                      ),
                      1618 => 
                      array (
                        'key' => '113-PBL_SCHINDLER',
                        'value' => 12960828,
                      ),
                      1619 => 
                      array (
                        'key' => '114-PBL_SCHLAFHORST',
                        'value' => 12960829,
                      ),
                      1620 => 
                      array (
                        'key' => '115-PBL_SCHWALBE',
                        'value' => 12960830,
                      ),
                      1621 => 
                      array (
                        'key' => '116-PBL_SEPAMATIC',
                        'value' => 12960831,
                      ),
                      1622 => 
                      array (
                        'key' => '117-PBL_SHELBOURNE',
                        'value' => 12960832,
                      ),
                      1623 => 
                      array (
                        'key' => '118-PBL_SIGERIST',
                        'value' => 12960833,
                      ),
                      1624 => 
                      array (
                        'key' => '119-PBL_SILGAN',
                        'value' => 12960834,
                      ),
                      1625 => 
                      array (
                        'key' => '120-PBL_Singer',
                        'value' => 12960835,
                      ),
                      1626 => 
                      array (
                        'key' => '121-PBL_SKLOSTROJ',
                        'value' => 12960836,
                      ),
                      1627 => 
                      array (
                        'key' => '122-PBL_SODIKART',
                        'value' => 12960837,
                      ),
                      1628 => 
                      array (
                        'key' => '123-PBL_SPEED CONTROL',
                        'value' => 12960838,
                      ),
                      1629 => 
                      array (
                        'key' => '124-PBL_SPHEROS',
                        'value' => 12960839,
                      ),
                      1630 => 
                      array (
                        'key' => '125-PBL_STIGA',
                        'value' => 12960840,
                      ),
                      1631 => 
                      array (
                        'key' => '126-PBL_STIHL',
                        'value' => 12960841,
                      ),
                      1632 => 
                      array (
                        'key' => '127-PBL_STILL',
                        'value' => 12960842,
                      ),
                      1633 => 
                      array (
                        'key' => '128-PBL_SUMEIDA',
                        'value' => 12960843,
                      ),
                      1634 => 
                      array (
                        'key' => '129-PBL_TAGEX',
                        'value' => 12960844,
                      ),
                      1635 => 
                      array (
                        'key' => '130-PBL_TATA',
                        'value' => 12960845,
                      ),
                      1636 => 
                      array (
                        'key' => '131-PBL_THERMOKING',
                        'value' => 12960846,
                      ),
                      1637 => 
                      array (
                        'key' => '132-PBL_THYS',
                        'value' => 12960847,
                      ),
                      1638 => 
                      array (
                        'key' => '133-PBL_TIC',
                        'value' => 12960848,
                      ),
                      1639 => 
                      array (
                        'key' => '134-PBL_TKING',
                        'value' => 12960849,
                      ),
                      1640 => 
                      array (
                        'key' => '135-PBL_TRUVOX',
                        'value' => 12960850,
                      ),
                      1641 => 
                      array (
                        'key' => '136-PBL_TUBE WINDER',
                        'value' => 12960851,
                      ),
                      1642 => 
                      array (
                        'key' => '137-PBL_UNIMAQ',
                        'value' => 12960852,
                      ),
                      1643 => 
                      array (
                        'key' => '138-PBL_UNITEC',
                        'value' => 12960853,
                      ),
                      1644 => 
                      array (
                        'key' => '139-PBL_VARIMAX',
                        'value' => 12960854,
                      ),
                      1645 => 
                      array (
                        'key' => '140-PBL_VARIO SIT',
                        'value' => 12960855,
                      ),
                      1646 => 
                      array (
                        'key' => '141-PBL_VIGAN',
                        'value' => 12960856,
                      ),
                      1647 => 
                      array (
                        'key' => '142-PBL_VORWERK',
                        'value' => 12960857,
                      ),
                      1648 => 
                      array (
                        'key' => '143-PBL_VW',
                        'value' => 12960858,
                      ),
                      1649 => 
                      array (
                        'key' => '144-PBL_W+H',
                        'value' => 12960859,
                      ),
                      1650 => 
                      array (
                        'key' => '145-PBL_WALTHER FLENDER',
                        'value' => 12960860,
                      ),
                      1651 => 
                      array (
                        'key' => '146-PBL_WESSEL',
                        'value' => 12960861,
                      ),
                      1652 => 
                      array (
                        'key' => '147-PBL_WESTFALIA',
                        'value' => 12960862,
                      ),
                      1653 => 
                      array (
                        'key' => '148-PBL_WHIRLPOOL',
                        'value' => 12960863,
                      ),
                      1654 => 
                      array (
                        'key' => '149-PBL_WHM',
                        'value' => 12960864,
                      ),
                      1655 => 
                      array (
                        'key' => '150-PBL_WODSCHOW',
                        'value' => 12960865,
                      ),
                      1656 => 
                      array (
                        'key' => '151-PBL_WOLF',
                        'value' => 12960866,
                      ),
                      1657 => 
                      array (
                        'key' => '152-PBL_WYKO',
                        'value' => 12960867,
                      ),
                      1658 => 
                      array (
                        'key' => '153-PBL_ZF',
                        'value' => 12960868,
                      ),
                      1659 => 
                      array (
                        'key' => '154-PBL_AGATECH',
                        'value' => 12960869,
                      ),
                      1660 => 
                      array (
                        'key' => '155-PBL_AGCO',
                        'value' => 12960870,
                      ),
                      1661 => 
                      array (
                        'key' => '156-PBL_Audi',
                        'value' => 12960871,
                      ),
                      1662 => 
                      array (
                        'key' => '157-PBL_AZETA',
                        'value' => 12960872,
                      ),
                      1663 => 
                      array (
                        'key' => '158-PBL_Barne',
                        'value' => 12960873,
                      ),
                      1664 => 
                      array (
                        'key' => '159-PBL_Bergmann',
                        'value' => 12960874,
                      ),
                      1665 => 
                      array (
                        'key' => '160-PBL_Boekholt',
                        'value' => 12960875,
                      ),
                      1666 => 
                      array (
                        'key' => '161-PBL_BUECHI',
                        'value' => 12960876,
                      ),
                      1667 => 
                      array (
                        'key' => '162-PBL_DANA',
                        'value' => 12960877,
                      ),
                      1668 => 
                      array (
                        'key' => '163-PBL_Eriks',
                        'value' => 12960878,
                      ),
                      1669 => 
                      array (
                        'key' => '164-PBL_ETESIA',
                        'value' => 12960879,
                      ),
                      1670 => 
                      array (
                        'key' => '165-PBL_EUROSTEAM',
                        'value' => 12960880,
                      ),
                      1671 => 
                      array (
                        'key' => '166-PBL_FIAT',
                        'value' => 12960881,
                      ),
                      1672 => 
                      array (
                        'key' => '167-PBL_Fischer Panda',
                        'value' => 12960882,
                      ),
                      1673 => 
                      array (
                        'key' => '168-PBL_Gates',
                        'value' => 12960883,
                      ),
                      1674 => 
                      array (
                        'key' => '169-PBL_Heidelberger',
                        'value' => 12960884,
                      ),
                      1675 => 
                      array (
                        'key' => '170-PBL_HOMESPARES',
                        'value' => 12960885,
                      ),
                      1676 => 
                      array (
                        'key' => '171-PBL_Imesa',
                        'value' => 12960886,
                      ),
                      1677 => 
                      array (
                        'key' => '172-PBL_INA',
                        'value' => 12960887,
                      ),
                      1678 => 
                      array (
                        'key' => '173-PBL_Innofit',
                        'value' => 12960888,
                      ),
                      1679 => 
                      array (
                        'key' => '174-PBL_IVECO',
                        'value' => 12960889,
                      ),
                      1680 => 
                      array (
                        'key' => '175-PBL_Ixion',
                        'value' => 12960890,
                      ),
                      1681 => 
                      array (
                        'key' => '176-PBL_Jacob Mueller',
                        'value' => 12960891,
                      ),
                      1682 => 
                      array (
                        'key' => '177-PBL_MAN',
                        'value' => 12960892,
                      ),
                      1683 => 
                      array (
                        'key' => '178-PBL_MB',
                        'value' => 12960893,
                      ),
                      1684 => 
                      array (
                        'key' => '179-PBL_MERITANO',
                        'value' => 12960894,
                      ),
                      1685 => 
                      array (
                        'key' => '180-PBL_MONARK',
                        'value' => 12960895,
                      ),
                      1686 => 
                      array (
                        'key' => '181-PBL_MOTOBEC',
                        'value' => 12960896,
                      ),
                      1687 => 
                      array (
                        'key' => '182-PBL_MOTRIO',
                        'value' => 12960897,
                      ),
                      1688 => 
                      array (
                        'key' => '183-PBL_NASOTO',
                        'value' => 12960898,
                      ),
                      1689 => 
                      array (
                        'key' => '184-PBL_NEW FIT',
                        'value' => 12960899,
                      ),
                      1690 => 
                      array (
                        'key' => '185-PBL_Panasonic',
                        'value' => 12960900,
                      ),
                      1691 => 
                      array (
                        'key' => '186-PBL_RHIAG',
                        'value' => 12960901,
                      ),
                      1692 => 
                      array (
                        'key' => '187-PBL_Rover',
                        'value' => 12960902,
                      ),
                      1693 => 
                      array (
                        'key' => '188-PBL_SAINTGOBAIN',
                        'value' => 12960903,
                      ),
                      1694 => 
                      array (
                        'key' => '189-PBL_SCANIA',
                        'value' => 12960904,
                      ),
                      1695 => 
                      array (
                        'key' => '190-PBL_SKF',
                        'value' => 12960905,
                      ),
                      1696 => 
                      array (
                        'key' => '191-PBL_STOMIL',
                        'value' => 12960906,
                      ),
                      1697 => 
                      array (
                        'key' => '192-PBL_Temsa',
                        'value' => 12960907,
                      ),
                      1698 => 
                      array (
                        'key' => '193-PBL_Triumph',
                        'value' => 12960908,
                      ),
                      1699 => 
                      array (
                        'key' => '194-PBL_TRUETZLER',
                        'value' => 12960909,
                      ),
                      1700 => 
                      array (
                        'key' => '195-PBL_Vertex',
                        'value' => 12960910,
                      ),
                      1701 => 
                      array (
                        'key' => '196-PBL_VOSTERMAN',
                        'value' => 12960911,
                      ),
                      1702 => 
                      array (
                        'key' => '197-PBL_Welltrans',
                        'value' => 12960912,
                      ),
                      1703 => 
                      array (
                        'key' => '198-PBL_FORD',
                        'value' => 12960913,
                      ),
                      1704 => 
                      array (
                        'key' => '199-PBL_Ihlas',
                        'value' => 12960914,
                      ),
                      1705 => 
                      array (
                        'key' => '200-PBL_Metaflex',
                        'value' => 12960915,
                      ),
                      1706 => 
                      array (
                        'key' => '201-PBL_MICO',
                        'value' => 12960916,
                      ),
                      1707 => 
                      array (
                        'key' => '202-PBL_MONOBLOC',
                        'value' => 12960917,
                      ),
                      1708 => 
                      array (
                        'key' => '203-PBL_MTU',
                        'value' => 12960918,
                      ),
                      1709 => 
                      array (
                        'key' => '204-PBL_QBR',
                        'value' => 12960919,
                      ),
                      1710 => 
                      array (
                        'key' => '205-PBL_QUINTON',
                        'value' => 12960920,
                      ),
                      1711 => 
                      array (
                        'key' => '206-PBL_TMC',
                        'value' => 12960921,
                      ),
                      1712 => 
                      array (
                        'key' => '207-PBL_KUKA',
                        'value' => 12960922,
                      ),
                      1713 => 
                      array (
                        'key' => '208-PBL_ROTH',
                        'value' => 12960923,
                      ),
                      1714 => 
                      array (
                        'key' => '209-PBL_Staeublin',
                        'value' => 12960924,
                      ),
                      1715 => 
                      array (
                        'key' => '210-PBL_DOOSAN',
                        'value' => 12960925,
                      ),
                      1716 => 
                      array (
                        'key' => '211-PBL_GETCO',
                        'value' => 12960926,
                      ),
                      1717 => 
                      array (
                        'key' => '212-PBL_ILSBO',
                        'value' => 12960927,
                      ),
                      1718 => 
                      array (
                        'key' => '213-PBL_KS',
                        'value' => 12960928,
                      ),
                      1719 => 
                      array (
                        'key' => '214-PBL_MAGNETI',
                        'value' => 12960929,
                      ),
                      1720 => 
                      array (
                        'key' => '215-PBL_METRIC',
                        'value' => 12960930,
                      ),
                      1721 => 
                      array (
                        'key' => '216-PBL_SATZ',
                        'value' => 12960931,
                      ),
                      1722 => 
                      array (
                        'key' => '217-PBL_SWR',
                        'value' => 12960932,
                      ),
                      1723 => 
                      array (
                        'key' => '218-PBL_TS',
                        'value' => 12960933,
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
