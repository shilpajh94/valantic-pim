<?php 

/** 
* Generated at: 2021-11-22T13:55:48+01:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- localizedfields [localizedfields]
-- Name [input]
- Level [select]
- RelatedBricks [multiselect]
- ParentBricks [multiselect]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'CSHierarchy',
   'name' => 'CSHierarchy',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1637585748,
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
         'labelWidth' => 120,
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
             'fieldtype' => 'localizedfields',
             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
             'childs' => 
            array (
              0 => 
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
                 'name' => 'Name',
                 'title' => 'Name',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => 'margin-left:7px;',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'defaultValueGenerator' => '',
              )),
            ),
             'name' => 'localizedfields',
             'region' => NULL,
             'layout' => NULL,
             'title' => '',
             'width' => '',
             'height' => '',
             'maxTabs' => NULL,
             'labelWidth' => NULL,
             'border' => false,
             'provideSplitView' => false,
             'tabPosition' => NULL,
             'hideLabelsWhenTabsReached' => NULL,
             'referencedFields' => 
            array (
            ),
             'tooltip' => NULL,
             'mandatory' => NULL,
             'noteditable' => NULL,
             'index' => NULL,
             'locked' => NULL,
             'style' => NULL,
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => true,
             'visibleSearch' => true,
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'fieldtype' => 'select',
             'options' => 
            array (
              0 => 
              array (
                'key' => 'Level 5',
                'value' => 'Level 5',
              ),
              1 => 
              array (
                'key' => 'Level 4',
                'value' => 'Level 4',
              ),
              2 => 
              array (
                'key' => 'Level 3',
                'value' => 'Level 3',
              ),
              3 => 
              array (
                'key' => 'Level 2',
                'value' => 'Level 2',
              ),
              4 => 
              array (
                'key' => 'Level 1',
                'value' => 'Level 1',
              ),
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
             'name' => 'Level',
             'title' => 'Level',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => true,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'defaultValueGenerator' => '',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
             'fieldtype' => 'multiselect',
             'options' => 
            array (
              0 => 
              array (
                'key' => 'BeltData',
                'value' => 'BeltData',
              ),
              1 => 
              array (
                'key' => 'DigitalSolution',
                'value' => 'DigitalSolution',
              ),
              2 => 
              array (
                'key' => 'Functionality',
                'value' => 'Functionality',
              ),
              3 => 
              array (
                'key' => 'LoadSupport',
                'value' => 'LoadSupport',
              ),
              4 => 
              array (
                'key' => 'Material',
                'value' => 'Material',
              ),
              5 => 
              array (
                'key' => 'OptionsStandards',
                'value' => 'OptionsStandards',
              ),
              6 => 
              array (
                'key' => 'Performance1',
                'value' => 'Performance1',
              ),
              7 => 
              array (
                'key' => 'Performance2',
                'value' => 'Performance2',
              ),
              8 => 
              array (
                'key' => 'ProdAttrSetAA',
                'value' => 'ProdAttrSetAA',
              ),
              9 => 
              array (
                'key' => 'ProdAttrSetAB',
                'value' => 'ProdAttrSetAB',
              ),
              10 => 
              array (
                'key' => 'ProdAttrSetAC',
                'value' => 'ProdAttrSetAC',
              ),
              11 => 
              array (
                'key' => 'ProdAttrSetAD',
                'value' => 'ProdAttrSetAD',
              ),
              12 => 
              array (
                'key' => 'ProdAttrSetAE',
                'value' => 'ProdAttrSetAE',
              ),
              13 => 
              array (
                'key' => 'ProdAttrSetAF',
                'value' => 'ProdAttrSetAF',
              ),
              14 => 
              array (
                'key' => 'ProdAttrSetAG',
                'value' => 'ProdAttrSetAG',
              ),
              15 => 
              array (
                'key' => 'ProdAttrSetAH',
                'value' => 'ProdAttrSetAH',
              ),
              16 => 
              array (
                'key' => 'ProdAttrSetAI',
                'value' => 'ProdAttrSetAI',
              ),
              17 => 
              array (
                'key' => 'ProdAttrSetA',
                'value' => 'ProdAttrSetA',
              ),
              18 => 
              array (
                'key' => 'ProdAttrSetC',
                'value' => 'ProdAttrSetC',
              ),
              19 => 
              array (
                'key' => 'ProdAttrSetD',
                'value' => 'ProdAttrSetD',
              ),
              20 => 
              array (
                'key' => 'ProdAttrSetE',
                'value' => 'ProdAttrSetE',
              ),
              21 => 
              array (
                'key' => 'ProdAttrSetF',
                'value' => 'ProdAttrSetF',
              ),
              22 => 
              array (
                'key' => 'ProdAttrSetG',
                'value' => 'ProdAttrSetG',
              ),
              23 => 
              array (
                'key' => 'ProdAttrSetH',
                'value' => 'ProdAttrSetH',
              ),
              24 => 
              array (
                'key' => 'ProdAttrSetI',
                'value' => 'ProdAttrSetI',
              ),
              25 => 
              array (
                'key' => 'ProdAttrSetJ',
                'value' => 'ProdAttrSetJ',
              ),
              26 => 
              array (
                'key' => 'ProdAttrSetK',
                'value' => 'ProdAttrSetK',
              ),
              27 => 
              array (
                'key' => 'ProdAttrSetL',
                'value' => 'ProdAttrSetL',
              ),
              28 => 
              array (
                'key' => 'ProdAttrSetM',
                'value' => 'ProdAttrSetM',
              ),
              29 => 
              array (
                'key' => 'ProdAttrSetN',
                'value' => 'ProdAttrSetN',
              ),
              30 => 
              array (
                'key' => 'ProdAttrSetO',
                'value' => 'ProdAttrSetO',
              ),
              31 => 
              array (
                'key' => 'ProdAttrSetP',
                'value' => 'ProdAttrSetP',
              ),
              32 => 
              array (
                'key' => 'ProdAttrSetQ',
                'value' => 'ProdAttrSetQ',
              ),
              33 => 
              array (
                'key' => 'ProdAttrSetR',
                'value' => 'ProdAttrSetR',
              ),
              34 => 
              array (
                'key' => 'ProdAttrSetS',
                'value' => 'ProdAttrSetS',
              ),
              35 => 
              array (
                'key' => 'ProdAttrSetT',
                'value' => 'ProdAttrSetT',
              ),
              36 => 
              array (
                'key' => 'ProdAttrSetU',
                'value' => 'ProdAttrSetU',
              ),
              37 => 
              array (
                'key' => 'ProdAttrSetV',
                'value' => 'ProdAttrSetV',
              ),
              38 => 
              array (
                'key' => 'ProdAttrSetW',
                'value' => 'ProdAttrSetW',
              ),
              39 => 
              array (
                'key' => 'ProdAttrSetX',
                'value' => 'ProdAttrSetX',
              ),
              40 => 
              array (
                'key' => 'ProdAttrSetY',
                'value' => 'ProdAttrSetY',
              ),
              41 => 
              array (
                'key' => 'ProdAttrSetZ',
                'value' => 'ProdAttrSetZ',
              ),
              42 => 
              array (
                'key' => 'ProdDimensions',
                'value' => 'ProdDimensions',
              ),
              43 => 
              array (
                'key' => 'ProdSpec',
                'value' => 'ProdSpec',
              ),
              44 => 
              array (
                'key' => 'SalesOrga',
                'value' => 'SalesOrga',
              ),
              45 => 
              array (
                'key' => 'SpliceData',
                'value' => 'SpliceData',
              ),
              46 => 
              array (
                'key' => 'TensionElevatorBelt',
                'value' => 'TensionElevatorBelt',
              ),
              47 => 
              array (
                'key' => 'TypeOfIdler',
                'value' => 'TypeOfIdler',
              ),
              48 => 
              array (
                'key' => 'WidthLength',
                'value' => 'WidthLength',
              ),
            ),
             'width' => '',
             'height' => 100,
             'maxItems' => '',
             'renderType' => 'tags',
             'optionsProviderClass' => 'ContitechCS\\ProductBundle\\OptionProvider\\CSObjectBricks',
             'optionsProviderData' => '',
             'queryColumnType' => 'text',
             'columnType' => 'text',
             'phpdocType' => 'array',
             'dynamicOptions' => false,
             'name' => 'RelatedBricks',
             'title' => 'Related Bricks',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
             'fieldtype' => 'multiselect',
             'options' => 
            array (
            ),
             'width' => '',
             'height' => '',
             'maxItems' => '',
             'renderType' => 'tags',
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
             'queryColumnType' => 'text',
             'columnType' => 'text',
             'phpdocType' => 'array',
             'dynamicOptions' => false,
             'name' => 'ParentBricks',
             'title' => 'Parent Bricks',
             'tooltip' => 'Parent bricks will be mapped to the child level automatically.',
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
   'group' => 'Conveyor Solution',
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
