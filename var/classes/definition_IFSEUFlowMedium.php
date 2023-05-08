<?php 

/** 
* Generated at: 2023-04-28T12:19:57+05:30
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- localizedfields [localizedfields]
-- FlowMedium [input]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'IFSEUFlowMedium',
   'name' => 'IFSEUFlowMedium',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1682664597,
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
         'labelWidth' => 200,
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
                 'width' => 400,
                 'defaultValue' => NULL,
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'regex' => '',
                 'unique' => false,
                 'showCharCount' => false,
                 'name' => 'FlowMedium',
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
                 'defaultValueGenerator' => '',
              )),
            ),
             'name' => 'localizedfields',
             'region' => NULL,
             'layout' => NULL,
             'title' => '',
             'width' => '',
             'height' => '',
             'maxTabs' => 20,
             'labelWidth' => 200,
             'border' => false,
             'provideSplitView' => false,
             'tabPosition' => NULL,
             'hideLabelsWhenTabsReached' => NULL,
             'referencedFields' => 
            array (
            ),
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => NULL,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => true,
             'visibleSearch' => true,
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
   'group' => 'IFSEU_MasterData',
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
