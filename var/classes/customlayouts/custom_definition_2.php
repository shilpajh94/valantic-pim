<?php 

/** 
* Generated at: 2020-08-19T12:21:33+02:00
* Changed by: system (0)
* IP: 127.0.0.1
*/ 


return Pimcore\Model\DataObject\ClassDefinition\CustomLayout::__set_state(array(
   'id' => '2',
   'name' => 'Skeleton',
   'description' => '',
   'creationDate' => 1581513091,
   'modificationDate' => 1597832493,
   'userOwner' => 2,
   'userModification' => 0,
   'classId' => '1',
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
         'fieldtype' => 'tabpanel',
         'border' => false,
         'tabPosition' => 'top',
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Base Data',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Base Data',
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
                 'fieldtype' => 'tabpanel',
                 'border' => false,
                 'tabPosition' => NULL,
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'SAP Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Imported From SAP',
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => 'Imported From SAP',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Global Data Points',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
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
                                 'labelWidth' => 200,
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
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 255,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'articleNumber',
                                     'title' => 'SAP Code / Material Number',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => true,
                                     'locked' => false,
                                     'style' => '',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => true,
                                     'visibleSearch' => true,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
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
                                     'name' => 'eanUpc',
                                     'title' => 'EAN / UPC',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                     'fieldtype' => 'manyToOneRelation',
                                     'width' => 300,
                                     'assetUploadPath' => '',
                                     'relationType' => true,
                                     'queryColumnType' => 
                                    array (
                                      'id' => 'int(11)',
                                      'type' => 'enum(\'document\',\'asset\',\'object\')',
                                    ),
                                     'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                                     'objectsAllowed' => true,
                                     'assetsAllowed' => false,
                                     'assetTypes' => 
                                    array (
                                    ),
                                     'documentsAllowed' => false,
                                     'documentTypes' => 
                                    array (
                                    ),
                                     'classes' => 
                                    array (
                                      0 => 
                                      array (
                                        'classes' => 'MaterialGroup',
                                      ),
                                    ),
                                     'pathFormatterClass' => '',
                                     'name' => 'materialGroup',
                                     'title' => 'Material Group',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => '',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                  )),
                                  3 => 
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
                                     'name' => 'baseUOM',
                                     'title' => 'Base UOM',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'grossWeight',
                                     'title' => 'Gross Weight',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'netWeight',
                                     'title' => 'Net Weight',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'LB',
                                        'value' => 'LB',
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'G',
                                        'value' => 'G',
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'KG',
                                        'value' => 'KG',
                                      ),
                                    ),
                                     'width' => 300,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'weightUnit',
                                     'title' => 'Weight Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  7 => 
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
                                     'name' => 'industryStandard',
                                     'title' => 'Industry Standard #',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  8 => 
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
                                     'name' => 'stccCode',
                                     'title' => 'STCC Code',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 200,
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
                                 'bodyStyle' => 'margin-left: 20px;',
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
                                     'name' => 'oldMaterialCode',
                                     'title' => 'Old Material Code',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
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
                                     'name' => 'manufacturer',
                                     'title' => 'Manufacturer',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
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
                                     'name' => 'manufacturerPartNumber',
                                     'title' => 'Manufacturer Part Number',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                                     'fieldtype' => 'localizedfields',
                                     'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                                     'childs' => 
                                    array (
                                      0 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                         'fieldtype' => 'textarea',
                                         'width' => 370,
                                         'height' => 100,
                                         'maxLength' => NULL,
                                         'showCharCount' => false,
                                         'excludeFromSearchIndex' => false,
                                         'queryColumnType' => 'longtext',
                                         'columnType' => 'longtext',
                                         'phpdocType' => 'string',
                                         'name' => 'sapDescription',
                                         'title' => 'SAP Description',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => true,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-left: 20px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                    ),
                                     'name' => 'localizedfields',
                                     'region' => NULL,
                                     'layout' => NULL,
                                     'title' => '',
                                     'width' => 600,
                                     'height' => '',
                                     'maxTabs' => NULL,
                                     'labelWidth' => NULL,
                                     'border' => false,
                                     'provideSplitView' => false,
                                     'tabPosition' => NULL,
                                     'hideLabelsWhenTabsReached' => -1,
                                     'referencedFields' => 
                                    array (
                                    ),
                                     'fieldDefinitionsCache' => NULL,
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
                              )),
                            ),
                             'locked' => false,
                          )),
                        ),
                         'locked' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 200,
                         'name' => 'Configurations',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Configurations',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => true,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                             'fieldtype' => 'booleanSelect',
                             'yesLabel' => 'Yes',
                             'noLabel' => 'No',
                             'emptyLabel' => 'Empty',
                             'options' => 
                            array (
                              0 => 
                              array (
                                'key' => 'Empty',
                                'value' => 0,
                              ),
                              1 => 
                              array (
                                'key' => 'Yes',
                                'value' => 1,
                              ),
                              2 => 
                              array (
                                'key' => 'No',
                                'value' => -1,
                              ),
                            ),
                             'width' => 100,
                             'queryColumnType' => 'tinyint(1) null',
                             'columnType' => 'tinyint(1) null',
                             'phpdocType' => 'boolean',
                             'name' => 'deletedFlagAtClientLevel',
                             'title' => 'Deleted / Obsoleted Flag Client Level',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => true,
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
                          Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                             'fieldtype' => 'checkbox',
                             'defaultValue' => NULL,
                             'queryColumnType' => 'tinyint(1)',
                             'columnType' => 'tinyint(1)',
                             'phpdocType' => 'boolean',
                             'name' => 'OutsidePurchaseFlag',
                             'title' => 'Outside Purchase Indicator / Procurement Type',
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/overlay-download.svg',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'PIM Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Enriched In PIM',
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => ' Enriched In PIM',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Additional Information',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
                             'layout' => 'hbox',
                             'fieldLabel' => '',
                             'name' => 'Field Container',
                             'type' => NULL,
                             'region' => NULL,
                             'title' => 'ReadOnly In PIM',
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
                                 'labelWidth' => 210,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => '20R3D1 HEATER HOSE',
                                        'value' => 1829378,
                                      ),
                                      1 => 
                                      array (
                                        'key' => '20R3D2 HEATER',
                                        'value' => 1829349,
                                      ),
                                      2 => 
                                      array (
                                        'key' => '3-M 78-8007-5633-6 BLUE',
                                        'value' => 1829116,
                                      ),
                                      3 => 
                                      array (
                                        'key' => '3-M 78-8007-5637-7',
                                        'value' => 1829150,
                                      ),
                                      4 => 
                                      array (
                                        'key' => '3-M 78-8008-5757-1',
                                        'value' => 1829144,
                                      ),
                                      5 => 
                                      array (
                                        'key' => '556-50A',
                                        'value' => 1829102,
                                      ),
                                      6 => 
                                      array (
                                        'key' => 'A&H',
                                        'value' => 1829180,
                                      ),
                                      7 => 
                                      array (
                                        'key' => 'A&M',
                                        'value' => 1829168,
                                      ),
                                      8 => 
                                      array (
                                        'key' => 'A.R. THOMSON',
                                        'value' => 1645,
                                      ),
                                      9 => 
                                      array (
                                        'key' => 'ABBOTT',
                                        'value' => 1646,
                                      ),
                                      10 => 
                                      array (
                                        'key' => 'ABBOTT 1025 SERIES',
                                        'value' => 1647,
                                      ),
                                      11 => 
                                      array (
                                        'key' => 'ABBOTT CHEM GROUT',
                                        'value' => 1648,
                                      ),
                                      12 => 
                                      array (
                                        'key' => 'ABBOTT GOODYEAR GRIP',
                                        'value' => 1829149,
                                      ),
                                      13 => 
                                      array (
                                        'key' => 'ABBOTT INLET HOSE',
                                        'value' => 1829145,
                                      ),
                                      14 => 
                                      array (
                                        'key' => 'ABS BLAST',
                                        'value' => 1649,
                                      ),
                                      15 => 
                                      array (
                                        'key' => 'ACCORD TANK CLEANING',
                                        'value' => 1650,
                                      ),
                                      16 => 
                                      array (
                                        'key' => 'ACE BREWLINE',
                                        'value' => 1651,
                                      ),
                                      17 => 
                                      array (
                                        'key' => 'ACE FOOD',
                                        'value' => 1652,
                                      ),
                                      18 => 
                                      array (
                                        'key' => 'ACE FOOD DISCHARGE',
                                        'value' => 1653,
                                      ),
                                      19 => 
                                      array (
                                        'key' => 'ACE GRAY FOOD',
                                        'value' => 1654,
                                      ),
                                      20 => 
                                      array (
                                        'key' => 'ACE RCR FLEXRITE',
                                        'value' => 1655,
                                      ),
                                      21 => 
                                      array (
                                        'key' => 'ACE RCT FLEXRITE',
                                        'value' => 1656,
                                      ),
                                      22 => 
                                      array (
                                        'key' => 'ACE RDC FOOD',
                                        'value' => 1657,
                                      ),
                                      23 => 
                                      array (
                                        'key' => 'ACE RSD FOOD',
                                        'value' => 1658,
                                      ),
                                      24 => 
                                      array (
                                        'key' => 'AD SEALING HYDROCARBON DRAIN',
                                        'value' => 1659,
                                      ),
                                      25 => 
                                      array (
                                        'key' => 'ADVANTAGE',
                                        'value' => 1660,
                                      ),
                                      26 => 
                                      array (
                                        'key' => 'AEROPAL',
                                        'value' => 1661,
                                      ),
                                      27 => 
                                      array (
                                        'key' => 'AEROPAL BCT',
                                        'value' => 1829413,
                                      ),
                                      28 => 
                                      array (
                                        'key' => 'AEROPAL C',
                                        'value' => 1829408,
                                      ),
                                      29 => 
                                      array (
                                        'key' => 'AEROPAL CT',
                                        'value' => 1829410,
                                      ),
                                      30 => 
                                      array (
                                        'key' => 'AEROPAL E',
                                        'value' => 1829409,
                                      ),
                                      31 => 
                                      array (
                                        'key' => 'AEROPAL ECT',
                                        'value' => 1829411,
                                      ),
                                      32 => 
                                      array (
                                        'key' => 'AEROPAL FCT',
                                        'value' => 1829412,
                                      ),
                                      33 => 
                                      array (
                                        'key' => 'AG SPRAY',
                                        'value' => 1662,
                                      ),
                                      34 => 
                                      array (
                                        'key' => 'AGCHEM',
                                        'value' => 1663,
                                      ),
                                      35 => 
                                      array (
                                        'key' => 'AGCHEM S&D',
                                        'value' => 1664,
                                      ),
                                      36 => 
                                      array (
                                        'key' => 'AGGIE GAS',
                                        'value' => 1665,
                                      ),
                                      37 => 
                                      array (
                                        'key' => 'AGRI-FLEX',
                                        'value' => 1666,
                                      ),
                                      38 => 
                                      array (
                                        'key' => 'AHR WATER S&D',
                                        'value' => 1667,
                                      ),
                                      39 => 
                                      array (
                                        'key' => 'AIR & MULTIPURPOSE',
                                        'value' => 1829206,
                                      ),
                                      40 => 
                                      array (
                                        'key' => 'AIR 1000',
                                        'value' => 1668,
                                      ),
                                      41 => 
                                      array (
                                        'key' => 'AIR 250',
                                        'value' => 1669,
                                      ),
                                      42 => 
                                      array (
                                        'key' => 'AIR 300',
                                        'value' => 1670,
                                      ),
                                      43 => 
                                      array (
                                        'key' => 'AIR 300 HD',
                                        'value' => 1671,
                                      ),
                                      44 => 
                                      array (
                                        'key' => 'AIR 400',
                                        'value' => 1672,
                                      ),
                                      45 => 
                                      array (
                                        'key' => 'AIR BREATHING HOSE',
                                        'value' => 1673,
                                      ),
                                      46 => 
                                      array (
                                        'key' => 'AIR PSNS',
                                        'value' => 1674,
                                      ),
                                      47 => 
                                      array (
                                        'key' => 'AIR PUMP GUNITE',
                                        'value' => 1675,
                                      ),
                                      48 => 
                                      array (
                                        'key' => 'AIR TRIX',
                                        'value' => 1676,
                                      ),
                                      49 => 
                                      array (
                                        'key' => 'AIR-A-PLANE GLYCOL',
                                        'value' => 1677,
                                      ),
                                      50 => 
                                      array (
                                        'key' => 'AIR-WATER 400',
                                        'value' => 1686,
                                      ),
                                      51 => 
                                      array (
                                        'key' => 'AIRCRAFT FUELING',
                                        'value' => 1678,
                                      ),
                                      52 => 
                                      array (
                                        'key' => 'AIRGAS FRONTIER',
                                        'value' => 1679,
                                      ),
                                      53 => 
                                      array (
                                        'key' => 'AIRGAS GRADE R',
                                        'value' => 1680,
                                      ),
                                      54 => 
                                      array (
                                        'key' => 'AIRGAS GRADE RM',
                                        'value' => 1681,
                                      ),
                                      55 => 
                                      array (
                                        'key' => 'AIRGAS GRADE T',
                                        'value' => 1682,
                                      ),
                                      56 => 
                                      array (
                                        'key' => 'AIRMAX FLEXIMAX',
                                        'value' => 1683,
                                      ),
                                      57 => 
                                      array (
                                        'key' => 'AIRMAX PROMAX',
                                        'value' => 1684,
                                      ),
                                      58 => 
                                      array (
                                        'key' => 'AIRMAX SUPERMAX',
                                        'value' => 1685,
                                      ),
                                      59 => 
                                      array (
                                        'key' => 'AIRSER',
                                        'value' => 1829328,
                                      ),
                                      60 => 
                                      array (
                                        'key' => 'AJAX',
                                        'value' => 1687,
                                      ),
                                      61 => 
                                      array (
                                        'key' => 'ALASKA RUBBER',
                                        'value' => 1688,
                                      ),
                                      62 => 
                                      array (
                                        'key' => 'ALCAN MUD STACKING',
                                        'value' => 1689,
                                      ),
                                      63 => 
                                      array (
                                        'key' => 'ALCOA POTROOM',
                                        'value' => 1690,
                                      ),
                                      64 => 
                                      array (
                                        'key' => 'ALLCRETE TEXTILE',
                                        'value' => 1691,
                                      ),
                                      65 => 
                                      array (
                                        'key' => 'ALLCRETE WIRE',
                                        'value' => 1692,
                                      ),
                                      66 => 
                                      array (
                                        'key' => 'ALLENT GUNITE',
                                        'value' => 1693,
                                      ),
                                      67 => 
                                      array (
                                        'key' => 'ALLENT REFRACTORY',
                                        'value' => 1694,
                                      ),
                                      68 => 
                                      array (
                                        'key' => 'AMEREX 07648 FIREXB',
                                        'value' => 1829096,
                                      ),
                                      69 => 
                                      array (
                                        'key' => 'AMFLO 702-610',
                                        'value' => 1695,
                                      ),
                                      70 => 
                                      array (
                                        'key' => 'AMMONIUM NITRATE BLAST',
                                        'value' => 1696,
                                      ),
                                      71 => 
                                      array (
                                        'key' => 'AMMONIUM NITRATE HD',
                                        'value' => 1697,
                                      ),
                                      72 => 
                                      array (
                                        'key' => 'AMMONIUM NITRATE PELLET',
                                        'value' => 1698,
                                      ),
                                      73 => 
                                      array (
                                        'key' => 'ANSUL 423267',
                                        'value' => 1829236,
                                      ),
                                      74 => 
                                      array (
                                        'key' => 'ANSUL 423581',
                                        'value' => 1829215,
                                      ),
                                      75 => 
                                      array (
                                        'key' => 'ANSUL 426809',
                                        'value' => 1829103,
                                      ),
                                      76 => 
                                      array (
                                        'key' => 'ANSUL 429196',
                                        'value' => 1829158,
                                      ),
                                      77 => 
                                      array (
                                        'key' => 'ANSUL 431352',
                                        'value' => 1829112,
                                      ),
                                      78 => 
                                      array (
                                        'key' => 'ANSUL 518518',
                                        'value' => 1829141,
                                      ),
                                      79 => 
                                      array (
                                        'key' => 'ANSUL 535688',
                                        'value' => 1829187,
                                      ),
                                      80 => 
                                      array (
                                        'key' => 'ANSUL 7083',
                                        'value' => 1829173,
                                      ),
                                      81 => 
                                      array (
                                        'key' => 'ANSUL 7091',
                                        'value' => 1829166,
                                      ),
                                      82 => 
                                      array (
                                        'key' => 'ANSUL 71976',
                                        'value' => 1829122,
                                      ),
                                      83 => 
                                      array (
                                        'key' => 'ANSUL 71980',
                                        'value' => 1829234,
                                      ),
                                      84 => 
                                      array (
                                        'key' => 'ANSUL 79007',
                                        'value' => 1829131,
                                      ),
                                      85 => 
                                      array (
                                        'key' => 'APACHE',
                                        'value' => 1699,
                                      ),
                                      86 => 
                                      array (
                                        'key' => 'APOLLO',
                                        'value' => 1700,
                                      ),
                                      87 => 
                                      array (
                                        'key' => 'APOLLO FLEXDOCK',
                                        'value' => 1701,
                                      ),
                                      88 => 
                                      array (
                                        'key' => 'APPION MEGAFLOW CT5',
                                        'value' => 1829128,
                                      ),
                                      89 => 
                                      array (
                                        'key' => 'APPLIED INDUSTRIAL TECH',
                                        'value' => 1702,
                                      ),
                                      90 => 
                                      array (
                                        'key' => 'APPLIED JETTING',
                                        'value' => 1703,
                                      ),
                                      91 => 
                                      array (
                                        'key' => 'AQUAHAMMER',
                                        'value' => 1704,
                                      ),
                                      92 => 
                                      array (
                                        'key' => 'AQUAPAL',
                                        'value' => 1705,
                                      ),
                                      93 => 
                                      array (
                                        'key' => 'AR THOMSON',
                                        'value' => 1829384,
                                      ),
                                      94 => 
                                      array (
                                        'key' => 'AR THOMSON EXTREME CRIMP',
                                        'value' => 1706,
                                      ),
                                      95 => 
                                      array (
                                        'key' => 'ARCAIR 5077MP',
                                        'value' => 1829172,
                                      ),
                                      96 => 
                                      array (
                                        'key' => 'ARCAIR INSULATOR',
                                        'value' => 1707,
                                      ),
                                      97 => 
                                      array (
                                        'key' => 'ARCHON',
                                        'value' => 1708,
                                      ),
                                      98 => 
                                      array (
                                        'key' => 'ARCO BLAST XF',
                                        'value' => 1709,
                                      ),
                                      99 => 
                                      array (
                                        'key' => 'ARCTIC EXTREMEFLEX',
                                        'value' => 1710,
                                      ),
                                      100 => 
                                      array (
                                        'key' => 'ARCTIC FLEXTRA',
                                        'value' => 1711,
                                      ),
                                      101 => 
                                      array (
                                        'key' => 'ARCTIC FLEXWING',
                                        'value' => 1712,
                                      ),
                                      102 => 
                                      array (
                                        'key' => 'ARCTIC FUEL DISCHARGE',
                                        'value' => 1713,
                                      ),
                                      103 => 
                                      array (
                                        'key' => 'ARCTIC LCP3',
                                        'value' => 1714,
                                      ),
                                      104 => 
                                      array (
                                        'key' => 'ARCTIC LCP4S',
                                        'value' => 1715,
                                      ),
                                      105 => 
                                      array (
                                        'key' => 'ARCTIC LCP6S',
                                        'value' => 1716,
                                      ),
                                      106 => 
                                      array (
                                        'key' => 'ARCTIC LR16SC',
                                        'value' => 1717,
                                      ),
                                      107 => 
                                      array (
                                        'key' => 'ARCTIC LR2SN',
                                        'value' => 1718,
                                      ),
                                      108 => 
                                      array (
                                        'key' => 'ARCTIC ORTAC',
                                        'value' => 1719,
                                      ),
                                      109 => 
                                      array (
                                        'key' => 'ARCTIC ORTAC PLUS',
                                        'value' => 1720,
                                      ),
                                      110 => 
                                      array (
                                        'key' => 'ARCTIC RIG SUPPLY',
                                        'value' => 1721,
                                      ),
                                      111 => 
                                      array (
                                        'key' => 'ARMOR-FLEX PRO',
                                        'value' => 1728,
                                      ),
                                      112 => 
                                      array (
                                        'key' => 'ARMORCOAT ACP3',
                                        'value' => 1722,
                                      ),
                                      113 => 
                                      array (
                                        'key' => 'ARMORCOAT ACP4',
                                        'value' => 1723,
                                      ),
                                      114 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC12',
                                        'value' => 1724,
                                      ),
                                      115 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC13',
                                        'value' => 1725,
                                      ),
                                      116 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC15',
                                        'value' => 1726,
                                      ),
                                      117 => 
                                      array (
                                        'key' => 'ARMORCOAT ARC16SC',
                                        'value' => 1727,
                                      ),
                                      118 => 
                                      array (
                                        'key' => 'ARONSON',
                                        'value' => 1729,
                                      ),
                                      119 => 
                                      array (
                                        'key' => 'ARPHSE',
                                        'value' => 1730,
                                      ),
                                      120 => 
                                      array (
                                        'key' => 'ARTRAC',
                                        'value' => 1731,
                                      ),
                                      121 => 
                                      array (
                                        'key' => 'ARVAC SW',
                                        'value' => 1732,
                                      ),
                                      122 => 
                                      array (
                                        'key' => 'AS1335 TWIN-LINE',
                                        'value' => 1733,
                                      ),
                                      123 => 
                                      array (
                                        'key' => 'AS2435 TYPE 1 AIRBRAKE',
                                        'value' => 1734,
                                      ),
                                      124 => 
                                      array (
                                        'key' => 'ASJ',
                                        'value' => 1735,
                                      ),
                                      125 => 
                                      array (
                                        'key' => 'ASJ VERSACRETE',
                                        'value' => 1736,
                                      ),
                                      126 => 
                                      array (
                                        'key' => 'ASTARAS INSULATER',
                                        'value' => 1829229,
                                      ),
                                      127 => 
                                      array (
                                        'key' => 'ATLANT WATER',
                                        'value' => 1737,
                                      ),
                                      128 => 
                                      array (
                                        'key' => 'ATLAS',
                                        'value' => 1738,
                                      ),
                                      129 => 
                                      array (
                                        'key' => 'ATRUBB NR SPRAY',
                                        'value' => 1739,
                                      ),
                                      130 => 
                                      array (
                                        'key' => 'AUGER ARC PILING',
                                        'value' => 1740,
                                      ),
                                      131 => 
                                      array (
                                        'key' => 'AUSTIN',
                                        'value' => 1741,
                                      ),
                                      132 => 
                                      array (
                                        'key' => 'AUSTIN RUBBER',
                                        'value' => 1742,
                                      ),
                                      133 => 
                                      array (
                                        'key' => 'AUTOGRIP',
                                        'value' => 1743,
                                      ),
                                      134 => 
                                      array (
                                        'key' => 'AXIAL FAN HAWK PD',
                                        'value' => 1829526,
                                      ),
                                      135 => 
                                      array (
                                        'key' => 'BAHCAL',
                                        'value' => 1744,
                                      ),
                                      136 => 
                                      array (
                                        'key' => 'BANDING COIL',
                                        'value' => 1745,
                                      ),
                                      137 => 
                                      array (
                                        'key' => 'BC COLD FLEX',
                                        'value' => 1746,
                                      ),
                                      138 => 
                                      array (
                                        'key' => 'BC GASOLINE',
                                        'value' => 1747,
                                      ),
                                      139 => 
                                      array (
                                        'key' => 'BC MARINA',
                                        'value' => 1748,
                                      ),
                                      140 => 
                                      array (
                                        'key' => 'BEDFORD',
                                        'value' => 1749,
                                      ),
                                      141 => 
                                      array (
                                        'key' => 'BLACK FLEXTRA II',
                                        'value' => 1750,
                                      ),
                                      142 => 
                                      array (
                                        'key' => 'BLACK FLEXTRA II 150',
                                        'value' => 1829333,
                                      ),
                                      143 => 
                                      array (
                                        'key' => 'BLACK FLEXWING',
                                        'value' => 1751,
                                      ),
                                      144 => 
                                      array (
                                        'key' => 'BLACKHAWK PD',
                                        'value' => 1829520,
                                      ),
                                      145 => 
                                      array (
                                        'key' => 'BLAST',
                                        'value' => 1752,
                                      ),
                                      146 => 
                                      array (
                                        'key' => 'BLASTHOLE SLURRY & DEWATERING',
                                        'value' => 1753,
                                      ),
                                      147 => 
                                      array (
                                        'key' => 'BLASTHOSE SLURRY',
                                        'value' => 1829297,
                                      ),
                                      148 => 
                                      array (
                                        'key' => 'BLASTMASTER HD',
                                        'value' => 1754,
                                      ),
                                      149 => 
                                      array (
                                        'key' => 'BLAUDIECK',
                                        'value' => 1755,
                                      ),
                                      150 => 
                                      array (
                                        'key' => 'BLAUSTRAHL',
                                        'value' => 1829415,
                                      ),
                                      151 => 
                                      array (
                                        'key' => 'BLISSFUL FISHERMAN',
                                        'value' => 1756,
                                      ),
                                      152 => 
                                      array (
                                        'key' => 'BLUCOR',
                                        'value' => 1757,
                                      ),
                                      153 => 
                                      array (
                                        'key' => 'BLUCOR FLANGE',
                                        'value' => 1758,
                                      ),
                                      154 => 
                                      array (
                                        'key' => 'BLUE FLEXWING',
                                        'value' => 1759,
                                      ),
                                      155 => 
                                      array (
                                        'key' => 'BLUE FLOUR',
                                        'value' => 1760,
                                      ),
                                      156 => 
                                      array (
                                        'key' => 'BLUE XTREME STRAIGH RAD HOSE',
                                        'value' => 1761,
                                      ),
                                      157 => 
                                      array (
                                        'key' => 'BOOTMOR',
                                        'value' => 1762,
                                      ),
                                      158 => 
                                      array (
                                        'key' => 'BOP SLEEVE',
                                        'value' => 1763,
                                      ),
                                      159 => 
                                      array (
                                        'key' => 'BOP WRAP',
                                        'value' => 1764,
                                      ),
                                      160 => 
                                      array (
                                        'key' => 'BOTTOM LOADING',
                                        'value' => 1765,
                                      ),
                                      161 => 
                                      array (
                                        'key' => 'BOWLING',
                                        'value' => 1829514,
                                      ),
                                      162 => 
                                      array (
                                        'key' => 'BR7',
                                        'value' => 1766,
                                      ),
                                      163 => 
                                      array (
                                        'key' => 'BRAIDAIR',
                                        'value' => 1767,
                                      ),
                                      164 => 
                                      array (
                                        'key' => 'BRANHAM AIR',
                                        'value' => 1829343,
                                      ),
                                      165 => 
                                      array (
                                        'key' => 'BRANHAM CHEMONE SUPERIOR',
                                        'value' => 1768,
                                      ),
                                      166 => 
                                      array (
                                        'key' => 'BREATHING AIR',
                                        'value' => 1769,
                                      ),
                                      167 => 
                                      array (
                                        'key' => 'BREATHING AIR HOSE',
                                        'value' => 1829260,
                                      ),
                                      168 => 
                                      array (
                                        'key' => 'BREATHING AIR PLUS',
                                        'value' => 1770,
                                      ),
                                      169 => 
                                      array (
                                        'key' => 'BRENNTAG',
                                        'value' => 1771,
                                      ),
                                      170 => 
                                      array (
                                        'key' => 'BREWERS HOSE',
                                        'value' => 1772,
                                      ),
                                      171 => 
                                      array (
                                        'key' => 'BREWLINE',
                                        'value' => 1773,
                                      ),
                                      172 => 
                                      array (
                                        'key' => 'BRICK RED AIR',
                                        'value' => 1774,
                                      ),
                                      173 => 
                                      array (
                                        'key' => 'BRIDGEPOINT',
                                        'value' => 1775,
                                      ),
                                      174 => 
                                      array (
                                        'key' => 'BRIGADE MINE',
                                        'value' => 1776,
                                      ),
                                      175 => 
                                      array (
                                        'key' => 'BRINE HOSE',
                                        'value' => 1777,
                                      ),
                                      176 => 
                                      array (
                                        'key' => 'BROOM SWEEPER',
                                        'value' => 1778,
                                      ),
                                      177 => 
                                      array (
                                        'key' => 'BROWN FLEXWING',
                                        'value' => 1779,
                                      ),
                                      178 => 
                                      array (
                                        'key' => 'BROWN/BLU FLEX',
                                        'value' => 1829430,
                                      ),
                                      179 => 
                                      array (
                                        'key' => 'BSP Flat Seat (British Standard Pipe)',
                                        'value' => 1829966,
                                      ),
                                      180 => 
                                      array (
                                        'key' => 'BSPP (British Standard Pipe Parallel)',
                                        'value' => 1829964,
                                      ),
                                      181 => 
                                      array (
                                        'key' => 'BSPT (British Standard Pipe Tapered)',
                                        'value' => 1829965,
                                      ),
                                      182 => 
                                      array (
                                        'key' => 'BUHLER MIAG',
                                        'value' => 1780,
                                      ),
                                      183 => 
                                      array (
                                        'key' => 'BULLARD',
                                        'value' => 1829140,
                                      ),
                                      184 => 
                                      array (
                                        'key' => 'BUTTERWORTH',
                                        'value' => 1781,
                                      ),
                                      185 => 
                                      array (
                                        'key' => 'BUTYL 200',
                                        'value' => 1782,
                                      ),
                                      186 => 
                                      array (
                                        'key' => 'C&J WATER S&D',
                                        'value' => 1783,
                                      ),
                                      187 => 
                                      array (
                                        'key' => 'C&T MIL-DTL-13444H-1-6',
                                        'value' => 1829200,
                                      ),
                                      188 => 
                                      array (
                                        'key' => 'CABLE CONDUIT',
                                        'value' => 1784,
                                      ),
                                      189 => 
                                      array (
                                        'key' => 'CABLE COOLING HOSE',
                                        'value' => 1785,
                                      ),
                                      190 => 
                                      array (
                                        'key' => 'CABLE COVER',
                                        'value' => 1786,
                                      ),
                                      191 => 
                                      array (
                                        'key' => 'CAMBRG HEALY PII',
                                        'value' => 1787,
                                      ),
                                      192 => 
                                      array (
                                        'key' => 'CAMLOK',
                                        'value' => 1788,
                                      ),
                                      193 => 
                                      array (
                                        'key' => 'CARON ARCTIC FLEX',
                                        'value' => 1789,
                                      ),
                                      194 => 
                                      array (
                                        'key' => 'CARON BLACK SOFTWALL',
                                        'value' => 1790,
                                      ),
                                      195 => 
                                      array (
                                        'key' => 'CARON FABCHEM',
                                        'value' => 1791,
                                      ),
                                      196 => 
                                      array (
                                        'key' => 'CASCADE DRY CEMENT',
                                        'value' => 1792,
                                      ),
                                      197 => 
                                      array (
                                        'key' => 'Catepillar Flange',
                                        'value' => 1829977,
                                      ),
                                      198 => 
                                      array (
                                        'key' => 'Caterpillar Flange',
                                        'value' => 1829961,
                                      ),
                                      199 => 
                                      array (
                                        'key' => 'CENEX',
                                        'value' => 1793,
                                      ),
                                      200 => 
                                      array (
                                        'key' => 'CENEX OT',
                                        'value' => 1794,
                                      ),
                                      201 => 
                                      array (
                                        'key' => 'CENTRAL ROCK DRILL',
                                        'value' => 1795,
                                      ),
                                      202 => 
                                      array (
                                        'key' => 'CHANGED TO FORTRESS WHITE',
                                        'value' => 1829316,
                                      ),
                                      203 => 
                                      array (
                                        'key' => 'CHEMICAL ACID DISCHARGE',
                                        'value' => 1796,
                                      ),
                                      204 => 
                                      array (
                                        'key' => 'CHEMONE',
                                        'value' => 1797,
                                      ),
                                      205 => 
                                      array (
                                        'key' => 'CHEMSTREAM',
                                        'value' => 1798,
                                      ),
                                      206 => 
                                      array (
                                        'key' => 'CHLO GARLOK',
                                        'value' => 1799,
                                      ),
                                      207 => 
                                      array (
                                        'key' => 'CITGO HYDROCARBON DRAIN',
                                        'value' => 1829202,
                                      ),
                                      208 => 
                                      array (
                                        'key' => 'CLAM JETTING',
                                        'value' => 1829434,
                                      ),
                                      209 => 
                                      array (
                                        'key' => 'CLEANJET',
                                        'value' => 1800,
                                      ),
                                      210 => 
                                      array (
                                        'key' => 'CLEANJET FDA',
                                        'value' => 1801,
                                      ),
                                      211 => 
                                      array (
                                        'key' => 'CLEAR PVC TUBING',
                                        'value' => 1802,
                                      ),
                                      212 => 
                                      array (
                                        'key' => 'CLEARWATER',
                                        'value' => 1803,
                                      ),
                                      213 => 
                                      array (
                                        'key' => 'Clip Pliers',
                                        'value' => 1830006,
                                      ),
                                      214 => 
                                      array (
                                        'key' => 'CO2 HOSE',
                                        'value' => 1804,
                                      ),
                                      215 => 
                                      array (
                                        'key' => 'COAST GUARD',
                                        'value' => 1805,
                                      ),
                                      216 => 
                                      array (
                                        'key' => 'Code 61 Flange (SAE  J518)',
                                        'value' => 1829976,
                                      ),
                                      217 => 
                                      array (
                                        'key' => 'Code 61 Flange (SAE J518)',
                                        'value' => 1829959,
                                      ),
                                      218 => 
                                      array (
                                        'key' => 'Code 62 Flange (SAE J518)',
                                        'value' => 1829960,
                                      ),
                                      219 => 
                                      array (
                                        'key' => 'COLD BLUE',
                                        'value' => 1806,
                                      ),
                                      220 => 
                                      array (
                                        'key' => 'COLLECTOR',
                                        'value' => 1807,
                                      ),
                                      221 => 
                                      array (
                                        'key' => 'COLLECTOR FLEX',
                                        'value' => 1808,
                                      ),
                                      222 => 
                                      array (
                                        'key' => 'COLORITE',
                                        'value' => 1809,
                                      ),
                                      223 => 
                                      array (
                                        'key' => 'Compressor O-Ring Tube',
                                        'value' => 1829980,
                                      ),
                                      224 => 
                                      array (
                                        'key' => 'Compressor Pad Block',
                                        'value' => 1829988,
                                      ),
                                      225 => 
                                      array (
                                        'key' => 'CON FORM SUPER FLEX',
                                        'value' => 1810,
                                      ),
                                      226 => 
                                      array (
                                        'key' => 'CON-TECH',
                                        'value' => 1829228,
                                      ),
                                      227 => 
                                      array (
                                        'key' => 'CONAG WATER S&D',
                                        'value' => 1811,
                                      ),
                                      228 => 
                                      array (
                                        'key' => 'CONCRETE G820',
                                        'value' => 1812,
                                      ),
                                      229 => 
                                      array (
                                        'key' => 'CONCRETE VIBRATOR',
                                        'value' => 1813,
                                      ),
                                      230 => 
                                      array (
                                        'key' => 'CONTI A&M',
                                        'value' => 1829426,
                                      ),
                                      231 => 
                                      array (
                                        'key' => 'CONTI CHEM OIL',
                                        'value' => 1814,
                                      ),
                                      232 => 
                                      array (
                                        'key' => 'CONTI CHEM PHARMA',
                                        'value' => 1815,
                                      ),
                                      233 => 
                                      array (
                                        'key' => 'CONTI CHEM STANDARD',
                                        'value' => 1816,
                                      ),
                                      234 => 
                                      array (
                                        'key' => 'CONTI CHEM SUPERIOR FEP',
                                        'value' => 1817,
                                      ),
                                      235 => 
                                      array (
                                        'key' => 'CONTI PAINT SPRAY',
                                        'value' => 1818,
                                      ),
                                      236 => 
                                      array (
                                        'key' => 'CONTI POTABLE WATER',
                                        'value' => 1819,
                                      ),
                                      237 => 
                                      array (
                                        'key' => 'CONTI WASTE WATER',
                                        'value' => 1820,
                                      ),
                                      238 => 
                                      array (
                                        'key' => 'CONTICHEM',
                                        'value' => 1829407,
                                      ),
                                      239 => 
                                      array (
                                        'key' => 'CONTINENTAL MATTE GREEN',
                                        'value' => 1829282,
                                      ),
                                      240 => 
                                      array (
                                        'key' => 'CONTINENTAL STEEL STEAM 250',
                                        'value' => 1821,
                                      ),
                                      241 => 
                                      array (
                                        'key' => 'CONTRACTOR 4001',
                                        'value' => 1822,
                                      ),
                                      242 => 
                                      array (
                                        'key' => 'CONTRACTOR WATER S&D',
                                        'value' => 1823,
                                      ),
                                      243 => 
                                      array (
                                        'key' => 'CONTRACTOR\'S WATER',
                                        'value' => 1824,
                                      ),
                                      244 => 
                                      array (
                                        'key' => 'COOLING WATER',
                                        'value' => 1825,
                                      ),
                                      245 => 
                                      array (
                                        'key' => 'COOLING WATER 2.0',
                                        'value' => 1826,
                                      ),
                                      246 => 
                                      array (
                                        'key' => 'COTTON CLEANER',
                                        'value' => 1829519,
                                      ),
                                      247 => 
                                      array (
                                        'key' => 'COUPLING MALE SWIVEL',
                                        'value' => 1829191,
                                      ),
                                      248 => 
                                      array (
                                        'key' => 'CPE DISCHARGE',
                                        'value' => 1827,
                                      ),
                                      249 => 
                                      array (
                                        'key' => 'CPLAIR AIRCRAFT',
                                        'value' => 1829348,
                                      ),
                                      250 => 
                                      array (
                                        'key' => 'CREE BREWERS HOSE',
                                        'value' => 1828,
                                      ),
                                      251 => 
                                      array (
                                        'key' => 'CULVERT',
                                        'value' => 1829,
                                      ),
                                      252 => 
                                      array (
                                        'key' => 'DAMPF TRIX 5000',
                                        'value' => 1830,
                                      ),
                                      253 => 
                                      array (
                                        'key' => 'DAMPF TRIX 6000',
                                        'value' => 1831,
                                      ),
                                      254 => 
                                      array (
                                        'key' => 'DAMPFTRIX 6000',
                                        'value' => 1829406,
                                      ),
                                      255 => 
                                      array (
                                        'key' => 'DARCOR RED',
                                        'value' => 1829318,
                                      ),
                                      256 => 
                                      array (
                                        'key' => 'DARCY REDWING FUEL OIL',
                                        'value' => 1832,
                                      ),
                                      257 => 
                                      array (
                                        'key' => 'DEADMAN AIRCRAFT REFUELING',
                                        'value' => 1833,
                                      ),
                                      258 => 
                                      array (
                                        'key' => 'DEADMAN SANDBLAST',
                                        'value' => 1834,
                                      ),
                                      259 => 
                                      array (
                                        'key' => 'DEEP BLUE',
                                        'value' => 1829431,
                                      ),
                                      260 => 
                                      array (
                                        'key' => 'DEERE',
                                        'value' => 1835,
                                      ),
                                      261 => 
                                      array (
                                        'key' => 'DEF DISPENSING',
                                        'value' => 1836,
                                      ),
                                      262 => 
                                      array (
                                        'key' => 'DEF TRANSFER',
                                        'value' => 1837,
                                      ),
                                      263 => 
                                      array (
                                        'key' => 'DEL TWIN-LINE GRADE R',
                                        'value' => 1838,
                                      ),
                                      264 => 
                                      array (
                                        'key' => 'DEL TWIN-LINE GRADE RM',
                                        'value' => 1839,
                                      ),
                                      265 => 
                                      array (
                                        'key' => 'DENVER',
                                        'value' => 1840,
                                      ),
                                      266 => 
                                      array (
                                        'key' => 'DENVER CONC VIBR',
                                        'value' => 1841,
                                      ),
                                      267 => 
                                      array (
                                        'key' => 'DESERT DR16SC',
                                        'value' => 1842,
                                      ),
                                      268 => 
                                      array (
                                        'key' => 'DESERT DR1SN',
                                        'value' => 1843,
                                      ),
                                      269 => 
                                      array (
                                        'key' => 'DESERT DR2SN',
                                        'value' => 1844,
                                      ),
                                      270 => 
                                      array (
                                        'key' => 'DESERT DR5',
                                        'value' => 1845,
                                      ),
                                      271 => 
                                      array (
                                        'key' => 'DESERT DUT',
                                        'value' => 1846,
                                      ),
                                      272 => 
                                      array (
                                        'key' => 'DEVILBISS',
                                        'value' => 1829178,
                                      ),
                                      273 => 
                                      array (
                                        'key' => 'DEWATERING',
                                        'value' => 1847,
                                      ),
                                      274 => 
                                      array (
                                        'key' => 'DIAMOND',
                                        'value' => 1829370,
                                      ),
                                      275 => 
                                      array (
                                        'key' => 'DIESEL OIL HARDWALL',
                                        'value' => 1848,
                                      ),
                                      276 => 
                                      array (
                                        'key' => 'DIESEL OIL SOFTWALL',
                                        'value' => 1849,
                                      ),
                                      277 => 
                                      array (
                                        'key' => 'DIGESTER',
                                        'value' => 1850,
                                      ),
                                      278 => 
                                      array (
                                        'key' => 'DIISOCYANATE',
                                        'value' => 1851,
                                      ),
                                      279 => 
                                      array (
                                        'key' => 'DIN 24 Heavy',
                                        'value' => 1829968,
                                      ),
                                      280 => 
                                      array (
                                        'key' => 'DIN 24 Light',
                                        'value' => 1829967,
                                      ),
                                      281 => 
                                      array (
                                        'key' => 'DIN 60',
                                        'value' => 1829969,
                                      ),
                                      282 => 
                                      array (
                                        'key' => 'DINGA HOT WATER GUN',
                                        'value' => 1852,
                                      ),
                                      283 => 
                                      array (
                                        'key' => 'DISCHARGE',
                                        'value' => 1853,
                                      ),
                                      284 => 
                                      array (
                                        'key' => 'DISHWASHER DRAIN',
                                        'value' => 1854,
                                      ),
                                      285 => 
                                      array (
                                        'key' => 'DISTILLERY 150',
                                        'value' => 1855,
                                      ),
                                      286 => 
                                      array (
                                        'key' => 'DISTRB ACID',
                                        'value' => 1856,
                                      ),
                                      287 => 
                                      array (
                                        'key' => 'DISTRB ARCTIC ORTAC',
                                        'value' => 1857,
                                      ),
                                      288 => 
                                      array (
                                        'key' => 'DISTRB STEEL AIR',
                                        'value' => 1858,
                                      ),
                                      289 => 
                                      array (
                                        'key' => 'DISTRB WATER S&D',
                                        'value' => 1859,
                                      ),
                                      290 => 
                                      array (
                                        'key' => 'DIVERSIFLEX',
                                        'value' => 1860,
                                      ),
                                      291 => 
                                      array (
                                        'key' => 'DIVERSIPIPE',
                                        'value' => 1861,
                                      ),
                                      292 => 
                                      array (
                                        'key' => 'DIVING HOSE',
                                        'value' => 1862,
                                      ),
                                      293 => 
                                      array (
                                        'key' => 'DMC CAUSTIC',
                                        'value' => 1863,
                                      ),
                                      294 => 
                                      array (
                                        'key' => 'DOCK',
                                        'value' => 1864,
                                      ),
                                      295 => 
                                      array (
                                        'key' => 'DOCK EN1765 L15',
                                        'value' => 1865,
                                      ),
                                      296 => 
                                      array (
                                        'key' => 'DOCK EN1765 S15',
                                        'value' => 1866,
                                      ),
                                      297 => 
                                      array (
                                        'key' => 'DOCK FDA',
                                        'value' => 1867,
                                      ),
                                      298 => 
                                      array (
                                        'key' => 'DOCK SMOOTH BORE HOT SULFUR',
                                        'value' => 1868,
                                      ),
                                      299 => 
                                      array (
                                        'key' => 'DOCK SUPPLY SW',
                                        'value' => 1869,
                                      ),
                                      300 => 
                                      array (
                                        'key' => 'DR16SC',
                                        'value' => 1830041,
                                      ),
                                      301 => 
                                      array (
                                        'key' => 'DREDGE SLEEVE',
                                        'value' => 1870,
                                      ),
                                      302 => 
                                      array (
                                        'key' => 'DRILL WATER',
                                        'value' => 1871,
                                      ),
                                      303 => 
                                      array (
                                        'key' => 'DRINKLINE',
                                        'value' => 1872,
                                      ),
                                      304 => 
                                      array (
                                        'key' => 'DRY CEMENT HD HARDWALL',
                                        'value' => 1873,
                                      ),
                                      305 => 
                                      array (
                                        'key' => 'DRY CEMENT SOFTWALL',
                                        'value' => 1874,
                                      ),
                                      306 => 
                                      array (
                                        'key' => 'DRY ICE HOSE',
                                        'value' => 1875,
                                      ),
                                      307 => 
                                      array (
                                        'key' => 'DUAL HI-PERFORMANCE PD',
                                        'value' => 1829530,
                                      ),
                                      308 => 
                                      array (
                                        'key' => 'DUAL POSITIVE DRIVE PD',
                                        'value' => 1829510,
                                      ),
                                      309 => 
                                      array (
                                        'key' => 'Dual-Grip DGF1 Ferrule',
                                        'value' => 1830020,
                                      ),
                                      310 => 
                                      array (
                                        'key' => 'Dual-Grip DGF2 Ferrule',
                                        'value' => 1830021,
                                      ),
                                      311 => 
                                      array (
                                        'key' => 'DUDLEY WATER',
                                        'value' => 1876,
                                      ),
                                      312 => 
                                      array (
                                        'key' => 'DUNLOP BOOSTER',
                                        'value' => 1877,
                                      ),
                                      313 => 
                                      array (
                                        'key' => 'DURACO',
                                        'value' => 1878,
                                      ),
                                      314 => 
                                      array (
                                        'key' => 'DURACO ROADPATCH',
                                        'value' => 1879,
                                      ),
                                      315 => 
                                      array (
                                        'key' => 'DWE',
                                        'value' => 1829161,
                                      ),
                                      316 => 
                                      array (
                                        'key' => 'DYNACRAFT',
                                        'value' => 1880,
                                      ),
                                      317 => 
                                      array (
                                        'key' => 'DYNACRAFT D1045-2000',
                                        'value' => 1829127,
                                      ),
                                      318 => 
                                      array (
                                        'key' => 'DYNO',
                                        'value' => 1881,
                                      ),
                                      319 => 
                                      array (
                                        'key' => 'DYNO HOSE',
                                        'value' => 1882,
                                      ),
                                      320 => 
                                      array (
                                        'key' => 'DYNO HOSEINHOSE',
                                        'value' => 1829231,
                                      ),
                                      321 => 
                                      array (
                                        'key' => 'DYNO NOBEL',
                                        'value' => 1829125,
                                      ),
                                      322 => 
                                      array (
                                        'key' => 'E 1-1',
                                        'value' => 1883,
                                      ),
                                      323 => 
                                      array (
                                        'key' => 'E 3-1',
                                        'value' => 1884,
                                      ),
                                      324 => 
                                      array (
                                        'key' => 'E 3-2',
                                        'value' => 1885,
                                      ),
                                      325 => 
                                      array (
                                        'key' => 'EAGLE AIR & WATER',
                                        'value' => 1886,
                                      ),
                                      326 => 
                                      array (
                                        'key' => 'EAGLE FLUID POWER',
                                        'value' => 1829160,
                                      ),
                                      327 => 
                                      array (
                                        'key' => 'ECOLAB BLUE',
                                        'value' => 1829110,
                                      ),
                                      328 => 
                                      array (
                                        'key' => 'ECOLAB WASHDOWN',
                                        'value' => 1829193,
                                      ),
                                      329 => 
                                      array (
                                        'key' => 'EDPM DISCHARGE',
                                        'value' => 1829263,
                                      ),
                                      330 => 
                                      array (
                                        'key' => 'EHLYNN',
                                        'value' => 1887,
                                      ),
                                      331 => 
                                      array (
                                        'key' => 'EHLYNN FLOUR TEC',
                                        'value' => 1888,
                                      ),
                                      332 => 
                                      array (
                                        'key' => 'EHLYNN FOOD DISCHARGE',
                                        'value' => 1889,
                                      ),
                                      333 => 
                                      array (
                                        'key' => 'EHLYNN HOT AIR',
                                        'value' => 1890,
                                      ),
                                      334 => 
                                      array (
                                        'key' => 'EHLYNN PIPE CONNECTOR',
                                        'value' => 1891,
                                      ),
                                      335 => 
                                      array (
                                        'key' => 'EHLYNN TPG',
                                        'value' => 1892,
                                      ),
                                      336 => 
                                      array (
                                        'key' => 'ELAFLEX LAY FLAT',
                                        'value' => 1893,
                                      ),
                                      337 => 
                                      array (
                                        'key' => 'ELITE POLY-V',
                                        'value' => 1829495,
                                      ),
                                      338 => 
                                      array (
                                        'key' => 'ELITE POLY-V STRETCH',
                                        'value' => 1829529,
                                      ),
                                      339 => 
                                      array (
                                        'key' => 'ELITE STANDARD RADIATOR',
                                        'value' => 1894,
                                      ),
                                      340 => 
                                      array (
                                        'key' => 'ELITE SW MARINE WET EXHAUST',
                                        'value' => 1895,
                                      ),
                                      341 => 
                                      array (
                                        'key' => 'EN12115 PETROLEUM',
                                        'value' => 1896,
                                      ),
                                      342 => 
                                      array (
                                        'key' => 'EPDM 200',
                                        'value' => 1897,
                                      ),
                                      343 => 
                                      array (
                                        'key' => 'EPDM 200 (ECONOMY)',
                                        'value' => 1898,
                                      ),
                                      344 => 
                                      array (
                                        'key' => 'EPDM 200 (NON CON)',
                                        'value' => 1899,
                                      ),
                                      345 => 
                                      array (
                                        'key' => 'EPDM ACID',
                                        'value' => 1900,
                                      ),
                                      346 => 
                                      array (
                                        'key' => 'EPDM DISCHARGE',
                                        'value' => 1901,
                                      ),
                                      347 => 
                                      array (
                                        'key' => 'EPDM S&D',
                                        'value' => 1902,
                                      ),
                                      348 => 
                                      array (
                                        'key' => 'EPDM SD HD WATER',
                                        'value' => 1903,
                                      ),
                                      349 => 
                                      array (
                                        'key' => 'EPDM SD WATER',
                                        'value' => 1904,
                                      ),
                                      350 => 
                                      array (
                                        'key' => 'ERGON',
                                        'value' => 1905,
                                      ),
                                      351 => 
                                      array (
                                        'key' => 'ERIKS',
                                        'value' => 1906,
                                      ),
                                      352 => 
                                      array (
                                        'key' => 'ESTABROOK',
                                        'value' => 1829163,
                                      ),
                                      353 => 
                                      array (
                                        'key' => 'EURO TRIX',
                                        'value' => 1907,
                                      ),
                                      354 => 
                                      array (
                                        'key' => 'EXIMCO',
                                        'value' => 1908,
                                      ),
                                      355 => 
                                      array (
                                        'key' => 'EXIMCO FLOATER',
                                        'value' => 1829227,
                                      ),
                                      356 => 
                                      array (
                                        'key' => 'EXIMCO HYD',
                                        'value' => 1829402,
                                      ),
                                      357 => 
                                      array (
                                        'key' => 'EXON GP DOCK',
                                        'value' => 1909,
                                      ),
                                      358 => 
                                      array (
                                        'key' => 'EXPRESS BLOWER',
                                        'value' => 1910,
                                      ),
                                      359 => 
                                      array (
                                        'key' => 'EXSTATIC',
                                        'value' => 1911,
                                      ),
                                      360 => 
                                      array (
                                        'key' => 'EXTREME CRIMP CB STEAM',
                                        'value' => 1829118,
                                      ),
                                      361 => 
                                      array (
                                        'key' => 'EXTREMEBLAST LOAD',
                                        'value' => 1912,
                                      ),
                                      362 => 
                                      array (
                                        'key' => 'EXTREMEFLEX BEVERAGE',
                                        'value' => 1913,
                                      ),
                                      363 => 
                                      array (
                                        'key' => 'EXTREMEFLEX CHEMICAL BROWN',
                                        'value' => 1914,
                                      ),
                                      364 => 
                                      array (
                                        'key' => 'EXTREMEFLEX CHEMICAL PURPLE',
                                        'value' => 1915,
                                      ),
                                      365 => 
                                      array (
                                        'key' => 'EXTREMEFLEX FOOD',
                                        'value' => 1829369,
                                      ),
                                      366 => 
                                      array (
                                        'key' => 'EXTREMEFLEX FOOD BLUE',
                                        'value' => 1916,
                                      ),
                                      367 => 
                                      array (
                                        'key' => 'EXTREMEFLEX FOOD GRAY',
                                        'value' => 1917,
                                      ),
                                      368 => 
                                      array (
                                        'key' => 'EXTREMEFLEX FOOD RED',
                                        'value' => 1829382,
                                      ),
                                      369 => 
                                      array (
                                        'key' => 'EXTREMEFLEX PETROLEUM',
                                        'value' => 1918,
                                      ),
                                      370 => 
                                      array (
                                        'key' => 'EXTREMEFLEX POTABLE WATER',
                                        'value' => 1919,
                                      ),
                                      371 => 
                                      array (
                                        'key' => 'EXTREMEFLEX VERSIFLO',
                                        'value' => 1920,
                                      ),
                                      372 => 
                                      array (
                                        'key' => 'EXTREMEFLEX WATER SLURRY',
                                        'value' => 1921,
                                      ),
                                      373 => 
                                      array (
                                        'key' => 'EZ GLIDE WINE',
                                        'value' => 1922,
                                      ),
                                      374 => 
                                      array (
                                        'key' => 'F5 AIR',
                                        'value' => 1923,
                                      ),
                                      375 => 
                                      array (
                                        'key' => 'FABCHEM',
                                        'value' => 1924,
                                      ),
                                      376 => 
                                      array (
                                        'key' => 'FABCHEM ARC',
                                        'value' => 1925,
                                      ),
                                      377 => 
                                      array (
                                        'key' => 'FABCHEM EN12115',
                                        'value' => 1926,
                                      ),
                                      378 => 
                                      array (
                                        'key' => 'FABCHEM-C',
                                        'value' => 1927,
                                      ),
                                      379 => 
                                      array (
                                        'key' => 'FALCON PD',
                                        'value' => 1829521,
                                      ),
                                      380 => 
                                      array (
                                        'key' => 'Ferrules',
                                        'value' => 1830012,
                                      ),
                                      381 => 
                                      array (
                                        'key' => 'FHP',
                                        'value' => 1829507,
                                      ),
                                      382 => 
                                      array (
                                        'key' => 'FIBERG CRUCIBLE GASK',
                                        'value' => 1928,
                                      ),
                                      383 => 
                                      array (
                                        'key' => 'FINISHING BRANDS',
                                        'value' => 1929,
                                      ),
                                      384 => 
                                      array (
                                        'key' => 'FINN',
                                        'value' => 1829171,
                                      ),
                                      385 => 
                                      array (
                                        'key' => 'FIRE ENGINE BOOSTER',
                                        'value' => 1930,
                                      ),
                                      386 => 
                                      array (
                                        'key' => 'FIRE ENGINE SUCTION',
                                        'value' => 1931,
                                      ),
                                      387 => 
                                      array (
                                        'key' => 'FIRE ENGINER BOOSTER',
                                        'value' => 1932,
                                      ),
                                      388 => 
                                      array (
                                        'key' => 'FIRE SUCTION & DISCHARGE',
                                        'value' => 1829433,
                                      ),
                                      389 => 
                                      array (
                                        'key' => 'FISH HOSE',
                                        'value' => 1933,
                                      ),
                                      390 => 
                                      array (
                                        'key' => 'FISH SUCTION',
                                        'value' => 1829238,
                                      ),
                                      391 => 
                                      array (
                                        'key' => 'FISH TRANSFER',
                                        'value' => 1934,
                                      ),
                                      392 => 
                                      array (
                                        'key' => 'Flange Engine Oil Connection (Two Bolt)',
                                        'value' => 1830007,
                                      ),
                                      393 => 
                                      array (
                                        'key' => 'Flareless Tube',
                                        'value' => 1829981,
                                      ),
                                      394 => 
                                      array (
                                        'key' => 'Flareless Tube Nuts',
                                        'value' => 1829994,
                                      ),
                                      395 => 
                                      array (
                                        'key' => 'Flareless Tube Sleeves',
                                        'value' => 1829995,
                                      ),
                                      396 => 
                                      array (
                                        'key' => 'FLDCON',
                                        'value' => 1935,
                                      ),
                                      397 => 
                                      array (
                                        'key' => 'FLEX-ING FLEX AQUA WATER S&D',
                                        'value' => 1943,
                                      ),
                                      398 => 
                                      array (
                                        'key' => 'FLEX-ING FLEX-ON',
                                        'value' => 1944,
                                      ),
                                      399 => 
                                      array (
                                        'key' => 'FLEX-PULSE FPII',
                                        'value' => 1946,
                                      ),
                                      400 => 
                                      array (
                                        'key' => 'FLEXAGRIP',
                                        'value' => 1936,
                                      ),
                                      401 => 
                                      array (
                                        'key' => 'FLEXCHEM 225',
                                        'value' => 1937,
                                      ),
                                      402 => 
                                      array (
                                        'key' => 'FLEXDOCK',
                                        'value' => 1938,
                                      ),
                                      403 => 
                                      array (
                                        'key' => 'FLEXDOCK VERSAFUEL',
                                        'value' => 1939,
                                      ),
                                      404 => 
                                      array (
                                        'key' => 'FLEXIBLE DOWNSPOUT',
                                        'value' => 1940,
                                      ),
                                      405 => 
                                      array (
                                        'key' => 'FLEXIBLE TEFLON',
                                        'value' => 1941,
                                      ),
                                      406 => 
                                      array (
                                        'key' => 'FLEXICORE',
                                        'value' => 1942,
                                      ),
                                      407 => 
                                      array (
                                        'key' => 'FLEXILLA',
                                        'value' => 1829099,
                                      ),
                                      408 => 
                                      array (
                                        'key' => 'FLEXING FLEX-ON',
                                        'value' => 1829124,
                                      ),
                                      409 => 
                                      array (
                                        'key' => 'FLEXJET',
                                        'value' => 1945,
                                      ),
                                      410 => 
                                      array (
                                        'key' => 'FLEXON',
                                        'value' => 1829094,
                                      ),
                                      411 => 
                                      array (
                                        'key' => 'FLEXRITE',
                                        'value' => 1947,
                                      ),
                                      412 => 
                                      array (
                                        'key' => 'FLEXSHIELD SAE J1527 A1-15',
                                        'value' => 1829362,
                                      ),
                                      413 => 
                                      array (
                                        'key' => 'FLEXSHIELD SAE J1527 TYPE A1-15',
                                        'value' => 1948,
                                      ),
                                      414 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 CB EXTREME CRIMP',
                                        'value' => 1949,
                                      ),
                                      415 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 CB STEAM',
                                        'value' => 1950,
                                      ),
                                      416 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 EPDM',
                                        'value' => 1829327,
                                      ),
                                      417 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 EPDM-20',
                                        'value' => 1951,
                                      ),
                                      418 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 ORS STEAM',
                                        'value' => 1952,
                                      ),
                                      419 => 
                                      array (
                                        'key' => 'FLEXSTEEL 250 STEAM',
                                        'value' => 1953,
                                      ),
                                      420 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA',
                                        'value' => 1954,
                                      ),
                                      421 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA B20',
                                        'value' => 1955,
                                      ),
                                      422 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA E25',
                                        'value' => 1956,
                                      ),
                                      423 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA ETHAN-ALL',
                                        'value' => 1957,
                                      ),
                                      424 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA HVR',
                                        'value' => 1958,
                                      ),
                                      425 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA HVR LOW PERM',
                                        'value' => 1959,
                                      ),
                                      426 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA LOW PERM',
                                        'value' => 1960,
                                      ),
                                      427 => 
                                      array (
                                        'key' => 'FLEXSTEEL FUTURA VAPOR ASSIST',
                                        'value' => 1961,
                                      ),
                                      428 => 
                                      array (
                                        'key' => 'FLEXSTEEL HW',
                                        'value' => 1829212,
                                      ),
                                      429 => 
                                      array (
                                        'key' => 'FLEXSTEEL MINE SPRAY',
                                        'value' => 1962,
                                      ),
                                      430 => 
                                      array (
                                        'key' => 'FLEXSTEEL MINESPRAY',
                                        'value' => 1963,
                                      ),
                                      431 => 
                                      array (
                                        'key' => 'FLEXSTEEL SERVICE STATION AIR',
                                        'value' => 1964,
                                      ),
                                      432 => 
                                      array (
                                        'key' => 'FLEXTRA DRY MATERIAL',
                                        'value' => 1965,
                                      ),
                                      433 => 
                                      array (
                                        'key' => 'FLEXTRA LT',
                                        'value' => 1966,
                                      ),
                                      434 => 
                                      array (
                                        'key' => 'FLEXTRA LT BLUE',
                                        'value' => 1829367,
                                      ),
                                      435 => 
                                      array (
                                        'key' => 'FLEXTRA OILFIELD',
                                        'value' => 1967,
                                      ),
                                      436 => 
                                      array (
                                        'key' => 'FLEXTRA ROCK DUST',
                                        'value' => 1968,
                                      ),
                                      437 => 
                                      array (
                                        'key' => 'FLEXTRAL GRIP-LOC',
                                        'value' => 1829179,
                                      ),
                                      438 => 
                                      array (
                                        'key' => 'FLEXTRAL J2',
                                        'value' => 1829399,
                                      ),
                                      439 => 
                                      array (
                                        'key' => 'FLEXWAC',
                                        'value' => 1969,
                                      ),
                                      440 => 
                                      array (
                                        'key' => 'FLEXWING FOOD BLUE',
                                        'value' => 1970,
                                      ),
                                      441 => 
                                      array (
                                        'key' => 'FLEXWING OILFIELD',
                                        'value' => 1971,
                                      ),
                                      442 => 
                                      array (
                                        'key' => 'FLEXWING PETROLEUM',
                                        'value' => 1972,
                                      ),
                                      443 => 
                                      array (
                                        'key' => 'FLEXWING VERSAFUEL',
                                        'value' => 1973,
                                      ),
                                      444 => 
                                      array (
                                        'key' => 'FLEXWING WATER S&D',
                                        'value' => 1974,
                                      ),
                                      445 => 
                                      array (
                                        'key' => 'FLOATER',
                                        'value' => 1975,
                                      ),
                                      446 => 
                                      array (
                                        'key' => 'FLOATING HOSES',
                                        'value' => 1976,
                                      ),
                                      447 => 
                                      array (
                                        'key' => 'FLOUR DISCHARGE',
                                        'value' => 1977,
                                      ),
                                      448 => 
                                      array (
                                        'key' => 'FLUOROPAL',
                                        'value' => 1978,
                                      ),
                                      449 => 
                                      array (
                                        'key' => 'FOAM',
                                        'value' => 1979,
                                      ),
                                      450 => 
                                      array (
                                        'key' => 'FOOD 2720',
                                        'value' => 1980,
                                      ),
                                      451 => 
                                      array (
                                        'key' => 'FOOD DISCHARGE',
                                        'value' => 1981,
                                      ),
                                      452 => 
                                      array (
                                        'key' => 'FOOD FLEX',
                                        'value' => 1982,
                                      ),
                                      453 => 
                                      array (
                                        'key' => 'FOOD SUCTION & DISCHARGE',
                                        'value' => 1983,
                                      ),
                                      454 => 
                                      array (
                                        'key' => 'FOODCLEAN',
                                        'value' => 1984,
                                      ),
                                      455 => 
                                      array (
                                        'key' => 'FOODLINER',
                                        'value' => 1985,
                                      ),
                                      456 => 
                                      array (
                                        'key' => 'Ford Spring Lock',
                                        'value' => 1829989,
                                      ),
                                      457 => 
                                      array (
                                        'key' => 'FORECAST BLAST',
                                        'value' => 1986,
                                      ),
                                      458 => 
                                      array (
                                        'key' => 'FORECAST BLAST XF',
                                        'value' => 1987,
                                      ),
                                      459 => 
                                      array (
                                        'key' => 'FORECAST SUCTION',
                                        'value' => 1988,
                                      ),
                                      460 => 
                                      array (
                                        'key' => 'FORESTRY',
                                        'value' => 1989,
                                      ),
                                      461 => 
                                      array (
                                        'key' => 'FORMADRAIN INFLATABLE HOSE',
                                        'value' => 1990,
                                      ),
                                      462 => 
                                      array (
                                        'key' => 'FORTRESS',
                                        'value' => 1991,
                                      ),
                                      463 => 
                                      array (
                                        'key' => 'FOSTER',
                                        'value' => 1992,
                                      ),
                                      464 => 
                                      array (
                                        'key' => 'FRAC',
                                        'value' => 1993,
                                      ),
                                      465 => 
                                      array (
                                        'key' => 'FRAC ACID S&D',
                                        'value' => 1994,
                                      ),
                                      466 => 
                                      array (
                                        'key' => 'FRAC ACID S&D 400',
                                        'value' => 1829354,
                                      ),
                                      467 => 
                                      array (
                                        'key' => 'FRAC BLENDING 500SD',
                                        'value' => 1829374,
                                      ),
                                      468 => 
                                      array (
                                        'key' => 'FRAC BLENDING S&D',
                                        'value' => 1995,
                                      ),
                                      469 => 
                                      array (
                                        'key' => 'FRACO',
                                        'value' => 1996,
                                      ),
                                      470 => 
                                      array (
                                        'key' => 'FREON CHARGING',
                                        'value' => 1997,
                                      ),
                                      471 => 
                                      array (
                                        'key' => 'FRIG SEA',
                                        'value' => 1998,
                                      ),
                                      472 => 
                                      array (
                                        'key' => 'FRONTIER',
                                        'value' => 1999,
                                      ),
                                      473 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE',
                                        'value' => 2000,
                                      ),
                                      474 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE 150',
                                        'value' => 1829337,
                                      ),
                                      475 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE 200',
                                        'value' => 1829405,
                                      ),
                                      476 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE 250',
                                        'value' => 1829237,
                                      ),
                                      477 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE 300',
                                        'value' => 1829373,
                                      ),
                                      478 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE HD',
                                        'value' => 2001,
                                      ),
                                      479 => 
                                      array (
                                        'key' => 'FUEL DISCHARGE HD 300',
                                        'value' => 1829422,
                                      ),
                                      480 => 
                                      array (
                                        'key' => 'FUEL FILL SAE J1527 TYPE A2',
                                        'value' => 2002,
                                      ),
                                      481 => 
                                      array (
                                        'key' => 'FUEL RIG SW',
                                        'value' => 2003,
                                      ),
                                      482 => 
                                      array (
                                        'key' => 'FUELGRIP COUPLING',
                                        'value' => 2004,
                                      ),
                                      483 => 
                                      array (
                                        'key' => 'FUGGITT',
                                        'value' => 2005,
                                      ),
                                      484 => 
                                      array (
                                        'key' => 'FUJI',
                                        'value' => 2006,
                                      ),
                                      485 => 
                                      array (
                                        'key' => 'FURNACE DOOR',
                                        'value' => 2007,
                                      ),
                                      486 => 
                                      array (
                                        'key' => 'FUTURA O-RING KIT',
                                        'value' => 2008,
                                      ),
                                      487 => 
                                      array (
                                        'key' => 'FUTURA RET RING INST. TOOL',
                                        'value' => 2009,
                                      ),
                                      488 => 
                                      array (
                                        'key' => 'GALAXY G4826',
                                        'value' => 2010,
                                      ),
                                      489 => 
                                      array (
                                        'key' => 'GALAXY G4867',
                                        'value' => 2011,
                                      ),
                                      490 => 
                                      array (
                                        'key' => 'GALAXY G4890',
                                        'value' => 2012,
                                      ),
                                      491 => 
                                      array (
                                        'key' => 'GALVANATOR',
                                        'value' => 2013,
                                      ),
                                      492 => 
                                      array (
                                        'key' => 'GAMMON',
                                        'value' => 2014,
                                      ),
                                      493 => 
                                      array (
                                        'key' => 'GARDEN HOSE',
                                        'value' => 1829286,
                                      ),
                                      494 => 
                                      array (
                                        'key' => 'GARRISON GAUNTLET',
                                        'value' => 1829424,
                                      ),
                                      495 => 
                                      array (
                                        'key' => 'GATES',
                                        'value' => 1829135,
                                      ),
                                      496 => 
                                      array (
                                        'key' => 'GATES 32000002',
                                        'value' => 1829418,
                                      ),
                                      497 => 
                                      array (
                                        'key' => 'GATES 32000003',
                                        'value' => 1829305,
                                      ),
                                      498 => 
                                      array (
                                        'key' => 'GATES 32000006',
                                        'value' => 1829245,
                                      ),
                                      499 => 
                                      array (
                                        'key' => 'GATES 32000007',
                                        'value' => 1829294,
                                      ),
                                      500 => 
                                      array (
                                        'key' => 'GATES 32000008',
                                        'value' => 1829247,
                                      ),
                                      501 => 
                                      array (
                                        'key' => 'GATES 32000009',
                                        'value' => 1829209,
                                      ),
                                      502 => 
                                      array (
                                        'key' => 'GATES 32000011',
                                        'value' => 1829265,
                                      ),
                                      503 => 
                                      array (
                                        'key' => 'GATES 32000012',
                                        'value' => 1829276,
                                      ),
                                      504 => 
                                      array (
                                        'key' => 'GATES 32000013',
                                        'value' => 1829254,
                                      ),
                                      505 => 
                                      array (
                                        'key' => 'GATES 32000014',
                                        'value' => 1829213,
                                      ),
                                      506 => 
                                      array (
                                        'key' => 'GATES 32000015',
                                        'value' => 1829419,
                                      ),
                                      507 => 
                                      array (
                                        'key' => 'GATES 32000016',
                                        'value' => 1829235,
                                      ),
                                      508 => 
                                      array (
                                        'key' => 'GATES 32000213',
                                        'value' => 1829420,
                                      ),
                                      509 => 
                                      array (
                                        'key' => 'GATES 32020011',
                                        'value' => 1829185,
                                      ),
                                      510 => 
                                      array (
                                        'key' => 'GATES 32020016',
                                        'value' => 1829390,
                                      ),
                                      511 => 
                                      array (
                                        'key' => 'GATES 32020021',
                                        'value' => 1829391,
                                      ),
                                      512 => 
                                      array (
                                        'key' => 'GATES 32020027',
                                        'value' => 1829392,
                                      ),
                                      513 => 
                                      array (
                                        'key' => 'GATES 32041328',
                                        'value' => 1829151,
                                      ),
                                      514 => 
                                      array (
                                        'key' => 'GATES 32041346',
                                        'value' => 1829126,
                                      ),
                                      515 => 
                                      array (
                                        'key' => 'GATES 32041349',
                                        'value' => 1829194,
                                      ),
                                      516 => 
                                      array (
                                        'key' => 'GATES 32041355',
                                        'value' => 1829136,
                                      ),
                                      517 => 
                                      array (
                                        'key' => 'GATES 32041364',
                                        'value' => 1829148,
                                      ),
                                      518 => 
                                      array (
                                        'key' => 'GATES 32041425',
                                        'value' => 1829267,
                                      ),
                                      519 => 
                                      array (
                                        'key' => 'GATES 32041437',
                                        'value' => 1829394,
                                      ),
                                      520 => 
                                      array (
                                        'key' => 'GATES 32050016',
                                        'value' => 1829284,
                                      ),
                                      521 => 
                                      array (
                                        'key' => 'GATES 32050026',
                                        'value' => 1829250,
                                      ),
                                      522 => 
                                      array (
                                        'key' => 'GATES 32050031',
                                        'value' => 1829259,
                                      ),
                                      523 => 
                                      array (
                                        'key' => 'GATES 32050036',
                                        'value' => 1829240,
                                      ),
                                      524 => 
                                      array (
                                        'key' => 'GATES 32050040',
                                        'value' => 1829208,
                                      ),
                                      525 => 
                                      array (
                                        'key' => 'GATES 32050041',
                                        'value' => 1829177,
                                      ),
                                      526 => 
                                      array (
                                        'key' => 'GATES 32050046',
                                        'value' => 1829146,
                                      ),
                                      527 => 
                                      array (
                                        'key' => 'GATES 32050049',
                                        'value' => 1829244,
                                      ),
                                      528 => 
                                      array (
                                        'key' => 'GATES 32050055',
                                        'value' => 1829181,
                                      ),
                                      529 => 
                                      array (
                                        'key' => 'GATES 32050226',
                                        'value' => 1829308,
                                      ),
                                      530 => 
                                      array (
                                        'key' => 'GATES 32050231',
                                        'value' => 1829310,
                                      ),
                                      531 => 
                                      array (
                                        'key' => 'GATES 32050236',
                                        'value' => 1829421,
                                      ),
                                      532 => 
                                      array (
                                        'key' => 'GATES 32050241',
                                        'value' => 1829303,
                                      ),
                                      533 => 
                                      array (
                                        'key' => 'GATES 32714397',
                                        'value' => 1829425,
                                      ),
                                      534 => 
                                      array (
                                        'key' => 'GATES 3624-0145',
                                        'value' => 1829261,
                                      ),
                                      535 => 
                                      array (
                                        'key' => 'GATES GASFLEX',
                                        'value' => 1829331,
                                      ),
                                      536 => 
                                      array (
                                        'key' => 'GATES STEAMKING',
                                        'value' => 1829107,
                                      ),
                                      537 => 
                                      array (
                                        'key' => 'GAUNTLET',
                                        'value' => 2015,
                                      ),
                                      538 => 
                                      array (
                                        'key' => 'GENERIC',
                                        'value' => 2016,
                                      ),
                                      539 => 
                                      array (
                                        'key' => 'GENERIC AIR',
                                        'value' => 1829359,
                                      ),
                                      540 => 
                                      array (
                                        'key' => 'GENERIC AIR 250',
                                        'value' => 1829312,
                                      ),
                                      541 => 
                                      array (
                                        'key' => 'GENERIC LOW TEMP TANK TRUCK',
                                        'value' => 2017,
                                      ),
                                      542 => 
                                      array (
                                        'key' => 'GENERIC PETRO TANK TRUCK',
                                        'value' => 1829253,
                                      ),
                                      543 => 
                                      array (
                                        'key' => 'GENERIC PL & GR',
                                        'value' => 1829332,
                                      ),
                                      544 => 
                                      array (
                                        'key' => 'GENERIC PLASTER & GROUT',
                                        'value' => 2018,
                                      ),
                                      545 => 
                                      array (
                                        'key' => 'GENERIC VACUUM',
                                        'value' => 2019,
                                      ),
                                      546 => 
                                      array (
                                        'key' => 'GENERIC WATER 100D',
                                        'value' => 1829299,
                                      ),
                                      547 => 
                                      array (
                                        'key' => 'GENERIC WATER DISCHARGE',
                                        'value' => 2020,
                                      ),
                                      548 => 
                                      array (
                                        'key' => 'GENERIC WATER S&D',
                                        'value' => 2021,
                                      ),
                                      549 => 
                                      array (
                                        'key' => 'GENLINE',
                                        'value' => 2022,
                                      ),
                                      550 => 
                                      array (
                                        'key' => 'GENLINE GL',
                                        'value' => 2023,
                                      ),
                                      551 => 
                                      array (
                                        'key' => 'GENLINE GL-802',
                                        'value' => 2024,
                                      ),
                                      552 => 
                                      array (
                                        'key' => 'GENLINE GL-803',
                                        'value' => 2025,
                                      ),
                                      553 => 
                                      array (
                                        'key' => 'GHX',
                                        'value' => 2026,
                                      ),
                                      554 => 
                                      array (
                                        'key' => 'GHX OILFIELD',
                                        'value' => 1829398,
                                      ),
                                      555 => 
                                      array (
                                        'key' => 'GHX OILFIELD S&D',
                                        'value' => 1829395,
                                      ),
                                      556 => 
                                      array (
                                        'key' => 'GHX PETRO XPOWER',
                                        'value' => 1829123,
                                      ),
                                      557 => 
                                      array (
                                        'key' => 'GHX WATER S&D',
                                        'value' => 1829397,
                                      ),
                                      558 => 
                                      array (
                                        'key' => 'GHX XPOWER OILFIELD FRAC TANK',
                                        'value' => 1829186,
                                      ),
                                      559 => 
                                      array (
                                        'key' => 'GILBARCO',
                                        'value' => 2027,
                                      ),
                                      560 => 
                                      array (
                                        'key' => 'GLOBAL',
                                        'value' => 2028,
                                      ),
                                      561 => 
                                      array (
                                        'key' => 'GLOBAL M24565-70-H',
                                        'value' => 1829204,
                                      ),
                                      562 => 
                                      array (
                                        'key' => 'GNSPEC',
                                        'value' => 2029,
                                      ),
                                      563 => 
                                      array (
                                        'key' => 'GNSPEC 100R12',
                                        'value' => 2030,
                                      ),
                                      564 => 
                                      array (
                                        'key' => 'GNSPEC 100R16',
                                        'value' => 2031,
                                      ),
                                      565 => 
                                      array (
                                        'key' => 'GNSPEC 100R17',
                                        'value' => 1829224,
                                      ),
                                      566 => 
                                      array (
                                        'key' => 'GNSPEC 100R2',
                                        'value' => 2032,
                                      ),
                                      567 => 
                                      array (
                                        'key' => 'GNSPEC 100R6',
                                        'value' => 2033,
                                      ),
                                      568 => 
                                      array (
                                        'key' => 'GNSPEC 200 AIR',
                                        'value' => 2034,
                                      ),
                                      569 => 
                                      array (
                                        'key' => 'GNSPEC 250 AIR',
                                        'value' => 2035,
                                      ),
                                      570 => 
                                      array (
                                        'key' => 'GNSPEC 300 AIR',
                                        'value' => 2036,
                                      ),
                                      571 => 
                                      array (
                                        'key' => 'GNSPEC 4001 PRESSURE WASHER',
                                        'value' => 2037,
                                      ),
                                      572 => 
                                      array (
                                        'key' => 'GNSPEC 4500 PRESSURE WASHER',
                                        'value' => 2038,
                                      ),
                                      573 => 
                                      array (
                                        'key' => 'GNSPEC NR SPRAY',
                                        'value' => 2039,
                                      ),
                                      574 => 
                                      array (
                                        'key' => 'GNSPEC PUSH ON 250',
                                        'value' => 2040,
                                      ),
                                      575 => 
                                      array (
                                        'key' => 'GOLD SNAKE',
                                        'value' => 2041,
                                      ),
                                      576 => 
                                      array (
                                        'key' => 'GOOD FLEX',
                                        'value' => 2042,
                                      ),
                                      577 => 
                                      array (
                                        'key' => 'GOODAL',
                                        'value' => 1829176,
                                      ),
                                      578 => 
                                      array (
                                        'key' => 'GOODALL',
                                        'value' => 2043,
                                      ),
                                      579 => 
                                      array (
                                        'key' => 'GOODALL CHEMICAL',
                                        'value' => 1829400,
                                      ),
                                      580 => 
                                      array (
                                        'key' => 'GORILLA',
                                        'value' => 2044,
                                      ),
                                      581 => 
                                      array (
                                        'key' => 'GRACO',
                                        'value' => 2045,
                                      ),
                                      582 => 
                                      array (
                                        'key' => 'GRACO 079055',
                                        'value' => 1829134,
                                      ),
                                      583 => 
                                      array (
                                        'key' => 'GRAINGER',
                                        'value' => 2046,
                                      ),
                                      584 => 
                                      array (
                                        'key' => 'GRAY DUCTING',
                                        'value' => 1829388,
                                      ),
                                      585 => 
                                      array (
                                        'key' => 'GRAY FLEXTRA LT',
                                        'value' => 2047,
                                      ),
                                      586 => 
                                      array (
                                        'key' => 'GRAY FLEXWING',
                                        'value' => 2048,
                                      ),
                                      587 => 
                                      array (
                                        'key' => 'GRAY FOOD',
                                        'value' => 2049,
                                      ),
                                      588 => 
                                      array (
                                        'key' => 'GRAY SUCTION',
                                        'value' => 2050,
                                      ),
                                      589 => 
                                      array (
                                        'key' => 'GREASE GUN HOSE',
                                        'value' => 2051,
                                      ),
                                      590 => 
                                      array (
                                        'key' => 'GREAT NECK',
                                        'value' => 2052,
                                      ),
                                      591 => 
                                      array (
                                        'key' => 'GREAT PLAINS',
                                        'value' => 2053,
                                      ),
                                      592 => 
                                      array (
                                        'key' => 'GREEN HORNET XF',
                                        'value' => 2054,
                                      ),
                                      593 => 
                                      array (
                                        'key' => 'GREEN XLPE 150',
                                        'value' => 1829325,
                                      ),
                                      594 => 
                                      array (
                                        'key' => 'GRINUS',
                                        'value' => 1829389,
                                      ),
                                      595 => 
                                      array (
                                        'key' => 'GTF',
                                        'value' => 1829954,
                                      ),
                                      596 => 
                                      array (
                                        'key' => 'GUNITE',
                                        'value' => 2055,
                                      ),
                                      597 => 
                                      array (
                                        'key' => 'GUNITE (TAN)',
                                        'value' => 1829353,
                                      ),
                                      598 => 
                                      array (
                                        'key' => 'HAMILON BLAST',
                                        'value' => 1829365,
                                      ),
                                      599 => 
                                      array (
                                        'key' => 'HAMILTON BLAST',
                                        'value' => 2056,
                                      ),
                                      600 => 
                                      array (
                                        'key' => 'HAMILTON HYDROCARBON DRAIN',
                                        'value' => 2057,
                                      ),
                                      601 => 
                                      array (
                                        'key' => 'Hammer Union',
                                        'value' => 1829962,
                                      ),
                                      602 => 
                                      array (
                                        'key' => 'HANLIO TWIN-LINE (GRADE R)',
                                        'value' => 1829417,
                                      ),
                                      603 => 
                                      array (
                                        'key' => 'HANLIO TWIN-LINE GRADE R',
                                        'value' => 2058,
                                      ),
                                      604 => 
                                      array (
                                        'key' => 'HART',
                                        'value' => 2059,
                                      ),
                                      605 => 
                                      array (
                                        'key' => 'HART BLACK SOFTWALL',
                                        'value' => 2060,
                                      ),
                                      606 => 
                                      array (
                                        'key' => 'HART FABCHEM',
                                        'value' => 2061,
                                      ),
                                      607 => 
                                      array (
                                        'key' => 'HART FLOUR DISCHARGE',
                                        'value' => 2062,
                                      ),
                                      608 => 
                                      array (
                                        'key' => 'HART HOT AIR',
                                        'value' => 2063,
                                      ),
                                      609 => 
                                      array (
                                        'key' => 'HARVEST',
                                        'value' => 2064,
                                      ),
                                      610 => 
                                      array (
                                        'key' => 'HAWAII MARINE',
                                        'value' => 1829377,
                                      ),
                                      611 => 
                                      array (
                                        'key' => 'HAWK PD',
                                        'value' => 1829522,
                                      ),
                                      612 => 
                                      array (
                                        'key' => 'HD AIR',
                                        'value' => 2065,
                                      ),
                                      613 => 
                                      array (
                                        'key' => 'HD AIR & WATER',
                                        'value' => 2066,
                                      ),
                                      614 => 
                                      array (
                                        'key' => 'HD AIR 300',
                                        'value' => 1829289,
                                      ),
                                      615 => 
                                      array (
                                        'key' => 'HD INDUSTRIAL VACUUM',
                                        'value' => 2067,
                                      ),
                                      616 => 
                                      array (
                                        'key' => 'HD PETRO TRANSFER',
                                        'value' => 2068,
                                      ),
                                      617 => 
                                      array (
                                        'key' => 'HD VACUUM',
                                        'value' => 2069,
                                      ),
                                      618 => 
                                      array (
                                        'key' => 'HD WATER DISCHARGE',
                                        'value' => 2070,
                                      ),
                                      619 => 
                                      array (
                                        'key' => 'HD WATER SD',
                                        'value' => 2071,
                                      ),
                                      620 => 
                                      array (
                                        'key' => 'HEALY LOW PERM',
                                        'value' => 1829101,
                                      ),
                                      621 => 
                                      array (
                                        'key' => 'HEATER HOSE 20R3D2',
                                        'value' => 2072,
                                      ),
                                      622 => 
                                      array (
                                        'key' => 'HEATER WATER',
                                        'value' => 2073,
                                      ),
                                      623 => 
                                      array (
                                        'key' => 'HEAVY DUTY STEAM PILE DRIVER',
                                        'value' => 2074,
                                      ),
                                      624 => 
                                      array (
                                        'key' => 'HEWITT',
                                        'value' => 2075,
                                      ),
                                      625 => 
                                      array (
                                        'key' => 'HEWITT AIRCRAFT',
                                        'value' => 2076,
                                      ),
                                      626 => 
                                      array (
                                        'key' => 'HEX',
                                        'value' => 1829505,
                                      ),
                                      627 => 
                                      array (
                                        'key' => 'HI-MINER II',
                                        'value' => 2077,
                                      ),
                                      628 => 
                                      array (
                                        'key' => 'HI-PER',
                                        'value' => 2078,
                                      ),
                                      629 => 
                                      array (
                                        'key' => 'HIGHLAND BRINE WATER S&D',
                                        'value' => 1829287,
                                      ),
                                      630 => 
                                      array (
                                        'key' => 'HIGHLAND POTABLE WATER S&D',
                                        'value' => 1829262,
                                      ),
                                      631 => 
                                      array (
                                        'key' => 'HIGHLAND RAW WATER S&D',
                                        'value' => 1829268,
                                      ),
                                      632 => 
                                      array (
                                        'key' => 'HIGHLAND WASTE WATER S&D',
                                        'value' => 1829315,
                                      ),
                                      633 => 
                                      array (
                                        'key' => 'HIPER WATER',
                                        'value' => 2079,
                                      ),
                                      634 => 
                                      array (
                                        'key' => 'HITECH WASHDOWN',
                                        'value' => 1829301,
                                      ),
                                      635 => 
                                      array (
                                        'key' => 'HOOSIER FOOD TL',
                                        'value' => 2080,
                                      ),
                                      636 => 
                                      array (
                                        'key' => 'HOSCO',
                                        'value' => 2081,
                                      ),
                                      637 => 
                                      array (
                                        'key' => 'HOSE ASSEMBLY COLD',
                                        'value' => 1829095,
                                      ),
                                      638 => 
                                      array (
                                        'key' => 'HOSE ASSEMBLY HOT',
                                        'value' => 1829097,
                                      ),
                                      639 => 
                                      array (
                                        'key' => 'HOSE GUYS',
                                        'value' => 1829344,
                                      ),
                                      640 => 
                                      array (
                                        'key' => 'Hose Joiner',
                                        'value' => 1829972,
                                      ),
                                      641 => 
                                      array (
                                        'key' => 'Hose Medner with Sight Glass',
                                        'value' => 1829990,
                                      ),
                                      642 => 
                                      array (
                                        'key' => 'Hose Mender',
                                        'value' => 1829982,
                                      ),
                                      643 => 
                                      array (
                                        'key' => 'Hose Mender with Sight Glass',
                                        'value' => 1829983,
                                      ),
                                      644 => 
                                      array (
                                        'key' => 'Hose Mender, Tee',
                                        'value' => 1829984,
                                      ),
                                      645 => 
                                      array (
                                        'key' => 'HOSE POWER',
                                        'value' => 2082,
                                      ),
                                      646 => 
                                      array (
                                        'key' => 'HOSEPOWER',
                                        'value' => 2083,
                                      ),
                                      647 => 
                                      array (
                                        'key' => 'HOSEPOWER PLASTER & GROUT',
                                        'value' => 1829401,
                                      ),
                                      648 => 
                                      array (
                                        'key' => 'HOT AIR',
                                        'value' => 1829319,
                                      ),
                                      649 => 
                                      array (
                                        'key' => 'HOT TAR & ASPHALT EN13482',
                                        'value' => 2084,
                                      ),
                                      650 => 
                                      array (
                                        'key' => 'HOT TAR & ASPHALT ROUGH BORE',
                                        'value' => 2085,
                                      ),
                                      651 => 
                                      array (
                                        'key' => 'HOT WATER ELITE',
                                        'value' => 2086,
                                      ),
                                      652 => 
                                      array (
                                        'key' => 'HR4',
                                        'value' => 2087,
                                      ),
                                      653 => 
                                      array (
                                        'key' => 'HR6',
                                        'value' => 2088,
                                      ),
                                      654 => 
                                      array (
                                        'key' => 'HSS WATER JETTING',
                                        'value' => 1829385,
                                      ),
                                      655 => 
                                      array (
                                        'key' => 'HUDSON',
                                        'value' => 2089,
                                      ),
                                      656 => 
                                      array (
                                        'key' => 'HUMIDIFIER HOSE',
                                        'value' => 2090,
                                      ),
                                      657 => 
                                      array (
                                        'key' => 'HUSKY',
                                        'value' => 2091,
                                      ),
                                      658 => 
                                      array (
                                        'key' => 'HVLP NON-CONDUCTIVE',
                                        'value' => 2092,
                                      ),
                                      659 => 
                                      array (
                                        'key' => 'HW DRY CEMENT & BARITES',
                                        'value' => 2093,
                                      ),
                                      660 => 
                                      array (
                                        'key' => 'HY-T HEATER HOSE',
                                        'value' => 1829350,
                                      ),
                                      661 => 
                                      array (
                                        'key' => 'HY-T PLUS',
                                        'value' => 1829503,
                                      ),
                                      662 => 
                                      array (
                                        'key' => 'HY-T TORQUE TEAM',
                                        'value' => 1829494,
                                      ),
                                      663 => 
                                      array (
                                        'key' => 'HY-T TORQUE TEAM LAMINATED',
                                        'value' => 1829502,
                                      ),
                                      664 => 
                                      array (
                                        'key' => 'HY-T TORQUE TEAM PLUS',
                                        'value' => 1829499,
                                      ),
                                      665 => 
                                      array (
                                        'key' => 'HY-T WEDGE',
                                        'value' => 1829506,
                                      ),
                                      666 => 
                                      array (
                                        'key' => 'HY-T WEDGE TORQUE TEAM',
                                        'value' => 1829501,
                                      ),
                                      667 => 
                                      array (
                                        'key' => 'HYDROCARBON DRAIN',
                                        'value' => 2094,
                                      ),
                                      668 => 
                                      array (
                                        'key' => 'HYDROVATOR',
                                        'value' => 2095,
                                      ),
                                      669 => 
                                      array (
                                        'key' => 'HYDROVATOR PLUS',
                                        'value' => 2096,
                                      ),
                                      670 => 
                                      array (
                                        'key' => 'I.R.F.',
                                        'value' => 2097,
                                      ),
                                      671 => 
                                      array (
                                        'key' => 'IBM COOLING WATER',
                                        'value' => 2098,
                                      ),
                                      672 => 
                                      array (
                                        'key' => 'IBRS',
                                        'value' => 2099,
                                      ),
                                      673 => 
                                      array (
                                        'key' => 'IBRS FISH HOSE',
                                        'value' => 1829113,
                                      ),
                                      674 => 
                                      array (
                                        'key' => 'IBRS FISH S&D',
                                        'value' => 1829195,
                                      ),
                                      675 => 
                                      array (
                                        'key' => 'IBRS SANITARY',
                                        'value' => 2100,
                                      ),
                                      676 => 
                                      array (
                                        'key' => 'ICE CUTTER HOSE',
                                        'value' => 2101,
                                      ),
                                      677 => 
                                      array (
                                        'key' => 'ICS GROUP AIR',
                                        'value' => 1829356,
                                      ),
                                      678 => 
                                      array (
                                        'key' => 'IMPERL POLARSHIELD',
                                        'value' => 1829216,
                                      ),
                                      679 => 
                                      array (
                                        'key' => 'INERT GAS',
                                        'value' => 2102,
                                      ),
                                      680 => 
                                      array (
                                        'key' => 'INET COOLING',
                                        'value' => 2103,
                                      ),
                                      681 => 
                                      array (
                                        'key' => 'INFINITY CHEM',
                                        'value' => 1829288,
                                      ),
                                      682 => 
                                      array (
                                        'key' => 'INFINITY CHEMICAL',
                                        'value' => 2104,
                                      ),
                                      683 => 
                                      array (
                                        'key' => 'INFINITY FOOD',
                                        'value' => 2105,
                                      ),
                                      684 => 
                                      array (
                                        'key' => 'INFINITY FUEL DROP',
                                        'value' => 2106,
                                      ),
                                      685 => 
                                      array (
                                        'key' => 'INFINITY FUEL DROP HD',
                                        'value' => 2107,
                                      ),
                                      686 => 
                                      array (
                                        'key' => 'INFINITY MILK',
                                        'value' => 2108,
                                      ),
                                      687 => 
                                      array (
                                        'key' => 'INJECTION COOLANT',
                                        'value' => 2109,
                                      ),
                                      688 => 
                                      array (
                                        'key' => 'INLET HOSE',
                                        'value' => 2110,
                                      ),
                                      689 => 
                                      array (
                                        'key' => 'Inline Orifice Tubes',
                                        'value' => 1829996,
                                      ),
                                      690 => 
                                      array (
                                        'key' => 'INSTA-GRIP',
                                        'value' => 1829109,
                                      ),
                                      691 => 
                                      array (
                                        'key' => 'INSTA-GRIP 250',
                                        'value' => 2111,
                                      ),
                                      692 => 
                                      array (
                                        'key' => 'INSTA-GRIP 300',
                                        'value' => 2112,
                                      ),
                                      693 => 
                                      array (
                                        'key' => 'INSTA-GRIP HT',
                                        'value' => 2113,
                                      ),
                                      694 => 
                                      array (
                                        'key' => 'INSTA-GRIP SP',
                                        'value' => 2114,
                                      ),
                                      695 => 
                                      array (
                                        'key' => 'INSTA-GRIP TC',
                                        'value' => 2115,
                                      ),
                                      696 => 
                                      array (
                                        'key' => 'INSTA-LOCK',
                                        'value' => 2116,
                                      ),
                                      697 => 
                                      array (
                                        'key' => 'INSTA-LOCK ADAPTER',
                                        'value' => 1829281,
                                      ),
                                      698 => 
                                      array (
                                        'key' => 'INSTA-LOCK COUPLER',
                                        'value' => 1829269,
                                      ),
                                      699 => 
                                      array (
                                        'key' => 'INSTA-LOCK CRIMP SLEEVE',
                                        'value' => 1829290,
                                      ),
                                      700 => 
                                      array (
                                        'key' => 'INSTA-LOCK DUST CAP',
                                        'value' => 1829167,
                                      ),
                                      701 => 
                                      array (
                                        'key' => 'INSTA-LOCK DUST PLUG',
                                        'value' => 1829295,
                                      ),
                                      702 => 
                                      array (
                                        'key' => 'INSTA-LOCK FERRULE',
                                        'value' => 1829278,
                                      ),
                                      703 => 
                                      array (
                                        'key' => 'INSTA-LOCK GASKET',
                                        'value' => 1829302,
                                      ),
                                      704 => 
                                      array (
                                        'key' => 'INSTA-LOCK HOSE STEM',
                                        'value' => 1829277,
                                      ),
                                      705 => 
                                      array (
                                        'key' => 'INSTA-LOCK JUMP SIZE',
                                        'value' => 1829251,
                                      ),
                                      706 => 
                                      array (
                                        'key' => 'INSTA-LOCK SPOOL ADAPTER',
                                        'value' => 1829314,
                                      ),
                                      707 => 
                                      array (
                                        'key' => 'INSTA-LOCK TYPE A',
                                        'value' => 1829243,
                                      ),
                                      708 => 
                                      array (
                                        'key' => 'INSTA-LOCK TYPE B',
                                        'value' => 1829248,
                                      ),
                                      709 => 
                                      array (
                                        'key' => 'INSTA-LOCK TYPE C',
                                        'value' => 1829119,
                                      ),
                                      710 => 
                                      array (
                                        'key' => 'INSTA-LOCK TYPE D',
                                        'value' => 1829115,
                                      ),
                                      711 => 
                                      array (
                                        'key' => 'INSTA-LOCK TYPE E',
                                        'value' => 1829223,
                                      ),
                                      712 => 
                                      array (
                                        'key' => 'INSTA-LOCK TYPE F',
                                        'value' => 1829285,
                                      ),
                                      713 => 
                                      array (
                                        'key' => 'INSTA-POWER',
                                        'value' => 1829496,
                                      ),
                                      714 => 
                                      array (
                                        'key' => 'INTERCHEM',
                                        'value' => 2117,
                                      ),
                                      715 => 
                                      array (
                                        'key' => 'INTERM',
                                        'value' => 2118,
                                      ),
                                      716 => 
                                      array (
                                        'key' => 'INTERNATIONAL BELT',
                                        'value' => 2119,
                                      ),
                                      717 => 
                                      array (
                                        'key' => 'INTERNATIONAL BELT VERSIFLO S&D',
                                        'value' => 1829393,
                                      ),
                                      718 => 
                                      array (
                                        'key' => 'IRC DRILL WATER',
                                        'value' => 2120,
                                      ),
                                      719 => 
                                      array (
                                        'key' => 'IRPCO',
                                        'value' => 2121,
                                      ),
                                      720 => 
                                      array (
                                        'key' => 'IRPCO RED FUEL OIL',
                                        'value' => 1829155,
                                      ),
                                      721 => 
                                      array (
                                        'key' => 'IRR',
                                        'value' => 2122,
                                      ),
                                      722 => 
                                      array (
                                        'key' => 'IRR FLEX JET',
                                        'value' => 2123,
                                      ),
                                      723 => 
                                      array (
                                        'key' => 'IRRIGATION BOOT',
                                        'value' => 2124,
                                      ),
                                      724 => 
                                      array (
                                        'key' => 'ISO 3821',
                                        'value' => 2125,
                                      ),
                                      725 => 
                                      array (
                                        'key' => 'ISO 8031',
                                        'value' => 2126,
                                      ),
                                      726 => 
                                      array (
                                        'key' => 'ITALPR',
                                        'value' => 2127,
                                      ),
                                      727 => 
                                      array (
                                        'key' => 'ITALPR TEFLON',
                                        'value' => 2128,
                                      ),
                                      728 => 
                                      array (
                                        'key' => 'JACKHAMMER',
                                        'value' => 2129,
                                      ),
                                      729 => 
                                      array (
                                        'key' => 'JB INDUSTRIES',
                                        'value' => 2130,
                                      ),
                                      730 => 
                                      array (
                                        'key' => 'JET RANGER',
                                        'value' => 2131,
                                      ),
                                      731 => 
                                      array (
                                        'key' => 'JETTING',
                                        'value' => 2132,
                                      ),
                                      732 => 
                                      array (
                                        'key' => 'JETTING AND UTILITY',
                                        'value' => 2133,
                                      ),
                                      733 => 
                                      array (
                                        'key' => 'JETTING UTILITY',
                                        'value' => 1829339,
                                      ),
                                      734 => 
                                      array (
                                        'key' => 'JGB INDUSTRIES',
                                        'value' => 2134,
                                      ),
                                      735 => 
                                      array (
                                        'key' => 'JIC 37 Flare',
                                        'value' => 1830011,
                                      ),
                                      736 => 
                                      array (
                                        'key' => 'JIC 37 Flare (SAE J514)',
                                        'value' => 1829945,
                                      ),
                                      737 => 
                                      array (
                                        'key' => 'JIS 30 (Paralled Pipe Threads)',
                                        'value' => 1829971,
                                      ),
                                      738 => 
                                      array (
                                        'key' => 'JIS 30 (Parallel Pipe Threads)',
                                        'value' => 1829978,
                                      ),
                                      739 => 
                                      array (
                                        'key' => 'JOHN DEERE',
                                        'value' => 2135,
                                      ),
                                      740 => 
                                      array (
                                        'key' => 'JOHN DEERE WATER S&D',
                                        'value' => 1829271,
                                      ),
                                      741 => 
                                      array (
                                        'key' => 'KAPTEC ULTRAFLEX',
                                        'value' => 2136,
                                      ),
                                      742 => 
                                      array (
                                        'key' => 'KAPTECH FOOD DICHARGE',
                                        'value' => 2137,
                                      ),
                                      743 => 
                                      array (
                                        'key' => 'KCRUBBER AUGER ARC PILING',
                                        'value' => 1829175,
                                      ),
                                      744 => 
                                      array (
                                        'key' => 'KELCO BLAST',
                                        'value' => 2138,
                                      ),
                                      745 => 
                                      array (
                                        'key' => 'KETEK FLEX PETROLEUM',
                                        'value' => 2139,
                                      ),
                                      746 => 
                                      array (
                                        'key' => 'KIDDE 20079 FIRE EX UL92',
                                        'value' => 1829219,
                                      ),
                                      747 => 
                                      array (
                                        'key' => 'KINK GUARD',
                                        'value' => 1829280,
                                      ),
                                      748 => 
                                      array (
                                        'key' => 'KINKGUARD',
                                        'value' => 2140,
                                      ),
                                      749 => 
                                      array (
                                        'key' => 'KINKGUARD GARDEN HOSE',
                                        'value' => 1829372,
                                      ),
                                      750 => 
                                      array (
                                        'key' => 'Komatsu 30 Flare with Metric Threads',
                                        'value' => 1829970,
                                      ),
                                      751 => 
                                      array (
                                        'key' => 'Komatsu Flange',
                                        'value' => 1829963,
                                      ),
                                      752 => 
                                      array (
                                        'key' => 'L&G GE SANDER HOSE',
                                        'value' => 1829139,
                                      ),
                                      753 => 
                                      array (
                                        'key' => 'L&G ROCK DUST SW HD',
                                        'value' => 1829121,
                                      ),
                                      754 => 
                                      array (
                                        'key' => 'LABOUR BLUCOR COUPLING',
                                        'value' => 2141,
                                      ),
                                      755 => 
                                      array (
                                        'key' => 'LACTOPAL',
                                        'value' => 2142,
                                      ),
                                      756 => 
                                      array (
                                        'key' => 'LACTOPAL L',
                                        'value' => 1829414,
                                      ),
                                      757 => 
                                      array (
                                        'key' => 'LAKECHARLES',
                                        'value' => 2143,
                                      ),
                                      758 => 
                                      array (
                                        'key' => 'LEGACY TPU',
                                        'value' => 2144,
                                      ),
                                      759 => 
                                      array (
                                        'key' => 'LG NITRILE',
                                        'value' => 2145,
                                      ),
                                      760 => 
                                      array (
                                        'key' => 'LIGHTRAC',
                                        'value' => 2146,
                                      ),
                                      761 => 
                                      array (
                                        'key' => 'LIGHTWEIGHT VACUUM',
                                        'value' => 2147,
                                      ),
                                      762 => 
                                      array (
                                        'key' => 'LINECRETE',
                                        'value' => 2148,
                                      ),
                                      763 => 
                                      array (
                                        'key' => 'LIQUID MUD',
                                        'value' => 2149,
                                      ),
                                      764 => 
                                      array (
                                        'key' => 'LIQUID MUD YS',
                                        'value' => 2150,
                                      ),
                                      765 => 
                                      array (
                                        'key' => 'LIQUIFORCE',
                                        'value' => 2151,
                                      ),
                                      766 => 
                                      array (
                                        'key' => 'LPG DELIVERY PRO',
                                        'value' => 2152,
                                      ),
                                      767 => 
                                      array (
                                        'key' => 'LUMPKIN',
                                        'value' => 1829203,
                                      ),
                                      768 => 
                                      array (
                                        'key' => 'LW ARCTIC TANK TRUCK',
                                        'value' => 2153,
                                      ),
                                      769 => 
                                      array (
                                        'key' => 'LW BLACK FLEXTRA II',
                                        'value' => 2154,
                                      ),
                                      770 => 
                                      array (
                                        'key' => 'LW INDUSTRIAL VACUUM',
                                        'value' => 2155,
                                      ),
                                      771 => 
                                      array (
                                        'key' => 'M&P MINE CONDUIT',
                                        'value' => 2156,
                                      ),
                                      772 => 
                                      array (
                                        'key' => 'M13531J-B3A',
                                        'value' => 1829133,
                                      ),
                                      773 => 
                                      array (
                                        'key' => 'MADE IN USA GARDEN',
                                        'value' => 1829273,
                                      ),
                                      774 => 
                                      array (
                                        'key' => 'MANUS BLAST',
                                        'value' => 2157,
                                      ),
                                      775 => 
                                      array (
                                        'key' => 'MANUS BLAST WHIP',
                                        'value' => 2158,
                                      ),
                                      776 => 
                                      array (
                                        'key' => 'MARIAN',
                                        'value' => 2159,
                                      ),
                                      777 => 
                                      array (
                                        'key' => 'MARINE BILGE',
                                        'value' => 2160,
                                      ),
                                      778 => 
                                      array (
                                        'key' => 'MARINE EXHAUST HOSE',
                                        'value' => 2161,
                                      ),
                                      779 => 
                                      array (
                                        'key' => 'MARINE FUEL FEED VENT J1527 B2',
                                        'value' => 2162,
                                      ),
                                      780 => 
                                      array (
                                        'key' => 'MARINE FUEL FILL',
                                        'value' => 2163,
                                      ),
                                      781 => 
                                      array (
                                        'key' => 'MARINE FUEL LINE',
                                        'value' => 2164,
                                      ),
                                      782 => 
                                      array (
                                        'key' => 'MARINE HARDWALL WET EXHAUST',
                                        'value' => 2165,
                                      ),
                                      783 => 
                                      array (
                                        'key' => 'MARINE LIVEWELL',
                                        'value' => 2166,
                                      ),
                                      784 => 
                                      array (
                                        'key' => 'MARINE OIL FILL',
                                        'value' => 2167,
                                      ),
                                      785 => 
                                      array (
                                        'key' => 'MARINE SANITATION',
                                        'value' => 2168,
                                      ),
                                      786 => 
                                      array (
                                        'key' => 'MARINE SOFTWALL WET EXHAUST',
                                        'value' => 2169,
                                      ),
                                      787 => 
                                      array (
                                        'key' => 'MARINE VACUUM',
                                        'value' => 2170,
                                      ),
                                      788 => 
                                      array (
                                        'key' => 'MAST-AIR',
                                        'value' => 2171,
                                      ),
                                      789 => 
                                      array (
                                        'key' => 'MASTERCOOL',
                                        'value' => 2172,
                                      ),
                                      790 => 
                                      array (
                                        'key' => 'MASTHD',
                                        'value' => 2173,
                                      ),
                                      791 => 
                                      array (
                                        'key' => 'MASTHEAD',
                                        'value' => 1829258,
                                      ),
                                      792 => 
                                      array (
                                        'key' => 'MASTHEAD CONTRACTOR\'S WATER',
                                        'value' => 1829352,
                                      ),
                                      793 => 
                                      array (
                                        'key' => 'MATERIAL HANDLING',
                                        'value' => 2174,
                                      ),
                                      794 => 
                                      array (
                                        'key' => 'MATERIAL HANDLING 150',
                                        'value' => 1829351,
                                      ),
                                      795 => 
                                      array (
                                        'key' => 'MATERIAL HANDLING DISCHARGE',
                                        'value' => 2175,
                                      ),
                                      796 => 
                                      array (
                                        'key' => 'MATERIAL HANDLING DISCHARGE 75',
                                        'value' => 1829334,
                                      ),
                                      797 => 
                                      array (
                                        'key' => 'MAXXIM PREMIER ULTRA',
                                        'value' => 2176,
                                      ),
                                      798 => 
                                      array (
                                        'key' => 'MCCARTY WATER S&D',
                                        'value' => 2177,
                                      ),
                                      799 => 
                                      array (
                                        'key' => 'MCGILL',
                                        'value' => 2178,
                                      ),
                                      800 => 
                                      array (
                                        'key' => 'MECR&S',
                                        'value' => 2179,
                                      ),
                                      801 => 
                                      array (
                                        'key' => 'MECR&S PAINT SPRAY',
                                        'value' => 2180,
                                      ),
                                      802 => 
                                      array (
                                        'key' => 'MER OILFIELD SUCTION',
                                        'value' => 2181,
                                      ),
                                      803 => 
                                      array (
                                        'key' => 'MERMAR',
                                        'value' => 2182,
                                      ),
                                      804 => 
                                      array (
                                        'key' => 'MESA',
                                        'value' => 2183,
                                      ),
                                      805 => 
                                      array (
                                        'key' => 'MESA AMMONIUM NITRATE PELLET',
                                        'value' => 2184,
                                      ),
                                      806 => 
                                      array (
                                        'key' => 'MESA DRAIN',
                                        'value' => 2185,
                                      ),
                                      807 => 
                                      array (
                                        'key' => 'MESA GUNITE',
                                        'value' => 2186,
                                      ),
                                      808 => 
                                      array (
                                        'key' => 'MESA PLASTER & GROUT',
                                        'value' => 2187,
                                      ),
                                      809 => 
                                      array (
                                        'key' => 'MESA REFRACTORY GUNITE',
                                        'value' => 2188,
                                      ),
                                      810 => 
                                      array (
                                        'key' => 'MESA ROOF DRAIN',
                                        'value' => 2189,
                                      ),
                                      811 => 
                                      array (
                                        'key' => 'MESA ROOF DRAIN CHEMICAL',
                                        'value' => 2190,
                                      ),
                                      812 => 
                                      array (
                                        'key' => 'Metal Clips',
                                        'value' => 1830004,
                                      ),
                                      813 => 
                                      array (
                                        'key' => 'METRIC',
                                        'value' => 1829524,
                                      ),
                                      814 => 
                                      array (
                                        'key' => 'MH 500',
                                        'value' => 1829296,
                                      ),
                                      815 => 
                                      array (
                                        'key' => 'MH 75',
                                        'value' => 1829321,
                                      ),
                                      816 => 
                                      array (
                                        'key' => 'MHPRF 11588G II ST',
                                        'value' => 2191,
                                      ),
                                      817 => 
                                      array (
                                        'key' => 'MIDWEST',
                                        'value' => 2192,
                                      ),
                                      818 => 
                                      array (
                                        'key' => 'MIDWEST BELTING',
                                        'value' => 1829336,
                                      ),
                                      819 => 
                                      array (
                                        'key' => 'MIL 3992F',
                                        'value' => 1829222,
                                      ),
                                      820 => 
                                      array (
                                        'key' => 'MIL A-A-59566',
                                        'value' => 2193,
                                      ),
                                      821 => 
                                      array (
                                        'key' => 'MIL A-A-59567',
                                        'value' => 2194,
                                      ),
                                      822 => 
                                      array (
                                        'key' => 'MIL AA-59567 3-1',
                                        'value' => 1829292,
                                      ),
                                      823 => 
                                      array (
                                        'key' => 'MIL-A-A-59565',
                                        'value' => 2195,
                                      ),
                                      824 => 
                                      array (
                                        'key' => 'MIL-DTL-13444-I',
                                        'value' => 2196,
                                      ),
                                      825 => 
                                      array (
                                        'key' => 'MIL-DTL-13444-III',
                                        'value' => 2197,
                                      ),
                                      826 => 
                                      array (
                                        'key' => 'MIL-DTL-13531 TYPE II, CL A',
                                        'value' => 2198,
                                      ),
                                      827 => 
                                      array (
                                        'key' => 'MIL-DTL-17505',
                                        'value' => 2199,
                                      ),
                                      828 => 
                                      array (
                                        'key' => 'MIL-DTL-20176',
                                        'value' => 2200,
                                      ),
                                      829 => 
                                      array (
                                        'key' => 'MIL-DTL-22240',
                                        'value' => 2201,
                                      ),
                                      830 => 
                                      array (
                                        'key' => 'MIL-DTL-27516',
                                        'value' => 2202,
                                      ),
                                      831 => 
                                      array (
                                        'key' => 'MIL-DTL-29210',
                                        'value' => 2203,
                                      ),
                                      832 => 
                                      array (
                                        'key' => 'MIL-DTL-6615',
                                        'value' => 2204,
                                      ),
                                      833 => 
                                      array (
                                        'key' => 'MIL-DTL-8788',
                                        'value' => 1830042,
                                      ),
                                      834 => 
                                      array (
                                        'key' => 'MIL-H-24136/4',
                                        'value' => 1829435,
                                      ),
                                      835 => 
                                      array (
                                        'key' => 'MIL-H-24580',
                                        'value' => 2205,
                                      ),
                                      836 => 
                                      array (
                                        'key' => 'MIL-H-82127',
                                        'value' => 2206,
                                      ),
                                      837 => 
                                      array (
                                        'key' => 'MIL-PRF-11588 TYPE I',
                                        'value' => 2207,
                                      ),
                                      838 => 
                                      array (
                                        'key' => 'MIL-PRF-11588 TYPE III',
                                        'value' => 2208,
                                      ),
                                      839 => 
                                      array (
                                        'key' => 'MIL-PRF-370 TYPE A',
                                        'value' => 2209,
                                      ),
                                      840 => 
                                      array (
                                        'key' => 'MIL-PRF-370 TYPE B',
                                        'value' => 2210,
                                      ),
                                      841 => 
                                      array (
                                        'key' => 'MILTARY',
                                        'value' => 2211,
                                      ),
                                      842 => 
                                      array (
                                        'key' => 'MILTON',
                                        'value' => 2212,
                                      ),
                                      843 => 
                                      array (
                                        'key' => 'MINE CONDUIT',
                                        'value' => 2213,
                                      ),
                                      844 => 
                                      array (
                                        'key' => 'MINNICH WATER HD',
                                        'value' => 1829157,
                                      ),
                                      845 => 
                                      array (
                                        'key' => 'MISC',
                                        'value' => 1829256,
                                      ),
                                      846 => 
                                      array (
                                        'key' => 'MIT TEKTON',
                                        'value' => 1829142,
                                      ),
                                      847 => 
                                      array (
                                        'key' => 'MOCCASIN',
                                        'value' => 2214,
                                      ),
                                      848 => 
                                      array (
                                        'key' => 'MORRIS AIR SEEDER',
                                        'value' => 2215,
                                      ),
                                      849 => 
                                      array (
                                        'key' => 'MORRIS AIR SEEDER LT',
                                        'value' => 2216,
                                      ),
                                      850 => 
                                      array (
                                        'key' => 'MPI',
                                        'value' => 2217,
                                      ),
                                      851 => 
                                      array (
                                        'key' => 'MPI 132-0580',
                                        'value' => 1829159,
                                      ),
                                      852 => 
                                      array (
                                        'key' => 'MPI 350-0380',
                                        'value' => 1829230,
                                      ),
                                      853 => 
                                      array (
                                        'key' => 'MPI 350-0560',
                                        'value' => 1829153,
                                      ),
                                      854 => 
                                      array (
                                        'key' => 'MPI 350-0580',
                                        'value' => 1829093,
                                      ),
                                      855 => 
                                      array (
                                        'key' => 'MPI HW EXHAUST',
                                        'value' => 1829300,
                                      ),
                                      856 => 
                                      array (
                                        'key' => 'MPI HW FUEL FILL',
                                        'value' => 1829137,
                                      ),
                                      857 => 
                                      array (
                                        'key' => 'MPI PREMIUM-GUARD MARINE',
                                        'value' => 2218,
                                      ),
                                      858 => 
                                      array (
                                        'key' => 'MRS',
                                        'value' => 1829338,
                                      ),
                                      859 => 
                                      array (
                                        'key' => 'MSA AIR BREATHING',
                                        'value' => 1829117,
                                      ),
                                      860 => 
                                      array (
                                        'key' => 'MUD CUTTING HW',
                                        'value' => 2219,
                                      ),
                                      861 => 
                                      array (
                                        'key' => 'MUD RETURN LINE',
                                        'value' => 2220,
                                      ),
                                      862 => 
                                      array (
                                        'key' => 'MUD STACKING',
                                        'value' => 2221,
                                      ),
                                      863 => 
                                      array (
                                        'key' => 'MULTISTREAM HW',
                                        'value' => 2222,
                                      ),
                                      864 => 
                                      array (
                                        'key' => 'MULTISTREAM SW',
                                        'value' => 2223,
                                      ),
                                      865 => 
                                      array (
                                        'key' => 'NAFIRE',
                                        'value' => 2224,
                                      ),
                                      866 => 
                                      array (
                                        'key' => 'NAVISTAR',
                                        'value' => 2225,
                                      ),
                                      867 => 
                                      array (
                                        'key' => 'NELSON DUNN',
                                        'value' => 2226,
                                      ),
                                      868 => 
                                      array (
                                        'key' => 'NELSON DUNN CABLE COVER',
                                        'value' => 1829183,
                                      ),
                                      869 => 
                                      array (
                                        'key' => 'NEOTHANE',
                                        'value' => 1829508,
                                      ),
                                      870 => 
                                      array (
                                        'key' => 'NEPTUNE',
                                        'value' => 2227,
                                      ),
                                      871 => 
                                      array (
                                        'key' => 'NESI OILFIELD',
                                        'value' => 2228,
                                      ),
                                      872 => 
                                      array (
                                        'key' => 'NEWLINE',
                                        'value' => 2229,
                                      ),
                                      873 => 
                                      array (
                                        'key' => 'NEWLINE VINTNER RESERVE',
                                        'value' => 1829255,
                                      ),
                                      874 => 
                                      array (
                                        'key' => 'NEWLINE WALKWAY WATER',
                                        'value' => 1829403,
                                      ),
                                      875 => 
                                      array (
                                        'key' => 'NISHIN',
                                        'value' => 2230,
                                      ),
                                      876 => 
                                      array (
                                        'key' => 'NISSHIN',
                                        'value' => 2231,
                                      ),
                                      877 => 
                                      array (
                                        'key' => 'NITRO FLOOD WATER S&D',
                                        'value' => 2232,
                                      ),
                                      878 => 
                                      array (
                                        'key' => 'NITRO R&C WATER S&D',
                                        'value' => 2233,
                                      ),
                                      879 => 
                                      array (
                                        'key' => 'NITROGEN SERVICE',
                                        'value' => 2234,
                                      ),
                                      880 => 
                                      array (
                                        'key' => 'NOTRAX T43S5050RD',
                                        'value' => 1829207,
                                      ),
                                      881 => 
                                      array (
                                        'key' => 'NOV',
                                        'value' => 2235,
                                      ),
                                      882 => 
                                      array (
                                        'key' => 'NPETRO LW',
                                        'value' => 2236,
                                      ),
                                      883 => 
                                      array (
                                        'key' => 'NPM API',
                                        'value' => 1829979,
                                      ),
                                      884 => 
                                      array (
                                        'key' => 'NPSM',
                                        'value' => 1829953,
                                      ),
                                      885 => 
                                      array (
                                        'key' => 'NPT API',
                                        'value' => 1829974,
                                      ),
                                      886 => 
                                      array (
                                        'key' => 'NPT API Hammer Union ',
                                        'value' => 1830010,
                                      ),
                                      887 => 
                                      array (
                                        'key' => 'NPTF',
                                        'value' => 1829952,
                                      ),
                                      888 => 
                                      array (
                                        'key' => 'NR SPRAY',
                                        'value' => 2237,
                                      ),
                                      889 => 
                                      array (
                                        'key' => 'NR7',
                                        'value' => 2238,
                                      ),
                                      890 => 
                                      array (
                                        'key' => 'NR8',
                                        'value' => 2239,
                                      ),
                                      891 => 
                                      array (
                                        'key' => 'NRP JONES CT5',
                                        'value' => 1829196,
                                      ),
                                      892 => 
                                      array (
                                        'key' => 'NRP JONES NON-UL CT5',
                                        'value' => 1829120,
                                      ),
                                      893 => 
                                      array (
                                        'key' => 'NSH',
                                        'value' => 2240,
                                      ),
                                      894 => 
                                      array (
                                        'key' => 'NUTRIFLEX',
                                        'value' => 2241,
                                      ),
                                      895 => 
                                      array (
                                        'key' => 'NUTRIFLEX STATIC WIRE',
                                        'value' => 2242,
                                      ),
                                      896 => 
                                      array (
                                        'key' => 'NUTRIFLEX SUCTION & DISCHARGE',
                                        'value' => 2243,
                                      ),
                                      897 => 
                                      array (
                                        'key' => 'NUTRIFLO SUCTION & DISCHARGE',
                                        'value' => 2244,
                                      ),
                                      898 => 
                                      array (
                                        'key' => 'O-Ring Boss ',
                                        'value' => 1830009,
                                      ),
                                      899 => 
                                      array (
                                        'key' => 'O-Ring Boss Straight Thread (SAE J1453)',
                                        'value' => 1829975,
                                      ),
                                      900 => 
                                      array (
                                        'key' => 'O-Ring Boss Straight Thread (SAE J514)',
                                        'value' => 1829958,
                                      ),
                                      901 => 
                                      array (
                                        'key' => 'O-Ring Face Seal',
                                        'value' => 1829991,
                                      ),
                                      902 => 
                                      array (
                                        'key' => 'O-Ring Face Seal (SAE J1453 ORS/ORFS)',
                                        'value' => 1829957,
                                      ),
                                      903 => 
                                      array (
                                        'key' => 'O-Ring for Ford Spring Lock',
                                        'value' => 1829997,
                                      ),
                                      904 => 
                                      array (
                                        'key' => 'O-Ring for Switch',
                                        'value' => 1829998,
                                      ),
                                      905 => 
                                      array (
                                        'key' => 'O-Ring for Tube Fittings',
                                        'value' => 1829999,
                                      ),
                                      906 => 
                                      array (
                                        'key' => 'O-Ring Insert',
                                        'value' => 1829985,
                                      ),
                                      907 => 
                                      array (
                                        'key' => 'O-Ring Tube',
                                        'value' => 1829986,
                                      ),
                                      908 => 
                                      array (
                                        'key' => 'O-Ring Tube (Female to O-Ring Insert)',
                                        'value' => 1829993,
                                      ),
                                      909 => 
                                      array (
                                        'key' => 'O-Ring Tube Compressor (Female to O-Ring Insert) ',
                                        'value' => 1829992,
                                      ),
                                      910 => 
                                      array (
                                        'key' => 'OAKLEY',
                                        'value' => 2245,
                                      ),
                                      911 => 
                                      array (
                                        'key' => 'OFFSHORE FUEL',
                                        'value' => 2246,
                                      ),
                                      912 => 
                                      array (
                                        'key' => 'OFFSHORE FUEL 500',
                                        'value' => 1829275,
                                      ),
                                      913 => 
                                      array (
                                        'key' => 'OFFSHORE FUEL 750',
                                        'value' => 1829364,
                                      ),
                                      914 => 
                                      array (
                                        'key' => 'OFFSHORE VIPER',
                                        'value' => 2247,
                                      ),
                                      915 => 
                                      array (
                                        'key' => 'OIL DISCHARGE',
                                        'value' => 2248,
                                      ),
                                      916 => 
                                      array (
                                        'key' => 'OIL RIG HARDWALL',
                                        'value' => 2249,
                                      ),
                                      917 => 
                                      array (
                                        'key' => 'OIL RIG HARDWALL BIOFUEL',
                                        'value' => 2250,
                                      ),
                                      918 => 
                                      array (
                                        'key' => 'OIL RIG SOFTWALL',
                                        'value' => 2251,
                                      ),
                                      919 => 
                                      array (
                                        'key' => 'OIL RIG SW',
                                        'value' => 1829329,
                                      ),
                                      920 => 
                                      array (
                                        'key' => 'OIL TREAT & BLENDER',
                                        'value' => 2252,
                                      ),
                                      921 => 
                                      array (
                                        'key' => 'OILFIELD DISCHARGE',
                                        'value' => 2253,
                                      ),
                                      922 => 
                                      array (
                                        'key' => 'OILFIELD FRAC',
                                        'value' => 2254,
                                      ),
                                      923 => 
                                      array (
                                        'key' => 'OMNI',
                                        'value' => 2255,
                                      ),
                                      924 => 
                                      array (
                                        'key' => 'OMNI WATER S&D',
                                        'value' => 2256,
                                      ),
                                      925 => 
                                      array (
                                        'key' => 'OPEN END FALCON',
                                        'value' => 1829523,
                                      ),
                                      926 => 
                                      array (
                                        'key' => 'OPEN END HAWK',
                                        'value' => 1829517,
                                      ),
                                      927 => 
                                      array (
                                        'key' => 'OPEN END HY-T PLUS',
                                        'value' => 1829504,
                                      ),
                                      928 => 
                                      array (
                                        'key' => 'OPEN END METRIC T PD',
                                        'value' => 1829518,
                                      ),
                                      929 => 
                                      array (
                                        'key' => 'OPEN END POSITIVE DRIVE',
                                        'value' => 1829511,
                                      ),
                                      930 => 
                                      array (
                                        'key' => 'OPEN END SUPER TORQUE',
                                        'value' => 1829515,
                                      ),
                                      931 => 
                                      array (
                                        'key' => 'ORANGE FLEXWING',
                                        'value' => 2257,
                                      ),
                                      932 => 
                                      array (
                                        'key' => 'ORTAC',
                                        'value' => 2258,
                                      ),
                                      933 => 
                                      array (
                                        'key' => 'ORTAC II',
                                        'value' => 2259,
                                      ),
                                      934 => 
                                      array (
                                        'key' => 'PACER',
                                        'value' => 2260,
                                      ),
                                      935 => 
                                      array (
                                        'key' => 'PACIFIC RUBBER MULCHBLOWER',
                                        'value' => 1829232,
                                      ),
                                      936 => 
                                      array (
                                        'key' => 'PAGUFIX',
                                        'value' => 2261,
                                      ),
                                      937 => 
                                      array (
                                        'key' => 'PALADIN',
                                        'value' => 2262,
                                      ),
                                      938 => 
                                      array (
                                        'key' => 'PALADIN DROP',
                                        'value' => 1829164,
                                      ),
                                      939 => 
                                      array (
                                        'key' => 'PANGBORN PA BLAST',
                                        'value' => 2263,
                                      ),
                                      940 => 
                                      array (
                                        'key' => 'PARKING',
                                        'value' => 2264,
                                      ),
                                      941 => 
                                      array (
                                        'key' => 'PATHFINDER GARDEN',
                                        'value' => 1829283,
                                      ),
                                      942 => 
                                      array (
                                        'key' => 'PEAK ENERGY FRONTIER',
                                        'value' => 1829371,
                                      ),
                                      943 => 
                                      array (
                                        'key' => 'PERFECT GARDEN HOSE',
                                        'value' => 2265,
                                      ),
                                      944 => 
                                      array (
                                        'key' => 'PERLAPAL',
                                        'value' => 2266,
                                      ),
                                      945 => 
                                      array (
                                        'key' => 'PETERS LIQUID MUD',
                                        'value' => 2267,
                                      ),
                                      946 => 
                                      array (
                                        'key' => 'PETRO OIL S&D',
                                        'value' => 2268,
                                      ),
                                      947 => 
                                      array (
                                        'key' => 'PETRO OIL S&D 200',
                                        'value' => 1829416,
                                      ),
                                      948 => 
                                      array (
                                        'key' => 'PETROL 400 HARDWALL',
                                        'value' => 1829355,
                                      ),
                                      949 => 
                                      array (
                                        'key' => 'PETROL HARDWALL',
                                        'value' => 2269,
                                      ),
                                      950 => 
                                      array (
                                        'key' => 'PGC PLACEMENT TEXTILE',
                                        'value' => 2270,
                                      ),
                                      951 => 
                                      array (
                                        'key' => 'PHILLIPS 66 HYDROCARBON DRAIN',
                                        'value' => 1829218,
                                      ),
                                      952 => 
                                      array (
                                        'key' => 'PHX FUEL GAS',
                                        'value' => 2271,
                                      ),
                                      953 => 
                                      array (
                                        'key' => 'PHX OXYGEN',
                                        'value' => 2272,
                                      ),
                                      954 => 
                                      array (
                                        'key' => 'PIONEER HOT AIR II SP',
                                        'value' => 1829220,
                                      ),
                                      955 => 
                                      array (
                                        'key' => 'PIONEER PETRO TANK TRUCK',
                                        'value' => 1829386,
                                      ),
                                      956 => 
                                      array (
                                        'key' => 'PIONEER XF BLAST',
                                        'value' => 1829379,
                                      ),
                                      957 => 
                                      array (
                                        'key' => 'PLASTER & GROUT',
                                        'value' => 2273,
                                      ),
                                      958 => 
                                      array (
                                        'key' => 'Plastic Clip Holder',
                                        'value' => 1830005,
                                      ),
                                      959 => 
                                      array (
                                        'key' => 'PLATINUM JAC RISER',
                                        'value' => 2274,
                                      ),
                                      960 => 
                                      array (
                                        'key' => 'PLIOVIC AG SPRAY',
                                        'value' => 1829274,
                                      ),
                                      961 => 
                                      array (
                                        'key' => 'PLIOVIC FG',
                                        'value' => 2275,
                                      ),
                                      962 => 
                                      array (
                                        'key' => 'PLIOVIC GS',
                                        'value' => 2276,
                                      ),
                                      963 => 
                                      array (
                                        'key' => 'PLIOVIC PLUS',
                                        'value' => 2277,
                                      ),
                                      964 => 
                                      array (
                                        'key' => 'PLIOVIC PVC TUBING',
                                        'value' => 2278,
                                      ),
                                      965 => 
                                      array (
                                        'key' => 'POLY-V',
                                        'value' => 1829493,
                                      ),
                                      966 => 
                                      array (
                                        'key' => 'POSEIDON UL94-HB',
                                        'value' => 2279,
                                      ),
                                      967 => 
                                      array (
                                        'key' => 'POSITIVE DRIVE PD',
                                        'value' => 1829509,
                                      ),
                                      968 => 
                                      array (
                                        'key' => 'POT LINE',
                                        'value' => 2280,
                                      ),
                                      969 => 
                                      array (
                                        'key' => 'POT LINE HD',
                                        'value' => 2281,
                                      ),
                                      970 => 
                                      array (
                                        'key' => 'POTABLE STOCK TANK',
                                        'value' => 2282,
                                      ),
                                      971 => 
                                      array (
                                        'key' => 'POTABLE WATER',
                                        'value' => 2283,
                                      ),
                                      972 => 
                                      array (
                                        'key' => 'POTABLE WATER HW',
                                        'value' => 2284,
                                      ),
                                      973 => 
                                      array (
                                        'key' => 'POTABLE WATER S&D',
                                        'value' => 1829346,
                                      ),
                                      974 => 
                                      array (
                                        'key' => 'POTABLE WATER SW',
                                        'value' => 2285,
                                      ),
                                      975 => 
                                      array (
                                        'key' => 'POWERSPAN CL',
                                        'value' => 1829528,
                                      ),
                                      976 => 
                                      array (
                                        'key' => 'PRAIRIE GOLDFLEX',
                                        'value' => 2286,
                                      ),
                                      977 => 
                                      array (
                                        'key' => 'PRAIRIE GOLDFLEX PETRO',
                                        'value' => 1829174,
                                      ),
                                      978 => 
                                      array (
                                        'key' => 'PREM MARINE WET EXHAUST COR',
                                        'value' => 2287,
                                      ),
                                      979 => 
                                      array (
                                        'key' => 'PREMIER',
                                        'value' => 1829311,
                                      ),
                                      980 => 
                                      array (
                                        'key' => 'PREMIER AIR 1000',
                                        'value' => 1829361,
                                      ),
                                      981 => 
                                      array (
                                        'key' => 'PREMIER REFRACTORY CLAMP',
                                        'value' => 2288,
                                      ),
                                      982 => 
                                      array (
                                        'key' => 'PREMIER VINTNER',
                                        'value' => 1829266,
                                      ),
                                      983 => 
                                      array (
                                        'key' => 'PREMIUM GARDEN',
                                        'value' => 2289,
                                      ),
                                      984 => 
                                      array (
                                        'key' => 'PREMIUM MARINE WET EXHAUST',
                                        'value' => 2290,
                                      ),
                                      985 => 
                                      array (
                                        'key' => 'PROSPECTOR AIR',
                                        'value' => 2291,
                                      ),
                                      986 => 
                                      array (
                                        'key' => 'PROSPECTOR BOP 3000',
                                        'value' => 2292,
                                      ),
                                      987 => 
                                      array (
                                        'key' => 'PROSPECTOR BOP 5000',
                                        'value' => 2293,
                                      ),
                                      988 => 
                                      array (
                                        'key' => 'PROSPECTOR FLEX',
                                        'value' => 2294,
                                      ),
                                      989 => 
                                      array (
                                        'key' => 'PROSPECTOR FLEX OILFIELD',
                                        'value' => 2295,
                                      ),
                                      990 => 
                                      array (
                                        'key' => 'PROSPECTOR FLEX PETRO',
                                        'value' => 2296,
                                      ),
                                      991 => 
                                      array (
                                        'key' => 'PROSPECTOR FRAC 400 DISCHARGE',
                                        'value' => 1829404,
                                      ),
                                      992 => 
                                      array (
                                        'key' => 'PROSPECTOR FRAC DISCHARGE',
                                        'value' => 2297,
                                      ),
                                      993 => 
                                      array (
                                        'key' => 'PROSPECTOR FRAC TANK HOSE',
                                        'value' => 2298,
                                      ),
                                      994 => 
                                      array (
                                        'key' => 'PROSPECTOR HOT OILER',
                                        'value' => 2299,
                                      ),
                                      995 => 
                                      array (
                                        'key' => 'PROSPECTOR MINESPRAY',
                                        'value' => 2300,
                                      ),
                                      996 => 
                                      array (
                                        'key' => 'PROSPECTOR OIL RIG HARDWALL',
                                        'value' => 1829396,
                                      ),
                                      997 => 
                                      array (
                                        'key' => 'PROSPECTOR OIL RIG HW',
                                        'value' => 2301,
                                      ),
                                      998 => 
                                      array (
                                        'key' => 'PROSPECTOR OIL RIG SW',
                                        'value' => 2302,
                                      ),
                                      999 => 
                                      array (
                                        'key' => 'PROSPECTOR OILFIELD',
                                        'value' => 2303,
                                      ),
                                      1000 => 
                                      array (
                                        'key' => 'PROSPECTOR OILFIELD S&D',
                                        'value' => 2304,
                                      ),
                                      1001 => 
                                      array (
                                        'key' => 'PROSPECTOR OILFIELD S&D 150',
                                        'value' => 1829375,
                                      ),
                                      1002 => 
                                      array (
                                        'key' => 'PROSPECTOR OILFIELD S&D 300',
                                        'value' => 1829241,
                                      ),
                                      1003 => 
                                      array (
                                        'key' => 'PROSPECTOR PETRO',
                                        'value' => 2305,
                                      ),
                                      1004 => 
                                      array (
                                        'key' => 'PROSPECTOR PLUS AIR',
                                        'value' => 2306,
                                      ),
                                      1005 => 
                                      array (
                                        'key' => 'PROSPECTOR SHR',
                                        'value' => 2307,
                                      ),
                                      1006 => 
                                      array (
                                        'key' => 'PROSPECTOR WATER DISCHARGE',
                                        'value' => 2308,
                                      ),
                                      1007 => 
                                      array (
                                        'key' => 'PROSPECTOR WATER DISCHARGE 150',
                                        'value' => 1829169,
                                      ),
                                      1008 => 
                                      array (
                                        'key' => 'PROSPECTOR WATER S&D',
                                        'value' => 2309,
                                      ),
                                      1009 => 
                                      array (
                                        'key' => 'PROSPECTORFLEX BLUE UHMWPE',
                                        'value' => 1829272,
                                      ),
                                      1010 => 
                                      array (
                                        'key' => 'PROTECTION RING',
                                        'value' => 2310,
                                      ),
                                      1011 => 
                                      array (
                                        'key' => 'PSC CHEMICAL',
                                        'value' => 2311,
                                      ),
                                      1012 => 
                                      array (
                                        'key' => 'PTT 30',
                                        'value' => 1830008,
                                      ),
                                      1013 => 
                                      array (
                                        'key' => 'PULP & PAPER WASHDOWN',
                                        'value' => 2312,
                                      ),
                                      1014 => 
                                      array (
                                        'key' => 'PUMPTEC PULSE',
                                        'value' => 1829211,
                                      ),
                                      1015 => 
                                      array (
                                        'key' => 'PUREONE',
                                        'value' => 2313,
                                      ),
                                      1016 => 
                                      array (
                                        'key' => 'PURFIT',
                                        'value' => 2314,
                                      ),
                                      1017 => 
                                      array (
                                        'key' => 'PURFIT BREWLINE',
                                        'value' => 2315,
                                      ),
                                      1018 => 
                                      array (
                                        'key' => 'PURPLE FLEXWING',
                                        'value' => 2316,
                                      ),
                                      1019 => 
                                      array (
                                        'key' => 'PURPLE SNAKE',
                                        'value' => 2317,
                                      ),
                                      1020 => 
                                      array (
                                        'key' => 'PURPLE SNAKE PLUS',
                                        'value' => 2318,
                                      ),
                                      1021 => 
                                      array (
                                        'key' => 'PYROFLEX HOT AIR',
                                        'value' => 2319,
                                      ),
                                      1022 => 
                                      array (
                                        'key' => 'PYROFLEX HOT AIR II',
                                        'value' => 1829132,
                                      ),
                                      1023 => 
                                      array (
                                        'key' => 'PYROFLEX HOT AIR III FDA',
                                        'value' => 2320,
                                      ),
                                      1024 => 
                                      array (
                                        'key' => 'PYROFLEX HOT TAR & ASPHALT II',
                                        'value' => 1829129,
                                      ),
                                      1025 => 
                                      array (
                                        'key' => 'PYROFLEX HOT TAR WAND',
                                        'value' => 2321,
                                      ),
                                      1026 => 
                                      array (
                                        'key' => 'PYROFLEX II HOT AIR',
                                        'value' => 2322,
                                      ),
                                      1027 => 
                                      array (
                                        'key' => 'PYROFLEX II HOT TAR & ASPHALT',
                                        'value' => 2323,
                                      ),
                                      1028 => 
                                      array (
                                        'key' => 'PYROFLEX III HOT AIR',
                                        'value' => 2324,
                                      ),
                                      1029 => 
                                      array (
                                        'key' => 'PYROFLEX III HOT AIR FDA',
                                        'value' => 2325,
                                      ),
                                      1030 => 
                                      array (
                                        'key' => 'QR048',
                                        'value' => 2326,
                                      ),
                                      1031 => 
                                      array (
                                        'key' => 'QR48',
                                        'value' => 2327,
                                      ),
                                      1032 => 
                                      array (
                                        'key' => 'QUIKSTIR',
                                        'value' => 2328,
                                      ),
                                      1033 => 
                                      array (
                                        'key' => 'QUIKSTIR PUMP 2P',
                                        'value' => 2329,
                                      ),
                                      1034 => 
                                      array (
                                        'key' => 'R/W',
                                        'value' => 1829432,
                                      ),
                                      1035 => 
                                      array (
                                        'key' => 'RADIATOR',
                                        'value' => 2330,
                                      ),
                                      1036 => 
                                      array (
                                        'key' => 'RADIATOR HOSE',
                                        'value' => 1829347,
                                      ),
                                      1037 => 
                                      array (
                                        'key' => 'RAGCO',
                                        'value' => 2331,
                                      ),
                                      1038 => 
                                      array (
                                        'key' => 'RAGCO FABCHEM',
                                        'value' => 1829242,
                                      ),
                                      1039 => 
                                      array (
                                        'key' => 'RAGCO FLEX KENT',
                                        'value' => 1829387,
                                      ),
                                      1040 => 
                                      array (
                                        'key' => 'RAIL',
                                        'value' => 2332,
                                      ),
                                      1041 => 
                                      array (
                                        'key' => 'RANSBG NR SPRAY',
                                        'value' => 2333,
                                      ),
                                      1042 => 
                                      array (
                                        'key' => 'RAWHID FIRE ENGINE BOOSTER',
                                        'value' => 2334,
                                      ),
                                      1043 => 
                                      array (
                                        'key' => 'RCT FLEXRITE',
                                        'value' => 2335,
                                      ),
                                      1044 => 
                                      array (
                                        'key' => 'RDC',
                                        'value' => 2336,
                                      ),
                                      1045 => 
                                      array (
                                        'key' => 'REAL RUBBER',
                                        'value' => 2337,
                                      ),
                                      1046 => 
                                      array (
                                        'key' => 'RED FLEXTRA',
                                        'value' => 2338,
                                      ),
                                      1047 => 
                                      array (
                                        'key' => 'RED FLEXTRA 100',
                                        'value' => 1829324,
                                      ),
                                      1048 => 
                                      array (
                                        'key' => 'RED FLEXTRA 150',
                                        'value' => 1829304,
                                      ),
                                      1049 => 
                                      array (
                                        'key' => 'RED ORTAC II',
                                        'value' => 1829326,
                                      ),
                                      1050 => 
                                      array (
                                        'key' => 'RED-L GOLDFLEX-C',
                                        'value' => 2339,
                                      ),
                                      1051 => 
                                      array (
                                        'key' => 'RED-L PLANT STEAM',
                                        'value' => 1829210,
                                      ),
                                      1052 => 
                                      array (
                                        'key' => 'RED-L WATER',
                                        'value' => 2340,
                                      ),
                                      1053 => 
                                      array (
                                        'key' => 'REDWING BLUE LOW TEMP',
                                        'value' => 2341,
                                      ),
                                      1054 => 
                                      array (
                                        'key' => 'REDWING BLUE LOW TEMP FUEL OIL',
                                        'value' => 1829205,
                                      ),
                                      1055 => 
                                      array (
                                        'key' => 'REDWING FUEL OIL',
                                        'value' => 2342,
                                      ),
                                      1056 => 
                                      array (
                                        'key' => 'REDWING FUEL OIL HD',
                                        'value' => 2343,
                                      ),
                                      1057 => 
                                      array (
                                        'key' => 'REDWING HIGH DURO FUEL OIL',
                                        'value' => 1829342,
                                      ),
                                      1058 => 
                                      array (
                                        'key' => 'REDWING VERSABRAID',
                                        'value' => 2344,
                                      ),
                                      1059 => 
                                      array (
                                        'key' => 'REFRACTORY GUNITE',
                                        'value' => 2345,
                                      ),
                                      1060 => 
                                      array (
                                        'key' => 'REFRACTORY HOSE',
                                        'value' => 2346,
                                      ),
                                      1061 => 
                                      array (
                                        'key' => 'REFRIGERANT CHARGING',
                                        'value' => 2347,
                                      ),
                                      1062 => 
                                      array (
                                        'key' => 'REINFLEX',
                                        'value' => 1829154,
                                      ),
                                      1063 => 
                                      array (
                                        'key' => 'RELIANCE PROSPECTOR WATER S&D',
                                        'value' => 2348,
                                      ),
                                      1064 => 
                                      array (
                                        'key' => 'RELIANCE WATER S&D',
                                        'value' => 2349,
                                      ),
                                      1065 => 
                                      array (
                                        'key' => 'RES',
                                        'value' => 2350,
                                      ),
                                      1066 => 
                                      array (
                                        'key' => 'REVERSE CIRCULATION',
                                        'value' => 2351,
                                      ),
                                      1067 => 
                                      array (
                                        'key' => 'RIG SUPPLY',
                                        'value' => 2352,
                                      ),
                                      1068 => 
                                      array (
                                        'key' => 'RIG SUPPLY SW',
                                        'value' => 2353,
                                      ),
                                      1069 => 
                                      array (
                                        'key' => 'RITCHIE CT5',
                                        'value' => 1829098,
                                      ),
                                      1070 => 
                                      array (
                                        'key' => 'RIVERB',
                                        'value' => 2354,
                                      ),
                                      1071 => 
                                      array (
                                        'key' => 'RL1131 TWIN-LINE GRADE R',
                                        'value' => 2355,
                                      ),
                                      1072 => 
                                      array (
                                        'key' => 'ROADPATCH',
                                        'value' => 2356,
                                      ),
                                      1073 => 
                                      array (
                                        'key' => 'ROBIN FREON CHARGING',
                                        'value' => 2357,
                                      ),
                                      1074 => 
                                      array (
                                        'key' => 'ROBIN NEW',
                                        'value' => 1829138,
                                      ),
                                      1075 => 
                                      array (
                                        'key' => 'ROCK DRILL',
                                        'value' => 2358,
                                      ),
                                      1076 => 
                                      array (
                                        'key' => 'ROCK DRILL RED',
                                        'value' => 1829340,
                                      ),
                                      1077 => 
                                      array (
                                        'key' => 'ROCK DUST',
                                        'value' => 1829104,
                                      ),
                                      1078 => 
                                      array (
                                        'key' => 'ROOF DRAIN',
                                        'value' => 2359,
                                      ),
                                      1079 => 
                                      array (
                                        'key' => 'ROUGH BORE (HOT TAR & ASPHALT)',
                                        'value' => 2360,
                                      ),
                                      1080 => 
                                      array (
                                        'key' => 'ROUGH BORE DOCK',
                                        'value' => 2361,
                                      ),
                                      1081 => 
                                      array (
                                        'key' => 'ROUGH BORE DOCK 200',
                                        'value' => 1829323,
                                      ),
                                      1082 => 
                                      array (
                                        'key' => 'ROUGH BORE DOCK 300',
                                        'value' => 1829221,
                                      ),
                                      1083 => 
                                      array (
                                        'key' => 'ROYAL BRASS PLIOVIC',
                                        'value' => 2362,
                                      ),
                                      1084 => 
                                      array (
                                        'key' => 'ROYAL BRASS VERSIFLO S&D',
                                        'value' => 1829214,
                                      ),
                                      1085 => 
                                      array (
                                        'key' => 'RSD',
                                        'value' => 2363,
                                      ),
                                      1086 => 
                                      array (
                                        'key' => 'RUB & GASK WATER DISCHARGE',
                                        'value' => 1829358,
                                      ),
                                      1087 => 
                                      array (
                                        'key' => 'RX',
                                        'value' => 2364,
                                      ),
                                      1088 => 
                                      array (
                                        'key' => 'S4SH',
                                        'value' => 2365,
                                      ),
                                      1089 => 
                                      array (
                                        'key' => 'S4SP',
                                        'value' => 2366,
                                      ),
                                      1090 => 
                                      array (
                                        'key' => 'SAE 100R4',
                                        'value' => 2367,
                                      ),
                                      1091 => 
                                      array (
                                        'key' => 'SAE 20R1',
                                        'value' => 2368,
                                      ),
                                      1092 => 
                                      array (
                                        'key' => 'SAE 20R1 SB/SC',
                                        'value' => 1829428,
                                      ),
                                      1093 => 
                                      array (
                                        'key' => 'SAE 20R1 SB/SC HARDWALL',
                                        'value' => 1829429,
                                      ),
                                      1094 => 
                                      array (
                                        'key' => 'SAE 20R2 D1',
                                        'value' => 2369,
                                      ),
                                      1095 => 
                                      array (
                                        'key' => 'SAE 20R2D1',
                                        'value' => 2370,
                                      ),
                                      1096 => 
                                      array (
                                        'key' => 'SAE 45 Flare',
                                        'value' => 1829987,
                                      ),
                                      1097 => 
                                      array (
                                        'key' => 'SAE 45 Inverted Flare',
                                        'value' => 1829951,
                                      ),
                                      1098 => 
                                      array (
                                        'key' => 'SAE 45 J512 Flare',
                                        'value' => 1829950,
                                      ),
                                      1099 => 
                                      array (
                                        'key' => 'SAE J1527 A2 R1 ISO 7840 A2',
                                        'value' => 2371,
                                      ),
                                      1100 => 
                                      array (
                                        'key' => 'SAE J1527 TYPE A2 FUEL FILL',
                                        'value' => 2372,
                                      ),
                                      1101 => 
                                      array (
                                        'key' => 'SAE J514 Flareless Tube Fittings',
                                        'value' => 1829955,
                                      ),
                                      1102 => 
                                      array (
                                        'key' => 'SAE-20R2 D1',
                                        'value' => 2373,
                                      ),
                                      1103 => 
                                      array (
                                        'key' => 'SAFEFLEX',
                                        'value' => 1830043,
                                      ),
                                      1104 => 
                                      array (
                                        'key' => 'SAFLEX NSFX',
                                        'value' => 1829189,
                                      ),
                                      1105 => 
                                      array (
                                        'key' => 'SAND RECOVERY S&D',
                                        'value' => 2374,
                                      ),
                                      1106 => 
                                      array (
                                        'key' => 'SAND SUCTION',
                                        'value' => 2375,
                                      ),
                                      1107 => 
                                      array (
                                        'key' => 'SANDBLAST 400',
                                        'value' => 2376,
                                      ),
                                      1108 => 
                                      array (
                                        'key' => 'SANDBLAST DEADMAN',
                                        'value' => 1829239,
                                      ),
                                      1109 => 
                                      array (
                                        'key' => 'SANDER',
                                        'value' => 2377,
                                      ),
                                      1110 => 
                                      array (
                                        'key' => 'SANI-WASH',
                                        'value' => 2378,
                                      ),
                                      1111 => 
                                      array (
                                        'key' => 'SANI-WASH PLUS',
                                        'value' => 2379,
                                      ),
                                      1112 => 
                                      array (
                                        'key' => 'SANI-WASH SUPREME',
                                        'value' => 2380,
                                      ),
                                      1113 => 
                                      array (
                                        'key' => 'SBQ FLOATER',
                                        'value' => 1829147,
                                      ),
                                      1114 => 
                                      array (
                                        'key' => 'SBQ PETRO',
                                        'value' => 1829313,
                                      ),
                                      1115 => 
                                      array (
                                        'key' => 'SCOMI LIQUID MUD',
                                        'value' => 2381,
                                      ),
                                      1116 => 
                                      array (
                                        'key' => 'SCOTT',
                                        'value' => 1829100,
                                      ),
                                      1117 => 
                                      array (
                                        'key' => 'SCP3',
                                        'value' => 2382,
                                      ),
                                      1118 => 
                                      array (
                                        'key' => 'SCRMAC KURB KING',
                                        'value' => 2383,
                                      ),
                                      1119 => 
                                      array (
                                        'key' => 'SEALFS',
                                        'value' => 2384,
                                      ),
                                      1120 => 
                                      array (
                                        'key' => 'Sealing Washers',
                                        'value' => 1830000,
                                      ),
                                      1121 => 
                                      array (
                                        'key' => 'SEMLER FDA',
                                        'value' => 1829170,
                                      ),
                                      1122 => 
                                      array (
                                        'key' => 'SERVICE STATION AIR',
                                        'value' => 2385,
                                      ),
                                      1123 => 
                                      array (
                                        'key' => 'SFS',
                                        'value' => 1830044,
                                      ),
                                      1124 => 
                                      array (
                                        'key' => 'SFS (FIRE SUPPRESSION)',
                                        'value' => 2386,
                                      ),
                                      1125 => 
                                      array (
                                        'key' => 'SGOBAIN',
                                        'value' => 2387,
                                      ),
                                      1126 => 
                                      array (
                                        'key' => 'SGOBAIN FOOD DISCHARGE',
                                        'value' => 2388,
                                      ),
                                      1127 => 
                                      array (
                                        'key' => 'SGOBAIN FOOD S&D',
                                        'value' => 2389,
                                      ),
                                      1128 => 
                                      array (
                                        'key' => 'SGUN',
                                        'value' => 1830045,
                                      ),
                                      1129 => 
                                      array (
                                        'key' => 'SHELLFLEX',
                                        'value' => 2390,
                                      ),
                                      1130 => 
                                      array (
                                        'key' => 'SHIELD',
                                        'value' => 2391,
                                      ),
                                      1131 => 
                                      array (
                                        'key' => 'SHJ',
                                        'value' => 1830046,
                                      ),
                                      1132 => 
                                      array (
                                        'key' => 'SIGNAL CALL',
                                        'value' => 1829298,
                                      ),
                                      1133 => 
                                      array (
                                        'key' => 'SILENTSYNC',
                                        'value' => 1829497,
                                      ),
                                      1134 => 
                                      array (
                                        'key' => 'SINGLE LINE (GRADE R)',
                                        'value' => 2392,
                                      ),
                                      1135 => 
                                      array (
                                        'key' => 'SINGLE LINE (GRADE RM)',
                                        'value' => 2393,
                                      ),
                                      1136 => 
                                      array (
                                        'key' => 'SINGLE LINE (GRADE T)',
                                        'value' => 2394,
                                      ),
                                      1137 => 
                                      array (
                                        'key' => 'SINGLE LINE GRADE R',
                                        'value' => 1829246,
                                      ),
                                      1138 => 
                                      array (
                                        'key' => 'SINGLE LINE GRADE T',
                                        'value' => 1829309,
                                      ),
                                      1139 => 
                                      array (
                                        'key' => 'SINGLE-LINE GRADE R',
                                        'value' => 1829383,
                                      ),
                                      1140 => 
                                      array (
                                        'key' => 'SINGLE-LINE GRADE T',
                                        'value' => 1829270,
                                      ),
                                      1141 => 
                                      array (
                                        'key' => 'SK CARBOV',
                                        'value' => 2395,
                                      ),
                                      1142 => 
                                      array (
                                        'key' => 'SLURRY',
                                        'value' => 2396,
                                      ),
                                      1143 => 
                                      array (
                                        'key' => 'SMOOTH BORE DOCK',
                                        'value' => 2397,
                                      ),
                                      1144 => 
                                      array (
                                        'key' => 'SMOOTH BORE HOT TAR & ASPHALT',
                                        'value' => 2398,
                                      ),
                                      1145 => 
                                      array (
                                        'key' => 'SMOOTH BORE MOLTEN SULPHUR',
                                        'value' => 2399,
                                      ),
                                      1146 => 
                                      array (
                                        'key' => 'SNAPON',
                                        'value' => 2400,
                                      ),
                                      1147 => 
                                      array (
                                        'key' => 'SOFTUB WATER',
                                        'value' => 2401,
                                      ),
                                      1148 => 
                                      array (
                                        'key' => 'SOFTWALL',
                                        'value' => 2402,
                                      ),
                                      1149 => 
                                      array (
                                        'key' => 'SOHO PROSPECTOR WATER S&D',
                                        'value' => 2403,
                                      ),
                                      1150 => 
                                      array (
                                        'key' => 'SOURCE DISPENSING',
                                        'value' => 1829108,
                                      ),
                                      1151 => 
                                      array (
                                        'key' => 'SOUTH PNEUMATICS SW',
                                        'value' => 1829198,
                                      ),
                                      1152 => 
                                      array (
                                        'key' => 'SOUTHERN',
                                        'value' => 2404,
                                      ),
                                      1153 => 
                                      array (
                                        'key' => 'Spartan Pressure Washer',
                                        'value' => 1829156,
                                      ),
                                      1154 => 
                                      array (
                                        'key' => 'SPARTAN PRESSURE WASHER',
                                        'value' => 2405,
                                      ),
                                      1155 => 
                                      array (
                                        'key' => 'SPECIAL PD',
                                        'value' => 1829512,
                                      ),
                                      1156 => 
                                      array (
                                        'key' => 'SPEEDAIRE',
                                        'value' => 2406,
                                      ),
                                      1157 => 
                                      array (
                                        'key' => 'SPIR SEP',
                                        'value' => 2407,
                                      ),
                                      1158 => 
                                      array (
                                        'key' => 'SPIR SEP TPG',
                                        'value' => 2408,
                                      ),
                                      1159 => 
                                      array (
                                        'key' => 'SPIRAFLEX 1500',
                                        'value' => 2409,
                                      ),
                                      1160 => 
                                      array (
                                        'key' => 'SPIRAFLEX 1600',
                                        'value' => 2410,
                                      ),
                                      1161 => 
                                      array (
                                        'key' => 'SPIRAFLEX 2500',
                                        'value' => 1829307,
                                      ),
                                      1162 => 
                                      array (
                                        'key' => 'SPIRAFLEX ACTION F.E.S',
                                        'value' => 2411,
                                      ),
                                      1163 => 
                                      array (
                                        'key' => 'SPIRAFLEX AGFLEX',
                                        'value' => 2412,
                                      ),
                                      1164 => 
                                      array (
                                        'key' => 'SPIRAFLEX AGGIE',
                                        'value' => 2413,
                                      ),
                                      1165 => 
                                      array (
                                        'key' => 'SPIRAFLEX AGGIE PVC',
                                        'value' => 1829366,
                                      ),
                                      1166 => 
                                      array (
                                        'key' => 'SPIRAFLEX AIR SEEDER',
                                        'value' => 2414,
                                      ),
                                      1167 => 
                                      array (
                                        'key' => 'SPIRAFLEX BARKBLOWER',
                                        'value' => 2415,
                                      ),
                                      1168 => 
                                      array (
                                        'key' => 'SPIRAFLEX BLACK SUPER-DUTY',
                                        'value' => 1829363,
                                      ),
                                      1169 => 
                                      array (
                                        'key' => 'SPIRAFLEX BLACK SUPER-DUTY LAYFLAT',
                                        'value' => 2416,
                                      ),
                                      1170 => 
                                      array (
                                        'key' => 'SPIRAFLEX BLUE EXTRA LIGHT DUTY LAYFLAT',
                                        'value' => 2417,
                                      ),
                                      1171 => 
                                      array (
                                        'key' => 'SPIRAFLEX BLUE EXTRALIGHT DUTY',
                                        'value' => 1829357,
                                      ),
                                      1172 => 
                                      array (
                                        'key' => 'SPIRAFLEX CABLE GUARD',
                                        'value' => 2418,
                                      ),
                                      1173 => 
                                      array (
                                        'key' => 'SPIRAFLEX DUCTING',
                                        'value' => 2419,
                                      ),
                                      1174 => 
                                      array (
                                        'key' => 'SPIRAFLEX EXTRA LIGHT DUTY',
                                        'value' => 1829188,
                                      ),
                                      1175 => 
                                      array (
                                        'key' => 'SPIRAFLEX FGVAC',
                                        'value' => 2420,
                                      ),
                                      1176 => 
                                      array (
                                        'key' => 'SPIRAFLEX FISH SUCTION',
                                        'value' => 2421,
                                      ),
                                      1177 => 
                                      array (
                                        'key' => 'SPIRAFLEX FOODVAC',
                                        'value' => 2422,
                                      ),
                                      1178 => 
                                      array (
                                        'key' => 'SPIRAFLEX GRASSVAC',
                                        'value' => 2423,
                                      ),
                                      1179 => 
                                      array (
                                        'key' => 'SPIRAFLEX GRAY LIGHT DUTY LAYFLAT',
                                        'value' => 2424,
                                      ),
                                      1180 => 
                                      array (
                                        'key' => 'SPIRAFLEX GREEN',
                                        'value' => 1829335,
                                      ),
                                      1181 => 
                                      array (
                                        'key' => 'SPIRAFLEX GREEN LAYFLAT',
                                        'value' => 2425,
                                      ),
                                      1182 => 
                                      array (
                                        'key' => 'SPIRAFLEX HEAVY DUTY',
                                        'value' => 1829199,
                                      ),
                                      1183 => 
                                      array (
                                        'key' => 'SPIRAFLEX HT',
                                        'value' => 2426,
                                      ),
                                      1184 => 
                                      array (
                                        'key' => 'SPIRAFLEX LIGHT DUTY',
                                        'value' => 1829190,
                                      ),
                                      1185 => 
                                      array (
                                        'key' => 'SPIRAFLEX LW ROCK DUST',
                                        'value' => 2427,
                                      ),
                                      1186 => 
                                      array (
                                        'key' => 'SPIRAFLEX MEDIUM DUTY',
                                        'value' => 1829182,
                                      ),
                                      1187 => 
                                      array (
                                        'key' => 'SPIRAFLEX MULCH BLOWER',
                                        'value' => 2428,
                                      ),
                                      1188 => 
                                      array (
                                        'key' => 'SPIRAFLEX MULCHBLOWER',
                                        'value' => 2429,
                                      ),
                                      1189 => 
                                      array (
                                        'key' => 'SPIRAFLEX RED MEDIUM DUTY',
                                        'value' => 1829317,
                                      ),
                                      1190 => 
                                      array (
                                        'key' => 'SPIRAFLEX RED MEDIUM DUTY LAYFLAT',
                                        'value' => 2430,
                                      ),
                                      1191 => 
                                      array (
                                        'key' => 'SPIRAFLEX ROCK DUST',
                                        'value' => 2431,
                                      ),
                                      1192 => 
                                      array (
                                        'key' => 'SPIRAFLEX VACUUM',
                                        'value' => 2432,
                                      ),
                                      1193 => 
                                      array (
                                        'key' => 'SPIRAFLEX VAPOR RECOVERY',
                                        'value' => 2433,
                                      ),
                                      1194 => 
                                      array (
                                        'key' => 'SPIRAFLEX YELLOW HEAVY DUTY',
                                        'value' => 1829381,
                                      ),
                                      1195 => 
                                      array (
                                        'key' => 'SPIRAFLEX YELLOW HEAVY DUTY LAYFLAT',
                                        'value' => 2434,
                                      ),
                                      1196 => 
                                      array (
                                        'key' => 'SPIRAFLOW',
                                        'value' => 2435,
                                      ),
                                      1197 => 
                                      array (
                                        'key' => 'SPIRATHANE HD',
                                        'value' => 2436,
                                      ),
                                      1198 => 
                                      array (
                                        'key' => 'SPIRATHANE LD',
                                        'value' => 2437,
                                      ),
                                      1199 => 
                                      array (
                                        'key' => 'SPIRATHANE PT',
                                        'value' => 2438,
                                      ),
                                      1200 => 
                                      array (
                                        'key' => 'SR12',
                                        'value' => 2439,
                                      ),
                                      1201 => 
                                      array (
                                        'key' => 'SR13',
                                        'value' => 2440,
                                      ),
                                      1202 => 
                                      array (
                                        'key' => 'SR14',
                                        'value' => 2441,
                                      ),
                                      1203 => 
                                      array (
                                        'key' => 'SR14A',
                                        'value' => 2442,
                                      ),
                                      1204 => 
                                      array (
                                        'key' => 'SR14B',
                                        'value' => 2443,
                                      ),
                                      1205 => 
                                      array (
                                        'key' => 'SR15',
                                        'value' => 2444,
                                      ),
                                      1206 => 
                                      array (
                                        'key' => 'SR16SC',
                                        'value' => 2445,
                                      ),
                                      1207 => 
                                      array (
                                        'key' => 'SR18',
                                        'value' => 2446,
                                      ),
                                      1208 => 
                                      array (
                                        'key' => 'SR1SN',
                                        'value' => 2447,
                                      ),
                                      1209 => 
                                      array (
                                        'key' => 'SR2SN',
                                        'value' => 2448,
                                      ),
                                      1210 => 
                                      array (
                                        'key' => 'SR3',
                                        'value' => 2449,
                                      ),
                                      1211 => 
                                      array (
                                        'key' => 'SR5',
                                        'value' => 2450,
                                      ),
                                      1212 => 
                                      array (
                                        'key' => 'SR6',
                                        'value' => 2451,
                                      ),
                                      1213 => 
                                      array (
                                        'key' => 'SR7',
                                        'value' => 2452,
                                      ),
                                      1214 => 
                                      array (
                                        'key' => 'SR8',
                                        'value' => 2453,
                                      ),
                                      1215 => 
                                      array (
                                        'key' => 'SRS',
                                        'value' => 2454,
                                      ),
                                      1216 => 
                                      array (
                                        'key' => 'STANDARD STRAIGHT RAD',
                                        'value' => 2455,
                                      ),
                                      1217 => 
                                      array (
                                        'key' => 'Standpipe',
                                        'value' => 1829956,
                                      ),
                                      1218 => 
                                      array (
                                        'key' => 'STANLEY',
                                        'value' => 1829192,
                                      ),
                                      1219 => 
                                      array (
                                        'key' => 'STANLEY N298402',
                                        'value' => 1829197,
                                      ),
                                      1220 => 
                                      array (
                                        'key' => 'STEAM 250',
                                        'value' => 2456,
                                      ),
                                      1221 => 
                                      array (
                                        'key' => 'STEAM HOSE',
                                        'value' => 1829165,
                                      ),
                                      1222 => 
                                      array (
                                        'key' => 'STEAM PILE DRIVER',
                                        'value' => 1829345,
                                      ),
                                      1223 => 
                                      array (
                                        'key' => 'STEEL AIR',
                                        'value' => 2457,
                                      ),
                                      1224 => 
                                      array (
                                        'key' => 'STEEL AIR BOOTSTRAP',
                                        'value' => 2458,
                                      ),
                                      1225 => 
                                      array (
                                        'key' => 'STEEL AIR MSHA',
                                        'value' => 1829249,
                                      ),
                                      1226 => 
                                      array (
                                        'key' => 'SUBSEA CABLE',
                                        'value' => 2459,
                                      ),
                                      1227 => 
                                      array (
                                        'key' => 'SULBANA GAUNTLET',
                                        'value' => 2460,
                                      ),
                                      1228 => 
                                      array (
                                        'key' => 'SUMMERS',
                                        'value' => 1829368,
                                      ),
                                      1229 => 
                                      array (
                                        'key' => 'SUNSDEA MUD',
                                        'value' => 2461,
                                      ),
                                      1230 => 
                                      array (
                                        'key' => 'SUNSET WATER S&D FIRE SERVICE',
                                        'value' => 2462,
                                      ),
                                      1231 => 
                                      array (
                                        'key' => 'SUPER AIR 400',
                                        'value' => 2463,
                                      ),
                                      1232 => 
                                      array (
                                        'key' => 'SUPER BLACK FLEXWING',
                                        'value' => 2464,
                                      ),
                                      1233 => 
                                      array (
                                        'key' => 'SUPER ORTAC',
                                        'value' => 1829130,
                                      ),
                                      1234 => 
                                      array (
                                        'key' => 'SUPER ORTAC®',
                                        'value' => 2465,
                                      ),
                                      1235 => 
                                      array (
                                        'key' => 'SUPER ROCK DRILL',
                                        'value' => 2466,
                                      ),
                                      1236 => 
                                      array (
                                        'key' => 'SUPER ROCK DRILL HT',
                                        'value' => 2467,
                                      ),
                                      1237 => 
                                      array (
                                        'key' => 'SUPER SANI-WASH',
                                        'value' => 2468,
                                      ),
                                      1238 => 
                                      array (
                                        'key' => 'SUPER SANI-WASH 300',
                                        'value' => 1829152,
                                      ),
                                      1239 => 
                                      array (
                                        'key' => 'SUPER TORQUE',
                                        'value' => 1829525,
                                      ),
                                      1240 => 
                                      array (
                                        'key' => 'SUPERIOR',
                                        'value' => 2469,
                                      ),
                                      1241 => 
                                      array (
                                        'key' => 'SUPERIOR PETRO TANK TRUCK',
                                        'value' => 1829380,
                                      ),
                                      1242 => 
                                      array (
                                        'key' => 'SUPFLOW',
                                        'value' => 2470,
                                      ),
                                      1243 => 
                                      array (
                                        'key' => 'SUPVAC',
                                        'value' => 2471,
                                      ),
                                      1244 => 
                                      array (
                                        'key' => 'SURELINE',
                                        'value' => 2472,
                                      ),
                                      1245 => 
                                      array (
                                        'key' => 'SURELINE BLACK',
                                        'value' => 1829306,
                                      ),
                                      1246 => 
                                      array (
                                        'key' => 'SW DRY CEMENT & BARYTES',
                                        'value' => 2473,
                                      ),
                                      1247 => 
                                      array (
                                        'key' => 'SWAGELOK',
                                        'value' => 2474,
                                      ),
                                      1248 => 
                                      array (
                                        'key' => 'SYNCHROCHAIN CARBON',
                                        'value' => 1829531,
                                      ),
                                      1249 => 
                                      array (
                                        'key' => 'TAMARACK',
                                        'value' => 1829143,
                                      ),
                                      1250 => 
                                      array (
                                        'key' => 'TAN FLEXTRA',
                                        'value' => 2475,
                                      ),
                                      1251 => 
                                      array (
                                        'key' => 'TAN FLEXTRA FDA',
                                        'value' => 2476,
                                      ),
                                      1252 => 
                                      array (
                                        'key' => 'TAN FLEXWING',
                                        'value' => 2477,
                                      ),
                                      1253 => 
                                      array (
                                        'key' => 'TAN FLEXWING FDA',
                                        'value' => 2478,
                                      ),
                                      1254 => 
                                      array (
                                        'key' => 'TANK CLEANING',
                                        'value' => 2479,
                                      ),
                                      1255 => 
                                      array (
                                        'key' => 'TANKER BARGE DISCHARGE',
                                        'value' => 2480,
                                      ),
                                      1256 => 
                                      array (
                                        'key' => 'TEFLON',
                                        'value' => 2481,
                                      ),
                                      1257 => 
                                      array (
                                        'key' => 'TEFPASS',
                                        'value' => 1829162,
                                      ),
                                      1258 => 
                                      array (
                                        'key' => 'TEKNOR',
                                        'value' => 1829106,
                                      ),
                                      1259 => 
                                      array (
                                        'key' => 'TEKNOR 8650GT',
                                        'value' => 1829201,
                                      ),
                                      1260 => 
                                      array (
                                        'key' => 'TEKNOR 8696-27',
                                        'value' => 1829217,
                                      ),
                                      1261 => 
                                      array (
                                        'key' => 'TEKNOR 969RR',
                                        'value' => 1829226,
                                      ),
                                      1262 => 
                                      array (
                                        'key' => 'TETRA',
                                        'value' => 2482,
                                      ),
                                      1263 => 
                                      array (
                                        'key' => 'THERMIDOR',
                                        'value' => 2483,
                                      ),
                                      1264 => 
                                      array (
                                        'key' => 'THESE ARE TIED TO NORFOLK SPECS...',
                                        'value' => 1829257,
                                      ),
                                      1265 => 
                                      array (
                                        'key' => 'THOMPSON FLEX XLPE',
                                        'value' => 2484,
                                      ),
                                      1266 => 
                                      array (
                                        'key' => 'THUNDER INSTA-GRIP',
                                        'value' => 2485,
                                      ),
                                      1267 => 
                                      array (
                                        'key' => 'TIG WELDING',
                                        'value' => 2486,
                                      ),
                                      1268 => 
                                      array (
                                        'key' => 'TIMCO',
                                        'value' => 2487,
                                      ),
                                      1269 => 
                                      array (
                                        'key' => 'TIPCO PREMIUM GARDEN',
                                        'value' => 2488,
                                      ),
                                      1270 => 
                                      array (
                                        'key' => 'TIPO',
                                        'value' => 1829427,
                                      ),
                                      1271 => 
                                      array (
                                        'key' => 'TORQUE TEAM LAMINATED',
                                        'value' => 1829516,
                                      ),
                                      1272 => 
                                      array (
                                        'key' => 'TORQUE TEAM PLUS',
                                        'value' => 1829500,
                                      ),
                                      1273 => 
                                      array (
                                        'key' => 'TORQUE-FLEX',
                                        'value' => 1829498,
                                      ),
                                      1274 => 
                                      array (
                                        'key' => 'TORRIDAIR',
                                        'value' => 2489,
                                      ),
                                      1275 => 
                                      array (
                                        'key' => 'TOW CABLE',
                                        'value' => 2490,
                                      ),
                                      1276 => 
                                      array (
                                        'key' => 'TR7',
                                        'value' => 2491,
                                      ),
                                      1277 => 
                                      array (
                                        'key' => 'TR8',
                                        'value' => 2492,
                                      ),
                                      1278 => 
                                      array (
                                        'key' => 'TRANSPLY',
                                        'value' => 2493,
                                      ),
                                      1279 => 
                                      array (
                                        'key' => 'TRI-STATE',
                                        'value' => 1829330,
                                      ),
                                      1280 => 
                                      array (
                                        'key' => 'TRIDENT',
                                        'value' => 2494,
                                      ),
                                      1281 => 
                                      array (
                                        'key' => 'TRIDENT SER',
                                        'value' => 2495,
                                      ),
                                      1282 => 
                                      array (
                                        'key' => 'TRINCO BLAST',
                                        'value' => 2496,
                                      ),
                                      1283 => 
                                      array (
                                        'key' => 'TRIPLX',
                                        'value' => 2497,
                                      ),
                                      1284 => 
                                      array (
                                        'key' => 'TRIX ACETYLENE',
                                        'value' => 2498,
                                      ),
                                      1285 => 
                                      array (
                                        'key' => 'TRIX BLAUSTRAHL',
                                        'value' => 2499,
                                      ),
                                      1286 => 
                                      array (
                                        'key' => 'TRIX BRAKE',
                                        'value' => 2500,
                                      ),
                                      1287 => 
                                      array (
                                        'key' => 'TRIX FUEL',
                                        'value' => 2501,
                                      ),
                                      1288 => 
                                      array (
                                        'key' => 'TRIX MULTIFOOD',
                                        'value' => 2502,
                                      ),
                                      1289 => 
                                      array (
                                        'key' => 'TRIX NITRO',
                                        'value' => 2503,
                                      ),
                                      1290 => 
                                      array (
                                        'key' => 'TRIX OXYGEN',
                                        'value' => 2504,
                                      ),
                                      1291 => 
                                      array (
                                        'key' => 'TRIX PAINT SPRAY',
                                        'value' => 2505,
                                      ),
                                      1292 => 
                                      array (
                                        'key' => 'TRIX RESPIRATION',
                                        'value' => 2506,
                                      ),
                                      1293 => 
                                      array (
                                        'key' => 'TRIX ROSTRAHL',
                                        'value' => 2507,
                                      ),
                                      1294 => 
                                      array (
                                        'key' => 'TRIX SUPER',
                                        'value' => 2508,
                                      ),
                                      1295 => 
                                      array (
                                        'key' => 'TUNNELCOTE ROCK DUST FLEXTRA',
                                        'value' => 2509,
                                      ),
                                      1296 => 
                                      array (
                                        'key' => 'TUNNELCOTE ROCK DUST FLEXWING',
                                        'value' => 2510,
                                      ),
                                      1297 => 
                                      array (
                                        'key' => 'TWIN-LINE (GRADE R)',
                                        'value' => 2511,
                                      ),
                                      1298 => 
                                      array (
                                        'key' => 'TWIN-LINE (GRADE RM)',
                                        'value' => 2512,
                                      ),
                                      1299 => 
                                      array (
                                        'key' => 'TWIN-LINE (GRADE T)',
                                        'value' => 2513,
                                      ),
                                      1300 => 
                                      array (
                                        'key' => 'TWIN-LINE ISO 3821',
                                        'value' => 2514,
                                      ),
                                      1301 => 
                                      array (
                                        'key' => 'UL 92 FIRE EXTINGUISHER',
                                        'value' => 2515,
                                      ),
                                      1302 => 
                                      array (
                                        'key' => 'ULTRABRAID',
                                        'value' => 2516,
                                      ),
                                      1303 => 
                                      array (
                                        'key' => 'ULTRAFLEX',
                                        'value' => 2517,
                                      ),
                                      1304 => 
                                      array (
                                        'key' => 'ULTRAMAR',
                                        'value' => 2518,
                                      ),
                                      1305 => 
                                      array (
                                        'key' => 'UNDERHILL',
                                        'value' => 2519,
                                      ),
                                      1306 => 
                                      array (
                                        'key' => 'Uni-Crimp UCF10 Ferrule',
                                        'value' => 1830018,
                                      ),
                                      1307 => 
                                      array (
                                        'key' => 'Uni-Crimp UCF11 Ferrule',
                                        'value' => 1830019,
                                      ),
                                      1308 => 
                                      array (
                                        'key' => 'UNI-Crimp UCF2 Ferrule',
                                        'value' => 1830013,
                                      ),
                                      1309 => 
                                      array (
                                        'key' => 'Uni-Crimp UCF3 Ferrule',
                                        'value' => 1830014,
                                      ),
                                      1310 => 
                                      array (
                                        'key' => 'Uni-Crimp UCF6 Ferrule',
                                        'value' => 1830015,
                                      ),
                                      1311 => 
                                      array (
                                        'key' => 'Uni-Crimp UCF8 Ferrule',
                                        'value' => 1830016,
                                      ),
                                      1312 => 
                                      array (
                                        'key' => 'Uni-Crimp UCF9 Ferrule',
                                        'value' => 1830017,
                                      ),
                                      1313 => 
                                      array (
                                        'key' => 'UNISOURCE',
                                        'value' => 2520,
                                      ),
                                      1314 => 
                                      array (
                                        'key' => 'UNITED RUBBER CONTRACTOR\'S WATER',
                                        'value' => 1829291,
                                      ),
                                      1315 => 
                                      array (
                                        'key' => 'UNITRIX 60',
                                        'value' => 2521,
                                      ),
                                      1316 => 
                                      array (
                                        'key' => 'UNITRIX 80',
                                        'value' => 2522,
                                      ),
                                      1317 => 
                                      array (
                                        'key' => 'UNIWELD',
                                        'value' => 1829184,
                                      ),
                                      1318 => 
                                      array (
                                        'key' => 'UNPRINTED SPRAY SALVAGE',
                                        'value' => 2523,
                                      ),
                                      1319 => 
                                      array (
                                        'key' => 'V-50 S&D',
                                        'value' => 2524,
                                      ),
                                      1320 => 
                                      array (
                                        'key' => 'VACUUM',
                                        'value' => 2525,
                                      ),
                                      1321 => 
                                      array (
                                        'key' => 'Valve Adapter',
                                        'value' => 1830001,
                                      ),
                                      1322 => 
                                      array (
                                        'key' => 'Valve Caps',
                                        'value' => 1830002,
                                      ),
                                      1323 => 
                                      array (
                                        'key' => 'Valve Core',
                                        'value' => 1830003,
                                      ),
                                      1324 => 
                                      array (
                                        'key' => 'VAPOR RECOVERY',
                                        'value' => 2526,
                                      ),
                                      1325 => 
                                      array (
                                        'key' => 'VAPOR RECOVERY DOCK',
                                        'value' => 2527,
                                      ),
                                      1326 => 
                                      array (
                                        'key' => 'VARIABLE SPEED',
                                        'value' => 1829513,
                                      ),
                                      1327 => 
                                      array (
                                        'key' => 'VARIFLEX',
                                        'value' => 2528,
                                      ),
                                      1328 => 
                                      array (
                                        'key' => 'VELOCITY BANDING COIL',
                                        'value' => 2529,
                                      ),
                                      1329 => 
                                      array (
                                        'key' => 'VELOCITY BEVERAGE TRANSFER',
                                        'value' => 2530,
                                      ),
                                      1330 => 
                                      array (
                                        'key' => 'VELOCITY PETROLEUM TRANSFER',
                                        'value' => 2531,
                                      ),
                                      1331 => 
                                      array (
                                        'key' => 'VELOCITY WATER TRANSFER',
                                        'value' => 2532,
                                      ),
                                      1332 => 
                                      array (
                                        'key' => 'VERSACHEM',
                                        'value' => 2533,
                                      ),
                                      1333 => 
                                      array (
                                        'key' => 'VERSACRETE',
                                        'value' => 2534,
                                      ),
                                      1334 => 
                                      array (
                                        'key' => 'VERSAFUEL EN1765 S15',
                                        'value' => 2535,
                                      ),
                                      1335 => 
                                      array (
                                        'key' => 'VERSAFUEL FLEX',
                                        'value' => 2536,
                                      ),
                                      1336 => 
                                      array (
                                        'key' => 'VERSIFLO DISCHARGE',
                                        'value' => 2537,
                                      ),
                                      1337 => 
                                      array (
                                        'key' => 'VERSIFLO S&D',
                                        'value' => 2538,
                                      ),
                                      1338 => 
                                      array (
                                        'key' => 'VICTOR',
                                        'value' => 2539,
                                      ),
                                      1339 => 
                                      array (
                                        'key' => 'VICTOR GRADE RM',
                                        'value' => 1829341,
                                      ),
                                      1340 => 
                                      array (
                                        'key' => 'VICTOR GRADE T',
                                        'value' => 1829114,
                                      ),
                                      1341 => 
                                      array (
                                        'key' => 'VINTNER',
                                        'value' => 2540,
                                      ),
                                      1342 => 
                                      array (
                                        'key' => 'VINTNER MICROBAN',
                                        'value' => 2541,
                                      ),
                                      1343 => 
                                      array (
                                        'key' => 'VINTNER RESERVE',
                                        'value' => 2542,
                                      ),
                                      1344 => 
                                      array (
                                        'key' => 'VIPER',
                                        'value' => 2543,
                                      ),
                                      1345 => 
                                      array (
                                        'key' => 'WAB SLURRY',
                                        'value' => 2544,
                                      ),
                                      1346 => 
                                      array (
                                        'key' => 'WASHDOWN',
                                        'value' => 2545,
                                      ),
                                      1347 => 
                                      array (
                                        'key' => 'WASTE MATE',
                                        'value' => 2546,
                                      ),
                                      1348 => 
                                      array (
                                        'key' => 'WATER',
                                        'value' => 1829360,
                                      ),
                                      1349 => 
                                      array (
                                        'key' => 'WATER & AIR HD',
                                        'value' => 2547,
                                      ),
                                      1350 => 
                                      array (
                                        'key' => 'WATER 150 HD',
                                        'value' => 1829322,
                                      ),
                                      1351 => 
                                      array (
                                        'key' => 'WATER DISCHARGE',
                                        'value' => 2548,
                                      ),
                                      1352 => 
                                      array (
                                        'key' => 'WATER DISCHARGE 100',
                                        'value' => 1829320,
                                      ),
                                      1353 => 
                                      array (
                                        'key' => 'WATER DISCHARGE 150',
                                        'value' => 1829233,
                                      ),
                                      1354 => 
                                      array (
                                        'key' => 'WATER DISCHARGE 250',
                                        'value' => 1829376,
                                      ),
                                      1355 => 
                                      array (
                                        'key' => 'WATER DISCHARGE HD',
                                        'value' => 2549,
                                      ),
                                      1356 => 
                                      array (
                                        'key' => 'WATER DISCHARGE HD 600',
                                        'value' => 1829264,
                                      ),
                                      1357 => 
                                      array (
                                        'key' => 'WATER HD',
                                        'value' => 2550,
                                      ),
                                      1358 => 
                                      array (
                                        'key' => 'WATER JETTING',
                                        'value' => 1829279,
                                      ),
                                      1359 => 
                                      array (
                                        'key' => 'WATER JETTING 1000',
                                        'value' => 2551,
                                      ),
                                      1360 => 
                                      array (
                                        'key' => 'WATER JETTING 500',
                                        'value' => 2552,
                                      ),
                                      1361 => 
                                      array (
                                        'key' => 'WATER REHAB',
                                        'value' => 2553,
                                      ),
                                      1362 => 
                                      array (
                                        'key' => 'WATER S&D',
                                        'value' => 1829252,
                                      ),
                                      1363 => 
                                      array (
                                        'key' => 'WATER SUCTION & DISCHARGE',
                                        'value' => 2554,
                                      ),
                                      1364 => 
                                      array (
                                        'key' => 'WEDGE TLP',
                                        'value' => 1829527,
                                      ),
                                      1365 => 
                                      array (
                                        'key' => 'WEST MICH',
                                        'value' => 1829111,
                                      ),
                                      1366 => 
                                      array (
                                        'key' => 'WESTERN',
                                        'value' => 2555,
                                      ),
                                      1367 => 
                                      array (
                                        'key' => 'WHALE OIL',
                                        'value' => 2556,
                                      ),
                                      1368 => 
                                      array (
                                        'key' => 'WHALE WATER',
                                        'value' => 2557,
                                      ),
                                      1369 => 
                                      array (
                                        'key' => 'WHIPEND BLAST',
                                        'value' => 2558,
                                      ),
                                      1370 => 
                                      array (
                                        'key' => 'WHITE FLEXTRA',
                                        'value' => 2559,
                                      ),
                                      1371 => 
                                      array (
                                        'key' => 'WHITE FLEXWING',
                                        'value' => 2560,
                                      ),
                                      1372 => 
                                      array (
                                        'key' => 'WHITEWATER',
                                        'value' => 2561,
                                      ),
                                      1373 => 
                                      array (
                                        'key' => 'WHW GAUNTLET',
                                        'value' => 1829423,
                                      ),
                                      1374 => 
                                      array (
                                        'key' => 'WILD HOG',
                                        'value' => 1829225,
                                      ),
                                      1375 => 
                                      array (
                                        'key' => 'WINGCRAFT',
                                        'value' => 2562,
                                      ),
                                      1376 => 
                                      array (
                                        'key' => 'WIRE INSERTED RADIATOR HOSE',
                                        'value' => 2563,
                                      ),
                                      1377 => 
                                      array (
                                        'key' => 'WOODMI SAWDUST',
                                        'value' => 2564,
                                      ),
                                      1378 => 
                                      array (
                                        'key' => 'X-LIFE XCP3',
                                        'value' => 2566,
                                      ),
                                      1379 => 
                                      array (
                                        'key' => 'X-LIFE XCP3S',
                                        'value' => 2567,
                                      ),
                                      1380 => 
                                      array (
                                        'key' => 'X-LIFE XCP4',
                                        'value' => 2568,
                                      ),
                                      1381 => 
                                      array (
                                        'key' => 'X-LIFE XCP4S',
                                        'value' => 2569,
                                      ),
                                      1382 => 
                                      array (
                                        'key' => 'X-LIFE XCP5S',
                                        'value' => 2570,
                                      ),
                                      1383 => 
                                      array (
                                        'key' => 'X-LIFE XCP6S',
                                        'value' => 2571,
                                      ),
                                      1384 => 
                                      array (
                                        'key' => 'X-LIFE XR16SC',
                                        'value' => 2572,
                                      ),
                                      1385 => 
                                      array (
                                        'key' => 'XF BLAST',
                                        'value' => 2565,
                                      ),
                                      1386 => 
                                      array (
                                        'key' => 'XLPE CHEMICAL TRANSFER',
                                        'value' => 2573,
                                      ),
                                      1387 => 
                                      array (
                                        'key' => 'XPOWER',
                                        'value' => 2574,
                                      ),
                                      1388 => 
                                      array (
                                        'key' => 'XPOWER OILFIELD FRAC HW',
                                        'value' => 1829105,
                                      ),
                                      1389 => 
                                      array (
                                        'key' => 'YARDMASTER GARDEN HOSE',
                                        'value' => 2575,
                                      ),
                                      1390 => 
                                      array (
                                        'key' => 'YELLOW FLEXWING',
                                        'value' => 2576,
                                      ),
                                      1391 => 
                                      array (
                                        'key' => 'YUKON',
                                        'value' => 2577,
                                      ),
                                      1392 => 
                                      array (
                                        'key' => 'YUKON BLUE',
                                        'value' => 1829293,
                                      ),
                                      1393 => 
                                      array (
                                        'key' => 'YUKON SPIRAFLEX',
                                        'value' => 2578,
                                      ),
                                      1394 => 
                                      array (
                                        'key' => 'ZZH561K-AA2',
                                        'value' => 2579,
                                      ),
                                      1395 => 
                                      array (
                                        'key' => 'ZZH561K-BA2',
                                        'value' => 2580,
                                      ),
                                      1396 => 
                                      array (
                                        'key' => 'ZZH601 3-2',
                                        'value' => 2581,
                                      ),
                                    ),
                                     'width' => 300,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                     'optionsProviderData' => 'Brand|Name',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'brandName',
                                     'title' => 'Brand Name',
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
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
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
                                     'name' => 'shelfLife',
                                     'title' => 'Shelf Life',
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
                                     'name' => 'nitrosamines',
                                     'title' => 'Nitrosamines',
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
                                  3 => 
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
                                     'name' => 'rohs',
                                     'title' => 'Rohs',
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
                                  4 => 
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
                                     'name' => 'reach',
                                     'title' => 'Reach',
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
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'fieldtype' => 'textarea',
                                     'width' => 300,
                                     'height' => '',
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'queryColumnType' => 'longtext',
                                     'columnType' => 'longtext',
                                     'phpdocType' => 'string',
                                     'name' => 'prop65Message',
                                     'title' => 'Prop 65 Message',
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
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'weightg',
                                     'title' => 'Weight_ g/m',
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
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'weightKg',
                                     'title' => 'Weight (kg/m)',
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
                                  8 => 
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
                                     'name' => 'WeightLbsPerFTUOM',
                                     'title' => 'Weight_Lbs per ft - UOM',
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
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 200,
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
                                 'bodyStyle' => 'margin-left: 20px;',
                                 'datatype' => 'layout',
                                 'permissions' => NULL,
                                 'childs' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'fieldtype' => 'textarea',
                                     'width' => 300,
                                     'height' => 100,
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'queryColumnType' => 'longtext',
                                     'columnType' => 'longtext',
                                     'phpdocType' => 'string',
                                     'name' => 'numeratorForConversionToBaseUnitsOfMeasure',
                                     'title' => 'Numerator for Conversion to Base Units of Measure',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                  )),
                                  1 => 
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
                                     'name' => 'alternativeUnitOfMeasureForStockkeepingUnit',
                                     'title' => 'Alternative Unit of Measure for Stockkeeping Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
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
                                     'name' => 'denominatorForConversionToBaseUnitsOfMeasure',
                                     'title' => 'Denominator for conversion to base units of measure',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
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
                                     'name' => 'californiaProposition65ChemicalName1',
                                     'title' => 'California Proposition65 Chemical Name1',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
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
                                     'name' => 'californiaProposition65ChemicalName2',
                                     'title' => 'California Proposition 65 Chemical Name2',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
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
                                     'name' => 'californiaProposition65ChemicalName3',
                                     'title' => 'California Proposition 65 Chemical Name3',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
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
                                     'name' => 'searchKeywords',
                                     'title' => 'Search Keywords',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  7 => 
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
                                     'name' => 'webDiscription',
                                     'title' => 'Web Description',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Yes',
                                     'noLabel' => 'No',
                                     'emptyLabel' => 'Empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Empty',
                                        'value' => 0,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Yes',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'No',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'proposition65WarningAttributesRequired',
                                     'title' => 'Proposition 65 warning attributes required',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                  )),
                                  9 => 
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
                                     'name' => 'UnitsInPackage',
                                     'title' => 'Units in Package ',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  10 => 
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
                                     'name' => 'continentalBrand',
                                     'title' => 'Continental Brand / Product Name',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  11 => 
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
                                     'name' => 'brandConstruction',
                                     'title' => 'Brand Construction',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  12 => 
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
                                     'name' => 'substitutePartNumber',
                                     'title' => ' Substitute Part Number',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                             'fieldtype' => 'localizedfields',
                             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                             'childs' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 100,
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
                                     'labelWidth' => 220,
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                         'fieldtype' => 'multiselect',
                                         'options' => 
                                        array (
                                          0 => 
                                          array (
                                            'key' => '1/2 Bend Radius',
                                            'value' => 3187,
                                          ),
                                          1 => 
                                          array (
                                            'key' => '1000hr Steam Rack Tested',
                                            'value' => 3063,
                                          ),
                                          2 => 
                                          array (
                                            'key' => '10:1 Safety Factor',
                                            'value' => 3062,
                                          ),
                                          3 => 
                                          array (
                                            'key' => '20:1 Safety Factor',
                                            'value' => 3064,
                                          ),
                                          4 => 
                                          array (
                                            'key' => '25 to 30 percent higher power ratings than classical v-belts',
                                            'value' => 759991,
                                          ),
                                          5 => 
                                          array (
                                            'key' => '3-A 18-02 Certified',
                                            'value' => 759935,
                                          ),
                                          6 => 
                                          array (
                                            'key' => '3A 18-03 Certified',
                                            'value' => 3065,
                                          ),
                                          7 => 
                                          array (
                                            'key' => '3A Compliant Tube',
                                            'value' => 3066,
                                          ),
                                          8 => 
                                          array (
                                            'key' => '4 percent more energy efficient than traditional v-belts',
                                            'value' => 759992,
                                          ),
                                          9 => 
                                          array (
                                            'key' => '4:1 Safety Factor',
                                            'value' => 759936,
                                          ),
                                          10 => 
                                          array (
                                            'key' => '500,000 Impulse Cycles Tested',
                                            'value' => 3067,
                                          ),
                                          11 => 
                                          array (
                                            'key' => 'Abrasion resistant tube',
                                            'value' => 3068,
                                          ),
                                          12 => 
                                          array (
                                            'key' => 'ABS Certified',
                                            'value' => 3069,
                                          ),
                                          13 => 
                                          array (
                                            'key' => 'Air Conditioning',
                                            'value' => 3070,
                                          ),
                                          14 => 
                                          array (
                                            'key' => 'Armorcoat™ Abrasion-Resistant Cover',
                                            'value' => 3071,
                                          ),
                                          15 => 
                                          array (
                                            'key' => 'Available in raw-edge, molded cog and envelope constructions',
                                            'value' => 759993,
                                          ),
                                          16 => 
                                          array (
                                            'key' => 'Available with cogs for increased flexibility and heat dissipation',
                                            'value' => 759994,
                                          ),
                                          17 => 
                                          array (
                                            'key' => 'Avilable in cut-edge or envelope construction',
                                            'value' => 759995,
                                          ),
                                          18 => 
                                          array (
                                            'key' => 'B100 Fuel Compatibility',
                                            'value' => 3072,
                                          ),
                                          19 => 
                                          array (
                                            'key' => 'B20 Fuel Compatibility',
                                            'value' => 3073,
                                          ),
                                          20 => 
                                          array (
                                            'key' => 'Barber Pole Design',
                                            'value' => 3188,
                                          ),
                                          21 => 
                                          array (
                                            'key' => 'Beats the heat, operates continuous at temperatures up to 210 F',
                                            'value' => 759996,
                                          ),
                                          22 => 
                                          array (
                                            'key' => 'Better Cover Adhesion',
                                            'value' => 759937,
                                          ),
                                          23 => 
                                          array (
                                            'key' => 'Better Flame Resistance',
                                            'value' => 759938,
                                          ),
                                          24 => 
                                          array (
                                            'key' => 'Braided Construction - Greater Fitting Retention',
                                            'value' => 759939,
                                          ),
                                          25 => 
                                          array (
                                            'key' => 'Braided Construction - Kink Resistant',
                                            'value' => 759940,
                                          ),
                                          26 => 
                                          array (
                                            'key' => 'Braided Construction - Reeling Durability',
                                            'value' => 759941,
                                          ),
                                          27 => 
                                          array (
                                            'key' => 'Braided Construction - Superior Durability',
                                            'value' => 759942,
                                          ),
                                          28 => 
                                          array (
                                            'key' => 'Braided Construction - Twist Resistant',
                                            'value' => 759943,
                                          ),
                                          29 => 
                                          array (
                                            'key' => 'Built In Couplings Available',
                                            'value' => 3074,
                                          ),
                                          30 => 
                                          array (
                                            'key' => 'Built On Chrome Mandrel',
                                            'value' => 759989,
                                          ),
                                          31 => 
                                          array (
                                            'key' => 'Chemical Resistant',
                                            'value' => 3075,
                                          ),
                                          32 => 
                                          array (
                                            'key' => 'Chrome Mandrel Built',
                                            'value' => 3076,
                                          ),
                                          33 => 
                                          array (
                                            'key' => 'Cogged for cooler running',
                                            'value' => 759997,
                                          ),
                                          34 => 
                                          array (
                                            'key' => 'Conductive',
                                            'value' => 3077,
                                          ),
                                          35 => 
                                          array (
                                            'key' => 'Conductive Cover',
                                            'value' => 3078,
                                          ),
                                          36 => 
                                          array (
                                            'key' => 'Conductive Tube',
                                            'value' => 3079,
                                          ),
                                          37 => 
                                          array (
                                            'key' => 'Conductive Tube & Cover',
                                            'value' => 3080,
                                          ),
                                          38 => 
                                          array (
                                            'key' => 'Consistent performance',
                                            'value' => 759998,
                                          ),
                                          39 => 
                                          array (
                                            'key' => 'Consistent, reliable and predictable over the life of belt',
                                            'value' => 759999,
                                          ),
                                          40 => 
                                          array (
                                            'key' => 'Constant Pressure Rating',
                                            'value' => 3081,
                                          ),
                                          41 => 
                                          array (
                                            'key' => 'Continuous Lengths Available',
                                            'value' => 3082,
                                          ),
                                          42 => 
                                          array (
                                            'key' => 'Cost effective',
                                            'value' => 760000,
                                          ),
                                          43 => 
                                          array (
                                            'key' => 'Coupled Assembly Available',
                                            'value' => 3083,
                                          ),
                                          44 => 
                                          array (
                                            'key' => 'Crimp Specs Available',
                                            'value' => 3084,
                                          ),
                                          45 => 
                                          array (
                                            'key' => 'Crimped Solution Available',
                                            'value' => 759944,
                                          ),
                                          46 => 
                                          array (
                                            'key' => 'Crush Resistant',
                                            'value' => 3085,
                                          ),
                                          47 => 
                                          array (
                                            'key' => 'Cut Lengths Available',
                                            'value' => 3086,
                                          ),
                                          48 => 
                                          array (
                                            'key' => 'Decreased component wear',
                                            'value' => 760001,
                                          ),
                                          49 => 
                                          array (
                                            'key' => 'Decreased drive weight',
                                            'value' => 760002,
                                          ),
                                          50 => 
                                          array (
                                            'key' => 'Decreased system weight',
                                            'value' => 760003,
                                          ),
                                          51 => 
                                          array (
                                            'key' => 'Designed for high-capacity performance',
                                            'value' => 760004,
                                          ),
                                          52 => 
                                          array (
                                            'key' => 'Dissipates heat',
                                            'value' => 760005,
                                          ),
                                          53 => 
                                          array (
                                            'key' => 'Drinking Water Safe',
                                            'value' => 3087,
                                          ),
                                          54 => 
                                          array (
                                            'key' => 'Dual purpose for classical and FHP',
                                            'value' => 760006,
                                          ),
                                          55 => 
                                          array (
                                            'key' => 'Dual-sided classical profile',
                                            'value' => 760007,
                                          ),
                                          56 => 
                                          array (
                                            'key' => 'Durability that goes the distance',
                                            'value' => 760008,
                                          ),
                                          57 => 
                                          array (
                                            'key' => 'E25 Fuel Compatibility',
                                            'value' => 3088,
                                          ),
                                          58 => 
                                          array (
                                            'key' => 'E85 Fuel Compatibility',
                                            'value' => 3089,
                                          ),
                                          59 => 
                                          array (
                                            'key' => 'Ease of Coupling',
                                            'value' => 3090,
                                          ),
                                          60 => 
                                          array (
                                            'key' => 'Ease Of Coupling',
                                            'value' => 759945,
                                          ),
                                          61 => 
                                          array (
                                            'key' => 'Ease of Handling',
                                            'value' => 3091,
                                          ),
                                          62 => 
                                          array (
                                            'key' => 'Easy installation',
                                            'value' => 760009,
                                          ),
                                          63 => 
                                          array (
                                            'key' => 'Economical and trouble-free',
                                            'value' => 760010,
                                          ),
                                          64 => 
                                          array (
                                            'key' => 'Economical Solution',
                                            'value' => 3092,
                                          ),
                                          65 => 
                                          array (
                                            'key' => 'EI 1529-7th Edition, 2014 Compliant',
                                            'value' => 3093,
                                          ),
                                          66 => 
                                          array (
                                            'key' => 'Eliminates chirps, squeaks and squeals',
                                            'value' => 760011,
                                          ),
                                          67 => 
                                          array (
                                            'key' => 'EN 1361 Compliant',
                                            'value' => 3094,
                                          ),
                                          68 => 
                                          array (
                                            'key' => 'Energy saving',
                                            'value' => 760012,
                                          ),
                                          69 => 
                                          array (
                                            'key' => 'Engineered to universal metric profiles',
                                            'value' => 760013,
                                          ),
                                          70 => 
                                          array (
                                            'key' => 'Exceeds ASME B30.27-2009. 2:1 WP to Burst Ratio',
                                            'value' => 3095,
                                          ),
                                          71 => 
                                          array (
                                            'key' => 'Exceptional Durability',
                                            'value' => 3096,
                                          ),
                                          72 => 
                                          array (
                                            'key' => 'Exceptional lengthwise flexibility allows for small pulleys',
                                            'value' => 760014,
                                          ),
                                          73 => 
                                          array (
                                            'key' => 'Extreme Flexibility',
                                            'value' => 3097,
                                          ),
                                          74 => 
                                          array (
                                            'key' => 'FDA / USDA Certified Tube',
                                            'value' => 3189,
                                          ),
                                          75 => 
                                          array (
                                            'key' => 'FDA / USDA Compliant Tube',
                                            'value' => 3190,
                                          ),
                                          76 => 
                                          array (
                                            'key' => 'Fiberglass tension cords for excellent resistance to shrinkage/elongation',
                                            'value' => 760066,
                                          ),
                                          77 => 
                                          array (
                                            'key' => 'Field Attachable Coupling',
                                            'value' => 3098,
                                          ),
                                          78 => 
                                          array (
                                            'key' => 'Fits smaller pulleys',
                                            'value' => 760015,
                                          ),
                                          79 => 
                                          array (
                                            'key' => 'Full Vacuum Rating',
                                            'value' => 3099,
                                          ),
                                          80 => 
                                          array (
                                            'key' => 'Good Flexibility',
                                            'value' => 3100,
                                          ),
                                          81 => 
                                          array (
                                            'key' => 'Greater Abrasion Resistance In The Tube',
                                            'value' => 759946,
                                          ),
                                          82 => 
                                          array (
                                            'key' => 'Greater Abrasion Resistance On The Cover',
                                            'value' => 759947,
                                          ),
                                          83 => 
                                          array (
                                            'key' => 'Greater Ozone Resistance',
                                            'value' => 759948,
                                          ),
                                          84 => 
                                          array (
                                            'key' => 'Handles 90% of Common Chemicals',
                                            'value' => 3101,
                                          ),
                                          85 => 
                                          array (
                                            'key' => 'Handles 98% of Common Chemicals',
                                            'value' => 3102,
                                          ),
                                          86 => 
                                          array (
                                            'key' => 'Handles Common Industry Chemicals ',
                                            'value' => 3191,
                                          ),
                                          87 => 
                                          array (
                                            'key' => 'Handles High Aromatic Hydrocarbons',
                                            'value' => 3103,
                                          ),
                                          88 => 
                                          array (
                                            'key' => 'Heat and oil resistant',
                                            'value' => 760016,
                                          ),
                                          89 => 
                                          array (
                                            'key' => 'Heat, ozone and abrasion resistant',
                                            'value' => 760017,
                                          ),
                                          90 => 
                                          array (
                                            'key' => 'Helicog profile for quiet operation',
                                            'value' => 760018,
                                          ),
                                          91 => 
                                          array (
                                            'key' => 'High & Low Temperature Rating',
                                            'value' => 3104,
                                          ),
                                          92 => 
                                          array (
                                            'key' => 'High Oil Resistance Cover',
                                            'value' => 3105,
                                          ),
                                          93 => 
                                          array (
                                            'key' => 'High Oil Resistance Tube',
                                            'value' => 3106,
                                          ),
                                          94 => 
                                          array (
                                            'key' => 'High Oil Resistance Tube & Cover',
                                            'value' => 3107,
                                          ),
                                          95 => 
                                          array (
                                            'key' => 'High Pressure Rating',
                                            'value' => 3108,
                                          ),
                                          96 => 
                                          array (
                                            'key' => 'High Temperature Rating',
                                            'value' => 3109,
                                          ),
                                          97 => 
                                          array (
                                            'key' => 'High-strength aramid tensile members',
                                            'value' => 760020,
                                          ),
                                          98 => 
                                          array (
                                            'key' => 'Higher Maximum Temperature Rating',
                                            'value' => 759949,
                                          ),
                                          99 => 
                                          array (
                                            'key' => 'Higher Vacuum Rating',
                                            'value' => 759950,
                                          ),
                                          100 => 
                                          array (
                                            'key' => 'Higher Working Pressure',
                                            'value' => 759951,
                                          ),
                                          101 => 
                                          array (
                                            'key' => 'Highly versital',
                                            'value' => 760019,
                                          ),
                                          102 => 
                                          array (
                                            'key' => 'Homogeneous, Extruded Tube',
                                            'value' => 3110,
                                          ),
                                          103 => 
                                          array (
                                            'key' => 'Ideal for lumber applications',
                                            'value' => 760021,
                                          ),
                                          104 => 
                                          array (
                                            'key' => 'Increase belt life',
                                            'value' => 760022,
                                          ),
                                          105 => 
                                          array (
                                            'key' => 'Increased belt and sheave life',
                                            'value' => 760023,
                                          ),
                                          106 => 
                                          array (
                                            'key' => 'Increased belt life',
                                            'value' => 760024,
                                          ),
                                          107 => 
                                          array (
                                            'key' => 'Increased belt life up to 4 times',
                                            'value' => 760025,
                                          ),
                                          108 => 
                                          array (
                                            'key' => 'Increased efficiency',
                                            'value' => 760026,
                                          ),
                                          109 => 
                                          array (
                                            'key' => 'Increased flexibility, abrasion and heat resistance',
                                            'value' => 760027,
                                          ),
                                          110 => 
                                          array (
                                            'key' => 'Increased power',
                                            'value' => 760028,
                                          ),
                                          111 => 
                                          array (
                                            'key' => 'Internal Expansion For Expanded Flow',
                                            'value' => 759952,
                                          ),
                                          112 => 
                                          array (
                                            'key' => 'ISO1825:2010 Type E Grade 2 Compliant',
                                            'value' => 3111,
                                          ),
                                          113 => 
                                          array (
                                            'key' => 'Keeps you running in a pinch',
                                            'value' => 760029,
                                          ),
                                          114 => 
                                          array (
                                            'key' => 'Kink Resistance',
                                            'value' => 3112,
                                          ),
                                          115 => 
                                          array (
                                            'key' => 'Lightweight Construction',
                                            'value' => 3113,
                                          ),
                                          116 => 
                                          array (
                                            'key' => 'Limited Oil Resistance Cover',
                                            'value' => 3114,
                                          ),
                                          117 => 
                                          array (
                                            'key' => 'Limited Oil Resistance Tube',
                                            'value' => 3115,
                                          ),
                                          118 => 
                                          array (
                                            'key' => 'Limited Oil Resistance Tube & Cover',
                                            'value' => 3116,
                                          ),
                                          119 => 
                                          array (
                                            'key' => 'Lloyd\'s Certified',
                                            'value' => 3117,
                                          ),
                                          120 => 
                                          array (
                                            'key' => 'Longer life',
                                            'value' => 760030,
                                          ),
                                          121 => 
                                          array (
                                            'key' => 'Low Coefficient Of Friction For Ease Of Maneuverability',
                                            'value' => 759953,
                                          ),
                                          122 => 
                                          array (
                                            'key' => 'Low Computer Creep',
                                            'value' => 3118,
                                          ),
                                          123 => 
                                          array (
                                            'key' => 'Low Drag Resistance',
                                            'value' => 3119,
                                          ),
                                          124 => 
                                          array (
                                            'key' => 'Low Extraction Tube',
                                            'value' => 3120,
                                          ),
                                          125 => 
                                          array (
                                            'key' => 'Low Extraction Tube To Reduce Contamination',
                                            'value' => 759954,
                                          ),
                                          126 => 
                                          array (
                                            'key' => 'Low Force to Bend',
                                            'value' => 3121,
                                          ),
                                          127 => 
                                          array (
                                            'key' => 'Low Temperature Flexibility',
                                            'value' => 3122,
                                          ),
                                          128 => 
                                          array (
                                            'key' => 'Low Temperature Rating',
                                            'value' => 3123,
                                          ),
                                          129 => 
                                          array (
                                            'key' => 'Low vibration for low noise',
                                            'value' => 760031,
                                          ),
                                          130 => 
                                          array (
                                            'key' => 'Lower Computer Creep',
                                            'value' => 759955,
                                          ),
                                          131 => 
                                          array (
                                            'key' => 'Lower Force To Bend',
                                            'value' => 759956,
                                          ),
                                          132 => 
                                          array (
                                            'key' => 'Lower Minimum Temperature Rating',
                                            'value' => 759957,
                                          ),
                                          133 => 
                                          array (
                                            'key' => 'Lower noise generation',
                                            'value' => 760032,
                                          ),
                                          134 => 
                                          array (
                                            'key' => 'Lower Weight Per Foot',
                                            'value' => 759958,
                                          ),
                                          135 => 
                                          array (
                                            'key' => 'Made in USA',
                                            'value' => 3124,
                                          ),
                                          136 => 
                                          array (
                                            'key' => 'Made in USA',
                                            'value' => 760033,
                                          ),
                                          137 => 
                                          array (
                                            'key' => 'Maintenance Free',
                                            'value' => 3125,
                                          ),
                                          138 => 
                                          array (
                                            'key' => 'Maximum Abrasion Resistant Cover',
                                            'value' => 3126,
                                          ),
                                          139 => 
                                          array (
                                            'key' => 'Medium Oil Resistance Cover',
                                            'value' => 3127,
                                          ),
                                          140 => 
                                          array (
                                            'key' => 'Medium Oil Resistance Tube',
                                            'value' => 3128,
                                          ),
                                          141 => 
                                          array (
                                            'key' => 'Medium Oil Resistance Tube & Cover',
                                            'value' => 3129,
                                          ),
                                          142 => 
                                          array (
                                            'key' => 'Meets ARPM IP-7 2011 Guidelines',
                                            'value' => 759959,
                                          ),
                                          143 => 
                                          array (
                                            'key' => 'Meets ARPM IP-7 Standards ',
                                            'value' => 3192,
                                          ),
                                          144 => 
                                          array (
                                            'key' => 'Meets CARB Requirements',
                                            'value' => 759960,
                                          ),
                                          145 => 
                                          array (
                                            'key' => 'Meets CARB requirements',
                                            'value' => 3130,
                                          ),
                                          146 => 
                                          array (
                                            'key' => 'Meets CGA E-1 Standards',
                                            'value' => 3131,
                                          ),
                                          147 => 
                                          array (
                                            'key' => 'Meets CGA Requirements',
                                            'value' => 759961,
                                          ),
                                          148 => 
                                          array (
                                            'key' => 'Meets DOT Requirements',
                                            'value' => 3132,
                                          ),
                                          149 => 
                                          array (
                                            'key' => 'Meets EN 12115:2011',
                                            'value' => 3133,
                                          ),
                                          150 => 
                                          array (
                                            'key' => 'Meets EVR Requirements',
                                            'value' => 3134,
                                          ),
                                          151 => 
                                          array (
                                            'key' => 'Meets ISO 22241-2 Immersion Test',
                                            'value' => 3135,
                                          ),
                                          152 => 
                                          array (
                                            'key' => 'Meets ISO 22241-2 Standard',
                                            'value' => 759962,
                                          ),
                                          153 => 
                                          array (
                                            'key' => 'Meets ISO 7840 Type A1',
                                            'value' => 3136,
                                          ),
                                          154 => 
                                          array (
                                            'key' => 'Meets ISO 7840 Type A2',
                                            'value' => 3137,
                                          ),
                                          155 => 
                                          array (
                                            'key' => 'Meets ISO 7840 Type B2',
                                            'value' => 3138,
                                          ),
                                          156 => 
                                          array (
                                            'key' => 'Meets Low Permeation Requirements',
                                            'value' => 759963,
                                          ),
                                          157 => 
                                          array (
                                            'key' => 'Meets ORVR Requirements',
                                            'value' => 759964,
                                          ),
                                          158 => 
                                          array (
                                            'key' => 'Meets ORVR requirements',
                                            'value' => 3139,
                                          ),
                                          159 => 
                                          array (
                                            'key' => 'Microban Cover',
                                            'value' => 3140,
                                          ),
                                          160 => 
                                          array (
                                            'key' => 'Microban Cover - Anti-Microbial Protection',
                                            'value' => 759965,
                                          ),
                                          161 => 
                                          array (
                                            'key' => 'Microban Cover Option Available',
                                            'value' => 3141,
                                          ),
                                          162 => 
                                          array (
                                            'key' => 'Mild Chemical Resistance',
                                            'value' => 3142,
                                          ),
                                          163 => 
                                          array (
                                            'key' => 'Military Applications',
                                            'value' => 3143,
                                          ),
                                          164 => 
                                          array (
                                            'key' => 'More narrow drive',
                                            'value' => 760034,
                                          ),
                                          165 => 
                                          array (
                                            'key' => 'MSHA Flame Resistant Cover',
                                            'value' => 3144,
                                          ),
                                          166 => 
                                          array (
                                            'key' => 'MSHA Flame Resistant Cover Available',
                                            'value' => 3145,
                                          ),
                                          167 => 
                                          array (
                                            'key' => 'MSHA Flame Resistant Tube & Cover',
                                            'value' => 3146,
                                          ),
                                          168 => 
                                          array (
                                            'key' => 'MSHA Rated Cover',
                                            'value' => 759966,
                                          ),
                                          169 => 
                                          array (
                                            'key' => 'Multiple Colors Available',
                                            'value' => 3147,
                                          ),
                                          170 => 
                                          array (
                                            'key' => 'NFPA Bulletin #407 Compliant',
                                            'value' => 3148,
                                          ),
                                          171 => 
                                          array (
                                            'key' => 'Nitrile Tube Designed for Jet Fuel',
                                            'value' => 3193,
                                          ),
                                          172 => 
                                          array (
                                            'key' => 'Non Conductive - Minimum Electric Resistance Greater Than 1 Megohm Per Inch At 1000 Volts Dc',
                                            'value' => 759967,
                                          ),
                                          173 => 
                                          array (
                                            'key' => 'Non-Conductive Cover',
                                            'value' => 3149,
                                          ),
                                          174 => 
                                          array (
                                            'key' => 'Non-Conductive Tube',
                                            'value' => 3150,
                                          ),
                                          175 => 
                                          array (
                                            'key' => 'Non-Conductive Tube & Cover',
                                            'value' => 3151,
                                          ),
                                          176 => 
                                          array (
                                            'key' => 'Non-Damming Cover',
                                            'value' => 3152,
                                          ),
                                          177 => 
                                          array (
                                            'key' => 'Non-Marking Cover',
                                            'value' => 3153,
                                          ),
                                          178 => 
                                          array (
                                            'key' => 'Non-Porous Tube',
                                            'value' => 3154,
                                          ),
                                          179 => 
                                          array (
                                            'key' => 'Non-Skive Crimped Solution',
                                            'value' => 759968,
                                          ),
                                          180 => 
                                          array (
                                            'key' => 'Not Pin-Pricked, Eliminating Path Of Moisture To Reinforcement',
                                            'value' => 759969,
                                          ),
                                          181 => 
                                          array (
                                            'key' => 'NSF-61 Listed Material',
                                            'value' => 3155,
                                          ),
                                          182 => 
                                          array (
                                            'key' => 'Oil Resistant',
                                            'value' => 3156,
                                          ),
                                          183 => 
                                          array (
                                            'key' => 'Oil, heat, ozone and abrasion resistant',
                                            'value' => 760035,
                                          ),
                                          184 => 
                                          array (
                                            'key' => 'Outperforms On Flex Fatigue Testing',
                                            'value' => 759970,
                                          ),
                                          185 => 
                                          array (
                                            'key' => 'Passes 1000 Hour Steam Rack Test',
                                            'value' => 759988,
                                          ),
                                          186 => 
                                          array (
                                            'key' => 'Peace of mind',
                                            'value' => 760036,
                                          ),
                                          187 => 
                                          array (
                                            'key' => 'Peroxide cured',
                                            'value' => 3157,
                                          ),
                                          188 => 
                                          array (
                                            'key' => 'Pin Pricked, Allowing Release Of Gasses Or Vapors Which May Permeate Tube Of The Hose',
                                            'value' => 759971,
                                          ),
                                          189 => 
                                          array (
                                            'key' => 'Pin-Pricked Cover',
                                            'value' => 3158,
                                          ),
                                          190 => 
                                          array (
                                            'key' => 'Premium Ozone Resistance',
                                            'value' => 3159,
                                          ),
                                          191 => 
                                          array (
                                            'key' => 'Provides accurate positioning',
                                            'value' => 760037,
                                          ),
                                          192 => 
                                          array (
                                            'key' => 'Quiet Channel Technology',
                                            'value' => 760038,
                                          ),
                                          193 => 
                                          array (
                                            'key' => 'Quiet tooth engagement',
                                            'value' => 760039,
                                          ),
                                          194 => 
                                          array (
                                            'key' => 'Reduce maintenance',
                                            'value' => 760040,
                                          ),
                                          195 => 
                                          array (
                                            'key' => 'Reduced costs',
                                            'value' => 760041,
                                          ),
                                          196 => 
                                          array (
                                            'key' => 'Reduced drive cost',
                                            'value' => 760042,
                                          ),
                                          197 => 
                                          array (
                                            'key' => 'Reduced drive weight',
                                            'value' => 760043,
                                          ),
                                          198 => 
                                          array (
                                            'key' => 'Reduced inventory',
                                            'value' => 760044,
                                          ),
                                          199 => 
                                          array (
                                            'key' => 'Reduced maintenance',
                                            'value' => 760045,
                                          ),
                                          200 => 
                                          array (
                                            'key' => 'Reduced maintenance provided by its resistance to elongation',
                                            'value' => 760046,
                                          ),
                                          201 => 
                                          array (
                                            'key' => 'Reduced operating noise up to 6 dB',
                                            'value' => 760047,
                                          ),
                                          202 => 
                                          array (
                                            'key' => 'Reduced overall costs',
                                            'value' => 760048,
                                          ),
                                          203 => 
                                          array (
                                            'key' => 'Reduced stretch and shrinkage',
                                            'value' => 760049,
                                          ),
                                          204 => 
                                          array (
                                            'key' => 'Reduced vibration and operating noise',
                                            'value' => 760050,
                                          ),
                                          205 => 
                                          array (
                                            'key' => 'Reduced vibration and turn over',
                                            'value' => 760051,
                                          ),
                                          206 => 
                                          array (
                                            'key' => 'Reeling Durability',
                                            'value' => 3160,
                                          ),
                                          207 => 
                                          array (
                                            'key' => 'Resistance up to 10% Xylene',
                                            'value' => 3161,
                                          ),
                                          208 => 
                                          array (
                                            'key' => 'Resistant to Animal Fats',
                                            'value' => 3162,
                                          ),
                                          209 => 
                                          array (
                                            'key' => 'Ribbed top for transverse rigidity, flexibility and cool running conditions',
                                            'value' => 760052,
                                          ),
                                          210 => 
                                          array (
                                            'key' => 'Rust Resistant Wire Reinforcement',
                                            'value' => 3163,
                                          ),
                                          211 => 
                                          array (
                                            'key' => 'Self tensioning technology',
                                            'value' => 760053,
                                          ),
                                          212 => 
                                          array (
                                            'key' => 'Silicone free raw materials and production',
                                            'value' => 760054,
                                          ),
                                          213 => 
                                          array (
                                            'key' => 'Smooth Cover For Low Drag Resistance',
                                            'value' => 759972,
                                          ),
                                          214 => 
                                          array (
                                            'key' => 'Smooth operation due to precision belt characteristics',
                                            'value' => 760055,
                                          ),
                                          215 => 
                                          array (
                                            'key' => 'Static conductive',
                                            'value' => 760056,
                                          ),
                                          216 => 
                                          array (
                                            'key' => 'Static Conductive',
                                            'value' => 3164,
                                          ),
                                          217 => 
                                          array (
                                            'key' => 'Static Dissipating Cover',
                                            'value' => 3165,
                                          ),
                                          218 => 
                                          array (
                                            'key' => 'Static Dissipating Tube',
                                            'value' => 3166,
                                          ),
                                          219 => 
                                          array (
                                            'key' => 'Static Dissipating Tube & Cover',
                                            'value' => 3167,
                                          ),
                                          220 => 
                                          array (
                                            'key' => 'Static Wire',
                                            'value' => 3168,
                                          ),
                                          221 => 
                                          array (
                                            'key' => 'Static Wire Allowing For Static Continuity In Crimped Assembly',
                                            'value' => 759973,
                                          ),
                                          222 => 
                                          array (
                                            'key' => 'Static Wire Option Available',
                                            'value' => 3169,
                                          ),
                                          223 => 
                                          array (
                                            'key' => 'Suitable for drinking  water',
                                            'value' => 759974,
                                          ),
                                          224 => 
                                          array (
                                            'key' => 'Superior Abrasion Resistant Cover',
                                            'value' => 3170,
                                          ),
                                          225 => 
                                          array (
                                            'key' => 'Superior Abrasion Resistant Tube',
                                            'value' => 3171,
                                          ),
                                          226 => 
                                          array (
                                            'key' => 'Superior Abrasion Resistant Tube & Cover',
                                            'value' => 3172,
                                          ),
                                          227 => 
                                          array (
                                            'key' => 'Superior Bend Radius',
                                            'value' => 759975,
                                          ),
                                          228 => 
                                          array (
                                            'key' => 'Superior Cold Weather Flexibility',
                                            'value' => 759976,
                                          ),
                                          229 => 
                                          array (
                                            'key' => 'Superior Cover Adhesion',
                                            'value' => 3173,
                                          ),
                                          230 => 
                                          array (
                                            'key' => 'Superior Crush-Resistance',
                                            'value' => 759977,
                                          ),
                                          231 => 
                                          array (
                                            'key' => 'Superior Durability',
                                            'value' => 759978,
                                          ),
                                          232 => 
                                          array (
                                            'key' => 'Superior efficiency for improved performance',
                                            'value' => 760057,
                                          ),
                                          233 => 
                                          array (
                                            'key' => 'Superior Fitting Retention',
                                            'value' => 3174,
                                          ),
                                          234 => 
                                          array (
                                            'key' => 'Superior Kink Resistance',
                                            'value' => 759979,
                                          ),
                                          235 => 
                                          array (
                                            'key' => 'Superior Oil Resistance In The Tube',
                                            'value' => 759980,
                                          ),
                                          236 => 
                                          array (
                                            'key' => 'Superior Oil Resistance On The Cover',
                                            'value' => 759981,
                                          ),
                                          237 => 
                                          array (
                                            'key' => 'Superior Oil Resistance Tube And Cover',
                                            'value' => 759982,
                                          ),
                                          238 => 
                                          array (
                                            'key' => 'Superior Resistance To Oil, Grease And Animal Fat',
                                            'value' => 759983,
                                          ),
                                          239 => 
                                          array (
                                            'key' => 'Survivor Compound Available',
                                            'value' => 3194,
                                          ),
                                          240 => 
                                          array (
                                            'key' => 'Tapered Nozzle Available',
                                            'value' => 3175,
                                          ),
                                          241 => 
                                          array (
                                            'key' => 'Taste & Odorless Tube',
                                            'value' => 3176,
                                          ),
                                          242 => 
                                          array (
                                            'key' => 'Tolerates misalignment',
                                            'value' => 760058,
                                          ),
                                          243 => 
                                          array (
                                            'key' => 'Transmit power from both sides',
                                            'value' => 760059,
                                          ),
                                          244 => 
                                          array (
                                            'key' => 'True dimensional stability and higher horsepower capacity for long belt life',
                                            'value' => 760060,
                                          ),
                                          245 => 
                                          array (
                                            'key' => 'Twist Resistant',
                                            'value' => 3177,
                                          ),
                                          246 => 
                                          array (
                                            'key' => 'U.S. Coast Guard Certified',
                                            'value' => 3178,
                                          ),
                                          247 => 
                                          array (
                                            'key' => 'UL / CUL 330 Certified ',
                                            'value' => 759987,
                                          ),
                                          248 => 
                                          array (
                                            'key' => 'UL / CUL Certified',
                                            'value' => 3195,
                                          ),
                                          249 => 
                                          array (
                                            'key' => 'UL 330A Approved',
                                            'value' => 3179,
                                          ),
                                          250 => 
                                          array (
                                            'key' => 'UL 330B Approved',
                                            'value' => 3180,
                                          ),
                                          251 => 
                                          array (
                                            'key' => 'UL 94Hb Approved',
                                            'value' => 759984,
                                          ),
                                          252 => 
                                          array (
                                            'key' => 'UL Certified',
                                            'value' => 759985,
                                          ),
                                          253 => 
                                          array (
                                            'key' => 'Ultra-Low Permeation',
                                            'value' => 3181,
                                          ),
                                          254 => 
                                          array (
                                            'key' => 'Uniform cross section means less drive wear',
                                            'value' => 760061,
                                          ),
                                          255 => 
                                          array (
                                            'key' => 'Universal Fuel Compatibility',
                                            'value' => 3182,
                                          ),
                                          256 => 
                                          array (
                                            'key' => 'Universal tooth profile drops into existing sprockets',
                                            'value' => 760062,
                                          ),
                                          257 => 
                                          array (
                                            'key' => 'Universal tooth profile fits into existing RPP sprockets',
                                            'value' => 760063,
                                          ),
                                          258 => 
                                          array (
                                            'key' => 'Universal tooth profile, fits into existing HTD and RPP sprockets',
                                            'value' => 760064,
                                          ),
                                          259 => 
                                          array (
                                            'key' => 'USDA / FDA Certified',
                                            'value' => 759986,
                                          ),
                                          260 => 
                                          array (
                                            'key' => 'Vacuum Rated',
                                            'value' => 3183,
                                          ),
                                          261 => 
                                          array (
                                            'key' => 'Versatile Chemical Hose that Handles Petroleum Based Products',
                                            'value' => 3184,
                                          ),
                                          262 => 
                                          array (
                                            'key' => 'Visibility of Flow',
                                            'value' => 3185,
                                          ),
                                          263 => 
                                          array (
                                            'key' => 'Withstand high loading forces',
                                            'value' => 760065,
                                          ),
                                          264 => 
                                          array (
                                            'key' => 'X-Life Cover',
                                            'value' => 3186,
                                          ),
                                        ),
                                         'width' => '',
                                         'height' => '',
                                         'maxItems' => 5,
                                         'renderType' => 'tags',
                                         'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                         'optionsProviderData' => 'Features|Name',
                                         'queryColumnType' => 'text',
                                         'columnType' => 'text',
                                         'phpdocType' => 'array',
                                         'dynamicOptions' => false,
                                         'name' => 'FeaturesBenefitsBulletPoint',
                                         'title' => 'Features & Benefits Bullet Points',
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
                                      1 => 
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
                                         'name' => 'legalText',
                                         'title' => 'Legal Text',
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
                                         'name' => 'Application',
                                         'title' => 'Application (What does the hose convey?)',
                                         'tooltip' => 'Application - What does the hose convey?',
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
                                      3 => 
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
                                         'name' => 'BrandShortText1',
                                         'title' => 'Brand Short Text 1',
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
                                      4 => 
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
                                         'name' => 'BrandShortText2',
                                         'title' => 'Brand Short Text 2',
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
                                      5 => 
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
                                         'name' => 'BrandShortText3',
                                         'title' => 'Brand Short Text 3',
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
                                      6 => 
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
                                         'name' => 'BrandShortText4',
                                         'title' => 'Brand Short Text 4',
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
                                      7 => 
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
                                         'name' => 'BrandShortText5',
                                         'title' => 'Brand Short Text 5',
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
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                     'fieldtype' => 'fieldcontainer',
                                     'labelWidth' => 220,
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                         'fieldtype' => 'wysiwyg',
                                         'width' => 400,
                                         'height' => 150,
                                         'queryColumnType' => 'longtext',
                                         'columnType' => 'longtext',
                                         'phpdocType' => 'string',
                                         'toolbarConfig' => '',
                                         'excludeFromSearchIndex' => false,
                                         'name' => 'shortDescription',
                                         'title' => 'Marketing / Short Description',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-left:20px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                      1 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                         'fieldtype' => 'wysiwyg',
                                         'width' => 400,
                                         'height' => 200,
                                         'queryColumnType' => 'longtext',
                                         'columnType' => 'longtext',
                                         'phpdocType' => 'string',
                                         'toolbarConfig' => '',
                                         'excludeFromSearchIndex' => false,
                                         'name' => 'longDescription',
                                         'title' => 'Marketing / Long Description',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-left:20px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                    ),
                                     'locked' => false,
                                  )),
                                ),
                                 'locked' => false,
                              )),
                            ),
                             'name' => 'localizedfields',
                             'region' => NULL,
                             'layout' => NULL,
                             'title' => '',
                             'width' => '',
                             'height' => '',
                             'maxTabs' => NULL,
                             'labelWidth' => 100,
                             'border' => false,
                             'provideSplitView' => false,
                             'tabPosition' => NULL,
                             'hideLabelsWhenTabsReached' => -1,
                             'referencedFields' => 
                            array (
                            ),
                             'fieldDefinitionsCache' => NULL,
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
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => '9 Digit Attributes',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '9 Digit Attributes',
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
                             'name' => 'BrandingLayline',
                             'title' => 'Branding / Layline',
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
                          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                             'fieldtype' => 'textarea',
                             'width' => 300,
                             'height' => '',
                             'maxLength' => NULL,
                             'showCharCount' => false,
                             'excludeFromSearchIndex' => false,
                             'queryColumnType' => 'longtext',
                             'columnType' => 'longtext',
                             'phpdocType' => 'string',
                             'name' => 'VirtualCatalogBrandingLayline',
                             'title' => 'Virtual Catalog Branding / Layline',
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
                          2 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                             'fieldtype' => 'multiselect',
                             'options' => 
                            array (
                              0 => 
                              array (
                                'key' => '1 LAYER; BRAIDED; STEEL WIRE',
                                'value' => 2881,
                              ),
                              1 => 
                              array (
                                'key' => '1 LAYER; BRAIDED; SYNTHETIC YARN',
                                'value' => 2882,
                              ),
                              2 => 
                              array (
                                'key' => '1 LAYER; BRAIDED; TEXTILE',
                                'value' => 2883,
                              ),
                              3 => 
                              array (
                                'key' => '1 LAYER; BRAIED; SYNTHETIC YARN WITH STATIC WIRE',
                                'value' => 2884,
                              ),
                              4 => 
                              array (
                                'key' => '2 LAYERS; BRAIDED SYNTHETIC YARN',
                                'value' => 2885,
                              ),
                              5 => 
                              array (
                                'key' => '2 LAYERS; BRAIDED SYNTHETIC YARN WITH STATIC WIRE',
                                'value' => 2886,
                              ),
                              6 => 
                              array (
                                'key' => '2 LAYERS; BRAIDED; STEEL WIRE',
                                'value' => 2887,
                              ),
                              7 => 
                              array (
                                'key' => '2 LAYERS; BRAIDED; TEXTILE',
                                'value' => 2888,
                              ),
                              8 => 
                              array (
                                'key' => '4 LAYERS; SPIRAL; TEXTILE',
                                'value' => 2889,
                              ),
                              9 => 
                              array (
                                'key' => '6 FABRIC PLIES W/ BOOT STRAPS',
                                'value' => 2890,
                              ),
                              10 => 
                              array (
                                'key' => 'ARAMID',
                                'value' => 2891,
                              ),
                              11 => 
                              array (
                                'key' => 'BRAIDED FLEXSTEN® SYNTHETIC YARN',
                                'value' => 2892,
                              ),
                              12 => 
                              array (
                                'key' => 'BRAIDED SYNTHETIC FIBERS',
                                'value' => 2893,
                              ),
                              13 => 
                              array (
                                'key' => 'BRAIDED SYNTHETIC FIBERS; WIRE HELIX',
                                'value' => 2894,
                              ),
                              14 => 
                              array (
                                'key' => 'BRAIDED SYNTHETIC YARN',
                                'value' => 2895,
                              ),
                              15 => 
                              array (
                                'key' => 'BRASS CTD STEEL ARAMID BREAKER',
                                'value' => 2896,
                              ),
                              16 => 
                              array (
                                'key' => 'COTTON',
                                'value' => 2897,
                              ),
                              17 => 
                              array (
                                'key' => 'FABRIC PLIES, WIRE HELIX',
                                'value' => 2898,
                              ),
                              18 => 
                              array (
                                'key' => 'FABRIC WITH ANTISTATIC WIRE',
                                'value' => 2899,
                              ),
                              19 => 
                              array (
                                'key' => 'GLASS',
                                'value' => 2900,
                              ),
                              20 => 
                              array (
                                'key' => 'KEVLAR',
                                'value' => 2901,
                              ),
                              21 => 
                              array (
                                'key' => 'NYLON®',
                                'value' => 2902,
                              ),
                              22 => 
                              array (
                                'key' => 'PLIOVIC HELIX',
                                'value' => 2903,
                              ),
                              23 => 
                              array (
                                'key' => 'PLIOVIC HELIX, STATIC WIRE',
                                'value' => 2904,
                              ),
                              24 => 
                              array (
                                'key' => 'POLYESTER',
                                'value' => 2905,
                              ),
                              25 => 
                              array (
                                'key' => 'POLYESTER BRAID',
                                'value' => 2906,
                              ),
                              26 => 
                              array (
                                'key' => 'POLYESTER SPIRAL NYLON BARRIER',
                                'value' => 2907,
                              ),
                              27 => 
                              array (
                                'key' => 'POLYESTER SYNTHETIC YARN',
                                'value' => 2908,
                              ),
                              28 => 
                              array (
                                'key' => 'POLYETHYLENE HELIX',
                                'value' => 2909,
                              ),
                              29 => 
                              array (
                                'key' => 'PVA',
                                'value' => 2910,
                              ),
                              30 => 
                              array (
                                'key' => 'RAYON',
                                'value' => 2911,
                              ),
                              31 => 
                              array (
                                'key' => 'SPIRAL ARAMID YARN',
                                'value' => 2912,
                              ),
                              32 => 
                              array (
                                'key' => 'SPIRAL FLEXTEN® SYNTHETIC YARN',
                                'value' => 2913,
                              ),
                              33 => 
                              array (
                                'key' => 'SPIRAL SYNTHETIC YARN',
                                'value' => 2914,
                              ),
                              34 => 
                              array (
                                'key' => 'SPIRAL TEXTILE REINFORCEMENT',
                                'value' => 2915,
                              ),
                              35 => 
                              array (
                                'key' => 'SPIRAL-PLIED ARAMID FIBERS; WIRE HELIX',
                                'value' => 2916,
                              ),
                              36 => 
                              array (
                                'key' => 'SPIRAL-PLIED FABRIC; WIRE HELIX',
                                'value' => 2917,
                              ),
                              37 => 
                              array (
                                'key' => 'SPIRAL-PLIED STEEL WIRE',
                                'value' => 2918,
                              ),
                              38 => 
                              array (
                                'key' => 'SPIRAL-PLIED SYNTHETIC FABRIC',
                                'value' => 2919,
                              ),
                              39 => 
                              array (
                                'key' => 'SPIRAL-PLIED SYNTHETIC FABRIC WITH ANTISTATIC WIRE',
                                'value' => 2920,
                              ),
                              40 => 
                              array (
                                'key' => 'SPIRAL-PLIED SYNTHETIC FABRIC WITH DOUBLE WIRE HELIX',
                                'value' => 2921,
                              ),
                              41 => 
                              array (
                                'key' => 'SPIRAL-PLIED SYNTHETIC FABRIC WITH WIRE HELIX',
                                'value' => 2922,
                              ),
                              42 => 
                              array (
                                'key' => 'SPIRAL-PLIED SYNTHETIC FABRIC WITH WIRE HELIX & ANTISTATIC WIRE',
                                'value' => 2923,
                              ),
                              43 => 
                              array (
                                'key' => 'SPIRAL-PLIED SYNTHETIC FABRIC; DOUBLE WIRE HELIX',
                                'value' => 2924,
                              ),
                              44 => 
                              array (
                                'key' => 'SPIRAL-PLIED SYNTHETIC FABRIC; GALVANIZED HELIX',
                                'value' => 2925,
                              ),
                              45 => 
                              array (
                                'key' => 'SPIRAL-PLIED SYNTHETIC FABRIC; WIRE HELIX',
                                'value' => 2926,
                              ),
                              46 => 
                              array (
                                'key' => 'SPIRAL-PLIED SYNTHETIC YARN',
                                'value' => 2927,
                              ),
                              47 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC',
                                'value' => 2928,
                              ),
                              48 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC NYLON BREAKER',
                                'value' => 2929,
                              ),
                              49 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC PLIES',
                                'value' => 2930,
                              ),
                              50 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC, 2 WIRE HELIX',
                                'value' => 2931,
                              ),
                              51 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC, BREAKER',
                                'value' => 2932,
                              ),
                              52 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC, GROUNDING WIRES',
                                'value' => 2933,
                              ),
                              53 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC, STATIC WIRE',
                                'value' => 2934,
                              ),
                              54 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC, WIRE HELIX',
                                'value' => 2935,
                              ),
                              55 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC; 2 GALVANIZED HELIX WIRES',
                                'value' => 2936,
                              ),
                              56 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC; 2 WIRE HELIX',
                                'value' => 2937,
                              ),
                              57 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC; GALVANIZED HELIX',
                                'value' => 2938,
                              ),
                              58 => 
                              array (
                                'key' => 'SYNTHETIC FIBERS',
                                'value' => 2939,
                              ),
                              59 => 
                              array (
                                'key' => 'SYNTHETIC FIBERS, PLASTIC HELIX',
                                'value' => 2940,
                              ),
                              60 => 
                              array (
                                'key' => 'SYNTHETIC FIBERS, STEEL HELIX',
                                'value' => 2941,
                              ),
                              61 => 
                              array (
                                'key' => 'SYNTHETIC PLIES, 2 WIRE HELIX',
                                'value' => 2942,
                              ),
                              62 => 
                              array (
                                'key' => 'SYNTHETIC TEXTILE FABRIC',
                                'value' => 2943,
                              ),
                              63 => 
                              array (
                                'key' => 'SYNTHETIC YARN',
                                'value' => 2944,
                              ),
                              64 => 
                              array (
                                'key' => 'SYNTHETIC YARN, STATIC WIRE',
                                'value' => 2945,
                              ),
                              65 => 
                              array (
                                'key' => 'TEXTILE BRAID',
                                'value' => 2946,
                              ),
                              66 => 
                              array (
                                'key' => 'TEXTILE BRAID, STEEL HELIX',
                                'value' => 2947,
                              ),
                              67 => 
                              array (
                                'key' => 'THROUGH-THE-WEAVE FABRIC',
                                'value' => 2948,
                              ),
                              68 => 
                              array (
                                'key' => 'VINYL HELIX',
                                'value' => 2949,
                              ),
                              69 => 
                              array (
                                'key' => 'WIRE HELIX',
                                'value' => 2950,
                              ),
                              70 => 
                              array (
                                'key' => 'FIBERGLASS',
                                'value' => 1829532,
                              ),
                              71 => 
                              array (
                                'key' => 'NYLON',
                                'value' => 1829533,
                              ),
                              72 => 
                              array (
                                'key' => 'CARBON',
                                'value' => 1829534,
                              ),
                              73 => 
                              array (
                                'key' => 'WIRE BRAID',
                                'value' => 1829535,
                              ),
                              74 => 
                              array (
                                'key' => '2 LAYER; BRAIDED; STEEL WIRE',
                                'value' => 1829536,
                              ),
                              75 => 
                              array (
                                'key' => 'POLYESTER YARN',
                                'value' => 1829537,
                              ),
                              76 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC; WIRE HELIX',
                                'value' => 1829538,
                              ),
                              77 => 
                              array (
                                'key' => '304 STAINLESS STEEL WIRE BRAID',
                                'value' => 1829539,
                              ),
                              78 => 
                              array (
                                'key' => '4 LAYERS; SPIRAL; STEEL WIRE',
                                'value' => 1829540,
                              ),
                              79 => 
                              array (
                                'key' => '1 OR 2 STEEL WIRE BRAIDS',
                                'value' => 1829541,
                              ),
                              80 => 
                              array (
                                'key' => 'SYNTHETIC FABRIC; 2 GALVANIZED HELIX',
                                'value' => 1829542,
                              ),
                              81 => 
                              array (
                                'key' => '1 LAYER; BRAIDED; FABRIC',
                                'value' => 1829543,
                              ),
                              82 => 
                              array (
                                'key' => 'BRAIDED TEXTILE, BRAIDED STEEL',
                                'value' => 1829544,
                              ),
                              83 => 
                              array (
                                'key' => '6 LAYERS; SPIRAL; STEEL WIRE',
                                'value' => 1829545,
                              ),
                              84 => 
                              array (
                                'key' => '2 LAYERS; SPIRAL; POLYESTER',
                                'value' => 1829546,
                              ),
                              85 => 
                              array (
                                'key' => '1 LAYER; BRAIDED; POLYESTER',
                                'value' => 1829547,
                              ),
                              86 => 
                              array (
                                'key' => 'SPIRAL STEEL WIRE',
                                'value' => 1829548,
                              ),
                              87 => 
                              array (
                                'key' => 'SYNTHETIC FIBERS, WIRE HELIX',
                                'value' => 1829549,
                              ),
                              88 => 
                              array (
                                'key' => 'SYNTHETIC FIBERS, HELIX WIRE',
                                'value' => 1829550,
                              ),
                              89 => 
                              array (
                                'key' => 'ARAMID FIBERS',
                                'value' => 1829551,
                              ),
                            ),
                             'width' => 300,
                             'height' => '',
                             'maxItems' => '',
                             'renderType' => 'tags',
                             'optionsProviderClass' => 'AppBundle\\OptionProvider\\OptionProviderForBrickMultiselects',
                             'optionsProviderData' => 'ProductClass',
                             'queryColumnType' => 'text',
                             'columnType' => 'text',
                             'phpdocType' => 'array',
                             'dynamicOptions' => false,
                             'name' => 'reinforcement',
                             'title' => 'Reinforcement',
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
                          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                             'fieldtype' => 'textarea',
                             'width' => 300,
                             'height' => 100,
                             'maxLength' => NULL,
                             'showCharCount' => false,
                             'excludeFromSearchIndex' => false,
                             'queryColumnType' => 'longtext',
                             'columnType' => 'longtext',
                             'phpdocType' => 'string',
                             'name' => 'VirtualCatalogReinforcement',
                             'title' => 'Virtual Catalog Reinforcement',
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
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Packaging',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Packaging',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => true,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
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
                                 'labelWidth' => 200,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'packageLengthIN',
                                     'title' => 'Package Length (in)',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'packageWidthIN',
                                     'title' => 'Package Width (in)',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'packageWeightLBS',
                                     'title' => 'Package Weight (lbs)',
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
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'packageHeightIN',
                                     'title' => 'Package Height (in)',
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
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'caseLengthIN',
                                     'title' => 'Case Length (in)',
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
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'caseHeightIN',
                                     'title' => 'Case Height (in)',
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
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'caseWidthIN',
                                     'title' => 'Case Width (in)',
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
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'caseWeightLBS',
                                     'title' => 'Case Weight (lbs)',
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
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'palletLengthIN',
                                     'title' => 'Pallet Length (in)',
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
                                  9 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'palletHeightIN',
                                     'title' => 'Pallet Height (in)',
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
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 200,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'numberOfItems',
                                     'title' => 'Number of Items',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'casePackQuantity',
                                     'title' => 'Case Pack Quantity',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'orderIncrement',
                                     'title' => 'Order Increment',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'minimumOrderQuantity',
                                     'title' => 'Minimum Order Quantity',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'numberOfCoils',
                                     'title' => 'Number of Coils',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'tieBundles',
                                     'title' => 'Tie Bundles ',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'bundlesOfQuantity',
                                     'title' => 'Bundles of Quantity',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'palletWeightLBS',
                                     'title' => 'Pallet Weight (lbs)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => true,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => NULL,
                                     'name' => 'palletWidthIN',
                                     'title' => 'Pallet Width (in)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
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
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Temperatures',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Temperatures',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => true,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
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
                                 'labelWidth' => 230,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => 0,
                                     'name' => 'minimumTemperatureF',
                                     'title' => 'Min Temp °F',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => 0,
                                     'name' => 'maximumTemperatureF',
                                     'title' => 'Max temp °F',
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
                                     'name' => 'rangeTemperatureF',
                                     'title' => 'Temperature Range (°F)',
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
                                  3 => 
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
                                     'name' => 'temperatureRangeFAndC',
                                     'title' => 'Temperature Range (°F & C°)',
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
                                  4 => 
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
                                     'name' => 'rangeTemperatureC',
                                     'title' => 'Temperature Range (°C)',
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
                                  5 => 
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
                                     'name' => 'temperatureRangeApplication',
                                     'title' => 'Temperature Range Application',
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
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 230,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => 0,
                                     'name' => 'minimumTemperatureC',
                                     'title' => 'Min Temp °C',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 300,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'double',
                                     'columnType' => 'double',
                                     'phpdocType' => 'float',
                                     'integer' => false,
                                     'unsigned' => false,
                                     'minValue' => NULL,
                                     'maxValue' => NULL,
                                     'unique' => false,
                                     'decimalSize' => NULL,
                                     'decimalPrecision' => 0,
                                     'name' => 'maximumTemperatureC',
                                     'title' => 'Max temp °C',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'fieldtype' => 'textarea',
                                     'width' => 300,
                                     'height' => 100,
                                     'maxLength' => NULL,
                                     'showCharCount' => false,
                                     'excludeFromSearchIndex' => false,
                                     'queryColumnType' => 'longtext',
                                     'columnType' => 'longtext',
                                     'phpdocType' => 'string',
                                     'name' => 'VirtualCatalogHoseTemperatureRangeFAndC',
                                     'title' => 'Virtual Catalog Temperature Range (°F & C°)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left: 20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => false,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
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
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Configurations',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Configurations',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => true,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
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
                                 'labelWidth' => 230,
                                 'layout' => 'vbox',
                                 'fieldLabel' => '',
                                 'name' => 'Field Container',
                                 'type' => NULL,
                                 'region' => NULL,
                                 'title' => '',
                                 'width' => 400,
                                 'height' => NULL,
                                 'collapsible' => false,
                                 'collapsed' => false,
                                 'bodyStyle' => '',
                                 'datatype' => 'layout',
                                 'permissions' => NULL,
                                 'childs' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
                                     'emptyLabel' => 'Empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Empty',
                                        'value' => 0,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'succesorFlag',
                                     'title' => 'Succesor / Supercession Flag',
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
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
                                     'emptyLabel' => 'Empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Empty',
                                        'value' => 0,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'B2CStoreFlag',
                                     'title' => 'B2C Store Flag',
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
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
                                     'emptyLabel' => 'Empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Empty',
                                        'value' => 0,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'printedCatalogFlag',
                                     'title' => 'Printed Catalog Flag',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
                                     'emptyLabel' => 'Empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Empty',
                                        'value' => 0,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'virtualCatalogFlag',
                                     'title' => 'Virtual Catalog Flag',
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
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 230,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
                                     'emptyLabel' => 'Empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Empty',
                                        'value' => 0,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'returnFlag',
                                     'title' => 'Return Flag',
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
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
                                     'emptyLabel' => 'Empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Empty',
                                        'value' => 0,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'rebateFlag',
                                     'title' => 'Rebate Flag',
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
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
                                     'emptyLabel' => 'Empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Empty',
                                        'value' => 0,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 100,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'newItemFlagForCatalog',
                                     'title' => 'New Item Flag for Catalog',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Base',
                                        'value' => 'base',
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Skeleton',
                                        'value' => 'skeleton',
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'Fert',
                                        'value' => 'fert',
                                      ),
                                    ),
                                     'width' => 300,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'ProductType',
                                     'title' => 'ProductType',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'IFS',
                                        'value' => 'IFS',
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'PTG',
                                        'value' => 'PTG',
                                      ),
                                    ),
                                     'width' => '',
                                     'defaultValue' => 'IFS',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'BusinessUnit',
                                     'title' => 'Business Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/overlay-edit.svg',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'SIOP Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'SIOP Data',
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => 'Imported From SAP',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
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
                         'name' => 'siopFullCode',
                         'title' => 'SIOP Full Code',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => true,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel1',
                         'title' => 'SIOP Level 1',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel2',
                         'title' => 'SIOP Level 2',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel3',
                         'title' => 'SIOP Level 3',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel4',
                         'title' => 'SIOP Level 4',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      6 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel5',
                         'title' => 'SIOP Level 5',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      7 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'ProductCategory',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SIOPLevel6',
                         'title' => 'SIOP Level 6',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                    ),
                     'locked' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/genealogy.svg',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'PlantAndSalesData',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Plant & Sales Data',
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
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => 'Imported From SAP',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ReverseManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'reverseManyToManyObjectRelation',
                         'ownerClassName' => 'SalesMaterialMaster',
                         'ownerClassId' => NULL,
                         'ownerFieldName' => 'Material',
                         'lazyLoading' => true,
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => NULL,
                         'allowToCreateNewObject' => true,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'SalesOrgData',
                         'title' => 'Sales Data',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ReverseManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'reverseManyToManyObjectRelation',
                         'ownerClassName' => 'PlantMaterialMaster',
                         'ownerClassId' => NULL,
                         'ownerFieldName' => 'Material',
                         'lazyLoading' => true,
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => NULL,
                         'allowToCreateNewObject' => true,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'Plants',
                         'title' => 'Plants Data',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                    ),
                     'locked' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/candle_sticks.svg',
                  )),
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
             'icon' => '',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Base',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Brand Data',
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
                  0 => 'HoseBase',
                  1 => 'PTGBase',
                ),
                 'maxItems' => '',
                 'border' => false,
                 'name' => 'Base',
                 'title' => '',
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
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_yellow.png',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Skeleton',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Skeleton Data',
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
                  0 => 'HoseSkeleton',
                  1 => 'PTGSkeleton',
                ),
                 'maxItems' => '',
                 'border' => false,
                 'name' => 'Skeleton',
                 'title' => '',
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
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_blue.png',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Fert',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Fert Data',
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
                  0 => 'AccessoriesFert',
                  1 => 'BeltsFert',
                  2 => 'HoseFert',
                  3 => 'HydFittingsFert',
                  4 => 'INHFittingsFert',
                  5 => 'MetalFert',
                  6 => 'PTGFert',
                  7 => 'SynchronousFert',
                ),
                 'maxItems' => '',
                 'border' => false,
                 'name' => 'Fert',
                 'title' => '',
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
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_green.png',
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Digital Assets',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Digital Assets',
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
                 'fieldtype' => 'tabpanel',
                 'border' => false,
                 'tabPosition' => NULL,
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Product Images',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 300,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'mainImage',
                         'title' => 'MainImage',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 300,
                         'height' => '',
                         'uploadPath' => '/Continental Aftermarket/Products/IAM ATE/Disc/Brake Disc',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'frontView',
                         'title' => 'Front view',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 300,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'sideView',
                         'title' => 'Side view',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 300,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'cutView',
                         'title' => 'Cut view',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; clear:right;',
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Documents',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
                         'fieldtype' => 'manyToManyRelation',
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'assetUploadPath' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'objectsAllowed' => false,
                         'assetsAllowed' => true,
                         'assetTypes' => 
                        array (
                          0 => 
                          array (
                            'assetTypes' => 'image',
                          ),
                          1 => 
                          array (
                            'assetTypes' => 'document',
                          ),
                          2 => 
                          array (
                            'assetTypes' => 'video',
                          ),
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'classes' => 
                        array (
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'Document',
                         'title' => 'Document',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
                         'fieldtype' => 'manyToManyRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => 3,
                         'assetUploadPath' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'objectsAllowed' => false,
                         'assetsAllowed' => true,
                         'assetTypes' => 
                        array (
                          0 => 
                          array (
                            'assetTypes' => 'image',
                          ),
                          1 => 
                          array (
                            'assetTypes' => 'document',
                          ),
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'classes' => 
                        array (
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'BrandingLaylineAssets',
                         'title' => 'Branding/Layline Assets',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                    ),
                     'locked' => false,
                     'icon' => '',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Catalog Assets',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Catalog Assets',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 300,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'LeftPrintCatalogImage',
                         'title' => 'Left Image',
                         'tooltip' => 'Left Print Catalog Image',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left; margin-right:20px; clear:left;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 300,
                         'height' => '',
                         'uploadPath' => '/Continental Aftermarket/Products/IAM ATE/Disc/Brake Disc',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'RightPrintCatalogImage',
                         'title' => 'Right Image',
                         'tooltip' => 'Right Print Catalog Image',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'float:left;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => '',
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'DrawingPictureForCatalog',
                         'title' => 'Drawing Picture',
                         'tooltip' => 'Drawing Picture For Catalog',
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
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                         'fieldtype' => 'image',
                         'width' => 400,
                         'height' => '',
                         'uploadPath' => '',
                         'queryColumnType' => 'int(11)',
                         'columnType' => 'int(11)',
                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                         'name' => 'ProfileDimensionImage',
                         'title' => 'Profile Dimension Image',
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
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/image-region.svg',
          )),
          5 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Pricing Data',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Pricing Data',
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
                 'cols' => 7,
                 'colsFixed' => true,
                 'rows' => '',
                 'rowsFixed' => false,
                 'data' => '',
                 'columnConfigActivated' => true,
                 'columnConfig' => 
                array (
                  0 => 
                  array (
                    'key' => '0',
                    'label' => 'Unique ID',
                  ),
                  1 => 
                  array (
                    'key' => '1',
                    'label' => 'Sales Organization',
                  ),
                  2 => 
                  array (
                    'key' => '2',
                    'label' => 'Distribution Channel',
                  ),
                  3 => 
                  array (
                    'key' => '3',
                    'label' => 'Validity End Date',
                  ),
                  4 => 
                  array (
                    'key' => '4',
                    'label' => 'Validity Start Date',
                  ),
                  5 => 
                  array (
                    'key' => '5',
                    'label' => 'Rate',
                  ),
                  6 => 
                  array (
                    'key' => '6',
                    'label' => 'Rate Unit',
                  ),
                ),
                 'queryColumnType' => 'longtext',
                 'columnType' => 'longtext',
                 'phpdocType' => 'array',
                 'name' => 'priceData',
                 'title' => 'Price Data',
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
          6 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Catalog Attributes',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Catalog Attributes',
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
                 'width' => 350,
                 'defaultValue' => NULL,
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'regex' => '',
                 'unique' => false,
                 'showCharCount' => false,
                 'name' => 'CatalogGrouping',
                 'title' => 'Catalog Grouping',
                 'tooltip' => 'Attribute for catalog table grouping',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'fieldtype' => 'input',
                 'width' => 350,
                 'defaultValue' => NULL,
                 'queryColumnType' => 'varchar',
                 'columnType' => 'varchar',
                 'columnLength' => 190,
                 'phpdocType' => 'string',
                 'regex' => '',
                 'unique' => false,
                 'showCharCount' => false,
                 'name' => 'FittingTableName',
                 'title' => 'Fitting Table Name',
                 'tooltip' => 'Attribute for grouping products of catalog based on different data attribute tables.',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'fieldtype' => 'numeric',
                 'width' => '',
                 'defaultValue' => NULL,
                 'queryColumnType' => 'double',
                 'columnType' => 'double',
                 'phpdocType' => 'float',
                 'integer' => true,
                 'unsigned' => true,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'name' => 'CatalogSortTable',
                 'title' => 'Catalog Sort Table',
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
             'icon' => '',
          )),
          7 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Completeness',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Completeness',
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
                     'width' => 600,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'CompletenessPercentage',
                     'title' => 'Completeness Percentage',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: #d9edf7; border-color: #bce8f1 !important; color: #31708f;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'fieldtype' => 'textarea',
                     'width' => 600,
                     'height' => 500,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'name' => 'EmptyFields',
                     'title' => 'Empty Fields',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                ),
                 'name' => 'localizedfields',
                 'region' => NULL,
                 'layout' => NULL,
                 'title' => '',
                 'width' => '',
                 'height' => '',
                 'maxTabs' => NULL,
                 'labelWidth' => 200,
                 'border' => false,
                 'provideSplitView' => false,
                 'tabPosition' => NULL,
                 'hideLabelsWhenTabsReached' => -1,
                 'referencedFields' => 
                array (
                ),
                 'fieldDefinitionsCache' => NULL,
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
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
   'default' => 0,
   'dao' => NULL,
));
