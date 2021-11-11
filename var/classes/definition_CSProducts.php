<?php 

/** 
* Generated at: 2021-11-11T09:06:14+01:00
* Inheritance: yes
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- Name [input]
- CorporateBrand [input]
- ProductBrand [input]
- ProductOwner [user]
- MarcomUser [user]
- RnDUser [user]
- isPaused [checkbox]
- isArchived [checkbox]
- NatureOfProduct [input]
- ProductClaimSlogan [input]
- CSPerformanceCategory [multiselect]
- CSSegment [multiselect]
- SelectCountries [multiselect]
- CSRegion [multiselect]
- PrintedCatalogFlag [booleanSelect]
- localizedfields [localizedfields]
-- ProductDescription [textarea]
-- ShortText [textarea]
-- LongText [textarea]
-- CompletenessPercentage [input]
-- EmptyFields [textarea]
- Benefits [manyToManyObjectRelation]
- CSProductApplications [manyToManyObjectRelation]
- CSProductIndustries [manyToManyObjectRelation]
- CoverCompounds [manyToManyObjectRelation]
- Features [manyToManyObjectRelation]
- CSProductFeaturesAndBenefits [manyToManyObjectRelation]
- CSRelatedProducts [manyToManyObjectRelation]
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
   'modificationDate' => 1636617969,
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
                            'value' => 57,
                            'key' => 'a339063 (Marie-Josee Brisson)',
                          ),
                          2 => 
                          array (
                            'value' => 36,
                            'key' => 'a352850 (Reji Joseph)',
                          ),
                          3 => 
                          array (
                            'value' => 55,
                            'key' => 'a389752 (Randy Kish)',
                          ),
                          4 => 
                          array (
                            'value' => 2,
                            'key' => 'admin',
                          ),
                          5 => 
                          array (
                            'value' => 23,
                            'key' => 'Andy (Andy Speidel)',
                          ),
                          6 => 
                          array (
                            'value' => 16,
                            'key' => 'Ben (Ben Tracey)',
                          ),
                          7 => 
                          array (
                            'value' => 11,
                            'key' => 'cory (Cory Walter)',
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
                            'value' => 22,
                            'key' => 'Eric (Eric Dupont)',
                          ),
                          12 => 
                          array (
                            'value' => 28,
                            'key' => 'Jarek (Jarek Zakrzewski)',
                          ),
                          13 => 
                          array (
                            'value' => 20,
                            'key' => 'Jeff (Jeff Epperson)',
                          ),
                          14 => 
                          array (
                            'value' => 25,
                            'key' => 'Jeremy (Jeremy Lidgett)',
                          ),
                          15 => 
                          array (
                            'value' => 14,
                            'key' => 'Joe (joe glandorf)',
                          ),
                          16 => 
                          array (
                            'value' => 26,
                            'key' => 'Karina (Karina Robinson)',
                          ),
                          17 => 
                          array (
                            'value' => 17,
                            'key' => 'Laszlo (Laszlo Dobo)',
                          ),
                          18 => 
                          array (
                            'value' => 12,
                            'key' => 'macenzie',
                          ),
                          19 => 
                          array (
                            'value' => 8,
                            'key' => 'Mark (Rohan Kumar)',
                          ),
                          20 => 
                          array (
                            'value' => 24,
                            'key' => 'MarkR (Mark Rosetta)',
                          ),
                          21 => 
                          array (
                            'value' => 51,
                            'key' => 'ncem057 (Steve Davison)',
                          ),
                          22 => 
                          array (
                            'value' => 15,
                            'key' => 'Nicole (Nicole Kostelnick)',
                          ),
                          23 => 
                          array (
                            'value' => 48,
                            'key' => 'nlndv68 (Jeff Epperson)',
                          ),
                          24 => 
                          array (
                            'value' => 27,
                            'key' => 'Paul (Paul Whiffin)',
                          ),
                          25 => 
                          array (
                            'value' => 35,
                            'key' => 'Pradeep',
                          ),
                          26 => 
                          array (
                            'value' => 34,
                            'key' => 'productmanager',
                          ),
                          27 => 
                          array (
                            'value' => 29,
                            'key' => 'Randy (Rohan Kumar)',
                          ),
                          28 => 
                          array (
                            'value' => 9,
                            'key' => 'Reji',
                          ),
                          29 => 
                          array (
                            'value' => 13,
                            'key' => 'Rohit',
                          ),
                          30 => 
                          array (
                            'value' => 18,
                            'key' => 'Steve (Steve Davison)',
                          ),
                          31 => 
                          array (
                            'value' => 58,
                            'key' => 'uib98517 (Toks Ajepe)',
                          ),
                          32 => 
                          array (
                            'value' => 41,
                            'key' => 'uic58260 (Evan Wasen)',
                          ),
                          33 => 
                          array (
                            'value' => 30,
                            'key' => 'uic60917 (Krishnan Kumar)',
                          ),
                          34 => 
                          array (
                            'value' => 52,
                            'key' => 'uie20462 (Steven De Alwis)',
                          ),
                          35 => 
                          array (
                            'value' => 40,
                            'key' => 'V000320 (Jarek Zakrzewski)',
                          ),
                          36 => 
                          array (
                            'value' => 37,
                            'key' => 'v000696 (Mark Dario)',
                          ),
                          37 => 
                          array (
                            'value' => 43,
                            'key' => 'v001713 (Nicole Kostelnick)',
                          ),
                          38 => 
                          array (
                            'value' => 39,
                            'key' => 'v002041 (Cory Walter)',
                          ),
                          39 => 
                          array (
                            'value' => 45,
                            'key' => 'v002044 (Zach Christenson)',
                          ),
                          40 => 
                          array (
                            'value' => 46,
                            'key' => 'v002065 (Mark Rosetta)',
                          ),
                          41 => 
                          array (
                            'value' => 44,
                            'key' => 'V104718 (Ben Tracey)',
                          ),
                          42 => 
                          array (
                            'value' => 53,
                            'key' => 'v106287 (Joe Glandorf)',
                          ),
                          43 => 
                          array (
                            'value' => 56,
                            'key' => 'v106566 (Don Salandanan)',
                          ),
                          44 => 
                          array (
                            'value' => 49,
                            'key' => 'V111211 (James Dusek)',
                          ),
                          45 => 
                          array (
                            'value' => 50,
                            'key' => 'v111296 (Scott Retzlaff)',
                          ),
                          46 => 
                          array (
                            'value' => 54,
                            'key' => 'V112497 (Morgan Lackey)',
                          ),
                          47 => 
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
                         'title' => 'Product Owner',
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
                            'value' => 57,
                            'key' => 'a339063 (Marie-Josee Brisson)',
                          ),
                          2 => 
                          array (
                            'value' => 36,
                            'key' => 'a352850 (Reji Joseph)',
                          ),
                          3 => 
                          array (
                            'value' => 55,
                            'key' => 'a389752 (Randy Kish)',
                          ),
                          4 => 
                          array (
                            'value' => 2,
                            'key' => 'admin',
                          ),
                          5 => 
                          array (
                            'value' => 23,
                            'key' => 'Andy (Andy Speidel)',
                          ),
                          6 => 
                          array (
                            'value' => 16,
                            'key' => 'Ben (Ben Tracey)',
                          ),
                          7 => 
                          array (
                            'value' => 11,
                            'key' => 'cory (Cory Walter)',
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
                            'value' => 22,
                            'key' => 'Eric (Eric Dupont)',
                          ),
                          12 => 
                          array (
                            'value' => 28,
                            'key' => 'Jarek (Jarek Zakrzewski)',
                          ),
                          13 => 
                          array (
                            'value' => 20,
                            'key' => 'Jeff (Jeff Epperson)',
                          ),
                          14 => 
                          array (
                            'value' => 25,
                            'key' => 'Jeremy (Jeremy Lidgett)',
                          ),
                          15 => 
                          array (
                            'value' => 14,
                            'key' => 'Joe (joe glandorf)',
                          ),
                          16 => 
                          array (
                            'value' => 26,
                            'key' => 'Karina (Karina Robinson)',
                          ),
                          17 => 
                          array (
                            'value' => 17,
                            'key' => 'Laszlo (Laszlo Dobo)',
                          ),
                          18 => 
                          array (
                            'value' => 12,
                            'key' => 'macenzie',
                          ),
                          19 => 
                          array (
                            'value' => 8,
                            'key' => 'Mark (Rohan Kumar)',
                          ),
                          20 => 
                          array (
                            'value' => 24,
                            'key' => 'MarkR (Mark Rosetta)',
                          ),
                          21 => 
                          array (
                            'value' => 51,
                            'key' => 'ncem057 (Steve Davison)',
                          ),
                          22 => 
                          array (
                            'value' => 15,
                            'key' => 'Nicole (Nicole Kostelnick)',
                          ),
                          23 => 
                          array (
                            'value' => 48,
                            'key' => 'nlndv68 (Jeff Epperson)',
                          ),
                          24 => 
                          array (
                            'value' => 27,
                            'key' => 'Paul (Paul Whiffin)',
                          ),
                          25 => 
                          array (
                            'value' => 35,
                            'key' => 'Pradeep',
                          ),
                          26 => 
                          array (
                            'value' => 34,
                            'key' => 'productmanager',
                          ),
                          27 => 
                          array (
                            'value' => 29,
                            'key' => 'Randy (Rohan Kumar)',
                          ),
                          28 => 
                          array (
                            'value' => 9,
                            'key' => 'Reji',
                          ),
                          29 => 
                          array (
                            'value' => 13,
                            'key' => 'Rohit',
                          ),
                          30 => 
                          array (
                            'value' => 18,
                            'key' => 'Steve (Steve Davison)',
                          ),
                          31 => 
                          array (
                            'value' => 58,
                            'key' => 'uib98517 (Toks Ajepe)',
                          ),
                          32 => 
                          array (
                            'value' => 41,
                            'key' => 'uic58260 (Evan Wasen)',
                          ),
                          33 => 
                          array (
                            'value' => 30,
                            'key' => 'uic60917 (Krishnan Kumar)',
                          ),
                          34 => 
                          array (
                            'value' => 52,
                            'key' => 'uie20462 (Steven De Alwis)',
                          ),
                          35 => 
                          array (
                            'value' => 40,
                            'key' => 'V000320 (Jarek Zakrzewski)',
                          ),
                          36 => 
                          array (
                            'value' => 37,
                            'key' => 'v000696 (Mark Dario)',
                          ),
                          37 => 
                          array (
                            'value' => 43,
                            'key' => 'v001713 (Nicole Kostelnick)',
                          ),
                          38 => 
                          array (
                            'value' => 39,
                            'key' => 'v002041 (Cory Walter)',
                          ),
                          39 => 
                          array (
                            'value' => 45,
                            'key' => 'v002044 (Zach Christenson)',
                          ),
                          40 => 
                          array (
                            'value' => 46,
                            'key' => 'v002065 (Mark Rosetta)',
                          ),
                          41 => 
                          array (
                            'value' => 44,
                            'key' => 'V104718 (Ben Tracey)',
                          ),
                          42 => 
                          array (
                            'value' => 53,
                            'key' => 'v106287 (Joe Glandorf)',
                          ),
                          43 => 
                          array (
                            'value' => 56,
                            'key' => 'v106566 (Don Salandanan)',
                          ),
                          44 => 
                          array (
                            'value' => 49,
                            'key' => 'V111211 (James Dusek)',
                          ),
                          45 => 
                          array (
                            'value' => 50,
                            'key' => 'v111296 (Scott Retzlaff)',
                          ),
                          46 => 
                          array (
                            'value' => 54,
                            'key' => 'V112497 (Morgan Lackey)',
                          ),
                          47 => 
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
                      5 => 
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
                            'value' => 57,
                            'key' => 'a339063 (Marie-Josee Brisson)',
                          ),
                          2 => 
                          array (
                            'value' => 36,
                            'key' => 'a352850 (Reji Joseph)',
                          ),
                          3 => 
                          array (
                            'value' => 55,
                            'key' => 'a389752 (Randy Kish)',
                          ),
                          4 => 
                          array (
                            'value' => 2,
                            'key' => 'admin',
                          ),
                          5 => 
                          array (
                            'value' => 23,
                            'key' => 'Andy (Andy Speidel)',
                          ),
                          6 => 
                          array (
                            'value' => 16,
                            'key' => 'Ben (Ben Tracey)',
                          ),
                          7 => 
                          array (
                            'value' => 11,
                            'key' => 'cory (Cory Walter)',
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
                            'value' => 22,
                            'key' => 'Eric (Eric Dupont)',
                          ),
                          12 => 
                          array (
                            'value' => 28,
                            'key' => 'Jarek (Jarek Zakrzewski)',
                          ),
                          13 => 
                          array (
                            'value' => 20,
                            'key' => 'Jeff (Jeff Epperson)',
                          ),
                          14 => 
                          array (
                            'value' => 25,
                            'key' => 'Jeremy (Jeremy Lidgett)',
                          ),
                          15 => 
                          array (
                            'value' => 14,
                            'key' => 'Joe (joe glandorf)',
                          ),
                          16 => 
                          array (
                            'value' => 26,
                            'key' => 'Karina (Karina Robinson)',
                          ),
                          17 => 
                          array (
                            'value' => 17,
                            'key' => 'Laszlo (Laszlo Dobo)',
                          ),
                          18 => 
                          array (
                            'value' => 12,
                            'key' => 'macenzie',
                          ),
                          19 => 
                          array (
                            'value' => 8,
                            'key' => 'Mark (Rohan Kumar)',
                          ),
                          20 => 
                          array (
                            'value' => 24,
                            'key' => 'MarkR (Mark Rosetta)',
                          ),
                          21 => 
                          array (
                            'value' => 51,
                            'key' => 'ncem057 (Steve Davison)',
                          ),
                          22 => 
                          array (
                            'value' => 15,
                            'key' => 'Nicole (Nicole Kostelnick)',
                          ),
                          23 => 
                          array (
                            'value' => 48,
                            'key' => 'nlndv68 (Jeff Epperson)',
                          ),
                          24 => 
                          array (
                            'value' => 27,
                            'key' => 'Paul (Paul Whiffin)',
                          ),
                          25 => 
                          array (
                            'value' => 35,
                            'key' => 'Pradeep',
                          ),
                          26 => 
                          array (
                            'value' => 34,
                            'key' => 'productmanager',
                          ),
                          27 => 
                          array (
                            'value' => 29,
                            'key' => 'Randy (Rohan Kumar)',
                          ),
                          28 => 
                          array (
                            'value' => 9,
                            'key' => 'Reji',
                          ),
                          29 => 
                          array (
                            'value' => 13,
                            'key' => 'Rohit',
                          ),
                          30 => 
                          array (
                            'value' => 18,
                            'key' => 'Steve (Steve Davison)',
                          ),
                          31 => 
                          array (
                            'value' => 58,
                            'key' => 'uib98517 (Toks Ajepe)',
                          ),
                          32 => 
                          array (
                            'value' => 41,
                            'key' => 'uic58260 (Evan Wasen)',
                          ),
                          33 => 
                          array (
                            'value' => 30,
                            'key' => 'uic60917 (Krishnan Kumar)',
                          ),
                          34 => 
                          array (
                            'value' => 52,
                            'key' => 'uie20462 (Steven De Alwis)',
                          ),
                          35 => 
                          array (
                            'value' => 40,
                            'key' => 'V000320 (Jarek Zakrzewski)',
                          ),
                          36 => 
                          array (
                            'value' => 37,
                            'key' => 'v000696 (Mark Dario)',
                          ),
                          37 => 
                          array (
                            'value' => 43,
                            'key' => 'v001713 (Nicole Kostelnick)',
                          ),
                          38 => 
                          array (
                            'value' => 39,
                            'key' => 'v002041 (Cory Walter)',
                          ),
                          39 => 
                          array (
                            'value' => 45,
                            'key' => 'v002044 (Zach Christenson)',
                          ),
                          40 => 
                          array (
                            'value' => 46,
                            'key' => 'v002065 (Mark Rosetta)',
                          ),
                          41 => 
                          array (
                            'value' => 44,
                            'key' => 'V104718 (Ben Tracey)',
                          ),
                          42 => 
                          array (
                            'value' => 53,
                            'key' => 'v106287 (Joe Glandorf)',
                          ),
                          43 => 
                          array (
                            'value' => 56,
                            'key' => 'v106566 (Don Salandanan)',
                          ),
                          44 => 
                          array (
                            'value' => 49,
                            'key' => 'V111211 (James Dusek)',
                          ),
                          45 => 
                          array (
                            'value' => 50,
                            'key' => 'v111296 (Scott Retzlaff)',
                          ),
                          46 => 
                          array (
                            'value' => 54,
                            'key' => 'V112497 (Morgan Lackey)',
                          ),
                          47 => 
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
                      6 => 
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
                      7 => 
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
                      8 => 
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
                      1 => 
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'AMERICAS',
                            'value' => 7500454,
                          ),
                          1 => 
                          array (
                            'key' => 'APAC',
                            'value' => 7500453,
                          ),
                          2 => 
                          array (
                            'key' => 'EMEA',
                            'value' => 7500452,
                          ),
                          3 => 
                          array (
                            'key' => 'SERVICE',
                            'value' => 7500455,
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
                      3 => 
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
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                         'fieldtype' => 'multiselect',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'Australia / South Pacific',
                            'value' => 7500449,
                          ),
                          1 => 
                          array (
                            'key' => 'China & Mongolia',
                            'value' => 7500447,
                          ),
                          2 => 
                          array (
                            'key' => 'Eastern Europe/Russia',
                            'value' => 7500444,
                          ),
                          3 => 
                          array (
                            'key' => 'India',
                            'value' => 7500448,
                          ),
                          4 => 
                          array (
                            'key' => 'Middle East/North Africa',
                            'value' => 7500445,
                          ),
                          5 => 
                          array (
                            'key' => 'North America',
                            'value' => 7500441,
                          ),
                          6 => 
                          array (
                            'key' => 'South America',
                            'value' => 7500442,
                          ),
                          7 => 
                          array (
                            'key' => 'South East Asia',
                            'value' => 7500450,
                          ),
                          8 => 
                          array (
                            'key' => 'Subsahara/South Africa',
                            'value' => 7500446,
                          ),
                          9 => 
                          array (
                            'key' => 'Western Europe',
                            'value' => 7500443,
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
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                         'fieldtype' => 'booleanSelect',
                         'yesLabel' => 'yes',
                         'noLabel' => 'no',
                         'emptyLabel' => 'empty',
                         'options' => 
                        array (
                          0 => 
                          array (
                            'key' => 'empty',
                            'value' => 0,
                          ),
                          1 => 
                          array (
                            'key' => 'yes',
                            'value' => 1,
                          ),
                          2 => 
                          array (
                            'key' => 'no',
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
                         'locked' => NULL,
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
                         'visibleFields' => 'BenefitName',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'CSBenefits',
                          ),
                        ),
                         'pathFormatterClass' => '',
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
                            'classes' => 'CSFeatures',
                          ),
                        ),
                         'pathFormatterClass' => '',
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
                      3 => 
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
                  22 => 'ProdAttrSetW',
                  23 => 'ProdAttrSetAA',
                  24 => 'ProdAttrSetAB',
                  25 => 'ProdAttrSetAC',
                  26 => 'ProdAttrSetZ',
                  27 => 'ProdAttrSetAD',
                  28 => 'ProdAttrSetAE',
                  29 => 'ProdAttrSetAF',
                  30 => 'ProdAttrSetAG',
                  31 => 'ProdAttrSetAH',
                  32 => 'ProdAttrSetAI',
                  33 => 'ProdAttrSetX',
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
