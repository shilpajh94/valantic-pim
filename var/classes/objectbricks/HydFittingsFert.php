<?php

/**
 * Fields Summary:
 * - DescriptivePartNumber [input]
 * - HydFittingFamily [multiselect]
 * - HydThreadDescription [input]
 * - nomenclatureDetails [advancedManyToManyObjectRelation]
 * - AssemblyRevisionNumber [input]
 * - AssemblyVendor [multiselect]
 * - ReleasedToProduction [booleanSelect]
 * - SocketWrenchSizeInFract [input]
 * - SocketWrenchSizeInDec [input]
 * - FittingWeight [input]
 * - DualGripStyle [booleanSelect]
 * - SAEStandard [input]
 * - SkiveType [input]
 * - NutType [select]
 * - ReleasedToProductionDate [date]
 * - Comments [textarea]
 * - FittingEndFamilyType [select]
 * - SocketWrenchSizeMM [input]
 * - FittingSizeInFract [input]
 * - UniCrimpStyle [booleanSelect]
 * - DualSeatYN [booleanSelect]
 * - AssemblyMaterial [select]
 * - CatalogDescription [textarea]
 * - FlangeIDInFract [input]
 * - FlangeIDMM [input]
 * - FlangeODInDec [input]
 * - FlangeIDInDec [input]
 * - FlangeODInFract [input]
 * - FlangeODMM [input]
 * - TubeIDInFract [input]
 * - TubeLengthMM [input]
 * - TubeLengthInDec [input]
 * - TubeODInDec [numeric]
 * - OrificeTubeODInDecimal [numeric]
 * - OrificeTubeLengthInDecimal [numeric]
 * - TubeIDInDec [numeric]
 * - TubeIDMM [numeric]
 * - TubeODInFract [input]
 * - TubeODMM [numeric]
 * - OrificeTubeODMMDecimal [numeric]
 * - OrificeTubeLengthMMDecimal [numeric]
 * - ValveSize1inFraction [input]
 * - ValveSizeInDec [numeric]
 * - ValveSizeMM [numeric]
 * - ValveStyle [numeric]
 * - ValveSize2inFraction [input]
 * - ValveSize2InDec [numeric]
 * - ValveSize2MM [numeric]
 * - ValveStyle2 [numeric]
 * - OverallLengthIN [input]
 * - RunLengthIN [input]
 * - CutOffLengthIN [input]
 * - InsertionDepthIN [input]
 * - DropLengthIN [numeric]
 * - OverallLengthMm [input]
 * - RunLengthMM [input]
 * - CutOffLengthMM [input]
 * - InsertionDepthMM [input]
 * - DropLengthMM [numeric]
 * - HoseID1InFract [input]
 * - HoseID1InDec [numeric]
 * - HoseID1MM [numeric]
 * - HoseID3InFract [input]
 * - HoseID3InDec [numeric]
 * - HoseID2InFract [input]
 * - HoseID2InDec [numeric]
 * - HoseID2MM [numeric]
 * - HoseDashSize [numeric]
 * - HoseID3MM [numeric]
 * - Hex1WrenchSizeIN [input]
 * - Hex2WrenchSizeIN [input]
 * - Hex1WrenchSizeFraction [input]
 * - Hex2WrenchSizeFraction [input]
 * - Hex1WrenchSizeMM [input]
 * - Hex2WrenchSizeMM [input]
 * - SingleHexYN [booleanSelect]
 * - Thread1 [input]
 * - Thread3 [input]
 * - ThreadSize1InMMDecimal [input]
 * - ThreadSize2InMMDecimal [input]
 * - ThreadDashSize1 [input]
 * - ThreadDashSize3 [numeric]
 * - Thread2 [input]
 * - Thread4 [input]
 * - ThreadSize3InMMDecimal [input]
 * - ThreadSize4InMMDecimal [input]
 * - ThreadDashSize2 [numeric]
 * - ThreadDashSize4 [numeric]
 * - StemComponentNumber [input]
 * - StemComponentThreadType [select]
 * - StemHexinchDecimal [numeric]
 * - StemHexMM [input]
 * - StemRevDate [date]
 * - StemComponentSAPNumber [input]
 * - StemComponentVendor [multiselect]
 * - StemHexinchFraction [input]
 * - StemMaterial [select]
 * - StemRevisionNumber [input]
 * - FerruleComponentNumber [input]
 * - FerruleComponentVendor [multiselect]
 * - FerruleMaterial [select]
 * - FerruleIDInDec [numeric]
 * - FerruleODInDec [numeric]
 * - FerruleLengthInDec [numeric]
 * - FerruleRevDate [date]
 * - FerruleComponentSAPNumber [input]
 * - FerruleRevisionNumber [input]
 * - FerruleIDMM [numeric]
 * - FerruleODMM [numeric]
 * - FerruleLengthMM [numeric]
 * - SwivelNutComponentNumber [input]
 * - SwivelNutComponentThreadType [select]
 * - SwivelNutHexinchFraction [input]
 * - SwivelNutMaterial [select]
 * - SwivelNutRevisionNumber [input]
 * - SwivelNutComponentSAPNumber [input]
 * - SwivelNutComponentVendor [multiselect]
 * - SwivelNutinchDecimal [numeric]
 * - SwivelNutRevDate [date]
 * - ThrustWireComponentNumber [input]
 * - ThrustWireMaterial [select]
 * - ThrustWireRevisionNumber [input]
 * - ORingBOMSAPNumber [input]
 * - ORingComponentSAPNumber [input]
 * - ORingMaterial [select]
 * - ORingIDInDec [numeric]
 * - ORingThicknessInDec [numeric]
 * - ORingComponentNumber [input]
 * - ORingComponentVendor [multiselect]
 * - ORingRevisionNumber [input]
 * - ORingIDMM [numeric]
 * - ORingThicknessMM [numeric]
 * - InternalORingComponentNumber [input]
 * - InternalORingSAPNumber [input]
 * - InternalORingRev [input]
 * - InternalORingVendor [multiselect]
 * - BackUpORingComponentVendor [multiselect]
 * - BackUpORingMaterial [select]
 * - BackUpORingSAPNumber [input]
 * - BackUpORingComponentNumber [input]
 * - SlipNutRetainingRingComponentNumber [input]
 * - SlipNutRetainingRingComponentVendor [multiselect]
 * - SlipNutRetainingRingMaterial [select]
 * - BackUpORingRevisionNumber [input]
 * - SlipNutRetainingRingSAPComponentNumber [input]
 * - SlipNutRevisionNumber [input]
 * - ThreadProtectorComponentNumber [input]
 * - ThreadProtectorComponentVendor [multiselect]
 * - ThreadProtectorMaterial [select]
 * - ThreadProtectorRevisionNumber [input]
 * - ThreadProtectorSAPComponentNumber [input]
 * - PackagingBoxSize [select]
 * - PackagingQuantityPerBox [input]
 */

return \Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'dao' => NULL,
   'key' => 'HydFittingsFert',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => '',
   'group' => 'HYD_FITTINGS',
   'layoutDefinitions' => 
  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
      \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
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
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
             'name' => 'Flange',
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
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'DescriptivePartNumber',
                     'title' => 'Descriptive Part Number',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-top:5px;',
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
                     'width' => 200,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'HydFittingFamily',
                     'title' => 'Fitting Family (Hyd)',
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
                     'maxItems' => NULL,
                     'renderType' => 'tags',
                     'dynamicOptions' => false,
                     'defaultValue' => NULL,
                     'height' => '',
                     'width' => 200,
                     'defaultValueGenerator' => '',
                     'optionsProviderType' => 'class',
                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                     'optionsProviderData' => 'FittingFamily|Name',
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
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'HydThreadDescription',
                     'title' => 'Thread Description (Hyd)',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:20px;',
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
                     'width' => 200,
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
          1 => 
          \Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyObjectRelation::__set_state(array(
             'name' => 'nomenclatureDetails',
             'title' => 'Nomenclature Details',
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
             'maxItems' => 1,
             'visibleFields' => 'fullpath,id',
             'allowToCreateNewObject' => true,
             'allowToClearRelation' => true,
             'optimizedAdminLoading' => false,
             'enableTextSelection' => false,
             'visibleFieldDefinitions' => 
            array (
            ),
             'width' => 950,
             'height' => '',
             'allowedClassId' => 'NomenClature',
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
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
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
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Finished',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Finished',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
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
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'AssemblyRevisionNumber',
                                 'title' => 'Assembly Revision Number',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                 'name' => 'AssemblyVendor',
                                 'title' => 'Assembly Vendor',
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
                                    'key' => 'V1',
                                    'value' => 'V1',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'V2',
                                    'value' => 'V2',
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'V3',
                                    'value' => 'V3',
                                  ),
                                  3 => 
                                  array (
                                    'key' => 'V4',
                                    'value' => 'V4',
                                  ),
                                  4 => 
                                  array (
                                    'key' => 'V5',
                                    'value' => 'V5',
                                  ),
                                  5 => 
                                  array (
                                    'key' => 'V6',
                                    'value' => 'V6',
                                  ),
                                  6 => 
                                  array (
                                    'key' => 'V6',
                                    'value' => 'V6',
                                  ),
                                  7 => 
                                  array (
                                    'key' => 'V7',
                                    'value' => 'V7',
                                  ),
                                  8 => 
                                  array (
                                    'key' => 'V8',
                                    'value' => 'V8',
                                  ),
                                  9 => 
                                  array (
                                    'key' => 'V9',
                                    'value' => 'V9',
                                  ),
                                ),
                                 'maxItems' => NULL,
                                 'renderType' => 'tags',
                                 'dynamicOptions' => false,
                                 'defaultValue' => NULL,
                                 'height' => '',
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                                 'optionsProviderType' => 'configure',
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                 'name' => 'ReleasedToProduction',
                                 'title' => 'Released To Production',
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
                                 'yesLabel' => 'Yes',
                                 'noLabel' => 'No',
                                 'emptyLabel' => '',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => '',
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
                                 'width' => 200,
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'SocketWrenchSizeInFract',
                                 'title' => 'Socket Wrench Size (in) Fract',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              4 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'SocketWrenchSizeInDec',
                                 'title' => 'Socket Wrench Size (in) Dec',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              5 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'FittingWeight',
                                 'title' => 'Fitting Weight',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              6 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                 'name' => 'DualGripStyle',
                                 'title' => 'Dual-Grip Style (Y/N)',
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
                                 'yesLabel' => 'Y',
                                 'noLabel' => 'N',
                                 'emptyLabel' => '',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => '',
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
                                 'width' => 200,
                              )),
                              7 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'SAEStandard',
                                 'title' => 'SAE Standard',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              8 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'SkiveType',
                                 'title' => 'Skive Type',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              9 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'name' => 'NutType',
                                 'title' => 'Nut Type',
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
                                    'key' => 'Crimp Nut',
                                    'value' => 'Crimp Nut',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'Tube Nut',
                                    'value' => 'Tube Nut',
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'Thrust Nut',
                                    'value' => 'Thrust Nut',
                                  ),
                                ),
                                 'defaultValue' => '',
                                 'columnLength' => 190,
                                 'dynamicOptions' => false,
                                 'defaultValueGenerator' => '',
                                 'width' => 200,
                                 'optionsProviderType' => 'configure',
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
                                 'name' => 'ReleasedToProductionDate',
                                 'title' => 'Released To Production Date',
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
                                 'useCurrentDate' => false,
                                 'columnType' => 'bigint(20)',
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'Comments',
                                 'title' => 'Comments',
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
                                 'height' => 120,
                                 'width' => 200,
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'name' => 'FittingEndFamilyType',
                                 'title' => 'Fitting End Family Type',
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
                                 'defaultValue' => '',
                                 'columnLength' => 150,
                                 'dynamicOptions' => false,
                                 'defaultValueGenerator' => '',
                                 'width' => 200,
                                 'optionsProviderType' => 'class',
                                 'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                 'optionsProviderData' => 'FittingEndFamilyType|Name',
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'SocketWrenchSizeMM',
                                 'title' => 'Socket Wrench Size (mm)',
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
                                 'columnLength' => 150,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              4 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'FittingSizeInFract',
                                 'title' => 'Fitting Size (in) Fract.',
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
                                 'columnLength' => 150,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              5 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                 'name' => 'UniCrimpStyle',
                                 'title' => 'Uni-Crimp Style (Y/N)',
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
                                 'emptyLabel' => '',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => '',
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
                                 'width' => 200,
                              )),
                              6 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                 'name' => 'DualSeatYN',
                                 'title' => 'Dual Seat Y/N',
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
                                 'emptyLabel' => '',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => '',
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
                                 'width' => 200,
                              )),
                              7 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'name' => 'AssemblyMaterial',
                                 'title' => 'Assembly Material',
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
                                    'key' => 'Steel',
                                    'value' => 'Steel',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'Stainless Steel',
                                    'value' => 'Stainless Steel',
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'Brass',
                                    'value' => 'Brass',
                                  ),
                                ),
                                 'defaultValue' => '',
                                 'columnLength' => 150,
                                 'dynamicOptions' => false,
                                 'defaultValueGenerator' => '',
                                 'width' => 200,
                                 'optionsProviderType' => NULL,
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                              )),
                              8 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'CatalogDescription',
                                 'title' => 'Catalog Description',
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
                                 'height' => 120,
                                 'width' => 200,
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
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'fieldset',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Flange',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => true,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                         'name' => 'Flange',
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'FlangeIDInFract',
                                 'title' => 'Flange ID (in) Fract.',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'FlangeIDMM',
                                 'title' => 'Flange ID (mm)',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'FlangeODInDec',
                                 'title' => 'Flange OD (in) Dec.',
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
                                 'width' => 200,
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'FlangeIDInDec',
                                 'title' => 'Flange ID (in) Dec.',
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
                                 'columnLength' => 150,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'FlangeODInFract',
                                 'title' => 'Flange OD (in) Fract.',
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
                                 'columnLength' => 150,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'FlangeODMM',
                                 'title' => 'Flange OD (mm)',
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
                                 'columnLength' => 150,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 200,
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
                  2 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Tube',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => true,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                         'name' => 'Tube',
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'TubeIDInFract',
                                 'title' => 'Tube ID (in) Fract.',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'TubeLengthMM',
                                 'title' => 'Tube Length (mm)',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'TubeLengthInDec',
                                 'title' => 'Tube Length (in) Dec.',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'TubeODInDec',
                                 'title' => 'Tube OD (in) Dec.',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              4 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'OrificeTubeODInDecimal',
                                 'title' => 'Orifice Tube OD (in) Decimal',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              5 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'OrificeTubeLengthInDecimal',
                                 'title' => 'Orifice Tube Length (in) Decimal',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'TubeIDInDec',
                                 'title' => 'Tube ID (in) Dec.',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'TubeIDMM',
                                 'title' => 'Tube ID (mm)',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'TubeODInFract',
                                 'title' => 'Tube OD (in) Fract.',
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
                                 'columnLength' => 150,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'TubeODMM',
                                 'title' => 'Tube OD (mm)',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              4 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'OrificeTubeODMMDecimal',
                                 'title' => 'Orifice Tube OD (mm) Decimal',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              5 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'OrificeTubeLengthMMDecimal',
                                 'title' => 'Orifice Tube Length (mm) Decimal',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
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
                  3 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Valve',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => true,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'ValveSize1inFraction',
                                 'title' => 'Valve Size 1 (in, Fraction)',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'ValveSizeInDec',
                                 'title' => 'Valve Size (in) Dec.',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'ValveSizeMM',
                                 'title' => 'Valve Size (mm)',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'ValveStyle',
                                 'title' => 'Valve Style',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'ValveSize2inFraction',
                                 'title' => 'Valve Size 2 (in, Fraction)',
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
                                 'columnLength' => 150,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'ValveSize2InDec',
                                 'title' => 'Valve Size 2 (in) Dec.',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'ValveSize2MM',
                                 'title' => 'Valve Size 2 (mm)',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'ValveStyle2',
                                 'title' => 'Valve Style 2',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
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
                  4 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Length/Depth',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => true,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                         'name' => 'Layout',
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'OverallLengthIN',
                                 'title' => 'Overall Length (In)',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'RunLengthIN',
                                 'title' => 'Run Length (in)',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'CutOffLengthIN',
                                 'title' => 'Cut Off Length (in)',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'InsertionDepthIN',
                                 'title' => 'Insertion Depth (in)',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              4 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'DropLengthIN',
                                 'title' => 'Drop Length (in)',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'OverallLengthMm',
                                 'title' => 'Overall Length (mm)',
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
                                 'columnLength' => 150,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'RunLengthMM',
                                 'title' => 'Run Length (mm)',
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
                                 'columnLength' => 150,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'CutOffLengthMM',
                                 'title' => 'Cut Off Length (mm)',
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
                                 'columnLength' => 150,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'InsertionDepthMM',
                                 'title' => 'Insertion Depth (mm)',
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
                                 'columnLength' => 150,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              4 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'DropLengthMM',
                                 'title' => 'Drop Length (mm)',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
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
                  5 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Hose',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => true,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                         'name' => 'Flange',
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'HoseID1InFract',
                                 'title' => 'Hose ID 1 (in) Fract.',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'HoseID1InDec',
                                 'title' => 'Hose ID 1 (in) Dec.',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'HoseID1MM',
                                 'title' => 'Hose ID 1 (mm)',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'HoseID3InFract',
                                 'title' => 'Hose ID 3 (in) Fract.',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              4 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'HoseID3InDec',
                                 'title' => 'Hose ID 3 (in) Dec.',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'HoseID2InFract',
                                 'title' => 'Hose ID 2 (in) Fract.',
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
                                 'columnLength' => 150,
                                 'regex' => '',
                                 'regexFlags' => 
                                array (
                                ),
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'HoseID2InDec',
                                 'title' => 'Hose ID 2 (in) Dec.',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'HoseID2MM',
                                 'title' => 'Hose ID 2 (mm)',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'HoseDashSize',
                                 'title' => 'Hose Dash Size',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              4 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'HoseID3MM',
                                 'title' => 'Hose ID 3 (mm)',
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
                                 'integer' => false,
                                 'unsigned' => true,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => 3,
                                 'width' => 200,
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
                  6 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Hex',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => true,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                         'name' => 'Flange',
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'Hex1WrenchSizeIN',
                                 'title' => 'Hex 1 Wrench Size (in)',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'Hex2WrenchSizeIN',
                                 'title' => 'Hex 2 Wrench Size (in)',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'Hex1WrenchSizeFraction',
                                 'title' => 'Hex 1 Wrench Size (Fraction)',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'Hex2WrenchSizeFraction',
                                 'title' => 'Hex 2 Wrench Size (Fraction)',
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
                                 'width' => 200,
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'Hex1WrenchSizeMM',
                                 'title' => 'Hex 1 Wrench Size (mm)',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'Hex2WrenchSizeMM',
                                 'title' => 'Hex 2 Wrench Size (mm)',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                 'name' => 'SingleHexYN',
                                 'title' => 'Single Hex Y/N',
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
                                 'emptyLabel' => '',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => '',
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
                                 'width' => 200,
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
              1 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Thread',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Thread',
                 'width' => 1200,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'Thread1',
                             'title' => 'Thread 1',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          1 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'Thread3',
                             'title' => 'Thread 3',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          2 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'ThreadSize1InMMDecimal',
                             'title' => 'Thread Size 1 (in & mm) Decimal',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          3 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'ThreadSize2InMMDecimal',
                             'title' => 'Thread Size 2 (in & mm) Decimal',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          4 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'ThreadDashSize1',
                             'title' => 'Thread Dash Size 1',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          5 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'ThreadDashSize3',
                             'title' => 'Thread Dash Size 3',
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
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => 3,
                             'width' => 200,
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
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'Thread2',
                             'title' => 'Thread 2',
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
                             'columnLength' => 150,
                             'regex' => '',
                             'regexFlags' => 
                            array (
                            ),
                             'unique' => false,
                             'showCharCount' => false,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          1 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'Thread4',
                             'title' => 'Thread 4',
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
                             'columnLength' => 150,
                             'regex' => '',
                             'regexFlags' => 
                            array (
                            ),
                             'unique' => false,
                             'showCharCount' => false,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          2 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'ThreadSize3InMMDecimal',
                             'title' => 'Thread Size 3 (in & mm) Decimal',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          3 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'ThreadSize4InMMDecimal',
                             'title' => 'Thread Size 4 (in & mm) Decimal',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          4 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'ThreadDashSize2',
                             'title' => 'Thread Dash Size 2',
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
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => 3,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          5 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'ThreadDashSize4',
                             'title' => 'Thread Dash Size 4',
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
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => 3,
                             'width' => 200,
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
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
              2 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'STEM',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'STEM',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'StemComponentNumber',
                             'title' => 'Stem Component Number',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          1 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'StemComponentThreadType',
                             'title' => 'Stem Component Thread Type',
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
                                'key' => 'G 1/4-19A',
                                'value' => 'G 1/4-19A',
                              ),
                              1 => 
                              array (
                                'key' => 'G 3/8-19A',
                                'value' => 'G 3/8-19A',
                              ),
                              2 => 
                              array (
                                'key' => 'G 1/2-14A',
                                'value' => 'G 1/2-14A',
                              ),
                              3 => 
                              array (
                                'key' => 'G 5/8-14A',
                                'value' => 'G 5/8-14A',
                              ),
                              4 => 
                              array (
                                'key' => 'G 3/4-14A',
                                'value' => 'G 3/4-14A',
                              ),
                              5 => 
                              array (
                                'key' => 'G 1-11A',
                                'value' => 'G 1-11A',
                              ),
                              6 => 
                              array (
                                'key' => 'G 1 1/4-11A',
                                'value' => 'G 1 1/4-11A',
                              ),
                              7 => 
                              array (
                                'key' => 'G 1 1/2-11A',
                                'value' => 'G 1 1/2-11A',
                              ),
                              8 => 
                              array (
                                'key' => 'G 2-11A',
                                'value' => 'G 2-11A',
                              ),
                              9 => 
                              array (
                                'key' => '1/4-19 BSPT',
                                'value' => '1/4-19 BSPT',
                              ),
                              10 => 
                              array (
                                'key' => '3/8-19 BSPT',
                                'value' => '3/8-19 BSPT',
                              ),
                              11 => 
                              array (
                                'key' => '1/2-14 BSPT',
                                'value' => '1/2-14 BSPT',
                              ),
                              12 => 
                              array (
                                'key' => '3/4-14 BSPT',
                                'value' => '3/4-14 BSPT',
                              ),
                              13 => 
                              array (
                                'key' => '1-11 BSPT',
                                'value' => '1-11 BSPT',
                              ),
                              14 => 
                              array (
                                'key' => '7/16-20 UNF-2A',
                                'value' => '7/16-20 UNF-2A',
                              ),
                              15 => 
                              array (
                                'key' => '1/2-20 UNF-2A',
                                'value' => '1/2-20 UNF-2A',
                              ),
                              16 => 
                              array (
                                'key' => '9/16-18 UNF-2A',
                                'value' => '9/16-18 UNF-2A',
                              ),
                              17 => 
                              array (
                                'key' => '3/4-16 UNF-2A',
                                'value' => '3/4-16 UNF-2A',
                              ),
                              18 => 
                              array (
                                'key' => '7/8-14 UNF-2A',
                                'value' => '7/8-14 UNF-2A',
                              ),
                              19 => 
                              array (
                                'key' => '1-1/16-12 UN 2A',
                                'value' => '1-1/16-12 UN 2A',
                              ),
                              20 => 
                              array (
                                'key' => '1-5/16-12 UN 2A',
                                'value' => '1-5/16-12 UN 2A',
                              ),
                              21 => 
                              array (
                                'key' => 'M16 X 1.5',
                                'value' => 'M16 X 1.5',
                              ),
                              22 => 
                              array (
                                'key' => 'M18 X 1.5',
                                'value' => 'M18 X 1.5',
                              ),
                              23 => 
                              array (
                                'key' => 'M20 X 1.5',
                                'value' => 'M20 X 1.5',
                              ),
                              24 => 
                              array (
                                'key' => 'M22 X 1.5',
                                'value' => 'M22 X 1.5',
                              ),
                              25 => 
                              array (
                                'key' => 'M24 X 1.5',
                                'value' => 'M24 X 1.5',
                              ),
                              26 => 
                              array (
                                'key' => 'M30 X 2.0',
                                'value' => 'M30 X 2.0',
                              ),
                              27 => 
                              array (
                                'key' => 'M36 X 2.0',
                                'value' => 'M36 X 2.0',
                              ),
                              28 => 
                              array (
                                'key' => 'M42 X 2.0',
                                'value' => 'M42 X 2.0',
                              ),
                              29 => 
                              array (
                                'key' => 'M52 X 2.0',
                                'value' => 'M52 X 2.0',
                              ),
                              30 => 
                              array (
                                'key' => 'M12 X 1.5',
                                'value' => 'M12 X 1.5',
                              ),
                              31 => 
                              array (
                                'key' => 'M14 X 1.5',
                                'value' => 'M14 X 1.5',
                              ),
                              32 => 
                              array (
                                'key' => 'M26 X 1.5',
                                'value' => 'M26 X 1.5',
                              ),
                              33 => 
                              array (
                                'key' => '1/2-27 UNS -2B',
                                'value' => '1/2-27 UNS -2B',
                              ),
                              34 => 
                              array (
                                'key' => '3.5 TPI ACME 2G',
                                'value' => '3.5 TPI ACME 2G',
                              ),
                              35 => 
                              array (
                                'key' => '3 TPI ACME 2G',
                                'value' => '3 TPI ACME 2G',
                              ),
                              36 => 
                              array (
                                'key' => '7/8-14 UN-2A',
                                'value' => '7/8-14 UN-2A',
                              ),
                              37 => 
                              array (
                                'key' => '1-1/16-12 UN-2A',
                                'value' => '1-1/16-12 UN-2A',
                              ),
                              38 => 
                              array (
                                'key' => '1-3/16-12 UN-2A',
                                'value' => '1-3/16-12 UN-2A',
                              ),
                              39 => 
                              array (
                                'key' => '1-5/16-12 UN-2A',
                                'value' => '1-5/16-12 UN-2A',
                              ),
                              40 => 
                              array (
                                'key' => '1-5/8-12 UN-2A',
                                'value' => '1-5/8-12 UN-2A',
                              ),
                              41 => 
                              array (
                                'key' => '1-7/8-12 UN-2A',
                                'value' => '1-7/8-12 UN-2A',
                              ),
                              42 => 
                              array (
                                'key' => '2-1/2-12 UN-2A',
                                'value' => '2-1/2-12 UN-2A',
                              ),
                              43 => 
                              array (
                                'key' => '1/8-27 NPTF CLASS 2 PLUG',
                                'value' => '1/8-27 NPTF CLASS 2 PLUG',
                              ),
                              44 => 
                              array (
                                'key' => '1/4-18 NPTF CLASS 2 PLUG',
                                'value' => '1/4-18 NPTF CLASS 2 PLUG',
                              ),
                              45 => 
                              array (
                                'key' => '3/8-18 NPTF CLASS 2',
                                'value' => '3/8-18 NPTF CLASS 2',
                              ),
                              46 => 
                              array (
                                'key' => '3/8-18 NPTF CLASS 2 PLUG',
                                'value' => '3/8-18 NPTF CLASS 2 PLUG',
                              ),
                              47 => 
                              array (
                                'key' => '1/2-14 NPTF CLASS 2 PLUG',
                                'value' => '1/2-14 NPTF CLASS 2 PLUG',
                              ),
                              48 => 
                              array (
                                'key' => '3/4-14 NPTF CLASS 2 PLUG',
                                'value' => '3/4-14 NPTF CLASS 2 PLUG',
                              ),
                              49 => 
                              array (
                                'key' => '1-11-1/2 NPTF CLASS 2',
                                'value' => '1-11-1/2 NPTF CLASS 2',
                              ),
                              50 => 
                              array (
                                'key' => '1/8-27 NPTF CLASS 2',
                                'value' => '1/8-27 NPTF CLASS 2',
                              ),
                              51 => 
                              array (
                                'key' => '1/4-18 NPTF CLASS 2',
                                'value' => '1/4-18 NPTF CLASS 2',
                              ),
                              52 => 
                              array (
                                'key' => '1/2-14 NPTF CLASS 2',
                                'value' => '1/2-14 NPTF CLASS 2',
                              ),
                              53 => 
                              array (
                                'key' => '3/4-14 NPTF CLASS 2',
                                'value' => '3/4-14 NPTF CLASS 2',
                              ),
                              54 => 
                              array (
                                'key' => '1-1/4-11-1/2 NPTF CLASS 2',
                                'value' => '1-1/4-11-1/2 NPTF CLASS 2',
                              ),
                              55 => 
                              array (
                                'key' => '1-1/2-11-1/2 NPTF CLASS 2',
                                'value' => '1-1/2-11-1/2 NPTF CLASS 2',
                              ),
                              56 => 
                              array (
                                'key' => '2-11-1/2 NPTF CLASS 2',
                                'value' => '2-11-1/2 NPTF CLASS 2',
                              ),
                              57 => 
                              array (
                                'key' => '1-1/2 11-1/2 API API5B',
                                'value' => '1-1/2 11-1/2 API API5B',
                              ),
                              58 => 
                              array (
                                'key' => '2-11-1/2 API API5B',
                                'value' => '2-11-1/2 API API5B',
                              ),
                              59 => 
                              array (
                                'key' => '1-1/6-12 UN-2A',
                                'value' => '1-1/6-12 UN-2A',
                              ),
                              60 => 
                              array (
                                'key' => '11/16-16 UN-2A',
                                'value' => '11/16-16 UN-2A',
                              ),
                              61 => 
                              array (
                                'key' => '13/16-16 UN-2A',
                                'value' => '13/16-16 UN-2A',
                              ),
                              62 => 
                              array (
                                'key' => '1-14 UNS-2A',
                                'value' => '1-14 UNS-2A',
                              ),
                              63 => 
                              array (
                                'key' => '1-7/16-12 UN-2A',
                                'value' => '1-7/16-12 UN-2A',
                              ),
                              64 => 
                              array (
                                'key' => '1-11/16-12 UN-2A',
                                'value' => '1-11/16-12 UN-2A',
                              ),
                              65 => 
                              array (
                                'key' => '5/8-18 UNF-2A',
                                'value' => '5/8-18 UNF-2A',
                              ),
                              66 => 
                              array (
                                'key' => '1-1/16-14 UN-2A',
                                'value' => '1-1/16-14 UN-2A',
                              ),
                              67 => 
                              array (
                                'key' => '1-11-1/2 API API5B',
                                'value' => '1-11-1/2 API API5B',
                              ),
                              68 => 
                              array (
                                'key' => '1-1/4 11-1/2 API API5B',
                                'value' => '1-1/4 11-1/2 API API5B',
                              ),
                              69 => 
                              array (
                                'key' => '3-11-1/2 API API5B',
                                'value' => '3-11-1/2 API API5B',
                              ),
                              70 => 
                              array (
                                'key' => '1 1/16 - 12 UNC-2A',
                                'value' => '1 1/16 - 12 UNC-2A',
                              ),
                              71 => 
                              array (
                                'key' => '1 5/16 - 12 UNC-2A',
                                'value' => '1 5/16 - 12 UNC-2A',
                              ),
                              72 => 
                              array (
                                'key' => '1-11 1/2 NPTF CLASS 2',
                                'value' => '1-11 1/2 NPTF CLASS 2',
                              ),
                              73 => 
                              array (
                                'key' => '1 1/4-11 1/2 NPTF CLASS 2',
                                'value' => '1 1/4-11 1/2 NPTF CLASS 2',
                              ),
                              74 => 
                              array (
                                'key' => '2-11 1/2 NPTF CLASS 2',
                                'value' => '2-11 1/2 NPTF CLASS 2',
                              ),
                              75 => 
                              array (
                                'key' => 'G 1-1/4-11A',
                                'value' => 'G 1-1/4-11A',
                              ),
                              76 => 
                              array (
                                'key' => 'G 1-1/2-11A',
                                'value' => 'G 1-1/2-11A',
                              ),
                              77 => 
                              array (
                                'key' => '2-11 BSPT',
                                'value' => '2-11 BSPT',
                              ),
                              78 => 
                              array (
                                'key' => '2-11 1/2 NPTF',
                                'value' => '2-11 1/2 NPTF',
                              ),
                              79 => 
                              array (
                                'key' => '2-12 UN-2A',
                                'value' => '2-12 UN-2A',
                              ),
                              80 => 
                              array (
                                'key' => '?',
                                'value' => '?',
                              ),
                              81 => 
                              array (
                                'key' => '1/8-27 NPSM External 1/4-28 UNF Internal',
                                'value' => '1/8-27 NPSM External 1/4-28 UNF Internal',
                              ),
                              82 => 
                              array (
                                'key' => '1-18 UN-2A',
                                'value' => '1-18 UN-2A',
                              ),
                            ),
                             'defaultValue' => '',
                             'columnLength' => 150,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => 200,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => '',
                             'optionsProviderData' => '',
                          )),
                          2 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'StemHexinchDecimal',
                             'title' => 'Stem Hex inch Decimal',
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
                             'integer' => false,
                             'unsigned' => false,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          3 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'StemHexMM',
                             'title' => 'Stem Hex mm',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          4 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
                             'name' => 'StemRevDate',
                             'title' => 'Stem Rev Date',
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
                             'useCurrentDate' => false,
                             'columnType' => 'bigint(20)',
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
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'StemComponentSAPNumber',
                             'title' => 'Stem Component SAP Number',
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
                             'columnLength' => 150,
                             'regex' => '',
                             'regexFlags' => 
                            array (
                            ),
                             'unique' => false,
                             'showCharCount' => false,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          1 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                             'name' => 'StemComponentVendor',
                             'title' => 'Stem Component Vendor',
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
                                'key' => 'Experimental',
                                'value' => 'Experimental',
                              ),
                              1 => 
                              array (
                                'key' => 'V1',
                                'value' => 'V1',
                              ),
                              2 => 
                              array (
                                'key' => 'V2',
                                'value' => 'V2',
                              ),
                              3 => 
                              array (
                                'key' => 'V3',
                                'value' => 'V3',
                              ),
                              4 => 
                              array (
                                'key' => 'V4',
                                'value' => 'V4',
                              ),
                              5 => 
                              array (
                                'key' => 'V5',
                                'value' => 'V5',
                              ),
                              6 => 
                              array (
                                'key' => 'V6',
                                'value' => 'V6',
                              ),
                              7 => 
                              array (
                                'key' => 'V7',
                                'value' => 'V7',
                              ),
                              8 => 
                              array (
                                'key' => 'V8',
                                'value' => 'V8',
                              ),
                              9 => 
                              array (
                                'key' => 'V9',
                                'value' => 'V9',
                              ),
                            ),
                             'maxItems' => NULL,
                             'renderType' => 'tags',
                             'dynamicOptions' => false,
                             'defaultValue' => NULL,
                             'height' => '',
                             'width' => 200,
                             'defaultValueGenerator' => '',
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => '',
                             'optionsProviderData' => '',
                          )),
                          2 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'StemHexinchFraction',
                             'title' => 'Stem Hex inch Fraction',
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
                             'columnLength' => 150,
                             'regex' => '',
                             'regexFlags' => 
                            array (
                            ),
                             'unique' => false,
                             'showCharCount' => false,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          3 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'StemMaterial',
                             'title' => 'Stem Material',
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
                                'key' => '1215, 1045',
                                'value' => '1215, 1045',
                              ),
                              1 => 
                              array (
                                'key' => '316 STAINLESS',
                                'value' => '316 STAINLESS',
                              ),
                              2 => 
                              array (
                                'key' => '316 Stainless',
                                'value' => '316 Stainless',
                              ),
                              3 => 
                              array (
                                'key' => '4140',
                                'value' => '4140',
                              ),
                              4 => 
                              array (
                                'key' => '316',
                                'value' => '316',
                              ),
                              5 => 
                              array (
                                'key' => '1045, 1215',
                                'value' => '1045, 1215',
                              ),
                              6 => 
                              array (
                                'key' => '340 Brass',
                                'value' => '340 Brass',
                              ),
                              7 => 
                              array (
                                'key' => '360 BRASS',
                                'value' => '360 BRASS',
                              ),
                            ),
                             'defaultValue' => '',
                             'columnLength' => 150,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => 200,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => '',
                             'optionsProviderData' => '',
                          )),
                          4 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'StemRevisionNumber',
                             'title' => 'Stem Revision Number',
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
                             'columnLength' => 150,
                             'regex' => '',
                             'regexFlags' => 
                            array (
                            ),
                             'unique' => false,
                             'showCharCount' => false,
                             'width' => 200,
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
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
              3 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'FERRULE',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'FERRULE',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'FerruleComponentNumber',
                             'title' => 'Ferrule Component Number',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          1 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                             'name' => 'FerruleComponentVendor',
                             'title' => 'Ferrule Component Vendor',
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
                                'key' => 'Experimental',
                                'value' => 'Experimental',
                              ),
                              1 => 
                              array (
                                'key' => 'V1',
                                'value' => 'V1',
                              ),
                              2 => 
                              array (
                                'key' => 'V2',
                                'value' => 'V2',
                              ),
                              3 => 
                              array (
                                'key' => 'V3',
                                'value' => 'V3',
                              ),
                              4 => 
                              array (
                                'key' => 'V4',
                                'value' => 'V4',
                              ),
                              5 => 
                              array (
                                'key' => 'V5',
                                'value' => 'V5',
                              ),
                              6 => 
                              array (
                                'key' => 'V6',
                                'value' => 'V6',
                              ),
                              7 => 
                              array (
                                'key' => 'V7',
                                'value' => 'V7',
                              ),
                              8 => 
                              array (
                                'key' => 'V8',
                                'value' => 'V8',
                              ),
                              9 => 
                              array (
                                'key' => 'V9',
                                'value' => 'V9',
                              ),
                            ),
                             'maxItems' => NULL,
                             'renderType' => 'tags',
                             'dynamicOptions' => false,
                             'defaultValue' => NULL,
                             'height' => '',
                             'width' => 200,
                             'defaultValueGenerator' => '',
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => '',
                             'optionsProviderData' => '',
                          )),
                          2 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'FerruleMaterial',
                             'title' => 'Ferrule Material',
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
                                'key' => '1215, 1020',
                                'value' => '1215, 1020',
                              ),
                              1 => 
                              array (
                                'key' => '316L STAINLESS',
                                'value' => '316L STAINLESS',
                              ),
                              2 => 
                              array (
                                'key' => '316L STAINLESS STEEL',
                                'value' => '316L STAINLESS STEEL',
                              ),
                              3 => 
                              array (
                                'key' => '316L Stainless Steel',
                                'value' => '316L Stainless Steel',
                              ),
                              4 => 
                              array (
                                'key' => '316L',
                                'value' => '316L',
                              ),
                              5 => 
                              array (
                                'key' => '1215, 102',
                                'value' => '1215, 102',
                              ),
                              6 => 
                              array (
                                'key' => '340 Brass',
                                'value' => '340 Brass',
                              ),
                              7 => 
                              array (
                                'key' => '1215, 1045',
                                'value' => '1215, 1045',
                              ),
                              8 => 
                              array (
                                'key' => '316 Stainless Steel',
                                'value' => '316 Stainless Steel',
                              ),
                              9 => 
                              array (
                                'key' => '',
                                'value' => '',
                              ),
                            ),
                             'defaultValue' => '',
                             'columnLength' => 150,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => 200,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => '',
                             'optionsProviderData' => '',
                          )),
                          3 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'FerruleIDInDec',
                             'title' => 'Ferrule ID (in) Dec.',
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
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          4 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'FerruleODInDec',
                             'title' => 'Ferrule OD (in) Dec.',
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
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          5 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'FerruleLengthInDec',
                             'title' => 'Ferrule Length (in) Dec.',
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
                             'integer' => false,
                             'unsigned' => true,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          6 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
                             'name' => 'FerruleRevDate',
                             'title' => 'Ferrule Rev Date',
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
                             'useCurrentDate' => false,
                             'columnType' => 'bigint(20)',
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
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'FerruleComponentSAPNumber',
                             'title' => 'Ferrule Component SAP Number',
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
                             'columnLength' => 150,
                             'regex' => '',
                             'regexFlags' => 
                            array (
                            ),
                             'unique' => false,
                             'showCharCount' => false,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          1 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'FerruleRevisionNumber',
                             'title' => 'Ferrule Revision Number',
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
                             'columnLength' => 150,
                             'regex' => '',
                             'regexFlags' => 
                            array (
                            ),
                             'unique' => false,
                             'showCharCount' => false,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          2 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'FerruleIDMM',
                             'title' => 'Ferrule ID (mm)',
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
                             'integer' => false,
                             'unsigned' => false,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          3 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'FerruleODMM',
                             'title' => 'Ferrule OD (mm)',
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
                             'integer' => false,
                             'unsigned' => false,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          4 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'FerruleLengthMM',
                             'title' => 'Ferrule Length (mm)',
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
                             'integer' => false,
                             'unsigned' => false,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 200,
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
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
              4 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'SWIVEL NUT',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'SWIVEL NUT',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => 'margin-left:20px;',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'SwivelNutComponentNumber',
                             'title' => 'Swivel Nut Component Number',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          1 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'SwivelNutComponentThreadType',
                             'title' => 'Swivel Nut Component Thread Type',
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
                                'key' => 'G 3/8-19',
                                'value' => 'G 3/8-19',
                              ),
                              1 => 
                              array (
                                'key' => 'G 1/2-14',
                                'value' => 'G 1/2-14',
                              ),
                              2 => 
                              array (
                                'key' => 'G 3/4-14',
                                'value' => 'G 3/4-14',
                              ),
                              3 => 
                              array (
                                'key' => 'G 1/4-19',
                                'value' => 'G 1/4-19',
                              ),
                              4 => 
                              array (
                                'key' => 'G 5/8-14',
                                'value' => 'G 5/8-14',
                              ),
                              5 => 
                              array (
                                'key' => 'G 1-11',
                                'value' => 'G 1-11',
                              ),
                              6 => 
                              array (
                                'key' => 'G 1-1/4-11',
                                'value' => 'G 1-1/4-11',
                              ),
                              7 => 
                              array (
                                'key' => 'G 1-1/2-11',
                                'value' => 'G 1-1/2-11',
                              ),
                              8 => 
                              array (
                                'key' => 'G 2-11',
                                'value' => 'G 2-11',
                              ),
                              9 => 
                              array (
                                'key' => 'M16 X 1.5',
                                'value' => 'M16 X 1.5',
                              ),
                              10 => 
                              array (
                                'key' => 'M18 X 1.5',
                                'value' => 'M18 X 1.5',
                              ),
                              11 => 
                              array (
                                'key' => 'M20 X 1.5',
                                'value' => 'M20 X 1.5',
                              ),
                              12 => 
                              array (
                                'key' => 'M22 X 1.5',
                                'value' => 'M22 X 1.5',
                              ),
                              13 => 
                              array (
                                'key' => 'M24 X 1.5',
                                'value' => 'M24 X 1.5',
                              ),
                              14 => 
                              array (
                                'key' => 'M30 X 2.0',
                                'value' => 'M30 X 2.0',
                              ),
                              15 => 
                              array (
                                'key' => 'M36 X 2.0',
                                'value' => 'M36 X 2.0',
                              ),
                              16 => 
                              array (
                                'key' => 'M42 X 2.0',
                                'value' => 'M42 X 2.0',
                              ),
                              17 => 
                              array (
                                'key' => 'M52 X 2.0',
                                'value' => 'M52 X 2.0',
                              ),
                              18 => 
                              array (
                                'key' => 'M12 X 1.5',
                                'value' => 'M12 X 1.5',
                              ),
                              19 => 
                              array (
                                'key' => 'M14 X 1.5',
                                'value' => 'M14 X 1.5',
                              ),
                              20 => 
                              array (
                                'key' => 'M26 X 1.5',
                                'value' => 'M26 X 1.5',
                              ),
                              21 => 
                              array (
                                'key' => 'M45 X 2.0',
                                'value' => 'M45 X 2.0',
                              ),
                              22 => 
                              array (
                                'key' => '7/16-20 UNF 2B',
                                'value' => '7/16-20 UNF 2B',
                              ),
                              23 => 
                              array (
                                'key' => '3/8-24 UNF 2B',
                                'value' => '3/8-24 UNF 2B',
                              ),
                              24 => 
                              array (
                                'key' => '1/2-20 UNF 2B',
                                'value' => '1/2-20 UNF 2B',
                              ),
                              25 => 
                              array (
                                'key' => '9/16-18 UNF 2B',
                                'value' => '9/16-18 UNF 2B',
                              ),
                              26 => 
                              array (
                                'key' => '3/4-16 UNF 2B',
                                'value' => '3/4-16 UNF 2B',
                              ),
                              27 => 
                              array (
                                'key' => '7/8-14 UNF 2B',
                                'value' => '7/8-14 UNF 2B',
                              ),
                              28 => 
                              array (
                                'key' => '1-1/16-12 UN 2B',
                                'value' => '1-1/16-12 UN 2B',
                              ),
                              29 => 
                              array (
                                'key' => '1-5/16-12 UN 2B',
                                'value' => '1-5/16-12 UN 2B',
                              ),
                              30 => 
                              array (
                                'key' => '1-3/16-12 UN 2B',
                                'value' => '1-3/16-12 UN 2B',
                              ),
                              31 => 
                              array (
                                'key' => '1-5/8-12 UN 2B',
                                'value' => '1-5/8-12 UN 2B',
                              ),
                              32 => 
                              array (
                                'key' => '1-7/8-12 UN 2B',
                                'value' => '1-7/8-12 UN 2B',
                              ),
                              33 => 
                              array (
                                'key' => '2-1/2-12 UN 2B',
                                'value' => '2-1/2-12 UN 2B',
                              ),
                              34 => 
                              array (
                                'key' => 'G 1 1/4-11',
                                'value' => 'G 1 1/4-11',
                              ),
                              35 => 
                              array (
                                'key' => 'M30 X 1.5',
                                'value' => 'M30 X 1.5',
                              ),
                              36 => 
                              array (
                                'key' => 'M33 X 1.5',
                                'value' => 'M33 X 1.5',
                              ),
                              37 => 
                              array (
                                'key' => 'M36 X 1.5',
                                'value' => 'M36 X 1.5',
                              ),
                              38 => 
                              array (
                                'key' => 'M42 X 1.5',
                                'value' => 'M42 X 1.5',
                              ),
                              39 => 
                              array (
                                'key' => '1/4-18 NPFT CLASS 2',
                                'value' => '1/4-18 NPFT CLASS 2',
                              ),
                              40 => 
                              array (
                                'key' => '3/8-18 NPTF CLASS 2',
                                'value' => '3/8-18 NPTF CLASS 2',
                              ),
                              41 => 
                              array (
                                'key' => '1-11 1/2 NPTF CLASS 2',
                                'value' => '1-11 1/2 NPTF CLASS 2',
                              ),
                              42 => 
                              array (
                                'key' => '1/8-27 NPTF CLASS 2',
                                'value' => '1/8-27 NPTF CLASS 2',
                              ),
                              43 => 
                              array (
                                'key' => '1/4-18 NPTF CLASS 2',
                                'value' => '1/4-18 NPTF CLASS 2',
                              ),
                              44 => 
                              array (
                                'key' => '1/2-14 NPTF CLASS 2',
                                'value' => '1/2-14 NPTF CLASS 2',
                              ),
                              45 => 
                              array (
                                'key' => '3/4-14 NPTF CLASS 2',
                                'value' => '3/4-14 NPTF CLASS 2',
                              ),
                              46 => 
                              array (
                                'key' => '1/8-27 NPSM',
                                'value' => '1/8-27 NPSM',
                              ),
                              47 => 
                              array (
                                'key' => '1/4-18 NPSM',
                                'value' => '1/4-18 NPSM',
                              ),
                              48 => 
                              array (
                                'key' => '3/8-18 NPSM',
                                'value' => '3/8-18 NPSM',
                              ),
                              49 => 
                              array (
                                'key' => '1/2-14 NPSM',
                                'value' => '1/2-14 NPSM',
                              ),
                              50 => 
                              array (
                                'key' => '1/2-14 NPSM THREAD',
                                'value' => '1/2-14 NPSM THREAD',
                              ),
                              51 => 
                              array (
                                'key' => '3/4-14 NPSM',
                                'value' => '3/4-14 NPSM',
                              ),
                              52 => 
                              array (
                                'key' => '1-11 1/2 NPSM',
                                'value' => '1-11 1/2 NPSM',
                              ),
                              53 => 
                              array (
                                'key' => '1 1/4-11 1/2 NPSM',
                                'value' => '1 1/4-11 1/2 NPSM',
                              ),
                              54 => 
                              array (
                                'key' => '7/16-20 UNF 2A',
                                'value' => '7/16-20 UNF 2A',
                              ),
                              55 => 
                              array (
                                'key' => '9/16-18 UNF 2A',
                                'value' => '9/16-18 UNF 2A',
                              ),
                              56 => 
                              array (
                                'key' => '3/4-16 UNF 2A',
                                'value' => '3/4-16 UNF 2A',
                              ),
                              57 => 
                              array (
                                'key' => '7/8-14 UNF 2A',
                                'value' => '7/8-14 UNF 2A',
                              ),
                              58 => 
                              array (
                                'key' => '1-1/16-12 UN 2A',
                                'value' => '1-1/16-12 UN 2A',
                              ),
                              59 => 
                              array (
                                'key' => '9/16-18 UNF-2A',
                                'value' => '9/16-18 UNF-2A',
                              ),
                              60 => 
                              array (
                                'key' => '1/2-20 UNF 2A',
                                'value' => '1/2-20 UNF 2A',
                              ),
                              61 => 
                              array (
                                'key' => '11/16-16 UN 2B',
                                'value' => '11/16-16 UN 2B',
                              ),
                              62 => 
                              array (
                                'key' => '13/16-16 UN 2B',
                                'value' => '13/16-16 UN 2B',
                              ),
                              63 => 
                              array (
                                'key' => '1-14 UNS 2B',
                                'value' => '1-14 UNS 2B',
                              ),
                              64 => 
                              array (
                                'key' => '1-7/16-12 UN 2B',
                                'value' => '1-7/16-12 UN 2B',
                              ),
                              65 => 
                              array (
                                'key' => '1-11/16-12 UN 2B',
                                'value' => '1-11/16-12 UN 2B',
                              ),
                              66 => 
                              array (
                                'key' => '2-12 UN 2B',
                                'value' => '2-12 UN 2B',
                              ),
                              67 => 
                              array (
                                'key' => '9/16-24 UNEF 2B',
                                'value' => '9/16-24 UNEF 2B',
                              ),
                              68 => 
                              array (
                                'key' => '5/8-18 UNF 2B',
                                'value' => '5/8-18 UNF 2B',
                              ),
                              69 => 
                              array (
                                'key' => '1-1/16-14 UNS 2B',
                                'value' => '1-1/16-14 UNS 2B',
                              ),
                              70 => 
                              array (
                                'key' => '3/8-24 2A THREAD',
                                'value' => '3/8-24 2A THREAD',
                              ),
                              71 => 
                              array (
                                'key' => '7/16-24 2A THREAD',
                                'value' => '7/16-24 2A THREAD',
                              ),
                              72 => 
                              array (
                                'key' => '1/2-20 2A THREAD',
                                'value' => '1/2-20 2A THREAD',
                              ),
                              73 => 
                              array (
                                'key' => '5/8-18 2A THREAD',
                                'value' => '5/8-18 2A THREAD',
                              ),
                              74 => 
                              array (
                                'key' => '11/16-18 2A THREAD',
                                'value' => '11/16-18 2A THREAD',
                              ),
                              75 => 
                              array (
                                'key' => '3/4-18 2A THREAD',
                                'value' => '3/4-18 2A THREAD',
                              ),
                              76 => 
                              array (
                                'key' => '7/8-18 2A THREAD',
                                'value' => '7/8-18 2A THREAD',
                              ),
                              77 => 
                              array (
                                'key' => '2-11 UN 2B',
                                'value' => '2-11 UN 2B',
                              ),
                              78 => 
                              array (
                                'key' => '7/8-16 UNF 2B',
                                'value' => '7/8-16 UNF 2B',
                              ),
                              79 => 
                              array (
                                'key' => '9/16-20 UNF 2B',
                                'value' => '9/16-20 UNF 2B',
                              ),
                              80 => 
                              array (
                                'key' => '5/8-16 UNF 2B',
                                'value' => '5/8-16 UNF 2B',
                              ),
                              81 => 
                              array (
                                'key' => 'G1-1/2-11',
                                'value' => 'G1-1/2-11',
                              ),
                              82 => 
                              array (
                                'key' => '2-12 UN-2B',
                                'value' => '2-12 UN-2B',
                              ),
                            ),
                             'defaultValue' => '',
                             'columnLength' => 150,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => 200,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => '',
                             'optionsProviderData' => '',
                          )),
                          2 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'SwivelNutHexinchFraction',
                             'title' => 'Swivel Nut Hex inch Fraction',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          3 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'SwivelNutMaterial',
                             'title' => 'Swivel Nut Material',
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
                                'key' => '22 MM HEX',
                                'value' => '22 MM HEX',
                              ),
                              1 => 
                              array (
                                'key' => '27 MM HEX',
                                'value' => '27 MM HEX',
                              ),
                              2 => 
                              array (
                                'key' => '32 MM HEX',
                                'value' => '32 MM HEX',
                              ),
                              3 => 
                              array (
                                'key' => '19 MM HEX',
                                'value' => '19 MM HEX',
                              ),
                              4 => 
                              array (
                                'key' => '38 MM HEX',
                                'value' => '38 MM HEX',
                              ),
                              5 => 
                              array (
                                'key' => '50 MM HEX',
                                'value' => '50 MM HEX',
                              ),
                              6 => 
                              array (
                                'key' => '55 MM HEX',
                                'value' => '55 MM HEX',
                              ),
                              7 => 
                              array (
                                'key' => '70 MM HEX',
                                'value' => '70 MM HEX',
                              ),
                              8 => 
                              array (
                                'key' => '24 MM HEX',
                                'value' => '24 MM HEX',
                              ),
                              9 => 
                              array (
                                'key' => '30 MM HEX',
                                'value' => '30 MM HEX',
                              ),
                              10 => 
                              array (
                                'key' => '36 MM HEX',
                                'value' => '36 MM HEX',
                              ),
                              11 => 
                              array (
                                'key' => '46 MM HEX',
                                'value' => '46 MM HEX',
                              ),
                              12 => 
                              array (
                                'key' => '60 MM HEX',
                                'value' => '60 MM HEX',
                              ),
                              13 => 
                              array (
                                'key' => '14 MM HEX',
                                'value' => '14 MM HEX',
                              ),
                              14 => 
                              array (
                                'key' => '17 MM HEX',
                                'value' => '17 MM HEX',
                              ),
                              15 => 
                              array (
                                'key' => '1215',
                                'value' => '1215',
                              ),
                              16 => 
                              array (
                                'key' => '19 MM',
                                'value' => '19 MM',
                              ),
                              17 => 
                              array (
                                'key' => '27 MM HEX STAINLESS',
                                'value' => '27 MM HEX STAINLESS',
                              ),
                              18 => 
                              array (
                                'key' => '41 MM HEX',
                                'value' => '41 MM HEX',
                              ),
                              19 => 
                              array (
                                'key' => '5/8 HEX',
                                'value' => '5/8 HEX',
                              ),
                              20 => 
                              array (
                                'key' => '5/8 HEX STAINLESS STEEL',
                                'value' => '5/8 HEX STAINLESS STEEL',
                              ),
                              21 => 
                              array (
                                'key' => '19 MM HEX STAINLESS STEEL',
                                'value' => '19 MM HEX STAINLESS STEEL',
                              ),
                              22 => 
                              array (
                                'key' => '25 MM HEX',
                                'value' => '25 MM HEX',
                              ),
                              23 => 
                              array (
                                'key' => '25 MM HEX STAINLESS STEEL',
                                'value' => '25 MM HEX STAINLESS STEEL',
                              ),
                              24 => 
                              array (
                                'key' => '27 MM HEX STAINLESS STEEL',
                                'value' => '27 MM HEX STAINLESS STEEL',
                              ),
                              25 => 
                              array (
                                'key' => '32 MM HEX STAINLESS STEEL',
                                'value' => '32 MM HEX STAINLESS STEEL',
                              ),
                              26 => 
                              array (
                                'key' => '38 MM HEX STAINLESS STEEL',
                                'value' => '38 MM HEX STAINLESS STEEL',
                              ),
                              27 => 
                              array (
                                'key' => '50 MM HEX STAINLESS STEEL',
                                'value' => '50 MM HEX STAINLESS STEEL',
                              ),
                              28 => 
                              array (
                                'key' => '55 MM HEX STAINLESS STEEL',
                                'value' => '55 MM HEX STAINLESS STEEL',
                              ),
                              29 => 
                              array (
                                'key' => '75 MM HEX',
                                'value' => '75 MM HEX',
                              ),
                              30 => 
                              array (
                                'key' => '70 MM HEX STAINLESS STEEL',
                                'value' => '70 MM HEX STAINLESS STEEL',
                              ),
                              31 => 
                              array (
                                'key' => '75MM HEX 1045',
                                'value' => ' 1215',
                              ),
                              32 => 
                              array (
                                'key' => '16 MM HEX',
                                'value' => '16 MM HEX',
                              ),
                              33 => 
                              array (
                                'key' => '17 MM HEX STANLESS STEEL',
                                'value' => '17 MM HEX STANLESS STEEL',
                              ),
                              34 => 
                              array (
                                'key' => '22 MM HEX STAINLESS STEEL',
                                'value' => '22 MM HEX STAINLESS STEEL',
                              ),
                              35 => 
                              array (
                                'key' => '41 MM HEX STAINLESS STEEL',
                                'value' => '41 MM HEX STAINLESS STEEL',
                              ),
                              36 => 
                              array (
                                'key' => '22 HEX',
                                'value' => '22 HEX',
                              ),
                              37 => 
                              array (
                                'key' => '17MM',
                                'value' => '17MM',
                              ),
                              38 => 
                              array (
                                'key' => '22MM',
                                'value' => '22MM',
                              ),
                              39 => 
                              array (
                                'key' => '25MM',
                                'value' => '25MM',
                              ),
                              40 => 
                              array (
                                'key' => '32MM',
                                'value' => '32MM',
                              ),
                              41 => 
                              array (
                                'key' => '58 MM HEX',
                                'value' => '58 MM HEX',
                              ),
                              42 => 
                              array (
                                'key' => '14 HEX',
                                'value' => '14 HEX',
                              ),
                              43 => 
                              array (
                                'key' => '24 HEX',
                                'value' => '24 HEX',
                              ),
                              44 => 
                              array (
                                'key' => '44 MM HEX',
                                'value' => '44 MM HEX',
                              ),
                              45 => 
                              array (
                                'key' => '55MM HEX',
                                'value' => '55MM HEX',
                              ),
                              46 => 
                              array (
                                'key' => '30MM HEX',
                                'value' => '30MM HEX',
                              ),
                              47 => 
                              array (
                                'key' => '60MM HEX',
                                'value' => '60MM HEX',
                              ),
                              48 => 
                              array (
                                'key' => '46 MM HEX STAINLESS STEEL',
                                'value' => '46 MM HEX STAINLESS STEEL',
                              ),
                              49 => 
                              array (
                                'key' => '22MM HEX',
                                'value' => '22MM HEX',
                              ),
                              50 => 
                              array (
                                'key' => '9/16 HEX',
                                'value' => '9/16 HEX',
                              ),
                              51 => 
                              array (
                                'key' => '24 MM HEX STAINLESS STEEL',
                                'value' => '24 MM HEX STAINLESS STEEL',
                              ),
                              52 => 
                              array (
                                'key' => '60 MM HEX STAINLESS STEEL',
                                'value' => '60 MM HEX STAINLESS STEEL',
                              ),
                              53 => 
                              array (
                                'key' => '17.4 MM HEX',
                                'value' => '17.4 MM HEX',
                              ),
                              54 => 
                              array (
                                'key' => '22.2 MM HEX',
                                'value' => '22.2 MM HEX',
                              ),
                              55 => 
                              array (
                                'key' => '15/16 HEX',
                                'value' => '15/16 HEX',
                              ),
                            ),
                             'defaultValue' => '',
                             'columnLength' => 150,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => 200,
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => '',
                             'optionsProviderData' => '',
                          )),
                          4 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'SwivelNutRevisionNumber',
                             'title' => 'Swivel Nut Revision Number',
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
                             'width' => 200,
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
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'SwivelNutComponentSAPNumber',
                             'title' => 'Swivel Nut Component SAP Number',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-left:20px;',
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
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          1 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                             'name' => 'SwivelNutComponentVendor',
                             'title' => 'Swivel Nut Component Vendor',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-left:20px;',
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
                                'key' => 'Experimental',
                                'value' => 'Experimental',
                              ),
                              1 => 
                              array (
                                'key' => 'V1',
                                'value' => 'V1',
                              ),
                              2 => 
                              array (
                                'key' => 'V2',
                                'value' => 'V2',
                              ),
                              3 => 
                              array (
                                'key' => 'V3',
                                'value' => 'V3',
                              ),
                              4 => 
                              array (
                                'key' => 'V4',
                                'value' => 'V4',
                              ),
                              5 => 
                              array (
                                'key' => 'V5',
                                'value' => 'V5',
                              ),
                              6 => 
                              array (
                                'key' => 'V6',
                                'value' => 'V6',
                              ),
                              7 => 
                              array (
                                'key' => 'V7',
                                'value' => 'V7',
                              ),
                              8 => 
                              array (
                                'key' => 'V8',
                                'value' => 'V8',
                              ),
                              9 => 
                              array (
                                'key' => 'V9',
                                'value' => 'V9',
                              ),
                            ),
                             'maxItems' => NULL,
                             'renderType' => 'tags',
                             'dynamicOptions' => false,
                             'defaultValue' => NULL,
                             'height' => '',
                             'width' => 200,
                             'defaultValueGenerator' => '',
                             'optionsProviderType' => NULL,
                             'optionsProviderClass' => '',
                             'optionsProviderData' => '',
                          )),
                          2 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                             'name' => 'SwivelNutinchDecimal',
                             'title' => 'Swivel Nut inch Decimal',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-left:20px;',
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
                             'integer' => false,
                             'unsigned' => false,
                             'minValue' => NULL,
                             'maxValue' => NULL,
                             'unique' => false,
                             'decimalSize' => NULL,
                             'decimalPrecision' => NULL,
                             'width' => 200,
                             'defaultValueGenerator' => '',
                          )),
                          3 => 
                          \Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
                             'name' => 'SwivelNutRevDate',
                             'title' => 'Swivel Nut Rev Date',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-left:20px;',
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
                             'useCurrentDate' => false,
                             'columnType' => 'bigint(20)',
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
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 100,
                 'labelAlign' => 'left',
              )),
              5 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'THRUST WIRE',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'THRUST WIRE',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'ThrustWireComponentNumber',
                     'title' => 'Thrust Wire Component Number',
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
                     'width' => 200,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'ThrustWireMaterial',
                     'title' => 'Thrust Wire Material',
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
                        'key' => '304 STAINLESS STEEL',
                        'value' => '304 STAINLESS STEEL',
                      ),
                    ),
                     'defaultValue' => '',
                     'columnLength' => 150,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                     'width' => 200,
                     'optionsProviderType' => NULL,
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                  )),
                  2 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'ThrustWireRevisionNumber',
                     'title' => 'Thrust Wire Revision Number',
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
                     'width' => 200,
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
                 'icon' => '',
                 'labelWidth' => 200,
                 'labelAlign' => 'left',
              )),
              6 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'O-RING',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'O-RING',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'O-RING',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => true,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'ORingBOMSAPNumber',
                                 'title' => 'O-Ring BOM SAP Number',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'ORingComponentSAPNumber',
                                 'title' => 'O-Ring Component SAP Number',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'name' => 'ORingMaterial',
                                 'title' => 'O-Ring Material',
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
                                    'key' => 'NBR',
                                    'value' => 'NBR',
                                  ),
                                ),
                                 'defaultValue' => '',
                                 'columnLength' => 150,
                                 'dynamicOptions' => false,
                                 'defaultValueGenerator' => '',
                                 'width' => 200,
                                 'optionsProviderType' => NULL,
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'ORingIDInDec',
                                 'title' => 'O-Ring ID (in) Dec.',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              4 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'ORingThicknessInDec',
                                 'title' => 'O-Ring Thickness (in) Dec.',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'ORingComponentNumber',
                                 'title' => 'O-Ring Component Number',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                 'name' => 'ORingComponentVendor',
                                 'title' => 'O-Ring Component Vendor',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                    'key' => 'Parker',
                                    'value' => 'Parker',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'NOK',
                                    'value' => 'NOK',
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'Dichtomatic',
                                    'value' => 'Dichtomatic',
                                  ),
                                  3 => 
                                  array (
                                    'key' => 'Sterling Seal',
                                    'value' => 'Sterling Seal',
                                  ),
                                ),
                                 'maxItems' => NULL,
                                 'renderType' => 'tags',
                                 'dynamicOptions' => false,
                                 'defaultValue' => NULL,
                                 'height' => '',
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                                 'optionsProviderType' => NULL,
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'ORingRevisionNumber',
                                 'title' => 'O-Ring Revision Number',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              3 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'ORingIDMM',
                                 'title' => 'O-Ring ID (mm)',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              4 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'name' => 'ORingThicknessMM',
                                 'title' => 'O-Ring Thickness (mm)',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'integer' => false,
                                 'unsigned' => false,
                                 'minValue' => NULL,
                                 'maxValue' => NULL,
                                 'unique' => false,
                                 'decimalSize' => NULL,
                                 'decimalPrecision' => NULL,
                                 'width' => 200,
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
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'INTERNAL O-RING',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => true,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'InternalORingComponentNumber',
                                 'title' => 'Internal O-Ring Component Number',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'InternalORingSAPNumber',
                                 'title' => 'Internal O-Ring SAP Number',
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
                                 'width' => 200,
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'InternalORingRev',
                                 'title' => 'Internal O-Ring Rev',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                 'name' => 'InternalORingVendor',
                                 'title' => 'Internal O-Ring Vendor',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                    'key' => 'Parker',
                                    'value' => 'Parker',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'NOK',
                                    'value' => 'NOK',
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'Dichtomatic',
                                    'value' => 'Dichtomatic',
                                  ),
                                  3 => 
                                  array (
                                    'key' => 'Sterling Seal',
                                    'value' => 'Sterling Seal',
                                  ),
                                ),
                                 'maxItems' => NULL,
                                 'renderType' => 'tags',
                                 'dynamicOptions' => false,
                                 'defaultValue' => NULL,
                                 'height' => '',
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                                 'optionsProviderType' => NULL,
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
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
                     'labelWidth' => 200,
                     'labelAlign' => 'left',
                  )),
                  2 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'BACK-UP O-RING',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => true,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                 'name' => 'BackUpORingComponentVendor',
                                 'title' => 'Back Up O-Ring Component Vendor',
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
                                    'key' => 'Parker',
                                    'value' => 'Parker',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'NOK',
                                    'value' => 'NOK',
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'Dichtomatic',
                                    'value' => 'Dichtomatic',
                                  ),
                                  3 => 
                                  array (
                                    'key' => 'Sterling Seal',
                                    'value' => 'Sterling Seal',
                                  ),
                                ),
                                 'maxItems' => NULL,
                                 'renderType' => 'tags',
                                 'dynamicOptions' => false,
                                 'defaultValue' => NULL,
                                 'height' => '',
                                 'width' => 200,
                                 'defaultValueGenerator' => '',
                                 'optionsProviderType' => NULL,
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                              )),
                              1 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'name' => 'BackUpORingMaterial',
                                 'title' => 'Back Up O-Ring Material',
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
                                    'key' => 'Teflon',
                                    'value' => 'Teflon',
                                  ),
                                ),
                                 'defaultValue' => '',
                                 'columnLength' => 150,
                                 'dynamicOptions' => false,
                                 'defaultValueGenerator' => '',
                                 'width' => 200,
                                 'optionsProviderType' => NULL,
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                              )),
                              2 => 
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'BackUpORingSAPNumber',
                                 'title' => 'Back Up O-Ring SAP Number',
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
                                 'width' => 200,
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
                          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
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
                              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'BackUpORingComponentNumber',
                                 'title' => 'Back Up O-Ring Component Number',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => 200,
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
                 'icon' => '',
                 'labelWidth' => 200,
                 'labelAlign' => 'left',
              )),
              7 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'SLIP NUT RETAINING RING',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'SLIP NUT RETAINING RING',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'SlipNutRetainingRingComponentNumber',
                     'title' => 'Slip Nut Retaining Ring Component Number',
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
                     'width' => 200,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'SlipNutRetainingRingComponentVendor',
                     'title' => 'Slip Nut Retaining Ring Component Vendor',
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
                        'key' => 'MICROPLASTICS',
                        'value' => 'MICROPLASTICS',
                      ),
                      1 => 
                      array (
                        'key' => '',
                        'value' => '',
                      ),
                    ),
                     'maxItems' => NULL,
                     'renderType' => 'tags',
                     'dynamicOptions' => false,
                     'defaultValue' => NULL,
                     'height' => '',
                     'width' => 200,
                     'defaultValueGenerator' => '',
                     'optionsProviderType' => NULL,
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                  )),
                  2 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'SlipNutRetainingRingMaterial',
                     'title' => 'SlipNutRetainingRing Material',
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
                        'key' => 'HS NYLON 6 NATURAL',
                        'value' => 'HS NYLON 6 NATURAL',
                      ),
                    ),
                     'defaultValue' => '',
                     'columnLength' => 150,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                     'width' => 200,
                     'optionsProviderType' => NULL,
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                  )),
                  3 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'BackUpORingRevisionNumber',
                     'title' => 'Back Up O-Ring Revision Number',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:20px;',
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
                     'width' => 200,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'SlipNutRetainingRingSAPComponentNumber',
                     'title' => 'Slip Nut Retaining Ring SAP Component Number',
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
                     'width' => 200,
                     'defaultValueGenerator' => '',
                  )),
                  5 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'SlipNutRevisionNumber',
                     'title' => 'Slip Nut Revision Number',
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
                     'width' => 200,
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
                 'icon' => '',
                 'labelWidth' => 200,
                 'labelAlign' => 'left',
              )),
              8 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'THREAD PROTECTOR',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'THREAD PROTECTOR',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'ThreadProtectorComponentNumber',
                     'title' => 'Thread Protector Component Number',
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
                     'width' => 200,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                     'name' => 'ThreadProtectorComponentVendor',
                     'title' => 'Thread Protector Component Vendor',
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
                        'key' => 'Continental',
                        'value' => 'Continental',
                      ),
                    ),
                     'maxItems' => NULL,
                     'renderType' => 'tags',
                     'dynamicOptions' => false,
                     'defaultValue' => NULL,
                     'height' => '',
                     'width' => 200,
                     'defaultValueGenerator' => '',
                     'optionsProviderType' => NULL,
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                  )),
                  2 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'ThreadProtectorMaterial',
                     'title' => 'Thread Protector Material',
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
                        'key' => 'Steel',
                        'value' => 'Steel',
                      ),
                      1 => 
                      array (
                        'key' => 'Stainless Steel',
                        'value' => 'Stainless Steel',
                      ),
                      2 => 
                      array (
                        'key' => 'Brass',
                        'value' => 'Brass',
                      ),
                    ),
                     'defaultValue' => '',
                     'columnLength' => 150,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                     'width' => 200,
                     'optionsProviderType' => NULL,
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                  )),
                  3 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'ThreadProtectorRevisionNumber',
                     'title' => 'Thread Protector Revision Number',
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
                     'width' => 200,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'ThreadProtectorSAPComponentNumber',
                     'title' => 'Thread Protector SAP Component Number',
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
                     'width' => 200,
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
                 'icon' => '',
                 'labelWidth' => 240,
                 'labelAlign' => 'left',
              )),
              9 => 
              \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'PACKAGING',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'PACKAGING',
                 'width' => 0,
                 'height' => 0,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'PackagingBoxSize',
                     'title' => 'Packaging Box Size',
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
                        'key' => 'Box 2',
                        'value' => 'Box 2',
                      ),
                      1 => 
                      array (
                        'key' => 'Box 3',
                        'value' => 'Box 3',
                      ),
                      2 => 
                      array (
                        'key' => 'Box 4',
                        'value' => 'Box 4',
                      ),
                      3 => 
                      array (
                        'key' => 'Box 5',
                        'value' => 'Box 5',
                      ),
                    ),
                     'defaultValue' => '',
                     'columnLength' => 150,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                     'width' => 200,
                     'optionsProviderType' => NULL,
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                  )),
                  1 => 
                  \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'PackagingQuantityPerBox',
                     'title' => 'Packaging Quantity Per Box',
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
                     'width' => 200,
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
                 'icon' => '',
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
      'classname' => 'Product',
      'fieldname' => 'Fert',
    ),
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
