<?php 

/** 
* Inheritance: no
* Variants: no


Fields Summary: 
- objbrick [objectbricks]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '38',
   'name' => 'TestClass',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1626931088,
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
             'fieldtype' => 'objectbricks',
             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Objectbrick',
             'allowedTypes' => 
            array (
              0 => 'ProdAttrSetH',
              1 => 'ProdAttrSetI',
              2 => 'ProdAttrSetJ',
              3 => 'ProdAttrSetK',
              4 => 'ProdAttrSetM',
              5 => 'ProdAttrSetQ',
              6 => 'ProdAttrSetS',
              7 => 'ProdAttrSetA',
              8 => 'ProdAttrSetB',
              9 => 'ProdAttrSetC',
              10 => 'ProdAttrSetD',
              11 => 'ProdAttrSetE',
              12 => 'ProdAttrSetF',
              13 => 'ProdAttrSetG',
              14 => 'ProdAttrSetL',
              15 => 'ProdAttrSetN',
              16 => 'ProdAttrSetO',
              17 => 'ProdAttrSetP',
              18 => 'ProdAttrSetR',
              19 => 'ProdAttrSetT',
            ),
             'maxItems' => '',
             'border' => false,
             'name' => 'objbrick',
             'title' => 'objbrick',
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
   'group' => '',
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
