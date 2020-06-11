<?php 

/** 
* Generated at: 2020-05-21T08:16:46+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- B2BAttributeMapping [table]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '28',
   'name' => 'AttributeFacetMaster',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1590041805,
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
         'name' => 'Attributes Mapping',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Table::__set_state(array(
             'fieldtype' => 'table',
             'width' => '',
             'height' => '',
             'cols' => 4,
             'colsFixed' => true,
             'rows' => '',
             'rowsFixed' => false,
             'data' => '',
             'columnConfigActivated' => true,
             'columnConfig' => 
            array (
              0 => 
              array (
                'key' => 'PIM Attribute Name',
                'label' => 'PIM Attribute Name',
              ),
              1 => 
              array (
                'key' => 'PIM Attribute Label',
                'label' => 'PIM Attribute Label',
              ),
              2 => 
              array (
                'key' => 'B2B Attribute Label',
                'label' => 'B2B Attribute Label',
              ),
              3 => 
              array (
                'key' => 'B2B Attribute ID',
                'label' => 'B2B Attribute ID',
              ),
            ),
             'queryColumnType' => 'longtext',
             'columnType' => 'longtext',
             'phpdocType' => 'array',
             'name' => 'B2BAttributeMapping',
             'title' => 'B2B Attribute Mapping',
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
