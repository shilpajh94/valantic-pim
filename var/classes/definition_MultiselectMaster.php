<?php 

/** 
* Generated at: 2020-06-29T09:59:19+02:00
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- masterType [select]
- localizedfields [localizedfields]
-- name [input]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '22',
   'name' => 'MultiselectMaster',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1593417545,
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
         'labelWidth' => 100,
         'layout' => NULL,
         'border' => false,
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => 'Multiselect Master',
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
             'width' => 400,
             'defaultValue' => '',
             'optionsProviderClass' => 'AppBundle\\OptionProvider\\MultiselectMasterTypeProvider',
             'optionsProviderData' => '',
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'dynamicOptions' => false,
             'name' => 'masterType',
             'title' => 'Type',
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
          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
             'fieldtype' => 'localizedfields',
             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
             'childs' => 
            array (
              0 => 
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
                 'name' => 'name',
                 'title' => 'Name',
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
             'name' => 'localizedfields',
             'region' => NULL,
             'layout' => NULL,
             'title' => '',
             'width' => '',
             'height' => '',
             'maxTabs' => NULL,
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
   'group' => '',
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
