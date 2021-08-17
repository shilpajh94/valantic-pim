<?php 

/** 
Fields Summary: 
- FabricType [input]
*/ 


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'CSProducts',
      'fieldname' => 'ProductAttributes',
    ),
  ),
   'dao' => NULL,
   'key' => 'ProdAttrSetN',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => 'Product Attributes - N',
   'group' => 'CONVEYOR-BELT-SOLUTION',
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
         'layout' => '',
         'border' => false,
         'name' => 'Layout',
         'type' => NULL,
         'region' => '',
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'fieldtype' => 'fieldset',
             'labelWidth' => 200,
             'name' => 'Layout',
             'type' => NULL,
             'region' => '',
             'title' => 'Set - M',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => true,
             'collapsed' => false,
             'bodyStyle' => 'float:left; margin-right: 20px; clear:left;',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                 'fieldtype' => 'fieldcontainer',
                 'labelWidth' => 200,
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
                     'labelWidth' => 150,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'fieldtype' => 'input',
                         'width' => 200,
                         'defaultValue' => NULL,
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'regex' => '',
                         'unique' => false,
                         'showCharCount' => false,
                         'name' => 'FabricType',
                         'title' => 'Fabric Type',
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
