<?php 

/** 
* Generated at: 2020-06-29T10:15:11+02:00
* IP: 127.0.0.1


Fields Summary: 
- material [multiselect]
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
                'key' => 'Chloroprene',
                'value' => 2762,
              ),
              1 => 
              array (
                'key' => 'EPDM',
                'value' => 2763,
              ),
              2 => 
              array (
                'key' => 'Polybutadiene (PBD)',
                'value' => 2764,
              ),
              3 => 
              array (
                'key' => 'Polyurethane',
                'value' => 2765,
              ),
              4 => 
              array (
                'key' => 'TPU (Elatech belts)',
                'value' => 2766,
              ),
              5 => 
              array (
                'key' => 'Styrene Butadiene (SBR)',
                'value' => 2767,
              ),
              6 => 
              array (
                'key' => 'HNBR',
                'value' => 2768,
              ),
              7 => 
              array (
                'key' => 'Polymeric Blend (Natural Rubber with SBR most of the time)',
                'value' => 2769,
              ),
              8 => 
              array (
                'key' => 'Nylon – Only as a fabric',
                'value' => 2770,
              ),
              9 => 
              array (
                'key' => 'Stainless Steel',
                'value' => 2771,
              ),
              10 => 
              array (
                'key' => 'Steel',
                'value' => 2772,
              ),
              11 => 
              array (
                'key' => 'Cast Iron',
                'value' => 2773,
              ),
              12 => 
              array (
                'key' => 'Aluminum',
                'value' => 2774,
              ),
              13 => 
              array (
                'key' => 'UHMW',
                'value' => 2775,
              ),
              14 => 
              array (
                'key' => 'Delrin',
                'value' => 2776,
              ),
              15 => 
              array (
                'key' => 'Chloroprene w/Fiber (CR)',
                'value' => 2777,
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
        ),
         'locked' => false,
         'icon' => '',
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
));
