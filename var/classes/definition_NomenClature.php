<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - FittingFamily [advancedManyToManyObjectRelation]
 * - Thread [advancedManyToManyObjectRelation]
 * - nomenClatureType [select]
 * - partialPartNumber [input]
 * - swivel [select]
 * - comments [textarea]
 * - attributeCode [input]
 * - AdapterAttributeType [input]
 * - assemblyMaterialCode [input]
 * - assemblyMaterialDescription [select]
 * - valve [select]
 * - styleDescription [input]
 * - markettingShortDescription [textarea]
 * - gender1 [select]
 * - gender2 [select]
 * - elbowYN [booleanSelect]
 * - numberOfElbows [input]
 * - elbowType [select]
 * - elbowAngle1 [select]
 * - elbowAngle2 [select]
 * - attributeDescription [select]
 * - styleCode [input]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => '20',
   'name' => 'NomenClature',
   'title' => '',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1706469165,
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
   'allowVariants' => false,
   'showVariants' => false,
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'name' => 'pimcore_root',
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => 0,
     'height' => 0,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'children' => 
    array (
      0 => 
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'name' => 'Base Data',
         'type' => NULL,
         'region' => NULL,
         'title' => 'Base Data',
         'width' => 0,
         'height' => 0,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'children' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => '',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyObjectRelation::__set_state(array(
                 'name' => 'FittingFamily',
                 'title' => 'Fitting Family',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                ),
                 'displayMode' => NULL,
                 'pathFormatterClass' => '',
                 'maxItems' => NULL,
                 'visibleFields' => 'Name,Description,CatalogDescription',
                 'allowToCreateNewObject' => true,
                 'allowToClearRelation' => true,
                 'optimizedAdminLoading' => false,
                 'enableTextSelection' => false,
                 'visibleFieldDefinitions' => 
                array (
                ),
                 'width' => '',
                 'height' => '',
                 'allowedClassId' => 'FittingFamily',
                 'columns' => 
                array (
                ),
                 'columnKeys' => 
                array (
                ),
                 'enableBatchEdit' => false,
                 'allowMultipleAssignments' => false,
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyObjectRelation::__set_state(array(
                 'name' => 'Thread',
                 'title' => 'Thread',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                ),
                 'displayMode' => NULL,
                 'pathFormatterClass' => '',
                 'maxItems' => NULL,
                 'visibleFields' => 'Name,Description,CatalogDescription',
                 'allowToCreateNewObject' => true,
                 'allowToClearRelation' => true,
                 'optimizedAdminLoading' => false,
                 'enableTextSelection' => false,
                 'visibleFieldDefinitions' => 
                array (
                ),
                 'width' => '',
                 'height' => '',
                 'allowedClassId' => 'Thread',
                 'columns' => 
                array (
                ),
                 'columnKeys' => 
                array (
                ),
                 'enableBatchEdit' => false,
                 'allowMultipleAssignments' => false,
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                 'name' => 'Field Container',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => '',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                     'name' => 'Field Container',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'nomenClatureType',
                         'title' => 'Type',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'AC-GC',
                            'value' => 'AC-GC',
                          ),
                          1 => 
                          array (
                            'key' => 'Hydraulic',
                            'value' => 'Hydraulic',
                          ),
                          2 => 
                          array (
                            'key' => 'Hydraulic Adapter',
                            'value' => 'Hydraulic Adapter',
                          ),
                        ),
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'partialPartNumber',
                         'title' => 'Partial Part Number',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => NULL,
                         'columnLength' => 190,
                         'regex' => '',
                         'regexFlags' => 
                        array (
                        ),
                         'unique' => false,
                         'showCharCount' => false,
                         'width' => NULL,
                         'defaultValueGenerator' => '',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'swivel',
                         'title' => 'Swivel',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Swivel',
                            'value' => 'Swivel',
                          ),
                        ),
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                         'name' => 'comments',
                         'title' => 'Comments',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'maxLength' => NULL,
                         'showCharCount' => false,
                         'excludeFromSearchIndex' => false,
                         'height' => 150,
                         'width' => 250,
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'attributeCode',
                         'title' => 'Attribute (Code)',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => NULL,
                         'columnLength' => 190,
                         'regex' => '',
                         'regexFlags' => 
                        array (
                        ),
                         'unique' => false,
                         'showCharCount' => false,
                         'width' => NULL,
                         'defaultValueGenerator' => '',
                      )),
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'AdapterAttributeType',
                         'title' => 'Adapter Attribute Type',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => NULL,
                         'columnLength' => 150,
                         'regex' => '',
                         'regexFlags' => 
                        array (
                        ),
                         'unique' => false,
                         'showCharCount' => false,
                         'width' => NULL,
                         'defaultValueGenerator' => '',
                      )),
                      6 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'assemblyMaterialCode',
                         'title' => 'Assembly Material Code',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => NULL,
                         'columnLength' => 190,
                         'regex' => '',
                         'regexFlags' => 
                        array (
                        ),
                         'unique' => false,
                         'showCharCount' => false,
                         'width' => NULL,
                         'defaultValueGenerator' => '',
                      )),
                      7 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'assemblyMaterialDescription',
                         'title' => 'Assembly Material Description',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'STAINLESS',
                            'value' => 'STAINLESS',
                          ),
                          1 => 
                          array (
                            'key' => 'ARMOR PLATE',
                            'value' => 'ARMOR PLATE',
                          ),
                          2 => 
                          array (
                            'key' => 'STEEL',
                            'value' => 'STEEL',
                          ),
                          3 => 
                          array (
                            'key' => 'BRASS',
                            'value' => 'BRASS',
                          ),
                        ),
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      8 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'valve',
                         'title' => 'Valve',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'R12',
                            'value' => 'R12',
                          ),
                          1 => 
                          array (
                            'key' => 'R134',
                            'value' => 'R134',
                          ),
                          2 => 
                          array (
                            'key' => 'R134A',
                            'value' => 'R134A',
                          ),
                        ),
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      9 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'styleDescription',
                         'title' => 'Style Description',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => NULL,
                         'columnLength' => 190,
                         'regex' => '',
                         'regexFlags' => 
                        array (
                        ),
                         'unique' => false,
                         'showCharCount' => false,
                         'width' => NULL,
                         'defaultValueGenerator' => '',
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'fieldcontainer',
                     'layout' => 'vbox',
                     'fieldLabel' => '',
                     'labelWidth' => 200,
                     'labelAlign' => 'left',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                     'name' => 'Field Container',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => '',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => 'margin-left: 20px;',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                         'name' => 'markettingShortDescription',
                         'title' => 'Marketting Short Description',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left: 20px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'maxLength' => NULL,
                         'showCharCount' => false,
                         'excludeFromSearchIndex' => false,
                         'height' => 150,
                         'width' => 250,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'gender1',
                         'title' => 'Gender1',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left: 20px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Male',
                            'value' => 'M',
                          ),
                          1 => 
                          array (
                            'key' => 'Female',
                            'value' => 'F',
                          ),
                        ),
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'gender2',
                         'title' => 'Gender2',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left: 20px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Male',
                            'value' => 'M',
                          ),
                          1 => 
                          array (
                            'key' => 'Female',
                            'value' => 'F',
                          ),
                        ),
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                         'name' => 'elbowYN',
                         'title' => 'Elbow Y/N',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left: 20px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
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
                         'width' => '',
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'numberOfElbows',
                         'title' => 'Number of Elbows',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left: 20px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => NULL,
                         'columnLength' => 190,
                         'regex' => '',
                         'regexFlags' => 
                        array (
                        ),
                         'unique' => false,
                         'showCharCount' => false,
                         'width' => NULL,
                         'defaultValueGenerator' => '',
                      )),
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'elbowType',
                         'title' => 'Elbow Type',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left: 20px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'BLOCK',
                            'value' => 'BLOCK',
                          ),
                          1 => 
                          array (
                            'key' => 'DOUBLE BEND',
                            'value' => 'DOUBLE BEND',
                          ),
                          2 => 
                          array (
                            'key' => 'LONG',
                            'value' => 'LONG',
                          ),
                          3 => 
                          array (
                            'key' => 'SHORT',
                            'value' => 'SHORT',
                          ),
                          4 => 
                          array (
                            'key' => 'EXTRA LONG',
                            'value' => 'EXTRA LONG',
                          ),
                        ),
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      6 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'elbowAngle1',
                         'title' => 'Elbow Angle 1',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left: 20px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => '22.5',
                            'value' => '22.5',
                          ),
                          1 => 
                          array (
                            'key' => '30',
                            'value' => '30',
                          ),
                          2 => 
                          array (
                            'key' => '45',
                            'value' => '45',
                          ),
                          3 => 
                          array (
                            'key' => '50',
                            'value' => '50',
                          ),
                          4 => 
                          array (
                            'key' => '60',
                            'value' => '60',
                          ),
                          5 => 
                          array (
                            'key' => '65',
                            'value' => '65',
                          ),
                          6 => 
                          array (
                            'key' => '67',
                            'value' => '67',
                          ),
                          7 => 
                          array (
                            'key' => '90',
                            'value' => '90',
                          ),
                          8 => 
                          array (
                            'key' => '110',
                            'value' => '110',
                          ),
                          9 => 
                          array (
                            'key' => '135',
                            'value' => '135',
                          ),
                          10 => 
                          array (
                            'key' => '137',
                            'value' => '137',
                          ),
                          11 => 
                          array (
                            'key' => '175',
                            'value' => '175',
                          ),
                        ),
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      7 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'elbowAngle2',
                         'title' => 'Elbow Angle 2',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left: 20px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => '22.5',
                            'value' => '22.5',
                          ),
                          1 => 
                          array (
                            'key' => '30',
                            'value' => '30',
                          ),
                          2 => 
                          array (
                            'key' => '45',
                            'value' => '45',
                          ),
                          3 => 
                          array (
                            'key' => '50',
                            'value' => '50',
                          ),
                          4 => 
                          array (
                            'key' => '60',
                            'value' => '60',
                          ),
                          5 => 
                          array (
                            'key' => '65',
                            'value' => '65',
                          ),
                          6 => 
                          array (
                            'key' => '67',
                            'value' => '67',
                          ),
                          7 => 
                          array (
                            'key' => '90',
                            'value' => '90',
                          ),
                          8 => 
                          array (
                            'key' => '110',
                            'value' => '110',
                          ),
                          9 => 
                          array (
                            'key' => '135',
                            'value' => '135',
                          ),
                          10 => 
                          array (
                            'key' => '137',
                            'value' => '137',
                          ),
                          11 => 
                          array (
                            'key' => '175',
                            'value' => '175',
                          ),
                        ),
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      8 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'attributeDescription',
                         'title' => 'Attribute Description',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left: 20px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Accumulator',
                            'value' => 'Accumulator',
                          ),
                          1 => 
                          array (
                            'key' => 'Black',
                            'value' => 'Black',
                          ),
                          2 => 
                          array (
                            'key' => 'Blue',
                            'value' => 'Blue',
                          ),
                          3 => 
                          array (
                            'key' => 'Braze On',
                            'value' => 'Braze On',
                          ),
                          4 => 
                          array (
                            'key' => 'Bulkhead',
                            'value' => 'Bulkhead',
                          ),
                          5 => 
                          array (
                            'key' => 'Compressor Narrow',
                            'value' => 'Compressor Narrow',
                          ),
                          6 => 
                          array (
                            'key' => 'Compressor Wide',
                            'value' => 'Compressor Wide',
                          ),
                          7 => 
                          array (
                            'key' => 'High Pressure Side',
                            'value' => 'High Pressure Side',
                          ),
                          8 => 
                          array (
                            'key' => 'Long Pilot',
                            'value' => 'Long Pilot',
                          ),
                          9 => 
                          array (
                            'key' => 'Low Pressure Side',
                            'value' => 'Low Pressure Side',
                          ),
                          10 => 
                          array (
                            'key' => 'Metric',
                            'value' => 'Metric',
                          ),
                          11 => 
                          array (
                            'key' => 'Nut',
                            'value' => 'Nut',
                          ),
                          12 => 
                          array (
                            'key' => 'Orange',
                            'value' => 'Orange',
                          ),
                          13 => 
                          array (
                            'key' => 'Red',
                            'value' => 'Red',
                          ),
                          14 => 
                          array (
                            'key' => 'Sight Glass',
                            'value' => 'Sight Glass',
                          ),
                          15 => 
                          array (
                            'key' => 'Single',
                            'value' => 'Single',
                          ),
                          16 => 
                          array (
                            'key' => 'Single Reversed',
                            'value' => 'Single Reversed',
                          ),
                          17 => 
                          array (
                            'key' => 'Sleeve',
                            'value' => 'Sleeve',
                          ),
                          18 => 
                          array (
                            'key' => 'Sleeve, Metric',
                            'value' => 'Sleeve- Metric',
                          ),
                          19 => 
                          array (
                            'key' => 'Tee',
                            'value' => 'Tee',
                          ),
                          20 => 
                          array (
                            'key' => 'White',
                            'value' => 'White',
                          ),
                          21 => 
                          array (
                            'key' => 'Bonded Seal',
                            'value' => 'Bonded Seal',
                          ),
                          22 => 
                          array (
                            'key' => 'Breather Vent Plug',
                            'value' => 'Breather Vent Plug',
                          ),
                          23 => 
                          array (
                            'key' => 'Bulkhead',
                            'value' => 'Bulkhead',
                          ),
                          24 => 
                          array (
                            'key' => 'Bulkhead Lock Nut',
                            'value' => 'Bulkhead Lock Nut',
                          ),
                          25 => 
                          array (
                            'key' => 'Cap',
                            'value' => 'Cap',
                          ),
                          26 => 
                          array (
                            'key' => 'Close Nipple',
                            'value' => 'Close Nipple',
                          ),
                          27 => 
                          array (
                            'key' => 'Cutting Ring',
                            'value' => 'Cutting Ring',
                          ),
                          28 => 
                          array (
                            'key' => 'Drain Cock, Angle Bib',
                            'value' => 'Drain Cock- Angle Bib',
                          ),
                          29 => 
                          array (
                            'key' => 'Drain Cock, External Seat, Wing Down Facing',
                            'value' => 'Drain Cock- External Seat- Wing Down Facing',
                          ),
                          30 => 
                          array (
                            'key' => 'Drain Cock, External Seat, Wing Extended',
                            'value' => 'Drain Cock- External Seat- Wing Extended',
                          ),
                          31 => 
                          array (
                            'key' => 'Drain Cock, Internal Seat',
                            'value' => 'Drain Cock- Internal Seat',
                          ),
                          32 => 
                          array (
                            'key' => 'Drain Cock, Internal Seat, Tee Handle',
                            'value' => 'Drain Cock- Internal Seat- Tee Handle',
                          ),
                          33 => 
                          array (
                            'key' => 'Expander / Extender',
                            'value' => 'Expander - Extender',
                          ),
                          34 => 
                          array (
                            'key' => 'Extended Bushing',
                            'value' => 'Extended Bushing',
                          ),
                          35 => 
                          array (
                            'key' => 'Hex Nipple',
                            'value' => 'Hex Nipple',
                          ),
                          36 => 
                          array (
                            'key' => 'Hollow Hex Plug',
                            'value' => 'Hollow Hex Plug',
                          ),
                          37 => 
                          array (
                            'key' => 'Hollow Hex Plug, Flush',
                            'value' => 'Hollow Hex Plug- Flush',
                          ),
                          38 => 
                          array (
                            'key' => 'Insert',
                            'value' => 'Insert',
                          ),
                          39 => 
                          array (
                            'key' => 'Needle Valve',
                            'value' => 'Needle Valve',
                          ),
                          40 => 
                          array (
                            'key' => 'Nipple, Long',
                            'value' => 'Nipple- Long',
                          ),
                          41 => 
                          array (
                            'key' => 'Nut',
                            'value' => 'Nut',
                          ),
                          42 => 
                          array (
                            'key' => 'Nut, Long',
                            'value' => 'Nut- Long',
                          ),
                          43 => 
                          array (
                            'key' => 'Nut, Short',
                            'value' => 'Nut- Short',
                          ),
                          44 => 
                          array (
                            'key' => 'Plug',
                            'value' => 'Plug',
                          ),
                          45 => 
                          array (
                            'key' => 'Reducer Bushing',
                            'value' => 'Reducer Bushing',
                          ),
                          46 => 
                          array (
                            'key' => 'Reducer Bushing, Short Hex',
                            'value' => 'Reducer Bushing- Short Hex',
                          ),
                          47 => 
                          array (
                            'key' => 'Reducer Expanded',
                            'value' => 'Reducer Expanded',
                          ),
                          48 => 
                          array (
                            'key' => 'Reducer Expander',
                            'value' => 'Reducer Expander',
                          ),
                          49 => 
                          array (
                            'key' => 'Sleeve',
                            'value' => 'Sleeve',
                          ),
                          50 => 
                          array (
                            'key' => 'Slotted Plug',
                            'value' => 'Slotted Plug',
                          ),
                          51 => 
                          array (
                            'key' => 'Square Head Plug',
                            'value' => 'Square Head Plug',
                          ),
                          52 => 
                          array (
                            'key' => 'Tube Cap',
                            'value' => 'Tube Cap',
                          ),
                          53 => 
                          array (
                            'key' => 'Tube Coupling',
                            'value' => 'Tube Coupling',
                          ),
                          54 => 
                          array (
                            'key' => 'Tube Nut',
                            'value' => 'Tube Nut',
                          ),
                          55 => 
                          array (
                            'key' => 'Tube Nut, Long',
                            'value' => 'Tube Nut- Long',
                          ),
                          56 => 
                          array (
                            'key' => 'Tube Plug',
                            'value' => 'Tube Plug',
                          ),
                          57 => 
                          array (
                            'key' => 'Tube Sleeve',
                            'value' => 'Tube Sleeve',
                          ),
                        ),
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      9 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'styleCode',
                         'title' => 'Style Code',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left: 20px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => NULL,
                         'columnLength' => 190,
                         'regex' => '',
                         'regexFlags' => 
                        array (
                        ),
                         'unique' => false,
                         'showCharCount' => false,
                         'width' => NULL,
                         'defaultValueGenerator' => '',
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'fieldcontainer',
                     'layout' => 'vbox',
                     'fieldLabel' => '',
                     'labelWidth' => 200,
                     'labelAlign' => 'left',
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'fieldcontainer',
                 'layout' => 'hbox',
                 'fieldLabel' => '',
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'fieldset',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'fieldtype' => 'panel',
         'layout' => NULL,
         'border' => false,
         'icon' => '',
         'labelWidth' => 100,
         'labelAlign' => 'left',
      )),
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'icon' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
   'previewGeneratorReference' => NULL,
   'compositeIndices' => 
  array (
  ),
   'showFieldLookup' => false,
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
   'deletedDataComponents' => 
  array (
  ),
   'blockedVarsForExport' => 
  array (
  ),
   'fieldDefinitionsCache' => 
  array (
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
