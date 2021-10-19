<?php 

/** 
* Generated at: 2021-10-18T16:37:50+05:30
* Inheritance: no
* Variants: no
* Changed by: admin (2)
* IP: ::1


Fields Summary: 
- Name [input]
- CorporateBrand [input]
- ProductBrand [input]
- ProductOwner [user]
- isPaused [checkbox]
- isArchived [checkbox]
- NatureOfProduct [input]
- CSSegment [select]
- Benefits [input]
- Features [input]
- ProductClaimSlogan [input]
- SelectCountries [countrymultiselect]
- localizedfields [localizedfields]
-- ProductDescription [textarea]
-- ShortText [textarea]
-- LongText [textarea]
-- CompletenessPercentage [input]
-- EmptyFields [textarea]
- CSProductApplications [manyToManyObjectRelation]
- CSProductFeaturesAndBenefits [manyToManyObjectRelation]
- CSProductIndustries [manyToManyObjectRelation]
- CoverCompounds [manyToManyObjectRelation]
- CSRelatedProducts [manyToManyObjectRelation]
- CSRegion [manyToManyObjectRelation]
- ParentCategory [manyToManyObjectRelation]
- ProductAttributes [objectbricks]
- LogoImage [image]
- productImage [image]
- applicationImage [image]
- functionalityImage [image]
- deviationAngleForVerticalCurves [image]
- sidewallSizes [image]
- anglesofInclination [image]
- imageCrossSectionOfProducts [image]
- overviewImageofSystem [image]
- fieldPhoto [image]
- softwareImage [image]
- reportImage [image]
- damageImage [image]
- deviatioAngleForHorizontal [image]
- sidewallQualities [image]
- increasingInclinationAngle [image]
- beltRollDiameters [image]
- imageGallery [imageGallery]
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
   'modificationDate' => 1634555268,
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
                            'value' => 36,
                            'key' => 'a352850 (Reji Joseph)',
                          ),
                          2 => 
                          array (
                            'value' => 55,
                            'key' => 'a389752 (Randy Kish)',
                          ),
                          3 => 
                          array (
                            'value' => 2,
                            'key' => 'admin',
                          ),
                          4 => 
                          array (
                            'value' => 23,
                            'key' => 'Andy (Andy Speidel)',
                          ),
                          5 => 
                          array (
                            'value' => 16,
                            'key' => 'Ben (Ben Tracey)',
                          ),
                          6 => 
                          array (
                            'value' => 11,
                            'key' => 'cory (Cory Walter)',
                          ),
                          7 => 
                          array (
                            'value' => 82,
                            'key' => 'CSProductManager_2',
                          ),
                          8 => 
                          array (
                            'value' => 21,
                            'key' => 'Dave (Dave Smith)',
                          ),
                          9 => 
                          array (
                            'value' => 42,
                            'key' => 'dobol (Laszlo Dobo)',
                          ),
                          10 => 
                          array (
                            'value' => 33,
                            'key' => 'editor',
                          ),
                          11 => 
                          array (
                            'value' => 73,
                            'key' => 'Editor_1',
                          ),
                          12 => 
                          array (
                            'value' => 22,
                            'key' => 'Eric (Eric Dupont)',
                          ),
                          13 => 
                          array (
                            'value' => 28,
                            'key' => 'Jarek (Jarek Zakrzewski)',
                          ),
                          14 => 
                          array (
                            'value' => 20,
                            'key' => 'Jeff (Jeff Epperson)',
                          ),
                          15 => 
                          array (
                            'value' => 25,
                            'key' => 'Jeremy (Jeremy Lidgett)',
                          ),
                          16 => 
                          array (
                            'value' => 14,
                            'key' => 'Joe (joe glandorf)',
                          ),
                          17 => 
                          array (
                            'value' => 26,
                            'key' => 'Karina (Karina Robinson)',
                          ),
                          18 => 
                          array (
                            'value' => 17,
                            'key' => 'Laszlo (Laszlo Dobo)',
                          ),
                          19 => 
                          array (
                            'value' => 12,
                            'key' => 'macenzie',
                          ),
                          20 => 
                          array (
                            'value' => 75,
                            'key' => 'MarCom_1',
                          ),
                          21 => 
                          array (
                            'value' => 8,
                            'key' => 'Mark (Rohan Kumar)',
                          ),
                          22 => 
                          array (
                            'value' => 24,
                            'key' => 'MarkR (Mark Rosetta)',
                          ),
                          23 => 
                          array (
                            'value' => 51,
                            'key' => 'ncem057 (Steve Davison)',
                          ),
                          24 => 
                          array (
                            'value' => 15,
                            'key' => 'Nicole (Nicole Kostelnick)',
                          ),
                          25 => 
                          array (
                            'value' => 48,
                            'key' => 'nlndv68 (Jeff Epperson)',
                          ),
                          26 => 
                          array (
                            'value' => 27,
                            'key' => 'Paul (Paul Whiffin)',
                          ),
                          27 => 
                          array (
                            'value' => 35,
                            'key' => 'Pradeep',
                          ),
                          28 => 
                          array (
                            'value' => 34,
                            'key' => 'productmanager',
                          ),
                          29 => 
                          array (
                            'value' => 74,
                            'key' => 'ProductManager_1',
                          ),
                          30 => 
                          array (
                            'value' => 66,
                            'key' => 'RajeshReadOnly (Rajesh Kumar)',
                          ),
                          31 => 
                          array (
                            'value' => 29,
                            'key' => 'Randy (Rohan Kumar)',
                          ),
                          32 => 
                          array (
                            'value' => 9,
                            'key' => 'Reji',
                          ),
                          33 => 
                          array (
                            'value' => 13,
                            'key' => 'Rohit',
                          ),
                          34 => 
                          array (
                            'value' => 18,
                            'key' => 'Steve (Steve Davison)',
                          ),
                          35 => 
                          array (
                            'value' => 41,
                            'key' => 'uic58260 (Evan Wasen)',
                          ),
                          36 => 
                          array (
                            'value' => 30,
                            'key' => 'uic60917 (Krishnan Kumar)',
                          ),
                          37 => 
                          array (
                            'value' => 52,
                            'key' => 'uie20462 (Steven De Alwis)',
                          ),
                          38 => 
                          array (
                            'value' => 40,
                            'key' => 'V000320 (Jarek Zakrzewski)',
                          ),
                          39 => 
                          array (
                            'value' => 37,
                            'key' => 'v000696 (Mark Dario)',
                          ),
                          40 => 
                          array (
                            'value' => 43,
                            'key' => 'v001713 (Nicole Kostelnick)',
                          ),
                          41 => 
                          array (
                            'value' => 39,
                            'key' => 'v002041 (Cory Walter)',
                          ),
                          42 => 
                          array (
                            'value' => 45,
                            'key' => 'v002044 (Zach Christenson)',
                          ),
                          43 => 
                          array (
                            'value' => 46,
                            'key' => 'v002065 (Mark Rosetta)',
                          ),
                          44 => 
                          array (
                            'value' => 44,
                            'key' => 'V104718 (Ben Tracey)',
                          ),
                          45 => 
                          array (
                            'value' => 53,
                            'key' => 'v106287 (Joe Glandorf)',
                          ),
                          46 => 
                          array (
                            'value' => 49,
                            'key' => 'V111211 (James Dusek)',
                          ),
                          47 => 
                          array (
                            'value' => 50,
                            'key' => 'v111296 (Scott Retzlaff)',
                          ),
                          48 => 
                          array (
                            'value' => 54,
                            'key' => 'V112497 (Morgan Lackey)',
                          ),
                          49 => 
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
                      4 => 
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
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => true,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                         'defaultValueGenerator' => '',
                      )),
                      5 => 
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
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => true,
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
                      7 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                         'fieldtype' => 'select',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'SA',
                            'value' => 'SA',
                          ),
                          1 => 
                          array (
                            'key' => 'NA',
                            'value' => 'NA',
                          ),
                          2 => 
                          array (
                            'key' => 'Americas',
                            'value' => 'Americas',
                          ),
                          3 => 
                          array (
                            'key' => 'APAC',
                            'value' => 'APAC',
                          ),
                          4 => 
                          array (
                            'key' => 'EMEA',
                            'value' => 'EMEA',
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
                         'name' => 'CSSegment',
                         'title' => 'Segment',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => false,
                         'locked' => NULL,
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
                         'name' => 'Benefits',
                         'title' => 'Benefits',
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
                         'name' => 'Features',
                         'title' => 'Features',
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
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Countrymultiselect::__set_state(array(
                         'fieldtype' => 'countrymultiselect',
                         'restrictTo' => '',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Afghanistan',
                            'value' => 'AF',
                          ),
                          1 => 
                          array (
                            'key' => 'Albania',
                            'value' => 'AL',
                          ),
                          2 => 
                          array (
                            'key' => 'Algeria',
                            'value' => 'DZ',
                          ),
                          3 => 
                          array (
                            'key' => 'American Samoa',
                            'value' => 'AS',
                          ),
                          4 => 
                          array (
                            'key' => 'Andorra',
                            'value' => 'AD',
                          ),
                          5 => 
                          array (
                            'key' => 'Angola',
                            'value' => 'AO',
                          ),
                          6 => 
                          array (
                            'key' => 'Anguilla',
                            'value' => 'AI',
                          ),
                          7 => 
                          array (
                            'key' => 'Antarctica',
                            'value' => 'AQ',
                          ),
                          8 => 
                          array (
                            'key' => 'Antigua & Barbuda',
                            'value' => 'AG',
                          ),
                          9 => 
                          array (
                            'key' => 'Argentina',
                            'value' => 'AR',
                          ),
                          10 => 
                          array (
                            'key' => 'Armenia',
                            'value' => 'AM',
                          ),
                          11 => 
                          array (
                            'key' => 'Aruba',
                            'value' => 'AW',
                          ),
                          12 => 
                          array (
                            'key' => 'Australia',
                            'value' => 'AU',
                          ),
                          13 => 
                          array (
                            'key' => 'Austria',
                            'value' => 'AT',
                          ),
                          14 => 
                          array (
                            'key' => 'Azerbaijan',
                            'value' => 'AZ',
                          ),
                          15 => 
                          array (
                            'key' => 'Bahamas',
                            'value' => 'BS',
                          ),
                          16 => 
                          array (
                            'key' => 'Bahrain',
                            'value' => 'BH',
                          ),
                          17 => 
                          array (
                            'key' => 'Bangladesh',
                            'value' => 'BD',
                          ),
                          18 => 
                          array (
                            'key' => 'Barbados',
                            'value' => 'BB',
                          ),
                          19 => 
                          array (
                            'key' => 'Belarus',
                            'value' => 'BY',
                          ),
                          20 => 
                          array (
                            'key' => 'Belgium',
                            'value' => 'BE',
                          ),
                          21 => 
                          array (
                            'key' => 'Belize',
                            'value' => 'BZ',
                          ),
                          22 => 
                          array (
                            'key' => 'Benin',
                            'value' => 'BJ',
                          ),
                          23 => 
                          array (
                            'key' => 'Bermuda',
                            'value' => 'BM',
                          ),
                          24 => 
                          array (
                            'key' => 'Bhutan',
                            'value' => 'BT',
                          ),
                          25 => 
                          array (
                            'key' => 'Bolivia',
                            'value' => 'BO',
                          ),
                          26 => 
                          array (
                            'key' => 'Bosnia & Herzegovina',
                            'value' => 'BA',
                          ),
                          27 => 
                          array (
                            'key' => 'Botswana',
                            'value' => 'BW',
                          ),
                          28 => 
                          array (
                            'key' => 'Bouvet Island',
                            'value' => 'BV',
                          ),
                          29 => 
                          array (
                            'key' => 'Brazil',
                            'value' => 'BR',
                          ),
                          30 => 
                          array (
                            'key' => 'British Indian Ocean Territory',
                            'value' => 'IO',
                          ),
                          31 => 
                          array (
                            'key' => 'British Virgin Islands',
                            'value' => 'VG',
                          ),
                          32 => 
                          array (
                            'key' => 'Brunei',
                            'value' => 'BN',
                          ),
                          33 => 
                          array (
                            'key' => 'Bulgaria',
                            'value' => 'BG',
                          ),
                          34 => 
                          array (
                            'key' => 'Burkina Faso',
                            'value' => 'BF',
                          ),
                          35 => 
                          array (
                            'key' => 'Burundi',
                            'value' => 'BI',
                          ),
                          36 => 
                          array (
                            'key' => 'Cambodia',
                            'value' => 'KH',
                          ),
                          37 => 
                          array (
                            'key' => 'Cameroon',
                            'value' => 'CM',
                          ),
                          38 => 
                          array (
                            'key' => 'Canada',
                            'value' => 'CA',
                          ),
                          39 => 
                          array (
                            'key' => 'Cape Verde',
                            'value' => 'CV',
                          ),
                          40 => 
                          array (
                            'key' => 'Caribbean Netherlands',
                            'value' => 'BQ',
                          ),
                          41 => 
                          array (
                            'key' => 'Cayman Islands',
                            'value' => 'KY',
                          ),
                          42 => 
                          array (
                            'key' => 'Central African Republic',
                            'value' => 'CF',
                          ),
                          43 => 
                          array (
                            'key' => 'Chad',
                            'value' => 'TD',
                          ),
                          44 => 
                          array (
                            'key' => 'Chile',
                            'value' => 'CL',
                          ),
                          45 => 
                          array (
                            'key' => 'China',
                            'value' => 'CN',
                          ),
                          46 => 
                          array (
                            'key' => 'Christmas Island',
                            'value' => 'CX',
                          ),
                          47 => 
                          array (
                            'key' => 'Cocos (Keeling) Islands',
                            'value' => 'CC',
                          ),
                          48 => 
                          array (
                            'key' => 'Colombia',
                            'value' => 'CO',
                          ),
                          49 => 
                          array (
                            'key' => 'Comoros',
                            'value' => 'KM',
                          ),
                          50 => 
                          array (
                            'key' => 'Congo - Brazzaville',
                            'value' => 'CG',
                          ),
                          51 => 
                          array (
                            'key' => 'Congo - Kinshasa',
                            'value' => 'CD',
                          ),
                          52 => 
                          array (
                            'key' => 'Cook Islands',
                            'value' => 'CK',
                          ),
                          53 => 
                          array (
                            'key' => 'Costa Rica',
                            'value' => 'CR',
                          ),
                          54 => 
                          array (
                            'key' => 'Croatia',
                            'value' => 'HR',
                          ),
                          55 => 
                          array (
                            'key' => 'Cuba',
                            'value' => 'CU',
                          ),
                          56 => 
                          array (
                            'key' => 'Curaçao',
                            'value' => 'CW',
                          ),
                          57 => 
                          array (
                            'key' => 'Cyprus',
                            'value' => 'CY',
                          ),
                          58 => 
                          array (
                            'key' => 'Czechia',
                            'value' => 'CZ',
                          ),
                          59 => 
                          array (
                            'key' => 'Côte d’Ivoire',
                            'value' => 'CI',
                          ),
                          60 => 
                          array (
                            'key' => 'Denmark',
                            'value' => 'DK',
                          ),
                          61 => 
                          array (
                            'key' => 'Djibouti',
                            'value' => 'DJ',
                          ),
                          62 => 
                          array (
                            'key' => 'Dominica',
                            'value' => 'DM',
                          ),
                          63 => 
                          array (
                            'key' => 'Dominican Republic',
                            'value' => 'DO',
                          ),
                          64 => 
                          array (
                            'key' => 'Ecuador',
                            'value' => 'EC',
                          ),
                          65 => 
                          array (
                            'key' => 'Egypt',
                            'value' => 'EG',
                          ),
                          66 => 
                          array (
                            'key' => 'El Salvador',
                            'value' => 'SV',
                          ),
                          67 => 
                          array (
                            'key' => 'Equatorial Guinea',
                            'value' => 'GQ',
                          ),
                          68 => 
                          array (
                            'key' => 'Eritrea',
                            'value' => 'ER',
                          ),
                          69 => 
                          array (
                            'key' => 'Estonia',
                            'value' => 'EE',
                          ),
                          70 => 
                          array (
                            'key' => 'Eswatini',
                            'value' => 'SZ',
                          ),
                          71 => 
                          array (
                            'key' => 'Ethiopia',
                            'value' => 'ET',
                          ),
                          72 => 
                          array (
                            'key' => 'Falkland Islands',
                            'value' => 'FK',
                          ),
                          73 => 
                          array (
                            'key' => 'Faroe Islands',
                            'value' => 'FO',
                          ),
                          74 => 
                          array (
                            'key' => 'Fiji',
                            'value' => 'FJ',
                          ),
                          75 => 
                          array (
                            'key' => 'Finland',
                            'value' => 'FI',
                          ),
                          76 => 
                          array (
                            'key' => 'France',
                            'value' => 'FR',
                          ),
                          77 => 
                          array (
                            'key' => 'French Guiana',
                            'value' => 'GF',
                          ),
                          78 => 
                          array (
                            'key' => 'French Polynesia',
                            'value' => 'PF',
                          ),
                          79 => 
                          array (
                            'key' => 'French Southern Territories',
                            'value' => 'TF',
                          ),
                          80 => 
                          array (
                            'key' => 'Gabon',
                            'value' => 'GA',
                          ),
                          81 => 
                          array (
                            'key' => 'Gambia',
                            'value' => 'GM',
                          ),
                          82 => 
                          array (
                            'key' => 'Georgia',
                            'value' => 'GE',
                          ),
                          83 => 
                          array (
                            'key' => 'Germany',
                            'value' => 'DE',
                          ),
                          84 => 
                          array (
                            'key' => 'Ghana',
                            'value' => 'GH',
                          ),
                          85 => 
                          array (
                            'key' => 'Gibraltar',
                            'value' => 'GI',
                          ),
                          86 => 
                          array (
                            'key' => 'Greece',
                            'value' => 'GR',
                          ),
                          87 => 
                          array (
                            'key' => 'Greenland',
                            'value' => 'GL',
                          ),
                          88 => 
                          array (
                            'key' => 'Grenada',
                            'value' => 'GD',
                          ),
                          89 => 
                          array (
                            'key' => 'Guadeloupe',
                            'value' => 'GP',
                          ),
                          90 => 
                          array (
                            'key' => 'Guam',
                            'value' => 'GU',
                          ),
                          91 => 
                          array (
                            'key' => 'Guatemala',
                            'value' => 'GT',
                          ),
                          92 => 
                          array (
                            'key' => 'Guernsey',
                            'value' => 'GG',
                          ),
                          93 => 
                          array (
                            'key' => 'Guinea',
                            'value' => 'GN',
                          ),
                          94 => 
                          array (
                            'key' => 'Guinea-Bissau',
                            'value' => 'GW',
                          ),
                          95 => 
                          array (
                            'key' => 'Guyana',
                            'value' => 'GY',
                          ),
                          96 => 
                          array (
                            'key' => 'Haiti',
                            'value' => 'HT',
                          ),
                          97 => 
                          array (
                            'key' => 'Heard & McDonald Islands',
                            'value' => 'HM',
                          ),
                          98 => 
                          array (
                            'key' => 'Honduras',
                            'value' => 'HN',
                          ),
                          99 => 
                          array (
                            'key' => 'Hong Kong SAR China',
                            'value' => 'HK',
                          ),
                          100 => 
                          array (
                            'key' => 'Hungary',
                            'value' => 'HU',
                          ),
                          101 => 
                          array (
                            'key' => 'Iceland',
                            'value' => 'IS',
                          ),
                          102 => 
                          array (
                            'key' => 'India',
                            'value' => 'IN',
                          ),
                          103 => 
                          array (
                            'key' => 'Indonesia',
                            'value' => 'ID',
                          ),
                          104 => 
                          array (
                            'key' => 'Iran',
                            'value' => 'IR',
                          ),
                          105 => 
                          array (
                            'key' => 'Iraq',
                            'value' => 'IQ',
                          ),
                          106 => 
                          array (
                            'key' => 'Ireland',
                            'value' => 'IE',
                          ),
                          107 => 
                          array (
                            'key' => 'Isle of Man',
                            'value' => 'IM',
                          ),
                          108 => 
                          array (
                            'key' => 'Israel',
                            'value' => 'IL',
                          ),
                          109 => 
                          array (
                            'key' => 'Italy',
                            'value' => 'IT',
                          ),
                          110 => 
                          array (
                            'key' => 'Jamaica',
                            'value' => 'JM',
                          ),
                          111 => 
                          array (
                            'key' => 'Japan',
                            'value' => 'JP',
                          ),
                          112 => 
                          array (
                            'key' => 'Jersey',
                            'value' => 'JE',
                          ),
                          113 => 
                          array (
                            'key' => 'Jordan',
                            'value' => 'JO',
                          ),
                          114 => 
                          array (
                            'key' => 'Kazakhstan',
                            'value' => 'KZ',
                          ),
                          115 => 
                          array (
                            'key' => 'Kenya',
                            'value' => 'KE',
                          ),
                          116 => 
                          array (
                            'key' => 'Kiribati',
                            'value' => 'KI',
                          ),
                          117 => 
                          array (
                            'key' => 'Kuwait',
                            'value' => 'KW',
                          ),
                          118 => 
                          array (
                            'key' => 'Kyrgyzstan',
                            'value' => 'KG',
                          ),
                          119 => 
                          array (
                            'key' => 'Laos',
                            'value' => 'LA',
                          ),
                          120 => 
                          array (
                            'key' => 'Latvia',
                            'value' => 'LV',
                          ),
                          121 => 
                          array (
                            'key' => 'Lebanon',
                            'value' => 'LB',
                          ),
                          122 => 
                          array (
                            'key' => 'Lesotho',
                            'value' => 'LS',
                          ),
                          123 => 
                          array (
                            'key' => 'Liberia',
                            'value' => 'LR',
                          ),
                          124 => 
                          array (
                            'key' => 'Libya',
                            'value' => 'LY',
                          ),
                          125 => 
                          array (
                            'key' => 'Liechtenstein',
                            'value' => 'LI',
                          ),
                          126 => 
                          array (
                            'key' => 'Lithuania',
                            'value' => 'LT',
                          ),
                          127 => 
                          array (
                            'key' => 'Luxembourg',
                            'value' => 'LU',
                          ),
                          128 => 
                          array (
                            'key' => 'Macao SAR China',
                            'value' => 'MO',
                          ),
                          129 => 
                          array (
                            'key' => 'Madagascar',
                            'value' => 'MG',
                          ),
                          130 => 
                          array (
                            'key' => 'Malawi',
                            'value' => 'MW',
                          ),
                          131 => 
                          array (
                            'key' => 'Malaysia',
                            'value' => 'MY',
                          ),
                          132 => 
                          array (
                            'key' => 'Maldives',
                            'value' => 'MV',
                          ),
                          133 => 
                          array (
                            'key' => 'Mali',
                            'value' => 'ML',
                          ),
                          134 => 
                          array (
                            'key' => 'Malta',
                            'value' => 'MT',
                          ),
                          135 => 
                          array (
                            'key' => 'Marshall Islands',
                            'value' => 'MH',
                          ),
                          136 => 
                          array (
                            'key' => 'Martinique',
                            'value' => 'MQ',
                          ),
                          137 => 
                          array (
                            'key' => 'Mauritania',
                            'value' => 'MR',
                          ),
                          138 => 
                          array (
                            'key' => 'Mauritius',
                            'value' => 'MU',
                          ),
                          139 => 
                          array (
                            'key' => 'Mayotte',
                            'value' => 'YT',
                          ),
                          140 => 
                          array (
                            'key' => 'Mexico',
                            'value' => 'MX',
                          ),
                          141 => 
                          array (
                            'key' => 'Micronesia',
                            'value' => 'FM',
                          ),
                          142 => 
                          array (
                            'key' => 'Moldova',
                            'value' => 'MD',
                          ),
                          143 => 
                          array (
                            'key' => 'Monaco',
                            'value' => 'MC',
                          ),
                          144 => 
                          array (
                            'key' => 'Mongolia',
                            'value' => 'MN',
                          ),
                          145 => 
                          array (
                            'key' => 'Montenegro',
                            'value' => 'ME',
                          ),
                          146 => 
                          array (
                            'key' => 'Montserrat',
                            'value' => 'MS',
                          ),
                          147 => 
                          array (
                            'key' => 'Morocco',
                            'value' => 'MA',
                          ),
                          148 => 
                          array (
                            'key' => 'Mozambique',
                            'value' => 'MZ',
                          ),
                          149 => 
                          array (
                            'key' => 'Myanmar (Burma)',
                            'value' => 'MM',
                          ),
                          150 => 
                          array (
                            'key' => 'Namibia',
                            'value' => 'NA',
                          ),
                          151 => 
                          array (
                            'key' => 'Nauru',
                            'value' => 'NR',
                          ),
                          152 => 
                          array (
                            'key' => 'Nepal',
                            'value' => 'NP',
                          ),
                          153 => 
                          array (
                            'key' => 'Netherlands',
                            'value' => 'NL',
                          ),
                          154 => 
                          array (
                            'key' => 'New Caledonia',
                            'value' => 'NC',
                          ),
                          155 => 
                          array (
                            'key' => 'New Zealand',
                            'value' => 'NZ',
                          ),
                          156 => 
                          array (
                            'key' => 'Nicaragua',
                            'value' => 'NI',
                          ),
                          157 => 
                          array (
                            'key' => 'Niger',
                            'value' => 'NE',
                          ),
                          158 => 
                          array (
                            'key' => 'Nigeria',
                            'value' => 'NG',
                          ),
                          159 => 
                          array (
                            'key' => 'Niue',
                            'value' => 'NU',
                          ),
                          160 => 
                          array (
                            'key' => 'Norfolk Island',
                            'value' => 'NF',
                          ),
                          161 => 
                          array (
                            'key' => 'North Korea',
                            'value' => 'KP',
                          ),
                          162 => 
                          array (
                            'key' => 'North Macedonia',
                            'value' => 'MK',
                          ),
                          163 => 
                          array (
                            'key' => 'Northern Mariana Islands',
                            'value' => 'MP',
                          ),
                          164 => 
                          array (
                            'key' => 'Norway',
                            'value' => 'NO',
                          ),
                          165 => 
                          array (
                            'key' => 'Oman',
                            'value' => 'OM',
                          ),
                          166 => 
                          array (
                            'key' => 'Pakistan',
                            'value' => 'PK',
                          ),
                          167 => 
                          array (
                            'key' => 'Palau',
                            'value' => 'PW',
                          ),
                          168 => 
                          array (
                            'key' => 'Palestinian Territories',
                            'value' => 'PS',
                          ),
                          169 => 
                          array (
                            'key' => 'Panama',
                            'value' => 'PA',
                          ),
                          170 => 
                          array (
                            'key' => 'Papua New Guinea',
                            'value' => 'PG',
                          ),
                          171 => 
                          array (
                            'key' => 'Paraguay',
                            'value' => 'PY',
                          ),
                          172 => 
                          array (
                            'key' => 'Peru',
                            'value' => 'PE',
                          ),
                          173 => 
                          array (
                            'key' => 'Philippines',
                            'value' => 'PH',
                          ),
                          174 => 
                          array (
                            'key' => 'Pitcairn Islands',
                            'value' => 'PN',
                          ),
                          175 => 
                          array (
                            'key' => 'Poland',
                            'value' => 'PL',
                          ),
                          176 => 
                          array (
                            'key' => 'Portugal',
                            'value' => 'PT',
                          ),
                          177 => 
                          array (
                            'key' => 'Puerto Rico',
                            'value' => 'PR',
                          ),
                          178 => 
                          array (
                            'key' => 'Qatar',
                            'value' => 'QA',
                          ),
                          179 => 
                          array (
                            'key' => 'Romania',
                            'value' => 'RO',
                          ),
                          180 => 
                          array (
                            'key' => 'Russia',
                            'value' => 'RU',
                          ),
                          181 => 
                          array (
                            'key' => 'Rwanda',
                            'value' => 'RW',
                          ),
                          182 => 
                          array (
                            'key' => 'Réunion',
                            'value' => 'RE',
                          ),
                          183 => 
                          array (
                            'key' => 'Samoa',
                            'value' => 'WS',
                          ),
                          184 => 
                          array (
                            'key' => 'San Marino',
                            'value' => 'SM',
                          ),
                          185 => 
                          array (
                            'key' => 'Saudi Arabia',
                            'value' => 'SA',
                          ),
                          186 => 
                          array (
                            'key' => 'Senegal',
                            'value' => 'SN',
                          ),
                          187 => 
                          array (
                            'key' => 'Serbia',
                            'value' => 'RS',
                          ),
                          188 => 
                          array (
                            'key' => 'Seychelles',
                            'value' => 'SC',
                          ),
                          189 => 
                          array (
                            'key' => 'Sierra Leone',
                            'value' => 'SL',
                          ),
                          190 => 
                          array (
                            'key' => 'Singapore',
                            'value' => 'SG',
                          ),
                          191 => 
                          array (
                            'key' => 'Sint Maarten',
                            'value' => 'SX',
                          ),
                          192 => 
                          array (
                            'key' => 'Slovakia',
                            'value' => 'SK',
                          ),
                          193 => 
                          array (
                            'key' => 'Slovenia',
                            'value' => 'SI',
                          ),
                          194 => 
                          array (
                            'key' => 'Solomon Islands',
                            'value' => 'SB',
                          ),
                          195 => 
                          array (
                            'key' => 'Somalia',
                            'value' => 'SO',
                          ),
                          196 => 
                          array (
                            'key' => 'South Africa',
                            'value' => 'ZA',
                          ),
                          197 => 
                          array (
                            'key' => 'South Georgia & South Sandwich Islands',
                            'value' => 'GS',
                          ),
                          198 => 
                          array (
                            'key' => 'South Korea',
                            'value' => 'KR',
                          ),
                          199 => 
                          array (
                            'key' => 'South Sudan',
                            'value' => 'SS',
                          ),
                          200 => 
                          array (
                            'key' => 'Spain',
                            'value' => 'ES',
                          ),
                          201 => 
                          array (
                            'key' => 'Sri Lanka',
                            'value' => 'LK',
                          ),
                          202 => 
                          array (
                            'key' => 'St. Barthélemy',
                            'value' => 'BL',
                          ),
                          203 => 
                          array (
                            'key' => 'St. Helena',
                            'value' => 'SH',
                          ),
                          204 => 
                          array (
                            'key' => 'St. Kitts & Nevis',
                            'value' => 'KN',
                          ),
                          205 => 
                          array (
                            'key' => 'St. Lucia',
                            'value' => 'LC',
                          ),
                          206 => 
                          array (
                            'key' => 'St. Martin',
                            'value' => 'MF',
                          ),
                          207 => 
                          array (
                            'key' => 'St. Pierre & Miquelon',
                            'value' => 'PM',
                          ),
                          208 => 
                          array (
                            'key' => 'St. Vincent & Grenadines',
                            'value' => 'VC',
                          ),
                          209 => 
                          array (
                            'key' => 'Sudan',
                            'value' => 'SD',
                          ),
                          210 => 
                          array (
                            'key' => 'Suriname',
                            'value' => 'SR',
                          ),
                          211 => 
                          array (
                            'key' => 'Svalbard & Jan Mayen',
                            'value' => 'SJ',
                          ),
                          212 => 
                          array (
                            'key' => 'Sweden',
                            'value' => 'SE',
                          ),
                          213 => 
                          array (
                            'key' => 'Switzerland',
                            'value' => 'CH',
                          ),
                          214 => 
                          array (
                            'key' => 'Syria',
                            'value' => 'SY',
                          ),
                          215 => 
                          array (
                            'key' => 'São Tomé & Príncipe',
                            'value' => 'ST',
                          ),
                          216 => 
                          array (
                            'key' => 'Taiwan',
                            'value' => 'TW',
                          ),
                          217 => 
                          array (
                            'key' => 'Tajikistan',
                            'value' => 'TJ',
                          ),
                          218 => 
                          array (
                            'key' => 'Tanzania',
                            'value' => 'TZ',
                          ),
                          219 => 
                          array (
                            'key' => 'Thailand',
                            'value' => 'TH',
                          ),
                          220 => 
                          array (
                            'key' => 'Timor-Leste',
                            'value' => 'TL',
                          ),
                          221 => 
                          array (
                            'key' => 'Togo',
                            'value' => 'TG',
                          ),
                          222 => 
                          array (
                            'key' => 'Tokelau',
                            'value' => 'TK',
                          ),
                          223 => 
                          array (
                            'key' => 'Tonga',
                            'value' => 'TO',
                          ),
                          224 => 
                          array (
                            'key' => 'Trinidad & Tobago',
                            'value' => 'TT',
                          ),
                          225 => 
                          array (
                            'key' => 'Tunisia',
                            'value' => 'TN',
                          ),
                          226 => 
                          array (
                            'key' => 'Turkey',
                            'value' => 'TR',
                          ),
                          227 => 
                          array (
                            'key' => 'Turkmenistan',
                            'value' => 'TM',
                          ),
                          228 => 
                          array (
                            'key' => 'Turks & Caicos Islands',
                            'value' => 'TC',
                          ),
                          229 => 
                          array (
                            'key' => 'Tuvalu',
                            'value' => 'TV',
                          ),
                          230 => 
                          array (
                            'key' => 'U.S. Outlying Islands',
                            'value' => 'UM',
                          ),
                          231 => 
                          array (
                            'key' => 'U.S. Virgin Islands',
                            'value' => 'VI',
                          ),
                          232 => 
                          array (
                            'key' => 'Uganda',
                            'value' => 'UG',
                          ),
                          233 => 
                          array (
                            'key' => 'Ukraine',
                            'value' => 'UA',
                          ),
                          234 => 
                          array (
                            'key' => 'United Arab Emirates',
                            'value' => 'AE',
                          ),
                          235 => 
                          array (
                            'key' => 'United Kingdom',
                            'value' => 'GB',
                          ),
                          236 => 
                          array (
                            'key' => 'United States',
                            'value' => 'US',
                          ),
                          237 => 
                          array (
                            'key' => 'Uruguay',
                            'value' => 'UY',
                          ),
                          238 => 
                          array (
                            'key' => 'Uzbekistan',
                            'value' => 'UZ',
                          ),
                          239 => 
                          array (
                            'key' => 'Vanuatu',
                            'value' => 'VU',
                          ),
                          240 => 
                          array (
                            'key' => 'Vatican City',
                            'value' => 'VA',
                          ),
                          241 => 
                          array (
                            'key' => 'Venezuela',
                            'value' => 'VE',
                          ),
                          242 => 
                          array (
                            'key' => 'Vietnam',
                            'value' => 'VN',
                          ),
                          243 => 
                          array (
                            'key' => 'Wallis & Futuna',
                            'value' => 'WF',
                          ),
                          244 => 
                          array (
                            'key' => 'Western Sahara',
                            'value' => 'EH',
                          ),
                          245 => 
                          array (
                            'key' => 'Yemen',
                            'value' => 'YE',
                          ),
                          246 => 
                          array (
                            'key' => 'Zambia',
                            'value' => 'ZM',
                          ),
                          247 => 
                          array (
                            'key' => 'Zimbabwe',
                            'value' => 'ZW',
                          ),
                          248 => 
                          array (
                            'key' => 'Åland Islands',
                            'value' => 'AX',
                          ),
                        ),
                         'width' => 300,
                         'height' => '',
                         'maxItems' => '',
                         'renderType' => 'list',
                         'optionsProviderClass' => NULL,
                         'optionsProviderData' => NULL,
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
                  1 => 
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
                  2 => 
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
                 'tabPosition' => NULL,
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
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => 495,
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 
                        array (
                        ),
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => '',
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
                         'visibleFields' => 'RegionName',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'CSRegion',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'CSRegion',
                         'title' => 'Region',
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
                  0 => 'ProdAttrSetA',
                  1 => 'ProdAttrSetC',
                  2 => 'ProdAttrSetD',
                  3 => 'ProdAttrSetE',
                  4 => 'ProdAttrSetF',
                  5 => 'ProdAttrSetG',
                  6 => 'ProdAttrSetH',
                  7 => 'ProdAttrSetI',
                  8 => 'ProdAttrSetJ',
                  9 => 'ProdAttrSetK',
                  10 => 'ProdAttrSetL',
                  11 => 'ProdAttrSetM',
                  12 => 'ProdAttrSetN',
                  13 => 'ProdAttrSetO',
                  14 => 'ProdAttrSetP',
                  15 => 'ProdAttrSetQ',
                  16 => 'ProdAttrSetR',
                  17 => 'ProdAttrSetS',
                  18 => 'ProdAttrSetT',
                  19 => 'ProdAttrSetU',
                  20 => 'ProdAttrSetV',
                  21 => 'ProdAttrSetY',
                  22 => 'ProdAttrSetX',
                  23 => 'ProdAttrSetW',
                  24 => 'ProdAttrSetAA',
                  25 => 'ProdAttrSetAB',
                  26 => 'ProdAttrSetAC',
                  27 => 'ProdAttrSetZ',
                  28 => 'ProdAttrSetAD',
                  29 => 'ProdAttrSetAE',
                  30 => 'ProdAttrSetAF',
                  31 => 'ProdAttrSetAG',
                  32 => 'ProdAttrSetAH',
                  33 => 'ProdAttrSetAI',
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
          2 => 
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
                                 'name' => 'LogoImage',
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
                              3 => 
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
                              4 => 
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
                              7 => 
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
                              8 => 
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
          3 => 
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
