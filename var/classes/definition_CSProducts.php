<?php

/**
 * Inheritance: yes
 * Variants: no
 *
 * Fields Summary:
 * - localizedfields [localizedfields]
 * -- Name [input]
 * -- CorporateBrand [input]
 * -- ProductBrand [input]
 * -- ProductClaimSlogan [input]
 * -- ProductNamePrefix [input]
 * -- NatureOfProduct [input]
 * -- ProductDescription [textarea]
 * -- ShortText [textarea]
 * -- LongText [textarea]
 * -- featureBlock [block]
 * --- Feature [input]
 * -- benefitBlock [block]
 * --- Benefit [input]
 * -- logoImage [image]
 * -- productImage [image]
 * -- overviewImageofSystem [image]
 * -- imageCrossSectionOfProducts [image]
 * -- anglesofInclination [image]
 * -- sidewallSizes [image]
 * -- deviationAngleForVerticalCurves [image]
 * -- functionalityImage [image]
 * -- applicationImage [image]
 * -- fieldPhoto [image]
 * -- softwareImage [image]
 * -- reportImage [image]
 * -- damageImage [image]
 * -- deviatioAngleForHorizontal [image]
 * -- sidewallQualities [image]
 * -- increasingInclinationAngle [image]
 * -- beltRollDiameters [image]
 * -- imageGallery [imageGallery]
 * -- CompletenessPercentage [input]
 * -- EmptyFields [textarea]
 * - ProductOwner [user]
 * - MarcomUser [user]
 * - RnDUser [user]
 * - CSSegment [multiselect]
 * - CSRegion [multiselect]
 * - SelectCountries [multiselect]
 * - CSPerformanceCategory [multiselect]
 * - isPaused [checkbox]
 * - isArchived [checkbox]
 * - EcommerceFlag [booleanSelect]
 * - PrintedCatalogFlag [booleanSelect]
 * - SortOrder [numeric]
 * - CSProductApplications [manyToManyObjectRelation]
 * - CSProductFeaturesAndBenefits [manyToManyObjectRelation]
 * - CoverCompounds [manyToManyObjectRelation]
 * - CSRelatedProducts [manyToManyObjectRelation]
 * - CSProductIndustries [manyToManyObjectRelation]
 * - ParentCategory [manyToManyObjectRelation]
 * - ProductAttributes [objectbricks]
 * - systemAnimation [video]
 * - systemVideo [video]
 * - productAnimation [video]
 * - documents [manyToManyRelation]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => 'CSProducts',
   'name' => 'CSProducts',
   'title' => '',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1706469133,
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
   'allowInherit' => true,
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Base',
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
                     'name' => 'Name',
                     'title' => 'Name',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'CorporateBrand',
                     'title' => 'Corporate Brand',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'ProductBrand',
                     'title' => 'Product Brand',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'ProductClaimSlogan',
                     'title' => 'Product Claim/Slogan',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  4 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'ProductNamePrefix',
                     'title' => 'Product Name Prefix',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  5 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'name' => 'NatureOfProduct',
                     'title' => 'Nature of product',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
                     'permissions' => NULL,
                     'fieldtype' => '',
                     'relationType' => false,
                     'invisible' => true,
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
                     'width' => 300,
                     'defaultValueGenerator' => '',
                  )),
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'ProductDescription',
                     'title' => 'Product Description',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                     'width' => 800,
                  )),
                  7 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'ShortText',
                     'title' => 'Short Text',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                     'width' => 800,
                  )),
                  8 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'LongText',
                     'title' => 'Long Text',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                     'width' => 800,
                  )),
                ),
                 'region' => NULL,
                 'layout' => NULL,
                 'maxTabs' => 20,
                 'border' => true,
                 'provideSplitView' => false,
                 'tabPosition' => 'top',
                 'hideLabelsWhenTabsReached' => NULL,
                 'referencedFields' => 
                array (
                  0 => 
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Block::__set_state(array(
                         'name' => 'featureBlock',
                         'title' => 'Feature Block',
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
                         'lazyLoading' => false,
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsible' => false,
                         'collapsed' => false,
                         'maxItems' => NULL,
                         'styleElement' => '',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'Feature',
                             'title' => 'Feature',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-left:10px;',
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
                             'width' => 300,
                             'defaultValueGenerator' => '',
                          )),
                        ),
                         'layout' => NULL,
                         'referencedFields' => 
                        array (
                        ),
                         'fieldDefinitionsCache' => NULL,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Block::__set_state(array(
                         'name' => 'benefitBlock',
                         'title' => 'benefitBlock',
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
                         'lazyLoading' => false,
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsible' => false,
                         'collapsed' => false,
                         'maxItems' => NULL,
                         'styleElement' => '',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                             'name' => 'Benefit',
                             'title' => 'Benefit',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-left:10px;',
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
                             'width' => 300,
                             'defaultValueGenerator' => '',
                          )),
                        ),
                         'layout' => NULL,
                         'referencedFields' => 
                        array (
                        ),
                         'fieldDefinitionsCache' => NULL,
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                     'name' => 'localizedfields',
                     'title' => 'Digital Assets',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-top:10px;',
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
                         'title' => '',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'margin:20px;',
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'logoImage',
                                 'title' => 'Logo Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'productImage',
                                 'title' => 'Product Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'overviewImageofSystem',
                                 'title' => 'Overview Image of System',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              3 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'imageCrossSectionOfProducts',
                                 'title' => 'Image cross Section Of Products',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              4 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'anglesofInclination',
                                 'title' => 'Angles of Inclination',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              5 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'sidewallSizes',
                                 'title' => ' Sidewall Sizes',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              6 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'deviationAngleForVerticalCurves',
                                 'title' => 'Deviation Angle For Vertical Curves',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              7 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'functionalityImage',
                                 'title' => 'Functionality Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              8 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'applicationImage',
                                 'title' => 'Application Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'vbox',
                             'fieldLabel' => '',
                             'labelWidth' => 100,
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
                             'bodyStyle' => 'margin:20px;',
                             'datatype' => 'layout',
                             'children' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'fieldPhoto',
                                 'title' => 'Field Photo',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'softwareImage',
                                 'title' => 'Software Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'reportImage',
                                 'title' => 'Report Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              3 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'damageImage',
                                 'title' => 'Damage Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              4 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'deviatioAngleForHorizontal',
                                 'title' => 'Deviation Angle For Horizontal ',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              5 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'sidewallQualities',
                                 'title' => ' Sidewall Qualities',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              6 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'increasingInclinationAngle',
                                 'title' => 'Increasing Inclination Angle',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                              7 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'name' => 'beltRollDiameters',
                                 'title' => 'Belt Roll Diameters',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'fieldtype' => '',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'blockedVarsForExport' => 
                                array (
                                ),
                                 'uploadPath' => '',
                                 'width' => 400,
                                 'height' => '',
                              )),
                            ),
                             'locked' => false,
                             'blockedVarsForExport' => 
                            array (
                            ),
                             'fieldtype' => 'fieldcontainer',
                             'layout' => 'vbox',
                             'fieldLabel' => '',
                             'labelWidth' => 100,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ImageGallery::__set_state(array(
                         'name' => 'imageGallery',
                         'title' => 'Image Gallery',
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
                         'uploadPath' => '',
                         'ratioX' => NULL,
                         'ratioY' => NULL,
                         'predefinedDataTemplates' => '',
                         'height' => NULL,
                         'width' => NULL,
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
                  2 => 
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
                         'name' => 'CompletenessPercentage',
                         'title' => 'Completeness Percentage',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => 'padding: 10px; background-color: #d9edf7; border-color: #bce8f1 !important; color: #31708f;',
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
                         'width' => 600,
                         'defaultValueGenerator' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                         'name' => 'EmptyFields',
                         'title' => 'Empty Fields',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;',
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
                         'height' => 500,
                         'width' => 600,
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
                     'labelWidth' => 200,
                     'labelAlign' => 'left',
                     'fieldDefinitionsCache' => NULL,
                  )),
                ),
                 'permissionView' => NULL,
                 'permissionEdit' => NULL,
                 'labelWidth' => 200,
                 'labelAlign' => 'left',
                 'fieldDefinitionsCache' => NULL,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\User::__set_state(array(
                         'name' => 'ProductOwner',
                         'title' => 'ProductOwner',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => NULL,
                         'defaultValue' => NULL,
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => NULL,
                         'optionsProviderData' => NULL,
                         'unique' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\User::__set_state(array(
                         'name' => 'MarcomUser',
                         'title' => 'Marcom User',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => NULL,
                         'defaultValue' => NULL,
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => NULL,
                         'optionsProviderData' => NULL,
                         'unique' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\User::__set_state(array(
                         'name' => 'RnDUser',
                         'title' => 'R&D User',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => NULL,
                         'defaultValue' => NULL,
                         'columnLength' => 190,
                         'dynamicOptions' => false,
                         'defaultValueGenerator' => '',
                         'width' => '',
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => NULL,
                         'optionsProviderData' => NULL,
                         'unique' => false,
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'name' => 'CSSegment',
                         'title' => 'Segment',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => NULL,
                         'maxItems' => NULL,
                         'renderType' => 'tags',
                         'dynamicOptions' => false,
                         'height' => '',
                         'width' => 300,
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '\\AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => 'CSSegment|SegmentName',
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'name' => 'CSRegion',
                         'title' => 'Region',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => NULL,
                         'maxItems' => NULL,
                         'renderType' => 'tags',
                         'dynamicOptions' => false,
                         'height' => '',
                         'width' => 300,
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '\\AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => 'CSRegion|RegionName',
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
                     'bodyStyle' => 'margin-left:30px;',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'name' => 'SelectCountries',
                         'title' => 'Select Countries',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
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
                        ),
                         'maxItems' => NULL,
                         'renderType' => 'tags',
                         'dynamicOptions' => false,
                         'height' => '',
                         'width' => 300,
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'name' => 'CSPerformanceCategory',
                         'title' => 'Performance Category',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'options' => NULL,
                         'maxItems' => NULL,
                         'renderType' => 'tags',
                         'dynamicOptions' => false,
                         'height' => '',
                         'width' => 300,
                         'optionsProviderType' => NULL,
                         'optionsProviderClass' => '\\AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => 'CSPerformanceCategories|PerformanceCategory',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'name' => 'isPaused',
                         'title' => 'Is Paused',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => true,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => 0,
                         'defaultValueGenerator' => '',
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'name' => 'isArchived',
                         'title' => 'Is Archived',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => true,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'defaultValue' => 0,
                         'defaultValueGenerator' => '',
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                         'name' => 'EcommerceFlag',
                         'title' => 'Ecommerce Flag',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
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
                         'width' => 300,
                      )),
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                         'name' => 'PrintedCatalogFlag',
                         'title' => 'Printed Catalog Flag',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
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
                         'width' => 300,
                      )),
                      6 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                         'name' => 'SortOrder',
                         'title' => 'Sort Order',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
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
                         'width' => 300,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'CSProductApplications',
                         'title' => 'Applications',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
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
                          0 => 
                          array (
                            'classes' => 'CSApplications',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'ApplicationName',
                         'allowToCreateNewObject' => false,
                         'allowToClearRelation' => true,
                         'optimizedAdminLoading' => false,
                         'enableTextSelection' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'width' => 495,
                         'height' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'CSProductFeaturesAndBenefits',
                         'title' => 'Features and Benefits',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
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
                          0 => 
                          array (
                            'classes' => 'CSFeaturesAndBenefits',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'FeatureName',
                         'allowToCreateNewObject' => false,
                         'allowToClearRelation' => true,
                         'optimizedAdminLoading' => false,
                         'enableTextSelection' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'width' => 495,
                         'height' => '',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'CoverCompounds',
                         'title' => 'Cover Compounds',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
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
                          0 => 
                          array (
                            'classes' => 'CSProducts',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'Name,Level',
                         'allowToCreateNewObject' => false,
                         'allowToClearRelation' => true,
                         'optimizedAdminLoading' => false,
                         'enableTextSelection' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'width' => 495,
                         'height' => '',
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
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'CSRelatedProducts',
                         'title' => 'Related Products',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:20px;',
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
                          0 => 
                          array (
                            'classes' => 'CSProducts',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'Name',
                         'allowToCreateNewObject' => false,
                         'allowToClearRelation' => true,
                         'optimizedAdminLoading' => false,
                         'enableTextSelection' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'width' => 495,
                         'height' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'CSProductIndustries',
                         'title' => 'Industries',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:20px;',
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
                          0 => 
                          array (
                            'classes' => 'CSIndustries',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'IndustryName',
                         'allowToCreateNewObject' => false,
                         'allowToClearRelation' => true,
                         'optimizedAdminLoading' => false,
                         'enableTextSelection' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'width' => 495,
                         'height' => '',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'name' => 'ParentCategory',
                         'title' => 'Parent Category',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:20px; clear:both;',
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
                          0 => 
                          array (
                            'classes' => 'CSHierarchy',
                          ),
                        ),
                         'displayMode' => NULL,
                         'pathFormatterClass' => '',
                         'maxItems' => NULL,
                         'visibleFields' => 'Name',
                         'allowToCreateNewObject' => false,
                         'allowToClearRelation' => true,
                         'optimizedAdminLoading' => false,
                         'enableTextSelection' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'width' => 495,
                         'height' => '',
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/label.svg',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'FeatureAndBenefit',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Features And Benefits',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Block::__set_state(array(
                     'name' => 'featureBlock',
                     'title' => 'Feature Block',
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
                     'lazyLoading' => false,
                     'disallowAddRemove' => false,
                     'disallowReorder' => false,
                     'collapsible' => false,
                     'collapsed' => false,
                     'maxItems' => NULL,
                     'styleElement' => '',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'Feature',
                         'title' => 'Feature',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
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
                         'width' => 300,
                         'defaultValueGenerator' => '',
                      )),
                    ),
                     'layout' => NULL,
                     'referencedFields' => 
                    array (
                    ),
                     'fieldDefinitionsCache' => NULL,
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Block::__set_state(array(
                     'name' => 'benefitBlock',
                     'title' => 'benefitBlock',
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
                     'lazyLoading' => false,
                     'disallowAddRemove' => false,
                     'disallowReorder' => false,
                     'collapsible' => false,
                     'collapsed' => false,
                     'maxItems' => NULL,
                     'styleElement' => '',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'name' => 'Benefit',
                         'title' => 'Benefit',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
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
                         'width' => 300,
                         'defaultValueGenerator' => '',
                      )),
                    ),
                     'layout' => NULL,
                     'referencedFields' => 
                    array (
                    ),
                     'fieldDefinitionsCache' => NULL,
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
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Product Specific Data',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Product Specific Data',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                 'name' => 'ProductAttributes',
                 'title' => 'Product Attributes',
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
                 'allowedTypes' => 
                array (
                  0 => 'TensionElevatorBelt',
                  1 => 'BeltData',
                  2 => 'DigitalSolution',
                  3 => 'Functionality',
                  4 => 'LoadSupport',
                  5 => 'Material',
                  6 => 'OptionsStandards',
                  7 => 'Performance1',
                  8 => 'Performance2',
                  9 => 'ProdSpec',
                  10 => 'SalesOrga',
                  11 => 'SpliceData',
                  12 => 'WidthLength',
                  13 => 'ProdDimensions',
                  14 => 'TypeOfIdler',
                ),
                 'maxItems' => NULL,
                 'border' => false,
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/input.svg',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Layout',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Digital Assets',
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
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Images',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Images',
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
                         'name' => 'Images',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Images',
                         'width' => 0,
                         'height' => 0,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'children' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                             'name' => 'localizedfields',
                             'title' => 'Digital Assets',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-top:10px;',
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
                                 'title' => '',
                                 'width' => 0,
                                 'height' => 0,
                                 'collapsible' => false,
                                 'collapsed' => false,
                                 'bodyStyle' => 'margin:20px;',
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'logoImage',
                                         'title' => 'Logo Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      1 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'productImage',
                                         'title' => 'Product Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      2 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'overviewImageofSystem',
                                         'title' => 'Overview Image of System',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      3 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'imageCrossSectionOfProducts',
                                         'title' => 'Image cross Section Of Products',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      4 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'anglesofInclination',
                                         'title' => 'Angles of Inclination',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      5 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'sidewallSizes',
                                         'title' => ' Sidewall Sizes',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      6 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'deviationAngleForVerticalCurves',
                                         'title' => 'Deviation Angle For Vertical Curves',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      7 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'functionalityImage',
                                         'title' => 'Functionality Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      8 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'applicationImage',
                                         'title' => 'Application Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                    ),
                                     'locked' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'fieldtype' => 'fieldcontainer',
                                     'layout' => 'vbox',
                                     'fieldLabel' => '',
                                     'labelWidth' => 100,
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
                                     'bodyStyle' => 'margin:20px;',
                                     'datatype' => 'layout',
                                     'children' => 
                                    array (
                                      0 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'fieldPhoto',
                                         'title' => 'Field Photo',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      1 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'softwareImage',
                                         'title' => 'Software Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      2 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'reportImage',
                                         'title' => 'Report Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      3 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'damageImage',
                                         'title' => 'Damage Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      4 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'deviatioAngleForHorizontal',
                                         'title' => 'Deviation Angle For Horizontal ',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      5 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'sidewallQualities',
                                         'title' => ' Sidewall Qualities',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      6 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'increasingInclinationAngle',
                                         'title' => 'Increasing Inclination Angle',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                      7 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'name' => 'beltRollDiameters',
                                         'title' => 'Belt Roll Diameters',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
                                         'permissions' => NULL,
                                         'fieldtype' => '',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                         'blockedVarsForExport' => 
                                        array (
                                        ),
                                         'uploadPath' => '',
                                         'width' => 400,
                                         'height' => '',
                                      )),
                                    ),
                                     'locked' => false,
                                     'blockedVarsForExport' => 
                                    array (
                                    ),
                                     'fieldtype' => 'fieldcontainer',
                                     'layout' => 'vbox',
                                     'fieldLabel' => '',
                                     'labelWidth' => 100,
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\ImageGallery::__set_state(array(
                                 'name' => 'imageGallery',
                                 'title' => 'Image Gallery',
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
                                 'uploadPath' => '',
                                 'ratioX' => NULL,
                                 'ratioY' => NULL,
                                 'predefinedDataTemplates' => '',
                                 'height' => NULL,
                                 'width' => NULL,
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/asset.svg',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Videos',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Videos',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                         'name' => 'systemAnimation',
                         'title' => 'System Animation',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-top:10px;margin-left:10px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'allowedTypes' => NULL,
                         'supportedTypes' => 
                        array (
                          0 => 'asset',
                          1 => 'youtube',
                          2 => 'vimeo',
                          3 => 'dailymotion',
                        ),
                         'height' => '',
                         'width' => 400,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                         'name' => 'systemVideo',
                         'title' => 'System Video',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-top:10px;margin-left:10px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'allowedTypes' => NULL,
                         'supportedTypes' => 
                        array (
                          0 => 'asset',
                          1 => 'youtube',
                          2 => 'vimeo',
                          3 => 'dailymotion',
                        ),
                         'height' => '',
                         'width' => 400,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                         'name' => 'productAnimation',
                         'title' => 'Product Animation',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-top:10px;margin-left:10px;',
                         'permissions' => NULL,
                         'fieldtype' => '',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'blockedVarsForExport' => 
                        array (
                        ),
                         'uploadPath' => '',
                         'allowedTypes' => NULL,
                         'supportedTypes' => 
                        array (
                          0 => 'asset',
                          1 => 'youtube',
                          2 => 'vimeo',
                          3 => 'dailymotion',
                        ),
                         'height' => '',
                         'width' => 400,
                      )),
                    ),
                     'locked' => false,
                     'blockedVarsForExport' => 
                    array (
                    ),
                     'fieldtype' => 'panel',
                     'layout' => NULL,
                     'border' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/camcorder.svg',
                     'labelWidth' => 100,
                     'labelAlign' => 'left',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'name' => 'Documents',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Documents',
                     'width' => 0,
                     'height' => 0,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'children' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation::__set_state(array(
                         'name' => 'documents',
                         'title' => 'Documents',
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
                         'assetInlineDownloadAllowed' => false,
                         'assetUploadPath' => '',
                         'allowToClearRelation' => true,
                         'objectsAllowed' => false,
                         'assetsAllowed' => true,
                         'assetTypes' => 
                        array (
                          0 => 
                          array (
                            'assetTypes' => 'text',
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
                         'enableTextSelection' => false,
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/book.svg',
                     'labelWidth' => 100,
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/image-region.svg',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'name' => 'Completeness',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Completeness',
             'width' => 0,
             'height' => 0,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
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
                     'name' => 'CompletenessPercentage',
                     'title' => 'Completeness Percentage',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: #d9edf7; border-color: #bce8f1 !important; color: #31708f;',
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
                     'width' => 600,
                     'defaultValueGenerator' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'name' => 'EmptyFields',
                     'title' => 'Empty Fields',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;',
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
                     'height' => 500,
                     'width' => 600,
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
                 'labelWidth' => 200,
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
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_green.png',
             'labelWidth' => 100,
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
   'icon' => '/bundles/pimcoreadmin/img/icon/tag_green.png',
   'group' => 'Conveyor Solution',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
   'previewGeneratorReference' => '',
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
