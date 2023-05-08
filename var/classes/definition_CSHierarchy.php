<?php 

/** 
* Generated at: 2023-04-27T14:46:43+05:30
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
   'modificationDate' => 1682587003,
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
             'maxTabs' => 20,
             'labelWidth' => NULL,
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
                'key' => 'ProdDimensions',
                'value' => 'ProdDimensions',
              ),
              9 => 
              array (
                'key' => 'ProdSpec',
                'value' => 'ProdSpec',
              ),
              10 => 
              array (
                'key' => 'SalesOrga',
                'value' => 'SalesOrga',
              ),
              11 => 
              array (
                'key' => 'SpliceData',
                'value' => 'SpliceData',
              ),
              12 => 
              array (
                'key' => 'TensionElevatorBelt',
                'value' => 'TensionElevatorBelt',
              ),
              13 => 
              array (
                'key' => 'TypeOfIdler',
                'value' => 'TypeOfIdler',
              ),
              14 => 
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
