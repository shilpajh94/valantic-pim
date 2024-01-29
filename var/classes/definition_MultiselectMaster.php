<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - masterType [select]
 * - localizedfields [localizedfields]
 * -- name [input]
 * -- Description [textarea]
 * -- CustomerFacingVersion [textarea]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => '22',
   'name' => 'MultiselectMaster',
   'title' => '',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1706469164,
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
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => 'Multiselect Master',
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
             'name' => 'masterType',
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
                'key' => 'HYD_ACCESSORIES >> Material Type',
                'value' => 'HYD_ACCESSORIES~MaterialType',
              ),
              1 => 
              array (
                'key' => 'HYD_ACCESSORIES >> Color',
                'value' => 'HYD_ACCESSORIES~Color',
              ),
              2 => 
              array (
                'key' => 'INH-HYD-HOSE >> Tube Material',
                'value' => 'INH-HYD-HOSE~tubeMaterial',
              ),
              3 => 
              array (
                'key' => 'INH-HYD-HOSE >> Tube Characteristic',
                'value' => 'INH-HYD-HOSE~tubeCharacteristic',
              ),
              4 => 
              array (
                'key' => 'INH-HYD-HOSE >> Tube Color',
                'value' => 'INH-HYD-HOSE~tubeColor',
              ),
              5 => 
              array (
                'key' => 'INH-HYD-HOSE >> Standard Met- Tube',
                'value' => 'INH-HYD-HOSE~StandardMetTube',
              ),
              6 => 
              array (
                'key' => 'INH-HYD-HOSE >> Standard Met- Cover',
                'value' => 'INH-HYD-HOSE~StandardMetCover',
              ),
              7 => 
              array (
                'key' => 'INH-HYD-HOSE >> Standard Met- Hose',
                'value' => 'INH-HYD-HOSE~standardMetHose',
              ),
              8 => 
              array (
                'key' => 'INH-HYD-HOSE >> Cover Material',
                'value' => 'INH-HYD-HOSE~coverMaterial',
              ),
              9 => 
              array (
                'key' => 'INH-HYD-HOSE >> Cover Characteristic',
                'value' => 'INH-HYD-HOSE~coverCharacteristic',
              ),
              10 => 
              array (
                'key' => 'INH-HYD-HOSE >> Cover Color',
                'value' => 'INH-HYD-HOSE~coverColor',
              ),
              11 => 
              array (
                'key' => 'INH-HYD-HOSE >> Agency Compliance',
                'value' => 'INH-HYD-HOSE~agencyCompliance',
              ),
              12 => 
              array (
                'key' => 'INH-HYD-HOSE >> Safety Factor (ARPM Standard)',
                'value' => 'INH-HYD-HOSE~safetyFactor',
              ),
              13 => 
              array (
                'key' => 'INH-HYD-HOSE >> Acceptable Hose Media',
                'value' => 'INH-HYD-HOSE~acceptableHoseMedia',
              ),
              14 => 
              array (
                'key' => 'INH-HYD-HOSE >> Reinforcement',
                'value' => 'INH-HYD-HOSE~reinforcement',
              ),
              15 => 
              array (
                'key' => 'HYD_FITTINGS >> Assembly Vendor',
                'value' => 'HYD_FITTINGS~AssemblyVendor',
              ),
              16 => 
              array (
                'key' => 'HYD_FITTINGS >> Stem Component Vendor',
                'value' => 'HYD_FITTINGS~StemComponentVendor',
              ),
              17 => 
              array (
                'key' => 'HYD_FITTINGS >> Ferrule Component Vendor',
                'value' => 'HYD_FITTINGS~FerruleComponentVendor',
              ),
              18 => 
              array (
                'key' => 'HYD_FITTINGS >> Swivel Nut Component Vendor',
                'value' => 'HYD_FITTINGS~SwivelNutComponentVendor',
              ),
              19 => 
              array (
                'key' => 'HYD_FITTINGS >> O-Ring Component Vendor',
                'value' => 'HYD_FITTINGS~ORingComponentVendor',
              ),
              20 => 
              array (
                'key' => 'HYD_FITTINGS >> Internal O-Ring Vendor',
                'value' => 'HYD_FITTINGS~InternalORingVendor',
              ),
              21 => 
              array (
                'key' => 'HYD_FITTINGS >> Back Up O-Ring Component Vendor',
                'value' => 'HYD_FITTINGS~BackUpORingComponentVendor',
              ),
              22 => 
              array (
                'key' => 'HYD_FITTINGS >> Slip Nut Retaining Ring Component Vendor',
                'value' => 'HYD_FITTINGS~SlipNutRetainingRingComponentVendor',
              ),
              23 => 
              array (
                'key' => 'HYD_FITTINGS >> Thread Protector Component Vendor',
                'value' => 'HYD_FITTINGS~ThreadProtectorComponentVendor',
              ),
              24 => 
              array (
                'key' => 'PTG >> Material',
                'value' => 'PTG~material',
              ),
              25 => 
              array (
                'key' => 'Product Class >> Fitting Family',
                'value' => 'ProductClass~fittingFamily',
              ),
              26 => 
              array (
                'key' => 'Product Class >> Reinforcement',
                'value' => 'ProductClass~reinforcement',
              ),
            ),
             'defaultValue' => '',
             'columnLength' => 190,
             'dynamicOptions' => false,
             'defaultValueGenerator' => '',
             'width' => 400,
             'optionsProviderType' => NULL,
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
             'name' => 'localizedfields',
             'title' => '',
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
             'visibleGridView' => true,
             'visibleSearch' => true,
             'blockedVarsForExport' => 
            array (
            ),
             'children' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'name',
                 'title' => 'Name',
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
              1 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                 'name' => 'Description',
                 'title' => 'Description',
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
                 'height' => '',
                 'width' => '',
              )),
              2 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                 'name' => 'CustomerFacingVersion',
                 'title' => 'Customer Facing Version',
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
                 'height' => '',
                 'width' => '',
              )),
            ),
             'region' => NULL,
             'layout' => NULL,
             'maxTabs' => 20,
             'border' => false,
             'provideSplitView' => false,
             'tabPosition' => 'top',
             'hideLabelsWhenTabsReached' => NULL,
             'referencedFields' => 
            array (
            ),
             'permissionView' => NULL,
             'permissionEdit' => NULL,
             'labelWidth' => 0,
             'labelAlign' => 'left',
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
