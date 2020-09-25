<?php 

/** 
* Generated at: 2020-09-25T14:58:37+02:00
* IP: 127.0.0.1


Fields Summary: 
- material [multiselect]
- PTGApplications [multiselect]
*/ 


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'Product',
      'fieldname' => 'Base',
    ),
  ),
   'dao' => NULL,
   'key' => 'PTGBase',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => '',
   'group' => 'PTG',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
             'fieldtype' => 'multiselect',
             'options' => 
            array (
              0 => 
              array (
                'key' => 'POLYBUTADIENE',
                'value' => 1831308,
              ),
              1 => 
              array (
                'key' => 'STYRENE BUTADIENE',
                'value' => 1831309,
              ),
              2 => 
              array (
                'key' => 'EPDM',
                'value' => 1831310,
              ),
              3 => 
              array (
                'key' => 'CHLOROPRENE',
                'value' => 1831311,
              ),
              4 => 
              array (
                'key' => 'HNBR',
                'value' => 1831312,
              ),
              5 => 
              array (
                'key' => 'POLYURETHANE',
                'value' => 1831313,
              ),
              6 => 
              array (
                'key' => 'CHLOROPRENE W/FIBER',
                'value' => 1831314,
              ),
            ),
             'width' => 300,
             'height' => '',
             'maxItems' => 1,
             'renderType' => 'tags',
             'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
             'optionsProviderData' => 'PTG',
             'queryColumnType' => 'text',
             'columnType' => 'text',
             'phpdocType' => 'array',
             'dynamicOptions' => false,
             'name' => 'material',
             'title' => 'Material',
             'tooltip' => '
',
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
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
             'fieldtype' => 'multiselect',
             'options' => 
            array (
            ),
             'width' => 300,
             'height' => '',
             'maxItems' => 20,
             'renderType' => 'tags',
             'optionsProviderClass' => 'AppBundle\\OptionProvider\\ApplicationOptionsProvider',
             'optionsProviderData' => 'PTG',
             'queryColumnType' => 'text',
             'columnType' => 'text',
             'phpdocType' => 'array',
             'dynamicOptions' => false,
             'name' => 'PTGApplications',
             'title' => 'Applications',
             'tooltip' => '
',
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
));
