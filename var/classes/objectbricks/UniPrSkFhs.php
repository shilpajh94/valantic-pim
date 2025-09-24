<?php

/**
 * Fields Summary:
 * - outsideDiameterMetric [numeric]
 * - insideDiameterMetric [numeric]
 * - vacuumMetric [numeric]
 * - tubeGaugeMetric [numeric]
 * - bendRadiusMetric [numeric]
 * - outsideDiameterInnerHoseMetric [numeric]
 * - insideDiameterInnerHoseMetric [numeric]
 * - insideDiameterFractionInnerHoseImperial [numeric]
 * - outsideDiameterImperial [numeric]
 * - insideDiameterImperial [numeric]
 * - vacuumImperial [numeric]
 * - tubeGaugeImperial [numeric]
 * - bendRadiusImperial [numeric]
 * - outsideDiameterInnerHoseImperial [numeric]
 * - insideDiameterInnerHoseImperial [numeric]
 * - insideDiameterFractionImperial [numeric]
 * - minimumBurstPressureMpa [numeric]
 * - workingPressureMpa [numeric]
 * - workingPressureBar [numeric]
 * - minimumBurstPressurePsi [numeric]
 * - workingPressurePsi [numeric]
 * - hoseDashSizeHyd [numeric]
 * - negativePositiveTolerance [select]
 * - ratingsFlexibility [select]
 * - temperatureRatings [input]
 * - notesTemperature [input]
 * - isJustTemporarily [checkbox]
 * - temperatureMax [quantityValueRange]
 * - temporaryUntilC [numeric]
 * - dampableUntil1C [numeric]
 * - dampableUntil2C [numeric]
 * - pressureUntil [quantityValue]
 * - temperatureMin [quantityValueRange]
 * - temporaryUntilT [numeric]
 * - dampableUntil1T [numeric]
 * - dampableUntil2T [numeric]
 * - isOnlyOpenSystem [checkbox]
 * - localizedfields [localizedfields]
 * -- headlineWeb [input]
 * -- flowMediumStabilityFlag [input]
 * -- supplementaryDeclarations [input]
 * -- easyPack [input]
 * -- methodOfCalculation [textarea]
 * -- flameRetardant [textarea]
 * -- declarationsResistanceToChlorine [input]
 * -- declarationsResistanceToCrushing [input]
 * -- declarationsAntiUv [input]
 * -- declarationsResistanceToAbrasion [input]
 * -- declarationsResistanceToMould [input]
 * -- declarationsFlexibility [textarea]
 * -- conductive [textarea]
 * -- caution [textarea]
 * -- atex [input]
 * -- antistatic [input]
 * -- siliconFree [input]
 * -- phtalateFree [input]
 * -- forFood2 [textarea]
 * -- flameRetardant2 [textarea]
 * -- declarationsResistanceToTear [input]
 * -- declarationsResistanceToPerforation [input]
 * -- declarationsSmoothSurface [input]
 * -- declarationsResistanceToOzone [input]
 * -- resistanceToChemicals [input]
 * -- resistanceToHydrolysis [textarea]
 * -- resistanceToMicrorganisms [input]
 * -- wasteWater [input]
 * -- trgsHomologation [input]
 * -- compressionLoad [textarea]
 * -- calibratedDiameters [input]
 * -- puType [input]
 * -- ophtalateFree [input]
 * -- halogenFree [input]
 * -- forFood [textarea]
 * - ratingsResistanceToAbrasion [select]
 * - ratingsResistanceToTear [select]
 * - ratingsAntiUv [select]
 * - ratingsResistanceToChlorine [select]
 * - ratingsResistanceToCrushing [select]
 * - ratingsResistanceToMould [select]
 * - ratingsResistanceToPerforation [select]
 * - ratingsSmoothSurface [select]
 * - ratingsResistanceToOzone [select]
 */

return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'dao' => NULL,
   'key' => 'UniPrSkFhs',
   'parentClass' => 'App\\Model\\DataObject\\UniProductManagement\\Objectbrick\\AbstractUniPrSkeleton',
   'implementsInterfaces' => '',
   'title' => 'Skeleton FHS Data',
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
                 'collapsible' => true,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                     'name' => 'Metric Values',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => NULL,
                     'width' => 525,
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'outsideDiameterMetric',
                         'title' => 'Outside Diameter (mm)',
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
                         'name' => 'insideDiameterMetric',
                         'title' => 'Inside Diameter (mm)',
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
                         'name' => 'vacuumMetric',
                         'title' => 'Vacuum (mm)',
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
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'tubeGaugeMetric',
                         'title' => 'Tube Gauge (mm) / Wall Thickness',
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
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'bendRadiusMetric',
                         'title' => 'Bend Radius (mm)',
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
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'outsideDiameterInnerHoseMetric',
                         'title' => 'Outside Diameter (mm) - (Inner Hose)',
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
                      6 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'insideDiameterInnerHoseMetric',
                         'title' => 'Inside Diameter (mm ) - (Inner Hose)',
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
                      7 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'insideDiameterFractionInnerHoseImperial',
                         'title' => 'Inside Diameter (Fraction) - (Inner Hose)',
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
                     'name' => 'Imperial Values',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => NULL,
                     'width' => 0,
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'outsideDiameterImperial',
                         'title' => 'Outside Diameter (in)',
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
                         'name' => 'insideDiameterImperial',
                         'title' => 'Inside Diameter (in)',
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
                         'name' => 'vacuumImperial',
                         'title' => 'Vacuum (in)',
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
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'tubeGaugeImperial',
                         'title' => 'Tube Gauge (in)  / Wall Thickness',
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
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'bendRadiusImperial',
                         'title' => 'Bend Radius (in)',
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
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'outsideDiameterInnerHoseImperial',
                         'title' => 'Outside Diameter (in) - (Inner Hose)',
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
                      6 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'insideDiameterInnerHoseImperial',
                         'title' => 'Inside Diameter (in) - (Inner Hose)',
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
                      7 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'insideDiameterFractionImperial',
                         'title' => 'Inside Diameter (Fraction)',
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
                 'labelWidth' => 250,
                 'labelAlign' => 'left',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                 'name' => 'Pressure Values',
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
                     'name' => 'Metric Values',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => NULL,
                     'width' => 525,
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'minimumBurstPressureMpa',
                         'title' => 'Minimum Burst Pressure (MPa)',
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
                         'name' => 'workingPressureMpa',
                         'title' => 'Working Pressure (MPa)',
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
                         'name' => 'workingPressureBar',
                         'title' => 'Working Pressure (bar)',
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
                     'name' => 'Imperial Values',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'minimumBurstPressurePsi',
                         'title' => 'Minimum Burst Pressure (PSI)',
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
                         'name' => 'workingPressurePsi',
                         'title' => 'Working Pressure (PSI)',
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
                 'labelWidth' => 250,
                 'labelAlign' => 'left',
              )),
              2 => 
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                     'name' => 'hoseDashSizeHyd',
                     'title' => 'Hose Dash Size (HYD)',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                     'name' => 'negativePositiveTolerance',
                     'title' => 'Negative / PositiveTolerance',
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
                     'options' => 
                    array (
                      0 => 
                      array (
                        'key' => 'Yes',
                        'value' => 'yes',
                      ),
                      1 => 
                      array (
                        'key' => 'No',
                        'value' => 'no',
                      ),
                    ),
                     'defaultValue' => '',
                     'columnLength' => 190,
                     'dynamicOptions' => false,
                     'defaultValueGenerator' => '',
                     'width' => 250,
                     'optionsProviderType' => 'configure',
                     'optionsProviderClass' => '',
                     'optionsProviderData' => '',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                     'name' => 'Ratings',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'name' => 'ratingsFlexibility',
                         'title' => 'Flexibility',
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
                         'defaultValue' => '',
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => 250,
                         'optionsProviderType' => 'select_options',
                         'optionsProviderClass' => 'Pimcore\\Bundle\\CoreBundle\\OptionsProvider\\SelectOptionsOptionsProvider',
                         'optionsProviderData' => 'UniPrFhsRatings',
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'fieldcontainer',
                     'layout' => 'hbox',
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
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/twemoji/1f6e0.svg',
             'labelWidth' => 250,
             'labelAlign' => 'left',
          )),
          1 => 
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'temperatureRatings',
                     'title' => 'Temperature Ratings / Applications',
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'notesTemperature',
                     'title' => 'Notes Temperature',
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'isJustTemporarily',
                     'title' => 'just "temporarily"',
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
                     'width' => 700,
                     'height' => '',
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValueRange::__set_state(array(
                         'name' => 'temperatureMax',
                         'title' => 'Temperature (max)',
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
                          0 => 'temperature_C',
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'width' => 250,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'temporaryUntilC',
                         'title' => 'Temporary until (°C)',
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
                         'name' => 'dampableUntil1C',
                         'title' => 'Dampable until 1 (°C)',
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
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'dampableUntil2C',
                         'title' => 'Dampable until 2 (°C)',
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
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                         'name' => 'pressureUntil',
                         'title' => 'Pressure Until',
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
                          0 => 'pressure_Pa',
                        ),
                         'unique' => false,
                         'autoConvert' => false,
                         'defaultValueGenerator' => '',
                         'width' => 250,
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
                     'labelWidth' => 250,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValueRange::__set_state(array(
                         'name' => 'temperatureMin',
                         'title' => 'Temperature (min)',
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
                          0 => 'temperature_C',
                        ),
                         'decimalPrecision' => NULL,
                         'autoConvert' => false,
                         'width' => 250,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'temporaryUntilT',
                         'title' => 'Temporary until (t)',
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
                         'name' => 'dampableUntil1T',
                         'title' => 'Dampable until 1 (t)',
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
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'dampableUntil2T',
                         'title' => 'Dampable until 2 (°C)',
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/self_service_kiosk.svg',
             'labelWidth' => 250,
             'labelAlign' => 'left',
          )),
          2 => 
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
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Temperature data',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Temperature data',
                 'width' => '',
                 'height' => '',
                 'collapsible' => true,
                 'collapsed' => false,
                 'bodyStyle' => '',
                 'datatype' => 'layout',
                 'children' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                     'name' => 'isOnlyOpenSystem',
                     'title' => 'Only Open System',
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
                 'icon' => '',
                 'labelWidth' => 250,
                 'labelAlign' => 'left',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Ratings',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Ratings',
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
                         'name' => 'headlineWeb',
                         'title' => 'Headline (Web)',
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
                         'name' => 'flowMediumStabilityFlag',
                         'title' => 'Flow Medium - Stability Flag',
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
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'supplementaryDeclarations',
                         'title' => 'Supplementary Declarations',
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
                     'maxTabs' => 35,
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
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'easyPack',
                             'title' => 'Easy Pack',
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
                          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                             'name' => 'methodOfCalculation',
                             'title' => 'Method of Calculation',
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
                             'width' => 250,
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
                         'labelWidth' => 250,
                         'labelAlign' => 'left',
                         'width' => '',
                         'height' => '',
                         'fieldDefinitionsCache' => NULL,
                      )),
                      1 => 
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'flameRetardant',
                                     'title' => 'Flame Retardant',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'declarationsResistanceToChlorine',
                                     'title' => 'Resistance to: Chlorine',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'declarationsResistanceToCrushing',
                                     'title' => 'Resistance to: Crushing',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'declarationsAntiUv',
                                     'title' => 'Anti UV',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'declarationsResistanceToAbrasion',
                                     'title' => 'Resistance to: Abrasion',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'declarationsResistanceToMould',
                                     'title' => 'Resistance to: Mould',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'declarationsFlexibility',
                                     'title' => 'Flexibility',
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
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'conductive',
                                     'title' => 'Conductive',
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
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'caution',
                                     'title' => 'Caution',
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
                                  9 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'atex',
                                     'title' => 'ATEX',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  10 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'antistatic',
                                     'title' => 'Antistatic',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  11 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'siliconFree',
                                     'title' => 'Silicon Free',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  12 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'phtalateFree',
                                     'title' => 'Phtalate Free',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  13 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'forFood2',
                                     'title' => 'For Food 2',
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
                                 'width' => '',
                                 'height' => '',
                                 'collapsible' => false,
                                 'collapsed' => false,
                                 'bodyStyle' => 'margin-left:20px;',
                                 'datatype' => 'layout',
                                 'children' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'flameRetardant2',
                                     'title' => 'Flame Retardant  2',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'declarationsResistanceToTear',
                                     'title' => 'Resistance to: Tear / Tearing',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'declarationsResistanceToPerforation',
                                     'title' => 'Resistance to: Perforation',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  3 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'declarationsSmoothSurface',
                                     'title' => 'Smooth surface',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  4 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'declarationsResistanceToOzone',
                                     'title' => 'Resistance to: Ozone',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  5 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'resistanceToChemicals',
                                     'title' => 'Resistance to: Chemicals',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  6 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'resistanceToHydrolysis',
                                     'title' => 'Resistance To Hydrolysis',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                  7 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'resistanceToMicrorganisms',
                                     'title' => 'Resistance to: Microrganisms',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  8 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'wasteWater',
                                     'title' => 'Waste water',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  9 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'trgsHomologation',
                                     'title' => 'TRGS Homologation',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  10 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'compressionLoad',
                                     'title' => 'Compression Load',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                  11 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'calibratedDiameters',
                                     'title' => 'Calibrated Diameters',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  12 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'puType',
                                     'title' => 'PU Type',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  13 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'ophtalateFree',
                                     'title' => 'O-Phtalate Free',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  14 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'name' => 'halogenFree',
                                     'title' => 'Halogen Free',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                                     'width' => '',
                                     'defaultValueGenerator' => '',
                                  )),
                                  15 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                     'name' => 'forFood',
                                     'title' => 'For Food',
                                     'tooltip' => '',
                                     'mandatory' => true,
                                     'noteditable' => false,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
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
                             'labelWidth' => 250,
                             'labelAlign' => 'left',
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
                         'labelWidth' => 250,
                         'labelAlign' => 'left',
                         'width' => '',
                         'height' => '',
                         'fieldDefinitionsCache' => NULL,
                      )),
                    ),
                     'permissionView' => NULL,
                     'permissionEdit' => NULL,
                     'labelWidth' => 250,
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
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 250,
                 'labelAlign' => 'left',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Supplementary declarations',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Supplementary declarations',
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
                         'name' => 'easyPack',
                         'title' => 'Easy Pack',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                         'name' => 'methodOfCalculation',
                         'title' => 'Method of Calculation',
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
                         'width' => 250,
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
                     'labelWidth' => 250,
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
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 250,
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/service_mark.svg',
             'labelWidth' => 250,
             'labelAlign' => 'left',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Mechanical/Chemical Properties',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Mechanical/Chemical Properties',
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
                 'name' => 'Ratings',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Ratings',
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
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'ratingsResistanceToAbrasion',
                             'title' => 'Resistance to: Abrasion',
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
                             'defaultValue' => '',
                             'columnLength' => 190,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => '',
                             'optionsProviderType' => 'select_options',
                             'optionsProviderClass' => 'Pimcore\\Bundle\\CoreBundle\\OptionsProvider\\SelectOptionsOptionsProvider',
                             'optionsProviderData' => 'UniPrFhsRatings',
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'ratingsResistanceToTear',
                             'title' => 'Resistance to: Tear / Tearing',
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
                             'defaultValue' => '',
                             'columnLength' => 190,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => '',
                             'optionsProviderType' => 'select_options',
                             'optionsProviderClass' => 'Pimcore\\Bundle\\CoreBundle\\OptionsProvider\\SelectOptionsOptionsProvider',
                             'optionsProviderData' => 'UniPrFhsRatings',
                          )),
                          2 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'ratingsAntiUv',
                             'title' => 'Anti UV',
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
                             'defaultValue' => '',
                             'columnLength' => 190,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => '',
                             'optionsProviderType' => 'select_options',
                             'optionsProviderClass' => 'Pimcore\\Bundle\\CoreBundle\\OptionsProvider\\SelectOptionsOptionsProvider',
                             'optionsProviderData' => 'UniPrFhsRatings',
                          )),
                          3 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'ratingsResistanceToChlorine',
                             'title' => 'Resistance to: Chlorine',
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
                             'defaultValue' => '',
                             'columnLength' => 190,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => '',
                             'optionsProviderType' => 'select_options',
                             'optionsProviderClass' => 'Pimcore\\Bundle\\CoreBundle\\OptionsProvider\\SelectOptionsOptionsProvider',
                             'optionsProviderData' => 'UniPrFhsRatings',
                          )),
                          4 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'ratingsResistanceToCrushing',
                             'title' => 'Resistance to: Crushing',
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
                             'defaultValue' => '',
                             'columnLength' => 190,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => '',
                             'optionsProviderType' => 'select_options',
                             'optionsProviderClass' => 'Pimcore\\Bundle\\CoreBundle\\OptionsProvider\\SelectOptionsOptionsProvider',
                             'optionsProviderData' => 'UniPrFhsRatings',
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
                         'width' => '',
                         'height' => '',
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'ratingsResistanceToMould',
                             'title' => 'Resistance to: Mould',
                             'tooltip' => '',
                             'mandatory' => true,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-left:20px;',
                             'permissions' => NULL,
                             'fieldtype' => '',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => '',
                             'columnLength' => 190,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => '',
                             'optionsProviderType' => 'select_options',
                             'optionsProviderClass' => 'Pimcore\\Bundle\\CoreBundle\\OptionsProvider\\SelectOptionsOptionsProvider',
                             'optionsProviderData' => 'UniPrFhsRatings',
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'ratingsResistanceToPerforation',
                             'title' => 'Resistance to: Perforation',
                             'tooltip' => '',
                             'mandatory' => true,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-left:20px;',
                             'permissions' => NULL,
                             'fieldtype' => '',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => '',
                             'columnLength' => 190,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => '',
                             'optionsProviderType' => 'select_options',
                             'optionsProviderClass' => 'Pimcore\\Bundle\\CoreBundle\\OptionsProvider\\SelectOptionsOptionsProvider',
                             'optionsProviderData' => 'UniPrFhsRatings',
                          )),
                          2 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'ratingsSmoothSurface',
                             'title' => 'Smooth Surface',
                             'tooltip' => '',
                             'mandatory' => true,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-left:20px;',
                             'permissions' => NULL,
                             'fieldtype' => '',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => '',
                             'columnLength' => 190,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => '',
                             'optionsProviderType' => 'select_options',
                             'optionsProviderClass' => 'Pimcore\\Bundle\\CoreBundle\\OptionsProvider\\SelectOptionsOptionsProvider',
                             'optionsProviderData' => 'UniPrFhsRatings',
                          )),
                          3 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                             'name' => 'ratingsResistanceToOzone',
                             'title' => 'Resistance to: Ozone',
                             'tooltip' => '',
                             'mandatory' => true,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-left:20px;',
                             'permissions' => NULL,
                             'fieldtype' => '',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => true,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'defaultValue' => '',
                             'columnLength' => 190,
                             'dynamicOptions' => false,
                             'defaultValueGenerator' => '',
                             'width' => '',
                             'optionsProviderType' => 'select_options',
                             'optionsProviderClass' => 'Pimcore\\Bundle\\CoreBundle\\OptionsProvider\\SelectOptionsOptionsProvider',
                             'optionsProviderData' => 'UniPrFhsRatings',
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
                     'labelWidth' => 250,
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
                 'labelWidth' => 250,
                 'labelAlign' => 'left',
              )),
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                 'name' => 'Supplementary declarations',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => 'Supplementary declarations',
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'flameRetardant',
                                 'title' => 'Flame Retardant',
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'declarationsResistanceToChlorine',
                                 'title' => 'Resistance to: Chlorine',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'declarationsResistanceToCrushing',
                                 'title' => 'Resistance to: Crushing',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              3 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'declarationsAntiUv',
                                 'title' => 'Anti UV',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              4 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'declarationsResistanceToAbrasion',
                                 'title' => 'Resistance to: Abrasion',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              5 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'declarationsResistanceToMould',
                                 'title' => 'Resistance to: Mould',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              6 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'declarationsFlexibility',
                                 'title' => 'Flexibility',
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
                              7 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'conductive',
                                 'title' => 'Conductive',
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
                              8 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'caution',
                                 'title' => 'Caution',
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
                              9 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'atex',
                                 'title' => 'ATEX',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              10 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'antistatic',
                                 'title' => 'Antistatic',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              11 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'siliconFree',
                                 'title' => 'Silicon Free',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              12 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'phtalateFree',
                                 'title' => 'Phtalate Free',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              13 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'forFood2',
                                 'title' => 'For Food 2',
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
                             'width' => '',
                             'height' => '',
                             'collapsible' => false,
                             'collapsed' => false,
                             'bodyStyle' => 'margin-left:20px;',
                             'datatype' => 'layout',
                             'children' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'flameRetardant2',
                                 'title' => 'Flame Retardant  2',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'declarationsResistanceToTear',
                                 'title' => 'Resistance to: Tear / Tearing',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'declarationsResistanceToPerforation',
                                 'title' => 'Resistance to: Perforation',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              3 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'declarationsSmoothSurface',
                                 'title' => 'Smooth surface',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              4 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'declarationsResistanceToOzone',
                                 'title' => 'Resistance to: Ozone',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              5 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'resistanceToChemicals',
                                 'title' => 'Resistance to: Chemicals',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              6 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'resistanceToHydrolysis',
                                 'title' => 'Resistance To Hydrolysis',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                              7 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'resistanceToMicrorganisms',
                                 'title' => 'Resistance to: Microrganisms',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              8 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'wasteWater',
                                 'title' => 'Waste water',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              9 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'trgsHomologation',
                                 'title' => 'TRGS Homologation',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              10 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'compressionLoad',
                                 'title' => 'Compression Load',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                              11 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'calibratedDiameters',
                                 'title' => 'Calibrated Diameters',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              12 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'puType',
                                 'title' => 'PU Type',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              13 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'ophtalateFree',
                                 'title' => 'O-Phtalate Free',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              14 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'name' => 'halogenFree',
                                 'title' => 'Halogen Free',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                                 'width' => '',
                                 'defaultValueGenerator' => '',
                              )),
                              15 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'name' => 'forFood',
                                 'title' => 'For Food',
                                 'tooltip' => '',
                                 'mandatory' => true,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
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
                         'labelWidth' => 250,
                         'labelAlign' => 'left',
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
                     'labelWidth' => 250,
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
                 'fieldtype' => 'panel',
                 'layout' => NULL,
                 'border' => false,
                 'icon' => '',
                 'labelWidth' => 250,
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/capacitor.svg',
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
      'classname' => 'UniProductCategoryInternal',
      'fieldname' => 'levelSpecificData',
    ),
    1 => 
    array (
      'classname' => 'UniProductBase',
      'fieldname' => 'skeletonData',
    ),
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
