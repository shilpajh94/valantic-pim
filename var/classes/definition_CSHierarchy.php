<?php 

/** 
* Inheritance: no
* Variants: no


Fields Summary: 
- Name [input]
- Level [select]
- RelatedBricks [multiselect]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'CSHierarchy',
   'name' => 'CSHierarchy',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1625144991,
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'fieldtype' => 'input',
             'width' => NULL,
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
             'invisible' => false,
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
                'key' => 'ProdAttrSetA',
                'value' => 'ProdAttrSetA',
              ),
              1 => 
              array (
                'key' => 'ProdAttrSetB',
                'value' => 'ProdAttrSetB',
              ),
              2 => 
              array (
                'key' => 'ProdAttrSetC',
                'value' => 'ProdAttrSetC',
              ),
              3 => 
              array (
                'key' => 'ProdAttrSetD',
                'value' => 'ProdAttrSetD',
              ),
              4 => 
              array (
                'key' => 'ProdAttrSetE',
                'value' => 'ProdAttrSetE',
              ),
              5 => 
              array (
                'key' => 'ProdAttrSetF',
                'value' => 'ProdAttrSetF',
              ),
              6 => 
              array (
                'key' => 'ProdAttrSetG',
                'value' => 'ProdAttrSetG',
              ),
              7 => 
              array (
                'key' => 'ProdAttrSetH',
                'value' => 'ProdAttrSetH',
              ),
              8 => 
              array (
                'key' => 'ProdAttrSetI',
                'value' => 'ProdAttrSetI',
              ),
              9 => 
              array (
                'key' => 'ProdAttrSetJ',
                'value' => 'ProdAttrSetJ',
              ),
              10 => 
              array (
                'key' => 'ProdAttrSetK',
                'value' => 'ProdAttrSetK',
              ),
              11 => 
              array (
                'key' => 'ProdAttrSetL',
                'value' => 'ProdAttrSetL',
              ),
              12 => 
              array (
                'key' => 'ProdAttrSetM',
                'value' => 'ProdAttrSetM',
              ),
              13 => 
              array (
                'key' => 'ProdAttrSetN',
                'value' => 'ProdAttrSetN',
              ),
              14 => 
              array (
                'key' => 'ProdAttrSetO',
                'value' => 'ProdAttrSetO',
              ),
              15 => 
              array (
                'key' => 'ProdAttrSetP',
                'value' => 'ProdAttrSetP',
              ),
              16 => 
              array (
                'key' => 'ProdAttrSetQ',
                'value' => 'ProdAttrSetQ',
              ),
              17 => 
              array (
                'key' => 'ProdAttrSetR',
                'value' => 'ProdAttrSetR',
              ),
              18 => 
              array (
                'key' => 'ProdAttrSetS',
                'value' => 'ProdAttrSetS',
              ),
            ),
             'width' => '',
             'height' => 200,
             'maxItems' => '',
             'renderType' => 'list',
             'optionsProviderClass' => 'AppBundle\\CSOptionProvider\\CSObjectBricks',
             'optionsProviderData' => '',
             'queryColumnType' => 'text',
             'columnType' => 'text',
             'phpdocType' => 'array',
             'dynamicOptions' => false,
             'name' => 'RelatedBricks',
             'title' => 'RelatedBricks',
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
