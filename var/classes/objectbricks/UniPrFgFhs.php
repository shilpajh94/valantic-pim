<?php

/**
 * Fields Summary:
 * - fitting1Type [manyToOneRelation]
 * - fitting2Type [manyToOneRelation]
 * - bendRestrictorType [manyToOneRelation]
 * - fitting1SizeImperial [quantityValue]
 * - fitting2SizeImperial [quantityValue]
 * - fitting1Material [manyToOneRelation]
 * - fitting2Material [manyToOneRelation]
 * - isBendRestrictor [checkbox]
 * - isAssembly [checkbox]
 * - localizedfields [localizedfields]
 * -- hoseFittingFamily [input]
 * -- completeFittingText [input]
 * -- note1 [textarea]
 * -- note2 [textarea]
 * - applications [manyToManyObjectRelation]
 * - hoseLengthImperial [quantityValue]
 * - hoseLengthMetric [quantityValue]
 */

return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'dao' => NULL,
   'key' => 'UniPrFgFhs',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => 'Finished Good Product Group Specific Data (FHS)',
   'group' => 'UniProductManagement',
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'name' => NULL,
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => '',
         'width' => '',
         'height' => '',
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'children' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Design Property',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Design Property',
             'width' => '',
             'height' => '',
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
                 'title' => NULL,
                 'width' => '',
                 'height' => '',
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
                     'title' => NULL,
                     'width' => '',
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                         'name' => 'fitting1Type',
                         'title' => 'Fitting 1 Type',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => true,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'UniPrFhsFittingType',
                          ),
                        ),
                         'displayMode' => 'grid',
                         'pathFormatterClass' => '',
                         'assetInlineDownloadAllowed' => false,
                         'assetUploadPath' => '',
                         'allowToClearRelation' => true,
                         'objectsAllowed' => true,
                         'assetsAllowed' => false,
                         'assetTypes' => 
                        array (
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'width' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                         'name' => 'fitting2Type',
                         'title' => 'Fitting 2 Type',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => true,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'UniPrFhsFittingType',
                          ),
                        ),
                         'displayMode' => 'grid',
                         'pathFormatterClass' => '',
                         'assetInlineDownloadAllowed' => false,
                         'assetUploadPath' => '',
                         'allowToClearRelation' => true,
                         'objectsAllowed' => true,
                         'assetsAllowed' => false,
                         'assetTypes' => 
                        array (
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'width' => '',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                         'name' => 'bendRestrictorType',
                         'title' => 'Bend Restrictor Type',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => true,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'UniPrFhsBendRestrictorType',
                          ),
                        ),
                         'displayMode' => 'grid',
                         'pathFormatterClass' => '',
                         'assetInlineDownloadAllowed' => false,
                         'assetUploadPath' => '',
                         'allowToClearRelation' => true,
                         'objectsAllowed' => true,
                         'assetsAllowed' => false,
                         'assetTypes' => 
                        array (
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'width' => '',
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
                     'title' => NULL,
                     'width' => '',
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'name' => 'fitting1SizeImperial',
                         'title' => 'Fitting 1 Size (in)',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'unitWidth' => '',
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                          0 => 'length_in',
                        ),
                         'unique' => false,
                         'autoConvert' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'defaultValue' => NULL,
                         'integer' => false,
                         'unsigned' => false,
                         'minValue' => NULL,
                         'maxValue' => NULL,
                         'decimalSize' => NULL,
                         'decimalPrecision' => NULL,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'name' => 'fitting2SizeImperial',
                         'title' => 'Fitting 2 Size (in)',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'unitWidth' => '',
                         'defaultUnit' => NULL,
                         'validUnits' => 
                        array (
                          0 => 'length_in',
                        ),
                         'unique' => false,
                         'autoConvert' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'defaultValue' => NULL,
                         'integer' => false,
                         'unsigned' => false,
                         'minValue' => NULL,
                         'maxValue' => NULL,
                         'decimalSize' => NULL,
                         'decimalPrecision' => NULL,
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
                 'labelWidth' => 200,
                 'labelAlign' => 'left',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                 'name' => 'Field Container',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => NULL,
                 'width' => '',
                 'height' => '',
                 'collapsible' => true,
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
                     'title' => NULL,
                     'width' => '',
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                         'name' => 'fitting1Material',
                         'title' => 'Fitting 1 Materials',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => true,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'UniPrFhsFittingMaterial',
                          ),
                        ),
                         'displayMode' => 'grid',
                         'pathFormatterClass' => '',
                         'assetInlineDownloadAllowed' => false,
                         'assetUploadPath' => '',
                         'allowToClearRelation' => true,
                         'objectsAllowed' => true,
                         'assetsAllowed' => false,
                         'assetTypes' => 
                        array (
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'width' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                         'name' => 'fitting2Material',
                         'title' => 'Fitting 2 Materials',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => true,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'UniPrFhsFittingMaterial',
                          ),
                        ),
                         'displayMode' => 'grid',
                         'pathFormatterClass' => '',
                         'assetInlineDownloadAllowed' => false,
                         'assetUploadPath' => '',
                         'allowToClearRelation' => true,
                         'objectsAllowed' => true,
                         'assetsAllowed' => false,
                         'assetTypes' => 
                        array (
                        ),
                         'documentsAllowed' => false,
                         'documentTypes' => 
                        array (
                        ),
                         'width' => '',
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
                     'title' => NULL,
                     'width' => '',
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'name' => 'isBendRestrictor',
                         'title' => 'Bend Restrictor Y/N',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => NULL,
                         'defaultValueGenerator' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'name' => 'isAssembly',
                         'title' => 'Assembly / Not Assembly',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => NULL,
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
                 'labelWidth' => 200,
                 'labelAlign' => 'left',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                 'name' => 'Layout',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Localized fields',
                 'width' => '',
                 'height' => '',
                 'collapsible' => true,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                     'name' => 'localizedfields',
                     'title' => '',
                     'tooltip' => NULL,
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => NULL,
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => true,
                     'visibleSearch' => true,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'hoseFittingFamily',
                         'title' => 'Hose Fitting Family (HYD)',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
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
                         'width' => 250,
                         'defaultValueGenerator' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'completeFittingText',
                         'title' => 'Complete Fitting Text',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
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
                         'width' => 250,
                         'defaultValueGenerator' => '',
                      )),
                    ),
                     'region' => NULL,
                     'layout' => NULL,
                     'maxTabs' => 25,
                     'border' => false,
                     'provideSplitView' => false,
                     'tabPosition' => 'top',
                     'hideLabelsWhenTabsReached' => NULL,
                     'referencedFields' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                         'name' => 'localizedfields',
                         'title' => '',
                         'tooltip' => NULL,
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => NULL,
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => true,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                             'name' => 'note1',
                             'title' => 'Note1 (above table)',
                             'tooltip' => '',
                             'mandatory' => true,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => '',
                             'permissions' => NULL,
                             'fieldtype' => '',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'maxLength' => NULL,
                             'showCharCount' => false,
                             'excludeFromSearchIndex' => false,
                             'height' => 100,
                             'width' => '',
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                             'name' => 'note2',
                             'title' => 'Note 2 (below table)',
                             'tooltip' => '',
                             'mandatory' => true,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => '',
                             'permissions' => NULL,
                             'fieldtype' => '',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'maxLength' => NULL,
                             'showCharCount' => false,
                             'excludeFromSearchIndex' => false,
                             'height' => 100,
                             'width' => '',
                          )),
                        ),
                         'region' => NULL,
                         'layout' => NULL,
                         'maxTabs' => 35,
                         'border' => false,
                         'provideSplitView' => false,
                         'tabPosition' => 'top',
                         'hideLabelsWhenTabsReached' => NULL,
                         'referencedFields' => 
                        array (
                        ),
                         'permissionView' => NULL,
                         'permissionEdit' => NULL,
                         'labelWidth' => 200,
                         'labelAlign' => 'left',
                         'width' => '',
                         'height' => '',
                         'fieldDefinitionsCache' => NULL,
                      )),
                    ),
                     'permissionView' => NULL,
                     'permissionEdit' => NULL,
                     'labelWidth' => 200,
                     'labelAlign' => 'left',
                     'width' => '',
                     'height' => '',
                     'fieldDefinitionsCache' => NULL,
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
             'icon' => '/bundles/pimcoreadmin/img/twemoji/1f6e0.svg',
             'labelWidth' => 250,
             'labelAlign' => 'left',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Non-Functional Property',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Non-Functional Property',
             'width' => '',
             'height' => '',
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
                 'title' => 'Localized fields',
                 'width' => '',
                 'height' => '',
                 'collapsible' => true,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                     'name' => 'localizedfields',
                     'title' => '',
                     'tooltip' => NULL,
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => NULL,
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => true,
                     'visibleSearch' => true,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                         'name' => 'note1',
                         'title' => 'Note1 (above table)',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'maxLength' => NULL,
                         'showCharCount' => false,
                         'excludeFromSearchIndex' => false,
                         'height' => 100,
                         'width' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                         'name' => 'note2',
                         'title' => 'Note 2 (below table)',
                         'tooltip' => '',
                         'mandatory' => true,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'maxLength' => NULL,
                         'showCharCount' => false,
                         'excludeFromSearchIndex' => false,
                         'height' => 100,
                         'width' => '',
                      )),
                    ),
                     'region' => NULL,
                     'layout' => NULL,
                     'maxTabs' => 35,
                     'border' => false,
                     'provideSplitView' => false,
                     'tabPosition' => 'top',
                     'hideLabelsWhenTabsReached' => NULL,
                     'referencedFields' => 
                    array (
                    ),
                     'permissionView' => NULL,
                     'permissionEdit' => NULL,
                     'labelWidth' => 200,
                     'labelAlign' => 'left',
                     'width' => '',
                     'height' => '',
                     'fieldDefinitionsCache' => NULL,
                  )),
                ),
                 'locked' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'fieldtype' => 'fieldset',
                 'labelWidth' => 250,
                 'labelAlign' => 'left',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                 'name' => 'applications',
                 'title' => 'Applications',
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
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'UniPrFhsApplications',
                  ),
                ),
                 'displayMode' => 'grid',
                 'pathFormatterClass' => '',
                 'maxItems' => NULL,
                 'visibleFields' => 
                array (
                ),
                 'allowToCreateNewObject' => false,
                 'allowToClearRelation' => true,
                 'optimizedAdminLoading' => false,
                 'enableTextSelection' => false,
                 'visibleFieldDefinitions' => 
                array (
                ),
                 'width' => '',
                 'height' => '',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/service_mark.svg',
             'labelWidth' => 250,
             'labelAlign' => 'left',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Mechanical Property',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Mechanical Property',
             'width' => '',
             'height' => '',
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
                 'title' => NULL,
                 'width' => '',
                 'height' => '',
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                     'name' => 'hoseLengthImperial',
                     'title' => 'Hose Length (Ft)',
                     'tooltip' => '',
                     'mandatory' => true,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => '',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => true,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'unitWidth' => '',
                     'defaultUnit' => NULL,
                     'validUnits' => 
                    array (
                      0 => 'length_ft',
                    ),
                     'unique' => false,
                     'autoConvert' => false,
                     'defaultValueGenerator' => '',
                     'width' => '',
                     'defaultValue' => NULL,
                     'integer' => false,
                     'unsigned' => false,
                     'minValue' => NULL,
                     'maxValue' => NULL,
                     'decimalSize' => NULL,
                     'decimalPrecision' => NULL,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                     'name' => 'hoseLengthMetric',
                     'title' => 'Hose Length (M)',
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
                     'unitWidth' => '',
                     'defaultUnit' => NULL,
                     'validUnits' => 
                    array (
                      0 => 'length_m',
                    ),
                     'unique' => false,
                     'autoConvert' => false,
                     'defaultValueGenerator' => '',
                     'width' => '',
                     'defaultValue' => NULL,
                     'integer' => false,
                     'unsigned' => false,
                     'minValue' => NULL,
                     'maxValue' => NULL,
                     'decimalSize' => NULL,
                     'decimalPrecision' => NULL,
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
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/self_service_kiosk.svg',
             'labelWidth' => 250,
             'labelAlign' => 'left',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'fieldtype' => 'tabpanel',
         'border' => false,
         'tabPosition' => 'top',
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
   'fieldDefinitionsCache' => NULL,
   'blockedVarsForExport' => 
  array (
  ),
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'UniProductBase',
      'fieldname' => 'technicalProductGroupSpecific',
    ),
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
