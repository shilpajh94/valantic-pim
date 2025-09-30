<?php

/**
 * Fields Summary:
 * - modelType [manyToOneRelation]
 * - isBellowOnlyPart [checkbox]
 * - minimumHeightMetric [numeric]
 * - maximumHeightMetric [numeric]
 * - maximumBellowDiameterMetric [numeric]
 * - maximumStrokeMetric [numeric]
 * - workingPressureBar [numeric]
 * - workingPressureMpa [numeric]
 * - minimumHeightImperial [numeric]
 * - maximumHeightImperial [numeric]
 * - maximumBellowDiameterImperial [numeric]
 * - maximumStrokeImperial [numeric]
 * - workingPressurePsi [numeric]
 * - numberOfConvolutions [numeric]
 * - bellowCompoundMaterial [manyToOneRelation]
 * - rollingLobePistonMaterial [manyToOneRelation]
 * - airInletThread [input]
 * - airInletInsideThread [manyToOneRelation]
 * - airInletLocation [manyToOneRelation]
 * - localizedfields [localizedfields]
 * -- hasInternalBumper [checkbox]
 * -- basePlateMaterial [input]
 * - permissibleInstallationSpace [image]
 */

return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'dao' => NULL,
   'key' => 'UniPrFgDss',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => 'Finished Good DSS Data',
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
             'name' => 'TabPanel',
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Non-Functional Property',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Non-Functional Property',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                     'name' => 'modelType',
                     'title' => 'Model Type',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
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
                        'classes' => 'UniPrDssModelType',
                      ),
                    ),
                     'displayMode' => 'combo',
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
                     'width' => 250,
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
                 'labelWidth' => 200,
                 'labelAlign' => 'left',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Physical / Mechanical Property',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Physical / Mechanical Property',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'isBellowOnlyPart',
                     'title' => 'Is the part a Bellow only',
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
                     'visibleSearch' => true,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'defaultValue' => 0,
                     'defaultValueGenerator' => '',
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
                 'labelWidth' => 200,
                 'labelAlign' => 'left',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Design Property',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Design Property',
                 'width' => 0,
                 'height' => '100%',
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
                         'title' => NULL,
                         'width' => 700,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'minimumHeightMetric',
                             'title' => 'Minimum Height (mm)',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => NULL,
                             'integer' => false,
                             'unsigned' => false,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 250,
                             'defaultValueGenerator' => '',
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'maximumHeightMetric',
                             'title' => 'Maximum Height (mm)',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => NULL,
                             'integer' => false,
                             'unsigned' => false,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 250,
                             'defaultValueGenerator' => '',
                          )),
                          2 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'maximumBellowDiameterMetric',
                             'title' => 'Maximum Bellow Diameter (mm)',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => NULL,
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 250,
                             'defaultValueGenerator' => '',
                          )),
                          3 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'maximumStrokeMetric',
                             'title' => 'Maximum Stroke (mm)',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => NULL,
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 250,
                             'defaultValueGenerator' => '',
                          )),
                          4 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'workingPressureBar',
                             'title' => 'Working Pressure (Bar)',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => NULL,
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 250,
                             'defaultValueGenerator' => '',
                          )),
                          5 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'workingPressureMpa',
                             'title' => 'Working Pressure (MPa)',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => NULL,
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 250,
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
                         'labelWidth' => 250,
                         'labelAlign' => 'left',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                         'name' => 'Field Container',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => NULL,
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'minimumHeightImperial',
                             'title' => 'Minimum Height (in)',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => NULL,
                             'integer' => false,
                             'unsigned' => false,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 250,
                             'defaultValueGenerator' => '',
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'maximumHeightImperial',
                             'title' => 'Maximum Height (in)',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => NULL,
                             'integer' => false,
                             'unsigned' => false,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 250,
                             'defaultValueGenerator' => '',
                          )),
                          2 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'maximumBellowDiameterImperial',
                             'title' => 'Maximum Bellow Diameter (in)',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => NULL,
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 250,
                             'defaultValueGenerator' => '',
                          )),
                          3 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'maximumStrokeImperial',
                             'title' => 'Maximum Stroke (in)',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => NULL,
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 250,
                             'defaultValueGenerator' => '',
                          )),
                          4 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'workingPressurePsi',
                             'title' => 'Working Pressure (psi)',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => NULL,
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 250,
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
                         'labelWidth' => 250,
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
                         'title' => NULL,
                         'width' => 700,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'numberOfConvolutions',
                             'title' => 'Number of Convolutions',
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
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => NULL,
                             'integer' => true,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 250,
                             'defaultValueGenerator' => '',
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'name' => 'bellowCompoundMaterial',
                             'title' => 'Bellow Compound Material',
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
                                'classes' => 'UniPrDssBellowCompoundMaterial',
                              ),
                            ),
                             'displayMode' => 'combo',
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
                             'width' => 250,
                          )),
                          2 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'name' => 'rollingLobePistonMaterial',
                             'title' => 'Rolling Lobe - Piston Material',
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
                                'classes' => 'UniPrDssRollingLobePistonMaterial',
                              ),
                            ),
                             'displayMode' => 'combo',
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
                             'width' => 250,
                          )),
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'fieldcontainer',
                         'layout' => 'vbox',
                         'fieldLabel' => '',
                         'labelWidth' => 250,
                         'labelAlign' => 'left',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                         'name' => 'Field Container',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => NULL,
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'airInletThread',
                             'title' => 'Air Inlet Thread',
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
                             'width' => 256,
                             'defaultValueGenerator' => '',
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'name' => 'airInletInsideThread',
                             'title' => 'Air Inlet - Inside Thread / Stud Bolt',
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
                                'classes' => 'UniPrDssAirInletInsideThread',
                              ),
                            ),
                             'displayMode' => 'combo',
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
                             'width' => 250,
                          )),
                          2 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                             'name' => 'airInletLocation',
                             'title' => 'Air Inlet Location',
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
                                'classes' => 'UniPrDssAirInletLocation',
                              ),
                            ),
                             'displayMode' => 'combo',
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
                             'width' => 250,
                          )),
                        ),
                         'locked' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'fieldtype' => 'fieldcontainer',
                         'layout' => 'vbox',
                         'fieldLabel' => '',
                         'labelWidth' => 250,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'name' => 'hasInternalBumper',
                         'title' => 'Internal Bumper (Y/N)',
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
                         'visibleSearch' => true,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => 0,
                         'defaultValueGenerator' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'basePlateMaterial',
                         'title' => 'Base Plate Material',
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
                     'width' => 0,
                     'height' => 0,
                     'fieldDefinitionsCache' => NULL,
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                     'name' => 'permissibleInstallationSpace',
                     'title' => 'Permissible Installation Space',
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
                     'visibleSearch' => true,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'uploadPath' => '/Product Assets/DSS/Permissable Installation Space',
                     'width' => 568,
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
                 'icon' => '/bundles/pimcoreadmin/img/twemoji/1f6e0.svg',
                 'labelWidth' => 200,
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
         'icon' => '',
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
      'fieldname' => 'productGroupSpecific',
    ),
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
