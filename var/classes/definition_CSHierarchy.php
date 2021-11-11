<?php 

/** 
* Generated at: 2021-10-29T14:29:08+05:30
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: ::1


Fields Summary: 
- Name [input]
- Level [select]
- RelatedBricks [multiselect]
- ParentBricks [multiselect]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'CSHierarchy',
   'name' => 'CSHierarchy',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1635497948,
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
                'key' => 'ProdAttrSetAA',
                'value' => 'ProdAttrSetAA',
              ),
              1 => 
              array (
                'key' => 'ProdAttrSetAB',
                'value' => 'ProdAttrSetAB',
              ),
              2 => 
              array (
                'key' => 'ProdAttrSetAC',
                'value' => 'ProdAttrSetAC',
              ),
              3 => 
              array (
                'key' => 'ProdAttrSetAD',
                'value' => 'ProdAttrSetAD',
              ),
              4 => 
              array (
                'key' => 'ProdAttrSetAE',
                'value' => 'ProdAttrSetAE',
              ),
              5 => 
              array (
                'key' => 'ProdAttrSetAF',
                'value' => 'ProdAttrSetAF',
              ),
              6 => 
              array (
                'key' => 'ProdAttrSetAG',
                'value' => 'ProdAttrSetAG',
              ),
              7 => 
              array (
                'key' => 'ProdAttrSetAH',
                'value' => 'ProdAttrSetAH',
              ),
              8 => 
              array (
                'key' => 'ProdAttrSetAI',
                'value' => 'ProdAttrSetAI',
              ),
              9 => 
              array (
                'key' => 'ProdAttrSetA',
                'value' => 'ProdAttrSetA',
              ),
              10 => 
              array (
                'key' => 'ProdAttrSetC',
                'value' => 'ProdAttrSetC',
              ),
              11 => 
              array (
                'key' => 'ProdAttrSetD',
                'value' => 'ProdAttrSetD',
              ),
              12 => 
              array (
                'key' => 'ProdAttrSetE',
                'value' => 'ProdAttrSetE',
              ),
              13 => 
              array (
                'key' => 'ProdAttrSetF',
                'value' => 'ProdAttrSetF',
              ),
              14 => 
              array (
                'key' => 'ProdAttrSetG',
                'value' => 'ProdAttrSetG',
              ),
              15 => 
              array (
                'key' => 'ProdAttrSetH',
                'value' => 'ProdAttrSetH',
              ),
              16 => 
              array (
                'key' => 'ProdAttrSetI',
                'value' => 'ProdAttrSetI',
              ),
              17 => 
              array (
                'key' => 'ProdAttrSetJ',
                'value' => 'ProdAttrSetJ',
              ),
              18 => 
              array (
                'key' => 'ProdAttrSetK',
                'value' => 'ProdAttrSetK',
              ),
              19 => 
              array (
                'key' => 'ProdAttrSetL',
                'value' => 'ProdAttrSetL',
              ),
              20 => 
              array (
                'key' => 'ProdAttrSetM',
                'value' => 'ProdAttrSetM',
              ),
              21 => 
              array (
                'key' => 'ProdAttrSetN',
                'value' => 'ProdAttrSetN',
              ),
              22 => 
              array (
                'key' => 'ProdAttrSetO',
                'value' => 'ProdAttrSetO',
              ),
              23 => 
              array (
                'key' => 'ProdAttrSetP',
                'value' => 'ProdAttrSetP',
              ),
              24 => 
              array (
                'key' => 'ProdAttrSetQ',
                'value' => 'ProdAttrSetQ',
              ),
              25 => 
              array (
                'key' => 'ProdAttrSetR',
                'value' => 'ProdAttrSetR',
              ),
              26 => 
              array (
                'key' => 'ProdAttrSetS',
                'value' => 'ProdAttrSetS',
              ),
              27 => 
              array (
                'key' => 'ProdAttrSetT',
                'value' => 'ProdAttrSetT',
              ),
              28 => 
              array (
                'key' => 'ProdAttrSetU',
                'value' => 'ProdAttrSetU',
              ),
              29 => 
              array (
                'key' => 'ProdAttrSetV',
                'value' => 'ProdAttrSetV',
              ),
              30 => 
              array (
                'key' => 'ProdAttrSetW',
                'value' => 'ProdAttrSetW',
              ),
              31 => 
              array (
                'key' => 'ProdAttrSetX',
                'value' => 'ProdAttrSetX',
              ),
              32 => 
              array (
                'key' => 'ProdAttrSetY',
                'value' => 'ProdAttrSetY',
              ),
              33 => 
              array (
                'key' => 'ProdAttrSetZ',
                'value' => 'ProdAttrSetZ',
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
