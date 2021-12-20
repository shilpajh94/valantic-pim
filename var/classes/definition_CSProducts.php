<?php 

/** 
* Generated at: 2021-12-17T06:58:44-05:00
* Inheritance: yes
* Variants: no
* Changed by: admin (2)
* IP: ::1


Fields Summary: 
- localizedfields [localizedfields]
-- Name [input]
-- CorporateBrand [input]
-- ProductBrand [input]
-- ProductClaimSlogan [input]
-- ProductNamePrefix [input]
-- NatureOfProduct [input]
-- ProductDescription [textarea]
-- ShortText [textarea]
-- LongText [textarea]
-- featureBlock [block]
--- Feature [input]
-- benefitBlock [block]
--- Benefit [input]
-- logoImage [image]
-- productImage [image]
-- overviewImageofSystem [image]
-- imageCrossSectionOfProducts [image]
-- anglesofInclination [image]
-- sidewallSizes [image]
-- deviationAngleForVerticalCurves [image]
-- functionalityImage [image]
-- applicationImage [image]
-- fieldPhoto [image]
-- softwareImage [image]
-- reportImage [image]
-- damageImage [image]
-- deviatioAngleForHorizontal [image]
-- sidewallQualities [image]
-- increasingInclinationAngle [image]
-- beltRollDiameters [image]
-- imageGallery [imageGallery]
-- CompletenessPercentage [input]
-- EmptyFields [textarea]
- ProductOwner [user]
- MarcomUser [user]
- RnDUser [user]
- CSSegment [multiselect]
- CSRegion [multiselect]
- SelectCountries [multiselect]
- CSPerformanceCategory [multiselect]
- isPaused [checkbox]
- isArchived [checkbox]
- EcommerceFlag [booleanSelect]
- PrintedCatalogFlag [booleanSelect]
- SortOrder [numeric]
- CSProductApplications [manyToManyObjectRelation]
- CSProductFeaturesAndBenefits [manyToManyObjectRelation]
- CoverCompounds [manyToManyObjectRelation]
- CSRelatedProducts [manyToManyObjectRelation]
- CSProductIndustries [manyToManyObjectRelation]
- ParentCategory [manyToManyObjectRelation]
- ProductAttributes [objectbricks]
- systemAnimation [video]
- systemVideo [video]
- productAnimation [video]
- documents [manyToManyRelation]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'CSProducts',
   'name' => 'CSProducts',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1639742324,
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
             'name' => 'Base',
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
                     'style' => 'margin-left:10px;',
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
                     'name' => 'CorporateBrand',
                     'title' => 'Corporate Brand',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                     'name' => 'ProductBrand',
                     'title' => 'Product Brand',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                     'name' => 'ProductClaimSlogan',
                     'title' => 'Product Claim/Slogan',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                     'name' => 'ProductNamePrefix',
                     'title' => 'Product Name Prefix',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                     'name' => 'NatureOfProduct',
                     'title' => 'Nature of product',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => true,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                     'defaultValueGenerator' => '',
                  )),
                  6 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'fieldtype' => 'textarea',
                     'width' => 800,
                     'height' => 150,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'name' => 'ProductDescription',
                     'title' => 'Product Description',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  7 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'fieldtype' => 'textarea',
                     'width' => 800,
                     'height' => 150,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'name' => 'ShortText',
                     'title' => 'Short Text',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                  8 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                     'fieldtype' => 'textarea',
                     'width' => 800,
                     'height' => 150,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'name' => 'LongText',
                     'title' => 'Long Text',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => false,
                     'locked' => false,
                     'style' => 'margin-left:10px;',
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
                 'tabPosition' => 'top',
                 'hideLabelsWhenTabsReached' => NULL,
                 'referencedFields' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                     'fieldtype' => 'localizedfields',
                     'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Block::__set_state(array(
                         'fieldtype' => 'block',
                         'lazyLoading' => false,
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsible' => false,
                         'collapsed' => false,
                         'maxItems' => NULL,
                         'columnType' => 'longtext',
                         'styleElement' => '',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\BlockElement[][]',
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
                             'name' => 'Feature',
                             'title' => 'Feature',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-left:10px;',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                             'defaultValueGenerator' => '',
                          )),
                        ),
                         'layout' => NULL,
                         'referencedFields' => 
                        array (
                        ),
                         'name' => 'featureBlock',
                         'title' => 'Feature Block',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Block::__set_state(array(
                         'fieldtype' => 'block',
                         'lazyLoading' => false,
                         'disallowAddRemove' => false,
                         'disallowReorder' => false,
                         'collapsible' => false,
                         'collapsed' => false,
                         'maxItems' => NULL,
                         'columnType' => 'longtext',
                         'styleElement' => '',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\BlockElement[][]',
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
                             'name' => 'Benefit',
                             'title' => 'Benefit',
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => false,
                             'locked' => false,
                             'style' => 'margin-left:10px;',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => false,
                             'visibleSearch' => false,
                             'defaultValueGenerator' => '',
                          )),
                        ),
                         'layout' => NULL,
                         'referencedFields' => 
                        array (
                        ),
                         'name' => 'benefitBlock',
                         'title' => 'benefitBlock',
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
                         'bodyStyle' => 'margin:20px;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'logoImage',
                                 'title' => 'Logo Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
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
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'productImage',
                                 'title' => 'Product Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
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
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'overviewImageofSystem',
                                 'title' => 'Overview Image of System',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
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
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'imageCrossSectionOfProducts',
                                 'title' => 'Image cross Section Of Products',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              4 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'anglesofInclination',
                                 'title' => 'Angles of Inclination',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              5 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'sidewallSizes',
                                 'title' => ' Sidewall Sizes',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              6 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'deviationAngleForVerticalCurves',
                                 'title' => 'Deviation Angle For Vertical Curves',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              7 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'functionalityImage',
                                 'title' => 'Functionality Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              8 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'applicationImage',
                                 'title' => 'Application Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
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
                             'labelWidth' => 100,
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
                             'bodyStyle' => 'margin:20px;',
                             'datatype' => 'layout',
                             'permissions' => NULL,
                             'childs' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'fieldPhoto',
                                 'title' => 'Field Photo',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
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
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'softwareImage',
                                 'title' => 'Software Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
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
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'reportImage',
                                 'title' => 'Report Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
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
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'damageImage',
                                 'title' => 'Damage Image',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              4 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'deviatioAngleForHorizontal',
                                 'title' => 'Deviation Angle For Horizontal ',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              5 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'sidewallQualities',
                                 'title' => ' Sidewall Qualities',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              6 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'increasingInclinationAngle',
                                 'title' => 'Increasing Inclination Angle',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              7 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'beltRollDiameters',
                                 'title' => 'Belt Roll Diameters',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
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
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ImageGallery::__set_state(array(
                         'fieldtype' => 'imageGallery',
                         'queryColumnType' => 
                        array (
                          'images' => 'text',
                          'hotspots' => 'text',
                        ),
                         'columnType' => 
                        array (
                          'images' => 'text',
                          'hotspots' => 'text',
                        ),
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ImageGallery',
                         'width' => NULL,
                         'height' => NULL,
                         'uploadPath' => '',
                         'ratioX' => NULL,
                         'ratioY' => NULL,
                         'predefinedDataTemplates' => '',
                         'name' => 'imageGallery',
                         'title' => 'Image Gallery',
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
                     'name' => 'localizedfields',
                     'region' => NULL,
                     'layout' => NULL,
                     'title' => 'Digital Assets',
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
                     'fieldDefinitionsCache' => NULL,
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => false,
                     'index' => NULL,
                     'locked' => false,
                     'style' => 'margin-top:10px;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => true,
                     'visibleSearch' => true,
                  )),
                  2 => 
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
                         'noteditable' => true,
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
                         'noteditable' => true,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\User::__set_state(array(
                         'fieldtype' => 'user',
                         'unique' => false,
                         'options' => 
                        array (
                          0 => 
                          array (
                            'value' => 47,
                            'key' => 'a070825 (Alan Hickenbottom)',
                          ),
                          1 => 
                          array (
<<<<<<< HEAD
                            'value' => 57,
                            'key' => 'a339063 (Marie-Josee Brisson)',
                          ),
                          2 => 
=======
                            'value' => 59,
                            'key' => 'A074241 (Craig Boche)',
                          ),
                          2 => 
                          array (
                            'value' => 63,
                            'key' => 'a207963 (Mark Merklein)',
                          ),
                          3 => 
                          array (
                            'value' => 94,
                            'key' => 'a294838 (Karina Robinson)',
                          ),
                          4 => 
                          array (
                            'value' => 57,
                            'key' => 'a339063 (Marie-Josee Brisson)',
                          ),
                          5 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 36,
                            'key' => 'a352850 (Reji Joseph)',
                          ),
<<<<<<< HEAD
                          3 => 
=======
                          6 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 55,
                            'key' => 'a389752 (Randy Kish)',
                          ),
<<<<<<< HEAD
                          4 => 
=======
                          7 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 2,
                            'key' => 'admin',
                          ),
<<<<<<< HEAD
                          5 => 
=======
                          8 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 23,
                            'key' => 'Andy (Andy Speidel)',
                          ),
<<<<<<< HEAD
                          6 => 
=======
                          9 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 16,
                            'key' => 'Ben (Ben Tracey)',
                          ),
<<<<<<< HEAD
                          7 => 
=======
                          10 => 
                          array (
                            'value' => 71,
                            'key' => 'boulakhrifa (Abdelhakim Boulakhrif)',
                          ),
                          11 => 
                          array (
                            'value' => 61,
                            'key' => 'C012194 (Mackenzie Brown)',
                          ),
                          12 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 11,
                            'key' => 'cory (Cory Walter)',
                          ),
<<<<<<< HEAD
                          8 => 
=======
                          13 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 21,
                            'key' => 'Dave (Dave Smith)',
                          ),
<<<<<<< HEAD
                          9 => 
=======
                          14 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 42,
                            'key' => 'dobol (Laszlo Dobo)',
                          ),
<<<<<<< HEAD
                          10 => 
=======
                          15 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 33,
                            'key' => 'editor',
                          ),
<<<<<<< HEAD
                          11 => 
=======
                          16 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 22,
                            'key' => 'Eric (Eric Dupont)',
                          ),
<<<<<<< HEAD
                          12 => 
=======
                          17 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 28,
                            'key' => 'Jarek (Jarek Zakrzewski)',
                          ),
<<<<<<< HEAD
                          13 => 
=======
                          18 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 20,
                            'key' => 'Jeff (Jeff Epperson)',
                          ),
<<<<<<< HEAD
                          14 => 
=======
                          19 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 25,
                            'key' => 'Jeremy (Jeremy Lidgett)',
                          ),
<<<<<<< HEAD
                          15 => 
=======
                          20 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 14,
                            'key' => 'Joe (joe glandorf)',
                          ),
<<<<<<< HEAD
                          16 => 
=======
                          21 => 
                          array (
                            'value' => 91,
                            'key' => 'juenemannj (Jens Juenemann)',
                          ),
                          22 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 26,
                            'key' => 'Karina (Karina Robinson)',
                          ),
<<<<<<< HEAD
                          17 => 
=======
                          23 => 
                          array (
                            'value' => 93,
                            'key' => 'Krausss (Stefan Krauss)',
                          ),
                          24 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 17,
                            'key' => 'Laszlo (Laszlo Dobo)',
                          ),
<<<<<<< HEAD
                          18 => 
=======
                          25 => 
                          array (
                            'value' => 89,
                            'key' => 'liedtkem (Melanie Liedtke-Sieben)',
                          ),
                          26 => 
                          array (
                            'value' => 77,
                            'key' => 'lohrbergj (Joerg Lohrberg)',
                          ),
                          27 => 
                          array (
                            'value' => 92,
                            'key' => 'LuekeJ (Jan-Philipp Lueke)',
                          ),
                          28 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 12,
                            'key' => 'macenzie',
                          ),
<<<<<<< HEAD
                          19 => 
=======
                          29 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 8,
                            'key' => 'Mark (Rohan Kumar)',
                          ),
<<<<<<< HEAD
                          20 => 
=======
                          30 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 24,
                            'key' => 'MarkR (Mark Rosetta)',
                          ),
<<<<<<< HEAD
                          21 => 
=======
                          31 => 
                          array (
                            'value' => 81,
                            'key' => 'menzelm (Marisa Menzel)',
                          ),
                          32 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 51,
                            'key' => 'ncem057 (Steve Davison)',
                          ),
<<<<<<< HEAD
                          22 => 
=======
                          33 => 
                          array (
                            'value' => 75,
                            'key' => 'neuenrothc (Christian Neuenroth)',
                          ),
                          34 => 
                          array (
                            'value' => 97,
                            'key' => 'newmanm1 (Michael Newman)',
                          ),
                          35 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 15,
                            'key' => 'Nicole (Nicole Kostelnick)',
                          ),
<<<<<<< HEAD
                          23 => 
=======
                          36 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 48,
                            'key' => 'nlndv68 (Jeff Epperson)',
                          ),
<<<<<<< HEAD
                          24 => 
=======
                          37 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 27,
                            'key' => 'Paul (Paul Whiffin)',
                          ),
<<<<<<< HEAD
                          25 => 
=======
                          38 => 
                          array (
                            'value' => 79,
                            'key' => 'posseltc (Christof Posselt)',
                          ),
                          39 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 35,
                            'key' => 'Pradeep',
                          ),
<<<<<<< HEAD
                          26 => 
=======
                          40 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 34,
                            'key' => 'productmanager',
                          ),
<<<<<<< HEAD
                          27 => 
=======
                          41 => 
                          array (
                            'value' => 62,
                            'key' => 'rajputa (Amit Rajput)',
                          ),
                          42 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 29,
                            'key' => 'Randy (Rohan Kumar)',
                          ),
<<<<<<< HEAD
                          28 => 
=======
                          43 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 9,
                            'key' => 'Reji',
                          ),
<<<<<<< HEAD
                          29 => 
=======
                          44 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 13,
                            'key' => 'Rohit',
                          ),
<<<<<<< HEAD
                          30 => 
=======
                          45 => 
                          array (
                            'value' => 82,
                            'key' => 'rowshm (Mehdi Rowshannahad)',
                          ),
                          46 => 
                          array (
                            'value' => 67,
                            'key' => 'schickedanzm (Malte Schickedanz)',
                          ),
                          47 => 
                          array (
                            'value' => 70,
                            'key' => 'steinerd (Daniel Steiner)',
                          ),
                          48 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 18,
                            'key' => 'Steve (Steve Davison)',
                          ),
<<<<<<< HEAD
                          31 => 
=======
                          49 => 
                          array (
                            'value' => 85,
                            'key' => 'uia54546 (Tatjana Kempf)',
                          ),
                          50 => 
                          array (
                            'value' => 86,
                            'key' => 'uia54883 (Janina Gruebel)',
                          ),
                          51 => 
                          array (
                            'value' => 88,
                            'key' => 'uia56532 (Simone Wieland)',
                          ),
                          52 => 
                          array (
                            'value' => 66,
                            'key' => 'uia60821 (Vandana Singal)',
                          ),
                          53 => 
                          array (
                            'value' => 74,
                            'key' => 'uia60823 (Rony Felix)',
                          ),
                          54 => 
                          array (
                            'value' => 68,
                            'key' => 'uia89654 (Kinsey Hastings)',
                          ),
                          55 => 
                          array (
                            'value' => 87,
                            'key' => 'uia94201 (Annika Duerr)',
                          ),
                          56 => 
                          array (
                            'value' => 78,
                            'key' => 'uib09594 (Lars Tiedje)',
                          ),
                          57 => 
                          array (
                            'value' => 64,
                            'key' => 'uib68208 (Krishan Kumar)',
                          ),
                          58 => 
                          array (
                            'value' => 65,
                            'key' => 'uib68209 (Siddharth Chaudhery)',
                          ),
                          59 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 58,
                            'key' => 'uib98517 (Toks Ajepe)',
                          ),
<<<<<<< HEAD
                          32 => 
=======
                          60 => 
                          array (
                            'value' => 72,
                            'key' => 'uic39540 (Cedric Schulz)',
                          ),
                          61 => 
                          array (
                            'value' => 69,
                            'key' => 'uic52020 (Oktay Oezcan)',
                          ),
                          62 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 41,
                            'key' => 'uic58260 (Evan Wasen)',
                          ),
<<<<<<< HEAD
                          33 => 
=======
                          63 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 30,
                            'key' => 'uic60917 (Krishnan Kumar)',
                          ),
<<<<<<< HEAD
                          34 => 
=======
                          64 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 52,
                            'key' => 'uie20462 (Steven De Alwis)',
                          ),
<<<<<<< HEAD
                          35 => 
=======
                          65 => 
                          array (
                            'value' => 90,
                            'key' => 'uie32847 (Andrea Traeger)',
                          ),
                          66 => 
                          array (
                            'value' => 80,
                            'key' => 'uie42653 (DANIELA ALBUQUERQUE)',
                          ),
                          67 => 
                          array (
                            'value' => 76,
                            'key' => 'UIE43370 (Noah Hartman)',
                          ),
                          68 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 40,
                            'key' => 'V000320 (Jarek Zakrzewski)',
                          ),
<<<<<<< HEAD
                          36 => 
=======
                          69 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 37,
                            'key' => 'v000696 (Mark Dario)',
                          ),
<<<<<<< HEAD
                          37 => 
=======
                          70 => 
                          array (
                            'value' => 60,
                            'key' => 'v000886 (Flint Wilson)',
                          ),
                          71 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 43,
                            'key' => 'v001713 (Nicole Kostelnick)',
                          ),
<<<<<<< HEAD
                          38 => 
=======
                          72 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 39,
                            'key' => 'v002041 (Cory Walter)',
                          ),
<<<<<<< HEAD
                          39 => 
=======
                          73 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 45,
                            'key' => 'v002044 (Zach Christenson)',
                          ),
<<<<<<< HEAD
                          40 => 
=======
                          74 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 46,
                            'key' => 'v002065 (Mark Rosetta)',
                          ),
<<<<<<< HEAD
                          41 => 
=======
                          75 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 44,
                            'key' => 'V104718 (Ben Tracey)',
                          ),
<<<<<<< HEAD
                          42 => 
=======
                          76 => 
                          array (
                            'value' => 84,
                            'key' => 'v105777 (Wesley Coursen)',
                          ),
                          77 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 53,
                            'key' => 'v106287 (Joe Glandorf)',
                          ),
<<<<<<< HEAD
                          43 => 
=======
                          78 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 56,
                            'key' => 'v106566 (Don Salandanan)',
                          ),
<<<<<<< HEAD
                          44 => 
=======
                          79 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 49,
                            'key' => 'V111211 (James Dusek)',
                          ),
<<<<<<< HEAD
                          45 => 
=======
                          80 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 50,
                            'key' => 'v111296 (Scott Retzlaff)',
                          ),
<<<<<<< HEAD
                          46 => 
=======
                          81 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 54,
                            'key' => 'V112497 (Morgan Lackey)',
                          ),
<<<<<<< HEAD
                          47 => 
=======
                          82 => 
                          array (
                            'value' => 83,
                            'key' => 'wiemannm (Mareike-Elena Wiemann)',
                          ),
                          83 => 
                          array (
                            'value' => 96,
                            'key' => 'z021185 (Eric Dupont)',
                          ),
                          84 => 
                          array (
                            'value' => 73,
                            'key' => 'za02860 (Chad Peters)',
                          ),
                          85 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 19,
                            'key' => 'Zach (Zach Christenson)',
                          ),
                        ),
                         'width' => '',
                         'defaultValue' => NULL,
                         'optionsProviderClass' => NULL,
                         'optionsProviderData' => NULL,
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'dynamicOptions' => false,
                         'name' => 'ProductOwner',
                         'title' => 'ProductOwner',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'defaultValueGenerator' => '',
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\User::__set_state(array(
                         'fieldtype' => 'user',
                         'unique' => false,
                         'options' => 
                        array (
                          0 => 
                          array (
                            'value' => 47,
                            'key' => 'a070825 (Alan Hickenbottom)',
                          ),
                          1 => 
                          array (
<<<<<<< HEAD
                            'value' => 57,
                            'key' => 'a339063 (Marie-Josee Brisson)',
                          ),
                          2 => 
=======
                            'value' => 59,
                            'key' => 'A074241 (Craig Boche)',
                          ),
                          2 => 
                          array (
                            'value' => 63,
                            'key' => 'a207963 (Mark Merklein)',
                          ),
                          3 => 
                          array (
                            'value' => 94,
                            'key' => 'a294838 (Karina Robinson)',
                          ),
                          4 => 
                          array (
                            'value' => 57,
                            'key' => 'a339063 (Marie-Josee Brisson)',
                          ),
                          5 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 36,
                            'key' => 'a352850 (Reji Joseph)',
                          ),
<<<<<<< HEAD
                          3 => 
=======
                          6 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 55,
                            'key' => 'a389752 (Randy Kish)',
                          ),
<<<<<<< HEAD
                          4 => 
=======
                          7 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 2,
                            'key' => 'admin',
                          ),
<<<<<<< HEAD
                          5 => 
=======
                          8 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 23,
                            'key' => 'Andy (Andy Speidel)',
                          ),
<<<<<<< HEAD
                          6 => 
=======
                          9 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 16,
                            'key' => 'Ben (Ben Tracey)',
                          ),
<<<<<<< HEAD
                          7 => 
=======
                          10 => 
                          array (
                            'value' => 71,
                            'key' => 'boulakhrifa (Abdelhakim Boulakhrif)',
                          ),
                          11 => 
                          array (
                            'value' => 61,
                            'key' => 'C012194 (Mackenzie Brown)',
                          ),
                          12 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 11,
                            'key' => 'cory (Cory Walter)',
                          ),
<<<<<<< HEAD
                          8 => 
=======
                          13 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 21,
                            'key' => 'Dave (Dave Smith)',
                          ),
<<<<<<< HEAD
                          9 => 
=======
                          14 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 42,
                            'key' => 'dobol (Laszlo Dobo)',
                          ),
<<<<<<< HEAD
                          10 => 
=======
                          15 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 33,
                            'key' => 'editor',
                          ),
<<<<<<< HEAD
                          11 => 
=======
                          16 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 22,
                            'key' => 'Eric (Eric Dupont)',
                          ),
<<<<<<< HEAD
                          12 => 
=======
                          17 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 28,
                            'key' => 'Jarek (Jarek Zakrzewski)',
                          ),
<<<<<<< HEAD
                          13 => 
=======
                          18 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 20,
                            'key' => 'Jeff (Jeff Epperson)',
                          ),
<<<<<<< HEAD
                          14 => 
=======
                          19 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 25,
                            'key' => 'Jeremy (Jeremy Lidgett)',
                          ),
<<<<<<< HEAD
                          15 => 
=======
                          20 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 14,
                            'key' => 'Joe (joe glandorf)',
                          ),
<<<<<<< HEAD
                          16 => 
=======
                          21 => 
                          array (
                            'value' => 91,
                            'key' => 'juenemannj (Jens Juenemann)',
                          ),
                          22 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 26,
                            'key' => 'Karina (Karina Robinson)',
                          ),
<<<<<<< HEAD
                          17 => 
=======
                          23 => 
                          array (
                            'value' => 93,
                            'key' => 'Krausss (Stefan Krauss)',
                          ),
                          24 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 17,
                            'key' => 'Laszlo (Laszlo Dobo)',
                          ),
<<<<<<< HEAD
                          18 => 
=======
                          25 => 
                          array (
                            'value' => 89,
                            'key' => 'liedtkem (Melanie Liedtke-Sieben)',
                          ),
                          26 => 
                          array (
                            'value' => 77,
                            'key' => 'lohrbergj (Joerg Lohrberg)',
                          ),
                          27 => 
                          array (
                            'value' => 92,
                            'key' => 'LuekeJ (Jan-Philipp Lueke)',
                          ),
                          28 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 12,
                            'key' => 'macenzie',
                          ),
<<<<<<< HEAD
                          19 => 
=======
                          29 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 8,
                            'key' => 'Mark (Rohan Kumar)',
                          ),
<<<<<<< HEAD
                          20 => 
=======
                          30 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 24,
                            'key' => 'MarkR (Mark Rosetta)',
                          ),
<<<<<<< HEAD
                          21 => 
=======
                          31 => 
                          array (
                            'value' => 81,
                            'key' => 'menzelm (Marisa Menzel)',
                          ),
                          32 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 51,
                            'key' => 'ncem057 (Steve Davison)',
                          ),
<<<<<<< HEAD
                          22 => 
=======
                          33 => 
                          array (
                            'value' => 75,
                            'key' => 'neuenrothc (Christian Neuenroth)',
                          ),
                          34 => 
                          array (
                            'value' => 97,
                            'key' => 'newmanm1 (Michael Newman)',
                          ),
                          35 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 15,
                            'key' => 'Nicole (Nicole Kostelnick)',
                          ),
<<<<<<< HEAD
                          23 => 
=======
                          36 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 48,
                            'key' => 'nlndv68 (Jeff Epperson)',
                          ),
<<<<<<< HEAD
                          24 => 
=======
                          37 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 27,
                            'key' => 'Paul (Paul Whiffin)',
                          ),
<<<<<<< HEAD
                          25 => 
=======
                          38 => 
                          array (
                            'value' => 79,
                            'key' => 'posseltc (Christof Posselt)',
                          ),
                          39 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 35,
                            'key' => 'Pradeep',
                          ),
<<<<<<< HEAD
                          26 => 
=======
                          40 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 34,
                            'key' => 'productmanager',
                          ),
<<<<<<< HEAD
                          27 => 
=======
                          41 => 
                          array (
                            'value' => 62,
                            'key' => 'rajputa (Amit Rajput)',
                          ),
                          42 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 29,
                            'key' => 'Randy (Rohan Kumar)',
                          ),
<<<<<<< HEAD
                          28 => 
=======
                          43 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 9,
                            'key' => 'Reji',
                          ),
<<<<<<< HEAD
                          29 => 
=======
                          44 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 13,
                            'key' => 'Rohit',
                          ),
<<<<<<< HEAD
                          30 => 
=======
                          45 => 
                          array (
                            'value' => 82,
                            'key' => 'rowshm (Mehdi Rowshannahad)',
                          ),
                          46 => 
                          array (
                            'value' => 67,
                            'key' => 'schickedanzm (Malte Schickedanz)',
                          ),
                          47 => 
                          array (
                            'value' => 70,
                            'key' => 'steinerd (Daniel Steiner)',
                          ),
                          48 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 18,
                            'key' => 'Steve (Steve Davison)',
                          ),
<<<<<<< HEAD
                          31 => 
=======
                          49 => 
                          array (
                            'value' => 85,
                            'key' => 'uia54546 (Tatjana Kempf)',
                          ),
                          50 => 
                          array (
                            'value' => 86,
                            'key' => 'uia54883 (Janina Gruebel)',
                          ),
                          51 => 
                          array (
                            'value' => 88,
                            'key' => 'uia56532 (Simone Wieland)',
                          ),
                          52 => 
                          array (
                            'value' => 66,
                            'key' => 'uia60821 (Vandana Singal)',
                          ),
                          53 => 
                          array (
                            'value' => 74,
                            'key' => 'uia60823 (Rony Felix)',
                          ),
                          54 => 
                          array (
                            'value' => 68,
                            'key' => 'uia89654 (Kinsey Hastings)',
                          ),
                          55 => 
                          array (
                            'value' => 87,
                            'key' => 'uia94201 (Annika Duerr)',
                          ),
                          56 => 
                          array (
                            'value' => 78,
                            'key' => 'uib09594 (Lars Tiedje)',
                          ),
                          57 => 
                          array (
                            'value' => 64,
                            'key' => 'uib68208 (Krishan Kumar)',
                          ),
                          58 => 
                          array (
                            'value' => 65,
                            'key' => 'uib68209 (Siddharth Chaudhery)',
                          ),
                          59 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 58,
                            'key' => 'uib98517 (Toks Ajepe)',
                          ),
<<<<<<< HEAD
                          32 => 
=======
                          60 => 
                          array (
                            'value' => 72,
                            'key' => 'uic39540 (Cedric Schulz)',
                          ),
                          61 => 
                          array (
                            'value' => 69,
                            'key' => 'uic52020 (Oktay Oezcan)',
                          ),
                          62 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 41,
                            'key' => 'uic58260 (Evan Wasen)',
                          ),
<<<<<<< HEAD
                          33 => 
=======
                          63 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 30,
                            'key' => 'uic60917 (Krishnan Kumar)',
                          ),
<<<<<<< HEAD
                          34 => 
=======
                          64 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 52,
                            'key' => 'uie20462 (Steven De Alwis)',
                          ),
<<<<<<< HEAD
                          35 => 
=======
                          65 => 
                          array (
                            'value' => 90,
                            'key' => 'uie32847 (Andrea Traeger)',
                          ),
                          66 => 
                          array (
                            'value' => 80,
                            'key' => 'uie42653 (DANIELA ALBUQUERQUE)',
                          ),
                          67 => 
                          array (
                            'value' => 76,
                            'key' => 'UIE43370 (Noah Hartman)',
                          ),
                          68 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 40,
                            'key' => 'V000320 (Jarek Zakrzewski)',
                          ),
<<<<<<< HEAD
                          36 => 
=======
                          69 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 37,
                            'key' => 'v000696 (Mark Dario)',
                          ),
<<<<<<< HEAD
                          37 => 
=======
                          70 => 
                          array (
                            'value' => 60,
                            'key' => 'v000886 (Flint Wilson)',
                          ),
                          71 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 43,
                            'key' => 'v001713 (Nicole Kostelnick)',
                          ),
<<<<<<< HEAD
                          38 => 
=======
                          72 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 39,
                            'key' => 'v002041 (Cory Walter)',
                          ),
<<<<<<< HEAD
                          39 => 
=======
                          73 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 45,
                            'key' => 'v002044 (Zach Christenson)',
                          ),
<<<<<<< HEAD
                          40 => 
=======
                          74 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 46,
                            'key' => 'v002065 (Mark Rosetta)',
                          ),
<<<<<<< HEAD
                          41 => 
=======
                          75 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 44,
                            'key' => 'V104718 (Ben Tracey)',
                          ),
<<<<<<< HEAD
                          42 => 
=======
                          76 => 
                          array (
                            'value' => 84,
                            'key' => 'v105777 (Wesley Coursen)',
                          ),
                          77 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 53,
                            'key' => 'v106287 (Joe Glandorf)',
                          ),
<<<<<<< HEAD
                          43 => 
=======
                          78 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 56,
                            'key' => 'v106566 (Don Salandanan)',
                          ),
<<<<<<< HEAD
                          44 => 
=======
                          79 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 49,
                            'key' => 'V111211 (James Dusek)',
                          ),
<<<<<<< HEAD
                          45 => 
=======
                          80 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 50,
                            'key' => 'v111296 (Scott Retzlaff)',
                          ),
<<<<<<< HEAD
                          46 => 
=======
                          81 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 54,
                            'key' => 'V112497 (Morgan Lackey)',
                          ),
<<<<<<< HEAD
                          47 => 
=======
                          82 => 
                          array (
                            'value' => 83,
                            'key' => 'wiemannm (Mareike-Elena Wiemann)',
                          ),
                          83 => 
                          array (
                            'value' => 96,
                            'key' => 'z021185 (Eric Dupont)',
                          ),
                          84 => 
                          array (
                            'value' => 73,
                            'key' => 'za02860 (Chad Peters)',
                          ),
                          85 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 19,
                            'key' => 'Zach (Zach Christenson)',
                          ),
                        ),
                         'width' => '',
                         'defaultValue' => NULL,
                         'optionsProviderClass' => NULL,
                         'optionsProviderData' => NULL,
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'dynamicOptions' => false,
                         'name' => 'MarcomUser',
                         'title' => 'Marcom User',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'defaultValueGenerator' => '',
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\User::__set_state(array(
                         'fieldtype' => 'user',
                         'unique' => false,
                         'options' => 
                        array (
                          0 => 
                          array (
                            'value' => 47,
                            'key' => 'a070825 (Alan Hickenbottom)',
                          ),
                          1 => 
                          array (
<<<<<<< HEAD
                            'value' => 57,
                            'key' => 'a339063 (Marie-Josee Brisson)',
                          ),
                          2 => 
=======
                            'value' => 59,
                            'key' => 'A074241 (Craig Boche)',
                          ),
                          2 => 
                          array (
                            'value' => 63,
                            'key' => 'a207963 (Mark Merklein)',
                          ),
                          3 => 
                          array (
                            'value' => 94,
                            'key' => 'a294838 (Karina Robinson)',
                          ),
                          4 => 
                          array (
                            'value' => 57,
                            'key' => 'a339063 (Marie-Josee Brisson)',
                          ),
                          5 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 36,
                            'key' => 'a352850 (Reji Joseph)',
                          ),
<<<<<<< HEAD
                          3 => 
=======
                          6 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 55,
                            'key' => 'a389752 (Randy Kish)',
                          ),
<<<<<<< HEAD
                          4 => 
=======
                          7 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 2,
                            'key' => 'admin',
                          ),
<<<<<<< HEAD
                          5 => 
=======
                          8 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 23,
                            'key' => 'Andy (Andy Speidel)',
                          ),
<<<<<<< HEAD
                          6 => 
=======
                          9 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 16,
                            'key' => 'Ben (Ben Tracey)',
                          ),
<<<<<<< HEAD
                          7 => 
=======
                          10 => 
                          array (
                            'value' => 71,
                            'key' => 'boulakhrifa (Abdelhakim Boulakhrif)',
                          ),
                          11 => 
                          array (
                            'value' => 61,
                            'key' => 'C012194 (Mackenzie Brown)',
                          ),
                          12 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 11,
                            'key' => 'cory (Cory Walter)',
                          ),
<<<<<<< HEAD
                          8 => 
=======
                          13 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 21,
                            'key' => 'Dave (Dave Smith)',
                          ),
<<<<<<< HEAD
                          9 => 
=======
                          14 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 42,
                            'key' => 'dobol (Laszlo Dobo)',
                          ),
<<<<<<< HEAD
                          10 => 
=======
                          15 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 33,
                            'key' => 'editor',
                          ),
<<<<<<< HEAD
                          11 => 
=======
                          16 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 22,
                            'key' => 'Eric (Eric Dupont)',
                          ),
<<<<<<< HEAD
                          12 => 
=======
                          17 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 28,
                            'key' => 'Jarek (Jarek Zakrzewski)',
                          ),
<<<<<<< HEAD
                          13 => 
=======
                          18 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 20,
                            'key' => 'Jeff (Jeff Epperson)',
                          ),
<<<<<<< HEAD
                          14 => 
=======
                          19 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 25,
                            'key' => 'Jeremy (Jeremy Lidgett)',
                          ),
<<<<<<< HEAD
                          15 => 
=======
                          20 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 14,
                            'key' => 'Joe (joe glandorf)',
                          ),
<<<<<<< HEAD
                          16 => 
=======
                          21 => 
                          array (
                            'value' => 91,
                            'key' => 'juenemannj (Jens Juenemann)',
                          ),
                          22 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 26,
                            'key' => 'Karina (Karina Robinson)',
                          ),
<<<<<<< HEAD
                          17 => 
=======
                          23 => 
                          array (
                            'value' => 93,
                            'key' => 'Krausss (Stefan Krauss)',
                          ),
                          24 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 17,
                            'key' => 'Laszlo (Laszlo Dobo)',
                          ),
<<<<<<< HEAD
                          18 => 
=======
                          25 => 
                          array (
                            'value' => 89,
                            'key' => 'liedtkem (Melanie Liedtke-Sieben)',
                          ),
                          26 => 
                          array (
                            'value' => 77,
                            'key' => 'lohrbergj (Joerg Lohrberg)',
                          ),
                          27 => 
                          array (
                            'value' => 92,
                            'key' => 'LuekeJ (Jan-Philipp Lueke)',
                          ),
                          28 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 12,
                            'key' => 'macenzie',
                          ),
<<<<<<< HEAD
                          19 => 
=======
                          29 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 8,
                            'key' => 'Mark (Rohan Kumar)',
                          ),
<<<<<<< HEAD
                          20 => 
=======
                          30 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 24,
                            'key' => 'MarkR (Mark Rosetta)',
                          ),
<<<<<<< HEAD
                          21 => 
=======
                          31 => 
                          array (
                            'value' => 81,
                            'key' => 'menzelm (Marisa Menzel)',
                          ),
                          32 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 51,
                            'key' => 'ncem057 (Steve Davison)',
                          ),
<<<<<<< HEAD
                          22 => 
=======
                          33 => 
                          array (
                            'value' => 75,
                            'key' => 'neuenrothc (Christian Neuenroth)',
                          ),
                          34 => 
                          array (
                            'value' => 97,
                            'key' => 'newmanm1 (Michael Newman)',
                          ),
                          35 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 15,
                            'key' => 'Nicole (Nicole Kostelnick)',
                          ),
<<<<<<< HEAD
                          23 => 
=======
                          36 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 48,
                            'key' => 'nlndv68 (Jeff Epperson)',
                          ),
<<<<<<< HEAD
                          24 => 
=======
                          37 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 27,
                            'key' => 'Paul (Paul Whiffin)',
                          ),
<<<<<<< HEAD
                          25 => 
=======
                          38 => 
                          array (
                            'value' => 79,
                            'key' => 'posseltc (Christof Posselt)',
                          ),
                          39 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 35,
                            'key' => 'Pradeep',
                          ),
<<<<<<< HEAD
                          26 => 
=======
                          40 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 34,
                            'key' => 'productmanager',
                          ),
<<<<<<< HEAD
                          27 => 
=======
                          41 => 
                          array (
                            'value' => 62,
                            'key' => 'rajputa (Amit Rajput)',
                          ),
                          42 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 29,
                            'key' => 'Randy (Rohan Kumar)',
                          ),
<<<<<<< HEAD
                          28 => 
=======
                          43 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 9,
                            'key' => 'Reji',
                          ),
<<<<<<< HEAD
                          29 => 
=======
                          44 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 13,
                            'key' => 'Rohit',
                          ),
<<<<<<< HEAD
                          30 => 
=======
                          45 => 
                          array (
                            'value' => 82,
                            'key' => 'rowshm (Mehdi Rowshannahad)',
                          ),
                          46 => 
                          array (
                            'value' => 67,
                            'key' => 'schickedanzm (Malte Schickedanz)',
                          ),
                          47 => 
                          array (
                            'value' => 70,
                            'key' => 'steinerd (Daniel Steiner)',
                          ),
                          48 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 18,
                            'key' => 'Steve (Steve Davison)',
                          ),
<<<<<<< HEAD
                          31 => 
=======
                          49 => 
                          array (
                            'value' => 85,
                            'key' => 'uia54546 (Tatjana Kempf)',
                          ),
                          50 => 
                          array (
                            'value' => 86,
                            'key' => 'uia54883 (Janina Gruebel)',
                          ),
                          51 => 
                          array (
                            'value' => 88,
                            'key' => 'uia56532 (Simone Wieland)',
                          ),
                          52 => 
                          array (
                            'value' => 66,
                            'key' => 'uia60821 (Vandana Singal)',
                          ),
                          53 => 
                          array (
                            'value' => 74,
                            'key' => 'uia60823 (Rony Felix)',
                          ),
                          54 => 
                          array (
                            'value' => 68,
                            'key' => 'uia89654 (Kinsey Hastings)',
                          ),
                          55 => 
                          array (
                            'value' => 87,
                            'key' => 'uia94201 (Annika Duerr)',
                          ),
                          56 => 
                          array (
                            'value' => 78,
                            'key' => 'uib09594 (Lars Tiedje)',
                          ),
                          57 => 
                          array (
                            'value' => 64,
                            'key' => 'uib68208 (Krishan Kumar)',
                          ),
                          58 => 
                          array (
                            'value' => 65,
                            'key' => 'uib68209 (Siddharth Chaudhery)',
                          ),
                          59 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 58,
                            'key' => 'uib98517 (Toks Ajepe)',
                          ),
<<<<<<< HEAD
                          32 => 
=======
                          60 => 
                          array (
                            'value' => 72,
                            'key' => 'uic39540 (Cedric Schulz)',
                          ),
                          61 => 
                          array (
                            'value' => 69,
                            'key' => 'uic52020 (Oktay Oezcan)',
                          ),
                          62 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 41,
                            'key' => 'uic58260 (Evan Wasen)',
                          ),
<<<<<<< HEAD
                          33 => 
=======
                          63 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 30,
                            'key' => 'uic60917 (Krishnan Kumar)',
                          ),
<<<<<<< HEAD
                          34 => 
=======
                          64 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 52,
                            'key' => 'uie20462 (Steven De Alwis)',
                          ),
<<<<<<< HEAD
                          35 => 
=======
                          65 => 
                          array (
                            'value' => 90,
                            'key' => 'uie32847 (Andrea Traeger)',
                          ),
                          66 => 
                          array (
                            'value' => 80,
                            'key' => 'uie42653 (DANIELA ALBUQUERQUE)',
                          ),
                          67 => 
                          array (
                            'value' => 76,
                            'key' => 'UIE43370 (Noah Hartman)',
                          ),
                          68 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 40,
                            'key' => 'V000320 (Jarek Zakrzewski)',
                          ),
<<<<<<< HEAD
                          36 => 
=======
                          69 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 37,
                            'key' => 'v000696 (Mark Dario)',
                          ),
<<<<<<< HEAD
                          37 => 
=======
                          70 => 
                          array (
                            'value' => 60,
                            'key' => 'v000886 (Flint Wilson)',
                          ),
                          71 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 43,
                            'key' => 'v001713 (Nicole Kostelnick)',
                          ),
<<<<<<< HEAD
                          38 => 
=======
                          72 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 39,
                            'key' => 'v002041 (Cory Walter)',
                          ),
<<<<<<< HEAD
                          39 => 
=======
                          73 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 45,
                            'key' => 'v002044 (Zach Christenson)',
                          ),
<<<<<<< HEAD
                          40 => 
=======
                          74 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 46,
                            'key' => 'v002065 (Mark Rosetta)',
                          ),
<<<<<<< HEAD
                          41 => 
=======
                          75 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 44,
                            'key' => 'V104718 (Ben Tracey)',
                          ),
<<<<<<< HEAD
                          42 => 
=======
                          76 => 
                          array (
                            'value' => 84,
                            'key' => 'v105777 (Wesley Coursen)',
                          ),
                          77 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 53,
                            'key' => 'v106287 (Joe Glandorf)',
                          ),
<<<<<<< HEAD
                          43 => 
=======
                          78 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 56,
                            'key' => 'v106566 (Don Salandanan)',
                          ),
<<<<<<< HEAD
                          44 => 
=======
                          79 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 49,
                            'key' => 'V111211 (James Dusek)',
                          ),
<<<<<<< HEAD
                          45 => 
=======
                          80 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 50,
                            'key' => 'v111296 (Scott Retzlaff)',
                          ),
<<<<<<< HEAD
                          46 => 
=======
                          81 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 54,
                            'key' => 'V112497 (Morgan Lackey)',
                          ),
<<<<<<< HEAD
                          47 => 
=======
                          82 => 
                          array (
                            'value' => 83,
                            'key' => 'wiemannm (Mareike-Elena Wiemann)',
                          ),
                          83 => 
                          array (
                            'value' => 96,
                            'key' => 'z021185 (Eric Dupont)',
                          ),
                          84 => 
                          array (
                            'value' => 73,
                            'key' => 'za02860 (Chad Peters)',
                          ),
                          85 => 
>>>>>>> origin/CBS_Catalog_Localization
                          array (
                            'value' => 19,
                            'key' => 'Zach (Zach Christenson)',
                          ),
                        ),
                         'width' => '',
                         'defaultValue' => NULL,
                         'optionsProviderClass' => NULL,
                         'optionsProviderData' => NULL,
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'dynamicOptions' => false,
                         'name' => 'RnDUser',
                         'title' => 'R&D User',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'defaultValueGenerator' => '',
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'AMERICAS',
<<<<<<< HEAD
                            'value' => 7502339,
=======
                            'value' => 10869319,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                          1 => 
                          array (
                            'key' => 'APAC',
<<<<<<< HEAD
                            'value' => 7502338,
=======
                            'value' => 10869318,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                          2 => 
                          array (
                            'key' => 'EMEA',
<<<<<<< HEAD
                            'value' => 7502337,
=======
                            'value' => 10869317,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                          3 => 
                          array (
                            'key' => 'SERVICE',
<<<<<<< HEAD
                            'value' => 7502340,
=======
                            'value' => 10869320,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => '\\AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => 'CSSegment|SegmentName',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
                         'dynamicOptions' => false,
                         'name' => 'CSSegment',
                         'title' => 'Segment',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Australia / South Pacific',
<<<<<<< HEAD
                            'value' => 7502334,
=======
                            'value' => 10869314,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                          1 => 
                          array (
                            'key' => 'China & Mongolia',
<<<<<<< HEAD
                            'value' => 7502332,
=======
                            'value' => 10869312,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                          2 => 
                          array (
                            'key' => 'Eastern Europe/Russia',
<<<<<<< HEAD
                            'value' => 7502329,
=======
                            'value' => 10869309,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                          3 => 
                          array (
                            'key' => 'India',
<<<<<<< HEAD
                            'value' => 7502333,
=======
                            'value' => 10869313,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                          4 => 
                          array (
                            'key' => 'Middle East/North Africa',
<<<<<<< HEAD
                            'value' => 7502330,
=======
                            'value' => 10869310,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                          5 => 
                          array (
                            'key' => 'North America',
<<<<<<< HEAD
                            'value' => 7502326,
=======
                            'value' => 10869306,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                          6 => 
                          array (
                            'key' => 'South America',
<<<<<<< HEAD
                            'value' => 7502327,
=======
                            'value' => 10869307,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                          7 => 
                          array (
                            'key' => 'South East Asia',
<<<<<<< HEAD
                            'value' => 7502335,
=======
                            'value' => 10869315,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                          8 => 
                          array (
                            'key' => 'Subsahara/South Africa',
<<<<<<< HEAD
                            'value' => 7502331,
=======
                            'value' => 10869311,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                          9 => 
                          array (
                            'key' => 'Western Europe',
<<<<<<< HEAD
                            'value' => 7502328,
=======
                            'value' => 10869308,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => '\\AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => 'CSRegion|RegionName',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
                         'dynamicOptions' => false,
                         'name' => 'CSRegion',
                         'title' => 'Region',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
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
                     'bodyStyle' => 'margin-left:30px;',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => '',
                         'optionsProviderData' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
                         'dynamicOptions' => false,
                         'name' => 'SelectCountries',
                         'title' => 'Select Countries',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
<<<<<<< HEAD
                            'key' => 'Abrasion Compounds',
                            'value' => 7502252,
                          ),
                          1 => 
                          array (
                            'key' => 'Cut & Gouge Compounds',
                            'value' => 7502253,
                          ),
                          2 => 
                          array (
                            'key' => 'ContiFlex Compounds',
                            'value' => 7502254,
                          ),
                          3 => 
                          array (
                            'key' => 'Flame Compounds',
                            'value' => 7502255,
                          ),
                          4 => 
                          array (
                            'key' => 'Flame Underground Compounds',
                            'value' => 7502256,
                          ),
                          5 => 
                          array (
                            'key' => 'Flame And Vegetable Oil Compounds',
                            'value' => 7502257,
                          ),
                          6 => 
                          array (
                            'key' => 'Flame And Oil Resistant Compounds',
                            'value' => 7502258,
                          ),
                          7 => 
                          array (
                            'key' => 'Gold Oil Compounds',
                            'value' => 7502259,
                          ),
                          8 => 
                          array (
                            'key' => 'Flame And Heat Compounds',
                            'value' => 7502260,
                          ),
                          9 => 
                          array (
                            'key' => 'Solar-Shield Heat Compounds',
                            'value' => 7502261,
                          ),
                          10 => 
                          array (
                            'key' => 'Special Service Compounds',
                            'value' => 7502262,
                          ),
                          11 => 
                          array (
                            'key' => 'White Compounds',
                            'value' => 7502263,
=======
                            'key' => NULL,
                            'value' => 10869232,
                          ),
                          1 => 
                          array (
                            'key' => NULL,
                            'value' => 10869233,
                          ),
                          2 => 
                          array (
                            'key' => NULL,
                            'value' => 10869234,
                          ),
                          3 => 
                          array (
                            'key' => NULL,
                            'value' => 10869235,
                          ),
                          4 => 
                          array (
                            'key' => NULL,
                            'value' => 10869236,
                          ),
                          5 => 
                          array (
                            'key' => NULL,
                            'value' => 10869237,
                          ),
                          6 => 
                          array (
                            'key' => NULL,
                            'value' => 10869238,
                          ),
                          7 => 
                          array (
                            'key' => NULL,
                            'value' => 10869239,
                          ),
                          8 => 
                          array (
                            'key' => NULL,
                            'value' => 10869240,
                          ),
                          9 => 
                          array (
                            'key' => NULL,
                            'value' => 10869241,
                          ),
                          10 => 
                          array (
                            'key' => NULL,
                            'value' => 10869242,
                          ),
                          11 => 
                          array (
                            'key' => NULL,
                            'value' => 10869243,
>>>>>>> origin/CBS_Catalog_Localization
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'tags',
                         'optionsProviderClass' => '\\AppBundle\\OptionProvider\\GenericOptionsProvider',
                         'optionsProviderData' => 'CSPerformanceCategories|PerformanceCategory',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => 'array',
                         'dynamicOptions' => false,
                         'name' => 'CSPerformanceCategory',
                         'title' => 'Performance Category',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'fieldtype' => 'checkbox',
                         'defaultValue' => 0,
                         'queryColumnType' => 'tinyint(1)',
                         'columnType' => 'tinyint(1)',
                         'phpdocType' => 'boolean',
                         'name' => 'isPaused',
                         'title' => 'Is Paused',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => true,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'defaultValueGenerator' => '',
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
                         'fieldtype' => 'checkbox',
                         'defaultValue' => 0,
                         'queryColumnType' => 'tinyint(1)',
                         'columnType' => 'tinyint(1)',
                         'phpdocType' => 'boolean',
                         'name' => 'isArchived',
                         'title' => 'Is Archived',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => true,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'defaultValueGenerator' => '',
                      )),
                      4 => 
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
                         'width' => 300,
                         'queryColumnType' => 'tinyint(1) null',
                         'columnType' => 'tinyint(1) null',
                         'phpdocType' => 'boolean',
                         'name' => 'EcommerceFlag',
                         'title' => 'Ecommerce Flag',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      5 => 
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
                         'width' => 300,
                         'queryColumnType' => 'tinyint(1) null',
                         'columnType' => 'tinyint(1) null',
                         'phpdocType' => 'boolean',
                         'name' => 'PrintedCatalogFlag',
                         'title' => 'Printed Catalog Flag',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
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
                         'unsigned' => false,
                         'minValue' => NULL,
                         'maxValue' => NULL,
                         'unique' => false,
                         'decimalSize' => NULL,
                         'decimalPrecision' => NULL,
                         'name' => 'SortOrder',
                         'title' => 'Sort Order',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
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
              2 => 
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => 495,
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'ApplicationName',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'CSApplications',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'CSProductApplications',
                         'title' => 'Applications',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => 495,
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'FeatureName',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'CSFeaturesAndBenefits',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'CSProductFeaturesAndBenefits',
                         'title' => 'Features and Benefits',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => 495,
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'Name,Level',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'CSProducts',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'CoverCompounds',
                         'title' => 'Cover Compounds',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => 495,
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'Name',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'CSProducts',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'CSRelatedProducts',
                         'title' => 'Related Products',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:20px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => 495,
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'IndustryName',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'CSIndustries',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'CSProductIndustries',
                         'title' => 'Industries',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => 495,
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'Name',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'CSHierarchy',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'ParentCategory',
                         'title' => 'Parent Category',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:20px; clear:both;',
                         'permissions' => NULL,
                         'datatype' => 'data',
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/label.svg',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'FeatureAndBenefit',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Features And Benefits',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Block::__set_state(array(
                     'fieldtype' => 'block',
                     'lazyLoading' => false,
                     'disallowAddRemove' => false,
                     'disallowReorder' => false,
                     'collapsible' => false,
                     'collapsed' => false,
                     'maxItems' => NULL,
                     'columnType' => 'longtext',
                     'styleElement' => '',
                     'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\BlockElement[][]',
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
                         'name' => 'Feature',
                         'title' => 'Feature',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'defaultValueGenerator' => '',
                      )),
                    ),
                     'layout' => NULL,
                     'referencedFields' => 
                    array (
                    ),
                     'name' => 'featureBlock',
                     'title' => 'Feature Block',
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
                  Pimcore\Model\DataObject\ClassDefinition\Data\Block::__set_state(array(
                     'fieldtype' => 'block',
                     'lazyLoading' => false,
                     'disallowAddRemove' => false,
                     'disallowReorder' => false,
                     'collapsible' => false,
                     'collapsed' => false,
                     'maxItems' => NULL,
                     'columnType' => 'longtext',
                     'styleElement' => '',
                     'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\BlockElement[][]',
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
                         'name' => 'Benefit',
                         'title' => 'Benefit',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'defaultValueGenerator' => '',
                      )),
                    ),
                     'layout' => NULL,
                     'referencedFields' => 
                    array (
                    ),
                     'name' => 'benefitBlock',
                     'title' => 'benefitBlock',
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
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Product Specific Data',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Product Specific Data',
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
                 'maxItems' => '',
                 'border' => false,
                 'name' => 'ProductAttributes',
                 'title' => 'Product Attributes',
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/input.svg',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Layout',
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
                     'name' => 'Images',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Images',
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
                         'labelWidth' => 100,
                         'layout' => 'hbox',
                         'fieldLabel' => '',
                         'name' => 'Images',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Images',
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
                                 'bodyStyle' => 'margin:20px;',
                                 'datatype' => 'layout',
                                 'permissions' => NULL,
                                 'childs' => 
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                     'fieldtype' => 'fieldcontainer',
                                     'labelWidth' => 100,
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'fieldtype' => 'image',
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'logoImage',
                                         'title' => 'Logo Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
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
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'productImage',
                                         'title' => 'Product Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
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
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'overviewImageofSystem',
                                         'title' => 'Overview Image of System',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
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
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'imageCrossSectionOfProducts',
                                         'title' => 'Image cross Section Of Products',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                      4 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'fieldtype' => 'image',
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'anglesofInclination',
                                         'title' => 'Angles of Inclination',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                      5 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'fieldtype' => 'image',
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'sidewallSizes',
                                         'title' => ' Sidewall Sizes',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                      6 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'fieldtype' => 'image',
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'deviationAngleForVerticalCurves',
                                         'title' => 'Deviation Angle For Vertical Curves',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                      7 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'fieldtype' => 'image',
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'functionalityImage',
                                         'title' => 'Functionality Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                      8 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'fieldtype' => 'image',
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'applicationImage',
                                         'title' => 'Application Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;',
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
                                     'labelWidth' => 100,
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
                                     'bodyStyle' => 'margin:20px;',
                                     'datatype' => 'layout',
                                     'permissions' => NULL,
                                     'childs' => 
                                    array (
                                      0 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'fieldtype' => 'image',
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'fieldPhoto',
                                         'title' => 'Field Photo',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
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
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'softwareImage',
                                         'title' => 'Software Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
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
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'reportImage',
                                         'title' => 'Report Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
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
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'damageImage',
                                         'title' => 'Damage Image',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                      4 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'fieldtype' => 'image',
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'deviatioAngleForHorizontal',
                                         'title' => 'Deviation Angle For Horizontal ',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                      5 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'fieldtype' => 'image',
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'sidewallQualities',
                                         'title' => ' Sidewall Qualities',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                      6 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'fieldtype' => 'image',
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'increasingInclinationAngle',
                                         'title' => 'Increasing Inclination Angle',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
                                         'permissions' => NULL,
                                         'datatype' => 'data',
                                         'relationType' => false,
                                         'invisible' => false,
                                         'visibleGridView' => false,
                                         'visibleSearch' => false,
                                      )),
                                      7 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                         'fieldtype' => 'image',
                                         'width' => 400,
                                         'height' => '',
                                         'uploadPath' => '',
                                         'queryColumnType' => 'int(11)',
                                         'columnType' => 'int(11)',
                                         'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                         'name' => 'beltRollDiameters',
                                         'title' => 'Belt Roll Diameters',
                                         'tooltip' => '',
                                         'mandatory' => false,
                                         'noteditable' => false,
                                         'index' => false,
                                         'locked' => false,
                                         'style' => 'margin-top:10px;margin-left:20px;',
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
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\ImageGallery::__set_state(array(
                                 'fieldtype' => 'imageGallery',
                                 'queryColumnType' => 
                                array (
                                  'images' => 'text',
                                  'hotspots' => 'text',
                                ),
                                 'columnType' => 
                                array (
                                  'images' => 'text',
                                  'hotspots' => 'text',
                                ),
                                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ImageGallery',
                                 'width' => NULL,
                                 'height' => NULL,
                                 'uploadPath' => '',
                                 'ratioX' => NULL,
                                 'ratioY' => NULL,
                                 'predefinedDataTemplates' => '',
                                 'name' => 'imageGallery',
                                 'title' => 'Image Gallery',
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
                             'name' => 'localizedfields',
                             'region' => NULL,
                             'layout' => NULL,
                             'title' => 'Digital Assets',
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
                             'fieldDefinitionsCache' => NULL,
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => NULL,
                             'locked' => false,
                             'style' => 'margin-top:10px;',
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/asset.svg',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Videos',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Videos',
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                         'fieldtype' => 'video',
                         'width' => 400,
                         'height' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\Video',
                         'name' => 'systemAnimation',
                         'title' => 'System Animation',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-top:10px;margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                         'fieldtype' => 'video',
                         'width' => 400,
                         'height' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\Video',
                         'name' => 'systemVideo',
                         'title' => 'System Video',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-top:10px;margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Video::__set_state(array(
                         'fieldtype' => 'video',
                         'width' => 400,
                         'height' => '',
                         'queryColumnType' => 'text',
                         'columnType' => 'text',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\Video',
                         'name' => 'productAnimation',
                         'title' => 'Product Animation',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => false,
                         'style' => 'margin-top:10px;margin-left:10px;',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                    ),
                     'locked' => false,
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/camcorder.svg',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Documents',
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
                         'width' => '',
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
                         'classes' => 
                        array (
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'documents',
                         'title' => 'Documents',
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
                     'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/book.svg',
                  )),
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/image-region.svg',
          )),
          4 => 
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
                     'noteditable' => true,
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
                     'noteditable' => true,
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/accept_database.svg',
          )),
        ),
         'locked' => false,
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
   'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/database.svg',
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